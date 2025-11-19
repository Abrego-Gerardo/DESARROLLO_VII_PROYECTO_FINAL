CREATE DATABASE agencia_db;
USE agencia_db;

CREATE TABLE `destinos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_destino` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `precio_nino` varchar(50) DEFAULT NULL,
  `precio_adulto` varchar(50) DEFAULT NULL,
  `precio_mayor` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `tipo_viaje` enum('aire', 'mar', 'tierra') NOT NULL,  -- Nuevo campo para el tipo de viaje
  `fecha_salida` DATE DEFAULT NULL,  -- Nuevo campo para la fecha de salida
  `fecha_retorno` DATE DEFAULT NULL, -- Nuevo campo para la fecha de retorno
  `detalles` TEXT NOT NULL,  -- Campo de detalles
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcado de datos para la tabla `destinos` con los nuevos campos
INSERT INTO `destinos` (`id`, `tipo_destino`, `pais`, `city`, `precio_nino`, `precio_adulto`, `precio_mayor`, `foto`, `tipo_viaje`, `fecha_salida`, `fecha_retorno`, `detalles`) VALUES
(1, 'Nacional', 'Panamá', 'Ciudad de Panamá', '120', '240', '200', 'fotos/Dest Nacionales/1nac.jpg', 'aire', '2024-12-01', '2024-12-10', 'Destinos nacionales, excelente para turismo cultural y playas'),
(2, 'Nacional', 'Panamá', 'Islas de San Blas', '130', '260', '220', 'fotos/Dest Nacionales/2nac.jpg', 'mar', '2024-12-15', '2024-12-20', 'Islas paradisíacas, perfecto para descansar y disfrutar del mar'),
(3, 'Nacional', 'Panamá', 'Colón', '110', '220', '180', 'fotos/Dest Nacionales/3nac.jpg', 'tierra', '2024-12-05', '2024-12-12', 'Ideal para explorar el patrimonio histórico y natural'),
(4, 'Nacional', 'Panamá', 'Bocas del Toro', '100', '200', '170', 'fotos/Dest Nacionales/4nac.jpg', 'mar', '2024-12-10', '2024-12-15', 'Perfecto para buceo y actividades acuáticas'),
(5, 'Nacional', 'Panamá', 'Volcán Barú', '40', '80', '70', 'fotos/Dest Nacionales/5nac.jpg', 'tierra', '2024-12-20', '2024-12-25', 'Aventura en las alturas con vistas increíbles'),
(6, 'Nacional', 'Panamá', 'Portobelo', '20', '40', '35', 'fotos/Dest Nacionales/6nac.jpg', 'mar', '2024-12-18', '2024-12-22', 'Histórico, ideal para los amantes del turismo cultural'),
(7, 'Nacional', 'Panamá', 'Chitre', '125', '250', '210', 'fotos/Dest Nacionales/7nac.jpg', 'tierra', '2024-12-12', '2024-12-17', 'Destinos rurales, cultura local y naturaleza'),
(8, 'Nacional', 'Panamá', 'Chiriquí', '135', '270', '230', 'fotos/Dest Nacionales/8nac.jpg', 'tierra', '2024-12-22', '2024-12-28', 'Conocida por sus montañas y cafetales'),
(9, 'Internacional', 'España', 'Madrid', '400', '800', '650', 'fotos/Dest Internacionales/1int.jpg', 'aire', '2024-11-30', '2024-12-07', 'Gran ciudad cultural, museos y gastronomía'),
(10, 'Internacional', 'Francia', 'Paris', '450', '850', '700', 'fotos/Dest Internacionales/2int.jpg', 'aire', '2024-11-25', '2024-12-05', 'Destino romántico y cultural por excelencia'),
(11, 'Internacional', 'Turquía', 'Estambul', '500', '900', '750', 'fotos/Dest Internacionales/3int.jpg', 'aire', '2024-12-01', '2024-12-10', 'Fascinante mezcla de culturas entre Oriente y Occidente'),
(12, 'Internacional', 'Reino Unido', 'Londres', '480', '850', '800', 'fotos/Dest Internacionales/4int.jpg', 'aire', '2024-12-05', '2024-12-12', 'Cultura, historia y arquitectura de renombre mundial'),
(13, 'Internacional', 'Brasil', 'Rio de Janeiro', '300', '600', '500', 'fotos/Dest Internacionales/5int.jpg', 'mar', '2024-12-08', '2024-12-15', 'Sol, playa y carnaval en el corazón de Brasil'),
(14, 'Internacional', 'México', 'Ciudad de México', '350', '700', '600', 'fotos/Dest Internacionales/6int.jpg', 'tierra', '2024-12-12', '2024-12-18', 'Una de las ciudades más vibrantes de América Latina'),
(15, 'Internacional', 'Estados Unidos', 'New York', '500', '950', '900', 'fotos/Dest Internacionales/7int.jpg', 'aire', '2024-12-10', '2024-12-17', 'La ciudad que nunca duerme, arte y entretenimiento sin fin'),
(16, 'Internacional', 'Argentina', 'Buenos Aires', '320', '640', '550', 'fotos/Dest Internacionales/8int.jpg', 'tierra', '2024-12-15', '2024-12-22', 'Destino vibrante con una gran oferta cultural y gastronómica');
