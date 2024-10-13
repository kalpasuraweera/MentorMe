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
        //     "user_id" => rand(10, 100),
        //     "full_name" => "kalpa" . rand(10, 100)
        // ];
        // $user->insert($data);
        print_r($user->findOne(["user_id" => ["not" => 54], "full_name" => "kalpa32"], ["full_name"]));
        //print_r($user->update(["user_id" => 50], ["user_id" => 54, "full_name" => "kalpa32"]));
        //print_r($user->delete(["user_id" => 48, "full_name" => "kalpa12"]));
        // print_r($user->findMany(["user_id" => 50]));
        //print_r($user->findAll());
    }

    public function about($data)
    {
        $this->render("about");
    }

}