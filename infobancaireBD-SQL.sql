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
-- Table structure for table `infobancaire`
--

DROP TABLE IF EXISTS `infobancaire`;
CREATE TABLE IF NOT EXISTS `infobancaire` (
  `Numcarte` varchar(255) NOT NULL,
  `Typecarte` varchar(255),
  `Nom` varchar(255),
  `Dateexpiration` varchar(255),
  `Cryptogramme` int(11),
  PRIMARY KEY (`Numcarte`)
) /*ENGINE=MyISAM AUTO_INCREMENT=1*/ DEFAULT CHARSET=latin1;