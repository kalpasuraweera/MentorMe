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
            'icon' => 'Group'
        ],
        [
            'text' => 'Manage Supervisors',
            'url' => '/coordinator/supervisors',
            'icon' => 'Group'
        ],
        [
            'text' => 'Manage Co-Supervisors',
            'url' => '/coordinator/coSupervisors',
            'icon' => 'Group'
        ],
        [
            'text' => 'Manage Groups',
            'url' => '/coordinator/groups',
            'icon' => 'Group'
        ],
        [
            'text' => 'Manage Examiners',
            'url' => '/coordinator/examiners',
            'icon' => 'Group'
        ],
        [
            'text' => 'System Settings',
            'url' => '/coordinator/systemsettings',
            'icon' => 'leader'
        ],
        [
            'text' => 'Calendar',
            'url' => '/coordinator/calendar',
            'icon' => 'calendar'
        ],
        [
            'text' => 'Logout',
            'url' => '/auth/logout',
            'icon' => 'logout'
        ]
    ];

    public function index($data)
    {
        $coordinator = new CoordinatorModel();
        $data['dashboardData'] = $coordinator->getDashboardData()[0];
        $data['groups'] = $coordinator->getAllGroups();
        $data['allTasks'] = $coordinator->getAllGroupTasks();
        $this->render("dashboard", $data);
    }

    public function calendar($data)
    {
        $eventModel = new EventModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create_event'])) {
                $eventModel->createEvent(['start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'creator_id' => $_SESSION['user']['user_id'], 'scope' => $_POST['scope']]);
            } else if (isset($_POST['edit_event'])) {
                $eventModel->updateEvent(['event_id' => $_POST['event_id'], 'start_time' => $_POST['start_time'], 'end_time' => $_POST['end_time'], 'title' => $_POST['title'], 'description' => $_POST['description'], 'scope' => $_POST['scope']]);
            } else if (isset($_POST['delete_event'])) {
                $eventModel->deleteEvent(['event_id' => $_POST['event_id']]);
            }
            header("Location: " . BASE_URL . "/coordinator/calendar");
            exit();
        } else {
            $data['eventList'] = $eventModel->getUserEvents(['user_id' => $_SESSION['user']['user_id'], 'role' => $_SESSION['user']['role']]);
            $this->render("calendar", $data);
        }
    }



    public function groups($data)
    {
        $coordinator = new CoordinatorModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['update_group'])) {
                $coordinator->updateGroup($_POST);
            } else if (isset($_POST['delete_one_group'])) {
                $coordinator->deleteGroup($_POST);
            } else if (isset($_POST['delete_all_groups'])) {
                $coordinator->deleteAllGroups();
            }else if (isset($_POST['search_group'])) {
                $searchTerm = trim($_POST['search']);
                //Filter the group list by group name
                $data['groupList'] = $coordinator->getGroupByGroupId($searchTerm);
                $this->render("groups", $data);
            }
            header("Location: " . BASE_URL . "/coordinator/groups");
            exit();
        } else {
            $data['groupList'] = $coordinator->getAllGroups();
            $data['supervisorList'] = $coordinator->getAllSupervisors();
            $data['coSupervisorList'] = $coordinator->getAllCoSupervisors();
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
                        // Sending email to each student
                        $student = array_combine($header, $row);
                        Mail::send(
                            $student['email'],
                            "Welcome to MentorMe",
                            "Dear " . $student['full_name'] . ",\n\nWelcome to MentorMe! We are excited to have you on board.\n\nPlease use the following credentials to log in to the system:\n\nEmail: " . $student['email'] . "\nPassword: " . $student['index_number'] . "\n\nBest regards,\nMentorMe Team"
                        );
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
            }//check if the search form is submitted
            else if (isset($_POST['search_student'])) {
                $searchTerm = trim($_POST['search']);
                //Filter the student list by index number
                $data['studentList'] = $coordinator->getStudentByIndexNumber($searchTerm);
                $this->render("students", $data);
            } else if (isset($_POST['filter']) && $_POST['filter'] !== 'all') {
                $filter = $_POST['filter'];
                //handle filtering by bracket
                $data['studentList'] = $coordinator->getStudentByBracket($filter);
                $this->render("students", $data);
            }

            header("Location: " . BASE_URL . "/coordinator/students");
            exit();
        } else {
            $data['studentList'] = $coordinator->getAllStudents();
            // echo "<script>console.log(" . json_encode($data['studentList']) . ");</script>";

            $this->render("students", $data);
        }
    }
    public function supervisors($data)
    {
        $coordinator = new CoordinatorModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['import_supervisors'])) {
                if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
                    $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
                    $header = fgetcsv($file);
                    $data = [];

                    while ($row = fgetcsv($file)) {
                        $data[] = array_combine($header, $row);

                        // Sending email to each supervisor
                        $supervisor = array_combine($header, $row);
                        Mail::send(
                            $supervisor['email'],
                            "Welcome to MentorMe",
                            "Dear " . $supervisor['full_name'] . ",\n\nWelcome to MentorMe! We are excited to have you on board.\n\nPlease use the following credentials to log in to the system:\n\nEmail: " . $supervisor['email'] . "\nPassword: " . $supervisor['email_id'] . "\n\nBest regards,\nMentorMe Team"
                        );
                    }
                    fclose($file);
                    $coordinator->importSupervisors($data);
                }

            } else if (isset($_POST['delete_all_supervisors'])) {
                $coordinator->deleteAllSupervisors();
            } else if (isset($_POST['delete_one_supervisor'])) {
                $coordinator->deleteSupervisor(['user_id' => $_POST['delete_one_supervisor']]);
            } else if (isset($_POST['update_supervisor'])) {
                $coordinator->updateSupervisor($_POST);
            }else if (isset($_POST['search_supervisor'])) {
                $searchTerm = trim($_POST['search']);
                $data['supervisorList'] = 
                $coordinator->getSupervisorByEmailId($searchTerm);
                $this->render("supervisors", $data);
            }



            header("Location: " . BASE_URL . "/coordinator/supervisors");
            exit();
        } else {

            $data['supervisorList'] = $coordinator->getAllSupervisors();
            $this->render("supervisors", $data);
        }
    }

    public function coSupervisors($data)
    {
        $coordinator = new CoordinatorModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['import_supervisors'])) {
                if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
                    $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
                    $header = fgetcsv($file);
                    $data = [];

                    while ($row = fgetcsv($file)) {
                        $data[] = array_combine($header, $row);

                        // Sending email to each co-supervisor
                        $coSupervisor = array_combine($header, $row);
                        Mail::send(
                            $coSupervisor['email'],
                            "Welcome to MentorMe",
                            "Dear " . $coSupervisor['full_name'] . ",\n\nWelcome to MentorMe! We are excited to have you on board.\n\nPlease use the following credentials to log in to the system:\n\nEmail: " . $coSupervisor['email'] . "\nPassword: " . $coSupervisor['email_id'] . "\n\nBest regards,\nMentorMe Team"
                        );
                    }
                    fclose($file);
                    $coordinator->importCoSupervisors($data);
                }

            } else if (isset($_POST['delete_all_supervisors'])) {
                $coordinator->deleteAllCoSupervisors();
            } else if (isset($_POST['delete_one_supervisor'])) {
                $coordinator->deleteCoSupervisor(['user_id' => $_POST['delete_one_supervisor']]);
            } else if (isset($_POST['update_supervisor'])) {
                $coordinator->updateCoSupervisor($_POST);
            }else if (isset($_POST['search_supervisor'])) {
                $searchTerm = trim($_POST['search']);
                $data['coSupervisorList'] = 
                $coordinator->getCoSupervisorByEmailId($searchTerm);
                $this->render("coSupervisors", $data);
            }


            //TODO: (We can add this via group page also)

            header("Location: " . BASE_URL . "/coordinator/coSupervisors");
            exit();
        } else {
            $data['coSupervisorList'] = $coordinator->getAllCoSupervisors();
            $this->render("coSupervisors", $data);
        }
    }

    public function examiners($data)
    {
        $coordinator = new CoordinatorModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['import_examiners'])) {
                if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
                    $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
                    $header = fgetcsv($file);
                    $data = [];

                    while ($row = fgetcsv($file)) {
                        $data[] = array_combine($header, $row);

                        // Sending email to each examiner
                        $examiner = array_combine($header, $row);
                        Mail::send(
                            $examiner['email'],
                            "Welcome to MentorMe",
                            "Dear " . $examiner['full_name'] . ",\n\nWelcome to MentorMe! We are excited to have you on board.\n\nPlease use the following credentials to log in to the system:\n\nEmail: " . $examiner['email'] . "\nPassword: " . $examiner['email_id'] . "\n\nBest regards,\nMentorMe Team"
                        );
                    }
                    fclose($file);
                    $coordinator->importExaminers($data);
                }

            } else if (isset($_POST['delete_all_examiners'])) {
                $coordinator->deleteAllExaminers();
            } else if (isset($_POST['delete_one_examiner'])) {
                $coordinator->deleteExaminer(['user_id' => $_POST['delete_one_examiner']]);
            } else if (isset($_POST['update_examiner'])) {
                $coordinator->updateExaminer($_POST);
            } else if (isset($_POST['search_examiner'])) {
                $searchTerm = trim($_POST['search']);
                $data['examinerList'] = $coordinator->getExaminerByEmailId($searchTerm);
                $this->render("examiners", $data);
            }
            else if (isset($_POST['filter']) && $_POST['filter'] !== 'all') {
                $filter = $_POST['filter'];
                //handle filtering by panel number
                $data['examinerList'] = $coordinator->getExaminerByPanelNumber($filter);
                $this->render("examiners", $data);
                
            }
            header("Location: " . BASE_URL . "/coordinator/examiners");
            exit();
        } else {

            $data['examinerList'] = $coordinator->getAllExaminers();
            $this->render("examiners", $data);
        }
    }

    public function systemsettings($data)
    {
        $timeTable = new TimeTableModel();
        $coordinator = new CoordinatorModel();

        if (isset($_POST['import_timetable'])) {
            if ($_POST['importTimeTableType'] == "CS") {
                if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
                    $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
                    $header = fgetcsv($file);
                    $data = [];

                    while ($row = fgetcsv($file)) {
                        $data[] = array_combine($header, $row);
                    }
                    // Print the data in the browser's console
                    // echo "<script>console.log(" . json_encode($data) . ");</script>";
                    $timeTable->importTimeTable($data, 'CS');
                    fclose($file);
                }
            } elseif ($_POST['importTimeTableType'] == "IS") {
                if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] === UPLOAD_ERR_OK) {
                    $file = fopen($_FILES['csv_file']['tmp_name'], 'r');
                    $header = fgetcsv($file);
                    $data = [];

                    while ($row = fgetcsv($file)) {
                        $data[] = array_combine($header, $row);
                    }
                    // Print the data in the browser's console

                    $timeTable->importTimeTable($data, 'IS');
                    fclose($file);
                }
            }
        } elseif (isset($_POST['delete_timetable'])) {
            if (isset($_POST['deleteTimeTableType'])) {
                $type = $_POST['deleteTimeTableType'];
                echo "<script>console.log('Delete Time Table : " . json_encode($type) . " ');</script>";
                $timeTable->deleteTimeTable($type);
            }
        } elseif (isset($_POST['StartCodeCheck'])) {
            $coordinator->startCodeCheck();
            // code check deadline
            // $coordinator->startCodeCheckDeadline([
            //     'deadline' => $_POST['deadline']]
            // );
            // exit();
        } elseif (isset($_POST['EndCodeCheck'])) {
            $coordinator->endCodeCheck();
            // exit();
        }

        $data['timeTable'] = $timeTable->getTimeTable();
        $data['codeCheck'] = $coordinator->getCodeCheckDetail();

        // echo "<script>console.log('Time table : " . json_encode($data['codeCheck']) . "');</script>";

        $this->render("systemsettings", $data);
    }
}