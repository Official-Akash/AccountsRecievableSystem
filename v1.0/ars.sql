-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2018 at 03:52 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ars`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust_mer`
--

DROP TABLE IF EXISTS `cust_mer`;
CREATE TABLE IF NOT EXISTS `cust_mer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(40) NOT NULL,
  `cust_contact` varchar(12) NOT NULL,
  `cust_email` varchar(35) NOT NULL,
  `cust_debit` text NOT NULL,
  `cust_rating` varchar(3) NOT NULL DEFAULT 'C',
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_mer`
--

INSERT INTO `cust_mer` (`cust_id`, `cust_name`, `cust_contact`, `cust_email`, `cust_debit`, `cust_rating`) VALUES
(1, 'Tech Pvt. Ltd', '7878787878', 'tech@gmail.com', '0', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_s`
--

DROP TABLE IF EXISTS `invoice_s`;
CREATE TABLE IF NOT EXISTS `invoice_s` (
  `inv_nu` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `inv_amt` text NOT NULL,
  `file_name` text NOT NULL,
  `date_inv` text NOT NULL,
  `due_dt_inv` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`inv_nu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_s`
--

INSERT INTO `invoice_s` (`inv_nu`, `cust_id`, `inv_amt`, `file_name`, `date_inv`, `due_dt_inv`, `status`) VALUES
(1, 1, '150', '1290661167.csv', '13-4-2018', '28-04-2018', 'YES'),
(2, 1, '500', '290661167', '13-4-2018', '15', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `pay_ments`
--

DROP TABLE IF EXISTS `pay_ments`;
CREATE TABLE IF NOT EXISTS `pay_ments` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `narr` text NOT NULL,
  `inv_num` text NOT NULL,
  `date_payment` text NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_ments`
--

INSERT INTO `pay_ments` (`pay_id`, `narr`, `inv_num`, `date_payment`) VALUES
(1, 'CASH REC.', '1', '13-04-2018'),
(2, 'CASH REC.', '2', '13-04-2018');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `cost` text NOT NULL,
  `stock` text NOT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pr_id`, `description`, `cost`, `stock`) VALUES
(1, 'Pen', '10', '2950');

-- --------------------------------------------------------

--
-- Table structure for table `vu`
--

DROP TABLE IF EXISTS `vu`;
CREATE TABLE IF NOT EXISTS `vu` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_password` text NOT NULL,
  `contact_nu` varchar(12) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vu`
--

INSERT INTO `vu` (`uid`, `user_name`, `user_password`, `contact_nu`) VALUES
(1, 'ARSadmin', '$2y$10$npGMYiUt8aySzzryCvD9juUjilYwHJm2W15.59Lngy39aUc6.7JbC', '7896545452');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
