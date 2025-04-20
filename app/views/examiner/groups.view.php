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
                                <canvas id="<?= $group['group_id'] . '_distribution' ?>"></canvas>
                            </div>
                            <div class="flex flex-col gap-5">
                                <p class="text-lg font-bold text-primary-color">Student Performance</p>
                                <div id="<?= $group['group_id'] . '_members' ?>" class="flex flex-col gap-5">

                                </div>
                            </div>
                            <div class="flex flex-col gap-5 justify-evenly align-center">
                                <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    href="<?= BASE_URL ?>/examiner/tasks?group_id=<?= $group['group_id'] ?>">
                                    Tasks
                                </a>

                                <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    href="<?= BASE_URL ?>/examiner/calendar">
                                   calendar
                                </a>


                                <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    href="<?= BASE_URL ?>/examiner/calendar?group_id=<?= $group['group_id'] ?>">
                                    Calendar
                                </a>
                                <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    href="<?= BASE_URL ?>/examiner/feedbacks?group_id=<?= $group['group_id'] ?>">
                                    Feedbacks
                                </a>
                                <a class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                                    href="<?= BASE_URL ?>/examiner/notes?group_id=<?= $group['group_id'] ?>">
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
        const groupData = <?= json_encode(array_values($pageData['groupList'])) ?>;
        const allTasks = <?= json_encode(array_values($pageData['allTasks'])) ?>;
        groupData.forEach(group => {
            const groupTasks = allTasks.filter(task => task.group_id === group.group_id);
            const groupMembers = [...new Map(
                groupTasks.map(task => [task.assignee_id, {
                    assignee_id: task.assignee_id,
                    full_name: task.assignee_name,
                    profile_picture: task.profile_picture,
                    completed_tasks: 0,
                    task_count: 0,
                }])
            ).values()].map(member => {
                const tasks = groupTasks.filter(task => task.assignee_id === member.assignee_id);
                member.task_count = tasks.length;
                member.completed_tasks = tasks.filter(task => task.status === 'COMPLETED').length;
                return member;
            });

            document.getElementById(`${group.group_id}_members`).innerHTML = groupMembers.map(member => `
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <img src="<?= BASE_URL ?>/public/images/profile_pictures/${member.profile_picture}" alt="user icon"
                        class="rounded-full" style="height: 40px;width: 40px;object-fit: cover;">
                    <div class="flex flex-col px-2">
                        <p class="text-black font-bold">${member.full_name}</p>
                        <p class="text-secondary-color">Completed Tasks: ${member.completed_tasks}</p>
                    </div>
                </div>
                <div class="flex flex-col p-4 ml-4 bg-green rounded-xl">
                    <p class="text-white font-bold">${member.task_count}</p>
                </div>
            </div>
            `).join('');

            const ctx = document.getElementById(`${group.group_id}_distribution`).getContext('2d');
            const chart = new Chart(ctx, {
                type: "doughnut",
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: "Task Distribution",
                        },
                        legend: { position: 'bottom' }
                    },
                },
                data: {
                    labels: groupMembers.map(member => member.full_name),
                    datasets: [
                        {
                            label: "Tasks",
                            data: groupMembers.map(member => member.task_count),
                            backgroundColor: ['#6D28D9', '#4F46E5', '#A78BFA', '#C4B5FD', '#E0C3FF', '#F3E8FF'],
                        },
                    ],
                },
            });
        });
    </script>
</body>

</html>