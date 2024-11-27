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
                <a href="<?= BASE_URL ?>" class="rounded-2xl px-5 py-4 nav-item nav-item-active">Home</a>
                <a href="<?= BASE_URL ?>/home/about" class="rounded-2xl px-5 py-4 nav-item">
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

    <!-- hero section-->
    <div class="flex items-center justify-evenly">
        <div>
            <img class="shadow-2xl" src="<?= BASE_URL ?>/public/images/home_img1.svg" alt=""
                style="width: 200px;transform: rotate(-10deg);">
        </div>
        <div class="flex flex-col justify-center items-center gap-5" style="margin-top: 100px;">
            <div id="heading" class="flex flex-col text-center font-bold hero-title">
                <h1>See Why You'll Love</h1>
                <h1 class="hero-title-gradient" style="min-height: 85px">
                    Working with MentorMe
                </h1>
            </div>
            <p class="text-xl" style="color:#64748b">
                This is the description for MentorMe our application we provide
                seamless access to our project
            </p>
            <a href="<?= BASE_URL ?>/auth/login" class="text-lg login-btn text-white px-10 py-4 rounded-2xl shadow-2xl">
                Get Started
            </a>
        </div>
        <img class=" mt-5" src="<?= BASE_URL ?>/public/images/home_img2.svg" alt=""
            style="width: 250px;transform: rotate(10deg);">
    </div>

    <div class="flex justify-center" style="margin-top: 0px;">
        <img style="width:90%;" src="<?= BASE_URL ?>/public/images/home_img3.svg" alt="">
    </div>
</body>

</html>