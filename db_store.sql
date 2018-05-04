-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2018 at 05:30 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `a_ID` int(10) NOT NULL,
  `a_Name` varchar(100) NOT NULL,
  `a_Call` varchar(20) NOT NULL,
  `a_User` varchar(50) NOT NULL,
  `a_Pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`a_ID`, `a_Name`, `a_Call`, `a_User`, `a_Pass`) VALUES
(1, 'pp oo', '0123456789', 'aaa', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbcart`
--

CREATE TABLE `tbcart` (
  `m_ID` char(50) DEFAULT NULL,
  `p_ID` int(10) DEFAULT NULL,
  `p_Qty` int(10) DEFAULT NULL,
  `p_Price` int(10) DEFAULT NULL,
  `p_Description` char(50) DEFAULT NULL,
  `pt_ID` int(10) DEFAULT NULL,
  `c_Date` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbcart`
--

INSERT INTO `tbcart` (`m_ID`, `p_ID`, `p_Qty`, `p_Price`, `p_Description`, `pt_ID`, `c_Date`) VALUES
('1efjse0uk8r4sms8a14cg62kk2', 101, 1, 150, 'เสื้อ', 101, '05-05-2018'),
('1efjse0uk8r4sms8a14cg62kk2', 102, 1, 199, 'เสื้อ', 101, '05-05-2018'),
('1efjse0uk8r4sms8a14cg62kk2', 103, 1, 250, 'กางเกง', 102, '05-05-2018'),
('ookdconnl3thbs2qh5e7qj6js5', 101, 1, 150, 'เสื้อ', 101, '05-05-2018'),
('ookdconnl3thbs2qh5e7qj6js5', 103, 1, 250, 'กางเกง', 102, '05-05-2018'),
('ookdconnl3thbs2qh5e7qj6js5', 104, 1, 299, 'กางเกง', 102, '05-05-2018'),
('e8gedr4ecf8rr49u5kj43gppl7', 103, 1, 250, 'กางเกง', 102, '05-05-2018'),
('u1suj8rpordattp6t76iigsl46', 104, 1, 299, 'กางเกง', 102, '05-05-2018'),
('u1suj8rpordattp6t76iigsl46', 103, 1, 250, 'กางเกง', 102, '05-05-2018'),
('0tfn3s98bvkiddk1alfhd0ka81', 102, 1, 199, 'เสื้อ', 101, '05-05-2018'),
('0tfn3s98bvkiddk1alfhd0ka81', 103, 1, 250, 'กางเกง', 102, '05-05-2018'),
('41cac3i3gh6d7ruoqo044q9am4', 101, 1, 150, 'เสื้อ', 101, '05-05-2018'),
('41cac3i3gh6d7ruoqo044q9am4', 102, 1, 199, 'เสื้อ', 101, '05-05-2018'),
('41cac3i3gh6d7ruoqo044q9am4', 103, 1, 250, 'กางเกง', 102, '05-05-2018'),
('41cac3i3gh6d7ruoqo044q9am4', 104, 1, 299, 'กางเกง', 102, '05-05-2018'),
('p874rd2ghau54egq1oipu20115', 101, 1, 150, 'เสื้อ', 101, '05-05-2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbmember`
--

CREATE TABLE `tbmember` (
  `m_ID` int(10) NOT NULL,
  `m_Name` varchar(100) NOT NULL,
  `m_Address` text NOT NULL,
  `m_Sex` varchar(50) NOT NULL,
  `m_Call` varchar(20) NOT NULL,
  `m_User` varchar(50) NOT NULL,
  `m_Pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbmember`
--

INSERT INTO `tbmember` (`m_ID`, `m_Name`, `m_Address`, `m_Sex`, `m_Call`, `m_User`, `m_Pass`) VALUES
(123, 'นรา นคร', 'สกลนคร', 'ชาย', '0949741898', 'abc', '123'),
(1322, 'test', 'test', 'M', '123456789', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

CREATE TABLE `tborder` (
  `o_ID` int(5) NOT NULL,
  `m_ID` char(50) NOT NULL,
  `p_ID` int(10) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `p_Qty` int(5) DEFAULT NULL,
  `p_Description` char(50) DEFAULT NULL,
  `date` char(50) DEFAULT NULL,
  `m_Name` char(100) DEFAULT NULL,
  `m_Address` char(200) DEFAULT NULL,
  `m_Tel` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tborder`
--

INSERT INTO `tborder` (`o_ID`, `m_ID`, `p_ID`, `price`, `p_Qty`, `p_Description`, `date`, `m_Name`, `m_Address`, `m_Tel`) VALUES
(4, '1efjse0uk8r4sms8a14cg62kk2', 101, 150, 1, 'เสื้อ', '05-05-2018', 'นรา นคร', 'สกลนคร', '0949741898'),
(4, '1efjse0uk8r4sms8a14cg62kk2', 102, 199, 1, 'เสื้อ', '05-05-2018', 'นรา นคร', 'สกลนคร', '0949741898'),
(4, '1efjse0uk8r4sms8a14cg62kk2', 103, 250, 1, 'กางเกง', '05-05-2018', 'นรา นคร', 'สกลนคร', '0949741898'),
(5, '1efjse0uk8r4sms8a14cg62kk2', 101, 150, 1, 'เสื้อ', '05-05-2018', 'นรา นคร', 'สกลนคร', '0949741898'),
(5, '1efjse0uk8r4sms8a14cg62kk2', 102, 199, 1, 'เสื้อ', '05-05-2018', 'นรา นคร', 'สกลนคร', '0949741898'),
(5, '1efjse0uk8r4sms8a14cg62kk2', 103, 250, 1, 'กางเกง', '05-05-2018', 'นรา นคร', 'สกลนคร', '0949741898'),
(6, 'e8gedr4ecf8rr49u5kj43gppl7', 103, 250, 1, 'กางเกง', '05-05-2018', 'test', 'testest', '12341241241'),
(7, 'u1suj8rpordattp6t76iigsl46', 104, 299, 1, 'กางเกง', '05-05-2018', '555test', '555test', '555test'),
(7, 'u1suj8rpordattp6t76iigsl46', 103, 250, 1, 'กางเกง', '05-05-2018', '555test', '555test', '555test'),
(8, '0tfn3s98bvkiddk1alfhd0ka81', 102, 199, 1, 'เสื้อ', '05-05-2018', '111test', '111test', '111test'),
(8, '0tfn3s98bvkiddk1alfhd0ka81', 103, 250, 1, 'กางเกง', '05-05-2018', '111test', '111test', '111test'),
(9, '41cac3i3gh6d7ruoqo044q9am4', 101, 150, 1, 'เสื้อ', '05-05-2018', 'testtest', 'testtesttesttest', 'testtesttest'),
(9, '41cac3i3gh6d7ruoqo044q9am4', 102, 199, 1, 'เสื้อ', '05-05-2018', 'testtest', 'testtesttesttest', 'testtesttest'),
(9, '41cac3i3gh6d7ruoqo044q9am4', 103, 250, 1, 'กางเกง', '05-05-2018', 'testtest', 'testtesttesttest', 'testtesttest'),
(9, '41cac3i3gh6d7ruoqo044q9am4', 104, 299, 1, 'กางเกง', '05-05-2018', 'testtest', 'testtesttesttest', 'testtesttest'),
(10, 'p874rd2ghau54egq1oipu20115', 101, 150, 1, 'เสื้อ', '05-05-2018', '555testcc', '555testcc', '12313456');

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE `tbproduct` (
  `p_ID` int(10) NOT NULL,
  `pt_ID` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `description` text,
  `note` text,
  `p_Pic` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`p_ID`, `pt_ID`, `price`, `description`, `note`, `p_Pic`) VALUES
(101, 101, 150, 'เสื้อ', '-', '2.jpg'),
(102, 101, 199, 'เสื้อ', '-', '2.jpg'),
(103, 102, 250, 'กางเกง', '-', '1.jpg'),
(104, 102, 299, 'กางเกง', '', 'ku1780-hgr0.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbproducttype`
--

CREATE TABLE `tbproducttype` (
  `p_ID` int(10) NOT NULL,
  `pt_ID` int(10) NOT NULL,
  `pt_Name` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbproducttype`
--

INSERT INTO `tbproducttype` (`p_ID`, `pt_ID`, `pt_Name`) VALUES
(101, 101, 'เสื้อ'),
(102, 102, 'กางเกง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`a_ID`);

--
-- Indexes for table `tbmember`
--
ALTER TABLE `tbmember`
  ADD PRIMARY KEY (`m_ID`);

--
-- Indexes for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD PRIMARY KEY (`p_ID`);

--
-- Indexes for table `tbproducttype`
--
ALTER TABLE `tbproducttype`
  ADD PRIMARY KEY (`p_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
