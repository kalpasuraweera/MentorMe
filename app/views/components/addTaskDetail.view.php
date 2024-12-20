<!-- Add task form component (pop-up) -->
<div id="addTaskFormOverlay" class="addOverlay" style="display: none;">
    <div class="addpopup">
        <div class="addpopup-header">
        <h2>Create New Task</h2>
        <button class="close-btn" id="close-button-addTask-Box">&times;</button>
        </div>
        <form class="addpopup-form">
        <label for="task-title">Title</label>
        <input type="text" id="task-title" placeholder="Enter task title" />

        <label for="task-desc">Description</label>
        <textarea id="task-desc" placeholder="Enter task description"></textarea>

        <label for="task-assignee">Assignee</label>
        <input type="text" id="task-assignee" placeholder="Assign to" />

        <label for="task-status">Status</label>
        <select id="task-status">
            <option value="TO_DO">To Do</option>
            <option value="IN_PROGRESS">In Progress</option>
            <option value="PENDING">Pending</option>
            <option value="COMPLETED">Completed</option>
        </select>

        <label for="task-estimated">Estimated Time</label>
        <input type="text" id="task-estimated" placeholder="e.g., 2 hours" />

        <label for="task-due">Due Date</label>
        <input type="date" id="task-due" />

        <button type="submit" class="submit-btn">Create Task</button>
        </form>
    </div>
</div>
