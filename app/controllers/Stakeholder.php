<?php

class Stakeholder
{
    use controller;

    public function index($data)
    {
        $this->render("dashboard");
    }
}