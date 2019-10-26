-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2019 at 01:25 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

DROP TABLE IF EXISTS `matchs`;
CREATE TABLE IF NOT EXISTS `matchs` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_a_id` int(11) NOT NULL,
  `team_b_id` int(11) NOT NULL,
  `match_type` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`match_id`, `team_a_id`, `team_b_id`, `match_type`, `status`) VALUES
(1, 1, 2, NULL, 0),
(2, 2, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `player_name` varchar(12) NOT NULL,
  `team_id` int(11) NOT NULL,
  PRIMARY KEY (`player_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `player_name`, `team_id`) VALUES
(1, 'AB', 1),
(2, 'Abhishek', 1),
(3, 'Punit', 1),
(4, 'Anjuj', 1),
(5, 'Sombir', 1),
(6, 'Anshul', 2),
(7, 'Ankit', 2),
(8, 'Ajay', 2),
(9, 'Amit', 2),
(10, 'SOMI', 4),
(11, 'Parveen', 4);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `raid` int(11) DEFAULT NULL,
  `tackle` int(11) DEFAULT NULL,
  `all_out` int(11) DEFAULT NULL,
  `extra` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `match_id`, `team_id`, `player_id`, `raid`, `tackle`, `all_out`, `extra`) VALUES
(1, 1, 2, 8, 2, 2, 0, 0),
(2, 1, 2, 6, 0, 3, 0, 2),
(3, 1, 1, 0, 0, 0, 2, 0),
(4, 1, 2, 7, 2, 0, 0, 0),
(5, 1, 1, 2, 4, 0, 0, 0),
(6, 1, 1, 3, 1, 0, 0, 0),
(7, 1, 1, 5, 0, 2, 0, 0),
(8, 1, 1, 4, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(40) NOT NULL,
  `cap_name` varchar(21) NOT NULL,
  `team_con` int(11) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `cap_name`, `team_con`) VALUES
(1, 'Racer Club', 'a', 7404880),
(2, 'Swimmwer Club', 'b', 0),
(3, 'Guddhar Club', 'f', 0),
(4, 'Bajrang Bali Club', 'c', 0),
(5, 'ABC Club', 'm', 0),
(7, 'egter', 'sgse', 43);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
