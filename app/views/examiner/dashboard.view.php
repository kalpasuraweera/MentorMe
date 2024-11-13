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
                <h1 class="text-3xl font-bold text-primary-color">Examiner Dashboard</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex justify-evenly gap-5 mt-5">
                <div class="flex flex-col justify-evenly gap-2 text-white">
                    <?php $this->renderComponent('numberCard', ['title' => 'Pending Requests', 'value' => 100, 'bg' => 'btn-primary-color']) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks Created', 'value' => 100, 'icon' => 'created_icon.png']) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks Completed', 'value' => 100, 'icon' => 'completed_icon.png']) ?>
                </div>
                <div class="flex flex-col py-5 px-10 text-white bg-white shadow rounded-xl" style="width:300px;">
                    <p class="text-lg font-bold text-primary-color mb-4">Upcoming Events</p>
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col px-2" style="border-left: 5px solid #4318ff;">
                            <p class="text-black font-bold">Bi-Weekly Meeting</p>
                            <p class="text-secondary-color">24 Aug 2021</p>
                        </div>
                        <div class="flex flex-col px-2" style="border-left: 5px solid #ff1843;">
                            <p class="text-black font-bold">Mentorship Session</p>
                            <p class="text-secondary-color">30 Aug 2021</p>
                        </div>
                        <div class="flex flex-col px-2" style="border-left: 5px solid #18ff43;">
                            <p class="text-black font-bold">Training Session</p>
                            <p class="text-secondary-color">15 Sep 2021</p>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <p class="text-primary-color font-bold">View All</p>
                    </div>
                </div>
                 <div class="flex flex-col py-5 px-10 text-white bg-white shadow rounded-xl" style="width:300px;">
                    <p class="text-lg font-bold text-primary-color mb-4">Top Performing groups</p>
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
                        <p class="text-primary-color font-bold">View All</p>
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
        <script src="<?= BASE_URL ?>/public/js/pages/supervisor_dashboard.js"></script>
</body>

</html>