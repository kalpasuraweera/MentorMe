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
                    <img src='" . BASE_URL . $item['icon'] . "' alt='dashboard icon' class='mx-2'>
                    <p class='ml-2 py-4'>" . $item['text'] . "</p>
                </a>";
        }
        ?>
        <!-- <a href="<?= BASE_URL ?>/coordinator/dashboard"
            class="flex flex-row items-center w-full mx-10 rounded-md text-white btn-primary-color">
            <img src="<?= BASE_URL ?>/public/images/icons/dashboard_primary.png" alt="dashboard icon" class="mx-2">
            <p class="ml-2 py-4">Dashboard</p>
        </a>
        <a href="<?= BASE_URL ?>/coordinator/students"
            class="flex flex-row items-center w-full mx-10 rounded-md text-secondary-color hover:btn-primary-color hover:text-white">
            <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon" class="mx-2">
            <p class="ml-2 py-4">Manage Students</p>
        </a>
        <a href="<?= BASE_URL ?>/coordinator/dashboard"
            class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
            <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon" class="mx-2">
            <p class="ml-2 py-4">Manage Supervisors</p>
        </a>
        <a href="<?= BASE_URL ?>/coordinator/dashboard"
            class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
            <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon" class="mx-2">
            <p class="ml-2 py-4">Manage Groups</p>
        </a>
        <a href="<?= BASE_URL ?>/coordinator/dashboard"
            class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
            <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon" class="mx-2">
            <p class="ml-2 py-4">Manage Examiners</p>
        </a>
        <a href="<?= BASE_URL ?>/coordinator/dashboard"
            class="flex flex-row items-center w-full mx-10 text-secondary-color rounded-md hover:btn-primary-color hover:text-white">
            <img src="<?= BASE_URL ?>/public/images/icons/dashboard_secondary.png" alt="dashboard icon" class="mx-2">
            <p class="ml-2 py-4">Calendar</p>
        </a> -->

    </div>
</div>