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
        <?php $this->renderComponent('sideBar', ['activeIndex' => 1]) ?>
        <div class="flex flex-col w-3/4 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Manage Groups</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <!-- Group Card -->
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Group 04 - MenotrMe</p>
                    <div class="flex flex-row gap-5 justify-evenly align-center my-5">
                        <div>
                            <canvas id="mentorMe"></canvas>
                        </div>
                        <div class="flex flex-col gap-5">
                            <p class="text-lg font-bold text-primary-color">Student Performance</p>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-5 justify-evenly align-center">
                            <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Tasks', 'bg' => 'btn-primary-color',  'onclick' => "window.location.href='" . BASE_URL . "/supervisor/tasks'"]) ?>
                            <?php $this->renderComponent('button', ['name' => 'view_students', 'text' => 'Calendar', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'view_project', 'text' => 'Feedbacks', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'view_report', 'text' => 'Requests', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'delete_group', 'text' => 'Notes', 'bg' => 'btn-primary-color']) ?>
                        </div>

                    </div>
                </div>
                <!-- Group Card -->
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Group 04 - MenotrMe</p>
                    <div class="flex flex-row gap-5 justify-evenly align-center my-5">
                        <div>
                            <canvas id="mentorMe"></canvas>
                        </div>
                        <div class="flex flex-col gap-5">
                            <p class="text-lg font-bold text-primary-color">Student Performance</p>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-5 justify-evenly align-center">
                            <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Tasks', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'view_students', 'text' => 'Calendar', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'view_project', 'text' => 'Feedbacks', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'view_report', 'text' => 'Requests', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'delete_group', 'text' => 'Notes', 'bg' => 'btn-primary-color']) ?>
                        </div>

                    </div>
                </div>
                <!-- Group Card -->
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Group 04 - MenotrMe</p>
                    <div class="flex flex-row gap-5 justify-evenly align-center my-5">
                        <div>
                            <canvas id="mentorMe"></canvas>
                        </div>
                        <div class="flex flex-col gap-5">
                            <p class="text-lg font-bold text-primary-color">Student Performance</p>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <div class="flex flex-col px-2">
                                    <p class="text-black font-bold">John Doe</p>
                                    <p class="text-secondary-color">Last Task: 24 Aug 2021</p>
                                </div>
                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                    <p class="text-white font-bold">50</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-5 justify-evenly align-center">
                            <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Tasks', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'view_students', 'text' => 'Calendar', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'view_project', 'text' => 'Feedbacks', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'view_report', 'text' => 'Requests', 'bg' => 'btn-primary-color']) ?>
                            <?php $this->renderComponent('button', ['name' => 'delete_group', 'text' => 'Notes', 'bg' => 'btn-primary-color']) ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script src="<?= BASE_URL ?>/public/js/pages/supervisor_groups.js"></script>
</body>

</html>