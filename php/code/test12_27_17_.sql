-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-01-17 16:17:40
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `test12/27(17)`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `mid` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `passwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastlogindatetime` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`mid`, `mname`, `passwd`, `lastlogindatetime`) VALUES
('001', '林宥辰', '123', '2025-01-03 09:52:10');

-- --------------------------------------------------------

--
-- 資料表結構 `city`
--

CREATE TABLE `city` (
  `cid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cname` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `city`
--

INSERT INTO `city` (`cid`, `cname`) VALUES
('c01', '台中市'),
('c02', '台北市');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `ID` int(11) NOT NULL COMMENT '編號',
  `Username` varchar(32) NOT NULL COMMENT '會員帳號',
  `Password` varchar(256) NOT NULL COMMENT '會員密碼',
  `Email` varchar(32) NOT NULL COMMENT '會員email',
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '會員註冊時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`ID`, `Username`, `Password`, `Email`, `Created_at`) VALUES
(1, 'test', '123', 'sss', '2024-12-30 01:29:27'),
(2, 'xx', 'xx', 'xx', '2024-12-30 01:33:25'),
(3, '123456', '123456', '123456', '2024-12-30 06:03:54'),
(4, 'test2', '123456', 'test@test.com', '2024-12-30 06:08:04'),
(5, 'test3', '$2y$10$CT8QBURhayGlLkMEP5gPPOB1WiVzSbOirSUdW22jayjk9SZvDLyS6', 'test3@test.com', '2024-12-30 06:10:31');

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `ID` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cid` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`ID`, `name`, `tel`, `cid`) VALUES
('001', '林宥辰', '0979830788', 'c01'),
('002', 'kevin', '3215464', 'c02'),
('003', 'ken', '0909099090', 'c02');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Product` varchar(32) NOT NULL COMMENT '產品名稱',
  `Price` int(11) NOT NULL COMMENT '產品單價',
  `Coach` varchar(32) NOT NULL COMMENT '課程教練',
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT '建檔時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`ID`, `Product`, `Price`, `Coach`, `Created_at`) VALUES
(1, 'CrossFit', 250, 'Danny', '2024-10-21 02:58:03'),
(2, '舉重', 500, '0', '2024-10-21 02:58:03'),
(3, '體操', 500, '0', '2024-10-21 03:32:54'),
(11, '壺玲', 500, 'Lion', '2024-10-21 05:46:01'),
(12, '進擊的體能', 250, '0', '2024-10-21 06:05:27'),
(13, 'Team WOD', 250, 'Danny', '2024-10-21 08:06:10'),
(16, 'hyrox', 800, '0', '2024-11-04 07:20:22'),
(22, '游泳', 250, 'Danny', '2024-11-11 06:39:59'),
(24, 'swim', 700, 'Danny', '2024-11-11 06:42:07');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`mid`);

--
-- 資料表索引 `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '編號', AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
