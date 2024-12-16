<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- When user has a Pending request show a message. With that we can prevent multiple requests -->
    <!-- Request Popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="requestPopup">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Request Supervisor</h1>
                <img src="<?= BASE_URL ?>/public/images/icons/close.png" alt="close icon" class="closeRequestPopup">
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex flex-col gap-2">
                    <label for="project_title" class="text-lg font-bold text-primary-color">Project Title</label>
                    <input type="text" name="project_title" id="project_title"
                        class="border border-primary-color rounded-xl p-2" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="idea" class="text-lg font-bold text-primary-color">Your Idea</label>
                    <textarea name="idea" id="idea" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="reason" class="text-lg font-bold text-primary-color">Why you need me</label>
                    <textarea name="reason" id="reason" class="border border-primary-color rounded-xl p-2"
                        rows="5"></textarea>
                </div>
                <!-- Hidden input for supervisor id -->
                <input type="hidden" name="supervisor_id" id="supervisor_id">
                <div class="flex justify-end gap-5">
                    <button
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2 closeRequestPopup">Cancel</button>
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Request</button>
                </div>
            </div>
        </form>
    </div>
    <div class="flex flex-row bg-primary-color" style="min-height:100vh;">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 4]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Request Supervisor</h1>
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
                <?php if (empty($pageData['supervisors'])): ?>
                    <p class="text-center text-secondary-color">
                        You can't request any supervisor at the moment. Please try again later.
                    </p>
                <?php else: ?>
                    <?php
                    // render supervisor list
                    foreach ($pageData['supervisors'] as $supervisor) {
                        $supervisorCard = "
                        <div class='flex flex-col bg-white shadow rounded-xl p-5'>
                            <p class='text-lg font-bold text-primary-color'>" . $supervisor['full_name'] . "</p>
                            <p class='text-secondary-color'>" . $supervisor['email'] . "</p>
                            <div class='mt-5'>
                                <p class='text-black font-bold'>Background:</p>
                                <p class='text-secondary-color'>" . $supervisor['description'] . "</p>
                                <p class='text-black font-bold mt-5'>Expected Projects: " . $supervisor['expected_projects'] . "</p>
                                <p class='text-black font-bold mt-5'>Accepted Teams: " . $supervisor['current_projects'] . "</p>
                                <p class='text-black font-bold mt-5'>Available Slots: " . ($supervisor['expected_projects'] - $supervisor['current_projects']) . "</p>
                            </div>
                            <div class='flex justify-end mt-5 gap-5'>
                                <button class='btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2 requestBtn' value='" . $supervisor['user_id'] . "'>Request</button>
                            </div>
                        </div>";
                        echo $supervisorCard;
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <script>
            // Add event listener to all elements with class 'closeRequestPopup'
            Array.from(document.getElementsByClassName('closeRequestPopup')).forEach(element => {
                element.addEventListener('click', () => {
                    document.getElementById('requestPopup').classList.add('hidden');
                });
            });

            // Add event listener to all elements with class 'requestBtn'
            Array.from(document.getElementsByClassName('requestBtn')).forEach(element => {
                element.addEventListener('click', () => {
                    // Scroll to top of the page
                    window.scrollTo(0, 0);
                    document.getElementById("supervisor_id").value = element.value;
                    document.getElementById('requestPopup').classList.remove('hidden');
                });
            });
        </script>
</body>

</html>