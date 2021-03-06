-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2015 a las 16:54:22
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
  `certificado` varchar(64) NOT NULL,
  `tipo` varchar(64) NOT NULL,
  `size` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_certificado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `certificados`
--

INSERT INTO `certificados` (`id_certificado`, `certificado`, `tipo`, `size`, `active`, `date_add`) VALUES
(1, 'Amena.cer', 'application/x-x509-ca-cert', '944', 1, '2015-04-21 10:20:42'),
(2, 'Amena.ks', 'application/octet-stream', '1422', 1, '2015-04-21 10:20:48'),
(3, 'Amena.pfx', 'application/x-pkcs12', '993', 1, '2015-04-21 10:20:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cuil` varchar(64) NOT NULL,
  `razon_social` varchar(128) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `telefono` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `apellido` varchar(64) NOT NULL,
  `telefono_contacto` varchar(64) NOT NULL,
  `email_contacto` varchar(64) NOT NULL,
  `img_perfil` varchar(128) NOT NULL DEFAULT 'img_perfil/user.png',
  `tipo` varchar(64) NOT NULL,
  `size` varchar(64) NOT NULL,
  `delete` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cuil`, `razon_social`, `alias`, `telefono`, `email`, `direccion`, `nombre`, `apellido`, `telefono_contacto`, `email_contacto`, `img_perfil`, `tipo`, `size`, `delete`) VALUES
(1, '30573118983', 'TMS GROUP Sociedad AnÃ³nima ', 'Diego TMS Group', '4396721', 'diego.nieto@tmsgroup.com.ar', 'Mariano Moreno', 'Diego', 'Nieto', '4396721', 'diego.nieto@tmsgroup.com.ar', 'img_perfil/1.png', 'image/png', '2232', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuentarecaudacion` varchar(64) NOT NULL,
  `Nombre_usuario` varchar(12) NOT NULL,
  `Clave` varchar(12) NOT NULL,
  `cuil` varchar(128) NOT NULL,
  `url_post` varchar(128) NOT NULL,
  `url_reporte` varchar(128) NOT NULL,
  `url_estado_transferencia` varchar(128) NOT NULL,
  `url_estado_incremental` varchar(128) NOT NULL,
  `url_preconfeccion` varchar(128) NOT NULL,
  `url_cierre_comunidad` varchar(128) NOT NULL,
  `url_interbanking` varchar(128) NOT NULL,
  `id_comunidad` varchar(32) NOT NULL,
  `id_config_certificado` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `certificado` varchar(128) NOT NULL,
  `clave_privada` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `asunto` varchar(128) NOT NULL,
  `firma_email` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id_config`, `id_cuentarecaudacion`, `Nombre_usuario`, `Clave`, `cuil`, `url_post`, `url_reporte`, `url_estado_transferencia`, `url_estado_incremental`, `url_preconfeccion`, `url_cierre_comunidad`, `url_interbanking`, `id_comunidad`, `id_config_certificado`, `id_pais`, `certificado`, `clave_privada`, `email`, `asunto`, `firma_email`, `active`) VALUES
(1, 'g5iKg4qUgnWikZ2ApKN2p5mYdmeZag==', 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'hpSMh46XiHalk6I=', 1, -2, 'Amena', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', 'amena@amena.org.ar', 'Pagos Interbanking', '<p>Administraci&oacute;n de A.M.E.N.A.</p>\r\n', 1);

--
-- Disparadores `config`
--
DROP TRIGGER IF EXISTS `config_ADEL`;
DELIMITER //
CREATE TRIGGER `config_ADEL` AFTER DELETE ON `config`
 FOR EACH ROW BEGIN
  INSERT INTO log_config
	(
	  `Accion`, 
	  `Nombre_usuario_old`,
	  `Nombre_usuario_new`, 
	  `Clave_old`,
	  `Clave_new`, 
	  `cuil_old`,
	  `cuil_new`,
	  `url_post_old`,
	  `url_post_new`, 
	  `url_reporte_old`, 
	  `url_reporte_new`, 
	  `url_estado_transferencia_old`, 
	  `url_estado_transferencia_new`, 
	  `url_estado_incremental_old`, 
	  `url_estado_incremental_new`, 
	  `url_preconfeccion_old`, 
	  `url_preconfeccion_new`, 
	  `url_cierre_comunidad_old`,
	  `url_cierre_comunidad_new`, 
	  `url_interbanking_old`, 
	  `url_interbanking_new`, 
	  `id_comunidad_old`, 
	  `id_comunidad_new`, 
	  `id_config_certificado_old`, 
	  `id_config_certificado_new`, 
	  `id_pais_old`, 
	  `id_pais_new`, 
	  `certificado_old`, 
	  `certificado_new`, 
	  `clave_privada_old`, 
	  `clave_privada_new`, 
	  `date`, 
	  `usuario` 
	)
	VALUES	(
	'Delete',
	OLD.Nombre_usuario,
	null, 
	OLD.Clave,
	null,
	OLD.cuil,
	null,
	OLD.url_post,
	null,
	OLD.url_reporte, 
	null,
	OLD.url_estado_transferencia, 
	null,
	OLD.url_estado_incremental, 
	null,
	OLD.url_preconfeccion, 
	null,
	OLD.url_cierre_comunidad,
	null,
	OLD.url_interbanking, 
	null,
	OLD.id_comunidad, 
	null,
	OLD.id_config_certificado, 
	null,
	OLD.id_pais, 
	null,
	OLD.certificado, 
	null,
	OLD.clave_privada, 
	null,
	NOW(),
	CURRENT_USER());
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `config_AINS`;
DELIMITER //
CREATE TRIGGER `config_AINS` AFTER INSERT ON `config`
 FOR EACH ROW BEGIN
  INSERT INTO log_config
	(
	  `Accion`, 
	  `Nombre_usuario_old`,
	  `Nombre_usuario_new`, 
	  `Clave_old`,
	  `Clave_new`, 
	  `cuil_old`,
	  `cuil_new`,
	  `url_post_old`,
	  `url_post_new`, 
	  `url_reporte_old`, 
	  `url_reporte_new`, 
	  `url_estado_transferencia_old`, 
	  `url_estado_transferencia_new`, 
	  `url_estado_incremental_old`, 
	  `url_estado_incremental_new`, 
	  `url_preconfeccion_old`, 
	  `url_preconfeccion_new`, 
	  `url_cierre_comunidad_old`,
	  `url_cierre_comunidad_new`, 
	  `url_interbanking_old`, 
	  `url_interbanking_new`, 
	  `id_comunidad_old`, 
	  `id_comunidad_new`, 
	  `id_config_certificado_old`, 
	  `id_config_certificado_new`, 
	  `id_pais_old`, 
	  `id_pais_new`, 
	  `certificado_old`, 
	  `certificado_new`, 
	  `clave_privada_old`, 
	  `clave_privada_new`, 
	  `date`, 
	  `usuario` 
	)
	VALUES	(
	'Insert',
	null,
	NEW.Nombre_usuario, 
	null,
	NEW.Clave, 
	null,
	NEW.cuil,
	null,
	NEW.url_post, 
	null,
	NEW.url_reporte, 
	null,
	NEW.url_estado_transferencia, 
	null,
	NEW.url_estado_incremental, 
	null,
	NEW.url_preconfeccion, 
	null,
	NEW.url_cierre_comunidad, 
	null,
	NEW.url_interbanking, 
	null,
	NEW.id_comunidad, 
	null,
	NEW.id_config_certificado, 
	null,
	NEW.id_pais, 
	null,
	NEW.certificado, 
	null,
	NEW.clave_privada, 
	NOW(),
	CURRENT_USER());
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `config_AUPD`;
DELIMITER //
CREATE TRIGGER `config_AUPD` AFTER UPDATE ON `config`
 FOR EACH ROW BEGIN
  INSERT INTO log_config
	(
	  `Accion`, 
	  `Nombre_usuario_old`,
	  `Nombre_usuario_new`, 
	  `Clave_old`,
	  `Clave_new`, 
	  `cuil_old`,
	  `cuil_new`,
	  `url_post_old`,
	  `url_post_new`, 
	  `url_reporte_old`, 
	  `url_reporte_new`, 
	  `url_estado_transferencia_old`, 
	  `url_estado_transferencia_new`, 
	  `url_estado_incremental_old`, 
	  `url_estado_incremental_new`, 
	  `url_preconfeccion_old`, 
	  `url_preconfeccion_new`, 
	  `url_cierre_comunidad_old`,
	  `url_cierre_comunidad_new`, 
	  `url_interbanking_old`, 
	  `url_interbanking_new`, 
	  `id_comunidad_old`, 
	  `id_comunidad_new`, 
	  `id_config_certificado_old`, 
	  `id_config_certificado_new`, 
	  `id_pais_old`, 
	  `id_pais_new`, 
	  `certificado_old`, 
	  `certificado_new`, 
	  `clave_privada_old`, 
	  `clave_privada_new`, 
	  `date`, 
	  `usuario` 
	)
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
	OLD.url_estado_incremental, 
	NEW.url_estado_incremental, 
	OLD.url_preconfeccion, 
	NEW.url_preconfeccion, 
	OLD.url_cierre_comunidad,
	NEW.url_cierre_comunidad, 
	OLD.url_interbanking, 
	NEW.url_interbanking, 
	OLD.id_comunidad, 
	NEW.id_comunidad, 
	OLD.id_config_certificado, 
	NEW.id_config_certificado, 
	OLD.id_pais, 
	NEW.id_pais, 
	OLD.certificado, 
	NEW.certificado, 
	OLD.clave_privada, 
	NEW.clave_privada, 
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
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `remitente` varchar(64) NOT NULL,
  `destinatario` varchar(64) NOT NULL,
  `asunto` varchar(128) NOT NULL,
  `mensaje` text NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
(12, 'DE', 'Desconocido', 'No compensa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_config`
--

CREATE TABLE IF NOT EXISTS `log_config` (
  `id_log_config` int(11) NOT NULL AUTO_INCREMENT,
  `Accion` varchar(16) NOT NULL,
  `Nombre_usuario_old` varchar(12) DEFAULT NULL,
  `Nombre_usuario_new` varchar(12) DEFAULT NULL,
  `Clave_old` varchar(12) DEFAULT NULL,
  `Clave_new` varchar(12) DEFAULT NULL,
  `cuil_old` text,
  `cuil_new` text,
  `url_post_old` varchar(128) DEFAULT NULL,
  `url_post_new` varchar(128) DEFAULT NULL,
  `url_reporte_old` varchar(128) DEFAULT NULL,
  `url_reporte_new` varchar(128) DEFAULT NULL,
  `url_estado_transferencia_old` varchar(128) DEFAULT NULL,
  `url_estado_transferencia_new` varchar(128) DEFAULT NULL,
  `url_estado_incremental_old` varchar(128) DEFAULT NULL,
  `url_estado_incremental_new` varchar(128) DEFAULT NULL,
  `url_preconfeccion_old` varchar(128) DEFAULT NULL,
  `url_preconfeccion_new` varchar(128) DEFAULT NULL,
  `url_cierre_comunidad_old` varchar(128) DEFAULT NULL,
  `url_cierre_comunidad_new` varchar(128) DEFAULT NULL,
  `url_interbanking_old` varchar(128) DEFAULT NULL,
  `url_interbanking_new` varchar(128) DEFAULT NULL,
  `id_comunidad_old` varchar(32) DEFAULT NULL,
  `id_comunidad_new` varchar(32) DEFAULT NULL,
  `id_config_certificado_old` int(11) DEFAULT NULL,
  `id_config_certificado_new` int(11) DEFAULT NULL,
  `id_pais_old` int(11) DEFAULT NULL,
  `id_pais_new` int(11) DEFAULT NULL,
  `certificado_old` varchar(128) DEFAULT NULL,
  `certificado_new` varchar(128) DEFAULT NULL,
  `clave_privada_old` text,
  `clave_privada_new` text,
  `date` datetime NOT NULL,
  `usuario` varchar(64) NOT NULL,
  PRIMARY KEY (`id_log_config`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `log_config`
--

INSERT INTO `log_config` (`id_log_config`, `Accion`, `Nombre_usuario_old`, `Nombre_usuario_new`, `Clave_old`, `Clave_new`, `cuil_old`, `cuil_new`, `url_post_old`, `url_post_new`, `url_reporte_old`, `url_reporte_new`, `url_estado_transferencia_old`, `url_estado_transferencia_new`, `url_estado_incremental_old`, `url_estado_incremental_new`, `url_preconfeccion_old`, `url_preconfeccion_new`, `url_cierre_comunidad_old`, `url_cierre_comunidad_new`, `url_interbanking_old`, `url_interbanking_new`, `id_comunidad_old`, `id_comunidad_new`, `id_config_certificado_old`, `id_config_certificado_new`, `id_pais_old`, `id_pais_new`, `certificado_old`, `certificado_new`, `clave_privada_old`, `clave_privada_new`, `date`, `usuario`) VALUES
(1, 'Update', 'w9bLuLvFgHI=', 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'hpSMh46XiHalk6I=', 'hpSMh46XiHalk6I=', 1, 1, -2, -2, 'Amena', 'Amena', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', '2015-04-21 11:01:11', 'root@localhost'),
(2, 'Update', 'w9bLuLvFgHI=', 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'hpSMh46XiHalk6I=', 'hpSMh46XiHalk6I=', 1, 1, -2, -2, 'Amena', 'Amena', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', '2015-04-21 11:01:36', 'root@localhost'),
(3, 'Update', NULL, 'asdf', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 0, NULL, 0, NULL, '', NULL, '', '2015-04-21 11:07:03', 'root@localhost'),
(4, 'Insert', NULL, 'asdf', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 0, NULL, 0, NULL, '', NULL, '', '2015-04-21 11:07:43', 'root@localhost'),
(5, 'Insert', NULL, 'asdf', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 0, NULL, 0, NULL, '', NULL, '', '2015-04-21 11:07:46', 'root@localhost'),
(6, 'Delete', 'asdf', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 0, NULL, 0, NULL, '', NULL, '', NULL, '2015-04-21 11:08:05', 'root@localhost'),
(7, 'Delete', 'asdf', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 0, NULL, 0, NULL, '', NULL, '', NULL, '2015-04-21 11:08:05', 'root@localhost'),
(8, 'Delete', 'asdf', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, 0, NULL, 0, NULL, '', NULL, '', NULL, '2015-04-21 11:08:06', 'root@localhost'),
(9, 'Update', 'w9bLuLvFgHI=', 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'hpSMh46XiHalk6I=', 'hpSMh46XiHalk6I=', 1, 1, -2, -2, 'Amena', 'Amena', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', '2015-04-21 11:13:12', 'root@localhost'),
(10, 'Update', 'w9bLuLvFgHI=', 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'hpSMh46XiHalk6I=', 'hpSMh46XiHalk6I=', 1, 1, -2, -2, 'Amena', 'Amena', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', '2015-04-23 15:50:54', 'root@localhost'),
(11, 'Update', 'w9bLuLvFgHI=', 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'hpSMh46XiHalk6I=', 'hpSMh46XiHalk6I=', 1, 1, -2, -2, 'Amena', 'Amena', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', '2015-04-23 15:51:05', 'root@localhost'),
(12, 'Update', 'w9bLuLvFgHI=', 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'hpSMh46XiHalk6I=', 'hpSMh46XiHalk6I=', 1, 1, -2, -2, 'Amena', 'Amena', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', '2015-04-23 16:08:32', 'root@localhost'),
(13, 'Update', 'w9bLuLvFgHI=', 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'hpSMh46XiHalk6I=', 'hpSMh46XiHalk6Kx', 1, 1, -2, -2, 'Amena', 'Amena', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', '2015-05-26 11:56:24', 'root@localhost'),
(14, 'Update', 'w9bLuLvFgHI=', 'w9bLuLvFgHI=', 'w9bLuLvFgHM=', 'w9bLuLvFgHM=', 'hJiHiI+ZiHGjmqKBqQ==', 'hJiHiI+ZiHGjmqKBqQ==', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u015Pfv5rfpqu1uJ+Xfah4rro=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPk39u016LVwaPst62Oe3ODr9U=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfpsL26spW2r8u9eK/C', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksn3oprqxtpbDv8e2jbrA2cS8vcW0puWPzb8=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPo4tmu2L7WtpfdrLe6i2OXecq5ia+818a0zce4fuTGzLnW3LfF2Nu1', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPb3+K+3rzksnfjqLq+rnrDrtivt7DB2Le/nNO9tuDKzbHY2Lijzdc=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'u9jKw8yef3Di087D3dVz3tfcpqLHmuXe4qTBk7zDupLH2JPr1dfA27W8wJvjsXawuHC7vdW3h7PC0bs=', 'hpSMh46XiHalk6Kx', 'hpSMh46XiHalk6I=', 1, 1, -2, -2, 'Amena', 'Amena', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', 'gJGDgIamlYi7r4mix7Rlxbuxl3G5fpe+vo+HkoaBenFws63Bs8vCspKxkn+8qpmQsWKWrqqTv5a5zKvIjpSDo+S11cftyIis3N+QoNGTrd3srMfMzMWdqsrIm6rX2sXWm31bieiaiY6Lcs6y3ZGdhMadr4fRuYik5qm6h6e2j7e7nneKp63oycyFqr+jjcfctODS5L3cotm/oKZqybOqoJ95q1hwv8GOpN3Cy8atuLidmbqly9p+ua24dHrVh8S0vnuv36x/pJatt8+jvtx93cbjnYPvp7KyeYXKkJZ5m5SXpaeUm3FaguGoqrGn2ZXX19mvmNKqzOrvj669s3+WlrDPl6ex6I7QndSEasCMs7mdqI3Cs3/Booa3zZqvyMOmpK/jv9jMqoJzwqKIl6/qvPKMqr2Ip4Gw05/bq+PopaCCwJOn3nq3pcCWvq3Tq5S3l83GqcrTkZbLprW838aN2a+2mHraoarY7kNky66gkpvNrM3n0se8vsTZm1/rhamukZvImdyyuMLCqMmcz6y7isuWq5HKuqrgra2EgbZ9quDrpqWppbqjyM6dl4V6y5Hdn+eJX6uxc5e7lMaZmJiOwYqPyq3P3piFtsmdia2jiL7TmoSUtm3j2OyG0rSJzJucqayXveG9oru8sqN4sVBSmbB8xoK/o32MvqmXibHcl3LczLF7pd6tus/BjJOpi7u0xaXI0cmbvcq8sZbJ18m5uZjFuXXRhq/CvnfNepmDkFhd3L6lspy8j6i4mrS367etn8KzdLaByd+qmInNw554zqvH28KxxMDKe6HBpqWrk75/iKS5r6ORe7axwYqil7Klt25zgMyln+Cc4nWo24rHptKuztXIf7LGsZyXrdrCvKuX059k07CPja2cmr/HsouMuJervY3ag3Wmu92F672GucHQsz1vfNqq7p2JuaG3mMa9t7rM6d6WzMfnhX3MdbKlrIuNjtuhg5KmrMu2jrTFr6bb2765tX3ArN+7cq2v26zLbb+ejWFXxc7ArM+jzr/TorXKmqqxwLfAe5aZs7p5m52w0KCt18F035StytXofLfRurun0aLN6+eqoq+bnHiV4M3Q5sXWrXZa6L+H7JWVu3idiY2dwZ52vq6im6Ocn3bUpNLHx56uwLbgrpHXori6vpjRopZhV5GTk5GltcKPiaLDklTKlZGiioWaa7GPo3iAkYOAZm4=', '2015-05-26 11:56:28', 'root@localhost');

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
  `link` varchar(255) NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_transaccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `transacciones`
--

INSERT INTO `transacciones` (`id_transaccion`, `cuit`, `importe`, `periodo`, `fechapago`, `comprob`, `token`, `link`, `date_add`) VALUES
(1, '30123456789', 3650.4, '02/2015', '2015-04-06', '000421', '000421020320150220153.650,4030123456789', '', '2015-06-04 16:47:01'),
(2, '30123456789', 3650.4, '02/2015', '2015-02-03', '000421', '000421020320150220153.650,4030123456789', 'Cuit: 30123456789 Importe: 3.650,40 Periodo: 02/2015 Fecha pago: 02/03/2015 Comprob: 000421', '2015-06-15 11:48:37');

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
(1, 'admin', '63c98b897b8e8d001c9ef82020d4e147', 'diego.nieto@tmsgroup.com.ar', '2015-06-04 16:40:56', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
