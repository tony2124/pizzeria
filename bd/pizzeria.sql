-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2016 a las 22:38:56
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pizzeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(45) NOT NULL,
  `admin_user` varchar(45) NOT NULL,
  `admin_pass` varchar(45) NOT NULL,
  `registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(80) NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `customer_pass` varchar(45) NOT NULL,
  `customer_address` varchar(120) NOT NULL,
  `customer_tel` varchar(15) NOT NULL,
  `registered` datetime DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_address`, `customer_tel`, `registered`, `approved`) VALUES
(1, 'Alfonso Calderón Chávez', 'alfonso.calderon.chavez@gmail.com', '123456', 'JUan de la barrera', '4531064590', '2016-09-10 23:39:42', 1),
(2, '', 'alfonso.calderon.chavez@gmail.c', '', '', '', '2016-09-16 14:41:41', 0),
(3, 'dfgdsf', 'sdfsdsdfdsfsd@email', '3434', 'wewee', '3432', '2016-09-16 14:43:51', 1),
(4, 'asdasd', 'alfonso.calderon.chavez@gmail.coms', 'asdas', 'sdfdsfsd df', '4545', '2016-09-21 00:09:01', 1),
(5, 'Bryan Alejandro', 'bryan@gmail.com', '123456', 'Conocido El Cenidor', '4531064590', '2016-09-29 18:09:29', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `colonia` varchar(45) NOT NULL,
  `numero` varchar(60) NOT NULL,
  `calle` varchar(80) NOT NULL,
  `referencias` varchar(120) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`sale_id`, `customer_id`, `total`, `telefono`, `colonia`, `numero`, `calle`, `referencias`, `date`) VALUES
(30, 1, 277, '4251046674', 'Benito Juárez', 'Núm 34', 'Juan Escutia', 'Casa verde detrás del auditorio', '2016-09-16 00:53:45'),
(31, 1, 30, '', '', '', '', '', '2016-09-16 01:15:40'),
(32, 1, 90, '4435', 'sdfsdf', 'dfg', 'fsdffgs', 'fsdgs       ', '2016-09-16 03:50:34'),
(39, 1, 60, '452453', 'col centro', 'num int 32 ext 45', '16 de septiembre #45', 'asda asdas das das d', '2016-09-21 02:39:17'),
(40, 1, 60, '452453', 'col centro', 'num int 32 ext 45', '16 de septiembre #45', 'asda asdas das das d', '2016-09-21 02:54:12'),
(41, 1, 60, '452453', 'col centro', 'num int 32 ext 45', '16 de septiembre #45', 'asda asdas das das d', '2016-09-21 02:55:21'),
(42, 1, 60, '452453', 'col centro', 'num int 32 ext 45', '16 de septiembre #45', 'asda asdas das das d', '2016-09-21 02:56:44'),
(43, 1, 60, '452453', 'col centro', 'num int 32 ext 45', '16 de septiembre #45', 'asda asdas das das d', '2016-09-21 02:57:15'),
(44, 1, 60, '452453', 'col centro', 'num int 32 ext 45', '16 de septiembre #45', 'asda asdas das das d', '2016-09-21 02:57:36'),
(45, 1, 208, '4531231234', 'Col. Beenito Juarez', 'num int 32 ext 45', '16 de septiembre #45', 'Casa verde detrÃ¡s del auditorio', '2016-09-21 03:02:10'),
(46, 1, 208, '4531231234', 'Col. Beenito Juarez', 'num int 32 ext 45', '16 de septiembre #45', 'Casa verde detrÃ¡s del auditorio', '2016-09-21 03:04:37'),
(47, 1, 208, '4531231234', 'Col. Beenito Juarez', 'num int 32 ext 45', '16 de septiembre #45', 'Casa verde detrÃ¡s del auditorio', '2016-09-21 03:04:42'),
(48, 1, 208, '4531231234', 'Col. Beenito Juarez', 'num int 32 ext 45', '16 de septiembre #45', 'Casa verde detrÃ¡s del auditorio', '2016-09-21 03:07:09'),
(49, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-21 22:38:25'),
(50, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-21 22:38:52'),
(51, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-21 22:39:20'),
(52, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-21 22:39:29'),
(53, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-21 22:41:43'),
(54, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-21 22:42:04'),
(55, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-21 22:42:52'),
(56, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-21 22:43:55'),
(57, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-22 01:48:30'),
(58, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num int 32 ext 45', 'Juan de la barrera', 'Casa verde con esquina del auditorio', '2016-09-22 01:52:23'),
(59, 1, 120, '1234567890', 'col col col', 'nu nu nu nu ', 'ju uu ju uju ju ', 'casa verde!', '2016-09-22 02:06:40'),
(60, 1, 208, '4531064590', 'Col. Beenito Juarez', 'num 34', 'juan escutia', 'Casa verde de la nueva cosa', '2016-09-27 01:48:06'),
(61, 1, 30, '983948', 'cilow', 'num', 'sdijij ', 'dsaosdoasnadiasidi ', '2016-09-29 17:51:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_details`
--

CREATE TABLE `sale_details` (
  `sale_detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `variety_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sale_details`
--

INSERT INTO `sale_details` (`sale_detail_id`, `sale_id`, `size_id`, `variety_id`) VALUES
(2, 30, 2, 2),
(3, 30, 3, 1),
(4, 30, 3, 2),
(5, 31, 1, 1),
(6, 32, 1, 1),
(7, 32, 1, 1),
(8, 32, 1, 1),
(9, 30, 1, 1),
(10, 43, 1, 1),
(11, 44, 1, 1),
(12, 45, 1, 1),
(13, 48, 1, 1),
(14, 49, 3, 1),
(15, 52, 3, 1),
(16, 53, 3, 1),
(17, 54, 3, 1),
(18, 55, 3, 1),
(19, 56, 3, 1),
(20, 58, 3, 1),
(21, 58, 1, 2),
(22, 59, 1, 1),
(23, 59, 1, 1),
(24, 59, 1, 1),
(25, 59, 1, 1),
(26, 60, 3, 2),
(27, 60, 2, 1),
(28, 60, 1, 2),
(29, 61, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(45) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`, `price`) VALUES
(1, 'INDIVIDUAL', 30),
(2, 'MEDIANA', 79),
(3, 'FAMILIAR', 99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `varieties`
--

CREATE TABLE `varieties` (
  `variety_id` int(11) NOT NULL,
  `variety_name` varchar(50) NOT NULL,
  `ingredients` varchar(100) NOT NULL,
  `picture` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `varieties`
--

INSERT INTO `varieties` (`variety_id`, `variety_name`, `ingredients`, `picture`) VALUES
(1, 'Alemana', 'Salchicha y elote', 'alemana.jpg'),
(2, 'Peperoni', 'Peperoni', 'peperoni.png'),
(12, 'Hawaiana', 'JamÃ³n y piÃ±a', '2016_09_29_21_31_10.jpg'),
(13, 'Tres quesos', 'Tres diferentes quesos y piÃ±a', '2016_09_29_21_33_26.jpg'),
(14, 'California', 'JamÃ³n, salchicha y jalapeÃ±o.', '2016_09_29_21_34_31.jpg'),
(15, 'Italiana', 'Peperoni, salami, salchicha, jamÃ³n y tocino', '2016_09_29_21_41_54.jpg'),
(16, 'Imperial', 'Salami, jalapeÃ±o, tocino y champiÃ±Ã³n', '2016_09_29_21_42_24.jpg'),
(17, 'Vegetariana', 'Salami, jalapeÃ±o, tocino y champiÃ±Ã³n.', '2016_09_29_21_43_01.jpg'),
(18, 'Romana', 'Peperoni, tocino y jalapeÃ±o.', '2016_09_29_21_43_58.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `fk_sales_customers1_idx` (`customer_id`);

--
-- Indices de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`sale_detail_id`),
  ADD KEY `fk_sales_sizes_idx` (`size_id`),
  ADD KEY `fk_sales_varieties1_idx` (`variety_id`),
  ADD KEY `fk_sales_details_sales1_idx` (`sale_id`);

--
-- Indices de la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indices de la tabla `varieties`
--
ALTER TABLE `varieties`
  ADD PRIMARY KEY (`variety_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `sale_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `varieties`
--
ALTER TABLE `varieties`
  MODIFY `variety_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_sales_customers1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `fk_sales_details_sales1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`sale_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_sizes` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`size_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_varieties1` FOREIGN KEY (`variety_id`) REFERENCES `varieties` (`variety_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
