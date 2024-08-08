<?php

class Home
{
    use controller;
    public function index($data)
    {
        $this->render("home");
        $user = new User();
        // $data = [
        //     "id" => rand(10, 100),
        //     "name" => "kalpa" . rand(10, 100)
        // ];
        // $user->insert($data);
        print_r($user->findAll());
    }

    public function about($data)
    {
        $this->render("about");
    }

}