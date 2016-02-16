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
-- Struktur dari tabel `invoice_detail`
--

CREATE TABLE IF NOT EXISTS `invoice_detail` (
  `sid` varchar(36) NOT NULL,
  `tanda_terima_sid` varchar(36) NOT NULL,
  `tanda_terima_nomor` varchar(30) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_detail`
--

INSERT INTO `invoice_detail` (`sid`, `tanda_terima_sid`, `tanda_terima_nomor`, `tarif`) VALUES
('4e4f480e-ae09-4197-9224-2a538a32faf4', 'af44265d-e2f2-4e26-8af9-96e529905386', 'KSI-001', 10000),
('e1e83f3d-f4b5-4add-93b1-0edb6c5eea24', 'bd2e4628-aa9f-48d5-b86f-a30adc737bf8', 'KSI-002', 14000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
