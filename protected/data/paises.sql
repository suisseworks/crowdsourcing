-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2013 a las 10:47:47
-- Versión del servidor: 5.5.30-cll
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `emplamer_empleosdeamerica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nw_pais`
--

CREATE TABLE IF NOT EXISTS `nw_pais` (
  `idpais` int(16) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `estado` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `nw_pais`
--

INSERT INTO `nw_pais` (`idpais`, `nombre`, `estado`) VALUES
(1, 'Costa Rica', 'A'),
(2, 'Estados Unidos', 'A'),
(3, 'Argentina', 'A'),
(6, 'El Salvador', 'A'),
(7, 'Chile', 'A'),
(8, 'Uruguay', 'A'),
(9, 'Guatemala', 'A'),
(10, 'Nicaragua', 'A'),
(11, 'Honduras', 'A'),
(12, 'Panamá', 'A'),
(13, 'México', 'A'),
(14, 'Bolivia', 'A'),
(15, 'Brazil', 'A'),
(16, 'Colombia', 'A'),
(18, 'Ecuador', 'A'),
(19, 'España', 'A'),
(20, 'Paraguay', 'A'),
(21, 'Perú', 'A'),
(22, 'Puerto Rico', 'A'),
(23, 'República Dominicana', 'A'),
(24, 'Cuba', 'A'),
(25, 'Venezuela', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
