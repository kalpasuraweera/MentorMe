<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Accepted Popup -->
    <div id="accept_popup"
        class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="bg-white p-5 rounded-lg align-center text-center">
            <p class="text-2xl font-bold text-primary-color">Request Accepted</p>
            <p class="text-secondary-color">Your request has been accepted by the supervisor</p>
            <button id="accept_popup_close" class="bg-green text-white px-4 py-2 rounded-lg mt-5">Close</button>
        </div>
    </div>

    <!-- Rejected Popup -->
    <div id="reject_popup"
        class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="bg-white p-5 rounded-lg align-center text-center">
            <p class="text-2xl font-bold text-primary-color">Request Rejected</p>
            <p class="text-secondary-color">Your request has been rejected by the supervisor</p>
            <button id="reject_popup_close" class="bg-red text-white px-4 py-2 rounded-lg mt-5">Close</button>
        </div>
    </div>

    <!-- Cancel Confirmation Popup -->
    <div id="cancel_popup"
        class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="bg-white p-5 rounded-lg align-center text-center">
            <p class="text-2xl font-bold text-primary-color">Cancel Request</p>
            <p class="text-secondary-color">Are you sure you want to cancel the request?</p>
            <form class="flex justify-center gap-5 mt-5" action="" method="post">
                <input type="hidden" name="request_id" value="">
                <button type="submit" class="bg-red text-white px-4 py-2 rounded-lg" name="cancel_request">Yes</button>
                <button type="button" class="bg-blue text-white px-4 py-2 rounded-lg"
                    id="cancel_popup_close">No</button>
            </form>
        </div>
    </div>

    <!-- Update Request Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="updateRequestPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Update Supervisor Request</h1>
                <img src="<?= BASE_URL ?>/public/images/icons/close.png" alt="close icon"
                    class="closeUpdateRequestPopup">
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="project_title" class="text-lg font-bold text-primary-color">Project Title</label>
                    <input type="text" name="project_title" id="project_title"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="idea" class="text-lg font-bold text-primary-color">Your Idea</label>
                    <textarea name="idea" id="idea" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="reason" class="text-lg font-bold text-primary-color">Why you need me</label>
                    <textarea name="reason" id="reason" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <!-- Hidden input for request id -->
                <input type="hidden" name="request_id" id="request_id">
                <div class="flex justify-end gap-5">
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="update_request">Update</button>
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2 closeUpdateRequestPopup">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Meeting Request Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="meetingRequestPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Send Meeting Request</h1>
                <img src="<?= BASE_URL ?>/public/images/icons/close.png" alt="close icon"
                    class="closeMeetingRequestPopup">
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="title" class="text-lg font-bold text-primary-color">Meeting Title</label>
                    <input type="text" name="title" id="title" class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="reason" class="text-lg font-bold text-primary-color">What to Be Discussed</label>
                    <textarea name="reason" id="reason" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="done" class="text-lg font-bold text-primary-color">What is Done</label>
                    <textarea name="done" id="done" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2 closeMeetingRequestPopup">Cancel</button>
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="meeting_request">Send</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Generate Report Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="generate_report_popup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Generate Report</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="title" class="text-lg font-bold text-primary-color">Start Date</label>
                    <input type="date" name="start_date" id="start_date"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="end_date" class="text-lg font-bold text-primary-color">End Date</label>
                    <input type="date" name="end_date" id="end_date"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="report" class="text-lg font-bold text-primary-color">Report</label>
                    <textarea name="report" id="report" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button" id="generate_report_popup_close"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Cancel</button>
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="generate_report">Generate</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Main content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 4]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
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
                <div class="px-4 py-2 mx-4 hover:btn-primary-color cursor-pointer rounded-lg btn-primary-color"
                    onclick="generateReport()">
                    <p class="text-xl font-bold mb-2">Generate Report</p>
                    <p class="text-sm text-secondary-color">Generate Bi-Weekly Report for Week</p>
                </div>
                <div class="px-4 py-2 mx-4 hover:btn-primary-color cursor-pointer rounded-lg btn-primary-color"
                    onclick="sendMeetingRequest()">
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
                <?php foreach ($pageData['groupRequests'] as $requestData): ?>
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
                                <?php if ($requestData['status'] === 'PENDING'): ?>
                                    <!-- Show delete confirmation message when button is clicked -->
                                    <?php $this->renderComponent('button', ['name' => 'cancel_request', 'text' => 'Cancel', 'bg' => 'bg-red', 'onclick' => 'cancelRequest(' . $requestData['request_id'] . ')']) ?>
                                    <!-- Show update form when button is clicked -->
                                    <button
                                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                        onclick="updateRequest(<?= $requestData['request_id'] ?>, '<?= trim($requestData['project_title']) ?>', '<?= trim($requestData['idea']) ?>', '<?= trim($requestData['reason']) ?>')">Update</button>
                                <?php elseif ($requestData['status'] === 'ACCEPTED'): ?>
                                    <!-- We have to show a message when button is clicked -->
                                    <?php $this->renderComponent('button', ['name' => 'accept_msg', 'text' => 'Accepted', 'bg' => 'bg-green']) ?>
                                <?php else: ?>
                                    <!-- We have to show a message when button is clicked -->
                                    <?php $this->renderComponent('button', ['name' => 'reject_msg', 'text' => 'Rejected', 'bg' => 'bg-red']) ?>
                                <?php endif; ?>
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
                                <?php if ($requestData['status'] === 'PENDING'): ?>
                                    <!-- We have to show a message when button is clicked -->
                                    <?php $this->renderComponent('button', ['name' => 'pending_msg', 'text' => 'Pending', 'bg' => 'bg-blue']) ?>
                                <?php elseif ($requestData['status'] === 'ACCEPTED'): ?>
                                    <!-- We have to show a message when button is clicked -->
                                    <?php $this->renderComponent('button', ['name' => 'accept_msg', 'text' => 'Accepted', 'bg' => 'bg-green']) ?>
                                <?php else: ?>
                                    <!-- We have to show a message when button is clicked -->
                                    <?php $this->renderComponent('button', ['name' => 'reject_msg', 'text' => 'Rejected', 'bg' => 'bg-red']) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

        </div>
        <script>
            // Add event listener to all buttons with name 'accept_msg'
            Array.from(document.getElementsByName('accept_msg')).forEach(element => {
                element.addEventListener('click', () => {
                    // Scroll to top of the page
                    window.scrollTo(0, 0);
                    document.getElementById('accept_popup').classList.remove('hidden');
                });
            });
            // Add event listener to accept_popup_close button
            document.getElementById('accept_popup_close').addEventListener('click', () => {
                document.getElementById('accept_popup').classList.add('hidden');
            });

            // Add event listener to all buttons with name 'reject_msg'
            Array.from(document.getElementsByName('reject_msg')).forEach(element => {
                element.addEventListener('click', () => {
                    // Scroll to top of the page
                    window.scrollTo(0, 0);
                    document.getElementById('reject_popup').classList.remove('hidden');
                });
            });
            // Add event listener to reject_popup_close button
            document.getElementById('reject_popup_close').addEventListener('click', () => {
                document.getElementById('reject_popup').classList.add('hidden');
            });


            function cancelRequest(requestId) {
                window.scrollTo(0, 0);
                // Set request_id value in cancel_popup form
                document.querySelector('#cancel_popup input[name="request_id"]').value = requestId;
                document.getElementById('cancel_popup').classList.remove('hidden');
            }

            // Add event listener to cancel_popup_close button
            document.getElementById('cancel_popup_close').addEventListener('click', () => {
                // Unset request_id value in cancel_popup form
                document.querySelector('#cancel_popup input[name="request_id"]').value = '';
                document.getElementById('cancel_popup').classList.add('hidden');
            });

            function updateRequest(request_id, project_title, idea, reason) {
                // Scroll to top of the page
                window.scrollTo(0, 0);
                // Set values in updateRequestPopup form
                document.querySelector('#updateRequestPopup input[name="request_id"]').value = request_id;
                document.querySelector('#updateRequestPopup input[name="project_title"]').value = project_title;
                document.querySelector('#updateRequestPopup textarea[name="idea"]').value = idea;
                document.querySelector('#updateRequestPopup textarea[name="reason"]').value = reason;

                // Show update request popup
                document.getElementById('updateRequestPopup').classList.remove('hidden');
            }

            // Add event listener to all elements with class 'closeUpdateRequestPopup'
            Array.from(document.getElementsByClassName('closeUpdateRequestPopup')).forEach(element => {
                element.addEventListener('click', () => {
                    // Reset values in updateRequestPopup form
                    document.querySelector('#updateRequestPopup form').reset();
                    document.getElementById('updateRequestPopup').classList.add('hidden');
                });
            });

            // Meeting Request Popup
            function sendMeetingRequest() {
                window.scrollTo(0, 0);
                document.getElementById('meetingRequestPopup').classList.remove('hidden');
            }

            // Add event listener to all elements with class 'closeMeetingRequestPopup'
            Array.from(document.getElementsByClassName('closeMeetingRequestPopup')).forEach(element => {
                element.addEventListener('click', () => {
                    // Reset values in meetingRequestPopup form
                    document.querySelector('#meetingRequestPopup form').reset();
                    document.getElementById('meetingRequestPopup').classList.add('hidden');
                });
            });

            // Open Generate Report Popup
            function generateReport() {
                window.scrollTo(0, 0);
                document.getElementById('generate_report_popup').classList.remove('hidden');
            }

            // Add event listener to generate_report_popup_close button
            document.getElementById('generate_report_popup_close').addEventListener('click', () => {
                // Reset values in generate_report_popup form
                document.querySelector('#generate_report_popup form').reset();
                document.getElementById('generate_report_popup').classList.add('hidden');
            });
        </script>
</body>

</html>