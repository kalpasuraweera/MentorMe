<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
  <link rel = "stylesheet" href = "<?= BASE_URL ?>/public/css/pages/coordinator_students.css">
</head>

<body>
  <!--Import popup -->
  <div class = "absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
    style = "background-color: rgba(0, 0, 0, 0.7);" id="importExaminersPopup">
    
    <form action = "" method = "post" class = "bg-white shadow p-5 rounded-md w-full "
    style = "max-width: 800px; max-height:90vh; overflow-y: scroll;"enctype="multipart/form-data">
      <div class = "flex justify-between items center">
        <h1 class = "text-2xl font-bold text-primary-color">Import Examiners</h1>
      </div>

      <div class = "flex flex-col gap-5 my-5">
        <div class  = "flex flex-col gap-2">
          <label for = "csv_file" class = "text-lg font-bold text-primary-color">Data File</label>
          <input type = "file" name="csv_file" id="csv_file" class = "border border-primary-color rounded-xl p-2" />
        </div>

        <div class = "flex justify-end gap-5">
          <button type = "button" 
            class = "btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
            id="importExaminersPopupClose">Cancel</button>
          <button type = "submit"
            class = "btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2" 
            name = "import_examiners">Import</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Delete All Confirmation Popup -->
   <div class = "absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
   style = "background-color: rgba(0, 0, 0, 0.7);" id="deleteAllExaminersPopup">
     <form action = "" method = "post" class="bg-white p-5 rounded-md w-full"
        style="max-width: 800px; max-height: 90vh; overflow-y: scroll;">
        <div class = "flex justify-between items-center">
          <h1 class = "text-2xl font-bold text-primary-color">Delete All Examiners</h1>
        </div>

        <div class = "flex flex-col gap-5 my-5">
          <p class = "text-lg font-bold text-primary-color">Are you sure you want to delete all examiners?</p>
          <div class = "flex justify-end gap-5">
            <button type = "button"
              class = "btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
              id="deleteAllExaminersPopupClose">Cancel</button>
            <button type = "submit" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
              name="delete_all_examiners">Delete</button>
          </div>
        </div>
      </form>
    </div>

<!-- Edit Supervisor Popup -->
 <div class = "absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center hidden"
  style = "background-color: rgba(0, 0, 0, 0.7);" id="editExaminerPopup">
  <form action = "" method="post" class="bg-white p-5 rounded-md w-full"
    style = "max-width: 800px; max-height:90vh; overflow-y:scroll;">
    <div class = "flex justify-between items-center">
      <h1 class = "text-2xl font-bold text-primary-color">Edit Examiners</h1>
    </div>

    <div class = "flex flex-col gap-5 my-5">
      <div class = "flex flex-col gap-2">
        <label for = "email_id" class = "text-lg font-bold text-primary-color">Email ID</label>
        <input type = "text" name = "email_id" id="email_id" class = "border border-primary-color rounded-xl p-2" />
      </div>

      <div class = "flex flex-col gap-2">
        <label for = "full_name" class = "text-lg font-bold text-primary-color">Name</label>
        <input type = "text" name = "full_name" id="full_name" class = "border border-primary-color rounded-xl p-2" />
      </div>

      <div class = "flex flex-col gap-2">
        <label for = "email" class = "text-lg font-bold text-primary-color">Email</label>
        <input type = "text" name = "email" id="email" class = "border border-primary-color rounded-xl p-2" />
      </div>

      <div class = "flex flex-col gap-2">
        <label for = "panel_number" class = "text-lg font-bold text-primary-color">Panel Number</label>
        <input type = "text" name = "panel_number" id="panel_number" class = "border border-primary-color rounded-xl p-2" />
      </div>
      <div class = "flex flex-col gap-2">
        <label for = "description" class = "text-lg font-bold text-primary-color">Description</label>
        <input type = "text" name = "description" id="description" class = "border border-primary-color rounded-xl p-2" />
      </div>

      <div class="flex justify-end gap-5">
        <input type = "hidden" name="user_id" id="user_id" />
        <button type="button"
          class="btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
          id="editExaminerPopupClose">Cancel</button>

        <button type="submit"
          class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
          name="update_examiner">Save</button>
      </div>
    </div>
  </form>
</div>

<!-- Delete One confirmation Popup -->
 <div class = "absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center hidden"
   style = "background-color: rgba(0,0,0,0.7);" id="deleteOneExaminerPopup">
   <form action= "" method = "post" class = "bg-white shadow p-5 rounded-md w-full"
    style="max-width: 800px; max-height:90vh; overflow-y: scroll;">
    <div class = "flex justify-between items-center">
      <h1 class = "text-2xl font-bold text-primary-color">Delete Examiner</h1>
    </div>
    
    <div class= "flex flex-col gap-5 my-5">
      <p class = "text-lg font-bold text-primary-color">Are you sure you want to delete this examiner? </p>
      <table class = "w-full mt-5 text-left border-0">
        <tbody>
          <tr>
            <td class = "p-2 font-bold text-primary-color">Email ID:</td>
            <td class = "p-2" id="examiner_email_id"> </td>
          </tr>
          
          <tr>
            <td class = "p-2 font-bold text-primary-color">Name:</td>
            <td class = "p-2" id="examiner_full_name"></td>
          </tr>

          <tr>
            <td class = "p-2 font-bold text-primary-color">Email:</td>
            <td class = "p-2" id="examiner_email"></td>
          </tr>

          <tr>
            <td class = "p-2 font-bold text-primary-color">Panel Number:</td>
            <td class = "p-2" id="examiner_panel_number"></td>
          </tr>

          <tr>
            <td class = "p-2 font-bold text-primary-color">Description:</td>
            <td class = "p-2" id="examiner_description"></td>
          </tr>

        </tbody>
      </table>

      <div class="flex justify-end gap-5">
        <button type = "button"
          class = "btn-secondary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
          id="deleteOneExaminerPopupClose">Cancel</button>
        <button type = "submit" class ="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py1-2"
          name="delete_one_examiner" id="delete_one_examiner">Delete</button>
      </div>
    </div>
  </form>
</div>




<!-- Main Content -->
 <div class ="flex flex-row bg-primary-color h-screen">
    <?php $this->renderComponent('sideBar', ['activeIndex' => 5]) ?>
    <div class = "flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
      <div class = "flex justify-between items-center">
        <h1 class = "text-3xl font-bold text-primary-color">Manage Examiners</h1>
        <div class = "flex flex-row items-center">
          <div class = "flex flex-col items-end  mx-2">
            <p class = "text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
            <p class = "text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
          </div>
          <img src = "<?= BASE_URL ?>/public/images/icons/user_profile.png" alt = "user icon" />
        </div>
      </div>
      
      <!-- Search and Filter -->
       <form action ="" method="POST" class = "flex justify-evenly text-white gap-2 mt-4">
        <select name = "filter" class = "p-2 rounded-lg" onchange="this.form.submit()">
          <option value = "all">All</option>
          <option value = "1">Panel 1</option>
          <option value = "2">Panel 2</option> 
          <option value = "3">Panel 3</option>
          <option value = "4">Panel 4</option>  
          <option value = "5">Panel 5</option>
          <option value = "6">Panel 6</option>
          <option value = "7">Panel 7</option>
          <option value = "8">Panel 8</option>
          <option value = "9">Panel 9</option>
          <option value = "10">Panel 10</option> 

        </select>

        <input type = "text" name="search" placeholder= "Search by Examiner ID"
          class = "p-2 rounded-lg border border-primary-color w-full text-black" >

        <button type = "submit" 
          class = "btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2">Search</button>
        
          <button type = "button" class = "bg-blue rounded-3xl text-center text-white text-base font-medium px-10 py-2"
          onclick = "openImportPopup()">Import</button>
        <!--  -->
        <button type = "button" class="bg-red rounded-3xl text-center text-white text-base font-medium px-10 py-2"
          onclick="openDeleteAllExaminersPopup()">Delete</button>
      </form>

      <!-- Table -->
       <table class = "w-full mt-5 text-center">
          <thead>
            <tr class = "text-white bg-indigo">
              <th class ="p-2">Name</th>
              <th class ="p-2">Email</th> 
              <th class ="p-2">Panel Number</th>
              <th class ="p-2">Action</th>
            </tr> 
          </thead>

          <tbody>
            <?php
            $index = 0; // Initialize the counter 
            foreach ($pageData["examinerList"] as $email_id => $examiner): ?>
                <tr class="<?= $index % 2 == 0 ? "bg-white" : "bg-purple"; ?> text-sm">
                    <td class = "p-2"><?= $examiner['full_name'] ?></td>
                    <td class = "p-2"><?= $examiner['email'] ?></td>
                               
                    <td class = "p-2"><?= $examiner['panel_number'] ?></td>
                    <td class = "p-2 flex gap-1 justify-center">
                      <button class = "bg-blue rounded-md text-center text-white  text-sm font-medium px-4 py-1"
                      onclick = 'openEditExaminerPopup(<?= json_encode($examiner, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>)'>Edit</button>
                      <button class = "bg-red rounded-md text-center text-white  text-sm font-medium px-4 py-1"
                      onclick = 'openDeleteOneExaminerPopup(<?= json_encode($examiner, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>)'>Delete</button>
                    </td>
                  </tr>
                <?php $index++; // Increment the counter at the end of each loop iteration
            endforeach; ?>
        </table>
    </div>
  </div>
  


         


<script>
  function openImportPopup() {
    document.getElementById('importExaminersPopup').classList.remove('hidden');
  }
  document.getElementById('importExaminersPopupClose').addEventListener('click', ()=>{
    document.getElementById('importExaminersPopup').classList.add('hidden');
  });

  function openDeleteAllExaminersPopup(){
    document.getElementById('deleteAllExaminersPopup').classList.remove('hidden');
  }
  document.getElementById('deleteAllExaminersPopupClose').addEventListener('click', ()=>{
    document.getElementById('deleteAllExaminersPopup').classList.add('hidden');
  });


  function openDeleteOneExaminerPopup(examiner){
    document.getElementById('deleteOneExaminerPopup').classList.remove('hidden');
    document.getElementById('examiner_email_id').textContent = examiner.email_id;
    document.getElementById('examiner_full_name').textContent = examiner.full_name;
    document.getElementById('examiner_email').textContent = examiner.email;
    document.getElementById('examiner_panel_number').textContent = examiner.panel_number;
    document.getElementById('examiner_description').textContent = examiner.description;
    document.getElementById('delete_one_examiner').value = examiner.user_id;
  }

  document.getElementById('deleteOneExaminerPopupClose').addEventListener('click', () => {
    document.getElementById('deleteOneExaminerPopup').classList.add('hidden');
  });


  function openEditExaminerPopup(examiner){
    document.getElementById('email_id').value = examiner.email_id;
    document.getElementById('full_name').value = examiner.full_name;
    document.getElementById('email').value = examiner.email;
    document.getElementById('panel_number').value = examiner.panel_number;
    document.getElementById('description').value = examiner.description;
    document.getElementById('user_id').value = examiner.user_id;
    document.getElementById('editExaminerPopup').classList.remove('hidden');

  }

    document.getElementById('editExaminerPopupClose').addEventListener('click', ()=>{
    document.getElementById('editExaminerPopup').classList.add('hidden');
  });

</script>

</body>
</html>

