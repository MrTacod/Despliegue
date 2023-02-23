-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2023 a las 16:19:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `isbn` int(20) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `resumen` varchar(255) NOT NULL,
  `formato` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `libro`
--

TRUNCATE TABLE `libro`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `telefono` int(9) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncar tablas antes de insertar `usuario`
--

TRUNCATE TABLE `usuario`;
--
-- Volcado de datos para la tabla `usuario`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
