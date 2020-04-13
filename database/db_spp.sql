-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 08:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `detailLog` (`id` INT(11))  BEGIN
    select id_log,nisn,nis,nama_lengkap,alamat,no_telp,nama_kelas,komp_keahlian,username,email,role,bulan,tahun,nominal,jumlah_bayar, waktu_bayar,log_pembayaran.id_pembayaran from log_pembayaran inner join pembayaran on log_pembayaran.id_pembayaran = 	pembayaran.id_pembayaran join siswa on pembayaran.id_siswa = siswa.id_siswa join user on pembayaran.id_user = user.id_user JOIN spp ON pembayaran.id_spp= spp.id_spp JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE id_log = id;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `detailSiswa` (`id` INT(11))  BEGIN
    SELECT siswa.id_siswa, siswa.nisn, nis, nama_lengkap, alamat, no_telp, username,email,password,nama_kelas,komp_keahlian from siswa LEFT JOIN user ON siswa.id_siswa = user.id_siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_siswa=id;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logPembayaran` ()  BEGIN
select id_log,nisn,nama_lengkap,nama_kelas,bulan,tahun,username,jumlah_bayar, waktu_bayar from log_pembayaran inner join pembayaran on log_pembayaran.id_pembayaran = pembayaran.id_pembayaran join siswa on pembayaran.id_siswa = siswa.id_siswa join user on pembayaran.id_user = user.id_user JOIN spp ON pembayaran.id_spp= spp.id_spp JOIN kelas ON siswa.id_kelas = kelas.id_kelas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `siswa` ()  BEGIN
select id_siswa, nisn, nis, no_telp, nama_lengkap, siswa.id_kelas, kelas.nama_kelas, kelas.komp_keahlian from siswa INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totalPembayaran` ()  BEGIN 
SELECT COUNT(id_log) FROM log_pembayaran;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totalSiswa` ()  BEGIN
SELECT COUNT(id_siswa) FROM siswa;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `komp_keahlian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `komp_keahlian`) VALUES
(1, 'XII RPL 2', 'Rekayasa Perangkat Lunak'),
(2, 'XII RPL 1', 'Rekayasa Perangkat Lunak'),
(6, 'XII RPL 3', 'Rekayasa Perangkat Lunak'),
(8, 'X RPL 1', 'Rekayasa Perangkat Lunak'),
(9, 'X PS', 'Perbankan Syari\'ah'),
(10, 'XII PS', 'Perbankan Syari\'ah');

-- --------------------------------------------------------

--
-- Table structure for table `log_pembayaran`
--

CREATE TABLE `log_pembayaran` (
  `id_log` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `tanggal_dibayar` date NOT NULL,
  `bulan_dibayar` varchar(15) NOT NULL,
  `tahun_dibayar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_pembayaran`
--

INSERT INTO `log_pembayaran` (`id_log`, `id_pembayaran`, `tanggal_dibayar`, `bulan_dibayar`, `tahun_dibayar`) VALUES
(1, 1, '2020-03-09', '3', 2020),
(2, 2, '2020-03-09', '3', 2020),
(3, 3, '2020-03-09', '3', 2020),
(5, 4, '2020-03-09', '3', 2020),
(7, 6, '2020-03-09', '3', 2020),
(8, 7, '2020-03-10', '3', 2020),
(9, 8, '2020-03-11', '3', 2020),
(10, 9, '2020-03-11', '3', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_spp` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `waktu_bayar` datetime DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL DEFAULT 'BELUM LUNAS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `id_spp`, `id_siswa`, `jumlah_bayar`, `waktu_bayar`, `status`) VALUES
(1, 1, 1, 1, 100000, '2020-03-09 09:24:12', 'LUNAS'),
(2, 1, 2, 1, 100000, '2020-03-09 10:03:52', 'LUNAS'),
(3, 1, 1, 4, 100000, '2020-03-09 12:37:51', 'LUNAS'),
(4, 1, 5, 4, 100000, '2020-03-09 13:11:49', 'LUNAS'),
(5, 1, 5, 4, 100000, '2020-03-09 13:23:08', 'LUNAS'),
(6, 1, 1, 35, 100000, '2020-03-09 13:24:07', 'LUNAS'),
(7, 1, 5, 1, 100000, '2020-03-10 09:07:59', 'LUNAS'),
(8, 1, 4, 1, 100000, '2020-03-11 13:11:00', 'LUNAS'),
(9, 5, 1, 5, 100000, '2020-03-11 13:15:57', 'LUNAS');

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `log_pembayaran` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
INSERT INTO `log_pembayaran` (`id_log`, `id_pembayaran`, `tanggal_dibayar`, `bulan_dibayar`, `tahun_dibayar`) VALUES (NULL, NEW.id_pembayaran, CURRENT_DATE(), MONTH(current_timestamp), YEAR(current_timestamp));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nis`, `nama_lengkap`, `id_kelas`, `alamat`, `no_telp`) VALUES
(1, '0000000000', '00000000', 'Andri Junaedi', 6, 'Jawa Timur', '081221614101'),
(4, '1111111111', '11111111', 'Diki Rahman', 2, 'Ciherang', '0899999990'),
(5, '1111111112', '11111112', 'Iksan', 1, 'Rancakalong', '088888888888'),
(6, '1111111113', '11111113', 'Rian', 1, 'Ciher\'ang', '088888888899'),
(20, '1111111114', '11111114', 'Rohmat Hidayat Maulana', 1, 'Rancakalong', '086711531736'),
(24, '1111111115', '11111115', 'Reygi', 1, 'Sumedang', '081531651611');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `delete_siswa` AFTER DELETE ON `siswa` FOR EACH ROW BEGIN
DELETE FROM user WHERE user.id_siswa = OLD.id_siswa;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `nominal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `bulan`, `tahun`, `nominal`) VALUES
(1, 'Januari', '2020', 100000),
(2, 'Februari', '2020', 100000),
(4, 'Maret', '2020', 100000),
(5, 'April', '2020', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL DEFAULT 'nama@domain.com',
  `password` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'siswa',
  `id_siswa` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`, `id_siswa`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 'admin', NULL),
(3, 'Andri', 'siswa@gmail.com', 'siswa', 'siswa', '1'),
(5, 'Petugas21', 'petugas@gmail.com', 'petugas', 'petugas', NULL),
(7, 'petugas2', 'petugas2@gmail.com', 'petugas2', 'petugas', NULL),
(13, 'rohmat', 'rohmat@gmail.com', 'rohmat123', 'siswa', '20'),
(14, 'diki rahman', 'diki@gmail.com', 'diki123', 'siswa', '4'),
(15, 'iksan', 'iksan@gmail.com', 'iksan123', 'siswa', '5'),
(16, 'rian', 'rian@gmail.com', 'rian', 'siswa', '6'),
(17, 'reygi', 'reygi@gmail.com', 'reygi123', 'siswa', '24'),
(21, 'Andri Junaedi', 'andri@gmail.com', 'andri12', 'petugas', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `log_pembayaran`
--
ALTER TABLE `log_pembayaran`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nisn` (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log_pembayaran`
--
ALTER TABLE `log_pembayaran`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
