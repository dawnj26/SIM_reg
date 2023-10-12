-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 04:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `registered_sims`
--

CREATE TABLE `registered_sims` (
  `mobile_number` varchar(10) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email_address` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registered_sims`
--

INSERT INTO `registered_sims` (`mobile_number`, `first_name`, `last_name`, `birth_date`, `sex`, `address`, `email_address`) VALUES
('9206543222', 'Jayson', 'Quinto', '2023-10-12', 'Male', 'Urdaneta, Pangasinan', 'jaysonquinto1@outlook.com'),
('9560575513', 'Donn Jayson', 'Quinto', '2023-10-18', 'Female', 'Bayambang, Pangasinan', 'donnquinto@outlook.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registered_sims`
--
ALTER TABLE `registered_sims`
  ADD PRIMARY KEY (`mobile_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
