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

        // getTaskDetail function in models/TaskModel.php
        $data['inprogressTasks'] = $tasks->getTaskDetail([
            'status' => 'IN_PROGRESS',
            'user_id' => $_SESSION['user']['user_id']
        ]);
        $data['student'] = $student->getStudentData($_SESSION['user']['user_id']);

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
        }

        $this->render("dashboard", $data);

        // echo "<script>console.log('PHP Data:', " . json_encode($data) . ");</script>";

    }

    public function calendar($data)
    {
        $eventModel = new EventModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create_event'])) {
                $eventModel->createEvent(['start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => $_POST['scope']]);
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //get data from component 'addTaskBox' in task
            if (isset($_POST['add_task'])) { // Check add_task button is clicked

                $data['student'] = $student->getStudentData($_SESSION['user']['user_id']);
                // echo "<script>console.log('data[\\'student\\']: " . json_encode($data['student']) . "');</script>";

                $tasks->addTask([
                    'user_id' => $_SESSION['user']['user_id'],
                    'group_id' => $data['student'][0]['group_id'],
                    'description' => $_POST['taskDescription'],
                    'estimated_time' => $_POST['estimatedTime'],
                    'status' => 'TO_DO',
                    'created_date' => date('Y-m-d'),
                ]);

            } elseif (isset($_POST['update_task']) && isset($_POST['task_id'])) { // Check update_task button is clicked
                $updateTaskId = $_POST['task_id'];
                $task_type = $_POST['taskType'];

                if (($task_type) == 'TO_DO') {
                    $tasks->updateTodoTask([
                        'task_id' => $updateTaskId,
                        'status' => 'TO_DO',
                        'description' => $_POST['taskDescription'],
                        'estimated_time' => $_POST['estimatedTime']
                    ]);
                } elseif (($task_type) == 'IN_PROGRESS') {
                    // echo "<script>console.log('IN_PROGRESS task type update');</script>";
                    // update task start date to current date when status change to IN_PROGRESS
                    $tasks->updateInProgressTask([
                        'task_id' => $updateTaskId,
                        'status' => 'IN_PROGRESS',
                        'start_date' => date('Y-m-d'),
                        'description' => $_POST['taskDescription']
                    ]);
                } elseif (($task_type) == 'PENDING') {
                    // echo "<script>console.log('Pendng task type update');</script>";
                    // status change to pending
                    $tasks->updatePendingTask([
                        'task_id' => $updateTaskId,
                        'status' => 'PENDING',
                        'description' => $_POST['taskDescription']
                    ]);
                } elseif (($task_type) == 'COMPLETED') {
                    // echo "<script>console.log('Completed task type update');</script>";
                    // update task end date to current date when status change to COMPLETED
                    $tasks->updateCompletedTask([
                        'task_id' => $updateTaskId,
                        'status' => 'COMPLETED',
                        'end_date' => date('Y-m-d'),
                        'description' => $_POST['taskDescription']
                    ]);
                }
                // $tasks->updateTask([
                //     'task_id' => $updateTaskId,
                //     'task_type' => $_POST['taskType'],
                //     'description' => $_POST['taskDescription'],
                //     'start_date' => $_POST['startDate'],
                //     'end_date' => $_POST['endDate'],
                //     'estimated_time' => $_POST['estimatedTime']
                // ]);
            } elseif (isset($_POST['deleteAction']) && isset($_POST['task_id'])) { // Check deleteAction button is clicked
                $tasks->deleteTask($_POST['task_id']);

            }
            //from this we prevent re rendering the page and (had to use caz when i put data into form it doest romove value and add values auto when i refresh page)
            header("Location: " . BASE_URL . "/student/tasks");
            exit();
        } else {
            // getTaskDetail function in models/TaskModel.php
            $data['pendingTasks'] = $tasks->getTaskDetail([
                'status' => 'PENDING',
                'user_id' => $_SESSION['user']['user_id']
            ]);
            $data['completeTasks'] = $tasks->getTaskDetail([
                'status' => 'COMPLETED',
                'user_id' => $_SESSION['user']['user_id']
            ]);
            $data['inprogressTasks'] = $tasks->getTaskDetail([
                'status' => 'IN_PROGRESS',
                'user_id' => $_SESSION['user']['user_id']
            ]);
            $data['todoTasks'] = $tasks->getTaskDetail([
                'status' => 'TO_DO',
                'user_id' => $_SESSION['user']['user_id']
            ]);
            $this->render("tasks", $data);

        }
    }
    public function schedules($data)
    {
        $this->render("schedules");
    }
    public function settings($data)
    {
        $this->render("settings");
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
        $BiWeeklyReport = new BiWeeklyReportModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['cancel_request'])) {
                $student->deleteSupervisionRequest(['request_id' => $_POST['request_id']]);
            } else if (isset($_POST['generate_report'])) {
                $data['group_id'] = $this->studentData['group_id'];
                $data = [
                    'completed_tasks' => $_POST['completed_tasks'],
                    'selected_tasks' => $_POST['selected_tasks'],
                    'meeting_outcomes' => $_POST['meeting_outcomes'],
                    'nextTwoWeekWork' => $_POST['nextTwoWeekWork'],
                    'pastTwoWeekWork' => $_POST['pastTwoWeekWork'],
                    'group_id' => $data['group_id'],
                    'date' => date('Y-m-d'), // Current date and time
                ];
                $report_id = $BiWeeklyReport->addBiWeeklyReportData($data); // here return last inserted report id
                // Add report completed tasks
                if (!empty($data['completed_tasks'])) {
                    foreach ($data['completed_tasks'] as $taskId) {
                        $BiWeeklyReport->addReportTaskData([
                            'taskId' => $taskId,
                            'reportId' => $report_id,
                            'type' => 'COMPLETED'
                        ]);
                    }
                }
                // Add report selected tasks
                if (!empty($data['selected_tasks'])) {
                    foreach ($data['selected_tasks'] as $taskId) {
                        $BiWeeklyReport->addReportTaskData([
                            'taskId' => $taskId,
                            'reportId' => $report_id,
                            'type' => 'SELECTED'
                        ]);
                    }
                }
            } else if (isset($_POST['update_request'])) {
                $student->updateSupervisionRequest(['request_id' => $_POST['request_id'], 'project_title' => $_POST['project_title'], 'idea' => $_POST['idea'], 'reason' => $_POST['reason']]);
            } else if (isset($_POST['meeting_request'])) {
                $group = new GroupModel();
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
            $meetingRequests = $student->getMeetingRequests(['group_id' => $this->studentData['group_id']]);
            $supervisionRequests = $student->getSupervisionRequests(['group_id' => $this->studentData['group_id']]);
            $data['groupRequests'] = array_merge($meetingRequests, $supervisionRequests);

            // Get last two week completed tasks
            $data['completeTasks'] = $task->getCompletedTasks([
                'group_id' => $this->studentData['group_id'],
                'date' => date('Y-m-d', strtotime('-14 days')) // Last two weeks date
            ]);

            $data['todoTasks'] = $task->getToDoTasks([
                'group_id' => $this->studentData['group_id'],
            ]);

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
