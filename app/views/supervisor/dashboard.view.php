<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 0]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Supervisor Dashboard</h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;">
                </div>
            </div>
            <div class="flex justify-evenly gap-5 mt-5">
                <div class="flex flex-col justify-evenly gap-2 text-white">
                    <?php $this->renderComponent('numberCard', ['title' => 'Pending Requests', 'value' => 13, 'bg' => 'btn-primary-color']) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks Creation', 'value' => 48, 'icon' => 'created_icon.png', 'is_grown' => true]) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks Completion', 'value' => 11, 'icon' => 'completed_icon.png', 'is_grown' => false]) ?>
                </div>
                <div class="flex flex-col py-5 px-10 text-white bg-white shadow rounded-xl" style="width:300px;">
                    <p class="text-lg font-bold text-primary-color mb-4">Upcoming Events</p>
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col px-2" style="border-left: 5px solid #4318ff;">
                            <p class="text-black font-bold">Bi-Weekly Meeting</p>
                            <p class="text-secondary-color">24 Aug 2024</p>
                        </div>
                        <div class="flex flex-col px-2" style="border-left: 5px solid #ff1843;">
                            <p class="text-black font-bold">Mentorship Session</p>
                            <p class="text-secondary-color">30 Aug 2024</p>
                        </div>
                        <div class="flex flex-col px-2" style="border-left: 5px solid #18ff43;">
                            <p class="text-black font-bold">Training Session</p>
                            <p class="text-secondary-color">15 Sep 2024</p>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="<?= BASE_URL ?>/supervisor/calendar" class="text-primary-color font-bold">View All</a>
                    </div>
                </div>
                <div class="flex flex-col py-5 px-10 text-white bg-white shadow rounded-xl" style="width:300px;">
                    <p class="text-lg font-bold text-primary-color mb-4">Top Performers</p>
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center">
                            <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon" width="40"
                                height="40">
                            <div class="flex flex-col px-2">
                                <p class="text-black font-bold">John Doe</p>
                                <p class="text-secondary-color">CS001</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon" width="40"
                                height="40">
                            <div class="flex flex-col px-2">
                                <p class="text-black font-bold">John Doe</p>
                                <p class="text-secondary-color">CS001</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon" width="40"
                                height="40">
                            <div class="flex flex-col px-2">
                                <p class="text-black font-bold">John Doe</p>
                                <p class="text-secondary-color">CS001</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="<?= BASE_URL ?>/supervisor/groups" class="text-primary-color font-bold">View All</a>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow rounded-xl p-5 mt-5">
                <canvas id="weeklyTaskCompletion"></canvas>
            </div>
            <div class="flex justify-evenly gap-5 my-5">
                <div class="bg-white shadow rounded-xl p-5 flex items-center flex-grow">
                    <canvas id="projectCompletion"></canvas>
                </div>
                <div class="bg-white shadow rounded-xl p-5 flex items-center">
                    <canvas id="taskDistribution"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

</body>

    <script> 
        const groupCompletedTask = <?= json_encode(($pageData['groupCompletedTask'])); ?>; // Get group IDs dynamically
        console.log(groupCompletedTask)

        // Function to calculate task completions per month for each group
        const calculateMonthlyCompletions = (tasks) => {
            const monthlyData = {};

            // built-in JavaScript method that takes an object as its argument and returns an array of the object's property names (keys). 
            Object.keys(tasks).forEach(groupId => {
                monthlyData[groupId] = Array(12).fill(0); // Initialize an array for 12 months

                tasks[groupId].forEach(task => {
                    if (task.status === "COMPLETED" && task.end_time) {
                        const taskDate = new Date(task.end_time);
                        const month = taskDate.getMonth(); // Get the month (0-11)

                        // Increment the task completion count for the corresponding month
                        monthlyData[groupId][month]++;
                    }
                });
            });

            return monthlyData;
        };

        // Process the task data
        const monthlyCompletions = calculateMonthlyCompletions(groupCompletedTask);

        // Extract the unique group IDs
        const groupIds = Object.keys(monthlyCompletions);

        // Build the datasets dynamically based on the unique group IDs
        const datasets = groupIds.map(groupId => {
            const color = `hsl(${Math.random() * 360}, 100%, 75%)`; // Random color for each group
            return {
                label: `Group ${groupId}`,
                data: monthlyCompletions[groupId], // Data for the group
                backgroundColor: color,
                borderColor: color,
                borderWidth: 1,
            };
        });

        console.log(datasets)

        const taskCompletionChartCtx = document
            .getElementById("weeklyTaskCompletion")
            .getContext("2d");
            const taskCompletionChart = new Chart(taskCompletionChartCtx, {
            type: "bar",
            options: {
                plugins: {
                title: {
                    display: true,
                    text: "Weekly Task Completion",
                },
                },
                scales: {
                y: {
                    stacked: true,
                },
                x: {
                    stacked: true,
                },
                },
            },
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
                datasets: datasets,
            },
            });



        const projectCompletionChartCtx = document
            .getElementById("projectCompletion")
            .getContext("2d");
            const projectCompletionChart = new Chart(projectCompletionChartCtx, {
            type: "bar",
            options: {
                indexAxis: "y",
                plugins: {
                title: {
                    display: true,
                    text: "Project Completion",
                },
                },
            },
            data: {
                labels: ["CS001", "CS002", "CS003"],
                datasets: [
                {
                    label: "Completed",
                    data: [12, 19, 3],
                    backgroundColor: "#2CFFB9",
                    borderColor: "#2CFFB9",
                    borderWidth: 1,
                },
                {
                    label: "In Progress",
                    data: [2, 3, 20],
                    backgroundColor: "#FFD686",
                    borderColor: "#FFD686",
                    borderWidth: 1,
                },
                {
                    label: "Not Started",
                    data: [2, 3, 20],
                    backgroundColor: "#A3D9FF",
                    borderColor: "#A3D9FF",
                    borderWidth: 1,
                },
                ],
            },
            });

        const taskDistributionChartCtx = document
            .getElementById("taskDistribution")
            .getContext("2d");
            const taskDistributionChart = new Chart(taskDistributionChartCtx, {
            type: "doughnut",
            options: {
                plugins: {
                title: {
                    display: true,
                    text: "Task Distribution",
                },
                },
            },
            data: {
                labels: ["Will", "John", "Jane", "Raj"],
                datasets: [
                {
                    label: "Tasks",
                    data: [12, 19, 3, 5],
                    backgroundColor: ["#4A3AFF", "#2D5BFF", "#93AAFD", "#C6D2FD"],
                    borderColor: ["#4A3AFF", "#2D5BFF", "#93AAFD", "#C6D2FD"],
                    borderWidth: 1,
                },
                ],
            },
        });

    </script>

</html>