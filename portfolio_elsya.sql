-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2025 at 10:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_elsya`
--

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `introduction` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `skills_hard` text DEFAULT NULL,
  `skills_soft` text DEFAULT NULL,
  `tools` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `experience` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `name`, `location`, `birth_date`, `email`, `instagram`, `introduction`, `education`, `skills_hard`, `skills_soft`, `tools`, `photo`, `created_at`, `experience`) VALUES
(1, 'Elsya Nur Aulia Handayani ', 'Balikpapan', '2006-04-25', '10241026@student.itk.ac.id', '@elsyanrr', 'halo,saya Elsya anak yang ceria dan suka membaca buku. Saya seorang mahasiswa yang memiliki ketertarikan besar pada dunia literasi. Sejak kecil, buku menjadi teman setia yang membuka jendela pengetahuan.', '- TK Al-Aqsa batu sopang\r\n- SDN 012 batu sopang\r\n- MTSS Al-Madaniyah jaro kalsel\r\n- MASS Al-Madaniyah jaro kalsel\r\n- Institut Teknologi Kalimantan\r\n\r\n', 'Desain\r\nSpeaking\r\nEditing foto \r\nEditing Video\r\n', 'Komunikasi yang baik\r\nKerja tim\r\nManajemen waktu\r\nBerpikir kritis\r\n', 'berbahasa inggris dan arab\r\n', '690415f3c892b.png', '2025-10-28 13:20:26', '-karya tulis Ilmiyah 2024\r\n-Sekretaris BPH Badan Eksekutif Santri 2023-2024\r\n-Divisi Media Pondok 2023-2024\r\n-Balai Latihan Kerja Komunitas (BLKK) Pelatihan komputer (Ms Office Word, Excel,CorelDraw) 2024\r\n-kursus bahasa inggris pare kediri2024\r\n-Acara Inspire 2025 Kadiv divisi Kestari 2025\r\n-Acara Makrab 2025 anggota divisi Kestari2025\r\n-Divisi Kestari Inspace 2025\r\n-Staff magang DPM SI ITK 2025\r\n-Staff Komisi 2 DPM SI ITK 2025\r\n\r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
