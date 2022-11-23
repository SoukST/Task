-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 09:44 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registeration_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theory`
--

CREATE TABLE `tbl_theory` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_tel` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_theory`
--

INSERT INTO `tbl_theory` (`user_id`, `first_name`, `last_name`, `username`, `user_password`, `user_tel`, `user_email`) VALUES
(1, 'Souksavanh', 'CHANPHENGXAY', 'test', '12345', '02091176324', 'souksavanh07@hotmail.com'),
(2, 'Souksavanh', 'CHANPHENGXAY', 'test', '12345', '02091176324', 'souksavanh07@hotmail.com'),
(3, 'Souksavanh', 'CHANPHENGXAY', 'test', '12345', '02091176324', 'souksavanh07@hotmail.com'),
(4, 'Souksavanh', 'CHANPHENGXAY', 'test', '12345', '02091176324', 'souksavanh07@hotmail.com'),
(5, 'Souksavanh', 'CHANPHENGXAY', 'test', '12345', '02091176324', 'souksavanh07@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `urole`, `created_at`) VALUES
(1, 'souksavanh', 'chanphengxay', 'souksavanh@test.com', '$2y$10$Dq4lNG2VvUV1LI6iWxyfLeVasVo/Ztlk/EPosBaJAigEWGGkpCOYG', 'user', '2022-05-24 04:53:25'),
(2, 'soukst', 'dev', 'soukst_dev@test.com', '$2y$10$MAAagP.GYZamI3sdWLFGPeKEkjJzR6Ug8SK2W2Ref57THHUyyy5Ia', 'admin', '2022-05-24 05:17:49'),
(3, 'soukky', 'yaky', 'soukky@test1.com', '$2y$10$kWIYzlKx37az5kzCHc5gkeW2Y4s2.V/hdhMc75YiwKtNpBhU/AeUu', 'user', '2022-05-25 09:15:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_theory`
--
ALTER TABLE `tbl_theory`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_theory`
--
ALTER TABLE `tbl_theory`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
