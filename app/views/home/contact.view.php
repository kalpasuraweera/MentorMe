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
                <a href="<?= BASE_URL ?>/home/about" class="rounded-2xl px-5 py-4 nav-item">
                    About
                </a>
                <a href="<?= BASE_URL ?>/home/contact" class="rounded-2xl px-5 py-4 nav-item nav-item-active">
                    Contact
                </a>
            </div>
            <a href="<?= BASE_URL ?>/auth/login" class="rounded-2xl px-10 py-4 login-btn">
                Login
            </a>
        </div>
    </div>
    <!-- Container -->
    <div class="flex flex-col px-2 py-2 items-center">
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
                <?php if (isset($_SESSION['message_sent']) && $_SESSION['message_sent']): ?>
                    <div class="text-green p-4">
                        <p>Your message has been sent successfully. We'll get back to you soon!</p>
                    </div>
                    <?php unset($_SESSION['message_sent']); ?>
                <?php endif; ?>
                <div class="flex justify-end">
                    <button type="submit"
                        class="btn-primary-color rounded-lg text-center text-white text-base font-medium px-10 py-2 mt-4"
                        name="send_message" id="send_message" style="width:100px;">Send</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>