-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.7-MariaDB-1:10.4.7+maria~xenial - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ojtpmesda
CREATE DATABASE IF NOT EXISTS `ojtpmesda` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ojtpmesda`;

-- Dumping structure for table ojtpmesda.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `POST_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `POST_TITLE` char(100) DEFAULT NULL,
  `POST_DESC` tinytext DEFAULT NULL,
  `IMAGE` tinytext DEFAULT NULL,
  `POST_STATUS` tinyint(1) unsigned DEFAULT NULL,
  `POST_AT` datetime(3) DEFAULT current_timestamp(3),
  `APPROVED_AT` datetime(3) DEFAULT current_timestamp(3) ON UPDATE current_timestamp(3),
  `POST_BY_ADMIN` int(11) unsigned DEFAULT 0,
  `POST_BY_STUDENT` int(11) unsigned DEFAULT 0,
  `POST_BY_COMPANY` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`POST_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.forum: ~6 rows (approximately)
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
REPLACE INTO `forum` (`POST_ID`, `POST_TITLE`, `POST_DESC`, `IMAGE`, `POST_STATUS`, `POST_AT`, `APPROVED_AT`, `POST_BY_ADMIN`, `POST_BY_STUDENT`, `POST_BY_COMPANY`) VALUES
	(2, 'Announcement!', 'Due to the rapidly increase of COVID-19 Community Quarantine was proclaimed by our President and because of that your OJT will be permanently stop. Pls Stay at Home and be carefull. I will announce all the updates as soon as possible. Thankyou! ', NULL, 1, '2020-03-24 15:27:58.000', '2020-07-03 07:40:31.865', 1, 0, 0),
	(3, 'COVID-19', 'Keep Safe Everyone. Stay at Home if neccesary. ', NULL, 1, '2020-03-24 23:29:56.000', '2020-07-03 07:40:31.865', 1, 0, 0),
	(4, 'Covid19', 'Stay at home po muna tau wag po.muna tau magreport sa ojt natin', NULL, 1, '2020-03-25 01:34:08.000', '2020-07-03 07:40:31.865', 1, 0, 0),
	(7, 'Covid', '2weeks lockdown starting now.', NULL, 1, '2020-04-01 03:33:38.000', '2020-07-03 07:40:31.865', 1, 0, 0),
	(8, 'Submission of Documents', 'Please submit your documents on time. Thank you!', NULL, 1, '2020-06-03 14:28:47.000', '2020-07-03 08:34:07.960', 0, 0, 1),
	(12, 'Covid19 free', 'Oriental Mindoro is covid free', NULL, 1, '2020-06-30 15:49:59.000', '2020-07-03 08:34:01.648', 0, 0, 1);
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
