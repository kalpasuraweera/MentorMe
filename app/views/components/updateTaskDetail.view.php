<!-- Add task form component (pop-up) -->
<!-- used updateOverlay class for this overlay -->
<div id="updateTaskFormOverlay" class="updateOverlay" style="display: none;">
    <div class="popup">
        <h3>Update Task</h3>
        <form id="updateTaskForm" action="" method="post">
            <!-- By this how we recognize which form is this -->
            <input type="hidden" name="form_name" value="updateTaskForm">
            <input type="hidden" id="task_id" name="task_id" value=""> <!-- Hidden task_id -->


            <!-- Task Type Section -->
            <div class="task-type">
                <div class="type-1 type-box" data-type="TO_DO">To Do</div>                       
                <div class="type-2 type-box" data-type="IN_PROGRESS">In Progress</div>
                <div class="type-3 type-box" data-type="PENDING">Pending</div>
                <div class="type-4 type-box" data-type="COMPLETED">Completed</div>
            </div>
            <!-- Hidden input to store selected task type -->
            <input type="hidden" class="taskTypeInput" name="taskType">

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
            <input type="number" id="estimatedTime" name="estimatedTime" min="1" required>
            <br>

            <button type="submit" name="update_task" id="update_task">Update Task</button>
            <button type="button" id="close-button-updateTask-Box" class="close-button-updateTask-Box">Close</button>
        </form>
    </div>
</div>
