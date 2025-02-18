<?php

class Supervisor
{
    use controller;
    public $sidebarMenu = [
        [
            'text' => 'Dashboard',
            'url' => '/supervisor/dashboard',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Manage Groups',
            'url' => '/supervisor/groups',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Student Requests',
            'url' => '/supervisor/requests',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Calendar',
            'url' => '/supervisor/calendar',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Account',
            'url' => '/supervisor/account',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Logout',
            'url' => '/auth/logout',
            'icon' => 'dashboard'
        ]
    ];

    public function index($data)
    {
        $GroupModel = new GroupModel();
        $TaskModel = new TaskModel();

        // get relevent groups according to supervisor ID
        $supervisorGroups = $GroupModel->getSupervisorGroups(['supervisor_id' => $_SESSION['user']['user_id']]);

        // saves all tasks details relavent to groupID
        $data['groupCompletedTask'] = []; // Initialize as an array
        foreach ($supervisorGroups as $group) {
            $data['groupCompletedTask'][$group['group_id']] = $TaskModel->groupTaskDetail($group['group_id']); 
        }
        
        // $data = $_GET['group_id'];
        echo "<script>console.log(" . json_encode($data['groupCompletedTask']) . ");</script>";
        $this->render("dashboard",$data);
    }

    public function calendar($data)
    {
        $eventModel = new EventModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create_event'])) {
                $eventModel->createEvent(['start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => $_POST['scope']]);
            }
            header("Location: " . BASE_URL . "/supervisor/calendar");
            exit();
        } else {
            $groupModel = new GroupModel();
            $data['groupList'] = $groupModel->getSupervisorGroups(['supervisor_id' => $_SESSION['user']['user_id']]);
            $data['eventList'] = $eventModel->getUserEvents(['user_id' => $_SESSION['user']['user_id'], 'role' => $_SESSION['user']['role'], 'groups' => $data['groupList']]);
            $this->render("calendar", $data);
        }
    }

    public function groups($data)
    {
        $groupModel = new GroupModel();
        $data['groupList'] = $groupModel->getSupervisorGroups(['supervisor_id' => $_SESSION['user']['user_id']]);
        $this->render("groups", $data);
    }

    public function requests($data)
    {
        $supervisorModel = new SupervisorModel();
        $timeTable = new TimeTableModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['accept_request'])) {
                $supervisorModel->acceptSupervisionRequest(data: ['request_id' => $_POST['request_id'], 'supervisor_id' => (int) $_SESSION['user']['user_id'], 'group_id' => $_POST['group_id']]);
            } else if (isset($_POST['decline_request'])) {
                $supervisorModel->rejectSupervisionRequest(['request_id' => $_POST['request_id']]);
            } else if (isset($_POST['accept_meeting_request'])) {
                $supervisorModel->acceptMeetingRequest(['request_id' => $_POST['request_id'], 'meeting_time' => $_POST['meeting_time']]);
                $supervisorModel->createMeetingEvent(['start_time' => $_POST['meeting_time'], 'end_time' => $_POST['meeting_time'], 'title' => "Supervisor Meeting", 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => 'GROUP_' . $_POST['group_id']]);
            } else if (isset($_POST['decline_meeting_request'])) {
                $supervisorModel->rejectMeetingRequest(['request_id' => $_POST['request_id']]);
            } else if (isset($_POST['approve_biweekly_report'])) {
                $supervisorModel->approveBiWeeklyReport(['report_id' => $_POST['report_id']]);
            } else if (isset($_POST['reject_biweekly_report'])) {
                $supervisorModel->rejectBiWeeklyReport(['report_id' => $_POST['report_id'], 'reject_reason' => $_POST['reject_reason']]);
            }
            header("Location: " . BASE_URL . "/supervisor/requests");
            exit();
        } else {
            $data['supervisionRequests'] = $supervisorModel->getSupervisorRequests(['supervisor_id' => $_SESSION['user']['user_id']]);
            $data['meetingRequests'] = $supervisorModel->getMeetingRequests(['supervisor_id' => $_SESSION['user']['user_id']]);
            $data['biweeklyReports'] = $supervisorModel->getBiWeeklyReports(['supervisor_id' => $_SESSION['user']['user_id']]);

            $allRequests = array_merge($data['supervisionRequests'], $data['meetingRequests'], $data['biweeklyReports']);
            $data['pendingRequests'] = array_filter($allRequests, function ($request) {
                return $request['status'] == 'PENDING';
            });

            if (isset($_GET['group_id'])) {
                $data['supervisionRequests'] = array_filter($data['supervisionRequests'], function ($request) {
                    return $request['group_id'] == $_GET['group_id'];
                });
                $data['meetingRequests'] = array_filter($data['meetingRequests'], function ($request) {
                    return $request['group_id'] == $_GET['group_id'];
                });
                $data['biweeklyReports'] = array_filter($data['biweeklyReports'], function ($request) {
                    return $request['group_id'] == $_GET['group_id'];
                });
                $data['pendingRequests'] = array_filter($allRequests, function ($request) {
                    return $request['status'] == 'PENDING' && $request['group_id'] == $_GET['group_id'];
                });
            }

            $data['timeTable'] = $timeTable->getTimeTable();

            $this->render("requests", $data);
        }
    }

    // Notes are personal notes that only shows to the user who created them
    public function notes($data)
    {
        $noteModel = new NoteModel();
        $groupModel = new GroupModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_note'])) {
                $noteModel->addSupervisorNote(['group_id' => $_POST['group_id'], 'user_id' => $_SESSION['user']['user_id'], 'note' => $_POST['note']]);
            } else if (isset($_POST['edit_note'])) {
                $noteModel->editNote(['note_id' => $_POST['note_id'], 'note' => $_POST['note']]);
            } else if (isset($_POST['delete_note'])) {
                $noteModel->deleteNote(['note_id' => $_POST['note_id']]);
            }
            header("Location: " . BASE_URL . "/supervisor/notes?group_id=" . $_POST['group_id']);
            exit();
        } else {
            $data['noteList'] = $noteModel->getSupervisorNotes(['user_id' => $_SESSION['user']['user_id'], 'group_id' => $_GET['group_id']]);
            $data['groupDetails'] = $groupModel->getGroup(['group_id' => $_GET['group_id']])[0];
            $this->render("notes", $data);
        }
    }


    public function tasks($data)
    {
        $tasks = new TaskModel();
        $student = new StudentModel();
// supervisors can only see the tasks and add comments to the tasks of the groups they are supervising
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['addComment']) && isset($_POST['task_id'])) {
                $tasks->addComment([
                    'task_id' => $_POST['task_id'],
                    'user_id' => $_SESSION['user']['user_id'],
                    'comment' => $_POST['comment'],
                ]);

            }
            header("Location: " . BASE_URL . "/supervisor/tasks?group_id=" . $_POST['group_id']);
            exit();
        } else {
            $group_members = $student->getGroupMembers($_GET['group_id']);
            $data['group_members'] = $group_members;
            $data['group_id'] = $_GET['group_id'];

            // getTaskDetail function in models/TaskModel.php
            $data['completeTasks'] = $tasks->getTaskDetail([
                'status' => 'COMPLETED',
                'group_id' => $_GET['group_id']
            ]);
            $data['inReviewTasks'] = $tasks->getTaskDetail([
                'status' => 'IN_REVIEW',
                'group_id' => $_GET['group_id']
            ]);
            $data['inprogressTasks'] = $tasks->getTaskDetail([
                'status' => 'IN_PROGRESS',
                'group_id' => $_GET['group_id']
            ]);
            $data['todoTasks'] = $tasks->getTaskDetail([
                'status' => 'TO_DO',
                'group_id' => $_GET['group_id']
            ]);
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

    // Feedbacks are public feedbacks that are visible to all users in the group
    public function feedbacks($data)
    {
        $feedbackModel = new FeedbackModel();
        $groupModel = new GroupModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_feedback'])) {
                $feedbackModel->addSupervisorFeedback(['group_id' => $_POST['group_id'], 'user_id' => $_SESSION['user']['user_id'], 'feedback' => $_POST['feedback']]);
            } else if (isset($_POST['edit_feedback'])) {
                $feedbackModel->editFeedback(['feedback_id' => $_POST['feedback_id'], 'feedback' => $_POST['feedback']]);
            } else if (isset($_POST['delete_feedback'])) {
                $feedbackModel->deleteFeedback(['feedback_id' => $_POST['feedback_id']]);
            }
            header("Location: " . BASE_URL . "/supervisor/feedbacks?group_id=" . $_POST['group_id']);
            exit();
        } else {
            $data['feedbackList'] = $feedbackModel->getSupervisorFeedbacks(['user_id' => $_SESSION['user']['user_id'], 'group_id' => $_GET['group_id']]);
            $data['groupDetails'] = $groupModel->getGroup(['group_id' => $_GET['group_id']])[0];
            $this->render("feedbacks", $data);
        }
    }

    public function account($data)
    {
        $supervisor = new SupervisorModel();
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
                $supervisor->updateSupervisorAccount(['user_id' => $_SESSION['user']['user_id'], 'full_name' => $_POST['full_name'], 'expected_projects' => $_POST['expected_projects'], 'description' => $_POST['description']]);
                $_SESSION['user']['full_name'] = $_POST['full_name'];
            }
            header("Location: " . BASE_URL . "/supervisor/account");
            exit();
        } else {
            $data['userData'] = $supervisor->getSupervisorData(['user_id' => $_SESSION['user']['user_id']])[0];
            $this->render("account", $data);
        }
    }

}