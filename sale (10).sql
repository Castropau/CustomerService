-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 06:18 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `firstname`, `lastname`, `password`) VALUES
(1, 'sample', 'sample', 'sample', 'sample'),
(2, 'try', 'firstname', 'lastname', 'try');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `address`, `phone`) VALUES
('SBIT-3G(AO50)', 'gawa', 'gawa', 'gawa', '09123456789'),
('SBIT-3G(5NEX)', 'asd', 'asd', 'asd', '09658745959'),
('SBIT-3G(K8EF)', 'asd', 'asd', 'asd', '09658745959'),
('SBIT-3G(NUST)', 'asd', 'asd', 'asd', '09658745959'),
('SBIT-3G(LJWP)', 'sample1', 'sample1', 'asdasd', '09123456789'),
('SBIT-3G(CQ08)', 'NAME', 'NAME', '123123', '09123456789'),
('SBIT-3G(0YB9)', 'name', 'name', 'name', '09123458758'),
('SBIT-3G(9ZW7)', 'aljhon', 'aljhon', 'aljhon', '09123468745'),
('SBIT-3G(689F)', 'asdasdasdas', 'asdasd', 'asdasd', '09123458741'),
('SBIT-3G(8TFL)', 'number', 'number', 'number', '09123456789'),
('SBIT-3G(LCXY)', 'AHAHHAHA', 'HAHAHAHA', 'HAHHAAHAHA', '09123456789'),
('SBIT-3G(5RZO)', 'Customer Firstname', 'Lastname Firstname', 'sample address', '09123456712');

-- --------------------------------------------------------

--
-- Table structure for table `defect`
--

CREATE TABLE `defect` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `requestqty` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `defect_log`
--

CREATE TABLE `defect_log` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `requestqty` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_login`
--

CREATE TABLE `employee_login` (
  `id` int(11) NOT NULL,
  `login_id` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_password` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `serial_id` int(11) DEFAULT NULL,
  `position` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_login`
--

INSERT INTO `employee_login` (`id`, `login_id`, `login_password`, `employee_id`, `serial_id`, `position`) VALUES
(1, '3396YECYEC', '$2y$10$lRJl9wn21Mh.3mh6aRxxAufabCSnReseDZ6U9CcU1UqNIxP97Y6vi', 57, NULL, 'admin'),
(2, '5872CRISOSTOMO', '$2y$10$.TxQhKsZJmjxD7CnEvMAduBG/HX1l3TBLvu4OXSTKJQ9Pmkpyu0Si', 58, NULL, 'admin'),
(3, '7814DE VERA', '$2y$10$sOBjDnksaNaFzZKwv4GWYeiqlDKYuKHsATf7LmLbmP3mBcLOTHEvu', 60, NULL, 'employee'),
(4, '5013MEDINA', '$2y$10$ZcjGU/5NGnS5tzpHwHGnTOk17MRraasl47YSk/DaxyfUWdxj4U9Cu', 61, NULL, 'employee'),
(5, '1256DELA CRUZ', '$2y$10$1tQWXFYO49wKetEfCHmUneHmbOP2nUnQ8.0ujEG73BFLQ6/pr/Fmm', 63, NULL, 'employee'),
(6, '7908PAREJA', '$2y$10$NQNoZ6.MJ25z0c9M6BG8P.z9Fas.XJoITNOCwUCReaYl5q/kDVjmG', 62, NULL, 'employee'),
(7, '2927PAREJA', '$2y$10$yDKB3P.hhracmXxIYeQNf.9J.cJlCfU2D3Dq/YDDkIz/CO4Zw.XYK', 62, NULL, 'employee'),
(8, '6459TACSIAT', '$2y$10$zxWUOd4vSbulvzdxGeR9OeW.1jPDxZ07onJgcFZIp4S7PGM6ySZLm', 64, NULL, 'employee'),
(9, '2620AMIT', '$2y$10$J1mmzUta4M/Wkaqtdr4Or.XiiQ6c7gcbYixzZsVJ6IzbDzDfJPB/q', 65, NULL, 'admin'),
(10, '9013GUIYAB', '$2y$10$cg7TfNzsekUDCGvUA4NPHe7Bi5imPS6LWDZhx5ppJVpgCK0H/8UW6', 66, NULL, 'employee'),
(11, '1637CHUA', '$2y$10$GcK7eL3xj8IVpS8q5sMefusfKMXos81Unn1eTkO3q8TB8Yl.Yr1Fu', 67, NULL, 'admin'),
(12, '9024MALIWAT', '$2y$10$of3nVNW3G8I.culfG9psuO0hgXt.fNL3ep1MxajNxIQkncwOL7eJm', 68, NULL, 'employee'),
(13, '7231ADRALES', '$2y$10$exr25vRbIxuMlAzSG.p7j.YlF2H5.m2wsIJkLHDmgulIMgn4dHHem', 69, NULL, 'employee'),
(14, '1718MACATIAG', '$2y$10$3woF5I74YBRt2uynT7iXnexOQbeIeuavk0QbHtBC5gXXpRt9CudiC', 70, NULL, 'employee'),
(16, '9479CUSTODIO', '$2y$10$ikGgXEns9oLkY7dbCt/TUuSiD4n5Z7Cq6R48X0NBLo.r8huo.B7Yu', 71, NULL, 'admin'),
(21, '5979OGHAYON', '$2y$10$M72m/EtJT20Gj05dEj57OepVsXQ8Q8GCrJKOJ/PcyZhX5Y6TS/qWS', 73, NULL, 'admin'),
(22, '3078VILLAFUERTE', '$2y$10$cqJp1gdo.DSPS1yuC4U1le1vgohXa4w5Vu/vKNl4/xmdb.nHZXlg2', 75, NULL, 'employee'),
(23, '1416MORALLOS', '$2y$10$zOuZ4UzqYJIItRgdR9lEv.zJOarKRPnb/XaZXA9FwWTLGIqRiCnsO', 76, NULL, 'employee'),
(24, '9602FALLARIA', '$2y$10$J0EAjzanAcAi/km37B4R..Cqkl2iJp.B4PBEa0q8J1/ew2QthHXkG', 79, NULL, 'employee'),
(25, '5958BAJA', '$2y$10$O5DaRswqfLG/07vQPoOH/uCeD2JTuT7Sc3j1GKHTDGjYwgZy1koiG', 78, NULL, 'employee'),
(26, '2264CABAHUG', '$2y$10$2CuQHDcqNzVBaHCWMWUyEuXIDMhKre5fbNtmNopp9HZ3OC9JZvYWi', 77, NULL, 'employee'),
(27, '9717BITOON', '$2y$10$iHMXJCJmwv98G.prf2ckNOP75Ea1x4BGi9Odi61.qtINfFGTn50ma', 80, NULL, 'admin'),
(28, '6008PIMENTEL', '$2y$10$63vvjF3iW1dPoZdfQPxiDuWCTiq2VgJ5UEAcTPcC43g9xq9DOlC9K', 81, NULL, 'admin'),
(29, '2675UY', '$2y$10$JGbwFLEDktO6GFvWtodT9.M0fh3Gg.PZKZHrEXuYKfeK5guCjuJM.', 82, NULL, 'employee'),
(30, '7825ACILO', '$2y$10$Zc1KnShn/HDNpSdksS4.quo3jHglYuOOevoro1etx8DeiMfsYES8i', 85, NULL, 'employee'),
(31, '7409BALUBAL', '$2y$10$MA.oRkupuHwk2ttIFaHEJe6P8.3tDOxTk0GjMPZ8Lmyn4AYKFE8Pm', 86, NULL, 'employee'),
(32, '8652BALUBAL', '$2y$10$woYTklrWnYqSIT0mlHEBqeOq8He7i4Mx6U6F7sOIjF/s8mQ8HikrC', 86, NULL, 'employee'),
(33, '3683NARISMA', '$2y$10$gNKhbCc3YUfJt4568JvKe.WSmMZrpC.n.jw5Uo9wrSTCJYYf6sRYS', 87, NULL, 'employee'),
(34, '8336RAMISCAL', '$2y$10$xkNvxkK7ivBAR6kIDIbu5uzrSHm/n9uNhyOuxtL7I1kqH2E5zj72i', 88, NULL, 'admin'),
(35, '4282ARISTORENAS', '$2y$10$BUbFbXaedXRWwiR3nQnZF.A0Bgb8V4p6Zblqbnnecf1xTwy06jhVi', 89, NULL, 'employee'),
(36, '2951DELOS REYES', '$2y$10$8LTgy8SxR2bCR/L7ms57a.HrAPvNUI54m8X2cBg5qas6LLgJR/3Wu', 90, NULL, 'employee'),
(37, '2125BALOSA', '$2y$10$YYz6wlV9N6JqjJiSSA2Iku3ryX5HLIym/U/6HN2apl/u147Srz/Aa', 91, NULL, 'employee'),
(38, '4184DE JESUS', '$2y$10$4oW40VF3h2RacGZEUERz7O9adlKgfg8WfWH.nagVT2qlPSKJAxlpO', 92, NULL, 'admin'),
(39, '7387COBALLES', '$2y$10$qq.2di/e6aZRn/UAYLn8WuZzq7Yd7ArWfIffaMQMCoKU0BH3uVUpG', 83, NULL, 'employee'),
(40, '1014ROJAS', '$2y$10$5K6Xvayr6s1j7SsJICKozOd49FwT9dgka2F4YxZWToySK5Qp9KRku', 93, NULL, 'admin'),
(41, '6023SUMPAY', '$2y$10$AJCDBVfKGcFIRjSbBvvD..zsqL1.wJ6GX7/wsxW3xqAthi6TpR.Pq', 94, NULL, 'employee'),
(42, '4182BARES', '$2y$10$rsFRd2QbCsFjM1SGkEQYSOmhwzO2GN4yh5MMjXvo4zFwxLFlNNJ1e', 95, NULL, 'admin'),
(43, '1363ACERDANO', '$2y$10$oc3CQDLq8UCVuKzrzYqS3uWrTd4TvRz/Zc7KeBVUsZQbJD0z.mF7S', 96, NULL, 'admin'),
(44, '5076BAYLON', '$2y$10$p7vRLt3aaxpmf/lqrzMoYecYV.T288mZIaDTEoXj2vmwiwofg1TI2', 98, NULL, 'employee'),
(45, '7984BORRINAGA', '$2y$10$UXcmmRZopEdiDpy6WT4hQegGR7uUURYNNSirGtxrk8gAIG4pPIzQC', 100, NULL, 'employee'),
(46, '1562IBAY', '$2y$10$y0VCfbR/35aBtoc78RlSiuRCN1mKl8Wb1hfqcpgvXIF9yPJbgrUf.', 101, NULL, 'employee'),
(47, '6798CUNANAN', '$2y$10$Bns9ZipTWvKyJNJn9WmbRuAclKReq1F8893XVHuTVptLbbvhI.Kb.', 102, NULL, 'employee'),
(48, '8107LORENO', '$2y$10$bq4GIgHlAZmO/hau9pr0heKtOvhCSF7QV./5vXbdfM5pu5097JBLK', 103, NULL, 'employee'),
(49, '7607RAMOS', '$2y$10$z9s/WIXkY74SU34hZSE5t.APEVKjp1AEl22ECQIPVWAtq/uKWP6iK', 104, NULL, 'employee'),
(50, '8527FIECAS', '$2y$10$PKyx88j8mfSnt9ZKM6QwnObmJTvApkgVGwAHS0tVVuEtmGyCT0ik.', 105, NULL, 'employee'),
(51, '7548ALONZO', '$2y$10$huuQPmagaN/l5Q7U30mhleTqKy2z9jBtb3d98mhizqn8BBe7UtdZG', 106, NULL, 'employee'),
(52, '7284STA. MARIA', '$2y$10$wTQSjYbBEGhw6cLlSG0R5Ozu4mziCugtc/yzxxbp0IZFriTxGkM1e', 107, NULL, 'employee'),
(53, '5586EXAMPLE', '$2y$10$XPD52LvCFTSGXJaH19f4Vub5.oXodPh3hpz9govWl7/UPh.aF.QoS', 108, NULL, 'employee'),
(54, '7442CABATO', '$2y$10$NUz2pAyE2YdKD3lacbMzJul/M/5OuWOiWr9dyxwYUg4vYgPPlF.bi', 97, NULL, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(10) UNSIGNED NOT NULL,
  `g_ornumber` varchar(20) DEFAULT NULL,
  `guest_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `date_order` datetime NOT NULL DEFAULT current_timestamp(),
  `latest_order` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `g_ornumber`, `guest_name`, `qty`, `amount`, `date_order`, `latest_order`) VALUES
(27, NULL, 'asd asd', 0, 0, '2023-04-03 21:04:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `receipt_or` varchar(20) NOT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `payment` varchar(20) NOT NULL,
  `pay_amount` varchar(20) NOT NULL,
  `guest_name` varchar(50) DEFAULT NULL,
  `cus_name` varchar(50) DEFAULT NULL,
  `pay_change` varchar(20) NOT NULL DEFAULT '0',
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `pay_hist` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL DEFAULT 0,
  `receipt_or` varchar(20) NOT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `payment` varchar(20) NOT NULL,
  `pay_amount` varchar(20) NOT NULL,
  `guest_name` varchar(50) DEFAULT NULL,
  `cus_name` varchar(50) DEFAULT NULL,
  `pay_change` varchar(20) NOT NULL DEFAULT '0',
  `date_order` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productcode`, `productname`, `qty`, `price`, `size`, `photo`, `details`) VALUES
(1, '1', 'Asus Laptop', '0', 50, 'Large', 'asus.jfif', 'asdasdasdasdasdasdasdasdasdasdasdasda'),
(2, '2', 'MOBO', '12', 56, 'Medium', '02.jpg', 'asdasdasdasdasdasdasdasddasdasdasdasdasdasdasdasdasdadasdasdasdasdasdsadasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdadsasd'),
(3, '3', 'IPhone 12', '148', 23, 'Large', '03.jpg', ''),
(4, '4', 'Acer Laptop', '464', 23, 'Large', '04.jpg', ''),
(5, '5', 'Predator Laptop', '80', 26, 'Large', '05.jpg', ''),
(6, '6', 'Asus Monitor', '169', 53, 'Large', '06.jpg', ''),
(8, '7', 'Acer Laptop', '472', 45, 'Large', '07.jpg', ''),
(9, '8', 'Logitech Mouse', '230', 25, 'Large', '08.jpg', ''),
(10, '9', 'Logitech Headset', '511', 45, 'Large', '09.jpg', ''),
(11, '10', 'Logitech Keyboard', '173', 45, 'Large', '01.jpg', ''),
(13, '12', 'Sony Camera', '28', 38, 'Large', '03.jpg', ''),
(14, '13', 'Samsung Galaxy S', '12', 56, 'Large', '04.jpg', ''),
(15, '14', 'Samsung Galaxy Laptop', '6', 36, 'Large', '05.jpg', ''),
(16, '15', 'RGB Keyboard', '14', 45, 'Small', '06.jpg', ''),
(17, '16', 'Logitech Earphone', '475', 38, 'Large', '07.jpg', ''),
(18, '17', 'Logitech Mousepad', '22', 39, 'Medium', '08.jpg', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd'),
(20, '21', 'Sample', '59', 200, 'Large', '10.jpg', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `ornum` varchar(20) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `ornum` varchar(20) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_id_to` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `requestqty` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_log`
--

CREATE TABLE `request_log` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `productcode` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `requestqty` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `defect`
--
ALTER TABLE `defect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `defect_log`
--
ALTER TABLE `defect_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_login`
--
ALTER TABLE `employee_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `RFID_card` (`serial_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`pay_hist`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_log`
--
ALTER TABLE `request_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `defect`
--
ALTER TABLE `defect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=477;

--
-- AUTO_INCREMENT for table `defect_log`
--
ALTER TABLE `defect_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=523;

--
-- AUTO_INCREMENT for table `employee_login`
--
ALTER TABLE `employee_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `pay_hist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9223372036854775807;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=648;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `request_log`
--
ALTER TABLE `request_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=454;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
