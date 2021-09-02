-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2021 at 08:30 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seng21253`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendlist`
--

DROP TABLE IF EXISTS `friendlist`;
CREATE TABLE IF NOT EXISTS `friendlist` (
  `userEmail` varchar(40) NOT NULL,
  `friendEmail` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendlist`
--

INSERT INTO `friendlist` (`userEmail`, `friendEmail`) VALUES
('pubudu@gmail.com', 'nirasa@gmail.com'),
('pmw@gmail.com', 'wikum@gmail.com'),
('pubudu@gmail.com', 'chandi@gmail.com'),
('pubudu@gmail.com', 'dilini@gmail.com'),
('iresha@gmail.com', 'chandi@gmail.com'),
('iresha@gmail.com', 'nirasa@gmail.com'),
('nilupul@gmail.com', 'iresha@gmail.com'),
('nilupul@gmail.com', 'pubudu@gmail.com'),
('nilupul@gmail.com', 'chandi@gmail.com'),
('mahinda@gmail.com', 'nirasa@gmail.com'),
('nilupul@gmail.com', 'nirasa@gmail.com'),
('nilupul@gmail.com', 'dilini@gmail.com'),
('wikum@gmail.com', 'pubudu@gmail.com'),
('wikum@gmail.com', 'chandi@gmail.com'),
('wikum@gmail.com', 'iresha@gmail.com'),
('oshada@gmail.com', 'pubudu@gmail.com'),
('oshada@gmail.com', 'chandi@gmail.com'),
('oshada@gmail.com', 'iresha@gmail.com'),
('oshada@gmail.com', 'wikum@gmail.com'),
('malsan@gmail.com', 'nirasa@gmail.com'),
('thilina@gmail.com', 'nirasa@gmail.com'),
('malsan@gmail.com', 'dilini@gmail.com'),
('malsan@gmail.com', 'iresha@gmail.com'),
('thilina@gmail.com', 'iresha@gmail.com'),
('pmw@gmail.com', 'pubudu@gmail.com'),
('thilina@gmail.com', 'wikum@gmail.com'),
('thilina@gmail.com', 'oshada@gmail.com'),
('malsan@gmail.com', 'nilupul@gmail.com'),
('pmw@gmail.com', 'nilupul@gmail.com'),
('malsan@gmail.com', 'pmw@gmail.com'),
('malsan@gmail.com', 'chandi@gmail.com'),
('mahinda@gmail.com', 'pmw@gmail.com'),
('mahinda@gmail.com', 'iresha@gmail.com'),
('mahinda@gmail.com', 'malsan@gmail.com'),
('mahinda@gmail.com', 'chandi@gmail.com'),
('mahinda@gmail.com', 'wikum@gmail.com'),
('mahinda@gmail.com', 'nilupul@gmail.com'),
('mahinda@gmail.com', 'pasindu@gmail.com'),
('mahinda@gmail.com', 'pahan@gmail.com'),
('kavindu@gmail.com', 'pubudu@gmail.com'),
('kavindu@gmail.com', 'chandi@gmail.com'),
('kavindu@gmail.com', 'pmw@gmail.com'),
('kavindu@gmail.com', 'dilini@gmail.com'),
('kavindu@gmail.com', 'iresha@gmail.com'),
('kavindu@gmail.com', 'nilupul@gmail.com'),
('kavindu@gmail.com', 'wikum@gmail.com'),
('kavindu@gmail.com', 'oshada@gmail.com'),
('kavindu@gmail.com', 'thilina@gmail.com'),
('kavindu@gmail.com', 'malsan@gmail.com'),
('kavindu@gmail.com', 'vidura@gmail.com'),
('kavindu@gmail.com', 'deshan@gmail.com'),
('kavindu@gmail.com', 'pasindu@gmail.com'),
('kavindu@gmail.com', 'pahan@gmail.com'),
('kavindu@gmail.com', 'nilesh@gmail.com'),
('kavindu@gmail.com', 'prasanga@gmail.com'),
('kavindu@gmail.com', 'mahinda@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

DROP TABLE IF EXISTS `userlist`;
CREATE TABLE IF NOT EXISTS `userlist` (
  `Email` varchar(40) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`Email`, `Name`, `Password`) VALUES
('pubudu@gmail.com', 'pubudu', '111'),
('nirasa@gmail.com', 'nirasha', '111'),
('chandi@gmail.com', 'chandi', '222'),
('pmw@gmail.com', 'pmw', '111'),
('dilini@gmail.com', 'dilini', '333'),
('iresha@gmail.com', 'iresha', '222'),
('nilupul@gmail.com', 'nilupul', '666'),
('wikum@gmail.com', 'wikum', '777'),
('oshada@gmail.com', 'oshada', '888'),
('thilina@gmail.com', 'thilina', '999'),
('malsan@gmail.com', 'malsan', '000'),
('vidura@gmail.com', 'vidura', 'aaa'),
('deshan@gmail.com', 'deshan', 'bbb'),
('kavindu@gmail.com', 'kavindu', 'ccc'),
('pasindu@gmail.com', 'pasindu', 'ddd'),
('pahan@gmail.com', 'pahan', 'eee'),
('nilesh@gmail.com', 'nilesh', 'fff'),
('prasanga@gmail.com', 'prasanga', 'hhh'),
('mahinda@gmail.com', 'mahinda', 'jjj');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
