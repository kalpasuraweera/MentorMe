<?php

class Supervisor
{
    use controller;
    public $menu = [
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
        $this->render("calendar");
    }

    public function groups($data)
    {
        $this->render("groups");
    }

    public function requests($data)
    {
        $supervisorModel = new SupervisorModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['accept_request'])) {
                $supervisorModel->acceptSupervisionRequest(['request_id' => $_POST['accept_request']]);
            } else if (isset($_POST['decline_request'])) {
                $supervisorModel->rejectSupervisionRequest(['request_id' => $_POST['decline_request']]);
            }
            header("Location: " . BASE_URL . "/supervisor/requests");
            exit();
        } else {
            $data['supervisorRequests'] = $supervisorModel->getSupervisorRequests(['supervisor_id' => $_SESSION['user']['user_id']]);
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

}