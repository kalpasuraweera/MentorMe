<?php

class Coordinator
{
    use controller;

    public $menu = [
        [
            'text' => 'Dashboard',
            'url' => '/coordinator/dashboard',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Manage Students',
            'url' => '/coordinator/students',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Manage Supervisors',
            'url' => '/coordinator/supervisors',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Manage Groups',
            'url' => '/coordinator/groups',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Manage Examiners',
            'url' => '/coordinator/examiners',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Calendar',
            'url' => '/coordinator/calendar',
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

    public function examiners($data)
    {
        $this->render("examiners");
    }

    public function groups($data)
    {
        $this->render("groups");
    }

    public function students($data)
    {
        $this->render("students");
    }

    public function supervisors($data)
    {
        $this->render("supervisors");
    }
}