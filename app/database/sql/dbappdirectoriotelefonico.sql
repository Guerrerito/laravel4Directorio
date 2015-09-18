-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2015 a las 23:52:04
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbappdirectoriotelefonico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdirectorio`
--

CREATE TABLE IF NOT EXISTS `tdirectorio` (
`idDirectorio` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombreCompleto` varchar(70) NOT NULL,
  `direccion` varchar(700) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fechaNacimineto` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
`idUsuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `contrasenia` varchar(700) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`idUsuario`, `nombre`, `apellido`, `nombreUsuario`, `contrasenia`, `created_at`, `updated_at`) VALUES
(1, 'joshua', 'Arellano', 'arox ', 'eyJpdiI6IlA1UmpsNjRaSUJCbzF4RllncVVlV05vZ216Zjh6XC9TMXR6RmkwbDRIMHV3PSIsInZhbHVlIjoibGZxSVpGYlR3QXhrbGZVQU5VZTZNU3lldkhDTFRVbTdWYVl0aHk3bmpLZz0iLCJtYWMiOiJlZjczMzVmNDUwODc0ZDllZjFhZjU1OTM3YjU4OTE4ZTQyZDVlNzQ3NjVmMDA3NjQ4NDQ0MGY3OGNlNDE0ZjU5In0=', '2015-09-10 21:39:35', '2015-09-11 17:28:17'),
(2, 'Aaron', 'vega', 'perez', 'eyJpdiI6IjhZK1o4TWZEeGJcL0JyXC9kbTZYQzE1emkyYVhUbjhJMVFlYUMramRISUNtST0iLCJ2YWx1ZSI6IkVmeEJQa0dpQ2tRdmZUeER4OWhmeDEzWUQ5eHJmVnp4MXRpREZocTdIY0U9IiwibWFjIjoiN2JmNjMzOTZjNTkwYThkZWQyODE1YmMxNzFhODdkZTJmYjdlYzRhNzVjMzg5NWFiNDk1N2RmNDhmMjBmNzc0MSJ9', '2015-09-10 23:03:13', '2015-09-10 23:03:13'),
(3, ' pedro  ', 'ramirez  ', 'perez', 'eyJpdiI6Ik12WTdnY1h6SVJJXC9LRVBqRjBwZjEwM0RQWTZPT1Rua0tDYTN2XC9WdmJUVT0iLCJ2YWx1ZSI6Im11UlNSdDd1ZFVXbEdvQ3M0eGdcL0tLRFJiT2dnTUdwSFNrSnkxQSszVEVrPSIsIm1hYyI6ImQzMzczMTk0ZTY4OTllNWMyZjc4YjYzZWEwZDNlYzI3MjgxNTFkY2EwYWRkMDliMDkwZDhmNmZmMmYzOWM0MTAifQ==', '2015-09-18 15:47:00', '2015-09-18 16:59:30'),
(4, ' paco ', 'herndz ', 'master', 'eyJpdiI6IjBPVUZmTzY2cEhDNmdnOXdNdEVYdjNCZjdUQUc5UnRNcGhiUFdENTBnY2c9IiwidmFsdWUiOiJwRGpRQTlpbnNNQXR1bmZMOHl3NUVFTEc0MEgyT1hldDEyMWtzYW5XR1FJPSIsIm1hYyI6ImE1YjI5ZmUzZDU4MTYwMDA0ZDI2OGM3ZDAxYjQ2YTljNjhlYWNhMGIyNzllZDMyMzcxYWFmYjQ5ZGRiNmVjNzUifQ==', '2015-09-18 17:02:26', '2015-09-18 17:03:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tdirectorio`
--
ALTER TABLE `tdirectorio`
 ADD PRIMARY KEY (`idDirectorio`), ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
 ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tdirectorio`
--
ALTER TABLE `tdirectorio`
MODIFY `idDirectorio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tusuario`
--
ALTER TABLE `tusuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tdirectorio`
--
ALTER TABLE `tdirectorio`
ADD CONSTRAINT `tdirectorio_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tusuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
