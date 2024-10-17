<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- When user has a Pending request he can't come to this page. With that we can prevent multiple requests -->
    <!-- Request Model -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="requestModel">
        <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
            style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-primary-color">Request Supervisor</h1>
                <img src="<?= BASE_URL ?>/public/images/icons/close.png" alt="close icon" class="closeRequestModel">
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
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Request</button>
                    <button
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2 closeRequestModel">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 5]) ?>
        <div class="flex flex-col w-3/4 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Request Supervisor</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
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
                                <p class='text-black font-bold mt-5'>Expected Teams: " . $supervisor['expected_projects'] . "</p>
                                <p class='text-black font-bold mt-5'>Accepted Teams: " . $supervisor['current_projects'] . "</p>
                                <p class='text-black font-bold mt-5'>Applied Teams: " . $supervisor['expected_projects'] . "</p>
                                <p class='text-black font-bold mt-5'>Rejected Teams: " . $supervisor['expected_projects'] . "</p>
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

        <script>
            // Add event listener to all elements with class 'closeRequestModel'
            Array.from(document.getElementsByClassName('closeRequestModel')).forEach(element => {
                element.addEventListener('click', () => {
                    document.getElementById('requestModel').classList.add('hidden');
                });
            });

            // Add event listener to all elements with class 'requestBtn'
            Array.from(document.getElementsByClassName('requestBtn')).forEach(element => {
                element.addEventListener('click', () => {
                    document.getElementById("supervisor_id").value = element.value;
                    document.getElementById('requestModel').classList.remove('hidden');
                });
            });
        </script>
</body>

</html>