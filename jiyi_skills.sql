-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2020 年 10 月 26 日 10:16
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `jiyi_skills`
--

-- --------------------------------------------------------

--
-- 資料表結構 `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_bin,
  `description` text COLLATE utf8mb4_bin,
  `photo_url` text COLLATE utf8mb4_bin,
  `document` int(1) NOT NULL DEFAULT '0',
  `document_main` text COLLATE utf8mb4_bin COMMENT 'json or table_name',
  `url` text COLLATE utf8mb4_bin,
  `type_color` text COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 資料表的匯出資料 `components`
--

INSERT INTO `components` (`id`, `name`, `description`, `photo_url`, `document`, `document_main`, `url`, `type_color`) VALUES
(1, '108年數位電子實習電路板', 'no description', NULL, 1, 'side_board', NULL, NULL),
(2, '秉華實驗板', 'EP3C40Q240C8N', NULL, 1, 'fpga', 'fpga_ic.php', NULL),
(3, 'M54562P', 'M54562P IC', NULL, 0, NULL, NULL, NULL),
(4, '4位數七段顯示器 - 1', 'SEG1_', NULL, 0, NULL, NULL, '#F1948A'),
(5, '4位數七段顯示器 - 2', 'SEG2_', NULL, 0, NULL, NULL, '#C39BD3'),
(6, '4x4鍵盤掃描', 'key_', NULL, 0, NULL, NULL, '#C39BD3'),
(7, '8x8 矩陣 LED', 'DOT_', NULL, 0, NULL, NULL, '#73C6B6'),
(8, 'st_7735 LCD顯示器', 'LCD_', NULL, 0, NULL, NULL, '#ABEBC6'),
(9, 'TSL2561 光感應器', 'SCL,SDA', NULL, 0, NULL, NULL, '#F9E79F'),
(10, 'DHT11 溫濕度感測器', 'DATA', NULL, 0, NULL, NULL, '#FAD7A0'),
(11, '1*8 指撥開關', 'SW_', NULL, 0, NULL, NULL, '#F0B27A'),
(12, 'sd178bmi 語音播放模塊', 'SPK_,M0,SDA1,SCL1', NULL, 0, NULL, NULL, '#F0B27A');

-- --------------------------------------------------------

--
-- 資料表結構 `fpga`
--

CREATE TABLE `fpga` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_bin,
  `io_bank` text COLLATE utf8mb4_bin,
  `vref_group` text COLLATE utf8mb4_bin,
  `description` text COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 資料表的匯出資料 `fpga`
--

INSERT INTO `fpga` (`id`, `name`, `io_bank`, `vref_group`, `description`) VALUES
(1, 'PIN_1', '', '', NULL),
(2, 'PIN_2', '', '', NULL),
(3, 'PIN_3', '', '', NULL),
(4, 'PIN_4', '', '', NULL),
(5, 'PIN_5', '', '', NULL),
(6, 'PIN_6', '', 'B1_N0', NULL),
(7, 'PIN_7', '', '', NULL),
(8, 'PIN_8', '', '', NULL),
(9, 'PIN_9', '', 'B1_N1', NULL),
(10, 'PIN_10', '', '', NULL),
(11, 'PIN_11', '', '', NULL),
(12, 'PIN_12', '', 'B1_N1', NULL),
(13, 'PIN_13', '', 'B1_N1', NULL),
(14, 'PIN_14', '', 'B1_N1', NULL),
(15, 'PIN_15', '', '', NULL),
(16, 'PIN_16', '', '', NULL),
(17, 'PIN_17', '', 'B1_N2', NULL),
(18, 'PIN_18', '', 'B1_N2', NULL),
(19, 'PIN_19', '', '', NULL),
(20, 'PIN_20', '', '', NULL),
(21, 'PIN_21', '', 'B1_N3', NULL),
(22, 'PIN_22', '', 'B1_N3', NULL),
(23, 'PIN_23', '', 'B1_N3', NULL),
(24, 'PIN_24', '', 'B1_N3', NULL),
(25, 'PIN_25', '', 'B1_N3', NULL),
(26, 'PIN_26', '', 'B1_N3', NULL),
(27, 'PIN_27', '', 'B1_N3', NULL),
(28, 'PIN_28', '', 'B1_N3', NULL),
(29, 'PIN_29', '', 'B1_N3', NULL),
(30, 'PIN_30', '', 'B1_N3', NULL),
(31, 'PIN_31', '', 'B1_N3', NULL),
(32, 'PIN_32', '', 'B1_N3', NULL),
(33, 'PIN_33', '', '', NULL),
(34, 'PIN_34', '', 'B2_N0', NULL),
(35, 'PIN_35', '', '', NULL),
(36, 'PIN_36', '', '', NULL),
(37, 'PIN_37', '', 'B2_N0', NULL),
(38, 'PIN_38', '', 'B2_N0', NULL),
(39, 'PIN_39', '', 'B2_N0', NULL),
(40, 'PIN_40', '', '', NULL),
(41, 'PIN_41', '', 'B2_N0', NULL),
(42, 'PIN_42', '', '', NULL),
(43, 'PIN_43', '', 'B2_N0', NULL),
(44, 'PIN_44', '', '', NULL),
(45, 'PIN_45', '', 'B2_N1', NULL),
(46, 'PIN_46', '', 'B2_N1', NULL),
(47, 'PIN_47', '', '', NULL),
(48, 'PIN_48', '', '', NULL),
(49, 'PIN_49', '', 'B2_N2', NULL),
(50, 'PIN_50', '', 'B2_N2', NULL),
(51, 'PIN_51', '', 'B2_N3', NULL),
(52, 'PIN_52', '', 'B2_N3', NULL),
(53, 'PIN_53', '', '', NULL),
(54, 'PIN_54', '', '', NULL),
(55, 'PIN_55', '', 'B2_N3', NULL),
(56, 'PIN_56', '', 'B2_N3', NULL),
(57, 'PIN_57', '', 'B2_N3', NULL),
(58, 'PIN_58', '', '', NULL),
(59, 'PIN_59', '', '', NULL),
(60, 'PIN_60', '', '', NULL),
(61, 'PIN_61', '', '', NULL),
(62, 'PIN_62', '', '', NULL),
(63, 'PIN_63', '', 'B3_N3', NULL),
(64, 'PIN_64', '', '', NULL),
(65, 'PIN_65', '', '', NULL),
(66, 'PIN_66', '', '', NULL),
(67, 'PIN_67', '', '', NULL),
(68, 'PIN_68', '', 'B3_N3', NULL),
(69, 'PIN_69', '', 'B3_N2', NULL),
(70, 'PIN_70', '', 'B3_N2', NULL),
(71, 'PIN_71', '', '', NULL),
(72, 'PIN_72', '', '', NULL),
(73, 'PIN_73', '', 'B3_N2', NULL),
(74, 'PIN_74', '', '', NULL),
(75, 'PIN_75', '', '', NULL),
(76, 'PIN_76', '', 'B3_N1', NULL),
(77, 'PIN_77', '', '', NULL),
(78, 'PIN_78', '', 'B3_N1', NULL),
(79, 'PIN_79', '', '', NULL),
(80, 'PIN_80', '', 'B3_N1', NULL),
(81, 'PIN_81', '', 'B3_N1', NULL),
(82, 'PIN_82', '', 'B3_N1', NULL),
(83, 'PIN_83', '', 'B3_N1', NULL),
(84, 'PIN_84', '', 'B3_N0', NULL),
(85, 'PIN_85', '', '', NULL),
(86, 'PIN_86', '', '', NULL),
(87, 'PIN_87', '', 'B3_N0', NULL),
(88, 'PIN_88', '', 'B3_N0', NULL),
(89, 'PIN_89', '', 'B3_N0', NULL),
(90, 'PIN_90', '', 'B3_N0', NULL),
(91, 'PIN_91', '', 'B4_N3', NULL),
(92, 'PIN_92', '', 'B4_N3', NULL),
(93, 'PIN_93', '', 'B4_N3', NULL),
(94, 'PIN_94', '', 'B4_N3', NULL),
(95, 'PIN_95', '', 'B4_N3', NULL),
(96, 'PIN_96', '', '', NULL),
(97, 'PIN_97', '', '', NULL),
(98, 'PIN_98', '', 'B4_N3', NULL),
(99, 'PIN_99', '', 'B4_N3', NULL),
(100, 'PIN_100', '', 'B4_N3', NULL),
(101, 'PIN_101', '', '', NULL),
(102, 'PIN_102', '', '', NULL),
(103, 'PIN_103', '', 'B4_N2', NULL),
(104, 'PIN_104', '', '', NULL),
(105, 'PIN_105', '', '', NULL),
(106, 'PIN_106', '', 'B4_N2', NULL),
(107, 'PIN_107', '', 'B4_N2', NULL),
(108, 'PIN_108', '', '', NULL),
(109, 'PIN_109', '', '', NULL),
(110, 'PIN_110', '', 'B4_N1', NULL),
(111, 'PIN_111', '', 'B4_N1', NULL),
(112, 'PIN_112', '', 'B4_N1', NULL),
(113, 'PIN_113', '', 'B4_N0', NULL),
(114, 'PIN_114', '', 'B4_N0', NULL),
(115, 'PIN_115', '', '', NULL),
(116, 'PIN_116', '', '', NULL),
(117, 'PIN_117', '', 'B4_N0', NULL),
(118, 'PIN_118', '', 'B4_N0', NULL),
(119, 'PIN_119', '', '', NULL),
(120, 'PIN_120', '', '', NULL),
(121, 'PIN_121', '', '', NULL),
(122, 'PIN_122', '', '', NULL),
(123, 'PIN_123', '', '', NULL),
(124, 'PIN_124', '', '', NULL),
(125, 'PIN_125', '', '', NULL),
(126, 'PIN_126', '', 'B5_N3', NULL),
(127, 'PIN_127', '', 'B5_N3', NULL),
(128, 'PIN_128', '', 'B5_N3', NULL),
(129, 'PIN_129', '', '', NULL),
(130, 'PIN_130', '', '', NULL),
(131, 'PIN_131', '', 'B5_N3', NULL),
(132, 'PIN_131', '', 'B5_N3', NULL),
(133, 'PIN_132', '', 'B5_N3', NULL),
(134, 'PIN_133', '', 'B5_N3', NULL),
(135, 'PIN_134', '', 'B5_N3', NULL),
(136, 'PIN_135', '', 'B5_N2', NULL),
(137, 'PIN_136', '', '', NULL),
(138, 'PIN_137', '', 'B5_N2', NULL),
(139, 'PIN_138', '', '', NULL),
(140, 'PIN_139', '', 'B5_N2', NULL),
(141, 'PIN_140', '', '', NULL),
(142, 'PIN_141', '', '', NULL),
(143, 'PIN_142', '', 'B5_N1', NULL),
(144, 'PIN_143', '', 'B5_N0', NULL),
(145, 'PIN_144', '', 'B5_N0', NULL),
(146, 'PIN_145', '', 'B5_N0', NULL),
(147, 'PIN_146', '', 'B5_N0', NULL),
(148, 'PIN_147', '', '', NULL),
(149, 'PIN_148', '', '', NULL),
(150, 'PIN_149', '', 'B5_N0', NULL),
(151, 'PIN_150', '', 'B5_N0', NULL),
(152, 'PIN_151', '', 'B6_N3', NULL),
(153, 'PIN_152', '', 'B6_N3', NULL),
(154, 'PIN_153', '', 'B6_N3', NULL),
(155, 'PIN_154', '', '', NULL),
(156, 'PIN_155', '', 'B6_N3', NULL),
(157, 'PIN_156', '', '', NULL),
(158, 'PIN_157', '', 'B6_N3', NULL),
(159, 'PIN_158', '', 'B6_N3', NULL),
(160, 'PIN_159', '', 'B6_N3', NULL),
(161, 'PIN_160', '', 'B6_N3', NULL),
(162, 'PIN_161', '', 'B6_N3', NULL),
(163, 'PIN_162', '', 'B6_N3', NULL),
(164, 'PIN_163', '', '', NULL),
(165, 'PIN_164', '', 'B6_N3', NULL),
(166, 'PIN_165', '', '', NULL),
(167, 'PIN_166', '', 'B6_N3', NULL),
(168, 'PIN_167', '', '', NULL),
(169, 'PIN_168', '', '', NULL),
(170, 'PIN_169', '', 'B6_N2', NULL),
(171, 'PIN_170', '', '', NULL),
(172, 'PIN_171', '', 'B6_N1', NULL),
(173, 'PIN_172', '', '', NULL),
(174, 'PIN_173', '', 'B6_N1', NULL),
(175, 'PIN_174', '', '', NULL),
(176, 'PIN_175', '', '', NULL),
(177, 'PIN_176', '', 'B6_N0', NULL),
(178, 'PIN_177', '', 'B6_N0', NULL),
(179, 'PIN_178', '', '', NULL),
(180, 'PIN_179', '', '', NULL),
(181, 'PIN_180', '', '', NULL),
(182, 'PIN_181', '', '', NULL),
(183, 'PIN_182', '', '', NULL),
(184, 'PIN_183', '', 'B7_N0', NULL),
(185, 'PIN_184', '', 'B7_N0', NULL),
(186, 'PIN_185', '', 'B7_N0', NULL),
(187, 'PIN_186', '', 'B7_N1', NULL),
(188, 'PIN_187', '', 'B7_N1', NULL),
(189, 'PIN_188', '', 'B7_N1', NULL),
(190, 'PIN_189', '', 'B7_N1', NULL),
(191, 'PIN_190', '', '', NULL),
(192, 'PIN_191', '', '', NULL),
(193, 'PIN_192', '', '', NULL),
(194, 'PIN_193', '', '', NULL),
(195, 'PIN_194', '', 'B7_N2', NULL),
(196, 'PIN_195', '', 'B7_N2', NULL),
(197, 'PIN_196', '', 'B7_N2', NULL),
(198, 'PIN_197', '', 'B7_N2', NULL),
(199, 'PIN_198', '', '', NULL),
(200, 'PIN_199', '', '', NULL),
(201, 'PIN_200', '', 'B7_N2', NULL),
(202, 'PIN_201', '', 'B7_N2', NULL),
(203, 'PIN_202', '', 'B7_N3', NULL),
(204, 'PIN_203', '', 'B7_N3', NULL),
(205, 'PIN_204', '', '', NULL),
(206, 'PIN_205', '', '', NULL),
(207, 'PIN_206', '', '', NULL),
(208, 'PIN_207', '', 'B7_N3', NULL),
(209, 'PIN_208', '', '', NULL),
(210, 'PIN_209', '', 'B7_N3', NULL),
(211, 'PIN_210', '', 'B7_N3', NULL),
(212, 'PIN_211', '', 'B8_N0', NULL),
(213, 'PIN_212', '', 'B8_N0', NULL),
(214, 'PIN_213', '', '', NULL),
(215, 'PIN_214', '', 'B8_N0', NULL),
(216, 'PIN_215', '', '', NULL),
(217, 'PIN_216', '', 'B8_N0', NULL),
(218, 'PIN_217', '', 'B8_N0', NULL),
(219, 'PIN_218', '', 'B8_N0', NULL),
(220, 'PIN_219', '', 'B8_N1', NULL),
(221, 'PIN_220', '', '', NULL),
(222, 'PIN_221', '', 'B8_N1', NULL),
(223, 'PIN_222', '', '', NULL),
(224, 'PIN_223', '', 'B8_N1', NULL),
(225, 'PIN_224', '', 'B8_N1', NULL),
(226, 'PIN_225', '', '', NULL),
(227, 'PIN_226', '', 'B8_N2', NULL),
(228, 'PIN_227', '', '', NULL),
(229, 'PIN_228', '', '', NULL),
(230, 'PIN_229', '', '', NULL),
(231, 'PIN_230', '', 'B8_N2', NULL),
(232, 'PIN_231', '', 'B8_N2', NULL),
(233, 'PIN_232', '', 'B8_N2', NULL),
(234, 'PIN_233', '', '', NULL),
(235, 'PIN_234', '', '', NULL),
(236, 'PIN_235', '', 'B8_N3', NULL),
(237, 'PIN_236', '', 'B8_N3', NULL),
(238, 'PIN_237', '', '', NULL),
(239, 'PIN_238', '', '', NULL),
(240, 'PIN_239', '', 'B8_N3', NULL),
(241, 'PIN_240', '', 'B8_N3', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `side_board`
--

CREATE TABLE `side_board` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_bin,
  `side` int(1) DEFAULT NULL COMMENT '0 => left, 1 => right',
  `index_at` int(1) DEFAULT NULL,
  `row` int(11) DEFAULT NULL,
  `col` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 資料表的匯出資料 `side_board`
--

INSERT INTO `side_board` (`id`, `name`, `side`, `index_at`, `row`, `col`, `description`) VALUES
(1, 'BUZZER', 0, 1, 0, 0, '蜂鳴器'),
(2, 'LED_R', 0, 1, 0, 1, NULL),
(3, 'LED_G', 0, 1, 0, 2, NULL),
(4, 'LED_Y', 0, 1, 0, 3, NULL),
(5, 'RGB_R', 0, 1, 0, 4, NULL),
(6, 'RGB_G', 0, 1, 0, 5, NULL),
(7, 'RGB_B', 0, 1, 0, 6, NULL),
(8, 'SEG1_A', 0, 2, 0, 0, NULL),
(9, 'SEG1_B', 0, 2, 0, 1, NULL),
(10, 'SEG1_C', 0, 2, 0, 2, NULL),
(11, 'SEG1_D', 0, 2, 0, 3, NULL),
(12, 'SEG1_E', 0, 2, 0, 4, NULL),
(13, 'SEG1_F', 0, 2, 0, 5, NULL),
(14, 'SEG1_DOT', 0, 2, 0, 6, NULL),
(15, 'SEG1_S1', 0, 2, 0, 7, NULL),
(16, 'SEG1_S2', 0, 2, 0, 8, NULL),
(17, 'SEG1_S3', 0, 2, 0, 9, NULL),
(18, 'SEG1_S4', 0, 2, 0, 10, NULL),
(19, 'SEG2_A', 0, 2, 1, 0, NULL),
(20, 'SEG2_B', 0, 2, 1, 1, NULL),
(21, 'SEG2_C', 0, 2, 1, 2, NULL),
(22, 'SEG2_D', 0, 2, 1, 3, NULL),
(23, 'SEG2_E', 0, 2, 1, 4, NULL),
(24, 'SEG2_F', 0, 2, 1, 5, NULL),
(25, 'SEG2_DOT', 0, 2, 1, 6, NULL),
(26, 'SEG2_S1', 0, 2, 1, 7, NULL),
(27, 'SEG2_S2', 0, 2, 1, 8, NULL),
(28, 'SEG2_S3', 0, 2, 1, 9, NULL),
(29, 'SEG2_S4', 0, 2, 1, 10, NULL),
(30, 'key_col4', 0, 3, 0, 0, NULL),
(31, 'key_col3', 0, 3, 0, 1, NULL),
(32, 'key_col2', 0, 3, 0, 2, NULL),
(33, 'key_col1', 0, 3, 0, 3, NULL),
(34, 'key_row4', 0, 3, 0, 0, NULL),
(35, 'key_row3', 0, 3, 0, 1, NULL),
(36, 'key_row2', 0, 3, 0, 2, NULL),
(37, 'key_row1', 0, 3, 0, 3, NULL),
(38, 'SW_8', 0, 3, 1, 0, NULL),
(39, 'SW_7', 0, 3, 1, 1, NULL),
(40, 'SW_6', 0, 3, 1, 2, NULL),
(41, 'SW_5', 0, 3, 1, 3, NULL),
(42, 'SW_4', 0, 3, 1, 4, NULL),
(43, 'SW_3', 0, 3, 1, 5, NULL),
(44, 'SW_2', 0, 3, 1, 6, NULL),
(45, 'SW_1', 0, 3, 1, 7, NULL),
(46, 'SPK_N1', 1, 1, 0, 0, NULL),
(47, 'SPK_P1', 1, 1, 0, 1, NULL),
(48, 'SPK_N2', 1, 1, 0, 2, NULL),
(49, 'SPK_P2', 1, 1, 0, 3, NULL),
(50, 'M02', 1, 1, 0, 4, NULL),
(51, 'M01', 1, 1, 0, 5, NULL),
(52, '3.3v', 1, 1, 0, 6, NULL),
(53, 'M00', 1, 1, 0, 7, NULL),
(54, '3.3v', 1, 1, 0, 8, NULL),
(55, 'GND', 1, 1, 0, 9, NULL),
(56, 'DATA', 1, 1, 0, 10, NULL),
(57, 'GND', 1, 1, 0, 11, NULL),
(58, '5v', 1, 1, 0, 12, NULL),
(59, 'SCL1', 1, 1, 1, 0, NULL),
(60, 'SDA1', 1, 1, 1, 1, NULL),
(61, 'RES', 1, 1, 1, 2, NULL),
(62, 'SCL', 1, 1, 1, 3, NULL),
(63, 'SDA', 1, 1, 1, 4, NULL),
(64, 'GND', 1, 1, 1, 5, NULL),
(65, '3.3v', 1, 1, 1, 6, NULL),
(66, 'LCD_CLK', 1, 1, 1, 7, NULL),
(67, 'LCD_DAT', 1, 1, 1, 8, NULL),
(68, 'LCD_RES', 1, 1, 1, 9, NULL),
(69, 'LCD_DC', 1, 1, 1, 10, NULL),
(70, 'LCD_CS', 1, 1, 1, 11, NULL),
(71, 'LCD_BL', 1, 1, 1, 12, NULL),
(72, 'DOT_G5', 1, 2, 0, 0, NULL),
(73, 'DOT_R5', 1, 2, 0, 1, NULL),
(74, 'DOT_S5', 1, 2, 0, 2, NULL),
(75, 'DOT_G6', 1, 2, 0, 3, NULL),
(76, 'DOT_R6', 1, 2, 0, 4, NULL),
(77, 'DOT_S6', 1, 2, 0, 5, NULL),
(78, 'DOT_G7', 1, 2, 0, 6, NULL),
(79, 'DOT_R7', 1, 2, 0, 7, NULL),
(80, 'DOT_S7', 1, 2, 0, 8, NULL),
(81, 'DOT_G8', 1, 2, 0, 9, NULL),
(82, 'DOT_R8', 1, 2, 0, 10, NULL),
(83, 'DOT_S8', 1, 2, 0, 11, NULL),
(84, 'DOT_G1', 1, 2, 1, 0, NULL),
(85, 'DOT_R1', 1, 2, 1, 1, NULL),
(86, 'DOT_S1', 1, 2, 1, 2, NULL),
(87, 'DOT_G2', 1, 2, 1, 3, NULL),
(88, 'DOT_R2', 1, 2, 1, 4, NULL),
(89, 'DOT_S2', 1, 2, 1, 5, NULL),
(90, 'DOT_G3', 1, 2, 1, 6, NULL),
(91, 'DOT_R3', 1, 2, 1, 7, NULL),
(92, 'DOT_S3', 1, 2, 1, 8, NULL),
(93, 'DOT_G4', 1, 2, 1, 9, NULL),
(94, 'DOT_R4', 1, 2, 1, 10, NULL),
(95, 'DOT_S4', 1, 2, 1, 11, NULL),
(96, 'PWM2', 1, 3, 0, 0, NULL),
(97, 'PWM1', 1, 3, 0, 1, NULL),
(98, 'IN4', 1, 3, 0, 2, NULL),
(99, 'IN3', 1, 3, 0, 3, NULL),
(100, 'IN2', 1, 3, 0, 4, NULL),
(101, 'IN1', 1, 3, 0, 5, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `vhdl_io_map`
--

CREATE TABLE `vhdl_io_map` (
  `id` int(11) NOT NULL,
  `fpga_pin_id` int(11) DEFAULT NULL,
  `board_pin_id` int(11) DEFAULT NULL,
  `vhdl_name` text COLLATE utf8mb4_bin,
  `direction` int(1) DEFAULT NULL,
  `description` text COLLATE utf8mb4_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 資料表的匯出資料 `vhdl_io_map`
--

INSERT INTO `vhdl_io_map` (`id`, `fpga_pin_id`, `board_pin_id`, `vhdl_name`, `direction`, `description`) VALUES
(1, 49, 14, 'D7LED[7]', 1, '第一個七段顯示'),
(2, 45, NULL, 'D7LED[6]', 1, NULL),
(3, 43, 13, 'D7LED[5]', 1, '第一個七段顯示'),
(4, 39, 12, 'D7LED[4]', 1, '第一個七段顯示'),
(5, 37, 11, 'D7LED[3]', 1, '第一個七段顯示'),
(6, 21, 10, 'D7LED[2]', 1, '第一個七段顯示'),
(7, 13, 9, 'D7LED[1]', 1, '第一個七段顯示'),
(8, 6, 8, 'D7LED[0]', 1, '第一個七段顯示'),
(9, 166, NULL, 'DHT11_D_io', 0, NULL),
(10, 171, NULL, 'ki[3]', 0, NULL),
(11, 176, NULL, 'ki[2]', 0, NULL),
(12, 183, NULL, 'ki[1]', 0, NULL),
(13, 185, 41, 'ki[0]', 0, NULL),
(14, 197, 45, 'ko[3]', 1, NULL),
(15, 195, NULL, 'ko[2]', 1, NULL),
(16, 189, 43, 'ko[1]', 1, NULL),
(17, 187, 42, 'ko[0]', 1, NULL),
(18, NULL, NULL, 'koo', 1, NULL),
(19, 160, 53, 'L293D_1A', 1, NULL),
(20, 161, 101, 'L293D_2A', 1, NULL),
(21, 203, NULL, 'L293D_3A', 1, NULL),
(22, 164, NULL, 'L293D_4A', 1, NULL),
(23, 200, NULL, 'L293D_12EN', 1, NULL),
(24, 202, NULL, 'L293D_34EN', 1, NULL),
(25, 169, NULL, 'M7_0[7]', 0, NULL),
(26, 173, NULL, 'M7_0[6]', 0, NULL),
(27, 177, 31, 'M7_0[5]', 0, NULL),
(28, 184, 32, 'M7_0[4]', 0, NULL),
(29, 186, 33, 'M7_0[3]', 0, NULL),
(30, 188, 34, 'M7_0[2]', 0, NULL),
(31, 194, NULL, 'M7_0[1]', 0, NULL),
(32, 196, 44, 'M7_0[0]', 0, NULL),
(33, 145, NULL, 'S_RESET', 0, NULL),
(34, 52, 26, 'SCANo[7]', 1, NULL),
(35, 56, 27, 'SCANo[6]', 1, NULL),
(36, 63, NULL, 'SCANo[5]', 1, NULL),
(37, 69, NULL, 'SCANo[4]', 1, NULL),
(38, 51, NULL, 'SCANo[3]', 1, NULL),
(39, 55, 16, 'SCANo[2]', 1, '第一個七段顯示S2'),
(40, 57, 17, 'SCANo[1]', 1, '第一個七段顯示S3'),
(41, 68, 18, 'SCANo[0]', 1, '第一個七段顯示S4'),
(42, 149, NULL, 'SCLK', 0, NULL),
(43, 146, NULL, 'SD178BMI2C_SCL', 1, NULL),
(44, 144, 60, 'SD178BMI2C_SDA', 0, NULL),
(45, 159, NULL, 'SD178BMI2Ci_MO0', 0, NULL),
(46, 143, 62, 'SD178BMI2Co_reset', 1, NULL),
(47, NULL, NULL, 'SD178BMI2CP_3_3V_power[7]', 1, NULL),
(48, NULL, NULL, 'SD178BMI2CP_3_3V_power[6]', 1, NULL),
(49, NULL, NULL, 'SD178BMI2CP_3_3V_power[5]', 1, NULL),
(50, NULL, NULL, 'SD178BMI2CP_3_3V_power[4]', 1, NULL),
(51, NULL, NULL, 'SD178BMI2CP_3_3V_power[3]', 1, NULL),
(52, NULL, NULL, 'SD178BMI2CP_3_3V_power[2]', 1, NULL),
(53, NULL, NULL, 'SD178BMI2CP_3_3V_power[1]', 1, NULL),
(54, NULL, NULL, 'SD178BMI2CP_3_3V_power[0]', 1, NULL),
(55, 131, 71, 'st7735_BL', 1, NULL),
(56, 132, NULL, 'st7735_CS', 1, NULL),
(57, 133, 70, 'st7735_DC', 1, NULL),
(58, 134, 69, 'st7735_RESX', 1, NULL),
(59, 137, NULL, 'st7735_SCL', 1, NULL),
(60, 135, 68, 'st7735_SDA', 1, NULL),
(61, 201, NULL, 'TSL2561_INT', 0, NULL),
(62, 142, NULL, 'TSL2561_SCL', 1, NULL),
(63, 131, NULL, 'TSL2561_SDA', 0, NULL),
(64, 49, NULL, 'D7LED[7]', 1, NULL),
(65, 45, NULL, 'D7LED[6]', 1, NULL),
(66, 43, NULL, 'D7LED[5]', 1, NULL),
(67, 39, NULL, 'D7LED[4]', 1, NULL),
(68, 37, NULL, 'D7LED[3]', 1, NULL),
(69, 21, NULL, 'D7LED[2]', 1, NULL),
(70, 13, NULL, 'D7LED[1]', 1, NULL),
(71, 6, NULL, 'D7LED[0]', 1, NULL),
(72, 166, NULL, 'DHT11_D_io', 0, NULL),
(73, 171, NULL, 'ki[3]', 0, NULL),
(74, 176, NULL, 'ki[2]', 0, NULL),
(75, 183, NULL, 'ki[1]', 0, NULL),
(76, 185, NULL, 'ki[0]', 0, NULL),
(77, 197, NULL, 'ko[3]', 1, NULL),
(78, 195, NULL, 'ko[2]', 1, NULL),
(79, 189, 35, 'ko[1]', 1, NULL),
(80, 187, NULL, 'ko[0]', 1, NULL),
(81, NULL, NULL, 'koo', 1, NULL),
(82, 160, NULL, 'L293D_1A', 1, NULL),
(83, 161, NULL, 'L293D_2A', 1, NULL),
(84, 203, NULL, 'L293D_3A', 1, NULL),
(85, 164, NULL, 'L293D_4A', 1, NULL),
(86, 200, NULL, 'L293D_12EN', 1, NULL),
(87, 202, NULL, 'L293D_34EN', 1, NULL),
(88, 169, NULL, 'M7_0[7]', 0, NULL),
(89, 173, NULL, 'M7_0[6]', 0, NULL),
(90, 177, NULL, 'M7_0[5]', 0, NULL),
(91, 184, NULL, 'M7_0[4]', 0, NULL),
(92, 186, NULL, 'M7_0[3]', 0, NULL),
(93, 188, NULL, 'M7_0[2]', 0, NULL),
(94, 194, NULL, 'M7_0[1]', 0, NULL),
(95, 196, 36, 'M7_0[0]', 0, NULL),
(96, 145, NULL, 'S_RESET', 0, NULL),
(97, 52, NULL, 'SCANo[7]', 1, NULL),
(98, 56, NULL, 'SCANo[6]', 1, NULL),
(99, 63, NULL, 'SCANo[5]', 1, NULL),
(100, 69, NULL, 'SCANo[4]', 1, NULL),
(101, 51, NULL, 'SCANo[3]', 1, NULL),
(102, 55, NULL, 'SCANo[2]', 1, NULL),
(103, 57, NULL, 'SCANo[1]', 1, NULL),
(104, 68, NULL, 'SCANo[0]', 1, NULL),
(105, 149, NULL, 'SCLK', 0, NULL),
(106, 146, NULL, 'SD178BMI2C_SCL', 1, NULL),
(107, 144, 61, 'SD178BMI2C_SDA', 0, NULL),
(108, 159, NULL, 'SD178BMI2Ci_MO0', 0, NULL),
(109, 143, NULL, 'SD178BMI2Co_reset', 1, NULL),
(110, NULL, NULL, 'SD178BMI2CP_3_3V_power[7]', 1, NULL),
(111, NULL, NULL, 'SD178BMI2CP_3_3V_power[6]', 1, NULL),
(112, NULL, NULL, 'SD178BMI2CP_3_3V_power[5]', 1, NULL),
(113, NULL, NULL, 'SD178BMI2CP_3_3V_power[4]', 1, NULL),
(114, NULL, NULL, 'SD178BMI2CP_3_3V_power[3]', 1, NULL),
(115, NULL, NULL, 'SD178BMI2CP_3_3V_power[2]', 1, NULL),
(116, NULL, NULL, 'SD178BMI2CP_3_3V_power[1]', 1, NULL),
(117, NULL, NULL, 'SD178BMI2CP_3_3V_power[0]', 1, NULL),
(118, 131, NULL, 'st7735_BL', 1, NULL),
(119, 132, NULL, 'st7735_CS', 1, NULL),
(120, 133, NULL, 'st7735_DC', 1, NULL),
(121, 134, NULL, 'st7735_RESX', 1, NULL),
(122, 137, NULL, 'st7735_SCL', 1, NULL),
(123, 135, NULL, 'st7735_SDA', 1, NULL),
(124, 201, NULL, 'TSL2561_INT', 0, NULL),
(125, 142, NULL, 'TSL2561_SCL', 1, NULL),
(126, 131, NULL, 'TSL2561_SDA', 0, NULL),
(127, NULL, 2, NULL, NULL, NULL),
(128, NULL, 3, NULL, NULL, NULL),
(129, 231, 2, NULL, NULL, NULL),
(130, 225, 3, NULL, NULL, NULL),
(131, 222, 4, NULL, NULL, NULL),
(132, 219, 5, NULL, NULL, NULL),
(133, 217, 6, NULL, NULL, NULL),
(134, 208, 7, NULL, NULL, NULL),
(135, 50, 25, NULL, NULL, NULL),
(136, 9, 19, NULL, NULL, NULL),
(137, 18, 20, NULL, NULL, NULL),
(138, 22, 21, NULL, NULL, NULL),
(139, 38, 22, NULL, NULL, NULL),
(140, 41, 23, NULL, NULL, NULL),
(141, 44, 24, NULL, NULL, NULL),
(142, 178, 40, NULL, NULL, NULL),
(143, 174, 39, NULL, NULL, NULL),
(144, 170, 38, NULL, NULL, NULL),
(145, 172, 30, NULL, NULL, NULL),
(146, 198, 37, NULL, NULL, NULL),
(147, 167, 56, NULL, NULL, NULL),
(148, 165, 98, NULL, NULL, NULL),
(149, 162, 100, NULL, NULL, NULL),
(150, 147, 59, NULL, NULL, NULL),
(151, 140, 63, NULL, NULL, NULL),
(152, 138, 66, NULL, NULL, NULL),
(153, 136, 67, NULL, NULL, NULL),
(154, 128, 82, NULL, NULL, NULL),
(155, 111, 81, NULL, NULL, NULL),
(156, 126, 79, NULL, NULL, NULL),
(157, 107, 78, NULL, NULL, NULL),
(158, 117, 76, NULL, NULL, NULL),
(159, 103, 75, NULL, NULL, NULL),
(160, 113, 73, NULL, NULL, NULL),
(161, 99, 72, NULL, NULL, NULL),
(162, 19, 20, NULL, NULL, NULL),
(163, 241, 8, NULL, NULL, NULL),
(164, 1, 1, NULL, NULL, NULL);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `fpga`
--
ALTER TABLE `fpga`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `side_board`
--
ALTER TABLE `side_board`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `vhdl_io_map`
--
ALTER TABLE `vhdl_io_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fpga_pin_id` (`fpga_pin_id`,`board_pin_id`),
  ADD KEY `board_pin_id` (`board_pin_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `fpga`
--
ALTER TABLE `fpga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- 使用資料表 AUTO_INCREMENT `side_board`
--
ALTER TABLE `side_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- 使用資料表 AUTO_INCREMENT `vhdl_io_map`
--
ALTER TABLE `vhdl_io_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `vhdl_io_map`
--
ALTER TABLE `vhdl_io_map`
  ADD CONSTRAINT `vhdl_io_map_ibfk_1` FOREIGN KEY (`fpga_pin_id`) REFERENCES `fpga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vhdl_io_map_ibfk_2` FOREIGN KEY (`board_pin_id`) REFERENCES `side_board` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
