-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-11-2023 a las 20:56:42
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id`, `aula`) VALUES
(17, 'H008'),
(15, 'I107'),
(16, 'D004');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nom_car`, `nombre`, `nom_dir`) VALUES
(3, 'IER', 'INGENIERIA EN ENERGIAS RENOVABLES', 11);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `dir_de_carrera`
--

INSERT INTO `dir_de_carrera` (`id`, `nom_dir`, `nombres`, `primer_apellido`, `segundo_apellido`, `correo`, `password`) VALUES
(2, 'Peinado J', 'Jose Luis', 'Peinado', 'Martinez', 'jose_peinado@utcj.edu.mx', ''),
(4, 'Rascon A', 'ANA ERENDIRA', 'RASCON', 'VILLANUEVA', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e'),
(6, 'SALCIDO B', 'BRENDA MARCELA', 'SALCIDO', 'TRILLO', 'brenda_salcido@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(9, 'VILLASENOR D', 'DIANA ELIZABETH', 'VILLASENOR', 'HERNANDEZ', 'diana_villasenor@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(11, 'Arellano A', 'Armando Vicente', 'Arellano', 'Blancas', 'armando_arellano@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(12, 'Rojo E', 'Erick', 'Rojo', 'Simental', 'erick_rojo@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(16, 'Perez R', 'Ricardo', 'Perez', 'Santellana', 'ricardo_perez@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grupo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `grupo`) VALUES
(6, 'MTW31'),
(5, 'PIM16');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nomenclatura`, `nombres`, `primer_apellido`, `segundo_apellido`, `correo`, `director`) VALUES
(3, 'Aburto J', 'Justino', 'Aburto', 'Huerta', 'aburto_justino@utcj.edu.mx', 12),
(4, 'Aguirre ME', 'Martha Elisa', 'Aguirre', 'Coronado', '', 12),
(5, 'Morales A', 'Ana Ivonne', 'Morales', 'Cervantes', '', 6),
(6, 'Martinez M', 'Monica Sofia', 'Martinez', 'Vera', '', 6),
(7, 'Castrejon E', 'Elizabeth', 'Castrejon', 'Robles', '', 9),
(8, 'Alemán G', 'Guillermo', 'Alemán ', 'Rodríguez', '', 12),
(9, 'Astorga J', 'Jesús Ramón', 'Astorga', 'Barreda', '', 12),
(18, 'Cardenas A', 'Ángel Hiram', 'Cardenas', 'Rocha', '', 9),
(22, 'Vidal R', 'Rafael', 'Vidal', 'Herrera', '', 2),
(24, 'Naranjo O', 'Oscar', 'Naranjo', 'Garcia', 'oscar_naranjo@utcj.edu.mx', 11),
(32, 'Ricarte H', 'Hector Emilio', 'Ricarte', 'Cano', 'hector_ricarte@utcj.edu.mx', 11);

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
  `revision_4` varchar(10) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  `justificado` varchar(2) NOT NULL,
  `comentarios` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profesor` (`profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `revisiones`
--

INSERT INTO `revisiones` (`id`, `fecha`, `turno`, `aula`, `hora_inicio`, `hora_final`, `modalidad`, `profesor`, `grupo`, `reporte`, `revision_1`, `revision_2`, `revision_3`, `revision_4`, `observaciones`, `justificado`, `comentarios`) VALUES
(6, '2023-10-04', 'T.V', 'D004', '06:00 p.m.', '08:00 p.m.', 'linea', 3, 'PIM16', 'Dejo Actividad', '18:13', '19:09', '19:53', '20:00', 'Dejo trabajo por teams', 'no', ''),
(11, '2023-10-03', 'T.V', 'H114', '05:00 p.m.', '06:00 p.m.', 'linea', 5, 'idsw11', 'No conectado', '17:15', '17:37', '17:46', '17:57', 'No se conecto durante el horario de clase', 'no', ''),
(13, '2023-10-06', 'T.V', 'I107', '09:00 p.m.', '10:00 p.m.', 'presencial', 22, 'tdw51', 'Falta', '21:11', '21:32', '21:49', '', 'No llego', 'no', ''),
(16, '2023-10-06', 'T.V', 'J008', '07:00 p.m.', '09:00 p.m.', 'presencial', 4, 'idsw11', 'Retardo', '19:17', '19:49', '20:51', '', 'Llego tarde', 'si', 'Problemas con su vehículo '),
(17, '2023-10-06', 'T.V', 'I107', '05:00 p.m.', '06:00 p.m.', 'presencial', 6, 'PIM16', 'Salida antes', '17:18', '17:36', '17:57', '', 'Salió antes ', 'no', ''),
(18, '2023-11-06', 'T.V', 'D004', '06:00 p.m.', '08:00 p.m.', 'presencial', 24, 'idsw51', 'Falta', '18:07', '18:30', '18:50', '', 'No se presento', 'si', 'Enfermo'),
(19, '2023-11-08', 'T.V', 'H008', '06:00 p.m.', '07:00 p.m.', 'presencial', 24, 'idsw51', 'Salida antes', '18:13', '18:32', '18:55', '', 'Ya no se encontraba en el aula ', 'si', 'Salió de emergencia'),
(20, '2023-11-09', 'T.V', 'N/A', '11:00 a.m.', '01:00 p.m.', 'Linea', 24, 'PIM16', 'No conectado', '11:17', '11:41', '12:18', '12:47', 'Sin conexión ', 'si', 'Sin luz'),
(23, '2023-11-10', 'T.V', 'H114', '05:00 p.m.', '06:00 p.m.', 'presencial', 24, 'idsw51', 'Retardo', '18:22', '18:33', '18:57', '', 'Llego hasta la segunda revision ', 'si', 'Entrada a la universidad saturada, mucho trafico'),
(25, '2023-11-13', 'T.V', 'H114', '05:00 p.m.', '06:00 p.m.', 'presencial', 9, 'tdw41', 'Falta', '17:08', '17:31', '17:56', '', 'Dio la clase libre', 'no', ''),
(26, '2023-11-13', 'T.V', 'D004', '08:00 p.m.', '09:00 p.m.', 'presencial', 7, 'PIM16', 'Salida antes', '20:19', '20:35', '20:52', '', 'En la tercer revision ya no estaba', 'no', ''),
(27, '2023-11-13', 'T.V', 'J006', '05:00 p.m.', '07:00 p.m.', 'presencial', 8, 'idsw11', 'Retardo', '17:09', '17:25', '17:55', '', 'Iba llegando a la segunda revision', 'no', ''),
(28, '2023-11-13', 'T.V', 'D004', '08:00 p.m.', '09:00 p.m.', 'presencial', 5, 'tdw41', 'Salida antes', '20:10', '20:32', '20:58', '', 'Ya no se encontro en la tercer revision', 'si', 'Tuvo que salir de emergencia'),
(29, '2023-11-13', 'T.M', 'N/A', '09:00 a.m.', '11:00 a.m.', 'Linea', 18, 'PIM16', 'Sin Alumnos', '09:10', '09:54', '10:34', '10:56', 'Dio clase libre', 'no', ''),
(31, '2023-11-13', 'T.M', 'N/A', '10:00 a.m.', '12:00 p.m.', 'Linea', 5, 'PIM16', 'Otro', '10:12', '10:46', '11:32', '11:58', 'Reunion con director', 'si', 'Se tuvo una reunion de emergencia '),
(32, '2023-11-14', 'T.V', 'H008', '06:00 p.m.', '07:00 p.m.', 'presencial', 24, 'idsw11', 'Falta', '18:16', '18:42', '18:58', '', 'No se presento', 'si', 'Se encontraba en las graduaciones'),
(33, '2023-11-14', 'T.V', 'H008', '06:00 p.m.', '07:00 p.m.', 'presencial', 7, 'tdw51', 'Retardo', '18:08', '18:33', '18:56', '', 'Llego a la segunda revision', 'si', 'Saturacion vehicular en la entrada'),
(34, '2023-11-14', 'T.M', 'N/A', '08:00 a.m.', '10:00 a.m.', 'Linea', 18, 'PIM16', 'Otro', '08:26', '08:45', '09:30', '09:53', 'No tenia servicio de electricidad', 'no', ''),
(35, '2023-11-14', 'T.M', 'N/A', '01:00 p.m.', '03:00 p.m.', 'Linea', 7, 'PIM16', 'No conectado', '13:28', '13:54', '14:29', '14:52', 'No se conecto ', 'si', 'No contaba con servicio electrico '),
(36, '2023-11-16', 'T.V', 'I107', '08:00 p.m.', '09:00 p.m.', 'presencial', 32, 'idsw11', 'Falta', '20:14', '20:36', '20:55', '', 'No se presento al aula', 'si', 'Tuvo que salir temprano'),
(37, '2023-11-16', 'T.M', 'N/A', '09:00 a.m.', '11:00 a.m.', 'Linea', 32, 'PIM16', 'Dejo Actividad', '09:14', '09:53', '10:35', '10:56', 'No dio clase, solo dejo trabajo', 'si', 'El trabajo era un examen'),
(38, '2023-11-16', 'T.M', 'N/A', '11:00 a.m.', '01:00 p.m.', 'Linea', 24, 'PIM16', 'No conectado', '11:20', '11:50', '12:33', '12:59', 'No se conecto durante la clase', 'si', 'Sin servicio de luz'),
(39, '2023-11-17', 'T.V', 'H114', '05:00 p.m.', '06:00 p.m.', 'presencial', 5, 'tdw51', 'Falta', '17:18', '17:36', '17:58', '', 'No se presento ', 'no', ''),
(40, '2023-11-17', 'T.M', 'N/A', '09:00 a.m.', '11:00 a.m.', 'linea', 3, 'MTW31', 'Entro y Salio', '09:10', '09:56', '10:25', '10:58', 'Entro unos minutos y ya no se conecto', 'no', ''),
(42, '2023-11-24', 'T.V', 'H008', '07:00 p.m.', '08:00 p.m.', 'presencial', 32, 'idsw11', 'Salida antes', '19:15', '19:31', '19:56', '', 'En la tercer revision ya se habia retirado', 'si', 'Problema familiar'),
(43, '2023-11-24', 'T.V', 'D004', '06:00 p.m.', '07:00 p.m.', 'presencial', 7, 'PIM16', 'Falta', '18:20', '18:39', '18:58', '', 'No llego a clase', 'no', ''),
(44, '2023-11-24', 'T.M', 'D008', '08:00 a.m.', '10:00 a.m.', 'presencial', 9, 'PIM16', 'Retardo', '08:30', '08:59', '09:45', '', 'Llego 30 min tarde', 'no', ''),
(45, '2023-11-24', 'T.M', 'N/A', '09:00 a.m.', '11:00 a.m.', 'linea', 8, 'MTW31', 'No conectado', '09:22', '09:59', '10:36', '10:58', 'No se conecto en las 2 horas', 'no', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contrasena`) VALUES
(1, 'Javier', 'Valdez', 'al22220282@utcj.edu.mx', '$2y$10$LasVLB0EFo/.ZYK4e6U5NePIB3KneqGP4Fmf98mCoK0bYJjUOHVBu'),
(3, 'Javier', 'Valdez', 'jav.valdez@hotmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(5, 'Arellano A', 'Arellano', 'armando.arellano@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(6, 'Rojo E', 'Rojo', 'erick.rojo@utcj.edu.mx', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
(7, 'Francisco', 'Barrios', 'f.valdezbarrios@icloud.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413');

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
