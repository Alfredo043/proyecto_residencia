-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 14:31:53
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
  `Cu_Cve_Curso` decimal(18,0) NOT NULL,
  `Cu_Titulo` varchar(50) DEFAULT NULL,
  `Cu_Subtitulo` varchar(50) DEFAULT NULL,
  `Es_Cve_Estado` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_video`
--

CREATE TABLE `curso_video` (
  `Cv_Cve_Curso_Video` decimal(18,0) NOT NULL,
  `Cv_Titulo` varchar(50) DEFAULT NULL,
  `Cv_Descripcion` varchar(100) DEFAULT NULL,
  `Cv_Url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso_video`
--

INSERT INTO `curso_video` (`Cv_Cve_Curso_Video`, `Cv_Titulo`, `Cv_Descripcion`, `Cv_Url`) VALUES
('1', 'Crear base de datos', 'Aprende a crear una base de datos en el Sistema y realizar la configuración inicial de tu empresa.', 'https://youtu.be/LIo4vWmLQZg'),
('2', 'Clientes', 'Conoce la forma más sencilla de capturar a tus clientes en el Punto de Venta', 'https://youtu.be/hknPGWIXnLw');

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
('1', '0', 'Jorge Aldana', 'jaldana@gmail.com', '123', 'BA'),
('2', '0', 'Marco Aldana', 'maldana@gmail.com', '1234', 'AC'),
('3', '0', 'Alfredo Aldana', 'aaldana@gmail.com', '12345', 'AC'),
('4', '0', 'Maria Martinez', 'mariaaldana@gmail.com', '123456', 'AC'),
('5', '0', 'Mario Martinez', 'marioaldana@gmail.com', '1234567', 'AC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Cu_Cve_Curso`);

--
-- Indices de la tabla `curso_video`
--
ALTER TABLE `curso_video`
  ADD PRIMARY KEY (`Cv_Cve_Curso_Video`);

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
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Tu_Cve_Tipo_Usuario`) REFERENCES `tipo_usuario` (`Tu_Cve_Tipo_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
