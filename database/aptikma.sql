-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 04:10 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptikma`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `hari` varchar(225) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `all_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `hari`, `jam`, `all_data`) VALUES
(27, 'Kamis', '2020-09-03 07:47:04', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"2"},{"nama":"aldokeren","hari":"21","status":"1"}]]'),
(28, 'Jumat', '2020-09-04 07:44:27', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"1"},{"nama":"aldokeren","hari":"21","status":"2"}]]'),
(29, 'Kamis', '2020-09-03 07:50:04', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"1"},{"nama":"aldokeren","hari":"21","status":"1"}]]'),
(30, 'Jumat', '2020-09-04 02:03:05', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"1"},{"nama":"aldokeren","hari":"21","status":"1"}]]'),
(31, 'Kamis', '2020-09-10 07:33:38', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"1"},{"nama":"aldokeren","hari":"21","status":"1"}]]'),
(32, 'Sabtu', '2020-09-12 02:42:32', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"1"},{"nama":"aldokeren","hari":"21","status":"1"}]]'),
(33, 'Senin', '2020-09-14 06:54:35', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"1"},{"nama":"aldokeren","hari":"21","status":"1"}]]'),
(34, 'Rabu', '2020-09-16 09:52:37', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"1"},{"nama":"aldokeren","hari":"21","status":"1"}]]'),
(35, 'Kamis', '2020-09-17 04:44:39', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"1"},{"nama":"aldokeren","hari":"21","status":"1"}]]'),
(36, 'Jumat', '2020-09-17 21:50:41', '[[{"nama":"fathur","hari":"17","status":"1"},{"nama":"Azizi","hari":"17","status":"1"},{"nama":"aldokeren","hari":"21","status":"1"}]]'),
(37, 'Sabtu', '2020-09-19 01:50:21', '[null]'),
(38, 'Minggu', '2020-09-20 02:52:58', '[null]'),
(39, 'Senin', '2020-09-20 21:58:33', '[null]'),
(40, 'Minggu', '2020-09-27 11:43:55', '[null]'),
(41, 'Senin', '2020-09-28 00:08:27', '[null]'),
(42, 'Rabu', '2020-09-30 02:09:56', '[null]');

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id_berita` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara`
--

INSERT INTO `berita_acara` (`id_berita`, `title`, `image`, `isi`) VALUES
(3, 'Berita', '67eb725f329ed995371007a19904bfbe.png', 'Mari kita mengheningkap cipta'),
(4, 'HALO 2', 'd39299fb2bae59eeb8c503513d1339c6.PNG', 'isi berita'),
(5, 'test announcement', '051ebd25075576e09f27b9e59f700369.png', 'adsada'),
(6, 'aaa', '213def804fa5b50db14a85c0a951e3c5.png', 'asda'),
(7, 'asddas', '550c17af137be9c5781f585f7b8ccabf.png', 'asdasdad');

-- --------------------------------------------------------

--
-- Table structure for table `data_bulan`
--

CREATE TABLE `data_bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `gaji_pokok` int(100) NOT NULL,
  `asuransi` int(100) NOT NULL,
  `potongan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `h_login`
--

CREATE TABLE `h_login` (
  `id_h_login` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `h_login`
--

INSERT INTO `h_login` (`id_h_login`, `id_users`, `date`) VALUES
(2, 1, '2020-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `m_users`
--

CREATE TABLE `m_users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `jabatan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_users`
--

INSERT INTO `m_users` (`id_users`, `nama`, `password`, `email`, `status`, `username`, `jabatan`) VALUES
(1, 'admin sip', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@sip.com', 1, 'admin', 'CEO');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  `code_qr` varchar(225) NOT NULL,
  `string_qr_code` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `email`, `no_tlp`, `jabatan`, `nip`, `username`, `password`, `image`, `code_qr`, `string_qr_code`, `date`) VALUES
(5, 'fathur', 'Malang', '2020-09-09', 'WAJAK', 'syafi.addin@gmail.com', '129312093813', 'presiden', '00001', 'Fathur123', '', '481b998e898f8d74c0982f7974947bb3.png', 'jMfYZ1TkV8.png', 'jMfYZ1TkV8', '2020-09-30 02:43:41'),
(6, 'Fatur', 'Malang', '2020-09-02', 'Wajak', 'syafi.addin@gmail.com', '12312314123', 'CEO', '00002', 'Fathur123', '', 'ff5bff6a5561785a8e238b64f4ecea46.PNG', '9jxWnOee3W.png', '9jxWnOee3W', '2020-09-30 02:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `potongan` int(11) NOT NULL,
  `jenis_potongan` text NOT NULL,
  `potong_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`potongan`, `jenis_potongan`, `potong_gaji`) VALUES
(1, 'Absen A 3 x ', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_absensi`
--

CREATE TABLE `riwayat_absensi` (
  `id_riwayat` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(225) NOT NULL COMMENT 'status 1 = Masuk, Status 2 = Sakit , Status 3 = Izin, Telat = 4'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_login`
--

CREATE TABLE `riwayat_login` (
  `id_rlogin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_login`
--

INSERT INTO `riwayat_login` (`id_rlogin`, `id_user`, `waktu`) VALUES
(1, 1, '2020-09-17 22:04:19'),
(2, 1, '2020-09-17 22:40:43'),
(3, 1, '2020-09-18 06:40:26'),
(4, 1, '2020-09-19 01:50:21'),
(5, 1, '2020-09-19 01:55:04'),
(6, 1, '2020-09-19 02:06:19'),
(7, 1, '2020-09-19 03:59:35'),
(8, 1, '2020-09-19 10:30:30'),
(9, 1, '2020-09-19 10:57:12'),
(10, 1, '2020-09-20 02:52:57'),
(11, 1, '2020-09-20 13:11:01'),
(12, 1, '2020-09-20 21:58:32'),
(13, 1, '2020-09-27 11:43:54'),
(14, 1, '2020-09-27 11:44:12'),
(15, 1, '2020-09-27 11:44:33'),
(16, 1, '2020-09-27 11:45:51'),
(17, 1, '2020-09-27 11:50:04'),
(18, 1, '2020-09-27 12:08:20'),
(19, 1, '2020-09-27 12:12:59'),
(20, 1, '2020-09-28 00:08:26'),
(21, 1, '2020-09-28 00:13:30'),
(22, 1, '2020-09-28 00:14:51'),
(23, 1, '2020-09-28 03:36:04'),
(24, 1, '2020-09-28 03:41:01'),
(25, 1, '2020-09-28 03:43:59'),
(26, 1, '2020-09-28 03:54:00'),
(27, 1, '2020-09-28 10:02:53'),
(28, 1, '2020-09-30 02:09:56'),
(29, 1, '2020-09-30 02:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_update_qr`
--

CREATE TABLE `riwayat_update_qr` (
  `id_update_qr` int(11) NOT NULL,
  `total_data` varchar(22) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `data_bulan`
--
ALTER TABLE `data_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `potongan` (`potongan`),
  ADD KEY `id_pegawai_2` (`id_pegawai`,`potongan`);

--
-- Indexes for table `h_login`
--
ALTER TABLE `h_login`
  ADD PRIMARY KEY (`id_h_login`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `m_users`
--
ALTER TABLE `m_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`potongan`);

--
-- Indexes for table `riwayat_absensi`
--
ALTER TABLE `riwayat_absensi`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `riwayat_login`
--
ALTER TABLE `riwayat_login`
  ADD PRIMARY KEY (`id_rlogin`),
  ADD KEY `rls_user` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `riwayat_update_qr`
--
ALTER TABLE `riwayat_update_qr`
  ADD PRIMARY KEY (`id_update_qr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_bulan`
--
ALTER TABLE `data_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `h_login`
--
ALTER TABLE `h_login`
  MODIFY `id_h_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `m_users`
--
ALTER TABLE `m_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `potongan`
--
ALTER TABLE `potongan`
  MODIFY `potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `riwayat_absensi`
--
ALTER TABLE `riwayat_absensi`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riwayat_login`
--
ALTER TABLE `riwayat_login`
  MODIFY `id_rlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `riwayat_update_qr`
--
ALTER TABLE `riwayat_update_qr`
  MODIFY `id_update_qr` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`potongan`) REFERENCES `potongan` (`potongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `h_login`
--
ALTER TABLE `h_login`
  ADD CONSTRAINT `rls_users` FOREIGN KEY (`id_users`) REFERENCES `m_users` (`id_users`);

--
-- Constraints for table `riwayat_absensi`
--
ALTER TABLE `riwayat_absensi`
  ADD CONSTRAINT `rls_absn_gawai` FOREIGN KEY (`id_karyawan`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
