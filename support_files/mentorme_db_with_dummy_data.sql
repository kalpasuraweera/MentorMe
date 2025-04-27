-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2025 at 04:44 PM
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
-- Database: `mentorme_db_2`
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
(14, 27, '2025-04-26', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'PENDING', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bi_weekly_report_task`
--

CREATE TABLE `bi_weekly_report_task` (
  `report_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bi_weekly_report_task`
--

INSERT INTO `bi_weekly_report_task` (`report_id`, `task_id`, `type`) VALUES
(14, 55, 'COMPLETED');

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
(101, 'Blue', 27),
(102, 'Blue', 28),
(103, 'Red', 27),
(104, 'Red', 28);

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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `task_id`, `user_id`, `create_time`, `comment`) VALUES
(17, 55, 367, '2025-04-26 15:30:46', 'this is done'),
(18, 55, 359, '2025-04-26 15:31:57', 'what db we use'),
(19, 179, 360, '2025-04-26 16:11:09', 'can you start this');

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
(61, '2025-04-28 13:08:00', '2025-04-28 13:08:00', 'Supervisor Meeting', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 368, 'GROUP_27'),
(62, '2025-05-02 16:00:00', '2025-05-02 18:59:00', 'Group Meeting', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 367, 'GROUP_27'),
(63, '2025-04-27 16:01:00', '2025-04-30 16:01:00', 'Finish Frontend Tasks', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 367, 'USER_367'),
(64, '2025-04-28 08:00:00', '2025-04-28 15:00:00', 'Final Presentation', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'EXAMINERS'),
(65, '2025-04-27 20:00:00', '2025-04-27 21:00:00', 'Supervisor Discussion', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 'SUPERVISORS');

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
('gcc', 2, NULL, 376),
('kcc', 1, NULL, 368),
('mcc', 2, NULL, 370),
('scc', 1, NULL, 369);

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
(46, 368, 28, 1),
(47, 369, 28, 1),
(48, 376, 27, 2),
(49, 370, 27, 2);

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
(20, 370, 27, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'EXAMINER_FEEDBACK', NULL, '2025-04-26 16:17:50'),
(21, 368, 27, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'SUPERVISOR_FEEDBACK', NULL, '2025-04-26 16:18:17');

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
(27, 'Mentor Me', 'project management', 2025, 367, 368, 372, 'Computer Science'),
(28, 'Future Finder', 'University course filtering system', 2025, 360, 370, 373, 'Computer Science');

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
(28, 27, 368, 'Supervisor Meeting', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2025-04-26 13:07:37', '2025-04-28 13:08:00', 'ACCEPTED');

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
(20, 370, 27, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'EXAMINER_NOTE', '2025-04-26 16:17:57');

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
('2022/cs/002', '22000002', 1, 'Computer Science', 101, 27, 359, NULL, NULL),
('2022/cs/003', '22000003', 1, 'Computer Science', 102, 28, 360, NULL, NULL),
('2022/cs/004', '22000004', 2, 'Information Systems', 102, 28, 361, NULL, NULL),
('2022/cs/005', '22000005', 2, 'Computer Science', 101, 27, 362, NULL, NULL),
('2022/cs/006', '22000006', 3, 'Computer Science', 103, 27, 363, NULL, NULL),
('2022/cs/007', '22000007', 3, 'Information Systems', 104, 28, 364, NULL, NULL),
('2022/cs/008', '22000008', 4, 'Information Systems', 104, 28, 365, NULL, NULL),
('2022/cs/009', '22000009', 4, 'Computer Science', 103, 27, 366, NULL, NULL),
('2022/cs/197', '22001972', 2, 'Computer Science', 101, 27, 367, NULL, NULL);

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
('asd', NULL, NULL, 0, 372, 1),
('ell', NULL, NULL, 0, 371, 1),
('kcc', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 3, 1, 368, 0),
('mcc', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 3, 1, 370, 0),
('nsp', NULL, NULL, 0, 373, 1),
('scc', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 4, 0, 369, 0);

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
(30, 27, 368, 'MentorMe', 'project management tool', 'you have experience with managing lot of projects', '2025-04-26 12:22:15', 'ACCEPTED'),
(32, 28, 370, 'Future Finder', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2025-04-26 16:16:13', 'ACCEPTED');

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
(51, 'Project Setup', 'Initialize project structure (folders like /src, /public, etc.).\r\n\r\nSet up Git repository and create initial commit.', 'IN_REVIEW', 359, 27, 1, '2025-04-26 13:59:56', 5, '2025-05-01 23:59:59', '2025-04-26 15:31:48', '2025-04-26 15:32:37', NULL, 'https://github.com/mentorme/pull/2'),
(52, 'Design Wireframes', 'Create basic UI/UX mockups (e.g., using Figma or Sketch).\r\n\r\nPlan layout for each page (Home, About, Contact, etc.).', 'TO_DO', 362, 27, 2, '2025-04-26 14:37:32', 10, '2025-05-05 23:59:59', NULL, NULL, NULL, NULL),
(53, 'Frontend Development', 'Build responsive layouts with HTML, CSS, and JavaScript.\r\n\r\nSet up a CSS framework if needed (like Tailwind, Bootstrap).\r\n\r\nImplement component structure (headers, footers, cards, etc.).', 'TO_DO', 363, 27, 3, '2025-04-26 14:48:03', 20, '2025-05-09 23:59:59', NULL, NULL, NULL, NULL),
(54, 'Backend Development', 'Set up server (Node.js/Express, PHP, etc.).\r\n\r\nCreate REST API endpoints if needed (for forms, login, etc.).', 'TO_DO', 366, 27, 4, '2025-04-26 15:01:52', 10, '2025-05-09 23:59:59', NULL, NULL, NULL, NULL),
(55, 'Database Setup', 'Design database schema (tables, relationships).\r\n\r\nConnect backend to the database (MySQL, MongoDB, etc.).', 'COMPLETED', 367, 27, 5, '2025-04-26 15:10:38', 5, '2025-05-02 23:59:59', '2025-04-26 15:29:49', '2025-04-26 15:31:00', '2025-04-26 15:32:27', 'https://github.com/mentorme/pull/1'),
(56, 'Authentication & Authorization', 'Implement login, signup, and user roles.\r\n\r\nProtect restricted routes and pages.', 'TO_DO', 359, 27, 6, '2025-04-26 15:17:14', 4, '2025-05-10 23:59:59', NULL, NULL, NULL, NULL),
(57, ' Analytics Integration', 'Set up Google Analytics or another tracking tool.\r\n\r\nMonitor user behavior and page performance.', 'IN_PROGRESS', 367, 27, 7, '2025-04-26 15:24:14', 5, '2025-04-30 23:59:59', '2025-04-26 15:30:31', NULL, NULL, NULL),
(82, 'Requirement Analysis', 'Analyze requirements.', 'COMPLETED', 359, 27, 1, '2024-05-01 00:00:00', 5, '2024-05-06 00:00:00', '2024-05-01 00:00:00', '2024-05-05 00:00:00', '2024-05-06 00:00:00', 'https://github.com/example/repo1'),
(83, 'Technology Research', 'Research on needed tech.', 'COMPLETED', 362, 27, 2, '2024-05-03 00:00:00', 4, '2024-05-07 00:00:00', '2024-05-03 00:00:00', '2024-05-06 00:00:00', '2024-05-07 00:00:00', 'https://github.com/example/repo2'),
(84, 'Initial Project Plan', 'Create a basic plan.', 'COMPLETED', 363, 27, 3, '2024-05-05 00:00:00', 3, '2024-05-09 00:00:00', '2024-05-05 00:00:00', '2024-05-08 00:00:00', '2024-05-09 00:00:00', 'https://github.com/example/repo3'),
(85, 'Wireframe Designs', 'Draft basic wireframes.', 'COMPLETED', 366, 27, 4, '2024-06-02 00:00:00', 6, '2024-06-10 00:00:00', '2024-06-02 00:00:00', '2024-06-08 00:00:00', '2024-06-09 00:00:00', 'https://github.com/example/repo4'),
(86, 'ERD Creation', 'Entity Relationship Diagram.', 'COMPLETED', 359, 27, 5, '2024-06-04 00:00:00', 4, '2024-06-09 00:00:00', '2024-06-04 00:00:00', '2024-06-08 00:00:00', '2024-06-09 00:00:00', 'https://github.com/example/repo5'),
(87, 'Sprint 1 Planning', 'Plan Sprint 1.', 'COMPLETED', 362, 27, 6, '2024-06-07 00:00:00', 3, '2024-06-10 00:00:00', '2024-06-07 00:00:00', '2024-06-09 00:00:00', '2024-06-10 00:00:00', 'https://github.com/example/repo6'),
(88, 'Setup GitHub Repo', 'Create project repository.', 'COMPLETED', 363, 27, 7, '2024-07-01 00:00:00', 2, '2024-07-04 00:00:00', '2024-07-01 00:00:00', '2024-07-03 00:00:00', '2024-07-04 00:00:00', 'https://github.com/example/repo7'),
(89, 'Basic Authentication', 'Implement login system.', 'COMPLETED', 366, 27, 8, '2024-07-03 00:00:00', 5, '2024-07-09 00:00:00', '2024-07-03 00:00:00', '2024-07-08 00:00:00', '2024-07-09 00:00:00', 'https://github.com/example/repo8'),
(90, 'Initial Landing Page', 'Design homepage.', 'IN_REVIEW', 359, 27, 9, '2024-07-05 00:00:00', 7, '2024-07-13 00:00:00', '2024-07-05 00:00:00', '2024-07-12 00:00:00', NULL, 'https://github.com/example/repo9'),
(91, 'Dashboard Setup', 'Admin dashboard.', 'IN_REVIEW', 362, 27, 10, '2024-08-01 00:00:00', 7, '2024-08-10 00:00:00', '2024-08-01 00:00:00', '2024-08-08 00:00:00', NULL, 'https://github.com/example/repo10'),
(92, 'User Roles Setup', 'Define user roles.', 'TO_DO', 363, 27, 11, '2024-08-03 00:00:00', 5, '2024-08-12 00:00:00', NULL, NULL, NULL, NULL),
(93, 'Database Seeding', 'Seed initial database.', 'TO_DO', 366, 27, 12, '2024-08-05 00:00:00', 4, '2024-08-10 00:00:00', NULL, NULL, NULL, NULL),
(94, 'API Skeleton', 'Create basic APIs.', 'TO_DO', 359, 27, 13, '2024-08-07 00:00:00', 6, '2024-08-15 00:00:00', NULL, NULL, NULL, NULL),
(95, 'Implement Notifications', 'Notification module.', 'IN_PROGRESS', 362, 27, 14, '2024-09-01 00:00:00', 7, '2024-09-10 00:00:00', '2024-09-01 00:00:00', NULL, NULL, NULL),
(96, 'Document API Usage', 'Prepare API docs.', 'COMPLETED', 363, 27, 15, '2024-09-02 00:00:00', 3, '2024-09-07 00:00:00', '2024-09-02 00:00:00', '2024-09-06 00:00:00', '2024-09-07 00:00:00', 'https://github.com/example/repo11'),
(97, 'Role Management APIs', 'Add role APIs.', 'IN_PROGRESS', 366, 27, 16, '2024-09-04 00:00:00', 5, '2024-09-12 00:00:00', '2024-09-04 00:00:00', NULL, NULL, NULL),
(98, 'User Settings Page', 'Settings page.', 'TO_DO', 359, 27, 17, '2024-09-06 00:00:00', 6, '2024-09-15 00:00:00', NULL, NULL, NULL, NULL),
(99, 'Staging Deployment', 'Deploy to staging.', 'IN_REVIEW', 362, 27, 18, '2024-10-01 00:00:00', 5, '2024-10-08 00:00:00', '2024-10-01 00:00:00', '2024-10-06 00:00:00', NULL, 'https://github.com/example/repo12'),
(100, 'Email Verification', 'Verify emails on signup.', 'IN_PROGRESS', 363, 27, 19, '2024-10-03 00:00:00', 6, '2024-10-12 00:00:00', '2024-10-03 00:00:00', NULL, NULL, NULL),
(101, 'Activity Logs', 'User activity tracking.', 'TO_DO', 366, 27, 20, '2024-10-05 00:00:00', 4, '2024-10-10 00:00:00', NULL, NULL, NULL, NULL),
(102, 'Notification UI', 'Design notification UI.', 'TO_DO', 359, 27, 21, '2024-10-07 00:00:00', 5, '2024-10-15 00:00:00', NULL, NULL, NULL, NULL),
(103, 'Security Patches', 'Apply security updates.', 'TO_DO', 362, 27, 22, '2024-11-01 00:00:00', 6, '2024-11-10 00:00:00', NULL, NULL, NULL, NULL),
(104, 'Error Handling', 'Graceful error handling.', 'IN_PROGRESS', 363, 27, 23, '2024-11-02 00:00:00', 5, '2024-11-09 00:00:00', '2024-11-02 00:00:00', NULL, NULL, NULL),
(105, 'Session Management', 'Improve sessions.', 'TO_DO', 366, 27, 24, '2024-11-04 00:00:00', 4, '2024-11-10 00:00:00', NULL, NULL, NULL, NULL),
(106, 'Improve UI/UX', 'Make UI improvements.', 'TO_DO', 359, 27, 25, '2024-11-06 00:00:00', 7, '2024-11-15 00:00:00', NULL, NULL, NULL, NULL),
(107, 'Performance Tuning', 'Optimize app speed.', 'IN_PROGRESS', 362, 27, 26, '2024-12-01 00:00:00', 6, '2024-12-10 00:00:00', '2024-12-01 00:00:00', NULL, NULL, NULL),
(108, 'Client Demos', 'Prepare for demos.', 'TO_DO', 363, 27, 27, '2024-12-03 00:00:00', 4, '2024-12-10 00:00:00', NULL, NULL, NULL, NULL),
(109, 'Monitoring Setup', 'Monitoring for server.', 'TO_DO', 366, 27, 28, '2024-12-05 00:00:00', 5, '2024-12-12 00:00:00', NULL, NULL, NULL, NULL),
(110, 'Implement Webhooks', 'Incoming/outgoing webhooks.', 'TO_DO', 359, 27, 29, '2024-12-07 00:00:00', 7, '2024-12-15 00:00:00', NULL, NULL, NULL, NULL),
(111, 'Accessibility Improvements', 'Improve accessibility.', 'TO_DO', 362, 27, 30, '2025-01-03 00:00:00', 5, '2025-01-10 00:00:00', NULL, NULL, NULL, NULL),
(112, 'Write Test Cases', 'Add test coverage.', 'IN_PROGRESS', 363, 27, 31, '2025-01-05 00:00:00', 7, '2025-01-15 00:00:00', '2025-01-05 00:00:00', NULL, NULL, NULL),
(113, 'Bug Bounty', 'Fix bugs reported.', 'TO_DO', 366, 27, 32, '2025-01-07 00:00:00', 4, '2025-01-12 00:00:00', NULL, NULL, NULL, NULL),
(114, 'Backup Verification', 'Verify backup restore.', 'TO_DO', 359, 27, 33, '2025-01-10 00:00:00', 3, '2025-01-13 00:00:00', NULL, NULL, NULL, NULL),
(115, 'Training Sessions', 'Internal team training.', 'TO_DO', 362, 27, 34, '2025-02-01 00:00:00', 5, '2025-02-08 00:00:00', NULL, NULL, NULL, NULL),
(116, 'Final Client Review', 'Prepare final review.', 'TO_DO', 363, 27, 35, '2025-02-03 00:00:00', 6, '2025-02-10 00:00:00', NULL, NULL, NULL, NULL),
(117, 'Third-Party Integrations', 'Connect third-party tools.', 'TO_DO', 366, 27, 36, '2025-02-05 00:00:00', 7, '2025-02-15 00:00:00', NULL, NULL, NULL, NULL),
(118, 'Load Testing', 'Stress test the system.', 'TO_DO', 359, 27, 37, '2025-02-07 00:00:00', 6, '2025-02-14 00:00:00', NULL, NULL, NULL, NULL),
(119, 'Prepare Handover Docs', 'Documentation.', 'TO_DO', 362, 27, 38, '2025-03-01 00:00:00', 5, '2025-03-06 00:00:00', NULL, NULL, NULL, NULL),
(120, 'Final UAT', 'User Acceptance Testing.', 'TO_DO', 363, 27, 39, '2025-03-02 00:00:00', 6, '2025-03-08 00:00:00', NULL, NULL, NULL, NULL),
(121, 'Prepare Closure Report', 'Final closure.', 'TO_DO', 366, 27, 40, '2025-03-04 00:00:00', 4, '2025-03-10 00:00:00', NULL, NULL, NULL, NULL),
(122, 'Create Final Invoice', 'Bill the client.', 'TO_DO', 359, 27, 41, '2025-03-05 00:00:00', 2, '2025-03-07 00:00:00', NULL, NULL, NULL, NULL),
(123, 'Archive Project Files', 'Archive all data.', 'TO_DO', 362, 27, 42, '2025-04-01 00:00:00', 3, '2025-04-05 00:00:00', NULL, NULL, NULL, NULL),
(124, 'Release Public Version', 'Release to public.', 'TO_DO', 363, 27, 43, '2025-04-02 00:00:00', 4, '2025-04-06 00:00:00', NULL, NULL, NULL, NULL),
(125, 'Final Thank You Email', 'Send thank yous.', 'TO_DO', 366, 27, 44, '2025-04-03 00:00:00', 2, '2025-04-05 00:00:00', NULL, NULL, NULL, NULL),
(126, 'Team Party', 'Celebrate success.', 'TO_DO', 359, 27, 45, '2025-04-04 00:00:00', 1, '2025-04-04 00:00:00', NULL, NULL, NULL, NULL),
(152, 'Setup Project Structure', 'Initialized base project structure and folders.', 'COMPLETED', 367, 27, 1000, '2024-05-05 10:00:00', 4, '2024-05-08 23:59:59', '2024-05-06 09:00:00', '2024-05-07 16:00:00', '2024-05-08 10:00:00', 'https://github.com/dummy/project-setup'),
(153, 'Implement Login API', 'Developed secure login API endpoint.', 'COMPLETED', 367, 27, 1001, '2024-05-10 11:30:00', 5, '2024-05-13 23:59:59', '2024-05-11 08:30:00', '2024-05-12 15:00:00', '2024-05-13 10:30:00', 'https://github.com/dummy/login-api'),
(154, 'User Registration', 'Created user registration and verification flows.', 'COMPLETED', 367, 27, 1002, '2024-06-02 09:15:00', 6, '2024-06-05 23:59:59', '2024-06-03 10:00:00', '2024-06-04 17:00:00', '2024-06-05 09:45:00', 'https://github.com/dummy/register-api'),
(155, 'Create Dashboard UI', 'Designed and implemented the user dashboard.', 'COMPLETED', 367, 27, 1003, '2024-06-07 13:00:00', 8, '2024-06-10 23:59:59', '2024-06-08 09:00:00', '2024-06-09 18:00:00', '2024-06-10 11:00:00', 'https://github.com/dummy/dashboard-ui'),
(156, 'Database Schema Design', 'Planned and created the database tables.', 'COMPLETED', 367, 27, 1004, '2024-06-15 15:30:00', 5, '2024-06-18 23:59:59', '2024-06-16 10:00:00', '2024-06-17 16:00:00', '2024-06-18 10:00:00', 'https://github.com/dummy/db-schema'),
(157, 'Notification Service', 'Built email and SMS notification services.', 'COMPLETED', 367, 27, 1005, '2024-07-03 09:00:00', 7, '2024-07-06 23:59:59', '2024-07-04 08:00:00', '2024-07-05 17:00:00', '2024-07-06 09:00:00', 'https://github.com/dummy/notification-service'),
(158, 'Fix Login Bugs', 'Resolved login token and session management issues.', 'COMPLETED', 367, 27, 1006, '2024-07-10 14:30:00', 3, '2024-07-12 23:59:59', '2024-07-11 09:30:00', '2024-07-11 13:00:00', '2024-07-12 11:00:00', 'https://github.com/dummy/login-bugfix'),
(159, 'Profile Settings Page', 'Developed editable profile settings UI.', 'COMPLETED', 367, 27, 1007, '2024-07-20 11:15:00', 5, '2024-07-23 23:59:59', '2024-07-21 10:00:00', '2024-07-22 17:00:00', '2024-07-23 12:00:00', 'https://github.com/dummy/profile-settings'),
(160, 'Password Reset Flow', 'Built password reset request and update features.', 'COMPLETED', 367, 27, 1008, '2024-08-04 10:45:00', 4, '2024-08-07 23:59:59', '2024-08-05 09:00:00', '2024-08-06 14:30:00', '2024-08-07 11:00:00', 'https://github.com/dummy/password-reset'),
(161, 'File Upload Service', 'Implemented secure file uploading.', 'COMPLETED', 367, 27, 1009, '2024-08-12 13:00:00', 6, '2024-08-15 23:59:59', '2024-08-13 09:00:00', '2024-08-14 17:00:00', '2024-08-15 09:30:00', 'https://github.com/dummy/file-upload'),
(162, 'Optimize Database Queries', 'Optimized slow DB queries.', 'COMPLETED', 367, 27, 1010, '2024-08-20 09:30:00', 5, '2024-08-23 23:59:59', '2024-08-21 10:00:00', '2024-08-22 15:00:00', '2024-08-23 10:00:00', 'https://github.com/dummy/db-optimization'),
(163, 'API Documentation', 'Documented all major APIs.', 'COMPLETED', 367, 27, 1011, '2024-09-05 11:00:00', 6, '2024-09-08 23:59:59', '2024-09-06 10:00:00', '2024-09-07 18:00:00', '2024-09-08 12:00:00', 'https://github.com/dummy/api-docs'),
(164, 'Frontend Validation', 'Added form validations.', 'COMPLETED', 367, 27, 1012, '2024-09-15 14:00:00', 4, '2024-09-18 23:59:59', '2024-09-16 09:00:00', '2024-09-17 13:00:00', '2024-09-18 10:30:00', 'https://github.com/dummy/form-validation'),
(165, 'Unit Testing User Service', 'Wrote unit tests for user service.', 'COMPLETED', 367, 27, 1013, '2024-09-25 09:00:00', 5, '2024-09-28 23:59:59', '2024-09-26 10:00:00', '2024-09-27 15:00:00', '2024-09-28 10:30:00', 'https://github.com/dummy/user-service-tests'),
(166, 'Search Functionality', 'Built search and filter features.', 'COMPLETED', 367, 27, 1014, '2024-10-05 08:45:00', 7, '2024-10-08 23:59:59', '2024-10-06 09:00:00', '2024-10-07 18:00:00', '2024-10-08 12:00:00', 'https://github.com/dummy/search-feature'),
(167, 'Security Audit Fixes', 'Patched security vulnerabilities.', 'COMPLETED', 367, 27, 1015, '2024-10-12 10:00:00', 6, '2024-10-15 23:59:59', '2024-10-13 09:00:00', '2024-10-14 16:00:00', '2024-10-15 09:30:00', 'https://github.com/dummy/security-fixes'),
(168, 'Set Up CI/CD Pipeline', 'Configured GitHub Actions for CI/CD.', 'COMPLETED', 367, 27, 1016, '2024-10-22 13:00:00', 8, '2024-10-25 23:59:59', '2024-10-23 09:00:00', '2024-10-24 17:00:00', '2024-10-25 11:00:00', 'https://github.com/dummy/cicd-pipeline'),
(169, 'Error Handling Improvements', 'Improved backend error messages.', 'COMPLETED', 367, 27, 1017, '2024-11-02 11:30:00', 4, '2024-11-05 23:59:59', '2024-11-03 10:00:00', '2024-11-04 14:00:00', '2024-11-05 10:00:00', 'https://github.com/dummy/error-handling'),
(170, 'Performance Benchmarking', 'Benchmarked API performance.', 'COMPLETED', 367, 27, 1018, '2024-11-15 09:00:00', 6, '2024-11-18 23:59:59', '2024-11-16 10:00:00', '2024-11-17 18:00:00', '2024-11-18 11:00:00', 'https://github.com/dummy/performance-tests'),
(171, 'Payment Gateway Integration', 'Integrated Stripe API.', 'COMPLETED', 367, 27, 1019, '2024-12-05 08:00:00', 7, '2024-12-08 23:59:59', '2024-12-06 09:00:00', '2024-12-07 17:00:00', '2024-12-08 12:00:00', 'https://github.com/dummy/stripe-integration'),
(172, 'Admin Panel UI', 'Created admin panel screens.', 'COMPLETED', 367, 27, 1020, '2024-12-14 14:00:00', 8, '2024-12-17 23:59:59', '2024-12-15 09:00:00', '2024-12-16 18:00:00', '2024-12-17 12:00:00', 'https://github.com/dummy/admin-ui'),
(173, 'Backup and Recovery Plan', 'Documented and tested backup strategies.', 'COMPLETED', 367, 27, 1021, '2025-01-05 10:30:00', 5, '2025-01-08 23:59:59', '2025-01-06 09:00:00', '2025-01-07 16:00:00', '2025-01-08 11:00:00', 'https://github.com/dummy/backup-plan'),
(174, 'Internationalization', 'Added multi-language support.', 'COMPLETED', 367, 27, 1022, '2025-02-03 09:00:00', 6, '2025-02-06 23:59:59', '2025-02-04 09:00:00', '2025-02-05 17:00:00', '2025-02-06 10:30:00', 'https://github.com/dummy/i18n-support'),
(175, 'Dark Mode Support', 'Built dark mode toggle.', 'COMPLETED', 367, 27, 1023, '2025-03-10 13:00:00', 4, '2025-03-13 23:59:59', '2025-03-11 09:00:00', '2025-03-12 14:00:00', '2025-03-13 10:00:00', 'https://github.com/dummy/dark-mode'),
(176, 'Spring Cleanup', 'Removed deprecated code.', 'COMPLETED', 367, 27, 1024, '2025-04-02 09:00:00', 3, '2025-04-04 23:59:59', '2025-04-03 10:00:00', '2025-04-03 13:00:00', '2025-04-04 10:00:00', 'https://github.com/dummy/code-cleanup'),
(177, 'Database Setup', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'IN_PROGRESS', 360, 28, 1, '2025-04-26 16:08:58', 6, '2025-04-29 23:59:59', '2025-04-26 16:10:32', NULL, NULL, NULL),
(178, 'Frontend Development', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'IN_REVIEW', 361, 28, 2, '2025-04-26 16:09:19', 10, '2025-05-02 23:59:59', '2025-04-26 16:10:29', '2025-04-26 16:10:52', NULL, 'https://github.com/example/repo2'),
(179, 'Backend Development', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'TO_DO', 364, 28, 3, '2025-04-26 16:09:41', 10, '2025-05-02 23:59:59', NULL, NULL, NULL, NULL),
(180, 'Design Wireframes', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'COMPLETED', 365, 28, 4, '2025-04-26 16:10:02', 6, '2025-04-30 23:59:59', '2025-04-26 16:10:10', '2025-04-26 16:10:21', '2025-04-26 16:10:23', 'https://github.com/example/repo1');

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
(1, 'Aravinda K Dayananda', 'admin@gmail.com', '$2y$10$xiCwSvCsvROWCKTuuf6r/evwbPU9sKxknnjsukixz4JGS4azBpRwy', 'COORDINATOR', 'default_profile.jpg', '2025-04-26 16:37:46', '2024-12-15 13:39:47'),
(359, 'Arosha Perera', 'arosha.perera@email.com', '$2y$10$fx3NenxxbgyxAnRQUfFLBeNez4p15awQF/YrnNWi2BfQGdZ6VkZfy', 'STUDENT', '359.jpg', '2025-04-26 15:31:41', '2025-04-26 12:13:45'),
(360, 'Bimal Fernando', 'bimal.fernando@email.com', '$2y$10$GwgFe0ArWkjqLhFctvgNmOCvm0lQNljH0ckTD267UknuKQid/2mye', 'STUDENT_LEADER', '360.jpg', '2025-04-26 16:15:47', '2025-04-26 12:13:45'),
(361, 'Chamara Silva', 'chamara.silva@email.com', '$2y$10$S5G3b8Nk8wZGwsh./H5mp.TOXQBOsM.kqEABhCZAGjqOTLK4OcuJi', 'STUDENT', 'default_profile.jpg', '2025-04-26 12:13:45', '2025-04-26 12:13:45'),
(362, 'Dilanka Jayasuriya', 'dilanka.jaya@email.com', '$2y$10$ellLe5bIg0en8d/V5kWNZOo8rWMRwrfqtWx4dUTkVHoqvNqXDejCi', 'STUDENT', 'default_profile.jpg', '2025-04-26 12:13:45', '2025-04-26 12:13:45'),
(363, 'Eshan Fernando', 'eshan.fernando@email.com', '$2y$10$uz3iYj7dCiWzE1kf9TkV1ed5USAMPc.vHgKXPN.RbZ9Y.nTCHUdiu', 'STUDENT', 'default_profile.jpg', '2025-04-26 12:13:45', '2025-04-26 12:13:45'),
(364, 'Fahim Wickramasinghe', 'fahim.wick@email.com', '$2y$10$TyqDyIPghv4JHeY2YS5J.OV8kH5c/bo7dBijQtpVDV66gYhWR1FBC', 'STUDENT', 'default_profile.jpg', '2025-04-26 12:13:45', '2025-04-26 12:13:45'),
(365, 'Gayanthika Kumari', 'gayan.kumari@email.com', '$2y$10$PbuDy4T0vlHxQTrDhrAFOujKCOknC0fnqjnX0jlG4dWYFV50piO.m', 'STUDENT', 'default_profile.jpg', '2025-04-26 12:13:45', '2025-04-26 12:13:45'),
(366, 'Thamindu Weerasinghe', 'thamindu12ku@gmail.com', '$2y$10$GtDHcEOp6dfeVyJFZClCHOmZ5FfmzFVphCbB5L562s5v4WC6YgUOu', 'STUDENT', 'default_profile.jpg', '2025-04-26 12:13:45', '2025-04-26 12:13:45'),
(367, 'Kalpa Madhushan', '2022cs197@stu.ucsc.cmb.ac.lk', '$2y$10$UoNwq1DOnYav2POThQzvMOkFk1uLetakgOx5jhOo5NXSW/UYFI.EW', 'STUDENT_LEADER', '367.jpg', '2025-04-26 16:31:59', '2025-04-26 12:13:45'),
(368, 'Kavinda C Corey', 'kcc@ucsc.cmb.ac.lk', '$2y$10$E86FAL/dadaCZljpDe.39.ghMaXwasU8lo5EGNMwGfJ5L/ShPdmAe', 'SUPERVISOR_EXAMINER', '368.jpg', '2025-04-26 16:40:42', '2025-04-26 16:04:45'),
(369, 'Sadun C Codikara', 'scc@ucsc.cmb.ac.lk', '$2y$10$b8T/K92Mjr7KPsiZiJJjGO/ceWLV9sD945AGAVL2zoU8YiFD/Szva', 'SUPERVISOR_EXAMINER', 'default_profile.jpg', '2025-04-26 12:15:07', '2025-04-26 12:15:07'),
(370, 'Malith C Chathuranga', 'mcc@ucsc.cmb.ac.lk', '$2y$10$z3ogeCGibVY1myFKtSNiduYlblVlt6GTRszj1yyFBMaUjzvsxQukK', 'SUPERVISOR_EXAMINER', 'default_profile.jpg', '2025-04-26 16:17:33', '2025-04-26 12:15:07'),
(371, 'E L. Lokananda', 'ellaw@ucsc.cmb.ac.lk', '$2y$10$nUqQBYf2E/m2T2xsysYww.s/R4a7WbUmIOVf0mLsEt8dPf/m5m3Vm', 'SUPERVISOR', 'default_profile.jpg', '2025-04-26 16:13:13', '2025-04-26 16:13:13'),
(372, 'A S. Danushka', 'asd@ucsc.cmb.ac.lk', '$2y$10$y2T7Rvvt2e5KQ07wr3ecBur4i6rZIxcoCuWvfmMo2TF8Lnd7T15i2', 'SUPERVISOR', 'default_profile.jpg', '2025-04-26 16:13:13', '2025-04-26 16:13:13'),
(373, 'N S. Prasad', 'nsp@ucsc.cmb.ac.lk', '$2y$10$tRK5EcmpUIbc8TeaOLSDGunMpNopXHHy4gLYYfcPoQUw875Bv6RBu', 'SUPERVISOR', 'default_profile.jpg', '2025-04-26 16:13:13', '2025-04-26 16:13:13'),
(376, 'Gihan C Gamage', 'gcc@ucsc.cmb.ac.lk', '$2y$10$bTKCbElpZ9k6wGRwBOh87OQY/KiwaalriN7skm2JJ047J7ejmVhaK', 'SUPERVISOR_EXAMINER', 'default_profile.jpg', '2025-04-26 16:17:14', '2025-04-26 16:17:14');

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
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bracket`
--
ALTER TABLE `bracket`
  MODIFY `bracket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `examiner_group`
--
ALTER TABLE `examiner_group`
  MODIFY `examiner_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `meeting_request`
--
ALTER TABLE `meeting_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supervisor_request`
--
ALTER TABLE `supervisor_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

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
