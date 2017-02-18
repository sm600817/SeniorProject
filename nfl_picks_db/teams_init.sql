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
(11, 'Minnesota', 'Vikings', '', 0, 0, 0, 18),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
