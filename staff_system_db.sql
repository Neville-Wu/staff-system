-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 04:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staff_system_db`
--
CREATE DATABASE IF NOT EXISTS `staff_system_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `staff_system_db`;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `message`, `status`, `datetime`) VALUES
(1, 1, 'Your work hours have been changed to 20.', 'read', '2021-05-22 23:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `name`, `start_time`, `end_time`, `location`) VALUES
(2, 'test', '2021-05-04 01:00:00', '2021-05-04 05:00:00', '2'),
(4, 'test', '2021-05-04 06:00:00', '2021-05-04 08:00:00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `time_status`
--

CREATE TABLE `time_status` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_status`
--

INSERT INTO `time_status` (`id`, `user_id`, `start_time`, `end_time`, `description`) VALUES
(1, 1, '2021-05-04 00:00:00', '2021-05-04 03:00:00', ''),
(2, 2, '2021-05-04 12:00:00', '2021-05-04 13:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `preferred_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `home_address` varchar(200) NOT NULL,
  `work_hours` float NOT NULL,
  `role` enum('manager','staff') NOT NULL,
  `mode` enum('activated','deactivated') NOT NULL DEFAULT 'activated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `full_name`, `preferred_name`, `phone`, `home_address`, `work_hours`, `role`, `mode`) VALUES
(1, 'test1@example.com', '5a105e8b9d40e1329780d62ea2265d8a', 'Test1', '', '', '', 20, 'staff', 'activated'),
(2, 'test2@example.com', 'ad0234829205b9033196ba818f7a872b', 'Test2', '', '', '', 10, 'staff', 'activated'),
(3, 'admin1@example.com', 'e00cf25ad42683b3df678c61f42c6bda', 'Admin1', 'aaaa', '123132123', 'iseflisdfvargaerg', 10, 'manager', 'activated'),
(4, 'admin2@example.com', 'c84258e9c39059a89ab77d846ddab909', 'Admin2', '', '', '', 10, 'manager', 'activated'),
(5, 'test3@example.com', '8ad8757baa8564dc136c1e07507f4a98', 'Test3', '', '', '', 10, 'staff', 'activated');

-- --------------------------------------------------------

--
-- Table structure for table `user_schedule`
--

CREATE TABLE `user_schedule` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` enum('In Processing','Accepted','Rejected') NOT NULL DEFAULT 'In Processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_schedule`
--

INSERT INTO `user_schedule` (`id`, `user_id`, `schedule_id`, `status`) VALUES
(1, 1, 2, 'Accepted'),
(2, 5, 2, 'In Processing'),
(4, 2, 4, 'In Processing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_status`
--
ALTER TABLE `time_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_schedule`
--
ALTER TABLE `user_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `time_status`
--
ALTER TABLE `time_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_schedule`
--
ALTER TABLE `user_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `time_status`
--
ALTER TABLE `time_status`
  ADD CONSTRAINT `time_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_schedule`
--
ALTER TABLE `user_schedule`
  ADD CONSTRAINT `user_schedule_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`),
  ADD CONSTRAINT `user_schedule_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
