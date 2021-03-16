-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 05:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
  `privacy` set('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` set('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `uid`, `cid`, `scid`, `lid`, `writerid`, `booktitle`, `bookdesc`, `pubname`, `mrp`, `price`, `phone`, `divid`, `disid`, `images`, `sold`, `privacy`, `status`, `created`, `updated`, `deleted`) VALUES
(1, 1, 1, 6, 2, 1, 'Bangla bakaron', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus, ab voluptatibus? Cum sed facilis dolorem, laborum amet voluptas iure, quisquam nihil temporibus, sequi molestias hic aspernatur repellendus saepe voluptate odio!', 'AD Prokasoni', 800.00, 400.00, '017885478', 2, 13, 'banglabakaron.PNG', '1', '1', '1', '2021-02-24 18:04:27', '2021-03-05 09:09:50', '2021-03-05 09:09:50'),
(2, 5, 1, 7, 1, 3, 'English 1st paper', ' Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur, aut sed tempora possimus dolorum quos repellendus dolor minus similique quisquam laborum cumque repellat vel, quo eligendi libero? Corrupti asperiores doloremque, ducimus possimus, quaerat sit voluptatibus fuga non debitis doloribus eaque, ipsam a est pariatur voluptates quos. Iste fugiat possimus nam?', 'download.jpg', 900.00, 180.00, '01745689', 3, 31, 'download.jpg', '1', '1', '1', '2021-02-26 13:52:45', '2021-02-27 14:28:22', '2021-02-27 14:28:22'),
(3, 5, 7, 16, 1, 5, 'Wuthering Heights', 'Wuthering Heights is an 1847 novel by Emily Brontë, published under the pseudonym Ellis Bell. It concerns two families of the landed gentry living on the West Yorkshire moors', 'Nelly Dean', 1500.00, 500.00, '0275418', 3, 36, 'WutheringHeights.jpg', '1', '1', '1', '2021-02-26 14:06:15', '2021-03-05 05:20:35', '2021-03-05 05:20:35'),
(4, 5, 7, 16, 1, 6, 'Jane Eyre', 'Jane Eyre is a novel by English writer Charlotte Brontë, published under the pen name \"Currer Bell\", on 16 October 1847, by Smith, Elder & Co. of London. The first American edition was published the following year by Harper & Brothers of New York', '', 2000.00, 250.00, '9846552', 6, 60, '119077-ml-1249820.jpg', '1', '1', '1', '2021-02-26 14:10:42', '2021-03-05 05:23:16', '2021-03-05 05:23:16'),
(5, 5, 7, 17, 1, 7, 'Robinson Crusoe', 'Robinson Crusoe is a novel by Daniel Defoe, first published on 25 April 1719. The first edition credited the work\'s protagonist Robinson Crusoe as its author, leading many readers to believe he was a real person and the book a travelogue of true incidents', 'Paternoster Row', 800.00, 350.00, '887566465', 1, 3, 'RobinsonCrusoe.jpg', '1', '1', '1', '2021-02-26 14:16:20', '2021-02-27 17:32:45', '2021-02-27 17:32:45'),
(6, 5, 7, 16, 2, 8, 'Devdas', 'Devdas is a Bengali romance novel written by Sarat Chandra Chatterjee. The character of Parvati was based on a real life second wife of zamindar Bhuvan Mohan Chowdhury, it was said that even the writer visited the village. According to sources, the original village was called Hatipota', '', 700.00, 190.00, '0275418785', 1, 6, '34912805.jpg', '1', '1', '1', '2021-02-26 14:26:08', '2021-03-05 05:24:30', '2021-03-05 05:24:30'),
(7, 5, 9, 19, 2, 9, 'Gitanjali', 'Gitanjali is a collection of poems by the Bengali poet Rabindranath Tagore. Tagore received the Nobel Prize for Literature, largely for the English translation, Song Offerings', '', 1200.00, 250.00, '01788541258', 3, 32, 'GITANJALI-Nobel-Prize-Centenary-Edition.jpg', '1', '1', '1', '2021-02-27 14:47:24', '2021-03-05 05:25:26', '2021-03-05 05:25:26'),
(8, 5, 7, 18, 2, 17, 'Deyal', 'Deyal is a 2013 political/historical novel by Bangladeshi writer Humayun Ahmed, based on the socio-political crisis in the aftermath of the war of independence of Bangladesh.', '', 900.00, 2800.00, '01303256895', 3, 34, 'deal.jpg', '1', '1', '1', '2021-02-27 14:50:39', '2021-03-05 05:25:35', '2021-03-05 05:25:35'),
(9, 5, 7, 18, 2, 10, 'Boatman of the Padma', 'Social Picture and Livelihood of the Boatmen in Manik Bandopadhyay\'s Padma Nadir Majhi : An Ecocritical Study · Abstract · No full-text available', '', 455.00, 300.00, '013258745', 8, 74, 'padmanodi.jpg', '1', '2', '1', '2021-02-27 14:53:08', '2021-03-05 09:11:14', '2021-03-05 09:11:14'),
(10, 5, 7, 16, 2, 11, 'Prajapati', 'Prajapati, a novel by Bengali author Samaresh Basu caused sensation with its publication. It was first published in 1967 in the Sharodiyo Desh special, a well known Bengali monthly magazine, a presentation of the Ananda Publishers.', '', 970.00, 450.00, '0178548444', 5, 50, 'prajapati.jpg', '2', '1', '1', '2021-02-27 14:54:46', '2021-03-05 05:25:33', '2021-03-05 05:25:33'),
(11, 5, 8, 21, 3, 12, 'Sahih Muslim', 'Sahih Muslim is one of the Kutub al-Sittah in Sunni Islam. It is highly acclaimed by Sunni Muslims as well as Zaidi Shia Muslims. It is considered the second most authentic hadith collection after Sahih al-Bukhari.', '', 700.00, 350.00, '01766558945', 6, 60, 'DSE04004.png', '1', '1', '1', '2021-02-27 14:57:36', '2021-03-05 05:25:13', '2021-03-05 05:25:13'),
(12, 5, 8, 20, 1, 13, '101 Quran Stories and Dua', '101 Quran Stories and Dua is a richly illustrated collection of 101 great stories told in simple language that children will easily understand and relate to', '', 250.00, 140.00, '017884596', 4, 45, '519tpomJvzL._AC_SY400_.jpg', '1', '1', '1', '2021-02-27 14:59:06', '2021-03-05 05:23:03', '2021-03-05 05:23:03'),
(13, 5, 8, 21, 3, 14, 'The Meadows of the Righteous', 'Riyad as-Salihin or The Meadows of the Righteous, also referred to as The Gardens of the Righteous, is a compilation of verses from the Quran supplemented by hadith narratives written by Al-Nawawi from Damascus', '', 1300.00, 280.00, '0178965625', 7, 68, 'themeadows.jpg', '2', '1', '1', '2021-02-27 15:04:33', '2021-03-05 05:20:50', '2021-03-05 05:20:50'),
(14, 5, 8, 21, 1, 2, 'The House of Islam', 'Riyad as-Salihin or The Meadows of the Righteous, also referred to as The Gardens of the Righteous, is a compilation of verses from the Quran supplemented by hadith narratives written by Al-Nawawi from Damascus', 'idk', 1300.00, 280.00, '01785558444', 8, 77, '1614887699_5_57359781632866394.jpg', '1', '1', '1', '2021-03-04 19:54:59', '2021-03-05 08:02:31', '2021-03-05 08:02:31'),
(15, 1, 2, 11, 1, 1, ' বিষের বাঁশি ', 'affafsa', 'IDK', 500.00, 500.00, '01785445587', 4, 45, '1614882706_1_55835.PNG', '1', '2', '1', '2021-03-04 18:31:46', '2021-03-05 09:09:54', '2021-03-05 09:09:54'),
(16, 1, 2, 11, 2, 3, 'Somaz kormo', 'Somazkormi', 'IDK', 500.00, 500.00, '4564654', 5, 51, '1614882767_1_32015.PNG', '1', '1', '1', '2021-03-04 18:32:47', '2021-03-05 05:23:11', '2021-03-05 05:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` set('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `privacy`, `created`, `updated`, `deleted`) VALUES
(1, 'JSC', '1', '2021-02-22 16:54:34', '2021-03-05 05:51:53', NULL),
(2, 'SSC', '1', '2021-02-22 16:54:51', '2021-03-05 05:51:59', NULL),
(3, 'HSC', '1', '2021-02-22 16:55:00', '2021-03-05 05:52:04', NULL),
(4, 'University', '1', '2021-02-26 13:53:53', '2021-03-05 05:52:09', NULL),
(5, 'Engineering', '2', '2021-02-26 13:53:53', '2021-03-05 06:36:04', '2021-03-05 06:36:04'),
(6, 'History and Tradition ', '1', '2021-02-26 13:54:16', '2021-03-05 05:49:58', '2021-03-05 05:49:58'),
(7, 'Novel', '1', '2021-02-26 13:54:16', '2021-03-05 05:50:01', '2021-03-05 05:50:01'),
(8, 'Islamiq', '1', '2021-02-27 14:39:24', '2021-03-05 05:50:03', '2021-03-05 05:50:03'),
(9, 'Poetry', '1', '2021-02-27 14:43:12', '2021-03-05 05:50:08', '2021-03-05 05:50:08'),
(14, 'Motivational', '1', '2021-03-05 05:46:34', '2021-03-05 05:50:12', '2021-03-05 05:50:12'),
(16, 'Comics', '1', '2021-03-05 05:51:37', NULL, NULL),
(28, 'Sports', '1', '2021-03-05 06:09:30', NULL, NULL),
(29, 'Mathematics', '1', '2021-03-05 06:10:19', NULL, NULL),
(30, 'Biographies', '1', '2021-03-05 06:10:50', '2021-03-05 06:36:53', '2021-03-05 06:36:53'),
(31, 'Drawing', '2', '2021-03-05 06:11:07', '2021-03-05 06:35:36', '2021-03-05 06:35:36'),
(32, 'Philosophy', '1', '2021-03-05 07:57:16', '2021-03-05 07:57:36', '2021-03-05 07:57:36');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `bookid`, `uid`, `comment`, `created`, `updated`, `deleted`) VALUES
(1, 11, 1, 'This is Awesome Post', '2021-03-04 18:34:38', NULL, NULL),
(2, 13, 5, 'hjasjoia', '2021-03-05 04:06:08', NULL, NULL),
(3, 1, 1, 'nice book', '2021-03-05 15:33:49', NULL, NULL);

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
(77, 8, 'Sylhet', '2021-02-23 01:07:49', NULL, NULL),
(79, 1, 'test2', '2021-03-05 15:18:42', '2021-03-05 15:25:24', '2021-03-05 15:25:24');

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
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `uid`, `fullname`, `bio`, `image`, `phone`, `location`, `gender`, `created`, `updated`, `deleted`) VALUES
(1, 1, 'Abd Mannaf', 'This is abdul Mannaf', '1614472422_idb_9167panda.jpg', NULL, NULL, NULL, '2021-02-28 00:33:42', NULL, NULL),
(2, 5, 'Ikbal Hossain', 'I am iqbal Hossain', '1614439127_ikbal_2962i.png', NULL, NULL, NULL, '2021-02-27 15:18:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` set('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`id`, `cid`, `name`, `privacy`, `created`, `updated`, `deleted`) VALUES
(3, 1, 'physical education and health', '1', '2021-02-22 17:00:56', '2021-03-05 08:31:00', NULL),
(4, 1, 'ICT', '1', '2021-02-22 17:00:56', '2021-03-05 08:31:00', NULL),
(5, 1, 'Garhosto Biggan', '1', '2021-02-22 17:01:30', '2021-03-05 08:31:00', NULL),
(6, 1, 'Bangla Bakaron', '1', '2021-02-22 17:01:30', '2021-03-05 08:31:00', NULL),
(7, 1, 'English', '1', '2021-02-26 13:44:51', '2021-03-05 08:31:00', NULL),
(8, 1, 'Bangla', '1', '2021-02-26 13:44:51', '2021-03-05 08:31:00', NULL),
(9, 1, 'Mathematic', '1', '2021-02-26 13:45:25', '2021-03-05 08:31:00', NULL),
(10, 2, 'English', '1', '2021-02-26 13:45:25', '2021-03-05 08:31:00', NULL),
(11, 2, 'bangla', '1', '2021-02-26 13:45:42', '2021-03-05 08:31:00', NULL),
(12, 2, 'Mathematic', '1', '2021-02-26 13:45:42', '2021-03-05 08:31:00', NULL),
(13, 3, 'English', '1', '2021-02-26 13:45:59', '2021-03-05 08:31:00', NULL),
(14, 3, 'Bangla', '1', '2021-02-26 13:45:59', '2021-03-05 08:31:00', NULL),
(15, 3, 'Mathematic', '1', '2021-02-26 13:46:10', '2021-03-05 08:31:00', NULL),
(16, 7, 'Romance novel', '1', '2021-02-26 14:00:49', '2021-03-05 08:31:00', NULL),
(17, 7, 'Adventure fiction', '1', '2021-02-26 14:13:33', '2021-03-05 08:31:00', NULL),
(18, 7, 'Fiction', '1', '2021-02-27 14:44:16', '2021-03-05 08:31:00', NULL),
(19, 9, 'Poetry', '1', '2021-02-27 14:44:40', '2021-03-05 08:31:00', NULL),
(20, 8, 'islamiq', '1', '2021-02-27 14:55:20', '2021-03-05 08:31:00', NULL),
(21, 8, 'Hadith', '1', '2021-02-27 14:55:56', '2021-03-05 08:31:00', NULL),
(22, 8, 'History', '1', '2021-02-27 15:04:59', '2021-03-05 11:35:29', '2021-03-05 11:35:29'),
(23, 1, 'Math', '1', '2021-03-05 08:11:54', '2021-03-05 11:35:32', '2021-03-05 11:35:32');

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
  `role` set('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `pass`, `token`, `status`, `role`, `created`, `updated`, `deleted`) VALUES
(1, 'idb', 'idb@gmail.com', '$2y$10$9NV.i1sIl32V84LqmQyeOu1nq278Q..6WtO4eDHUB.l2fi6nbcW4e', NULL, '1', '1', '2021-02-24 13:33:39', NULL, NULL),
(2, 'admin', 'admin@gmail.com', '$2y$10$Ndi58wifua8Gkq1nNivEtubLvlmyOyMM2l9KQQmTfVaqQUWIxYGoG', NULL, '1', '2', '2021-02-26 11:54:48', '2021-03-05 12:22:18', '2021-03-05 12:22:18'),
(5, 'ikbal', 'ikbal@gmail.com', '$2y$10$6F2mrauKmWYI8JzskWHGO.3dxeSz0tLaLqdRvUfqBvqjeDFP9jEvu', NULL, '1', '1', '2021-02-26 13:22:49', NULL, NULL),
(6, 'algalib', 'algalib006@gmail.com', '$2y$10$Gp6aq7ST/aY5MkMkxOQhxuLr26o.dyuoJmmQuFHLpjjYUylQs1RSS', NULL, '1', '1', '2021-03-05 04:13:11', '2021-03-05 13:04:18', '2021-03-05 13:04:18'),
(7, 'root', 'root@gmail.com', '$2y$10$DtxZ7CF0Dhp6bQwu5Sw24et1uTf5DetSYxcqKRfxvxyB2cEE6jyS6', NULL, '1', '2', '2021-03-05 12:27:09', NULL, NULL),
(9, 'root1', 'root1@gmail.com', '$2y$10$Xe26i4GCAey6aMGsYOKdT.g//oHytRTiw6jqW.GRSxpz8t/f5izWW', NULL, '1', '2', '2021-03-05 12:28:06', NULL, NULL),
(10, 'root3', 'root3@gmail.com', '$2y$10$pghCzRbWob1386KGQj6J7OZzhT845IMelO0AXU/r1xee/9oO48NjS', NULL, '1', '1', '2021-03-05 13:22:10', NULL, NULL),
(11, 'hello', 'hello@gmail.com', '$2y$10$lAF1VyVYjv71aCZViCa7vubhNwek22oZ7gmAFa5Kd01wiPy4gbEmG', NULL, '1', '4', '2021-03-05 13:26:07', '2021-03-05 13:37:27', '2021-03-05 13:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `writername` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privacy` set('1','2','3','4') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `writername`, `privacy`, `created`, `updated`, `deleted`) VALUES
(1, 'Dr. Soumittro Shekhor', '1', '2021-02-24 17:58:37', NULL, NULL),
(2, 'Kazi ahsan habib', '1', '2021-02-24 17:58:37', NULL, NULL),
(3, 'iqbal Hossen', '1', '2021-02-26 13:40:58', NULL, NULL),
(4, 'Abdullah Al galib', '1', '2021-02-26 13:40:58', NULL, NULL),
(5, 'Emily Brontë', '1', '2021-02-26 13:56:25', NULL, NULL),
(6, 'Charlotte Brontë', '1', '2021-02-26 14:08:51', NULL, NULL),
(7, 'Daniel Defoe', '1', '2021-02-26 14:12:47', NULL, NULL),
(8, 'Sarat Chandra Chattopadhyay', '3', '2021-02-26 14:23:31', '2021-03-05 14:38:47', NULL),
(9, 'Rabindranath Tagore', '1', '2021-02-27 14:40:49', NULL, NULL),
(10, 'Manik Bandopadhyay', '1', '2021-02-27 14:40:49', NULL, NULL),
(11, 'Samaresh Basu', '1', '2021-02-27 14:41:26', NULL, NULL),
(12, 'Muslim ibn al-Hajjaj', '1', '2021-02-27 14:41:26', NULL, NULL),
(13, 'Saniyasnain Khan', '1', '2021-02-27 14:41:56', NULL, NULL),
(14, 'Abu Zakaria Yahya Ibn Sharaf An Nawawi', '1', '2021-02-27 14:41:56', NULL, NULL),
(15, 'Ed Husain', '1', '2021-02-27 14:42:13', NULL, NULL),
(16, 'Ilyas Qadri', '1', '2021-02-27 14:42:13', NULL, NULL),
(17, 'Humayun Ahmed', '1', '2021-02-27 14:48:44', NULL, NULL),
(18, 'Peary Chand Mitra', '3', '2021-03-05 14:22:18', '2021-03-05 14:38:16', NULL),
(20, 'Tahmima Anam', '1', '2021-03-05 14:46:37', '2021-03-05 14:52:37', '2021-03-05 14:52:37');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catname` (`catname`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `writername` (`writername`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
