-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2017 at 10:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2413121_stainked_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `nomor_disposisi` varchar(100) NOT NULL,
  `perihal_disposisi` varchar(225) NOT NULL,
  `id_kontak2_disposisi` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  `tgl_diterima_disposisi` date NOT NULL,
  `tgl_arsip_disposisi` date NOT NULL,
  `upload_disposisi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `nomor_disposisi`, `perihal_disposisi`, `id_kontak2_disposisi`, `id_surat_masuk`, `tgl_diterima_disposisi`, `tgl_arsip_disposisi`, `upload_disposisi`) VALUES
(1, '1', 'ok', 1, 2, '2017-09-21', '2017-09-30', ''),
(2, '2', '', 1, 3, '2015-09-02', '2017-09-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `kontak` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `kontak`, `alamat`, `no_telp`) VALUES
(1, 'UNIPDU', 'JOMBANG', '0987543234'),
(2, 'UNISA', 'SURABAYA', '089764678899'),
(3, 'DEPARTEMEN AGAMA', 'KEDIRI', '987589098769'),
(4, 'DEPARTEMEN SOSIAL', 'KEDIRI', '9876543458899'),
(5, 'DEPARTEMEN TENEGA KERJA', 'KEDIRI', '9876578987799');

-- --------------------------------------------------------

--
-- Table structure for table `kontak2`
--

CREATE TABLE `kontak2` (
  `id_kontak2` int(11) NOT NULL,
  `kontak2` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontak2`
--

INSERT INTO `kontak2` (`id_kontak2`, `kontak2`) VALUES
(2, 'SUB LABORATORIUM PSIKOLOGI'),
(1, 'SUB PUSKOM NET');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` varchar(11) NOT NULL,
  `log` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `log`) VALUES
('DDD1', 'BERHASIL HAPUS DATA DISPOSISI'),
('KDD1', 'BERHASIL HAPUS DATA SURAT KELUAR'),
('MDD1', 'BERHASIL HAPUS DATA SURAT MASUK'),
('DDF1', 'BERHASIL HAPUS FILE DISPOSISI'),
('KDF1', 'BERHASIL HAPUS FILE SURAT KELUAR'),
('MDF1', 'BERHASIL HAPUS FILE SURAT MASUK'),
('L2', 'BERHASIL KELUAR'),
('L1', 'BERHASIL MASUK'),
('KLI1', 'BERHASIL MENAMBAH KONTAK LUAR'),
('KSI1', 'BERHASIL MENAMBAH KONTAK SUB BAGIAN'),
('KLD1', 'BERHASIL MENGHAPUS KONTAK LUAR'),
('KSD1', 'BERHASIL MENGHAPUS KONTAK SUB BAGIAN'),
('RD1', 'BERHASIL MENGOSONGKAN RIWAYAT'),
('A1', 'BERHASIL MENGUBAH AKUN'),
('AM1', 'BERHASIL MENGUBAH EMAIL'),
('KLU1', 'BERHASIL MENGUBAH KONTAK LUAR'),
('KSU1', 'BERHASIL MENGUBAH KONTAK SUB BAGIAN'),
('DI1', 'BERHASIL TAMBAH DATA DIPOSISI'),
('KI1', 'BERHASIL TAMBAH DATA SURAT KELUAR'),
('MI1', 'BERHASIL TAMBAH DATA SURAT MASUK'),
('DU1', 'BERHASIL UBAH DATA DISPOSISI'),
('KU1', 'BERHASIL UBAH DATA SURAT KELUAR'),
('MU1', 'BERHASIL UBAH DATA SURAT MASUK'),
('DF1', 'BERHASIL UPLOAD FILE DISPOSISI'),
('KF1', 'BERHASIL UPLOAD FILE SURAT KELUAR'),
('MF1', 'BERHASIL UPLOAD FILE SURAT MASUK'),
('DDD0', 'GAGAL HAPUS DATA DISPOSISI'),
('KDD0', 'GAGAL HAPUS DATA SURAT KELUAR'),
('MDD0', 'GAGAL HAPUS DATA SURAT MASUK'),
('DDF0', 'GAGAL HAPUS FILE DIPSOSISI'),
('KDF0', 'GAGAL HAPUS FILE SURAT KELUAR'),
('MDF0', 'GAGAL HAPUS FILE SURAT MASUK'),
('L0', 'GAGAL MASUK'),
('KLI0', 'GAGAL MENAMBAH KONTAK LUAR'),
('KSI0', 'GAGAL MENAMBAH KONTAK SUB BAGIAN'),
('KLD0', 'GAGAL MENGHAPUS KONTAK LUAR'),
('KSD0', 'GAGAL MENGHAPUS KONTAK SUB BAGIAN'),
('RD0', 'GAGAL MENGOSONGKAN RIWAYAT'),
('A0', 'GAGAL MENGUBAH AKUN'),
('AM0', 'GAGAL MENGUBAH EMAIL'),
('KLU0', 'GAGAL MENGUBAH KONTAK LUAR'),
('KSU0', 'GAGAL MENGUBAH KONTAK SUB BAGIAN'),
('DI0', 'GAGAL TAMBAH DATA DISPOSISI'),
('KI0', 'GAGAL TAMBAH DATA SURAT KELUAR'),
('MI0', 'GAGAL TAMBAH DATA SURAT MASUK'),
('DU0', 'GAGAL UBAH DATA DIPSOSISI'),
('KU0', 'GAGAL UBAH DATA SURAT KELUAR'),
('MU0', 'GAGAL UBAH DATA SURAT MASUK'),
('DF0', 'GAGAL UPLOAD FILE DISPOSISI'),
('KF0', 'GAGAL UPLOAD FILE SURAT KELUAR'),
('MF0', 'GAGAL UPLOAD FILE SURAT MASUK');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_log` varchar(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `tgl_riwayat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_user`, `id_log`, `ip`, `tgl_riwayat`) VALUES
(1, 1, 'RD1', '::1', '2017-10-01 05:17:27'),
(2, 1, 'L2', '::1', '2017-10-01 05:54:28'),
(3, NULL, 'L0', '::1', '2017-10-01 05:54:56'),
(4, 2, 'L1', '::1', '2017-10-01 05:55:17'),
(5, 2, 'A1', '::1', '2017-10-01 06:00:34'),
(6, 2, 'AM1', '::1', '2017-10-01 06:03:56'),
(7, 2, 'KSU1', '::1', '2017-10-01 06:27:46'),
(8, 2, 'KSI1', '::1', '2017-10-01 06:28:24'),
(9, 2, 'A1', '::1', '2017-10-01 06:30:42'),
(10, 2, 'L2', '::1', '2017-10-01 06:33:22'),
(11, NULL, '4', '::1', '2017-10-01 06:33:39'),
(12, 1, 'L1', '::1', '2017-10-01 07:19:21'),
(13, 1, 'A1', '::1', '2017-10-01 07:30:54'),
(14, 1, 'L2', '::1', '2017-10-01 07:31:35'),
(15, 1, 'L1', '::1', '2017-10-01 11:12:42'),
(16, 1, 'L2', '::1', '2017-10-01 11:24:00'),
(17, 1, 'L1', '::1', '2017-10-01 11:29:50'),
(18, 1, 'L2', '::1', '2017-10-01 11:30:42'),
(19, 1, 'L1', '::1', '2017-10-01 11:30:49'),
(20, 1, 'L2', '::1', '2017-10-01 11:32:20'),
(21, 1, 'L1', '::1', '2017-10-01 11:33:31'),
(22, 1, 'L2', '::1', '2017-10-01 11:39:30'),
(23, 1, 'L1', '::1', '2017-10-01 11:40:54'),
(24, 1, 'L2', '::1', '2017-10-01 11:56:36'),
(25, NULL, '4', '::1', '2017-10-01 12:15:47'),
(26, 1, 'L1', '::1', '2017-10-01 12:17:22'),
(27, 1, 'L2', '::1', '2017-10-01 12:27:02'),
(28, 1, 'L1', '::1', '2017-10-01 12:37:17'),
(29, 1, 'L2', '::1', '2017-10-01 14:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `nomor_surat_keluar` varchar(100) NOT NULL,
  `perihal_surat_keluar` varchar(225) NOT NULL,
  `id_kontak_surat_keluar` int(11) NOT NULL,
  `tgl_surat_keluar` date NOT NULL,
  `tgl_arsip_surat_keluar` date NOT NULL,
  `upload_surat_keluar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `nomor_surat_keluar`, `perihal_surat_keluar`, `id_kontak_surat_keluar`, `tgl_surat_keluar`, `tgl_arsip_surat_keluar`, `upload_surat_keluar`) VALUES
(1, 'STA/01/2017', 'BALASAN SURAT', 1, '2017-09-26', '2017-09-30', ''),
(2, 'STA/02/2017', 'BALASAN UNDANGAN', 1, '2017-09-29', '2017-09-30', ''),
(3, 'STA/03/2017', 'BALASAN HIMBAUAN', 3, '2017-09-28', '2017-09-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `nomor_surat_masuk` varchar(100) NOT NULL,
  `perihal_surat_masuk` varchar(225) NOT NULL,
  `id_kontak_surat_masuk` int(11) NOT NULL,
  `tgl_surat_masuk` date NOT NULL,
  `tgl_diterima_surat_masuk` date NOT NULL,
  `tgl_arsip_surat_masuk` date NOT NULL,
  `upload_surat_masuk` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `nomor_surat_masuk`, `perihal_surat_masuk`, `id_kontak_surat_masuk`, `tgl_surat_masuk`, `tgl_diterima_surat_masuk`, `tgl_arsip_surat_masuk`, `upload_surat_masuk`) VALUES
(2, 'unpd/1/2016', 'undangan seminar', 1, '2017-09-20', '2017-09-21', '2017-09-30', 'UNIPDU_2_undangan_seminar.pdf'),
(3, 'unip/2/2015', 'permohonan', 1, '2015-09-01', '2015-09-02', '2017-09-30', 'UNIPDU_3_permohonan.pdf'),
(4, 'unip/3/2017', 'himbauan sosialisasi', 1, '2017-09-13', '2017-09-14', '2017-09-30', ''),
(5, 'DEPAG/2017', 'SOSIALISASI ISLAM', 3, '2017-09-29', '2017-09-30', '2017-09-30', ''),
(6, 'DEPAG/2016', 'HIMBAUAN AGAMA ISLAM', 3, '2017-09-28', '2017-09-29', '2017-09-30', ''),
(7, 'DEPAG/2015', 'UNDANGAN PELATIHAN', 4, '2015-09-29', '2015-09-30', '2017-09-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `email`, `level_user`) VALUES
(1, 'admin', 'admin', 'superuser', 'admin@gmail.com', 'superuser'),
(2, 'user1', 'user1', 'user1', 'user1@gmail.com', 'user1'),
(3, 'user2', 'user2', 'yahyah', 'user2@gmail.com', 'user2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`),
  ADD KEY `id_kontak_disposisi` (`id_kontak2_disposisi`),
  ADD KEY `id_kontak_surat_masuk` (`id_surat_masuk`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`),
  ADD UNIQUE KEY `kontak` (`kontak`);

--
-- Indexes for table `kontak2`
--
ALTER TABLE `kontak2`
  ADD PRIMARY KEY (`id_kontak2`),
  ADD UNIQUE KEY `kontak` (`kontak2`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD UNIQUE KEY `log` (`log`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_log` (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_kontak_surat_keluar` (`id_kontak_surat_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_kontak_surat_masuk` (`id_kontak_surat_masuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `sandi` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kontak2`
--
ALTER TABLE `kontak2`
  MODIFY `id_kontak2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_kontak2_disposisi`) REFERENCES `kontak2` (`id_kontak2`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`id_surat_masuk`) REFERENCES `surat_masuk` (`id_surat_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`id_kontak_surat_keluar`) REFERENCES `kontak` (`id_kontak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`id_kontak_surat_masuk`) REFERENCES `kontak` (`id_kontak`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
