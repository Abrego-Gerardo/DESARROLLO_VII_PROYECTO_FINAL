CREATE DATABASE agencia_db;
USE agencia_db;
CREATE TABLE `destinos` (
  `id` int(10) NOT NULL,
  `tipo_destino` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `precio_nino` varchar(50) DEFAULT NULL,
  `precio_adulto` varchar(50) DEFAULT NULL,
  `precio_mayor` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id`, `tipo_destino`, `pais`, `city`, `precio_nino`, `precio_adulto`, `precio_mayor`, `foto`) VALUES
(1, 'Nacional', 'Panamá', 'Ciudad de Panamá', '120', '240', '200', 'fotos/Dest Nacionales/1nac.jpg'),
(2, 'Nacional', 'Panamá', 'Islas de San Blas', '130', '260', '220', 'fotos/Dest Nacionales/2nac.jpg'),
(3, 'Nacional', 'Panamá', 'Colón', '110', '220', '180', 'fotos/Dest Nacionales/3nac.jpg'),
(4, 'Nacional', 'Panamá', 'Bocas del Toro', '100', '200', '170', 'fotos/Dest Nacionales/4nac.jpg'),
(5, 'Nacional', 'Panamá', 'Volcán Barú', '40', '80', '70', 'fotos/Dest Nacionales/5nac.jpg'),
(6, 'Nacional', 'Panamá', 'Portobelo', '20', '40', '35', 'fotos/Dest Nacionales/6nac.jpg'),
(7, 'Nacional', 'Panamá', 'Chitre', '125', '250', '210', 'fotos/Dest Nacionales/7nac.jpg'),
(8, 'Nacional', 'Panamá', 'Chiriquí', '135', '270', '230', 'fotos/Dest Nacionales/8nac.jpg'),
(9, 'Internacional', 'España', 'Madrid', '400', '800', '650', 'fotos/Dest Internacionales/1int.jpg'),
(10, 'Internacional', 'Francia', 'Paris', '450', '850', '700', 'fotos/Dest Internacionales/2int.jpg'),
(11, 'Internacional', 'Turquía', 'Estambul', '500', '900', '750', 'fotos/Dest Internacionales/3int.jpg'),
(12, 'Internacional', 'Reino Unido', 'Londres', '480', '850', '800', 'fotos/Dest Internacionales/4int.jpg'),
(13, 'Internacional', 'Brasil', 'Rio de Janeiro', '300', '600', '500', 'fotos/Dest Internacionales/5int.jpg'),
(14, 'Internacional', 'México', 'Ciudad de México', '350', '700', '600', 'fotos/Dest Internacionales/6int.jpg'),
(15, 'Internacional', 'Estados Unidos', 'New York', '500', '950', '900', 'fotos/Dest Internacionales/7int.jpg'),
(16, 'Internacional', 'Argentina', 'Buenos Aires', '320', '640', '550', 'fotos/Dest Internacionales/8int.jpg');

ALTER TABLE `destinos` ADD `detalles` TEXT DEFAULT NULL;
