-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 02:47 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_blok`
--

CREATE TABLE `t_blok` (
  `kode_blok` varchar(20) NOT NULL,
  `kode_user` varchar(8) NOT NULL,
  `nama_blok` varchar(20) DEFAULT NULL,
  `alamat_blok` text,
  `lat_blok` double NOT NULL,
  `long_blok` double NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` varchar(20) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL,
  `modify_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_blok`
--

INSERT INTO `t_blok` (`kode_blok`, `kode_user`, `nama_blok`, `alamat_blok`, `lat_blok`, `long_blok`, `create_at`, `create_by`, `modify_at`, `modify_by`) VALUES
('SVR00022', 'USR0002', 'Test Server', 'Test Server', -6.308600426541275, 106.75859645624242, '2022-08-08 00:56:06', 'Adam', '2022-09-01 10:50:42', 'Adam'),
('SVR00023', 'USR0005', 'UIN Jakarta', 'Test UIN', -6.202669326266531, 106.83518234099971, '2022-09-01 14:05:06', 'Khair Baru', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_client`
--

CREATE TABLE `t_client` (
  `kode_klient` varchar(16) NOT NULL,
  `kode_blok` varchar(20) NOT NULL,
  `kode_user` varchar(8) NOT NULL,
  `ip_client` varchar(16) NOT NULL,
  `nama_client` varchar(30) DEFAULT NULL,
  `lat_client` double NOT NULL,
  `long_client` double NOT NULL,
  `status_client` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_client`
--

INSERT INTO `t_client` (`kode_klient`, `kode_blok`, `kode_user`, `ip_client`, `nama_client`, `lat_client`, `long_client`, `status_client`) VALUES
('CLIENT00000027', 'SVR00022', 'USR0002', '192.168.8.100', 'Kampus 2', -6.309156037134768, 106.75939730161542, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_histori`
--

CREATE TABLE `t_histori` (
  `id_histori` int(5) NOT NULL,
  `kode_user` varchar(8) DEFAULT NULL,
  `kegiatan` varchar(20) DEFAULT NULL,
  `data` varchar(20) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `browser` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_histori`
--

INSERT INTO `t_histori` (`id_histori`, `kode_user`, `kegiatan`, `data`, `tgl`, `jam`, `ip`, `browser`) VALUES
(1, '2', 'Login', 'Admin', '2020-11-06', '09:15:09', '::1', 'Firefox'),
(2, '2', 'Login', 'Admin', '2020-11-09', '09:28:42', '::1', 'Firefox'),
(3, '2', 'Login', 'Admin', '2020-11-09', '15:53:00', '::1', 'Firefox'),
(4, '2', 'Login', 'Admin', '2020-11-09', '20:11:20', '::1', 'Firefox'),
(5, '2', 'Login', 'Admin', '2020-11-10', '09:20:16', '::1', 'Firefox'),
(6, '2', 'Login', 'Admin', '2020-11-11', '08:37:55', '127.0.0.1', 'Firefox'),
(7, '2', 'Login', 'Admin', '2020-11-11', '08:47:55', '127.0.0.1', 'Firefox'),
(8, '2', 'Login', 'Admin', '2020-11-11', '16:12:43', '::1', 'Firefox'),
(9, '2', 'Login', 'Admin', '2020-11-11', '17:39:37', '::1', 'Firefox'),
(10, '2', 'Login', 'Admin', '2020-11-12', '09:07:39', '::1', 'Firefox'),
(11, '2', 'Login', 'Admin', '2020-11-12', '09:12:44', '::1', 'Chrome'),
(12, '2', 'Login', 'Admin', '2020-11-12', '09:19:54', '::1', 'Firefox'),
(13, '2', 'Login', 'Admin', '2020-11-12', '12:01:06', '::1', 'Firefox'),
(14, '2', 'Login', 'Admin', '2020-11-12', '16:19:56', '::1', 'Firefox'),
(15, '2', 'Login', 'Admin', '2020-11-12', '16:53:00', '::1', 'Firefox'),
(16, '2', 'Login', 'Admin', '2020-11-12', '17:41:56', '::1', 'Firefox'),
(17, '2', 'Login', 'Admin', '2020-11-13', '08:57:33', '::1', 'Firefox'),
(18, '2', 'Login', 'Admin', '2020-11-15', '19:02:42', '::1', 'Firefox'),
(19, '2', 'Login', 'Admin', '2020-11-16', '08:23:35', '::1', 'Firefox'),
(20, '2', 'Login', 'Admin', '2020-11-17', '09:27:54', '::1', 'Chrome'),
(21, '2', 'Login', 'Admin', '2020-11-18', '10:12:23', '::1', 'Firefox'),
(22, '2', 'Login', 'Admin', '2020-11-18', '13:54:17', '::1', 'Firefox'),
(23, '2', 'Login', 'Admin', '2020-11-21', '07:47:12', '::1', 'Firefox'),
(24, '2', 'Login', 'Admin', '2020-11-21', '13:48:32', '::1', 'Firefox'),
(25, '2', 'Login', 'Admin', '2020-12-02', '13:26:29', '::1', 'Firefox'),
(26, '2', 'Login', 'Admin', '2020-12-05', '23:41:09', '::1', 'Firefox'),
(27, '2', 'Login', 'Admin', '2020-12-06', '06:56:26', '::1', 'Firefox'),
(28, '2', 'add new server', '192.168.99_.1__', '2020-12-06', '09:05:20', '::1', 'Firefox'),
(29, '2', 'add new server', '192.168.99_.1__', '2020-12-06', '09:40:14', '::1', 'Firefox'),
(30, '2', 'Login', 'Admin', '2020-12-06', '12:27:22', '::1', 'Firefox'),
(31, '2', 'add new client', 'SVR0001', '2020-12-06', '12:34:20', '::1', 'Firefox'),
(32, '2', 'Login', 'Admin', '2020-12-06', '17:52:38', '::1', 'Firefox'),
(33, '2', 'add new client', 'SVR0001', '2020-12-06', '21:01:44', '::1', 'Firefox'),
(34, '2', 'Login', 'Admin', '2020-12-07', '09:51:00', '::1', 'Firefox'),
(35, '2', 'Login', 'Admin', '2020-12-08', '09:42:59', '::1', 'Firefox'),
(36, '2', 'Login', 'Admin', '2020-12-09', '11:53:35', '::1', 'Chrome'),
(37, '2', 'Login', 'Admin', '2020-12-09', '11:53:45', '::1', 'Chrome'),
(38, '2', 'Login', 'Admin', '2020-12-09', '11:54:22', '::1', 'Chrome'),
(39, '2', 'Login', 'Admin', '2020-12-09', '11:54:42', '::1', 'Firefox'),
(40, '2', 'add new client', 'SVR0001', '2020-12-09', '12:05:47', '::1', 'Firefox'),
(41, '2', 'Login', 'Admin', '2021-03-15', '15:00:33', '::1', 'Chrome'),
(42, '2', 'add new server', '192.168.1.1', '2021-03-15', '15:03:46', '::1', 'Chrome'),
(43, '2', 'edit server', '192.168.1.1', '2021-03-15', '15:03:59', '::1', 'Chrome'),
(44, '2', 'add new client', 'SVR0003', '2021-03-15', '15:05:15', '::1', 'Chrome'),
(45, '2', 'edit client', 'SVR0003', '2021-03-15', '15:06:11', '::1', 'Chrome'),
(46, '2', 'Tambah users', 'Ahmad', '2021-03-15', '15:11:03', '::1', 'Chrome'),
(47, '2', 'Login', 'Admin', '2021-03-15', '15:11:16', '::1', 'Chrome'),
(48, '2', 'Login', 'Admin', '2021-03-15', '15:11:45', '::1', 'Chrome'),
(49, '2', 'Tambah users', 'Abdul', '2021-03-15', '15:13:34', '::1', 'Chrome'),
(50, '8', 'Login', 'Abdul', '2021-03-15', '15:13:47', '::1', 'Chrome'),
(51, '2', 'Login', 'Admin', '2021-03-15', '15:18:08', '::1', 'Chrome'),
(52, '2', 'add new server', '192.162.2.1', '2021-03-15', '15:22:59', '::1', 'Chrome'),
(53, '2', 'edit server', '192.162.2.1', '2021-03-15', '15:23:08', '::1', 'Chrome'),
(54, '2', 'add new client', 'SVR0004', '2021-03-15', '15:24:15', '::1', 'Chrome'),
(55, '2', 'Login', 'Admin', '2021-03-24', '14:40:32', '::1', 'Chrome'),
(56, '2', 'Ubah users', 'Abdulah', '2021-03-24', '14:42:50', '::1', 'Chrome'),
(57, '2', 'Login', 'Admin', '2021-03-24', '14:43:41', '::1', 'Chrome'),
(58, '2', 'Login', 'Admin', '2021-03-24', '14:44:28', '::1', 'Chrome'),
(59, '2', 'Login', 'Admin', '2021-07-30', '15:53:32', '127.0.0.1', 'Firefox'),
(60, '2', 'Login', 'Admin', '2022-04-14', '00:09:53', '::1', 'Chrome'),
(61, '2', 'Login', 'Admin', '2022-04-14', '00:15:31', '::1', 'Chrome'),
(62, '2', 'Login', 'Admin', '2022-04-14', '13:00:17', '::1', 'Chrome'),
(63, '2', 'Login', 'Admin', '2022-05-27', '13:31:50', '::1', 'Chrome'),
(64, '2', 'edit server', '192.162.2.1', '2022-05-27', '13:33:46', '::1', 'Chrome'),
(65, '2', 'add new client', 'SVR0004', '2022-05-27', '13:35:56', '::1', 'Chrome'),
(66, '2', 'add new client', 'SVR0004', '2022-05-27', '15:42:58', '::1', 'Chrome'),
(67, '2', 'Login', 'Admin', '2022-05-28', '14:47:23', '::1', 'Chrome'),
(68, '2', 'Login', 'Admin', '2022-05-28', '15:14:27', '::1', 'Chrome'),
(69, '2', 'Login', 'Admin', '2022-05-28', '15:19:45', '::1', 'Chrome'),
(70, '2', 'Ubah users', 'Ahmad', '2022-05-28', '15:21:38', '::1', 'Chrome'),
(71, '2', 'Ubah users', 'Ahmad', '2022-05-28', '15:22:01', '::1', 'Chrome'),
(72, '2', 'Login', 'Admin', '2022-05-28', '15:22:17', '::1', 'Chrome'),
(73, '2', 'Ubah users', 'Ahmad', '2022-05-28', '15:22:32', '::1', 'Chrome'),
(74, '7', 'Login', 'Ahmad', '2022-05-28', '15:22:42', '::1', 'Chrome'),
(75, '2', 'Login', 'Admin', '2022-05-28', '15:22:53', '::1', 'Chrome'),
(76, '2', 'Login', 'Admin', '2022-05-28', '15:23:00', '::1', 'Chrome'),
(77, '2', 'Ubah users', 'Ahmad', '2022-05-28', '15:23:19', '::1', 'Chrome'),
(78, '2', 'Login', 'Admin', '2022-05-28', '15:23:50', '::1', 'Chrome'),
(79, '2', 'Ubah users', 'Ahmad', '2022-05-28', '15:24:05', '::1', 'Chrome'),
(80, '7', 'Login', 'Ahmad', '2022-05-28', '15:24:16', '::1', 'Chrome'),
(81, '2', 'Login', 'Admin', '2022-05-28', '15:24:42', '::1', 'Chrome'),
(82, '2', 'Login', 'Admin', '2022-05-28', '15:25:52', '::1', 'Chrome'),
(83, '2', 'Ubah users', 'Ahmad', '2022-05-28', '15:34:22', '::1', 'Chrome'),
(84, '7', 'Login', 'Ahmad', '2022-05-28', '15:34:30', '::1', 'Chrome'),
(85, '7', 'Login', 'Ahmad', '2022-05-28', '15:42:21', '::1', 'Chrome'),
(86, '2', 'Login', 'Admin', '2022-06-08', '23:51:10', '::1', 'Chrome'),
(87, '2', 'Tambah users', 'Ahmad Joe', '2022-06-08', '23:54:28', '::1', 'Chrome'),
(88, '9', 'Login', 'Ahmad Joe', '2022-06-08', '23:54:46', '::1', 'Chrome'),
(89, '2', 'Login', 'Admin', '2022-06-09', '00:04:56', '::1', 'Chrome'),
(90, '2', 'Login', 'Admin', '2022-06-09', '00:06:26', '::1', 'Chrome'),
(91, '2', 'Login', 'Admin', '2022-06-09', '00:07:08', '::1', 'Chrome'),
(92, '7', 'Login', 'Ahmad', '2022-06-09', '00:07:22', '::1', 'Chrome'),
(93, '2', 'Login', 'Admin', '2022-06-09', '00:08:03', '::1', 'Chrome'),
(94, '2', 'Login', 'Admin', '2022-06-09', '00:08:04', '::1', 'Chrome'),
(95, '2', 'Login', 'Admin', '2022-06-09', '00:08:23', '::1', 'Chrome'),
(96, '2', 'Login', 'Admin', '2022-06-09', '00:09:36', '::1', 'Chrome'),
(97, '2', 'Login', 'Admin', '2022-06-09', '00:10:06', '::1', 'Chrome'),
(98, '2', 'Login', 'Admin', '2022-06-09', '00:10:29', '::1', 'Chrome'),
(99, '2', 'add new server', '', '2022-06-09', '00:16:18', '::1', 'Chrome'),
(100, '2', 'add new server', '', '2022-06-09', '00:16:35', '::1', 'Chrome'),
(101, '2', 'edit server', '192.162.2.1', '2022-06-09', '00:16:50', '::1', 'Chrome'),
(102, '2', 'edit server', '192.162.2.1', '2022-06-09', '00:20:09', '::1', 'Chrome'),
(103, '2', 'Login', 'Admin', '2022-06-12', '01:54:34', '::1', 'Chrome'),
(104, '2', 'Login', 'Admin', '2022-06-20', '14:55:44', '::1', 'Chrome'),
(105, '2', 'Ubah users', 'Ahmad Joel', '2022-06-20', '16:32:37', '::1', 'Chrome'),
(106, '2', 'Login', 'Admin', '2022-06-20', '16:34:49', '::1', 'Chrome'),
(107, '2', 'edit server', '192.162.2.1', '2022-06-20', '16:53:40', '::1', 'Chrome'),
(108, '2', 'edit client', 'SVR0004', '2022-06-20', '17:09:32', '::1', 'Chrome'),
(109, '2', 'Login', 'Admin', '2022-06-23', '23:23:39', '::1', 'Chrome'),
(110, '2', 'edit server', '', '2022-06-23', '23:35:25', '::1', 'Chrome'),
(111, '2', 'edit server', '127.73.47.29', '2022-06-23', '23:35:38', '::1', 'Chrome'),
(112, '2', 'edit server', '127.73.47.29', '2022-06-23', '23:36:30', '::1', 'Chrome'),
(113, '2', 'add new client', 'SVR0004', '2022-06-23', '23:55:12', '::1', 'Chrome'),
(114, '2', 'edit client', 'SVR0004', '2022-06-23', '23:55:45', '::1', 'Chrome'),
(115, '2', 'edit client', 'SVR0004', '2022-06-23', '23:56:18', '::1', 'Chrome'),
(116, '2', 'edit client', 'SVR0004', '2022-06-24', '00:49:46', '::1', 'Chrome'),
(117, '2', 'Login', 'Admin', '2022-06-24', '01:10:34', '::1', 'Chrome'),
(118, '2', 'add new server', '234.32._._', '2022-06-24', '01:11:24', '::1', 'Chrome'),
(119, '2', 'add new server', '123.142.43.41', '2022-06-24', '01:11:45', '::1', 'Chrome'),
(120, '2', 'Login', 'Admin', '2022-06-30', '00:45:16', '::1', 'Chrome'),
(121, '2', 'Login', 'Admin', '2022-06-30', '00:48:14', '::1', 'Chrome'),
(122, '2', 'edit server', '127.73.47.29', '2022-06-30', '00:48:46', '::1', 'Chrome'),
(123, '2', 'add new server', '', '2022-06-30', '01:24:51', '::1', 'Chrome'),
(124, '2', 'add new server', '', '2022-06-30', '01:42:29', '::1', 'Chrome'),
(125, '2', 'add new server', '', '2022-06-30', '01:45:09', '::1', 'Chrome'),
(126, '2', 'add new server', '12._._._', '2022-06-30', '02:17:05', '::1', 'Chrome'),
(127, '2', 'add new client', 'SVR0004', '2022-06-30', '02:25:05', '::1', 'Chrome'),
(128, '2', 'add new client', 'SVR0004', '2022-06-30', '02:25:56', '::1', 'Chrome'),
(129, '2', 'add new client', 'SVR0004', '2022-06-30', '02:31:01', '::1', 'Chrome'),
(130, '2', 'add new client', 'SVR0004', '2022-06-30', '03:00:02', '::1', 'Chrome'),
(131, '2', 'add new client', 'SVR0004', '2022-06-30', '03:05:29', '::1', 'Chrome'),
(132, '2', 'add new client', 'SVR0004', '2022-06-30', '03:07:04', '::1', 'Chrome'),
(133, '2', 'add new server', '', '2022-06-30', '03:23:10', '::1', 'Chrome'),
(134, '2', 'edit client', 'SVR0004', '2022-06-30', '03:27:50', '::1', 'Chrome'),
(135, '2', 'Login', 'Admin', '2022-07-13', '17:38:17', '::1', 'Chrome'),
(136, '2', 'Login', 'Admin', '2022-07-13', '17:39:43', '::1', 'Chrome'),
(137, '2', 'add new server', '123.45.6._', '2022-07-13', '17:44:26', '::1', 'Chrome'),
(138, '2', 'Login', 'Admin', '2022-07-13', '23:22:09', '::1', 'Chrome'),
(139, '2', 'add new server', '', '2022-07-14', '00:03:46', '::1', 'Chrome'),
(140, '2', 'add new client', 'SVR0004', '2022-07-14', '00:27:55', '::1', 'Chrome'),
(141, '2', 'add new client', 'SVR0004', '2022-07-14', '00:28:32', '::1', 'Chrome'),
(142, '2', 'Login', 'Admin', '2022-07-14', '01:01:01', '::1', 'Chrome'),
(143, '2', 'Tambah users', 'Ahmad Badrul', '2022-07-14', '02:17:10', '::1', 'Chrome'),
(144, '2', 'add new server', NULL, '2022-07-14', '02:35:57', '::1', 'Chrome'),
(145, '2', 'Ubah users', 'Adam', '2022-07-14', '03:18:26', '::1', 'Chrome'),
(146, '2', 'Login', 'Adam', '2022-07-14', '03:21:03', '::1', 'Chrome'),
(147, '2', 'Ubah users', 'Ahmad Joel', '2022-07-14', '03:21:33', '::1', 'Chrome'),
(148, '9', 'Login', 'Ahmad Joel', '2022-07-14', '03:21:44', '::1', 'Chrome'),
(149, '9', 'Ubah users', 'Ahmad Badrul', '2022-07-14', '03:23:02', '::1', 'Chrome'),
(150, '10', 'Login', 'Ahmad Badrul', '2022-07-14', '03:23:10', '::1', 'Chrome'),
(151, '2', 'Login', 'Adam', '2022-07-14', '03:24:30', '::1', 'Chrome'),
(152, '2', 'Tambah users', 'ABU', '2022-07-14', '03:33:48', '::1', 'Chrome'),
(153, '11', 'Login', 'ABU', '2022-07-14', '03:33:59', '::1', 'Chrome'),
(154, '10', 'Login', 'Ahmad Badrul', '2022-07-14', '03:44:10', '::1', 'Chrome'),
(155, '2', 'Login', 'Adam', '2022-07-14', '03:44:24', '::1', 'Chrome'),
(156, '2', 'Login', 'Adam', '2022-07-22', '00:56:17', '::1', 'Chrome'),
(157, '2', 'Login', 'Adam', '2022-07-22', '00:57:29', '::1', 'Chrome'),
(158, '2', 'Ubah users', 'ABU', '2022-07-22', '00:57:51', '::1', 'Chrome'),
(159, '11', 'Login', 'ABU', '2022-07-22', '00:58:05', '::1', 'Chrome'),
(160, '2', 'Login', 'Adam', '2022-07-22', '01:02:47', '::1', 'Chrome'),
(161, '2', 'Ubah users', 'Ahmad Badrul', '2022-07-22', '01:03:01', '::1', 'Chrome'),
(162, '10', 'Login', 'Ahmad Badrul', '2022-07-22', '01:03:11', '::1', 'Chrome'),
(163, '2', 'Login', 'Adam', '2022-07-22', '01:09:05', '::1', 'Chrome'),
(164, '11', 'Login', 'ABU', '2022-07-22', '01:09:29', '::1', 'Chrome'),
(165, '2', 'Login', 'Adam', '2022-07-22', '01:11:52', '::1', 'Chrome'),
(166, '10', 'Login', 'Ahmad Badrul', '2022-07-22', '01:19:18', '::1', 'Chrome'),
(167, '2', 'Login', 'Adam', '2022-07-22', '01:20:16', '::1', 'Chrome'),
(168, '11', 'Login', 'ABU', '2022-07-22', '01:22:29', '::1', 'Chrome'),
(169, '2', 'Login', 'Adam', '2022-07-22', '01:23:17', '::1', 'Chrome'),
(170, '10', 'Login', 'Ahmad Badrul', '2022-07-22', '01:23:50', '::1', 'Chrome'),
(171, '2', 'Login', 'Adam', '2022-07-22', '01:24:44', '::1', 'Chrome'),
(172, '2', 'Login', 'Adam', '2022-07-22', '21:04:47', '::1', 'Chrome'),
(173, '11', 'Login', 'ABU', '2022-07-22', '21:09:47', '::1', 'Chrome'),
(174, '2', 'Login', 'Adam', '2022-07-22', '21:12:19', '::1', 'Chrome'),
(175, '2', 'edit client', 'SVR0004', '2022-07-22', '21:20:54', '::1', 'Chrome'),
(176, '11', 'Login', 'ABU', '2022-07-22', '21:22:38', '::1', 'Chrome'),
(177, '2', 'Login', 'Adam', '2022-07-22', '21:25:42', '::1', 'Chrome'),
(178, '2', 'edit server', NULL, '2022-07-22', '21:26:05', '::1', 'Chrome'),
(179, '2', 'edit server', NULL, '2022-07-22', '21:26:21', '::1', 'Chrome'),
(180, '2', 'edit server', NULL, '2022-07-22', '21:26:27', '::1', 'Chrome'),
(181, '2', 'edit server', NULL, '2022-07-22', '21:27:13', '::1', 'Chrome'),
(182, '2', 'add new client', 'SVR0005', '2022-07-22', '21:28:21', '::1', 'Chrome'),
(183, '11', 'Login', 'ABU', '2022-07-22', '21:31:37', '::1', 'Chrome'),
(184, '10', 'Login', 'Ahmad Badrul', '2022-07-22', '21:31:56', '::1', 'Chrome'),
(185, '2', 'Login', 'Adam', '2022-07-22', '21:32:21', '::1', 'Chrome'),
(186, '2', 'Login', 'Adam', '2022-07-22', '21:34:29', '::1', 'Chrome'),
(187, '10', 'Login', 'Ahmad Badrul', '2022-07-22', '21:35:30', '::1', 'Chrome'),
(188, '10', 'Login', 'Ahmad Badrul', '2022-07-22', '21:57:34', '::1', 'Chrome'),
(189, '11', 'Login', 'ABU', '2022-07-22', '22:06:50', '::1', 'Chrome'),
(190, '11', 'Login', 'ABU', '2022-07-22', '22:19:01', '::1', 'Chrome'),
(191, '11', 'Login', 'ABU', '2022-07-22', '22:20:37', '::1', 'Chrome'),
(192, '10', 'Login', 'Ahmad Badrul', '2022-07-22', '22:48:51', '::1', 'Chrome'),
(193, '2', 'Login', 'Adam', '2022-07-22', '22:49:29', '::1', 'Chrome'),
(194, '11', 'Login', 'ABU', '2022-07-22', '22:51:07', '::1', 'Chrome'),
(195, '10', 'Login', 'Ahmad Badrul', '2022-07-22', '23:05:25', '::1', 'Chrome'),
(196, '10', 'edit client', 'SVR0004', '2022-07-22', '23:08:22', '::1', 'Chrome'),
(197, '10', 'add new client', 'SVR0004', '2022-07-22', '23:10:20', '::1', 'Chrome'),
(198, '10', 'edit client', 'SVR0004', '2022-07-22', '23:11:08', '::1', 'Chrome'),
(199, '10', 'edit client', 'SVR0004', '2022-07-22', '23:11:31', '::1', 'Chrome'),
(200, '10', 'add new client', 'SVR0004', '2022-07-22', '23:16:33', '::1', 'Chrome'),
(201, '2', 'Login', 'Adam', '2022-07-25', '01:01:05', '::1', 'Chrome'),
(202, '2', 'Login', 'Adam', '2022-07-25', '01:24:23', '::1', 'Chrome'),
(203, '2', 'Tambah users', '1', '2022-07-25', '01:33:38', '::1', 'Chrome'),
(204, '2', 'Ubah users', '1', '2022-07-25', '01:40:24', '::1', 'Chrome'),
(205, '2', 'Tambah users', 'a', '2022-07-25', '01:41:06', '::1', 'Chrome'),
(206, '2', 'Ubah users', 'a', '2022-07-25', '01:42:32', '::1', 'Chrome'),
(207, '2', 'Ubah users', 'a', '2022-07-25', '01:42:38', '::1', 'Chrome'),
(208, '2', 'Ubah users', 'a', '2022-07-25', '01:43:30', '::1', 'Chrome'),
(209, '2', 'Ubah users', 'a', '2022-07-25', '01:43:38', '::1', 'Chrome'),
(210, '2', 'Ubah users', 'a', '2022-07-25', '01:45:17', '::1', 'Chrome'),
(211, '2', 'Ubah users', 'a', '2022-07-25', '01:46:47', '::1', 'Chrome'),
(212, '2', 'Ubah users', 'a', '2022-07-25', '01:51:09', '::1', 'Chrome'),
(213, '2', 'Ubah users', 'a', '2022-07-25', '01:51:19', '::1', 'Chrome'),
(214, '2', 'Ubah users', 'a', '2022-07-25', '01:56:19', '::1', 'Chrome'),
(215, '2', 'Ubah users', 'a', '2022-07-25', '01:57:41', '::1', 'Chrome'),
(216, '2', 'Tambah users', 'AAA', '2022-07-25', '02:10:33', '::1', 'Chrome'),
(217, '2', 'add new server', NULL, '2022-07-25', '02:15:38', '::1', 'Chrome'),
(218, '2', 'edit server', NULL, '2022-07-25', '02:16:11', '::1', 'Chrome'),
(219, '10', 'Login', 'Ahmad Badrul', '2022-07-25', '02:16:51', '::1', 'Chrome'),
(220, '10', 'edit server', NULL, '2022-07-25', '02:16:59', '::1', 'Chrome'),
(221, '2', 'Login', 'Adam', '2022-07-25', '02:20:36', '::1', 'Chrome'),
(222, '2', 'Tambah users', 'aaa', '2022-07-25', '02:21:03', '::1', 'Chrome'),
(223, '2', 'Tambah users', 'aaaaaa', '2022-07-25', '02:21:42', '::1', 'Chrome'),
(224, '2', 'Login', 'Adam', '2022-07-30', '00:21:56', '::1', 'Chrome'),
(225, '2', 'Tambah users', 'Hamedi', '2022-07-30', '00:25:42', '::1', 'Chrome'),
(226, '2', 'Login', 'Adam', '2022-07-30', '00:26:04', '::1', 'Chrome'),
(227, '2', 'Ubah users', 'Hamedi', '2022-07-30', '00:26:25', '::1', 'Chrome'),
(228, '2', 'Login', 'Adam', '2022-07-30', '00:26:38', '::1', 'Chrome'),
(229, '2', 'Ubah users', 'Hamedi', '2022-07-30', '00:26:59', '::1', 'Chrome'),
(230, '10', 'Login', 'Hamedi', '2022-07-30', '00:27:07', '::1', 'Chrome'),
(231, '10', 'Tambah users', 'Saboor', '2022-07-30', '00:28:32', '::1', 'Chrome'),
(232, '11', 'Login', 'Saboor', '2022-07-30', '00:28:40', '::1', 'Chrome'),
(233, '2', 'Login', 'Adam', '2022-07-30', '00:29:51', '::1', 'Chrome'),
(234, '2', 'Ubah users', 'Hamedi', '2022-07-30', '00:55:08', '::1', 'Chrome'),
(235, '2', 'Ubah users', 'Saboor', '2022-07-30', '00:57:35', '::1', 'Chrome'),
(236, '2', 'Ubah users', 'Saboor', '2022-07-30', '01:03:35', '::1', 'Chrome'),
(237, '2', 'Tambah users', 'Khair', '2022-07-30', '01:15:56', '::1', 'Chrome'),
(238, '2', 'Ubah users', 'Khair', '2022-07-30', '01:16:21', '::1', 'Chrome'),
(239, '2', 'Tambah users', '111111111111111', '2022-07-30', '01:19:35', '::1', 'Chrome'),
(240, '2', 'Login', 'Adam', '2022-07-30', '01:30:39', '::1', 'Chrome'),
(241, '2', 'Tambah users', 'aaaaaaaaaaaaaaaaaaaa', '2022-07-30', '01:40:44', '::1', 'Chrome'),
(242, '2', 'Tambah users', 'aaaaaaaaaaaaaaaaaa', '2022-07-30', '01:43:28', '::1', 'Chrome'),
(243, '2', 'Tambah users', 'aaaaaaaaaaaaaaa', '2022-07-30', '01:50:18', '::1', 'Chrome'),
(244, '2', 'Tambah users', 'aaaaaaaaaaaaaaaa', '2022-07-30', '01:50:47', '::1', 'Chrome'),
(245, '2', 'Tambah users', 'aaaaaaaaaaaaaaa', '2022-07-30', '01:51:44', '::1', 'Chrome'),
(246, '2', 'Ubah users', 'Hamedi', '2022-07-30', '01:52:36', '::1', 'Chrome'),
(247, '2', 'Login', 'Adam', '2022-07-30', '01:52:54', '::1', 'Chrome'),
(248, '2', 'Login', 'Adam', '2022-07-30', '01:53:48', '::1', 'Chrome'),
(249, '2', 'Ubah users', 'Saboor', '2022-07-30', '02:00:46', '::1', 'Chrome'),
(250, '2', 'Login', 'Adam', '2022-07-30', '02:18:10', '127.0.0.1', 'Firefox'),
(251, '2', 'Tambah users', 'aaaaaa', '2022-07-30', '02:27:42', '::1', 'Chrome'),
(252, '2', 'Tambah users', 'aaa', '2022-07-30', '02:29:45', '::1', 'Chrome'),
(253, '2', 'Tambah users', 'ASADS221321312', '2022-07-30', '02:30:58', '::1', 'Chrome'),
(254, '2', 'Tambah users', '1232', '2022-07-30', '02:34:41', '::1', 'Chrome'),
(255, '2', 'Tambah users', '111111', '2022-07-30', '02:35:29', '::1', 'Chrome'),
(256, '2', 'Tambah users', 'qwq', '2022-07-30', '03:03:39', '::1', 'Chrome'),
(257, '2', 'Tambah users', 'aaaa', '2022-07-30', '03:04:27', '::1', 'Chrome'),
(258, '2', 'Tambah users', 'Sea', '2022-07-30', '03:05:08', '::1', 'Chrome'),
(259, '2', 'Tambah users', 'Ase', '2022-07-30', '03:06:08', '::1', 'Chrome'),
(260, '2', 'Tambah users', 'qwdqsd', '2022-07-30', '03:07:29', '::1', 'Chrome'),
(261, '2', 'Tambah users', 'qdde', '2022-07-30', '03:08:04', '::1', 'Chrome'),
(262, '2', 'Tambah users', 'dqed', '2022-07-30', '03:08:59', '::1', 'Chrome'),
(263, '2', 'Tambah users', 'wewqe', '2022-07-30', '03:09:38', '::1', 'Chrome'),
(264, '2', 'add new server', NULL, '2022-07-30', '03:12:04', '::1', 'Chrome'),
(265, '2', 'add new server', NULL, '2022-07-30', '03:12:35', '::1', 'Chrome'),
(266, '2', 'add new server', NULL, '2022-07-30', '03:16:15', '::1', 'Chrome'),
(267, '2', 'Tambah users', 'se', '2022-07-30', '03:16:59', '::1', 'Chrome'),
(268, '2', 'Tambah users', 'fsa', '2022-07-30', '03:18:32', '::1', 'Chrome'),
(269, '2', 'Tambah users', 'sss', '2022-07-30', '03:21:25', '::1', 'Chrome'),
(270, '2', 'Tambah users', '213ASa', '2022-07-30', '03:23:39', '::1', 'Chrome'),
(271, '2', 'add new client', 'SVR00017', '2022-07-30', '03:26:27', '::1', 'Chrome'),
(272, '2', 'add new client', 'SVR00017', '2022-07-30', '03:27:49', '::1', 'Chrome'),
(273, '2', 'add new client', 'SVR00017', '2022-07-30', '03:28:40', '::1', 'Chrome'),
(274, '2', 'add new client', 'SVR00017', '2022-07-30', '03:29:37', '::1', 'Chrome'),
(275, '2', 'add new client', 'SVR00017', '2022-07-30', '03:30:25', '::1', 'Chrome'),
(276, '4', 'Login', 'Adam', '2022-08-01', '00:57:32', '::1', 'Chrome'),
(277, '4', 'Tambah users', 'qq', '2022-08-01', '00:58:44', '::1', 'Chrome'),
(278, '4', 'Tambah users', 'qq', '2022-08-01', '00:59:05', '::1', 'Chrome'),
(279, '4', 'Ubah users', 'Saboor', '2022-08-01', '01:01:30', '::1', 'Chrome'),
(280, '4', 'Ubah users', 'Saboor', '2022-08-01', '01:01:51', '::1', 'Chrome'),
(281, '4', 'Login', 'Adam', '2022-08-01', '01:03:10', '::1', 'Chrome'),
(282, '4', 'Tambah users', 'Ahmad A', '2022-08-01', '01:14:10', '::1', 'Chrome'),
(283, '38', 'Login', 'Ahmad A', '2022-08-01', '01:14:28', '::1', 'Chrome'),
(284, '38', 'Login', 'Ahmad A', '2022-08-01', '01:17:15', '::1', 'Chrome'),
(285, '38', 'add new client', 'SVR0004', '2022-08-01', '01:20:52', '::1', 'Chrome'),
(286, '38', 'edit client', 'SVR0004', '2022-08-01', '01:24:16', '::1', 'Chrome'),
(287, '38', 'add new client', 'SVR0004', '2022-08-01', '01:25:29', '::1', 'Chrome'),
(288, '38', 'edit client', 'SVR0004', '2022-08-01', '01:26:41', '::1', 'Chrome'),
(289, '38', 'add new server', NULL, '2022-08-01', '01:32:59', '::1', 'Chrome'),
(290, '38', 'add new client', 'SVR0005', '2022-08-01', '01:33:12', '::1', 'Chrome'),
(291, '38', 'add new client', 'SVR0005', '2022-08-01', '01:34:50', '::1', 'Chrome'),
(292, '38', 'add new server', NULL, '2022-08-01', '01:42:51', '::1', 'Chrome'),
(293, '38', 'add new client', 'SVR0005', '2022-08-01', '01:43:57', '::1', 'Chrome'),
(294, '38', 'Login', 'Ahmad A', '2022-08-01', '01:47:22', '::1', 'Chrome'),
(295, '4', 'Login', 'Adam', '2022-08-01', '01:47:40', '::1', 'Chrome'),
(296, '4', 'Login', 'Adam', '2022-08-01', '01:49:24', '::1', 'Chrome'),
(297, '4', 'edit client', 'SVR0005', '2022-08-01', '02:00:25', '::1', 'Chrome'),
(298, '4', 'edit client', 'SVR0005', '2022-08-01', '02:01:49', '::1', 'Chrome'),
(299, '4', 'Ubah users', 'Hamedi', '2022-08-01', '02:07:19', '::1', 'Chrome'),
(300, '4', 'Login', 'Adam', '2022-08-01', '02:26:49', '::1', 'Chrome'),
(301, '4', 'edit client', 'SVR0004', '2022-08-01', '02:36:09', '::1', 'Chrome'),
(302, '4', 'Login', 'Adam', '2022-08-03', '17:17:23', '::1', 'Chrome'),
(303, '4', 'Tambah users', 'Khair', '2022-08-03', '17:18:33', '::1', 'Chrome'),
(304, '39', 'Login', 'Khair', '2022-08-03', '17:19:10', '::1', 'Chrome'),
(305, '39', 'add new server', NULL, '2022-08-03', '17:20:30', '::1', 'Chrome'),
(306, '39', 'add new client', 'SVR00020', '2022-08-03', '17:21:55', '::1', 'Chrome'),
(307, '39', 'edit client', 'SVR00020', '2022-08-03', '17:23:40', '::1', 'Chrome'),
(308, '39', 'edit server', NULL, '2022-08-03', '17:24:30', '::1', 'Chrome'),
(309, '4', 'Login', 'Adam', '2022-08-04', '02:35:40', '::1', 'Chrome'),
(310, '4', 'Tambah users', 'Khair', '2022-08-04', '02:39:37', '::1', 'Chrome'),
(311, '40', 'Login', 'Khair', '2022-08-04', '02:39:52', '::1', 'Chrome'),
(312, '40', 'Ubah users', 'Khair Baru', '2022-08-04', '02:40:11', '::1', 'Chrome'),
(313, '40', 'Ubah users', 'Khair Baru', '2022-08-04', '02:40:54', '::1', 'Chrome'),
(314, '40', 'Ubah users', 'Khair Baru', '2022-08-04', '02:41:09', '::1', 'Chrome'),
(315, '4', 'Login', 'Adam', '2022-08-04', '02:43:07', '::1', 'Chrome'),
(316, '4', 'edit client', 'SVR0004', '2022-08-04', '02:44:09', '::1', 'Chrome'),
(317, '4', 'add new client', 'SVR0004', '2022-08-04', '02:45:41', '::1', 'Chrome'),
(318, '4', 'edit client', 'SVR0004', '2022-08-04', '02:46:00', '::1', 'Chrome'),
(319, '4', 'Tambah users', 'Khair', '2022-08-04', '02:47:44', '::1', 'Chrome'),
(320, '4', 'Ubah users', 'Khair Edit', '2022-08-04', '02:47:57', '::1', 'Chrome'),
(321, '4', 'Tambah users', 'Khair', '2022-08-04', '02:51:28', '::1', 'Chrome'),
(322, '42', 'Login', 'Khair', '2022-08-04', '02:51:39', '::1', 'Chrome'),
(323, '42', 'Ubah users', 'Khair Baru', '2022-08-04', '02:51:52', '::1', 'Chrome'),
(324, '42', 'add new server', NULL, '2022-08-04', '02:52:46', '::1', 'Chrome'),
(325, '42', 'edit server', NULL, '2022-08-04', '02:52:56', '::1', 'Chrome'),
(326, '42', 'add new client', 'SVR0001', '2022-08-04', '02:54:00', '::1', 'Chrome'),
(327, '42', 'add new client', 'SVR0001', '2022-08-04', '02:54:59', '::1', 'Chrome'),
(328, '42', 'edit client', 'SVR0001', '2022-08-04', '02:55:32', '::1', 'Chrome'),
(329, '4', 'Login', 'Adam', '2022-08-04', '03:30:53', '::1', 'Chrome'),
(330, '4', 'Login', 'Adam', '2022-08-07', '22:15:50', '::1', 'Chrome'),
(331, '4', 'Login', 'Adam', '2022-08-07', '22:17:11', '::1', 'Chrome'),
(332, '4', 'Login', 'Adam', '2022-08-08', '00:53:09', '::1', 'Chrome'),
(333, '4', 'edit server', NULL, '2022-08-08', '00:54:40', '::1', 'Chrome'),
(334, '4', 'edit server', NULL, '2022-08-08', '00:54:48', '::1', 'Chrome'),
(335, '4', 'add new server', NULL, '2022-08-08', '00:56:06', '::1', 'Chrome'),
(336, '4', 'edit server', NULL, '2022-08-08', '00:56:12', '::1', 'Chrome'),
(337, '4', 'edit server', NULL, '2022-08-08', '00:56:21', '::1', 'Chrome'),
(338, '4', 'add new client', 'SVR00022', '2022-08-08', '00:57:23', '::1', 'Chrome'),
(339, '4', 'add new client', 'SVR00022', '2022-08-08', '00:58:04', '::1', 'Chrome'),
(340, '4', 'add new client', 'SVR00022', '2022-08-08', '00:58:45', '::1', 'Chrome'),
(341, '4', 'Login', 'Adam', '2022-09-01', '10:32:53', '::1', 'Chrome'),
(342, '4', 'edit client', 'SVR00022', '2022-09-01', '10:36:51', '::1', 'Chrome'),
(343, '4', 'add new client', 'SVR00022', '2022-09-01', '10:44:12', '::1', 'Chrome'),
(344, '4', 'edit server', NULL, '2022-09-01', '10:50:42', '::1', 'Chrome'),
(345, '4', 'Ubah users', 'Adam', '2022-09-01', '10:55:22', '::1', 'Chrome'),
(346, '4', 'Login', 'Adam', '2022-09-01', '10:55:45', '::1', 'Chrome'),
(347, '4', 'Ubah users', 'Khair Baru', '2022-09-01', '10:56:08', '::1', 'Chrome'),
(348, '4', 'Ubah users', 'Khair Baru', '2022-09-01', '11:04:03', '::1', 'Chrome'),
(349, '42', 'Login', 'Khair Baru', '2022-09-01', '13:59:05', '::1', 'Chrome'),
(350, '42', 'Login', 'Khair Baru', '2022-09-01', '14:03:14', '::1', 'Chrome'),
(351, '42', 'Login', 'Khair Baru', '2022-09-01', '14:03:52', '::1', 'Chrome'),
(352, '42', 'add new server', NULL, '2022-09-01', '14:05:06', '::1', 'Chrome'),
(353, '42', 'Login', 'Khair Baru', '2022-09-01', '20:06:56', '::1', 'Chrome'),
(354, '4', 'Login', 'Adam', '2022-09-02', '15:02:46', '::1', 'Chrome'),
(355, '4', 'Login', 'Adam', '2022-09-02', '20:28:19', '::1', 'Chrome'),
(356, '4', 'Login', 'Adam', '2022-09-02', '20:30:27', '::1', 'Chrome'),
(357, 'USR0002', 'Login', 'Adam', '2022-09-09', '09:44:31', '::1', 'Chrome'),
(358, 'USR0002', 'Login', 'Adam', '2022-09-09', '09:44:40', '::1', 'Chrome'),
(359, 'USR0002', 'add new client', 'SVR00023', '2022-09-09', '09:46:47', '::1', 'Chrome'),
(360, 'USR0002', 'add new server', NULL, '2022-09-09', '10:00:57', '::1', 'Chrome'),
(361, 'USR0002', 'add new server', NULL, '2022-09-09', '10:26:21', '::1', 'Chrome'),
(362, 'USR0002', 'Login', 'Adam', '2022-09-09', '10:38:18', '::1', 'Chrome'),
(363, 'USR0002', 'edit client', 'SVR00022', '2022-09-09', '10:38:41', '::1', 'Chrome'),
(364, 'USR0002', 'add new client', 'SVR00022', '2022-09-09', '10:43:22', '::1', 'Chrome'),
(365, 'USR0002', 'Tambah users', 'msi', '2022-09-09', '10:45:01', '::1', 'Chrome'),
(366, 'USR0002', 'Login', 'Adam', '2022-09-09', '16:36:19', '::1', 'Chrome');

-- --------------------------------------------------------

--
-- Table structure for table `t_level`
--

CREATE TABLE `t_level` (
  `id_level` int(1) NOT NULL,
  `nama_level` varchar(30) DEFAULT NULL,
  `option` varchar(15) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_level`
--

INSERT INTO `t_level` (`id_level`, `nama_level`, `option`, `aktif`) VALUES
(1, 'Manager Ops', 'backend', 'Y'),
(2, 'Node Operations', 'backend', 'Y'),
(3, 'user', 'frontend', 'Y'),
(4, 'penjual', 'frontend', 'Y'),
(5, 'pembeli', 'frontend', 'Y'),
(6, 'manager', 'frontend', 'Y'),
(8, 'Infra Maintenance', 'backend', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_menu`
--

CREATE TABLE `t_menu` (
  `id_menu` int(3) NOT NULL,
  `id_parent` int(3) NOT NULL DEFAULT '0',
  `nama_menu` varchar(20) NOT NULL,
  `link` varchar(20) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `position` enum('Top','Bottom','Side') DEFAULT 'Side',
  `urutan` int(2) NOT NULL,
  `id_level` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_menu`
--

INSERT INTO `t_menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `icon`, `aktif`, `position`, `urutan`, `id_level`) VALUES
(1, 0, 'Dashboard', 'dashboards', 'v', 'Ya', 'Side', 1, 1),
(2, 0, 'Artikel', '', '0', 'Ya', 'Side', 2, 1),
(3, 2, 'Data Artikel', 'post', '', 'Ya', 'Side', 1, 1),
(4, 2, 'Tambah Artikel', 'post/tambah_post', '', 'Ya', 'Side', 2, 1),
(5, 0, 'Page', '', '0', 'Ya', 'Side', 3, 1),
(6, 5, 'Data Page', 'page', NULL, 'Ya', 'Side', 1, 1),
(7, 5, 'Tambah Page', 'page/tambah_page', NULL, 'Ya', 'Side', 2, 1),
(8, 0, 'Web Setting', 'web_setting', '?', 'Ya', 'Side', 10, 1),
(9, 0, 'User Manager', 'users', '{', 'Ya', 'Side', 9, 1),
(10, 0, 'Master', '', '&#xe026;', 'Ya', 'Side', 1, 1),
(11, 10, 'Kategori', 'kategori', NULL, 'Ya', 'Side', 1, 1),
(12, 10, 'Slider', 'slide', '', 'Ya', 'Side', 2, 1),
(13, 0, 'Keluar', 'siteman/logout', '3', 'Ya', 'Side', 11, 1),
(14, 0, 'Master Menu', '', '{', 'Ya', 'Side', 1, 1),
(15, 14, 'Menu Backend', 'menu', '', 'Tidak', 'Side', 1, 1),
(16, 14, 'Menu Frontend', 'menu_depan', '', 'Ya', 'Side', 2, 1),
(17, 10, 'Video', 'videos', '', 'Tidak', 'Side', 3, 1),
(18, 10, 'Banner', 'banner', '', 'Ya', 'Side', 4, 1),
(19, 0, 'Data Customer', 'pembeli', '&#xe001;', 'Ya', 'Side', 8, 1),
(20, 0, 'Data Penjual', 'penjual', '&#xe001;', 'Ya', 'Side', 8, 1),
(21, 0, 'Produk', 'product', ']', 'Ya', 'Side', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id_role` int(2) NOT NULL,
  `id_level` int(1) NOT NULL,
  `module` varchar(10) DEFAULT NULL,
  `akses` int(1) DEFAULT '0' COMMENT '0 = False, 1 = True'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id_role`, `id_level`, `module`, `akses`) VALUES
(1, 1, 'role', 1),
(3, 1, 'log', 1),
(4, 1, 'users', 1),
(7, 1, 'level', 1),
(8, 1, 'server', 1),
(9, 1, 'device', 1),
(10, 2, 'server', 1),
(11, 2, 'device', 1),
(12, 8, 'device', 1),
(13, 2, 'server', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `kode_user` varchar(8) NOT NULL,
  `nopeg` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` text,
  `nohp` varchar(14) DEFAULT NULL,
  `alamat` text,
  `foto` varchar(255) DEFAULT NULL,
  `id_level` int(1) NOT NULL DEFAULT '0',
  `blokir` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`kode_user`, `nopeg`, `nama`, `email`, `password`, `nohp`, `alamat`, `foto`, `id_level`, `blokir`) VALUES
('USR0002', '1234567', 'Adam', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', '0812345678900', 'Jakarta Selatan', 'no-image.png', 1, 'N'),
('USR0005', 'KH11122', 'Khair Baru', 'Khair@gmail.com', '202cb962ac59075b964b07152d234b70', '081631276213', 'Depok', 'unnamed-removebg-preview2.png', 1, 'N'),
('USR000US', '1551511', 'msi', 'msi@gmail.com', '202cb962ac59075b964b07152d234b70', '231661616161', 'jl.msi', 'Screenshot_71.jpg', 1, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_blok`
--
ALTER TABLE `t_blok`
  ADD PRIMARY KEY (`kode_blok`) USING BTREE,
  ADD KEY `key` (`kode_blok`),
  ADD KEY `kode_user` (`kode_user`);

--
-- Indexes for table `t_client`
--
ALTER TABLE `t_client`
  ADD PRIMARY KEY (`kode_klient`) USING BTREE,
  ADD KEY `key` (`kode_blok`) USING BTREE,
  ADD KEY `kode_user` (`kode_user`);

--
-- Indexes for table `t_histori`
--
ALTER TABLE `t_histori`
  ADD PRIMARY KEY (`id_histori`),
  ADD KEY `kode_user` (`kode_user`);

--
-- Indexes for table `t_level`
--
ALTER TABLE `t_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id_role`,`id_level`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`kode_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_histori`
--
ALTER TABLE `t_histori`
  MODIFY `id_histori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `t_level`
--
ALTER TABLE `t_level`
  MODIFY `id_level` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id_menu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `id_role` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_blok`
--
ALTER TABLE `t_blok`
  ADD CONSTRAINT `t_blok_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `t_users` (`kode_user`);

--
-- Constraints for table `t_client`
--
ALTER TABLE `t_client`
  ADD CONSTRAINT `t_client_ibfk_1` FOREIGN KEY (`kode_blok`) REFERENCES `t_blok` (`kode_blok`),
  ADD CONSTRAINT `t_client_ibfk_2` FOREIGN KEY (`kode_user`) REFERENCES `t_users` (`kode_user`);

--
-- Constraints for table `t_role`
--
ALTER TABLE `t_role`
  ADD CONSTRAINT `t_role_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `t_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
