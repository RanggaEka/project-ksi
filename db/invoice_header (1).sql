-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2016 pada 00.55
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_header`
--

CREATE TABLE IF NOT EXISTS `invoice_header` (
  `sid` varchar(36) NOT NULL,
  `no_inv` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `customer_sid` varchar(36) NOT NULL,
  `customer_nama` text NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `no_inv` (`no_inv`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_header`
--

INSERT INTO `invoice_header` (`sid`, `no_inv`, `tanggal`, `customer_sid`, `customer_nama`, `user_id`, `user_name`) VALUES
('108415f3-ce0d-11e5-978f-60eb691e4d11', 'INV-KSI/001/CN-0011', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d40', 'INV-KSI/001/CN-0010', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d41', 'INV-KSI/001/CN-0012', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d42', 'INV-KSI/001/CN-0002', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d43', 'INV-KSI/001/CN-0003', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d44', 'INV-KSI/001/CN-0004', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d45', 'INV-KSI/001/CN-0005', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d46', 'INV-KSI/001/CN-0001', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d47', 'INV-KSI/001/CN-0007', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d48', 'INV-KSI/001/CN-0008', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4d49', 'INV-KSI/001/CN-0009', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('108415f3-ce0d-11e5-978f-60eb691e4p46', 'INV-KSI/001/CN-0006', '2016-02-08', '08F93B6D-ADFB-11E5-ADF5-C8600086EAB3', 'C00001', 'dev', 'Rangga Eka'),
('49551d1f-154f-43c1-936c-38cec18bdb4f', 'INV-002', '2016-02-16', '3d7cb896-d3e7-11e5-a96b-3085a979acce', 'FUAD', '325532e2-3ddc-11e5-a727-38b1db16526a', 'dev'),
('d3863d60-825a-45fd-803b-f6b060ffd8ae', 'INV-001', '2016-02-16', '3d7cb896-d3e7-11e5-a96b-3085a979acce', 'FUAD', '325532e2-3ddc-11e5-a727-38b1db16526a', 'dev');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
