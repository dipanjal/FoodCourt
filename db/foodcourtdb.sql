-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2017 at 05:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodcourtdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogindb`
--

CREATE TABLE `adminlogindb` (
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogindb`
--

INSERT INTO `adminlogindb` (`email`, `password`) VALUES
('kuddus@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `availableproducts`
--

CREATE TABLE `availableproducts` (
  `id` int(10) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `stock` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availableproducts`
--

INSERT INTO `availableproducts` (`id`, `productname`, `price`, `stock`) VALUES
(1, 'Jumbo Burger', 200, 15),
(2, 'Pepsi (250ml)', 30, 10),
(3, 'Blue Lagune', 90, 49),
(4, 'pizza (6'')', 220, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `totalprice` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customerinfodb`
--

CREATE TABLE `customerinfodb` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerinfodb`
--

INSERT INTO `customerinfodb` (`name`, `email`, `phone`, `username`, `password`) VALUES
('Prottay Nuraet', 'mahafuj.rahman@ymail', '01622727003', 'razib', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `customerlogindb`
--

CREATE TABLE `customerlogindb` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerlogindb`
--

INSERT INTO `customerlogindb` (`username`, `password`) VALUES
('razib', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `pid` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `productname` varchar(20) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `totalprice` varchar(2000) NOT NULL,
  `dtime` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`pid`, `username`, `productname`, `quantity`, `totalprice`, `dtime`) VALUES
('1', 'razib', 'Jumbo Burger', '4', '800', '2017-05-01 05:19:45 pm');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `id` varchar(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `totalprice` varchar(20) NOT NULL,
  `uid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availableproducts`
--
ALTER TABLE `availableproducts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availableproducts`
--
ALTER TABLE `availableproducts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
