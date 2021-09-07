-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2021 a las 00:36:34
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_empleados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `idp` int(11) NOT NULL COMMENT 'primary key',
  `personal_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'personal nombre',
  `personal_edad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'personal edad',
  `personal_salario` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'personal salario',
  `fecha` date NOT NULL DEFAULT '2020-12-14'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='tabla personal';

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idp`, `personal_nombre`, `personal_edad`, `personal_salario`, `fecha`) VALUES
(1, 'Tiger Nixon', '61', '320800', '2020-12-14'),
(2, 'Garrett Winters', '63', '170750', '2020-12-14'),
(3, 'Ashton Cox', '66', '86000', '2020-12-14'),
(4, 'Cedric Kelly', '22', '433060', '2020-12-14'),
(6, 'Brielle Williamson', '61', '372000', '2020-12-14'),
(7, 'Herrod Chandler', '59', '137500', '2020-12-14'),
(8, 'Rhona Davidson', '55', '327900', '2020-12-14'),
(9, 'Colleen Hurst', '39', '205500', '2020-12-14'),
(10, 'Sonya Frost', '23', '103600', '2020-12-14'),
(11, 'Jena Gaines', '30', '90560', '2020-12-14'),
(12, 'Quinn Flynn', '22', '342000', '2020-12-14'),
(13, 'Charde Marshall', '36', '470600', '2020-12-14'),
(14, 'Haley Kennedy', '43', '313500', '2020-12-14'),
(15, 'Tatyana Fitzpatrick', '19', '385750', '2020-12-14'),
(16, 'Michael Silva', '66', '198500', '2020-12-14'),
(17, 'Paul Byrd', '64', '725000', '2020-12-14'),
(18, 'Gloria Little', '59', '237500', '2020-12-14'),
(19, 'Bradley Greer', '41', '132000', '2020-12-14'),
(20, 'Dai Rios', '35', '217500', '2020-12-14'),
(21, 'Jenette Caldwell', '30', '345000', '2020-12-14'),
(22, 'Yuri Berry', '40', '675000', '2020-12-14'),
(23, 'Caesar Vance', '21', '106450', '2020-12-14'),
(24, 'Doris Wilder', '23', '85600', '2020-12-14'),
(25, 'Angelica Ramos', '47', '1200000', '2020-12-14'),
(26, 'Gavin Joyce', '42', '92575', '2020-12-14'),
(27, 'Jennifer Chang', '28', '357650', '2020-12-14'),
(28, 'Brenden Wagner', '28', '206850', '2020-12-14'),
(29, 'Fiona Green', '48', '850000', '2020-12-14'),
(30, 'Shou Itou', '20', '163000', '2020-12-14'),
(31, 'Michelle House', '37', '95400', '2020-12-14'),
(32, 'Suki Burks', '53', '114500', '2020-12-14'),
(33, 'Prescott Bartlett', '27', '145000', '2020-12-14'),
(34, 'Gavin Cortez', '22', '235500', '2020-12-14'),
(35, 'Martena Mccray', '46', '324050', '2020-12-14'),
(36, 'Unity Butler', '47', '85675', '2020-12-14'),
(37, 'Howard Hatfield', '51', '164500', '2020-12-14'),
(38, 'Hope Fuentes', '41', '109850', '2020-12-14'),
(39, 'Vivian Harrell', '62', '452500', '2020-12-14'),
(40, 'Timothy Mooney', '37', '136200', '2020-12-14'),
(41, 'Jackson Bradshaw', '65', '645750', '2020-12-14'),
(42, 'Olivia Liang', '64', '234500', '2020-12-14'),
(43, 'Bruno Nash', '38', '163500', '2020-12-14'),
(44, 'Sakura Yamamoto', '37', '139575', '2020-12-14'),
(45, 'Thor Walton', '61', '98540', '2020-12-14'),
(46, 'Finn Camacho', '47', '87500', '2020-12-14'),
(47, 'Serge Baldwin', '64', '138575', '2020-12-14'),
(48, 'Zenaida Frank', '63', '125250', '2020-12-14'),
(49, 'Zorita Serrano', '56', '115000', '2020-12-14'),
(50, 'Jennifer Acosta', '43', '75650', '2020-12-14'),
(51, 'Cara Stevens', '46', '145600', '2020-12-14'),
(52, 'Hermione Butler', '47', '356250', '2020-12-14'),
(53, 'Lael Greer', '21', '103500', '2020-12-14'),
(54, 'Jonas Alexander', '30', '86500', '2020-12-14'),
(55, 'Shad Decker', '51', '183000', '2020-12-14'),
(56, 'Michael Bruce', '29', '183000', '2020-12-14'),
(57, 'Maicol', '28', '100000', '2020-12-14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key', AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
