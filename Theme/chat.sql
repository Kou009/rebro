-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 年 2 朁E09 日 03:17
-- サーバのバージョン： 10.1.8-MariaDB
-- PHP Version: 5.6.14

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
-- テーブルの構造 `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `sell_flag` tinyint(1) NOT NULL,
  `book_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `reciever_id`, `sell_flag`, `book_id`, `message`, `created`, `modified`, `delete_flag`) VALUES
(1, 1, 3, 0, 1, 'がんばれひろし', '2016-02-02 11:11:34', '2016-02-02 11:11:35', 0),
(2, 1, 3, 1, 1, '1000円で売ります＼(^o^)／', '2016-02-02 11:14:02', '2016-02-02 11:14:05', 0),
(3, 1, 3, 0, 1, 'ほんとですか！？ありがたいっす＼(^o^)／', '2016-02-02 11:17:02', '2016-02-02 11:17:04', 0),
(4, 1, 3, 1, 1, 'いえいえ、どういたしまして＼(^o^)／明日学校いますか？？', '2016-02-02 11:19:09', '2016-02-02 11:19:10', 0),
(5, 4, 0, 0, 2, 'HELLO WORLD!!', '2016-02-03 11:49:23', '2016-02-03 11:49:24', 0),
(6, 1, 3, 0, 1, 'いますー！(^o^)／', '2016-02-03 20:33:23', '2016-02-03 20:33:25', 0),
(7, 1, 3, 0, 1, '		やっはーーーーーーーーー！！！！\r\n		                        ', '2016-02-04 11:49:32', '0000-00-00 00:00:00', 0),
(8, 1, 3, 1, 1, '何限からいますかーーーーー？？？ちなみに私は二限からいます～～～～～                   ', '2016-02-04 11:51:41', '0000-00-00 00:00:00', 0),
(9, 1, 3, 1, 1, '図書館の前で待ち合わせしましょうYO！				                        ', '2016-02-04 11:53:16', '0000-00-00 00:00:00', 0),
(10, 1, 3, 1, 1, '図書館の前で待ち合わせしましょうYO！				                        ', '2016-02-04 11:53:25', '0000-00-00 00:00:00', 0),
(11, 1, 3, 0, 1, 'かしこまりっ！！！私も二限からいるので昼休みに図書館前でどうでしょうか～～？？				                        ', '2016-02-04 18:47:53', '0000-00-00 00:00:00', 0),
(12, 2, 3, 0, 1, 'よこさわです～～～～～もう教科書は売れてしまいましたか～～？', '2016-02-05 11:18:22', '2016-02-05 11:18:25', 0),
(13, 2, 3, 1, 1, '売れちゃいました～、しかし、少し古いのですが別の先輩からもらったものもありますよ', '2016-02-05 11:21:33', '2016-02-05 11:21:35', 0),
(14, 3, 1, 0, 1, '', '2016-02-08 19:20:35', '0000-00-00 00:00:00', 0),
(15, 3, 1, 0, 1, '', '2016-02-08 19:21:57', '0000-00-00 00:00:00', 0),
(16, 3, 1, 0, 1, '', '2016-02-08 19:22:17', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
