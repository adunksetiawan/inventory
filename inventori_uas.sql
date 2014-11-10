-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2014 at 03:04 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventori_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `level` varchar(5) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `nama`, `level`) VALUES
('21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `inc` int(9) NOT NULL AUTO_INCREMENT,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `barang_kategori` varchar(7) NOT NULL,
  `satuan` int(10) NOT NULL,
  `kg` int(10) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`inc`, `barang_id`, `barang_nama`, `barang_kategori`, `satuan`, `kg`, `harga_satuan`) VALUES
(1, 'COMP', 'dark compound grande (4x5Kg)', 'compund', 4, 5, 38000),
(2, 'COMP', 'dark compound grande (12x1Kg)', 'compund', 12, 1, 39000),
(3, 'COMP', 'milk compound (4x5Kg)', 'compund', 4, 5, 39000),
(4, 'COMP', 'milk compound (12x1Kg)', 'compund', 12, 1, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE IF NOT EXISTS `beli` (
  `inc` int(9) NOT NULL,
  `beli_id` varchar(9) NOT NULL,
  `no_fak` varchar(14) NOT NULL,
  `tgl_trans` varchar(10) NOT NULL,
  `supplier_nama` varchar(90) NOT NULL,
  `biaya_kirim` double(20,0) NOT NULL,
  `total` double(20,0) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `beli_id` (`beli_id`),
  KEY `supplier_id` (`supplier_nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`inc`, `beli_id`, `no_fak`, `tgl_trans`, `supplier_nama`, `biaya_kirim`, `total`, `qty`) VALUES
(1, 'BM-1', 'FAK-1', '07/11/2014', '', 0, 2488000, 0),
(2, 'BM-2', 'FAK-2', '07/11/2014', '', 0, 468000, 0),
(3, 'BM-3', 'FAK-3', '07/11/2014', '', 0, 468000, 0),
(4, 'BM-4', 'FAK-4', '07/11/2014', '', 0, 468000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `beli_detail`
--

CREATE TABLE IF NOT EXISTS `beli_detail` (
  `beli_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `beli_id` (`beli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli_detail`
--

INSERT INTO `beli_detail` (`beli_id`, `barang_id`, `barang_nama`, `kategori`, `qty`, `packing`, `harga_satuan`, `harga_total`) VALUES
('BM-1', '2', 'dark compound grande (12x1Kg)', 'compu', 1, '12x1kg', 39000, 468000),
('BM-1', '1', 'dark compound grande (4x5Kg)', 'compu', 1, '4x5kg', 38000, 760000),
('BM-1', '4', 'milk compound (12x1Kg)', 'compu', 1, '12x1kg', 40000, 480000),
('BM-1', '3', 'milk compound (4x5Kg)', 'compu', 1, '4x5kg', 39000, 780000),
('BM-2', '2', 'dark compound grande (12x1Kg)', 'compu', 2, '12x1kg', 39000, 468000),
('BM-3', '2', 'dark compound grande (12x1Kg)', 'compu', 5, '12x1kg', 39000, 468000),
('BM-4', '2', 'dark compound grande (12x1Kg)', 'compu', 100, '12x1kg', 39000, 468000);

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE IF NOT EXISTS `jual` (
  `inc` int(9) NOT NULL,
  `jual_id` varchar(14) NOT NULL,
  `no_nota` varchar(14) NOT NULL,
  `tgl_jual` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pelanggan_nama` varchar(90) NOT NULL,
  `total` double(20,0) NOT NULL,
  `jml_bayar` double(20,0) NOT NULL,
  `tgl_jatuh_tempo` varchar(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `username` (`username`),
  KEY `jual_id` (`jual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual`
--

INSERT INTO `jual` (`inc`, `jual_id`, `no_nota`, `tgl_jual`, `username`, `pelanggan_nama`, `total`, `jml_bayar`, `tgl_jatuh_tempo`) VALUES
(1, 'JL-1', 'nota-1', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 936000, 0, ''),
(2, 'JL-2', 'nota-2', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 1884000, 0, ''),
(3, 'JL-3', 'nota-3', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 468000, 0, ''),
(4, 'JL-4', 'nota-4', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 9360000, 0, ''),
(5, 'JL-5', 'nota-5', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 936000, 0, ''),
(6, 'JL-6', 'nota-6', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 2340000, 0, ''),
(7, 'JL-7', 'nota-7', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 936000, 0, ''),
(8, 'JL-8', 'nota-8', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 1404000, 0, ''),
(9, 'JL-9', 'nota-9', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 0, 0, ''),
(10, 'JL-10', 'nota-10', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 760000, 0, ''),
(11, 'JL-11', 'nota-11', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 2184000, 0, ''),
(12, 'JL-12', 'nota-12', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 936000, 0, ''),
(13, 'JL-13', 'nota-13', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 4680000, 0, ''),
(14, 'JL-14', 'nota-14', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', 9360000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jual_detail`
--

CREATE TABLE IF NOT EXISTS `jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_barang` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `jual_id` (`jual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jual_detail`
--

INSERT INTO `jual_detail` (`jual_id`, `barang_id`, `barang_nama`, `kategori`, `qty`, `packing`, `harga_barang`, `harga_total`) VALUES
('JL-1', '2', 'dark compound grande (12x1Kg)', 'compu', 1, 'box', 468000, 468000),
('JL-1', '2', 'dark compound grande (12x1Kg)', 'compu', 1, 'box', 468000, 468000),
('JL-2', '2', 'dark compound grande (12x1Kg)', 'compu', 2, 'box', 468000, 936000),
('JL-2', '2', 'dark compound grande (12x1Kg)', 'compu', 1, 'box', 468000, 468000),
('JL-2', '4', 'milk compound (12x1Kg)', 'compu', 1, 'box', 480000, 480000),
('JL-5', '2', 'dark compound grande (12x1Kg)', 'compu', 1, '12x1kg', 0, 468000),
('JL-5', '2', 'dark compound grande (12x1Kg)', 'compu', 1, '12x1kg', 0, 468000),
('JL-6', '2', 'dark compound grande (12x1Kg)', 'compu', 5, '12x1kg', 0, 2340000),
('JL-7', '2', 'dark compound grande (12x1Kg)', 'compu', 2, 'compu', 0, 936000),
('JL-8', '2', 'dark compound grande (12x1Kg)', 'compu', 3, '12x1kg', 0, 1404000),
('JL-10', '1', 'dark compound grande (4x5Kg)', 'compu', 1, '4x5kg', 0, 760000),
('JL-11', '2', 'dark compound grande (12x1Kg)', 'compu', 2, '12x1kg', 0, 936000),
('JL-11', '2', 'dark compound grande (12x1Kg)', 'compu', 1, '12x1kg', 0, 468000),
('JL-11', '3', 'milk compound (4x5Kg)', 'compu', 1, '4x5kg', 0, 780000),
('JL-12', '2', 'dark compound grande (12x1Kg)', 'compu', 2, '12x1kg', 468000, 936000),
('JL-13', '2', 'dark compound grande (12x1Kg)', 'compu', 10, '12x1kg', 468000, 4680000),
('JL-14', '2', 'dark compound grande (12x1Kg)', 'compu', 20, '12x1kg', 468000, 9360000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `inc` int(9) NOT NULL,
  `pelanggan_id` varchar(9) NOT NULL,
  `pelanggan_nama` varchar(90) NOT NULL,
  `pelanggan_alamat` varchar(90) NOT NULL,
  `pelanggan_kota` varchar(50) NOT NULL,
  `pelanggan_email` varchar(90) NOT NULL,
  `pelanggan_kontak` varchar(20) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `pelanggan_id` (`pelanggan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--


-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE IF NOT EXISTS `stok` (
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(9) NOT NULL,
  `harga_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`barang_id`, `barang_nama`, `kategori`, `qty`, `packing`, `harga_barang`) VALUES
('2', 'dark compound grande (12x1Kg)', 'compu', 0, '12x1kg', 468000),
('1', 'dark compound grande (4x5Kg)', 'compu', 0, '4x5kg', 760000),
('4', 'milk compound (12x1Kg)', 'compu', 0, '12x1kg', 480000),
('3', 'milk compound (4x5Kg)', 'compu', 0, '4x5kg', 780000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `inc` int(9) NOT NULL,
  `supplier_id` varchar(9) NOT NULL,
  `supplier_nama` varchar(90) NOT NULL,
  `supplier_alamat` varchar(90) NOT NULL,
  `supplier_kota` varchar(50) NOT NULL,
  `supplier_email` varchar(90) NOT NULL,
  `supplier_kontak` varchar(20) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_beli_detail`
--

CREATE TABLE IF NOT EXISTS `temp_beli_detail` (
  `beli_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_beli_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_jual_detail`
--

CREATE TABLE IF NOT EXISTS `temp_jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_barang` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_jual_detail`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `beli_detail`
--
ALTER TABLE `beli_detail`
  ADD CONSTRAINT `beli_detail_ibfk_1` FOREIGN KEY (`beli_id`) REFERENCES `beli` (`beli_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jual_detail`
--
ALTER TABLE `jual_detail`
  ADD CONSTRAINT `jual_detail_ibfk_1` FOREIGN KEY (`jual_id`) REFERENCES `jual` (`jual_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
