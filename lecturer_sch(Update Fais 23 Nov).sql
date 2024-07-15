-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 12:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecturer_sch`
--

-- --------------------------------------------------------

--
-- Table structure for table `baru_jadwaldosen`
--

CREATE TABLE `baru_jadwaldosen` (
  `kode_jadwaldosen` int(11) NOT NULL,
  `nip` int(15) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `shift1` int(11) NOT NULL,
  `shift2` int(11) NOT NULL,
  `shift3` int(11) NOT NULL,
  `shift4` int(11) NOT NULL,
  `shift5` int(11) NOT NULL,
  `shift6` int(11) NOT NULL,
  `shift7` int(11) NOT NULL,
  `shift8` int(11) NOT NULL,
  `shift9` int(11) NOT NULL,
  `shift10` int(11) NOT NULL,
  `shift11` int(11) NOT NULL,
  `shift12` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` int(15) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `kode_dosen` varchar(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_depan`, `nama_belakang`, `kode_dosen`, `username`, `email`, `password`, `id_status`) VALUES
(1, 'Administator', '', 'ADM', 'admin', 'admin@admin.com', '7aec9d92c71acd6680c8da9f1c746da7', 0),
(1103160030, 'Naufal Fais', 'Hakim', 'NFH', 'nfaish', 'naufalfais21@gmail.com', '52a917044efe6615de1733e8ceb080bc', 2),
(1103160321, 'Radja', 'Fachriyanda', 'RJF', 'radjaf', 'radja123@gmail.com', '07216634dec946037730bf35c3df2a72', 2),
(1103160364, 'Ahmad Zulian', 'Azhar', 'AZA', 'zulian', 'zulian123@gmail.com', 'c487529c26cd307d8cec1568900758a9', 2),
(1103164005, 'Novansyah', 'Herman', 'NVN', 'novansyah', 'novansyah21@gmail.com', '969c56257d8a3a6892458e57dfbcceff', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_additional`
--

CREATE TABLE `dosen_additional` (
  `id_additional` int(11) NOT NULL,
  `nip` int(15) NOT NULL,
  `jab_fungsional` varchar(255) NOT NULL,
  `jab_struktural` varchar(255) NOT NULL,
  `kota_asal` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen_additional`
--

INSERT INTO `dosen_additional` (`id_additional`, `nip`, `jab_fungsional`, `jab_struktural`, `kota_asal`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
(14, 1, '', '', '', '', '', ''),
(15, 1103164005, 'Pengawas', 'Pengawis', 'Jakarta', '02-11-1997', 'Jl. Kapuk Kayu Besar RT.006/011 No.61 , Cengkareng Timur', '081367542285'),
(16, 1103160030, 'Lektor', '-', 'Jakarta', '11 Maret 1998', 'Jl.Raya Tengah Gg.H Baing', '087863434916'),
(17, 1103160364, '', '', '', '', '', ''),
(18, 1103160321, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL,
  `kode_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `id_gedung`, `nama_fakultas`, `kode_fakultas`) VALUES
(4, 1, 'Fakultas Teknik Elektro', 'FTE'),
(6, 19, 'Fakultas Teknik Industri', 'FRI');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`) VALUES
(1, 'Tokong Nanas'),
(2, 'Graha Wiyata Cacuk'),
(17, 'Sam'),
(18, 'Gedung A'),
(19, 'Gedung B'),
(20, 'Gedung C'),
(21, 'Gedung D'),
(22, 'Gedung E'),
(23, 'Gedung P'),
(24, 'Gedung N');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `nama_hari`) VALUES
(1, 'SENIN'),
(2, 'SELASA'),
(3, 'RABU'),
(4, 'KAMIS'),
(5, 'JUMAT'),
(6, 'SABTU');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `kode_jam` varchar(256) NOT NULL,
  `nama_jam` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`kode_jam`, `nama_jam`) VALUES
('J001', '06:30:00'),
('J002', '07:30:00'),
('J003', '08:30:00'),
('J004', '09:30:00'),
('J005', '10:30:00'),
('J006', '11:30:00'),
('J007', '12:30:00'),
('J008', '13:30:00'),
('J009', '14:30:00'),
('J010', '15:30:00'),
('J011', '16:30:00'),
('J012', '17:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `kode_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_fakultas`, `nama_jurusan`, `kode_jurusan`) VALUES
(6, 4, 'S1 Teknik Komputer', 'TK'),
(7, 4, 'S1 Teknik Elektro', 'TE'),
(8, 4, 'S1 Teknik Fisika', 'TF'),
(9, 4, 'S1 Teknik Telekomunikasi', 'TT'),
(11, 6, 'Teknik Industri', 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `dosen_wali` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jurusan`, `nama_kelas`, `angkatan`, `dosen_wali`) VALUES
(2, 6, 'TK-40-05', 2016, 'FSM'),
(18, 6, 'TK-40-02', 2016, 'BRH');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `kode_matkul` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `kode_matkul`, `sks`) VALUES
(11, 'Bahasa Indonesia', 'LUH1A2', 3),
(12, 'Bahasa Inggris I', 'LUH1B2', 3),
(13, 'Pendidikan dan Kewarganeagaran', 'HUH1G3', 3),
(14, 'Fisika', 'FSK', 0),
(15, 'Pendidikan Agama Islam', 'PAI', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE `mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`id_mengajar`, `nip`, `id_matkul`) VALUES
(1, 1103164005, 13),
(2, 1103164005, 11);

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_penjadwalan` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `id_preferensi` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_perkuliahan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perkuliahan`
--

CREATE TABLE `perkuliahan` (
  `id_perkuliahan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perkuliahan`
--

INSERT INTO `perkuliahan` (`id_perkuliahan`, `id_fakultas`, `angkatan`, `id_matkul`) VALUES
(1, 4, 2020, 11),
(2, 4, 2020, 13),
(3, 4, 2020, 11),
(4, 4, 2020, 12),
(5, 4, 2020, 13),
(6, 4, 2020, 11),
(7, 4, 2020, 12),
(8, 4, 2020, 13),
(9, 4, 2020, 14),
(10, 4, 2020, 15);

-- --------------------------------------------------------

--
-- Table structure for table `preferensi`
--

CREATE TABLE `preferensi` (
  `id_preferensi` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `6.30` int(11) NOT NULL,
  `7.30` int(11) NOT NULL,
  `8.30` int(11) NOT NULL,
  `9.30` int(11) NOT NULL,
  `10.30` int(11) NOT NULL,
  `11.30` int(11) NOT NULL,
  `12.30` int(11) NOT NULL,
  `13.30` int(11) NOT NULL,
  `14.30` int(11) NOT NULL,
  `15.30` int(11) NOT NULL,
  `16.30` int(11) NOT NULL,
  `17.30` int(11) NOT NULL,
  `18.30` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `nip`, `user_role_id`) VALUES
(5, 1103164005, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `id_gedung`, `kapasitas`) VALUES
(18, 'KU3.03.01', 1, 34);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan_seminar`
--

CREATE TABLE `ruangan_seminar` (
  `id_slot` int(11) NOT NULL,
  `ruangan` varchar(25) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruangan_seminar`
--

INSERT INTO `ruangan_seminar` (`id_slot`, `ruangan`, `jam_mulai`, `jam_selesai`) VALUES
(1, 'N201', '09:00:00', '09:45:00'),
(2, 'N201', '10:00:00', '10:45:00'),
(3, 'N202', '09:00:00', '09:45:00'),
(4, 'N202', '10:00:00', '10:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(0, 'admin'),
(1, 'akun baru'),
(2, 'akun terbuat'),
(3, 'sudah dijadwalkan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_url`
--

CREATE TABLE `tb_url` (
  `id` int(11) NOT NULL,
  `site_url` text,
  `base_url` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_url`
--

INSERT INTO `tb_url` (`id`, `site_url`, `base_url`) VALUES
(1, 'http://localhost/TELUCUSS/index.php', 'http://localhost/TELUCUSS/');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `kode_waktu` int(11) NOT NULL,
  `id_kelas` varchar(256) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `kode_jam` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baru_jadwaldosen`
--
ALTER TABLE `baru_jadwaldosen`
  ADD PRIMARY KEY (`kode_jadwaldosen`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_hari` (`id_hari`) USING BTREE;

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `dosen_additional`
--
ALTER TABLE `dosen_additional`
  ADD PRIMARY KEY (`id_additional`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`kode_jam`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_dosen` (`nip`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_penjadwalan`),
  ADD KEY `id_mengajar` (`id_mengajar`),
  ADD KEY `id_preferensi` (`id_preferensi`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_perkuliahan` (`id_perkuliahan`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD PRIMARY KEY (`id_perkuliahan`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `preferensi`
--
ALTER TABLE `preferensi`
  ADD PRIMARY KEY (`id_preferensi`),
  ADD KEY `id_dosen` (`nip`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `user_role_id` (`user_role_id`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indexes for table `ruangan_seminar`
--
ALTER TABLE `ruangan_seminar`
  ADD PRIMARY KEY (`id_slot`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_url`
--
ALTER TABLE `tb_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`kode_waktu`),
  ADD UNIQUE KEY `kode_jam` (`kode_jam`),
  ADD UNIQUE KEY `id_hari` (`id_hari`),
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baru_jadwaldosen`
--
ALTER TABLE `baru_jadwaldosen`
  MODIFY `kode_jadwaldosen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen_additional`
--
ALTER TABLE `dosen_additional`
  MODIFY `id_additional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_penjadwalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
  MODIFY `id_perkuliahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `preferensi`
--
ALTER TABLE `preferensi`
  MODIFY `id_preferensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ruangan_seminar`
--
ALTER TABLE `ruangan_seminar`
  MODIFY `id_slot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_url`
--
ALTER TABLE `tb_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `kode_waktu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Constraints for table `dosen_additional`
--
ALTER TABLE `dosen_additional`
  ADD CONSTRAINT `dosen_additional_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `mengajar_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `mengajar_ibfk_5` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`);

--
-- Constraints for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`id_mengajar`) REFERENCES `mengajar` (`id_mengajar`),
  ADD CONSTRAINT `penjadwalan_ibfk_2` FOREIGN KEY (`id_preferensi`) REFERENCES `preferensi` (`id_preferensi`),
  ADD CONSTRAINT `penjadwalan_ibfk_3` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `penjadwalan_ibfk_4` FOREIGN KEY (`id_perkuliahan`) REFERENCES `perkuliahan` (`id_perkuliahan`),
  ADD CONSTRAINT `penjadwalan_ibfk_5` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD CONSTRAINT `perkuliahan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`),
  ADD CONSTRAINT `perkuliahan_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`);

--
-- Constraints for table `preferensi`
--
ALTER TABLE `preferensi`
  ADD CONSTRAINT `preferensi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `preferensi_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`user_role_id`),
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
