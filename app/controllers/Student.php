<?php

class Student
{
    use controller;
    public $sidebarMenu = [
        [
            'text' => 'Dashboard',
            'url' => '/student/dashboard',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Calender',
            'url' => '/student/calendar',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Tasks',
            'url' => '/student/tasks',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Feedbacks',
            'url' => '/student/feedbacks',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Account',
            'url' => '/student/account',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Logout',
            'url' => '/auth/logout',
            'icon' => 'dashboard'
        ]
    ];
    protected $studentData;

    public function __construct()
    {
        $student = new StudentModel();
        $this->studentData = $student->findOne(["user_id" => $_SESSION['user']['user_id']]);
        // Add Leader Options if the user is a student leader
        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'STUDENT_LEADER') {
            $this->sidebarMenu = [
                [
                    'text' => 'Dashboard',
                    'url' => '/student/dashboard',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Calender',
                    'url' => '/student/calendar',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Tasks',
                    'url' => '/student/tasks',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Feedbacks',
                    'url' => '/student/feedbacks',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Leader Options',
                    'url' => '/student/leader',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Account',
                    'url' => '/student/account',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Logout',
                    'url' => '/auth/logout',
                    'icon' => 'dashboard'
                ]
            ];
        }
    }

    public function index($data)
    {
        $tasks = new TaskModel();
        $student = new StudentModel();
        $user = new user();
        $eventModel = new EventModel();

        // getTaskDetail function in models/TaskModel.php
        $data['inprogressTasks'] = $tasks->getTaskDetail([
            'status' => 'IN_PROGRESS',
            'group_id' => $_SESSION['user']['group_id']
        ]);
        $data['student'] = $student->getStudentData($_SESSION['user']['user_id']);

        $data['eventList'] = $eventModel->getUserEvents(['user_id' => $_SESSION['user']['user_id'], 'role' => $_SESSION['user']['role'], 'group_id' => $this->studentData['group_id']]);
        // Map eventList to add a color field based on event scope
        foreach ($data['eventList'] as &$event) {
            $scopePart = explode('_', $event['scope'])[0];
            switch ($scopePart) {
                case 'GROUP':
                    $event['color'] = '#FF5733';
                    break;
                case 'USER':
                    $event['color'] = '#33FF57';
                    break;
                case 'GLOBAL':
                    $event['color'] = '#3357FF';
                    break;
                case 'SUPERVISORS':
                    $event['color'] = '#FF33A1';
                    break;
                case 'EXAMINERS':
                    $event['color'] = '#A133FF';
                    break;
                case 'STUDENTS':
                    $event['color'] = '#33A1FF';
                    break;
                default:
                    $event['color'] = '#000000';
                    break;
            }
        }
        unset($event);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['update_profile'])) { // Check if update profile form is submitted
                // echo "<script>console.log('POST Data:', " . json_encode($_POST) . ");</script>";

                $user->updateStudentProfile([
                    'user_id' => $_POST['user_id'],
                    'full_name' => $_POST['full_name'],
                    'email' => $_POST['email']
                ]);

                // this should save this way unless it not showing when refresh cuz database newe data not taken to sessi0n

                $_SESSION['user']['full_name'] = $_POST['full_name'];
                $_SESSION['user']['email'] = $_POST['email'];
            }

            // echo "<script>console.log('PHP Data of :', " . json_encode($updatedStudentData) . ");</script>";


            header("Location: " . BASE_URL . "/student/index");
            exit();
        } else {
            // getting data of the Tasks for bottom graph
            $data['taskDetail'] = $tasks->getTasksDetailByUser($_SESSION['user']['user_id']);
            //echo "<script>console.log(" . json_encode($data['taskDetail']) . ");</script>";

            $this->render("dashboard", $data);
        }
        // echo "<script>console.log('PHP Data:', " . json_encode($data) . ");</script>";



    }

    public function calendar($data)
    {
        $eventModel = new EventModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create_event'])) {
                $eventModel->createEvent(['start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => $_POST['scope']]);
            }
            if (isset($_POST['update_event'])) {
                $eventModel->updateEvent(['event_id' => $_POST['event_id'], 'start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'scope' => $_POST['scope']]);
            }

            header("Location: " . BASE_URL . "/student/calendar");
            exit();
        } else {

            $data['eventList'] = $eventModel->getUserEvents(['user_id' => $_SESSION['user']['user_id'], 'role' => $_SESSION['user']['role'], 'group_id' => $this->studentData['group_id']]);
            $data['group_id'] = $this->studentData['group_id'];
            $this->render("calendar", $data);
        }
    }

    public function tasks($data)
    {
        $tasks = new TaskModel();
        $student = new StudentModel();
        $group = new GroupModel();

        // echo "<script>console.log('data[\\'student\\']: " . json_encode($_SESSION['user']['group_id']) . "');</script>";

        // getting last task_number for apply correct numbering to tasks
        $task_number = $group->getLastTaskNumber(['group_id' => $_SESSION['user']['group_id']])[0]['task_number']; // do this since return data array like this [{"task_number":13}]

        $group_members = $student->getGroupMembers($_SESSION['user']['group_id']);
        $data['group_members'] = $group_members;

        // echo "<script>console.log('group member data " . json_encode($data['group_members']) . "');</script>";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //get data from component 'addTaskBox' in task
            if (isset($_POST['add_task'])) { // Check add_task button is clicked
                $tasks->addTask([
                    'group_id' => $_SESSION['user']['group_id'], // get group_id from session
                    'title' => $_POST['task_title'],
                    'description' => $_POST['task_description'],
                    'deadline' => date('Y-m-d 23:59:59', strtotime($_POST['deadline'])), // We take a date input for the deadline but we use midnight as the time
                    'estimated_time' => $_POST['estimated_time'], // This is in hours
                    'assignee_id' => $_POST['task_assignee'],
                    'status' => 'TO_DO',
                    'create_time' => date('Y-m-d H:i:s'), // Current date and time
                    'task_number' => $task_number + 1 // increment task number by 1
                ]);
                // Move task status to NEXT 
            } elseif (isset($_POST['updateStatusNext'])) {
                // Update task status to NEXT status
                if ($_POST['updateStatusNext'] == 'IN_PROGRESS') {
                    $tasks->startTask([
                        'task_id' => $_POST['task_id']
                    ]);
                } elseif ($_POST['updateStatusNext'] == 'IN_REVIEW' && isset($_POST['git_link'])) { // Check if git_link is set before completing the task
                    $tasks->completeTask([
                        'task_id' => $_POST['task_id'],
                        'git_link' => $_POST['git_link']
                    ]);
                } elseif ($_POST['updateStatusNext'] == 'COMPLETED') {
                    $tasks->approveTask([
                        'task_id' => $_POST['task_id']
                    ]);
                } else {
                    $tasks->rejectTask([
                        'task_id' => $_POST['task_id']
                    ]);
                }
                // Move task status to NEXT
            } elseif (isset($_POST['updateStatusPrev'])) {
                // Update task status to PREV status
                $tasks->updateTaskType([
                    'task_id' => $_POST['task_id'],
                    'task_type' => $_POST['updateStatusPrev']
                ]);
            } elseif (isset($_POST['updateTask'])) {

                $taskDetail = [
                    'task_id' => $_POST['task_id'],
                    'description' => $_POST['description'],
                    'git_link' => $_POST['git_link'],
                ];

                // echo "<script>console.log('task Detail: " . json_encode($taskDetail) . "');</script>";
                $tasks->updateTaskDetail($taskDetail);

            } elseif (isset($_POST['deleteAction']) && isset($_POST['task_id'])) { // Check deleteAction button is clicked
                $tasks->deleteTask($_POST['task_id']);

            } elseif (isset($_POST['addComment']) && isset($_POST['task_id'])) {
                $tasks->addComment([
                    'task_id' => $_POST['task_id'],
                    'user_id' => $_SESSION['user']['user_id'],
                    'comment' => $_POST['comment'],
                ]);

            }
            //from this we prevent re rendering the page and (had to use caz when i put data into form it doest romove value and add values auto when i refresh page)
            header("Location: " . BASE_URL . "/student/tasks");
            exit();
        } else {
            // getTaskDetail function in models/TaskModel.php
            $data['completeTasks'] = $tasks->getTaskDetail([
                'status' => 'COMPLETED',
                'group_id' => $_SESSION['user']['group_id']
            ]);
            $data['inReviewTasks'] = $tasks->getTaskDetail([
                'status' => 'IN_REVIEW',
                'group_id' => $_SESSION['user']['group_id']
            ]);
            $data['inprogressTasks'] = $tasks->getTaskDetail([
                'status' => 'IN_PROGRESS',
                'group_id' => $_SESSION['user']['group_id']
            ]);
            $data['todoTasks'] = $tasks->getTaskDetail([
                'status' => 'TO_DO',
                'group_id' => $_SESSION['user']['group_id']
            ]);

            // echo "<script>console.log('group member data " . json_encode($data['todoTasks']) . "');</script>";


            $this->render("tasks", $data);

        }
    }

    // from task.view.php in student 
    function fetchTaskDetails($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $task = new TaskModel();
            $taskDetail = $task->findTaskDetail($_POST['task_id'])[0]; //[0] used cuz data comes array inside array
            // echo "<script>console.log('fetchTaskDetails function taskDetail :');</script>";

            echo json_encode($taskDetail);
        }
    }

    public function fetchComments($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $task = new TaskModel();
            $comments = $task->getComments($_POST['task_id']);
            // echo "<script>console.log('fetchComments function comments :');</script>";

            echo json_encode($comments);
        }
    }
    public function feedbacks($data)
    {
        $feedback = new FeedbackModel();
        $data['groupFeedbacks'] = $feedback->getGroupFeedbacks(['group_id' => $this->studentData['group_id']]);
        $this->render("feedbacks", $data);
    }
    public function supervisorData($data)
    {
        $this->render("supervisorData");
    }
    public function leader($data)
    {
        $student = new StudentModel();
        $task = new TaskModel();
        $biWeeklyReport = new BiWeeklyReportModel();
        $group = new GroupModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['cancel_request'])) {
                $student->deleteSupervisionRequest(['request_id' => $_POST['request_id']]);
            } else if (isset($_POST['generate_report'])) {
                $data['group_id'] = $this->studentData['group_id'];
                $data = [
                    'completed_tasks' => $_POST['completed_tasks'],
                    'selected_tasks' => $_POST['selected_tasks'],
                    'meeting_outcomes' => $_POST['meeting_outcomes'],
                    'next_two_week_work' => $_POST['nextTwoWeekWork'],
                    'past_two_week_work' => $_POST['pastTwoWeekWork'],
                    'group_id' => $data['group_id'],
                    'date' => date('Y-m-d'), // Current date and time
                ];

                // here return last inserted report id
                $report_id = $biWeeklyReport->addBiWeeklyReportData([
                    'meeting_outcomes' => $_POST['meeting_outcomes'],
                    'next_two_week_work' => $_POST['nextTwoWeekWork'],
                    'past_two_week_work' => $_POST['pastTwoWeekWork'],
                    'group_id' => $data['group_id'],
                    'date' => date('Y-m-d'), // Current date and time
                ]);


                // Add report completed tasks
                if (!empty($data['completed_tasks'])) {
                    foreach ($data['completed_tasks'] as $taskId) {
                        $biWeeklyReport->addReportTaskData([
                            'task_id' => $taskId,
                            'report_id' => $report_id,
                            'type' => 'COMPLETED'
                        ]);
                    }
                }
                
            // Update biweekly rreport
            } else if (isset($_POST['update_report'])){
                // echo "<script>console.log('group member data " . json_encode($_POST) . "');</script>";
                
                $data['group_id'] = $this->studentData['group_id'];

                // here return last update report id
                $report_id = $biWeeklyReport->updateBiWeeklyReportData([
                    'report_id' => $_POST['updateReportID'],
                    'meeting_outcomes' => $_POST['update_meeting_outcomes'],
                    'next_two_week_work' => $_POST['updatenextTwoWeekWork'],
                    'past_two_week_work' => $_POST['updatepastTwoWeekWork'],
                    'group_id' => $data['group_id'],
                    'date' => date('Y-m-d'), // Current date and time
                ]);

                // echo "<script>console.log('group member data " . json_encode($_POST['updateReportID']) . "');</script>";


            } else if (isset($_POST['resubmit_report'])) {
                $biWeeklyReport->resubmitBiWeeklyReport(
                    [
                        'report_id' => $_POST['report_id'],
                        'meeting_outcomes' => $_POST['meeting_outcomes'],
                        'next_two_week_work' => $_POST['nextTwoWeekWork'],
                        'past_two_week_work' => $_POST['pastTwoWeekWork']
                    ]
                );
            } else if (isset($_POST['deleteBiweeklyReport'])) {
                $biWeeklyReport->deleteBiweeklyReport(
                    [
                        'report_id' => $_POST['report_id']
                    ]
                );
            } else if (isset($_POST['update_request'])) {
                $student->updateSupervisionRequest(['request_id' => $_POST['request_id'], 'project_title' => $_POST['project_title'], 'idea' => $_POST['idea'], 'reason' => $_POST['reason']]);
            } else if (isset($_POST['meeting_request'])) {
                $groupDetails = $group->findOne(
                    ['group_id' => $this->studentData['group_id']]
                );
                if ($groupDetails['supervisor_id'] !== null) {
                    $student->sendMeetingRequest([
                        'group_id' => $this->studentData['group_id'],
                        'supervisor_id' => $groupDetails['supervisor_id'],
                        'title' => $_POST['title'],
                        'done' => $_POST['done'],
                        'reason' => $_POST['reason'],
                        'created_at' => date('Y-m-d H:i:s'), // Current date and time
                        'status' => 'PENDING' // Default status
                    ]);
                }
            }
            header("Location: " . BASE_URL . "/student/leader");
            exit();
        } else {
            $data['meetingRequests'] = $student->getMeetingRequests(['group_id' => $this->studentData['group_id']]);
            $data['supervisionRequests'] = $student->getSupervisionRequests(['group_id' => $this->studentData['group_id']]);
            $data['biWeeklyReports'] = $biWeeklyReport->getBiWeeklyReports(['group_id' => $this->studentData['group_id']]);
            $allRequests = array_merge($data['meetingRequests'], $data['supervisionRequests'], $data['biWeeklyReports']);
            $data['pendingRequests'] = array_filter($allRequests, function ($request) {
                return $request['status'] === 'PENDING' || (isset($request['report_id']) && $request['status'] === 'REJECTED');
            });

            $data['groupDetails'] = $group->findOne(
                ['group_id' => $this->studentData['group_id']]
            );

            // Get last two week completed tasks
            $data['completeTasks'] = $task->getCompletedTasks([
                'group_id' => $this->studentData['group_id'],
                'date' => date('Y-m-d', strtotime('-14 days')) // Last two weeks date
            ]);

            $data['todoTasks'] = $task->getToDoTasks([
                'group_id' => $this->studentData['group_id'],
            ]);

            // this used to show group details in supervisor section
            $data['group_detail'] = $student->getGroupMembersDetail($_SESSION['user']['group_id']);
            // echo "<script>console.log('group member data " . json_encode($data['group_detail']) . "');</script>";

            $this->render("leader", $data);
        }

    }

    public function requestSupervisor($data)
    {
        $supervisor = new SupervisorModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $supervisor->sendSupervisionRequest([
                'group_id' => $this->studentData["group_id"],
                'supervisor_id' => $_POST['supervisor_id'],
                'project_title' => $_POST['project_title'],
                'idea' => $_POST['idea'],
                'reason' => $_POST['reason'],
                'created_at' => date('Y-m-d H:i:s'), // Current date and time
                'status' => 'PENDING' // Default status
            ]);
            header("Location: " . BASE_URL . "/student/leader");
            exit();
        } else {
            $data['supervisors'] = $supervisor->getAvailableSupervisors($this->studentData['group_id']);
            //$data will be passed to the view as $pageData
            $this->render("requestSupervisor", $data);

        }
    }

    public function groupFormation($data)
    {
        $group = new GroupModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['next_button'])) {
                $data['studentList'] = $group->getBracketStudents(['red_bracket_id' => $_POST['red_bracket'], 'blue_bracket_id' => $_POST['blue_bracket']]);
                $data['showBracketForm'] = false;
                $data['redBracket'] = $_POST['red_bracket'];
                $data['blueBracket'] = $_POST['blue_bracket'];
                $this->render("groupFormation", $data);
            } else if (isset($_POST['submit_group'])) {
                $group->createGroup([
                    'red_bracket_id' => $_POST['red_bracket'],
                    'blue_bracket_id' => $_POST['blue_bracket'],
                    'project_name' => $_POST['project_name'],
                    'project_description' => $_POST['project_description'],
                    'leader_id' => $_POST['leader'],
                ]);
                header("Location: " . BASE_URL . "/auth/logout");
                exit();
            }
        } else {
            $data['blueBrackets'] = $group->getBrackets(["bracket" => 'Blue']);
            $filteredBlueBrackets = array_filter($data['blueBrackets'], function ($bracket) {
                return $bracket['bracket_id'] === $this->studentData['bracket_id'];
            });
            if (count($filteredBlueBrackets) === 1) {
                $data['blueBrackets'] = $filteredBlueBrackets;
            }
            $data['redBrackets'] = $group->getBrackets(["bracket" => 'Red']);
            $filteredRedBrackets = array_filter($data['redBrackets'], function ($bracket) {
                return $bracket['bracket_id'] === $this->studentData['bracket_id'];
            });
            if (count($filteredRedBrackets) === 1) {
                $data['redBrackets'] = $filteredRedBrackets;
            }
            $data['showBracketForm'] = true;
            $data['studentList'] = [];
            $this->render("groupFormation", $data);
        }
    }


    public function account($data)
    {
        $student = new StudentModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['update_account'])) {
                if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
                    $file = $_FILES['profile_picture'];
                    $fileExt = explode('.', $file['name']);
                    $fileExt = strtolower(end($fileExt));
                    $allowed = ['jpg', 'jpeg', 'png'];
                    if (in_array($fileExt, $allowed)) {
                        $fileName = $_SESSION['user']['user_id'] . '.jpg';
                        $fileDestination = 'public/images/profile_pictures/' . $fileName;
                        move_uploaded_file($file['tmp_name'], $fileDestination);
                        $userModel = new User();
                        $userModel->update(['profile_picture' => $fileName], ['user_id' => $_SESSION['user']['user_id']]);
                        $_SESSION['user']['profile_picture'] = $fileName;
                    }
                }
                //TODO: For now we are not giving the chance to update any data for students as a student can pretend like someone else
            }
            header("Location: " . BASE_URL . "/student/account");
            exit();
        } else {
            $data['userData'] = $student->getStudentData($_SESSION['user']['user_id'])[0];
            $this->render("account", $data);
        }
    }
}
