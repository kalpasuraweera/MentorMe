-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 08:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentorme_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bi_weekly_report`
--

CREATE TABLE `bi_weekly_report` (
  `report_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `meeting_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bracket`
--

CREATE TABLE `bracket` (
  `bracket_id` int(11) NOT NULL,
  `bracket` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bracket`
--

INSERT INTO `bracket` (`bracket_id`, `bracket`) VALUES
(25, 'Blue'),
(26, 'Blue'),
(27, 'Red'),
(28, 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `code_check_report`
--

CREATE TABLE `code_check_report` (
  `report_id` int(11) NOT NULL,
  `github_link` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `examiner_id` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `email_id` varchar(255) NOT NULL,
  `level` varchar(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`email_id`, `level`, `user_id`) VALUES
('akd', 'head', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `scope` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `start_time`, `end_time`, `title`, `description`, `creator_id`, `scope`) VALUES
(1, '2024-11-07 04:01:00', '2024-11-07 04:01:00', 'Supervisor Meeting', 'gasdgasdg', 3, 'GROUP_1'),
(2, '2024-11-27 08:08:00', '2024-11-27 08:08:00', 'Supervisor Meeting', 'asdadsa', 3, 'GROUP_1');

-- --------------------------------------------------------

--
-- Table structure for table `examiner`
--

CREATE TABLE `examiner` (
  `email_id` varchar(255) NOT NULL,
  `panel_number` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examiner_group`
--

CREATE TABLE `examiner_group` (
  `examiner_group_id` int(11) NOT NULL,
  `examiner_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int(11) NOT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `project_description` text DEFAULT NULL,
  `year` int(11) NOT NULL,
  `leader_id` int(11) DEFAULT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `co_supervisor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `project_name`, `project_description`, `year`, `leader_id`, `supervisor_id`, `co_supervisor_id`) VALUES
(1, '', '', 2022, 4, 3, NULL),
(2, 'Nano Maker', NULL, 2022, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_request`
--

CREATE TABLE `meeting_request` (
  `request_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `done` text DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `meeting_time` datetime DEFAULT NULL,
  `status` enum('PENDING','ACCEPTED','REJECTED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting_request`
--

INSERT INTO `meeting_request` (`request_id`, `group_id`, `supervisor_id`, `title`, `done`, `reason`, `created_at`, `meeting_time`, `status`) VALUES
(8, 1, 3, 'dffbzgz', 'dfgsgd', 'dfgsg', '2024-11-04 00:00:00', '2024-11-08 04:44:00', 'ACCEPTED'),
(9, 1, 3, 'etgdsg', 'dgdgsdg', 'gdgadg', '2024-11-04 00:00:00', '2024-11-07 04:01:00', 'ACCEPTED'),
(10, 1, 3, 'fasdf', 'sdgsdg', 'sdgdsg', '2024-11-04 00:00:00', '2024-11-27 08:08:00', 'ACCEPTED'),
(11, 1, 3, 'dsgsgesgssdg 333', 'cdsgsdddddddddddddddddddddddddd', 'dsfsf', '2024-11-04 00:00:00', NULL, 'REJECTED'),
(12, 1, 3, 'fgd', 'dfgfd', 'dfgfd', '2024-11-04 22:03:27', NULL, 'REJECTED');

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder`
--

CREATE TABLE `stakeholder` (
  `nic` varchar(20) NOT NULL,
  `stakeholder_type` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `registration_number` varchar(50) NOT NULL,
  `index_number` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `bracket_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`registration_number`, `index_number`, `year`, `course`, `bracket_id`, `group_id`, `user_id`) VALUES
('2022/cs/002', '22000002', 1, 'Computer Science', 25, 4, 39),
('2022/cs/003', '22000003', 1, 'Computer Science', 26, 3, 40),
('2022/cs/004', '22000004', 2, 'Information Systems', 26, 2, 17),
('2022/cs/005', '22000005', 2, 'Computer Science', 25, 1, 18),
('2022/cs/006', '22000006', 3, 'Computer Science', 27, 4, 19),
('2022/cs/007', '22000007', 3, 'Information Systems', 28, 3, 20),
('2022/cs/008', '22000008', 4, 'Information Systems', 28, 2, 45),
('2022/cs/009', '22000009', 4, 'Computer Science', 27, 1, 46),
('2022/cs/010', '22000010', 5, 'Computer Science', 25, 4, 79);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `email_id` varchar(5) NOT NULL,
  `description` text DEFAULT NULL,
  `expected_projects` int(11) DEFAULT NULL,
  `current_projects` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`email_id`, `description`, `expected_projects`, `current_projects`, `user_id`) VALUES
('dkf', 'I received Ph.D from the Department of Computer Science at Binghamton University. I worked at Security and Verification Research (SVR) Lab and Operating Systems and Networks Lab (OSNET), under Prof. Ping Yang and Prof. Kartik Gopalan.\r\n\r\nI obtained my B.Sc.(Hons) in University of Colombo School of Computing of Sri Lanka with First class honors, in 2014.', 2, 5, 5),
('spj', 'I am interested in AI field and i have done my phd in social science and artificial intelligence.', 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_request`
--

CREATE TABLE `supervisor_request` (
  `request_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `project_title` varchar(100) DEFAULT NULL,
  `idea` text DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('PENDING','ACCEPTED','REJECTED') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor_request`
--

INSERT INTO `supervisor_request` (`request_id`, `group_id`, `supervisor_id`, `project_title`, `idea`, `reason`, `created_at`, `status`) VALUES
(5, 1, 5, 'MentorMe - Task Manager', 'Our idea is to create a project management system for second year group project. This is based on current UCSC process.', 'I think you can provide us a better guidance and more ideas for the project', '2024-10-17 00:00:00', 'ACCEPTED'),
(6, 1, 5, 'Est qui dolorem ipsum quia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin viverra cursus dignissim. Maecenas condimentum justo massa, a elementum massa maximus nec. In tellus odio, vehicula nec egestas ut, tempor ut justo. In blandit ante feugiat nulla dapibus, a molestie lorem rhoncus. Etiam ac pharetra nibh, at ultricies lacus. Nam libero orci, interdum cursus magna eget, euismod lobortis sapien. Proin vitae libero dolor. Praesent nisi ipsum, ultrices a tincidunt vitae, volutpat dictum neque. Aliquam convallis odio et interdum tincidunt. Morbi pharetra dui sit amet risus vestibulum rhoncus. Morbi semper sem nisl, a pretium nisl cursus nec. Mauris id metus a velit accumsan elementum. Fusce ornare ornare nibh non consequat.', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ut cursus orci. Duis elementum consectetur varius. Aliquam vitae interdum erat, non commodo urna. Cras sed massa non tortor vestibulum vulputate. Etiam commodo dapibus aliquam. Vivamus id suscipit diam.', '2024-10-16 00:00:00', 'REJECTED'),
(8, 1, 3, 'MentorMe', 'asdad 222', 'asdasd', '2024-11-04 00:00:00', 'ACCEPTED'),
(10, 1, 5, 'MentorMe', 'test', 'test\r\n', '2024-11-04 22:02:58', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `status` enum('PENDING','IN_PROGRESS','COMPLETED') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `assignee_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `estimated_time` time DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `review_date` date DEFAULT NULL,
  `done_date` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `status`, `date_created`, `assignee_id`, `group_id`, `estimated_time`, `start_date`, `end_date`, `review_date`, `done_date`, `description`) VALUES
(1, '', '2024-11-07', 2, 1, '00:00:02', '2024-11-14', '2024-11-30', NULL, NULL, 'vxcb');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('STUDENT','STUDENT_LEADER','SUPERVISOR','EXAMINER','SUPERVISOR_EXAMINER','COORDINATOR','STAKE_HOLDER') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `email`, `password`, `role`) VALUES
(1, 'Anura Disanayaka', 'admin@gmail.com', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'COORDINATOR'),
(2, 'Ranil Wickramasinghe', 'ranil@gmail.com', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'STUDENT'),
(3, 'Sajith Premadasa', 'sajith@gmail.com', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'SUPERVISOR_EXAMINER'),
(4, 'HDKM Suraweera', '2022cs197@stu.ucsc.cmb.ac.lk', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'STUDENT_LEADER'),
(5, 'Dinuni K Fernando', 'dkf@ucsc.cmb.ac.lk', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'SUPERVISOR'),
(17, 'Chamara Silva', 'chamara.silva@email.com', '$2y$10$WhWyJ97itzTKQE8DZlm9V..W1TUPw6QBG7793Bcj/VwhZsCFoZzZ2', 'STUDENT'),
(18, 'Dilanka Jayasuriya', 'dilanka.jaya@email.com', '$2y$10$VvTwLaPe.bTWgWrvc.Xa9ux1p3D4F2DV01xuhy.EceEMY9hAXSv0C', 'STUDENT'),
(19, 'Eshan Fernando', 'eshan.fernando@email.com', '$2y$10$Rt/0eIseLPq2uks99AL8ve4olRZPgS3lOhrC5Hc32mCkH83HeN3dO', 'STUDENT'),
(20, 'Fahim Wickramasinghe', 'fahim.wick@email.com', '$2y$10$/BaYwZsduczaW6sIKnD73.TMt37Sa2CZdbZtuzMCYQeuaEZZxXGzm', 'STUDENT'),
(39, 'Arosha Perera', 'arosha.perera@email.com', '$2y$10$oXT65rOZ1o49gUHUdHGdhe3kIaEgyw9kJdmm8unKwdd/tq3JDoRBy', 'STUDENT'),
(40, 'Bimal Fernando', 'bimal.fernando@email.com', '$2y$10$khmIeYHRI872m.EZC9AWuOuLg1HiJik7deu2AIKl0v28jQdRJXPiS', 'STUDENT'),
(45, 'Gayanthika Kumari', 'gayan.kumari@email.com', '$2y$10$buzZ63X0ZJobCRXfBUC4BuTJX1itwOD9A6wNelSXETtGlPFP66Qe.', 'STUDENT'),
(46, 'Harsha Weerasinghe', 'harsha.weera@email.com', '$2y$10$ZkIc2QlEsEu.UHfTQvvjWe7sT288vQOHQ24Fazqmpob.wl81YnLWu', 'STUDENT'),
(79, 'Ishara Perera', 'ishara.perera@gmail.com', '$2y$10$EYoFbi9jn18uF/UMhTqxxOtjRmpninHHgQagrfnaknFkIQtCb8Xoi', 'STUDENT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bi_weekly_report`
--
ALTER TABLE `bi_weekly_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `bracket`
--
ALTER TABLE `bracket`
  ADD PRIMARY KEY (`bracket_id`);

--
-- Indexes for table `code_check_report`
--
ALTER TABLE `code_check_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `examiner_id` (`examiner_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `examiner`
--
ALTER TABLE `examiner`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `examiner_group`
--
ALTER TABLE `examiner_group`
  ADD PRIMARY KEY (`examiner_group_id`),
  ADD KEY `examiner_id` (`examiner_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `leader_id` (`leader_id`),
  ADD KEY `supervisor_id` (`supervisor_id`),
  ADD KEY `co_supervisor_id` (`co_supervisor_id`);

--
-- Indexes for table `meeting_request`
--
ALTER TABLE `meeting_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `stakeholder`
--
ALTER TABLE `stakeholder`
  ADD PRIMARY KEY (`nic`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`registration_number`),
  ADD UNIQUE KEY `index_number` (`index_number`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `student_ibfk_2` (`bracket_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `supervisor_request`
--
ALTER TABLE `supervisor_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `assignee_id` (`assignee_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bi_weekly_report`
--
ALTER TABLE `bi_weekly_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bracket`
--
ALTER TABLE `bracket`
  MODIFY `bracket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `code_check_report`
--
ALTER TABLE `code_check_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `examiner_group`
--
ALTER TABLE `examiner_group`
  MODIFY `examiner_group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meeting_request`
--
ALTER TABLE `meeting_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supervisor_request`
--
ALTER TABLE `supervisor_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bi_weekly_report`
--
ALTER TABLE `bi_weekly_report`
  ADD CONSTRAINT `bi_weekly_report_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE CASCADE;

--
-- Constraints for table `code_check_report`
--
ALTER TABLE `code_check_report`
  ADD CONSTRAINT `code_check_report_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `code_check_report_ibfk_2` FOREIGN KEY (`examiner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD CONSTRAINT `coordinator_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `examiner`
--
ALTER TABLE `examiner`
  ADD CONSTRAINT `examiner_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `examiner_group`
--
ALTER TABLE `examiner_group`
  ADD CONSTRAINT `examiner_group_ibfk_1` FOREIGN KEY (`examiner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examiner_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE CASCADE;

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `group_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `group_ibfk_3` FOREIGN KEY (`co_supervisor_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `meeting_request`
--
ALTER TABLE `meeting_request`
  ADD CONSTRAINT `meeting_request_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meeting_request_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `stakeholder`
--
ALTER TABLE `stakeholder`
  ADD CONSTRAINT `stakeholder_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`bracket_id`) REFERENCES `bracket` (`bracket_id`) ON DELETE CASCADE;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `supervisor_request`
--
ALTER TABLE `supervisor_request`
  ADD CONSTRAINT `supervisor_request_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supervisor_request_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`assignee_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
