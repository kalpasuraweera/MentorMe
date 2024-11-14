<?php

class Examiner
{
    use controller;

    public function index($data)
    {
        $this->render("dashboard");
    }

    public function feedbacks($data)
    {
        $this->render("feedbacks");
    }

    public function calander($data)
    {
        $this->render("calander");
    }

    public function groups($data)
    {
        $this->render("groups");
    }
}