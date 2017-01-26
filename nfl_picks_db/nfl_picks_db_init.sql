-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 26, 2017 at 11:40 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `picks`
--

CREATE TABLE `picks` (
  `pool_id` varchar(45) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_score` int(11) DEFAULT NULL,
  `week1` int(11) DEFAULT NULL,
  `week2` int(11) DEFAULT NULL,
  `week3` int(11) DEFAULT NULL,
  `week4` int(11) DEFAULT NULL,
  `week5` int(11) DEFAULT NULL,
  `week6` int(11) DEFAULT NULL,
  `week7` int(11) DEFAULT NULL,
  `week8` int(11) DEFAULT NULL,
  `week9` int(11) DEFAULT NULL,
  `week10` int(11) DEFAULT NULL,
  `week11` int(11) DEFAULT NULL,
  `week12` int(11) DEFAULT NULL,
  `week13` int(11) DEFAULT NULL,
  `week14` int(11) DEFAULT NULL,
  `week15` int(11) DEFAULT NULL,
  `week16` int(11) DEFAULT NULL,
  `week17` int(11) DEFAULT NULL
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
  `manager` int(11) DEFAULT NULL,
  `pool_name` varchar(50) NOT NULL,
  `buy_in` int(11) NOT NULL,
  `total_pot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_num` int(11) NOT NULL,
  `team_city` varchar(75) NOT NULL,
  `team_name` varchar(45) DEFAULT NULL,
  `wins` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL,
  `ties` int(11) DEFAULT NULL,
  `offPct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_num`, `team_city`, `team_name`, `wins`, `losses`, `ties`, `offPct`) VALUES
(1, 'Philadelphia', 'Eagles', 0, 0, 0, 19),
(2, 'New York', 'Giants', 0, 0, 0, 17),
(3, 'Dallas', 'Cowboys', 0, 0, 0, 29),
(4, 'Washington', 'Redskins', 0, 0, 0, 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `prof_pic` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `week_id` int(11) NOT NULL,
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
-- Indexes for table `picks`
--
ALTER TABLE `picks`
  ADD PRIMARY KEY (`pool_id`,`user_id`),
  ADD KEY `user_id_idx` (`user_id`),
  ADD KEY `team_id_idx` (`week1`,`week2`,`week4`,`week6`,`week5`,`week3`,`week7`,`week8`,`week9`,`week10`,`week11`,`week12`,`week13`,`week14`,`week15`,`week16`),
  ADD KEY `week17` (`week17`),
  ADD KEY `pool_id` (`pool_id`);

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
  ADD KEY `user_idx` (`manager`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pools`
--
ALTER TABLE `pools`
  MODIFY `pool_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `week_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pools`
--
ALTER TABLE `pools`
  ADD CONSTRAINT `user` FOREIGN KEY (`manager`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
