-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 09:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricstars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `isPresent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `isPresent`) VALUES
(22, '6149', 1),
(23, '2775', 1),
(24, '5696', 1),
(26, '1503', 1),
(27, '3477', 1),
(28, '7734', 1),
(29, '9651', 1),
(30, '3009', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_atch`
--

CREATE TABLE `m_atch` (
  `match_id` int(11) NOT NULL,
  `team_Aid` int(11) DEFAULT NULL,
  `team_Bid` int(11) DEFAULT NULL,
  `team_Aname` varchar(128) DEFAULT NULL,
  `team_Bname` varchar(128) DEFAULT NULL,
  `admin_name` varchar(128) DEFAULT NULL,
  `toss` int(11) DEFAULT NULL,
  `overs` int(11) NOT NULL,
  `isActive` int(11) DEFAULT 0,
  `isSelect` int(11) DEFAULT 0,
  `adminid` int(11) DEFAULT NULL,
  `isFinished` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_atch`
--

INSERT INTO `m_atch` (`match_id`, `team_Aid`, `team_Bid`, `team_Aname`, `team_Bname`, `admin_name`, `toss`, `overs`, `isActive`, `isSelect`, `adminid`, `isFinished`) VALUES
(50, 115, 116, 'india', 'england', '6149', 115, 2, 1, 1, 22, 1),
(51, 117, 118, 'india', 'aus', '2775', 117, 1, 1, 1, 23, 1),
(52, 119, 120, 'india', 'asdf', '5696', 120, 1, 1, 1, 24, 1),
(54, 123, 124, 'q', 'england', '1503', 123, 2, 1, 1, 26, 0),
(55, 125, 126, 'india', 'bcd', '9651', 126, 1, 1, 1, 29, 0),
(59, 127, 128, 'abc', 'bcd', '3009', 127, 1, 1, 1, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `player_name` varchar(30) DEFAULT NULL,
  `tem_id` int(11) DEFAULT NULL,
  `isSelect` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `player_name`, `tem_id`, `isSelect`) VALUES
(1187, 'asdf', 115, 1),
(1188, 'sdfasde', 115, 1),
(1189, 'asg', 115, 1),
(1190, 'ergdzf', 115, 1),
(1191, 'gddgdf', 115, 0),
(1192, 'ggdf', 115, 0),
(1193, 'gfd', 115, 0),
(1194, 'gdfg', 115, 0),
(1195, 'dfgd', 115, 0),
(1196, 'fgr', 115, 0),
(1197, 'dgd', 115, 0),
(1198, '', 115, 0),
(1199, 'shhsdfdg', 116, 0),
(1200, 'fdgrg', 116, 0),
(1201, 'dfgdr', 116, 0),
(1202, 'gdgz', 116, 0),
(1203, 'dgfr', 116, 0),
(1204, 'rff', 116, 0),
(1205, 'grarg', 116, 0),
(1206, 'zarfgdf', 116, 0),
(1207, 'gar', 116, 0),
(1208, 'gr', 116, 0),
(1209, 'gdsdfg', 116, 0),
(1210, '', 116, 0),
(1211, 'sdfsadfsdf', 117, 1),
(1212, 'asdf', 117, 1),
(1213, 'asdf', 117, 1),
(1214, 'asdf', 117, 0),
(1215, 'asdf', 117, 0),
(1216, 'steae', 117, 0),
(1217, 'ffr', 117, 0),
(1218, 'strg', 117, 0),
(1219, 'fgr', 117, 0),
(1220, 'bethfg', 117, 0),
(1221, 'hth', 117, 0),
(1222, '', 117, 0),
(1223, 'rytrt', 118, 0),
(1224, 'rst', 118, 0),
(1225, 'rthdy jh', 118, 0),
(1226, 'htrh', 118, 0),
(1227, 'tyhcfy', 118, 0),
(1228, 'gturstfgh', 118, 0),
(1229, 'thtthft', 118, 0),
(1230, 'tfy', 118, 0),
(1231, 'dtytfy', 118, 0),
(1232, 't', 118, 0),
(1233, 'tytrs', 118, 0),
(1234, '', 118, 0),
(1235, '1', 119, 0),
(1236, 'f', 119, 0),
(1237, 'e', 119, 0),
(1238, '4', 119, 0),
(1239, '5', 119, 0),
(1240, 'ff', 119, 0),
(1241, 'j', 119, 0),
(1242, '9', 119, 0),
(1243, '28', 119, 0),
(1244, 'jj', 119, 0),
(1245, '30', 119, 0),
(1246, '31', 119, 0),
(1247, 'aa', 120, 1),
(1248, 'asdf', 120, 0),
(1249, 'e', 120, 0),
(1250, '4', 120, 0),
(1251, 'ee', 120, 0),
(1252, 're', 120, 0),
(1253, 'er', 120, 0),
(1254, 'hh', 120, 0),
(1255, '28', 120, 0),
(1256, '10', 120, 0),
(1257, 'kk', 120, 0),
(1258, '12', 120, 0),
(1283, 'aa', 123, 0),
(1284, 'asdf', 123, 0),
(1285, 'e', 123, 0),
(1286, 'dd', 123, 0),
(1287, 'e', 123, 0),
(1288, 'ff', 123, 0),
(1289, 'gg', 123, 0),
(1290, 'k', 123, 0),
(1291, '28', 123, 0),
(1292, '43', 123, 0),
(1293, '30', 123, 0),
(1294, '', 123, 0),
(1295, 'aa', 124, 0),
(1296, 'asdf', 124, 0),
(1297, 'asdf', 124, 0),
(1298, '4', 124, 0),
(1299, 'e', 124, 0),
(1300, 'h', 124, 0),
(1301, 'er', 124, 0),
(1302, 'hh', 124, 0),
(1303, 'ii', 124, 0),
(1304, 'p', 124, 0),
(1305, 'kk', 124, 0),
(1306, '', 124, 0),
(1307, 'sdfa', 125, 0),
(1308, 'asdf', 125, 0),
(1309, 'asdf', 125, 0),
(1310, 'dd', 125, 0),
(1311, '5', 125, 0),
(1312, 'ff', 125, 0),
(1313, '', 125, 0),
(1314, '', 125, 0),
(1315, '', 125, 0),
(1316, '', 125, 0),
(1317, '', 125, 0),
(1318, '', 125, 0),
(1319, 'aa', 126, 1),
(1320, 'f', 126, 1),
(1321, 'asdf', 126, 0),
(1322, 'dd', 126, 0),
(1323, '5', 126, 0),
(1324, 'ff', 126, 0),
(1325, '', 126, 0),
(1326, '', 126, 0),
(1327, '', 126, 0),
(1328, '', 126, 0),
(1329, '', 126, 0),
(1330, '', 126, 0),
(1331, 'asdfa', 127, 1),
(1332, 'asdfew', 127, 0),
(1333, 'efadfer', 127, 1),
(1334, 'efaewfe', 127, 0),
(1335, 'wefwvds', 127, 0),
(1336, '', 127, 0),
(1337, '', 127, 0),
(1338, '', 127, 0),
(1339, '', 127, 0),
(1340, '', 127, 0),
(1341, '', 127, 0),
(1342, '', 127, 0),
(1343, 'wryerert', 128, 0),
(1344, 'qertertger', 128, 0),
(1345, 'srtresgesg', 128, 0),
(1346, 'sreesrsg', 128, 0),
(1347, 'aerteserg', 128, 0),
(1348, '', 128, 0),
(1349, '', 128, 0),
(1350, '', 128, 0),
(1351, '', 128, 0),
(1352, '', 128, 0),
(1353, '', 128, 0),
(1354, '', 128, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `bat_run` int(11) DEFAULT 0,
  `played_ball` int(11) DEFAULT 0,
  `hitted_fours` int(11) DEFAULT 0,
  `hitted_sixes` int(11) DEFAULT 0,
  `bowlruns` int(11) DEFAULT 0,
  `bowled_overs` int(11) DEFAULT 0,
  `wicket` int(11) DEFAULT 0,
  `extra` int(11) DEFAULT 0,
  `out_type` varchar(255) DEFAULT NULL,
  `stricking_role` int(11) DEFAULT NULL,
  `match_id` int(11) DEFAULT NULL,
  `toss` int(11) DEFAULT NULL,
  `extra_wicket` int(11) DEFAULT 0,
  `noball` int(11) DEFAULT 0,
  `wideball` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `player_id`, `bat_run`, `played_ball`, `hitted_fours`, `hitted_sixes`, `bowlruns`, `bowled_overs`, `wicket`, `extra`, `out_type`, `stricking_role`, `match_id`, `toss`, `extra_wicket`, `noball`, `wideball`) VALUES
(176, 1199, 24, 16, 0, 0, 0, 0, 0, 0, 'not out', NULL, 50, 116, 0, 0, 0),
(177, 1201, 21, 6, 0, 1, 0, 0, 0, 0, 'not out', NULL, 50, 116, 0, 0, 0),
(178, 1188, 0, 0, 0, 0, 49, 6, 0, 10, NULL, NULL, 50, 115, 0, 10, 0),
(179, 1190, 0, 0, 0, 0, 0, 6, 0, 0, NULL, NULL, 50, 115, 0, 0, 0),
(180, 1188, 4, 2, 1, 0, 0, 0, 0, 0, 'B dfgdr', NULL, 50, 115, 0, 0, 0),
(181, 1189, 24, 4, 0, 4, 0, 0, 0, 0, 'not out', NULL, 50, 115, 0, 0, 0),
(182, 1201, 0, 0, 0, 0, 28, 6, 1, 0, NULL, NULL, 50, 116, 0, 0, 0),
(183, 1187, 14, 3, 0, 2, 0, 0, 0, 0, 'B fdgrg', NULL, 50, 115, 0, 0, 0),
(184, 1200, 0, 0, 0, 0, 26, 5, 1, 0, NULL, NULL, 50, 116, 0, 0, 0),
(185, 1190, 12, 2, 0, 2, 0, 0, 0, 0, 'not out', NULL, 50, 115, 0, 0, 0),
(186, 1223, 4, 1, 0, 0, 0, 0, 0, 0, 'not out', NULL, 51, 118, 0, 0, 0),
(187, 1224, 0, 1, 0, 0, 0, 0, 0, 0, 'B sdfsadfsdf', NULL, 51, 118, 0, 0, 0),
(188, 1211, 0, 0, 0, 0, 5, 6, 1, 1, NULL, NULL, 51, 117, 0, 1, 0),
(189, 1225, 1, 5, 0, 0, 0, 0, 0, 0, 'not out', NULL, 51, 118, 0, 0, 0),
(190, 1211, 0, 1, 0, 0, 0, 0, 0, 0, 'B rthdy jh', NULL, 51, 117, 0, 0, 0),
(191, 1213, 2, 2, 0, 0, 0, 0, 0, 0, 'not out', NULL, 51, 117, 0, 0, 0),
(192, 1225, 0, 0, 0, 0, 5, 6, 1, 0, NULL, NULL, 51, 118, 0, 0, 0),
(193, 1212, 3, 3, 0, 0, 0, 0, 0, 0, 'not out', NULL, 51, 117, 0, 0, 0),
(194, 1235, 5, 3, 0, 0, 0, 0, 0, 0, 'not out', NULL, 52, 119, 0, 0, 0),
(195, 1235, 17, 4, 0, 1, 0, 0, 0, 0, 'not out', NULL, 52, 119, 0, 0, 0),
(196, 1247, 0, 0, 0, 0, 22, 6, 0, 1, NULL, NULL, 52, 120, 0, 1, 0),
(197, 1247, 15, 3, 0, 2, 0, 0, 0, 0, 'not out', NULL, 52, 120, 0, 0, 0),
(198, 1247, 11, 2, 0, 1, 0, 0, 0, 0, 'not out', NULL, 52, 120, 0, 0, 0),
(199, 1235, 0, 0, 0, 0, 26, 5, 0, 0, NULL, NULL, 52, 119, 0, 0, 0),
(200, 1319, 0, 0, 0, 0, 0, 0, 0, 0, 'not out', 1, 55, 126, 0, 0, 0),
(201, 1320, 0, 0, 0, 0, 0, 0, 0, 0, 'not out', 2, 55, 126, 0, 0, 0),
(202, 1307, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 55, 125, 0, 0, 0),
(203, 1331, 0, 0, 0, 0, 0, 0, 0, 0, 'not out', 1, 59, 127, 0, 0, 0),
(204, 1333, 0, 0, 0, 0, 0, 0, 0, 0, 'not out', 2, 59, 127, 0, 0, 0),
(205, 1345, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 1, 59, 128, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`) VALUES
(115, 'india'),
(116, 'england'),
(117, 'india'),
(118, 'aus'),
(119, 'india'),
(120, 'asdf'),
(123, 'q'),
(124, 'england'),
(125, 'india'),
(126, 'bcd'),
(127, 'abc'),
(128, 'bcd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_atch`
--
ALTER TABLE `m_atch`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `team_Aid` (`team_Aid`),
  ADD KEY `team_Bid` (`team_Bid`),
  ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `tem_id` (`tem_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `match_id` (`match_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `m_atch`
--
ALTER TABLE `m_atch`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1355;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_atch`
--
ALTER TABLE `m_atch`
  ADD CONSTRAINT `m_atch_ibfk_1` FOREIGN KEY (`team_Aid`) REFERENCES `team` (`team_id`),
  ADD CONSTRAINT `m_atch_ibfk_2` FOREIGN KEY (`team_Bid`) REFERENCES `team` (`team_id`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`tem_id`) REFERENCES `team` (`team_id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`match_id`) REFERENCES `m_atch` (`match_id`),
  ADD CONSTRAINT `status_ibfk_3` FOREIGN KEY (`player_id`) REFERENCES `players` (`player_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
