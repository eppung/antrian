-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 12:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `kode_layanan` varchar(10) NOT NULL,
  `no_antrian` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `kode_layanan` varchar(4) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `aktif` int(1) NOT NULL,
  `image` varchar(200) NOT NULL,
  `kode_loket` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `kode_layanan`, `nama_layanan`, `aktif`, `image`, `kode_loket`) VALUES
(7, 'SIAX', 'Poliklinik Jantung', 1, '09384e521c8263c50f225d6b3fb715b0.png', ''),
(14, 'NUQP', 'Poliklinik Paru', 1, '5df19377f579c46b611fc40b6903d4e1.jpg', ''),
(15, 'FDGX', 'Poliklinik Gigi', 1, '31ff2c231ff3d64481c620cf7ada4585.jpg', ''),
(16, 'ZVVS', 'Poliklinik Penyakit Dalam', 1, '05c03d115ad2f567389d8acf2235b460.png', ''),
(17, 'VQHL', 'Poliklinik Kandungan', 1, '4b4fca9956d9912947713938d078403b.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `loket`
--

CREATE TABLE `loket` (
  `id_loket` int(11) NOT NULL,
  `kode_loket` varchar(20) NOT NULL,
  `nama_loket` varchar(50) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loket`
--

INSERT INTO `loket` (`id_loket`, `kode_loket`, `nama_loket`, `aktif`) VALUES
(19, 'AMGS', 'Loket B', 1),
(20, 'NROC', 'Loket A', 1),
(21, 'POKJ', 'Loket C', 1),
(22, 'BXPV', 'Loket D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `param_antrian`
--

CREATE TABLE `param_antrian` (
  `id` int(11) NOT NULL,
  `kode_layanan` varchar(20) NOT NULL,
  `kode_loket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `param_komputer`
--

CREATE TABLE `param_komputer` (
  `id_setting` int(11) NOT NULL,
  `ip_komputer` varchar(20) NOT NULL,
  `kode_loket` varchar(20) NOT NULL,
  `ip_server_antrian` varchar(20) NOT NULL,
  `websocket` varchar(20) NOT NULL,
  `ip_display` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `param_komputer`
--

INSERT INTO `param_komputer` (`id_setting`, `ip_komputer`, `kode_loket`, `ip_server_antrian`, `websocket`, `ip_display`) VALUES
(2, '127.0.0.1', 'AMGS', '172.166.122.155', '172.166.122.6', '172.166.122.50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `loket`
--
ALTER TABLE `loket`
  ADD PRIMARY KEY (`id_loket`);

--
-- Indexes for table `param_antrian`
--
ALTER TABLE `param_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `param_komputer`
--
ALTER TABLE `param_komputer`
  ADD PRIMARY KEY (`id_setting`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `loket`
--
ALTER TABLE `loket`
  MODIFY `id_loket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `param_antrian`
--
ALTER TABLE `param_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `param_komputer`
--
ALTER TABLE `param_komputer`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
