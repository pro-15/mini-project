-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2023 at 03:13 PM
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
  `docid` int NOT NULL,
  `date_gen` char(19) NOT NULL,
  `date_bok` char(10) NOT NULL,
  `slot` char(1) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`bid`),
  KEY `pid` (`pid`),
  KEY `pid_2` (`pid`),
  KEY `docid` (`docid`),
  KEY `fk_slot_book` (`slot`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bid`, `pid`, `docid`, `date_gen`, `date_bok`, `slot`, `status`) VALUES
(2, 4, 2, '2023-10-14 20:16:22', '2023-10-24', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE IF NOT EXISTS `dept` (
  `depid` int NOT NULL AUTO_INCREMENT,
  `dept` varchar(30) NOT NULL,
  `depmg` varchar(200) NOT NULL,
  PRIMARY KEY (`depid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`depid`, `dept`, `depmg`) VALUES
(1, 'Otolaryngologist', '8742b85bdbcb6f391dbdcb33bba492c9_d51a3b94994a702d635e.png'),
(2, 'Orthopedics', '78b37e60fb5f3d76e96183a4d6bc3a8c_6cb554971970f4bc7e33.png'),
(8, 'Pediatrician', 'bacba9ef87a236100fe5a1bbae1e03a9_47ad122aac.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

DROP TABLE IF EXISTS `doc`;
CREATE TABLE IF NOT EXISTS `doc` (
  `docid` int NOT NULL AUTO_INCREMENT,
  `med_no` varchar(15) NOT NULL,
  `depid` int NOT NULL,
  `fname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `dphon` char(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dmg` varchar(200) NOT NULL,
  `date_crtd` varchar(20) NOT NULL,
  `date_join` varchar(20) NOT NULL,
  `stat` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`docid`),
  UNIQUE KEY `username` (`username`),
  KEY `fk_dept_doc` (`depid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`docid`, `med_no`, `depid`, `fname`, `lname`, `dob`, `dphon`, `username`, `password`, `dmg`, `date_crtd`, `date_join`, `stat`) VALUES
(1, 'KMC/22021/01003', 2, 'Kevin', 'Crumb', '25', '2202101003', 'kevincrumb', '1234', 'fc1f8e5c4987e1bd8640559b2edb4d5b_3e60404301f556a1d521.jpg', '', '', 1),
(2, 'KMC/03101/00222', 1, 'David', 'Dunn', '46', '0310100222', 'daviddunn', '1234', '9560cccad8ab465c2e7ec89fa5c79ec9_03b8a8119dd2.jpg', '', '', 1),
(3, 'KMC/12345/67890', 8, 'Sam', 'Price', '33', '1234567890', 'samprice', '1234', 'ba03dd63485e55d75d8c08727cabf4c1_4b27f77d7f37e8b9e4.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pat`
--

DROP TABLE IF EXISTS `pat`;
CREATE TABLE IF NOT EXISTS `pat` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` char(10) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`pid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `email_2` (`email`,`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pat`
--

INSERT INTO `pat` (`pid`, `fname`, `lname`, `email`, `mobile`, `pass`, `status`) VALUES
(1, 'Akhil', 'Stephen', 'aks@mail.com', '2202101003', '123', 1),
(2, 'Ebin', 'Antony', 'eba@mail.com', '0310100222', '123', 1),
(4, 'Tomas', 'Edison', 'the@kutty.com', '1234567890', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schd`
--

DROP TABLE IF EXISTS `schd`;
CREATE TABLE IF NOT EXISTS `schd` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `docid` int NOT NULL,
  `start_date` varchar(10) NOT NULL,
  `start_time` varchar(1) NOT NULL,
  `end_date` varchar(10) NOT NULL,
  `end_time` varchar(1) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `docid` (`docid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slotime`
--

DROP TABLE IF EXISTS `slotime`;
CREATE TABLE IF NOT EXISTS `slotime` (
  `slot` char(1) NOT NULL,
  `start_time` char(5) NOT NULL,
  `end_time` char(5) NOT NULL,
  PRIMARY KEY (`slot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `slotime`
--

INSERT INTO `slotime` (`slot`, `start_time`, `end_time`) VALUES
('A', '09:00', '10:00'),
('B', '10:00', '11:00'),
('C', '11:00', '12:00'),
('D', '12:00', '13:00'),
('E', '14:00', '15:00'),
('F', '15:00', '16:00'),
('G', '16:00', '17:00'),
('H', '17:00', '18:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
