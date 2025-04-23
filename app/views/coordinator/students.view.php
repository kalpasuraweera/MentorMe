<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/coordinator_students.css">
</head>

<body>
  <!-- Import Popup -->
  <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
    style="background-color: rgba(0, 0, 0, 0.7);" id="importStudentsPopup">
    <form action="" method="post" class="bg-white p-5 rounded-md w-full"
      style="max-width: 800px;max-height:90vh;overflow-y: scroll;" enctype="multipart/form-data">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-color">Import Students</h1>
      </div>
      <div class="flex flex-col gap-5 my-5">
        <div class="flex flex-col gap-2">
          <label for="csv_file" class="text-lg font-bold text-primary-color">Data File</label>
          <input type="file" name="csv_file" id="csv_file" class="border border-primary-color rounded-xl p-2" />
        </div>
        <div class="flex justify-end gap-5">
          <button type="button"
            class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            id="importStudentsPopupClose">Cancel</button>
          <button type="submit"
            class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            name="import_students">Import</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Delete All Confirmation Popup -->
  <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
    style="background-color: rgba(0, 0, 0, 0.7);" id="deleteAllStudentsPopup">
    <form action="" method="post" class="bg-white p-5 rounded-md w-full"
      style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-color">Delete All Students</h1>
      </div>
      <div class="flex flex-col gap-5 my-5">
        <p class="text-lg font-bold text-primary-color">Are you sure you want to delete all students?</p>
        <div class="flex justify-end gap-5">
          <button type="button"
            class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            id="deleteAllStudentsPopupClose">Cancel</button>
          <button type="submit" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            name="delete_all_students">Delete</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Delete One Confirmation Popup -->
  <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
    style="background-color: rgba(0, 0, 0, 0.7);" id="deleteOneStudentPopup">
    <form action="" method="post" class="bg-white p-5 rounded-md w-full"
      style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-color">Delete Student</h1>
      </div>
      <div class="flex flex-col gap-5 my-5">
        <p class="text-lg font-bold text-primary-color">Are you sure you want to delete this student?</p>
        <table class="w-full mt-5 text-left border-0">
          <tbody>
            <tr>
              <td class="p-2 font-bold text-primary-color">Index Number:</td>
              <td class="p-2" id="student_index_number"></td>
            </tr>
            <tr>
              <td class="p-2 font-bold text-primary-color">Full Name:</td>
              <td class="p-2" id="student_name"></td>
            </tr>
            <tr>
              <td class="p-2 font-bold text-primary-color">Email:</td>
              <td class="p-2" id="student_email"></td>
            </tr>
            <tr>
              <td class="p-2 font-bold text-primary-color">Group:</td>
              <td class="p-2" id="student_group"></td>
            </tr>
            <tr>
              <td class="p-2 font-bold text-primary-color">Bracket:</td>
              <td class="p-2" id="student_bracket"></td>
            </tr>
            <tr>
              <td class="p-2 font-bold text-primary-color">Course:</td>
              <td class="p-2" id="student_course"></td>
            </tr>
            <tr>
              <td class="p-2 font-bold text-primary-color">Year:</td>
              <td class="p-2" id="student_year"></td>
            </tr>
          </tbody>
        </table>
        <div class="flex justify-end gap-5">
          <button type="button"
            class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            id="deleteOneStudentPopupClose">Cancel</button>
          <button type="submit" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            name="delete_one_student" id="delete_one_student">Delete</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Edit Student Popup -->
  <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
    style="background-color: rgba(0, 0, 0, 0.7);" id="editStudentPopup">
    <form action="" method="post" class="bg-white p-5 rounded-md w-full"
      style="max-width: 800px;max-height:90vh;overflow-y: scroll;">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-primary-color">Edit Student</h1>
      </div>
      <div class="flex flex-col gap-5 my-5">
        <div class="flex flex-col gap-2">
          <label for="index_number" class="text-lg font-bold text-primary-color">Index Number</label>
          <input type="text" name="index_number" id="index_number" class="border border-primary-color rounded-xl p-2" />
        </div>
        <div class="flex flex-col gap-2">
          <label for="full_name" class="text-lg font-bold text-primary-color">Full Name</label>
          <input type="text" name="full_name" id="full_name" class="border border-primary-color rounded-xl p-2" />
        </div>
        <div class="flex flex-col gap-2">
          <label for="email" class="text-lg font-bold text-primary-color">Email</label>
          <input type="email" name="email" id="email" class="border border-primary-color rounded-xl p-2" />
        </div>

        <div class="flex flex-col gap-2">
                    <label for="group_id" class="text-lg font-bold text-primary-color">Group</label>
                    <select name="group_id" id="group_id"
                        class="p-2 rounded-lg border border-primary-color w-full text-black" required>
                        <?php foreach ($pageData['groupList'] as $group): ?>
                                <option value="<?= $group['group_id'] ?>"><?= $group['group_id'] ?></option>
                        <?php endforeach; ?>
                    </select>
        </div>

        <div class="flex flex-col gap-2">
                    <label for="course" class="text-lg font-bold text-primary-color">Course</label>
                    <select name="course" id="course"
                        class="p-2 rounded-lg border border-primary-color w-full text-black" required>
                        <?php foreach ($pageData['courseOptions'] as $course): ?>
                                <option value="<?= $course['course'] ?>"><?= $course['course'] ?></option>
                        <?php endforeach; ?>
                    </select>
        </div>
       <div class="flex flex-col gap-2">
          <label for="year" class="text-lg font-bold text-primary-color">Year</label>
          <input type="text" name="year" id="year" class="border border-primary-color rounded-xl p-2" />
        </div>
        <div class="flex justify-end gap-5 mt-5">
          <input type="hidden" name="user_id" id="user_id">
          <button type="button"
            class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-3"
            id="editStudentPopupClose">Cancel</button>
          <button type="submit"
            class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            name="update_student">Save</button>
        </div>
      </div>
    </form>
  </div>
  <!-- Main Content -->
  <div class="flex flex-row bg-primary-color h-screen">
    <?php $this->renderComponent('sideBar', ['activeIndex' => 1]) ?>
    <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
      <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-primary-color">Manage Students</h1>
        <div class="flex flex-row items-center my-2">
          <div class="flex flex-col items-end mx-2">
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
          <option value="all" <?=isset($_POST['filter']) && $_POST['filter'] === 'all' ? 'selected' : '' ?>>All</option>
          <option value="blue" <?=isset($_POST['filter']) && $_POST['filter'] === 'blue' ? 'selected' : '' ?>>Blue Bracket</option>
          <option value="red" <?=isset($_POST['filter']) && $_POST['filter'] === 'red' ? 'selected' : '' ?>>Red Bracket</option>
        </select>
        <input type="text" name="search" placeholder="Search by Index Number"
          class="p-2 rounded-lg border border-primary-color w-full text-black"
          value = "<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''?>">
        <button type="submit" name="search_student"
          class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Search</button>
        <button type="button" class="bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
          onclick="openImportPopup()">Import</button>
        <!-- We may have to add a Add One Student Button and Delete All Students Button 
            For now we can have a logic like when importing it will not delete the existing students and add the new ones if duplicate it will update the existing one
            So if need to add a just one student they can upload a file with just one student
            And if they want to delete All students we can add a button to delete all students
          -->
        <button type="button" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
          onclick="openDeleteAllStudentsPopup()">Delete</button>
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
            <!-- <th class="p-2">Year</th> -->
            <th class="p-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($pageData['studentList'])): ?>
           <?php foreach ($pageData["studentList"] as $index => $student): ?>
                <tr class="<?= $index % 2 == 0 ? "bg-white" : "bg-purple"; ?> text-sm">
                  <td class="p-2"><?= $student['index_number'] ?></td>
                  <td class="p-2"><?= $student['full_name'] ?></td>
                  <td class="p-2"><?= $student['email'] ?></td>
                  <td class="p-2">
                                <?= (!empty($student['group_id']) ? $student['group_id'] : '-') ?>
                  </td>
                  <td class="p-2"><?= $student['bracket'] . "-" . $student['bracket_id'] ?></td>
                  <td class="p-2">
                  <?php
                  if($student['course'] === 'Computer Science') {
                    echo 'CS';
                  } elseif($student['course'] === 'Information Systems') {
                    echo 'IS';
                  } else {
                    echo $student['course'];
                  }?>
                  </td>
                  <!-- <td class="p-2"> -->
                    <!-- ?= $student['year'] ? -->
                  <!-- </td> -->
                  <td class="p-2 flex gap-1 justify-center">
                    <button class="bg-blue rounded-md text-center text-white text-sm font-medium px-4 py-1"
                      onclick='openEditStudentPopup(<?= json_encode($student) ?>)'>Edit</button>
                    <button class="bg-red rounded-md text-center text-white text-sm font-medium px-4 py-1"
                      onclick='openDeleteOneStudentPopup(<?= json_encode($student) ?>)'>Delete</button>

                  </td>
                </tr>
          <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="8" class="p-2 text-center">No students found.</td>
            </tr>
          <?php endif; ?>
      </table>
    </div>
  </div>
  <script>
    function openImportPopup() {
      document.getElementById('importStudentsPopup').classList.remove('hidden');
    }
    document.getElementById('importStudentsPopupClose').addEventListener('click', () => {
      document.getElementById('importStudentsPopup').classList.add('hidden');
    });

    function openDeleteAllStudentsPopup() {
      document.getElementById('deleteAllStudentsPopup').classList.remove('hidden');
    }
    document.getElementById('deleteAllStudentsPopupClose').addEventListener('click', () => {
      document.getElementById('deleteAllStudentsPopup').classList.add('hidden');
    });

    function openDeleteOneStudentPopup(student) {
      document.getElementById('student_index_number').textContent = student.index_number;
      document.getElementById('student_name').textContent = student.full_name;
      document.getElementById('student_email').textContent = student.email;
      document.getElementById('student_group').textContent = student.group_id;
      document.getElementById('student_bracket').textContent = student.bracket;
      document.getElementById('student_course').textContent = student.course;
      document.getElementById('student_year').textContent = student.year;
      document.getElementById('delete_one_student').value = student.user_id;
      document.getElementById('deleteOneStudentPopup').classList.remove('hidden');
    }
    document.getElementById('deleteOneStudentPopupClose').addEventListener('click', () => {
      document.getElementById('deleteOneStudentPopup').classList.add('hidden');
    });

    function openEditStudentPopup(student) {
      document.getElementById('index_number').value = student.index_number;
      document.getElementById('full_name').value = student.full_name;
      document.getElementById('email').value = student.email;
      document.getElementById('group_id').value = student.group_id;
      document.getElementById('course').value = student.course;
      document.getElementById('year').value = student.year;
      document.getElementById('user_id').value = student.user_id;
      document.getElementById('editStudentPopup').classList.remove('hidden');
    }
    
    
    document.getElementById('editStudentPopupClose').addEventListener('click', () => {
      document.getElementById('editStudentPopup').classList.add('hidden');
    });
  </script>
</body>

</html>