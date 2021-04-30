-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 04:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_lag`
--

CREATE TABLE `activity_lag` (
  `Username` varchar(200) NOT NULL,
  `Activity` varchar(200) NOT NULL,
  `Time` varchar(200) NOT NULL,
  `Date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_lag`
--

INSERT INTO `activity_lag` (`Username`, `Activity`, `Time`, `Date`) VALUES
('kurt', 'LOGIN', '01:30:25', '2021-04-26'),
('kurt', 'LOGOUT', '01:30:33', '2021-04-26'),
('kate', 'LOGIN', '01:30:51', '2021-04-26'),
('kurt', 'LOGOUT', '01:30:58', '2021-04-26'),
('kate', 'LOGIN', '01:31:38', '2021-04-26'),
('kurt', 'LOGOUT', '01:31:48', '2021-04-26'),
('kurt', 'LOGIN', '01:33:41', '2021-04-26'),
('kurt', 'PASSWORD CHANGED', '01:36:25', '2021-04-26'),
('kurt', 'LOGOUT', '01:37:39', '2021-04-26'),
('kurt', 'LOGIN', '01:37:52', '2021-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `code` varchar(12) NOT NULL,
  `created_at` datetime NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `user_id`, `code`, `created_at`, `expiration`) VALUES
(1, 'kurt', '793723', '2021-03-25 21:17:45', '2021-03-25 21:22:45'),
(13, 'kate', '834190', '2021-03-26 01:53:16', '2021-03-26 01:58:16'),
(14, 'kurt', '405596', '2021-03-26 01:55:40', '2021-03-26 02:00:40'),
(15, 'kaye', '434683', '2021-04-23 15:03:39', '2021-04-23 16:08:39'),
(16, 'kaye', '929026', '2021-04-23 15:08:39', '2021-04-23 16:13:39'),
(17, 'kaye', '931952', '2021-04-23 15:09:06', '2021-04-23 16:14:06'),
(18, 'kaye', '904730', '2021-04-23 15:41:17', '2021-04-23 16:46:17'),
(19, 'kaye', '354477', '2021-04-23 16:37:35', '2021-04-23 17:42:35'),
(20, 'kaye', '984420', '2021-04-23 16:41:44', '2021-04-23 17:46:44'),
(21, 'kaye', '891706', '2021-04-23 16:42:10', '2021-04-23 17:47:10'),
(22, 'kaye', '313326', '2021-04-23 16:47:42', '2021-04-23 17:52:42'),
(23, 'kaye', '161574', '2021-04-23 17:08:43', '2021-04-24 00:13:43'),
(24, 'kaye', '549767', '2021-04-23 17:14:13', '2021-04-24 00:19:13'),
(25, 'kaye', '234283', '2021-04-23 17:29:03', '2021-04-24 00:34:03'),
(26, 'kaye', '369138', '2021-04-23 17:33:07', '2021-04-23 18:38:07'),
(27, 'kaye', '520790', '2021-04-23 17:34:21', '2021-04-23 18:39:21'),
(28, 'kaye', '500390', '2021-04-23 17:35:06', '2021-04-24 00:40:06'),
(29, 'kaye', '642128', '2021-04-23 17:39:22', '2021-04-24 00:44:22'),
(30, 'kaye', '662157', '2021-04-23 17:43:45', '2021-04-24 00:48:45'),
(31, 'kaye', '748434', '2021-04-23 17:49:45', '2021-04-24 00:54:45'),
(32, 'kaye', '315873', '2021-04-23 17:57:39', '2021-04-24 01:02:39'),
(33, 'kaye', '931636', '2021-04-23 18:12:29', '2021-04-24 01:17:29'),
(34, 'kaye', '582267', '2021-04-23 18:16:10', '2021-04-24 01:21:10'),
(35, 'kaye', '826166', '2021-04-24 22:48:05', '2021-04-25 05:53:05'),
(36, 'kurt', '792275', '2021-04-25 00:28:34', '2021-04-25 07:33:34'),
(37, 'kurt', '968046', '2021-04-25 00:29:01', '2021-04-25 07:34:01'),
(38, 'kurt', '501811', '2021-04-25 00:33:18', '2021-04-25 07:38:18'),
(39, 'kate', '492297', '2021-04-25 01:53:31', '2021-04-25 08:58:31'),
(40, 'kurt', '290986', '2021-04-25 02:25:11', '2021-04-25 09:30:11'),
(41, 'kurt', '906631', '2021-04-25 02:27:27', '2021-04-25 09:32:27'),
(42, 'kurt', '191945', '2021-04-25 15:54:56', '2021-04-25 22:59:56'),
(43, 'kurt', '929711', '2021-04-25 16:54:37', '2021-04-25 23:59:37'),
(44, 'kurt', '536447', '2021-04-25 17:13:41', '2021-04-26 00:18:41'),
(45, 'kurt', '464061', '2021-04-25 17:45:35', '2021-04-26 00:50:35'),
(46, 'kurt', '306490', '2021-04-25 17:50:49', '2021-04-26 00:55:49'),
(47, 'kurt', '128434', '2021-04-25 18:04:49', '2021-04-26 01:09:49'),
(48, 'kurt', '307941', '2021-04-25 18:05:18', '2021-04-26 01:10:18'),
(49, 'kurt', '773744', '2021-04-25 18:35:59', '2021-04-26 01:40:59'),
(50, 'kurt', '378081', '2021-04-25 19:02:02', '2021-04-26 02:07:02'),
(51, 'kurt', '308728', '2021-04-25 19:29:29', '2021-04-26 02:34:29'),
(52, 'kurt', '481764', '2021-04-26 00:55:17', '2021-04-26 08:00:17'),
(53, 'kate', '154988', '2021-04-26 00:55:35', '2021-04-26 08:00:35'),
(54, 'kate', '967765', '2021-04-26 00:56:12', '2021-04-26 08:01:12'),
(55, 'kurt', '808829', '2021-04-26 00:57:06', '2021-04-26 08:02:06'),
(56, 'kurt', '996416', '2021-04-26 01:03:38', '2021-04-26 08:08:38'),
(57, 'kurt', '963604', '2021-04-26 01:08:45', '2021-04-26 08:13:45'),
(58, 'kurt', '550051', '2021-04-26 01:12:42', '2021-04-26 08:17:42'),
(59, 'kate', '752071', '2021-04-26 01:13:04', '2021-04-26 08:18:04'),
(60, 'kurt', '519175', '2021-04-26 01:13:32', '2021-04-26 08:18:32'),
(61, 'kurt', '381768', '2021-04-26 01:14:37', '2021-04-26 08:19:37'),
(62, 'kate', '366024', '2021-04-26 01:18:00', '2021-04-26 08:23:00'),
(63, 'kate', '531095', '2021-04-26 01:19:32', '2021-04-26 08:24:32'),
(64, 'kurt', '796702', '2021-04-26 01:20:33', '2021-04-26 08:25:33'),
(65, 'kate', '264019', '2021-04-26 01:20:57', '2021-04-26 08:25:57'),
(66, 'kurt', '205604', '2021-04-26 01:24:22', '2021-04-26 08:29:22'),
(67, 'kurt', '409640', '2021-04-26 01:30:25', '2021-04-26 08:35:25'),
(68, 'kate', '598504', '2021-04-26 01:30:51', '2021-04-26 08:35:51'),
(69, 'kate', '503674', '2021-04-26 01:31:38', '2021-04-26 08:36:38'),
(70, 'kurt', '982558', '2021-04-26 01:33:41', '2021-04-26 08:38:41'),
(71, 'kurt', '376720', '2021-04-26 01:37:52', '2021-04-26 08:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Ayala Land'),
(2, 'Megaworld Corporation'),
(3, 'SM Prime Holdings'),
(4, 'Filinvest Land'),
(5, 'Federal Land');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'Apartments'),
(2, 'Condos'),
(3, 'Townhouses'),
(4, 'Co-op');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(10, 'kurt', 'kurtrhonrodriguez@yahoo.com.ph', 'Kurt123!@#'),
(11, 'kate', 'kate@gmail.com', 'Kate123!@#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
