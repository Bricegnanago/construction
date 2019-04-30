-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.5.0.5337
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour monnaie
CREATE DATABASE IF NOT EXISTS `monnaie` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `monnaie`;

-- Listage de la structure de la table monnaie. customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `saved_At` datetime DEFAULT CURRENT_TIMESTAMP,
  `saved_By` int(11) unsigned DEFAULT NULL,
  `amount` int(11) DEFAULT '0',
  `numbers` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`saved_By`),
  CONSTRAINT `FK_customer_users` FOREIGN KEY (`saved_By`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COMMENT='C''est la table des clients ayant leur monaie enregistrée';

-- Listage des données de la table monnaie.customer : ~11 rows (environ)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `saved_At`, `saved_By`, `amount`, `numbers`) VALUES
	(1, '2019-03-09 13:45:01', 36, 0, '78127423'),
	(2, '2019-03-09 14:12:24', 36, 0, 'bjbjbjb'),
	(4, '2019-03-09 22:57:23', 36, 0, '9022229292'),
	(5, '2019-03-09 23:34:26', 37, 0, '20322003'),
	(6, '2019-03-11 14:24:24', 36, 10, '09782975'),
	(7, '2019-03-11 14:34:14', 36, 100, '78102202'),
	(11, '2019-03-12 13:31:15', 36, 0, '23122339'),
	(24, '2019-03-13 16:17:24', 36, 0, '05455009'),
	(25, '2019-03-13 22:12:28', 36, 200, '29191919'),
	(26, '2019-03-15 10:23:03', 36, 0, '08080808'),
	(27, '2019-04-25 23:07:04', 36, 675, '57156840');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Listage de la structure de la table monnaie. location
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Situation géographique de chaque point de vente';

-- Listage des données de la table monnaie.location : ~4 rows (environ)
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`id`, `nom`) VALUES
	(1, 'Marcory'),
	(2, 'Cocody'),
	(3, 'Yopougon'),
	(4, 'Bouaké');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;

-- Listage de la structure de la table monnaie. saving
CREATE TABLE IF NOT EXISTS `saving` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) unsigned DEFAULT NULL,
  `users_id` int(11) unsigned DEFAULT NULL,
  `save_At` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `FK_saving_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_saving_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Correspond à tout les enregistrements effectué par la caissière à un client donné';

-- Listage des données de la table monnaie.saving : ~0 rows (environ)
/*!40000 ALTER TABLE `saving` DISABLE KEYS */;
/*!40000 ALTER TABLE `saving` ENABLE KEYS */;

-- Listage de la structure de la table monnaie. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `location_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`),
  CONSTRAINT `FK_users_location` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Listage des données de la table monnaie.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `pwd`, `confirmed_at`, `location_id`) VALUES
	(36, 'gnanagobrice@gmail.com', 'mamson', '2019-03-02 07:17:05', 1),
	(37, 'denisgnanago@gmail.com', 'bonjour', '2019-03-08 21:30:50', 4);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
