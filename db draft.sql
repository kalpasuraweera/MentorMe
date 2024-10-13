CREATE TABLE `user` (
    `user_id` INT AUTO_INCREMENT PRIMARY KEY,
    `full_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('STUDENT', 'STUDENT_LEADER', 'SUPERVISOR', 'EXAMINER', 'COORDINATOR', 'STAKE_HOLDER') NOT NULL
);

CREATE TABLE `student` (
    `registration_number` VARCHAR(50) PRIMARY KEY,
    `index_number` VARCHAR(50) UNIQUE NOT NULL,
    `year` INT NOT NULL,
    `course` VARCHAR(255) NOT NULL,
    `bracket` VARCHAR(50),
    `group_number` INT,
    `user_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);

CREATE TABLE `supervisor` (
    `email_id` VARCHAR(255) PRIMARY KEY,
    `description` TEXT,
    `expected_projects` INT,
    `current_projects` INT,
    `user_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);

CREATE TABLE `examiner` (
    `email_id` VARCHAR(255) PRIMARY KEY,
    `panel_number` INT,
    `description` TEXT,
    `user_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);

CREATE TABLE `coordinator` (
    `email_id` VARCHAR(255) PRIMARY KEY,
    `level` INT,
    `user_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);

CREATE TABLE `stakeholder` (
    `nic` VARCHAR(20) PRIMARY KEY,
    `stakeholder_type` VARCHAR(255),
    `group_id` INT,
    `user_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);

CREATE TABLE `group` (
    `group_id` INT AUTO_INCREMENT PRIMARY KEY,
    `project_name` VARCHAR(255),
    `project_description` TEXT,
    `year` INT NOT NULL,
    `leader_id` INT,
    `supervisor_id` INT,
    `co_supervisor_id` INT,
    FOREIGN KEY (`leader_id`) REFERENCES `user`(`user_id`) ON DELETE SET NULL,
    FOREIGN KEY (`supervisor_id`) REFERENCES `user`(`user_id`) ON DELETE SET NULL,
    FOREIGN KEY (`co_supervisor_id`) REFERENCES `user`(`user_id`) ON DELETE SET NULL
);

CREATE TABLE `supervisor_request` (
    `request_id` INT AUTO_INCREMENT PRIMARY KEY,
    `group_id` INT,
    `supervisor_id` INT,
    `description` TEXT,
    `date` DATE,
    `status` ENUM('PENDING', 'ACCEPTED', 'REJECTED'),
    FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`) ON DELETE CASCADE,
    FOREIGN KEY (`supervisor_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);

CREATE TABLE `examiner_group` (
    `examiner_group_id` INT AUTO_INCREMENT PRIMARY KEY,
    `examiner_id` INT,
    `group_id` INT,
    FOREIGN KEY (`examiner_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE,
    FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`) ON DELETE CASCADE
);

CREATE TABLE `task` (
    `task_id` INT AUTO_INCREMENT PRIMARY KEY,
    `status` ENUM('PENDING', 'IN_PROGRESS', 'COMPLETED'),
    `date_created` DATE,
    `assignee_id` INT,
    `group_id` INT,
    `estimated_time` TIME,
    `start_date` DATE,
    `end_date` DATE,
    `review_date` DATE,
    `done_date` DATE,
    `description` TEXT,
    FOREIGN KEY (`assignee_id`) REFERENCES `user`(`user_id`) ON DELETE SET NULL,
    FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`) ON DELETE CASCADE
);

CREATE TABLE `comment` (
    `comment_id` INT AUTO_INCREMENT PRIMARY KEY,
    `task_id` INT,
    `user_id` INT,
    `date` DATE,
    `message` TEXT,
    FOREIGN KEY (`task_id`) REFERENCES `task`(`task_id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);

CREATE TABLE `event` (
    `event_id` INT AUTO_INCREMENT PRIMARY KEY,
    `start_date` DATE,
    `end_date` DATE,
    `title` VARCHAR(255),
    `description` TEXT,
    `creator_id` INT,
    `scope` VARCHAR(255),
    FOREIGN KEY (`creator_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);

CREATE TABLE `bi_weekly_report` (
    `report_id` INT AUTO_INCREMENT PRIMARY KEY,
    `group_id` INT,
    `date` DATE,
    `meeting_number` INT,
    FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`) ON DELETE CASCADE
);

CREATE TABLE `feedback` (
    `feedback_id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT,
    `group_id` INT,
    `feedback` TEXT,
    `is_accepted` BOOLEAN,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE,
    FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`) ON DELETE CASCADE
);

CREATE TABLE `code_check_report` (
    `report_id` INT AUTO_INCREMENT PRIMARY KEY,
    `github_link` VARCHAR(255),
    `student_id` INT,
    `examiner_id` INT,
    `feedback` TEXT,
    FOREIGN KEY (`student_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE,
    FOREIGN KEY (`examiner_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
);
