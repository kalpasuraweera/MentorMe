<!--Button Component -->

<button
    class="<?= $componentData['bg'] ?? 'btn-primary-color' ?> rounded-3xl text-center text-white text-base font-medium px-10 py-2"
    onclick="<?= $componentData['onClick'] ?? '' ?>" name="<?= $componentData['name'] ?? '' ?>"
    type="<?= $componentData['type'] ?? '' ?>">
    <?= $componentData['text'] ?? '' ?>
</button>