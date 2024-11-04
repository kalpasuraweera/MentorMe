<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Meeting Confirmation Popup -->
    <div id="meeting_confirmation_popup"
        class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <input type="hidden" name="request_id" id="request_id">
            <input type="hidden" name="group_id" id="group_id">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Confirm Meeting</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="description" class="text-lg font-bold text-primary-color">Event Description</label>
                    <textarea name="description" id="description" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="meeting_time" class="text-lg font-bold text-primary-color">Meeting Time</label>
                    <input type="datetime-local" name="meeting_time" class="border border-primary-color rounded-xl p-2">
                </div>
                <div class="flex justify-end gap-5">
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="accept_meeting_request">Schedule</button>
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="meeting_confirmation_popup_close">Close</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color" style="min-height:100vh;">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 2]) ?>
        <div class="flex flex-col w-3/4 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Student Requests and Notifications</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <?php foreach ($pageData['allRequests'] as $requestData): ?>
                    <!-- if there is project_title then display supervisor request card otherwise meeting request card -->
                    <?php if (isset($requestData['project_title'])): ?>
                        <!-- Supervisor Request Card -->
                        <div class="flex flex-col bg-white shadow rounded-xl p-5">
                            <p class="text-lg font-bold text-primary-color"><?= $requestData['project_title'] ?> :
                                Group <?= str_pad($requestData['group_id'], 2, '0', STR_PAD_LEFT) ?>
                            </p>
                            <div class="mt-5">
                                <p class="text-black font-bold">Our Idea:</p>
                                <p class="text-secondary-color"><?= $requestData['idea'] ?></p>
                                <p class="text-black font-bold mt-5">Why we need you:</p>
                                <p class="text-secondary-color"><?= $requestData['reason'] ?></p>
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
                                <form action="" method="POST">
                                    <?php $this->renderComponent('button', ['name' => 'decline_request', 'text' => 'Decline', 'bg' => 'btn-secondary-color', 'type' => 'submit', 'value' => $requestData['request_id']]) ?>
                                    <?php $this->renderComponent('button', ['name' => 'accept_request', 'text' => 'Accept', 'bg' => 'btn-primary-color', 'type' => 'submit', 'value' => $requestData['request_id']]) ?>
                                </form>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Meeting Request -->
                        <div class="flex flex-col bg-white shadow rounded-xl p-5">
                            <p class="text-lg font-bold text-primary-color"><?= $requestData['title'] ?></p>
                            <div class="mt-5">
                                <p class="text-black font-bold">To Be Discussed:</p>
                                <p class="text-secondary-color"> <?= $requestData['reason'] ?></p>
                                <p class="text-black font-bold mt-5">What is Done:</p>
                                <p class="text-secondary-color"> <?= $requestData['done'] ?></p>
                            </div>
                            <div class="flex justify-end mt-5 gap-5">
                                <form action="" method="POST">
                                    <?php $this->renderComponent('button', ['name' => 'decline_meeting_request', 'text' => 'Decline', 'bg' => 'btn-secondary-color', 'type' => 'submit', 'value' => $requestData['request_id']]) ?>
                                    <button type="button"
                                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                        onclick="showMeetingConfirmationPopup(<?= $requestData['request_id'] ?>, <?= $requestData['group_id'] ?>)">Schedule</button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <script>
            function showMeetingConfirmationPopup(request_id, group_id) {
                window.scrollTo(0, 0);
                document.querySelector('#meeting_confirmation_popup input[name="request_id"]').value = request_id;
                document.querySelector('#meeting_confirmation_popup input[name="group_id"]').value = group_id;
                document.getElementById('meeting_confirmation_popup').classList.remove('hidden');
            }
            document.getElementById('meeting_confirmation_popup_close').addEventListener('click', function () {
                document.getElementById('meeting_confirmation_popup').classList.add('hidden');
            });
        </script>
</body>

</html>