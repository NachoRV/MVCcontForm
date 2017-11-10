-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-10-2017 a las 15:49:06
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cfpresencial`
--

CREATE TABLE `cfpresencial` (
  `localizador` int(5) NOT NULL,
  `Titulo del curso` varchar(200) NOT NULL,
  `Fecha de inicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Fecha fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Gestor_de_formacion` varchar(100) NOT NULL,
  `Lugar de la formacion` varchar(500) NOT NULL,
  `Proveedor` varchar(100) NOT NULL,
  `Tipo de formación` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `locSesion` int(5) NOT NULL,
  `Bonficado` varchar(10) NOT NULL,
  `Pet Montaje` int(7) NOT NULL,
  `Acceso` varchar(3) NOT NULL,
  `Orange Trainer` varchar(10) NOT NULL,
  `Envio doc` varchar(3) NOT NULL,
  `Recibuda doc` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cfpresencial`
--
ALTER TABLE `cfpresencial`
  ADD PRIMARY KEY (`localizador`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
