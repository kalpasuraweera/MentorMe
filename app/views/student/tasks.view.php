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
                    <?php if(!empty($pageData['todoTasks'])): ?>
                        <?php foreach($pageData['todoTasks'] as $task): ?>
                            <form action="" method="post" class="task-form" id="taskForm">
                                <div class="task">
                                    <h3>Task - <?= $task['task_id'] ?></h3>
                                    <p><?= $task['description'] ?></p>
                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                    <!-- Task operations Update & Delete -->
                                    <div class="task-operations">
                                        <!-- Set task_id as value of updateAction to pass to the form -->
                                        <button type="button" name="updateAction" value="<?= $task['task_id'] ?>" class="updateTaskDetail" 
                                            data-task-status="<?= $task['status'] ?>"
                                            data-task-description="<?= $task['description'] ?>" 
                                            data-task-estimatedTime="<?= $task['estimated_time'] ?>" 
                                            data-task-startDate="<?= $task['start_date'] ?>"
                                            data-task-endDate="<?= $task['end_date'] ?>"
                                            >
                                            <!-- Icon that used to trigger update task -->
                                            <img src="<?= BASE_URL ?>/public/images/icons/settings.png" alt="pencilPic">
                                        </button>
                                        <!-- Icon that used to triger delete Task -->
                                        <button type="submit" name="deleteAction" value="delete" class="cross-button"></button>
                                    </div>                                
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                </div>
                <div class="in-progress">
                    <div class="card-2">In progress</div>
                    <?php if(!empty($pageData['inprogressTasks'])): ?>
                        <?php foreach($pageData['inprogressTasks'] as $task): ?>
                            <form action="" method="post" class="task-form" id="taskForm">
                                <div class="task">
                                    <h3>Task - <?= $task['task_id'] ?></h3>
                                    <p><?= $task['description'] ?></p>
                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                    <!-- Task operations Update & Delete -->
                                    <div class="task-operations">
                                        <!-- Set task_id as value of updateAction to pass to the form -->
                                        <button type="button" name="updateAction" value="<?= $task['task_id'] ?>" class="updateTaskDetail" 
                                            data-task-status="<?= $task['status'] ?>"
                                            data-task-description="<?= $task['description'] ?>" 
                                            data-task-estimatedTime="<?= $task['estimated_time'] ?>" 
                                            data-task-startDate="<?= $task['start_date'] ?>"
                                            data-task-endDate="<?= $task['end_date'] ?>"
                                            >                                            <!-- Icon that used to trigger update task -->
                                            <img src="<?= BASE_URL ?>/public/images/icons/settings.png" alt="pencilPic">
                                        </button>
                                        <!-- Icon that used to triger delete Task -->
                                        <button type="submit" name="deleteAction" value="delete" class="cross-button"></button>
                                    </div>                                
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                </div>
                <div class="pending">
                    <div class="card-3">Pending</div>
                    <?php if(!empty($pageData['pendingTasks'])): ?>
                        <?php foreach($pageData['pendingTasks'] as $task): ?>
                            <form action="" method="post" class="task-form" id="taskForm">
                                <div class="task">
                                    <h3>Task - <?= $task['task_id'] ?></h3>
                                    <p><?= $task['description'] ?></p>
                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                    <!-- Task operations Update & Delete -->
                                    <div class="task-operations">
                                        <!-- Set task_id as value of updateAction to pass to the form -->
                                        <button type="button" name="updateAction" value="<?= $task['task_id'] ?>" class="updateTaskDetail" 
                                            data-task-status="<?= $task['status'] ?>"
                                            data-task-description="<?= $task['description'] ?>" 
                                            data-task-estimatedTime="<?= $task['estimated_time'] ?>" 
                                            data-task-startDate="<?= $task['start_date'] ?>"
                                            data-task-endDate="<?= $task['end_date'] ?>"
                                            >                                            <!-- Icon that used to trigger update task -->
                                            <img src="<?= BASE_URL ?>/public/images/icons/settings.png" alt="pencilPic">
                                        </button>
                                        <!-- Icon that used to triger delete Task -->
                                        <button type="submit" name="deleteAction" value="delete" class="cross-button"></button>
                                    </div>                                
                                </div>
                            </form>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                </div>
                <div class="done">
                    <div class="card-4">Done</div>
                    <?php if(!empty($pageData['completeTasks'])): ?>
                        <?php foreach($pageData['completeTasks'] as $task): ?>
                            <form action="" method="post" class="task-form" id="taskForm">
                                <div class="task">
                                    <h3>Task - <?= $task['task_id'] ?></h3>
                                    <p><?= $task['description'] ?></p>
                                    <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">
                                    <!-- Task operations Update & Delete -->
                                    <div class="task-operations">
                                        <!-- Set task_id as value of updateAction to pass to the form -->
                                        <button type="button" name="updateAction" value="<?= $task['task_id'] ?>" class="updateTaskDetail" 
                                            data-task-status="<?= $task['status'] ?>"
                                            data-task-description="<?= $task['description'] ?>" 
                                            data-task-estimatedTime="<?= $task['estimated_time'] ?>" 
                                            data-task-startDate="<?= $task['start_date'] ?>"
                                            data-task-endDate="<?= $task['end_date'] ?>"
                                            >                                            <!-- Icon that used to trigger update task -->
                                            <img src="<?= BASE_URL ?>/public/images/icons/settings.png" alt="pencilPic">
                                        </button>
                                        <!-- Icon that used to triger delete Task -->
                                        <button type="submit" name="deleteAction" value="delete" class="cross-button"></button>
                                    </div>                                
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
            <?php $this->renderComponent('addTaskDetail')?>
            <?php $this->renderComponent('updateTaskDetail')?>


        </div>
        </div>

    </div>
    <script src="<?= BASE_URL ?>/public/js/pages/student_Task.js"></script>
</body>
</html>
