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
        <?php $this->renderComponent('sideBar', ['activeIndex' => 3]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Supervisor and Examiner Feedbacks</h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 75px;width: 75px;">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <?php if (empty($pageData['groupFeedbacks'])): ?>
                    <p class="text-center text-secondary-color">No feedbacks found</p>
                <?php endif; ?>
                <?php foreach ($pageData['groupFeedbacks'] as $feedback): ?>
                    <div class="flex flex-col bg-white shadow-lg rounded-xl p-5 mb-4">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0">
                                <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 75px;width: 75px;">
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-bold text-primary-color">
                                    <?= $feedback['full_name'] ?> <span
                                        class="text-sm text-gray-500">(<?= $feedback['type'] ?>)</span>
                                </p>
                                <p class="text-sm text-gray">
                                    <?= date('d F Y', strtotime($feedback['created_at'])) ?>
                                </p>
                            </div>
                        </div>
                        <div class="border-t border-gray pt-4">
                            <p class="text-secondary-color">
                                <?= $feedback['feedback'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</body>

</html>