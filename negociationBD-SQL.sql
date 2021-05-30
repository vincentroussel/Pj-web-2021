-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 09, 2020 at 10:47 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecemarketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `negociation`
--

DROP TABLE IF EXISTS `negociation`;
CREATE TABLE IF NOT EXISTS `negociation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDobjets` int(11),
  `prixvendeur` int(255),
  `prixacheteur` int(255),
  `IDvendeurs` int(11),
  `IDacheteurs` int(11),
  `nbetape` int(11),
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;