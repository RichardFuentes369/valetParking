-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para valetparking
CREATE DATABASE IF NOT EXISTS `valetparking` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `valetparking`;

-- Volcando estructura para tabla valetparking.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `td` enum('cc','ti','ce') NOT NULL DEFAULT 'cc',
  `dni` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fijo` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `asociado` enum('1','2','3') DEFAULT '1' COMMENT '1 No es cliente, 2 Es cliente, 3 Es empleado',
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla valetparking.clientes: ~6 rows (aproximadamente)
DELETE FROM `clientes`;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `td`, `dni`, `fecha_nacimiento`, `fijo`, `celular`, `asociado`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (1, 'No registrado', 'No registrado', 'cc', '0001', '2020-02-11', '******', '******', '1', 'javierbaron6@gmail.com', '2020-02-11 17:38:27', NULL, NULL),
  (2, 'Gregorio', 'Pernia', 'cc', '23265589', '1957-02-12', '212', '1212', '1', 'javierbaron6@gmail.com', '2020-02-10 02:32:25', '2020-02-10 02:32:25', NULL),
  (3, 'jorge', 'baron', 'cc', '91216614', '1960-07-15', '6390751', '******', '2', 'javierbaron6@gmail.com', '2020-02-10 02:31:26', '2020-02-10 02:31:26', NULL),
  (4, 'Bettsy', 'Fuentes', 'cc', '63284586', '2020-02-12', '212', '1212', '2', 'javierbaron6@gmail.com', '2020-02-10 02:32:25', '2020-02-10 02:32:25', NULL),
  (5, 'Sergio', 'Rodriguez', 'cc', '23548896', '1960-07-15', '6390751', '******', '3', 'javierbaron6@gmail.com', '2020-02-10 02:31:26', '2020-02-10 02:31:26', NULL),
  (6, 'Jaime', 'Garzon', 'cc', '25879656', '1957-02-12', '212', '1212', '3', 'javierbaron6@gmail.com', '2020-02-10 02:32:25', '2020-02-10 02:32:25', NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla valetparking.descuento
CREATE TABLE IF NOT EXISTS `descuento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `porcentaje` double NOT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla valetparking.descuento: ~4 rows (aproximadamente)
DELETE FROM `descuento`;
/*!40000 ALTER TABLE `descuento` DISABLE KEYS */;
INSERT INTO `descuento` (`id`, `nombre`, `descripcion`, `porcentaje`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (1, 'Sin descuento', 'Sin descuento', 0, 'javierbaron6@gmail.com', '2020-02-04 18:09:49', '2020-03-04 01:35:25', NULL),
  (2, 'Aniversario parqueadero', 'Cada año se celebra', 5, 'javierbaron6@gmail.com', '2020-02-04 18:22:44', '2020-02-05 20:24:33', NULL),
  (3, 'Bono de descuentos', 'esto es por una buena causa', 20, 'javierbaron6@gmail.com', '2020-02-04 18:23:58', '2020-02-05 00:14:47', NULL),
  (4, 'Cumpleaños del Cliente', 'Cumpleaños del cliente', 10, 'javierbaron6@gmail.com', '2020-02-08 19:46:16', NULL, NULL);
/*!40000 ALTER TABLE `descuento` ENABLE KEYS */;


-- Volcando estructura para tabla valetparking.impuesto_valor_agregado
CREATE TABLE IF NOT EXISTS `impuesto_valor_agregado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anho` varchar(50) NOT NULL,
  `porcentaje` double NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla valetparking.impuesto_valor_agregado: ~2 rows (aproximadamente)
DELETE FROM `impuesto_valor_agregado`;
/*!40000 ALTER TABLE `impuesto_valor_agregado` DISABLE KEYS */;
INSERT INTO `impuesto_valor_agregado` (`id`, `anho`, `porcentaje`, `descripcion`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (1, '2019', 19, 'este es el iva para el 2019', 'javierbaron6@gmail.com', '2020-02-12 18:08:46', '2020-02-16 22:22:10', NULL),
  (2, '2020', 19, 'este es el iva para el 2020', 'javierbaron6@gmail.com', '2020-02-12 21:28:01', '2020-02-15 01:44:12', NULL);
/*!40000 ALTER TABLE `impuesto_valor_agregado` ENABLE KEYS */;

-- Volcando estructura para tabla valetparking.precios
CREATE TABLE IF NOT EXISTS `precios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `segundo_moto` double DEFAULT NULL,
  `minuto_moto` double DEFAULT NULL,
  `hora_moto` double DEFAULT NULL,
  `dia_moto` double DEFAULT NULL,
  `mes_moto` double DEFAULT NULL,
  `ano_moto` double DEFAULT NULL,
  `segundo_carro` double DEFAULT NULL,
  `minuto_carro` double DEFAULT NULL,
  `hora_carro` double DEFAULT NULL,
  `dia_carro` double DEFAULT NULL,
  `mes_carro` double DEFAULT NULL,
  `ano_carro` double DEFAULT NULL,
  `created_by` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla valetparking.precios: ~1 rows (aproximadamente)
DELETE FROM `precios`;
/*!40000 ALTER TABLE `precios` DISABLE KEYS */;
INSERT INTO `precios` (`id`, `segundo_moto`, `minuto_moto`, `hora_moto`, `dia_moto`, `mes_moto`, `ano_moto`, `segundo_carro`, `minuto_carro`, `hora_carro`, `dia_carro`, `mes_carro`, `ano_carro`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (1, 1, 17, 1000, 1000, 30000, 360000, 2, 34, 2000, 2000, 60000, 720000, 'javierbaron6@gmail.com', '2020-02-28 01:32:09', '2020-02-28 19:43:49', NULL);
/*!40000 ALTER TABLE `precios` ENABLE KEYS */;

-- Volcando estructura para tabla valetparking.facturas
CREATE TABLE IF NOT EXISTS `facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1 para activo, 0 para inactivo',
  `id_cliente` int(11) NOT NULL DEFAULT '0',
  `id_descuento` int(11) DEFAULT '0',
  `placa` varchar(50) NOT NULL DEFAULT '0',
  `tipo_vehiculo` enum('1','0') DEFAULT NULL COMMENT '1 para moto 0 para carro',
  `id_precio` int(11) NOT NULL DEFAULT '0',
  `id_iva` int(11) NOT NULL DEFAULT '0',
  `total` double DEFAULT '0',
  `created_by` varchar(50) NOT NULL DEFAULT '0',
  `updated_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_facturas_clientes` (`id_cliente`),
  KEY `FK_facturas_descuento` (`id_descuento`),
  KEY `FK_facturas_inpuesto_valor_agregado` (`id_iva`),
  KEY `FK_facturas_precios` (`id_precio`),
  CONSTRAINT `FK_facturas_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_facturas_descuento` FOREIGN KEY (`id_descuento`) REFERENCES `descuento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_facturas_inpuesto_valor_agregado` FOREIGN KEY (`id_iva`) REFERENCES `impuesto_valor_agregado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_facturas_precios` FOREIGN KEY (`id_precio`) REFERENCES `precios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla valetparking.facturas: ~18 rows (aproximadamente)
DELETE FROM `facturas`;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` (`id`, `estado`, `id_cliente`, `id_descuento`, `placa`, `tipo_vehiculo`, `id_precio`, `id_iva`, `total`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (4, '0', 2, 1, 'lop12a', '1', 1, 2, 29114.54, 'jorgebaron85@gmail.com', 'juanfaustino@outlook.com', '2020-03-05 16:43:00', '2020-03-06 17:09:25', NULL),
  (5, '0', 3, NULL, 'loj26', '1', 1, 2, 0, 'jorgebaron85@gmail.com', 'juanfaustino@outlook.com', '2020-03-05 19:44:46', '2020-03-06 17:09:28', NULL),
  (6, '0', 2, 1, 'lop12a', '1', 1, 2, 29121.68, 'jorgebaron85@gmail.com', 'juanfaustino@outlook.com', '2020-03-05 16:43:00', '2020-03-06 17:09:31', NULL),
  (7, '0', 2, 1, 'lop12a', '1', 1, 2, 29124.06, 'jorgebaron85@gmail.com', 'juanfaustino@outlook.com', '2020-03-05 16:43:00', '2020-03-06 17:09:33', NULL),
  (8, '0', 2, 1, 'lop12a', '1', 1, 2, 29127.63, 'jorgebaron85@gmail.com', 'juanfaustino@outlook.com', '2020-03-05 16:43:00', '2020-03-06 17:09:36', NULL),
  (9, '0', 2, 1, 'lop12a', '1', 1, 2, 29130.01, 'jorgebaron85@gmail.com', 'juanfaustino@outlook.com', '2020-03-05 16:43:00', '2020-03-06 17:09:38', NULL),
  (10, '0', 2, 1, 'lop12a', '1', 1, 2, 29137.15, 'jorgebaron85@gmail.com', 'juanfaustino@outlook.com', '2020-03-05 16:43:00', '2020-03-06 17:09:44', NULL),
  (11, '0', 2, 1, 'lop12a', '1', 1, 2, 29140.72, 'jorgebaron85@gmail.com', 'juanfaustino@outlook.com', '2020-03-05 16:43:00', '2020-03-06 17:09:47', NULL),
  (12, '0', 2, 1, 'lop12a', '1', 1, 2, 29146.67, 'jorgebaron85@gmail.com', 'juanfaustino@outlook.com', '2020-03-05 16:43:00', '2020-03-06 17:09:52', NULL),
  (13, '0', 2, 1, 'lop12a', '1', 1, 2, 29152.62, 'jorgebaron85@gmail.com', 'jorgebaron85@gmail.com', '2020-03-05 16:43:00', '2020-03-06 17:09:57', NULL),
  (21, '0', 2, 1, 'lop12a', '1', 1, 2, 29140.72, 'jorgebaron85@gmail.com', 'jorgebaron85@gmail.com', '2020-03-05 16:43:00', '2020-03-06 17:09:47', NULL),
  (22, '0', 2, 1, 'lop12a', '1', 1, 2, 29140.72, 'jorgebaron85@gmail.com', 'jorgebaron85@gmail.com', '2020-03-05 16:43:00', '2020-03-06 17:09:47', NULL),
  (23, '0', 2, 1, 'lop12a', '1', 1, 2, 29140.72, 'jorgebaron85@gmail.com', 'jorgebaron85@gmail.com', '2020-03-05 16:43:00', '2020-03-06 17:09:47', NULL),
  (24, '0', 2, 1, 'lop12a', '1', 1, 2, 29140.72, 'jorgebaron85@gmail.com', 'jorgebaron85@gmail.com', '2020-03-05 16:43:00', '2020-03-06 17:09:47', NULL),
  (25, '0', 2, 1, 'lop12a', '1', 1, 2, 29140.72, 'jorgebaron85@gmail.com', 'jorgebaron85@gmail.com', '2020-03-05 16:43:00', '2020-03-06 17:09:47', NULL),
  (26, '0', 2, 1, 'lop12a', '1', 1, 2, 29140.72, 'jorgebaron85@gmail.com', 'jorgebaron85@gmail.com', '2020-03-05 16:43:00', '2020-03-06 17:09:47', NULL),
  (27, '0', 2, 1, 'lop12a', '1', 1, 2, 29140.72, 'jorgebaron85@gmail.com', 'jorgebaron85@gmail.com', '2020-03-05 16:43:00', '2020-03-06 17:09:47', NULL),
  (28, '0', 2, 1, 'lop12a', '1', 1, 2, 29140.72, 'jorgebaron85@gmail.com', 'pedro.capo@gmail.com', '2020-03-05 16:43:00', '2020-03-06 17:09:47', NULL);
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;

-- Volcando estructura para tabla valetparking.informacion_empresa
CREATE TABLE IF NOT EXISTS `informacion_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mision` varchar(255) DEFAULT NULL,
  `vision` varchar(255) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `ubicacion_gps` varchar(500) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla valetparking.informacion_empresa: ~1 rows (aproximadamente)
DELETE FROM `informacion_empresa`;
/*!40000 ALTER TABLE `informacion_empresa` DISABLE KEYS */;
INSERT INTO `informacion_empresa` (`id`, `mision`, `vision`, `direccion`, `barrio`, `ciudad`, `pais`, `telefono`, `ubicacion_gps`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (1, 'Ahora la mision de la empresa cambiara', 'Ahora la vision de la empresa cambiara', 'calle 6 # 12-72', 'villabel', 'bucaramanga', 'colombia', '6390751', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.3942777001575!2d-73.10383195314192!3d7.080205946973073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e683f9d84661d41%3A0x991c3ee52067c84!2sCAI%20Villabel!5e0!3m2!1sen!2sco!4v1580947475354!5m2!1sen!2sco', 'richard', '2020-01-04 17:02:28', '2020-02-08 20:30:49', NULL);
/*!40000 ALTER TABLE `informacion_empresa` ENABLE KEYS */;

-- Volcando estructura para tabla valetparking.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `deleted_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla valetparking.roles: ~2 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `deleted_by`) VALUES
  (1, 'Super Administrador', 'Control total del sistema', '2020-01-04 16:57:47', '2020-03-04 01:32:35', NULL, NULL, NULL),
  (2, 'Empleados', 'Empleado del lugar', '2020-01-12 14:51:43', '2020-03-04 01:29:47', NULL, NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla valetparking.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `td` enum('cc','ti','ce') NOT NULL DEFAULT 'cc',
  `dni` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono_fijo` varchar(50) DEFAULT NULL,
  `telefono_celular` varchar(50) DEFAULT NULL,
  `inicio_contrato` date DEFAULT NULL,
  `fin_contrato` date DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuarios_roles` (`id_rol`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla valetparking.usuarios: ~4 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `td`, `dni`, `email`, `password`, `fecha_nacimiento`, `telefono_fijo`, `telefono_celular`, `inicio_contrato`, `fin_contrato`, `id_rol`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (1, 'Javier Ricardo', 'Baron Fuentes', 'cc', '1098785729', 'javierbaron6@gmail.com', '$2y$10$RFfz321h.SqaoGUqyC0eceMZIoMQX1oGLGdpt1Ny34ntkp3OjUGXC', '1996-06-01', '6390753', '3504284093', '2020-01-04', '2020-01-04', 1, '2020-01-04 16:55:02', '2020-03-06 16:54:20', NULL),
  (2, 'Jorge Enrique', 'Baron Fuentes', 'cc', '1098603545', 'jorgebaron85@gmail.com', '$2y$10$RFfz321h.SqaoGUqyC0eceMZIoMQX1oGLGdpt1Ny34ntkp3OjUGXC', '1985-09-25', '6390751', '3224059632', '2020-01-04', '2020-01-04', 2, '2020-01-04 16:55:02', '2020-03-06 16:53:12', NULL),
  (19, 'Pedro', 'Capo', 'cc', '10986325478', 'pedro.capo@gmail.com', '$2y$10$RFfz321h.SqaoGUqyC0eceMZIoMQX1oGLGdpt1Ny34ntkp3OjUGXC', '1996-06-01', '6390751', '3504284093', '2020-01-04', '2020-01-04', 2, '2020-01-04 16:55:02', '2020-01-12 14:52:19', NULL),
  (20, 'Juan', 'Faustino', 'cc', '1025635874', 'juanfaustino@outlook.com', '$2y$10$RFfz321h.SqaoGUqyC0eceMZIoMQX1oGLGdpt1Ny34ntkp3OjUGXC', '1996-06-01', '6390751', '3504284093', '2020-01-04', '2020-01-04', 2, '2020-01-04 16:55:02', '2020-01-12 14:52:19', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
