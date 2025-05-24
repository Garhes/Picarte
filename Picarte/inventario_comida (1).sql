-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2025 a las 15:55:00
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
-- Base de datos: `inventario_comida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `usuario`, `contraseña`) VALUES
(1, 'Johan', 'Johan1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pago` varchar(50) NOT NULL,
  `comentarios` text DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `nombre`, `direccion`, `telefono`, `producto`, `cantidad`, `pago`, `comentarios`, `fecha`) VALUES
(1, 'prueba', 'prueba', '3174638290', 'Arepa', 12, 'Efectivo', 'prueba', '2025-04-27 19:02:58'),
(2, 'tamal', 'caalle 4 # sur 12 ', '3184657375', 'Tamales', 1, 'Efectivo', '1', '2025-05-09 01:49:49'),
(3, 'prueba', 'prueba', '3174638290', 'Arepa', 10, 'Tarjeta', 'prueba', '2025-05-14 15:35:02'),
(4, 'prueba', 'caalle 4 # sur 12 ', '3184657375', 'Empanada', 10, 'Tarjeta', '', '2025-05-14 15:53:40'),
(5, 'tamal', 'prueba', '3174638290', 'Empanada', 10, 'Efectivo', '', '2025-05-14 15:55:58'),
(6, 'prueba', 'prueba', '3174638290', 'Arepa', 10, 'PayPal', '', '2025-05-14 16:10:38'),
(7, 'prueba', 'caalle 4 # sur 12 ', '3174638290', 'Buñuelo', 10, 'Nequi', '', '2025-05-14 16:10:50'),
(8, 'prueba', 'caalle 4 # sur 12 ', '3174638290', 'Arepa', 10, 'PayPal', '', '2025-05-14 16:14:03'),
(9, 'tamal', 'prueba', '3174638290', 'Arepa', 10, 'PayPal', '', '2025-05-14 16:15:49'),
(10, 'tamal', 'prueba', '3174638290', 'Arepa', 10, 'PayPal', '', '2025-05-14 16:17:09'),
(11, 'prueba', 'prueba', '3174638290', 'Arepa', 10, 'PSE', '', '2025-05-14 16:17:34'),
(12, 'prueba', 'prueba', '3174638290', 'Empanada', 101, 'PSE', '', '2025-05-14 16:19:12'),
(13, 'prueba', 'prueba', '3174638290', 'Arepa', 52, 'Tarjeta', '', '2025-05-14 16:23:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`) VALUES
(1, 'arepa', 'Prueba 1 ', 3.00, 10, 'arepas_1.jpg'),
(2, 'Buñuelo', 'Buñuelo', 3.50, 20, 'Buñuelos.jpg'),
(3, 'tamal', 'rico', 8.00, 3, 'tamal.webp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
