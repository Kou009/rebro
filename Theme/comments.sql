-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 年 2 朁E03 日 03:10
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
-- テーブルの構造 `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`id`, `sender_id`, `reciever_id`, `book_id`, `message`, `created`, `modified`, `delete_flag`) VALUES
(1, 1, 0, 1, 'この本解体と思ってます～、4月までにもらえませんか？？', '2016-01-29 10:18:22', '2016-01-29 10:18:22', 0),
(2, 1, 0, 1, '解体じゃないや！買いたいです！！', '2016-01-29 10:19:27', '2016-01-29 10:19:27', 0),
(3, 2, 0, 1, 'この教科書は講義で必須ですか！なくてもなんとかなりますか？？', '2016-01-29 10:31:15', '2016-01-29 10:31:15', 0),
(4, 3, 0, 1, 'テストテストテスト２０１６', '2016-01-29 11:08:12', '2016-01-29 11:08:12', 0),
(5, 4, 0, 1, 'OUR FINANL EXAM WILL COME SOON OMG', '2016-01-30 11:00:32', '2016-01-30 11:00:43', 0),
(6, 1, 0, 1, 'ジャガイモじゃがいもぽてとぽてと', '2016-01-30 13:59:41', '0000-00-00 00:00:00', 0),
(7, 1, 0, 1, 'こんいちはすまほかえたい					                ', '2016-01-30 19:24:17', '0000-00-00 00:00:00', 0),
(8, 1, 0, 1, 'INSERTに成功した＼(^o^)／＼(^o^)／					                ', '2016-01-30 19:25:03', '0000-00-00 00:00:00', 0),
(9, 2, 0, 1, 'カーソル？の位置直したい、、、、文章の頭の方で固定にするにはどうせすればいいのか、、HTMLで治るのか					                ', '2016-01-30 19:30:03', '0000-00-00 00:00:00', 0),
(10, 2, 0, 1, '眠い～～～～眠眠打破～～～～～～～～					                ', '2016-01-31 00:39:55', '0000-00-00 00:00:00', 0),
(11, 2, 0, 2, 'どの程度の落書きでしょうか？？？？？					                ', '2016-01-31 22:51:54', '0000-00-00 00:00:00', 0),
(12, 4, 0, 2, '非常に欲しいです！！					                ', '2016-01-31 22:57:24', '0000-00-00 00:00:00', 0),
(13, 1, 1, 2, '追記：あと10年はこの教科書が採用されるそうです。				                ', '2016-01-31 23:18:10', '0000-00-00 00:00:00', 0),
(14, 1, 0, 1, '					                ', '2016-02-02 08:29:47', '0000-00-00 00:00:00', 0),
(15, 1, 0, 1, '					                ', '2016-02-02 08:44:18', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
