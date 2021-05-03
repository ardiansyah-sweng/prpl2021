-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2021 pada 20.15
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prpl1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_history`
--

CREATE TABLE `log_history` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_history`
--

INSERT INTO `log_history` (`id`, `email`, `log`) VALUES
(1, 'sendyapriatna001@gmail.com', '2021-05-02 14:12:19'),
(2, 'sendyapriatna001@gmail.com', '2021-05-02 14:12:35'),
(3, 'sendyapriatna@yahoo.co.id', '2021-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`email`, `pass`) VALUES
('sendyapriatna001@gmail.com', 'ee303eafe3805daf297802dcd67f1ccf'),
('kyubean7@gmail.com', '5ae16da27083175ab7dd2646a142264d'),
('sendy1900018205@webmail.uad.ac.id', '242532103a6eb1cc873e6790283f1093'),
('sendyapriatna@yahoo.co.id', '0485b40a7c63ff42ae4a2d685e080c29'),
('sendyapriatna001@gmail.com', '9306044695afe85214e58a55f3125aae'),
('kyubean7@gmail.com', 'eb08510649a914527e4affb3817fefa1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_history`
--
ALTER TABLE `log_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_history`
--
ALTER TABLE `log_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
