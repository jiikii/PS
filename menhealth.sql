-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 09:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: menhealth
--

-- --------------------------------------------------------

--
-- Table structure for table appointment
--

CREATE TABLE appointment (
  apptid int(11) NOT NULL,
  patient_id int(11) NOT NULL,
  name varchar(125) NOT NULL,
  dateappt text NOT NULL,
  timeappt text NOT NULL,
  reason text NOT NULL,
  councilor varchar(125) NOT NULL,
  status int(11) NOT NULL DEFAULT 1 COMMENT '1 = Pending\r\n2 = Approved\r\n3 = Decline\r\n5 = Cancel',
  type varchar(125) NOT NULL,
  created timestamp NOT NULL DEFAULT current_timestamp(),
  updated timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table appointment
--

INSERT INTO appointment (apptid, patient_id, name, dateappt, timeappt, reason, councilor, status, type, created, updated) VALUES
(1, 3, 'humer godinez', '2023-12-07', '21:27', '123123', 'Shirop', 5, 'F2F', '2023-12-07 13:24:35', '2023-12-07 13:24:35'),
(2, 3, 'George alfeser', '2001-02-11', '10:57', 'Natuk an ko doc', 'divine', 5, 'F2F', '2023-12-20 13:42:21', '2023-12-20 13:42:21'),
(3, 3, '12312', '2023-11-30', '22:18', 'Hello nawala na doc', 'asd', 5, 'F2F', '2023-12-20 14:15:20', '2023-12-20 14:15:20'),
(4, 3, 'JK', '2023-12-21', '23:24', 'Helle world', 'councilor1@gmail.com', 3, 'F2F', '2023-12-20 15:21:10', '2023-12-20 15:21:10'),
(5, 4, 'kaun', '2023-12-22', '23:52', '12312123', '2', 5, 'Meet', '2023-12-20 15:47:17', '2023-12-20 15:47:17'),
(6, 9, 'shi', '2023-12-23', '12:14', 'hqweqwe', 'councilor6', 2, 'F2F', '2023-12-22 20:10:27', '2023-12-22 20:10:27');

-- --------------------------------------------------------

--
-- Table structure for table chats
--

CREATE TABLE chats (
  chatId int(11) NOT NULL,
  sender int(11) NOT NULL,
  reciever int(11) NOT NULL,
  message text NOT NULL,
  created timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table chats
--

INSERT INTO chats (chatId, sender, reciever, message, created) VALUES
(0, 4, 3, 'hi', '2023-12-22 20:39:15'),
(0, 4, 3, 'ywa ka\r\n', '2023-12-22 20:12:53'),
(0, 3, 4, 'pak u\r\n', '2023-12-22 20:14:04'),
(0, 10, 9, 'yo', '2023-12-22 20:25:09'),
(0, 9, 6, 'qwe', '2023-12-22 20:26:17'),
(0, 9, 10, 'Yo', '2023-12-22 20:26:25');

-- --------------------------------------------------------

--
-- Table structure for table contract
--

CREATE TABLE contract (
  contractid int(11) NOT NULL,
  apptid int(11) NOT NULL,
  councilorid int(11) NOT NULL,
  datefinish timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table mentalinfo
--

CREATE TABLE mentalinfo (
  mentid int(11) NOT NULL,
  img text NOT NULL,
  descript text NOT NULL,
  treatment text NOT NULL DEFAULT '\'1\'',
  datecreated timestamp NOT NULL DEFAULT current_timestamp(),
  updated timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table mentalinfo
--

INSERT INTO mentalinfo (mentid, img, descript, treatment, datecreated, updated) VALUES
(7, 'download.jpg', 'Anxiety Disorders - Characterized by excessive worry, fear, or apprehension. Includes disorders such as Generalized Anxiety Disorder (GAD), Panic Disorder, and Phobias.', 'Cognitive-Behavioral Therapy (CBT), medication (antidepressants, benzodiazepines), exposure therapy.', '2023-12-22 20:24:20', '2023-12-22 20:24:20'),
(8, 'download.png', 'Mood Disorders - Affect a person\'s emotional state. Includes Major Depressive Disorder and Bipolar Disorder.', 'Psychotherapy (especially CBT), antidepressant medications, mood stabilizers.', '2023-12-22 20:25:00', '2023-12-22 20:25:00'),
(9, 'Sexual-Disorder.jpg', 'Sexual Disorders - Concerns related to sexual function, desire, or behavior.', 'Psychotherapy, behavioral therapy, medication in some cases.', '2023-12-22 20:25:41', '2023-12-22 20:25:41'),
(10, 'FoodAnxiety-1024x819.jpg', 'food anxiety ', 'eat healthy and nutritious foods', '2023-12-22 20:33:40', '2023-12-22 20:33:40');

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE todos (
  todo_id int(11) NOT NULL,
  patient_id int(11) NOT NULL,
  councilor_id int(11) NOT NULL,
  status varchar(125) NOT NULL,
  description varchar(125) NOT NULL,
  created timestamp NOT NULL DEFAULT current_timestamp(),
  updated timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE user (
  user_id int(11) NOT NULL,
  profile text NOT NULL DEFAULT 'doc.jpg',
  firstname varchar(125) NOT NULL,
  lastname varchar(125) NOT NULL,
  location varchar(125) NOT NULL,
  username varchar(125) NOT NULL,
  email varchar(125) NOT NULL,
  phoneNumber int(12) NOT NULL,
  password varchar(125) NOT NULL,
  role int(11) NOT NULL,
  status int(11) NOT NULL DEFAULT 1,
  islogged int(11) NOT NULL DEFAULT 1,
  created timestamp NOT NULL DEFAULT current_timestamp(),
  updated timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table user
--

INSERT INTO user (user_id, profile, firstname, lastname, location, username, email, phoneNumber, password, role, status, islogged, created, updated) VALUES
(1, 'doc.jpg', 'jk', 'jk', 'lapulapu', 'asd', 'user@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 1, 1, 1, '2023-12-07 10:02:06', '2023-12-07 10:02:06'),
(3, 'doc.jpg', 'jk', 'jk', 'lapulapu', 'test1', 'test@123', 0, '202cb962ac59075b964b07152d234b70', 2, 0, 1, '2023-12-07 10:14:46', '2023-12-07 10:14:46'),
(4, 'doc.jpg', '', 'kl', '', 'councilor1@gmail.com', 'councilor1@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 3, 1, 1, '2023-12-20 15:28:02', '2023-12-20 15:28:02'),
(5, 'doc.jpg', '', '', '', 'patient4', 'patient4@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 2, 1, 1, '2023-12-22 20:08:38', '2023-12-22 20:08:38'),
(6, 'doc.jpg', '', '', '', 'councilor4', 'councilor4@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 3, 1, 1, '2023-12-22 20:11:14', '2023-12-22 20:11:14'),
(8, 'doc.jpg', '', '', '', 'patient6', 'patient6@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 2, 1, 1, '2023-12-22 20:28:22', '2023-12-22 20:28:22'),
(9, 'doc.jpg', '', '', '', 'patient6', 'patient6@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 2, 1, 1, '2023-12-22 20:28:22', '2023-12-22 20:28:22'),
(10, 'doc.jpg', '', '', '', 'councilor6', 'councilor6@gmail.com', 0, '202cb962ac59075b964b07152d234b70', 3, 1, 1, '2023-12-22 20:30:53', '2023-12-22 20:30:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table appointment
--
ALTER TABLE appointment
  ADD PRIMARY KEY (apptid);

--
-- Indexes for table contract
--
ALTER TABLE contract
  ADD PRIMARY KEY (contractid);

--
-- Indexes for table mentalinfo
--
ALTER TABLE mentalinfo
  ADD PRIMARY KEY (mentid);

--
-- Indexes for table user
--
ALTER TABLE user
  ADD PRIMARY KEY (user_id);

ALTER TABLE todos
  ADD PRIMARY KEY (todo_id);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table appointment
--
ALTER TABLE appointment
  MODIFY apptid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table contract
--
ALTER TABLE contract
  MODIFY contractid int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table mentalinfo
--
ALTER TABLE mentalinfo
  MODIFY mentid int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table user
--
ALTER TABLE user
  MODIFY user_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;