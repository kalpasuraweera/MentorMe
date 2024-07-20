<?php

class Home
{
    use controller;
    public function index($data)
    {
        $this->render("home");
    }

    public function about($data)
    {
        $this->render("about");
    }
}