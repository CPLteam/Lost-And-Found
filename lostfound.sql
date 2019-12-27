-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Des 2019 pada 09.40
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `jenis_barang`) VALUES
(1, 'Peralatan Kuliah - Buku'),
(2, 'Peralatan Kuliah - Tempat Pensil'),
(3, 'Peralatan Kuliah - Aksesoris'),
(4, 'Tas'),
(5, 'Dompet'),
(6, 'Kartu'),
(7, 'Elektronik - HP'),
(8, 'Elektronik - Laptop'),
(9, 'Elektronik - Aksesoris'),
(10, 'Baju'),
(11, 'Sepatu'),
(12, 'Hijab'),
(13, 'Almamater'),
(14, 'Jam Tangan'),
(15, 'Kacamata'),
(16, 'Kecantikan'),
(17, 'Helm'),
(18, 'Jaket'),
(19, 'Botol dan Peralatan Makan'),
(20, 'Peralatan Sholat'),
(21, 'Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(100) NOT NULL,
  `Lantai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `Lantai`) VALUES
(1, 'Lobby '),
(2, 'Lantai 2'),
(3, 'Lantai 3'),
(4, 'Lantai 4'),
(5, 'Lantai 5'),
(6, 'Lantai 6'),
(7, 'Lantai 7'),
(8, 'Basement 1'),
(9, 'Basement 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_ambil` varchar(100) NOT NULL,
  `no_laporan` varchar(100) NOT NULL,
  `nama_pengambil` varchar(100) NOT NULL,
  `no_hp` varchar(19) NOT NULL,
  `foto_pengambil` varchar(100) NOT NULL,
  `tgl_pengambilan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temuan`
--

CREATE TABLE `temuan` (
  `no_laporan` varchar(100) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `tgl_temuan` date NOT NULL,
  `lokasi_penemuan` varchar(100) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `id_level` tinyint(1) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_level`, `nama`, `username`, `email`, `password`, `is_active`) VALUES
('5dfa69fc8a6d7', 1, 'Muhammad Ichsan Prayoga Putra', 'ican admin', 'ichsan.prayoga21@gmail.com', '$2y$10$H/E93ASjyhAJnI0nzBMJUOjr/1PqbYOKfLiTpqAdjOwUPAghnzyTm', 1),
('5dfaf645a13ca', 1, 'bro', 'brobro', 'bro@gmail.com', '$2y$10$wHI0yWzWvcpy4hHM/UZ27eaTe4Mik7f1/XInedZkGw62VvL7Ia6Le', 0),
('5dfb0baabec42', 1, 'Galih Adiguna', 'galihadgn', 'gadiguna@gmail.com', '$2y$10$XeX8q04nWh0N/FFAO10tp.1/TVFok16yBOtKupYBVgKw.c01kBO..', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_level` tinyint(1) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_level`, `level`) VALUES
(0, 'User'),
(1, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
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
(14, 'gadiguna@gmail.com', 'XU7Ktn+Jgn8v08McVoNSH4UX+F1ClJ8dBIXrFXI41FM=', 1576733610);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

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
  ADD PRIMARY KEY (`no_laporan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_2` (`id_barang`);

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
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD CONSTRAINT `pengambilan_ibfk_1` FOREIGN KEY (`no_laporan`) REFERENCES `temuan` (`no_laporan`);

--
-- Ketidakleluasaan untuk tabel `temuan`
--
ALTER TABLE `temuan`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
