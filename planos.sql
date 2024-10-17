-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 15:49:37
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
-- Base de datos: `planos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_plano` int(11) DEFAULT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_compras`
--

CREATE TABLE `historial_compras` (
  `id_compra` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `tipo_plano` varchar(50) NOT NULL,
  `precio_plano` decimal(10,2) NOT NULL,
  `monto_pagado` decimal(10,2) NOT NULL,
  `cambio` decimal(10,2) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planos_comerciales`
--

CREATE TABLE `planos_comerciales` (
  `id_plano` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `medidas` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planos_comerciales`
--

INSERT INTO `planos_comerciales` (`id_plano`, `nombre`, `descripcion`, `medidas`, `precio`) VALUES
(1, 'Moderna', 'Oficina moderna con espacios abiertos y buena iluminación.', '100 m²', 150000.00),
(2, 'Local Comercial', 'Local ideal para pequeños negocios, con amplia vitrina.', '50 m²', 80000.00),
(3, 'Restaurante', 'Diseño acogedor para un restaurante familiar.', '120 m²', 200000.00),
(4, 'Salón de Eventos', 'Ideal para eventos y reuniones, con cocina integrada.', '150 m²', 300000.00),
(5, 'Tienda de Ropa', 'Espacio bien distribuido para exhibición de productos.', '80 m²', 120000.00),
(6, 'Espacio Abierto', 'Espacio flexible y moderno para oficinas.', '200 m²', 250000.00),
(7, 'Cafetería', 'Ideal para un espacio acogedor y familiar.', '70 m²', 90000.00),
(8, 'Gimnasio', 'Espacio amplio para diversas actividades deportivas.', '300 m²', 400000.00),
(9, 'Consultorio Médico', 'Espacio adecuado para atención médica.', '60 m²', 95000.00),
(10, 'Estudio de Diseño', 'Ideal para diseñadores con áreas creativas.', '80 m²', 115000.00),
(11, 'Centro de Bienestar', 'Espacio diseñado para terapias y bienestar personal.', '100 m²', 140000.00),
(12, 'Centro de Negocios', 'Oficinas equipadas para empresas y emprendedores.', '250 m²', 350000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planos_oficinas`
--

CREATE TABLE `planos_oficinas` (
  `id_plano` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `medidas` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planos_oficinas`
--

INSERT INTO `planos_oficinas` (`id_plano`, `nombre`, `descripcion`, `medidas`, `precio`) VALUES
(1, 'Oficina Ejecutiva', 'Oficina ejecutiva con ambiente moderno y funcional.', '80 m²', 120000.00),
(2, 'Oficina Compacta', 'Oficina compacta, ideal para freelancers o pequeñas empresas.', '50 m²', 70000.00),
(3, 'Oficina Creativa', 'Espacio diseñado para fomentar la creatividad y la colaboración.', '120 m²', 180000.00),
(4, 'Oficina Compartida', 'Ideal para startups y empresas en crecimiento.', '150 m²', 220000.00),
(5, 'Oficina Moderna', 'Oficina moderna con diseño minimalista.', '100 m²', 150000.00),
(6, 'Oficina de Diseño', 'Oficina de diseño con espacios abiertos y luminosos.', '200 m²', 300000.00),
(7, 'Oficina Ejecutiva Premium', 'Oficina premium con acabados de alta calidad y vistas panorámicas.', '90 m²', 135000.00),
(8, 'Oficina Minimalista', 'Espacio minimalista y eficiente para el trabajo diario.', '70 m²', 100000.00),
(9, 'Oficina Estudio', 'Estudio privado para profesionales o pequeñas reuniones.', '60 m²', 80000.00),
(10, 'Oficina Tecnológica', 'Oficina con tecnología avanzada y diseño innovador.', '110 m²', 160000.00),
(11, 'Oficina Ejecutiva Deluxe', 'Oficina deluxe con espacios exclusivos y cómodos.', '130 m²', 200000.00),
(12, 'Oficina Ágil', 'Oficina ágil y flexible, perfecta para equipos dinámicos.', '85 m²', 95000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planos_residenciales`
--

CREATE TABLE `planos_residenciales` (
  `id_planos` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `habitaciones` int(11) NOT NULL,
  `niveles` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tamano` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planos_residenciales`
--

INSERT INTO `planos_residenciales` (`id_planos`, `nombre`, `habitaciones`, `niveles`, `descripcion`, `tamano`, `precio`) VALUES
(1, 'Casa Tipo LOFT 9 X 16', 2, 2, 'Ideal para familias pequeñas, cuenta con un diseño contemporáneo y funcional.', '144 m²', 150000.00),
(2, 'Casa Moderna 10 X 20', 3, 1, 'Perfecta para un estilo de vida moderno, con espacios amplios y luminosos.', '200 m²', 250000.00),
(3, 'Casa Familiar 12 X 18', 4, 2, 'Espacios diseñados para el confort familiar, ideal para la convivencia.', '216 m²', 300000.00),
(4, 'Casa Minimalista 8 X 16', 2, 1, 'Diseño minimalista que maximiza los espacios.', '128 m²', 120000.00),
(5, 'Casa Estilo Ranchero 15 X 25', 5, 1, 'Ideal para áreas rurales, combina confort con estilo campestre.', '375 m²', 400000.00),
(6, 'Casa Eco-Amigable 11 X 22', 3, 2, 'Diseñada para ser sostenible y respetuosa con el medio ambiente.', '242 m²', 280000.00),
(7, 'Casa Contemporánea 14 X 28', 4, 3, 'Combina elegancia y funcionalidad en cada rincón.', '392 m²', 450000.00),
(8, 'Casa de Playa 13 X 30', 6, 2, 'Perfecta para disfrutar de la brisa marina y los días soleados.', '390 m²', 500000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `numero_telefono` varchar(15) DEFAULT NULL,
  `correo_electronico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `usuario`, `password`, `numero_telefono`, `correo_electronico`) VALUES
(4, 'Ediel Solis', 'ediel', '123', '1234567890', 'ediel.solis@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_compras`
--
ALTER TABLE `historial_compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `planos_comerciales`
--
ALTER TABLE `planos_comerciales`
  ADD PRIMARY KEY (`id_plano`);

--
-- Indices de la tabla `planos_oficinas`
--
ALTER TABLE `planos_oficinas`
  ADD PRIMARY KEY (`id_plano`);

--
-- Indices de la tabla `planos_residenciales`
--
ALTER TABLE `planos_residenciales`
  ADD PRIMARY KEY (`id_planos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo_electronico` (`correo_electronico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_compras`
--
ALTER TABLE `historial_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `planos_comerciales`
--
ALTER TABLE `planos_comerciales`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `planos_oficinas`
--
ALTER TABLE `planos_oficinas`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `planos_residenciales`
--
ALTER TABLE `planos_residenciales`
  MODIFY `id_planos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
