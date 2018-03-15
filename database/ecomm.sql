-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2018 at 08:46 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.6.31-6+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` enum('en','he') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `parent_id` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `lang`, `parent_id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'en', 0, 'category1', 1, '2018-02-08 17:10:06', '0000-00-00 00:00:00'),
(3, 'en', 1, 'test1', 1, '2018-02-10 18:01:57', '2018-02-09 12:39:21'),
(4, 'en', 1, 'test2', 1, '2018-02-10 18:01:57', '2018-02-09 12:39:21'),
(5, 'en', 0, 'category2', 1, '2018-02-08 17:10:06', '0000-00-00 00:00:00'),
(6, 'en', 5, 'test3', 1, '2018-02-10 18:03:06', '2018-02-09 12:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `main_image` tinyint(4) NOT NULL COMMENT '1=>yes',
  `display_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `image`, `main_image`, `display_order`, `created_at`, `updated_at`) VALUES
(5, 1, 'uploads/CgwYFOjJpHpJ7xihNoap6pz9wokWBZ7vWv6g7wj7.jpeg', 1, 0, '2017-12-25 11:57:33', '2017-12-25 11:57:33'),
(6, 1, 'uploads/z6CK2d6PEy0VPqjSFZFaoPXdiVkgBlAxJGiaNZPL.jpeg', 0, 1, '2017-12-25 11:57:33', '2017-12-25 11:57:33'),
(7, 2, 'uploads/iBFoZowWjPGBpn60xEG71nrAgDobAbvhTLhq2FtL.jpeg', 1, 0, '2017-12-31 01:32:49', '2017-12-31 01:32:49'),
(8, 2, 'uploads/SHyLpwZg4LLiwVm7nO0SeAmv3Y7kXHaS7xZfuuXL.ico', 0, 1, '2017-12-31 01:32:49', '2017-12-31 01:32:49'),
(9, 2, 'uploads/Q16K4U8SB6qYYnKc1e737c1PV4jGP0nu2kbwnHJ0.png', 0, 2, '2017-12-31 01:32:49', '2017-12-31 01:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `project_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, 2, '2018-01-28 18:16:14', '2018-01-28 09:48:32'),
(2, 5, 2, 2, '2018-01-28 18:16:57', '2018-01-28 12:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` enum('en','he') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `encrypted` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `lang`, `encrypted`, `category_id`, `user_id`, `name`, `model_no`, `meta_title`, `meta_keyword`, `meta_description`, `short_description`, `description`, `sku`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'he', NULL, 2, NULL, 'היכן אפשר להשיג', 'היכן אפשר', NULL, 'שינויים בצורה זו או אחרת, על ידי השתלת הומור או מילים אקראיות שלא נראות אפילו מעט אמינות. אם אתה הולך להשתמש במקטעים של של Lorem Ipsum אתה צריך להיות בטוח שאין משהו מביך חבוי בתוך הטקסט.', 'שינויים בצורה זו או אחרת, על ידי השתלת הומור או מילים אקראיות שלא נראות אפילו מעט אמינות. אם אתה הולך להשתמש במקטעים של של Lorem Ipsum אתה צריך להיות בטוח שאין משהו מביך חבוי בתוך הטקסט.', 'השתלת הומור או מילים אקראיות שלא נראות אפילו מעט אמינות. אם אתה הולך להשתמש במקטעים של של Lorem Ipsum אתה צריך להיות בטוח שאין משהו מביך חבוי בתוך הטקסט.', 'שינויים בצורה זו או אחרת, על ידי השתלת הומור או מילים אקראיות שלא נראות אפילו מעט אמינות. אם אתה הולך להשתמש במקטעים של של Lorem Ipsum אתה צריך להיות בטוח שאין משהו מביך חבוי בתוך הטקסט. \r\n\r\nשינויים בצורה זו או אחרת, על ידי השתלת הומור או מילים אקראיות שלא נראות אפילו מעט אמינות. אם אתה הולך להשתמש במקטעים של של Lorem Ipsum אתה צריך להיות בטוח שאין משהו מביך חבוי בתוך הטקסט.', 'היכן אפשר', NULL, 1, '2017-12-25 11:43:02', '2017-12-25 11:43:02'),
(2, 'en', NULL, 1, NULL, 'product1', 'pro1', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'SKU1', NULL, 1, '2017-12-25 12:15:04', '2017-12-25 12:15:04'),
(3, 'en', NULL, 1, NULL, 'product2', '111', NULL, 'meta keyword', 'meta desc', 'short desc', 'desc', 'sku2', NULL, 1, '2018-02-17 03:08:37', '2018-02-17 03:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_project`
--

CREATE TABLE IF NOT EXISTS `product_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_project`
--

INSERT INTO `product_project` (`id`, `project_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2018-03-14 17:25:51', '0000-00-00 00:00:00'),
(2, 2, 2, '2017-12-31 07:17:23', '0000-00-00 00:00:00'),
(3, 3, 2, '2018-01-28 12:21:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_supplier`
--

CREATE TABLE IF NOT EXISTS `product_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_supplier`
--

INSERT INTO `product_supplier` (`id`, `product_id`, `supplier_id`, `price`, `is_default`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '200.00', 1, '2017-12-25 12:23:28', '2017-12-25 12:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` enum('en','he') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `lang`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'he', 'היכן אפשר להשיג', 'רו שינויים בצורה זו או אחרת, על ידי השתלת הומור או מילים אקראיות שלא נראות אפילו מעט אמינות. אם אתה הולך להשתמש במקטעים של של', 'uploads/wrVvcxLKJoP0fSQ3YTFsGVjvdo7ID53zUhSEnTG9.jpeg', 1, '2017-12-25 12:10:29', '2017-12-25 12:10:29'),
(2, 'en', 'project1', 'Description', 'uploads/kZOysy6Z7g6SXMLiR8QaDU3lLeGfNdIEK6iWvtWb.jpeg', 1, '2017-12-31 01:47:23', '2017-12-31 01:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE IF NOT EXISTS `project_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `created_at`) VALUES
(8, 2, 6, '2018-01-09 02:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` enum('en','he') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `lang`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'en', 'Supplier1', 1, '2017-12-25 11:33:18', '2017-12-25 11:33:18'),
(2, 'he', 'Supplier he1', 1, '2017-12-25 17:04:49', '2017-12-25 11:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `phone`, `fax`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@yopmail.com', '$2y$10$GQi7eJf8Khetr.x6Jt6VMeJnKyifTFNUQ6KjVlBHMx.1VJHxCivvK', 'oi6alFRrseRhgHyDxH7w7zEEov4yeruCD7lxL5L2xkwsPT13avf1rz5AFjvB', NULL, NULL, 1, '2017-10-08 13:58:04', '2017-10-08 13:58:04'),
(5, 0, 'prashant', 'prashant@yopmail.com', '$2y$10$kaMx8aARMPExVfn8mbtA0u2FuJTJFLssDzwj3tlFgy3Iws.SsW0M2', 'vXFBNFpmgUvsjGuT1yslBUVNKGFk1GKGwqQEcJs1NG1O2Opim0UMQZGGZ7jH', '1212121212', '9877689876', 1, '2017-12-15 15:15:54', '2018-01-11 11:25:14'),
(6, 0, 'prashant1', 'prashant1@yopmail.com', '$2y$10$PJCBufzLtX5VQTwMw0gCB.c5P2ZDqXLRBh0bopYF1Q01zpfQ/Zdcy', 'b2gCSNcBS8ez57lRbekd7BKwJGJoqH2uV8WTnlM6j4pmorzCxuaHRSrU6g8r', '1212121212', NULL, 1, '2017-12-15 15:15:54', '2017-12-15 15:15:54'),
(7, 0, 'prashant2', 'prashant2@yopmail.com', '$2y$10$PJCBufzLtX5VQTwMw0gCB.c5P2ZDqXLRBh0bopYF1Q01zpfQ/Zdcy', 'b2gCSNcBS8ez57lRbekd7BKwJGJoqH2uV8WTnlM6j4pmorzCxuaHRSrU6g8r', '1212121212', NULL, 1, '2017-12-15 15:15:54', '2017-12-15 15:15:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
