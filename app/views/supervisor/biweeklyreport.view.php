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
                // Log report data for debugging
                // echo "<script>console.log('Report data: " . json_encode($pageData['reports']) . "');</script>";
                
                // Ensure $reports is set and is an array
                $reports = $pageData['reports'] ?? [];
                foreach ($reports as $report): ?>
                
                        <div class="review-container">
                                <!-- Check if biweekly_reports exists and is not empty -->
                                <?php if (!empty($report['biweekly_reports'])): ?>
                                        <?php foreach ($report['biweekly_reports'] as $biweeklyReport): ?>
                                                <h1 class="review-title">Project: <?= htmlspecialchars($report['project_name']) ?></h1>
                                                <div class="report-details">
                                                    <!-- Student Details -->
                                                    <div class="student-info">
                                                        <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="User Icon" class="user-icon">
                                                        <p class="student-id"><?= htmlspecialchars($report['leader_data']['registration_number']) ?></p>
                                                    </div>
                                                <div class="report-section">
                                                    <h2>Meeting Outcomes</h2>
                                                    <p><?= htmlspecialchars($biweeklyReport['meeting_outcomes']) ?></p>
                                                </div>

                                                <div class="report-section">
                                                    <h2>Responsibilities for Next Two Weeks</h2>
                                                    <p><?= htmlspecialchars($biweeklyReport['next_two_week_work']) ?></p>
                                                </div>

                                                <div class="report-section">
                                                    <h2>Summary of Work in the Last Two Weeks</h2>
                                                    <p><?= htmlspecialchars($biweeklyReport['past_two_week_work']) ?></p>
                                                </div>

                                                <!-- Buttons -->
                                                <div class="review-buttons">
                                                    <button type="button" class="btn-reject">Request Changes</button>
                                                    <button type="button" class="btn-approve">Approve & Submit</button>
                                                </div>
                                        <?php endforeach; ?>
                                <?php else: ?>
                                        <p>No biweekly reports available for this project.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>


        </div>
    </div>

        <script src="<?= BASE_URL ?>/public/js/pages/supervisor_biweeklyreport.js"></script>
</body>

</html>
