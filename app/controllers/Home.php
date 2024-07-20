<?php

class Home
{
    use controller;
    public function index()
    {
        $this->render("home");
    }

    public function about()
    {
        $this->render("about");
    }
}