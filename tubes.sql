-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 08:37 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `datalist`
--

CREATE TABLE `datalist` (
  `id_list` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` float NOT NULL,
  `no_resi` int(11) NOT NULL,
  `kode_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datalist`
--

INSERT INTO `datalist` (`id_list`, `jumlah`, `total`, `no_resi`, `kode_obat`) VALUES
(1, 12, 240000, 9, 1001),
(2, 13, 260000, 9, 1001);

-- --------------------------------------------------------

--
-- Table structure for table `dataobat`
--

CREATE TABLE `dataobat` (
  `kode_obat` int(11) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jenis_obat` varchar(60) NOT NULL,
  `resobat` varchar(20) NOT NULL,
  `harga` float NOT NULL,
  `stok` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataobat`
--

INSERT INTO `dataobat` (`kode_obat`, `nama_obat`, `jenis_obat`, `resobat`, `harga`, `stok`, `username`) VALUES
(1001, 'betadine', 'Obat Luar', 'ss1', 20000, 80, 'irsan'),
(10002, 'inhaler', 'Obat Dalam', 'ss2', 120000, 100, 'irfan');

-- --------------------------------------------------------

--
-- Table structure for table `listpemesanan`
--

CREATE TABLE `listpemesanan` (
  `id_list` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` float NOT NULL,
  `no_resi` int(11) DEFAULT NULL,
  `kode_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rekapdata`
--

CREATE TABLE `rekapdata` (
  `no_rekap` int(11) NOT NULL,
  `obatmasuk` int(11) NOT NULL,
  `obatkeluar` int(11) NOT NULL,
  `tanggalrekap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resepdokter`
--

CREATE TABLE `resepdokter` (
  `noResi` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `resGambar` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resepdokter`
--

INSERT INTO `resepdokter` (`noResi`, `tgl_pesan`, `resGambar`, `username`) VALUES
(4, '2017-04-29', '16024-1.jpg', 'irfan'),
(5, '2017-04-30', '34324-4.png', 'copo'),
(6, '2017-05-01', '39599-1 (1).png', 'irfan'),
(7, '2017-05-03', '34511-6.png', 'ganteng'),
(8, '2017-05-03', '9737-6.png', 'ganteng'),
(9, '2017-05-03', '46624-6.png', 'ganteng'),
(10, '2017-05-03', '31614-6.png', 'ganteng');

-- --------------------------------------------------------

--
-- Table structure for table `tanparesep`
--

CREATE TABLE `tanparesep` (
  `no_resi` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanparesep`
--

INSERT INTO `tanparesep` (`no_resi`, `tgl_pemesanan`, `username`) VALUES
(9, '2017-05-02', 'ganteng');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `noResi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenispemesanan` int(11) NOT NULL,
  `totalharga` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `alamat`, `no_telp`, `status`) VALUES
('copo', 'copo', 'copo', 'copo', 1, 'pelanggan'),
('ganteng', 'ganteng', 'ganteng', 'ganteng', 0, 'pelanggan'),
('irfan', 'irfan', 'cupu', 'pbb', 0, 'pelanggan'),
('irsan', 'irsan', 'irsan', 'irsan', 1234, 'pegawai'),
('muthia', 'muthia', 'mut', 'pbb', 0, 'pemilik'),
('ragondt', 'paseban12', 'irsan', 'paseban', 2147483647, 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `validasiresep`
--

CREATE TABLE `validasiresep` (
  `idvalres` int(11) NOT NULL,
  `noResi` int(11) DEFAULT NULL,
  `no_resi` int(11) DEFAULT NULL,
  `buktibayar` varchar(30) NOT NULL,
  `dpres` float NOT NULL,
  `status` varchar(20) NOT NULL,
  `jenisPem` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasiresep`
--

INSERT INTO `validasiresep` (`idvalres`, `noResi`, `no_resi`, `buktibayar`, `dpres`, `status`, `jenisPem`) VALUES
(4, 4, NULL, 'belum upload', 50000, 'Belum di Bayar', 'resep'),
(5, 5, NULL, 'belum upload', 50000, 'Belum di Bayar', 'resep'),
(6, NULL, 4, 'belum upload', 50000, 'Belum di Bayar', 'tanpa resep'),
(7, NULL, 5, 'belum upload', 130000, 'Belum di Bayar', 'tanpa resep'),
(8, NULL, 6, 'belum upload', 120000, 'Belum di Bayar', 'tanpa resep'),
(9, 6, NULL, 'belum upload', 50000, 'Belum di Bayar', 'resep'),
(10, NULL, 7, 'belum upload', 6950000, 'Belum di Bayar', 'tanpa resep'),
(12, NULL, 8, 'belum upload', 1390000, 'Belum di Bayar', 'tanpa resep'),
(13, NULL, 9, 'belum upload', 250000, 'Belum di Bayar', 'tanpa resep'),
(14, 7, NULL, '44841-1.png', 50000, 'Belum di Bayar', 'resep'),
(15, 8, NULL, 'belum upload', 50000, 'Belum di Bayar', 'resep'),
(16, 9, NULL, 'belum upload', 50000, 'Belum di Bayar', 'resep'),
(17, 10, NULL, 'belum upload', 50000, 'Belum di Bayar', 'resep');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datalist`
--
ALTER TABLE `datalist`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `no_resi` (`no_resi`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `dataobat`
--
ALTER TABLE `dataobat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `listpemesanan`
--
ALTER TABLE `listpemesanan`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `no_resi` (`no_resi`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `rekapdata`
--
ALTER TABLE `rekapdata`
  ADD PRIMARY KEY (`no_rekap`);

--
-- Indexes for table `resepdokter`
--
ALTER TABLE `resepdokter`
  ADD PRIMARY KEY (`noResi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tanparesep`
--
ALTER TABLE `tanparesep`
  ADD PRIMARY KEY (`no_resi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `validasiresep`
--
ALTER TABLE `validasiresep`
  ADD PRIMARY KEY (`idvalres`),
  ADD KEY `noResi` (`noResi`),
  ADD KEY `noPem` (`no_resi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datalist`
--
ALTER TABLE `datalist`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dataobat`
--
ALTER TABLE `dataobat`
  MODIFY `kode_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;
--
-- AUTO_INCREMENT for table `listpemesanan`
--
ALTER TABLE `listpemesanan`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rekapdata`
--
ALTER TABLE `rekapdata`
  MODIFY `no_rekap` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resepdokter`
--
ALTER TABLE `resepdokter`
  MODIFY `noResi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tanparesep`
--
ALTER TABLE `tanparesep`
  MODIFY `no_resi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `validasiresep`
--
ALTER TABLE `validasiresep`
  MODIFY `idvalres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
