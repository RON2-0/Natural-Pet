-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-11-2021 a las 18:26:41
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `natural_pet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `IDCategoria` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `categoria` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `stock` int NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IDCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IDCategoria`, `categoria`, `banner`, `descripcion`, `stock`, `href`) VALUES
(00001, 'Juguetes', 'juguetes.svg', 'En Natural Pet consentimos a tus mascotas con nuestros juguetes artesanales para perros y gatos.', 3, 'cate1.php'),
(00002, 'Aseo', 'aseo.svg', 'En Natural Pet nos encargamos de cuidar el pelaje de tus mascotas.', 3, 'cate2.php'),
(00003, 'Accesorios', 'accesorios.svg', 'En Natural Pet tus mascotas estarán siempre a la moda. Los accesorios son amigables con el medio ambiente', 3, 'cate3.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `IDCliente` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `DUI` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IDCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCliente`, `usuario`, `email`, `DUI`, `password`) VALUES
(00001, 'Raghnall', 'ronaldguev@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00003, 'Raghnall', 'prueba3@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00004, 'Raghnall', 'prueba322@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00005, 'prueba1', 'prueba23@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00006, 'prueba1', 'sda#@d', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00007, 'Raghnall', 'wiviwej746@xenzld.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00008, 'Raghnall', 'wiviwej56@xenzld.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00009, 'Raghnall', 'wiviwej5622@xenzld.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00010, 'Raghnall', 'wiviwej562442@xenzld.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00011, 'Raghnall', 'wiviwej746@xenzldhola.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00012, 'prueba1', 'prueba2223@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00013, 'prueba1', 'prueba223@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00014, 'prueba1', 'prueba2663@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00015, 'prueba1', 'prueba26463@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00016, 'prueba1', 'hacktries@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00017, 'Raghnall', 'wiviwej7246@xenzld.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00018, 'prueba1', 'prueba332131@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00019, 'prueba1', 'prueb21a3@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00020, 'prueba1', 'aa@o', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00021, 'Raghnall', 'ronaldguevara999@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00023, 'prueba1', 'hacktries33@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(00024, 'Lady Gaga', 'lady@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `IDProducto` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `IDCategoria` int(5) UNSIGNED ZEROFILL NOT NULL,
  `producto` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `precio` double(10,2) NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IDProducto`),
  KEY `IDCategoria` (`IDCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IDProducto`, `IDCategoria`, `producto`, `descripcion`, `precio`, `imagen`, `href`) VALUES
(00001, 00001, 'Cama de tela', 'Tus mascotas merecen descansar como reyes. Consiéntelos con esta amplia y cómoda cama.', 10.00, 'Imagen10.png', 'producto1.php'),
(00002, 00001, 'Pingüino de tela', 'Este divertido juguete de pingüino le garantizará a tu mascota muchas horas de diversión.', 3.00, '3,1.png', 'producto2.php'),
(00003, 00001, 'Bola de tela', 'Este juguete es perfecto para que puedas entrenar a tu mascota y que puedan pasar un momento agradable juntos.', 3.00, '1,1.png', 'producto3.php'),
(00004, 00002, 'Hueso de jabón', 'Es un producto artesanal y natural para el cuidado de tu mascota.', 2.00, 'Imagen1.png', 'producto4.php'),
(00005, 00002, 'Jabón de huellas', 'Es un producto natural, hecho a base de carbón activado.', 2.00, 'Imagen4.png', 'producto5.php'),
(00006, 00002, 'Champú de perro', 'Hecho a base de Aloe Vera, contenido neto de 550ml, protege el pelo y la piel de los animales.', 5.00, 'Imagen7.png', 'producto6.php'),
(00007, 00003, 'Moños de tela', 'Viste a la moda a tus perros y gatos con estos espectaculares accesorios de tela.', 1.50, '1prro.png', 'producto7.php'),
(00008, 00003, 'Chal para perro', 'Tu perro será el más elegante y atrevido del vecindario con estas  asombrosas pañoletas.', 3.00, 'buf1.png', 'producto8.php'),
(00009, 00003, 'Moños para gatos', 'Tu gato merece tener un estilo único, este producto es perfecto.', 3.00, 'rop1.png', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `IDVenta` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `IDCliente` int(5) UNSIGNED ZEROFILL NOT NULL,
  `IDProducto` int(5) UNSIGNED ZEROFILL NOT NULL,
  `fechahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDVenta`),
  KEY `IDCliente` (`IDCliente`),
  KEY `IDProducto` (`IDProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IDVenta`, `IDCliente`, `IDProducto`, `fechahora`) VALUES
(00003, 00021, 00002, '2021-11-20 06:19:06'),
(00004, 00021, 00003, '2021-11-20 06:19:06'),
(00005, 00021, 00003, '2021-11-20 06:33:00'),
(00006, 00021, 00002, '2021-11-20 06:38:54'),
(00007, 00021, 00002, '2021-11-20 06:40:36'),
(00008, 00021, 00001, '2021-11-20 07:27:13'),
(00009, 00021, 00002, '2021-11-20 07:46:35'),
(00010, 00021, 00002, '2021-11-20 08:05:45'),
(00011, 00021, 00002, '2021-11-20 08:09:49'),
(00012, 00021, 00002, '2021-11-20 08:17:34'),
(00013, 00021, 00001, '2021-11-21 06:38:07'),
(00014, 00021, 00001, '2021-11-21 06:45:55'),
(00015, 00021, 00002, '2021-11-21 06:58:16'),
(00016, 00016, 00002, '2021-11-21 15:45:45'),
(00017, 00016, 00002, '2021-11-21 16:21:27'),
(00018, 00016, 00003, '2021-11-21 16:21:27'),
(00019, 00016, 00002, '2021-11-21 16:27:39'),
(00020, 00016, 00002, '2021-11-21 16:53:34'),
(00021, 00016, 00002, '2021-11-21 16:55:45'),
(00022, 00016, 00002, '2021-11-21 17:03:09'),
(00023, 00016, 00001, '2021-11-21 17:13:06'),
(00024, 00016, 00002, '2021-11-21 17:19:54'),
(00025, 00016, 00002, '2021-11-21 17:20:27'),
(00026, 00016, 00002, '2021-11-21 17:37:10'),
(00027, 00016, 00002, '2021-11-21 17:38:04'),
(00028, 00016, 00002, '2021-11-21 17:39:54'),
(00029, 00016, 00002, '2021-11-21 18:24:47'),
(00030, 00016, 00001, '2021-11-21 19:13:24'),
(00031, 00016, 00003, '2021-11-21 19:13:24'),
(00032, 00016, 00002, '2021-11-21 19:16:40'),
(00033, 00023, 00002, '2021-11-22 03:18:17'),
(00034, 00023, 00006, '2021-11-22 03:18:17'),
(00035, 00023, 00002, '2021-11-22 03:19:38'),
(00036, 00024, 00001, '2021-11-25 02:33:27'),
(00037, 00024, 00005, '2021-11-25 02:33:27');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`IDCategoria`) REFERENCES `categorias` (`IDCategoria`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `clientes` (`IDCliente`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `productos` (`IDProducto`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
