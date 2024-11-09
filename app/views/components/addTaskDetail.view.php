<!-- Add task form component (pop-up) -->
<div id="addTaskFormOverlay" class="addOverlay" style="display: none;">
    <div class="popup">
        <h3>Add a New Task</h3>
        <form id="addTaskForm" action="" method="post">
            <!-- By this how we recognize which form is this -->
            <input type="hidden" name="form_name" value="addTaskForm">

            <!-- Task Type Section -->
            <div class="task-type">
                <div class="type-1 type-box" data-type="TO_DO">To Do</div>                       
                <div class="type-2 type-box" data-type="IN_PROGRESS">In Progress</div>
                <div class="type-3 type-box" data-type="PENDING">Pending</div>
                <div class="type-4 type-box" data-type="COMPLETED">Completed</div>
            </div>
            <!-- Hidden input to store selected task type -->
            <input type="hidden" id="taskTypeInput" name="taskType" value="">

            <label for="taskTitle">Task Title:</label>
            <input type="text" id="taskTitle" name="taskTitle" required>
            <br>

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

            <button type="submit">Add Task</button>
            <button type="button" id="close-button-addTask-Box" class="close-button-addTask-Box">Close</button>
        </form>
    </div>
</div>
