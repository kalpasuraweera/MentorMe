<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Task Modal -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        id="taskModal">
        <div class="bg-white shadow p-5 rounded-md w-full" style="max-width: 800px;">
            <div class="flex justify-end items-center">
                <img src="<?= BASE_URL ?>/public/images/icons/close.png" alt="close icon" id="closeModal">
            </div>
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Create Coordinator Dashboard</h1>
                <?= $this->renderComponent('button', ['text' => 'Create PR', 'color' => 'green', 'size' => 'small']) ?>
            </div>
            <div class="flex justify-between items-center mt-5">
                <div class="flex flex-col gap-2">
                    <p class="text-sm text-secondary-color">Due Date</p>
                    <p class="text-lg font-bold">2022-01-01</p>
                </div>
                <div class="flex flex-col gap-2 bg-gray p-2 rounded-md">
                    <p class="text-md text-white">History</p>
                    <div class="bg-primary-color p-2 rounded-md flex flex-col gap-2">
                        <p>2022-01-01 @ 10:00<em>Task Created</em></p>
                        <p>2022-01-02 @ 10:00<em>Task Assigned</em></p>
                        <p>2022-01-03 @ 10:00<em>Task Completed</em></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row bg-primary-color h-screen">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 2]) ?>
        <div class="flex flex-col w-3/4 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">MentorMe Tasks</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex my-5 gap-2 justify-evenly" style="overflow: auto;">
                <!-- Task List -->
                <div class="flex flex-col py-5 w-96">
                    <h2 class="text-xl font-bold text-white bg-blue p-2 rounded-md">To Do</h2>
                    <div class="flex flex-col gap-2 mt-5">
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                    </div>
                </div>
                <!-- Task List -->
                <div class="flex flex-col py-5 w-96">
                    <h2 class="text-xl font-bold text-white bg-yellow p-2 rounded-md">In progress</h2>
                    <div class="flex flex-col gap-2 mt-5">
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                    </div>
                </div>
                <!-- Task List -->
                <div class="flex flex-col py-5 w-96">
                    <h2 class="text-xl font-bold text-white bg-red p-2 rounded-md">Review</h2>
                    <div class="flex flex-col gap-2 mt-5">
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                    </div>
                </div>
                <!-- Task List -->
                <div class="flex flex-col py-5 w-96">
                    <h2 class="text-xl font-bold text-white bg-green p-2 rounded-md">Done</h2>
                    <div class="flex flex-col gap-2 mt-5">
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md" id="taskCard">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                        <!-- Task Card -->
                        <div class="flex flex-col gap-2 p-2  bg-white shadow rounded-md">
                            <div class="flex items-center gap-2">
                                <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                    class="w-8 h-8">
                                <p class="text-sm bg-green p-1 rounded-md">Kalpa</p>
                            </div>
                            <p class="text-lg font-bold">Card title</p>
                            <p class="text-sm">Description of task 1 and what to do...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('closeModal').addEventListener('click', () => {
            document.getElementById('taskModal').classList.add('hidden');
        });
        document.getElementById('taskCard').addEventListener('click', () => {
            document.getElementById('taskModal').classList.remove('hidden');
        });
    </script>
</body>

</html>