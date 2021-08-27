-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dbitproject
CREATE DATABASE IF NOT EXISTS `dbitproject` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbitproject`;

-- Dumping structure for table dbitproject.it_modul
CREATE TABLE IF NOT EXISTS `it_modul` (
  `idmodul` int(11) NOT NULL AUTO_INCREMENT,
  `kodemodul` varchar(10) DEFAULT NULL,
  `namamodul` varchar(250) DEFAULT NULL,
  `tipemodul` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `deskripsi` text,
  `idsubproduk` int(11) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(100) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idmodul`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbitproject.it_modul: ~3 rows (approximately)
/*!40000 ALTER TABLE `it_modul` DISABLE KEYS */;
INSERT INTO `it_modul` (`idmodul`, `kodemodul`, `namamodul`, `tipemodul`, `status`, `deskripsi`, `idsubproduk`, `idproduk`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
	(1, NULL, 'a', 1, 0, 'oooo', 1, 2, NULL, '2021-02-09 12:05:15', NULL, '2021-02-09 12:10:38'),
	(2, NULL, 'b', 1, 0, 'ppp', 2, 1, NULL, '2021-02-20 03:57:33', NULL, NULL),
	(3, NULL, 'c', 2, 0, 'cc', 2, 1, NULL, '2021-02-20 03:57:49', NULL, NULL);
/*!40000 ALTER TABLE `it_modul` ENABLE KEYS */;

-- Dumping structure for table dbitproject.it_produk
CREATE TABLE IF NOT EXISTS `it_produk` (
  `idproduk` int(11) NOT NULL AUTO_INCREMENT,
  `namaproduk` varchar(250) DEFAULT NULL,
  `deskripsi` text,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(100) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idproduk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbitproject.it_produk: ~2 rows (approximately)
/*!40000 ALTER TABLE `it_produk` DISABLE KEYS */;
INSERT INTO `it_produk` (`idproduk`, `namaproduk`, `deskripsi`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
	(1, 'Portal Dealer', 'ppp', NULL, '2021-02-09 11:55:32', NULL, '2021-02-20 03:16:51'),
	(2, 'Backend Portal Dealer', '', NULL, '2021-02-21 04:42:06', NULL, NULL);
/*!40000 ALTER TABLE `it_produk` ENABLE KEYS */;

-- Dumping structure for table dbitproject.it_proyek
CREATE TABLE IF NOT EXISTS `it_proyek` (
  `idproyek` int(11) NOT NULL AUTO_INCREMENT,
  `namaproyek` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `idtipeproyek` int(11) DEFAULT NULL,
  `tahun` char(4) DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(255) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idproyek`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbitproject.it_proyek: ~4 rows (approximately)
/*!40000 ALTER TABLE `it_proyek` DISABLE KEYS */;
INSERT INTO `it_proyek` (`idproyek`, `namaproyek`, `deskripsi`, `idtipeproyek`, `tahun`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
	(1, 'Master plan IT 2021', 'ini master plan it 2021 ya', 2, '2021', NULL, NULL, 'admin', '2021-02-20 04:49:56'),
	(2, 'daifuku', 'ini proyek untuk robot gundang', 2, NULL, NULL, NULL, NULL, NULL),
	(5, 'proyek 1', 'proyek 1', 1, '2021', 'admin', '2021-02-20 04:35:40', NULL, NULL);
/*!40000 ALTER TABLE `it_proyek` ENABLE KEYS */;

-- Dumping structure for table dbitproject.it_proyekdetail
CREATE TABLE IF NOT EXISTS `it_proyekdetail` (
  `idproyekdetail` int(11) NOT NULL AUTO_INCREMENT,
  `idproyek` int(11) DEFAULT NULL,
  `idmodul` int(11) DEFAULT NULL,
  `sprint` int(11) DEFAULT NULL,
  `pic_ba` varchar(255) DEFAULT NULL,
  `pic_dev` varchar(255) DEFAULT NULL,
  `pic_qc` varchar(255) DEFAULT NULL,
  `pic_user` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(255) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idproyekdetail`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbitproject.it_proyekdetail: ~5 rows (approximately)
/*!40000 ALTER TABLE `it_proyekdetail` DISABLE KEYS */;
INSERT INTO `it_proyekdetail` (`idproyekdetail`, `idproyek`, `idmodul`, `sprint`, `pic_ba`, `pic_dev`, `pic_qc`, `pic_user`, `deskripsi`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
	(1, 2, 1, NULL, NULL, NULL, NULL, NULL, 'penambahan fasilitas export', NULL, NULL, NULL, NULL),
	(2, 5, 1, 1, '2', '3', '4', '5', NULL, 'admin', '2021-02-20 04:35:40', NULL, NULL),
	(3, 5, 3, 1, '2', '3', '4', '5', NULL, 'admin', '2021-02-20 04:35:40', NULL, NULL),
	(4, 5, 2, 1, '2', '3', '4', '5', NULL, 'admin', '2021-02-20 04:35:40', NULL, NULL),
	(5, 1, 1, 1, '2', '3', '4', '5', 'cekbos', 'admin', '2021-02-20 04:49:56', NULL, NULL);
/*!40000 ALTER TABLE `it_proyekdetail` ENABLE KEYS */;

-- Dumping structure for table dbitproject.it_proyekhistory
CREATE TABLE IF NOT EXISTS `it_proyekhistory` (
  `idproyekhistory` int(11) NOT NULL AUTO_INCREMENT,
  `idproyekdetail` int(11) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `aksi` varchar(255) DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(255) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idproyekhistory`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbitproject.it_proyekhistory: ~27 rows (approximately)
/*!40000 ALTER TABLE `it_proyekhistory` DISABLE KEYS */;
INSERT INTO `it_proyekhistory` (`idproyekhistory`, `idproyekdetail`, `pic`, `role`, `aksi`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
	(1, 1, 'gigih', 'ba', 'docprogres', 'gigih', '2021-02-17 04:13:00', NULL, NULL),
	(2, 1, 'gigih', 'ba', 'docdone', 'gigih', '2021-02-17 04:15:57', NULL, NULL),
	(3, 1, 'paga', 'dev', 'devprogres', 'paga', '2021-02-17 04:18:33', NULL, NULL),
	(4, 1, 'paga', 'dev', 'devdone', 'paga', '2021-02-17 04:23:33', NULL, NULL),
	(5, 1, 'saputra', 'qc', 'qcprogres', 'saputra', '2021-02-17 04:27:33', NULL, NULL),
	(6, 1, 'saputra', 'qc', 'qcfailed', 'saputra', '2021-02-17 04:29:33', NULL, NULL),
	(7, 1, 'saputra', 'qc', 'qcaccept', 'saputra', '2021-02-17 04:42:33', NULL, NULL),
	(8, 2, 'gigih', 'ba', 'docprogres', 'gigih', '2021-02-20 06:37:34', NULL, NULL),
	(9, 2, 'gigih', 'ba', 'docdone', 'gigih', '2021-02-20 06:47:45', NULL, NULL),
	(10, 2, 'paga', 'dev', 'devprogres', 'paga', '2021-02-20 06:49:44', NULL, NULL),
	(11, 2, 'paga', 'dev', 'devdone', 'paga', '2021-02-20 06:51:13', NULL, NULL),
	(12, 2, 'saputra', 'qc', 'qcprogres', 'saputra', '2021-02-20 06:51:30', NULL, NULL),
	(13, 2, 'saputra', 'qc', 'qcfailed', 'saputra', '2021-02-20 06:52:44', NULL, NULL),
	(14, 2, 'gigih', 'ba', 'docprogres', 'gigih', '2021-02-20 06:53:06', NULL, NULL),
	(15, 2, 'gigih', 'ba', 'docdone', 'gigih', '2021-02-20 06:53:08', NULL, NULL),
	(16, 2, 'paga', 'dev', 'devprogres', 'paga', '2021-02-20 06:53:16', NULL, NULL),
	(17, 2, 'paga', 'dev', 'devdone', 'paga', '2021-02-20 06:53:27', NULL, NULL),
	(18, 2, 'saputra', 'qc', 'qcprogres', 'saputra', '2021-02-20 06:53:33', NULL, NULL),
	(19, 2, 'saputra', 'qc', 'qcaccept', 'saputra', '2021-02-20 06:53:38', NULL, NULL),
	(20, 2, 'ido', 'user', 'useraccept', 'ido', '2021-02-20 06:53:46', NULL, NULL),
	(21, 3, 'gigih', 'ba', 'docprogres', 'gigih', '2021-02-22 09:28:33', NULL, NULL),
	(22, 3, 'gigih', 'ba', 'docdone', 'gigih', '2021-02-22 09:33:49', NULL, NULL),
	(23, 3, 'paga', 'dev', 'devprogres', 'paga', '2021-02-22 09:34:06', NULL, NULL),
	(24, 3, 'paga', 'dev', 'devdone', 'paga', '2021-02-22 09:34:09', NULL, NULL),
	(25, 3, 'saputra', 'qc', 'qcprogres', 'saputra', '2021-02-22 09:34:24', NULL, NULL),
	(26, 3, 'saputra', 'qc', 'qcaccept', 'saputra', '2021-02-22 09:34:27', NULL, NULL),
	(27, 4, 'gigih', 'ba', 'docprogres', 'gigih', '2021-02-22 09:57:39', NULL, NULL);
/*!40000 ALTER TABLE `it_proyekhistory` ENABLE KEYS */;

-- Dumping structure for table dbitproject.it_subproduk
CREATE TABLE IF NOT EXISTS `it_subproduk` (
  `idsubproduk` int(11) NOT NULL AUTO_INCREMENT,
  `namasubproduk` varchar(250) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `deskripsi` text,
  `createby` varchar(50) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(50) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idsubproduk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbitproject.it_subproduk: ~5 rows (approximately)
/*!40000 ALTER TABLE `it_subproduk` DISABLE KEYS */;
INSERT INTO `it_subproduk` (`idsubproduk`, `namasubproduk`, `idproduk`, `deskripsi`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
	(1, 'Activity Event', 1, '', NULL, '2021-02-09 11:58:04', NULL, NULL),
	(2, 'Dealer Information System', 1, '', NULL, '2021-02-09 11:59:21', NULL, NULL),
	(3, 'Dealer Online Market', 1, '', NULL, '2021-02-09 11:59:31', NULL, NULL),
	(4, 'Repeat Order', 2, '', NULL, '2021-02-09 11:59:42', NULL, NULL),
	(5, 'STNK BPKB', 2, '', NULL, '2021-02-09 11:59:51', NULL, NULL);
/*!40000 ALTER TABLE `it_subproduk` ENABLE KEYS */;

-- Dumping structure for table dbitproject.it_tipemodul
CREATE TABLE IF NOT EXISTS `it_tipemodul` (
  `idtipemodul` int(11) NOT NULL AUTO_INCREMENT,
  `namatipemodul` varchar(255) NOT NULL,
  `kodetipemodul` varchar(10) NOT NULL,
  PRIMARY KEY (`idtipemodul`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbitproject.it_tipemodul: ~6 rows (approximately)
/*!40000 ALTER TABLE `it_tipemodul` DISABLE KEYS */;
INSERT INTO `it_tipemodul` (`idtipemodul`, `namatipemodul`, `kodetipemodul`) VALUES
	(1, 'Master (Single Table)', 'M1'),
	(2, 'Master (Multi Table)', 'M2'),
	(3, 'Transaction (Single Process)', 'T1'),
	(4, 'Transaction (Multi Process)', 'T2'),
	(5, 'Report Single Data', 'R1'),
	(6, 'Report Multi Data (Complex)', 'R2');
/*!40000 ALTER TABLE `it_tipemodul` ENABLE KEYS */;

-- Dumping structure for table dbitproject.it_tipeproyek
CREATE TABLE IF NOT EXISTS `it_tipeproyek` (
  `idtipeproyek` int(11) NOT NULL AUTO_INCREMENT,
  `namatipeproyek` varchar(255) NOT NULL,
  PRIMARY KEY (`idtipeproyek`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbitproject.it_tipeproyek: ~4 rows (approximately)
/*!40000 ALTER TABLE `it_tipeproyek` DISABLE KEYS */;
INSERT INTO `it_tipeproyek` (`idtipeproyek`, `namatipeproyek`) VALUES
	(1, 'Strategic Project'),
	(2, 'Master Plan Internal'),
	(3, 'Master Plan Vendor'),
	(4, 'Additional');
/*!40000 ALTER TABLE `it_tipeproyek` ENABLE KEYS */;

-- Dumping structure for table dbitproject.it_users
CREATE TABLE IF NOT EXISTS `it_users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `namauser` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(255) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table dbitproject.it_users: ~4 rows (approximately)
/*!40000 ALTER TABLE `it_users` DISABLE KEYS */;
INSERT INTO `it_users` (`iduser`, `username`, `password`, `namauser`, `jabatan`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
	(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Ini Admin', 'administrator', NULL, NULL, NULL, NULL),
	(2, 'gigih', 'e10adc3949ba59abbe56e057f20f883e', 'Gigih', 'ba', NULL, NULL, NULL, NULL),
	(3, 'paga', 'e10adc3949ba59abbe56e057f20f883e', 'Paga', 'dev', NULL, NULL, NULL, NULL),
	(4, 'saputra', 'e10adc3949ba59abbe56e057f20f883e', 'Saputra', 'qc', NULL, NULL, NULL, NULL),
	(5, 'ido', 'e10adc3949ba59abbe56e057f20f883e', 'Ido Enggar', 'user', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `it_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
