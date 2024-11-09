<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/coordinator_students.css">
</head>

<body>

    <!-- Delete All Confirmation Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="deleteAllGroupsPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Delete All Groups</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to delete all groups?</p>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="deleteAllGroupsPopupClose">Cancel</button>
                    <button type="submit"
                        class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="delete_all_groups">Delete</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Delete One Confirmation Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="deleteOneGroupPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Delete Group</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to delete this group?</p>
                <table class="w-full mt-5 text-left border-0">
                    <tbody>
                        <tr>
                            <td class="p-2 font-bold text-primary-color">Group Id:</td>
                            <td class="p-2" id="delete_group_id"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="deleteOneGroupPopupClose">Cancel</button>
                    <button type="submit"
                        class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="delete_one_group" id="delete_one_group">Delete</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Edit Group Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="editGroupPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Edit Group</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="project_name" class="text-lg font-bold text-primary-color">Project Name</label>
                    <input type="text" name="project_name" id="project_name"
                        class="p-2 rounded-lg border border-primary-color w-full text-black" required>
                </div>
                <div class="flex justify-end gap-5">
                    <input type="hidden" name="group_id" id="edit_group_id">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="editGroupPopupClose">Cancel</button>
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="update_group">Save</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color h-screen">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 1]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Manage Groups</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <!-- Search and Filter -->
            <form action="" method="POST" class="flex justify-evenly text-white gap-2 mt-4">
                <select name="filter" class="p-2 rounded-lg">
                    <option value="all">All</option>No Supervisor</option>
                    <option value="red">Dr. Dinuni K Fernando</option>
                    <option value="red">Dr. Chamath Keppitiyagama</option>
                    <option value="red">Dr D.A.S. Atukorale</option>
                </select>
                <input type="text" name="search" placeholder="Search by student name"
                    class="p-2 rounded-lg border border-primary-color w-full text-black">
                <button type="submit"
                    class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Search</button>
                <!-- Groups are automatically created when students submit group formation forms -->
                <!-- We have to implement a way to update co supervisors -->
          <button type="button" class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2">Export</button>
          <button type="button" class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2">Update</button>
            </form>

            <!-- Table -->
            <table class="w-full mt-5 text-center">
                <thead>
                    <tr class="text-white bg-indigo">
                        <th class="p-2">Group ID</th>
                        <th class="p-2">Project Name</th>
                        <th class="p-2">Supervisor</th>
                        <th class="p-2">Co-supervisor</th>
                        <th class="p-2">Leader</th>
                        <th class="p-2">Year</th>
                        <th class="p-2">Course</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pageData["groupList"] as $index => $group): ?>
                        <tr class="<?= $index % 2 == 0 ? "bg-white" : "bg-purple"; ?> text-sm">
                            <td class="p-2"><?= $group['group_id'] ?></td>
                            <td class="p-2"><?= $group['project_name'] ?></td>
                            <td class="p-2"><?= $group['supervisor_full_name'] ?></td>
                            <td class="p-2"><?= $group['co_supervisor_full_name'] ?></td>
                            <td class="p-2"><?= $group['leader_full_name'] ?></td>
                            <td class="p-2"><?= $group['year'] ?></td>
                            <td class="p-2"><?= $group['course'] ?></td>
                            <td class="p-2 flex gap-1 justify-center">
                                <button class="bg-blue rounded-md text-center text-white text-sm font-medium px-4 py-1"
                                    onclick='openEditGroupPopup(<?= json_encode($group) ?>)'>Edit</button>
                                <button class="bg-red rounded-md text-center text-white text-sm font-medium px-4 py-1"
                                    onclick='openDeleteOneGroupPopup(<?= json_encode($group) ?>)'>Delete</button>

                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script>
        function openDeleteAllGroupsPopup() {
            document.getElementById('deleteAllGroupsPopup').classList.remove('hidden');
        }
        document.getElementById('deleteAllGroupsPopupClose').addEventListener('click', () => {
            document.getElementById('deleteAllGroupsPopup').classList.add('hidden');
        });

        function openDeleteOneGroupPopup(group) {
            document.getElementById('delete_group_id').innerText = group.group_id;
            document.getElementById('deleteOneGroupPopup').classList.remove('hidden');
        }
        document.getElementById('deleteOneGroupPopupClose').addEventListener('click', () => {
            document.getElementById('deleteOneGroupPopup').classList.add('hidden');
        });

        function openEditGroupPopup(group) {
            document.getElementById('edit_group_id').value = group.group_id;
            document.getElementById('project_name').value = group.project_name;
            document.getElementById('editGroupPopup').classList.remove('hidden');
        }
        document.getElementById('editGroupPopupClose').addEventListener('click', () => {
            document.getElementById('editGroupPopup').classList.add('hidden');
        });
    </script>
</body>

</html>