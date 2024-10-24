//task add popup machanis,

const addTaskDetail = document.getElementById("addTaskDetail");
const details = document.getElementById("addTaskFormOverlay"); // Reference to the form overlay
const closeAddTaskDetail = document.getElementById("close-button-Task-Box");

addTaskDetail.addEventListener('click', function() {
    //alert("clicked task box");
    details.style.display = 'block';  // Display the form overlay
});

closeAddTaskDetail.addEventListener('click', function() {
    //alert("clicked task box");
    details.style.display = 'none'
})



//after popup inside machanisms

// Select all task type boxes
const taskTypeBoxes = document.querySelectorAll('.type-box');
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


