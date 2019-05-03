-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2017 at 08:38 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cucikoin`
--

CREATE TABLE `tbl_cucikoin` (
  `id` int(11) NOT NULL,
  `operator` varchar(40) NOT NULL,
  `invoice_no` varchar(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `nama` varchar(40) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `total_bon` int(10) NOT NULL,
  `uang_tunai` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL,
  `ket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cucikoin`
--

INSERT INTO `tbl_cucikoin` (`id`, `operator`, `invoice_no`, `invoice_date`, `nama`, `no_hp`, `alamat`, `tgl_masuk`, `tgl_keluar`, `total_bon`, `uang_tunai`, `kembalian`, `ket`) VALUES
(2, 'Lutfhie Zikri Ramdhani', '0000864', '2017-10-11', 'ocid', '082151278687', 'Rumah bapa', '0000-00-00', '0000-00-00', 0, 0, 0, 0),
(4, 'Muhamad Firman Prayoga', '0000865', '2017-10-22', 'ilham', '099900', 'manawae', '2017-10-22', '0000-00-00', 29000, 30000, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cucisatuan`
--

CREATE TABLE `tbl_cucisatuan` (
  `id` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `no_bon` varchar(5) NOT NULL,
  `operator` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `area` varchar(100) NOT NULL,
  `total_bon` int(10) NOT NULL,
  `uang_tunai` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL,
  `ket` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cucisatuan`
--

INSERT INTO `tbl_cucisatuan` (`id`, `tgl_masuk`, `tgl_keluar`, `no_bon`, `operator`, `nama`, `no_hp`, `alamat`, `area`, `total_bon`, `uang_tunai`, `kembalian`, `ket`) VALUES
(5, '2017-10-01', '0000-00-00 00:00:00', '2868', 'Lutfhie Zikri Ramdhani', 'pelanggan1', '0999222', 'version', 'version', 77000, 100000, 23000, 0),
(6, '2017-10-01', '0000-00-00 00:00:00', '2869', 'Lutfhie Zikri Ramdhani', 'pelanggan2', '021832000', 'Chicago', 'depok', 73000, 80000, 7000, 0),
(7, '2017-10-01', '0000-00-00 00:00:00', '2870', 'Muhamad Fajar Darmawan', 'Muhamad ilham', '083811507639', 'Yogyakarta', 'malioboro', 51000, 60000, 9000, 0),
(9, '2017-10-01', '0000-00-00 00:00:00', '2871', 'Agung Mahariyad', 'Marsha', '021285758', 'Bali', 'kuta', 166000, 200000, 34000, 0),
(10, '2017-10-01', '0000-00-00 00:00:00', '2872', 'Agung Mahariyad', 'Anandito', '02222', 'Jawa', 'tengah', 260000, 300000, 40000, 0),
(11, '2017-10-01', '0000-00-00 00:00:00', '2873', 'Agung Mahariyad', 'Idhoy', '085883687890', 'BTM', 'empang', 416000, 450000, 34000, 1),
(13, '2017-10-01', '0000-00-00 00:00:00', '2874', 'Lutfhie Zikri Ramdhani', 'Prabu', '06286577', 'Kupang', 'no', 17000, 20000, 3000, 0),
(14, '2017-10-01', '0000-00-00 00:00:00', '2875', 'Lutfhie Zikri Ramdhani', 'Somay', '08577988522', 'Cibedug', 'tapos', 28000, 30000, 2000, 1),
(15, '2017-10-02', '0000-00-00 00:00:00', '2876', 'Lutfhie Zikri Ramdhani', 'Yoga', '99887', 'paski', 'paski', 46000, 50000, 4000, 0),
(16, '2017-10-02', '0000-00-00 00:00:00', '2877', 'Muhamad Firman Prayoga', 'rifki', '0989', 'mana', 'wae', 44000, 45000, 1000, 0),
(17, '2017-10-03', '0000-00-00 00:00:00', '2878', 'Lutfhie Zikri Ramdhani', 'siapa', '0909', 'alamt', 'area', 117000, 150000, 33000, 0),
(18, '2017-10-21', '2017-10-21 17:03:40', '2879', 'Lutfhie Zikri Ramdhani', 'saya', '9090', 'cek', 'dimana', 81000, 100000, 19000, 1);

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
(1, '0000865', 1, 2, 20000),
(2, '0000865', 8, 3, 9000);

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
(4, '2868', 11, 2, 62000),
(5, '2868', 19, 1, 15000),
(6, '2869', 21, 2, 40000),
(7, '2869', 24, 2, 6000),
(8, '2869', 12, 1, 27000),
(9, '2870', 15, 2, 24000),
(10, '2870', 16, 1, 12000),
(11, '2870', 19, 1, 15000),
(12, '2871', 12, 3, 81000),
(13, '2871', 14, 5, 65000),
(14, '2871', 18, 1, 20000),
(15, '2872', 11, 4, 124000),
(16, '2872', 20, 1, 20000),
(17, '2872', 14, 4, 52000),
(18, '2872', 17, 2, 34000),
(19, '2872', 24, 10, 30000),
(20, '2873', 11, 2, 62000),
(21, '2873', 14, 3, 39000),
(22, '2873', 17, 6, 102000),
(23, '2873', 23, 6, 90000),
(24, '2873', 23, 1, 15000),
(25, '2873', 12, 4, 108000),
(27, '2874', 17, 1, 17000),
(28, '2875', 13, 1, 15000),
(29, '2875', 14, 1, 13000),
(30, '2876', 14, 2, 26000),
(31, '2876', 20, 1, 20000),
(32, '2877', 16, 2, 24000),
(33, '2877', 21, 1, 20000),
(34, '2878', 11, 3, 93000),
(35, '2878', 15, 2, 24000),
(36, '2879', 12, 3, 81000);

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
(2, 'DET', 1, 2000, 0, 1),
(3, 'SOFT', 1, 9000, 0, 1),
(4, 'PLASTIC', 1, 1000, 0, 0),
(5, 'HANGER', 1, 2000, 0, 0),
(7, 'JASA LIPAT', 1, 10000, 0, 0),
(8, 'SETRIKA UAP', 1, 5000, 2000, 0),
(9, 'SETRIKA BIASA', 1, 6000, 0, 0),
(11, 'bc_besar', 2, 31000, 0, 0),
(12, 'bc_kecil', 2, 27000, 0, 0),
(13, 'baju_batik', 2, 15000, 0, 0),
(14, 'baju_kameja', 2, 13000, 0, 0),
(15, 'baju_biasa', 2, 12000, 0, 0),
(16, 'celana', 2, 12000, 0, 0),
(17, 'gamis', 2, 17000, 0, 0),
(18, 'jas', 2, 20000, 0, 0),
(19, 'jaket', 2, 15000, 0, 0),
(20, 'sepatu', 2, 20000, 0, 0),
(21, 'selimut_tebal', 2, 20000, 0, 0),
(22, 'karpet', 2, 0, 0, 0),
(23, 'seprei', 2, 15000, 0, 0),
(24, 'sarung_bantal', 2, 3000, 0, 0);

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
('VV000006', 'ATIN', '081381608381', 'Lembah Pinus No. 27 BGH', '2016-05-17', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
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
(1, 'Muhamad ilham', 'admin', 'admin', 'Jl. Cikopo Selatan, pasir muncang', '083811507639', 'admin', 1, '2017-09-27 04:10:29'),
(2, 'Lutfhie Zikri Ramdhani', 'karyawan', 'karyawan', 'Kp. Kibaru', '085213753110', 'karyawan', 1, '2017-09-27 10:57:30'),
(3, 'Agung Mahariyad', 'karyawan2', 'karyawan2', 'Psr. Muncang ', '088808718305', 'karyawan', 1, '2017-09-27 11:06:58'),
(21, 'Muhamad Firman Prayoga', 'karyawan3', 'karyawan3', 'Psr. Muncang ', '081212630110', 'karyawan', 1, '2017-09-28 00:10:09'),
(25, 'Muhamad Fajar Darmawan', 'admin2', 'admin2', 'Rumah Sakit', '082299571766', 'admin', 1, '2017-10-22 06:06:45');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cucikoin`
--
ALTER TABLE `tbl_cucikoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_cucisatuan`
--
ALTER TABLE `tbl_cucisatuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_detail_cucikoin`
--
ALTER TABLE `tbl_detail_cucikoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_detail_cucisatuan`
--
ALTER TABLE `tbl_detail_cucisatuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
