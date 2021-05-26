-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2019 at 08:51 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE IF NOT EXISTS `chat_message` (
  `chat_message_id` int(10) NOT NULL AUTO_INCREMENT,
  `to_user_id` int(10) NOT NULL,
  `from_user_id` int(10) NOT NULL,
  `chat_message` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`chat_message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 1, 2, 'hell', '2019-02-19 18:54:49', 0),
(2, 1, 2, 'hollo1111111111111', '2019-02-19 18:54:49', 0),
(3, 1, 2, 'hm', '2019-02-19 18:54:49', 0),
(4, 1, 2, 'km cho majama', '2019-02-19 18:54:49', 0),
(5, 2, 1, 'kp', '2019-02-20 03:52:02', 0),
(6, 2, 1, 'gm\n', '2019-02-20 03:52:02', 0),
(7, 1, 2, 'heyy', '2019-02-20 03:54:21', 0),
(8, 2, 1, 'from kpp\n', '2019-02-20 04:02:13', 0),
(9, 2, 1, 'km ch', '2019-02-20 06:01:42', 0),
(10, 1, 2, 'sui ja\n', '2019-02-20 06:02:01', 0),
(11, 2, 1, 'hckathon', '2019-02-22 04:02:18', 0),
(12, 1, 2, '123', '2019-02-22 04:02:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`) VALUES
(1, 'kp', 'kp'),
(2, 'kp1', 'kp1');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE IF NOT EXISTS `login_details` (
  `login_details_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_type` varchar(25) NOT NULL,
  PRIMARY KEY (`login_details_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 1, '2019-02-19 16:51:24', ''),
(2, 1, '2019-02-19 16:51:39', ''),
(3, 1, '2019-02-19 16:54:32', ''),
(4, 1, '2019-02-19 16:56:09', ''),
(5, 1, '2019-02-19 17:31:07', ''),
(6, 1, '2019-02-19 17:44:00', ''),
(7, 2, '2019-02-19 18:12:10', ''),
(8, 1, '2019-02-19 17:50:43', ''),
(9, 2, '2019-02-19 18:27:20', ''),
(10, 1, '2019-02-19 18:27:40', ''),
(11, 2, '2019-02-19 18:29:34', ''),
(12, 1, '2019-02-19 18:54:58', ''),
(13, 2, '2019-02-19 18:39:18', ''),
(14, 1, '2019-02-19 18:55:08', ''),
(15, 1, '2019-02-20 03:42:50', ''),
(16, 1, '2019-02-20 04:01:08', ''),
(17, 2, '2019-02-20 03:51:03', ''),
(18, 2, '2019-02-20 04:01:14', ''),
(19, 1, '2019-02-20 04:04:02', ''),
(20, 2, '2019-02-20 04:02:27', ''),
(21, 1, '2019-02-20 05:56:09', ''),
(22, 1, '2019-02-20 06:02:16', ''),
(23, 2, '2019-02-20 06:02:38', ''),
(24, 1, '2019-02-22 04:05:04', ''),
(25, 2, '2019-02-22 04:02:57', ''),
(26, 1, '2019-02-22 04:45:18', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
