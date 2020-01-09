-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 03:53 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `jenis_barang`) VALUES
(1, 'Peralatan Kuliah \r\n'),
(2, 'Aksesoris\r\n'),
(3, 'Kartu\r\n'),
(4, 'Elektronik\r\n'),
(5, 'Pakaian\r\n'),
(6, 'Kecantikan \r\n'),
(7, 'Peralatan Makan\r\n'),
(8, 'Lain-lain\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_detail_barang` int(100) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_barang`
--

INSERT INTO `detail_barang` (`id_detail_barang`, `id_barang`, `nama_barang`) VALUES
(1, 1, 'Alat Tulis'),
(2, 1, 'Berkas dan Buku'),
(3, 1, 'Tempat Pensil'),
(4, 2, 'Helm'),
(5, 2, 'Jam Tangan'),
(6, 2, 'Kacamata'),
(7, 3, 'Kartu Pelajar'),
(8, 3, 'ATM'),
(9, 3, 'Tanda Pengenal (SIM/KTP/Paspor)'),
(10, 3, 'Kartu Anggota'),
(11, 3, 'Kartu Langganan'),
(12, 4, 'Handphone'),
(13, 4, 'Aksesoris Handphone'),
(14, 4, 'Laptop'),
(15, 4, 'Aksesoris Laptop'),
(16, 4, 'Media Penyimpanan Elektronik'),
(17, 4, 'Aksesoris'),
(18, 5, 'Baju'),
(19, 5, 'Sepatu'),
(20, 5, 'Hijab'),
(21, 5, 'Jas Almamater'),
(22, 5, 'Jas Hujan'),
(23, 5, 'Jaket'),
(24, 5, 'Peralatan Sholat'),
(25, 6, 'Make Up'),
(26, 6, 'Skin care'),
(27, 6, 'Parfum'),
(28, 7, 'Kotak Makan'),
(29, 7, 'Sendok, Garpu dan Pisau'),
(30, 7, 'Botol Minum'),
(31, 7, 'Termos'),
(32, 8, 'Lain-lain');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(100) NOT NULL,
  `lantai` varchar(100) NOT NULL,
  `gedung` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lantai`, `gedung`) VALUES
(1, 'Lobby ', 'Gedung Utama'),
(2, 'Lantai 2', 'Gedung Utama'),
(3, 'Lantai 3', 'Gedung Utama'),
(4, 'Lantai 4', 'Gedung Utama'),
(5, 'Lantai 5', 'Gedung Utama'),
(6, 'Lantai 6', 'Gedung Utama'),
(7, 'Lantai 7', 'Gedung Utama'),
(8, 'Basement 1', 'Gedung Utama'),
(9, 'Basement 2', 'Gedung Utama');

-- --------------------------------------------------------

--
-- Table structure for table `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_ambil` varchar(100) NOT NULL,
  `no_laporan` varchar(100) NOT NULL,
  `nama_pengambil` varchar(100) NOT NULL,
  `no_hp` varchar(19) NOT NULL,
  `foto_pengambil` varchar(100) NOT NULL,
  `tgl_pengambilan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengambilan`
--

INSERT INTO `pengambilan` (`id_ambil`, `no_laporan`, `nama_pengambil`, `no_hp`, `foto_pengambil`, `tgl_pengambilan`) VALUES
('', '202001080002', 'Aji', '0812345678', 'Furqon_Triggered.jpg', '0000-00-00 00:00:00'),
('5e15df25bd9cc', '202001080001', 'Aji', '0812345678', 'Triggered.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `temuan`
--

CREATE TABLE `temuan` (
  `id_temuan` int(11) NOT NULL,
  `no_laporan` varchar(100) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_detail_barang` int(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `tgl_temuan` varchar(64) NOT NULL,
  `lokasi_penemuan` varchar(100) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `id_lokasi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `id_level` int(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_level`, `nama`, `username`, `email`, `password`, `is_active`) VALUES
('5dfa69fc8a6d7', 1, 'Muhammad Ichsan Prayoga Putra', 'ican admin', 'ichsan.prayoga21@gmail.com', '$2y$10$H/E93ASjyhAJnI0nzBMJUOjr/1PqbYOKfLiTpqAdjOwUPAghnzyTm', 1),
('5dfaf645a13ca', 1, 'bro', 'brobro', 'bro@gmail.com', '$2y$10$wHI0yWzWvcpy4hHM/UZ27eaTe4Mik7f1/XInedZkGw62VvL7Ia6Le', 0),
('5dfb0baabec42', 1, 'Galih Adiguna', 'galihadgn', 'gadiguna@gmail.com', '$2y$10$XeX8q04nWh0N/FFAO10tp.1/TVFok16yBOtKupYBVgKw.c01kBO..', 1),
('5e15b98044274', 1, 'Nugraha Purnama Aji', 'nugrahaji27', 'nugrahaaji8821@gmail.com', '$2y$10$bTYeecY7S1F5mrI.ffFdguqJhScdWRE/2EtKCMtiJhIKgEI1nywNy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_level` int(1) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_level`, `level`) VALUES
(0, 'User'),
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(2, 'ichsan.prayoga21@gmail.co', 'R4bpm4fk+amtAoVNqzaF2Lo1P6OR0QJ1d3a6sc4Mxhk=', 1576691465),
(3, 'ichsan.prayoga21@gmail.co', '7s7eM07PC/iEARWuoec2uPsE9baOt4aRaiOA2Sfdpqc=', 1576691508),
(4, 'gadiguna@gmail.com', 'tz5VSpLLRJCP/yfi/tQDsG3poYL21R7CQWxBRiYccrY=', 1576727891),
(5, 'gadiguna@gmail.com', 'GNuD2+aNiByZcTDrmVdLg+/mjlbeRTSRTOHo2bcMLtE=', 1576727963),
(6, 'bro@gmail.com', 'f9BLL61XPraEH+1ly5H+eJy1DfAKwMjpggodhIC4vFw=', 1576728133),
(7, 'gadiguna@gmail.com', '+Yz63xcuzvvew1mqqeLsUnoGo7cd3nMK7vZdRiaQ0Ok=', 1576728393),
(8, 'gadiguna@gmail.com', 'F3UgaFmskmJ1Q6GH2fgLUAW71kOcMbNQ5oz0pVYO/0o=', 1576729292),
(9, 'gadiguna@gmail.com', '3Ikvv3LYgBxf+Pu3tq0EEbMnI+NWB8hOJtrYMH80+5I=', 1576729656),
(10, 'gadiguna@gmail.com', 'LFyuRHZwNKpZ5gMxF9MM8pXYTa+/CVUMmO333PhwgzY=', 1576730814),
(11, 'gadiguna@gmail.com', 'Fa1Jj4Ac2Lxz2eyo8bCy0Hui9PxalOmewzWAusXqq+E=', 1576731342),
(12, 'gadiguna@gmail.com', 'oddUOXsOOxE+xTPxWm4vT0BhkHDg/mMsWJTXi9IHlBk=', 1576732644),
(13, 'gadiguna@gmail.com', '8BEPpKgUwM6F8a6sYwDEvFEmUMYpihbng+cJ43AxUEg=', 1576732955),
(14, 'gadiguna@gmail.com', 'XU7Ktn+Jgn8v08McVoNSH4UX+F1ClJ8dBIXrFXI41FM=', 1576733610),
(15, 'nugrahaaji8821@gmail.com', 'G+0W+jjrmtzl5uNfyO0xye8lABT965O5+Qiu6SYLU6I=', 1578482048);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_detail_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id_ambil`),
  ADD KEY `no_laporan` (`no_laporan`);

--
-- Indexes for table `temuan`
--
ALTER TABLE `temuan`
  ADD PRIMARY KEY (`id_temuan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_2` (`id_barang`),
  ADD KEY `id_detail_barang` (`id_detail_barang`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id_detail_barang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `temuan`
--
ALTER TABLE `temuan`
  MODIFY `id_temuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_level` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `detail_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `temuan`
--
ALTER TABLE `temuan`
  ADD CONSTRAINT `temuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `temuan_ibfk_2` FOREIGN KEY (`id_detail_barang`) REFERENCES `detail_barang` (`id_detail_barang`),
  ADD CONSTRAINT `temuan_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `temuan_ibfk_4` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
