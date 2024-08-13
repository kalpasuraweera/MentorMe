<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <div class="flex flex-row">
        <div class="flex flex-col w-1/4 bg-indigo-900 text-white">
            <div class="flex flex-col items-center p-5">
                <img src="<?= BASE_URL ?>/public/images/dashboard_logo.png" alt="dashboard logo">
            </div>
            <div class="flex flex-col items-center">
                <a href="<?= BASE_URL ?>/coordinator/dashboard" class="p-4 hover:bg-indigo-800">Dashboard</a>
                <a href="<?= BASE_URL ?>/coordinator/students" class="p-4 hover:bg-indigo-800">Students</a>
                <a href="<?= BASE_URL ?>/coordinator/feedbacks" class="p-4 hover:bg-indigo-800">Feedbacks</a>
                <a href="<?= BASE_URL ?>/coordinator/logout" class="p-4 hover:bg-indigo-800">Logout</a>
            </div>
        </div>
        <div class="flex flex-col w-3/4 p-5">
            <h1 class="text-2xl font-bold my-5">Coordinator Dashboard</h1>
            <div class="flex flex-row">
                <div class="flex flex-col w-1/2 p-5">
                    <h2 class="text-xl font-bold my-5">Students</h2>
                    <table border="1">
                        <tr>
                            <th>Student Name</th>
                            <th>Group</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Group 1</td>
                        </tr>
                        <tr>
                            <td>Jane Doe</td>
                            <td>Group 2</td>
                        </tr>
                    </table>
                </div>
                <div class="flex flex-col w-1/2 p-5">
                    <h2 class="text-xl font-bold my-5">Feedbacks</h2>
                    <table border="1">
                        <tr>
                            <th>Student Name</th>
                            <th>Feedback</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>Good</td>
                        </tr>
                        <tr>
                            <td>Jane Doe</td>
                            <td>Excellent</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</body>

</html>