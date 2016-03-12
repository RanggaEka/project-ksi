-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2015 at 08:01 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gku`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` varchar(36) NOT NULL,
  `id_referensi_user` varchar(36) NOT NULL,
  `kode_customer` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `photo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `id_referensi_user`, `kode_customer`, `nama`, `alamat`, `tlp`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `photo`) VALUES
('9e9faa89-37ef-11e5-a924-1c4bd610cb0e', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST0002', 'ANDIKA', 'JAKARTA', '0987890976', 'L', 'Jakarta', '2015-08-02', ''),
('9e9faa89-39ef-11e5-a924-1c4bd610cb0e', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST0001', 'FELDI YUSUF', 'DEPOK', '0987890976', 'L', 'Jakarta', '2015-08-02', ''),
('9e9faa89-39vf-11e5-a924-1c4bd610cb0e', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST0003', 'NAMA SATU', 'BANDUNG', '0987890976', 'L', 'Jakarta', '2015-08-02', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` varchar(36) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `id_sj` varchar(36) NOT NULL,
  `tagihan` double NOT NULL,
  `status_penagihan` varchar(20) NOT NULL,
  `no_urut_invoice` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `no_invoice`, `id_sj`, `tagihan`, `status_penagihan`, `no_urut_invoice`) VALUES
('279fee0d-7687-4978-be0f-59730a690cb2', 'INV00001', 'c886e6ad-257e-42cd-9298-cee970c772cf', 2000, 'NEW', 1),
('407d11a0-52c5-4610-ab12-65d83dba77d7', 'INV00002', '34acdb74-44a8-46a3-864e-7acf14a81a95', 150000, 'FINISHED', 2);

-- --------------------------------------------------------

--
-- Table structure for table `po_detail`
--

CREATE TABLE IF NOT EXISTS `po_detail` (
  `id` varchar(36) NOT NULL,
  `id_po_header` varchar(36) NOT NULL,
  `id_barang` varchar(36) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_detail`
--

INSERT INTO `po_detail` (`id`, `id_po_header`, `id_barang`, `qty`) VALUES
('7a944707-e78b-405d-bae5-6bacd8c23f83', 'bab37714-fea8-43e1-8ce6-a5b9e58e97ee', '751eeb74-3abd-11e5-be43-1c4bd610cb0e', 2),
('862b5c1d-ac7b-42c8-8a9b-60737e04b73d', 'f95ce635-aef2-4814-92c9-b90971a783ed', '751ecd58-3abd-11e5-be43-1c4bd610cb0e', 10),
('cbe5a7e7-acb1-4341-96f9-36f84bde9c25', '7841ae99-3d98-48d8-98d8-f431cc7889e7', '751eeb74-3abd-11e5-be43-1c4bd610cb0e', 6),
('ccefe16f-6ef3-4727-aded-78d604f35953', 'f95ce635-aef2-4814-92c9-b90971a783ed', '751eeb74-3abd-11e5-be43-1c4bd610cb0e', 100),
('fca3a8ae-d809-43a9-af73-afdfa1fef211', '255f2b1e-5356-4940-afb9-86f7980e377f', '751ecd58-3abd-11e5-be43-1c4bd610cb0e', 65);

-- --------------------------------------------------------

--
-- Table structure for table `po_header`
--

CREATE TABLE IF NOT EXISTS `po_header` (
  `id` varchar(36) NOT NULL,
  `no_po` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_customer` varchar(36) NOT NULL,
  `alamat` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `no_urut_po` int(5) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_header`
--

INSERT INTO `po_header` (`id`, `no_po`, `tanggal`, `id_customer`, `alamat`, `photo`, `no_urut_po`, `status`) VALUES
('255f2b1e-5356-4940-afb9-86f7980e377f', 'P00004', '2015-08-13', '9e9faa89-37ef-11e5-a924-1c4bd610cb0e', 'aasfasf', '255f2b1e-5356-4940-afb9-86f7980e377f_photo.JPG', 4, 'NEW'),
('7841ae99-3d98-48d8-98d8-f431cc7889e7', 'P00003', '2015-08-20', '9e9faa89-37ef-11e5-a924-1c4bd610cb0e', 'sfdsdf', 'DSC_0773.JPG', 3, 'NEW'),
('bab37714-fea8-43e1-8ce6-a5b9e58e97ee', 'P00002', '2015-08-19', '9e9faa89-39vf-11e5-a924-1c4bd610cb0e', 'asrwerwadf', 'bab37714-fea8-43e1-8ce6-a5b9e58e97ee_photo.jpg', 2, 'APPROVED'),
('f95ce635-aef2-4814-92c9-b90971a783ed', 'P00001', '2015-08-05', '9e9faa89-39ef-11e5-a924-1c4bd610cb0e', 'dafsdf', '9e492e97-633a-4181-97af-06c3bdc4dae8_photo.png', 1, 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `surat_jalan`
--

CREATE TABLE IF NOT EXISTS `surat_jalan` (
  `id` varchar(36) NOT NULL,
  `no_sj` varchar(20) NOT NULL,
  `id_po` varchar(36) NOT NULL,
  `tanggal` date NOT NULL,
  `driver` varchar(50) NOT NULL,
  `status_pengiriman` varchar(30) NOT NULL,
  `no_urut_sj` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_jalan`
--

INSERT INTO `surat_jalan` (`id`, `no_sj`, `id_po`, `tanggal`, `driver`, `status_pengiriman`, `no_urut_sj`) VALUES
('34acdb74-44a8-46a3-864e-7acf14a81a95', 'SJ00001', 'f95ce635-aef2-4814-92c9-b90971a783ed', '2015-08-05', '', 'DELIVERED', 1),
('c886e6ad-257e-42cd-9298-cee970c772cf', 'SJ00002', 'bab37714-fea8-43e1-8ce6-a5b9e58e97ee', '2015-08-05', '', 'DELIVERED', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `id` varchar(36) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` double NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `kode_barang`, `nama_barang`, `deskripsi`, `harga`, `is_active`) VALUES
('751ecd58-3abd-11e5-be43-1c4bd610cb0e', '001', 'SABUN', 'sdfsdfsdfsdfsd', 5000, 1),
('751eeb74-3abd-11e5-be43-1c4bd610cb0e', '002', 'DETERGEN', 'sdfsdfsdfsdf', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(36) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `photo` varchar(10) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `alamat`, `photo`, `jabatan`) VALUES
('acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'sales', '12345', 'SALES 1', 'L', 'Jakarta', '2015-08-03', 'Jakarta', '', 'SALES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`), ADD KEY `customer_fk1` (`id_referensi_user`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
 ADD PRIMARY KEY (`id`), ADD KEY `invoice_fk1` (`id_sj`);

--
-- Indexes for table `po_detail`
--
ALTER TABLE `po_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `po_detail_fk1` (`id_po_header`), ADD KEY `po_detail_fk2` (`id_barang`);

--
-- Indexes for table `po_header`
--
ALTER TABLE `po_header`
 ADD PRIMARY KEY (`id`), ADD KEY `po_header_fk1` (`id_customer`);

--
-- Indexes for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
 ADD PRIMARY KEY (`id`), ADD KEY `surat_jalan_fk1` (`id_po`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `customer_fk1` FOREIGN KEY (`id_referensi_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
ADD CONSTRAINT `invoice_fk1` FOREIGN KEY (`id_sj`) REFERENCES `surat_jalan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `po_detail`
--
ALTER TABLE `po_detail`
ADD CONSTRAINT `po_detail_fk1` FOREIGN KEY (`id_po_header`) REFERENCES `po_header` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `po_detail_fk2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `po_header`
--
ALTER TABLE `po_header`
ADD CONSTRAINT `po_header_fk1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_jalan`
--
ALTER TABLE `surat_jalan`
ADD CONSTRAINT `surat_jalan_fk1` FOREIGN KEY (`id_po`) REFERENCES `po_header` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
