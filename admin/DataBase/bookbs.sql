-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 01:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookblogs`
--

CREATE TABLE `bookblogs` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `scid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `writerid` int(11) NOT NULL,
  `booktitle` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookdesc` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pubname` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp` float(8,2) NOT NULL,
  `price` float(8,2) NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divid` int(11) NOT NULL,
  `disid` int(11) NOT NULL,
  `images` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold` set('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` set('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` set('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `uid`, `cid`, `scid`, `lid`, `writerid`, `booktitle`, `bookdesc`, `pubname`, `mrp`, `price`, `phone`, `divid`, `disid`, `images`, `sold`, `privacy`, `status`, `created`, `updated`, `deleted`) VALUES
(2, 1, 1, 4, 1, 1, 'Today\'s World Wide Web', 'Today\'s World Wide Web is a dynamic environment, and its users set a high bar for both style and function of\r\nsites. To build interesting, interactive sites, developers are turning to JavaScript libraries such as jQuery to\r\nautomate common tasks and simplify complicated ones. One reason the jQuery library is a popular choice is\r\nits ability to assist in a wide range of tasks. ', 'Imam Prokashoni', 800.00, 300.00, '01755896365', 1, 3, 'panda.jpg', '1', '1', '1', '2021-02-24 00:18:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `created`, `updated`, `deleted`) VALUES
(1, 'JSC', '2021-02-22 16:54:34', NULL, NULL),
(2, 'SSC', '2021-02-22 16:54:51', NULL, NULL),
(3, 'HSC', '2021-02-22 16:55:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `divid` int(11) NOT NULL,
  `disname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `divid`, `disname`, `created`, `updated`, `deleted`) VALUES
(1, 1, 'Barisal', '2021-02-23 00:50:25', NULL, NULL),
(2, 1, 'Barguna', '2021-02-23 00:52:07', NULL, NULL),
(3, 1, 'Bhola', '2021-02-23 00:52:07', NULL, NULL),
(4, 1, 'Jhalokati', '2021-02-23 00:52:07', NULL, NULL),
(5, 1, 'Patuakhali', '2021-02-23 00:52:07', NULL, NULL),
(6, 1, 'Pirojpur', '2021-02-23 00:52:07', NULL, NULL),
(7, 1, 'Barisal', '2021-02-23 00:52:07', NULL, NULL),
(8, 2, 'Bandarban', '2021-02-23 00:52:47', NULL, NULL),
(9, 2, 'Brahmanbaria', '2021-02-23 00:54:37', NULL, NULL),
(10, 2, 'Chandpur', '2021-02-23 00:54:37', NULL, NULL),
(11, 2, 'Chittagong', '2021-02-23 00:54:37', NULL, NULL),
(12, 2, 'Comilla', '2021-02-23 00:54:37', NULL, NULL),
(13, 2, 'Coxs Bazar', '2021-02-23 00:54:37', NULL, NULL),
(14, 2, 'Feni', '2021-02-23 00:54:37', NULL, NULL),
(15, 2, 'Khagrachari', '2021-02-23 00:54:37', NULL, NULL),
(16, 2, 'Lakshmipur', '2021-02-23 00:54:37', NULL, NULL),
(17, 2, 'Noakhali', '2021-02-23 00:54:37', NULL, NULL),
(18, 2, 'Rangamati', '2021-02-23 00:54:37', NULL, NULL),
(31, 3, 'Dhaka', '2021-02-23 00:58:58', NULL, NULL),
(32, 3, 'Faridpur', '2021-02-23 00:58:58', NULL, NULL),
(33, 3, 'Gazipur', '2021-02-23 00:58:58', NULL, NULL),
(34, 3, 'Gopalganj', '2021-02-23 00:58:58', NULL, NULL),
(35, 3, 'Kishoreganj', '2021-02-23 00:58:58', NULL, NULL),
(36, 3, 'Madaripur', '2021-02-23 00:58:58', NULL, NULL),
(37, 3, 'Manikganj', '2021-02-23 00:58:58', NULL, NULL),
(38, 3, 'Munshiganj', '2021-02-23 00:58:58', NULL, NULL),
(39, 3, 'Narayanganj', '2021-02-23 00:58:59', NULL, NULL),
(40, 3, 'Narsingdi', '2021-02-23 00:58:59', NULL, NULL),
(41, 3, 'Rajbari', '2021-02-23 00:58:59', NULL, NULL),
(42, 3, 'Shariatpur', '2021-02-23 00:58:59', NULL, NULL),
(43, 3, 'Tangail', '2021-02-23 00:58:59', NULL, NULL),
(44, 4, 'Mymensingh', '2021-02-23 01:00:43', NULL, NULL),
(45, 4, 'Jamalpur', '2021-02-23 01:00:43', NULL, NULL),
(46, 4, 'Sherpur', '2021-02-23 01:00:44', NULL, NULL),
(47, 4, 'Netrokona', '2021-02-23 01:00:44', NULL, NULL),
(48, 5, 'Bagerhat', '2021-02-23 01:02:23', NULL, NULL),
(49, 5, 'Chuadanga', '2021-02-23 01:02:23', NULL, NULL),
(50, 5, 'Jessore', '2021-02-23 01:02:23', NULL, NULL),
(51, 5, 'Jhenaidah', '2021-02-23 01:02:23', NULL, NULL),
(52, 5, 'Khulna', '2021-02-23 01:02:23', NULL, NULL),
(53, 5, 'Kushtia', '2021-02-23 01:02:23', NULL, NULL),
(54, 5, 'Magura', '2021-02-23 01:02:23', NULL, NULL),
(55, 5, 'Meherpur', '2021-02-23 01:02:23', NULL, NULL),
(56, 5, 'Narail', '2021-02-23 01:02:23', NULL, NULL),
(57, 5, 'Shatkhira', '2021-02-23 01:02:23', NULL, NULL),
(58, 6, 'Bogra', '2021-02-23 01:04:20', NULL, NULL),
(59, 6, 'Jaipurhat', '2021-02-23 01:04:20', NULL, NULL),
(60, 6, 'Naogaon', '2021-02-23 01:04:20', NULL, NULL),
(61, 6, 'Natore', '2021-02-23 01:04:20', NULL, NULL),
(62, 6, 'Nawabganj', '2021-02-23 01:04:20', NULL, NULL),
(63, 6, 'Pabna', '2021-02-23 01:04:20', NULL, NULL),
(64, 6, 'Rajshahi', '2021-02-23 01:04:20', NULL, NULL),
(65, 6, 'Sirajganj', '2021-02-23 01:04:20', NULL, NULL),
(66, 7, 'Nilphamari', '2021-02-23 01:06:14', NULL, NULL),
(67, 7, 'Rangpur', '2021-02-23 01:06:14', NULL, NULL),
(68, 7, 'Dinajpur', '2021-02-23 01:06:15', NULL, NULL),
(69, 7, 'Panchagarh', '2021-02-23 01:06:15', NULL, NULL),
(70, 7, 'Gaibandha', '2021-02-23 01:06:15', NULL, NULL),
(71, 7, 'Kurigram', '2021-02-23 01:06:15', NULL, NULL),
(72, 7, 'Lalmonirhat', '2021-02-23 01:06:15', NULL, NULL),
(73, 7, 'Thakurgaon', '2021-02-23 01:06:15', NULL, NULL),
(74, 8, 'Habiganj', '2021-02-23 01:07:49', NULL, NULL),
(75, 8, 'Maulvibazar', '2021-02-23 01:07:49', NULL, NULL),
(76, 8, 'Sunamganj', '2021-02-23 01:07:49', NULL, NULL),
(77, 8, 'Sylhet', '2021-02-23 01:07:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `divname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `divname`, `created`, `updated`, `deleted`) VALUES
(1, 'Barisal', '2021-02-23 00:44:52', NULL, NULL),
(2, 'Chittagong', '2021-02-23 00:48:34', NULL, NULL),
(3, 'Dhaka', '2021-02-23 00:48:34', NULL, NULL),
(4, 'Mymensingh', '2021-02-23 00:48:34', NULL, NULL),
(5, 'Khulna', '2021-02-23 00:48:35', NULL, NULL),
(6, 'Rajshahi', '2021-02-23 00:48:35', NULL, NULL),
(7, 'Rangpur', '2021-02-23 00:48:35', NULL, NULL),
(8, 'Sylhet', '2021-02-23 00:49:15', '2021-02-23 01:08:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `lanname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `lanname`, `created`, `updated`, `deleted`) VALUES
(1, 'English', '2021-02-22 16:50:22', NULL, NULL),
(2, 'Bangla', '2021-02-22 16:50:22', NULL, NULL),
(3, 'Arabic', '2021-02-22 16:50:40', NULL, NULL),
(4, 'Hindi', '2021-02-22 16:50:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`id`, `cid`, `name`, `created`, `updated`, `deleted`) VALUES
(3, 1, 'physical education and health', '2021-02-22 17:00:56', NULL, NULL),
(4, 1, 'ICT', '2021-02-22 17:00:56', NULL, NULL),
(5, 1, 'Garhosto Biggan', '2021-02-22 17:01:30', NULL, NULL),
(6, 1, 'Bangla Bakaron', '2021-02-22 17:01:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` set('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` set('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `pass`, `token`, `status`, `role`, `created`, `updated`, `deleted`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$CZy0zzozUemA.EnBADJmwu06X6Qmm.QE2DZY5Ltv8CLzshKSrCr5a', NULL, '1', '1', '2021-02-23 23:45:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `writername` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `writername`, `created`, `updated`, `deleted`) VALUES
(1, 'Kazi Imam', '2021-02-24 00:16:27', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookblogs`
--
ALTER TABLE `bookblogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `scid` (`scid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `scid` (`scid`),
  ADD KEY `lid` (`lid`),
  ADD KEY `writerid` (`writerid`),
  ADD KEY `divid` (`divid`),
  ADD KEY `disid` (`disid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookid` (`bookid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divid` (`divid`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookblogs`
--
ALTER TABLE `bookblogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookblogs`
--
ALTER TABLE `bookblogs`
  ADD CONSTRAINT `bookblogs_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookblogs_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `bookblogs_ibfk_3` FOREIGN KEY (`scid`) REFERENCES `subcat` (`id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`scid`) REFERENCES `subcat` (`id`),
  ADD CONSTRAINT `books_ibfk_4` FOREIGN KEY (`lid`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `books_ibfk_5` FOREIGN KEY (`writerid`) REFERENCES `writers` (`id`),
  ADD CONSTRAINT `books_ibfk_6` FOREIGN KEY (`divid`) REFERENCES `division` (`id`),
  ADD CONSTRAINT `books_ibfk_7` FOREIGN KEY (`disid`) REFERENCES `district` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`divid`) REFERENCES `division` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);

--
-- Constraints for table `subcat`
--
ALTER TABLE `subcat`
  ADD CONSTRAINT `subcat_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
