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
            }
            header("Location: " . BASE_URL . "/supervisor/requests");
            exit();
        } else {
            $supervisorRequests = $supervisorModel->getSupervisorRequests(['supervisor_id' => $_SESSION['user']['user_id']]);
            $meetingRequests = $supervisorModel->getMeetingRequests(['supervisor_id' => $_SESSION['user']['user_id']]);
            $data['allRequests'] = array_merge($supervisorRequests, $meetingRequests);
            if(isset($_GET['group_id'])) {
                $data['allRequests'] = array_filter($data['allRequests'], function($request) {
                    return $request['group_id'] == $_GET['group_id'];
                });
            }
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
        $this->render("tasks");
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

}