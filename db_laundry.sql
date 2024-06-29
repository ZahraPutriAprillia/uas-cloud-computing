-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2024 pada 10.27
-- Versi server: 11.1.2-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(22) NOT NULL,
  `Adm_Name` varchar(255) NOT NULL,
  `Adm_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin_login`
--

INSERT INTO `admin_login` (`ID`, `Adm_Name`, `Adm_Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `expense_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `expenses`
--

INSERT INTO `expenses` (`id`, `item_name`, `price`, `expense_date`) VALUES
(10, 'sabun', 15000.00, '2024-06-17 19:05:00'),
(11, 'Sapu', 20000.00, '2024-06-26 14:11:00'),
(12, 'Kipas Angin', 300000.00, '2024-07-10 18:16:00'),
(13, 'Besi Jemuran', 120000.00, '2024-06-27 21:14:00'),
(14, 'Sampah', 100000.00, '2024-06-28 03:44:00'),
(15, 'Piring', 22000.00, '2024-06-13 22:49:00'),
(16, 'Sayur', 150000.00, '2024-06-13 22:55:00'),
(17, 'Hutang', 150000.00, '2024-06-28 02:48:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `ID` int(22) NOT NULL,
  `User_ID` int(22) NOT NULL,
  `Order_Code` int(20) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Total_Item` int(22) NOT NULL,
  `Total_Price` int(22) NOT NULL,
  `Pick_up_date` date NOT NULL,
  `Delivery_date` date NOT NULL,
  `Phone_No` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Pick_Up_status` text NOT NULL,
  `Delivery_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`ID`, `User_ID`, `Order_Code`, `User_Name`, `Total_Item`, `Total_Price`, `Pick_up_date`, `Delivery_date`, `Phone_No`, `Address`, `Pick_Up_status`, `Delivery_status`) VALUES
(26, 9, 904859, 'syffanii', 9, 45000, '2024-05-29', '2024-05-30', '0812345678', 'jombang', 'No', 'Deliver'),
(29, 9, 566070, 'syffanii', 1, 5000, '2024-05-29', '2024-05-31', '085576', 'jombang', 'No', 'Deliver'),
(35, 20, 431675, 'syffanii', 11, 55000, '2024-06-04', '2024-06-05', '0888', 'Pamulang', 'No', 'Deliver'),
(36, 21, 763888, 'rico', 7, 35000, '2024-06-04', '2024-06-05', '082294966527', 'BSD', 'No', 'Deliver'),
(37, 21, 183402, 'rico', 3, 36000, '2024-06-15', '2024-06-16', '082294966527', 'Ciputat', 'No', 'Deliver'),
(39, 23, 435655, 'Afghan', 13, 86000, '2024-06-04', '2024-06-08', '082245677654', 'Jelupang Raya', 'No', 'Deliver'),
(40, 23, 514133, 'Afghan', 3, 19000, '2024-06-11', '2024-06-14', '082245677654', 'Pamulang Barat', 'No', 'Deliver'),
(41, 29, 352667, 'Jimi', 17, 85000, '2024-06-04', '2024-06-10', '083849018295', 'Rempoa', 'No', 'Deliver'),
(42, 29, 639962, 'Jimi', 5, 54000, '2024-05-29', '2024-06-03', '083849018295', 'BSD', 'No', 'Deliver'),
(43, 24, 107633, 'Jarot', 9, 57000, '2024-05-28', '2024-06-05', '08185743103', 'Pamulang', 'No', 'Deliver'),
(44, 24, 277443, 'Jarot', 4, 31000, '2024-06-02', '2024-06-04', '08185743103', 'Jakarta Selatan', 'No', 'Deliver'),
(46, 20, 243908, 'syffanii', 10, 50000, '2024-06-06', '2024-06-08', '0895337094747', 'Bandung', 'No', 'Deliver'),
(47, 20, 976870, 'syffanii', 3, 48000, '2024-06-05', '2024-06-08', '0895337094747', 'Serua', 'No', 'Deliver'),
(48, 27, 289842, 'Agil', 3, 24000, '2024-06-05', '2024-06-06', '081380318645', 'Serpong', 'No', 'Deliver'),
(49, 27, 471519, 'Agil', 1, 17000, '2024-06-05', '2024-06-07', '081380318645', 'Jakarta Barat', 'No', 'Deliver'),
(50, 24, 826280, 'Jarot', 3, 36000, '2024-06-07', '2024-06-08', '08185743103', 'Bali', 'No', 'Deliver'),
(51, 24, 290380, 'Jarot', 1, 6000, '2024-06-07', '2024-06-08', '08185743103', 'Pamulang', 'No', 'Deliver'),
(52, 25, 303218, 'Wahyu', 2, 32000, '2024-06-11', '2024-06-12', '09679034871', 'Ciputat', '', 'No'),
(53, 25, 936186, 'Wahyu', 1, 8000, '2024-06-19', '2024-06-21', '09679034871', 'Pondok Cabe', 'No', 'No'),
(54, 25, 473973, 'Wahyu', 4, 32000, '2024-06-19', '2024-06-22', '09679034871', 'BSD', 'No', 'Deliver'),
(55, 29, 472132, 'Jimi', 8, 40000, '2024-06-13', '2024-06-15', '083849018295', 'Pamulang', 'No', 'No'),
(56, 29, 632596, 'Jimi', 3, 15000, '2024-06-26', '2024-06-29', '083849018295', 'Reni Jaya', 'No', 'No'),
(57, 28, 457859, 'Catur', 12, 82000, '2024-06-27', '2024-06-29', '081238510493', 'Bintaro', 'No', 'Deliver'),
(58, 28, 700252, 'Catur', 4, 20000, '2024-06-13', '2024-06-15', '081238510493', 'Bintaro', 'No', 'No'),
(59, 22, 956815, 'Rian', 5, 80000, '2024-07-05', '2024-07-06', '081976547896', 'Bintaro', 'No', 'No'),
(60, 22, 958858, 'Rian', 6, 72000, '2024-06-14', '2024-06-15', '081976547896', 'Bintaro', 'No', 'No'),
(61, 21, 923426, 'rico', 5, 40000, '2024-07-17', '2024-07-19', '0862572572', 'Rempoa', 'No', 'No'),
(62, 20, 993635, 'syffanii', 3, 45000, '2024-06-14', '2024-06-15', '0895337094747', 'Madura', 'No', 'Deliver'),
(63, 20, 43560, 'syffanii', 1, 12000, '2024-06-28', '2024-06-30', '0895337094747', 'Jakarta Selatan', 'No', 'Deliver'),
(64, 26, 188965, 'Yoga', 3, 36000, '2024-06-22', '2024-06-23', '09640618357', 'Medan', 'No', 'No'),
(65, 26, 896260, 'Yoga', 5, 25000, '2024-06-22', '2024-06-23', '09640618357', 'Depok', 'No', 'No'),
(66, 12, 907631, 'Arsa', 1, 15000, '2024-06-15', '2024-06-16', '085939845992', 'England', 'No', 'Deliver'),
(67, 12, 581786, 'Arsa', 1, 9000, '2024-06-13', '2024-06-15', '085939845992', 'Papua', 'No', 'Deliver'),
(68, 30, 424659, 'Arsa Raihan Manika', 40, 240000, '2024-06-13', '2024-06-14', '085939845992', 'BPI', 'No', 'Deliver'),
(69, 30, 876479, 'Arsa Raihan Manika', 20, 210000, '2024-06-24', '2024-06-28', '085939845992', 'BPI', 'No', 'Deliver'),
(70, 20, 578857, 'syffanii', 15, 75000, '2024-06-13', '2024-06-14', '0895337094747', 'Jombang Rawa Lele', 'No', 'Deliver'),
(71, 20, 165331, 'syffanii', 39, 245000, '2024-06-15', '2024-06-16', '0895337094747', 'Jombang Rawa Lele', 'No', 'Deliver');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_temp`
--

CREATE TABLE `order_temp` (
  `ID` int(22) NOT NULL,
  `User_ID` int(22) NOT NULL,
  `Services_Name` text NOT NULL,
  `Services_Type` text NOT NULL,
  `Laundry_Price` int(30) NOT NULL,
  `Dry_Price` int(30) NOT NULL,
  `Total_Item` int(30) NOT NULL,
  `Pick_Delivery_Status` text NOT NULL,
  `Order_Status` text NOT NULL,
  `Order_code` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `order_temp`
--

INSERT INTO `order_temp` (`ID`, `User_ID`, `Services_Name`, `Services_Type`, `Laundry_Price`, `Dry_Price`, `Total_Item`, `Pick_Delivery_Status`, `Order_Status`, `Order_code`) VALUES
(44, 9, 'Baju', 'Cucian', 3000, 2000, 9, '2', 'active', '904859'),
(45, 9, 'Baju', 'Cucian', 3000, 2000, 12, '2', 'active', '350989'),
(46, 9, 'Baju', 'Cucian', 3000, 2000, 11, '2', 'active', '621940'),
(47, 9, 'Baju', 'Cucian', 3000, 2000, 1, '2', 'active', '566070'),
(48, 13, 'Baju', 'Cucian', 3000, 2000, 1, '2', 'active', '519654'),
(49, 13, 'Baju', 'Cucian', 3000, 2000, 1, '2', 'active', '491807'),
(50, 13, 'Baju', 'Cucian', 3000, 2000, 1, '2', 'active', '743855'),
(51, 13, 'Baju', 'Cucian', 3000, 2000, 1, '2', 'active', '773228'),
(52, 13, 'Baju', 'Cucian', 3000, 2000, 8, '2', 'active', '292694'),
(53, 13, 'Baju', 'Cucian', 3000, 2000, 4, '2', 'active', '646771'),
(54, 13, 'Baju', 'Cucian', 3000, 2000, 3, '2', 'active', '332954'),
(55, 20, 'Baju', 'Cucian', 3000, 2000, 11, '2', 'active', '431675'),
(57, 21, 'Baju', 'Cucian', 3000, 2000, 7, '2', 'active', '763888'),
(58, 21, 'Jas', 'Cucian', 7000, 5000, 3, '2', 'active', '183402'),
(59, 21, 'Jas', 'Cucian', 7000, 5000, 1, '2', 'active', '545228'),
(60, 21, 'Sejadah', 'Cucian', 4000, 2000, 2, '2', 'active', '545228'),
(61, 21, 'Jaket', 'Cucian', 5000, 3000, 1, '2', 'active', '545228'),
(62, 23, 'Seragam Kerja', 'Cucian', 5000, 3000, 2, '2', 'active', '435655'),
(63, 23, 'Kemeja', 'Cucian', 5000, 3000, 4, '2', 'active', '435655'),
(64, 23, 'Jaket', 'Cucian', 5000, 3000, 1, '2', 'active', '435655'),
(65, 23, 'Kaus Kaki', 'Cucian', 3000, 2000, 6, '2', 'active', '435655'),
(66, 23, 'Sarung Bantal', 'Cucian', 3000, 2000, 1, '2', 'active', '514133'),
(67, 23, 'Tas', 'Cucian', 5000, 3000, 1, '2', 'active', '514133'),
(68, 23, 'Sejadah', 'Cucian', 4000, 2000, 1, '2', 'active', '514133'),
(69, 29, 'Baju', 'Cucian', 3000, 2000, 12, '2', 'active', '352667'),
(70, 29, 'Celana', 'Cucian', 3000, 2000, 5, '2', 'active', '352667'),
(71, 29, 'Jas', 'Cucian', 7000, 5000, 1, '2', 'active', '639962'),
(72, 29, 'Selimut', 'Cucian', 12000, 4000, 2, '2', 'active', '639962'),
(73, 29, 'Kaus Kaki', 'Cucian', 3000, 2000, 2, '2', 'active', '639962'),
(74, 24, 'Kaus Kaki', 'Cucian', 3000, 2000, 6, '2', 'active', '107633'),
(75, 24, 'Sarung', 'Cucian', 3000, 2000, 2, '2', 'active', '107633'),
(76, 24, 'Jaket Kulit', 'Cucian', 12000, 5000, 1, '2', 'active', '107633'),
(77, 24, 'Seragam Sekolah', 'Cucian', 3000, 2000, 3, '2', 'active', '277443'),
(78, 24, 'BedCover', 'Cucian', 12000, 4000, 1, '2', 'active', '277443'),
(79, 20, 'BedCover', 'Cucian', 12000, 4000, 4, '2', 'active', '865617'),
(80, 20, 'Baju', 'Cucian', 3000, 2000, 10, '2', 'active', '243908'),
(81, 20, 'Selimut', 'Cucian', 12000, 4000, 3, '2', 'active', '976870'),
(82, 27, 'Seragam Kerja', 'Cucian', 5000, 3000, 3, '2', 'active', '289842'),
(83, 27, 'Jaket Kulit', 'Cucian', 12000, 5000, 1, '2', 'active', '471519'),
(84, 24, 'Jas', 'Cucian', 7000, 5000, 3, '2', 'active', '826280'),
(85, 24, 'Almamater', 'Cucian', 4000, 2000, 1, '2', 'active', '290380'),
(86, 25, 'BedCover', 'Cucian', 12000, 4000, 2, '2', 'active', '303218'),
(87, 25, 'Jaket', 'Cucian', 5000, 3000, 1, '2', 'active', '936186'),
(88, 25, 'Tas', 'Cucian', 5000, 3000, 4, '2', 'active', '473973'),
(89, 29, 'Kaus Kaki', 'Cucian', 3000, 2000, 8, '2', 'active', '472132'),
(90, 29, 'Celana', 'Cucian', 3000, 2000, 3, '2', 'active', '632596'),
(91, 28, 'Sejadah', 'Cucian', 4000, 2000, 7, '2', 'active', '457859'),
(92, 28, 'Seragam Kerja', 'Cucian', 5000, 3000, 5, '2', 'active', '457859'),
(93, 28, 'Sarung', 'Cucian', 3000, 2000, 4, '2', 'active', '700252'),
(94, 22, 'Selimut', 'Cucian', 12000, 4000, 5, '2', 'active', '956815'),
(95, 22, 'Gaun', 'Cucian', 7000, 5000, 6, '2', 'active', '958858'),
(96, 21, 'Seragam Kerja', 'Cucian', 5000, 3000, 5, '2', 'active', '923426'),
(97, 20, 'Kebaya', 'Cucian', 10000, 5000, 3, '2', 'active', '993635'),
(98, 20, 'Gaun', 'Cucian', 7000, 5000, 1, '2', 'active', '43560'),
(99, 26, 'Jas', 'Cucian', 7000, 5000, 3, '2', 'active', '188965'),
(100, 26, 'Celana', 'Cucian', 3000, 2000, 5, '2', 'active', '896260'),
(101, 12, 'Kebaya', 'Cucian', 10000, 5000, 1, '2', 'active', '907631'),
(102, 12, 'Mukena', 'Cucian', 6000, 3000, 1, '2', 'active', '581786'),
(103, 30, 'Baju', 'Cucian', 3000, 2000, 10, '2', 'active', '424659'),
(104, 30, 'Celana', 'Cucian', 3000, 2000, 20, '2', 'active', '424659'),
(105, 30, 'Mukena', 'Cucian', 6000, 3000, 10, '2', 'active', '424659'),
(106, 30, 'Selimut', 'Cucian', 12000, 4000, 4, '2', 'active', '876479'),
(107, 30, 'Tas', 'Cucian', 5000, 3000, 7, '2', 'active', '876479'),
(108, 30, 'Gamis', 'Kering', 6000, 4000, 9, '2', 'active', '876479'),
(109, 20, 'Baju', 'Cucian', 3000, 2000, 5, '2', 'active', '578857'),
(110, 20, 'Celana', 'Cucian', 3000, 2000, 10, '2', 'active', '578857'),
(111, 20, 'Celana', 'Cucian', 3000, 2000, 32, '2', 'active', '165331'),
(112, 20, 'Baju', 'Cucian', 3000, 2000, 1, '2', 'active', '165331'),
(113, 20, 'BedCover', 'Cucian', 12000, 4000, 4, '2', 'active', '165331'),
(114, 20, 'Seragam Kerja', 'Kering', 5000, 3000, 2, '2', 'active', '165331');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_type`
--

CREATE TABLE `services_type` (
  `ID` int(22) NOT NULL,
  `Services_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `services_type`
--

INSERT INTO `services_type` (`ID`, `Services_Name`) VALUES
(6, 'Cucian'),
(8, 'Kering');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services_uploade`
--

CREATE TABLE `services_uploade` (
  `ID` int(22) NOT NULL,
  `Services_Name` varchar(100) NOT NULL,
  `Services_Type` varchar(100) NOT NULL,
  `Dry_Price` int(22) NOT NULL,
  `Laundry_Price` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `services_uploade`
--

INSERT INTO `services_uploade` (`ID`, `Services_Name`, `Services_Type`, `Dry_Price`, `Laundry_Price`) VALUES
(1, 'Baju', 'Cucian', 2000, 3000),
(2, 'Celana', 'Cucian', 2000, 3000),
(3, 'Gaun', 'Cucian', 5000, 7000),
(4, 'Jas', 'Cucian', 5000, 7000),
(5, 'Boneka', 'Cucian', 4000, 6000),
(6, 'Seragam Sekolah', 'Cucian', 2000, 3000),
(7, 'Mukena', 'Cucian', 3000, 6000),
(8, 'Sejadah', 'Cucian', 2000, 4000),
(9, 'Selimut', 'Cucian', 4000, 12000),
(10, 'BedCover', 'Cucian', 4000, 12000),
(11, 'Kebaya', 'Cucian', 5000, 10000),
(12, 'Tas', 'Cucian', 3000, 5000),
(13, 'Kaus Kaki', 'Cucian', 2000, 3000),
(14, 'Seragam Kerja', 'Cucian', 3000, 5000),
(15, 'Jaket', 'Cucian', 3000, 5000),
(16, 'Jaket Kulit', 'Cucian', 5000, 12000),
(17, 'Sarung', 'Cucian', 2000, 3000),
(18, 'Almamater', 'Cucian', 2000, 4000),
(19, 'Sarung Bantal', 'Cucian', 2000, 3000),
(20, 'Kemeja', 'Cucian', 3000, 5000),
(21, 'Rok', 'Cucian', 3000, 5000),
(22, 'Piyama', 'Cucian', 2500, 4500),
(23, 'Handuk', 'Cucian', 2000, 3000),
(24, 'Baju Tidur', 'Cucian', 2500, 3500),
(25, 'Batik', 'Cucian', 3500, 7000),
(26, 'Rompi', 'Cucian', 2000, 3000),
(27, 'Gamis', 'Cucian', 4000, 6000),
(28, 'Baju Olahraga', 'Cucian', 3000, 5000),
(29, 'Legging', 'Cucian', 2000, 3000),
(30, 'Overall', 'Cucian', 3500, 5500),
(31, 'Apron', 'Cucian', 2000, 3000),
(32, 'Kaus', 'Cucian', 2000, 3000),
(33, 'Sweatpants', 'Cucian', 2500, 3500),
(34, 'Daster', 'Cucian', 3000, 4000),
(35, 'Kulot', 'Cucian', 3000, 4500),
(36, 'Jubah', 'Cucian', 4000, 6000),
(37, 'Syal', 'Cucian', 1500, 2500),
(38, 'Topi', 'Cucian', 1000, 2000),
(39, 'Sarung Tangan', 'Cucian', 1000, 1500),
(40, 'Sweater', 'Cucian', 3000, 6000),
(41, 'Kain Batik', 'Cucian', 4000, 8000),
(42, 'Tuxedo', 'Cucian', 8000, 10000),
(43, 'Sarung', 'Cucian', 2000, 3500),
(44, 'Cardigan', 'Cucian', 2500, 4500),
(45, 'Polo Shirt', 'Cucian', 3000, 5000),
(46, 'Bandana', 'Cucian', 1000, 1500),
(47, 'Baju Muslim', 'Cucian', 3500, 6000),
(48, 'Kain Sarung', 'Cucian', 2000, 4000),
(49, 'Blazer', 'Kering', 6000, 8000),
(50, 'Celana Jeans', 'Kering', 4000, 7000),
(51, 'Syal', 'Kering', 1500, 2500),
(52, 'Topi', 'Kering', 1000, 2000),
(53, 'Sarung Tangan', 'Kering', 1000, 1500),
(54, 'Sweater', 'Kering', 3000, 6000),
(55, 'Kain Batik', 'Kering', 4000, 8000),
(56, 'Tuxedo', 'Kering', 8000, 10000),
(57, 'Sarung', 'Kering', 2000, 3500),
(58, 'Cardigan', 'Kering', 2500, 4500),
(59, 'Polo Shirt', 'Kering', 3000, 5000),
(60, 'Bandana', 'Kering', 1000, 1500),
(61, 'Baju Muslim', 'Kering', 3500, 6000),
(62, 'Kain Sarung', 'Kering', 2000, 4000),
(63, 'Baju', 'Kering', 2000, 3000),
(64, 'Celana', 'Kering', 2000, 3000),
(65, 'Gaun', 'Kering', 5000, 7000),
(66, 'Jas', 'Kering', 5000, 7000),
(67, 'Boneka', 'Kering', 4000, 6000),
(68, 'Seragam Sekolah', 'Kering', 2000, 3000),
(69, 'Mukena', 'Kering', 3000, 6000),
(70, 'Sejadah', 'Kering', 2000, 4000),
(71, 'Selimut', 'Kering', 4000, 12000),
(72, 'BedCover', 'Kering', 4000, 12000),
(73, 'Kebaya', 'Kering', 5000, 10000),
(74, 'Tas', 'Kering', 3000, 5000),
(75, 'Kaus Kaki', 'Kering', 2000, 3000),
(76, 'Seragam Kerja', 'Kering', 3000, 5000),
(77, 'Jaket', 'Kering', 3000, 5000),
(78, 'Jaket Kulit', 'Kering', 5000, 12000),
(79, 'Sarung', 'Kering', 2000, 3000),
(80, 'Almamater', 'Kering', 2000, 4000),
(81, 'Sarung Bantal', 'Kering', 2000, 3000),
(82, 'Kemeja', 'Kering', 3000, 5000),
(83, 'Rok', 'Kering', 3000, 5000),
(84, 'Piyama', 'Kering', 2500, 4500),
(85, 'Handuk', 'Kering', 2000, 3000),
(86, 'Baju Tidur', 'Kering', 2500, 3500),
(87, 'Batik', 'Kering', 3500, 7000),
(88, 'Rompi', 'Kering', 2000, 3000),
(89, 'Gamis', 'Kering', 4000, 6000),
(90, 'Baju Olahraga', 'Kering', 3000, 5000),
(91, 'Legging', 'Kering', 2000, 3000),
(92, 'Overall', 'Kering', 3500, 5500),
(93, 'Apron', 'Kering', 2000, 3000),
(94, 'Kaus', 'Kering', 2000, 3000),
(95, 'Sweatpants', 'Kering', 2500, 3500),
(96, 'Daster', 'Kering', 3000, 4000),
(97, 'Kulot', 'Kering', 3000, 4500),
(98, 'Jubah', 'Kering', 4000, 6000),
(99, 'Kain Batik', 'Cucian', 4000, 8000),
(100, 'Batik', 'Cucian', 3500, 7000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `total_summary`
--

CREATE TABLE `total_summary` (
  `id` int(11) NOT NULL,
  `total_income` decimal(10,2) NOT NULL,
  `total_expenses` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `ID` int(22) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Contact_No` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`ID`, `User_Name`, `Password`, `Contact_No`) VALUES
(5, 'imran', '1234', '0'),
(6, 'usman', '1212', '0'),
(7, 'admin', '123', '0'),
(8, 'Sikander', 'shikari', '0'),
(12, 'Arsa', 'Arsa123', '085939845992'),
(13, 'Arsa11', 'Raihan11', '0866576'),
(15, 'Rian', 'Rian12345', '0812345'),
(16, 'Rian', 'Rian123', '0812345'),
(17, 'Pajar11', '$2y$10$5Y97zIkZeIgEtRnJZsD1iOqKUDXfQSbK9NL2taUpBw8STLh2HmG..', '085765756'),
(19, 'AEH', '$2y$10$oe0BkoyjtLmTfwGfJXT3COhjXbDXGm9UqTIl2LerMTJJs7nNOl.gS', '09898900'),
(20, 'syffanii', 'fani123', '0895337094747'),
(21, 'rico', 'yuhu2132', '082294966527'),
(22, 'Rian', 'abc123', '081976547896'),
(23, 'Afghan', ':BLszsPTW8Uq2WC', '082245677654'),
(24, 'Jarot', 'abc123', '08185743103'),
(25, 'Wahyu', 'abc123', '09679034871'),
(26, 'Yoga', 'abc123', '09640618357'),
(27, 'Agil', 'abc123', '081380318645'),
(28, 'Catur', 'abc123', '081238510493'),
(29, 'Jimi', 'abc123', '083849018295'),
(30, 'Arsa Raihan Manika', 'Raihan11', '085939845992');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_registration`
--

CREATE TABLE `user_registration` (
  `ID` int(22) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact_No` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_registration`
--

INSERT INTO `user_registration` (`ID`, `User_Name`, `Full_Name`, `Password`, `Address`, `Contact_No`) VALUES
(24, 'Arsa', 'Arsa Raihan Manika', 'Arsa123', 'BPI Blok A17 No 3', '085939845992'),
(32, 'syffanii', 'Shakina Putri Syifani', 'fani123', 'Jombang Rawa Lele', '0895337094747'),
(34, 'Rian', 'Rian Nugraha', 'abc123', 'Pamulang', '081976547896'),
(35, 'Afghan', 'Afghan Fadilah', ':BLszsPTW8Uq2WC', 'Lebak Bulus', '082245677654'),
(36, 'Jarot', 'Jarot eko', 'abc123', 'Mencong', '08185743103'),
(37, 'Wahyu', 'Wahyudi', 'abc123', 'Mencong', '09679034871'),
(38, 'Yoga', 'Abdul Yoga', 'abc123', 'Japos', '09640618357'),
(39, 'Agil', 'Agil saputra', 'abc123', 'Hj.Kana', '081380318645'),
(40, 'Catur', 'Catur Yudianto', 'abc123', 'Tigaraksa', '081238510493'),
(41, 'Jimi', 'Jimi Multazam', 'abc123', 'Matraman', '083849018295'),
(42, 'Arsa Raihan Manika', 'Arsa Raihan Manika', 'Raihan11', 'BPI', '085939845992');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `services_type`
--
ALTER TABLE `services_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `services_uploade`
--
ALTER TABLE `services_uploade`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `total_summary`
--
ALTER TABLE `total_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `services_type`
--
ALTER TABLE `services_type`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `services_uploade`
--
ALTER TABLE `services_uploade`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT untuk tabel `total_summary`
--
ALTER TABLE `total_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_login`
--
ALTER TABLE `user_login`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `ID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
