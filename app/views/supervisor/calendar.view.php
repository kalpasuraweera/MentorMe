<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/supervisor_calendar.css">
</head>

<body>
    <!-- Event Creation -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="eventCreationPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
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
                        <?php foreach ($pageData['groupList'] as $group): ?>
                            <option value="GROUP_<?= $group['group_id'] ?>">
                                Group <?= $group['group_id'] . ' - ' . $group['project_name'] ?></option>
                        <?php endforeach; ?>
                        <option value="USER_1">A User</option>
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

    <!-- Event Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="eventPopup">
        <div class="bg-white shadow p-5 rounded-md w-full" style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">
                    2022-01-09 - Events
                </h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <!-- Events -->
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Event Title</p>
                    <p class="text-secondary-color mt-5">Description</p>
                    <div class="flex flex-col justify-between mt-5">
                        <p>
                            <span class="font-bold">Start Time:</span> 2022-01-09 08:00:00
                        </p>
                        <p>
                            <span class="font-bold">End Time:</span> 2022-01-09 10:00:00
                        </p>
                    </div>
                </div>
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Event Title</p>
                    <p class="text-secondary-color mt-5">Description</p>
                    <div class="flex flex-col justify-between mt-5">
                        <p>
                            <span class="font-bold">Start Time:</span> 2022-01-09 08:00:00
                        </p>
                        <p>
                            <span class="font-bold">End Time:</span> 2022-01-09 10:00:00
                        </p>
                    </div>
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeEventPopup">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 3]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Calendar</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>

            <!-- Event Creation -->
            <div class="flex justify-end w-full mt-4">
                <button id="eventCreationBtn"
                    class="bg-blue rounded-3xl text-center text-white text-base font-medium px-5 py-2">Create
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
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex justify-between items-center">
                    <p class="text-primary-color font-bold text-2xl">Upcoming Events</p>
                    <p class="text-primary-color font-bold">View All</p>
                </div>
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
                                <button
                                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Edit</button>
                                <button
                                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Delete</button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        const eventList = <?= json_encode($pageData['eventList']) ?>;
        console.log('====================================');
        console.log(eventList);
        console.log('====================================');

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

            // Data for the current month
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
                        $cellDate = new Date(new Date().getFullYear(), new Date().getMonth(), day);
                        if ($cellDate.toDateString() == new Date().toDateString()) {
                            cell.style.backgroundColor = "#DFF6FF";
                        }

                        // Highlight the cell if there is an event on that day
                        // eventList.forEach(event => {
                        //     const startDate = new Date(event.start_date);
                        //     const endDate = new Date(event.end_date);
                        //     if (cellDate >= startDate && cellDate <= endDate) {
                        //         cell.style.backgroundColor = "#FFD700";
                        //     }
                        // });

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
            const currentYear = new Date(calendarTitle.textContent).getFullYear();
            const nextMonth = new Date(currentYear, currentMonth + 1).toLocaleString('default', { month: 'long' }) + ' ' + currentYear;
            if (currentMonth === 11) {
                calendarTitle.textContent = new Date(currentYear + 1, 0).toLocaleString('default', { month: 'long' }) + ' ' + (currentYear + 1);
            } else {
                calendarTitle.textContent = nextMonth;
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
                        cell.textContent = day;
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
            const currentYear = new Date(calendarTitle.textContent).getFullYear();
            const previousMonth = new Date(currentYear, currentMonth - 1).toLocaleString('default', { month: 'long' }) + ' ' + currentYear;
            if (currentMonth === 0) {
                calendarTitle.textContent = new Date(currentYear - 1, 11).toLocaleString('default', { month: 'long' }) + ' ' + (currentYear - 1);
            } else {
                calendarTitle.textContent = previousMonth;
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
                        cell.textContent = day;
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

        document.getElementById('eventCreationBtn').addEventListener('click', function () {
            document.getElementById('eventCreationPopup').classList.remove('hidden');
        });
        document.getElementById('closeEventCreationPopup').addEventListener('click', function () {
            document.getElementById('eventCreationPopup').classList.add('hidden');
        });

        function showEventPopup(events) {
            document.getElementById('eventPopup').classList.remove('hidden');
        }

        document.getElementById('closeEventPopup').addEventListener('click', function () {
            document.getElementById('eventPopup').classList.add('hidden');
        });




    </script>
</body>

</html>