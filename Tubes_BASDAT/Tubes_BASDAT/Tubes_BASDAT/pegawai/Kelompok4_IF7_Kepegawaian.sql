-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 11:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_basdat`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `gaji_pokok` int(10) NOT NULL,
  `tunjangan_jabatan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tunjangan_jabatan`) VALUES
(2, 'HRD', 200000, 200000),
(3, 'Direktur', 3000000, 150000),
(4, 'Manager', 2000000, 150000),
(5, 'Asisten Manager', 1750000, 150000),
(6, 'Supervisor', 1500000, 150000),
(7, 'IT', 1500000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `logpegawai`
--

CREATE TABLE `logpegawai` (
  `waktu` datetime NOT NULL,
  `Keterangan` varchar(50) NOT NULL,
  `nip_lama` varchar(10) NOT NULL,
  `nip_baru` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logpegawai`
--

INSERT INTO `logpegawai` (`waktu`, `Keterangan`, `nip_lama`, `nip_baru`) VALUES
('2022-08-03 11:02:14', 'UPDATE NIP', '10120267', '10120367'),
('2022-08-03 11:26:56', 'DELETE NIP', '10129090', NULL),
('2022-08-03 11:30:34', 'DELETE NIP', '10120367', NULL),
('2022-08-03 11:32:47', 'UPDATE NIP', '10120268', '10120268'),
('2022-08-03 11:35:09', 'UPDATE NIP', '10120268', '10120210');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `id_jabatan` int(5) NOT NULL,
  `id_tunjangan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `jk`, `alamat`, `id_jabatan`, `id_tunjangan`) VALUES
(1, '10120210', 'asep wahyudi ', 'laki-laki', 'jalan bangbayang no 10000', 2, 1),
(2, '10120261', 'Dadank Paralon', 'laki-laki', 'Jl. Delima No. 5', 2, 3),
(3, '10120346', 'Ratu Usman', 'perempuan', 'Jl. Mangga no. 123', 6, 4),
(4, '10294736', 'Adi Putra', 'laki-laki', 'Jl. Nanas No. 79', 2, 1),
(5, '10234822', 'Rahma Tirto', 'perempuan', 'Jl. Pisang No. 10', 7, 0),
(6, '12374320', 'Akhmad Batari', 'laki-laki', 'Jl. Naga No. 43', 4, 2),
(7, '19234723', 'Mega Jamaluddin', 'perempuan', 'Jl. Salak No. 189', 4, 4),
(8, '12304222', 'Setiawan Batari', 'laki-laki', 'Jl. Pepaya No. 77', 7, 0),
(9, '12038232', 'Putri Aisyah', 'perempuan', 'Jl. Sirsak no. 164', 7, 1),
(10, '10123842', 'Dian Purnama', 'laki-laki', 'Jl. Duku No. 37', 5, 2);

--
-- Triggers `pegawai`
--
DELIMITER $$
CREATE TRIGGER `logDelete` AFTER DELETE ON `pegawai` FOR EACH ROW INSERT INTO logpegawai VALUES (NOW(),'DELETE NIP',OLD.nip,NULL)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `logUpdate` AFTER UPDATE ON `pegawai` FOR EACH ROW INSERT INTO logpegawai VALUES(NOW(),'UPDATE NIP',OLD.nip,NEW.nip)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id_tunjangan` int(5) NOT NULL,
  `tunjangan_anak` int(10) NOT NULL,
  `tunjangan_pasutri` int(10) NOT NULL,
  `uang_makan` int(10) NOT NULL,
  `uang_lembur` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id_tunjangan`, `tunjangan_anak`, `tunjangan_pasutri`, `uang_makan`, `uang_lembur`) VALUES
(0, 0, 0, 30000, 50000),
(1, 250000, 200000, 30000, 50000),
(2, 300000, 250000, 35000, 75000),
(3, 350000, 300000, 40000, 80000),
(4, 375000, 325000, 400000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'fanhash', '12345', 'admin'),
(2, 'admin', '56789', 'admin'),
(4, 'hashhh', '12345', 'admin'),
(5, 'gerry', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_tunjangan` (`id_tunjangan`),
  ADD KEY `id_tunjangan_2` (`id_tunjangan`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
