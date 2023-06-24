-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 02:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Jamal', 'admin', 'admin', '1352025327_avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `diskusi_id` int(11) NOT NULL,
  `diskusi_posting` int(11) NOT NULL,
  `diskusi_tanggal` datetime NOT NULL,
  `diskusi_member` int(11) NOT NULL,
  `diskusi_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`diskusi_id`, `diskusi_posting`, `diskusi_tanggal`, `diskusi_member`, `diskusi_isi`) VALUES
(16, 7, '2023-06-24 14:53:41', 13, '<p>Infonya singkat dan jelas</p>'),
(17, 11, '2023-06-24 14:54:37', 14, '<p>Wow bermanfaat sekali bang</p>');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Tidak Berkategori'),
(14, 'Internet Marketing'),
(15, 'Pemrograman Web'),
(16, 'Designer'),
(19, 'Android & Ios Developer'),
(20, 'Sosial Media'),
(21, 'Hacking');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_nama` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_hp` varchar(20) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_alamat` text NOT NULL,
  `member_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_nama`, `member_email`, `member_hp`, `member_password`, `member_alamat`, `member_foto`) VALUES
(13, 'Aveee', 'averroes0309@gmail.com', '08123445689', 'rahasia', 'Jakarta Utara', '790594709_WhatsApp Image 2023-06-24 at 2.17.53 PM.jpeg'),
(14, 'Itqan', 'm.itqanyrachman@student.ub.ac.id', '081390225242', 'rahasia', 'Rajasa Residence', '319092911_pantai.jpg'),
(15, 'umi kurniati', 'umikurniati24@gmail.com', '0895396625361', '1234567890', 'Jl. Dieng Atas No.96', '723904130_WhatsApp Image 2023-06-24 at 2.12.58 PM.jpeg'),
(16, 'Nurwandhika Rachman', 'nurwan.dhika.rachman@gmail.com', '087889988034', 'kaisers123', 'Jl. Pepaya Raya No. 279, Depok Jaya, Depok', '453706401_WhatsApp Image 2023-06-24 at 2.13.27 PM.jpeg'),
(18, 'Cahya', 'cahyaps@student.ub.ac.id', '08123456789', 'rahasia', 'Jl. Soekarno Hatta', '172694270_WhatsApp Image 2023-06-24 at 2.13.55 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `posting_id` int(11) NOT NULL,
  `posting_tanggal` datetime NOT NULL,
  `posting_member` int(11) NOT NULL,
  `posting_kategori` int(11) NOT NULL,
  `posting_judul` varchar(255) NOT NULL,
  `posting_isi` text NOT NULL,
  `posting_dibaca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`posting_id`, `posting_tanggal`, `posting_member`, `posting_kategori`, `posting_judul`, `posting_isi`, `posting_dibaca`) VALUES
(7, '2023-06-23 16:23:33', 14, 15, 'Bagaimana melakukan delete foreign key table', 'Menggunakan fitur Cascade pada SQL-nya', 6),
(8, '2023-06-24 14:45:11', 13, 16, 'Cara melakukan Usability Testing', '<p>Langkah-langkah utama dalam Usability Testing adalah menetapkan tujuan, memilih peserta, membuat skenario tugas, melakukan sesi pengujian, mengamati dan mencatat, mendapatkan tanggapan peserta, menganalisis hasil, membuat laporan, dan mengambil tindakan perbaikan.<br></p>', 0),
(9, '2023-06-24 14:47:49', 18, 14, 'Strategi Pemasaran Digital', '<p>Strategi pemasaran digital dapat disesuaikan dengan kebutuhan dan tujuan bisnis Anda. Penting untuk memahami audiens target Anda, mengukur hasil kampanye, dan melakukan penyesuaian berdasarkan analisis data untuk mencapai keberhasilan pemasaran digital yang lebih baik.<br></p>', 0),
(10, '2023-06-24 14:50:22', 15, 21, 'Menjaga Keamanan Data Pribadi', '<p>Menjaga keamanan data adalah hal yang sangat penting dalam dunia digital. Berikut ini adalah beberapa langkah singkat untuk menjaga keamanan data:</p><p>- Gunakan kata sandi yang kuat: Gunakan kombinasi kata sandi yang kuat, yang terdiri dari huruf (huruf besar dan kecil), angka, dan simbol. Hindari kata sandi yang mudah ditebak atau terkait dengan informasi pribadi.</p><p>- Perbarui perangkat lunak dengan patch keamanan: Pastikan sistem operasi, perangkat lunak, dan aplikasi yang Anda gunakan selalu diperbarui dengan patch keamanan terbaru. Patch ini mengatasi kerentanan yang ditemukan dalam perangkat lunak tersebut.</p>', 0),
(11, '2023-06-24 14:52:43', 16, 20, 'Peran Sosial Media pada Masyarakat', '<p>Sosial media memiliki peran yang signifikan dalam masyarakat modern. Berikut ini adalah beberapa peran sosial media secara singkat:</p><p>- Komunikasi dan konektivitas: Sosial media memungkinkan orang untuk berkomunikasi dengan mudah dan cepat, terlepas dari jarak geografis. Masyarakat dapat terhubung satu sama lain, berbagi pemikiran, ide, dan informasi dalam waktu nyata.</p><p>- Berbagi informasi: Sosial media menjadi platform utama untuk berbagi informasi, berita, dan pengetahuan. Orang dapat mengakses berbagai topik dan memperoleh informasi terkini dengan cepat melalui berbagai kanal media sosial.</p>', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `reply_diskusi` int(11) NOT NULL,
  `reply_tanggal` datetime NOT NULL,
  `reply_member` int(11) NOT NULL,
  `reply_isi` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `reply_diskusi`, `reply_tanggal`, `reply_member`, `reply_isi`) VALUES
(7, 16, '2023-06-24 14:55:11', 14, '<p>Alhamdulillah bang</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`diskusi_id`),
  ADD KEY `diskusi_ibfk_1` (`diskusi_member`),
  ADD KEY `diskusi_ibfk_2` (`diskusi_posting`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`posting_id`),
  ADD KEY `posting_ibfk_1` (`posting_kategori`),
  ADD KEY `posting_ibfk_2` (`posting_member`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `reply_ibfk_1` (`reply_diskusi`),
  ADD KEY `reply_ibfk_2` (`reply_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `diskusi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `posting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD CONSTRAINT `diskusi_ibfk_1` FOREIGN KEY (`diskusi_member`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diskusi_ibfk_2` FOREIGN KEY (`diskusi_posting`) REFERENCES `posting` (`posting_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posting`
--
ALTER TABLE `posting`
  ADD CONSTRAINT `posting_ibfk_1` FOREIGN KEY (`posting_kategori`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posting_ibfk_2` FOREIGN KEY (`posting_member`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`reply_diskusi`) REFERENCES `diskusi` (`diskusi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`reply_member`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
