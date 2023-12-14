-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 02:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edutrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `absent`
--

CREATE TABLE `absent` (
  `user_fname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absent`
--

INSERT INTO `absent` (`user_fname`, `user_email`, `class`, `note`, `date`, `time`) VALUES
('ahmed rafi', '0423rafi@gmail.com', '', 'high fever', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_student` varchar(255) NOT NULL,
  `attendance_class` varchar(255) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `class_tutor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attendance_student`, `attendance_class`, `attendance_status`, `date`, `class_tutor_name`) VALUES
(1, 'student', 'biology', 'Absent', '2023-12-7', 'teacher'),
(2, 'student2', 'chemistry', 'Absent', '2023-12-7', 'teacher2'),
(3, 'student3', 'computer science', 'present', '2023-12-7', 'teacher3'),
(5, 'hamdan', 'biology', 'Present', '2023-12-07', 'teacher'),
(8, 'teststudent', 'software', 'Present', '2023-12-07', 'teacher'),
(9, 'heba', 'chemistry', 'Absent', '2023-12-07', 'teacher2'),
(10, 'saba', 'software', 'Present', '2023-12-07', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_date` varchar(255) NOT NULL,
  `class_time` varchar(255) NOT NULL,
  `class_location` varchar(255) NOT NULL,
  `class_tutor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_date`, `class_time`, `class_location`, `class_tutor_name`) VALUES
(2, 'chemistry', '2023-11-26', '1:00 PM', 'Ras Al Khaimah', 'teacher2'),
(3, 'computer science', '2023-11-26', '3:00 PM', 'Dubai', 'teacher3'),
(16, 'biology', '2023-12-16', '05:34 PM', 'Ras Al Khaimah', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_manager_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_manager_name`) VALUES
('1', 'SWE6209', 'teacher'),
('2', 'SWE6203', 'teacher2'),
('3', 'SWE6204', 'teacher3'),
('4', 'SWE6201', 'teacher3'),
('5', 'SWE4208', 'teacher3');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) NOT NULL,
  `alert` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`user_id`, `user_fname`, `student_name`, `alert`, `date`) VALUES
(39, 'teacher', '', 'i will be on leave', '2023-12-13'),
(45, 'teacher', 'student', 'You have been marked absent in the class on 2023-12-13 by teacher', '2023-12-13'),
(46, 'teacher', 'hamdan', 'You have been marked absent in the class on 2023-12-13 by teacher', '2023-12-13'),
(47, 'teacher', 'teststudent', 'You have been marked absent in the class on 2023-12-13 by teacher', '2023-12-13'),
(48, 'teacher', 'saba', 'You have been marked absent in the class on 2023-12-13 by teacher', '2023-12-13'),
(49, 'teacher', '', 'bss kardo', '2023-12-13'),
(54, 'teacher', 'student', 'You have been marked absent in the class on 2023-12-13 by teacher', '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `attendance_id` varchar(255) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `report_status` enum('Present','Absent') DEFAULT NULL,
  `attendance_student` varchar(255) DEFAULT NULL,
  `attendance_class` varchar(255) DEFAULT NULL,
  `class_tutor_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `attendance_id`, `report_date`, `report_status`, `attendance_student`, `attendance_class`, `class_tutor_name`) VALUES
(129, '1', '2023-12-07', 'Present', 'student', 'biology', 'teacher'),
(130, '5', '2023-12-07', 'Present', 'hamdan', 'biology', 'teacher'),
(131, '6', '2023-12-07', 'Present', 'hadman', 'biology', 'teacher'),
(142, '8', '2023-12-07', 'Present', 'teststudent', 'software', 'teacher'),
(143, '10', '2023-12-07', 'Present', 'saba', 'software', 'teacher'),
(148, '2', '2023-12-11', 'Absent', 'student2', 'chemistry', 'teacher2'),
(149, '9', '2023-12-11', 'Absent', 'heba', 'chemistry', 'teacher2');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachernotifications`
--

CREATE TABLE `teachernotifications` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `alert` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachernotifications`
--

INSERT INTO `teachernotifications` (`user_id`, `user_fname`, `student_name`, `alert`, `date`) VALUES
(7, 'teacher', 'student', 'You have marked student present on 2023-12-13', '2023-12-13'),
(8, 'teacher', 'hamdan', 'You have marked hamdan present on 2023-12-13', '2023-12-13'),
(9, 'teacher', 'teststudent', 'You have marked teststudent present on 2023-12-13', '2023-12-13'),
(10, 'teacher', 'saba', 'You have marked saba present on 2023-12-13', '2023-12-13'),
(11, 'teacher', 'student', 'You have marked student absent on 2023-12-13', '2023-12-13'),
(12, 'teacher', 'hamdan', 'You have marked hamdan absent on 2023-12-13', '2023-12-13'),
(13, 'teacher', 'teststudent', 'You have marked teststudent absent on 2023-12-13', '2023-12-13'),
(14, 'teacher', 'saba', 'You have marked saba absent on 2023-12-13', '2023-12-13'),
(15, 'teacher', 'student', 'You have marked student absent on 2023-12-13', '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_fname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_fname`, `user_email`, `phone_number`, `user_role`, `user_password`, `class_name`) VALUES
('admin', 'admin123@gmail.com', '12345', 'admin', 'admin', ''),
('student', 'student1@gmail.com', '34252', 'student', 'student', ''),
('teacher', 'teacher1@gmail.com', '25242525', 'teacher', 'teacher', 'biology'),
('teacher2', 'teacher2@gmail.com', '12345', 'teacher', 'teacher', 'chemistry'),
('teacher3', 'teacher3@gmail.com', '12345', 'teacher', 'teacher', 'computer science');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absent`
--
ALTER TABLE `absent`
  ADD PRIMARY KEY (`user_fname`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `teachernotifications`
--
ALTER TABLE `teachernotifications`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_fname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `teachernotifications`
--
ALTER TABLE `teachernotifications`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
