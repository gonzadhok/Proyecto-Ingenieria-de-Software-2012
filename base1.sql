-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-11-2012 a las 14:35:58
-- Versión del servidor: 5.5.28
-- Versión de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `base1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ALUMNO`
--

CREATE TABLE IF NOT EXISTS `ALUMNO` (
  `rut` decimal(8,0) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidop` varchar(10) NOT NULL,
  `apellidom` varchar(10) NOT NULL,
  `curso` int(11) NOT NULL,
  `colegio` varchar(30) DEFAULT NULL,
  `comuna` varchar(20) DEFAULT NULL,
  `fono` decimal(10,0) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ALUMNO_CARRERA`
--

CREATE TABLE IF NOT EXISTS `ALUMNO_CARRERA` (
  `rut` decimal(8,0) NOT NULL,
  `codigo` decimal(5,0) NOT NULL,
  KEY `FK_ALUMNO_CARRERA_codigo` (`codigo`),
  KEY `FK_ALUMNO_CARRERA_rut` (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CARRERA`
--

CREATE TABLE IF NOT EXISTS `CARRERA` (
  `codigo` decimal(5,0) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FUNCIONARIO`
--

CREATE TABLE IF NOT EXISTS `FUNCIONARIO` (
  `rut` decimal(8,0) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidop` varchar(10) NOT NULL,
  `apellidom` varchar(10) NOT NULL,
  `fono` decimal(10,0) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `clase` varchar(1) NOT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `JEFE_CARRERA`
--

CREATE TABLE IF NOT EXISTS `JEFE_CARRERA` (
  `rut` decimal(8,0) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidop` varchar(10) NOT NULL,
  `apellidom` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `codigo` decimal(5,0) NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `FK_JEFE_CARRERA_codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ALUMNO_CARRERA`
--
ALTER TABLE `ALUMNO_CARRERA`
  ADD CONSTRAINT `FK_ALUMNO_CARRERA_codigo` FOREIGN KEY (`codigo`) REFERENCES `CARRERA` (`codigo`),
  ADD CONSTRAINT `FK_ALUMNO_CARRERA_rut` FOREIGN KEY (`rut`) REFERENCES `ALUMNO` (`rut`);

--
-- Filtros para la tabla `JEFE_CARRERA`
--
ALTER TABLE `JEFE_CARRERA`
  ADD CONSTRAINT `FK_JEFE_CARRERA_codigo` FOREIGN KEY (`codigo`) REFERENCES `CARRERA` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
