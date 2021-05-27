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
-- Table structure for table `acheteurs`
--

DROP TABLE IF EXISTS `acheteurs`;
CREATE TABLE IF NOT EXISTS `acheteurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255),
  `Prenom` varchar(255),
  `Adresse` varchar(255),
  `Mail` varchar(255),
  `Motdepasse` varchar(255),
  `Numcarte` varchar(255),
  
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
