-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2017 at 01:52 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nfl_picks`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `home_team` int(11) DEFAULT NULL,
  `away_team` int(11) DEFAULT NULL,
  `home_score` int(11) DEFAULT NULL,
  `away_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `home_team`, `away_team`, `home_score`, `away_score`) VALUES
(1, 23, 16, 0, 0),
(2, 26, 19, 0, 0),
(3, 29, 12, 0, 0),
(4, 20, 27, 0, 0),
(5, 1, 28, 0, 0),
(6, 32, 9, 0, 0),
(7, 30, 11, 0, 0),
(8, 15, 22, 0, 0),
(9, 21, 24, 0, 0),
(10, 13, 14, 0, 0),
(11, 5, 18, 0, 0),
(12, 31, 10, 0, 0),
(13, 2, 3, 0, 0),
(14, 6, 17, 0, 0),
(15, 4, 25, 0, 0),
(16, 8, 7, 0, 0),
(17, 20, 19, 0, 0),
(18, 28, 26, 0, 0),
(19, 25, 27, 0, 0),
(20, 4, 3, 0, 0),
(21, 29, 21, 0, 0),
(22, 17, 18, 0, 0),
(23, 2, 15, 0, 0),
(24, 16, 8, 0, 0),
(25, 10, 30, 0, 0),
(26, 7, 5, 0, 0),
(27, 6, 14, 0, 0),
(28, 22, 13, 0, 0),
(29, 23, 31, 0, 0),
(30, 24, 32, 0, 0),
(31, 11, 9, 0, 0),
(32, 12, 1, 0, 0),
(33, 17, 29, 0, 0),
(34, 19, 6, 0, 0),
(35, 32, 26, 0, 0),
(36, 18, 28, 0, 0),
(37, 27, 23, 0, 0),
(38, 9, 10, 0, 0),
(39, 16, 11, 0, 0),
(40, 30, 22, 0, 0),
(41, 2, 4, 0, 0),
(42, 14, 7, 0, 0),
(43, 5, 8, 0, 0),
(44, 21, 20, 0, 0),
(45, 1, 25, 0, 0),
(46, 31, 24, 0, 0),
(47, 3, 12, 0, 0),
(48, 15, 13, 0, 0),
(49, 27, 18, 0, 0),
(50, 32, 31, 0, 0),
(51, 17, 19, 0, 0),
(52, 13, 16, 0, 0),
(53, 4, 28, 0, 0),
(54, 12, 10, 0, 0),
(55, 26, 22, 0, 0),
(56, 20, 5, 0, 0),
(57, 29, 30, 0, 0),
(58, 14, 23, 0, 0),
(59, 8, 3, 0, 0),
(60, 6, 7, 0, 0),
(61, 24, 15, 0, 0),
(62, 25, 21, 0, 0),
(63, 11, 2, 0, 0),
(64, 8, 6, 0, 0),
(65, 31, 12, 0, 0),
(66, 11, 29, 0, 0),
(67, 28, 17, 0, 0),
(68, 25, 20, 0, 0),
(69, 10, 1, 0, 0),
(70, 18, 30, 0, 0),
(71, 26, 4, 0, 0),
(72, 28, 13, 0, 0),
(73, 7, 19, 0, 0),
(74, 3, 27, 0, 0),
(75, 22, 24, 0, 0),
(76, 9, 2, 0, 0),
(77, 16, 14, 0, 0),
(78, 24, 23, 0, 0),
(79, 2, 26, 0, 0),
(80, 15, 16, 0, 0),
(81, 17, 27, 0, 0),
(82, 30, 28, 0, 0),
(83, 12, 32, 0, 0),
(84, 10, 7, 0, 0),
(85, 4, 1, 0, 0),
(86, 18, 25, 0, 0),
(87, 19, 8, 0, 0),
(88, 22, 21, 0, 0),
(89, 5, 13, 0, 0),
(90, 9, 3, 0, 0),
(91, 29, 31, 0, 0),
(92, 6, 20, 0, 0),
(93, 9, 12, 0, 0),
(94, 7, 2, 0, 0),
(95, 20, 26, 0, 0),
(96, 18, 19, 0, 0),
(97, 27, 28, 0, 0),
(98, 30, 31, 0, 0),
(99, 1, 11, 0, 0),
(100, 21, 15, 0, 0),
(101, 32, 22, 0, 0),
(102, 10, 4, 0, 0),
(103, 13, 24, 0, 0),
(104, 8, 14, 0, 0),
(105, 25, 17, 0, 0),
(106, 6, 5, 0, 0),
(107, 23, 29, 0, 0),
(108, 30, 32, 0, 0),
(109, 27, 4, 0, 0),
(110, 29, 10, 0, 0),
(111, 13, 9, 0, 0),
(112, 31, 21, 0, 0),
(113, 19, 17, 0, 0),
(114, 28, 20, 0, 0),
(115, 14, 22, 0, 0),
(116, 15, 5, 0, 0),
(117, 23, 24, 0, 0),
(118, 16, 6, 0, 0),
(119, 3, 1, 0, 0),
(120, 12, 11, 0, 0),
(121, 13, 14, 0, 0),
(122, 3, 28, 0, 0),
(123, 10, 11, 0, 0),
(124, 32, 21, 0, 0),
(125, 20, 18, 0, 0),
(126, 1, 2, 0, 0),
(127, 25, 26, 0, 0),
(128, 16, 7, 0, 0),
(129, 15, 8, 0, 0),
(130, 31, 9, 0, 0),
(131, 30, 24, 0, 0),
(132, 23, 22, 0, 0),
(133, 19, 5, 0, 0),
(134, 28, 26, 0, 0),
(135, 13, 1, 0, 0),
(136, 12, 14, 0, 0),
(137, 23, 15, 0, 0),
(138, 9, 30, 0, 0),
(139, 29, 32, 0, 0),
(140, 21, 16, 0, 0),
(141, 7, 20, 0, 0),
(142, 11, 4, 0, 0),
(143, 18, 24, 0, 0),
(144, 3, 25, 0, 0),
(145, 8, 6, 0, 0),
(146, 5, 17, 0, 0),
(147, 27, 2, 0, 0),
(148, 15, 16, 0, 0),
(149, 6, 11, 0, 0),
(150, 26, 3, 0, 0),
(151, 19, 27, 0, 0),
(152, 12, 2, 0, 0),
(153, 32, 10, 0, 0),
(154, 25, 28, 0, 0),
(155, 31, 21, 0, 0),
(156, 30, 31, 0, 0),
(157, 18, 7, 0, 0),
(158, 17, 8, 0, 0),
(159, 1, 5, 0, 0),
(160, 9, 4, 0, 0),
(161, 29, 22, 0, 0),
(162, 11, 10, 0, 0),
(163, 4, 3, 0, 0),
(164, 25, 31, 0, 0),
(165, 6, 13, 0, 0),
(166, 28, 26, 0, 0),
(167, 32, 19, 0, 0),
(168, 7, 15, 0, 0),
(169, 2, 28, 0, 0),
(170, 24, 29, 0, 0),
(171, 8, 18, 0, 0),
(172, 30, 12, 0, 0),
(173, 5, 14, 0, 0),
(174, 16, 22, 0, 0),
(175, 17, 20, 0, 0),
(176, 21, 23, 0, 0),
(177, 9, 1, 0, 0),
(178, 3, 11, 0, 0),
(179, 23, 32, 0, 0),
(180, 10, 15, 0, 0),
(181, 29, 9, 0, 0),
(182, 21, 13, 0, 0),
(183, 7, 17, 0, 0),
(184, 18, 26, 0, 0),
(185, 1, 27, 0, 0),
(186, 8, 12, 0, 0),
(187, 19, 22, 0, 0),
(188, 2, 25, 0, 0),
(189, 14, 24, 0, 0),
(190, 4, 6, 0, 0),
(191, 16, 5, 0, 0),
(192, 31, 20, 0, 0),
(193, 22, 21, 0, 0),
(194, 6, 18, 0, 0),
(195, 12, 10, 0, 0),
(196, 27, 28, 0, 0),
(197, 23, 30, 0, 0),
(198, 29, 31, 0, 0),
(199, 11, 32, 0, 0),
(200, 25, 19, 0, 0),
(201, 24, 16, 0, 0),
(202, 4, 1, 0, 0),
(203, 20, 8, 0, 0),
(204, 13, 7, 0, 0),
(205, 15, 14, 0, 0),
(206, 5, 9, 0, 0),
(207, 3, 2, 0, 0),
(208, 26, 17, 0, 0),
(209, 7, 5, 0, 0),
(210, 18, 20, 0, 0),
(211, 28, 19, 0, 0),
(212, 10, 2, 0, 0),
(213, 9, 12, 0, 0),
(214, 31, 11, 0, 0),
(215, 32, 29, 0, 0),
(216, 1, 26, 0, 0),
(217, 25, 27, 0, 0),
(218, 30, 21, 0, 0),
(219, 15, 6, 0, 0),
(220, 8, 13, 0, 0),
(221, 17, 23, 0, 0),
(222, 22, 24, 0, 0),
(223, 14, 3, 0, 0),
(224, 16, 4, 0, 0),
(225, 2, 1, 0, 0),
(226, 13, 16, 0, 0),
(227, 18, 19, 0, 0),
(228, 11, 9, 0, 0),
(229, 20, 17, 0, 0),
(230, 24, 28, 0, 0),
(231, 30, 32, 0, 0),
(232, 4, 12, 0, 0),
(233, 31, 22, 0, 0),
(234, 6, 5, 0, 0),
(235, 8, 7, 0, 0),
(236, 14, 15, 0, 0),
(237, 27, 29, 0, 0),
(238, 26, 25, 0, 0),
(239, 23, 21, 0, 0),
(240, 10, 3, 0, 0),
(241, 26, 27, 0, 0),
(242, 19, 20, 0, 0),
(243, 16, 14, 0, 0),
(244, 12, 11, 0, 0),
(245, 28, 25, 0, 0),
(246, 3, 1, 0, 0),
(247, 29, 30, 0, 0),
(248, 32, 30, 0, 0),
(249, 17, 18, 0, 0),
(250, 6, 7, 0, 0),
(251, 21, 24, 0, 0),
(252, 15, 13, 0, 0),
(253, 2, 4, 0, 0),
(254, 22, 4, 0, 0),
(255, 5, 8, 0, 0),
(256, 9, 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `invite_id` int(11) NOT NULL,
  `manager_id` varchar(45) NOT NULL,
  `recipient_id` varchar(45) NOT NULL,
  `pool_id` int(11) NOT NULL,
  `was_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `picks`
--

CREATE TABLE `picks` (
  `user` varchar(75) NOT NULL,
  `pool_id` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `game` int(11) NOT NULL,
  `team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `player_name` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pools`
--

CREATE TABLE `pools` (
  `pool_id` int(11) NOT NULL,
  `manager` varchar(75) NOT NULL,
  `pool_name` varchar(50) NOT NULL,
  `pool_image` mediumblob,
  `buy_in` int(11) NOT NULL,
  `total_pot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `pool_id` int(11) NOT NULL,
  `user` varchar(75) NOT NULL,
  `total_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_num` int(11) NOT NULL,
  `team_city` varchar(75) NOT NULL,
  `team_name` varchar(45) NOT NULL,
  `team_logo` mediumblob,
  `wins` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL,
  `ties` int(11) DEFAULT NULL,
  `offPct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_num`, `team_city`, `team_name`, `team_logo`, `wins`, `losses`, `ties`, `offPct`) VALUES
(1, 'Philadelphia', 'Eagles', '', 0, 0, 0, 19),
(2, 'New York', 'Giants', '', 0, 0, 0, 17),
(3, 'Dallas', 'Cowboys', '', 0, 0, 0, 29),
(4, 'Washington', 'Redskins', '', 0, 0, 0, 26),
(5, 'Seattle', 'Seahawks', '', 0, 0, 0, 20),
(6, 'Arizona', 'Cardinals', '', 0, 0, 0, 25),
(7, 'Los Angeles', 'Rams', '', 0, 0, 0, 12),
(8, 'San Francisco', '49ers', '', 0, 0, 0, 18),
(9, 'Green Bay', 'Packers', '', 0, 0, 0, 31),
(10, 'Detroit', 'Lions', '', 0, 0, 0, 22),
(11, 'Minnesota', 'Vikings', '', 0, 1, 0, 18),
(12, 'Chicago', 'Bears', '', 0, 0, 0, 17),
(13, 'Atlanta', 'Falcons', '', 0, 0, 0, 35),
(14, 'Tampa Bay', 'Buccanneers', '', 0, 0, 0, 21),
(15, 'New Orleans', 'Saints', '', 0, 0, 0, 31),
(16, 'Carolina', 'Panthers', '', 0, 0, 0, 20),
(17, 'New England', 'Patriots', '', 0, 0, 0, 30),
(18, 'Miami', 'Dolphins', '', 0, 0, 0, 22),
(19, 'Buffalo', 'Bills', '', 0, 0, 0, 26),
(20, 'New York', 'Jets', '', 0, 0, 0, 15),
(21, 'Kansas City', 'Chiefs', '', 0, 0, 0, 20),
(22, 'Oakland', 'Raiders', '', 0, 0, 0, 24),
(23, 'Denver', 'Broncos', '', 0, 0, 0, 16),
(24, 'San Diego', 'Chargers', '', 0, 0, 0, 24),
(25, 'Pittsburg', 'Steelers', '', 0, 0, 0, 26),
(26, 'Baltimore', 'Ravens', '', 0, 0, 0, 16),
(27, 'Cincinnati', 'Bengals', '', 0, 0, 0, 20),
(28, 'Cleveland', 'Browns', '', 0, 0, 0, 15),
(29, 'Houston', 'Texans', '', 0, 0, 0, 17),
(30, 'Tennesse', 'Titans', '', 0, 0, 0, 25),
(31, 'Indianapolis', 'Colts', '', 0, 0, 0, 26),
(32, 'Jacksonville', 'Jaguars', '', 0, 0, 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(45) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(75) NOT NULL,
  `nickname` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `prof_pic` mediumblob,
  `credits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `week_id` int(11) NOT NULL,
  `was_played` tinyint(1) NOT NULL DEFAULT '0',
  `game1` int(11) DEFAULT NULL,
  `game2` int(11) DEFAULT NULL,
  `game3` int(11) DEFAULT NULL,
  `game4` int(11) DEFAULT NULL,
  `game5` int(11) DEFAULT NULL,
  `game6` int(11) DEFAULT NULL,
  `game7` int(11) DEFAULT NULL,
  `game8` int(11) DEFAULT NULL,
  `game9` int(11) DEFAULT NULL,
  `game10` int(11) DEFAULT NULL,
  `game11` int(11) DEFAULT NULL,
  `game12` int(11) DEFAULT NULL,
  `game13` int(11) DEFAULT NULL,
  `game14` int(11) DEFAULT NULL,
  `game15` int(11) DEFAULT NULL,
  `game16` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weeks`
--

INSERT INTO `weeks` (`week_id`, `was_played`, `game1`, `game2`, `game3`, `game4`, `game5`, `game6`, `game7`, `game8`, `game9`, `game10`, `game11`, `game12`, `game13`, `game14`, `game15`, `game16`) VALUES
(1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16),
(2, 0, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32),
(3, 0, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48),
(4, 0, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, NULL),
(5, 0, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, NULL, NULL),
(6, 0, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, NULL),
(7, 0, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, NULL),
(8, 0, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, NULL, NULL, NULL),
(9, 0, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, NULL, NULL, NULL),
(10, 0, 134, 135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, NULL, NULL),
(11, 0, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158, 159, 160, 161, NULL, NULL),
(12, 0, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177),
(13, 0, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, NULL),
(14, 0, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208),
(15, 0, 209, 210, 211, 212, 213, 214, 215, 216, 217, 218, 219, 220, 221, 222, 223, 224),
(16, 0, 225, 226, 227, 228, 229, 230, 231, 232, 233, 234, 235, 236, 237, 238, 239, 240),
(17, 0, 241, 242, 243, 244, 245, 246, 247, 248, 249, 250, 251, 252, 253, 254, 255, 256);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `home_team_idx` (`home_team`),
  ADD KEY `away_team_idx` (`away_team`);

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`invite_id`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `recipient_id` (`recipient_id`),
  ADD KEY `pool_id` (`pool_id`),
  ADD KEY `invite_id` (`invite_id`);

--
-- Indexes for table `picks`
--
ALTER TABLE `picks`
  ADD PRIMARY KEY (`user`,`pool_id`,`week`),
  ADD KEY `pool_id` (`pool_id`),
  ADD KEY `week` (`week`),
  ADD KEY `user` (`user`),
  ADD KEY `game` (`game`),
  ADD KEY `team` (`team`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `team_id_idx` (`team_id`);

--
-- Indexes for table `pools`
--
ALTER TABLE `pools`
  ADD PRIMARY KEY (`pool_id`),
  ADD KEY `manager` (`manager`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`pool_id`,`user`),
  ADD KEY `pool_id` (`pool_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`week_id`),
  ADD KEY `game_id_idx` (`game1`),
  ADD KEY `game2_idx` (`game2`),
  ADD KEY `game3_idx` (`game3`),
  ADD KEY `game4_idx` (`game4`),
  ADD KEY `game5_idx` (`game5`),
  ADD KEY `game6_idx` (`game6`),
  ADD KEY `game7_idx` (`game7`),
  ADD KEY `game8_idx` (`game8`),
  ADD KEY `game9_idx` (`game9`),
  ADD KEY `game10_idx` (`game10`),
  ADD KEY `game11_idx` (`game11`),
  ADD KEY `game12_idx` (`game12`),
  ADD KEY `game13_idx` (`game13`),
  ADD KEY `game14_idx` (`game14`),
  ADD KEY `game15_idx` (`game15`),
  ADD KEY `game16_idx` (`game16`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `invite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pools`
--
ALTER TABLE `pools`
  MODIFY `pool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `week_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `away_team` FOREIGN KEY (`away_team`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION,
  ADD CONSTRAINT `home_team` FOREIGN KEY (`home_team`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION;

--
-- Constraints for table `invites`
--
ALTER TABLE `invites`
  ADD CONSTRAINT `invites_ibfk_1` FOREIGN KEY (`pool_id`) REFERENCES `pools` (`pool_id`),
  ADD CONSTRAINT `invites_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invites_ibfk_3` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invites_ibfk_4` FOREIGN KEY (`pool_id`) REFERENCES `pools` (`pool_id`);

--
-- Constraints for table `picks`
--
ALTER TABLE `picks`
  ADD CONSTRAINT `picks_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `picks_ibfk_2` FOREIGN KEY (`pool_id`) REFERENCES `pools` (`pool_id`),
  ADD CONSTRAINT `picks_ibfk_3` FOREIGN KEY (`week`) REFERENCES `weeks` (`week_id`),
  ADD CONSTRAINT `picks_ibfk_4` FOREIGN KEY (`game`) REFERENCES `games` (`game_id`),
  ADD CONSTRAINT `picks_ibfk_5` FOREIGN KEY (`team`) REFERENCES `teams` (`team_num`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pools`
--
ALTER TABLE `pools`
  ADD CONSTRAINT `pools_ibfk_1` FOREIGN KEY (`manager`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`pool_id`) REFERENCES `pools` (`pool_id`);

--
-- Constraints for table `weeks`
--
ALTER TABLE `weeks`
  ADD CONSTRAINT `game1` FOREIGN KEY (`game1`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game10` FOREIGN KEY (`game10`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game11` FOREIGN KEY (`game11`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game12` FOREIGN KEY (`game12`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game13` FOREIGN KEY (`game13`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game14` FOREIGN KEY (`game14`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game15` FOREIGN KEY (`game15`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game16` FOREIGN KEY (`game16`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game2` FOREIGN KEY (`game2`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game3` FOREIGN KEY (`game3`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game4` FOREIGN KEY (`game4`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game5` FOREIGN KEY (`game5`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game6` FOREIGN KEY (`game6`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game7` FOREIGN KEY (`game7`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game8` FOREIGN KEY (`game8`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `game9` FOREIGN KEY (`game9`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
