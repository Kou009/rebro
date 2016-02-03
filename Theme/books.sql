-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 2 月 03 日 03:19
-- サーバのバージョン： 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rebro`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`id`, `users_id`, `college_id`, `major_id`, `title`, `picture`, `description`, `price`, `created`, `modified`, `delete_flag`) VALUES
(11, 0, 0, 0, '柴崎コウ', 'date1453945201kou.jpg', 'いいよ', 2000, '2016-01-28 10:40:04', '0000-00-00 00:00:00', 0),
(12, 0, 0, 0, '榮倉奈々', 'date1453945336nana.jpeg', 'goood', 3000, '2016-01-28 10:42:18', '0000-00-00 00:00:00', 0),
(13, 0, 0, 0, '長澤まさみ', 'date1453945586masami.jpeg', 'awesome', 4000, '2016-01-28 10:46:28', '0000-00-00 00:00:00', 0),
(14, 0, 0, 0, '相武紗季', 'date1453951060saki.jpeg', 'great', 5000, '2016-01-28 12:17:42', '0000-00-00 00:00:00', 0),
(15, 0, 0, 0, 'kou', 'date1453951716IMG_0447.JPG', 'good', 100, '2016-01-28 12:28:39', '0000-00-00 00:00:00', 0),
(16, 0, 0, 0, 'kou2', 'date1453991997IMG_0566.JPG', 'good', 3000, '2016-01-28 23:40:01', '0000-00-00 00:00:00', 0),
(17, 0, 0, 0, 'kou3', 'date1453992174IMG_0642.JPG', 'iine', 5000, '2016-01-28 23:42:58', '0000-00-00 00:00:00', 0),
(18, 0, 0, 0, 'kou4', 'date1453992209IMG_0613.JPG', 'good', 500, '2016-01-28 23:43:32', '0000-00-00 00:00:00', 0),
(19, 0, 0, 0, 'kou5', 'date1453992589IMG_0352.JPG', 'kou', 100000, '2016-01-28 23:49:55', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
