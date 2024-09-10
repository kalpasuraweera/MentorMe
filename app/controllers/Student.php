<?php

class Student
{
    use controller;

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