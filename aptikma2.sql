-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2021 pada 05.31
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aptikma2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_commit`
--

CREATE TABLE `absensi_commit` (
  `id_absen_commit` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `tidak_masuk` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `telat` varchar(20) NOT NULL,
  `tugas` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `edited_by` int(11) NOT NULL,
  `edited_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id_berita` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita_acara`
--

INSERT INTO `berita_acara` (`id_berita`, `title`, `image`, `isi`) VALUES
(3, 'Berita', '67eb725f329ed995371007a19904bfbe.png', 'Mari kita mengheningkap cipta'),
(7, 'asddas', '0969ced0b618654c11481ae8efb081c2.jpg', 'asdasdad'),
(8, 'Apakah', '1d04fd44bfaa39fb2facb2a11cb0ede7.jpg', 'ini cinta'),
(9, 'Inikah', '932fadff98fcca6a3d2b45388d6caa72.jpg', 'cinta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bulan`
--

CREATE TABLE `data_bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `gaji_bersih` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `h_login`
--

CREATE TABLE `h_login` (
  `id_h_login` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `h_login`
--

INSERT INTO `h_login` (`id_h_login`, `id_users`, `date`) VALUES
(2, 1, '2020-10-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_departement`
--

CREATE TABLE `m_departement` (
  `id_departement` int(11) NOT NULL,
  `nama` varchar(110) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_by` int(11) NOT NULL,
  `edited_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_departement`
--

INSERT INTO `m_departement` (`id_departement`, `nama`, `created_date`, `created_by`, `edited_by`, `edited_date`) VALUES
(1, 'CEO', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_izin`
--

CREATE TABLE `m_izin` (
  `id_izin` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jenis_izin` int(11) NOT NULL,
  `waktu_start` datetime NOT NULL,
  `waktu_finish` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis_izin`
--

CREATE TABLE `m_jenis_izin` (
  `id_jenis_izin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_periode`
--

CREATE TABLE `m_periode` (
  `id_periode` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_periode`
--

INSERT INTO `m_periode` (`id_periode`, `kode`, `start`, `finish`, `created_date`, `created_by`, `edited_date`, `edited_by`) VALUES
(2, 202102, '2021-06-07', '2021-06-08', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_users`
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
-- Dumping data untuk tabel `m_users`
--

INSERT INTO `m_users` (`id_users`, `nama`, `password`, `email`, `status`, `username`, `jabatan`) VALUES
(1, 'admin sip', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@sip.com', 1, 'admin', 'CEO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `periode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `email`, `no_tlp`, `jabatan`, `nip`, `username`, `password`, `image`, `code_qr`, `string_qr_code`, `date`, `periode`) VALUES
(5, 'fathur', 'Malang', '2020-09-09', 'WAJAK', 'syafi.addin@gmail.com', '129312093813', 'presiden', '00001', 'Fathur123', '', '481b998e898f8d74c0982f7974947bb3.png', 'kSYWgKNsHC.png', 'kSYWgKNsHC', '2021-06-30 14:41:49', '202102'),
(6, 'Fatur', 'Malang', '2020-09-02', 'Wajak', 'syafi.addin@gmail.com', '12312314123', 'CEO', '00002', 'Fathur123', '', 'ff5bff6a5561785a8e238b64f4ecea46.PNG', '9BHpRjSAuB.png', '9BHpRjSAuB', '2021-06-30 14:41:49', '202102');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan`
--

CREATE TABLE `potongan` (
  `id_potongan` int(11) NOT NULL,
  `jenis_potongan` text NOT NULL,
  `potong_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `potongan`
--

INSERT INTO `potongan` (`id_potongan`, `jenis_potongan`, `potong_gaji`) VALUES
(1, 'Absen A 3 x ', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_detail`
--

CREATE TABLE `potongan_detail` (
  `id_potongan_detail` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jenis_potongan` int(11) NOT NULL,
  `value` double NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `edited_date` datetime NOT NULL,
  `edited_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_absensi`
--

CREATE TABLE `riwayat_absensi` (
  `id_riwayat` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(225) NOT NULL COMMENT 'status 1 = Masuk, Status 2 = Sakit , Status 3 = Izin, Telat = 4',
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_absensi`
--

INSERT INTO `riwayat_absensi` (`id_riwayat`, `id_pegawai`, `jam`, `status`, `lokasi`) VALUES
(1, 6, '2020-10-04 00:57:30', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_login`
--

CREATE TABLE `riwayat_login` (
  `id_rlogin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_login`
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
(29, 1, '2020-09-30 02:12:40'),
(30, 1, '2020-10-01 03:11:35'),
(31, 1, '2020-09-28 03:14:10'),
(32, 1, '2020-09-29 03:16:17'),
(33, 1, '2020-09-29 03:18:38'),
(34, 1, '2020-09-30 03:19:00'),
(35, 1, '2020-10-01 07:05:20'),
(36, 1, '2020-10-01 11:16:35'),
(37, 1, '2020-10-04 00:55:31'),
(38, 1, '2020-10-04 01:01:04'),
(39, 1, '2020-10-04 04:36:20'),
(40, 1, '2021-06-29 14:45:43'),
(41, 1, '2021-06-30 11:33:32'),
(42, 1, '2021-06-30 11:53:41'),
(43, 1, '2021-07-01 00:27:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_update_qr`
--

CREATE TABLE `riwayat_update_qr` (
  `id_update_qr` int(11) NOT NULL,
  `total_data` varchar(22) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_commit`
--
ALTER TABLE `absensi_commit`
  ADD PRIMARY KEY (`id_absen_commit`);

--
-- Indeks untuk tabel `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `data_bulan`
--
ALTER TABLE `data_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indeks untuk tabel `h_login`
--
ALTER TABLE `h_login`
  ADD PRIMARY KEY (`id_h_login`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `m_departement`
--
ALTER TABLE `m_departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indeks untuk tabel `m_izin`
--
ALTER TABLE `m_izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `m_jenis_izin`
--
ALTER TABLE `m_jenis_izin`
  ADD PRIMARY KEY (`id_jenis_izin`);

--
-- Indeks untuk tabel `m_periode`
--
ALTER TABLE `m_periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indeks untuk tabel `m_users`
--
ALTER TABLE `m_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indeks untuk tabel `potongan_detail`
--
ALTER TABLE `potongan_detail`
  ADD PRIMARY KEY (`id_potongan_detail`);

--
-- Indeks untuk tabel `riwayat_absensi`
--
ALTER TABLE `riwayat_absensi`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_karyawan` (`id_pegawai`);

--
-- Indeks untuk tabel `riwayat_login`
--
ALTER TABLE `riwayat_login`
  ADD PRIMARY KEY (`id_rlogin`),
  ADD KEY `rls_user` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `riwayat_update_qr`
--
ALTER TABLE `riwayat_update_qr`
  ADD PRIMARY KEY (`id_update_qr`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_commit`
--
ALTER TABLE `absensi_commit`
  MODIFY `id_absen_commit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `data_bulan`
--
ALTER TABLE `data_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `h_login`
--
ALTER TABLE `h_login`
  MODIFY `id_h_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `m_departement`
--
ALTER TABLE `m_departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `m_izin`
--
ALTER TABLE `m_izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_jenis_izin`
--
ALTER TABLE `m_jenis_izin`
  MODIFY `id_jenis_izin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_periode`
--
ALTER TABLE `m_periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `m_users`
--
ALTER TABLE `m_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `potongan_detail`
--
ALTER TABLE `potongan_detail`
  MODIFY `id_potongan_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_absensi`
--
ALTER TABLE `riwayat_absensi`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `riwayat_login`
--
ALTER TABLE `riwayat_login`
  MODIFY `id_rlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `riwayat_update_qr`
--
ALTER TABLE `riwayat_update_qr`
  MODIFY `id_update_qr` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`gaji_bersih`) REFERENCES `potongan` (`potongan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `h_login`
--
ALTER TABLE `h_login`
  ADD CONSTRAINT `rls_users` FOREIGN KEY (`id_users`) REFERENCES `m_users` (`id_users`);

--
-- Ketidakleluasaan untuk tabel `riwayat_absensi`
--
ALTER TABLE `riwayat_absensi`
  ADD CONSTRAINT `rls_absn_gawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
