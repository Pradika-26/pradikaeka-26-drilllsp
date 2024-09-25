-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2024 pada 23.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id_barang` int(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `kuantitas_stok` varchar(100) NOT NULL,
  `lokasi_gudang` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id_barang`, `nama_barang`, `jenis_barang`, `kuantitas_stok`, `lokasi_gudang`, `serial_number`) VALUES
(22222, 'bajuuu', 'skin', '100', 'semoloo', '22331');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `ID` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `level`) VALUES
(123, 'pradika', '1', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `storage_unit`
--

CREATE TABLE `storage_unit` (
  `id_gudang` int(100) NOT NULL,
  `nama_gudang` varchar(100) NOT NULL,
  `lokasi_gudang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `storage_unit`
--

INSERT INTO `storage_unit` (`id_gudang`, `nama_gudang`, `lokasi_gudang`) VALUES
(123, 'sokran', 'jojoran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nomor_id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nomor_id`, `nama`, `kontak`, `email`) VALUES
(123, 'pradika', '081231803725', 'pradika.eka06@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama`, `kontak`, `nama_barang`) VALUES
(12, 'Jovankha', '', 'New Balance'),
(12121, 'pradika', '0871231803725', 'citato'),
(89898, 'jelitaaaaaaaaaa', '086435436454', 'krmbang mayat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `lokasi_gudang` (`lokasi_gudang`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `storage_unit`
--
ALTER TABLE `storage_unit`
  ADD PRIMARY KEY (`id_gudang`),
  ADD KEY `lokasi_gudang` (`lokasi_gudang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nomor_id`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`),
  ADD KEY `nama_barang` (`nama_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
