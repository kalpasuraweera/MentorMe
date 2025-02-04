<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 0]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">

            <!-- Header -->
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Dashboard</h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;">
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="flex flex-wrap gap-5 my-4 justify-evenly">
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1" style="min-width:200px;">
                    <h2 class="text-primary-color text-lg font-semibold">Total Students</h2>
                    <p class="text-3xl font-bold text-indigo-900">
                        <?= $pageData['dashboardData']['total_students'] ?>
                    </p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1" style="min-width:200px;">
                    <h2 class="text-primary-color text-lg font-semibold">Total Supervisors</h2>
                    <p class="text-3xl font-bold text-indigo-900">
                        <?= $pageData['dashboardData']['total_supervisors'] ?>
                    </p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1" style="min-width:200px;">
                    <h2 class="text-primary-color text-lg font-semibold">Total Groups</h2>
                    <p class="text-3xl font-bold text-indigo-900">
                        <?= $pageData['dashboardData']['total_groups'] ?>
                    </p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="flex flex-wrap gap-5 justify-evenly my-4">
                <!-- Project Status Chart -->
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 mb-6" style="min-width:300px;max-width:300px">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-semibold text-primary-color mb-2">Task Distribution</h2>
                        <select name="task-group" id="task-group" class="border border-primary-color rounded-xl p-2">
                            <?php foreach ($pageData['groups'] as $group): ?>
                                <option value="<?= $group['group_id'] ?>"><?= $group['group_id'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <canvas id="taskDistributionChart"></canvas>
                </div>

                <!-- Groups per Supervisor Chart -->
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 mb-6" style="min-width:300px;">
                    <h2 class="text-lg font-semibold text-primary-color mb-4">Overall Project Completion</h2>
                    <canvas id="projectCompletionChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const allTasks = <?= json_encode($pageData['allTasks']) ?>;
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


        console.log(allTasks);

        const groupIDs = allTasks.map(task => task.group_id).filter((value, index, self) => self.indexOf(value) === index);
        const groupTasks = groupIDs.map(groupID => ({
            groupID,
            tasks: allTasks.filter(task => task.group_id == groupID)
        }));

        // Project Completion Chart
        const projectCompletionCtx = document.getElementById('projectCompletionChart').getContext('2d');
        const projectCompletionChart = new Chart(projectCompletionCtx, {
            type: 'bar',
            data: {
                labels: groupIDs.map(groupID => `Group ${groupID}`),
                datasets: [{
                    label: 'Completed Percentage',
                    data: groupTasks.map(group => {
                        const completedTasks = group.tasks.filter(task => task.status == 'COMPLETED');
                        return (completedTasks.length / group.tasks.length) * 100;
                    }),
                    backgroundColor: '#6366F1'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Groups'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Completed Percentage'
                        },
                        min: 0,
                        max: 100,
                        ticks: {
                            stepSize: 20
                        }
                    }
                }
            }
        });


        function createTaskDistributionChart(groupTasks) {
            const taskDistributionCtx = document.getElementById('taskDistributionChart').getContext('2d');

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

            // Create new chart
            taskDistributionChart = new Chart(taskDistributionCtx, {
                type: 'pie',
                data: {
                    labels: groupTasks.map(task => task.assignee_name.split(' ')[0]),
                    datasets: [{
                        data: groupTasks.map(task => groupTasks.reduce((acc, curr) =>
                            curr.assignee_id == task.assignee_id ? acc + 1 : acc, 0)),
                        backgroundColor: ['#6D28D9', '#4F46E5', '#A78BFA', '#C4B5FD']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });
        }

    </script>
</body>

</html>