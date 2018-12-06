-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: transporte
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auditoria` (
  `auditoria_id` int(4) NOT NULL AUTO_INCREMENT,
  `fecha_acceso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(30) NOT NULL DEFAULT '',
  `response_time` float NOT NULL DEFAULT '0' COMMENT 'tiempo en milisegundos',
  `endpoint` varchar(300) NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auditoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,'2018-12-05 22:34:31','fer',0.0011,'localhost/2018/Trabajo_Final/chofer/crud.php//GET','2018-12-05 22:34:31'),(2,'2018-12-05 22:49:39','fer',0.1393,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/DELETE','2018-12-05 22:49:39'),(3,'2018-12-05 22:49:46','jero',0.0008,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:46'),(4,'2018-12-05 22:49:52','jero',0.0011,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:52'),(5,'2018-12-05 22:49:54','jero',0.0009,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:54'),(6,'2018-12-05 22:49:57','jero',0.001,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:57'),(7,'2018-12-05 22:49:59','jero',0.0009,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:59'),(8,'2018-12-05 22:50:04','jero',0.0011,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:50:04'),(9,'2018-12-06 00:17:26','fer',0.0012,'localhost/2018/Trabajo_Final/chofer/crud.php//GET','2018-12-06 00:17:26'),(10,'2018-12-06 00:24:48','fer',0.202,'localhost/2018/Trabajo_Final/vehiculo/crud.php/DELETE','2018-12-06 00:24:48'),(11,'2018-12-06 00:26:03','fer',0.095,'localhost/2018/Trabajo_Final/vehiculo/crud.php/PUT','2018-12-06 00:26:03'),(12,'2018-12-06 00:29:12','fer',0.1245,'localhost/2018/Trabajo_Final/vehiculo/crud.php/PUT','2018-12-06 00:29:12'),(13,'2018-12-06 00:31:11','fer',0.0884,'localhost/2018/Trabajo_Final/vehiculo/crud.php/PUT','2018-12-06 00:31:11'),(14,'2018-12-06 16:35:34','jero',0.0014,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-06 16:35:34'),(15,'2018-12-06 16:35:39','fer',0.0461,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/POST','2018-12-06 16:35:39'),(16,'2018-12-06 16:37:01','fer',0.043,'localhost/2018/Trabajo_Final/vehiculo/crud.php/POST','2018-12-06 16:37:01'),(17,'2018-12-06 16:37:55','fer',0.001,'localhost/2018/Trabajo_Final/vehiculo/crud.php/PUT','2018-12-06 16:37:55'),(18,'2018-12-06 16:38:13','fer',0.0815,'localhost/2018/Trabajo_Final/vehiculo/crud.php/PUT','2018-12-06 16:38:13'),(19,'2018-12-06 16:39:07','fer',0.2252,'localhost/2018/Trabajo_Final/vehiculo/crud.php/POST','2018-12-06 16:39:07'),(20,'2018-12-06 16:40:45','fer',0.101,'localhost/2018/Trabajo_Final/vehiculo/crud.php/POST','2018-12-06 16:40:45'),(21,'2018-12-06 16:41:06','fer',0.1385,'localhost/2018/Trabajo_Final/vehiculo/crud.php/POST','2018-12-06 16:41:06'),(22,'2018-12-06 16:41:13','fer',0.1938,'localhost/2018/Trabajo_Final/vehiculo/crud.php/POST','2018-12-06 16:41:13'),(23,'2018-12-06 16:42:07','fer',0.1092,'localhost/2018/Trabajo_Final/vehiculo/crud.php/POST','2018-12-06 16:42:07'),(24,'2018-12-06 16:47:29','fer',0.1093,'localhost/2018/Trabajo_Final/vehiculo/crud.php/POST','2018-12-06 16:47:29'),(25,'2018-12-06 16:48:26','fer',0.0009,'localhost/2018/Trabajo_Final/chofer/crud.php//GET','2018-12-06 16:48:26'),(26,'2018-12-06 16:50:19','asd',0.0396,'localhost/2018/Trabajo_Final/chofer/crud.php//POST','2018-12-06 16:50:19'),(27,'2018-12-06 16:51:35','asd',0.0365,'localhost/2018/Trabajo_Final/chofer/crud.php//POST','2018-12-06 16:51:35'),(28,'2018-12-06 16:52:11','asd',0.0353,'localhost/2018/Trabajo_Final/chofer/crud.php//POST','2018-12-06 16:52:11'),(29,'2018-12-06 16:52:42','asd',0.0402,'localhost/2018/Trabajo_Final/chofer/crud.php//POST','2018-12-06 16:52:42'),(30,'2018-12-06 16:56:25','fer',0.2745,'localhost/2018/Trabajo_Final/vehiculo/crud.php/POST','2018-12-06 16:56:25');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chofer`
--

DROP TABLE IF EXISTS `chofer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chofer` (
  `chofer_id` int(4) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(100) NOT NULL DEFAULT '',
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `documento` decimal(11,0) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '',
  `vehiculo_id` int(4) DEFAULT NULL,
  `sistema_id` int(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`chofer_id`),
  KEY `documento` (`documento`),
  KEY `vehiculo_id` (`vehiculo_id`),
  KEY `sistema_id` (`sistema_id`),
  KEY `vehiculo_id_2` (`vehiculo_id`),
  KEY `vehiculo_id_3` (`vehiculo_id`),
  CONSTRAINT `chofer_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`vehiculo_id`),
  CONSTRAINT `chofer_ibfk_2` FOREIGN KEY (`sistema_id`) REFERENCES `sistema_transporte` (`sistema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chofer`
--

LOCK TABLES `chofer` WRITE;
/*!40000 ALTER TABLE `chofer` DISABLE KEYS */;
INSERT INTO `chofer` VALUES (1,'Taber','Jeronimo',39076345,'jerotaber@gmail.com',2,3,'2018-06-01 02:12:25','2018-12-06 16:53:52'),(2,'Appez','Matias',39000847,'matiappez@gmail.com',3,1,'2013-06-01 01:12:23','2018-12-06 16:54:16'),(3,'Videau','David',39076567,'davidvideua@gmail.com',4,2,'2018-12-06 13:55:39','2018-12-06 16:55:39'),(4,'Soria','Andres',39999999,'soriaandres@gmail.com',6,2,'2018-12-06 13:57:38','2018-12-06 16:57:38'),(5,'Isaguirre','Fernando',39088047,'feragustin-13@hotmail.com',1,5,'2018-12-06 13:50:19','2018-12-06 16:50:19'),(6,'Isaguirre','Renato',37000917,'serisa.10@gmail.com',4,2,'2018-12-06 13:51:35','2018-12-06 16:51:35'),(7,'Nuñez','Ana',16294857,'ana.nu@gmail.com',4,3,'2018-12-06 13:52:11','2018-12-06 16:52:11'),(8,'Isaguirre','Sergio',16172986,'serisa.01@gmail.com',5,4,'2018-12-06 13:52:42','2018-12-06 16:52:42');
/*!40000 ALTER TABLE `chofer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistema_transporte`
--

DROP TABLE IF EXISTS `sistema_transporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sistema_transporte` (
  `sistema_id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `pais_procedencia` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sistema_id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema_transporte`
--

LOCK TABLES `sistema_transporte` WRITE;
/*!40000 ALTER TABLE `sistema_transporte` DISABLE KEYS */;
INSERT INTO `sistema_transporte` VALUES (1,'uber','eeuu','2018-12-06 13:35:39','2018-12-06 16:35:48'),(2,'taxi','argentina','2018-12-04 20:39:34','2018-12-05 02:39:34'),(3,'cabifi','españa','2018-12-04 20:39:42','2018-12-05 02:39:42'),(4,'uber pool','eeuu','2018-12-04 20:39:52','2018-12-05 02:39:52'),(5,'remis','argentina','2018-12-04 20:40:10','2018-12-05 02:40:10');
/*!40000 ALTER TABLE `sistema_transporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistema_vehiculo`
--

DROP TABLE IF EXISTS `sistema_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sistema_vehiculo` (
  `sistemavehiculo_id` int(4) NOT NULL AUTO_INCREMENT,
  `vehiculo_id` int(4) DEFAULT NULL,
  `sistema_id` int(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sistemavehiculo_id`),
  UNIQUE KEY `vehiculo_id` (`vehiculo_id`,`sistema_id`),
  KEY `sistema_id` (`sistema_id`),
  CONSTRAINT `sistema_vehiculo_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`vehiculo_id`),
  CONSTRAINT `sistema_vehiculo_ibfk_2` FOREIGN KEY (`sistema_id`) REFERENCES `sistema_transporte` (`sistema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema_vehiculo`
--

LOCK TABLES `sistema_vehiculo` WRITE;
/*!40000 ALTER TABLE `sistema_vehiculo` DISABLE KEYS */;
INSERT INTO `sistema_vehiculo` VALUES (1,1,5,'2018-12-06 13:40:45','2018-12-06 16:40:45'),(2,1,2,'2018-12-06 13:40:45','2018-12-06 16:40:45'),(3,1,1,'2018-12-06 13:40:45','2018-12-06 16:40:45'),(4,2,1,'2018-12-06 13:41:06','2018-12-06 16:41:06'),(6,4,1,'2018-12-06 13:42:07','2018-12-06 16:42:07'),(7,4,2,'2018-12-06 13:42:07','2018-12-06 16:42:07'),(8,4,3,'2018-12-06 13:42:07','2018-12-06 16:42:07'),(9,3,1,'2018-11-27 17:06:59','2018-12-06 16:43:24'),(10,5,1,'2018-12-06 13:47:29','2018-12-06 16:47:29'),(11,5,2,'2018-12-06 13:47:29','2018-12-06 16:47:29'),(12,5,3,'2018-12-06 13:47:29','2018-12-06 16:47:29'),(13,5,4,'2018-12-06 13:47:29','2018-12-06 16:47:29'),(14,5,5,'2018-12-06 13:47:29','2018-12-06 16:47:29'),(15,6,1,'2018-12-06 13:56:24','2018-12-06 16:56:24'),(16,6,2,'2018-12-06 13:56:24','2018-12-06 16:56:24'),(17,6,3,'2018-12-06 13:56:24','2018-12-06 16:56:25'),(18,6,4,'2018-12-06 13:56:24','2018-12-06 16:56:25');
/*!40000 ALTER TABLE `sistema_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuario_id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `rol` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'fer','$2y$10$OxW3sKUj6fA4IUQ0Mohvtue/7PqIf5LthIoJl1gPzrXsGkjT8DvwK','administrador','2018-12-05 16:15:28','2018-12-05 19:15:28'),(3,'fernando','$2y$10$FikCV6PsdLsxoWY8bv9SauOSA9z5bIuLKs8iQduXASVHqbv7KQysK','administrador','2018-12-06 14:58:42','2018-12-06 16:58:42'),(4,'ana','$2y$10$RYE/itZ3OUrTy8THXSxvM.AdFTAy1B5.FTN4iE1upL0hhQ27F1pP6','administrador','2018-12-06 15:01:11','2018-12-06 17:01:11'),(5,'matias','$2y$10$aa9EH4OBUXZw8Sl.dzCIf.kyL6p0HFanV0QAtVMBHgTGxC16dBELe','usuario','2018-12-06 15:02:00','2018-12-06 17:02:00');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `vehiculo_id` int(4) NOT NULL AUTO_INCREMENT,
  `patente` varchar(10) NOT NULL DEFAULT '',
  `anho_patente` smallint(2) NOT NULL DEFAULT '0',
  `anho_fabricacion` smallint(2) NOT NULL DEFAULT '0',
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vehiculo_id`),
  UNIQUE KEY `patente_UNIQUE` (`patente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,'132',2010,2011,'Chevrolet','Aveo','2018-12-06 13:40:45','2018-12-06 16:40:45'),(2,'342',2010,2016,'Alfa Romeo','Giulia','2018-12-06 13:41:06','2018-12-06 16:41:06'),(3,'412',2013,2018,'BMW','I8','2018-11-27 17:06:59','2018-12-06 16:43:02'),(4,'555',2012,2009,'Bentley Romeo','Mulsanne','2018-12-06 13:42:07','2018-12-06 16:42:07'),(5,'999',2015,2016,'Dacia','Dokker','2018-12-06 13:47:29','2018-12-06 16:47:29'),(6,'444',2012,2008,'Ferrari','California T','2018-12-06 13:56:24','2018-12-06 16:56:24');
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-06 14:03:18
