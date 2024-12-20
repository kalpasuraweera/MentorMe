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
