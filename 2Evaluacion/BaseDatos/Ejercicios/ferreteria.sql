-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2022 a las 18:06:09
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ferreteria`
--
CREATE DATABASE IF NOT EXISTS `ferreteria` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `ferreteria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `CODIGOARTICULO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `SECCION` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBREARTICULO` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA` date NOT NULL,
  `PAISDEORIGEN` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `PRECIO` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`CODIGOARTICULO`, `SECCION`, `NOMBREARTICULO`, `FECHA`, `PAISDEORIGEN`, `PRECIO`) VALUES
('AR01', 'CERAMICA', 'Tubos', '0000-00-00', 'China', '140.35'),
('AR02', 'CERAMICA', 'Plato Decorativo', '0000-00-00', 'China', '45.08'),
('AR03', 'CERAMICA', 'Juego de te', '0000-00-00', 'China', '36.06'),
('AR04', 'CERAMICA', 'Cenicero', '0000-00-00', 'Japon', '16.46'),
('AR05', 'CERAMICA', 'Maceta', '0000-00-00', 'Espana', '24.20'),
('AR06', 'CERAMICA', 'Jarra china', '0000-00-00', 'China', '106.48'),
('AR07', 'CONFECCION', 'Tarje Caballero', '0000-00-00', 'Italia', '237.15'),
('AR08', 'CONFECCION', 'Pantalon Senora', '0000-00-00', 'Marruecos', '145.19'),
('AR09', 'CONFECCION', 'Camisa Caballero', '0000-00-00', 'Espana', '55.94'),
('AR10', 'CONFECCION', 'Blusa Sra.', '0000-00-00', 'China', '84.21'),
('AR11', 'CONFECCION', 'Cazadora piel', '0000-00-00', 'Italia', '435.58'),
('AR12', 'CONFECCION', 'Abrigo Caballero', '0000-00-00', 'Italia', '203.27'),
('AR13', 'CONFECCION', 'Abrigo Sra', '0000-00-00', 'Marruecos', '300.06'),
('AR14', 'CONFECCION', 'Cinturon de piel', '0000-00-00', 'Espana', '3.61'),
('AR15', 'DEPORTE', 'Raqueta Tenis', '0000-00-00', 'Usa', '77.89'),
('AR16', 'DEPORTE', 'Chandal', '0000-00-00', 'Usa', '193.39'),
('AR17', 'DEPORTE', 'Tren Electrico', '0000-00-00', 'Japon', '1254.48'),
('AR18', 'DEPORTE', 'Pistola Olimpica', '0000-00-00', 'Suecia', '38.95'),
('AR19', 'DEPORTE', 'Monopatin', '0000-00-00', 'Marruecos', '93.04'),
('AR20', 'DEPORTE', 'Balon baloncesto', '0000-00-00', 'Japon', '62.73'),
('AR21', 'DEPORTE', 'Balon Futbol', '0000-00-00', 'Espana', '36.60'),
('AR22', 'DEPORTE', 'Sudadera', '0000-00-00', 'Usa', '365.98'),
('AR23', 'DEPORTE', 'Bicicleta de montana', '0000-00-00', 'Usa', '470.42'),
('AR24', 'FERRETERIA', 'Destornillador', '0000-00-00', 'Espana', '5.52'),
('AR25', 'FERRETERIA', 'Serrucho', '0000-00-00', 'Francia', '25.17'),
('AR26', 'FERRETERIA', 'Llave Inglesa', '0000-00-00', 'Usa', '20.33'),
('AR27', 'FERRETERIA', 'Alicates', '0000-00-00', 'Italia', '5.61'),
('AR28', 'FERRETERIA', 'Martillo', '0000-00-00', 'Espana', '9.50'),
('AR29', 'FERRETERIA', 'Destornillador', '0000-00-00', 'Francia', '7.55'),
('AR30', 'FERRETERIA', 'Lima Grande', '0000-00-00', 'Espana	', '18.39'),
('AR31', 'FERRETERIA', 'Juego de brocas', '0000-00-00', 'Taiwan', '12.58'),
('AR32', 'JUGUETERIA', 'Coche Teledirigido', '0000-00-00', 'Marruecos', '132.87'),
('AR33', 'JUGUETERIA', 'Correpasillos', '0000-00-00', 'Japon', '86.11'),
('AR34', 'JUGUETERIA', 'Consola Video', '0000-00-00', 'Usa', '368.79'),
('AR35', 'JUGUETERIA', 'Muneca Andadora', '0000-00-00', 'Espana', '87.55'),
('AR36', 'JUGUETERIA', 'Fuerte de soldados', '0000-00-00', 'Japon', '119.75'),
('AR37', 'JUGUETERIA', 'Pistola con sonidos', '0000-00-00', 'Espana', '47.71'),
('AR38', 'JUGUETERIA', 'Pie de lampara', '0000-00-00', 'Turquia', '33.13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CODIGOARTICULO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
