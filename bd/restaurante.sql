-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2024 a las 04:50:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_banners`
--

CREATE TABLE `tbl_banners` (
  `ID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_banners`
--

INSERT INTO `tbl_banners` (`ID`, `titulo`, `descripcion`, `link`) VALUES
(4, 'Casa en Restorant ', 'La mejor comida de la casa con elegancia y un sabor estupendo.', '#menu'),
(5, 'SenPro Gourmet', 'La mejor experiencia culinaria en sabor, calidad & elegancia.', '#menu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_colaboradores`
--

CREATE TABLE `tbl_colaboradores` (
  `ID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `linkfacebook` varchar(255) NOT NULL,
  `linkinstagram` varchar(255) NOT NULL,
  `linklinkedin` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_colaboradores`
--

INSERT INTO `tbl_colaboradores` (`ID`, `titulo`, `descripcion`, `linkfacebook`, `linkinstagram`, `linklinkedin`, `foto`) VALUES
(3, 'Cecilia Sanz', 'Comida Marina en su sabor mas fresco.', 'https://web.facebook.com/', 'https://instagram.com/', 'https://linkedin.com/', '1713122033_chef2.jpg'),
(4, 'Juan Platón', 'El rey del sabor mistico', 'https://web.facebook.com/', 'https://instagram.com/', 'https://linkedin.com/', '1713122092_chef1.jpg'),
(5, 'Sergio Poh', 'Especialista en cocina artística occidental', 'https://web.facebook.com/', 'https://instagram.com/', 'https://linkedin.com/', '1713140855_chef3.jpg'),
(6, 'Shon zi', 'Especialista en cocina artística china', 'https://web.facebook.com/', 'https://instagram.com/', 'https://linkedin.com/', '1713140907_chef4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios`
--

CREATE TABLE `tbl_comentarios` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `mensaje` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_comentarios`
--

INSERT INTO `tbl_comentarios` (`ID`, `nombre`, `correo`, `mensaje`) VALUES
(1, 'Ana ', 'Ana@correo.cl', 'Hola Prueba de mensaje 225'),
(2, 'Cecilia ', 'ceci@celi.com', 'Cecilia correo mensaje de prueba'),
(4, 'Andres', 'andres@hotmail.com', 'mensaje de prueba de Andrés.'),
(5, 'Jaime', 'jaime@gmail.com', 'prueba de mensaje de Jaime.'),
(6, 'Jaime', 'jaime@gmail.com', 'prueba.............................'),
(7, 'Ivan', 'ivan@gmail.com', 'Prueba de Ivan, ivan hace la prueba de mensaje.'),
(8, 'Ivan', 'ivan@gmail.com', 'Prueba de Ivan, ivan hace la prueba de mensaje.'),
(9, 'Ivan', 'ivan@gmail.com', 'Prueba de Ivan, ivan hace la prueba de mensaje.'),
(10, 'Ivan', 'ivan@gmail.com', 'Prueba de Ivan, ivan hace la prueba de mensaje.'),
(11, 'Ivan', 'ivan@gmail.com', 'Prueba de Ivan, ivan hace la prueba de mensaje.'),
(12, 'Pablo', 'Pablo@gmail.com', 'Prueba de mensaje de Pablo.'),
(13, 'Washinton', 'wa@gmail.com', 'Prueba de Wa!'),
(14, 'Tomas', 'T@gmail.com', 'Prueba de Tomas!'),
(15, 'Ernesto', 'E@gmail.com', 'Prueba de Mensaje.'),
(16, 'gdwgdsjha', 'd@dsds.com', 'ddsdddssd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `ID` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ingredientes` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_menu`
--

INSERT INTO `tbl_menu` (`ID`, `nombre`, `ingredientes`, `foto`, `precio`) VALUES
(1, 'Ensalada Gourmet', 'Semillas, huevo y Palta', '1713280226_menu1.jpg', '14990'),
(2, 'Ensalada Gourmet II', ' Pollo, hojas verdes y Pollo.', '1713280313_menu2.jpg', '14990'),
(3, 'Sashimi de Salmón', 'Salmón, semillas, tomate, huevo, rábano y albahaca.', '1713280447_menu3.jpg', '18990'),
(4, 'Camarones al Plato', 'Camarones, hiervas, tomate y cebolla.', '1713280591_menu4.jpg', '18990');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_testimonios`
--

CREATE TABLE `tbl_testimonios` (
  `ID` int(11) NOT NULL,
  `opinion` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_testimonios`
--

INSERT INTO `tbl_testimonios` (`ID`, `opinion`, `nombre`) VALUES
(2, 'Todo Super buena calidad!', 'Javier '),
(3, 'Siento que logran un sabor muy bueno.', 'Paz'),
(4, 'Comida muy Fina y bien preparada. Rico!', 'Anyelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`ID`, `usuario`, `password`, `correo`) VALUES
(1, 'Mauricio', 'e10adc3949ba59abbe56e057f20f883e', 'mauricio@gmail.com'),
(2, 'Pedro', 'e10adc3949ba59abbe56e057f20f883e', 'Pedro@correo.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_banners`
--
ALTER TABLE `tbl_banners`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_colaboradores`
--
ALTER TABLE `tbl_colaboradores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_testimonios`
--
ALTER TABLE `tbl_testimonios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_banners`
--
ALTER TABLE `tbl_banners`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_colaboradores`
--
ALTER TABLE `tbl_colaboradores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_testimonios`
--
ALTER TABLE `tbl_testimonios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
