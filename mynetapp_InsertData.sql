-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 04:19 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mynetapp`
--

USE `mynetapp`;

-- --------------------------------------------------------
--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idu`, `username`, `password`, `firstname`, `lastname`, `gender`, `tel`) VALUES
(1, 'admin', 'password', 'ADMIN', 'ADMIN', '1', '0000000000'),
(2, 'test', '1234', 'tester', 'test', '2', '1234567890'),
(3, 'Noname', '123456', '<b><u><i>NoName</i></u></b>', '<b><u><i>SineWY</i></u></b>', '1', '191');

-- --------------------------------------------------------
--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id_top`, `topicname`, `idu`, `datetimes`) VALUES
(1, 'หลักการเศรษฐกิจพอเพียง', 1, '2017-04-27 16:43:56'),
(2, 'บันทึกความดี', 3, '2017-04-28 03:43:12');

-- --------------------------------------------------------
--
-- Dumping data for table `topcontent`
--

INSERT INTO `topcontent` (`id_con`, `id_top`, `content`, `idu`) VALUES
(1, 1, 'test', 1),
(2, 2, 'test', 3);

-- --------------------------------------------------------
--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_com`, `id_con`, `idu`, `comments`, `date_publish`) VALUES
(1, 1, 3, 'ดีมากเลยครับ', DEFAULT),
(2, 2, 1, 'เย็นนี้ทำอาหารจากผักหลังบ้าน', DEFAULT),
(3, 2, 2, 'แบ่งเงินส่วนใช้ และ ส่วนออม', DEFAULT);

-- --------------------------------------------------------