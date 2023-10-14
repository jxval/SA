-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-10-2023 a las 01:01:04
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
('INC', 'INGLES', 'VILLASENOR D');

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
('ARELLANO A', 'ARMANDO VICENTE', 'ARELLANO', 'BLANCAS'),
('PEINADO J', 'JOSE LUIS', 'PEINADO', 'MARTINEZ'),
('PEREZ R', 'RICARDO', 'PEREZ', 'SANTELLANA'),
('RASCON A', 'ANA ERENDIRA', 'RASCON', 'VILLANUEVA'),
('ROJO E', 'ERICK', 'ROJO', 'SIMENTAL'),
('SALCIDO B', 'BRENDA MARCELA', 'SALCIDO', 'TRILLO'),
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisiones`
--

DROP TABLE IF EXISTS `revisiones`;
CREATE TABLE IF NOT EXISTS `revisiones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `aula` varchar(10) DEFAULT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `profesor` varchar(50) DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `revision_1` time NOT NULL,
  `revision_2` time NOT NULL,
  `revision_3` time NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profesor` (`profesor`)
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
-- Filtros para la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD CONSTRAINT `revisiones_ibfk_1` FOREIGN KEY (`profesor`) REFERENCES `maestros` (`clave`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
