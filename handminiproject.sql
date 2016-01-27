-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2016 at 09:55 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `handminiproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `History`
--

CREATE TABLE IF NOT EXISTS `History` (
  `h_ID` bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'History ID',
  `p_ID` bigint(250) NOT NULL COMMENT 'Product ID',
  `u_ID` bigint(250) NOT NULL COMMENT 'User ID',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Time of Transaction',
  `type` int(11) NOT NULL COMMENT 'Type of Transaction',
  PRIMARY KEY (`h_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `product_ID` bigint(250) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'P_id',
  `pname` varchar(1000) NOT NULL COMMENT 'Product Name',
  `category` varchar(1000) NOT NULL DEFAULT 'Other' COMMENT 'Product Category',
  `u_ID` bigint(250) DEFAULT NULL COMMENT 'Renter ID',
  `description` varchar(5000) DEFAULT NULL COMMENT 'Product Description',
  `location` varchar(1000) NOT NULL COMMENT 'Product Location',
  `price_day` decimal(10,0) NOT NULL COMMENT 'Price/Day',
  `price_week` decimal(10,0) NOT NULL COMMENT 'Price/Week',
  `price_month` decimal(10,0) NOT NULL COMMENT 'Price/Month',
  `bond` tinyint(1) DEFAULT NULL COMMENT 'Bond Required or Not',
  `no_of_views` bigint(20) NOT NULL COMMENT 'Number of Views',
  `rating` float NOT NULL COMMENT 'Product Rating',
  PRIMARY KEY (`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Review_Complaint`
--

CREATE TABLE IF NOT EXISTS `Review_Complaint` (
  `review_ID` bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Review/Complaint ID',
  `type` varchar(10) NOT NULL COMMENT 'Feedback type- Review/Complaint',
  `t_ID` bigint(250) NOT NULL COMMENT 'Foreign key to Transaction',
  `description` varchar(3000) NOT NULL COMMENT 'Review/Complaint Description',
  PRIMARY KEY (`review_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE IF NOT EXISTS `Transaction` (
  `transaction_ID` bigint(250) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key for Transaction',
  `p_ID` bigint(250) NOT NULL COMMENT 'Foreign key to Product',
  `u_ID` bigint(250) NOT NULL COMMENT 'Foreign key to User',
  `transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Transaction time',
  `type` varchar(10) NOT NULL COMMENT 'Type of Transaction',
  `period` int(11) NOT NULL COMMENT 'Period of rental',
  `alternate_address` varchar(3000) NOT NULL COMMENT 'Alternate address',
  `deposit` decimal(10,0) NOT NULL COMMENT 'Amount taken as deposit',
  `approval` tinyint(1) NOT NULL COMMENT 'Approval by renter/rentee',
  PRIMARY KEY (`transaction_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `user_ID` bigint(250) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(500) NOT NULL,
  `fname` varchar(2000) DEFAULT NULL COMMENT 'First Name',
  `lname` varchar(200) DEFAULT NULL COMMENT 'Last Name',
  `address` varchar(200) DEFAULT NULL COMMENT 'User''s Address',
  `city` varchar(200) NOT NULL COMMENT 'City',
  `PIN` varchar(10) NOT NULL COMMENT 'Postal Index Number',
  `state` varchar(20) NOT NULL COMMENT 'State',
  `email` varchar(100) NOT NULL COMMENT 'Email ID',
  `phone` varchar(20) NOT NULL COMMENT 'Phone Number',
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_ID` (`user_ID`),
  UNIQUE KEY `password` (`password`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
