<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">

  <style>
    .odd-row {
      background-color: #B8AAF3; /* Light gray for even rows */
    }
  </style>
</head>

<body>
    <div class="flex flex-row bg-primary-color h-screen">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 1]) ?>
        <div class="flex flex-col w-3/4 p-5 bg-indigo-50">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-indigo-900">Manage Supervisors</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-indigo-600">Coordinator</p>
                        <p class="text-sm text-slate-500">coordinator@cmb.ac.lk</p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>

      <!-- Search and Buttons -->
<div class="flex items-center space-x-4 mb-6"> <!-- Increased margin-bottom -->
    <button class="w-36 h-14 bg-white rounded-2xl flex items-center justify-center hover:bg-indigo-100">
        <span class="text-slate-500 text-sm font-medium">Add filter</span>
        <svg class="w-4 h-4 ml-2 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6" />
        </svg>
    </button>
    <div class="w-96 h-14 bg-white rounded-2xl flex items-center px-6">
    <input type="text" placeholder="Search here..." class="w-full text-slate-500 text-lg font-normal outline-none px-4 focus:outline-indigo-400" />
</div>



    <button class="px-6 py-3 bg-white rounded text-indigo-600 font-semibold hover:bg-indigo-100">Import</button>
    <button class="px-6 py-3 bg-violet-500 rounded text-white font-semibold hover:bg-violet-600">Export</button>
</div>


      <!-- Table -->
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg">
              <thead>
                <tr class="bg-indigo-400 text-white">
                  <th class="py-3 px-10 text-left text-xs font-bold">Name</th>
                  <th class="py-3 px-3 text-left text-xs font-bold">Supervisor ID</th>
                  <th class="py-3 px-6 text-left text-xs font-bold">Email</th>
                  <th class="py-3 px-6 text-left text-xs font-bold">Groups Supervised</th>
                  <th class="py-3 px-3 text-left text-xs font-bold">Slots Available</th>
                  <th class="py-3 px-3 text-left text-xs font-bold">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Example array of students (can be fetched from database)
                $students = [
                    ['name' => 'Dr. Jane Smith', 'supervisor_id' => '01', 'email' => 'jane.smith@example.com', 'groups' => 'Group 1, Group 3','slots_available' => '2'],
                    ['name' => 'Dr. John Doe', 'supervisor_id' => '02', 'email' => 'john.doe@example.com', 'groups' => 'Group 2, Group 4',  'slots_available' => '1'],
                    ['name' => 'Dr. Alice Johnson', 'supervisor_id' => '03', 'email' => 'alice@example.com', 'groups' => 'Group 5, Group 6', 'slots_available' => '3'],
                    ['name' => 'Dr. Bob Brown', 'supervisor_id' => '04', 'email' => '  bob@example.com', 'groups' => 'Group 7, Group 8', 'slots_available' => '4']
                ];

                foreach ($students as $key => $student) {
                    // Apply the 'odd-row' class to odd rows
                    $rowClass = $key % 2 == 0 ? '' : 'odd-row';
                    echo "
                    <tr class='border-b $rowClass'>
                        <td class='py-3 px-10 text-gray-700 text-xs'>{$student['name']}</td>
                        <td class='py-3 px-6 text-gray-700 text-xs'>{$student['supervisor_id']}</td>
                        <td class='py-3 px-3 text-gray-700 text-xs'>{$student['email']}</td>
                        <td class='py-3 px-6 text-gray-700 text-xs'>{$student['groups']}</td>
                        <td class='py-3 px-3 text-gray-700 text-xs'>{$student['slots_available']}</td>
                        <td class='py-3 px-3 text-gray-700 text-xs'>
                            <button class='bg-red-500 text-white py-1 px-2 rounded mb-1'>Remove</button>
                            <button class='bg-blue-500 text-white py-1 px-2 rounded mb-1'>Update</button>
                        </td>
                    </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
</body>
</html>
