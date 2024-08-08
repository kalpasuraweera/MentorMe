<?php

class Home
{
    use controller;
    public function index($data)
    {
        $this->render("home");

        // sample crud usage
        $user = new User();
        // $data = [
        //     "id" => rand(10, 100),
        //     "name" => "kalpa" . rand(10, 100)
        // ];
        // $user->insert($data);
        //print_r($user->findOne(["id" => 54, "name" => "kalpa32"], ["name"]));
        print_r($user->update(["id" => 50], ["id" => 54, "name" => "kalpa32"]));
        //print_r($user->delete(["id" => 48, "name" => "kalpa12"]));
        // print_r($user->findMany(["id" => 50]));
        print_r($user->findAll());
    }

    public function about($data)
    {
        $this->render("about");
    }

}