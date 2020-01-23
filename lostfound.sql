-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2020 pada 08.01
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

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
-- Struktur dari tabel `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_detail_barang` int(100) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_barang`
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
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(100) NOT NULL,
  `lantai` varchar(100) NOT NULL,
  `gedung` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
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
-- Struktur dari tabel `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_ambil` int(100) NOT NULL,
  `no_laporan` varchar(100) NOT NULL,
  `nama_pengambil` varchar(100) NOT NULL,
  `no_hp` varchar(19) NOT NULL,
  `foto_pengambil` varchar(100) NOT NULL,
  `tgl_pengambilan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengambilan`
--

INSERT INTO `pengambilan` (`id_ambil`, `no_laporan`, `nama_pengambil`, `no_hp`, `foto_pengambil`, `tgl_pengambilan`) VALUES
(0, '202001160004', 'Aji', '08123456', '157581217247214.jpg', '0000-00-00 00:00:00'),
(1, '202001080002', 'Aji', '0812345678', 'Furqon_Triggered.jpg', '0000-00-00 00:00:00'),
(2, '202001080001', 'Aji', '0812345678', 'Triggered.jpg', '0000-00-00 00:00:00'),
(3, '202001160011', 'Aji', '0812345678', 'Parfum_Pria_Possess_Man_Eau_de_Toilette_by_Oriflame2.jpg', '0000-00-00 00:00:00'),
(4, '201901207001', 'Aji', '08123456', '157581217247212.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(1) NOT NULL,
  `nama_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(0, 'Belum Diambil'),
(1, 'Sudah Diambil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temuan`
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

--
-- Dumping data untuk tabel `temuan`
--

INSERT INTO `temuan` (`id_temuan`, `no_laporan`, `id_barang`, `id_detail_barang`, `id_user`, `tgl_temuan`, `lokasi_penemuan`, `deskripsi`, `foto_barang`, `status`, `id_lokasi`) VALUES
(3, '201901207001', 2, 4, '5dfa69fc8a6d7', '2020-01-09', 'Dekat Tiang', 'Helm KYT', 'toto.jpg', 1, 6),
(10, '202001160004', 6, 27, '5e15b98044274', '2020-01-16', 'toilet', 'Parfum Oriflame', 'Parfum_Pria_Possess_Man_Eau_de_Toilette_by_Oriflame.jpg', 1, 1),
(11, '202001160011', 1, 1, '5e15b98044274', '2020-01-16', 'toilet', 'Pulpen Joyko', 'Parfum_Pria_Possess_Man_Eau_de_Toilette_by_Oriflame1.jpg', 0, 2),
(12, '202001220012', 4, 12, '5e15b98044274', '2020-01-22', 'Lantai 6', 'Hape Baru', '157581217247215.jpg', 0, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_level`, `nama`, `username`, `email`, `password`, `is_active`) VALUES
('5dfa69fc8a6d7', 1, 'Muhammad Ichsan Prayoga Putra', 'ichsan_prayoga', 'ichsan.prayoga21@gmail.com', '$2y$10$H/E93ASjyhAJnI0nzBMJUOjr/1PqbYOKfLiTpqAdjOwUPAghnzyTm', 1),
('5dfaf645a13ca', 1, 'bro', 'brobro', 'bro@gmail.com', '$2y$10$wHI0yWzWvcpy4hHM/UZ27eaTe4Mik7f1/XInedZkGw62VvL7Ia6Le', 0),
('5dfb0baabec42', 1, 'Galih Adiguna', 'galihadgn', 'gadiguna@gmail.com', '$2y$10$XeX8q04nWh0N/FFAO10tp.1/TVFok16yBOtKupYBVgKw.c01kBO..', 1),
('5e15b98044274', 1, 'Nugraha Purnama Aji', 'nugrahaji27', 'nugrahaaji8821@gmail.com', '$2y$10$bTYeecY7S1F5mrI.ffFdguqJhScdWRE/2EtKCMtiJhIKgEI1nywNy', 1),
('5e174e395e933', 1, 'Aglabi Faskhia Yorgi', 'Abi918', 'mieayampangsit21@gmail.com', '$2y$10$3F0ZnUxd6eXXbylRCbGnnuLV642WqgdxxKao21eqkJhlwjmzqKBsO', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_level` int(1) NOT NULL,
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_detail_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id_ambil`),
  ADD KEY `no_laporan` (`no_laporan`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `temuan`
--
ALTER TABLE `temuan`
  ADD PRIMARY KEY (`id_temuan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_2` (`id_barang`),
  ADD KEY `id_detail_barang` (`id_detail_barang`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id_detail_barang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `temuan`
--
ALTER TABLE `temuan`
  MODIFY `id_temuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_level` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `detail_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `temuan`
--
ALTER TABLE `temuan`
  ADD CONSTRAINT `temuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `temuan_ibfk_2` FOREIGN KEY (`id_detail_barang`) REFERENCES `detail_barang` (`id_detail_barang`),
  ADD CONSTRAINT `temuan_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi` (`id_lokasi`),
  ADD CONSTRAINT `temuan_ibfk_4` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
