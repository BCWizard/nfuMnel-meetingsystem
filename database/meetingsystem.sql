-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-05-31 07:30:42
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
  `courseId` varchar(255) NOT NULL,
  `courseHostAcc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `coursehost`
--

INSERT INTO `coursehost` (`courseId`, `courseHostAcc`) VALUES
('409432180', '40943218'),
('409432181', '40943218'),
('409432200', '40943220'),
('409432570', '40943257'),
('409432580', '40943258');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `courseinfo`
--

INSERT INTO `courseinfo` (`courseId`, `courseName`, `courseDateStart`, `courseDateEnd`, `courseTimeStart`, `courseTimeEnd`, `courseContent`, `openCourse`, `fileExist`) VALUES
('409432180', '已過往1', '2023-05-25', '2023-05-25', '08:00:00', '21:10:00', '已過往1des', 0, 0),
('409432181', 'fileTest', '2023-05-31', '2023-05-31', '13:28:00', '16:28:00', 'fileTestDes', 0, 1),
('409432200', '未來1', '2024-05-28', '2024-05-28', '14:20:00', '15:10:00', '未來1des', 0, 0),
('409432570', '已過往2', '2023-05-26', '2023-05-26', '09:10:00', '10:00:00', '已過往2des', 0, 0),
('409432580', '現在1', '2023-05-27', '2023-06-27', '21:42:00', '21:42:00', '現在1des', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `coursemember`
--

CREATE TABLE `coursemember` (
  `courseId` varchar(255) NOT NULL,
  `courseMember` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `coursemember`
--

INSERT INTO `coursemember` (`courseId`, `courseMember`) VALUES
('409432180', '3BG1'),
('409432180', '40943218'),
('409432181', '3BG1'),
('409432181', '40943218'),
('409432200', '3BG1'),
('409432200', '40943220'),
('409432570', '3BG1'),
('409432570', '40943257'),
('409432580', '3BG1'),
('409432580', '40943258');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
('40943218', '陳瑞鑫', '40943218@nfumail', '3BG1', 1, 2),
('40943220', '陳懋昕', '40943218@nfumail', '3BG1', 1, 1),
('40943257', '蘇偉勝', '40943218@nfumail', '3BG1', 1, 1),
('40943258', '蘇富羿', '40943218@nfumail', '3BG1', 1, 1),
('root', '管理者', 'root@nfumail', 'classRoot', 0, 0);

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
