-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 06:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rev_bimbingan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `bimbingan_id` bigint(20) NOT NULL,
  `pengajuan_id` bigint(20) NOT NULL,
  `file_laporan` varchar(128) NOT NULL,
  `tgl_bimbingan` datetime NOT NULL,
  `catatan_dosen` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`bimbingan_id`, `pengajuan_id`, `file_laporan`, `tgl_bimbingan`, `catatan_dosen`) VALUES
(13, 7, 'acd5725a64c5357cb13722918991879d.docx', '2021-10-14 11:41:25', NULL),
(14, 7, '61ae58890bd992326a0f1d63fdefaf15.docx', '2021-10-14 11:41:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_bimbingan`
--

CREATE TABLE `jadwal_bimbingan` (
  `jadwal_id` bigint(20) UNSIGNED NOT NULL,
  `pengajuan_id` bigint(20) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_bimbingan`
--

INSERT INTO `jadwal_bimbingan` (`jadwal_id`, `pengajuan_id`, `tgl_mulai`, `keterangan`) VALUES
(12, 7, '2021-10-14 23:55:00', 'sip'),
(13, 7, '2021-10-15 00:00:00', 'oke');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mhs_id` int(11) NOT NULL,
  `npm` char(10) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mhs_id`, `npm`, `nama_mahasiswa`, `password`, `prodi_id`) VALUES
(1, '085018001', 'Tazki Qodri Alwi', '$2y$10$fgtqOmS5hcyTlE2OdO63Z.kx37hLkpUkIWe279x4rTvkqDzs5CdIm', 1),
(2, '068016036', 'Rizal Maulana', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(3, '085018002', 'Fachri Nugraha', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(4, '085018003', 'Livia Anisa Fajri', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(5, '085018004', 'Muhammad Fallah Rifky Al Rasyid', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(6, '085018007', 'Fajar Refapratama', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(7, '085018008', 'Gunawan Sehru', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(8, '085018009', 'Zeolita Adenia Badriani', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(9, '085018010', 'Elinda Puspita', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(10, '085018012', 'Teddy Setiawan', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(11, '085018013', 'Aurelia Shafa', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(12, '085018014', 'Mohamad Rexsy Surya Pratama', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(13, '085018015', 'Muhammad Aditiya', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(14, '085018017', 'Kevin H', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(15, '085018018', 'Aldi Irsa Almenra', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(16, '085018019', 'Rexsa Sandy Prayoga', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(17, '085018020', 'Prayoga Laksono', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(18, '085018024', 'Dimas Valentino Febrienko', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(19, '085018027', 'Muhammad Fadli', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(20, '085018028', 'Mohamad Arief Santya Budi', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(21, '085017003', 'Aristian', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(22, '085018005', 'Farhan Taufikurrahman', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(23, '085018011', 'Bunga Anggi Safitri', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(24, '085018021', 'Luthfiyana Nur Alifa', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(25, '085018022', 'Muchammad Suhendra', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(26, '085018025', 'Muhamad Agung Ibrahim', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(27, '085018029', 'Adhiem Ashaf AS', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 1),
(28, '12345678', 'Anjir', '$2y$10$PJ4DyiGvNxOKSqnl2NpQu.tsLSQ.z0yCHwiQ2Ne6kMQVpCmtzjY7W', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `pembimbing_id` bigint(20) NOT NULL,
  `pengajuan_id` bigint(20) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `jabatan` enum('dosen_pembimbing','asisten_pembimbing') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`pembimbing_id`, `pengajuan_id`, `staff_id`, `jabatan`) VALUES
(13, 7, 5, 'dosen_pembimbing'),
(14, 7, 4, 'asisten_pembimbing');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `pengajuan_id` bigint(20) NOT NULL,
  `jenis_pengajuan` enum('TA','PKMI') NOT NULL,
  `mhs_id` bigint(20) NOT NULL,
  `judul_pengajuan` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `status` enum('proses','disetujui','ditolak','selesai') NOT NULL DEFAULT 'proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`pengajuan_id`, `jenis_pengajuan`, `mhs_id`, `judul_pengajuan`, `deskripsi`, `status`) VALUES
(7, 'TA', 1, 'aplikasi rs', 'berbasis web', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `prodi_id` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`prodi_id`, `nama_prodi`) VALUES
(1, 'Sistem Informasi'),
(2, 'Sistem Informasi Akuntansi'),
(3, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` bigint(20) NOT NULL,
  `bimbingan_id` bigint(20) NOT NULL,
  `staff_id` bigint(20) NOT NULL,
  `catatan` varchar(256) NOT NULL,
  `catatan_2` varchar(256) NOT NULL,
  `status_review` enum('proses','ok','revisi') NOT NULL DEFAULT 'proses',
  `tgl_review` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `bimbingan_id`, `staff_id`, `catatan`, `catatan_2`, `status_review`, `tgl_review`) VALUES
(14, 14, 5, 'good', 'okeh', 'ok', '2021-10-14 11:42:56'),
(15, 13, 4, 'jelek', 'tidak', 'revisi', '2021-10-14 11:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('admin_prodi','kaprodi','dosen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `display_name`, `username`, `password`, `role`) VALUES
(1, 'Erlina', 'P001', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'admin_prodi'),
(2, 'Dian Kartika Utami, M.Kom', 'P002', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'kaprodi'),
(4, 'Sufiatul Maryana, M.Kom', 'P004', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(5, 'Dr. Tjut Awaliyah Zuraiyah, M.Kom', 'P005', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(6, 'Arie Qur\'ania, M.Kom', 'P006', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(7, 'Lita Karlitasari, S.Kom., MMSI', 'P007', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(8, 'Dr. Sri Setyaningsih, M.Si', 'P008', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(9, 'Asep Denih, M.Sc., Ph.D', 'P009', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(10, 'Dr. Herfina, M.Kom', 'P010', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(12, 'Aries Maesya, M.Kom', 'P012', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(13, 'Dian Kartika Utami, M.Kom', 'P013', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(14, 'Dini Suhartini, S.Kom., MMSI', 'P014', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(15, 'Halimah Tus Sa\'diah, M.Kom', 'P015', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(16, 'Ema Kurnia, M.Sc', 'P016', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen'),
(17, 'M. Saad Nurul Ishlah, M.Comp', 'P017', '$2y$10$v6wQoqBuAE/e2.8i.1E5rOFDPaeuBE6s8/tWiI43st4m/whMW3ck.', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`bimbingan_id`),
  ADD KEY `pengajuan_id` (`pengajuan_id`);

--
-- Indexes for table `jadwal_bimbingan`
--
ALTER TABLE `jadwal_bimbingan`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `pengajuan_id` (`pengajuan_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mhs_id`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`pembimbing_id`),
  ADD KEY `pengajuan_id` (`pengajuan_id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`pengajuan_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`prodi_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `bimbingan_id` (`bimbingan_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `bimbingan_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jadwal_bimbingan`
--
ALTER TABLE `jadwal_bimbingan`
  MODIFY `jadwal_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `pembimbing_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `pengajuan_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `prodi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `bimbingan_ibfk_1` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`pengajuan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_bimbingan`
--
ALTER TABLE `jadwal_bimbingan`
  ADD CONSTRAINT `jadwal_bimbingan_ibfk_1` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`pengajuan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD CONSTRAINT `pembimbing_ibfk_1` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`pengajuan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`bimbingan_id`) REFERENCES `bimbingan` (`bimbingan_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
