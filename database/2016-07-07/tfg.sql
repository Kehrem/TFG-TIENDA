-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2016 a las 00:15:56
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `ident` int(9) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(9) NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url_Img` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT '320x150',
  `url_Img_Display` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT '800x300',
  `categoria` int(9) DEFAULT NULL,
  `veces_visitado` int(9) NOT NULL,
  `veces_vendido` int(9) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `veces_puntuado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`ident`, `nombre`, `precio`, `descripcion`, `url_Img`, `url_Img_Display`, `categoria`, `veces_visitado`, `veces_vendido`, `puntuacion`, `veces_puntuado`) VALUES
(1, 'Pellets de Ejemplo', 24, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vehicula metus et tellus venenatis, quis sodales erat consequat. Praesent vitae rhoncus est. Pellentesque vel diam non turpis volutpat semper. Suspendisse ornare id lacus sed commodo. Nam ac semper massa, in varius risus. Donec ac tortor nisi. Duis volutpat diam a enim ullamcorper sodales. Donec vulputate massa est, nec consequat libero rutrum at. Mauris porttitor justo a mi viverra, molestie faucibus enim ullamcorper. Fusce lobortis tempus odio, quis finibus enim congue id. Nulla non lobortis eros. Ut vel gravida tellus.', 'img/articulos/miniaturas/pelletsejemplo.png', 'img/articulos/display/pelletsejemplo.png', 1, 3, 0, 0, 0),
(2, 'pellets de ejemplo2', 25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vehicula metus et tellus venenatis, quis sodales erat consequat. Praesent vitae rhoncus est. Pellentesque vel diam non turpis volutpat semper. Suspendisse ornare id lacus sed commodo. Nam ac semper massa, in varius risus. Donec ac tortor nisi. Duis volutpat diam a enim ullamcorper sodales. Donec vulputate massa est, nec consequat libero rutrum at. Mauris porttitor justo a mi viverra, molestie faucibus enim ullamcorper. Fusce lobortis tempus odio, quis finibus enim congue id. Nulla non lobortis eros. Ut vel gravida tellus.', 'img/articulos/miniaturas/pelletsejemplo.png', 'img/articulos/display/pelletsejemplo.png', 1, 9, 0, 0, 0),
(3, 'pellets de ejemplo 3', 26, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vehicula metus et tellus venenatis, quis sodales erat consequat. Praesent vitae rhoncus est. Pellentesque vel diam non turpis volutpat semper. Suspendisse ornare id lacus sed commodo. Nam ac semper massa, in varius risus. Donec ac tortor nisi. Duis volutpat diam a enim ullamcorper sodales. Donec vulputate massa est, nec consequat libero rutrum at. Mauris porttitor justo a mi viverra, molestie faucibus enim ullamcorper. Fusce lobortis tempus odio, quis finibus enim congue id. Nulla non lobortis eros. Ut vel gravida tellus.', 'img/articulos/miniaturas/pelletsejemplo.png', 'img/articulos/display/pelletsejemplo.png', 1, 6, 0, 0, 0),
(4, 'Pellets de Ejemplo4', 27, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vehicula metus et tellus venenatis, quis sodales erat consequat. Praesent vitae rhoncus est. Pellentesque vel diam non turpis volutpat semper. Suspendisse ornare id lacus sed commodo. Nam ac semper massa, in varius risus. Donec ac tortor nisi. Duis volutpat diam a enim ullamcorper sodales. Donec vulputate massa est, nec consequat libero rutrum at. Mauris porttitor justo a mi viverra, molestie faucibus enim ullamcorper. Fusce lobortis tempus odio, quis finibus enim congue id. Nulla non lobortis eros. Ut vel gravida tellus.', 'img/articulos/miniaturas/pelletsejemplo.png', 'img/articulos/display/pelletsejemplo.png', 1, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_puntuaciones`
--

CREATE TABLE `articulos_puntuaciones` (
  `ident_articulo` int(9) NOT NULL,
  `ident_usuario` int(9) NOT NULL,
  `puntuacion` int(1) NOT NULL,
  `fecha` date NOT NULL,
  `comentario` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos_puntuaciones`
--

INSERT INTO `articulos_puntuaciones` (`ident_articulo`, `ident_usuario`, `puntuacion`, `fecha`, `comentario`) VALUES
(1, 1, 1, '2016-06-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium turpis sit amet felis hendrerit tempus. Morbi non ligula cursus, imperdiet augue ut, laoreet velit. Curabitur egestas efficitur erat in cursus. Vestibulum et iaculis ex, vitae viverra ante. Donec lacus tortor, vestibulum eu convallis luctus, congue ac risus. Aenean pellentesque lacus eu enim pellentesque fringilla. Donec vel dui nunc.'),
(1, 2, 1, '2016-06-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium turpis sit amet felis hendrerit tempus. Morbi non ligula cursus, imperdiet augue ut, laoreet velit. Curabitur egestas efficitur erat in cursus. Vestibulum et iaculis ex, vitae viverra ante. Donec lacus tortor, vestibulum eu convallis luctus, congue ac risus. Aenean pellentesque lacus eu enim pellentesque fringilla. Donec vel dui nunc.'),
(1, 3, 5, '2016-06-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium turpis sit amet felis hendrerit tempus. Morbi non ligula cursus, imperdiet augue ut, laoreet velit. Curabitur egestas efficitur erat in cursus. Vestibulum et iaculis ex, vitae viverra ante. Donec lacus tortor, vestibulum eu convallis luctus, congue ac risus. Aenean pellentesque lacus eu enim pellentesque fringilla. Donec vel dui nunc.'),
(1, 8, 4, '2016-06-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pretium turpis sit amet felis hendrerit tempus. Morbi non ligula cursus, imperdiet augue ut, laoreet velit. Curabitur egestas efficitur erat in cursus. Vestibulum et iaculis ex, vitae viverra ante. Donec lacus tortor, vestibulum eu convallis luctus, congue ac risus. Aenean pellentesque lacus eu enim pellentesque fringilla. Donec vel dui nunc.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

CREATE TABLE `categorias_productos` (
  `ident` int(9) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `raiz` int(9) DEFAULT NULL,
  `url_Img` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias_productos`
--

INSERT INTO `categorias_productos` (`ident`, `nombre`, `raiz`, `url_Img`) VALUES
(1, 'Biomasa', NULL, 'img/banners_categorias/biomasa.png'),
(2, 'Cereales', NULL, NULL),
(3, 'Ferreteria', NULL, NULL),
(4, 'Hogar', NULL, '"img/biomasa.png"'),
(5, 'Jardineria / Hortícola', NULL, NULL),
(6, 'Animales', NULL, NULL),
(7, 'Sales', NULL, NULL),
(8, 'Piensos Abastecimiento', 6, NULL),
(9, 'Piensos domésticos', 6, NULL),
(10, 'Cuidados', 6, NULL),
(11, 'Plantas Ornamentales', 5, NULL),
(12, 'Huerto', 5, NULL),
(13, 'Cuidados', 5, NULL),
(14, 'Hueso', 1, NULL),
(15, 'Pellets', 1, ''),
(16, 'Cáscaras', 1, NULL),
(17, 'Leña', 1, NULL),
(18, 'Articulos Temporada', NULL, NULL),
(19, 'Invierno', 18, NULL),
(20, 'Verano', 18, NULL),
(21, 'Otoño', 18, NULL),
(22, 'Primavera', 18, NULL),
(23, 'Exteriores', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cpanel_admins`
--

CREATE TABLE `cpanel_admins` (
  `Admin_Id` int(3) NOT NULL,
  `Admin_Usr` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `Admin_Pwd` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `Admin_Lvl` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cpanel_admins`
--

INSERT INTO `cpanel_admins` (`Admin_Id`, `Admin_Usr`, `Admin_Pwd`, `Admin_Lvl`) VALUES
(1, 'Fog1', 'Root1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `errores`
--

CREATE TABLE `errores` (
  `ident` int(11) NOT NULL,
  `error` int(5) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `errores`
--

INSERT INTO `errores` (`ident`, `error`, `descripcion`) VALUES
(1, 0, 'No hay resultados para la búsqueda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ident` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `url_Img` varchar(150) COLLATE utf8_spanish_ci DEFAULT 'img/usuarios/icon-user.png',
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ident`, `email`, `password`, `url_Img`, `nombre`, `apellido`) VALUES
(2, '32321a', '', 'img/usuarios/icon-user.png', 'Carlos', 'mazao'),
(3, 'asdfa', '', 'img/usuarios/icon-user.png', 'fran', 'ortega'),
(8, 'ddddddd', '', 'img/usuarios/icon-user.png', 'isa', 'galiana'),
(15, 'Fog1.furan@gmail.com', 'Root1', 'img/usuarios/icon-user.png', 'dd', 'dd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_pass-recovery`
--

CREATE TABLE `usuarios_pass-recovery` (
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `recovery_code` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `recovery_date_delivery` date NOT NULL,
  `recovery_date_recovery` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_temp`
--

CREATE TABLE `usuarios_temp` (
  `ident` int(11) NOT NULL,
  `codigo_verificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_envio_verificacion` date NOT NULL,
  `validado` int(11) NOT NULL DEFAULT '0',
  `fecha_validacion_verificacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios_temp`
--

INSERT INTO `usuarios_temp` (`ident`, `codigo_verificacion`, `email`, `password`, `nombre`, `fecha_envio_verificacion`, `validado`, `fecha_validacion_verificacion`) VALUES
(19, 'f88765f2d94ebb28f769dc261d9348d7', 'Fog1.furan@gmail.com', 'Root1', 'dd', '2016-07-06', 1, '2016-07-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`ident`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `articulos_puntuaciones`
--
ALTER TABLE `articulos_puntuaciones`
  ADD PRIMARY KEY (`ident_articulo`,`ident_usuario`);

--
-- Indices de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `cpanel_admins`
--
ALTER TABLE `cpanel_admins`
  ADD PRIMARY KEY (`Admin_Id`),
  ADD UNIQUE KEY `Admin_Usr` (`Admin_Usr`);

--
-- Indices de la tabla `errores`
--
ALTER TABLE `errores`
  ADD PRIMARY KEY (`ident`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ident`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuarios_pass-recovery`
--
ALTER TABLE `usuarios_pass-recovery`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `recovery_code` (`recovery_code`);

--
-- Indices de la tabla `usuarios_temp`
--
ALTER TABLE `usuarios_temp`
  ADD PRIMARY KEY (`ident`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `ident` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  MODIFY `ident` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `cpanel_admins`
--
ALTER TABLE `cpanel_admins`
  MODIFY `Admin_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `errores`
--
ALTER TABLE `errores`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `usuarios_temp`
--
ALTER TABLE `usuarios_temp`
  MODIFY `ident` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
