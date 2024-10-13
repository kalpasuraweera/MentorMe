<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MentorMe</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/index.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/pages/supervisor_calendar.css">
</head>

<body>
    <div class="flex flex-row bg-primary-color">
        <?php $this->renderComponent('sideBar', ['activeIndex' => 3]) ?>
        <div class="flex flex-col w-3/4 p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-color">Calendar</h1>
                <div class="flex flex-row items-center">
                    <div class="flex flex-col items-end mx-2">
                        <p class="text-lg font-bold text-primary-color"><?= $_SESSION['user']['full_name'] ?></p>
                        <p class="text-sm text-secondary-color"><?= $_SESSION['user']['email'] ?></p>
                    </div>
                    <img src="<?= BASE_URL ?>/public/images/icons/user_profile.png" alt="user icon">
                </div>
            </div>
            <!-- Calendar -->
            <div class="flex flex-col bg-white shadow rounded-xl p-5 mt-5">
                <div class="flex justify-between items-center mb-5">
                    <p class="text-primary-color font-bold text-2xl
                    ">January 2022</p>
                    <div class="flex gap-2">
                        <img src="<?= BASE_URL ?>/public/images/icons/back_icon.png" alt="left arrow">
                        <img src="<?= BASE_URL ?>/public/images/icons/forward_icon.png" alt="right arrow">
                    </div>
                </div>
                <table>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                        <td>21</td>
                        <td>22</td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <td>31</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="flex flex-col gap-5 my-5">
                <div class="flex justify-between items-center">
                    <p class="text-primary-color font-bold text-2xl">Upcoming Events</p>
                    <p class="text-primary-color font-bold">View All</p>
                </div>
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Requesting a Time for a Meeting</p>
                    <p class="text-secondary-color mt-5">As a Clinical Research Coordinator, you will be responsible for
                        managing and coordinating clinical trials and research studies. You will work closely with
                        principal investigators, research staff, and study participants to ensure the smooth operation
                        of
                        research projects.</p>
                    <div class="flex justify-end mt-5 gap-5">
                        <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Edit', 'bg' => 'btn-secondary-color']) ?>
                        <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Delete', 'bg' => 'btn-primary-color']) ?>
                    </div>
                </div>
                <div class="flex flex-col bg-white shadow rounded-xl p-5">
                    <p class="text-lg font-bold text-primary-color">Requesting a Time for a Meeting</p>
                    <p class="text-secondary-color mt-5">As a Clinical Research Coordinator, you will be responsible for
                        managing and coordinating clinical trials and research studies. You will work closely with
                        principal investigators, research staff, and study participants to ensure the smooth operation
                        of
                        research projects.</p>
                    <div class="flex justify-end mt-5 gap-5">
                        <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Edit', 'bg' => 'btn-secondary-color']) ?>
                        <?php $this->renderComponent('button', ['name' => 'add_student', 'text' => 'Delete', 'bg' => 'btn-primary-color']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>