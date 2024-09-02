<!-- Dashboard Number Card -->

<div class="<?= $componentData['bg'] ?? 'bg-white text-black' ?> rounded-2xl py-4 px-5 gap-2 flex flex-col justify-center" style="width:200px;">
    <p class="text-md"><?= $componentData['title'] ?></p>
    <p class="text-lg font-bold"><?= $componentData['value'] ?></p>
</div>