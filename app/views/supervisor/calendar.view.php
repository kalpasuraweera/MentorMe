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
        <form action="" id="create_event" method="post" class="bg-white p-5 rounded-md w-full"
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
                        <?php foreach ($pageData['groupList'] as $group): ?>
                            <option value="GROUP_<?= $group['group_id'] ?>">
                                Group <?= $group['group_id'] . ' - ' . $group['project_name'] ?></option>
                        <?php endforeach; ?>
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

    <!-- Event Updation form -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="eventUpdatePopup">
        <form action="" id="update_event" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <input type="hidden" name="update_event_id" id="update_event_id">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Update Event</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="title" class="text-lg font-bold text-primary-color">Event Title</label>
                    <input type="text" name="updatetitle" id="updatetitle" class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="description" class="text-lg font-bold text-primary-color">Description</label>
                    <textarea name="updatedescription" id="updatedescription" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="scope" class="text-lg font-bold text-primary-color">Scope</label>
                    <select name="updatescope" id="updatescope" class="border border-primary-color rounded-xl p-2">
                        <option value="USER_<?= $_SESSION['user']['user_id'] ?>">Personal</option>
                        <?php foreach ($pageData['groupList'] as $group): ?>
                            <option value="GROUP_<?= $group['group_id'] ?>">
                                Group <?= $group['group_id'] . ' - ' . $group['project_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="start_time" class="text-lg font-bold text-primary-color">Start Time</label>
                    <input type="datetime-local" name="update_start_time" id="update_start_time"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="end_time" class="text-lg font-bold text-primary-color">End Time</label>
                    <input type="datetime-local" name="update_end_time" id="update_end_time"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
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
        <?php $this->renderComponent('sideBar', ['activeIndex' => 3]) ?>
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
                        <p class="text-lg font-bold text-primary-color"><?= $event['title'] ?></p>
                        <p class="text-secondary-color mt-5"><?= $event['description'] ?></p>
                        <!-- start and end time -->
                        <div class="flex flex-col justify-between mt-5">
                            <p>
                                <span class="font-bold">Start Time:</span> <?= $event['start_time'] ?>
                            </p>
                            <p>
                                <span class="font-bold">End Time:</span> <?= $event['end_time'] ?>
                            </p>
                        </div>
                        <?php if ($event['creator_id'] == $_SESSION['user']['user_id']): ?>
                            <div class="flex justify-end mt-5 gap-5">
                                <!-- this is passing data objectt in data-event -->
                                <!-- instead of id i use class since it doesnt need to be unique -->
                                <button class="eventUpdateBtn btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    data-event='<?= json_encode($event) ?>'>
                                    Edit
                                </button>

                                <!-- delete event form -->
                                <form id="deleteEvent" name="deleteEvent" method="post">
                                    <input type="hidden" name="eventId" id="eventId" value='<?= json_encode($event) ?>'>
                                    <button
                                        type="submit"
                                        name="delete_event"
                                        class="eventDeleteBtn btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
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

        document.addEventListener('click', function (event) {
            // update button
            if (event.target.classList.contains('eventUpdateBtn')) {
                let eventData = JSON.parse(event.target.dataset.event);
                // console.log(eventData);
                // Populate update form
                document.getElementById('updatetitle').value = eventData.title;
                document.getElementById('updatedescription').value = eventData.description;
                document.getElementById('updatescope').value = eventData.scope;
                document.getElementById('update_start_time').value = eventData.start_time;
                document.getElementById('update_end_time').value = eventData.end_time;
                document.getElementById('update_event_id').value = eventData.event_id;

                document.getElementById('eventUpdatePopup').classList.remove('hidden');
            }
        });

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

        document.getElementById("create_event").addEventListener('submit', function(event) {
            var title = document.getElementById("title").value;
            var description = document.getElementById("description").value;
            var scope = document.getElementById("scope").value            
            var start_time = document.getElementById("start_time").value
            var end_time = document.getElementById("end_time").value
            var start_time_o = new Date(start_time);
            var end_time_o = new Date(end_time);
            var now = new Date();


            if(title == '' || description == '' || scope == '' || start_time == '' || end_time == '') {
                validateShowPopup('popup_validator', 'Field cannot leave empty'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            }

            // Ensure meeting time is in the future (strictly greater than now)
            if (start_time_o>=end_time_o) {
                validateShowPopup('popup_validator', 'Ending Date should be greater than start date'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            }

            if (start_time_o<now) {
                validateShowPopup('popup_validator', 'Start date cannot be past'); // Show popup when invalid date is selected
                event.preventDefault(); // Prevent form submission if validation fails
            }
        
        });
    </script>
</body>

</html>