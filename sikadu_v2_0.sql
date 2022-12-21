-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2022 pada 10.28
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikadu_v2.0`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(4) NOT NULL,
  `id_fakultas` int(2) DEFAULT NULL,
  `NIP` varchar(16) NOT NULL,
  `gelar_depan` char(10) DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `gelar_belakang` char(10) DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_fakultas`, `NIP`, `gelar_depan`, `nama`, `gelar_belakang`, `jenis_kelamin`, `alamat`) VALUES
(1, 1, '1609050607030002', 'Drs', 'Ilham Faturohman', 'M.KOM', 'Pria', 'Jl.Jamet Kp.Barzah Kota Serang Banten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `Id_fakultas` int(2) NOT NULL,
  `Nama_fakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`Id_fakultas`, `Nama_fakultas`) VALUES
(1, 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kbm`
--

CREATE TABLE `kbm` (
  `id_kbm` int(3) NOT NULL,
  `id_matakuliah` int(3) DEFAULT NULL,
  `id_dosen` int(4) DEFAULT NULL,
  `id_mahasiswa` int(4) DEFAULT NULL,
  `pertemuan` int(2) NOT NULL,
  `ruang` char(3) NOT NULL,
  `jam` varchar(16) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kbm`
--

INSERT INTO `kbm` (`id_kbm`, `id_matakuliah`, `id_dosen`, `id_mahasiswa`, `pertemuan`, `ruang`, `jam`, `kode`) VALUES
(1, 1, 1, 1, 1, 'A25', '13.00-15.00 WIB', '21690');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(4) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `NIM` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `nomor_telpon` varchar(14) NOT NULL,
  `alamat` text DEFAULT NULL,
  `id_fakultas` int(2) DEFAULT NULL,
  `id_prodi` int(2) DEFAULT NULL,
  `Jenjang` enum('S1','D3') NOT NULL,
  `kelas` enum('Reguler','Non Reguler') NOT NULL,
  `kelompok` int(2) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `NIK`, `NIM`, `nama`, `email`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nomor_telpon`, `alamat`, `id_fakultas`, `id_prodi`, `Jenjang`, `kelas`, `kelompok`, `status`) VALUES
(1, '1609040207080003', '1101211060', 'Nanang Wahyudi', 'nanangwahyudi@unbaja.ac.id', 'Tanjung Harapan', '2003-05-22', 'Pria', '082175970030', 'Jl.Amal Kp.Surga Kota Serang Banten', 1, 1, 'S1', 'Reguler', 2, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int(3) NOT NULL,
  `nama_matkul` varchar(30) NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `nama_matkul`, `sks`) VALUES
(1, 'Pemrograman Database', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(2) NOT NULL,
  `id_fakultas` int(2) NOT NULL,
  `nama_fakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_fakultas`) VALUES
(1, 1, 'Teknik Informatika');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `NIP` (`NIP`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`Id_fakultas`);

--
-- Indeks untuk tabel `kbm`
--
ALTER TABLE `kbm`
  ADD PRIMARY KEY (`id_kbm`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD UNIQUE KEY `NIM` (`NIM`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `Id_fakultas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kbm`
--
ALTER TABLE `kbm`
  MODIFY `id_kbm` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`Id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kbm`
--
ALTER TABLE `kbm`
  ADD CONSTRAINT `kbm_ibfk_1` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id_matakuliah`),
  ADD CONSTRAINT `kbm_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `kbm_ibfk_3` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`Id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`Id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
