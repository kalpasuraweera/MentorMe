<?php

class Student
{
    use controller;

    public function index($data)
    {
        $this->render("dashboard");
    }
}