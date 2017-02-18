-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2017 at 07:23 PM
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
-- Table structure for table `picks`
--

CREATE TABLE `picks` (
  `user` varchar(75) NOT NULL,
  `pool_id` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `game` int(11) NOT NULL,
  `team` int(11) NOT NULL,
  `pts_assigned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Constraints for dumped tables
--

--
-- Constraints for table `picks`
--
ALTER TABLE `picks`
  ADD CONSTRAINT `picks_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `picks_ibfk_2` FOREIGN KEY (`pool_id`) REFERENCES `pools` (`pool_id`),
  ADD CONSTRAINT `picks_ibfk_3` FOREIGN KEY (`week`) REFERENCES `weeks` (`week_id`),
  ADD CONSTRAINT `picks_ibfk_4` FOREIGN KEY (`game`) REFERENCES `games` (`game_id`),
  ADD CONSTRAINT `picks_ibfk_5` FOREIGN KEY (`team`) REFERENCES `teams` (`team_num`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
