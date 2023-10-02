-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 02-10-2023 a las 14:47:35
-- Versión del servidor: 8.1.0
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
(1, 'Personas', 'online', '3'),
(2, 'Usuarios', 'online', '3'),
(3, 'Perfiles', 'online', '3'),
(4, 'Menu', 'online', '3'),
(10, 'Perfiles Usuario', 'online', '3'),
(11, 'Formulario', 'online/offline', '1,2,3'),
(12, 'Ingresar Menú Almuerzo', 'online', '1');

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
  `fecha_actual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `menu_seleccionado`
--

INSERT INTO `menu_seleccionado` (`idMenuSeleccionado`, `idPersona`, `idNutriMenu`, `nutriSopaNombre`, `nutriArrozNombre`, `nutriProteNombre`, `nutriEnergeNombre`, `nutriAcompNombre`, `nutriEnsalNombre`, `nutriBebidaNombre`, `fecha_actual`) VALUES
(4, 1, 7, 'Sopa de avena', 'Arroz con Pollo', 'Pollo en Miel Mostaza', 'Tornillos Guisados', '', '', '', '2023-09-28'),
(5, 1, 9, 'Sopa de cuchuco', '', '', 'Hbichuelas', '', '', 'Jugo de Tomate de Arbol', '2023-09-29');

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

--
-- Volcado de datos para la tabla `menu_seleccionado_paci`
--

INSERT INTO `menu_seleccionado_paci` (`idMenuSeleccionadoPaci`, `idPaciente`, `idNutriMenuPaci`, `nutriSopaNombre`, `nutriArrozNombre`, `nutriProteNombre`, `nutriEnergeNombre`, `nutriAcompNombre`, `nutriEnsalNombre`, `nutriBebidaNombre`, `fecha_actual`) VALUES
(8, 1, 6, 'Sopa de mute', 'Arroz con Fideo', 'Chuleta de Tilapia', 'Macarrones Guisados', 'Monedas de Platano', 'Pepino/Apio/Zanahoria', 'Jugo de Feijoa', '2023-10-02');

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
(4, 'Papa, yuca en salsa criolla'),
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
(15, 'Yuca Frita');

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
(6, 'Arroz de zanahoria');

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
(3, 'Frijoles'),
(4, 'Lentejas Guisadas'),
(5, 'Habichuelas'),
(6, 'spaguetih'),
(7, 'Alverjas'),
(8, 'Tornillos Guisados'),
(9, 'Alverja Guisados'),
(10, 'Ensalada Fria');

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
(1, 'Lechuga/zanahoria/Cebolla/Aguacate'),
(2, 'Pepino/Apio/Zanahoria'),
(3, 'Lechuga/Ahuyama Rallada/Maiz/Binagreta'),
(4, 'Lechuga/Cebolla y Tomate'),
(5, 'Brocoli/zanahoria Gratinados/Mayonesa'),
(6, 'Lechuga/Ahuyama Rallada/Maiz'),
(7, 'Remolacha y Zanahoria cocida con Mayonesa');

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
  `idNutriProte` int NOT NULL,
  `idNutriEnerge` int DEFAULT NULL,
  `idNutriAcomp` int NOT NULL,
  `idNutriEnsal` int NOT NULL,
  `idNutriBebida` int NOT NULL,
  `idNutriSemana` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nutrimenu`
--

INSERT INTO `nutrimenu` (`idNutriMenu`, `idNutriTipo`, `idNutriDias`, `idNutriSopa`, `idNutriArroz`, `idNutriProte`, `idNutriEnerge`, `idNutriAcomp`, `idNutriEnsal`, `idNutriBebida`, `idNutriSemana`) VALUES
(1, 1, 7, 1, 1, 1, 1, 1, 1, 1, 1),
(19, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

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

--
-- Volcado de datos para la tabla `nutrimenupaci`
--

INSERT INTO `nutrimenupaci` (`idNutriMenuPaci`, `idNutriTipo`, `idNutriDias`, `idNutriSopa`, `idNutriArroz`, `idNutriProte`, `idNutriEnerge`, `idNutriAcomp`, `idNutriEnsal`, `idNutriBebida`, `idNutriSemana`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 2, 1, 2, 2, 2, 2, 1, 2, 2, 1),
(8, 1, 1, 2, 1, 15, 1, 14, 2, 3, 1);

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
(20, 'Creps Rellenos de Carne');

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
(2, 'Sopa de mute'),
(3, 'Sopa de verduras'),
(4, 'Sopa de avena'),
(5, 'Sopa de cuchuco'),
(6, 'Sopa de cebada'),
(7, 'Crema de espinaca'),
(8, 'Sopa Colicero'),
(9, 'Sopa de Arracacha'),
(10, 'Sopa de Arroz'),
(11, 'Sancocho'),
(12, 'Sopa de Platano'),
(13, 'Crema de Ahuyama');

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
(6, 4, 'registrar Opciones Menu', 'frmRegOpcionesMenu', 'frmMenu', 'online', '3'),
(7, 4, 'registrar Menu', 'frmRegMenu', 'frmMenu', 'online', '3'),
(8, 4, 'Consultar Menu', 'frmConMenu', 'frmMenu', 'online', '3'),
(12, 1, 'Registrar personas', 'frmRegPersona', 'frmPersona', 'online', '3'),
(13, 2, 'registrar Usuarios', 'frmRegUsuario', 'frmUsuarios', 'online', '3'),
(14, 1, 'consultar personas', 'FrmConPersona', 'frmPersona', 'online', '3'),
(15, 2, 'Consultar Usuarios', 'frmConUsuarios', 'frmUsuarios', 'online', '3'),
(16, 3, 'registrar perfiles', 'frmRegRol', 'frmRol', 'online', '3'),
(17, 10, 'Registrar Rol Usuario', 'frmRegRolUsuario', 'frmRol', 'online', '3'),
(18, 4, 'Asignar Menu Principal a Perfiles', 'frmRegRolMenu', 'frmMenu', 'online', '3'),
(19, 11, 'Almuerzo', 'frmDieta', 'frmPedPaci', 'online/offline', '1,2,3'),
(20, 12, 'Tipo Menu', 'frmAlmRegTipo', 'frmAlmTipo', 'online', '1'),
(21, 12, 'Sopa', 'frmAlmRegSopa', 'frmAlmSopa', 'online', '1'),
(22, 12, 'Acompañamiento', 'frmAlmRegAcomp', 'frmAlmAcomp', 'online', '1'),
(23, 12, 'Bebida', 'frmAlmRegBebida', 'frmAlmBebida', 'online', '1'),
(24, 12, 'Energetico', 'frmAlmRegEnerge', 'frmAlmEnerge', 'online', '1'),
(25, 12, 'Ensalada', 'frmAlmRegEnsal', 'frmAlmEnsal', 'online', '1'),
(26, 12, 'Proteina', 'frmAlmRegProte', 'frmAlmProte', 'online', '1'),
(27, 11, 'Menu', 'frmAlmRegMenu', 'frmAlmMenu', 'online', '1,3'),
(28, 12, 'Arroz', 'frmAlmRegArroz', 'frmAlmArroz', 'online', '1'),
(29, 10, 'Registrar Perfil', 'frmRegRol', 'frmRol', 'online', '1'),
(30, 11, 'Relación de Solicitudes', 'frmConPedMenu', 'frmPed', 'online', '1,3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `idPaciente` int NOT NULL,
  `pacienteNombre` varchar(255) NOT NULL,
  `pacienteDocumento` varchar(20) NOT NULL,
  `pacienteDieta` varchar(100) DEFAULT NULL,
  `pacienteCama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`idPaciente`, `pacienteNombre`, `pacienteDocumento`, `pacienteDieta`, `pacienteCama`) VALUES
(1, 'Felipe Gavilan Castaño', '1005958885', 'Normal', '305'),
(2, 'Andre Castaño Molina', '123456789', 'liquida', '406'),
(3, 'Ana E Sotelo', '52300674', 'Normal', '302');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersona` int NOT NULL,
  `personaNombreCompleto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personaNumberCell` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personaCorreo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personaDocumento` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `personasCodigo` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `personaNombreCompleto`, `personaNumberCell`, `personaCorreo`, `personaDocumento`, `personasCodigo`) VALUES
(1, 'Felipe Gavilan Castaño', '3156078058', 'felipegavilan2202@gmail.com', '1005958885', NULL),
(2, 'Andre Castaño Molina', '3156530301', 'fgavilac@junical.com.co', '123456789', NULL),
(3, 'Ana E Sotelo', '123456789', 'gtic.gaf.junicalmedicalsas@gmail.com', '52300674', NULL);

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
(1, 'Administrador'),
(3, 'Root'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesmenu`
--

CREATE TABLE `rolesmenu` (
  `idRolMenu` int NOT NULL,
  `rolMenuEstado` enum('activo','Inactivo') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idMenu` int NOT NULL,
  `idRol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rolesmenu`
--

INSERT INTO `rolesmenu` (`idRolMenu`, `rolMenuEstado`, `idMenu`, `idRol`) VALUES
(1, 'activo', 11, 5),
(2, 'activo', 11, 5),
(3, 'activo', 12, 8),
(4, 'activo', 4, 8),
(5, 'activo', 3, 8),
(6, 'activo', 10, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `usuarioLogin` char(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuarioPassword` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuarioEstado` enum('Activo','Inactivo') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idPersonas` int NOT NULL,
  `idRol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuarioLogin`, `usuarioPassword`, `usuarioEstado`, `idPersonas`, `idRol`) VALUES
(1, 'Maria sdssds', 'Maria123', 'Inactivo', 1, 2),
(2, 'Ubaldo', 'Ubaldo123', 'Inactivo', 2, 2),
(3, 'maxi', 'Maxi123', 'Inactivo', 4, 2),
(6, 'Maria', '11323232', 'Inactivo', 1, 2),
(12, 'Fgavilac', '1234', 'Activo', 4, 3),
(36, 'Sleon', '1212', 'Activo', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosroles`
--

CREATE TABLE `usuariosroles` (
  `idUsuarioRol` int NOT NULL,
  `usuarioRolEstado` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL DEFAULT 'true',
  `idUsuario` int NOT NULL,
  `idRol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuariosroles`
--

INSERT INTO `usuariosroles` (`idUsuarioRol`, `usuarioRolEstado`, `idUsuario`, `idRol`) VALUES
(13, 'true', 2, 5),
(14, 'true', 2, 7),
(15, 'true', 3, 5),
(16, 'true', 3, 7),
(17, 'true', 12, 5),
(18, 'true', 12, 7),
(27, 'true', 6, 8),
(29, 'true', 6, 5),
(30, 'true', 2, 8),
(32, 'true', 1, 5),
(33, 'true', 1, 8),
(34, 'true', 1, 7),
(35, 'true', 12, 8);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_nutrimenu`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_nutrimenu` (
`idNutriMenu` int
,`nutriAcompNombre` varchar(45)
,`nutriArrozNombre` varchar(45)
,`nutriBebidaNombre` varchar(45)
,`nutriDiasNombre` varchar(45)
,`nutriEnergeNombre` varchar(45)
,`nutriEnsalNombre` varchar(45)
,`nutriProteNombre` varchar(45)
,`nutriSemanaid` varchar(45)
,`nutriSemanaNombre` varchar(5)
,`nutriSopaNombre` varchar(45)
,`nutriTipoNombre` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `View_nutrimenupaci`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `View_nutrimenupaci` (
`idNutriMenuPaci` int
,`nutriAcompNombre` varchar(45)
,`nutriArrozNombre` varchar(45)
,`nutriBebidaNombre` varchar(45)
,`nutriDiasNombre` varchar(45)
,`nutriEnergeNombre` varchar(45)
,`nutriEnsalNombre` varchar(45)
,`nutriProteNombre` varchar(45)
,`nutriSemanaid` varchar(45)
,`nutriSemanaNombre` varchar(5)
,`nutriSopaNombre` varchar(45)
,`nutriTipoNombre` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_rolesusuarios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_rolesusuarios` (
`idRol` int
,`idUsuario` int
,`idUsuarioRol` int
,`rolNombre` varchar(50)
,`usuarioLogin` char(15)
,`usuarioRolEstado` enum('true','false')
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_usuariosroles`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_usuariosroles` (
`idRol` int
,`idUsuario` int
,`idUsuarioRol` int
,`rolNombre` varchar(50)
,`usuarioEstado` enum('Activo','Inactivo')
,`usuarioLogin` char(15)
,`usuarioRolEstado` enum('true','false')
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_nutrimenu`
--
DROP TABLE IF EXISTS `view_nutrimenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nutrimenu`  AS SELECT `nutrimenu`.`idNutriMenu` AS `idNutriMenu`, `nutritipo`.`nutriTipoNombre` AS `nutriTipoNombre`, `nutridias`.`nutriDiasNombre` AS `nutriDiasNombre`, `nutrisopa`.`nutriSopaNombre` AS `nutriSopaNombre`, `nutriarroz`.`nutriArrozNombre` AS `nutriArrozNombre`, `nutriprote`.`nutriProteNombre` AS `nutriProteNombre`, `nutrienerge`.`nutriEnergeNombre` AS `nutriEnergeNombre`, `nutriacomp`.`nutriAcompNombre` AS `nutriAcompNombre`, `nutriensal`.`nutriEnsalNombre` AS `nutriEnsalNombre`, `nutribebida`.`nutriBebidaNombre` AS `nutriBebidaNombre`, `nutrisemana`.`nutriSemanaNombre` AS `nutriSemanaNombre`, `nutrisemana`.`nutriSemanaid` AS `nutriSemanaid` FROM ((((((((((`nutrimenu` join `nutritipo` on((`nutrimenu`.`idNutriTipo` = `nutritipo`.`idNutriTipo`))) join `nutridias` on((`nutrimenu`.`idNutriDias` = `nutridias`.`idNutriDias`))) join `nutrisopa` on((`nutrimenu`.`idNutriSopa` = `nutrisopa`.`idNutriSopa`))) join `nutriarroz` on((`nutrimenu`.`idNutriArroz` = `nutriarroz`.`idNutriArroz`))) join `nutriprote` on((`nutrimenu`.`idNutriProte` = `nutriprote`.`idNutriProte`))) join `nutrienerge` on((`nutrimenu`.`idNutriEnerge` = `nutrienerge`.`idNutriEnerge`))) join `nutriacomp` on((`nutrimenu`.`idNutriAcomp` = `nutriacomp`.`idNutriAcomp`))) join `nutriensal` on((`nutrimenu`.`idNutriEnsal` = `nutriensal`.`idNutriEnsal`))) join `nutribebida` on((`nutrimenu`.`idNutriBebida` = `nutribebida`.`idNutriBebida`))) join `nutrisemana` on((`nutrimenu`.`idNutriSemana` = `nutrisemana`.`idNutriSemana`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `View_nutrimenupaci`
--
DROP TABLE IF EXISTS `View_nutrimenupaci`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `View_nutrimenupaci`  AS SELECT `nutrimenupaci`.`idNutriMenuPaci` AS `idNutriMenuPaci`, `nutritipo`.`nutriTipoNombre` AS `nutriTipoNombre`, `nutridias`.`nutriDiasNombre` AS `nutriDiasNombre`, `nutrisopa`.`nutriSopaNombre` AS `nutriSopaNombre`, `nutriarroz`.`nutriArrozNombre` AS `nutriArrozNombre`, `nutriprote`.`nutriProteNombre` AS `nutriProteNombre`, `nutrienerge`.`nutriEnergeNombre` AS `nutriEnergeNombre`, `nutriacomp`.`nutriAcompNombre` AS `nutriAcompNombre`, `nutriensal`.`nutriEnsalNombre` AS `nutriEnsalNombre`, `nutribebida`.`nutriBebidaNombre` AS `nutriBebidaNombre`, `nutrisemana`.`nutriSemanaNombre` AS `nutriSemanaNombre`, `nutrisemana`.`nutriSemanaid` AS `nutriSemanaid` FROM ((((((((((`nutrimenupaci` join `nutritipo` on((`nutrimenupaci`.`idNutriTipo` = `nutritipo`.`idNutriTipo`))) join `nutridias` on((`nutrimenupaci`.`idNutriDias` = `nutridias`.`idNutriDias`))) join `nutrisopa` on((`nutrimenupaci`.`idNutriSopa` = `nutrisopa`.`idNutriSopa`))) join `nutriarroz` on((`nutrimenupaci`.`idNutriArroz` = `nutriarroz`.`idNutriArroz`))) join `nutriprote` on((`nutrimenupaci`.`idNutriProte` = `nutriprote`.`idNutriProte`))) join `nutrienerge` on((`nutrimenupaci`.`idNutriEnerge` = `nutrienerge`.`idNutriEnerge`))) join `nutriacomp` on((`nutrimenupaci`.`idNutriAcomp` = `nutriacomp`.`idNutriAcomp`))) join `nutriensal` on((`nutrimenupaci`.`idNutriEnsal` = `nutriensal`.`idNutriEnsal`))) join `nutribebida` on((`nutrimenupaci`.`idNutriBebida` = `nutribebida`.`idNutriBebida`))) join `nutrisemana` on((`nutrimenupaci`.`idNutriSemana` = `nutrisemana`.`idNutriSemana`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_rolesusuarios`
--
DROP TABLE IF EXISTS `view_rolesusuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rolesusuarios`  AS SELECT `a`.`idUsuarioRol` AS `idUsuarioRol`, `a`.`idUsuario` AS `idUsuario`, `a`.`idRol` AS `idRol`, `a`.`usuarioRolEstado` AS `usuarioRolEstado`, `b`.`usuarioLogin` AS `usuarioLogin`, `c`.`rolNombre` AS `rolNombre` FROM ((`usuariosroles` `a` join `usuarios` `b`) join `roles` `c`) WHERE ((`a`.`idUsuario` = `b`.`idUsuario`) AND (`a`.`idRol` = `c`.`idRol`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_usuariosroles`
--
DROP TABLE IF EXISTS `view_usuariosroles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuariosroles`  AS SELECT `ur`.`idUsuarioRol` AS `idUsuarioRol`, `ur`.`usuarioRolEstado` AS `usuarioRolEstado`, `ur`.`idUsuario` AS `idUsuario`, `ur`.`idRol` AS `idRol`, `us`.`usuarioLogin` AS `usuarioLogin`, `us`.`usuarioEstado` AS `usuarioEstado`, `ro`.`rolNombre` AS `rolNombre` FROM ((`usuariosroles` `ur` join `usuarios` `us`) join `roles` `ro`) WHERE ((`ur`.`idUsuario` = `us`.`idUsuario`) AND (`ur`.`idRol` = `ro`.`idRol`)) ;

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
  ADD KEY `idNutriSemana` (`idNutriSemana`);

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
-- Indices de la tabla `rolesmenu`
--
ALTER TABLE `rolesmenu`
  ADD PRIMARY KEY (`idRolMenu`),
  ADD KEY `fk-idMenu-RolesMenu_idx` (`idMenu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `login` (`usuarioLogin`),
  ADD UNIQUE KEY `usuarioLogin_2` (`usuarioLogin`),
  ADD KEY `idPersonas` (`idPersonas`),
  ADD KEY `usuarioLogin` (`usuarioLogin`);

--
-- Indices de la tabla `usuariosroles`
--
ALTER TABLE `usuariosroles`
  ADD PRIMARY KEY (`idUsuarioRol`),
  ADD UNIQUE KEY `indx-unico-idrol-idusuario-usuarioroles` (`idUsuario`,`idRol`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `idMenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `menu_seleccionado`
--
ALTER TABLE `menu_seleccionado`
  MODIFY `idMenuSeleccionado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `menu_seleccionado_paci`
--
ALTER TABLE `menu_seleccionado_paci`
  MODIFY `idMenuSeleccionadoPaci` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `nutriacomp`
--
ALTER TABLE `nutriacomp`
  MODIFY `idNutriAcomp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `nutriarroz`
--
ALTER TABLE `nutriarroz`
  MODIFY `idNutriArroz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT de la tabla `nutrienerge`
--
ALTER TABLE `nutrienerge`
  MODIFY `idNutriEnerge` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `nutriensal`
--
ALTER TABLE `nutriensal`
  MODIFY `idNutriEnsal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nutrimenu`
--
ALTER TABLE `nutrimenu`
  MODIFY `idNutriMenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `nutrimenupaci`
--
ALTER TABLE `nutrimenupaci`
  MODIFY `idNutriMenuPaci` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `nutriprote`
--
ALTER TABLE `nutriprote`
  MODIFY `idNutriProte` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `nutrisopa`
--
ALTER TABLE `nutrisopa`
  MODIFY `idNutriSopa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `nutritipo`
--
ALTER TABLE `nutritipo`
  MODIFY `idNutriTipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `opcionesmenu`
--
ALTER TABLE `opcionesmenu`
  MODIFY `idOpcionMenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idPaciente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rolesmenu`
--
ALTER TABLE `rolesmenu`
  MODIFY `idRolMenu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuariosroles`
--
ALTER TABLE `usuariosroles`
  MODIFY `idUsuarioRol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu_seleccionado`
--
ALTER TABLE `menu_seleccionado`
  ADD CONSTRAINT `menu_seleccionado_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `personas` (`idPersona`),
  ADD CONSTRAINT `menu_seleccionado_ibfk_2` FOREIGN KEY (`idNutriMenu`) REFERENCES `nutrimenu` (`idNutriMenu`);

--
-- Filtros para la tabla `menu_seleccionado_paci`
--
ALTER TABLE `menu_seleccionado_paci`
  ADD CONSTRAINT `menu_seleccionado_ibfk_3` FOREIGN KEY (`idPaciente`) REFERENCES `pacientes` (`idPaciente`),
  ADD CONSTRAINT `menu_seleccionado_ibfk_4` FOREIGN KEY (`idNutriMenuPaci`) REFERENCES `nutrimenupaci` (`idNutriMenuPaci`);

--
-- Filtros para la tabla `nutrimenu`
--
ALTER TABLE `nutrimenu`
  ADD CONSTRAINT `nutrimenu_ibfk_1` FOREIGN KEY (`idNutriTipo`) REFERENCES `nutritipo` (`idNutriTipo`),
  ADD CONSTRAINT `nutrimenu_ibfk_10` FOREIGN KEY (`idNutriSemana`) REFERENCES `nutrisemana` (`idNutriSemana`),
  ADD CONSTRAINT `nutrimenu_ibfk_2` FOREIGN KEY (`idNutriDias`) REFERENCES `nutridias` (`idNutriDias`),
  ADD CONSTRAINT `nutrimenu_ibfk_3` FOREIGN KEY (`idNutriSopa`) REFERENCES `nutrisopa` (`idNutriSopa`),
  ADD CONSTRAINT `nutrimenu_ibfk_4` FOREIGN KEY (`idNutriArroz`) REFERENCES `nutriarroz` (`idNutriArroz`),
  ADD CONSTRAINT `nutrimenu_ibfk_5` FOREIGN KEY (`idNutriProte`) REFERENCES `nutriprote` (`idNutriProte`),
  ADD CONSTRAINT `nutrimenu_ibfk_6` FOREIGN KEY (`idNutriEnerge`) REFERENCES `nutrienerge` (`idNutriEnerge`),
  ADD CONSTRAINT `nutrimenu_ibfk_7` FOREIGN KEY (`idNutriAcomp`) REFERENCES `nutriacomp` (`idNutriAcomp`),
  ADD CONSTRAINT `nutrimenu_ibfk_8` FOREIGN KEY (`idNutriEnsal`) REFERENCES `nutriensal` (`idNutriEnsal`),
  ADD CONSTRAINT `nutrimenu_ibfk_9` FOREIGN KEY (`idNutriBebida`) REFERENCES `nutribebida` (`idNutriBebida`);

--
-- Filtros para la tabla `nutrimenupaci`
--
ALTER TABLE `nutrimenupaci`
  ADD CONSTRAINT `nutrimenupaci_ibfk_1` FOREIGN KEY (`idNutriTipo`) REFERENCES `nutritipo` (`idNutriTipo`),
  ADD CONSTRAINT `nutrimenupaci_ibfk_10` FOREIGN KEY (`idNutriSemana`) REFERENCES `nutrisemana` (`idNutriSemana`),
  ADD CONSTRAINT `nutrimenupaci_ibfk_2` FOREIGN KEY (`idNutriDias`) REFERENCES `nutridias` (`idNutriDias`),
  ADD CONSTRAINT `nutrimenupaci_ibfk_3` FOREIGN KEY (`idNutriSopa`) REFERENCES `nutrisopa` (`idNutriSopa`),
  ADD CONSTRAINT `nutrimenupaci_ibfk_4` FOREIGN KEY (`idNutriArroz`) REFERENCES `nutriarroz` (`idNutriArroz`),
  ADD CONSTRAINT `nutrimenupaci_ibfk_5` FOREIGN KEY (`idNutriProte`) REFERENCES `nutriprote` (`idNutriProte`),
  ADD CONSTRAINT `nutrimenupaci_ibfk_6` FOREIGN KEY (`idNutriEnerge`) REFERENCES `nutrienerge` (`idNutriEnerge`),
  ADD CONSTRAINT `nutrimenupaci_ibfk_7` FOREIGN KEY (`idNutriAcomp`) REFERENCES `nutriacomp` (`idNutriAcomp`),
  ADD CONSTRAINT `nutrimenupaci_ibfk_8` FOREIGN KEY (`idNutriEnsal`) REFERENCES `nutriensal` (`idNutriEnsal`),
  ADD CONSTRAINT `nutrimenupaci_ibfk_9` FOREIGN KEY (`idNutriBebida`) REFERENCES `nutribebida` (`idNutriBebida`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
