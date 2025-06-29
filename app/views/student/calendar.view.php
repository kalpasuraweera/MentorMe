<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/components/calendar.css">
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

    <!-- Event Creation -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="eventCreationPopup">
        <form id="eventCreate" action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Create New Event</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="title" class="text-lg font-bold text-primary-color">Event Title</label>
                    <input type="text" name="title" id="title" class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="description" class="text-lg font-bold text-primary-color">Description</label>
                    <textarea name="description" id="description" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="scope" class="text-lg font-bold text-primary-color">Scope</label>
                    <select name="scope" id="scope" class="border border-primary-color rounded-xl p-2">
                        <option value="USER_<?= $_SESSION['user']['user_id'] ?>">Personal</option>
                        <option value="<?= 'GROUP_' . $pageData['group_id'] ?>">Group</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="start_time" class="text-lg font-bold text-primary-color">Start Time</label>
                    <input type="datetime-local" name="start_time" id="start_time"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="end_time" class="text-lg font-bold text-primary-color">End Time</label>
                    <input type="datetime-local" name="end_time" id="end_time"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeEventCreationPopup">Cancel</button>
                    <button type="submit"
                        class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="create_event">Create</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Event Update -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="eventUpdatePopup">
        <form id="eventUpdate" action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Update Event</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="title" class="text-lg font-bold text-primary-color">Event Title</label>
                    <input type="text" name="title" id="updatetitle"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="description" class="text-lg font-bold text-primary-color">Description</label>
                    <textarea name="description" id="updatedescription"
                        class="border border-primary-color rounded-xl p-2" rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="scope" class="text-lg font-bold text-primary-color">Scope</label>
                    <select name="scope" id="updatescope" class="border border-primary-color rounded-xl p-2">
                        <option value="USER_<?= $_SESSION['user']['user_id'] ?>">Personal</option>
                        <option value="<?= 'GROUP_' . $pageData['group_id'] ?>">Group</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="start_time" class="text-lg font-bold text-primary-color">Start Time</label>
                    <input type="datetime-local" name="start_time" id="updatestart_time"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="end_time" class="text-lg font-bold text-primary-color">End Time</label>
                    <input type="datetime-local" name="end_time" id="updateend_time"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <input type="hidden" name="event_id" id="updateevent_id" value=''>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeEventUpdatePopup">Cancel</button>
                    <button type="submit"
                        class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="update_event">Update</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Event Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="eventPopup">
        <div class="bg-white p-5 rounded-md w-full" style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color" id="popupTitle">
                </h1>
            </div>
            <div class="flex flex-col gap-5 my-5" id="popupEvents">
                <!-- Events -->
            </div>
            <div class="flex justify-end gap-5">
                <button type="button"
                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    id="closeEventPopup">Close</button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 1]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Calendar</h1>
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

            <!-- Event Creation -->
            <div class="flex justify-end w-full mt-4">
                <button id="eventCreationBtn"
                    class="bg-blue rounded-lg text-center text-white text-base font-medium px-5 py-2">Create
                    Event</button>
            </div>
            <!-- Calendar -->
            <div class="flex flex-col bg-white shadow rounded-xl p-5 mt-5">
                <div class="flex justify-between items-center mb-5">
                    <p class="text-primary-color font-bold text-2xl" id="calendarTitle"></p>
                    <div class="flex gap-2">
                        <img src="<?= BASE_URL ?>/public/images/icons/back_icon.png" alt="left arrow"
                            onclick="previousMonth()">
                        <img src="<?= BASE_URL ?>/public/images/icons/forward_icon.png" alt="right arrow"
                            onclick="nextMonth()">
                    </div>
                </div>
                <table id="calendar">
                </table>
                <!-- Event Color Legend -->
                <div class="flex flex-row gap-5 mt-5">
                    <div class="flex items-center gap-2">
                        <div class="p-2 rounded-full global-event"></div>
                        <p class="text-primary-color">Global</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="p-2 rounded-full user-event"></div>
                        <p class="text-primary-color">Personal</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="p-2 rounded-full group-event"></div>
                        <p class="text-primary-color">Group</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="p-2 rounded-full supervisors-event"></div>
                        <p class="text-primary-color">Supervisors</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="p-2 rounded-full examiners-event"></div>
                        <p class="text-primary-color">Examiners</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="p-2 rounded-full students-event"></div>
                        <p class="text-primary-color">Students</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex justify-between items-center">
                    <p class="text-primary-color font-bold text-2xl">Upcoming Events</p>
                    <p class="text-primary-color font-bold"></p>
                </div>
                <?php if (empty($pageData['eventList'])): ?>
                    <p class="text-center text-secondary-color">No upcoming events</p>
                <?php endif; ?>
                <?php foreach ($pageData['eventList'] as $event): ?>
                    <div class="flex flex-col bg-white shadow rounded-xl p-5">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-bold text-primary-color"><?= $event['title'] ?></h3>
                            <div class="flex items-center">
                                <?php
                                $scope = explode('_', $event['scope'])[0];
                                switch ($scope) {
                                    case 'GROUP':
                                        $dotClass = 'group-event';
                                        break;
                                    case 'USER':
                                        $dotClass = 'user-event';
                                        break;
                                    case 'GLOBAL':
                                        $dotClass = 'global-event';
                                        break;
                                    case 'SUPERVISORS':
                                        $dotClass = 'supervisors-event';
                                        break;
                                    case 'EXAMINERS':
                                        $dotClass = 'examiners-event';
                                        break;
                                    case 'STUDENTS':
                                        $dotClass = 'students-event';
                                        break;
                                    default:
                                        $dotClass = 'global-event';
                                }
                                ?>
                                <div class="rounded-full <?= $dotClass ?> mr-2"
                                    style="width: 20px;height: 20px;object-fit: cover;">
                                </div>
                                <span class="text-sm text-secondary-color"><?= ucfirst(strtolower($scope)) ?></span>
                            </div>
                        </div>
                        <p class="mt-3 text-secondary-color"><?= $event['description'] ?></p>
                        <div class="flex justify-between mt-4 bg-gray-100 p-3 rounded">
                            <div>
                                <span class="text-sm font-bold">Starts:</span><br>
                                <span class="text-sm"><?= date("M d, Y H:i", strtotime($event['start_time'])) ?></span>
                            </div>
                            <div>
                                <span class="text-sm font-bold">Ends:</span><br>
                                <span class="text-sm"><?= date("M d, Y H:i", strtotime($event['end_time'])) ?></span>
                            </div>
                        </div>
                        <?php if ($event['creator_id'] == $_SESSION['user']['user_id']): ?>
                            <div class="flex justify-end mt-5 gap-5">
                                <!-- Updated button with a dynamic data-event-id attribute -->
                                <button id="eventUpdateBtn<?= $event['event_id'] ?>"
                                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    data-event-id="<?= $event['event_id'] ?>"
                                    onclick='openEventUpdatePopup(<?= json_encode($event) ?>)'>
                                    Edit
                                </button>

                                <!-- Delete event -->
                                <form action="" method="post" id="deleteEvent">
                                    <input type="hidden" value="<?= $event['event_id'] ?>" name="eventID">
                                    <button type="submit" name="deleteEvent"
                                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        <?php endif; ?>
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
        const eventList = <?= json_encode($pageData['eventList']) ?>;
        document.addEventListener("DOMContentLoaded", () => {
            // Calendar Title
            const calendarTitle = document.querySelector("#calendarTitle");
            calendarTitle.textContent = new Date().toLocaleString('default', { month: 'long' }) + ' ' + new Date().getFullYear();

            const calendar = document.querySelector("#calendar");

            // Calendar Header
            const header = document.createElement("thead");
            const headerRow = document.createElement("tr");
            const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
            days.forEach(day => {
                const cell = document.createElement("th");
                cell.textContent = day;
                headerRow.appendChild(cell);
            });
            header.appendChild(headerRow);
            calendar.appendChild(header);

            // Calendar Body
            const calendarBody = document.createElement("tbody");

            // First day of the month and number of days in the month
            const firstDayOfMonth = new Date(new Date().getFullYear(), new Date().getMonth(), 1).getDay(); // First day of the month (0 for Sunday, 6 for Saturday)
            const numDays = new Date(new Date().getFullYear(), new Date().getMonth() + 1, 0).getDate(); // Number of days in the month

            let day = 1;

            for (let i = 0; i < 6; i++) { // Maximum 6 weeks in a calendar month
                const row = document.createElement("tr");

                for (let j = 0; j < 7; j++) { // 7 days in a week
                    const cell = document.createElement("td");

                    if (i === 0 && j < firstDayOfMonth) {
                        // Empty cell before the first day of the month
                        cell.textContent = "";
                    } else if (day <= numDays) {
                        // Fill the cell with the current day
                        cell.textContent = day;
                        let cellDate = new Date(new Date().getFullYear(), new Date().getMonth(), day);
                        highlightCell(cell, cellDate);
                        day++;
                    } else {
                        // Empty cells after the last day of the month
                        cell.textContent = "";
                    }

                    row.appendChild(cell);
                }

                calendarBody.appendChild(row);
            }
            calendar.appendChild(calendarBody);
        });

        function nextMonth() {
            const calendarTitle = document.querySelector("#calendarTitle");
            const calendar = document.querySelector("#calendar");
            const currentMonth = new Date(calendarTitle.textContent).getMonth();
            let currentYear = new Date(calendarTitle.textContent).getFullYear();
            if (currentMonth === 11) {
                calendarTitle.textContent = new Date(currentYear, currentMonth + 1).toLocaleString('default', { month: 'long' }) + ' ' + (currentYear + 1);
            } else {
                calendarTitle.textContent = new Date(currentYear, currentMonth + 1).toLocaleString('default', { month: 'long' }) + ' ' + currentYear;
            }

            const calendarBody = calendar.querySelector("tbody");
            calendarBody.innerHTML = "";

            const firstDayOfMonth = new Date(currentYear, currentMonth + 1, 1).getDay();
            const numDays = new Date(currentYear, currentMonth + 2, 0).getDate();

            let day = 1;

            for (let i = 0; i < 6; i++) {
                const row = document.createElement("tr");

                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement("td");

                    if (i === 0 && j < firstDayOfMonth) {
                        cell.textContent = "";
                    } else if (day <= numDays) {
                        // Fill the cell with the current day
                        cell.textContent = day;
                        const cellDate = new Date(currentYear, currentMonth + 1, day);
                        highlightCell(cell, cellDate);
                        day++;
                    } else {
                        cell.textContent = "";
                    }

                    row.appendChild(cell);
                }

                calendarBody.appendChild(row);
            }
            calendar.appendChild(calendarBody);
        }

        function previousMonth() {
            const calendarTitle = document.querySelector("#calendarTitle");
            const calendar = document.querySelector("#calendar");
            const currentMonth = new Date(calendarTitle.textContent).getMonth();
            let currentYear = new Date(calendarTitle.textContent).getFullYear();
            if (currentMonth === 0) {
                calendarTitle.textContent = new Date(currentYear, currentMonth - 1).toLocaleString('default', { month: 'long' }) + ' ' + (currentYear - 1);
            } else {
                calendarTitle.textContent = new Date(currentYear, currentMonth - 1).toLocaleString('default', { month: 'long' }) + ' ' + currentYear;
            }

            const calendarBody = calendar.querySelector("tbody");
            calendarBody.innerHTML = "";

            const firstDayOfMonth = new Date(currentYear, currentMonth - 1, 1).getDay();
            const numDays = new Date(currentYear, currentMonth, 0).getDate();

            let day = 1;

            for (let i = 0; i < 6; i++) {
                const row = document.createElement("tr");

                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement("td");

                    if (i === 0 && j < firstDayOfMonth) {
                        cell.textContent = "";
                    } else if (day <= numDays) {
                        // Fill the cell with the current day
                        cell.textContent = day;
                        const cellDate = new Date(currentYear, currentMonth - 1, day);
                        highlightCell(cell, cellDate);
                        day++;
                    } else {
                        cell.textContent = "";
                    }

                    row.appendChild(cell);
                }
                calendarBody.appendChild(row);
            }
            calendar.appendChild(calendarBody);
        }

        function highlightCell(cell, cellDate) {
            // Highlight Today's date
            const today = new Date().setHours(0, 0, 0, 0);
            if (cellDate.toDateString() === new Date(today).toDateString()) {
                cell.style.backgroundColor = "#DFF6FF";
            }

            // Highlight the cell if there is an event on that day
            const cellDayEvents = eventList.filter(event => {
                const startDate = new Date(event.start_time);
                startDate.setHours(0, 0, 0, 0);
                const endDate = new Date(event.end_time);
                endDate.setHours(0, 0, 0, 0);
                return cellDate >= startDate && cellDate <= endDate;
            });

            if (cellDayEvents.length > 0) {
                // Add color dots to the cell
                const dotContainer = document.createElement('div');
                dotContainer.classList.add('flex', 'flex-row', 'gap-2');
                cell.appendChild(dotContainer);
                cellDayEvents.forEach(event => {
                    const colorDot = document.createElement('div');
                    colorDot.style.width = "10px";
                    colorDot.style.height = "10px";
                    colorDot.style.borderRadius = "50%";
                    colorDot.style.margin = "2px";
                    switch (event.scope.split('_')[0]) {
                        case 'GROUP':
                            colorDot.classList.add('group-event');
                            break;
                        case 'USER':
                            colorDot.classList.add('user-event');
                            break;
                        case 'GLOBAL':
                            colorDot.classList.add('global-event');
                            break;
                        case 'SUPERVISORS':
                            colorDot.classList.add('supervisors-event');
                            break;
                        case 'EXAMINERS':
                            colorDot.classList.add('examiners-event');
                            break;
                        case 'STUDENTS':
                            colorDot.classList.add('students-event');
                            break;
                        default:
                            colorDot.classList.add('global-event');
                            break;
                    }
                    dotContainer.appendChild(colorDot);
                });
                cell.addEventListener('click', function () {
                    showEventPopup(cellDayEvents);
                });
            }
        }

        document.getElementById('eventCreationBtn').addEventListener('click', function () {
            document.getElementById('eventCreationPopup').classList.remove('hidden');
        });
        document.getElementById('closeEventCreationPopup').addEventListener('click', function () {
            document.getElementById('eventCreationPopup').classList.add('hidden');
        });

        // update form
        document.querySelectorAll('[id^="eventUpdateBtn"]').forEach(button => {
            button.addEventListener('click', function () {
                const eventId = this.getAttribute('data-event-id');
                console.log(`Event ID: ${eventId}`);
                // This will trigger the popup to open
                document.getElementById('eventUpdatePopup').classList.remove('hidden');
            });
        });

        // Close popup functionality
        document.getElementById('closeEventUpdatePopup').addEventListener('click', function () {
            document.getElementById('eventUpdatePopup').classList.add('hidden');
        });


        function showEventPopup(events) {
            const popupTitle = document.getElementById('popupTitle');
            popupTitle.textContent = new Date(events[0].start_time).toLocaleString('default', { month: 'long' }) + ' ' + new Date(events[0].start_time).getDate();
            const popupEvents = document.getElementById('popupEvents');
            popupEvents.innerHTML = "";
            events.forEach(event => {
                const eventDiv = document.createElement('div');
                eventDiv.classList.add('flex', 'flex-col', 'bg-white', 'shadow', 'rounded-xl', 'p-5');
                eventDiv.innerHTML = `
                <p class="text-lg font-bold text-primary-color">${event.title}</p>
                <p class="text-secondary-color mt-5">${event.description}</p>
                <div class="flex flex-col justify-between mt-5">
                    <p>
                        <span class="font-bold">Start Time:</span> ${event.start_time}
                    </p>
                    <p>
                        <span class="font-bold">End Time:</span> ${event.end_time}
                    </p>
                </div>
                `;
                popupEvents.appendChild(eventDiv);
            });

            document.getElementById('eventPopup').classList.remove('hidden');
        }

        document.getElementById('closeEventPopup').addEventListener('click', function () {
            document.getElementById('eventPopup').classList.add('hidden');
        });

        //update event form
        // getting event data as a object and pass those to form
        function openEventUpdatePopup(eventData) {
            // Example: Fill a form field with event title
            console.log(eventData)
            document.getElementById('updatetitle').value = eventData.title;
            document.getElementById('updatedescription').value = eventData.description;
            document.getElementById('updatescope').value = eventData.scope;
            document.getElementById('updateevent_id').value = eventData.event_id;
            // Assuming eventData.start_time is in the format "2024-11-29 12:12:00"

            // constructing date requred way
            function constructDate(DateTime) {
                const datePart = DateTime[0]; // "2024-11-29"
                const timePart = DateTime[1]; // "12:12:00"
                return `${datePart}T${timePart.split(':').slice(0, 2).join(':')}`; // "2024-11-29T12:12"
            }

            // Set the value of the datetime-local input
            document.getElementById('updatestart_time').value = constructDate(eventData.start_time.split(' '));
            document.getElementById('updateend_time').value = constructDate(eventData.end_time.split(' '));


        }

        function showDeleteConfirmation(eventID) {
            document.getElementById('eventDeleteConfirmation').classList.remove('hidden');
            alert(eventID);
        }

        //!!!!!!!!!!!!!! data Validation !!!!!!!!!!!!!!!!!

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

        // Event creation data form
        document.getElementById('eventCreate').addEventListener('submit', function (event) {
            // current Time
            var now = new Date();

            var eventStart = document.getElementById("start_time").value;
            var eventEnd = document.getElementById("end_time").value;
            var eventTitle = document.getElementById("title").value;
            var eventDescription = document.getElementById("description").value;

            // Ensure meeting time is in the future (strictly greater than now)
            if (eventStart <= now || eventEnd <= now) {
                validateShowPopup('popup_validator', 'Cannot select past dates'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            } else if (eventStart >= eventEnd) {
                validateShowPopup('popup_validator', 'Event Ending date must be before Event Start Date')
                event.preventDefault(); // Prevent form submission if validation fails
            } else if (eventTitle == '') {
                validateShowPopup('popup_validator', 'Title Field cannot leave empty'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            } else if (eventDescription == '') {
                validateShowPopup('popup_validator', 'Description Field cannot leave empty'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            }

        });

        // Event update data form
        document.getElementById('eventUpdate').addEventListener('submit', function (event) {
            // current Time
            var now = new Date();

            var eventStart = document.getElementById("updatestart_time").value;
            var eventEnd = document.getElementById("updateend_time").value;
            var eventTitle = document.getElementById("updatetitle").value;
            var eventDescription = document.getElementById("updatedescription").value;

            // Ensure meeting time is in the future (strictly greater than now)
            if (eventStart <= now || eventEnd <= now) {
                validateShowPopup('popup_validator', 'Cannot select past dates'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            } else if (eventStart >= eventEnd) {
                validateShowPopup('popup_validator', 'Event Ending date must be before Event Start Date')
                event.preventDefault(); // Prevent form submission if validation fails
            } else if (eventTitle == '') {
                validateShowPopup('popup_validator', 'Title Field cannot leave empty'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            } else if (eventDescription == '') {
                validateShowPopup('popup_validator', 'Description Field cannot leave empty'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            }

        });

    // profile popup
    function openProfilePopup(){
        document.getElementById("profilePopup").classList.remove('hidden');
    }

    function closeProfilePopup(){
        document.getElementById("profilePopup").classList.add('hidden');

    }


    </script>
</body>

</html>