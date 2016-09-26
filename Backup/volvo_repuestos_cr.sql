-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2016 a las 16:26:56
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `volvo_repuestos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_administradores`
--

CREATE TABLE IF NOT EXISTS `sitio_administradores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `activo` tinyint(1) unsigned DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `sitio_administradores`
--

INSERT INTO `sitio_administradores` (`id`, `nombre`, `email`, `clave`, `activo`, `created`, `modified`) VALUES
(1, 'Sistemas Reach Latam', 'sistemas@reach-latam.com', '5091e4344b9c643e6d694a034b9e6dfa4fea8eee', 1, '2016-09-09 17:05:54', '2016-09-09 17:05:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_banners`
--

CREATE TABLE IF NOT EXISTS `sitio_banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `banner_categoria_id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `orden` int(10) unsigned DEFAULT '0',
  `activo` tinyint(1) unsigned DEFAULT '1',
  `administrador_id` bigint(20) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_BANNERCATEGORIA` (`banner_categoria_id`),
  KEY `FK_ADMINISTRADOR` (`administrador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `sitio_banners`
--

INSERT INTO `sitio_banners` (`id`, `banner_categoria_id`, `nombre`, `imagen`, `orden`, `activo`, `administrador_id`, `created`, `modified`) VALUES
(2, 2, 'Volvo repuestos', '57e43eb4-46d0-4080-b95b-22f8d3abbe92.png', 1, 1, 1, '2016-09-22 16:39:00', '2016-09-22 17:27:32'),
(6, 1, 'Volvo repuestos inicio', '57e43ea0-4c28-41f9-8c4c-22f8d3abbe92.png', 1, 1, 1, '2016-09-22 17:27:12', '2016-09-22 17:27:12'),
(7, 1, 'Volvo repuestos inicio 2', '57e440a6-42c4-4f3c-9943-22f8d3abbe92.png', 2, 1, 1, '2016-09-22 17:35:50', '2016-09-22 17:35:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_banner_categorias`
--

CREATE TABLE IF NOT EXISTS `sitio_banner_categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `activo` tinyint(1) unsigned DEFAULT '1',
  `banner_activo_count` int(10) unsigned DEFAULT '0',
  `banner_inactivo_count` int(10) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sitio_banner_categorias`
--

INSERT INTO `sitio_banner_categorias` (`id`, `nombre`, `slug`, `activo`, `banner_activo_count`, `banner_inactivo_count`, `created`, `modified`) VALUES
(1, 'Home', 'home', 1, 0, 0, '2016-09-09 18:58:04', '2016-09-22 16:35:02'),
(2, 'Repuestos', 'repuestos', 1, 0, 0, '2016-09-22 16:38:12', '2016-09-22 16:38:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_categorias`
--

CREATE TABLE IF NOT EXISTS `sitio_categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `imagen_secundaria` varchar(120) DEFAULT NULL,
  `orden` int(10) unsigned DEFAULT '0',
  `activo` tinyint(1) unsigned DEFAULT '1',
  `producto_activo_count` int(10) unsigned DEFAULT '0',
  `producto_inactivo_count` int(10) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `sitio_categorias`
--

INSERT INTO `sitio_categorias` (`id`, `nombre`, `slug`, `imagen`, `imagen_secundaria`, `orden`, `activo`, `producto_activo_count`, `producto_inactivo_count`, `created`, `modified`) VALUES
(1, 'Carrocería', 'carroceria', '57d325a0-f0bc-46d4-b6f8-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:12:00', '2016-09-20 12:07:44'),
(2, 'Embrague', 'embrague', '57d3268f-a2dc-45e6-9504-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:15:59', '2016-09-20 12:07:44'),
(3, 'Filtros', 'filtros', '57d3269a-acfc-403a-8d70-056cd3abbe92.jpg', NULL, 0, 1, 3, 0, '2016-09-09 18:16:10', '2016-09-20 12:07:44'),
(4, 'Frenos', 'frenos', '57d326ab-6a34-4d4e-9116-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:16:27', '2016-09-20 12:07:44'),
(5, 'Inyección', 'inyeccion', '57d326b6-7de0-4385-9e5a-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:16:38', '2016-09-20 12:07:44'),
(6, 'Motores', 'motores', '57d326da-2590-43d5-a9de-056cd3abbe92.jpg', NULL, 0, 1, 1, 0, '2016-09-09 18:17:14', '2016-09-20 12:07:44'),
(7, 'Suspensión', 'suspension', '57d326ec-23cc-439d-bb8e-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:17:32', '2016-09-20 12:07:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_categorias_productos`
--

CREATE TABLE IF NOT EXISTS `sitio_categorias_productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CATEGORIA` (`categoria_id`),
  KEY `FK_PRODUCTO` (`producto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- Volcado de datos para la tabla `sitio_categorias_productos`
--

INSERT INTO `sitio_categorias_productos` (`id`, `categoria_id`, `producto_id`) VALUES
(109, 3, 1),
(119, 3, 2),
(120, 6, 2),
(121, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_comunas`
--

CREATE TABLE IF NOT EXISTS `sitio_comunas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `region_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_REGION` (`region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=347 ;

--
-- Volcado de datos para la tabla `sitio_comunas`
--

INSERT INTO `sitio_comunas` (`id`, `nombre`, `region_id`) VALUES
(1, 'ARICA', 15),
(2, 'IQUIQUE', 1),
(3, 'HUARA', 1),
(4, 'PICA', 1),
(5, 'POZO ALMONTE', 1),
(6, 'TOCOPILLA', 2),
(7, 'ANTOFAGASTA', 2),
(8, 'MEJILLONES', 2),
(9, 'TALTAL', 2),
(10, 'CALAMA', 2),
(11, 'CHAÑARAL', 3),
(12, 'DIEGO DE ALMAGRO', 3),
(13, 'COPIAPO', 3),
(14, 'CALDERA', 3),
(15, 'TIERRA AMARILLA', 3),
(16, 'VALLENAR', 3),
(17, 'FREIRINA', 3),
(18, 'HUASCO', 3),
(19, 'LA SERENA', 4),
(20, 'LA HIGUERA', 4),
(21, 'COQUIMBO', 4),
(22, 'ANDACOLLO', 4),
(23, 'VICUÑA', 4),
(24, 'PAIHUANO', 4),
(25, 'OVALLE', 4),
(26, 'MONTE PATRIA', 4),
(27, 'PUNITAQUI', 4),
(28, 'RIO HURTADO', 4),
(29, 'COMBARBALA', 4),
(30, 'ILLAPEL', 4),
(31, 'CANELA', 4),
(32, 'SALAMANCA', 4),
(33, 'LOS VILOS', 4),
(34, 'VALPARAISO', 5),
(35, 'QUINTERO', 5),
(36, 'PUCHUNCAVI', 5),
(37, 'VIÑA DEL MAR', 5),
(38, 'QUILPUE', 5),
(39, 'VILLA ALEMANA', 5),
(40, 'CASABLANCA', 5),
(41, 'ISLA DE PASCUA', 5),
(42, 'SAN ANTONIO', 5),
(43, 'SANTO DOMINGO', 5),
(44, 'ALGARROBO', 5),
(45, 'EL QUISCO', 5),
(46, 'CARTAGENA', 5),
(47, 'EL TABO', 5),
(48, 'QUILLOTA', 5),
(49, 'LA CRUZ', 5),
(50, 'LA CALERA', 5),
(51, 'HIJUELAS', 5),
(52, 'NOGALES', 5),
(53, 'LIMACHE', 5),
(54, 'OLMUE', 5),
(55, 'PETORCA', 5),
(56, 'CABILDO', 5),
(57, 'PAPUDO', 5),
(58, 'ZAPALLAR', 5),
(59, 'LA LIGUA', 5),
(60, 'SAN FELIPE', 5),
(61, 'PUTAENDO', 5),
(62, 'PANQUEHUE', 5),
(63, 'CATEMU', 5),
(64, 'SANTA MARIA', 5),
(65, 'LLAY LLAY', 5),
(66, 'LOS ANDES', 5),
(67, 'CALLE LARGA', 5),
(68, 'RINCONADA', 5),
(69, 'SAN ESTEBAN', 5),
(70, 'SANTIAGO CENTRO', 13),
(71, 'LAS CONDES', 13),
(72, 'PROVIDENCIA', 13),
(73, 'SANTIAGO OESTE', 13),
(75, 'CONCHALI', 13),
(76, 'COLINA', 13),
(77, 'RENCA', 13),
(78, 'LAMPA', 13),
(79, 'QUILICURA', 13),
(80, 'TIL-TIL', 13),
(81, 'QUINTA NORMAL', 13),
(82, 'PUDAHUEL', 13),
(83, 'CURACAVI', 13),
(84, 'SANTIAGO SUR', 13),
(85, 'PEÑAFLOR', 13),
(86, 'TALAGANTE', 13),
(87, 'ISLA DE MAIPO', 13),
(88, 'MELIPILLA', 13),
(89, 'EL MONTE', 13),
(90, 'MARIA PINTO', 13),
(91, 'ÑUÑOA', 13),
(92, 'LA REINA', 13),
(93, 'LA FLORIDA', 13),
(94, 'MAIPU', 13),
(95, 'SAN MIGUEL', 13),
(96, 'LA CISTERNA', 13),
(97, 'LA GRANJA', 13),
(98, 'SAN BERNARDO', 13),
(99, 'CALERA DE TANGO', 13),
(100, 'PUENTE ALTO', 13),
(101, 'PIRQUE', 13),
(102, 'SAN JOSE DE MAIPO', 13),
(103, 'BUIN', 13),
(104, 'PAINE', 13),
(105, 'RANCAGUA', 6),
(106, 'MACHALI', 6),
(107, 'GRANEROS', 6),
(108, 'SAN PEDRO', 13),
(109, 'ALHUE', 13),
(110, 'CODEGUA', 6),
(111, 'SAN FRANCISCO DE MOSTAZAL', 6),
(112, 'DOÑIHUE', 6),
(113, 'COLTAUCO', 6),
(114, 'COINCO', 6),
(115, 'PEUMO', 6),
(116, 'LAS CABRAS', 6),
(117, 'SAN VICENTE', 6),
(118, 'PICHIDEGUA', 6),
(119, 'REQUINOA', 6),
(120, 'OLIVAR', 6),
(121, 'RENGO', 6),
(122, 'MALLOA', 6),
(123, 'QUINTA DE TILCOCO', 6),
(124, 'SAN FERNANDO', 6),
(125, 'CHIMBARONGO', 6),
(126, 'NANCAGUA', 6),
(127, 'PLACILLA', 6),
(128, 'SANTA CRUZ', 6),
(129, 'LOLOL', 6),
(130, 'PALMILLA', 6),
(131, 'PERALILLO', 6),
(132, 'CHEPICA', 6),
(133, 'PAREDONES', 6),
(134, 'MARCHIGUE', 6),
(135, 'PUMANQUE', 6),
(136, 'LITUECHE', 6),
(137, 'PICHILEMU', 6),
(138, 'NAVIDAD', 6),
(139, 'LA ESTRELLA', 6),
(140, 'CURICO', 7),
(141, 'ROMERAL', 7),
(142, 'TENO', 7),
(143, 'RAUCO', 7),
(144, 'HUALAÑE', 7),
(145, 'LICANTEN', 7),
(146, 'VICHUQUEN', 7),
(147, 'MOLINA', 7),
(148, 'SAGRADA FAMILIA', 7),
(149, 'RIO CLARO', 7),
(150, 'TALCA', 7),
(151, 'SAN CLEMENTE', 7),
(152, 'PELARCO', 7),
(153, 'PENCAHUE', 7),
(154, 'MAULE', 7),
(155, 'CUREPTO', 7),
(156, 'SAN JAVIER', 7),
(157, 'CONSTITUCION', 7),
(158, 'EMPEDRADO', 7),
(159, 'LINARES', 7),
(160, 'YERBAS BUENAS', 7),
(161, 'COLBUN', 7),
(162, 'LONGAVI', 7),
(163, 'VILLA ALEGRE', 7),
(164, 'PARRAL', 7),
(165, 'RETIRO', 7),
(166, 'CAUQUENES', 7),
(167, 'CHANCO', 7),
(168, 'CHILLAN', 8),
(169, 'PINTO', 8),
(170, 'COIHUECO', 8),
(171, 'PORTEZUELO', 8),
(172, 'QUIRIHUE', 8),
(173, 'TREHUACO', 8),
(174, 'NINHUE', 8),
(175, 'COBQUECURA', 8),
(176, 'SAN CARLOS', 8),
(177, 'SAN GREGORIO DE ÑIQUEN', 8),
(178, 'SAN FABIAN', 8),
(179, 'SAN NICOLAS', 8),
(180, 'BULNES', 8),
(181, 'SAN IGNACIO', 8),
(182, 'QUILLON', 8),
(183, 'YUNGAY', 8),
(184, 'PEMUCO', 8),
(185, 'EL CARMEN', 8),
(186, 'COELEMU', 8),
(187, 'RANQUIL', 8),
(188, 'CONCEPCION', 8),
(189, 'TALCAHUANO', 8),
(190, 'TOME', 8),
(191, 'PENCO', 8),
(192, 'HUALQUI', 8),
(193, 'FLORIDA', 8),
(194, 'CORONEL', 8),
(195, 'LOTA', 8),
(196, 'SANTA JUANA', 8),
(197, 'CURANILAHUE', 8),
(198, 'ARAUCO', 8),
(199, 'LEBU', 8),
(200, 'LOS ALAMOS', 8),
(201, 'CAÑETE', 8),
(202, 'CONTULMO', 8),
(203, 'TIRUA', 8),
(204, 'LOS ANGELES', 8),
(205, 'SANTA BARBARA', 8),
(206, 'QUILLECO', 8),
(207, 'YUMBEL', 8),
(208, 'CABRERO', 8),
(209, 'TUCAPEL', 8),
(210, 'LAJA', 8),
(211, 'SAN ROSENDO', 8),
(212, 'NACIMIENTO', 8),
(213, 'NEGRETE', 8),
(214, 'MULCHEN', 8),
(215, 'QUILACO', 8),
(216, 'ANGOL', 9),
(217, 'PUREN', 9),
(218, 'LOS SAUCES', 9),
(219, 'RENAICO', 9),
(220, 'COLLIPULLI', 9),
(221, 'ERCILLA', 9),
(222, 'TRAIGUEN', 9),
(223, 'LUMACO', 9),
(224, 'VICTORIA', 9),
(225, 'CURACAUTIN', 9),
(226, 'LONQUIMAY', 9),
(227, 'TEMUCO', 9),
(228, 'VILCUN', 9),
(229, 'FREIRE', 9),
(230, 'CUNCO', 9),
(231, 'LAUTARO', 9),
(232, 'GALVARINO', 9),
(233, 'PERQUENCO', 9),
(234, 'NUEVA IMPERIAL', 9),
(235, 'CARAHUE', 9),
(236, 'PUERTO SAAVEDRA', 9),
(237, 'PITRUFQUEN', 9),
(238, 'GORBEA', 9),
(239, 'TOLTEN', 9),
(240, 'LONCOCHE', 9),
(241, 'VILLARRICA', 9),
(242, 'PUCON', 9),
(243, 'VALDIVIA', 14),
(244, 'CORRAL', 14),
(245, 'MARIQUINA', 14),
(246, 'MAFIL', 14),
(247, 'LOS LAGOS', 14),
(248, 'FUTRONO', 14),
(249, 'LANCO', 14),
(250, 'PANGUIPULLI', 14),
(251, 'LA UNION', 14),
(252, 'PAILLACO', 14),
(253, 'RIO BUENO', 14),
(254, 'LAGO RANCO', 14),
(255, 'OSORNO', 10),
(256, 'PUYEHUE', 10),
(257, 'SAN PABLO', 10),
(258, 'PUERTO OCTAY', 10),
(259, 'RIO NEGRO', 10),
(260, 'PURRANQUE', 10),
(261, 'PUERTO MONTT', 10),
(262, 'COCHAMO', 10),
(263, 'MAULLIN', 10),
(264, 'LOS MUERMOS', 10),
(265, 'CALBUCO', 10),
(266, 'PUERTO VARAS', 10),
(267, 'LLANQUIHUE', 10),
(268, 'FRESIA', 10),
(269, 'FRUTILLAR', 10),
(270, 'CASTRO', 10),
(271, 'CHONCHI', 10),
(272, 'QUEILEN', 10),
(273, 'QUELLON', 10),
(274, 'PUQUELDON', 10),
(275, 'QUINCHAO', 10),
(276, 'CURACO DE VELEZ', 10),
(277, 'ANCUD', 10),
(278, 'QUEMCHI', 10),
(279, 'DALCAHUE', 10),
(280, 'CHAITEN', 10),
(281, 'FUTALEUFU', 10),
(282, 'PALENA', 10),
(284, 'COYHAIQUE', 11),
(285, 'AYSEN', 11),
(286, 'CISNES', 11),
(287, 'CHILE CHICO', 11),
(288, 'RIO IBAÑEZ', 11),
(289, 'COCHRANE', 11),
(290, 'PUNTA ARENAS', 12),
(291, 'PUERTO NATALES', 12),
(292, 'PORVENIR', 12),
(293, 'GENERAL LAGOS', 15),
(294, 'PUTRE', 15),
(295, 'CAMARONES', 15),
(296, 'CAMINA', 1),
(297, 'COLCHANE', 1),
(298, 'MARIA ELENA', 2),
(299, 'SIERRA GORDA', 2),
(300, 'OLLAGÜE', 2),
(301, 'SAN PEDRO DE ATACAMA', 2),
(302, 'ALTO DEL CARMEN', 3),
(303, 'ANTUCO', 8),
(304, 'MELIPEUCO', 9),
(305, 'CURARREHUE', 9),
(306, 'TEODORO SCHMIDT', 9),
(307, 'SAN JUAN DE LA COSTA', 10),
(308, 'HUALAIHUE', 10),
(309, 'GUAITECAS', 11),
(310, 'O´HIGGINS', 11),
(311, 'TORTEL', 11),
(312, 'LAGO VERDE', 11),
(313, 'TORRES DEL PAINE', 12),
(314, 'RIO VERDE', 12),
(315, 'SAN GREGORIO', 12),
(316, 'LAGUNA BLANCA', 12),
(317, 'PRIMAVERA', 12),
(318, 'TIMAUKEL', 12),
(319, 'NAVARINO', 12),
(320, 'PELLUHUE', 7),
(321, 'JUAN FERNANDEZ', 5),
(322, 'PEÑALOLEN', 13),
(323, 'MACUL', 13),
(324, 'CERRO NAVIA', 13),
(325, 'LO PRADO', 13),
(326, 'SAN RAMON', 13),
(327, 'LA PINTANA', 13),
(328, 'ESTACION CENTRAL', 13),
(329, 'RECOLETA', 13),
(330, 'INDEPENDENCIA', 13),
(331, 'VITACURA', 13),
(332, 'LO BARNECHEA', 13),
(333, 'CERRILLOS', 13),
(334, 'HUECHURABA', 13),
(335, 'SAN JOAQUIN', 13),
(336, 'PEDRO AGUIRRE CERDA', 13),
(337, 'LO ESPEJO', 13),
(338, 'EL BOSQUE', 13),
(339, 'PADRE HURTADO', 13),
(340, 'CONCON', 5),
(341, 'SAN RAFAEL', 7),
(342, 'CHILLAN VIEJO', 8),
(343, 'SAN PEDRO DE LA PAZ', 8),
(344, 'CHIGUAYANTE', 8),
(345, 'PADRE LAS CASAS', 9),
(346, 'ALTO HOSPICIO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_concesionarios`
--

CREATE TABLE IF NOT EXISTS `sitio_concesionarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `comuna_id` bigint(20) unsigned NOT NULL,
  `direccion` varchar(120) DEFAULT NULL,
  `telefono` text,
  `horario` text,
  `gerente_sucursal` text,
  `consultores_servicio` text,
  `ejecutivos_repuestos` text,
  `consultores_repuestos` text,
  `mantenimiento_preventivo` text,
  `latitud` varchar(20) DEFAULT NULL,
  `longitud` varchar(20) DEFAULT NULL,
  `orden` int(10) unsigned DEFAULT '0',
  `activo` tinyint(1) unsigned DEFAULT '1',
  `administrador_id` bigint(20) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_COMUNA` (`comuna_id`),
  KEY `FK_ADMINISTRADOR` (`administrador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sitio_concesionarios`
--

INSERT INTO `sitio_concesionarios` (`id`, `nombre`, `slug`, `comuna_id`, `direccion`, `telefono`, `horario`, `gerente_sucursal`, `consultores_servicio`, `ejecutivos_repuestos`, `consultores_repuestos`, `mantenimiento_preventivo`, `latitud`, `longitud`, `orden`, `activo`, `administrador_id`, `created`, `modified`) VALUES
(2, 'Antofagasta', 'antofagasta', 7, 'Amatista #441, Sector La Chimba.', '<a href="tel:+56552718203">(56-55) 271 8203</a>', 'Lunes a viernes de 8.30 a 18.00 Hrs.', 'Jorge Jara \r\nTel: <a href="tel:+56552718203">(56-55) 271 8203</a>\r\njorge.jara@volvo.com', 'Mauricio Araya:\r\nTel; <a href="tel:+56552718232">(56-55) 271 8232</a>\r\nmauricio.araya@volvo.com\r\n\r\nEnrique Guerrero\r\nTel: <a href="tel:+56552718204">(56-55) 2718204</a>\r\nenrique.guerrero@volvo.com', 'Boris Reygadas\r\nTel: <a href="tel:+5655271 8206">(56-55) 271 8206</a>\r\nboris.reygadas@volvo.com\r\n\r\nIván Tapia\r\nTel:<a href="tel:+56552718210">(56-55) 271 8210</a>\r\nivan.tapia@volvo.com ', '', '', '', '', 1, 1, NULL, '2016-09-26 10:00:17', '2016-09-26 10:00:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_modelos`
--

CREATE TABLE IF NOT EXISTS `sitio_modelos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `orden` int(10) unsigned DEFAULT '0',
  `activo` tinyint(1) unsigned DEFAULT '1',
  `version_activo_count` int(10) unsigned DEFAULT '0',
  `version_inactivo_count` int(10) unsigned DEFAULT '0',
  `producto_activo_count` int(10) unsigned DEFAULT '0',
  `producto_inactivo_count` int(10) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sitio_modelos`
--

INSERT INTO `sitio_modelos` (`id`, `nombre`, `slug`, `orden`, `activo`, `version_activo_count`, `version_inactivo_count`, `producto_activo_count`, `producto_inactivo_count`, `created`, `modified`) VALUES
(1, 'FH', 'fh', 0, 1, 2, 0, 2, 0, '2016-09-09 18:31:28', '2016-09-20 12:07:44'),
(2, 'VM', 'vm', 0, 1, 1, 0, 1, 0, '2016-09-20 12:05:41', '2016-09-20 12:07:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_productos`
--

CREATE TABLE IF NOT EXISTS `sitio_productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(20) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `precio` int(10) unsigned DEFAULT '0',
  `imagen` varchar(60) DEFAULT NULL,
  `activo` tinyint(1) unsigned DEFAULT '1',
  `administrador_id` bigint(20) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `FK_ADMINISTRADOR` (`administrador_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `sitio_productos`
--

INSERT INTO `sitio_productos` (`id`, `sku`, `codigo`, `nombre`, `slug`, `precio`, `imagen`, `activo`, `administrador_id`, `created`, `modified`) VALUES
(1, '21707134', 'C-1010', 'C-1010', NULL, 7490, '57d32ca9-fcac-4368-bff8-056cd3abbe92.jpg', 1, 1, '2016-09-09 18:42:01', '2016-09-13 17:33:29'),
(2, '22480372', 'C-1011', 'C-1011', NULL, 14490, '57d32cc8-571c-4dab-98ae-056cd3abbe92.jpg', 1, 1, '2016-09-09 18:42:32', '2016-09-13 17:53:16'),
(3, '123456', '123456', 'VM-3445', NULL, 25900, '57e150c0-3f2c-40c0-814a-22f8d3abbe92.jpg', 1, 1, '2016-09-20 12:07:44', '2016-09-20 12:07:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_regiones`
--

CREATE TABLE IF NOT EXISTS `sitio_regiones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `sitio_regiones`
--

INSERT INTO `sitio_regiones` (`id`, `nombre`) VALUES
(2, 'Región de Antofagasta'),
(15, 'Región de Arica y Parinacota'),
(3, 'Región de Atacama'),
(11, 'Región de Aysén del General Carlos Ibáñez del Campo'),
(4, 'Región de Coquimbo'),
(9, 'Región de la Araucanía'),
(10, 'Región de Los Lagos'),
(14, 'Región de Los Ríos'),
(12, 'Región de Magallanes y la Antártica Chilena'),
(1, 'Región de Tarapacá'),
(5, 'Región de Valparaiso'),
(8, 'Región del Bío-Bío'),
(6, 'Región del Libertador General Bernardo O Higgins'),
(7, 'Región del Maule'),
(13, 'Región Metropolitana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_versiones`
--

CREATE TABLE IF NOT EXISTS `sitio_versiones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `modelo_id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `modelo_version` varchar(80) DEFAULT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `orden` int(10) unsigned DEFAULT '0',
  `activo` tinyint(1) unsigned DEFAULT '1',
  `producto_activo_count` int(10) unsigned DEFAULT '0',
  `producto_inactivo_count` int(10) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_MODELO` (`modelo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `sitio_versiones`
--

INSERT INTO `sitio_versiones` (`id`, `modelo_id`, `nombre`, `modelo_version`, `slug`, `orden`, `activo`, `producto_activo_count`, `producto_inactivo_count`, `created`, `modified`) VALUES
(1, 1, 'FH12', 'FH - FH12', 'fh12', 0, 1, 1, 0, '2016-09-12 10:42:14', '2016-09-20 12:07:44'),
(2, 1, 'FH13', 'FH - FH13', 'fh13', 0, 1, 1, 0, '2016-09-12 10:42:00', '2016-09-20 12:07:44'),
(3, 2, 'VM-12', 'VM - VM-12', 'vm-12', 0, 1, 1, 0, '2016-09-20 12:06:00', '2016-09-20 12:07:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio_versiones_productos`
--

CREATE TABLE IF NOT EXISTS `sitio_versiones_productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_VERSION` (`version_id`),
  KEY `FK_PRODUCTO` (`producto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Volcado de datos para la tabla `sitio_versiones_productos`
--

INSERT INTO `sitio_versiones_productos` (`id`, `version_id`, `producto_id`) VALUES
(97, 1, 1),
(102, 2, 2),
(103, 3, 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sitio_banners`
--
ALTER TABLE `sitio_banners`
  ADD CONSTRAINT `FK_BANNER_ADMINISTRADOR` FOREIGN KEY (`administrador_id`) REFERENCES `sitio_administradores` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_BANNER_BANNERCATEGORIA` FOREIGN KEY (`banner_categoria_id`) REFERENCES `sitio_banner_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sitio_categorias_productos`
--
ALTER TABLE `sitio_categorias_productos`
  ADD CONSTRAINT `FK_CATEGORIAPRODUCTO_CATEGORIA` FOREIGN KEY (`categoria_id`) REFERENCES `sitio_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CATEGORIAPRODUCTO_PRODUCTO` FOREIGN KEY (`producto_id`) REFERENCES `sitio_productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sitio_comunas`
--
ALTER TABLE `sitio_comunas`
  ADD CONSTRAINT `FK_COMUNA_REGION` FOREIGN KEY (`region_id`) REFERENCES `sitio_regiones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sitio_concesionarios`
--
ALTER TABLE `sitio_concesionarios`
  ADD CONSTRAINT `FK_CONCESIONARIO_ADMINISTRADOR` FOREIGN KEY (`administrador_id`) REFERENCES `sitio_administradores` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CONCESIONARIO_COMUNA` FOREIGN KEY (`comuna_id`) REFERENCES `sitio_comunas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sitio_productos`
--
ALTER TABLE `sitio_productos`
  ADD CONSTRAINT `FK_PRODUCTO_ADMINISTRADOR` FOREIGN KEY (`administrador_id`) REFERENCES `sitio_administradores` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sitio_versiones`
--
ALTER TABLE `sitio_versiones`
  ADD CONSTRAINT `FK_VERSION_MODELO` FOREIGN KEY (`modelo_id`) REFERENCES `sitio_modelos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sitio_versiones_productos`
--
ALTER TABLE `sitio_versiones_productos`
  ADD CONSTRAINT `FK_VERSIONPRODUCTO_PRODUCTO` FOREIGN KEY (`producto_id`) REFERENCES `sitio_productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_VERSIONPRODUCTO_VERSION` FOREIGN KEY (`version_id`) REFERENCES `sitio_versiones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
