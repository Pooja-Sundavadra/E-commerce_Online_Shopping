-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2026 at 08:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `star_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_icon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `category_icon`, `created_at`) VALUES
(1, 'Fashion', 'bi bi-bag-heart-fill', '2026-06-06 06:09:56'),
(2, 'Education', 'bi bi-journal-bookmark-fill', '2026-06-06 06:09:56'),
(3, 'Daily Essentials', 'bi bi-house-fill', '2026-06-06 06:09:56'),
(4, 'Electronics', 'bi bi-phone-fill', '2026-06-06 06:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `category_id`, `name`, `price`, `description`, `image`, `stock`, `created_at`) VALUES
(1, 1, 'Princess Bracelet', '999.00', 'Beautiful Bracelet ', 'images/bracelet.jpg', 629, '2026-06-06 06:14:19'),
(2, 1, 'Hair Pin', '589.00', 'Enhance your hairstyle with this elegant and durable hair pin', 'images/hairpin.jpg', 50, '2026-06-06 06:14:19'),
(3, 1, 'Luxury Jacket', '3499.00', 'Premium luxury jacket for stylish look', 'images/g.jpg', 16, '2026-06-06 06:14:19'),
(4, 1, 'Sunglasses', '1999.00', 'Stylish protection for sunny days ', 'images/sung.jpg', 20, '2026-06-06 06:14:19'),
(5, 1, 'Teddy Bear', '800.00', 'Soft and cute', 'images/teddy.jpg', 4, '2026-06-06 06:14:19'),
(6, 1, 'Premium Handbag', '4999.00', 'Style and functionality in one', 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa', 3, '2026-06-06 06:14:19'),
(7, 2, 'Compass Box', '350.00', 'complete geometry box for students', 'images/compass.jpg', 90, '2026-06-06 06:14:19'),
(8, 2, 'English Convorsation', '1999.00', 'Perfect book for english learner', 'images/book.jpg', 45, '2026-06-06 06:14:19'),
(9, 2, 'Water Bottle', '199.00', 'Good quality reusable water bottle', 'images/bottle.jpg', 207, '2026-06-06 06:14:19'),
(10, 3, 'Potato', '25.00', 'Farm fresh quality you can trust', 'images/potatos.jpg', 90, '2026-06-06 06:14:19'),
(11, 3, 'Travel Bag', '3299.00', 'Perfect companion for every journey', 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62', 60, '2026-06-06 06:14:19'),
(12, 3, 'Glucose', '199.00', 'Instant energy for active day', 'images/glu.jpg', 56, '2026-06-06 06:14:19'),
(13, 3, 'Soap', '150.00', 'Soft , smmoth and refreshed skin', 'images/soap.jpg', 56, '2026-06-06 06:14:19'),
(14, 3, 'Sugar', '50.00', 'Pure sweetnes for every receipe', 'images/sugar.jpg', 207, '2026-06-06 06:14:19'),
(15, 4, 'Wireless Headphones', '5499.00', 'Crystal clear audio all day', 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e', 7, '2026-06-06 06:14:19'),
(16, 4, 'Luxury Smartwatch', '12999.00', 'Smart features with timesless style', 'https://images.unsplash.com/photo-1546868871-7041f2a55e12', 34, '2026-06-06 06:14:19'),
(17, 4, 'Smart Phone', '49999.00', 'Powerful performance in your hands', 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9', 119, '2026-06-06 06:14:19'),
(18, 4, 'Coldest', '5499.00', 'Stay cool with powerful airflow', 'images/fan.png', 119, '2026-06-06 06:14:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
