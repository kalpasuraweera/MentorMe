<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
</head>

<body>
    <!-- Main content -->
    <div class="flex flex-row bg-primary-color">
        <div class="flex flex-col w-full px-5 h-screen overflow-y-scroll items-center">
            <div class="flex justify-between items-center w-full">
                <h1 class="text-3xl font-bold text-primary-color">Student Group Formation</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <form action="" method="POST" class="mt-5 w-3/4 <?= $pageData['showBracketForm'] ? '' : 'hidden' ?>"
                id="bracketForm">
                <div class="mb-4">
                    <label for="blue_bracket" class="block text-primary-color font-bold mb-2">Blue Bracket
                        Selection:</label>
                    <select name="blue_bracket" id="blue_bracket" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">Select Blue Bracket</option>
                        <?php foreach ($pageData['blueBrackets'] as $blueBracket): ?>
                            <option value="<?= $blueBracket['bracket_id'] ?>">
                                <?= $blueBracket['bracket'] . " - " . $blueBracket['bracket_id'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="red_bracket" class="block text-primary-color font-bold mb-2">Red Bracket
                        Selection:</label>
                    <select name="red_bracket" id="red_bracket" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">Select Red Bracket</option>
                        <?php foreach ($pageData['redBrackets'] as $redBracket): ?>
                            <option value="<?= $redBracket['bracket_id'] ?>">
                                <?= $redBracket['bracket'] . " - " . $redBracket['bracket_id'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="next_button" name="next_button">Next</button>
                </div>

            </form>
            <form action="" method="POST" class="mt-5 w-3/4 <?= $pageData['showBracketForm'] ? 'hidden' : '' ?>"
                id="leaderForm">
                <input type="hidden" name="blue_bracket" value="<?= $pageData['blueBracket'] ?>">
                <input type="hidden" name="red_bracket" value="<?= $pageData['redBracket'] ?>">
                <div class="mb-4">
                    <label for="project_name" class="block text-primary-color font-bold mb-2">Project Name:</label>
                    <input type="text" name="project_name" id="project_name"
                        class="w-full p-2 border border-gray-300 rounded" />
                </div>
                <div class="mb-4">
                    <label for="project_description" class="block text-primary-color font-bold mb-2">Project
                        Description:</label>
                    <textarea name="project_description" id="project_description"
                        class="w-full p-2 border border-gray-300 rounded" rows="5"></textarea>
                </div>
                <div class="mb-4">
                    <label for="leader" class="block text-primary-color font-bold mb-2">Leader Selection:</label>
                    <select name="leader" id="leader" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">Select Leader</option>
                        <?php foreach ($pageData['studentList'] as $student): ?>
                            <option value="<?= $student['user_id'] ?>">
                                <?= $student['full_name'] . " - " . $student['email'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="btn-primary-color rounded-3xl text-center text-white text-base font-medium px-10 py-2"
                        id="submit_group" name="submit_group">Submit</button>
                </div>
            </form>
        </div>

        <script>
        </script>
</body>

</html>