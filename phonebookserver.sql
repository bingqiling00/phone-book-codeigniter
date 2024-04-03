-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 06:15 PM
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
-- Database: `phonebookserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `contact_name` varchar(50) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `deletion_status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `contact_name`, `contact_number`, `image_path`, `date_added`, `deletion_status`) VALUES
(1, 1, 'Testing this change', '123123', 'uploads/blank-profile-pic.png', '2024-04-01 12:36:16', 0),
(2, 1, 'Testing 2 ', '01247862211', 'uploads/blank-profile-pic.png', '2024-04-01 12:37:12', 0),
(3, 1, 'Testing 3', '215781829218', 'uploads/blank-profile-pic.png', '2024-04-01 12:37:18', 0),
(4, 1, 'Testing 4', '8050235735', 'uploads/blank-profile-pic.png', '2024-04-01 12:37:25', 0),
(5, 1, '123testing', '123124214', 'uploads/blank-profile-pic.png', '2024-04-01 12:44:43', 0),
(6, 1, 'test again ', '123123123', 'uploads/blank-profile-pic.png', '2024-04-02 09:00:24', 0),
(7, 2, 'test', '123123', 'uploads/blank-profile-pic.png', '2024-04-02 09:00:46', 0),
(8, 2, 'testing new acc', '123123123', 'uploads/blank-profile-pic.png', '2024-04-02 09:00:54', 0),
(9, 1, 'recent2', '213123123', 'uploads/blank-profile-pic.png', '2024-04-02 14:21:59', 0),
(10, 1, 'recent1', '4124124124', 'uploads/blank-profile-pic.png', '2024-04-03 03:27:42', 0),
(14, 1, 'recent3', '123123', 'uploads/blank-profile-pic.png', '2024-04-03 08:38:48', 0),
(15, 1, 'recnt4', '123123', 'uploads/blank-profile-pic.png', '2024-04-03 08:39:03', 1),
(16, 2, 'new without image', '01234567', 'uploads/blank-profile-pic.png', '2024-04-03 09:08:27', 0),
(17, 2, 'test again ', '123456', 'uploads/blank-profile-pic.png', '2024-04-03 15:57:55', 0),
(18, 2, 'test with image', '12344567', 'uploads/95b084008f088f09eb057f0a2002100a.jpg', '2024-04-03 15:58:03', 0),
(19, 2, 'tobemodify - ed', '123123', 'uploads/8191ee0a32ff92279d7e5d611d3ad251.png', '2024-04-03 15:58:24', 0),
(20, 5, 'test no image 1', '123123', 'uploads/blank-profile-pic.png', '2024-04-03 16:00:09', 0),
(21, 5, 'test no image 2', '123123', 'uploads/blank-profile-pic.png', '2024-04-03 16:00:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'username1', '123', 'user@gmail.com'),
(2, 'username2', '123', 'user2@email.com'),
(3, 'yi', '123', '123@gmail.com'),
(4, 'username1123123', '123', '123@gmail.com'),
(5, 'username test register', '123', '123@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
