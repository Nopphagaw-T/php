-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 05:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `bookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `BookID` varchar(5) COLLATE utf8_bin NOT NULL,
  `BookName` varchar(50) COLLATE utf8_bin NOT NULL,
  `TypeID` varchar(3) COLLATE utf8_bin NOT NULL,
  `StatusID` varchar(2) COLLATE utf8_bin NOT NULL,
  `Publish` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `UnitPrice` int(4) NOT NULL,
  `UnitRent` int(2) NOT NULL,
  `DayAmount` int(2) DEFAULT NULL,
  `Picture` mediumblob,
  `BookDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`BookID`),
  KEY `TypeID` (`TypeID`),
  KEY `StatusID` (`StatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncate table before insert `book`
--

TRUNCATE TABLE `book`;
-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` varchar(4) COLLATE utf8_bin NOT NULL,
  `CustomerName` varchar(30) COLLATE utf8_bin NOT NULL,
  `CustomerSurname` varchar(30) COLLATE utf8_bin NOT NULL,
  `CustomerAddr` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `CustomerPhone` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncate table before insert `customer`
--

TRUNCATE TABLE `customer`;
-- --------------------------------------------------------

--
-- Table structure for table `statusbook`
--

DROP TABLE IF EXISTS `statusbook`;
CREATE TABLE IF NOT EXISTS `statusbook` (
  `StatusID` varchar(2) COLLATE utf8_bin NOT NULL,
  `StatusName` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncate table before insert `statusbook`
--

TRUNCATE TABLE `statusbook`;
-- --------------------------------------------------------

--
-- Table structure for table `typebook`
--

DROP TABLE IF EXISTS `typebook`;
CREATE TABLE IF NOT EXISTS `typebook` (
  `TypeID` varchar(3) COLLATE utf8_bin NOT NULL,
  `TypeName` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`TypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncate table before insert `typebook`
--

TRUNCATE TABLE `typebook`;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`StatusID`) REFERENCES `statusbook` (`StatusID`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`TypeID`) REFERENCES `typebook` (`TypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
