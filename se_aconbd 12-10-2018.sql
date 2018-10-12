-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-10-2018 a las 20:29:29
-- Versión del servidor: 5.7.23
-- Versión de PHP: 5.6.38

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
  `maps_anuncio` varchar(1000) DEFAULT NULL,
  `dir_anuncio` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_anuncio`),
  KEY `fk_ciudad_idx` (`ciudad_anuncio`),
  KEY `fk_comuna_idx` (`comuna_anuncio`),
  KEY `fk_cat_idx` (`cat_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id_anuncio`, `ciudad_anuncio`, `comuna_anuncio`, `nom_anuncio`, `cat_anuncio`, `fono1_anuncio`, `fono2_anuncio`, `desc_anuncio`, `fb_anuncio`, `ig_anuncio`, `tw_anuncio`, `ws_anuncio`, `vig_anuncio`, `hdesde_anuncio`, `hhasta_anuncio`, `maps_anuncio`, `dir_anuncio`) VALUES
(1, 1, 1, 'Sushi Delivery', 1, 96643838, 342482686, 'delivery de sushi', 'www.facebook.com', 'www.instagram.com', 'www.twitter.com', 'www.andescode.cl', 1, '18:00:00', '02:00:00', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d592.8276157190675!2d-70.57138668426028!3d-32.80446970548265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x968805979028bf75%3A0x99a7f509fbda8609!2sCIBUM+FOOD+TRACK!5e0!3m2!1ses-419!2scl!4v1539374073225\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'ciudad gotica'),
(2, 1, 1, 'Sushi local', 1, 96643838, NULL, 'delivery de sushi', 'www.facebook.com', 'www.instagram.com', 'www.twitter.com', 'www.andescode.cl', 1, '18:00:00', '02:00:00', 'https://goo.gl/maps/DM6q71rWYwu', NULL),
(3, 1, 1, 'Sushi local', 1, 96643838, NULL, 'delivery de sushi', 'www.facebook.com', 'www.instagram.com', 'www.twitter.com', 'www.andescode.cl', 1, '18:00:00', '02:00:00', 'https://goo.gl/maps/DM6q71rWYwu', NULL);

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

--
-- Volcado de datos para la tabla `cat_anuncio`
--

INSERT INTO `cat_anuncio` (`id_cat`, `nom_cat`, `vig_cat`) VALUES
(1, 'Delivery', 1);

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

--
-- Volcado de datos para la tabla `ciudad_cl`
--

INSERT INTO `ciudad_cl` (`id_ciudad`, `nom_ciudad`, `vig_ciudad`) VALUES
(1, 'Los Andes', 1);

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

--
-- Volcado de datos para la tabla `comunas_cl`
--

INSERT INTO `comunas_cl` (`id_comuna`, `nom_comuna`, `vig_comuna`, `fk_id_ciudad`) VALUES
(1, 'San Esteban', 1, 1),
(2, 'Calle Larga', 1, 1),
(3, 'Los Andes', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_anuncio`
--

DROP TABLE IF EXISTS `img_anuncio`;
CREATE TABLE IF NOT EXISTS `img_anuncio` (
  `fk_id_anuncio` int(11) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  KEY `fk_anu_img_idx` (`fk_id_anuncio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `img_anuncio`
--

INSERT INTO `img_anuncio` (`fk_id_anuncio`, `img`) VALUES
(1, 'https://www.lapleta.com/files-sbbasic/sr_lapleta_com/rafael-hotels-by-la-pleta-hotel-sushi-3.jpg'),
(1, 'https://images-gmi-pmc.edge-generalmills.com/d1584f73-4865-4b8b-b3e5-7f9ca741366f.jpg');

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
