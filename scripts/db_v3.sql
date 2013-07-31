-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2013 at 09:52 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Truncate table before insert `acos`
--

TRUNCATE TABLE `acos`;
--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 82),
(2, 1, NULL, NULL, 'Admin', 2, 5),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 1, NULL, NULL, 'Admins', 6, 9),
(5, 4, NULL, NULL, 'index', 7, 8),
(6, 1, NULL, NULL, 'Collections', 10, 25),
(7, 6, NULL, NULL, 'index', 11, 12),
(8, 6, NULL, NULL, 'view', 13, 14),
(9, 6, NULL, NULL, 'add', 15, 16),
(10, 6, NULL, NULL, 'edit', 17, 18),
(11, 6, NULL, NULL, 'delete', 19, 20),
(12, 6, NULL, NULL, 'findKanji', 21, 22),
(13, 6, NULL, NULL, 'mbStringToArray', 23, 24),
(14, 1, NULL, NULL, 'Groups', 26, 37),
(15, 14, NULL, NULL, 'index', 27, 28),
(16, 14, NULL, NULL, 'view', 29, 30),
(17, 14, NULL, NULL, 'add', 31, 32),
(18, 14, NULL, NULL, 'edit', 33, 34),
(19, 14, NULL, NULL, 'delete', 35, 36),
(20, 1, NULL, NULL, 'Pages', 38, 41),
(21, 20, NULL, NULL, 'display', 39, 40),
(22, 1, NULL, NULL, 'Posts', 42, 53),
(23, 22, NULL, NULL, 'index', 43, 44),
(24, 22, NULL, NULL, 'view', 45, 46),
(25, 22, NULL, NULL, 'add', 47, 48),
(26, 22, NULL, NULL, 'edit', 49, 50),
(27, 22, NULL, NULL, 'delete', 51, 52),
(28, 1, NULL, NULL, 'Users', 54, 71),
(29, 28, NULL, NULL, 'initDB', 55, 56),
(30, 28, NULL, NULL, 'login', 57, 58),
(31, 28, NULL, NULL, 'logout', 59, 60),
(32, 28, NULL, NULL, 'index', 61, 62),
(33, 28, NULL, NULL, 'view', 63, 64),
(34, 28, NULL, NULL, 'add', 65, 66),
(35, 28, NULL, NULL, 'edit', 67, 68),
(36, 28, NULL, NULL, 'delete', 69, 70),
(37, 1, NULL, NULL, 'AclExtras', 72, 73),
(38, 1, NULL, NULL, 'DebugKit', 74, 81),
(39, 38, NULL, NULL, 'ToolbarAccess', 75, 80),
(40, 39, NULL, NULL, 'history_state', 76, 77),
(41, 39, NULL, NULL, 'sql_explain', 78, 79);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `aros`
--

TRUNCATE TABLE `aros`;
--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4),
(3, NULL, 'Group', 3, NULL, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Truncate table before insert `aros_acos`
--

TRUNCATE TABLE `aros_acos`;
--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 1, '-1', '-1', '-1', '-1'),
(3, 2, 6, '1', '1', '1', '1'),
(4, 2, 20, '1', '1', '1', '1'),
(5, 3, 1, '-1', '-1', '-1', '-1'),
(6, 3, 20, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
CREATE TABLE IF NOT EXISTS `collections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `subtitle` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `collections`
--

TRUNCATE TABLE `collections`;
-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `groups`
--

TRUNCATE TABLE `groups`;
--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Administrators', '2013-07-31 09:15:49', '2013-07-31 09:15:49'),
(2, 'Managers', '2013-07-31 09:15:54', '2013-07-31 09:15:54'),
(3, 'Users', '2013-07-31 09:15:59', '2013-07-31 09:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `address`, `group_id`, `created`, `modified`) VALUES
(1, 'admin', '622411772bdd1ccfb05d5b990324d8f3de7ebea9', 'Administrator', 'juan.ctt@live.com', '', 1, '2013-07-31 09:16:21', '2013-07-31 09:16:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
