<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Profile popup -->
    <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="profilePopup">
        <div class="bg-white p-5 rounded-md" style="max-width: 800px;max-height:90vh;">
            <div class="flex items-center">
                <div class="flex">

                <div class="bg-blue rounded-md flex flex-col items-center py-9 px-6">
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon"
                        class="rounded-full"
                        style="height: 70px; width: 70px; object-fit: cover;">
                    <div class="text-white font-medium text-center mt-5 mx-5">
                        <div class="mb-2">Student</div>
                        <div><?= $_SESSION['user']['full_name'] ?></div>
                    </div>
                </div>
                
                    <div class="border-black ml-5 rounded-md">
                        <form action="">
                            <div class="mx-5">
                                <div class="mt-5 text">Name : <input type="text" class="border border-primary-color rounded-md p-2" value="<?= $_SESSION['user']['full_name'] ?>"></div>
                            </div>

                            <div class="mx-5">
                                <div class="mt-5 text">E-mail : <input type="text" class="border border-primary-color rounded-md p-2" value="<?= $_SESSION['user']['email'] ?>"></div>
                            </div>

                            <div class="mx-5">
                                <div class="flex mt-5 items-center">Registration number : 
                                    <div class="border border-primary-color rounded-md p-2 ml-2">
                                        <?= $pageData['student'][0]['registration_number'] ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-5 mb-2">
                                <div class="flex mt-5 items-center">Index number : 
                                    <div class="border border-primary-color rounded-md p-2 ml-2">
                                        <?= $pageData['student'][0]['index_number'] ?>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="flex justify-end gap-5 mt-2">
                <button type="button"
                        name="updateProfile"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">
                        Update
                </button>
                    <button type="button"
                        class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="closeProfilePopup" onclick="closeProfilePopup()">
                        Close
                </button>
            </div>
        </div>
            
    </div>

    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 3]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Supervisor and Examiner Feedbacks</h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;" onclick="openProfilePopup()">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <?php if (empty($pageData['groupFeedbacks'])): ?>
                        <p class="text-center text-secondary-color">No feedbacks found</p>
                <?php endif; ?>
                <?php foreach ($pageData['groupFeedbacks'] as $feedback): ?>
                        <div class="flex flex-col bg-white shadow-lg rounded-xl p-5 mb-4">
                            <div class="flex items-center mb-4">
                                <div class="flex-shrink-0">
                                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $feedback['profile_picture'] ?>"
                            alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;">
                                </div>
                                <div class="ml-4">
                                    <p class="text-lg font-bold text-primary-color">
                                        <?= $feedback['full_name'] ?> <span
                                            class="text-sm text-gray-500">(<?= $feedback['type'] ?>)</span>
                                    </p>
                                    <p class="text-sm text-gray">
                                        <?= date('d F Y', strtotime($feedback['created_at'])) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="border-t border-gray pt-4">
                                <p class="text-secondary-color">
                                    <?= $feedback['feedback'] ?>
                                </p>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
            function openProfilePopup(){
                document.getElementById("profilePopup").classList.remove('hidden');
            }

            function closeProfilePopup(){
                document.getElementById("profilePopup").classList.add('hidden');

            }

        </script>
</body>

</html>