-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2017 a las 17:02:39
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votaciones2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `idGrado` int(11) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `foto` varchar(150) NOT NULL,
  `personero` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `idGrado` int(11) NOT NULL,
  `grado` varchar(150) DEFAULT NULL,
  `imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `personero`
--

CREATE TABLE `personero` (
  `idPersonero` int(11) NOT NULL,
  `idEstudiante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vota`
--

CREATE TABLE `vota` (
  `idvota` int(11) NOT NULL,
  `idEstudiante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vota`
--

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD KEY `idGrado` (`idGrado`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `personero`
--
ALTER TABLE `personero`
  ADD PRIMARY KEY (`idPersonero`),
  ADD KEY `fk_personero` (`idEstudiante`);

--
-- Indices de la tabla `vota`
--
ALTER TABLE `vota`
  ADD PRIMARY KEY (`idvota`),
  ADD KEY `idEstudiante` (`idEstudiante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `personero`
--
ALTER TABLE `personero`
  MODIFY `idPersonero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `vota`
--
ALTER TABLE `vota`
  MODIFY `idvota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`idGrado`) REFERENCES `grado` (`idGrado`);

--
-- Filtros para la tabla `personero`
--
ALTER TABLE `personero`
  ADD CONSTRAINT `fk_personero` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`);

--
-- Filtros para la tabla `vota`
--
ALTER TABLE `vota`
  ADD CONSTRAINT `vota_ibfk_2` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
