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
                    <form class="flex flex-col w-2/3" method="post" action="" enctype="multipart/form-data">
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
                                        <P class="p-4 my-2 bg-primary-color text-blue text-center rounded-xl">
                                            SUPERVISOR</P>
                                    </div>
                                </div>
                                <button class="bg-blue rounded-xl text-left text-white text-base font-bold px-5 py-4"
                                    type="button" id="enableEditBtn">
                                    Edit
                                </button>
                                <div class="hidden" id="updateProfile">
                                    <button
                                        class="bg-blue rounded-xl text-left text-white text-base font-bold px-5 py-4"
                                        type="submit" name="update_account">
                                        Update
                                    </button>
                                    <button class="bg-red rounded-xl text-left text-white text-base font-bold px-5 py-4"
                                        type="button" id="cancelUpdate">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col border-box p-5 pb-10 bg-white shadow rounded-xl mt-5">
                            <p class="text-lg font-bold mb-5">Account Information</p>
                            <div class="flex justify-evenly w-full">
                                <div class="flex flex-col" style="width: 40%;">
                                    <label for="full_name" class="text-sm text-gray">Full Name</label>
                                    <input type="text" name="full_name" id="full_name"
                                        class="border border-primary-color rounded-md p-2"
                                        value="<?= $_SESSION['user']['full_name'] ?>" disabled>
                                </div>
                                <div class="flex flex-col" style="width: 40%;">
                                    <label for="email" class="text-sm text-gray">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="border border-primary-color rounded-md p-2 text-gray"
                                        value="<?= $_SESSION['user']['email'] ?>" disabled>
                                </div>
                            </div>
                            <div class="flex justify-evenly w-full mt-5">
                                <div class="flex flex-col" style="width: 40%;">
                                    <label for="group" class="text-sm text-gray">User ID</label>
                                    <input type="text" name="user_id" id="user_id"
                                        class="border border-primary-color rounded-md p-2 text-gray"
                                        value="<?= $_SESSION['user']['user_id'] ?>" disabled>
                                </div>
                                <div class="flex flex-col" style="width: 40%;">
                                    <label for="role" class="text-sm text-gray">Role</label>
                                    <input type="text" name="role" id="role"
                                        class="border border-primary-color rounded-md p-2 text-gray"
                                        value="<?= $_SESSION['user']['role'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col border-box p-5 pb-10 bg-white shadow rounded-xl mt-5 gap-5">
                            <p class="text-lg font-bold">Supervisor Information</p>
                            <div class="flex justify-between w-full">
                                <div class="flex flex-col" style="width: 40%;">
                                    <label for="expected_projects" class="text-sm text-gray">Expected Projects</label>
                                    <input type="number" name="expected_projects" id="expected_projects"
                                        class="border border-primary-color rounded-md p-2"
                                        value="<?= $pageData['userData']['expected_projects'] ?>" disabled>
                                </div>
                                <div class="flex flex-col" style="width: 40%;">
                                    <label for="current_projects" class="text-sm text-gray">Current Projects</label>
                                    <input type="number" name="current_projects" id="current_projects"
                                        class="border border-primary-color rounded-md p-2 text-gray"
                                        value="<?= $pageData['userData']['current_projects'] ?>" disabled>
                                </div>
                            </div>
                            <div class="flex flex-col w-full">
                                <label for="description" class="text-sm text-gray">Description</label>
                                <textarea name="description" id="description"
                                    class="border border-primary-color rounded-md p-2" rows="5"
                                    disabled><?= $pageData['userData']['description'] ?></textarea>
                            </div>
                        </div>
                    </form>
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
    </div>
    <script>
        document.getElementById('enableEditBtn').addEventListener('click', () => {
            document.getElementById('updateProfile').classList.remove('hidden');
            document.getElementById('enableEditBtn').classList.add('hidden');
            document.getElementById('full_name').disabled = false;
            document.getElementById('expected_projects').disabled = false;
            document.getElementById('description').disabled = false;
        });

        document.getElementById('cancelUpdate').addEventListener('click', () => {
            window.location.reload();
        });
    </script>
</body>

</html>