-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5293
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para inova_db
CREATE DATABASE IF NOT EXISTS `inova_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inova_db`;

-- Volcando estructura para tabla inova_db.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `CompanyId` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inova_db.companies: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`CompanyId`, `Rfc`, `CompanyName`, `TradeName`, `Address`, `Phone`, `Email`, `WebsiteUrl`, `Logo`) VALUES
	(1, 'BAPC1122339A0', 'Inova', 'Inova SA', 'CDMX', '1234567890', 'bapc.cesar@gmail.com', 'http://inova.com.mx', 'logo.png');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Volcando estructura para tabla inova_db.companiesbranch
CREATE TABLE IF NOT EXISTS `companiesbranch` (
  `CompanyBranchId` int(11) NOT NULL,
  `CompanyBranchName` varchar(200) NOT NULL,
  `TradeName` varchar(200) NOT NULL,
  `Rfc` varchar(30) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `WebsiteUrl` varchar(500) NOT NULL,
  `Logo` varchar(500) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  PRIMARY KEY (`CompanyBranchId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inova_db.companiesbranch: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `companiesbranch` DISABLE KEYS */;
INSERT INTO `companiesbranch` (`CompanyBranchId`, `CompanyBranchName`, `TradeName`, `Rfc`, `Address`, `Phone`, `Email`, `WebsiteUrl`, `Logo`, `CompanyId`) VALUES
	(1, 'Sucursal 1', 'Sucursal 1', 'BAPC1122339A0', 'Address', '1234567890', 'bapc.cesar@gmail.com', 'http://sucursal.com.mx', 'Logo.png', 1);
/*!40000 ALTER TABLE `companiesbranch` ENABLE KEYS */;

-- Volcando estructura para tabla inova_db.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `MenuId` int(11) NOT NULL,
  `ParentId` int(11) DEFAULT '0',
  `Title` varchar(50) DEFAULT NULL,
  `Url` varchar(50) DEFAULT NULL,
  `Group` varchar(50) DEFAULT NULL,
  `Icon` varchar(50) DEFAULT NULL,
  `Position` tinyint(4) DEFAULT NULL,
  `Bitwise` int(11) NOT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inova_db.menu: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`MenuId`, `ParentId`, `Title`, `Url`, `Group`, `Icon`, `Position`, `Bitwise`) VALUES
	(1, 0, 'Inicio', 'app.home', 'app', 'fa-home', 1, 1),
	(2, 0, 'Catálogos', '', 'app', 'fa-folder ', 2, 2),
	(3, 2, 'Empresas', 'app.empresas', 'app', 'fa-building', 1, 4),
	(4, 2, 'Sucursales', 'app.sucursales', 'app', 'fa-home', 2, 8),
	(5, 2, 'Proveedores', 'app.proveedores', 'app', 'fa-truck ', 3, 16),
	(6, 2, 'Productos', 'app.productos', 'app', 'fa-product-hunt ', 4, 32),
	(7, 0, 'Configuración', '', 'config', 'fa-cog', 3, 64),
	(8, 7, 'Usuarios', 'config.usuarios', 'config', 'fa-user', 1, 128),
	(9, 7, 'Seo', 'config.seo', 'config', 'fa-area-chart', 2, 256);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Volcando estructura para tabla inova_db.menugroups
CREATE TABLE IF NOT EXISTS `menugroups` (
  `GroupId` int(11) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `Bitwise` int(11) NOT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inova_db.menugroups: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `menugroups` DISABLE KEYS */;
INSERT INTO `menugroups` (`GroupId`, `GroupName`, `Bitwise`) VALUES
	(1, 'Administrador', 511),
	(2, 'Grupo 1', 51);
/*!40000 ALTER TABLE `menugroups` ENABLE KEYS */;

-- Volcando estructura para tabla inova_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(120) DEFAULT NULL,
  `ProductDescription` varchar(1200) DEFAULT NULL,
  `ProviderId` int(11) DEFAULT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inova_db.products: 148 rows
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`ProductId`, `ProductName`, `ProductDescription`, `ProviderId`) VALUES
	(2, 'Hole N Shamee ', 'Hole N Shamee', 1),
	(3, 'Selfie Stick It ', 'Selfie Stick It ', 1),
	(4, 'Nuflair', 'Nuflair', 1),
	(5, 'Xtreme Leggings', 'Xtreme Leggings', 1),
	(6, 'Poresonic', 'Poresonic', 2),
	(7, 'Easy Paint Pro ', 'Easy Paint Pro ', 3),
	(8, 'Crystal Visión ', 'Crystal Visión ', 3),
	(9, '10 In 1 Clamping', '10 In 1 Clamping', 4),
	(10, 'Body Gum ', 'Body Gum ', 5),
	(11, 'Helicine', 'Helicine', 6),
	(12, 'Automatic Cutter', 'Automatic Cutter', 7),
	(13, 'Nutri Bullet', 'Nutri Bullet', 8),
	(14, 'Pro Gloss', 'Pro Gloss', 9),
	(15, 'Genesphere', 'Genesphere', 10),
	(16, 'Big Vision', 'Big Vision', 11),
	(17, 'My Fit ', 'My Fit ', 11),
	(18, 'Flex Bike ', 'Flex Bike ', 11),
	(19, 'Air Seat', 'Air Seat', 12),
	(20, 'Línea Eagle Eyes', 'Línea Eagle Eyes', 13),
	(21, 'Water Chiller ', 'Water Chiller ', 14),
	(22, 'Bee Cushion ', 'Bee Cushion ', 14),
	(23, '3 In 1 Bulb ', '3 In 1 Bulb ', 14),
	(24, 'Fri & Vac ', 'Fri & Vac ', 15),
	(25, 'Oil Fighter ', 'Oil Fighter ', 15),
	(26, 'Mosquito', 'Mosquito', 16),
	(27, 'Pest Shield ', 'Pest Shield ', 16),
	(28, 'Flexi Sponge ', 'Flexi Sponge ', 16),
	(29, 'Buzz Trap', 'Buzz Trap', 16),
	(30, 'Whirly Broom ', 'Whirly Broom ', 16),
	(31, 'Garlic Cutter', 'Garlic Cutter', 17),
	(32, 'Push N Loc', 'Push N Loc', 18),
	(33, 'Eyelash', 'Eyelash', 18),
	(34, 'Nanoo Bamboo Trap ', 'Nanoo Bamboo Trap ', 18),
	(35, 'Wayflex', 'Wayflex', 19),
	(36, 'Drive View', 'Drive View', 19),
	(37, 'Core Wave', 'Core Wave', 19),
	(38, 'Almohada', 'Almohada', 19),
	(39, 'Sleep Origins ', 'Sleep Origins ', 20),
	(40, 'Vert1 Steam Pro ', 'Vert1 Steam Pro ', 20),
	(41, 'Squat Magic // Body Crunch Pomp It', 'Squat Magic // Body Crunch Pomp It', 20),
	(42, 'Dermabrilliance Cosmetics', 'Dermabrilliance Cosmetics', 21),
	(43, 'Chef Tony', 'Chef Tony', 22),
	(44, 'Little Yello', 'Little Yello', 22),
	(45, 'Vibra Power', 'Vibra Power', 22),
	(46, 'Paint Zoom ', 'Paint Zoom ', 23),
	(47, 'Rotorazer', 'Rotorazer', 23),
	(48, 'Full Crystal ', 'Full Crystal ', 24),
	(49, 'Diamond Tech ', 'Diamond Tech ', 24),
	(50, 'Velform Sauna Reducer', 'Velform Sauna Reducer', 25),
	(51, 'Velform Slim Wrap', 'Velform Slim Wrap', 25),
	(52, 'Cane Safe', 'Cane Safe', 25),
	(53, 'Drive View', 'Drive View', 25),
	(54, 'Magic For Brush ', 'Magic For Brush ', 26),
	(55, 'Flat Mop ', 'Flat Mop ', 26),
	(56, 'Egg Sitter ', 'Egg Sitter ', 26),
	(57, 'Magna Vision ', 'Magna Vision ', 26),
	(58, 'Knife Sharpener ', 'Knife Sharpener ', 26),
	(59, 'Leggings', 'Leggings', 27),
	(60, 'Línea Instyler', 'Línea Instyler', 28),
	(61, 'Leg Excercise', 'Leg Excercise', 29),
	(62, 'Silk Beauty', 'Silk Beauty', 30),
	(63, 'Clever Console ', 'Clever Console ', 31),
	(64, 'Therma Wrap ', 'Therma Wrap ', 31),
	(65, 'Kicker Ball ', 'Kicker Ball ', 31),
	(66, 'Magic Tracks ', 'Magic Tracks ', 31),
	(67, 'Mighty Sprayer', 'Mighty Sprayer', 31),
	(68, 'Real Deal Pen', 'Real Deal Pen', 31),
	(69, 'Splendid Smooth ', 'Splendid Smooth ', 31),
	(70, 'Comando Vision ', 'Comando Vision ', 31),
	(71, 'Lapicero Con Video ', 'Lapicero Con Video ', 31),
	(72, 'Might Sprayer ', 'Might Sprayer ', 31),
	(73, 'Butterfly Abs ', 'Butterfly Abs ', 31),
	(74, 'Magic Finder', 'Magic Finder', 31),
	(75, 'Air Brush ', 'Air Brush ', 32),
	(76, 'Tri Bright ', 'Tri Bright ', 33),
	(77, 'Chillmax Pillow ', 'Chillmax Pillow ', 33),
	(78, 'Drain Jet ', 'Drain Jet ', 33),
	(79, 'Power 10 Pain Reliver// Power Tense', 'Power 10 Pain Reliver// Power Tense', 34),
	(80, 'Copper Chef Diamond Fry Pan ', 'Copper Chef Diamond Fry Pan ', 34),
	(81, 'Second Skin', 'Second Skin', 34),
	(82, 'Magic Cloth', 'Magic Cloth', 34),
	(83, 'Urbgro', 'Urbgro', 35),
	(84, 'Twirl Curl', 'Twirl Curl', 35),
	(85, 'New Iron', 'New Iron', 36),
	(86, 'Brush', 'Brush', 37),
	(87, 'Magic Bundler', 'Magic Bundler', 38),
	(88, 'Doubletta', 'Doubletta', 39),
	(89, 'Nutri Express', 'Nutri Express', 39),
	(90, 'Livington Fitmix', 'Livington Fitmix', 40),
	(91, 'Neck Therapy Pro ', 'Neck Therapy Pro ', 41),
	(92, 'Flyer', 'Flyer', 41),
	(93, 'Self Me Y Selfie Magic', 'Self Me Y Selfie Magic', 42),
	(94, 'Speaker And Headphone', 'Speaker And Headphone', 42),
	(95, 'Insta Pot ', 'Insta Pot ', 43),
	(96, 'Easy Flat Mop ', 'Easy Flat Mop ', 43),
	(97, 'Sock Dock ', 'Sock Dock ', 43),
	(98, 'Aspiradora Sirena ', 'Aspiradora Sirena ', 43),
	(99, 'Night Hawk ', 'Night Hawk ', 44),
	(100, 'Night Sight ', 'Night Sight ', 44),
	(101, 'Bamboo Pillow ', 'Bamboo Pillow ', 44),
	(102, 'Huggle ', 'Huggle ', 44),
	(103, 'Work Brite ', 'Work Brite ', 44),
	(104, 'Charcoal Pillow', 'Charcoal Pillow', 44),
	(105, 'Celluless  ', 'Celluless  ', 45),
	(106, 'Magic Bristle Gloves', 'Magic Bristle Gloves', 46),
	(107, 'Copper Lux', 'Copper Lux', 47),
	(108, 'Warm Up', 'Warm Up', 47),
	(109, 'Rovus Tsunami ', 'Rovus Tsunami ', 47),
	(110, '2 In One Shiatsu Warm Maasager ', '2 In One Shiatsu Warm Maasager ', 47),
	(111, 'Desinfectante', 'Desinfectante', 47),
	(112, 'Copper Lux', 'Copper Lux', 47),
	(113, 'Storm Trooper ', 'Storm Trooper ', 48),
	(114, 'Atomic Beam Private Eye ', 'Atomic Beam Private Eye ', 48),
	(115, 'California Charcoal ', 'California Charcoal ', 48),
	(116, 'River Walkers ', 'River Walkers ', 48),
	(117, 'Hurricane Windshiel Wizard ', 'Hurricane Windshiel Wizard ', 48),
	(118, 'Wonder Bible Biblia ', 'Wonder Bible Biblia ', 49),
	(119, '3 Second Brows ', '3 Second Brows ', 49),
	(120, 'Gotham Steel Hamburger Grill ', 'Gotham Steel Hamburger Grill ', 49),
	(121, 'Tornado Twist Mop ', 'Tornado Twist Mop ', 49),
	(122, 'Sensual Bra', 'Sensual Bra', 50),
	(123, 'Scissor Knife ', 'Scissor Knife ', 50),
	(124, 'Air Bolt ', 'Air Bolt ', 50),
	(125, 'Power Smokeless Grill ', 'Power Smokeless Grill ', 51),
	(126, 'Bavarian Edge', 'Bavarian Edge', 52),
	(127, 'Royal Posture', 'Royal Posture', 52),
	(128, 'Tummy Tuck ', 'Tummy Tuck ', 53),
	(129, 'Bunion Buddy ', 'Bunion Buddy ', 53),
	(130, 'Electro Blocks ', 'Electro Blocks ', 54),
	(131, 'Orea', 'Orea', 54),
	(132, 'Jadies', 'Jadies', 55),
	(133, 'Sknieance', 'Sknieance', 55),
	(134, 'Magic Serum ', 'Magic Serum ', 55),
	(135, 'Sweat Shaper ', 'Sweat Shaper ', 56),
	(136, 'Ready Roller ', 'Ready Roller ', 56),
	(137, 'Squat N Go ', 'Squat N Go ', 56),
	(138, 'Multimixer', 'Multimixer', 56),
	(139, 'True Touch ', 'True Touch ', 56),
	(140, 'Biolux Multigrill', 'Biolux Multigrill', 56),
	(141, 'Single Pan ', 'Single Pan ', 56),
	(142, 'Strider Pro ', 'Strider Pro ', 56),
	(143, 'Biolux (Multigrill) ', 'Biolux (Multigrill) ', 57),
	(144, 'Single Pan ', 'Single Pan ', 57),
	(145, 'Flip Pot ', 'Flip Pot ', 58),
	(146, 'Excerswing', 'Excerswing', 58),
	(147, 'Easy Flat Mop ', 'Easy Flat Mop ', 58),
	(148, 'Tac Light Xl 900 ', 'Tac Light Xl 900 ', 58),
	(149, 'Core Xt 46 ', 'Core Xt 46 ', 58);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Volcando estructura para tabla inova_db.providers
CREATE TABLE IF NOT EXISTS `providers` (
  `ProviderId` int(11) NOT NULL AUTO_INCREMENT,
  `ProviderName` varchar(170) DEFAULT NULL,
  PRIMARY KEY (`ProviderId`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inova_db.providers: 58 rows
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

-- Volcando estructura para tabla inova_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Nick` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Pasword` varchar(120) NOT NULL,
  `Photo` varchar(30) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1',
  `GroupId` int(11) NOT NULL,
  `CompanyBranchId` int(11) NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inova_db.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`UserId`, `Name`, `Nick`, `Email`, `Pasword`, `Photo`, `IsActive`, `GroupId`, `CompanyBranchId`) VALUES
	(1, 'César Bautista Pérez', 'Chicharito', 'cesar@inova.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'foto.png', b'1', 1, 1),
	(2, 'Tania Rivas', 'Tania', 'tania@inova.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'goto.png', b'1', 2, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla inova_db.websiteseo
CREATE TABLE IF NOT EXISTS `websiteseo` (
  `WebsiteId` tinyint(4) NOT NULL,
  `GroupSeo` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Value` varchar(530) NOT NULL,
  PRIMARY KEY (`WebsiteId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inova_db.websiteseo: ~34 rows (aproximadamente)
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
