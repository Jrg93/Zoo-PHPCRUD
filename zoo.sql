-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2019 a las 01:34:42
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `i031zoologico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `ID_ANIMAL` int(11) NOT NULL,
  `NOMBRE_ANIMAL` varchar(20) DEFAULT NULL,
  `FK_SEXO` int(11) NOT NULL,
  `FK_ESPECIE` int(11) NOT NULL,
  `FK_ZOOLOGICO` int(11) DEFAULT NULL,
  `FK_ORIGEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ID_CIUDAD` int(11) NOT NULL,
  `NOMBRE_CIUDAD` varchar(30) NOT NULL,
  `FK_PAIS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ID_CIUDAD`, `NOMBRE_CIUDAD`, `FK_PAIS`) VALUES
(1, 'Santiago', 3),
(2, 'Sydney', 10),
(3, 'Shanghai', 13),
(4, 'Lautoka', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continente`
--

CREATE TABLE `continente` (
  `ID_CONTINENTE` int(11) NOT NULL,
  `NOMBRE_CONTINENTE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `continente`
--

INSERT INTO `continente` (`ID_CONTINENTE`, `NOMBRE_CONTINENTE`) VALUES
(1, 'America'),
(3, 'Asia'),
(4, 'Africa'),
(5, 'Europa'),
(6, 'Oceania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `ID_ESPECIE` int(11) NOT NULL,
  `NOMBRE_VULGAR` varchar(30) DEFAULT NULL,
  `NOMBRE_CIENTIFICO` varchar(30) DEFAULT NULL,
  `FK_FAMILIA` int(11) NOT NULL,
  `FK_PELIGRO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`ID_ESPECIE`, `NOMBRE_VULGAR`, `NOMBRE_CIENTIFICO`, `FK_FAMILIA`, `FK_PELIGRO`) VALUES
(4, 'Oso pardo', 'Ursus arctos', 3, 2),
(5, 'Chinpance', 'Pan troglodytes', 6, 3),
(6, 'Gato', 'Felis catus', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `ID_FAMILIA` int(11) NOT NULL,
  `NOMBRE_FAMILIA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`ID_FAMILIA`, `NOMBRE_FAMILIA`) VALUES
(1, 'Caninos'),
(2, 'Felinos'),
(3, 'Ursino'),
(4, 'Escualos'),
(5, 'Insectos'),
(6, 'Hominidos');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `ID_PAIS` int(11) NOT NULL,
  `NOMBRE_PAIS` varchar(20) DEFAULT NULL,
  `FK_CONTINENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`ID_PAIS`, `NOMBRE_PAIS`, `FK_CONTINENTE`) VALUES
(3, 'Chile', 1),
(4, 'Francia', 5),
(5, 'Uruguay', 1),
(10, 'Australia', 6),
(11, 'Fiyi', 6),
(12, 'Congo', 4),
(13, 'China', 3),
(14, 'Japon', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peligro`
--

CREATE TABLE `peligro` (
  `ID_PELIGRO` int(11) NOT NULL,
  `CODIGO_PELIGRO` varchar(5) NOT NULL,
  `NOMBRE_PELIGRO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peligro`
--

INSERT INTO `peligro` (`ID_PELIGRO`, `CODIGO_PELIGRO`, `NOMBRE_PELIGRO`) VALUES
(1, 'EX', 'Extinto'),
(2, 'LC', 'Preocupacion Menor'),
(3, 'DD', 'Datos insuficientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `ID_SEXO` int(11) NOT NULL,
  `TIPO_SEXO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`ID_SEXO`, `TIPO_SEXO`) VALUES
(1, 'Macho'),
(2, 'Hembra'),
(3, 'No Definido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zoologico`
--

CREATE TABLE `zoologico` (
  `ID_ZOOLOGICO` int(11) NOT NULL,
  `NOMBRE_ZOOLOGICO` varchar(20) NOT NULL,
  `PRESUPUESTO` int(11) NOT NULL,
  `TAMANIO` int(11) NOT NULL,
  `FK_CIUDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zoologico`
--

INSERT INTO `zoologico` (`ID_ZOOLOGICO`, `NOMBRE_ZOOLOGICO`, `PRESUPUESTO`, `TAMANIO`, `FK_CIUDAD`) VALUES
(2, 'Wild Life Sydney Zoo', 100000, 10000, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`ID_ANIMAL`),
  ADD KEY `FKSA` (`FK_SEXO`),
  ADD KEY `FKEA` (`FK_ESPECIE`),
  ADD KEY `FKZA` (`FK_ZOOLOGICO`),
  ADD KEY `FKPA` (`FK_ORIGEN`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ID_CIUDAD`),
  ADD KEY `FKCP` (`FK_PAIS`);

--
-- Indices de la tabla `continente`
--
ALTER TABLE `continente`
  ADD PRIMARY KEY (`ID_CONTINENTE`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`ID_ESPECIE`),
  ADD KEY `FKPE` (`FK_PELIGRO`),
  ADD KEY `FKFE` (`FK_FAMILIA`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`ID_FAMILIA`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`ID_PAIS`),
  ADD KEY `FKPC` (`FK_CONTINENTE`);

--
-- Indices de la tabla `peligro`
--
ALTER TABLE `peligro`
  ADD PRIMARY KEY (`ID_PELIGRO`),
  ADD UNIQUE KEY `CODIGO_PELIGRO` (`CODIGO_PELIGRO`),
  ADD UNIQUE KEY `NOMBRE_PELIGRO` (`NOMBRE_PELIGRO`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`ID_SEXO`);

--
-- Indices de la tabla `zoologico`
--
ALTER TABLE `zoologico`
  ADD PRIMARY KEY (`ID_ZOOLOGICO`),
  ADD KEY `FKCZ` (`FK_CIUDAD`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `ID_ANIMAL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ID_CIUDAD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `continente`
--
ALTER TABLE `continente`
  MODIFY `ID_CONTINENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `ID_ESPECIE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `ID_FAMILIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `ID_PAIS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `peligro`
--
ALTER TABLE `peligro`
  MODIFY `ID_PELIGRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `ID_SEXO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `zoologico`
--
ALTER TABLE `zoologico`
  MODIFY `ID_ZOOLOGICO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `FKEA` FOREIGN KEY (`FK_ESPECIE`) REFERENCES `especie` (`ID_ESPECIE`),
  ADD CONSTRAINT `FKPA` FOREIGN KEY (`FK_ORIGEN`) REFERENCES `pais` (`ID_PAIS`),
  ADD CONSTRAINT `FKSA` FOREIGN KEY (`FK_SEXO`) REFERENCES `sexo` (`ID_SEXO`),
  ADD CONSTRAINT `FKZA` FOREIGN KEY (`FK_ZOOLOGICO`) REFERENCES `zoologico` (`ID_ZOOLOGICO`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `FKCP` FOREIGN KEY (`FK_PAIS`) REFERENCES `pais` (`ID_PAIS`);

--
-- Filtros para la tabla `especie`
--
ALTER TABLE `especie`
  ADD CONSTRAINT `FKFE` FOREIGN KEY (`FK_FAMILIA`) REFERENCES `familia` (`ID_FAMILIA`),
  ADD CONSTRAINT `FKPE` FOREIGN KEY (`FK_PELIGRO`) REFERENCES `peligro` (`ID_PELIGRO`);

--
-- Filtros para la tabla `pais`
--
ALTER TABLE `pais`
  ADD CONSTRAINT `FKPC` FOREIGN KEY (`FK_CONTINENTE`) REFERENCES `continente` (`ID_CONTINENTE`);

--
-- Filtros para la tabla `zoologico`
--
ALTER TABLE `zoologico`
  ADD CONSTRAINT `FKCZ` FOREIGN KEY (`FK_CIUDAD`) REFERENCES `ciudad` (`ID_CIUDAD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
