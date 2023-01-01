-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sikadu_v2.0
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dosen` (
  `id_dosen` int NOT NULL AUTO_INCREMENT,
  `id_fakultas` int DEFAULT NULL,
  `nip` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `gelar_depan` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_dosen` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `gelar_belakang` char(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `NIP` (`nip`),
  KEY `id_fakultas` (`id_fakultas`),
  CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (3,4,'1609030405020002','Dr','Epi Safitri','S.pd','Wanita','Kota Serang Banten'),(4,1,'1608030704050001','ir','Sahrul Rosadi','M.Kom','Pria','Pandeglang, Banten'),(5,3,'1608030601030005','prof','M. Faqih Rahman','M.T','Pria','Kota Serang, Banten'),(6,1,'1609030204070004','','Ilham Faturohman','S.Kom, M.TI','Pria','Kota Serang, Banten');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fakultas`
--

DROP TABLE IF EXISTS `fakultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fakultas` (
  `id_fakultas` int NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fakultas`
--

LOCK TABLES `fakultas` WRITE;
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` VALUES (1,'Ilmu Komputer'),(3,'Teknik'),(4,'Ilmu Pendidikan Keguruan Dan Kesehatan');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kbm`
--

DROP TABLE IF EXISTS `kbm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kbm` (
  `id_kbm` int NOT NULL AUTO_INCREMENT,
  `id_matakuliah` int DEFAULT NULL,
  `id_dosen` int DEFAULT NULL,
  `id_mahasiswa` int DEFAULT NULL,
  `pertemuan` int NOT NULL,
  `ruang` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `jam` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `kode` int NOT NULL,
  PRIMARY KEY (`id_kbm`),
  KEY `id_matakuliah` (`id_matakuliah`),
  KEY `id_dosen` (`id_dosen`),
  KEY `id_mahasiswa` (`id_mahasiswa`),
  CONSTRAINT `kbm_ibfk_1` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id_matakuliah`),
  CONSTRAINT `kbm_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `kbm_ibfk_3` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kbm`
--

LOCK TABLES `kbm` WRITE;
/*!40000 ALTER TABLE `kbm` DISABLE KEYS */;
INSERT INTO `kbm` VALUES (3,4,5,4,2,'Lab.Kom-1','09:45-11:30 WIB',12098),(4,1,6,2,5,'A.25','08:00-9:45 WIB',12095),(5,5,3,3,4,'A.22','9:45-11:30 WIB',12874);
/*!40000 ALTER TABLE `kbm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `npm` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_mhs` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_telpon` varchar(14) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `id_fakultas` int DEFAULT NULL,
  `id_prodi` int DEFAULT NULL,
  `jenjang` enum('S1','D3') COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` enum('Reguler','Non Reguler') COLLATE utf8mb4_general_ci NOT NULL,
  `kelompok` int NOT NULL,
  `status_mhs` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  UNIQUE KEY `NIK` (`nik`),
  UNIQUE KEY `NIM` (`npm`),
  KEY `id_prodi` (`id_prodi`),
  KEY `id_fakultas` (`id_fakultas`),
  CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (2,'1608040305020001','1101211039','Samsul Aimah','samsulspeed@gmail.com','Karawang','2022-12-01','Pria','095798731245','Karawang, Jawa Barat',1,1,'S1','Reguler',2,'Aktif'),(3,'1609040203040006','1101211080','Fadila Pristisia Afiani','fadila@gmail.com','Kota Serang','2022-12-01','Wanita','085612459875','Kota Serang, Banten',4,4,'S1','Reguler',3,'Aktif'),(4,'1609040205080002','1101211060','Nanang Wahyudi','nanang@gmail.com','Tanjung Harapan','2023-01-01','Pria','082387450982','Kota Serang, Banten',3,5,'S1','Non Reguler',5,'Aktif');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matakuliah`
--

DROP TABLE IF EXISTS `matakuliah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matakuliah` (
  `id_matakuliah` int NOT NULL AUTO_INCREMENT,
  `nama_matkul` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `sks` int NOT NULL,
  PRIMARY KEY (`id_matakuliah`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matakuliah`
--

LOCK TABLES `matakuliah` WRITE;
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
INSERT INTO `matakuliah` VALUES (1,'Pemrograman Database',3),(3,'Aljabar Linear',2),(4,'Kalkulus I',2),(5,'Akuntansi Dasar I',3);
/*!40000 ALTER TABLE `matakuliah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodi` (
  `id_prodi` int NOT NULL AUTO_INCREMENT,
  `id_fakultas` int NOT NULL,
  `nama_prodi` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `id_fakultas` (`id_fakultas`),
  CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi`
--

LOCK TABLES `prodi` WRITE;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` VALUES (1,1,'Teknik Informatika'),(4,4,'Akuntansi'),(5,3,'Teknik Sipil');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-01 16:52:22
