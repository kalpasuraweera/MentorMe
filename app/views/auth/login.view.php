<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex items-center h-screen bg-primary-color">
        <div class="flex flex-col px-5">
            <div class="">
                <h1 class="text-primary-color text-6xl font-bold my-5">MentorMe</h1>
                <p class="text-secondary-color text-base font-medium my-5">
                    As a Clinical Research Coordinator, you will be responsible for managing and coordinating clinical
                    trials and research studies. You will work closely with principal investigators, research staff, and
                    study participants to ensure the smooth operation of research projects.
                </p>

            </div>

            <form class="px-10 py-10 bg-white rounded-2xl flex-col justify-start items-start"
                onsubmit="handleLogin(event)">
                <div class="flex flex-col mt-5">
                    <label for="email" class="">Email</label>
                    <input
                        class="px-4 py-2 bg-white rounded-lg border border-primary-color justify-start items-center inline-flex"
                        id="email" type="email" name="email" required>
                </div>
                <div class="flex flex-col my-5">
                    <label for="password" class="">Password</label>
                    <input
                        class="px-4 py-2 bg-white rounded-lg border border-primary-color justify-start items-center inline-flex"
                        id="password" type="password" name="password" required>
                </div>
                <p class="text-danger-color text-base" id="error"></p>
                <div class="flex justify-end">
                    <?php $this->renderComponent('button', ['name' => 'login_btn', 'type' => 'submit', 'text' => 'Login']) ?>
                </div>
            </form>
        </div>
        <div class="">
            <img src="<?= BASE_URL ?>/public/images/login_img.png" alt="login page image">
        </div>
    </div>
    <script src="<?= BASE_URL ?>/public/js/pages/auth_login.js"></script>
</body>

</html>