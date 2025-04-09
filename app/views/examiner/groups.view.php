<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 2]) ?>
        <div class="flex flex-col w-3/4 px-5 h-screen overflow-y-scroll">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Manage Groups</h1>
                <div class="flex flex-row items-center my-2">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $_SESSION['user']['profile_picture'] ?>"
                        alt="user icon" class="rounded-full" style="height: 60px;width: 60px;object-fit: cover;">
                </div>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <?php if (empty($pageData['groupList'])): ?>
                        <p class="text-center text-secondary-color">No groups found</p>
                <?php endif; ?>
                <?php foreach ($pageData['groupList'] as $group): ?>
                        <!-- Group Card -->
                        <div class="flex flex-col bg-white shadow rounded-xl p-5">
                            <p class="text-lg font-bold text-primary-color">Group
                                <?= $group['group_id'] . ' - ' . $group['project_name'] ?>
                            </p>
                            <div class="flex flex-row gap-5 justify-evenly align-center my-5">
                                <div>
                                    <canvas id="<?= $group['group_id'] ?>"></canvas>
                                </div>
                                <div class="flex flex-col gap-5">
                                    <p class="text-lg font-bold text-primary-color">Student Performance</p>
                                    <?php foreach ($group['members'] as $member): ?>
                                            <div class="flex items-center">
                                                <img src="<?= BASE_URL ?>/public/images/profile_pictures/<?= $member['profile_picture'] ?>" alt="user icon"
                                                    width="40" height="40">
                                                <div class="flex flex-col px-2">
                                                    <p class="text-black font-bold"><?= $member['full_name'] ?></p>
                                                    <p class="text-secondary-color">Last Task: <?= $member['TasksDetails']['LastCompletedTask'] ?></p>
                                                </div>
                                                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                                                    <p class="text-white font-bold"><?= $member['TasksDetails']['CompletedCount'] ?></p>
                                                </div>
                                            </div>
                                    <?php endforeach; ?>
                                    
                                </div>
                                <div class="flex flex-col gap-5 justify-evenly align-center">
                                    <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                        href="<?= BASE_URL ?>/supervisor/tasks?group_id=<?= $group['group_id'] ?>">
                                        Tasks
                                    </a>
                                    <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                        href="<?= BASE_URL ?>/supervisor/calendar?group_id=<?= $group['group_id'] ?>">
                                        Calendar
                                    </a>
                                    <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                        href="<?= BASE_URL ?>/supervisor/feedbacks?group_id=<?= $group['group_id'] ?>">
                                        Feedbacks
                                    </a>
                                    <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                        href="<?= BASE_URL ?>/supervisor/requests?group_id=<?= $group['group_id'] ?>">
                                        Requests
                                    </a>
                                    <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                        href="<?= BASE_URL ?>/supervisor/notes?group_id=<?= $group['group_id'] ?>">
                                        Notes
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script>
        const groupData = <?= json_encode($pageData['groupList']) ?>;
        const memberName = [];
        const TaskDetail = [];

        // console.log(groupData);

        groupData.forEach(group => {
            group['members'].forEach(member =>{
                // creating a new array with having only name detals
                if(!memberName[group['group_id']]){
                    memberName[group['group_id']] = [];
                }
                memberName[group['group_id']].push(member['full_name']);

                // creating a new array with having only task details
                if(!TaskDetail[group['group_id']]){
                    TaskDetail[group['group_id']] = [];
                }
                const taskCount = member['TasksDetails']['CompletedCount'] ?? 0;
                TaskDetail[group['group_id']].push(taskCount);

            })
            // console.log(TaskDetail);

            const ctx = document.getElementById(group.group_id).getContext('2d');
            const chart = new Chart(ctx, {
                type: "doughnut",
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: "Overall Completion",
                        },
                    },
                },
                data: {
                    labels: memberName[group['group_id']],
                    datasets: [
                        {
                            label: "Tasks",
                            data: TaskDetail[group['group_id']],
                            backgroundColor: ["#4A3AFF", "#2D5BFF", "#93AAFD", "#C6D2FD"],
                            borderColor: ["#4A3AFF", "#2D5BFF", "#93AAFD", "#C6D2FD"],
                            borderWidth: 1,
                        },
                    ],
                },
            });
        });
    </script>
</body>

</html>