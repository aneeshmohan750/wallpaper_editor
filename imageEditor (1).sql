-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2017 at 09:56 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imageEditor`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  `user_id` mediumint(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`, `user_id`) VALUES
('3c43f667a4b1daf0083a21107e68cdf0', '94.200.145.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 1502174483, 'a:3:{s:9:"user_data";s:0:"";s:8:"is_login";b:1;s:9:"logged_in";a:3:{s:8:"USERNAME";s:5:"admin";s:4:"NAME";s:14:"Administrator ";s:7:"USER_ID";s:1:"1";}}', 0),
('cd2f51b266d84a9b2213ead8421d143d', '107.170.96.6', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko', 1502174484, '', 0),
('92e8838049a8ad506be0c93ac572be00', '159.203.81.93', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:33.0) Gecko', 1502174493, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `img_categories`
--

CREATE TABLE `img_categories` (
  `id` mediumint(15) NOT NULL,
  `name` varchar(400) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_categories`
--

INSERT INTO `img_categories` (`id`, `name`, `status`) VALUES
(1, 'Guidelines', 1),
(2, 'Information', 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_font_family`
--

CREATE TABLE `img_font_family` (
  `id` mediumint(15) NOT NULL,
  `font_family` varchar(400) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_font_family`
--

INSERT INTO `img_font_family` (`id`, `font_family`, `status`) VALUES
(1, 'Arial', 1),
(2, 'Arial Black', 1),
(3, 'Century Gothic', 0),
(4, 'Codystar', 0),
(5, 'Courgette', 0),
(6, 'Crafty Girls', 0),
(7, 'Denk One', 0),
(8, 'Garamond', 0),
(9, 'Georgia', 0),
(10, 'Iceland', 0),
(11, 'Impact', 0),
(12, 'Jocky One', 0),
(13, 'League Gothic', 0),
(14, 'Lobster', 0),
(15, 'Michroma', 0),
(16, 'Monotype Corsiva', 0),
(17, 'optima', 0),
(18, 'Oxygen', 0),
(19, 'Pacifico', 0),
(20, 'Permanent Marker', 0),
(21, 'Play', 0),
(22, 'Playball', 0),
(23, 'Righteous', 0),
(24, 'Satisfy', 0),
(25, 'Six Caps', 0),
(26, 'Stencil', 0),
(27, 'Times New Roman', 1),
(28, 'Trajan Pro', 1),
(29, 'Trebuchet MS', 1),
(30, 'Ubuntu', 0),
(31, 'Verdana', 1),
(32, 'Yellowtail', 0),
(33, '''Open Sans'', sans-serif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_icon_set`
--

CREATE TABLE `img_icon_set` (
  `id` mediumint(15) NOT NULL,
  `icon_name` varchar(400) NOT NULL,
  `keyword` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_icon_set`
--

INSERT INTO `img_icon_set` (`id`, `icon_name`, `keyword`, `status`) VALUES
(1, 'All_Blue_Icons-01.png', 'Data Loss', 1),
(2, 'All_Blue_Icons-02.png', 'Data Protection', 1),
(3, 'All_Blue_Icons-03.png', 'Email Security', 1),
(4, 'All_Blue_Icons-04.png', 'Intruder', 1),
(5, 'All_Blue_Icons-05.png', 'Energy', 1),
(6, 'All_Blue_Icons-06.png', 'Security', 1),
(7, 'All_Blue_Icons-07.png', 'IT', 1),
(8, 'All_Blue_Icons-08.png', 'Natural Gas', 1),
(9, 'All_Blue_Icons-09.png', 'Petroleum', 1),
(10, 'All_Blue_Icons-10.png', 'Oil', 1),
(11, 'All_Blue_Icons-11.png', 'Company', 1),
(12, 'All_Blue_Icons-12.png', 'Safety', 1),
(13, 'All_Blue_Icons-13.png', 'Spamming', 1),
(14, 'Company.png', 'Company', 1),
(15, 'Data Loss.png', 'Data Loss', 1),
(16, 'Data Protection.png', 'Data Protection', 1),
(17, 'Email security.png', 'Email security', 1),
(18, 'Energy.png', 'Energy', 1),
(19, 'Intruder.png', 'Intruder.png', 1),
(20, 'IT.png', 'IT', 1),
(21, 'Natural Gas.png', 'Natural Gas', 1),
(22, 'Oil.png', 'Oil', 1),
(23, 'Petroleum.png', 'Petroleum', 1),
(24, 'Safety.png', 'Safety', 1),
(25, 'Security.png', 'Security', 1),
(26, 'spamming.png', 'spamming', 1),
(27, 'Company_black.png', 'Company', 1),
(28, 'Data Loss_black.png', 'Data Loss', 1),
(29, 'Data Protection_black.png', 'Data Protection', 1),
(30, 'Email security_black.png', 'Email security', 1),
(31, 'Energy_black.png', 'Energy', 1),
(32, 'Intruder_black.png', 'Intruder', 1),
(33, 'IT_black.png', 'IT', 1),
(34, 'Natural Gas_black.png', 'Natural Gas', 1),
(35, 'Oil_black.png', 'Oil', 1),
(36, 'Petroleum_black.png', 'Petroleum', 1),
(37, 'Safety_black.png', 'Safety', 1),
(38, 'Security_black.png', 'Security', 1),
(39, 'Spamming_black.png', 'Spamming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_logo_set`
--

CREATE TABLE `img_logo_set` (
  `id` mediumint(15) NOT NULL,
  `logo_name` varchar(400) NOT NULL,
  `logo_width` varchar(400) NOT NULL,
  `logo_height` varchar(400) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_logo_set`
--

INSERT INTO `img_logo_set` (`id`, `logo_name`, `logo_width`, `logo_height`, `status`) VALUES
(1, 'dusup_blue_logo.png', '200', '50', 1),
(2, 'dusup_white_logo.png', '200', '50', 1),
(3, 'D417FE07.png', '50', '30', 1),
(4, '2707F8C6.png', '150', '30', 1),
(5, '2015ABF.png', '100', '30', 1),
(6, '892AFE65.png', '100', '35', 1),
(7, '892AFE63.png', '100', '20', 1),
(8, '642EF192.png', '100', '30', 1),
(9, '460DDA39.png', '50', '30', 1),
(10, '7EC07273.png', '200', '20', 1),
(11, '4E9B0F7.png', '100', '40', 1),
(12, '4E9B0F2.png', '100', '20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_svg_templates`
--

CREATE TABLE `img_svg_templates` (
  `id` mediumint(15) NOT NULL,
  `category_id` mediumint(15) NOT NULL,
  `template_name` varchar(400) NOT NULL,
  `svg_file` varchar(400) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_svg_templates`
--

INSERT INTO `img_svg_templates` (`id`, `category_id`, `template_name`, `svg_file`, `status`) VALUES
(1, 1, 'Guidelines_01', 'Guidelines_01.svg', 1),
(2, 2, 'Information_01', 'Information_01.svg', 1),
(3, 1, 'Guidelines_02', 'Guidelines_02.svg', 1),
(4, 1, 'Guidelines_03', 'Guidelines_03.svg', 1),
(5, 1, 'Guidelines_04', 'Guidelines_04.svg', 1),
(6, 2, 'Information_02', 'Information_02.svg', 1),
(8, 2, 'Information_03', 'Information_03.svg', 1),
(9, 2, 'Information_04', 'Information_04.svg', 1),
(10, 1, 'Guidelines_05', 'Guidelines_05.svg', 1),
(11, 2, 'Information_05', 'Information_05.svg', 1),
(12, 1, 'Guidelines_06', 'Guidelines_06.svg', 1),
(13, 1, 'Guidelines_07', 'Guidelines_07.svg', 1),
(14, 2, 'Information_06', 'Information_06.svg', 1),
(15, 2, 'Information_07', 'Information_07.svg', 1),
(16, 2, 'Information_08', 'Information_08.svg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_users`
--

CREATE TABLE `img_users` (
  `user_id` mediumint(15) NOT NULL,
  `first_name` varchar(400) NOT NULL,
  `last_name` varchar(400) NOT NULL,
  `username` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL,
  `create_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_users`
--

INSERT INTO `img_users` (`user_id`, `first_name`, `last_name`, `username`, `password`, `create_date`, `last_login`, `status`) VALUES
(1, 'Administrator', '', 'admin', 'a0a6d499801c3757a0a612624894bdab', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_user_logs`
--

CREATE TABLE `img_user_logs` (
  `id` mediumint(15) NOT NULL,
  `username` varchar(500) NOT NULL,
  `attempt` enum('success','failure') NOT NULL,
  `ip_address` varchar(500) NOT NULL,
  `log_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_user_logs`
--

INSERT INTO `img_user_logs` (`id`, `username`, `attempt`, `ip_address`, `log_date`) VALUES
(1, 'admin', 'success', '94.200.208.210', '2017-02-08 14:35:50'),
(2, 'admin', 'success', '94.200.208.210', '2017-02-08 14:35:50'),
(3, 'admin', 'success', '94.200.208.210', '2017-02-09 07:15:19'),
(4, 'admin', 'success', '94.200.208.210', '2017-02-09 07:15:19'),
(5, 'admin', 'success', '94.200.208.210', '2017-02-09 07:37:45'),
(6, 'admin', 'success', '94.200.208.210', '2017-02-09 08:38:20'),
(7, 'admin', 'success', '31.215.202.135', '2017-02-11 13:02:01'),
(8, 'admin', 'success', '31.215.202.135', '2017-02-11 13:02:01'),
(9, 'admin', 'success', '94.200.208.210', '2017-02-12 06:32:10'),
(10, 'admin', 'success', '94.200.208.210', '2017-02-12 06:32:10'),
(11, 'admin', 'success', '94.200.208.210', '2017-02-12 09:14:20'),
(12, 'admin', 'success', '94.200.208.210', '2017-02-12 09:14:21'),
(13, 'admin', 'success', '94.200.208.210', '2017-02-12 11:36:48'),
(14, 'admin', 'success', '94.200.208.210', '2017-02-12 11:36:48'),
(15, 'admin', 'success', '94.200.208.210', '2017-02-12 14:51:05'),
(16, 'admin', 'success', '94.200.208.210', '2017-02-12 14:51:05'),
(17, 'admin', 'failure', '94.200.208.210', '2017-02-13 06:20:47'),
(18, 'admin', 'failure', '94.200.208.210', '2017-02-13 06:20:47'),
(19, 'admin', 'success', '94.200.208.210', '2017-02-13 06:20:53'),
(20, 'admin', 'success', '94.200.208.210', '2017-02-13 06:48:55'),
(21, 'admin', 'success', '94.200.208.210', '2017-02-13 06:48:56'),
(22, 'admin', 'success', '94.200.208.210', '2017-02-13 06:58:04'),
(23, 'admin', 'success', '94.200.208.210', '2017-02-13 06:58:05'),
(24, 'admin', 'success', '94.200.208.210', '2017-02-13 09:03:42'),
(25, 'admin', 'success', '94.200.208.210', '2017-02-13 09:03:42'),
(26, 'admin', 'success', '94.200.208.210', '2017-02-13 09:11:11'),
(27, 'admin', 'success', '94.200.208.210', '2017-02-13 09:11:11'),
(28, 'admin', 'success', '94.200.208.210', '2017-02-13 09:16:21'),
(29, 'admin', 'success', '94.200.208.210', '2017-02-13 09:16:21'),
(30, 'admin', 'success', '94.200.208.210', '2017-02-13 09:24:37'),
(31, 'admin', 'success', '94.200.208.210', '2017-02-13 09:34:11'),
(32, 'admin', 'success', '94.200.208.210', '2017-02-13 09:34:11'),
(33, 'admin', 'success', '94.200.208.210', '2017-02-13 09:59:23'),
(34, 'admin', 'success', '94.200.208.210', '2017-02-13 11:35:48'),
(35, 'admin', 'success', '94.200.208.210', '2017-02-13 11:35:48'),
(36, 'admin', 'success', '94.200.208.210', '2017-02-13 13:48:44'),
(37, 'admin', 'success', '94.200.208.210', '2017-02-13 13:48:44'),
(38, 'admin', 'failure', '94.200.208.210', '2017-02-13 14:13:44'),
(39, 'admin', 'failure', '94.200.208.210', '2017-02-13 14:15:05'),
(40, 'admin', 'failure', '94.200.208.210', '2017-02-13 14:15:11'),
(41, 'admin', 'success', '94.200.208.210', '2017-02-13 14:15:17'),
(42, 'admin', 'success', '94.200.208.210', '2017-02-13 14:19:58'),
(43, 'admin', 'success', '94.200.208.210', '2017-02-13 14:19:58'),
(44, 'admin', 'success', '94.200.208.210', '2017-02-13 14:20:40'),
(45, 'xcvx', 'failure', '94.200.208.210', '2017-02-13 14:22:25'),
(46, 'sdasd', 'failure', '94.200.208.210', '2017-02-13 14:22:54'),
(47, 'adasd', 'failure', '94.200.208.210', '2017-02-13 14:24:52'),
(48, 'adasd', 'failure', '94.200.208.210', '2017-02-13 14:24:56'),
(49, 'admin', 'success', '94.200.208.210', '2017-02-13 14:25:09'),
(50, 'admin', 'success', '94.200.208.210', '2017-02-13 15:32:04'),
(51, 'admin', 'success', '94.200.208.210', '2017-02-14 06:15:17'),
(52, 'admin', 'success', '94.200.208.210', '2017-02-14 06:21:27'),
(53, 'admin', 'success', '94.200.208.210', '2017-02-14 06:22:02'),
(54, 'admin', 'success', '94.200.208.210', '2017-02-14 06:22:37'),
(55, 'admin', 'success', '94.200.208.210', '2017-02-14 06:26:50'),
(56, 'admin', 'success', '94.200.208.210', '2017-02-14 08:29:26'),
(57, 'admin', 'success', '94.200.208.210', '2017-02-14 11:17:42'),
(58, 'admin', 'success', '94.200.208.210', '2017-02-14 11:24:40'),
(59, 'admin', 'success', '94.200.208.210', '2017-02-14 13:16:22'),
(60, 'admin', 'success', '83.110.153.68', '2017-02-15 07:28:01'),
(61, 'admin', 'success', '83.110.153.68', '2017-02-15 07:46:13'),
(62, 'admin', 'success', '94.200.208.210', '2017-02-15 08:24:43'),
(63, 'ADMIN', 'success', '2.50.41.189', '2017-02-15 09:00:06'),
(64, 'admin', 'success', '94.200.208.210', '2017-02-15 14:38:17'),
(65, 'admin', 'success', '94.200.208.210', '2017-02-16 07:07:49'),
(66, 'admin', 'success', '94.200.208.210', '2017-02-16 07:22:13'),
(67, 'admin', 'success', '94.200.208.210', '2017-02-16 12:15:09'),
(68, 'admin', 'success', '86.98.45.85', '2017-02-19 09:45:38'),
(69, 'admin', 'failure', '94.200.208.210', '2017-03-12 13:06:04'),
(70, 'admin', 'failure', '94.200.208.210', '2017-03-12 13:06:04'),
(71, 'admin', 'failure', '94.200.208.210', '2017-03-12 13:06:09'),
(72, 'admin', 'failure', '94.200.208.210', '2017-03-12 13:06:14'),
(73, 'admin', 'failure', '94.200.208.210', '2017-03-12 13:06:14'),
(74, 'admin', 'failure', '94.200.208.210', '2017-03-12 13:06:28'),
(75, 'admin', 'failure', '94.200.208.210', '2017-03-12 13:06:28'),
(76, 'admin', 'failure', '94.200.208.210', '2017-03-12 13:07:43'),
(77, 'admin', 'failure', '94.200.208.210', '2017-03-12 13:07:43'),
(78, 'admin', 'success', '94.200.208.210', '2017-03-12 13:08:12'),
(79, 'admin', 'success', '94.200.208.210', '2017-03-12 13:08:13'),
(80, 'admin', 'success', '94.200.208.210', '2017-03-12 15:07:32'),
(81, 'admin', 'success', '94.200.208.210', '2017-03-12 15:07:32'),
(82, 'admin', 'success', '94.200.208.210', '2017-03-13 06:21:10'),
(83, 'admin', 'success', '94.200.208.210', '2017-03-13 06:21:10'),
(84, 'admin', 'success', '94.200.208.210', '2017-03-13 08:23:38'),
(85, 'admin', 'success', '94.200.208.210', '2017-03-13 08:23:38'),
(86, 'admin', 'success', '94.200.208.210', '2017-03-13 11:22:42'),
(87, 'admin', 'success', '94.200.208.210', '2017-03-13 11:22:42'),
(88, 'admin', 'success', '94.200.208.210', '2017-03-14 10:09:18'),
(89, 'admin', 'success', '94.200.208.210', '2017-03-14 10:09:18'),
(90, 'admin', 'success', '94.200.208.210', '2017-03-14 14:44:37'),
(91, 'admin', 'success', '94.200.208.210', '2017-03-14 14:44:37'),
(92, 'admin', 'success', '94.200.208.210', '2017-03-15 08:02:58'),
(93, 'admin', 'success', '94.200.208.210', '2017-03-15 08:02:58'),
(94, 'admin', 'success', '94.200.208.210', '2017-03-15 09:33:05'),
(95, 'admin', 'success', '94.200.208.210', '2017-03-15 09:33:05'),
(96, 'admin', 'success', '94.200.208.210', '2017-03-15 11:33:07'),
(97, 'admin', 'success', '94.200.208.210', '2017-03-15 11:33:07'),
(98, 'admin', 'success', '94.200.208.210', '2017-03-15 13:35:08'),
(99, 'admin', 'success', '94.200.208.210', '2017-03-15 13:35:08'),
(100, 'admin', 'failure', '94.200.208.210', '2017-03-20 06:46:22'),
(101, 'admin', 'failure', '94.200.208.210', '2017-03-20 06:46:22'),
(102, 'admin', 'failure', '94.200.208.210', '2017-03-20 06:46:53'),
(103, 'admin', 'failure', '94.200.208.210', '2017-03-20 06:48:24'),
(104, 'admin', 'failure', '94.200.208.210', '2017-03-20 06:48:24'),
(105, 'admin', 'success', '94.200.208.210', '2017-03-20 06:48:38'),
(106, 'admin', 'success', '94.200.208.210', '2017-03-20 06:48:38'),
(107, 'admin', 'success', '94.200.208.210', '2017-03-20 06:59:51'),
(108, 'admin', 'success', '94.200.208.210', '2017-03-20 09:22:59'),
(109, 'admin', 'success', '94.200.208.210', '2017-03-20 09:43:37'),
(110, 'admin', 'success', '83.110.153.68', '2017-03-21 05:17:42'),
(111, 'admin', 'success', '83.110.153.68', '2017-03-21 11:49:32'),
(112, 'admin', 'success', '94.200.208.210', '2017-03-21 13:22:23'),
(113, 'admin', 'success', '94.200.208.210', '2017-03-22 07:24:12'),
(114, 'admin', 'failure', '94.200.208.210', '2017-03-29 07:44:25'),
(115, 'admin', 'failure', '94.200.208.210', '2017-03-29 07:44:25'),
(116, 'admin', 'failure', '94.200.208.210', '2017-03-29 07:44:30'),
(117, 'admin', 'failure', '94.200.208.210', '2017-03-29 07:44:30'),
(118, 'admin', 'success', '94.200.208.210', '2017-03-29 07:44:58'),
(119, 'admin', 'failure', '94.200.208.210', '2017-03-29 10:16:26'),
(120, 'admin', 'failure', '94.200.208.210', '2017-03-29 10:16:27'),
(121, 'admin', 'success', '94.200.208.210', '2017-03-29 10:17:22'),
(122, 'admin', 'success', '94.200.208.210', '2017-03-29 12:46:09'),
(123, 'admin', 'success', '94.200.208.210', '2017-03-29 15:06:05'),
(124, 'admin', 'success', '83.110.153.68', '2017-03-30 06:36:13'),
(125, 'admin', 'success', '94.200.208.210', '2017-03-30 15:09:29'),
(126, 'admin', 'success', '94.200.208.210', '2017-03-30 15:09:29'),
(127, 'reeja', 'failure', '46.19.79.133', '2017-03-30 16:17:55'),
(128, 'admin', 'failure', '46.19.79.133', '2017-03-30 16:18:00'),
(129, 'admin', 'failure', '46.19.79.133', '2017-03-30 16:18:00'),
(130, 'admin', 'failure', '46.19.79.133', '2017-03-30 16:19:35'),
(131, 'admin', 'success', '46.19.79.133', '2017-03-30 16:19:39'),
(132, 'admin', 'success', '83.110.153.68', '2017-04-02 09:37:29'),
(133, 'admin', 'success', '83.110.153.68', '2017-04-02 09:40:17'),
(134, 'admin', 'success', '83.110.153.68', '2017-04-06 05:18:13'),
(135, 'admin', 'success', '83.110.153.68', '2017-04-06 05:19:07'),
(136, 'admin', 'success', '94.200.208.210', '2017-04-06 07:32:34'),
(137, 'admin', 'success', '94.200.208.210', '2017-04-06 09:36:13'),
(138, 'admin', 'success', '94.200.208.210', '2017-04-06 13:21:00'),
(139, 'admin', 'success', '94.200.208.210', '2017-04-06 15:29:16'),
(140, 'admin', 'failure', '94.200.208.210', '2017-04-09 09:59:32'),
(141, 'admin', 'failure', '94.200.208.210', '2017-04-09 09:59:32'),
(142, 'admin', 'success', '94.200.208.210', '2017-04-09 09:59:44'),
(143, 'admin', 'success', '94.200.208.210', '2017-04-10 15:07:15'),
(144, 'admin', 'success', '94.200.208.210', '2017-04-10 16:04:18'),
(145, 'admin', 'success', '94.200.208.210', '2017-04-11 07:19:30'),
(146, 'admin', 'success', '94.200.208.210', '2017-04-11 07:30:01'),
(147, 'admin', 'success', '94.200.208.210', '2017-04-11 07:35:00'),
(148, 'admin', 'success', '94.200.208.210', '2017-04-20 15:33:54'),
(149, 'admin', 'success', '94.200.208.210', '2017-04-24 08:03:48'),
(150, 'admin', 'success', '94.200.208.210', '2017-04-24 08:03:48'),
(151, 'admin', 'success', '94.200.208.210', '2017-04-24 11:01:16'),
(152, 'admin', 'success', '94.200.208.210', '2017-04-24 14:59:07'),
(153, 'admin', 'success', '94.200.208.210', '2017-04-24 14:59:07'),
(154, 'admin', 'success', '94.200.208.210', '2017-04-25 10:41:02'),
(155, 'admin', 'success', '94.200.208.210', '2017-04-26 13:11:27'),
(156, 'admin', 'success', '94.200.208.210', '2017-05-21 15:58:56'),
(157, 'admin', 'success', '94.200.208.210', '2017-05-23 09:18:51'),
(158, 'admin', 'success', '94.200.208.210', '2017-05-23 14:41:51'),
(159, 'admin', 'success', '94.200.208.210', '2017-05-23 15:26:07'),
(160, 'admin', 'success', '94.200.208.210', '2017-05-24 13:46:27'),
(161, 'admin', 'failure', '94.200.208.210', '2017-05-24 17:57:30'),
(162, 'admin', 'success', '94.200.208.210', '2017-05-24 17:57:33'),
(163, 'admin', 'success', '94.200.208.210', '2017-05-25 07:51:26'),
(164, 'admin', 'success', '94.200.208.210', '2017-05-25 08:02:29'),
(165, 'admin', 'success', '86.98.86.52', '2017-05-31 09:12:05'),
(166, 'admin', 'success', '86.98.86.52', '2017-06-01 06:02:37'),
(167, 'admin', 'success', '86.98.86.52', '2017-06-01 06:04:38'),
(168, 'admin', 'success', '86.98.86.52', '2017-06-01 06:04:38'),
(169, 'admin', 'success', '86.98.86.52', '2017-06-01 08:04:46'),
(170, 'admin', 'success', '86.98.86.52', '2017-06-01 08:05:45'),
(171, 'admin', 'success', '86.98.86.52', '2017-06-01 08:06:28'),
(172, 'admin', 'success', '86.98.86.52', '2017-06-01 08:06:28'),
(173, 'admin', 'success', '94.200.145.138', '2017-06-01 08:19:48'),
(174, 'admin', 'success', '86.98.86.52', '2017-06-01 08:43:11'),
(175, 'admin', 'success', '86.98.86.52', '2017-06-01 08:43:11'),
(176, 'admin', 'success', '86.98.86.52', '2017-06-01 08:55:56'),
(177, 'admin', 'success', '94.200.208.210', '2017-06-01 08:56:39'),
(178, 'admin', 'success', '86.98.86.52', '2017-06-01 08:57:36'),
(179, 'admin', 'success', '94.200.145.138', '2017-06-01 10:23:08'),
(180, 'admin', 'success', '94.200.145.138', '2017-06-01 12:25:09'),
(181, 'admin', 'success', '86.98.86.52', '2017-06-04 07:17:10'),
(182, 'admin', 'success', '86.98.86.52', '2017-06-04 07:18:37'),
(183, 'admin', 'success', '86.98.86.52', '2017-06-04 07:18:38'),
(184, 'admin', 'success', '94.200.145.138', '2017-06-04 08:18:03'),
(185, 'admin', 'success', '94.200.145.138', '2017-06-04 11:07:56'),
(186, 'admin', 'success', '94.200.145.138', '2017-06-04 12:17:30'),
(187, 'admin', 'success', '94.200.145.138', '2017-06-04 12:47:42'),
(188, 'admin', 'success', '94.200.145.138', '2017-06-04 12:47:42'),
(189, 'admin', 'success', '94.200.145.138', '2017-06-04 14:29:39'),
(190, 'admin', 'success', '94.200.145.138', '2017-06-04 14:33:56'),
(191, 'admin', 'success', '94.200.145.138', '2017-06-05 07:39:45'),
(192, 'admin', 'success', '94.200.145.138', '2017-06-05 09:40:58'),
(193, 'admin', 'success', '94.200.145.138', '2017-06-06 12:10:26'),
(194, 'admin', 'success', '86.98.86.52', '2017-06-12 05:33:21'),
(195, 'admin', 'success', '86.98.86.52', '2017-06-12 05:58:08'),
(196, 'admin', 'success', '94.200.145.138', '2017-06-12 07:49:09'),
(197, 'admin', 'success', '86.98.86.52', '2017-06-12 11:44:38'),
(198, 'admin', 'success', '94.200.145.138', '2017-06-12 12:22:07'),
(199, 'admin', 'success', '94.200.145.138', '2017-06-13 07:45:42'),
(200, 'admin', 'success', '94.200.145.138', '2017-06-14 08:21:24'),
(201, 'admin', 'success', '94.200.208.210', '2017-06-14 09:39:05'),
(202, 'admin', 'success', '94.200.145.138', '2017-06-14 10:31:36'),
(203, 'admin', 'success', '86.98.86.52', '2017-06-15 07:23:41'),
(204, 'admin', 'success', '94.200.145.138', '2017-06-15 08:12:23'),
(205, 'admin', 'success', '94.200.145.138', '2017-06-15 08:58:02'),
(206, 'admin', 'success', '86.98.86.52', '2017-06-15 09:23:15'),
(207, 'admin', 'success', '94.200.145.138', '2017-06-27 10:50:38'),
(208, 'admin', 'success', '2.51.32.76', '2017-06-30 16:21:42'),
(209, 'admin', 'success', '86.98.86.52', '2017-07-03 12:37:32'),
(210, 'admin', 'success', '94.200.145.138', '2017-07-03 14:12:12'),
(211, 'admin', 'success', '94.200.145.138', '2017-07-04 07:59:35'),
(212, 'admin', 'success', '86.98.86.52', '2017-07-04 10:08:37'),
(213, 'admin', 'success', '94.200.145.138', '2017-07-04 10:35:13'),
(214, 'admin', 'success', '94.200.145.138', '2017-07-04 12:36:30'),
(215, 'admin', 'success', '86.98.86.52', '2017-07-04 13:01:46'),
(216, 'admin', 'success', '94.200.145.138', '2017-07-04 14:58:50'),
(217, 'admin', 'success', '94.200.145.138', '2017-07-05 15:25:30'),
(218, 'admin', 'success', '94.200.145.138', '2017-07-09 07:30:22'),
(219, 'admin', 'success', '94.200.145.138', '2017-07-09 09:42:48'),
(220, 'admin', 'success', '94.200.145.138', '2017-07-09 12:08:43'),
(221, 'admin', 'success', '94.200.145.138', '2017-07-09 14:10:19'),
(222, 'admin', 'success', '94.200.145.138', '2017-07-10 07:59:23'),
(223, 'admin', 'success', '94.200.145.138', '2017-07-10 10:04:46'),
(224, 'admin', 'success', '94.200.145.138', '2017-07-10 12:05:55'),
(225, 'admin', 'success', '94.200.145.138', '2017-07-10 15:08:27'),
(226, 'admin', 'success', '94.200.145.138', '2017-07-11 07:26:06'),
(227, 'admin', 'success', '86.98.86.52', '2017-07-11 08:04:03'),
(228, 'admin', 'success', '94.200.145.138', '2017-07-11 09:26:59'),
(229, 'admin', 'success', '86.98.86.52', '2017-07-11 11:10:55'),
(230, 'admin', 'success', '94.200.145.138', '2017-07-17 14:59:52'),
(231, 'admin', 'success', '94.200.145.138', '2017-07-23 12:52:40'),
(232, 'admin', 'success', '94.200.145.138', '2017-07-25 10:52:11'),
(233, 'admin', 'success', '86.98.86.52', '2017-07-26 06:49:12'),
(234, 'admin', 'success', '86.98.86.52', '2017-07-26 06:49:12'),
(235, 'admin', 'success', '94.200.145.138', '2017-07-26 07:18:38'),
(236, 'admin', 'success', '86.98.86.52', '2017-07-26 09:40:51'),
(237, 'admin', 'success', '94.200.145.138', '2017-07-26 10:04:12'),
(238, 'admin', 'success', '86.98.86.52', '2017-07-26 11:43:46'),
(239, 'admin', 'success', '94.200.145.138', '2017-07-26 12:47:34'),
(240, 'admin', 'success', '86.98.86.52', '2017-07-27 12:14:31'),
(241, 'admin', 'success', '94.200.145.138', '2017-08-08 08:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `img_works`
--

CREATE TABLE `img_works` (
  `work_id` mediumint(15) NOT NULL,
  `work_name` varchar(500) NOT NULL,
  `work_date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `source_image` varchar(500) NOT NULL,
  `svg_file_name` varchar(500) NOT NULL,
  `thumb_file_name` varchar(500) NOT NULL,
  `work_area` text NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_works`
--

INSERT INTO `img_works` (`work_id`, `work_name`, `work_date`, `start_date`, `end_date`, `source_image`, `svg_file_name`, `thumb_file_name`, `work_area`, `last_updated`) VALUES
(91, 'June 2017', '2017-06-12', '2017-06-12', '2017-06-30', '', 'fbnWves0h.svg', 'thumb_lo9ISGm.png', '', '2017-06-12 12:06:06'),
(92, 'June 2017', '2017-06-15', '0000-00-00', '0000-00-00', '', 'GvUT4OhID.svg', 'thumb_CBateNk.png', '', '2017-06-15 09:06:10'),
(95, 'Test', '2017-06-15', '2017-07-04', '2017-07-27', '', 'ZzMn91BHY.svg', 'thumb_eorsKtD.png', '', '2017-06-15 09:06:15'),
(96, 'June 2017', '2017-06-15', '0000-00-00', '0000-00-00', '', 'TaA5jzSgQ.svg', 'thumb_M6vBRAC.png', '', '2017-06-15 11:06:30'),
(97, 'July 2013 Test', '2017-07-03', '0000-00-00', '0000-00-00', '', '4fBXIwjJk.svg', 'thumb_KX6Cv4a.png', '', '2017-07-11 10:07:44'),
(109, 'August 2017 1280X1024', '2017-07-27', '0000-00-00', '0000-00-00', '', 'D20LIzHvf.svg', 'thumb_cJi9NKT.png', '', '2017-07-27 12:07:30'),
(110, 'August 2017 1920X1080', '2017-07-27', '0000-00-00', '0000-00-00', '', 'o8pYsbl7I.svg', 'thumb_Wb8sHjA.png', '', '2017-07-27 12:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `img_work_resolution_images`
--

CREATE TABLE `img_work_resolution_images` (
  `id` mediumint(15) NOT NULL,
  `work_id` mediumint(15) NOT NULL,
  `image_name` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_work_resolution_images`
--

INSERT INTO `img_work_resolution_images` (`id`, `work_id`, `image_name`, `status`) VALUES
(150, 91, 'Screen-QOkyecnX1_1280X1024.png', 1),
(168, 95, 'Screen-ptQ7Xwyd4_1920X1080.png', 1),
(171, 92, 'Screen-DpKgbnxfv_1280X1024.png', 1),
(176, 96, 'Screen-x98D1iKec_1920X1080.png', 1),
(232, 97, 'Screen-DvsYn1oC8_1280X1024.png', 1),
(276, 109, 'Screen-gWMd1FI3J_1280X1024.png', 1),
(278, 110, 'Screen-JgMSm9leZ_1920X1080.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `img_categories`
--
ALTER TABLE `img_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_font_family`
--
ALTER TABLE `img_font_family`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_icon_set`
--
ALTER TABLE `img_icon_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_logo_set`
--
ALTER TABLE `img_logo_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_svg_templates`
--
ALTER TABLE `img_svg_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_users`
--
ALTER TABLE `img_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `img_user_logs`
--
ALTER TABLE `img_user_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `img_works`
--
ALTER TABLE `img_works`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `img_work_resolution_images`
--
ALTER TABLE `img_work_resolution_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img_categories`
--
ALTER TABLE `img_categories`
  MODIFY `id` mediumint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `img_font_family`
--
ALTER TABLE `img_font_family`
  MODIFY `id` mediumint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `img_icon_set`
--
ALTER TABLE `img_icon_set`
  MODIFY `id` mediumint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `img_logo_set`
--
ALTER TABLE `img_logo_set`
  MODIFY `id` mediumint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `img_svg_templates`
--
ALTER TABLE `img_svg_templates`
  MODIFY `id` mediumint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `img_users`
--
ALTER TABLE `img_users`
  MODIFY `user_id` mediumint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `img_user_logs`
--
ALTER TABLE `img_user_logs`
  MODIFY `id` mediumint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `img_works`
--
ALTER TABLE `img_works`
  MODIFY `work_id` mediumint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `img_work_resolution_images`
--
ALTER TABLE `img_work_resolution_images`
  MODIFY `id` mediumint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
