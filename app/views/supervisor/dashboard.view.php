<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex flex-row bg-primary-color h-screen">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 0]) ?>
        <div class="flex flex-col w-3/4 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Supervisor Dashboard</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex justify-evenly gap-5">
                <div class="flex flex-col justify-evenly w-full gap-2 text-white">
                    <?php $this->renderComponent('numberCard', ['title' => 'Pending Requests', 'value' => 100, 'bg' => 'btn-primary-color']) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks Created', 'value' => 100]) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks Completed', 'value' => 100]) ?>
                </div>
              
            </div>
        </div>
</body>

</html>