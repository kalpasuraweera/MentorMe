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
    <!-- <script src="<?= BASE_URL ?>/public/js/pages/supervisor_dashboard.js"></script> -->
    <pre>
        <?php 
            echo '<pre>';
            print_r($pageData['groupCompletedTask']); 
            echo '</pre>';
        ?>
    </pre>

    <?php
    
    // Initialize an array to hold the counts of tasks for each group_id and month-year
    $taskCounts = [];

    // Loop through the tasks and extract the month, year, and group_id
    foreach ($pageData['groupCompletedTask'] as $groupId => $groupTasks) {
        foreach ($groupTasks as $task) {
            // Only process tasks with a valid end_time
            if (!empty($task['end_time'])) {
                $endDate = new DateTime($task['end_time']);
                $monthYear = $endDate->format('Y-m'); // Format to "Year-Month" (e.g., "2024-12")

                // Initialize the array for this group_id if not already set
                if (!isset($taskCounts[$groupId])) {
                    $taskCounts[$groupId] = [];
                }

                // Increment the count for the corresponding group_id and month-year
                if (!isset($taskCounts[$groupId][$monthYear])) {
                    $taskCounts[$groupId][$monthYear] = 0;
                }
                $taskCounts[$groupId][$monthYear]++;
            }
        }
    }
    // Output the task counts for each group_id and month
    foreach ($taskCounts as $groupId => $months) {
        echo "Group ID: $groupId\n";
        foreach ($months as $monthYear => $count) {
            echo "  Month: $monthYear, Task Count: $count\n";
        }
    }
    ?>



</body>

    <script> 
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
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
                "Sunday",
                ],
                datasets: [
                {
                    label: "CS001",
                    data: [12, 19, 3, 5, 2, 3, 10],
                    backgroundColor: "#962DFF",
                    borderColor: "#962DFF",
                    borderWidth: 1,
                },
                {
                    label: "CS002",
                    data: [2, 3, 20, 5, 1, 4, 6],
                    backgroundColor: "#C893FD",
                    borderColor: "#C893FD",
                    borderWidth: 1,
                },
                {
                    label: "CS005",
                    data: [2, 3, 20, 5, 1, 4, 6],
                    backgroundColor: "#E0C6FD",
                    borderColor: "#E0C6FD",
                    borderWidth: 1,
                },
                ],
            },
            });

        const groupIds = <?= json_encode(($pageData['groupCompletedTask'])); ?>; // Get group IDs dynamically
        console.log(groupIds)

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