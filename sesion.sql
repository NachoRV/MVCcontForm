-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 26-11-2017 a las 18:16:53
-- Versión del servidor: 5.6.35
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `formacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

REATE TABLE `sesion` (
  `ID_USUARIO` varchar(30) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Sociedad` varchar(5) NOT NULL,
  `Bonificable` varchar(2) NOT NULL,
  `Accion` int(3) NOT NULL,
  `Grupo` int(2) NOT NULL,
  `Id_formación` varchar(40) NOT NULL,
  `localizador` int(5) NOT NULL,
  `Imparticion` varchar(7) NOT NULL,
  `Tipo_Formacion` varchar(6) NOT NULL,
  `Titulo_curso` varchar(100) NOT NULL,
  `Objetivo` varchar(250) NOT NULL,
  `Fecha_inicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Fecha_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Horas_sesion` int(2) NOT NULL,
  `Duracion_formacion` int(2) NOT NULL,
  `Horas_formacion` int(2) NOT NULL,
  `Proveedor` varchar(10) NOT NULL,
  `Estado_expedient` varchar(10) NOT NULL,
  `Ciudad` varchar(5) NOT NULL,
  `Aula` varchar(250) NOT NULL,
  `Gestor` varchar(11) NOT NULL,
  `Creado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
