-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016 年 2 月 09 日 03:21
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`id`, `users_id`, `college_id`, `major_id`, `title`, `picture`, `description`, `price`, `created`, `modified`, `delete_flag`) VALUES
(21, 0, 0, 0, '政治学', 'date145451155024.jpg', 'まあまあ', 2000, '2016-02-03 23:59:13', '0000-00-00 00:00:00', 0),
(22, 0, 0, 0, '数学', 'date145451159017.jpg', 'よい', 0, '2016-02-03 23:59:52', '0000-00-00 00:00:00', 0),
(23, 0, 0, 0, '情報リテラシー', 'date145451163325.jpg', '汚れあり', 200, '2016-02-04 00:00:35', '0000-00-00 00:00:00', 0),
(24, 0, 0, 0, '技術経営', 'date145451166528.jpg', '醤油こぼした', 39999, '2016-02-04 00:01:07', '0000-00-00 00:00:00', 0),
(25, 0, 0, 0, '制御工学12', 'date145451170121.jpg', '数ページ紛失', 2900, '2016-02-04 00:01:43', '0000-00-00 00:00:00', 0),
(26, 0, 0, 0, '心理学', 'date145451174118.jpg', 'これでは相手の心理もわかりません', 4000, '2016-02-04 00:02:25', '0000-00-00 00:00:00', 0),
(27, 0, 0, 0, '日本史', 'date145451177315.jpg', '日本に詳しくなれます', 300, '2016-02-04 00:02:55', '0000-00-00 00:00:00', 0),
(28, 0, 0, 0, '簿記教科書', 'date145451181622.jpg', '簿記ができます', 20030, '2016-02-04 00:03:38', '0000-00-00 00:00:00', 0),
(29, 0, 0, 0, 'くるま', 'date145463589923.jpg', 'くるまについて詳しくなります', 3003, '2016-02-05 10:31:41', '0000-00-00 00:00:00', 0),
(30, 0, 0, 0, 'キャッスルピーク', 'date145491125311111.jpg', 'いいところでしたよ', 2000, '2016-02-08 15:00:58', '0000-00-00 00:00:00', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
