<?php

class Student
{
    use controller;
    use Database;

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

    public function index($data)
    {

        $events = $this->getEvents();

        // prepare an array to specific event data
        $eventDetails = [];


        // Iterate over events and extract desired elements
        foreach ($events as $event) {
            $eventDetails[] = [
                'event_id' => $event['event_id'],           // Assuming 'event_id' is the ID
                'title' => $event['title'],
                'description' => $event['description'],            // Assuming 'title' is the name
                'start_date' => $event['start_date'],         // Assuming 'end_date' is the date
                'end_date' => $event['end_date'],         // Assuming 'end_date' is the date
            ];
            echo '<script>console.log(' . json_encode($event) . ');</script>';
        }

        // Store the prepared event details in the session
        $_SESSION['events'] = $eventDetails;
        
        // Debugging: Print the event details array
        //echo '<pre>';
        //print_r($eventDetails); // Print the event details array
        //echo '</pre>';

        $this->render("dashboard"); // Pass to the view
    }

    public function calender($data)
    {
        $this->render("calender");
    }

    public function tasks($data)
    {
        $this->render("tasks");
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

    public function getEvents()
    {
        $currentDate = date('Y-m-d');
        $query = "SELECT * FROM event WHERE end_date >= :currentDate ORDER BY end_date ASC"; 
        
        // Bind the current date and execute the query
        //['currentDate' => $currentDate] by using this we prevent sql injections. we can use anoither word and change it when runs :currentDate we can add any name
        return $this->execute($query, ['currentDate' => $currentDate]);
    }
}
