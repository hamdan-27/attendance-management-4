-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 03:35 PM
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
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absent`
--

INSERT INTO `absent` (`user_fname`, `user_email`, `note`) VALUES
('', '', ''),
('', '', ''),
('', '', ''),
('', '', 'i am sick!'),
('ahmed rafi', '0423rafi@gmail.com', 'high fever'),
('hamdanmuhammad', 'hamdan121@hotmail.com', 'dead\r\n'),
('ahmed rafi', '0423rafi@gmail.com', 'Depressition');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` varchar(255) NOT NULL,
  `attendance_student` varchar(255) NOT NULL,
  `attendance_class` varchar(255) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `present_percentage` varchar(255) NOT NULL,
  `absent_percentage` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `class_tutor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attendance_student`, `attendance_class`, `attendance_status`, `present_percentage`, `absent_percentage`, `date`, `class_tutor_name`) VALUES
('1', 'ahmed rafi', 'biology', 'Present', '70', '-40', '2023-11-26', 'abdur rehman'),
('10', 'maxwell', 'biology', 'Present', '70', '-10', '2023-11-30', 'abdur rehman'),
('11', 'warner', 'chemistry', 'Present', '10', '-10', '2023-11-30', 'renuka'),
('12', 'sahilo', 'computer science', 'Present', '20', '0', '2023-11-30', 'rehna khan'),
('13', 'essa abbas', 'biology', 'absent', '10', '10', '2023-12-4', 'abdur rehman'),
('14', 'kumara', 'chemistry', 'Present', '10', '-10', '2023-11-30', 'renuka'),
('19', 'avinash kumar', 'computer science', 'Present', '10', '10', '2023-11-30', 'rehna khan'),
('2', 'hamdan muhammad', 'biology', 'Present', '70', '-10', '2023-11-26', 'abdur rehman'),
('24', 'suhail ashraf', 'biology', 'present', '10', '10', '2023-12-4', 'abdur rehman'),
('4', 'ahmed rafi', 'computer science', 'Present', '40', '-10', '2023-11-26', 'rehna khan'),
('5', 'karan singh', 'biology', 'Present', '70', '-40', '2023-11-30', 'abdur rehman'),
('6', 'rohan', 'biology', 'Present', '80', '-40', '2023-11-30', 'abdur rehman'),
('7', 'raj', 'chemistry', 'Present', '50', '10', '2023-11-30', 'renuka'),
('8', 'theekshana', 'computer science', 'Present', '40', '0', '2023-11-30', 'rehna khan'),
('9', 'rajesh', 'biology', 'Present', '60', '-10', '2023-11-30', 'abdur rehman');

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
(1, 'chemistry', '2023-11-26', '10:25 AM', 'Ras Al Khaimah', 'renuka'),
(2, 'biology', '2023-11-26', '1:00 PM', 'Ras Al Khaimah', 'abdur rehman'),
(3, 'computer science', '2023-11-26', '3:00 PM', 'Dubai', 'rehna khan'),
(8, 'kanjar khana', '2023-12-03', '11:44 PM', 'Umm Al Quwain', 'abdur rehman');

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
('1', 'SWE6202', 'rehna khan'),
('2', 'SWE6205', 'renuka '),
('3', 'SWE6204', 'abdur rehman'),
('4', 'SWE6201', 'abdur rehman'),
('5', 'SWE4208', 'abdur rehman');

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
  `present_percentage` int(11) DEFAULT NULL,
  `absent_percentage` int(11) DEFAULT NULL,
  `class_tutor_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `attendance_id`, `report_date`, `report_status`, `attendance_student`, `attendance_class`, `present_percentage`, `absent_percentage`, `class_tutor_name`) VALUES
(1, '1', '2023-11-30', 'Present', 'ahmed rafi', 'biology', 50, -20, 'abdur rehman'),
(2, '10', '2023-11-30', 'Present', 'maxwell', 'biology', 50, 10, 'abdur rehman'),
(3, '2', '2023-11-30', 'Present', 'hamdan muhammad', 'biology', 50, 10, 'abdur rehman'),
(4, '5', '2023-11-30', 'Present', 'karan singh', 'biology', 50, -20, 'abdur rehman'),
(5, '6', '2023-11-30', 'Present', 'rohan', 'biology', 60, -20, 'abdur rehman'),
(6, '9', '2023-11-30', 'Present', 'rajesh', 'biology', 40, 10, 'abdur rehman'),
(13, '11', '2023-11-30', 'Present', 'warner', 'chemistry', 0, 0, 'renuka'),
(14, '14', '2023-11-30', 'Present', 'kumara', 'chemistry', 0, 0, 'renuka'),
(15, '7', '2023-11-30', 'Present', 'raj', 'chemistry', 40, 20, 'renuka'),
(20, '12', '2023-11-30', 'Present', 'sahilo', 'computer science', 10, 10, 'rehna khan'),
(21, '19', '2023-11-30', 'Present', 'avinash kumar', 'computer science', 0, 20, 'rehna khan'),
(22, '4', '2023-11-30', 'Present', 'ahmed rafi', 'computer science', 30, 0, 'rehna khan'),
(23, '8', '2023-11-30', 'Present', 'theekshana', 'computer science', 30, 10, 'rehna khan'),
(24, '24', '2023-12-04', 'Present', 'suhail ashraf', 'biology', 10, 10, 'abdur rehman');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_fname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_confirmpassword` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_fname`, `user_email`, `phone_number`, `user_role`, `user_password`, `user_confirmpassword`, `class_name`) VALUES
('abdur rehman', 'abdurrehman12@gmail.com', '99991', 'teacher', '111', '111', 'biology'),
('admin', 'admin123@gmail.com', '9529592599', 'admin', 'admin', 'admin', ''),
('ahmed rafi ', '0423rafi@gmail.com', '050481677011', 'student', '123', '123', ''),
('hamdan muhammad', 'hamdan121@hotmail.com', '0556683794', 'student ', 'hamdan', 'hamdan', ''),
('rehna khan', 'rehna23@gmail.com', '242242424', 'teacher', '111', '111', 'computer science'),
('renuka', 'renuka13@gmail.com', '241141', 'teacher', '111', '111', 'chemistry');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_fname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
