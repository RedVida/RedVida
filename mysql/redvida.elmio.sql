-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2014 a las 02:22:42
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `redvida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergias`
--

CREATE TABLE IF NOT EXISTS `alergias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `alergias`
--

INSERT INTO `alergias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Polen', 'plantas'),
(2, 'Gatos', 'gatos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergia_paciente`
--

CREATE TABLE IF NOT EXISTS `alergia_paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alergia` int(11) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `alergia_paciente`
--

INSERT INTO `alergia_paciente` (`id`, `id_alergia`, `id_paciente`, `fecha`) VALUES
(1, 1, 3, NULL),
(2, 2, 3, '2014-11-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco_sangre`
--

CREATE TABLE IF NOT EXISTS `banco_sangre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(3) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `banco_sangre`
--

INSERT INTO `banco_sangre` (`id`, `tipo`, `cantidad`) VALUES
(1, 'O-', 0),
(2, 'O+', 0),
(3, 'A-', 0),
(4, 'A+', 0),
(5, 'B-', 0),
(6, 'B+', 0),
(7, 'AB-', 0),
(8, 'AB+', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_medico`
--

CREATE TABLE IF NOT EXISTS `centro_medico` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `contacto` int(10) DEFAULT NULL,
  `director` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `especialidad` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `gubernamental` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `centro_medico`
--

INSERT INTO `centro_medico` (`id`, `nombre`, `direccion`, `contacto`, `director`, `especialidad`, `gubernamental`) VALUES
(2, 'Hospital de hospitales', 'su direccion', 65985421, 'El loco de siempre', 'la misma de siempre', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authassignment`
--

CREATE TABLE IF NOT EXISTS `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authassignment`
--

INSERT INTO `cruge_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES
(4, NULL, 'N;', 'invitados'),
(5, NULL, 'N;', 'invitados'),
(7, NULL, 'N;', 'tester'),
(8, NULL, 'N;', 'invitados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitem`
--

CREATE TABLE IF NOT EXISTS `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitem`
--

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_alergias_admin', 0, '', NULL, 'N;'),
('action_alergias_alergialist', 0, '', NULL, 'N;'),
('action_alergias_create', 0, '', NULL, 'N;'),
('action_alergias_delete', 0, '', NULL, 'N;'),
('action_alergias_index', 0, '', NULL, 'N;'),
('action_alergias_update', 0, '', NULL, 'N;'),
('action_alergias_view', 0, '', NULL, 'N;'),
('action_bancosangre_admin', 0, '', NULL, 'N;'),
('action_bancosangre_create', 0, '', NULL, 'N;'),
('action_bancosangre_delete', 0, '', NULL, 'N;'),
('action_bancosangre_index', 0, '', NULL, 'N;'),
('action_bancosangre_update', 0, '', NULL, 'N;'),
('action_bancosangre_view', 0, '', NULL, 'N;'),
('action_centromedico_admin', 0, '', NULL, 'N;'),
('action_centromedico_create', 0, '', NULL, 'N;'),
('action_centromedico_delete', 0, '', NULL, 'N;'),
('action_centromedico_index', 0, '', NULL, 'N;'),
('action_centroMedico_informe', 0, '', NULL, 'N;'),
('action_centromedico_update', 0, '', NULL, 'N;'),
('action_centromedico_view', 0, '', NULL, 'N;'),
('action_donaciones_index', 0, '', NULL, 'N;'),
('action_donacionmedula_admin', 0, '', NULL, 'N;'),
('action_donacionmedula_create', 0, '', NULL, 'N;'),
('action_donacionmedula_delete', 0, '', NULL, 'N;'),
('action_donacionmedula_index', 0, '', NULL, 'N;'),
('action_donacionmedula_update', 0, '', NULL, 'N;'),
('action_donacionmedula_view', 0, '', NULL, 'N;'),
('action_donacionorgano_admin', 0, '', NULL, 'N;'),
('action_donacionOrgano_create', 0, '', NULL, 'N;'),
('action_donacionorgano_delete', 0, '', NULL, 'N;'),
('action_donacionorgano_index', 0, '', NULL, 'N;'),
('action_donacionorgano_update', 0, '', NULL, 'N;'),
('action_donacionorgano_view', 0, '', NULL, 'N;'),
('action_donacionsangre_admin', 0, '', NULL, 'N;'),
('action_donacionsangre_create', 0, '', NULL, 'N;'),
('action_donacionsangre_delete', 0, '', NULL, 'N;'),
('action_donacionsangre_index', 0, '', NULL, 'N;'),
('action_donacionsangre_mostrar', 0, '', NULL, 'N;'),
('action_donacionsangre_update', 0, '', NULL, 'N;'),
('action_donacionsangre_view', 0, '', NULL, 'N;'),
('action_donantes_admin', 0, '', NULL, 'N;'),
('action_donantes_create', 0, '', NULL, 'N;'),
('action_donantes_delete', 0, '', NULL, 'N;'),
('action_donantes_donar', 0, '', NULL, 'N;'),
('action_donantes_index', 0, '', NULL, 'N;'),
('action_donantes_informe', 0, '', NULL, 'N;'),
('action_donantes_registraenfermedad', 0, '', NULL, 'N;'),
('action_donantes_registrarenfermedad', 0, '', NULL, 'N;'),
('action_donantes_registrar_alergia', 0, '', NULL, 'N;'),
('action_donantes_registra_alergia', 0, '', NULL, 'N;'),
('action_donantes_update', 0, '', NULL, 'N;'),
('action_donantes_view', 0, '', NULL, 'N;'),
('action_donante_admin', 0, '', NULL, 'N;'),
('action_donante_create', 0, '', NULL, 'N;'),
('action_donante_delete', 0, '', NULL, 'N;'),
('action_donante_index', 0, '', NULL, 'N;'),
('action_donante_update', 0, '', NULL, 'N;'),
('action_donante_view', 0, '', NULL, 'N;'),
('action_enfermedades_admin', 0, '', NULL, 'N;'),
('action_enfermedades_create', 0, '', NULL, 'N;'),
('action_enfermedades_delete', 0, '', NULL, 'N;'),
('action_enfermedades_EnfermedadList', 0, '', NULL, 'N;'),
('action_enfermedades_index', 0, '', NULL, 'N;'),
('action_enfermedades_informe', 0, '', NULL, 'N;'),
('action_enfermedades_update', 0, '', NULL, 'N;'),
('action_enfermedades_view', 0, '', NULL, 'N;'),
('action_organo_admin', 0, '', NULL, 'N;'),
('action_organo_create', 0, '', NULL, 'N;'),
('action_organo_delete', 0, '', NULL, 'N;'),
('action_organo_index', 0, '', NULL, 'N;'),
('action_organo_update', 0, '', NULL, 'N;'),
('action_organo_view', 0, '', NULL, 'N;'),
('action_paciente_admin', 0, '', NULL, 'N;'),
('action_paciente_asignar', 0, '', NULL, 'N;'),
('action_paciente_create', 0, '', NULL, 'N;'),
('action_paciente_delete', 0, '', NULL, 'N;'),
('action_paciente_index', 0, '', NULL, 'N;'),
('action_paciente_informe', 0, '', NULL, 'N;'),
('action_paciente_registraralergia', 0, '', NULL, 'N;'),
('action_paciente_registrarenfermedad', 0, '', NULL, 'N;'),
('action_paciente_update', 0, '', NULL, 'N;'),
('action_paciente_urgenciasnacionales', 0, '', NULL, 'N;'),
('action_paciente_view', 0, '', NULL, 'N;'),
('action_site_contact', 0, '', NULL, 'N;'),
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_trasplantes_admin', 0, '', NULL, 'N;'),
('action_trasplantes_create', 0, '', NULL, 'N;'),
('action_trasplantes_delete', 0, '', NULL, 'N;'),
('action_trasplantes_index', 0, '', NULL, 'N;'),
('action_trasplantes_update', 0, '', NULL, 'N;'),
('action_trasplantes_view', 0, '', NULL, 'N;'),
('action_trasplante_admin', 0, '', NULL, 'N;'),
('action_trasplante_create', 0, '', NULL, 'N;'),
('action_trasplante_delete', 0, '', NULL, 'N;'),
('action_trasplante_index', 0, '', NULL, 'N;'),
('action_trasplante_update', 0, '', NULL, 'N;'),
('action_trasplante_view', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadmincreate', 0, '', NULL, 'N;'),
('action_ui_fieldsadmindelete', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_fieldsadminupdate', 0, '', NULL, 'N;'),
('action_ui_rbacajaxassignment', 0, '', NULL, 'N;'),
('action_ui_rbacajaxgetassignmentbizrule', 0, '', NULL, 'N;'),
('action_ui_rbacajaxsetchilditem', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemchilditems', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemcreate', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemupdate', 0, '', NULL, 'N;'),
('action_ui_rbaclistops', 0, '', NULL, 'N;'),
('action_ui_rbaclistroles', 0, '', NULL, 'N;'),
('action_ui_rbaclisttasks', 0, '', NULL, 'N;'),
('action_ui_rbacusersassignments', 0, '', NULL, 'N;'),
('action_ui_sessionadmin', 0, '', NULL, 'N;'),
('action_ui_systemupdate', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_ui_usermanagementdelete', 0, '', NULL, 'N;'),
('action_ui_usermanagementupdate', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('controller_alergias', 0, '', NULL, 'N;'),
('controller_bancosangre', 0, '', NULL, 'N;'),
('controller_centromedico', 0, '', NULL, 'N;'),
('controller_donacionmedula', 0, '', NULL, 'N;'),
('controller_donacionorgano', 0, '', NULL, 'N;'),
('controller_donacionsangre', 0, '', NULL, 'N;'),
('controller_donante', 0, '', NULL, 'N;'),
('controller_donantes', 0, '', NULL, 'N;'),
('controller_enfermedades', 0, '', NULL, 'N;'),
('controller_organo', 0, '', NULL, 'N;'),
('controller_paciente', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('controller_trasplante', 0, '', NULL, 'N;'),
('controller_trasplantes', 0, '', NULL, 'N;'),
('edit-advanced-profile-features', 0, 'C:\\wamp\\www\\imagecloud\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', NULL, 'N;'),
('invitado', 0, '', NULL, 'N;'),
('invitados', 2, 'son los invitados', '', 'N;'),
('tester', 2, 'es un tester', '', 'N;'),
('xxx', 0, '', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitemchild`
--

INSERT INTO `cruge_authitemchild` (`parent`, `child`) VALUES
('tester', 'action_alergias_admin'),
('tester', 'action_alergias_alergialist'),
('tester', 'action_alergias_create'),
('tester', 'action_alergias_delete'),
('tester', 'action_alergias_index'),
('tester', 'action_alergias_update'),
('tester', 'action_alergias_view'),
('tester', 'action_bancosangre_admin'),
('tester', 'action_bancosangre_create'),
('tester', 'action_bancosangre_delete'),
('tester', 'action_bancosangre_index'),
('tester', 'action_bancosangre_update'),
('tester', 'action_bancosangre_view'),
('tester', 'action_centromedico_admin'),
('tester', 'action_centromedico_create'),
('tester', 'action_centromedico_delete'),
('invitados', 'action_centromedico_index'),
('tester', 'action_centromedico_index'),
('tester', 'action_centromedico_update'),
('invitados', 'action_centromedico_view'),
('tester', 'action_centromedico_view'),
('tester', 'action_donaciones_index'),
('tester', 'action_donacionmedula_admin'),
('tester', 'action_donacionmedula_create'),
('tester', 'action_donacionmedula_delete'),
('tester', 'action_donacionmedula_index'),
('tester', 'action_donacionmedula_update'),
('tester', 'action_donacionmedula_view'),
('tester', 'action_donacionorgano_admin'),
('tester', 'action_donacionOrgano_create'),
('tester', 'action_donacionorgano_delete'),
('tester', 'action_donacionorgano_index'),
('tester', 'action_donacionorgano_update'),
('tester', 'action_donacionorgano_view'),
('tester', 'action_donacionsangre_admin'),
('tester', 'action_donacionsangre_create'),
('tester', 'action_donacionsangre_delete'),
('tester', 'action_donacionsangre_index'),
('tester', 'action_donacionsangre_mostrar'),
('tester', 'action_donacionsangre_update'),
('tester', 'action_donacionsangre_view'),
('tester', 'action_donantes_admin'),
('tester', 'action_donantes_create'),
('tester', 'action_donantes_delete'),
('tester', 'action_donantes_donar'),
('invitados', 'action_donantes_index'),
('tester', 'action_donantes_index'),
('tester', 'action_donantes_registraenfermedad'),
('tester', 'action_donantes_registrarenfermedad'),
('tester', 'action_donantes_registrar_alergia'),
('tester', 'action_donantes_registra_alergia'),
('tester', 'action_donantes_update'),
('invitados', 'action_donantes_view'),
('tester', 'action_donantes_view'),
('tester', 'action_donante_admin'),
('tester', 'action_donante_create'),
('tester', 'action_donante_delete'),
('tester', 'action_donante_index'),
('tester', 'action_donante_update'),
('tester', 'action_donante_view'),
('tester', 'action_enfermedades_admin'),
('tester', 'action_enfermedades_create'),
('tester', 'action_enfermedades_delete'),
('tester', 'action_enfermedades_EnfermedadList'),
('tester', 'action_enfermedades_index'),
('tester', 'action_enfermedades_update'),
('tester', 'action_enfermedades_view'),
('tester', 'action_organo_admin'),
('tester', 'action_organo_create'),
('tester', 'action_organo_delete'),
('tester', 'action_organo_index'),
('tester', 'action_organo_update'),
('tester', 'action_organo_view'),
('tester', 'action_paciente_admin'),
('tester', 'action_paciente_asignar'),
('tester', 'action_paciente_create'),
('tester', 'action_paciente_delete'),
('invitados', 'action_paciente_index'),
('tester', 'action_paciente_index'),
('tester', 'action_paciente_registrarenfermedad'),
('tester', 'action_paciente_update'),
('invitados', 'action_paciente_urgenciasnacionales'),
('tester', 'action_paciente_urgenciasnacionales'),
('invitados', 'action_paciente_view'),
('tester', 'action_paciente_view'),
('tester', 'action_site_contact'),
('tester', 'action_site_error'),
('tester', 'action_site_index'),
('tester', 'action_site_login'),
('tester', 'action_site_logout'),
('tester', 'action_trasplantes_admin'),
('tester', 'action_trasplantes_create'),
('tester', 'action_trasplantes_delete'),
('tester', 'action_trasplantes_index'),
('tester', 'action_trasplantes_update'),
('tester', 'action_trasplantes_view'),
('tester', 'action_trasplante_admin'),
('tester', 'action_trasplante_create'),
('tester', 'action_trasplante_delete'),
('tester', 'action_trasplante_index'),
('tester', 'action_trasplante_update'),
('tester', 'action_trasplante_view'),
('tester', 'admin'),
('tester', 'controller_alergias'),
('tester', 'controller_bancosangre'),
('tester', 'controller_centromedico'),
('tester', 'controller_donacionmedula'),
('tester', 'controller_donacionorgano'),
('tester', 'controller_donacionsangre'),
('tester', 'controller_donante'),
('tester', 'controller_donantes'),
('tester', 'controller_enfermedades'),
('tester', 'controller_organo'),
('tester', 'controller_paciente'),
('tester', 'controller_site'),
('tester', 'controller_trasplante'),
('tester', 'controller_trasplantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_field`
--

CREATE TABLE IF NOT EXISTS `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_fieldvalue`
--

CREATE TABLE IF NOT EXISTS `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_session`
--

CREATE TABLE IF NOT EXISTS `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Volcado de datos para la tabla `cruge_session`
--

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(1, 1, 1406422085, 1406423885, 0, '::1', 1, 1406422085, 1406422121, '::1'),
(2, 1, 1406422205, 1406424005, 0, '::1', 1, 1406422205, 1406422301, '::1'),
(3, 1, 1406422319, 1406424119, 0, '::1', 1, 1406422319, 1406422809, '::1'),
(4, 2, 1406422818, 1406424618, 1, '::1', 2, 1406422833, NULL, NULL),
(5, 1, 1406422841, 1406424641, 0, '::1', 1, 1406422841, 1406422924, '::1'),
(6, 1, 1406440187, 1406441987, 0, '::1', 1, 1406440187, 1406440501, '::1'),
(7, 1, 1411503547, 1411505347, 0, '127.0.0.1', 1, 1411503547, 1411503562, '127.0.0.1'),
(8, 1, 1411503625, 1411505425, 0, '127.0.0.1', 1, 1411503625, NULL, NULL),
(9, 1, 1411505795, 1411507595, 0, '127.0.0.1', 1, 1411505795, 1411506548, '127.0.0.1'),
(10, 1, 1411590894, 1411592694, 0, '127.0.0.1', 1, 1411590894, 1411591527, '127.0.0.1'),
(11, 2, 1411591949, 1411593749, 1, '127.0.0.1', 1, 1411591949, NULL, NULL),
(12, 1, 1411591960, 1411593760, 0, '127.0.0.1', 1, 1411591960, NULL, NULL),
(13, 1, 1411593773, 1411595573, 0, '127.0.0.1', 1, 1411593773, 1411593841, '127.0.0.1'),
(14, 1, 1411595009, 1411596809, 0, '127.0.0.1', 1, 1411595009, 1411595272, '127.0.0.1'),
(15, 4, 1411595279, 1411597079, 0, '127.0.0.1', 1, 1411595279, 1411595287, '127.0.0.1'),
(16, 4, 1411595306, 1411597106, 0, '127.0.0.1', 1, 1411595306, 1411595346, '127.0.0.1'),
(17, 1, 1411598962, 1411600762, 0, '127.0.0.1', 1, 1411598962, 1411599350, '127.0.0.1'),
(18, 1, 1412031150, 1412032950, 0, '127.0.0.1', 1, 1412031150, 1412031157, '127.0.0.1'),
(19, 1, 1412899322, 1412901122, 0, '::1', 1, 1412899322, NULL, NULL),
(20, 1, 1412901175, 1412902975, 0, '::1', 1, 1412901175, NULL, NULL),
(21, 1, 1412903015, 1412904815, 0, '::1', 1, 1412903015, 1412903309, '::1'),
(22, 1, 1412903319, 1412905119, 1, '::1', 1, 1412903319, NULL, NULL),
(23, 1, 1413508231, 1413510031, 0, '::1', 1, 1413508231, NULL, NULL),
(24, 1, 1413512456, 1413514256, 0, '::1', 1, 1413512456, NULL, NULL),
(25, 1, 1413514304, 1413516104, 0, '::1', 1, 1413514304, 1413515702, '::1'),
(26, 1, 1413515707, 1413517507, 1, '::1', 1, 1413515707, NULL, NULL),
(27, 1, 1413939380, 1413941180, 1, '::1', 1, 1413939380, NULL, NULL),
(28, 1, 1415881447, 1415883247, 0, '127.0.0.1', 1, 1415881447, NULL, NULL),
(29, 1, 1415884064, 1415885864, 0, '127.0.0.1', 1, 1415884064, NULL, NULL),
(30, 1, 1415885875, 1415887675, 0, '127.0.0.1', 1, 1415885875, 1415887187, '127.0.0.1'),
(31, 1, 1415891018, 1415892818, 0, '127.0.0.1', 1, 1415891018, 1415892035, '127.0.0.1'),
(32, 1, 1415892088, 1415893888, 0, '127.0.0.1', 1, 1415892088, 1415892115, '127.0.0.1'),
(33, 1, 1415919698, 1415921498, 0, '127.0.0.1', 1, 1415919698, NULL, NULL),
(34, 1, 1415921530, 1415923330, 0, '127.0.0.1', 1, 1415921530, NULL, NULL),
(35, 1, 1415923585, 1415925385, 0, '127.0.0.1', 1, 1415923585, NULL, NULL),
(36, 1, 1415926346, 1415928146, 1, '127.0.0.1', 1, 1415926346, NULL, NULL),
(37, 1, 1416330364, 1416332164, 0, '127.0.0.1', 1, 1416330364, NULL, NULL),
(38, 1, 1416332207, 1416334007, 1, '127.0.0.1', 1, 1416332207, NULL, NULL),
(39, 1, 1416411271, 1416413071, 0, '127.0.0.1', 1, 1416411271, 1416411297, '127.0.0.1'),
(40, 5, 1416411918, 1416413718, 0, '127.0.0.1', 1, 1416411918, 1416411920, '127.0.0.1'),
(41, 1, 1416411926, 1416413726, 0, '127.0.0.1', 1, 1416411926, 1416411997, '127.0.0.1'),
(42, 6, 1416412038, 1416415638, 0, '127.0.0.1', 1, 1416412038, 1416412061, '127.0.0.1'),
(43, 1, 1416412073, 1416415673, 0, '127.0.0.1', 1, 1416412073, 1416412136, '127.0.0.1'),
(44, 5, 1416412532, 1416416132, 0, '127.0.0.1', 1, 1416412532, 1416412539, '127.0.0.1'),
(45, 1, 1416412544, 1416416144, 0, '127.0.0.1', 1, 1416412544, 1416412549, '127.0.0.1'),
(46, 5, 1416412718, 1416416318, 0, '127.0.0.1', 1, 1416412718, 1416412722, '127.0.0.1'),
(47, 5, 1416412830, 1416416430, 0, '127.0.0.1', 1, 1416412830, 1416412846, '127.0.0.1'),
(48, 1, 1416412860, 1416416460, 0, '127.0.0.1', 1, 1416412860, 1416412862, '127.0.0.1'),
(49, 5, 1416412867, 1416416467, 0, '127.0.0.1', 1, 1416412867, 1416412869, '127.0.0.1'),
(50, 5, 1416412946, 1416416546, 0, '127.0.0.1', 1, 1416412946, 1416412964, '127.0.0.1'),
(51, 1, 1416412969, 1416416569, 0, '127.0.0.1', 1, 1416412969, 1416412979, '127.0.0.1'),
(52, 5, 1416412984, 1416416584, 0, '127.0.0.1', 1, 1416412984, 1416413002, '127.0.0.1'),
(53, 1, 1416413008, 1416416608, 0, '127.0.0.1', 1, 1416413008, 1416413013, '127.0.0.1'),
(54, 5, 1416413018, 1416416618, 0, '127.0.0.1', 1, 1416413018, 1416413028, '127.0.0.1'),
(55, 5, 1416413079, 1416416679, 0, '127.0.0.1', 1, 1416413079, 1416413122, '127.0.0.1'),
(56, 1, 1416413133, 1416416733, 0, '127.0.0.1', 1, 1416413133, 1416413180, '127.0.0.1'),
(57, 1, 1416413200, 1416416800, 0, '127.0.0.1', 1, 1416413200, 1416413215, '127.0.0.1'),
(58, 1, 1416413309, 1416416909, 0, '127.0.0.1', 1, 1416413309, 1416413444, '127.0.0.1'),
(59, 5, 1416413449, 1416417049, 0, '127.0.0.1', 1, 1416413449, 1416413673, '127.0.0.1'),
(60, 1, 1416413678, 1416417278, 0, '127.0.0.1', 1, 1416413678, 1416413737, '127.0.0.1'),
(61, 7, 1416413774, 1416417374, 0, '127.0.0.1', 1, 1416413774, 1416413781, '127.0.0.1'),
(62, 5, 1416413787, 1416417387, 0, '127.0.0.1', 1, 1416413787, 1416413796, '127.0.0.1'),
(63, 1, 1416413804, 1416417404, 0, '127.0.0.1', 1, 1416413804, 1416413829, '127.0.0.1'),
(64, 1, 1416413906, 1416417506, 0, '127.0.0.1', 1, 1416413906, NULL, NULL),
(65, 1, 1416417558, 1416421158, 0, '127.0.0.1', 1, 1416417558, 1416417613, '127.0.0.1'),
(66, 1, 1416417687, 1416421287, 0, '127.0.0.1', 1, 1416417687, 1416417697, '127.0.0.1'),
(67, 5, 1416417706, 1416421306, 0, '127.0.0.1', 1, 1416417706, 1416417713, '127.0.0.1'),
(68, 5, 1416417722, 1416421322, 0, '127.0.0.1', 1, 1416417722, 1416417728, '127.0.0.1'),
(69, 1, 1416417732, 1416421332, 0, '127.0.0.1', 1, 1416417732, 1416417958, '127.0.0.1'),
(70, 5, 1416417963, 1416421563, 0, '127.0.0.1', 1, 1416417963, 1416418128, '127.0.0.1'),
(71, 5, 1416418135, 1416421735, 0, '127.0.0.1', 1, 1416418135, 1416418220, '127.0.0.1'),
(72, 1, 1416418225, 1416421825, 0, '127.0.0.1', 1, 1416418225, 1416418361, '127.0.0.1'),
(73, 4, 1416418369, 1416421969, 0, '127.0.0.1', 1, 1416418369, 1416418378, '127.0.0.1'),
(74, 5, 1416418383, 1416421983, 0, '127.0.0.1', 1, 1416418383, 1416418565, '127.0.0.1'),
(75, 1, 1416418572, 1416422172, 0, '127.0.0.1', 1, 1416418572, 1416418610, '127.0.0.1'),
(76, 5, 1416418616, 1416422216, 0, '127.0.0.1', 1, 1416418616, 1416418631, '127.0.0.1'),
(77, 1, 1416418638, 1416422238, 0, '127.0.0.1', 1, 1416418638, 1416418662, '127.0.0.1'),
(78, 5, 1416418669, 1416422269, 0, '127.0.0.1', 1, 1416418669, 1416418900, '127.0.0.1'),
(79, 7, 1416418912, 1416422512, 0, '127.0.0.1', 1, 1416418912, 1416418930, '127.0.0.1'),
(80, 5, 1416418938, 1416422538, 0, '127.0.0.1', 1, 1416418938, 1416419040, '127.0.0.1'),
(81, 7, 1416419046, 1416422646, 0, '127.0.0.1', 1, 1416419046, 1416419050, '127.0.0.1'),
(82, 8, 1416419095, 1416422695, 0, '127.0.0.1', 1, 1416419095, 1416419101, '127.0.0.1'),
(83, 1, 1417103640, 1417107240, 0, '127.0.0.1', 1, 1417103640, 1417105646, '127.0.0.1'),
(84, 1, 1417220823, 1417224423, 0, '127.0.0.1', 1, 1417220823, 1417220838, '127.0.0.1'),
(85, 1, 1417284588, 1417288188, 0, '127.0.0.1', 1, 1417284588, NULL, NULL),
(86, 1, 1417288642, 1417292242, 0, '127.0.0.1', 1, 1417288642, NULL, NULL),
(87, 1, 1417292504, 1417296104, 0, '127.0.0.1', 1, 1417292504, 1417295245, '127.0.0.1'),
(88, 1, 1417304445, 1417308045, 0, '127.0.0.1', 1, 1417304445, 1417304448, '127.0.0.1'),
(89, 1, 1417304861, 1417308461, 0, '127.0.0.1', 1, 1417304861, NULL, NULL),
(90, 1, 1417308485, 1417312085, 1, '127.0.0.1', 1, 1417308485, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_system`
--

CREATE TABLE IF NOT EXISTS `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cruge_system`
--

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 60, 10, 1, -1, -1, 0, 0, 0, 0, '', 0, 'invitados', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_user`
--

CREATE TABLE IF NOT EXISTS `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1417308485, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(4, 1411595192, NULL, 1416418369, 'invitado', 'invitado@invitado.cl', 'invitado', 'a2302625999b85435b84ef447e4a05b7', 1, 0, 0),
(5, 1416411906, NULL, 1416418938, 'normal', 'normal@normal.cl', 'normal', 'ecf7f66852e0e990d958f27116de1ca9', 1, 0, 0),
(7, 1416413154, NULL, 1416419046, 'anormal', 'anormal@anormal.cl', 'anormal', '4a672e32fa997b6fffab9968f524e69c', 1, 0, 0),
(8, 1416419075, NULL, 1416419095, 'penesio', 'pene@penelandia.cl', 'penesio', '495288a1279552cecb1a210733bcbdca', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE IF NOT EXISTS `donacion` (
  `id_donacion` int(11) NOT NULL AUTO_INCREMENT,
  `rut_donante` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `centro_recepcion` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `detalle` text COLLATE utf8_bin,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id_donacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion_medula`
--

CREATE TABLE IF NOT EXISTS `donacion_medula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut_donante` varchar(12) DEFAULT NULL,
  `tipo_medula` varchar(128) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion_organo`
--

CREATE TABLE IF NOT EXISTS `donacion_organo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut_donante` varchar(12) DEFAULT NULL,
  `nombre` varchar(128) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion_sangre`
--

CREATE TABLE IF NOT EXISTS `donacion_sangre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut_donante` varchar(12) DEFAULT NULL,
  `tipo_sangre` varchar(3) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Disparadores `donacion_sangre`
--
DROP TRIGGER IF EXISTS `sumar_sangre`;
DELIMITER //
CREATE TRIGGER `sumar_sangre` AFTER INSERT ON `donacion_sangre`
 FOR EACH ROW BEGIN

   UPDATE banco_sangre SET
    cantidad = cantidad + NEW.cantidad
    WHERE tipo = NEW.tipo_sangre;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donantes`
--

CREATE TABLE IF NOT EXISTS `donantes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `apellidos` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `rut` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `tipo_sangre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `direccion` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `num_contacto` int(11) DEFAULT NULL,
  `id_centro_medico` int(11) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_centro_medico_1` (`id_centro_medico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `donantes`
--

INSERT INTO `donantes` (`id`, `nombres`, `apellidos`, `rut`, `tipo_sangre`, `email`, `direccion`, `num_contacto`, `id_centro_medico`, `fecha_ingreso`) VALUES
(2, 'Pantruca', 'Morandes', '9.774.886-1', 'O+', 'asd@asd.cl', 'su casa', 98765432, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE IF NOT EXISTS `enfermedades` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `enfermedades`
--

INSERT INTO `enfermedades` (`id`, `nombre`, `descripcion`) VALUES
(2, 'Ebola', NULL),
(3, 'Hepatitis', NULL),
(4, 'Poco vivo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedad_paciente`
--

CREATE TABLE IF NOT EXISTS `enfermedad_paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `id_enfermedad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_enfermedad` (`id_enfermedad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `enfermedad_paciente`
--

INSERT INTO `enfermedad_paciente` (`id`, `fecha`, `id_paciente`, `id_enfermedad`) VALUES
(9, '2014-11-27', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organo`
--

CREATE TABLE IF NOT EXISTS `organo` (
  `idOrgano` int(11) NOT NULL AUTO_INCREMENT,
  `nombreOrgano` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idOrgano`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `organo`
--

INSERT INTO `organo` (`idOrgano`, `nombreOrgano`) VALUES
(1, 'Corazon'),
(2, 'Pulmon'),
(3, 'Higado'),
(4, 'Riñon'),
(5, 'Pancreas'),
(6, 'Corneas'),
(7, 'Valvulas Cardiacas'),
(8, 'Hueso'),
(9, 'Piel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `afiliacion` varchar(20) DEFAULT NULL,
  `grado_urgencia` varchar(20) DEFAULT NULL,
  `necesidad_transplante` varchar(20) DEFAULT NULL,
  `tipo_sangre` varchar(10) DEFAULT NULL,
  `id_centro_medico` int(11) DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_centro_medico` (`id_centro_medico`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombre`, `apellido`, `rut`, `afiliacion`, `grado_urgencia`, `necesidad_transplante`, `tipo_sangre`, `id_centro_medico`, `fecha_ingreso`, `fecha_nacimiento`) VALUES
(3, 'Evaristo', 'Moya', '11.111.111-2', 'Isapre', 'Urgente', '8', 'AB-', 2, '0000-00-00', '0000-00-00'),
(7, 'Maria', 'Concha', '15.450.247-5', 'Isapre', 'Urgente', '5', 'AB-', 2, '2014-11-29', '0000-00-00'),
(8, 'Penesio', 'Largo', '14.299.696-0', 'Fonasa', 'Urgente', '3', 'AB-', 2, '2014-11-29', '1987-05-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_alergia`
--

CREATE TABLE IF NOT EXISTS `tiene_alergia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `id_donante` int(11) DEFAULT NULL,
  `id_alergia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reference_1` (`id_donante`),
  KEY `fk_reference_2` (`id_alergia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tiene_alergia`
--

INSERT INTO `tiene_alergia` (`id`, `fecha`, `id_donante`, `id_alergia`) VALUES
(1, '2014-11-29 16:44:59', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_enfermedad`
--

CREATE TABLE IF NOT EXISTS `tiene_enfermedad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `id_donante` int(11) DEFAULT NULL,
  `id_enfermedad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reference_1` (`id_donante`),
  KEY `fk_reference_2` (`id_enfermedad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tiene_enfermedad`
--

INSERT INTO `tiene_enfermedad` (`id`, `fecha`, `id_donante`, `id_enfermedad`) VALUES
(1, '2014-11-29 16:45:17', 2, 4),
(2, '2014-11-29 16:45:27', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trasplante`
--

CREATE TABLE IF NOT EXISTS `trasplante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_donante` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `id_paciente` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `tipo_donacion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_donacion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `compatibilidad` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `detalle` text COLLATE utf8_bin,
  `grado_urgencia` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `centro_medico` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reference_1` (`id_donante`),
  KEY `fk_reference_2` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cruge_authassignment`
--
ALTER TABLE `cruge_authassignment`
  ADD CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authitemchild`
--
ALTER TABLE `cruge_authitemchild`
  ADD CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cruge_fieldvalue`
--
ALTER TABLE `cruge_fieldvalue`
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `donantes`
--
ALTER TABLE `donantes`
  ADD CONSTRAINT `fk_centro_medico_1` FOREIGN KEY (`id_centro_medico`) REFERENCES `centro_medico` (`id`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`id_centro_medico`) REFERENCES `centro_medico` (`id`);

--
-- Filtros para la tabla `tiene_alergia`
--
ALTER TABLE `tiene_alergia`
  ADD CONSTRAINT `fk_reference_3` FOREIGN KEY (`id_donante`) REFERENCES `donantes` (`id`),
  ADD CONSTRAINT `fk_reference_4` FOREIGN KEY (`id_alergia`) REFERENCES `alergias` (`id`);

--
-- Filtros para la tabla `tiene_enfermedad`
--
ALTER TABLE `tiene_enfermedad`
  ADD CONSTRAINT `fk_reference_1` FOREIGN KEY (`id_donante`) REFERENCES `donantes` (`id`),
  ADD CONSTRAINT `fk_reference_2` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedades` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
