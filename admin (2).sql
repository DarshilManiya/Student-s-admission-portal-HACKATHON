-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2023 at 01:13 PM
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
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_detail`
--

CREATE TABLE `ad_detail` (
  `sr` int(3) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'institution',
  `sindex` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ad_detail`
--

INSERT INTO `ad_detail` (`sr`, `username`, `password`, `type`, `sindex`) VALUES
(1, 'sunny', 'sunny123', 'government', NULL),
(4, 'tirth', 'tirth123', 'institution', 17);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `sindex` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`sindex`, `sname`) VALUES
(10, 'brilliant'),
(13, 'gyandeep'),
(17, 'Matrubhumi');

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE `student_detail` (
  `id` int(11) NOT NULL,
  `academic-year` year(4) DEFAULT NULL,
  `grade` int(2) NOT NULL,
  `udise-code` varchar(15) NOT NULL,
  `section` enum('Primary','Secondary','Higher Secondary') NOT NULL,
  `student-name` varchar(20) NOT NULL,
  `section-roll-no` int(15) NOT NULL,
  `gender` enum('Male','Female','Transgender') NOT NULL,
  `dob` date NOT NULL,
  `mother-name` varchar(20) NOT NULL,
  `father-name` varchar(20) NOT NULL,
  `aadhaar-number` varchar(12) NOT NULL,
  `aadhaar-name` varchar(30) NOT NULL,
  `address` varchar(125) NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobile-number` int(10) NOT NULL,
  `alternate-mobile-number` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `indian-national` enum('yes','no') NOT NULL DEFAULT 'yes',
  `mother-tongue` varchar(20) DEFAULT NULL,
  `social-category` enum('General','SC','ST','OBC') NOT NULL,
  `minority-group` enum('Muslim','Christian','Sikh','Buddhist','Parsi','Jain','Not Applicable') NOT NULL,
  `bpl-beneficiary` enum('yes','no') NOT NULL,
  `aay-beneficiary` enum('yes','no') NOT NULL,
  `ews-disadvantaged` enum('yes','no') NOT NULL,
  `cwsn` enum('yes','no') NOT NULL,
  `impairment-type` char(20) NOT NULL,
  `disability-percentage` int(3) NOT NULL,
  `sld-screened` enum('yes','no') NOT NULL,
  `sld-type` enum('Dysgraphia','Dyscalculia','Dyslexia') NOT NULL,
  `asd-screened` enum('yes','no') NOT NULL,
  `adhd-screened` enum('yes','no') NOT NULL,
  `out-of-school-child` enum('yes','no') NOT NULL,
  `mainstreamed-year` enum('In current academic year','In earlier AC Year') NOT NULL,
  `blood-group` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `height` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `scholarship-received` enum('yes','no') NOT NULL,
  `central-scholarship` enum('yes','no') NOT NULL,
  `central-scholarship-details` varchar(30) NOT NULL,
  `state-scholarship` enum('yes','no') NOT NULL,
  `other-scholarship` enum('yes','no') NOT NULL,
  `scholarship-amount` int(7) NOT NULL,
  `birth-certificate` varchar(255) NOT NULL,
  `aadhar-card-upload` varchar(255) NOT NULL,
  `photo-upload` varchar(255) NOT NULL,
  `sindex` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`id`, `academic-year`, `grade`, `udise-code`, `section`, `student-name`, `section-roll-no`, `gender`, `dob`, `mother-name`, `father-name`, `aadhaar-number`, `aadhaar-name`, `address`, `pincode`, `mobile-number`, `alternate-mobile-number`, `email`, `indian-national`, `mother-tongue`, `social-category`, `minority-group`, `bpl-beneficiary`, `aay-beneficiary`, `ews-disadvantaged`, `cwsn`, `impairment-type`, `disability-percentage`, `sld-screened`, `sld-type`, `asd-screened`, `adhd-screened`, `out-of-school-child`, `mainstreamed-year`, `blood-group`, `height`, `weight`, `scholarship-received`, `central-scholarship`, `central-scholarship-details`, `state-scholarship`, `other-scholarship`, `scholarship-amount`, `birth-certificate`, `aadhar-card-upload`, `photo-upload`, `sindex`) VALUES
(41, '2013', 957516, '9cmFKFEwYm', 'Primary', 'q3ISUDC7aD', 0, 'Male', '2023-10-31', 'dMs0lrRuJ9', 'cxYiVAWqDW', '2147483647', 'K0QOxzqYDS', '7roiFFvWDg', 6134138, 2147483647, 2147483647, 'ejalw@684h.com', 'yes', 'fFBiHOWctR', 'General', 'Muslim', 'no', '', 'yes', 'no', '', 0, 'no', '', 'no', 'no', 'no', 'In current academic year', 'A+', 0, 0, 'no', '', '', '', '', 0, 'Darshil_12th_Result.pdf', 'applicaton letter.pdf', 'Darshil_EWS.pdf', 10),
(45, '2016', 13, '1242', 'Primary', 'ArwLsmvxQi', 0, 'Male', '2023-11-10', 'LBK6Vysepb', 'yUsSFC9dTt', '2147483647', 'JGwjeRBnrs', 'plXlGtSkIP', 4845412, 2147483647, 2147483647, 'fbwzt@8ynt.com', 'yes', 'EGXYY23PLh', 'General', 'Muslim', 'no', 'yes', 'no', 'no', 'KXNHcnr20C', 0, 'no', 'Dysgraphia', 'no', 'no', 'no', 'In current academic year', 'A+', 0, 0, 'yes', 'yes', 'MYSY', 'yes', 'yes', 0, 'uploads/Tentative_Schedule_Grand_Finale.pdf', 'uploads/Shortlisted_Teams_grand_Finale.pdf', 'uploads/3.jpg', 13),
(47, '2003', 8, '1242', 'Primary', 'vEtqSCTsEa', 0, 'Male', '2023-11-10', 'RcjvcKjeBR', 'KJ5eGHtADO', '1636903755', 'Y0IBFMw4wZ', 'GMltQIbAkv', 7013440, 419953043, 2147483647, 'sdvcb@r6nq.com', 'yes', 'f4rBLFxgqE', 'General', 'Muslim', 'no', 'yes', 'no', 'no', 'RPRb8Tl5WF', 0, 'no', 'Dysgraphia', 'no', 'no', 'no', 'In current academic year', 'A+', 3, 0, 'yes', 'yes', 'MYSY', 'yes', 'yes', 0, 'uploads/Shortlisted_Teams_grand_Finale.pdf', 'uploads/Tentative_Schedule_Grand_Finale.pdf', 'uploads/1.jpg', 10),
(57, '2003', 8, '1242', 'Primary', 'darshil', 0, 'Male', '2023-11-10', 'HkjtNMch3c', '8UgSewstIw', '2147483647', 'Tqdz2woBSy', 'eSWpdOuWgZ', 5972271, 2147483647, 2147483647, 'xokwr@kgaj.com', 'yes', 'qwCpkvtbjM', 'General', 'Muslim', 'no', 'yes', 'no', 'no', 'FmmZrhrClc', 0, 'no', 'Dysgraphia', 'no', 'no', 'no', 'In current academic year', 'A+', 0, 0, 'yes', 'yes', 'MYSY', 'yes', 'yes', 0, 'uploads/undertaking.pdf', 'uploads/SEM-V-Papers.pdf', 'uploads/3.jpg', 17),
(58, '2003', 8, '1242', 'Primary', 'darshil', 0, 'Male', '2023-11-10', 'MZrfVPAP4n', 'bPKt9EZwjn', '2147483647', 'YMBQ67tk7C', 'vIeRMjtLsF', 8824478, 1121721730, 2147483647, 'd2fyt@0yti.com', 'yes', 'kC8YbmKZ70', 'General', 'Muslim', 'no', 'yes', 'no', 'no', 'JjBy1eB9Oi', 0, 'no', 'Dysgraphia', 'no', 'no', 'no', 'In current academic year', 'A+', 0, 0, 'yes', 'yes', 'MYSY', 'yes', 'yes', 0, 'uploads/SEM-V-Papers.pdf', 'uploads/undertaking.pdf', 'uploads/mital.jpg', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_detail`
--
ALTER TABLE `ad_detail`
  ADD PRIMARY KEY (`sr`),
  ADD KEY `fk_school` (`sindex`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`sindex`);

--
-- Indexes for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_schoolstud` (`sindex`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_detail`
--
ALTER TABLE `ad_detail`
  MODIFY `sr` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_detail`
--
ALTER TABLE `student_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_detail`
--
ALTER TABLE `ad_detail`
  ADD CONSTRAINT `fk_school` FOREIGN KEY (`sindex`) REFERENCES `school` (`sindex`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD CONSTRAINT `fk_schoolstud` FOREIGN KEY (`sindex`) REFERENCES `school` (`sindex`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
