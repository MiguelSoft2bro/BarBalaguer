-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-07-2025 a las 11:03:09
-- Versión del servidor: 10.3.37-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 8.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin_balaguer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alergenos`
--

CREATE TABLE `alergenos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alergenos`
--

INSERT INTO `alergenos` (`id`, `nombre`, `imagen`) VALUES
(1, 'Altramuz', 'Altramuz'),
(2, 'Apio', 'Apio'),
(3, 'Cacahuetes', 'Cacahuetes'),
(4, 'Crustaceos', 'Crustaceos'),
(5, 'Frutos secos', 'Frutos secos'),
(6, 'Gluten', 'Gluten'),
(7, 'Huevos', 'Huevos'),
(8, 'Lácteos', 'Lácteos'),
(9, 'Moluscos', 'Moluscos'),
(10, 'Mostaza', 'Mostaza'),
(11, 'Pescado', 'Pescado'),
(12, 'Sésamo', 'Sésamo'),
(13, 'Soja', 'Soja'),
(14, 'Sulfitos', 'Sulfitos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `IDArticulo` int(11) NOT NULL,
  `Orden` int(11) NOT NULL,
  `Articulo` text NOT NULL,
  `IDFamilia` int(11) NOT NULL,
  `PVP` text NOT NULL,
  `Activo` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `ConImagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`IDArticulo`, `Orden`, `Articulo`, `IDFamilia`, `PVP`, `Activo`, `imagen`, `ConImagen`) VALUES
(375, 2, 'ALITAS DE POLLO', 80, '7.00', 1, '', 0),
(376, 3, 'PATATAS BRAVAS', 79, '8.00', 1, '', 0),
(377, 1, 'ENSALADA DE ATÚN', 82, '14.00', 1, '', 0),
(378, 2, 'ENSALADA DE POLLO', 82, '12.50', 1, '', 0),
(380, 1, 'ESPAGUETI BOLOÑESA', 82, '10.00', 0, '', 0),
(382, 1, 'MIXTO', 89, '5.00', 0, '', 0),
(383, 2, ' sandwich QUESO', 89, '4.00', 1, '', 0),
(384, 3, 'VEGETAL', 89, '5.50', 0, '', 0),
(391, 7, 'B. TORTILLA PATATAS', 89, '5.50', 1, '', 0),
(396, 1, 'CAFÉ SOLO', 48, '1,2', 0, '', 0),
(397, 2, 'CAFÉ CORTADO', 48, '1,4', 0, '', 0),
(398, 3, 'CAFÉ CAPUCHINO', 48, '2,4', 0, '', 0),
(399, 4, 'CAFÉ CON LECHE', 48, '1,7', 0, '', 0),
(400, 5, 'CAFÉ AMERICANO', 48, '1,7', 0, '', 0),
(401, 6, 'INFUSION POLEO', 48, '1,2', 0, '', 0),
(402, 7, 'INFUSION SALVIA', 48, '1,2', 0, '', 0),
(403, 8, 'INFUSION TE VERDE', 48, '1,2', 0, '', 0),
(404, 9, 'INFUSION TE ROJO', 48, '1,2', 0, '', 0),
(405, 10, 'INFUSION TE NEGRO', 48, '1,2', 0, '', 0),
(406, 11, 'INFUSION TILA', 48, '1,2', 0, '', 0),
(407, 12, 'INFUSION MANZANILLA', 99, '1.00', 0, '', 0),
(408, 13, 'COLACAO', 48, '2', 0, '', 0),
(409, 1, 'PIZZA QUESO', 91, '6.00', 0, '', 0),
(410, 2, 'PIZZA ATUN', 91, '6.00', 0, '', 0),
(412, 4, 'PIZZA COMBI', 91, '7.00', 0, '', 0),
(414, 1, 'COCACOLA', 93, '2.00', 0, '', 0),
(415, 2, 'COCACOLA ZERO', 93, '2.00', 0, '', 0),
(416, 3, 'ACUARIUS', 93, '2.00', 0, '', 0),
(417, 4, 'NESTEA', 93, '2.00', 0, '', 0),
(418, 5, 'SPRITE', 93, '2.00', 0, '', 0),
(419, 6, 'TONICA', 93, '2.00', 0, '', 0),
(420, 7, 'FANTA LIMON', 38, '2,5', 0, '', 0),
(421, 8, 'AGUA CON GAS', 38, '2', 0, '', 0),
(422, 9, 'AGUA', 38, '1,2', 0, '', 0),
(423, 10, 'ZUMO MELOCOTON', 38, '1,5', 0, '', 0),
(424, 11, 'ZUMO PIÑA', 38, '1,5', 0, '', 0),
(425, 12, 'ZUMO TOMATE', 38, '1,5', 0, '', 0),
(427, 14, 'ZUMO MANZANA', 99, '1.00', 0, '', 0),
(429, 16, 'BITTER KAS', 38, '2', 0, '', 0),
(430, 17, 'CASERA', 38, '2', 0, '', 0),
(432, 1, 'CAÑA PEQUEÑA', 25, '1,7', 0, '', 0),
(433, 2, 'CAÑA GRANDE', 25, '2,7', 0, '', 0),
(434, 3, 'RADLER', 25, '2,7', 0, '', 0),
(435, 4, 'BOTELLIN MAHOU', 25, '2,7', 0, '', 0),
(436, 5, 'BOTELLIN SIN ALCOHOL', 25, '2,7', 0, '', 0),
(437, 6, 'SAN MIGUEL', 25, '2,7', 0, '', 0),
(438, 7, 'VINO BLANCO', 25, '3', 0, '', 0),
(439, 8, 'VINO TINTO', 25, '3', 0, '', 0),
(440, 9, 'VINO ROSADO', 25, '3', 0, '', 0),
(441, 10, 'BOTELLA VINO', 99, '14.00', 1, '', 0),
(443, 12, 'TANQUE', 25, '3,5', 0, '', 0),
(447, 18, 'TANQUE', 38, '3,5', 0, '', 0),
(452, 1, 'PATATAS BOLSA', 79, '1.70', 0, '', 0),
(453, 2, 'ACEITUNAS', 49, '1', 0, '', 0),
(455, 6, 'CHISTORRA', 79, '7.00', 0, '', 0),
(456, 6, 'BOQUERONES EN VINAGRE', 79, '5.00', 0, '', 0),
(459, 2, 'MAGNUM', 46, '3', 0, '', 0),
(460, 3, 'CORNETO NOCILLA', 46, '3', 0, '', 0),
(461, 4, 'CORNETO', 46, '2,5', 0, '', 0),
(462, 5, 'SAND', 46, '1,8', 0, '', 0),
(465, 8, 'CALIPO', 46, '1,8', 0, '', 0),
(482, 11, 'COCA ', 79, '2.00', 0, '', 0),
(484, 2, 'TARTA DE CAPUCHINA', 88, '6.00', 0, '', 0),
(485, 3, 'PANNA COTTA CAFÉ', 88, '4.00', 0, '', 0),
(487, 14, 'BOMBON', 48, '1,8', 0, '', 0),
(489, 15, 'VASO LECHE', 48, '1,5', 0, '', 0),
(494, 12, 'PATATAS FRITAS', 80, '4.00', 1, '', 0),
(506, 4, 'CROISSANT', 52, '2', 0, '', 0),
(509, 18, 'ALLYOLI', 40, '1', 0, '', 0),
(514, 16, 'CAFÉ TOCAT', 48, '2,2', 0, '', 0),
(515, 24, 'PAN', 41, '1,2', 0, '', 0),
(518, 6, 'DONUT', 52, '1,5', 0, '', 0),
(519, 20, 'CESTA DE PAN', 40, '1,2', 0, '', 0),
(531, 26, 'TINTO DE VERANO', 93, '3.00', 0, '', 0),
(532, 27, 'MARTINI', 93, '3.00', 0, '', 0),
(535, 7, 'PIZZA CARBONARA', 91, '7.00', 0, '', 0),
(537, 9, 'PASTEL DE FRUTOS ROJOS', 88, '6.00', 0, '', 0),
(538, 10, 'PASTEL DE VAINILLA', 88, '6.00', 0, '', 0),
(539, 11, 'TARTA De MANZANA', 88, '6.00', 1, '', 0),
(546, 14, 'CLARA', 93, '3.00', 0, '', 0),
(548, 12, 'PASTEL DE QUESO', 88, '6.00', 1, '', 0),
(549, 13, 'PASTEL DE  HIGOS', 88, '6.00', 0, '', 0),
(550, 26, 'MONTADITO ANCHOA ,TOMATE Y QUESO FRESCO ', 79, '2.20', 0, '', 0),
(556, 1, 'PULPO', 79, '14.00', 1, '', 0),
(557, 1, 'CALAMAR ROMANA', 80, '8.00', 1, '', 0),
(558, 33, 'ENSALADA DE PATATA', 79, '5.00', 0, '', 0),
(567, 2, 'TOSTADA JAMÓN SERRANO', 81, '3.20', 1, '', 0),
(568, 2, 'TOSTADA TOMATE', 81, '3.00', 1, '', 0),
(569, 3, ' tostada QUESO', 81, '3.00', 1, '', 0),
(571, 5, 'TOSTADA ACEITE Y SAL', 81, '2.50', 1, '', 0),
(572, 6, 'tostada SERRANO TOMATE QUESO', 81, '3.50', 1, '', 0),
(573, 7, 'tostada TOMATE QUESO', 81, '3.00', 1, '', 0),
(574, 8, 'tostada TOMATE SERRANO', 81, '3.00', 1, '', 0),
(575, 9, 'tostada SERRANO QUESO', 81, '3.50', 1, '', 0),
(576, 10, 'tostada MEDIA SERRANO', 81, '2.00', 1, '', 0),
(577, 11, 'tostada MEDIA TOMATE', 81, '2.00', 1, '', 0),
(578, 12, 'tostada MEDIA QUESO', 81, '2.40', 1, '', 0),
(579, 13, 'tostada MEDIA MANTEQUILLA', 81, '2.40', 1, '', 0),
(580, 14, 'tostada MEDIA ACEITE', 81, '1.80', 1, '', 0),
(581, 15, 'tostada MEDIA SERRANO TOMATE QUESO', 81, '2.00', 1, '', 0),
(582, 16, 'tostada MEDIA TOMATE QUESO', 81, '2.00', 1, '', 0),
(583, 17, 'tostada MEDIA TOMATE SERRANO', 81, '2.00', 1, '', 0),
(584, 18, 'tostada  MEDIA SERRANO QUESO', 81, '2.20', 1, '', 0),
(603, 1, 'TANQUERAY', 93, '6.00', 0, '', 0),
(604, 2, 'SEAGRAMS', 93, '6.00', 0, '', 0),
(605, 3, 'BEEFEATER', 93, '6.00', 0, '', 0),
(606, 4, 'CITADELLE', 93, '6.00', 0, '', 0),
(607, 5, 'GORDONS', 93, '5.00', 0, '', 0),
(608, 6, 'PUERTO INDIAS', 93, '5.00', 0, '', 0),
(609, 7, 'BOMBAY SHFIRO', 93, '6.00', 0, '', 0),
(610, 1, 'BRUGAL', 93, '6.00', 0, '', 0),
(611, 2, 'NEGRITA', 93, '6.00', 0, '', 0),
(612, 3, 'LEGENDARIO', 93, '6.00', 0, '', 0),
(613, 4, 'MATUSALEM', 93, '6.00', 0, '', 0),
(614, 1, 'JB', 93, '6.00', 0, '', 0),
(615, 2, 'CUTTY', 93, '6.00', 0, '', 0),
(616, 3, 'BALLANTINE', 93, '6.00', 0, '', 0),
(618, 5, 'BACARDY', 93, '5.00', 0, '', 0),
(626, 8, 'W.LABEL', 93, '7.00', 0, '', 0),
(628, 10, 'MATUSALEM', 93, '6.00', 0, '', 0),
(632, 14, 'CITADELLE', 93, '5.00', 0, '', 0),
(635, 17, 'CHUPITO', 93, '1.00', 0, '', 0),
(636, 18, 'VAQUERO', 93, '2.00', 0, '', 0),
(637, 19, 'MISTELA', 93, '2.00', 0, '', 0),
(638, 20, 'HERBERO', 93, '2.00', 0, '', 0),
(639, 21, 'BAILYS', 93, '3.00', 0, '', 0),
(641, 29, 'FANTA NARANJA', 93, '2.00', 0, '', 0),
(642, 30, 'AQUARIUS NARANJA', 93, '2.00', 0, '', 0),
(643, 19, 'TOSTADA MANTEQUILLA Y MERMELADA', 81, '3.50', 1, '', 0),
(645, 3, 'MEJILLONES CON SALSA PICANTE DE TOMATE', 79, '8.50', 0, '', 0),
(646, 8, 'ALBÓNDIGAS', 79, '8.00', 1, '', 0),
(647, 2, 'LOMO CON SETAS', 79, '8.50', 0, '', 0),
(649, 17, 'CHOCOLATE NEGRO', 79, '3.00', 0, '', 0),
(650, 18, 'CHOCOLATE AVELLANAS', 48, '3', 0, '', 0),
(651, 19, 'CHOCOOATE BLANCO', 48, '3', 0, '', 0),
(652, 20, 'CHOCOLATE CON NATA', 48, '3,5', 0, '', 0),
(653, 15, 'PASTEL DE TURRÓN', 88, '6.00', 0, '', 0),
(654, 4, 'CALAMAR EN SALSA', 79, '9.00', 0, '', 0),
(655, 22, 'RICAD', 93, '3.00', 0, '', 0),
(656, 39, 'PAN ALL I OLI', 80, '2.20', 0, '', 0),
(659, 3, 'MEZCLA', 80, '1.00', 0, '', 0),
(661, 23, 'PACHARAN', 93, '2.00', 0, '', 0),
(662, 22, 'INFUSION TIMONET', 48, '1,2', 0, '', 0),
(666, 5, 'GAZPACHO', 43, '5', 0, '', 0),
(667, 4, 'extra', 49, '1', 0, '', 0),
(669, 19, 'tanque 50cl', 93, '4.00', 0, '', 0),
(670, 5, 'allioli', 80, '1.00', 0, '', 0),
(672, 5, 'PINCHO TORTILLA', 80, '5.00', 0, '', 0),
(673, 31, 'VASO DE SANGRIA', 99, '3.00', 1, '', 0),
(675, 16, 'FRUTA', 92, '2.00', 0, '', 0),
(676, 24, 'CREMA DE NISPERO', 50, '2', 0, '', 0),
(678, 1, 'SEÑORIO 250ML', 76, '5', 0, '', 0),
(679, 2, 'SEÑORIO 500ML', 76, '9', 0, '', 0),
(681, 4, 'SEÑORIO ECO 250ML', 76, '7', 0, '', 0),
(682, 5, 'SÑORIO ECO 500ML', 76, '10,5', 0, '', 0),
(686, 7, 'MENU DEL DIA ||  A elegir un primero , A elegir un segundo , Postre o café', 92, '12.00', 1, '', 0),
(689, 0, 'DESCUENTO', 0, '0', 0, '', 0),
(691, 17, 'SURTIDO VARIADO', 52, '15', 0, '', 0),
(692, 25, 'VOTKA', 50, '4,5', 0, '', 0),
(699, 13, 'MENU ESPECIAL ||  A elegir un primero , A elegir un segundo , Postre o café', 92, '15.00', 1, '', 0),
(700, 8, 'BOTELLA DE OlI especial', 76, '14', 0, '', 0),
(702, 11, 'PIZZA VEJETARIANA', 91, '6.00', 0, '', 0),
(703, 32, 'energética', 38, '3', 0, '', 0),
(706, 19, 'VASO DE LIMON Y MERENGUE ', 88, '4.50', 0, '', 0),
(708, 9, 'GARRAFA OLI', 76, '43', 0, '', 0),
(709, 20, 'NAPOLITNA', 52, '2', 0, '', 0),
(710, 7, 'CROQUETAS  por unidad  ..pollo o cocido..', 79, '1.50', 1, '', 0),
(711, 26, 'Brandy', 50, '3,5', 0, '', 0),
(712, 42, 'PAN AJO Y TOMATE', 80, '4.00', 0, '', 0),
(713, 14, 'SOPA PESCADO', 43, '6,5', 0, '', 0),
(714, 15, 'SOPA', 43, '5,5', 0, '', 0),
(716, 36, 'BOCADILLO ATUN', 89, '5.50', 1, '', 0),
(717, 27, 'CEROL', 87, '5.00', 0, '', 0),
(718, 17, 'MENU NIÑOS ||', 92, '10.00', 1, '', 0),
(719, 21, 'TARTA DE TIRAMISSU', 88, '6.00', 0, '', 0),
(720, 23, 'LATTE', 48, '2,2', 0, '', 0),
(721, 20, ' MENU DESAYUNO ||', 92, '6.00', 1, '', 0),
(722, 6, 'HIELO [BOLSA]', 49, '2,5', 0, '', 0),
(724, 7, 'tupper', 49, '0,2', 0, '', 0),
(767, 5, 'MONTADITO DE QUESO, TOMATE Y ANCHOA', 79, '2.20', 0, '', 0),
(768, 6, 'PALITOS DE QUESO', 80, '7.00', 0, '', 0),
(769, 3, 'TOSTADA JAMÓN YORK', 81, '3.00', 1, '', 0),
(771, 0, 'BOCADILLO DE JAMON SERRANO', 89, '5.00', 1, '', 0),
(773, 0, 'PASTEL DE FRESAS ', 88, '6.00', 0, '', 0),
(774, 0, 'PASTEL DE ARANDANO Y CREMA PASTELERA ', 88, '6.00', 0, '', 0),
(775, 0, 'SANDWICH MIXTO', 89, '4.00', 1, '', 0),
(776, 0, 'PASTEL DE VAINILLA Y CHOCOLATE ', 88, '6.00', 0, '', 0),
(777, 0, 'FLAN DE NARANJA', 88, '5.00', 0, '', 0),
(778, 0, 'PASTEL DE MOKA ', 88, '6.00', 0, '', 0),
(779, 0, '', 0, '0,00', 0, '', 0),
(780, 0, 'NUGGET  o NUGGET VEGANO', 80, '7.80', 1, '', 0),
(781, 0, 'MOUSSE DE LIMON', 88, '4.00', 0, '', 0),
(882, 0, '', 0, '0,00', 0, '', 0),
(883, 0, '', 0, '0,00', 0, '', 0),
(884, 0, 'SALADITOS', 80, '4.00', 0, '', 0),
(885, 0, 'AROS DE  GOUDA Y BEICON', 80, '5.00', 0, '', 0),
(886, 0, 'TIRAMISU DE DULCE DE LECHE', 88, '5.00', 0, '', 0),
(887, 0, 'PANNA COTTA CHOCOLATE', 79, '4.00', 0, '', 0),
(888, 0, 'POSTRE TARRINA', 88, '4.00', 0, '', 0),
(890, 0, 'CAFÉ SOLO', 99, '1.30', 1, '', 0),
(891, 0, 'CAFÉ CON LECHE \\ AMERICANO', 99, '2.00', 1, '', 0),
(892, 0, 'CORTADO ', 99, '1.50', 1, '', 0),
(893, 0, 'CAPUCHINO', 99, '3.00', 1, '', 0),
(894, 0, 'CAFE BOMBON', 99, '2.20', 1, '', 0),
(895, 0, 'INFUSIONES ', 99, '1.3', 1, '', 0),
(896, 0, 'COLACAO', 99, '2.30', 1, '', 0),
(897, 0, 'CHOCOLATE ', 99, '3.50', 1, '', 0),
(898, 0, 'REFRESCOS ', 99, '2.50', 1, '', 0),
(899, 0, 'ZUMOS', 99, '1.50', 1, '', 0),
(900, 0, 'AGUA ', 99, '1.20', 1, '', 0),
(901, 0, 'AGUA CON GAS', 99, '2.00', 1, '', 0),
(902, 0, 'TINTO DE VERANO ', 99, '3.00', 1, '', 0),
(903, 0, 'MARTINI \\ VERMUT', 99, '3.00', 1, '', 0),
(905, 0, 'CAÑA 22cl', 99, '1.70', 1, '', 0),
(906, 0, 'CAÑA 33cl', 99, '3.00', 1, '', 0),
(907, 0, 'TERCIO', 99, '2.70', 1, '', 0),
(908, 0, 'RADLER', 99, '2.70', 1, '', 0),
(909, 0, 'SIN ALCOHOL ', 99, '2.70', 1, '', 0),
(910, 0, 'TANQUE 5Ocl', 99, '4.00', 1, '', 0),
(911, 0, 'CLARA', 99, '3.50', 1, '', 0),
(912, 0, 'COPA DE VINO de la casa', 99, '3.00', 1, '', 0),
(913, 0, '', 0, '0,00', 0, '', 0),
(914, 0, 'AROS DE CEBOLLA CON SALSA BBQ', 80, '7.00', 1, '', 0),
(915, 0, '', 0, '0,00', 0, '', 0),
(916, 0, 'ROLLITO DE VERDURA', 79, '3.00', 1, '', 0),
(917, 0, '', 0, '0,00', 0, '', 0),
(918, 0, 'CHAMPIÑ0NES Con SALSA VERDE', 79, '6.00', 1, '', 0),
(919, 0, 'QUESO FRITO ', 79, '6.00', 0, '', 0),
(920, 0, 'HOJALDRE RELLENO. por unidad', 79, '5.00', 0, '', 0),
(922, 0, 'PASTEL DE  CHOCOLATE', 88, '5.00', 1, '', 0),
(923, 0, 'PASTEL DE LIMON', 88, '6.00', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_alergenos`
--

CREATE TABLE `articulos_alergenos` (
  `id` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `idAlergeno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos_alergenos`
--

INSERT INTO `articulos_alergenos` (`id`, `idArticulo`, `idAlergeno`) VALUES
(51, 768, 6),
(53, 768, 7),
(54, 768, 8),
(55, 769, 6),
(56, 771, 6),
(57, 774, 7),
(58, 774, 8),
(59, 774, 5),
(60, 774, 6),
(61, 775, 6),
(62, 775, 7),
(63, 775, 8),
(64, 775, 10),
(65, 775, 5),
(66, 775, 12),
(67, 775, 13),
(68, 776, 7),
(69, 776, 8),
(70, 776, 6),
(71, 776, 5),
(72, 780, 6),
(73, 537, 7),
(74, 537, 8),
(75, 537, 6),
(76, 537, 5),
(77, 548, 7),
(78, 548, 8),
(79, 548, 6),
(81, 557, 11),
(82, 539, 6),
(83, 567, 6),
(84, 568, 6),
(85, 569, 6),
(86, 571, 6),
(87, 572, 6),
(88, 572, 8),
(89, 569, 8),
(90, 573, 6),
(91, 573, 8),
(92, 574, 6),
(93, 575, 6),
(94, 576, 6),
(95, 577, 6),
(96, 578, 8),
(97, 578, 6),
(98, 579, 6),
(99, 579, 8),
(100, 580, 6),
(101, 581, 6),
(102, 581, 8),
(103, 582, 6),
(104, 582, 8),
(105, 583, 6),
(106, 584, 6),
(107, 584, 8),
(108, 374, 6),
(109, 374, 7),
(110, 374, 8),
(111, 374, 10),
(112, 374, 13),
(113, 375, 2),
(114, 375, 6),
(115, 375, 7),
(116, 375, 8),
(117, 375, 10),
(118, 375, 12),
(119, 375, 13),
(120, 376, 6),
(121, 377, 11),
(122, 378, 6),
(123, 378, 4),
(124, 378, 7),
(125, 378, 11),
(126, 378, 10),
(127, 378, 13),
(128, 383, 6),
(129, 383, 7),
(130, 383, 8),
(131, 383, 10),
(132, 383, 5),
(133, 383, 12),
(134, 383, 13),
(135, 643, 6),
(136, 643, 8),
(137, 645, 4),
(138, 645, 9),
(139, 646, 6),
(140, 646, 7),
(141, 646, 14),
(142, 645, 14),
(143, 391, 7),
(144, 391, 6),
(145, 672, 7),
(147, 710, 7),
(148, 710, 8),
(149, 710, 6),
(150, 456, 11),
(151, 456, 14),
(152, 712, 6),
(153, 716, 11),
(154, 716, 6),
(155, 718, 7),
(156, 718, 8),
(157, 718, 6),
(158, 718, 2),
(159, 718, 10),
(160, 718, 12),
(161, 718, 13),
(162, 718, 14),
(163, 719, 6),
(164, 719, 8),
(165, 485, 8),
(166, 494, 6),
(167, 773, 6),
(169, 773, 8),
(170, 773, 5),
(171, 777, 6),
(172, 777, 7),
(173, 549, 7),
(174, 549, 8),
(175, 549, 6),
(176, 549, 5),
(177, 550, 6),
(178, 550, 8),
(179, 550, 11),
(180, 382, 6),
(181, 382, 7),
(182, 382, 8),
(183, 382, 10),
(184, 382, 5),
(185, 382, 12),
(186, 382, 13),
(187, 384, 6),
(188, 647, 14),
(189, 653, 6),
(190, 653, 7),
(191, 653, 8),
(193, 656, 6),
(194, 697, 8),
(195, 697, 7),
(196, 697, 6),
(197, 767, 6),
(198, 767, 8),
(199, 767, 11),
(201, 556, 9),
(202, 556, 4),
(203, 556, 11),
(204, 482, 6),
(206, 482, 8),
(207, 452, 8),
(208, 557, 6),
(209, 557, 4),
(210, 706, 6),
(211, 706, 8),
(212, 706, 7),
(213, 706, 5),
(214, 539, 5),
(215, 686, 9),
(216, 686, 11),
(217, 686, 14),
(218, 699, 4),
(219, 699, 5),
(220, 699, 6),
(221, 699, 8),
(222, 699, 9),
(223, 699, 11),
(224, 699, 14),
(225, 885, 7),
(227, 885, 6),
(228, 699, 10),
(229, 693, 6),
(230, 886, 8),
(231, 886, 5),
(232, 539, 8),
(233, 886, 7),
(234, 719, 7),
(235, 886, 6),
(236, 485, 6),
(237, 914, 6),
(238, 914, 11),
(239, 914, 9),
(240, 914, 4),
(241, 914, 8),
(242, 914, 13),
(243, 914, 10),
(244, 919, 7),
(245, 919, 6),
(246, 919, 8),
(247, 920, 6),
(248, 920, 8),
(249, 920, 7),
(250, 920, 13),
(251, 920, 10),
(252, 922, 8),
(253, 922, 6),
(254, 922, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `IDFamilia` int(11) NOT NULL,
  `Orden` int(11) NOT NULL,
  `Familia` text NOT NULL,
  `IDPadre` int(11) NOT NULL,
  `Activo` int(11) NOT NULL,
  `imagen` text NOT NULL,
  `ConImagen` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `desc_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`IDFamilia`, `Orden`, `Familia`, `IDPadre`, `Activo`, `imagen`, `ConImagen`, `descripcion`, `desc_cat`) VALUES
(79, 1, 'TAPAS CASERAS', 0, 1, '', 0, '', 0),
(80, 2, 'TAPAS', 0, 1, '', 0, '', 0),
(81, 3, 'TOSTADAS  ~ solo desayunos~', 0, 0, '', 0, '', 0),
(82, 4, 'ENSALADAS ', 0, 1, '', 0, '', 0),
(88, 7, 'TARTAS CASERAS', 0, 1, '', 0, '', 0),
(89, 5, 'SANDWICH & BOCADILLOS', 0, 0, '', 0, '', 0),
(92, 7, 'MENUS', 0, 1, '', 0, '', 0),
(99, 0, 'BEBIDAS', 0, 1, '', 0, 'undefined', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `color_acento` varchar(50) NOT NULL,
  `nombre_logo` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `logo` text NOT NULL,
  `logopreloader` text NOT NULL,
  `logoqr` text NOT NULL,
  `color_precio` text NOT NULL,
  `color_categoria` text NOT NULL,
  `estiloCarta` int(11) NOT NULL,
  `mostrarAlergenos` int(11) NOT NULL,
  `redes` int(11) NOT NULL,
  `face` text NOT NULL,
  `insta` text NOT NULL,
  `twitter` text NOT NULL,
  `contacto` int(11) NOT NULL,
  `tel` text NOT NULL,
  `mail` text NOT NULL,
  `movil` text NOT NULL,
  `fuenteCabecera` text NOT NULL DEFAULT '8',
  `pxFuenteCabecera` int(11) NOT NULL,
  `colorfondoCabecera` text NOT NULL,
  `fuenteCategorias` text NOT NULL,
  `pxFuenteCategorias` text NOT NULL,
  `color_categoria_acento` text NOT NULL,
  `fuentePrecio` text NOT NULL,
  `fuentePlato` text NOT NULL,
  `colorPlato` text NOT NULL,
  `pxFuentePrecio` text NOT NULL,
  `pxFuentePlato` text NOT NULL,
  `fuenteAlergenos` text NOT NULL,
  `colorAlergenos` text NOT NULL,
  `pxFuenteAlergenos` text NOT NULL DEFAULT '8',
  `fuenteContacto` text NOT NULL,
  `colorContacto` text NOT NULL,
  `pxFuenteContacto` text NOT NULL,
  `fuenteDescCat` text NOT NULL,
  `colorDescCat` text NOT NULL,
  `pxFuenteDescCat` text NOT NULL,
  `color1qr` text NOT NULL,
  `color2qr` text NOT NULL,
  `pxLogo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `color_acento`, `nombre_logo`, `nombre`, `logo`, `logopreloader`, `logoqr`, `color_precio`, `color_categoria`, `estiloCarta`, `mostrarAlergenos`, `redes`, `face`, `insta`, `twitter`, `contacto`, `tel`, `mail`, `movil`, `fuenteCabecera`, `pxFuenteCabecera`, `colorfondoCabecera`, `fuenteCategorias`, `pxFuenteCategorias`, `color_categoria_acento`, `fuentePrecio`, `fuentePlato`, `colorPlato`, `pxFuentePrecio`, `pxFuentePlato`, `fuenteAlergenos`, `colorAlergenos`, `pxFuenteAlergenos`, `fuenteContacto`, `colorContacto`, `pxFuenteContacto`, `fuenteDescCat`, `colorDescCat`, `pxFuenteDescCat`, `color1qr`, `color2qr`, `pxLogo`) VALUES
(1, '#ffffff', 1, 'Bar Balaguer', 'https://balaguer.ovh/assets/img/5ab6d0efa5eab65977d9f096d55bd1ed.PNG', 'https://balaguer.ovh/assets/img/78f2be4eac8622a854c2463c14d5a451.png', 'https://balaguer.ovh/assets/img/8ec5ce4131e6e0c870e11cc05c704306.jpg', '#a68734', '#4d4d4d', 1, 1, 0, 'aaa', 'insta', 'tiwtter', 0, '11111111', '33333333333', '666666', 'Arial', 200, '#212220', 'Arial', '20', '#a68734', 'Times New Roman', 'Arial', '#4d4d4d', '25', '20', 'Arial', '#4a4a4a', '14', 'Arial', '#d0cdcd', '15', 'Times New Roman', '#545454', '12', '#b5a036', '#ffffff', '100');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alergenos`
--
ALTER TABLE `alergenos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`IDArticulo`);

--
-- Indices de la tabla `articulos_alergenos`
--
ALTER TABLE `articulos_alergenos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`IDFamilia`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alergenos`
--
ALTER TABLE `alergenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `IDArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=924;

--
-- AUTO_INCREMENT de la tabla `articulos_alergenos`
--
ALTER TABLE `articulos_alergenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `IDFamilia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
