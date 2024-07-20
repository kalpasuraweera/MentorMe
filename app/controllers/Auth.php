<?php

class Auth
{
    use controller;

    public function index($data)
    {
        $this->login($data);
    }
    public function login($data)
    {
        $this->render("login");
    }

    public function signup($data)
    {
        $this->render("signup");
    }
}