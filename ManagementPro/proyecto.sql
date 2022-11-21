-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2022 a las 19:41:39
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `Cr_Cve_Curso` decimal(18,0) NOT NULL,
  `Cr_Titulo` varchar(50) DEFAULT NULL,
  `Cr_Subtitulo` varchar(50) DEFAULT NULL,
  `Cr_Descripcion` text NOT NULL,
  `Oper_Alta` varchar(15) NOT NULL,
  `Fecha_Alta` date NOT NULL,
  `Oper_Modif` varchar(15) NOT NULL,
  `Fecha_Modif` date NOT NULL,
  `Oper_Baja` varchar(15) NOT NULL DEFAULT '"',
  `Fecha_Baja` date DEFAULT NULL,
  `Es_Cve_Estado` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`Cr_Cve_Curso`, `Cr_Titulo`, `Cr_Subtitulo`, `Cr_Descripcion`, `Oper_Alta`, `Fecha_Alta`, `Oper_Modif`, `Fecha_Modif`, `Oper_Baja`, `Fecha_Baja`, `Es_Cve_Estado`) VALUES
('1', 'SECCION 1', 'Ejemplo 1', 'Descripcion', '0', '2022-11-21', '', '0000-00-00', '\"', NULL, 'AC'),
('2', 'SECCION 2', 'Ejemplo 2', 'Descripcion', '0', '2022-11-21', '', '0000-00-00', '\"', NULL, 'AC'),
('3', 'SECCION 3', 'Ejemplo 3', 'Descripcion', '0', '2022-11-21', '', '0000-00-00', '\"', NULL, 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_video`
--

CREATE TABLE `curso_video` (
  `Cv_Cve_Curso_Video` decimal(18,0) NOT NULL,
  `Cr_Cve_Curso` decimal(18,0) NOT NULL,
  `Cv_Titulo` varchar(50) DEFAULT NULL,
  `Cv_Descripcion` varchar(100) DEFAULT NULL,
  `Cv_Url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Es_Cve_Estado` varchar(4) DEFAULT NULL,
  `Es_Descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Tu_Cve_Tipo_Usuario` decimal(18,0) NOT NULL,
  `Tu_Descripcion` varchar(50) DEFAULT NULL,
  `Es_Cve_Estado` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Tu_Cve_Tipo_Usuario`, `Tu_Descripcion`, `Es_Cve_Estado`) VALUES
('0', 'Usuario', 'AC'),
('1', 'Administrador', 'AC'),
('2', 'Cliente', 'AC'),
('3', 'Partner', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Us_Cve_Usuario` decimal(18,0) NOT NULL,
  `Tu_Cve_Tipo_Usuario` decimal(18,0) NOT NULL,
  `Us_Descripcion` varchar(50) NOT NULL,
  `Us_Email` varchar(100) NOT NULL,
  `Us_Password` varchar(15) NOT NULL,
  `Es_Cve_Estado` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Us_Cve_Usuario`, `Tu_Cve_Tipo_Usuario`, `Us_Descripcion`, `Us_Email`, `Us_Password`, `Es_Cve_Estado`) VALUES
('1', '0', 'Jorge Aldana', 'jaldana@gmail.com', '123', 'AC'),
('2', '0', 'Marco Aldana', 'maldana@gmail.com', '1234', 'AC'),
('3', '0', 'Leydi Aldana', 'laldana@gmail.com', '12345', 'AC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Cr_Cve_Curso`);

--
-- Indices de la tabla `curso_video`
--
ALTER TABLE `curso_video`
  ADD PRIMARY KEY (`Cv_Cve_Curso_Video`),
  ADD UNIQUE KEY `Cv_Cve_Curso_Video` (`Cv_Cve_Curso_Video`) USING BTREE;

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Tu_Cve_Tipo_Usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Us_Cve_Usuario`),
  ADD UNIQUE KEY `Us_Cve_Usuario` (`Us_Cve_Usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso_video`
--
ALTER TABLE `curso_video`
  ADD CONSTRAINT `curso_video_ibfk_1` FOREIGN KEY (`Cr_Cve_Curso`) REFERENCES `curso` (`Cr_Cve_Curso`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Tu_Cve_Tipo_Usuario`) REFERENCES `tipo_usuario` (`Tu_Cve_Tipo_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
