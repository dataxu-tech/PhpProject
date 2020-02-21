-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 02:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sepodo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `valid_from_date` int(10) UNSIGNED NOT NULL,
  `valid_to_date` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-enabled, 0-disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT 'default.jpg',
  `visibility` int(1) NOT NULL,
  `category` varchar(128) NOT NULL,
  `description` varchar(225) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL,
  `old_price` varchar(100) NOT NULL,
  `free_delivery` varchar(200) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `in_slider` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `visibility`, `category`, `description`, `quantity`, `price`, `old_price`, `free_delivery`, `weight`, `in_slider`) VALUES
(1, 'telkomsel', 'default.jpg', 1, 'voucher', 'satu', '12', '3000', '6000', 'tulungagung (pakel,bandung) trenggalek (durenan)', '10', 1),
(2, 'simpati', 'default.jpg', 1, 'voucher', 'satu', '12', '3000', '6000', NULL, '', 1),
(3, 'telkomsel 8gb', '5954253d505511a4614edad05c75a9cc.jpg', 1, 'voucher', 'satu', '12', '52000', '60000', NULL, '', 0),
(4, 'indosat mini 1', '5eb3ef295d63e6b44181af3d464cbfab.jpg', 1, 'voucher', 'satu', '15', '21000', '25000', NULL, '', 0),
(5, 'simpati 1,5 gb', 'cabe2c3c2a3e4c80c4ddb446af500c37.jpg', 1, 'voucher', 'satu', '12', '21000', '25000', 'tulungagung (pakel,campurdarat,bandung) trenggalek(durenan)', '', 0),
(6, 'indosat mini 1', '21e205a35d5db92701441740574d5a34.jpg', 1, 'voucher', 'satu', '12', '52000', '60000', NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `image`) VALUES
(1, 'special offer', 'special offer.jpg'),
(2, 'mega sale', 'mega sale.jpg'),
(3, 'alur', 'alur.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(5) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `birth` int(3) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `subdistrict` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `sex`, `birth`, `country`, `province`, `city`, `subdistrict`) VALUES
(4, 'habib', 'habib@gmail.com', 'default.jpg', '$2y$10$TmYQSy3pJuRja7BC7gMrMemy3yL6VfkrOnM9cvmy6r0RTeeLg/bsm', 1, 1, 1561932743, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'isna', 'isna@gmail.com', 'default.jpg', '$2y$10$fYr7vK0Fs5h6GorFpNX1JOxnpV8D1WIq8RBnznmf5ArH2uC6rdXVq', 2, 1, 1562208665, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'isnatul', 'isnatul@gmail.com', 'default.jpg', '$2y$10$KCdlP8140n6IYvmLKaxqLOYFLkK13Peqs8tar0RyzzfpHWSeG7TSC', 2, 1, 1562236230, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'pelanggan1', 'pelanggan1@gmail.com', 'default.jpg', '$2y$10$B5KF91v8mmFKZoNYqhqxnOmWH7YHyRYjw6cbo6EEgkrix49AijF3i', 3, 1, 1564787912, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 4),
(6, 1, 5),
(7, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin utama'),
(2, 'user role'),
(3, 'Menu Management'),
(4, 'Transaksi'),
(5, 'Produk');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin utama'),
(2, 'admin'),
(3, 'star_member'),
(4, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'userAccess/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Menu Utama', 'adminMenu/index', 'far fa-fw fa-folder', 1),
(3, 3, 'Sub Menu', 'adminSubMenu/index', 'far fa-fw fa-folder-open', 1),
(4, 4, 'Pesanan', 'useraccess/admin', 'fas fa-fw fa-shopping-cart', 1),
(5, 2, 'User Role', 'adminSetUser/index', 'fas fa-fw fa-user-edit', 1),
(6, 5, 'Produk', 'adminProduct/index', 'fas fa-fw fa-box-open', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
