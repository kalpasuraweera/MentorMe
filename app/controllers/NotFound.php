<?php

class NotFound
{
    use controller;
    public function index($data)
    {
        $this->render("notFound");
    }
}