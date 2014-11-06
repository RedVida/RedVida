-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2014 a las 03:41:12
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

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
  `nombres` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

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
(4, NULL, 'N;', 'invitados');

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
('action_donaciones_index', 0, '', NULL, 'N;'),
('action_donantes_admin', 0, '', NULL, 'N;'),
('action_donantes_create', 0, '', NULL, 'N;'),
('action_donantes_delete', 0, '', NULL, 'N;'),
('action_donantes_index', 0, '', NULL, 'N;'),
('action_donantes_view', 0, '', NULL, 'N;'),
('action_donante_admin', 0, '', NULL, 'N;'),
('action_donante_create', 0, '', NULL, 'N;'),
('action_donante_delete', 0, '', NULL, 'N;'),
('action_donante_index', 0, '', NULL, 'N;'),
('action_donante_update', 0, '', NULL, 'N;'),
('action_donante_view', 0, '', NULL, 'N;'),
('action_paciente_admin', 0, '', NULL, 'N;'),
('action_paciente_create', 0, '', NULL, 'N;'),
('action_paciente_delete', 0, '', NULL, 'N;'),
('action_paciente_index', 0, '', NULL, 'N;'),
('action_paciente_update', 0, '', NULL, 'N;'),
('action_paciente_view', 0, '', NULL, 'N;'),
('action_site_contact', 0, '', NULL, 'N;'),
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadmincreate', 0, '', NULL, 'N;'),
('action_ui_fieldsadmindelete', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_fieldsadminupdate', 0, '', NULL, 'N;'),
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
('controller_donante', 0, '', NULL, 'N;'),
('controller_paciente', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('edit-advanced-profile-features', 0, 'C:\\wamp\\www\\imagecloud\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', NULL, 'N;'),
('invitados', 2, 'son los invitados', '', 'N;');

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
('invitados', 'action_donante_index'),
('invitados', 'action_donante_view'),
('invitados', 'action_paciente_index'),
('invitados', 'action_paciente_view');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

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
(27, 1, 1413939380, 1413941180, 1, '::1', 1, 1413939380, NULL, NULL);

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
(1, 'default', NULL, 30, 10, 1, -1, -1, 0, 0, 0, 0, '', 0, '', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1413939380, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(4, 1411595192, NULL, 1411595306, 'invitado', 'invitado@invitado.cl', 'invitado', 'a2302625999b85435b84ef447e4a05b7', 1, 0, 0);

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
  PRIMARY KEY (`id`),
  KEY `fk_centro_medico_1` (`id_centro_medico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE IF NOT EXISTS `enfermedades` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

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
-- Restricciones para tablas volcadas
--




CREATE TABLE IF NOT EXISTS `trasplante` 
(
   id_transplante       int not null auto_increment,
   rut_paciente         varchar(12),
   urgencia_medica      varchar(20),
   enfermedad           varchar(20),
   detalle              text,
   created              datetime,
   modified             datetime,
   primary key (id_transplante)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `donacion` 
(
   id_donacion          int not null auto_increment,
   rut_donante          varchar(12),
   tipo                 varchar(20),
   centro_recepcion     varchar(20),
   detalle              text,
   created              datetime,
   modified             datetime,
   primary key (id_donacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;











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
-- Filtros para la tabla `tiene_enfermedad`
--
ALTER TABLE `tiene_enfermedad`
  ADD CONSTRAINT `fk_reference_1` FOREIGN KEY (`id_donante`) REFERENCES `donantes` (`id`),
  ADD CONSTRAINT `fk_reference_2` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedades` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;