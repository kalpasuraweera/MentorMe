<?php

class Coordinator
{
    use controller;

    public $menu = [
        [
            'text' => 'Dashboard',
            'url' => '/coordinator/dashboard',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Manage Students',
            'url' => '/coordinator/students',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Manage Supervisors',
            'url' => '/coordinator/supervisors',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Manage Groups',
            'url' => '/coordinator/groups',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Manage Examiners',
            'url' => '/coordinator/examiners',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Calendar',
            'url' => '/coordinator/calendar',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Logout',
            'url' => '/auth/logout',
            'icon' => 'dashboard'
        ]
    ];

    public function index($data)
    {
        $this->render("dashboard");
    }

    public function calendar($data)
    {
        $this->render("calendar");
    }

    public function examiners($data)
    {
        $this->render("examiners");
    }

    public function groups($data)
    {
        $this->render("groups");
    }

    public function students($data)
    {
        $coordinator = new CoordinatorModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['import_students'])) {
                if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
                    $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
                    $header = fgetcsv($file);
                    $data = [];
                    while ($row = fgetcsv($file)) {
                        $data[] = array_combine($header, $row);
                    }
                    fclose($file);
                    $coordinator->importStudents($data);
                }
                // TODO:We have to handle all the errors here like file not uploaded, file not in csv format, etc
            }else if (isset($_POST['delete_all_students'])) {
                $coordinator->deleteAllStudents();
            }else if (isset($_POST['delete_student'])) {
                $coordinator->deleteStudent(['user_id' => $_POST['delete_student']]);
            }else if (isset($_POST['update_student'])) {
                $coordinator->updateStudent(['user_id' => $_POST['user_id'], 'full_name' => $_POST['full_name'], 'email' => $_POST['email'], 'registration_number' => $_POST['registration_number'], 'index_number' => $_POST['index_number'], 'year' => $_POST['year'], 'course' => $_POST['course'], 'bracket' => $_POST['bracket'], 'group_id' => $_POST['group_id'] ?? null]);
            }
            header("Location: " . BASE_URL . "/coordinator/students");
            exit();
        } else {
            $data['studentList'] = $coordinator->getAllStudents();
            $this->render("students", $data);
        }

    }

    public function supervisors($data)
    {
        $this->render("supervisors");
    }
}