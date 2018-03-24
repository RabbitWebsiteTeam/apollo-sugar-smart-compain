-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.40
-- Generation Time: Jan 31, 2018 at 08:24 AM
-- Server version: 5.5.43
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `callhealthreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branchName` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `branch_centers`
--

CREATE TABLE `branch_centers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centerName` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `idBranch` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idBranch` (`idBranch`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `registerdata`
--

CREATE TABLE `registerdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `emailid` varchar(150) NOT NULL,
  `empid` varchar(100) NOT NULL,
  `age` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `registerOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `registerId` int(11) NOT NULL DEFAULT '0',
  `empRel` varchar(100) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `branchId` int(11) NOT NULL DEFAULT '0',
  `centerId` int(11) NOT NULL DEFAULT '0',
  `empposition` varchar(50) NOT NULL,
  `vaccin` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idBranch` int(11) NOT NULL,
  `idCenter` int(11) NOT NULL,
  `slotDate` date NOT NULL,
  `maxCount` int(11) NOT NULL,
  `currentCount` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;
