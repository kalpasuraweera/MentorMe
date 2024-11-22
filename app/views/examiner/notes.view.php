<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Note Creation -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="noteCreationPopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Add New Note</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="group_id" value="<?= $pageData['groupDetails']['group_id'] ?>">
                <div class="flex flex-col gap-2">
                    <label for="note" class="text-lg font-bold text-primary-color">Note</label>
                    <textarea name="note" id="note" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeNoteCreationPopup">Cancel</button>
                    <button type="submit"
                        class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="add_note">Create</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Edit Note -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="editNotePopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Edit Note -
                    <span class="text-secondary-color" id="editNoteDate"></span>
                </h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="note_id" id="editNoteId">
                <input type="hidden" name="group_id" value="<?= $pageData['groupDetails']['group_id'] ?>">
                <div class="flex flex-col gap-2">
                    <label for="editNoteNote" class="text-lg font-bold text-primary-color">Note</label>
                    <textarea name="note" id="editNoteNote"
                        class="border border-primary-color rounded-xl p-2" rows="5"></textarea>
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeEditNotePopup">Cancel</button>
                    <button type="submit"
                        class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="edit_note">Update</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Delete Note -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="deleteNotePopup">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Delete Note</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="note_id" id="deleteNoteId">
                <input type="hidden" name="group_id" value="<?= $pageData['groupDetails']['group_id'] ?>">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to delete this note?</p>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeDeleteNotePopup">Cancel</button>
                    <button type="submit"
                        class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="delete_note">Delete</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 2]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">
                    Private Notes (
                    Group
                    <?= $pageData['groupDetails']['group_id'] . ' - ' . $pageData['groupDetails']['project_name'] ?>
                    )
                </h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex justify-end">
                    <button class="bg-blue rounded-lg text-center text-white text-base font-medium px-10 py-2"
                        id="createNote">Create
                        Note</button>
                </div>
                <?php foreach ($pageData['noteList'] as $note): ?>
                    <div class="flex flex-col bg-white shadow rounded-xl p-5">
                        <p class="text-lg font-bold text-primary-color">
                            <?= date('d F Y', strtotime($note['created_at'])) ?>
                        </p>
                        <p class="text-secondary-color mt-5">
                            <?= $note['note'] ?>
                        </p>
                        <div class="flex justify-end mt-5 gap-5">
                            <button
                                onclick="openEditNotePopup(<?= $note['note_id'] ?>, '<?= $note['note'] ?>', '<?= date('d F Y', strtotime($note['created_at'])) ?>')"
                                class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Edit</button>
                            <button onclick="openDeleteNotePopup(<?= $note['note_id'] ?>)"
                                class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2">Delete</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <script>
            document.getElementById('createNote').addEventListener('click', function () {
                document.getElementById('noteCreationPopup').classList.remove('hidden');
            });

            document.getElementById('closeNoteCreationPopup').addEventListener('click', function () {
                document.getElementById('noteCreationPopup').classList.add('hidden');
            });

            document.getElementById('closeEditNotePopup').addEventListener('click', function () {
                document.getElementById('editNotePopup').classList.add('hidden');
            });

            document.getElementById('closeDeleteNotePopup').addEventListener('click', function () {
                document.getElementById('deleteNotePopup').classList.add('hidden');
            });

            function openEditNotePopup(noteId, note, date) {
                document.getElementById('editNoteId').value = noteId;
                document.getElementById('editNoteNote').value = note;
                document.getElementById('editNoteDate').innerText = date;
                document.getElementById('editNotePopup').classList.remove('hidden');
            }

            function openDeleteNotePopup(noteId) {
                document.getElementById('deleteNoteId').value = noteId;
                document.getElementById('deleteNotePopup').classList.remove('hidden');
            }
        </script>
</body>

</html>