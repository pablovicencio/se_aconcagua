-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-10-2018 a las 19:58:09
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `se_aconbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE IF NOT EXISTS `anuncios` (
  `id_anuncio` int(11) NOT NULL AUTO_INCREMENT,
  `ciudad_anuncio` int(11) DEFAULT NULL,
  `comuna_anuncio` int(11) DEFAULT NULL,
  `nom_anuncio` varchar(100) DEFAULT NULL,
  `cat_anuncio` int(11) DEFAULT NULL,
  `fono1_anuncio` int(11) DEFAULT NULL,
  `fono2_anuncio` int(11) DEFAULT NULL,
  `desc_anuncio` varchar(350) DEFAULT NULL,
  `fb_anuncio` varchar(100) DEFAULT NULL,
  `ig_anuncio` varchar(100) DEFAULT NULL,
  `tw_anuncio` varchar(100) DEFAULT NULL,
  `ws_anuncio` varchar(100) DEFAULT NULL,
  `vig_anuncio` int(11) DEFAULT NULL,
  `hdesde_anuncio` time DEFAULT NULL,
  `hhasta_anuncio` time DEFAULT NULL,
  `maps_anuncio` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_anuncio`),
  KEY `fk_ciudad_idx` (`ciudad_anuncio`),
  KEY `fk_comuna_idx` (`comuna_anuncio`),
  KEY `fk_cat_idx` (`cat_anuncio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_anuncio`
--

DROP TABLE IF EXISTS `cat_anuncio`;
CREATE TABLE IF NOT EXISTS `cat_anuncio` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(100) DEFAULT NULL,
  `vig_cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad_cl`
--

DROP TABLE IF EXISTS `ciudad_cl`;
CREATE TABLE IF NOT EXISTS `ciudad_cl` (
  `id_ciudad` int(11) NOT NULL,
  `nom_ciudad` varchar(50) DEFAULT NULL,
  `vig_ciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas_cl`
--

DROP TABLE IF EXISTS `comunas_cl`;
CREATE TABLE IF NOT EXISTS `comunas_cl` (
  `id_comuna` int(11) NOT NULL,
  `nom_comuna` varchar(50) DEFAULT NULL,
  `vig_comuna` int(11) DEFAULT NULL,
  `fk_id_ciudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comuna`),
  KEY `fk_ciu_com_idx` (`fk_id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

DROP TABLE IF EXISTS `puntaje`;
CREATE TABLE IF NOT EXISTS `puntaje` (
  `id_puntaje` int(11) NOT NULL,
  `nota_puntaje` int(11) DEFAULT NULL,
  `vig_puntaje` int(11) DEFAULT NULL,
  `fk_anuncio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_puntaje`),
  KEY `fk_puntaje_anuncio_idx` (`fk_anuncio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_anuncio`) REFERENCES `cat_anuncio` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ciudad` FOREIGN KEY (`ciudad_anuncio`) REFERENCES `ciudad_cl` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comuna` FOREIGN KEY (`comuna_anuncio`) REFERENCES `comunas_cl` (`id_comuna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comunas_cl`
--
ALTER TABLE `comunas_cl`
  ADD CONSTRAINT `fk_comuna_ciudad` FOREIGN KEY (`fk_id_ciudad`) REFERENCES `ciudad_cl` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD CONSTRAINT `fk_puntaje_anuncio` FOREIGN KEY (`fk_anuncio`) REFERENCES `anuncios` (`id_anuncio`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
