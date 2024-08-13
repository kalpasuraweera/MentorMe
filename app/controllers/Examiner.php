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
}