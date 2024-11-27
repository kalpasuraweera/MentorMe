<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/student_dashboard.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">

    <title>MentoMe</title>
</head>

<body class=".bg-primary-color">
    <div class="layout-container">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 0]) ?>
        <div class="block-2">
            <div class="block-2-header">
                <div class="block-2-header-text">
                    <h1>Dashboard</h1>
                </div>
                <div class="profile">
                    <div class="profile-detail">
                        <h1><?= $_SESSION['user']['full_name'] ?></h1>
                        <h3><?= $_SESSION['user']['email'] ?></h3>
                    </div>
                    <div class="profile-picture" id="profileDetail">
                        <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="profile pic"
                            id="popupProfile">
                    </div>
                </div>
            </div>
            <div class="block-2-maincontent-1">
                <div class="block-2-maincontent-1-card-1">
                    <h2>Total Tasks<br>100</h2>

                </div>
                <div class="block-2-maincontent-1-card-2">
                    <h2>Finished Tasks</h2>
                </div>
                <div class="block-2-maincontent-1-card-3">
                    <h2>Yet to finish</h2>
                </div>
                <div class="block-2-maincontent-1-card-4">
                    <h2>Total Finish Tasks</h2>
                </div>
            </div>
            <div class="block-2-maincontent-2">
                <div class="block-2-maincontent-2-card-1">
                    <h2>Visitor Insights</h2>
                    <!-- importing charts to web -->
                    <canvas id="CurrentSpeed"></canvas>
                </div>
                <div class="block-2-maincontent-2-card-2">
                    <h2>Assigned Tasks</h2>
                    <div class="tasks">

                        <!-- Rendering Task detail from DB only shows first 4 -->
                        <?php if (!empty($pageData['inprogressTasks'])): ?>
                            <?php $sliceArray = array_slice($pageData['inprogressTasks'], 0, 4); ?>
                            <?php foreach ($sliceArray as $task): ?>
                                <div class="task" style="border-left: 5px solid #4318ff;">
                                    <h3 class="task-name">Task - <?= $task['task_id'] ?> </h3>
                                    <h4 class="task-detail"><?= $task['description'] ?></h4>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No completed tasks</p>
                        <?php endif; ?>

                    </div>
                    <button onClick="window.location.href='<?= BASE_URL ?>/student/tasks'">view all</button>
                </div>
            </div>
            <div class="block-2-maincontent-3">
                <div class="block-2-maincontent-3-card-1">
                    <h2>Total Finished Tasks</h2>
                    <!-- importing charts to web -->
                    <canvas id="finishedTasks"></canvas>
                </div>
                <div class="block-2-maincontent-3-card-2">
                    <h2>Upcoming Events</h2>
                    <div class="events">
                        <div class="event" style="border-left: 5px solid #4318ff;">
                            <p class="event-name">Bi-weekly report</p>
                            <p class="event-date">2024.5.13</p>
                        </div>
                        <div class="event" style="border-left: 5px solid #ff1843;">
                            <p class="event-name">Mentorship Session</p>
                            <p class="event-date">2024.6.4</p>
                        </div>
                        <div class="event" style="border-left: 5px solid #18ff43;">
                            <p class="event-name">Training Session</p>
                            <p class="event-date">2024.8.18</p>
                        </div>
                        <div class="event" style="border-left: 5px solid #4318ff;">
                            <p class="event-name">supervisor meeting</p>
                            <p class="event-date">2024.8.18</p>
                        </div>
                    </div>
                    <button onClick="window.location.href='<?= BASE_URL ?>/student/calendar'">view all</button>
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
                            <?php if (!empty($pageData['student'][0])): ?>
                                <?php $studentData = $pageData['student'][0]; ?>
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
                                    <div class="popupProfile-detail-type">Registration Number</div>
                                    <div class="popupProfile-detail-value">
                                        <?= $studentData['registration_number'] ?? 'N/A' ?></div>
                                </div>
                                <div class="popupProfile-detail">
                                    <div class="popupProfile-detail-type">Index Number</div>
                                    <div class="popupProfile-detail-value"><?= $studentData['index_number'] ?? 'N/A' ?>
                                    </div>
                                </div>
                                <div class="popupProfile-detail">
                                    <div class="popupProfile-detail-type">Year</div>
                                    <div class="popupProfile-detail-value"><?= $studentData['year'] ?? 'N/A' ?></div>
                                </div>

                            <?php else: ?>
                                <p>No Student Data</p>
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
                            <?php if (!empty($pageData['student'][0])): ?>
                                <?php $studentData = $pageData['student'][0]; ?>
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
                                            <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" required>
                                            <span id="emailError" class="error-message" style="color: red; display: none;"></span>
                                        </div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">Registration Number</div>
                                        <div class="popupProfile-detail-value">
                                            <input type="text" name="registration_number"
                                                value="<?= $studentData['registration_number'] ?? 'not accessable' ?>"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">Index Number</div>
                                        <div class="popupProfile-detail-value">
                                            <input type="text" name="index_number"
                                                value="<?= $studentData['index_number'] ?? 'not accessable' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="popupProfile-detail">
                                        <div class="popupProfile-detail-type">Year</div>
                                        <div class="popupProfile-detail-value">
                                            <input type="text" name="year"
                                                value="<?= $studentData['year'] ?? 'not accessable' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="profile-buttons">
                                        <button type="submit" class="save-button" id="update_profile"
                                            name="update_profile">Save Changes</button>
                                    </div>
                                </form>

                            <?php else: ?>
                                <p>No Student Data</p>
                            <?php endif; ?>
                        </div>
                    </div>
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
    <script src="<?= BASE_URL ?>/public/js/pages/student_dashboard.js"></script>
</body>

</html>