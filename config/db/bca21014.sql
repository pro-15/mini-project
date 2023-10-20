-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2023 at 04:37 PM
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
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `pid` int NOT NULL,
  `did` int NOT NULL,
  `date_gen` char(19) NOT NULL,
  `date_bok` char(10) NOT NULL,
  `slot` char(1) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bid`, `pid`, `did`, `date_gen`, `date_bok`, `slot`, `status`) VALUES
(2, 4, 2, '2023-10-14 20:16:22', '2023-10-24', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE IF NOT EXISTS `dept` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dept` varchar(30) NOT NULL,
  `dmg` varchar(200) NOT NULL,
  `stat` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `dept`, `dmg`, `stat`) VALUES
(1, 'Otolaryngologist', '0d20e6111416a2dd7f6191d8d0cf6157_f00cd392d567ab9.png', 1),
(2, 'Orthopedics', '21ff2d49071bf0081eb930805077061a_af744b3ff48ea4f.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept2`
--

DROP TABLE IF EXISTS `dept2`;
CREATE TABLE IF NOT EXISTS `dept2` (
  `depid` int NOT NULL AUTO_INCREMENT,
  `dept` varchar(30) NOT NULL,
  PRIMARY KEY (`depid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dept2`
--

INSERT INTO `dept2` (`depid`, `dept`) VALUES
(1, 'Otolaryngologist'),
(2, 'Orthopedics');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

DROP TABLE IF EXISTS `doc`;
CREATE TABLE IF NOT EXISTS `doc` (
  `did` int NOT NULL AUTO_INCREMENT,
  `id` int NOT NULL,
  `dname` varchar(30) NOT NULL,
  `dage` int NOT NULL,
  `dphon` char(10) NOT NULL,
  `stat` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`did`, `id`, `dname`, `dage`, `dphon`, `stat`) VALUES
(1, 2, 'Abhidev', 25, '1234567890', 1),
(2, 1, 'Thomaskutty', 46, '9495748822', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc2`
--

DROP TABLE IF EXISTS `doc2`;
CREATE TABLE IF NOT EXISTS `doc2` (
  `docid` int NOT NULL AUTO_INCREMENT,
  `depid` int NOT NULL,
  `dname` varchar(30) NOT NULL,
  `dage` int NOT NULL,
  `dphon` char(10) NOT NULL,
  `dmg` varchar(200) NOT NULL,
  `stat` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`docid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doc2`
--

INSERT INTO `doc2` (`docid`, `depid`, `dname`, `dage`, `dphon`, `dmg`, `stat`) VALUES
(1, 2, 'Kuttan', 25, '1234567890', '', 1),
(2, 1, 'Kutty', 46, '9495748822', '', 1),
(3, 0, 'Joseph', 44, '9988776655', '998fa78cbe8469397374a7c322858b4a_be0782cc5bfd00f83.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdat`
--

DROP TABLE IF EXISTS `userdat`;
CREATE TABLE IF NOT EXISTS `userdat` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` char(10) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`pid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userdat`
--

INSERT INTO `userdat` (`pid`, `fname`, `lname`, `email`, `mobile`, `pass`, `status`) VALUES
(1, 'Aj', 'ks', 'ajks@mail.com', '9946884520', '098', 1),
(2, 'Kuttan', 'K C', 'kckutt@mail.com', '9999999999', 'kc', 1),
(4, 'Tom', 'Kutty', 'tom@kutty.com', '1234567890', 'tom', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
