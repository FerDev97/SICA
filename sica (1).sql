-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2018 a las 19:05:50
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talumno`
--

CREATE TABLE `talumno` (
  `eid_alumno` int(11) NOT NULL,
  `ccodigo` varchar(6) NOT NULL,
  `cnie` varchar(15) NOT NULL,
  `cnombre` varchar(100) NOT NULL,
  `capellido` varchar(100) NOT NULL,
  `cdireccion` varchar(200) NOT NULL,
  `edepto` varchar(50) NOT NULL,
  `ffecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talumno_responsable`
--

CREATE TABLE `talumno_responsable` (
  `id_ar` int(11) NOT NULL,
  `efk_alumno` int(11) NOT NULL,
  `efk_responsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talum_mat_not`
--

CREATE TABLE `talum_mat_not` (
  `id_amn` int(11) NOT NULL,
  `efk_idalumno` int(11) NOT NULL,
  `efk_idmateria` int(11) NOT NULL,
  `efk_idnota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tanio`
--

CREATE TABLE `tanio` (
  `eid_anio` int(11) NOT NULL,
  `canio` int(11) NOT NULL,
  `iestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tanio`
--

INSERT INTO `tanio` (`eid_anio`, `canio`, `iestado`) VALUES
(1, 2018, 1),
(3, 2017, 0),
(4, 2016, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbachilleratos`
--

CREATE TABLE `tbachilleratos` (
  `eid_bachillerato` int(11) NOT NULL,
  `ccodigo` varchar(20) NOT NULL,
  `cnombe` varchar(30) NOT NULL,
  `cdescripcion` varchar(200) NOT NULL,
  `efk_tipo` int(11) NOT NULL,
  `eestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbachilleratos`
--

INSERT INTO `tbachilleratos` (`eid_bachillerato`, `ccodigo`, `cnombe`, `cdescripcion`, `efk_tipo`, `eestado`) VALUES
(1, '001', 'Contador', 'Bachillerato orientado a la contabilidad financier aplicada', 1, 1),
(3, 'BG89', 'Bachillerato General', 'Bachillerato orientado a las generalidadesbasicas que todo bachillere debe poseer', 2, 0),
(7, 'BS273', 'Bachillerato en Salud', 'Bachillerato orientado a la salud', 1, 1),
(8, 'BE-988', 'Bachillerato en Electricidad', 'Bachillerato con enfasisi en electrinica digital', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbitacora`
--

CREATE TABLE `tbitacora` (
  `eid_bitacora` int(11) NOT NULL,
  `efk_idusuario` int(11) NOT NULL,
  `dtfecha` datetime NOT NULL,
  `cdescripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcargos`
--

CREATE TABLE `tcargos` (
  `eid_cargo` int(11) NOT NULL,
  `ccargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tcargos`
--

INSERT INTO `tcargos` (`eid_cargo`, `ccargo`) VALUES
(1, 'Secretaria'),
(2, 'Director'),
(3, 'Docente'),
(4, 'Subdirectora'),
(5, 'Ordenanza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tdatos_adicionales`
--

CREATE TABLE `tdatos_adicionales` (
  `eid_datosadicionales` int(11) NOT NULL,
  `bfoto_alumno` mediumblob NOT NULL,
  `bfoto_partida` mediumblob NOT NULL,
  `bfoto_bautismo` mediumblob NOT NULL,
  `bfoto_comunion` mediumblob NOT NULL,
  `efk_ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tficha`
--

CREATE TABLE `tficha` (
  `eid_ficha` int(11) NOT NULL,
  `cdistancia` varchar(50) NOT NULL,
  `cmedio_trans` varchar(50) NOT NULL,
  `cenfermedades` varchar(200) NOT NULL,
  `ealergico` int(11) NOT NULL,
  `eparvularia` int(11) NOT NULL,
  `etrabajo` int(11) NOT NULL,
  `czona` varchar(50) NOT NULL,
  `erepite` int(11) NOT NULL,
  `efk_anio` int(11) NOT NULL,
  `efk_alumno` int(11) NOT NULL,
  `efk_opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tgrado`
--

CREATE TABLE `tgrado` (
  `eid_grado` int(11) NOT NULL,
  `cgrado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tgrado`
--

INSERT INTO `tgrado` (`eid_grado`, `cgrado`) VALUES
(1, 1),
(2, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thorarios`
--

CREATE TABLE `thorarios` (
  `eid_horario` int(11) NOT NULL,
  `cdia` varchar(20) NOT NULL,
  `chora` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `thorarios`
--

INSERT INTO `thorarios` (`eid_horario`, `cdia`, `chora`, `estado`) VALUES
(1, 'Lunes y Martes', '7:00 AM - 10:00 AM', 0),
(2, 'Martes y Miercoles', '10:00 AM - 12:00 PM', 1),
(3, 'Miercoles y Viernes', '03:00 PM - 05:00 PM', 1),
(4, 'Jueves y Jueves', '03:00 PM - 05:00 PM', 0),
(5, 'Martes y Miercoles', '01:00 PM - 03:00 PM', 1),
(6, 'Jueves y Viernes', '03:00 PM - 05:00 PM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmaterias`
--

CREATE TABLE `tmaterias` (
  `eid_materia` int(11) NOT NULL,
  `ccodigo` varchar(10) NOT NULL,
  `cnombre` varchar(30) NOT NULL,
  `cdescripcion` varchar(200) NOT NULL,
  `efk_idopcion` int(11) NOT NULL,
  `efk_idhorario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmaterias`
--

INSERT INTO `tmaterias` (`eid_materia`, `ccodigo`, `cnombre`, `cdescripcion`, `efk_idopcion`, `efk_idhorario`, `estado`) VALUES
(1, '001', 'Matematicas', 'Esta es una materia llena de numeros.', 1, 6, 1),
(8, '002', 'Lenguaje y Literatura', 'Esta es una materia sobre lectura.', 1, 2, 1),
(9, '009', 'Sociales', 'Historia de el salvador', 2, 1, 1),
(10, '010', 'Manejo Softwar', 'Aqui se usa word.', 2, 2, 1),
(11, '011', 'Turismo', 'fotografia', 1, 5, 1),
(12, '011', 'Ingles', 'segundo idioma', 2, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnotas`
--

CREATE TABLE `tnotas` (
  `eid_notas` int(11) NOT NULL,
  `dnota1` double NOT NULL,
  `dnota2` double NOT NULL,
  `dnota3` double NOT NULL,
  `drecuperacion` double NOT NULL,
  `dpromedio` double NOT NULL,
  `efk_idperiodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topciones`
--

CREATE TABLE `topciones` (
  `eid_opcion` int(11) NOT NULL,
  `ecupo_maximo` int(11) NOT NULL,
  `efk_bto` int(11) NOT NULL,
  `efk_grado` int(11) NOT NULL,
  `efk_seccion` int(11) NOT NULL,
  `eestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `topciones`
--

INSERT INTO `topciones` (`eid_opcion`, `ecupo_maximo`, `efk_bto`, `efk_grado`, `efk_seccion`, `eestado`) VALUES
(1, 100, 1, 1, 1, 1),
(2, 1, 3, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tperiodos`
--

CREATE TABLE `tperiodos` (
  `eid_periodo` int(11) NOT NULL,
  `enum` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpermisos`
--

CREATE TABLE `tpermisos` (
  `eid_permisos` int(11) NOT NULL,
  `ep_inscripciones` int(11) NOT NULL,
  `ep_estadisticas` int(11) NOT NULL,
  `efk_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpermisos`
--

INSERT INTO `tpermisos` (`eid_permisos`, `ep_inscripciones`, `ep_estadisticas`, `efk_idusuario`) VALUES
(1, 1, 1, 1),
(2, 0, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersonal`
--

CREATE TABLE `tpersonal` (
  `eid_personal` int(11) NOT NULL,
  `cdui` varchar(10) NOT NULL,
  `cnombre` varchar(50) NOT NULL,
  `capellido` varchar(50) NOT NULL,
  `ctelefono` varchar(10) NOT NULL,
  `ccorreo` varchar(200) NOT NULL,
  `cdireccion` varchar(200) NOT NULL,
  `ffechanacimiento` date NOT NULL,
  `iestado` int(11) NOT NULL,
  `isexo` int(11) NOT NULL,
  `efk_idcargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpersonal`
--

INSERT INTO `tpersonal` (`eid_personal`, `cdui`, `cnombre`, `capellido`, `ctelefono`, `ccorreo`, `cdireccion`, `ffechanacimiento`, `iestado`, `isexo`, `efk_idcargo`) VALUES
(1, '05547552-8', 'Fernando', 'Hernandez', '12345678', 'fernan@hotmil.com', 'San Vicente, Barrio El Santuario , casa 2', '2000-08-04', 1, 2, 1),
(4, '05547552-9', 'Alexander', 'Carcamo', '12345678', 'alexito@hotmail.com', 'San Cayetano , San Vicente , El Salvador', '2000-07-06', 1, 2, 3),
(7, '12344555-5', 'Josue Benjamin', 'Hernandez Alfaro', '12345678', 'alexito@gmail.com', 'San Rafael', '2018-09-14', 1, 2, 2),
(8, '05547552-7', 'Jessica Alexandra', 'Rosales RodrÃ­guez', '12614143', 'jess@hotmail.com', 'San Vicente,San eEsteban Catarina, BÂ° Concepcion, casa#2 ', '2000-09-04', 1, 1, 3),
(9, '12345678-9', 'Tatiana Isabel', 'Alvarado Melara', '12345678', 'tatiana@gmail.com', 'San Vicente , Barrio El Calvario , casa 2', '2000-09-05', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersonal_materia`
--

CREATE TABLE `tpersonal_materia` (
  `eid_pm` int(11) NOT NULL,
  `efk_idpersonal` int(11) NOT NULL,
  `efk_idmateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tpersonal_materia`
--

INSERT INTO `tpersonal_materia` (`eid_pm`, `efk_idpersonal`, `efk_idmateria`) VALUES
(1, 4, 1),
(2, 4, 8),
(3, 4, 9),
(4, 8, 10),
(5, 4, 11),
(6, 4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tresponsable`
--

CREATE TABLE `tresponsable` (
  `eid_responsable` int(11) NOT NULL,
  `cnombre` varchar(50) NOT NULL,
  `capellido` varchar(50) NOT NULL,
  `clugar_trabajo` varchar(100) NOT NULL,
  `ctel_casa` varchar(10) NOT NULL,
  `ctel_trabajo` varchar(10) NOT NULL,
  `cparentesco` varchar(20) NOT NULL,
  `econ_vivie` int(11) NOT NULL,
  `enum_miembros` int(11) NOT NULL,
  `ereligion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsecciones`
--

CREATE TABLE `tsecciones` (
  `eid_seccion` int(11) NOT NULL,
  `cseccion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tsecciones`
--

INSERT INTO `tsecciones` (`eid_seccion`, `cseccion`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipobachillerato`
--

CREATE TABLE `ttipobachillerato` (
  `eid_tipo` int(11) NOT NULL,
  `ctipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ttipobachillerato`
--

INSERT INTO `ttipobachillerato` (`eid_tipo`, `ctipo`) VALUES
(1, 'Tecnico'),
(2, 'General'),
(3, 'DIstancia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE `tusuarios` (
  `eid_usuario` int(11) NOT NULL,
  `cusuario` varchar(10) NOT NULL,
  `cpass` varchar(50) NOT NULL,
  `etipo` int(11) NOT NULL,
  `efk_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuarios`
--

INSERT INTO `tusuarios` (`eid_usuario`, `cusuario`, `cpass`, `etipo`, `efk_personal`) VALUES
(1, 'Fernando97', 'casaca', 0, 1),
(2, 'carcamo1', 'casaca', 1, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `talumno`
--
ALTER TABLE `talumno`
  ADD PRIMARY KEY (`eid_alumno`);

--
-- Indices de la tabla `talumno_responsable`
--
ALTER TABLE `talumno_responsable`
  ADD PRIMARY KEY (`id_ar`),
  ADD KEY `fkalumnos` (`efk_alumno`),
  ADD KEY `fkresponsable` (`efk_responsable`);

--
-- Indices de la tabla `talum_mat_not`
--
ALTER TABLE `talum_mat_not`
  ADD PRIMARY KEY (`id_amn`),
  ADD KEY `fkalumno` (`efk_idalumno`),
  ADD KEY `fkmaetria` (`efk_idmateria`),
  ADD KEY `fknota` (`efk_idnota`);

--
-- Indices de la tabla `tanio`
--
ALTER TABLE `tanio`
  ADD PRIMARY KEY (`eid_anio`);

--
-- Indices de la tabla `tbachilleratos`
--
ALTER TABLE `tbachilleratos`
  ADD PRIMARY KEY (`eid_bachillerato`),
  ADD KEY `fktipo` (`efk_tipo`);

--
-- Indices de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD PRIMARY KEY (`eid_bitacora`),
  ADD KEY `efkusuario` (`efk_idusuario`);

--
-- Indices de la tabla `tcargos`
--
ALTER TABLE `tcargos`
  ADD PRIMARY KEY (`eid_cargo`);

--
-- Indices de la tabla `tdatos_adicionales`
--
ALTER TABLE `tdatos_adicionales`
  ADD PRIMARY KEY (`eid_datosadicionales`),
  ADD KEY `fkfichadatos` (`efk_ficha`);

--
-- Indices de la tabla `tficha`
--
ALTER TABLE `tficha`
  ADD PRIMARY KEY (`eid_ficha`),
  ADD KEY `fkanio` (`efk_anio`),
  ADD KEY `fkalumnoficha` (`efk_alumno`),
  ADD KEY `fkopciones` (`efk_opcion`);

--
-- Indices de la tabla `tgrado`
--
ALTER TABLE `tgrado`
  ADD PRIMARY KEY (`eid_grado`);

--
-- Indices de la tabla `thorarios`
--
ALTER TABLE `thorarios`
  ADD PRIMARY KEY (`eid_horario`);

--
-- Indices de la tabla `tmaterias`
--
ALTER TABLE `tmaterias`
  ADD PRIMARY KEY (`eid_materia`),
  ADD KEY `fkopcion` (`efk_idopcion`),
  ADD KEY `fkhorario_idx` (`efk_idhorario`);

--
-- Indices de la tabla `tnotas`
--
ALTER TABLE `tnotas`
  ADD PRIMARY KEY (`eid_notas`),
  ADD KEY `fkperiodo` (`efk_idperiodo`);

--
-- Indices de la tabla `topciones`
--
ALTER TABLE `topciones`
  ADD PRIMARY KEY (`eid_opcion`),
  ADD KEY `fkbto` (`efk_bto`),
  ADD KEY `fkgrado` (`efk_grado`),
  ADD KEY `fkseccion` (`efk_seccion`);

--
-- Indices de la tabla `tperiodos`
--
ALTER TABLE `tperiodos`
  ADD PRIMARY KEY (`eid_periodo`);

--
-- Indices de la tabla `tpermisos`
--
ALTER TABLE `tpermisos`
  ADD PRIMARY KEY (`eid_permisos`),
  ADD KEY `fkusuario` (`efk_idusuario`);

--
-- Indices de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  ADD PRIMARY KEY (`eid_personal`),
  ADD KEY `fkcargo` (`efk_idcargo`);

--
-- Indices de la tabla `tpersonal_materia`
--
ALTER TABLE `tpersonal_materia`
  ADD PRIMARY KEY (`eid_pm`),
  ADD KEY `fk_personal` (`efk_idpersonal`),
  ADD KEY `fk_materia` (`efk_idmateria`);

--
-- Indices de la tabla `tresponsable`
--
ALTER TABLE `tresponsable`
  ADD PRIMARY KEY (`eid_responsable`);

--
-- Indices de la tabla `tsecciones`
--
ALTER TABLE `tsecciones`
  ADD PRIMARY KEY (`eid_seccion`);

--
-- Indices de la tabla `ttipobachillerato`
--
ALTER TABLE `ttipobachillerato`
  ADD PRIMARY KEY (`eid_tipo`);

--
-- Indices de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  ADD PRIMARY KEY (`eid_usuario`),
  ADD KEY `fkpersonal` (`efk_personal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `talumno`
--
ALTER TABLE `talumno`
  MODIFY `eid_alumno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `talumno_responsable`
--
ALTER TABLE `talumno_responsable`
  MODIFY `id_ar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `talum_mat_not`
--
ALTER TABLE `talum_mat_not`
  MODIFY `id_amn` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tanio`
--
ALTER TABLE `tanio`
  MODIFY `eid_anio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbachilleratos`
--
ALTER TABLE `tbachilleratos`
  MODIFY `eid_bachillerato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  MODIFY `eid_bitacora` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tcargos`
--
ALTER TABLE `tcargos`
  MODIFY `eid_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tdatos_adicionales`
--
ALTER TABLE `tdatos_adicionales`
  MODIFY `eid_datosadicionales` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tficha`
--
ALTER TABLE `tficha`
  MODIFY `eid_ficha` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tgrado`
--
ALTER TABLE `tgrado`
  MODIFY `eid_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `thorarios`
--
ALTER TABLE `thorarios`
  MODIFY `eid_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tmaterias`
--
ALTER TABLE `tmaterias`
  MODIFY `eid_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tnotas`
--
ALTER TABLE `tnotas`
  MODIFY `eid_notas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `topciones`
--
ALTER TABLE `topciones`
  MODIFY `eid_opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tperiodos`
--
ALTER TABLE `tperiodos`
  MODIFY `eid_periodo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  MODIFY `eid_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tpersonal_materia`
--
ALTER TABLE `tpersonal_materia`
  MODIFY `eid_pm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tresponsable`
--
ALTER TABLE `tresponsable`
  MODIFY `eid_responsable` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tsecciones`
--
ALTER TABLE `tsecciones`
  MODIFY `eid_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ttipobachillerato`
--
ALTER TABLE `ttipobachillerato`
  MODIFY `eid_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  MODIFY `eid_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `talumno_responsable`
--
ALTER TABLE `talumno_responsable`
  ADD CONSTRAINT `fkalumnos` FOREIGN KEY (`efk_alumno`) REFERENCES `talumno` (`eid_alumno`),
  ADD CONSTRAINT `fkresponsable` FOREIGN KEY (`efk_responsable`) REFERENCES `tresponsable` (`eid_responsable`);

--
-- Filtros para la tabla `talum_mat_not`
--
ALTER TABLE `talum_mat_not`
  ADD CONSTRAINT `fkalumno` FOREIGN KEY (`efk_idalumno`) REFERENCES `talumno` (`eid_alumno`),
  ADD CONSTRAINT `fkmaetria` FOREIGN KEY (`efk_idmateria`) REFERENCES `tmaterias` (`eid_materia`),
  ADD CONSTRAINT `fknota` FOREIGN KEY (`efk_idnota`) REFERENCES `tnotas` (`eid_notas`);

--
-- Filtros para la tabla `tbachilleratos`
--
ALTER TABLE `tbachilleratos`
  ADD CONSTRAINT `fktipo` FOREIGN KEY (`efk_tipo`) REFERENCES `ttipobachillerato` (`eid_tipo`);

--
-- Filtros para la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  ADD CONSTRAINT `efkusuario` FOREIGN KEY (`efk_idusuario`) REFERENCES `tusuarios` (`eid_usuario`);

--
-- Filtros para la tabla `tdatos_adicionales`
--
ALTER TABLE `tdatos_adicionales`
  ADD CONSTRAINT `fkfichadatos` FOREIGN KEY (`efk_ficha`) REFERENCES `tficha` (`eid_ficha`);

--
-- Filtros para la tabla `tficha`
--
ALTER TABLE `tficha`
  ADD CONSTRAINT `fkalumnoficha` FOREIGN KEY (`efk_alumno`) REFERENCES `talumno` (`eid_alumno`),
  ADD CONSTRAINT `fkanio` FOREIGN KEY (`efk_anio`) REFERENCES `tanio` (`eid_anio`),
  ADD CONSTRAINT `fkopciones` FOREIGN KEY (`efk_opcion`) REFERENCES `topciones` (`eid_opcion`);

--
-- Filtros para la tabla `tmaterias`
--
ALTER TABLE `tmaterias`
  ADD CONSTRAINT `fkhorario` FOREIGN KEY (`efk_idhorario`) REFERENCES `thorarios` (`eid_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkopcion` FOREIGN KEY (`efk_idopcion`) REFERENCES `topciones` (`eid_opcion`);

--
-- Filtros para la tabla `tnotas`
--
ALTER TABLE `tnotas`
  ADD CONSTRAINT `fkperiodo` FOREIGN KEY (`efk_idperiodo`) REFERENCES `tperiodos` (`eid_periodo`);

--
-- Filtros para la tabla `topciones`
--
ALTER TABLE `topciones`
  ADD CONSTRAINT `fkbto` FOREIGN KEY (`efk_bto`) REFERENCES `tbachilleratos` (`eid_bachillerato`),
  ADD CONSTRAINT `fkgrado` FOREIGN KEY (`efk_grado`) REFERENCES `tgrado` (`eid_grado`),
  ADD CONSTRAINT `fkseccion` FOREIGN KEY (`efk_seccion`) REFERENCES `tsecciones` (`eid_seccion`);

--
-- Filtros para la tabla `tpermisos`
--
ALTER TABLE `tpermisos`
  ADD CONSTRAINT `fkusuario` FOREIGN KEY (`efk_idusuario`) REFERENCES `tusuarios` (`eid_usuario`);

--
-- Filtros para la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  ADD CONSTRAINT `fkcargo` FOREIGN KEY (`efk_idcargo`) REFERENCES `tcargos` (`eid_cargo`);

--
-- Filtros para la tabla `tpersonal_materia`
--
ALTER TABLE `tpersonal_materia`
  ADD CONSTRAINT `fk_materia` FOREIGN KEY (`efk_idmateria`) REFERENCES `tmaterias` (`eid_materia`),
  ADD CONSTRAINT `fk_personal` FOREIGN KEY (`efk_idpersonal`) REFERENCES `tpersonal` (`eid_personal`);

--
-- Filtros para la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  ADD CONSTRAINT `fkpersonal` FOREIGN KEY (`efk_personal`) REFERENCES `tpersonal` (`eid_personal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
