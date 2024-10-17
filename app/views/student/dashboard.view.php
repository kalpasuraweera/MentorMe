<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/student_dashboard.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">

    <title>MentoMe</title>
</head>
<body class=".bg-primary-color">
    <div class="layout-container">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 0]) ?>
        <div class="block-2">
            <div class="block-2-header">
                <div class="block-2-header-text">
                    <h1>Dashboard</h1>
                </div>
                <div class="profile">
                    <div class="profile-detail">
                        <h1><?= $_SESSION['user']['role'] ?></h1>
                        <h3><?= $_SESSION['user']['email'] ?></h3></div>
                    <div class="profile-picture">
                        <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="profile pic"  id="popupProfile">
                    </div>
                </div>
            </div>
            <?php $this->renderComponent('profile')?>
            <div class="block-2-maincontent-1">
                <div class="block-2-maincontent-1-card-1">
                    <h2>Total Tasks<br>100</h2>
                    
                </div>
                <div class="block-2-maincontent-1-card-2">
                    <h2>Finished Tasks</h2>
                </div>
                <div class="block-2-maincontent-1-card-3">
                    <h2>Yet to finish</h2>
                </div>
                <div class="block-2-maincontent-1-card-4">
                    <h2>Total Finish Tasks</h2>
                </div>
            </div>            
            <div class="block-2-maincontent-2">
                <div class="block-2-maincontent-2-card-1">
                    <h2>Visitor Insights</h2>
                        <!-- importing charts to web -->
                        <canvas id="CurrentSpeed"></canvas>
                </div>
                <div class="block-2-maincontent-2-card-2">
                    <h2>Assigned Tasks</h2>
                    <div class="tasks">
                     
                    <!-- Rendering Task detail from DB only shows first 4 -->
                    <?php if(!empty($pageData['inprogressTasks'])): ?>
                        <?php $sliceArray = array_slice($pageData['inprogressTasks'], 0, 4); ?>
                        <?php foreach($sliceArray as $task): ?>
                            <div class="task" style="border-left: 5px solid #4318ff;">
                                <h3 class="task-name">Task - <?= $task['task_id']?> </h3>
                                <h4 class="task-detail"><?= $task['description'] ?></h4>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No completed tasks</p>
                    <?php endif; ?>
                    
                </div>
                    <button onClick="window.location.href='<?= BASE_URL ?>/student/tasks'">view all</button>
                </div>
            </div>
            <div class="block-2-maincontent-3">
                <div class="block-2-maincontent-3-card-1">
                    <h2>Total Finished Tasks</h2>
                    <!-- importing charts to web -->
                    <canvas id="finishedTasks"></canvas>
                </div>
                <div class="block-2-maincontent-3-card-2">
                    <h2>Upcomming Events</h2> 
                    <div class="events">
                        <div class="event" style="border-left: 5px solid #4318ff;">
                            <p class="event-name">Bi-weekly report</p>
                            <p class="event-date">2024.5.13</p>
                        </div>
                        <div class="event" style="border-left: 5px solid #ff1843;">
                            <p class="event-name">Mentorship Session</p>
                            <p class="event-date">2024.6.4</p>
                        </div>
                        <div class="event" style="border-left: 5px solid #18ff43;">
                            <p class="event-name">Training Session</p>
                            <p class="event-date">2024.8.18</p>
                        </div>
                        <div class="event" style="border-left: 5px solid #4318ff;">
                            <p class="event-name">supervisor meeting</p>
                            <p class="event-date">2024.8.18</p>
                        </div>
                    </div>
                    <button onClick="window.location.href='<?= BASE_URL ?>/student/tasks'">view all</button>
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script src="<?= BASE_URL ?>/public/js/pages/student_dashboard.js"></script>
</body>
</html>

