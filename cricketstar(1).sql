-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2017 at 06:17 PM
-- Server version: 5.7.18
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricketstar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `modified_time`) VALUES
(1, 'Admin', 'user@admin.com', '8ff89500a97a94ae9f3fbd5f15634376505783f2', '2017-04-05 10:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `appdetails`
--

CREATE TABLE `appdetails` (
  `id` bigint(20) NOT NULL,
  `appversion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appdetails`
--

INSERT INTO `appdetails` (`id`, `appversion`) VALUES
(1, '2.1');

-- --------------------------------------------------------

--
-- Table structure for table `assumptions`
--

CREATE TABLE `assumptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `scoreboard_id` int(10) UNSIGNED NOT NULL,
  `inning` tinyint(3) UNSIGNED NOT NULL,
  `overs` int(10) UNSIGNED DEFAULT '0',
  `session` varchar(100) DEFAULT NULL,
  `score1` smallint(3) UNSIGNED DEFAULT '0',
  `score2` smallint(3) UNSIGNED DEFAULT '0',
  `odd1` smallint(3) UNSIGNED DEFAULT '0',
  `odd2` smallint(3) UNSIGNED DEFAULT '0',
  `current_overs` varchar(10) NOT NULL DEFAULT '0.0',
  `current_scores` varchar(10) NOT NULL,
  `favorite` varchar(200) DEFAULT NULL,
  `rem_balls` int(5) DEFAULT NULL,
  `rem_runs` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assumptions`
--

INSERT INTO `assumptions` (`id`, `scoreboard_id`, `inning`, `overs`, `session`, `score1`, `score2`, `odd1`, `odd2`, `current_overs`, `current_scores`, `favorite`, `rem_balls`, `rem_runs`) VALUES
(27, 86, 1, 50, 'Session', 309, 310, 300, 309, '0.0', '', 'india', NULL, NULL),
(28, 87, 2, 47, 'Session', 272, 285, 285, 286, '0.0', '', 'india', NULL, NULL),
(29, 94, 1, 6, 'session', 45, 46, 45, 46, '0.0', '', 'Delhi', NULL, NULL),
(30, 94, 1, 20, 'Session', 100, 110, 100, 110, '0.0', '', 'Delhi', NULL, NULL),
(31, 102, 1, 5, 'session1', 45, 67, 34, 45, '0.0', '', 'Delhi', NULL, NULL),
(32, 112, 1, 6, 'Session', 48, 49, 76, 79, '0.0', '', 'Bowling', NULL, NULL),
(33, 112, 1, 10, 'session', 67, 68, 78, 79, '0.0', '', 'Bowling', NULL, NULL),
(34, 112, 1, 20, 'Lambi', 144, 145, 35, 37, '0.0', '', 'Bowling', NULL, NULL),
(36, 114, 1, 6, 'Session', 199, 200, 85, 86, '0.0', '', 'Star', NULL, NULL),
(37, 114, 1, 10, 'Session', 299, 200, 45, 47, '0.0', '', 'Bowling', NULL, NULL),
(38, 115, 2, 6, 'Session', 165, 166, 45, 47, '0.0', '', 'Bowling', NULL, NULL),
(41, 117, 2, 6, 'Session', 56, 57, 55, 66, '6', '40/0', 'CSK', NULL, NULL),
(42, 117, 2, 10, 'Session', 112, 113, 55, 57, '6.3', '50/1', 'Bowling', NULL, NULL),
(45, 117, 2, 12, 'Session', 58, 60, 90, 91, '13', '180/5', 'CSK', NULL, NULL),
(51, 117, 2, 20, 'Session', 88, 89, 88, 90, '12.4', '194/3', 'CSK', NULL, NULL),
(52, 126, 1, 10, 'Session', 85, 86, 45, 46, '8.4', '72/2', 'Aus', NULL, NULL),
(53, 126, 1, 15, 'Session', 30, 31, 78, 79, '10', '80/2', 'Aus', NULL, NULL),
(54, 127, 2, 6, '', 30, 32, 80, 81, '1', '0/1', 'Aus', NULL, NULL),
(55, 128, 1, 6, 'Session', 55, 56, 82, 87, '2.5', '25/0', 'aus', NULL, NULL),
(56, 129, 2, 6, 'Session', 56, 57, 74, 75, '0.1', '4/0', 'sri', NULL, NULL),
(57, 130, 1, 10, 'Session', 98, 99, 72, 75, '1', '28/0', 'Pak', NULL, NULL),
(58, 131, 2, 6, 'Session', 88, 89, 78, 79, '0.1', '4/0', 'India', NULL, NULL),
(59, 132, 1, 6, 'Session', 58, 89, 86, 89, '0.5', '23/0', 'England', NULL, NULL),
(60, 133, 2, 6, 'Session', 78, 79, 88, 89, '0.1', '4/0', 'England', NULL, NULL),
(61, 134, 1, 6, 'Session', 58, 59, 89, 90, '0.4', '9/0', 'Aus', NULL, NULL),
(62, 134, 1, 12, 'Session', 120, 121, 89, 90, '9.1', '77/0', 'Aus', NULL, NULL),
(63, 134, 1, 20, 'Session', 89, 90, 85, 86, '13.3', '119/0', 'Sri', NULL, NULL),
(64, 135, 2, 6, 'Session', 50, 55, 89, 90, '2.1', '6/0', 'Aus', NULL, NULL),
(65, 134, 2, 10, 'Session', 56, 57, 89, 90, '2', '15/0', 'Aus', NULL, NULL),
(66, 135, 2, 12, 'Session', 56, 57, 78, 79, '8.3', '108/0', 'Sri', NULL, NULL),
(67, 136, 1, 6, 'Session', 50, 51, 58, 59, '1.1', '11/0', 'KKR', NULL, NULL),
(68, 138, 1, 4, 'Lambi', 99, 100, 70, 72, '4', '62/4', 'India', NULL, NULL),
(69, 138, 1, 2, 'Session', 28, 45, 70, 72, '2', '29/2', 'India', NULL, NULL),
(70, 139, 2, 2, 'Session', 24, 25, 41, 42, '0.1', '1/0', 'India', NULL, NULL),
(71, 140, 1, 1, 'Session', 28, 29, 71, 72, '1', '14/2', 'INDIA', NULL, NULL),
(72, 142, 1, 1, 'Session', 30, 31, 78, 79, '0.1', '4/0', 'SRILANKA', NULL, NULL),
(73, 142, 2, 1, 'Session', 89, 90, 85, 86, '0.1', '4 /0', 'India', NULL, NULL),
(74, 144, 1, 1, 'Session', 30, 32, 88, 90, '1', '11/2', 'AUS', NULL, NULL),
(75, 145, 2, 1, 'Session', 41, 42, 50, 51, '0.5', '12/2', 'INDIA', NULL, NULL),
(76, 146, 1, 6, 'Session', 0, 0, 0, 0, '0.0', '0 /0', 'PAK', NULL, NULL),
(77, 147, 2, 6, 'Session', 40, 41, 85, 86, '0.0', '0 /0', 'Aus', NULL, NULL),
(78, 148, 1, 1, 'Session', 111, 12, 98, 99, '1', '24/1', 'KANCHIWALA', NULL, NULL),
(79, 149, 2, 1, 'Session', 88, 89, 98, 99, '1', '26/2', 'KANCHIWALA', NULL, NULL),
(80, 152, 1, 5, '', 345, 145, 67, 56, '67', '78', 'ind', NULL, NULL),
(81, 153, 2, 45, 'Session', 356, 57, 677, 78, '0.5', '21/0', 'ind', NULL, NULL),
(82, 156, 1, 10, 'Session', 141, 143, 22, 24, '10.3', '99/0', 'Aus', NULL, NULL),
(84, 156, 1, 0, '', 190, 191, 26, 28, '15.3', '138/2', 'aus', NULL, NULL),
(85, 157, 2, 40, 'Session', 334, 345, 56, 34, '39', '245 /6', 'Aus', NULL, NULL),
(86, 159, 2, 20, 'Session', 245, 260, 67, 78, '20', '190/5', 'Aus', NULL, NULL),
(87, 161, 2, 3, 'Session', 123, 134, 56, 67, '0.4', '25/0', 'Sri Lanka', NULL, NULL),
(89, 163, 2, 2, 'Session', 56, 56, 656, 566, '9.4', '144/0', 'Sri', NULL, NULL),
(90, 164, 1, 15, '', 65, 66, 56, 57, '33.1', '151/3', 'Afg', NULL, NULL),
(91, 166, 1, 6, 'Session', 56, 57, 65, 66, '5.2', '45/1', 'MI', NULL, NULL),
(92, 167, 2, 6, 'Session', 75, 76, 96, 97, '5.5', '50/2', 'SRH', NULL, NULL),
(93, 166, 1, NULL, 'Session', 0, 0, 89, 90, '6.2', '54 /1', 'MI', NULL, NULL),
(94, 167, 2, NULL, 'Session', 0, 0, 76, 78, '5.5', '50 /2', 'MI', NULL, NULL),
(95, 172, 1, 40, 'Session', 235, 236, 38, 40, '40', '235/4', 'SRILANKA', NULL, NULL),
(96, 172, 1, 50, 'Session', 313, 314, 41, 43, '50', '311/9', 'FAV-SRILANKA', NULL, NULL),
(97, 174, 1, 50, 'Session', 311, 312, 42, 45, '49.4', '311/10', 'FAV-SRILANKA', NULL, NULL),
(101, 175, 2, 0, 'Session', 0, 0, 0, 0, '0.2', '2/0', 'SRI', NULL, NULL),
(102, 177, 2, 0, 'Session', 0, 0, 0, 0, '0', '0', 'SRI', NULL, NULL),
(104, 177, 2, NULL, 'Session', 0, 0, 0, 0, '0.0', '0 /0', '', NULL, NULL),
(111, 181, 1, NULL, 'Session', NULL, NULL, NULL, NULL, '1', '25/0', '', NULL, NULL),
(112, 181, 1, NULL, 'Session', NULL, NULL, NULL, NULL, '6.2', '84/0', '', NULL, NULL),
(113, 181, 1, NULL, 'Session', NULL, NULL, NULL, NULL, '6.2', '84 /0', '', NULL, NULL),
(114, 181, 1, NULL, 'Session', NULL, NULL, NULL, NULL, '7.2', '104/0', '', NULL, NULL),
(115, 182, 1, 34, 'Session', 24, 244, 56, 69, '6.3', '92/0', 'kkr', NULL, NULL),
(116, 183, 2, 5, 'Session', 44, 56, 67, 78, '5', '125 /0', 'RCB', NULL, NULL),
(117, 183, 2, 10, 'Session', 54, 68, 89, 90, '5.4', '135/2', 'RCB', NULL, NULL),
(118, 197, 2, 5, 'Session', 45, 38, 89, 90, '0.5', '19/0', 'RPS', NULL, NULL),
(119, 198, 1, 6, 'Session', 55, 56, 79, 80, '1.2', '15/2', 'KKR', NULL, NULL),
(120, 198, 1, 10, 'Session', 59, 78, 78, 89, '1.2', '16 /2', 'MI', NULL, NULL),
(121, 200, 1, 6, 'Session', 88, 89, 55, 66, '2.2', '53/3', 'MI', NULL, NULL),
(122, 200, 1, 10, 'Session', 434, 356, 78, 90, '2.2', '54 /3', 'KKR', NULL, NULL),
(123, 200, 1, 20, 'Session', 145, 146, 67, 89, '11.2', '82/7', 'KKR', NULL, NULL),
(124, 202, 1, 15, 'Session', 50, 51, 80, 82, '15.4', '104/3', 'KKR', NULL, NULL),
(125, 202, 1, 20, 'Session', 67, 69, 67, 69, '15.4', '104/3', 'MI', NULL, NULL),
(126, 204, 1, 6, 'Session', 50, 51, 56, 70, '11.4', '182/4', 'West Indies', NULL, NULL),
(127, 205, 2, 6, 'Session', 45, 47, 56, 60, '2.4', '39/3', 'MI', NULL, NULL),
(128, 206, 1, 6, 'Session', 56, 57, 78, 79, '0.0', '0 /0', 'KKR', NULL, NULL),
(129, 208, 1, 6, 'Session', 51, 52, 92, 95, '1.2', '27/1', 'SRH', NULL, NULL),
(130, 210, 1, 6, 'Session', 0, 0, 86, 91, '0.4', '11/0', 'RCB', NULL, NULL),
(131, 218, 1, 6, 'Session', 65, 75, 89, 92, '7.2', '101/8', 'KKR', -8, -26),
(132, 219, 2, 6, 'Session', 0, 0, 56, 60, '2.2', '42/0', 'MI', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balldetails`
--

CREATE TABLE `balldetails` (
  `id` int(11) NOT NULL,
  `scoreboard_id` int(11) NOT NULL,
  `ball_one` varchar(255) DEFAULT NULL,
  `ball_two` varchar(255) DEFAULT NULL,
  `ball_three` varchar(255) DEFAULT NULL,
  `ball_four` varchar(255) DEFAULT NULL,
  `ball_five` varchar(255) DEFAULT NULL,
  `ball_six` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balldetails`
--

INSERT INTO `balldetails` (`id`, `scoreboard_id`, `ball_one`, `ball_two`, `ball_three`, `ball_four`, `ball_five`, `ball_six`) VALUES
(1, 218, '2', '4wb', '2nb', 'W', '5', '4');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` varchar(600) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(11) NOT NULL,
  `over` varchar(10) NOT NULL DEFAULT '0.0',
  `score` varchar(100) NOT NULL,
  `playing_team` varchar(200) NOT NULL,
  `match_id` int(11) NOT NULL,
  `innings` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `over`, `score`, `playing_team`, `match_id`, `innings`) VALUES
(2, '12.3', '206/3', 'India', 126, 1),
(6, '32.5', '410/4', 'India', 126, 1),
(15, '50', '290/6', 'Aus', 126, 1),
(16, '50', '350/6', 'England', 126, 2),
(17, '6', '92/2', 'India', 127, 1),
(18, '10', '101/3', 'India', 127, 1),
(19, '6', '45/3', 'Pakistan', 127, 2),
(20, '20', '200/5', 'Ind', 127, 1),
(21, '20', '185/8', 'Pak', 127, 2),
(22, '25', '215/5', 'India', 127, 1),
(23, '25', '200/6', 'Pak', 127, 2),
(24, '30', '300/5', 'India', 127, 1),
(25, '30', '230/7', 'Pak', 127, 2),
(26, '6', '42/3', 'HH', 129, 1),
(27, '10', '81/3', 'HH', 129, 1),
(28, '20', '188/4', 'HH', 129, 1),
(29, '6', '56/0', 'India', 130, 1),
(30, '10', '85/2', 'India', 130, 1),
(31, '20', '157/4', 'india', 130, 1),
(32, '10', '60/2', 'Thunder', 134, 1),
(33, '6', '48/3', 'strikers', 149, 1),
(34, '10', '67/3', 'Strikers', 149, 1),
(35, '20', '143/10', 'strikers', 149, 1),
(40, '6', '103/3', 'Star', 150, 1),
(41, '10', '157/3', 'Star', 150, 1),
(42, '6', '81/2', 'Banglore', 151, 2),
(43, '6', '80/2', 'Banglore', 151, 2),
(44, '4', '62/4', 'India', 162, 1),
(45, '1', '24/1', 'KIMSAR', 167, 1),
(46, '6', '62/0', 'AUSTRALIA', 171, 1),
(47, '10', '93/0', 'AUSTRALIA', 171, 1),
(48, '1', '38/0', 'Australlia', 172, 1),
(49, '1.2', '43/0', 'Si Lanka', 174, 2),
(50, '9.0', '100/0', 'Si Lanka', 174, 2),
(51, '50', '311/10', 'SRILANKA', 179, 1),
(52, '3.4', '81/0', 'Team1', 183, 1);

-- --------------------------------------------------------

--
-- Table structure for table `innings`
--

CREATE TABLE `innings` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_id` int(10) UNSIGNED NOT NULL,
  `inning` varchar(100) NOT NULL,
  `target_team` varchar(100) DEFAULT NULL,
  `overs` varchar(100) DEFAULT NULL,
  `score` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `innings`
--

INSERT INTO `innings` (`id`, `match_id`, `inning`, `target_team`, `overs`, `score`) VALUES
(1, 62, '1', NULL, '39', '350/7'),
(2, 63, '2', NULL, '2.4', '40/8'),
(3, 64, '1', '', '', ''),
(4, 66, '1', 'India', '24.4', '378/12'),
(5, 72, '1', 'HH', '20', '188/4'),
(6, 74, '1', 'India', '18.4', '157/4'),
(7, 86, '1', 'india', '50', '311'),
(8, 112, '1', 'strikers', '20', '143/10'),
(9, 114, '1', 'Star', '10', '157/3'),
(10, 116, '1', '', '', ''),
(11, 127, '1', 'Aus', '20', '179/10'),
(12, 126, '1', 'AUS', '20', '179/10'),
(13, 131, '2', 'Pak', '0.1', '4/0'),
(14, 133, '2', '', '0.1', '4/0'),
(15, 134, '1', 'Sri', '14.5', '145/0'),
(16, 139, '2', '', '0.1', '1/0'),
(17, 140, '1', 'INDIA', '1', '14/2'),
(18, 144, '1', 'AUS', '1', '11/2'),
(19, 145, '2', 'INDIA', '0.5', '12/2'),
(20, 146, '1', 'Pak', '1.1', '12/0'),
(21, 147, '2', 'Aus', '1', '8/0'),
(22, 148, '1', 'KIMSAR', '1', '24/1'),
(23, 149, '2', 'KANCHIWALA', '1', '26/2'),
(24, 150, '1', '', '0.2', '13/0'),
(25, 151, '2', '', '0.1', '4/0'),
(26, 152, '1', 'Ind', '0.2', '8/0'),
(27, 156, '1', 'Australlia', '50', '360/2'),
(28, 158, '1', 'Australlia', '50', '380/5'),
(29, 161, '2', '', '0.2', '12/0'),
(30, 160, '1', 'Sri Lanka', '1.2', '56/0'),
(31, 162, '1', 'Australlia', '11.1', '120/0'),
(32, 166, '1', 'MI', '20', '145/8'),
(33, 175, '2', 'BANGLADESH', '0.2', '2/0'),
(34, 174, '1', '', '49.4', '311/10'),
(35, 176, '1', 'SRI', '49.4', '311/10'),
(36, 180, '1', 'Team1', '17.2', '289/9'),
(37, 182, '1', 'KKR', '20', '92/0'),
(38, 182, '1', 'KKR', '20', '250/7'),
(39, 197, '2', '', '0.1', '3/0'),
(40, 196, '1', 'RPS', '20', '263/5'),
(41, 204, '1', 'MI', '20', '182/4'),
(42, 218, '1', '', '2', '43/2');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `teams` varchar(200) NOT NULL,
  `team1` int(10) NOT NULL,
  `team2` int(10) NOT NULL,
  `team1_name` varchar(200) NOT NULL,
  `team1_image` varchar(200) DEFAULT NULL,
  `team2_name` varchar(200) NOT NULL,
  `team2_image` varchar(200) DEFAULT NULL,
  `tournament` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `teams`, `team1`, `team2`, `team1_name`, `team1_image`, `team2_name`, `team2_image`, `tournament`) VALUES
(91, 'Zimbabwe vs Kenya', 32, 33, 'Zimbabwe', NULL, 'Kenya', NULL, ''),
(93, 'Zimbabwe vs Kenya', 32, 33, 'Zimbabwe', NULL, 'Kenya', NULL, ''),
(94, 'Zimbabwe vs Oman', 32, 25, 'Zimbabwe', NULL, 'Oman', NULL, ''),
(96, 'Scotland vs New York', 36, 35, 'Scotland', NULL, 'New York', NULL, ''),
(97, 'India vs Pakistan', 1, 20, 'India', NULL, 'Pakistan', NULL, ''),
(98, 'India vs Australia', 1, 2, 'India', NULL, 'Australia', NULL, ''),
(99, 'India vs Oman', 1, 25, 'India', NULL, 'Oman', NULL, ''),
(100, 'Pakistan vs Australia', 20, 2, 'Pakistan', NULL, 'Australia', NULL, ''),
(101, 'Australia vs Ireland', 2, 22, 'Australia', NULL, 'Ireland', NULL, ''),
(103, 'Switzerland vs Oman', 37, 25, 'Switzerland', NULL, 'Oman', NULL, ''),
(104, 'Switzerland vs Scotland', 37, 36, 'Switzerland', NULL, 'Scotland', NULL, ''),
(105, 'Bangladesh vs SouthAfrica', 26, 24, 'Bangladesh', NULL, 'SouthAfrica', NULL, ''),
(108, 'Bangladesh vs England', 26, 38, 'Bangladesh', NULL, 'England', NULL, ''),
(109, 'Bangladesh vs Pakistan', 26, 20, 'Bangladesh', NULL, 'Pakistan', NULL, ''),
(110, 'Australia vs New Zealand', 2, 29, 'Australia', NULL, 'New Zealand', NULL, ''),
(111, 'Australia vs England', 2, 38, 'Australia', NULL, 'England', NULL, ''),
(112, 'India vs Scotland', 1, 36, 'India', NULL, 'Scotland', NULL, ''),
(113, 'Scotland vs Kenya', 36, 33, 'Scotland', NULL, 'Kenya', NULL, ''),
(114, 'Kenya vs Oman', 33, 25, 'Kenya', NULL, 'Oman', NULL, ''),
(115, 'India vs Kenya', 1, 33, 'India', NULL, 'Kenya', NULL, ''),
(116, 'Kenya vs Zimbabwe', 33, 32, 'Kenya', NULL, 'Zimbabwe', NULL, ''),
(117, 'Kenya vs Soctland', 33, 39, 'Kenya', NULL, 'Soctland', NULL, ''),
(118, 'Kenya vs Oman', 33, 25, 'Kenya', NULL, 'Oman', NULL, ''),
(120, 'Oman vs England', 25, 38, 'Oman', NULL, 'England', NULL, ''),
(121, 'England vs Australia', 38, 2, 'England', NULL, 'Australia', NULL, ''),
(124, 'India vs England', 1, 38, 'India', NULL, 'England', NULL, ''),
(125, 'India vs Pakistan', 1, 20, 'India', NULL, 'Pakistan', NULL, ''),
(126, 'India vs Australia', 1, 2, 'India', NULL, 'Australia', NULL, ''),
(127, 'India vs Pakistan', 1, 20, 'India', NULL, 'Pakistan', NULL, ''),
(128, 'India vs Australia', 1, 2, 'India', NULL, 'Australia', NULL, ''),
(129, 'Team A vs Team B', 40, 41, 'Team A', NULL, 'Team B', NULL, ''),
(130, 'India vs Aus', 1, 42, 'India', NULL, 'Aus', NULL, ''),
(131, 'India vs Pakistan', 1, 20, 'India', NULL, 'Pakistan', NULL, ''),
(132, 'India vs Aus', 1, 42, 'India', NULL, 'Aus', NULL, ''),
(133, 'India vs Eng', 1, 43, 'India', NULL, 'Eng', NULL, ''),
(134, 'THUNDER vs BH', 44, 45, 'THUNDER', NULL, 'BH', NULL, ''),
(136, 'india vs australia', 1, 2, 'india', NULL, 'australia', NULL, 'worldcup'),
(137, 'India vs Nz', 1, 47, 'India', NULL, 'Nz', NULL, 'T20'),
(138, 'Bangluru vs Delhi', 48, 49, 'Bangluru', NULL, 'Delhi', NULL, 'Chinna swami stadium IPL 2017'),
(139, 'delhi vs punjab', 49, 50, 'delhi', NULL, 'punjab', NULL, 'ipl'),
(140, 'Delhi vs bangluru', 49, 48, 'Delhi', NULL, 'bangluru', NULL, 'ipl 2017'),
(141, 'punjab vs pune', 50, 51, 'punjab', NULL, 'pune', NULL, 'ipl'),
(142, 'kkr vs csk', 52, 53, 'kkr', NULL, 'csk', NULL, 'ipl 2017'),
(143, 'pankaj vs ajay', 54, 55, 'pankaj', NULL, 'ajay', NULL, 'ipl'),
(144, 'punjab vs delhi', 50, 49, 'punjab', NULL, 'delhi', NULL, 'ipl 2017'),
(145, 'kkr vs csk', 52, 53, 'kkr', NULL, 'csk', NULL, 'ipl'),
(146, 'RPS vs GL', 56, 57, 'RPS', NULL, 'GL', NULL, 'IPL 2017'),
(147, 'inf vs rdt', 58, 59, 'inf', NULL, 'rdt', NULL, 'ipl 2017'),
(148, 'fgdg vs ccvxcv', 60, 61, 'fgdg', NULL, 'ccvxcv', NULL, 'ipl'),
(149, 'Smart vs Lion', 62, 63, 'Smart', NULL, 'Lion', NULL, 'Big Bash'),
(150, 'Star vs Bulls', 64, 65, 'Star', NULL, 'Bulls', NULL, 'Big Clash'),
(151, 'CSK vs Bangluru', 53, 48, 'CSK', NULL, 'Bangluru', NULL, 'IPL 2017 CSK VS Bangluru'),
(152, 'Australia vs Srilanka', 2, 21, 'Australia', NULL, 'Srilanka', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(153, 'Australia vs Srilanka', 2, 21, 'Australia', NULL, 'Srilanka', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(154, 'aus vs srilanka', 42, 21, 'aus', NULL, 'srilanka', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(155, 'AUSTRALIA vs SRILANKA', 2, 21, 'AUSTRALIA', NULL, 'SRILANKA', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(156, 'Australia vs Srilanka', 2, 21, 'Australia', NULL, 'Srilanka', NULL, 'T20 Simonds Stadium,South Geelong,Victoria'),
(157, 'aus vs srilanka', 42, 21, 'aus', NULL, 'srilanka', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(158, 'india vs pak', 1, 66, 'india', NULL, 'pak', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(159, 'SouthAfrica vs England', 24, 38, 'SouthAfrica', NULL, 'England', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(160, 'Aus vs Sri', 42, 67, 'Aus', NULL, 'Sri', NULL, 'T20 Perth'),
(161, 'KKR vs RR', 52, 68, 'KKR', NULL, 'RR', NULL, 'T20 Delhi'),
(162, 'India vs Srilanka', 1, 21, 'India', NULL, 'Srilanka', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(163, 'PAK vs IND', 66, 69, 'PAK', NULL, 'IND', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(164, 'SRILANKA vs INDIA', 21, 1, 'SRILANKA', NULL, 'INDIA', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(165, 'INDIA vs AUS', 1, 42, 'INDIA', NULL, 'AUS', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(166, 'Aus vs Pak', 42, 66, 'Aus', NULL, 'Pak', NULL, 'T20 Perth'),
(167, 'KIMSAR vs KANCHIWALA', 70, 71, 'KIMSAR', NULL, 'KANCHIWALA', NULL, 'T20 Simonds Stadium,South Geelong,Victoria '),
(168, ' vs Ban', 72, 73, '', NULL, 'Ban', NULL, 'Ind'),
(169, 'Ind vs Ned', 69, 74, 'Ind', NULL, 'Ned', NULL, 'Ind '),
(170, ' vs Aus', 72, 42, '', NULL, 'Aus', NULL, 'Ind'),
(171, 'AUSTRALIA vs SRILANKA', 2, 21, 'AUSTRALIA', NULL, 'SRILANKA', NULL, 'AUSTRALIA CRICKET GROUNDA'),
(172, 'Australlia vs Sri Lanka', 75, 76, 'Australlia', NULL, 'Sri Lanka', NULL, 'Australlia Cricket Ground'),
(173, 'Sri Lanka vs Bangladesh', 76, 26, 'Sri Lanka', NULL, 'Bangladesh', NULL, 'Australlia Cricket Ground'),
(174, 'Sri Lanka vs Australlia', 76, 75, 'Sri Lanka', NULL, 'Australlia', NULL, 'Australlia Cricket Ground'),
(175, 'Afg vs IRE', 77, 78, 'Afg', NULL, 'IRE', NULL, 'T 20'),
(176, 'MI vs SRH', 79, 80, 'MI', NULL, 'SRH', NULL, 'IPL MI v SRH, Wankhede Stadium, Mumbai'),
(177, 'SRI vs BANG', 67, 81, 'SRI', NULL, 'BANG', NULL, 'T 20'),
(178, 'sri vs bang', 67, 81, 'sri', NULL, 'bang', NULL, 'T 20'),
(179, 'SRILANKA vs BANGLADESH', 21, 26, 'SRILANKA', NULL, 'BANGLADESH', NULL, 'ONE DAY CUP'),
(180, 'SRILANKA vs BANGLADESH', 21, 26, 'SRILANKA', NULL, 'BANGLADESH', NULL, 'ONE DAY CUP'),
(181, 'SRI vs BANG', 67, 81, 'SRI', NULL, 'BANG', NULL, 'SRI VS BANG ODI'),
(182, 'West Indies vs Pakistan', 82, 20, 'West Indies', NULL, 'Pakistan', NULL, '2nd T20 Port of Spain'),
(183, 'SH vs RCB', 83, 84, 'SH', NULL, 'RCB', NULL, 'IPL 2017 SH Vs RCB'),
(184, 'RCB vs KKR', 84, 52, 'RCB', NULL, 'KKR', NULL, 'IPL 2017'),
(185, 'rcb vs mi', 84, 79, 'rcb', NULL, 'mi', NULL, 'ipl'),
(186, 'kkr vs mi', 52, 79, 'kkr', NULL, 'mi', NULL, 'ipl'),
(187, 'kkr vs mi', 52, 79, 'kkr', '/img/teams/kkr.png', 'mi', '/img/teams/mi.png', 'ipl'),
(188, 'Rcb vs Gurat', 84, 85, 'Rcb', NULL, 'Gurat', NULL, 'ipl2017'),
(189, 'sh vs rps', 83, 56, 'sh', NULL, 'rps', NULL, 'iplnew'),
(190, 'sh vs rps', 83, 56, 'sh', 'recording.soarlogic.com/img/teams/reserveplan-dashboard_20170208_102618.jpg', 'rps', 'recording.soarlogic.com/img/teams/Increase length a bit for poster.png', 'iplnew'),
(191, 'rps vs mi', 56, 79, 'rps', 'http://recording.soarlogic.com/img/teams/e44103ec9aa319d9eda10a0bd55da175.jpg', 'mi', 'http://recording.soarlogic.com/img/teams/Mumbai-Indians-Logo.jpg', 'ipl2017 new match'),
(192, 'KKR vs MI', 52, 79, 'KKR', 'http://recording.soarlogic.com/img/teams/kkr.png', 'MI', 'http://recording.soarlogic.com/img/teams/mi.png', 'IPL 2017, 24TH MATCH'),
(193, 'KKR vs MI', 52, 79, 'KKR', 'http://recording.soarlogic.com/img/teams/kkr.png', 'MI', 'http://recording.soarlogic.com/img/teams/mi.png', 'IPL'),
(194, 'MI vs KKR', 79, 52, 'MI', 'http://recording.soarlogic.com/img/teams/mi.png', 'KKR', 'http://recording.soarlogic.com/img/teams/kkr.png', 'IPL 2017'),
(195, 'MI vs KKR', 79, 52, 'MI', 'http://recording.soarlogic.com/img/teams/mi.png', 'KKR', 'http://recording.soarlogic.com/img/teams/kkr.png', 'IPL 2017, 21st Match'),
(196, 'GUJ vs KKR', 86, 52, 'GUJ', 'http://recording.soarlogic.com/img/teams/gl.png', 'KKR', 'http://recording.soarlogic.com/img/teams/kkr.png', 'IPL 2017, 23RD MATCH'),
(197, 'SRH vs RCB', 80, 84, 'SRH', 'http://recording.soarlogic.com/img/teams/sun.png', 'RCB', 'http://recording.soarlogic.com/img/teams/rcb.png', 'IPL 2017,24 MATCH IN KANPUR GREEN PARK STADIUM'),
(198, 'RCB vs PUNE', 84, 51, 'RCB', 'http://recording.soarlogic.com/img/teams/rcb.png', 'PUNE', 'http://recording.soarlogic.com/img/teams/pune.png', 'IPL, 2017 GREEN PARK KANPUR'),
(199, 'KKR vs RCB', 52, 84, 'KKR', NULL, 'RCB', NULL, 'IPL 2017'),
(200, 'KKR vs MI', 52, 79, 'KKR', NULL, 'MI', NULL, 'IPL 2017'),
(201, 'KKR vs MI', 52, 79, 'KKR', 'http://recording.soarlogic.com/img/teams/kkr.png', 'MI', 'http://recording.soarlogic.com/img/teams/mi.png', 'IPL 2017'),
(202, 'Mi vs Pune', 79, 51, 'Mi', 'http://recording.soarlogic.com/img/teams/mi.png', 'Pune', 'http://recording.soarlogic.com/img/teams/pune.png', 'Icc championship trophy');

-- --------------------------------------------------------

--
-- Table structure for table `scoreboard`
--

CREATE TABLE `scoreboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `match_id` int(10) UNSIGNED NOT NULL,
  `team1` int(10) UNSIGNED NOT NULL,
  `team2` int(10) UNSIGNED NOT NULL,
  `innings_over` tinyint(1) NOT NULL DEFAULT '0',
  `inning` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `team` varchar(255) NOT NULL,
  `runs` smallint(6) NOT NULL DEFAULT '0',
  `overs` varchar(10) NOT NULL DEFAULT '0.0',
  `wickets` tinyint(3) UNSIGNED NOT NULL,
  `fav_team` varchar(100) DEFAULT NULL,
  `winner_team` varchar(100) DEFAULT NULL,
  `match_detail` longtext,
  `ball_status` varchar(100) DEFAULT NULL,
  `session_detail` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoreboard`
--

INSERT INTO `scoreboard` (`id`, `match_id`, `team1`, `team2`, `innings_over`, `inning`, `team`, `runs`, `overs`, `wickets`, `fav_team`, `winner_team`, `match_detail`, `ball_status`, `session_detail`) VALUES
(1, 1, 1, 2, 1, 1, 'India vs Pak', 18, '3', 0, NULL, '', NULL, NULL, NULL),
(2, 1, 1, 2, 1, 2, 'India vs Aus', 38, '4', 12, NULL, NULL, NULL, NULL, NULL),
(4, 91, 32, 33, 0, 1, 'Zimbabwe vs Kenya', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(5, 91, 32, 33, 0, 2, 'Zimbabwe vs Kenya', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(6, 93, 32, 33, 0, 1, 'Zimbabwe vs Kenya', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(7, 93, 32, 33, 0, 2, 'Zimbabwe vs Kenya', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(8, 94, 32, 25, 0, 1, 'Zimbabwe vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(9, 94, 32, 25, 0, 2, 'Zimbabwe vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(10, 96, 36, 35, 0, 1, 'Scotland vs New York', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(11, 96, 36, 35, 0, 2, 'Scotland vs New York', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(12, 97, 1, 20, 0, 1, 'India vs Pakistan', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(13, 97, 1, 20, 0, 2, 'India vs Pakistan', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(14, 98, 1, 2, 0, 1, 'India vs Australia', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(15, 98, 1, 2, 0, 2, 'India vs Australia', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(16, 99, 1, 25, 0, 1, 'India vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(17, 99, 1, 25, 0, 2, 'India vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(18, 100, 20, 2, 0, 1, 'Pakistan vs Australia', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(19, 100, 20, 2, 0, 2, 'Pakistan vs Australia', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(20, 101, 2, 22, 0, 1, 'Australia vs Ireland', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(21, 101, 2, 22, 0, 2, 'Australia vs Ireland', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(22, 103, 37, 25, 0, 1, 'Switzerland vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(23, 103, 37, 25, 0, 2, 'Switzerland vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(24, 104, 37, 36, 0, 1, 'Switzerland vs Scotland', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(25, 104, 37, 36, 0, 2, 'Switzerland vs Scotland', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(26, 105, 26, 24, 0, 1, 'Bangladesh vs SouthAfrica', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(27, 105, 26, 24, 0, 2, 'Bangladesh vs SouthAfrica', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(32, 108, 26, 38, 0, 1, 'Bangladesh vs England', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(33, 108, 26, 38, 0, 2, 'Bangladesh vs England', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(34, 109, 26, 20, 0, 1, 'Bangladesh vs Pakistan', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(35, 109, 26, 20, 0, 2, 'Bangladesh vs Pakistan', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(36, 110, 2, 29, 0, 1, 'Australia vs New Zealand', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(37, 110, 2, 29, 0, 2, 'Australia vs New Zealand', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(38, 111, 2, 38, 0, 1, 'Australia vs England', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(39, 111, 2, 38, 0, 2, 'Australia vs England', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(40, 112, 1, 36, 0, 1, 'India vs Scotland', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(41, 112, 1, 36, 0, 2, 'India vs Scotland', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(42, 113, 36, 33, 0, 1, 'Scotland vs Kenya', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(43, 113, 36, 33, 0, 2, 'Scotland vs Kenya', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(44, 114, 33, 25, 0, 1, 'Kenya vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(45, 114, 33, 25, 0, 2, 'Kenya vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(46, 115, 1, 33, 0, 1, 'India vs Kenya', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(47, 115, 1, 33, 0, 2, 'India vs Kenya', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(48, 116, 33, 32, 0, 1, 'Kenya vs Zimbabwe', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(49, 116, 33, 32, 0, 2, 'Kenya vs Zimbabwe', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(50, 117, 33, 39, 0, 1, 'Kenya vs Soctland', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(51, 117, 33, 39, 0, 2, 'Kenya vs Soctland', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(52, 118, 33, 25, 0, 1, 'Kenya vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(53, 118, 33, 25, 0, 2, 'Kenya vs Oman', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(54, 120, 25, 38, 0, 1, 'Oman vs England', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(55, 120, 25, 38, 0, 2, 'Oman vs England', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(56, 121, 38, 2, 0, 1, 'England vs Australia', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(57, 121, 38, 2, 0, 2, 'England vs Australia', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(62, 124, 1, 38, 0, 1, 'India vs England', 350, '50', 7, NULL, NULL, NULL, NULL, NULL),
(63, 124, 1, 38, 1, 2, 'India vs England', 40, '2.4', 8, NULL, NULL, NULL, NULL, NULL),
(64, 125, 1, 20, 1, 1, 'India vs Pakistan', 206, '12.3', 2, NULL, '', NULL, NULL, NULL),
(66, 126, 1, 2, 1, 1, 'India vs Australia', 0, '0', 0, NULL, '', NULL, NULL, NULL),
(67, 126, 1, 2, 0, 2, 'India vs Australia', 30, '0.5', 0, NULL, NULL, NULL, NULL, NULL),
(68, 127, 1, 20, 0, 1, 'India vs Pakistan', 98, '6', 2, NULL, '', NULL, NULL, NULL),
(69, 127, 1, 20, 0, 2, 'India vs Pakistan', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(70, 128, 1, 2, 0, 1, 'India vs Australia', 59, '3.1', 0, NULL, '', NULL, NULL, NULL),
(71, 128, 1, 2, 0, 2, 'India vs Australia', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(72, 129, 40, 41, 1, 1, 'HH vs STARS', 188, '20', 4, NULL, '', NULL, NULL, NULL),
(73, 129, 40, 41, 0, 2, 'HH Vs STARS', 70, '5.1', 2, NULL, NULL, NULL, NULL, NULL),
(74, 130, 1, 42, 1, 1, 'India vs Aus', 157, '18.4', 4, NULL, NULL, NULL, NULL, NULL),
(75, 130, 1, 42, 1, 2, 'India vs Aus', 99, '8.1', 3, NULL, NULL, NULL, NULL, NULL),
(76, 131, 1, 20, 1, 1, 'India vs Pakistan', 66, '2.4', 0, NULL, NULL, NULL, NULL, NULL),
(77, 131, 1, 20, 1, 2, 'India vs Pakistan', 17, '0.4', 0, NULL, NULL, NULL, NULL, NULL),
(78, 132, 1, 42, 1, 1, 'India vs Aus', 51, '1.2', 0, NULL, NULL, NULL, NULL, NULL),
(79, 132, 1, 42, 1, 2, 'India vs Aus', 29, '1.2', 0, NULL, NULL, NULL, NULL, NULL),
(80, 133, 1, 43, 1, 1, 'India vs Eng', 54, '2.1', 0, NULL, NULL, NULL, NULL, NULL),
(81, 133, 1, 43, 1, 2, 'India vs Eng', 48, '3.1', 0, NULL, NULL, NULL, NULL, NULL),
(82, 134, 44, 45, 0, 1, 'THUNDER vs BH', 110, '16', 4, NULL, NULL, NULL, NULL, NULL),
(83, 134, 44, 45, 0, 2, 'THUNDER vs BH', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(86, 136, 1, 2, 1, 1, 'worldcup', 323, '50', 7, NULL, NULL, NULL, NULL, NULL),
(87, 136, 1, 2, 0, 2, 'worldcup', 287, '47.5', 8, NULL, NULL, NULL, NULL, NULL),
(88, 137, 1, 47, 0, 1, 'India vs Nz', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(89, 137, 1, 47, 0, 2, 'India vs Nz', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(90, 138, 48, 49, 0, 1, 'Chinna swami stadium IPL 2017', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(91, 138, 48, 49, 0, 2, 'Bangluru vs Delhi', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(92, 139, 49, 50, 0, 1, 'delhi vs punjab', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(93, 139, 49, 50, 0, 2, 'delhi vs punjab', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(94, 140, 49, 48, 0, 1, 'Delhi vs Banglore', 14, '0.5', 0, NULL, NULL, NULL, NULL, NULL),
(95, 140, 49, 48, 0, 2, 'Delhi vs bangluru', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(96, 141, 50, 51, 0, 1, 'punjab vs pune', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(97, 141, 50, 51, 0, 2, 'punjab vs pune', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(98, 142, 52, 53, 0, 1, 'kkr vs csk', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(99, 142, 52, 53, 0, 2, 'kkr vs csk', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(100, 143, 54, 55, 0, 1, 'pankaj vs ajay', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(101, 143, 54, 55, 0, 2, 'pankaj vs ajay', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(102, 144, 50, 49, 0, 1, 'ipl 2017', 48, '1.4', 0, NULL, NULL, NULL, NULL, NULL),
(103, 144, 50, 49, 0, 2, 'punjab vs delhi', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(104, 145, 52, 53, 0, 1, 'kkr vs csk', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(105, 145, 52, 53, 0, 2, 'kkr vs csk', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(106, 146, 56, 57, 0, 1, 'RPS vs GL', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(107, 146, 56, 57, 0, 2, 'RPS vs GL', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(108, 147, 58, 59, 0, 1, 'inf vs rdt', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(109, 147, 58, 59, 0, 2, 'inf vs rdt', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(110, 148, 60, 61, 0, 1, 'fgdg vs ccvxcv', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(111, 148, 60, 61, 0, 2, 'fgdg vs ccvxcv', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(112, 149, 62, 63, 1, 1, 'Big Bash', 143, '20', 10, NULL, NULL, NULL, NULL, NULL),
(113, 149, 62, 63, 0, 2, 'Hobert vs strikers', 1, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(114, 150, 64, 65, 1, 1, 'Star vs Titans', 90, '5.3', 2, NULL, NULL, NULL, NULL, NULL),
(115, 150, 64, 65, 1, 2, 'Star vs Bulls', 44, '2.1', 2, NULL, NULL, NULL, NULL, NULL),
(116, 151, 53, 48, 1, 1, 'Aus vs Srilanka', 1, '', 0, NULL, NULL, NULL, NULL, NULL),
(117, 151, 53, 48, 1, 2, 'Aus vs srilanka', 0, '', 0, NULL, NULL, NULL, NULL, NULL),
(118, 152, 2, 21, 0, 1, 'Australia vs Srilanka', 4, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(119, 152, 2, 21, 0, 2, 'Australia vs Srilanka', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(120, 153, 2, 21, 0, 1, 'Australia vs Srilanka', 8, '0.2', 0, NULL, NULL, NULL, NULL, NULL),
(121, 153, 2, 21, 0, 2, 'Australia vs Srilanka', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(122, 154, 42, 21, 0, 1, 'aus vs srilanka', 4, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(123, 154, 42, 21, 0, 2, 'aus vs srilanka', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(124, 155, 2, 21, 0, 1, 'AUSTRALIA vs SRILANKA', 4, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(125, 155, 2, 21, 0, 2, 'AUSTRALIA vs SRILANKA', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(126, 156, 2, 21, 1, 1, 'Australia vs Srilanka', 80, '10', 2, NULL, NULL, NULL, NULL, NULL),
(127, 156, 2, 21, 1, 2, 'Australia vs Srilanka', 0, '2.5', 1, NULL, NULL, NULL, NULL, NULL),
(128, 157, 42, 21, 1, 1, 'aus vs srilanka', 25, '2.5', 0, NULL, NULL, NULL, NULL, NULL),
(129, 157, 42, 21, 0, 2, 'aus vs srilanka', 4, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(130, 158, 1, 66, 1, 1, 'india vs pak', 28, '1', 0, NULL, NULL, NULL, NULL, NULL),
(131, 158, 1, 66, 0, 2, 'india vs pak', 4, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(132, 159, 24, 38, 1, 1, 'SouthAfrica vs England', 44, '1.3', 0, NULL, NULL, NULL, NULL, NULL),
(133, 159, 24, 38, 0, 2, 'SouthAfrica vs England', 4, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(134, 160, 42, 67, 1, 1, 'Aus vs Sri', 145, '14.5', 0, NULL, NULL, NULL, NULL, NULL),
(135, 160, 42, 67, 1, 2, 'Aus vs Sri', 108, '8.3', 0, NULL, NULL, NULL, NULL, NULL),
(136, 161, 52, 68, 0, 1, 'KKR vs RR', 11, '1.1', 0, NULL, NULL, NULL, NULL, NULL),
(137, 161, 52, 68, 0, 2, 'KKR vs RR', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(138, 162, 1, 21, 1, 1, 'India vs Srilanka', 62, '4', 4, NULL, NULL, NULL, NULL, NULL),
(139, 162, 1, 21, 0, 2, 'India vs Srilanka', 1, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(140, 163, 66, 69, 1, 1, 'PAK vs IND', 14, '1', 2, NULL, NULL, NULL, NULL, NULL),
(141, 163, 66, 69, 0, 2, 'PAK vs IND', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(142, 164, 21, 1, 0, 1, 'SRILANKA vs INDIA', 4, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(143, 164, 21, 1, 0, 2, 'SRILANKA vs INDIA', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(144, 165, 1, 42, 1, 1, 'INDIA vs AUS', 11, '1', 2, NULL, NULL, NULL, NULL, NULL),
(145, 165, 1, 42, 1, 2, 'INDIA vs AUS', 12, '0.5', 2, NULL, NULL, NULL, NULL, NULL),
(146, 166, 42, 66, 1, 1, 'Aus vs Pak', 12, '1.1', 0, NULL, NULL, NULL, NULL, NULL),
(147, 166, 42, 66, 1, 2, 'Aus vs Pak', 8, '1', 0, NULL, NULL, NULL, NULL, NULL),
(148, 167, 70, 71, 1, 1, 'KIMSAR vs KANCHIWALA', 24, '1', 1, NULL, NULL, NULL, NULL, NULL),
(149, 167, 70, 71, 1, 2, 'KIMSAR vs KANCHIWALA', 26, '1', 2, NULL, NULL, NULL, NULL, NULL),
(150, 168, 72, 73, 1, 1, ' Ind vs Ban', 13, '0.2', 0, NULL, NULL, NULL, NULL, NULL),
(151, 168, 72, 73, 1, 2, ' Ind vs Ban', 4, '0.1', 0, NULL, NULL, NULL, NULL, NULL),
(152, 169, 69, 74, 1, 1, 'Ind vs Ned', 8, '0.2', 0, NULL, NULL, NULL, NULL, NULL),
(153, 169, 69, 74, 1, 2, 'Ind vs Ned', 21, '0.5', 0, NULL, NULL, NULL, NULL, NULL),
(154, 170, 72, 42, 0, 1, ' vs Aus', 12, '0.3', 0, NULL, NULL, NULL, NULL, NULL),
(155, 170, 72, 42, 0, 2, ' vs Aus', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(156, 171, 2, 21, 1, 1, 'Aus vs Sri Lanka', 360, '15.4', 2, NULL, NULL, NULL, NULL, NULL),
(157, 171, 2, 21, 0, 2, 'AUSTRALIA vs SRILANKA', 245, '39', 6, NULL, NULL, NULL, NULL, NULL),
(158, 172, 75, 76, 1, 1, 'Aus vs Sri Lanka', 46, '1.2', 0, NULL, NULL, NULL, NULL, NULL),
(159, 172, 75, 76, 1, 2, 'Australlia vs Sri Lanka', 58, '1.4', 0, NULL, NULL, NULL, NULL, NULL),
(160, 173, 76, 26, 1, 1, 'Sri Lanka vs Bangladesh', 56, '1.2', 0, NULL, NULL, NULL, NULL, NULL),
(161, 173, 76, 26, 1, 2, 'Sri Lanka vs Bangladesh', 25, '0.4', 0, NULL, NULL, NULL, NULL, NULL),
(162, 174, 76, 75, 1, 1, 'Sri Lanka vs Australlia', 120, '11.1', 0, NULL, NULL, NULL, NULL, NULL),
(163, 174, 76, 75, 1, 2, 'Sri Lanka vs Australlia', 145, '10', 0, NULL, NULL, NULL, NULL, NULL),
(164, 175, 77, 78, 1, 1, 'Afg vs IRE', 178, '34.4', 3, NULL, NULL, NULL, NULL, NULL),
(165, 175, 77, 78, 0, 2, 'Afg vs IRE', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(166, 176, 79, 80, 1, 1, 'MI vs SRH', 145, '20', 8, NULL, NULL, NULL, NULL, NULL),
(167, 176, 79, 80, 1, 2, 'MI vs SRH', 50, '5.5', 2, NULL, NULL, NULL, NULL, NULL),
(168, 177, 67, 81, 1, 1, 'SRI vs BANG', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(169, 177, 67, 81, 0, 2, 'SRI vs BANG', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(170, 178, 67, 81, 1, 1, 'sri vs bang', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(171, 178, 67, 81, 0, 2, 'sri vs bang', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(172, 179, 21, 26, 1, 1, 'SRILANKA vs BANGLADESH', 311, '50', 10, NULL, NULL, NULL, NULL, NULL),
(173, 179, 21, 26, 0, 2, 'SRILANKA vs BANGLADESH', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(174, 180, 21, 26, 1, 1, 'SRILANKA vs BANGLADESH', 311, '49.4', 10, NULL, NULL, NULL, NULL, NULL),
(175, 180, 21, 26, 1, 2, 'SRILANKA vs BANGLADESH', 2, '0.2', 0, NULL, NULL, NULL, NULL, NULL),
(176, 181, 67, 81, 1, 1, 'SRI vs BANG', 311, '49.4', 10, NULL, NULL, '', NULL, NULL),
(177, 181, 67, 81, 0, 2, 'SRI vs BANG', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(178, 182, 82, 20, 1, 1, 'West Indies vs Pakistan', 126, '27.5', 4, NULL, NULL, '                                                     Match Abandon Due to Rain!                                                            ', NULL, NULL),
(179, 182, 82, 20, 1, 2, '', 0, '0.0', 0, NULL, NULL, '', NULL, NULL),
(180, 183, 83, 84, 1, 1, 'SH vs RCB', 434, '25', 9, NULL, NULL, 'Match will resume by tomorrow: April 5, 8 PM: Sunrisers Hyderabad v Royal Challengers Bangalore, Rajiv Gandhi Intl. Cricket Stadium, Hyderabad', '', NULL),
(181, 183, 83, 84, 1, 2, 'SH vs RCB', 140, '9.2', 6, NULL, NULL, 'there is something in second inning', '', NULL),
(182, 184, 84, 52, 1, 1, 'RCB vs KKR', 120, '9.2', 0, NULL, NULL, '', 'No', NULL),
(183, 184, 84, 52, 0, 2, 'RCB vs KKR', 219, '20.1', 9, NULL, NULL, 'Toss Time....', '4', NULL),
(184, 185, 84, 79, 0, 1, 'rcb vs mi', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(185, 185, 84, 79, 0, 2, 'rcb vs mi', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(186, 186, 52, 79, 0, 1, 'kkr vs mi', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(187, 186, 52, 79, 0, 2, 'kkr vs mi', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(188, 187, 52, 79, 0, 1, 'kkr vs mi', 3, '0.1', 0, NULL, NULL, '', '3', NULL),
(189, 187, 52, 79, 0, 2, 'kkr vs mi', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(190, 188, 84, 85, 0, 1, 'Rcb vs Gurat', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(191, 188, 84, 85, 0, 2, 'Rcb vs Gurat', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(192, 189, 83, 56, 0, 1, 'sh vs rps', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(193, 189, 83, 56, 0, 2, 'sh vs rps', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(194, 190, 83, 56, 0, 1, 'sh vs rps', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(195, 190, 83, 56, 0, 2, 'sh vs rps', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(196, 191, 56, 79, 1, 1, 'rps vs mi', 63, '3.3', 0, NULL, NULL, '', 'Rain', NULL),
(197, 191, 56, 79, 0, 2, 'rps vs mi', 19, '0.5', 0, NULL, NULL, '', '4', NULL),
(198, 192, 52, 79, 0, 1, 'KKR vs MI', 18, '1.4', 2, NULL, NULL, '', 'Ball', NULL),
(199, 192, 52, 79, 0, 2, 'KKR vs MI', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(200, 193, 52, 79, 0, 1, 'KKR vs MI', 83, '11.2', 7, NULL, NULL, 'MI Won the toss', 'Wide', '1st session 6 over : 54 runs\n2nd Session 10 over: 78 runs\n3rd session 15 over : 105 runs'),
(201, 193, 52, 79, 0, 2, 'KKR vs MI', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(202, 194, 79, 52, 0, 1, 'MI vs KKR', 104, '15.4', 3, NULL, NULL, 'MI won the toss', '', 'IPL 2017, KKR vs MI, rajkot\n15 over - 30/5\n10 over - 30/5\n6 over - 30/5'),
(203, 194, 79, 52, 0, 2, 'MI vs KKR', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(204, 195, 79, 52, 1, 1, 'MI vs KKR', 196, '12.1', 4, NULL, NULL, 'KKR won the toss', '5', 'Please refresh the match, if new match is not coming\nOver 15 - 150/4\nOver 10 - 100/2\nOver 6 - 55/1\nIPL Cup Rates\nHYD  5.10,  BNG  5.40\nKKR  5.20,  PUN  6.75\nGUJ  7.30,  MUM  6.80\nPJB  8.50,   DEL 15:00'),
(205, 195, 79, 52, 0, 2, 'MI vs KKR', 39, '2.4', 3, NULL, NULL, 'MI won the Toss', 'Wicket', 'Session History:\nOver 6 - 45/3\nOver 10 - 77/3'),
(206, 196, 86, 52, 0, 1, 'GUJ vs KKR', 0, '0.0', 0, NULL, NULL, 'GUJ WON THE TOSS ELECTED BAT FIRST', '', ''),
(207, 196, 86, 52, 0, 2, 'GUJ vs KKR', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(208, 197, 80, 84, 0, 1, 'SRH vs RCB', 26, '1.1', 1, NULL, NULL, 'SRH Won the toss and elected to bat first', '1', '6 OVER 56\n10 OVER 90\n15 OVER 120\n20 OVER 167\n25 OVER 199\n30 OVER 245\n35 OVER 278\n40 OVER 320\n45 OVER 370\n50 OVER 410'),
(209, 197, 80, 84, 0, 2, 'SRH vs RCB', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(210, 198, 84, 51, 0, 1, 'RCB vs PUNE', 11, '0.4', 0, NULL, NULL, 'RCB WON THE TOSS', '6', 'SESSION COMMENT'),
(211, 198, 84, 51, 0, 2, 'RCB vs PUNE', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(212, 199, 52, 84, 1, 1, 'KKR vs RCB', 0, '0.0', 0, NULL, NULL, '', '', ''),
(213, 199, 52, 84, 0, 2, 'KKR vs RCB', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(214, 200, 52, 79, 0, 1, 'KKR vs MI', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(215, 200, 52, 79, 0, 2, 'KKR vs MI', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(216, 201, 52, 79, 0, 1, 'KKR vs MI', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(217, 201, 52, 79, 0, 2, 'KKR vs MI', 0, '0.0', 0, NULL, NULL, NULL, NULL, NULL),
(218, 202, 79, 51, 1, 1, 'Mi vs Pune', 101, '7.2', 8, NULL, NULL, 'MI WON THE TOSS AND ELECTED BOWL FIRST', '4', ''),
(219, 202, 79, 51, 0, 2, 'Mi vs Pune', 42, '2.2', 0, NULL, NULL, '', '6', '');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `short_name`) VALUES
(1, 'India', 'IND'),
(2, 'Australia', 'AUS'),
(20, 'Pakistan', 'PAK'),
(21, 'SriLanka', 'SRI'),
(22, 'Ireland', 'IRE'),
(23, 'WestIndies', 'WES'),
(24, 'SouthAfrica', 'SOU'),
(25, 'Oman', 'OMA'),
(26, 'Bangladesh', 'BAN'),
(27, 'UAE', 'UAE'),
(28, 'HongKong', 'HON'),
(29, 'New Zealand', 'NEW'),
(30, 'Norway', 'NOR'),
(32, 'Zimbabwe', 'ZIM'),
(33, 'Kenya', 'KEN'),
(35, 'New York', 'NEW'),
(36, 'Scotland', 'SCO'),
(37, 'Switzerland', 'SWI'),
(38, 'England', 'ENG'),
(39, 'Soctland', 'SOC'),
(40, 'Team A', 'TEA'),
(41, 'Team B', 'TEA'),
(42, 'Aus', 'AUS'),
(43, 'Eng', 'ENG'),
(44, 'THUNDER', 'THU'),
(45, 'BH', 'BH'),
(47, 'Nz', 'NZ'),
(48, 'Bangluru', 'BAN'),
(49, 'Delhi', 'DEL'),
(50, 'punjab', 'PUN'),
(51, 'pune', 'PUN'),
(52, 'kkr', 'KKR'),
(53, 'csk', 'CSK'),
(54, 'pankaj', 'PAN'),
(55, 'ajay', 'AJA'),
(56, 'RPS', 'RPS'),
(57, 'GL', 'GL'),
(58, 'inf', 'INF'),
(59, 'rdt', 'RDT'),
(60, 'fgdg', 'FGD'),
(61, 'ccvxcv', 'CCV'),
(62, 'Smart', 'SMA'),
(63, 'Lion', 'LIO'),
(64, 'Star', 'STA'),
(65, 'Bulls', 'BUL'),
(66, 'pak', 'PAK'),
(67, 'Sri', 'SRI'),
(68, 'RR', 'RR'),
(69, 'IND', 'IND'),
(70, 'KIMSAR', 'KIM'),
(71, 'KANCHIWALA', 'KAN'),
(72, '', ''),
(73, 'Ban', 'BAN'),
(74, 'Ned', 'NED'),
(75, 'Australlia', 'AUS'),
(76, 'Sri Lanka', 'SRI'),
(77, 'Afg', 'AFG'),
(78, 'IRE', 'IRE'),
(79, 'MI', 'MI'),
(80, 'SRH', 'SRH'),
(81, 'BANG', 'BAN'),
(82, 'West Indies', 'WES'),
(83, 'SH', 'SH'),
(84, 'RCB', 'RCB'),
(85, 'Gurat', 'GUR'),
(86, 'GUJ', 'GUJ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_time` datetime NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `mob` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_login` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `last_logout_time` datetime NOT NULL,
  `device_key` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip`, `login_time`, `name`, `address`, `email`, `mob`, `password`, `is_login`, `last_logout_time`, `device_key`) VALUES
(73, '0.0.0.0', '0000-00-00 00:00:00', 'sujal', 'pawan vihar', 'sujalrajpal14@gmail.com', '7974846421', '6d8ed72885040bd5911af4ade3afc92aff420ca7', 'N', '0000-00-00 00:00:00', '146356'),
(72, '0.0.0.0', '2017-03-26 05:06:36', 'Krunal', 'vadodara', 'valand571@gmail.com', '9726705945', 'bf7b8c5e778674f54bbe16b1582730cb31928f00', 'N', '2017-03-26 05:06:40', '345732'),
(71, '0.0.0.0', '2017-03-25 12:45:35', 'Alexander', 'jodhpur', 'Alexandervp7@gmail.com', '9214445666', 'e64d1632a349b604eb3b991403f70917b7ff0a80', 'N', '2017-03-25 12:54:09', '438419'),
(70, '0.0.0.0', '2017-04-05 08:28:21', 'akash', 'hoshngabad m.p', 'alakashlowanshi@gmail.com', '9977586767', '62009b1a26ae476df0a4de5b8f891e1de3550b32', 'Y', '2017-04-02 18:03:26', '347365'),
(69, '0.0.0.0', '2017-03-23 07:42:52', 'salim', 'solapur', 'nadafsalim93@gmail.com', '8552927876', '504ad8af4bbd6d3d2b0dbe436aea04c495102bd9', 'Y', '0000-00-00 00:00:00', '47954'),
(68, '0.0.0.0', '2017-04-05 09:46:04', 'Deepak Thapliyal', 'Tanishq Vihar', 'deepak.thapliyals@gmail.com', '9719573626', 'd31e8a11f657101437d5e0703e44407ce16419ef', 'Y', '2017-03-30 17:27:48', '16470426'),
(67, '0.0.0.0', '2017-03-29 10:22:24', 'anil', 'it park', 'anil@gmail.com', '9911090210', 'd3dd2c11780fff3fa0b52f04f6330c50a443e7e6', 'Y', '2017-03-28 16:50:16', '41143468'),
(66, '192.168.137.38', '2017-04-05 09:43:34', 'prateek', 'gshhshs', 'p@gmail.com', '9877654545', 'd3dd2c11780fff3fa0b52f04f6330c50a443e7e6', 'Y', '2017-04-05 08:02:12', '63436574'),
(74, '0.0.0.0', '2017-04-05 09:26:27', 'anil', 'xyz', 'anil.dabral1@gmail.com', '9837254923', 'd3dd2c11780fff3fa0b52f04f6330c50a443e7e6', 'Y', '2017-04-04 14:10:17', '27796225'),
(75, '0.0.0.0', '2017-04-05 07:50:20', 'shri', 'abc', 'shri@gmail.com', '2136454978', '5cca0f654bd27ca9f44f80b96903a0e7684bf421', 'Y', '2017-04-03 16:55:12', '58488559'),
(76, '0.0.0.0', '2017-03-26 12:36:36', 'prithviraj', 'daund', 'swami1717@gmail.com', '9271647303', '9c3a9f32acf642b7960c6732f46b7278c6dfde6e', 'Y', '2017-03-26 12:36:04', '271011'),
(77, '0.0.0.0', '0000-00-00 00:00:00', 'sujal', 'pest', 'sujraj@14gmail.com', '9893898640', 'e76c5ec7241d49f2ea095e719769d8e78fca093a', 'N', '0000-00-00 00:00:00', '344886'),
(78, '0.0.0.0', '2017-03-26 19:23:02', 'kamlesh', 'patel', 'lionofindia99@gmail.com', '8866107887', '7df409756b857c95e8c60206cbf89c15acac7b67', 'Y', '0000-00-00 00:00:00', '392067'),
(79, '0.0.0.0', '2017-03-30 16:33:10', 'pandu Kumar', 'Siddhartha nagara mandya', 'panduk165@gmail.com', '9620050096', '6f647e75eba0ca1a6957543fe07ecf3add356fee', 'Y', '0000-00-00 00:00:00', '149957'),
(80, '0.0.0.0', '2017-04-05 06:44:39', 'test1', 'address', 'test1@gmail.com', '1234567890', 'd3dd2c11780fff3fa0b52f04f6330c50a443e7e6', 'Y', '2017-04-05 06:40:19', '43895951'),
(81, '192.168.0.191', '2017-03-30 16:28:27', 'jahanzeb', 'e16/7', 'o3319514827@gmail.com', '0514418449', '22da04257b87ac159a0efffe57c01b268d52932a', 'Y', '2017-03-29 10:46:29', '80443'),
(82, '0.0.0.0', '2017-03-28 14:18:35', 'sagar', 'ahemdabad', 'sagarmanseta123@gmail.com', '8141610454', '116cc25f118cb99d3c052db743d85fb44b282ab6', 'Y', '2017-03-28 14:17:50', '36233'),
(83, '0.0.0.0', '2017-03-30 16:36:22', 'Chandresh ', 'aalidar ', 'chandreshsinhbarad143@gmail.com', '9275242744', '68fcbabb58f0c3989f2628b96eeebeac168a7a36', 'Y', '2017-03-28 16:25:37', '147858'),
(84, '192.168.1.3', '2017-04-05 09:45:39', 'amit', 'aaa', 'a@1.com', '1111111111', 'd947167010164cb08bbda7aefa0c8f42301eb1e1', 'Y', '2017-03-30 17:06:46', '25823479'),
(85, '0.0.0.0', '2017-04-04 13:24:13', 'sudeep yadav ', 'bangany', 'sudeepyadav737@yahoo.com', '9794448297', '21d00b2dfe03f3f0c6c320440b09f5ab21833107', 'Y', '2017-03-29 09:13:44', '55601'),
(86, '0.0.0.0', '2017-04-05 09:28:36', 'anupam', 'ballupur', 'anupampanwar@yahoo.com', '7830727272', 'd3dd2c11780fff3fa0b52f04f6330c50a443e7e6', 'Y', '2017-04-03 16:39:56', '44731264'),
(87, '192.168.43.9', '2017-03-29 16:43:54', 'Rahul ', 'Abc', 'rahul.bond1999@gmail.com', '8868079089', 'd3dd2c11780fff3fa0b52f04f6330c50a443e7e6', 'Y', '0000-00-00 00:00:00', '446739'),
(88, '192.168.1.4', '2017-03-29 17:47:53', 'a@2.com', 'aaa', 'a@2.com', '1111111111', 'd947167010164cb08bbda7aefa0c8f42301eb1e1', 'Y', '2017-03-29 17:46:25', '21315314'),
(89, '192.168.1.2', '0000-00-00 00:00:00', 'Ali ', 'lahore', 'guru.khan125@gmail.com', '3313716293', 'f0169931010e1fee9c4a97ccf701d2ec079fcbba', 'N', '0000-00-00 00:00:00', '183378'),
(90, '0.0.0.0', '2017-04-04 16:17:57', 'rohit', 'dehradun', 'rohit.uniyal13@gmail.com', '9760003076', 'c72bfe8374222e6c1ab56cd9251d6584f8ace9ac', 'Y', '0000-00-00 00:00:00', '244194'),
(91, '192.168.43.205', '2017-04-03 15:20:05', 'sanjay', 'gopal nagar . najafgarh', 'sanjaytcil@yahoo.com', '8010549976', '0791385c64faa7e200a61344319ed6ec454b198c', 'Y', '0000-00-00 00:00:00', '288825'),
(92, '192.168.43.163', '2017-04-03 16:46:07', 'anupam', '22', 'aap-panwar@yahoo.com', '9890000000', 'd3dd2c11780fff3fa0b52f04f6330c50a443e7e6', 'N', '2017-04-03 16:46:08', '267361'),
(93, '0.0.0.0', '2017-04-04 15:22:30', 'aashik', 'khan', 'Aashikkhan2140@gmail.com', '9772652140', '9b1d35c040bad8fd6a9d433dd0b077cff0a616ac', 'Y', '2017-04-04 04:25:45', '474649'),
(94, '0.0.0.0', '0000-00-00 00:00:00', 'krunal', 'Vadodara', 'krunalv@gmail.com', '9726705945', 'b80d9a5679acf0c1a9986f51ecdd6fc073f86140', 'N', '0000-00-00 00:00:00', '323948');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appdetails`
--
ALTER TABLE `appdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assumptions`
--
ALTER TABLE `assumptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inning` (`inning`),
  ADD KEY `scoreboard_id` (`scoreboard_id`);

--
-- Indexes for table `balldetails`
--
ALTER TABLE `balldetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scoreboard_id` (`scoreboard_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `innings`
--
ALTER TABLE `innings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scoreboard`
--
ALTER TABLE `scoreboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team1` (`team1`),
  ADD KEY `team2` (`team2`),
  ADD KEY `inning` (`inning`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appdetails`
--
ALTER TABLE `appdetails`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assumptions`
--
ALTER TABLE `assumptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `balldetails`
--
ALTER TABLE `balldetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `innings`
--
ALTER TABLE `innings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `scoreboard`
--
ALTER TABLE `scoreboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assumptions`
--
ALTER TABLE `assumptions`
  ADD CONSTRAINT `assumptions_ibfk_2` FOREIGN KEY (`inning`) REFERENCES `scoreboard` (`inning`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assumptions_ibfk_3` FOREIGN KEY (`scoreboard_id`) REFERENCES `scoreboard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `innings`
--
ALTER TABLE `innings`
  ADD CONSTRAINT `innings_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `scoreboard` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scoreboard`
--
ALTER TABLE `scoreboard`
  ADD CONSTRAINT `scoreboard_ibfk_1` FOREIGN KEY (`team1`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scoreboard_ibfk_2` FOREIGN KEY (`team2`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
