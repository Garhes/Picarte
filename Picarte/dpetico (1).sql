-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2025 a las 15:54:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dpetico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `id`
--

CREATE TABLE `id` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(256) DEFAULT NULL,
  `Email` varchar(256) DEFAULT NULL,
  `Contraseña` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `id`
--

INSERT INTO `id` (`ID`, `Nombre`, `Email`, `Contraseña`) VALUES
(2, 'johan ', 'johangarcia@gmail.com', '$2y$10$B9rFzWkNlK7K3gzGlswy.udqSaWE6A7py50V7Vxl9xFkS0PB04WEe'),
(3, 'garhes', 'garhes@gmail.com', '$2y$10$fHTrxsQ47pQgD5x.2DITNOnlSZPdCdKubrU8bpikOh1jAiMd8hGIq'),
(4, 'soltelo', 'josj@gmail.com', '$2y$10$XoHQZW9154SGKWiKMX.Uc.eK7JzKr0DeMiq2Evorq1yIVnkLzhSm6'),
(5, 'garhes', 'garhes1@gmail.com', '$2y$10$8eBvpjME5KqcRJtBZs5vGOvr0puRiCYrT2e/dTdtnDr8uYgs0Nrna');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `id`
--
ALTER TABLE `id`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `id`
--
ALTER TABLE `id`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
