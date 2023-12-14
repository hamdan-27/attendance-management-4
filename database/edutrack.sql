-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 10:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attendance_student`, `attendance_class`, `attendance_status`, `date`, `class_tutor_name`) VALUES
(19, 'student', 'biology', 'Present', '2023-12-15', 'teacher'),
(20, 'student2', 'biology', 'Absent', '2023-12-15', 'teacher'),
(21, 'student3', 'biology', 'Absent', '2023-12-15', 'teacher'),
(22, 'student4', 'biology', 'Present', '2023-12-15', 'teacher'),
(23, 'student5', 'biology', 'Absent', '2023-12-14', 'teacher'),
(24, 'student6', 'biology', 'Present', '2023-12-14', 'teacher'),
(25, 'student7', 'biology', 'Present', '2023-12-14', 'teacher'),
(26, 'student8', 'biology', 'Present', '2023-12-14', 'teacher'),
(27, 'student', 'botany', 'Absent', '2023-12-14', 'teacher'),
(28, 'student2', 'botany', 'Absent', '2023-12-13', 'teacher'),
(29, 'student3', 'botany', 'Present', '2023-12-13', 'teacher'),
(30, 'student4', 'botany', 'Present', '2023-12-13', 'teacher'),
(31, 'student5', 'botany', 'Absent', '2023-12-13', 'teacher'),
(32, 'student6', 'botany', 'Absent', '2023-12-13', 'teacher'),
(33, 'student7', 'botany', 'Present', '2023-12-15', 'teacher'),
(34, 'student8', 'botany', 'Present', '2023-12-13', 'teacher'),
(35, 'student', 'chemistry', 'Absent', '2023-12-12', 'teacher2'),
(36, 'student2', 'chemistry', 'Present', '2023-12-12', 'teacher2'),
(37, 'student3', 'chemistry', 'Present', '2023-12-12', 'teacher2'),
(38, 'student4', 'chemistry', 'Present', '2023-12-12', 'teacher2'),
(39, 'student5', 'chemistry', 'Absent', '2023-12-11', 'teacher2'),
(40, 'student6', 'chemistry', 'Absent', '2023-12-11', 'teacher2'),
(41, 'student7', 'chemistry', 'Present', '2023-12-11', 'teacher2'),
(42, 'student8', 'chemistry', 'Present', '2023-12-11', 'teacher2'),
(57, 'student', 'biochemistry', 'Present', '2023-12-10', 'teacher2'),
(58, 'student2', 'biochemistry', '', '', 'teacher2'),
(59, 'student3', 'biochemistry', '', '', 'teacher2'),
(60, 'student4', 'biochemistry', '', '', 'teacher2'),
(61, 'student5', 'biochemistry', '', '', 'teacher2'),
(62, 'student6', 'biochemistry', '', '', 'teacher2'),
(63, 'student7', 'biochemistry', '', '', 'teacher2'),
(64, 'student8', 'biochemistry', '', '', 'teacher2'),
(65, 'student', 'computer science', '', '', 'teacher3'),
(66, 'student2', 'computer science', '', '', 'teacher3'),
(67, 'student3', 'computer science', '', '', 'teacher3'),
(68, 'student4', 'computer science', '', '', 'teacher3'),
(69, 'student5', 'computer science', '', '', 'teacher3'),
(70, 'student6', 'computer science', '', '', 'teacher3'),
(71, 'student7', 'computer science', '', '', 'teacher3'),
(72, 'student8', 'computer science', '', '', 'teacher3'),
(73, 'student', 'javascript', '', '', 'teacher3'),
(74, 'student2', 'javascript', '', '', 'teacher3'),
(75, 'student3', 'javascript', '', '', 'teacher3'),
(76, 'student4', 'javascript', '', '', 'teacher3'),
(77, 'student5', 'javascript', '', '', 'teacher3'),
(78, 'student6', 'javascript', '', '', 'teacher3'),
(79, 'student7', 'javascript', '', '', 'teacher3'),
(80, 'student8', 'javascript', '', '', 'teacher3');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_date`, `class_time`, `class_location`, `class_tutor_name`) VALUES
(2, 'chemistry', '2023-11-26', '1:00 PM', 'Ras Al Khaimah', 'teacher2'),
(3, 'computer science', '2023-11-26', '3:00 PM', 'Ras Al Khaimah', 'teacher3'),
(16, 'biology', '2023-12-16', '05:34 PM', 'Ras Al Khaimah', 'teacher'),
(39, 'biochemistry', '2023-12-15', '11:00 AM', 'Ras Al Khaimah', 'teacher2'),
(40, 'javascript', '2023-12-15', '10:00 AM', 'Ras Al Khaimah', 'teacher3'),
(41, 'botany', '2023-12-15', '8:00 AM', 'Ras Al Khaimah', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_manager_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_manager_name`) VALUES
('1', 'SWE6209', 'teacher'),
('2', 'SWE6203', 'teacher2'),
('3', 'SWE6204', 'teacher3'),
('4', 'SWE6201', 'teacher4');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`user_id`, `user_fname`, `student_name`, `alert`, `date`) VALUES
(122, 'teacher', 'student', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(123, 'teacher', 'student2', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(124, 'teacher', 'student3', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(125, 'teacher', 'student4', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(126, 'teacher', 'student5', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(127, 'teacher', 'student6', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(128, 'teacher', 'student7', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(129, 'teacher', 'student8', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(130, 'teacher', 'student', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(131, 'teacher', 'student2', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(132, 'teacher', 'student3', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(133, 'teacher', 'student4', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(134, 'teacher', 'student5', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(135, 'teacher', 'student6', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(136, 'teacher', 'student7', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(137, 'teacher', 'student8', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(138, 'teacher', 'student', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(139, 'teacher', 'student2', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(140, 'teacher', 'student3', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(141, 'teacher', 'student4', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(142, 'teacher', 'student5', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(143, 'teacher', 'student6', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(144, 'teacher', 'student7', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(145, 'teacher', 'student8', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(146, 'teacher', 'student', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(147, 'teacher', 'student2', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(148, 'teacher', 'student3', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(149, 'teacher', 'student4', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(150, 'teacher', 'student5', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(151, 'teacher', 'student6', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(152, 'teacher', 'student7', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(153, 'teacher', 'student8', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(154, 'teacher', 'student', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(155, 'teacher', 'student2', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(156, 'teacher', 'student4', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(157, 'teacher', 'student8', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(158, 'teacher', 'student2', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(159, 'teacher', 'student3', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(160, 'teacher', 'student5', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(161, 'teacher', 'student2', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(162, 'teacher', 'student3', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(163, 'teacher', 'student5', 'You have been marked absent in the class biology on 2023-12-14 by teacher', '2023-12-14'),
(164, 'teacher', 'student', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(165, 'teacher', 'student2', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(166, 'teacher', 'student5', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14'),
(167, 'teacher', 'student6', 'You have been marked absent in the class botany on 2023-12-14 by teacher', '2023-12-14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `attendance_id`, `report_date`, `report_status`, `attendance_student`, `attendance_class`, `class_tutor_name`) VALUES
(464, '19', '2023-12-16', 'Absent', 'student', 'biology', 'teacher'),
(465, '20', '2023-12-16', 'Present', 'student2', 'biology', 'teacher'),
(466, '21', '2023-12-16', 'Absent', 'student3', 'biology', 'teacher'),
(467, '22', '2023-12-16', 'Present', 'student4', 'biology', 'teacher'),
(468, '23', '2023-12-16', 'Absent', 'student5', 'biology', 'teacher'),
(469, '24', '2023-12-16', 'Absent', 'student6', 'biology', 'teacher'),
(470, '25', '2023-12-16', 'Present', 'student7', 'biology', 'teacher'),
(471, '26', '2023-12-16', 'Present', 'student8', 'biology', 'teacher'),
(472, '27', '2023-12-16', 'Present', 'student', 'botany', 'teacher'),
(473, '28', '2023-12-16', 'Absent', 'student2', 'botany', 'teacher'),
(474, '29', '2023-12-16', 'Present', 'student3', 'botany', 'teacher'),
(475, '30', '2023-12-16', 'Absent', 'student4', 'botany', 'teacher'),
(476, '31', '2023-12-16', 'Absent', 'student5', 'botany', 'teacher'),
(477, '32', '2023-12-16', 'Present', 'student6', 'botany', 'teacher'),
(478, '33', '2023-12-16', 'Absent', 'student7', 'botany', 'teacher'),
(479, '34', '2023-12-16', 'Present', 'student8', 'botany', 'teacher'),
(480, '19', '2023-12-12', 'Absent', 'student', 'biology', 'teacher'),
(481, '20', '2023-12-12', 'Absent', 'student2', 'biology', 'teacher'),
(482, '21', '2023-12-12', 'Present', 'student3', 'biology', 'teacher'),
(483, '22', '2023-12-12', 'Absent', 'student4', 'biology', 'teacher'),
(484, '23', '2023-12-12', 'Present', 'student5', 'biology', 'teacher'),
(485, '24', '2023-12-12', 'Present', 'student6', 'biology', 'teacher'),
(486, '25', '2023-12-12', 'Present', 'student7', 'biology', 'teacher'),
(487, '26', '2023-12-12', 'Absent', 'student8', 'biology', 'teacher'),
(488, '27', '2023-12-12', 'Present', 'student', 'botany', 'teacher'),
(489, '28', '2023-12-12', 'Absent', 'student2', 'botany', 'teacher'),
(490, '29', '2023-12-12', 'Absent', 'student3', 'botany', 'teacher'),
(491, '30', '2023-12-12', 'Present', 'student4', 'botany', 'teacher'),
(492, '31', '2023-12-12', 'Absent', 'student5', 'botany', 'teacher'),
(493, '32', '2023-12-12', 'Present', 'student6', 'botany', 'teacher'),
(494, '33', '2023-12-12', 'Present', 'student7', 'botany', 'teacher'),
(495, '34', '2023-12-12', 'Present', 'student8', 'botany', 'teacher'),
(496, '19', '2023-12-14', 'Present', 'student', 'biology', 'teacher'),
(497, '20', '2023-12-14', 'Absent', 'student2', 'biology', 'teacher'),
(498, '21', '2023-12-14', 'Absent', 'student3', 'biology', 'teacher'),
(499, '22', '2023-12-14', 'Present', 'student4', 'biology', 'teacher'),
(500, '23', '2023-12-14', 'Absent', 'student5', 'biology', 'teacher'),
(501, '24', '2023-12-14', 'Present', 'student6', 'biology', 'teacher'),
(502, '25', '2023-12-14', 'Present', 'student7', 'biology', 'teacher'),
(503, '26', '2023-12-14', 'Present', 'student8', 'biology', 'teacher'),
(504, '27', '2023-12-14', 'Absent', 'student', 'botany', 'teacher'),
(505, '28', '2023-12-14', 'Absent', 'student2', 'botany', 'teacher'),
(506, '29', '2023-12-14', 'Present', 'student3', 'botany', 'teacher'),
(507, '30', '2023-12-14', 'Present', 'student4', 'botany', 'teacher'),
(508, '31', '2023-12-14', 'Absent', 'student5', 'botany', 'teacher'),
(509, '32', '2023-12-14', 'Absent', 'student6', 'botany', 'teacher'),
(510, '33', '2023-12-14', 'Present', 'student7', 'botany', 'teacher'),
(511, '34', '2023-12-14', 'Present', 'student8', 'botany', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachernotifications`
--

INSERT INTO `teachernotifications` (`user_id`, `user_fname`, `student_name`, `alert`, `date`) VALUES
(278, 'teacher2', 'frq2', 'r22', '2023-12-14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_fname`, `user_email`, `phone_number`, `user_role`, `user_password`, `class_name`) VALUES
('admin', 'admin@gmail.com', '0504142166', 'admin', 'admin', ''),
('Ahmed Mohsin', 'tutututu@gmail.com', '0501234567', 'Student', 'ahmed', ''),
('Avinash Ajay', 'avi.ajay6@gmail.com', '0506723647', 'student', 'iloveCollege123', ''),
('student2', 'student2@gmail.com', '85838573', 'student', 'student', ''),
('student3', 'student3@gmail.com', '53552', 'student', 'student', ''),
('student4', 'student4@gmail.com', '57976', 'student', 'student', ''),
('student5', 'student5@gmail.com', '99974', 'student', 'student', ''),
('student6', 'student6@gmail.com', '98764', 'Student', 'student', ''),
('student7', 'student7@gmail.com', '9985265', 'Student', 'student', ''),
('student8', 'student8@gmail.com', '0765552', 'Student', 'student', ''),
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
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT for table `teachernotifications`
--
ALTER TABLE `teachernotifications`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
