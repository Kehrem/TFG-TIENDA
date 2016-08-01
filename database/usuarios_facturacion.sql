-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2016 a las 12:29:57
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tfg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_facturacion`
--

CREATE TABLE IF NOT EXISTS `usuarios_facturacion` (
  `ident` int(11) NOT NULL,
  `ident_usuario` int(11) NOT NULL,
  `codigo_postal` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `nombre_direccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT '"Mi direccion"'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios_facturacion`
--

INSERT INTO `usuarios_facturacion` (`ident`, `ident_usuario`, `codigo_postal`, `localidad`, `direccion`, `telefono`, `nombre_direccion`) VALUES
(19, 65, '03600', 'ELDA', 'asdfafaf', 646546546, 'elda'),
(20, 65, '03610', 'PETRER', 'c/Asturias', 615176637, 'Mi direccion');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios_facturacion`
--
ALTER TABLE `usuarios_facturacion`
  ADD PRIMARY KEY (`ident`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios_facturacion`
--
ALTER TABLE `usuarios_facturacion`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
