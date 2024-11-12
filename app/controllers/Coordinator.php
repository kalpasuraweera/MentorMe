<?php

class Coordinator
{
    use controller;

    public $sidebarMenu = [
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
        $eventModel = new EventModel();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(isset($_POST['create_event'])){
                $eventModel->createEvent(['start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => $_POST['scope']]);
            }
            header("Location: " . BASE_URL . "/coordinator/calendar");
            exit();
        }else{
            $data['eventList'] = $eventModel->getUserEvents(['user_id' => $_SESSION['user']['user_id'], 'role' => $_SESSION['user']['role']]);
            $this->render("calendar", $data);
        }
    }

    public function examiners($data)
    {
        $this->render("examiners");
    }

    public function groups($data)
    {
        $coordinator = new CoordinatorModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['update_group'])) {
                $coordinator->updateGroup($_POST);
            }
            header("Location: " . BASE_URL . "/coordinator/groups");
            exit();
        } else {
            $data['groupList'] = $coordinator->getAllGroups();
            $this->render("groups", $data);
        }
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
            } else if (isset($_POST['delete_all_students'])) {
                $coordinator->deleteAllStudents();
            } else if (isset($_POST['delete_one_student'])) {
                $coordinator->deleteUser(['user_id' => $_POST['delete_one_student']]);
            } else if (isset($_POST['update_student'])) {
                $coordinator->updateStudent($_POST);
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
        $coordinator = new CoordinatorModel();
        if ($_SERVER['REQUEST_METHOD']=== 'POST'){
            if (isset($_POST['update_supervisor'])){
                $coordinator->updateSupervisor($_POST);
            }
            header("Location: " . BASE_URL . "/coordinator/supervisors");
            exit();
        }

        else{

        $data['supervisorList'] = $coordinator->getAllSupervisors();
        $this->render("supervisors", $data);
        }
    }
}