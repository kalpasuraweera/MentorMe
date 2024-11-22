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
                <a href="<?= BASE_URL ?>/home/about" class="text-black hover:text-secondary-color">About</a>
                <a href="<?= BASE_URL ?>/home/contact"
                    class="text-primary-color hover:text-black bg-light-blue py-2 px-4 rounded-xl">Contact</a>
            </div>
            <div class="flex flex-row items-center gap-4">
                <a href="<?= BASE_URL ?>/auth/login"
                    class="btn-primary-color rounded-lg text-center text-white text-base font-medium px-10 py-2">Login</a>
            </div>
        </div>
        <!-- Contact Section -->
        <div class="bg-white rounded-lg shadow-md p-5 w-full mx-5 my-5" style="max-width: 900px;">
            <h2 class="text-2xl font-bold text-primary-color mb-4">Contact Us</h2>
            <form action="<?= BASE_URL ?>/home/contact" method="POST" class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label for="name" class="text-lg font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="border border-gray-300 rounded-lg p-2" required>
                </div>
                <div class="flex flex-col">
                    <label for="email" class="text-lg font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="border border-gray-300 rounded-lg p-2" required>
                </div>
                <div class="flex flex-col">
                    <label for="message" class="text-lg font-medium text-gray-700">Message</label>
                    <textarea id="message" name="message" rows="5" class="border border-gray-300 rounded-lg p-2"
                        required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="btn-primary-color rounded-lg text-center text-white text-base font-medium px-10 py-2 mt-4"
                        style="width:100px;">Send</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>