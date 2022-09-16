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
  `Puesto` int(11) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Id_Empleado`, `Nombre`, `Correo`, `Edad`, `Password`, `Puesto`, `Activo`) VALUES
(10, 'Abraham Ezequiel Torres', 'abraham_torres81@outlook.com', 22, 'root', 1, 0),
(11, 'Raul Imanol Espa&ntilde;a Soria', 'imanol.soria@outlook.com', 24, 'root', 1, 0),
(12, 'Victor Eliel Aguilar Hernandez', 'victor.ah@aviva.one', 29, 'root', 1, 0),
(14, 'EDUARDO EFRAIN SANTOS ARELLANO', 'system.otmx@gmail.com', 22, 'root', 1, 0),
(15, 'prueba', 'prueba@gmail.com', 22, 'root', 1, 0),
(16, 'prueba2', 'prueba2@gmail.com', 22, 'root', 1, 0),
(17, 'prueba3', 'prueba3@gmail.com', 22, '1234', 1, 0),
(18, 'prueba4', 'prueba4@gmail.com', 22, 'root', 1, 0),
(19, 'prueba5', 'prueba5@gmail.com', 22, 'root', 1, 0),
(21, 'prueba6', 'prueba6@gmail.com', 23, 'root', 1, 0),
(22, 'prueba7', 'prueba7@gmail.com', 56, 'root', 1, 0),
(23, 'prueba8', 'prueba8@gmail.com', 30, 'root', 1, 0),
(24, 'unapruebamas ', 'unapruebamas@gmail.com', 34, 'root', 1, 0),
(25, 'xd', 'xd@gmail.com', 90, 'root', 1, 0),
(26, 'hola', 'hola@gmai.com', 34, 'root', 1, 0),
(27, 'lol', 'lol@gmai.com', 20, 'root', 1, 0),
(28, 'pop', 'pop@gmail.com', 1, 'root', 1, 0),
(30, 'apple', 'apple@gmail.com', 22, 'root', 1, 0),
(31, 'eeee', 'eee@gmail.com', 22, 'root', 1, 0),
(32, 'eeee', 'eee@gmail.com', 22, 'root', 1, 0),
(33, 'hshshs', 'hshshshs@gmail.com', 30, 'root', 1, 0),
(34, 'jobs1', 'jobs1@apple.com', 70, 'root', 1, 0),
(35, 'jobs1', 'jobs1@apple.com', 70, '', 1, 0),
(36, 'juasjuas', 'juas@gmail.com', 90, 'root', 1, 0),
(38, 'yeyeyey', 'yeyeyeye@gmail.com', 30, 'root', 1, 0),
(40, 'yeyeyey1', 'yeyeyeye1@gmail.com', 30, 'root', 1, 0),
(42, 'lalos', 'lalos2@gmail.com', 220, 'root', 1, 0),
(43, 'lalos', 'lalos2@gmail.com', 220, '123456789', 1, 0),
(44, 'lalos', 'lalos2@gmail.com', 220, 'ssss', 1, 0),
(45, 'saassas', 'sasasss@gmai.com', 3, '1', 1, 0),
(46, '1', '1@gmai.com', 1, '1', 1, 0);

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
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id_Empleado`),
  ADD KEY `FK_PUES_EMP` (`Puesto`);

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
