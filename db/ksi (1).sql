-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2016 at 09:45 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `sid` varchar(36) NOT NULL,
  `agent` varchar(25) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `sid` varchar(36) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`sid`, `nama`, `alamat`) VALUES
('08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'JAKARTA'),
('08F94087-ADFB-11E5-ADF5-C8600086EAB3', 'C00002', 'JAKARTA'),
('08F9440B-ADFB-11E5-ADF5-C8600086EAB3', 'C00003', 'JAKARTA'),
('0906294C-ADFB-11E5-ADF5-C8600086EAB3', 'C00004', 'JAKARTA'),
('09062E99-ADFB-11E5-ADF5-C8600086EAB3', 'C00005', 'JAKARTA'),
('09063229-ADFB-11E5-ADF5-C8600086EAB3', 'C00006', 'JAKARTA'),
('0906358F-ADFB-11E5-ADF5-C8600086EAB3', 'C00007', 'JAKARTA'),
('30433db3-6ffd-4850-8472-425d75c5afd7', 'A00002', 'JAKARTA'),
('3EC458CB-9D9A-11E2-9F15-C8600086EAB3', 'B00003', 'JAKARTA'),
('405B728C-9D9A-11E2-9F15-C8600086EAB3', 'K00001', 'JAKARTA'),
('4166AC7F-9D9A-11E2-9F15-C8600086EAB3', 'A00003', 'JAKARTA'),
('424298A8-9D9A-11E2-9F15-C8600086EAB3', 'B00004', 'JAKARTA'),
('43374D5E-9D9A-11E2-9F15-C8600086EAB3', 'P00001', 'JAKARTA'),
('43817c3d-68af-414d-a689-6683aba75372', 'A00001', 'JAKARTA'),
('443ECBA8-9D9A-11E2-9F15-C8600086EAB3', 'L00001', 'JAKARTA'),
('5A5B8073-9D9A-11E2-9F15-C8600086EAB3', 'I00001', 'JAKARTA'),
('645dbe40-6bf4-4e85-b947-99b452fcaacd', 'C00001', 'JAKARTA'),
('86FBAA79-9C06-11E2-9F15-C8600086EAB3', 'B00001', 'JAKARTA'),
('86FBAE20-9C06-11E2-9F15-C8600086EAB3', 'B00002', 'JAKARTA'),
('8BFFDAC3-9C06-11E2-9F15-C8600086EAB3', 'J00001', 'JAKARTA'),
('8BFFDE9A-9C06-11E2-9F15-C8600086EAB3', 'J00002', 'JAKARTA'),
('905701ED-9C06-11E2-9F15-C8600086EAB3', 'S00001', 'JAKARTA'),
('905705A1-9C06-11E2-9F15-C8600086EAB3', 'S00002', 'JAKARTA'),
('ba74ae3f-377d-4fd5-9d27-5a19831578bd', 'C00003', 'JAKARTA'),
('d6fe3de2-5373-41f5-b7b9-596ed1172949', 'C00002', 'JAKARTA');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE IF NOT EXISTS `invoice_detail` (
  `sid` varchar(36) NOT NULL,
  `id` int(5) NOT NULL,
  `tanda_terima_sid` varchar(36) NOT NULL,
  `tanda_terima_nomor` varchar(30) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_header`
--

CREATE TABLE IF NOT EXISTS `invoice_header` (
  `sid` varchar(36) NOT NULL,
  `id` int(5) NOT NULL,
  `no_inv` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `customer_sid` varchar(36) NOT NULL,
  `customer_nama` text NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `no_inv` (`no_inv`),
  UNIQUE KEY `sid` (`sid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_header`
--

INSERT INTO `invoice_header` (`sid`, `id`, `no_inv`, `tanggal`, `customer_sid`, `customer_nama`, `user_id`, `user_name`) VALUES
('108415f3-ce0d-11e5-978f-60eb691e4d11', 11, 'INV-KSI/001/CN-0011', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d40', 10, 'INV-KSI/001/CN-0010', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d41', 12, 'INV-KSI/001/CN-0012', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d42', 2, 'INV-KSI/001/CN-0002', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d43', 3, 'INV-KSI/001/CN-0003', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d44', 4, 'INV-KSI/001/CN-0004', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d45', 5, 'INV-KSI/001/CN-0005', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d46', 1, 'INV-KSI/001/CN-0001', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d47', 7, 'INV-KSI/001/CN-0007', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d48', 8, 'INV-KSI/001/CN-0008', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d49', 9, 'INV-KSI/001/CN-0009', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4p46', 6, 'INV-KSI/001/CN-0006', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka');

-- --------------------------------------------------------

--
-- Table structure for table `tanda_terima`
--

CREATE TABLE IF NOT EXISTS `tanda_terima` (
  `sid` varchar(36) NOT NULL,
  `no` int(5) NOT NULL,
  `no_cn` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `alamat_pengirim` text NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `service_udl` varchar(20) NOT NULL,
  `service_dtddtp` varchar(20) NOT NULL,
  `service_agent` varchar(20) NOT NULL,
  `total_coll` int(10) NOT NULL,
  `total_berat` int(10) NOT NULL,
  `total_vol` int(10) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `no_cn` (`no_cn`),
  KEY `no_cn_2` (`no_cn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanda_terima`
--

INSERT INTO `tanda_terima` (`sid`, `no`, `no_cn`, `tanggal`, `pengirim`, `alamat_pengirim`, `tujuan`, `penerima`, `alamat_penerima`, `service_udl`, `service_dtddtp`, `service_agent`, `total_coll`, `total_berat`, `total_vol`, `grand_total`, `deskripsi_paket`, `user_id`, `user_name`) VALUES
('8322e8d8-cde6-11e5-978f-60eb691e4d41', 1, 'KSI-003-JKT', '2016-02-09', 'Beta test dev', 'Jakarta', 'Wonogiri', 'Beta Rev', 'Wonogiri', 'U', 'DTD', 'TIKI', 2, 5, 1, 900000, 'BOM', 'dev', 'Rangga Eka'),
('8322e8d8-cde6-11e5-978f-60eb691e4d46', 1, 'KSI-001-JKT', '2016-02-09', 'Beta test dev', 'Jakarta', 'Wonogiri', 'Beta Rev', 'Wonogiri', 'U', 'DTD', 'TIKI', 2, 5, 1, 900000, 'BOM', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4146', 2, 'KSI-012-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4246', 2, 'KSI-013-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4346', 2, 'KSI-014-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4446', 2, 'KSI-015-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4546', 2, 'KSI-016-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4646', 2, 'KSI-017-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4746', 2, 'KSI-018-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4846', 2, 'KSI-019-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4946', 2, 'KSI-020-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4d40', 2, 'KSI-011-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4d42', 2, 'KSI-004-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4d43', 2, 'KSI-005-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4d44', 2, 'KSI-006-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4d45', 2, 'KSI-007-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4d46', 2, 'KSI-002-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4d47', 2, 'KSI-008-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4d48', 2, 'KSI-009-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb691e4d49', 2, 'KSI-010-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb6d1e4d46', 2, 'KSI-022-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb6h1e4d46', 2, 'KSI-023-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb6k1e4d46', 2, 'KSI-024-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka'),
('dcd6a6bb-cde6-11e5-978f-60eb6r1e4d46', 2, 'KSI-021-JKT', '2016-02-03', 'Beta Sender', 'Jakarta', 'Papua', 'Beta Receiver', 'Timika', 'D', 'DTP', 'RPX', 9, 90, 90, 90000000, 'Batu Kali', 'dev', 'Rangga Eka');

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
  `jabatan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `alamat`, `photo`, `jabatan`) VALUES
('2ebd6f6f-c89d-11e5-8c7e-a01d48c20069', 'sales-dev', 'sales', 'Eka Putra', 'L', 'Kebumen', '2004-05-03', 'Depok', '', 'USER'),
('325532e2-3ddc-11e5-a727-38b1db16526a', 'dev', 'admin', 'Rangga Eka', 'L', 'Kebumen', '1993-06-04', 'Bogor Permai Indah 5', '', 'ADMIN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
