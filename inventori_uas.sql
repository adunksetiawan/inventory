/*
MySQL Data Transfer
Source Host: localhost
Source Database: inventori_uas
Target Host: localhost
Target Database: inventori_uas
Date: 21-Nov-14 3:23:36 PM
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
  `barang_kategori` varchar(15) NOT NULL,
  `satuan` int(10) NOT NULL,
  `kg` int(10) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  PRIMARY KEY (`inc`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for barang_kategori
-- ----------------------------
DROP TABLE IF EXISTS `barang_kategori`;
CREATE TABLE `barang_kategori` (
  `id_kat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kat` char(10) DEFAULT NULL,
  `nm_kat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_kat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
  `kategori` varchar(20) NOT NULL,
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
  `kategori` varchar(20) NOT NULL,
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
  `kategori` varchar(20) NOT NULL,
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
  `kategori` varchar(20) NOT NULL,
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
INSERT INTO `barang` VALUES ('1', 'COMP-001', 'Dark Compound Grande', 'Compound', '4', '5', '760000');
INSERT INTO `barang` VALUES ('2', 'COMP-002', 'Dark Compound Grande', 'Compound', '12', '1', '468000');
INSERT INTO `barang` VALUES ('3', 'COMP-003', 'Milk Compound', 'Compound', '4', '5', '780000');
INSERT INTO `barang` VALUES ('4', 'COMP-004', 'Milk Compound', 'Compound', '12', '1', '480000');
INSERT INTO `barang` VALUES ('5', 'COMP-005', 'White Compound', 'Compound', '4', '5', '780000');
INSERT INTO `barang` VALUES ('6', 'COMP-006', 'White Compound', 'Compound', '12', '1', '480000');
INSERT INTO `barang` VALUES ('7', 'COMP-007', 'Dark Compound Stick', 'Compound', '4', '1', '245000');
INSERT INTO `barang` VALUES ('8', 'COMP-008', 'Dark Compound Chips', 'Compound', '5', '1', '225000');
INSERT INTO `barang_kategori` VALUES ('1', 'COMP', 'Compound');
INSERT INTO `barang_kategori` VALUES ('2', 'COUV', 'Couverture');
INSERT INTO `barang_kategori` VALUES ('3', 'CCP', 'Cocoa Powder');
INSERT INTO `barang_kategori` VALUES ('4', 'FILL', 'Filling');
INSERT INTO `barang_kategori` VALUES ('5', 'SCD', 'Schoko Drink');
INSERT INTO `barang_kategori` VALUES ('6', 'KKG', 'Koko Gold');
INSERT INTO `menus` VALUES ('1', '1', 'Home', 'index.php', '1', 'fa fa-home fa-fw');
INSERT INTO `menus` VALUES ('2', '1', 'Produk', 'index.php?halaman=data_barang', '2', 'fa fa-briefcase fa-fw');
INSERT INTO `menus` VALUES ('3', '1', 'Supplier', 'index.php?halaman=data_supplier', '3', 'fa fa-user fa-fw');
INSERT INTO `menus` VALUES ('4', '1', 'Distributor', 'index.php?halaman=data_pelanggan', '4', 'fa fa-users fa-fw');
INSERT INTO `menus` VALUES ('5', '1', 'Barang Stokist', 'index.php?halaman=barang_masuk', '5', 'fa fa-arrow-left fa-fw');
INSERT INTO `menus` VALUES ('6', '1', 'Stokist distributor', 'index.php?halaman=penjualan', '6', 'fa fa-arrow-right fa-fw');
INSERT INTO `menus` VALUES ('7', '1', 'Stok', 'index.php?halaman=stok', '7', 'fa fa-archive fa-fw');
INSERT INTO `menus` VALUES ('8', '1', 'Akun', 'index.php?halaman=data_akun', '8', 'fa fa-user fa-fw');
INSERT INTO `menus` VALUES ('9', '1', 'Data Menu', 'index.php?halaman=data_menu', '9', 'fa fa-align-justify fa-fw');
INSERT INTO `menus` VALUES ('2', '2', 'Input Data Produk', 'index.php?halaman=form_data_master&kode=barang_insert', '14', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('2', '3', 'Ubah Data Produk', 'index.php?halaman=data_barang&act=ubah', '15', 'fa fa-edit fa-fw');
INSERT INTO `menus` VALUES ('2', '4', 'Hapus Data Produk', 'index.php?halaman=data_barang&act=hapus', '16', 'fa fa-minus fa-fw');
INSERT INTO `menus` VALUES ('3', '2', 'Input Data Supplier', 'index.php?halaman=form_data_master&kode=supplier_insert', '17', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('3', '3', 'Ubah Data Supplier', 'index.php?halaman=data_supplier&act=ubah', '18', 'fa fa-edit fa-fw');
INSERT INTO `menus` VALUES ('3', '4', 'Hapus Data Supplier', 'index.php?halaman=data_supplier&act=hapus', '19', 'fa fa-minus fa-fw');
INSERT INTO `menus` VALUES ('4', '2', 'Input Data Distributor', 'index.php?halaman=form_data_master&kode=pelanggan_insert', '20', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('4', '3', 'Ubah Data Distributor', 'index.php?halaman=data_pelanggan&act=ubah', '21', 'fa fa-edit fa-fw');
INSERT INTO `menus` VALUES ('4', '4', 'Hapus Data Distributor', 'index.php?halaman=data_pelanggan&act=hapus', '22', 'fa fa-minus fa-fw');
INSERT INTO `menus` VALUES ('5', '2', 'Stokist Input', 'index.php?halaman=form_beli', '23', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('6', '2', 'Input Stockist Distributor', 'index.php?halaman=form_jual', '24', 'fa fa-plus fa-fw');
INSERT INTO `menus` VALUES ('7', '2', 'Ubah Stok', 'index.php?halaman=stok&act=ubah', '25', 'fa fa-edit fa-fw');
INSERT INTO `menus` VALUES ('7', '3', 'Hapus Stok', 'index.php?halaman=stok&act=hapus', '26', 'fa fa-minus fa-fw');
INSERT INTO `pelanggan` VALUES ('1', 'PLG-1', 'Hilal', 'Cililin', 'Bandung', 'hilal@hilal.com', '081123456');
INSERT INTO `pelanggan` VALUES ('2', 'PLG-2', 'Hendi', 'Cilampeni', 'Bandung', 'hendi@hendi.com', '081234567');
INSERT INTO `supplier` VALUES ('1', 'SPL-1', 'Agus Setiawan', 'Jl. Somawinata Kebon Kalapa 39', 'Bandung', 'aswansetiawan01@gmail.com', '085722864906');
INSERT INTO `supplier` VALUES ('2', 'SPL-2', 'Dani Kurniawan', 'Jl. Somawinata Kebon Kalapa 39', 'Bandung', 'aswansetiawan01@gmail.com', '085722864906');
