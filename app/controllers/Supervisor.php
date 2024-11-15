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
                $supervisorModel->acceptSupervisionRequest(data: ['request_id' => $_POST['accept_request'], 'supervisor_id' => (int) $_SESSION['user']['user_id'], 'group_id' => $_POST['group_id']]);
            } else if (isset($_POST['decline_request'])) {
                $supervisorModel->rejectSupervisionRequest(['request_id' => $_POST['decline_request']]);
            } else if (isset($_POST['accept_meeting_request'])) {
                $supervisorModel->acceptMeetingRequest(['request_id' => $_POST['request_id'], 'meeting_time' => $_POST['meeting_time']]);
                $supervisorModel->createMeetingEvent(['start_time' => $_POST['meeting_time'], 'end_time' => $_POST['meeting_time'], 'title' => "Supervisor Meeting", 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => 'GROUP_' . $_POST['group_id']]);
            } else if (isset($_POST['decline_meeting_request'])) {
                $supervisorModel->rejectMeetingRequest(['request_id' => $_POST['decline_meeting_request']]);
            }
            header("Location: " . BASE_URL . "/supervisor/requests");
            exit();
        } else {
            $supervisorRequests = $supervisorModel->getSupervisorRequests(['supervisor_id' => $_SESSION['user']['user_id']]);
            $meetingRequests = $supervisorModel->getMeetingRequests(['supervisor_id' => $_SESSION['user']['user_id']]);
            $data['allRequests'] = array_merge($supervisorRequests, $meetingRequests);
            $this->render("requests", $data);
        }
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
        $this->render("feedbacks");
    }

}