-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2025 at 10:31 AM
-- Server version: 11.5.2-MariaDB
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `title`, `content`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'Test blog', 'test des', 'blogs/HEe0g34hxe6eRp0e7bIAXw3aF8iaUS51cFzSeMKO.jpg', 1, '2025-09-26 04:49:16', '2025-09-26 05:12:31'),
(3, 2, 'test blog', 'test', 'blogs/6Y6amYd7cQIbsqRSH8BpGvLGe7DsvwuTZLyLDNZw.jpg', 2, '2025-09-26 05:13:22', '2025-09-26 05:15:54'),
(4, 2, 'test two', 'test two', 'blogs/u2Y9yeGPQHTlHem051hjemT2s2sIwv8DswVmOfrl.jpg', 1, '2025-09-26 05:15:15', '2025-09-26 05:54:56'),
(5, 2, 'test 3', 'test', 'blogs/EPqEdr1EpzstMBxU9x31AF0Xz2lRRwvspv3VmNEO.jpg', 1, '2025-09-26 05:19:11', '2025-09-26 05:55:03'),
(6, 3, 'test blog user', 'test blog user', 'blogs/AalJH4xzRTbIgs3KVA7Po8BLFFo8NwZL1qeSP6TT.jpg', 1, '2025-09-26 06:07:37', '2025-09-26 06:08:54'),
(7, 5, 'John blg', 'Test content', 'blogs/DVd9sPJdCmHCTOyCVBhPxssiqSJSJ1Y68ZoQkZdO.jpg', 1, '2025-09-26 06:13:19', '2025-09-26 06:23:50'),
(8, 2, 'Test blog', 'Test content', 'blogs/jie1LfDhCkbOxs6bMIeZ11r3GdgJG9MoJ4tcvk0O.jpg', 1, '2025-09-26 06:24:44', '2025-09-26 06:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@blogs.com', '$2y$12$b91XSu/mcNnpld1UMsGgH.h.3noQ/MOnRcxKe6kAiQDQTvl/QJPY6', 'admin', '2025-09-26 02:39:15', '2025-09-26 02:39:15'),
(2, 'Geethu', 'geethu@blogs.com', '$2y$12$JtmNizcz64pKSGHEOLdI4e.zGxv9AJ8vxugO/rvfDHmIPW.zPBm76', 'user', '2025-09-26 02:39:15', '2025-09-26 02:39:15'),
(3, 'test', 'test@blogs.com', '$2y$12$31f5Fv/jyT8N7KZ7T8YDQujevG.M8ufeq9Iqe7lkyuIgZZ1NplGIO', 'user', '2025-09-26 06:04:12', '2025-09-26 06:04:12'),
(5, 'john', 'johnt@blogs.com', '$2y$12$uityW2QHgFZ1xfAP.YZRx.oERQ0uskMg051A4cSKBk5lE/yDM8Kjy', 'user', '2025-09-26 06:11:48', '2025-09-26 06:11:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
