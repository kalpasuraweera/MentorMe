<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/student_tasks.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">

    <title>MentoMe</title>
</head>
<body class=".bg-primary-color">
    <div class="layout-container">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 2]) ?>
        <div class="block-2">
            <div class="block-2-header">
            </div>
            <div class="block-2-middle-1">
                <div class="to-do">
                    <div class="card-1">To Do</div>
                    <?php if (!empty($pageData['todoTasks'])): ?>
                        <?php foreach ($pageData['todoTasks'] as $task): ?>
                            <form action="" method="post" class="task-form" id="taskForm-<?= $task['task_id'] ?>" data-task-id="<?= $task['task_id'] ?>">
                                <!-- Here what we do is getting task detail from backend and save it in attributes like and send it through JS then populate update popup component -->
                                <div class="task" 
                                    data-task-id="<?= $task['task_id'] ?>"
                                    full-name = "<?= $task['full_name'] ?>"
                                    status = "<?= $task['status'] ?>"
                                    estimated-date = "<?= $task['estimated_time'] ?>"
                                    date-created = "<?= $task['date_created'] ?>"
                                    review-date = "<?= $task['review_date'] ?>"
                                    end-date = "<?= $task['end_date'] ?>"
                                    done-date = "<?= $task['done_date'] ?>"
                                    description = "<?= $task["description"] ?>"

                                    onclick="handleTaskClick(this)">
                                    
                                    <h3>Task - <?= $task['task_number'] ?></h3>
                                    <p><?= $task['description'] ?></p>
                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                    <!-- Task operations Update & Delete -->
                                    <div class="task-operations" data-task-id="<?= $task['task_id'] ?>">
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                </div>
                <div class="in-progress">
                    <div class="card-2">In Progress</div>
                    <?php if (!empty($pageData['inprogressTasks'])): ?>
                        <?php foreach ($pageData['inprogressTasks'] as $task): ?>
                            <form action="" method="post" class="task-form" id="taskForm-<?= $task['task_id'] ?>" data-task-id="<?= $task['task_id'] ?>">
                                <div class="task" 
                                    data-task-id="<?= $task['task_id'] ?>"
                                    full-name="<?= $task['full_name'] ?>"
                                    status="<?= $task['status'] ?>"
                                    estimated-date="<?= $task['estimated_time'] ?>"
                                    date-created="<?= $task['date_created'] ?>"
                                    review-date="<?= $task['review_date'] ?>"
                                    end-date="<?= $task['end_date'] ?>"
                                    done-date="<?= $task['done_date'] ?>"
                                    description="<?= $task['description'] ?>"
                                    onclick="handleTaskClick(this)">
                                    
                                    <h3>Task - <?= $task['task_number'] ?></h3>
                                    <p><?= $task['description'] ?></p>
                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                    <!-- Task operations Update & Delete -->
                                    <div class="task-operations" data-task-id="<?= $task['task_id'] ?>"></div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No in-progress tasks</p>
                    <?php endif; ?>
                </div>

                <div class="pending">
                    <div class="card-3">Pending</div>
                    <?php if (!empty($pageData['pendingTasks'])): ?>
                        <?php foreach ($pageData['pendingTasks'] as $task): ?>
                            <form action="" method="post" class="task-form" id="taskForm-<?= $task['task_id'] ?>" data-task-id="<?= $task['task_id'] ?>">
                                <div class="task" 
                                    data-task-id="<?= $task['task_id'] ?>"
                                    full-name="<?= $task['full_name'] ?>"
                                    status="<?= $task['status'] ?>"
                                    estimated-date="<?= $task['estimated_time'] ?>"
                                    date-created="<?= $task['date_created'] ?>"
                                    review-date="<?= $task['review_date'] ?>"
                                    end-date="<?= $task['end_date'] ?>"
                                    done-date="<?= $task['done_date'] ?>"
                                    description="<?= $task['description'] ?>"
                                    onclick="handleTaskClick(this)">
                                    
                                    <h3>Task - <?= $task['task_number'] ?></h3>
                                    <p><?= $task['description'] ?></p>
                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                    <!-- Task operations Update & Delete -->
                                    <div class="task-operations" data-task-id="<?= $task['task_id'] ?>"></div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No pending tasks</p>
                    <?php endif; ?>
                </div>

                <div class="done">
                    <div class="card-4">Done</div>
                    <?php if (!empty($pageData['completeTasks'])): ?>
                        <?php foreach ($pageData['completeTasks'] as $task): ?>
                            <form action="" method="post" class="task-form" id="taskForm-<?= $task['task_id'] ?>" data-task-id="<?= $task['task_id'] ?>">
                                <div class="task" 
                                    data-task-id="<?= $task['task_id'] ?>"
                                    full-name="<?= $task['full_name'] ?>"
                                    status="<?= $task['status'] ?>"
                                    estimated-date="<?= $task['estimated_time'] ?>"
                                    date-created="<?= $task['date_created'] ?>"
                                    review-date="<?= $task['review_date'] ?>"
                                    end-date="<?= $task['end_date'] ?>"
                                    done-date="<?= $task['done_date'] ?>"
                                    description="<?= $task['description'] ?>"
                                    onclick="handleTaskClick(this)">
                                    
                                    <h3>Task - <?= $task['task_number'] ?></h3>
                                    <p><?= $task['description'] ?></p>
                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                    <!-- Task operations Update & Delete -->
                                    <div class="task-operations" data-task-id="<?= $task['task_id'] ?>"></div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="plus-container">
                <button class="plus-button" id="addTaskDetail">+</button>
            </div>
        </div>
        </div>

    </div>

    <!-- !!!!!!!!! POPUP COMPONENT !!!!!!!!!! -->

    <!-- Add task form component (pop-up) -->
    <div id="addTaskFormOverlay" class="addOverlay" style="display: none;">

        <div class="addpopup">
            <div class="addpopup-header">
                <h2>Create New Task</h2>
                <button class="close-btn" id="close-button-addTask-Box">&times;</button>
            </div>
            <form class="addpopup-form" method="POST">
                <label for="task-title">Title</label>
                <input type="text" id="task-title" name="task-title" placeholder="Enter task title" />

                <label for="task-desc">Description</label>
                <textarea id="task-desc" name="task-desc" placeholder="Enter task description"></textarea>

                <label for="task-assignee">Assignee</label>
                <select id="task-assignee" name="task-assignee">
                    <?php if (!empty($pageData['group_members'])): ?>
                        <?php foreach ($pageData['group_members'] as $member): ?>
                            <option value="<?= $member['user_id'] ?>"><?= $member['full_name'] ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                </select>

                <label for="task-status">Status</label>
                <select id="task-status" name="task-status">
                    <option value="TO_DO">To Do</option>
                    <option value="IN_PROGRESS">In Progress</option>
                    <option value="PENDING">Pending</option>
                    <option value="COMPLETED">Completed</option>
                </select>

                <label for="estimated-date">Estimated Date</label>
                <input type="date" id="estimated-date" name="estimated-date" />

                <button type="submit" class="submit-btn" name="add_task">Create Task</button>
            </form>
        </div>
    </div>




    <!-- !!!!!!!!! POPUP COMPONENT !!!!!!!!!! -->

    <!-- update task form component (pop-up) -->
    <div id="updateTaskFormOverlay" class="updateOverlay" style="display: none;">

        <div class="updatepopup">
            <form id="updateTaskForm" action="" method="post" class="updateForm">
                <input type="hidden" id="updateTaskIdForm"  name="task_id" value="">
   
                <div class="update-task-container">
                    <div class="update-task-header">
                        <div class="update-task-header-left">
                            <h2 id="updateTaskId"></h2>
                            <!-- <h2>Create Coordinator Dashboard</h2> -->
                            <!-- <span class="status-badge">Done</span> -->
                        </div>
                        <div class="header-right">
                            <button class="move-btn" id="updateStatusPrev"></button>
                            <button class="move-btn" id="updateStatusNext"></button>
                            <button class="close-btn">&times;</button>
                        </div>
                    </div>

                    <div class="update-task-body">
                        <div class="details">
                            <p><strong>Assignee:</strong></p> <p id="updateFullName"></p>
                            <p><strong>Due Date:</strong> </p> <p id="updateEstimatedDate"></p>
                            <p><strong>Estimated Date:</strong> </p> <p id="updateEndDate"></p>
                        </div>

                        <div class="history">
                        <h3>History</h3>
                        <div class="data-border">
                            <ul>
                                <li id="updateDateCreated"><strong>Task Created</strong></li>
                                <li id="updateAssigneDate"><strong>Task Assigned</strong></li>
                                <li id ="updateCompleteDate"><strong>Task Completed</strong></li>
                                <li id="updateReviewDate"><strong>Task Reviewed</strong></li>
                            </ul>
                        </div>
                        </div>
                    </div>

                    <div class="description-section">
                        <h3>Description</h3>
                        <div class="data-border">
                            <p id="updateDescription">
                                description here. overwritten by js
                            </p>
                        </div>
                    </div>

                    <div class="pull-request-section">
                        <h3>Pull Request Link</h3>
                        <div class="data-border">
                            <a href="https://github.com/mentorme/pull/1" target="_blank">
                                https://github.com/mentorme/pull/1
                            </a>
                        </div>
                    </div>

                    <button class="update-btn" name="update-task">Update</button>

                    <div class="comments-section">
                        <h3>Comments</h3>
                        <textarea placeholder="thamindu"></textarea>
                        <button class="comment-btn">Comment</button>

                        <div class="comment-list">
                        <div class="comment">
                            <p><strong>Kalpa Suraweera</strong> <span>Aug 16, 2024, 11:06 PM</span></p>
                            <p>
                            What are long descriptions? Long descriptions are text versions of the
                            information provided in a detailed or complex image.
                            </p>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="<?= BASE_URL ?>/public/js/pages/student_Task.js"></script>
</body>
</html>
