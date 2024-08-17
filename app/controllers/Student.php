<?php 

class Student
{
    use controller;

    public function dashboard($data){
        $this->render("dashboard");
    }
}