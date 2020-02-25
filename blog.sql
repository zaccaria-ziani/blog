-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2020 at 12:20 AM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article`, `id_utilisateurs`, `id_categorie`, `date`) VALUES
(1, 'test', 2, 2, '0000-00-00 00:00:00'),
(2, 'test', 2, 2, '0000-00-00 00:00:00'),
(5, 'test', 2, 2, '0000-00-00 00:00:00'),
(6, 'test', 2, 2, '0000-00-00 00:00:00'),
(7, 'test', 2, 2, '0000-00-00 00:00:00'),
(8, 'test', 2, 1, '2020-02-24 12:28:55'),
(9, 'test', 2, 4, '2020-02-24 12:28:51'),
(10, 'test', 2, 3, '2020-02-24 12:28:59'),
(11, 'test', 2, 2, '0000-00-00 00:00:00'),
(12, 'test', 2, 2, '0000-00-00 00:00:00'),
(13, 'test', 2, 2, '0000-00-00 00:00:00'),
(14, 'test', 2, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'platformers'),
(2, 'FPS'),
(3, 'RPG'),
(4, 'MMO');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `droits`
--

DROP TABLE IF EXISTS `droits`;
CREATE TABLE IF NOT EXISTS `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateurs'),
(42, 'moderateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
