-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2019 at 02:16 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clubhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_member`
--

CREATE TABLE `jenis_member` (
  `id_jenismember` int(11) NOT NULL,
  `kode_jenis_member` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jenis_member` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_member`
--

INSERT INTO `jenis_member` (`id_jenismember`, `kode_jenis_member`, `nama_jenis_member`) VALUES
(1, 'isidentil', 'Isidentil'),
(2, 'B1', 'Single'),
(3, 'B2', 'Couple'),
(4, 'B3', 'Group');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_paket`
--

CREATE TABLE `jenis_paket` (
  `id_jenis_paket` int(11) NOT NULL,
  `nama_jenis_paket` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terbilang` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_paket`
--

INSERT INTO `jenis_paket` (`id_jenis_paket`, `nama_jenis_paket`, `harga`, `terbilang`) VALUES
(1, 'Harian', '15000', 'Lima Belas Ribu Rupiah'),
(2, '1 Bulan', '450000', 'Empat Ratus Lima Puluh Ribu Rupiah'),
(3, '2 Bulan', '800000', 'Delapan Ratus Ribu Rupiah'),
(4, '3 Bulan', '1200000', 'Satu Juta Dua Ratus Ribu Rupiah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_umum`
--

CREATE TABLE `tbl_member_umum` (
  `id_umum` int(11) NOT NULL,
  `nomor_kartu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_umum` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_member` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `jenis_paket` int(11) NOT NULL DEFAULT '0',
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto_umum` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_aktifitas` datetime DEFAULT NULL,
  `masa_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_member_umum`
--

INSERT INTO `tbl_member_umum` (`id_umum`, `nomor_kartu`, `nama_umum`, `barcode`, `status`, `jenis_member`, `jenis_paket`, `alamat`, `tgl_lahir`, `foto_umum`, `biaya`, `tgl_aktifitas`, `masa_berlaku`) VALUES
(18, '34152', 'asdasdk ', 'qPzCG4pSTn', 'active', 'B1', 2, 'asdmakdmas damksd', '2019-08-06', '1565497777_testgmbar.jpg', '450000', '2019-08-11 00:00:00', '2019-09-10'),
(28, '25942', 'Master', 'rhOaoQkdDz', 'active', 'isidentil', 1, 'asdasmdkamskdas', '2019-08-16', '1565587081_3.jpg', '15000', '2019-08-11 00:00:00', '2019-08-13'),
(36, '25942', 'asdkamdm', 'rhOaoQkdDz', 'active', 'B1', 4, 'asdasmdkamskdas', '2019-08-16', '1565590576_testgmbar.jpg', '1200000', '2019-08-11 00:00:00', '2019-11-10'),
(48, '25942', 'asdkamdm', 'rhOaoQkdDz', 'active', 'B1', 4, 'asdasmdkamskdas', '2019-08-16', '1565614185_1.jpg', '1200000', '2019-08-11 00:00:00', '2019-11-10'),
(56, '25942', 'asdkamdm', 'rhOaoQkdDz', 'active', 'B1', 4, 'asdasmdkamskdas', '2019-08-16', '1565498895_sftp key qovarcom.png', '1200000', '2019-08-11 00:00:00', '2019-11-09'),
(57, '25942', 'asdkamdm', 'rhOaoQkdDz', 'active', 'B1', 4, 'asdasmdkamskdas', '2019-08-16', '1565498895_sftp key qovarcom.png', '1200000', '2019-08-11 00:00:00', '2019-11-09'),
(58, '25942', 'asdkamdm', 'rhOaoQkdDz', 'active', 'B1', 4, 'asdasmdkamskdas', '2019-08-16', '1565498895_sftp key qovarcom.png', '1200000', '2019-08-11 00:00:00', '2019-11-09'),
(59, '123123', 'asdkamdm', 'rhOaoQkdDz', 'active', 'B1', 4, 'asdasmdkamskdas', '2019-08-16', '1565498895_sftp key qovarcom.png', '1200000', '2019-08-11 00:00:00', '2019-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_warga`
--

CREATE TABLE `tbl_member_warga` (
  `id_warga` int(11) NOT NULL,
  `no_kavling` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_warga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_warga` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_member_warga`
--

INSERT INTO `tbl_member_warga` (`id_warga`, `no_kavling`, `nama_warga`, `telp`, `tgl_daftar`, `barcode`, `foto_warga`) VALUES
(9, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(10, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(11, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(12, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(13, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(14, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(15, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(16, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(17, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(18, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(19, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(20, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(21, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(22, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(23, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(24, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(25, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(26, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(27, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(28, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(29, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(30, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(31, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(32, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(33, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(34, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(35, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(36, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(37, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(38, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(39, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(40, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(41, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(42, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(43, 'ohohoh', 'amskdmaskdma', '10331', '2019-08-11 04:43:12', 'JiuB8SvXgq', '1565498592_Roadmap_qovar.io.PNG'),
(45, 'm67', 'qww', '09877', '2019-08-12 12:40:06', 'RUA32xCnVF', '1565613606_1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_member`
--
ALTER TABLE `jenis_member`
  ADD PRIMARY KEY (`id_jenismember`);

--
-- Indexes for table `jenis_paket`
--
ALTER TABLE `jenis_paket`
  ADD PRIMARY KEY (`id_jenis_paket`);

--
-- Indexes for table `tbl_member_umum`
--
ALTER TABLE `tbl_member_umum`
  ADD PRIMARY KEY (`id_umum`);

--
-- Indexes for table `tbl_member_warga`
--
ALTER TABLE `tbl_member_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_member`
--
ALTER TABLE `jenis_member`
  MODIFY `id_jenismember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_paket`
--
ALTER TABLE `jenis_paket`
  MODIFY `id_jenis_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member_umum`
--
ALTER TABLE `tbl_member_umum`
  MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_member_warga`
--
ALTER TABLE `tbl_member_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
