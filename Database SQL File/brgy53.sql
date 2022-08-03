-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2022 at 05:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy53`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `trail_id` int(11) NOT NULL,
  `trail_user` varchar(128) NOT NULL,
  `trail_utype` varchar(128) NOT NULL,
  `trail_ip` varchar(128) NOT NULL,
  `trail_action` varchar(128) NOT NULL,
  `trail_date` varchar(128) NOT NULL,
  `trail_time` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(128) NOT NULL,
  `announce` mediumtext NOT NULL,
  `announcement_date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE `blotter` (
  `id` int(11) NOT NULL,
  `reported_date` varchar(128) NOT NULL,
  `complainant` varchar(128) NOT NULL,
  `defendant` varchar(128) NOT NULL,
  `report` mediumtext NOT NULL,
  `official_incharge` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blotter`
--

INSERT INTO `blotter` (`id`, `reported_date`, `complainant`, `defendant`, `report`, `official_incharge`) VALUES
(3, '06/07/2022', 'Thomas', 'Jhon', 'This is test report.(with edit)\r\n\r\nAddition of official in-charge in the database.\r\n\r\nThe official in-charge will be the one who is logged in and writing this report.', 'Thomas Broñola'),
(4, '07/07/2022', 'Thomas', 'Agev ed', 'test', 'Thomas Broñola'),
(5, '07/07/2022', 'Thomas', 'Agev ed', 'This is test report #2 (with edit)\r\n\r\n\r\n\r\n\r\n\r\n\r\nHatdog\r\n\r\n\r\n\r\n\r\n\r\nCheesedog\r\n\r\n\r\n\r\n\r\n\r\nFootlong', 'Thomas Broñola'),
(6, '09/10/2022', 'Thomas', 'Agev ed', 'This is test report #3 (with edit)\r\n\r\n\r\n\r\n\r\n\r\n\r\nHatdog\r\n\r\n\r\n\r\n\r\n\r\nCheesedog\r\n\r\n\r\n\r\n\r\n\r\nFootlong', 'Thomas Broñola');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `auth` varchar(128) NOT NULL,
  `sid` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `auth`, `sid`, `phone`) VALUES
(1, '78a43a12413982c241e3a33b4e118306', 'ACd6c0d5cf6d9fb0166f4d8b927563a03d', '+13082808881');

-- --------------------------------------------------------

--
-- Table structure for table `sms_archive`
--

CREATE TABLE `sms_archive` (
  `message` mediumtext NOT NULL,
  `message_date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_type` varchar(128) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `user_contact` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `user_password`, `user_type`, `full_name`, `user_contact`) VALUES
(1, 'bronolathomas@gmail.com', '$2y$10$MTYBqd/.Kwu8EXuGz904SeyAXoePpXfwLRgtPrAAwtGvnkGQnpLwq', 'systemadmin', 'Thomas Broñola', '+639475892286'),
(11, 'jhonberniedevega@gmail.com', '$2y$10$/kovUtmqA7QaeOCXSNTrDeap2kMJXEL07P3PPCCcZPSdyDjf5PTMW', 'systemadmin', 'Jhon Bernie De Vega', '+639154273628');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`trail_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blotter`
--
ALTER TABLE `blotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `trail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blotter`
--
ALTER TABLE `blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
