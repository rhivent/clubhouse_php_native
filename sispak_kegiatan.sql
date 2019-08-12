-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2019 pada 14.26
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispak_kegiatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kesimpulan`
--

CREATE TABLE `tb_kesimpulan` (
  `kode_kesimpulan` int(11) NOT NULL,
  `solusi` varchar(50) NOT NULL,
  `fakta` varchar(100) NOT NULL,
  `oleh` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kesimpulan`
--

INSERT INTO `tb_kesimpulan` (`kode_kesimpulan`, `solusi`, `fakta`, `oleh`, `status`) VALUES
(1, 'a1', 'Ringan', 'pakar', 'setuju'),
(2, 'a2', 'Sedang', 'pakar', 'setuju'),
(3, 'a3', 'Berat', 'pakar', 'setuju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `kode_pertanyaan` varchar(50) NOT NULL,
  `isi_pertanyaan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`kode_pertanyaan`, `isi_pertanyaan`) VALUES
('k1', 'Apakah Anda dalam melakukan aktifitas sering dengan berjalan kaki ?'),
('k10', 'Apakah Anda sering melakukan aktifitas mengajar ?'),
('k11-a', 'Apakah Anda sering melakukan aktifitas angkat beban ?'),
('k11-b', 'Apakah Anda sering melakukan aktifitas angkat beban ?'),
('k12', 'Apakah Anda sering melakukan aktifitas di luar ruangan ?'),
('k13', 'Apakah Anda sering melakukan aktifitas pekerjaan konstruksi ?'),
('k14', 'Apakah Anda sering melakukan aktifitas berkebun ?'),
('k15', 'Apakah Anda sering melakukan aktifitas bertani ?'),
('k2', 'Apakah Anda sering melakukan aktifitas mencuci ?'),
('k3', 'Apakah Anda sering melakukan aktifitas membersihkan rumah ?'),
('k4', 'Apakah Anda sering travelling ?'),
('k5', 'Apakah Anda sering berbelanja ?'),
('k6', 'Apakah Anda sering menggunakan atau mengendarai kendaraan ?'),
('k7', 'Apakah Anda sering melakukan aktifitas dalam ruangan ?'),
('k8', 'Apakah Anda sering melakukan aktifitas mengetik ?'),
('k9', 'Apakah Anda sering menggunakan komputer ?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_solusi`
--

CREATE TABLE `tb_solusi` (
  `kode_solusi` varchar(50) NOT NULL,
  `isi_solusi` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_solusi`
--

INSERT INTO `tb_solusi` (`kode_solusi`, `isi_solusi`, `keterangan`) VALUES
('a1', '1,55', 'Perempuan'),
('a2', '1,70', 'Perempuan'),
('a3', '2,00', 'Perempuan'),
('a1', '1,65', 'Laki-Laki'),
('a2', '1,76', 'Laki-Laki'),
('a3', '2,10', 'Laki-Laki');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kesimpulan`
--
ALTER TABLE `tb_kesimpulan`
  ADD PRIMARY KEY (`kode_kesimpulan`);

--
-- Indeks untuk tabel `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`kode_pertanyaan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kesimpulan`
--
ALTER TABLE `tb_kesimpulan`
  MODIFY `kode_kesimpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
