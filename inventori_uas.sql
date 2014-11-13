/*
MySQL Data Transfer
Source Host: localhost
Source Database: inventori_uas
Target Host: localhost
Target Database: inventori_uas
Date: 13-Nov-14 9:43:33 AM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `level` varchar(5) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for account_menu
-- ----------------------------
DROP TABLE IF EXISTS `account_menu`;
CREATE TABLE `account_menu` (
  `id_menu` int(11) NOT NULL,
  `id_menu_tree` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `inc` int(9) NOT NULL AUTO_INCREMENT,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `barang_kategori` varchar(7) NOT NULL,
  `satuan` int(10) NOT NULL,
  `kg` int(10) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for beli
-- ----------------------------
DROP TABLE IF EXISTS `beli`;
CREATE TABLE `beli` (
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

-- ----------------------------
-- Table structure for beli_detail
-- ----------------------------
DROP TABLE IF EXISTS `beli_detail`;
CREATE TABLE `beli_detail` (
  `beli_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `beli_id` (`beli_id`),
  CONSTRAINT `beli_detail_ibfk_1` FOREIGN KEY (`beli_id`) REFERENCES `beli` (`beli_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for jual
-- ----------------------------
DROP TABLE IF EXISTS `jual`;
CREATE TABLE `jual` (
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
  KEY `jual_id` (`jual_id`),
  CONSTRAINT `jual_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for jual_detail
-- ----------------------------
DROP TABLE IF EXISTS `jual_detail`;
CREATE TABLE `jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_barang` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL,
  KEY `jual_id` (`jual_id`),
  CONSTRAINT `jual_detail_ibfk_1` FOREIGN KEY (`jual_id`) REFERENCES `jual` (`jual_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id_menu` int(11) NOT NULL DEFAULT '0',
  `id_menu_tree` int(11) DEFAULT NULL,
  `nm_menu` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_class` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE `pelanggan` (
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

-- ----------------------------
-- Table structure for stok
-- ----------------------------
DROP TABLE IF EXISTS `stok`;
CREATE TABLE `stok` (
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `qty` smallint(5) NOT NULL,
  `packing` varchar(9) NOT NULL,
  `harga_barang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
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

-- ----------------------------
-- Table structure for temp_beli_detail
-- ----------------------------
DROP TABLE IF EXISTS `temp_beli_detail`;
CREATE TABLE `temp_beli_detail` (
  `beli_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_satuan` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for temp_jual_detail
-- ----------------------------
DROP TABLE IF EXISTS `temp_jual_detail`;
CREATE TABLE `temp_jual_detail` (
  `jual_id` varchar(9) NOT NULL,
  `barang_id` varchar(14) NOT NULL,
  `barang_nama` varchar(90) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `qty` smallint(7) NOT NULL,
  `packing` varchar(14) NOT NULL,
  `harga_barang` double(20,0) NOT NULL,
  `harga_total` double(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `account` VALUES ('21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3', 'Agus Setiawan', 'admin');
INSERT INTO `account` VALUES ('f8829935a87192f3f9fab79856122c0f', 'f8829935a87192f3f9fab79856122c0f', 'Tamu', 'user');
INSERT INTO `account` VALUES ('fdf169558242ee051cca1479770ebac3', 'fdf169558242ee051cca1479770ebac3', 'agus', 'user');
INSERT INTO `account_menu` VALUES ('1', '1', 'f8829935a87192f3f9fab79856122c0f');
INSERT INTO `account_menu` VALUES ('7', '1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('4', '1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('5', '1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('3', '1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('6', '1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('1', '1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('2', '1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('8', '1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('2', '1', 'f8829935a87192f3f9fab79856122c0f');
INSERT INTO `account_menu` VALUES ('3', '1', 'f8829935a87192f3f9fab79856122c0f');
INSERT INTO `account_menu` VALUES ('4', '1', 'f8829935a87192f3f9fab79856122c0f');
INSERT INTO `account_menu` VALUES ('5', '1', 'f8829935a87192f3f9fab79856122c0f');
INSERT INTO `account_menu` VALUES ('6', '1', 'f8829935a87192f3f9fab79856122c0f');
INSERT INTO `account_menu` VALUES ('7', '1', 'f8829935a87192f3f9fab79856122c0f');
INSERT INTO `account_menu` VALUES ('1', '1', 'fdf169558242ee051cca1479770ebac3');
INSERT INTO `account_menu` VALUES ('2', '4', 'fdf169558242ee051cca1479770ebac3');
INSERT INTO `account_menu` VALUES ('7', '1', 'fdf169558242ee051cca1479770ebac3');
INSERT INTO `account_menu` VALUES ('9', '1', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('2', '2', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('2', '3', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('2', '4', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('3', '2', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('3', '3', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('3', '4', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('4', '2', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('4', '3', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('4', '4', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('5', '2', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('6', '2', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('7', '2', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `account_menu` VALUES ('7', '3', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `barang` VALUES ('1', 'COMP', 'dark compound grande (4x5Kg)', 'compund', '4', '5', '38000');
INSERT INTO `barang` VALUES ('2', 'COMP', 'dark compound grande (12x1Kg)', 'compund', '12', '1', '39000');
INSERT INTO `barang` VALUES ('3', 'COMP', 'milk compound (4x5Kg)', 'compund', '4', '5', '39000');
INSERT INTO `barang` VALUES ('4', 'COMP', 'milk compound (12x1Kg)', 'compund', '12', '1', '40000');
INSERT INTO `barang` VALUES ('5', 'COMP', 'dark compound grande Plussss (4x5Kg)', 'Compoun', '12', '1', '50000');
INSERT INTO `beli` VALUES ('1', 'BM-1', 'FAK-1', '07/11/2014', '', '0', '2488000', '0');
INSERT INTO `beli` VALUES ('2', 'BM-2', 'FAK-2', '07/11/2014', '', '0', '468000', '0');
INSERT INTO `beli` VALUES ('3', 'BM-3', 'FAK-3', '07/11/2014', '', '0', '468000', '0');
INSERT INTO `beli` VALUES ('4', 'BM-4', 'FAK-4', '07/11/2014', '', '0', '468000', '0');
INSERT INTO `beli` VALUES ('5', 'BM-5', 'FAK-5', '09/11/2014', 'Agus Setiawan', '0', '468000', '0');
INSERT INTO `beli` VALUES ('6', 'BM-6', 'FAK-6', '10/11/2014', 'Agus Setiawan', '0', '600000', '0');
INSERT INTO `beli` VALUES ('7', 'BM-7', 'FAK-7', '10/11/2014', 'Agus Setiawan', '0', '760000', '0');
INSERT INTO `beli` VALUES ('8', 'BM-8', 'FAK-8', '10/11/2014', 'Agus Setiawan', '100000', '780000', '0');
INSERT INTO `beli` VALUES ('9', 'BM-9', 'FAK-9', '10/11/2014', 'Dani Kurniawan', '100000', '468000', '0');
INSERT INTO `beli` VALUES ('10', 'BM-10', 'FAK-10', '10/11/2014', 'Dani Kurniawan', '100000', '600000', '0');
INSERT INTO `beli` VALUES ('11', 'BM-11', 'FAK-11', '10/11/2014', 'Agus Setiawan', '0', '468000', '0');
INSERT INTO `beli` VALUES ('12', 'BM-12', 'FAK-12', '10/11/2014', 'Agus Setiawan', '0', '468000', '0');
INSERT INTO `beli` VALUES ('13', 'BM-13', 'FAK-13', '12/11/2014', 'Dani Kurniawan', '0', '480000', '0');
INSERT INTO `beli_detail` VALUES ('BM-1', '2', 'dark compound grande (12x1Kg)', 'compu', '1', '12x1kg', '39000', '468000');
INSERT INTO `beli_detail` VALUES ('BM-1', '1', 'dark compound grande (4x5Kg)', 'compu', '1', '4x5kg', '38000', '760000');
INSERT INTO `beli_detail` VALUES ('BM-1', '4', 'milk compound (12x1Kg)', 'compu', '1', '12x1kg', '40000', '480000');
INSERT INTO `beli_detail` VALUES ('BM-1', '3', 'milk compound (4x5Kg)', 'compu', '1', '4x5kg', '39000', '780000');
INSERT INTO `beli_detail` VALUES ('BM-2', '2', 'dark compound grande (12x1Kg)', 'compu', '2', '12x1kg', '39000', '468000');
INSERT INTO `beli_detail` VALUES ('BM-3', '2', 'dark compound grande (12x1Kg)', 'compu', '5', '12x1kg', '39000', '468000');
INSERT INTO `beli_detail` VALUES ('BM-4', '2', 'dark compound grande (12x1Kg)', 'compu', '100', '12x1kg', '39000', '468000');
INSERT INTO `beli_detail` VALUES ('BM-5', '2', 'dark compound grande (12x1Kg)', 'compu', '100', '12x1kg', '39000', '468000');
INSERT INTO `beli_detail` VALUES ('BM-6', '5', 'dark compound grande Plussss (4x5Kg)', 'Compo', '10', '12x1kg', '50000', '600000');
INSERT INTO `beli_detail` VALUES ('BM-7', '1', 'dark compound grande (4x5Kg)', 'compu', '20', '4x5kg', '38000', '760000');
INSERT INTO `beli_detail` VALUES ('BM-8', '3', 'milk compound (4x5Kg)', 'compu', '100', '4x5kg', '39000', '780000');
INSERT INTO `beli_detail` VALUES ('BM-9', '2', 'dark compound grande (12x1Kg)', 'compu', '10', '12x1kg', '39000', '468000');
INSERT INTO `beli_detail` VALUES ('BM-10', '5', 'dark compound grande Plussss (4x5Kg)', 'Compo', '100', '12x1kg', '50000', '600000');
INSERT INTO `beli_detail` VALUES ('BM-11', '2', 'dark compound grande (12x1Kg)', 'compu', '2', '12x1kg', '39000', '468000');
INSERT INTO `beli_detail` VALUES ('BM-12', '2', 'dark compound grande (12x1Kg)', 'compu', '200', '12x1kg', '39000', '468000');
INSERT INTO `beli_detail` VALUES ('BM-13', '4', 'milk compound (12x1Kg)', 'compu', '100', '12x1kg', '40000', '480000');
INSERT INTO `jual` VALUES ('1', 'JL-1', 'nota-1', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '936000', '0', '');
INSERT INTO `jual` VALUES ('2', 'JL-2', 'nota-2', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '1884000', '0', '');
INSERT INTO `jual` VALUES ('3', 'JL-3', 'nota-3', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '468000', '0', '');
INSERT INTO `jual` VALUES ('4', 'JL-4', 'nota-4', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '9360000', '0', '');
INSERT INTO `jual` VALUES ('5', 'JL-5', 'nota-5', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '936000', '0', '');
INSERT INTO `jual` VALUES ('6', 'JL-6', 'nota-6', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '2340000', '0', '');
INSERT INTO `jual` VALUES ('7', 'JL-7', 'nota-7', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '936000', '0', '');
INSERT INTO `jual` VALUES ('8', 'JL-8', 'nota-8', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '1404000', '0', '');
INSERT INTO `jual` VALUES ('9', 'JL-9', 'nota-9', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '0', '0', '');
INSERT INTO `jual` VALUES ('10', 'JL-10', 'nota-10', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '760000', '0', '');
INSERT INTO `jual` VALUES ('11', 'JL-11', 'nota-11', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '2184000', '0', '');
INSERT INTO `jual` VALUES ('12', 'JL-12', 'nota-12', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '936000', '0', '');
INSERT INTO `jual` VALUES ('13', 'JL-13', 'nota-13', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '4680000', '0', '');
INSERT INTO `jual` VALUES ('14', 'JL-14', 'nota-14', '07/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '9360000', '0', '');
INSERT INTO `jual` VALUES ('15', 'JL-15', 'nota-15', '10/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '936000', '0', '');
INSERT INTO `jual` VALUES ('16', 'JL-16', 'nota-16', '10/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '14040000', '14000000', '11/02/2014');
INSERT INTO `jual` VALUES ('17', 'JL-17', 'nota-17', '10/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '4680000', '4680000', '10/11/2014');
INSERT INTO `jual` VALUES ('18', 'JL-18', 'nota-18', '12/11/2014', '21232f297a57a5a743894a0e4a801fc3', 'umum', '3800000', '3000000', '11/11/2014');
INSERT INTO `jual_detail` VALUES ('JL-1', '2', 'dark compound grande (12x1Kg)', 'compu', '1', 'box', '468000', '468000');
INSERT INTO `jual_detail` VALUES ('JL-1', '2', 'dark compound grande (12x1Kg)', 'compu', '1', 'box', '468000', '468000');
INSERT INTO `jual_detail` VALUES ('JL-2', '2', 'dark compound grande (12x1Kg)', 'compu', '2', 'box', '468000', '936000');
INSERT INTO `jual_detail` VALUES ('JL-2', '2', 'dark compound grande (12x1Kg)', 'compu', '1', 'box', '468000', '468000');
INSERT INTO `jual_detail` VALUES ('JL-2', '4', 'milk compound (12x1Kg)', 'compu', '1', 'box', '480000', '480000');
INSERT INTO `jual_detail` VALUES ('JL-5', '2', 'dark compound grande (12x1Kg)', 'compu', '1', '12x1kg', '0', '468000');
INSERT INTO `jual_detail` VALUES ('JL-5', '2', 'dark compound grande (12x1Kg)', 'compu', '1', '12x1kg', '0', '468000');
INSERT INTO `jual_detail` VALUES ('JL-6', '2', 'dark compound grande (12x1Kg)', 'compu', '5', '12x1kg', '0', '2340000');
INSERT INTO `jual_detail` VALUES ('JL-7', '2', 'dark compound grande (12x1Kg)', 'compu', '2', 'compu', '0', '936000');
INSERT INTO `jual_detail` VALUES ('JL-8', '2', 'dark compound grande (12x1Kg)', 'compu', '3', '12x1kg', '0', '1404000');
INSERT INTO `jual_detail` VALUES ('JL-10', '1', 'dark compound grande (4x5Kg)', 'compu', '1', '4x5kg', '0', '760000');
INSERT INTO `jual_detail` VALUES ('JL-11', '2', 'dark compound grande (12x1Kg)', 'compu', '2', '12x1kg', '0', '936000');
INSERT INTO `jual_detail` VALUES ('JL-11', '2', 'dark compound grande (12x1Kg)', 'compu', '1', '12x1kg', '0', '468000');
INSERT INTO `jual_detail` VALUES ('JL-11', '3', 'milk compound (4x5Kg)', 'compu', '1', '4x5kg', '0', '780000');
INSERT INTO `jual_detail` VALUES ('JL-12', '2', 'dark compound grande (12x1Kg)', 'compu', '2', '12x1kg', '468000', '936000');
INSERT INTO `jual_detail` VALUES ('JL-13', '2', 'dark compound grande (12x1Kg)', 'compu', '10', '12x1kg', '468000', '4680000');
INSERT INTO `jual_detail` VALUES ('JL-14', '2', 'dark compound grande (12x1Kg)', 'compu', '20', '12x1kg', '468000', '9360000');
INSERT INTO `jual_detail` VALUES ('JL-15', '2', 'dark compound grande (12x1Kg)', 'compu', '2', '12x1kg', '468000', '936000');
INSERT INTO `jual_detail` VALUES ('JL-16', '2', 'dark compound grande (12x1Kg)', 'compu', '10', '12x1kg', '468000', '4680000');
INSERT INTO `jual_detail` VALUES ('JL-16', '2', 'dark compound grande (12x1Kg)', 'compu', '10', '12x1kg', '468000', '4680000');
INSERT INTO `jual_detail` VALUES ('JL-16', '2', 'dark compound grande (12x1Kg)', 'compu', '10', '12x1kg', '468000', '4680000');
INSERT INTO `jual_detail` VALUES ('JL-17', '2', 'dark compound grande (12x1Kg)', 'compu', '10', '12x1kg', '468000', '4680000');
INSERT INTO `jual_detail` VALUES ('JL-18', '1', 'dark compound grande (4x5Kg)', 'compu', '5', '4x5kg', '760000', '3800000');
INSERT INTO `menus` VALUES ('1', '1', 'Home', 'index.php', '1', 'fa fa-home fa-fw');
INSERT INTO `menus` VALUES ('2', '1', 'Barang', 'index.php?halaman=data_barang', '2', 'fa fa-briefcase fa-fw');
INSERT INTO `menus` VALUES ('3', '1', 'Supplier', 'index.php?halaman=data_supplier', '3', 'fa fa-user fa-fw');
INSERT INTO `menus` VALUES ('4', '1', 'Pelanggan', 'index.php?halaman=data_pelanggan', '4', 'fa fa-users fa-fw');
INSERT INTO `menus` VALUES ('5', '1', 'Barang Masuk', 'index.php?halaman=barang_masuk', '5', 'fa fa-arrow-left fa-fw');
INSERT INTO `menus` VALUES ('6', '1', 'Barang Keluar', 'index.php?halaman=penjualan', '6', 'fa fa-arrow-right fa-fw');
INSERT INTO `menus` VALUES ('7', '1', 'Stok', 'index.php?halaman=stok', '7', 'fa fa-archive fa-fw');
INSERT INTO `menus` VALUES ('8', '1', 'Akun', 'index.php?halaman=data_akun', '8', 'fa fa-user fa-fw');
INSERT INTO `menus` VALUES ('9', '1', 'Data Menu', 'index.php?halaman=data_menu', '9', 'fa fa-align-justify fa-fw');
INSERT INTO `menus` VALUES ('2', '2', 'Input Data Barang', 'index.php?halaman=form_data_master&kode=barang_insert', '14', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('2', '3', 'Ubah Data Barang', 'index.php?halaman=data_barang&act=ubah', '15', 'fa fa-edit fa-fw');
INSERT INTO `menus` VALUES ('2', '4', 'Hapus Data Barang', 'index.php?halaman=data_barang&act=hapus', '16', 'fa fa-minus fa-fw');
INSERT INTO `menus` VALUES ('3', '2', 'Input Data Supplier', 'index.php?halaman=form_data_master&kode=supplier_insert', '17', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('3', '3', 'Ubah Data Supplier', 'index.php?halaman=data_supplier&act=ubah', '18', 'fa fa-edit fa-fw');
INSERT INTO `menus` VALUES ('3', '4', 'Hapus Data Supplier', 'index.php?halaman=data_supplier&act=hapus', '19', 'fa fa-minus fa-fw');
INSERT INTO `menus` VALUES ('4', '2', 'Input Data Pelanggan', 'index.php?halaman=form_data_master&kode=pelanggan_insert', '20', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('4', '3', 'Ubah Data Pelanggan', 'index.php?halaman=data_pelanggan&act=ubah', '21', 'fa fa-edit fa-fw');
INSERT INTO `menus` VALUES ('4', '4', 'Hapus Data Pelanggan', 'index.php?halaman=data_pelanggan&act=hapus', '22', 'fa fa-minus fa-fw');
INSERT INTO `menus` VALUES ('5', '2', 'Input Barang Masuk', 'index.php?halaman=form_beli', '23', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('6', '2', 'Input Barang Keluar', 'index.php?halaman=form_jual', '24', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('7', '2', 'Ubah Stok', 'index.php?halaman=stok&act=ubah', '25', 'fa fa-edit fa-fw');
INSERT INTO `menus` VALUES ('7', '3', 'Hapus Stok', 'index.php?halaman=stok&act=hapus', '26', 'fa fa-minus fa-fw');
INSERT INTO `pelanggan` VALUES ('1', 'PLG-1', 'Hilal', 'Cililin', 'Bandung', 'hilal@hilal.com', '081123456');
INSERT INTO `pelanggan` VALUES ('2', 'PLG-2', 'Hendi', 'Cilampeni', 'Bandung', 'hendi@hendi.com', '081234567');
INSERT INTO `stok` VALUES ('2', 'dark compound grande (12x1Kg)', 'compu', '270', '12x1kg', '468000');
INSERT INTO `stok` VALUES ('1', 'dark compound grande (4x5Kg)', 'compu', '15', '4x5kg', '760000');
INSERT INTO `stok` VALUES ('4', 'milk compound (12x1Kg)', 'compu', '100', '12x1kg', '480000');
INSERT INTO `stok` VALUES ('3', 'milk compound (4x5Kg)', 'compu', '100', '4x5kg', '780000');
INSERT INTO `supplier` VALUES ('1', 'SPL-1', 'Agus Setiawan', 'Jl. Somawinata Kebon Kalapa 39', 'Bandung', 'aswansetiawan01@gmail.com', '085722864906');
INSERT INTO `supplier` VALUES ('2', 'SPL-2', 'Dani Kurniawan', 'Jl. Somawinata Kebon Kalapa 39', 'Bandung', 'aswansetiawan01@gmail.com', '085722864906');
