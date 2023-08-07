-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2023 at 05:39 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bca21014`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE IF NOT EXISTS `dept` (
  `did` int NOT NULL AUTO_INCREMENT,
  `dept` varchar(30) NOT NULL,
  `dmg` varchar(100) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`did`, `dept`, `dmg`) VALUES
(1, 'Orthopedics', '338898d332bdcd5fc58ed25b67fb13fa_c4289d03005.png');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

DROP TABLE IF EXISTS `doc`;
CREATE TABLE IF NOT EXISTS `doc` (
  `did` int NOT NULL AUTO_INCREMENT,
  `dname` varchar(30) NOT NULL,
  `dage` int NOT NULL,
  `dphon` char(10) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`did`, `dname`, `dage`, `dphon`) VALUES
(1, 'Abhidev', 25, '1234567890'),
(2, 'Thomaskutty', 46, '9495748822');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
