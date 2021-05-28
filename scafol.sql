-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 02:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scafol`
--

-- --------------------------------------------------------

--
-- Table structure for table `balas_komentar`
--

CREATE TABLE `balas_komentar` (
  `id_balas_komentar` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `img` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id_diskusi` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `title` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(24) NOT NULL,
  `image` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id_diskusi`, `username`, `title`, `deskripsi`, `kategori`, `image`, `file`, `created_at`, `updated_at`) VALUES
(7, 'user', ' Tantangan pencatatan dan penjangkauan pada kelompok tertentu', 'Pemerintah Indonesia sudah berkomitmen untuk memberikan dokumen kependudukan kepada seluruh penduduk tanpa terkecuali. Dokumen kependudukan tersebut di antaranya adalah Kartu Tanda Penduduk, Kartu Keluarga, Akta Kelahiran, Akta Perkawinan, Akta Kematian, dan memberikan Nomor Induk Kependudukan (NIK). Administrasi kependudukan (adminduk) yang inklusif dan akuntabel akan mendukung pelayanan dasar yang lebih baik dan alokasi sumber daya yang berbasis data. Data penduduk yang berkualitas akan menjamin perencanaan pembangunan yang lebih efektif, dan sebaliknya perencanaan pembangunan yang efektif akan menghasilkan data yang berkualitas.', 'bangunan', '', '', '2021-05-28 14:32:30', '0000-00-00 00:00:00'),
(8, 'user', 'Akibat terhambatnya akses, akibat layanan yang tidak responsif, dan akibat identitas sosial', 'Adminduk yang inklusif dan akuntabel harus dapat menghitung dan mencatat semua orang dan setiap peristiwa penting (kepindahan, kelahiran, dan kematian). Masalahnya, sistem administrasi kependudukan masih menghadapi tantangan pencatatan & penjangkauan pada kelompok tertentu, antara lain anak-anak, penduduk miskin, penduduk dengan status perkawinan tertentu, dan penduduk berkebutuhan khusus. Berdasarkan data SUSENAS 2019, masih ada 7.5 juta anak yang tidak memiliki NIK dan ada 8 juta anak yang belum memiliki akta kelahiran. Cakupan pencatatan penduduk masih mengalami ketimpangan dan kerentanan. Meskipun cakupan akta kelahiran sudah mencapai target 85%, namun angkanya masih rendah untuk anak yang lebih muda. Pada keluarga miskin tingkat cakupan akta kelahiran juga masih timpang dibandingkan dengan keluarga dengan tingkat ekonomi yang lebih tinggi. Cakupan akta kelahiran di wilayah pedesaan juga masih rendah dibandingkan di perkotaan. Selain itu, kerentanan juga ditemukan pada perkawinan yang tidak tercatatkan, khususnya dalam kelompok miskin. Anak dari orang tua dengan disabilitas fisik juga memiliki kemungkinan lebih kecil untuk memiliki akta kelahiran.  Kebijakan kependudukan harus secara spesifik menangani kelompok rentan tersebut.', 'bangunan', '', '', '2021-05-28 14:33:23', '0000-00-00 00:00:00'),
(9, 'user', 'mekanisme pengaduan untuk memperkuat akuntabilitas sosial', 'Studi ini menyisakan beberapa pertanyaan penting: Ada berapa banyak masyarakat rentan dalam administrasi kependudukan? Lalu, kelompok rentan ini menjadi tanggung jawab siapa? Kerentanan adminduk ini sangat erat kaitannya dengan kerentanan sosial, apakah artinya ini juga menjadi tanggung jawab kementerian sosial? Menurut Omas Bulan Samosir, penting bagi pemerintah untuk berinisiatif menjemput bola, dengan petugas dukcapil mendatangi kelompok rentan secara langsung. Laporan penduduk dengan bottom-up strategy, perlu mendorong fasilitator kependudukan di desa untuk kembali dihidupkan. Terakhir, perlu ada peningkatan implementasi Sistem Informasi Administrasi Kependudukan (SIAK) untuk meningkatkan inklusivitas kelompok rentan dalam adminduk.', 'jalan', '', '', '2021-05-28 14:34:13', '0000-00-00 00:00:00'),
(10, 'reza', 'Negara akan punah ', 'no desc', 'jembatan', '', '', '2021-05-28 19:21:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `komentar_user` text NOT NULL,
  `img` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_diskusi`, `username`, `komentar_user`, `img`, `file`, `created_at`, `updated_at`) VALUES
(14, 7, 'bagus', 'cek', '', '', '2021-05-28 18:48:39', '0000-00-00 00:00:00'),
(15, 7, 'reza', 'Oke siap pak', '', '', '2021-05-28 19:14:27', '0000-00-00 00:00:00'),
(16, 10, 'reza', 'hahaha ', '', '', '2021-05-28 19:21:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `filename` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `lokasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `password` varchar(128) NOT NULL,
  `jabatan` varchar(24) NOT NULL,
  `divisi` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `nohp`, `password`, `jabatan`, `divisi`, `created_at`, `updated_at`) VALUES
(1, 'user', 'Kurnia Sandi Pratama', 'sandiptma@gmail.com', '081368220266', 'user', '', '', '2021-05-28 10:04:21', '0000-00-00 00:00:00'),
(2, 'dinitri', 'Dini Tri Utami', 'dini@mail.com', '', 'dini123', '', '', '2021-05-28 18:15:03', '0000-00-00 00:00:00'),
(3, 'andrika', 'Andrika Mulki Aziz', 'andrika@mail.com', '', 'andrika', '', '', '2021-05-28 18:20:03', '0000-00-00 00:00:00'),
(4, 'reza', 'Reza Pahevi', 'reza@mail.com', '', 'reza', '', '', '2021-05-28 18:20:59', '0000-00-00 00:00:00'),
(5, 'raziq', 'Raziq Hanani', 'raziq@mail.com', '', 'raziq', '', '', '2021-05-28 18:21:49', '0000-00-00 00:00:00'),
(6, 'bagus', 'Bagus Mabduh', 'bagus@mail.com', '', 'bagus', '', '', '2021-05-28 18:24:10', '0000-00-00 00:00:00'),
(7, 'rizkiade', 'Rizki Ade N', 'rizkiade@mail.com', '', 'rizkiade', '', '', '2021-05-28 18:25:09', '0000-00-00 00:00:00'),
(8, 'bima', 'Bima Santoso', 'bima@mail.com', '', 'bima', '', '', '2021-05-28 18:26:51', '0000-00-00 00:00:00'),
(9, 'kurnia', 'Kurnia Mega', 'kurnia@mail.com', '', 'kurnia', '', '', '2021-05-28 18:29:22', '0000-00-00 00:00:00'),
(10, 'sari', 'Sari Mulia', 'sari@mail.com', '', 'sari', '', '', '2021-05-28 18:30:10', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balas_komentar`
--
ALTER TABLE `balas_komentar`
  ADD PRIMARY KEY (`id_balas_komentar`),
  ADD KEY `id_diskusi_balas_komen` (`id_diskusi`),
  ADD KEY `id_komentar_balas` (`id_komentar`),
  ADD KEY `username_balas_komen` (`username`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id_diskusi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_diskusi` (`id_diskusi`),
  ADD KEY `username_komen` (`username`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balas_komentar`
--
ALTER TABLE `balas_komentar`
  MODIFY `id_balas_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balas_komentar`
--
ALTER TABLE `balas_komentar`
  ADD CONSTRAINT `id_diskusi_balas_komen` FOREIGN KEY (`id_diskusi`) REFERENCES `diskusi` (`id_diskusi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_komentar_balas` FOREIGN KEY (`id_komentar`) REFERENCES `komentar` (`id_komentar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username_balas_komen` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `id_diskusi` FOREIGN KEY (`id_diskusi`) REFERENCES `diskusi` (`id_diskusi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username_komen` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
