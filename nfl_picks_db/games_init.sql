-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2017 at 07:20 PM
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
(72, 23, 13, 0, 0),
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
-- Constraints for dumped tables
--

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `away_team` FOREIGN KEY (`away_team`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION,
  ADD CONSTRAINT `home_team` FOREIGN KEY (`home_team`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
