-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2025 pada 15.22
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn-crud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(8, 'admin', 'admin', 'admin@gmail.com', '$2y$10$2iiwbfp3DcvwwtGXbO3zjeo/j3deYhY01eG0ll2g4Jul41MJt5AjG', '1'),
(9, 'Operator Barang', 'Opebarang', 'opebarang@gmail.com', '$2y$10$MlmQISOYrDgImVRQuZ2jEODeO4zkfKOV17YGF.O9Mnw.Ri/7uPzhW', '2'),
(10, 'Operator Mahasiswa', 'opemahasiswa', 'opemahasiswa@gmail.com', '$2y$10$g0neayOCZLVgi1PSwUYiEe3TE6F16yejb1Fpb7qGSnEwBeg.1nwaG', '3'),
(11, 'Dimas Satia Permana', 'dimassp', 'dimas@gmail.com', '$2y$10$4ItW1R6dMCyefbh69h52fO19Ji.zIQ9hLDrB4UNy8C0zV8MAvkIkS', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(18, 'Laptop Acer Nitro 5', '10', '10000000', '944617', '2025-06-20 03:35:29'),
(19, 'Headset', '50', '45000', '165679', '2025-06-23 05:52:39'),
(20, 'Iphone 15 pro max', '10', '20000000', '358633', '2025-06-23 06:49:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(1, 'Yusup Muhamad', 'Teknik Informatika', 'laki-laki', '081912012402', '', 'acuy@gmail.com', 'foto.jpg'),
(2, 'Dimas Satia Permana', 'Teknik Informatika', 'Laki-Laki', '081915618752', '', 'dimassatia@gmail.com', 'foto.jpg'),
(3, 'Muhammad Farhan Maulana', 'Teknik Informatika', 'Laki-Laki', '081236712872', '', '2106100@gmail.com', 'foto.jpg'),
(7, 'Wulan Jamilah', 'Teknik Industri', 'Perempuan', '0852132480', '<p><em>jl. setia budi, No.45, Jakarta Barat, Indonesia, <strong>40396</strong></em></p>', 'wulan@gmail.com', '6851295786e16.png'),
(8, 'mansyur', 'Teknik Industri', 'Laki-Laki', '089127218234', '<p><em>jl. setia budi, No.45, Jakarta Barat, Indonesia, <strong>40396</strong></em></p>', 'ngehebanget@gmail.com', '685515c9be63f.jpg'),
(9, 'Abang Jampang', 'Teknik Informatika', 'Laki-Laki', '089234231221', '<p>Gambar alamat&nbsp;<a href=\"/ckfinder/userfiles/images/nik-z1d-LP8sjuI-unsplash.jpg\" target=\"_blank\"><img alt=\"Gambar alamat abang jampang\" src=\"/ckfinder/userfiles/images/nik-z1d-LP8sjuI-unsplash.jpg\" style=\"width:20%\" /></a></p>\r\n', 'abang@gmail.com', '6858c1ff98121.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
