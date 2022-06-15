-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2022 pada 09.24
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `kode_barang` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `kuantitas` varchar(128) NOT NULL,
  `kode_ruangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`id`, `nama_barang`, `kode_barang`, `satuan`, `kuantitas`, `kode_ruangan`) VALUES
(9, 'CPU', 'CP 0021', 'Unit', '4', 'Pelayanan'),
(10, 'Monitor', 'MN 0233', 'Unit', '4', 'PDAM 011243');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_keluar`
--

CREATE TABLE `aset_keluar` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_aset` varchar(100) NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_masuk`
--

CREATE TABLE `aset_masuk` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_aset` varchar(100) NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aset_masuk`
--

INSERT INTO `aset_masuk` (`id`, `id_transaksi`, `tanggal`, `kode_aset`, `nama_aset`, `pengirim`, `jumlah`, `satuan`) VALUES
(2, '00332', '2022-06-14', '009112', 'coba', 'coba', '5', 'Unit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id`, `location_name`) VALUES
(2, 'Keungan edit'),
(3, 'Pembukuan'),
(4, 'Pelayanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `nama_aset`, `jumlah`, `tanggal`, `keterangan`) VALUES
(2, 'coba2', '5', '2022-06-14', 'edit'),
(3, 'coba', '5', '2022-06-14', 'keter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`) VALUES
(2, 'Unit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('direktur','admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `image`, `password`, `level`) VALUES
(10, 'admin', 'Administrator', 'default.png', '$2y$10$.TwbUM8B8GDrjCigJyNjxe4nSQvtdVTkLcTERGeTP8YYjk57dzsqW', 'admin'),
(16, 'petugas', 'petugas', 'default.png', '$2y$10$M6F9Dx8sMW6ivyH4hi8fquh3D24E8LN.JJKQfCkQytVJSR0VR.N4C', 'petugas'),
(17, 'petugas1', 'petugas1', 'default.png', '$2y$10$3bQ2d0lKK9Jj9qgfmMhjEOeqfuvYJzeP9LzEiObcjw1c95uMd1zrW', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aset_keluar`
--
ALTER TABLE `aset_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aset_masuk`
--
ALTER TABLE `aset_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aset`
--
ALTER TABLE `aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `aset_keluar`
--
ALTER TABLE `aset_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `aset_masuk`
--
ALTER TABLE `aset_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
