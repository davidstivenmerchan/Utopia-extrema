-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-10-2020 a las 08:14:23
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `corza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usu`
--

CREATE TABLE IF NOT EXISTS `tipo_usu` (
  `id_tipo_usu` int(2) NOT NULL DEFAULT '0',
  `nom_tipo_usu` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usu`
--

INSERT INTO `tipo_usu` (`id_tipo_usu`, `nom_tipo_usu`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cedula` int(15) NOT NULL DEFAULT '0',
  `nombre` varchar(15) DEFAULT NULL,
  `apellido` varchar(15) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `clave` varchar(15) DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `prendas` int(15) DEFAULT NULL,
  `id_tipo_usu` int(2) DEFAULT NULL,
  `estado_entrega` varchar(25) DEFAULT NULL,
  `id_rastreo` int(15) DEFAULT NULL,
  PRIMARY KEY (`cedula`),
  KEY `id_tipo_usu` (`id_tipo_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `apellido`, `usuario`, `clave`, `telefono`, `prendas`, `id_tipo_usu`, `estado_entrega`, `id_rastreo`) VALUES
(222, '222', '222', '222', '2222', 222, 0, 2, 'activo', 56787),
(1002, 'david', 'merchan', 'shun', '1234', 315, NULL, 1, NULL, NULL),
(1005, 'carlos', 'mejia', 'carlangas', '1234', 310679, 5, 2, 'activo', 9114),
(5666, '6666', '666', '666', '6666', 6666, 6, 2, NULL, NULL),
(9009, 'pepito', 'lopez', 'pipoo', '1234', 5678, 0, 2, 'cancelado', 8777665),
(44005, 'amparo', 'gonzalez', 'luz', '3333', 78999, 4, 2, 'procesando', 543215);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usu`) REFERENCES `tipo_usu` (`id_tipo_usu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
