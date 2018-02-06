-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2018 at 08:59 AM
-- Server version: 10.1.21-MariaDB
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
-- Table structure for table `data_lampiran`
--

CREATE TABLE `data_lampiran` (
  `id` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `pengarang` varchar(200) DEFAULT NULL,
  `kategori` set('ebook','jurnal','artikel') NOT NULL,
  `bahasa` varchar(20) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `tahun_penerbit` year(4) DEFAULT NULL,
  `tempat_penerbit` varchar(20) DEFAULT NULL,
  `info_detail` mediumtext,
  `nama_file` varchar(500) DEFAULT NULL,
  `id_upload` varchar(6) DEFAULT NULL,
  `tgl_upload` datetime DEFAULT NULL,
  `abstrak` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lampiran`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_dosen`
--

CREATE TABLE `jurnal_dosen` (
  `id_dosen` varchar(120) NOT NULL,
  `nama_file` varchar(500) DEFAULT NULL,
  `bahasa_jurnal` varchar(50) DEFAULT NULL,
  `id_jurnal` varchar(10) NOT NULL,
  `judul_jurnal` varchar(500) NOT NULL,
  `id_data_lampiran` int(11) NOT NULL,
  `tgl_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` set('admin','dosen','user') NOT NULL,
  `full_nama` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `role`, `full_nama`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', ''),
('dino', 'b246ff693d453c3b1a3049752da2bc75', 'user', ''),
('dosen', 'ce28eed1511f631af6b2a7bb0a85d636', 'dosen', ''),
('dosen2', 'ac41c4e0e6ef7ac51f0c8f3895f82ce5', 'dosen', ''),
('dosen3', '1192feff42fadff1d7e0aa1210fed1e3', 'dosen', 'Dosen Tiga'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', ''),
('user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user', ''),
('user2', '7e58d63b60197ceb55a1c487989a3720', 'user', ''),
('user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user', 'User Tiga');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(500) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_lampiran`
--
ALTER TABLE `data_lampiran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_upload` (`id_upload`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
