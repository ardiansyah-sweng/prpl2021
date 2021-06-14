-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2021 pada 18.59
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_history`
--

CREATE TABLE `log_history` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sign_in_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_history`
--

INSERT INTO `log_history` (`id`, `email`, `sign_in_time`) VALUES
(1, 'admin@gmail.com', '2021-04-30 03:09:13'),
(3, 'admin@gmail.com', '2021-04-30 21:51:38'),
(4, 'admin@gmail.com', '2021-05-05 20:18:41'),
(5, 'admin@gmail.com', '2021-05-05 20:42:14'),
(6, 'admin@gmail.com', '2021-05-05 21:45:37'),
(7, 'admin@gmail.com', '2021-05-05 22:20:12'),
(8, 'azmicemcem10@gmail.com', '2021-05-05 22:43:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(4, 'admin@gmail.com', '$2y$10$8EfTCbs5AYa4h74.l4NUvucjNPgzCgsD5lxfRITRPYGARW/RQLcYa'),
(5, 'hafizhtaufiqulh@gmail.com', '$2y$10$kuXWXGp6TMwW08UOfGqfl.awcdx4bSJRu9iZpr3okCXnz8KnJgFp2'),
(11, 'belsap7@gmail.com', '$2y$10$jwJyTnOHVarkSq0/Vn/zZOlE5HOsHHiIQWjmULt8zCN7skuT0snV.'),
(12, 'azmicemcem10@gmail.com', '$2y$10$sGE3c1i5vHYefOFjKo7IE.RHxLPKIKiDlA.tNjg7iEkuLJy/59Lhq');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_history`
--
ALTER TABLE `log_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
