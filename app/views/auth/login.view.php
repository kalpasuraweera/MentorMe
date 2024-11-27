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
    <div class="flex items-center justify-between h-screen w-screen px-10" style="box-sizing: border-box;">
        <div class="flex flex-end relative rounded-3xl"
            style=" height: 95vh; width: 30vw;background: linear-gradient(198deg, #556AE3 12.46%, #2ADB97 99.31%);">
            <p class="text-white text-2xl font-medium"
                style="padding-left: 20px; padding-top: 30px;padding-right: 30px;line-height: 1.5;">
                Effective project management paired with clear analytics and visualization ensures success every time.
            </p>
            <img src="<?= BASE_URL ?>/public/images/login_img.svg" alt="login page image"
                style="height: 400px; top: 25%; right:-30%;position:absolute;">
        </div>
        <div class="flex flex-col px-5 login_container items-center" style="flex:1;">
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