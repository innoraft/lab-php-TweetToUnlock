-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2017 at 06:16 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `lasttweet`
--

CREATE TABLE IF NOT EXISTS `lasttweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_id` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `user_id` text,
  `t_count` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trees`
--

CREATE TABLE IF NOT EXISTS `trees` (
  `tree_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `description` text,
  `donated` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tree_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `trees`
--

INSERT INTO `trees` (`tree_id`, `name`, `description`, `donated`) VALUES
(1, 'A', 'description of A tree', 0),
(2, 'B', 'description of B tree', 0),
(3, 'C', 'description of C tree', 0),
(4, 'D', 'description of D tree', 0),
(5, 'E', 'description of E tree', 0),
(6, 'F', 'description of F tree', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
