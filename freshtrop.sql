-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 12:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshtrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email_ID` varchar(100) NOT NULL,
  `Contact_No` text NOT NULL,
  `Gender` text NOT NULL,
  `Organisation_Name` text NOT NULL,
  `Visit_Date` varchar(100) NOT NULL,
  `Visit_Time` varchar(100) NOT NULL,
  `Leave_Time` varchar(100) NOT NULL,
  `Concern_Person` varchar(100) NOT NULL,
  `Purpose` varchar(100) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`ID`, `Name`, `Address`, `Email_ID`, `Contact_No`, `Gender`, `Organisation_Name`, `Visit_Date`, `Visit_Time`, `Leave_Time`, `Concern_Person`, `Purpose`, `Status`) VALUES
(3, 'Vaibhav Kalani', 'Delhi, India', 'vaibhav@gmail.com', '9632587410', 'Male', 'Faceprep', '1998-12-23', '12:34', '14:00', 'Sachin Shejul', 'Faceprep', 'Approved'),
(4, 'Jasmin Nevada', 'Punjab,India', 'jasmin@gmail.com', '9632587410', 'Female', 'Hackathon', '2019-11-18', '12:30', '14:00', 'Aniket Kulkarni', 'Hackathon', 'Pending'),
(5, 'Sachin Raysoni', 'Ulhasnagar', 'sachin09shejul@gmail.com', '9632587410', 'Male', 'Amcat', '2019-11-18', '15:30', '17:00', 'Aniket Kulkarni', 'Amcat', 'Pending'),
(6, 'Sagar Auti', 'baba petrol pump', 'sagar@gmail.com', '9632587410', 'Male', 'Videocon', '2019-11-19', '15:30', '17:00', 'Sachin Shejul', 'videocon', 'Pending'),
(7, 'Saumya Gurane', 'indore madhya pradesh', 'saumya@yahho.com', '9632587410', 'Male', 'TCS', '2019-11-19', '13:30', '14:00', 'Sachin Shejul', 'TCS', 'Pending'),
(9, 'Komal Kanse', 'n-12 aurangabad', 'komal@ac.in', '9632587410', 'Female', 'GECA', '2019-11-20', '13:30', '14:00', 'Sachin Shejul', 'become aware of happiness once you have lost it. Then an age comes, a second one, in which you alrea', 'Pending'),
(10, 'Varad Kumavat', 'n-12 aurangabad', 'sachin09shejul@gmail.com', '9632587410', 'Female', 'GECA', '2019-11-21', '13:30', '14:00', 'Sachin Shejul', 'become aware of happiness once you have lost it. Then an age comes, a second one, in which you alrea', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
