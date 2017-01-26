-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: nfl_picks
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `home_team` int(11) DEFAULT NULL,
  `away_team` int(11) DEFAULT NULL,
  `home_score` int(11) DEFAULT NULL,
  `away_score` int(11) DEFAULT NULL,
  PRIMARY KEY (`game_id`),
  KEY `home_team_idx` (`home_team`),
  KEY `away_team_idx` (`away_team`),
  CONSTRAINT `away_team` FOREIGN KEY (`away_team`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION,
  CONSTRAINT `home_team` FOREIGN KEY (`home_team`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picks`
--

DROP TABLE IF EXISTS `picks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picks` (
  `pick_id` int(11) NOT NULL,
  `pool_id` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`pick_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `team_id_idx` (`week1`,`week2`,`week4`,`week6`,`week5`,`week3`,`week7`,`week8`,`week9`,`week10`,`week11`,`week12`,`week13`,`week14`,`week15`,`week16`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picks`
--

LOCK TABLES `picks` WRITE;
/*!40000 ALTER TABLE `picks` DISABLE KEYS */;
/*!40000 ALTER TABLE `picks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `team_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`player_id`),
  KEY `team_id_idx` (`team_id`),
  CONSTRAINT `team_id` FOREIGN KEY (`team_id`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pools`
--

DROP TABLE IF EXISTS `pools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pools` (
  `pool_id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `pick` int(11) DEFAULT NULL,
  `team` int(11) DEFAULT NULL,
  PRIMARY KEY (`pool_id`),
  KEY `user_idx` (`user`),
  KEY `pick_idx` (`pick`),
  KEY `team_idx` (`team`),
  CONSTRAINT `pick` FOREIGN KEY (`pick`) REFERENCES `picks` (`pick_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `team` FOREIGN KEY (`team`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pools`
--

LOCK TABLES `pools` WRITE;
/*!40000 ALTER TABLE `pools` DISABLE KEYS */;
/*!40000 ALTER TABLE `pools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `team_num` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(45) DEFAULT NULL,
  `wins` int(11) DEFAULT NULL,
  `losses` int(11) DEFAULT NULL,
  `ties` int(11) DEFAULT NULL,
  `pick_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`team_num`),
  KEY `pick_id_idx` (`pick_id`),
  CONSTRAINT `pick_id` FOREIGN KEY (`pick_id`) REFERENCES `picks` (`pick_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `prof_pic` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `team_num_pick` int(11) DEFAULT NULL,
  `credits` int(11) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `team_num_idx` (`team_num_pick`),
  CONSTRAINT `team_num` FOREIGN KEY (`team_num_pick`) REFERENCES `teams` (`team_num`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `weeks`
--

DROP TABLE IF EXISTS `weeks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `weeks` (
  `week_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `game16` int(11) DEFAULT NULL,
  PRIMARY KEY (`week_id`),
  KEY `game_id_idx` (`game1`),
  KEY `game2_idx` (`game2`),
  KEY `game3_idx` (`game3`),
  KEY `game4_idx` (`game4`),
  KEY `game5_idx` (`game5`),
  KEY `game6_idx` (`game6`),
  KEY `game7_idx` (`game7`),
  KEY `game8_idx` (`game8`),
  KEY `game9_idx` (`game9`),
  KEY `game10_idx` (`game10`),
  KEY `game11_idx` (`game11`),
  KEY `game12_idx` (`game12`),
  KEY `game13_idx` (`game13`),
  KEY `game14_idx` (`game14`),
  KEY `game15_idx` (`game15`),
  KEY `game16_idx` (`game16`),
  CONSTRAINT `game1` FOREIGN KEY (`game1`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game10` FOREIGN KEY (`game10`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game11` FOREIGN KEY (`game11`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game12` FOREIGN KEY (`game12`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game13` FOREIGN KEY (`game13`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game14` FOREIGN KEY (`game14`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game15` FOREIGN KEY (`game15`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game16` FOREIGN KEY (`game16`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game2` FOREIGN KEY (`game2`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game3` FOREIGN KEY (`game3`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game4` FOREIGN KEY (`game4`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game5` FOREIGN KEY (`game5`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game6` FOREIGN KEY (`game6`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game7` FOREIGN KEY (`game7`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game8` FOREIGN KEY (`game8`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION,
  CONSTRAINT `game9` FOREIGN KEY (`game9`) REFERENCES `games` (`game_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `weeks`
--

LOCK TABLES `weeks` WRITE;
/*!40000 ALTER TABLE `weeks` DISABLE KEYS */;
/*!40000 ALTER TABLE `weeks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-26 11:14:19
