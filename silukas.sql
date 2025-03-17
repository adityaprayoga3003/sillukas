-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 11:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silukas`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpembelian`
--

CREATE TABLE `detailpembelian` (
  `id_pembelian` varchar(15) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `jumlah` float DEFAULT NULL,
  `total_harga` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpembelian`
--

INSERT INTO `detailpembelian` (`id_pembelian`, `id_produk`, `id_karyawan`, `jumlah`, `total_harga`, `created_at`, `updated_at`) VALUES
('1', 4, 1, 1, 20000, '2023-10-31 19:20:07', '2023-10-31 19:20:07'),
('2', 5, 4, 2, 40000, '2023-10-31 19:20:07', '2023-10-31 19:20:07'),
('3', 6, 5, 3, 60000, '2023-11-01 19:22:13', '2023-11-01 19:22:13'),
('4', 7, 6, 4, 60000, '2023-11-01 19:22:13', '2023-11-01 19:22:13'),
('5', 8, 7, 5, 100000, '2023-11-02 19:23:57', '2023-11-02 19:23:57'),
('J1699712160', 8, NULL, 1, 20000, '2023-11-11 08:16:00', '2023-11-11 08:16:00'),
('J1699712437', 8, 1, 1, 20000, '2023-11-11 08:20:37', '2023-11-11 08:20:37'),
('B1699715443', 9, 1, 1, 10000, '2023-11-11 09:10:43', '2023-11-11 09:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `id_penjualan` varchar(15) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `jumlah` float DEFAULT NULL,
  `total_harga` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`id_penjualan`, `id_produk`, `id_karyawan`, `jumlah`, `total_harga`, `created_at`, `updated_at`) VALUES
('1', 4, 1, 2, 40000, '2023-10-31 13:15:39', '2023-10-31 13:15:39'),
('2', 5, 4, 2, 40000, '2023-10-31 13:15:39', '2023-10-31 13:15:39'),
('3', 6, 5, 3, 60000, '2023-11-01 13:18:22', '2023-11-01 13:18:22'),
('4', 7, 6, 3, 45000, '2023-11-01 13:18:22', '2023-11-01 13:18:22'),
('5', 8, 7, 4, 80000, '2023-11-02 13:20:55', '2023-11-02 13:20:55'),
('J1699709630', 8, NULL, 1, 20000, '2023-11-11 07:33:50', '2023-11-11 07:33:50'),
('J1699709827', 8, NULL, 1, 20000, '2023-11-11 07:37:07', '2023-11-11 07:37:07'),
('J1699710390', 8, 1, 1, 20000, '2023-11-11 07:46:30', '2023-11-11 07:46:30'),
('J1699710874', 8, 1, 1, 20000, '2023-11-11 07:54:34', '2023-11-11 07:54:34'),
('J1700018635', 8, 1, 1, 20000, '2023-11-14 21:23:55', '2023-11-14 21:23:55'),
('J1700018706', 9, 7, 1, 10000, '2023-11-14 21:25:06', '2023-11-14 21:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksicukur`
--

CREATE TABLE `detailtransaksicukur` (
  `id_karyawan` int(11) DEFAULT NULL,
  `id_transaksicukur` varchar(15) DEFAULT NULL,
  `jumlah` float DEFAULT NULL,
  `diskon` float DEFAULT NULL,
  `total_harga` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailtransaksicukur`
--

INSERT INTO `detailtransaksicukur` (`id_karyawan`, `id_transaksicukur`, `jumlah`, `diskon`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 0, 28000, '2023-10-31 19:25:48', '2023-10-31 19:25:48'),
(4, '2', 1, 0, 35000, '2023-10-31 19:25:48', '2023-10-31 19:25:48'),
(5, '3', 1, 0, 47000, '2023-11-01 19:31:35', '2023-11-01 19:31:35'),
(6, '4', 1, 0, 32000, '2023-11-01 19:31:35', '2023-11-01 19:31:35'),
(7, '5', 1, 0, 22000, '2023-11-02 19:32:57', '2023-11-02 19:32:57'),
(1, '0', 1, NULL, 35000, '2023-11-12 09:59:57', '2023-11-12 09:59:57'),
(1, '0', 1, 3000, 28000, '2023-11-12 10:05:58', '2023-11-12 10:05:58'),
(1, '0', 1, 3000, 28000, '2023-11-12 10:06:01', '2023-11-12 10:06:01'),
(1, '0', 1, 8000, 28000, '2023-11-12 10:06:50', '2023-11-12 10:06:50'),
(1, 'C1699805387', 1, 3000, 28000, '2023-11-12 10:09:47', '2023-11-12 10:09:47'),
(6, 'C1699806005', 1, 10000, 35000, '2023-11-12 10:20:05', '2023-11-12 10:20:05'),
(6, 'C1699806013', 1, 10000, 35000, '2023-11-12 10:20:13', '2023-11-12 10:20:13'),
(6, 'C1699806014', 1, 10000, 35000, '2023-11-12 10:20:14', '2023-11-12 10:20:14'),
(6, 'C1699806098', 1, 10000, 35000, '2023-11-12 10:21:38', '2023-11-12 10:21:38'),
(14, 'C1699806131', 1, 3000, 35000, '2023-11-12 10:22:11', '2023-11-12 10:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp_karyawan` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `nohp_karyawan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rioo andika', 'lamongan', '1234567891011', '0000-00-00 00:00:00', '2023-11-07 05:49:21', '0000-00-00 00:00:00'),
(3, 'rio', '', '12345678910', '0000-00-00 00:00:00', '2023-10-28 09:37:26', '2023-10-28 09:37:26'),
(4, 'syahrul', '', '123', '0000-00-00 00:00:00', '2023-11-08 01:17:14', '2023-11-08 01:17:14'),
(5, 'yohanes kevin', '', '1111', '2023-10-28 09:35:31', '2023-11-08 01:27:35', '2023-11-08 01:27:35'),
(6, 'aprilio', 'mdn', '999999999999', '2023-10-31 01:10:58', '2023-11-08 01:27:58', '0000-00-00 00:00:00'),
(7, 'arta', '', '888888888888', '2023-10-31 01:11:35', '2023-10-31 01:11:35', '0000-00-00 00:00:00'),
(8, 'sdaf', '', 'asfffadg', '2023-11-05 09:43:49', '2023-11-05 09:43:49', '0000-00-00 00:00:00'),
(9, 'rr', '', '111111', '2023-11-05 09:53:12', '2023-11-05 09:53:35', '0000-00-00 00:00:00'),
(10, '34567', '', '123456', '2023-11-05 09:55:13', '2023-11-07 05:49:32', '2023-11-07 05:49:32'),
(11, 'riaoooo', 'babarsari', '123', '2023-11-05 18:44:11', '2023-11-08 01:27:29', '0000-00-00 00:00:00'),
(12, 'ppp', 'p', '01', '2023-11-07 21:59:42', '2023-11-07 21:59:59', '2023-11-07 21:59:59'),
(13, 'wqeqwe', 'qweqweqwe', '02132456789723', '2023-11-08 00:11:56', '2023-11-08 00:12:12', '2023-11-08 00:12:12'),
(14, 'yoga', 'pku', '08132424', '2023-11-08 01:27:16', '2023-11-08 01:27:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategoricukur`
--

CREATE TABLE `kategoricukur` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoricukur`
--

INSERT INTO `kategoricukur` (`id`, `nama_kategori`, `harga`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'economy class', 28000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'bussines class', 35000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'executive class', 47000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'premium', 32000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'hanya cukur', 22000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'r', 10000, '2023-11-12 08:01:23', '2023-11-12 08:34:00', '2023-11-12 08:34:00'),
(7, 'ri', 1000, '2023-11-12 08:01:45', '2023-11-12 08:34:05', '2023-11-12 08:34:05'),
(8, 'io', 10000, '2023-11-12 08:04:30', '2023-11-12 08:04:30', '0000-00-00 00:00:00'),
(9, 'rioandika', 100000, '2023-11-12 08:07:39', '2023-11-12 08:33:15', '0000-00-00 00:00:00'),
(10, 'rioan', 100000, '2023-11-12 08:11:52', '2023-11-12 08:33:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp_pelanggan` varchar(20) DEFAULT NULL,
  `jumlah_cukur` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `nohp_pelanggan`, `jumlah_cukur`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'yoga', '', '111111111111', 1, '2023-11-08 14:16:02', '2023-11-08 14:16:30', '2023-11-08 14:16:30'),
(2, 'rio', '', '222222222222', 2, '2023-11-08 14:16:02', '2023-11-08 14:16:30', '2023-11-08 14:16:30'),
(3, 'syahrul', '', '333333333333', 3, '2023-11-08 14:16:02', '2023-11-08 14:16:30', '2023-11-08 14:16:30'),
(4, 'zaka', '', '444444444444', 4, '2023-11-08 14:16:02', '2023-11-08 14:16:30', '2023-11-08 14:16:30'),
(5, 'izam', '', '555555555555', 1, '2023-11-08 14:16:02', '2023-11-08 14:16:30', '2023-11-08 14:16:30'),
(9, 'ria', 'jogja', '1234', 1, '2023-11-08 14:16:02', '2023-11-08 14:16:30', '2023-11-08 14:16:30'),
(12, 'yogaa', 'asdasda', '81231230', 1, '2023-11-08 01:18:45', '2023-11-08 02:05:15', '2023-11-08 02:05:15'),
(13, 't', 'er', '0123', 0, '2023-11-08 02:04:33', '2023-11-08 02:05:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `created_at`, `updated_at`, `id_pengguna`) VALUES
('1', '2023-10-31 07:48:09', NULL, 2),
('10', '2023-11-04 10:23:18', '2023-11-04 10:23:18', NULL),
('11', '2023-11-04 10:23:18', '2023-11-04 10:23:18', NULL),
('12', '2023-11-04 10:28:15', '2023-11-04 10:28:15', NULL),
('13', '2023-11-04 10:29:19', '2023-11-04 10:29:19', NULL),
('14', '2023-11-04 10:33:26', '2023-11-04 10:33:26', NULL),
('15', '2023-11-04 10:36:37', '2023-11-04 10:36:37', NULL),
('16', '2023-11-05 18:47:25', '2023-11-05 18:47:25', NULL),
('17', '2023-11-05 18:47:27', '2023-11-05 18:47:27', NULL),
('18', '2023-11-05 18:50:39', '2023-11-05 18:50:39', NULL),
('19', '2023-11-05 18:51:22', '2023-11-05 18:51:22', NULL),
('2', '2023-10-31 07:48:09', NULL, 2),
('20', '2023-11-05 22:06:08', '2023-11-05 22:06:08', NULL),
('21', '2023-11-05 22:09:29', '2023-11-05 22:09:29', NULL),
('22', '2023-11-05 22:16:09', '2023-11-05 22:16:09', NULL),
('23', '2023-11-11 08:16:00', '2023-11-11 08:16:00', 10),
('24', '2023-11-11 08:20:37', '2023-11-11 08:20:37', 10),
('3', '2023-11-01 07:51:09', NULL, 2),
('4', '2023-11-01 07:51:09', NULL, 2),
('5', '2023-11-02 07:51:45', NULL, 2),
('6', '2023-11-04 10:23:14', '2023-11-04 10:23:14', NULL),
('7', '2023-11-04 10:23:17', '2023-11-04 10:23:17', NULL),
('8', '2023-11-04 10:23:18', '2023-11-04 10:23:18', NULL),
('9', '2023-11-04 10:23:18', '2023-11-04 10:23:18', NULL),
('B1699715443', '2023-11-11 09:10:43', '2023-11-11 09:10:43', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `username`, `password`, `id_role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'yogaa', 'sdawqeqeqwe', 'karyawan', 'karyawan', 2, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(3, 'r', 'r@gmail.com', 'owner', 'manager', 1, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(4, 'i', 'i@gmail.com', 'karyawan', 'admin', 2, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(5, 'o', 'o@gmail.com', 'owner', 'ceo', 1, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(9, '', '', 'rio', '$2y$10$ZYzl/BGbYVfFETnUgD9uUOB0sG/INIrevCmwcph1U5jzP1/BCIHv2', 1, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(10, 'yoga', '', 'yoga', '$2y$10$1AOE0UhmUYR9Bc/lvsAkYut8Pnqfr1X4dI6Tc/YjYOp3f0eU4afjW', 1, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(11, '', 'rioandika@gmail.com', 'rio andika', '$2y$10$o1bPxnnaM8EhEfuh7oARuOWgtPEUJA2uRLb3J6slN/PBJSIR9m5tu', 2, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(17, '', 'owner@gmail.com', 'hahahahaha', '$2y$10$roZPrNsPn6RMjyj0ET8DZeS0nIyeRjzdo/k8XkIM.WXUElBgg41fO', 2, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(18, 'kenapa', 'kenapaa', 'kenapaaa', '$2y$10$YwhNGdB5BHAMND/AD.Fm8uv7GUD455xn.uVidD705FfUxelRrbdBq', 1, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(19, 'awdada', 'awwada@gmail.com', 'awdawda', '$2y$10$UWDyafx45mVvrE1IHoqdp.Gd8JhVkQua1YAOvAPaDU5vmr1WGE.w6', 1, '2023-11-08 14:13:29', '2023-11-08 14:13:29', '2023-11-08 14:10:50'),
(20, 'UTS', 'admin@gmail.com', 'yoga', '$2y$10$ubsYf3Ip3V8zIWYk5U523.KV4rZaPyLSnYK/T.LsU/Fpz7wJYye/O', 1, '2023-11-08 01:14:16', '2023-11-08 01:17:00', '2023-11-08 01:17:00'),
(21, 'owner1', 'owner12@gmail.com', 'owner1', '$2y$10$UE1/Al9.1K9QsxBjP6JK9.pPaUPmT2Z7hthrFNy4Pj9VBBdcb0YRW', 1, '2023-11-08 01:19:19', '2023-11-08 01:26:36', '2023-11-08 01:26:36'),
(22, 'karyawan', 'karywan1@gmail.com', 'karyawan', '$2y$10$DgAtZA7zI/Hwv5sRn7/1quRCzIEr./tOW.Y.w8PGr4B3Ei7qntRYa', 2, '2023-11-08 01:20:37', '2023-11-08 01:22:22', '2023-11-08 01:22:22'),
(23, 'karyawan1', 'karywan12@gmail.com', 'karyawan123', '$2y$10$WH6Py3RpP32n4MAJ1yY7eu.cvnqsTc4Q3eeWqoh0gze54/KLVfdMq', 2, '2023-11-08 01:25:54', '2023-11-08 01:29:27', NULL),
(24, '', 'ri@gmail.com', 'rio andika', '$2y$10$rwni53ksrentrNKXcl.wheI0NGSybMl6NzIvIbzCwCEPvE4g/NbVa', 2, '2023-11-08 01:43:21', '2023-11-08 01:43:21', NULL),
(25, 'rio', 'rioandika46@gmail.com', 'rioandika', '$2y$10$IEhDkGmA6qGsrBqVbQUgiOqLVkOsVbkTntFrJsXPPedN6ZW687lKa', 1, '2023-11-11 07:53:46', '2023-11-11 07:53:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `created_at`, `updated_at`, `id_pengguna`, `id_pelanggan`) VALUES
('1', '2023-10-31 07:44:01', NULL, 2, 1),
('2', '2023-10-31 07:44:01', NULL, 2, 2),
('3', '2023-11-01 07:46:38', NULL, 2, 3),
('4', '2023-11-01 07:46:38', NULL, 2, 4),
('5', '2023-11-02 07:47:30', NULL, 2, 5),
('6', '2023-11-08 14:20:53', '2023-11-08 14:20:53', 22, 12),
('7', '2023-11-11 07:18:12', '2023-11-11 07:18:12', NULL, NULL),
('J1699709630', '2023-11-11 07:33:50', '2023-11-11 07:33:50', NULL, NULL),
('J1699709827', '2023-11-11 07:37:07', '2023-11-11 07:37:07', 10, NULL),
('J1699710390', '2023-11-11 07:46:30', '2023-11-11 07:46:30', 10, NULL),
('J1699710874', '2023-11-11 07:54:34', '2023-11-11 07:54:34', 25, NULL),
('J1700018635', '2023-11-14 21:23:55', '2023-11-14 21:23:55', 10, NULL),
('J1700018706', '2023-11-14 21:25:06', '2023-11-14 21:25:06', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `stok_produk` int(10) NOT NULL,
  `harga` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `stok_produk`, `harga`, `created_at`, `updated_at`, `deleted_at`, `cover`) VALUES
(1, 'riooo', 9, 10000, '2023-10-17 09:03:47', '2023-11-07 22:52:12', '2023-11-07 22:52:12', '1697551427_94970c3780c351d2eec4.png'),
(4, 'pomade ', 5, 20000, '2023-10-17 09:33:01', '2023-11-07 22:40:30', '2023-11-07 22:40:30', '1699418423_cd44363015140ae39130.png'),
(5, 'minyak rambut ', 6, 20000, '2023-10-17 09:33:42', '2023-11-07 22:50:26', '2023-11-07 22:50:26', '1699419022_bf28ba6e24cef4a1e944.png'),
(6, 'sabun rambut', 100, 20000, '2023-10-31 01:12:30', '2023-11-08 01:17:21', '2023-11-08 01:17:21', '1698732750_bdf8d3a6ce496aa003e8.png'),
(7, 'hair tonic', 20, 10000, '2023-10-31 01:14:02', '2023-11-08 02:03:39', '2023-11-08 02:03:39', '1698732842_581be05470873a71957e.png'),
(8, 'hair powder', 14, 20000, '2023-10-31 01:14:42', '2023-11-14 21:23:55', '0000-00-00 00:00:00', '1698732882_b87c3c4465a3f876e3c5.png'),
(9, 'r', 20, 10000, '2023-11-05 21:59:18', '2023-11-14 21:25:06', '0000-00-00 00:00:00', '1699243158_52341b7e6ec1e71f28e0.png'),
(10, 'ss', 50, 15000, '2023-11-07 03:56:54', '2023-11-07 05:44:56', '2023-11-07 05:44:56', 'default.jpg'),
(11, 'ppp', 10, 10000, '2023-11-07 21:58:08', '2023-11-07 21:58:30', '2023-11-07 21:58:30', '1699415888_10a938c9e5e2d7d0fdd6.png'),
(12, 'test', 10, 100000, '2023-11-07 22:34:12', '2023-11-07 23:07:44', '2023-11-07 23:07:44', '1699418064_2a676d33db1ce56847e0.png'),
(13, 'qeqweqweqw', 10, 1000000, '2023-11-08 00:08:41', '2023-11-08 00:09:10', '2023-11-08 00:09:10', '1699423745_0959e8414d4363c8bebe.png'),
(14, 'p', 1, 1, '2023-11-08 02:02:50', '2023-11-08 02:02:50', '0000-00-00 00:00:00', '1699430570_43a75ecf2217519a699d.png');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'owner'),
(2, 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksicukur`
--

CREATE TABLE `transaksicukur` (
  `id_transaksicukur` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksicukur`
--

INSERT INTO `transaksicukur` (`id_transaksicukur`, `created_at`, `updated_at`, `id_pelanggan`, `id_pengguna`, `id`) VALUES
('3', '2023-11-01 08:13:21', NULL, 3, 2, 3),
('4', '2023-11-01 08:13:21', NULL, 4, 2, 4),
('5', '2023-11-02 08:14:17', NULL, 5, 2, 5),
('C1699805387', '2023-10-31 08:12:14', '2023-11-12 10:09:47', 13, 25, 1),
('C1699806014', '2023-10-31 08:12:14', '2023-11-12 10:20:14', 13, 25, 2),
('C1699806098', '2023-11-12 10:21:38', '2023-11-12 10:21:38', 13, 25, NULL),
('C1699806131', '2023-11-12 10:22:11', '2023-11-12 10:22:11', 13, 25, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpembelian`
--
ALTER TABLE `detailpembelian`
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `detailtransaksicukur`
--
ALTER TABLE `detailtransaksicukur`
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_transaksicukur` (`id_transaksicukur`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategoricukur`
--
ALTER TABLE `kategoricukur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksicukur`
--
ALTER TABLE `transaksicukur`
  ADD PRIMARY KEY (`id_transaksicukur`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_kategori` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategoricukur`
--
ALTER TABLE `kategoricukur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD CONSTRAINT `detailpenjualan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detailpenjualan_ibfk_2` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`),
  ADD CONSTRAINT `detailpenjualan_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
