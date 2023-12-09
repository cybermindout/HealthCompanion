-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 08:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_healthcompanion`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Ashwin ', 'ashwinsajithofficial@gmail.com', 'Ashwin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointment_id`, `appointment_date`, `user_id`, `doctor_id`, `appointment_time`, `appointment_status`) VALUES
(1, '2022-10-26', 1, 1, '15:00:00', 2),
(2, '0000-00-00', 1, 1, '00:00:00', 2),
(3, '2022-11-02', 3, 1, '15:00:00', 2),
(4, '2022-11-02', 3, 1, '15:00:00', 2),
(5, '2022-11-02', 3, 1, '15:00:00', 2),
(6, '2022-11-02', 3, 1, '15:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cappointment`
--

CREATE TABLE `tbl_cappointment` (
  `cappointment_id` int(11) NOT NULL,
  `cappointment_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `counsellor_id` int(11) NOT NULL,
  `cappointment_time` time NOT NULL,
  `cappointment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cchat`
--

CREATE TABLE `tbl_cchat` (
  `cchat_id` int(11) NOT NULL,
  `cchat_datetime` varchar(100) NOT NULL,
  `cchat_fromcid` varchar(100) NOT NULL DEFAULT '`0',
  `cchat_touid` varchar(100) NOT NULL DEFAULT '0',
  `cchat_fromuid` varchar(100) NOT NULL DEFAULT '0',
  `cchat_tocid` varchar(100) NOT NULL DEFAULT '0',
  `cchat_content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_date` date NOT NULL,
  `complaint_content` varchar(200) NOT NULL,
  `complaint_reply` varchar(200) NOT NULL DEFAULT 'Not Yet Replyed',
  `complaint_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_date`, `complaint_content`, `complaint_reply`, `complaint_status`, `user_id`) VALUES
(1, '0000-00-00', 'asdf', '', 0, 1),
(2, '2022-11-01', 'Hello', 'hi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counsellor`
--

CREATE TABLE `tbl_counsellor` (
  `counsellor_id` int(11) NOT NULL,
  `counsellor_name` varchar(100) NOT NULL,
  `counsellor_contact` varchar(100) NOT NULL,
  `counsellor_email` varchar(100) NOT NULL,
  `counsellor_address` varchar(100) NOT NULL,
  `counsellor_photo` varchar(100) NOT NULL,
  `counsellor_proof` varchar(100) NOT NULL,
  `counsellor_dob` varchar(100) NOT NULL,
  `counsellor_qualification` varchar(100) NOT NULL,
  `counsellor_password` varchar(100) NOT NULL,
  `counsellor_status` int(11) NOT NULL DEFAULT 0,
  `place_id` int(11) NOT NULL,
  `chat_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_counsellor`
--

INSERT INTO `tbl_counsellor` (`counsellor_id`, `counsellor_name`, `counsellor_contact`, `counsellor_email`, `counsellor_address`, `counsellor_photo`, `counsellor_proof`, `counsellor_dob`, `counsellor_qualification`, `counsellor_password`, `counsellor_status`, `place_id`, `chat_status`) VALUES
(4, 'Suraj K S', '9808889', 'hbhb@jhbhb', 'ihbhib', 'screenshot.png', 'screenshot.png', '0001-11-11', 'sdff', 'Qwerty@123', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dchat`
--

CREATE TABLE `tbl_dchat` (
  `dchat_id` int(11) NOT NULL,
  `dchat_datetime` varchar(100) NOT NULL,
  `dchat_fromdid` varchar(100) NOT NULL DEFAULT '0',
  `dchat_touid` varchar(100) NOT NULL DEFAULT '0',
  `dchat_fromuid` varchar(100) NOT NULL DEFAULT '0',
  `dchat_todid` varchar(100) NOT NULL DEFAULT '0',
  `dchat_content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, 'THIRUVANATHAPURAM'),
(4, 'KOLLAM'),
(5, 'PATHANAMTHITTA'),
(6, 'ALAPUZHA'),
(7, 'KOTTYAM'),
(8, 'IDUKKI'),
(9, 'ERANAKULAM'),
(10, 'THRISSUR'),
(11, 'PALAKKAD'),
(12, 'MALAPURAM'),
(13, 'KOZHIKODE'),
(14, 'WAYANAD'),
(15, 'KANNUR'),
(16, 'KASARAGOD');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_contact` varchar(100) NOT NULL,
  `doctor_email` varchar(100) NOT NULL,
  `doctor_address` varchar(100) NOT NULL,
  `doctor_qualification` varchar(100) NOT NULL,
  `doctor_photo` varchar(100) NOT NULL,
  `doctor_proof` varchar(100) NOT NULL,
  `doctor_dob` varchar(100) NOT NULL,
  `doctor_password` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `speacialization_id` int(11) NOT NULL,
  `doctor_status` int(11) NOT NULL DEFAULT 0,
  `chat_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `doctor_name`, `doctor_contact`, `doctor_email`, `doctor_address`, `doctor_qualification`, `doctor_photo`, `doctor_proof`, `doctor_dob`, `doctor_password`, `place_id`, `speacialization_id`, `doctor_status`, `chat_status`) VALUES
(1, 'Ramesh', '9745432345', 'ramesh@gmail.com', 'Kothamangalam Eranakulam 686691', 'MBBS', 'doctor-1.jpeg', 'doctor-id.jpeg', '1997-06-18', 'Ramesh@123', 2, 1, 1, 0),
(6, 'Micheal Kurian', '9846435588', 'micheal@gmail.com', 'Muvattupuzha\r\nEranakulam', 'MBBS', 'doctor-2.jpeg', 'doctor-id.jpeg', '1997-06-17', 'Micheal@123', 3, 1, 1, 0),
(7, 'Sunny', '999576874', 'sunny@gmail.com', 'Edappally\r\nEranakulam\r\n\r\n', 'MBBS', 'doctor-3.jpg', 'doctor-id.jpeg', '1997-11-12', 'Sunny@123', 1, 2, 2, 0),
(8, 'ALto B', '9497034483', 'altob282@gmail.com', 'Puthethu House , Thankalam, Kothamangalam,\r\nEranakulam', 'MPT', 'pot.png', 'Counsellor-id.jpg', '1999-08-16', 'Altob@2222', 2, 3, 1, 0),
(9, 'Arya L', '9995768091', 'arya@gmail.com', 'qwerty', 'MBBS', 'Microsoft Store 22-09-2022 18_03_42.png', 'doctor-id.jpeg', '1998-06-18', 'Arya@123', 3, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(200) NOT NULL,
  `feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `feedback_content`, `feedback_date`) VALUES
(1, 'chooper', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'EDAPPALLY', 9),
(2, 'KOTHAMANGALAM', 9),
(3, 'MUVATTUPUZHA', 9),
(4, 'KAZHAKOOTTAM', 1),
(5, 'POTHENCODE', 1),
(6, 'NEDUMANGAD', 1),
(7, 'KOVALAM', 1),
(8, 'VENJARAMMOODU', 1),
(9, 'ATTINGAL', 1),
(10, 'MAYYANAD', 4),
(11, 'KERALAPURAM', 4),
(12, 'KOTTAMKARA', 4),
(13, 'PERINAD', 4),
(14, 'KANNANALLOOR', 4),
(15, 'ELANTOOR', 5),
(16, 'KAIPATTOOR', 5),
(17, 'MALAYALAPUZHA', 5),
(18, 'KONNI', 5),
(19, 'ELAVUMTHITTA', 5),
(20, 'KAINAKARY', 6),
(21, 'PARAVUR', 6),
(22, 'MULLAKKAL', 6),
(23, 'CHERTHALA', 6),
(24, 'KUTTANAD', 6),
(25, 'PUTHUPPALLY', 7),
(26, 'CHENGALAM', 7),
(27, 'KUMARAKOM', 7),
(28, 'ETTUMANOOR', 7),
(29, 'MANNANAM', 7),
(30, 'THODUPUZHA', 8),
(31, 'ADIMALI', 8),
(32, 'KATTAPPANA', 8),
(33, 'MUNNAR', 8),
(34, 'KUMILY', 8),
(35, 'VYTILLA', 9),
(36, 'ALUVA', 9),
(37, 'PERAMANGALAM', 10),
(38, 'KILLANNUR', 10),
(39, 'THALORE', 10),
(40, 'NADATHARA', 10),
(41, 'THALORE', 10),
(42, 'ARIMBUR', 10),
(43, 'MALAMPUZHA', 11),
(44, 'MUTTIKULAGARA', 11),
(45, 'MUNDUR', 11),
(46, 'KANJIKODE', 11),
(47, 'KOLLENGODE', 11),
(48, 'KODUR', 12),
(49, 'KOTTAKKAL', 12),
(50, 'KONDOTTY', 12),
(51, 'MANJERI', 12),
(52, 'AREEKODE', 12),
(53, 'KUNNAMANGALAM', 13),
(54, 'KARAPARAMBA', 13),
(55, 'BALUSSERY', 13),
(56, 'MALAPARAMBA', 13),
(57, 'NARIKUNI', 13),
(58, 'KALPETTA', 14),
(59, 'MANANTHAVADY', 14),
(60, 'VYTHIRI', 14),
(61, 'MEPPADI', 14),
(62, 'PULPALLY', 14),
(63, 'AZHIKODE', 15),
(64, 'TALIPARAMBA', 15),
(65, 'PARASSINIKADAVU', 15),
(66, 'MAYYIL', 15),
(67, 'PAYYANUR', 15),
(68, 'KUDLU', 16),
(69, 'PERNADKA', 16),
(70, 'MOGRALPUTHUR', 16),
(71, 'PERAL', 16),
(72, 'KALNAD', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schedule_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_starttime` time NOT NULL,
  `schedule_entime` time NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `schedule_date`, `schedule_starttime`, `schedule_entime`, `doctor_id`) VALUES
(1, '2022-10-26', '14:00:00', '20:00:00', 1),
(2, '2022-11-02', '16:00:00', '22:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_speacialization`
--

CREATE TABLE `tbl_speacialization` (
  `speacialization_id` int(11) NOT NULL,
  `speacialization_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_speacialization`
--

INSERT INTO `tbl_speacialization` (`speacialization_id`, `speacialization_name`) VALUES
(1, 'General Medicine'),
(2, 'Dermatology'),
(3, 'MPT'),
(4, 'BPT'),
(5, 'Pediatrics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `user_photo`, `user_proof`, `user_dob`, `user_gender`, `user_password`, `place_id`) VALUES
(1, 'Alto B', '9847066221', 'altob282@gmail.com', 'Alto villas', 'user photo.jpg', 'ID PROOF.jpg', '1997-08-16', 'Male', 'Alto@123', 2),
(2, 'Alto B', '9847066221', 'altob282@gmail.com', 'Alto villas', 'user photo.jpg', 'ID PROOF.jpg', '1997-08-16', 'Male', 'Alto@123', 2),
(3, 'Rakesh S', '9995558822', 'rakeshsrks2580@gmail.com', 'Ambu villas', 'cycle.png', 'cyc.png', '2002-05-22', 'Male', 'Rakesh@123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `tbl_cchat`
--
ALTER TABLE `tbl_cchat`
  ADD PRIMARY KEY (`cchat_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_counsellor`
--
ALTER TABLE `tbl_counsellor`
  ADD PRIMARY KEY (`counsellor_id`);

--
-- Indexes for table `tbl_dchat`
--
ALTER TABLE `tbl_dchat`
  ADD PRIMARY KEY (`dchat_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_speacialization`
--
ALTER TABLE `tbl_speacialization`
  ADD PRIMARY KEY (`speacialization_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_cchat`
--
ALTER TABLE `tbl_cchat`
  MODIFY `cchat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_counsellor`
--
ALTER TABLE `tbl_counsellor`
  MODIFY `counsellor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_dchat`
--
ALTER TABLE `tbl_dchat`
  MODIFY `dchat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_speacialization`
--
ALTER TABLE `tbl_speacialization`
  MODIFY `speacialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
