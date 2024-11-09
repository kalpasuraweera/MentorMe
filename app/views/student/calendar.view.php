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
    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 1]) ?>
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
                    <p class="text-primary-color font-bold text-2xl
                    ">January 2022</p>
                    <div class="flex gap-2">
                        <img src="<?= BASE_URL ?>/public/images/icons/back_icon.png" alt="left arrow">
                        <img src="<?= BASE_URL ?>/public/images/icons/forward_icon.png" alt="right arrow">
                    </div>
                </div>
                <table>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                        <td>21</td>
                        <td>22</td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <td>31</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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
        document.getElementById('eventCreationBtn').addEventListener('click', function () {
            document.getElementById('eventCreationPopup').classList.remove('hidden');
        });
        document.getElementById('closeEventCreationPopup').addEventListener('click', function () {
            document.getElementById('eventCreationPopup').classList.add('hidden');
        });
    </script>
</body>

</html>