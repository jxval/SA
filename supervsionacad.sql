-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-11-2023 a las 00:31:36
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
-- Estructura de tabla para la tabla `aulas`
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `aula` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `aula`) VALUES
(11, 'H008');

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
  `correo` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `dir_de_carrera`
--

INSERT INTO `dir_de_carrera` (`id`, `nom_dir`, `nombres`, `primer_apellido`, `segundo_apellido`, `correo`, `password`) VALUES
(2, 'PEINADO J', 'JOSE LUIS', 'PEINADO', 'MARTINEZ', '', ''),
(3, 'PEREZ R', 'RICARDO', 'PEREZ', 'SANTELLANA', '', ''),
(4, 'RASCON A', 'ANA ERENDIRA', 'RASCON', 'VILLANUEVA', '', ''),
(5, 'ROJO E', 'ERICK', 'ROJO', 'SIMENTAL', 'erick.rojo@utcj.edu.mx', '123456'),
(6, 'SALCIDO B', 'BRENDA MARCELA', 'SALCIDO', 'TRILLO', '', ''),
(9, 'VILLASENOR D', 'DIANA ELIZABETH', 'VILLASENOR', 'HERNANDEZ', '', ''),
(10, 'Arellano A', 'Armando Vicente', 'Arellano', 'Blancas', 'arellano_blancas@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(11, '', '', '', '', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grupo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `grupo`) VALUES
(2, 'MTW31');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nomenclatura`, `nombres`, `primer_apellido`, `segundo_apellido`, `correo`, `director`) VALUES
(3, 'Aburto J', 'Justino', 'Aburto', 'Huerta', 'ejemplo@ejemplo.com', 5),
(4, 'Aguirre ME', 'Martha Elisa', 'Aguirre', 'Coronado', '', 5),
(5, 'Morales A', 'Ana Ivonne', 'Morales', 'Cervantes', '', 6),
(6, 'Martinez M', 'Monica Sofia', 'Martinez', 'Vera', '', 6),
(7, 'Castrejon E', 'Elizabeth', 'Castrejon', 'Robles', '', 9),
(8, 'Alemán G', 'Guillermo', 'Alemán ', 'Rodríguez', '', 5),
(9, 'Astorga J', 'Jesús Ramón', 'Astorga', 'Barreda', '', 5),
(18, 'Cardenas A', 'Ángel Hiram', 'Cardenas', 'Rocha', '', 9),
(22, 'Vidal R', 'Rafael', 'Vidal', 'Herrera', '', 2),
(24, 'Naranjo O', 'Oscar', 'Naranjo', 'Garcia', 'ejemplo@ejemplo.com', 10);

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
  `modalidad` varchar(50) NOT NULL,
  `profesor` int DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `reporte` varchar(50) DEFAULT NULL,
  `revision_1` varchar(10) NOT NULL,
  `revision_2` varchar(10) NOT NULL,
  `revision_3` varchar(10) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  `justificado` varchar(2) NOT NULL,
  `comentarios` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profesor` (`profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `revisiones`
--

INSERT INTO `revisiones` (`id`, `fecha`, `turno`, `aula`, `hora_inicio`, `hora_final`, `modalidad`, `profesor`, `grupo`, `reporte`, `revision_1`, `revision_2`, `revision_3`, `observaciones`, `justificado`, `comentarios`) VALUES
(6, '2023-10-04', 'T.V', 'D004', '06:00 p.m.', '08:00 p.m.', '', 3, 'PIM16', 'Retardo', '18:13', '19:09', '19:53', 'Llego a la segunda revisión ', '', ''),
(11, '2023-10-03', 'T.V', 'H114', '05:00 p.m.', '06:00 p.m.', '', 5, 'idsw11', 'Retardo', '17:15', '17:37', '17:46', 'En la segunda revisión ya se encontraba en el aula', '', ''),
(13, '2023-10-06', 'T.V', 'I107', '09:00 p.m.', '10:00 p.m.', '', 22, 'tdw51', 'Falta', '21:11', '21:32', '21:49', 'No llego', '', ''),
(16, '2023-10-06', 'T.V', 'J008', '07:00 p.m.', '09:00 p.m.', '', 4, 'idsw11', 'Retardo', '19:17', '19:49', '20:51', 'Llego tarde', '', ''),
(17, '2023-10-06', 'T.V', 'I107', '05:00 p.m.', '06:00 p.m.', '', 6, 'PIM16', 'Salida antes', '17:18', '17:36', '17:57', 'Salió antes ', '', ''),
(18, '2023-11-06', 'T.V', 'D004', '06:00 p.m.', '08:00 p.m.', '', 4, 'idsw51', 'Falta', '18:07', '18:30', '18:50', 'No se presento', '', ''),
(19, '2023-11-08', 'T.M', 'N/A', '06:00 p.m.', '07:00 p.m.', 'Lineal', 6, 'IDSW11', 'Retardo', '18:12', '18:39', '18:50', 'No se conecto el professor ', '', ''),
(20, '2023-11-08', 'T.V', 'N/A', '06:00 p.m.', '07:00 p.m.', 'Lineal', 6, 'IDSW11', 'Falta', '18:15', '18:31', '18:51', 'Paso lista y dejo actividad', '', ''),
(21, '2023-11-08', 'T.V', 'N/A', '06:00 p.m.', '07:00 p.m.', 'Linea', 6, 'IDSW11', 'Falta', '18:15', '18:31', '18:51', 'Paso lista y dejo actividad', '', ''),
(22, '2023-11-08', 'T.M', 'N/A', '10:00 a.m.', '11:00 a.m.', 'Linea', 8, 'IDSW51', 'Sin Alumnos', '10:15', '10:30', '10:49', 'Los alumnos no se conectaron', '', ''),
(26, '2023-11-08', 'T.M', 'N/A', '10:00 a.m.', '11:00 a.m.', 'Linea', 8, 'IDSW51', 'Sin Alumnos', '10:15', '10:30', '10:49', 'Los alumnos no se conectaron', '', ''),
(27, '2023-11-08', 'T.V', 'N/A', '11:00 a.m.', '12:00 p.m.', 'Linea', 7, 'MTW31', 'Otro', '11:15', '11:30', '11:47', 'El profesor no cuenta con internet', '', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contrasena`) VALUES
(1, 'Javier', 'Valdez', 'al22220282@utcj.edu.mx', '$2y$10$LasVLB0EFo/.ZYK4e6U5NePIB3KneqGP4Fmf98mCoK0bYJjUOHVBu'),
(3, 'Javier', 'Valdez', 'jav.valdez@hotmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(5, 'Arellano A', 'Arellano', 'armando.arellano@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(6, 'Rojo E', 'Rojo', 'erick.rojo@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');

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
