<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Timetable</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
  <style>
    /* Add the provided CSS here */
  </style>
</head>

<body>
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 6]) ?>
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
            <button id="timeTableCreate"
            class="bg-blue rounded-lg text-center text-white text-base font-medium px-5 py-2 mx-2">Import Time Table
            </button>
            <button id="timeTableDelete"
            class="bg-red rounded-lg text-center text-white text-base font-medium px-5 py-2">Delete Time Table
            </button>
        </div>

        <table class="w-full mt-5 text-center shadow-xl">
            <thead>
                <tr class="text-white bg-indigo">
                    <th class="p-4 w-20/1">Time</th>
                    <th class="p-4 w-16/1">Monday</th>
                    <th class="p-4 w-16/1">Tuesday</th>
                    <th class="p-4 w-16/1">Wednsday</th>
                    <th class="p-4 w-16/1">Thursday</th>
                    <th class="p-4 w-16/1">Friday</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-white bg-white">
                    <td class="p-4 text-primary-color">8 - 10</td>
                    <td class="p-4 text-primary-color">Monday</td>
                    <td class="p-4 text-primary-color">Tuesday</td>
                    <td class="p-4 text-primary-color">Wednesday</td>
                    <td class="p-4 text-primary-color">Thursday</td>
                    <td class="p-4 text-primary-color">Friday</td>
                </tr>
                <tr class="text-white bg-purple">
                    <td class="p-4 text-primary-color">10 - 12</td>
                    <td class="p-4 text-primary-color">Monday</td>
                    <td class="p-4 text-primary-color">Tuesday</td>
                    <td class="p-4 text-primary-color">Wednesday</td>
                    <td class="p-4 text-primary-color">Thursday</td>
                    <td class="p-4 text-primary-color">Friday</td>
                </tr>
                <tr class="text-white bg-white">
                    <td class="p-4 text-primary-color">12 - 1</td>
                    <td class="p-4 text-primary-color" colspan="5">Interval</td>
                </tr>
                <tr class="text-white bg-purple">
                    <td class="p-4 text-primary-color">1 - 3</td>
                    <td class="p-4 text-primary-color">Monday</td>
                    <td class="p-4 text-primary-color">Tuesday</td>
                    <td class="p-4 text-primary-color">Wednesday</td>
                    <td class="p-4 text-primary-color">Thursday</td>
                    <td class="p-4 text-primary-color">Friday</td>
                </tr>
                <tr class="text-white bg-white">
                    <td class="p-4 text-primary-color">3 - 5</td>
                    <td class="p-4 text-primary-color">Monday</td>
                    <td class="p-4 text-primary-color">Tuesday</td>
                    <td class="p-4 text-primary-color">Wednesday</td>
                    <td class="p-4 text-primary-color">Thursday</td>
                    <td class="p-4 text-primary-color">Friday</td>
                </tr>
            </tbody>


        </table>
    </div>
</body>

</html>
