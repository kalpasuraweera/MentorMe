<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .odd-row {
      background-color: #B8AAF3; /* Light gray for even rows */
    }
  </style>
</head>
<body>
  <div class="flex h-screen">
    <!-- Sidebar -->
    <div class="w-1/4 bg-white p-6 flex flex-col justify-between">
      <div>
        <!-- Logo and Title -->
        <div class="w-48 h-11 relative mb-10">
          <div class="w-32 h-10 left-[56px] top-[3px] absolute">
            <div class="left-[2px] top-[27px] absolute text-indigo-600 text-xs font-medium font-['Poppins'] leading-3">DASHBOARD</div>
            <div class="left-0 top-0 absolute text-indigo-600 text-2xl font-bold font-['Poppins'] leading-relaxed">MentorMe</div>
          </div>
          <div class="w-11 h-11 left-0 top-0 absolute">
            <div class="w-11 h-11 left-0 top-0 absolute ">
              <img src="../public/images/logo.png" alt="Logo" class="rounded-lg w-full h-full object-contain">
            </div>
          </div>
        </div>

        <!-- Menu Items -->
        <nav>
          <ul class="space-y-3">
            <li>
              <a href="#" class="flex items-center p-3 text-slate-400 rounded hover:bg-indigo-100">
                <span class="ml-3 text-base font-medium">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center p-3 text-white bg-indigo-600 rounded">
                <span class="ml-3 text-base font-bold">Manage Students</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center p-3 text-slate-400 rounded hover:bg-indigo-100">
                <span class="ml-3 text-base font-medium">Manage Supervisors</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center p-3 text-slate-400 rounded hover:bg-indigo-100">
                <span class="ml-3 text-base font-medium">Manage Groups</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center p-3 text-slate-400 rounded hover:bg-indigo-100">
                <span class="ml-3 text-base font-medium">Manage Examiners</span>
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center p-3 text-slate-400 rounded hover:bg-indigo-100">
                <span class="ml-3 text-base font-medium">Calendar</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>

      <!-- Log Out -->
      <div>
        <a href="#" class="flex items-center p-3 text-slate-400 rounded hover:bg-indigo-100">
          <span class="ml-3 text-base font-medium">Log Out</span>
        </a>
      </div>
    </div>

    <!-- Main Content -->
    <div class="w-3/4 bg-indigo-50 p-8 relative">
      <!-- Header -->
      <div class="flex justify-between items-center mb-16"> <!-- Increased margin-bottom -->
        <h2 class="text-3xl font-bold text-indigo-900">Manage Students</h2>
      </div>

      <!-- Coordinator Information -->
      <div class="absolute top-8 right-8 text-right flex items-center space-x-4 "> <!-- Adjusted top and right positions for more space -->
        <div>
          <p class="text-2xl font-bold text-indigo-600">Coordinator</p>
          <p class="text-slate-500">kalpamadhushan@gmail.com</p>
        </div>
        <div class="w-16 h-16 rounded-full bg-cover bg-center" style="background-image: url('https://via.placeholder.com/150');"></div>
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
              <th class="py-3 px-6 text-left text-xs font-bold">Student_ID</th>
              <th class="py-3 px-6 text-left text-xs font-bold">Group_ID</th>
              <th class="py-3 px-6 text-left text-xs font-bold">Email</th>
              <th class="py-3 px-6 text-left text-xs font-bold">Gender</th>
              <th class="py-3 px-6 text-left text-xs font-bold">Date of Birth</th>
              <th class="py-3 px-6 text-left text-xs font-bold">Enrollment Date</th>
            </tr>
          </thead>
          <tbody>
            <!-- Add rows dynamically here -->
            <tr class="border-b ">
              <td class="py-3 px-6 text-gray-700 text-xs">Kristin Watson</td>
              <td class="py-3 px-6 text-gray-700 text-xs">JSS 2</td>
              <td class="py-3 px-6 text-gray-700 text-xs">Chemistry</td>
              <td class="py-3 px-6 text-gray-700 text-xs">michelle.rivera@example.com</td>
              <td class="py-3 px-6 text-gray-700 text-xs">Female</td>
              <td class="py-3 px-6 text-gray-700 text-xs">1998-05-22</td>
              <td class="py-3 px-6 text-gray-700 text-xs">2024-01-15</td>
            </tr>
            <tr class="border-b odd-row">
              <td class="py-3 px-6 text-gray-700 text-xs">John Doe</td>
              <td class="py-3 px-6 text-gray-700 text-xs">JSS 3</td>
              <td class="py-3 px-6 text-gray-700 text-xs">Physics</td>
              <td class="py-3 px-6 text-gray-700 text-xs">john.doe@example.com</td>
              <td class="py-3 px-6 text-gray-700 text-xs">Male</td>
              <td class="py-3 px-6 text-gray-700 text-xs">1997-12-11</td>
              <td class="py-3 px-6 text-gray-700 text-xs">2024-01-20</td>
            </tr>
            <tr class="border-b ">
              <td class="py-3 px-6 text-gray-700 text-xs">Emily Smith</td>
              <td class="py-3 px-6 text-gray-700 text-xs">JSS 1</td>
              <td class="py-3 px-6 text-gray-700 text-xs">Biology</td>
              <td class="py-3 px-6 text-gray-700 text-xs">emily.smith@example.com</td>
              <td class="py-3 px-6 text-gray-700 text-xs">Female</td>
              <td class="py-3 px-6 text-gray-700 text-xs">1999-03-15</td>
              <td class="py-3 px-6 text-gray-700 text-xs">2024-01-10</td>
            </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>

