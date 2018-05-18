-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Apr 2018 pada 16.57
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `centroid_temp`
--

CREATE TABLE `centroid_temp` (
  `IdPrd` varchar(15) NOT NULL,
  `iterasi` int(11) NOT NULL,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `centroid_temp`
--

INSERT INTO `centroid_temp` (`IdPrd`, `iterasi`, `c1`, `c2`, `c3`) VALUES
('P00000001', 1, '0', '1', '0'),
('P00000002', 1, '1', '0', '0'),
('P00000003', 1, '0', '1', '0'),
('P00000004', 1, '0', '1', '0'),
('P00000005', 1, '0', '0', '1'),
('P00000006', 1, '0', '1', '0'),
('P00000007', 1, '0', '0', '1'),
('P00000008', 1, '0', '0', '1'),
('P00000009', 1, '0', '1', '0'),
('P00000010', 1, '0', '0', '1'),
('P00000011', 1, '0', '0', '1'),
('P00000012', 1, '0', '1', '0'),
('P00000013', 1, '0', '1', '0'),
('P00000014', 1, '0', '1', '0'),
('P00000015', 1, '0', '1', '0'),
('P00000016', 1, '0', '1', '0'),
('P00000017', 1, '0', '1', '0'),
('P00000018', 1, '1', '0', '0'),
('P00000019', 1, '0', '1', '0'),
('P00000020', 1, '0', '1', '0'),
('P00000021', 1, '1', '0', '0'),
('P00000022', 1, '0', '0', '1'),
('P00000023', 1, '0', '1', '0'),
('P00000024', 1, '0', '1', '0'),
('P00000025', 1, '0', '0', '1'),
('P00000026', 1, '0', '0', '1'),
('P00000027', 1, '0', '0', '1'),
('P00000028', 1, '0', '1', '0'),
('P00000029', 1, '0', '1', '0'),
('P00000030', 1, '0', '1', '0'),
('P00000001', 2, '0', '1', '0'),
('P00000002', 2, '1', '0', '0'),
('P00000003', 2, '0', '1', '0'),
('P00000004', 2, '0', '1', '0'),
('P00000005', 2, '0', '0', '1'),
('P00000006', 2, '0', '1', '0'),
('P00000007', 2, '0', '0', '1'),
('P00000008', 2, '0', '0', '1'),
('P00000009', 2, '0', '0', '1'),
('P00000010', 2, '0', '0', '1'),
('P00000011', 2, '0', '0', '1'),
('P00000012', 2, '0', '1', '0'),
('P00000013', 2, '0', '1', '0'),
('P00000014', 2, '0', '1', '0'),
('P00000015', 2, '0', '1', '0'),
('P00000016', 2, '0', '1', '0'),
('P00000017', 2, '0', '1', '0'),
('P00000018', 2, '1', '0', '0'),
('P00000019', 2, '0', '1', '0'),
('P00000020', 2, '0', '1', '0'),
('P00000021', 2, '1', '0', '0'),
('P00000022', 2, '0', '0', '1'),
('P00000023', 2, '0', '1', '0'),
('P00000024', 2, '0', '1', '0'),
('P00000025', 2, '0', '0', '1'),
('P00000026', 2, '0', '0', '1'),
('P00000027', 2, '0', '0', '1'),
('P00000028', 2, '0', '1', '0'),
('P00000029', 2, '0', '1', '0'),
('P00000030', 2, '0', '0', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detjual`
--

CREATE TABLE `detjual` (
  `IdDetJual` int(11) NOT NULL,
  `IdJual` varchar(11) NOT NULL,
  `IdPrd` varchar(15) NOT NULL,
  `Jumlah` int(10) NOT NULL,
  `Harga` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detjual`
--

INSERT INTO `detjual` (`IdDetJual`, `IdJual`, `IdPrd`, `Jumlah`, `Harga`) VALUES
(1, 'J00000001', 'P00000001', 2, 45000),
(2, 'J00000001', 'P00000002', 1, 22500),
(3, 'J00000002', 'P00000019', 1, 22500),
(4, 'J00000003', 'P00000017', 1, 22500),
(5, 'J00000004', 'P00000029', 1, 22500),
(6, 'J00000004', 'P00000006', 1, 22500),
(7, 'J00000005', 'P00000001', 1, 22500),
(8, 'J00000005', 'P00000002', 1, 22500),
(9, 'J00000005', 'P00000003', 1, 22500),
(10, 'J00000005', 'P00000004', 1, 22500),
(11, 'J00000005', 'P00000005', 1, 22500),
(12, 'J00000006', 'P00000004', 1, 22500),
(13, 'J00000006', 'P00000005', 1, 22500),
(14, 'J00000007', 'P00000011', 1, 22500),
(15, 'J00000007', 'P00000012', 1, 22500),
(16, 'J00000008', 'P00000015', 1, 22500),
(17, 'J00000008', 'P00000017', 1, 22500),
(18, 'J00000009', 'P00000002', 20, 450000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detsto`
--

CREATE TABLE `detsto` (
  `IdDetSto` int(11) NOT NULL,
  `IdSto` varchar(15) NOT NULL,
  `IdPrd` varchar(15) NOT NULL,
  `JmlSto` int(13) NOT NULL,
  `HrgSto` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detsto`
--

INSERT INTO `detsto` (`IdDetSto`, `IdSto`, `IdPrd`, `JmlSto`, `HrgSto`) VALUES
(1, 'S00000001', 'P00000001', 90, 22500),
(2, 'S00000001', 'P00000003', 15, 22500),
(3, 'S00000001', 'P00000006', 6, 22500),
(4, 'S00000002', 'P00000012', 13, 22500),
(5, 'S00000002', 'P00000019', 10, 22500),
(6, 'S00000003', 'P00000013', 1, 22500),
(7, 'S00000003', 'P00000009', 13, 22500),
(8, 'S00000003', 'P00000005', 17, 22500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_centroid`
--

CREATE TABLE `hasil_centroid` (
  `nomor` int(2) NOT NULL,
  `c1a` varchar(50) NOT NULL,
  `c1b` varchar(50) NOT NULL,
  `c1c` varchar(50) NOT NULL,
  `c2a` varchar(50) NOT NULL,
  `c2b` varchar(50) NOT NULL,
  `c2c` varchar(50) NOT NULL,
  `c3a` varchar(50) NOT NULL,
  `c3b` varchar(50) NOT NULL,
  `c3c` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_centroid`
--

INSERT INTO `hasil_centroid` (`nomor`, `c1a`, `c1b`, `c1c`, `c2a`, `c2b`, `c2c`, `c3a`, `c3b`, `c3c`) VALUES
(1, '29', '29', '29', '15.944444444444', '15.944444444444', '15.944444444444', '7.1111111111111', '7.1111111111111', '7.1111111111111'),
(2, '29', '29', '29', '16.5625', '16.5625', '16.5625', '7.8181818181818', '7.8181818181818', '7.8181818181818');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `IdMember` varchar(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `TempatLahir` varchar(50) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `JenisKelamin` varchar(15) NOT NULL,
  `NoHp` varchar(13) NOT NULL,
  `AlamatRumah` text NOT NULL,
  `TeleponRumah` varchar(13) NOT NULL,
  `AlamatKantor` text NOT NULL,
  `TeleponKantor` varchar(13) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`IdMember`, `Nama`, `TempatLahir`, `TanggalLahir`, `JenisKelamin`, `NoHp`, `AlamatRumah`, `TeleponRumah`, `AlamatKantor`, `TeleponKantor`, `Email`, `status`) VALUES
('M00000001', 'Nando', 'Karanganyar', '2012-04-20', 'Laki-laki', '-', 'Pulosari Karangasem', '-', '-', '-', '-', 'terverivikasi'),
('M00000002', 'Nylan', 'Karanganyar', '2000-08-12', 'Perempuan', '081642098672', 'Karanganyar Jl. Amartaraya No.155', '-', '-', '-', 'nylan@gmail.com', 'terverivikasi'),
('M00000003', 'Yunanda Laravel', 'Sleman', '1999-08-04', 'Perempuan', '0271-987777', 'Jl. Mlati No.12 Sleman Yogyakarta', '-', '-', '-', 'Yunan.lara@gmail.com', 'terverivikasi'),
('M00000004', 'Yudhistira Gilang Adisetyo', 'Karanganyar', '1994-11-22', 'Laki-laki', '085647319872', 'Karangasem 4/3 Sroyo Jaten Karanganyar', '-', '-', '-', 'gilacoc1122@gmail.com', 'terverivikasi'),
('M00000005', 'Tyas Ayu Nanda Pertiwi', 'KARANGANYAR', '1997-07-16', 'Perempuan', '087655787666', '--', '-', '-', '-', '-', 'terverivikasi'),
('M00000006', 'Dodik Wahyu P', 'Karanganyar', '1994-10-21', 'Laki-laki', '-', '-', '-', '-', '-', '-', 'belumterverifikasi'),
('M00000007', 'Inaya Hasyipatu Haifa', 'Karanganyar', '2012-09-06', 'Perempuan', '-', 'Karangasem 4/3 Sroyo Jaten Karanganyar', '-', '-', '-', '-', 'belumterverifikasi'),
('M00000008', 'Jadiid Yogi Syafi', 'Karanganyar', '2009-10-15', 'Laki-laki', '-', 'Karangasem 4/3 Sroyo Jaten Karanganyar', '-', '-', '-', '-', 'belumterverifikasi'),
('M00000009', 'Aurelia Wahyu Aradhea Reza', 'Karanganyar', '2000-06-12', 'Perempuan', '085673222333', 'Karangasem 4/3 Sroyo Jaten Karanganyar', '-', '-', '-', '-', 'belumterverifikasi'),
('M00000010', 'Dimas', 'Wonogiri', '2017-06-15', 'Laki-laki', '089000000000', 'Jatipuro Wonogiri', '-', '-', '-', '-', 'belumterverifikasi'),
('M00000011', 'Bella Okta T', 'Karanganyar', '2000-09-05', 'Perempuan', '-', '-', '-', '-', '-', '-', 'belumterverifikasi'),
('M00000012', 'M. Hanapi P', 'Karanganyar', '2000-06-12', 'Laki-laki', '-', '-', '-', '-', '-', '-', 'belumterverifikasi'),
('M00000013', 'Alifa Yii Adinda', 'Yogyakarta', '1997-11-22', 'Perempuan', '-', '-', '-', '-', '-', '-', 'belumterverifikasi'),
('M00000014', 'Yulia', 'Purwodadi', '2000-01-12', 'Perempuan', '089666555444', 'Tipes Solo', '-', '-', '-', 'yulia@yahoo.com', 'belumterverifikasi'),
('M00000015', 'Member', 'Solo', '2000-06-15', 'Laki-laki', '081000999397', 'Solo', '027102803', 'Solo', '0271978383', 'baru@yahoo.com', 'belumterverifikasi'),
('M00000016', 'cek 123', 'cek', '2004-04-13', 'Laki-laki', '-', '-', '--', '-', '-', '-', 'terverivikasi'),
('M00000017', 'Nama Nadi', 'Solo', '2000-04-19', 'Laki-laki', '-', '-', '-', '-', '-', '-', 'belumterverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `IdJual` varchar(11) NOT NULL,
  `IdMember` varchar(11) NOT NULL,
  `TglTransaksi` date NOT NULL,
  `GrandTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`IdJual`, `IdMember`, `TglTransaksi`, `GrandTotal`) VALUES
('J00000001', 'M00000002', '2018-04-03', 67500),
('J00000002', 'M00000001', '2018-04-09', 22500),
('J00000003', 'M00000014', '2018-04-09', 22500),
('J00000004', 'M00000011', '2018-04-09', 45000),
('J00000005', 'M00000001', '2018-04-10', 112500),
('J00000006', 'M00000001', '2018-04-10', 45000),
('J00000007', 'M00000001', '2018-04-10', 45000),
('J00000008', 'M00000001', '2018-04-10', 45000),
('J00000009', 'M00000001', '2018-04-10', 450000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `IdPrd` varchar(15) NOT NULL,
  `NamaPrd` varchar(50) NOT NULL,
  `Pengarang` varchar(50) NOT NULL,
  `Penerbit` varchar(50) NOT NULL,
  `Qty` int(13) NOT NULL,
  `Harga` int(13) NOT NULL,
  `transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`IdPrd`, `NamaPrd`, `Pengarang`, `Penerbit`, `Qty`, `Harga`, `transaksi`) VALUES
('P00000001', 'One Piece 1', 'Eiichiro Oda', 'Shonen Jump', 168, 22500, 22),
('P00000002', 'One Piece 2', 'Eiichiro Oda', 'Shonen Jump', 64, 22500, 27),
('P00000003', 'One Piece 3', 'Eiichiro Oda', 'Shonen Jump', 101, 22500, 21),
('P00000004', 'One Piece 4', 'Eiichiro Oda', 'Shonen Jump', 89, 22500, 15),
('P00000005', 'One Piece 5', 'Eiichiro Oda', 'Shonen Jump', 109, 22500, 7),
('P00000006', 'One Piece 6', 'Eiichiro Oda', 'Shonen Jump', 97, 22500, 15),
('P00000007', 'One Piece 7', 'Eiichiro Oda', 'Shonen Jump', 87, 22500, 7),
('P00000008', 'One Piece 8', 'Eiichiro Oda', 'Shonen Jump', 87, 22500, 9),
('P00000009', 'One Piece 9', 'Eiichiro Oda', 'Shonen Jump', 102, 22500, 11),
('P00000010', 'One Piece 10', 'Eiichiro Oda', 'Shonen Jump', 95, 22500, 6),
('P00000011', 'One Piece 11', 'Eiichiro Oda', 'Shonen Jump', 79, 22500, 6),
('P00000012', 'One Piece 12', 'Eiichiro Oda', 'Shonen Jump', 99, 22500, 15),
('P00000013', 'One Piece 13', 'Eiichiro Oda', 'Shonen Jump', 96, 22500, 21),
('P00000014', 'One Piece 14', 'Eiichiro Oda', 'Shonen Jump', 86, 22500, 15),
('P00000015', 'One Piece 15', 'Eiichiro Oda', 'Shonen Jump', 92, 22500, 18),
('P00000016', 'One Piece 16', 'Eiichiro Oda', 'Shonen Jump', 91, 22500, 14),
('P00000017', 'One Piece 17', 'Eiichiro Oda', 'Shonen Jump', 87, 22500, 13),
('P00000018', 'One Piece 18', 'Eiichiro Oda', 'Shonen Jump', 94, 22500, 31),
('P00000019', 'One Piece 19', 'Eiichiro Oda', 'Shonen Jump', 104, 22500, 19),
('P00000020', 'One Piece 20', 'Eiichiro Oda', 'Shonen Jump', 100, 22500, 17),
('P00000021', 'One Piece 21', 'Eiichiro Oda', 'Shonen Jump', 85, 22500, 29),
('P00000022', 'One Piece 22', 'Eiichiro Oda', 'Shonen Jump', 83, 22500, 6),
('P00000023', 'One Piece 23', 'Eiichiro Oda', 'Shonen Jump', 86, 22500, 13),
('P00000024', 'One Piece 24', 'Eiichiro Oda', 'Shonen Jump', 89, 22500, 20),
('P00000025', 'One Piece 25', 'Eiichiro Oda', 'Shonen Jump', 69, 22500, 9),
('P00000026', 'One Piece 26', 'Eiichiro Oda', 'Shonen Jump', 82, 22500, 6),
('P00000027', 'One Piece 27', 'Eiichiro Oda', 'Shonen Jump', 83, 22500, 8),
('P00000028', 'One Piece 28', 'Eiichiro Oda', 'Shonen Jump', 71, 22500, 13),
('P00000029', 'One Piece 29', 'Eiichiro Oda', 'Shonen Jump', 93, 22500, 14),
('P00000030', 'One Piece 30', 'Eiichiro Oda', 'Shonen Jump', 80, 22500, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sto`
--

CREATE TABLE `sto` (
  `IdSto` varchar(15) NOT NULL,
  `TglSto` date NOT NULL,
  `GrandSto` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sto`
--

INSERT INTO `sto` (`IdSto`, `TglSto`, `GrandSto`) VALUES
('S00000001', '2018-04-03', 2497500),
('S00000002', '2018-04-09', 517500),
('S00000003', '2018-04-10', 697500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(32) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `level` varchar(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `alamat`, `telepon`, `level`, `foto`) VALUES
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Yudhistira Gilang A', 'yudhistiragilang22@gmail.com', 'Karangasem 4/3 Sroyo Jaten Karanganyar', '085647247592', 'admin', 'member.png'),
(6, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'cobaa', 'yunanda.laravel@gmail.com', 'Mojosongo Surakarta', '08226558445', 'kasir', '1.png'),
(12, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Yunanda Laravel', 'lara.yunan@gmail.com', 'Karanganyar', '-', 'pimpinan', 'One-Piece-Chibi-PNG-Image.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detjual`
--
ALTER TABLE `detjual`
  ADD PRIMARY KEY (`IdDetJual`),
  ADD KEY `IdPrd` (`IdPrd`),
  ADD KEY `IdJual` (`IdJual`);

--
-- Indexes for table `detsto`
--
ALTER TABLE `detsto`
  ADD PRIMARY KEY (`IdDetSto`),
  ADD KEY `FK_Sto` (`IdSto`),
  ADD KEY `FK_sto1` (`IdPrd`);

--
-- Indexes for table `hasil_centroid`
--
ALTER TABLE `hasil_centroid`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`IdMember`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdJual`),
  ADD KEY `FK_penjualan1` (`IdMember`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`IdPrd`);

--
-- Indexes for table `sto`
--
ALTER TABLE `sto`
  ADD PRIMARY KEY (`IdSto`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detjual`
--
ALTER TABLE `detjual`
  MODIFY `IdDetJual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `detsto`
--
ALTER TABLE `detsto`
  MODIFY `IdDetSto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `hasil_centroid`
--
ALTER TABLE `hasil_centroid`
  MODIFY `nomor` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detjual`
--
ALTER TABLE `detjual`
  ADD CONSTRAINT `FK_DetJual1` FOREIGN KEY (`IdJual`) REFERENCES `penjualan` (`IdJual`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DetJual2` FOREIGN KEY (`IdPrd`) REFERENCES `produk` (`IdPrd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detsto`
--
ALTER TABLE `detsto`
  ADD CONSTRAINT `FK_DetSto1` FOREIGN KEY (`IdSto`) REFERENCES `sto` (`IdSto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DetSto2` FOREIGN KEY (`IdPrd`) REFERENCES `produk` (`IdPrd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_Jual1` FOREIGN KEY (`IdMember`) REFERENCES `member` (`IdMember`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
