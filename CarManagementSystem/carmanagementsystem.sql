-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 03:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminrecord`
--

CREATE TABLE `adminrecord` (
  `id` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminrecord`
--

INSERT INTO `adminrecord` (`id`, `fname`, `lname`, `username`, `email`, `password`) VALUES
(1, 'jon', 'snow', 'snow123', 'snow@gmail.com', 'stark'),
(2, 'tyrion', 'lannister', 'tyrion123', 'tyrion@gmail.com', 'stark'),
(3, 'tony', 'stark', 'tony6', 'tony42@gmail.com', 'stark'),
(4, 'harry', 'potter', 'harry123', 'harry@gmail.com', 'harry123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(55) NOT NULL,
  `make` varchar(55) NOT NULL,
  `model` varchar(55) NOT NULL,
  `rent` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `make`, `model`, `rent`, `status`, `userid`, `image`) VALUES
(1, 'Honda/', 'civic/', 200, 'Booked', 1, 'https://images.hgmsites.net/lrg/2020-honda-civic-sport-manual-angular-front-exterior-view_100751892_l.jpg'),
(3, 'Audi/', 'A6/', 5000, 'Booked', 2, 'https://cache2.pakwheels.com/system/car_generation_pictures/6393/original/Audi_A6_Front.jpg?1650612528/');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(55) NOT NULL,
  `make` varchar(56) NOT NULL,
  `model` varchar(20) NOT NULL,
  `rent` int(77) NOT NULL,
  `status` varchar(55) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `make`, `model`, `rent`, `status`, `image`) VALUES
(1, 'Honda', 'civic', 200, 'Booked', 'https://images.hgmsites.net/lrg/2020-honda-civic-sport-manual-angular-front-exterior-view_100751892_l.jpg'),
(4, 'Audi', 'A6', 5000, 'Booked', 'https://cache2.pakwheels.com/system/car_generation_pictures/6393/original/Audi_A6_Front.jpg?1650612528'),
(5, 'Dodge Charger', '2006', 984, 'Available', 'https://www.seekpng.com/png/detail/797-7972782_dodge-png-image-with-transparent-background-dodge-challenger.png'),
(6, 'Chevrolet', 'Corvette', 898, 'Available', 'https://www.pngitem.com/pimgs/m/545-5452888_yellow-2017-chevrolet-corvette-z06-on-white-background.png');

-- --------------------------------------------------------

--
-- Table structure for table `userrecord`
--

CREATE TABLE `userrecord` (
  `userid` int(55) NOT NULL,
  `fname` varchar(55) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrecord`
--

INSERT INTO `userrecord` (`userid`, `fname`, `lname`, `username`, `email`, `password`) VALUES
(1, 'Rob', 'Stark', 'rob123', 'rob123@gmail.com', 'stark'),
(2, 'arya', 'stark', 'arya123', 'arya@gmail.com', 'stark');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminrecord`
--
ALTER TABLE `adminrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrecord`
--
ALTER TABLE `userrecord`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminrecord`
--
ALTER TABLE `adminrecord`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userrecord`
--
ALTER TABLE `userrecord`
  MODIFY `userid` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userrecord` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
