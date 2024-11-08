<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex flex-row bg-primary-color min-h-screen">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 0]) ?>
        <div class="flex flex-col w-3/4 p-6 bg-indigo-50">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-indigo-900">Dashboard</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-indigo-600">Coordinator</p>
                        <p class="text-sm text-slate-500">coordinator@cmb.ac.lk</p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>

            <!-- Key Metrics -->
            <div class="grid grid-cols-3 gap-6 mb-3">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-indigo-600 text-lg font-semibold">Total Students</h2>
                    <p class="text-3xl font-bold text-indigo-900">150</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-indigo-600 text-lg font-semibold">Total Supervisors</h2>
                    <p class="text-3xl font-bold text-indigo-900">15</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-indigo-600 text-lg font-semibold">Total Groups</h2>
                    <p class="text-3xl font-bold text-indigo-900">40</p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-2 gap-6">
                <!-- Project Status Chart -->
                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                    <h2 class="text-lg font-semibold text-indigo-600 mb-2">Project Status of Groups</h2>
                    <canvas id="projectStatusChart" ></canvas>
                </div>

                <!-- Groups per Supervisor Chart -->
                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                    <h2 class="text-lg font-semibold text-indigo-600 mb-4">Groups per Supervisor</h2>
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
