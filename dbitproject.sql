-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 10:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbitproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `it_modul`
--

CREATE TABLE `it_modul` (
  `idmodul` int(11) NOT NULL,
  `kodemodul` varchar(10) DEFAULT NULL,
  `namamodul` varchar(250) DEFAULT NULL,
  `tipemodul` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `idsubproduk` int(11) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(100) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_modul`
--

INSERT INTO `it_modul` (`idmodul`, `kodemodul`, `namamodul`, `tipemodul`, `status`, `deskripsi`, `idsubproduk`, `idproduk`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
(1, NULL, 'a', 1, 0, 'oooo', 1, 2, NULL, '2021-02-09 12:05:15', NULL, '2021-02-09 12:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `it_produk`
--

CREATE TABLE `it_produk` (
  `idproduk` int(11) NOT NULL,
  `namaproduk` varchar(250) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(100) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_produk`
--

INSERT INTO `it_produk` (`idproduk`, `namaproduk`, `deskripsi`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
(1, 'Portal Dealer', '', NULL, '2021-02-09 11:55:32', NULL, NULL),
(2, 'Accounting And Finance', '', NULL, '2021-02-09 11:55:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `it_proyek`
--

CREATE TABLE `it_proyek` (
  `idproyek` int(11) NOT NULL,
  `namaproyek` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `idtipeproyek` int(11) DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(255) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_proyek`
--

INSERT INTO `it_proyek` (`idproyek`, `namaproyek`, `deskripsi`, `idtipeproyek`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
(1, 'Master plan IT 2021', 'ini master plan it 2021 ya', 2, NULL, NULL, NULL, NULL),
(2, 'daifuku', 'ini proyek untuk robot gundang', 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `it_proyekdetail`
--

CREATE TABLE `it_proyekdetail` (
  `idproyekdetail` int(11) NOT NULL,
  `idproyek` int(11) DEFAULT NULL,
  `idmodul` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(255) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_proyekdetail`
--

INSERT INTO `it_proyekdetail` (`idproyekdetail`, `idproyek`, `idmodul`, `deskripsi`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
(1, 2, 1, 'penambahan fasilitas export', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `it_proyekhistory`
--

CREATE TABLE `it_proyekhistory` (
  `idproyekhistory` int(11) NOT NULL,
  `idproyekdetail` int(11) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `aksi` varchar(255) DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(255) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_proyekhistory`
--

INSERT INTO `it_proyekhistory` (`idproyekhistory`, `idproyekdetail`, `pic`, `role`, `aksi`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
(1, 1, 'gigih', 'ba', 'docprogres', 'gigih', '2021-02-17 04:13:00', NULL, NULL),
(2, 1, 'gigih', 'ba', 'docdone', 'gigih', '2021-02-17 04:15:57', NULL, NULL),
(3, 1, 'paga', 'dev', 'devprogres', 'paga', '2021-02-17 04:18:33', NULL, NULL),
(4, 1, 'paga', 'dev', 'devdone', 'paga', '2021-02-17 04:23:33', NULL, NULL),
(5, 1, 'saputra', 'qc', 'qcprogres', 'saputra', '2021-02-17 04:27:33', NULL, NULL),
(6, 1, 'saputra', 'qc', 'qcfailed', 'saputra', '2021-02-17 04:29:33', NULL, NULL),
(7, 1, 'saputra', 'qc', 'qcaccept', 'saputra', '2021-02-17 04:42:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `it_subproduk`
--

CREATE TABLE `it_subproduk` (
  `idsubproduk` int(11) NOT NULL,
  `namasubproduk` varchar(250) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `createby` varchar(50) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(50) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_subproduk`
--

INSERT INTO `it_subproduk` (`idsubproduk`, `namasubproduk`, `idproduk`, `deskripsi`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
(1, 'Activity Event', 1, '', NULL, '2021-02-09 11:58:04', NULL, NULL),
(2, 'Dealer Information System', 1, '', NULL, '2021-02-09 11:59:21', NULL, NULL),
(3, 'Dealer Online Market', 1, '', NULL, '2021-02-09 11:59:31', NULL, NULL),
(4, 'Repeat Order', 2, '', NULL, '2021-02-09 11:59:42', NULL, NULL),
(5, 'STNK BPKB', 2, '', NULL, '2021-02-09 11:59:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `it_tipemodul`
--

CREATE TABLE `it_tipemodul` (
  `idtipemodul` int(11) NOT NULL,
  `namatipemodul` varchar(255) NOT NULL,
  `kodetipemodul` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_tipemodul`
--

INSERT INTO `it_tipemodul` (`idtipemodul`, `namatipemodul`, `kodetipemodul`) VALUES
(1, 'Master (Single Table)', 'M1'),
(2, 'Master (Multi Table)', 'M2'),
(3, 'Transaction (Single Process)', 'T1'),
(4, 'Transaction (Multi Process)', 'T2'),
(5, 'Report Single Data', 'R1'),
(6, 'Report Multi Data (Complex)', 'R2');

-- --------------------------------------------------------

--
-- Table structure for table `it_tipeproyek`
--

CREATE TABLE `it_tipeproyek` (
  `idtipeproyek` int(11) NOT NULL,
  `namatipeproyek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_tipeproyek`
--

INSERT INTO `it_tipeproyek` (`idtipeproyek`, `namatipeproyek`) VALUES
(1, 'Strategic Project'),
(2, 'Master Plan Internal'),
(3, 'Master Plan Vendor'),
(4, 'Additional');

-- --------------------------------------------------------

--
-- Table structure for table `it_users`
--

CREATE TABLE `it_users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `namauser` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `createby` varchar(255) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifby` varchar(255) DEFAULT NULL,
  `modifdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `it_users`
--

INSERT INTO `it_users` (`iduser`, `username`, `password`, `namauser`, `jabatan`, `createby`, `createdate`, `modifby`, `modifdate`) VALUES
(1, 'admin', '�bN�t j���O3J\\�&cMU�/���!��{3��ӄ~ϥ���Ĳs�If&�����X���}�W��=C!����\Z��3', 'Ini Admin', 'administrator', NULL, NULL, NULL, NULL),
(2, 'gigih', '�bN�t j���O3J\\�&cMU�/���!��{3��ӄ~ϥ���Ĳs�If&�����X���}�W��=C!����\Z��3', 'Gigih', 'ba', NULL, NULL, NULL, NULL),
(3, 'paga', '�bN�t j���O3J\\�&cMU�/���!��{3��ӄ~ϥ���Ĳs�If&�����X���}�W��=C!����\Z��3', 'Paga', 'dev', NULL, NULL, NULL, NULL),
(4, 'saputra', '�bN�t j���O3J\\�&cMU�/���!��{3��ӄ~ϥ���Ĳs�If&�����X���}�W��=C!����\Z��3', 'Saputra', 'qc', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `it_modul`
--
ALTER TABLE `it_modul`
  ADD PRIMARY KEY (`idmodul`);

--
-- Indexes for table `it_produk`
--
ALTER TABLE `it_produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `it_proyek`
--
ALTER TABLE `it_proyek`
  ADD PRIMARY KEY (`idproyek`);

--
-- Indexes for table `it_proyekdetail`
--
ALTER TABLE `it_proyekdetail`
  ADD PRIMARY KEY (`idproyekdetail`);

--
-- Indexes for table `it_proyekhistory`
--
ALTER TABLE `it_proyekhistory`
  ADD PRIMARY KEY (`idproyekhistory`);

--
-- Indexes for table `it_subproduk`
--
ALTER TABLE `it_subproduk`
  ADD PRIMARY KEY (`idsubproduk`);

--
-- Indexes for table `it_tipemodul`
--
ALTER TABLE `it_tipemodul`
  ADD PRIMARY KEY (`idtipemodul`);

--
-- Indexes for table `it_tipeproyek`
--
ALTER TABLE `it_tipeproyek`
  ADD PRIMARY KEY (`idtipeproyek`);

--
-- Indexes for table `it_users`
--
ALTER TABLE `it_users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `it_modul`
--
ALTER TABLE `it_modul`
  MODIFY `idmodul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `it_produk`
--
ALTER TABLE `it_produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `it_proyek`
--
ALTER TABLE `it_proyek`
  MODIFY `idproyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `it_proyekdetail`
--
ALTER TABLE `it_proyekdetail`
  MODIFY `idproyekdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `it_proyekhistory`
--
ALTER TABLE `it_proyekhistory`
  MODIFY `idproyekhistory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `it_subproduk`
--
ALTER TABLE `it_subproduk`
  MODIFY `idsubproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `it_tipemodul`
--
ALTER TABLE `it_tipemodul`
  MODIFY `idtipemodul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `it_tipeproyek`
--
ALTER TABLE `it_tipeproyek`
  MODIFY `idtipeproyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `it_users`
--
ALTER TABLE `it_users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
