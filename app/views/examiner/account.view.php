<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
     <!-- Edit Password Popup -->
     <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="editPasswordPopup">
        <div class="bg-white p-5 rounded-md w-full" style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Edit Password</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2" id="currentPasswordDiv">
                    <label for="current_password" class="text-lg font-bold text-primary-color">Current Password</label>
                    <input type="password" name="current_password" id="current_password"
                        class="border border-primary-color rounded-xl p-2">
                </div>
                <div class="flex flex-col gap-2 hidden" id="newPasswordDiv">
                    <label for="new_password" class="text-lg font-bold text-primary-color">New Password</label>
                    <input type="password" name="new_password" id="new_password"
                        class="border border-primary-color rounded-xl p-2">
                </div>
                <div class="flex flex-col gap-2 hidden" id="confirmPasswordDiv">
                    <label for="confirm_password" class="text-lg font-bold text-primary-color">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password"
                        class="border border-primary-color rounded-xl p-2">
                </div>
                <p class="text-danger-color text-base" id="passwordError"></p>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="editPasswordPopupClose">Cancel</button>
                    <button type="button" id="verifyPasswordBtn"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        onclick="verifyPassword()">Next</button>
                    <button type="button" id="updatePasswordBtn"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2 hidden"
                        onclick="updatePassword()">Update</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 3]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <p class="text-3xl font-bold text-primary-color">Account Settings</p>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 75px;width: 75px;object-fit: cover;">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex mt-5 gap-5">
                    <form class="flex flex-col w-2/3" method="post" action="" enctype="multipart/form-data">
                        <div class="bg-white shadow border-box" style="height:220px;border-radius: 20px;">
                            <div class="bg-blue" style="height: 100px;border-radius: 20px 20px 0 0;"></div>
                            <div class="flex px-5 w-full justify-between items-center border-box">
                                <div class="flex">
                                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                                        alt="profile picture" class="bg-white rounded-xl shadow-md"
                                        style="height: 150px;width: 150px;margin-top:-75px;object-fit: cover;" id="profileImagePreview" />
                                    <div class="bg-white rounded-xl shadow-md hidden" id="uploadImagePreview"
                                        style="height: 150px; width: 150px; margin-top: -75px;">
                                        <label for="imageUploadInput" class="flex justify-center items-center h-full"
                                            id="uploadImageLabel">
                                            <img src="<?= BASE_URL ?>/public/images/icons/upload.svg"
                                                style="height:50px;" alt="upload icon">
                                        </label>
                                        <label class="flex justify-center items-center h-full hidden"
                                            id="deleteImageLabel">
                                            <img src="<?= BASE_URL ?>/public/images/icons/trash.svg"
                                                style="height:50px;" alt="trash icon">
                                        </label>
                                        <input type="file" id="imageUploadInput" class="hidden" accept="image/*"
                                            name="profile_picture">
                                    </div>
                                    <div class="flex flex-col ml-5 mt-2">
                                        <p class="text-lg font-bold"><?= $_SESSION['user']['full_name'] ?></p>
                                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                                        <P class="p-4 my-2 bg-primary-color text-blue text-center rounded-xl">
                                            Examiner</P>
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
                                    <label for="panel_number" class="text-sm text-gray">Panel Number</label>
                                    <input type="text" name="panel_number" id="panel_number"
                                        class="border border-primary-color rounded-md p-2 text-gray"
                                        value="<?= $pageData['userData']['panel_number'] ?>" disabled>
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
            document.getElementById('description').disabled = false;

            // Toggle image upload
            document.getElementById('profileImagePreview').classList.add('hidden');
            document.getElementById('uploadImagePreview').classList.remove('hidden');
        });
        document.getElementById('cancelUpdate').addEventListener('click', () => {
            window.location.reload();
        });

        document.getElementById('imageUploadInput').addEventListener('change', (e) => {
            const file = e.target.files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                // show image as background of uploadImagePreview
                document.getElementById('uploadImagePreview').style.backgroundImage = `url(${e.target.result})`;
                document.getElementById('uploadImagePreview').style.backgroundSize = 'cover';
                document.getElementById('uploadImagePreview').style.backgroundPosition = 'center';

                // hide upload icon and show delete icon
                document.getElementById('uploadImageLabel').classList.add('hidden');
                document.getElementById('deleteImageLabel').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        });

        document.getElementById('deleteImageLabel').addEventListener('click', () => {
            document.getElementById('uploadImageLabel').classList.remove('hidden');
            document.getElementById('deleteImageLabel').classList.add('hidden');
            document.getElementById('uploadImagePreview').style.backgroundImage = '';
            document.getElementById('imageUploadInput').value = '';
        });

        document.getElementById('updatePassword').addEventListener('click', () => {
            document.getElementById('editPasswordPopup').classList.remove('hidden');
        });

        document.getElementById('editPasswordPopupClose').addEventListener('click', () => {
            document.getElementById('editPasswordPopup').classList.add('hidden');
        });

        function verifyPassword() {
            const currentPassword = document.getElementById('current_password').value;
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '<?= BASE_URL ?>/auth/verifyPassword', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        document.getElementById('currentPasswordDiv').classList.add('hidden');
                        document.getElementById('verifyPasswordBtn').classList.add('hidden');
                        document.getElementById('updatePasswordBtn').classList.remove('hidden');
                        document.getElementById('newPasswordDiv').classList.remove('hidden');
                        document.getElementById('confirmPasswordDiv').classList.remove('hidden');
                        document.getElementById('passwordError').innerText = '';
                    } else {
                        document.getElementById('passwordError').innerText = response.message;
                    }
                }
                return;
            }
            let formData = new FormData();
            formData.append('password', currentPassword);
            xhr.send(formData);
        }
        function updatePassword() {
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            if (newPassword !== confirmPassword) {
                document.getElementById('passwordError').innerText = 'Passwords do not match';
                return;
            }
            let xhr = new XMLHttpRequest();
            xhr.open('POST', '<?= BASE_URL ?>/auth/updatePassword', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        document.getElementById('editPasswordPopup').classList.add('hidden');
                        document.getElementById('passwordError').innerText = '';
                        window.location.reload();
                    } else {
                        document.getElementById('passwordError').innerText = response.message;
                    }
                }
                return;
            }
            let formData = new FormData();
            formData.append('password', newPassword);
            xhr.send(formData);
        }
        
    </script>
</body>

</html>