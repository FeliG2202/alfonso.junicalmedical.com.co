-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 06-12-2023 a las 15:08:36
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
  `fecha_actual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(2, 'Monedas de Platano'),
(3, 'Papa Francesa'),
(4, 'Papa, Yuca (Salsa Criolla)'),
(5, 'Croquetas de arracacha'),
(6, 'Aborrajado'),
(7, 'Croquetas de yuca'),
(8, 'Papas Doradas'),
(9, 'Papa Criolla Frita'),
(10, 'Maduro al Horno'),
(11, 'Papa Chorreada'),
(12, 'Yuca al Vapor'),
(13, 'Maduro Cocinado'),
(14, 'Pure de Papa'),
(15, 'Yuca Frita'),
(16, 'Papa Salada'),
(17, 'Plátano al Horno'),
(18, 'Papa y Yuca'),
(19, 'Maduro Melado'),
(20, 'Tajada Madura'),
(21, 'Papa, Yuca, Mazorca (Guacamole)');

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
(6, 'Arroz de zanahoria'),
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
(1, 'Jugo de Fresa'),
(2, 'Jugo de Feijoa'),
(3, 'Jugo de Naranja'),
(4, 'Jugo de Guayaba'),
(5, 'Jugo de Piña'),
(6, 'Jugo de Tomate de Arbol'),
(8, 'Jugo de Mango'),
(9, 'Jugo de Mora'),
(10, 'Jugo de Papaya');

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
(1, 'Para Recoger ');

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
(1, 'Garbanzos Guisados'),
(2, 'Macarrones Guisados'),
(3, 'Frijol Cabeza Negra'),
(4, 'Lentejas Guisadas'),
(5, 'Habichuelas'),
(6, 'Spaguetti  Boloñesa'),
(7, 'Alverjas'),
(8, 'Tornillos Guisados'),
(9, 'Alverja Guisados'),
(10, 'Ensalada Fria'),
(12, 'Ensalada Rusa'),
(13, 'Migas'),
(14, 'Verduras Calientes');

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
(1, 1, 5, 4, 4, NULL, NULL, 9, 1, NULL, 1, 1),
(3, 1, 5, 5, 1, 22, 12, 9, 8, NULL, 0, 1),
(4, 2, 5, 5, 1, 23, 3, 10, 8, NULL, 0, 1),
(5, 2, 5, 4, 5, 9, 2, 17, 1, NULL, 1, 1),
(6, 1, 1, 1, 1, 1, 13, NULL, 2, NULL, 0, 1),
(7, 2, 1, 1, 1, 13, 2, 2, 2, NULL, 0, 1),
(8, 1, 2, 14, 2, 8, NULL, 3, 1, NULL, 0, 1),
(9, 2, 2, 14, 2, 24, NULL, 7, 1, NULL, 0, 1),
(10, 1, 3, 15, 7, 25, NULL, 4, 10, NULL, 0, 1),
(11, 2, 3, 15, 7, 26, 14, 6, 10, NULL, 0, 1),
(12, 1, 4, 4, 4, NULL, NULL, 7, 4, NULL, 0, 1),
(13, 2, 4, 4, 5, NULL, 6, 16, 4, NULL, 0, 1),
(16, 1, 6, 6, 1, 28, 12, NULL, 11, NULL, 0, 1),
(17, 2, 6, 6, 1, 27, NULL, 18, 11, NULL, 0, 1),
(18, 1, 4, 11, 1, 20, NULL, 3, 7, NULL, 1, 1),
(19, 2, 4, 11, 1, 29, NULL, 15, 7, NULL, 1, 1),
(20, 1, 3, 15, 1, 22, 4, 20, 9, NULL, 1, 1),
(21, 2, 3, 15, 1, 5, NULL, 21, 9, NULL, 1, 1),
(22, 1, 1, 8, 2, 28, 10, 7, 12, NULL, 1, 1),
(23, 2, 1, 8, 2, 8, NULL, 9, 12, NULL, 1, 1),
(24, 1, 2, 9, 6, 3, NULL, 21, 2, NULL, 1, 1),
(25, 2, 2, 9, 6, 13, 10, 6, 2, NULL, 1, 1),
(26, 1, 6, 14, 6, 23, 12, 19, 5, NULL, 1, 1),
(27, 2, 6, 14, 6, 13, 4, 19, 5, NULL, 1, 1);

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
  `idNutriProte` int NOT NULL,
  `idNutriEnerge` int NOT NULL,
  `idNutriAcomp` int NOT NULL,
  `idNutriEnsal` int NOT NULL,
  `idNutriBebida` int NOT NULL,
  `idNutriSemana` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(2, 'Chuleta de Tilapia'),
(3, 'Sobrebarriga al Horno'),
(4, 'Ajiaco'),
(5, 'Sudado de Pollo'),
(6, 'Baza al Horno'),
(7, 'Baza sudado'),
(8, 'Gulasch de Res'),
(9, 'Albondigas en Salsa'),
(10, 'Pepino Relleno (Carne Molida)'),
(11, 'Cerdo en Salsa Agridulce'),
(12, 'Cerdo en Bistec (encebollado)'),
(13, 'Lomo en Tilapia'),
(14, 'Pollo en Salsa de Champiñones'),
(15, 'Sobrebarriga en salssa Criolla'),
(16, 'Pollo en Salsa Agridulce'),
(17, 'Pollo en Salsa Maracuya'),
(18, 'Pollo en Miel Mostaza'),
(19, 'Gulasch de Cerdo'),
(20, 'Creps Rellenos de Carne'),
(22, 'Cerdo Asado'),
(23, 'Carne Asada'),
(24, 'Pollo a la Jardinera'),
(25, 'Baza Salsa Criolla'),
(26, 'Carne en Bistec'),
(27, 'Sobrebarriga en Salsa Criolla'),
(28, 'Pollo Apanado'),
(29, 'Fricase de Pollo');

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
(8, 'Sopa Colicero'),
(9, 'Sopa de Arracacha'),
(10, 'Sopa de Arroz'),
(11, 'Sancocho'),
(12, 'Sopa de Platano'),
(13, 'Crema de Ahuyama'),
(14, 'Sopa de Mute'),
(15, 'Sopa de Mondongo');

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
(2, 'Menú No. 2');

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
(18, 1, 'Creacion de Pacientes', 'frmPaciReg', 'frmPaciente', 'online', '1,3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int NOT NULL,
  `pacienteNombre` varchar(255) NOT NULL,
  `pacienteDocumento` varchar(20) NOT NULL,
  `pacienteDieta` varchar(100) DEFAULT NULL,
  `pacienteCama` varchar(20) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idPaciente`, `pacienteNombre`, `pacienteDocumento`, `pacienteDieta`, `pacienteCama`, `fecha_registro`) VALUES
(1, 'Felipe Gavilan Castaño', '1005958885', 'Normal', '305', NULL),
(2, 'Andre Castaño Molina', '123456789', 'liquida', '406', NULL),
(3, 'Ana E Sotelo', '52300674', 'Normal', '302', NULL),
(4, 'felipe gavilan cataño prueba', '1005958888', 'normal', '504', NULL),
(13, 'felipe gavilan', '1005958885', '122', '351B', '2023-12-06');

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
  `personasCodigo` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `personaNombreCompleto`, `personaNumberCell`, `personaCorreo`, `personaDocumento`, `personasCodigo`) VALUES
(1, 'Felipe Gavilan Castaño', '3156078058', 'felipegavilan2202@gmail.com', '1005958885', '706-962'),
(2, 'Andre Castaño Molina', '3156530301', 'fgavilac@junical.com.co', '123456789', '719-566'),
(3, 'Ana E Sotelo', '', 'gtic.gaf.junicalmedicalsas@gmail.com', '52300674', '203-205'),
(4, 'Adriana Maria Suarez', '', 'adrianamsg.07@gmail.com', '66683773', NULL),
(5, 'Cristina Ramirez', NULL, 'ancriraca@hotmail.com', '39561397', NULL),
(6, 'Jazmín Córdoba', NULL, 'idem_91@yahoo.com', '65703278', NULL),
(7, 'Jerjohry Lopez', NULL, 'jerjohry.abgderechomedico@gmail.com', '1127388592', NULL),
(8, 'Vasni Orjuela', NULL, 'vashad94@gmail.com', '1023938436', NULL),
(9, 'Magda Valeria Mendez', NULL, 'gerencia@junicalmedical.com.co', '1019063981', NULL),
(10, 'Delly Vasquez', NULL, 'dellyvasquez@hotmail.com', '1010170895', NULL),
(11, 'Maria Paula Diaz Tibaquira', NULL, 'paulita5491@gmail.com', '1007600126', NULL),
(12, 'Luz Adriana Rocha', NULL, 'adrianarochagonzalez@gmail.com', '1013623037', NULL),
(13, 'Paola Prada', NULL, 'jpprada85@gmail.com', '28719410', NULL),
(14, 'Carol Liliana Segura', NULL, 'carol841216@hotmail.com', '30946051', NULL),
(15, 'Katherin Chapeton', NULL, 'katherinechapetonmontes@hotmail.com', '52430554', NULL),
(16, 'Andres Fernando  Cardenas  Mappe', '3116681704', 'andrescardenas198612@gmail.com', '1108452460', NULL),
(17, 'felipe gavilan prueba', '234556', 'felipegavilan2202@gmail.co', '1005958886', NULL),
(18, 'luz stella castaño', NULL, 'luzkasta10@gmail.com', '65820125', NULL);

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
(1, 'Asotelo', '1234', 'Activo', 3, 1),
(2, 'Fgavilac', '1234', 'Activo', 1, 3),
(3, 'Sleon', '1212', 'Activo', 2, 1),
(4, 'Fgavilanc', '1234', 'Activo', 1, 1),
(5, 'Acastañom', '123456', 'Inactivo', 2, 1),
(6, 'Acardenm', '123456', 'Activo', 16, 1);

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
  MODIFY `idMenuSeleccionado` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu_seleccionado_paci`
--
ALTER TABLE `menu_seleccionado_paci`
  MODIFY `idMenuSeleccionadoPaci` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nutriacomp`
--
ALTER TABLE `nutriacomp`
  MODIFY `idNutriAcomp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `idNutriEnerge` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `nutriensal`
--
ALTER TABLE `nutriensal`
  MODIFY `idNutriEnsal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `nutrimenu`
--
ALTER TABLE `nutrimenu`
  MODIFY `idNutriMenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `nutrimenupaci`
--
ALTER TABLE `nutrimenupaci`
  MODIFY `idNutriMenuPaci` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nutriprote`
--
ALTER TABLE `nutriprote`
  MODIFY `idNutriProte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `nutrisopa`
--
ALTER TABLE `nutrisopa`
  MODIFY `idNutriSopa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `nutritipo`
--
ALTER TABLE `nutritipo`
  MODIFY `idNutriTipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `opcionesmenu`
--
ALTER TABLE `opcionesmenu`
  MODIFY `idOpcionMenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
