-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 08:23 AM
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

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`trail_id`, `trail_user`, `trail_utype`, `trail_ip`, `trail_action`, `trail_date`, `trail_time`) VALUES
(1, 'Thomas Broñola', 'systemadmin', '::1', 'Logged In', '2022-07-31 08:11:54', '08:11:54am'),
(2, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-31 08:12:52', '08:12:52am'),
(3, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-31 08:13:30', '08:13:30am'),
(4, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-31 08:23:12', '08:23:12am');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(128) NOT NULL,
  `announce` mediumtext NOT NULL,
  `announcement_date` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announce`, `announcement_date`) VALUES
(1, 'Announcement!\r\n\r\nBarangay Singko Tres now has a working management system with an SMS API!\r\nThank you and have a good day!', '07/31/2022'),
(2, 'Announcement!\r\n\r\nBarangay Singko Tres now has a working management system with an SMS API!\r\nThank you and have a good day!', '07/31/2022'),
(3, 'Announcement!\r\n\r\nBarangay Singko Tres now has a working management system with an SMS API!\r\nThank you and have a good day!', '07/31/2022');

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
(2, 'jhonberniedevega@gmail.com', '$2y$10$TyzVNXv0svWyYjTj0acxROBNmX0OSABFTdjzkJ5Atfuckmzx8o2j2', 'systemadmin', 'Jhon Bernie', '+639154273628'),
(4, 'captain@gmail.com', '$2y$10$VsX52c72vYGMy39y/QlZkuVlTvAOKA1GXPYTV7cyK3Ec70AsA1UaO', 'captain', 'captain', '+639154273628'),
(5, 'secretary@gmail.com', '$2y$10$wnL4bl6NxALSxokSWNkRVunPaoF3UAeZ8pgx4nKHTZWDzrx85RRm.', 'secretary', 'secretary', '+639154273628'),
(6, 'tanod@gmail.com', '$2y$10$xx24FhQzhi2.7GS2jywdluqIy7/LiShgn9e9cZVfa.7z3WhgeHKLq', 'tanod', 'tanod', '+639154273628'),
(7, 'admin@gmail.com', '$2y$10$ybdT9s7zANUpFgY3eIYMLeiYDy03sYq5SIKm.Ia3lajygobCF7JDe', 'admin', 'admin', '+639154273628'),
(8, 'systemadmin@gmail.com', '$2y$10$YRle7HuuQmpGi.hod5KeKe3rgYsYPxFSXipFdBLFmhXQsUs5qU4Ve', 'systemadmin', 'systemadmin', '+639154273628');

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
  MODIFY `trail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blotter`
--
ALTER TABLE `blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
