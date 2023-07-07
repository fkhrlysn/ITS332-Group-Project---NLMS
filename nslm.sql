-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 05:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nslm`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` varchar(5) NOT NULL,
  `MenuName` varchar(50) NOT NULL,
  `MenuPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `MenuName`, `MenuPrice`) VALUES
('D102', 'Air Sirap', 1),
('D103', 'Air Sirap Limau', 2),
('D105', 'Nescafe Ais', 2),
('D111', 'Air Limau', 1.5),
('M210', 'Nasi Ayam', 4),
('N101', 'Nasi Lemak', 1.5),
('N103', 'Nasi Lemak Kukus Ayam Goreng Berempah', 5),
('N104', 'Nasi Lemak Lemak Sambal Sotong', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderNo` int(11) NOT NULL,
  `NoTable` int(2) NOT NULL,
  `OrderDate` date NOT NULL,
  `TotalPrice` double NOT NULL,
  `PaymentStatus` varchar(30) NOT NULL,
  `StaffID` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderNo`, `NoTable`, `OrderDate`, `TotalPrice`, `PaymentStatus`, `StaffID`) VALUES
(5, 2, '2020-07-12', 6.5, 'Succesful', 'M101'),
(6, 2, '2020-07-12', 6.5, 'Succesful', 'M101'),
(7, 5, '2020-07-12', 12, 'Succesful', 'M101');

-- --------------------------------------------------------

--
-- Table structure for table `order_menu`
--

CREATE TABLE `order_menu` (
  `CartID` int(11) NOT NULL,
  `MenuID` varchar(5) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` varchar(6) NOT NULL,
  `StaffName` varchar(50) NOT NULL,
  `Pass` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `StaffNoPhone` varchar(15) NOT NULL,
  `StaffPosition` varchar(20) NOT NULL,
  `StaffSalary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `Pass`, `email`, `StaffNoPhone`, `StaffPosition`, `StaffSalary`) VALUES
('M101', 'Muhammad Zikri Iman Bin Muhamad Salleh', '$2y$10$ISKhcleQP8JsZCKDF.SCGu.37k.PafPnCl.mAEXJKhys5gfU2FOz.', 'zikri22@gmail.com', '012111002', 'manager', 2000),
('S101', 'Fakhrul Mukminim', '$2y$10$YSO3Xp2ecn2ihtKoSB45uu2ErKjZ3geoRTwUw3aJUd5ZnWotS5xSS', 'Fakhrul@gmail.com', '017343453', 'staff', 1800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderNo`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `MenuID` (`MenuID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_menu`
--
ALTER TABLE `order_menu`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD CONSTRAINT `order_menu_ibfk_1` FOREIGN KEY (`MenuID`) REFERENCES `menu` (`MenuID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
