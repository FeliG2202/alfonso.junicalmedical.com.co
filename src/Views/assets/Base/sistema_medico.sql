-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 05-03-2024 a las 15:12:57
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_medico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `idMenu` int NOT NULL,
  `menuNombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `menuEstado` enum('online','offline','online/offline') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'online',
  `idRol` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`idMenu`, `menuNombre`, `menuEstado`, `idRol`) VALUES
(1, 'Usuarios', 'online', '1,3'),
(2, 'Perfiles', 'online', '3'),
(3, 'Menus', 'online', '3'),
(4, 'Formulario', 'online/offline', '1,2,3'),
(5, 'Ingresar Menú Almuerzo', 'online', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_seleccionado`
--

CREATE TABLE `menu_seleccionado` (
  `idMenuSeleccionado` int NOT NULL,
  `idPersona` int NOT NULL,
  `idNutriMenu` int NOT NULL,
  `nutriSopaNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriArrozNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriProteNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriEnergeNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriAcompNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriEnsalNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriBebidaNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nombreEmpaquetado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fecha_actual` date NOT NULL,
  `tipoPago` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `menu_seleccionado`
--

INSERT INTO `menu_seleccionado` (`idMenuSeleccionado`, `idPersona`, `idNutriMenu`, `nutriSopaNombre`, `nutriArrozNombre`, `nutriProteNombre`, `nutriEnergeNombre`, `nutriAcompNombre`, `nutriEnsalNombre`, `nutriBebidaNombre`, `nombreEmpaquetado`, `fecha_actual`, `tipoPago`) VALUES
(1, 4, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne Asada', 'Frijol', 'Maduro al Horno', NULL, NULL, 'Para llevar', '2023-12-22', 'Descuento por nómina'),
(3, 5, 13, 'Sopa de Arracacha', 'Arroz de zanahoria', 'Sobrebarriga al Horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2023-12-26', 'Descuento por nómina'),
(6, 12, 16, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2023-12-27', 'Pago en efectivo (caja)'),
(7, 14, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', NULL, NULL, 'Para llevar', '2023-12-27', 'Descuento por nómina'),
(8, 4, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', NULL, NULL, 'Para llevar', '2023-12-28', 'Descuento por nómina'),
(9, 4, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', NULL, NULL, NULL, '2023-12-28', 'Descuento por nómina'),
(10, 5, 18, 'Sancocho', 'Arroz blanco', 'Fricase de pollo', NULL, NULL, 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2023-12-28', 'Descuento por nómina'),
(12, 4, 4, 'Sopa de Mute', 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', NULL, NULL, 'Para llevar', '2024-01-02', 'Descuento por nómina'),
(13, 4, 3, 'Sopa de Mute', 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', NULL, NULL, NULL, '2024-01-02', 'Descuento por nómina'),
(14, 4, 6, 'Sopa de arroz', 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-01-03', 'Descuento por nómina'),
(15, 4, 6, 'Sopa de arroz', 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, NULL, '2024-01-03', 'Descuento por nómina'),
(16, 12, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-01-04', 'Pago en efectivo (caja)'),
(18, 4, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', NULL, NULL, 'Para llevar', '2024-01-04', 'Descuento por nómina'),
(19, 4, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-01-04', 'Descuento por nómina'),
(20, 12, 9, 'Sopa de cuchuco', 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', 'Papa criolla frita', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-01-05', 'Pago en efectivo (caja)'),
(21, 5, 9, 'Sopa de cuchuco', 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', 'Papa criolla frita', NULL, NULL, NULL, '2024-01-05', 'Descuento por nómina'),
(22, 14, 10, NULL, 'Arroz blanco', 'Carne asada', 'Frijoles', NULL, NULL, NULL, 'Para llevar', '2024-01-05', 'Descuento por nómina'),
(23, 4, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', NULL, NULL, 'Para llevar', '2024-01-05', 'Descuento por nómina'),
(24, 4, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', NULL, NULL, NULL, '2024-01-05', 'Descuento por nómina'),
(25, 12, 13, NULL, 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-01-09', 'Pago en efectivo (caja)'),
(26, 12, 16, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-10', 'Pago en efectivo (caja)'),
(27, 12, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-01-11', 'Pago en efectivo (caja)'),
(28, 12, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-12', 'Pago en efectivo (caja)'),
(29, 26, 1, 'Sopa de pastas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15', 'Pago en efectivo (caja)'),
(30, 8, 2, 'Sopa de pastas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-15', 'Descuento por nómina'),
(31, 20, 2, NULL, NULL, 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-01-15', 'Descuento por nómina'),
(32, 32, 1, 'Sopa de pastas', 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, NULL, NULL, 'Para llevar', '2024-01-15', 'Descuento por nómina'),
(33, 32, 2, 'Sopa de pastas', 'Arroz blanco', 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-01-15', 'Descuento por nómina'),
(34, 4, 2, 'Sopa de pastas', 'Arroz blanco', 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-01-15', 'Descuento por nómina'),
(35, 12, 4, 'Sopa de Mute', 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-16', 'Pago en efectivo (caja)'),
(36, 27, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Para llevar', '2024-01-16', 'Descuento por nómina'),
(37, 29, 3, NULL, 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', NULL, NULL, 'Para llevar', '2024-01-16', 'Descuento por nómina'),
(38, 20, 3, 'Sopa de Mute', 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-16', 'Descuento por nómina'),
(39, 14, 5, NULL, 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-01-17', 'Descuento por nómina'),
(40, 12, 6, 'Sopa de arroz', 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, NULL, '2024-01-17', 'Pago en efectivo (caja)'),
(41, 27, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Para llevar', '2024-01-17', 'Descuento por nómina'),
(42, 27, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Para llevar', '2024-01-17', 'Descuento por nómina'),
(43, 29, 6, NULL, 'Arroz con zanahoria', 'Carne en bistec', NULL, 'Aborrajado', 'Tajada de Aguacate', NULL, NULL, '2024-01-17', 'Descuento por nómina'),
(44, 20, 6, NULL, 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-01-17', 'Descuento por nómina'),
(45, 4, 6, 'Sopa de arroz', 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, NULL, '2024-01-17', 'Descuento por nómina'),
(46, 12, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-01-18', 'Pago en efectivo (caja)'),
(47, 28, 8, NULL, 'Arroz con Perejil', NULL, 'Spagueti  boloñesa', 'Papa francesa', NULL, NULL, 'Para llevar', '2024-01-18', 'Descuento por nómina'),
(48, 21, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-01-18', 'Descuento por nómina'),
(49, 22, 7, NULL, 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-01-18', 'Pago en efectivo (caja)'),
(50, 27, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Para llevar', '2024-01-18', 'Descuento por nómina'),
(51, 27, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Para llevar', '2024-01-18', 'Descuento por nómina'),
(52, 4, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, NULL, 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-01-18', 'Descuento por nómina'),
(53, 27, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, 'Para llevar', '2024-01-18', 'Descuento por nómina'),
(54, 27, 8, NULL, 'Arroz con Perejil', NULL, 'Spagueti  boloñesa', 'Papa francesa', 'Lechuga/ Cebolla y Tomate', NULL, 'Para llevar', '2024-01-18', 'Descuento por nómina'),
(55, 27, 7, NULL, 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, 'Para llevar', '2024-01-18', 'Descuento por nómina'),
(56, 20, 8, NULL, 'Arroz con Perejil', NULL, 'Spagueti  boloñesa', 'Papa francesa', 'Lechuga/ Cebolla y Tomate', NULL, 'Para llevar', '2024-01-18', 'Descuento por nómina'),
(57, 14, 8, NULL, 'Arroz con Perejil', NULL, 'Spagueti  boloñesa', 'Papa francesa', NULL, NULL, 'Para llevar', '2024-01-18', 'Descuento por nómina'),
(58, 21, 9, 'Sopa de cuchuco', 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', 'Papa criolla frita', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-01-19', 'Descuento por nómina'),
(59, 8, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', NULL, 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-01-19', 'Descuento por nómina'),
(60, 29, 10, NULL, 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', NULL, NULL, NULL, '2024-01-19', 'Descuento por nómina'),
(61, 20, 10, NULL, 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-01-19', 'Descuento por nómina'),
(62, 14, 10, NULL, 'Arroz blanco', 'Carne asada', NULL, 'Maduro al horno', NULL, NULL, 'Para llevar', '2024-01-19', 'Descuento por nómina'),
(63, 14, 10, NULL, 'Arroz blanco', 'Carne asada', NULL, 'Maduro al horno', NULL, NULL, 'Para llevar', '2024-01-19', 'Descuento por nómina'),
(64, 4, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', NULL, 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-01-19', 'Descuento por nómina'),
(65, 8, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-01-19', 'Descuento por nómina'),
(66, 32, 12, 'Sopa de colicero', 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, 'Para llevar', '2024-01-22', 'Descuento por nómina'),
(67, 32, 12, NULL, 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', NULL, NULL, 'Para llevar', '2024-01-22', 'Descuento por nómina'),
(68, 32, 11, 'Sopa de colicero', 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, 'Para llevar', '2024-01-22', 'Descuento por nómina'),
(69, 13, 11, 'Sopa de colicero', 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, NULL, '2024-01-22', 'Pago en efectivo (caja)'),
(70, 8, 12, 'Sopa de colicero', 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, NULL, '2024-01-22', 'Descuento por nómina'),
(71, 29, 12, NULL, 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', NULL, NULL, NULL, '2024-01-22', 'Descuento por nómina'),
(72, 20, 12, NULL, 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, 'Para llevar', '2024-01-22', 'Descuento por nómina'),
(73, 12, 14, NULL, 'Arroz con zanahoria', 'Lomo de tilapia', 'Ensalada rusa', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-01-23', 'Pago en efectivo (caja)'),
(74, 13, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-01-23', 'Pago en efectivo (caja)'),
(75, 32, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-01-23', 'Descuento por nómina'),
(76, 8, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-01-23', 'Descuento por nómina'),
(77, 27, 13, 'Sopa de arracacha', 'Arroz con zanahoria', NULL, NULL, 'Papa, Yuca (Guacamole)', NULL, NULL, 'Para llevar', '2024-01-23', 'Descuento por nómina'),
(78, 17, 13, 'Sopa de arracacha', NULL, 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-01-23', 'Pago en efectivo (caja)'),
(79, 20, 13, NULL, 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-01-23', 'Descuento por nómina'),
(80, 29, 13, NULL, 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', NULL, NULL, NULL, '2024-01-23', 'Descuento por nómina'),
(81, 27, 15, NULL, 'Arroz con Ajonjolí', 'Cerdo asado', 'Lentejas', 'Tajada madura', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-24', 'Descuento por nómina'),
(82, 27, 16, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-24', 'Descuento por nómina'),
(83, 29, 15, NULL, 'Arroz con Ajonjolí', 'Cerdo asado', 'Lentejas', 'Tajada madura', NULL, NULL, NULL, '2024-01-24', 'Descuento por nómina'),
(84, 32, 15, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Cerdo asado', 'Lentejas', 'Tajada madura', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-24', 'Descuento por nómina'),
(85, 20, 15, NULL, NULL, 'Cerdo asado', 'Lentejas', 'Tajada madura', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-24', 'Descuento por nómina'),
(86, 14, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-24', 'Descuento por nómina'),
(87, 8, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-01-25', 'Descuento por nómina'),
(88, 32, 18, 'Sancocho', 'Arroz blanco', 'Fricase de pollo', NULL, 'Yuca frita', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, 'Para llevar', '2024-01-25', 'Descuento por nómina'),
(89, 32, 18, NULL, 'Arroz blanco', 'Fricase de pollo', NULL, 'Yuca frita', NULL, NULL, 'Para llevar', '2024-01-25', 'Descuento por nómina'),
(90, 32, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-01-25', 'Descuento por nómina'),
(91, 35, 17, NULL, 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-01-25', 'Descuento por nómina'),
(92, 14, 18, NULL, 'Arroz blanco', 'Fricase de pollo', NULL, NULL, 'Remolacha y Zanahoria cocida con Mayonesa', NULL, 'Para llevar', '2024-01-25', 'Descuento por nómina'),
(93, 27, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, 'Para llevar', '2024-01-25', 'Descuento por nómina'),
(94, 27, 18, 'Sancocho', 'Arroz blanco', 'Fricase de pollo', NULL, 'Yuca frita', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, 'Para llevar', '2024-01-25', 'Descuento por nómina'),
(95, 29, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', NULL, NULL, NULL, '2024-01-25', 'Descuento por nómina'),
(96, 17, 18, 'Sancocho', 'Arroz blanco', 'Fricase de pollo', NULL, 'Yuca frita', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-01-25', 'Pago en efectivo (caja)'),
(97, 4, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', NULL, NULL, NULL, '2024-01-25', 'Descuento por nómina'),
(98, 35, 20, 'Sopa de avena', 'Arroz con Perejil', 'Albóndigas', 'Spaguetis', 'Plátano al horno', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-26', 'Descuento por nómina'),
(99, 29, 20, NULL, 'Arroz con Perejil', 'Albóndigas', 'Spaguetis', 'Plátano al horno', NULL, NULL, NULL, '2024-01-26', 'Descuento por nómina'),
(100, 20, 20, NULL, 'Arroz con Perejil', 'Albóndigas', 'Spaguetis', 'Plátano al horno', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-26', 'Descuento por nómina'),
(101, 12, 19, NULL, 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-26', 'Pago en efectivo (caja)'),
(102, 27, 19, NULL, 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-26', 'Descuento por nómina'),
(103, 13, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-26', 'Pago en efectivo (caja)'),
(104, 32, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-26', 'Descuento por nómina'),
(105, 32, 19, NULL, 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', NULL, NULL, 'Para llevar', '2024-01-26', 'Descuento por nómina'),
(106, 32, 20, 'Sopa de avena', 'Arroz con Perejil', 'Albóndigas', 'Spaguetis', 'Plátano al horno', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-26', 'Descuento por nómina'),
(107, 32, 19, NULL, 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-26', 'Descuento por nómina'),
(108, 32, 20, 'Sopa de avena', 'Arroz con Perejil', 'Albóndigas', 'Spaguetis', 'Plátano al horno', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-26', 'Descuento por nómina'),
(109, 8, 20, 'Sopa de avena', 'Arroz con Perejil', 'Albóndigas', 'Spaguetis', 'Plátano al horno', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-26', 'Descuento por nómina'),
(110, 13, 1, 'Sopa de pastas', 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-01-29', 'Pago en efectivo (caja)'),
(111, 29, 2, NULL, 'Arroz blanco', 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', NULL, NULL, NULL, '2024-01-29', 'Descuento por nómina'),
(112, 32, 1, 'Sopa de pastas', 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-01-29', 'Descuento por nómina'),
(113, 32, 1, NULL, 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, NULL, NULL, 'Para llevar', '2024-01-29', 'Descuento por nómina'),
(114, 32, 2, NULL, 'Arroz blanco', 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-01-29', 'Descuento por nómina'),
(115, 20, 4, NULL, 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-30', 'Descuento por nómina'),
(116, 14, 4, NULL, 'Arroz con Fideo', 'Pollo a la jardinera', NULL, NULL, 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-01-30', 'Descuento por nómina'),
(117, 35, 3, 'Sopa de Mute', 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-30', 'Descuento por nómina'),
(118, 5, 3, 'Sopa de Mute', 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-01-30', 'Descuento por nómina'),
(119, 5, 3, 'Sopa de Mute', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-30', 'Descuento por nómina'),
(120, 24, 21, NULL, NULL, 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-02-02', 'Pago en efectivo (caja)'),
(121, 12, 21, NULL, 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-02-02', 'Pago en efectivo (caja)'),
(122, 32, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-02-02', 'Pago en efectivo (caja)'),
(123, 13, 21, 'Sopa de cuchuco', 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-02-02', 'Pago en efectivo (caja)'),
(124, 4, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', NULL, NULL, 'Para llevar', '2024-02-02', 'Descuento por nómina'),
(125, 4, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', NULL, NULL, NULL, '2024-02-02', 'Descuento por nómina'),
(126, 12, 11, NULL, 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, NULL, '2024-02-05', 'Pago en efectivo (caja)'),
(127, 22, 11, 'Sopa de colicero', 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, 'Para llevar', '2024-02-05', 'Pago en efectivo (caja)'),
(128, 32, 12, 'Sopa de colicero', 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, 'Para llevar', '2024-02-05', 'Pago en efectivo (caja)'),
(129, 33, 11, 'Sopa de colicero', 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', NULL, NULL, 'Para llevar', '2024-02-05', 'Descuento por nómina'),
(130, 14, 12, 'Sopa de colicero', 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', NULL, NULL, 'Para llevar', '2024-02-05', 'Descuento por nómina'),
(131, 20, 12, 'Sopa de colicero', 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, 'Para llevar', '2024-02-05', 'Descuento por nómina'),
(132, 29, 11, NULL, 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', NULL, NULL, NULL, '2024-02-05', 'Descuento por nómina'),
(133, 8, 12, 'Sopa de colicero', 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, NULL, '2024-02-05', 'Descuento por nómina'),
(134, 13, 11, 'Sopa de colicero', 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, NULL, '2024-02-05', 'Pago en efectivo (caja)'),
(135, 12, 13, NULL, 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-06', 'Pago en efectivo (caja)'),
(136, 27, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-06', 'Descuento por nómina'),
(137, 8, 14, 'Sopa de arracacha', 'Arroz con zanahoria', 'Lomo de tilapia', 'Ensalada rusa', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-06', 'Descuento por nómina'),
(138, 8, 14, 'Sopa de arracacha', 'Arroz con zanahoria', 'Lomo de tilapia', 'Ensalada rusa', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-06', 'Descuento por nómina'),
(139, 32, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-06', 'Pago en efectivo (caja)'),
(140, 29, 13, NULL, 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-06', 'Descuento por nómina'),
(141, 20, 13, NULL, 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-06', 'Descuento por nómina'),
(142, 14, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-06', 'Descuento por nómina'),
(143, 13, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-06', 'Pago en efectivo (caja)'),
(144, 27, 15, NULL, 'Arroz con Ajonjolí', 'Cerdo asado', 'Lentejas', 'Tajada madura', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-07', 'Descuento por nómina'),
(145, 22, 15, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Cerdo asado', 'Lentejas', 'Tajada madura', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-07', 'Pago en efectivo (caja)'),
(146, 14, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-07', 'Descuento por nómina'),
(147, 8, 16, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-07', 'Descuento por nómina'),
(148, 8, 16, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-07', 'Descuento por nómina'),
(149, 8, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-07', 'Descuento por nómina'),
(150, 29, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', NULL, NULL, NULL, '2024-02-07', 'Descuento por nómina'),
(151, 12, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-07', 'Pago en efectivo (caja)'),
(152, 13, 15, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Cerdo asado', 'Lentejas', 'Tajada madura', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-07', 'Pago en efectivo (caja)'),
(153, 8, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, 'Para llevar', '2024-02-08', 'Descuento por nómina'),
(154, 8, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-08', 'Descuento por nómina'),
(155, 27, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, 'Para llevar', '2024-02-08', 'Descuento por nómina'),
(156, 8, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-08', 'Descuento por nómina'),
(157, 12, 17, NULL, 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-08', 'Pago en efectivo (caja)'),
(158, 13, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-08', 'Pago en efectivo (caja)'),
(159, 29, 18, 'Sancocho', 'Arroz blanco', 'Fricase de pollo', NULL, 'Yuca frita', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-08', 'Descuento por nómina'),
(160, 20, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, 'Para llevar', '2024-02-08', 'Descuento por nómina'),
(161, 32, 18, 'Sancocho', 'Arroz blanco', 'Fricase de pollo', NULL, 'Yuca frita', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, 'Para llevar', '2024-02-08', 'Pago en efectivo (caja)'),
(162, 27, 19, NULL, 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-09', 'Descuento por nómina'),
(163, 8, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-09', 'Descuento por nómina'),
(164, 8, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-09', 'Descuento por nómina'),
(166, 8, 20, 'Sopa de avena', 'Arroz con Perejil', 'Albóndigas', 'Spaguetis', 'Plátano al horno', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-09', 'Descuento por nómina'),
(167, 13, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-09', 'Pago en efectivo (caja)'),
(168, 32, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-09', 'Pago en efectivo (caja)'),
(169, 20, 1, NULL, 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-12', 'Descuento por nómina'),
(170, 8, 2, 'Sopa de pastas', 'Arroz blanco', 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-12', 'Descuento por nómina'),
(171, 8, 2, 'Sopa de pastas', 'Arroz blanco', 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-12', 'Descuento por nómina'),
(172, 13, 1, 'Sopa de pastas', 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-12', 'Pago en efectivo (caja)'),
(173, 27, 1, 'Sopa de pastas', 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, NULL, NULL, 'Para llevar', '2024-02-12', 'Descuento por nómina'),
(174, 32, 1, 'Sopa de pastas', 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-12', 'Pago en efectivo (caja)'),
(175, 18, 4, NULL, 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-13', 'Pago en efectivo (caja)'),
(176, 19, 4, 'Sopa de Mute', 'Arroz con Fideo', 'Pollo a la jardinera', NULL, NULL, 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-13', 'Descuento por nómina'),
(177, 27, 3, NULL, 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-13', 'Descuento por nómina'),
(178, 12, 4, NULL, 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-13', 'Pago en efectivo (caja)'),
(179, 13, 3, 'Sopa de Mute', 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-13', 'Pago en efectivo (caja)'),
(180, 32, 4, 'Sopa de Mute', 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-13', 'Pago en efectivo (caja)'),
(181, 32, 3, NULL, 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', NULL, NULL, 'Para llevar', '2024-02-13', 'Descuento por nómina'),
(182, 32, 4, 'Sopa de Mute', 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', NULL, NULL, 'Para llevar', '2024-02-13', 'Descuento por nómina'),
(183, 20, 4, NULL, 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-13', 'Descuento por nómina'),
(184, 8, 5, 'Sopa de arroz', 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, NULL, '2024-02-14', 'Descuento por nómina'),
(185, 27, 5, NULL, 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-14', 'Descuento por nómina'),
(186, 27, 5, NULL, 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-14', 'Descuento por nómina'),
(187, 18, 5, NULL, 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, NULL, '2024-02-14', 'Pago en efectivo (caja)'),
(188, 19, 5, NULL, NULL, 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, NULL, '2024-02-14', 'Descuento por nómina'),
(189, 13, 6, 'Sopa de arroz', 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, NULL, '2024-02-14', 'Pago en efectivo (caja)'),
(190, 12, 6, NULL, 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, NULL, '2024-02-14', 'Pago en efectivo (caja)'),
(191, 32, 6, 'Sopa de arroz', 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-14', 'Pago en efectivo (caja)'),
(192, 32, 5, 'Sopa de arroz', 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-14', 'Pago en efectivo (caja)'),
(193, 20, 5, NULL, 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-14', 'Descuento por nómina'),
(194, 1, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-02-15', 'Descuento por nómina'),
(195, 27, 7, NULL, 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, 'Para llevar', '2024-02-15', 'Descuento por nómina'),
(196, 27, 8, 'Sopa de avena', 'Arroz con Perejil', NULL, 'Spagueti  boloñesa', 'Papa francesa', NULL, NULL, NULL, '2024-02-15', 'Descuento por nómina'),
(197, 8, 8, 'Sopa de avena', 'Arroz con Perejil', NULL, 'Spagueti  boloñesa', 'Papa francesa', 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-02-15', 'Descuento por nómina'),
(198, 13, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-02-15', 'Pago en efectivo (caja)'),
(199, 12, 7, NULL, 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, NULL, '2024-02-15', 'Pago en efectivo (caja)'),
(200, 32, 8, 'Sopa de avena', 'Arroz con Perejil', NULL, 'Spagueti  boloñesa', 'Papa francesa', 'Lechuga/ Cebolla y Tomate', NULL, 'Para llevar', '2024-02-15', 'Pago en efectivo (caja)'),
(201, 32, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', NULL, NULL, 'Para llevar', '2024-02-15', 'Descuento por nómina'),
(202, 32, 7, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', 'Lechuga/ Cebolla y Tomate', NULL, 'Para llevar', '2024-02-15', 'Pago en efectivo (caja)'),
(203, 20, 8, NULL, 'Arroz con Perejil', NULL, 'Spagueti  boloñesa', 'Papa francesa', 'Lechuga/ Cebolla y Tomate', NULL, 'Para llevar', '2024-02-15', 'Descuento por nómina'),
(204, 28, 7, NULL, 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', NULL, NULL, NULL, '2024-02-15', 'Descuento por nómina'),
(205, 24, 21, NULL, NULL, 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-02-16', 'Pago en efectivo (caja)'),
(206, 32, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-02-16', 'Pago en efectivo (caja)'),
(207, 32, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-02-16', 'Pago en efectivo (caja)'),
(208, 27, 21, NULL, 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-02-16', 'Descuento por nómina'),
(209, 20, 10, NULL, 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-02-16', 'Descuento por nómina'),
(210, 13, 21, 'Sopa de cuchuco', 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-02-16', 'Pago en efectivo (caja)'),
(211, 12, 21, NULL, 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-02-16', 'Pago en efectivo (caja)'),
(212, 18, 21, NULL, 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-02-16', 'Pago en efectivo (caja)'),
(213, 19, 21, NULL, 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-02-16', 'Descuento por nómina'),
(215, 8, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-02-16', 'Descuento por nómina'),
(216, 8, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-02-16', 'Descuento por nómina'),
(217, 19, 11, NULL, 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', NULL, 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, NULL, '2024-02-19', 'Descuento por nómina'),
(218, 8, 11, 'Sopa de colicero', 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, 'Para llevar', '2024-02-19', 'Descuento por nómina'),
(219, 8, 11, 'Sopa de colicero', 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, NULL, '2024-02-19', 'Descuento por nómina'),
(220, 27, 12, 'Sopa de colicero', 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', NULL, NULL, 'Para llevar', '2024-02-19', 'Descuento por nómina'),
(221, 13, 11, 'Sopa de colicero', 'Arroz con Fideo', 'Pollo apanado', 'Ensalada fría (tornillos)', 'Croquetas de yuca', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, NULL, '2024-02-19', 'Pago en efectivo (caja)'),
(222, 32, 12, 'Sopa de colicero', 'Arroz con Fideo', 'Goulash', NULL, 'Papa criolla frita', 'Lechuga/ Pepino/ Zanahoria (Vinagreta)', NULL, 'Para llevar', '2024-02-19', 'Pago en efectivo (caja)'),
(223, 27, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-20', 'Descuento por nómina'),
(224, 18, 14, NULL, 'Arroz con zanahoria', 'Lomo de tilapia', 'Ensalada rusa', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-20', 'Pago en efectivo (caja)'),
(225, 19, 14, 'Sopa de arracacha', NULL, 'Lomo de tilapia', 'Ensalada rusa', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-20', 'Descuento por nómina'),
(226, 12, 13, NULL, 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-20', 'Pago en efectivo (caja)'),
(227, 8, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-20', 'Descuento por nómina'),
(228, 8, 14, 'Sopa de arracacha', 'Arroz con zanahoria', 'Lomo de tilapia', 'Ensalada rusa', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-20', 'Descuento por nómina'),
(229, 13, 13, 'Sopa de arracacha', 'Arroz con zanahoria', 'Sobrebarriga al horno', NULL, 'Papa, Yuca (Guacamole)', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-20', 'Pago en efectivo (caja)'),
(230, 27, 15, NULL, 'Arroz con Ajonjolí', 'Cerdo asado', 'Lentejas', 'Tajada madura', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-21', 'Descuento por nómina'),
(231, 18, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-21', 'Pago en efectivo (caja)'),
(232, 12, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-21', 'Pago en efectivo (caja)'),
(233, 13, 16, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-21', 'Pago en efectivo (caja)'),
(234, 19, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-21', 'Pago en efectivo (caja)'),
(235, 20, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-21', 'Descuento por nómina'),
(236, 32, 15, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Cerdo asado', 'Lentejas', 'Tajada madura', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-21', 'Pago en efectivo (caja)'),
(237, 8, 15, 'Sopa de arroz', 'Arroz con Ajonjolí', 'Cerdo asado', 'Lentejas', 'Tajada madura', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-21', 'Descuento por nómina'),
(238, 14, 16, NULL, 'Arroz con Ajonjolí', 'Sudado de pollo', NULL, 'Papa, Yuca, Mazorca (guacamole)', NULL, NULL, 'Para llevar', '2024-02-21', 'Descuento por nómina'),
(239, 27, 17, 'Sancocho', NULL, 'Creps rellenos de carne', NULL, 'Papa francesa', NULL, NULL, 'Para llevar', '2024-02-22', 'Descuento por nómina'),
(240, 12, 17, NULL, 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-22', 'Pago en efectivo (caja)'),
(241, 13, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-22', 'Pago en efectivo (caja)'),
(242, 32, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, 'Para llevar', '2024-02-22', 'Pago en efectivo (caja)'),
(243, 18, 18, NULL, 'Arroz blanco', 'Fricase de pollo', NULL, 'Yuca frita', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-22', 'Pago en efectivo (caja)'),
(244, 19, 18, 'Sancocho', 'Arroz blanco', 'Fricase de pollo', NULL, NULL, 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-22', 'Pago en efectivo (caja)'),
(245, 8, 17, 'Sancocho', 'Arroz blanco', 'Creps rellenos de carne', NULL, 'Papa francesa', 'Remolacha y Zanahoria cocida con Mayonesa', NULL, NULL, '2024-02-22', 'Descuento por nómina'),
(246, 8, 17, 'Sancocho', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22', 'Descuento por nómina'),
(247, 27, 19, NULL, 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-23', 'Descuento por nómina'),
(248, 12, 19, NULL, 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-23', 'Pago en efectivo (caja)'),
(249, 4, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-23', 'Descuento por nómina'),
(250, 4, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-23', 'Descuento por nómina'),
(251, 20, 19, NULL, 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', NULL, NULL, 'Para llevar', '2024-02-23', 'Descuento por nómina'),
(252, 8, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-23', 'Descuento por nómina'),
(253, 32, 19, 'Sopa de avena', 'Arroz con Pollo', NULL, NULL, 'Papa criolla frita', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-23', 'Pago en efectivo (caja)'),
(254, 19, 1, NULL, 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-26', 'Pago en efectivo (caja)'),
(255, 22, 2, 'Sopa de pastas', 'Arroz blanco', 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-26', 'Pago en efectivo (caja)'),
(256, 18, 1, NULL, 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-26', 'Pago en efectivo (caja)'),
(257, 27, 1, 'Sopa de pastas', 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-26', 'Descuento por nómina'),
(258, 8, 2, 'Sopa de pastas', 'Arroz blanco', 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-26', 'Descuento por nómina'),
(259, 8, 2, 'Sopa de pastas', 'Arroz blanco', 'Lomo de tilapia', 'Macarrones', 'Monedas de plátano', 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-26', 'Descuento por nómina'),
(260, 28, 1, NULL, 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, NULL, NULL, NULL, '2024-02-26', 'Descuento por nómina'),
(261, 27, 1, 'Sopa de pastas', 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, NULL, '2024-02-26', 'Descuento por nómina'),
(262, 32, 1, 'Sopa de pastas', 'Arroz blanco', 'Cerdo asado', 'Migas', NULL, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)', NULL, 'Para llevar', '2024-02-26', 'Pago en efectivo (caja)'),
(263, 18, 4, NULL, 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-27', 'Pago en efectivo (caja)'),
(264, 19, 4, 'Sopa de Mute', 'Arroz con Fideo', 'Pollo a la jardinera', NULL, NULL, 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-27', 'Pago en efectivo (caja)'),
(265, 13, 3, 'Sopa de Mute', 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-27', 'Pago en efectivo (caja)'),
(266, 27, 3, NULL, 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-27', 'Descuento por nómina'),
(267, 8, 3, 'Sopa de Mute', 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-27', 'Descuento por nómina'),
(268, 8, 4, 'Sopa de Mute', 'Arroz con Fideo', 'Pollo a la jardinera', NULL, 'Croquetas de yuca', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, NULL, '2024-02-27', 'Descuento por nómina'),
(269, 32, 3, 'Sopa de Mute', 'Arroz con Fideo', 'Goulash', NULL, 'Papa francesa', 'Lechuga/ Zanahoria/ Cebolla/ Aguacate', NULL, 'Para llevar', '2024-02-27', 'Pago en efectivo (caja)'),
(270, 18, 5, 'Sopa de arroz', 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', NULL, NULL, NULL, '2024-02-28', 'Pago en efectivo (caja)'),
(271, 32, 6, NULL, 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-28', 'Pago en efectivo (caja)'),
(272, 32, 5, 'Sopa de arroz', 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-28', 'Pago en efectivo (caja)'),
(273, 12, 5, NULL, 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, NULL, '2024-02-28', 'Pago en efectivo (caja)'),
(274, 17, 5, 'Sopa de arroz', 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, NULL, '2024-02-28', 'Pago en efectivo (caja)'),
(275, 13, 6, 'Sopa de arroz', 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, NULL, '2024-02-28', 'Pago en efectivo (caja)'),
(276, 8, 5, 'Sopa de arroz', 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, NULL, '2024-02-28', 'Descuento por nómina'),
(277, 8, 6, 'Sopa de arroz', 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-28', 'Descuento por nómina'),
(278, 8, 6, 'Sopa de arroz', 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, NULL, '2024-02-28', 'Descuento por nómina'),
(279, 27, 5, NULL, 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-28', 'Descuento por nómina'),
(280, 19, 5, 'Sopa de arroz', 'Arroz con zanahoria', 'Bagre salsa criolla', NULL, NULL, 'Tajada de Aguacate', NULL, NULL, '2024-02-28', 'Pago en efectivo (caja)'),
(281, 28, 5, NULL, 'Arroz con zanahoria', NULL, NULL, 'Papa, Yuca (Salsa Criolla)', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-28', 'Descuento por nómina'),
(282, 22, 6, NULL, 'Arroz con zanahoria', 'Carne en bistec', 'Verduras calientes', 'Aborrajado', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-28', 'Pago en efectivo (caja)'),
(283, 22, 6, NULL, 'Arroz con zanahoria', 'Carne en bistec', NULL, 'Aborrajado', 'Tajada de Aguacate', NULL, 'Para llevar', '2024-02-28', 'Pago en efectivo (caja)'),
(284, 20, 7, NULL, 'Arroz con Pollo', NULL, NULL, 'Croquetas de yuca', NULL, NULL, 'Para llevar', '2024-02-29', 'Descuento por nómina'),
(285, 32, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-03-01', 'Pago en efectivo (caja)'),
(286, 32, 21, NULL, 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, NULL, NULL, 'Para llevar', '2024-03-01', 'Pago en efectivo (caja)'),
(287, 18, 21, NULL, 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-03-01', 'Pago en efectivo (caja)'),
(288, 13, 21, 'Sopa de cuchuco', 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-03-01', 'Pago en efectivo (caja)'),
(289, 13, 21, NULL, 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-03-01', 'Pago en efectivo (caja)'),
(290, 24, 10, NULL, 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-03-01', 'Pago en efectivo (caja)');
INSERT INTO `menu_seleccionado` (`idMenuSeleccionado`, `idPersona`, `idNutriMenu`, `nutriSopaNombre`, `nutriArrozNombre`, `nutriProteNombre`, `nutriEnergeNombre`, `nutriAcompNombre`, `nutriEnsalNombre`, `nutriBebidaNombre`, `nombreEmpaquetado`, `fecha_actual`, `tipoPago`) VALUES
(291, 22, 10, NULL, 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-03-01', 'Pago en efectivo (caja)'),
(292, 22, 10, NULL, 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, 'Para llevar', '2024-03-01', 'Pago en efectivo (caja)'),
(293, 19, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', NULL, 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-03-01', 'Pago en efectivo (caja)'),
(294, 14, 21, NULL, 'Arroz blanco', 'Cerdo asado', 'Ensalada rusa', NULL, NULL, NULL, 'Para llevar', '2024-03-01', 'Descuento por nómina'),
(295, 8, 10, 'Sopa de cuchuco', 'Arroz blanco', 'Carne asada', 'Frijoles', 'Maduro al horno', 'Zanahoria/ Lechuga/ Tomate y Mayonesa', NULL, NULL, '2024-03-01', 'Descuento por nómina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_seleccionado_paci`
--

CREATE TABLE `menu_seleccionado_paci` (
  `idMenuSeleccionadoPaci` int NOT NULL,
  `idPaciente` int NOT NULL,
  `idNutriMenuPaci` int NOT NULL,
  `nutriSopaNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriArrozNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriProteNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriEnergeNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriAcompNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriEnsalNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nutriBebidaNombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fecha_actual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriacomp`
--

CREATE TABLE `nutriacomp` (
  `idNutriAcomp` int NOT NULL,
  `nutriAcompNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriacomp`
--

INSERT INTO `nutriacomp` (`idNutriAcomp`, `nutriAcompNombre`) VALUES
(1, 'Patacones'),
(2, 'Monedas de plátano'),
(3, 'Papa francesa'),
(4, 'Papa, Yuca (Salsa Criolla)'),
(5, 'Croquetas de arracacha'),
(6, 'Aborrajado'),
(7, 'Croquetas de yuca'),
(8, 'Papas doradas'),
(10, 'Maduro al horno'),
(11, 'Papa chorreada'),
(12, 'Yuca al vapor'),
(13, 'Maduro cocinado'),
(14, 'Pure de papa'),
(15, 'Yuca frita'),
(16, 'Papa salada'),
(17, 'Plátano al horno'),
(18, 'Papa, Yuca, Mazorca (guacamole)'),
(19, 'Maduro melado'),
(20, 'Tajada madura'),
(21, 'Papa, Yuca (Guacamole)'),
(22, 'Papa criolla frita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriarroz`
--

CREATE TABLE `nutriarroz` (
  `idNutriArroz` int NOT NULL,
  `nutriArrozNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriarroz`
--

INSERT INTO `nutriarroz` (`idNutriArroz`, `nutriArrozNombre`) VALUES
(1, 'Arroz blanco'),
(2, 'Arroz con Fideo'),
(3, 'Arroz Moreno'),
(4, 'Arroz con Pollo'),
(5, 'Arroz con Perejil'),
(6, 'Arroz con zanahoria'),
(7, 'Arroz con Ajonjolí');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutribebida`
--

CREATE TABLE `nutribebida` (
  `idNutriBebida` int NOT NULL,
  `nutriBebidaNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutribebida`
--

INSERT INTO `nutribebida` (`idNutriBebida`, `nutriBebidaNombre`) VALUES
(1, 'Jugo de fresa'),
(2, 'Jugo de feijoa'),
(3, 'Jugo de naranja'),
(4, 'Jugo de guayaba'),
(5, 'Jugo de piña'),
(6, 'Jugo de tomate de arbol'),
(8, 'Jugo de mango'),
(9, 'Jugo de mora'),
(10, 'Jugo de papaya');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutridias`
--

CREATE TABLE `nutridias` (
  `idNutriDias` int NOT NULL,
  `nutriDiasNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutridias`
--

INSERT INTO `nutridias` (`idNutriDias`, `nutriDiasNombre`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sabado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriempaquetado`
--

CREATE TABLE `nutriempaquetado` (
  `idMenuEmpaquetado` int NOT NULL,
  `nombreEmpaquetado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `nutriempaquetado`
--

INSERT INTO `nutriempaquetado` (`idMenuEmpaquetado`, `nombreEmpaquetado`) VALUES
(1, 'Para llevar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutrienerge`
--

CREATE TABLE `nutrienerge` (
  `idNutriEnerge` int NOT NULL,
  `nutriEnergeNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutrienerge`
--

INSERT INTO `nutrienerge` (`idNutriEnerge`, `nutriEnergeNombre`) VALUES
(1, 'Garbanzos guisados'),
(2, 'Macarrones'),
(3, 'Frijol cabeza negra'),
(4, 'Lentejas'),
(5, 'Habichuelas'),
(6, 'Spagueti  boloñesa'),
(7, 'Alverjas'),
(8, 'Tornillos guisados'),
(9, 'Alverja guisados'),
(10, 'Ensalada fría (tornillos)'),
(12, 'Ensalada rusa'),
(13, 'Migas'),
(14, 'Verduras calientes'),
(15, 'Frijoles'),
(16, 'Spaguetis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriensal`
--

CREATE TABLE `nutriensal` (
  `idNutriEnsal` int NOT NULL,
  `nutriEnsalNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriensal`
--

INSERT INTO `nutriensal` (`idNutriEnsal`, `nutriEnsalNombre`) VALUES
(1, 'Lechuga/ Zanahoria/ Cebolla/ Aguacate'),
(2, 'Pepino/ Apio/ Zanahoria Agridulce (cocida)'),
(3, 'Lechuga/ Ahuyama Rallada/ Maíz/ Vinagreta'),
(4, 'Lechuga/ Cebolla y Tomate'),
(5, 'Brocoli/ Zanahoria Gratinados/ Mayonesa'),
(6, 'Lechuga/ Ahuyama Rallada/ Maíz'),
(7, 'Remolacha y Zanahoria cocida con Mayonesa'),
(8, 'Zanahoria/ Lechuga/ Tomate y Mayonesa'),
(9, 'Lechuga/ Zanahoria/ Cebolla/ Aguacate'),
(10, 'Tajada de Aguacate'),
(11, 'Lechuga/ Maicitos/ Pepino'),
(12, 'Lechuga/ Pepino/ Zanahoria (Vinagreta)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutrimenu`
--

CREATE TABLE `nutrimenu` (
  `idNutriMenu` int NOT NULL,
  `idNutriTipo` int NOT NULL,
  `idNutriDias` int NOT NULL,
  `idNutriSopa` int NOT NULL,
  `idNutriArroz` int NOT NULL,
  `idNutriProte` int DEFAULT NULL,
  `idNutriEnerge` int DEFAULT NULL,
  `idNutriAcomp` int DEFAULT NULL,
  `idNutriEnsal` int NOT NULL,
  `idNutriBebida` int DEFAULT NULL,
  `idNutriSemana` int NOT NULL,
  `idMenuEmpaquetado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutrimenu`
--

INSERT INTO `nutrimenu` (`idNutriMenu`, `idNutriTipo`, `idNutriDias`, `idNutriSopa`, `idNutriArroz`, `idNutriProte`, `idNutriEnerge`, `idNutriAcomp`, `idNutriEnsal`, `idNutriBebida`, `idNutriSemana`, `idMenuEmpaquetado`) VALUES
(1, 1, 1, 1, 1, 22, 13, NULL, 2, NULL, 0, 1),
(2, 2, 1, 1, 1, 13, 2, 2, 2, NULL, 0, 1),
(3, 1, 2, 14, 2, 31, NULL, 3, 9, NULL, 0, 1),
(4, 2, 2, 14, 2, 24, NULL, 7, 9, NULL, 0, 1),
(5, 1, 3, 10, 6, 30, NULL, 4, 10, NULL, 0, 1),
(6, 2, 3, 10, 6, 26, 14, 6, 10, NULL, 0, 1),
(7, 1, 4, 4, 4, NULL, NULL, 7, 4, NULL, 0, 1),
(8, 2, 4, 4, 5, NULL, 6, 3, 4, NULL, 0, 1),
(10, 2, 5, 5, 1, 23, 15, 10, 8, NULL, 0, 1),
(11, 1, 1, 8, 2, 28, 10, 7, 12, NULL, 1, 1),
(12, 2, 1, 8, 2, 31, NULL, 22, 12, NULL, 1, 1),
(13, 1, 2, 9, 6, 3, NULL, 21, 2, NULL, 1, 1),
(14, 2, 2, 9, 6, 13, 12, NULL, 2, NULL, 1, 1),
(15, 1, 3, 10, 7, 22, 4, 20, 9, NULL, 1, 1),
(16, 2, 3, 10, 7, 5, NULL, 18, 9, NULL, 1, 1),
(17, 1, 4, 11, 1, 20, NULL, 3, 7, NULL, 1, 1),
(18, 2, 4, 11, 1, 29, NULL, 15, 7, NULL, 1, 1),
(19, 1, 5, 4, 4, NULL, NULL, 22, 9, NULL, 1, 1),
(20, 2, 5, 4, 5, 9, 16, 17, 9, NULL, 1, 1),
(21, 1, 5, 5, 1, 22, 12, NULL, 8, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutrimenupaci`
--

CREATE TABLE `nutrimenupaci` (
  `idNutriMenuPaci` int NOT NULL,
  `idNutriTipo` int NOT NULL,
  `idNutriDias` int NOT NULL,
  `idNutriSopa` int NOT NULL,
  `idNutriArroz` int NOT NULL,
  `idNutriProte` int DEFAULT NULL,
  `idNutriEnerge` int DEFAULT NULL,
  `idNutriAcomp` int DEFAULT NULL,
  `idNutriEnsal` int NOT NULL,
  `idNutriBebida` int DEFAULT NULL,
  `idNutriSemana` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `nutrimenupaci`
--

INSERT INTO `nutrimenupaci` (`idNutriMenuPaci`, `idNutriTipo`, `idNutriDias`, `idNutriSopa`, `idNutriArroz`, `idNutriProte`, `idNutriEnerge`, `idNutriAcomp`, `idNutriEnsal`, `idNutriBebida`, `idNutriSemana`) VALUES
(1, 1, 1, 1, 1, 22, 13, NULL, 2, NULL, 0),
(2, 2, 1, 1, 1, 13, 2, 2, 2, NULL, 0),
(3, 1, 2, 14, 2, 31, NULL, 3, 9, NULL, 0),
(4, 2, 2, 14, 2, 24, NULL, 7, 9, NULL, 0),
(5, 1, 3, 10, 6, 30, NULL, 4, 10, NULL, 0),
(6, 2, 3, 10, 6, 26, 14, 6, 10, NULL, 0),
(7, 1, 4, 4, 4, NULL, NULL, 7, 4, NULL, 0),
(8, 2, 4, 4, 5, NULL, 6, 3, 4, NULL, 0),
(9, 1, 5, 5, 1, 22, 12, 22, 8, NULL, 0),
(10, 2, 5, 5, 1, 23, 15, 10, 8, NULL, 0),
(11, 1, 1, 8, 2, 28, 10, 7, 12, NULL, 1),
(12, 2, 1, 8, 2, 31, NULL, 22, 12, NULL, 1),
(13, 1, 2, 9, 6, 3, NULL, 21, 2, NULL, 1),
(14, 2, 2, 9, 6, 13, 12, NULL, 2, NULL, 1),
(15, 1, 3, 10, 7, 22, 4, 20, 9, NULL, 1),
(16, 2, 3, 10, 7, 5, NULL, 18, 9, NULL, 1),
(17, 1, 4, 11, 1, 20, NULL, 3, 7, NULL, 1),
(18, 2, 4, 11, 1, 29, NULL, 15, 7, NULL, 1),
(19, 1, 5, 4, 4, NULL, NULL, 22, 9, NULL, 1),
(20, 2, 5, 4, 5, 9, 16, 17, 9, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutriprote`
--

CREATE TABLE `nutriprote` (
  `idNutriProte` int NOT NULL,
  `nutriProteNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutriprote`
--

INSERT INTO `nutriprote` (`idNutriProte`, `nutriProteNombre`) VALUES
(1, 'Pollo al horno'),
(2, 'Chuleta de tilapia'),
(3, 'Sobrebarriga al horno'),
(4, 'Ajiaco'),
(5, 'Sudado de pollo'),
(6, 'Baza al horno'),
(7, 'Baza sudado'),
(8, 'Gulasch de res'),
(9, 'Albóndigas'),
(10, 'Pepino relleno (carne molida)'),
(11, 'Cerdo en salsa agridulce'),
(12, 'Cerdo en bistec (encebollado)'),
(13, 'Lomo de tilapia'),
(14, 'Pollo en salsa de champiñones'),
(16, 'Pollo en salsa agridulce'),
(17, 'Pollo en salsa maracuya'),
(18, 'Pollo en miel mostaza'),
(20, 'Creps rellenos de carne'),
(22, 'Cerdo asado'),
(23, 'Carne asada'),
(24, 'Pollo a la jardinera'),
(25, 'Baza salsa criolla'),
(26, 'Carne en bistec'),
(27, 'Sobrebarriga en salsa criolla'),
(28, 'Pollo apanado'),
(29, 'Fricase de pollo'),
(30, 'Bagre salsa criolla'),
(31, 'Goulash');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutrisemana`
--

CREATE TABLE `nutrisemana` (
  `idNutriSemana` int NOT NULL,
  `nutriSemanaNombre` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nutriSemanaid` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutrisemana`
--

INSERT INTO `nutrisemana` (`idNutriSemana`, `nutriSemanaNombre`, `nutriSemanaid`) VALUES
(0, '0', 'Semana No.1'),
(1, '1', 'Semana No2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutrisopa`
--

CREATE TABLE `nutrisopa` (
  `idNutriSopa` int NOT NULL,
  `nutriSopaNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutrisopa`
--

INSERT INTO `nutrisopa` (`idNutriSopa`, `nutriSopaNombre`) VALUES
(1, 'Sopa de pastas'),
(4, 'Sopa de avena'),
(5, 'Sopa de cuchuco'),
(6, 'Sopa de cebada'),
(7, 'Crema de espinaca'),
(8, 'Sopa de colicero'),
(9, 'Sopa de arracacha'),
(10, 'Sopa de arroz'),
(11, 'Sancocho'),
(12, 'Sopa de Platano'),
(13, 'Crema de ahuyama'),
(14, 'Sopa de Mute'),
(15, 'Sopa de mondongo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutritipo`
--

CREATE TABLE `nutritipo` (
  `idNutriTipo` int NOT NULL,
  `nutriTipoNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutritipo`
--

INSERT INTO `nutritipo` (`idNutriTipo`, `nutriTipoNombre`) VALUES
(1, 'Menú No. 1'),
(2, 'Menú No. 2'),
(3, 'tipo 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutri_hora`
--

CREATE TABLE `nutri_hora` (
  `idNutriHora` int NOT NULL,
  `nutriHoraInicio` varchar(5) NOT NULL,
  `nutriHoraFinal` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `nutri_hora`
--

INSERT INTO `nutri_hora` (`idNutriHora`, `nutriHoraInicio`, `nutriHoraFinal`) VALUES
(1, '06:00', '10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcionesmenu`
--

CREATE TABLE `opcionesmenu` (
  `idOpcionMenu` int NOT NULL,
  `idMenu` int NOT NULL,
  `opcionMenuNombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `opcionMenuEnlace` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `opcionesmenu_folder` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `opcionMenuEstado` enum('online','offline','online/offline') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'online',
  `idRol` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `opcionesmenu`
--

INSERT INTO `opcionesmenu` (`idOpcionMenu`, `idMenu`, `opcionMenuNombre`, `opcionMenuEnlace`, `opcionesmenu_folder`, `opcionMenuEstado`, `idRol`) VALUES
(2, 3, 'Menu', 'frmRegMenu', 'frmSidebar', 'online', '3'),
(3, 1, 'Creación de Usuarios', 'frmRegUsuario', 'frmUsuarios', 'online', '3'),
(4, 1, 'Creacion de Empleados', 'frmEmplReg', 'frmEmpleado', 'online', '3'),
(5, 2, 'Perfiles de Usuario', 'frmRegRol', 'frmRol', 'online', '3'),
(6, 4, 'Almuerzo', 'frmDieta', 'frmPedPaci', 'online/offline', '1,2,3'),
(7, 5, 'Tipo Menu', 'frmAlmRegTipo', 'frmAlmTipo', 'online', '1'),
(8, 5, 'Sopa', 'frmAlmRegSopa', 'frmAlmSopa', 'online', '1'),
(9, 5, 'Acompañamiento', 'frmAlmRegAcomp', 'frmAlmAcomp', 'online', '1'),
(10, 5, 'Bebida', 'frmAlmRegBebida', 'frmAlmBebida', 'online', '1'),
(11, 5, 'Energetico', 'frmAlmRegEnerge', 'frmAlmEnerge', 'online', '1'),
(12, 5, 'Ensalada', 'frmAlmRegEnsal', 'frmAlmEnsal', 'online', '1'),
(13, 5, 'Proteina', 'frmAlmRegProte', 'frmAlmProte', 'online', '1'),
(14, 4, 'Menu', 'frmAlmRegMenu', 'frmAlmMenu', 'online', '1,3'),
(15, 5, 'Arroz', 'frmAlmRegArroz', 'frmAlmArroz', 'online', '1'),
(16, 4, 'Relación de Solicitudes', 'frmConPedMenu', 'frmPed', 'online', '1,3'),
(17, 3, 'Opciones Menu', 'frmRegOpcionesMenu', 'frmSidebarOption', 'online', '3'),
(18, 1, 'Creacion de Pacientes', 'frmPaciReg', 'frmPaciente', 'online', '1,3'),
(19, 4, 'Horario', 'frmAlmHora', 'frmHora', 'online', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int NOT NULL,
  `pacienteNombre` varchar(255) NOT NULL,
  `pacienteDocumento` varchar(20) NOT NULL,
  `pacienteTorre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pacienteCama` varchar(20) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersona` int NOT NULL,
  `personaNombreCompleto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personaNumberCell` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `personaCorreo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personaDocumento` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personasCodigo` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `personaDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `personaNombreCompleto`, `personaNumberCell`, `personaCorreo`, `personaDocumento`, `personasCodigo`, `personaDate`) VALUES
(1, 'Felipe Gavilan Castaño', '3156078058', 'felipegavilan2202@gmail.com', '1005958885', '957-269', '2024-03-05 07:49:44'),
(2, 'Ana E Sotelo', '', 'gtic.gaf.junicalmedicalsas@gmail.com', '52300674', NULL, NULL),
(3, 'Andres Fernando  Cardenas  Mappe', '3116681704', 'andrescardenas198612@gmail.com', '1108452460', NULL, '2024-02-02 07:24:45'),
(4, 'Adriana  Maria Suarez', '3213735855', 'adrianamsg.07@gmail.com', '66683773', NULL, '2024-02-23 09:07:58'),
(5, 'Cristina Ramirez', '3202013229', 'ancriraca@hotmail.com', '39561397', NULL, NULL),
(6, 'Jazmin Cordoba', '3125345829', 'idem_91@yahoo.com', '65703278', NULL, NULL),
(7, 'Jerjohry Lopez', '3214079944', 'jerjohry.abgderechomedico@gmail.com', '1127388592', NULL, NULL),
(8, 'Vasni Orjuela', '3172282679', 'vashad94@gmail.com', '1023938436', NULL, '2024-03-01 07:47:19'),
(9, 'Magda Valeria Mendez', '3112135412', 'gerencia@junicalmedical.com.co', '1019063981', NULL, NULL),
(10, 'Delly Vasquez', '3102009355', 'dellyvasquezg12@gmail.com', '1010170895', NULL, NULL),
(11, 'Maria Paula diaz Tibaquira', '3133326578', 'paulita5491@gmail.com', '1007600126', NULL, NULL),
(12, 'Luz Adriana Rocha', '3138259255', 'adrianarochagonzalez@gmail.com', '1013623037', '860-220', '2024-03-05 08:47:52'),
(13, 'Paola prada', '3144667314', 'jpprada85@gmail.com', '28719410', '395-761', '2024-03-05 08:41:19'),
(14, 'Carol Liliana Segura', '3133952104', 'carol841216_@hotmail.com', '30946051', NULL, '2024-03-01 09:14:19'),
(15, 'Katherin Chapeton', '3108020245', 'katherinechapetonmontes@hotmail.com', '52430554', NULL, NULL),
(16, 'Alexandra Castillo Melo', '3125918630', 'alei2324@hotmail.com', '39575732', NULL, NULL),
(17, 'Lina Paola Camacho', '3183770738', 'linapa_26@hotmail.com', '1075627087', NULL, '2024-02-28 07:19:31'),
(18, 'Lina Vargas', '3224306731', 'limar0813@hotmail.com', '1070586254', '208-832', '2024-03-05 09:01:30'),
(19, 'Sandra Angelina Rivero', '3118773934', 'saanri@gmail.com', '39576159', NULL, '2024-03-01 09:05:05'),
(20, 'Alejandra Martinez', '3215648693', 'aleja04227@hotmail.com', '1070609612', NULL, '2024-02-29 08:43:09'),
(21, 'Miguel ureuña', '3118287066', 'pecuniamia@hotmail.com', '1070587669', NULL, NULL),
(22, 'Carolina mateus', '3132667767', 'contratacion@junicalmedical.com.co', '1098604129', NULL, '2024-03-04 08:12:08'),
(23, 'Nicol Lopez', '3144900548', 'nicol_lopez115@hotmail.com', '1072426086', NULL, NULL),
(24, 'Alana cardenas mappe', '3115058534', 'alisonk1234@hotmail.com', '1108454182', NULL, '2024-03-01 09:00:36'),
(25, 'Liliana alonso', '3204777271', 'lalonsoo@junical.com.co', '52441802', '552-317', '2024-03-05 07:47:50'),
(26, 'Lina Maria Ramirez Valderrama', '3115708105', 'linamariaramirezv@hotmail.com', '39566602', NULL, NULL),
(27, 'Natalia Huertas Cruz ', '3169143008', 'nataycami.05@hotmail.com', '1106890370', '951-488', '2024-03-05 07:30:19'),
(28, 'Veronica Botero ', '3125530199', 'veronicaboterodelgado@hotmail.com', '1192723340', NULL, '2024-02-28 08:51:36'),
(29, 'Valentina Medina', '3103226767', 'valentinajessica@hotmail.com ', '1106901229', NULL, '2024-02-10 09:03:20'),
(30, 'Angela Gutierrez', '3123727006', 'angelagutierrez09@gmail.com ', '39580273', NULL, NULL),
(31, 'Sirley Cardona ', '3007583471', 'sirleycardonap@gmail.com', '1013609884', NULL, NULL),
(32, 'Yury Fernanda Duran Laguna ', '3208259416', 'yuryduranlaguna1801@hotmail.com ', '1108453490', '205-955', '2024-03-05 08:08:17'),
(33, 'Lina Ardila ', '3204741771', 'ljohanaar@hotmail.com', '52762910', NULL, '2024-02-05 08:29:53'),
(34, 'Diego Abril ', '3014374730', 'daabril07@gmail.com ', '1071987574', NULL, NULL),
(35, 'Lina Rocha', '3125033141', 'lbelenrocha@hotmail.com', '1070604353', NULL, NULL),
(36, 'Yenifer Martinez', '3132893637', 'maye0412tavera@gmail.com ', '1070600291', NULL, NULL),
(37, 'Jiovanna Escobar ', '3016717078', 'jandreaescobar@hotmail.com', '1070627747', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int NOT NULL,
  `rolNombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rolNombre`) VALUES
(1, 'Administradores'),
(3, 'root'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `usuarioLogin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuarioPassword` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuarioEstado` enum('Activo','Inactivo') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idPersona` int NOT NULL,
  `idRol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuarioLogin`, `usuarioPassword`, `usuarioEstado`, `idPersona`, `idRol`) VALUES
(1, 'Asotelo', '1234', 'Activo', 2, 1),
(2, 'Fgavilac', '1234', 'Activo', 1, 3),
(3, 'Sleon', '1212', 'Activo', 1, 1),
(4, 'Fgavilanc', '1234', 'Activo', 1, 1),
(6, 'Acardenm', '123456', 'Activo', 3, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_nutrimenu`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_nutrimenu` (
`idNutriMenu` int
,`nutriTipoNombre` varchar(45)
,`nutriDiasNombre` varchar(45)
,`nutriSopaNombre` varchar(45)
,`nutriArrozNombre` varchar(45)
,`nutriProteNombre` varchar(45)
,`nutriEnergeNombre` varchar(45)
,`nutriAcompNombre` varchar(45)
,`nutriEnsalNombre` varchar(45)
,`nutriBebidaNombre` varchar(45)
,`nutriSemanaNombre` varchar(5)
,`nutriSemanaid` varchar(45)
,`nombreEmpaquetado` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `View_nutrimenupaci`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `View_nutrimenupaci` (
`idNutriMenuPaci` int
,`nutriTipoNombre` varchar(45)
,`nutriDiasNombre` varchar(45)
,`nutriSopaNombre` varchar(45)
,`nutriArrozNombre` varchar(45)
,`nutriProteNombre` varchar(45)
,`nutriEnergeNombre` varchar(45)
,`nutriAcompNombre` varchar(45)
,`nutriEnsalNombre` varchar(45)
,`nutriBebidaNombre` varchar(45)
,`nutriSemanaNombre` varchar(5)
,`nutriSemanaid` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_nutrimenu`
--
DROP TABLE IF EXISTS `view_nutrimenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_nutrimenu`  AS SELECT `nutrimenu`.`idNutriMenu` AS `idNutriMenu`, `nutritipo`.`nutriTipoNombre` AS `nutriTipoNombre`, `nutridias`.`nutriDiasNombre` AS `nutriDiasNombre`, `nutrisopa`.`nutriSopaNombre` AS `nutriSopaNombre`, `nutriarroz`.`nutriArrozNombre` AS `nutriArrozNombre`, `nutriprote`.`nutriProteNombre` AS `nutriProteNombre`, `nutrienerge`.`nutriEnergeNombre` AS `nutriEnergeNombre`, `nutriacomp`.`nutriAcompNombre` AS `nutriAcompNombre`, `nutriensal`.`nutriEnsalNombre` AS `nutriEnsalNombre`, `nutribebida`.`nutriBebidaNombre` AS `nutriBebidaNombre`, `nutrisemana`.`nutriSemanaNombre` AS `nutriSemanaNombre`, `nutrisemana`.`nutriSemanaid` AS `nutriSemanaid`, `nutriempaquetado`.`nombreEmpaquetado` AS `nombreEmpaquetado` FROM (((((((((((`nutrimenu` left join `nutritipo` on((`nutrimenu`.`idNutriTipo` = `nutritipo`.`idNutriTipo`))) left join `nutridias` on((`nutrimenu`.`idNutriDias` = `nutridias`.`idNutriDias`))) left join `nutrisopa` on((`nutrimenu`.`idNutriSopa` = `nutrisopa`.`idNutriSopa`))) left join `nutriarroz` on((`nutrimenu`.`idNutriArroz` = `nutriarroz`.`idNutriArroz`))) left join `nutriprote` on((`nutrimenu`.`idNutriProte` = `nutriprote`.`idNutriProte`))) left join `nutrienerge` on((`nutrimenu`.`idNutriEnerge` = `nutrienerge`.`idNutriEnerge`))) left join `nutriacomp` on((`nutrimenu`.`idNutriAcomp` = `nutriacomp`.`idNutriAcomp`))) left join `nutriensal` on((`nutrimenu`.`idNutriEnsal` = `nutriensal`.`idNutriEnsal`))) left join `nutribebida` on((`nutrimenu`.`idNutriBebida` = `nutribebida`.`idNutriBebida`))) left join `nutrisemana` on((`nutrimenu`.`idNutriSemana` = `nutrisemana`.`idNutriSemana`))) left join `nutriempaquetado` on((`nutrimenu`.`idMenuEmpaquetado` = `nutriempaquetado`.`idMenuEmpaquetado`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `View_nutrimenupaci`
--
DROP TABLE IF EXISTS `View_nutrimenupaci`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `View_nutrimenupaci`  AS SELECT `nutrimenupaci`.`idNutriMenuPaci` AS `idNutriMenuPaci`, `nutritipo`.`nutriTipoNombre` AS `nutriTipoNombre`, `nutridias`.`nutriDiasNombre` AS `nutriDiasNombre`, `nutrisopa`.`nutriSopaNombre` AS `nutriSopaNombre`, `nutriarroz`.`nutriArrozNombre` AS `nutriArrozNombre`, `nutriprote`.`nutriProteNombre` AS `nutriProteNombre`, `nutrienerge`.`nutriEnergeNombre` AS `nutriEnergeNombre`, `nutriacomp`.`nutriAcompNombre` AS `nutriAcompNombre`, `nutriensal`.`nutriEnsalNombre` AS `nutriEnsalNombre`, `nutribebida`.`nutriBebidaNombre` AS `nutriBebidaNombre`, `nutrisemana`.`nutriSemanaNombre` AS `nutriSemanaNombre`, `nutrisemana`.`nutriSemanaid` AS `nutriSemanaid` FROM ((((((((((`nutrimenupaci` left join `nutritipo` on((`nutrimenupaci`.`idNutriTipo` = `nutritipo`.`idNutriTipo`))) left join `nutridias` on((`nutrimenupaci`.`idNutriDias` = `nutridias`.`idNutriDias`))) left join `nutrisopa` on((`nutrimenupaci`.`idNutriSopa` = `nutrisopa`.`idNutriSopa`))) left join `nutriarroz` on((`nutrimenupaci`.`idNutriArroz` = `nutriarroz`.`idNutriArroz`))) left join `nutriprote` on((`nutrimenupaci`.`idNutriProte` = `nutriprote`.`idNutriProte`))) left join `nutrienerge` on((`nutrimenupaci`.`idNutriEnerge` = `nutrienerge`.`idNutriEnerge`))) left join `nutriacomp` on((`nutrimenupaci`.`idNutriAcomp` = `nutriacomp`.`idNutriAcomp`))) left join `nutriensal` on((`nutrimenupaci`.`idNutriEnsal` = `nutriensal`.`idNutriEnsal`))) left join `nutribebida` on((`nutrimenupaci`.`idNutriBebida` = `nutribebida`.`idNutriBebida`))) left join `nutrisemana` on((`nutrimenupaci`.`idNutriSemana` = `nutrisemana`.`idNutriSemana`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indices de la tabla `menu_seleccionado`
--
ALTER TABLE `menu_seleccionado`
  ADD PRIMARY KEY (`idMenuSeleccionado`),
  ADD KEY `idPersona` (`idPersona`),
  ADD KEY `idNutriMenu` (`idNutriMenu`);

--
-- Indices de la tabla `menu_seleccionado_paci`
--
ALTER TABLE `menu_seleccionado_paci`
  ADD PRIMARY KEY (`idMenuSeleccionadoPaci`),
  ADD KEY `idPaciente` (`idPaciente`),
  ADD KEY `idNutriMenuPaci` (`idNutriMenuPaci`);

--
-- Indices de la tabla `nutriacomp`
--
ALTER TABLE `nutriacomp`
  ADD PRIMARY KEY (`idNutriAcomp`);

--
-- Indices de la tabla `nutriarroz`
--
ALTER TABLE `nutriarroz`
  ADD PRIMARY KEY (`idNutriArroz`);

--
-- Indices de la tabla `nutribebida`
--
ALTER TABLE `nutribebida`
  ADD PRIMARY KEY (`idNutriBebida`);

--
-- Indices de la tabla `nutridias`
--
ALTER TABLE `nutridias`
  ADD PRIMARY KEY (`idNutriDias`);

--
-- Indices de la tabla `nutriempaquetado`
--
ALTER TABLE `nutriempaquetado`
  ADD PRIMARY KEY (`idMenuEmpaquetado`);

--
-- Indices de la tabla `nutrienerge`
--
ALTER TABLE `nutrienerge`
  ADD PRIMARY KEY (`idNutriEnerge`);

--
-- Indices de la tabla `nutriensal`
--
ALTER TABLE `nutriensal`
  ADD PRIMARY KEY (`idNutriEnsal`);

--
-- Indices de la tabla `nutrimenu`
--
ALTER TABLE `nutrimenu`
  ADD PRIMARY KEY (`idNutriMenu`),
  ADD KEY `idNutriTipo` (`idNutriTipo`),
  ADD KEY `idNutriDias` (`idNutriDias`),
  ADD KEY `idNutriSopa` (`idNutriSopa`),
  ADD KEY `idNutriArroz` (`idNutriArroz`),
  ADD KEY `idNutriProte` (`idNutriProte`),
  ADD KEY `idNutriEnerge` (`idNutriEnerge`),
  ADD KEY `idNutriAcomp` (`idNutriAcomp`),
  ADD KEY `idNutriEnsal` (`idNutriEnsal`),
  ADD KEY `idNutriBebida` (`idNutriBebida`),
  ADD KEY `idNutriSemana` (`idNutriSemana`),
  ADD KEY `fk_MenuEmpaquetado` (`idMenuEmpaquetado`);

--
-- Indices de la tabla `nutrimenupaci`
--
ALTER TABLE `nutrimenupaci`
  ADD PRIMARY KEY (`idNutriMenuPaci`),
  ADD KEY `idNutriTipo` (`idNutriTipo`),
  ADD KEY `idNutriDias` (`idNutriDias`),
  ADD KEY `idNutriSopa` (`idNutriSopa`),
  ADD KEY `idNutriArroz` (`idNutriArroz`),
  ADD KEY `idNutriProte` (`idNutriProte`),
  ADD KEY `idNutriEnerge` (`idNutriEnerge`),
  ADD KEY `idNutriAcomp` (`idNutriAcomp`),
  ADD KEY `idNutriEnsal` (`idNutriEnsal`),
  ADD KEY `idNutriBebida` (`idNutriBebida`),
  ADD KEY `idNutriSemana` (`idNutriSemana`);

--
-- Indices de la tabla `nutriprote`
--
ALTER TABLE `nutriprote`
  ADD PRIMARY KEY (`idNutriProte`);

--
-- Indices de la tabla `nutrisemana`
--
ALTER TABLE `nutrisemana`
  ADD PRIMARY KEY (`idNutriSemana`);

--
-- Indices de la tabla `nutrisopa`
--
ALTER TABLE `nutrisopa`
  ADD PRIMARY KEY (`idNutriSopa`);

--
-- Indices de la tabla `nutritipo`
--
ALTER TABLE `nutritipo`
  ADD PRIMARY KEY (`idNutriTipo`);

--
-- Indices de la tabla `nutri_hora`
--
ALTER TABLE `nutri_hora`
  ADD PRIMARY KEY (`idNutriHora`);

--
-- Indices de la tabla `opcionesmenu`
--
ALTER TABLE `opcionesmenu`
  ADD PRIMARY KEY (`idOpcionMenu`),
  ADD KEY `FK-idMenu-opcionesmenu_idx` (`idMenu`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`),
  ADD UNIQUE KEY `rolNombre` (`rolNombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `login` (`usuarioLogin`),
  ADD UNIQUE KEY `usuarioLogin_2` (`usuarioLogin`),
  ADD KEY `idPersona` (`idPersona`),
  ADD KEY `usuarioLogin` (`usuarioLogin`),
  ADD KEY `FK_idRol_Roles` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `idMenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `menu_seleccionado`
--
ALTER TABLE `menu_seleccionado`
  MODIFY `idMenuSeleccionado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT de la tabla `menu_seleccionado_paci`
--
ALTER TABLE `menu_seleccionado_paci`
  MODIFY `idMenuSeleccionadoPaci` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nutriacomp`
--
ALTER TABLE `nutriacomp`
  MODIFY `idNutriAcomp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `nutriarroz`
--
ALTER TABLE `nutriarroz`
  MODIFY `idNutriArroz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nutribebida`
--
ALTER TABLE `nutribebida`
  MODIFY `idNutriBebida` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `nutridias`
--
ALTER TABLE `nutridias`
  MODIFY `idNutriDias` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nutriempaquetado`
--
ALTER TABLE `nutriempaquetado`
  MODIFY `idMenuEmpaquetado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `nutrienerge`
--
ALTER TABLE `nutrienerge`
  MODIFY `idNutriEnerge` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `nutriensal`
--
ALTER TABLE `nutriensal`
  MODIFY `idNutriEnsal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `nutrimenu`
--
ALTER TABLE `nutrimenu`
  MODIFY `idNutriMenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `nutrimenupaci`
--
ALTER TABLE `nutrimenupaci`
  MODIFY `idNutriMenuPaci` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `nutriprote`
--
ALTER TABLE `nutriprote`
  MODIFY `idNutriProte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `nutrisopa`
--
ALTER TABLE `nutrisopa`
  MODIFY `idNutriSopa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `nutritipo`
--
ALTER TABLE `nutritipo`
  MODIFY `idNutriTipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nutri_hora`
--
ALTER TABLE `nutri_hora`
  MODIFY `idNutriHora` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `opcionesmenu`
--
ALTER TABLE `opcionesmenu`
  MODIFY `idOpcionMenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu_seleccionado_paci`
--
ALTER TABLE `menu_seleccionado_paci`
  ADD CONSTRAINT `menu_seleccionado_ibfk_3` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `menu_seleccionado_ibfk_4` FOREIGN KEY (`idNutriMenuPaci`) REFERENCES `nutrimenupaci` (`idNutriMenuPaci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
