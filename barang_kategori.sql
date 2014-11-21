/*
MySQL Data Transfer
Source Host: localhost
Source Database: inventori_uas
Target Host: localhost
Target Database: inventori_uas
Date: 21-Nov-14 10:41:17 AM
*/

SET FOREIGN_KEY_CHECKS=0;
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
-- Records 
-- ----------------------------
INSERT INTO `barang_kategori` VALUES ('1', 'COMP', 'Compound');
INSERT INTO `barang_kategori` VALUES ('2', 'COUV', 'Couverture');
INSERT INTO `barang_kategori` VALUES ('3', 'CCP', 'Cocoa Powder');
INSERT INTO `barang_kategori` VALUES ('4', 'FILL', 'Filling');
INSERT INTO `barang_kategori` VALUES ('5', 'SCD', 'Schoko Drink');
INSERT INTO `barang_kategori` VALUES ('6', 'KKG', 'Koko Gold');
