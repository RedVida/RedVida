-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2014 a las 02:57:07
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
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePaciente` varchar(20) NOT NULL,
  `apellidoPaciente` varchar(20) NOT NULL,
  `rutPaciente` varchar(12) NOT NULL,
  `afiliacionPaciente` varchar(20) DEFAULT NULL,
  `enfermedadPaciente` varchar(255) DEFAULT NULL,
  `gradoUrgenciaPaciente` varchar(20) DEFAULT NULL,
  `necesidadTrasplantePaciente` varchar(20) DEFAULT NULL,
  `centroMedicoPaciente` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombrePaciente`, `apellidoPaciente`, `rutPaciente`, `afiliacionPaciente`, `enfermedadPaciente`, `gradoUrgenciaPaciente`, `necesidadTrasplantePaciente`, `centroMedicoPaciente`) VALUES
(1, 'Jorge', 'Nitales', '11.111.111-1', 'Fonasa', 'no cacho', 'Urgente', 'Un pene', 'Penelandia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
