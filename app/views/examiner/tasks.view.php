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
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center"
        style="background-color: rgba(0, 0, 0, 0.7);" id="taskModal">
        <div class="bg-white p-5 rounded-md w-full" style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-end items-center">
                <img src="<?= BASE_URL ?>/public/images/icons/close.png" alt="close icon" id="closeModal">
            </div>
            <div class="flex justify-between items-center">
                <h1 class="text-2xl">Create Coordinator Dashboard</h1>
                <?= $this->renderComponent('button', ['text' => 'Create PR', 'color' => 'green', 'size' => 'small']) ?>
            </div>
            <div class="flex justify-between mt-5">
                <div class="flex flex-col gap-4">
                    <div class="flex justify-between">
                        <div class="flex flex-col gap-4 justify-between">
                            <div class="flex flex-col">
                                <p class="text-md font-bold">Status</p>
                                <p class="text-md font-bold bg-green p-2 text-center rounded-md w-full"
                                    style="max-width:180px;">Done</p>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-md font-bold">Assignee</p>
                                <p class="text-md bg-gray p-2 w-full rounded-md" style="max-width:180px;">Kalpa
                                    Suraweera</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 justify-between">
                            <div class="flex flex-col">
                                <p class="text-md font-bold">Due Date</p>
                                <p class="text-sm bg-light-purple p-2 text-center rounded-md" style="max-width:180px;">
                                    Aug 16, 2024, 11:06 PM</p>
                            </div>

                            <div class="flex flex-col">
                                <p class="text-md font-bold">Estimated Time</p>
                                <p class="text-md bg-light-purple p-2 rounded-md" style="max-width:180px;">5
                                    hours</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col my-4">
                        <p class="text-lg">Description</p>
                        <textarea class="text-md bg-light-purple p-4 w-full rounded-md my-2"
                            style="min-height:150px;width:400px; max-width:400px;"
                            disabled>Create a dashboard for coordinators to manage students. Coordinators should be able to view student data, update student data, and add new students.</textarea>

                    </div>
                </div>
                <div
                    class="flex flex-col justify-around gap-2 bg-light-gray px-2 py-4 rounded-md w-full mx-2 flex-grow">
                    <div>
                        <p class="text-md font-bold mt-4 mb-2">History</p>
                        <div class="bg-light-purple p-2 rounded-md flex flex-col gap-2">
                            <p class="font-bold">Task Created <span class="text-xs font-normal">Aug 16, 2024, 11:06
                                    PM</span></p>
                            <p class="font-bold">Task Assigned <span class="text-xs font-normal">Aug 16, 2024, 11:06
                                    PM</span></p>
                            <p class="font-bold">Task Completed <span class="text-xs font-normal">Aug 16, 2024, 11:06
                                    PM</span></p>
                            <p class="font-bold">Task Reviewed <span class="text-xs font-normal">Aug 16, 2024, 11:06
                                    PM</span></p>
                        </div>
                    </div>
                    <div>
                        <p class="text-md font-bold mt-4 mb-2">Pull Request Link</p>
                        <div class="bg-light-purple p-2 rounded-md flex flex-col gap-2">
                            <a href="#" class="text-black">
                                https://github.com/mentorme/pull/1...
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <p class="text-lg my-4">Comments</p>
                <div class="flex flex-col gap-2">

                    <div class="flex flex-col gap-4">
                        <!-- Comment Input -->
                        <div class="flex items center gap-2">
                            <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                class="w-8 h-8">
                            <input type="text" class="w-full p-2 rounded-md border border-primary-color"
                                placeholder="Add a comment...">
                        </div>
                        <!-- Comment -->
                        <div class="flex items-start gap-2">
                            <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                class="w-8 h-8">
                            <div class="flex flex-col">
                                <div class="flex gap-2">
                                    <p class="text-md font-bold">Kalpa Suraweera</p>
                                    <p class="text-sm text-gray">Aug 16, 2024, 11:06 PM</p>
                                </div>
                                <p class="text-sm bg-light-purple p-2 rounded-md w-full">What are long descriptions?
                                    Long descriptions are text versions of the information provided in a detailed or
                                    complex image. Most web writers are familiar with short descriptions for images,
                                    often called text alternatives or ALT text. We use them when an image conveys a
                                    brief message or acts as a link.
                                </p>
                            </div>
                        </div>
                        <!-- Comment -->
                        <div class="flex items-start gap-2">
                            <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                class="w-8 h-8">
                            <div class="flex flex-col">
                                <div class="flex gap-2">
                                    <p class="text-md font-bold">Kalpa Suraweera</p>
                                    <p class="text-sm text-gray">Aug 16, 2024, 11:06 PM</p>
                                </div>
                                <p class="text-sm bg-light-purple p-2 rounded-md w-full">What are long descriptions?
                                    Long descriptions are text versions of the information provided in a detailed or
                                    complex image. Most web writers are familiar with short descriptions for images,
                                    often called text alternatives or ALT text. We use them when an image conveys a
                                    brief message or acts as a link.
                                </p>
                            </div>
                        </div>
                        <!-- Comment -->
                        <div class="flex items-start gap-2">
                            <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                class="w-8 h-8">
                            <div class="flex flex-col">
                                <div class="flex gap-2">
                                    <p class="text-md font-bold">Kalpa Suraweera</p>
                                    <p class="text-sm text-gray">Aug 16, 2024, 11:06 PM</p>
                                </div>
                                <p class="text-sm bg-light-purple p-2 rounded-md w-full">What are long descriptions?
                                    Long descriptions are text versions of the information provided in a detailed or
                                    complex image. Most web writers are familiar with short descriptions for images,
                                    often called text alternatives or ALT text. We use them when an image conveys a
                                    brief message or acts as a link.
                                </p>
                            </div>
                        </div>
                        <!-- Comment -->
                        <div class="flex items-start gap-2">
                            <img src="<?= BASE_URL ?>/public/images/icons/student_avatar.png" alt="student_avatar"
                                class="w-8 h-8">
                            <div class="flex flex-col">
                                <div class="flex gap-2">
                                    <p class="text-md font-bold">Kalpa Suraweera</p>
                                    <p class="text-sm text-gray">Aug 16, 2024, 11:06 PM</p>
                                </div>
                                <p class="text-sm bg-light-purple p-2 rounded-md w-full">What are long descriptions?
                                    Long descriptions are text versions of the information provided in a detailed or
                                    complex image. Most web writers are familiar with short descriptions for images,
                                    often called text alternatives or ALT text. We use them when an image conveys a
                                    brief message or acts as a link.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row bg-primary-color h-screen">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 2]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">MentorMe Tasks</h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 75px;width: 75px;object-fit: cover;">
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