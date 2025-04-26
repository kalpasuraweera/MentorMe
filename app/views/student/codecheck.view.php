<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Submit Code Check Confirmation Popup -->
    <!-- <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
        style="background-color: rgba(0, 0, 0, 0.7);" id="submitCodeCheckForm">
        <form action="" method="post" class="bg-white p-5 rounded-md w-full"
        style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
            <div class="flex flex-col gap-5 my-5">
                <p class="text-lg font-bold text-primary-color">Are you sure you want to Submit Code Check?</p>
                <div class="flex justify-end gap-5">
                <button type="button"
                    class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    id="submitCodeCheckPopupClose">Cancel</button>
                <button type="submit" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                    name="submitCodeCheck">Submit</button>
                </div>
                <input type="hidden" value="" name="submitFrom" id="deleteTimeTableType">

            </div>
        </form>
    </div> -->

    <!-- Main Content -->
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => ($_SESSION['user']['role'] === 'STUDENT_LEADER') ? 6 : 5]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <p class="text-3xl font-bold text-primary-color">Code Check</p>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;">
                </div>
            </div>
            <div class="flex flex-col border-box p-5 pb-10 bg-white shadow rounded-xl mt-5">

                <div class="flex justify-between">
                    <p class="text-2xl text-dark-blue font-bold">Submit Your Project</p>

                    <!-- Submission deadline ADD  -->
                    <!-- <p class="text-primary-color mt-5 mb-2 text-lg">deadline </p> -->

                    <?php if ($_SESSION['user']['gitlink'] == '') {?>
                        <div class="bg-light-red rounded-xl py-2 px-5">
                        <p class="text-white">Pending</p>
                    </div>  
                    <?php } else {?>
                        <div class="bg-green rounded-xl py-2 px-5">
                        <p class="text-white">Submitted</p>
                    </div>
                    <?php } ?>
                </div>

                <div>
                    <form action="" method="POST" id="codecheckform">
                        <p class="text-primary-color mt-5 mb-2 text-lg">Git Link</p>
                        
                        <textarea name="gitlink" id="gitlink"
                            placeholder="https://github.com/johndoe/student-project-management"
                            style="width: 100%; padding: 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 12px; resize: vertical; box-sizing: border-box;"><?= $_SESSION['user']['gitlink'] ?></textarea>

                        <p class="text-primary-color mt-5 mb-2 text-lg">Assumption</p>
                        <textarea name="assumption" id="assumption"
                            placeholder="Any assumption that you made during project"
                            style="width: 100%; padding: 12px; font-size: 16px; border: 1px solid #ccc; border-radius: 12px; resize: vertical; box-sizing: border-box;"><?= $_SESSION['user']['assumption'] ?></textarea>


                        <div class="flex justify-end mt-5 py-2">

                            <?php if ($_SESSION['user']['gitlink'] == '') {?>
                                <button type="submit" class="bg-blue rounded-2xl text-center text-white text-base font-medium px-10 p-2" name="submitCodeCheck">
                                    Submit
                                </button>
                            </div>  
                            <?php } else {?>
                                <button type="submit" class="bg-green rounded-2xl text-center text-white text-base font-medium px-10 p-2" name="submitCodeCheck">
                                    Update
                                </button>
                            <?php } ?>                        
                        </div>

                    </form> 
                </div>
                
            </div>
        </div>
        <!-- Validator popup -->
        <?php
            $this->renderComponent('validator', [
                'id' => 'popup_validator',
                'bg' => '#F44336',
                'message' => 'Form submiting error'
            ]);
        ?>
    </div>
    <script>
        // function opensubmitconfirmpopup() 
        // {
        //     document.getElementById('submitCodeCheckForm').classList.remove('hidden');
        // }

        // document.getElementById('submitCodeCheckPopupClose').addEventListener('click', () => {
        //     document.getElementById('submitCodeCheckForm').classList.add('hidden');
        // });


        // data Validation !!!!!!!!!!!!!!!!!
        // function validateShowPopup(popupId, message) {
        //     var popup = document.getElementById(popupId);
        //     if (popup) {
        //         // change message dynamically
        //         popup.innerHTML = message;

        //         popup.style.opacity = '1';
        //         popup.style.visibility = 'visible';

        //         setTimeout(() => {
        //             popup.style.opacity = '0';
        //             setTimeout(() => { popup.style.visibility = 'hidden'; }, 500);
        //         }, 3000);
        //     }
        // }

        
        // document.getElementById("codecheckform").addEventListener('submit', function(event) {
        //     var gitlink = document.getElementById("gitlink").value;
        //     var assumption = document.getElementById("assumption").value;

        
        //     if(assumption == '') {
        //         validateShowPopup('popup_validator', 'Field cannot leave empty'); // Show popup when invalid date is selected
        //         event.preventDefault(); // Prevent form submission if validation fails
        //     }
            
        //     if (!gitlink.includes('https://github.com')) {
        //         validateShowPopup('popup_validator', 'Enter valid git link'); // Show popup when invalid date is selected
        //         event.preventDefault(); // Prevent form submission if validation fails
        //     }
        
        // });

    </script>
</body>


</html>