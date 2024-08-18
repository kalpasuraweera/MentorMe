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
                $data = [
                    "id" => $user['id'],
                    "name" => $user['name'],
                    "email" => $user['email'],
                    "role" => $user['role'],
                ];

                // store user data in session
                $_SESSION['user'] = $data;

                echo json_encode(["message" => "Login successful", "success" => true, "data" => $data]);
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

    public function choose($data)
    {
        $this->render("choose");
    }
}