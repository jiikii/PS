-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 09:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menhealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `apptid` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `dateappt` text NOT NULL,
  `timeappt` text NOT NULL,
  `reason` text NOT NULL,
  `councilor` varchar(125) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Pending\r\n2 = Approved\r\n3 = Decline\r\n5 = Cancel',
  `type` varchar(125) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apptid`, `patient_id`, `name`, `dateappt`, `timeappt`, `reason`, `councilor`, `status`, `type`, `created`, `updated`) VALUES
(1, 3, 'humer godinez', '2023-12-07', '21:27', '123123', 'Shirop', 5, 'F2F', '2023-12-07 13:24:35', '2023-12-07 13:24:35'),
(2, 3, 'George alfeser', '2001-02-11', '10:57', 'Natuk an ko doc', 'divine', 5, 'F2F', '2023-12-20 13:42:21', '2023-12-20 13:42:21'),
(3, 3, '12312', '2023-11-30', '22:18', 'Hello nawala na doc', '', 5, 'F2F', '2023-12-20 14:15:20', '2023-12-20 14:15:20'),
(4, 3, 'JK', '2023-12-21', '23:24', 'Helle world', 'jd', 5, 'F2F', '2023-12-20 15:21:10', '2023-12-20 15:21:10'),
(5, 4, 'kaun', '2023-12-22', '23:52', '12312123', '2', 1, 'Meet', '2023-12-20 15:47:17', '2023-12-20 15:47:17'),
(6, 4, 'shiro', '2023-12-22', '22:40', 'Nisakit akong tiyan', '', 1, 'F2F', '2023-12-21 14:37:25', '2023-12-21 14:37:25'),
(7, 4, 'Hello world', '2023-12-22', '22:44', 'HELLO', 'juvelyn1124', 5, 'Meet', '2023-12-21 14:41:41', '2023-12-21 14:41:41'),
(8, 8, 'axel', '2023-12-21', '22:52', 'oooooo', 'shiro', 1, 'F2F', '2023-12-21 14:53:06', '2023-12-21 14:53:06'),
(9, 8, 'jk', '2023-12-21', '01:57', 'aaaaaaaa', 'juvelyn1124', 1, 'Meet', '2023-12-21 14:57:58', '2023-12-21 14:57:58'),
(10, 8, 'bb', '2023-12-21', '15:58', '12323131', 'shiro', 1, 'Meet', '2023-12-21 14:58:30', '2023-12-21 14:58:30'),
(11, 8, '323131', '2023-12-21', '15:58', '131', 'juvelyn1124', 1, 'F2F', '2023-12-21 14:58:54', '2023-12-21 14:58:54'),
(12, 10, 'Shiro', '2023-12-23', '21:52', 'Nayabag ', 'cccc', 2, 'Meet', '2023-12-22 01:52:13', '2023-12-22 01:52:13'),
(13, 12, '123', '2023-12-21', '04:15', '123', 'cccc', 1, 'Meet', '2023-12-22 20:11:22', '2023-12-22 20:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chatId` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `message` text NOT NULL,
  `datesend` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contractid` int(11) NOT NULL,
  `apptid` int(11) NOT NULL,
  `councilorid` int(11) NOT NULL,
  `datefinish` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentalinfo`
--

CREATE TABLE `mentalinfo` (
  `mentid` int(11) NOT NULL,
  `img` text NOT NULL,
  `descript` text NOT NULL,
  `treatment` text NOT NULL DEFAULT '\'1\'',
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentalinfo`
--

INSERT INTO `mentalinfo` (`mentid`, `img`, `descript`, `treatment`, `datecreated`, `updated`) VALUES
(6, 'couple bed.jpg', 'Hello world', '\'1\'', '2023-12-21 14:23:55', '2023-12-21 14:23:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `profile` text NOT NULL DEFAULT 'doc.jpg',
  `firstname` varchar(125) NOT NULL,
  `lastname` varchar(125) NOT NULL,
  `location` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `phoneNumber` int(12) NOT NULL,
  `password` varchar(125) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `islogged` int(11) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `profile`, `firstname`, `lastname`, `location`, `username`, `email`, `phoneNumber`, `password`, `role`, `status`, `islogged`, `created`, `updated`) VALUES
(1, 'doc.jpg', 'jk', 'jk', 'lapulapu', 'asd', 'user@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 1, 1, 1, '2023-12-07 10:02:06', '2023-12-07 10:02:06'),
(10, 'doc.jpg', 'jk', 'jk', '', 'aaaa', 'aaa@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 2, 1, 1, '2023-12-21 15:22:21', '2023-12-21 15:22:21'),
(11, 'doc.jpg', 'kjk', 'jkl', '', 'cccc', 'ccc@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 3, 1, 1, '2023-12-21 15:26:13', '2023-12-21 15:26:13'),
(12, 'doc.jpg', 'asd', 'asd', '', 'pppp', 'pppp@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 2, 1, 1, '2023-12-21 15:31:49', '2023-12-21 15:31:49'),
(13, 'doc.jpg', 'asd', 'asd', '', '123@123.com', '111@111.com', 0, '202cb962ac59075b964b07152d234b70', 3, 1, 1, '2023-12-21 16:07:30', '2023-12-21 16:07:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apptid`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contractid`);

--
-- Indexes for table `mentalinfo`
--
ALTER TABLE `mentalinfo`
  ADD PRIMARY KEY (`mentid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `apptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contractid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentalinfo`
--
ALTER TABLE `mentalinfo`
  MODIFY `mentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
