-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2023 at 01:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekullegend`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kuis`
--

CREATE TABLE `jawaban_kuis` (
  `id_jawaban` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `benar` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban_kuis`
--

INSERT INTO `jawaban_kuis` (`id_jawaban`, `id_soal`, `deskripsi`, `benar`) VALUES
(1, 1, '12', 0),
(2, 1, '11', 1),
(3, 1, '13', 0),
(4, 1, '9', 0),
(5, 2, 'gaya kupu-kupu', 1),
(6, 2, 'gaya tidur', 0),
(7, 2, 'gaya harimau', 0),
(8, 2, 'gaya kelinci', 0),
(9, 3, '5', 0),
(10, 3, '7', 0),
(11, 3, '2', 1),
(12, 3, '4', 0),
(13, 4, '5', 0),
(14, 4, '8', 0),
(15, 4, '1', 0),
(16, 4, '9', 1),
(17, 5, '10', 1),
(18, 5, '2', 0),
(19, 5, '5', 0),
(20, 5, '6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` char(4) NOT NULL,
  `nama_kelas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `nama_kelas`) VALUES
('IA01', 'MIPA 1'),
('IA02', 'MIPA2'),
('IS01', 'IPS 1'),
('IS03', 'IPS 3');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_topik` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id_kuis` int(11) NOT NULL,
  `judul` varchar(600) NOT NULL,
  `jumlah_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kd_materi` char(4) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tgl_upload` date NOT NULL DEFAULT current_timestamp(),
  `file_materi` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`kd_materi`, `judul`, `tgl_upload`, `file_materi`, `id_user`) VALUES
('MTK1', 'Matriks', '2023-11-11', 'SOAL_RESPONSI_1_PAKET_PINK.pdf', 2),
('MTK2', 'Aljabar', '2023-11-11', 'Group 4.png', 2),
('OR01', 'Futsal', '2023-11-11', 'image.png', 2),
('SJR1', 'Megalitikum', '2023-11-11', 'wp4317866-kimetsu-no-yaiba-wallpapers.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `soal_kuis`
--

CREATE TABLE `soal_kuis` (
  `id_soal` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soal_kuis`
--

INSERT INTO `soal_kuis` (`id_soal`, `deskripsi`, `skor`) VALUES
(1, 'Berapa jumlah pemain sepak bola?', 1),
(2, 'Yang termasuk jenis gaya dalam berenang? ', 1),
(3, '1+1 = ..?', 1),
(4, '3*3 = ..?', 1),
(5, '5+5 = ..?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id`, `judul`, `deskripsi`, `tanggal`, `id_user`) VALUES
(18, 'Futsal', 'FUTSAL', '2023-11-12', 2),
(20, 'Materi Sejarah Teori Big Bang', 'Siswa dapat memahami bagaimana terjadinya letusan dari teori Big Bang', '2023-11-12', 2),
(21, 'Materi Matematika ALJABAR', 'Siswa dapat memahami dan menjelaskan materi ALJABAR', '2023-11-12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Guru','Siswa') NOT NULL DEFAULT 'Siswa',
  `kd_kelas` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `kd_kelas`) VALUES
(1, 'Daniel Arif', 'daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'Guru', ''),
(2, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', ''),
(4, 'Luthfi Emillulfata', 'luthfi', 'd5cd72b7bcbf56bc503904f1ac7d9bc2', 'Siswa', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban_kuis`
--
ALTER TABLE `jawaban_kuis`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_soal` (`id_soal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topik_komentar` (`id_topik`),
  ADD KEY `user_komentar` (`id_user`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id_kuis`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kd_materi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `soal_kuis`
--
ALTER TABLE `soal_kuis`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topik_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban_kuis`
--
ALTER TABLE `jawaban_kuis`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id_kuis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soal_kuis`
--
ALTER TABLE `soal_kuis`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban_kuis`
--
ALTER TABLE `jawaban_kuis`
  ADD CONSTRAINT `jawaban_kuis_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal_kuis` (`id_soal`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `topik_komentar` FOREIGN KEY (`id_topik`) REFERENCES `topik` (`id`),
  ADD CONSTRAINT `user_komentar` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `topik`
--
ALTER TABLE `topik`
  ADD CONSTRAINT `topik_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
