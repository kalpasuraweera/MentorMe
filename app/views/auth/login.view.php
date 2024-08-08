<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex items-center h-screen bg-violet-50">
        <div class="flex flex-col px-5">
            <div class="">
                <h1 class="text-indigo-900 text-6xl font-bold my-5">MentorMe</h1>
                <p class="text-gray-500 text-base font-medium my-5">
                    As a Clinical Research Coordinator, you will be responsible for managing and coordinating clinical
                    trials and research studies. You will work closely with principal investigators, research staff, and
                    study participants to ensure the smooth operation of research projects.
                </p>

            </div>

            <form class="px-10 py-10 bg-white rounded-2xl flex-col justify-start items-start">
                <div class="flex flex-col mt-5">
                    <label for="email" class="">Email</label>
                    <input
                        class="px-4 py-2 bg-white rounded-lg border border-zinc-300 justify-start items-center inline-flex"
                        id="email" type="email" name="email">
                </div>
                <div class="flex flex-col my-5">
                    <label for="password" class="">Password</label>
                    <input
                        class="px-4 py-2 bg-white rounded-lg border border-zinc-300 justify-start items-center inline-flex"
                        id="password" type="password" name="password">
                </div>
                <div class="flex justify-end">
                    <button
                        class="bg-indigo-600 rounded-3xl text-center text-white text-base font-medium px-10 py-2">Login</button>
                </div>
            </form>
        </div>
        <div class="">
            <img src="<?= BASE_URL ?>/public/images/login_img.png" alt="login page image">
        </div>
    </div>
</body>

</html>