<?php

class Coordinator
{
    use controller;

    public $menu = [
        [
            'text' => 'Dashboard',
            'url' => '/coordinator/dashboard',
            'icon' => '/public/images/icons/dashboard_primary.png'
        ],
        [
            'text' => 'Manage Students',
            'url' => '/coordinator/students',
            'icon' => '/public/images/icons/dashboard_secondary.png'
        ],
        [
            'text' => 'Manage Supervisors',
            'url' => '/coordinator/supervisors',
            'icon' => '/public/images/icons/dashboard_secondary.png'
        ],
        [
            'text' => 'Manage Groups',
            'url' => '/coordinator/groups',
            'icon' => '/public/images/icons/dashboard_secondary.png'
        ],
        [
            'text' => 'Manage Examiners',
            'url' => '/coordinator/examiners',
            'icon' => '/public/images/icons/dashboard_secondary.png'
        ],
        [
            'text' => 'Calendar',
            'url' => '/coordinator/calendar',
            'icon' => '/public/images/icons/dashboard_secondary.png'
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