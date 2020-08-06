-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 10:09 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtask`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbltask`
--

CREATE TABLE `tbltask` (
  `Task_ID` int(22) NOT NULL,
  `Activity` varchar(100) NOT NULL,
  `Description` longtext NOT NULL,
  `Duration` time NOT NULL,
  `DateAdded` date NOT NULL,
  `Customer` char(25) NOT NULL,
  `TaskCategory` char(25) NOT NULL,
  `status` char(35) DEFAULT NULL,
  `DateUpdated` date DEFAULT NULL,
  `Comment` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbltaskuser`
--

CREATE TABLE `tbltaskuser` (
  `taskUser_ID` int(16) NOT NULL,
  `task_id` int(10) NOT NULL,
  `PersonResponsible` int(16) NOT NULL,
  `GivenBy` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblusercat`
--

CREATE TABLE `tblusercat` (
  `Cat_ID` int(22) NOT NULL,
  `CatName` char(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusercat`
--

INSERT INTO `tblusercat` (`Cat_ID`, `CatName`) VALUES
(1, 'HR'),
(2, 'Developer'),
(3, 'Employer'),
(4, 'Pacific'),
(5, 'GMBH');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `User_ID` int(16) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `FullName` char(35) NOT NULL,
  `Cat_ID` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`User_ID`, `User_name`, `FullName`, `Cat_ID`) VALUES
(1, 'schuur@rimpido.com', 'Dr. Jan Schuur', 3),
(2, 'zedda.lustre@rimpido.com', 'Zedda Lustre Schuur', 3),
(3, 'eivon.pescadero@rimpido.asia', 'Eivon Caselle Pescadero', 1),
(4, 'jessamine.cena@rimpido.asia', 'Jessamine Joy Cena', 2),
(5, 'kevin.mendi@rimpido.asia', 'Kevin Mendi', 2),
(6, 'ruel.wenceslao@rimpido.asia', 'Ruel Wenceslao II', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbltask`
--
ALTER TABLE `tbltask`
  ADD PRIMARY KEY (`Task_ID`);

--
-- Indexes for table `tbltaskuser`
--
ALTER TABLE `tbltaskuser`
  ADD PRIMARY KEY (`taskUser_ID`),
  ADD KEY `PersonResponsible` (`PersonResponsible`,`GivenBy`),
  ADD KEY `GivenBy` (`GivenBy`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `tblusercat`
--
ALTER TABLE `tblusercat`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `Cat_ID` (`Cat_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbltask`
--
ALTER TABLE `tbltask`
  MODIFY `Task_ID` int(22) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `User_ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbltaskuser`
--
ALTER TABLE `tbltaskuser`
  ADD CONSTRAINT `tbltaskuser_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tbltask` (`Task_ID`),
  ADD CONSTRAINT `tbltaskuser_ibfk_2` FOREIGN KEY (`PersonResponsible`) REFERENCES `tblusers` (`User_ID`),
  ADD CONSTRAINT `tbltaskuser_ibfk_3` FOREIGN KEY (`GivenBy`) REFERENCES `tblusers` (`User_ID`);

--
-- Constraints for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD CONSTRAINT `tblusers_ibfk_1` FOREIGN KEY (`Cat_ID`) REFERENCES `tblusercat` (`Cat_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
