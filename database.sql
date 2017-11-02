-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table octs.car
CREATE TABLE IF NOT EXISTS `car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `last_lat` decimal(16,13) DEFAULT NULL,
  `last_lng` decimal(16,13) DEFAULT NULL,
  `created_at` bigint(20) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_at` bigint(20) DEFAULT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_car_user1_idx` (`created_by`),
  KEY `fk_car_user2_idx` (`updated_by`),
  CONSTRAINT `fk_car_user1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_car_user2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table octs.car: ~1 rows (approximately)
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` (`id`, `reg_no`, `model`, `driver`, `last_lat`, `last_lng`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'T232SDR', 'Toyota', 'Abdil Rashid', -6.8000881000000, 39.2387068000000, 1497701499, 1, 1497701782, 1);
/*!40000 ALTER TABLE `car` ENABLE KEYS */;

-- Dumping structure for table octs.car_log
CREATE TABLE IF NOT EXISTS `car_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(10) unsigned NOT NULL,
  `lat` decimal(16,13) DEFAULT NULL,
  `lng` decimal(16,13) DEFAULT NULL,
  `speed` decimal(9,2) DEFAULT NULL,
  `alt` decimal(9,2) DEFAULT NULL,
  `created_at` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_car_log_car_idx` (`car_id`),
  CONSTRAINT `fk_car_log_car_idx` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table octs.car_log: ~0 rows (approximately)
/*!40000 ALTER TABLE `car_log` DISABLE KEYS */;
INSERT INTO `car_log` (`id`, `car_id`, `lat`, `lng`, `speed`, `alt`, `created_at`) VALUES
	(1, 1, -6.8000881000000, 39.2387068000000, 0.00, 1000.00, 1497701782);
/*!40000 ALTER TABLE `car_log` ENABLE KEYS */;

-- Dumping structure for table octs.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(250) DEFAULT NULL,
  `password_reset_token` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` bigint(20) DEFAULT NULL,
  `updated_at` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table octs.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Abdil', 'Rashid', 'abdil@octs.co.tz', 'b_V7wM9whk_WxoMcjkGs0KqwwdZtJoj_', '$2y$13$nn6q82umQsOp8BomUzWmPeLSx8MtEnYJDtqIa7pV9Qlrkt9kgQhXe', NULL, 10, 1482695746, 1483698369);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
