-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 05:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `file_buku` varchar(100) NOT NULL,
  `cover_buku` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul`, `id_kategori`, `deskripsi`, `jumlah`, `file_buku`, `cover_buku`, `id_user`) VALUES
(5034, 'Buku Dasar-Dasar Teknik Informatika', 600, 'Mempelajari dasar-dasar informatika itu terlebih dahulu. Kamu bisa membaca buku ajar karya Novega Pratama Adiputra. Setidaknya di buku ini kamu akan berkenalan dan belajar tentang pengolahahan data, pemprosesan data, penyimpanan data, manipulasi data dan ', 5, 'Rangkuman_Nilai_Putra_Mauluddien_Jumena_51421185_TTD.pdf', 'Dasar-dasar-Teknik-Informatika.jpg', 1006),
(5035, 'Buku Pengantar Teknologi Informasi', 600, 'Untuk pembuka dalam mata kuliah dibeberapa jurusan. Mulai dari jurusan organisasi komputer, maintenance, kemanan, arsitektur komputer, sistem operasi, jaringan dan masih banak lagi.', 3, 'Rangkuman_Nilai_Putra_Mauluddien_Jumena_51421185_TTD1.pdf', 'Pengantar-Teknologi-Informasi-depan.jpg', 1006),
(5036, 'Buku Metode Penelitian Teknik Informatika', 600, 'Buku ini memang cocok untuk mahasiswa akhir semester atau mahasiswa yang sedang melakukan penelitian. Kelebihan dari buku terbitan Deepublish satu ini ternyata juga memberikan materi pedoman umum sekaligus form pendukung untuk penelitian kamu loh.', 3, 'Rangkuman_Nilai_Putra_Mauluddien_Jumena_51421185_TTD2.pdf', 'Metode-Penelitian-Teknik-Informatika.jpg', 1006),
(5037, 'Buku Komputer Cerdas Untuk Mahasiswa Teknik Infor2', 600, 'Jadi secara garis besar, kamu akan belajar kecerdasan teknologi dalam mengerjakan tugasnya seperti layaknya kecerdasan otak manusia. Itu sebabnya teknologi informasi disebut sebagai kecerdasan buatan.', 8, 'Rangkuman_Nilai_Putra_Mauluddien_Jumena_51421185_TTD3.pdf', 'Komputer-Cerdas.jpg', 1001),
(5038, 'Buku Pengantar Teknologi Informatika Dan Komunikas', 600, 'Buku yang ditulis oleh Bagaskoro, S.Kom., M.M ini mengulas tentang konsep-konsep dalam teknologi informasi dan komunikasi. Ada juga tentang perangkat kerasnya serta dasar-dasar atau pengantar konsep digital.', 6, 'Rangkuman_Nilai_Putra_Mauluddien_Jumena_51421185_TTD4.pdf', 'Pengantar-Teknologi-Informatika-dan-Komunikasi.jpg', 1),
(5039, 'Buku Aplikasi Komputer', 600, 'Dari isinya memang buku ini ditujukan untuk pemula yang baru belajar tentang komputer, terutama yang berhubungan dengan aplikasi komputer. Salah satu aplikasi komputer paling dasar adalah Microsoft Office. Di buku yang satu ini kamu bisa mendapatkan mater', 7, 'Rangkuman_Nilai_Putra_Mauluddien_Jumena_51421185_TTD5.pdf', 'Buku-Ajar-Aplikasi-Komputer.jpg', 1),
(5040, 'Buku Filosofi Teras', 950, 'Filosofi Teras adalah sebuah buku pengantar filsafat Stoa yang dibuat khusus sebagai panduan moral anak muda. Buku ini ditulis untuk menjawab permasalahan tentang tingkat kekhawatiran yang cukup tinggi dalam skala nasional, terutama yang dialami oleh anak', 10, 'Sertifikat_Putra_Mauluddien_Jumena.pdf', 'filosofi-teras.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(600, 'Teknologi'),
(900, 'Sejarah'),
(950, 'Nonfiksi'),
(960, 'Fiksi'),
(962, 'Anime'),
(964, 'Psikologi'),
(965, 'Musik'),
(966, 'Biologi'),
(967, 'Kimia'),
(968, 'Fisika'),
(969, 'Kutipan'),
(970, 'Epistimologi'),
(971, 'Sains'),
(972, 'Matematika'),
(973, 'Astronomi'),
(974, 'Tanaman'),
(975, 'Teknik'),
(976, 'Pertanian'),
(977, 'Seni'),
(978, 'Lukisan'),
(979, 'Olahraga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(60) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `last_login` date NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `no_hp`, `alamat`, `username`, `password`, `last_login`, `level`) VALUES
(1, 'Putra Mauluddien Jumena', '085156234415', 'Jl Mayor Idrus, Tapos, Depok', 'putra', '1', '2024-01-03', 'admin'),
(1001, 'Davindra Mahesa Gunawan', '089529844721', 'Jakarta Timur', 'davin', '1', '2024-01-03', 'user'),
(1006, 'Admin1', '123123', 'asdas', '1', '1', '2024-01-03', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5041;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=981;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
