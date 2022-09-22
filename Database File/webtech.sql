-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2018 at 06:08 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `seq` int(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pid` int(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `folder` varchar(150) NOT NULL,
  `price` int(15) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`seq`, `email`, `pid`, `name`, `folder`, `price`, `quantity`) VALUES
(9, 'hishu2@gmail.com', 1000, 'new', 'men/AirBrush_20170908141924.jpg', 20000, 1),
(12, 'hishu2@gmail.com', 1000, 'new', 'men/AirBrush_20170908141924.jpg', 20000, 2),
(13, 'hishu2@gmail.com', 1000, 'new', 'men/AirBrush_20170908141924.jpg', 20000, 1),
(15, 'hishu2@gmail.com', 1000, 'new', 'men/AirBrush_20170908141924.jpg', 20000, 1),
(16, 'hishu2@gmail.com', 1012, 'shsg1', 'men/170301-221450.jpg', 2000, 1),
(21, 'hishubhai@gmail.com', 1015, 'n', 'men/new1.jpg', 201, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `seq` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `pid` int(15) NOT NULL,
  `name` varchar(40) NOT NULL,
  `folder` varchar(150) NOT NULL,
  `price` int(15) NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`seq`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmpassword` varchar(100) NOT NULL,
  `type` varchar(7) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `email`, `date`, `gender`, `password`, `confirmpassword`, `type`) VALUES
('tushar', 'tushar@gmail.com', '3/11/1994', 'male', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
('hishubhai', 'hishubhai@gmail.com', '1/2/2020', 'other', 'c8d9e24a3a2937c72c8c757874dab13d', 'c8d9e24a3a2937c72c8c757874dab13d', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `pid` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `folder` varchar(150) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `type` varchar(40) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1036 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`pid`, `name`, `folder`, `price`, `quantity`, `type`) VALUES
(1018, 'product10', 'men/product3.jpg', 2500, 10, 'men'),
(1017, 'product2', 'men/product2.jpg', 2000, 10, 'men'),
(1016, 'product1', 'men/product1.jpg', 1000, 10, 'men'),
(1019, 'product4', 'men/product4.jpg', 4000, 7, 'men'),
(1034, 'product6', 'men/product6.jpg', 2500, 9, 'men'),
(1021, 'womenproduct1', 'women/womenproduct1.jpg', 1000, 11, 'women'),
(1022, 'womenproduct2', 'women/womenproduct2.jpg', 2000, 6, 'women'),
(1023, 'womenproduct3', 'women/womenproduct3.jpg', 1500, 5, 'women'),
(1024, 'womenproduct4', 'women/womenproduct4.jpg', 3000, 8, 'women'),
(1025, 'womenproduct5', 'women/womenproduct5.jpg', 3500, 9, 'women'),
(1026, 'watchproduct1', 'watch/watchproduct1.jpg', 2000, 9, 'watch'),
(1027, 'watchproduct2', 'watch/watchproduct2.jpg', 2500, 6, 'watch'),
(1035, 'watchproduct5', 'watch/watchproduct5.jpg', 2500, 9, 'watch'),
(1029, 'watchproduct4', 'watch/watchproduct4.jpg', 3000, 10, 'watch'),
(1030, 'mobilegadget1', 'mobilegadget/mobilegadget1.jpg', 1000, 10, 'mobilegadget'),
(1031, 'mobilegadget2', 'mobilegadget/mobilegadget2.jpg', 2000, 15, 'mobilegadget'),
(1032, 'mobilegadget3', 'mobilegadget/mobilegadget3.jpg', 2000, 13, 'mobilegadget'),
(1033, 'mobilegadget4', 'mobilegadget/mobilegadget4.jpg', 2000, 17, 'mobilegadget');
