-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 Okt 2017 pada 18.16
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_library_system_belajar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_lampiran`
--

CREATE TABLE `data_lampiran` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `kategori` set('ebook','jurnal','artikel') NOT NULL,
  `bahasa` varchar(20) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahun_penerbit` year(4) DEFAULT NULL,
  `tempat_penerbit` varchar(20) DEFAULT NULL,
  `info_detail` mediumtext,
  `id_upload` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` set('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `role`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('dino', 'b246ff693d453c3b1a3049752da2bc75', 'user'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
('user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user'),
('user2', '7e58d63b60197ceb55a1c487989a3720', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(30) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_type` varchar(20) DEFAULT NULL,
  `content` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_lampiran`
--
ALTER TABLE `data_lampiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_lampiran`
--
ALTER TABLE `data_lampiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
