-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 07:35 AM
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
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `Id_Country` int(11) NOT NULL,
  `Country_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_nopad_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`Id_Country`, `Country_Name`) VALUES
(111, 'Brasil'),
(222, 'Paraguay'),
(333, 'Germany'),
(444, 'Argentina'),
(555, 'Iran'),
(666, 'Siria'),
(777, 'Italy'),
(888, 'France'),
(999, 'Portugal'),
(1000, 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Id_Employee` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Birth_date` date NOT NULL,
  `Id_Country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_nopad_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Id_Employee`, `Name`, `Birth_date`, `Id_Country`) VALUES
(1, 'Thomas', '2001-09-07', 111),
(2, 'ThomasA', '2018-09-09', 222),
(3, 'ThomasB', '1984-01-01', 333),
(4, 'ThomasC', '1914-07-28', 444),
(5, 'ThomasD', '1963-11-23', 555),
(6, 'ThomasE', '1968-07-30', 666),
(7, 'ThomasF', '1930-08-25', 777),
(8, 'ThomasG', '2019-09-08', 888),
(9, 'ThomasZ', '1955-11-01', 999),
(10, 'ThomasX', '2000-12-25', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`Id_Country`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Id_Employee`),
  ADD KEY `Id_Country` (`Id_Country`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Id_Employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `Employee_ibfk_1` FOREIGN KEY (`Id_Country`) REFERENCES `country` (`Id_Country`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
