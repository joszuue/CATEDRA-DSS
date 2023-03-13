-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-03-2023 a las 17:25:21
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
-- Base de datos: `agro_binance`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `DUI` varchar(10) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `FechaNac` date NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Contra` varchar(100) NOT NULL,
  `Departamento` varchar(100) NOT NULL,
  `Sueldo` double NOT NULL,
  PRIMARY KEY (`DUI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`DUI`, `Nombres`, `Apellidos`, `FechaNac`, `Telefono`, `Correo`, `Contra`, `Departamento`, `Sueldo`) VALUES
('12345678-9', 'Kennet Adonay', 'Vargas Hernandez', '2003-12-25', '7822-1744', 'kennet@gmail.com', '12345', 'San Juan Nonualco', 1000),
('06629930-7', 'Kennet', 'Vargas', '2003-12-25', '7822-1744', 'adonay@gmail.com', 'Pikachu54', 'Santa Ana', 1000),
('12345678-1', 'Denis Josué', 'Vásquez Rodríguez', '2004-01-29', '7346-1937', '29vasquezz@gmail.com', 'Aa123', 'San Salvador', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentaahorro`
--

DROP TABLE IF EXISTS `cuentaahorro`;
CREATE TABLE IF NOT EXISTS `cuentaahorro` (
  `NumCuenta` int NOT NULL,
  `Dui` varchar(10) NOT NULL,
  `Titular` varchar(500) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `Fondos` float NOT NULL,
  PRIMARY KEY (`NumCuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cuentaahorro`
--

INSERT INTO `cuentaahorro` (`NumCuenta`, `Dui`, `Titular`, `Estado`, `Fondos`) VALUES
(487487175, '12345678-1', 'Denis Josué Vásquez Rodríguez', 'Activo', 200),
(506634201, '12345678-1', 'Denis Josué Vásquez Rodríguez', 'Activo', 71.05),
(852383160, '12345678-9', 'Kennet Adonay Vargas Hernandez', 'Inactiva', 0),
(997755762, '12345678-1', 'Denis Josué Vásquez Rodríguez', 'Activo', 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

DROP TABLE IF EXISTS `transaccion`;
CREATE TABLE IF NOT EXISTS `transaccion` (
  `idTransaccion` int NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  `Monto` double NOT NULL,
  `NumCuenta` int NOT NULL,
  `NumCuentaRecep` int NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idTransaccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`idTransaccion`, `Tipo`, `Monto`, `NumCuenta`, `NumCuentaRecep`, `Fecha`) VALUES
(311796, 'Transferencia', 100, 487487175, 997755762, '2023-03-13'),
(339580, 'Deposito', 200, 487487175, 487487175, '2023-03-13'),
(358605, 'Retiro', 10, 997755762, 997755762, '2023-03-13'),
(375926, 'Deposito', 100, 487487175, 487487175, '2023-03-13'),
(985412, 'Deposito', 0.2, 506634201, 506634201, '2023-03-13'),
(997631, 'Deposito', 70.85, 506634201, 506634201, '2023-03-13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
