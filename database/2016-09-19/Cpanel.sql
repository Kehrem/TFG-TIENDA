-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2016 a las 13:37:31
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
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `ident` int(11) NOT NULL,
  `nombreUsuario` varchar(15) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`ident`, `nombreUsuario`, `pwd`) VALUES
(1, 'fog1', '2c1de16a1c60166503df1fbd72e0b5dc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_avisos`
--

CREATE TABLE `admin_avisos` (
  `ident` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(250) CHARACTER SET latin1 NOT NULL,
  `leido` int(1) NOT NULL DEFAULT '0',
  `categoria` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admin_avisos`
--

INSERT INTO `admin_avisos` (`ident`, `titulo`, `descripcion`, `leido`, `categoria`, `fecha`) VALUES
(1, 'one more drink', 'falloe añkdjfafa', 1, 1, '2016-08-21'),
(2, 'on the sunk''n norwegian', 'adsfafa', 1, 2, '2016-08-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_avisos_categorias`
--

CREATE TABLE `admin_avisos_categorias` (
  `ident` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin_avisos_categorias`
--

INSERT INTO `admin_avisos_categorias` (`ident`, `nombre`) VALUES
(1, 'Problemas Técnicos Pedidos'),
(2, 'Articulos');

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
(7, 'Francisco', 'afadfafafafa', NULL),
(8, 'ffffffffffff', 'ffffffffffffffff', NULL),
(9, 'bbbbbbbbbbbbb', 'aaaaaaaaaa', NULL),
(10, 'carlos', 'adsfadfzfa', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_kpis`
--

CREATE TABLE `grupos_kpis` (
  `ident` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos_kpis`
--

INSERT INTO `grupos_kpis` (`ident`, `nombre`, `descripcion`) VALUES
(1, 'Articulos', 'Kpis relativos a los artículos'),
(2, 'Pedidos', 'kpis relativos a los pedidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_portada`
--

CREATE TABLE `modulos_portada` (
  `ident` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos_portada`
--

INSERT INTO `modulos_portada` (`ident`, `nombre`, `url`) VALUES
(1, 'Carousel v1.0', 'modulos/portada/carousel/carousel.php'),
(2, 'imagen', 'modulos/portada/imagen/imagen.php'),
(3, 'Conjunto Imágenes', 'modulos/portada/conjuntoImagenes/conjuntoImagenes.php'),
(4, 'Herramientas Twitter', 'modulos/twitter/twitter.php'),
(5, 'Herramientas Facebook', 'modulos/facebook/facebook.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros_kpis`
--

CREATE TABLE `parametros_kpis` (
  `ident` int(11) NOT NULL,
  `ident_kpi` int(11) NOT NULL,
  `tabla` varchar(100) NOT NULL,
  `param1` varchar(100) NOT NULL,
  `param2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametros_kpis`
--

INSERT INTO `parametros_kpis` (`ident`, `ident_kpi`, `tabla`, `param1`, `param2`) VALUES
(7, 5, 'articulos', 'ident', 'precio'),
(8, 6, 'articulos', 'nombre', 'categoria'),
(9, 7, 'articulos', 'nombre', 'precio'),
(10, 8, 'articulos', 'ident', 'categoria'),
(11, 9, 'pedidos', 'ident', 'estado'),
(12, 10, 'pedidos', 'ident', 'estado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `admin_avisos`
--
ALTER TABLE `admin_avisos`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `admin_avisos_categorias`
--
ALTER TABLE `admin_avisos_categorias`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `graficas_kpis`
--
ALTER TABLE `graficas_kpis`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `grupos_kpis`
--
ALTER TABLE `grupos_kpis`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `modulos_portada`
--
ALTER TABLE `modulos_portada`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `parametros_kpis`
--
ALTER TABLE `parametros_kpis`
  ADD PRIMARY KEY (`ident`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `admin_avisos`
--
ALTER TABLE `admin_avisos`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `admin_avisos_categorias`
--
ALTER TABLE `admin_avisos_categorias`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `graficas_kpis`
--
ALTER TABLE `graficas_kpis`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `grupos_kpis`
--
ALTER TABLE `grupos_kpis`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `modulos_portada`
--
ALTER TABLE `modulos_portada`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `parametros_kpis`
--
ALTER TABLE `parametros_kpis`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
