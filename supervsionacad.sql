-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-11-2023 a las 03:25:49
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `supervsionacad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_car` varchar(50) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `nom_dir` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nom_dir` (`nom_dir`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nom_car`, `nombre`, `nom_dir`) VALUES
(3, 'test4', 'ENERGIAS RENOVABLESs', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dir_de_carrera`
--

DROP TABLE IF EXISTS `dir_de_carrera`;
CREATE TABLE IF NOT EXISTS `dir_de_carrera` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_dir` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `dir_de_carrera`
--

INSERT INTO `dir_de_carrera` (`id`, `nom_dir`, `nombres`, `primer_apellido`, `segundo_apellido`) VALUES
(1, 'Arellano A', 'ARMANDO VICENTE', 'ARELLANO', 'BLANCAS'),
(2, 'PEINADO J', 'JOSE LUIS', 'PEINADO', 'MARTINEZ'),
(3, 'PEREZ R', 'RICARDO', 'PEREZ', 'SANTELLANA'),
(4, 'RASCON A', 'ANA ERENDIRA', 'RASCON', 'VILLANUEVA'),
(5, 'ROJO E', 'ERICK', 'ROJO', 'SIMENTAL'),
(6, 'SALCIDO B', 'BRENDA MARCELA', 'SALCIDO', 'TRILLO'),
(9, 'VILLASENOR D', 'DIANA ELIZABETH', 'VILLASENOR', 'HERNANDEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomenclatura` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(100) DEFAULT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `director` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `director` (`director`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nomenclatura`, `nombres`, `primer_apellido`, `segundo_apellido`, `correo`, `director`) VALUES
(2, 'Naranjo O', 'Oscar', 'Naranjo', 'Garcia', 'ejemplo@ejemplo.com', 1),
(3, 'Aburto J', 'Justinos', 'Aburto', 'Huerta', 'ejemplo@ejemplo.com', 5),
(4, 'Aguirre ME', 'Martha Elisa', 'Aguirre', 'Coronado', '', 5),
(5, 'Morales A', 'Ana Ivonne', 'Morales', 'Cervantes', '', 6),
(6, 'Martinez M', 'Monica Sofia', 'Martinez', 'Vera', '', 6),
(7, 'Castrejon E', 'Elizabeth', 'Castrejon', 'Robles', '', 9),
(8, 'Alemán G', 'Guillermo', 'Alemán ', 'Rodríguez', '', 5),
(9, 'Astorga J', 'Jesús Ramón', 'Astorga', 'Barreda', '', 5),
(10, 'Urtuzuasteg', 'Rafael', 'Urtuzuastegui', 'Arzola', '', 1),
(11, 'Hernández C', 'Carlos', 'Hernández', 'Díaz', '', 1),
(12, 'Durán Mi', 'Miriam Andrea', 'Durán', 'Mercado', '', 1),
(13, 'Gutiérrez J', 'Jorge Alberto', 'Gutiérrez', 'Ibarra', '', 1),
(14, 'Alvarado G', 'Guadalupe', 'Alvarado', 'Bañuelos', '', 1),
(15, 'Guzmán A', 'Adolfo Pedro', 'Guzmán', 'Ramírez', '', 1),
(16, 'Vega L', 'Luis Carlos', 'Vega', 'Salas', '', 1),
(17, 'Soto O', 'Oscar Germán', 'Soto', 'Flores', '', 1),
(18, 'Cardenas A', 'Ángel Hiram', 'Cardenas', 'Rocha', '', 9),
(19, 'Holguín J', 'Jesús Armando', 'Holguín', 'López', '', 1),
(20, 'Ricarte H', 'Héctor Emilio', 'Ricarte', 'Cano', '', 1),
(21, 'Lira D', 'David', 'Lira', 'Molina', '', 1),
(22, 'Vidal R', 'Rafael', 'Vidal', 'Herrera', '', 2),
(23, 'Solorzano M', 'Miguel Ángel', 'Solorzano', 'Hernández', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisiones`
--

DROP TABLE IF EXISTS `revisiones`;
CREATE TABLE IF NOT EXISTS `revisiones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `turno` varchar(10) NOT NULL,
  `aula` varchar(10) DEFAULT NULL,
  `hora_inicio` varchar(10) DEFAULT NULL,
  `hora_final` varchar(10) DEFAULT NULL,
  `profesor` int DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `reporte` varchar(50) DEFAULT NULL,
  `revision_1` varchar(10) NOT NULL,
  `revision_2` varchar(10) NOT NULL,
  `revision_3` varchar(10) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profesor` (`profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `revisiones`
--

INSERT INTO `revisiones` (`id`, `fecha`, `turno`, `aula`, `hora_inicio`, `hora_final`, `profesor`, `grupo`, `reporte`, `revision_1`, `revision_2`, `revision_3`, `observaciones`) VALUES
(2, '2023-10-31', 'T.V', 'H008', '06:00 p.m.', '07:00 p.m.', 2, 'idsw51', 'Falta', '17:16', '17:28', '17:55', 'No llego'),
(3, '2023-10-02', 'T.V', 'D004', '05:00 p.m.', '06:00 p.m.', 2, 'PIM16', 'Falta', '17:12', '17:39', '17:51', 'No se presento'),
(4, '2023-10-02', 'T.V', 'H008', '07:00 p.m.', '08:00 p.m.', 20, 'idsw51', 'Falta', '17:11', '17:35', '17:48', 'No se presento al aula'),
(5, '2023-10-03', 'T.V', 'D004', '07:00 p.m.', '09:00 p.m.', 12, 'PIM16', 'Salida antes', '19:13', '19:49', '20:55', 'Ya no se encontró en el aula'),
(6, '2023-10-04', 'T.V', 'D004', '06:00 p.m.', '08:00 p.m.', 3, 'PIM16', 'Retardo', '18:13', '19:09', '19:53', 'Llego a la segunda revisión '),
(7, '2023-10-05', 'T.V', 'H008', '05:00 p.m.', '06:00 p.m.', 20, 'idsw51', 'Retardo', '17:13', '17:38', '17:58', 'A la tercera revisión ya se encontraba en el aula '),
(8, '2023-10-06', 'T.V', 'D008', '07:00 p.m.', '08:00 p.m.', 2, 'idsw51', 'Falta', '19:16', '19:35', '19:55', 'No se presento '),
(9, '2023-10-06', 'T.V', 'I107', '09:00 p.m.', '10:00 p.m.', 2, 'idsw51', 'Salida antes', '21:17', '21:34', '21:54', 'Ya no se encontró en el aula '),
(10, '2023-10-02', 'T.V', 'J006', '06:00 p.m.', '08:00 p.m.', 15, 'tdw51', 'Falta', '18:15', '18:57', '19:53', 'No llego'),
(11, '2023-10-03', 'T.V', 'H114', '05:00 p.m.', '06:00 p.m.', 5, 'idsw11', 'Retardo', '17:15', '17:37', '17:46', 'En la segunda revisión ya se encontraba en el aula'),
(12, '2023-10-04', 'T.V', 'I001', '07:00 p.m.', '08:00 p.m.', 10, 'PIM16', 'Salida antes', '19:11', '19:35', '19:52', 'Ya no se encontró en el aula'),
(13, '2023-10-06', 'T.V', 'I107', '09:00 p.m.', '10:00 p.m.', 22, 'tdw51', 'Falta', '21:11', '21:32', '21:49', 'No llego'),
(14, '2023-10-05', 'T.V', 'I114', '07:00 p.m.', '08:00 p.m.', 20, 'idsw51', 'Falta', '19:12', '19:35', '19:58', 'No se presento al aula '),
(15, '2023-10-06', 'T.V', 'I107', '06:00 p.m.', '07:00 p.m.', 2, 'idsw11', 'Salida antes', '18:15', '18:23', '18:51', 'Dejo salir antes al grupo'),
(16, '2023-10-06', 'T.V', 'J008', '07:00 p.m.', '09:00 p.m.', 4, 'idsw11', 'Retardo', '19:17', '19:49', '20:51', 'Llego tarde'),
(17, '2023-10-06', 'T.V', 'I107', '05:00 p.m.', '06:00 p.m.', 6, 'PIM16', 'Salida antes', '17:18', '17:36', '17:57', 'Salió antes ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contrasena`) VALUES
(1, 'Javier', 'Valdez', 'al22220282@utcj.edu.mx', '$2y$10$LasVLB0EFo/.ZYK4e6U5NePIB3KneqGP4Fmf98mCoK0bYJjUOHVBu'),
(3, 'Javier', 'Valdez', 'jav.valdez@hotmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `carreras_ibfk_1` FOREIGN KEY (`nom_dir`) REFERENCES `dir_de_carrera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`director`) REFERENCES `dir_de_carrera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD CONSTRAINT `revisiones_ibfk_1` FOREIGN KEY (`profesor`) REFERENCES `profesores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
