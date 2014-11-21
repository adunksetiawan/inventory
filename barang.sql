-- phpMyAdmin SQL Dump
-- version 4.0.10.5
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 21 Nov 2014 pada 10.42
-- Versi Server: 5.5.40-cll
-- Versi PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `design_distributor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `inc` int(9) NOT NULL AUTO_INCREMENT,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `barang_kategori` varchar(15) NOT NULL,
  `satuan` int(10) NOT NULL,
  `kg` int(10) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`inc`, `barang_id`, `barang_nama`, `barang_kategori`, `satuan`, `kg`, `harga_satuan`) VALUES
(1, '100-001', 'Dark Compound Grande', 'Compoun', 4, 5, 760000),
(2, '100-002', 'Dark Compound Grande', 'Compoun', 12, 1, 468000),
(3, '100-003', 'Milk Compound', 'Compoun', 4, 5, 780000),
(4, '100-004', 'Milk Compound', 'Compoun', 12, 1, 480000),
(5, '100-005', 'White Compound', 'Compoun', 4, 5, 780000),
(6, '100-006', 'White Compound', 'Compoun', 12, 1, 480000),
(7, '100-007', 'Dark Compound Stick', 'Compoun', 4, 1, 245000),
(8, '100-008', 'Dark Compound Chips', 'Compoun', 5, 1, 225000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
