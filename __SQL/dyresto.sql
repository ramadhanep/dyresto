-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 03:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dyresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `masakan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `sub_total` double NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `order_id`, `masakan_id`, `jumlah`, `sub_total`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 4, 20, 1010000, NULL, NULL, '2020-02-05 05:18:43', '2020-02-05 05:18:43'),
(4, 1, 3, 1, 97500, NULL, NULL, '2020-02-05 05:18:43', '2020-02-05 05:18:43'),
(5, 2, 3, 1, 97500, NULL, NULL, '2020-02-05 06:27:58', '2020-02-05 06:27:58'),
(6, 2, 2, 3, 135000, NULL, NULL, '2020-02-05 06:27:58', '2020-02-05 06:27:58'),
(7, 3, 3, 1, 97500, NULL, NULL, '2020-02-05 07:51:19', '2020-02-05 07:51:19'),
(8, 3, 4, 5, 252500, NULL, NULL, '2020-02-05 07:51:19', '2020-02-05 07:51:19'),
(9, 4, 4, 1, 50500, NULL, NULL, '2020-02-05 08:16:26', '2020-02-05 08:16:26'),
(10, 4, 3, 1, 97500, NULL, NULL, '2020-02-05 08:16:27', '2020-02-05 08:16:27'),
(11, 5, 8, 1, 35000, NULL, NULL, '2020-02-05 17:22:09', '2020-02-05 17:22:09'),
(12, 5, 8, 2, 70000, NULL, NULL, '2020-02-05 17:22:09', '2020-02-05 17:22:09'),
(13, 6, 12, 1, 20000, NULL, NULL, '2020-02-05 18:19:08', '2020-02-05 18:19:08'),
(14, 6, 6, 5, 125000, NULL, NULL, '2020-02-05 18:19:08', '2020-02-05 18:19:08'),
(15, 7, 12, 3, 60000, NULL, NULL, '2020-02-05 18:24:09', '2020-02-05 18:24:09'),
(16, 7, 6, 1, 25000, NULL, NULL, '2020-02-05 18:24:09', '2020-02-05 18:24:09'),
(17, 7, 5, 1, 20000, NULL, NULL, '2020-02-05 18:24:09', '2020-02-05 18:24:09'),
(18, 8, 11, 1, 30000, NULL, NULL, '2020-02-05 18:42:42', '2020-02-05 18:42:42'),
(19, 9, 10, 1, 25000, NULL, NULL, '2020-02-05 19:30:11', '2020-02-05 19:30:11'),
(20, 9, 6, 1, 25000, NULL, NULL, '2020-02-05 19:30:11', '2020-02-05 19:30:11'),
(21, 9, 5, 1, 20000, NULL, NULL, '2020-02-05 19:30:11', '2020-02-05 19:30:11'),
(22, 9, 7, 5, 100000, NULL, NULL, '2020-02-05 19:30:11', '2020-02-05 19:30:11'),
(23, 10, 11, 4, 120000, NULL, NULL, '2020-02-05 19:41:57', '2020-02-05 19:41:57'),
(24, 10, 7, 1, 20000, NULL, NULL, '2020-02-05 19:41:57', '2020-02-05 19:41:57'),
(25, 11, 7, 1, 20000, NULL, NULL, '2020-02-05 19:46:13', '2020-02-05 19:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_restorans`
--

CREATE TABLE `informasi_restorans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi_restorans`
--

INSERT INTO `informasi_restorans` (`id`, `nama`, `alamat`, `keterangan`, `telepon`, `foto`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 'Dyresto', 'Jl. Mayjen Soetoyo, Cawang, Kramatjati, RT.2/RW.9, Cawang, Kec. Kramat jati, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13630', '-', '(021) 8091773', '3d803c4ee1d426afd977fa82ce7e3373.jpeg', '13360', '2020-02-04 20:38:21', '2020-02-04 20:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_masakans`
--

CREATE TABLE `kategori_masakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_masakans`
--

INSERT INTO `kategori_masakans` (`id`, `kategori`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Italian Food', '4d1addfb7367475ad0cc55d4b85e9851.jpeg', '2020-02-04 20:49:30', '2020-02-04 20:49:30'),
(2, 'Korean Street Food', '8be57488003b089f58f1bf99a292181b.jpeg', '2020-02-04 20:53:40', '2020-02-04 20:53:40'),
(3, 'Thailand Street Food', '976be6e752fff3c1bdad29e83e359a29.jpeg', '2020-02-04 20:55:34', '2020-02-04 20:55:34'),
(4, 'Masakan Rumahan', '3a2b53921cd62434e4d8993d8e0e7e4c.jpeg', '2020-02-04 20:56:51', '2020-02-04 20:56:51'),
(5, 'Masakan Padang', '63f7524ec36446b0fde1a92678f3004b.jpeg', '2020-02-04 20:57:20', '2020-02-04 20:57:20'),
(6, 'Masakan Sunda', '3fc29356f463a6b8bca941be0f0fd5ed.jpeg', '2020-02-04 20:58:01', '2020-02-04 20:58:01'),
(7, 'Japan Traditional Food', 'd5c0899f778f98f1d9c6f683cca9c6b3.jpeg', '2020-02-04 20:58:51', '2020-02-04 20:58:51'),
(8, 'Masakan Jawa', '0c400389c981e1062d7744ee888deb64.jpeg', '2020-02-04 21:11:54', '2020-02-04 21:11:54'),
(9, 'Makanan Khas Betawi', '0329607b1bf95a72b2a8cc1453d285ec.jpeg', '2020-02-04 21:12:49', '2020-02-04 21:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `masakan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` bigint(20) UNSIGNED NOT NULL,
  `sub_total` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2020-02-04 20:38:20', '2020-02-04 20:38:20'),
(2, 'Waiter', '2020-02-04 20:38:20', '2020-02-04 20:38:20'),
(3, 'Kasir', '2020-02-04 20:38:20', '2020-02-04 20:38:20'),
(4, 'Owner', '2020-02-04 20:38:21', '2020-02-04 20:38:21'),
(5, 'Pelanggan', '2020-02-04 20:38:21', '2020-02-04 20:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `masakans`
--

CREATE TABLE `masakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_masakan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_masakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masakans`
--

INSERT INTO `masakans` (`id`, `kategori_masakan_id`, `nama_masakan`, `harga`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(2, 9, 'Soto Betawi', 45000, 'Tidak Tersedia', '0f45a832715111254e668c17e7bfb608.jpeg', '2020-02-04 21:29:56', '2020-02-05 07:06:49'),
(3, 3, 'Gyeran ppang', 97500, 'Tersedia', 'fb51904a7fa7dcc70a5233523c1e1100.jpeg', '2020-02-04 21:34:19', '2020-02-04 21:34:19'),
(4, 3, 'Sate Sosis dan Tteokbokki Goreng', 50500, 'Tersedia', '2362d1f4ad68281f015eaa97a3931516.jpeg', '2020-02-04 21:35:08', '2020-02-04 21:41:44'),
(5, 8, 'Garang Asem', 20000, 'Tersedia', 'b2e121ed3bf045199f232fc6d8957b68.jpeg', '2020-02-05 08:22:41', '2020-02-05 08:22:41'),
(6, 8, 'Nasi Gandul', 25000, 'Tersedia', '75dff2606a93abb502383bf38e268400.jpeg', '2020-02-05 08:23:10', '2020-02-05 08:23:10'),
(7, 8, 'Soto Kudus', 20000, 'Tersedia', '03fe353e8d18864aa8eb545dde86e3e5.jpeg', '2020-02-05 08:23:33', '2020-02-05 08:23:33'),
(8, 8, 'Brekecek Ikan', 35000, 'Tersedia', '8799ec6abb286d28f38df81fdf270cee.jpeg', '2020-02-05 08:24:05', '2020-02-05 08:24:05'),
(9, 8, 'Nasi Grombyang', 30000, 'Tersedia', '0285889e6fd7ff22c0e6531d81b10ae3.jpeg', '2020-02-05 08:24:39', '2020-02-05 08:24:39'),
(10, 8, 'Mie Ongklok', 25000, 'Tersedia', 'b7cadbd09e77631ce104022c9a0fedee.jpeg', '2020-02-05 08:25:12', '2020-02-05 08:25:12'),
(11, 8, 'Nasi Liwet', 30000, 'Tersedia', '6aec91f0be4586a3f8c5208cf7534159.jpeg', '2020-02-05 08:25:43', '2020-02-05 08:25:43'),
(12, 4, 'Nasi Goreng', 20000, 'Tersedia', '8be887979bd185bdae08c1e15df45717.jpeg', '2020-02-05 08:30:48', '2020-02-05 19:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `mejas`
--

CREATE TABLE `mejas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_meja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mejas`
--

INSERT INTO `mejas` (`id`, `no_meja`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'MJ001', '<p>Meja berada di pojok dekat kasir</p>', '2020-02-04 23:21:40', '2020-02-04 23:21:57'),
(2, 'MJ002', '<p>-</p>', '2020-02-05 00:27:09', '2020-02-05 00:27:09'),
(3, 'MJ003', '<p>-</p>', '2020-02-05 08:27:03', '2020-02-05 08:27:11'),
(4, 'MJ004', '<p>-</p>', '2020-02-05 08:27:20', '2020-02-05 08:27:20'),
(5, 'MJ005', '<p>-</p>', '2020-02-05 08:27:28', '2020-02-05 08:27:28'),
(6, 'MJ006', '<p>-</p>', '2020-02-05 08:27:36', '2020-02-05 08:27:36'),
(7, 'MJ007', '-', '2020-02-05 08:27:44', '2020-02-05 08:28:03'),
(8, 'MJ008', '<p>-</p>', '2020-02-05 08:28:12', '2020-02-05 08:28:12'),
(9, 'MJ009', '<p>-</p>', '2020-02-05 08:28:23', '2020-02-05 08:28:23'),
(10, 'MJ010', '<p>-</p>', '2020-02-05 08:28:31', '2020-02-05 08:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_levels_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2020_02_05_012033_create_kategori_masakans_table', 1),
(4, '2020_02_05_012101_create_masakans_table', 1),
(5, '2020_02_05_012149_create_mejas_table', 1),
(6, '2020_02_05_012151_create_orders_table', 1),
(7, '2020_02_05_012208_create_detail_orders_table', 1),
(8, '2020_02_05_012229_create_transaksis_table', 1),
(9, '2020_02_05_014212_create_informasi_restorans_table', 1),
(10, '2020_02_05_045511_create_keranjangs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `meja_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `meja_id`, `tanggal`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-02-05', '<p>Bakso bulat seperti bola pimpong</p>', 'Dalam Proses', '2020-02-05 05:18:43', '2020-02-05 05:18:43'),
(2, 1, 2, '2020-02-05', '<p>-</p>', 'Selesai', '2020-02-05 06:27:58', '2020-02-05 06:49:49'),
(3, 2, 1, '2020-02-05', '<p>-</p>', 'Dalam Proses', '2020-02-05 07:51:18', '2020-02-05 07:51:18'),
(4, 3, 1, '2020-02-05', '<p>-</p>', 'Selesai', '2020-02-05 08:16:26', '2020-02-05 08:20:42'),
(5, 1, 1, '2020-02-06', '<p>-</p>', 'Dalam Proses', '2020-02-05 17:22:09', '2020-02-05 17:22:09'),
(6, 1, 8, '2020-02-06', '<p>Tidak ada keterangan</p>', 'Dalam Proses', '2020-02-05 18:19:08', '2020-02-05 18:19:08'),
(7, 2, 7, '2020-02-06', '<p>Ga ada keterangan cuy</p>', 'Dalam Proses', '2020-02-05 18:24:09', '2020-02-05 18:24:09'),
(8, 3, 7, '2020-02-06', NULL, 'Dalam Proses', '2020-02-05 18:42:42', '2020-02-05 18:42:42'),
(9, 1, 1, '2020-02-06', '<p>-</p>', 'Dalam Proses', '2020-02-05 19:30:11', '2020-02-05 19:30:11'),
(10, 1, 5, '2020-02-06', 'Dua porsi tidak menggunakan <b>sambal</b>', 'Selesai', '2020-02-05 19:41:57', '2020-02-05 19:45:01'),
(11, 1, 1, '2020-02-06', '<p>-</p>', 'Dalam Proses', '2020-02-05 19:46:13', '2020-02-05 19:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kasir_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `total_pembayaran` double NOT NULL,
  `bayar` double NOT NULL,
  `kembalian` double NOT NULL,
  `metode_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `kasir_id`, `order_id`, `tanggal`, `total_pembayaran`, `bayar`, `kembalian`, `metode_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2020-02-05', 232500, 300000, 67500, 'Cash', '2020-02-05 06:49:49', '2020-02-05 06:49:49'),
(2, 3, 4, 4, '2020-02-05', 148000, 150000, 2000, 'Cash', '2020-02-05 08:20:42', '2020-02-05 08:20:42'),
(3, 1, 1, 10, '2020-02-06', 140000, 150000, 10000, 'Cash', '2020-02-05 19:45:01', '2020-02-05 19:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `restoran_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level_id`, `restoran_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `alamat`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Romadhan', 'romadhanedy', 'romadhanedy@gmail.com', NULL, '$2y$10$5uqNmXeV2e0UHbdjBjfiPep25xaq7R2D9CFONIapfaAXLKacLk.H.', NULL, '608a52fe336cdc8ddfb5c5466caa5ee0.jpeg', NULL, '2020-02-04 20:38:21', '2020-02-04 23:16:07'),
(2, 2, 1, '(Waiter) Demo', 'waiter', 'waiter@dyposten.com', NULL, '$2y$10$FkuGZdAE8nX/1hJP6ooSn.YnYF3JBEWL7vHhDEmtVziP.j1iZlyJS', '<p>-</p>', NULL, NULL, '2020-02-05 07:25:52', '2020-02-05 07:25:52'),
(3, 5, 1, '(Pelanggan) Demo', 'pelanggan', 'pelanggan@dyposten.com', NULL, '$2y$10$O3cxbBXrzvx39qSZ9Ic9JOs158PIzOTCvEZbK6kqQVYkGJov0l.Di', '<p>-</p>', NULL, NULL, '2020-02-05 07:26:17', '2020-02-05 07:26:17'),
(4, 3, 1, '(Demo) Kasir', 'kasir', 'kasir@dyposten.com', NULL, '$2y$10$jyhBljBzDLf2iXGFjBAqau4CBMWZFGWfzBM.EsKGl.qDAio7LvVHe', '<p>-</p>', NULL, 'VPGsMjzsPr5PYpQPK1LPK4vbJWhK84UFfYiqveTfAQXIsxZeCjMlpSqzv7do', '2020-02-05 07:26:55', '2020-02-05 07:26:55'),
(5, 4, 1, '(Demo) Owner', 'owner', 'owner@dyposten.com', NULL, '$2y$10$L/7hDq9h1d8j6wlrxt672eBG7rxcwvtDvko.QgKrOfAuaIyzWQxOG', '<p>-</p>', NULL, NULL, '2020-02-05 07:27:22', '2020-02-05 07:27:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_order_id_foreign` (`order_id`),
  ADD KEY `detail_orders_masakan_id_foreign` (`masakan_id`);

--
-- Indexes for table `informasi_restorans`
--
ALTER TABLE `informasi_restorans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_masakans`
--
ALTER TABLE `kategori_masakans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_user_id_foreign` (`user_id`),
  ADD KEY `keranjangs_masakan_id_foreign` (`masakan_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masakans`
--
ALTER TABLE `masakans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masakans_kategori_masakan_id_foreign` (`kategori_masakan_id`);

--
-- Indexes for table `mejas`
--
ALTER TABLE `mejas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_meja_id_foreign` (`meja_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`),
  ADD KEY `transaksis_order_id_foreign` (`order_id`),
  ADD KEY `kasir_id` (`kasir_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_level_id_foreign` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `informasi_restorans`
--
ALTER TABLE `informasi_restorans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori_masakans`
--
ALTER TABLE `kategori_masakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masakans`
--
ALTER TABLE `masakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mejas`
--
ALTER TABLE `mejas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_masakan_id_foreign` FOREIGN KEY (`masakan_id`) REFERENCES `masakans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_masakan_id_foreign` FOREIGN KEY (`masakan_id`) REFERENCES `masakans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `masakans`
--
ALTER TABLE `masakans`
  ADD CONSTRAINT `masakans_kategori_masakan_id_foreign` FOREIGN KEY (`kategori_masakan_id`) REFERENCES `kategori_masakans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_meja_id_foreign` FOREIGN KEY (`meja_id`) REFERENCES `mejas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_ibfk_1` FOREIGN KEY (`kasir_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksis_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
