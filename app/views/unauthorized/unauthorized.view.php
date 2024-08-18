<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Authorized</title>
</head>

<body>
    Your Current Role is <?= $_SESSION['user']['role'] ?? "not logged in" ?>
    <h1>Access Denied</h1>
    <p>You do not have permission to access this page.</p>
    <a href="<?= BASE_URL ?>/auth/login">Login Again</a>
</body>

</html>