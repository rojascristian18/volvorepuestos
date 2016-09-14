-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2016 at 09:03 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `volvo_busandtrucks`
--

-- --------------------------------------------------------

--
-- Table structure for table `sitio_administradores`
--

DROP TABLE IF EXISTS `sitio_administradores`;
CREATE TABLE IF NOT EXISTS `sitio_administradores` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `activo` tinyint(1) UNSIGNED DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitio_administradores`
--

INSERT INTO `sitio_administradores` (`id`, `nombre`, `email`, `clave`, `activo`, `created`, `modified`) VALUES
(1, 'Sistemas Reach Latam', 'sistemas@reach-latam.com', '5091e4344b9c643e6d694a034b9e6dfa4fea8eee', 1, '2016-09-09 17:05:54', '2016-09-09 17:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `sitio_banners`
--

DROP TABLE IF EXISTS `sitio_banners`;
CREATE TABLE IF NOT EXISTS `sitio_banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner_categoria_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `orden` int(10) UNSIGNED DEFAULT '0',
  `activo` tinyint(1) UNSIGNED DEFAULT '1',
  `administrador_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_BANNERCATEGORIA` (`banner_categoria_id`),
  KEY `FK_ADMINISTRADOR` (`administrador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sitio_banner_categorias`
--

DROP TABLE IF EXISTS `sitio_banner_categorias`;
CREATE TABLE IF NOT EXISTS `sitio_banner_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `activo` tinyint(1) UNSIGNED DEFAULT '1',
  `banner_activo_count` int(10) UNSIGNED DEFAULT '0',
  `banner_inactivo_count` int(10) UNSIGNED DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitio_banner_categorias`
--

INSERT INTO `sitio_banner_categorias` (`id`, `nombre`, `slug`, `activo`, `banner_activo_count`, `banner_inactivo_count`, `created`, `modified`) VALUES
(1, 'Home', 'home', 1, 0, 0, '2016-09-09 18:58:04', '2016-09-09 18:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `sitio_categorias`
--

DROP TABLE IF EXISTS `sitio_categorias`;
CREATE TABLE IF NOT EXISTS `sitio_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `imagen_secundaria` varchar(120) DEFAULT NULL,
  `orden` int(10) UNSIGNED DEFAULT '0',
  `activo` tinyint(1) UNSIGNED DEFAULT '1',
  `producto_activo_count` int(10) UNSIGNED DEFAULT '0',
  `producto_inactivo_count` int(10) UNSIGNED DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitio_categorias`
--

INSERT INTO `sitio_categorias` (`id`, `nombre`, `slug`, `imagen`, `imagen_secundaria`, `orden`, `activo`, `producto_activo_count`, `producto_inactivo_count`, `created`, `modified`) VALUES
(1, 'Carrocería', 'carroceria', '57d325a0-f0bc-46d4-b6f8-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:12:00', '2016-09-13 17:53:16'),
(2, 'Embrague', 'embrague', '57d3268f-a2dc-45e6-9504-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:15:59', '2016-09-13 17:53:16'),
(3, 'Filtros', 'filtros', '57d3269a-acfc-403a-8d70-056cd3abbe92.jpg', NULL, 0, 1, 2, 0, '2016-09-09 18:16:10', '2016-09-13 17:53:16'),
(4, 'Frenos', 'frenos', '57d326ab-6a34-4d4e-9116-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:16:27', '2016-09-13 17:53:16'),
(5, 'Inyección', 'inyeccion', '57d326b6-7de0-4385-9e5a-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:16:38', '2016-09-13 17:53:16'),
(6, 'Motores', 'motores', '57d326da-2590-43d5-a9de-056cd3abbe92.jpg', NULL, 0, 1, 1, 0, '2016-09-09 18:17:14', '2016-09-13 17:53:16'),
(7, 'Suspensión', 'suspension', '57d326ec-23cc-439d-bb8e-056cd3abbe92.jpg', NULL, 0, 1, 0, 0, '2016-09-09 18:17:32', '2016-09-13 17:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `sitio_categorias_productos`
--

DROP TABLE IF EXISTS `sitio_categorias_productos`;
CREATE TABLE IF NOT EXISTS `sitio_categorias_productos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_CATEGORIA` (`categoria_id`),
  KEY `FK_PRODUCTO` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitio_categorias_productos`
--

INSERT INTO `sitio_categorias_productos` (`id`, `categoria_id`, `producto_id`) VALUES
(109, 3, 1),
(119, 3, 2),
(120, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sitio_comunas`
--

DROP TABLE IF EXISTS `sitio_comunas`;
CREATE TABLE IF NOT EXISTS `sitio_comunas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_REGION` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sitio_concesionarios`
--

DROP TABLE IF EXISTS `sitio_concesionarios`;
CREATE TABLE IF NOT EXISTS `sitio_concesionarios` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `comuna_id` bigint(20) UNSIGNED NOT NULL,
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
  `orden` int(10) UNSIGNED DEFAULT '0',
  `activo` tinyint(1) UNSIGNED DEFAULT '1',
  `administrador_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_COMUNA` (`comuna_id`),
  KEY `FK_ADMINISTRADOR` (`administrador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sitio_modelos`
--

DROP TABLE IF EXISTS `sitio_modelos`;
CREATE TABLE IF NOT EXISTS `sitio_modelos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `orden` int(10) UNSIGNED DEFAULT '0',
  `activo` tinyint(1) UNSIGNED DEFAULT '1',
  `version_activo_count` int(10) UNSIGNED DEFAULT '0',
  `version_inactivo_count` int(10) UNSIGNED DEFAULT '0',
  `producto_activo_count` int(10) UNSIGNED DEFAULT '0',
  `producto_inactivo_count` int(10) UNSIGNED DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitio_modelos`
--

INSERT INTO `sitio_modelos` (`id`, `nombre`, `slug`, `orden`, `activo`, `version_activo_count`, `version_inactivo_count`, `producto_activo_count`, `producto_inactivo_count`, `created`, `modified`) VALUES
(1, 'FH', 'fh', 0, 1, 2, 0, 2, 0, '2016-09-09 18:31:28', '2016-09-13 17:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `sitio_productos`
--

DROP TABLE IF EXISTS `sitio_productos`;
CREATE TABLE IF NOT EXISTS `sitio_productos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sku` varchar(20) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `precio` int(10) UNSIGNED DEFAULT '0',
  `imagen` varchar(60) DEFAULT NULL,
  `activo` tinyint(1) UNSIGNED DEFAULT '1',
  `administrador_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `FK_ADMINISTRADOR` (`administrador_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitio_productos`
--

INSERT INTO `sitio_productos` (`id`, `sku`, `codigo`, `nombre`, `slug`, `precio`, `imagen`, `activo`, `administrador_id`, `created`, `modified`) VALUES
(1, '21707134', 'C-1010', 'C-1010', NULL, 7490, '57d32ca9-fcac-4368-bff8-056cd3abbe92.jpg', 1, 1, '2016-09-09 18:42:01', '2016-09-13 17:33:29'),
(2, '22480372', 'C-1011', 'C-1011', NULL, 14490, '57d32cc8-571c-4dab-98ae-056cd3abbe92.jpg', 1, 1, '2016-09-09 18:42:32', '2016-09-13 17:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `sitio_regiones`
--

DROP TABLE IF EXISTS `sitio_regiones`;
CREATE TABLE IF NOT EXISTS `sitio_regiones` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sitio_versiones`
--

DROP TABLE IF EXISTS `sitio_versiones`;
CREATE TABLE IF NOT EXISTS `sitio_versiones` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `modelo_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `modelo_version` varchar(80) DEFAULT NULL,
  `slug` varchar(80) DEFAULT NULL,
  `orden` int(10) UNSIGNED DEFAULT '0',
  `activo` tinyint(1) UNSIGNED DEFAULT '1',
  `producto_activo_count` int(10) UNSIGNED DEFAULT '0',
  `producto_inactivo_count` int(10) UNSIGNED DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_MODELO` (`modelo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitio_versiones`
--

INSERT INTO `sitio_versiones` (`id`, `modelo_id`, `nombre`, `modelo_version`, `slug`, `orden`, `activo`, `producto_activo_count`, `producto_inactivo_count`, `created`, `modified`) VALUES
(1, 1, 'FH12', 'FH - FH12', 'fh12', 0, 1, 1, 0, '2016-09-12 10:42:14', '2016-09-13 17:53:16'),
(2, 1, 'FH13', 'FH - FH13', 'fh13', 0, 1, 1, 0, '2016-09-12 10:42:00', '2016-09-13 17:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `sitio_versiones_productos`
--

DROP TABLE IF EXISTS `sitio_versiones_productos`;
CREATE TABLE IF NOT EXISTS `sitio_versiones_productos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_VERSION` (`version_id`),
  KEY `FK_PRODUCTO` (`producto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitio_versiones_productos`
--

INSERT INTO `sitio_versiones_productos` (`id`, `version_id`, `producto_id`) VALUES
(97, 1, 1),
(102, 2, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sitio_banners`
--
ALTER TABLE `sitio_banners`
  ADD CONSTRAINT `FK_BANNER_ADMINISTRADOR` FOREIGN KEY (`administrador_id`) REFERENCES `sitio_administradores` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_BANNER_BANNERCATEGORIA` FOREIGN KEY (`banner_categoria_id`) REFERENCES `sitio_banner_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sitio_categorias_productos`
--
ALTER TABLE `sitio_categorias_productos`
  ADD CONSTRAINT `FK_CATEGORIAPRODUCTO_CATEGORIA` FOREIGN KEY (`categoria_id`) REFERENCES `sitio_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CATEGORIAPRODUCTO_PRODUCTO` FOREIGN KEY (`producto_id`) REFERENCES `sitio_productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sitio_comunas`
--
ALTER TABLE `sitio_comunas`
  ADD CONSTRAINT `FK_COMUNA_REGION` FOREIGN KEY (`region_id`) REFERENCES `sitio_regiones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sitio_concesionarios`
--
ALTER TABLE `sitio_concesionarios`
  ADD CONSTRAINT `FK_CONCESIONARIO_ADMINISTRADOR` FOREIGN KEY (`administrador_id`) REFERENCES `sitio_administradores` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_CONCESIONARIO_COMUNA` FOREIGN KEY (`comuna_id`) REFERENCES `sitio_comunas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sitio_productos`
--
ALTER TABLE `sitio_productos`
  ADD CONSTRAINT `FK_PRODUCTO_ADMINISTRADOR` FOREIGN KEY (`administrador_id`) REFERENCES `sitio_administradores` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `sitio_versiones`
--
ALTER TABLE `sitio_versiones`
  ADD CONSTRAINT `FK_VERSION_MODELO` FOREIGN KEY (`modelo_id`) REFERENCES `sitio_modelos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sitio_versiones_productos`
--
ALTER TABLE `sitio_versiones_productos`
  ADD CONSTRAINT `FK_VERSIONPRODUCTO_PRODUCTO` FOREIGN KEY (`producto_id`) REFERENCES `sitio_productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_VERSIONPRODUCTO_VERSION` FOREIGN KEY (`version_id`) REFERENCES `sitio_versiones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
