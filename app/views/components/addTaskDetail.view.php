<!-- Add task form component (pop-up) -->
<div id="addTaskFormOverlay" class="addOverlay" style="display: none;">
    <div class="popup">
        <h3>Add a New Task</h3>
        <form id="addTaskForm" action="" method="post">
            <!-- By this how we recognize which form is this -->
            <input type="hidden" name="form_name" value="addTaskForm">

            <label for="taskDescription">Task Description:</label>
            <textarea id="taskDescription" name="taskDescription" required></textarea>
            <br>

            <!-- Start Date Input -->
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" name="startDate" required>
            <br>

            <!-- End Date Input -->
            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" name="endDate" required>
            <br>

            <!-- Estimated Time Input -->
            <label for="estimatedTime">Estimated Time (hours):</label>
            <input type="date" id="estimatedTime" name="estimatedTime" min="1" required>
            <br>

            <button type="submit" name="add_task" id="add_task">Add Task</button>
            <button type="button" id="close-button-addTask-Box" class="close-button-addTask-Box">Close</button>
        </form>
    </div>
</div>
