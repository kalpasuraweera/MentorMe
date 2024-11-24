//task add popup machanis,

// Reference to the form overlay this in addTaskDetail.php
const addDetails = document.getElementById("addTaskFormOverlay");
const updateDetail = document.getElementById("updateTaskFormOverlay");

//this used to get event from task.php | here refres that plus button
const addTaskDetail = document.getElementById("addTaskDetail");

addTaskDetail.addEventListener("click", function () {
  //alert("clicked task box");
  addDetails.style.display = "block"; // Display the form overlay
});

// Select all update icons if we use getElementById it only select one item
// By using . how we look into css properties
const updateTaskDetails = document.querySelectorAll(".updateTaskDetail");

// Add click event listeners to each update icon
updateTaskDetails.forEach((updateBtn) => {
  updateBtn.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent form submission

    // Retrieve task data from the button's data attributes
    const taskStatus = this.getAttribute("data-task-status");
    const taskDescription = this.getAttribute("data-task-description");
    const taskEstimatedTime = this.getAttribute("data-task-estimatedTime");
    const taskStartDate = this.getAttribute("data-task-startDate");
    const taskEndDate = this.getAttribute("data-task-endDate");

    // Log task status to confirm it's being retrieved
    console.log(taskStatus);

    // Set the task data values in the update form as default values
    document.querySelector('#updateTaskForm textarea[name="taskDescription"]').value = taskDescription;
    document.querySelector('#updateTaskForm input[name="estimatedTime"]').value = taskEstimatedTime;
    document.querySelector('#updateTaskForm input[name="taskType"]').value = taskStatus; // Corrected `value` typo

    // Show the form overlay when the pencil icon is clicked
    updateDetail.style.display = "block";

    // Update the task ID in the hidden input
    document.querySelector('#updateTaskForm input[name="task_id"]').value = updateBtn.value; // Set hidden task ID
  
    // Pre-select the task type box based on taskStatus
    const taskTypeBoxes = document.querySelectorAll(".type-box");
    taskTypeBoxes.forEach((box) => {
      box.classList.remove("selected"); // Remove any existing selection
      if (box.getAttribute("data-type") === taskStatus) {
        box.classList.add("selected"); // Select the matching task type
          }
        }
    )
  
  });
});


// Close the overlay when clicking the close button
// In add component
const closeAddTaskDetail = document.getElementById("close-button-addTask-Box");

closeAddTaskDetail.addEventListener("click", function () {
  addDetails.style.display = "none";
});

// In update component
const closeUpdateTaskDetail = document.getElementById(
  "close-button-updateTask-Box"
);

closeUpdateTaskDetail.addEventListener("click", function () {
  updateDetail.style.display = "none";
});

//after popup inside machanisms

// Select all task type boxes
const taskTypeBoxes = document.querySelectorAll(".type-box");
//taskTypeInput in hidden input in form
const taskTypeInput = document.querySelector("#updateTaskForm input[name='taskType']");
const taskTypeInputAdd = document.querySelector("#addTaskForm input[name='taskType']");

// Add event listeners to each task type box
taskTypeBoxes.forEach((box) => {
  box.addEventListener("click", function () {
    // Remove the 'selected' class from all boxes
    taskTypeBoxes.forEach((b) => b.classList.remove("selected"));

    // Add the 'selected' class to the clicked box
    box.classList.add("selected");

    // Update the hidden input with the selected task type value
    taskTypeInput.value = box.getAttribute("data-type");
    //taskTypeInputAdd.value = box.getAttribute("data-type");
    
  });
});

function printTaskId(taskId) {
  console.log("Task ID: " + taskId + " (This is front-end)"); // This will log the task ID to the console
};


// !!!!!!!!!!!!!!! Check what if task componanet data validation !!!!!!!!!!!!!!!!!!!!!!
document.getElementById('addTaskForm').addEventListener('submit', function (event) {
  const estimatedTimeInput = document.getElementById('estimatedTime');
  const today = new Date().toISOString().split('T')[0]; // Get today's date in yyyy-mm-dd format

  // Check if the estimated time is before today
  if (estimatedTimeInput.value < today) {
    estimatedTimeInput.setCustomValidity('Estimated date cannot be before today.');
    estimatedTimeInput.reportValidity();
    event.preventDefault(); // Prevent form submission
    return;
  }

  // If valid, clear custom validity
  estimatedTimeInput.setCustomValidity('');
});

