<?php

class Coordinator
{
    use controller;

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