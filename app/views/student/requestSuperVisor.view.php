<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 5]) ?>
        <div class="flex flex-col w-3/4 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Request Supervisor</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <?php
                foreach ($pageData['supervisors'] as $supervisor) {
                    $supervisorCard = "<div class='flex flex-col bg-white shadow rounded-xl p-5'>
                            <p class='text-lg font-bold text-primary-color'>" . $supervisor['full_name'] . "</p>
                            <p class='text-secondary-color'>" . $supervisor['email'] . "</p>
                            <div class='mt-5'>
                                <p class='text-black font-bold'>Background:</p>
                                <p class='text-secondary-color'>" . $supervisor['description'] . "</p>
                                <p class='text-black font-bold mt-5'>Expected Teams: " . $supervisor['expected_projects'] . "</p>
                                <p class='text-black font-bold mt-5'>Accepted Teams: " . $supervisor['current_projects'] . "</p>
                                <p class='text-black font-bold mt-5'>Applied Teams: " . $supervisor['expected_projects'] . "</p>
                                <p class='text-black font-bold mt-5'>Rejected Teams: " . $supervisor['expected_projects'] . "</p>
                            </div>
                            <div class='flex justify-end mt-5 gap-5'>";
                    if ($supervisor['email_id'] === 'pending') {
                        $supervisorCard .= "<button class='btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2'>Request</button>";
                    } else {
                        $supervisorCard .= "<button class='btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2'>Requested</button>";
                    }
                    $supervisorCard .= "</div>
                        </div>";
                    echo $supervisorCard;
                }
                ?>
            </div>
        </div>
</body>

</html>