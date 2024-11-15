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
        $this->render("calendar");
    }

    public function groups($data)
    {
        $this->render("groups");
    }
}