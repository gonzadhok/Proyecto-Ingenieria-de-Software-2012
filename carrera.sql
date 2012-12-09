-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-12-2012 a las 16:15:01
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

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
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `codigo` decimal(5,0) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`codigo`, `nombre`) VALUES
('21002', 'Bibliotecología y Documentación'),
('21004', 'Cartografía'),
('21012', 'Contador Publico y Auditor'),
('21015', 'Ingeniería en Administración Agroindustrial'),
('21023', 'Diseño Industrial'),
('21024', 'Diseño en Comunicación Visual'),
('21025', 'Ingeniería en Transporte y Transito'),
('21030', 'Ingeniería en Informática'),
('21031', 'Ingeniería en Geomensura'),
('21032', 'Ingeniería en Construcción'),
('21037', 'Ingeniería en Mecánica'),
('21038', 'Ingeniería en Industria de la Madera'),
('21039', 'Ingeniería en Industria Alimentaria'),
('21041', 'Ingeniería Civil en Computación Mención Informática '),
('21042', 'Ingeniería en Prevención de Riesgos y Medio Ambiente'),
('21043', 'Trabajo Social'),
('21045', 'Ingeniería Industrial'),
('21046', 'Bachillerato en Ciencias de la Ingeniería'),
('21047', 'Arquitectura'),
('21048', 'Ingeniería Comercial'),
('21071', 'Dibujante Proyectista'),
('21073', 'Ingeniería en Biotecnología'),
('21074', 'Ingeniería en Obras Civiles'),
('21075', 'Ingeniería en Electrónica'),
('21076', 'Ingeniería Civil Industrial'),
('21080', 'Ingeniería en Química'),
('21081', 'Ingeniería en Comercio Internacional'),
('21082', 'Ingeniería en Gestión Turística'),
('21083', 'Química Industrial ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
