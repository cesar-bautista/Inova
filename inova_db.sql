-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5293
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for inova_db
CREATE DATABASE IF NOT EXISTS `inova_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inova_db`;

-- Dumping structure for table inova_db.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `CompanyId` int(11) NOT NULL AUTO_INCREMENT,
  `Rfc` varchar(30) NOT NULL,
  `CompanyName` varchar(200) NOT NULL,
  `TradeName` varchar(200) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `WebsiteUrl` varchar(500) NOT NULL,
  `Logo` varchar(100) NOT NULL,
  PRIMARY KEY (`CompanyId`),
  UNIQUE KEY `Rfc` (`Rfc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.companies: ~0 rows (approximately)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`CompanyId`, `Rfc`, `CompanyName`, `TradeName`, `Address`, `Phone`, `Email`, `WebsiteUrl`, `Logo`) VALUES
	(1, 'BAPC1122339A0', 'Inova', 'Inova SA', 'CDMX', '1234567890', 'bapc.cesar@gmail.com', 'http://inova.com.mx', 'logo.png');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table inova_db.companiesbranch
CREATE TABLE IF NOT EXISTS `companiesbranch` (
  `CompanyBranchId` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyBranchName` varchar(200) NOT NULL,
  `TradeName` varchar(200) NOT NULL,
  `Rfc` varchar(30) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `WebsiteUrl` varchar(500) NOT NULL,
  `Logo` varchar(500) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  PRIMARY KEY (`CompanyBranchId`),
  KEY `companiesbranch_companies` (`CompanyId`),
  CONSTRAINT `companiesbranch_companies` FOREIGN KEY (`CompanyId`) REFERENCES `companies` (`CompanyId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.companiesbranch: ~0 rows (approximately)
/*!40000 ALTER TABLE `companiesbranch` DISABLE KEYS */;
INSERT INTO `companiesbranch` (`CompanyBranchId`, `CompanyBranchName`, `TradeName`, `Rfc`, `Address`, `Phone`, `Email`, `WebsiteUrl`, `Logo`, `CompanyId`) VALUES
	(1, 'Sucursal 1', 'Sucursal 1', 'BAPC1122339A0', 'Address', '1234567890', 'bapc.cesar@gmail.com', 'http://sucursal.com.mx', 'Logo.png', 1);
/*!40000 ALTER TABLE `companiesbranch` ENABLE KEYS */;

-- Dumping structure for table inova_db.historyprospectus
CREATE TABLE IF NOT EXISTS `historyprospectus` (
  `HistoryProspectusId` int(11) NOT NULL AUTO_INCREMENT,
  `ProspectuId` int(11) NOT NULL,
  `Comments` varchar(2500) NOT NULL,
  `RegisterDate` varchar(50) NOT NULL DEFAULT '0',
  `StatusId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`HistoryProspectusId`),
  KEY `HistoryProspectus_prospectus` (`ProspectuId`),
  KEY `HistoryProspectus_users` (`UserId`),
  CONSTRAINT `HistoryProspectus_prospectus` FOREIGN KEY (`ProspectuId`) REFERENCES `prospectus` (`ProspectuId`),
  CONSTRAINT `HistoryProspectus_users` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.historyprospectus: ~1 rows (approximately)
/*!40000 ALTER TABLE `historyprospectus` DISABLE KEYS */;
INSERT INTO `historyprospectus` (`HistoryProspectusId`, `ProspectuId`, `Comments`, `RegisterDate`, `StatusId`, `UserId`) VALUES
	(11, 9, 'abc', '2018-11-27T04:46:49.477Z', 6, 1);
/*!40000 ALTER TABLE `historyprospectus` ENABLE KEYS */;

-- Dumping structure for table inova_db.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `MenuId` int(11) NOT NULL AUTO_INCREMENT,
  `ParentId` int(11) DEFAULT '0',
  `Title` varchar(50) DEFAULT NULL,
  `Url` varchar(50) DEFAULT NULL,
  `Group` varchar(50) DEFAULT NULL,
  `Icon` varchar(50) DEFAULT NULL,
  `Position` tinyint(4) DEFAULT NULL,
  `Bitwise` int(11) NOT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.menu: ~10 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`MenuId`, `ParentId`, `Title`, `Url`, `Group`, `Icon`, `Position`, `Bitwise`) VALUES
	(1, 0, 'Inicio', 'app.home', 'app', 'fa-home', 1, 1),
	(2, 0, 'Alta', '', 'app', 'fa-folder ', 2, 2),
	(3, 2, 'Empresas', 'app.empresas', 'app', 'fa-building', 1, 4),
	(4, 2, 'Sucursales', 'app.sucursales', 'app', 'fa-home', 2, 8),
	(5, 2, 'Proveedores', 'app.proveedores', 'app', 'fa-truck ', 3, 16),
	(6, 2, 'Productos', 'app.productos', 'app', 'fa-shopping-cart', 4, 32),
	(7, 0, 'Configuración', '', 'config', 'fa-cog', 3, 64),
	(8, 7, 'Usuarios', 'config.usuarios', 'config', 'fa-user', 1, 128),
	(9, 7, 'Seo', 'config.seo', 'config', 'fa-area-chart', 2, 256),
	(10, 0, 'Seguimiento', 'pro.prospectos', 'pro', 'fa-folder-open-o', 3, 256);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table inova_db.menugroups
CREATE TABLE IF NOT EXISTS `menugroups` (
  `GroupId` int(11) NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(50) NOT NULL,
  `Bitwise` int(11) NOT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.menugroups: ~2 rows (approximately)
/*!40000 ALTER TABLE `menugroups` DISABLE KEYS */;
INSERT INTO `menugroups` (`GroupId`, `GroupName`, `Bitwise`) VALUES
	(1, 'Administrador', 511),
	(2, 'Grupo 1', 307);
/*!40000 ALTER TABLE `menugroups` ENABLE KEYS */;

-- Dumping structure for table inova_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(120) NOT NULL,
  `ProductDescription` varchar(1200) NOT NULL,
  `ProductPrice` decimal(10,2) DEFAULT NULL,
  `ProductFair` varchar(1200) DEFAULT NULL,
  `IsDigitalContent` tinyint(1) DEFAULT NULL,
  `PriorityId` int(11) DEFAULT NULL,
  `FormatId` int(11) DEFAULT NULL,
  `ProviderId` int(11) NOT NULL,
  PRIMARY KEY (`ProductId`),
  KEY `products_providers` (`ProviderId`),
  CONSTRAINT `products_providers` FOREIGN KEY (`ProviderId`) REFERENCES `providers` (`ProviderId`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.products: ~148 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`ProductId`, `ProductName`, `ProductDescription`, `ProductPrice`, `ProductFair`, `IsDigitalContent`, `PriorityId`, `FormatId`, `ProviderId`) VALUES
	(2, 'Hole N Shamee ', 'Hole N Shamee', 1.00, '111', 1, 1, 1, 1),
	(3, 'Selfie Stick It ', 'Selfie Stick It ', 212.00, 'sss', NULL, 1, 1, 1),
	(4, 'Nuflair', 'Nuflair', NULL, NULL, NULL, NULL, NULL, 1),
	(5, 'Xtreme Leggings', 'Xtreme Leggings', NULL, NULL, NULL, NULL, NULL, 1),
	(6, 'Poresonic', 'Poresonic', NULL, NULL, NULL, NULL, NULL, 2),
	(7, 'Easy Paint Pro ', 'Easy Paint Pro ', NULL, NULL, NULL, NULL, NULL, 3),
	(8, 'Crystal Visión ', 'Crystal Visión ', NULL, NULL, NULL, NULL, NULL, 3),
	(9, '10 In 1 Clamping', '10 In 1 Clamping', NULL, NULL, NULL, NULL, NULL, 4),
	(10, 'Body Gum ', 'Body Gum ', NULL, NULL, NULL, NULL, NULL, 5),
	(11, 'Helicine', 'Helicine', NULL, NULL, NULL, NULL, NULL, 6),
	(12, 'Automatic Cutter', 'Automatic Cutter', NULL, NULL, NULL, NULL, NULL, 7),
	(13, 'Nutri Bullet', 'Nutri Bullet', NULL, NULL, NULL, NULL, NULL, 8),
	(14, 'Pro Gloss', 'Pro Gloss', NULL, NULL, NULL, NULL, NULL, 9),
	(15, 'Genesphere', 'Genesphere', NULL, NULL, NULL, NULL, NULL, 10),
	(16, 'Big Vision', 'Big Vision', NULL, NULL, NULL, NULL, NULL, 11),
	(17, 'My Fit ', 'My Fit ', NULL, NULL, NULL, NULL, NULL, 11),
	(18, 'Flex Bike ', 'Flex Bike ', NULL, NULL, NULL, NULL, NULL, 11),
	(19, 'Air Seat', 'Air Seat', NULL, NULL, NULL, NULL, NULL, 12),
	(20, 'Línea Eagle Eyes', 'Línea Eagle Eyes', NULL, NULL, NULL, NULL, NULL, 13),
	(21, 'Water Chiller ', 'Water Chiller ', NULL, NULL, NULL, NULL, NULL, 14),
	(22, 'Bee Cushion ', 'Bee Cushion ', NULL, NULL, NULL, NULL, NULL, 14),
	(23, '3 In 1 Bulb ', '3 In 1 Bulb ', NULL, NULL, NULL, NULL, NULL, 14),
	(24, 'Fri & Vac ', 'Fri & Vac ', NULL, NULL, NULL, NULL, NULL, 15),
	(25, 'Oil Fighter ', 'Oil Fighter ', NULL, NULL, NULL, NULL, NULL, 15),
	(26, 'Mosquito', 'Mosquito', NULL, NULL, NULL, NULL, NULL, 16),
	(27, 'Pest Shield ', 'Pest Shield ', NULL, NULL, NULL, NULL, NULL, 16),
	(28, 'Flexi Sponge ', 'Flexi Sponge ', NULL, NULL, NULL, NULL, NULL, 16),
	(29, 'Buzz Trap', 'Buzz Trap', NULL, NULL, NULL, NULL, NULL, 16),
	(30, 'Whirly Broom ', 'Whirly Broom ', NULL, NULL, NULL, NULL, NULL, 16),
	(31, 'Garlic Cutter', 'Garlic Cutter', NULL, NULL, NULL, NULL, NULL, 17),
	(32, 'Push N Loc', 'Push N Loc', NULL, NULL, NULL, NULL, NULL, 18),
	(33, 'Eyelash', 'Eyelash', NULL, NULL, NULL, NULL, NULL, 18),
	(34, 'Nanoo Bamboo Trap ', 'Nanoo Bamboo Trap ', NULL, NULL, NULL, NULL, NULL, 18),
	(35, 'Wayflex', 'Wayflex', NULL, NULL, NULL, NULL, NULL, 19),
	(36, 'Drive View', 'Drive View', NULL, NULL, NULL, NULL, NULL, 19),
	(37, 'Core Wave', 'Core Wave', NULL, NULL, NULL, NULL, NULL, 19),
	(38, 'Almohada', 'Almohada', NULL, NULL, NULL, NULL, NULL, 19),
	(39, 'Sleep Origins ', 'Sleep Origins ', NULL, NULL, NULL, NULL, NULL, 20),
	(40, 'Vert1 Steam Pro ', 'Vert1 Steam Pro ', NULL, NULL, NULL, NULL, NULL, 20),
	(41, 'Squat Magic // Body Crunch Pomp It', 'Squat Magic // Body Crunch Pomp It', NULL, NULL, NULL, NULL, NULL, 20),
	(42, 'Dermabrilliance Cosmetics', 'Dermabrilliance Cosmetics', NULL, NULL, NULL, NULL, NULL, 21),
	(43, 'Chef Tony', 'Chef Tony', NULL, NULL, NULL, NULL, NULL, 22),
	(44, 'Little Yello', 'Little Yello', NULL, NULL, NULL, NULL, NULL, 22),
	(45, 'Vibra Power', 'Vibra Power', NULL, NULL, NULL, NULL, NULL, 22),
	(46, 'Paint Zoom ', 'Paint Zoom ', NULL, NULL, NULL, NULL, NULL, 23),
	(47, 'Rotorazer', 'Rotorazer', NULL, NULL, NULL, NULL, NULL, 23),
	(48, 'Full Crystal ', 'Full Crystal ', NULL, NULL, NULL, NULL, NULL, 24),
	(49, 'Diamond Tech ', 'Diamond Tech ', NULL, NULL, NULL, NULL, NULL, 24),
	(50, 'Velform Sauna Reducer', 'Velform Sauna Reducer', NULL, NULL, NULL, NULL, NULL, 25),
	(51, 'Velform Slim Wrap', 'Velform Slim Wrap', NULL, NULL, NULL, NULL, NULL, 25),
	(52, 'Cane Safe', 'Cane Safe', NULL, NULL, NULL, NULL, NULL, 25),
	(53, 'Drive View', 'Drive View', NULL, NULL, NULL, NULL, NULL, 25),
	(54, 'Magic For Brush ', 'Magic For Brush ', NULL, NULL, NULL, NULL, NULL, 26),
	(55, 'Flat Mop ', 'Flat Mop ', NULL, NULL, NULL, NULL, NULL, 26),
	(56, 'Egg Sitter ', 'Egg Sitter ', NULL, NULL, NULL, NULL, NULL, 26),
	(57, 'Magna Vision ', 'Magna Vision ', NULL, NULL, NULL, NULL, NULL, 26),
	(58, 'Knife Sharpener ', 'Knife Sharpener ', NULL, NULL, NULL, NULL, NULL, 26),
	(59, 'Leggings', 'Leggings', NULL, NULL, NULL, NULL, NULL, 27),
	(60, 'Línea Instyler', 'Línea Instyler', NULL, NULL, NULL, NULL, NULL, 28),
	(61, 'Leg Excercise', 'Leg Excercise', NULL, NULL, NULL, NULL, NULL, 29),
	(62, 'Silk Beauty', 'Silk Beauty', NULL, NULL, NULL, NULL, NULL, 30),
	(63, 'Clever Console ', 'Clever Console ', NULL, NULL, NULL, NULL, NULL, 31),
	(64, 'Therma Wrap ', 'Therma Wrap ', NULL, NULL, NULL, NULL, NULL, 31),
	(65, 'Kicker Ball ', 'Kicker Ball ', NULL, NULL, NULL, NULL, NULL, 31),
	(66, 'Magic Tracks ', 'Magic Tracks ', NULL, NULL, NULL, NULL, NULL, 31),
	(67, 'Mighty Sprayer', 'Mighty Sprayer', NULL, NULL, NULL, NULL, NULL, 31),
	(68, 'Real Deal Pen', 'Real Deal Pen', NULL, NULL, NULL, NULL, NULL, 31),
	(69, 'Splendid Smooth ', 'Splendid Smooth ', NULL, NULL, NULL, NULL, NULL, 31),
	(70, 'Comando Vision ', 'Comando Vision ', NULL, NULL, NULL, NULL, NULL, 31),
	(71, 'Lapicero Con Video ', 'Lapicero Con Video ', NULL, NULL, NULL, NULL, NULL, 31),
	(72, 'Might Sprayer ', 'Might Sprayer ', NULL, NULL, NULL, NULL, NULL, 31),
	(73, 'Butterfly Abs ', 'Butterfly Abs ', NULL, NULL, NULL, NULL, NULL, 31),
	(74, 'Magic Finder', 'Magic Finder', NULL, NULL, NULL, NULL, NULL, 31),
	(75, 'Air Brush ', 'Air Brush ', NULL, NULL, NULL, NULL, NULL, 32),
	(76, 'Tri Bright ', 'Tri Bright ', NULL, NULL, NULL, NULL, NULL, 33),
	(77, 'Chillmax Pillow ', 'Chillmax Pillow ', NULL, NULL, NULL, NULL, NULL, 33),
	(78, 'Drain Jet ', 'Drain Jet ', NULL, NULL, NULL, NULL, NULL, 33),
	(79, 'Power 10 Pain Reliver// Power Tense', 'Power 10 Pain Reliver// Power Tense', NULL, NULL, NULL, NULL, NULL, 34),
	(80, 'Copper Chef Diamond Fry Pan ', 'Copper Chef Diamond Fry Pan ', NULL, NULL, NULL, NULL, NULL, 34),
	(81, 'Second Skin', 'Second Skin', NULL, NULL, NULL, NULL, NULL, 34),
	(82, 'Magic Cloth', 'Magic Cloth', NULL, NULL, NULL, NULL, NULL, 34),
	(83, 'Urbgro', 'Urbgro', NULL, NULL, NULL, NULL, NULL, 35),
	(84, 'Twirl Curl', 'Twirl Curl', NULL, NULL, NULL, NULL, NULL, 35),
	(85, 'New Iron', 'New Iron', NULL, NULL, NULL, NULL, NULL, 36),
	(86, 'Brush', 'Brush', NULL, NULL, NULL, NULL, NULL, 37),
	(87, 'Magic Bundler', 'Magic Bundler', NULL, NULL, NULL, NULL, NULL, 38),
	(88, 'Doubletta', 'Doubletta', NULL, NULL, NULL, NULL, NULL, 39),
	(89, 'Nutri Express', 'Nutri Express', NULL, NULL, NULL, NULL, NULL, 39),
	(90, 'Livington Fitmix', 'Livington Fitmix', NULL, NULL, NULL, NULL, NULL, 40),
	(91, 'Neck Therapy Pro ', 'Neck Therapy Pro ', NULL, NULL, NULL, NULL, NULL, 41),
	(92, 'Flyer', 'Flyer', NULL, NULL, NULL, NULL, NULL, 41),
	(93, 'Self Me Y Selfie Magic', 'Self Me Y Selfie Magic', NULL, NULL, NULL, NULL, NULL, 42),
	(94, 'Speaker And Headphone', 'Speaker And Headphone', NULL, NULL, NULL, NULL, NULL, 42),
	(95, 'Insta Pot ', 'Insta Pot ', NULL, NULL, NULL, NULL, NULL, 43),
	(96, 'Easy Flat Mop ', 'Easy Flat Mop ', NULL, NULL, NULL, NULL, NULL, 43),
	(97, 'Sock Dock ', 'Sock Dock ', NULL, NULL, NULL, NULL, NULL, 43),
	(98, 'Aspiradora Sirena ', 'Aspiradora Sirena ', NULL, NULL, NULL, NULL, NULL, 43),
	(99, 'Night Hawk ', 'Night Hawk ', NULL, NULL, NULL, NULL, NULL, 44),
	(100, 'Night Sight ', 'Night Sight ', NULL, NULL, NULL, NULL, NULL, 44),
	(101, 'Bamboo Pillow ', 'Bamboo Pillow ', NULL, NULL, NULL, NULL, NULL, 44),
	(102, 'Huggle ', 'Huggle ', NULL, NULL, NULL, NULL, NULL, 44),
	(103, 'Work Brite ', 'Work Brite ', NULL, NULL, NULL, NULL, NULL, 44),
	(104, 'Charcoal Pillow', 'Charcoal Pillow', NULL, NULL, NULL, NULL, NULL, 44),
	(105, 'Celluless  ', 'Celluless  ', NULL, NULL, NULL, NULL, NULL, 45),
	(106, 'Magic Bristle Gloves', 'Magic Bristle Gloves', NULL, NULL, NULL, NULL, NULL, 46),
	(107, 'Copper Lux', 'Copper Lux', NULL, NULL, NULL, NULL, NULL, 47),
	(108, 'Warm Up', 'Warm Up', NULL, NULL, NULL, NULL, NULL, 47),
	(109, 'Rovus Tsunami ', 'Rovus Tsunami ', NULL, NULL, NULL, NULL, NULL, 47),
	(110, '2 In One Shiatsu Warm Maasager ', '2 In One Shiatsu Warm Maasager ', NULL, NULL, NULL, NULL, NULL, 47),
	(111, 'Desinfectante', 'Desinfectante', NULL, NULL, NULL, NULL, NULL, 47),
	(112, 'Copper Lux', 'Copper Lux', NULL, NULL, NULL, NULL, NULL, 47),
	(113, 'Storm Trooper ', 'Storm Trooper ', NULL, NULL, NULL, NULL, NULL, 48),
	(114, 'Atomic Beam Private Eye ', 'Atomic Beam Private Eye ', NULL, NULL, NULL, NULL, NULL, 48),
	(115, 'California Charcoal ', 'California Charcoal ', NULL, NULL, NULL, NULL, NULL, 48),
	(116, 'River Walkers ', 'River Walkers ', NULL, NULL, NULL, NULL, NULL, 48),
	(117, 'Hurricane Windshiel Wizard ', 'Hurricane Windshiel Wizard ', NULL, NULL, NULL, NULL, NULL, 48),
	(118, 'Wonder Bible Biblia ', 'Wonder Bible Biblia ', NULL, NULL, NULL, NULL, NULL, 49),
	(119, '3 Second Brows ', '3 Second Brows ', NULL, NULL, NULL, NULL, NULL, 49),
	(120, 'Gotham Steel Hamburger Grill ', 'Gotham Steel Hamburger Grill ', NULL, NULL, NULL, NULL, NULL, 49),
	(121, 'Tornado Twist Mop ', 'Tornado Twist Mop ', NULL, NULL, NULL, NULL, NULL, 49),
	(122, 'Sensual Bra', 'Sensual Bra', NULL, NULL, NULL, NULL, NULL, 50),
	(123, 'Scissor Knife ', 'Scissor Knife ', NULL, NULL, NULL, NULL, NULL, 50),
	(124, 'Air Bolt ', 'Air Bolt ', NULL, NULL, NULL, NULL, NULL, 50),
	(125, 'Power Smokeless Grill ', 'Power Smokeless Grill ', NULL, NULL, NULL, NULL, NULL, 51),
	(126, 'Bavarian Edge', 'Bavarian Edge', NULL, NULL, NULL, NULL, NULL, 52),
	(127, 'Royal Posture', 'Royal Posture', NULL, NULL, NULL, NULL, NULL, 52),
	(128, 'Tummy Tuck ', 'Tummy Tuck ', NULL, NULL, NULL, NULL, NULL, 53),
	(129, 'Bunion Buddy ', 'Bunion Buddy ', NULL, NULL, NULL, NULL, NULL, 53),
	(130, 'Electro Blocks ', 'Electro Blocks ', NULL, NULL, NULL, NULL, NULL, 54),
	(131, 'Orea', 'Orea', NULL, NULL, NULL, NULL, NULL, 54),
	(132, 'Jadies', 'Jadies', NULL, NULL, NULL, NULL, NULL, 55),
	(133, 'Sknieance', 'Sknieance', NULL, NULL, NULL, NULL, NULL, 55),
	(134, 'Magic Serum ', 'Magic Serum ', NULL, NULL, NULL, NULL, NULL, 55),
	(135, 'Sweat Shaper ', 'Sweat Shaper ', NULL, NULL, NULL, NULL, NULL, 56),
	(136, 'Ready Roller ', 'Ready Roller ', NULL, NULL, NULL, NULL, NULL, 56),
	(137, 'Squat N Go ', 'Squat N Go ', NULL, NULL, NULL, NULL, NULL, 56),
	(138, 'Multimixer', 'Multimixer', NULL, NULL, NULL, NULL, NULL, 56),
	(139, 'True Touch ', 'True Touch ', NULL, NULL, NULL, NULL, NULL, 56),
	(140, 'Biolux Multigrill', 'Biolux Multigrill', NULL, NULL, NULL, NULL, NULL, 56),
	(141, 'Single Pan ', 'Single Pan ', NULL, NULL, NULL, NULL, NULL, 56),
	(142, 'Strider Pro ', 'Strider Pro ', NULL, NULL, NULL, NULL, NULL, 56),
	(143, 'Biolux (Multigrill) ', 'Biolux (Multigrill) ', NULL, NULL, NULL, NULL, NULL, 57),
	(144, 'Single Pan ', 'Single Pan ', NULL, NULL, NULL, NULL, NULL, 57),
	(145, 'Flip Pot ', 'Flip Pot ', NULL, NULL, NULL, NULL, NULL, 58),
	(146, 'Excerswing', 'Excerswing', NULL, NULL, NULL, NULL, NULL, 58),
	(147, 'Easy Flat Mop ', 'Easy Flat Mop ', NULL, NULL, NULL, NULL, NULL, 58),
	(148, 'Tac Light Xl 900 ', 'Tac Light Xl 900 ', NULL, NULL, NULL, NULL, NULL, 58),
	(149, 'Core Xt 46 ', 'Core Xt 46 ', NULL, NULL, NULL, NULL, NULL, 58);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table inova_db.productsformat
CREATE TABLE IF NOT EXISTS `productsformat` (
  `FormatId` int(11) NOT NULL AUTO_INCREMENT,
  `FormatName` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`FormatId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.productsformat: 0 rows
/*!40000 ALTER TABLE `productsformat` DISABLE KEYS */;
INSERT INTO `productsformat` (`FormatId`, `FormatName`) VALUES
	(1, '2 min'),
	(2, '7 min'),
	(3, '15 min'),
	(4, '28 min');
/*!40000 ALTER TABLE `productsformat` ENABLE KEYS */;

-- Dumping structure for table inova_db.productspriority
CREATE TABLE IF NOT EXISTS `productspriority` (
  `PriorityId` int(11) NOT NULL AUTO_INCREMENT,
  `PriorityName` varchar(50) NOT NULL,
  PRIMARY KEY (`PriorityId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.productspriority: 0 rows
/*!40000 ALTER TABLE `productspriority` DISABLE KEYS */;
INSERT INTO `productspriority` (`PriorityId`, `PriorityName`) VALUES
	(1, 'AAAA'),
	(2, 'AAA1/2'),
	(3, 'AAA'),
	(4, 'AA1/2'),
	(5, 'AA');
/*!40000 ALTER TABLE `productspriority` ENABLE KEYS */;

-- Dumping structure for table inova_db.prospectus
CREATE TABLE IF NOT EXISTS `prospectus` (
  `ProspectuId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL DEFAULT '0',
  `ProviderId` int(11) NOT NULL DEFAULT '0',
  `ProductId` int(11) NOT NULL DEFAULT '0',
  `StatusId` int(11) NOT NULL DEFAULT '0',
  `Comments` varchar(2500) NOT NULL DEFAULT '0',
  `RegisterDate` varchar(50) NOT NULL DEFAULT '0',
  `RememberDate` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ProspectuId`),
  KEY `prospectus_prospectusstatus` (`StatusId`),
  KEY `prospectus_providers` (`ProviderId`),
  KEY `prospectus_products` (`ProductId`),
  KEY `prospectus_users` (`UserId`),
  CONSTRAINT `prospectus_products` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`),
  CONSTRAINT `prospectus_prospectusstatus` FOREIGN KEY (`StatusId`) REFERENCES `prospectusstatus` (`StatusId`),
  CONSTRAINT `prospectus_providers` FOREIGN KEY (`ProviderId`) REFERENCES `providers` (`ProviderId`),
  CONSTRAINT `prospectus_users` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.prospectus: ~3 rows (approximately)
/*!40000 ALTER TABLE `prospectus` DISABLE KEYS */;
INSERT INTO `prospectus` (`ProspectuId`, `UserId`, `ProviderId`, `ProductId`, `StatusId`, `Comments`, `RegisterDate`, `RememberDate`) VALUES
	(9, 1, 3, 7, 6, 'Prueba de disparador', '2018-11-27T04:46:49.477Z', '2018-11-27T04:46:49.477Z'),
	(10, 1, 1, 5, 1, 'asdcccc', '2018-11-27T05:35:57.905Z', '2018-11-27T05:35:57.905Z'),
	(11, 1, 1, 3, 1, '123...', '2018-11-28T06:04:12.374Z', '2018-11-28T06:04:12.375Z');
/*!40000 ALTER TABLE `prospectus` ENABLE KEYS */;

-- Dumping structure for table inova_db.prospectusstatus
CREATE TABLE IF NOT EXISTS `prospectusstatus` (
  `StatusId` int(11) NOT NULL AUTO_INCREMENT,
  `StatusName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`StatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.prospectusstatus: ~8 rows (approximately)
/*!40000 ALTER TABLE `prospectusstatus` DISABLE KEYS */;
INSERT INTO `prospectusstatus` (`StatusId`, `StatusName`) VALUES
	(1, 'Calidad'),
	(2, 'Legal'),
	(3, 'Post'),
	(4, 'Traducción'),
	(5, 'Prueba'),
	(6, 'Enviaron muestra'),
	(7, 'Recibieron muestra'),
	(8, 'Descartado');
/*!40000 ALTER TABLE `prospectusstatus` ENABLE KEYS */;

-- Dumping structure for table inova_db.providers
CREATE TABLE IF NOT EXISTS `providers` (
  `ProviderId` int(11) NOT NULL AUTO_INCREMENT,
  `ProviderName` varchar(170) NOT NULL,
  PRIMARY KEY (`ProviderId`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.providers: ~58 rows (approximately)
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` (`ProviderId`, `ProviderName`) VALUES
	(1, 'Advirtuoso'),
	(2, 'Atlantic Horizon // Robert Ferreira'),
	(3, 'Best Seller'),
	(4, 'Brand Developers'),
	(5, 'Britta'),
	(6, 'Cammax '),
	(7, 'Capital Brands'),
	(8, 'Carlos De La Fuente'),
	(9, 'David Attarian'),
	(10, 'Digital Hawaii/ Paul Hocheberg'),
	(11, 'Dr. Ho'),
	(12, 'Eagle Eyes'),
	(13, 'Ehs/Antonio Purroy'),
	(14, 'Emc'),
	(15, 'Gd Import/Sebastian Duhamel'),
	(16, 'Genius'),
	(17, 'Glomail'),
	(18, 'Hapana Matata'),
	(19, 'High Street - Stephen Mcreathe'),
	(20, 'Ictv'),
	(21, 'Ideal Shopping'),
	(22, 'Idealliving'),
	(23, 'Inclover'),
	(24, 'Industex'),
	(25, 'Innovative/ Sunil'),
	(26, 'Inoventys // Alex'),
	(27, 'Instyler (John & Karl)'),
	(28, 'Intellibrands'),
	(29, 'Intermarketing'),
	(30, 'Intersell '),
	(31, 'Inventel'),
	(32, 'Jerome Alexander'),
	(33, 'Jml'),
	(34, 'Kayee'),
	(35, 'Maverick Consultancy'),
	(36, 'Maxious Beauty'),
	(37, 'Maxius Beauty'),
	(38, 'Media Brands'),
	(39, 'Media Shop'),
	(40, 'Media Shop (Mani) '),
	(41, 'Michael Ho'),
	(42, 'Mrc'),
	(43, 'Northern Response'),
	(44, 'Ontel'),
	(45, 'Polidirect'),
	(46, 'Richard Davidson '),
	(47, 'Studio Moderna'),
	(48, 'Telebrands'),
	(49, 'Thed2Cgroup'),
	(50, 'Top/Francisco Vega'),
	(51, 'Tristar'),
	(52, 'Tv Ofertas'),
	(53, 'Vcv International'),
	(54, 'Verimark'),
	(55, 'Vierendeel'),
	(56, 'Williams Ww'),
	(57, 'Ws Invention'),
	(58, 'Your Products');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;

-- Dumping structure for table inova_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(150) NOT NULL,
  `NickName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Pasword` varchar(120) NOT NULL,
  `Photo` varchar(30) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `GroupId` int(11) NOT NULL,
  `CompanyBranchId` int(11) NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Email` (`Email`),
  KEY `users_menugroups` (`GroupId`),
  KEY `users_companiesbranch` (`CompanyBranchId`),
  CONSTRAINT `users_companiesbranch` FOREIGN KEY (`CompanyBranchId`) REFERENCES `companiesbranch` (`CompanyBranchId`),
  CONSTRAINT `users_menugroups` FOREIGN KEY (`GroupId`) REFERENCES `menugroups` (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`UserId`, `UserName`, `NickName`, `Email`, `Pasword`, `Photo`, `IsActive`, `GroupId`, `CompanyBranchId`) VALUES
	(1, 'César Bautista Pérez', 'Chicharito', 'cesar@inova.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'a2.jpg', b'1', 1, 1),
	(2, 'Tania Rivas', 'Tania', 'tania@inova.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'a3.jpg', b'1', 2, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table inova_db.websiteseo
CREATE TABLE IF NOT EXISTS `websiteseo` (
  `WebsiteId` tinyint(4) NOT NULL AUTO_INCREMENT,
  `GroupSeo` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Value` varchar(530) NOT NULL,
  PRIMARY KEY (`WebsiteId`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table inova_db.websiteseo: ~34 rows (approximately)
/*!40000 ALTER TABLE `websiteseo` DISABLE KEYS */;
INSERT INTO `websiteseo` (`WebsiteId`, `GroupSeo`, `Name`, `Value`) VALUES
	(1, 'General', 'SITE_NAME', 'Inova'),
	(2, 'General', 'COUNTRY', 'México'),
	(3, 'General', 'PLACENAME', 'Ciudad de México'),
	(4, 'General', 'REGION', 'MX'),
	(5, 'General', 'LOCALE', 'es_MX'),
	(6, 'General', 'LANG', 'es'),
	(7, 'General', 'LANGUAGE', 'Español'),
	(8, 'General', 'LATITUDE', '19.00000'),
	(9, 'General', 'LONGITUDE', '-99.0000'),
	(10, 'General', 'ROBOTS', 'index, follow'),
	(11, 'General', 'REVISIT_AFTER', '7 days'),
	(12, 'General', 'FB_SITE', 'https://www.facebook.com'),
	(13, 'General', 'FB_ADMIN', 'https://www.facebook.com'),
	(14, 'General', 'FB_APPID', 'https://www.facebook.com'),
	(15, 'General', 'TW_CARD', 'summary'),
	(16, 'General', 'TW_SITE', '@inova'),
	(17, 'General', 'TW_CREATOR', '@bapc_cesar'),
	(18, 'General', 'ADDRESS', 'My address'),
	(19, 'General', 'EMAIL_1', 'cesar@inova.com'),
	(20, 'General', 'EMAIL_2', 'cesar@inova.com'),
	(21, 'General', 'EMAIL_3', 'cesar@inova.com'),
	(22, 'General', 'PHONE_1', '00 11 22 33 44'),
	(23, 'General', 'PHONE_2', '00 11 22 33 44'),
	(24, 'General', 'PHONE_3', '00 11 22 33 44'),
	(25, 'General', 'URL_FACEBOOK', 'https://www.facebook.com'),
	(26, 'General', 'URL_TWITTER', 'https://twitter.com'),
	(27, 'General', 'URL_LINKEDIN', 'https://www.linkedin.com/'),
	(28, 'General', 'URL_INSTAGRAM', 'https://www.instagram.com'),
	(29, 'General', 'URL_YOUTUBE', 'https://www.youtube.com'),
	(30, 'Inicio', 'TITLE', 'Welcome'),
	(31, 'Inicio', 'KEYWORDS', 'a,b,c'),
	(32, 'Inicio', 'DESCRIPTION', 'Text'),
	(33, 'Inicio', 'TW_IMAGE', 'imagetw.png'),
	(34, 'Inicio', 'FB_IMAGE', 'imagefb.png');
/*!40000 ALTER TABLE `websiteseo` ENABLE KEYS */;

-- Dumping structure for trigger inova_db.TriggerAddHistoryProspectus
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER';
DELIMITER //
CREATE TRIGGER `TriggerAddHistoryProspectus` BEFORE UPDATE ON `prospectus` FOR EACH ROW BEGIN
	  INSERT INTO `historyprospectus`(
		    ProspectuId,
		    Comments,
		    RegisterDate,
		    StatusId,  
		    UserId
		) VALUES(
		  OLD.ProspectuId,
		  OLD.Comments,
		  OLD.RememberDate,
		  OLD.StatusId,  
		  OLD.UserId
		);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
