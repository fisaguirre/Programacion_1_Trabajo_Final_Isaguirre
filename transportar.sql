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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria`
--

LOCK TABLES `auditoria` WRITE;
/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` VALUES (1,'2018-12-05 22:34:31','fer',0.0011,'localhost/2018/Trabajo_Final/chofer/crud.php//GET','2018-12-05 22:34:31'),(2,'2018-12-05 22:49:39','fer',0.1393,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/DELETE','2018-12-05 22:49:39'),(3,'2018-12-05 22:49:46','jero',0.0008,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:46'),(4,'2018-12-05 22:49:52','jero',0.0011,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:52'),(5,'2018-12-05 22:49:54','jero',0.0009,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:54'),(6,'2018-12-05 22:49:57','jero',0.001,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:57'),(7,'2018-12-05 22:49:59','jero',0.0009,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:49:59'),(8,'2018-12-05 22:50:04','jero',0.0011,'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/GET','2018-12-05 22:50:04'),(9,'2018-12-06 00:17:26','fer',0.0012,'localhost/2018/Trabajo_Final/chofer/crud.php//GET','2018-12-06 00:17:26'),(10,'2018-12-06 00:24:48','fer',0.202,'localhost/2018/Trabajo_Final/vehiculo/crud.php/DELETE','2018-12-06 00:24:48'),(11,'2018-12-06 00:26:03','fer',0.095,'localhost/2018/Trabajo_Final/vehiculo/crud.php/PUT','2018-12-06 00:26:03'),(12,'2018-12-06 00:29:12','fer',0.1245,'localhost/2018/Trabajo_Final/vehiculo/crud.php/PUT','2018-12-06 00:29:12'),(13,'2018-12-06 00:31:11','fer',0.0884,'localhost/2018/Trabajo_Final/vehiculo/crud.php/PUT','2018-12-06 00:31:11');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chofer`
--

LOCK TABLES `chofer` WRITE;
/*!40000 ALTER TABLE `chofer` DISABLE KEYS */;
INSERT INTO `chofer` VALUES (2,'Taber','Jeronimo',39380965,'jerotaber@gmail.com',1,2,'2018-12-04 20:42:59','2018-12-05 02:42:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema_transporte`
--

LOCK TABLES `sistema_transporte` WRITE;
/*!40000 ALTER TABLE `sistema_transporte` DISABLE KEYS */;
INSERT INTO `sistema_transporte` VALUES (2,'taxi','argentina','2018-12-04 20:39:34','2018-12-05 02:39:34'),(3,'cabifi','españa','2018-12-04 20:39:42','2018-12-05 02:39:42'),(4,'uber pool','eeuu','2018-12-04 20:39:52','2018-12-05 02:39:52'),(5,'remis','argentina','2018-12-04 20:40:10','2018-12-05 02:40:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema_vehiculo`
--

LOCK TABLES `sistema_vehiculo` WRITE;
/*!40000 ALTER TABLE `sistema_vehiculo` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'fer','$2y$10$OxW3sKUj6fA4IUQ0Mohvtue/7PqIf5LthIoJl1gPzrXsGkjT8DvwK','administrador','2018-12-05 16:15:28','2018-12-05 19:15:28'),(2,'jero','$2y$10$N43bKqBdd4Yn0wG0GE3pqOXfR98qgQ05pjCuZi5Vx/nA9Pc1tb/Fa','usuario','2018-12-05 16:23:25','2018-12-05 19:23:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (1,'221',133,1,'1','122','2018-12-04 20:40:53','2018-12-06 00:26:03');
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

-- Dump completed on 2018-12-05 22:28:36
