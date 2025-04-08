<!-- Popup Component -->
<div id="<?= $componentData['id'] ?? 'popup' ?>" style="
    position: fixed; 
    bottom: 20px; 
    left: 20px; 
    background-color: <?= $componentData['bg'] ?? '#333' ?>;
    color: <?= $componentData['textColor'] ?? 'white' ?>;
    padding: 15px 20px; 
    border-radius: 10px; 
    opacity: 0; 
    transition: opacity 0.5s ease-in-out;
    visibility: hidden;
">
    <?= $componentData['message'] ?? 'Form Submitting error' ?>
</div>
