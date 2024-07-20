<?php

class Auth
{
    use controller;

    public function index($data)
    {
        $this->render("login");
    }

    public function signup($data)
    {
        $this->render("signup");
    }
}