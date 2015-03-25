-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2015 a las 19:17:40
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `amena_pagos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_error_transacciones`
--

CREATE TABLE IF NOT EXISTS `log_error_transacciones` (
  `id_error` int(11) NOT NULL AUTO_INCREMENT,
  `cuit` varchar(32) NOT NULL,
  `importe` varchar(32) NOT NULL,
  `periodo` varchar(32) NOT NULL,
  `fechapago` varchar(32) NOT NULL,
  `comprob` varchar(32) NOT NULL,
  `token` varchar(64) NOT NULL,
  `dato` varchar(64) NOT NULL,
  `error` varchar(64) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_error`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `log_error_transacciones`
--

INSERT INTO `log_error_transacciones` (`id_error`, `cuit`, `importe`, `periodo`, `fechapago`, `comprob`, `token`, `dato`, `error`, `date_add`) VALUES
(1, '30123456789', '3650.4', '02/2015', '2015/02/03', '', '000421020320150220153.650,4030123456789', 'comprob', 'required', '2015-03-19 17:15:26'),
(2, '30123456789', '3650.4', '02/2015', '2015/02/03', '000421', '000421020320150220153.650,4030123456789', 'comprob', 'min_length', '2015-03-19 17:16:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transacciones`
--

CREATE TABLE IF NOT EXISTS `transacciones` (
  `id_transaccion` int(11) NOT NULL AUTO_INCREMENT,
  `cuit` varchar(32) NOT NULL,
  `importe` float NOT NULL,
  `periodo` varchar(32) NOT NULL,
  `fechapago` date NOT NULL,
  `comprob` varchar(32) NOT NULL,
  `token` varchar(64) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_transaccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id_transaccion`, `cuit`, `importe`, `periodo`, `fechapago`, `comprob`, `token`, `date_add`) VALUES
(1, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '0000-00-00 00:00:00'),
(2, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '0000-00-00 00:00:00'),
(3, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '0000-00-00 00:00:00'),
(4, '30123456789', 3650.4, '02/2015', '2015-02-03', '', '000421020320150220153.650,4030123456789', '0000-00-00 00:00:00'),
(5, '30123456789', 3650.4, '02/2015', '2015-02-03', '', '000421020320150220153.650,4030123456789', '0000-00-00 00:00:00'),
(6, '30123456789', 3650.4, '02/2015', '2015-02-03', '', '000421020320150220153.650,4030123456789', '0000-00-00 00:00:00'),
(7, '30123456789', 3650.4, '02/2015', '2015-02-03', '', '000421020320150220153.650,4030123456789', '0000-00-00 00:00:00'),
(8, '30123456789', 3650.4, '02/2015', '2015-02-03', '', '000421020320150220153.650,4030123456789', '0000-00-00 00:00:00'),
(9, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '0000-00-00 00:00:00'),
(10, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '2015-03-19 17:19:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
