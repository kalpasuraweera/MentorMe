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
            'text' => 'Logout',
            'url' => '/auth/logout',
            'icon' => 'dashboard'
        ]
    ];

    public function index($data)
    {
        $this->render("dashboard");
    }

    public function calendar($data)
    {
        $eventModel = new EventModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create_event'])) {
                $eventModel->createEvent(['start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => $_POST['scope']]);
            }
            header("Location: " . BASE_URL . "/coordinator/calendar");
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
        $this->render("groups", $data);
    }

    public function notes($data)
    {
        $this->render("notes");
    }

    public function tasks($data)
    {
        $this->render("tasks");
    }

    public function feedbacks($data)
    {
        $feedbackModel = new FeedbackModel();
        $groupModel = new GroupModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add_feedback'])) {
                $feedbackModel->addExaminerFeedback(['group_id' => $_POST['group_id'], 'user_id' => $_SESSION['user']['user_id'], 'feedback' => $_POST['feedback']]);
            }else if (isset($_POST['edit_feedback'])) {
                $feedbackModel->editFeedback(['feedback_id' => $_POST['feedback_id'], 'feedback' => $_POST['feedback']]);
            }else if (isset($_POST['delete_feedback'])) {
                $feedbackModel->deleteFeedback(['feedback_id' => $_POST['feedback_id']]);
            }
            header("Location: " . BASE_URL . "/examiner/feedbacks?group_id=".$_POST['group_id']);
            exit();
        } else {
            $data['feedbackList'] = $feedbackModel->getExaminerFeedbacks(['user_id' => $_SESSION['user']['user_id'], 'group_id' => $_GET['group_id']]);
            $data['groupDetails'] = $groupModel->getGroup(['group_id' => $_GET['group_id']])[0];
            $this->render("feedbacks", $data);
        }
    }



}