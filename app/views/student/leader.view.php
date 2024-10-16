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
                <h1 class="text-3xl font-bold text-primary-color">Student Leader Options</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex justify-evenly text-white">
                <div class="px-4 py-2 mx-4 hover:btn-primary-color cursor-pointer rounded-lg btn-primary-color">
                    <p class="text-xl font-bold mb-2">Generate Report</p>
                    <p class="text-sm text-secondary-color">Generate Bi-Weekly Report for Week</p>
                </div>
                <div class="px-4 py-2 mx-4 hover:btn-primary-color cursor-pointer rounded-lg btn-primary-color">
                    <p class="text-xl font-bold mb-2">Request Meeting</p>
                    <p class="text-sm text-secondary-color">Request supervisor a group meeting</p>
                </div>
                <div class="px-4 py-2 mx-4 hover:btn-primary-color cursor-pointer rounded-lg btn-primary-color"
                    onclick="window.location.href='<?= BASE_URL ?>/student/requestSupervisor'">
                    <p class="text-xl font-bold mb-2">Request Supervisor</p>
                    <p class="text-sm text-secondary-color">Send requests to lectures to supervise</p>
                </div>
            </div>
            <p class="text-2xl font-bold text-primary-color mt-5">Previous Activities</p>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Mentor Management System - Group 04</p>
                    <div class="mt-5">
                        <p class="text-black font-bold">Our Idea:</p>
                        <p class="text-secondary-color">As a Clinical Research Coordinator, you will be responsible for
                            managing and coordinating clinical trials and research studies. You will work closely with
                            principal investigators, research staff, and study participants to ensure the smooth
                            operation of research projects.</p>
                        <p class="text-black font-bold mt-5">Why we need you:</p>
                        <p class="text-secondary-color">We are looking for a detail-oriented Clinical Research
                            Coordinator
                            to join our research team. You will be responsible for managing and coordinating clinical
                            trials and research studies. You will work closely with principal investigators, research
                            staff, and study participants to ensure the smooth operation of research projects.</p>
                        <p class="text-black font-bold mt-5">Our team:</p>
                        <!-- Team Members List-->
                        <div class="flex flex-row gap-5 mt-5">
                            <div class="flex flex-col items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <p class="text-secondary-color">John Doe</p>
                                <p class="text-secondary-color">2022/CS/197</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <p class="text-secondary-color">John Doe</p>
                                <p class="text-secondary-color">2022/CS/197</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <p class="text-secondary-color">John Doe</p>
                                <p class="text-secondary-color">2022/CS/197</p>
                            </div>
                            <div class="flex flex-col items-center">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon"
                                    width="40" height="40">
                                <p class="text-secondary-color">John Doe</p>
                                <p class="text-secondary-color">2022/CS/197</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-5 gap-5">
                        <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Cancel', 'bg' => 'bg-red']) ?>
                    </div>


                </div>
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Supervisor Meeting</p>
                    <div class="mt-5">
                        <p class="text-black font-bold">To Be Discussed:</p>
                        <p class="text-secondary-color">As a Clinical Research Coordinator, you will be responsible for
                            managing and coordinating clinical trials and research studies. You will work closely with
                            principal investigators, research staff, and study participants to ensure the smooth
                            operation of research projects.</p>
                        <p class="text-black font-bold mt-5">What is Done:</p>
                        <p class="text-secondary-color">We are looking for a detail-oriented Clinical Research
                            Coordinator
                            to join our research team. You will be responsible for managing and coordinating clinical
                            trials and research studies. You will work closely with principal investigators, research
                            staff, and study participants to ensure the smooth operation of research projects.</p>
                    </div>
                    <div class="flex justify-end mt-5 gap-5">
                        <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Cancel', 'bg' => 'bg-red']) ?>
                    </div>
                </div>
            </div>

        </div>
</body>

</html>