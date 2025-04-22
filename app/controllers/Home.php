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

    public function contact($data)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            // Get admin email from the database
            $userModel = new User();
            $user = $userModel->findOne(["role"=> "COORDINATOR"]);
            
            // Get form data
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            // Send email to admin
            Mail::send(
                $user['email'],
                "MentorMe Contact Form Submission",
                "Dear Coordinator,\n\nYou have received a new contact form submission:\n\nName: {$name}\nEmail: {$email}\n\nMessage:\n{$message}\n\nBest regards,\nThe MentorMe Team"
            );

            // Set a session variable to indicate that the message was sent
            $_SESSION['message_sent'] = true;

            // Redirect to home with a success message
            header("Location: " . BASE_URL . "/home/contact");
            exit();
        } else {
            $this->render("contact");
        }
    }

}