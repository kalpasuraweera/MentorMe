<?php

class Auth
{
    use controller;

    private function handleLogin($email, $password)
    {
        $user = new User();
        $user = $user->findOne(["email" => $email]);
        if ($user) {
            if (password_verify($password, $user['password'])) { // password is hashed with password_hash(password, PASSWORD_DEFAULT)
                $_SESSION['user'] = $user;
                echo json_encode(["message" => "Login successful", "success" => true]);
            } else {
                echo json_encode(["message" => "Invalid password", "success" => false]);
            }
        } else {
            echo json_encode(["message" => "User not found", "success" => false]);
        }
    }

    public function index($data)
    {
        //if POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleLogin($_POST['email'], $_POST['password']);
        } else {
            $this->render("login");
        }
    }

    public function signup($data)
    {
        $this->render("signup");
    }
}