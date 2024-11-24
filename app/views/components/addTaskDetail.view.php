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

            <!-- Estimated Time Input -->
            <label for="estimatedTime">Estimated Time:</label>
            <input type="date" id="estimatedTime" name="estimatedTime" required>
            <br>

            <button type="submit" name="add_task" id="add_task">Add Task</button>
            <button type="button" id="close-button-addTask-Box" class="close-button-addTask-Box">Close</button>
        </form>
    </div>
</div>
