<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/supervisor_biweeklyreport.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body class=".bg-primary-color">
    <div class="layout-container">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 3]) ?>
        <div class="block-2">
            <div class="block-2-header">
                <div class="block-2-header-text">
                    <h1>Bi Weekly Report</h1>
                </div>
            </div>
            <div class="block-2-maincontent-1">
                <div class="block-2-maincontent-2-card-1">
                    
                </div>
            </div>
            <div class="block-2-maincontent-2">

                <?php
                $biweeklyreport = new BiWeeklyReportModel();
                $group = new GroupModel();
                $student = new StudentModel();
                $userId = $_SESSION['user']['user_id'];
                $groups = $group->getGroupDetails($userId);
                $groupIds = array_column($groups, 'group_id');

                // here 1st get groupids according to supervisor id then
                // by group ids we get matching bi weekly reports 
                // since there might be many biweekly report we should print each
                // that s why 2 foreaches
                    foreach ($groupIds as $groupId) {
                        // echo "<script>console.log('group ID :" . json_encode($groupId) . "');</script>";
                        // get detail in group table
                        $projectdetail = $group->getLeaderId($groupId);
                        
                        // get leader data from student table
                        $leaderData = $student->getStudentData($projectdetail[0]['leader_id']);
                    
                        echo "<script>console.log('leader ID :" . json_encode($leaderData) . "');</script>";
                        
                        // get report data from bi weekly each
                        $biweeklyreportdetails = $biweeklyreport->getbiweeklyreportdata($groupId); // Array of reports
                        foreach ($biweeklyreportdetails as $biweeklyreportdetail) {
                        ?>
                            <div class="review-container">
                                <h1 class="review-title">Project : <?= $projectdetail[0]['project_name'] ?> </h1>
                                <div class="report-details">
                                    <!-- Student Details -->
                                    <div class="student-info">
                                        <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="User Icon" class="user-icon">
                                        <p class="student-id"><?= $leaderData[0]['registration_number'] ?></p>
                                    </div>

                                    <!-- Report Sections -->
                                    <div class="report-section">
                                        <h2>Meeting Outcomes</h2>
                                        <p><?= htmlspecialchars($biweeklyreportdetail['meeting_outcomes']) ?></p>
                                    </div>

                                    <div class="report-section">
                                        <h2>Responsibilities for Next Two Weeks</h2>
                                        <p><?= htmlspecialchars($biweeklyreportdetail['next_two_week_work']) ?></p>
                                    </div>

                                    <div class="report-section">
                                        <h2>Summary of Work in the Last Two Weeks</h2>
                                        <p><?= htmlspecialchars($biweeklyreportdetail['past_two_week_work']) ?></p>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="review-buttons">
                                        <button type="button" class="btn-reject">Request Changes</button>
                                        <button type="button" class="btn-approve">Approve & Submit</button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
            </div>
        </div>
    </div>

        <script src="<?= BASE_URL ?>/public/js/pages/supervisor_biweeklyreport.js"></script>
</body>

</html>
