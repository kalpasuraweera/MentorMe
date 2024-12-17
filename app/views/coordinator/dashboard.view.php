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
                    <p class="text-3xl font-bold text-indigo-900">150</p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1" style="min-width:200px;">
                    <h2 class="text-primary-color text-lg font-semibold">Total Supervisors</h2>
                    <p class="text-3xl font-bold text-indigo-900">15</p>
                </div>
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1" style="min-width:200px;">
                    <h2 class="text-primary-color text-lg font-semibold">Total Groups</h2>
                    <p class="text-3xl font-bold text-indigo-900">40</p>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="flex flex-wrap gap-5 justify-evenly my-4">
                <!-- Project Status Chart -->
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 mb-6" style="min-width:300px;max-width:300px">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-lg font-semibold text-primary-color mb-2">Task Distribution</h2>
                        <select name="group" id="group" class="border border-primary-color rounded-xl p-2">
                            <option value="1">CS001</option>
                            <option value="2">CS002</option>
                            <option value="3">CS003</option>
                        </select>
                    </div>
                    <canvas id="projectStatusChart"></canvas>
                </div>

                <!-- Groups per Supervisor Chart -->
                <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 mb-6" style="min-width:300px;">
                    <h2 class="text-lg font-semibold text-primary-color mb-4">Overall Project Completion</h2>
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
                labels: ['Member 01', 'Member 02', 'Member 03', 'Member 04'],
                datasets: [{
                    data: [20, 15, 5, 10],
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

        // Groups per Supervisor Chart
        const groupsPerSupervisorCtx = document.getElementById('groupsPerSupervisorChart').getContext('2d');
        const groupsPerSupervisorChart = new Chart(groupsPerSupervisorCtx, {
            type: 'bar',
            data: {
                labels: ['CS001', 'CS002', 'CS003', 'CS004', 'CS005', 'CS006', 'CS007', 'CS008', 'CS009', 'CS010', 'CS011', 'CS012'],
                datasets: [{
                    label: 'Completed Percentage',
                    data: [90, 70, 50, 30, 55, 88, 25, 43, 98, 45, 67, 78],
                    backgroundColor: '#6366F1'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: { title: { display: true, text: 'Groups' } },
                    y: { title: { display: true, text: 'Completed Percentage' }, beginAtZero: true }
                }
            }
        });
    </script>
</body>

</html>