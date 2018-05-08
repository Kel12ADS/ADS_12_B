-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Mei 2018 pada 14.23
-- Versi Server: 10.1.10-MariaDB-log
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_wp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads12_alternatif`
--

CREATE TABLE `ads12_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_pengguna` int(99) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads12_alternatif`
--

INSERT INTO `ads12_alternatif` (`id_alternatif`, `id_pengguna`, `nama_alternatif`, `vektor_s`, `vektor_v`) VALUES
(15, 1, 'Web Designer', 4.307284377527542, 0.19410684107649),
(16, 1, 'Programmer', 5.554507145161692, 0.33875330132127),
(21, 2, 'Programmer', 2.843176514746282, 0.11020889969172),
(22, 2, 'System Analyst', 3.6919412280888366, 0.14310922250653);

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
(36, 1, 0.029411764705882),
(37, 4, 0.11764705882353),
(38, 5, 0.14705882352941),
(39, 4, 0.11764705882353),
(40, 5, 0.14705882352941),
(41, 5, 0.14705882352941),
(42, 5, 0.14705882352941),
(43, 5, 0.14705882352941);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads12_khs`
--

CREATE TABLE `ads12_khs` (
  `id_pengguna` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_mhs` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(36, 'Kalkulus - Web Designer', 'benefit'),
(37, 'Kalkulus - Programmer', 'benefit'),
(38, 'Analisis Desain Sistem - Web Designer', 'benefit'),
(39, 'Analisis Desain Sistem - Programmer', 'benefit'),
(40, 'Algoritma dan Pemrograman - Web Designer', 'benefit'),
(41, 'Algoritma dan Pemrograman - Programmer', 'benefit'),
(42, 'Kalkulus - System Analyst', 'benefit'),
(43, 'Analisis Desain Sistem - System Analyst', 'benefit');

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
  `nim_mhs` bigint(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads12_pengguna`
--

INSERT INTO `ads12_pengguna` (`id_pengguna`, `nim_mhs`, `nama_lengkap`, `username`, `password`) VALUES
(1, 150535604105, 'Muhammad Fahmi Hidayat', '150535604105', '21232f297a57a5a743894a0e4a801fc3'),
(2, 150535600100, 'Test', 'test', '098f6bcd4621d373cade4e832627b4f6'),
(9, 150535604100, 'Muhammad Hidayat', '150535604100', '5f4dcc3b5aa765d61d8327deb882cf99'),
(100, 0, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ads12_rangking`
--

CREATE TABLE `ads12_rangking` (
  `id_pengguna` int(99) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_rangking` double NOT NULL,
  `nilai_normalisasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ads12_rangking`
--

INSERT INTO `ads12_rangking` (`id_pengguna`, `id_alternatif`, `id_kriteria`, `nilai_rangking`, `nilai_normalisasi`) VALUES
(1, 15, 36, 80, 1.1375571772727),
(1, 15, 38, 90, 1.9381554391753),
(1, 15, 40, 95, 1.9536272603382),
(1, 16, 37, 80, 1.6745300274093),
(1, 16, 39, 90, 1.6978952113179),
(1, 16, 41, 95, 1.9536272603382),
(2, 21, 37, 80, 1.6745300274093),
(2, 21, 39, 90, 1.6978952113179),
(2, 22, 42, 80, 1.9048736512381),
(2, 22, 43, 90, 1.9381554391753);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads12_alternatif`
--
ALTER TABLE `ads12_alternatif`
  ADD PRIMARY KEY (`id_alternatif`,`id_pengguna`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `ads12_bobot`
--
ALTER TABLE `ads12_bobot`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `ads12_khs`
--
ALTER TABLE `ads12_khs`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `id_kriteria` (`id_kriteria`);

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
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `nim_mhs` (`nim_mhs`);

--
-- Indexes for table `ads12_rangking`
--
ALTER TABLE `ads12_rangking`
  ADD PRIMARY KEY (`id_alternatif`,`id_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `nim_mhs` (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads12_alternatif`
--
ALTER TABLE `ads12_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ads12_kriteria`
--
ALTER TABLE `ads12_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `ads12_nilai`
--
ALTER TABLE `ads12_nilai`
  MODIFY `id_nilai` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ads12_pengguna`
--
ALTER TABLE `ads12_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ads12_alternatif`
--
ALTER TABLE `ads12_alternatif`
  ADD CONSTRAINT `ads12_alternatif_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `ads12_pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `ads12_bobot`
--
ALTER TABLE `ads12_bobot`
  ADD CONSTRAINT `ads12_bobot_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `ads12_kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `ads12_khs`
--
ALTER TABLE `ads12_khs`
  ADD CONSTRAINT `ads12_khs_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `ads12_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `ads12_khs_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `ads12_kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `ads12_rangking`
--
ALTER TABLE `ads12_rangking`
  ADD CONSTRAINT `rangking_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `ads12_alternatif` (`id_alternatif`),
  ADD CONSTRAINT `rangking_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `ads12_kriteria` (`id_kriteria`),
  ADD CONSTRAINT `ads12_rangking_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `ads12_pengguna` (`id_pengguna`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
