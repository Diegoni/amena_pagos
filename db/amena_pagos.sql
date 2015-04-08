-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2015 a las 21:03:19
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
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE IF NOT EXISTS `certificados` (
  `id_certificado` int(11) NOT NULL AUTO_INCREMENT,
  `certificado` int(11) NOT NULL,
  PRIMARY KEY (`id_certificado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_usuario` varchar(12) NOT NULL,
  `Clave` varchar(12) NOT NULL,
  `cuil` varchar(128) NOT NULL,
  `url_post` varchar(128) NOT NULL,
  `url_reporte` varchar(128) NOT NULL,
  `url_estado_transferencia` varchar(128) NOT NULL,
  `url_estado_incremental` varchar(128) NOT NULL,
  `url_preconfeccion` varchar(128) NOT NULL,
  `id_comunidad` varchar(32) NOT NULL,
  `id_config_certificado` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `certificado` varchar(128) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id_config`, `Nombre_usuario`, `Clave`, `cuil`, `url_post`, `url_reporte`, `url_estado_transferencia`, `url_estado_incremental`, `url_preconfeccion`, `id_comunidad`, `id_config_certificado`, `id_pais`, `certificado`, `active`) VALUES
(1, 'w9bLuLvFgHI=', 'w9m7tbqUgg==', 'hJiHiI+Zh3qol56CpQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'hpSMh46XiHalk6I=', 1, -2, 'Amena', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_certificado`
--

CREATE TABLE IF NOT EXISTS `config_certificado` (
  `id_certificado` int(11) NOT NULL AUTO_INCREMENT,
  `certificado` varchar(32) NOT NULL,
  PRIMARY KEY (`id_certificado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `config_certificado`
--

INSERT INTO `config_certificado` (`id_certificado`, `certificado`) VALUES
(1, 'X509v3'),
(2, 'PKCS#12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_config`
--

CREATE TABLE IF NOT EXISTS `log_config` (
  `id_log_config` int(11) NOT NULL AUTO_INCREMENT,
  `Accion` varchar(16) NOT NULL,
  `Nombre_usuario_old` varchar(12) NOT NULL,
  `Nombre_usuario_new` varchar(12) NOT NULL,
  `Clave_old` varchar(12) NOT NULL,
  `Clave_new` varchar(12) NOT NULL,
  `cuil_old` text NOT NULL,
  `cuil_new` text NOT NULL,
  `url_post_old` varchar(128) NOT NULL,
  `url_post_new` varchar(128) NOT NULL,
  `url_reporte_old` varchar(128) NOT NULL,
  `url_reporte_new` varchar(128) NOT NULL,
  `url_estado_transferencia_old` varchar(128) NOT NULL,
  `url_estado_transferencia_new` varchar(128) NOT NULL,
  `id_comunidad_old` varchar(32) NOT NULL,
  `id_comunidad_new` varchar(32) NOT NULL,
  `id_config_certificado_old` int(11) NOT NULL,
  `id_config_certificado_new` int(11) NOT NULL,
  `id_pais_old` int(11) NOT NULL,
  `id_pais_new` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `usuario` varchar(64) NOT NULL,
  PRIMARY KEY (`id_log_config`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id_transaccion`, `cuit`, `importe`, `periodo`, `fechapago`, `comprob`, `token`, `date_add`) VALUES
(1, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-01 13:33:14'),
(2, '30123456789', 3650.4, '02/2015', '2015-01-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:15:35'),
(3, '30123456789', 3650.4, '02/2015', '2015-03-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:15:54'),
(4, '30123456789', 3650.4, '02/2015', '2015-01-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:16:01'),
(5, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:16:20'),
(6, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:55:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `clave` varchar(32) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `clave`, `email`, `last_login`, `active`) VALUES
(1, 'tMjDvMc=', 'e956d1f5d589a122abf96f60af4acc95', 'diego.nieto@tmsgroup.com.ar', '2015-04-07 16:19:24', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
