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

-- Dumping structure for table ojtpmesda.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `ADMIN_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `USERNAME` char(50) DEFAULT NULL,
  `PASSWORD` char(255) DEFAULT NULL,
  `FULLNAME` char(100) DEFAULT NULL,
  `EMAIL_ADDRESS` char(50) DEFAULT NULL,
  `PHOTO` char(255) DEFAULT NULL,
  `CONTACT_NO` char(12) DEFAULT NULL,
  `ADMIN_STATUS` tinyint(1) unsigned DEFAULT NULL,
  `ADDRESS` char(255) DEFAULT NULL,
  `ADMIN_ROLE` tinyint(1) unsigned DEFAULT 1,
  `CREATED_AT` datetime(3) DEFAULT current_timestamp(3),
  PRIMARY KEY (`ADMIN_ID`),
  KEY `ADMIN_ROLE` (`ADMIN_ROLE`),
  CONSTRAINT `ADMIN_ROLE` FOREIGN KEY (`ADMIN_ROLE`) REFERENCES `roles` (`ROLE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
REPLACE INTO `admin` (`ADMIN_ID`, `USERNAME`, `PASSWORD`, `FULLNAME`, `EMAIL_ADDRESS`, `PHOTO`, `CONTACT_NO`, `ADMIN_STATUS`, `ADDRESS`, `ADMIN_ROLE`, `CREATED_AT`) VALUES
	(1, 'admin', '$2y$12$WkoNnzuvx19vm7i2wH/0Aest9aoJCPWc/Dvk2mJffLUnAKJwMeo92', 'Juan Dela Cruz', 'juan@delacruz.com', NULL, NULL, NULL, NULL, 1, '2020-07-03 07:33:03.729');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.company
CREATE TABLE IF NOT EXISTS `company` (
  `CID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `COMPANY_NAME` char(100) DEFAULT NULL,
  `ACRONYM` char(50) DEFAULT NULL,
  `COMPANY_ADDRESS` char(255) DEFAULT NULL,
  `COMPANY_CONTACT_NO` char(13) DEFAULT NULL,
  `CONTACT_PERSON` char(50) DEFAULT NULL,
  `LOGO` char(255) DEFAULT NULL,
  `CSTATUS` tinyint(1) unsigned DEFAULT 0 COMMENT '1 = active, 2 = suspended, 3 = deleted',
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.company: ~4 rows (approximately)
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
REPLACE INTO `company` (`CID`, `COMPANY_NAME`, `ACRONYM`, `COMPANY_ADDRESS`, `COMPANY_CONTACT_NO`, `CONTACT_PERSON`, `LOGO`, `CSTATUS`) VALUES
	(1, 'LGU Bongabong', NULL, 'Bongabong Oriental Mindoro', '0', 'lgubongabong', NULL, 1),
	(2, 'BFAR Regional Office Mimaropa', NULL, 'Le Grace Building, Sitio Calawang Brgy.Guinobatan Calapan City', '0', 'bfarmimaropa', NULL, 1),
	(3, 'Emergix', NULL, 'Batangas', '0', 'Emergix', NULL, 1),
	(4, 'BFAR', NULL, 'Guinobatan Calapan City', '255', 'Bfar', NULL, 1),
	(5, 'Admin', NULL, NULL, NULL, NULL, NULL, 3);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `POST_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `POST_TITLE` char(100) DEFAULT NULL,
  `POST_DESC` tinytext DEFAULT NULL,
  `IMAGE` tinytext DEFAULT NULL,
  `POST_STATUS` tinyint(1) unsigned DEFAULT 0,
  `POST_AT` datetime(3) DEFAULT current_timestamp(3),
  `APPROVED_AT` datetime(3) DEFAULT NULL ON UPDATE current_timestamp(3),
  `POST_BY_ADMIN` int(11) unsigned DEFAULT 0,
  `POST_BY_STUDENT` int(11) unsigned DEFAULT 0,
  `POST_BY_COMPANY` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`POST_ID`),
  KEY `POST_BY_ADMIN` (`POST_BY_ADMIN`),
  KEY `POST_BY_STUDENT` (`POST_BY_STUDENT`),
  KEY `POST_BY_COMPANY` (`POST_BY_COMPANY`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.forum: ~0 rows (approximately)
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.partners
CREATE TABLE IF NOT EXISTS `partners` (
  `PARTNERS_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `USER_PHOTO` varchar(255) DEFAULT NULL,
  `FULL_NAME` varchar(255) DEFAULT NULL,
  `GENDER` varchar(255) DEFAULT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL,
  `EMAIL_ADDRESS` varchar(255) DEFAULT NULL,
  `CONTACT_NO` char(12) DEFAULT NULL,
  `ROLE` tinyint(1) unsigned DEFAULT 2,
  `COMPANY` int(11) unsigned DEFAULT 0,
  `CREATED_AT` datetime(3) DEFAULT current_timestamp(3),
  `CREATED_BY_ADMIN` int(11) unsigned DEFAULT 0,
  PRIMARY KEY (`PARTNERS_ID`),
  KEY `COMPANY` (`COMPANY`),
  KEY `CREATED_BY_ADMIN` (`CREATED_BY_ADMIN`),
  KEY `ROLE` (`ROLE`),
  CONSTRAINT `COMPANY` FOREIGN KEY (`COMPANY`) REFERENCES `company` (`CID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CREATED_BY_ADMIN` FOREIGN KEY (`CREATED_BY_ADMIN`) REFERENCES `admin` (`ADMIN_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ROLE` FOREIGN KEY (`ROLE`) REFERENCES `roles` (`ROLE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.partners: ~1 rows (approximately)
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
REPLACE INTO `partners` (`PARTNERS_ID`, `USERNAME`, `PASSWORD`, `USER_PHOTO`, `FULL_NAME`, `GENDER`, `ADDRESS`, `EMAIL_ADDRESS`, `CONTACT_NO`, `ROLE`, `COMPANY`, `CREATED_AT`, `CREATED_BY_ADMIN`) VALUES
	(43, 'partners', '$2y$12$6TDgX2hSInYiMY5akk.xEe2j2Vs.ZkB3ftgFrr1JidkNp1fskJOgi', NULL, NULL, NULL, NULL, 'test@gmail.com', '0', 2, 1, '2020-07-04 07:18:25.313', 1);
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.requirements
CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) unsigned DEFAULT 0,
  `resume` char(255) DEFAULT NULL,
  `clearance` char(255) DEFAULT NULL,
  `waiver` char(255) DEFAULT NULL,
  `good_moral` char(255) DEFAULT NULL,
  `registration_form` char(255) DEFAULT NULL,
  `parents_consent` char(255) DEFAULT NULL,
  `resume_status` tinyint(1) unsigned DEFAULT 0,
  `clearance_status` tinyint(1) unsigned DEFAULT 0,
  `waiver_status` tinyint(1) unsigned DEFAULT 0,
  `good_moral_status` tinyint(1) unsigned DEFAULT 0,
  `registration_status` tinyint(1) unsigned DEFAULT 0,
  `consent_status` tinyint(1) unsigned DEFAULT 0,
  `status` tinyint(1) unsigned DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `studentID` (`studentID`),
  CONSTRAINT `studentID` FOREIGN KEY (`studentID`) REFERENCES `students` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.requirements: ~1 rows (approximately)
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
REPLACE INTO `requirements` (`id`, `studentID`, `resume`, `clearance`, `waiver`, `good_moral`, `registration_form`, `parents_consent`, `resume_status`, `clearance_status`, `waiver_status`, `good_moral_status`, `registration_status`, `consent_status`, `status`) VALUES
	(1, 2, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
	(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0),
	(3, 4, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `ROLE_ID` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `ROLE_NAME` char(20) DEFAULT NULL,
  `CREATED_AT` datetime(3) DEFAULT current_timestamp(3),
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`ROLE_ID`, `ROLE_NAME`, `CREATED_AT`) VALUES
	(1, 'admin', '2020-07-03 11:20:33.525'),
	(2, 'partners', '2020-07-03 11:20:33.525'),
	(3, 'student', '2020-07-03 11:20:33.525'),
	(4, 'staff', '2020-07-03 11:20:33.525');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.school_list
CREATE TABLE IF NOT EXISTS `school_list` (
  `SCHOOL_ID` int(11) unsigned NOT NULL DEFAULT 0,
  `SCHOOL_NAME` char(150) DEFAULT NULL,
  `ACRONYM` char(25) DEFAULT NULL,
  `SCHOOL_ADDRESS` tinytext DEFAULT NULL,
  `SCHOOL_STATUS` tinyint(1) unsigned DEFAULT 1,
  `CREATED_AT` datetime(3) DEFAULT current_timestamp(3),
  PRIMARY KEY (`SCHOOL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.school_list: ~0 rows (approximately)
/*!40000 ALTER TABLE `school_list` DISABLE KEYS */;
REPLACE INTO `school_list` (`SCHOOL_ID`, `SCHOOL_NAME`, `ACRONYM`, `SCHOOL_ADDRESS`, `SCHOOL_STATUS`, `CREATED_AT`) VALUES
	(1, 'Mindoro State University', 'MinSU', 'Labaan Bongabong, Oriental Mindoro', 1, '2020-07-04 08:14:26.057');
/*!40000 ALTER TABLE `school_list` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.students
CREATE TABLE IF NOT EXISTS `students` (
  `USERID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `SCHOOL_ID` int(11) unsigned DEFAULT 0,
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `USER_PHOTO` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `AGE` tinyint(2) unsigned DEFAULT 0,
  `FULL_NAME` varchar(255) DEFAULT NULL,
  `GENDER` varchar(255) DEFAULT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL,
  `EMAIL_ADDRESS` varchar(255) DEFAULT NULL,
  `CONTACT_NO` char(12) DEFAULT NULL,
  `GUARDIAN` varchar(255) DEFAULT NULL,
  `ROLE` tinyint(1) unsigned DEFAULT 3,
  `GURADIAN_NO` char(12) DEFAULT NULL,
  `STUDENT_STATUS` tinyint(1) unsigned DEFAULT 0,
  `APPLICATION_STATUS` tinyint(1) unsigned DEFAULT 0,
  `COMPANY_ID` tinyint(3) unsigned DEFAULT 0,
  `WORK_HOURS` tinyint(3) unsigned DEFAULT 0,
  PRIMARY KEY (`USERID`),
  KEY `ROLEID` (`ROLE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.students: ~2 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
REPLACE INTO `students` (`USERID`, `SCHOOL_ID`, `USERNAME`, `PASSWORD`, `USER_PHOTO`, `DOB`, `AGE`, `FULL_NAME`, `GENDER`, `ADDRESS`, `EMAIL_ADDRESS`, `CONTACT_NO`, `GUARDIAN`, `ROLE`, `GURADIAN_NO`, `STUDENT_STATUS`, `APPLICATION_STATUS`, `COMPANY_ID`, `WORK_HOURS`) VALUES
	(1, 1, 'taliffsss', '$2y$12$yic4T82nvpNnH0/bVyCDsupH07f1FUkmFRhpF9VKlZPpqmVWBdol2', NULL, NULL, 27, 'Mark Anthony Naluz', NULL, 'Sto. Niño St. Paclasan', NULL, '09055251658', NULL, 3, NULL, 1, 0, 1, 0),
	(2, 0, 'sample', '$2y$12$GSp34xv727XBc2EvgOIOBercVHQ0NHMspAZ8jGdPQhccYTe0bl7.i', NULL, NULL, 0, 'Juan Dela Cruz', NULL, 'Labasan Bongabong', NULL, '09856545646', NULL, 3, NULL, 0, 0, 0, 0),
	(3, 0, 'taliffssss', '$2y$12$P22oe35znN8u1gXTXW58YOJn1Z4RoIjREtN/qTPYuxr54SlANEs8W', NULL, NULL, 0, 'sfasf', NULL, 'asfasf asfasfa', NULL, '09546465465', NULL, 3, NULL, 0, 0, 0, 0),
	(4, 0, 'tasfas safa', '$2y$12$0KLLOIs1EGcJAf7YasTizOfNAowcuvKxmeHSUt14ssK9EQF61GgnS', NULL, NULL, 0, 'sdgsdg sdg', NULL, 'safa asfasf', NULL, '09459445465', NULL, 3, NULL, 0, 0, 0, 0);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.students_dtr
CREATE TABLE IF NOT EXISTS `students_dtr` (
  `DTR_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `STUDENTID` int(11) unsigned DEFAULT 0,
  `CHECKBY` int(11) unsigned DEFAULT 0,
  `DTR_DATE` date DEFAULT NULL,
  `DTR_HOURS` tinyint(2) unsigned DEFAULT 0,
  `DTR_STATUS` tinyint(1) unsigned DEFAULT 0,
  PRIMARY KEY (`DTR_ID`),
  KEY `CHECKBY` (`CHECKBY`),
  KEY `STUDENTIDS` (`STUDENTID`),
  CONSTRAINT `CHECKBY` FOREIGN KEY (`CHECKBY`) REFERENCES `partners` (`PARTNERS_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `STUDENTIDS` FOREIGN KEY (`STUDENTID`) REFERENCES `students` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.students_dtr: ~0 rows (approximately)
/*!40000 ALTER TABLE `students_dtr` DISABLE KEYS */;
/*!40000 ALTER TABLE `students_dtr` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.students_rating
CREATE TABLE IF NOT EXISTS `students_rating` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) unsigned DEFAULT 0,
  `rating_by` int(11) unsigned DEFAULT 0,
  `rating_1` tinyint(4) unsigned DEFAULT 0,
  `rating_2` tinyint(4) unsigned DEFAULT 0,
  `rating_3` tinyint(4) unsigned DEFAULT 0,
  `rating_4` tinyint(4) unsigned DEFAULT 0,
  `rating_5` tinyint(4) unsigned DEFAULT 0,
  `rating_6` tinyint(4) unsigned DEFAULT 0,
  `rating_7` tinyint(4) unsigned DEFAULT 0,
  `rating_8` tinyint(4) unsigned DEFAULT 0,
  `rating_9` tinyint(4) unsigned DEFAULT 0,
  `rating_10` tinyint(4) unsigned DEFAULT 0,
  `rating_11` tinyint(4) unsigned DEFAULT 0,
  `rating_12` tinyint(4) unsigned DEFAULT 0,
  `rating_status` tinyint(1) unsigned DEFAULT 0,
  `remarks` tinytext DEFAULT NULL,
  `rating_date` datetime(3) DEFAULT current_timestamp(3),
  PRIMARY KEY (`id`),
  KEY `STUDID` (`studentID`),
  KEY `rating_by` (`rating_by`),
  CONSTRAINT `STUDID` FOREIGN KEY (`studentID`) REFERENCES `students` (`USERID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rating_by` FOREIGN KEY (`rating_by`) REFERENCES `partners` (`PARTNERS_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.students_rating: ~0 rows (approximately)
/*!40000 ALTER TABLE `students_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `students_rating` ENABLE KEYS */;

-- Dumping structure for trigger ojtpmesda.requirements_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `requirements_before_insert` AFTER UPDATE ON `requirements` FOR EACH ROW BEGIN
	DECLARE rCount TINYINT(1) DEFAULT 0;
	SET rCount = (SELECT (resume_status + clearance_status + waiver_status + good_moral_status + registration_status + consent_status) as rCount FROM requirements WHERE id = NEW.id);
	IF NEW.status = 1 THEN
		UPDATE students SET STUDENT_STATUS = 2 WHERE USERID = NEW.studentID;
	ELSE
		IF rCount = 6 THEN
			UPDATE students SET STUDENT_STATUS = 1 WHERE USERID = NEW.studentID;
		END IF;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger ojtpmesda.students_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `students_after_insert` AFTER INSERT ON `students` FOR EACH ROW BEGIN
	INSERT INTO requirements (studentID) VALUES (NEW.USERID);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger ojtpmesda.students_dtr_before_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `students_dtr_before_insert` AFTER INSERT ON `students_dtr` FOR EACH ROW BEGIN
	DECLARE hours INT(5) DEFAULT 0;
	SET hours = (SELECT WORK_HOURS FROM students WHERE USERID = NEW.studentID);
	UPDATE students SET WORK_HOURS = (hours + NEW.DTR_HOURS) WHERE USERID = NEW.studentID;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
