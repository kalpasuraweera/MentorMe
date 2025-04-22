<?php

class Auth
{
    use controller;

    public function index($data)
    {
        //if POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->handleLogin($_POST['email'], $_POST['password']);
        } else {
            $this->render("login");
        }
    }

    public function logout($data)
    {
        session_destroy();
        header("Location: " . BASE_URL);
        exit();
    }

    public function choose($data)
    {
        if (isset($_POST['supervisor'])) {
            $_SESSION['user']['role'] = 'SUPERVISOR';
            header("Location: " . BASE_URL . "/supervisor");
            exit();
        } else if (isset($_POST['examiner'])) {
            $_SESSION['user']['role'] = 'EXAMINER';
            header("Location: " . BASE_URL . "/examiner");
            exit();
        } else {
            //TODO: check if presentation is ongoing if not redirect to supervisor dashboard
            $this->render("choose");
        }
    }

    private function handleLogin($email, $password)
    {
        $userModel = new User();
        $user = $userModel->findOne(["email" => $email]);
        if ($user) {
            if (password_verify($password, $user['password'])) { // password is hashed with password_hash(password, PASSWORD_DEFAULT)
                $data = [
                    "user_id" => $user['user_id'],
                    "full_name" => $user['full_name'],
                    "email" => $user['email'],
                    "role" => $user['role'],
                    "profile_picture" => $user['profile_picture'],
                ];

                if ($user['role'] === 'STUDENT' || $user['role'] === 'STUDENT_LEADER') {
                    $student = new StudentModel();
                    $student = $student->findOne(["user_id" => $user['user_id']]);
                    $data['group_id'] = $student['group_id'];
                }

                // store user data in session and update last login
                $_SESSION['user'] = $data;
                $userModel->update(["last_login" => date("Y-m-d H:i:s")], ["user_id" => $user['user_id']]);
                echo json_encode(["message" => "Login successful", "success" => true, "data" => $data]);
            } else {
                echo json_encode(["message" => "Invalid password", "success" => false]);
            }
        } else {
            echo json_encode(["message" => "User not found", "success" => false]);
        }
    }

    public function resetPassword($data)
    {
        $userModel = new User();
        $user = $userModel->findOne(["email" => $_POST['email']]);
        if ($user) {
            // Generate a random strong password
            $newPassword = bin2hex(random_bytes(8)); // 16 characters long

            // Update user's password with the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $userModel->update(["password" => $hashedPassword], ["user_id" => $user['user_id']]);

            // Send email
            Mail::send(
                $user['email'],
                "MentorMe Password Reset",
                "Dear {$user['full_name']},\n\nYour password for MentorMe has been reset.\n\nYour new password is: {$newPassword}\n\nPlease log in with this temporary password and change it immediately for security purposes.\n\nIf you did not request a password reset, please contact your system administrator immediately as your account may have been compromised.\n\nBest regards,\nThe MentorMe Team"
            );

            echo json_encode(["message" => "Reset data sent to your email", "success" => true]);
        } else {
            echo json_encode(["message" => "User not found", "success" => false]);
        }

    }

    public function verifyPassword($data)
    {
        if (isset($_POST['password'])) {
            $userModel = new User();
            $user = $userModel->findOne(["user_id" => $_SESSION['user']['user_id']]);
            if (password_verify($_POST['password'], $user['password'])) {
                echo json_encode(["message" => "Password verified", "success" => true]);
            } else {
                echo json_encode(["message" => "Invalid password", "success" => false]);
            }
        }
    }

    public function updatePassword($data)
    {
        if (isset($_POST['password'])) {
            $userModel = new User();
            $userModel->update(["password" => password_hash($_POST['password'], PASSWORD_DEFAULT)], ["user_id" => $_SESSION['user']['user_id']]);
            echo json_encode(["message" => "Password updated", "success" => true]);
        }
    }
}