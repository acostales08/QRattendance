-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 08:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrcodedb`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `a`
-- (See below for the actual view)
--
CREATE TABLE `a` (
`ID` int(11)
,`StudentID` varchar(250)
,`TIMEIN` varchar(250)
,`LOGDATE` varchar(250)
,`STATUS` varchar(250)
,`class_subject_id` text
);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `StudentID` varchar(250) NOT NULL,
  `TIMEIN` varchar(250) NOT NULL,
  `LOGDATE` varchar(250) NOT NULL,
  `STATUS` varchar(250) NOT NULL,
  `class_subject_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `StudentID`, `TIMEIN`, `LOGDATE`, `STATUS`, `class_subject_id`) VALUES
(543, '202143', '3:16 AM', '2023-03-09', 'PRESENT', '33');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(30) NOT NULL,
  `course_id` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `section` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `course_id`, `level`, `section`, `status`, `date_created`) VALUES
(87, '1', '4', '5', 1, '2023-02-08 15:09:09'),
(88, '1', '4', '1', 1, '2023-02-09 00:40:12'),
(89, '1', '4', '2', 1, '2023-02-09 15:34:54'),
(90, '1', '4', '3', 1, '2023-02-11 20:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `subject_id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `faculty_id`, `date_created`) VALUES
(26, 87, 12, 1952, '2023-02-09 14:03:45'),
(27, 89, 15, 1952, '2023-02-10 00:02:43'),
(28, 88, 13, 1954, '2023-02-10 00:04:52'),
(29, 89, 13, 1954, '2023-02-10 00:27:49'),
(30, 88, 12, 1952, '2023-02-10 00:28:18'),
(31, 87, 15, 1952, '2023-02-10 00:38:16'),
(33, 87, 17, 1957, '2023-02-12 00:08:51'),
(34, 90, 18, 1957, '2023-03-03 16:55:16'),
(35, 89, 13, 1960, '2023-03-03 18:25:35'),
(36, 87, 13, 1957, '2023-03-06 23:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `description`, `date_created`) VALUES
(1, 'BSIS', 'Bachelor of Science in Information System', '2023-02-08 14:56:49'),
(26, 'BSAIS', 'Bachelor of Science in Accounting Information System', '2023-02-08 15:37:32'),
(27, 'BSENTREP', 'Bachelor of Science in Entrepreneurship', '2023-02-11 20:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ex_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ex_id`, `class_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(92, 87, 'Quiz', '10', 10, 'lesson 1', '2023-03-06 16:16:49'),
(94, 87, '12322', '20', 10, '34522', '2023-03-06 16:32:44'),
(96, 88, '123', '10', 5, '123', '2023-03-06 17:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(298, 30, 92, 224, 'The while loop will execute 25 times and print the numbers 1 thru 25 and finish with the printing of Done.', 'new', '2023-02-21 13:26:31'),
(299, 30, 92, 221, 'Scanning', 'new', '2023-02-21 13:26:31'),
(300, 30, 92, 222, 'Shift - C', 'new', '2023-02-21 13:26:31'),
(301, 30, 92, 220, 'X++; x--;', 'new', '2023-02-21 13:26:31'),
(302, 44, 92, 222, 'Alt - C', 'new', '2023-03-06 17:49:05'),
(303, 44, 92, 223, 'Condition', 'new', '2023-03-06 17:49:05'),
(304, 44, 92, 221, 'Debugging', 'new', '2023-03-06 17:49:05'),
(305, 44, 92, 220, 'If (x > 0) x++; else x--;', 'new', '2023-03-06 17:49:05'),
(306, 44, 92, 224, 'The while statement will not function correctly due to a missing semicolon(;) after the statement while (count <=25)', 'new', '2023-03-06 17:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `exmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `exmne_id`, `exam_id`, `examat_status`) VALUES
(122, 30, 92, 'used'),
(123, 44, 92, 'used');

-- --------------------------------------------------------

--
-- Table structure for table `exam_question`
--

CREATE TABLE `exam_question` (
  `eqt_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `exam_question` varchar(1000) NOT NULL,
  `exam_ch1` varchar(1000) NOT NULL,
  `exam_ch2` varchar(1000) NOT NULL,
  `exam_ch3` varchar(1000) NOT NULL,
  `exam_ch4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active',
  `q_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question`
--

INSERT INTO `exam_question` (`eqt_id`, `exam_id`, `exam_question`, `exam_ch1`, `exam_ch2`, `exam_ch3`, `exam_ch4`, `exam_answer`, `exam_status`, `q_type`) VALUES
(220, 92, 'Which of the sets of statements below will add 1 to x if x is positive and subtract 1 from x if x is negative but leave x alone if x is 0?', 'If (x > 0) x++; else x--;', 'If (x == 0) x = 0; else x++; x--;', 'If (x > 0) x++; else if (x < 0) x--;', 'X++; x--;', 'If (x == 0) x = 0; else x++; x--;', 'active', 'Multiple Choice'),
(221, 92, '_______ is the process of finding errors and fixing them within a program.', 'Compiling', 'Debugging', 'Executing', 'Scanning', 'Debugging', 'active', 'Multiple Choice'),
(222, 92, 'Which command will stop an infinite loop?', 'Alt - C', 'Esc', 'Shift - C', 'Ctrl - C', 'Ctrl - C', 'active', 'Multiple Choice'),
(223, 92, 'Kim has just constructed her first for loop within the Java language.  Which of the following is not a required part of a for loop?', 'Initialization', 'Variable', 'Condition', ' increment', 'Variable', 'active', 'Multiple Choice'),
(224, 92, 'Kevin has implemented a While loop within his Java program. Assess the code statement below and select which answer best summarizes the output Kevin will experience once the while statement is executed. int count = 1; while (count <=25) { System.out.println (count); Count = count –1; } System.out.println (\"Done\");', 'The while loop will execute 25 times and print the numbers 1 thru 25 and finish with the printing of Done.', 'The while loop will execute 25 times and print the numbers 25 down to 1 and finish with the printing of Done.', 'The while statement will not function correctly due to a missing semicolon(;) after the statement while (count <=25)', 'The while statement will execute by counting down from 1 until infinity and result in an infinite loop.', 'The while statement will execute by counting down from 1 until infinity and result in an infinite loop.', 'active', 'Multiple Choice'),
(231, 94, '34345', '', '', '', '', '34534', 'active', 'Identification'),
(232, 94, '34534', 'aewe', 'sdfsdf', 'gdfgdfg', 'werwe', 'werwe', 'active', 'Multiple Choice');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(30) NOT NULL,
  `id_no` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `Password` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `id_no`, `name`, `email`, `contact`, `address`, `Password`, `date_created`) VALUES
(1957, '202143', 'Arnel B. Costales', 'costalesarnel08@gmail.com', '09430994128', 'sadgsadgas', 'd561c7c03c1f2831904823a95835ff5f', '2023-02-11 20:14:12'),
(1960, '22222', 'january', 'pasmadongartist08@gmail.com', '09430994128', 'sadfsadf', 'd561c7c03c1f2831904823a95835ff5f', '2023-02-15 20:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `email`, `token`) VALUES
(29, 'pasmadongartist08@gmail.com', 'd537fafa48ae449dee2f62ef37e090b063f8e03b0be8c'),
(30, 'costalesarnel08@gmail.com', '814a7b245a120c2490bc4336239fec4963f8e07a09878');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_subject`
--

CREATE TABLE `student_class_subject` (
  `id` int(11) NOT NULL,
  `class_subject_id` text NOT NULL,
  `StudentID` varchar(6) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Gender` varchar(11) NOT NULL,
  `class_id` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_class_subject`
--

INSERT INTO `student_class_subject` (`id`, `class_subject_id`, `StudentID`, `FullName`, `Gender`, `class_id`, `Email`, `sid`) VALUES
(44, '33', '202143', 'Costales, Arnel B.', 'Male', '87', 'costalesarnel08@gmail.com', 44),
(45, '33', '202144', 'savd', 'Male', '87', 'pasmadongartist08@gmail.com', 45),
(46, '34', '202145', 'Costales, Arnel B.adfsf', 'Male', '88', 'costalesarnny01@gmail.com', 47),
(47, '34', '202143', 'Arnel B. Costales', 'Male', '87', 'costalesarnel08@gmail.com', 46),
(48, '36', '202143', 'Arnel B. Costales', 'Male', '87', 'costalesarnel08@gmail.com', 46),
(49, '36', '202144', 'savd', 'Male', '87', 'pasmadongartist08@gmail.com', 45),
(50, '36', '202145', 'Costales, Arnel B.adfsf', 'Male', '88', 'costalesarnny01@gmail.com', 47),
(51, '33', '202145', 'Costales, Arnel B.adfsf', 'Male', '88', 'costalesarnny01@gmail.com', 47),
(52, '34', '202144', 'savd', 'Male', '87', 'pasmadongartist08@gmail.com', 45);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `sid` int(11) NOT NULL,
  `StudentID` varchar(100) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `class_id` text NOT NULL,
  `Password` text NOT NULL,
  `is_active` varchar(10) NOT NULL,
  `view` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`sid`, `StudentID`, `FullName`, `Gender`, `Email`, `class_id`, `Password`, `is_active`, `view`) VALUES
(45, '202144', 'savd', 'Male', 'pasmadongartist08@gmail.com', '87', 'cd73502828457d15655bbd7a63fb0bc8', 'yes', 'no'),
(46, '202143', 'Arnel B. Costales', 'Male', 'costalesarnel08@gmail.com', '87', 'cd73502828457d15655bbd7a63fb0bc8', 'yes', 'no'),
(47, '202145', 'Costales, Arnel B.adfsf', 'Male', 'costalesarnny01@gmail.com', '88', 'cd73502828457d15655bbd7a63fb0bc8', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `description`, `date_created`) VALUES
(13, 'ITSEC', 'IT security', '2023-02-09 15:39:00'),
(15, 'Socsci113', 'Understanding the self', '2023-02-09 16:44:07'),
(17, 'Socsci113c', 'sdfsad', '2023-02-10 14:21:16'),
(18, 'ISELEC', 'HCI', '2023-02-11 20:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(202143, 'Arnel B. Costales', 'costalesarnel08@gmail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Structure for view `a`
--
DROP TABLE IF EXISTS `a`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `a`  AS SELECT `attendance`.`ID` AS `ID`, `attendance`.`StudentID` AS `StudentID`, `attendance`.`TIMEIN` AS `TIMEIN`, `attendance`.`LOGDATE` AS `LOGDATE`, `attendance`.`STATUS` AS `STATUS`, `attendance`.`class_subject_id` AS `class_subject_id` FROM `attendance` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Indexes for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`);

--
-- Indexes for table `exam_question`
--
ALTER TABLE `exam_question`
  ADD PRIMARY KEY (`eqt_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_no` (`id_no`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class_subject`
--
ALTER TABLE `student_class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `StudentID` (`StudentID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `exam_question`
--
ALTER TABLE `exam_question`
  MODIFY `eqt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1961;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student_class_subject`
--
ALTER TABLE `student_class_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
