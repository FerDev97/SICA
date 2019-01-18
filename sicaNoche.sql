-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2019 a las 07:21:34
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
-- Estructura de tabla para la tabla `estadoinscrip`
--

CREATE TABLE `estadoinscrip` (
  `id_estadoinscrip` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadoinscrip`
--

INSERT INTO `estadoinscrip` (`id_estadoinscrip`, `estado`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talumno`
--

CREATE TABLE `talumno` (
  `eid_alumno` int(11) NOT NULL,
  `ccodigo` varchar(6) NOT NULL,
  `cnie` varchar(15) NOT NULL,
  `cnombre` varchar(100) NOT NULL,
  `capellido` varchar(50) NOT NULL,
  `sexo` int(4) NOT NULL,
  `cdireccion` varchar(200) NOT NULL,
  `edepto` varchar(50) NOT NULL,
  `ffecha_nac` date NOT NULL,
  `cllegada` varchar(50) NOT NULL,
  `cbachillerato` int(11) NOT NULL,
  `canterior` varchar(100) NOT NULL,
  `cenfermedades` varchar(100) NOT NULL,
  `calergia` varchar(100) NOT NULL,
  `cdistancia` varchar(50) NOT NULL,
  `iparvularia` int(11) NOT NULL COMMENT '1=si 0=no',
  `itrabaja` int(11) NOT NULL COMMENT '1=si 0=no',
  `izona` int(11) NOT NULL COMMENT '1=si 0=no',
  `irepite` int(11) NOT NULL COMMENT '1=si 0=no',
  `ibautizo` int(11) NOT NULL,
  `icomunion` int(11) NOT NULL,
  `iconfirma` int(11) NOT NULL,
  `cnombrep` varchar(50) NOT NULL,
  `clugar_trabajop` varchar(100) NOT NULL,
  `cduip` varchar(10) NOT NULL,
  `ctelefonocp` varchar(8) NOT NULL,
  `ctelefonotp` varchar(8) NOT NULL,
  `ccelularp` varchar(8) NOT NULL,
  `cdireccionp` varchar(200) NOT NULL,
  `cestadocivilp` varchar(50) NOT NULL,
  `cconvive` varchar(50) NOT NULL,
  `cnombrem` varchar(50) NOT NULL,
  `clugar_trabajom` varchar(50) NOT NULL,
  `cprofesionm` varchar(50) NOT NULL,
  `cduim` varchar(10) NOT NULL,
  `ctelefonocm` varchar(8) NOT NULL,
  `ctelefonotm` varchar(8) NOT NULL,
  `ccelularm` varchar(8) NOT NULL,
  `cmiembros` int(11) NOT NULL,
  `creligion` int(11) NOT NULL COMMENT '1=catolico 0=otro',
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talumno`
--

INSERT INTO `talumno` (`eid_alumno`, `ccodigo`, `cnie`, `cnombre`, `capellido`, `sexo`, `cdireccion`, `edepto`, `ffecha_nac`, `cllegada`, `cbachillerato`, `canterior`, `cenfermedades`, `calergia`, `cdistancia`, `iparvularia`, `itrabaja`, `izona`, `irepite`, `ibautizo`, `icomunion`, `iconfirma`, `cnombrep`, `clugar_trabajop`, `cduip`, `ctelefonocp`, `ctelefonotp`, `ccelularp`, `cdireccionp`, `cestadocivilp`, `cconvive`, `cnombrem`, `clugar_trabajom`, `cprofesionm`, `cduim`, `ctelefonocm`, `ctelefonotm`, `ccelularm`, `cmiembros`, `creligion`, `anio`) VALUES
(1, '0001', '3274827', 'Marvin Jafeth', 'Palacios Rodriguez', 0, 'Colonia la esperanza #23 San Bartolo', 'San Salvador', '1997-06-02', 'Trans.Propio', 1, '2017', 'ninguna', 'nada', '600', 1, 0, 0, 0, 1, 1, 0, 'Marlon Alfredo Palacion Guevara', 'Ingenio', '32890283-4', '23334343', '23334434', '', 'colonia miramontes #32 San Bartolo', 'Matrimonio Religioso', 'MamÃ¡', '', '', '', '', '', '', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talum_mat_not`
--

CREATE TABLE `talum_mat_not` (
  `id_amn` int(11) NOT NULL,
  `efk_idalumno` int(11) NOT NULL,
  `efk_idmateria` int(11) NOT NULL,
  `efk_idnota` int(11) NOT NULL,
  `efk_anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talum_mat_not`
--

INSERT INTO `talum_mat_not` (`id_amn`, `efk_idalumno`, `efk_idmateria`, `efk_idnota`, `efk_anio`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 3, 2, 1),
(3, 1, 5, 3, 1),
(4, 1, 7, 4, 1),
(5, 1, 9, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tanio`
--

CREATE TABLE `tanio` (
  `eid_anio` int(11) NOT NULL,
  `canio` int(11) NOT NULL,
  `iestado` int(11) NOT NULL,
  `eclausura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tanio`
--

INSERT INTO `tanio` (`eid_anio`, `canio`, `iestado`, `eclausura`) VALUES
(1, 2018, 1, 0);

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
(1, 'ADM160', 'Administrativo Contable', 'Bachillerato orientado a la ensaÃ±anza de la Administracion contable, para asi fomentar el conocimiento en economia.', 1, 1),
(2, 'BAC973', 'Bachillerato General', 'bachillerato orientado a la enseÃ±anza basica en todas las ramas de la educacion media', 2, 1);

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

--
-- Volcado de datos para la tabla `tbitacora`
--

INSERT INTO `tbitacora` (`eid_bitacora`, `efk_idusuario`, `dtfecha`, `cdescripcion`) VALUES
(1, 13, '2019-01-17 23:43:11', 'RegistrÃ³ un nuevo bachillerato'),
(2, 13, '2019-01-17 23:43:51', 'RegistrÃ³ un nuevo bachillerato'),
(3, 13, '2019-01-17 23:44:48', 'RegistrÃ³ un nuevo grado'),
(4, 13, '2019-01-17 23:44:54', 'RegistrÃ³ un nuevo grado'),
(5, 13, '2019-01-17 23:45:01', 'RegistrÃ³ un nuevo grado'),
(6, 13, '2019-01-17 23:45:15', 'RegistrÃ³ una nueva Opcion de Bachillerato'),
(7, 13, '2019-01-17 23:46:36', 'RegistrÃ³ una nueva Opcion de Bachillerato'),
(8, 13, '2019-01-17 23:48:52', 'RegistrÃ³ una nueva materia'),
(9, 13, '2019-01-17 23:50:31', 'RegistrÃ³ una nueva materia'),
(10, 13, '2019-01-17 23:51:02', 'RegistrÃ³ una nueva materia'),
(11, 13, '2019-01-17 23:52:12', 'RegistrÃ³ una nueva materia'),
(12, 13, '2019-01-17 23:54:18', 'RegistrÃ³ una nueva materia'),
(13, 13, '2019-01-17 23:55:52', 'RegistrÃ³ una nueva materia'),
(14, 13, '2019-01-17 23:57:18', 'Inserto un nuevo horario'),
(15, 13, '2019-01-17 23:57:25', 'Inserto un nuevo horario'),
(16, 13, '2019-01-17 23:57:32', 'Inserto un nuevo horario'),
(17, 13, '2019-01-17 23:57:38', 'Inserto un nuevo horario'),
(18, 13, '2019-01-17 23:58:06', 'RegistrÃ³ una nueva materia'),
(19, 13, '2019-01-17 23:58:40', 'RegistrÃ³ una nueva materia'),
(20, 13, '2019-01-17 23:59:22', 'RegistrÃ³ una nueva materia'),
(21, 13, '2019-01-18 00:00:52', 'RegistrÃ³ una nueva materia'),
(22, 13, '2019-01-18 00:07:05', 'Inscribio un nuevo alumno'),
(23, 13, '2019-01-18 00:07:05', 'Inscribio un nuevo alumno'),
(24, 13, '2019-01-18 00:07:06', 'Inscribio un nuevo alumno'),
(25, 13, '2019-01-18 00:07:06', 'Inscribio un nuevo alumno'),
(26, 13, '2019-01-18 00:07:07', 'Inscribio un nuevo alumno'),
(27, 13, '2019-01-18 00:08:53', 'CerrÃ³ la sesion'),
(28, 5, '2019-01-18 00:08:59', 'IniciÃ³ sesion Docente '),
(29, 5, '2019-01-18 00:10:41', 'CerrÃ³ la sesion'),
(30, 13, '2019-01-18 00:10:50', 'IniciÃ³ sesion Administrador'),
(31, 13, '2019-01-18 00:20:27', 'CerrÃ³ periodo de inscripcion'),
(32, 13, '2019-01-18 00:20:43', 'AperturÃ³ periodo de inscripcion');

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
(3, 3);

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
(6, 'Jueves y Viernes', '03:00 PM - 05:00 PM', 1),
(7, 'Martes y Jueves', '7:00 AM - 10:00 AM', 1),
(8, 'Martes y Jueves', '10:00 AM - 12:00 PM', 1),
(9, 'Martes y Jueves', '01:00 PM - 03:00 PM', 1),
(10, 'Martes y Jueves', '03:00 PM - 05:00 PM', 1);

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
  `estado` int(11) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmaterias`
--

INSERT INTO `tmaterias` (`eid_materia`, `ccodigo`, `cnombre`, `cdescripcion`, `efk_idopcion`, `efk_idhorario`, `estado`, `anio`) VALUES
(1, '001', 'Matematicas', 'Materia de enseÃ±anza de las matematicas basicas', 1, 2, 1, 1),
(2, '002', 'Matematica', 'Matematica orientada ala enseÃ±anza de integrales y funciones', 2, 5, 1, 1),
(3, '002', 'Sociales', 'Materia que muestra la sociedad humana en El Salvador', 1, 3, 1, 1),
(4, '003', 'Sociales', 'Materia orientada a la enseÃ±anza de la sociedad en la actualidad', 2, 6, 1, 1),
(5, '005', 'Introduccion a la Economia', 'materia orientda a la comprencion de la economia como ciencia', 1, 6, 1, 1),
(6, '005', 'Economia aplicada I', 'Materia orientada a la elaboracion de hipotesis sobre economia y negocios', 2, 2, 1, 1),
(7, '007', 'Lenguaje I', 'Materia orientada a la enseÃ±annza de la lengua natal', 1, 7, 1, 1),
(8, '007', 'Ingles I', 'Materia orientda a la enseÃ±anza de la lengua predominante en el mundo', 2, 9, 1, 1),
(9, '007', 'Ciencias Naturales', 'Materia orientada a la enseÃ±anza de las ciencias naturales en el mundo, flora y fauna', 1, 10, 1, 1),
(10, '009', 'Solidos I', 'Materia orientada mediante leguaje aplicado para solucion de problemas mediante graficas en 3D', 2, 8, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnotas`
--

CREATE TABLE `tnotas` (
  `eid_notas` int(11) NOT NULL,
  `dnota1p1` double NOT NULL,
  `dnota2p1` double NOT NULL,
  `dnota3p1` double NOT NULL,
  `drecuperacionp1` double NOT NULL,
  `dpromediop1` double NOT NULL,
  `dnota1p2` double NOT NULL,
  `dnota2p2` double NOT NULL,
  `dnota3p2` double NOT NULL,
  `drecuperacionp2` double NOT NULL,
  `dpromediop2` double NOT NULL,
  `dnota1p3` double NOT NULL,
  `dnota2p3` double NOT NULL,
  `dnota3p3` double NOT NULL,
  `drecuperacionp3` double NOT NULL,
  `dpromediop3` double NOT NULL,
  `dnota1p4` double NOT NULL,
  `dnota2p4` double NOT NULL,
  `dnota3p4` double NOT NULL,
  `drecuperacionp4` double NOT NULL,
  `dpromediop4` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tnotas`
--

INSERT INTO `tnotas` (`eid_notas`, `dnota1p1`, `dnota2p1`, `dnota3p1`, `drecuperacionp1`, `dpromediop1`, `dnota1p2`, `dnota2p2`, `dnota3p2`, `drecuperacionp2`, `dpromediop2`, `dnota1p3`, `dnota2p3`, `dnota3p3`, `drecuperacionp3`, `dpromediop3`, `dnota1p4`, `dnota2p4`, `dnota3p4`, `drecuperacionp4`, `dpromediop4`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  `eestado` int(11) NOT NULL,
  `inscritos` int(11) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `topciones`
--

INSERT INTO `topciones` (`eid_opcion`, `ecupo_maximo`, `efk_bto`, `efk_grado`, `efk_seccion`, `eestado`, `inscritos`, `anio`) VALUES
(1, 49, 1, 1, 1, 1, 1, 1),
(2, 50, 1, 2, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tperiodos`
--

CREATE TABLE `tperiodos` (
  `eid_periodo` int(11) NOT NULL,
  `enum` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tperiodos`
--

INSERT INTO `tperiodos` (`eid_periodo`, `enum`, `estado`) VALUES
(1, 1, 1),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0);

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
(1, '05547552-8', 'Maria Jose', 'Hernandez Alvarenga', '12345678', 'fernan@hotmil.com', 'San Vicente, Barrio El Santuario , casa 2', '2000-08-04', 1, 2, 1),
(4, '05547552-9', 'Walter Alexander', 'Carcamo Rivas', '12345678', 'walter_alx@hotmail.com', 'San Cayetano , San Vicente , El Salvador', '2000-07-06', 1, 2, 3),
(7, '12344555-5', 'Josue Benjamin', 'Hernandez Alfaro', '12345678', 'monterrosadelgado@gmail.com', 'San Rafael', '2018-09-14', 1, 2, 2),
(8, '05547552-7', 'Jessica Alexandra', 'Rosales RodrÃ­guez', '12614143', 'jess@hotmail.com', 'San Vicente,San eEsteban Catarina, BÂ° Concepcion, casa#2 ', '2000-09-04', 0, 1, 1),
(9, '12345678-9', 'Jessica Abigail', 'Rodriguez Rosales', '12345678', 'jessirosales2@gmail.com', 'San Vicente , Barrio El Calvario , casa 2', '2000-09-05', 1, 1, 3),
(10, '23432434-2', 'Fernando JosuÃ©', 'Hernandez Arevalo', '71558042', 'fer.aravalo1997@gmail.com', 'Barrio El santuario, 3ra. calle ote. Pasaje Zelaya, Casa #2', '2000-10-01', 1, 2, 3),
(11, '23434345-3', 'Kevin Alexander ', 'Jovel Arevalo', '73232343', 'kevinjovel9@gmail.com', 'Col Santa Fe San Sebastian', '2000-01-13', 1, 2, 3),
(12, '13612547-1', 'Flor de Maria', 'Rodriguez Martinez', '72131654', 'florcitademariarodriguez72@gmail.com', 'San Vicente', '2000-10-02', 1, 1, 1);

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
(1, 11, 1),
(2, 11, 2),
(3, 9, 3),
(4, 9, 4),
(5, 11, 5),
(6, 10, 6),
(7, 11, 7),
(8, 9, 8),
(9, 10, 9),
(10, 11, 10);

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
(2, 'General');

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
(1, 'Fernando97', 'ODFNakxnUjRiRThoc3Q0NE5vT2R6Zz09', 0, 1),
(2, 'carcamo2', 'bnR6VzNoTkxhbnlsbzVHMEl1cCtRUT09', 1, 4),
(3, 'fercho', 'RzNnUUUxLzRWYWpsMWt5clV0RVFwZz09', 0, 10),
(4, 'benja', 'SE54M1dqeFZEWEUrT3JtSnVuYVJtdz09', 1, 7),
(5, 'Kevin777', 'U0FkUnd2STl4ZjlCZFVqRWZGY28wUT09', 0, 11),
(10, 'Jessi', 'SU1EV2hwSVV6dzFOZmdQQ1kwR29oZz09', 0, 9),
(13, 'Florcita', 'dDJhSWVKMFJlcGhtMlFHc2RDdTBXUT09', 1, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadoinscrip`
--
ALTER TABLE `estadoinscrip`
  ADD PRIMARY KEY (`id_estadoinscrip`);

--
-- Indices de la tabla `talumno`
--
ALTER TABLE `talumno`
  ADD PRIMARY KEY (`eid_alumno`),
  ADD KEY `fk_opcion` (`cbachillerato`) USING BTREE;

--
-- Indices de la tabla `talum_mat_not`
--
ALTER TABLE `talum_mat_not`
  ADD PRIMARY KEY (`id_amn`),
  ADD KEY `fkalumno` (`efk_idalumno`),
  ADD KEY `fkmaetria` (`efk_idmateria`),
  ADD KEY `fknota` (`efk_idnota`),
  ADD KEY `fkanio` (`efk_anio`);

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
  ADD PRIMARY KEY (`eid_notas`);

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
-- AUTO_INCREMENT de la tabla `estadoinscrip`
--
ALTER TABLE `estadoinscrip`
  MODIFY `id_estadoinscrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `talumno`
--
ALTER TABLE `talumno`
  MODIFY `eid_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `talum_mat_not`
--
ALTER TABLE `talum_mat_not`
  MODIFY `id_amn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tanio`
--
ALTER TABLE `tanio`
  MODIFY `eid_anio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbachilleratos`
--
ALTER TABLE `tbachilleratos`
  MODIFY `eid_bachillerato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  MODIFY `eid_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `tcargos`
--
ALTER TABLE `tcargos`
  MODIFY `eid_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tgrado`
--
ALTER TABLE `tgrado`
  MODIFY `eid_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `thorarios`
--
ALTER TABLE `thorarios`
  MODIFY `eid_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tmaterias`
--
ALTER TABLE `tmaterias`
  MODIFY `eid_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tnotas`
--
ALTER TABLE `tnotas`
  MODIFY `eid_notas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `topciones`
--
ALTER TABLE `topciones`
  MODIFY `eid_opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tperiodos`
--
ALTER TABLE `tperiodos`
  MODIFY `eid_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  MODIFY `eid_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tpersonal_materia`
--
ALTER TABLE `tpersonal_materia`
  MODIFY `eid_pm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tsecciones`
--
ALTER TABLE `tsecciones`
  MODIFY `eid_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ttipobachillerato`
--
ALTER TABLE `ttipobachillerato`
  MODIFY `eid_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  MODIFY `eid_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `talumno`
--
ALTER TABLE `talumno`
  ADD CONSTRAINT `fkop` FOREIGN KEY (`cbachillerato`) REFERENCES `topciones` (`eid_opcion`);

--
-- Filtros para la tabla `talum_mat_not`
--
ALTER TABLE `talum_mat_not`
  ADD CONSTRAINT `fkalumno` FOREIGN KEY (`efk_idalumno`) REFERENCES `talumno` (`eid_alumno`),
  ADD CONSTRAINT `fkanio` FOREIGN KEY (`efk_anio`) REFERENCES `tanio` (`eid_anio`),
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
-- Filtros para la tabla `tmaterias`
--
ALTER TABLE `tmaterias`
  ADD CONSTRAINT `fkhorario` FOREIGN KEY (`efk_idhorario`) REFERENCES `thorarios` (`eid_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkopcion` FOREIGN KEY (`efk_idopcion`) REFERENCES `topciones` (`eid_opcion`);

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
