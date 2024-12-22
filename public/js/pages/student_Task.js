// References to form overlays
const addDetails = document.getElementById("addTaskFormOverlay");
const updateDetail = document.getElementById("updateTaskFormOverlay");

// Buttons for opening add/update forms
const addTaskDetail = document.getElementById("addTaskDetail");
const updateTaskDetails = document.querySelectorAll(".task-form");

// Event listener for opening Add Task form
addTaskDetail.addEventListener("click", () => {
  addDetails.style.display = "block";
});

// Event listener for opening Update Task form
updateTaskDetails.forEach((form) => {
  form.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent form submission
    
    updateDetail.style.display = "block";
  });
});

// Close buttons for forms
document.getElementById("close-button-addTask-Box").addEventListener("click", () => {
  addDetails.style.display = "none";
});

document.getElementById("close-button-updateTask-Box").addEventListener("click", () => {
  updateDetail.style.display = "none";
});


// Estimated time validation
const estimatedTimeInput = document.getElementById('estimatedTime');
document.getElementById('addTaskForm').addEventListener('submit', (event) => {
  const today = new Date().toISOString().split('T')[0];
  if (estimatedTimeInput.value < today) {
    event.preventDefault();
    estimatedTimeInput.setCustomValidity('Estimated date cannot be before today.');
    estimatedTimeInput.reportValidity();
  } else {
    estimatedTimeInput.setCustomValidity('');
  }
});

// Clear validity message on input
estimatedTimeInput.addEventListener('input', function () {
  this.setCustomValidity(this.value >= new Date().toISOString().split('T')[0] ? '' : 'Estimated date cannot be before today.');
});



function handleTaskClick(taskElement) {
  // Extract attributes from the clicked element
  const taskId = taskElement.getAttribute('data-task-id');
  const fullName = taskElement.getAttribute('full-name');
  const status = taskElement.getAttribute('status');
  const estimatedDate = taskElement.getAttribute('estimated-date');
  const dateCreated = taskElement.getAttribute('date-created');
  const reviewDate = taskElement.getAttribute('review-date');
  const endDate = taskElement.getAttribute('end-date');
  const doneDate = taskElement.getAttribute('done-date');
  const description = taskElement.getAttribute('description');
  const GitPR = taskElement.getAttribute('git-pr');

  // add task ID to hidden input
  document.getElementById('updateTaskIdForm').value = taskId;

  // Populate these values into corresponding elements or log them
  switch (status) {
    case "TO_DO":
      document.getElementById("updateStatusPrev").value = "TO_DO";
      document.getElementById("updateStatusNext").textContent = "IN PROGRESS";
      document.getElementById("updateStatusNext").value = "IN_PROGRESS";
      break;
  
    case "IN_PROGRESS":
      document.getElementById("updateStatusPrev").textContent = "TO DO";
      document.getElementById("updateStatusPrev").value = "TO_DO";
      document.getElementById("updateStatusNext").textContent = "PENDING";
      document.getElementById("updateStatusNext").value = "PENDING";
      break;
  
    case "PENDING":
      document.getElementById("updateStatusPrev").textContent = "IN PROGRESS";
      document.getElementById("updateStatusPrev").value = "IN_PROGRESS";
      document.getElementById("updateStatusNext").value = "PENDING"; // Remains the same for students
      break;
  }
  
  document.getElementById("updateTaskId").textContent = "Task  :  " + taskId;
  document.getElementById("updateFullName").innerHTML =  "<strong>Assignee  :</strong> " + fullName;
  document.getElementById("updateEstimatedDate").innerHTML = "<strong>Estimated Date  :</strong> " + estimatedDate;
  document.getElementById("updateDateCreated").innerHTML = "<strong>Task Created  :</strong> " + dateCreated;
  document.getElementById("updateAssigneDate").innerHTML = "<strong>Task Assigned  :</strong> " + dateCreated;
  document.getElementById("updateCompleteDate").innerHTML = "<strong>Task Completed  :</strong> " + doneDate;
  document.getElementById("updateReviewDate").innerHTML = "<strong>Task Reviewed  :</strong> " + reviewDate;

  // document.getElementById("updateReviewDate").textContent = reviewDate;
  // document.getElementById("updateEndDate").textContent = endDate;
  document.getElementById("updateDescription").value = description;
  document.getElementById("git-pr").value = GitPR;

  console.log(status);

}
