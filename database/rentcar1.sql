-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 02:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `no_ktp`, `nama`, `email`, `username`, `password`, `role_id`) VALUES
(1, '1301180283', 'Titanupdate', 'tit@gmail.com', 'Titan', '73136282658283a597fa0a2979fa2543', 0),
(5, '111', 'test1', 'test1', 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 0),
(6, '123', 'masuk1', 'masuk1@gmail.com', 'masuk1', 'f927d1f6a634cd601e4c9feb76bf4f7e', 0),
(8, '1234', 'admin1', 'admin1@gmail.com', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(9, '121', 'customer1', 'customer1@gmail.com', 'customer1', 'ffbc4675f864e0e9aab8bdf7a0437010', 2);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_keinginan`
--

CREATE TABLE `daftar_keinginan` (
  `id_keinginan` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `id_mobil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_keinginan`
--

INSERT INTO `daftar_keinginan` (`id_keinginan`, `no_ktp`, `id_mobil`) VALUES
('1', '1301180283', '5'),
('2', '1301180283', '3'),
('3', '1301184032', '1'),
('4', '1301180076', '3');

-- --------------------------------------------------------

--
-- Table structure for table `history_pembayaran`
--

CREATE TABLE `history_pembayaran` (
  `id_history` varchar(255) NOT NULL,
  `id_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_pembayaran`
--

INSERT INTO `history_pembayaran` (`id_history`, `id_pembayaran`) VALUES
('1', '1'),
('2', '2'),
('3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `no_ktp_pemilik` varchar(255) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `plat_nomor` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `no_ktp_pemilik`, `nama_mobil`, `harga`, `warna`, `plat_nomor`, `deskripsi`, `status`, `gambar`) VALUES
(4, '111', 'jazz 2017', 400, 'putih', 'D 1 TO', 'boros bensin', '1', 'jazz1.jpg'),
(6, '222', 'avanza', 121, 'putih', 'D1113', 'mogok euy', '1', 'avanza1.jpg'),
(10, '333', 'fortuner 12', 121, 'putih', 'D441', 'wih', '0', 'fortuner11.jpeg'),
(11, '444', 'CR-v 2018', 232, 'putih', 'B 44U B', 'bau', '1', 'crv1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(255) NOT NULL,
  `id_pemesanan` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `total_harga`) VALUES
('1', '1', 269000000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `id_mobil` varchar(255) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `no_ktp`, `id_mobil`, `tanggal_pesan`, `tanggal_kembali`) VALUES
('1', '1301180238', '4', '2021-04-20', '2021-04-27'),
('2', '1301180076', '1', '2021-04-01', '2021-04-08'),
('3', '1301180351', '3', '2021-04-10', '2021-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_rental`
--

CREATE TABLE `pemilik_rental` (
  `no_ktp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik_rental`
--

INSERT INTO `pemilik_rental` (`no_ktp`, `nama`, `email`, `username`, `password`) VALUES
('123', 'Ahmad Kasim', 'ak@gmail.com', 'ahmadkasim', 'aamiin');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `jenis_mobil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `no_ktp`, `jenis_mobil`) VALUES
('1', '1301180283', 'Three Wheele Car (Becak)'),
('2', '1301180076', 'sok apa dulu weh bebas da masih nyobain'),
('3', '1301180351', 'kol buntung');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `id_mobil` varchar(255) NOT NULL,
  `bintang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `no_ktp`, `id_mobil`, `bintang`) VALUES
('1', '1301180238', '4', 4),
('2', '1301180076', '1', 5),
('3', '1301180351', '3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
