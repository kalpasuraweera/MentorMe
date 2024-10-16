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
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Dr. Dinuni K Fernando</p>
                    <div class="mt-5">
                        <p class="text-black font-bold">Background:</p>
                        <p class="text-secondary-color">As a Clinical Research Coordinator, you will be responsible for
                            managing and coordinating clinical trials and research studies. You will work closely with
                            principal investigators, research staff, and study participants to ensure the smooth
                            operation of research projects.</p>
                        <p class="text-black font-bold mt-5">Expected Teams: 03</p>
                        <p class="text-black font-bold mt-5">Accepted Teams: 01</p>
                        <p class="text-black font-bold mt-5">Applied Teams: 04</p>
                        <p class="text-black font-bold mt-5">Rejected Teams: 01</p>
                    </div>
                    <div class="flex justify-end mt-5 gap-5">
                        <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Request', 'bg' => 'btn-primary-color']) ?>
                    </div>


                </div>
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Dr. Chamath Kepptiyagama</p>
                    <div class="mt-5">
                        <p class="text-black font-bold">Background:</p>
                        <p class="text-secondary-color">As a Clinical Research Coordinator, you will be responsible for
                            managing and coordinating clinical trials and research studies. You will work closely with
                            principal investigators, research staff, and study participants to ensure the smooth
                            operation of research projects.</p>
                        <p class="text-black font-bold mt-5">Expected Teams: 03</p>
                        <p class="text-black font-bold mt-5">Accepted Teams: 01</p>
                        <p class="text-black font-bold mt-5">Applied Teams: 04</p>
                        <p class="text-black font-bold mt-5">Rejected Teams: 01</p>
                    </div>
                    <div class="flex justify-end mt-5 gap-5">
                        <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Request', 'bg' => 'btn-primary-color']) ?>
                    </div>


                </div>
            </div>

        </div>
</body>

</html>