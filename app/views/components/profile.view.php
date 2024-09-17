<!-- Profile -->
 <div class="popup-profile" id="popup-profile">
    <div class="popup-profile-close">
        <img src="<?= BASE_URL ?>/public/images/icons/logout_icon.png" id="close-popup-profile">
    </div>
    <div class="popup-profile-detail">
        <div class="popup-profile-block-1">
            <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png">
            <h3><?= $_SESSION['user']['role'] ?><h3>
        </div>
        <div class="popup-profile-block-2">
            <h2>Thamindu wijerathne</h2>
        </div>
    </div>
</div>