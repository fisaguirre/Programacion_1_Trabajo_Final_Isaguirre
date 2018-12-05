-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2018 a las 17:30:59
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `auditoria_id` int(4) NOT NULL,
  `fecha_acceso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user` varchar(30) NOT NULL DEFAULT '',
  `response_time` float NOT NULL DEFAULT '0' COMMENT 'tiempo en milisegundos',
  `endpoint` varchar(300) NOT NULL DEFAULT '',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`auditoria_id`, `fecha_acceso`, `user`, `response_time`, `endpoint`, `created`) VALUES
(1, '2018-12-05 19:16:02', 'fer', 0.0368, 'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/POST?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIiLCJhdWQiOiIiLCJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwiZGF0YSI6eyJ1c3VhcmlvX2lkIjoiOSIsInVzdWFyaW8iOiJqZXJvIn19.DpnKPcNaAH1fdvzvQUzpUkkSzM5FF2kbcPHXaYxVR4w', '2018-12-05 19:16:02'),
(2, '2018-12-05 19:16:13', 'fer', 0.032, 'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/POST?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIiLCJhdWQiOiIiLCJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwiZGF0YSI6eyJ1c3VhcmlvX2lkIjoiOSIsInVzdWFyaW8iOiJqZXJvIn19.DpnKPcNaAH1fdvzvQUzpUkkSzM5FF2kbcPHXaYxVR4w', '2018-12-05 19:16:13'),
(3, '2018-12-05 19:16:50', 'fer', 0.0656, 'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/POST?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIiLCJhdWQiOiIiLCJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwiZGF0YSI6eyJ1c3VhcmlvX2lkIjoiOSIsInVzdWFyaW8iOiJqZXJvIn19.DpnKPcNaAH1fdvzvQUzpUkkSzM5FF2kbcPHXaYxVR4w', '2018-12-05 19:16:50'),
(4, '2018-12-05 19:17:26', 'fer', 0.0572, 'localhost/2018/Trabajo_Final/sistema_transporte/crud.php/POST?jwt=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIiLCJhdWQiOiIiLCJpYXQiOjEzNTY5OTk1MjQsIm5iZiI6MTM1NzAwMDAwMCwiZGF0YSI6eyJ1c3VhcmlvX2lkIjoiOSIsInVzdWFyaW8iOiJqZXJvIn19.DpnKPcNaAH1fdvzvQUzpUkkSzM5FF2kbcPHXaYxVR4w', '2018-12-05 19:17:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer`
--

CREATE TABLE `chofer` (
  `chofer_id` int(4) NOT NULL,
  `apellido` varchar(100) NOT NULL DEFAULT '',
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `documento` decimal(11,0) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '',
  `vehiculo_id` int(4) DEFAULT NULL,
  `sistema_id` int(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `sistema_transporte` (
  `sistema_id` int(4) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `pais_procedencia` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sistema_transporte`
--

INSERT INTO `sistema_transporte` (`sistema_id`, `nombre`, `pais_procedencia`, `created`, `updated`) VALUES
(1, 'Taxi', 'Argentina', '2018-12-05 16:16:02', '2018-12-05 19:16:02'),
(2, 'Uber', 'EEUU', '2018-12-05 16:16:13', '2018-12-05 19:16:13'),
(3, 'Cabify.', 'España', '2018-12-05 16:16:50', '2018-12-05 19:16:50'),
(4, 'Remis.', 'España', '2018-12-05 16:17:26', '2018-12-05 19:17:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema_vehiculo`
--

CREATE TABLE `sistema_vehiculo` (
  `sistemavehiculo_id` int(4) NOT NULL,
  `vehiculo_id` int(4) DEFAULT NULL,
  `sistema_id` int(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `usuarios` (
  `usuario_id` int(4) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `rol` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

CREATE TABLE `vehiculo` (
  `vehiculo_id` int(4) NOT NULL,
  `patente` varchar(10) NOT NULL DEFAULT '',
  `anho_patente` smallint(2) NOT NULL DEFAULT '0',
  `anho_fabricacion` smallint(2) NOT NULL DEFAULT '0',
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`vehiculo_id`, `patente`, `anho_patente`, `anho_fabricacion`, `marca`, `modelo`, `created`, `updated`) VALUES
(1, 'LEZ236', 2010, 1999, 'BMW', 'x5', '2018-12-04 20:40:53', '2018-12-05 02:40:53'),
(2, 'ARG264', 2004, 2000, 'BMW', 'x5', '2018-12-04 20:41:28', '2018-12-05 02:41:28'),
(3, 'ARS264', 2010, 1999, 'BMW', 'x5', '2018-12-04 20:42:00', '2018-12-05 02:52:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`auditoria_id`);

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`chofer_id`),
  ADD KEY `documento` (`documento`),
  ADD KEY `vehiculo_id` (`vehiculo_id`),
  ADD KEY `sistema_id` (`sistema_id`),
  ADD KEY `vehiculo_id_2` (`vehiculo_id`),
  ADD KEY `vehiculo_id_3` (`vehiculo_id`);

--
-- Indices de la tabla `sistema_transporte`
--
ALTER TABLE `sistema_transporte`
  ADD PRIMARY KEY (`sistema_id`);

--
-- Indices de la tabla `sistema_vehiculo`
--
ALTER TABLE `sistema_vehiculo`
  ADD PRIMARY KEY (`sistemavehiculo_id`),
  ADD UNIQUE KEY `vehiculo_id` (`vehiculo_id`,`sistema_id`),
  ADD KEY `sistema_id` (`sistema_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`vehiculo_id`),
  ADD UNIQUE KEY `patente_UNIQUE` (`patente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `auditoria_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `chofer`
--
ALTER TABLE `chofer`
  MODIFY `chofer_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sistema_transporte`
--
ALTER TABLE `sistema_transporte`
  MODIFY `sistema_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sistema_vehiculo`
--
ALTER TABLE `sistema_vehiculo`
  MODIFY `sistemavehiculo_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `vehiculo_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
