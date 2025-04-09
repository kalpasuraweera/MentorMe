<?php

class Examiner
{
    use controller;
    public $sidebarMenu = [
        [
            'text' => 'Dashboard',
            'url' => '/examiner/dashboard',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Calendar',
            'url' => '/examiner/calendar',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Groups',
            'url' => '/examiner/groups',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Account',
            'url' => '/examiner/account',
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
        $supervisorGroups = $GroupModel->getExaminerGroups(['examiner_id' => $_SESSION['user']['user_id']]);

        // saves all tasks details relavent to groupID
        $data['groupCompletedTask'] = []; // Initialize as an array
        foreach ($supervisorGroups as $group) {
            $data['groupCompletedTask'][$group['group_id']] = $TaskModel->groupTaskDetail($group['group_id']);
        }

        // $data = $_GET['group_id'];
        // echo "<script>console.log(" . json_encode($data['groupCompletedTask']) . ");</script>";
        $this->render("dashboard", $data);
    }

    public function calendar($data)
    {
        $eventModel = new EventModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create_event'])) {
                $eventModel->createEvent(['start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => $_POST['scope']]);
            }
            header("Location: " . BASE_URL . "/examiner/calendar");
            exit();
        } else {
            $data['eventList'] = $eventModel->getUserEvents(['user_id' => $_SESSION['user']['user_id'], 'role' => $_SESSION['user']['role']]);
            $this->render("calendar", $data);
        }
    }

    public function groups($data)
    {
        $groupModel = new GroupModel();
        $studentModel = new StudentMOdel();
        $taskModel = new TaskModel;

        $data['groupList'] = $groupModel->getSupervisorGroups(['supervisor_id' => $_SESSION['user']['user_id']]);

        // The & (ampersand) in PHP is used to pass variables by reference instead of by value. 
        // This means that changes made inside the loop directly modify the original array instead of modifying a copy.
        // adding members details 
        foreach ($data['groupList'] as &$group) {
            $group['members'] = $studentModel->getGroupMembersDetail($group['group_id']);
        }
        // echo "<script>console.log(" . json_encode($data['groupList']) . ");</script>";

        // from here i am goinng to add each student task details into this
        // accessing member arrays by each lyer
        foreach ($data['groupList'] as &$group) {
            foreach ($group['members'] as &$member) {
                // Format the date if LastCompletedTask exists
                $lastTaskData = $taskModel->LastCompleteTask($member['user_id'])[0]['end_time'] ?? null;

                // only get availble date tasks anothers will set null if task not exits
                if (!empty($lastTaskData)) {
                    $formattedDate = date("d M Y", strtotime($lastTaskData));
                } else {
                    $formattedDate = null;
                }

                // echo "<script>console.log(" . json_encode($formattedDate) . ");</script>";
                // if we use this separetely then this overwites 
                $member['TasksDetails'] = [
                    'CompletedCount' => $taskModel->completeTaskCount($member['user_id'])[0]['CompletedTaskCount'] ?? 0,
                    'LastCompletedTask' => $formattedDate
                ];
                // echo "<script>console.log(" . json_encode($member) . ");</script>";

            }
        }


        $this->render("groups", $data);
    }

    public function notes($data)
    {
        $noteModel = new NoteModel();
        $groupModel = new GroupModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_note'])) {
                $noteModel->addExaminerNote(['group_id' => $_POST['group_id'], 'user_id' => $_SESSION['user']['user_id'], 'note' => $_POST['note']]);
            } else if (isset($_POST['edit_note'])) {
                $noteModel->editNote(['note_id' => $_POST['note_id'], 'note' => $_POST['note']]);
            } else if (isset($_POST['delete_note'])) {
                $noteModel->deleteNote(['note_id' => $_POST['note_id']]);
            }
            header("Location: " . BASE_URL . "/examiner/notes?group_id=" . $_POST['group_id']);
            exit();
        } else {
            $data['noteList'] = $noteModel->getExaminerNotes(['user_id' => $_SESSION['user']['user_id'], 'group_id' => $_GET['group_id']]);
            $data['groupDetails'] = $groupModel->getGroup(['group_id' => $_GET['group_id']])[0];
            $this->render("notes", $data);
        }
    }

    public function tasks($data)
    {
        $tasks = new TaskModel();
        $student = new StudentModel();
        // examiners can only see the tasks and add comments to the tasks of the groups they are supervising
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['addComment']) && isset($_POST['task_id'])) {
                $tasks->addComment([
                    'task_id' => $_POST['task_id'],
                    'user_id' => $_SESSION['user']['user_id'],
                    'comment' => $_POST['comment'],
                ]);

            }
            header("Location: " . BASE_URL . "/examiner/tasks?group_id=" . $_POST['group_id']);
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

    public function feedbacks($data)
    {
        $feedbackModel = new FeedbackModel();
        $groupModel = new GroupModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_feedback'])) {
                $feedbackModel->addExaminerFeedback(['group_id' => $_POST['group_id'], 'user_id' => $_SESSION['user']['user_id'], 'feedback' => $_POST['feedback']]);
            } else if (isset($_POST['edit_feedback'])) {
                $feedbackModel->editFeedback(['feedback_id' => $_POST['feedback_id'], 'feedback' => $_POST['feedback']]);
            } else if (isset($_POST['delete_feedback'])) {
                $feedbackModel->deleteFeedback(['feedback_id' => $_POST['feedback_id']]);
            }
            header("Location: " . BASE_URL . "/examiner/feedbacks?group_id=" . $_POST['group_id']);
            exit();
        } else {
            $data['feedbackList'] = $feedbackModel->getExaminerFeedbacks(['user_id' => $_SESSION['user']['user_id'], 'group_id' => $_GET['group_id']]);
            $data['groupDetails'] = $groupModel->getGroup(['group_id' => $_GET['group_id']])[0];
            $this->render("feedbacks", $data);
        }
    }

    public function account($data)
    {
        $examiner = new ExaminerModel();
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
                $examiner->updateExaminer(['user_id' => $_SESSION['user']['user_id'], 'full_name' => $_POST['full_name'], 'description' => $_POST['description']]);
                $_SESSION['user']['full_name'] = $_POST['full_name'];
            }
            header("Location: " . BASE_URL . "/examiner/account");
            exit();
        } else {
            $data['userData'] = $examiner->getExaminerData(['user_id' => $_SESSION['user']['user_id']])[0];
            $this->render("account", $data);
        }
    }



}
