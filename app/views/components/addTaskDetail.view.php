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
        <select id="task-assignee">
            <option value="TO_DO">To Do</option>
            <option value="IN_PROGRESS">In Progress</option>
            <option value="PENDING">Pending</option>
            <option value="COMPLETED">Completed</option>
        </select>

        <label for="task-status">Status</label>
        <select id="task-status">
            <option value="TO_DO">To Do</option>
            <option value="IN_PROGRESS">In Progress</option>
            <option value="PENDING">Pending</option>
            <option value="COMPLETED">Completed</option>
        </select>

        <label for="estimated-date">Estimated-Date</label>
        <input type="date" id="estimated-date" />

        <button type="submit" class="submit-btn">Create Task</button>
    
        <?php if(!empty($pageData['pendingTasks'])): ?>
                    <?php foreach($pageData['pendingTasks'] as $task): ?>
                            <form action="" method="post" class="task-form" id="taskForm">
                                <div class="task">
                                <h3>Task - <?= $task['task_number'] ?></h3>
                                <p><?= $task['description'] ?></p>
                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                    <!-- Task operations Update & Delete -->
                                    <div class="task-operations">
                                        <!-- Set task_id as value of updateAction to pass to the form -->
                                        <button type="button" name="updateAction" value="<?= $task['task_id'] ?>"
                                            data-task-status="<?= $task['status'] ?>"
                                            data-task-description="<?= $task['description'] ?>" 
                                            data-task-estimatedTime="<?= $task['estimated_time'] ?>" 
                                            data-task-startDate="<?= $task['start_date'] ?>"
                                            data-task-endDate="<?= $task['end_date'] ?>"
                                            >                                            
                                        </button>
                                    </div>                                
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
    
    </form>

    </div>
</div>
