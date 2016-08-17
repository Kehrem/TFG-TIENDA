-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2016 a las 12:28:53
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfgadmin_admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_avisos`
--

CREATE TABLE `admin_avisos` (
  `ident` int(11) NOT NULL,
  `descripcion` varchar(250) CHARACTER SET latin1 NOT NULL,
  `leido` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admin_avisos`
--

INSERT INTO `admin_avisos` (`ident`, `descripcion`, `leido`) VALUES
(1, 'falloe añkdjfafa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `graficas_kpis`
--

CREATE TABLE `graficas_kpis` (
  `ident` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `padre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `graficas_kpis`
--

INSERT INTO `graficas_kpis` (`ident`, `nombre`, `descripcion`, `padre`) VALUES
(1, 'Articulos +Vendidos', 'Información sobre los artículos', NULL),
(2, 'Pedidos', 'Información acerca de los pedidos', NULL),
(3, 'Pedidos Completados', 'Pedidos completados satisfactoriamente', 2),
(4, 'Pedidos Cancelados', 'Pedidos cancelados a la hora del pago', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin_avisos`
--
ALTER TABLE `admin_avisos`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `graficas_kpis`
--
ALTER TABLE `graficas_kpis`
  ADD PRIMARY KEY (`ident`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin_avisos`
--
ALTER TABLE `admin_avisos`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `graficas_kpis`
--
ALTER TABLE `graficas_kpis`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
