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
                    <?php $this->renderComponent('numberCard', ['title' => 'Pending Requests', 'value' => sizeof($pageData['pendingRequests']), 'bg' => 'btn-primary-color']) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks In Progress', 'value' => sizeof($pageData['inProgressTasks']), 'icon' => 'created_icon.png', 'is_grown' => true]) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks In Review', 'value' => sizeof($pageData['inReviewTasks']), 'icon' => 'completed_icon.png', 'is_grown' => true]) ?>
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
                <canvas id="monthlyTaskCompletion"></canvas>
            </div>
            <div class="flex justify-evenly gap-5 my-5">
                <div class="bg-white shadow rounded-xl p-5 flex items-center flex-grow">
                    <canvas id="projectCompletion"></canvas>
                </div>
                <div class="bg-white shadow rounded-xl p-5 flex items-center">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-semibold text-primary-color mb-2">Task Distribution</h2>
                        <select name="task-group" id="task-group" class="border border-primary-color rounded-xl p-2">
                            <?php foreach ($pageData['groups'] as $group): ?>
                                    <option value="<?= $group['group_id'] ?>"><?= $group['group_id'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>    
                    <canvas id="taskDistribution"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

    <script> 
        const completedTasks = <?= json_encode(array_values($pageData['completedTasks'])); ?>;
        const todoTasks = <?= json_encode(array_values($pageData['todoTasks'])); ?>;
        const inProgressTasks = <?= json_encode(array_values($pageData['inProgressTasks'])); ?>;

        const monthsArray = 
        [
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
            "January",
            "February",
            "March",
            "April",
        ];
        let monthlyTaskCompletion = Array(12).fill(0);
     

        completedTasks.forEach(task => {
            const monthIndex = new Date(task['end_time']).getMonth()
            monthlyTaskCompletion[(monthIndex+8)%12]+=1
        });

        const taskCompletionChartCtx = document
            .getElementById("monthlyTaskCompletion")
            .getContext("2d");
        const taskCompletionChart = new Chart(taskCompletionChartCtx, {
        type: "bar",
        options: {
            responsive:true,
            plugins: {
            title: {
                display: true,
                text: "Monthly Task Completion",
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
            labels: monthsArray,
            datasets: [{
                label:"All Groups",
                data: monthlyTaskCompletion,
                backgroundColor: "#6366F1"
            }],
        },
        });   
        
        const supervisorGroups = <?= json_encode(array_values($pageData['groupList'])); ?>;
        const completedTasksStat = supervisorGroups.map(group=>completedTasks.filter(task=>task['group_id']==group['group_id']).length);
        const todoTasksStat = supervisorGroups.map(group=>todoTasks.filter(task=>task['group_id']==group['group_id']).length);
        const inProgressTasksStat = supervisorGroups.map(group=>inProgressTasks.filter(task=>task['group_id']==group['group_id']).length);

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
                labels: supervisorGroups.map(group=>group['group_id']),
                datasets: [
                {
                    label: "Completed",
                    data: completedTasksStat,
                    backgroundColor: "#2CFFB9",
                    borderColor: "#2CFFB9",
                    borderWidth: 1,
                },
                {
                    label: "In Progress",
                    data: inProgressTasksStat,
                    backgroundColor: "#FFD686",
                    borderColor: "#FFD686",
                    borderWidth: 1,
                },
                {
                    label: "Not Started",
                    data: todoTasksStat,
                    backgroundColor: "#A3D9FF",
                    borderColor: "#A3D9FF",
                    borderWidth: 1,
                },
                ],
            },
        });


        // const taskDistributionChartCtx = document
        //     .getElementById("taskDistribution")
        //     .getContext("2d");
        //     const taskDistributionChart = new Chart(taskDistributionChartCtx, {
        //     type: "doughnut",
        //     options: {
        //         plugins: {
        //         title: {
        //             display: true,
        //             text: "Task Distribution",
        //         },
        //         },
        //     },
        //     data: {
        //         labels: members,
        //         datasets: [
        //         {
        //             label: "Tasks",
        //             data: memberCompletedTask,
        //             backgroundColor: [    "#4A3AFF", "#3F48FF", "#2D5BFF", "#1C6EFF", 
        //             "#93AAFD", "#7D96FC", "#6782FB", "#C6D2FD", "#AEBFFA"],
        //             borderColor: [    "#4A3AFF", "#3F48FF", "#2D5BFF", "#1C6EFF", 
        //             "#93AAFD", "#7D96FC", "#6782FB", "#C6D2FD", "#AEBFFA"],
        //             borderWidth: 1,
        //         },
        //         ],
        //     },
        // });

    </script>
</body>

</html>