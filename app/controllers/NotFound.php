<?php

class NotFound
{
    use controller;
    public function index($data)
    {
        $this->render("Not Found");
    }
}