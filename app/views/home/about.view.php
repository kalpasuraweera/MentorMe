<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body class="bg-primary-color" style="
background:radial-gradient(circle, rgba(130, 219, 255, 0.3), transparent)
">
    <!-- Container -->
    <div class="flex flex-col px-2 py-2 items-center">
        <!-- Navbar -->
        <div class="rounded-lg bg-white flex w-full py-2 px-4 mx-4 my-4 justify-between shadow"
            style="max-width: 90vw;">
            <div class="flex items-center">
                <img src="<?= BASE_URL ?>/public/images/home_logo.png" alt="home logo" width="50" height="50">
                <p class="text-primary-color text-2xl font-bold ml-2">MentorMe</p>
            </div>
            <div class="flex flex-row items-center gap-5 font-bold">
                <a href="<?= BASE_URL ?>/home/" class="text-black hover:text-secondary-color">Home</a>
                <a href="<?= BASE_URL ?>/home/about"
                    class="text-primary-color hover:text-black bg-light-blue py-2 px-4 rounded-xl">About</a>
                <a href="<?= BASE_URL ?>/home/contact" class="text-black hover:text-secondary-color">Contact</a>
            </div>
            <div class="flex flex-row items-center gap-4">
                <a href="<?= BASE_URL ?>/auth/login"
                    class="btn-primary-color rounded-lg text-center text-white text-base font-medium px-10 py-2">Login</a>
            </div>
        </div>
        <!-- About Section -->
        <div class="p-5 w-full mx-auto my-5" style="max-width: 90vw;">
            <h1 class="text-3xl font-bold text-primary-color mb-4">About MentorMe</h1>
            <p class="text-lg text-gray mb-4">
                MentorMe is a platform dedicated to connecting mentors and mentees in various fields. Our mission is to
                provide a space where individuals can share knowledge, gain insights, and grow together.
            </p>
            <p class="text-lg text-gray mb-4">
                Whether you are looking to advance your career, learn a new skill, or simply seek guidance, MentorMe is
                here to help you find the right mentor to guide you on your journey.
            </p>
            <p class="text-lg text-gray">
                Join our community today and start your path to success with the support of experienced mentors.
            </p>
        </div>
    </div>
</body>

</html>