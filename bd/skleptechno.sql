-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2021 at 09:20 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skleptechno`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login`, `name`, `pass`) VALUES
(1, 'Iliya', 'Iliya', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=2730 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Acer'),
(4, 'Lenovo'),
(5, 'Asus'),
(6, 'Gigabyte'),
(7, 'Nokia');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=5461 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Ноутбуки'),
(2, 'Смартфоны'),
(3, 'Видеокарты'),
(4, 'Телефоны');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `dt_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AVG_ROW_LENGTH=2730 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `dt_added`) VALUES
(7, 'Anton Barysevich', 'huebasos@gmail.com', '514934551', '2021-12-16 15:59:42'),
(8, 'Iliya', '4epel@gmail.com', '555111333', '2021-12-17 00:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `order_id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `good` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=3276 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`order_id`, `good_id`, `good`, `price`, `count`) VALUES
(7, 1, 'Ноутбук Lenovo', 18000, 1),
(7, 2, 'Фотокамера Nikon', 25000, 1),
(8, 9, 'Смартфон Asus Zenfone Laser', 12000, 1),
(8, 10, 'Смартфон Lenovo A5000', 11000, 1),
(8, 13, 'Видеокарта GIGABYTE GT-740', 6000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `good` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `price` int(11) UNSIGNED NOT NULL,
  `rating` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1170 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `good`, `category_id`, `brand_id`, `price`, `rating`, `photo`) VALUES
(2, 'Ноутбук Apple MacBook Pro', 1, 1, 7000, 9, 'apple_macbook_pro.jpg'),
(3, 'Ноутбук Lenovo IdeaPad', 1, 4, 1700, 5, 'lenovo_idea_pad.jpg'),
(4, 'Ноутбук Lenovo G5030', 1, 4, 1600, 7, 'lenovo_g5030.jpg'),
(5, 'Ноутбук Acer Aspire', 1, 3, 2100, 8, 'acer_aspire.jpg'),
(6, 'Смартфон Samsung Galaxy A7', 2, 2, 3000, 9, 'samsung_galaxy_a7.jpg'),
(7, 'Смартфон Samsung Galaxy A5', 2, 2, 1700, 8, 'samsung_galaxy_a5.jpg'),
(8, 'Смартфон Apple iPhone SE', 2, 1, 3800, 10, 'apple_iphone_se.jpg'),
(9, 'Смартфон Asus Zenfone Laser', 2, 5, 1200, 6, 'asus_zenfone_laser.jpg'),
(10, 'Смартфон Lenovo A5000', 2, 4, 11000, 3, 'lenovo_a5000.jpg'),
(11, 'Смартфон Lenovo P90', 2, 4, 1600, 5, 'lenovo_p90.jpg'),
(12, 'Видеокарта ASUS', 3, 5, 2000, 8, 'asus_video.jpg'),
(13, 'Видеокарта GIGABYTE GT-740', 3, 6, 6000, 9, 'gigabyte_video_gt740.jpg'),
(14, 'Видеокарта GIGABYTE GTX-960', 3, 6, 1400, 10, 'gigabyte_video_gtx960.jpg'),
(18, 'Ноутбук Apple MacBook Pro mini', 1, 1, 1, 2, 'apple_macbook_air.jpg'),
(19, 'Ноутбук Apple MacBook Pro mini', 1, 1, 12000, 1, 'apple_macbook_air.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `goods_props`
--

CREATE TABLE `goods_props` (
  `id` int(10) UNSIGNED NOT NULL,
  `good_id` int(10) UNSIGNED NOT NULL,
  `prop` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1170 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods_props`
--

INSERT INTO `goods_props` (`id`, `good_id`, `prop`, `value`) VALUES
(1, 1, 'Процессор', 'Intel Core i5'),
(2, 1, 'Объем памяти', '4 Гб'),
(3, 1, 'Размер экрана', '13 дюймов'),
(4, 2, 'Процессор', 'Intel Core i7'),
(6, 2, 'Размер экрана', '13 дюймов'),
(7, 3, 'Размер экрана', '14 дюймов'),
(8, 4, 'Процессор', 'Intel Pentium 4'),
(9, 5, 'Процессор', 'Intel Core i7'),
(10, 5, 'Наличие wi-fi', 'да'),
(11, 6, 'Диагональ экрана', '5 дюймов'),
(12, 6, 'GPS', 'да'),
(13, 7, 'Диагональ экрана', '4 дюйма'),
(14, 7, 'GPS', 'нет'),
(15, 8, 'Диагональ экрана', '4 дюйма');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `dt_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AVG_ROW_LENGTH=2730 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `address`, `message`, `dt_added`) VALUES
(7, 7, 'Sidorska\r\n105', 'sadasd', '2021-12-16 15:59:42'),
(8, 8, 'Sidorska\r\n105', 'DO 7 stycznia', '2021-12-17 00:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `pass`) VALUES
(1, '4epel', 'Iliya', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`order_id`,`good_id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_goods_brands_id` (`brand_id`),
  ADD KEY `FK_goods_categories_id` (`category_id`);

--
-- Indexes for table `goods_props`
--
ALTER TABLE `goods_props`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `goods_props`
--
ALTER TABLE `goods_props`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `FK_goods_brands_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_goods_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
