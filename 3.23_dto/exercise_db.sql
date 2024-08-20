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
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emails` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `subject` text,
  `status` tinyint unsigned DEFAULT NULL,
  `text_body` longtext,
  `html_body` longtext,
  `meta` json DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (1,'Welcome',1,'Hello gio, \r\n\r\nThank you for signing up! ','<h1 style=\"text-align: center; color: blue;\">Welcome</h1>\r\nHello gio, \r\n<br><br>\r\nThank you for signing up! ','{\"to\": \"gio@example.com\", \"from\": \"\\\"Support\\\" <support@example.com>\"}','2024-08-06 14:56:46','2024-08-06 15:45:21'),(2,'Welcome!',1,'Hello gio, \r\n\r\nThank you for signing up! ','<h1 style=\"text-align: center; color: blue;\">Welcome</h1>\r\nHello gio, \r\n<br><br>\r\nThank you for signing up! ','{\"to\": \"gio@example.com\", \"from\": \"\\\"Support\\\" <support@example.com>\"}','2024-08-06 16:02:53','2024-08-06 16:04:08'),(3,'Welcome!',1,'Hello gio, \r\n\r\nThank you for signing up! ','<h1 style=\"text-align: center; color: blue;\">Welcome</h1>\r\nHello gio, \r\n<br><br>\r\nThank you for signing up! ','{\"to\": \"gio@gmail.com\", \"from\": \"\\\"Support\\\" <support@example.com>\", \"attachment\": {\"message\": \"Hello World!\", \"filePath\": \"/var/www/public/../storage/welcome.txt\"}}','2024-08-07 02:10:40','2024-08-07 02:18:31'),(4,'Welcome!',1,'Hello gio, \r\n\r\nThank you for signing up! ','<h1 style=\"text-align: center; color: blue;\">Welcome</h1>\r\nHello gio, \r\n<br><br>\r\nThank you for signing up! ','{\"to\": \"gio@gmail.com\", \"from\": \"\\\"Support\\\" <support@example.com>\", \"attachment\": {\"message\": \"Hello World!\", \"filePath\": \"/var/www/public/../storage/welcome.txt\"}}','2024-08-07 02:20:43','2024-08-07 02:20:49'),(5,'Welcome!',1,'Hello gio, \r\n\r\nThank you for signing up! ','<h1 style=\"text-align: center; color: blue;\">Welcome</h1>\r\nHello gio, \r\n<br><br>\r\nThank you for signing up! ','{\"to\": \"gio@gmail.com\", \"from\": \"\\\"Support\\\" <support@example.com>\", \"attachment\": {\"fileName\": \"helloworld.txt\", \"filePath\": \"/var/www/public/../storage/welcome.txt\"}}','2024-08-07 02:21:36','2024-08-07 02:21:48'),(6,'Welcome!',1,'Hello gio, \r\n\r\nThank you for signing up! ','<h1 style=\"text-align: center; color: blue;\">Welcome</h1>\r\nHello gio, \r\n<br><br>\r\nThank you for signing up! ','{\"to\": \"gio@gmail.com\", \"from\": \"\\\"Support\\\" <support@example.com>\", \"attachment\": {\"fileName\": \"helloworld.txt\", \"filePath\": \"/var/www/public/../storage/welcome.txt\"}}','2024-08-07 02:39:27','2024-08-07 02:40:01');
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_items`
--

DROP TABLE IF EXISTS `invoice_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_id` int DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_items`
--

LOCK TABLES `invoice_items` WRITE;
/*!40000 ALTER TABLE `invoice_items` DISABLE KEYS */;
INSERT INTO `invoice_items` VALUES (1,5,'Item 1',1,15.00),(2,5,'Item 2',2,7.50),(3,5,'Item 3',4,3.75),(4,6,'Item 1',1,15.00),(5,6,'Item 2',2,7.50),(6,6,'Item 3',4,3.75),(16,10,'Foo bar',1,15.00),(17,10,'Item 2',2,7.50),(18,10,'Item 3',4,3.75),(19,11,'Item 1',1,15.00),(20,11,'Item 2',2,7.50),(21,11,'Item 3',4,3.75),(22,12,'Item 1',1,15.00),(23,12,'Item 2',2,7.50),(24,12,'Item 3',4,3.75);
/*!40000 ALTER TABLE `invoice_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_number` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,5,7681.00,3,'2022-01-01 12:00:00'),(2,6,8980.72,2,'2022-01-01 00:00:00'),(3,8,980.72,1,'2022-01-31 00:00:00'),(4,9,2330.34,0,'2022-01-31 00:00:00'),(5,1,45.00,0,'2024-08-08 02:22:25'),(6,1,45.00,0,'2024-08-08 02:24:42'),(10,1,45.00,1,'2024-08-08 02:28:18'),(11,1,45.00,1,'2024-08-08 02:29:32'),(12,1,45.00,0,'2024-08-08 15:15:05');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'Ticket 1','Ticket 1 Content',25),(2,'Ticket 2','Ticket 2 Content',26),(3,'Ticket 3','Ticket 3 Content',27);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'2021-01-04',7777,'Transaction 1',150.4300),(2,'2021-01-05',NULL,'Transaction 2',700.2500),(3,'2021-01-06',NULL,'Transaction 3',-1303.9700),(4,'2021-01-07',NULL,'Transaction 4',46.7800),(5,'2021-01-08',NULL,'Transaction 5',816.8700),(6,'2021-01-11',1934,'Transaction 6',-1002.5300),(7,'2021-01-12',7307,'Transaction 7',532.2200),(8,'2021-01-13',1352,'Transaction 8',-704.5900),(9,'2021-01-14',NULL,'Transaction 9',98.0400),(10,'2021-01-15',NULL,'Transaction 10',-204.5600),(11,'2021-01-25',NULL,'Transaction 11',1056.2700),(12,'2021-01-26',NULL,'Transaction 12',550.1000),(13,'2021-01-27',NULL,'Transaction 13',-825.7700),(14,'2021-01-28',4250,'Transaction 14',212.6800),(15,'2021-01-29',NULL,'Transaction 15',195.6800),(16,'2021-02-02',9915,'Transaction 16',-463.7500),(17,'2021-02-03',NULL,'Transaction 17',78.0200),(18,'2021-02-04',NULL,'Transaction 18',268.8100),(19,'2021-02-05',NULL,'Transaction 19',1360.5500),(20,'2021-02-08',NULL,'Transaction 20',-594.4600),(21,'2021-02-09',9125,'Transaction 21',467.3900),(22,'2021-02-10',NULL,'Transaction 22',39.4900),(23,'2021-02-11',7929,'Transaction 23',-81.8700),(24,'2021-02-12',NULL,'Transaction 24',255.6400),(25,'2021-02-12',NULL,'Transaction 25',13.5100),(26,'2021-01-04',7777,'Transaction 1',150.4300),(27,'2021-01-05',NULL,'Transaction 2',700.2500),(28,'2021-01-06',NULL,'Transaction 3',-1303.9700),(29,'2021-01-07',NULL,'Transaction 4',46.7800),(30,'2021-01-08',NULL,'Transaction 5',816.8700),(31,'2021-01-11',1934,'Transaction 6',-1002.5300),(32,'2021-01-12',7307,'Transaction 7',532.2200),(33,'2021-01-13',1352,'Transaction 8',-704.5900),(34,'2021-01-14',NULL,'Transaction 9',98.0400),(35,'2021-01-15',NULL,'Transaction 10',-204.5600),(36,'2021-01-25',NULL,'Transaction 11',1056.2700),(37,'2021-01-26',NULL,'Transaction 12',550.1000),(38,'2021-01-27',NULL,'Transaction 13',-825.7700),(39,'2021-01-28',4250,'Transaction 14',212.6800),(40,'2021-01-29',NULL,'Transaction 15',195.6800),(41,'2021-02-02',9915,'Transaction 16',-463.7500),(42,'2021-02-03',NULL,'Transaction 17',78.0200),(43,'2021-02-04',NULL,'Transaction 18',268.8100),(44,'2021-02-05',NULL,'Transaction 19',1360.5500),(45,'2021-02-08',NULL,'Transaction 20',-594.4600),(46,'2021-02-09',9125,'Transaction 21',467.3900),(47,'2021-02-10',NULL,'Transaction 22',39.4900),(48,'2021-02-11',7929,'Transaction 23',-81.8700),(49,'2021-02-12',NULL,'Transaction 24',255.6400),(50,'2021-02-12',NULL,'Transaction 25',13.5100),(51,'2021-01-04',7777,'Transaction 1',150.4300),(52,'2021-01-05',NULL,'Transaction 2',700.2500),(53,'2021-01-06',NULL,'Transaction 3',-1303.9700),(54,'2021-01-07',NULL,'Transaction 4',46.7800),(55,'2021-01-08',NULL,'Transaction 5',816.8700),(56,'2021-01-11',1934,'Transaction 6',-1002.5300),(57,'2021-01-12',7307,'Transaction 7',532.2200),(58,'2021-01-13',1352,'Transaction 8',-704.5900),(59,'2021-01-14',NULL,'Transaction 9',98.0400),(60,'2021-01-15',NULL,'Transaction 10',-204.5600),(61,'2021-01-25',NULL,'Transaction 11',1056.2700),(62,'2021-01-26',NULL,'Transaction 12',550.1000),(63,'2021-01-27',NULL,'Transaction 13',-825.7700),(64,'2021-01-28',4250,'Transaction 14',212.6800),(65,'2021-01-29',NULL,'Transaction 15',195.6800),(66,'2021-02-02',9915,'Transaction 16',-463.7500),(67,'2021-02-03',NULL,'Transaction 17',78.0200),(68,'2021-02-04',NULL,'Transaction 18',268.8100),(69,'2021-02-05',NULL,'Transaction 19',1360.5500),(70,'2021-02-08',NULL,'Transaction 20',-594.4600),(71,'2021-02-09',9125,'Transaction 21',467.3900),(72,'2021-02-10',NULL,'Transaction 22',39.4900),(73,'2021-02-11',7929,'Transaction 23',-81.8700),(74,'2021-02-12',NULL,'Transaction 24',255.6400),(75,'2021-02-12',NULL,'Transaction 25',13.5100);
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

-- Dump completed on 2024-08-08 23:21:06