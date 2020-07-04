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

-- Dumping structure for table ojtpmesda.students
CREATE TABLE IF NOT EXISTS `students` (
  `USERID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ROLE` tinyint(1) unsigned DEFAULT 0,
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
  `GURADIAN_NO` char(12) DEFAULT NULL,
  `STUDENT_STATUS` tinyint(1) unsigned DEFAULT 0,
  `APPLICATION_STATUS` tinyint(1) unsigned DEFAULT 0,
  `COMPANY_ID` tinyint(3) unsigned DEFAULT 0,
  `WORK_HOURS` tinyint(3) unsigned DEFAULT 0,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.students: ~31 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
REPLACE INTO `students` (`USERID`, `ROLE`, `USERNAME`, `PASSWORD`, `USER_PHOTO`, `DOB`, `AGE`, `FULL_NAME`, `GENDER`, `ADDRESS`, `EMAIL_ADDRESS`, `CONTACT_NO`, `GUARDIAN`, `GURADIAN_NO`, `STUDENT_STATUS`, `APPLICATION_STATUS`, `COMPANY_ID`, `WORK_HOURS`) VALUES
	(1, 0, 'iamrobert09', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Robert S. Maestro Jr.', 'Male', 'B. Del Mundo Mansalay', 'ilovenine097@yahoo.com', '0', 'Robert Maestro Sr.', '0', 1, 1, 1, NULL),
	(3, 0, 'Bryan', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Bryan M. Alicpala', '', 'San Jose Bongabong Oriental Mindoro', '', '0', '', '0', 0, 0, 0, 0),
	(8, 0, 'Ramosjoshua', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', 'assets/images/Capture.JPG', NULL, 26, 'Joshua Ramos', 'Female', 'Waygan Mansalay Oriental Mindoro', 'tests@example.com', '000000929496', 'Juan Dela Cruz', '0905251658', 1, 1, 0, 0),
	(13, 0, 'keyren', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Karen Manalo', '', 'Sagana Bongabong, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(14, 0, 'prettygrace', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Mary Grace Manalo', '', 'Narra Gloria Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(15, 0, 'mheggy', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Princess Concepcion', '', 'Labonan Bongabong Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(16, 0, 'ruthay', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Ruth Mae Rojero', '', 'Bansud, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(17, 0, 'maye', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Mariel Clementer', '', 'Bansud, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(18, 0, 'lene', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Ailene Jane Dela Cruz', '', 'Bulalacao, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(19, 0, 'atemae', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Princess Mae Atienza', '', 'Bulalacao, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(20, 0, 'abby', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Abegail Falogme', '', 'Cawayan Bongabong, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(21, 0, 'charm', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Charolene Manucay', '', 'Roxas Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(22, 0, 'zelle', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Krizzell Jane Maula', '', 'Bulalacao, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(23, 0, 'geann', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Regie Anne Moten', '', 'Bulalacao, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(24, 0, 'krissa', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Krissa Pedraza', '', 'San Isidro Bongabong, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(25, 0, 'lyra', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Lyra Tanuan', '', 'Cawayan Bongabong, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(26, 0, 'emmey', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Mark Angelo Abanilla', '', 'Sagana Bongabong, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(27, 0, 'lon', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Marlon Balboa', '', 'Banus Gloria Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(28, 0, 'paul', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Christian Paul Falogme', '', 'Mansalay Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(29, 0, 'vince', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Vince Daryl', '', 'Bongabong, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(30, 0, 'josh', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Joshua Hernandez', '', 'Bongabong, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(31, 0, 'mike', '$2y$12$j8EUbAsBJMv3.w/2Z5XJOOrgtkIEiA4XmWxPxux0QUglpsPdlSGiO', NULL, NULL, 0, 'Michael Hernandez', '', 'Alcadesma Bansud, Oriental Mindoro', '', '0', '', '0', 1, 0, 0, 0),
	(33, 0, 'mariellamendoza', '$2y$12$TCXO77ioYx8xghczW/4Cx.HyKJLxNOhCKS3ZBZUpavrN73PLms7ju', NULL, NULL, 0, 'Mariella Mendoza', 'Female', 'Bansud Oriental Mindoro', 'yellsmndza22@gmail.com', '09167802725', 'Manolito Mendoza', '09123174974', 1, 0, 0, 0),
	(34, 0, 'Home', '$2y$12$N5tb0cxP209Px9IFsv59qecQzm5d6qcC6U5u0D1ST89aiDjC1HEqW', NULL, NULL, 0, 'Home', NULL, 'Home', NULL, '0923647891', NULL, NULL, 1, 0, 0, 0),
	(35, 0, 'solrheabel', '$2y$12$wdT7j/mP/pQ5x3qeoeRNEO1zWyNcun6Dky5MXBtHkw2.VeduCVhKO', NULL, NULL, 0, 'Rheabel Sol', NULL, 'Bongabong Oriental Mindoro', NULL, '09157839789', NULL, NULL, 1, 0, 0, 0),
	(36, 0, 'cacholadelyn', '$2y$12$0uDE4JN1Ga3lHxUwLd4VnOh.FYeQWle./XzCiei4XayJERS3bQwYq', NULL, NULL, 0, 'Ladelyn Cacho', NULL, 'Bansud Oriental Mindoro', NULL, '09314637477', NULL, NULL, 1, 0, 0, 0),
	(37, 0, 'abanillama', '$2y$12$CmmXpLHEkG6Mw/Mzw2rNSuBkC8Y5LeG/5HHtnOM1O2O1WHWJD72Nq', NULL, NULL, 0, 'Mark Angelo Abanilla', NULL, 'Sagana Bongabong Oriental Mindoro', NULL, '09157393995', NULL, NULL, 0, 1, 0, 0),
	(38, 0, 'alicpalabryan', '$2y$12$gX2TDnzpO5lyiNGLVGT7yOMlV19tyxt0MzSgRQdECHkBlGyZ5zZxW', NULL, NULL, 0, 'Bryan Alicpala', NULL, 'Kaligtasan Bongabong Oriental Mindoro', NULL, '09569935162', NULL, NULL, 0, 1, 0, 0),
	(39, 0, 'balboamarlon', '$2y$12$tNK1U0u2/1iT861a/HBE/u1uArHlW1.1L525cgzph3K1u145vu/Kq', NULL, NULL, 0, 'Marlon Balboa', NULL, 'Banus Gloria Oriental Mindoro', NULL, '09772579722', NULL, NULL, 0, 0, 0, 0),
	(40, 0, 'falogmecp', '$2y$12$5fY5K1aInmN4Iw4I4ntsE.bopR0aGqoNagWJTVIJKUEtYgf.Vx8c.', NULL, NULL, 0, 'Christian Paul Falogme', NULL, 'Mansalay Oriental Mindoro', NULL, '09167939043', NULL, NULL, 0, 0, 0, 0),
	(41, 0, 'famorcanvd', '$2y$12$Io6Qq1GvxuVCNc6MYs1eRuTqVmGmJxeKyeIZgVsn4sJ8sn7lu7qja', NULL, NULL, 0, 'Vince Daryll Famorcan', NULL, 'Bongabong Oriental Mindoro', NULL, '09263838394', NULL, NULL, 0, 1, 0, 0);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
