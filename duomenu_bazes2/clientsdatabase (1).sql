-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 31, 2021 at 10:25 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=211 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ID`, `name`, `surname`, `date_joined`, `perks_id`) VALUES
(1, 'vardas1', 'pavarde1', '2021-08-21', 0),
(2, 'vardas2', 'pavarde2', '2021-08-21', 2),
(3, 'vardas3', 'pavarde3', '2021-08-21', 4),
(4, 'vardas4', 'pavarde4', '2021-08-21', 1),
(5, 'vardas5', 'pavarde5', '2021-08-21', 3),
(7, 'vardas7', 'pavarde7', '2021-08-21', 0),
(8, 'vardas8', 'pavarde8', '2021-08-21', 4),
(9, 'vardas9', 'pavarde9', '2021-08-21', 4),
(10, 'vardas10', 'pavarde10', '2021-08-21', 2),
(11, 'vardas11', 'pavarde11', '2021-08-21', 3),
(12, 'vardas12', 'pavarde12', '2021-08-21', 3),
(13, 'vardas13', 'pavarde13', '2021-08-21', 4),
(14, 'vardas14', 'pavarde14', '2021-08-21', 4),
(15, 'vardas15', 'pavarde15', '2021-08-21', 0),
(16, 'vardas16', 'pavarde16', '2021-08-21', 1),
(17, 'vardas17', 'pavarde17', '2021-08-21', 2),
(18, 'vardas18', 'pavarde18', '2021-08-21', 1),
(19, 'vardas19', 'pavarde19', '2021-08-21', 0),
(20, 'vardas20', 'pavarde20', '2021-08-21', 0),
(21, 'vardas21', 'pavarde21', '2021-08-21', 4),
(22, 'vardas22', 'pavarde22', '2021-08-21', 2),
(23, 'vardas23', 'pavarde23', '2021-08-21', 2),
(24, 'vardas24', 'pavarde24', '2021-08-21', 3),
(25, 'vardas25', 'pavarde25', '2021-08-21', 2),
(26, 'vardas26', 'pavarde26', '2021-08-21', 3),
(27, 'vardas27', 'pavarde27', '2021-08-21', 3),
(28, 'vardas28', 'pavarde28', '2021-08-21', 2),
(29, 'vardas29', 'pavarde29', '2021-08-21', 0),
(30, 'vardas30', 'pavarde30', '2021-08-21', 0),
(31, 'vardas31', 'pavarde31', '2021-08-21', 2),
(32, 'vardas32', 'pavarde32', '2021-08-21', 0),
(33, 'vardas33', 'pavarde33', '2021-08-21', 1),
(34, 'vardas34', 'pavarde34', '2021-08-21', 1),
(35, 'vardas35', 'pavarde35', '2021-08-21', 0),
(36, 'vardas36', 'pavarde36', '2021-08-21', 1),
(37, 'vardas37', 'pavarde37', '2021-08-21', 1),
(38, 'vardas38', 'pavarde38', '2021-08-21', 4),
(39, 'vardas39', 'pavarde39', '2021-08-21', 0),
(40, 'vardas40', 'pavarde40', '2021-08-21', 1),
(41, 'vardas41', 'pavarde41', '2021-08-21', 1),
(42, 'vardas42', 'pavarde42', '2021-08-21', 3),
(43, 'vardas43', 'pavarde43', '2021-08-21', 3),
(44, 'vardas44', 'pavarde44', '2021-08-21', 2),
(45, 'vardas45', 'pavarde45', '2021-08-21', 3),
(46, 'vardas46', 'pavarde46', '2021-08-21', 0),
(47, 'vardas47', 'pavarde47', '2021-08-21', 4),
(48, 'vardas48', 'pavarde48', '2021-08-21', 3),
(49, 'vardas49', 'pavarde49', '2021-08-21', 1),
(50, 'vardas50', 'pavarde50', '2021-08-21', 3),
(51, 'vardas51', 'pavarde51', '2021-08-21', 4),
(52, 'vardas52', 'pavarde52', '2021-08-21', 4),
(53, 'vardas53', 'pavarde53', '2021-08-21', 4),
(54, 'vardas54', 'pavarde54', '2021-08-21', 4),
(55, 'vardas55', 'pavarde55', '2021-08-21', 4),
(56, 'vardas56', 'pavarde56', '2021-08-21', 0),
(57, 'vardas57', 'pavarde57', '2021-08-21', 4),
(58, 'vardas58', 'pavarde58', '2021-08-21', 1),
(59, 'vardas59', 'pavarde59', '2021-08-21', 0),
(60, 'vardas60', 'pavarde60', '2021-08-21', 3),
(61, 'vardas61', 'pavarde61', '2021-08-21', 1),
(62, 'vardas62', 'pavarde62', '2021-08-21', 2),
(63, 'vardas63', 'pavarde63', '2021-08-21', 1),
(64, 'vardas64', 'pavarde64', '2021-08-21', 2),
(65, 'vardas65', 'pavarde65', '2021-08-21', 2),
(66, 'vardas66', 'pavarde66', '2021-08-21', 4),
(67, 'vardas67', 'pavarde67', '2021-08-21', 3),
(68, 'vardas68', 'pavarde68', '2021-08-21', 1),
(69, 'vardas69', 'pavarde69', '2021-08-21', 4),
(70, 'vardas70', 'pavarde70', '2021-08-21', 1),
(71, 'vardas71', 'pavarde71', '2021-08-21', 4),
(72, 'vardas72', 'pavarde72', '2021-08-21', 2),
(73, 'vardas73', 'pavarde73', '2021-08-21', 2),
(74, 'vardas74', 'pavarde74', '2021-08-21', 2),
(75, 'vardas75', 'pavarde75', '2021-08-21', 4),
(76, 'vardas76', 'pavarde76', '2021-08-21', 1),
(77, 'vardas77', 'pavarde77', '2021-08-21', 2),
(78, 'vardas78', 'pavarde78', '2021-08-21', 2),
(79, 'vardas79', 'pavarde79', '2021-08-21', 0),
(80, 'vardas80', 'pavarde80', '2021-08-21', 2),
(81, 'vardas81', 'pavarde81', '2021-08-21', 1),
(82, 'vardas82', 'pavarde82', '2021-08-21', 0),
(83, 'vardas83', 'pavarde83', '2021-08-21', 4),
(84, 'vardas84', 'pavarde84', '2021-08-21', 3),
(85, 'vardas85', 'pavarde85', '2021-08-21', 2),
(86, 'vardas86', 'pavarde86', '2021-08-21', 2),
(87, 'vardas87', 'pavarde87', '2021-08-21', 3),
(88, 'vardas88', 'pavarde88', '2021-08-21', 1),
(89, 'vardas89', 'pavarde89', '2021-08-21', 1),
(90, 'vardas90', 'pavarde90', '2021-08-21', 3),
(91, 'vardas91', 'pavarde91', '2021-08-21', 4),
(92, 'vardas92', 'pavarde92', '2021-08-21', 1),
(93, 'vardas93', 'pavarde93', '2021-08-21', 2),
(94, 'vardas94', 'pavarde94', '2021-08-21', 2),
(95, 'vardas95', 'pavarde95', '2021-08-21', 4),
(96, 'vardas96', 'pavarde96', '2021-08-21', 3),
(97, 'vardas97', 'pavarde97', '2021-08-21', 4),
(98, 'vardas98', 'pavarde98', '2021-08-21', 4),
(99, 'vardas99', 'pavarde99', '2021-08-21', 2),
(100, 'vardas100', 'pavarde100', '2021-08-21', 0),
(101, 'vardas101', 'pavarde101', '2021-08-21', 4),
(102, 'vardas102', 'pavarde102', '2021-08-21', 4),
(103, 'vardas103', 'pavarde103', '2021-08-21', 2),
(104, 'vardas104', 'pavarde104', '2021-08-21', 1),
(105, 'vardas105', 'pavarde105', '2021-08-21', 2),
(106, 'vardas106', 'pavarde106', '2021-08-21', 1),
(107, 'vardas107', 'pavarde107', '2021-08-21', 2),
(108, 'vardas108', 'pavarde108', '2021-08-21', 1),
(109, 'vardas109', 'pavarde109', '2021-08-21', 3),
(110, 'vardas110', 'pavarde110', '2021-08-21', 0),
(111, 'vardas111', 'pavarde111', '2021-08-21', 4),
(112, 'vardas112', 'pavarde112', '2021-08-21', 1),
(113, 'vardas113', 'pavarde113', '2021-08-21', 1),
(114, 'vardas114', 'pavarde114', '2021-08-21', 0),
(115, 'vardas115', 'pavarde115', '2021-08-21', 4),
(116, 'vardas116', 'pavarde116', '2021-08-21', 1),
(117, 'vardas117', 'pavarde117', '2021-08-21', 3),
(118, 'vardas118', 'pavarde118', '2021-08-21', 0),
(119, 'vardas119', 'pavarde119', '2021-08-21', 3),
(120, 'vardas120', 'pavarde120', '2021-08-21', 4),
(121, 'vardas121', 'pavarde121', '2021-08-21', 1),
(122, 'vardas122', 'pavarde122', '2021-08-21', 3),
(123, 'vardas123', 'pavarde123', '2021-08-21', 4),
(124, 'vardas124', 'pavarde124', '2021-08-21', 0),
(125, 'vardas125', 'pavarde125', '2021-08-21', 1),
(126, 'vardas126', 'pavarde126', '2021-08-21', 1),
(127, 'vardas127', 'pavarde127', '2021-08-21', 2),
(128, 'vardas128', 'pavarde128', '2021-08-21', 2),
(129, 'vardas129', 'pavarde129', '2021-08-21', 2),
(130, 'vardas130', 'pavarde130', '2021-08-21', 0),
(131, 'vardas131', 'pavarde131', '2021-08-21', 1),
(132, 'vardas132', 'pavarde132', '2021-08-21', 1),
(133, 'vardas133', 'pavarde133', '2021-08-21', 2),
(134, 'vardas134', 'pavarde134', '2021-08-21', 3),
(135, 'vardas135', 'pavarde135', '2021-08-21', 3),
(136, 'vardas136', 'pavarde136', '2021-08-21', 3),
(137, 'vardas137', 'pavarde137', '2021-08-21', 0),
(138, 'vardas138', 'pavarde138', '2021-08-21', 3),
(139, 'vardas139', 'pavarde139', '2021-08-21', 4),
(140, 'vardas140', 'pavarde140', '2021-08-21', 0),
(141, 'vardas141', 'pavarde141', '2021-08-21', 4),
(142, 'vardas142', 'pavarde142', '2021-08-21', 2),
(143, 'vardas143', 'pavarde143', '2021-08-21', 2),
(144, 'vardas144', 'pavarde144', '2021-08-21', 1),
(145, 'vardas145', 'pavarde145', '2021-08-21', 3),
(146, 'vardas146', 'pavarde146', '2021-08-21', 0),
(147, 'vardas147', 'pavarde147', '2021-08-21', 0),
(148, 'vardas148', 'pavarde148', '2021-08-21', 0),
(149, 'vardas149', 'pavarde149', '2021-08-21', 3),
(150, 'vardas150', 'pavarde150', '2021-08-21', 2),
(151, 'vardas151', 'pavarde151', '2021-08-21', 2),
(152, 'vardas152', 'pavarde152', '2021-08-21', 4),
(153, 'vardas153', 'pavarde153', '2021-08-21', 0),
(154, 'vardas154', 'pavarde154', '2021-08-21', 1),
(155, 'vardas155', 'pavarde155', '2021-08-21', 0),
(156, 'vardas156', 'pavarde156', '2021-08-21', 2),
(157, 'vardas157', 'pavarde157', '2021-08-21', 0),
(158, 'vardas158', 'pavarde158', '2021-08-21', 2),
(159, 'vardas159', 'pavarde159', '2021-08-21', 4),
(160, 'vardas160', 'pavarde160', '2021-08-21', 0),
(161, 'vardas161', 'pavarde161', '2021-08-21', 4),
(162, 'vardas162', 'pavarde162', '2021-08-21', 0),
(163, 'vardas163', 'pavarde163', '2021-08-21', 1),
(164, 'vardas164', 'pavarde164', '2021-08-21', 1),
(165, 'vardas165', 'pavarde165', '2021-08-21', 3),
(166, 'vardas166', 'pavarde166', '2021-08-21', 3),
(167, 'vardas167', 'pavarde167', '2021-08-21', 2),
(168, 'vardas168', 'pavarde168', '2021-08-21', 0),
(169, 'vardas169', 'pavarde169', '2021-08-21', 3),
(170, 'vardas170', 'pavarde170', '2021-08-21', 3),
(171, 'vardas171', 'pavarde171', '2021-08-21', 3),
(172, 'vardas172', 'pavarde172', '2021-08-21', 3),
(173, 'vardas173', 'pavarde173', '2021-08-21', 4),
(174, 'vardas174', 'pavarde174', '2021-08-21', 4),
(175, 'vardas175', 'pavarde175', '2021-08-21', 1),
(176, 'vardas176', 'pavarde176', '2021-08-21', 3),
(177, 'vardas177', 'pavarde177', '2021-08-21', 4),
(178, 'vardas178', 'pavarde178', '2021-08-21', 4),
(179, 'vardas179', 'pavarde179', '2021-08-21', 4),
(180, 'vardas180', 'pavarde180', '2021-08-21', 2),
(181, 'vardas181', 'pavarde181', '2021-08-21', 3),
(182, 'vardas182', 'pavarde182', '2021-08-21', 2),
(183, 'vardas183', 'pavarde183', '2021-08-21', 3),
(184, 'vardas184', 'pavarde184', '2021-08-21', 0),
(185, 'vardas185', 'pavarde185', '2021-08-21', 2),
(186, 'vardas186', 'pavarde186', '2021-08-21', 2),
(187, 'vardas187', 'pavarde187', '2021-08-21', 2),
(188, 'vardas188', 'pavarde188', '2021-08-21', 0),
(189, 'vardas189', 'pavarde189', '2021-08-21', 3),
(190, 'vardas190', 'pavarde190', '2021-08-21', 1),
(191, 'vardas191', 'pavarde191', '2021-08-21', 3),
(192, 'vardas192', 'pavarde192', '2021-08-21', 0),
(193, 'vardas193', 'pavarde193', '2021-08-21', 2),
(194, 'vardas194', 'pavarde194', '2021-08-21', 0),
(195, 'vardas195', 'pavarde195', '2021-08-21', 0),
(196, 'vardas196', 'pavarde196', '2021-08-21', 3),
(197, 'vardas197', 'pavarde197', '2021-08-21', 2),
(198, 'vardas198', 'pavarde198', '2021-08-21', 2),
(203, 'admin', 'Piter', '2021-08-06', 2);

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
(1, '0', 'naujas klientas'),
(2, '1', 'klientas'),
(3, '2', 'ilgalaikis klientas'),
(4, '3', 'Vip klientas'),
(5, '4', 'Juodasis klientas');

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID`, `Filename`) VALUES
(26, 'image.jpg');

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
