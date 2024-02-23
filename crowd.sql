-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 06:33 AM
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
-- Database: `crowd`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `campaign_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `campaign_title` varchar(150) NOT NULL,
  `categories` varchar(100) NOT NULL,
  `campaign_goal` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `campaign_deadline` date NOT NULL,
  `campaign_description` text NOT NULL,
  `gcashPicture` text NOT NULL,
  `validId` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 pending, 1 accepted, 2 declined, 3 mark as done',
  `proofUrl` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaign_id`, `fk_user_id`, `campaign_title`, `categories`, `campaign_goal`, `location`, `campaign_deadline`, `campaign_description`, `gcashPicture`, `validId`, `image`, `status`, `proofUrl`, `date_created`) VALUES
(1, 1, 'For my lolo22', 'Animals', 123, 'Poblacion Cebu', '2024-02-24', '123', 'download.jpg', 'download.jpg', 'download.jpg', 1, 'http://localhost/phpmyadmin/index.php?route=/table/sql&db=crowd&table=campaigns', '2023-09-18 07:06:00'),
(2, 3, 'grandfather', 'Charity', 123, 'Poblacion Cebu', '2024-02-24', '123', 'download.jpg', 'download.jpg', 'download.jpg', 1, '', '2023-09-19 08:37:28'),
(4, 1, 'grandmother', 'Community', 800, 'Poblacion Cebu', '2024-02-24', 'this aksdbkuasgduasod ', 'download.jpg', 'download.jpg', 'download.jpg', 1, 'https://stackoverflow.com/questions/1696877/how-to-set-a-value-to-a-file-input-in-html', '2023-09-19 09:59:15'),
(5, 1, '123', 'Community', 1231, 'Poblacion Cebu', '2024-02-24', '123123123', 'download.jpg', 'download.jpg', 'download.jpg', 1, '', '2023-09-19 11:25:23'),
(6, 3, 'This is divine', 'Community', 1231, 'Poblacion Cebu', '2024-02-24', 'This is just a sample.', '202046681_816228792419960_3682859026356860159_n.jpg', '202046681_816228792419960_3682859026356860159_n.jpg', '202046681_816228792419960_3682859026356860159_n.jpg', 1, '', '2023-09-21 11:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_campaign_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `fk_user_id`, `fk_campaign_id`, `comment`, `date_created`) VALUES
(1, 1, 1, '123', '2023-09-19 06:23:29'),
(2, 1, 1, 'uio', '2023-09-19 06:34:17'),
(3, 1, 4, '123', '2023-09-24 02:55:48'),
(4, 1, 6, '.', '2023-09-24 03:17:21'),
(5, 1, 6, '123', '2023-10-21 11:59:53'),
(6, 1, 6, '123', '2023-10-21 11:59:57'),
(7, 1, 6, '123', '2023-10-21 12:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(155) NOT NULL,
  `message` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_campaign_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `receipt` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `fk_user_id`, `fk_campaign_id`, `amount`, `receipt`, `date_created`) VALUES
(16, 1, 6, 100, 'logo24 (1).png', '2024-02-23 03:08:40'),
(21, 3, 6, 123, 'mbr-1920x1285-800x535.jpg', '2024-02-23 04:10:42'),
(28, 1, 1, 123, 'mbr-1920x1280-800x533.jpg', '2024-02-23 05:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `proofdonation`
--

CREATE TABLE `proofdonation` (
  `pd_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `camp_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `receipt` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proofdonation`
--

INSERT INTO `proofdonation` (`pd_id`, `user_id`, `camp_id`, `amount`, `receipt`, `created_at`, `updated_at`) VALUES
(3, 3, 5, 31, 'mbr-1920x1276-800x528.jpeg', '2024-02-23 05:11:32', '2024-02-23 05:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `plain_pw` varchar(150) NOT NULL,
  `country` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  `is_logged` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - logged in',
  `user_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 regular user, 2 admin',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `plain_pw`, `country`, `image`, `is_logged`, `user_type`, `date_created`) VALUES
(1, 'George Alfeser Inoc', '123@1', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Philippines', 'download.jpg', 1, 1, '2023-09-19 06:19:06'),
(2, 'George Alfeser Inoc', '123@123', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Philippines', 'download.jpg', 1, 2, '2023-09-19 06:19:06'),
(3, 'Divine', '111@11', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Philippines', 'download.jpg', 1, 1, '2023-09-19 08:35:33'),
(4, '123123123', '123@123123', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '123123', 'concern.png', 1, 1, '2024-02-06 07:36:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`campaign_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `proofdonation`
--
ALTER TABLE `proofdonation`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `proofdonation`
--
ALTER TABLE `proofdonation`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
