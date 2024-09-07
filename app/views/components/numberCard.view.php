<!-- Dashboard Number Card -->

<div class="<?= $componentData['bg'] ?? 'bg-white text-black' ?> rounded-2xl py-4 px-5 gap-2 flex shadow">
    <?php if (isset($componentData['icon'])): ?>
        <img src="<?= BASE_URL ?>/public/images/icons/<?= $componentData['icon'] ?>" alt="user icon" width="40" height="40">
    <?php endif; ?>
    <div class="flex flex-col justify-center" style="width:200px;">
        <p class="text-md"><?= $componentData['title'] ?></p>
        <p class="text-lg font-bold"><?= $componentData['value'] ?></p>
    </div>
</div>