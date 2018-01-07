-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mei 2017 pada 20.28
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `username`, `nama`, `password`, `jenis_kelamin`, `alamat`, `level`) VALUES
(1, 'admin', 'Admin', 'admin', 'Laki-Laki', 'Jakarta Timur ', 'admin'),
(5, 'novinoo', 'Novi Amalia Ardha', 'novinoo', 'Perempuan', 'Jalan Cipadung Permai ', 'user'),
(10, 'yogi', 'yogin', 'yogi', 'Laki-Laki', 'JKJK', 'user'),
(11, 'deva', 'Deva Mahenra', 'deva', 'Laki-Laki', 'jkt', 'user'),
(12, 'hamish', 'Hamish Daud', 'hamish', 'Laki-Laki', 'bandung', 'user'),
(13, 'tya', 'Shofi Zulfa Fathiyah', 'tya', 'Perempuan', 'Bekasi Utara', 'user'),
(14, 'ahmadarif', 'Ahmad Arif', 'ahmadarif', 'Laki-Laki', 'Bekasi', 'user'),
(15, 'alifrafi', 'Muhammad Alif Rafi', 'alifrafi', 'Laki-Laki', 'Bekasi Utara', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama`, `harga`, `deskripsi`, `gambar`) VALUES
('M001', 'Nasi Beef Teriyaki ', '28500', 'Nasi + daging sapi dengan saos teriyaki      ', '20170420110302.jpeg'),
('M002', 'Nasi Ayam Bakar', '15000', 'Nasi Putih + Ayam Bakar + Lalapan + Sambal   ', '20170420110348.jpg'),
('M004', 'Mie Aceh', '20000', 'Mie khas aceh dengan kuah yang spesial', 'mie4.png'),
('M005', 'Tumis Kangkung Telur Puyuh', '20000', 'Kangkung tumis telur puyuh + nasi putih + sambel', 'Tumis-kangkung-cah-telur-puyuh1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_user` int(11) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_menu` varchar(20) NOT NULL,
  `porsi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `area` enum('Jakarta Pusat','Jakarta Barat','Jakarta Selatan','Jakarta Timur','Jakarta Utara','Kepulauan Seribu','Kota Bogor','Kabupaten Bogor','Kota Depok','Kabupaten Tangerang','Kota Tangerang Selatan','Kota Bekasi','Kabupaten Bekasi') NOT NULL,
  `bank` enum('BCA','Mandiri','BRI','City Bank','HSBC') NOT NULL,
  `kurir` enum('Gojek','Grab','Uber','Blue Bird') NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_user`, `id_order`, `nama`, `id_menu`, `porsi`, `tanggal`, `alamat`, `area`, `bank`, `kurir`, `status`) VALUES
(13, 'C001', 'nnn', 'M005', 44, '2017-05-31', 'mnmnmn', 'Kota Bekasi', 'BCA', 'Uber', 2),
(13, 'C002', 'Fathiyah', 'M003', 23, '2017-05-31', 'Duta Bumi 5 no 77', 'Kota Bekasi', 'City Bank', 'Gojek', 2),
(5, 'C003', 'Novi Amalia', 'M005', 30, '2017-05-31', 'Vila Mutiara blok b1/2', 'Kabupaten Bekasi', 'BCA', 'Gojek', 1),
(5, 'C004', 'Nurfi Agnia', 'M002', 33, '2017-05-31', 'Permai Raya a.79', 'Kepulauan Seribu', 'BRI', 'Uber', 2),
(5, 'C005', 'Noni Wulandari', 'M004', 70, '2017-06-02', 'Rawamangun a7/90', 'Jakarta Timur', 'Mandiri', 'Gojek', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
