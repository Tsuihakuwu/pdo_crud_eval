-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.12-MariaDB-0ubuntu0.22.04.1 - Ubuntu 22.04
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour record
DROP DATABASE IF EXISTS `record`;
CREATE DATABASE IF NOT EXISTS `record` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `record`;

-- Listage de la structure de table record. artist
DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_name` varchar(255) DEFAULT NULL,
  `artist_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table record.artist : ~11 rows (environ)
DELETE FROM `artist`;
INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_url`) VALUES
	(1, 'Neil Young', ' '),
	(2, 'YES', ' '),
	(3, 'Rolling Stones', NULL),
	(4, 'Queens of the Stone Age', NULL),
	(5, 'Serge Gainsbourg', NULL),
	(6, 'AC/DC', NULL),
	(7, 'Marillion', ' '),
	(8, 'Bob Dylan', NULL),
	(9, 'Fleshtones', NULL),
	(10, 'The Clash', NULL),
	(25, 'Radiohead', 'https://radiohead.com/');

-- Listage de la structure de table record. disc
DROP TABLE IF EXISTS `disc`;
CREATE TABLE IF NOT EXISTS `disc` (
  `disc_id` int(11) NOT NULL AUTO_INCREMENT,
  `disc_title` varchar(255) DEFAULT NULL,
  `disc_year` int(11) DEFAULT NULL,
  `disc_picture` varchar(255) DEFAULT NULL,
  `disc_label` varchar(255) DEFAULT NULL,
  `disc_genre` varchar(255) DEFAULT NULL,
  `disc_price` decimal(6,2) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`disc_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `disc_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table record.disc : ~16 rows (environ)
DELETE FROM `disc`;
INSERT INTO `disc` (`disc_id`, `disc_title`, `disc_year`, `disc_picture`, `disc_label`, `disc_genre`, `disc_price`, `artist_id`) VALUES
	(1, 'Fugazi', 1984, 'Fugazi.jpeg', 'EMI', 'Prog', 14.99, 7),
	(2, 'Songs for the Deaf', 2002, 'Songs for the Deaf.jpeg', 'Interscope Records', 'Rock/Stoner', 12.99, 4),
	(3, 'Harvest Moon', 1992, 'Harvest Moon.jpeg', 'Reprise Records', 'Rock', 4.20, 1),
	(4, 'Initials BB', 1968, 'Initials BB.jpeg', 'Philips', ' Chanson, Pop Rock', 12.99, 5),
	(5, 'After the Gold Rush', 1970, 'After the Gold Rush.jpeg', ' Reprise Records', 'Country Rock', 20.00, 1),
	(6, 'Broken Arrow', 1996, 'Broken Arrow.jpeg', 'Reprise Records', ' Country Rock, Classic Rock', 15.00, 1),
	(7, 'Highway To Hell', 1979, 'Highway To Hell.jpeg', 'Atlantic', 'Hard Rock', 15.00, 6),
	(8, 'Drama', 1980, 'Drama.jpeg', 'Atlantic', 'Prog', 15.00, 2),
	(9, 'Year of the Horse', 1997, 'Year of the Horse.jpeg', 'Reprise Records', 'Country Rock, Classic Rock', 7.50, 1),
	(10, 'Ragged Glory', 1990, 'Ragged Glory.jpeg', 'Reprise Records', 'Country Rock, Grunge', 11.00, 1),
	(11, 'Rust Never Sleeps', 1979, 'Rust Never Sleeps.jpeg', 'Reprise Records', 'Classic Rock, Arena Rock', 15.00, 1),
	(12, 'Exile on main street', 1972, 'Exile on main street.jpeg', 'Rolling Stones Records', 'Blues Rock, Classic Rock', 33.00, 1),
	(13, 'London Calling', 1971, 'London Calling.jpeg', 'CBS', 'Punk, New Wave', 33.00, 10),
	(14, 'Beggars Banquet', 1968, 'Beggars Banquet.jpeg', 'Rolling Stones Records', 'Blues Rock, Classic Rock', 33.00, 1),
	(15, 'Laboratory of sound', 1995, 'Laboratory of sound.jpeg', 'Rebel Rec.', 'Rock', 33.00, 9),
	(17, 'OK Computer', 1997, 'ok-computer.jpeg', 'Parlophone', 'Rock, Rock expérimental, New prog', 27.00, 25);

-- Listage de la structure de table record. user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `usr_log` varchar(50) NOT NULL DEFAULT '',
  `usr_pwd` varchar(50) NOT NULL DEFAULT '',
  `auth_level` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Listage des données de la table record.user : ~2 rows (environ)
DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `usr_log`, `usr_pwd`, `auth_level`) VALUES
	(1, 'usr', 'usr', 0),
	(2, 'adm', 'adm', 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
