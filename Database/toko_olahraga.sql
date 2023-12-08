-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2022 pada 06.27
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_olahraga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_produk`
--

CREATE TABLE `data_produk` (
  `Id` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `new_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_produk`
--

INSERT INTO `data_produk` (`Id`, `merk`, `type`, `harga`, `size`, `name`, `new_name`) VALUES
(29, 'Under Armour', 'Curry 8 Feel Good', 2500000, 44, 'ua curry 8.png', '0407221656906674ua curry 8.png'),
(30, 'Nike', 'Kyrie 7 Special FX', 1900000, 42, 'kyrie7.png', '0407221656906737kyrie7.png'),
(31, 'Nike ', 'Zoom Freak 2', 1699000, 45, 'zoomfreak2.png', '0407221656906770zoomfreak2.png'),
(32, 'Converse', 'Chuck Taylor All Star Multi Logo', 1500000, 42, 'converse.png', '0407221656906914converse.png'),
(34, 'Nike ', 'kyrie Low 4', 1459999, 44, 'nk.png', '0407221656906988nk.png'),
(35, 'Converse', 'OFF White All Start', 2500000, 45, 'con.png', '0407221656907134con.png'),
(36, 'Nike', 'Zoom KD 13 Black Grey', 2459000, 46, 'kd.png', '0507221657043273kd.png'),
(38, 'Adidas', 'Adidas black', 1200000, 40, 'image1656907397.png', '1512221671072018image1656907397.png'),
(41, 'Jordan', 'Air Jordan 4 Red Thunder', 3800000, 42, 'download.png', '1612221671155259download.png'),
(42, 'Nike', 'Sneakers', 1200000, 40, 'A_Bathing_Ape_Bape_Sta_Low_Sneakers_in_Black_White.png', '1612221671155674A_Bathing_Ape_Bape_Sta_Low_Sneakers_in_Black_White.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `resi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `alamat`, `status`, `resi`) VALUES
(14, 'lukman', 'Jl. Mawar', 'Pesanan Anda Dikirim', 2147483647),
(15, 'Alex', 'Gg.Doli', 'Pesanan Anda Dibatalkan', 2147483647),
(17, 'Azis ilham', 'Pasuruan', 'Pesanan Anda Dikirim', 2147483647),
(18, 'mellitya', 'malang', 'Pesanan Anda Dikirim', 2147483647),
(19, 'mellitya', 'malang', 'Pesanan Anda Dikirim', 2147483647),
(20, 'Azis ilham kurniawan', 'Jl. Mawar', 'Pesanan Anda Dibatalkan', 2147483647),
(21, 'ilham', 'Surabaya', 'Pesanan Anda Dikirim', 2147483647),
(22, 'Agung', 'Pandaan', 'Pesanan Anda Dikirim', 2147483647),
(23, 'Sabna', 'Malang', 'Pesanan Anda Dikirim', 2147483647),
(24, 'Maidy', 'Malang', 'Pesanan Anda Dikirim', 2147483647),
(25, 'mellitya', 'malang', 'Sedang Diproses', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `level`) VALUES
(6, 'azisirawan569@gmail.com', 'azis', '$2y$10$ldBNcTJvJ0kkBjkj5I8VSu5USK7Mhs6YhlMMVxUaQ6mHBivumhTgW', '2'),
(7, 'azis@ilham', 'ilham', '$2y$10$CTnfYiWmf1hZBh.ym1LEAOW2kXY44mGvGuNaIWwR4OtA5xI/HyupS', '2'),
(8, 'azisilhamkurniawan542@gmail.com', 'admin', '$2y$10$e5MoCb2l1uz7IbeccGfsrefOICWodu6ygpnO5qkkolGVOc47WsbJO', '1'),
(9, 'hmtiuniwara@gmail.com', 'umi', '$2y$10$kOuLUg3tcyOXy1dlHVSrpOs2lgbeUJyC/5HwBUrtkvoyJPQFnG51W', '2'),
(11, 'fahri@gmail.com', 'fahri', '$2y$10$Ji95P1jUCBXzJ5ZkLeNMYetNMTEhNlixjihQaspGE6q022wyJMI7C', '2'),
(12, 'lukman@gmail.com', 'lukman', '$2y$10$gdtAedYz5PASB0QTKDWQD.lrMBHtNVwFRxLUYFVDZMWMWBtoQdA1W', '2'),
(13, 'fedhdj@gmail.com', 'guest', '$2y$10$tWbIRCAVzqGf2KWs/GSUT.O4hm9myLnTmZ64dd4Q9911kQsEi9QKu', '2'),
(14, 'mellityatya@gmail.com', 'tya', '$2y$10$/iXLv.A9GsvuFgZjBKxJzuBY7HzmaKSDr0gTOsVcP21qSHiUCBEhW', '2'),
(15, 'sa@gmail.com', 'sabna', '$2y$10$3uMo5ILnsLj17lYEWoXffO8Ifx21ddq.Uu7naF/7j40A87x3sZx72', '2'),
(16, 'maidy@gmail.com', 'maidy', '$2y$10$9p1c0.0chQ5HyxYNmAAxl.qKs1Y15SjR49blUcGsNeJTwmzrqpSn6', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT untuk tabel `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
