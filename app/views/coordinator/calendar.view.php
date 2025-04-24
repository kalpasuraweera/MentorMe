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
    <!-- Event Creation -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="eventCreationPopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Create New Event</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="title" class="text-lg font-bold text-primary-color">Event Title</label>
                    <input type="text" name="title" id="title" class="border border-primary-color rounded-xl p-2"
                        required />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="description" class="text-lg font-bold text-primary-color">Description</label>
                    <textarea name="description" id="description" class="border border-primary-color rounded-xl p-2"
                        required rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="scope" class="text-lg font-bold text-primary-color">Scope</label>
                    <select name="scope" id="scope" class="border border-primary-color rounded-xl p-2">
                        <option value="USER_<?= $_SESSION['user']['user_id'] ?>">Personal</option>
                        <option value="GLOBAL">Global</option>
                        <option value="SUPERVISORS">Supervisors</option>
                        <option value="EXAMINERS">Examiners</option>
                        <option value="STUDENTS">Students</option>
                        <option value="GROUP">A Group</option>
                        <option value="USER">A User</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="start_time" class="text-lg font-bold text-primary-color">Start Time</label>
                    <input type="datetime-local" name="start_time" id="start_time" required
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="end_time" class="text-lg font-bold text-primary-color">End Time</label>
                    <input type="datetime-local" name="end_time" id="end_time" required
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

    <!-- Edit Event Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="editEventPopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Edit Event</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="event_id" id="edit_event_id">
                <div class="flex flex-col gap-2">
                    <label for="edit_title" class="text-lg font-bold text-primary-color">Event Title</label>
                    <input type="text" name="title" id="edit_title"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="edit_description" class="text-lg font-bold text-primary-color">Description</label>
                    <textarea name="description" id="edit_description"
                        class="border border-primary-color rounded-xl p-2" rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="edit_scope" class="text-lg font-bold text-primary-color">Scope</label>
                    <select name="scope" id="edit_scope" class="border border-primary-color rounded-xl p-2">
                        <option value="USER_<?= $_SESSION['user']['user_id'] ?>">Personal</option>
                        <option value="GLOBAL">Global</option>
                        <option value="SUPERVISORS">Supervisors</option>
                        <option value="EXAMINERS">Examiners</option>
                        <option value="STUDENTS">Students</option>
                        <option value="GROUP">A Group</option>
                        <option value="USER">A User</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="edit_start_time" class="text-lg font-bold text-primary-color">Start Time</label>
                    <input type="datetime-local" name="start_time" id="edit_start_time"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="edit_end_time" class="text-lg font-bold text-primary-color">End Time</label>
                    <input type="datetime-local" name="end_time" id="edit_end_time"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeEditEventPopup">Cancel</button>
                    <button type="submit"
                        class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="edit_event">Save</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Delete Confirmation Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="deleteConfirmationPopup">
        <div class="bg-white p-5 rounded-md w-full" style="max-width: 400px;">
            <h1 class="text-2xl font-bold text-primary-color mb-4">Confirm Deletion</h1>
            <p class="text-secondary-color mb-4">Are you sure you want to delete this event?</p>
            <div class="flex justify-end gap-4">
                <button type="button"
                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    id="cancelDelete">Cancel</button>
                <form action="" method="post" id="deleteEventForm">
                    <input type="hidden" name="event_id" id="delete_event_id">
                    <button type="submit"
                        class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="delete_event">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showDeleteConfirmation(eventId) {
            document.getElementById('delete_event_id').value = eventId;
            document.getElementById('deleteConfirmationPopup').classList.remove('hidden');
        }

        document.getElementById('cancelDelete').addEventListener('click', function () {
            document.getElementById('deleteConfirmationPopup').classList.add('hidden');
        });

        function editEvent(event) {
            document.getElementById('edit_event_id').value = event.event_id;
            document.getElementById('edit_title').value = event.title;
            document.getElementById('edit_description').value = event.description;
            document.getElementById('edit_start_time').value = event.start_time;
            document.getElementById('edit_end_time').value = event.end_time;
            document.getElementById('edit_scope').value = event.scope;
            document.getElementById('editEventPopup').classList.remove('hidden');
        }

        document.getElementById('closeEditEventPopup').addEventListener('click', function () {
            document.getElementById('editEventPopup').classList.add('hidden');
        });
    </script>

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
        <?php $this->renderComponent('sideBar', ['activeIndex' => 7]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Calendar</h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;">
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
                                    style="width: 20px;height: 20px;object-fit: cover;"></div>
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
                            <div class="flex justify-end mt-4 gap-4">
                                <button
                                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    onclick='editEvent(<?= json_encode($event) ?>)'>Edit</button>
                                <button
                                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    onclick="showDeleteConfirmation(<?= $event['event_id'] ?>)">Delete</button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
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

        // add min for datetime-local
        document.querySelectorAll('input[type="datetime-local"]').forEach(input => {
            input.min = new Date().toISOString().slice(0, 16);
        });

        // Update end time min value when start time changes
        document.getElementById('start_time').addEventListener('change', function () {
            document.getElementById('end_time').min = this.value;
            if (document.getElementById('end_time').value < this.value) {
                document.getElementById('end_time').value = this.value;
            }
        });

        document.getElementById('edit_start_time').addEventListener('change', function () {
            document.getElementById('edit_end_time').min = this.value;
            if (document.getElementById('edit_end_time').value < this.value) {
                document.getElementById('edit_end_time').value = this.value;
            }
        });
    </script>
</body>

</html>