-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2018 at 08:14 AM
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
(123, 'นรา นคร', 'สกลนคร', 'ชาย', '0949741898', 'abc', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tborder`
--

CREATE TABLE `tborder` (
  `o_ID` int(10) NOT NULL,
  `m_ID` char(50) NOT NULL,
  `p_ID` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tborder`
--

INSERT INTO `tborder` (`o_ID`, `m_ID`, `p_ID`, `price`, `date`) VALUES
(1, '123', 101, 150, '2018-05-01'),
(2, '124', 102, 300, '2018-04-30'),
(3, '125', 103, 199, '2018-04-29'),
(104, '126', 104, 199, '2018-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE `tbproduct` (
  `p_ID` int(10) NOT NULL,
  `pt_ID` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `description` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`p_ID`, `pt_ID`, `price`, `description`, `note`) VALUES
(101, 101, 150, 'เสื้อ', '-'),
(102, 101, 199, 'เสื้อ', '-'),
(103, 102, 250, 'กางเกง', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbproducttype`
--

CREATE TABLE `tbproducttype` (
  `p_ID` int(10) NOT NULL,
  `pt_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbproducttype`
--

INSERT INTO `tbproducttype` (`p_ID`, `pt_ID`) VALUES
(101, 101),
(102, 101);

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
-- Indexes for table `tborder`
--
ALTER TABLE `tborder`
  ADD PRIMARY KEY (`o_ID`);

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
