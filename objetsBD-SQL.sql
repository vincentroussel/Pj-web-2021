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
-- Table structure for table `objets`
--

DROP TABLE IF EXISTS `objets`;
CREATE TABLE IF NOT EXISTS `objets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDvendeur` int(11),
  `Nom` varchar(255),
  `Prix` int(11),
  `Defauts` varchar(255) ,
  `Qualites` varchar(255) ,
  `IDimages` int(11),
  `Typevente` varchar(255) , -- je pensais 1-enchere 2-vente directe 3-negociation
  `Categorie` varchar(255), -- je sais pas encore si on a besoin de categoriser les produits disponible sur la marketplace
  `IDvendu` int(11) , -- pour savoir si l'objet est vendu ou non
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
