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
                    <p class="ml-2">Dashboard</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2">Manage Students</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2">Manage Supervisors</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2">Manage Groups</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2">Manage Examiners</p>
                </a>
                <a href="<?= BASE_URL ?>/coordinator/dashboard"
                    class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
                    <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon"
                        class="mx-2">
                    <p class="ml-2">Calendar</p>
                </a>

            </div>
        </div>
        <div class="flex flex-col w-3/4 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">Coordinator Dashboard</h1>
                <a href="<?= BASE_URL ?>/coordinator/logout"
                    class="p-2 btn-primary-color text-white rounded-lg">Logout</a>
            </div>

        </div>
</body>

</html>