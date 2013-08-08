# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: carsignite
# Generation Time: 2013-08-08 01:11:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(11) unsigned NOT NULL,
  `make` int(11) unsigned NOT NULL,
  `model` int(11) unsigned NOT NULL,
  `trim` varchar(20) DEFAULT '',
  `year` int(4) unsigned NOT NULL,
  `mods` text,
  `about` text,
  `image` varchar(255) DEFAULT NULL,
  `carname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `make` (`make`),
  KEY `model` (`model`),
  CONSTRAINT `cars_ibfk_3` FOREIGN KEY (`model`) REFERENCES `models` (`id`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`make`) REFERENCES `makes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table follows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `follows`;

CREATE TABLE `follows` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `follower` int(11) unsigned NOT NULL,
  `follow` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `follower` (`follower`),
  KEY `follow` (`follow`),
  CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`follow`) REFERENCES `users` (`id`),
  CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`follower`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;

INSERT INTO `follows` (`id`, `follower`, `follow`)
VALUES
	(1,1,2),
	(2,1,3),
	(3,2,1),
	(4,3,2);

/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(11) unsigned NOT NULL,
  `post` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `post` (`post`),
  CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post`) REFERENCES `posts` (`id`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table makes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `makes`;

CREATE TABLE `makes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `make` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `makes` WRITE;
/*!40000 ALTER TABLE `makes` DISABLE KEYS */;

INSERT INTO `makes` (`id`, `make`)
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

/*!40000 ALTER TABLE `makes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table models
# ------------------------------------------------------------

DROP TABLE IF EXISTS `models`;

CREATE TABLE `models` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `make` int(11) unsigned NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `make` (`make`),
  CONSTRAINT `models_ibfk_1` FOREIGN KEY (`make`) REFERENCES `makes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;

INSERT INTO `models` (`id`, `make`, `model`)
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
	(75,7,'Turbo S');

/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(11) unsigned NOT NULL,
  `car` int(11) unsigned NOT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `images` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `car` (`car`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`car`) REFERENCES `cars` (`id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `name`, `password`, `email`, `birth`, `avatar`, `poster`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'user','Carlos','pass','csang.chino11@gmail.com','1993-05-01','avatar.jpg','poster.jpg','2013-08-06 18:45:25','2013-08-06 18:47:22',NULL),
	(2,'user2','Jose','pass','jose@example.com','1991-10-23','avatar2.jpg','poster2.jpg','2013-08-06 18:55:25','2013-08-06 18:47:49',NULL),
	(3,'user3','Joseph','pass','joseph@example.com','1991-10-23','avatar3.jpg','poster3.jpg','2013-08-06 18:59:30','2013-08-06 18:48:00',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
