<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex">
        <h1 class="text-primary-color">Home Page</h1>
        <p class="text-xs mt-0 sm:font-bold">Welcome to MentorMe</p>
    </div>
    <h1 class="text-primary-color text-6xl font-bold my-5">MentorMe</h1>
    <?php $this->renderComponent('button', ['text' => 'Get Started']) ?>
    <?php $this->renderComponent('button', ['text' => 'This is Custom Button']) ?>
    <?php $this->renderComponent('button', [
        'text' => 'Login',
        'onClick' => 'handleRedirect(\'auth/login\')'
    ]) ?>
    <script src="<?= BASE_URL ?>/public/js/index.js"></script>
</body>

</html>