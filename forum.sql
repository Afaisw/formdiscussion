-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `forum`;

-- Dumping structure for table forum.tb_answer
CREATE TABLE IF NOT EXISTS `tb_answer` (
  `ID_ANSWER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `JAWABAN` varchar(1024) DEFAULT NULL,
  `TANGGAL_JAWABAN` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_ANSWER`),
  KEY `FK_MEMBERIKAN` (`ID_QUESTION`),
  KEY `FK_MENJAWAB` (`ID_USER`),
  CONSTRAINT `FK_MEMBERIKAN` FOREIGN KEY (`ID_QUESTION`) REFERENCES `tb_question` (`ID_QUESTION`) ON DELETE CASCADE,
  CONSTRAINT `FK_MENJAWAB` FOREIGN KEY (`ID_USER`) REFERENCES `tb_user` (`ID_USER`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table forum.tb_question
CREATE TABLE IF NOT EXISTS `tb_question` (
  `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) NOT NULL,
  `ID_TOPIK` int(11) NOT NULL,
  `PERTANYAAN` varchar(1024) DEFAULT NULL,
  `TANGGAL_DIBUAT_QUESTION` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_QUESTION`),
  KEY `FK_MEMILIKI` (`ID_TOPIK`),
  KEY `FK_MENGAJUKAN` (`ID_USER`) USING BTREE,
  CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_TOPIK`) REFERENCES `tb_topik` (`ID_TOPIK`) ON DELETE CASCADE,
  CONSTRAINT `FK_MENGAJUKAN` FOREIGN KEY (`ID_USER`) REFERENCES `tb_user` (`ID_USER`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table forum.tb_topik
CREATE TABLE IF NOT EXISTS `tb_topik` (
  `ID_TOPIK` int(11) NOT NULL AUTO_INCREMENT,
  `JUDUL` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`ID_TOPIK`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table forum.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(64) NOT NULL,
  `FULLNAME` varchar(64) NOT NULL,
  `EMAIL` varchar(64) NOT NULL,
  `TELP` varchar(64) NOT NULL,
  `GENDER` varchar(64) NOT NULL,
  `ALAMAT` varchar(1024) NOT NULL,
  `USER_TYPE` varchar(64) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  PRIMARY KEY (`ID_USER`) USING BTREE,
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
