-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2019 at 05:05 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigkelurahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `nama_kelurahan` varchar(199) NOT NULL,
  `nama_lurah` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `nama_kelurahan`, `nama_lurah`) VALUES
(1, 'Kelurahan Sesetan', 'Ketut Sri Karyawati, SKM.M.Kes'),
(2, 'Kelurahan Panjer', 'I Made Rapog, Msi'),
(3, 'Kelurahan pedungan', 'Anak Agung Gede Oka, SE'),
(4, 'Kelurahan Renon', 'Luh Oka Ayu Arya Tustani, SE'),
(5, 'Kelurahan Sanur', 'Ida Bagus Raka Jisnu,S.Ag'),
(6, 'Kelurahan Serangan', 'I Wayan Karma, SIP,MH');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `data_lokasi` text NOT NULL,
  `foto` varchar(199) NOT NULL,
  `latitude` varchar(199) NOT NULL,
  `longtitude` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nama` varchar(199) NOT NULL,
  `email` varchar(199) NOT NULL,
  `username` varchar(199) NOT NULL,
  `password` varchar(199) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `id_kelurahan`, `nama`, `email`, `username`, `password`, `status`) VALUES
(1, 1, 'Eden Hazard', 'edenhazard@gmail.com', 'op.sesetan', 'e10adc3949ba59abbe56e057f20f883e', 'aktif'),
(2, 2, 'Masson Mount', 'massonmount@gmail.com', 'op.panjer', 'e10adc3949ba59abbe56e057f20f883e', 'aktif'),
(3, 3, 'bagus setiawan', 'bagussetiawan123@gmail.com', 'op.pedungan', '827ccb0eea8a706c4c34a16891f84e7b', 'aktif'),
(4, 4, 'eri setiawan', 'erisetiawan1@gmail.com', 'op.renon', '827ccb0eea8a706c4c34a16891f84e7b', 'aktif'),
(5, 5, 'komang', 'komang0@gmail.com', 'op.sanur', '827ccb0eea8a706c4c34a16891f84e7b', 'aktif'),
(6, 6, 'darmawan', 'darmawan2@gmail.com', 'op.serangan', '827ccb0eea8a706c4c34a16891f84e7b', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `program_kerja`
--

CREATE TABLE `program_kerja` (
  `id_program_kerja` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `judul` varchar(199) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD UNIQUE KEY `nama_kelurahan` (`nama_kelurahan`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `fk_id_kelurahan` (`id_kelurahan`),
  ADD KEY `fk_id_operator` (`id_operator`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`),
  ADD KEY `fk_id_kelurahan` (`id_kelurahan`);

--
-- Indexes for table `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`id_program_kerja`),
  ADD KEY `fk_id_kelurahan` (`id_kelurahan`),
  ADD KEY `fk_id_operator` (`id_operator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id_program_kerja` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
