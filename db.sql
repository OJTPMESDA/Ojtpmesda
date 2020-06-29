-- --------------------------------------------------------
-- Host:                         157.230.241.122
-- Server version:               10.4.12-MariaDB-1:10.4.12+maria~bionic-log - mariadb.org binary distribution
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` tinyint(11) unsigned DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT 0,
  `user_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
REPLACE INTO `admin` (`id`, `company_name`, `address`, `contact_no`, `username`, `password`, `status`, `user_image`) VALUES
	(1, 'LGU Bongabong', 'Bongabong Oriental Mindoro', 0, 'lgubongabong', 'lgubongabong', 1, 'no_image.png'),
	(2, 'BFAR Regional Office Mimaropa', 'Le Grace Building, Sitio Calawang Brgy.Guinobatan Calapan City', 0, 'bfarmimaropa', 'bfarmimaropa', 1, 'no_image.png'),
	(3, 'Emergix', 'Batangas', 0, 'Emergix', 'emergix123', 1, 'no_image.png');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.main_admin
CREATE TABLE IF NOT EXISTS `main_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL,
  `password` char(255) DEFAULT NULL,
  `admin_image` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.main_admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `main_admin` DISABLE KEYS */;
REPLACE INTO `main_admin` (`id`, `username`, `password`, `admin_image`) VALUES
	(1, 'Admin', 'password123', 'no_image.png');
/*!40000 ALTER TABLE `main_admin` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) DEFAULT NULL,
  `post_body` varchar(255) DEFAULT NULL,
  `post_date` datetime DEFAULT current_timestamp(),
  `post_by` varchar(255) DEFAULT NULL,
  `post_status` tinyint(1) unsigned DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_image_content` varchar(255) DEFAULT NULL,
  `post_from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.post: ~2 rows (approximately)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
REPLACE INTO `post` (`id`, `post_title`, `post_body`, `post_date`, `post_by`, `post_status`, `post_image`, `post_image_content`, `post_from`) VALUES
	(2, 'Announcement! ', 'Due to the rapidly increase of COVID-19 Community Quarantine was proclaimed by our President and because of that your OJT will be permanently stop. Pls Stay at Home and be carefull. I will announce all the updates as soon as possible. Thankyou! ', '2020-03-24 15:27:58', 'Admin', 1, 'no_image.png', 'no_images.png', ''),
	(3, 'COVID-19', 'Keep Safe Everyone. Stay at Home if neccesary. ', '2020-03-24 23:29:56', 'Iamrobert09', 1, 'id.jpg', 'no_images.png', '1'),
	(4, 'Covid19', 'Stay at home po muna tau wag po.muna tau magreport sa ojt natin', '2020-03-25 01:34:08', 'admin', 1, 'no_image.png', 'no_images.png', ''),
	(7, 'Covid', '2weeks lockdown starting now.', '2020-04-01 03:33:38', 'admin', 1, 'no_image.png', 'no_images.png', ''),
	(8, 'Submission of Documents', 'Please submit your documents on time. Thank you!', '2020-06-03 14:28:47', 'admin', 1, 'no_image.png', 'no_images.png', ''),
	(9, 'Announcement', 'Free webinar', '2020-06-04 05:16:34', 'admin', 1, 'no_image.png', 'no_images.png', '');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.requirements
CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) unsigned DEFAULT 0,
  `username` char(50) DEFAULT NULL,
  `resume` char(255) DEFAULT NULL,
  `clearance` char(255) DEFAULT NULL,
  `waiver` char(255) DEFAULT NULL,
  `good_moral` char(255) DEFAULT NULL,
  `registration_form` char(255) DEFAULT NULL,
  `parents_consent` char(255) DEFAULT NULL,
  `resume_status` tinyint(1) unsigned DEFAULT NULL,
  `clearance_status` tinyint(1) unsigned DEFAULT NULL,
  `waiver_status` tinyint(1) unsigned DEFAULT NULL,
  `good_moral_status` tinyint(1) unsigned DEFAULT NULL,
  `registration_status` tinyint(1) unsigned DEFAULT NULL,
  `consent_status` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.requirements: ~23 rows (approximately)
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
REPLACE INTO `requirements` (`id`, `studentID`, `username`, `resume`, `clearance`, `waiver`, `good_moral`, `registration_form`, `parents_consent`, `resume_status`, `clearance_status`, `waiver_status`, `good_moral_status`, `registration_status`, `consent_status`) VALUES
	(1, 0, 'iamrobert09', 'brgyclearance010.pdf', 'brgyclearance010.pdf', 'brgyclearance010.pdf', 'brgyclearance010.pdf', 'brgyclearance010.pdf', 'brgyclearance010.pdf', 1, 1, 1, 1, 1, 1),
	(3, 0, 'bryan', 'resume.pdf', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 1, 0, 0, 0, 0, 0),
	(7, 0, 'Ramosjoshua', 'Engineer-Web.pdf', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 1, 0, 0, 0, 0, 0),
	(11, 0, 'yellamndza', 'RESUME.pdf', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 1, 0, 0, 0, 0, 0),
	(12, 0, 'keyren', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(13, 0, 'prettygrace', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(14, 0, 'mheggy', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(15, 0, 'ruthay', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(16, 0, 'maye', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(17, 0, 'lene', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(18, 0, 'atemae', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(19, 0, 'abby', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(20, 0, 'charm', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(21, 0, 'zelle', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(22, 0, 'geann', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(23, 0, 'krissa', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(24, 0, 'lyra', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(25, 0, 'emmey', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(26, 0, 'lon', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(27, 0, 'paul', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(28, 0, 'vince', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(29, 0, 'josh', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0),
	(30, 0, 'mike', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 'no_pdf.png', 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int(11) unsigned DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `contact_no` bigint(11) unsigned DEFAULT NULL,
  `parents` varchar(255) DEFAULT NULL,
  `parents_contact_no` bigint(11) unsigned DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) unsigned DEFAULT NULL,
  `pending` int(11) unsigned DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `company` int(11) unsigned DEFAULT NULL,
  `total_hours` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.students: ~23 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
REPLACE INTO `students` (`id`, `name`, `gender`, `age`, `address`, `email_address`, `contact_no`, `parents`, `parents_contact_no`, `username`, `password`, `status`, `pending`, `user_image`, `company`, `total_hours`) VALUES
	(1, 'Robert S. Maestro Jr.', 'Male', 23, 'B. Del Mundo Mansalay', 'ilovenine097@yahoo.com', 9465410631, 'Robert Maestro Sr.', 9095757119, 'iamrobert09', 'rajonrondo09', 1, 1, 'id.jpg', 1, 8),
	(3, 'Bryan M. Alicpala', '', 0, 'San Jose Bongabong Oriental Mindoro', '', 9569935162, '', 0, 'Bryan', 'bryan123', 0, 0, 'no_image.png', 0, 0),
	(8, 'Joshua Ramos', '', 0, 'Waygan Mansalay Oriental Mindoro', '', 9095757119, '', 0, 'Ramosjoshua', 'ramosjoshua', 0, 0, 'no_image.png', 0, 0),
	(12, 'Mariella Mendoza', '', 0, 'Bansud, Oriental Mindoro', '', 9167802725, '', 0, 'yellamndza', 'yellamndza', 0, 0, 'no_image.png', 0, 0),
	(13, 'Karen Manalo', '', 0, 'Sagana Bongabong, Oriental Mindoro', '', 9362482624, '', 0, 'keyren', 'keyren', 0, 0, 'no_image.png', 0, 0),
	(14, 'Mary Grace Manalo', '', 0, 'Narra Gloria Oriental Mindoro', '', 9970812163, '', 0, 'prettygrace', 'prettygrace', 0, 0, 'no_image.png', 0, 0),
	(15, 'Princess Concepcion', '', 0, 'Labonan Bongabong Oriental Mindoro', '', 9263781191, '', 0, 'mheggy', 'mheggy', 0, 0, 'no_image.png', 0, 0),
	(16, 'Ruth Mae Rojero', '', 0, 'Bansud, Oriental Mindoro', '', 9356568804, '', 0, 'ruthay', 'ruthay', 0, 0, 'no_image.png', 0, 0),
	(17, 'Mariel Clementer', '', 0, 'Bansud, Oriental Mindoro', '', 9454869936, '', 0, 'maye', 'maye', 0, 0, 'no_image.png', 0, 0),
	(18, 'Ailene Jane Dela Cruz', '', 0, 'Bulalacao, Oriental Mindoro', '', 9058059827, '', 0, 'lene', 'lene', 0, 0, 'no_image.png', 0, 0),
	(19, 'Princess Mae Atienza', '', 0, 'Bulalacao, Oriental Mindoro', '', 9369079548, '', 0, 'atemae', 'atemae', 0, 0, 'no_image.png', 0, 0),
	(20, 'Abegail Falogme', '', 0, 'Cawayan Bongabong, Oriental Mindoro', '', 9069369344, '', 0, 'abby', 'abby', 0, 0, 'no_image.png', 0, 0),
	(21, 'Charolene Manucay', '', 0, 'Roxas Oriental Mindoro', '', 9650414412, '', 0, 'charm', 'charm', 0, 0, 'no_image.png', 0, 0),
	(22, 'Krizzell Jane Maula', '', 0, 'Bulalacao, Oriental Mindoro', '', 9357554767, '', 0, 'zelle', 'zelle', 0, 0, 'no_image.png', 0, 0),
	(23, 'Regie Anne Moten', '', 0, 'Bulalacao, Oriental Mindoro', '', 9057689200, '', 0, 'geann', 'geann', 0, 0, 'no_image.png', 0, 0),
	(24, 'Krissa Pedraza', '', 0, 'San Isidro Bongabong, Oriental Mindoro', '', 9263780538, '', 0, 'krissa', 'krissa', 0, 0, 'no_image.png', 0, 0),
	(25, 'Lyra Tanuan', '', 0, 'Cawayan Bongabong, Oriental Mindoro', '', 9069637535, '', 0, 'lyra', 'lyra', 0, 0, 'no_image.png', 0, 0),
	(26, 'Mark Angelo Abanilla', '', 0, 'Sagana Bongabong, Oriental Mindoro', '', 9213567890, '', 0, 'emmey', 'emmey', 0, 0, 'no_image.png', 0, 0),
	(27, 'Marlon Balboa', '', 0, 'Banus Gloria Oriental Mindoro', '', 9432791801, '', 0, 'lon', 'lon', 0, 0, 'no_image.png', 0, 0),
	(28, 'Christian Paul Falogme', '', 0, 'Mansalay Oriental Mindoro', '', 9357890654, '', 0, 'paul', 'paul', 0, 0, 'no_image.png', 0, 0),
	(29, 'Vince Daryl', '', 0, 'Bongabong, Oriental Mindoro', '', 9874353672, '', 0, 'vince', 'vince', 0, 0, 'no_image.png', 0, 0),
	(30, 'Joshua Hernandez', '', 0, 'Bongabong, Oriental Mindoro', '', 9124632839, '', 0, 'josh', 'josh', 0, 0, 'no_image.png', 0, 0),
	(31, 'Michael Hernandez', '', 0, 'Alcadesma Bansud, Oriental Mindoro', '', 9652788829, '', 0, 'mike', 'mike', 0, 0, 'no_image.png', 0, 0);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.students_dtr
CREATE TABLE IF NOT EXISTS `students_dtr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `student_username` varchar(255) DEFAULT NULL,
  `check_by` varchar(255) DEFAULT NULL,
  `ojt_date` date DEFAULT NULL,
  `ojt_hours` tinyint(2) unsigned DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.students_dtr: ~0 rows (approximately)
/*!40000 ALTER TABLE `students_dtr` DISABLE KEYS */;
REPLACE INTO `students_dtr` (`id`, `student_username`, `check_by`, `ojt_date`, `ojt_hours`) VALUES
	(1, 'iamrobert09', 'Lgubongabong', '2020-03-24', 8);
/*!40000 ALTER TABLE `students_dtr` ENABLE KEYS */;

-- Dumping structure for table ojtpmesda.students_rating
CREATE TABLE IF NOT EXISTS `students_rating` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `rating_1` int(11) unsigned DEFAULT 0,
  `rating_date` timestamp NULL DEFAULT current_timestamp(),
  `rating_2` int(11) unsigned DEFAULT 0,
  `rating_3` int(11) DEFAULT 0,
  `rating_4` int(11) unsigned DEFAULT 0,
  `rating_5` int(11) unsigned DEFAULT 0,
  `rating_6` int(11) unsigned DEFAULT 0,
  `rating_7` int(11) unsigned DEFAULT 0,
  `rating_8` int(11) unsigned DEFAULT 0,
  `rating_9` int(11) unsigned DEFAULT 0,
  `rating_10` int(11) unsigned DEFAULT 0,
  `rating_11` int(11) unsigned DEFAULT 0,
  `rating_12` int(11) unsigned DEFAULT 0,
  `remarks` char(255) DEFAULT NULL,
  `rating_by` char(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ojtpmesda.students_rating: ~0 rows (approximately)
/*!40000 ALTER TABLE `students_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `students_rating` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
