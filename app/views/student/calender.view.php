<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/student_calender.css">

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
                <h1>calender</h1>
            </div>
     


        </div>

    </div>
    <script src="<?= BASE_URL ?>/public/js/pages/student_dashboard.js"></script>
</body>
</html>
