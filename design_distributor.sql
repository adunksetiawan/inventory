-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 05 Des 2014 pada 10.08
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
-- Struktur dari tabel `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `level` varchar(5) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`username`, `password`, `nama`, `level`) VALUES
('21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 'Agus Setiawan', 'admin'),
('3ca55ebb95ddbde84e35f51574a735d6', '3ca55ebb95ddbde84e35f51574a735d6', 'kendari', 'user'),
('e59cd3ce33a68f536c19fedb82a7936f', 'e59cd3ce33a68f536c19fedb82a7936f', 'agung', 'user'),
('f8829935a87192f3f9fab79856122c0f', 'f8829935a87192f3f9fab79856122c0f', 'Tamu', 'user'),
('fdf169558242ee051cca1479770ebac3', 'fdf169558242ee051cca1479770ebac3', 'agus', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `account_menu`
--

CREATE TABLE IF NOT EXISTS `account_menu` (
  `id_menu` int(11) NOT NULL,
  `id_menu_tree` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account_menu`
--

INSERT INTO `account_menu` (`id_menu`, `id_menu_tree`, `username`) VALUES
(1, 1, 'f8829935a87192f3f9fab79856122c0f'),
(7, 1, '21232f297a57a5a743894a0e4a801fc3'),
(4, 1, '21232f297a57a5a743894a0e4a801fc3'),
(5, 1, '21232f297a57a5a743894a0e4a801fc3'),
(3, 1, '21232f297a57a5a743894a0e4a801fc3'),
(6, 1, '21232f297a57a5a743894a0e4a801fc3'),
(1, 1, '21232f297a57a5a743894a0e4a801fc3'),
(2, 1, '21232f297a57a5a743894a0e4a801fc3'),
(8, 1, '21232f297a57a5a743894a0e4a801fc3'),
(2, 1, 'f8829935a87192f3f9fab79856122c0f'),
(3, 1, 'f8829935a87192f3f9fab79856122c0f'),
(4, 1, 'f8829935a87192f3f9fab79856122c0f'),
(5, 1, 'f8829935a87192f3f9fab79856122c0f'),
(6, 1, 'f8829935a87192f3f9fab79856122c0f'),
(7, 1, 'f8829935a87192f3f9fab79856122c0f'),
(1, 1, 'fdf169558242ee051cca1479770ebac3'),
(2, 4, 'fdf169558242ee051cca1479770ebac3'),
(7, 1, 'fdf169558242ee051cca1479770ebac3'),
(9, 1, '21232f297a57a5a743894a0e4a801fc3'),
(2, 2, '21232f297a57a5a743894a0e4a801fc3'),
(2, 3, '21232f297a57a5a743894a0e4a801fc3'),
(2, 4, '21232f297a57a5a743894a0e4a801fc3'),
(3, 2, '21232f297a57a5a743894a0e4a801fc3'),
(3, 3, '21232f297a57a5a743894a0e4a801fc3'),
(3, 4, '21232f297a57a5a743894a0e4a801fc3'),
(4, 2, '21232f297a57a5a743894a0e4a801fc3'),
(4, 3, '21232f297a57a5a743894a0e4a801fc3'),
(4, 4, '21232f297a57a5a743894a0e4a801fc3'),
(5, 2, '21232f297a57a5a743894a0e4a801fc3'),
(6, 2, '21232f297a57a5a743894a0e4a801fc3'),
(7, 2, '21232f297a57a5a743894a0e4a801fc3'),
(7, 3, '21232f297a57a5a743894a0e4a801fc3'),
(5, 1, 'e59cd3ce33a68f536c19fedb82a7936f'),
(5, 2, 'e59cd3ce33a68f536c19fedb82a7936f'),
(6, 1, 'e59cd3ce33a68f536c19fedb82a7936f'),
(6, 2, 'e59cd3ce33a68f536c19fedb82a7936f'),
(7, 1, 'e59cd3ce33a68f536c19fedb82a7936f'),
(2, 5, '21232f297a57a5a743894a0e4a801fc3'),
(2, 6, '21232f297a57a5a743894a0e4a801fc3'),
(2, 7, '21232f297a57a5a743894a0e4a801fc3'),
(2, 8, '21232f297a57a5a743894a0e4a801fc3'),
(2, 6, 'e59cd3ce33a68f536c19fedb82a7936f'),
(2, 7, 'e59cd3ce33a68f536c19fedb82a7936f'),
(2, 8, 'e59cd3ce33a68f536c19fedb82a7936f'),
(2, 5, 'e59cd3ce33a68f536c19fedb82a7936f'),
(5, 3, '21232f297a57a5a743894a0e4a801fc3'),
(5, 4, '21232f297a57a5a743894a0e4a801fc3'),
(10, 1, '21232f297a57a5a743894a0e4a801fc3'),
(10, 2, '21232f297a57a5a743894a0e4a801fc3'),
(10, 1, '3ca55ebb95ddbde84e35f51574a735d6'),
(10, 2, '3ca55ebb95ddbde84e35f51574a735d6');

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
  `ukuran` varchar(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`inc`, `barang_id`, `barang_nama`, `barang_kategori`, `satuan`, `kg`, `harga_satuan`, `ukuran`) VALUES
(1, 'EVM-001', 'Evaporated Milk', 'Evaporated Milk', 48, 400, 0, 'gr'),
(2, 'COMP-001', 'Dark Compound Grande', 'Compounds', 5, 5, 0, 'kg'),
(3, 'BTR-001', 'Flechard Patissy Butter', 'Butter', 1, 17, 0, 'kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_kategori`
--

CREATE TABLE IF NOT EXISTS `barang_kategori` (
  `id_kat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kat` char(10) DEFAULT NULL,
  `nm_kat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_kat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `barang_kategori`
--

INSERT INTO `barang_kategori` (`id_kat`, `kode_kat`, `nm_kat`) VALUES
(15, 'EVM', 'Evaporated Milk'),
(16, 'COMP', 'Compounds'),
(17, 'BTR', 'Butter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli`
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
-- Dumping data untuk tabel `beli`
--

INSERT INTO `beli` (`inc`, `beli_id`, `no_fak`, `tgl_trans`, `supplier_nama`, `biaya_kirim`, `total`, `qty`) VALUES
(1, 'BM-1', 'FAK-1', '28/11/2014', 'F&D Dairies Sdn Bhd', 0, 0, 0),
(2, 'BM-2', 'FAK-2', '28/11/2014', 'F&D Dairies Sdn Bhd', 0, 0, 0),
(3, 'BM-3', 'FAK-3', '28/11/2014', 'Flechard', 0, 0, 0),
(4, 'BM-4', 'FAK-4', '01/12/2014', 'F&D Dairies Sdn Bhd', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_detail`
--

CREATE TABLE IF NOT EXISTS `beli_detail` (
  `beli_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `beli_id` (`beli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli_detail`
--

INSERT INTO `beli_detail` (`beli_id`, `barang_id`, `barang_nama`, `kategori`, `qty`, `packing`, `harga_satuan`, `harga_total`) VALUES
('BM-1', '1', 'Evaporated Milk', 'Evaporated Milk', 2020, '48x400gr', 0, 0),
('BM-2', '2', 'Dark Compound Grande', 'Compounds', 100, '5x5kg', 0, 0),
('BM-3', '3', 'Flechard Patissy Butter', 'Butter', 800, '1x17kg', 0, 0),
('BM-4', '1', 'Evaporated Milk', 'Evaporated Milk', 2020, '48x400gr', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor_jual`
--

CREATE TABLE IF NOT EXISTS `distributor_jual` (
  `inc` int(9) NOT NULL,
  `jual_id` varchar(14) NOT NULL,
  `no_nota` varchar(14) NOT NULL,
  `tgl_jual` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pelanggan_nama` varchar(90) NOT NULL,
  `total` double(20,0) NOT NULL,
  `jml_bayar` double(20,0) NOT NULL,
  `tgl_jatuh_tempo` varchar(10) NOT NULL,
  `distributor_nama` varchar(30) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `username` (`username`),
  KEY `jual_id` (`jual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor_jual`
--

INSERT INTO `distributor_jual` (`inc`, `jual_id`, `no_nota`, `tgl_jual`, `username`, `pelanggan_nama`, `total`, `jml_bayar`, `tgl_jatuh_tempo`, `distributor_nama`) VALUES
(1, 'PBL-1', 'nota-1', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'TOKO A', 0, 0, '//', 'UD Kendari Sby'),
(2, 'PBL-2', 'nota-2', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', '', 0, 0, '//', 'PD SAHABAT PONTIANAK'),
(3, 'PBL-3', 'nota-3', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', '', 0, 0, '//', 'TOKO SUMSEL'),
(4, 'PBL-4', 'nota-4', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'asd', 0, 0, '//', 'TOKO SUMSEL'),
(5, 'PBL-5', 'nota-5', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'test', 0, 0, '//', 'UD Kendari Sby'),
(6, 'PBL-6', 'nota-6', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'gsrgrg', 0, 0, '//', 'PD SAHABAT PONTIANAK'),
(7, 'PBL-7', 'nota-7', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'test2', 0, 0, '//', 'UD Kendari Sby'),
(8, 'PBL-8', 'nota-8', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'asdsads', 0, 0, '//', 'UD Kendari Sby'),
(9, 'PBL-9', 'nota-9', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'test3', 0, 0, '//', 'UD Kendari Sby'),
(10, 'PBL-10', 'nota-10', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'Abdul', 0, 0, '//', 'UD Kendari Sby'),
(11, 'PBL-11', 'nota-11', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', '', 0, 0, '//', 'PD SAHABAT PONTIANAK'),
(12, 'PBL-12', 'nota-12', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', '', 0, 0, '//', 'PD SAHABAT PONTIANAK'),
(13, 'PBL-13', 'nota-13', '01/12/2014', '21232f297a57a5a743894a0e4a801fc3', '', 0, 0, '//', 'UD Kendari Sby');

-- --------------------------------------------------------

--
-- Struktur dari tabel `distributor_jual_detail`
--

CREATE TABLE IF NOT EXISTS `distributor_jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_barang` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `jual_id` (`jual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `distributor_jual_detail`
--

INSERT INTO `distributor_jual_detail` (`jual_id`, `barang_id`, `barang_nama`, `kategori`, `qty`, `packing`, `harga_barang`, `harga_total`) VALUES
('PBL-1', '1', 'Evaporated Milk', 'Evaporated Milk', 10, '48x400gr', 0, 0),
('PBL-2', '1', 'Evaporated Milk', 'Evaporated Milk', 50, '48x400gr', 0, 0),
('PBL-3', '1', 'Evaporated Milk', 'Evaporated Milk', 50, '48x400gr', 0, 0),
('PBL-4', '1', 'Evaporated Milk', 'Evaporated Milk', 100, '48x400gr', 0, 0),
('PBL-5', '1', 'Evaporated Milk', 'Evaporated Milk', 100, '48x400gr', 0, 0),
('PBL-6', '1', 'Evaporated Milk', 'Evaporated Milk', 1, '48x400gr', 0, 0),
('PBL-7', '1', 'Evaporated Milk', 'Evaporated Milk', 5, '48x400gr', 0, 0),
('PBL-8', '1', 'Evaporated Milk', 'Evaporated Milk', 5, '48x400gr', 0, 0),
('PBL-9', '1', 'Evaporated Milk', 'Evaporated Milk', 7, '48x400gr', 0, 0),
('PBL-10', '1', 'Evaporated Milk', 'Evaporated Milk', 2, '48x400gr', 0, 0),
('PBL-10', '2', 'Dark Compound Grande', 'Compounds', 2, '5x5kg', 0, 0),
('PBL-11', '1', 'Evaporated Milk', 'Evaporated Milk', 23, '48x400gr', 0, 0),
('PBL-11', '1', 'Evaporated Milk', 'Evaporated Milk', 32, '48x400gr', 0, 0),
('PBL-12', '3', 'Flechard Patissy Butter', 'Butter', 100, '1x17kg', 0, 0),
('PBL-12', '1', 'Evaporated Milk', 'Evaporated Milk', 100, '48x400gr', 0, 0),
('PBL-13', '1', 'Evaporated Milk', 'Evaporated Milk', 200, '48x400gr', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual`
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
-- Dumping data untuk tabel `jual`
--

INSERT INTO `jual` (`inc`, `jual_id`, `no_nota`, `tgl_jual`, `username`, `pelanggan_nama`, `total`, `jml_bayar`, `tgl_jatuh_tempo`) VALUES
(1, 'JL-1', 'nota-1', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'UD Kendari Sby', 0, 0, '//'),
(2, 'JL-2', 'nota-2', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'PD SAHABAT PONTIANAK', 0, 0, '//'),
(3, 'JL-3', 'nota-3', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'TOKO SUMSEL', 0, 0, '//'),
(4, 'JL-4', 'nota-4', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'UD Kendari Sby', 0, 0, '//'),
(5, 'JL-5', 'nota-5', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'UD Kendari Sby', 0, 0, '//'),
(6, 'JL-6', 'nota-6', '28/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'PD SAHABAT PONTIANAK', 0, 0, '//');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jual_detail`
--

CREATE TABLE IF NOT EXISTS `jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_barang` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `jual_id` (`jual_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jual_detail`
--

INSERT INTO `jual_detail` (`jual_id`, `barang_id`, `barang_nama`, `kategori`, `qty`, `packing`, `harga_barang`, `harga_total`) VALUES
('JL-1', '1', 'Evaporated Milk', 'Evaporated Milk', 198, '48x400gr', 0, 0),
('JL-2', '1', 'Evaporated Milk', 'Evaporated Milk', 175, '48x400gr', 0, 0),
('JL-3', '1', 'Evaporated Milk', 'Evaporated Milk', 284, '48x400gr', 0, 0),
('JL-4', '2', 'Dark Compound Grande', 'Compounds', 48, '5x5kg', 0, 0),
('JL-5', '3', 'Flechard Patissy Butter', 'Butter', 400, '1x17kg', 0, 0),
('JL-6', '3', 'Flechard Patissy Butter', 'Butter', 100, '1x17kg', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id_menu` int(11) NOT NULL DEFAULT '0',
  `id_menu_tree` int(11) DEFAULT NULL,
  `nm_menu` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_class` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id_menu`, `id_menu_tree`, `nm_menu`, `url`, `id`, `custom_class`) VALUES
(1, 1, 'Home', 'index.php', 1, 'fa fa-home fa-fw'),
(2, 1, 'Produk', 'index.php?halaman=data_barang', 2, 'fa fa-briefcase fa-fw'),
(3, 1, 'Supplier', 'index.php?halaman=data_supplier', 3, 'fa fa-user fa-fw'),
(4, 1, 'Distributor', 'index.php?halaman=data_pelanggan', 4, 'fa fa-users fa-fw'),
(5, 1, 'Stokist Barang', 'index.php?halaman=barang_masuk', 5, 'fa fa-arrow-left fa-fw'),
(6, 1, 'Stokist distributor', 'index.php?halaman=penjualan', 6, 'fa fa-arrow-right fa-fw'),
(8, 1, 'Akun', 'index.php?halaman=data_akun', 8, 'fa fa-user fa-fw'),
(9, 1, 'Data Menu', 'index.php?halaman=data_menu', 9, 'fa fa-align-justify fa-fw'),
(2, 2, 'Input Data Produk', 'index.php?halaman=form_data_master&kode=barang_insert', 14, 'fa fa-plus fa-fw'),
(2, 3, 'Ubah Data Produk', 'index.php?halaman=data_barang&act=ubah', 15, 'fa fa-edit fa-fw'),
(2, 4, 'Hapus Data Produk', 'index.php?halaman=data_barang&act=hapus', 16, 'fa fa-minus fa-fw'),
(3, 2, 'Input Data Supplier', 'index.php?halaman=form_data_master&kode=supplier_insert', 17, 'fa fa-plus fa-fw'),
(3, 3, 'Ubah Data Supplier', 'index.php?halaman=data_supplier&act=ubah', 18, 'fa fa-edit fa-fw'),
(3, 4, 'Hapus Data Supplier', 'index.php?halaman=data_supplier&act=hapus', 19, 'fa fa-minus fa-fw'),
(4, 2, 'Input Data Distributor', 'index.php?halaman=form_data_master&kode=pelanggan_insert', 20, 'fa fa-plus fa-fw'),
(4, 3, 'Ubah Data Distributor', 'index.php?halaman=data_pelanggan&act=ubah', 21, 'fa fa-edit fa-fw'),
(4, 4, 'Hapus Data Distributor', 'index.php?halaman=data_pelanggan&act=hapus', 22, 'fa fa-minus fa-fw'),
(5, 2, 'Stokist Input', 'index.php?halaman=form_beli', 23, 'fa fa-plus fa-fw'),
(6, 2, 'Input Stockist Distributor', 'index.php?halaman=form_jual', 24, 'fa fa-plus fa-fw'),
(5, 3, 'Ubah Stok', 'index.php?halaman=stok&act=ubah', 25, 'fa fa-edit fa-fw'),
(5, 4, 'Hapus Stok', 'index.php?halaman=stok&act=hapus', 26, 'fa fa-minus fa-fw'),
(2, 5, 'Input Kategori Produk', 'index.php?halaman=form_data_master&kode=kategori_insert', 27, 'fa fa-plus fa-fw'),
(2, 6, 'Data Kategori Produk', 'index.php?halaman=data_kategori_barang', 28, 'fa fa-align-justify fa-fw'),
(2, 7, 'Ubah Kategori Produk', 'index.php?halaman=data_kategori_barang&act=ubah', 29, 'fa fa-edit fa-fw'),
(2, 8, 'Hapus Kategori Produk', 'index.php?halaman=data_kategori_barang&act=hapus', 30, 'fa fa-minus fa-fw'),
(10, 1, 'Stokist pelanggan', 'index.php?halaman=pelanggan', 31, 'fa fa-align-justify fa-fw'),
(10, 2, 'Input Stockist Pelanggan', 'index.php?halaman=form_pelanggan_jual', 32, 'fa fa-plus fa-fw');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
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
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`inc`, `pelanggan_id`, `pelanggan_nama`, `pelanggan_alamat`, `pelanggan_kota`, `pelanggan_email`, `pelanggan_kontak`) VALUES
(1, 'PLG-1', 'UD Kendari Sby', 'Jl. Kenjeran', 'Surabaya, Jawa Timur', '-', 'Bpk Yulianto'),
(2, 'PLG-2', 'PD SAHABAT PONTIANAK', 'Pontianak', 'Pontianak, Kalimantan Barat', '-', 'Bpk Irwan'),
(3, 'PLG-3', 'TOKO SUMSEL', 'Jambi', 'Jambi', '-', 'Bpk Sinto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang_penjualan`
--

CREATE TABLE IF NOT EXISTS `piutang_penjualan` (
  `jual_id` char(10) DEFAULT NULL,
  `no_nota` char(15) DEFAULT NULL,
  `tgl_jual` varchar(30) DEFAULT NULL,
  `pelanggan_nama` varchar(30) DEFAULT NULL,
  `piutang_awal` varchar(30) DEFAULT NULL,
  `jml_bayar` varchar(30) DEFAULT NULL,
  `piutang_sisa` varchar(30) DEFAULT NULL,
  `tgl_jatuh_tempo` varchar(30) DEFAULT NULL,
  `keterangan` text,
  `distributor_nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang_penjualan_detail`
--

CREATE TABLE IF NOT EXISTS `piutang_penjualan_detail` (
  `jual_id` varchar(30) DEFAULT NULL,
  `tgl_bayar` varchar(30) DEFAULT NULL,
  `jml_bayar` int(11) DEFAULT NULL,
  `sisa_bayar` int(11) DEFAULT NULL,
  `inc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE IF NOT EXISTS `stok` (
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(9) NOT NULL,
  `harga_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`barang_id`, `barang_nama`, `kategori`, `qty`, `packing`, `harga_barang`) VALUES
('1', 'Evaporated Milk', 'Evaporated Milk', 2302, '48x400gr', 0),
('2', 'Dark Compound Grande', 'Compounds', 50, '5x5kg', 0),
('3', 'Flechard Patissy Butter', 'Butter', 200, '1x17kg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
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
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`inc`, `supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_kota`, `supplier_email`, `supplier_kontak`) VALUES
(1, 'SPL-1', 'F&D Dairies Sdn Bhd', 'Kuala Lumpur', 'Kuala Lumpur, Malaysia', '', 'Gino'),
(2, 'SPL-2', 'Flechard', 'France', 'France', '-', 'Maxime');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_beli_detail`
--

CREATE TABLE IF NOT EXISTS `temp_beli_detail` (
  `beli_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_distributor_jual_detail`
--

CREATE TABLE IF NOT EXISTS `temp_distributor_jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_barang` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_jual_detail`
--

CREATE TABLE IF NOT EXISTS `temp_jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_barang` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beli_detail`
--
ALTER TABLE `beli_detail`
  ADD CONSTRAINT `beli_detail_ibfk_1` FOREIGN KEY (`beli_id`) REFERENCES `beli` (`beli_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `distributor_jual`
--
ALTER TABLE `distributor_jual`
  ADD CONSTRAINT `distributor_jual_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `distributor_jual_detail`
--
ALTER TABLE `distributor_jual_detail`
  ADD CONSTRAINT `distributor_jual_detail_ibfk_1` FOREIGN KEY (`jual_id`) REFERENCES `distributor_jual` (`jual_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jual_detail`
--
ALTER TABLE `jual_detail`
  ADD CONSTRAINT `jual_detail_ibfk_1` FOREIGN KEY (`jual_id`) REFERENCES `jual` (`jual_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
