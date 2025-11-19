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
ALTER TABLE `destinos` MODIFY `id` INT(10) NOT NULL AUTO_INCREMENT;
ALTER TABLE `destinos` ADD PRIMARY KEY (`id`);


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'Kevin1', 'delgadokev13@gmail.com', '$2y$10$qkD7nk89XnYY9N12phvQxOFtUZQte6Cnjq328Zj0K8zrnOIcCLx2q', 'usuario'),
(2, 'KevinAdmin', 'kevin.delgado1@utp.ac.pa', '$2y$10$e6n.8kjJt4g/u31XJUCqO.ng.Ygq4hR0H4KxDWrJ8LaWMOkN3Ed9S', 'admin');

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

=======
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

--Alteracione de la tabal Destinos para administracion--
ALTER TABLE `destinos` ADD `detalles` TEXT DEFAULT NULL;
ALTER TABLE `destinos` MODIFY `id` INT(10) NOT NULL AUTO_INCREMENT;
ALTER TABLE `destinos` ADD PRIMARY KEY (`id`);

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `usertype` varchar(50) NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(1, 'Kevin1', 'delgadokev13@gmail.com', '$2y$10$qkD7nk89XnYY9N12phvQxOFtUZQte6Cnjq328Zj0K8zrnOIcCLx2q', 'usuario'),
(2, 'KevinAdmin', 'kevin.delgado1@utp.ac.pa', '$2y$10$e6n.8kjJt4g/u31XJUCqO.ng.Ygq4hR0H4KxDWrJ8LaWMOkN3Ed9S', 'admin');

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

