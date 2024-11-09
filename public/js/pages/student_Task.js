//task add popup machanis,

// Reference to the form overlay this in addTaskDetail.php
const addDetails = document.getElementById("addTaskFormOverlay"); 
const updateDetail = document.getElementById("updateTaskFormOverlay");

//this used to get event from task.php | here refres that plus button
const addTaskDetail = document.getElementById("addTaskDetail");
    
addTaskDetail.addEventListener('click', function() {
    //alert("clicked task box");
    addDetails.style.display = 'block';  // Display the form overlay
});

// Select all update icons if we use getElementById it only select one item
// By using . how we look into css properties
const updateTaskDetails = document.querySelectorAll(".updateTaskDetail");

// Add click event listeners to each update icon
updateTaskDetails.forEach(updateBtn => {
    updateBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission
        updateDetail.style.display = 'block';  // Show the form overlay when the pencil icon is clicked
    });
});

// Close the overlay when clicking the close button
// In add component
const closeAddTaskDetail = document.getElementById("close-button-addTask-Box");

closeAddTaskDetail.addEventListener('click', function() {
    addDetails.style.display = 'none';  
});

// In update component
const closeUpdateTaskDetail = document.getElementById("close-button-updateTask-Box");

closeUpdateTaskDetail.addEventListener('click', function() {
    updateDetail.style.display = 'none';  
});





//after popup inside machanisms

// Select all task type boxes
const taskTypeBoxes = document.querySelectorAll('.type-box');
//taskTypeInput in hidden input in form
const taskTypeInput = document.getElementById('taskTypeInput');

// Add event listeners to each task type box
taskTypeBoxes.forEach(box => {
    box.addEventListener('click', function() {
        // Remove the 'selected' class from all boxes
        taskTypeBoxes.forEach(b => b.classList.remove('selected'));

        // Add the 'selected' class to the clicked box
        box.classList.add('selected');

        // Update the hidden input with the selected task type value
        taskTypeInput.value = box.getAttribute('data-type');
    });
});



function printTaskId(taskId) {
    console.log('Task ID: ' + taskId  + ' (This is front-end)' );  // This will log the task ID to the console
}