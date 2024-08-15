<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex flex-row bg-primary-color h-screen">
        <div class="flex flex-col w-1/4 text-white bg-white">
            <div class="flex flex-col items-center p-5">
                <img src="<?= BASE_URL ?>/public/images/dashboard_logo.png" alt="dashboard logo">
            </div>
            <div class="flex flex-col items-center p-5 gap-2">
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 btn-primary-color text-white rounded-md">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_primary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2 py-4">Dashboard</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/students"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2 py-4">Manage Students</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2 py-4">Manage Supervisors</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2 py-4">Manage Groups</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2 py-4">Manage Examiners</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2 py-4">Calendar</p>
                </a>

            </div>
        </div>
        <div class="flex flex-col w-3/4 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Coordinator Dashboard</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color">Coordinator</p>
                        <p class="text-sm text-secondary-color">coordinator@cmb.ac.lk</p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex justify-evenly gap-5">
                <div class="flex flex-col justify-evenly w-full gap-2 text-white">
                    <div class="btn-primary-color py-5 rounded-md">156</div>
                    <div class="btn-primary-color py-5 rounded-md">1000</div>
                    <div class="btn-primary-color py-5 rounded-md">11</div>
                </div>
                <div class="flex flex-col bg-white w-full">
                    <h1>Upcoming Events</h1>
                    <p>Event 1</p>
                    <p>Event 2</p>
                    <p>Event 3</p>
                    <p>Event 4</p>
                </div>
                <div class="flex flex-col bg-white w-full">
                    <h1>Top Preforming Groups</h1>
                    <p>Group 1</p>
                    <p>Group 2</p>
                    <p>Group 3</p>
                </div>
            </div>
        </div>
</body>

</html>