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
                <p class="text-3xl font-bold text-primary-color">Account Settings</p>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/default_profile.jpg" alt="user icon" class="rounded-full"
                        style="height: 75px;width: 75px;">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex mt-5 gap-5">
                    <div class="flex flex-col w-2/3">
                        <div class="bg-white shadow border-box" style="height:220px;border-radius: 20px;">
                            <div class="bg-blue" style="height: 100px;border-radius: 20px 20px 0 0;"></div>
                            <div class="flex px-5 w-full justify-between items-center border-box">
                                <div class="flex">
                                    <img src="<?= BASE_URL ?>/public/images/default_profile.jpg" alt="user profile"
                                        class="bg-white rounded-xl shadow-md"
                                        style="height: 150px;width: 150px;margin-top:-75px;">
                                    </img>
                                    <div class="flex flex-col ml-5 mt-2">
                                        <p class="text-lg font-bold"><?= $_SESSION['user']['full_name'] ?></p>
                                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                                        <P class="p-4 bg-primary-color text-primary-color text-center rounded-xl">
                                            Supervisor</P>
                                    </div>
                                </div>
                                <button class="bg-blue rounded-xl text-left text-white text-base font-bold px-10 py-4"
                                    id="updateProfile">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-1/3 gap-5">
                        <div class="bg-white shadow rounded-xl p-5">
                            <p class="text-lg font-bold mb-2"> Last Access to MentorMe</p>
                            <p><?= date('d F Y, H:i:s', strtotime($pageData['userData']['last_login'])) ?></p>
                        </div>
                        <div class="bg-white shadow rounded-xl p-5">
                            <p class="text-lg font-bold mb-2"> Last Profile Update</p>
                            <p><?= date('d F Y, H:i:s', strtotime($pageData['userData']['last_update'])) ?></p>
                        </div>
                        <button
                            class="bg-blue rounded-xl text-left text-white text-base font-bold px-10 py-4 flex items-center justify-between"
                            id="updatePassword">
                            <p>Change Password</p>
                            <img src="<?= BASE_URL ?>/public/images/icons/popup.svg" alt="popup icon">
                        </button>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>