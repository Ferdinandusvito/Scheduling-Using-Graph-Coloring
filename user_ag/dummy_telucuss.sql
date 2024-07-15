-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2020 pada 10.50
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummy_telucuss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_user` varchar(11) NOT NULL,
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `level` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `user`, `pass`, `level`) VALUES
('A001', 'admin', 'admin', 'Admin'),
('A002', 'user', 'user', 'User'),
('D001', 'dosen1', 'dosen1', 'Dosen'),
('D002', 'dosen2', 'dosen2', 'Dosen'),
('D003', 'dosen3', 'dosen3', 'Dosen'),
('D004', 'dosen4', 'dosen4', 'Dosen'),
('D005', 'dosen5', 'dosen5', 'Dosen'),
('RLC', 'roswanlc', 'roswanlc', 'Dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `kode_dosen` varchar(256) NOT NULL,
  `nama_dosen` varchar(256) DEFAULT '',
  `keterangan` varchar(256) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`kode_dosen`, `nama_dosen`, `keterangan`) VALUES
('D001', 'Dosen 01', ''),
('D002', 'Dosen 02', ''),
('D003', 'Dosen 03', ''),
('D004', 'Dosen 04', ''),
('D005', 'Dosen 05', ''),
('RLC', 'Roswan Latuconsina', 'Dosen Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hari`
--

CREATE TABLE `tb_hari` (
  `kode_hari` varchar(256) NOT NULL,
  `nama_hari` varchar(256) NOT NULL DEFAULT '',
  `keterangan` varchar(256) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hari`
--

INSERT INTO `tb_hari` (`kode_hari`, `nama_hari`, `keterangan`) VALUES
('H01', 'Senin', ''),
('H02', 'Selasa', ''),
('H03', 'Rabu', ''),
('H04', 'Kamis', ''),
('H05', 'Jumat', ''),
('H06', 'Sabtu', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `kuliah` int(11) NOT NULL,
  `ruang` int(11) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jam`
--

CREATE TABLE `tb_jam` (
  `kode_jam` varchar(256) NOT NULL,
  `nama_jam` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jam`
--

INSERT INTO `tb_jam` (`kode_jam`, `nama_jam`) VALUES
('01', '07:30:00'),
('02', '09:00:00'),
('03', '10:30:00'),
('04', '12:00:00'),
('05', '13:30:00'),
('06', '15:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kode_kelas` varchar(256) NOT NULL,
  `nama_kelas` varchar(256) NOT NULL DEFAULT '',
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`kode_kelas`, `nama_kelas`, `keterangan`) VALUES
('1', 'Kelas A', NULL),
('2', 'Kelas B', NULL),
('3', 'Kelas C', NULL),
('4', 'Kelas D', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kuliah`
--

CREATE TABLE `tb_kuliah` (
  `kode_kuliah` int(11) NOT NULL,
  `kode_matkul` varchar(256) DEFAULT NULL,
  `kode_hari` varchar(256) DEFAULT NULL,
  `kode_dosen` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kuliah`
--

INSERT INTO `tb_kuliah` (`kode_kuliah`, `kode_matkul`, `kode_hari`, `kode_dosen`) VALUES
(1, 'MK001', 'H01', 'D001'),
(2, 'MK002', 'H01', 'D001'),
(3, 'MK003', 'H01', 'D001'),
(4, 'MK004', 'H01', 'D002'),
(7, 'MK001', 'H02', 'D003'),
(8, 'MK002', 'H02', 'D003'),
(9, 'MK003', 'H02', 'D003'),
(10, 'MK004', 'H02', 'D004'),
(13, 'MK001', 'H03', 'D005'),
(14, 'MK002', 'H03', 'D005'),
(15, 'MK003', 'H03', 'D005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `kode_matkul` varchar(256) NOT NULL,
  `nama_matkul` varchar(256) NOT NULL DEFAULT '',
  `sks` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_matkul`
--

INSERT INTO `tb_matkul` (`kode_matkul`, `nama_matkul`, `sks`) VALUES
('MK001', 'Matkul 1', 3),
('MK002', 'Matkul 2', 2),
('MK003', 'Matkul 3', 3),
('MK004', 'Matkut 4', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `kode_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(256) NOT NULL DEFAULT '',
  `keterangan` varchar(256) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruang`
--

INSERT INTO `tb_ruang` (`kode_ruang`, `nama_ruang`, `keterangan`) VALUES
(1, 'Ruang 1', ''),
(2, 'Ruang 2', ''),
(3, 'Ruang 3', ''),
(4, 'Ruang 4', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_url`
--

CREATE TABLE `tb_url` (
  `id` int(11) NOT NULL,
  `site_url` text,
  `base_url` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_url`
--

INSERT INTO `tb_url` (`id`, `site_url`, `base_url`) VALUES
(1, 'http://localhost/ag-dosen-ci/index.php', 'http://localhost/ag-dosen-ci/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_waktu`
--

CREATE TABLE `tb_waktu` (
  `kode_waktu` int(11) NOT NULL,
  `kode_kelas` varchar(256) NOT NULL DEFAULT '0',
  `kode_jam` varchar(256) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_waktu`
--

INSERT INTO `tb_waktu` (`kode_waktu`, `kode_kelas`, `kode_jam`) VALUES
(1, '1', '01'),
(3, '1', '03'),
(4, '1', '04'),
(5, '1', '05'),
(6, '2', '02'),
(7, '2', '01'),
(8, '2', '03'),
(9, '2', '04'),
(10, '2', '05'),
(11, '3', '01'),
(12, '3', '02'),
(13, '3', '03'),
(14, '3', '04'),
(15, '3', '05'),
(16, '4', '01'),
(17, '4', '02'),
(18, '4', '03'),
(19, '4', '04'),
(20, '4', '05'),
(31, '1', '06'),
(32, '2', '06'),
(33, '3', '06'),
(34, '4', '06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`,`user`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`kode_dosen`);

--
-- Indeks untuk tabel `tb_hari`
--
ALTER TABLE `tb_hari`
  ADD PRIMARY KEY (`kode_hari`);

--
-- Indeks untuk tabel `tb_jam`
--
ALTER TABLE `tb_jam`
  ADD PRIMARY KEY (`kode_jam`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `tb_kuliah`
--
ALTER TABLE `tb_kuliah`
  ADD PRIMARY KEY (`kode_kuliah`);

--
-- Indeks untuk tabel `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indeks untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- Indeks untuk tabel `tb_url`
--
ALTER TABLE `tb_url`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_waktu`
--
ALTER TABLE `tb_waktu`
  ADD PRIMARY KEY (`kode_waktu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kuliah`
--
ALTER TABLE `tb_kuliah`
  MODIFY `kode_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `kode_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_url`
--
ALTER TABLE `tb_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_waktu`
--
ALTER TABLE `tb_waktu`
  MODIFY `kode_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
