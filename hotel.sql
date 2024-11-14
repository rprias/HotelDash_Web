-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 00:21:46
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
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `ID` bigint(10) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` text NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`ID`, `FirstName`, `LastName`, `Email`, `Message`) VALUES
(1, 'Ramesh', 'babu', 'ram@gmail.com', 'Well Organized Project .....Cool!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_booking`
--

CREATE TABLE `event_booking` (
  `BookingId` bigint(10) NOT NULL,
  `EventId` bigint(10) NOT NULL,
  `User_id` bigint(10) NOT NULL,
  `Date` date NOT NULL,
  `Modified_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Event_date` date NOT NULL,
  `NoOfGuest` varchar(50) NOT NULL,
  `EventTime` time NOT NULL,
  `Package` bigint(10) NOT NULL,
  `Amount` double NOT NULL,
  `Email` text NOT NULL,
  `Phone_number` bigint(10) NOT NULL,
  `Status` enum('Rejected','Cancelled','Paid','Booked','CheckedOut') NOT NULL DEFAULT 'Booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `event_booking`
--

INSERT INTO `event_booking` (`BookingId`, `EventId`, `User_id`, `Date`, `Modified_date`, `Event_date`, `NoOfGuest`, `EventTime`, `Package`, `Amount`, `Email`, `Phone_number`, `Status`) VALUES
(12, 18, 5, '2021-10-12', '2021-10-12 15:04:50', '2021-10-14', '200-250', '09:00:00', 8, 16000, 'rajesh@gmail.com', 8574526352, 'Rejected'),
(13, 22, 5, '2021-08-04', '2021-08-06 15:06:29', '2021-08-14', '250-300', '09:30:00', 8, 9600, 'rajesh@gmail.com', 8574859652, 'CheckedOut'),
(14, 19, 15, '2021-10-12', '2021-10-12 15:11:32', '2021-12-09', '100-200', '09:00:00', 8, 16000, 'rakesh@gmail.com', 8563526352, 'Paid'),
(15, 20, 15, '2021-10-12', '2021-10-12 15:12:02', '2021-11-20', '200-250', '10:00:00', 4, 8000, 'rakesh@gmail.com', 7545859652, 'Paid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_list`
--

CREATE TABLE `event_list` (
  `EventId` bigint(10) NOT NULL,
  `EventTypeId` bigint(10) NOT NULL,
  `HallNumber` bigint(10) NOT NULL,
  `Status` enum('Activa','Inactiva') NOT NULL,
  `Booking_status` enum('Ocupada','Disponible') NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `event_list`
--

INSERT INTO `event_list` (`EventId`, `EventTypeId`, `HallNumber`, `Status`, `Booking_status`) VALUES
(18, 11, 1, 'Activa', 'Ocupada'),
(19, 11, 2, 'Activa', 'Disponible'),
(20, 11, 3, 'Activa', 'Disponible'),
(21, 11, 4, 'Activa', 'Disponible'),
(22, 12, 5, 'Activa', 'Disponible'),
(23, 12, 6, 'Activa', 'Disponible'),
(24, 11, 7, 'Activa', 'Disponible'),
(25, 12, 8, 'Activa', 'Disponible'),
(26, 11, 9, 'Activa', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_payment`
--

CREATE TABLE `event_payment` (
  `PaymentId` bigint(10) NOT NULL,
  `BookingId` bigint(10) NOT NULL,
  `PaymentType` enum('Cash','Net Banking','Credit Card','Debit Card') NOT NULL,
  `PaymentDate` date NOT NULL DEFAULT current_timestamp(),
  `Amount` int(50) NOT NULL,
  `Status` enum('Paid') NOT NULL DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `event_payment`
--

INSERT INTO `event_payment` (`PaymentId`, `BookingId`, `PaymentType`, `PaymentDate`, `Amount`, `Status`) VALUES
(1, 13, 'Cash', '2021-08-13', 9600, 'Paid'),
(2, 15, 'Net Banking', '2021-10-12', 8000, 'Paid'),
(3, 14, 'Debit Card', '2021-10-12', 16000, 'Paid');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general_settings`
--

CREATE TABLE `general_settings` (
  `ID` bigint(10) NOT NULL,
  `Name` text NOT NULL,
  `Address_line1` text NOT NULL,
  `Address_line2` text NOT NULL,
  `City` varchar(10) NOT NULL,
  `State` varchar(10) NOT NULL,
  `Country` varchar(10) NOT NULL,
  `Zip_code` bigint(10) NOT NULL,
  `Email` text NOT NULL,
  `Phone_number` bigint(10) NOT NULL,
  `Telephone_number` bigint(10) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `general_settings`
--

INSERT INTO `general_settings` (`ID`, `Name`, `Address_line1`, `Address_line2`, `City`, `State`, `Country`, `Zip_code`, `Email`, `Phone_number`, `Telephone_number`, `Description`) VALUES
(1, 'Hotel Dash Bogota', 'Calle 93', 'Numero 13 - 70', 'Bogota', 'Bogota DC', 'Colombia', 41011, 'admin_dash@dash-hotel.com', 3658968555, 123456789, 'El Hotel Dash es más que un simple lugar para hospedarse; es una experiencia de lujo que combina la belleza natural de los cerros con un servicio excepcional. Ideal para viajeros que buscan lo mejor, este hotel promete crear recuerdos inolvidables en un entorno deslumbrante, donde cada detalle brilla como un diamante.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_booking`
--

CREATE TABLE `room_booking` (
  `BookingId` bigint(10) NOT NULL,
  `RoomId` bigint(10) NOT NULL,
  `User_id` bigint(10) NOT NULL,
  `Date` date NOT NULL,
  `Modified_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `NoOfGuest` varchar(50) NOT NULL,
  `Amount` double NOT NULL,
  `Email` text NOT NULL,
  `Phone_number` bigint(10) NOT NULL,
  `Status` enum('Rejected','Cancelled','Paid','Booked','CheckedOut') NOT NULL DEFAULT 'Booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `room_booking`
--

INSERT INTO `room_booking` (`BookingId`, `RoomId`, `User_id`, `Date`, `Modified_date`, `CheckIn`, `CheckOut`, `NoOfGuest`, `Amount`, `Email`, `Phone_number`, `Status`) VALUES
(27, 20, 5, '2021-10-12', '2021-10-12 15:01:44', '2021-10-13', '2021-10-15', '2', 4000, 'rajesh@gmail.com', 8596526352, 'Paid'),
(28, 13, 5, '2021-10-12', '2021-10-12 15:02:20', '2021-10-20', '2021-10-22', '1', 2400, 'rajesh@gmail.com', 8542526352, 'Cancelled'),
(29, 21, 5, '2021-10-12', '2021-10-12 15:05:32', '2021-11-03', '2021-11-05', '1', 4000, 'rajesh@gmail.com', 8596857452, 'Rejected'),
(30, 22, 15, '2021-10-12', '2021-10-12 15:08:36', '2021-12-02', '2021-12-03', '1', 1750, 'rakesh@gmail.com', 9685745241, 'Paid'),
(31, 13, 15, '2021-10-12', '2021-10-12 15:09:00', '2021-11-11', '2021-11-13', '2', 2400, 'rakesh@gmail.com', 7485965263, 'Cancelled'),
(32, 16, 15, '2021-10-12', '2021-10-12 15:09:31', '2021-11-18', '2021-11-20', '2', 3600, 'rakesh@gmail.com', 9652635241, 'Paid'),
(33, 29, 15, '2021-10-12', '2021-10-12 15:10:07', '2021-10-14', '2021-10-23', '1', 31500, 'rakesh@gmail.com', 8541526352, 'Paid'),
(34, 18, 15, '2021-10-12', '2021-10-12 15:10:42', '2021-11-11', '2021-11-13', '2', 3600, 'rakesh@gmail.com', 8585968563, 'Booked'),
(35, 16, 5, '2024-11-14', '2024-11-14 22:31:05', '1970-01-01', '1970-01-01', '1', 0, 'rodrigo.prias@gmail.com', 3044632346, 'Cancelled'),
(36, 18, 5, '2024-11-14', '2024-11-14 22:32:39', '2024-11-02', '2024-11-09', '1', 0, 'rodrigo.prias@gmail.com', 3044632346, 'Cancelled');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_list`
--

CREATE TABLE `room_list` (
  `RoomId` bigint(10) NOT NULL,
  `RoomTypeId` bigint(10) NOT NULL,
  `RoomNumber` bigint(10) NOT NULL,
  `Status` enum('Activa','Inactiva') NOT NULL,
  `Booking_status` enum('Disponible','Ocupado') NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `room_list`
--

INSERT INTO `room_list` (`RoomId`, `RoomTypeId`, `RoomNumber`, `Status`, `Booking_status`) VALUES
(13, 11, 1, 'Activa', 'Disponible'),
(14, 11, 2, 'Activa', 'Disponible'),
(15, 11, 3, 'Activa', 'Disponible'),
(16, 12, 4, 'Activa', ''),
(17, 11, 5, 'Activa', 'Disponible'),
(18, 12, 6, 'Activa', ''),
(19, 12, 7, 'Activa', 'Disponible'),
(20, 13, 8, 'Activa', 'Disponible'),
(21, 13, 9, 'Activa', 'Disponible'),
(22, 14, 10, 'Activa', 'Disponible'),
(23, 14, 11, 'Activa', 'Disponible'),
(24, 14, 12, 'Activa', 'Disponible'),
(25, 15, 13, 'Activa', 'Disponible'),
(26, 15, 14, 'Activa', 'Disponible'),
(27, 16, 15, 'Activa', 'Disponible'),
(28, 18, 16, 'Activa', 'Disponible'),
(29, 17, 17, 'Activa', 'Disponible'),
(30, 16, 18, 'Activa', 'Disponible'),
(31, 17, 19, 'Activa', 'Disponible'),
(32, 15, 20, 'Activa', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_payment`
--

CREATE TABLE `room_payment` (
  `PaymentId` bigint(10) NOT NULL,
  `BookingId` bigint(10) NOT NULL,
  `PaymentType` enum('Cash','Net Banking','Credit Card','Debit Card') NOT NULL,
  `PaymentDate` date NOT NULL DEFAULT current_timestamp(),
  `Amount` int(50) NOT NULL,
  `Status` enum('Paid') NOT NULL DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `room_payment`
--

INSERT INTO `room_payment` (`PaymentId`, `BookingId`, `PaymentType`, `PaymentDate`, `Amount`, `Status`) VALUES
(1, 27, 'Net Banking', '2021-10-12', 4000, 'Paid'),
(2, 32, 'Net Banking', '2021-10-12', 3600, 'Paid'),
(3, 30, 'Net Banking', '2021-10-12', 1750, 'Paid'),
(4, 33, 'Debit Card', '2021-10-12', 31500, 'Paid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `room_type`
--

CREATE TABLE `room_type` (
  `RoomTypeId` bigint(10) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `RoomImage` text NOT NULL,
  `Description` text NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `Status` enum('Activa','InActiva') NOT NULL DEFAULT 'Activa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `room_type`
--

INSERT INTO `room_type` (`RoomTypeId`, `RoomType`, `RoomImage`, `Description`, `Cost`, `Status`) VALUES
(11, 'Habitacion Familiar', 'classic.jpg', 'TV de pantalla plana de 32 pulgadas,Equipamiento de cocina,Toallas,Mesas de comedor', 120000.00, 'Activa'),
(12, 'Habitacion para Estudiantes', 'well.jpg', 'Jabón y amenidades de baño,Mini-bar, Teléfono', 180000.00, 'Activa'),
(13, 'Presidential Suites', 'A.jpg', 'Closet with hangers, HD flat-screen TV, Telephone', 200000.00, 'Activa'),
(14, 'Classic Room', 'accomadation.jpg', 'Closet with hangers, HD flat-screen TV, Telephone\r\n\r\n', 175000.00, 'Activa'),
(15, 'Club Room ', 'A.jpg', ' Closet with hangers, 24 Hour room service,Computer and Internet access', 168000.00, 'Activa'),
(16, 'Deluxe Room', 'classic.jpg', 'Closet with hangers, HD flat-screen TV, Telephone', 190000.00, 'Activa'),
(17, 'Super Deluxe ', 'club.jpg', '32 Inch flat screen TV, HD flat-screen TV,Mini-bar, Telephone', 350000.00, 'Activa'),
(18, 'Luxury', 'super.jpg', 'Closet with hangers,32 Inch flat screen TV,Mini-bar, Telephone', 350000.00, 'Activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_details`
--

CREATE TABLE `users_details` (
  `UserId` bigint(10) NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `NoDocu` varchar(50) NOT NULL,
  `Email` text NOT NULL,
  `Password` varchar(64) NOT NULL,
  `ContactNo` varchar(50) NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `ProfileImage` text NOT NULL DEFAULT 'user.png',
  `Rol` enum('Admin','Cliente') NOT NULL DEFAULT 'Cliente',
  `DcoTipo` enum('CC','CE','DIE','NUIP','PP','PEP') NOT NULL DEFAULT 'CC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_details`
--

INSERT INTO `users_details` (`UserId`, `Nombre`, `NoDocu`, `Email`, `Password`, `ContactNo`, `Genero`, `ProfileImage`, `Rol`, `DcoTipo`) VALUES
(5, 'Raul', '12512432154', 'raul23@gmail.com', '123', '3636636363', 'Masculino', '2.jpeg', 'Cliente', 'CC'),
(15, 'Rodrigo', 'Prias', 'Rodri@dash.com', '456', '3563526352', 'Masculino', 'Perfil.png', 'Admin', 'NUIP'),
(30, 'Rodrigo Prias', '80195531', 'rodrigo.prias@cun.edu.co', '123', '3044632347', 'Masculino', 'Perfil.png', 'Admin', 'CC'),
(31, 'Juan Pérez', '12345678', 'juan.perez@example.com', 'password123', '3123456789', 'Masculino', 'profile1.jpg', 'Cliente', 'CC'),
(32, 'María González', '87654321', 'maria.gonzalez@example.com', 'password123', '6123456789', 'Femenino', 'profile2.jpg', 'Cliente', 'CE'),
(33, 'Carlos Rodríguez', '23456789', 'carlos.rodriguez@example.com', 'password123', '3129876543', 'Masculino', 'profile3.jpg', 'Cliente', 'DIE'),
(34, 'Ana Martínez', '34567890', 'ana.martinez@example.com', 'password123', '6123456780', 'Femenino', 'profile4.jpg', 'Cliente', 'NUIP'),
(35, 'Luis Fernández', '45678901', 'luis.fernandez@example.com', 'password123', '3123456781', 'Masculino', 'profile5.jpg', 'Cliente', 'PP'),
(36, 'Laura López', '56789012', 'laura.lopez@example.com', 'password123', '6123456782', 'Femenino', 'profile6.jpg', 'Cliente', 'PEP'),
(37, 'Javier Sánchez', '67890123', 'javier.sanchez@example.com', 'password123', '3123456783', 'Masculino', 'profile7.jpg', 'Cliente', 'CC'),
(38, 'Patricia Torres', '78901234', 'patricia.torres@example.com', 'password123', '6123456785', 'Femenino', 'profile6.jpg', 'Cliente', 'CE'),
(39, 'Miguel Ángel Díaz', '89012345', 'miguel.diaz@example.com', 'password123', '3123456785', 'Masculino', 'profile9.jpg', 'Cliente', 'DIE'),
(40, 'Sofía Ramírez', '90123456', 'sofia.ramirez@example.com', 'password123', '6123456786', 'Femenino', 'profile10.jpg', 'Cliente', 'NUIP');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `event_booking`
--
ALTER TABLE `event_booking`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `FK_User` (`User_id`),
  ADD KEY `FK_RoomBooking` (`EventId`);

--
-- Indices de la tabla `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`EventId`),
  ADD KEY `FK_EventType` (`EventTypeId`);

--
-- Indices de la tabla `event_payment`
--
ALTER TABLE `event_payment`
  ADD PRIMARY KEY (`PaymentId`),
  ADD KEY `Fk_Booking` (`BookingId`);

--
-- Indices de la tabla `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`EventTypeId`);

--
-- Indices de la tabla `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `room_booking`
--
ALTER TABLE `room_booking`
  ADD PRIMARY KEY (`BookingId`),
  ADD KEY `FK_User` (`User_id`),
  ADD KEY `FK_RoomBooking` (`RoomId`);

--
-- Indices de la tabla `room_list`
--
ALTER TABLE `room_list`
  ADD PRIMARY KEY (`RoomId`),
  ADD KEY `FK_RoomType` (`RoomTypeId`);

--
-- Indices de la tabla `room_payment`
--
ALTER TABLE `room_payment`
  ADD PRIMARY KEY (`PaymentId`),
  ADD KEY `Fk_Booking` (`BookingId`);

--
-- Indices de la tabla `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`RoomTypeId`);

--
-- Indices de la tabla `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `event_booking`
--
ALTER TABLE `event_booking`
  MODIFY `BookingId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `event_list`
--
ALTER TABLE `event_list`
  MODIFY `EventId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `event_payment`
--
ALTER TABLE `event_payment`
  MODIFY `PaymentId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `event_type`
--
ALTER TABLE `event_type`
  MODIFY `EventTypeId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `ID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `room_booking`
--
ALTER TABLE `room_booking`
  MODIFY `BookingId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `room_list`
--
ALTER TABLE `room_list`
  MODIFY `RoomId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `room_payment`
--
ALTER TABLE `room_payment`
  MODIFY `PaymentId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `room_type`
--
ALTER TABLE `room_type`
  MODIFY `RoomTypeId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users_details`
--
ALTER TABLE `users_details`
  MODIFY `UserId` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `event_booking`
--
ALTER TABLE `event_booking`
  ADD CONSTRAINT `FK_EventBooking` FOREIGN KEY (`EventId`) REFERENCES `event_list` (`EventId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UserBooking` FOREIGN KEY (`User_id`) REFERENCES `users_details` (`UserId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `event_list`
--
ALTER TABLE `event_list`
  ADD CONSTRAINT `FK_EventType` FOREIGN KEY (`EventTypeId`) REFERENCES `event_type` (`EventTypeId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `event_payment`
--
ALTER TABLE `event_payment`
  ADD CONSTRAINT `FK_EventPayment` FOREIGN KEY (`BookingId`) REFERENCES `event_booking` (`BookingId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `room_booking`
--
ALTER TABLE `room_booking`
  ADD CONSTRAINT `FK_RoomBooking` FOREIGN KEY (`RoomId`) REFERENCES `room_list` (`RoomId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_User` FOREIGN KEY (`User_id`) REFERENCES `users_details` (`UserId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `room_list`
--
ALTER TABLE `room_list`
  ADD CONSTRAINT `FK_RoomType` FOREIGN KEY (`RoomTypeId`) REFERENCES `room_type` (`RoomTypeId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `room_payment`
--
ALTER TABLE `room_payment`
  ADD CONSTRAINT `Fk_Booking` FOREIGN KEY (`BookingId`) REFERENCES `room_booking` (`BookingId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
