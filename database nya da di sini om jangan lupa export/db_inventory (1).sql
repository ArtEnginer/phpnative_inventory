-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 09:35 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(55) NOT NULL,
  `level` enum('Admin','superadmin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `nama`, `alamat`, `username`, `password`, `level`) VALUES
('78', 'jaka', 'jakarta', 'admin', '123', 'Admin'),
('D4853', 'abdul', 'brebes', 'abdul', '123', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` varchar(25) NOT NULL,
  `nama_barang` varchar(55) NOT NULL,
  `stok` varchar(25) NOT NULL,
  `id_jenis` varchar(25) NOT NULL,
  `id_satuan` varchar(55) NOT NULL,
  `warna` varchar(55) NOT NULL,
  `ukuran` varchar(55) NOT NULL,
  `keterangan` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `nama_barang`, `stok`, `id_jenis`, `id_satuan`, `warna`, `ukuran`, `keterangan`) VALUES
('BRG001', 'Plastik sayur', '200', '4', '1', 'biru', '20x30', 'ok tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `nama_jenis`) VALUES
(4, 'kresek'),
(5, 'klop');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'pcs'),
(3, 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(12) NOT NULL,
  `nama_supplier` varchar(55) NOT NULL,
  `no_telp` varchar(55) NOT NULL,
  `alamat` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
('spl3575', 'pt esevnan', '09009029090', 'jakarta'),
('spl4147', 'ruko haji dul kodar', '089782929292', 'jakarta utara');

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang_keluar`
--

CREATE TABLE `tbbarang_keluar` (
  `id_brgkeluar` varchar(90) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `warna` varchar(55) NOT NULL,
  `ukuran` varchar(55) NOT NULL,
  `jumlah_keluar` varchar(29) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `tujuan` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang_keluar`
--

INSERT INTO `tbbarang_keluar` (`id_brgkeluar`, `id_barang`, `warna`, `ukuran`, `jumlah_keluar`, `tgl_keluar`, `tujuan`) VALUES
('T-BK-001', 'BRG002', 'merah', '20x10', '30', '2022-06-13', 'sssss');

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang_masuk`
--

CREATE TABLE `tbbarang_masuk` (
  `id_brgmasuk` varchar(90) NOT NULL,
  `id_barang` varchar(25) NOT NULL,
  `warna` varchar(55) NOT NULL,
  `ukuran` varchar(55) NOT NULL,
  `id_supplier` varchar(55) NOT NULL,
  `jumlah` varchar(29) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang_masuk`
--

INSERT INTO `tbbarang_masuk` (`id_brgmasuk`, `id_barang`, `warna`, `ukuran`, `id_supplier`, `jumlah`, `tgl_masuk`, `status`) VALUES
('T-BM-001', 'BRG002', '20x10', 'merah', 'spl3575', '100', '2022-06-13', 'ok'),
('T-BM-002', 'BRG003', '20x60', 'hijau', 'spl3575', '40', '2022-06-13', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id` int(11) NOT NULL,
  `ukuran` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id`, `ukuran`) VALUES
(1, '20x60'),
(3, '20x10');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id` int(11) NOT NULL,
  `warna` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id`, `warna`) VALUES
(1, 'merah'),
(3, 'hijau');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbbarang_keluar`
--
ALTER TABLE `tbbarang_keluar`
  ADD PRIMARY KEY (`id_brgkeluar`);

--
-- Indexes for table `tbbarang_masuk`
--
ALTER TABLE `tbbarang_masuk`
  ADD PRIMARY KEY (`id_brgmasuk`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
