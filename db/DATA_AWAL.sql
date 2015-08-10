-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2015 at 04:53 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gku`
--

--
-- Truncate table before insert `customer`
--

TRUNCATE TABLE `customer`;
--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `id_referensi_user`, `kode_customer`, `nama`, `alamat`, `tlp`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `photo`) VALUES
('20d1c5d8-3ddb-11e5-a727-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST007', 'Endra Krisna Putra', 'Bekasi Jauh', '069876546577', 'L', 'Bandung', '1991-05-13', ''),
('48c49169-3ddb-11e5-a727-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST008', 'Feldi Yusuf', 'Juanda Depok', '0878765465467', 'L', 'Jakarta', '1992-02-02', ''),
('76aa58b1-3dda-11e5-a727-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST004', 'Gugun Yuniarahman', 'Bogor Dermaga 2', '0986745', 'L', 'Tasikmalaya', '1984-03-12', ''),
('7eea5379-3ddb-11e5-a727-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST009', 'Hendra Prastiawan', 'Bumi Serpong Damai 12', '097539878', 'L', 'Jakarta', '1970-09-15', ''),
('9e9faa89-37ef-11e5-a924-1c4bd610cb0e', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST0002', 'ANDIKA', 'JAKARTA', '0987890976', 'L', 'Jakarta', '2015-08-02', ''),
('9e9faa89-39ef-11e5-a924-1c4bd610cb0e', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST0001', 'FELDI YUSUF', 'DEPOK', '0987890976', 'L', 'Jakarta', '2015-08-02', ''),
('9e9faa89-39vf-11e5-a924-1c4bd610cb0e', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST0003', 'NAMA SATU', 'BANDUNG', '0987890976', 'L', 'Jakarta', '2015-08-02', ''),
('a8076fa4-3ddb-11e5-a727-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST010', 'Niko Hunarko', 'Kemayoran 4', '0978645687', 'L', 'Solo', '1989-08-21', ''),
('ba82c434-3dda-11e5-a727-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST005', 'Novi Mustikasari', 'Klender Timur 3', '09764545', 'P', 'Yogyakarta', '1990-08-19', ''),
('c8e0da2a-3dd8-11e5-9217-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST002', 'Andreas Edy', 'Citayem Indah 40', '757690', 'L', 'Wonosari', '1981-12-25', ''),
('f1c2b36a-3dda-11e5-a727-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST006', 'Urmilasari', 'Mampang Prapatan Raya 24', '0987656547880', 'P', 'Bogor', '1990-01-05', ''),
('f429edb8-3dd8-11e5-9217-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST003', 'Hartono Zung', 'Pademangan 3', '8768798', 'L', 'Kalimantan', '1972-08-11', ''),
('f4b64b97-3dd7-11e5-9217-38b1db16526a', 'acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'CUST001', 'Nanang Suryana', 'Grand Depok City', '76576679809', 'L', 'Garut', '1977-06-14', '');

--
-- Truncate table before insert `invoice`
--

TRUNCATE TABLE `invoice`;
--
-- Truncate table before insert `po_detail`
--

TRUNCATE TABLE `po_detail`;
--
-- Truncate table before insert `po_header`
--

TRUNCATE TABLE `po_header`;
--
-- Truncate table before insert `surat_jalan`
--

TRUNCATE TABLE `surat_jalan`;
--
-- Truncate table before insert `tbl_barang`
--

TRUNCATE TABLE `tbl_barang`;
--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `kode_barang`, `nama_barang`, `deskripsi`, `harga`, `is_active`) VALUES
('0ab3f4b4-3dd5-11e5-9217-38b1db16526a', 'TP-02', 'Tessa Softpack 260s FSC', 'Facial Tissue Kemasan Ecoplas 40pcs/ktn', 450000, 1),
('158242f9-3dd7-11e5-9217-38b1db16526a', 'PB-16', 'Tessa Bathroom 8roll', 'Tessa Bathroom 3ply 8pcs/ktn', 450000, 1),
('167313b7-3dd6-11e5-9217-38b1db16526a', 'TTP-001', 'Tessa Kitchen Towel 3s', 'Tessa Kitchen Towel 1ply 6pcs/ktn', 120000, 1),
('50210d93-3dd7-11e5-9217-38b1db16526a', 'TN-07', 'Tessa Napkin 100s', 'Tessa Napkin Semi Emboss 60pcs/ktn', 120000, 1),
('5a828501-3dd5-11e5-9217-38b1db16526a', 'TP-09', 'Tessa Travel Pack 50s', 'Tessa Travel 3ply 48pcs/ktn', 150000, 1),
('74a0399c-3dd7-11e5-9217-38b1db16526a', 'TN-10', 'Tessa Napkin Dinner 50s', 'Tessa Napkin Dinner 2ply 60pcs/ktn', 300000, 1),
('751ecd58-3abd-11e5-be43-1c4bd610cb0e', '001', 'SABUN', 'sdfsdfsdfsdfsd', 5000, 1),
('751eeb74-3abd-11e5-be43-1c4bd610cb0e', '002', 'DETERGEN', 'sdfsdfsdfsdf', 1000, 1),
('8a2abdbe-3dd5-11e5-9217-38b1db16526a', 'TP-18', 'Tessa Travel Pack Ecofriendly 100s', 'Tessa Travel 2ply Ecofriendly 60pcs/ktn', 100000, 1),
('aa7cbe89-3dd3-11e5-9217-38b1db16526a', 'TP-01', 'Tessa Softpack 250s', 'Facial Tissue 2ply 32pcs/ktn', 400000, 1),
('b73befbe-3dd5-11e5-9217-38b1db16526a', 'THSN-001', 'Tessa Towel 150s', 'Tessa Towel 2ply 20pcs/ktn', 200000, 1),
('f7ac9bbf-3dd6-11e5-9217-38b1db16526a', 'PB-03', 'Tessa Bathroom 6roll', 'Tessa Bathroom 2ply 16pcs/ktn', 380000, 1);

--
-- Truncate table before insert `user`
--

TRUNCATE TABLE `user`;
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `alamat`, `photo`, `jabatan`) VALUES
('325532e2-3ddc-11e5-a727-38b1db16526a', 'sales', '12345', 'Nazmi Bahreinsyi', 'L', 'Bogor', '1992-08-06', 'Bogor Permai Indah 5', '', 'SALES'),
('7ba56b1b-3ddc-11e5-a727-38b1db16526a', 'spv', '12345', 'Agus Lau', 'L', 'Jakarta ', '1980-03-01', 'Pantai Indah Kapuk 89', '', 'SUPERVISOR'),
('a190dab6-3ddc-11e5-a727-38b1db16526a', 'se', '12345', 'Elfa Diyanthi', 'P', 'Jombang', '1975-08-04', 'Tambun', '', 'STAFF EXPEDISI'),
('acd540ad-39e6-11e5-a924-1c4bd610cb0e', 'sales', '12345', 'SALES 1', 'L', 'Jakarta', '2015-08-03', 'Jakarta', '', 'SALES'),
('cbbef641-3ddc-11e5-a727-38b1db16526a', 'sopir', '12345', 'Makmur', 'L', 'Karawang', '1971-10-21', 'Cibitung 7 blok A', '', 'SOPIR'),
('fc4b93c9-3ddc-11e5-a727-38b1db16526a', 'finance', '12345', 'Ridho', 'L', 'Jakarta', '1982-11-27', 'Kalimalang Selatan', '', 'FINANCE');
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
