<?php

class Student
{
    use controller;
    public $SidebarMenu = [
        [
            'text' => 'Dashboard',
            'url' => '/student/dashboard',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Calender',
            'url' => '/student/calender',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Tasks',
            'url' => '/student/tasks',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Schedules',
            'url' => '/student/schedules',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Settings',
            'url' => '/student/settings',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Logout',
            'url' => '/auth/logout',
            'icon' => 'dashboard'
        ]
    ];

    public function __construct()
    {
        // Add Leader Options if the user is a student leader
        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'STUDENT_LEADER') {
            $this->SidebarMenu = [
                [
                    'text' => 'Dashboard',
                    'url' => '/student/dashboard',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Calender',
                    'url' => '/student/calender',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Tasks',
                    'url' => '/student/tasks',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Schedules',
                    'url' => '/student/schedules',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Settings',
                    'url' => '/student/settings',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Leader Options',
                    'url' => '/student/leader',
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
        $this->render("dashboard");
    }

    public function calender($data)
    {
        $this->render("calender");
    }

    public function tasks($data)
    {
        $this->render("tasks");
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
        $this->render("feedbacks");
    }
    public function supervisorData($data)
    {
        $this->render("supervisorData");
    }
    public function leader($data)
    {
        $this->render("leader");
    }

    public function requestSuperVisor($data)
    {
        $supervisor = new SupervisorModel();
        $data['supervisors'] = $supervisor->getAvailableSupervisors();

        $this->render("requestSuperVisor", $data);
    }
}
