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

     <!-- !!!!!!!!!!!  Profile popup  !!!!!!!!!! -->
     <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="profilePopup">
        <div class="bg-white p-5 rounded-md" style="max-width: 800px;max-height:90vh;">
            <div class="flex items-center">
                <div class="flex">

                <div class="bg-blue rounded-md flex flex-col items-center py-9 px-6">
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon"
                        class="rounded-full"
                        style="height: 70px; width: 70px; object-fit: cover;">
                    <div class="text-white font-medium text-center mt-5 mx-5">
                        <div class="mb-2">Student</div>
                        <div><?= $_SESSION['user']['full_name'] ?></div>
                    </div>
                </div>
                
                    <div class="border-black ml-5 rounded-md">
                        <form action="" method="post" name="updateProfile">
                            <input type="hidden" name="userID" value="<?= $_SESSION['user']['user_id'] ?>">
                            <div class="mx-5">
                                <div class="mt-5 text">Name : <input type="text" name="full_name" class="border border-primary-color rounded-md p-2" value="<?= $_SESSION['user']['full_name'] ?>"></div>
                            </div>

                            <div class="mx-5">
                                <div class="mt-5 text">E-mail : <input type="email" name="email" class="border border-primary-color rounded-md p-2" value="<?= $_SESSION['user']['email'] ?>"></div>
                            </div>

                            <div class="mx-5">
                                <div class="flex mt-5 items-center">Registration number : 
                                    <div class="border border-primary-color rounded-md p-2 ml-2">
                                        <?= $pageData['student'][0]['registration_number'] ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-5 mb-2">
                                <div class="flex mt-5 items-center">Index number : 
                                    <div class="border border-primary-color rounded-md p-2 ml-2">
                                        <?= $pageData['student'][0]['index_number'] ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <div class="flex justify-end gap-5 mt-2">
                <button type="submit"
                        name="updateProfile"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">
                        Update
                </button>
                </form>

                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeProfilePopup" onclick="closeProfilePopup()">
                        Close
                </button>
            </div>
        </div>
    </div>

    <!-- Main content -->
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
                            id="popupProfile" onclick="openProfilePopup()">
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
            <div class="flex flex-wrap gap-2 justify-evenly my-4 ml-2">
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
            <div class="flex flex-wrap gap-2 justify-evenly my-4 ml-2">
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

           
        </div>

    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

    <script>
        // !!!! from here onword details is i got from js file in public !!!!\

        // getting task details
        const taskDetail = <?= json_encode(($pageData['taskDetail'])); ?>; // Get group IDs dynamically

        const completedTasksRaw = Array(12).fill(0); // 0 is initialize 0 as each month count in begin
        const pendingTasksRaw = Array(12).fill(0);

        taskDetail.forEach((task) => {
            if (task['status'] == "COMPLETED") {
                const date = new Date(task['start_time']);
                const month = date.getMonth(); // getMonth() returns 0-based index, so add 1
                completedTasksRaw[month] += 1;
            }
            else {
                const date = new Date(task['start_time']);
                const month = date.getMonth(); // getMonth() returns 0-based index, so add 1
                pendingTasksRaw[month] += 1;
            }
        });

        // Here what we do is we get month(index) - task count from januraty to decmber since porject span in may to april i change array structure
        // Rotate array from May (index 4) to April (index 3)
        function rotateToMay(arr) {
            return arr.slice(4).concat(arr.slice(0, 4));
        }

        // Rotate arrays
        const completedTasks = rotateToMay(completedTasksRaw);
        const pendingTasks = rotateToMay(pendingTasksRaw);

        const finishedTasksctx = document
            .getElementById("finishedTasks")
            .getContext("2d");

        const finishedTasks =  new Chart(finishedTasksctx, {
            type: "bar",
            data: {
                labels: [
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "Octomber",
                    "November",
                    "December",
                    "January",
                    "February",
                    "March",
                    "April",
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

        
        // progress line chart
        const CurrentSpeedctx = document
            .getElementById("CurrentSpeed")
            .getContext("2d");

        // get current month for show data up until that date
        const now = new Date();
        const currentMonthIndex = now.getMonth(); // 0 = Jan, 11 = Dec

        const monthNames = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
        ];

        let months = [];
        let i = 4; // Start from May (index 4)
        do {
        months.push(monthNames[i]);
        i = (i + 1) % 12;
        } while (i !== (currentMonthIndex + 1) % 12);

        // console.log(months);



        const CurrentSpeed = new Chart(CurrentSpeedctx,{
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Current speed',
                    data: completedTasks,
                    fill: false,
                    borderColor: 'rgb(239, 68, 68)',
                    tension: 0.1
                }],
            },
        });

        // profile popup
        function openProfilePopup(){
                document.getElementById("profilePopup").classList.remove('hidden');
            }

            function closeProfilePopup(){
                document.getElementById("profilePopup").classList.add('hidden');

            }
    </script>
</html>