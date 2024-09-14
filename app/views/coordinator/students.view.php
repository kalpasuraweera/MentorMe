<!doctype html>
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
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-indigo-900">Manage Students</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-indigo-600">Coordinator</p>
                        <p class="text-sm text-slate-500">coordinator@cmb.ac.lk</p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                    <!-- <div class="w-16 h-16 rounded-full bg-cover bg-center" style="background-image: url('https://via.placeholder.com/150');"></div> -->

                </div>
            </div>

      <!-- Search and Buttons -->
          <div class="flex items-center space-x-4 mb-3"> <!-- Increased margin-bottom -->
            <button class="w-36 h-14 bg-white rounded-2xl flex items-center justify-center">
              <span class="text-slate-500 text-sm font-medium">Add filter</span>
            </button>
            <div class="w-96 h-14 bg-white rounded-2xl flex items-center px-6">
              <input type="text" placeholder="Search here..." class="w-full text-slate-500 text-lg font-normal outline-none" />
            </div>
            <button class="px-6 py-3 bg-white rounded text-indigo-600 font-semibold">Import</button>
            <button class="px-6 py-3 bg-violet-500 rounded text-white font-semibold">Export</button>
          </div>

      <!-- Table -->
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg">
              <thead>
                <tr class="bg-indigo-400 text-white">
                  <th class="py-3 px-6 text-left text-xs font-bold">Name</th>
                  <th class="py-3 px-6 text-left text-xs font-bold">Index</th>
                  <th class="py-3 px-6 text-left text-xs font-bold">Group_ID</th>
                  <th class="py-3 px-6 text-left text-xs font-bold">Email</th>
                  <th class="py-3 px-6 text-left text-xs font-bold">GPA</th>
                  <th class="py-3 px-6 text-left text-xs font-bold">Bracket</th>
                  <th class="py-3 px-6 text-left text-xs font-bold">CS/IS</th>
                </tr>
              </thead>
              <tbody>
                <!-- Add rows dynamically here -->
                <tr class="border-b ">
                  <td class="py-3 px-6 text-gray-700 text-xs">Kristin Watson</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">22001824</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">01</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">michelle.rivera@example.com</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">3.5</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">Blue</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">CS</td>
                </tr>
                <tr class="border-b odd-row">
                  <td class="py-3 px-6 text-gray-700 text-xs">John Doe</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">21001027</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">02</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">john.doe@example.com</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">2.0</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">Red</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">IS</td>
                </tr>
                <tr class="border-b ">
                  <td class="py-3 px-6 text-gray-700 text-xs">Emily Smith</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">22000024</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">03</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">emily.smith@example.com</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">3.4</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">Blue</td>
                  <td class="py-3 px-6 text-gray-700 text-xs">CS</td>
                </tr>
                <!-- Add more rows as needed -->
              </tbody>
            </table>
          </div>
      </div>
    </div>
</body>


</html>

