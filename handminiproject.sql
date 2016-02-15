-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2016 at 08:25 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
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
  `product_ID` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'P_id',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10011 ;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`product_ID`, `pname`, `category`, `u_ID`, `description`, `location`, `price_day`, `price_week`, `price_month`, `bond`, `no_of_views`, `rating`) VALUES
(10001, 'Honda Unicorn', 'Bike', 50001, 'Black color, 2010 model', 'Kochi', 300, 250, 250, 1, 101, 4.5),
(10002, 'Dining Table set', 'Furniture', 50002, 'Four seat dining table set made of teakwood.', 'Kottayam', 500, 500, 400, 0, 345, 3),
(10003, 'Videocon A/C', 'Home Appliances', 50003, '1 ton a/c, new model and well maintained.', 'Thrissur', 350, 300, 260, 0, 207, 4.7),
(10004, 'Sofa', 'Furniture', 50004, 'Leather 3 seater sofa, excellent condition.', 'Kochi', 400, 400, 350, 0, 780, 3.9),
(10005, 'Washing machine', 'Home Appliances', 50005, 'LG semi automatic, 7.2kg capacity.', 'Alapuzha', 200, 200, 150, 1, 490, 3),
(10006, 'LED Television', 'Power Tools', 50006, 'Samsung 40inch LED TV', 'Trivandrum', 3000, 2750, 2500, 1, 398, 4.6),
(10007, 'Lawn Mower', 'Home Appliances', 50007, 'Honda lawn mower,weight 10kgs,six cutting heights.', 'Kollam', 150, 150, 100, 0, 398, 4.6),
(10008, 'Camping Tent', 'Adventure', 50008, 'Hyu Four To Six People Foldable Camping and Outdoor Tent.Dimension: 220 x 250 x 150 cm.', 'Kochi', 300, 250, 200, 0, 506, 4.2),
(10009, 'Royal Enfield Bullet 500', 'Bike', 50009, 'Classic 500,grey colour.', 'Kottayam', 1000, 750, 600, 1, 398, 3.8),
(10010, 'Drilling machine', 'Power Tools', 50010, 'SKIL 6513 Impact Drill 13 mm, 550W, 3000 rpm ', 'Thrissur', 200, 150, 99, 1, 210, 4.1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50001 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
