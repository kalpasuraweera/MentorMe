Add task form component (pop-up)
<!-- used updateOverlay class for this overlay -->
<div id="updateTaskFormOverlay" class="updateOverlay" style="display: none;">
    <div class="popup">
        <form id="updateTaskForm" action="" method="post" class="updateForm">
            <div class="popup-header">
                <div class="popup-header-card-1">
                    <h2>Create Coordinator Dashboard</h2>
                </div>


                <button class="popup-header-card-2">  Move to Todo  </button>


                <div class="popup-header-card-3">
                    <!-- Three dots for more settings -->
                    <button class="settings-button">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </button>
                    <!-- Close button -->
                    <button class="close-button">X</button>
                </div>
            </div>


            <div class="popup-maincontent">
                <div class="content-1">
                    <div class="popup-maincontent-card-1">
                        <div class="popup-maincontent-card-1-detail">
                            <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>" style="width: 20px; height: 20px;">
                            <p style="color:9c9c9c;">Assignee:</p>
                            <p>Thamindu Wijerathne</p>
                        </div>
                        <div class="popup-maincontent-card-1-detail">
                            <img src="<?= BASE_URL ?>/public/images/icons/schedules.png" style="width: 20px; height: 20px;">
                            <p style="color:9c9c9c;">Due Date:</p>
                            <p>Dec 16, 2024</p>
                        </div>
                        <div class="popup-maincontent-card-1-detail">
                            <img src="<?= BASE_URL ?>/public/images/icons/calender.png" style="width: 20px; height: 20px;">
                            <p style="color:9c9c9c;">Estimated Time:</p>
                            <p>2 Days</p>
                        </div>
                    </div>
                    <div class="popup-maincontent-card-2">
                        <h2>History</h2>
                        <div class="popup-maincontent-card-2-detail">
                            <p style="color:9c9c9c;">Task Created</p>
                            <p style="padding-left: 80px;">2024 DECEMBER 01</p>
                        </div>
                        <div class="popup-maincontent-card-2-detail">
                            <p style="color:9c9c9c;">Task Created</p>
                            <p style="padding-left: 80px;">2024 DECEMBER 01</p>
                        </div>
                        <div class="popup-maincontent-card-2-detail">
                            <p style="color:9c9c9c;">Task Created</p>
                            <p style="padding-left: 80px;">2024 DECEMBER 01</p>
                        </div>
                        <div class="popup-maincontent-card-2-detail">
                            <p style="color:9c9c9c;">Task Created</p>
                            <p style="padding-left: 80px;">2024 DECEMBER 01</p>
                        </div>
                    </div>
                </div>
                <div class="content-2">
                    <h2>Description</h2>
                    <div class="description-detail">
                        thamindu thamindi add  a dnalfn a fanal alf alksd nla ksldmmal alksdmmdal al kdmalfal al dmaldal adkmalm lafmalfmalfm ll mfalmalmfalmf lafm lmfalfmlaf
                    </div>
                </div>
                <div class="content-3">
                    <h2>Pull Request Link</h2>
                    <div class="PR-detail">
                        hrrs://gsffs.aff/adda/afdad
                    </div>
                </div>
                
                <div class="content-4">
                    <h2>Comments</h2>

                    <!-- Comment Input Area -->
                    <div class="comment-input">
                        <textarea placeholder="Add a comment..." rows="3" class="comment-textarea"></textarea>
                        <button type="button" class="comment-submit-btn">Submit</button>
                    </div>

                    
                    <!-- Comment 1 -->
                    <div class="comment">
                        <div class="comment-header">
                            <p class="comment-user">Thamindu Wijerathne</p>
                            <p class="comment-date">2024 Dec 01</p>
                        </div>
                        <div class="comment-body">
                            This task seems a bit complex. Can we get a little more clarification on the requirements?
                        </div>
                    </div>

                    <!-- Comment 2 -->
                    <div class="comment">
                        <div class="comment-header">
                            <p class="comment-user">Admin</p>
                            <p class="comment-date">2024 Dec 02</p>
                        </div>
                        <div class="comment-body">
                            Sure! I'll send an update with more details tomorrow.
                        </div>
                    </div>


                </div>
            </div>
            
        </form>
    </div>
</div>
