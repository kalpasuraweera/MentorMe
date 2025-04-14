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
            'icon' => 'calendar'
        ],
        [
            'text' => 'Groups',
            'url' => '/examiner/groups',
            'icon' => 'Group'
        ],
        [
            'text' => 'Account',
            'url' => '/examiner/account',
            'icon' => 'account'
        ],
        [
            'text' => 'Logout',
            'url' => '/auth/logout',
            'icon' => 'logout'
        ]
    ];

   public function index ($data)
   {
        $groupModel =new Groupmodel();
        $eventModel =new Eventmodel();

        $data['groupList']= $groupModel -> getExaminerGroups(['examinor_id' => $_SESSION['user']['user_id']]);
        $data['groupTasks'] = $groupModel -> getExaminerGroupTasks(['examiner_id' => $_SESSION['user']['user_id']]);

        $data['toDoTasks'] = array_filter($data['groupTasks'],function($task){
            return $task['status'] == 'TO_DO';

        });

        $data['inProgressTasks'] = array_filter($data['groupTasks'],function($task){
            return $task['status'] == 'IN_PROGRESS';

        });

        $data['inReviewTasks'] = array_filter($data['groupTasks'],function($task){
            return $task['status'] == 'IN_REVIEW';

        });

        $data['completedTasks'] = array_filter($data['groupTasks'],function($task){
            return $task['status'] == 'COMPLETED';

        });

        $data['eventList'] = $eventModel->getUserEvents(['user_id' => $_SESSION['user']['user_id'], 'role' => $_SESSION['user']['role']]);

        $this->render("dashboard", $data);



   }

    public function calendar($data)
    {
        $eventModel = new EventModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create_event'])) {
                $eventModel->createEvent(['start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => $_POST['scope']]);
            } else if (isset($_POST['edit_event'])) {
                $eventModel->updateEvent(['event_id' => $_POST['event_id'], 'start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'scope' => $_POST['scope']]);
            } else if (isset($_POST['delete_event'])) {
                $eventModel->deleteEvent(['event_id' => $_POST['event_id']]);
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
        $data['groupList'] = $groupModel->getExaminerGroups(['examiner_id' => $_SESSION['user']['user_id']]);
        $data['allTasks'] = $groupModel->getExaminerGroupTasks(['examiner_id' => $_SESSION['user']['user_id']]);
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
            $data['feedbackList'] = $feedbackModel->getGroupFeedbacks(['group_id' => $_GET['group_id']]);
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
