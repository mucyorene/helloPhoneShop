-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 11:02 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hellophone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `names` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profiles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `names`, `email`, `dob`, `gender`, `username`, `password`, `profiles`) VALUES
(1, 'Customer 1', 'customer1@gmail.com', '2020-02-10', 'Male', 'u1', '123', 'SAM_4509.JPG'),
(2, 'Dush', 'duh@makfld.rw', '2020-02-12', 'Male', 'user2', '123', 'FB_IMG_15736720104213914.jpg'),
(4, 'dsd', 'mail@mail.rw', '2020-03-24', 'Male', 'ds', 'fine', 'SAM_4507.JPG'),
(5, 'Rene', 'rene.mucyo@gmail.com', '2020-03-26', 'Male', 'fdsflkjf', '3232', 'SAM_4507.JPG'),
(6, 'TUYISENGE', 'renemucyomucici@gmail.com', '2020-03-25', 'Male', 'fsd', '434', 'SAM_4507.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`) VALUES
(1, 'Nyarugenge'),
(2, 'Gasabo'),
(3, 'Kicukiro'),
(4, 'Nyamagabe'),
(5, 'Nyanza'),
(6, 'Nyaruguru'),
(7, 'Ruhango'),
(8, 'Muhanga'),
(9, 'Kamonyi'),
(10, 'Musanze'),
(11, 'Rwamagana'),
(12, 'Rubavu'),
(13, 'Ngoma'),
(14, 'Ngororero'),
(15, 'Bugesera'),
(16, 'Burera'),
(17, 'Gicumbi'),
(18, 'Karongi'),
(19, 'Rulindo'),
(20, 'Kayonza'),
(21, 'Huye'),
(22, 'Gisagara'),
(23, 'Kirehe'),
(24, 'Gatsibo'),
(25, 'Nyagatare'),
(26, 'Nyabihu'),
(27, 'Rusizi'),
(29, 'Gakenke'),
(30, 'Nyamasheke'),
(31, 'Rutsiro');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `names` varchar(255) DEFAULT NULL,
  `emails` varchar(255) DEFAULT NULL,
  `contents` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `names`, `emails`, `contents`) VALUES
(2, 'Rene MUCYO TUYISENGE', 'renemucyomucici@gmail.com', 'FSLFJS');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `phoneId` int(11) NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `addresses` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `phoneId`, `customerId`, `phone`, `addresses`, `email`, `quantity`, `total`) VALUES
(9, 10, 1, '0788882726', '20', 'conso@hellophone.rw', 12, 1320000),
(10, 13, 1, '0788826149', '2', 'maryseisimbi@hellophone.rw', 34, 4080000),
(11, 13, 1, '0788826149', '12', 'isimbimaryse@gmail.rw', 43, 5203000),
(12, 13, 1, '0788890071', '8', 'rwanda@gmail.rw', 23, 2783000),
(13, 15, 1, '0784494820', '10', 'renemucyomucici@gmail.com', 5454, 654480000),
(14, 12, 1, '0784494820', '20', 'renemucyomucici@gmail.com', 12, 1080000),
(15, 15, 1, '0784494820', '14', 'renemucyomucici@gmail.com', 343, 41160000),
(16, 15, 1, '0784494820', '27', 'renemucyomucici@gmail.com', 44, 5280000);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `phoneName` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `phoneDescriptions` varchar(255) NOT NULL,
  `phoneImange` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `phoneName`, `price`, `phoneDescriptions`, `phoneImange`, `quantity`) VALUES
(2, 'Phantom 1', '150000', '12 Inch, 4G', 'phone1.jfif', '23'),
(8, 'Phantom 5', '200000', '5G AND NIBINDIggg', 'phone3.jfif', '15'),
(9, 'Phantom 5', '2500000', 'FDSALFSALFL FJSLKLKS FDJK', 'phone3.jfif', '43'),
(10, 'CAMON 12', '110000', 'Some of descriptions of CAMON C12 experienced', 'phone2.jfif', '0'),
(12, 'CAMON C11', '90000', 'Camon c11 is the teckno\'s latest version of recent camon that the teckno users should have to experience', 'phone3.jfif', '33'),
(13, 'CAMON C 10', '121000', 'This is the best phone ever that we are encouraging you to buy it\'s strong and it have warrant of two years after one or certain BASIC', 'phone1.jfif', '0'),
(15, 'CAMON C X Pro', '120000', 'Lorem lorem lorem harry up harry up this is super and super phone that, as a techno board we are encouraging you to by but it is too cheap and is strong', 'phone2.jfif', '-1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phoneFk1` (`phoneId`),
  ADD KEY `customerFk` (`customerId`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customerFk` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phoneFk1` FOREIGN KEY (`phoneId`) REFERENCES `phones` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
