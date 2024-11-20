<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body class="bg-primary-color">
    <!-- Container -->
    <div class="flex flex-col px-2 py-2 items-center">
        <!-- Navbar -->
        <div class="rounded-lg bg-white flex w-full py-2 px-2 mx-4 my-4 justify-between shadow" style="max-width: 90vw;">
            <div class="flex items-center">
                <img src="<?= BASE_URL ?>/public/images/home_logo.png" alt="home logo" width="50" height="50">
                <p class="text-primary-color text-2xl font-bold ml-2">MentorMe</p>
            </div>
            <div class="flex flex-row items-center gap-4">
                <a href="<?= BASE_URL ?>/home/about" class="text-primary-color hover:text-primary-color">About</a>
                <a href="<?= BASE_URL ?>/home/contact" class="text-primary-color hover:text-primary-color">Contact</a>
                <a href="<?= BASE_URL ?>/auth/login"
                    class="btn-primary-color rounded-lg text-center text-white text-base font-medium px-10 py-2">Login</a>
            </div>
        </div>
        <!-- Hero Section -->
        <div class="flex flex-col items-center justify-center w-full" style="height: 80vh;">
            <div class="flex flex-col items-center w-1/2 text-center">
                <p class="text-black text-6xl font-bold">Welcome to <span class="text-blue">MentorMe</span></p>
                <p class="text-gray text-2xl font-medium">A platform to connect mentors and mentees</p>
                <a href="<?= BASE_URL ?>/auth/register"
                    class="btn-primary-color rounded-lg text-center text-white text-base font-medium px-10 py-2 mt-4">Get
                    Started</a>
            </div>
        </div>
    </div>
</body>

</html>