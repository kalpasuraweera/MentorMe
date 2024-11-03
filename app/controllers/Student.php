<?php

class Student
{
    use controller;
    public $SidebarMenu = [
        [
            'text' => 'Dashboard',
            'url' => '/student/dashboard',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Calender',
            'url' => '/student/calender',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Tasks',
            'url' => '/student/tasks',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Schedules',
            'url' => '/student/schedules',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Settings',
            'url' => '/student/settings',
            'icon' => 'dashboard'
        ],
        [
            'text' => 'Logout',
            'url' => '/auth/logout',
            'icon' => 'dashboard'
        ]
    ];
    protected $studentData;

    public function __construct()
    {
        $student = new StudentModel();
        $this->studentData = $student->findOne(["user_id" => $_SESSION['user']['user_id']]);
        // Add Leader Options if the user is a student leader
        if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'STUDENT_LEADER') {
            $this->SidebarMenu = [
                [
                    'text' => 'Dashboard',
                    'url' => '/student/dashboard',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Calender',
                    'url' => '/student/calender',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Tasks',
                    'url' => '/student/tasks',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Schedules',
                    'url' => '/student/schedules',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Settings',
                    'url' => '/student/settings',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Leader Options',
                    'url' => '/student/leader',
                    'icon' => 'dashboard'
                ],
                [
                    'text' => 'Logout',
                    'url' => '/auth/logout',
                    'icon' => 'dashboard'
                ]
            ];
        }
    }

    public function index($data)
    {
        $tasks = new TaskModel();

        // getTaskDetail function in models/TaskModel.php
        $data['inprogressTasks'] = $tasks->getTaskDetail('IN_PROGRESS');

        $this->render("dashboard", $data);
    }

    public function calender($data)
    {
        $this->render("calender");
    }

    public function tasks($data)
    {
        $tasks = new TaskModel();
        // getTaskDetail function in models/TaskModel.php
        $data['pendingTasks'] = $tasks->getTaskDetail('PENDING');
        $data['completeTasks'] = $tasks->getTaskDetail('COMPLETED');
        $data['inprogressTasks'] = $tasks->getTaskDetail('IN_PROGRESS');


        // Debug output for tasks
        // echo '<pre>';
        // print_r($data['tasks']);
        // echo '</pre>';

        echo '<script>console.log("before submit");</script>';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //get data from component 'addTaskBox' in task
            $tasks->addTask([
                'task_type' => $_POST['taskType'],
                'title' => $_POST['taskTitle'],
                'description' => $_POST['taskDescription'],
                'start_date' => $_POST['startDate'],
                'end_date' => $_POST['endDate'],
                'estimated_time' => $_POST['estimatedTime'],
                'status' => 'NEW',
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            echo '<script>console.log("after submit");</script>';

            //from this we prevent re rendering the page and (had to use caz when i put data into form it doest romove value and add values auto when i refresh page)
            header("Location: " . BASE_URL . "/student/tasks");
            exit();
        }

        //echo '<script>console.log("Soon as get to task");</script>';
        $this->render("tasks", $data);
    }
    public function schedules($data)
    {
        $this->render("schedules");
    }
    public function settings($data)
    {
        $this->render("settings");
    }
    public function feedbacks($data)
    {
        $this->render("feedbacks");
    }
    public function supervisorData($data)
    {
        $this->render("supervisorData");
    }
    public function leader($data)
    {
        $student = new StudentModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['cancel_request'])) {
                $student->deleteGroupRequest(['request_id' => $_POST['request_id']]);
            } else if (isset($_POST['update_request'])) {
                $student->updateGroupRequest(['request_id' => $_POST['request_id'], 'project_title' => $_POST['project_title'], 'idea' => $_POST['idea'], 'reason' => $_POST['reason']]);
            }
            header("Location: " . BASE_URL . "/student/leader");
            exit();
        } else {
            $data['groupRequests'] = $student->getGroupRequests(['group_id' => $this->studentData['group_id']]);
            $this->render("leader", $data);
        }

    }

    public function requestSuperVisor($data)
    {
        $supervisor = new SupervisorModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $supervisor->sendSupervisionRequest([
                'group_id' => $this->studentData["group_id"],
                'supervisor_id' => $_POST['supervisor_id'],
                'project_title' => $_POST['project_title'],
                'idea' => $_POST['idea'],
                'reason' => $_POST['reason'],
                'date' => date('Y-m-d H:i:s'), // Current date and time
                'status' => 'PENDING' // Default status
            ]);
            header("Location: " . BASE_URL . "/student/leader");
            exit();
        } else {
            $data['supervisors'] = $supervisor->getAvailableSupervisors($this->studentData['group_id']);
            //$data will be passed to the view as $pageData
            $this->render("requestSuperVisor", pageData: $data);

        }
    }
}
