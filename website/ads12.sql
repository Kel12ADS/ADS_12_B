-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Apr 2018 pada 18.13
-- Versi Server: 10.1.10-MariaDB-log
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ads12`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads12_alternatif`
--

CREATE TABLE `ads12_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads12_alternatif`
--

INSERT INTO `ads12_alternatif` (`id_alternatif`, `nama_alternatif`, `vektor_s`, `vektor_v`) VALUES
(15, 'Web Designer', 80.0000000000031, 0.33333333333333),
(16, 'Programmer', 80.0000000000031, 0.33333333333333),
(17, 'System Analyst', 80.0000000000031, 0.33333333333333);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads12_bobot`
--

CREATE TABLE `ads12_bobot` (
  `id_kriteria` int(11) NOT NULL,
  `nilai_bobot` double NOT NULL,
  `hasil_bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads12_bobot`
--

INSERT INTO `ads12_bobot` (`id_kriteria`, `nilai_bobot`, `hasil_bobot`) VALUES
(32, 2, 0.13333333333333),
(33, 5, 0.33333333333333),
(34, 4, 0.26666666666667),
(35, 4, 0.26666666666667);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads12_kriteria`
--

CREATE TABLE `ads12_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `tipe_kriteria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads12_kriteria`
--

INSERT INTO `ads12_kriteria` (`id_kriteria`, `nama_kriteria`, `tipe_kriteria`) VALUES
(32, 'Kalkulus', 'benefit'),
(33, 'Analisis Desain Sistem', 'benefit'),
(34, 'Algoritma dan Pemrograman', 'benefit'),
(35, 'Pemrograman Web', 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads12_nilai`
--

CREATE TABLE `ads12_nilai` (
  `id_nilai` int(6) NOT NULL,
  `ket_nilai` varchar(45) NOT NULL,
  `jum_nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads12_nilai`
--

INSERT INTO `ads12_nilai` (`id_nilai`, `ket_nilai`, `jum_nilai`) VALUES
(20, 'Sangat Penting', 5),
(21, 'Penting', 4),
(22, 'Cukup Penting', 3),
(23, 'Kurang Penting', 2),
(24, 'Tidak Penting', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads12_pengguna`
--

CREATE TABLE `ads12_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads12_pengguna`
--

INSERT INTO `ads12_pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Muhammad Fahmi H.', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads12_rangking`
--

CREATE TABLE `ads12_rangking` (
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_rangking` double NOT NULL,
  `nilai_normalisasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads12_rangking`
--

INSERT INTO `ads12_rangking` (`id_alternatif`, `id_kriteria`, `nilai_rangking`, `nilai_normalisasi`) VALUES
(15, 32, 80, 1.7936815113239),
(15, 33, 80, 4.3088693800637),
(15, 34, 80, 3.2172933640653),
(15, 35, 80, 3.2172933640653),
(16, 32, 80, 1.7936815113239),
(16, 33, 80, 4.3088693800637),
(16, 34, 80, 3.2172933640653),
(16, 35, 80, 3.2172933640653),
(17, 32, 80, 1.7936815113239),
(17, 33, 80, 4.3088693800637),
(17, 34, 80, 3.2172933640653),
(17, 35, 80, 3.2172933640653);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads12_alternatif`
--
ALTER TABLE `ads12_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `ads12_bobot`
--
ALTER TABLE `ads12_bobot`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `ads12_kriteria`
--
ALTER TABLE `ads12_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `ads12_nilai`
--
ALTER TABLE `ads12_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `ads12_pengguna`
--
ALTER TABLE `ads12_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `ads12_rangking`
--
ALTER TABLE `ads12_rangking`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads12_alternatif`
--
ALTER TABLE `ads12_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ads12_kriteria`
--
ALTER TABLE `ads12_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `ads12_nilai`
--
ALTER TABLE `ads12_nilai`
  MODIFY `id_nilai` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ads12_pengguna`
--
ALTER TABLE `ads12_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ads12_bobot`
--
ALTER TABLE `ads12_bobot`
  ADD CONSTRAINT `ADS12_bobot_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `ads12_kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `ads12_rangking`
--
ALTER TABLE `ads12_rangking`
  ADD CONSTRAINT `rangking_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `ads12_alternatif` (`id_alternatif`),
  ADD CONSTRAINT `rangking_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `ads12_kriteria` (`id_kriteria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
