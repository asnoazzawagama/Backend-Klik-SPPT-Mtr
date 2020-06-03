-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 03:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restci`
--

-- --------------------------------------------------------

--
-- Table structure for table `sppt`
--

CREATE TABLE `sppt` (
  `nop` varchar(18) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `payment_flag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sppt`
--

INSERT INTO `sppt` (`nop`, `nama`, `tahun`, `alamat`, `password`, `payment_flag`) VALUES
('21781287218', 'asno', '2020', 'Pamanto', '8dad092fe72588900b2d1c60f0ad7b53', 'Tersampaikan'),
('527173001000401560', 'H. NURAINI', '2020', 'LK. KR.TALIWANG ', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tersampaikan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_person`
--

CREATE TABLE `tb_person` (
  `id` int(20) NOT NULL,
  `name` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_person`
--

INSERT INTO `tb_person` (`id`, `name`, `address`, `phone`) VALUES
(9, 'suprianto', 'jl. testing', '123'),
(10, 'suprianto', 'jl. testing', '123'),
(11, 'asno', 'jl. pamanto', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sppt`
--
ALTER TABLE `sppt`
  ADD PRIMARY KEY (`nop`);

--
-- Indexes for table `tb_person`
--
ALTER TABLE `tb_person`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_person`
--
ALTER TABLE `tb_person`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
