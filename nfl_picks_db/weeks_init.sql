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
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `week_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

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
