-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for tasks
CREATE DATABASE IF NOT EXISTS `tasks` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tasks`;

-- Dumping structure for table tasks.task_infor
CREATE TABLE IF NOT EXISTS `task_infor` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `t_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `t_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tasks.task_infor: ~4 rows (approximately)
INSERT INTO `task_infor` (`t_id`, `t_title`, `t_description`, `start_time`, `end_time`, `status`) VALUES
	(1, 'title 1', 'description 1', '2023-01-01 00:00:00', '2023-02-02 00:00:00', 0),
	(5, 'title 5', 'description 5', '2023-10-18 12:00:00', '2023-10-31 12:00:00', 2),
	(7, 'title 7', 'description 7', '2023-10-17 12:12:00', '2023-10-30 12:00:00', 2),
	(15, 'haido', 'haido', '2023-10-03 12:00:00', '2023-10-24 12:00:00', 2),
	(16, 'hai123', 'hai123', '2023-10-03 12:00:00', '2023-10-30 12:00:00', 0);

-- Dumping structure for table tasks.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table tasks.users: ~3 rows (approximately)
INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
	(7, 'admin', '$2y$10$9DSWhU0NjkulpRuWDRH3Lu.G4CYCGfhRID8z/qtcpkoevPm/FojHa', 'test@gmail.com'),
	(8, 'haido', '$2y$10$8WezRzqUAGBhrkRGw6uD9eGMSmv151cX4JX/nWv6EsBA1jca6y1Au', 'test@gmail.com'),
	(9, 'demo123', '$2y$10$VWgcvkudCyMc1TlQaY7NuO8Vv9g6yy2D6tl1zrHGVTu16tAPZz8A.', 'test@gmail.com'),
	(10, 'admin123', '$2y$10$BlDuUpMP40yzWBXg8eBQou7C0ARJ7DcBCUC7uSxe/LLQIzRry.MqS', 'hai@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
