<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/home.css">
</head>

<body>

    <div class="flex justify-center">
        <!-- navbar -->
        <div class="flex justify-between items-center mt-5 rounded-3xl p-4 font-medium nav-container">
            <div>
                <img src="<?= BASE_URL ?>/public/images/default_logo.png" alt="logo" width="200px">
            </div>

            <div class="flex gap-2">
                <a href="<?= BASE_URL ?>" class="rounded-2xl px-5 py-4 nav-item">Home</a>
                <a href="<?= BASE_URL ?>/home/about" class="rounded-2xl px-5 py-4 nav-item nav-item-active">
                    About
                </a>
                <a href="<?= BASE_URL ?>/home/contact" class="rounded-2xl px-5 py-4 nav-item">
                    Contact
                </a>
            </div>
            <a href="<?= BASE_URL ?>/auth/login" class="rounded-2xl px-10 py-4 login-btn">
                Login
            </a>
        </div>
    </div>
    <!-- Container -->
    <div class="flex flex-col px-2 py-2 items-center"></div>
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