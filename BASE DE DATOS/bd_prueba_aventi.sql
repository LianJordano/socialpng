-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-08-2021 a las 18:34:45
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_prueba_aventi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `uid_fk` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `created` date NOT NULL,
  `uploads` varchar(30) DEFAULT NULL,
  `like_count` int(11) NOT NULL DEFAULT 0,
  `comment_count` int(11) NOT NULL DEFAULT 0,
  `share_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`msg_id`, `message`, `uid_fk`, `ip`, `created`, `uploads`, `like_count`, `comment_count`, `share_count`) VALUES
(1, 'Este es un mensaje de prueba creado, a las tales horas', 1, '127.0.0.1', '2021-08-01', '010821110813fotoprueba.jpg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message_like`
--

CREATE TABLE `message_like` (
  `like_id` int(11) NOT NULL,
  `msg_id_fk` int(11) NOT NULL,
  `uid_fk` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `friend_count` int(11) NOT NULL DEFAULT 0,
  `status` int(1) DEFAULT NULL,
  `full_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `email`, `profile_pic`, `friend_count`, `status`, `full_name`) VALUES
(1, 'lamortex', '12345', 'julian@julian.com', '010821110854índice.jpeg', 0, 0, 'Julian Camilo Jordan');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `uid_fk` (`uid_fk`);

--
-- Indices de la tabla `message_like`
--
ALTER TABLE `message_like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `msg_id_fk` (`msg_id_fk`),
  ADD KEY `uid_fk` (`uid_fk`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `message_like`
--
ALTER TABLE `message_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`uid_fk`) REFERENCES `users` (`uid`);

--
-- Filtros para la tabla `message_like`
--
ALTER TABLE `message_like`
  ADD CONSTRAINT `message_like_ibfk_1` FOREIGN KEY (`msg_id_fk`) REFERENCES `messages` (`msg_id`),
  ADD CONSTRAINT `message_like_ibfk_2` FOREIGN KEY (`uid_fk`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
