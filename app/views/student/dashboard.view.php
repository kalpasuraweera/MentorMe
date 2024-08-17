<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/student_dashboard.css">

    <title>MentoMe</title>
    <script>
        function displayDate() {
            const today = new Date();
            
            // Array of month names
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            
            // Extract day and month
            const day = today.getDate();
            const month = months[today.getMonth()]; // getMonth() returns 0-11
            
            // Format date as "Day Month"
            const dateString = `${day} ${month}`;
            
            // Display the date in the HTML element with id "date"
            document.getElementById('date').textContent = dateString;
        }
        
        // Run the displayDate function when the page loads
        window.onload = displayDate;
    </script>
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
                <button><img src="<?= BASE_URL ?>/public/images/icons/dashboard.png" alt="home_icon"><h4>Home</h4></button>
                <button><img src="<?= BASE_URL ?>/public/images/icons/calender.png" alt="calender_icon"><h4>Calander</h4></button>
                <button><img src="<?= BASE_URL ?>/public/images/icons/task.png" alt="tasks_icon"><h4>Tasks</h4></button>
                <button><img src="<?= BASE_URL ?>/public/images/icons/security.png" alt="security_icon"><h4>Security</h4></button>
                <button><img src="<?= BASE_URL ?>/public/images/icons/schedules.png" alt="schedules_icon"><h4>Schedules</h4></button>
                <button><img src="<?= BASE_URL ?>/public/images/icons/settings.png" alt="settings_icon"><h4>Settings</h4></button>
            </div>
            <div class="block-1-footer">
                <button><img src="<?= BASE_URL ?>/public/images/icons/logout_icon.png" alt="logout_icon"><h4>Log-Out</h4></button>
            </div>
        </div>
        <div class="block-2">
            <div class="block-2-header">
                <div class="block-2-header-text">
                    <h1>Dashboard</h1>
                </div>
                <div class="profile">
                    <div class="profile-detail">
                        <h1>Student</h1>
                        <h3>Thamindu12ku@gmail.com</h3>
                    </div>
                    <div class="profile-picture">
                        <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="profile pic">
                    </div>
                </div>
            </div>
            <div class="block-2-maincontent-1">
                <div class="block-2-maincontent-1-card-1">
                    <h2>Total Tasks</h2>
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
                </div>
                <div class="block-2-maincontent-2-card-2">
                    <h2>Assigned Tasks</h2> 
                    <button>view all =></button>
                </div>
            </div>
            <div class="block-2-maincontent-3">
                <div class="block-2-maincontent-3-card-1">
                    <h2>Total Finished Tasks</h2>
                </div>
                <div class="block-2-maincontent-3-card-2">
                    <h2 id="date" >Today</h2> 
                    <button>view all Tasks =></button>
                </div>
            </div>

        </div>


    </div>
</body>
</html>