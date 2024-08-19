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
        $this->render("requests");
    }

}