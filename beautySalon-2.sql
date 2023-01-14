-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2023 at 12:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautySalon`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `ID` int(11) NOT NULL,
  `add_number` int(11) NOT NULL,
  `add_street` varchar(25) NOT NULL,
  `add_city` varchar(25) NOT NULL,
  `add_county` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ID`, `add_number`, `add_street`, `add_city`, `add_county`) VALUES
(54, 43, 'Addison Road', 'bhjnk', 'antrim'),
(55, 12, 'Catalao', 'Barcenola', 'clare'),
(56, 17, 'Cork Street', 'Dublin ', 'dublin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID` int(11) NOT NULL,
  `boo_date` date NOT NULL,
  `boo_time` varchar(30) NOT NULL,
  `ser_ID` int(11) NOT NULL,
  `cus_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID`, `boo_date`, `boo_time`, `ser_ID`, `cus_ID`) VALUES
(11, '2023-01-27', '11:00 to 12:00', 10, 41),
(12, '2023-01-20', '09:00 to 10:00', 8, 41),
(13, '2023-01-27', '14:00 to 15:00', 8, 41),
(14, '2023-01-28', '16:00 to 17:00', 8, 41),
(15, '2023-01-16', '14:00 to 15:00', 9, 41),
(16, '2023-01-26', '16:00 to 17:00', 10, 41),
(17, '2023-01-31', '14:00 to 15:00', 10, 41),
(18, '2023-01-28', '11:00 to 12:00', 7, 41),
(19, '2023-02-10', '12:00 to 13:00', 8, 41),
(20, '2023-01-17', '15:00 to 16:00', 6, 41),
(21, '2023-03-11', '10:00 to 11:00', 6, 41),
(22, '2023-01-20', '12:00 to 13:00', 8, 40),
(23, '2023-01-26', '09:00 to 10:00', 7, 42),
(24, '2023-01-21', '12:00 to 13:00', 7, 42);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `cus_phone` varchar(14) NOT NULL,
  `add_ID` int(11) NOT NULL,
  `use_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `cus_name`, `cus_phone`, `add_ID`, `use_ID`) VALUES
(40, 'Leandro', '0833250990', 54, 4),
(41, 'Test', '0832309889', 55, 8),
(42, 'Janaina Moreira', '0833203123', 56, 9);

-- --------------------------------------------------------

--
-- Table structure for table `professional`
--

CREATE TABLE `professional` (
  `ID` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `ID_use` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `professional`
--

INSERT INTO `professional` (`ID`, `pro_name`, `ID_use`) VALUES
(1, 'Liana Spears', 5),
(2, 'Lorena Cyrus', 6),
(3, 'Ciara Jhonson', 7);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ID` int(11) NOT NULL,
  `ser_name` varchar(50) NOT NULL,
  `ser_duration` time NOT NULL,
  `pro_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ID`, `ser_name`, `ser_duration`, `pro_ID`) VALUES
(5, 'Nail Designer', '00:40:00', 1),
(6, 'Haircut', '00:30:00', 2),
(7, 'Eyebrow Design ', '06:00:00', 3),
(8, 'Pedicure', '00:30:00', 1),
(9, 'Hydration', '00:55:00', 2),
(10, 'Highlights', '01:20:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `use_email` varchar(30) NOT NULL,
  `use_password` varchar(20) NOT NULL,
  `use_priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `use_email`, `use_password`, `use_priority`) VALUES
(4, 'leandro@testando.com', '1234', 1),
(5, 'lianaspears@naildesigner', 'naildesigner', 2),
(6, 'lorenacyrus@hairdresser.com', 'hairdresser', 2),
(7, 'ciarajhonson@eyebrow.com', 'eyebrow', 2),
(8, 'teste@testando.com', '321', 1),
(9, 'janaina@email.com', 'janaina', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ser_ID` (`ser_ID`),
  ADD KEY `FK_cus_ID` (`cus_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_add_ID` (`add_ID`),
  ADD KEY `FK_use_ID` (`use_ID`);

--
-- Indexes for table `professional`
--
ALTER TABLE `professional`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_ID_use` (`ID_use`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_pro_ID` (`pro_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `professional`
--
ALTER TABLE `professional`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_cus_ID` FOREIGN KEY (`cus_ID`) REFERENCES `customer` (`ID`),
  ADD CONSTRAINT `FK_ser_ID` FOREIGN KEY (`ser_ID`) REFERENCES `service` (`ID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_add_ID` FOREIGN KEY (`add_ID`) REFERENCES `address` (`ID`),
  ADD CONSTRAINT `FK_use_ID` FOREIGN KEY (`use_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `professional`
--
ALTER TABLE `professional`
  ADD CONSTRAINT `FK_ID_use` FOREIGN KEY (`ID_use`) REFERENCES `user` (`ID`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_pro_ID` FOREIGN KEY (`pro_ID`) REFERENCES `professional` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
