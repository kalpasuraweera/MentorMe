<?php

class Unauthorized
{
    use controller;

    public function index()
    {
        $this->render("unauthorized");
    }
}