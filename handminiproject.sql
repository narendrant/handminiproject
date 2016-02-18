-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2016 at 11:27 PM
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
  `alternate_address` varchar(3000) NOT NULL COMMENT 'alternate address',
  `availability` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'avilable or not',
  `location` varchar(1000) NOT NULL COMMENT 'Product Location',
  `price_day` decimal(10,0) NOT NULL COMMENT 'Price/Day',
  `price_week` decimal(10,0) NOT NULL COMMENT 'Price/Week',
  `price_month` decimal(10,0) NOT NULL COMMENT 'Price/Month',
  `bond` tinyint(1) DEFAULT NULL COMMENT 'Bond Required or Not',
  `no_of_views` bigint(20) NOT NULL COMMENT 'Number of Views',
  `rating` float NOT NULL COMMENT 'Product Rating',
  PRIMARY KEY (`product_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10017 ;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`product_ID`, `pname`, `category`, `u_ID`, `description`, `alternate_address`, `availability`, `location`, `price_day`, `price_week`, `price_month`, `bond`, `no_of_views`, `rating`) VALUES
(10001, 'Honda Unicorn', 'Bike', 50001, 'Black color, 2010 model', '', 1, 'Kochi', 300, 250, 250, 1, 101, 4.5),
(10002, 'Dining Table set', 'Furniture', 50002, 'Four seat dining table set made of teakwood.', '', 1, 'Chennai', 500, 500, 400, 0, 345, 3),
(10003, 'Videocon A/C', 'Electronics And Home Appliances', 50003, '1 ton a/c, new model and well maintained.', '', 0, 'Chennai', 350, 300, 260, 0, 207, 4.7),
(10004, 'Sofa', 'Furniture', 50004, 'Leather 3 seater sofa, excellent condition.', '', 1, 'Kochi', 400, 400, 350, 0, 780, 3.9),
(10005, 'Washing machine', 'Home Appliances', 50005, 'LG semi automatic, 7.2kg capacity.', '', 1, 'Other', 200, 200, 150, 1, 490, 3),
(10006, 'LED Television', 'Power Tools', 50006, 'Samsung 40inch LED TV', '', 1, 'Kochi', 3000, 2750, 2500, 1, 398, 4.6),
(10007, 'Lawn Mower', 'Home Appliances', 50007, 'Honda lawn mower,weight 10kgs,six cutting heights.', '', 1, 'Bangalore', 150, 150, 100, 0, 398, 4.6),
(10008, 'Camping Tent', 'Adventure', 50008, 'Hyu Four To Six People Foldable Camping and Outdoor Tent.Dimension: 220 x 250 x 150 cm.', '', 1, 'Kochi', 300, 250, 200, 0, 506, 4.2),
(10009, 'Royal Enfield Bullet 500', 'Bike', 50009, 'Classic 500,grey colour.', '', 1, 'Chennai', 1000, 750, 600, 1, 398, 3.8),
(10010, 'Drilling machine', 'Power Tools', 50010, 'SKIL 6513 Impact Drill 13 mm, 550W, 3000 rpm ', '', 1, 'Kochi', 200, 150, 99, 1, 210, 4.1),
(10011, 'test', 'Others', 50001, 'test', '', 1, 'Kochi', 1, 2, 2, NULL, 0, 0),
(10012, 'test', 'Baby Accessories & Toys', 50001, 'test', '', 1, 'Kochi', 1, 1, -1, NULL, 0, 0),
(10013, 'test', 'Electronics & Appliances', 50001, 'testagain', '', 1, 'Kochi', 1, 1, 1, NULL, 0, 0),
(10014, 'test1', 'Baby Accessories & Toys', 50001, '1', '', 1, 'Kochi', 1, 11, 111, 0, 0, 0),
(10015, '111s', 'Musical Instruments', 50001, 'q', '', 1, 'Kochi', 1, 11, 111, 1, 0, 0),
(10016, 'test', 'Baby Accessories & Toys', 50001, 'x', '', 1, 'Kochi', 1, 11, 111, 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50013 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`user_ID`, `password`, `fname`, `lname`, `address`, `city`, `PIN`, `state`, `email`, `phone`) VALUES
(50001, '$2y$10$lenRw3r10u4HTla3evHdkusMWwmJJmpsoDAVyfTeuLPOYUNm6ARgK', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari751995@gmail.com', '+918943754999'),
(50002, '$2y$10$76CYMeJBrf8HtGjuorH76unPwgHCvYe.s/D1cRlezStqJkiN5Rhnm', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari75.1995@gmail.com', '+918943754999'),
(50003, '$2y$10$5YqLj0XP/8iEfBtbI70MB.Pru2e7nyOcVXm/E2zqoSBtf8WsTudBS', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari7519...95@gmail.com', '+918943754999'),
(50004, '$2y$10$XBrDLRUbLyGsPASmb2QUxeT93mS6MF/DIt1VrBzAzW4ZueFydhwJW', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari7.5.1995@gmail.com', '+918943754999'),
(50005, '$2y$10$1k8uHTn6Wu6gWOWw1ipQ5uJTgI5q7yLFC7UX7blvgpPCJL85APTMG', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari751.9.9.5@gmail.com', '+918943754999'),
(50006, '$2y$10$xM7X2gtwmGqdHJUjqthxk.xFSn6S39Bf7xnxKNeeiEMS8E9v5bcIO', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari....751995@gmail.com', '+918943754999'),
(50007, '$2y$10$eV8vSNx4.pYmynITfix6ie196GlUvjFBoEa/lekSJSzXGmQVrFMZ2', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari....751..995@gmail.com', '+918943754999'),
(50008, '$2y$10$kDTGJhFDDCNETL1kQcue/eNeOAhY9sy7EimMSVPoxb0DOEBgRG5K2', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari....75...1995@gmail.com', '+918943754999'),
(50009, '$2y$10$QIRlHCmD3R7hqjeDGhFZiu5VKFYEV6l6d9dgh78p9W03crZqngZh.', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari........751995@gmail.com', '+918943754999'),
(50010, '$2y$10$pByCdSi/uX.R6P.XhudOKeB.TMweEX9DeprVyh/czD6Z2azBacq06', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari75199.5@gmail.com', '+918943754999'),
(50011, '$2y$10$Ve.xLmIsMBzVVPkBWl9bp.myZtBnvTr5PeSYa3Tla8vEj4stjBNRm', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari@test', '+918943754999'),
(50012, '$2y$10$ueVfDikqIRzn/fN5BaDFIeaMc2FD2Or.3ykHMFQ.POcd1MQpQETfe', 'Harikishen', 'H', 'Harismruthi vijay gardens edayakunnam south chittor po kochi-682027', 'Kochi', '682027', 'Kerala', 'hari7..5.1.995@gmail.com', '+918943754999');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
