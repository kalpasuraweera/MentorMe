-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 10:05 AM
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
(9, 20, '2024-11-29', NULL, 'updated  new', 'updated newest', 'done', 'ACCEPTED', 'hadhan yako', NULL);

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
(77, 'Blue', NULL),
(78, 'Blue', NULL),
(79, 'Red', NULL),
(80, 'Red', NULL);

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
(1, 1, '2025-04-12');

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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `task_id`, `user_id`, `create_time`, `comment`) VALUES
(1, 31, 265, '2025-02-26 15:32:50', 'test'),
(2, 31, 265, '2025-02-26 15:32:56', 'addooo'),
(3, 35, 266, '2025-02-26 15:36:15', 'hii'),
(4, 31, 266, '2025-02-26 15:36:23', 'good'),
(5, 31, 266, '2025-02-28 12:30:40', 'meka hadnna'),
(6, 39, 266, '2025-04-11 12:01:45', 'asfsafas');

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
(35, '2024-11-29 12:12:00', '2024-11-29 12:12:00', 'Supervisor Meeting', 'ttttt', 266, 'GROUP_20'),
(36, '2024-11-30 12:16:00', '2024-12-01 12:17:00', 'aaa', 'aa', 266, 'USER_266'),
(37, '2024-11-30 12:17:00', '2024-12-01 12:17:00', 'qqqq', 'qqq', 1, 'GLOBAL'),
(38, '2024-12-02 12:18:00', '2024-12-03 12:18:00', 'www', 'www', 1, 'SUPERVISORS'),
(39, '2025-02-27 15:22:00', '2025-03-07 15:22:00', 'Test', 'dfkjasd dfasdgha sddohsadig', 265, 'USER_265'),
(40, '2025-02-28 15:25:00', '2025-03-08 15:25:00', 'TEst to 2', 'TEst to 2', 265, 'GROUP_20'),
(41, '2025-03-02 12:22:00', '2025-03-02 17:22:00', 'test', 'erwtretre', 1, 'SUPERVISORS'),
(42, '2025-03-06 12:37:00', '2025-03-08 12:37:00', 'this is event', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 265, 'GROUP_20'),
(44, '2025-04-30 17:08:00', '2025-04-30 22:08:00', 'Mentor meeting', 'Mentor meeting 2', 266, 'GROUP_20'),
(45, '2025-05-01 17:08:00', '2025-05-01 20:08:00', 'Group Review', 'Group Review eee', 266, 'GROUP_21'),
(46, '2025-04-23 17:12:00', '2025-04-23 23:12:00', 'Supervisor Meeting', 'Supervisor Meeting dgdgd', 266, 'USER_266'),
(54, '2025-04-25 12:30:00', '2025-04-26 12:31:00', 'bb', 'bbb', 266, 'USER_266'),
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
('kcc', 1, 'test', 266),
('scc', 1, 'test', 267);

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

--
-- Dumping data for table `examiner_group`
--

INSERT INTO `examiner_group` (`examiner_group_id`, `examiner_id`, `group_id`, `panel_number`) VALUES
(33, 266, 20, 1),
(34, 267, 20, 1);

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

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `group_id`, `feedback`, `type`, `is_accepted`, `created_at`) VALUES
(16, 266, 20, 'aaaaaaaaaaa', 'SUPERVISOR_FEEDBACK', NULL, '2025-04-10 15:33:37'),
(17, 267, 20, 'bbbbbbbbbbb', 'EXAMINER_FEEDBACK', NULL, '2025-04-01 15:53:10'),
(18, 266, 20, 'aaaaaaaaaaaaaaaaaaaaa', 'EXAMINER_FEEDBACK', NULL, '2025-04-11 11:59:11');

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
(20, 'aaaa', 'aaaa', 2024, 265, 266, NULL, 'Computer Science'),
(21, 'ersg', 'dssg', 2024, 258, 266, NULL, 'Computer Science');

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
(19, 20, 266, 'aaaa', 'aaaaa', 'aaaaa', '2024-11-29 07:42:36', '2024-11-29 12:12:00', 'ACCEPTED'),
(20, 20, 266, 'bbb', 'bbbb', 'bbb', '2024-12-16 21:00:02', NULL, 'PENDING');

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

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`note_id`, `user_id`, `group_id`, `note`, `type`, `created_at`) VALUES
(16, 266, 20, 'aaa', 'EXAMINER_NOTE', '2024-11-29 12:16:35'),
(17, 266, 20, 'bbbbbbbbbbb', 'SUPERVISOR_NOTE', '2025-04-10 15:33:56');

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
('2022/cs/002', '22000002', 1, 'Computer Science', 77, NULL, 257, NULL, NULL),
('2022/cs/003', '22000003', 1, 'Computer Science', 78, NULL, 258, NULL, NULL),
('2022/cs/004', '22000004', 2, 'Information Systems', 78, NULL, 259, NULL, NULL),
('2022/cs/005', '22000005', 2, 'Computer Science', 77, NULL, 260, NULL, NULL),
('2022/cs/006', '22000006', 3, 'Computer Science', 79, NULL, 261, NULL, NULL),
('2022/cs/007', '22000007', 3, 'Information Systems', 80, NULL, 262, NULL, NULL),
('2022/cs/008', '22000008', 4, 'Information Systems', 80, NULL, 263, NULL, NULL),
('2022/cs/009', '22000009', 4, 'Computer Science', 79, NULL, 280, NULL, NULL),
('2022/cs/197', '22001972', 2, 'Computer Science', 77, NULL, 279, NULL, NULL);

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
('kcc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 3, 1, 266, 0),
('scc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 3, 0, 267, 0);

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
(21, 20, 266, 'aaa', 'aaaaa', 'aaaaa', '2024-11-29 07:41:51', 'ACCEPTED'),
(22, 21, 266, 'rrr', 'rrrr', 'rrrr', '2024-12-16 21:13:03', 'REJECTED');

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
(27, 'Overview of Container', 'Recently, the use of container technology for applications has become commonplace. The advantages of this technology allow you to quickly develop and implement new services and applications in any programming language.', 'COMPLETED', 257, 20, 1, '2024-12-24 16:23:16', 4, '2024-12-27 23:59:59', '2024-12-24 23:11:43', '2024-12-24 23:12:46', '2024-12-24 23:12:48', NULL),
(28, 'This site can’t be reached', 'localhost refused to connect.\r\nTry:\r\nChecking the connection\r\nChecking the proxy and the firewall\r\nERR_CONNECTION_REFUSED', 'COMPLETED', 260, 20, 2, '2024-12-24 22:58:45', 5, '2024-12-28 23:59:59', '2024-12-24 23:11:16', '2024-12-24 23:11:20', NULL, NULL),
(29, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'COMPLETED', 264, 20, 3, '2024-12-24 22:59:44', 2, '2024-12-27 23:59:59', NULL, NULL, NULL, NULL),
(30, 'aaa', 'aa', 'COMPLETED', 265, 20, 4, '2024-12-24 23:16:31', 4, '2024-12-19 23:59:59', '2024-12-24 23:16:35', '2025-02-18 20:10:35', '2025-02-18 20:11:01', 'https://github.com/mentorme/pull/1'),
(31, 'aaa', 'aaaa', 'TO_DO', 261, 20, 5, '2024-12-24 23:57:58', 2, '2024-12-29 23:59:59', NULL, NULL, NULL, NULL),
(32, 'bbb', 'bb', 'COMPLETED', 260, 20, 6, '2024-12-24 23:58:33', 4, '2024-12-28 23:59:59', '2024-12-24 23:58:37', '2025-02-18 20:10:29', '2025-02-18 20:10:59', ''),
(33, 'Test 1', 'test 1 task descriptionsss', 'TO_DO', 258, 21, 1, '2024-12-25 05:18:43', 12, '2024-12-25 23:59:59', '2024-12-25 11:10:45', '2024-12-25 11:10:50', NULL, ''),
(34, 'Test 1', 'fffffsfs', 'COMPLETED', 259, 21, 2, '2024-12-25 06:41:04', 12, '2024-12-25 23:59:59', '2024-12-25 11:11:07', '2024-12-25 11:11:08', '2024-12-25 11:11:11', ''),
(35, 'Test 1', 'thamindu', 'TO_DO', 259, 21, 3, '2024-12-25 07:29:02', 12, '2024-12-25 23:59:59', NULL, NULL, NULL, 'dasadadad'),
(36, 'Test 1', 'dfaffsfs', 'TO_DO', 259, 21, 4, '2024-12-25 07:33:45', 12, '2024-12-27 23:59:59', NULL, NULL, NULL, NULL),
(37, 'dadd', 'addadad', 'IN_REVIEW', 265, 20, 7, '2025-02-18 15:39:31', 2, '2025-02-21 23:59:59', '2025-02-18 20:09:41', '2025-02-18 20:09:43', NULL, ''),
(38, 'eaeada', 'dadadad', 'IN_PROGRESS', 265, 20, 8, '2025-02-21 04:14:01', 21, '2025-03-07 23:59:59', '2025-02-21 08:44:04', '2025-02-28 12:51:11', NULL, ''),
(39, 'vvvv', 'vvv', 'TO_DO', 261, 20, 9, '2025-02-28 12:36:20', 2, '2025-03-05 23:59:59', '2025-02-28 12:36:25', NULL, NULL, NULL);

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
(1, 'Aravinda K Dayananda', 'admin@gmail.com', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'COORDINATOR', 'default_profile.jpg', '2025-04-18 09:38:32', '2024-12-15 13:39:47'),
(257, 'Arosha Perera', 'arosha.perera@email.com', '$2y$10$9aVmGXxa1ZpfkLxzvbeWqu6xg5zddJ.7cl6Nf0.k3Bu8oHLsSOyDa', 'STUDENT', 'default_profile.jpg', '2025-02-18 15:40:53', '2024-12-15 13:39:47'),
(258, 'Bimal Fernando', 'bimal.fernando@email.com', '$2y$10$8EKd2JelSsyute85T2dxtetIlO6SUXK9BWCsoohf1iKymdmIEmZP6', 'STUDENT', 'default_profile.jpg', '2024-12-26 16:15:15', '2024-12-15 13:39:47'),
(259, 'Chamara Silva', 'chamara.silva@email.com', '$2y$10$nocgHcFGZnQdCIT1CHrhseSIcM4cmrEjuqgXMIQvcBonz6MKkt5jG', 'STUDENT', 'default_profile.jpg', '2024-12-15 13:39:47', '2024-12-15 13:39:47'),
(260, 'Dilanka Jayasuriya', 'dilanka.jaya@email.com', '$2y$10$F2z9ur76PNuKsFEDMV0tVuvrqXttdwty1FP1Jm0tIegNr6CdxGVym', 'STUDENT', 'default_profile.jpg', '2025-02-28 12:53:48', '2024-12-15 13:39:47'),
(261, 'Eshan Fernando', 'eshan.fernando@email.com', '$2y$10$3pBGrZd2SnQJ6gTea3vZiu6Sn9KzjY9l2WzxfkxbmlQk2Knr.uLF.', 'STUDENT', 'default_profile.jpg', '2024-12-15 13:39:47', '2024-12-15 13:39:47'),
(262, 'Fahim Wickramasinghe', 'fahim.wick@email.com', '$2y$10$9OVvBxNSLccyDXrvXrIMMOOArOXUnM/cWR0ge6wci2uN3hHVe9PqC', 'STUDENT', 'default_profile.jpg', '2024-12-15 13:39:47', '2024-12-15 13:39:47'),
(263, 'Gayanthika Kumari', 'gayan.kumari@email.com', '$2y$10$h.Wix9KEVHK8CQ64UyVJSemtxh/d9wNdXpykP68HI58lM8vZ//oR6', 'STUDENT', 'default_profile.jpg', '2024-12-15 13:39:47', '2024-12-15 13:39:47'),
(264, 'Harsha Weerasinghe', 'harsha.weera@email.com', '$2y$10$bZtExIbT2Na3AmLAwg/zhuNQ0t4721MkIiQ3bwn44cN7aUbgPX9QO', 'STUDENT', 'default_profile.jpg', '2024-12-15 13:39:47', '2024-12-15 13:39:47'),
(265, 'Kalpa Madhushan', 'kalpa@gmail.com', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'STUDENT_LEADER', '265.jpg', '2025-04-11 11:55:05', '2024-12-15 13:39:47'),
(266, 'Kavinda C Corerr', 'kcc@ucsc.cmb.ac.lk', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'SUPERVISOR_EXAMINER', '266.jpg', '2025-04-11 13:06:24', '2025-02-28 12:25:23'),
(267, 'Sadun C Codikara', 'scc@ucsc.cmb.ac.lk', '$2y$10$m8CGp74V9bE5a.MJMgg6we5mLeUiZcouuM/HVnVyty0LG/FzXqsjG', 'SUPERVISOR_EXAMINER', 'default_profile.jpg', '2024-12-15 13:39:47', '2024-12-15 13:39:47'),
(268, 'Malith C Chathuranga', 'mcc@ucsc.cmb.ac.lk', '$2y$10$MWNazm15kHBHM1jVHYFG2u1rT05fyywDLj2ERCGBTVDtFdRof6jEC', 'SUPERVISOR', 'default_profile.jpg', '2024-12-15 13:39:47', '2024-12-15 13:39:47'),
(279, 'Kalpa Madhushan', 'kalpamadhushan18@gmail.com', '$2y$10$ruz2cp7uSWrUHqtXhCMo2e2nrdp4zg6vT4N7.77PF/b8CiYbrkvBW', 'STUDENT', 'default_profile.jpg', '2025-04-12 15:03:21', '2025-04-12 15:03:21'),
(280, 'Thamindu Weerasinghe', 'thamindu12ku@gmail.com', '$2y$10$EvsfElDk7M72I/4DcN4Wp.t0l7YIR/Ozv0liA77tEb8/LlN2dL9sK', 'STUDENT', 'default_profile.jpg', '2025-04-12 15:07:26', '2025-04-12 15:07:26');

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
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bracket`
--
ALTER TABLE `bracket`
  MODIFY `bracket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `examiner_group`
--
ALTER TABLE `examiner_group`
  MODIFY `examiner_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `meeting_request`
--
ALTER TABLE `meeting_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supervisor_request`
--
ALTER TABLE `supervisor_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;

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
