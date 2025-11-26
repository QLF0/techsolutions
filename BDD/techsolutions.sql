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
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (1,'AMD Ryzen 9 7950X3D','CPU'),(2,'G.SKILL Trident Z5 64 Go ','RAM'),(3,' Samsung 990 PRO 2TB','ssd'),(4,' NVIDIA GeForce RTX 4080 ','Carte graphique'),(5,'MSI MPG B650 EDGE WIFI ','Carte mere'),(6,'Corsair RM850x ','ALIM'),(7,'NZXT H9 Flow - Noir','Boitier'),(8,'MK295 Silent Wireless Combo ','clavier\r\nsouris'),(9,'Iiyama ProLite XUB2463HSU-B1 ','ecran'),(10,'AMD Ryzen 9 7950X','CPU'),(11,'ASUS ProArt X670E-CREATOR WIFI','Carte mère'),(12,'Kingston Server Premier DDR5 ECC Unbuffered ','Mémoire (RAM) '),(13,'Samsung 990 PRO 2TB ','Stockage '),(14,'NVIDIA GeForce RTX 4070 ','GPU'),(15,'Seasonic PRIME TX-850 v','ALIM'),(16,'Fractal Design Define 7 ','Boitier'),(17,'MK295 Silent Wireless Combo ','Clavier\r\nSouris'),(18,'Iiyama ProLite XUB2463HSU-B1 ','ecran'),(28,'Intel Core i7-14700K','CPU'),(29,'ASUS ProArt Z790-CREATOR WIFI','Carte mère'),(30,'G.SKILL Trident Z5 64 Go ','Mémoire (RAM)'),(31,'Samsung 990 PRO 2TB ','Stockage '),(32,'NVIDIA GeForce RTX 4070 ','GPU'),(33,'Corsair RM750x','ALIM'),(34,'Fractal Meshify 2 ','Boîtier'),(35,'MK295 Silent Wireless Combo ','Clavier\r\nSouris'),(36,'Huawei MarePad 11.5','Tablette '),(37,'Iiyama ProLite XUB2463HSU-B1 ','ecran'),(38,'Intel Core i5-13600K. ','CPU'),(39,'ASUS TUF GAMING Z790-PLUS WIFI ','Carte mere '),(40,'Crucial Pro 64GB (2×32GB) DDR5-5600 ','Memoire (RAM)'),(41,'Samsung 990 PRO 1TB ','Stockage '),(42,'NVIDIA GeForce GTX 1650 ','GPU'),(43,'Corsair RM750x','ALIM'),(44,'Fractal Design Define 7 ','Boiter '),(45,'MK295 Silent Wireless Combo ','clavier\r\nsouris'),(46,'Yealink UH42 MS Mono USB-CA ','Casque micro'),(47,'Iiyama ProLite XUB2463HSU-B1 ','ecran'),(48,'Intel Core i5-14500 ','CPU'),(49,'ASUS PRIME B760M-A WIFI D4 ','Carte mere '),(50,'Samsung 990 PRO 1TB ','Memoire (RAM)'),(51,'NVIDIA GeForce RTX 4060 ','Stockage '),(52,'be quiet! Pure Rock 3','GPU'),(53,'Corsair RM750x','ALIM'),(54,'Fractal Design Pop Air RGB ','Boitier '),(55,'MK295 Silent Wireless Combo ','clavier\r\nsouris'),(56,'Iiyama ProLite XUB2463HSU-B1 ','ecran'),(58,'Intel Core i5-14500 ','CPU'),(59,'ASUS PRIME B760M-A WIFI D4 ','Carte mere '),(60,'Corsair Vengeance LPX 32GB ','Memoire (RAM)'),(61,'NVIDIA GeForce GTX 1650 ','Stockage '),(62,'be quiet! Pure Rock 3','GPU'),(63,'Corsair RM750x','ALIM'),(64,'Fractal Design Define 7 ','Boitier'),(65,'MK295 Silent Wireless Combo ','clavier\r\nsouris'),(66,'Iiyama ProLite XUB2463HSU-B1 ','ecran'),(67,'Intel Core i7-14700K ','CPU'),(68,'ASUS ProArt Z790-CREATOR WIFI ','Carte mere '),(69,'G.SKILL Trident Z5 64GB ','Memoire (RAM)'),(70,'Samsung 990 PRO 2TB ','Stockage '),(71,'NVIDIA GeForce RTX 4060 Ti ','GPU'),(72,'Corsair RM850x ','ALIM'),(73,'Fractal Design Define 7 ','Boitier'),(74,'MK295 Silent Wireless Combo ','Clavier\r\nsouris '),(75,'Iiyama ProLite XUB2463HSU-B1 ','ecran'),(76,'Intel Core i5-13600K. ','CPU'),(77,'ASUS TUF GAMING Z790-PLUS WIFI ','Carte mere '),(78,'Crucial Pro 64GB (2×32GB) DDR5-5600 ','Memoire (RAM)'),(79,'Samsung 990 PRO 1TB ','Stockage '),(80,'NVIDIA GeForce GTX 1650 ','GPU'),(81,'Corsair RM750x','ALIM'),(82,'Fractal Design Define 7 ','Boitier'),(83,'MK295 Silent Wireless Combo ','Clavier\r\nsouris '),(84,'Écran 32 Pouces beetronics','ecran'),(85,'Yealink UH42 MS Mono USB-CA ','Casque micro');
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
INSERT INTO `pc_components` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(2,10),(2,11),(2,12),(2,13),(2,14),(2,15),(2,16),(2,17),(2,18),(3,28),(3,29),(3,30),(3,31),(3,32),(3,33),(3,34),(3,35),(3,36),(3,37),(4,38),(4,39),(4,40),(4,41),(4,42),(4,43),(4,44),(4,45),(4,46),(4,47),(5,48),(5,49),(5,50),(5,51),(5,52),(5,53),(5,54),(5,55),(5,56),(6,58),(6,59),(6,60),(6,61),(6,62),(6,63),(6,64),(6,65),(6,66),(7,67),(7,68),(7,69),(7,70),(7,71),(7,72),(7,73),(7,74),(7,75),(8,76),(8,77),(8,78),(8,79),(8,80),(8,81),(8,82),(8,83),(8,84),(8,85);
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
INSERT INTO `pcs` VALUES (1,'pc pour le  Développement logiciel','https://www.cybertek.fr/images_produits/62715f74-0d49-4cf1-8dce-7185ac51a6dd.jpg',0.00),(2,'pc pour la Gestion des infrastructures systèmes et réseau','https://www.modesdemploi.fr/thumbs/products/s/1853342-fractal-design-meshify-2-compact.jpg',0.00),(3,'pc pour le Design UX/UI ','https://media.ldlc.com/r1600/ld/products/00/05/74/53/LD0005745393_1.jpg',0.00),(4,'pc pour le support client ','https://www.modesdemploi.fr/thumbs/products/s/1853342-fractal-design-meshify-2-compact.jpg',0.00),(5,'pc pour le Marketing et vente ','https://media.ldlc.com/r1600/ld/products/00/05/96/20/LD0005962056.jpg',0.00),(6,'pc pour les Ressources humaines et administration ','https://www.modesdemploi.fr/thumbs/products/s/1853342-fractal-design-meshify-2-compact.jpg',0.00),(7,'pc pour la Direction ','https://www.modesdemploi.fr/thumbs/products/s/1853342-fractal-design-meshify-2-compact.jpg',0.00),(8,'pc pour le support client ayant un handicap visuel','https://www.modesdemploi.fr/thumbs/products/s/1853342-fractal-design-meshify-2-compact.jpg',0.00);
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

-- Dump completed on 2025-11-26 10:49:06
