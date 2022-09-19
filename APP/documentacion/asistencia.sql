-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2022 a las 18:04:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Id_Administrador` int(11) NOT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `Correo` varchar(150) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Id_Administrador`, `Nombre`, `Correo`, `Edad`, `Password`) VALUES
(1, 'Eduardo Efrain Santos Arellano', 'system.otmx@gmail.com', 22, 'root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Id_Empleado` int(11) NOT NULL,
  `Nombre` varchar(200) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Puesto` varchar(200) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `Id_Estado` int(11) NOT NULL,
  `Estado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`Id_Estado`, `Estado`) VALUES
(1, 'Carga'),
(2, 'Taller'),
(3, 'Coleccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `Id_Jornada` int(11) NOT NULL,
  `Empleado` int(11) DEFAULT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `Estado` varchar(150) DEFAULT NULL,
  `Puesto` varchar(150) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Entrada` time DEFAULT NULL,
  `Salida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `Id_Puesto` int(11) NOT NULL,
  `Puesto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`Id_Puesto`, `Puesto`) VALUES
(1, 'Operador'),
(2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_administrador`
--

CREATE TABLE `telefono_administrador` (
  `Id_Telefono_Adm` int(11) NOT NULL,
  `Administrador` int(11) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_empleado`
--

CREATE TABLE `telefono_empleado` (
  `Id_Telefono_Emp` int(11) NOT NULL,
  `Empleado` int(11) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Id_Administrador`);

--
-- Indices de la tabla `empleado`
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`Id_Estado`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`Id_Puesto`);

--
-- Indices de la tabla `telefono_administrador`
--
ALTER TABLE `telefono_administrador`
  ADD PRIMARY KEY (`Id_Telefono_Adm`),
  ADD KEY `FK_ADMI_TEL` (`Administrador`);

--
-- Indices de la tabla `telefono_empleado`
--
ALTER TABLE `telefono_empleado`
  ADD PRIMARY KEY (`Id_Telefono_Emp`),
  ADD KEY `FK_EMPL_TEL` (`Empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `Id_Administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Id_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `Id_Estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `Id_Puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `telefono_administrador`
--
ALTER TABLE `telefono_administrador`
  MODIFY `Id_Telefono_Adm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono_empleado`
--
ALTER TABLE `telefono_empleado`
  MODIFY `Id_Telefono_Emp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `FK_PUES_EMP` FOREIGN KEY (`Puesto`) REFERENCES `puesto` (`Id_Puesto`);

--
-- Filtros para la tabla `telefono_administrador`
--
ALTER TABLE `telefono_administrador`
  ADD CONSTRAINT `FK_ADMI_TEL` FOREIGN KEY (`Administrador`) REFERENCES `administrador` (`Id_Administrador`);

--
-- Filtros para la tabla `telefono_empleado`
--
ALTER TABLE `telefono_empleado`
  ADD CONSTRAINT `FK_EMPL_TEL` FOREIGN KEY (`Empleado`) REFERENCES `empleado` (`Id_Empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
