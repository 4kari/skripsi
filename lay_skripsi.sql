-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2022 pada 11.17
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

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
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `id_skripsi` int(11) NOT NULL,
  `penilai` varchar(32) NOT NULL,
  `kode_penilaian` int(2) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `id_skripsi`, `penilai`, `kode_penilaian`, `nilai`) VALUES
(1, 1, '170411100042', 7, 80),
(2, 1, '170411100042', 8, 95),
(3, 1, '170411100042', 9, 78),
(4, 1, '170411100042', 10, 85),
(5, 1, '170411100042', 11, 88),
(6, 1, '170411100042', 12, 82),
(7, 1, '170411100042', 1, 100),
(8, 1, '170411100042', 2, 90),
(9, 1, '170411100042', 3, 100),
(10, 1, '170411100042', 4, 95),
(11, 1, '170411100042', 5, 98),
(12, 1, '170411100042', 6, 87),
(13, 1, '170411100024', 1, 88),
(14, 1, '170411100024', 2, 98),
(15, 1, '170411100024', 3, 89),
(16, 1, '170411100024', 4, 95),
(17, 1, '170411100024', 5, 98),
(18, 1, '170411100024', 6, 79),
(19, 1, '170411100024', 7, 99),
(20, 1, '170411100024', 8, 98),
(21, 1, '170411100024', 9, 88),
(22, 1, '170411100024', 10, 87),
(23, 1, '170411100024', 11, 79),
(24, 1, '170411100024', 12, 96),
(25, 1, '197406102008121002', 7, 95),
(26, 1, '197406102008121002', 8, 85),
(27, 1, '197406102008121002', 9, 89),
(28, 1, '197406102008121002', 10, 79),
(29, 1, '197406102008121002', 11, 98),
(30, 1, '197406102008121002', 12, 96),
(31, 1, '198002232008121001', 7, 88),
(32, 1, '198002232008121001', 8, 87),
(33, 1, '198002232008121001', 9, 98),
(34, 1, '198002232008121001', 10, 89),
(35, 1, '198002232008121001', 11, 96),
(36, 1, '198002232008121001', 12, 81),
(37, 1, '198609262014041001', 7, 88),
(38, 1, '198609262014041001', 8, 87),
(39, 1, '198609262014041001', 9, 98),
(40, 1, '198609262014041001', 10, 89),
(41, 1, '198609262014041001', 11, 86),
(42, 1, '198609262014041001', 12, 94),
(43, 4, '197406102008121002', 7, 95),
(44, 4, '197406102008121002', 8, 89),
(45, 4, '197406102008121002', 9, 85),
(46, 4, '197406102008121002', 10, 86),
(47, 4, '197406102008121002', 11, 96),
(48, 4, '197406102008121002', 12, 84),
(49, 4, '198002232008121001', 7, 88),
(50, 4, '198002232008121001', 8, 89),
(51, 4, '198002232008121001', 9, 95),
(52, 4, '198002232008121001', 10, 86),
(53, 4, '198002232008121001', 11, 94),
(54, 4, '198002232008121001', 12, 92),
(55, 4, '198002232008121001', 1, 95),
(56, 4, '198002232008121001', 2, 89),
(57, 4, '198002232008121001', 3, 95),
(58, 4, '198002232008121001', 4, 96),
(59, 4, '198002232008121001', 5, 94),
(60, 4, '198002232008121001', 6, 83),
(61, 4, '197406102008121002', 1, 88),
(62, 4, '197406102008121002', 2, 98),
(63, 4, '197406102008121002', 3, 89),
(64, 4, '197406102008121002', 4, 95),
(65, 4, '197406102008121002', 5, 96),
(66, 4, '197406102008121002', 6, 81),
(67, 4, '198101092006041003', 7, 98),
(68, 4, '198101092006041003', 8, 95),
(69, 4, '198101092006041003', 9, 86),
(70, 4, '198101092006041003', 10, 93),
(71, 4, '198101092006041003', 11, 94),
(72, 4, '198101092006041003', 12, 85),
(73, 4, '198609262014041001', 7, 88),
(74, 4, '198609262014041001', 8, 95),
(75, 4, '198609262014041001', 9, 86),
(76, 4, '198609262014041001', 10, 96),
(77, 4, '198609262014041001', 11, 83),
(78, 4, '198609262014041001', 12, 84),
(79, 4, '170411100042', 7, 98),
(80, 4, '170411100042', 8, 84),
(81, 4, '170411100042', 9, 78),
(82, 4, '170411100042', 10, 95),
(83, 4, '170411100042', 11, 83),
(85, 4, '170411100042', 12, 81),
(86, 6, '170411100042', 7, 80),
(87, 6, '170411100042', 8, 80),
(88, 6, '170411100042', 9, 80),
(89, 6, '170411100042', 10, 80),
(90, 6, '170411100042', 11, 80),
(91, 6, '170411100042', 12, 80),
(92, 6, '170411100042', 1, 80),
(93, 6, '170411100042', 2, 80),
(94, 6, '170411100042', 3, 80),
(95, 6, '170411100042', 4, 80),
(96, 6, '170411100042', 5, 80),
(97, 6, '170411100042', 6, 80),
(98, 6, '170411100024', 1, 80),
(99, 6, '170411100024', 2, 80),
(100, 6, '170411100024', 3, 80),
(101, 6, '170411100024', 4, 80),
(102, 6, '170411100024', 5, 80),
(103, 6, '170411100024', 6, 80),
(104, 6, '170411100024', 7, 80),
(105, 6, '170411100024', 8, 80),
(106, 6, '170411100024', 9, 80),
(107, 6, '170411100024', 10, 80),
(108, 6, '170411100024', 11, 80),
(109, 6, '170411100024', 12, 80),
(110, 6, '198002232008121001', 7, 80),
(111, 6, '198002232008121001', 8, 80),
(112, 6, '198002232008121001', 9, 80),
(113, 6, '198002232008121001', 10, 80),
(114, 6, '198002232008121001', 11, 80),
(115, 6, '198002232008121001', 12, 80),
(116, 6, '198101092006041003', 7, 80),
(117, 6, '198101092006041003', 8, 80),
(118, 6, '198101092006041003', 9, 80),
(119, 6, '198101092006041003', 10, 80),
(120, 6, '198101092006041003', 11, 80),
(121, 6, '198101092006041003', 12, 80),
(122, 6, '198609262014041001', 7, 80),
(123, 6, '198609262014041001', 8, 80),
(124, 6, '198609262014041001', 9, 80),
(125, 6, '198609262014041001', 10, 80),
(126, 6, '198609262014041001', 11, 80),
(127, 6, '198609262014041001', 12, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sasaran`
--

CREATE TABLE `sasaran` (
  `id` int(2) NOT NULL,
  `keterangan` varchar(64) NOT NULL,
  `tipe` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sasaran`
--

INSERT INTO `sasaran` (`id`, `keterangan`, `tipe`) VALUES
(1, 'motivasi', 1),
(2, 'inisiatif', 1),
(3, 'kreatifitas', 1),
(4, 'analisis dan sintetis', 1),
(5, 'Keaktifan, disiplin, dan kerjasama', 1),
(6, 'Penyajian penulisan Laporan Tugas Akhir', 1),
(7, 'Penguasaan materi dan obyektifitas dalam menanggapi pertanyaan', 3),
(8, 'Kemampuan menjelaskan dan mempertahankan ide', 3),
(9, 'Hasil yang dicapai', 3),
(10, 'Persiapan sidang tugas akhir', 3),
(11, 'Sikap dan penampilan sidang', 3),
(12, 'Penyajian penulisan Laporan Tugas Akhir', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id` int(11) NOT NULL,
  `judul` varchar(64) DEFAULT NULL,
  `topik` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `pembimbing_1` varchar(18) DEFAULT NULL,
  `pembimbing_2` varchar(18) DEFAULT NULL,
  `penguji_1` varchar(18) DEFAULT NULL,
  `penguji_2` varchar(18) DEFAULT NULL,
  `penguji_3` varchar(18) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `nilai` int(3) DEFAULT NULL,
  `berkas` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`id`, `judul`, `topik`, `nim`, `pembimbing_1`, `pembimbing_2`, `penguji_1`, `penguji_2`, `penguji_3`, `status`, `nilai`, `berkas`) VALUES
(1, NULL, 1, '170411100099', '170411100042', '170411100024', '197406102008121002', '198002232008121001', '198609262014041001', 6, 91, 'percobaan'),
(2, NULL, 1, '170411100119', '170411100042', '170411100024', NULL, NULL, NULL, 1, NULL, NULL),
(3, NULL, 1, '170411100122', '170411100042', '170411100024', '197406102008121002', '198002232008121001', '198609262014041001', 5, NULL, NULL),
(4, 'Klasifikasi Penyakit Daun Kentang Menggunakan Multiclass SVM', 2, '170411100106', '198002232008121001', '197406102008121002', '198101092006041003', '170411100042', '198609262014041001', 7, 90, 'asdasdasd'),
(6, 'coba skripsi', 2, '170411100001', '170411100024', '170411100042', '198002232008121001', '198609262014041001', '198101092006041003', 7, 80, 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` int(2) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(0, 'mengajukan topik'),
(1, 'mendaftarkan skripsi'),
(2, 'seminar proposal'),
(3, 'bimbingan skripsi'),
(4, 'mengajukan sidang skripsi'),
(5, 'ujian sidang skripsi'),
(6, 'skripsi sedang dinilai'),
(7, 'skripsi lulus'),
(8, 'skripsi gagal'),
(9, 'mengupload laporan skripsi'),
(10, 'peserta seminar ulang proposal'),
(11, 'peserta sidang ulang skripsi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe`
--

CREATE TABLE `tipe` (
  `id` int(2) NOT NULL,
  `keterangan` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe`
--

INSERT INTO `tipe` (`id`, `keterangan`) VALUES
(1, 'bimbingan'),
(2, 'seminar proposal'),
(3, 'sidang skripsi'),
(4, 'lulus sempro'),
(5, 'lulus sidang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topik`
--

CREATE TABLE `topik` (
  `id` int(11) NOT NULL,
  `topik` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `topik`
--

INSERT INTO `topik` (`id`, `topik`) VALUES
(1, 'Rekayasa Perangkat Lunak (RPL)'),
(2, 'Citra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `validasi`
--

CREATE TABLE `validasi` (
  `id` int(11) NOT NULL,
  `id_skripsi` int(11) NOT NULL,
  `pembimbing_1` varchar(18) DEFAULT NULL,
  `pembimbing_2` varchar(18) DEFAULT NULL,
  `penguji_1` varchar(18) DEFAULT NULL,
  `penguji_2` varchar(18) DEFAULT NULL,
  `penguji_3` varchar(18) DEFAULT NULL,
  `tipe` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `validasi`
--

INSERT INTO `validasi` (`id`, `id_skripsi`, `pembimbing_1`, `pembimbing_2`, `penguji_1`, `penguji_2`, `penguji_3`, `tipe`) VALUES
(2, 1, '170411100042', '170411100024', NULL, NULL, NULL, 2),
(3, 1, '170411100042', '170411100024', NULL, NULL, NULL, 3),
(4, 4, '198002232008121001', '197406102008121002', NULL, NULL, NULL, 2),
(10, 4, '198002232008121001', '197406102008121002', NULL, NULL, NULL, 3),
(11, 6, '170411100024', '170411100042', NULL, NULL, NULL, 2),
(12, 6, '170411100024', '170411100042', NULL, NULL, NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_sasaran` (`kode_penilaian`),
  ADD KEY `penilaian_skripsi` (`id_skripsi`);

--
-- Indeks untuk tabel `sasaran`
--
ALTER TABLE `sasaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sasaran_tipe` (`tipe`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skripsi_status` (`status`),
  ADD KEY `skripsi_topik` (`topik`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `validasi`
--
ALTER TABLE `validasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skripsi` (`id_skripsi`),
  ADD KEY `tipe` (`tipe`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT untuk tabel `sasaran`
--
ALTER TABLE `sasaran`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `topik`
--
ALTER TABLE `topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `validasi`
--
ALTER TABLE `validasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_sasaran` FOREIGN KEY (`kode_penilaian`) REFERENCES `sasaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_skripsi` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id`);

--
-- Ketidakleluasaan untuk tabel `sasaran`
--
ALTER TABLE `sasaran`
  ADD CONSTRAINT `sasaran_tipe` FOREIGN KEY (`tipe`) REFERENCES `tipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skripsi_topik` FOREIGN KEY (`topik`) REFERENCES `topik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `validasi`
--
ALTER TABLE `validasi`
  ADD CONSTRAINT `skripsi` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipe` FOREIGN KEY (`tipe`) REFERENCES `tipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
