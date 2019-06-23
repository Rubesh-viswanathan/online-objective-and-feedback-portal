-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2019 at 12:47 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtest`
--

DROP TABLE IF EXISTS `addtest`;
CREATE TABLE IF NOT EXISTS `addtest` (
  `tid` int(11) NOT NULL,
  `sname` varchar(25) NOT NULL,
  `scode` varchar(250) NOT NULL,
  `noofques` int(2) NOT NULL,
  `time` int(11) NOT NULL,
  `hostedby` varchar(250) NOT NULL,
  `isLive` tinyint(1) NOT NULL DEFAULT '0',
  `department` varchar(250) NOT NULL,
  `batch` varchar(250) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackid` int(11) NOT NULL,
  `scode` varchar(50) NOT NULL,
  `sname` varchar(250) NOT NULL,
  `stf1` varchar(250) NOT NULL,
  `stf2` varchar(250) NOT NULL,
  `stf3` varchar(250) NOT NULL,
  `department` varchar(250) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`scode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbackqn`
--

DROP TABLE IF EXISTS `feedbackqn`;
CREATE TABLE IF NOT EXISTS `feedbackqn` (
  `feedbackid` int(11) NOT NULL,
  `question` text NOT NULL,
  `qnid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbackres`
--

DROP TABLE IF EXISTS `feedbackres`;
CREATE TABLE IF NOT EXISTS `feedbackres` (
  `staffid` int(11) DEFAULT NULL,
  `feedbackid` int(11) DEFAULT NULL,
  `regno` int(11) NOT NULL,
  `one` int(11) DEFAULT NULL,
  `two` int(11) DEFAULT NULL,
  `three` int(11) DEFAULT NULL,
  `four` int(11) DEFAULT NULL,
  `five` int(11) DEFAULT NULL,
  `six` int(11) DEFAULT NULL,
  `seven` int(11) DEFAULT NULL,
  `eight` int(11) DEFAULT NULL,
  `nine` int(11) DEFAULT NULL,
  `ten` int(11) DEFAULT NULL,
  `eleven` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `scode` varchar(250) DEFAULT NULL,
  `sname` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `name` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qt`
--

DROP TABLE IF EXISTS `qt`;
CREATE TABLE IF NOT EXISTS `qt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `question` text NOT NULL,
  `ot1` varchar(250) NOT NULL,
  `ot2` varchar(250) NOT NULL,
  `ot3` varchar(250) NOT NULL,
  `ot4` varchar(250) NOT NULL,
  `cot` varchar(250) NOT NULL,
  `co` varchar(250) NOT NULL,
  `mark` int(255) NOT NULL DEFAULT '0',
  `img` longblob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `tid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `regno` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `co` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `staffid` int(100) NOT NULL,
  `staffname` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`staffid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `studentname` varchar(100) NOT NULL,
  `studentregno` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `department` varchar(250) NOT NULL,
  `section` varchar(250) NOT NULL,
  `batch` varchar(250) NOT NULL,
  `type` varchar(252) NOT NULL DEFAULT 'student',
  PRIMARY KEY (`studentregno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
