-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2017 a las 02:10:13
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_photos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `id` int(10) UNSIGNED NOT NULL,
  `sesion_fotografica_id` int(10) UNSIGNED NOT NULL,
  `archivo_ruta` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `archivo_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `extension` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ap_paterno` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ap_materno` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_docs_id` int(10) UNSIGNED DEFAULT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `email1` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `documento`, `nombres`, `ap_paterno`, `ap_materno`, `direccion`, `tipo_docs_id`, `telefono`, `email1`) VALUES
(1, '71834023', 'Edwin2', 'Huaracas', 'Pancracio', 'Av. Los Prados Calle San Chupo', 1, '5285250', '5285250'),
(2, '81632153', 'Floriponcio', 'Huaracas', 'Pancracio', 'Av. Los Prados Calle San Chupo', 1, '715632', 'k2sjfs@mail.com'),
(3, '51321598', 'El bryam', 'Huaracas', 'Pancracio', 'Av. Los Prados Calle San Chupo', 1, '8746541', 'k3sjfs@mail.com'),
(4, '65465486', 'Javier', 'Deza', 'Culque', 'Asasfasfasfasf', 2, '124124124', 'eqfasfasf'),
(27, '47588145', 'Exxel', 'Elera', 'Ato', '', 1, '1234567890', ''),
(28, '12345678', 'lucero', 'liza', 'puican', '', 1, '12345678', ''),
(30, '6546', 'Exxel', 's', 's', 'aethafjf', 1, '12345', 'adhfj'),
(32, '2', 's', 'ss', 's', 'rfd', 1, '12', '1w'),
(36, '3', 'fjd', 'sfhmj', 'dghk', 'aethafjf', 2, '12345', '3@rrr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disco`
--

CREATE TABLE `disco` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `disco`
--

INSERT INTO `disco` (`id`, `numero`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_fotografica`
--

CREATE TABLE `sesion_fotografica` (
  `id` int(10) UNSIGNED NOT NULL,
  `clientes_id` int(10) UNSIGNED NOT NULL,
  `fotos_cantidad` int(3) UNSIGNED NOT NULL DEFAULT '0',
  `local` enum('INTERNO','EXTERNO') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'INTERNO',
  `individual` int(1) NOT NULL DEFAULT '1' COMMENT '1 para fotografìas de una sóla persona, 0 para fotografías de grupo de personas\n',
  `fecha_recepcion` date DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `fecha_evento` date DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT '0' COMMENT '0: pendiente, 1:atendido, 2:cancelado',
  `tipo_servicios_id` int(10) UNSIGNED NOT NULL,
  `disco_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesion_fotografica`
--

INSERT INTO `sesion_fotografica` (`id`, `clientes_id`, `fotos_cantidad`, `local`, `individual`, `fecha_recepcion`, `fecha_entrega`, `fecha_evento`, `estado`, `tipo_servicios_id`, `disco_id`) VALUES
(1, 1, 4, 'INTERNO', 1, '2017-06-12', NULL, NULL, 1, 1, 1),
(2, 1, 5, '', 1, '0000-00-00', '2017-07-13 00:00:00', '2017-07-06', 1, 4, 1),
(24, 3, 12, '', 1, '2017-07-04', '2017-07-22 00:00:00', '2017-07-06', 1, 4, 2),
(25, 3, 12, '', 1, '2017-07-04', '2017-07-22 00:00:00', '2017-07-06', 0, 4, 2),
(26, 1, 12, '', 1, '2017-07-04', '2017-07-05 00:00:00', '2017-07-05', 0, 4, 2),
(27, 4, 12, '', 1, '2017-07-05', '2017-07-18 00:00:00', '2017-07-06', 1, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_docs`
--

CREATE TABLE `tipo_docs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_docs`
--

INSERT INTO `tipo_docs` (`id`, `nombre`) VALUES
(1, 'DNI'),
(3, 'PTP'),
(2, 'RUC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicios`
--

CREATE TABLE `tipo_servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_servicios`
--

INSERT INTO `tipo_servicios` (`id`, `nombre`) VALUES
(4, 'Fiesta de 15 años'),
(1, 'Fotografía de documentos '),
(3, 'Fotografías de bodas'),
(7, 'Photobook matrimonios'),
(6, 'Pre- bodas'),
(2, 'Sesiones artísticas'),
(5, 'Sesiones familiares en el exterior');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_spanish_ci NOT NULL COMMENT '''sha256''',
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ap_paterno` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ap_materno` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` int(1) NOT NULL DEFAULT '1' COMMENT '1: administrador, 2: usuario común'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `nombre`, `ap_paterno`, `ap_materno`, `rol`) VALUES
(1, 'edwin', 'edwin', 'edwin', 'deza', 'culque', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_archivo_sesion_fotografica1_idx` (`sesion_fotografica_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `dni_UNIQUE` (`documento`),
  ADD KEY `fk_cliente_tipo_docs1_idx` (`tipo_docs_id`);

--
-- Indices de la tabla `disco`
--
ALTER TABLE `disco`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesion_fotografica`
--
ALTER TABLE `sesion_fotografica`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_reservas_clientes_idx` (`clientes_id`),
  ADD KEY `fk_sesion_fotografica_tipo_servicios1_idx` (`tipo_servicios_id`),
  ADD KEY `fk_disco_id_disco` (`disco_id`);

--
-- Indices de la tabla `tipo_docs`
--
ALTER TABLE `tipo_docs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `disco`
--
ALTER TABLE `disco`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sesion_fotografica`
--
ALTER TABLE `sesion_fotografica`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tipo_docs`
--
ALTER TABLE `tipo_docs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `fk_archivo_reserva1` FOREIGN KEY (`sesion_fotografica_id`) REFERENCES `sesion_fotografica` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_tipo_docs1` FOREIGN KEY (`tipo_docs_id`) REFERENCES `tipo_docs` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion_fotografica`
--
ALTER TABLE `sesion_fotografica`
  ADD CONSTRAINT `fk_disco_id_disco` FOREIGN KEY (`disco_id`) REFERENCES `disco` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservas_clientes` FOREIGN KEY (`clientes_id`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sesion_fotografica_tipo_servicios1` FOREIGN KEY (`tipo_servicios_id`) REFERENCES `tipo_servicios` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
