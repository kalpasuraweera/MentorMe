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
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="meeting_confirmation_popup_close">Close</button>
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="accept_meeting_request">Schedule</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Decline Meeting Request -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="declineMeetingPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Decline Meeting Request</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="request_id">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to decline this meeting request?
                </p>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeDeclineMeetingPopup">Cancel</button>
                    <button type="submit"
                        class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="decline_meeting_request">Decline</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Accept Supervision Request -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="acceptSupervisionPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Accept Supervision Request</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="request_id">
                <input type="hidden" name="group_id">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to accept this supervision
                    request?</p>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeAcceptSupervisionPopup">Cancel</button>
                    <button type="submit"
                        class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="accept_request">Accept</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Decline Supervision Request -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="declineSupervisionPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Decline Supervision Request</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="request_id">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to decline this supervision
                    request?</p>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeDeclineSupervisionPopup">Cancel</button>
                    <button type="submit"
                        class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="decline_request">Decline</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color" style="min-height:100vh;">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 2]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Student Requests and Notifications</h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 75px;width: 75px;object-fit: cover;">
                </div>
            </div>
            <div class="w-full flex justify-evenly text-center bg-gray py-2 rounded-lg mt-10">
                <button onclick="openTab('pending')" class="flex-1 mx-2 px-4 py-2 font-medium rounded-lg bg-white"
                    id="pendingBtn">
                    Pending
                </button>
                <button onclick="openTab('reports')" class="flex-1 mx-2 px-4 py-2 font-medium rounded-lg"
                    id="reportsBtn">Reports</button>
                <button onclick="openTab('meetings')" class="flex-1 mx-2 px-4 py-2 font-medium rounded-lg"
                    id="meetingsBtn">Meetings</button>
                <button onclick="openTab('supervisor')" class="flex-1 mx-2 px-4 py-2 font-medium rounded-lg"
                    id="supervisorBtn">Supervisor</button>
            </div>
            <div class="flex flex-col gap-5 my-5" id="pending">
                <?php if (empty($pageData['pendingRequests'])): ?>
                    <p class="text-center text-secondary-color">No Pending Requests or Reports</p>
                <?php endif; ?>
                <?php foreach ($pageData['pendingRequests'] as $requestData): ?>
                    <!-- if there is project_title then display supervisor request card otherwise meeting request card -->
                    <?php if (isset($requestData['project_title'])): ?>
                        <!-- Supervisor Request Card -->
                        <div class="flex flex-col bg-white shadow rounded-xl p-5">
                            <p class="text-lg font-bold text-primary-color">[Supervision Request]
                                <?= $requestData['project_title'] ?> :
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
                                <button type="button"
                                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    onclick="showDeclineSupervisionPopup(<?= $requestData['request_id'] ?>)">Decline</button>
                                <button type="button"
                                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    onclick="showSupervisionConfirmationPopup(<?= $requestData['request_id'] ?>, <?= $requestData['group_id'] ?>)">Accept</button>
                            </div>
                        </div>
                    <?php elseif (isset($requestData['report_id'])): ?>
                        <!-- Biweekly Report -->
                        <div class="flex flex-col bg-white shadow rounded-xl p-5">
                            <p class="text-lg font-bold text-primary-color">[Biweekly Report] <?= $requestData['date'] ?></p>
                            <div class="mt-5">
                                <p class="text-black font-bold">Meeting Outcomes:</p>
                                <p class="text-secondary-color"> <?= $requestData['meeting_outcomes'] ?></p>
                                <p class="text-black font-bold mt-5">Next Two Week Work:</p>
                                <p class="text-secondary-color"> <?= $requestData['next_two_week_work'] ?></p>
                                <p class="text-black font-bold mt-5">Past Two Week Work:</p>
                                <p class="text-secondary-color"> <?= $requestData['past_two_week_work'] ?></p>
                            </div>
                            <div class="flex justify-end mt-5 gap-5">
                                <button type="button"
                                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    onclick="showDeclineSupervisionPopup(<?= $requestData['report_id'] ?>)">Decline</button>
                                <button type="button"
                                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    onclick="showSupervisionConfirmationPopup(<?= $requestData['report_id'] ?>, <?= $requestData['group_id'] ?>)">Accept</button>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Meeting Request -->
                        <div class="flex flex-col bg-white shadow rounded-xl p-5">
                            <p class="text-lg font-bold text-primary-color">[Meeting Request] <?= $requestData['title'] ?></p>
                            <div class="mt-5">
                                <p class="text-black font-bold">To Be Discussed:</p>
                                <p class="text-secondary-color"> <?= $requestData['reason'] ?></p>
                                <p class="text-black font-bold mt-5">What is Done:</p>
                                <p class="text-secondary-color"> <?= $requestData['done'] ?></p>
                            </div>
                            <div class="flex justify-end mt-5 gap-5">
                                <button type="button"
                                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    onclick="showDeclineMeetingPopup(<?= $requestData['request_id'] ?>)">Decline</button>
                                <button type="button"
                                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    onclick="showMeetingConfirmationPopup(<?= $requestData['request_id'] ?>, <?= $requestData['group_id'] ?>)">Schedule</button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="flex flex-col gap-5 my-5 hidden" id="reports">
                <?php if (empty($pageData['biweeklyReports'])): ?>
                    <p class="text-center text-secondary-color">No Reports</p>
                <?php endif; ?>
                <?php foreach ($pageData['biweeklyReports'] as $requestData): ?>

                    <!-- Biweekly Report -->
                    <div class="flex flex-col bg-white shadow rounded-xl p-5">
                        <p class="text-lg font-bold text-primary-color">[Biweekly Report] <?= $requestData['date'] ?></p>
                        <div class="mt-5">
                            <p class="text-black font-bold">Meeting Outcomes:</p>
                            <p class="text-secondary-color"> <?= $requestData['meeting_outcomes'] ?></p>
                            <p class="text-black font-bold mt-5">Next Two Week Work:</p>
                            <p class="text-secondary-color"> <?= $requestData['next_two_week_work'] ?></p>
                            <p class="text-black font-bold mt-5">Past Two Week Work:</p>
                            <p class="text-secondary-color"> <?= $requestData['past_two_week_work'] ?></p>
                        </div>
                        <div class="flex justify-end mt-5 gap-5">
                            <button type="button"
                                class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                onclick="showDeclineSupervisionPopup(<?= $requestData['report_id'] ?>)">Decline</button>
                            <button type="button"
                                class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                onclick="showSupervisionConfirmationPopup(<?= $requestData['report_id'] ?>, <?= $requestData['group_id'] ?>)">Accept</button>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="flex flex-col gap-5 my-5 hidden" id="meetings">
                <?php if (empty($pageData['meetingRequests'])): ?>
                    <p class="text-center text-secondary-color">No Meeting requests</p>
                <?php endif; ?>
                <?php foreach ($pageData['meetingRequests'] as $requestData): ?>
                    <!-- Meeting Request -->
                    <div class="flex flex-col bg-white shadow rounded-xl p-5">
                        <p class="text-lg font-bold text-primary-color">[Meeting Request] <?= $requestData['title'] ?></p>
                        <div class="mt-5">
                            <p class="text-black font-bold">To Be Discussed:</p>
                            <p class="text-secondary-color"> <?= $requestData['reason'] ?></p>
                            <p class="text-black font-bold mt-5">What is Done:</p>
                            <p class="text-secondary-color"> <?= $requestData['done'] ?></p>
                        </div>
                        <div class="flex justify-end mt-5 gap-5">
                            <button type="button"
                                class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                onclick="showDeclineMeetingPopup(<?= $requestData['request_id'] ?>)">Decline</button>
                            <button type="button"
                                class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                onclick="showMeetingConfirmationPopup(<?= $requestData['request_id'] ?>, <?= $requestData['group_id'] ?>)">Schedule</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="flex flex-col gap-5 my-5 hidden" id="supervisor">
                <?php if (empty($pageData['supervisionRequests'])): ?>
                    <p class="text-center text-secondary-color">No Supervision Requests</p>
                <?php endif; ?>
                <?php foreach ($pageData['supervisionRequests'] as $requestData): ?>
                    <!-- Supervisor Request Card -->
                    <div class="flex flex-col bg-white shadow rounded-xl p-5">
                        <p class="text-lg font-bold text-primary-color">[Supervision Request]
                            <?= $requestData['project_title'] ?> :
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
                            <button type="button"
                                class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                onclick="showDeclineSupervisionPopup(<?= $requestData['request_id'] ?>)">Decline</button>
                            <button type="button"
                                class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                onclick="showSupervisionConfirmationPopup(<?= $requestData['request_id'] ?>, <?= $requestData['group_id'] ?>)">Accept</button>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script>
        // Open tabs
        function openTab(tabName) {
            let tabList = ['pending', 'reports', 'meetings', 'supervisor'];
            tabList.forEach(tab => {
                if (tab === tabName) {
                    document.getElementById(tab).classList.remove('hidden');
                    document.getElementById(tab + 'Btn').classList.add('bg-white');
                } else {
                    document.getElementById(tab).classList.add('hidden');
                    document.getElementById(tab + 'Btn').classList.remove('bg-white');
                }
            });
        }

        function showMeetingConfirmationPopup(request_id, group_id) {
            window.scrollTo(0, 0);
            document.querySelector('#meeting_confirmation_popup input[name="request_id"]').value = request_id;
            document.querySelector('#meeting_confirmation_popup input[name="group_id"]').value = group_id;
            document.getElementById('meeting_confirmation_popup').classList.remove('hidden');
        }
        document.getElementById('meeting_confirmation_popup_close').addEventListener('click', function () {
            document.getElementById('meeting_confirmation_popup').classList.add('hidden');
        });

        function showDeclineMeetingPopup(request_id) {
            window.scrollTo(0, 0);
            document.querySelector('#declineMeetingPopup input[name="request_id"]').value = request_id;
            document.getElementById('declineMeetingPopup').classList.remove('hidden');
        }
        document.getElementById('closeDeclineMeetingPopup').addEventListener('click', function () {
            document.getElementById('declineMeetingPopup').classList.add('hidden');
        });

        function showSupervisionConfirmationPopup(request_id, group_id) {
            window.scrollTo(0, 0);
            document.querySelector('#acceptSupervisionPopup input[name="request_id"]').value = request_id;
            document.querySelector('#acceptSupervisionPopup input[name="group_id"]').value = group_id;
            document.getElementById('acceptSupervisionPopup').classList.remove('hidden');
        }
        document.getElementById('closeAcceptSupervisionPopup').addEventListener('click', function () {
            document.getElementById('acceptSupervisionPopup').classList.add('hidden');
        });

        function showDeclineSupervisionPopup(request_id) {
            window.scrollTo(0, 0);
            document.querySelector('#declineSupervisionPopup input[name="request_id"]').value = request_id;
            document.getElementById('declineSupervisionPopup').classList.remove('hidden');
        }
        document.getElementById('closeDeclineSupervisionPopup').addEventListener('click', function () {
            document.getElementById('declineSupervisionPopup').classList.add('hidden');
        });
    </script>
</body>

</html>