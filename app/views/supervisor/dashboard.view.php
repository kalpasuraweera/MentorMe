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
                <div class="flex flex-col py-5 px-10 text-white bg-white shadow rounded-xl justify-between" style="width:300px;">
                    <div>
                        <p class="text-lg font-bold text-primary-color mb-4">Upcoming Events</p>
                        <div class="flex flex-col gap-5">
                            <?php if(empty($pageData['eventList'])): ?>
                                <div class="flex flex-col px-2" style="border-left: 5px solid #ff1843;">
                                <p class="text-black font-bold">No Upcoming Events</p>
                            </div>
                            <?php endif; ?>
                            <?php foreach(array_slice($pageData['eventList'],0,3) as $event): ?>
                                <div class="flex flex-col px-2" style="border-left: 5px solid #4318ff;">
                                    <p class="text-black font-bold"><?=$event['title']?></p>
                                    <p class="text-secondary-color"><?=$event['start_time']?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="<?= BASE_URL ?>/supervisor/calendar" class="text-primary-color font-bold">View All</a>
                    </div>
                </div>
                <div class="flex flex-col py-5 px-10 text-white bg-white shadow rounded-xl justify-between" style="width:300px;">
                    <div>
                        <p class="text-lg font-bold text-primary-color mb-4">Top Performers</p>
                        <div class="flex flex-col gap-4" id="topPerformingStudents">
                            
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
            <div class="flex justify-evenly gap-5 my-5" style="max-width:100vw">
                <div class="bg-white shadow rounded-xl p-5 flex items-center flex-grow">
                    <canvas id="projectCompletion"></canvas>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 mb-6" style="min-width:300px;max-width:300px">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-semibold text-primary-color mb-2">Task Distribution</h2>
                        <select name="task-group" id="task-group" class="border border-primary-color rounded-xl p-2">
                            <?php foreach ($pageData['groupList'] as $group): ?>
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
                responsive: true,
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

        const allTasks = <?= json_encode(array_values($pageData['groupTasks'])) ?>;

        // top students
        document.getElementById("topPerformingStudents").innerHTML = Array.from(new Map(allTasks.map(task => {
            const name = task.assignee_name;
            return [name, {
                full_name: name,
                profile_picture: task.profile_picture,
                group_id: task.group_id,
                task_count: allTasks.filter(t => t.assignee_name === name).length
            }];
        })).values()).sort((a, b) => b.task_count - a.task_count).slice(0, 3).map(student =>
            `<div class="flex items-center">
                <img src="<?= BASE_URL ?>/public/images/profile_pictures/${student.profile_picture}" alt="user icon" class="rounded-full" style="height: 40px;width: 40px;object-fit: cover;" >
                <div class="flex flex-col px-2">
                    <p class="text-black font-bold">${student.full_name}</p>
                    <p class="text-secondary-color">${student.group_id}</p>
                </div>
            </div>`
        ).join('');

        let taskDistributionChart; // Declare chart variable globally

        // Initial chart creation
        const initialGroupTasks = allTasks.filter(task =>
            task.group_id == document.getElementById('task-group').value
        );
        createTaskDistributionChart(initialGroupTasks);

        // Update chart on group change
        document.getElementById('task-group').addEventListener('change', (e) => {
            const groupID = e.target.value;
            const groupTasks = allTasks.filter(task => task.group_id == groupID);
            createTaskDistributionChart(groupTasks);
        });

        function createTaskDistributionChart(groupTasks) {
            const taskDistributionCtx = document.getElementById('taskDistribution').getContext('2d');
            // Destroy existing chart if it exists
            if (taskDistributionChart) {
                taskDistributionChart.destroy();
            }

            // If no tasks found, show no data message
            if (groupTasks.length === 0) {
                taskDistributionCtx.clearRect(0, 0, taskDistributionCtx.width, taskDistributionCtx.height);
                taskDistributionCtx.font = '20px Arial';
                taskDistributionCtx.textAlign = 'center';
                taskDistributionCtx.fillText('No tasks found', taskDistributionCtx.canvas.width / 2, taskDistributionCtx.canvas.height / 2);
                return;
            }

            const groupMembers =[...new Set(groupTasks.map(task => task.assignee_name))]
            // Create new chart
            taskDistributionChart = new Chart(taskDistributionCtx, {
                type: 'pie',
                data: {
                    labels: groupMembers,
                    datasets: [{
                        data: groupMembers.map(member=> groupTasks.filter(task=>task.assignee_name ==member).length),
                        backgroundColor: ['#6D28D9', '#4F46E5', '#A78BFA', '#C4B5FD']
                    }]
                },
                options: {
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });
        }

    </script>
</body>

</html>