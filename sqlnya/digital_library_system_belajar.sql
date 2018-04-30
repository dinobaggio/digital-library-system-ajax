-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 07:02 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

INSERT INTO `data_lampiran` (`id`, `judul`, `pengarang`, `kategori`, `bahasa`, `penerbit`, `tahun_penerbit`, `tempat_penerbit`, `info_detail`, `nama_file`, `id_upload`, `tgl_upload`, `abstrak`) VALUES
(1, 'Belajar Laravel Untuk Pemula', '', 'ebook', '', '', 0000, '', '', 't1RBb_ebook_Belajar Laravel Untuk Pemula', 't1RBb', '2018-02-22 06:33:08', ''),
(2, 'asdf', '', 'jurnal', 'dd', NULL, NULL, NULL, 'ff', '4mCxq_jurnal_W. Jason Gilmore - Easy Laravel 5', '4mCxq', '2018-03-06 16:11:52', 'fasf'),
(3, 'belajar web', '', 'ebook', '', '', 0000, '', '', 'NbCsb_ebook_codeigniter-web-application-blueprints', 'NbCsb', '2018-03-07 15:04:47', ''),
(4, 'belajar web 2', '', 'ebook', '', '', 0000, '', '', 'mjhdA_ebook_codeigniter-web-application-blueprints', 'mjhdA', '2018-03-07 15:06:01', ''),
(5, 'skripsi sora', 'inggris', '', 'inggris', NULL, NULL, NULL, 'krispi', 'DFRsj_skripsi_codeigniter-web-application-blueprints', 'DFRsj', '2018-03-07 15:54:23', NULL),
(6, 'jurnal dosen', 'dosen', 'jurnal', 'indonesia', NULL, NULL, NULL, 'dosen', 'AQBTU_jurnal_codeigniter-web-application-blueprints', 'AQBTU', '2018-03-07 16:00:27', 'Jurnal dosen'),
(7, 'belajar web', '', 'ebook', '', '', 0000, '', '', '0k2Ar_ebook_codeigniter-web-application-blueprints', '0k2Ar', '2018-03-07 16:41:43', ''),
(8, 'belajar web', '', 'ebook', '', '', 0000, '', '', 'n4gXn_ebook_codeigniter-web-application-blueprints', 'n4gXn', '2018-03-07 16:42:27', ''),
(9, 'belajar web', '', 'ebook', '', '', 0000, '', '', 'VIoSf_ebook_codeigniter-web-application-blueprints', 'VIoSf', '2018-03-07 16:43:09', ''),
(10, 'belajar web', '', 'ebook', '', '', 0000, '', '', '04woO_ebook_codeigniter-web-application-blueprints', '04woO', '2018-03-07 16:43:31', ''),
(11, 'belajar web', '', 'ebook', '', '', 0000, '', '', 'Isjk8_ebook_codeigniter-web-application-blueprints', 'Isjk8', '2018-03-07 16:45:05', ''),
(12, 'belajar web', '', 'ebook', '', '', 0000, '', '', 'J3ByD_ebook_codeigniter-web-application-blueprints', 'J3ByD', '2018-03-07 16:50:00', ''),
(13, 'belajar web', '', 'ebook', '', '', 0000, '', '', 'opjgN_ebook_codeigniter-web-application-blueprints', 'opjgN', '2018-03-07 16:51:14', ''),
(14, 'belajar web', '', 'ebook', '', '', 0000, '', '', 'slk1y_ebook_codeigniter-web-application-blueprints', 'slk1y', '2018-03-07 17:01:22', ''),
(15, 'tes qrcode', 'asdasd', 'ebook', 'asd', 'dd', 0000, 'dd', 'd', 'R9X32_ebook_codeigniter-web-application-blueprints', 'R9X32', '2018-03-26 07:21:35', ''),
(16, 'asddda', 'dd', 'ebook', 'd', 's', 0000, 'a', 's', 'BgT9J_ebook_Dino Baggio (1)', 'BgT9J', '2018-03-26 07:22:46', ''),
(17, 'jur', 'dd', 'jurnal', '', '', 0000, '', '', 'nYU91_jurnal_Dino Baggio (1)', 'nYU91', '2018-03-26 07:23:41', 'asd'),
(18, 'aa', '', 'jurnal', '', NULL, NULL, NULL, '', 'CqtIU_jurnal_Dino Baggio', 'CqtIU', '2018-03-26 07:28:51', 'aaa'),
(19, 'ss', '', 'jurnal', 'd', NULL, NULL, NULL, '', 'ZrOAH_jurnal_Dino Baggio', 'ZrOAH', '2018-03-26 07:29:15', 'adasd'),
(20, 's', '', 'ebook', '', '', 0000, '', '', 'cG5f9_ebook_Dino Baggio', 'cG5f9', '2018-03-26 07:31:42', ''),
(21, 'asd', '', 'ebook', '', '', 0000, '', '', '8IrH1_ebook_Dino Baggio', '8IrH1', '2018-03-26 07:33:41', '');

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

--
-- Dumping data for table `jurnal_dosen`
--

INSERT INTO `jurnal_dosen` (`id_dosen`, `nama_file`, `bahasa_jurnal`, `id_jurnal`, `judul_jurnal`, `id_data_lampiran`, `tgl_upload`) VALUES
('dosen', '4mCxq_jurnal_W. Jason Gilmore - Easy Laravel 5', 'dd', '4mCxq', 'asdf', 2, '2018-03-06 16:11:52'),
('dosen', 'AQBTU_jurnal_codeigniter-web-application-blueprints', 'indonesia', 'AQBTU', 'jurnal dosen', 6, '2018-03-07 16:00:27'),
('dosen', 'CqtIU_jurnal_Dino Baggio', '', 'CqtIU', 'aa', 18, '2018-03-26 07:28:51'),
('dosen', 'ZrOAH_jurnal_Dino Baggio', 'd', 'ZrOAH', 'ss', 19, '2018-03-26 07:29:15');

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
('user10', '990d67a9f94696b1abe2dccf06900322', 'user', 'user sepuluh'),
('user11', '03aa1a0b0375b0461c1b8f35b234e67a', 'user', 'user sebelas'),
('user2', '7e58d63b60197ceb55a1c487989a3720', 'user', ''),
('user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user', 'User Tiga'),
('user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'user', 'User empat'),
('user5', '0a791842f52a0acfbb3a783378c066b8', 'user', 'user lima'),
('user6', 'affec3b64cf90492377a8114c86fc093', 'user', 'user enam'),
('user7', '3e0469fb134991f8f75a2760e409c6ed', 'user', 'user tujuh'),
('user8', '7668f673d5669995175ef91b5d171945', 'user', 'user delapan'),
('user9', '8808a13b854c2563da1a5f6cb2130868', 'user', 'user sembilan');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi_user`
--

CREATE TABLE `skripsi_user` (
  `id_upload` varchar(11) NOT NULL,
  `id_user` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skripsi_user`
--

INSERT INTO `skripsi_user` (`id_upload`, `id_user`) VALUES
('DFRsj', 'user');

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

-- --------------------------------------------------------

--
-- Table structure for table `upload_skripsi`
--

CREATE TABLE `upload_skripsi` (
  `id_user` varchar(11) NOT NULL,
  `upload` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_skripsi`
--

INSERT INTO `upload_skripsi` (`id_user`, `upload`) VALUES
('user', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
