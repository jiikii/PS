-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 05:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apptid`, `patient_id`, `name`, `dateappt`, `timeappt`, `reason`, `councilor`, `status`, `type`, `created`, `updated`) VALUES
(1, 3, 'humer godinez', '2023-12-07', '21:27', '123123', 'Shirop', 5, 'F2F', '2023-12-07 13:24:35', '2023-12-07 13:24:35'),
(2, 3, 'George alfeser', '2001-02-11', '10:57', 'Natuk an ko doc', 'divine', 1, 'F2F', '2023-12-20 13:42:21', '2023-12-20 13:42:21'),
(3, 3, '12312', '2023-11-30', '22:18', 'Hello nawala na doc', '', 1, 'F2F', '2023-12-20 14:15:20', '2023-12-20 14:15:20'),
(4, 3, 'JK', '2023-12-21', '23:24', 'Helle world', 'jd', 1, 'F2F', '2023-12-20 15:21:10', '2023-12-20 15:21:10'),
(5, 4, 'kaun', '2023-12-22', '23:52', '12312123', '2', 1, 'Meet', '2023-12-20 15:47:17', '2023-12-20 15:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentalinfo`
--

INSERT INTO `mentalinfo` (`mentid`, `img`, `descript`, `treatment`, `datecreated`, `updated`) VALUES
(2, 'Screenshot 2023-06-28 224102.png', '1231231', 'Hello', '2023-12-07 13:50:33', '2023-12-07 13:50:33'),
(5, 'Screenshot 2023-06-28 224102.png', '12312312', 'World', '2023-12-07 13:56:55', '2023-12-07 13:56:55');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `profile`, `firstname`, `lastname`, `location`, `username`, `email`, `phoneNumber`, `password`, `role`, `status`, `islogged`, `created`, `updated`) VALUES
(1, 'doc.jpg', 'jk', 'jk', 'lapulapu', 'asd', 'user@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 1, 1, 1, '2023-12-07 10:02:06', '2023-12-07 10:02:06'),
(3, 'doc.jpg', 'jk', 'jk', 'lapulapu', 'test1', 'test@123', 0, '202cb962ac59075b964b07152d234b70', 2, 0, 1, '2023-12-07 10:14:46', '2023-12-07 10:14:46'),
(4, 'doc.jpg', '', 'kl', '', 'councilor1@gmail.com', 'councilor1@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 3, 1, 1, '2023-12-20 15:28:02', '2023-12-20 15:28:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`apptid`);

--
-- Indexes for table `chat`
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
  MODIFY `apptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat`
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
  MODIFY `mentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
