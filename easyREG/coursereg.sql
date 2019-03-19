-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 04:27 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursereg`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(45) NOT NULL,
  `credit` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `department_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `credit`, `created_at`, `department_id`, `faculty_id`) VALUES
(1, 'Introduction to Programming I', 'CIE 101', 3, '2018-08-23 12:55:32', 4, 2),
(2, 'Logic in Computer Science', 'CSC 102', 3, '2018-08-25 12:34:52', 4, 2),
(3, 'Introduction o Wild life Conservation', 'NES 101', 3, '2018-08-25 12:35:43', 5, 2),
(4, 'Senior Design Project', 'SEN 490', 3, '2018-08-25 12:36:42', 3, 2),
(5, 'Univeristy Algebra I', 'MAT 110', 3, '2018-08-27 19:37:23', 6, 1),
(6, 'Univeristy Algebra II', 'MAT 120', 3, '2018-08-27 19:37:46', 4, 2),
(7, 'Logic in Computer Science II', 'CSC 103', 3, '2018-08-27 19:49:25', 4, 2),
(8, 'Ecosystem', 'NES 111', 4, '2018-08-28 12:59:09', 5, 2),
(9, 'Managing computing', 'CIE 102', 3, '2018-08-29 17:26:17', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `location` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `location`, `name`, `faculty_id`) VALUES
(3, 'Arts and Science Building', 'Software Engineering', 2),
(4, 'Arts and Science Building', 'Computer Sciences', 2),
(5, 'Peter Okocha Building', 'Natural and Environmental Sciences', 2),
(6, 'Muhammed Sunusi Block', 'Civil Engineering', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollements`
--

CREATE TABLE `enrollements` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `section_id` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollements`
--

INSERT INTO `enrollements` (`id`, `student_id`, `section_id`, `created_at`) VALUES
(2, 4, '1,2', '2018-08-25 18:39:33'),
(3, 3, '1,2', '2018-08-27 17:37:48'),
(7, 10, '2,3,4', '2018-08-29 17:50:43'),
(9, 12, '1,3', '2018-08-29 22:14:42'),
(12, 13, '2,3,4', '2018-08-30 15:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `enrollement_details`
--

CREATE TABLE `enrollement_details` (
  `id` int(11) NOT NULL,
  `enrollement_id` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollement_details`
--

INSERT INTO `enrollement_details` (`id`, `enrollement_id`, `comment`, `status`) VALUES
(1, 2, 'I hereby approve your course reg', 'approved'),
(2, 6, 'well done', 'approved'),
(4, 7, 'i approve this reg', 'approved'),
(5, 8, 'Approved', 'approved'),
(6, 12, 'Approved', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `alias` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `alias`) VALUES
(1, 'Faculty of Engineering', 'FENG'),
(2, 'Faculty of IT and Computing', 'FITC');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `qualification` varchar(45) NOT NULL,
  `rank` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `first_name`, `last_name`, `qualification`, `rank`, `type`, `department_id`) VALUES
(1, 'Abubakar', 'Hussaini', 'PhD', 'Chair', 'Full Time', 4),
(2, 'George', 'Salu', 'PhD', 'Assistant Professor', 'Full Time', 4);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `day` varchar(45) NOT NULL,
  `start_time` varchar(45) NOT NULL,
  `end_time` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `name`, `day`, `start_time`, `end_time`) VALUES
(1, 'SI', 'MW', '8:00am', '9:45am'),
(2, 'SII', 'TTR', '10:00am', '11:30am');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `course_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `room` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `course_id`, `schedule_id`, `lecturer_id`, `room`) VALUES
(1, 'CiE 101 I', 1, 1, 1, 'AS 102'),
(2, 'CIE 101 II', 1, 2, 2, 'POH 102'),
(3, 'MAT 110 I', 5, 2, 2, 'AS 110'),
(4, 'MAT 120 I', 6, 2, 1, 'POH 110');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(45) NOT NULL,
  `school_reg_no` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `dept_id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `type`, `school_reg_no`, `status`, `dept_id`, `faculty_id`) VALUES
(1, 4, 'Full Time', 'A00017365', 0, 3, 2),
(2, 3, 'Full Time', 'A00017366', 0, 4, 2),
(7, 10, 'Full-Time', 'A00018975', 0, 3, 2),
(8, 11, 'Full-Time', 'A0000000', 0, 4, 2),
(9, 12, 'Full-Time', 'A111111111111', 0, 3, 2),
(10, 13, 'Full-Time', 'A00018225', 0, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(225) NOT NULL,
  `auth_key` varchar(225) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_role` varchar(2) NOT NULL DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password`, `auth_key`, `create_date`, `user_role`) VALUES
(3, 'Abubakar Musa', 'amb1', 'abubakar.musa1@aun.edu.ng', '202cb962ac59075b964b07152d234b70', 'htb4mSjyTiwa9mAKTFdditF67OtnKDQl', '2018-08-18 18:27:10', 'S'),
(4, 'Sani Garba', 'sani1', 'sani.garba@gmail.com', '202cb962ac59075b964b07152d234b70', 'K8G9bgBCGtko_NthR0x0dw4kfB14DubF', '2018-08-22 14:28:04', 'S'),
(10, ' Goodluck Jonathan', 'jonah1', 'jonah@gmail.com', '202cb962ac59075b964b07152d234b70', 'xw0Hn8MBOh6RbyoptHEqoVtB6yta3Q8v', '2018-08-28 09:26:00', 'S'),
(11, 'Admin Admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'z5fXLv48iY1PFC7ML_YOolY496vVXjWH', '2018-08-28 13:07:29', 'A'),
(12, 'Demo', 'demo', 'demo@gmail.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'CPhoMrzO-b5kyu0kcHaCHKCkxHBfaGPr', '2018-08-28 13:08:15', 'S'),
(13, 'Pathric Nboma', 'nboma23', 'fathric.nuboma@gmail.com', '202cb962ac59075b964b07152d234b70', 'PeeHlvFuASndPXthWP0uqokatLOVqX6b', '2018-08-30 14:45:26', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollements`
--
ALTER TABLE `enrollements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollement_details`
--
ALTER TABLE `enrollement_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollements`
--
ALTER TABLE `enrollements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `enrollement_details`
--
ALTER TABLE `enrollement_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
