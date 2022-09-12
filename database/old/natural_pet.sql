-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-11-2021 a las 06:08:23
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
  `descripcion` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IDCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IDCategoria`, `categoria`, `descripcion`) VALUES
(00001, 'Juguetes', 'En Natural Pet consentimos a tus mascotas con nuestra variedad de juguetes artesanales para perros y gatos.'),
(00002, 'Aseo', 'En Natural Pet nos encargamos de cuidar el pelaje de tus mascotas.'),
(00003, 'Accesorios', 'En Natural Pet tus mascotas estarán siempre a la moda. Los accesorios son amigables con el medio ambiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `IDCliente` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`IDCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCliente`, `usuario`, `email`, `password`) VALUES
(00001, 'Raghnall', 'ronaldguev@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

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
  PRIMARY KEY (`IDProducto`),
  KEY `IDCategoria` (`IDCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IDProducto`, `IDCategoria`, `producto`, `descripcion`, `precio`, `imagen`) VALUES
(00001, 00001, 'Cama de tela', 'Tus mascotas merecen descansar como reyes. Consiéntelos con esta amplia y cómoda cama.', 10.00, 'Imagen10.png'),
(00002, 00001, 'Pingüino de tela', 'Este divertido juguete de pingüino le garantizará a tu mascota muchas horas de diversión.', 3.00, '3,1.png'),
(00003, 00001, 'Bola de tela', 'Este juguete es perfecto para que puedas entrenar a tu mascota y que puedan pasar un momento agradable juntos.', 3.00, '1,1.png'),
(00004, 00002, 'Hueso de jabón', 'Es un producto artesanal y natural para el cuidado de tu mascota.', 2.00, 'Imagen1.png'),
(00005, 00002, 'Jabón de huellas', 'Es un producto natural, hecho a base de carbón activado.', 2.00, 'Imagen4.png'),
(00006, 00002, 'Champú para perro', 'Hecho a base de Aloe Vera, contenido neto de 550ml, protege el pelo y la piel de los animales.', 5.00, 'Imagen7.png'),
(00007, 00003, 'Moños de tela', 'Viste a la moda a tus perros y gatos con estos espectaculares accesorios de tela.', 1.50, '1prro.png'),
(00008, 00003, 'Pañoletas caninas', 'Tu perro será el más elegante y atrevido del vecindario con estas  asombrosas pañoletas.', 3.00, 'buf1.png'),
(00009, 00003, 'Moños para gatos', 'Tu gato merece tener un estilo único, este producto es perfecto.', 3.00, 'rop1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `IDVenta` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `IDCliente` int(10) UNSIGNED ZEROFILL NOT NULL,
  `IDProducto` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fechahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDVenta`),
  KEY `IDCliente` (`IDCliente`),
  KEY `IDProducto` (`IDProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
