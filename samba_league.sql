-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2025 a las 20:45:00
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
-- Base de datos: `samba_league`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_temporales`
--

CREATE TABLE `equipos_temporales` (
  `id` bigint(20) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `color` varchar(100) DEFAULT NULL,
  `id_jugador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos_temporales`
--

INSERT INTO `equipos_temporales` (`id`, `id_partido`, `color`, `id_jugador`) VALUES
(1, 1, 'negro', 1),
(2, 1, 'negro', 13),
(3, 1, 'negro', 8),
(4, 1, 'negro', 10),
(5, 1, 'negro', 20),
(6, 1, 'negro', 17),
(7, 1, 'blanco', 3),
(8, 1, 'blanco', 6),
(9, 1, 'blanco', 9),
(10, 1, 'blanco', 4),
(11, 1, 'blanco', 15),
(12, 1, 'blanco', 16),
(13, 2, 'azul', 19),
(14, 2, 'azul', 3),
(15, 2, 'azul', 20),
(16, 2, 'azul', 10),
(17, 2, 'azul', 14),
(18, 2, 'azul', 6),
(19, 2, 'azul', 13),
(20, 2, 'rojo', 4),
(21, 2, 'rojo', 9),
(22, 2, 'rojo', 17),
(23, 2, 'rojo', 16),
(24, 2, 'rojo', 5),
(25, 2, 'rojo', 8),
(26, 2, 'rojo', 7),
(27, 3, 'rojo', 14),
(28, 3, 'rojo', 15),
(29, 3, 'rojo', 1),
(30, 3, 'rojo', 9),
(31, 3, 'rojo', 7),
(32, 3, 'rojo', 12),
(33, 3, 'rojo', 8),
(34, 3, 'negro', 13),
(35, 3, 'negro', 21),
(36, 3, 'negro', 16),
(37, 3, 'negro', 4),
(38, 3, 'negro', 6),
(39, 3, 'negro', 20),
(40, 3, 'negro', 3),
(41, 3, 'negro', 5),
(42, 4, 'blanco', 9),
(43, 4, 'blanco', 17),
(44, 4, 'blanco', 8),
(45, 4, 'blanco', 3),
(46, 4, 'blanco', 21),
(47, 4, 'blanco', 10),
(48, 4, 'blanco', 7),
(49, 4, 'blanco', 15),
(50, 4, 'negro', 1),
(51, 4, 'negro', 6),
(52, 4, 'negro', 12),
(53, 4, 'negro', 13),
(54, 4, 'negro', 14),
(55, 4, 'negro', 16),
(56, 4, 'negro', 20),
(57, 4, 'negro', 5),
(58, 5, 'blanco', 3),
(59, 5, 'blanco', 4),
(60, 5, 'blanco', 5),
(61, 5, 'blanco', 8),
(62, 5, 'blanco', 13),
(63, 5, 'blanco', 20),
(64, 5, 'blanco', 21),
(65, 5, 'negro', 1),
(66, 5, 'negro', 6),
(67, 5, 'negro', 7),
(68, 5, 'negro', 9),
(69, 5, 'negro', 12),
(70, 5, 'negro', 16),
(71, 5, 'negro', 15),
(72, 6, 'blanco', 4),
(73, 6, 'blanco', 10),
(74, 6, 'blanco', 3),
(75, 6, 'blanco', 20),
(76, 6, 'blanco', 6),
(77, 6, 'negro', 8),
(78, 6, 'negro', 13),
(79, 6, 'negro', 12),
(80, 6, 'negro', 1),
(81, 6, 'negro', 21),
(82, 6, 'negro', 9),
(83, 7, 'azul', 9),
(84, 7, 'azul', 6),
(85, 7, 'azul', 21),
(86, 7, 'azul', 5),
(87, 7, 'azul', 15),
(88, 7, 'rojo', 3),
(89, 7, 'rojo', 1),
(90, 7, 'rojo', 20),
(91, 7, 'rojo', 18),
(92, 7, 'rojo', 16),
(93, 7, 'rojo', 12),
(94, 7, 'rojo', 14),
(95, 8, 'azul', 6),
(96, 8, 'azul', 21),
(97, 8, 'azul', 20),
(98, 8, 'azul', 18),
(99, 8, 'azul', 5),
(100, 8, 'azul', 10),
(101, 8, 'azul', 12),
(102, 8, 'azul', 4),
(103, 8, 'rojo', 3),
(104, 8, 'rojo', 8),
(105, 8, 'rojo', 1),
(106, 8, 'rojo', 7),
(107, 8, 'rojo', 14),
(108, 8, 'rojo', 9),
(109, 8, 'rojo', 13),
(110, 8, 'rojo', 16),
(111, 9, 'negro', 5),
(112, 9, 'negro', 13),
(113, 9, 'negro', 18),
(114, 9, 'negro', 10),
(115, 9, 'negro', 9),
(116, 9, 'blanco', 14),
(117, 9, 'blanco', 7),
(118, 9, 'blanco', 6),
(119, 9, 'blanco', 12),
(120, 9, 'blanco', 1),
(121, 10, 'rojo', 18),
(122, 10, 'rojo', 1),
(123, 10, 'rojo', 20),
(124, 10, 'rojo', 14),
(125, 10, 'rojo', 16),
(126, 10, 'rojo', 7),
(127, 10, 'rojo', 8),
(128, 10, 'negro', 12),
(129, 10, 'negro', 6),
(130, 10, 'negro', 5),
(131, 10, 'negro', 3),
(132, 10, 'negro', 4),
(133, 10, 'negro', 15),
(134, 10, 'negro', 13),
(135, 11, 'negro', 4),
(136, 11, 'negro', 20),
(137, 11, 'negro', 8),
(138, 11, 'negro', 9),
(139, 11, 'negro', 7),
(140, 11, 'rojo', 16),
(141, 11, 'rojo', 1),
(142, 11, 'rojo', 13),
(143, 11, 'rojo', 3),
(144, 11, 'rojo', 6),
(145, 12, 'negro', 9),
(146, 12, 'negro', 1),
(147, 12, 'negro', 7),
(148, 12, 'negro', 21),
(149, 12, 'negro', 12),
(150, 12, 'rojo', 3),
(151, 12, 'rojo', 14),
(152, 12, 'rojo', 4),
(153, 12, 'rojo', 20),
(154, 12, 'rojo', 16),
(155, 12, 'rojo', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_partidos`
--

CREATE TABLE `eventos_partidos` (
  `id` bigint(20) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `minuto` int(2) DEFAULT NULL,
  `tipo_evento` varchar(100) DEFAULT NULL,
  `id_jugador_principal` int(11) NOT NULL,
  `id_jugador_secundario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos_partidos`
--

INSERT INTO `eventos_partidos` (`id`, `id_partido`, `minuto`, `tipo_evento`, `id_jugador_principal`, `id_jugador_secundario`) VALUES
(1, 1, NULL, 'gol', 6, 9),
(2, 1, NULL, 'gol', 6, 9),
(3, 1, NULL, 'gol', 9, 3),
(4, 1, NULL, 'gol', 9, NULL),
(5, 1, NULL, 'gol', 16, NULL),
(6, 1, NULL, 'gol', 16, NULL),
(7, 1, NULL, 'gol', 3, NULL),
(8, 1, NULL, 'gol', 1, NULL),
(9, 1, NULL, 'gol', 8, 1),
(10, 1, NULL, 'gol', 13, NULL),
(11, 1, NULL, 'gol', 10, NULL),
(12, 1, NULL, 'gol', 15, NULL),
(13, 2, 4, 'gol', 5, 4),
(14, 2, 5, 'gol', 14, NULL),
(15, 2, 12, 'gol', 4, 8),
(16, 2, 23, 'gol', 10, 14),
(17, 2, 24, 'gol', 14, 10),
(18, 2, 25, 'gol', 6, 3),
(19, 2, 27, 'gol', 4, NULL),
(20, 2, 31, 'gol', 14, 19),
(21, 2, 37, 'gol', 14, 10),
(22, 2, 39, 'gol', 3, 10),
(23, 2, 41, 'gol', 17, 9),
(24, 2, 43, 'gol', 14, NULL),
(25, 2, 51, 'gol', 10, 20),
(26, 2, 56, 'gol', 6, 19),
(27, 2, 58, 'gol', 5, 7),
(28, 2, 63, 'gol', 9, NULL),
(29, 2, 66, 'gol', 8, 9),
(30, 3, NULL, 'gol', 9, 7),
(31, 3, NULL, 'gol', 14, 9),
(32, 3, NULL, 'gol', 14, NULL),
(33, 3, NULL, 'gol', 4, 20),
(34, 3, NULL, 'gol', 13, 20),
(35, 3, NULL, 'gol', 16, 21),
(36, 3, NULL, 'gol', 21, 13),
(37, 3, NULL, 'gol', 16, NULL),
(38, 3, NULL, 'gol', 21, NULL),
(39, 3, NULL, 'gol', 5, NULL),
(40, 4, NULL, 'gol', 14, 16),
(41, 4, NULL, 'gol', 9, NULL),
(42, 4, NULL, 'gol', 8, 9),
(43, 4, NULL, 'gol', 21, 9),
(44, 4, NULL, 'gol', 7, 21),
(45, 4, NULL, 'gol', 9, 21),
(46, 4, NULL, 'gol', 13, 14),
(47, 4, NULL, 'gol', 9, NULL),
(48, 4, NULL, 'gol', 13, NULL),
(49, 4, NULL, 'gol', 9, 21),
(50, 4, NULL, 'gol', 21, 17),
(51, 4, NULL, 'gol', 17, 7),
(52, 5, NULL, 'gol', 21, 13),
(53, 5, NULL, 'gol', 4, NULL),
(54, 5, NULL, 'gol', 5, NULL),
(55, 5, NULL, 'gol', 4, 5),
(56, 5, NULL, 'gol', 9, NULL),
(57, 5, NULL, 'gol', 5, 20),
(58, 5, NULL, 'gol', 3, NULL),
(59, 5, NULL, 'gol', 6, 9),
(60, 5, NULL, 'gol', 9, NULL),
(61, 5, NULL, 'gol', 5, NULL),
(62, 5, NULL, 'gol', 13, 8),
(63, 5, NULL, 'gol', 8, 21),
(64, 5, NULL, 'gol', 21, 4),
(65, 5, NULL, 'gol', 13, NULL),
(66, 5, NULL, 'gol', 9, 1),
(67, 6, NULL, 'gol', 4, NULL),
(68, 6, NULL, 'gol', 9, 13),
(69, 6, NULL, 'gol', 13, NULL),
(70, 6, NULL, 'gol', 9, NULL),
(71, 6, NULL, 'gol', 6, NULL),
(72, 6, NULL, 'gol', 10, 4),
(73, 6, NULL, 'gol', 9, 21),
(74, 6, NULL, 'gol', 10, NULL),
(75, 6, NULL, 'gol', 9, NULL),
(76, 6, NULL, 'gol', 8, 21),
(77, 6, NULL, 'gol', 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `partidos_jugados` int(100) DEFAULT NULL,
  `partidos_ganados` int(100) DEFAULT NULL,
  `partidos_perdidos` int(100) DEFAULT NULL,
  `posicion` varchar(100) DEFAULT NULL,
  `goles` int(100) DEFAULT NULL,
  `asistencias` int(100) DEFAULT NULL,
  `paradas` int(100) DEFAULT NULL,
  `stats_defensivas` int(100) DEFAULT NULL,
  `dorsal` int(11) DEFAULT NULL,
  `win_rate` decimal(4,2) DEFAULT NULL,
  `suma_puntos` decimal(10,2) DEFAULT NULL,
  `overall` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombre`, `partidos_jugados`, `partidos_ganados`, `partidos_perdidos`, `posicion`, `goles`, `asistencias`, `paradas`, `stats_defensivas`, `dorsal`, `win_rate`, `suma_puntos`, `overall`) VALUES
(1, 'AITOR', 10, 3, 7, 'CM', 6, 8, 1, 4, 420, 30.00, 73.90, 7.39),
(2, 'ALBERTO', 0, 0, 0, 'GK', 0, 0, 0, 0, 0, 0.00, 0.00, 0.00),
(3, 'ALVARO', 10, 8, 2, 'CB', 6, 8, 1, 9, 23, 80.00, 105.10, 10.51),
(4, 'ANDREU', 8, 5, 3, 'CM', 10, 6, 0, 0, 32, 62.50, 72.00, 9.00),
(5, 'BIEL', 5, 3, 2, 'ST', 11, 2, 1, 0, 14, 60.00, 50.80, 10.16),
(6, 'BRAIS', 11, 4, 7, 'CM', 9, 5, 1, 0, 10, 36.36, 75.10, 6.83),
(7, 'EDU', 8, 3, 5, 'CB', 3, 8, 2, 0, 37, 37.50, 52.70, 6.58),
(8, 'HUGO', 9, 5, 4, 'GK', 7, 2, 2, 0, 45, 55.56, 63.00, 7.00),
(9, 'JAVI', 10, 6, 4, 'ST', 22, 12, 1, 0, 11, 60.00, 117.20, 11.72),
(10, 'JOAN', 6, 3, 3, 'CB', 6, 5, 1, 4, 3, 50.00, 59.80, 9.97),
(11, 'PETACA', 0, 0, 0, 'CB', 0, 0, 0, 0, 17, 0.00, 0.00, 0.00),
(12, 'PERDI', 8, 3, 5, 'CB', 4, 2, 2, 4, 78, 37.50, 59.40, 7.43),
(13, 'JUSI', 10, 7, 3, 'CM', 11, 9, 4, 0, 6, 70.00, 92.40, 9.24),
(14, 'MARCEL', 7, 3, 4, 'ST', 15, 2, 1, 0, 9, 42.86, 67.00, 9.57),
(15, 'MIQUEL', 6, 3, 3, 'CM', 2, 0, 2, 0, 1, 50.00, 32.60, 5.43),
(16, 'NANO', 9, 4, 5, 'CM', 10, 4, 0, 2, 16, 44.44, 61.00, 6.78),
(17, 'OSCAR', 3, 1, 2, 'ST', 3, 3, 1, 0, 8, 33.33, 25.00, 8.33),
(18, 'PERAS', 4, 2, 2, 'CM', 1, 6, 2, 2, 87, 50.00, 34.60, 8.65),
(19, 'VITO', 1, 1, 0, 'ST', 0, 2, 0, 0, 7, 99.99, 8.00, 8.00),
(20, 'XASQUI', 10, 5, 5, 'CB', 2, 7, 1, 4, 15, 50.00, 70.40, 7.04),
(21, 'XAVI', 6, 4, 2, 'CM', 10, 9, 2, 1, 5, 66.67, 59.40, 9.90),
(22, 'COCA', 1, 0, 1, 'ST', NULL, 0, 0, 0, 0, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `jornada` int(11) NOT NULL,
  `resultado_local` int(11) DEFAULT NULL,
  `resultado_visitante` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `fecha`, `jornada`, `resultado_local`, `resultado_visitante`) VALUES
(1, '2024-09-22', 1, 8, 6),
(2, '2024-09-29', 2, 8, 10),
(3, '2024-10-06', 3, 7, 3),
(4, '2024-10-12', 4, 9, 3),
(5, '2024-10-19', 5, 4, 11),
(6, '2024-11-03', 6, 7, 6),
(7, '2024-11-09', 7, 10, 4),
(8, '2024-11-16', 8, 6, 5),
(9, '2024-11-24', 9, 5, 9),
(10, '2024-11-30', 10, 3, 8),
(11, '2024-12-07', 11, 9, 8),
(12, '2024-12-21', 12, 8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stat_jugador`
--

CREATE TABLE `stat_jugador` (
  `id` int(11) NOT NULL,
  `id_jugador` int(11) NOT NULL,
  `ritmo` tinyint(4) DEFAULT NULL,
  `disparo` tinyint(4) DEFAULT NULL,
  `pase` tinyint(4) DEFAULT NULL,
  `regate` tinyint(4) DEFAULT NULL,
  `defensa` tinyint(4) DEFAULT NULL,
  `fisico` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stat_jugador`
--

INSERT INTO `stat_jugador` (`id`, `id_jugador`, `ritmo`, `disparo`, `pase`, `regate`, `defensa`, `fisico`) VALUES
(1, 1, 77, 72, 84, 80, 69, 71),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 74, 69, 77, 66, 86, 85),
(4, 4, 75, 67, 82, 82, 68, 68),
(5, 5, 77, 82, 68, 5, 12, 74),
(6, 6, 73, 63, 84, 81, 67, 64),
(7, 7, 62, 67, 67, 65, 80, 80),
(8, 8, 66, 74, 73, 64, 66, 67),
(9, 9, 84, 88, 74, 80, 44, 75),
(10, 10, 84, 66, 71, 70, 76, 82),
(11, 11, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 12, 64, 57, 65, 60, 81, 86),
(13, 13, 75, 72, 76, 76, 60, 67),
(14, 14, 75, 82, 70, 71, 42, 71),
(15, 15, 80, 44, 60, 55, 65, 65),
(16, 16, 74, 75, 78, 74, 76, 76),
(17, 17, 75, 79, 70, 73, 64, 80),
(18, 18, 72, 65, 75, 70, 73, 79),
(19, 19, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 20, 64, 66, 70, 64, 83, 84),
(21, 21, 73, 80, 83, 82, 73, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$NVFhHl83vsLgzOAF7d1bm.PboVGo0tSrChWXS8H/GY2Vu7aw/buja', 'admin@samba-league.com', '2025-01-27 18:48:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id` bigint(20) NOT NULL,
  `id_jugador` int(11) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `valoracion_personal` int(11) NOT NULL,
  `valoracion_compañeros` int(11) NOT NULL,
  `overall` decimal(3,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`id`, `id_jugador`, `id_partido`, `valoracion_personal`, `valoracion_compañeros`, `overall`) VALUES
(1, 1, 1, 3, 3, 8.0),
(2, 3, 1, 4, 5, 12.7),
(3, 4, 1, 4, 3, 6.3),
(4, 6, 1, 4, 3, 10.3),
(5, 8, 1, 3, 2, 6.3),
(6, 9, 1, 4, 5, 14.7),
(7, 10, 1, 4, 3, 5.3),
(8, 13, 1, 3, 2, 6.3),
(9, 15, 1, 3, 2, 7.3),
(10, 16, 1, 4, 5, 14.7),
(11, 17, 1, 4, 3, 6.3),
(12, 20, 1, 3, 4, 5.7),
(13, 3, 2, 4, 4, 12.0),
(14, 4, 2, 4, 4, 9.0),
(15, 6, 2, 4, 4, 13.0),
(16, 7, 2, 2, 3, 5.7),
(17, 8, 2, 2, 3, 5.7),
(18, 9, 2, 2, 3, 5.7),
(19, 10, 2, 4, 5, 17.7),
(20, 13, 2, 3, 3, 7.0),
(21, 14, 2, 4, 4, 18.0),
(22, 16, 2, 2, 3, 2.7),
(23, 17, 2, 2, 3, 6.7),
(24, 19, 2, 3, 3, 8.0),
(25, 20, 2, 4, 4, 10.0),
(26, 1, 3, 3, 3, 3.0),
(27, 3, 3, 4, 4, 9.0),
(28, 4, 3, 4, 3, 9.3),
(29, 6, 3, 3, 4, 6.7),
(30, 7, 3, 3, 3, 6.0),
(31, 8, 3, 3, 3, 3.0),
(32, 9, 3, 4, 4, 7.0),
(33, 12, 3, 4, 4, 6.0),
(34, 13, 3, 4, 4, 10.0),
(35, 14, 3, 4, 4, 8.0),
(36, 16, 3, 3, 3, 5.0),
(37, 17, 3, 4, 4, 11.0),
(38, 20, 3, 4, 5, 11.7),
(39, 1, 4, 3, 3, 5.0),
(40, 3, 4, 4, 4, 9.0),
(41, 6, 4, 3, 3, 3.0),
(42, 7, 4, 4, 4, 10.0),
(43, 8, 4, 4, 4, 11.0),
(44, 9, 4, 4, 5, 15.7),
(45, 10, 4, 3, 4, 10.7),
(46, 12, 4, 4, 4, 6.0),
(47, 13, 4, 4, 3, 7.3),
(48, 14, 4, 3, 3, 6.0),
(49, 15, 4, 3, 3, 6.0),
(50, 16, 4, 3, 3, 3.0),
(51, 17, 4, 4, 4, 12.0),
(52, 20, 4, 2, 3, 2.7),
(53, 21, 4, 5, 5, 15.0),
(54, 1, 5, 4, 4, 8.0),
(55, 3, 5, 4, 5, 13.7),
(56, 4, 5, 4, 5, 12.7),
(57, 5, 5, 5, 4, 14.3),
(58, 6, 5, 4, 3, 5.3),
(59, 7, 5, 3, 3, 3.0),
(60, 8, 5, 3, 3, 9.0),
(61, 9, 5, 4, 4, 11.0),
(62, 12, 5, 2, 4, 5.4),
(63, 13, 5, 4, 4, 12.0),
(64, 15, 5, 3, 2, 2.3),
(65, 16, 5, 2, 2, 2.0),
(66, 20, 5, 4, 3, 7.3),
(67, 21, 5, 4, 5, 17.7),
(68, 1, 6, 4, 3, 8.3),
(69, 3, 6, 3, 3, 3.0),
(70, 4, 6, 4, 4, 7.0),
(71, 6, 6, 4, 3, 3.3),
(72, 8, 6, 4, 3, 8.3),
(73, 9, 6, 5, 5, 18.0),
(74, 10, 6, 3, 4, 7.7),
(75, 12, 6, 3, 3, 8.0),
(76, 13, 6, 3, 4, 11.7),
(77, 20, 6, 3, 2, 2.3),
(78, 21, 6, 4, 4, 11.0),
(79, 1, 7, 4, 4, 15.0),
(80, 3, 7, 4, 4, 11.0),
(81, 5, 7, 1, 3, 4.4),
(82, 6, 7, 2, 3, 4.7),
(83, 9, 7, 2, 4, 4.4),
(84, 12, 7, 4, 4, 14.0),
(85, 14, 7, 5, 4, 18.3),
(86, 15, 7, 2, 1, 1.3),
(87, 16, 7, 3, 3, 6.0),
(88, 18, 7, 4, 3, 8.3),
(89, 20, 7, 3, 3, 7.0),
(90, 21, 7, 2, 3, 4.7),
(91, 1, 8, 4, 3, 8.3),
(92, 3, 8, 4, 5, 13.7),
(93, 4, 8, 3, 4, 5.7),
(94, 5, 8, 2, 2, 5.0),
(95, 6, 8, 4, 4, 6.0),
(96, 7, 8, 3, 3, 7.0),
(97, 8, 8, 2, 3, 5.7),
(98, 9, 8, 4, 4, 11.0),
(99, 10, 8, 3, 4, 5.7),
(100, 12, 8, 3, 3, 4.0),
(101, 13, 8, 2, 3, 7.7),
(102, 14, 8, 3, 3, 10.0),
(103, 16, 8, 3, 2, 6.3),
(104, 18, 8, 5, 4, 7.3),
(105, 20, 8, 3, 3, 5.0),
(106, 21, 8, 5, 5, 11.0),
(107, 1, 9, 4, 3, 5.3),
(108, 5, 9, 2, 4, 12.4),
(109, 6, 9, 4, 4, 7.0),
(110, 7, 9, 3, 3, 7.0),
(111, 9, 9, 4, 5, 14.7),
(112, 10, 9, 3, 4, 12.7),
(113, 12, 9, 3, 3, 7.0),
(114, 13, 9, 4, 4, 11.0),
(115, 14, 9, 2, 3, 4.7),
(116, 18, 9, 5, 5, 15.0),
(117, 1, 10, 3, 4, 3.7),
(118, 3, 10, 4, 4, 12.0),
(119, 4, 10, 4, 4, 10.0),
(120, 5, 10, 3, 4, 14.7),
(121, 6, 10, 0, 4, 8.8),
(122, 7, 10, 3, 3, 3.0),
(123, 8, 10, 3, 3, 5.0),
(124, 12, 10, 4, 4, 9.0),
(125, 13, 10, 3, 4, 10.7),
(126, 14, 10, 2, 2, 2.0),
(127, 15, 10, 3, 4, 10.7),
(128, 16, 10, 3, 3, NULL),
(129, 18, 10, 2, 2, 4.0),
(130, 20, 10, 3, 4, 5.7),
(131, 1, 11, 5, 4, 9.3),
(132, 3, 11, 4, 4, 9.0),
(133, 4, 11, 4, 4, 12.0),
(134, 6, 11, 4, 4, 7.0),
(135, 7, 11, 4, 4, 11.0),
(136, 8, 11, 4, 4, 9.0),
(137, 9, 11, 5, 5, 15.0),
(138, 13, 11, 3, 4, 8.7),
(139, 16, 11, 5, 4, 16.3),
(140, 20, 11, 4, 4, 13.0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos_temporales`
--
ALTER TABLE `equipos_temporales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_partido` (`id_partido`),
  ADD KEY `id_jugador` (`id_jugador`);

--
-- Indices de la tabla `eventos_partidos`
--
ALTER TABLE `eventos_partidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_partido` (`id_partido`),
  ADD KEY `id_jugador_principal` (`id_jugador_principal`),
  ADD KEY `id_jugador_secundario` (`id_jugador_secundario`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stat_jugador`
--
ALTER TABLE `stat_jugador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jugador` (`id_jugador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jugador` (`id_jugador`),
  ADD KEY `id_partido` (`id_partido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos_temporales`
--
ALTER TABLE `equipos_temporales`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `eventos_partidos`
--
ALTER TABLE `eventos_partidos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `stat_jugador`
--
ALTER TABLE `stat_jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos_temporales`
--
ALTER TABLE `equipos_temporales`
  ADD CONSTRAINT `equipos_temporales_ibfk_1` FOREIGN KEY (`id_partido`) REFERENCES `partidos` (`id`),
  ADD CONSTRAINT `equipos_temporales_ibfk_2` FOREIGN KEY (`id_jugador`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `eventos_partidos`
--
ALTER TABLE `eventos_partidos`
  ADD CONSTRAINT `eventos_partidos_ibfk_1` FOREIGN KEY (`id_partido`) REFERENCES `partidos` (`id`),
  ADD CONSTRAINT `eventos_partidos_ibfk_2` FOREIGN KEY (`id_jugador_principal`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `eventos_partidos_ibfk_3` FOREIGN KEY (`id_jugador_secundario`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `stat_jugador`
--
ALTER TABLE `stat_jugador`
  ADD CONSTRAINT `stat_jugador_ibfk_1` FOREIGN KEY (`id_jugador`) REFERENCES `jugadores` (`id`);

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`id_jugador`) REFERENCES `jugadores` (`id`),
  ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`id_partido`) REFERENCES `partidos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
