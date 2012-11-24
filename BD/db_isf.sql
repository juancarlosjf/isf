-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-11-2012 a las 18:51:49
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_isf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Infantil'),
(2, 'Negocios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE IF NOT EXISTS `colaboradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_has_proyectos_usuarios1` (`usuario_id`),
  KEY `fk_usuarios_has_proyectos_proyectos1` (`proyecto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `proyecto_id`, `usuario_id`, `fecha`) VALUES
(1, 2, 2, '2012-11-24 11:27:03'),
(2, 2, 2, '2012-11-24 11:46:36'),
(3, 2, 2, '2012-11-24 11:46:36'),
(4, 2, 2, '2012-11-24 11:50:02'),
(5, 2, 2, '2012-11-24 11:50:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text,
  `fecha` datetime DEFAULT NULL,
  `publicacione_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `proyecto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comentarios_publicaciones1` (`publicacione_id`),
  KEY `fk_comentarios_usuarios1` (`usuario_id`),
  KEY `fk_comentarios_proyectos1` (`proyecto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `fecha`, `publicacione_id`, `usuario_id`, `proyecto_id`) VALUES
(1, 'este es un nuevo comentario!! =D', '2012-11-24 10:11:18', NULL, 2, 2),
(2, 'aqui otro nuevo comentario!! XD', '2012-11-24 11:06:47', NULL, 2, 2),
(3, 'este es un nuevo comentario!! =D ', '2012-11-24 11:07:09', NULL, 2, 2),
(4, 'Otro comentario! xD\r\n', '2012-11-24 11:09:10', NULL, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `asunto` text,
  `fecha` datetime DEFAULT NULL,
  `emisor_id` int(11) NOT NULL,
  `destinatario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_has_usuarios_usuarios1` (`emisor_id`),
  KEY `fk_usuarios_has_usuarios_usuarios2` (`destinatario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pais` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `nombre_pais`) VALUES
(1, 'PERU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `descripcion` text,
  `fecha` datetime DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `pagina_web` text,
  `url_video` varchar(120) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyectos_usuarios1` (`usuario_id`),
  KEY `fk_proyectos_categorias1` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `titulo`, `descripcion`, `fecha`, `imagen`, `pagina_web`, `url_video`, `usuario_id`, `categoria_id`) VALUES
(1, 'Nuevo Proyecto', 'Este es un nuevo proyecto! ', '2012-11-23 13:09:56', NULL, 'www.negocios.com.pe', NULL, 2, 2),
(2, 'Nuevo Proyecto 02', 'Este es otro proyecto', '2012-11-23 19:59:06', NULL, '', NULL, 2, 2),
(3, 'Este es otro', 'dfd', '2012-11-23 20:46:35', NULL, '', NULL, 2, 1),
(5, 'Nuevo Proyecto 04', 'dfdfd', '2012-11-24 05:47:22', NULL, '', NULL, 2, 2),
(6, 'Nuevo Proyecto 05', 'dfdfd', '2012-11-24 05:47:44', NULL, '', NULL, 2, 2),
(7, 'Nuevo Proyecto 06', 'ffdfdfd', '2012-11-24 05:48:13', NULL, '', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(120) DEFAULT NULL,
  `descripcion` text,
  `fecha` datetime DEFAULT NULL,
  `url_video` varchar(120) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publicaciones_categorias1` (`categoria_id`),
  KEY `fk_publicaciones_usuarios1` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titulo`, `descripcion`, `fecha`, `url_video`, `categoria_id`, `usuario_id`) VALUES
(1, 'Primera publicacion', 'Mi primera publicacion', '2012-11-23 18:23:57', NULL, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE IF NOT EXISTS `tipousuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`id`, `tipo_usuario`) VALUES
(1, 'Administradores'),
(2, 'Editores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_nombre` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `twitter` varchar(80) DEFAULT NULL,
  `facebook` varchar(80) DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `imagen` varchar(120) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `paise_id` int(11) DEFAULT NULL,
  `tipousuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_online_paises1` (`paise_id`),
  KEY `fk_usuarios_tipousuarios1` (`tipousuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `full_nombre`, `email`, `twitter`, `facebook`, `usuario`, `password`, `imagen`, `fecha_registro`, `paise_id`, `tipousuario_id`) VALUES
(2, 'Mery Milagros Paco', 'admin@hotmail.com', '@mirakel', 'mirakel@facebook', 'mirakel', '10ead43cffcbb4d3d00674417deb67e1c2f8ac49', NULL, '2012-11-20 14:33:34', 1, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `fk_usuarios_has_proyectos_proyectos1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_proyectos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_proyectos1` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_publicaciones1` FOREIGN KEY (`publicacione_id`) REFERENCES `publicaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarios_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `fk_usuarios_has_usuarios_usuarios1` FOREIGN KEY (`emisor_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_usuarios_usuarios2` FOREIGN KEY (`destinatario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_proyectos_categorias1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proyectos_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `fk_publicaciones_categorias1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicaciones_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_online_paises1` FOREIGN KEY (`paise_id`) REFERENCES `paises` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_tipousuarios1` FOREIGN KEY (`tipousuario_id`) REFERENCES `tipousuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
