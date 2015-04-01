-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2015 a las 18:24:43
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
  `id_comunidad` varchar(32) NOT NULL,
  `id_config_certificado` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id_config`, `Nombre_usuario`, `Clave`, `cuil`, `url_post`, `url_reporte`, `url_estado_transferencia`, `id_comunidad`, `id_config_certificado`, `id_pais`, `active`) VALUES
(1, 'w9bLuLvFgHI=', 'w9m7tbqUgg==', 'hJiHiI+Zh3qol56CpQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'hpSMh46XiHalk6I=', 1, -2, 1);

--
-- Disparadores `config`
--
DROP TRIGGER IF EXISTS `config_delete`;
DELIMITER //
CREATE TRIGGER `config_delete` AFTER DELETE ON `config`
 FOR EACH ROW BEGIN
  INSERT INTO `log_config`
	(	Accion,
        Nombre_usuario_old,
		Nombre_usuario_new,
		Clave_old,
		Clave_new,
		cuil_old,
		cuil_new,
		url_post_old,
		url_post_new,
		url_reporte_old,
		url_reporte_new,
		url_estado_transferencia_old,
		url_estado_transferencia_new,
		id_comunidad_old,
		id_comunidad_new,
		id_config_certificado_old,
		id_config_certificado_new,
		id_pais_old,
		id_pais_new,
	date,
	usuario)
	VALUES	(
	'Delete',
	OLD.Nombre_usuario,
	NULL,
	OLD.Clave,
	NULL,
	OLD.cuil,
	NULL,
	OLD.url_post,
	NULL,
	OLD.url_reporte,
	NULL,
	OLD.url_estado_transferencia,
	NULL,
	OLD.id_comunidad,
	NULL,
	OLD.id_config_certificado,
	NULL,
	OLD.id_pais,
	NULL,
	NOW(),
	CURRENT_USER());
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `config_insert`;
DELIMITER //
CREATE TRIGGER `config_insert` AFTER INSERT ON `config`
 FOR EACH ROW BEGIN
  INSERT INTO `log_config`
	(	Accion,
        Nombre_usuario_old,
		Nombre_usuario_new,
		Clave_old,
		Clave_new,
		cuil_old,
		cuil_new,
		url_post_old,
		url_post_new,
		url_reporte_old,
		url_reporte_new,
		url_estado_transferencia_old,
		url_estado_transferencia_new,
		id_comunidad_old,
		id_comunidad_new,
		id_config_certificado_old,
		id_config_certificado_new,
		id_pais_old,
		id_pais_new,
	date,
	usuario)
	VALUES	(
	'Update',
	NULL,
	NEW.Nombre_usuario,
	NULL,
	NEW.Clave,
	NULL,
	NEW.cuil,
	NULL,
	NEW.url_post,
	NULL,
	NEW.url_reporte,
	NULL,
	NEW.url_estado_transferencia,
	NULL,
	NEW.id_comunidad,
	NULL,
	NEW.id_config_certificado,
	NULL,
	NEW.id_pais,
	NOW(),
	CURRENT_USER());
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `config_update`;
DELIMITER //
CREATE TRIGGER `config_update` AFTER UPDATE ON `config`
 FOR EACH ROW BEGIN
  INSERT INTO `log_config`
	(	Accion,
        Nombre_usuario_old,
		Nombre_usuario_new,
		Clave_old,
		Clave_new,
		cuil_old,
		cuil_new,
		url_post_old,
		url_post_new,
		url_reporte_old,
		url_reporte_new,
		url_estado_transferencia_old,
		url_estado_transferencia_new,
		id_comunidad_old,
		id_comunidad_new,
		id_config_certificado_old,
		id_config_certificado_new,
		id_pais_old,
		id_pais_new,
	date,
	usuario)
	VALUES	(
	'Update',
	OLD.Nombre_usuario,
	NEW.Nombre_usuario,
	OLD.Clave,
	NEW.Clave,
	OLD.cuil,
	NEW.cuil,
	OLD.url_post,
	NEW.url_post,
	OLD.url_reporte,
	NEW.url_reporte,
	OLD.url_estado_transferencia,
	NEW.url_estado_transferencia,
	OLD.id_comunidad,
	NEW.id_comunidad,
	OLD.id_config_certificado,
	NEW.id_config_certificado,
	OLD.id_pais,
	NEW.id_pais,
	NOW(),
	CURRENT_USER());
END
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id_transaccion`, `cuit`, `importe`, `periodo`, `fechapago`, `comprob`, `token`, `date_add`) VALUES
(1, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-01 13:24:24');

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
(1, 'tMjDvMc=', 'e956d1f5d589a122abf96f60af4acc95', 'diego.nieto@tmsgroup.com.ar', '2015-04-01 13:23:26', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
