-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2015 a las 18:24:30
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
  `url_cierre_comunidad` varchar(128) NOT NULL,
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

INSERT INTO `config` (`id_config`, `Nombre_usuario`, `Clave`, `cuil`, `url_post`, `url_reporte`, `url_estado_transferencia`, `url_estado_incremental`, `url_preconfeccion`, `url_cierre_comunidad`, `id_comunidad`, `id_config_certificado`, `id_pais`, `certificado`, `active`) VALUES
(1, 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'hpSMh46XiHalk6I=', 1, -2, 'Amena', 1);

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
-- Estructura de tabla para la tabla `estados_transaccion`
--

CREATE TABLE IF NOT EXISTS `estados_transaccion` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(4) NOT NULL,
  `descripcion` varchar(64) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `compensacion` varchar(64) NOT NULL,
  `delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `estados_transaccion`
--

INSERT INTO `estados_transaccion` (`id_estado`, `estado`, `descripcion`, `compensacion`, `delete`) VALUES
(1, 'CO', 'Confeccionada', 'No compensa', 0),
(2, 'CA', 'Cancelada', 'No compensa', 0),
(3, 'PA', 'Parcialmente Autorizada', 'No compensa', 0),
(4, 'AU', 'Autorizada', 'No compensa', 0),
(5, 'RE', 'Rechazada', 'No compensa', 0),
(6, 'TX', 'Transmitiendose a la red', 'No compensa', 0),
(7, 'ED', 'Enviada al Banco Debito', 'No compensa', 0),
(8, 'RD', 'Rechazada Banco Debito', 'No compensa', 0),
(9, 'EC', 'Enviada Banco Credito', 'Compensa al cierre de la Red', 0),
(10, 'RC', 'Rechazada Banco Credito', 'No compensa', 0),
(11, 'EJ', 'Ejecutada', 'Compensa', 0),
(12, 'DE', 'Desconocido', 'No compensa', 0),
(13, '', '', '', 1),
(14, 'NU', 'Nuevo', 'Nuevo', 1),
(15, 'NU', 'Nuevo', 'Nuevo', 1),
(16, 'NU', 'Nuevo', 'Nuevo', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Volcado de datos para la tabla `log_error_transacciones`
--

INSERT INTO `log_error_transacciones` (`id_error`, `cuit`, `importe`, `periodo`, `fechapago`, `comprob`, `token`, `dato`, `error`, `date_add`) VALUES
(1, '', '0', '', '1969/12/31', '', '', 'cuit', 'length', '2015-04-10 10:02:10'),
(2, '', '0', '', '1969/12/31', '', '', 'cuit', 'required', '2015-04-10 10:02:10'),
(3, '', '0', '', '1969/12/31', '', '', 'periodo', 'required', '2015-04-10 10:02:10'),
(4, '', '0', '', '1969/12/31', '', '', 'comprob', 'required', '2015-04-10 10:02:10'),
(5, '', '0', '', '1969/12/31', '', '', 'token', 'required', '2015-04-10 10:02:10'),
(6, '30123456789 ', '3650.4', '02/2015', '2015/02/03', '000421', '', 'cuit', 'length', '2015-04-10 10:39:02'),
(7, '30123456789 ', '3650.4', '02/2015', '2015/02/03', '000421', '', 'token', 'required', '2015-04-10 10:39:02'),
(8, '30123456789 ', '3650.4', '02/2015', '2015/02/03', '000421', '', 'cuit', 'length', '2015-04-10 10:41:54'),
(9, '30123456789 ', '3650.4', '02/2015', '2015/02/03', '000421', '', 'token', 'required', '2015-04-10 10:41:54'),
(10, '2331246501', '70050', '03/2015', '2015/10/04', '000422', '0004221004/2015032015700502331246501', 'cuit', 'length', '2015-04-10 10:46:55'),
(11, '2331246501', '3650.4', '03/2015', '2015/02/03', '000422', '0004220203/2015 0320153650402331246501', 'cuit', 'length', '2015-04-10 10:47:50'),
(12, '2331246501', '700050', '03/2015', '2015/02/03', '000422', '00042202032015 0320157000502331246501', 'cuit', 'length', '2015-04-10 10:48:17'),
(13, '2331246501', '700050', '03/2015', '2015/10/04', '000422', '000422100420150320157000502331246501', 'cuit', 'length', '2015-04-10 10:49:26'),
(14, '2331246501', '3650.4', '03/2015', '2015/10/04', '000422', '000422100420150320153650402331246501', 'cuit', 'length', '2015-04-10 10:49:52'),
(15, '2331246501', '3650.4', '03/2015', '2015/02/03', '000422', '00042202032015 0320153650402331246501', 'cuit', 'length', '2015-04-10 10:50:54'),
(16, '30123456789 ', '6500', '10/2014', '2014/10/10', '000398', '00039810102014102014650030123456789 ', 'cuit', 'length', '2015-04-10 11:24:29'),
(17, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:11:02'),
(18, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:11:40'),
(19, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:15:34'),
(20, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:15:47'),
(21, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:16:12'),
(22, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:18:56'),
(23, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:19:04'),
(24, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:19:17'),
(25, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:19:39'),
(26, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:19:46'),
(27, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:20:16'),
(28, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:20:24'),
(29, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:20:49'),
(30, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:22:04'),
(31, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:22:52'),
(32, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:23:01'),
(33, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:23:41'),
(34, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:24:03'),
(35, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:24:13'),
(36, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:24:40'),
(37, '1515', '121551', '04/2015', '2015/01/04', '00015', '00015010420150420151215511515', 'cuit', 'length', '2015-04-10 16:24:45'),
(38, '', '0', '', '1969/12/31', '', '', 'cuit', 'length', '2015-04-10 16:25:15'),
(39, '', '0', '', '1969/12/31', '', '', 'cuit', 'required', '2015-04-10 16:25:15'),
(40, '', '0', '', '1969/12/31', '', '', 'periodo', 'required', '2015-04-10 16:25:15'),
(41, '', '0', '', '1969/12/31', '', '', 'comprob', 'required', '2015-04-10 16:25:16'),
(42, '', '0', '', '1969/12/31', '', '', 'token', 'required', '2015-04-10 16:25:16'),
(43, '', '0', '', '1969/12/31', '', '', 'cuit', 'length', '2015-04-10 16:25:26'),
(44, '', '0', '', '1969/12/31', '', '', 'cuit', 'required', '2015-04-10 16:25:26'),
(45, '', '0', '', '1969/12/31', '', '', 'periodo', 'required', '2015-04-10 16:25:26'),
(46, '', '0', '', '1969/12/31', '', '', 'comprob', 'required', '2015-04-10 16:25:26'),
(47, '', '0', '', '1969/12/31', '', '', 'token', 'required', '2015-04-10 16:25:26'),
(48, '', '0', '', '1969/12/31', '', '', 'cuit', 'length', '2015-04-10 16:25:35'),
(49, '', '0', '', '1969/12/31', '', '', 'cuit', 'required', '2015-04-10 16:25:35'),
(50, '', '0', '', '1969/12/31', '', '', 'periodo', 'required', '2015-04-10 16:25:35'),
(51, '', '0', '', '1969/12/31', '', '', 'comprob', 'required', '2015-04-10 16:25:35'),
(52, '', '0', '', '1969/12/31', '', '', 'token', 'required', '2015-04-10 16:25:35'),
(53, '', '0', '', '1969/12/31', '', '', 'cuit', 'length', '2015-04-10 16:25:37'),
(54, '', '0', '', '1969/12/31', '', '', 'cuit', 'required', '2015-04-10 16:25:37'),
(55, '', '0', '', '1969/12/31', '', '', 'periodo', 'required', '2015-04-10 16:25:37'),
(56, '', '0', '', '1969/12/31', '', '', 'comprob', 'required', '2015-04-10 16:25:37'),
(57, '', '0', '', '1969/12/31', '', '', 'token', 'required', '2015-04-10 16:25:37'),
(58, '', '0', '', '1969/12/31', '', '', 'cuit', 'length', '2015-04-10 16:25:58'),
(59, '', '0', '', '1969/12/31', '', '', 'cuit', 'required', '2015-04-10 16:25:58'),
(60, '', '0', '', '1969/12/31', '', '', 'periodo', 'required', '2015-04-10 16:25:59'),
(61, '', '0', '', '1969/12/31', '', '', 'comprob', 'required', '2015-04-10 16:25:59'),
(62, '', '0', '', '1969/12/31', '', '', 'token', 'required', '2015-04-10 16:25:59'),
(63, '', '0', '', '1969/12/31', '', '', 'cuit', 'length', '2015-04-10 16:26:10'),
(64, '', '0', '', '1969/12/31', '', '', 'cuit', 'required', '2015-04-10 16:26:10'),
(65, '', '0', '', '1969/12/31', '', '', 'periodo', 'required', '2015-04-10 16:26:10'),
(66, '', '0', '', '1969/12/31', '', '', 'comprob', 'required', '2015-04-10 16:26:10'),
(67, '', '0', '', '1969/12/31', '', '', 'token', 'required', '2015-04-10 16:26:11');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id_transaccion`, `cuit`, `importe`, `periodo`, `fechapago`, `comprob`, `token`, `date_add`) VALUES
(1, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-01 13:33:14'),
(2, '30123456789', 3650.4, '02/2015', '2015-01-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:15:35'),
(3, '30123456789', 3650.4, '02/2015', '2015-03-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:15:54'),
(4, '30123456789', 3650.4, '02/2015', '2015-01-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:16:01'),
(5, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:16:20'),
(6, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', '2015-04-06 15:55:44'),
(7, '30123456789', 700050, '03/2015', '2015-02-03', '000422', '0004220203/2015 03201570005030123456789', '2015-04-10 10:43:14'),
(8, '30123456789', 700050, '03/2015', '2015-02-03', '000422', '0004220203/2015 03201570005030123456789', '2015-04-10 10:43:55'),
(9, '23312465019', 3650.4, '03/2015', '2015-02-03', '000422', '00042202032015 03201536504023312465019', '2015-04-10 10:51:43'),
(10, '23312465019', 70005, '04/2015', '2015-02-04', '000423', '00042302042015 0420157000523312465019', '2015-04-10 10:52:35'),
(11, '23312465019', 875410, '01/2015', '1969-12-31', '000430', '00043023012015 01201587541023312465019', '2015-04-10 10:54:39'),
(12, '23312465019', 875410, '01/2015', '1969-12-31', '000430', '00043023012015 01201587541023312465019', '2015-04-10 10:55:07'),
(13, '23312465019', 12548, '12/2014', '2014-01-12', '000418', '000418011220141220141254823312465019', '2015-04-10 10:57:28'),
(14, '30123456889', 500, '11/2014', '2014-11-11', '000400', '0004001111201411201450030123456889', '2015-04-10 11:22:06'),
(15, '30123456789', 6500, '10/2014', '2014-10-10', '000398', '00039810102014102014650030123456789', '2015-04-10 11:24:48'),
(16, '30123456789', 48, '09/2014', '2014-09-09', '000350', '000350090920140920144830123456789', '2015-04-10 11:26:15'),
(17, '23312465019', 400, '08/2014', '2014-08-08', '000325', '0003250808201408201440023312465019', '2015-04-10 11:27:03'),
(18, '23312465019', 4535, '08/2014', '2014-08-08', '000300', '00030008082014082014453523312465019', '2015-04-10 11:29:24'),
(19, '30123456789', 10000000, '01/2015', '2015-01-01', '000424', '000424010120150120151000000030123456789', '2015-04-10 11:35:25'),
(20, '23312465019', 500, '04/2015', '2015-08-04', '000423', '0004230804201504201550023312465019', '2015-04-13 12:56:45'),
(21, '23312465019', 500, '04/2015', '1969-12-31', '000422', '0004221304201504201550023312465019', '2015-04-13 12:57:15'),
(22, '30123456789', 121551, '04/2015', '2015-02-03', '000422', '00042202032015 04201512155130123456789', '2015-04-13 12:58:08'),
(23, '23312465019', 500, '04/2015', '1969-12-31', '000415', '0004151404201504201550023312465019', '2015-04-14 12:25:08'),
(24, '23312465019', 121551, '04/2015', '2015-10-04', '000500', '0005001004201504201512155123312465019', '2015-04-14 12:26:09'),
(25, '23312465019', 605050, '03/2015', '2015-11-03', '000315', '0003151103201503201560505023312465019', '2015-04-14 12:28:40'),
(26, '23312465019', 6050.5, '02/2015', '2015-04-02', '000215', '0002150402201502201560505023312465019', '2015-04-14 12:30:29'),
(27, '23312465019', 8000.35, '02/2015', '2015-07-01', '000115', '0001150701201502201580003523312465019', '2015-04-14 12:33:25'),
(28, '23312465019', 3650.4, '12/2014', '2015-08-04', '008415', '0084150804201512201436504023312465019', '2015-04-14 12:34:34'),
(29, '23312465019', 500, '03/2015', '1969-12-31', '000421', '00042123012015 03201550023312465019', '2015-04-14 12:35:08'),
(30, '23312465019', 15454, '04/2014', '1969-12-31', '004445', '004445170420140420141545423312465019', '2015-04-14 12:36:02'),
(31, '23312465019', 666, '06/2006', '2006-06-06', '666666', '6666660606200606200666623312465019', '2015-04-14 12:38:38'),
(32, '23312465019', 121551, '03/2015', '2015-10-04', '000422', '0004221004201503201512155123312465019', '2015-04-14 12:39:25'),
(33, '23312465019', 8989, '04/2015', '2015-08-04', '457878', '45787808042015042015898923312465019', '2015-04-14 12:40:16'),
(34, '23312465019', 121551, '02/2015', '1969-12-31', '8787', '878723012015 02201512155123312465019', '2015-04-14 12:41:00'),
(35, '23312465019', 98, '04/2015', '2015-08-04', '85858', '85858080420150420159823312465019', '2015-04-14 12:41:42');

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
(1, 'admin', 'e956d1f5d589a122abf96f60af4acc95', 'diego.nieto@tmsgroup.com.ar', '2015-04-14 13:14:08', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
