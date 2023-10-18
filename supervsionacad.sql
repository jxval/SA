-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-10-2023 a las 23:31:16
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
  `nom_car` varchar(50) NOT NULL,
  `nombre` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_dir` varchar(50) NOT NULL,
  KEY `nom_dir` (`nom_dir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`nom_car`, `nombre`, `nom_dir`) VALUES
('ER', 'ENERGIAS RENOVABLES', 'PEINADO J'),
('IER', 'INGENIERIA EN ENERGIAS RENIVABLES', 'PEINADO J'),
('MSI', 'MAESTRIA EN INGENIERIA DE SISTEMAS INDUSTRIALES SUSTENTABLES', 'PEINADO J'),
('MT', 'MECATRONICA AREA SISTEMAS DE MANUFACTURA FLEXIBLE', 'PEINADO J'),
('MS', 'MECATRONICA AREA AUTOMATIZACION', 'PEINADO J'),
('IMT', 'INGENIERIA EN MECATRONICA', 'PEINADO J'),
('OC', 'OPERACIONES COMERCIALES INTERNACIONALES AREA CLASIFICACION ARANCELARIA Y DESPACHOADUANERO', 'ROJO E'),
('ILI', 'INGENIERIA EN LOGISTICA INTERNACIONAL', 'ROJO E'),
('MLNS', 'MAESTRIA EN LOGISTICA Y NEGOCIOS SUSTENTABLES', 'ROJO E'),
('MI', 'MANTENIMIENTO INDUSTRIAL', 'PEREZ R'),
('IMI', 'INGENIERIA EN MANTENIMIENTO INDUSTRIAL', 'PEREZ R'),
('NT', 'NANOTEGNOLOGIA', 'PEREZ R'),
('INT', 'INGENIERIA EN NANOTEGNOLOGIA', 'PEREZ R'),
('TD', 'TECNOLOGIAS DE LA INFORMACION AREA DESARROLLO DE SOFTWARE', 'ARELLANO A'),
('TR', 'TECNOLOGIAS DE LA INFORMACION AREA REDES', 'ARELLANO A'),
('IRC', 'INGENIERIA EN REDES INTELIGENTES Y CIBERSEGURIDAD', 'ARELLANO A'),
('IDS', 'INGENIERIA EN DESARROLLO Y GESTION DE SOFTWARE', 'ARELLANO A'),
('PI', 'PROCESOS INDUSTRIALES', 'ARELLANO A'),
('IPI', 'INGENIERIA EN PROCESOS Y OPERACIONES INDUSTRIALES', 'ARELLANO A'),
('DN', 'DESARROLLO DE NEGOCIOS AREA MERCADOTECNIA', 'SALCIDO B'),
('LIN', 'LICENCIATURA EN INNOVACION DE NEGOCIOS Y MERCADOTECNIA', 'SALCIDO B'),
('CD', 'CONTADURIA', 'SALCIDO B'),
('LCD', 'LICENCIATURA EN CONTADURIA', 'SALCIDO B'),
('PM', 'PARAMEDICO', 'RASCON A'),
('TF', 'TERAPIA FISICA', 'RASCON A'),
('LPC', 'LICENCIATURA EN PROTECCION CIVIL', 'RASCON A'),
('LTF', 'LICENCIATURA EN TERAPIA FISICA', 'RASCON A'),
('INC', 'INGLES', 'VILLASENOR D'),
('test', 'test', 'test'),
('test3', 'test3', 'test2'),
('test4', 'test4', 'test2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dir_de_carrera`
--

DROP TABLE IF EXISTS `dir_de_carrera`;
CREATE TABLE IF NOT EXISTS `dir_de_carrera` (
  `nom_dir` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) NOT NULL,
  PRIMARY KEY (`nom_dir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `dir_de_carrera`
--

INSERT INTO `dir_de_carrera` (`nom_dir`, `nombres`, `primer_apellido`, `segundo_apellido`) VALUES
('', '', '', ''),
('ARELLANO A', 'ARMANDO VICENTE', 'ARELLANO', 'BLANCAS'),
('PEINADO J', 'JOSE LUIS', 'PEINADO', 'MARTINEZ'),
('PEREZ R', 'RICARDO', 'PEREZ', 'SANTELLANA'),
('RASCON A', 'ANA ERENDIRA', 'RASCON', 'VILLANUEVA'),
('ROJO E', 'ERICK', 'ROJO', 'SIMENTAL'),
('SALCIDO B', 'BRENDA MARCELA', 'SALCIDO', 'TRILLO'),
('test', 'test', 'test', 'test'),
('test2', 'test2', 'test2', 'test2'),
('VILLASENOR D', 'DIANA ELIZABETH', 'VILLASENOR', 'HERNANDEZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

DROP TABLE IF EXISTS `maestros`;
CREATE TABLE IF NOT EXISTS `maestros` (
  `clave` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `primer_apellido` varchar(50) DEFAULT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `id` int NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `director` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`clave`),
  KEY `director` (`director`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`clave`, `nombres`, `primer_apellido`, `segundo_apellido`, `id`, `correo`, `director`) VALUES
('ABURTO J', 'JUSTINO', 'ABURTO', 'HUERTA', 2160, '', 'ROJO E'),
('ALVARADO G', 'GUADALUPE', 'ALVARADO', 'BANUELOS', 1379, '', 'ARELLANO A'),
('AVILA G', 'GERARDO AURELIO', 'AVILA', 'CANO', 1393, '', 'PEREZ R'),
('NARANJO O', 'OSCAR', 'NARANJO', 'GARCIA', 1603, '', 'ARELLANO A'),
('RODRIGUEZ ME', 'MARIA ELENA', 'RODRIGUEZ', 'GRANILLO', 2114, '', 'PEINADO J');

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
  `director` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `director` (`director`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nomenclatura`, `nombres`, `primer_apellido`, `segundo_apellido`, `correo`, `director`) VALUES
(1, 'Aburto J', 'Aburto', 'Huerta', 'Justino', '', 'rojo e');

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
  `hora_inicio` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hora_final` varchar(10) NOT NULL,
  `profesor` varchar(50) DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `reporte` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `revision_1` varchar(10) NOT NULL,
  `revision_2` varchar(10) NOT NULL,
  `revision_3` varchar(10) NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profesor` (`profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `revisiones`
--

INSERT INTO `revisiones` (`id`, `fecha`, `turno`, `aula`, `hora_inicio`, `hora_final`, `profesor`, `grupo`, `reporte`, `revision_1`, `revision_2`, `revision_3`, `observaciones`) VALUES
(1, '2023-10-03', '', '1233', '00:00:00', '00:00:00', 'RODRIGUEZ ME', 'wqqqw', 'test', '00:00:06', '00:00:07', '00:00:08', 'qqwwqw'),
(3, '2023-10-03', '', '1233', '00:00:00', '00:00:00', 'RODRIGUEZ ME', 'wqqqw', '', '00:00:00', '00:00:00', '00:00:00', ''),
(4, '2023-10-03', '', '1233', '00:00:00', '00:00:00', 'RODRIGUEZ ME', 'wqqqw', 'Falta', '00:00:06', '00:00:07', '00:00:08', 'qqwwqw'),
(5, '2023-10-03', '', '1233', '00:00:00', '00:00:00', 'RODRIGUEZ ME', 'wqqqw', 'Retardo', '00:00:06', '00:00:07', '00:00:08', 'qqwwqw'),
(6, '2023-10-03', '', '1233', '00:00:00', '00:00:00', 'RODRIGUEZ ME', 'wqqqw', 'Salida Antes', '00:00:06', '00:00:07', '00:00:08', 'qqwwqw'),
(8, '2023-10-03', '', '1233', '00:00:00', '00:00:00', 'RODRIGUEZ ME', 'wqqqw', 'Retardo', '00:00:06', '00:00:07', '00:00:08', 'qqwwqw'),
(9, '0000-00-00', '', '1233', '00:00:00', '00:00:00', 'ABURTO J', 'wqqqw', 'Salida Antes', '00:00:06', '00:00:07', '00:00:08', ''),
(10, '2023-10-03', '', '1233', '', '00:00:00', 'NARANJO O', 'wqqqw', 'Retardo', '7:15', '7:45', '8:00', 'qqwwqw'),
(11, '2023-10-03', '', '1233', '12:00', '13:00', 'AVILA G', 'wqqqw', 'Retardo', '7:15', '7:45', '8:00', 'qqwwqw'),
(12, '2023-10-09', '', '1233', '7:00', '8:00', 'RODRIGUEZ ME', 'wqqqw', 'Falta', '7:15', '7:45', '8:00', 'qqwwqw'),
(13, '2023-10-09', 'T.V', '1233', '7:00', '8:00', 'ABURTO J', 'wqqqw', 'Falta', '7:15', '7:45', '8:00', 'qqwwqw'),
(14, '2023-10-17', 'T.V', 'H008', '17:00', '18:00', 'NARANJO O', 'idsw51', 'Falta', '17:05', '17:15', '17:35', 'No llego'),
(15, '2023-10-18', 'T.V', 'H008', '17:00', '19:00', 'Aburto J', 'idsw51', 'Retardo', '17:05', '17:15', '17:35', 'Retardo');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `carreras_ibfk_1` FOREIGN KEY (`nom_dir`) REFERENCES `dir_de_carrera` (`nom_dir`);

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`director`) REFERENCES `dir_de_carrera` (`nom_dir`);

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`director`) REFERENCES `dir_de_carrera` (`nom_dir`);

--
-- Filtros para la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD CONSTRAINT `revisiones_ibfk_1` FOREIGN KEY (`profesor`) REFERENCES `maestros` (`clave`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
