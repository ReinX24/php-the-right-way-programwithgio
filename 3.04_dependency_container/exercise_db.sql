-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: exercise_db
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `transaction_date` date DEFAULT NULL,
  `check_number` int DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'2021-01-04',7777,'Transaction 1',150.4300),(2,'2021-01-05',0,'Transaction 2',700.2500),(3,'2021-01-06',0,'Transaction 3',-1303.9700),(4,'2021-01-07',0,'Transaction 4',46.7800),(5,'2021-01-08',0,'Transaction 5',816.8700),(6,'2021-01-11',1934,'Transaction 6',-1002.5300),(7,'2021-01-12',7307,'Transaction 7',532.2200),(8,'2021-01-13',1352,'Transaction 8',-704.5900),(9,'2021-01-14',0,'Transaction 9',98.0400),(10,'2021-01-15',0,'Transaction 10',-204.5600),(11,'2021-01-25',0,'Transaction 11',1056.2700),(12,'2021-01-26',0,'Transaction 12',550.1000),(13,'2021-01-27',0,'Transaction 13',-825.7700),(14,'2021-01-28',4250,'Transaction 14',212.6800),(15,'2021-01-29',0,'Transaction 15',195.6800),(16,'2021-02-02',9915,'Transaction 16',-463.7500),(17,'2021-02-03',0,'Transaction 17',78.0200),(18,'2021-02-04',0,'Transaction 18',268.8100),(19,'2021-02-05',0,'Transaction 19',1360.5500),(20,'2021-02-08',0,'Transaction 20',-594.4600),(21,'2021-02-09',9125,'Transaction 21',467.3900),(22,'2021-02-10',0,'Transaction 22',39.4900),(23,'2021-02-11',7929,'Transaction 23',-81.8700),(24,'2021-02-12',0,'Transaction 24',255.6400),(25,'2021-02-12',0,'Transaction 25',13.5100),(26,'2021-01-04',7777,'Transaction 1',150.4300),(27,'2021-01-05',0,'Transaction 2',700.2500),(28,'2021-01-06',0,'Transaction 3',-1303.9700),(29,'2021-01-07',0,'Transaction 4',46.7800),(30,'2021-01-08',0,'Transaction 5',816.8700),(31,'2021-01-11',1934,'Transaction 6',-1002.5300),(32,'2021-01-12',7307,'Transaction 7',532.2200),(33,'2021-01-13',1352,'Transaction 8',-704.5900),(34,'2021-01-14',0,'Transaction 9',98.0400),(35,'2021-01-15',0,'Transaction 10',-204.5600),(36,'2021-01-25',0,'Transaction 11',1056.2700),(37,'2021-01-26',0,'Transaction 12',550.1000),(38,'2021-01-27',0,'Transaction 13',-825.7700),(39,'2021-01-28',4250,'Transaction 14',212.6800),(40,'2021-01-29',0,'Transaction 15',195.6800),(41,'2021-02-02',9915,'Transaction 16',-463.7500),(42,'2021-02-03',0,'Transaction 17',78.0200),(43,'2021-02-04',0,'Transaction 18',268.8100),(44,'2021-02-05',0,'Transaction 19',1360.5500),(45,'2021-02-08',0,'Transaction 20',-594.4600),(46,'2021-02-09',9125,'Transaction 21',467.3900),(47,'2021-02-10',0,'Transaction 22',39.4900),(48,'2021-02-11',7929,'Transaction 23',-81.8700),(49,'2021-02-12',0,'Transaction 24',255.6400),(50,'2021-02-12',0,'Transaction 25',13.5100);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-01 16:05:29
