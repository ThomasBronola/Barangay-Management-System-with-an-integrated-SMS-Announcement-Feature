-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 10:07 PM
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
(1, 'Thomas Broñola', 'systemadmin', '::1', 'Created new account', '2022-07-11 08:07:33', '08:07:33am'),
(2, 'Thomas Broñola', 'systemadmin', '::1', 'Created new account', '2022-07-11 08:09:29', '08:09:29am'),
(3, 'Thomas Broñola', 'systemadmin', '::1', 'Created new account', '2022-07-11 08:09:53', '08:09:53am'),
(4, 'Thomas Broñola', 'systemadmin', '::1', 'Created new account', '2022-07-11 08:10:15', '08:10:15am'),
(5, 'Thomas Broñola', 'systemadmin', '::1', 'Created new account', '2022-07-11 08:10:56', '08:10:56am'),
(6, 'Thomas Broñola', 'systemadmin', '::1', 'Created new account', '2022-07-11 08:11:11', '08:11:11am'),
(7, 'Thomas Broñola', 'systemadmin', '::1', 'Created new account', '2022-07-11 08:11:33', '08:11:33am'),
(8, 'Thomas Broñola', 'systemadmin', '::1', 'Created new account', '2022-07-11 08:11:46', '08:11:46am'),
(9, 'Thomas Broñola', 'systemadmin', '::1', 'Updated a user profile', '2022-07-11 08:18:55', '08:18:55am'),
(10, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 19:27:35', '19:27:35pm'),
(11, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 19:27:48', '19:27:48pm'),
(12, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 19:27:58', '19:27:58pm'),
(13, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 19:28:09', '19:28:09pm'),
(14, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 19:28:17', '19:28:17pm'),
(15, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 20:48:00', '20:48:00pm'),
(16, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 20:48:03', '20:48:03pm'),
(17, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 20:48:08', '20:48:08pm'),
(18, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 20:48:12', '20:48:12pm'),
(19, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 20:48:14', '20:48:14pm'),
(20, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 20:48:24', '20:48:24pm'),
(21, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 20:48:27', '20:48:27pm'),
(22, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 20:48:30', '20:48:30pm'),
(23, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:12:31', '21:12:31pm'),
(24, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:12:39', '21:12:39pm'),
(25, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:12:43', '21:12:43pm'),
(26, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:12:46', '21:12:46pm'),
(27, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:12:50', '21:12:50pm'),
(28, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:12:53', '21:12:53pm'),
(29, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:13:04', '21:13:04pm'),
(30, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:13:08', '21:13:08pm'),
(31, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:13:12', '21:13:12pm'),
(32, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:13:18', '21:13:18pm'),
(33, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:13:23', '21:13:23pm'),
(34, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:13:38', '21:13:38pm'),
(35, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 21:13:47', '21:13:47pm'),
(36, 'Thomas Broñola', 'systemadmin', '::1', 'Logged Out', '2022-07-13 21:47:11', '21:47:11pm'),
(37, 'Thomas Broñola', 'systemadmin', '::1', 'Logged In', '2022-07-13 21:59:25', '21:59:25pm'),
(38, 'Thomas Broñola', 'systemadmin', '::1', 'Logged Out', '2022-07-13 21:59:26', '21:59:26pm'),
(39, 'Thomas Broñola', 'systemadmin', '::1', 'Logged In', '2022-07-13 22:01:25', '22:01:25pm'),
(40, 'Thomas Broñola', 'systemadmin', '::1', 'Logged Out', '2022-07-13 22:01:26', '22:01:26pm'),
(41, 'Thomas Broñola', 'systemadmin', '::1', 'Logged In', '2022-07-13 22:01:34', '22:01:34pm'),
(42, 'Thomas Broñola', 'systemadmin', '::1', 'Logged Out', '2022-07-13 22:01:35', '22:01:35pm'),
(43, 'Thomas Broñola', 'systemadmin', '::1', 'Logged In', '2022-07-13 22:02:42', '22:02:42pm'),
(44, 'Thomas Broñola', 'systemadmin', '::1', 'Logged Out', '2022-07-13 22:02:43', '22:02:43pm'),
(45, 'Thomas Broñola', 'systemadmin', '::1', 'Logged In', '2022-07-13 22:04:24', '22:04:24pm'),
(46, 'Thomas Broñola', 'systemadmin', '::1', 'Sent an Announcement', '2022-07-13 22:06:40', '22:06:40pm'),
(47, 'Thomas Broñola', 'systemadmin', '::1', 'Logged Out', '2022-07-13 22:06:43', '22:06:43pm');

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
(1, 'This is a test announcement...\r\n\r\n\r\n\r\n\r\n\r\n\r\n                                            Yes, in this format.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nJust testing the system.\r\n\r\n\r\n\r\n\r\n', '06/30/2022'),
(2, 'test', '07/07/2022'),
(3, 'test', '07/07/2022'),
(4, 'This is a test announcement using a sms Api.\r\n\r\n\r\n\r\n\r\n\r\n\r\n                      This is for the space test.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nParagraph test.', '07/08/2022'),
(5, 'This is a test announcement using a sms Api.\r\n\r\n\r\n\r\n\r\n\r\n\r\n                      This is for the space test.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nParagraph test.', '07/08/2022'),
(6, 'This is an announcement test with a sms api\r\n\r\n\r\n\r\n\r\n\r\n                           Space test\r\n\r\n\r\n\r\n\r\n\r\n\r\nparagraph test', '07/08/2022'),
(7, 'Yes this is an announcement with sms api feature', '07/09/2022'),
(8, 'Yes this is an announcement with sms api feature', '07/09/2022'),
(9, 'Yes this is an announcement with sms api feature', '07/09/2022'),
(10, '1', '07/09/2022'),
(11, '1', '07/09/2022'),
(12, '1', '07/09/2022'),
(13, '1', '07/09/2022'),
(14, '2', '07/09/2022'),
(15, '2', '07/09/2022'),
(16, '2', '07/09/2022'),
(17, '2', '07/09/2022'),
(18, '2', '07/09/2022'),
(19, '2', '07/09/2022'),
(20, '2', '07/09/2022'),
(21, '2', '07/09/2022'),
(22, '2', '07/09/2022'),
(23, '2', '07/09/2022'),
(24, '2', '07/09/2022'),
(25, '2', '07/09/2022'),
(26, '2', '07/09/2022'),
(27, '2', '07/09/2022'),
(28, '2', '07/09/2022'),
(29, '2', '07/09/2022'),
(30, '2', '07/09/2022'),
(31, '2', '07/09/2022'),
(32, '2', '07/09/2022'),
(33, 'yes 123456', '07/09/2022'),
(34, 'amen', '07/09/2022'),
(35, 'another test', '07/09/2022'),
(36, 'yes', '07/09/2022'),
(37, 'yeeeeeees', '07/09/2022'),
(38, 'This is a test announcement!\r\n\r\n\r\n\r\n\r\n\r\nTesting\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nWohooo', '07/13/2022'),
(39, 'This is another test announcement!\r\n\r\n\r\n\r\n\r\n\r\nTesting\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nWohooo', '07/13/2022'),
(40, 'This is another test announcement!\r\n\r\n\r\n\r\n\r\n\r\nTesting 123\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nWohooo', '07/13/2022'),
(41, '456This is another test announcement!\r\n\r\n\r\n\r\n\r\n\r\nTesting\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nWohooo', '07/13/2022'),
(42, 'This is another test announcement! 12345\r\n\r\n\r\n\r\n\r\n\r\nTesting\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nWohooo', '07/13/2022'),
(43, '1', '07/13/2022'),
(44, '2', '07/13/2022'),
(45, 'test', '07/13/2022'),
(46, 'test', '07/13/2022'),
(47, 'test', '07/13/2022'),
(48, 'test for pagination', '07/13/2022'),
(49, 'test for pagination', '07/13/2022'),
(50, 'test for pagination', '07/13/2022'),
(51, 'teesst', '07/13/2022'),
(52, 'teesst', '07/13/2022'),
(53, 'teesst', '07/13/2022'),
(54, 'teesst', '07/13/2022'),
(55, 'teesst', '07/13/2022'),
(56, 'teesst', '07/13/2022'),
(57, 'teesst', '07/13/2022'),
(58, 'teesst', '07/13/2022'),
(59, 'teesst', '07/13/2022'),
(60, 'teesst', '07/13/2022'),
(61, 'teesst', '07/13/2022'),
(62, 'teesst', '07/13/2022'),
(63, 'teesst', '07/13/2022'),
(64, 'ANNOUNCEMENT!\r\n\r\n\r\nThis is a test announcement for the Quality Assurance Testing on July 14, 2022!\r\nThe results of this test will be sent as an announcement.\r\n\r\n\r\n\r\nGod Bless & Best Regards,\r\nThomas Broñola - Head Developer', '07/13/2022');

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
(3, '07/07/2022', 'Thomas', 'Jhon', 'This is test report #3.(with edit)\r\n\r\nAddition of official in-charge in the database.\r\n\r\nThe official in-charge will be the one who is logged in and writing this report.', 'Thomas Broñola'),
(4, '07/07/2022', 'Thomas', 'Agev ed', 'test', 'Thomas Broñola'),
(5, '07/07/2022', 'Thomas', 'Agev ed', 'This is test report #2 (with edit)\r\n\r\n\r\n\r\n\r\n\r\n\r\nHatdog\r\n\r\n\r\n\r\n\r\n\r\nCheesedog\r\n\r\n\r\n\r\n\r\n\r\nFootlong', 'Thomas Broñola');

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
  `user_contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `user_password`, `user_type`, `full_name`, `user_contact`) VALUES
(1, 'bronolathomas@gmail.com', '$2y$10$MTYBqd/.Kwu8EXuGz904SeyAXoePpXfwLRgtPrAAwtGvnkGQnpLwq', 'systemadmin', 'Thomas Broñola', '09475892286'),
(2, 'jhonberniedevega@gmail.com', '$2y$10$TyzVNXv0svWyYjTj0acxROBNmX0OSABFTdjzkJ5Atfuckmzx8o2j2', 'systemadmin', 'Jhon Bernie', '09154273628'),
(3, 'tester@gmail.com', '$2y$10$kyRf5GB6Owsns1Oj2HGOp.ssRR/1lnolKBMI8rzaYWnH5mezxn0la', 'tanod', 'tester', '09111111111'),
(4, 'captain@gmail.com', '$2y$10$VsX52c72vYGMy39y/QlZkuVlTvAOKA1GXPYTV7cyK3Ec70AsA1UaO', 'captain', 'captain', '09222222222'),
(5, 'secretary@gmail.com', '$2y$10$wnL4bl6NxALSxokSWNkRVunPaoF3UAeZ8pgx4nKHTZWDzrx85RRm.', 'secretary', 'secretary', '09333333333'),
(6, 'tanod@gmail.com', '$2y$10$xx24FhQzhi2.7GS2jywdluqIy7/LiShgn9e9cZVfa.7z3WhgeHKLq', 'tanod', 'tanod', '09444444444'),
(7, 'admin@gmail.com', '$2y$10$ybdT9s7zANUpFgY3eIYMLeiYDy03sYq5SIKm.Ia3lajygobCF7JDe', 'admin', 'admin', '09555555555'),
(8, 'systemadmin@gmail.com', '$2y$10$YRle7HuuQmpGi.hod5KeKe3rgYsYPxFSXipFdBLFmhXQsUs5qU4Ve', 'systemadmin', 'systemadmin', '09666666666');

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
  MODIFY `trail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `blotter`
--
ALTER TABLE `blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
