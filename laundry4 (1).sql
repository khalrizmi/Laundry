-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 02:24 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bantu`
--

CREATE TABLE `tbl_bantu` (
  `id` int(11) NOT NULL,
  `operator_id` int(3) NOT NULL,
  `no_urut` varchar(20) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jenis_cuci` int(1) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cucikoin`
--

CREATE TABLE `tbl_cucikoin` (
  `id` int(11) NOT NULL,
  `operator` varchar(40) NOT NULL,
  `invoice_no` varchar(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `jam_masuk` time NOT NULL,
  `jam_ambil` time DEFAULT NULL,
  `total_bon` int(10) NOT NULL,
  `ket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cucikoin`
--

INSERT INTO `tbl_cucikoin` (`id`, `operator`, `invoice_no`, `nama`, `no_hp`, `alamat`, `tgl_masuk`, `tgl_selesai`, `tgl_ambil`, `jam_masuk`, `jam_ambil`, `total_bon`, `ket`) VALUES
(1, 'Lutfhie Zikri Ramdhani', '00001', 'Muhamad ilham', '083811507639', 'Pasir Muncang', '2017-11-16', '2017-11-16', '2017-11-16', '21:18:06', '21:32:16', 56600, 2),
(2, 'Lutfhie Zikri Ramdhani', '00002', 'James Rodriguez', '085883687813', 'Bayern', '2017-11-16', '2017-11-16', '2017-11-18', '21:20:10', '08:03:31', 26400, 2),
(3, 'Lutfhie Zikri Ramdhani', '00003', 'Setya Novanto', '085881456412', 'kp. sawah', '2017-11-16', '2017-11-17', '2017-11-17', '21:23:08', '13:30:12', 83200, 2),
(4, 'Lutfhie Zikri Ramdhani', '00004', 'Chairil Anwar', '08588374122', 'Bekasi', '2017-11-17', '2017-11-18', '2017-11-18', '12:45:50', '08:42:29', 56600, 2),
(13, 'Lutfhie Zikri Ramdhani', '00005', 'Arnold', '08577800123', 'Bandung', '2017-11-18', '2017-11-18', NULL, '07:23:04', NULL, 25400, 1),
(15, 'Lutfhie Zikri Ramdhani', '00006', 'Andika', '0821825677', 'Sumedang', '2017-11-18', NULL, NULL, '08:18:07', NULL, 26400, 0),
(16, 'Lutfhie Zikri Ramdhani', '00007', 'Chelsea', '08218266612', 'Megamendung', '2017-11-18', '2017-11-18', '2017-11-18', '08:21:04', '08:42:53', 22200, 2),
(17, 'Lutfhie Zikri Ramdhani', '00008', 'Gilbas', '089813763976', 'Belanda', '2017-11-18', NULL, NULL, '08:24:33', NULL, 53200, 0),
(18, 'Lutfhie Zikri Ramdhani', '00009', 'Steven Milijan', '083811306789', 'Aceh', '2017-11-18', NULL, NULL, '08:27:38', NULL, 100800, 0),
(19, 'Lutfhie Zikri Ramdhani', '00010', 'Klok', '085776006613', 'Sumedang', '2017-11-18', NULL, NULL, '08:30:13', NULL, 26400, 0),
(20, 'Lutfhie Zikri Ramdhani', '00011', 'Radovic', '085774003465', 'Palembang', '2017-11-18', NULL, NULL, '08:35:46', NULL, 27400, 0),
(21, 'Lutfhie Zikri Ramdhani', '00012', 'Sule', '089887006641', 'Bandung', '2017-11-18', '2017-11-18', NULL, '08:37:19', NULL, 84400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cucisatuan`
--

CREATE TABLE `tbl_cucisatuan` (
  `id` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `no_bon` int(5) NOT NULL,
  `operator` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `total_bon` int(10) NOT NULL,
  `ket` int(1) NOT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `jam_ambil` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cucisatuan`
--

INSERT INTO `tbl_cucisatuan` (`id`, `tgl_masuk`, `tgl_keluar`, `no_bon`, `operator`, `nama`, `no_hp`, `alamat`, `total_bon`, `ket`, `tgl_ambil`, `jam_ambil`) VALUES
(1, '2017-11-14', '2017-11-16', 1, 'Lutfhie Zikri Ramdhani', 'Muhamad ilham', '083811507639', 'pasir muncang', 58000, 2, '2017-11-16', '22:49:34'),
(2, '2017-11-14', '2017-11-16', 2, 'Lutfhie Zikri Ramdhani', 'Jaycee Langworth', '085779006649', 'Manado', 13000, 2, '2017-11-16', '22:50:42'),
(3, '2017-11-14', '2017-11-16', 3, 'Lutfhie Zikri Ramdhani', 'Mr. Helmer McKenzie V', '08521059156', 'Cilendek', 34000, 2, '2017-11-17', '08:36:32'),
(4, '2017-11-14', '2017-11-16', 4, 'Lutfhie Zikri Ramdhani', 'Muhamad ilham', '083811507639', 'Pasir Muncang', 15000, 2, '2017-11-17', '08:36:55'),
(5, '2017-11-14', '2017-11-16', 5, 'Lutfhie Zikri Ramdhani', 'Mr. Alexander', '08580569797', 'Bogor', 20000, 2, '2017-11-17', '21:16:17'),
(6, '2017-11-15', '2017-11-17', 6, 'Lutfhie Zikri Ramdhani', 'Marbot', '02156900', 'Masjid', 3000, 2, '2017-11-17', '15:55:21'),
(7, '2017-11-15', '2017-11-17', 7, 'Lutfhie Zikri Ramdhani', 'Muhamad ilham', '083811507639', 'Pasir Muncang', 15000, 2, '2017-11-17', '15:54:59'),
(8, '2017-11-16', '2017-11-18', 8, 'Lutfhie Zikri Ramdhani', 'Shanelle', '081285868623', 'Papua', 50000, 1, NULL, NULL),
(9, '2017-11-16', '2017-11-18', 9, 'Lutfhie Zikri Ramdhani', 'Jaycee Langworth', '085779006649', 'Manado', 15000, 1, NULL, NULL),
(10, '2017-11-16', '2017-11-18', 10, 'Lutfhie Zikri Ramdhani', 'Mr. Helmer McKenzie V', '08521059156', 'Cilendek', 27000, 2, '2017-11-18', '20:23:11'),
(11, '2017-11-16', '2017-11-18', 11, 'Lutfhie Zikri Ramdhani', 'Filiberto Wunsch IV', '0838600000', 'Cimanggis', 24000, 1, NULL, NULL),
(12, '2017-11-16', '2017-11-18', 12, 'Lutfhie Zikri Ramdhani', 'Jaycee Langworth', '085779006649', 'Manado', 30000, 2, '2017-11-18', '06:33:17'),
(13, '2017-11-17', '2017-11-19', 13, 'Lutfhie Zikri Ramdhani', 'M Valdos', '0857872621123', 'Los Angles', 184000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_cucikoin`
--

CREATE TABLE `tbl_detail_cucikoin` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(13) NOT NULL,
  `id_item` int(2) NOT NULL,
  `qty` int(2) NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_cucikoin`
--

INSERT INTO `tbl_detail_cucikoin` (`id`, `invoice_no`, `id_item`, `qty`, `total_harga`) VALUES
(1, '00001', 2, 60, 1200),
(2, '00001', 3, 60, 5400),
(3, '00001', 7, 1, 10000),
(4, '00002', 3, 60, 5400),
(5, '00002', 4, 1, 1000),
(6, '00003', 2, 120, 2400),
(7, '00003', 3, 120, 10800),
(8, '00003', 7, 1, 10000),
(9, '00004', 2, 60, 1200),
(10, '00004', 3, 60, 5400),
(11, '00004', 7, 1, 10000),
(12, '00005', 3, 60, 5400),
(13, '00006', 1, 2, 20000),
(14, '00006', 3, 60, 5400),
(15, '00006', 4, 1, 1000),
(16, '00007', 1, 2, 20000),
(17, '00007', 2, 60, 1200),
(18, '00007', 4, 1, 1000),
(19, '00008', 1, 4, 40000),
(20, '00008', 2, 120, 2400),
(21, '00008', 3, 120, 10800),
(22, '00009', 1, 6, 60000),
(23, '00009', 2, 180, 3600),
(24, '00009', 3, 180, 16200),
(25, '00009', 7, 1, 10000),
(26, '00009', 9, 1, 6000),
(27, '00009', 25, 1, 5000),
(28, '00010', 1, 2, 20000),
(29, '00010', 3, 60, 5400),
(30, '00010', 4, 1, 1000),
(31, '00011', 1, 2, 20000),
(32, '00011', 3, 60, 5400),
(33, '00011', 5, 1, 2000),
(34, '00012', 1, 5, 50000),
(35, '00012', 2, 60, 1200),
(36, '00012', 3, 180, 16200),
(37, '00012', 4, 2, 2000),
(38, '00012', 7, 1, 10000),
(39, '00012', 25, 1, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_cucisatuan`
--

CREATE TABLE `tbl_detail_cucisatuan` (
  `id` int(11) NOT NULL,
  `no_bon` varchar(5) NOT NULL,
  `id_item` int(3) NOT NULL,
  `qty` int(3) NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_cucisatuan`
--

INSERT INTO `tbl_detail_cucisatuan` (`id`, `no_bon`, `id_item`, `qty`, `total_harga`) VALUES
(1, '1', 11, 1, 31000),
(2, '1', 12, 1, 27000),
(3, '2', 14, 1, 13000),
(4, '3', 17, 2, 34000),
(5, '4', 19, 1, 15000),
(6, '5', 18, 1, 20000),
(7, '6', 24, 1, 3000),
(8, '7', 23, 1, 15000),
(9, '8', 13, 2, 30000),
(10, '8', 21, 1, 20000),
(11, '9', 23, 1, 15000),
(12, '10', 12, 1, 27000),
(13, '11', 15, 1, 12000),
(14, '11', 16, 1, 12000),
(15, '12', 13, 2, 30000),
(16, '13', 11, 2, 62000),
(17, '13', 12, 3, 81000),
(18, '13', 13, 1, 15000),
(19, '13', 14, 2, 26000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(30) NOT NULL,
  `tipe_item` int(1) NOT NULL,
  `harga_normal` int(7) NOT NULL,
  `diskon_promo` int(7) NOT NULL,
  `hemat_member` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id_item`, `nama_item`, `tipe_item`, `harga_normal`, `diskon_promo`, `hemat_member`) VALUES
(1, 'COIN', 1, 15000, 5000, 0),
(2, 'DET', 1, 20, 0, 0),
(3, 'SOFT', 1, 90, 0, 0),
(4, 'PLASTIC', 1, 1000, 0, 0),
(5, 'HANGER', 1, 2000, 0, 0),
(7, 'JASA LIPAT', 1, 10000, 0, 0),
(8, 'SETRIKA UAP', 1, 5000, 2000, 0),
(9, 'SETRIKA BIASA', 1, 6000, 0, 0),
(11, 'bc_besar', 2, 31000, 0, 0),
(12, 'bc_kecil', 2, 27000, 0, 0),
(13, 'baju_batik', 2, 15000, 0, 0),
(14, 'baju_kameja', 2, 13000, 0, 0),
(15, 'BAJU_BIASA', 2, 12000, 0, 0),
(16, 'CELANA', 2, 12000, 0, 0),
(17, 'gamis', 2, 17000, 0, 0),
(18, 'jas', 2, 20000, 0, 0),
(19, 'jaket', 2, 15000, 0, 0),
(20, 'sepatu', 2, 20000, 0, 0),
(21, 'selimut_tebal', 2, 20000, 0, 0),
(22, 'karpet', 2, 0, 0, 0),
(23, 'seprei', 2, 15000, 0, 0),
(24, 'sarung_bantal', 2, 3000, 0, 0),
(25, 'Delivery', 1, 5000, 0, 5000),
(26, 'SOFT DRINK', 1, 5000, 0, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `no_member` varchar(8) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `tgl_aktivitas` date NOT NULL,
  `tgl_no_aktivitas` date NOT NULL,
  `jumlah_stam` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`no_member`, `nama`, `telepon`, `alamat`, `tgl_aktivitas`, `tgl_no_aktivitas`, `jumlah_stam`) VALUES
('VV000001', 'Ibu Kiki', '081285868623', 'Venesia Utara No. 100', '2016-05-10', '2016-06-10', 6),
('VV000002', 'Luna', '085213753110', 'Bogor', '2016-05-10', '2016-06-10', 36),
('VV000003', 'Evelia', '10/05/2016', ' ', '2016-10-05', '0000-00-00', 15),
('VV000004', 'CHIVA', '081212630110', ' ', '2016-05-13', '0000-00-00', 6),
('VV000005', 'DIAN YULFIANI', '08161994468', 'Mediterania I, Jl. Pajajaran No. 82', '2016-05-16', '0000-00-00', 0),
('VV000006', 'ATIN', '081381608381', 'Lembah Pinus No. 27 BGH', '2016-05-17', '0000-00-00', 0),
('VV000007', 'Muhamad ilham1', '0838115076391', 'Pasir Muncang1', '2017-10-01', '2001-10-01', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mesin`
--

CREATE TABLE `tbl_mesin` (
  `id` int(11) NOT NULL,
  `jenis_mesin` int(11) NOT NULL,
  `no_invoice` varchar(11) NOT NULL,
  `nomor_mesin` int(2) NOT NULL,
  `koin` int(11) NOT NULL,
  `tgl_pakai` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mesin`
--

INSERT INTO `tbl_mesin` (`id`, `jenis_mesin`, `no_invoice`, `nomor_mesin`, `koin`, `tgl_pakai`, `jam`) VALUES
(1, 1, '00001', 1, 2, '2017-11-16', '21:18:06'),
(2, 2, '00001', 2, 2, '2017-11-16', '21:18:07'),
(3, 1, '00002', 3, 2, '2017-11-16', '21:20:12'),
(4, 1, '00003', 7, 2, '2017-11-16', '21:23:08'),
(5, 1, '00003', 9, 2, '2017-11-16', '21:23:08'),
(6, 2, '00003', 8, 2, '2017-11-16', '21:23:08'),
(7, 1, '00004', 9, 2, '2017-11-17', '12:45:50'),
(8, 2, '00004', 10, 2, '2017-11-17', '12:45:50'),
(9, 1, '00005', 3, 2, '2017-11-18', '07:23:04'),
(10, 1, '00006', 1, 2, '2017-11-18', '08:18:07'),
(11, 1, '00007', 5, 2, '2017-11-18', '08:21:04'),
(12, 1, '00008', 7, 2, '2017-11-18', '08:24:34'),
(13, 2, '00008', 8, 2, '2017-11-18', '08:24:34'),
(14, 1, '00009', 9, 2, '2017-11-18', '08:27:38'),
(15, 1, '00009', 1, 2, '2017-11-18', '08:27:38'),
(16, 2, '00009', 10, 2, '2017-11-18', '08:27:38'),
(17, 1, '00010', 3, 2, '2017-11-18', '08:30:13'),
(18, 1, '00011', 3, 2, '2017-11-18', '08:35:46'),
(19, 1, '00012', 1, 2, '2017-11-18', '08:37:20'),
(20, 1, '00012', 9, 1, '2017-11-18', '08:37:20'),
(21, 2, '00012', 2, 2, '2017-11-18', '08:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `level` varchar(9) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `nama`, `username`, `password`, `alamat`, `telepon`, `level`, `status`, `tgl_buat`) VALUES
(1, 'Muhamad ilham', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Jl. Cikopo Selatan, pasir muncang', '083811507639', 'admin', 1, '2017-09-27 04:10:29'),
(2, 'Lutfhie Zikri Ramdhani', 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'Kp. Kibaru', '085213753110', 'karyawan', 1, '2017-09-27 10:57:30'),
(25, 'Muhamad Fajar Darmawan', 'karyawan2', '0f04e83af329b915fd20112b50b11e9e', 'Rumah Sakit', '082299571766', 'karyawan', 1, '2017-10-22 06:06:45'),
(42, 'dia', 'karyawan3', '3e58a844e85f196e2af48dec548d300e', 'alamatnya', '0999', 'karyawan', 1, '2017-10-25 14:40:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bantu`
--
ALTER TABLE `tbl_bantu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cucikoin`
--
ALTER TABLE `tbl_cucikoin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cucisatuan`
--
ALTER TABLE `tbl_cucisatuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detail_cucikoin`
--
ALTER TABLE `tbl_detail_cucikoin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detail_cucisatuan`
--
ALTER TABLE `tbl_detail_cucisatuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`no_member`);

--
-- Indexes for table `tbl_mesin`
--
ALTER TABLE `tbl_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bantu`
--
ALTER TABLE `tbl_bantu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_cucikoin`
--
ALTER TABLE `tbl_cucikoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_cucisatuan`
--
ALTER TABLE `tbl_cucisatuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_detail_cucikoin`
--
ALTER TABLE `tbl_detail_cucikoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_detail_cucisatuan`
--
ALTER TABLE `tbl_detail_cucisatuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_mesin`
--
ALTER TABLE `tbl_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
