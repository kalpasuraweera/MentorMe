<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/coordinator_students.css">
</head>

<body>
  <div class="flex flex-row bg-primary-color h-screen">
    <?php $this->renderComponent('sideBar', ['activeIndex' => 1]) ?>
    <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
      <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-primary-color">Manage Students</h1>
        <div class="flex flex-row items-center">
          <div class="flex flex-col items-end mx-2">
            <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
            <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
          </div>
          <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
        </div>
      </div>
      <!-- Search and Filter -->
      <form action="" method="POST" class="flex justify-evenly text-white gap-2 mt-4">
        <select name="filter" class="p-2 rounded-lg">
          <option value="all">All</option>
          <option value="blue">Blue Bracket</option>
          <option value="red">Red Bracket</option>
        </select>
        <input type="text" name="search" placeholder="Search by student ID"
          class="p-2 rounded-lg border border-primary-color w-full text-black">
        <button type="submit"
          class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Search</button>
        <button type="button"
          class="bg-purple rounded-3xl text-center text-white text-base font-medium px-10 py-2">Import</button>
      </form>

      <!-- Table -->
      <table class="w-full mt-5 text-center">
        <thead>
          <tr class="text-white bg-indigo">
            <th class="p-2">Index Number</th>
            <th class="p-2">Full Name</th>
            <th class="p-2">Email</th>
            <th class="p-2">Group</th>
            <th class="p-2">Bracket</th>
            <th class="p-2">Course</th>
            <th class="p-2">Year</th>
            <th class="p-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white text-sm">
            <td class="p-2">1</td>
            <td class="p-2">John Doe</td>
            <td class="p-2">john@gmail.com</td>
            <td class="p-2">1</td>
            <td class="p-2">Blue</td>
            <td class="p-2">Computer Science</td>
            <td class="p-2">2020</td>
            <td class="p-2 flex gap-1 justify-center">
              <button class="bg-blue rounded-md text-center text-white text-sm font-medium px-4 py-1">View</button>
              <button class="bg-red rounded-md text-center text-white text-sm font-medium px-4 py-1">Delete</button>
            </td>
          </tr>
          <tr class="bg-purple text-sm">
            <td class="p-2">2</td>
            <td class="p-2">John Doe</td>
            <td class="p-2">john@gmail.com</td>
            <td class="p-2">1</td>
            <td class="p-2">Blue</td>
            <td class="p-2">Computer Science</td>
            <td class="p-2">2020</td>
            <td class="p-2 flex gap-1 justify-center">
              <button class="bg-blue rounded-md text-center text-white text-sm font-medium px-4 py-1">View</button>
              <button class="bg-red rounded-md text-center text-white text-sm font-medium px-4 py-1">Delete</button>
            </td>
          </tr>
      </table>
    </div>
  </div>
</body>

</html>