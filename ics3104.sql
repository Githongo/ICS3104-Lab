-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 07:03 PM

-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ics3104`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_city` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_email`, `user_phone`, `user_city`) VALUES
(1, 'Jeffrey', 'Kingori', 'jeffrey@me.com', '0710111111', 'Nanyuki'),
(2, 'Michael', 'Scofield', 'michael@prisons.com', '0745656565', 'Illinois'),
(3, 'Theodore', 'Mosbey', 'ted@himym.com', '012345698', 'New York'),
(6, 'John', 'Marston', 'johnm@rdr2.com', '0712456545', 'Black Water'),
(8, 'Aurthur', 'Morgan', 'aurturm@rdr2.com', '0722256484', 'Strawberry'),
(10, 'Dutch', 'Linde', 'dutchv@rdr2.com', '0745858565', 'St. Denis'),
(11, 'Tilly', 'Jackson', 'tjackson@rdr2.game', '0745458545', 'Rhodes');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`

  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
