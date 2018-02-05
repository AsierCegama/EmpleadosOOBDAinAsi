-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2018 a las 10:34:36
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdempleadospcka`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nss` varchar(14) CHARACTER SET utf8 NOT NULL,
  `fijo` int(11) NOT NULL,
  `ventasbrutas` float NOT NULL,
  `tarifacomision` float NOT NULL,
  `localiza` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`nombre`, `apellido`, `nss`, `fijo`, `ventasbrutas`, `tarifacomision`, `localiza`) VALUES
('Ana', 'Portu Sainz', '12564855V', 800, 5000, 6, 2),
('Juan Luis', 'De Luis Elizalde', '14316528P', 600, 3500, 10, 2),
('Andrés', 'Huici Valero', '22364666C', 600, 3000, 18, 1),
('María', 'Echaide Arbelaiz', '32323926L', 700, 1000, 2, 1),
('Carmen', 'Lekuona Mar', '55256314V', 650, 2500, 14, 1),
('Gaizka', 'Yañez Karra', '73111524K', 720, 1500, 2, 2),
('Andoni', 'Reta Fuerte', '88543602D', 450, 5000, 6, 1),
('Josu', 'Velasco Pérez', '99865422X', 550, 2000, 22, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`nss`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
