# Host: localhost  (Version 8.0.30)
# Date: 2023-03-16 13:51:50
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "productos"
#

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `referencia` int NOT NULL,
  `precio` int NOT NULL,
  `peso` int NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`referencia`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

#
# Data for table "productos"
#

INSERT INTO `productos` VALUES (23,'FISICA ELECTRICA',1,25000,1,'FISICA',2,'2023-03-16 07:16:01'),(24,'ARTES PLASTICAS',2,32000,1,'ARTES',10,'2023-03-16 07:16:59');

#
# Structure for table "ventas"
#

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `count` int NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

#
# Data for table "ventas"
#

INSERT INTO `ventas` VALUES (23,'FISICA ELECTRICA',2);
