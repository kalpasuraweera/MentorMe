<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/supervisor_dashboard.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 0]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Supervisor Dashboard</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <div class="profile-picture" id="profileDetail">
                        <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="profile pic" id="popupProfile">
                    </div>
                </div>
            </div>
            <div class="flex justify-evenly gap-5 mt-5">
                <div class="flex flex-col justify-evenly gap-2 text-white">
                    <?php $this->renderComponent('numberCard', ['title' => 'Pending Requests', 'value' => 100, 'bg' => 'btn-primary-color']) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks Created', 'value' => 100, 'icon' => 'created_icon.png']) ?>
                    <?php $this->renderComponent('numberCard', ['title' => 'Tasks Completed', 'value' => 100, 'icon' => 'completed_icon.png']) ?>
                </div>
                <div class="flex flex-col py-5 px-10 text-white bg-white shadow rounded-xl" style="width:300px;">
                    <p class="text-lg font-bold text-primary-color mb-4">Upcoming Events</p>
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col px-2" style="border-left: 5px solid #4318ff;">
                            <p class="text-black font-bold">Bi-Weekly Meeting</p>
                            <p class="text-secondary-color">24 Aug 2021</p>
                        </div>
                        <div class="flex flex-col px-2" style="border-left: 5px solid #ff1843;">
                            <p class="text-black font-bold">Mentorship Session</p>
                            <p class="text-secondary-color">30 Aug 2021</p>
                        </div>
                        <div class="flex flex-col px-2" style="border-left: 5px solid #18ff43;">
                            <p class="text-black font-bold">Training Session</p>
                            <p class="text-secondary-color">15 Sep 2021</p>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="<?= BASE_URL ?>/supervisor/calendar" class="text-primary-color font-bold">View All</a>
                    </div>
                </div>
                <div class="flex flex-col py-5 px-10 text-white bg-white shadow rounded-xl" style="width:300px;">
                    <p class="text-lg font-bold text-primary-color mb-4">Top Performers</p>
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center">
                            <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon" width="40"
                                height="40">
                            <div class="flex flex-col px-2">
                                <p class="text-black font-bold">John Doe</p>
                                <p class="text-secondary-color">CS001</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon" width="40"
                                height="40">
                            <div class="flex flex-col px-2">
                                <p class="text-black font-bold">John Doe</p>
                                <p class="text-secondary-color">CS001</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon" width="40"
                                height="40">
                            <div class="flex flex-col px-2">
                                <p class="text-black font-bold">John Doe</p>
                                <p class="text-secondary-color">CS001</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5">
                        <a href="<?= BASE_URL ?>/supervisor/groups" class="text-primary-color font-bold">View All</a>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow rounded-xl p-5 mt-5">
                <canvas id="weeklyTaskCompletion"></canvas>
            </div>
            <div class="flex justify-evenly gap-5 my-5">
                <div class="bg-white shadow rounded-xl p-5 flex items-center flex-grow">
                    <canvas id="projectCompletion"></canvas>
                </div>
                <div class="bg-white shadow rounded-xl p-5 flex items-center">
                    <canvas id="taskDistribution"></canvas>
                </div>
            </div>
        </div>

        
            <!-- !!!!!!!!!!!  Profile popup  !!!!!!!!!! -->
            <div id="profileOverlay" class="profileOverlay" style="display: none;">
                <div class="popup-profile">
                    <div class="profile-block-1">
                        <!-- Student Picture -->
                        <img src="<?= BASE_URL ?>/public/images/student_logo.png" alt="profile pic">
                        <h1><?= $_SESSION['user']['role'] ?></h1>
                    </div>
                    <div class="profile-block-2">
                        <div class="profile-block-2-header">
                            <div class="profile-buttons">
                                <div class="profile-update-button">
                                    <img src="<?= BASE_URL ?>/public/images/icons/settings.png" alt="update icon pic"
                                        id="profileUpdateButton">
                                </div>
                                <div class="profile-close-button">
                                    <img src="<?= BASE_URL ?>/public/images/icons/logout_icon.png" alt="logout icon pic"
                                        id="profileCloseButton">
                                </div>
                            </div>
                        </div>
                        <div class="profile-block-2-maincontent-1">
                            <?php if (!empty($pageData['supervisor'][0])): ?>
                                <?php $supervisorData = $pageData['supervisor'][0]; ?>
                                <div class="popupProfile-detail">
                                    <div class="popupProfile-detail-type">ID</div>
                                    <div class="popupProfile-detail-value"><?= $_SESSION['user']['user_id'] ?></div>
                                </div>
                                <div class="popupProfile-detail">
                                    <div class="popupProfile-detail-type">Full Name</div>
                                    <div class="popupProfile-detail-value"><?= $_SESSION['user']['full_name'] ?></div>
                                </div>
                                <div class="popupProfile-detail">
                                    <div class="popupProfile-detail-type">E-Mail</div>
                                    <div class="popupProfile-detail-value"><?= $_SESSION['user']['email'] ?></div>
                                </div>
                                <div class="popupProfile-detail">
                                    <div class="popupProfile-detail-type">Description</div>
                                    <div class="popupProfile-detail-value"><?= $supervisorData['description'] ?? 'N/A' ?></div>
                                </div>

                            <?php else: ?>
                                <p>No Supervisor Data</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


        
            <!-- !!!!!!!!!!! Update Profile Popup !!!!!!!!!! -->
            <div id="updateProfileOverlay" class="updateProfileOverlay" style="display: none;">
                <div class="popup-updateProfile">
                    <div class="profile-block-1">
                        <!-- Student Picture -->
                        <img src="<?= BASE_URL ?>/public/images/student_logo.png" alt="profile pic">
                        <h1><?= $_SESSION['user']['role'] ?></h1>
                    </div>
                    <div class="profile-block-2">
                        <div class="profile-block-2-header">
                            <div class="profile-buttons">
                                <div class="profile-close-button" style="padding-left: 60%;">
                                    <img src="<?= BASE_URL ?>/public/images/icons/logout_icon.png" alt="logout icon pic"
                                        id="updateProfileCloseButton">
                                </div>
                            </div>
                        </div>
                        <div class="profile-block-2-maincontent-1">
                            <?php if (!empty($pageData['supervisor'][0])): ?>
                                <?php $supervisorData = $pageData['supervisor'][0]; ?>
                                <!-- Update Form -->
                                <form id="updateProfileForm" method="POST">
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">ID</div>
                                        <div class="popupProfile-detail-value">
                                            <input type="text" name="user_id" value="<?= $_SESSION['user']['user_id'] ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">Full Name</div>
                                        <div class="popupProfile-detail-value">
                                            <input type="text" name="full_name"
                                                value="<?= $_SESSION['user']['full_name'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">E-Mail</div>
                                        <div class="popupProfile-detail-value">
                                            <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" readonly>
                                            <span id="emailError" class="error-message" style="color: red; display: none;"></span>
                                        </div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">Description</div>
                                        <div class="popupProfile-detail-value">
                                            <input type="text" name="description"
                                                value="<?= $supervisorData['description'] ?? 'not accessable' ?>" required>
                                        </div>
                                    </div>
                                    <div class="profile-buttons">
                                        <button type="submit" class="save-button" id="update_profile"
                                            name="update_profile">Save Changes</button>
                                    </div>
                                </form>

                            <?php else: ?>
                                <p>No Supervisor Data</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        <script>
            document.getElementById('updateProfileForm').addEventListener('submit', function (event) {
            const emailInput = document.querySelector('input[name="email"]');
            const emailError = document.getElementById('emailError');
            const email = emailInput.value.trim();
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            // Clear previous error message
            emailError.textContent = '';
            emailError.style.display = 'none';

            if (!emailRegex.test(email)) {
                event.preventDefault(); // Prevent form submission
                emailError.textContent = 'Please enter a valid email address.';
                emailError.style.display = 'block';
                emailInput.focus(); // Highlight the invalid email field
            }
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
        <script src="<?= BASE_URL ?>/public/js/pages/supervisor_dashboard.js"></script>
</body>

</html>