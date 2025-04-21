<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Profile popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="profilePopup">
        <div class="bg-white p-5 rounded-md" style="max-width: 800px;max-height:90vh;">
            <div class="flex items-center">
                <div class="flex">

                <div class="bg-blue rounded-md flex flex-col items-center py-9 px-6">
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon"
                        class="rounded-full"
                        style="height: 70px; width: 70px; object-fit: cover;">
                    <div class="text-white font-medium text-center mt-5 mx-5">
                        <div class="mb-2">Student</div>
                        <div><?= $_SESSION['user']['full_name'] ?></div>
                    </div>
                </div>
                
                    <div class="border-black ml-5 rounded-md">
                        <form action="" method="post" name="updateProfile">
                            <input type="hidden" name="userID" value="<?= $_SESSION['user']['user_id'] ?>">
                            <div class="mx-5">
                                <div class="mt-5 text">Name : <input type="text" name="full_name" class="border border-primary-color rounded-md p-2" value="<?= $_SESSION['user']['full_name'] ?>"></div>
                            </div>

                            <div class="mx-5">
                                <div class="mt-5 text">E-mail : <input type="email" name="email" class="border border-primary-color rounded-md p-2" value="<?= $_SESSION['user']['email'] ?>"></div>
                            </div>

                            <div class="mx-5">
                                <div class="flex mt-5 items-center">Registration number : 
                                    <div class="border border-primary-color rounded-md p-2 ml-2">
                                        <?= $pageData['student'][0]['registration_number'] ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-5 mb-2">
                                <div class="flex mt-5 items-center">Index number : 
                                    <div class="border border-primary-color rounded-md p-2 ml-2">
                                        <?= $pageData['student'][0]['index_number'] ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <div class="flex justify-end gap-5 mt-2">
                <button type="submit"
                        name="updateProfile"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">
                        Update
                </button>
                </form>

                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeProfilePopup" onclick="closeProfilePopup()">
                        Close
                </button>
            </div>
        </div> 
    </div>

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
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
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
        <form id="requestMeeting" action="" method="post" class="bg-white p-5 rounded-md w-full"
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
                    <textarea name="reason" id="Reason" class="border border-primary-color rounded-xl p-2"
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
        <form id="genarateReport" action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px; max-height: 90vh; overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Generate Report</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <!-- Completed Tasks (task that done during last two weeks currently only showing task without time contraint and without group check only by current userID) -->
                <div class="flex flex-col gap-2">
                    <label class="text-lg font-bold text-primary-color">Tasks Completed During This Period</label>
                    <div id="completed_tasks_list"
                        style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
                        <?php if (!empty($pageData['completeTasks'])): ?>
                                <?php foreach ($pageData['completeTasks'] as $task): ?>
                                        <!-- Task Box -->
                                        <div class="task-box"
                                            style="background-color: #E0F7FA; border: 1px solid #00ACC1; padding: 10px; border-radius: 8px;">
                                            <!-- here showing task_number since it is unique to group but im input correctly passing taskID which is primary key -->
                                            <span>Task <?= htmlspecialchars($task['task_number']) ?>: /
                                                <?= htmlspecialchars($task['title']) ?></span>
                                            <input type="hidden" name="completed_tasks[]"
                                                value="<?= htmlspecialchars($task['task_id']) ?>">
                                        </div>
                                <?php endforeach; ?>
                        <?php else: ?>
                                <p style="color: #666; font-style: italic;">No completed tasks</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Meeting Outcomes -->
            <div class="flex flex-col gap-2 my-5">
                <label for="meeting_outcomes" class="text-lg font-bold text-primary-color">Meeting Outcomes</label>
                <textarea name="meeting_outcomes" id="meeting_outcomes"
                    class="border border-primary-color rounded-xl p-2" rows="5"
                    placeholder="Enter the key decisions or goals achieved during the meeting"></textarea>
            </div>

            <!-- Responsibilities for the Next Two Weeks -->
            <div class="flex flex-col gap-2 my-5">
                <label for="responsibilities" class="text-lg font-bold text-primary-color">Responsibilities for the Next
                    Two Weeks</label>
                <textarea name="nextTwoWeekWork" id="nextTwoWeekWork" class="border border-primary-color rounded-xl p-2"
                    rows="5" placeholder="Outline the tasks accepted by the group for the next two weeks"></textarea>
            </div>

            <!-- Summary of Work in the Last Two Weeks -->
            <div class="flex flex-col gap-2 my-5">
                <label for="summary" class="text-lg font-bold text-primary-color">Summary of Work in the Last Two
                    Weeks</label>
                <textarea name="pastTwoWeekWork" id="pastTwoWeekWork" class="border border-primary-color rounded-xl p-2"
                    rows="5"
                    placeholder="Summarize the completed tasks and progress made in the last two weeks"></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-5 my-5">
                <button type="button" id="generate_report_popup_close"
                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Cancel</button>
                <button type="submit"
                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    name="generate_report">Generate</button>
            </div>
        </form>
    </div>

    <!-- Resubmit Report Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="resubmit_report_popup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px; max-height: 90vh; overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Resubmit Report</h1>
            </div>
            <!-- TODO:For now we will not allow to edit this -->
            <!-- Next Week Tasks -->
            <!-- <div class="flex flex-col gap-2 my-5">
                <label for="task_selection" class="text-lg font-bold text-primary-color">
                    Select Next Week Tasks
                    <span class="text-sm text-gray font-light">(Hold Ctrl to select multiple items)</span>
                </label>
                <?php if (empty($pageData['todoTasks'])): ?>
                    <p style="color: #666; font-style: italic;">No TODO tasks</p>
                <?php else: ?>
                    <select id="task_selection" name="selected_tasks[]" multiple>
                        <option value="" disabled selected>Select tasks</option>
                        <?php foreach ($pageData['todoTasks'] as $task): ?>
                            <option value="<?= htmlspecialchars($task['task_id']) ?>">
                                Task <?= htmlspecialchars($task['task_id']) ?>: <?= htmlspecialchars($task['description']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div> -->

            <!-- Meeting Outcomes -->
            <div class="flex flex-col gap-2 my-5">
                <label for="meeting_outcomes" class="text-lg font-bold text-primary-color">Meeting Outcomes</label>
                <textarea name="meeting_outcomes" id="meeting_outcomes"
                    class="border border-primary-color rounded-xl p-2" rows="5"
                    placeholder="Enter the key decisions or goals achieved during the meeting"></textarea>
            </div>

            <!-- Responsibilities for the Next Two Weeks -->
            <div class="flex flex-col gap-2 my-5">
                <label for="responsibilities" class="text-lg font-bold text-primary-color">Responsibilities for the Next
                    Two Weeks</label>
                <textarea name="nextTwoWeekWork" id="nextTwoWeekWork" class="border border-primary-color rounded-xl p-2"
                    rows="5" placeholder="Outline the tasks accepted by the group for the next two weeks"></textarea>
            </div>

            <!-- Summary of Work in the Last Two Weeks -->
            <div class="flex flex-col gap-2 my-5">
                <label for="summary" class="text-lg font-bold text-primary-color">Summary of Work in the Last Two
                    Weeks</label>
                <textarea name="pastTwoWeekWork" id="pastTwoWeekWork" class="border border-primary-color rounded-xl p-2"
                    rows="5"
                    placeholder="Summarize the completed tasks and progress made in the last two weeks"></textarea>
            </div>
            <input type="hidden" name="report_id" value="">
            <!-- Buttons -->
            <div class="flex justify-end gap-5 my-5">
                <button type="button" id="resubmit_report_popup_close"
                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Cancel</button>
                <button type="submit"
                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    name="resubmit_report">Resubmit</button>
            </div>
        </form>
    </div>


    <!-- Update Report Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="update_report_popup">
        <form id="updateReport" action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px; max-height: 90vh; overflow-y: scroll;">
            
            <!-- hidden input report id -->
            <input type="hidden" id="updateReportID" name="updateReportID" value=''>

            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Update Report</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <!-- Completed Tasks (task that done during last two weeks currently only showing task without time contraint and without group check only by current userID) -->
                <div class="flex flex-col gap-2">
                    <label class="text-lg font-bold text-primary-color">Tasks Completed During This Period</label>
                    <div id="update_completed_tasks_list"
                        style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">
                        <?php if (!empty($pageData['completeTasks'])): ?>
                                <?php foreach ($pageData['completeTasks'] as $task): ?>
                                        <!-- Task Box -->
                                        <div class="task-box"
                                            style="background-color: #E0F7FA; border: 1px solid #00ACC1; padding: 10px; border-radius: 8px;">
                                            <!-- here showing task_number since it is unique to group but im input correctly passing taskID which is primary key -->
                                            <span>Task <?= htmlspecialchars($task['task_number']) ?>: /
                                                <?= htmlspecialchars($task['title']) ?></span>
                                            <input type="hidden" name="completed_tasks[]"
                                                value="<?= htmlspecialchars($task['task_id']) ?>">
                                        </div>
                                <?php endforeach; ?>
                        <?php else: ?>
                                <p style="color: #666; font-style: italic;">No completed tasks</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Meeting Outcomes -->
            <div class="flex flex-col gap-2 my-5">
                <label for="meeting_outcomes" class="text-lg font-bold text-primary-color">Meeting Outcomes</label>
                <textarea name="update_meeting_outcomes" id="update_meeting_outcomes"
                    class="border border-primary-color rounded-xl p-2" rows="5"
                    placeholder="Enter the key decisions or goals achieved during the meeting"></textarea>
            </div>

            <!-- Responsibilities for the Next Two Weeks -->
            <div class="flex flex-col gap-2 my-5">
                <label for="responsibilities" class="text-lg font-bold text-primary-color">Responsibilities for the Next
                    Two Weeks</label>
                <textarea name="updatenextTwoWeekWork" id="updatenextTwoWeekWork" class="border border-primary-color rounded-xl p-2"
                    rows="5" placeholder="Outline the tasks accepted by the group for the next two weeks"></textarea>
            </div>

            <!-- Summary of Work in the Last Two Weeks -->
            <div class="flex flex-col gap-2 my-5">
                <label for="summary" class="text-lg font-bold text-primary-color">Summary of Work in the Last Two
                    Weeks</label>
                <textarea name="updatepastTwoWeekWork" id="updatepastTwoWeekWork" class="border border-primary-color rounded-xl p-2"
                    rows="5"
                    placeholder="Summarize the completed tasks and progress made in the last two weeks"></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-5 my-5">
                <button type="button" id="update_report_popup_close"
                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Cancel</button>
                <button type="submit"
                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    name="update_report">Update</button>
            </div>
        </form>
    </div>

    <!-- Main content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 4]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Student Leader Options</h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;"
                        onclick="openProfilePopup()">
                </div>
            </div>
            <div class="flex">
                <?php if (isset($pageData['groupDetails']['supervisor_id'])): ?>
                        <div class="mx-4 p-5 w-1/3 flex flex-col gap-2 cursor-pointer rounded-2xl bg-white shadow"
                            onclick="generateReport()">
                            <p class="text-2xl font-bold">Generate Report</p>
                            <p class=" text-gray">Generate Bi-Weekly Report for Week</p>
                            <button
                                class="mt-2 bg-blue rounded-xl text-left text-white text-md px-5 py-2 flex items-center justify-between"
                                id="updatePassword">
                                <p>New Report</p>
                                <img src="<?= BASE_URL ?>/public/images/icons/popup.svg" alt="popup icon">
                            </button>
                        </div>
                        <div class="mx-4 p-5 w-1/3 flex flex-col gap-2 cursor-pointer rounded-2xl bg-white shadow"
                            onclick="sendMeetingRequest()">
                            <p class="text-2xl font-bold">Request Meeting</p>
                            <p class=" text-gray">Request supervisor a group meeting</p>
                            <button
                                class="mt-2 bg-blue rounded-xl text-left text-white text-md px-5 py-2 flex items-center justify-between"
                                id="updatePassword">
                                <p>New Request</p>
                                <img src="<?= BASE_URL ?>/public/images/icons/popup.svg" alt="popup icon">
                            </button>
                        </div>
                <?php else: ?>
                        <div class="mx-4 p-5 w-1/3 flex flex-col gap-2 cursor-pointer rounded-2xl bg-white shadow"
                            onclick="window.location.href='<?= BASE_URL ?>/student/requestSupervisor'">
                            <p class="text-2xl font-bold">Request Supervisor</p>
                            <p class=" text-gray">Send requests to lectures to supervise</p>
                            <button
                                class="mt-2 bg-blue rounded-xl text-left text-white text-md px-5 py-2 flex items-center justify-between"
                                id="updatePassword">
                                <p>New Request</p>
                                <img src="<?= BASE_URL ?>/public/images/icons/popup.svg" alt="popup icon">
                            </button>
                        </div>
                <?php endif; ?>
            </div>
            <p class="text-2xl font-bold text-primary-color mt-5">Previous Requests</p>
            <div class="w-full flex justify-evenly text-center bg-gray py-2 rounded-lg">
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
                                        <p class="text-black font-bold">Supervisor:</p>
                                        <p class="text-secondary-color"><?= $requestData['full_name'] ?> (<?= $requestData['email'] ?>)
                                        </p>
                                        <p class="text-black font-bold mt-5">Our Idea:</p>
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
                        <?php elseif (isset($requestData['report_id'])): ?>
                                <!-- Biweekly Report -->
                                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                                    <p class="text-lg font-bold text-primary-color">[Biweekly Report] <?= $requestData['date'] ?></p>
                                    <div class="mt-5">
                                        <?php if ($requestData['status'] == "REJECTED" && isset($requestData['reject_reason'])): ?>
                                                <p class="text-red font-bold">Rejected Reason:</p>
                                                <p class="text-secondary-color"> <?= $requestData['reject_reason'] ?></p>
                                        <?php endif; ?>
                                        <p class="text-black font-bold mt-5">Meeting Outcomes:</p>
                                        <p class="text-secondary-color"> <?= $requestData['meeting_outcomes'] ?></p>
                                        <p class="text-black font-bold mt-5">Next Two Week Work:</p>
                                        <p class="text-secondary-color"> <?= $requestData['next_two_week_work'] ?></p>
                                        <p class="text-black font-bold mt-5">Past Two Week Work:</p>
                                        <p class="text-secondary-color"> <?= $requestData['past_two_week_work'] ?></p>
                                    </div>
                                    <div class="flex justify-end mt-5 gap-5">
                                        <?php if ($requestData['status'] === 'PENDING'): ?>
                                        <!-- We have to show a message when button is clicked -->
                                        <!-- bi weekly report delte button -->
                                        <form id="deleteBiweeklyReportform" action="" method="post">
                                            <input type="hidden" name="report_id" value="<?= $requestData['report_id'] ?>">
                                            <button type="submit"
                                                name = "deleteBiweeklyReport"
                                                onclick="deleteBiweeklyReport(<?= $requestData['report_id'] ?>)"
                                                class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2">
                                                Delete
                                            </button>
                                        </form>
                                                <!-- We have to show a message when button is clicked -->
                                                <!-- also passing data relevent to clicked report -->
                                                <button class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                                    onclick='updateReportpopup(<?= htmlspecialchars(json_encode($requestData), ENT_QUOTES, "UTF-8") ?>)'>
                                                    Edit
                                                </button>
                                        <?php elseif ($requestData['status'] === 'ACCEPTED'): ?>
                                                <!-- We have to show a message when button is clicked -->
                                                <?php $this->renderComponent('button', ['name' => 'accept_msg', 'text' => 'Accepted', 'bg' => 'bg-green']) ?>
                                        <?php else: ?>
                                                <button type="button"
                                                    onclick="resubmitReport(<?= $requestData['report_id'] ?>, '<?= $requestData['meeting_outcomes'] ?>', '<?= $requestData['next_two_week_work'] ?>', '<?= $requestData['past_two_week_work'] ?>')"
                                                    class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2">Resubmit</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        <?php else: ?>
                                <!-- Meeting Request -->
                                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                                    <p class="text-lg font-bold text-primary-color">[Meeting Request] <?= $requestData['title'] ?></p>
                                <!-- <script>
                                    const requestData = <?= json_encode($requestData) ?>;
                                    console.log("Request Data:", requestData);
                                </script> -->

                                    <div class="mt-5">
                                        <p class="text-black font-bold">To Be Discussed:</p>
                                        <p class="text-secondary-color"> <?= $requestData['reason'] ?></p>
                                        <p class="text-black font-bold mt-5">What is Done:</p>
                                        <p class="text-secondary-color"> <?= $requestData['done'] ?></p>
                                    </div>
                                    <div class="flex justify-end mt-5 gap-5">
                                        <?php if ($requestData['status'] === 'PENDING'): ?>
                                        <!-- We have to show a message when button is clicked -->
                                        <!-- meeting request delete button -->
                                        <form id="deleteMeetingRequestform" action="" method="post">
                                            <input type="hidden" name="request_id" value="<?= $requestData['request_id'] ?>">
                                            <button type="submit"
                                                name = "deleteMeetingRequest"
                                                onclick="deleteMeetingRequest(<?= $requestData['request_id'] ?>)"
                                                class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2">
                                                Delete
                                            </button>
                                        </form>
                                            <!-- We have to show a message when button is clicked -->
                                            <?php $this->renderComponent('button', ['name' => 'pending_msg', 'text' => 'Pending', 'bg' => 'bg-blue']) ?>
                                        <?php elseif ($requestData['status'] === 'ACCEPTED'): ?>
                                                <!-- We have to show a message when button is clicked -->
                                                <?php $this->renderComponent('button', ['name' => 'accept_msg', 'text' => 'Accepted', 'bg' => 'bg-green']) ?>
                                        <?php else: ?>
                                                <!-- We have to show a message when button is clicked -->
                                                <?php $this->renderComponent('button', ['name' => 'reject_msg', 'text' => 'Declined', 'bg' => 'bg-red']) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="flex flex-col gap-5 my-5 hidden" id="reports">
                <?php if (empty($pageData['biWeeklyReports'])): ?>
                        <p class="text-center text-secondary-color">No Reports</p>
                <?php endif; ?>
                <?php foreach ($pageData['biWeeklyReports'] as $requestData): ?>
                        <!-- Biweekly Report -->
                        <div class="flex flex-col bg-white shadow rounded-xl p-5">
                            <p class="text-lg font-bold text-primary-color">[Biweekly Report] <?= $requestData['date'] ?></p>
                            <div class="mt-5">
                                <?php if ($requestData['status'] == "REJECTED" && isset($requestData['reject_reason'])): ?>
                                        <p class="text-red font-bold">Rejected Reason:</p>
                                        <p class="text-secondary-color"> <?= $requestData['reject_reason'] ?></p>
                                <?php endif; ?>
                                <p class="text-black font-bold mt-5">Meeting Outcomes:</p>
                                <p class="text-secondary-color"> <?= $requestData['meeting_outcomes'] ?></p>
                                <p class="text-black font-bold mt-5">Next Two Week Work:</p>
                                <p class="text-secondary-color"> <?= $requestData['next_two_week_work'] ?></p>
                                <p class="text-black font-bold mt-5">Past Two Week Work:</p>
                                <p class="text-secondary-color"> <?= $requestData['past_two_week_work'] ?></p>
                            </div>
                            <div class="flex justify-end mt-5 gap-5">

                                <?php if ($requestData['status'] === 'PENDING'): ?>
                                        <!-- We have to show a message when button is clicked -->
                                        <!-- bi weekly report delte button -->
                                        <form id="deleteBiweeklyReportform" action="" method="post">
                                            <input type="hidden" name="report_id" value="<?= $requestData['report_id'] ?>">
                                            <button type="submit"
                                                name = "deleteBiweeklyReport"
                                                onclick="deleteBiweeklyReport(<?= $requestData['report_id'] ?>)"
                                                class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2">
                                                Delete
                                            </button>
                                        </form>

                                        <?php $this->renderComponent('button', ['name' => 'pending_msg', 'text' => 'Pending', 'bg' => 'bg-blue']) ?>
                                <?php elseif ($requestData['status'] === 'ACCEPTED'): ?>
                                        <!-- We have to show a message when button is clicked -->
                                        <?php $this->renderComponent('button', ['name' => 'accept_msg', 'text' => 'Accepted', 'bg' => 'bg-green']) ?>
                                <?php else: ?>
                                        <button type="button"
                                            onclick="resubmitReport(<?= $requestData['report_id'] ?>, '<?= $requestData['meeting_outcomes'] ?>', '<?= $requestData['next_two_week_work'] ?>', '<?= $requestData['past_two_week_work'] ?>')"
                                            class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2">
                                            Resubmit</button>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>

            <div class="flex flex-col gap-5 my-5 hidden" id="meetings">
                <?php if (empty($pageData['meetingRequests'])): ?>
                        <p class="text-center text-secondary-color">No Meeting Requests</p>
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
                                <p class="text-black font-bold">Supervisor:</p>
                                <p class="text-secondary-color"><?= $requestData['full_name'] ?> (<?= $requestData['email'] ?>)
                                </p>
                                <p class="text-black font-bold mt-5">Our Idea:</p>
                                <p class="text-secondary-color"><?= $requestData['idea'] ?></p>
                                <p class="text-black font-bold mt-5">Why we need you:</p>
                                <p class="text-secondary-color"><?= $requestData['reason'] ?></p>
                                <!-- Team Members List-->
                                <div class="flex flex-row gap-5 mt-5">
                                    <!-- Each members display -->
                                    <?php if (empty($pageData['group_detail'])): ?>
                                            <p class="text-center text-secondary-color">No group detail</p>
                                    <?php endif; ?>
                                    <?php foreach ($pageData['group_detail'] as $member): ?>
                                            <div class="flex flex-col items-center">
                                                <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $member['profile_picture'] ?>" alt="user icon"
                                                    width="40" height="40" style="border-radius: 50%; border: 2px solid #000; margin-bottom: 10px">
                                                <p class="text-secondary-color"><?= $member['full_name'] ?></p>
                                                <p class="text-secondary-color"><?= $member['registration_number'] ?></p>
                                            </div>
                                    <?php endforeach; ?>
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
                <?php endforeach; ?>
            </div>

        </div>

        <!-- Validator popup -->
        <?php
        $this->renderComponent('validator', [
            'id' => 'popup_validator',
            'bg' => '#F44336',
            'message' => 'Form submiting error'
        ]);
        ?>
        
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
            document.querySelector('#generate_report_popup form').reset();
            document.getElementById('generate_report_popup').classList.add('hidden');
        });

        // Open Update Report Popup
        function updateReportpopup(reportData) {
            console.log(reportData);
            window.scrollTo(0, 0);
            document.getElementById('update_report_popup').classList.remove('hidden');

            document.getElementById('updateReportID').value = reportData['report_id'];
            document.getElementById('update_meeting_outcomes').value = reportData['meeting_outcomes'];
            document.getElementById('updatenextTwoWeekWork').value = reportData['next_two_week_work'];
            document.getElementById('updatepastTwoWeekWork').value = reportData['past_two_week_work'];

        }

        // Add event listener to Update_report_popup_close button
        document.getElementById('update_report_popup_close').addEventListener('click', () => {
            document.querySelector('#update_report_popup form').reset();
            document.getElementById('update_report_popup').classList.add('hidden');
        });


        // Resubmit Report Popup
        function resubmitReport(report_id, meeting_outcomes, nextTwoWeekWork, pastTwoWeekWork) {
            window.scrollTo(0, 0);
            // Set values in resubmit_report_popup form
            document.querySelector('#resubmit_report_popup input[name="report_id"]').value = report_id;
            document.querySelector('#resubmit_report_popup textarea[name="meeting_outcomes"]').value = meeting_outcomes;
            document.querySelector('#resubmit_report_popup textarea[name="nextTwoWeekWork"]').value = nextTwoWeekWork;
            document.querySelector('#resubmit_report_popup textarea[name="pastTwoWeekWork"]').value = pastTwoWeekWork;

            // Show resubmit report popup
            document.getElementById('resubmit_report_popup').classList.remove('hidden');
        }

        function deleteBiweeklyReport(report_id) {
            document.querySelector('#resubmit_report_popup input[name="report_id"]').value = report_id;
            console.log('delete button clicked');
        }

        function deleteMeetingRequest(report_id) {
            document.querySelector('#resubmit_report_popup input[name="report_id"]').value = report_id;
            console.log('delete button clicked');
        }


        // Add event listener to resubmit_report_popup_close button
        document.getElementById('resubmit_report_popup_close').addEventListener('click', () => {
            document.querySelector('#resubmit_report_popup form').reset();
            document.getElementById('resubmit_report_popup').classList.add('hidden');
        });

        
        // data Validation !!!!!!!!!!!!!!!!!

        function validateShowPopup(popupId, message) {
            var popup = document.getElementById(popupId);
            if (popup) {
                // change message dynamically
                popup.innerHTML = message;

                popup.style.opacity = '1';
                popup.style.visibility = 'visible';

                setTimeout(() => {
                    popup.style.opacity = '0';
                    setTimeout(() => { popup.style.visibility = 'hidden'; }, 500);
                }, 3000);
            }
        }

        document.getElementById("genarateReport").addEventListener('submit', function(event) {
            var meeting_outcomes = document.getElementById("meeting_outcomes").value;
            var nextTwoWeekWork = document.getElementById("nextTwoWeekWork").value;
            var pastTwoWeekWork = document.getElementById("pastTwoWeekWork").value
        
            if(meeting_outcomes == '' || nextTwoWeekWork == '' || pastTwoWeekWork == '') {
                validateShowPopup('popup_validator', 'Field cannot leave empty'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            }
        
        });

        document.getElementById("requestMeeting").addEventListener('submit', function(event) {
            var title = document.getElementById("title").value;
            var reason = document.getElementById("Reason").value;
            var done = document.getElementById("done").value
        
            if(title == '' || reason == '' || done == '') {
                validateShowPopup('popup_validator', 'Field cannot leave empty'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            }
        
        });

        document.getElementById("updateReport").addEventListener('submit', function(event) {
            var update_meeting_outcomes = document.getElementById("update_meeting_outcomes").value;
            var updatenextTwoWeekWork = document.getElementById("updatenextTwoWeekWork").value;
            var updatepastTwoWeekWork = document.getElementById("updatepastTwoWeekWork").value
        
            if(update_meeting_outcomes == '' || updatenextTwoWeekWork == '' || updatepastTwoWeekWork == '') {
                validateShowPopup('popup_validator', 'Field cannot leave empty'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            }
        
        });

        function openProfilePopup(){
                document.getElementById("profilePopup").classList.remove('hidden');
            }

            function closeProfilePopup(){
                document.getElementById("profilePopup").classList.add('hidden');

            }

    </script>
</body>

</html>