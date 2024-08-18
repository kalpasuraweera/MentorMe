<?php

class Supervisor
{
    use controller;

    public function index($data)
    {
        $this->render("dashboard");
    }
}