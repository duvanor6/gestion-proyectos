-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2024 a las 21:51:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myprojectsapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(40) NOT NULL,
  `IDPROJECT` int(11) NOT NULL,
  `IDTASK` int(11) NOT NULL,
  `FILE` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`ID`, `USERNAME`, `IDPROJECT`, `IDTASK`, `FILE`) VALUES
(1, 'duvanor', 2, 4, 'Organización.docx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `USERNAME` varchar(40) NOT NULL,
  `ID` int(11) NOT NULL,
  `TITLE` varchar(80) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `DELIVDATE` varchar(15) DEFAULT NULL,
  `STATUS` varchar(15) DEFAULT NULL,
  `PERCENT` int(11) DEFAULT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `PHONE` varchar(15) NOT NULL,
  `GERENTE` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`USERNAME`, `ID`, `TITLE`, `DESCRIPTION`, `DELIVDATE`, `STATUS`, `PERCENT`, `ADDRESS`, `PHONE`, `GERENTE`) VALUES
('duvanor', 1, 'Sistema', 'Sistema', '2024-06-22', 'Completed', 100, '', '', ''),
('duvanor', 2, 'Proyecto', 'Proyecto', '2022-03-21', 'Completed', 20, '', '', ''),
('duvanor', 3, 'Proyecto3', 'Proyecto', '2024-11-18', 'Completed', 100, '', '', ''),
('duvanor', 4, 'Sistema de Gestión de Proyectos', 'Sistema de Gestión de Proyectos', '2024-12-10', 'Completed', 100, '', '', ''),
('duvanor', 5, 'Conector SAP Success Factor', 'Conector SAP Success Factor', '2023-02-02', 'Completed', 0, '', '', ''),
('duvanor', 6, 'Prueba Proyectos', 'Prueba Proyectos', '2026-04-03', 'Completed', 100, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) NOT NULL,
  `project` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id`, `project`, `nombre`, `descripcion`, `valor`) VALUES
(1, 1, 'Servidor', 'Servidores de prueba', 500000.00),
(2, 1, 'Servidor Prod', 'Servidores de ´produccion', 500000.00),
(3, 1, 'Impresora', 'Para imprimir', 20000.00),
(4, 5, 'Impresora', 'Para copias', 3000000.00),
(5, 4, 'Impresora', 'Multifuncional', 20000.00),
(6, 3, 'Impresora', 'RICOH', 30000.00),
(7, 3, 'Servidor', 'Pruebas', 3000000.00),
(8, 6, 'Servidor Pruebas', 'Servidor Pruebas', 2000000.00),
(9, 6, 'Servidor Produccion', 'Servidor Produccion', 2500000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `USERNAME` varchar(40) NOT NULL,
  `IDPROJECT` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `TITLE` varchar(80) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  `STATUS` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`USERNAME`, `IDPROJECT`, `ID`, `TITLE`, `DESCRIPTION`, `STATUS`) VALUES
('duvanor', 1, 1, 'Tarea1', 'Tarea1', 'Completed'),
('duvanor', 1, 2, 'Tarea2', 'Tarea', 'Completed'),
('duvanor', 1, 3, 'Tarea1', 'sadasd', 'Completed'),
('duvanor', 2, 4, 'Tarea1', 'Trare', 'Incomplete'),
('duvanor', 2, 5, 'Tarea1', '123123', 'Incomplete'),
('duvanor', 2, 6, 'Tarea2', 'dasdasd', 'Incomplete'),
('duvanor', 2, 7, 'Tarea3', 'asdasdasd', 'Incomplete'),
('duvanor', 2, 8, 'Tarea4', 'asdasd', 'Incomplete'),
('duvanor', 2, 9, 'asdasd', 'asdasd', 'Incomplete'),
('duvanor', 1, 10, 'Sistema111', 'asdasd', 'Completed'),
('duvanor', 3, 11, 'Tarea1', 'asdasdasd', 'Completed'),
('duvanor', 3, 12, 'Tarea2', 'asdasdasd', 'Completed'),
('duvanor', 3, 13, 'Sistema111', 'dsdfsf', 'Completed'),
('duvanor', 4, 14, 'Tarea1', 'Tarea1', 'Completed'),
('duvanor', 4, 15, 'Tarea1', 'asdasd', 'Completed'),
('duvanor', 6, 16, 'Tarea1', 'Tarea1', 'Completed'),
('duvanor', 6, 17, 'Tarea2', 'Tarea2', 'Completed'),
('duvanor', 6, 18, 'Tarea3', 'Tarea3', 'Completed');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usernames`
--

CREATE TABLE `usernames` (
  `USERNAME` varchar(40) NOT NULL,
  `NAMES` varchar(40) DEFAULT NULL,
  `SURNAMES` varchar(40) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `PHONE` varchar(15) DEFAULT NULL,
  `GENDER` varchar(10) DEFAULT NULL,
  `BIRTHDATE` date DEFAULT NULL,
  `NAME` varchar(40) DEFAULT NULL,
  `SURNAME` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `FUNCTION` varchar(10) DEFAULT NULL,
  `STATEMENT` varchar(10) DEFAULT NULL,
  `PROFESSION` enum('project_manager','developer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usernames`
--

INSERT INTO `usernames` (`USERNAME`, `NAMES`, `SURNAMES`, `ADDRESS`, `PHONE`, `GENDER`, `BIRTHDATE`, `NAME`, `SURNAME`, `PASSWORD`, `IMAGE`, `FUNCTION`, `STATEMENT`, `PROFESSION`) VALUES
('1102878688', NULL, NULL, 'Cra 40b #9 - 9', '3215737710', 'male', '2011-12-12', 'Duban', 'Ortega', '$2y$10$WLOP6zUbgr1QTtHeRdeknuvoG6887vYl8Ot44pFreQVTZWN./MTq2', NULL, 'User', 'Avaiable', 'developer'),
('11028786882', NULL, NULL, 'Cra 40b #9 - 9', '3003525992', 'male', '2000-12-12', 'Duban', 'Ortega', '$2y$10$0xyUPO4J8yv7vFPMkht.N.BiWzbNKqJlbbDdYku0YC2lTV9chdOFG', NULL, 'User', 'Avaiable', 'project_manager'),
('11028786883', NULL, NULL, 'Cra 40b #9 - 9', '3215737710', 'male', '2011-12-12', 'Duban', 'Ortega', '$2y$10$z5ZAAalpJzi6kR0d2S0i4ulZuvRl6QwIKO.VckYU/Q08KYpFZMK6i', NULL, 'User', 'Avaiable', 'project_manager'),
('110287868833', NULL, NULL, 'Cra 40b #9 - 9', '3215737710', 'female', '1990-12-12', 'Aleja', 'Mendoza', '$2y$10$d1o4Yy4oV5oVEWPNbP6vWe34D5aImi1rcXAhREoh4Njj2wYASQip6', NULL, 'User', 'Avaiable', 'developer'),
('alexander', NULL, NULL, 'Cra 40b #9 - 9', '3003525992', 'male', '2011-12-12', 'Alexander', 'Arnold', '$2y$10$fxVQ/iyQsOjsl.tEyfluzuNH9N2qr4d/QOicy.DmTs10QlFB8BBvu', NULL, 'User', 'Avaiable', 'developer'),
('dev1', 'John', 'Doe', '123 Main St', '123456789', 'Male', '1990-01-01', 'Jhon', 'Doe', '$2y$10$5Rmc4qj1l3HrhgM0WItDJOyf.lZ.k4Z0WbP74.UqUmCnlO9aPLKj6', NULL, 'Developer', 'Avaiable', 'developer'),
('dev2', 'Jane', 'Smith', '456 Oak Ave', '987654321', 'Female', '1995-05-15', 'Jane', 'Smith', '$2y$10$5Rmc4qj1l3HrhgM0WItDJOyf.lZ.k4Z0WbP74.UqUmCnlO9aPLKj6', NULL, 'Developer', 'Avaiable', 'developer'),
('duvanor', NULL, NULL, NULL, NULL, NULL, NULL, 'Duban', 'Ortega', '$2y$10$c5Sr8C7i.7GczkRsZrMJquGCBVKMSdEh3Ns8kSh60WL8ws8Ao8bxu', 'default.jpg', 'User', 'Avaiable', 'project_manager'),
('duvanor33', NULL, NULL, NULL, NULL, NULL, NULL, 'Duban', 'Ortega', '$2y$10$YLm89QxEOzuc8dbkKzcKm.SWFsaUWT2lh6nYkLcBn6HpbuoUBMRRK', 'default.jpg', 'User', 'Avaiable', 'project_manager'),
('duvanor334', NULL, NULL, NULL, NULL, NULL, NULL, 'Duban', 'Ortega', '$2y$10$bpf00vdc2flPE5xsYHZpkuGhgyRxlQyRc8RwyKNNd2h7uQCYe/sBy', 'default.jpg', 'User', 'Avaiable', 'project_manager'),
('jairoprueba', NULL, NULL, 'Cra 40b #9 - 9', '3215737710', 'male', '2011-12-12', 'Jairo', 'Prueba', '$2y$10$TNTM1xeXPPvG/HAY5aG.UevcHrj8NS/Wl9YJbPyTrrGdNGFiOA5mW', NULL, 'User', 'Avaiable', 'developer'),
('manager1', 'Michael', 'Johnson', '789 Elm St', '456123789', 'Male', '1985-09-20', 'Michael', 'Jhonson', '$2y$10$5Rmc4qj1l3HrhgM0WItDJOyf.lZ.k4Z0WbP74.UqUmCnlO9aPLKj6', NULL, 'Manager', 'Avaiable', 'project_manager'),
('manager2', 'Emily', 'Davis', '321 Pine Ave', '987321654', 'Female', '1978-03-10', 'Emily', 'Davis', '$2y$10$5Rmc4qj1l3HrhgM0WItDJOyf.lZ.k4Z0WbP74.UqUmCnlO9aPLKj6', NULL, 'Manager', NULL, 'project_manager');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_project_relations`
--

CREATE TABLE `user_project_relations` (
  `USERNAME` varchar(40) NOT NULL,
  `IDPROJECT` int(11) NOT NULL,
  `ROLE` enum('project_manager','developer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user_project_relations`
--

INSERT INTO `user_project_relations` (`USERNAME`, `IDPROJECT`, `ROLE`) VALUES
('', 1, 'developer'),
('110287868833', 1, 'developer'),
('110287868833', 2, 'developer'),
('110287868833', 3, 'developer'),
('alexander', 1, 'developer'),
('alexander', 6, 'developer'),
('dev1', 1, 'developer'),
('dev1', 4, 'developer'),
('dev2', 5, 'developer'),
('duvanor', 1, 'project_manager'),
('duvanor', 2, 'project_manager'),
('duvanor', 3, 'project_manager'),
('duvanor33', 1, 'developer'),
('jairoprueba', 6, 'developer');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project` (`project`);

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usernames`
--
ALTER TABLE `usernames`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indices de la tabla `user_project_relations`
--
ALTER TABLE `user_project_relations`
  ADD PRIMARY KEY (`USERNAME`,`IDPROJECT`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `recursos_ibfk_1` FOREIGN KEY (`project`) REFERENCES `projects` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
