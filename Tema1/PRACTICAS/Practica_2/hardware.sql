-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2017 a las 19:04:53
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hardware`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) CHARACTER SET latin1 NOT NULL,
  `modelo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `precio` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `components`
--

INSERT INTO `components` (`id`, `tipo`, `modelo`, `descripcion`, `precio`) VALUES
(1, 'Tarjeta GrÃ¡fica', 'MSI GeForce GTX 1050Ti GAMING X 4GB GDDR5', 'GPU: GeForce GTX 1050, NÃºcleos CUDA: 768, Memoria de vÃ­deo: 4GB GDDR5, Motor de Base de reloj: 1379 MHz, DirectX 12', '169.00'),
(2, 'Tarjeta GrÃ¡fica', 'Sapphire Nitro+ Radeon RX 580 8G GDDR5 Special Edition', 'Especificaciones de reloj: 1430 Mhz, Memoria: 8GB GDDR5, DirectXÂ® 12, ', '339.00'),
(7, 'Disco Duro', 'Samsung 850 Evo SSD Series 250GB SATA3', 'Capacidad 250GB, Formato 2.5 inch', '95.95'),
(8, 'Memoria Ram', 'G.Skill Ripjaws V Red DDR4 2400 PC4-19200 16GB 2x8GB CL15', 'Tipo memoria DDR4, Velocidad de testeo 2400MHz (PC4-19200)', '206.00'),
(9, 'Disco Duro', 'A', 'B', '500.99');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
