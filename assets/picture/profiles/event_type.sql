-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2024 a las 02:25:16
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
-- Base de datos: `hotel_dash`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_type`
--

CREATE TABLE `event_type` (
  `EventTypeId` bigint(10) NOT NULL,
  `EventType` varchar(15) NOT NULL,
  `EventImage` text NOT NULL,
  `Description` text NOT NULL,
  `Cost` double NOT NULL,
  `Status` enum('Activa','Inactiva') NOT NULL DEFAULT 'Activa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `event_type`
--

INSERT INTO `event_type` (`EventTypeId`, `EventType`, `EventImage`, `Description`, `Cost`, `Status`) VALUES
(11, 'Wedding Hall', 'wedding.jpg', 'This hall is a space offered mainly for weddings, birthdays, bridal showers and other personal events. They could be separate or part of a hotel or restaurant.', 2000, 'Activa'),
(12, 'Meeting Hall', 'meeting.jpeg', 'The Killi, Kaveri and Tanjore meeting rooms are the perfect combination of space and ideal ambiance with state of the art amenities and audio visual equipments', 1200, 'Activa'),
(13, 'Conference Hall', 'accomadation.jpg', 'Ten distinct dining destinations featuring Indian & international cuisine along with some of the .....', 1700, 'Activa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`EventTypeId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `event_type`
--
ALTER TABLE `event_type`
  MODIFY `EventTypeId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
