-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 14, 2016 at 11:34 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pBurge`
--

-- --------------------------------------------------------

--
-- Table structure for table `pb_uploads`
--

CREATE TABLE `pb_uploads` (
  `pic_id` int(2) NOT NULL,
  `username` varchar(256) NOT NULL,
  `image_full` varchar(256) NOT NULL,
  `image_resized` varchar(256) NOT NULL,
  `date_uploaded` varchar(256) NOT NULL,
  `time_uploaded` varchar(256) NOT NULL,
  `description` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pb_users`
--

CREATE TABLE `pb_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pb_uploads`
--
ALTER TABLE `pb_uploads`
  ADD PRIMARY KEY (`pic_id`);

--
-- Indexes for table `pb_users`
--
ALTER TABLE `pb_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pb_uploads`
--
ALTER TABLE `pb_uploads`
  MODIFY `pic_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pb_users`
--
ALTER TABLE `pb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
