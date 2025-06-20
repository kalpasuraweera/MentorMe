<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/coordinator_students.css">
</head>

<body>
  <!--Import popup -->
  <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
    style="background-color: rgba(0, 0, 0, 0.7);" id="importSupervisorsPopup">

    <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full "
      style="max-width: 800px; max-height:90vh; overflow-y: scroll;" enctype="multipart/form-data">
      <div class="flex justify-between items center">
        <h1 class="text-2xl font-bold text-primary-color">Import Supervisors</h1>
      </div>

      <div class="flex flex-col gap-5 my-5">
        <div class="flex flex-col gap-2">
          <label for="csv_file" class="text-lg font-bold text-primary-color">Data File</label>
          <input type="file" name="csv_file" id="csv_file" class="border border-primary-color rounded-xl p-2"
            accept=".csv" required />
        </div>

        <div class="flex justify-end gap-5">
          <button type="button"
            class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            id="importSupervisorsPopupClose">Cancel</button>
          <button type="submit"
            class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            name="import_supervisors">Import</button>
        </div>
      </div>
    </form>
  </div>

  <!-- CSV Validation Script -->
  <script>
    document.getElementById('csv_file').addEventListener('change', function () {
      const fileInput = this;
      const file = fileInput.files[0];

      // Reset custom validity
      fileInput.setCustomValidity('');

      if (file) {
        // Check file extension
        const fileName = file.name;
        const fileExt = fileName.split('.').pop().toLowerCase();

        if (fileExt !== 'csv') {
          fileInput.setCustomValidity('Please upload a valid CSV file');
        }
      }
    });
  </script>

  <!-- Delete All Confirmation Popup -->
  <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
    style="background-color: rgba(0, 0, 0, 0.7);" id="deleteAllSupervisorsPopup">
    <form action="" method="post" class="bg-white p-5 rounded-md w-full"
      style="max-width: 800px; max-height: 90vh; overflow-y: scroll;">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-color">Delete All Supervisors</h1>
      </div>

      <div class="flex flex-col gap-5 my-5">
        <p class="text-lg font-bold text-primary-color">Are you sure you want to delete all supervisors?</p>
        <div class="flex justify-end gap-5">
          <button type="button"
            class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            id="deleteAllSupervisorsPopupClose">Cancel</button>
          <button type="submit" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            name="delete_all_supervisors">Delete</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Edit Supervisor Popup -->
  <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center hidden"
    style="background-color: rgba(0, 0, 0, 0.7);" id="editSupervisorPopup">
    <form action="" method="post" class="bg-white p-5 rounded-md w-full"
      style="max-width: 800px; max-height:90vh; overflow-y:scroll;">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-color">Edit Supervisor</h1>
      </div>

      <div class="flex flex-col gap-5 my-5">
        <div class="flex flex-col gap-2">
          <label for="email_id" class="text-lg font-bold text-primary-color">Email ID</label>
          <input type="text" name="email_id" id="email_id" class="border border-primary-color rounded-xl p-2"
            required />
        </div>

        <div class="flex flex-col gap-2">
          <label for="full_name" class="text-lg font-bold text-primary-color">Name</label>
          <input type="text" name="full_name" id="full_name" class="border border-primary-color rounded-xl p-2"
            required />
        </div>

        <div class="flex flex-col gap-2">
          <label for="email" class="text-lg font-bold text-primary-color">Email</label>
          <input type="email" name="email" id="email" class="border border-primary-color rounded-xl p-2" required />
        </div>

        <!-- In editSupervisorPopup div, add this inside the form -->
        <input type="hidden" name="current_projects" id="current_projects" value="0" />

        <div class="flex flex-col gap-2">
          <label for="expected_projects" class="text-lg font-bold text-primary-color">Expected Projects</label>
          <input type="text" name="expected_projects" id="expected_projects"
            class="border border-primary-color rounded-xl p-2" />
          <small id="expected_projects_note" class="hidden">Must be at least equal to current projects (<span
              id="current_projects_display">0</span>)</small>
        </div>

        <div class="flex flex-col gap-2">
          <label for="description" class="text-lg font-bold text-primary-color">Description</label>
          <input type="text" name="description" id="description" class="border border-primary-color rounded-xl p-2" />
        </div>

        <div class="flex justify-end gap-5">
          <input type="hidden" name="user_id" id="user_id" />
          <button type="button"
            class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            id="editSupervisorPopupClose">Cancel</button>

          <button type="submit"
            class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            name="update_supervisor">Save</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Delete One confirmation Popup -->
  <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
    style="background-color: rgba(0,0,0,0.7);" id="deleteOneSupervisorPopup">
    <form action="" method="post" class="bg-white shadow p-5 rounded-md w-full"
      style="max-width: 800px; max-height:90vh; overflow-y: scroll;">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-color">Delete Supervisor</h1>
      </div>

      <div class="flex flex-col gap-5 my-5">
        <p class="text-lg font-bold text-primary-color">Are you sure you want to delete this supervisor? </p>
        <table class="w-full mt-5 text-left border-0">
          <tbody>
            <tr>
              <td class="p-2 font-bold text-primary-color">Email ID:</td>
              <td class="p-2" id="supervisor_email_id"> </td>
            </tr>

            <tr>
              <td class="p-2 font-bold text-primary-color">Name:</td>
              <td class="p-2" id="supervisor_full_name"></td>
            </tr>

            <tr>
              <td class="p-2 font-bold text-primary-color">Email:</td>
              <td class="p-2" id="supervisor_email"></td>
            </tr>

            <tr>
              <td class="p-2 font-bold text-primary-color">Expected Projects:</td>
              <td class="p-2" id="supervisor_expected_projects"></td>
            </tr>

            <tr>
              <td class="p-2 font-bold text-primary-color">Description:</td>
              <td class="p-2" id="supervisor_description"></td>
            </tr>

          </tbody>
        </table>

        <div class="flex justify-end gap-5">
          <button type="button"
            class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            id="deleteOneSupervisorPopupClose">Cancel</button>
          <button type="submit" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py1-2"
            name="delete_one_supervisor" id="delete_one_supervisor">Delete</button>
        </div>
      </div>
    </form>
  </div>




  <!-- Main Content -->
  <div class="flex flex-row bg-primary-color h-screen">
    <?php $this->renderComponent('sideBar', ['activeIndex' => 2]) ?>
    <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
      <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-primary-color">Manage Supervisors</h1>
        <div class="flex flex-row items-center">
          <div class="flex flex-col items-end  mx-2">
            <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
            <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
          </div>
          <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
            alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;">
        </div>
      </div>

      <!-- Search and Filter -->
      <form action="" method="POST" class="flex justify-evenly text-white gap-2 mt-4">
        <select name="filter" class="p-2 rounded-lg" onchange="this.form.submit()">
          <option value="all" <?= isset($_POST['filter']) && $_POST['filter'] === 'all' ? 'selected' : '' ?>>All</option>
          <option value="greater" <?= isset($_POST['filter']) && $_POST['filter'] === 'greater' ? 'selected' : '' ?>>
            Available</option>
          <option value="equal" <?= isset($_POST['filter']) && $_POST['filter'] === 'equal' ? 'selected' : '' ?>>Reached
            Limit</option>
        </select>

        <input type="text" name="search" placeholder="Search by Email ID"
          class="p-2 rounded-lg border border-primary-color w-full text-black"value = "<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''?>">

        <button type="submit" name="search_supervisor"
          class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Search</button>

        <button type="button" class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
          onclick="openImportPopup()">Import</button>

        <button type="button" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
          onclick="openDeleteAllSupervisorsPopup()">Delete</button>
      </form>

      <!-- Table -->
      <table class="w-full mt-5 text-center">
        <thead>
          <tr class="text-white bg-indigo">
            <th class="p-2">Name</th>
            <th class="p-2">Email</th>
            <th class="p-2">Groups</th>
            <th class="p-2">Expected Projects</th>
            <th class="p-2">Current Projects</th>
            <th class="p-2">Action</th>
          </tr>
        </thead>

        <tbody>
          <?php if (!empty($pageData['supervisorList'])): ?>
            <?php
            $index = 0; // Initialize the counter 
            foreach ($pageData["supervisorList"] as $email_id => $supervisor): ?>
              <tr class="<?= $index % 2 == 0 ? "bg-white" : "bg-purple"; ?> text-sm">
                <td class="p-2"><?= $supervisor['full_name'] ?></td>
                <td class="p-2"><?= $supervisor['email'] ?></td>
                <td class="p-2">
                  <?= !empty($supervisor['supervising_groups']) ? $supervisor['supervising_groups'] : '-' ?>
                </td>
                <td class="p-2"><?= $supervisor['expected_projects'] ?></td>
                <td class="p-2"><?= $supervisor['current_projects'] ?></td>
                <td class="p-2 flex gap-1 justify-center">
                  <button class="bg-blue rounded-md text-center text-white  text-sm font-medium px-4 py-1"
                    onclick='openEditSupervisorPopup(<?= json_encode($supervisor, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>)'>Edit</button>
                  <button class="bg-red rounded-md text-center text-white  text-sm font-medium px-4 py-1"
                    onclick='openDeleteOneSupervisorPopup(<?= json_encode($supervisor, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>)'>Delete</button>
                </td>
              </tr>
              <?php $index++; // Increment the counter at the end of each loop iteration
            endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="p-2 text-center">No supervisors found.</td>
            </tr>
          <?php endif; ?>
        </tbody>


      </table>
    </div>
  </div>


  <script>
    function openImportPopup() {
      document.getElementById('importSupervisorsPopup').classList.remove('hidden');
    }
    document.getElementById('importSupervisorsPopupClose').addEventListener('click', () => {
      document.getElementById('importSupervisorsPopup').classList.add('hidden');
    });

    function openDeleteAllSupervisorsPopup() {
      document.getElementById('deleteAllSupervisorsPopup').classList.remove('hidden');
    }
    document.getElementById('deleteAllSupervisorsPopupClose').addEventListener('click', () => {
      document.getElementById('deleteAllSupervisorsPopup').classList.add('hidden');
    });


    function openDeleteOneSupervisorPopup(supervisor) {
      document.getElementById('deleteOneSupervisorPopup').classList.remove('hidden');
      document.getElementById('supervisor_email_id').textContent = supervisor.email_id;
      document.getElementById('supervisor_full_name').textContent = supervisor.full_name;
      document.getElementById('supervisor_email').textContent = supervisor.email;
      document.getElementById('supervisor_expected_projects').textContent = supervisor.expected_projects;
      document.getElementById('supervisor_description').textContent = supervisor.description;
      document.getElementById('delete_one_supervisor').value = supervisor.user_id;
    }

    document.getElementById('deleteOneSupervisorPopupClose').addEventListener('click', () => {
      document.getElementById('deleteOneSupervisorPopup').classList.add('hidden');
    });


    function openEditSupervisorPopup(supervisor) {
      document.getElementById('email_id').value = supervisor.email_id;
      document.getElementById('full_name').value = supervisor.full_name;
      document.getElementById('email').value = supervisor.email;
      document.getElementById('expected_projects').value = supervisor.expected_projects;
      document.getElementById('description').value = supervisor.description;
      document.getElementById('user_id').value = supervisor.user_id;
      document.getElementById('current_projects').value = supervisor.current_projects || 0;
      document.getElementById('current_projects_display').textContent = supervisor.current_projects || 0;
      document.getElementById('editSupervisorPopup').classList.remove('hidden');

    }

    document.getElementById('editSupervisorPopupClose').addEventListener('click', () => {
      document.getElementById('editSupervisorPopup').classList.add('hidden');
    });


    document.querySelector('#editSupervisorPopup form').addEventListener('submit', function (event) {
      const expectedProjects = parseInt(document.getElementById('expected_projects').value) || 0;
      const currentProjects = parseInt(document.getElementById('current_projects').value) || 0;

      if (expectedProjects < currentProjects) {
        event.preventDefault(); // Prevent form submission
        alert(`Warning: Expected projects (${expectedProjects}) is less than current projects (${currentProjects}). Please increase the expected projects count.`);

        // If you want to allow submission after warning, use confirm instead:
        // if (!confirm(`Warning: Expected projects (${expectedProjects}) is less than current projects (${currentProjects}). Do you want to continue anyway?`)) {
        //     event.preventDefault();
        // }
      }
    });

    document.getElementById('expected_projects').addEventListener('input', function () {
      const expectedProjects = parseInt(this.value) || 0;
      const currentProjects = parseInt(document.getElementById('current_projects').value) || 0;

      if (expectedProjects < currentProjects) {
        this.setCustomValidity(`Expected projects must be at least ${currentProjects}`);
        this.classList.add('border-red-500'); // Add red border
      } else {
        this.setCustomValidity('');
        this.classList.remove('border-red-500');
      }
    });

  </script>

</body>

</html>