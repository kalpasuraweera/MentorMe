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
                    <div class="task" style="border-left: 5px solid #4318ff;">
                        <h3 class="task-name">Task 1</h3>
                        <h4 class="task-date">UI Design Review</h4>
                    </div>
                    <div class="task" style="border-left: 5px solid #ff1843;">
                        <h3 class="task-name">Task 2</h3>
                        <h4 class="task-date">Backend API Integration</h4>
                    </div>
                    <div class="task" style="border-left: 5px solid #18ff43;">
                        <h3 class="task-name">Task 3</h3>
                        <h4 class="task-date">Database Optimization</h4>
                    </div>
                    <div class="task" style="border-left: 5px solid #4318ff;">
                        <h3 class="task-name">Task 4</h3>
                        <h4 class="task-date">User Feedback Implementation</h4>
                    </div>
                </div>

                    <button><a href="<?=BASE_URL?>/student/tasks">view all</a></button>
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

                        <!-- rendering event details -->
                        <?php if (isset($_SESSION['events']) && is_array($_SESSION['events'])): ?>
                            <?php 
                                // Limit the events array to the first 4 elements
                                $limitedEvents = array_slice($_SESSION['events'], 0, 4);
                            ?>
                            <?php foreach ($limitedEvents as $index => $event): ?>
                                <div class="event" style="border-left: 5px solid <?= $index % 2 === 0 ? '#4318ff' : '#ff1843'; ?>;">
                                        <p class="event-name"><?= $event['title'] ?></p>
                                        <p class="event-date"><?= $event['end_date'] ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No events available.</p>
                        <?php endif; ?>

                    </div>
                    <button><a href="<?=BASE_URL?>/student/schedules">view all</a></button>
                </div>
            </div>
        
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script src="<?= BASE_URL ?>/public/js/pages/student_dashboard.js"></script>
</body>
</html>

