-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 11:31 AM
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
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attendance_student`, `attendance_class`, `attendance_status`, `present_percentage`, `absent_percentage`, `date`) VALUES
('1', 'ahmed rafi', 'biology', 'present', '20', '10', '2023-11-26'),
('2', 'hamdan muhammad', 'biology', 'present', '40', '20', '2023-11-26'),
('3', 'ahmed rafi', 'maths', 'present', '30', '10', '2023-11-26'),
('4', 'ahmed rafi', 'computer science', 'present', '20', '10', '2023-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` varchar(255) NOT NULL,
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
('1', 'chemistry', '2023-11-26', '10:25 AM', 'Ras Al Khaimah', 'Ms.Renuka'),
('2', 'biology', '2023-11-26', '1:00 PM', 'Ras Al Khaimah', 'Mr. Abdurrehman manual'),
('3', 'software engineering', '2023-11-26', '3:00 PM', 'Dubai', 'Ms. Dr. Rehna khan'),
('4', 'drawing', '2023-11-27', '12:00 PM', 'Ras Al Khaimah', 'mr. renuka niydish'),
('5', 'computer science', '2023-11-26', '1:00 AM', 'Ras Al Khaimah', 'Mr. ibtisam');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_manager_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `user_confirmpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_fname`, `user_email`, `phone_number`, `user_role`, `user_password`, `user_confirmpassword`) VALUES
('abdus', 'abdus12@gmail.com', '452959295', 'teacher', 'yoyo', 'yoyo'),
('ahmed rafi ', '0423rafi@gmail.com', '05048167701', 'student', '123', '123'),
('hamdan muhammad', 'hamdan121@hotmail.com', '0556683794', 'student ', 'hamdan', 'hamdan'),
('hammad', 'hammad12@gmail.com', '9529592599', 'admin', 'hammad', 'hammad');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_fname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
