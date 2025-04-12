<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Settings</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
  <style>
    /* Add the provided CSS here */
  </style>
</head>

<body>
    <!-- Import Timme table Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="importTimetablePopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;" enctype="multipart/form-data">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Import Time Table</h1>
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

                <!-- Pass CS or IS as a Hidden input -->
                <input type="hidden" value="" name="importTimeTableType" id="importTimeTableType">
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
                <input type="hidden" value="" name="deleteTimeTableType" id="deleteTimeTableType">

            </div>
        </form>
    </div>

     <!-- Code Check Start Popup -->
     <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="StartCodeCheckPopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
        style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Start Code Check</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to Start Code Check?</p>
                <div class="flex justify-end gap-5">
                <button type="button"
                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    id="StartCodeCheckPopupClose">Cancel</button>
                <button type="submit" class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    name="StartCodeCheckbtn">Start</button>
                </div>

                <!-- atleast we need one input to send inside of form just saying  -->
                <input type="hidden" value="1" name="StartCodeCheck" id="StartCodeCheck">

            </div>
        </form>
    </div>

    <!-- Code Check Stop Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="EndCodeCheckPopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
        style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">End Code Check</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to End Code Check?</p>
                <div class="flex justify-end gap-5">
                <button type="button"
                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    id="EndCodeCheckPopupClose">Cancel</button>
                <button type="submit" class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    name="EndCodeCheckbtn">End</button>
                </div>
                <input type="hidden" value="0" name="EndCodeCheck" id="EndCodeCheck">

            </div>
        </form>
    </div>

    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 6]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-primary-color">System Settings</h1>
            <div class="flex flex-row items-center my-2">
            <div class="flex flex-col items-end mx-2">
                <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
            </div>
            <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;">
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-xl flex-1" style="min-width:200px;">
            <p class="text-2xl font-bold text-primary-color mt-5 my-2">Code Check Configuration</p>
            <p class="text-secondary-color text-lg mt-5 ml-2">
                Configure settings for student code submissions and reviews
            </p>
            
            <div class="bg-very-light-blue mt-4 p-5 rounded-xl flex-1">
                <p class="text-dark-blue ml-2">
                    By Enabaling this Every student gets new section for updload their work in project.
                    (This is enable when given time for project is over)
                </p>
            </div>

            <div class="flex w-full mt-5 mb-5">
                <button id=""
                    class="bg-blue rounded-lg text-center text-white text-base font-medium px-5 py-4 mx-2" onclick="openStartPopupCodeCheck()">Start Code Check
                </button>
                <button id=""
                    class="bg-red rounded-lg text-center text-white text-base font-medium px-5 py-4 mx-2" onclick="openEndPopupCodeCheck()">End Code Check
                </button>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-xl flex-1 my-5" style="min-width:200px;">

            <p class="text-2xl font-bold text-primary-color mt-5 my-2">Time Table</p>

            <div class="pb-5">
                <!-- Import Delete CS Time table -->
                <div class="flex justify-end w-full mt-4">
                    <button id="CStimeTableCreate"
                    class="bg-blue rounded-lg text-center text-white text-base font-medium px-5 py-2 mx-2" onclick="openImportPopup()">Import CS Time Table
                    </button>
                    <button id="CStimeTableDelete"
                    class="bg-red rounded-lg text-center text-white text-base font-medium px-5 py-2" onclick="openDeleteTimetablePopup()">Delete CS Time Table
                    </button>
                </div>

                <!-- Import Delete IS Time table -->
                <div class="flex justify-end w-full">
                    <button id="IStimeTableCreate"
                    class="bg-blue rounded-lg text-center text-white text-base font-medium px-5 py-2 mx-2" onclick="openImportPopup()">Import IS Time Table
                    </button>
                    <button id="IStimeTableDelete"
                    class="bg-red rounded-lg text-center text-white text-base font-medium px-5 py-2" onclick="openDeleteTimetablePopup()">Delete IS Time Table
                    </button>
                </div>
            </div>
            
                    <div class="w-full flex justify-evenly text-center bg-gray py-2 rounded-lg">
                        <button onclick="openTab('CS')" class="flex-1 mx-2 px-4 py-2 font-medium rounded-lg bg-white"
                            id="CSBtn">
                            Computer Science
                        </button>
                        <button onclick="openTab('IS')" class="flex-1 mx-2 px-4 py-2 font-medium rounded-lg"
                            id="ISBtn">
                            Information System
                        </button>
                    </div>

                    <div class="flex flex-col gap-5 my-5" id="CS">
                        <?php if (!empty($pageData['timeTable'])): ?>

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

                                        <?php foreach ($pageData['timeTable'] as $row): ?>
                                                <?php if ($row['type'] == 'CS'): ?>
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
                                                <?php endif; ?>
                                        <?php endforeach; ?>
                                <?php else: ?>
                                        <p class="text-center text-secondary-color">No Computer Science time table</p>
                                    <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col gap-5 my-5" id="IS">
                        <?php if (!empty($pageData['timeTable'])): ?>
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
                                        <?php foreach ($pageData['timeTable'] as $row): ?>
                                                <?php if ($row['type'] == 'IS'): ?>
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
                                                <?php endif; ?>
                                        <?php endforeach; ?>
                        <?php else: ?>
                                <p class="text-center text-secondary-color">No Computer Science time table</p>
                        <?php endif; ?>
                                </tbody>
                            </table>
                    </div>
        </div>


        

    <script>
        // Function to open a tab and manage visibility
        function openTab(tabName) {
            let tabList = ['CS', 'IS'];
            tabList.forEach(tab => {
                if (tab === tabName) {
                    // Show the selected tab's timetable and buttons
                    document.getElementById(tab).classList.remove('hidden');
                    document.getElementById(tab + 'Btn').classList.add('bg-white');

                    // show import button cs or is
                    document.getElementById(tab + 'timeTableCreate').classList.remove('hidden');
                    document.getElementById(tab + 'timeTableDelete').classList.remove('hidden');

                    // set value of selected type
                    document.getElementById('importTimeTableType').value = tab;
                    document.getElementById('deleteTimeTableType').value = tab;
                    console.log("type in FE :" + document.getElementById('importTimeTableType').value)
                    console.log("type in FE :" + document.getElementById('deleteTimeTableType').value)
                } else {
                    // Hide other tabs' timetable and buttons
                    document.getElementById(tab).classList.add('hidden');
                    document.getElementById(tab + 'Btn').classList.remove('bg-white');

                    // show import button cs or is
                    document.getElementById(tab + 'timeTableCreate').classList.add('hidden');
                    document.getElementById(tab + 'timeTableDelete').classList.add('hidden');
                }
            });
        }

        // Set the default active tab
        document.addEventListener('DOMContentLoaded', () => {
            openTab('CS'); // Set 'CS' as the default tab
        });

        // Popup functions
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

        // code check make sure popup start
        function openStartPopupCodeCheck() {
            document.getElementById('StartCodeCheckPopup').classList.remove('hidden');
        }

        document.getElementById('StartCodeCheckPopupClose').addEventListener('click', () => {
            document.getElementById('StartCodeCheckPopup').classList.add('hidden');
        });

        // code check make sure popup end
        function openEndPopupCodeCheck() {
            document.getElementById('EndCodeCheckPopup').classList.remove('hidden');
        }

        document.getElementById('EndCodeCheckPopupClose').addEventListener('click', () => {
            document.getElementById('EndCodeCheckPopup').classList.add('hidden');
        });
    </script>

</body>

</html>
