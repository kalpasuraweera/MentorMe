<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body class="bg-primary-color">
    <div class="flex justify-center items-center flex-wrap w-full h-screen">
        <div class="bg-white rounded-lg flex flex-col items-center py-10 px-2 mx-10">
            <img src="<?= BASE_URL ?>/public/images/superVisor.png" alt="Your Image"
                class="block max-w-full h-auto mx-auto">
            <h1 class="text-primary-color text-center">Supervisor</h1>
            <p class="text-secondary text-center p-5">Monitor projects and groups you are supervising easily</p>
            <div class="btn-primary-color h-10 px-5 rounded-3xl justify-start items-center gap-2 inline-flex">
                <div class="justify-start items-center flex">
                    <div class="text-white text-xl font-medium font-['DM Sans'] leading-10">
                        Continue
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/arrow_right.png" alt="dashboard icon" class="mx-2">
                </div>
            </div>

        </div>

        <div class="bg-white rounded-lg flex flex-col items-center py-10 px-2 mx-10">
            <img src="<?= BASE_URL ?>/public/images/superVisor.png" alt="Your Image"
                class="block max-w-full h-auto mx-auto">
            <h1 class="text-primary-color text-center">Examiner</h1>
            <p class="text-secondary text-center p-5">Examine projects and groups you are marking easily</p>

            <div class="btn-primary-color h-10 px-5 rounded-3xl justify-start items-center gap-2 inline-flex">
                <div class="justify-start items-center flex">
                    <div class="text-white text-xl font-medium font-['DM Sans'] leading-10">
                        Continue
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/arrow_right.png" alt="dashboard icon" class="mx-2">
                </div>
            </div>
        </div>

    </div>
</body>

</html>