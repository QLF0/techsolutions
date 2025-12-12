-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: techsolutions
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `components` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (1,'AMD Ryzen 9 7950X3D','CPU001'),(2,'MSI MPG B650 EDGE WIFI ','CM001'),(3,'G.SKILL Trident Z5 64 Go ','RAM001'),(4,'?Samsung 990 PRO 2TB','S001'),(5,' NVIDIA GeForce RTX 4080 ','GPU001'),(6,'Corsair RM850x ','A001'),(7,'NZXT H9 Flow - Noir','BO001'),(8,'MK295 Silent Wireless Combo ','C001'),(9,'MK295 Silent Wireless Combo ','S001'),(10,'Iiyama ProLite XUB2463HSU-B1 ','E001'),(11,'AMD Ryzen 9 7950X','CPU002'),(12,'ASUS ProArt X670E-CREATOR WIFI','CM002'),(13,'Kingston Server Premier DDR5 ECC Unbuffered ','RAM002'),(14,'Samsung 990 PRO 2TB ','S002'),(15,'NVIDIA GeForce RTX 4070 ','GPU002'),(16,'Seasonic PRIME TX-850 ','A002'),(17,'Fractal Design Define 7 ','BO002'),(18,'MK295 Silent Wireless Combo ','C002'),(19,'MK295 Silent Wireless Combo ','S002'),(20,'Iiyama ProLite XUB2463HSU-B1 ','E002'),(21,'Intel Core i7-14700K\n','CPU003'),(22,'ASUS ProArt Z790-CREATOR WIFI','CM003'),(23,'G.SKILL Trident Z5 64 Go ','RAM003'),(24,'Samsung 990 PRO 2TB ','S003'),(25,'NVIDIA GeForce RTX 4070 ','GPU003'),(26,'Corsair RM750x','A003'),(27,'Fractal Meshify 2 ','BO003'),(28,'MK295 Silent Wireless Combo ','C003'),(29,'MK295 Silent Wireless Combo ','S003'),(30,'Huawei MarePad 11.5','T001'),(31,'Iiyama ProLite XUB2463HSU-B1 ','E003'),(32,'Intel Core i5-13600K. ','CPU004'),(33,'ASUS TUF GAMING Z790-PLUS WIFI ','CM004'),(34,'Crucial Pro 64GB (2?32GB) DDR5-5600 ','RAM004'),(35,'Samsung 990 PRO 1TB ','S004'),(36,'NVIDIA GeForce GTX 1650 ','GPU004'),(37,'Corsair RM750x','A004'),(38,'Fractal Design Define 7 ','BO004'),(39,'MK295 Silent Wireless Combo ','C004'),(40,'MK295 Silent Wireless Combo ','S004'),(41,'Yealink UH42 MS Mono USB-CA ','CM004'),(42,'Iiyama ProLite XUB2463HSU-B1 ','E004'),(43,'Intel Core i5-14500 ','CPU005'),(44,'ASUS PRIME B760M-A WIFI D4 ','CM005'),(45,'Samsung 990 PRO 1TB ','RAM005'),(46,'NVIDIA GeForce RTX 4060 ','S005'),(47,'be quiet! Pure Rock 3','GPU005'),(48,'Corsair RM750x','A005'),(49,'Fractal Design Pop Air RGB ','BO005'),(50,'MK295 Silent Wireless Combo ','C005'),(51,'MK295 Silent Wireless Combo ','S005'),(52,'Iiyama ProLite XUB2463HSU-B1 ','E005'),(53,'Intel Core i5-14500 ','CPU006'),(54,'ASUS PRIME B760M-A WIFI D4 ','CM006'),(55,'Corsair Vengeance LPX 32GB ','RAM006'),(56,'NVIDIA GeForce GTX 1650 ','S006'),(57,'be quiet! Pure Rock 3','GPU006'),(58,'Corsair RM750x','A006'),(59,'Fractal Design Define 7 ','BO006'),(60,'MK295 Silent Wireless Combo ','C006'),(61,'MK295 Silent Wireless Combo ','S006'),(62,'Iiyama ProLite XUB2463HSU-B1 ','E006'),(63,'Intel Core i7-14700K ','CPU007'),(64,'ASUS ProArt Z790-CREATOR WIFI ','CM007'),(65,'G.SKILL Trident Z5 64GB ','RAM007'),(66,'Samsung 990 PRO 2TB ','S007'),(67,'NVIDIA GeForce RTX 4060 Ti ','GPU007'),(68,'Corsair RM850x ','A007'),(69,'Fractal Design Define 7 ','BO007'),(70,'MK295 Silent Wireless Combo ','C007'),(71,'MK295 Silent Wireless Combo ','S007'),(72,'Iiyama ProLite XUB2463HSU-B1 ','E007'),(73,'Intel Core i5-13600K. ',''),(74,'ASUS TUF GAMING Z790-PLUS WIFI ',''),(75,'Crucial Pro 64GB (2?32GB) DDR5-5600 ',''),(76,'Samsung 990 PRO 1TB ',''),(77,'NVIDIA GeForce GTX 1650 ',''),(78,'Corsair RM750x',''),(79,'Fractal Design Define 7 ',''),(80,'MK295 Silent Wireless Combo ',''),(81,'MK295 Silent Wireless Combo ',''),(82,'?cran 32 Pouces beetronics',''),(83,'Yealink UH42 MS Mono USB-CA ','');
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pc_components`
--

DROP TABLE IF EXISTS `pc_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pc_components` (
  `pc_id` int(10) unsigned NOT NULL,
  `component_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pc_id`,`component_id`),
  KEY `component_id` (`component_id`),
  CONSTRAINT `pc_components_ibfk_1` FOREIGN KEY (`pc_id`) REFERENCES `pcs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_components_ibfk_2` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pc_components`
--

LOCK TABLES `pc_components` WRITE;
/*!40000 ALTER TABLE `pc_components` DISABLE KEYS */;
INSERT INTO `pc_components` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(2,11),(2,12),(2,13),(2,14),(2,15),(2,16),(2,17),(2,18),(2,19),(2,20),(3,21),(3,22),(3,23),(3,24),(3,25),(3,26),(3,27),(3,28),(3,29),(3,30),(3,31),(4,32),(4,33),(4,34),(4,35),(4,36),(4,37),(4,38),(4,39),(4,40),(4,41),(4,42),(5,43),(5,44),(5,45),(5,46),(5,47),(5,48),(5,49),(5,50),(5,51),(5,52),(6,53),(6,54),(6,55),(6,56),(6,57),(6,58),(6,59),(6,60),(6,61),(6,62),(7,63),(7,64),(7,65),(7,66),(7,67),(7,68),(7,69),(7,70),(7,71),(7,72),(8,73),(8,74),(8,75),(8,76),(8,77),(8,78),(8,79),(8,80),(8,81),(8,82),(8,83);
/*!40000 ALTER TABLE `pc_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcs`
--

DROP TABLE IF EXISTS `pcs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcs`
--

LOCK TABLES `pcs` WRITE;
/*!40000 ALTER TABLE `pcs` DISABLE KEYS */;
INSERT INTO `pcs` VALUES (1,'pc pour le  Développement logiciel','https://media.ldlc.com/r1600/ld/products/00/06/00/63/LD0006006315.jpg',549.00),(2,'pc pour la Gestion des infrastructures systèmes et réseau','https://www.grosbill.com/images_produits/4ffc5d41-10c9-4ab0-a1f4-f7b7a7fa6df8.jpg',779.00),(3,' pc pour le Design UX/UI ','https://www.pc21.fr/img-prod/petit/FGS0352-2-2689.jpg',999.00),(4,' pc pour le support client ','https://www.grosbill.com/images_produits/4ffc5d41-...',0.00),(5,'pc pour le Marketing et vente \r\n','https://m.media-amazon.com/images/I/71i8gw20ZpL.jpg',0.00),(6,'pc pour les Ressources humaines et administration ','https://www.grosbill.com/images_produits/4ffc5d41-...',0.00),(7,'pc pour la Direction ','https://www.grosbill.com/images_produits/4ffc5d41-...',0.00),(8,'pc pour le support client ayant un handicap visuel','https://www.grosbill.com/images_produits/4ffc5d41-...',0.00);
/*!40000 ALTER TABLE `pcs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-12  9:03:28
