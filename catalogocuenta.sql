-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2015 a las 18:39:26
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `catalogocuenta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogocuentas`
--

CREATE TABLE IF NOT EXISTS `catalogocuentas` (
`idcuentacontable` int(11) NOT NULL,
  `cuentacontable` varchar(45) NOT NULL,
  `idgruposcuentas` int(11) NOT NULL,
  `idtipocuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriascuentas`
--

CREATE TABLE IF NOT EXISTS `categoriascuentas` (
`idcategorias` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `idestructurabase` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categoriascuentas`
--

INSERT INTO `categoriascuentas` (`idcategorias`, `categoria`, `idestructurabase`, `estado`) VALUES
(1, 'Activo Circulante', 1, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `categorias_cuentas_view`
--
CREATE TABLE IF NOT EXISTS `categorias_cuentas_view` (
`idcategorias` int(11)
,`categoria` varchar(45)
,`nombre` varchar(45)
,`estado` tinyint(4)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructurabase`
--

CREATE TABLE IF NOT EXISTS `estructurabase` (
  `idestructurabase` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estructurabase`
--

INSERT INTO `estructurabase` (`idestructurabase`, `nombre`) VALUES
(1, 'Activos'),
(2, 'Pasivos'),
(3, 'Capital'),
(4, 'Ingresos'),
(5, 'Egresos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gruposcuentas`
--

CREATE TABLE IF NOT EXISTS `gruposcuentas` (
`idgruposcuentas` int(11) NOT NULL,
  `grupo` varchar(45) NOT NULL,
  `nivel` int(11) NOT NULL,
  `idTitulossuperior` int(11) NOT NULL,
  `idcategorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocuenta`
--

CREATE TABLE IF NOT EXISTS `tipocuenta` (
`idtipocuenta` int(11) NOT NULL,
  `tipocuenta` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipocuenta`
--

INSERT INTO `tipocuenta` (`idtipocuenta`, `tipocuenta`) VALUES
(1, 'Deudora'),
(2, 'Acreedora');

-- --------------------------------------------------------

--
-- Estructura para la vista `categorias_cuentas_view`
--
DROP TABLE IF EXISTS `categorias_cuentas_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categorias_cuentas_view` AS select `cc`.`idcategorias` AS `idcategorias`,`cc`.`categoria` AS `categoria`,`eb`.`nombre` AS `nombre`,`cc`.`estado` AS `estado` from (`categoriascuentas` `cc` left join `estructurabase` `eb` on((`cc`.`idestructurabase` = `eb`.`idestructurabase`)));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogocuentas`
--
ALTER TABLE `catalogocuentas`
 ADD PRIMARY KEY (`idcuentacontable`), ADD KEY `fk_cuentacontable_Titulos1_idx` (`idgruposcuentas`), ADD KEY `fk_catalogocuentas_tipocuenta1_idx` (`idtipocuenta`);

--
-- Indices de la tabla `categoriascuentas`
--
ALTER TABLE `categoriascuentas`
 ADD PRIMARY KEY (`idcategorias`), ADD KEY `fk_categorias_estructurabase1_idx` (`idestructurabase`);

--
-- Indices de la tabla `estructurabase`
--
ALTER TABLE `estructurabase`
 ADD PRIMARY KEY (`idestructurabase`);

--
-- Indices de la tabla `gruposcuentas`
--
ALTER TABLE `gruposcuentas`
 ADD PRIMARY KEY (`idgruposcuentas`), ADD KEY `fk_Titulos_Titulos1_idx` (`idTitulossuperior`), ADD KEY `fk_Titulos_categorias1_idx` (`idcategorias`);

--
-- Indices de la tabla `tipocuenta`
--
ALTER TABLE `tipocuenta`
 ADD PRIMARY KEY (`idtipocuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogocuentas`
--
ALTER TABLE `catalogocuentas`
MODIFY `idcuentacontable` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoriascuentas`
--
ALTER TABLE `categoriascuentas`
MODIFY `idcategorias` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `gruposcuentas`
--
ALTER TABLE `gruposcuentas`
MODIFY `idgruposcuentas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipocuenta`
--
ALTER TABLE `tipocuenta`
MODIFY `idtipocuenta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catalogocuentas`
--
ALTER TABLE `catalogocuentas`
ADD CONSTRAINT `fk_catalogocuentas_tipocuenta1` FOREIGN KEY (`idtipocuenta`) REFERENCES `tipocuenta` (`idtipocuenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cuentacontable_Titulos1` FOREIGN KEY (`idgruposcuentas`) REFERENCES `gruposcuentas` (`idgruposcuentas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categoriascuentas`
--
ALTER TABLE `categoriascuentas`
ADD CONSTRAINT `fk_categorias_estructurabase1` FOREIGN KEY (`idestructurabase`) REFERENCES `estructurabase` (`idestructurabase`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `gruposcuentas`
--
ALTER TABLE `gruposcuentas`
ADD CONSTRAINT `fk_Titulos_Titulos1` FOREIGN KEY (`idTitulossuperior`) REFERENCES `gruposcuentas` (`idgruposcuentas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Titulos_categorias1` FOREIGN KEY (`idcategorias`) REFERENCES `categoriascuentas` (`idcategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
