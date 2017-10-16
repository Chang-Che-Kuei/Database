-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2017-06-26 17:49:23
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shopping`
--

-- --------------------------------------------------------

--
-- 資料表結構 `board`
--

CREATE TABLE `board` (
  `board_id` int(11) NOT NULL,
  `board_title` varchar(50) NOT NULL,
  `board_name` varchar(20) NOT NULL,
  `board_pic` varchar(20) DEFAULT NULL,
  `board_email` varchar(50) DEFAULT NULL,
  `board_content` text NOT NULL,
  `board_date` datetime DEFAULT NULL,
  `board_re` text,
  `board_redate` datetime DEFAULT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `board`
--

INSERT INTO `board` (`board_id`, `board_title`, `board_name`, `board_pic`, `board_email`, `board_content`, `board_date`, `board_re`, `board_redate`, `pid`) VALUES
(25, '奶油施暴診好可愛', '王曉明', 'fface1.gif', 'ac0929a', '想要一個!!!!!!!!!!!!!!!!!', '2017-06-25 22:55:55', 'ppp', '2017-06-26 20:26:24', 1),
(26, 'yeeeeeeeeeeeeeeeeeee', '王曉明', 'fface1.gif', 'ac0929a', '好想睡覺喔喔喔喔喔喔喔喔喔喔喔', '2017-06-25 22:56:37', '稅阿稅阿', '2017-06-26 19:44:53', 1),
(47, 'phpgoood', '林暉恩', 'fface3.gif', 'ab0929a@yahoo.com.tw', '好好玩喔\n\n', '2017-06-26 00:03:27', '不錯喔\r\n', '2017-06-26 19:56:45', 1),
(48, '森氣氣', '林暉恩', 'fface1.gif', 'ab0929a@yahoo.com.tw', '森氣氣\n', '2017-06-26 00:04:12', '', '0000-00-00 00:00:00', 3),
(49, '我期待', '林暉恩', 'fface4.gif', 'ab0929a@yahoo.com.tw', '我的未來不是夢', '2017-06-26 00:05:02', '我認真地過每分鐘', '2017-06-26 19:42:10', 7),
(50, '藍受香菇', '林暉恩', 'fface4.gif', 'ab0929a@yahoo.com.tw', 'qqqqqqqqqqqqqqqqqqqqqqqqqqq', '2017-06-26 00:19:29', '', '0000-00-00 00:00:00', 6),
(51, '我要成為海賊王', 'zxc', 'fface2.gif', 'zxc', '我要成為海賊王!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', '2017-06-26 00:46:19', '', '0000-00-00 00:00:00', 5),
(52, '長的好奇怪', '林暉恩', 'fface3.gif', 'ab0929a@yahoo.com.tw', '長的好奇怪長的好奇怪長的好奇怪長的好奇怪長的好奇怪長的好奇怪長的好奇怪長的好奇怪長的好奇怪長的好奇怪長的好奇怪長的好奇怪', '2017-06-26 00:48:27', '', '0000-00-00 00:00:00', 2),
(53, '123', '林暉恩', 'fface1.gif', 'ab0929a@yahoo.com.tw', 'ttttt', '2017-06-26 12:11:03', '', '0000-00-00 00:00:00', 8),
(54, '哈囉', '林暉恩', 'fface1.gif', 'ab0929a@yahoo.com.tw', '費gay恩', '2017-06-26 12:45:27', '', '0000-00-00 00:00:00', 7),
(55, 'wow', '林暉恩', 'fface1.gif', 'ab0929a@yahoo.com.tw', 'yyeeeeeeeee\n\n', '2017-06-26 12:48:15', '哇哈哈\r\n', '2017-06-26 19:53:38', 1),
(56, 'sdaad', '林暉恩', 'fface1.gif', 'ab0929a@yahoo.com.tw', 'dsdadasd', '2017-06-26 15:19:52', NULL, NULL, 7),
(59, '哇哇', '林暉恩', 'fface1.gif', 'ab0929a@yahoo.com.tw', '哇哇哇哇哇哇哇哇哇哇哇哇', '2017-06-26 20:09:35', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `coupon_ID` int(11) NOT NULL,
  `member_ID` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `coupon`
--

INSERT INTO `coupon` (`coupon_ID`, `member_ID`, `due_date`, `discount`) VALUES
(28, 105, '2018-06-25', 200),
(29, 106, '2018-06-25', 200),
(30, 48, '2018-06-26', 200);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_ID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `m_name` varchar(15) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `registration_date` date NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`member_ID`, `email`, `password`, `m_name`, `gender`, `phone`, `birthday`, `address`, `registration_date`, `is_admin`) VALUES
(4, 'safsfafasff', '594f803b380a41396ed6', 'sdfasfasfsf', 0, 'afasfsff', '1918-02-19', 'sfsfafsafa', '2017-06-16', 0),
(5, 'ab0929a@yahoo.com.', 'd41d8cd98f00b204e980', '', 0, '', '0000-00-00', '', '2017-06-16', 0),
(6, 'ab0929a@yahoo.com.t', '4124bc0a9335c27f086f', 'aaaa', 0, '', '0000-00-00', '', '2017-06-16', 0),
(7, 'aaa', '594f803b380a41396ed6', '', 0, '', '0000-00-00', '', '2017-06-16', 0),
(8, 'aaaaa', '11111', '林暉', 0, '', '0000-00-00', '', '2017-06-16', 1),
(43, 'avbvvvvv@yahoo.com', '594f803b380a41396ed63dca39503542', '林暉恩', 0, '0932333333', '1903-05-05', '', '2017-06-18', 0),
(44, 'xxxxx@YAGOO.COM', 'f6a6263167c92de8644ac998b3c4e4d1', 'xxxxx', 0, '', '0000-00-00', '桃園縣復興鄉FFFFFFFFFFFFFFFFFFFFFFF', '2017-06-18', 0),
(45, 'ggggg', 'ba248c985ace94863880921d8900c53f', 'ggggg', 0, '', '0000-00-00', '', '2017-06-20', 0),
(46, 'ab0929a@yahoo.com.tw', 'b0baee9d279d34fa1dfd71aadb908c3f', '哇哈哈', 0, '', '0000-00-00', '幹', '2017-06-20', 0),
(48, 'pppp', '2d7acadf10224ffdabeab505970a8934', 'ppp', 0, '', '0000-00-00', '', '2017-06-26', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text,
  `picture` varchar(50) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `sale_number` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`product_ID`, `name`, `price`, `description`, `picture`, `stock`, `category`, `sale_number`) VALUES
(1, '奶油施暴枕', 250, '悲劇劇劇劇劇', 'images/shop/20100412163450.png', 100, 1, 2),
(2, '他馬是小火車', 150, NULL, 'images/shop/20100412163553.png', 20, 1, 0),
(3, '凱蒂計算機', 150, NULL, 'images/shop/20100412142246.png', 20, 2, 0),
(4, '雙子星假蛋糕', 100, NULL, 'images/shop/20100412162126.png', 20, 3, 3),
(5, '海賊王船隻', 250, NULL, 'images/shop/20100412145557.png', 100, 3, 0),
(6, '凱蒂計算機', 150, NULL, 'images/shop/20100412142246.png', 20, 2, 0),
(7, '凱蒂計算機', 150, NULL, 'images/shop/20100412142246.png', 20, 2, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `transaction_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `t_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `transaction`
--

CREATE TABLE `transaction` (
  `transaction_ID` int(20) NOT NULL,
  `member_ID` int(11) NOT NULL,
  `total` int(10) NOT NULL DEFAULT '0',
  `date` varchar(20) NOT NULL,
  `deliverState` varchar(20) DEFAULT NULL,
  `recipName` varchar(20) NOT NULL,
  `recipPhone` int(20) NOT NULL,
  `recipAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `transaction`
--

INSERT INTO `transaction` (`transaction_ID`, `member_ID`, `total`, `date`, `deliverState`, `recipName`, `recipPhone`, `recipAddress`) VALUES
(15, 55, 400, '', '出貨中', '1', 0, ''),
(16, 55, 1200, '', '出貨中', '3', 6, '9'),
(18, 55, 400, '', '出貨中', '', 0, ''),
(19, 55, 250, '', NULL, '', 0, '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`),
  ADD KEY `board_ibfk_1` (`pid`);

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_ID`),
  ADD KEY `member_ID` (`member_ID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_ID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`transaction_ID`,`product_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- 資料表索引 `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- 使用資料表 AUTO_INCREMENT `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用資料表 AUTO_INCREMENT `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
