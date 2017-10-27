-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 09:23 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_lr`
--

-- --------------------------------------------------------

--
-- Table structure for table `p_tbl`
--

CREATE TABLE `p_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_tbl`
--

INSERT INTO `p_tbl` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Arif Sarker', 'arif', 'arif@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Musa Hossain', 'musa', 'musa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Taslima Akter', 'taslima', 'taslima@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'Mahabub Hossain', 'mahabub', 'mahabub@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'Shadat Hossain', 'shadat', 'shadat@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_tbl`
--
ALTER TABLE `p_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_tbl`
--
ALTER TABLE `p_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
