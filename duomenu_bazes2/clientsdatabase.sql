-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 02, 2021 at 08:49 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_lithuanian_ci NOT NULL,
  `surname` varchar(60) COLLATE utf8_lithuanian_ci NOT NULL,
  `date_joined` date NOT NULL,
  `perks_id` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=411 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ID`, `name`, `surname`, `date_joined`, `perks_id`) VALUES
(1, 'vardas1', 'pavarde1', '2021-08-21', 5),
(2, 'vardas2', 'pavarde2', '2021-08-21', 5),
(3, 'vardas3', 'pavarde3', '2021-08-21', 5),
(4, 'vardas4', 'pavarde4', '2021-08-21', 5),
(5, 'vardas5', 'pavarde5', '2021-08-21', 5),
(7, 'vardas7', 'pavarde7', '2021-08-21', 5),
(8, 'vardas8', 'pavarde8', '2021-08-21', 5),
(9, 'vardas9', 'pavarde9', '2021-08-21', 5),
(10, 'vardas10', 'pavarde10', '2021-08-21', 5),
(11, 'vardas11', 'pavarde11', '2021-08-21', 5),
(12, 'vardas12', 'pavarde12', '2021-08-21', 5),
(13, 'vardas13', 'pavarde13', '2021-08-21', 5),
(14, 'vardas14', 'pavarde14', '2021-08-21', 5),
(15, 'vardas15', 'pavarde15', '2021-08-21', 5),
(16, 'vardas16', 'pavarde16', '2021-08-21', 5),
(17, 'vardas17', 'pavarde17', '2021-08-21', 5),
(18, 'vardas18', 'pavarde18', '2021-08-21', 5),
(19, 'vardas19', 'pavarde19', '2021-08-21', 5),
(20, 'vardas20', 'pavarde20', '2021-08-21', 5),
(21, 'vardas21', 'pavarde21', '2021-08-21', 5),
(22, 'vardas22', 'pavarde22', '2021-08-21', 5),
(23, 'vardas23', 'pavarde23', '2021-08-21', 5),
(24, 'vardas24', 'pavarde24', '2021-08-21', 5),
(25, 'vardas25', 'pavarde25', '2021-08-21', 5),
(26, 'vardas26', 'pavarde26', '2021-08-21', 5),
(27, 'vardas27', 'pavarde27', '2021-08-21', 5),
(28, 'vardas28', 'pavarde28', '2021-08-21', 5),
(29, 'vardas29', 'pavarde29', '2021-08-21', 5),
(30, 'vardas30', 'pavarde30', '2021-08-21', 5),
(31, 'vardas31', 'pavarde31', '2021-08-21', 5),
(32, 'vardas32', 'pavarde32', '2021-08-21', 5),
(33, 'vardas33', 'pavarde33', '2021-08-21', 5),
(34, 'vardas34', 'pavarde34', '2021-08-21', 5),
(35, 'vardas35', 'pavarde35', '2021-08-21', 5),
(36, 'vardas36', 'pavarde36', '2021-08-21', 5),
(37, 'vardas37', 'pavarde37', '2021-08-21', 5),
(38, 'vardas38', 'pavarde38', '2021-08-21', 5),
(39, 'vardas39', 'pavarde39', '2021-08-21', 5),
(40, 'vardas40', 'pavarde40', '2021-08-21', 5),
(41, 'vardas41', 'pavarde41', '2021-08-21', 5),
(42, 'vardas42', 'pavarde42', '2021-08-21', 5),
(43, 'vardas43', 'pavarde43', '2021-08-21', 5),
(44, 'vardas44', 'pavarde44', '2021-08-21', 5),
(45, 'vardas45', 'pavarde45', '2021-08-21', 5),
(46, 'vardas46', 'pavarde46', '2021-08-21', 5),
(47, 'vardas47', 'pavarde47', '2021-08-21', 5),
(48, 'vardas48', 'pavarde48', '2021-08-21', 5),
(49, 'vardas49', 'pavarde49', '2021-08-21', 5),
(50, 'vardas50', 'pavarde50', '2021-08-21', 5),
(51, 'vardas51', 'pavarde51', '2021-08-21', 5),
(52, 'vardas52', 'pavarde52', '2021-08-21', 5),
(53, 'vardas53', 'pavarde53', '2021-08-21', 5),
(54, 'vardas54', 'pavarde54', '2021-08-21', 5),
(55, 'vardas55', 'pavarde55', '2021-08-21', 5),
(56, 'vardas56', 'pavarde56', '2021-08-21', 5),
(57, 'vardas57', 'pavarde57', '2021-08-21', 5),
(58, 'vardas58', 'pavarde58', '2021-08-21', 5),
(59, 'vardas59', 'pavarde59', '2021-08-21', 5),
(60, 'vardas60', 'pavarde60', '2021-08-21', 5),
(61, 'vardas61', 'pavarde61', '2021-08-21', 5),
(62, 'vardas62', 'pavarde62', '2021-08-21', 5),
(63, 'vardas63', 'pavarde63', '2021-08-21', 5),
(64, 'vardas64', 'pavarde64', '2021-08-21', 5),
(65, 'vardas65', 'pavarde65', '2021-08-21', 5),
(66, 'vardas66', 'pavarde66', '2021-08-21', 5),
(67, 'vardas67', 'pavarde67', '2021-08-21', 5),
(68, 'vardas68', 'pavarde68', '2021-08-21', 5),
(69, 'vardas69', 'pavarde69', '2021-08-21', 5),
(70, 'vardas70', 'pavarde70', '2021-08-21', 5),
(71, 'vardas71', 'pavarde71', '2021-08-21', 5),
(72, 'vardas72', 'pavarde72', '2021-08-21', 5),
(73, 'vardas73', 'pavarde73', '2021-08-21', 5),
(74, 'vardas74', 'pavarde74', '2021-08-21', 5),
(75, 'vardas75', 'pavarde75', '2021-08-21', 5),
(76, 'vardas76', 'pavarde76', '2021-08-21', 5),
(77, 'vardas77', 'pavarde77', '2021-08-21', 5),
(78, 'vardas78', 'pavarde78', '2021-08-21', 5),
(79, 'vardas79', 'pavarde79', '2021-08-21', 5),
(80, 'vardas80', 'pavarde80', '2021-08-21', 5),
(81, 'vardas81', 'pavarde81', '2021-08-21', 5),
(82, 'vardas82', 'pavarde82', '2021-08-21', 5),
(83, 'vardas83', 'pavarde83', '2021-08-21', 5),
(84, 'vardas84', 'pavarde84', '2021-08-21', 5),
(85, 'vardas85', 'pavarde85', '2021-08-21', 5),
(86, 'vardas86', 'pavarde86', '2021-08-21', 5),
(87, 'vardas87', 'pavarde87', '2021-08-21', 5),
(88, 'vardas88', 'pavarde88', '2021-08-21', 5),
(89, 'vardas89', 'pavarde89', '2021-08-21', 5),
(90, 'vardas90', 'pavarde90', '2021-08-21', 5),
(91, 'vardas91', 'pavarde91', '2021-08-21', 5),
(92, 'vardas92', 'pavarde92', '2021-08-21', 5),
(93, 'vardas93', 'pavarde93', '2021-08-21', 5),
(94, 'vardas94', 'pavarde94', '2021-08-21', 5),
(95, 'vardas95', 'pavarde95', '2021-08-21', 5),
(96, 'vardas96', 'pavarde96', '2021-08-21', 5),
(97, 'vardas97', 'pavarde97', '2021-08-21', 5),
(98, 'vardas98', 'pavarde98', '2021-08-21', 5),
(99, 'vardas99', 'pavarde99', '2021-08-21', 5),
(100, 'vardas100', 'pavarde100', '2021-08-21', 5),
(101, 'vardas101', 'pavarde101', '2021-08-21', 5),
(102, 'vardas102', 'pavarde102', '2021-08-21', 5),
(103, 'vardas103', 'pavarde103', '2021-08-21', 5),
(104, 'vardas104', 'pavarde104', '2021-08-21', 5),
(105, 'vardas105', 'pavarde105', '2021-08-21', 5),
(106, 'vardas106', 'pavarde106', '2021-08-21', 5),
(107, 'vardas107', 'pavarde107', '2021-08-21', 5),
(108, 'vardas108', 'pavarde108', '2021-08-21', 5),
(109, 'vardas109', 'pavarde109', '2021-08-21', 5),
(110, 'vardas110', 'pavarde110', '2021-08-21', 5),
(111, 'vardas111', 'pavarde111', '2021-08-21', 5),
(112, 'vardas112', 'pavarde112', '2021-08-21', 5),
(113, 'vardas113', 'pavarde113', '2021-08-21', 5),
(114, 'vardas114', 'pavarde114', '2021-08-21', 5),
(115, 'vardas115', 'pavarde115', '2021-08-21', 5),
(116, 'vardas116', 'pavarde116', '2021-08-21', 5),
(117, 'vardas117', 'pavarde117', '2021-08-21', 5),
(118, 'vardas118', 'pavarde118', '2021-08-21', 5),
(119, 'vardas119', 'pavarde119', '2021-08-21', 5),
(120, 'vardas120', 'pavarde120', '2021-08-21', 5),
(121, 'vardas121', 'pavarde121', '2021-08-21', 5),
(122, 'vardas122', 'pavarde122', '2021-08-21', 5),
(123, 'vardas123', 'pavarde123', '2021-08-21', 5),
(124, 'vardas124', 'pavarde124', '2021-08-21', 5),
(125, 'vardas125', 'pavarde125', '2021-08-21', 5),
(126, 'vardas126', 'pavarde126', '2021-08-21', 5),
(127, 'vardas127', 'pavarde127', '2021-08-21', 5),
(128, 'vardas128', 'pavarde128', '2021-08-21', 5),
(129, 'vardas129', 'pavarde129', '2021-08-21', 5),
(130, 'vardas130', 'pavarde130', '2021-08-21', 5),
(131, 'vardas131', 'pavarde131', '2021-08-21', 5),
(132, 'vardas132', 'pavarde132', '2021-08-21', 5),
(133, 'vardas133', 'pavarde133', '2021-08-21', 5),
(134, 'vardas134', 'pavarde134', '2021-08-21', 5),
(135, 'vardas135', 'pavarde135', '2021-08-21', 5),
(136, 'vardas136', 'pavarde136', '2021-08-21', 5),
(137, 'vardas137', 'pavarde137', '2021-08-21', 5),
(138, 'vardas138', 'pavarde138', '2021-08-21', 5),
(139, 'vardas139', 'pavarde139', '2021-08-21', 5),
(140, 'vardas140', 'pavarde140', '2021-08-21', 5),
(141, 'vardas141', 'pavarde141', '2021-08-21', 5),
(142, 'vardas142', 'pavarde142', '2021-08-21', 5),
(143, 'vardas143', 'pavarde143', '2021-08-21', 5),
(144, 'vardas144', 'pavarde144', '2021-08-21', 5),
(145, 'vardas145', 'pavarde145', '2021-08-21', 5),
(146, 'vardas146', 'pavarde146', '2021-08-21', 5),
(147, 'vardas147', 'pavarde147', '2021-08-21', 5),
(148, 'vardas148', 'pavarde148', '2021-08-21', 5),
(149, 'vardas149', 'pavarde149', '2021-08-21', 5),
(150, 'vardas150', 'pavarde150', '2021-08-21', 5),
(151, 'vardas151', 'pavarde151', '2021-08-21', 5),
(152, 'vardas152', 'pavarde152', '2021-08-21', 5),
(153, 'vardas153', 'pavarde153', '2021-08-21', 5),
(154, 'vardas154', 'pavarde154', '2021-08-21', 5),
(155, 'vardas155', 'pavarde155', '2021-08-21', 5),
(156, 'vardas156', 'pavarde156', '2021-08-21', 5),
(157, 'vardas157', 'pavarde157', '2021-08-21', 5),
(158, 'vardas158', 'pavarde158', '2021-08-21', 5),
(159, 'vardas159', 'pavarde159', '2021-08-21', 5),
(160, 'vardas160', 'pavarde160', '2021-08-21', 5),
(161, 'vardas161', 'pavarde161', '2021-08-21', 5),
(162, 'vardas162', 'pavarde162', '2021-08-21', 5),
(163, 'vardas163', 'pavarde163', '2021-08-21', 5),
(164, 'vardas164', 'pavarde164', '2021-08-21', 5),
(165, 'vardas165', 'pavarde165', '2021-08-21', 5),
(166, 'vardas166', 'pavarde166', '2021-08-21', 5),
(167, 'vardas167', 'pavarde167', '2021-08-21', 5),
(168, 'vardas168', 'pavarde168', '2021-08-21', 5),
(169, 'vardas169', 'pavarde169', '2021-08-21', 5),
(170, 'vardas170', 'pavarde170', '2021-08-21', 5),
(171, 'vardas171', 'pavarde171', '2021-08-21', 5),
(172, 'vardas172', 'pavarde172', '2021-08-21', 5),
(173, 'vardas173', 'pavarde173', '2021-08-21', 5),
(174, 'vardas174', 'pavarde174', '2021-08-21', 5),
(175, 'vardas175', 'pavarde175', '2021-08-21', 5),
(176, 'vardas176', 'pavarde176', '2021-08-21', 5),
(177, 'vardas177', 'pavarde177', '2021-08-21', 5),
(178, 'vardas178', 'pavarde178', '2021-08-21', 5),
(179, 'vardas179', 'pavarde179', '2021-08-21', 5),
(180, 'vardas180', 'pavarde180', '2021-08-21', 5),
(181, 'vardas181', 'pavarde181', '2021-08-21', 5),
(182, 'vardas182', 'pavarde182', '2021-08-21', 5),
(183, 'vardas183', 'pavarde183', '2021-08-21', 5),
(184, 'vardas184', 'pavarde184', '2021-08-21', 5),
(185, 'vardas185', 'pavarde185', '2021-08-21', 5),
(186, 'vardas186', 'pavarde186', '2021-08-21', 5),
(187, 'vardas187', 'pavarde187', '2021-08-21', 5),
(188, 'vardas188', 'pavarde188', '2021-08-21', 5),
(189, 'vardas189', 'pavarde189', '2021-08-21', 5),
(190, 'vardas190', 'pavarde190', '2021-08-21', 5),
(191, 'vardas191', 'pavarde191', '2021-08-21', 5),
(192, 'vardas192', 'pavarde192', '2021-08-21', 5),
(193, 'vardas193', 'pavarde193', '2021-08-21', 5),
(194, 'vardas194', 'pavarde194', '2021-08-21', 5),
(195, 'vardas195', 'pavarde195', '2021-08-21', 5),
(196, 'vardas196', 'pavarde196', '2021-08-21', 5),
(197, 'vardas197', 'pavarde197', '2021-08-21', 5),
(198, 'vardas198', 'pavarde198', '2021-08-21', 5),
(203, 'admin', 'Piter', '2021-08-06', 5),
(211, 'vardas1', 'pavarde1', '2021-09-01', 5),
(212, 'vardas2', 'pavarde2', '2021-09-01', 5),
(213, 'vardas3', 'pavarde3', '2021-09-01', 2),
(214, 'vardas4', 'pavarde4', '2021-09-01', 3),
(215, 'vardas5', 'pavarde5', '2021-09-01', 2),
(216, 'vardas6', 'pavarde6', '2021-09-01', 3),
(217, 'vardas7', 'pavarde7', '2021-09-01', 1),
(218, 'vardas8', 'pavarde8', '2021-09-01', 2),
(219, 'vardas9', 'pavarde9', '2021-09-01', 5),
(220, 'vardas10', 'pavarde10', '2021-09-01', 1),
(221, 'vardas11', 'pavarde11', '2021-09-01', 5),
(222, 'vardas12', 'pavarde12', '2021-09-01', 3),
(223, 'vardas13', 'pavarde13', '2021-09-01', 1),
(224, 'vardas14', 'pavarde14', '2021-09-01', 1),
(225, 'vardas15', 'pavarde15', '2021-09-01', 2),
(226, 'vardas16', 'pavarde16', '2021-09-01', 1),
(227, 'vardas17', 'pavarde17', '2021-09-01', 1),
(228, 'vardas18', 'pavarde18', '2021-09-01', 3),
(229, 'vardas19', 'pavarde19', '2021-09-01', 3),
(230, 'vardas20', 'pavarde20', '2021-09-01', 4),
(231, 'vardas21', 'pavarde21', '2021-09-01', 3),
(232, 'vardas22', 'pavarde22', '2021-09-01', 5),
(233, 'vardas23', 'pavarde23', '2021-09-01', 5),
(234, 'vardas24', 'pavarde24', '2021-09-01', 5),
(235, 'vardas25', 'pavarde25', '2021-09-01', 5),
(236, 'vardas26', 'pavarde26', '2021-09-01', 1),
(237, 'vardas27', 'pavarde27', '2021-09-01', 1),
(238, 'vardas28', 'pavarde28', '2021-09-01', 1),
(239, 'vardas29', 'pavarde29', '2021-09-01', 5),
(240, 'vardas30', 'pavarde30', '2021-09-01', 1),
(241, 'vardas31', 'pavarde31', '2021-09-01', 4),
(242, 'vardas32', 'pavarde32', '2021-09-01', 5),
(243, 'vardas33', 'pavarde33', '2021-09-01', 4),
(244, 'vardas34', 'pavarde34', '2021-09-01', 3),
(245, 'vardas35', 'pavarde35', '2021-09-01', 4),
(246, 'vardas36', 'pavarde36', '2021-09-01', 3),
(247, 'vardas37', 'pavarde37', '2021-09-01', 3),
(248, 'vardas38', 'pavarde38', '2021-09-01', 1),
(249, 'vardas39', 'pavarde39', '2021-09-01', 5),
(250, 'vardas40', 'pavarde40', '2021-09-01', 5),
(251, 'vardas41', 'pavarde41', '2021-09-01', 1),
(252, 'vardas42', 'pavarde42', '2021-09-01', 5),
(253, 'vardas43', 'pavarde43', '2021-09-01', 2),
(254, 'vardas44', 'pavarde44', '2021-09-01', 1),
(255, 'vardas45', 'pavarde45', '2021-09-01', 3),
(256, 'vardas46', 'pavarde46', '2021-09-01', 3),
(257, 'vardas47', 'pavarde47', '2021-09-01', 2),
(258, 'vardas48', 'pavarde48', '2021-09-01', 3),
(259, 'vardas49', 'pavarde49', '2021-09-01', 3),
(260, 'vardas50', 'pavarde50', '2021-09-01', 2),
(261, 'vardas51', 'pavarde51', '2021-09-01', 1),
(262, 'vardas52', 'pavarde52', '2021-09-01', 5),
(263, 'vardas53', 'pavarde53', '2021-09-01', 2),
(264, 'vardas54', 'pavarde54', '2021-09-01', 1),
(265, 'vardas55', 'pavarde55', '2021-09-01', 3),
(266, 'vardas56', 'pavarde56', '2021-09-01', 4),
(267, 'vardas57', 'pavarde57', '2021-09-01', 4),
(268, 'vardas58', 'pavarde58', '2021-09-01', 1),
(269, 'vardas59', 'pavarde59', '2021-09-01', 5),
(270, 'vardas60', 'pavarde60', '2021-09-01', 5),
(271, 'vardas61', 'pavarde61', '2021-09-01', 3),
(272, 'vardas62', 'pavarde62', '2021-09-01', 2),
(273, 'vardas63', 'pavarde63', '2021-09-01', 3),
(274, 'vardas64', 'pavarde64', '2021-09-01', 1),
(275, 'vardas65', 'pavarde65', '2021-09-01', 2),
(276, 'vardas66', 'pavarde66', '2021-09-01', 4),
(277, 'vardas67', 'pavarde67', '2021-09-01', 3),
(278, 'vardas68', 'pavarde68', '2021-09-01', 5),
(279, 'vardas69', 'pavarde69', '2021-09-01', 1),
(280, 'vardas70', 'pavarde70', '2021-09-01', 3),
(281, 'vardas71', 'pavarde71', '2021-09-01', 4),
(282, 'vardas72', 'pavarde72', '2021-09-01', 4),
(283, 'vardas73', 'pavarde73', '2021-09-01', 4),
(284, 'vardas74', 'pavarde74', '2021-09-01', 5),
(285, 'vardas75', 'pavarde75', '2021-09-01', 1),
(286, 'vardas76', 'pavarde76', '2021-09-01', 1),
(287, 'vardas77', 'pavarde77', '2021-09-01', 2),
(288, 'vardas78', 'pavarde78', '2021-09-01', 1),
(289, 'vardas79', 'pavarde79', '2021-09-01', 3),
(290, 'vardas80', 'pavarde80', '2021-09-01', 1),
(291, 'vardas81', 'pavarde81', '2021-09-01', 4),
(292, 'vardas82', 'pavarde82', '2021-09-01', 2),
(293, 'vardas83', 'pavarde83', '2021-09-01', 2),
(294, 'vardas84', 'pavarde84', '2021-09-01', 2),
(295, 'vardas85', 'pavarde85', '2021-09-01', 5),
(296, 'vardas86', 'pavarde86', '2021-09-01', 3),
(297, 'vardas87', 'pavarde87', '2021-09-01', 5),
(298, 'vardas88', 'pavarde88', '2021-09-01', 1),
(299, 'vardas89', 'pavarde89', '2021-09-01', 2),
(300, 'vardas90', 'pavarde90', '2021-09-01', 5),
(301, 'vardas91', 'pavarde91', '2021-09-01', 2),
(302, 'vardas92', 'pavarde92', '2021-09-01', 2),
(303, 'vardas93', 'pavarde93', '2021-09-01', 3),
(304, 'vardas94', 'pavarde94', '2021-09-01', 3),
(305, 'vardas95', 'pavarde95', '2021-09-01', 5),
(306, 'vardas96', 'pavarde96', '2021-09-01', 3),
(307, 'vardas97', 'pavarde97', '2021-09-01', 2),
(308, 'vardas98', 'pavarde98', '2021-09-01', 2),
(309, 'vardas99', 'pavarde99', '2021-09-01', 5),
(310, 'vardas100', 'pavarde100', '2021-09-01', 2),
(311, 'vardas101', 'pavarde101', '2021-09-01', 5),
(312, 'vardas102', 'pavarde102', '2021-09-01', 1),
(313, 'vardas103', 'pavarde103', '2021-09-01', 2),
(314, 'vardas104', 'pavarde104', '2021-09-01', 2),
(315, 'vardas105', 'pavarde105', '2021-09-01', 5),
(316, 'vardas106', 'pavarde106', '2021-09-01', 1),
(317, 'vardas107', 'pavarde107', '2021-09-01', 5),
(318, 'vardas108', 'pavarde108', '2021-09-01', 5),
(319, 'vardas109', 'pavarde109', '2021-09-01', 3),
(320, 'vardas110', 'pavarde110', '2021-09-01', 2),
(321, 'vardas111', 'pavarde111', '2021-09-01', 2),
(322, 'vardas112', 'pavarde112', '2021-09-01', 1),
(323, 'vardas113', 'pavarde113', '2021-09-01', 2),
(324, 'vardas114', 'pavarde114', '2021-09-01', 1),
(325, 'vardas115', 'pavarde115', '2021-09-01', 1),
(326, 'vardas116', 'pavarde116', '2021-09-01', 1),
(327, 'vardas117', 'pavarde117', '2021-09-01', 5),
(328, 'vardas118', 'pavarde118', '2021-09-01', 4),
(329, 'vardas119', 'pavarde119', '2021-09-01', 2),
(330, 'vardas120', 'pavarde120', '2021-09-01', 5),
(331, 'vardas121', 'pavarde121', '2021-09-01', 5),
(332, 'vardas122', 'pavarde122', '2021-09-01', 4),
(333, 'vardas123', 'pavarde123', '2021-09-01', 3),
(334, 'vardas124', 'pavarde124', '2021-09-01', 5),
(335, 'vardas125', 'pavarde125', '2021-09-01', 2),
(336, 'vardas126', 'pavarde126', '2021-09-01', 1),
(337, 'vardas127', 'pavarde127', '2021-09-01', 2),
(338, 'vardas128', 'pavarde128', '2021-09-01', 3),
(339, 'vardas129', 'pavarde129', '2021-09-01', 1),
(340, 'vardas130', 'pavarde130', '2021-09-01', 1),
(341, 'vardas131', 'pavarde131', '2021-09-01', 4),
(342, 'vardas132', 'pavarde132', '2021-09-01', 2),
(343, 'vardas133', 'pavarde133', '2021-09-01', 3),
(344, 'vardas134', 'pavarde134', '2021-09-01', 1),
(345, 'vardas135', 'pavarde135', '2021-09-01', 5),
(346, 'vardas136', 'pavarde136', '2021-09-01', 2),
(347, 'vardas137', 'pavarde137', '2021-09-01', 2),
(348, 'vardas138', 'pavarde138', '2021-09-01', 5),
(349, 'vardas139', 'pavarde139', '2021-09-01', 4),
(350, 'vardas140', 'pavarde140', '2021-09-01', 2),
(351, 'vardas141', 'pavarde141', '2021-09-01', 3),
(352, 'vardas142', 'pavarde142', '2021-09-01', 5),
(353, 'vardas143', 'pavarde143', '2021-09-01', 5),
(354, 'vardas144', 'pavarde144', '2021-09-01', 2),
(355, 'vardas145', 'pavarde145', '2021-09-01', 3),
(356, 'vardas146', 'pavarde146', '2021-09-01', 4),
(357, 'vardas147', 'pavarde147', '2021-09-01', 5),
(358, 'vardas148', 'pavarde148', '2021-09-01', 1),
(359, 'vardas149', 'pavarde149', '2021-09-01', 5),
(360, 'vardas150', 'pavarde150', '2021-09-01', 4),
(361, 'vardas151', 'pavarde151', '2021-09-01', 5),
(362, 'vardas152', 'pavarde152', '2021-09-01', 4),
(363, 'vardas153', 'pavarde153', '2021-09-01', 2),
(364, 'vardas154', 'pavarde154', '2021-09-01', 1),
(365, 'vardas155', 'pavarde155', '2021-09-01', 1),
(366, 'vardas156', 'pavarde156', '2021-09-01', 1),
(367, 'vardas157', 'pavarde157', '2021-09-01', 5),
(368, 'vardas158', 'pavarde158', '2021-09-01', 1),
(369, 'vardas159', 'pavarde159', '2021-09-01', 1),
(370, 'vardas160', 'pavarde160', '2021-09-01', 5),
(371, 'vardas161', 'pavarde161', '2021-09-01', 5),
(372, 'vardas162', 'pavarde162', '2021-09-01', 1),
(373, 'vardas163', 'pavarde163', '2021-09-01', 1),
(374, 'vardas164', 'pavarde164', '2021-09-01', 2),
(375, 'vardas165', 'pavarde165', '2021-09-01', 4),
(376, 'vardas166', 'pavarde166', '2021-09-01', 3),
(377, 'vardas167', 'pavarde167', '2021-09-01', 4),
(378, 'vardas168', 'pavarde168', '2021-09-01', 2),
(379, 'vardas169', 'pavarde169', '2021-09-01', 1),
(380, 'vardas170', 'pavarde170', '2021-09-01', 5),
(381, 'vardas171', 'pavarde171', '2021-09-01', 4),
(382, 'vardas172', 'pavarde172', '2021-09-01', 5),
(383, 'vardas173', 'pavarde173', '2021-09-01', 1),
(384, 'vardas174', 'pavarde174', '2021-09-01', 2),
(385, 'vardas175', 'pavarde175', '2021-09-01', 4),
(386, 'vardas176', 'pavarde176', '2021-09-01', 1),
(387, 'vardas177', 'pavarde177', '2021-09-01', 3),
(388, 'vardas178', 'pavarde178', '2021-09-01', 2),
(389, 'vardas179', 'pavarde179', '2021-09-01', 5),
(390, 'vardas180', 'pavarde180', '2021-09-01', 1),
(391, 'vardas181', 'pavarde181', '2021-09-01', 4),
(392, 'vardas182', 'pavarde182', '2021-09-01', 1),
(393, 'vardas183', 'pavarde183', '2021-09-01', 3),
(394, 'vardas184', 'pavarde184', '2021-09-01', 5),
(395, 'vardas185', 'pavarde185', '2021-09-01', 4),
(396, 'vardas186', 'pavarde186', '2021-09-01', 2),
(397, 'vardas187', 'pavarde187', '2021-09-01', 3),
(398, 'vardas188', 'pavarde188', '2021-09-01', 2),
(399, 'vardas189', 'pavarde189', '2021-09-01', 1),
(400, 'vardas190', 'pavarde190', '2021-09-01', 5),
(401, 'vardas191', 'pavarde191', '2021-09-01', 3),
(402, 'vardas192', 'pavarde192', '2021-09-01', 2),
(403, 'vardas193', 'pavarde193', '2021-09-01', 3),
(404, 'vardas194', 'pavarde194', '2021-09-01', 5),
(405, 'vardas195', 'pavarde195', '2021-09-01', 2),
(406, 'vardas196', 'pavarde196', '2021-09-01', 5),
(407, 'vardas197', 'pavarde197', '2021-09-01', 3),
(408, 'vardas198', 'pavarde198', '2021-09-01', 2),
(409, 'vardas199', 'pavarde199', '2021-09-01', 1),
(410, 'vardas200', 'pavarde200', '2021-09-01', 5);

-- --------------------------------------------------------

--
-- Table structure for table `clients_perks`
--

DROP TABLE IF EXISTS `clients_perks`;
CREATE TABLE IF NOT EXISTS `clients_perks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_lithuanian_ci NOT NULL,
  `value` varchar(60) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `clients_perks`
--

INSERT INTO `clients_perks` (`ID`, `name`, `value`) VALUES
(1, '5', 'naujas klientas'),
(2, '1', 'klientas'),
(3, '2', 'ilgalaikis klientas'),
(4, '3', 'Vip klientas'),
(5, '4', 'Juodasis klientas');

-- --------------------------------------------------------

--
-- Table structure for table `clients_sorting`
--

DROP TABLE IF EXISTS `clients_sorting`;
CREATE TABLE IF NOT EXISTS `clients_sorting` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `sorting_name` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `sorting_column` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `clients_sorting`
--

INSERT INTO `clients_sorting` (`ID`, `sorting_name`, `sorting_column`) VALUES
(1, 'ID', 'clients.ID'),
(2, 'Kliento vardas', 'clients.name'),
(3, 'Kliento pavardė', 'clients.surname'),
(4, 'Kliento teisės', 'clients_perks.value '),
(5, 'Prijungimo data', 'clients.date_joined');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `type_id` int(4) NOT NULL,
  `value` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`ID`, `name`, `type_id`, `value`) VALUES
(1, 'kavine', 2, 'kava ir uzkandziai'),
(2, 'vasara', 3, 'vasaros festivaliai');

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

DROP TABLE IF EXISTS `company_type`;
CREATE TABLE IF NOT EXISTS `company_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `value` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`ID`, `name`, `value`) VALUES
(1, 'MB', 'Mažoji Bendrija'),
(2, 'UAB', 'Uždaroji akcinė bendrovė'),
(3, 'AB', 'Akcinė bendrovė');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Filename` varchar(100) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID`, `Filename`) VALUES
(26, 'light.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

DROP TABLE IF EXISTS `login_history`;
CREATE TABLE IF NOT EXISTS `login_history` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `user_perks_id` int(4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`ID`, `username`, `user_perks_id`, `date`) VALUES
(57, 'admin', 1, '2021-09-02 23:47:55'),
(56, 'admin', 1, '2021-09-02 23:28:04'),
(55, 'admin', 1, '2021-09-02 22:20:25'),
(54, 'admin', 1, '2021-09-02 18:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `registration_status`
--

DROP TABLE IF EXISTS `registration_status`;
CREATE TABLE IF NOT EXISTS `registration_status` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `value` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `registration_status`
--

INSERT INTO `registration_status` (`ID`, `value`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8_lithuanian_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_lithuanian_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_lithuanian_ci NOT NULL,
  `surname` varchar(60) COLLATE utf8_lithuanian_ci NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(60) COLLATE utf8_lithuanian_ci NOT NULL,
  `perks_id` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `name`, `surname`, `birthdate`, `email`, `perks_id`) VALUES
(4, 'admin', '123', 'Kay', 'Ko', '1990-03-04', 'keyko123@gmail.com', 1),
(5, 'antom', '12345', 'Antony', 'Piter', '1991-06-12', 'antony@fu.com', 2),
(7, 'alana', 'alana', 'Alana', 'Walker', '1992-05-01', 'alana@gmail.com', 3),
(9, 'jon', 'jon', 'jong', 'jn', '2021-06-16', 'jon@gmail.com', 3),
(10, 'sadmin', '12345', 'sadmin', 'sadmin', '2021-07-29', 'sadmin@gmail.com', 3),
(13, 'vadyba', '123', 'Jonas', 'Jokubaitis', '1990-03-04', 'jonas@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_perks`
--

DROP TABLE IF EXISTS `user_perks`;
CREATE TABLE IF NOT EXISTS `user_perks` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  `value` varchar(120) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `user_perks`
--

INSERT INTO `user_perks` (`ID`, `name`, `value`) VALUES
(1, '1', 'administratorius'),
(2, '2', 'vadybininkas'),
(3, '3', 'inspektorius'),
(4, '4', 'sistemos administratorius'),
(5, '5', 'vartotojas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
