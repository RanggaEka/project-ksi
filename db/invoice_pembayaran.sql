-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 16, 2016 at 10:04 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `invoice_pembayaran`
--

CREATE TABLE IF NOT EXISTS `invoice_pembayaran` (
  `sid` varchar(36) NOT NULL,
  `no_inv` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai_bayar` double NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_pembayaran`
--

INSERT INTO `invoice_pembayaran` (`sid`, `no_inv`, `tanggal`, `nilai_bayar`, `user_id`, `user_name`) VALUES
('08d1d40f-a308-4693-ac70-8c46411640fb', 'INV-001', '2016-02-16', 70000, '325532e2-3ddc-11e5-a727-38b1db16526a', 'dev'),
('17f9c1dc-3047-4ddd-8872-913054cb2bdf', 'INV-001', '2016-02-16', 100000, '325532e2-3ddc-11e5-a727-38b1db16526a', 'dev'),
('70fb166d-85e3-4281-b3b4-03a5d529da70', 'INV-001', '2016-02-16', 100000, '325532e2-3ddc-11e5-a727-38b1db16526a', 'dev'),
('7e5657ec-0b7a-4f66-9b13-52eb2f30746f', 'INV-001', '2016-02-16', 100000, '325532e2-3ddc-11e5-a727-38b1db16526a', 'dev');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
