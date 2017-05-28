-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2017 at 06:13 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sinta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'Udin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(18) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nim`, `nama`, `password`) VALUES
('197308291998022007', '', 'Beta Noranita, S.Si.,M.Kom', '000000'),
('197404011999031002', '', 'Dr. Aris Puji Widodo, S.Si, MT', '000000');

-- --------------------------------------------------------

--
-- Table structure for table `eksekutif`
--

CREATE TABLE `eksekutif` (
  `id_eksekutif` varchar(3) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `username` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eksekutif`
--

INSERT INTO `eksekutif` (`id_eksekutif`, `nip`, `nama`, `password`, `username`) VALUES
('1', '198010212005011003', 'Ragil Saputra, S.Si, M.Cs', '000000', 'ragilsaputra');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` varchar(7) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `catatan` text NOT NULL,
  `persetujuan` tinyint(1) NOT NULL,
  `tag` varchar(6) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `nim`, `catatan`, `persetujuan`, `tag`, `tanggal`) VALUES
('0030404', '24010314120003', 'asdcccc\r\nasdeeerw\r\nlkihhgjhg12.//{}', 1, 'bab1-1', '2017-04-04'),
('0030504', '24010314120003', 'assdasdll\r\nlll', 1, 'bab2-1', '2017-05-04'),
('0040513', '24010314120004', 'aaaaaaaaal', 0, 'bab1-', '2017-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(14) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_ta` varchar(3) NOT NULL,
  `id_mhs` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `password`, `nip`, `id_ta`, `id_mhs`) VALUES
('24010314120003', 'Khalid Fajri', '000000', '', '1', 1),
('24010314120004', 'Eri Irawan', '000000', '', '2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhir`
--

CREATE TABLE `tugas_akhir` (
  `id_ta` int(3) NOT NULL,
  `judul` varchar(80) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nip` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_akhir`
--

INSERT INTO `tugas_akhir` (`id_ta`, `judul`, `nim`, `nip`) VALUES
(1, 'Mencari Makna Hidup Melalui Derita Cinta Tak Terbalas', '24010314120001', '197308291998022007'),
(2, 'Analisa Gaya Tangan Ultraman Terhadap Kekuatan Serangan Pada Monster', '24010314120003', '197404011999031002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
