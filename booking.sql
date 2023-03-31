-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 31 มี.ค. 2023 เมื่อ 09:12 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.6.7-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf32 NOT NULL,
  `option_add` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `timeslot` varchar(255) CHARACTER SET utf32 NOT NULL,
  `date` varchar(255) CHARACTER SET utf32 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf32 NOT NULL,
  `instructor` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ResearchTitle` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `designation` varchar(11) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `booking1`
--

CREATE TABLE `booking1` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf32 NOT NULL,
  `option_add` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `timeslot` varchar(255) CHARACTER SET utf32 NOT NULL,
  `date` varchar(255) CHARACTER SET utf32 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf32 NOT NULL,
  `instructor` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ResearchTitle` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `designation` varchar(11) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- dump ตาราง `booking1`
--

INSERT INTO `booking1` (`booking_id`, `name`, `title`, `option_add`, `timeslot`, `date`, `email`, `tel`, `instructor`, `ResearchTitle`, `designation`, `dateCreate`) VALUES
(13, 'PATCHARAPON', 'Research Consult', 'Zoom-meeting', '13:00PM_14:00PM', '2023-03-30', 'phatcharapon.p@cmu.ac.th', '0987654321', '(Dr.Patompong Khaw-on)', 'Test', '1', '2023-03-30 09:02:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking1`
--
ALTER TABLE `booking1`
  ADD PRIMARY KEY (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `booking1`
--
ALTER TABLE `booking1`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
