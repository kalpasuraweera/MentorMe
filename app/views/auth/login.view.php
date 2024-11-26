<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/auth_login.css">
</head>

<body>
    <div class="flex items-center justify-evenly h-screen w-screen bg-primary-color">
        <div class="flex flex-end">
            <img src="<?= BASE_URL ?>/public/images/login_img.png" class="side_image" alt="login page image">
        </div>
        <div class="flex flex-col px-5 login_container items-center">
            <img src="<?= BASE_URL ?>/public/images/default_logo.png" class="logo" alt="logo" height="100px">
            <form class="px-10 py-10 rounded-2xl flex-col justify-start items-start" onsubmit="handleLogin(event)"
                style="min-width:400px">
                <div class="flex flex-col mt-5">
                    <label for="email" class="">Email</label>
                    <input
                        class="px-4 py-2 bg-white rounded-lg border border-primary-color justify-start items-center inline-flex"
                        placeholder="Enter your email" id="email" type="email" name="email" required>
                </div>
                <div class="flex flex-col my-5">
                    <label for="password" class="">Password</label>
                    <input
                        class="px-4 py-2 bg-white rounded-lg border border-primary-color justify-start items-center inline-flex"
                        placeholder="Enter your password" id="password" type="password" name="password" required>
                </div>
                <p class="text-danger-color text-base" id="error"></p>
                <div class="flex justify-center">
                    <button
                        class="btn-primary-color rounded-lg text-center text-white text-base font-medium px-10 py-2 shadow"
                        type="submit" name="login_btn">Login</button>
                </div>
            </form>
        </div>

    </div>
    <script src="<?= BASE_URL ?>/public/js/pages/auth_login.js"></script>
</body>

</html>