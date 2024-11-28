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
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="flex flex-wrap gap-5 my-4 justify-evenly">
                <div class="bg-white p-5 rounded-lg shadow-md flex-1" style="min-width:200px;">
                    <h2 class="text-primary-color text-lg font-semibold">Total Students</h2>
                    <p class="text-3xl font-bold text-indigo-900">150</p>
                </div>
                <div class="bg-white p-5 rounded-lg shadow-md flex-1" style="min-width:200px;">
                    <h2 class="text-primary-color text-lg font-semibold">Total Supervisors</h2>
                    <p class="text-3xl font-bold text-indigo-900">15</p>
                </div>
                <div class="bg-white p-5 rounded-lg shadow-md flex-1" style="min-width:200px;">
                    <h2 class="text-primary-color text-lg font-semibold">Total Groups</h2>
                    <p class="text-3xl font-bold text-indigo-900">40</p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="flex flex-wrap gap-5 justify-evenly my-4">
                <!-- Project Status Chart -->
                <div class="bg-white p-5 rounded-lg shadow-md flex-1 mb-6" style="min-width:300px;">
                    <h2 class="text-lg font-semibold text-primary-color mb-2">Project Status of Groups</h2>
                    <canvas id="projectStatusChart"></canvas>
                </div>

                <!-- Groups per Supervisor Chart -->
                <div class="bg-white p-5 rounded-lg shadow-md flex-1 mb-6" style="min-width:300px;">
                    <h2 class="text-lg font-semibold text-primary-color mb-4">Groups per Supervisor</h2>
                    <canvas id="groupsPerSupervisorChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Project Status Chart
        const projectStatusCtx = document.getElementById('projectStatusChart').getContext('2d');
        const projectStatusChart = new Chart(projectStatusCtx, {
            type: 'pie',
            data: {
                labels: ['Ongoing', 'Completed', 'Not Started'],
                datasets: [{
                    data: [20, 15, 5],  // Example data
                    backgroundColor: ['#6D28D9', '#4F46E5', '#A78BFA']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

        // Groups per Supervisor Chart
        const groupsPerSupervisorCtx = document.getElementById('groupsPerSupervisorChart').getContext('2d');
        const groupsPerSupervisorChart = new Chart(groupsPerSupervisorCtx, {
            type: 'bar',
            data: {
                labels: ['Supervisor A', 'Supervisor B', 'Supervisor C', 'Supervisor D'],  // Replace with dynamic supervisor names
                datasets: [{
                    label: 'Number of Groups',
                    data: [8, 10, 5, 7],  // Example data
                    backgroundColor: '#6366F1'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: { title: { display: true, text: 'Supervisors' } },
                    y: { title: { display: true, text: 'Number of Groups' }, beginAtZero: true }
                }
            }
        });
    </script>
</body>

</html>