-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.17-MariaDB-1:10.3.17+maria~bionic - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ant
CREATE DATABASE IF NOT EXISTS `ant` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ant`;

-- Dumping structure for table ant.depot
CREATE TABLE IF NOT EXISTS `depot` (
  `depot_id` int(11) NOT NULL AUTO_INCREMENT,
  `depot_nama` varchar(255) DEFAULT NULL,
  `depot_alamat` varchar(50) DEFAULT NULL,
  `depot_pic` varchar(50) DEFAULT NULL,
  `depot_notlp` varchar(50) DEFAULT NULL,
  `depot_latlng` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`depot_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table ant.depot: 5 rows
DELETE FROM `depot`;
/*!40000 ALTER TABLE `depot` DISABLE KEYS */;
INSERT INTO `depot` (`depot_id`, `depot_nama`, `depot_alamat`, `depot_pic`, `depot_notlp`, `depot_latlng`) VALUES
	(4, 'B', 'B', 'B', 'B', '-6.19029899911729, 106.83946195483395'),
	(3, 'A', 'A', 'A', 'A', '-6.17511, 106.86503949999997'),
	(5, 'C', 'C', 'C', 'C', '-6.1954187880969185, 106.87860074877926'),
	(6, 'D', 'D', 'D', 'D', '-6.238934985250859, 106.82933393359372'),
	(7, 'rabani', 'rabani', 'boy', '0897276353746', '-6.192816234902397, 106.88435140490719');
/*!40000 ALTER TABLE `depot` ENABLE KEYS */;

-- Dumping structure for table ant.node
CREATE TABLE IF NOT EXISTS `node` (
  `node_id` int(11) NOT NULL AUTO_INCREMENT,
  `node_name` varchar(50) DEFAULT NULL,
  `node_latlng` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`node_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table ant.node: 5 rows
DELETE FROM `node`;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
INSERT INTO `node` (`node_id`, `node_name`, `node_latlng`, `pic`) VALUES
	(2, 'a', '-6.17511, 106.86503949999997', 'a'),
	(3, 'b', '-6.193370878462219, 106.85697141528317', 'b'),
	(4, 'ace hardware', '-6.191371269059237, 106.84866070747375', 'lala'),
	(5, 'boy', '-6.197978663966072, 106.82950559497067', 'boy'),
	(6, 'monik', '-6.17016068140937, 106.83139387011715', 'mnik');
/*!40000 ALTER TABLE `node` ENABLE KEYS */;

-- Dumping structure for table ant.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_alamat` varchar(255) DEFAULT NULL,
  `user_tlp` varchar(255) DEFAULT NULL,
  `user_username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ant.user: 2 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_alamat`, `user_tlp`, `user_username`, `user_password`, `level`) VALUES
	(1, 'Administrator', 'admin@gmail.com', NULL, NULL, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL),
	(3, 'Yulia Fitriani', 'admin@gmail.com', 'Jakarta', '0812343433', 'yulia', 'e10adc3949ba59abbe56e057f20f883e', 'Customer Service');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
