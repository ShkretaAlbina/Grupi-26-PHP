-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 11:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apple`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

create database apple;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `modified`) VALUES
(13, 'Laptops', '2020-05-17 23:18:54', '2020-05-17 21:18:54'),
(9, 'Iphone', '2020-05-15 02:42:43', '2020-05-15 00:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `image`, `created`, `modified`) VALUES
(67, 'MacBook Pro', 'MacBook Pro — our most powerful notebooks featuring fast processors, incredible graphics, Touch Bar.', 1200, 9, 'aef022c4fddc9a676d371acdc0cf9ec41f4c46d7-mbp16touch-space-select-201911.jpg', '2020-05-17 23:22:25', '2020-05-17 21:22:25'),
(63, 'Iphone 11', 'Meet iPhone 11. All-new dual-camera system with Ultra Wide and Night mode. All-day battery. Six new colors. And the A13 Bionic, our fastest chip eve', 1200, 9, '51e8764a6e9887a29ecd879d7bf29ebe5b4caad0-iphone-11-pro-select-2019-family.jpg', '2020-05-17 23:12:05', '2020-05-17 21:12:05'),
(64, 'Iphone 10', 'Explore iPhone, the world\'s most powerful personal device. Check out iPhone 11 Pro, iPhone 11 Pro Max, iPhone 11, iPhone SE, and iPhone XR', 800, 9, '9ce070e7b96ce9147b8a41d83176b5f0f7be9fb0-MRWM2_AV1_GOLD_GEO_CA.jpg', '2020-05-17 23:14:42', '2020-05-17 21:14:42'),
(65, 'Iphone 8', 'Apple iPhone 8 smartphone. Announced Sep 2017. Features 4.7? Retina IPS LCD display.', 600, 9, 'd1b04a3fcefaefc453a8ca7c9acdf0fe1b618ee9-refurb-iphone8-silver.jpg', '2020-05-17 23:17:13', '2020-05-17 21:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
