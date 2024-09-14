<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/student_calender.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">

    <title>MentoMe</title>
</head>
<body class=".bg-primary-color">
    <div class="layout-container">
        <?php $this->renderComponent('studentSideBar', ['activeIndex' => 1]) ?>
        <div class="block-2">
            <div class="block-2-header">
                <h1>calender</h1>
            </div>
     


        </div>

    </div>
    <script src="<?= BASE_URL ?>/public/js/pages/student_dashboard.js"></script>
</body>
</html>
