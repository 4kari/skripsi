-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 07:52 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lay_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_skripsi` int(11) NOT NULL,
  `penilai` varchar(32) NOT NULL,
  `kode_penilaian` int(2) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_skripsi`, `penilai`, `kode_penilaian`, `nilai`) VALUES
(1, 2, '170411100099', 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sasaran`
--

CREATE TABLE `sasaran` (
  `id` int(2) NOT NULL,
  `keterangan` varchar(64) NOT NULL,
  `tipe` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sasaran`
--

INSERT INTO `sasaran` (`id`, `keterangan`, `tipe`) VALUES
(1, 'motivasi', 1),
(2, 'inisiatif', 1),
(3, 'kreatifitas', 1),
(4, 'analisis dan sintetis', 1),
(5, 'Keaktifan, disiplin, dan kerjasama', 3),
(6, 'Penyajian penulisan Laporan Tugas Akhir', 3),
(7, 'Penguasaan materi dan obyektifitas dalam menanggapi pertanyaan', 3),
(8, 'Kemampuan menjelaskan dan mempertahankan ide', 3),
(9, 'Hasil yang dicapai', 3),
(10, 'Persiapan sidang tugas akhir', 3),
(11, 'Sikap dan penampilan sidang', 3),
(12, 'Penyajian penulisan Laporan Tugas Akhir', 3);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id` int(11) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `abstrak` varchar(128) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `pembimbing_1` varchar(18) NOT NULL,
  `pembimbing_2` varchar(18) NOT NULL,
  `penguji_1` varchar(18) NOT NULL,
  `penguji_2` varchar(18) NOT NULL,
  `penguji_3` varchar(18) NOT NULL,
  `status` int(2) NOT NULL,
  `nilai` int(3) NOT NULL,
  `berkas` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id`, `judul`, `abstrak`, `nim`, `pembimbing_1`, `pembimbing_2`, `penguji_1`, `penguji_2`, `penguji_3`, `status`, `nilai`, `berkas`) VALUES
(2, 'coba', 'coba abstrak', '170411100099', '170411100099', '170411100099', '170411100099', '170411100099', '170411100099', 2, 0, 'none.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(2) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'mendaftarkan skripsi'),
(2, 'peserta seminar proposal'),
(3, 'bimbingan skripsi'),
(4, 'mengajukan sidang skripsi'),
(5, 'peserta ujian sidang skripsi'),
(6, 'skripsi sedang dinilai'),
(7, 'skripsi lulus'),
(8, 'skripsi gagal'),
(9, 'mengupload laporan skripsi'),
(10, 'peserta seminar ulang proposal'),
(11, 'peserta sidang ulang skripsi');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id` int(2) NOT NULL,
  `keterangan` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id`, `keterangan`) VALUES
(1, 'bimbingan'),
(2, 'seminar proposal'),
(3, 'sidang skripsi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_sasaran` (`kode_penilaian`),
  ADD KEY `penilaian_skripsi` (`id_skripsi`);

--
-- Indexes for table `sasaran`
--
ALTER TABLE `sasaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sasaran_tipe` (`tipe`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skripsi_status` (`status`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sasaran`
--
ALTER TABLE `sasaran`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_sasaran` FOREIGN KEY (`kode_penilaian`) REFERENCES `sasaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_skripsi` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id`);

--
-- Constraints for table `sasaran`
--
ALTER TABLE `sasaran`
  ADD CONSTRAINT `sasaran_tipe` FOREIGN KEY (`tipe`) REFERENCES `tipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
