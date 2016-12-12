-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2016 at 12:44 PM
-- Server version: 5.6.32
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a2`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`) VALUES
(0, 'Egg McMuffin'),
(1, 'Sausage McMuffin'),
(2, 'Bagel BLT'),
(3, 'Sausage & Hash Brown Breakfast Wrap'),
(4, 'Coffee');

-- --------------------------------------------------------

--
-- Table structure for table `recipesupplies`
--

CREATE TABLE `recipesupplies` (
  `recipeID` int(11) NOT NULL,
  `supplyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipesupplies`
--

INSERT INTO `recipesupplies` (`recipeID`, `supplyID`) VALUES
(0, 0),
(0, 4),
(0, 7),
(0, 11),
(1, 0),
(1, 1),
(1, 4),
(1, 7),
(2, 2),
(2, 3),
(2, 9),
(2, 10),
(3, 8),
(3, 1),
(3, 4),
(3, 5),
(3, 0),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `price`, `quantity`) VALUES
(0, 'Egg McMuffin', 3.5, 0),
(1, 'Sausage McMuffin', 4, 0),
(2, 'Bagel BLT', 5, 0),
(3, 'Sausage & Hash Brown Breakfast Wrap', 5.5, 0),
(4, 'Coffee', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `onHand` varchar(128) NOT NULL,
  `containersPerShipment` int(11) NOT NULL,
  `containers` int(11) NOT NULL,
  `itemsPerContainer` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `name`, `onHand`, `containersPerShipment`, `containers`, `itemsPerContainer`, `cost`) VALUES
(0, 'Egg', '0', 20, 0, 12, 3),
(1, 'Sausage', '0', 30, 0, 10, 7),
(2, 'Bagel', '0', 30, 0, 6, 5),
(3, 'Bacon', '0', 10, 0, 10, 5),
(4, 'Cheese', '0', 10, 0, 10, 5),
(5, 'Hash Brown', '0', 10, 0, 10, 5),
(6, 'Coffee Beans', '0', 10, 0, 10, 5),
(7, 'English Muffin', '0', 10, 0, 10, 5),
(8, 'Tortilla', '0', 10, 0, 10, 5),
(9, 'Tomato', '0', 10, 0, 10, 5),
(10, 'Lettuce', '0', 10, 0, 10, 5),
(11, 'Canadian Bacon', '0', 10, 0, 10, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipesupplies`
--
ALTER TABLE `recipesupplies`
  ADD KEY `recipeID` (`recipeID`),
  ADD KEY `supplyID` (`supplyID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipesupplies`
--
ALTER TABLE `recipesupplies`
  ADD CONSTRAINT `recipesupplies_ibfk_1` FOREIGN KEY (`recipeID`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `recipesupplies_ibfk_2` FOREIGN KEY (`supplyID`) REFERENCES `supplies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
