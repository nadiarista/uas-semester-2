-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2023 pada 05.05
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
-- Database: `data_jurnal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ilmu`
--

CREATE TABLE `ilmu` (
  `id` int(11) NOT NULL,
  `nama_ilmu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ilmu`
--

INSERT INTO `ilmu` (`id`, `nama_ilmu`) VALUES
(16, 'Ekonomi'),
(13, 'Fisika Terapan'),
(18, 'Ilmu Komputer'),
(14, 'Kimia'),
(15, 'Psikologi Eksperimental'),
(17, 'Sosiologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `nama_jurnal` varchar(50) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `ilmu_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id`, `nama_jurnal`, `nama_penerbit`, `ilmu_nama`) VALUES
(1, 'Journal of Applied Physics', 'American Institute of Physics', 'Fisika Terapan'),
(2, 'Journal of the American Chemical Society', 'American Chemical Society', 'Kimia'),
(4, 'Journal of Economic Perspectives', 'American Economic Association', 'Ekonomi'),
(5, 'American Sociological Review', 'American Sociological Association', 'Sosiologi'),
(6, 'Journal of Computer Science and Technology', 'Springer', 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `password`) VALUES
(1, 1, 'Admin', 'Admin'),
(2, 1, 'admin', 'admin'),
(3, 0, 'User', 'User'),
(4, 0, 'user', 'user'),
(5, 1, 'Admin', 'User'),
(6, 1, 'admin', 'user'),
(7, 1, 'agung', 'agung'),
(8, 1, 'hendi', 'hendi'),
(9, 1, 'temorubun', 'temorubun');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ilmu`
--
ALTER TABLE `ilmu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_ilmu` (`nama_ilmu`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ilmu_nama` (`ilmu_nama`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ilmu`
--
ALTER TABLE `ilmu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_ibfk_1` FOREIGN KEY (`ilmu_nama`) REFERENCES `ilmu` (`nama_ilmu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
