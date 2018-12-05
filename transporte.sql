-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2018 a las 20:35:57
-- Versión del servidor: 5.7.24-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transporte`
--
CREATE DATABASE IF NOT EXISTS `transporte` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `transporte`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
CREATE TABLE IF NOT EXISTS `auditoria` (
  `auditoria_id` int(4) NOT NULL AUTO_INCREMENT,
  `fecha_acceso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(30) NOT NULL DEFAULT '',
  `response_time` float NOT NULL DEFAULT '0' COMMENT 'tiempo en milisegundos',
  `endpoint` varchar(300) NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`auditoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`auditoria_id`, `fecha_acceso`, `user`, `response_time`, `endpoint`, `created`) VALUES
(1, '2018-12-05 22:34:31', 'fer', 0.0011, 'localhost/2018/Trabajo_Final/chofer/crud.php//GET', '2018-12-05 22:34:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

DROP TABLE IF EXISTS `chofer`;
CREATE TABLE IF NOT EXISTS `chofer` (
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
  KEY `vehiculo_id_3` (`vehiculo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chofer`
--

INSERT INTO `chofer` (`chofer_id`, `apellido`, `nombre`, `documento`, `email`, `vehiculo_id`, `sistema_id`, `created`, `updated`) VALUES
(1, 'Videau', 'David', '26907032', 'davis@gmail.com', 1, 1, '2018-12-04 20:42:38', '2018-12-05 02:42:38'),
(2, 'Taber', 'Jeronimo', '39380965', 'jerotaber@gmail.com', 1, 2, '2018-12-04 20:42:59', '2018-12-05 02:42:59'),
(3, 'Isaguirre', 'Fernando', '39372681', 'fernando@gmail.com', 2, 2, '2018-12-04 20:43:25', '2018-12-05 02:43:25'),
(4, 'Soria', 'Andres', '40374294', 'fandres@gmail.com', 3, 1, '2018-12-04 20:45:33', '2018-12-05 02:45:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_transporte`
--

DROP TABLE IF EXISTS `sistema_transporte`;
CREATE TABLE IF NOT EXISTS `sistema_transporte` (
  `sistema_id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `pais_procedencia` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sistema_id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sistema_transporte`
--

INSERT INTO `sistema_transporte` (`sistema_id`, `nombre`, `pais_procedencia`, `created`, `updated`) VALUES
(1, 'uber', 'eeuu', '2018-12-04 20:39:16', '2018-12-05 02:39:16'),
(2, 'taxi', 'argentina', '2018-12-04 20:39:34', '2018-12-05 02:39:34'),
(3, 'cabifi', 'españa', '2018-12-04 20:39:42', '2018-12-05 02:39:42'),
(4, 'uber pool', 'eeuu', '2018-12-04 20:39:52', '2018-12-05 02:39:52'),
(5, 'remis', 'argentina', '2018-12-04 20:40:10', '2018-12-05 02:40:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_vehiculo`
--

DROP TABLE IF EXISTS `sistema_vehiculo`;
CREATE TABLE IF NOT EXISTS `sistema_vehiculo` (
  `sistemavehiculo_id` int(4) NOT NULL AUTO_INCREMENT,
  `vehiculo_id` int(4) DEFAULT NULL,
  `sistema_id` int(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sistemavehiculo_id`),
  UNIQUE KEY `vehiculo_id` (`vehiculo_id`,`sistema_id`),
  KEY `sistema_id` (`sistema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sistema_vehiculo`
--

INSERT INTO `sistema_vehiculo` (`sistemavehiculo_id`, `vehiculo_id`, `sistema_id`, `created`, `updated`) VALUES
(5, 1, 1, '2018-12-04 20:40:53', '2018-12-05 02:40:53'),
(6, 1, 2, '2018-12-04 20:40:53', '2018-12-05 02:40:53'),
(7, 1, 3, '2018-12-04 20:40:53', '2018-12-05 02:40:53'),
(8, 1, 4, '2018-12-04 20:40:53', '2018-12-05 02:40:53'),
(9, 2, 1, '2018-12-04 20:41:28', '2018-12-05 02:41:28'),
(10, 2, 2, '2018-12-04 20:41:28', '2018-12-05 02:41:28'),
(11, 2, 4, '2018-12-04 20:41:28', '2018-12-05 02:41:28'),
(12, 3, 1, '2018-12-04 20:42:00', '2018-12-05 02:42:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `rol` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre`, `clave`, `rol`, `created`, `updated`) VALUES
(1, 'fer', '$2y$10$OxW3sKUj6fA4IUQ0Mohvtue/7PqIf5LthIoJl1gPzrXsGkjT8DvwK', 'administrador', '2018-12-05 16:15:28', '2018-12-05 19:15:28'),
(2, 'jero', '$2y$10$N43bKqBdd4Yn0wG0GE3pqOXfR98qgQ05pjCuZi5Vx/nA9Pc1tb/Fa', 'usuario', '2018-12-05 16:23:25', '2018-12-05 19:23:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE IF NOT EXISTS `vehiculo` (
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

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`vehiculo_id`, `patente`, `anho_patente`, `anho_fabricacion`, `marca`, `modelo`, `created`, `updated`) VALUES
(1, 'LEZ236', 2010, 1999, 'BMW', 'x5', '2018-12-04 20:40:53', '2018-12-05 02:40:53'),
(2, 'ARG264', 2004, 2000, 'BMW', 'x5', '2018-12-04 20:41:28', '2018-12-05 02:41:28'),
(3, 'ARS264', 2010, 1999, 'BMW', 'x5', '2018-12-04 20:42:00', '2018-12-05 02:52:52');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD CONSTRAINT `chofer_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`vehiculo_id`),
  ADD CONSTRAINT `chofer_ibfk_2` FOREIGN KEY (`sistema_id`) REFERENCES `sistema_transporte` (`sistema_id`);

--
-- Filtros para la tabla `sistema_vehiculo`
--
ALTER TABLE `sistema_vehiculo`
  ADD CONSTRAINT `sistema_vehiculo_ibfk_1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`vehiculo_id`),
  ADD CONSTRAINT `sistema_vehiculo_ibfk_2` FOREIGN KEY (`sistema_id`) REFERENCES `sistema_transporte` (`sistema_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
