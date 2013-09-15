# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: carsignite
# Generation Time: 2013-09-15 01:11:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table articles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `car_id` int(11) unsigned NOT NULL,
  `mods` varchar(255) DEFAULT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;

INSERT INTO `articles` (`id`, `user_id`, `car_id`, `mods`, `title`, `content`, `images`, `likes`, `created_at`, `updated_at`)
VALUES
	(2,1,1,'headlight','First mod','Added new headlight. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mi nisl, porttitor quis laoreet non, suscipit ut purus. Nunc faucibus, sapien eget tincidunt lacinia, nunc sem posuere libero, sed porta lectus mi quis quam. Suspendisse id aliquet libero. Pellentesque a sollicitudin leo. Integer et nibh sit amet orci rhoncus ullamcorper. Nullam quis aliquet elit, eu tempus erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed rutrum nulla. Ut eu viverra libero, at interdum risus.','car1.png',2,1377350042,NULL),
	(3,22,2,NULL,'Second mod','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus lacinia auctor nisl, ac fermentum tellus rutrum ac. Quisque metus arcu, mollis non luctus a, adipiscing vel tortor. Nam hendrerit euismod viverra. Pellentesque sagittis non magna eget sagittis. Nullam fringilla enim quis justo elementum euismod. Praesent facilisis ante eget iaculis luctus. Nullam sem lorem, vestibulum eu elementum vel, porttitor in augue. Etiam et eleifend ante, sit amet feugiat tortor. Suspendisse et sagittis ligula, at convallis nisi. Fusce lobortis, lectus quis posuere tincidunt, mi elit malesuada erat, eu varius mi nisl ac dolor. Vivamus mauris purus, rhoncus eu fermentum et, eleifend vel magna. Cras commodo rutrum nibh, et consectetur nibh feugiat ut. Integer id vehicula justo, a fermentum odio. In accumsan ipsum eget adipiscing volutpat.','car1.png',0,1377350042,NULL),
	(4,1,1,NULL,'Third mod','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis lectus ut ligula dignissim ornare. Nam gravida dapibus nibh et ultrices. Nam tristique lorem lacinia nisl adipiscing pellentesque. Quisque iaculis sed dolor aliquam lacinia. Etiam risus elit, ullamcorper sit amet mauris at, adipiscing lobortis leo. Suspendisse potenti. Integer eleifend vestibulum vestibulum. Donec malesuada purus sed urna mattis pretium. Proin libero turpis, faucibus sed sem ut, rutrum aliquam diam. Phasellus a est in elit consectetur porttitor. Proin malesuada ornare dapibus.','car1.png',2,1377350042,NULL),
	(5,22,2,NULL,'Fourth mod','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus lacinia auctor nisl, ac fermentum tellus rutrum ac. Quisque metus arcu, mollis non luctus a, adipiscing vel tortor. Nam hendrerit euismod viverra. Pellentesque sagittis non magna eget sagittis. Nullam fringilla enim quis justo elementum euismod. Praesent facilisis ante eget iaculis luctus. Nullam sem lorem, vestibulum eu elementum vel, porttitor in augue. Etiam et eleifend ante, sit amet feugiat tortor. Suspendisse et sagittis ligula, at convallis nisi. Fusce lobortis, lectus quis posuere tincidunt, mi elit malesuada erat, eu varius mi nisl ac dolor. Vivamus mauris purus, rhoncus eu fermentum et, eleifend vel magna. Cras commodo rutrum nibh, et consectetur nibh feugiat ut. Integer id vehicula justo, a fermentum odio. In accumsan ipsum eget adipiscing volutpat.','car1.png',1,1377350042,NULL),
	(6,1,1,'','Awesome Car!','This is my first post. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie in sem et congue. Duis adipiscing, felis ut tincidunt ullamcorper, nisi felis faucibus leo, rutrum rutrum risus dolor eget mi. Nullam vitae lacinia tortor. Aliquam erat volutpat. Nulla laoreet enim sit amet elit tempor, id consequat erat sollicitudin. Etiam in quam quis nisl malesuada imperdiet. Fusce hendrerit sagittis lorem, condimentum semper magna fermentum vel. Maecenas eget egestas massa. Ut bibendum molestie dui, id posuere enim gravida a. Integer quam leo, tempor id elit non, pulvinar tincidunt eros. Suspendisse sit amet augue quis ipsum euismod blandit semper eu nisl.','5d2be25dde61f7f09eaff62087244676.jpg',1,1377350042,NULL),
	(7,1,35,'spoiler,engine','New post with new car','This is me, the user adding a new car while adding a new post','bd3d47941bc0ba78d23632ba5f4f14b4.jpeg',1,1377990912,NULL),
	(11,2,35,'spoiler,engine','New post with new car','This is me, the user adding a new car while adding a new post','bd3d47941bc0ba78d23632ba5f4f14b4.jpeg',2,1377990912,NULL),
	(12,3,1,'','Awesome Car!','This is my first post. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie in sem et congue. Duis adipiscing, felis ut tincidunt ullamcorper, nisi felis faucibus leo, rutrum rutrum risus dolor eget mi. Nullam vitae lacinia tortor. Aliquam erat volutpat. Nulla laoreet enim sit amet elit tempor, id consequat erat sollicitudin. Etiam in quam quis nisl malesuada imperdiet. Fusce hendrerit sagittis lorem, condimentum semper magna fermentum vel. Maecenas eget egestas massa. Ut bibendum molestie dui, id posuere enim gravida a. Integer quam leo, tempor id elit non, pulvinar tincidunt eros. Suspendisse sit amet augue quis ipsum euismod blandit semper eu nisl.','5d2be25dde61f7f09eaff62087244676.jpg',2,1377990912,NULL),
	(13,10,2,NULL,'Fourth mod','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus lacinia auctor nisl, ac fermentum tellus rutrum ac. Quisque metus arcu, mollis non luctus a, adipiscing vel tortor. Nam hendrerit euismod viverra. Pellentesque sagittis non magna eget sagittis. Nullam fringilla enim quis justo elementum euismod. Praesent facilisis ante eget iaculis luctus. Nullam sem lorem, vestibulum eu elementum vel, porttitor in augue. Etiam et eleifend ante, sit amet feugiat tortor. Suspendisse et sagittis ligula, at convallis nisi. Fusce lobortis, lectus quis posuere tincidunt, mi elit malesuada erat, eu varius mi nisl ac dolor. Vivamus mauris purus, rhoncus eu fermentum et, eleifend vel magna. Cras commodo rutrum nibh, et consectetur nibh feugiat ut. Integer id vehicula justo, a fermentum odio. In accumsan ipsum eget adipiscing volutpat.','car1.png',2,1378594373,NULL),
	(14,1,1,'spoiler','Not an Audi','This is an awesome car!','2919285113c7f68fce5d2aa8fe3ba89b.jpg',0,1378594374,NULL),
	(15,1,35,'New post','Hope it works','Did it work?','24d676a095585c7cb144fb60a3919f6b.jpeg',0,1378789079,NULL);

/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `make_id` int(11) unsigned NOT NULL,
  `model_id` int(11) unsigned NOT NULL,
  `trim` varchar(20) DEFAULT '',
  `year` int(4) unsigned NOT NULL,
  `mods` text,
  `about` text,
  `image` varchar(255) DEFAULT NULL,
  `carname` varchar(20) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;

INSERT INTO `cars` (`id`, `user_id`, `make_id`, `model_id`, `trim`, `year`, `mods`, `about`, `image`, `carname`, `created_at`)
VALUES
	(1,1,12,182,'ZR1',2014,NULL,'Dream Car. The car I chose to have to celebrate my accomplishments in the future','poster.jpg','Dream Car',NULL),
	(2,22,12,183,'',2014,NULL,'Nice car','poster.jpg','Nice Car',NULL),
	(35,1,1,1,NULL,2008,NULL,NULL,'bd3d47941bc0ba78d23632ba5f4f14b4.jpeg',NULL,1378350042),
	(36,1,5,49,'...',2013,NULL,NULL,'d7b0250c42bee50f6c5ca83bbdd05356.png',NULL,1378790637);

/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table follows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `follows`;

CREATE TABLE `follows` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `follower` int(11) unsigned NOT NULL,
  `follow` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;

INSERT INTO `follows` (`id`, `follower`, `follow`)
VALUES
	(2,1,3),
	(3,2,1),
	(4,3,2),
	(5,4,5),
	(6,1,10),
	(7,5,6),
	(8,6,7),
	(9,7,8),
	(10,8,9),
	(11,9,10),
	(12,10,1),
	(13,1,2);

/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `article_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;

INSERT INTO `likes` (`id`, `user_id`, `article_id`)
VALUES
	(1,1,2),
	(2,2,2),
	(3,1,4),
	(5,1,6),
	(6,1,7),
	(8,1,11),
	(10,1,13),
	(11,2,13),
	(12,2,4),
	(13,2,11),
	(31,1,5),
	(32,1,12);

/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(100) DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `site` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT '',
  `poster` varchar(255) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `name`, `password`, `email`, `site`, `bio`, `birth`, `avatar`, `poster`, `last_login`, `created_at`, `updated_at`)
VALUES
	(1,'user','Carlos Sang','1a1dc91c907325c69271ddf0c944bc72','user@example.com','www.carlosexample.com','This is awesome! I\'m ready to finish this project!','1993-05-01','842efc52edbfb0ab780b1ca8ebe9e8e6.jpg','poster.jpg',1379184879,2013,2013),
	(2,'user2','Jose','1a1dc91c907325c69271ddf0c944bc72','jose@example.com',NULL,NULL,'1991-10-23','842efc52edbfb0ab780b1ca8ebe9e8e6.jpg','poster.jpg',0,2013,2013),
	(3,'user3','Joseph','1a1dc91c907325c69271ddf0c944bc72','joseph@example.com',NULL,'I have nothing to say.','1991-10-23','075b56519329257b5cd274f7fcff039f.jpg','poster.jpg',0,2013,2013),
	(4,'csang11',NULL,'1a1dc91c907325c69271ddf0c944bc72','mail@carlossang.com',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
	(5,'carsignite',NULL,'1a1dc91c907325c69271ddf0c944bc72','mail@carsignite.com',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
	(6,'coolcar','','1a1dc91c907325c69271ddf0c944bc72','coolcar@gmail.com',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
	(7,'nightcar','','1a1dc91c907325c69271ddf0c944bc72','nightcar@gmail.com',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
	(8,'carguy','','1a1dc91c907325c69271ddf0c944bc72','carguy@gmail.com',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
	(9,'carmaster','','1a1dc91c907325c69271ddf0c944bc72','carmaster@gmail.com',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL),
	(10,'csang','','1a1dc91c907325c69271ddf0c944bc72','csang.chino11@gmail.com',NULL,NULL,NULL,'a2d3b04bbd66cfbab1952b853e71170b.png',NULL,0,NULL,NULL),
	(21,'test','Carlos Sang','1a1dc91c907325c69271ddf0c944bc72','test@example.com','http://www.carlossang.com','I\'m an awesome car tuner ready to teach you how to do things right',NULL,'',NULL,NULL,NULL,NULL),
	(22,'john','John D','1a1dc91c907325c69271ddf0c944bc72','john@example.com','http://www.johndexample.com','This is my awesome page',NULL,'075b56519329257b5cd274f7fcff039f.jpg',NULL,NULL,NULL,NULL),
	(23,'example1','Example User','1a1dc91c907325c69271ddf0c944bc72','example1@example.com','www.example.com','This is an example',NULL,'a2d3b04bbd66cfbab1952b853e71170b.png',NULL,NULL,NULL,NULL),
	(24,'NewUser','New User','1a1dc91c907325c69271ddf0c944bc72','new@example.com','www.newuser.com','New user\'s bio',NULL,'0ada6b8e25d78ef25846043a38579103.png',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehicle_makes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_makes`;

CREATE TABLE `vehicle_makes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `vehicle_makes` WRITE;
/*!40000 ALTER TABLE `vehicle_makes` DISABLE KEYS */;

INSERT INTO `vehicle_makes` (`id`, `name`)
VALUES
	(1,'Acura'),
	(2,'Alfa Romeo'),
	(3,'Am General'),
	(4,'Aston Martin'),
	(5,'Audi'),
	(6,'Avanti Motors'),
	(7,'Bentley'),
	(8,'BMW'),
	(9,'Bugatti'),
	(10,'Buick'),
	(11,'Cadillac'),
	(12,'Chevrolet'),
	(13,'Chrysler'),
	(14,'Daewoo'),
	(15,'Daihatsu'),
	(16,'DeTomaso'),
	(17,'Dodge'),
	(18,'Eagle'),
	(19,'Ferrari'),
	(20,'Fiat'),
	(21,'Fisker'),
	(22,'Ford'),
	(23,'Geo'),
	(24,'GMC'),
	(25,'Honda'),
	(26,'Hummer'),
	(27,'Hyundai'),
	(28,'Infiniti'),
	(29,'International'),
	(30,'Isuzu'),
	(31,'Jaguar'),
	(32,'Jeep'),
	(33,'Kia'),
	(34,'Koenigsegg'),
	(35,'Lamborghini'),
	(36,'Land Rover'),
	(37,'Lexus'),
	(38,'Lincoln'),
	(39,'Lotus'),
	(40,'Maserati'),
	(41,'Maybach'),
	(42,'Mazda'),
	(43,'McLaren'),
	(44,'Mercedes-Benz'),
	(45,'Mercury'),
	(46,'MINI'),
	(47,'Mitsubishi'),
	(48,'Morgan'),
	(49,'Nissan'),
	(50,'Oldsmobile'),
	(51,'Panoz'),
	(52,'Peugeot'),
	(53,'Plymouth'),
	(54,'Pontiac'),
	(55,'Porsche'),
	(56,'Qvale'),
	(57,'RAM'),
	(58,'Rolls-Royce'),
	(59,'Saab'),
	(60,'Saleen'),
	(61,'Saturn'),
	(62,'Scion'),
	(63,'Smart'),
	(64,'Spyker'),
	(65,'Sterling'),
	(66,'Subaru'),
	(67,'Suzuki'),
	(68,'Tesla'),
	(69,'Toyota'),
	(70,'Volkswagen'),
	(71,'Volvo'),
	(72,'Yugo');

/*!40000 ALTER TABLE `vehicle_makes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehicle_models
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle_models`;

CREATE TABLE `vehicle_models` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `make_id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `vehicle_models` WRITE;
/*!40000 ALTER TABLE `vehicle_models` DISABLE KEYS */;

INSERT INTO `vehicle_models` (`id`, `make_id`, `name`)
VALUES
	(1,1,'CL'),
	(2,1,'ILX'),
	(3,1,'Hybrid'),
	(4,1,'Integra'),
	(5,1,'Legend'),
	(6,1,'MDX'),
	(7,1,'NSX'),
	(8,1,'RDX'),
	(9,1,'RL'),
	(10,1,'RLX'),
	(11,1,'RSX'),
	(12,1,'SLX'),
	(13,1,'TL'),
	(14,1,'TSX'),
	(15,1,'Vigor'),
	(16,1,'ZDX'),
	(17,2,'164'),
	(18,2,'8c Competizione'),
	(19,2,'Spider'),
	(20,3,'Hummer'),
	(21,4,'DB AR1 Zagato'),
	(22,4,'DB7'),
	(23,4,'DB7 Vantage'),
	(24,4,'DB9'),
	(25,4,'DBS'),
	(26,4,'Rapide'),
	(27,4,'V12 Vanquish'),
	(28,4,'V12 Vantage'),
	(29,4,'V8 Vantage'),
	(30,4,'V8 Vantage S'),
	(31,4,'Vantage'),
	(32,4,'Virage'),
	(33,5,'100'),
	(34,5,'200'),
	(35,5,'80'),
	(36,5,'90'),
	(37,5,'A3'),
	(38,5,'A4'),
	(39,5,'A5'),
	(40,5,'A6'),
	(41,5,'A7'),
	(42,5,'A8'),
	(43,5,'allroad'),
	(44,5,'Cabriolet'),
	(45,5,'Q5'),
	(46,5,'Q5 hybrid'),
	(47,5,'Q7'),
	(48,5,'quattro'),
	(49,5,'R8'),
	(50,5,'RS 4'),
	(51,5,'RS 5'),
	(52,5,'RS6'),
	(53,5,'S4'),
	(54,5,'S5'),
	(55,5,'S6'),
	(56,5,'S7'),
	(57,5,'S8'),
	(58,5,'TT'),
	(59,5,'TT RS'),
	(60,5,'TTS'),
	(61,6,'Avanti'),
	(62,7,'Arnage'),
	(63,7,'Azure'),
	(64,7,'Brooklands'),
	(65,7,'Continental'),
	(66,7,'Continental Flying Spur'),
	(67,7,'Continental GT'),
	(68,7,'Continental GTC'),
	(69,7,'Continental Supersports'),
	(70,7,'Mulsanne'),
	(71,7,'R-Type'),
	(72,7,'Turbo R'),
	(73,7,'Turbo RL'),
	(74,7,'Turbo RT'),
	(75,7,'Turbo S'),
	(76,8,'128'),
	(77,8,'135'),
	(78,8,'318'),
	(79,8,'320'),
	(80,8,'323'),
	(81,8,'325'),
	(82,8,'328'),
	(83,8,'330'),
	(84,8,'335'),
	(85,8,'M3'),
	(86,8,'525'),
	(87,8,'528'),
	(88,8,'530'),
	(89,8,'535'),
	(90,8,'535 Gran Turismo'),
	(91,8,'540'),
	(92,8,'545'),
	(93,8,'550'),
	(94,8,'550 Gran Turismo'),
	(95,8,'M5'),
	(96,8,'640'),
	(97,8,'640 Gran Coupe'),
	(98,8,'645'),
	(99,8,'650'),
	(100,8,'650 Gran Coupe'),
	(101,8,'M6'),
	(102,8,'735'),
	(103,8,'740'),
	(104,8,'745'),
	(105,8,'750'),
	(106,8,'760'),
	(107,8,'840'),
	(108,8,'850'),
	(109,8,'ActiveHybrid 3'),
	(110,8,'ActiveHybrid 5'),
	(111,8,'ActiveHybrid 740'),
	(112,8,'ActiveHybrid 750'),
	(113,8,'ActiveHybrid X6'),
	(114,8,'Alpina B7'),
	(115,8,'M'),
	(116,8,'M3'),
	(117,8,'M5'),
	(118,8,'M6'),
	(119,8,'X1'),
	(120,8,'X3'),
	(121,8,'X5'),
	(122,8,'X5 M'),
	(123,8,'X6'),
	(124,8,'X6 M'),
	(125,8,'Z3'),
	(126,8,'Z4'),
	(127,8,'Z4 M'),
	(128,8,'Z8'),
	(129,9,'Veyron 16.4'),
	(130,10,'Century'),
	(131,10,'Enclave'),
	(132,10,'Encore'),
	(133,10,'LaCrosse'),
	(134,10,'LeSabre'),
	(135,10,'Lucerne'),
	(136,10,'Park Avenue'),
	(137,10,'Rainier'),
	(138,10,'Reatta'),
	(139,10,'Regal'),
	(140,10,'Rendezvous'),
	(141,10,'Riviera'),
	(142,10,'Roadmaster'),
	(143,10,'Skylark'),
	(144,10,'Terraza'),
	(145,10,'Verano'),
	(146,11,'Allante'),
	(147,11,'ATS'),
	(148,11,'Brougham'),
	(149,11,'Catera'),
	(150,11,'CTS'),
	(151,11,'DeVille'),
	(152,11,'DTS'),
	(153,11,'Eldorado'),
	(154,11,'Escalade'),
	(155,11,'Escalade ESV'),
	(156,11,'Escalade EXT'),
	(157,11,'Escalade Hybrid'),
	(158,11,'Fleetwood'),
	(159,11,'Seville'),
	(160,11,'Sixty Special'),
	(161,11,'SRX'),
	(162,11,'STS'),
	(163,11,'XLR'),
	(164,11,'XTS'),
	(165,12,'1500'),
	(166,12,'2500'),
	(167,12,'3500'),
	(168,12,'Astro'),
	(169,12,'Avalanche'),
	(170,12,'Aveo'),
	(171,12,'Beretta'),
	(172,12,'Blazer'),
	(173,12,'Camaro'),
	(174,12,'Caprice'),
	(175,12,'Caprice Classic'),
	(176,12,'Captiva Sport'),
	(177,12,'Cavalier'),
	(178,12,'Classic'),
	(179,12,'Cobalt'),
	(180,12,'Colorado'),
	(181,12,'Corsica'),
	(182,12,'Corvette'),
	(183,12,'Cruze'),
	(184,12,'Equinox'),
	(185,12,'Express Vans'),
	(186,12,'Express 1500'),
	(187,12,'Express 2500'),
	(188,12,'Express 3500'),
	(189,12,'Van'),
	(190,12,'HHR'),
	(191,12,'Impala'),
	(192,12,'Lumina'),
	(193,12,'Lumina APV'),
	(194,12,'Malibu'),
	(195,12,'Malibu Classic'),
	(196,12,'Malibu Hybrid'),
	(197,12,'Malibu Maxx'),
	(198,12,'Metro'),
	(199,12,'Monte Carlo'),
	(200,12,'Pickup'),
	(201,12,'Prizm'),
	(202,12,'S-10'),
	(203,12,'S-10 Blazer'),
	(204,12,'Silverado 1500'),
	(205,12,'Silverado 1500 Hybrid'),
	(206,12,'Silverado 2500'),
	(207,12,'Silverado 3500'),
	(208,12,'Sonic'),
	(209,12,'Spark'),
	(210,12,'Sportvan'),
	(211,12,'SSR'),
	(212,12,'Suburban'),
	(213,12,'Tahoe'),
	(214,12,'Tahoe Hybrid'),
	(215,12,'Tracker'),
	(216,12,'TrailBlazer'),
	(217,12,'TrailBlazer EXT'),
	(218,12,'Traverse'),
	(219,12,'Uplander'),
	(220,12,'Venture'),
	(221,12,'Volt'),
	(222,13,'200'),
	(223,13,'300'),
	(224,13,'300C'),
	(225,13,'300M'),
	(226,13,'Aspen'),
	(227,13,'Aspen Hybrid'),
	(228,13,'Cirrus'),
	(229,13,'Concorde'),
	(230,13,'Crossfire'),
	(231,13,'Grand Voyager'),
	(232,13,'Imperial'),
	(233,13,'LeBaron'),
	(234,13,'LHS'),
	(235,13,'New Yorker'),
	(236,13,'Pacifica'),
	(237,13,'Prowler'),
	(238,13,'PT Cruiser'),
	(239,13,'Sebring'),
	(240,13,'TC by Maserati'),
	(241,13,'Town & Country'),
	(242,13,'Voyager'),
	(243,14,'Lanos'),
	(244,14,'Leganza'),
	(245,14,'Nubira'),
	(246,15,'Charade'),
	(247,15,'Rocky'),
	(248,16,'Mangusta'),
	(249,17,'Avenger'),
	(250,17,'Caliber'),
	(251,17,'Caravan'),
	(252,17,'Challenger'),
	(253,17,'Charger'),
	(254,17,'Colt'),
	(255,17,'D150'),
	(256,17,'D250'),
	(257,17,'D350'),
	(258,17,'Dakota'),
	(259,17,'Dart'),
	(260,17,'Daytona'),
	(261,17,'Durango'),
	(262,17,'Durango Hybrid'),
	(263,17,'Dynasty'),
	(264,17,'Grand Caravan'),
	(265,17,'Intrepid'),
	(266,17,'Journey'),
	(267,17,'Magnum'),
	(268,17,'Monaco'),
	(269,17,'Neon'),
	(270,17,'Nitro'),
	(271,17,' Ram 50'),
	(272,17,'Pickup'),
	(273,17,'Ram 1500'),
	(274,17,'Ram 2500'),
	(275,17,'Ram 3500'),
	(276,17,'Ram Van'),
	(277,17,'Ram Wagon'),
	(278,17,'Ramcharger'),
	(279,17,'Shadow'),
	(280,17,'Spirit'),
	(281,17,'Sprinter'),
	(282,17,'SRT Viper'),
	(283,17,'Stealth'),
	(284,17,'Stratus'),
	(285,17,'Van'),
	(286,17,'Viper'),
	(287,17,'W150'),
	(288,17,'W250'),
	(289,17,'W350'),
	(290,18,'Premier'),
	(291,18,'Summit'),
	(292,18,'Talon'),
	(293,18,'Vision'),
	(294,19,'348'),
	(295,19,'360 Modena'),
	(296,19,'360 Spider'),
	(297,19,'456 GT'),
	(298,19,'456 M'),
	(299,19,'458 Italia'),
	(300,19,'458 Spider'),
	(301,19,'512 M'),
	(302,19,'512 TR'),
	(303,19,'550 Barchetta'),
	(304,19,'550 Maranello'),
	(305,19,'575 M'),
	(306,19,'599 GTB Fiorano'),
	(307,19,'612 Scaglietti'),
	(308,19,'California'),
	(309,19,'Challenge Stradale'),
	(310,19,'Enzo'),
	(311,19,'F12berlinetta'),
	(312,19,'F355'),
	(313,19,'F40'),
	(314,19,'F430'),
	(315,19,'F50'),
	(316,19,'FF'),
	(317,19,'Mondial'),
	(318,19,'Mondial t'),
	(319,19,'Superamerica'),
	(320,19,'Testarossa'),
	(321,20,'500'),
	(322,20,'500C'),
	(323,21,'Karma'),
	(324,22,'Aerostar'),
	(325,22,'Aspire'),
	(326,22,'Bronco'),
	(327,22,'C-Max Energi'),
	(328,22,'C-Max Hybrid'),
	(329,22,'Club Wagon'),
	(330,22,'Contour'),
	(331,22,'Crown Victoria'),
	(332,22,'E150'),
	(333,22,'E250'),
	(334,22,'E350'),
	(335,22,'E350 Super Duty'),
	(336,22,'Van'),
	(337,22,'Edge'),
	(338,22,'Escape'),
	(339,22,'Escape Hybrid'),
	(340,22,'Escort'),
	(341,22,'Excursion'),
	(342,22,'Expedition'),
	(343,22,'Expedition EL'),
	(344,22,'Explorer'),
	(345,22,'Explorer Sport'),
	(346,22,'Explorer Sport Trac'),
	(347,22,'F150'),
	(348,22,'F250'),
	(349,22,'F350'),
	(350,22,'F450'),
	(351,22,'Pickup'),
	(352,22,'Festiva'),
	(353,22,'Fiesta'),
	(354,22,'Five Hundred'),
	(355,22,'Flex'),
	(356,22,'Focus'),
	(357,22,'Focus Electric'),
	(358,22,'Focus ST'),
	(359,22,'Freestar'),
	(360,22,'Freestyle'),
	(361,22,'Fusion'),
	(362,22,'Fusion Energi'),
	(363,22,'Fusion Hybrid'),
	(364,22,'GT'),
	(365,22,'LTD'),
	(366,22,'Mustang'),
	(367,22,'Probe'),
	(368,22,'Ranger'),
	(369,22,'Taurus'),
	(370,22,'Taurus X'),
	(371,22,'Tempo'),
	(372,22,'Thunderbird'),
	(373,22,'Transit Connect'),
	(374,22,'Windstar'),
	(375,22,'ZX2'),
	(376,23,'Metro'),
	(377,23,'Prizm'),
	(378,23,'Storm'),
	(379,23,'Tracker');

/*!40000 ALTER TABLE `vehicle_models` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
