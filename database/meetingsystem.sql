-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-28 12:19:54
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

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
  `courseId` varchar(255) NOT NULL,
  `courseHostAcc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `coursehost`
--

INSERT INTO `coursehost` (`courseId`, `courseHostAcc`) VALUES
('409432180', '40943218'),
('409432181', '40943218'),
('409432182', '40943218'),
('409432200', '40943220'),
('409432201', '40943220'),
('4094322010', '40943220'),
('409432202', '40943220'),
('409432203', '40943220'),
('409432205', '40943220'),
('409432206', '40943220'),
('409432207', '40943220'),
('409432208', '40943220'),
('409432209', '40943220');

-- --------------------------------------------------------

--
-- 資料表結構 `courseinfo`
--

CREATE TABLE `courseinfo` (
  `courseId` varchar(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseDateStart` date NOT NULL DEFAULT current_timestamp(),
  `courseDateEnd` date NOT NULL,
  `courseTimeStart` time NOT NULL DEFAULT current_timestamp(),
  `courseTimeEnd` time NOT NULL,
  `courseContent` varchar(255) NOT NULL,
  `openCourse` tinyint(1) NOT NULL,
  `fileExist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `courseinfo`
--

INSERT INTO `courseinfo` (`courseId`, `courseName`, `courseDateStart`, `courseDateEnd`, `courseTimeStart`, `courseTimeEnd`, `courseContent`, `openCourse`, `fileExist`) VALUES
('409432180', 'date6/26', '2023-06-26', '2023-06-26', '06:35:00', '18:35:00', 'testmkdirdes', 0, 0),
('409432181', 'date6/27', '2023-06-27', '2023-06-27', '06:35:00', '18:35:00', 'testmkdirdes', 0, 0),
('409432182', 'date6/24', '2023-06-24', '2023-06-24', '06:35:00', '18:35:00', 'testmkdirdes', 0, 0),
('409432200', 'date6/25', '2023-06-25', '2023-06-25', '02:40:00', '14:41:00', '25', 0, 0),
('409432201', 'date6/23', '2023-06-23', '2023-06-23', '03:20:00', '15:20:00', '6/23', 0, 0),
('4094322010', 'date7/6', '2023-07-06', '2023-07-06', '03:20:00', '15:20:00', '7/6', 0, 0),
('409432202', 'date6/22', '2023-06-22', '2023-06-22', '03:20:00', '15:20:00', '6/22', 0, 0),
('409432203', 'date6/21', '2023-06-21', '2023-06-21', '03:20:00', '15:20:00', '6/21', 0, 0),
('409432205', 'date7/1', '2023-07-01', '2023-07-01', '03:20:00', '15:20:00', '7/1', 0, 0),
('409432206', 'date7/2', '2023-07-02', '2023-07-02', '03:20:00', '15:20:00', '7/2', 0, 0),
('409432207', 'date7/3', '2023-07-03', '2023-07-03', '03:20:00', '15:20:00', '7/3', 0, 0),
('409432208', 'date7/4', '2023-07-04', '2023-07-04', '03:20:00', '15:20:00', '7/4', 0, 0),
('409432209', 'date7/5', '2023-07-05', '2023-07-05', '03:20:00', '15:20:00', '7/5', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `coursemember`
--

CREATE TABLE `coursemember` (
  `courseId` varchar(255) NOT NULL,
  `courseMember` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `coursemember`
--

INSERT INTO `coursemember` (`courseId`, `courseMember`) VALUES
('409432180', '40943218'),
('409432180', '40943220'),
('409432180', '40943257'),
('409432180', '40943258'),
('409432181', '40943218'),
('409432181', '40943220'),
('409432181', '40943257'),
('409432181', '40943258'),
('409432182', '40943218'),
('409432182', '40943220'),
('409432182', '40943257'),
('409432182', '40943258'),
('409432200', '40943218'),
('409432200', '40943220'),
('409432200', '40943257'),
('409432200', '40943258'),
('409432201', '40943218'),
('409432201', '40943220'),
('409432201', '40943257'),
('409432201', '40943258'),
('4094322010', '40943218'),
('4094322010', '40943220'),
('4094322010', '40943257'),
('4094322010', '40943258'),
('409432202', '40943218'),
('409432202', '40943220'),
('409432202', '40943257'),
('409432202', '40943258'),
('409432203', '40943218'),
('409432203', '40943220'),
('409432203', '40943257'),
('409432203', '40943258'),
('409432205', '40943218'),
('409432205', '40943220'),
('409432205', '40943257'),
('409432205', '40943258'),
('409432206', '40943218'),
('409432206', '40943220'),
('409432206', '40943257'),
('409432206', '40943258'),
('409432207', '40943218'),
('409432207', '40943220'),
('409432207', '40943257'),
('409432207', '40943258'),
('409432208', '40943218'),
('409432208', '40943220'),
('409432208', '40943257'),
('409432208', '40943258'),
('409432209', '40943218'),
('409432209', '40943220'),
('409432209', '40943257'),
('409432209', '40943258');

-- --------------------------------------------------------

--
-- 資料表結構 `userinfo`
--

CREATE TABLE `userinfo` (
  `userAccount` varchar(255) NOT NULL COMMENT '帳號學號',
  `userName` varchar(255) NOT NULL COMMENT '姓名',
  `userEmail` varchar(255) NOT NULL COMMENT '信箱',
  `userClass` varchar(255) NOT NULL COMMENT '班級',
  `userImage` tinyint(1) DEFAULT NULL COMMENT '使用者圖片',
  `userCourseNumber` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `userinfo`
--

INSERT INTO `userinfo` (`userAccount`, `userName`, `userEmail`, `userClass`, `userImage`, `userCourseNumber`) VALUES
('40943101', '43101Name', '40943101@nfumail', '3AG1', 0, 0),
('40943102', '43102Name', '40943102@nfumail', '3AG1', 0, 0),
('40943103', '43103Name', '40943103@nfumail', '3AG1', 0, 0),
('40943104', '43104Name', '40943104@nfumail', '3AG1', 0, 0),
('40943111', '43111Name', '40943111@nfumail', '3AG2', 0, 0),
('40943112', '43112Name', '40943112@nfumail', '3AG2', 0, 0),
('40943113', '43113Name', '40943113@nfumail', '3AG2', 0, 0),
('40943114', '43114Name', '40943114@nfumail', '3AG2', 0, 0),
('40943211', '43211Name', '40943211@nfumail', '3BG2', 0, 0),
('40943212', '43212Name', '40943212@nfumail', '3BG2', 0, 0),
('40943213', '43213Name', '40943213@nfumail', '3BG2', 0, 0),
('40943214', '43214Name', '40943214@nfumail', '3BG2', 0, 0),
('40943218', '陳瑞鑫', '40943218@nfu.edu.tw', '3BG1', 1, 3),
('40943220', '陳懋昕', '40943218@nfu.edu.tw', '3BG1', 1, 11),
('40943257', '蘇偉勝', '40943218@nfu.edu.tw', '3BG1', 1, 0),
('40943258', '蘇富羿', '40943218@nfu.edu.tw', '3BG1', 1, 0),
('root', '管理者', 'root@nfumail', 'classRoot', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `userlogininfo`
--

CREATE TABLE `userlogininfo` (
  `userAccount` varchar(255) NOT NULL COMMENT '帳號學號',
  `userPassword` varchar(255) NOT NULL COMMENT '密碼',
  `userPermission` int(2) NOT NULL COMMENT '權限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `userlogininfo`
--

INSERT INTO `userlogininfo` (`userAccount`, `userPassword`, `userPermission`) VALUES
('40943101', '$2y$10$rjKRQ8fnYXdpwkbHp6ZWVOf.Hyr0Sxc1mufN89ZDko.MkmGHgEYfa', 2),
('40943102', '$2y$10$0ld5By7rC1YYzKXAnxKswOZplFMJKIEVGOKCTgomQv5OFI34UizTO', 2),
('40943103', '$2y$10$CLES8xoc8GfyLnLlsP9Xe.DL.mfvpay6gL97du0zR5vzGOks5gbK6', 2),
('40943104', '$2y$10$lrpfqfrrM9OpkN8jFV3/0.yZzg9f5drOvmIlZcTPyFIfMU5dprD0C', 2),
('40943111', '$2y$10$kljaszy67DRtwyWGwDFqae9.1AZqLVxdvVS2x0R4qi8zGj6T/mNq.', 2),
('40943112', '$2y$10$Vvn4klHwD.eTZ3OsiFFVIusiqaJ2g0CJwS4/sdVRkarHmNwm9Q6ae', 2),
('40943113', '$2y$10$hSsT/IC9SZzXeFQtfGpsNO/FtU9BWpi7pcygSDsRuXGRjGgHfdnKO', 2),
('40943114', '$2y$10$uYCxrZN6lMBaDK27E1m4f.MZ64x663RQvBqOFxZiuBye1oloderbO', 2),
('40943211', '$2y$10$7xWFbC6d1IWjPrHz2YQubOXb5IviPRXvcavmEPIN5LluZgIsdNcF.', 2),
('40943212', '$2y$10$GA.wCDjH51Yj9SL7YR1uQugJorR7blZtB2/BXksWWkeEBWrSULVYq', 2),
('40943213', '$2y$10$OBWmCOtpsP3aS8yomIfpq.2KVM64Q56Aiq.YW7Cljicu0Jcke/fom', 2),
('40943214', '$2y$10$tgK8xi0sn2yWVSHBFKvIF.KIhzd72AJQpoRZmhy7.CbShNC1Z8xW6', 2),
('40943218', '$2y$10$d.dIS8YxsTKmMWVDLNv9uueYSYLTeYvv.7JE/YA8i.IIosT7jgOMO', 2),
('40943220', '$2y$10$s6LWeuvmDz5Qj14eOLLbpONPL.4e.U8zo1M83qhEANqqKC08YcZJq', 2),
('40943257', '$2y$10$uYoNrF5lUpOX5Agjq.L7Y.DUMC1JbulgRLich1moi2o0QBdDetUQy', 2),
('40943258', '$2y$10$YwDFLxAEgBhHzwIhMug21udKe9nlKc09aHX9NobM9kDly2IE7Dl4m', 2),
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
  ADD PRIMARY KEY (`courseId`,`courseMember`);

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
