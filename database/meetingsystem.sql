-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-11 08:48:08
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
-- 資料表結構 `coursehost`
--

CREATE TABLE `coursehost` (
  `courseId` int(255) NOT NULL,
  `courseHostAcc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `courseinfo`
--

CREATE TABLE `courseinfo` (
  `courseId` int(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseDateStart` date NOT NULL DEFAULT current_timestamp(),
  `courseDateEnd` date NOT NULL,
  `courseTimeStart` time NOT NULL DEFAULT current_timestamp(),
  `courseTimeEnd` time NOT NULL,
  `courseContent` varchar(255) NOT NULL,
  `openCourse` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `coursemember`
--

CREATE TABLE `coursemember` (
  `courseId` int(255) NOT NULL,
  `courseMemberAcc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `userinfo`
--

CREATE TABLE `userinfo` (
  `userAccount` varchar(255) NOT NULL COMMENT '帳號學號',
  `userName` varchar(255) NOT NULL COMMENT '姓名',
  `userEmail` varchar(255) NOT NULL COMMENT '信箱',
  `userClass` varchar(255) NOT NULL COMMENT '班級',
  `userImage` varchar(255) DEFAULT NULL COMMENT '使用者圖片'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `userinfo`
--

INSERT INTO `userinfo` (`userAccount`, `userName`, `userEmail`, `userClass`, `userImage`) VALUES
('40943218', '陳瑞鑫', '40943218@nfumail', 'csie3B', 'userImage/40943218.jpg'),
('40943220', '陳懋昕', '40943220@nfumail', 'csie3B', 'userImage/40943220.jpg'),
('40943257', '蘇偉勝', '40943257@nfumail', 'csie3B', 'userImage/40943257.jpg'),
('40943258', '蘇富羿', '40943258@nfumail', 'csie3B', 'userImage/40943258.jpg'),
('root', '管理者', 'root@nfumail', 'classRoot', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `userlogininfo`
--

CREATE TABLE `userlogininfo` (
  `userAccount` varchar(255) NOT NULL COMMENT '帳號學號',
  `userPassword` varchar(255) NOT NULL COMMENT '密碼',
  `userPermission` int(2) NOT NULL COMMENT '權限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 傾印資料表的資料 `userlogininfo`
--

INSERT INTO `userlogininfo` (`userAccount`, `userPassword`, `userPermission`) VALUES
('40943218', '$2y$10$rDLlSF88UsJgKuGPSlXTHu.RJMtC8Qw2QzwxherbGZILIBAoQC15S', 2),
('40943220', '$2y$10$v7TG.UFcA0pCnE7IG3V.WuQdgsXIifiCXasutOOwG.PkMZqv86Tb6', 2),
('40943257', '$2y$10$uj9pviOyT//AbECUaXYOiezcmn1ewOZV.z2FOStK3VneZYE6svfxq', 2),
('40943258', '$2y$10$1JlZKvlDEtVVjuB1HsfGmegAlUX1xWTd46mrIx315MiD0FakIf2W6', 2),
('root', '$2y$10$l0wdPVWSM2GsVzC1fZ62qOtxiUDiRxPMx27BHVrxhsMd7yash1AoO', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coursehost`
--
ALTER TABLE `coursehost`
  ADD PRIMARY KEY (`courseId`);

--
-- 資料表索引 `courseinfo`
--
ALTER TABLE `courseinfo`
  ADD PRIMARY KEY (`courseId`);

--
-- 資料表索引 `coursemember`
--
ALTER TABLE `coursemember`
  ADD PRIMARY KEY (`courseId`,`courseMemberAcc`);

--
-- 資料表索引 `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userAccount`),
  ADD KEY `userAccount` (`userAccount`);

--
-- 資料表索引 `userlogininfo`
--
ALTER TABLE `userlogininfo`
  ADD PRIMARY KEY (`userAccount`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `courseinfo`
--
ALTER TABLE `courseinfo`
  MODIFY `courseId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `coursehost`
--
ALTER TABLE `coursehost`
  ADD CONSTRAINT `coursehost_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `courseinfo` (`courseId`);

--
-- 資料表的限制式 `coursemember`
--
ALTER TABLE `coursemember`
  ADD CONSTRAINT `coursemember_ibfk_1` FOREIGN KEY (`courseId`) REFERENCES `courseinfo` (`courseId`);

--
-- 資料表的限制式 `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`userAccount`) REFERENCES `userlogininfo` (`userAccount`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
