-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2020 pada 04.32
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

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
-- Struktur dari tabel `dosen`
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
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_depan`, `nama_belakang`, `kode_dosen`, `username`, `email`, `password`, `id_status`) VALUES
(1, 'Administator', '', 'ADM', 'admin', 'admin@admin.com', '7aec9d92c71acd6680c8da9f1c746da7', 0),
(1103164005, 'Novansyah', 'Herman', 'NVN', 'novansyah', 'novansyah21@gmail.com', '969c56257d8a3a6892458e57dfbcceff', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_additional`
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
-- Dumping data untuk tabel `dosen_additional`
--

INSERT INTO `dosen_additional` (`id_additional`, `nip`, `jab_fungsional`, `jab_struktural`, `kota_asal`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
(14, 1, '', '', '', '', '', ''),
(15, 1103164005, 'Pengawas', 'Pengawis', 'Jakarta', '02-11-1997', 'Jl. Kapuk Kayu Besar RT.006/011 No.61 , Cengkareng Timur', '081367542285');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL,
  `kode_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `id_gedung`, `nama_fakultas`, `kode_fakultas`) VALUES
(4, 1, 'Fakultas Teknik Elektro', 'FTE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gedung`
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
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hari`
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
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `kode_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_fakultas`, `nama_jurusan`, `kode_jurusan`) VALUES
(6, 4, 'S1 Teknik Komputer', 'TK'),
(7, 4, 'S1 Teknik Elektro', 'TE'),
(8, 4, 'S1 Teknik Fisika', 'TF'),
(9, 4, 'S1 Teknik Telekomunikasi', 'TT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `dosen_wali` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jurusan`, `nama_kelas`, `angkatan`, `dosen_wali`) VALUES
(2, 6, 'TK-40-05', 2016, 'FSM'),
(18, 6, 'TK-40-02', 2016, 'BRH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `kode_matkul` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `kode_matkul`, `sks`) VALUES
(11, 'Bahasa Indonesia', 'LUH1A2', 3),
(12, 'Bahasa Inggris I', 'LUH1B2', 3),
(13, 'Pendidikan dan Kewarganeagaran', 'HUH1G3', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE `mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan`
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
-- Struktur dari tabel `perkuliahan`
--

CREATE TABLE `perkuliahan` (
  `id_perkuliahan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perkuliahan`
--

INSERT INTO `perkuliahan` (`id_perkuliahan`, `id_fakultas`, `angkatan`, `id_matkul`) VALUES
(1, 4, 2020, 11),
(2, 4, 2020, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `preferensi`
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
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id_role`, `nip`, `user_role_id`) VALUES
(5, 1103164005, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `id_gedung`, `kapasitas`) VALUES
(18, 'KU3.03.01', 1, 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(0, 'admin'),
(1, 'akun baru'),
(2, 'akun terbuat'),
(3, 'sudah dijadwalkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_roles`
--

INSERT INTO `user_roles` (`user_role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `dosen_additional`
--
ALTER TABLE `dosen_additional`
  ADD PRIMARY KEY (`id_additional`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indeks untuk tabel `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_dosen` (`nip`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indeks untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_penjadwalan`),
  ADD KEY `id_mengajar` (`id_mengajar`),
  ADD KEY `id_preferensi` (`id_preferensi`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_perkuliahan` (`id_perkuliahan`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD PRIMARY KEY (`id_perkuliahan`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indeks untuk tabel `preferensi`
--
ALTER TABLE `preferensi`
  ADD PRIMARY KEY (`id_preferensi`),
  ADD KEY `id_dosen` (`nip`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `user_role_id` (`user_role_id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen_additional`
--
ALTER TABLE `dosen_additional`
  MODIFY `id_additional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_penjadwalan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perkuliahan`
--
ALTER TABLE `perkuliahan`
  MODIFY `id_perkuliahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `preferensi`
--
ALTER TABLE `preferensi`
  MODIFY `id_preferensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `dosen_additional`
--
ALTER TABLE `dosen_additional`
  ADD CONSTRAINT `dosen_additional_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  ADD CONSTRAINT `mengajar_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `mengajar_ibfk_5` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`);

--
-- Ketidakleluasaan untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`id_mengajar`) REFERENCES `mengajar` (`id_mengajar`),
  ADD CONSTRAINT `penjadwalan_ibfk_2` FOREIGN KEY (`id_preferensi`) REFERENCES `preferensi` (`id_preferensi`),
  ADD CONSTRAINT `penjadwalan_ibfk_3` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `penjadwalan_ibfk_4` FOREIGN KEY (`id_perkuliahan`) REFERENCES `perkuliahan` (`id_perkuliahan`),
  ADD CONSTRAINT `penjadwalan_ibfk_5` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `perkuliahan`
--
ALTER TABLE `perkuliahan`
  ADD CONSTRAINT `perkuliahan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`),
  ADD CONSTRAINT `perkuliahan_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `matkul` (`id_matkul`);

--
-- Ketidakleluasaan untuk tabel `preferensi`
--
ALTER TABLE `preferensi`
  ADD CONSTRAINT `preferensi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`),
  ADD CONSTRAINT `preferensi_ibfk_2` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`);

--
-- Ketidakleluasaan untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`user_role_id`),
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Ketidakleluasaan untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD CONSTRAINT `ruangan_ibfk_1` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id_gedung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
