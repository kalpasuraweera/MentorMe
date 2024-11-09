<div class="flex flex-col w-1/4 text-white bg-white">
    <!-- Sidebar container with flex column layout, taking 1/4th of the width, text in white color, and background in white -->

    <div class="flex flex-col items-center p-5">
        <!-- Container for the dashboard logo, centered using flex with padding (p-5) -->
        <img src="<?= BASE_URL ?>/public/images/dashboard_logo.png" alt="dashboard logo">
        <!-- Dashboard logo image sourced from a BASE_URL path, with an alt text 'dashboard logo' -->
    </div>

    <div class="flex flex-col items-center p-5 gap-2">
        <!-- Container for sidebar menu items, also centered with flex layout, padding (p-5), and gap between elements (gap-2) -->

        <?php
        // Start PHP code to dynamically generate the sidebar menu items

        $activeIndex = $componentData['activeIndex'] ?? 0;
        // Get the 'activeIndex' from the $componentData array to highlight the currently active menu item
        // If 'activeIndex' is not provided, it defaults to 0 (first item) thats why used ??

        foreach ($this->sidebarMenu as $index => $item) {
            // Loop through the $sidebarMenu array, which contains the sidebar menu items
            // $index represents the current index in the array
            // $item contains the details of the current menu item (URL, icon, text)

            $itemStyle = $activeIndex === $index ? 'btn-primary-color text-white' : 'text-secondary-color hover:btn-primary-color hover:text-white';
            // Determine the CSS class to apply based on whether the current item is the active one
            // If the current item is the active one (checked using $activeIndex === $index), it gets the 'btn-primary-color' and 'text-white' classes
            // Otherwise, it gets 'text-secondary-color' and hover effects that change color on hover

            echo
                "<a href='" . BASE_URL . $item['url'] . "' class='flex flex-row items-center w-full mx-10 rounded-md $itemStyle'>
                    <img src='" . BASE_URL . "/public/images/icons/" . $item['icon'] . ($activeIndex === $index ? '_active.png' : '.png') . "' alt='dashboard icon' class='mx-2'>
                    <p class='ml-2 py-4'>" . $item['text'] . "</p>
                </a>";
            // Dynamically output an <a> tag for each menu item
            // The link's href is constructed using BASE_URL and the URL provided in $item['url']
            // It applies the style based on whether it's active or not
            // Inside the <a> tag:
            // - The <img> element displays an icon for the menu item; its src path includes an '_active' suffix if the item is active
            // - The <p> element shows the text for the menu item, with padding to space it out
        }
        ?>
    </div>
</div>
