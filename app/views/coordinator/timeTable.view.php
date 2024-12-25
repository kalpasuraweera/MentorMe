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
    <!-- Import Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="importTimetablePopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;" enctype="multipart/form-data">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Import Students</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                <label for="csv_file" class="text-lg font-bold text-primary-color">Data File</label>
                <input type="file" name="csv_file" id="csv_file" class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex justify-end gap-5">
                <button type="button"
                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    id="importTimetablePopupClose">Cancel</button>
                <button type="submit"
                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    name="import_timetable">Import</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Delete All Confirmation Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="deleteTimetablePopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
        style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-primary-color">Delete Time Table</h1>
        </div>
        <div class="flex flex-col gap-5 my-5">
            <p class="text-lg font-bold text-primary-color">Are you sure you want to delete Time Table?</p>
            <div class="flex justify-end gap-5">
            <button type="button"
                class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                id="deleteTimetablePopupClose">Cancel</button>
            <button type="submit" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                name="delete_timetable">Delete</button>
            </div>
        </div>
        </form>
    </div>

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
            class="bg-blue rounded-lg text-center text-white text-base font-medium px-5 py-2 mx-2" onclick="openImportPopup()">Import Time Table
            </button>
            <button id="timeTableDelete"
            class="bg-red rounded-lg text-center text-white text-base font-medium px-5 py-2" onclick="openDeleteTimetablePopup()">Delete Time Table
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

                <?php if (!empty($pageData['timeTable'])): ?>
                    <?php foreach ($pageData['timeTable'] as $row): ?>
                        <?php if ($row['monday'] == 'Lunch Break'): ?> 
                            <tr class="<?= $row['id'] % 2 == 0 ? "bg-white" : "bg-purple"; ?>" >
                                <td class="p-4 text-primary-color"><?= $row['time_slot'] ?></td>
                                <td class="p-4 text-primary-color" colspan="5"><?= $row['monday'] ?></td>
                            </tr>
                        <?php else: ?>
                            <tr class="<?= $row['id'] % 2 == 0 ? "bg-white" : "bg-purple"; ?>" >
                                <td class="p-4 text-primary-color"><?= $row['time_slot'] ?></td>
                                <td class="p-4 text-primary-color"><?= $row['monday'] ?></td>
                                <td class="p-4 text-primary-color"><?= $row['tuesday'] ?></td>
                                <td class="p-4 text-primary-color"><?= $row['wednesday'] ?></td>
                                <td class="p-4 text-primary-color"><?= $row['thursday'] ?></td>
                                <td class="p-4 text-primary-color"><?= $row['friday'] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="task-description">No Time table </p>
                <?php endif; ?>

                




            </tbody>


        </table>
    </div>

    <script>
        function openImportPopup() {
            document.getElementById('importTimetablePopup').classList.remove('hidden');
        }
            
        document.getElementById('importTimetablePopupClose').addEventListener('click', () => {
            document.getElementById('importTimetablePopup').classList.add('hidden');
        });

        function openDeleteTimetablePopup() {
            document.getElementById('deleteTimetablePopup').classList.remove('hidden');
        }
        
        document.getElementById('deleteTimetablePopupClose').addEventListener('click', () => {
            document.getElementById('deleteTimetablePopup').classList.add('hidden');
            });
    </script>
</body>

</html>
