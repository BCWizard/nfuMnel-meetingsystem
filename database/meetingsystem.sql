-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-03-13 12:44:43
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `meetingsystem`
--

-- --------------------------------------------------------

--
-- 資料表結構 `userinformation`
--

CREATE TABLE `userinformation` (
  `userId` int(8) NOT NULL COMMENT '學號',
  `userAccount` char(20) NOT NULL COMMENT '帳號',
  `userPassword` char(20) NOT NULL COMMENT '密碼',
  `userName` char(20) NOT NULL COMMENT '姓名',
  `userMail` char(40) NOT NULL COMMENT '信箱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `userinformation`
--

INSERT INTO `userinformation` (`userId`, `userAccount`, `userPassword`, `userName`, `userMail`) VALUES
(40943218, '40943218', 'nfucsie218', '陳瑞鑫', '40943218@nfuemail'),
(40943220, '40943220', 'nfucsie220', '陳懋昕', '40943220@nfuemail'),
(40943258, '40943258', 'nfucsie258', '蘇富羿', '40943258@nfuemail'),
(40943257, '40943257', 'nfucsie257', '蘇偉勝', '40943257@nfuemail');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
