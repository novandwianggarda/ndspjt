-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2019 at 09:44 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_pemilu`
--

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 1, 'created', 'App\\Penduduk', 1, '[]', '{\"nokk\":null,\"nik\":null,\"nama\":null,\"ttl\":null,\"tgl\":null,\"statusper\":null,\"disabi\":null,\"ket\":null,\"id\":1}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:17:27', '2019-02-21 06:17:27'),
(2, 'App\\User', 1, 'created', 'App\\Penduduk', 2, '[]', '{\"nokk\":null,\"nik\":null,\"nama\":null,\"ttl\":null,\"tgl\":null,\"statusper\":null,\"disabi\":null,\"ket\":null,\"id\":2}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:18:11', '2019-02-21 06:18:11'),
(3, 'App\\User', 1, 'created', 'App\\Penduduk', 3, '[]', '{\"nokk\":null,\"nik\":null,\"nama\":null,\"ttl\":null,\"tgl\":null,\"statusper\":null,\"disabi\":null,\"ket\":null,\"id\":3}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:18:35', '2019-02-21 06:18:35'),
(4, 'App\\User', 1, 'created', 'App\\Penduduk', 4, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324080511******\",\"nama\":\"SODIKIN\",\"ttl\":\"KENDAL\",\"tgl\":\"05|11|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":4}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:18:35', '2019-02-21 06:18:35'),
(5, 'App\\User', 1, 'created', 'App\\Penduduk', 5, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324085306******\",\"nama\":\"TASMIATUN\",\"ttl\":\"KENDAL\",\"tgl\":\"13|06|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":5}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:18:35', '2019-02-21 06:18:35'),
(6, 'App\\User', 1, 'created', 'App\\Penduduk', 6, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324051502******\",\"nama\":\"NUR KHAMID\",\"ttl\":\"KENDAL\",\"tgl\":\"15|02|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":6}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:18:35', '2019-02-21 06:18:35'),
(7, 'App\\User', 1, 'created', 'App\\Penduduk', 7, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324205607******\",\"nama\":\"SITI MUSYAROFAH\",\"ttl\":\"KENDAL\",\"tgl\":\"16|07|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":7}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:18:35', '2019-02-21 06:18:35'),
(8, 'App\\User', 1, 'created', 'App\\Penduduk', 8, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324201802******\",\"nama\":\"SUKIRMAN\",\"ttl\":\"KENDAL\",\"tgl\":\"18|02|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":8}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:18:35', '2019-02-21 06:18:35'),
(9, 'App\\User', 1, 'created', 'App\\Penduduk', 9, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324204603******\",\"nama\":\"RUBAIYAH\",\"ttl\":\"KENDAL\",\"tgl\":\"06|03|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":9}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:18:36', '2019-02-21 06:18:36'),
(10, 'App\\User', 1, 'created', 'App\\Penduduk', 10, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324082507******\",\"nama\":\"JAUYAK\",\"ttl\":\"KENDAL\",\"tgl\":\"25|07|****\",\"statusper\":\"B\",\"disabi\":0,\"ket\":null,\"id\":10}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:18:36', '2019-02-21 06:18:36'),
(11, 'App\\User', 1, 'created', 'App\\Penduduk', 1, '[]', '{\"nokk\":null,\"nik\":null,\"nama\":null,\"ttl\":null,\"tgl\":null,\"statusper\":null,\"disabi\":null,\"ket\":null,\"id\":1}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:26:40', '2019-02-21 06:26:40'),
(12, 'App\\User', 1, 'created', 'App\\Penduduk', 2, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324080511******\",\"nama\":\"SODIKIN\",\"ttl\":\"KENDAL\",\"tgl\":\"05|11|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":2}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:26:40', '2019-02-21 06:26:40'),
(13, 'App\\User', 1, 'created', 'App\\Penduduk', 3, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324085306******\",\"nama\":\"TASMIATUN\",\"ttl\":\"KENDAL\",\"tgl\":\"13|06|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":3}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:26:40', '2019-02-21 06:26:40'),
(14, 'App\\User', 1, 'created', 'App\\Penduduk', 4, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324051502******\",\"nama\":\"NUR KHAMID\",\"ttl\":\"KENDAL\",\"tgl\":\"15|02|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":4}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:26:40', '2019-02-21 06:26:40'),
(15, 'App\\User', 1, 'created', 'App\\Penduduk', 5, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324205607******\",\"nama\":\"SITI MUSYAROFAH\",\"ttl\":\"KENDAL\",\"tgl\":\"16|07|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":5}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:26:40', '2019-02-21 06:26:40'),
(16, 'App\\User', 1, 'created', 'App\\Penduduk', 6, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324201802******\",\"nama\":\"SUKIRMAN\",\"ttl\":\"KENDAL\",\"tgl\":\"18|02|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":6}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:26:40', '2019-02-21 06:26:40'),
(17, 'App\\User', 1, 'created', 'App\\Penduduk', 7, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324204603******\",\"nama\":\"RUBAIYAH\",\"ttl\":\"KENDAL\",\"tgl\":\"06|03|****\",\"statusper\":\"S\",\"disabi\":0,\"ket\":null,\"id\":7}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:26:41', '2019-02-21 06:26:41'),
(18, 'App\\User', 1, 'created', 'App\\Penduduk', 8, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324082507******\",\"nama\":\"JAUYAK\",\"ttl\":\"KENDAL\",\"tgl\":\"25|07|****\",\"statusper\":\"B\",\"disabi\":0,\"ket\":null,\"id\":8}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:26:41', '2019-02-21 06:26:41'),
(19, 'App\\User', 1, 'created', 'App\\Penduduk', 1, '[]', '{\"nokk\":null,\"nik\":null,\"nama\":null,\"ttl\":null,\"tgl\":null,\"statusper\":null,\"jkl\":null,\"jl\":null,\"rt\":null,\"rw\":null,\"disabi\":null,\"ket\":null,\"id\":1}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:31:07', '2019-02-21 06:31:07'),
(20, 'App\\User', 1, 'created', 'App\\Penduduk', 2, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324080511******\",\"nama\":\"SODIKIN\",\"ttl\":\"KENDAL\",\"tgl\":\"05|11|****\",\"statusper\":\"S\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":2}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:31:07', '2019-02-21 06:31:07'),
(21, 'App\\User', 1, 'created', 'App\\Penduduk', 3, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324085306******\",\"nama\":\"TASMIATUN\",\"ttl\":\"KENDAL\",\"tgl\":\"13|06|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":3}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:31:07', '2019-02-21 06:31:07'),
(22, 'App\\User', 1, 'created', 'App\\Penduduk', 4, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324051502******\",\"nama\":\"NUR KHAMID\",\"ttl\":\"KENDAL\",\"tgl\":\"15|02|****\",\"statusper\":\"S\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":4}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:31:08', '2019-02-21 06:31:08'),
(23, 'App\\User', 1, 'created', 'App\\Penduduk', 5, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324205607******\",\"nama\":\"SITI MUSYAROFAH\",\"ttl\":\"KENDAL\",\"tgl\":\"16|07|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":5}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:31:08', '2019-02-21 06:31:08'),
(24, 'App\\User', 1, 'created', 'App\\Penduduk', 6, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324201802******\",\"nama\":\"SUKIRMAN\",\"ttl\":\"KENDAL\",\"tgl\":\"18|02|****\",\"statusper\":\"S\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":6}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:31:08', '2019-02-21 06:31:08'),
(25, 'App\\User', 1, 'created', 'App\\Penduduk', 7, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324204603******\",\"nama\":\"RUBAIYAH\",\"ttl\":\"KENDAL\",\"tgl\":\"06|03|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":7}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:31:08', '2019-02-21 06:31:08'),
(26, 'App\\User', 1, 'created', 'App\\Penduduk', 8, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324082507******\",\"nama\":\"JAUYAK\",\"ttl\":\"KENDAL\",\"tgl\":\"25|07|****\",\"statusper\":\"B\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":8}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:31:08', '2019-02-21 06:31:08'),
(27, 'App\\User', 1, 'created', 'App\\Penduduk', 1, '[]', '{\"nokk\":null,\"nik\":null,\"nama\":null,\"ttl\":null,\"tgl\":null,\"statusper\":null,\"jkl\":null,\"jl\":null,\"rt\":null,\"rw\":null,\"disabi\":null,\"ket\":null,\"id\":1}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:55', '2019-02-21 06:43:55'),
(28, 'App\\User', 1, 'created', 'App\\Penduduk', 2, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324080511******\",\"nama\":\"SODIKIN\",\"ttl\":\"KENDAL\",\"tgl\":\"05|11|****\",\"statusper\":\"S\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":2}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:55', '2019-02-21 06:43:55'),
(29, 'App\\User', 1, 'created', 'App\\Penduduk', 3, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324085306******\",\"nama\":\"TASMIATUN\",\"ttl\":\"KENDAL\",\"tgl\":\"13|06|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":3}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:56', '2019-02-21 06:43:56'),
(30, 'App\\User', 1, 'created', 'App\\Penduduk', 4, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324051502******\",\"nama\":\"NUR KHAMID\",\"ttl\":\"KENDAL\",\"tgl\":\"15|02|****\",\"statusper\":\"S\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":4}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:56', '2019-02-21 06:43:56'),
(31, 'App\\User', 1, 'created', 'App\\Penduduk', 5, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324205607******\",\"nama\":\"SITI MUSYAROFAH\",\"ttl\":\"KENDAL\",\"tgl\":\"16|07|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":5}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:56', '2019-02-21 06:43:56'),
(32, 'App\\User', 1, 'created', 'App\\Penduduk', 6, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324201802******\",\"nama\":\"SUKIRMAN\",\"ttl\":\"KENDAL\",\"tgl\":\"18|02|****\",\"statusper\":\"S\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":6}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:56', '2019-02-21 06:43:56'),
(33, 'App\\User', 1, 'created', 'App\\Penduduk', 7, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324204603******\",\"nama\":\"RUBAIYAH\",\"ttl\":\"KENDAL\",\"tgl\":\"06|03|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":7}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:56', '2019-02-21 06:43:56'),
(34, 'App\\User', 1, 'created', 'App\\Penduduk', 8, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324082507******\",\"nama\":\"JAUYAK\",\"ttl\":\"KENDAL\",\"tgl\":\"25|07|****\",\"statusper\":\"B\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":8}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:56', '2019-02-21 06:43:56'),
(35, 'App\\User', 1, 'created', 'App\\Penduduk', 9, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324082507******\",\"nama\":\"JAHRONI\",\"ttl\":\"KENDAL\",\"tgl\":\"25|07|****\",\"statusper\":\"B\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":9}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:56', '2019-02-21 06:43:56'),
(36, 'App\\User', 1, 'created', 'App\\Penduduk', 10, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324086205******\",\"nama\":\"ISTIKOWATI\",\"ttl\":\"KENDAL\",\"tgl\":\"22|05|****\",\"statusper\":\"B\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":10}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:56', '2019-02-21 06:43:56'),
(37, 'App\\User', 1, 'created', 'App\\Penduduk', 11, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324084603******\",\"nama\":\"WAINI\",\"ttl\":\"KABUPATEN KENDAL\",\"tgl\":\"06|03|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":11}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-21 06:43:56', '2019-02-21 06:43:56'),
(38, 'App\\User', 1, 'created', 'App\\Koordinator', 1, '[]', '{\"id\":1}', 'http://localhost:8000/koordinator/add?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 02:11:23', '2019-02-22 02:11:23'),
(39, 'App\\User', 1, 'created', 'App\\Koordinator', 2, '[]', '{\"id\":2}', 'http://localhost:8000/koordinator/add?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 02:14:25', '2019-02-22 02:14:25'),
(40, 'App\\User', 1, 'deleted', 'App\\Koordinator', 2, '{\"id\":2,\"name\":null,\"address\":null,\"kabkot\":null,\"tps\":null,\"telephone\":null}', '[]', 'http://localhost:8000/koordinator/delete/2?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 02:24:18', '2019-02-22 02:24:18'),
(41, 'App\\User', 1, 'deleted', 'App\\Koordinator', 1, '{\"id\":1,\"name\":null,\"address\":null,\"kabkot\":null,\"tps\":null,\"telephone\":null}', '[]', 'http://localhost:8000/koordinator/delete/1?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 02:24:52', '2019-02-22 02:24:52'),
(42, 'App\\User', 1, 'created', 'App\\Koordinator', 3, '[]', '{\"name\":\"Novan\",\"address\":\"jl gendong utara\",\"kabkot\":\"semarang\",\"tps\":\"23\",\"telephone\":\"90380981\",\"id\":3}', 'http://localhost:8000/koordinator/add?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 02:26:10', '2019-02-22 02:26:10'),
(43, 'App\\User', 1, 'updated', 'App\\Penduduk', 3, '{\"nokk\":\"3324200210******\",\"nik\":\"3324085306******\",\"nama\":\"TASMIATUN\",\"ttl\":\"KENDAL\",\"tgl\":\"13|06|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":\"6\",\"rw\":\"3\",\"disabi\":\"0\"}', '{\"nokk\":null,\"nik\":null,\"nama\":null,\"ttl\":null,\"tgl\":null,\"statusper\":null,\"jkl\":null,\"jl\":null,\"rt\":null,\"rw\":null,\"disabi\":null}', 'http://localhost:8000/penduduk/updateprop/3?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:13:42', '2019-02-22 04:13:42'),
(44, 'App\\User', 1, 'updated', 'App\\Koordinator', 3, '{\"name\":\"Novan\",\"address\":\"jl gendong utara\",\"kabkot\":\"semarang\",\"tps\":\"23\",\"telephone\":\"90380981\"}', '{\"name\":\"Novan Dwi Anggarda\",\"address\":\"jl gendong utara 655\",\"kabkot\":\"semarang kota\",\"tps\":\"36491\",\"telephone\":\"52958729\"}', 'http://localhost:8000/koordinator/update/3?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:18:28', '2019-02-22 04:18:28'),
(45, 'App\\User', 1, 'deleted', 'App\\Koordinator', 3, '{\"id\":3,\"name\":\"Novan Dwi Anggarda\",\"address\":\"jl gendong utara 655\",\"kabkot\":\"semarang kota\",\"tps\":\"36491\",\"telephone\":\"52958729\"}', '[]', 'http://localhost:8000/koordinator/delete/3?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:19:59', '2019-02-22 04:19:59'),
(46, 'App\\User', 1, 'created', 'App\\Penduduk', 1, '[]', '{\"nokk\":null,\"nik\":null,\"nama\":null,\"ttl\":null,\"tgl\":null,\"statusper\":null,\"jkl\":null,\"jl\":null,\"rt\":null,\"rw\":null,\"disabi\":null,\"ket\":null,\"id\":1}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:06', '2019-02-22 04:35:06'),
(47, 'App\\User', 1, 'created', 'App\\Penduduk', 2, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324080511******\",\"nama\":\"SODIKIN\",\"ttl\":\"KENDAL\",\"tgl\":\"05|11|****\",\"statusper\":\"S\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":2}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:06', '2019-02-22 04:35:06'),
(48, 'App\\User', 1, 'created', 'App\\Penduduk', 3, '[]', '{\"nokk\":\"3324200210******\",\"nik\":\"3324085306******\",\"nama\":\"TASMIATUN\",\"ttl\":\"KENDAL\",\"tgl\":\"13|06|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":3}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:06', '2019-02-22 04:35:06'),
(49, 'App\\User', 1, 'created', 'App\\Penduduk', 4, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324051502******\",\"nama\":\"NUR KHAMID\",\"ttl\":\"KENDAL\",\"tgl\":\"15|02|****\",\"statusper\":\"S\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":4}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(50, 'App\\User', 1, 'created', 'App\\Penduduk', 5, '[]', '{\"nokk\":\"3324200704******\",\"nik\":\"3324205607******\",\"nama\":\"SITI MUSYAROFAH\",\"ttl\":\"KENDAL\",\"tgl\":\"16|07|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":5}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(51, 'App\\User', 1, 'created', 'App\\Penduduk', 6, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324201802******\",\"nama\":\"SUKIRMAN\",\"ttl\":\"KENDAL\",\"tgl\":\"18|02|****\",\"statusper\":\"S\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":6}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(52, 'App\\User', 1, 'created', 'App\\Penduduk', 7, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324204603******\",\"nama\":\"RUBAIYAH\",\"ttl\":\"KENDAL\",\"tgl\":\"06|03|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":7}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(53, 'App\\User', 1, 'created', 'App\\Penduduk', 8, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324082507******\",\"nama\":\"JAUYAK\",\"ttl\":\"KENDAL\",\"tgl\":\"25|07|****\",\"statusper\":\"B\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":8}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(54, 'App\\User', 1, 'created', 'App\\Penduduk', 9, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324082507******\",\"nama\":\"JAHRONI\",\"ttl\":\"KENDAL\",\"tgl\":\"25|07|****\",\"statusper\":\"B\",\"jkl\":\"L\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":9}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(55, 'App\\User', 1, 'created', 'App\\Penduduk', 10, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324086205******\",\"nama\":\"ISTIKOWATI\",\"ttl\":\"KENDAL\",\"tgl\":\"22|05|****\",\"statusper\":\"B\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":10}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(56, 'App\\User', 1, 'created', 'App\\Penduduk', 11, '[]', '{\"nokk\":\"3324200808******\",\"nik\":\"3324084603******\",\"nama\":\"WAINI\",\"ttl\":\"KABUPATEN KENDAL\",\"tgl\":\"06|03|****\",\"statusper\":\"S\",\"jkl\":\"P\",\"jl\":\"KEDUNGSUREN\",\"rt\":6,\"rw\":3,\"disabi\":0,\"ket\":null,\"id\":11}', 'http://localhost:8000/penduduk/storeimport/save?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(57, 'App\\User', 1, 'created', 'App\\Koordinator', 4, '[]', '{\"name\":\"Gusfi\",\"address\":\"gfgfjgf\",\"kabkot\":\"smg\",\"tps\":\"6586\",\"telephone\":\"64765897\",\"id\":4}', 'http://localhost:8000/koordinator/add?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:35:39', '2019-02-22 04:35:39'),
(58, 'App\\User', 1, 'updated', 'App\\Koordinator', 4, '{\"address\":\"gfgfjgf\",\"kabkot\":\"smg\",\"tps\":\"6586\",\"telephone\":\"64765897\"}', '{\"address\":\"kendal\",\"kabkot\":\"kendal\",\"tps\":\"68\",\"telephone\":\"098899\"}', 'http://localhost:8000/koordinator/update/4?', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 Safari/537.36', NULL, '2019-02-22 04:36:06', '2019-02-22 04:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `dpts`
--

CREATE TABLE `dpts` (
  `id` int(10) UNSIGNED NOT NULL,
  `koordinator_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `koordinators`
--

CREATE TABLE `koordinators` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabkot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tps` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `koordinators`
--

INSERT INTO `koordinators` (`id`, `name`, `address`, `kabkot`, `tps`, `telephone`, `created_at`, `updated_at`) VALUES
(4, 'Gusfi', 'kendal', 'kendal', '68', '098899', '2019-02-22 04:35:39', '2019-02-22 04:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `language_lines`
--

CREATE TABLE `language_lines` (
  `id` int(10) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_lines`
--

INSERT INTO `language_lines` (`id`, `group`, `key`, `text`, `created_at`, `updated_at`) VALUES
(1, 'lease', 'm_add_lease', '{\"en\":\"Add Lease\",\"id\":\"Tambah Sewa\"}', '2019-02-21 03:47:57', '2019-02-21 03:47:57'),
(2, 'lease', 'hd_land', '{\"en\":\"LAND\",\"id\":\"TANAH\"}', '2019-02-21 03:47:57', '2019-02-21 03:47:57'),
(3, 'lease', 'hd_property', '{\"en\":\"PROPERTY\",\"id\":\"PROPERTI\"}', '2019-02-21 03:47:57', '2019-02-21 03:47:57'),
(4, 'lease', 'hd_lease', '{\"en\":\"LEASE\",\"id\":\"SEWA\"}', '2019-02-21 03:47:57', '2019-02-21 03:47:57'),
(5, 'lease', 'shdp_offer', '{\"en\":\"OFFER PRICE\",\"id\":\"HARGA PENAWARAN\"}', '2019-02-21 03:47:57', '2019-02-21 03:47:57'),
(6, 'lease', 'shdl_price', '{\"en\":\"LEASE PRICE\",\"id\":\"HARGA SEWA\"}', '2019-02-21 03:47:57', '2019-02-21 03:47:57'),
(7, 'lease', 'shdl_broker', '{\"en\":\"BROKER\",\"id\":\"MAKELAR\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(8, 'lease', 'shdl_grace', '{\"en\":\"GRACE\",\"id\":\"GRACE\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(9, 'lease', 'frm_certificate', '{\"en\":\"Certificate(s)\",\"id\":\"Sertifikat\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(10, 'lease', 'frm_type', '{\"en\":\"Type\",\"id\":\"Tipe\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(11, 'lease', 'frm_location', '{\"en\":\"Location Name\",\"id\":\"Nama Lokasi\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(12, 'lease', 'frm_address', '{\"en\":\"Address\",\"id\":\"Alamat\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(13, 'lease', 'frm_land_area', '{\"en\":\"Land Area\",\"id\":\"Luas Tanah\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(14, 'lease', 'frm_bld_area', '{\"en\":\"Building Area\",\"id\":\"Luas Bangunan\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(15, 'lease', 'frm_block', '{\"en\":\"Block\\/Tower\",\"id\":\"Blok\\/Tower\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(16, 'lease', 'frm_floor', '{\"en\":\"Floor\",\"id\":\"Lantai\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(17, 'lease', 'frm_unit', '{\"en\":\"Unit\",\"id\":\"Unit\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(18, 'lease', 'frm_electry', '{\"en\":\"Electricity\",\"id\":\"Listrik\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(19, 'lease', 'frm_water', '{\"en\":\"Water\",\"id\":\"Air\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(20, 'lease', 'frm_phone', '{\"en\":\"Telephone\",\"id\":\"Telepon\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(21, 'lease', 'frm_deed', '{\"en\":\"No. Lease Deed\",\"id\":\"No. Akta Sewa\"}', '2019-02-21 03:47:58', '2019-02-21 03:47:58'),
(22, 'lease', 'frm_deed_date', '{\"en\":\"Dt. Lease Deed\",\"id\":\"Tgl. Akta Sewa\"}', '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(23, 'lease', 'frm_lessor', '{\"en\":\"Lessor\",\"id\":\"Yang Menyewakan\"}', '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(24, 'lease', 'frm_tenant', '{\"en\":\"Tenant Name\",\"id\":\"Nama Penyewa\"}', '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(25, 'lease', 'frm_purpose', '{\"en\":\"Lease Purpose\",\"id\":\"Keperluan Sewa\"}', '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(26, 'lease', 'frm_pic', '{\"en\":\"PIC\",\"id\":\"PIC\"}', '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(27, 'lease', 'frm_lease_start', '{\"en\":\"Lease Start\",\"id\":\"Awal Sewa\"}', '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(28, 'lease', 'frm_lease_end', '{\"en\":\"Lease End\",\"id\":\"Akhir Sewa\"}', '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(29, 'lease', 'frm_period_type', '{\"en\":\"Period Type\",\"id\":\"Tipe Periode\"}', '2019-02-21 03:47:59', '2019-02-21 03:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

CREATE TABLE `log_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2014_10_12_100000_create_password_resets_table', 1),
(20, '2018_07_13_064324_create_roles_table', 1),
(21, '2018_07_13_064952_create_role_users_table', 1),
(22, '2018_07_14_030300_create_certificates_table', 1),
(23, '2018_07_14_030606_create_certificate_types_table', 1),
(24, '2018_07_14_030607_create_certificate_docs_table', 1),
(25, '2018_07_14_031445_create_taxes_table', 1),
(26, '2018_07_14_031465_create_years_table', 1),
(27, '2018_07_14_031515_create_tax_types_table', 1),
(28, '2018_07_14_032219_create_leases_table', 1),
(29, '2018_07_14_032232_create_property_types_table', 1),
(30, '2018_07_14_064972_create_certi_taxs_table', 1),
(31, '2018_07_28_093303_create_language_lines_table', 1),
(32, '2018_08_06_102051_create_audits_table', 1),
(33, '2018_08_23_091931_create_properties_table', 1),
(34, '2018_11_19_101911_create_log_activity_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penduduks`
--

CREATE TABLE `penduduks` (
  `id` int(10) UNSIGNED NOT NULL,
  `nokk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statusper` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jkl` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disabi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prov` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabkot` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kec` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desakel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tps` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduks`
--

INSERT INTO `penduduks` (`id`, `nokk`, `nik`, `nama`, `ttl`, `tgl`, `statusper`, `jkl`, `jl`, `rt`, `rw`, `disabi`, `ket`, `prov`, `kabkot`, `kec`, `desakel`, `tps`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:06', '2019-02-22 04:35:06'),
(2, '3324200210******', '3324080511******', 'SODIKIN', 'KENDAL', '05|11|****', 'S', 'L', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:06', '2019-02-22 04:35:06'),
(3, '3324200210******', '3324085306******', 'TASMIATUN', 'KENDAL', '13|06|****', 'S', 'P', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:06', '2019-02-22 04:35:06'),
(4, '3324200704******', '3324051502******', 'NUR KHAMID', 'KENDAL', '15|02|****', 'S', 'L', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(5, '3324200704******', '3324205607******', 'SITI MUSYAROFAH', 'KENDAL', '16|07|****', 'S', 'P', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(6, '3324200808******', '3324201802******', 'SUKIRMAN', 'KENDAL', '18|02|****', 'S', 'L', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(7, '3324200808******', '3324204603******', 'RUBAIYAH', 'KENDAL', '06|03|****', 'S', 'P', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(8, '3324200808******', '3324082507******', 'JAUYAK', 'KENDAL', '25|07|****', 'B', 'L', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(9, '3324200808******', '3324082507******', 'JAHRONI', 'KENDAL', '25|07|****', 'B', 'L', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(10, '3324200808******', '3324086205******', 'ISTIKOWATI', 'KENDAL', '22|05|****', 'B', 'P', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07'),
(11, '3324200808******', '3324084603******', 'WAINI', 'KABUPATEN KENDAL', '06|03|****', 'S', 'P', 'KEDUNGSUREN', '6', '3', '0', NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 04:35:07', '2019-02-22 04:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 'superadmin', '{\"user-manager\":true}', '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(2, 'Administrator', 'administrator', '{\"user-manager\":false}', '2019-02-21 03:47:59', '2019-02-21 03:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$ZEZBa12EAVU0Wo1u3L1QAu7dl2uqI3QeKpvb5l/ySknWQ5rdYxmoG', 'JZSdJsgSrDRvVZTQNEkAYZ2xoEtOmNB4i3CRLTrXo6WxNBsNdm6JxMOW1UQ7', '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(2, 'Via', 'via', '$2y$10$XSj0WLtCC9lfVz0ca9UgLeCVdY6aQI1loKALX.pUlrJymemg0IzLe', NULL, '2019-02-21 03:47:59', '2019-02-21 03:47:59'),
(3, 'Dyah Permatasari', 'tata', '$2y$10$ufAQB/cBB24aVZLQ0rO7Iuvra4.aVTa5pebLO6SiJ9qaKbLlJXSwy', NULL, '2019-02-21 03:48:00', '2019-02-21 03:48:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

--
-- Indexes for table `dpts`
--
ALTER TABLE `dpts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `koordinators`
--
ALTER TABLE `koordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_lines`
--
ALTER TABLE `language_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_lines_group_index` (`group`);

--
-- Indexes for table `log_activities`
--
ALTER TABLE `log_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `dpts`
--
ALTER TABLE `dpts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koordinators`
--
ALTER TABLE `koordinators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `language_lines`
--
ALTER TABLE `language_lines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `log_activities`
--
ALTER TABLE `log_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
