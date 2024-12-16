<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Feedback Creation -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="feedbackCreationPopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Add New Feedback</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="group_id" value="<?= $pageData['groupDetails']['group_id'] ?>">
                <div class="flex flex-col gap-2">
                    <label for="feedback" class="text-lg font-bold text-primary-color">Feedback</label>
                    <textarea name="feedback" id="feedback" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeFeedbackCreationPopup">Cancel</button>
                    <button type="submit"
                        class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="add_feedback">Create</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Edit Feedback -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="editFeedbackPopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Edit Feedback -
                    <span class="text-secondary-color" id="editFeedbackDate"></span>
                </h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="feedback_id" id="editFeedbackId">
                <input type="hidden" name="group_id" value="<?= $pageData['groupDetails']['group_id'] ?>">
                <div class="flex flex-col gap-2">
                    <label for="editFeedbackFeedback" class="text-lg font-bold text-primary-color">Feedback</label>
                    <textarea name="feedback" id="editFeedbackFeedback"
                        class="border border-primary-color rounded-xl p-2" rows="5"></textarea>
                </div>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeEditFeedbackPopup">Cancel</button>
                    <button type="submit"
                        class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="edit_feedback">Update</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Delete Feedback -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="deleteFeedbackPopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Delete Feedback</h1>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <input type="hidden" name="feedback_id" id="deleteFeedbackId">
                <input type="hidden" name="group_id" value="<?= $pageData['groupDetails']['group_id'] ?>">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to delete this feedback?</p>
                <div class="flex justify-end gap-5">
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeDeleteFeedbackPopup">Cancel</button>
                    <button type="submit"
                        class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        name="delete_feedback">Delete</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 1]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">
                    Feedbacks (
                    Group
                    <?= $pageData['groupDetails']['group_id'] . ' - ' . $pageData['groupDetails']['project_name'] ?>
                    )
                </h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex justify-end">
                    <button class="bg-blue rounded-lg text-center text-white text-base font-medium px-10 py-2"
                        id="createFeedback">Create
                        Feedback</button>
                </div>
                <?php if (empty($pageData['feedbackList'])): ?>
                    <p class="text-center text-secondary-color">No feedbacks found</p>
                <?php endif; ?>
                <?php foreach ($pageData['feedbackList'] as $feedback): ?>
                    <div class="flex flex-col bg-white shadow rounded-xl p-5">
                        <p class="text-lg font-bold text-primary-color">
                            <?= date('d F Y', strtotime($feedback['created_at'])) ?>
                        </p>
                        <p class="text-secondary-color mt-5">
                            <?= $feedback['feedback'] ?>
                        </p>
                        <div class="flex justify-end mt-5 gap-5">
                            <button
                                onclick="openEditFeedbackPopup(<?= $feedback['feedback_id'] ?>, '<?= $feedback['feedback'] ?>', '<?= date('d M Y', strtotime($feedback['created_at'])) ?>')"
                                class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Edit</button>
                            <button onclick="openDeleteFeedbackPopup(<?= $feedback['feedback_id'] ?>)"
                                class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2">Delete</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <script>
            document.getElementById('createFeedback').addEventListener('click', function () {
                document.getElementById('feedbackCreationPopup').classList.remove('hidden');
            });

            document.getElementById('closeFeedbackCreationPopup').addEventListener('click', function () {
                document.getElementById('feedbackCreationPopup').classList.add('hidden');
            });

            document.getElementById('closeEditFeedbackPopup').addEventListener('click', function () {
                document.getElementById('editFeedbackPopup').classList.add('hidden');
            });

            document.getElementById('closeDeleteFeedbackPopup').addEventListener('click', function () {
                document.getElementById('deleteFeedbackPopup').classList.add('hidden');
            });

            function openEditFeedbackPopup(feedbackId, feedback, date) {
                document.getElementById('editFeedbackId').value = feedbackId;
                document.getElementById('editFeedbackFeedback').value = feedback;
                document.getElementById('editFeedbackDate').innerText = date;
                document.getElementById('editFeedbackPopup').classList.remove('hidden');
            }

            function openDeleteFeedbackPopup(feedbackId) {
                document.getElementById('deleteFeedbackId').value = feedbackId;
                document.getElementById('deleteFeedbackPopup').classList.remove('hidden');
            }
        </script>
</body>

</html>