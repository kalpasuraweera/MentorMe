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
                            <div class="task" onclick="showTaskDetails(<?= $task['task_id'] ?>)">
                                <p class="task-id">Task - <?= $task['task_number'] ?></p>
                                <p class="task-title"><?= $task['title'] ?></p>
                                <p class="task-description"><?= substr($task['description'], 0, 50) . '...' ?></p>
                                <div class="task-assigned">
                                    <img src="<?= BASE_URL ?>/public/images/icons/user_circle.svg" alt="user" width="20px">
                                    <p><?= explode(' ', $task['full_name'])[0] ?></p>
                                    <img src="<?= BASE_URL ?>/public/images/icons/clock.svg" alt="clock" width="20px">
                                    <p><?= $task['estimated_time'] ?> hr</p>
                                    <img src="<?= BASE_URL ?>/public/images/icons/calendar.svg" alt="calendar" width="20px">
                                    <p><?= date('M d', strtotime($task['deadline'])) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="task-description">No Todo tasks</p>
                    <?php endif; ?>
                </div>
                <div class="in-progress">
                    <div class="card-2">In Progress</div>
                    <?php if (!empty($pageData['inprogressTasks'])): ?>
                        <?php foreach ($pageData['inprogressTasks'] as $task): ?>
                            <div class="task" onclick="showTaskDetails(<?= $task['task_id'] ?>)">
                                <p class="task-id">Task - <?= $task['task_number'] ?></p>
                                <p class="task-title"><?= $task['title'] ?></p>
                                <p class="task-description"><?= substr($task['description'], 0, 50) . '...' ?></p>
                                <div class="task-assigned">
                                    <img src="<?= BASE_URL ?>/public/images/icons/user_circle.svg" alt="user" width="20px">
                                    <p><?= explode(' ', $task['full_name'])[0] ?></p>
                                    <img src="<?= BASE_URL ?>/public/images/icons/clock.svg" alt="clock" width="20px">
                                    <p><?= $task['estimated_time'] ?> hr</p>
                                    <img src="<?= BASE_URL ?>/public/images/icons/calendar.svg" alt="calendar" width="20px">
                                    <p><?= date('M d', strtotime($task['deadline'])) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="task-description">No in-progress tasks</p>
                    <?php endif; ?>
                </div>

                <div class="pending">
                    <div class="card-3">In Review</div>
                    <?php if (!empty($pageData['inReviewTasks'])): ?>
                        <?php foreach ($pageData['inReviewTasks'] as $task): ?>
                            <div class="task" onclick="showTaskDetails(<?= $task['task_id'] ?>)">
                                <p class="task-id">Task - <?= $task['task_number'] ?></p>
                                <p class="task-title"><?= $task['title'] ?></p>
                                <p class="task-description"><?= substr($task['description'], 0, 50) . '...' ?></p>
                                <div class="task-assigned">
                                    <img src="<?= BASE_URL ?>/public/images/icons/user_circle.svg" alt="user" width="20px">
                                    <p><?= explode(' ', $task['full_name'])[0] ?></p>
                                    <img src="<?= BASE_URL ?>/public/images/icons/clock.svg" alt="clock" width="20px">
                                    <p><?= $task['estimated_time'] ?> hr</p>
                                    <img src="<?= BASE_URL ?>/public/images/icons/calendar.svg" alt="calendar" width="20px">
                                    <p><?= date('M d', strtotime($task['deadline'])) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="task-description">No Tasks In Review</p>
                    <?php endif; ?>
                </div>

                <div class="done">
                    <div class="card-4">Done</div>
                    <?php if (!empty($pageData['completeTasks'])): ?>
                        <?php foreach ($pageData['completeTasks'] as $task): ?>
                            <div class="task" onclick="showTaskDetails(<?= $task['task_id'] ?>)">
                                <p class="task-id">Task - <?= $task['task_number'] ?></p>
                                <p class="task-title"><?= $task['title'] ?></p>
                                <p class="task-description"><?= substr($task['description'], 0, 50) . '...' ?></p>
                                <div class="task-assigned">
                                    <img src="<?= BASE_URL ?>/public/images/icons/user_circle.svg" alt="user" width="20px">
                                    <p><?= explode(' ', $task['full_name'])[0] ?></p>
                                    <img src="<?= BASE_URL ?>/public/images/icons/clock.svg" alt="clock" width="20px">
                                    <p><?= $task['estimated_time'] ?> hr</p>
                                    <img src="<?= BASE_URL ?>/public/images/icons/calendar.svg" alt="calendar" width="20px">
                                    <p><?= date('M d', strtotime($task['deadline'])) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="task-description">No completed tasks</p>
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
                <input type="text" id="task-title" name="task_title" placeholder="Enter task title" />

                <label for="task-desc">Description</label>
                <textarea id="task-desc" name="task_description" placeholder="Enter task description"></textarea>

                <label for="task-assignee">Assignee</label>
                <select id="task_assignee" name="task_assignee" value="<?= $pageData['group_members'][0]['user_id'] ?>">
                    <?php foreach ($pageData['group_members'] as $member): ?>
                        <option value="<?= $member['user_id'] ?>"><?= $member['full_name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- Tasks will be in progress by default -->
                <!-- <label for="task-status">Status</label>
                <select id="task-status" name="task-status">
                    <option value="TO_DO">To Do</option>
                    <option value="IN_PROGRESS">In Progress</option>
                    <option value="PENDING">Pending</option>
                    <option value="COMPLETED">Completed</option>
                </select> -->
                <!-- Users create tasks that can be done in a few hours -->
                <label for="estimated_time">Estimated Time (Hours)</label>
                <input type="number" id="estimated_time" name="estimated_time" />

                <!-- Normally deadline is like next bi-weekly report date.. students has to finish by that date -->
                <label for="deadline">Deadline Date (12 PM)</label>
                <input type="date" id="deadline" name="deadline" />

                <button type="submit" class="submit-btn" name="add_task">Create Task</button>
            </form>
        </div>
    </div>




    <!-- !!!!!!!!! POPUP COMPONENT !!!!!!!!!! -->

    <!-- update task form component (pop-up) -->
    <div id="updateTaskFormOverlay" class="updateOverlay" style="display: none;">
        <div class="updatepopup">
            <form id="updateTaskForm" action="" method="post" class="updateForm">
                <input type="hidden" id="updateTaskIdForm" name="task_id" value="">
                <div class="update-task-container">
                    <div class="close-section">
                        <p id="updateTaskId"></p>
                        <button class="close-btn">&times;</button>
                    </div>
                    <div class="update-task-header">
                        <div class="update-task-header-left">
                            <h2 id="updateTaskTitle"></h2>
                        </div>
                        <div class="header-right">
                            <div id="updateTaskOperations"></div> <!-- Task operations Added dynamically -->
                            <img src="<?= BASE_URL ?>/public/images/icons/menu_vertical.svg" alt="menu" width="20px">
                        </div>
                    </div>
                    <div class="update-task-body">
                        <div class="details">
                            <p id="updateTaskStatus" class="task-status">Done</p>
                            <div class="task-details">
                                <img src="<?= BASE_URL ?>/public/images/icons/user_circle.svg" alt="user" width="20px">
                                <p>Assignee:</p>
                                <strong id="updateFullName"></strong>
                            </div>
                            <div class="task-details">
                                <img src="<?= BASE_URL ?>/public/images/icons/calendar.svg" alt="calendar" width="20px">
                                <p>Due Date:</p>
                                <strong id="updateDeadline"></strong>
                            </div>
                            <div class="task-details">
                                <img src="<?= BASE_URL ?>/public/images/icons/clock.svg" alt="clock" width="20px">
                                <p>Estimated Time:</p>
                                <strong id="updateEstimatedDate"></strong>
                            </div>
                        </div>
                        <div class="history">
                            <h3>History</h3>
                            <div class="data-border">
                                <div class="history-item">
                                    <p>Task Created</p>
                                    <p class="history-data" id="updateDateCreated"></p>
                                </div>
                                <div class="history-item">
                                    <p>Task Started</p>
                                    <p class="history-data" id="updateStartDate"></p>
                                </div>
                                <div class="history-item">
                                    <p>Task Completed</p>
                                    <p class="history-data" id="updateCompleteDate"></p>
                                </div>
                                <div class="history-item">
                                    <p>Task Reviewed</p>
                                    <p class="history-data" id="updateReviewDate"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="description-section">
                        <h3>Description</h3>
                        <textarea id="updateDescription" name="description" rows="6"
                            placeholder="Enter task description"></textarea>

                    </div>
                    <div class="pull-request-section">
                        <h3>Pull Request Link</h3>
                        <div class="data-border">
                            <input type="text" id="updateGitLink" name="git_link" value="">
                        </div>
                    </div>
                    <div class="comments-section">
                        <h3>Comments</h3>
                        <div class="comment-box">
                            <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                                alt="user icon" class="rounded-full"
                                style="height: 30px;width: 30px;object-fit: cover;" />
                            <div class="comment-input">
                                <textarea placeholder="Add a Comment..."></textarea>
                                <button class="comment-btn">Comment</button>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="comment-item">
                                <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                                    alt="user icon" class="rounded-full"
                                    style="height: 30px;width: 30px;object-fit: cover;" />
                                <div class="comment-content">
                                    <div class="comment-header">
                                        <p class="comment-author"><?= $_SESSION['user']['full_name'] ?></p>
                                        <p class="comment-time">2 hours ago</p>
                                    </div>
                                    <p class="comment-text">
                                        What are long descriptions? Long descriptions are text versions of the
                                        information provided in a detailed or complex image.
                                    </p>
                                </div>
                            </div>
                            <div class="comment-item">
                                <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                                    alt="user icon" class="rounded-full"
                                    style="height: 30px;width: 30px;object-fit: cover;" />
                                <div class="comment-content">
                                    <div class="comment-header">
                                        <p class="comment-author"><?= $_SESSION['user']['full_name'] ?></p>
                                        <p class="comment-time">2 hours ago</p>
                                    </div>
                                    <p class="comment-text">
                                        What are long descriptions? Long descriptions are text versions of the
                                        information provided in a detailed or complex image.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        async function showTaskDetails(taskId) {
            try {
                const taskData = await fetchTaskData(taskId);
                document.getElementById('updateTaskFormOverlay').style.display = 'block';
                document.getElementById('updateTaskIdForm').value = taskData.task_id;
                document.getElementById('updateTaskId').innerText = `Task - ${taskData.task_number}`;
                document.getElementById('updateTaskTitle').innerText = taskData.title;
                document.getElementById('updateFullName').innerText = taskData.full_name;
                document.getElementById('updateEstimatedDate').innerText = `${taskData.estimated_time} hours`;
                document.getElementById('updateDeadline').innerText = new Date(taskData.deadline).toLocaleDateString();
                document.getElementById('updateDateCreated').innerText = new Date(taskData.create_time).toLocaleString();
                document.getElementById('updateStartDate').innerText = taskData.start_time ? new Date(taskData.start_time).toLocaleString() : 'Not Started';
                document.getElementById('updateCompleteDate').innerText = taskData.end_time ? new Date(taskData.end_time).toLocaleString() : 'Not Completed';
                document.getElementById('updateReviewDate').innerText = taskData.review_time ? new Date(taskData.review_time).toLocaleString() : 'Not Reviewed';
                document.getElementById('updateDescription').value = taskData.description;
                document.getElementById('updateGitLink').value = taskData.git_link;
                if (taskData.status === 'TO_DO') {
                    document.getElementById('updateTaskOperations').innerHTML = `
                        <button type="submit" name="updateStatusNext" class="move-btn" id="updateStatusNext" value="IN_PROGRESS">Start</button>
                    `;
                    document.getElementById('updateTaskStatus').innerText = 'To Do';
                } else if (taskData.status === 'IN_PROGRESS') {
                    document.getElementById('updateTaskOperations').innerHTML = `
                        <button type="submit" name="updateStatusPrev" class="move-btn" id="updateStatusPrev" value="TO_DO">Abort</button>
                        <button type="submit" name="updateStatusNext" class="move-btn" id="updateStatusNext" value="IN_REVIEW">Complete</button>
                    `;
                    document.getElementById('updateTaskStatus').innerText = 'In Progress';
                } else if (taskData.status === 'IN_REVIEW') {
                    document.getElementById('updateTaskOperations').innerHTML = `
                        <button type="submit" name="updateStatusPrev" class="move-btn" id="updateStatusPrev" value="IN_PROGRESS">Revert</button>
                        <button type="submit" name="updateStatusNext" class="move-btn" id="updateStatusNext" value="COMPLETED">Approve</button>
                    `;
                    document.getElementById('updateTaskStatus').innerText = 'In Review';
                } else if (taskData.status === 'COMPLETED') {
                    document.getElementById('updateTaskStatus').innerText = 'Done';
                }

            } catch (error) {
                console.error('Error fetching task details:', error);
            }
        }

        function fetchTaskData(taskId) {
            return new Promise((resolve, reject) => {
                let xhr = new XMLHttpRequest();
                xhr.open('POST', '<?= BASE_URL ?>/student/fetchTaskDetails', true);
                xhr.onload = function () {
                    if (xhr.status >= 200 && xhr.status < 400) {
                        resolve(JSON.parse(xhr.responseText));
                    } else {
                        reject('Request failed');
                    }
                }
                xhr.onerror = () => reject('Network error');
                let formData = new FormData();
                formData.append('task_id', taskId);
                xhr.send(formData);
            });
        }
    </script>
    <script src="<?= BASE_URL ?>/public/js/pages/student_Task.js"></script>
</body>

</html>