<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 4]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">
                    Account Settings
                </h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                
            </div>
        </div>
</body>

</html>