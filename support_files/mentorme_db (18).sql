-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2025 at 11:21 AM
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
  `meeting_number` int(11) DEFAULT NULL,
  `meeting_outcomes` text DEFAULT NULL,
  `next_two_week_work` text DEFAULT NULL,
  `past_two_week_work` text DEFAULT NULL,
  `status` enum('PENDING','ACCEPTED','REJECTED') NOT NULL DEFAULT 'PENDING',
  `reject_reason` text DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bi_weekly_report`
--

INSERT INTO `bi_weekly_report` (`report_id`, `group_id`, `date`, `meeting_number`, `meeting_outcomes`, `next_two_week_work`, `past_two_week_work`, `status`, `reject_reason`, `comment`) VALUES
(12, 25, '2025-04-24', NULL, 'aaaaaaa', 'aaaa', 'aa', 'PENDING', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bi_weekly_report_task`
--

CREATE TABLE `bi_weekly_report_task` (
  `report_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bracket`
--

CREATE TABLE `bracket` (
  `bracket_id` int(11) NOT NULL,
  `bracket` varchar(5) NOT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bracket`
--

INSERT INTO `bracket` (`bracket_id`, `bracket`, `group_id`) VALUES
(85, 'Blue', 23),
(86, 'Blue', 24),
(87, 'Red', 23),
(88, 'Red', 24),
(89, 'Blue', 25),
(90, 'Blue', 26),
(91, 'Red', 26),
(92, 'Red', 25),
(93, 'Blue', NULL),
(94, 'Blue', NULL),
(95, 'Red', NULL),
(96, 'Red', NULL),
(97, 'Blue', NULL),
(98, 'Blue', NULL),
(99, 'Red', NULL),
(100, 'Red', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `codecheck`
--

CREATE TABLE `codecheck` (
  `startid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `codecheck`
--

INSERT INTO `codecheck` (`startid`, `status`, `deadline`) VALUES
(1, 0, '2025-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `comment` text DEFAULT NULL
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
(37, '2024-11-30 12:17:00', '2024-12-01 12:17:00', 'qqqq', 'qqq', 1, 'GLOBAL'),
(38, '2024-12-02 12:18:00', '2024-12-03 12:18:00', 'www', 'www', 1, 'SUPERVISORS'),
(41, '2025-03-02 12:22:00', '2025-03-02 17:22:00', 'test', 'erwtretre', 1, 'SUPERVISORS'),
(55, '2025-04-25 13:04:00', '2025-04-26 13:04:00', 'aaa', 'aaa', 1, 'USER_1'),
(56, '2025-04-25 13:06:00', '2025-04-25 19:06:00', 'bbbbbbb', 'bbbbbbbbbbbbb', 1, 'SUPERVISORS'),
(57, '2025-04-25 09:39:00', '2025-04-25 10:39:00', 'testing', 'hoda event', 1, 'USER_1');

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

--
-- Dumping data for table `examiner`
--

INSERT INTO `examiner` (`email_id`, `panel_number`, `description`, `user_id`) VALUES
('kcc', NULL, NULL, 338);

-- --------------------------------------------------------

--
-- Table structure for table `examiner_group`
--

CREATE TABLE `examiner_group` (
  `examiner_group_id` int(11) NOT NULL,
  `examiner_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `panel_number` int(11) DEFAULT NULL
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
  `type` varchar(255) NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
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
  `co_supervisor_id` int(11) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `project_name`, `project_description`, `year`, `leader_id`, `supervisor_id`, `co_supervisor_id`, `course`) VALUES
(25, 'test project', 'jkl', 2025, NULL, 316, NULL, 'Computer Science'),
(26, 'dsfdsaf', 'dsfdsg', 2025, NULL, NULL, NULL, 'Computer Science');

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
(24, 25, 316, 'hi', 'aaa', 'aa', '2025-04-24 13:39:42', NULL, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `user_id` int(11) DEFAULT NULL,
  `gitlink` varchar(255) DEFAULT NULL,
  `assumption` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`registration_number`, `index_number`, `year`, `course`, `bracket_id`, `group_id`, `user_id`, `gitlink`, `assumption`) VALUES
('2022/cs/002', '22000002', 1, 'Computer Science', 97, NULL, 350, 'https://github.com/PiyumiNavo/FutureFinder.git', NULL),
('2022/cs/003', '22000003', 1, 'Computer Science', 98, NULL, 351, NULL, NULL),
('2022/cs/004', '22000004', 2, 'Information Systems', 98, NULL, 352, NULL, NULL),
('2022/cs/005', '22000005', 2, 'Computer Science', 97, NULL, 353, NULL, NULL),
('2022/cs/006', '22000006', 3, 'Computer Science', 99, NULL, 354, NULL, NULL),
('2022/cs/007', '22000007', 3, 'Information Systems', 100, NULL, 355, NULL, NULL),
('2022/cs/008', '22000008', 4, 'Information Systems', 100, NULL, 356, NULL, NULL),
('2022/cs/009', '22000009', 4, 'Computer Science', 99, NULL, 357, NULL, NULL),
('2022/cs/197', '22001972', 2, 'Computer Science', 97, NULL, 358, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `email_id` varchar(5) NOT NULL,
  `description` text DEFAULT NULL,
  `expected_projects` int(11) DEFAULT NULL,
  `current_projects` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `is_co_supervisor` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`email_id`, `description`, `expected_projects`, `current_projects`, `user_id`, `is_co_supervisor`) VALUES
('ell', NULL, NULL, 0, 335, 1),
('nsp', NULL, NULL, 0, 337, 1),
('scc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 4, 0, 316, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('TO_DO','IN_PROGRESS','IN_REVIEW','COMPLETED') DEFAULT 'TO_DO',
  `assignee_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `task_number` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `estimated_time` int(11) NOT NULL DEFAULT 1,
  `deadline` datetime DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `review_time` datetime DEFAULT NULL,
  `git_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `title`, `description`, `status`, `assignee_id`, `group_id`, `task_number`, `create_time`, `estimated_time`, `deadline`, `start_time`, `end_time`, `review_time`, `git_link`) VALUES
(50, 'aa', 'aa', 'TO_DO', NULL, 25, 1, '2025-04-24 10:38:32', 3, '2025-04-26 23:59:59', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `monday` varchar(255) DEFAULT NULL,
  `tuesday` varchar(255) DEFAULT NULL,
  `wednesday` varchar(255) DEFAULT NULL,
  `thursday` varchar(255) DEFAULT NULL,
  `friday` varchar(255) DEFAULT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `time_slot`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `type`) VALUES
(380, '8:00-10:00', 'SIS Computer Science 101', 'SIS Information Systems 202', 'SIS Computer Science Lab', 'SIS Mathematics 103', 'SIS Project Discussion', 'IS'),
(381, '10:00-12:00', 'SIS Information Systems 101', 'SIS Database Systems 201', 'SIS Programming Concepts', 'SIS Computer Science 202', 'SIS Seminar', 'IS'),
(382, '12:00-1:00', 'Lunch Break', 'Lunch Break', 'Lunch Break', 'Lunch Break', 'Lunch Break', 'IS'),
(383, '1:00-3:00', 'SIS Mathematics 101', 'SIS Programming Lab', 'SIS Software Engineering', 'SIS Computer Science 303', 'SIS Team Projects', 'IS'),
(384, '3:00-5:00', 'SIS Data Structures', 'SIS Networking Basics', 'SIS Operating Systems', 'SIS Computer Science 404', 'SIS Final Year Guidance', 'IS'),
(390, '8:00-10:00', 'SCS Computer Science 101', 'SCS Information Systems 202', 'SCS Computer Science Lab', 'SCS Mathematics 103', 'SCS Project Discussion', 'CS'),
(391, '10:00-12:00', 'SCS Information Systems 101', 'SCS Database Systems 201', 'SCS Programming Concepts', 'SCS Computer Science 202', 'SCS Seminar', 'CS'),
(392, '12:00-1:00', 'Lunch Break', 'Lunch Break', 'Lunch Break', 'Lunch Break', 'Lunch Break', 'CS'),
(393, '1:00-3:00', 'SCS Mathematics 101', 'SCS Programming Lab', 'SCS Software Engineering', 'SCS Computer Science 303', 'SCS Team Projects', 'CS'),
(394, '3:00-5:00', 'SCS Data Structures', 'SCS Networking Basics', 'SCS Operating Systems', 'SCS Computer Science 404', 'SCS Final Year Guidance', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('STUDENT','STUDENT_LEADER','SUPERVISOR','EXAMINER','SUPERVISOR_EXAMINER','COORDINATOR','STAKE_HOLDER') NOT NULL,
  `profile_picture` varchar(100) NOT NULL DEFAULT 'default_profile.jpg',
  `last_login` datetime NOT NULL DEFAULT current_timestamp(),
  `last_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `email`, `password`, `role`, `profile_picture`, `last_login`, `last_update`) VALUES
(1, 'Aravinda K Dayananda', 'admin@gmail.com', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'COORDINATOR', 'default_profile.jpg', '2025-04-25 11:36:44', '2024-12-15 13:39:47'),
(316, 'Sadun C Codikara', 'scc@ucsc.cmb.ac.lk', '$2y$10$WsB20tulzUZCPucFOFNwWOJK5F4CWyOYKGluDb7G4vqXu8/s8.y6O', 'SUPERVISOR', 'default_profile.jpg', '2025-04-22 19:58:25', '2025-04-22 19:58:25'),
(335, 'E L. Lokananda', 'ellaw@ucsc.cmb.ac.lk', '$2y$10$MLWmWcf/JR6CJhDNMmBRTepSU6AIibZWySyR5hOgadVabOMji.STm', 'SUPERVISOR', 'default_profile.jpg', '2025-04-22 21:27:49', '2025-04-22 21:27:49'),
(337, 'N S. Prasad', 'nsp@ucsc.cmb.ac.lk', '$2y$10$uN5yM411UeuAX0wpglgGouNxZ4oPLpnpuVcmybdT5xleHUgxkHkqy', 'SUPERVISOR', 'default_profile.jpg', '2025-04-22 21:27:49', '2025-04-22 21:27:49'),
(338, 'Kavinda C Corey', 'kcc@ucsc.cmb.ac.lk', '$2y$10$e0DyxU03doc1F9IPKQ1QbewJoxWiddKKzOPZqU7mGE4.IUKPwjU2.', 'SUPERVISOR_EXAMINER', 'default_profile.jpg', '2025-04-24 11:24:10', '2025-04-22 21:31:49'),
(350, 'Arosha Perera', 'arosha.perera@email.com', '$2y$10$wEbdpIsANzW/hINQAmghjeq9FQYCtJUoNHx76DSUf7u27BJ7kQEH2', 'STUDENT', 'default_profile.jpg', '2025-04-25 11:38:33', '2025-04-25 11:38:33'),
(351, 'Bimal Fernando', 'bimal.fernando@email.com', '$2y$10$7xrTVHXRoPqDLPQUJufl3.wKlUB4wquIk4POa4qU9nqnjNvJrhS0G', 'STUDENT', 'default_profile.jpg', '2025-04-25 11:38:34', '2025-04-25 11:38:34'),
(352, 'Chamara Silva', 'chamara.silva@email.com', '$2y$10$xw1TR30Lnz/yOi2RvPRHu..Hhql8J3mxUw3F70gdn/ED56qGfAIfC', 'STUDENT', 'default_profile.jpg', '2025-04-25 11:38:34', '2025-04-25 11:38:34'),
(353, 'Dilanka Jayasuriya', 'dilanka.jaya@email.com', '$2y$10$Wi3qoC0miQaaamuA2BqoK.CQDrBNlqQZr1hvZGIrj4QumxCCZi62u', 'STUDENT', 'default_profile.jpg', '2025-04-25 11:38:34', '2025-04-25 11:38:34'),
(354, 'Eshan Fernando', 'eshan.fernando@email.com', '$2y$10$2RAJ1D6iF7zGxJF1N32YqevQpGRswjS326oZSuT6/uXuqvtgmc/b2', 'STUDENT', 'default_profile.jpg', '2025-04-25 11:38:34', '2025-04-25 11:38:34'),
(355, 'Fahim Wickramasinghe', 'fahim.wick@email.com', '$2y$10$jFIk925MDfIVslshxehdvOiKV9n2KOxXaMvgQWD19xtV22pdZlJJm', 'STUDENT', 'default_profile.jpg', '2025-04-25 11:38:34', '2025-04-25 11:38:34'),
(356, 'Gayanthika Kumari', 'gayan.kumari@email.com', '$2y$10$iRVMVZx8pAGQKkaqpUdahed6Rqk7S/9QqUznskbQts3vYC/xxNILS', 'STUDENT', 'default_profile.jpg', '2025-04-25 11:38:34', '2025-04-25 11:38:34'),
(357, 'Thamindu Weerasinghe', 'thamindu12ku@gmail.com', '$2y$10$SWaZwhhmWb8UEgoanLNxzOMjL3Ny0qwkwBg1GV5hHfNDDOiorfJVu', 'STUDENT', 'default_profile.jpg', '2025-04-25 11:38:34', '2025-04-25 11:38:34'),
(358, 'Kalpa Madhushan', 'kalpamadhushan18@gmail.com', '$2y$10$fYf4G5U9lyhlUV/g6QAIcO8t5W7bBjHDiE4nqcOPMhi2AoqUxilM2', 'STUDENT', 'default_profile.jpg', '2025-04-25 11:38:34', '2025-04-25 11:38:34');

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
-- Indexes for table `bi_weekly_report_task`
--
ALTER TABLE `bi_weekly_report_task`
  ADD PRIMARY KEY (`report_id`,`task_id`),
  ADD KEY `bi_weekly_report_task_ibfk_2` (`task_id`);

--
-- Indexes for table `bracket`
--
ALTER TABLE `bracket`
  ADD PRIMARY KEY (`bracket_id`);

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
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

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
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bracket`
--
ALTER TABLE `bracket`
  MODIFY `bracket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `examiner_group`
--
ALTER TABLE `examiner_group`
  MODIFY `examiner_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `meeting_request`
--
ALTER TABLE `meeting_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supervisor_request`
--
ALTER TABLE `supervisor_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bi_weekly_report`
--
ALTER TABLE `bi_weekly_report`
  ADD CONSTRAINT `bi_weekly_report_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE CASCADE;

--
-- Constraints for table `bi_weekly_report_task`
--
ALTER TABLE `bi_weekly_report_task`
  ADD CONSTRAINT `bi_weekly_report_task_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `bi_weekly_report` (`report_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bi_weekly_report_task_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `task` (`task_id`) ON DELETE CASCADE;

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
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`group_id`) ON DELETE CASCADE;

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
