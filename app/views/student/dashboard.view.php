<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/student_dashboard.css">

    <title>MentoMe</title>
</head>
<body class=".bg-primary-color">
    <div class="layout-container">
        <div class="block-1">
            <div class="block-1-header">
                <img src="<?= BASE_URL ?>/public/images/logo.png" alt="logo">
                    <div class="block-1-header-text">
                        <h1 >MentorMe</h1>
                        <h4>DASHBOARD</h4>
                    </div>
            </div>
            <div class="block-1-maincontent">
                <button ><img src="<?= BASE_URL ?>/public/images/icons/dashboard.png" alt="home_icon"><h4><a href="<?= BASE_URL ?>/student/dashboard">Home</a></h4></button>
                <button ><img src="<?= BASE_URL ?>/public/images/icons/calender.png" alt="calender_icon"><h4><a href="<?= BASE_URL ?>/student/calender">calender</a></h4></button>
                <button ><img src="<?= BASE_URL ?>/public/images/icons/task.png" alt="tasks_icon"><h4><a href="<?= BASE_URL ?>/student/tasks">Tasks</a></h4></button>
                <button><img src="<?= BASE_URL ?>/public/images/icons/schedules.png" alt="schedules_icon"><h4><a href="<?= BASE_URL ?>/student/schedules">Schedules</a></h4></button>
                <button><img src="<?= BASE_URL ?>/public/images/icons/settings.png" alt="settings_icon"><h4><a href="<?= BASE_URL ?>/student/settings">Settings</a></h4></button>
            </div>
            <div class="block-1-footer">
                <button><img src="<?= BASE_URL ?>/public/images/icons/logout_icon.png" alt="logout_icon"><h4><a href="<?= BASE_URL ?>/auth/logout">Log-Out</a></h4></button>
            </div>
        </div>
        <div class="block-2">
            <div class="block-2-header">
                <div class="block-2-header-text">
                    <h1>Dashboard</h1>
                </div>
                <div class="profile">
                    <div class="profile-detail">
                        <h1><?= $_SESSION['user']['role'] ?></h1>
                        <h3><?= $_SESSION['user']['email'] ?></h3></div>
                    <div class="profile-picture">
                        <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="profile pic">
                    </div>
                </div>
            </div>
            <div class="block-2-maincontent-1">
                <div class="block-2-maincontent-1-card-1">
                    <h2>Total Tasks<br>100</h2>
                    
                </div>
                <div class="block-2-maincontent-1-card-2">
                    <h2>Finished Tasks</h2>
                </div>
                <div class="block-2-maincontent-1-card-3">
                    <h2>Yet to finish</h2>
                </div>
                <div class="block-2-maincontent-1-card-4">
                    <h2>Total Finish Tasks</h2>
                </div>
            </div>            
            <div class="block-2-maincontent-2">
                <div class="block-2-maincontent-2-card-1">
                    <h2>Visitor Insights</h2>
                        <!-- importing charts to web -->
                        <canvas id="CurrentSpeed"></canvas>
                </div>
                <div class="block-2-maincontent-2-card-2">
                    <h2>Assigned Tasks</h2>
                    <div class="tasks">
                    <div class="task" style="border-left: 5px solid #4318ff;">
                        <h3 class="task-name">Task 1</h3>
                        <h4 class="task-date">UI Design Review</h4>
                    </div>
                    <div class="task" style="border-left: 5px solid #ff1843;">
                        <h3 class="task-name">Task 2</h3>
                        <h4 class="task-date">Backend API Integration</h4>
                    </div>
                    <div class="task" style="border-left: 5px solid #18ff43;">
                        <h3 class="task-name">Task 3</h3>
                        <h4 class="task-date">Database Optimization</h4>
                    </div>
                    <div class="task" style="border-left: 5px solid #4318ff;">
                        <h3 class="task-name">Task 4</h3>
                        <h4 class="task-date">User Feedback Implementation</h4>
                    </div>
                </div>

                    <button>view all</button>
                </div>
            </div>
            <div class="block-2-maincontent-3">
                <div class="block-2-maincontent-3-card-1">
                    <h2>Total Finished Tasks</h2>
                    <!-- importing charts to web -->
                    <canvas id="finishedTasks"></canvas>
                </div>
                <div class="block-2-maincontent-3-card-2">
                    <h2>Upcomming Events</h2> 
                    <div class="events">
                        <div class="event" style="border-left: 5px solid #4318ff;">
                            <p class="event-name">Bi-weekly report</p>
                            <p class="event-date">2024.5.13</p>
                        </div>
                        <div class="event" style="border-left: 5px solid #ff1843;">
                            <p class="event-name">Mentorship Session</p>
                            <p class="event-date">2024.6.4</p>
                        </div>
                        <div class="event" style="border-left: 5px solid #18ff43;">
                            <p class="event-name">Training Session</p>
                            <p class="event-date">2024.8.18</p>
                        </div>
                        <div class="event" style="border-left: 5px solid #4318ff;">
                            <p class="event-name">supervisor meeting</p>
                            <p class="event-date">2024.8.18</p>
                        </div>
                    </div>
                    <button>view all</button>
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script src="<?= BASE_URL ?>/public/js/pages/student_dashboard.js"></script>
</body>
</html>

