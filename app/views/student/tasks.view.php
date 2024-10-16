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
                <h1>Tasks</h1>
            </div>
            <div class="block-2-middle-1">
                <div class="to-do">
                    <div class="card-1">To Do</div>
                    <div class="task">
                        <h3>Task - 1</h3>
                        <p>This is description of the task of this pirticular detail</p>
                    </div>


                </div>
                <div class="in-progress">
                    <div class="card-2">In progress</div>
                    <?php if(!empty($pageData['inprogressTasks'])): ?>
                        <?php foreach($pageData['inprogressTasks'] as $task): ?>
                            <div class="task">
                                <h3>Task - <?= $task['task_id'] ?></h3>
                                <p><?= $task['description'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                </div>
                <div class="pending">
                    <div class="card-3">Pending</div>
                    <?php if(!empty($pageData['pendingTasks'])): ?>
                        <?php foreach($pageData['pendingTasks'] as $task): ?>
                            <div class="task">
                                <h3>Task - <?= $task['task_id'] ?></h3>
                                <p><?= $task['description'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                </div>
                <div class="done">
                    <div class="card-4">Done</div>
                    <?php if(!empty($pageData['completeTasks'])): ?>
                        <?php foreach($pageData['completeTasks'] as $task): ?>
                            <div class="task">
                                <h3>Task - <?= $task['task_id'] ?></h3>
                                <p><?= $task['description'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                </div>
                </div>
            </div>
        </div>

    </div>
    <script src="<?= BASE_URL ?>/public/js/pages/student_dashboard.js"></script>
</body>
</html>
