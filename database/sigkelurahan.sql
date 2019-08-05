-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2019 at 05:02 AM
-- Server version: 10.2.23-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u873233258_sig`
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
  `alamat` text NOT NULL,
  `foto` varchar(199) NOT NULL,
  `latitude` varchar(199) NOT NULL,
  `longtitude` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `id_kelurahan`, `id_operator`, `data_lokasi`, `alamat`, `foto`, `latitude`, `longtitude`) VALUES
(1, 1, 1, 'https://goo.gl/maps/5a8kMQib7gWWbd13A', 'Jalan Raya Sesetan No.514, Denpasar Selatan, Sesetan, Denpasar, Kota Denpasar, Bali 80223', 'sesetan.png', '-8.7015117', '115.2169513'),
(2, 2, 2, 'https://goo.gl/maps/NrvAMjUZtzs7fupv9', 'Jl. Tukad Pakerisan No.65, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80225', 'panjer.png', '-8.6841154', '115.2241413'),
(3, 3, 3, 'https://goo.gl/maps/xxQLSj1UTzbormrX7', 'Jl. Pulau Belitung No.1, Pedungan, Kec. Denpasar Sel., Kota Denpasar, Bali 80114', 'pedungan.png', '-8.7138121', '115.1755033'),
(4, 4, 4, 'https://goo.gl/maps/HjuULj3RF2nRnez79', 'Jl. Tukad Balian No.109, Renon, Kec. Denpasar Sel., Kota Denpasar, Bali 80226', 'renon.png', '-8.6857758', '115.2375249'),
(5, 6, 6, 'https://goo.gl/maps/36f5sqmUqQ6u2zNS7', 'Jl. Tukad Pekaseh No.11, Serangan, Kec. Denpasar Sel., Kota Denpasar, Bali 80229', 'serangan.png', '-8.7253163', '115.232482'),
(6, 5, 5, 'https://goo.gl/maps/jtYJGsJYePBA6AZo7', 'Jl. Danau Tondano No.60, Sanur, Kec. Denpasar Sel., Kota Denpasar, Bali 80227', 'sanur.png', '-8.6800382', '115.2544539');

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
-- Dumping data for table `program_kerja`
--

INSERT INTO `program_kerja` (`id_program_kerja`, `id_kelurahan`, `id_operator`, `judul`, `tanggal`, `keterangan`, `status`) VALUES
(1, 5, 5, 'lomba', '2019-07-02', 'm\r\na\r\nn\r\nt\r\na\r\np\r\n', 'aktif'),
(2, 3, 3, 'launching tari maskot, mars dan hymne pedungan', '2019-08-21', 'Bertepatan dengan Hari Sumpah Pemuda , telah berlangsung acara peresmian Tari Maskot dan Hymne Pedungan (28/10/2018). Acara ini berlangsung di Br.Pande Kelurahan Pedungan\r\n\r\nSelain mewujudkan Visi dan Misi Kota Denpasar. Tujuan dari Peluncuran Tari Maskot Mars dan Hymne Pedungan ini yakni sebagai rasa syukur kehadapan Leluhur yang telah berjuang pada masanya dan meninggalkan sebuah peninggalan yang bernilai estetika yaitu berkaitan dengan sejarah Peduwungan yang memiliki arti \"Saung Keris\" bisa dibuktikan dengan adanya peninggalan Pura Dalem Pakerisan yang dulunya sampai sekarang adalah tempat penyimpanan Keris Pusaka yang saat ini Mesimpen/Megenahan di Pura Pererepan Dalem Pakerisan Banjar Sawah Pedungan , maka dengan itu Tarian ini diberinama ”Satria Wirang” yang artinya Satria = Berani Wirang= Nindihin / Mengabdi, jadi Satria Wirang memiliki filosofi Harus berani berjuang dan berusaha dalam pengabdian di tanah kelahiran ujar Anak Agung Oka Adnyana. Dan nanti kedepannya Mars dan Hymne ini akan di perlombkan di tingkat Sekehe Truna, demi tetap menjaga eksistensi Mars dan Hymne Pedungan.', 'aktif'),
(3, 3, 3, 'Pencetakan E-KTP', '2019-08-15', 'Pengumuman Bagi Warga Pedungan . Untuk Proses Pencetakan Hasil E-KTP yang baru bisa diambil di Kepala Lingkungan Masing-masing dengan membawa Kwitansi Perekaman E-KTP.\r\n\r\nJika KTP tidak tercetak, mohon Kwitansi diSahkan dengan tanda Tangan dan Cap dari Kepala Lingkungan dan Kelurahan kemudian disampaikan langsung Ke Dinas Kependudukan dan Catatan Sipil Kota Denpasar untuk ditindak Lanjut .\r\n\r\nAn, Staf Kel Pedungan . Terima Kasih', 'aktif'),
(4, 1, 1, 'Pencetakan E-KTP', '2019-08-02', 'Pengumuman Bagi Warga Pedungan . Untuk Proses Pencetakan Hasil E-KTP yang baru bisa diambil di Kepala Lingkungan Masing-masing dengan membawa Kwitansi Perekaman E-KTP.\r\n\r\nJika KTP tidak tercetak, mohon Kwitansi diSahkan dengan tanda Tangan dan Cap dari Kepala Lingkungan dan Kelurahan kemudian disampaikan langsung Ke Dinas Kependudukan dan Catatan Sipil Kota Denpasar untuk ditindak Lanjut .\r\n\r\nAn, Staf Kel sesetan. Terima Kasih', 'aktif'),
(5, 2, 2, 'Pencetakan E-KTP', '2019-08-02', 'Pengumuman Bagi Warga Pedungan . Untuk Proses Pencetakan Hasil E-KTP yang baru bisa diambil di Kepala Lingkungan Masing-masing dengan membawa Kwitansi Perekaman E-KTP.\r\n\r\nJika KTP tidak tercetak, mohon Kwitansi diSahkan dengan tanda Tangan dan Cap dari Kepala Lingkungan dan Kelurahan kemudian disampaikan langsung Ke Dinas Kependudukan dan Catatan Sipil Kota Denpasar untuk ditindak Lanjut .\r\n\r\nAn, Staf Kel Panjer. Terima Kasih', 'aktif'),
(6, 6, 6, 'Pencetakan E-KTP', '2019-08-02', 'Pengumuman Bagi Warga Pedungan . Untuk Proses Pencetakan Hasil E-KTP yang baru bisa diambil di Kepala Lingkungan Masing-masing dengan membawa Kwitansi Perekaman E-KTP.\r\n\r\nJika KTP tidak tercetak, mohon Kwitansi diSahkan dengan tanda Tangan dan Cap dari Kepala Lingkungan dan Kelurahan kemudian disampaikan langsung Ke Dinas Kependudukan dan Catatan Sipil Kota Denpasar untuk ditindak Lanjut .\r\n\r\nAn, Staf Kel Serangan. Terima Kasih', 'aktif'),
(7, 4, 4, 'Pencetakan E-KTP', '2019-08-02', 'Pengumuman Bagi Warga Pedungan . Untuk Proses Pencetakan Hasil E-KTP yang baru bisa diambil di Kepala Lingkungan Masing-masing dengan membawa Kwitansi Perekaman E-KTP.\r\n\r\nJika KTP tidak tercetak, mohon Kwitansi diSahkan dengan tanda Tangan dan Cap dari Kepala Lingkungan dan Kelurahan kemudian disampaikan langsung Ke Dinas Kependudukan dan Catatan Sipil Kota Denpasar untuk ditindak Lanjut .\r\n\r\nAn, Staf Kel Renon. Terima Kasih', 'aktif'),
(8, 5, 5, 'Pencetakan E-KTP', '2019-08-15', 'Pengumuman Bagi Warga Pedungan . Untuk Proses Pencetakan Hasil E-KTP yang baru bisa diambil di Kepala Lingkungan Masing-masing dengan membawa Kwitansi Perekaman E-KTP.\r\n\r\nJika KTP tidak tercetak, mohon Kwitansi diSahkan dengan tanda Tangan dan Cap dari Kepala Lingkungan dan Kelurahan kemudian disampaikan langsung Ke Dinas Kependudukan dan Catatan Sipil Kota Denpasar untuk ditindak Lanjut .\r\n\r\nAn, Staf Kel Sanur. Terima Kasih', 'aktif');

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
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id_program_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
