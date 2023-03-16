-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-01-2023 a las 07:04:02
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `metabiblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `referencia` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha`) VALUES
(1, 'Cocacola', 789, 3500, 450, 'BEBIDAS', 45, '2023-01-23 17:15:31'),
(5, 'Aceitunas', 564, 4900, 900, 'PRODUCTOS ENLATADOS', 60, '2023-01-23 19:15:46'),
(6, 'Atún', 369, 7500, 500, 'PRODUCTOS ENLATADOS', 7, '2023-01-23 19:17:11'),
(17, 'Queso', 159, 6000, 500, 'LÁCTEOS', 10, '2023-01-24 05:55:54'),
(18, 'Yoghurt', 951, 3680, 700, 'LÁCTEOS', 15, '2023-01-24 05:56:56'),
(19, 'Mantequilla', 753, 4500, 800, 'LÁCTEOS', 36, '2023-01-24 05:57:25'),
(20, 'Papas', 369, 7500, 300, 'BOTANAS', 30, '2023-01-24 05:58:38'),
(21, 'Palomitas', 128, 4588, 600, 'BOTANAS', 47, '2023-01-24 05:59:09'),
(22, 'Chocolates', 654, 900, 100, 'DULCERIA', 55, '2023-01-24 06:00:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `nombre`, `count`) VALUES
(1, 'Cocacola', 44),
(5, 'Aceitunas', 2),
(6, 'Atún', 3),
(22, 'Chocolates', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`,`referencia`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
