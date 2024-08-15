<!-- Sidebar -->
<div class="flex flex-col w-1/4 text-white bg-white">
    <div class="flex flex-col items-center p-5">
        <img src="<?= BASE_URL ?>/public/images/dashboard_logo.png" alt="dashboard logo">
    </div>
    <div class="flex flex-col items-center p-5 gap-2">
        <?php
        $activeIndex = $componentData['activeIndex'] ?? 0;
        foreach ($this->menu as $index => $item) {
            $itemStyle = $activeIndex === $index ? 'btn-primary-color text-white' : 'text-secondary-color hover:btn-primary-color hover:text-white';
            echo
                "<a href='" . BASE_URL . $item['url'] . "' class='flex flex-row items-center w-full mx-10 rounded-md $itemStyle'>
                    <img src='" . BASE_URL . "/public/images/icons/" . $item['icon'] . ($activeIndex === $index ? '_active.png' : '.png') . "' alt='dashboard icon' class='mx-2'>
                    <p class='ml-2 py-4'>" . $item['text'] . "</p>
                </a>";
        }
        ?>
    </div>
</div>