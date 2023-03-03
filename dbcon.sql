-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 07:44 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` int(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลพนักงาน';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `lname`, `phone`, `email`, `pass`) VALUES
(1, 'Sutalak', 'Sunakorn', 940000000, 's@gmail.com', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `con`
--

CREATE TABLE `con` (
  `id_con` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `saleday` date NOT NULL,
  `showday` date NOT NULL,
  `showtime` time NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `con`
--

INSERT INTO `con` (`id_con`, `name`, `location`, `saleday`, `showday`, `showtime`, `description`, `img`, `id_admin`, `status`) VALUES
(18, 'ConcertAA', 'Fusce eleifend felis eu dolor eleifend luctus. Morbi luctus hendrerit eleifend. In hac habitasse platea dictumst. Morbi imperdiet purus eget velit placerat laoreet. Suspendisse potenti.', '2022-11-01', '2022-11-15', '18:30:00', 'Curabitur facilisis, purus accumsan hendrerit aliquam, augue purus facilisis sem, vitae suscipit purus risus et libero. Proin pharetra auctor velit, non suscipit odio ullamcorper ac. Aliquam et feugiat tellus. Nullam elit metus, auctor et nisi nec, ornare', 'Dollarphotoclub_49335675-700x539.jpg', 1, '1'),
(20, 'ConcertG', 'Fusce eleifend felis eu dolor eleifend luctus. Morbi luctus hendrerit eleifend. In hac habitasse platea dictumst. Morbi imperdiet purus eget velit placerat laoreet. Suspendisse potenti.', '2022-11-03', '2022-11-23', '13:50:00', 'Duis at risus gravida, feugiat tellus ac, faucibus ante. Suspendisse potenti. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras placerat sapien quam, id vehicula diam pretium a. Aenean dapibus felis vulputa', 'austin-neill-247047-unsplash.jpg', 1, '1'),
(21, 'ConcertH', 'ipsum dolor sit amet, consectetur adipiscing elit', '2022-11-05', '2022-11-15', '20:30:00', 'Curabitur facilisis, purus accumsan hendrerit aliquam, augue purus facilisis sem, vitae suscipit purus risus et libero. Proin pharetra auctor velit, non suscipit odio ullamcorper ac. Aliquam et feugiat tellus. Nullam elit metus, auctor et nisi nec, ornare', 'green.jpg', 1, '1'),
(22, 'ConcertB', 'ipsum dolor sit amet, consectetur adipiscing elit', '2022-10-01', '2022-10-30', '13:00:00', 'Curabitur facilisis, purus accumsan hendrerit aliquam, augue purus facilisis sem, vitae suscipit purus risus et libero. Proin pharetra auctor velit, non suscipit odio ullamcorper ac. Aliquam et feugiat tellus. Nullam elit metus, auctor et nisi nec, ornare', '1200x0.jpg', 1, '0'),
(25, 'ConcertD', 'Fusce eleifend felis eu dolor eleifend luctus. Morbi luctus hendrerit eleifend. In hac habitasse platea dictumst. Morbi imperdiet purus eget velit placerat laoreet. Suspendisse potenti.', '2022-11-10', '2022-11-20', '19:50:00', 'Curabitur facilisis, purus accumsan hendrerit aliquam, augue purus facilisis sem, vitae suscipit purus risus et libero. Proin pharetra auctor velit, non suscipit odio ullamcorper ac. Aliquam et feugiat tellus. Nullam elit metus, auctor et nisi nec, ornare', 'aditya-chinchure-494048-unsplash.jpg', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id_tickets` int(10) NOT NULL,
  `id_con` int(11) NOT NULL,
  `payday` date NOT NULL,
  `zone` enum('1','2','3','4') NOT NULL,
  `seat` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `price` int(7) NOT NULL,
  `reserve` enum('0','1') NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางตั๋วคอน';

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id_tickets`, `id_con`, `payday`, `zone`, `seat`, `price`, `reserve`, `id_user`, `id_admin`) VALUES
(35, 18, '2022-11-04', '1', '1', 100, '1', 5, 1),
(36, 18, '2022-11-01', '1', '2', 100, '1', 1, 1),
(37, 18, '0000-00-00', '2', '1', 200, '0', 0, 1),
(38, 18, '0000-00-00', '2', '2', 200, '0', 0, 1),
(39, 20, '2022-11-01', '1', '1', 100, '1', 1, 1),
(40, 20, '0000-00-00', '2', '1', 200, '0', 0, 1),
(42, 22, '0000-00-00', '1', '1', 100, '0', 0, 1),
(49, 22, '0000-00-00', '1', '1', 200, '0', 0, 1),
(53, 21, '0000-00-00', '2', '1', 100, '0', 0, 1),
(54, 22, '0000-00-00', '2', '1', 200, '0', 0, 1),
(55, 22, '0000-00-00', '2', '1', 200, '0', 0, 1),
(56, 0, '0000-00-00', '2', '2', 200, '0', 0, 1),
(57, 21, '2022-11-03', '2', '2', 200, '1', 4, 1),
(59, 21, '0000-00-00', '1', '1', 100, '0', 0, 1),
(62, 18, '0000-00-00', '3', '1', 200, '0', 0, 1),
(64, 18, '0000-00-00', '1', '3', 100, '0', 0, 1),
(65, 18, '0000-00-00', '1', '4', 100, '0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `id_card` int(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข้อมูลลูกค้า';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `lname`, `sex`, `birthday`, `address`, `phone`, `id_card`, `email`, `pass`) VALUES
(1, 'Suteera', 'Sunakorn', 'female', '2013-02-13', 'asdfgh', 800000000, 1234567890, 'suteera@gmail.com', 1234),
(4, 'สิรมน', 'งามขำ', 'female', '2022-11-22', 'ferfwer', 969478381, 39423, 'siramnn@gmail.com', 2545),
(5, 'suteera', 'sunakorn', 'female', '2022-11-05', 'ergrtthyjuk8hj5', 940000000, 2147483647, 'g@gmail.com', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `con`
--
ALTER TABLE `con`
  ADD PRIMARY KEY (`id_con`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_tickets`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `con`
--
ALTER TABLE `con`
  MODIFY `id_con` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_tickets` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
