<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/student_dashboard.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">

    <title>MentoMe</title>
</head>

<body class=".bg-primary-color">
    <div class="layout-container">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 0]) ?>
        <div class="block-2">
            <div class="block-2-header">
                <div class="block-2-header-text">
                    <h1>Dashboard</h1>
                </div>
                <div class="profile">
                    <div class="profile-detail">
                        <h1><?= $_SESSION['user']['full_name'] ?></h1>
                        <h3><?= $_SESSION['user']['email'] ?></h3>
                    </div>
                    <div class="profile-picture" id="profileDetail">
                        <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                            alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;"
                            id="popupProfile">
                    </div>
                </div>
            </div>
            <div class="block-2-maincontent-1">
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 mx-2" style="min-width:200px;">
                    <p class="text-primary-color text-xl font-semibold">Todo Tasks</p>
                    <p class="text-3xl font-bold text-indigo-900">
                        14
                    </p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 mx-2" style="min-width:200px;">
                    <p class="text-primary-color text-xl font-semibold">Ongoing Tasks</p>
                    <p class="text-3xl font-bold text-indigo-900">
                        02
                    </p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 mx-2" style="min-width:200px;">
                    <p class="text-primary-color text-xl font-semibold">Tasks in Review</p>
                    <p class="text-3xl font-bold text-indigo-900">
                        05
                    </p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 mx-2" style="min-width:200px;">
                    <p class="text-primary-color text-xl font-semibold">Completed Tasks</p>
                    <p class="text-3xl font-bold text-indigo-900">
                        03
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 justify-evenly my-4">
                <div class="p-5 rounded-2xl shadow-xl flex-1 mb-6 bg-white" style="min-width:65%;">
                    <p class="text-black text-xl font-bold text-center">Team Pace</p>
                    <!-- importing charts to web -->
                    <canvas id="CurrentSpeed"></canvas>
                </div>
                <div class="p-5 rounded-2xl shadow-xl flex-1 mb-6 bg-white flex flex-col justify-between">
                    <div>
                        <p class="text-black text-xl font-bold text-center">In Progress Tasks</p>
                        <div class="flex flex-col gap-2 mt-4" style="max-height: 300px; overflow-y: scroll;">
                            <!-- Rendering Task detail from DB only shows first 4 -->
                            <?php if (!empty($pageData['inprogressTasks'])): ?>
                                    <?php $sliceArray = array_slice($pageData['inprogressTasks'], 0, 4); ?>
                                    <?php foreach ($sliceArray as $task): ?>
                                            <div class="p-4 bg-gray-100 rounded-2xl border border-primary-color"
                                                style="min-height: 70px;">
                                                <p class="text-lg font-bold">Task - <?= $task['task_id'] ?> </p>
                                                <p class="text-md"><?= $task['title'] ?></p>
                                                <div class="flex justify-between mt-2">
                                                    <img src="<?= BASE_URL ?>/public/images/icons/user_circle.svg" alt="user"
                                                        width="20px">
                                                    <p><?= explode(' ', $task['full_name'])[0] ?></p>
                                                    <img src="<?= BASE_URL ?>/public/images/icons/clock.svg" alt="clock" width="20px">
                                                    <p><?= $task['estimated_time'] ?> hr</p>
                                                    <img src="<?= BASE_URL ?>/public/images/icons/calendar.svg" alt="calendar"
                                                        width="20px">
                                                    <p><?= date('M d', strtotime($task['deadline'])) ?></p>
                                                </div>
                                            </div>
                                    <?php endforeach; ?>
                            <?php else: ?>
                                    <p>No completed tasks</p>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button class="text-primary-color font-bold"
                            onClick="window.location.href='<?= BASE_URL ?>/student/tasks'">view all</button>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap gap-2 justify-evenly my-4">
                <div class="p-5 rounded-2xl shadow-xl flex-1 mb-6 bg-white" style="min-width:65%;">
                    <p class="text-black text-xl font-bold text-center">Total Finished Tasks</p>
                    <!-- importing charts to web -->
                    <canvas id="finishedTasks"></canvas>
                </div>
                <div class="p-5 rounded-2xl shadow-xl flex-1 mb-6 bg-white flex flex-col justify-between">
                    <div>
                        <p class="text-black text-xl font-bold text-center">Upcoming Events</p>
                        <div class="flex flex-col gap-2 mt-4">
                            <?php if (!empty($pageData['eventList'])): ?>
                                    <?php $sliceArray = array_slice($pageData['eventList'], 0, 4); ?>
                                    <?php foreach ($sliceArray as $event): ?>
                                            <div class="event" style="border-left: 5px solid <?= $event['color'] ?>">
                                                <p class="event-name"><?= $event['title'] ?></p>
                                                <p class="event-date"><?= date('Y.m.d', strtotime($event['start_time'])) ?></p>
                                            </div>
                                    <?php endforeach; ?>
                            <?php else: ?>
                                    <p>No events</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button class="text-primary-color font-bold"
                            onClick="window.location.href='<?= BASE_URL ?>/student/calendar'">view all</button>
                    </div>
                </div>
            </div>

            <!-- !!!!!!!!!!!  Profile popup  !!!!!!!!!! -->
            <div id="profileOverlay" class="profileOverlay" style="display: none;">
                <div class="popup-profile">
                    <div class="profile-block-1">
                        <!-- Student Picture -->
                        <img src="<?= BASE_URL ?>/public/images/student_logo.png" alt="profile pic">
                        <h1><?= $_SESSION['user']['role'] ?></h1>
                    </div>
                    <div class="profile-block-2">
                        <div class="profile-block-2-header">
                            <div class="profile-buttons">
                                <div class="profile-update-button">
                                    <img src="<?= BASE_URL ?>/public/images/icons/settings.png" alt="update icon pic"
                                        id="profileUpdateButton">
                                </div>
                                <div class="profile-close-button">
                                    <img src="<?= BASE_URL ?>/public/images/icons/logout_icon.png" alt="logout icon pic"
                                        id="profileCloseButton">
                                </div>
                            </div>
                        </div>
                        <div class="profile-block-2-maincontent-1">
                            <?php if (!empty($pageData['student'][0])): ?>
                                    <?php $studentData = $pageData['student'][0]; ?>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">ID</div>
                                        <div class="popupProfile-detail-value"><?= $_SESSION['user']['user_id'] ?></div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">Full Name</div>
                                        <div class="popupProfile-detail-value"><?= $_SESSION['user']['full_name'] ?></div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">E-Mail</div>
                                        <div class="popupProfile-detail-value"><?= $_SESSION['user']['email'] ?></div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">Registration Number</div>
                                        <div class="popupProfile-detail-value">
                                            <?= $studentData['registration_number'] ?? 'N/A' ?>
                                        </div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">Index Number</div>
                                        <div class="popupProfile-detail-value"><?= $studentData['index_number'] ?? 'N/A' ?>
                                        </div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">Year</div>
                                        <div class="popupProfile-detail-value"><?= $studentData['year'] ?? 'N/A' ?></div>
                                    </div>

                            <?php else: ?>
                                    <p>No Student Data</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- !!!!!!!!!!! Update Profile Popup !!!!!!!!!! -->
            <div id="updateProfileOverlay" class="updateProfileOverlay" style="display: none;">
                <div class="popup-updateProfile">
                    <div class="profile-block-1">
                        <!-- Student Picture -->
                        <img src="<?= BASE_URL ?>/public/images/student_logo.png" alt="profile pic">
                        <h1><?= $_SESSION['user']['role'] ?></h1>
                    </div>
                    <div class="profile-block-2">
                        <div class="profile-block-2-header">
                            <div class="profile-buttons">
                                <div class="profile-close-button" style="padding-left: 60%;">
                                    <img src="<?= BASE_URL ?>/public/images/icons/logout_icon.png" alt="logout icon pic"
                                        id="updateProfileCloseButton">
                                </div>
                            </div>
                        </div>
                        <div class="profile-block-2-maincontent-1">
                            <?php if (!empty($pageData['student'][0])): ?>
                                    <?php $studentData = $pageData['student'][0]; ?>
                                    <!-- Update Form -->
                                    <form id="updateProfileForm" method="POST">
                                        <div class="popupProfile-detail">
                                            <div class="popupProfile-detail-type">ID</div>
                                            <div class="popupProfile-detail-value">
                                                <input type="text" name="user_id" value="<?= $_SESSION['user']['user_id'] ?>"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="popupProfile-detail">
                                            <div class="popupProfile-detail-type">Full Name</div>
                                            <div class="popupProfile-detail-value">
                                                <input type="text" name="full_name"
                                                    value="<?= $_SESSION['user']['full_name'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="popupProfile-detail">
                                            <div class="popupProfile-detail-type">E-Mail</div>
                                            <div class="popupProfile-detail-value">
                                                <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>"
                                                    required>
                                                <span id="emailError" class="error-message"
                                                    style="color: red; display: none;"></span>
                                            </div>
                                        </div>
                                        <div class="popupProfile-detail">
                                            <div class="popupProfile-detail-type">Registration Number</div>
                                            <div class="popupProfile-detail-value">
                                                <input type="text" name="registration_number"
                                                    value="<?= $studentData['registration_number'] ?? 'not accessable' ?>"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="popupProfile-detail">
                                            <div class="popupProfile-detail-type">Index Number</div>
                                            <div class="popupProfile-detail-value">
                                                <input type="text" name="index_number"
                                                    value="<?= $studentData['index_number'] ?? 'not accessable' ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="popupProfile-detail">
                                            <div class="popupProfile-detail-type">Year</div>
                                            <div class="popupProfile-detail-value">
                                                <input type="text" name="year"
                                                    value="<?= $studentData['year'] ?? 'not accessable' ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="profile-buttons">
                                            <button type="submit" class="save-button" id="update_profile"
                                                name="update_profile">Save Changes</button>
                                        </div>
                                    </form>

                            <?php else: ?>
                                    <p>No Student Data</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

    <script>
        document.getElementById('updateProfileForm').addEventListener('submit', function (event) {
            const emailInput = document.querySelector('input[name="email"]');
            const emailError = document.getElementById('emailError');
            const email = emailInput.value.trim();
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            // Clear previous error message
            emailError.textContent = '';
            emailError.style.display = 'none';

            if (!emailRegex.test(email)) {
                event.preventDefault(); // Prevent form submission
                emailError.textContent = 'Please enter a valid email address.';
                emailError.style.display = 'block';
                emailInput.focus(); // Highlight the invalid email field
            }
        });

        // !!!! from here onword details is i got from js file in public !!!!\

        // getting task details
        const taskDetail = <?= json_encode(($pageData['taskDetail'])); ?>; // Get group IDs dynamically
        // console.log(taskDetail)

        const completedTasks = Array(12).fill(0); // 0 is initialize 0 as each month count in begin
        const pendingTasks = Array(12).fill(0);

        taskDetail.forEach((task) => {
            if (task['status'] == "COMPLETED") {
                const date = new Date(task['start_time']);
                const month = date.getMonth(); // getMonth() returns 0-based index, so add 1
                completedTasks[month] += 1;
            }
            else {
                const date = new Date(task['start_time']);
                const month = date.getMonth(); // getMonth() returns 0-based index, so add 1
                pendingTasks[month] += 1;
            }
        });
        // console.log(pendingTasks);

        const finishedTasksctx = document
            .getElementById("finishedTasks")
            .getContext("2d");

        const finishedTasks =  new Chart(finishedTasksctx, {
            type: "bar",
            data: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ], 
                datasets: [
                    {
                        label: "Tasks Completed", // First dataset
                        data: completedTasks, // Example data for first bar
                        backgroundColor: "#4318FF", // Color for first bar
                        borderColor: "#4318FF",
                        borderWidth: 1,
                    },
                    {
                        label: "Tasks Pending", // Second dataset
                        data: pendingTasks, // Example data for second bar
                        backgroundColor: "#C893FD", // Color for second bar
                        borderColor: "#C893FD",
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: "Weekly Task Breakdown", // Title of the chart
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true, // Y-axis starts from zero
                    },
                    x: {
                        stacked: false, // Side-by-side bars instead of stacked
                    },
                },
            },
        });

        
        const CurrentSpeedctx = document
            .getElementById("CurrentSpeed")
            .getContext("2d");

        const CurrentSpeed = new Chart(CurrentSpeedctx,{
            type: 'line',
            data: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                ],
                datasets: [{
                    label: 'Required speed',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                },
                {
                    label: 'Current speed',
                    data: [25, 34, 24, 24, 26, 65, 10],
                    fill: false,
                    borderColor: 'rgb(239, 68, 68)',
                    tension: 0.1
                }
                ],
            },
        });

        // profile popup
        const profileDetail = document.getElementById("profileDetail"); // This get from  dashboard ui
        const profileOverlay = document.getElementById("profileOverlay");

        profileDetail.addEventListener("click", function() {
            // alert("click profile picture in dashboard");
            profileOverlay.style.display = "block"; // Display the form overlay

        });

        const profileCloseButton = document.getElementById("profileCloseButton");
        const updateProfileCloseButton = document.getElementById("updateProfileCloseButton");

        profileCloseButton.addEventListener("click", function(){
            //alert("Closed button in profile component");
            profileOverlay.style.display = "none";
            updateProfileOverlay.style.display = "none"
        });

        updateProfileCloseButton.addEventListener("click", function(){
            //alert("close button in update profile component");
            updateProfileOverlay.style.display = "none";
        });

        // update profile popup
        const updateProfileButton = document.getElementById("profileUpdateButton"); // this we check in profile component whether user click it or not
        const updateProfileOverlay = document.getElementById("updateProfileOverlay");

        updateProfileButton.addEventListener("click", function() {
            //alert("click update button in profile component");
            profileOverlay.style.display = "none"; // Display the form overlay
            updateProfileOverlay.style.display = "block";

        });

    </script>
</html>