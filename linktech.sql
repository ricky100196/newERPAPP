/*
 Navicat Premium Data Transfer

 Source Server         : DB LOCAL WINA
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : linktech

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 19/11/2022 22:21:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_customer
-- ----------------------------
DROP TABLE IF EXISTS `data_customer`;
CREATE TABLE `data_customer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `group` enum('local','import') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'local',
  `telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `delivery_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `invoice_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pic_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pic_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sales_tax` enum('ppn','non ppn','ppn berikat') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `currency` enum('idr','dollar') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `npwp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `delivery_type` enum('truk','pickup','mobil box') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `delivery_term` enum('darat','udara','laut') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `payment_term` enum('cod','30 hari','45 hari','60 hari') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `payment_method` enum('cash','giro','transfer') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_customer
-- ----------------------------
INSERT INTO `data_customer` VALUES (1, 'Septi', 'local', '0818633428', 'winaindah83@gmail.com', NULL, NULL, 'Indonesia', 'wina', '023213', 'ppn berikat', 'idr', '83000', 'truk', 'udara', '30 hari', 'cash', '2022-07-20 22:50:03', 1, NULL, NULL, '2022-08-06 21:53:22', 1);
INSERT INTO `data_customer` VALUES (2, 'Septi', 'local', '0818633428', 'winaindah83@gmail.com', NULL, NULL, 'Indonesia', 'wina', '023213', 'ppn berikat', 'idr', '83000', 'truk', 'udara', '30 hari', 'cash', '2022-07-20 22:50:10', 1, NULL, NULL, '2022-07-20 23:08:19', 1);
INSERT INTO `data_customer` VALUES (3, 'Septi', 'local', '0818633428', 'winaindah83@gmail.com', 'Jl. Prof. Sudarto No.13, Tembalang, Kec. Tembalang, Kota Semarang, Jawa Tengah 50275', 'Jalan Ir. Sutami 36 Kentingan, Jebres, Surakarta, Jawa Tengah', 'Indonesia', 'wina', '023213', 'ppn berikat', 'idr', '83000', 'truk', 'udara', '30 hari', 'cash', '2022-07-20 22:50:47', 1, '2022-08-24 22:43:30', 1, NULL, NULL);
INSERT INTO `data_customer` VALUES (4, 'Ricky', 'import', '0818633428', 'admin@monitoring.com', 'disana', 'disitu', 'Indonesia', 'Septi', '02134', 'non ppn', 'idr', '837432', 'pickup', 'udara', '30 hari', 'cash', '2022-07-20 22:59:45', 1, NULL, NULL, NULL, NULL);
INSERT INTO `data_customer` VALUES (5, 'Ricky', 'import', '0818633428', 'admin@monitoring.com', 'disana', 'disitu', 'Indonesia', 'Septi', '02134', 'non ppn', 'idr', '837432', 'pickup', 'udara', '30 hari', 'cash', '2022-07-20 22:59:45', 1, NULL, NULL, NULL, NULL);
INSERT INTO `data_customer` VALUES (6, 'Ricky', 'import', '0818633428', 'admin@monitoring.com', 'disana', 'disitu', 'Indonesia', 'Septi', '02134', 'non ppn', 'idr', '837432', 'pickup', 'udara', '30 hari', 'cash', '2022-07-20 23:00:21', 1, NULL, NULL, '2022-07-20 23:08:27', 1);
INSERT INTO `data_customer` VALUES (7, 'Ricky', 'import', '0818633428', 'admin@monitoring.com', 'disana', 'disitu', 'Indonesia', 'Septi', '02134', 'non ppn', 'idr', '837432', 'pickup', 'udara', '30 hari', 'cash', '2022-07-20 23:00:26', 1, NULL, NULL, '2022-07-21 15:06:43', 1);

-- ----------------------------
-- Table structure for data_frp
-- ----------------------------
DROP TABLE IF EXISTS `data_frp`;
CREATE TABLE `data_frp`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_customer` int(11) NULL DEFAULT NULL,
  `po_date` date NULL DEFAULT NULL,
  `delivery_date` date NULL DEFAULT NULL,
  `id_product` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `id_material` int(11) NULL DEFAULT NULL,
  `id_supplier` int(11) NULL DEFAULT NULL,
  `qty_po` int(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_frp
-- ----------------------------
INSERT INTO `data_frp` VALUES (8, '111', 3, '2022-08-02', NULL, 2, '2022-08-06 23:09:27', 1, NULL, NULL, NULL, NULL, 1, 1, 111);
INSERT INTO `data_frp` VALUES (9, '1', 3, '2022-08-30', NULL, 2, '2022-08-06 23:13:44', 1, NULL, NULL, NULL, NULL, 1, NULL, 111);
INSERT INTO `data_frp` VALUES (10, '11', 4, '2011-11-11', '2022-08-30', 2, '2022-08-06 23:24:39', 1, NULL, NULL, NULL, NULL, 1, NULL, 1);

-- ----------------------------
-- Table structure for data_material
-- ----------------------------
DROP TABLE IF EXISTS `data_material`;
CREATE TABLE `data_material`  (
  `id_material` int(10) NOT NULL AUTO_INCREMENT,
  `bulan` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` char(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_supplier` int(11) NULL DEFAULT NULL,
  `jenis_material` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `roll` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kg` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga_material` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_material`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_material
-- ----------------------------
INSERT INTO `data_material` VALUES (1, '08', '2022', 3, 'PET XXXX', '3', '3', '100', '300', NULL, 1, '2022-09-25 20:46:04', 1, NULL, NULL);
INSERT INTO `data_material` VALUES (2, '08', '2022', 3, 'Lakban', '10', '2', '200', '300', '2022-08-03 23:14:23', 1, '2022-08-24 23:59:00', 1, NULL, NULL);

-- ----------------------------
-- Table structure for data_packaging
-- ----------------------------
DROP TABLE IF EXISTS `data_packaging`;
CREATE TABLE `data_packaging`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` enum('box','plastik','lainnya') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `harga` bigint(20) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_packaging
-- ----------------------------
INSERT INTO `data_packaging` VALUES (3, '08', '2022', 'box', 'BOX BX 3X', 620, 8909, '2022-08-25 00:28:04', NULL, NULL);

-- ----------------------------
-- Table structure for data_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `data_pegawai`;
CREATE TABLE `data_pegawai`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kelamin` enum('P','L') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nohp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bagian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_masuk` date NULL DEFAULT NULL,
  `tanggal_keluar` date NULL DEFAULT NULL,
  `no_rekening` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `npwp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kontak_darurat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hubungan_kontak` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pendidikan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_karyawan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` int(255) NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_pegawai
-- ----------------------------
INSERT INTO `data_pegawai` VALUES (1, 'Septi', '123', 'P', 'Bekasi', '1995-09-14', 'tambun', '08123', 'gatau', '123', '2021-04-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-09-11 21:47:04', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for data_penggunaan_material
-- ----------------------------
DROP TABLE IF EXISTS `data_penggunaan_material`;
CREATE TABLE `data_penggunaan_material`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `id_material` int(11) NULL DEFAULT NULL,
  `roll_awal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kg_awal` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_supplier` int(11) NULL DEFAULT NULL,
  `shift` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `roll_vacum` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kg_vacum` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `roll_akhir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kg_akhir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `update_by` int(11) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `update_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `vacum` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_penggunaan_material
-- ----------------------------
INSERT INTO `data_penggunaan_material` VALUES (1, NULL, 1, '1', '1', 1, '1', '1', '1', '1', '1', 1, NULL, NULL, '2022-08-06 14:43:30', NULL, NULL, '1');
INSERT INTO `data_penggunaan_material` VALUES (2, '2022-08-06', 1, '1', '1', 1, '1', '1', '1', '1', '1', 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `data_penggunaan_material` VALUES (3, '2022-08-06', 1, NULL, NULL, 1, 'SHIFT 1', '1', '1', NULL, NULL, 1, NULL, NULL, '2022-08-06 21:48:16', NULL, NULL, 'VACUM 1');

-- ----------------------------
-- Table structure for data_product
-- ----------------------------
DROP TABLE IF EXISTS `data_product`;
CREATE TABLE `data_product`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dimensi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_bahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tebal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lebar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cavity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `panjang_meja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `masa_jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tarikan_rol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `berat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `approve_status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `approve_catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `approve_by` int(11) NULL DEFAULT NULL,
  `approve_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_product
-- ----------------------------
INSERT INTO `data_product` VALUES (1, '3', 'cokolatos', '9', '8', '7', '6', '5', '4', '4', '3', '8', NULL, '0', NULL, NULL, NULL, '2022-07-20 23:48:29', 1, NULL, NULL, '2022-08-03 21:57:45', 1);
INSERT INTO `data_product` VALUES (2, '4', 'cokolatos lagi', '1', '2', '3', '5', '7', '4', '2', '12', '3', NULL, '0', NULL, NULL, NULL, '2022-07-21 00:02:59', 1, NULL, NULL, NULL, NULL);
INSERT INTO `data_product` VALUES (3, '3', 'nama product', '1', '2', '20', '10', '', '101', '', '', '', NULL, '0', NULL, NULL, NULL, '2022-08-03 21:04:08', 1, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for data_supplier
-- ----------------------------
DROP TABLE IF EXISTS `data_supplier`;
CREATE TABLE `data_supplier`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `group` enum('local','import') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'local',
  `telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `delivery_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `invoice_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pic_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sales_tax` enum('ppn','non ppn') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `currency` enum('IDR','Dollar') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `npwp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `delivery_type` enum('truk','pick up') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `delivery_term` enum('darat','udara','laut') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `payment_term` enum('cod','30 hari','45 hari','60 hari') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `payment_method` enum('cash','giro','transfer') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_supplier
-- ----------------------------
INSERT INTO `data_supplier` VALUES (2, 'JOKO', 'local', '039232', 'sannie@gmail.com', 'alamat', 'tagihan', 'Indonesia', 'aku', '0293273', 'ppn', 'IDR', '034239492374', 'truk', 'darat', '30 hari', 'cash', '2022-07-25 21:07:23', 1, NULL, NULL, NULL, NULL);
INSERT INTO `data_supplier` VALUES (3, 'Supplier 1', 'local', '085647366908', 'email@mail.com', 'akuuu', NULL, 'Indonesia', 'Ricky', '086573843', 'ppn', 'IDR', '093945845', 'truk', 'udara', 'cod', 'giro', '2022-08-24 09:00:31', 1, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for data_supplier_po
-- ----------------------------
DROP TABLE IF EXISTS `data_supplier_po`;
CREATE TABLE `data_supplier_po`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `po_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `po_date` date NULL DEFAULT NULL,
  `delivery_date` date NULL DEFAULT NULL,
  `ppn` int(2) NULL DEFAULT NULL,
  `known_by` int(11) NULL DEFAULT NULL,
  `approved_by` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_supplier_po
-- ----------------------------
INSERT INTO `data_supplier_po` VALUES (4, '3', '001/PO-APP/09/2022', '2022-09-08', '2022-09-15', NULL, 1, 1, '2022-09-11 22:01:06', 1, NULL, NULL, NULL, NULL);
INSERT INTO `data_supplier_po` VALUES (6, '2', '002/PO-APP/09/2022', '2022-09-01', '2022-09-10', NULL, 1, 1, '2022-09-11 22:01:49', 1, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for detail_supplier_po
-- ----------------------------
DROP TABLE IF EXISTS `detail_supplier_po`;
CREATE TABLE `detail_supplier_po`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_po` int(11) NULL DEFAULT NULL,
  `id_material` int(11) NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `harga` bigint(20) NULL DEFAULT NULL,
  `no_sj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `kedatangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `no_invoice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_supplier_po
-- ----------------------------
INSERT INTO `detail_supplier_po` VALUES (1, 4, 1, 500, 100, 'DO/GPA/2202054,DO/GPA/2203019,DO/GPA/2203022,DO/GPA/2203028', '3005,1405,1362,1240', 'INV/GPA/2202054,INV/GPA/2203019,INV/GPA/2203022,INV/GPA/2203028', '2022-09-25 22:09:41', 1, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `group_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `permission` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'admin', 'Super Administrator', 'a:15:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createStore\";i:9;s:11:\"updateStore\";i:10;s:9:\"viewStore\";i:11;s:11:\"deleteStore\";i:12;s:13:\"updateCompany\";i:13;s:13:\"updateSetting\";i:14;s:11:\"viewProfile\";}');
INSERT INTO `groups` VALUES (2, 'purchasing', 'Purchasing Order', 'a:11:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"updateStore\";i:8;s:9:\"viewStore\";i:9;s:13:\"updateSetting\";i:10;s:11:\"viewProfile\";}');
INSERT INTO `groups` VALUES (3, 'marketing', 'Marketing', 'a:2:{i:0;s:13:\"updateSetting\";i:1;s:11:\"viewProfile\";}');
INSERT INTO `groups` VALUES (4, 'produksi', 'Produksi', NULL);
INSERT INTO `groups` VALUES (5, 'warehouse', 'Warehouse', NULL);
INSERT INTO `groups` VALUES (6, 'hrd', 'HRD', NULL);

-- ----------------------------
-- Table structure for module_childs
-- ----------------------------
DROP TABLE IF EXISTS `module_childs`;
CREATE TABLE `module_childs`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `link` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `icon` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of module_childs
-- ----------------------------
INSERT INTO `module_childs` VALUES (1, 'User accounts', 'accounts', 'fa fa-users', '011', 1);
INSERT INTO `module_childs` VALUES (2, 'General settings', 'main_settings', 'fa fa-cog', '011', 0);
INSERT INTO `module_childs` VALUES (3, 'POP / IMAP / SMTP', 'email_service', 'fa fa-envelope', '011', 3);
INSERT INTO `module_childs` VALUES (4, 'File manager', 'file_manager', 'fa fa-file-archive-o', '011', 4);

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `has_child` tinyint(1) NOT NULL,
  `nav_child_id` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `type` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `icon` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sort` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES (1, 'Messages', 0, '', 'messages', 'main', 'fa fa-envelope', 1);
INSERT INTO `modules` VALUES (2, 'Settings', 1, '011', NULL, 'Main', 'fa fa-cog', 2);
INSERT INTO `modules` VALUES (3, 'Dashboard', 0, '', 'dashboard', 'main', 'fa fa-dashboard', 0);
INSERT INTO `modules` VALUES (4, 'Gallery', 0, '', 'gallery_maintenance', 'main', 'fa fa-photo', 3);

-- ----------------------------
-- Table structure for outbox_messages
-- ----------------------------
DROP TABLE IF EXISTS `outbox_messages`;
CREATE TABLE `outbox_messages`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `view_id` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sender` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reply_to` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cc` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bcc` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `recipient` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `conversation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `deleted` tinyint(1) NULL DEFAULT 0,
  `spam` tinyint(1) NOT NULL,
  `important` tinyint(1) NOT NULL,
  `attachment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `attachment_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `receiver_delete` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pw_reset
-- ----------------------------
DROP TABLE IF EXISTS `pw_reset`;
CREATE TABLE `pw_reset`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `timestamp` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `token` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `user` tinyint(4) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ref_jenis_material
-- ----------------------------
DROP TABLE IF EXISTS `ref_jenis_material`;
CREATE TABLE `ref_jenis_material`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tebal` float(3, 2) NULL DEFAULT NULL,
  `panjang` int(5) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_jenis_material
-- ----------------------------
INSERT INTO `ref_jenis_material` VALUES (1, 'pet', 0.24, 600, '2022-08-24 23:28:37', NULL, NULL);
INSERT INTO `ref_jenis_material` VALUES (2, 'pet', 0.28, 10, '2022-08-24 23:36:34', NULL, NULL);

-- ----------------------------
-- Table structure for sessions_db
-- ----------------------------
DROP TABLE IF EXISTS `sessions_db`;
CREATE TABLE `sessions_db`  (
  `id` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions_db
-- ----------------------------
INSERT INTO `sessions_db` VALUES ('ae4d0dec8f651d63e2a86c41dedfd83959449835', '::1', 1468330986, 0x5F5F63695F6C6173745F726567656E65726174657C693A313436383332393839363B757365725F69647C693A313B);
INSERT INTO `sessions_db` VALUES ('a5b8ef65cced623ab2a8c6f7425d14f347674dc3', '::1', 1468332320, 0x5F5F63695F6C6173745F726567656E65726174657C693A313436383333313037333B757365725F69647C693A313B);
INSERT INTO `sessions_db` VALUES ('c0ebbac64bfaa9023cede65d4e9ea760026dd18f', '::1', 1468332421, 0x5F5F63695F6C6173745F726567656E65726174657C693A313436383333323432313B);
INSERT INTO `sessions_db` VALUES ('ro7a5frjbf0gekuks3nq112tgh', '127.0.0.1', 1657696148, 0x5F5F63695F6C6173745F726567656E65726174657C693A313635373639363134383B);
INSERT INTO `sessions_db` VALUES ('lufsvog2uv0sithbaldgbqa2oi', '127.0.0.1', 1657696178, 0x5F5F63695F6C6173745F726567656E65726174657C693A313635373639363137383B);

-- ----------------------------
-- Table structure for stores
-- ----------------------------
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stores
-- ----------------------------
INSERT INTO `stores` VALUES (1, 'D.D.Puram', 1);
INSERT INTO `stores` VALUES (6, 'Rajendra nagar', 1);

-- ----------------------------
-- Table structure for user_group
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES (1, 1, 1);
INSERT INTO `user_group` VALUES (11, 1, 2);
INSERT INTO `user_group` VALUES (12, 1, 3);
INSERT INTO `user_group` VALUES (13, 1, 4);
INSERT INTO `user_group` VALUES (14, 1, 5);
INSERT INTO `user_group` VALUES (15, 2, 1);
INSERT INTO `user_group` VALUES (16, 4, 1);
INSERT INTO `user_group` VALUES (17, 4, 2);
INSERT INTO `user_group` VALUES (18, 4, 3);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` enum('admin','operator','produksi','marketing','warehouse','hrd','accounting','direksi') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `deleted_by` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'john', 'admin', '$2y$10$4OjgXyQY0UGKESMujlH2n.gkXlo.eIhjkgMnGth5T0JYrvhWB9JgC', 'admin@bootsback.com', '80789998', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 'manager', 'manager', '$2y$10$BgbQBlbzDnekFsHldE3QVOUa9YOtcLcZPIjrSBE0cKcJ/H4IHuJiq', 'manager@bootsback.com', '', 'hrd', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 'user', 'user1', '$2y$10$LKL.cvxqR1sEgO2L3w1v9uvlC7l9TZWQ1qr48ZW1/7NKd0uNyWm1q', 'user1@bootsback.com', '', 'hrd', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 'Wina Indah Lestari', 'pengembang', '$2a$08$vypa2WHnMdc1DHpnpBHyn.f1qAhsAXetgZxhJsKp6jmT4zO39kKlW', 'winaindah.contact@gmail.com', '0818633428', NULL, NULL, '2022-10-01 10:38:49', 1, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
