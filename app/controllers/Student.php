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
}