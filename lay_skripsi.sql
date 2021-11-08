-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2021 pada 12.12
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
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id` int(11) NOT NULL,
  `judul` varchar(64) DEFAULT NULL,
  `topik` int(11) NOT NULL,
  `abstrak` varchar(128) DEFAULT NULL,
  `nim` varchar(12) NOT NULL,
  `pembimbing_1` varchar(18) DEFAULT NULL,
  `pembimbing_2` varchar(18) DEFAULT NULL,
  `penguji_1` varchar(18) DEFAULT NULL,
  `penguji_2` varchar(18) DEFAULT NULL,
  `penguji_3` varchar(18) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `nilai` int(3) DEFAULT NULL,
  `berkas` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`id`, `judul`, `topik`, `abstrak`, `nim`, `pembimbing_1`, `pembimbing_2`, `penguji_1`, `penguji_2`, `penguji_3`, `status`, `nilai`, `berkas`) VALUES
(1, NULL, 1, NULL, '170411100099', '170411100042', '170411100024', NULL, NULL, NULL, 1, NULL, NULL),
(2, NULL, 1, NULL, '123', '170411100042', '170411100024', NULL, NULL, NULL, 1, NULL, NULL),
(3, NULL, 1, NULL, '222', '170411100024', '170411100024', '170411100042', '170411100024', '170411100024', 5, NULL, NULL);

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
  `dosen_1` varchar(18) DEFAULT NULL,
  `dosen_2` varchar(18) DEFAULT NULL,
  `tipe` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sasaran`
--
ALTER TABLE `sasaran`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
