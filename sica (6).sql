-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2019 a las 21:47:57
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
(1, '0001', '8398979', 'Jorge', 'Moran', 0, 'la paz', 'La Paz', '2018-05-03', 'Trans.Propio', 1, '2017', 'nada', 'penicilina', '500', 0, 1, 1, 1, 0, 0, 0, 'papa del registro', '--', '90809809-8', '75575765', '', '', 'sdsdhkh', 'Matrimonio Religioso', 'MamÃ¡ y PapÃ¡', '', '', '', '', '', '', '', 6, 1, 1),
(2, '0002', '7423479', 'Marcos antonio', 'Molina Pimentel', 0, 'calle el barrio', 'Sonsonate', '1999-07-04', 'A pie', 3, '2017', 'nada', 'nada', '600', 1, 1, 1, 1, 1, 0, 0, 'papa', '--', '79879797-9', '88779797', '', '', 'jsdklfkslhdk', 'Matrimonio Religioso', 'PapÃ¡', '', '', '', '', '', '', '', 7, 1, 1),
(3, '0003', '7987979', 'Matias', 'Rivera', 0, 'sdskhfkj', 'Chalatenango', '2001-09-02', 'A pie', 1, '2017', 'sdjkds', 'nada', '500', 1, 0, 1, 1, 0, 0, 0, 'jkjkhkj', '', '89808080-8', '79798797', '', '', 'kjhkjhk', 'Matrimonio Religioso', 'MamÃ¡', '', '', '', '', '', '', '', 7, 1, 1),
(4, '0004', '3447398', 'Jessica Mariela', 'Alfaro Palacios', 1, 'casa #24 San Bartolo', 'San Miguel', '2000-05-04', 'Trans.Propio', 5, '2017', 'nada', 'nada', '600', 1, 1, 1, 1, 0, 0, 0, 'hkjhkhk', '', '32398789-7', '87987987', '', '78789787', 'hjkhkj', 'Matrimonio Religioso', 'PapÃ¡', '', '', '', '', '', '', '', 8, 1, 1),
(5, '', '7979797', 'Maria Auxiliadora', 'Alfaro Martinez', 1, 'Colonia Soyla', 'San', '2003-04-02', 'A', 5, '2017', 'nada', 'nada', '600', 0, 0, 1, 0, 1, 0, 0, 'hkhkh', '', '77979797-9', '79879879', '', '', 'hkjhkjh', 'AcompaÃ±ados', 'MamÃ¡', '', '', '', '', '', '', '', 7, 1, 1),
(6, '0006', '3248784', 'Jessica Marianela', 'Alvarex Abarca', 0, 'sadjkasjd', 'Santa Ana', '2005-04-02', 'A pie', 5, '2017', 'sjdkls', 'nada', '600', 1, 1, 1, 0, 0, 0, 0, 'khkjhkjhkj', '', '79879879-8', '79798798', '', '', 'hkjhjkhkj', 'Civil', 'MamÃ¡ y PapÃ¡', '', '', '', '', '', '', '', 7, 1, 1);

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
  `efk_idnota` int(11) NOT NULL,
  `efk_anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talum_mat_not`
--

INSERT INTO `talum_mat_not` (`id_amn`, `efk_idalumno`, `efk_idmateria`, `efk_idnota`, `efk_anio`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 8, 2, 1),
(3, 1, 11, 3, 1),
(4, 3, 1, 4, 1),
(5, 3, 8, 5, 1),
(6, 3, 11, 6, 1),
(7, 6, 13, 7, 1);

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
(1, 2018, 1, 0),
(3, 2017, 0, 1);

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
(1, 'CON236', 'Administrativo Contable', 'Bachillerato orientado a la contabilidad financiera aplicadaaa', 1, 1),
(3, 'BG89', 'Bachillerato General', 'Bachillerato orientado a las generalidadesbasicas que todo bachillere debe poseer', 2, 1),
(7, 'BS273', 'Bachillerato en Salud', 'Bachillerato orientado a la salud', 1, 0),
(9, 'ELE238', 'Electrotecnia', 'Bachillerato enfocado a la elctronica', 1, 0),
(10, 'DES162', 'Desarrollo de Software', 'Bachillerato orientado al manejo de las Herramientas de TIC para brindar el conocimiento a cada alumno en esa rama.', 1, 1);

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
(1, 13, '2018-11-26 14:10:17', 'IniciÃ³ sesion Administrador'),
(2, 13, '2018-11-26 19:18:41', 'IniciÃ³ sesion Administrador'),
(3, 13, '2018-11-27 09:40:47', 'IniciÃ³ sesion Administrador'),
(4, 13, '2018-11-27 14:16:44', 'IniciÃ³ sesion Administrador'),
(5, 13, '2018-11-27 17:27:07', 'IniciÃ³ sesion Administrador'),
(6, 5, '2018-11-27 22:33:50', 'IniciÃ³ sesion Docente '),
(7, 13, '2018-11-27 22:34:04', 'IniciÃ³ sesion Administrador'),
(8, 13, '2018-11-28 08:33:14', 'IniciÃ³ sesion Administrador'),
(9, 13, '2018-11-28 13:16:13', 'Inscribio un nuevo alumno'),
(10, 13, '2018-11-28 16:30:32', 'Inscribio un nuevo alumno'),
(11, 13, '2018-11-28 16:43:01', 'RegistrÃ³ una nueva Opcion de Bachillerato'),
(12, 13, '2018-11-28 16:43:27', 'RegistrÃ³ una nueva Opcion de Bachillerato'),
(13, 13, '2018-11-28 16:43:35', 'RegistrÃ³ una nueva Opcion de Bachillerato'),
(14, 13, '2018-11-28 16:43:43', 'RegistrÃ³ una nueva Opcion de Bachillerato'),
(15, 13, '2018-11-28 18:47:21', 'Inscribio un nuevo alumno'),
(16, 13, '2018-11-28 19:05:59', 'Inscribio un nuevo alumno'),
(17, 13, '2018-11-28 22:21:50', 'IniciÃ³ sesion Administrador'),
(18, 13, '2018-11-28 22:31:02', 'Inscribio un nuevo alumno'),
(19, 13, '2018-11-28 22:38:52', 'Inscribio un nuevo alumno'),
(20, 13, '2018-11-28 22:54:23', 'Inscribio un nuevo alumno'),
(21, 13, '2018-11-28 23:02:15', 'Inscribio un nuevo alumno'),
(22, 13, '2018-11-28 23:06:04', 'Inscribio un nuevo alumno'),
(23, 13, '2018-11-28 23:55:33', 'IniciÃ³ sesion Administrador'),
(24, 13, '2018-11-29 07:29:15', 'IniciÃ³ sesion Administrador'),
(25, 13, '2018-11-29 07:29:56', 'IniciÃ³ sesion Administrador'),
(26, 13, '2018-11-29 07:30:53', 'IniciÃ³ sesion Administrador'),
(27, 13, '2018-11-29 07:36:45', 'IniciÃ³ sesion Docente'),
(28, 13, '2018-11-29 07:36:53', 'IniciÃ³ sesion Administrador'),
(29, 13, '2018-11-29 07:37:37', 'Cerro la sesion'),
(30, 13, '2018-11-29 07:37:59', 'IniciÃ³ sesion Administrador'),
(31, 13, '2018-11-29 07:41:27', 'Se editÃ³ la inscripcion del alumno: 006'),
(32, 13, '2018-11-29 07:42:55', 'CerrÃ³ la sesion'),
(33, 5, '2018-11-29 07:43:06', 'IniciÃ³ sesion Docente '),
(34, 5, '2018-11-29 07:43:17', 'CerrÃ³ la sesion'),
(35, 13, '2018-11-29 07:43:24', 'IniciÃ³ sesion Administrador'),
(36, 13, '2018-11-29 07:49:25', 'Inscribio un nuevo alumno'),
(37, 13, '2018-11-29 07:53:21', 'Inscribio un nuevo alumno'),
(38, 13, '2018-11-29 07:54:34', 'Inscribio un nuevo alumno'),
(39, 13, '2018-11-29 07:56:10', 'CerrÃ³ la sesion'),
(40, 13, '2018-11-29 07:56:20', 'IniciÃ³ sesion Administrador'),
(41, 13, '2018-11-29 08:11:41', 'Inscribio un nuevo alumno'),
(42, 13, '2018-11-29 08:40:11', 'Se editÃ³ la inscripcion del alumno: '),
(43, 13, '2018-11-29 08:41:03', 'Se editÃ³ la inscripcion del alumno: '),
(44, 13, '2018-11-29 08:41:47', 'CerrÃ³ la sesion'),
(45, 5, '2018-12-16 11:42:51', 'IniciÃ³ sesion Docente '),
(46, 5, '2018-12-16 11:44:10', 'CerrÃ³ la sesion'),
(47, 13, '2018-12-16 11:44:22', 'IniciÃ³ sesion Administrador'),
(48, 13, '2018-12-16 11:54:13', 'RegistrÃ³ un nuevo tipo de bachillerato'),
(49, 13, '2018-12-16 11:59:22', 'RegistrÃ³ un nuevo bachillerato'),
(50, 13, '2018-12-16 12:02:05', 'RegistrÃ³ una nueva Opcion de Bachillerato'),
(51, 13, '2018-12-16 12:02:32', 'RegistrÃ³ una nueva Opcion de Bachillerato'),
(52, 13, '2018-12-16 13:43:07', 'IniciÃ³ sesion Administrador'),
(53, 13, '2018-12-16 14:30:17', 'ModificÃ³ un permiso temporal'),
(54, 13, '2018-12-16 14:30:20', 'CerrÃ³ la sesion'),
(55, 5, '2018-12-16 14:30:27', 'IniciÃ³ sesion Docente '),
(56, 5, '2018-12-16 14:30:34', 'CerrÃ³ la sesion'),
(57, 13, '2018-12-16 14:30:42', 'IniciÃ³ sesion Administrador'),
(58, 5, '2018-12-30 09:56:37', 'IniciÃ³ sesion Docente '),
(59, 5, '2018-12-30 09:56:56', 'CerrÃ³ la sesion'),
(60, 13, '2018-12-30 09:57:08', 'IniciÃ³ sesion Administrador'),
(61, 13, '2018-12-30 10:42:29', 'RegistrÃ³ un nuevo tipo de bachillerato'),
(62, 13, '2018-12-30 10:42:57', 'RegistrÃ³ un nuevo tipo de bachillerato'),
(63, 13, '2018-12-30 10:44:44', 'RegistrÃ³ un nuevo tipo de bachillerato'),
(64, 13, '2019-01-03 10:35:10', 'IniciÃ³ sesion Administrador'),
(65, 13, '2019-01-10 11:03:40', 'IniciÃ³ sesion Administrador'),
(66, 5, '2019-01-13 10:11:54', 'IniciÃ³ sesion Docente '),
(67, 5, '2019-01-13 10:12:52', 'CerrÃ³ la sesion'),
(68, 13, '2019-01-13 10:13:22', 'IniciÃ³ sesion Administrador'),
(69, 13, '2019-01-13 10:38:35', 'IniciÃ³ sesion Administrador'),
(70, 13, '2019-01-13 11:00:52', 'Inscribio un nuevo alumno'),
(71, 13, '2019-01-13 14:25:00', 'IniciÃ³ sesion Administrador'),
(72, 13, '2019-01-14 10:15:41', 'IniciÃ³ sesion Administrador'),
(73, 13, '2019-01-14 11:18:47', 'Inscribio un nuevo alumno'),
(74, 13, '2019-01-14 11:18:48', 'Inscribio un nuevo alumno'),
(75, 13, '2019-01-14 11:18:48', 'Inscribio un nuevo alumno'),
(76, 13, '2019-01-14 14:32:28', 'IniciÃ³ sesion Administrador'),
(77, 13, '2019-01-14 14:33:55', 'CerrÃ³ la sesion'),
(78, 5, '2019-01-14 14:34:59', 'IniciÃ³ sesion Docente '),
(79, 5, '2019-01-14 14:35:32', 'CerrÃ³ la sesion'),
(80, 13, '2019-01-14 14:35:42', 'IniciÃ³ sesion Administrador'),
(81, 13, '2019-01-14 15:36:21', 'RegistrÃ³ un nuevo bachillerato'),
(82, 13, '2019-01-14 16:25:20', 'Inscribio un nuevo alumno'),
(83, 13, '2019-01-14 16:25:21', 'Inscribio un nuevo alumno'),
(84, 13, '2019-01-14 16:25:21', 'Inscribio un nuevo alumno'),
(85, 13, '2019-01-14 16:29:05', 'Inscribio un nuevo alumno'),
(86, 13, '2019-01-14 16:29:05', 'Inscribio un nuevo alumno'),
(87, 13, '2019-01-14 16:29:06', 'Inscribio un nuevo alumno'),
(88, 13, '2019-01-14 16:54:26', 'Inscribio un nuevo alumno'),
(89, 13, '2019-01-14 16:54:27', 'Inscribio un nuevo alumno'),
(90, 13, '2019-01-14 16:54:27', 'Inscribio un nuevo alumno'),
(91, 13, '2019-01-15 21:04:24', 'IniciÃ³ sesion Administrador'),
(92, 13, '2019-01-15 22:13:12', 'Inscribio un nuevo alumno'),
(93, 13, '2019-01-15 22:13:12', 'Inscribio un nuevo alumno'),
(94, 13, '2019-01-15 22:13:13', 'Inscribio un nuevo alumno'),
(95, 13, '2019-01-16 11:02:16', 'IniciÃ³ sesion Administrador'),
(96, 13, '2019-01-16 13:22:54', 'Inscribio un nuevo alumno'),
(97, 13, '2019-01-16 13:22:54', 'Inscribio un nuevo alumno'),
(98, 13, '2019-01-16 13:22:54', 'Inscribio un nuevo alumno'),
(99, 13, '2019-01-16 13:27:59', 'CerrÃ³ la sesion'),
(100, 5, '2019-01-16 13:28:16', 'IniciÃ³ sesion Docente '),
(101, 5, '2019-01-16 13:28:57', 'CerrÃ³ la sesion'),
(102, 13, '2019-01-16 13:30:06', 'IniciÃ³ sesion Administrador'),
(103, 13, '2019-01-16 13:39:41', 'Inscribio un nuevo alumno'),
(104, 13, '2019-01-16 13:39:42', 'Inscribio un nuevo alumno'),
(105, 13, '2019-01-16 13:39:42', 'Inscribio un nuevo alumno'),
(106, 13, '2019-01-16 13:50:03', 'IniciÃ³ sesion Administrador'),
(107, 13, '2019-01-16 13:51:39', 'Inscribio un nuevo alumno'),
(108, 13, '2019-01-16 13:51:39', 'Inscribio un nuevo alumno'),
(109, 13, '2019-01-16 13:51:39', 'Inscribio un nuevo alumno'),
(110, 13, '2019-01-16 13:57:23', 'RegistrÃ³ una nueva materia'),
(111, 13, '2019-01-16 13:58:58', 'Inscribio un nuevo alumno'),
(112, 13, '2019-01-16 14:01:58', 'Se editÃ³ la inscripcion del alumno: '),
(113, 13, '2019-01-16 14:32:29', 'RegistrÃ³ una nueva materia'),
(114, 13, '2019-01-16 14:47:08', 'RegistrÃ³ una nueva Opcion de Bachillerato');

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
  `estado` int(11) NOT NULL,
  `anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmaterias`
--

INSERT INTO `tmaterias` (`eid_materia`, `ccodigo`, `cnombre`, `cdescripcion`, `efk_idopcion`, `efk_idhorario`, `estado`, `anio`) VALUES
(1, '001', 'Matematicas', 'Esta es una materia llena de numeros.', 1, 6, 1, 1),
(8, '002', 'Lenguaje y Literatura', 'Esta es una materia sobre lectura.', 1, 2, 1, 1),
(9, '009', 'Sociales', 'Historia de el salvador', 2, 1, 1, 1),
(10, '010', 'Manejo Softwar', 'Aqui se usa word.', 2, 2, 1, 1),
(11, '011', 'Turismo', 'fotografia', 1, 5, 1, 1),
(12, '011', 'Ingles', 'segundo idioma', 2, 5, 1, 1),
(13, '013', 'Herramientas de Productividad', 'nada', 5, 5, 1, 1),
(14, '014', 'Moral y Civica', 'descripcion moral y civica', 3, 3, 1, 1);

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
(5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(1, 56, 1, 1, 1, 1, 4, 1),
(2, 59, 3, 1, 1, 0, 1, 1),
(3, 60, 7, 1, 1, 1, 0, 1),
(4, 60, 1, 2, 1, 1, 0, 1),
(5, 59, 1, 5, 1, 1, 1, 1),
(7, 60, 9, 2, 1, 1, 0, 1),
(8, 60, 9, 1, 3, 1, 0, 1),
(9, 50, 10, 1, 1, 1, 0, 1);

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
(0, 1, 1, 5),
(1, 0, 1, 4),
(2, 0, 0, 3);

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
(4, '05547552-9', 'Alexander', 'Carcamo', '12345678', 'walter_alx@hotmail.com', 'San Cayetano , San Vicente , El Salvador', '2000-07-06', 1, 2, 3),
(7, '12344555-5', 'Josue Benjamin', 'Hernandez Alfaro', '12345678', 'monterrosadelgado@gmail.com', 'San Rafael', '2018-09-14', 1, 2, 2),
(8, '05547552-7', 'Jessica Alexandra', 'Rosales RodrÃ­guez', '12614143', 'jess@hotmail.com', 'San Vicente,San eEsteban Catarina, BÂ° Concepcion, casa#2 ', '2000-09-04', 0, 1, 1),
(9, '12345678-9', 'Jessica Abigail', 'Rodriguez', '12345678', 'jessirosales2@gmail.com', 'San Vicente , Barrio El Calvario , casa 2', '2000-09-05', 1, 1, 3),
(10, '23432434-2', 'Fernando JosuÃ©', 'Arevalo', '71558042', 'fer.aravalo1997@gmail.com', 'Barrio El santuario, 3ra. calle ote. Pasaje Zelaya, Casa #2', '2000-10-01', 1, 2, 3),
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
(1, 4, 1),
(2, 4, 8),
(3, 4, 9),
(4, 8, 10),
(5, 4, 11),
(6, 4, 12),
(7, 11, 13),
(8, 10, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tresponsable`
--

CREATE TABLE `tresponsable` (
  `eid_responsable` int(11) NOT NULL,
  `cnombrep` varchar(50) NOT NULL,
  `cduip` varchar(10) NOT NULL,
  `clugar_trabajop` varchar(100) NOT NULL,
  `ctel_casap` varchar(8) NOT NULL,
  `ctel_trabajop` varchar(8) NOT NULL,
  `ccelularp` varchar(8) NOT NULL,
  `cdirecccionp` varchar(200) NOT NULL,
  `cestado_civil` varchar(50) NOT NULL,
  `cconvive` varchar(50) NOT NULL,
  `cnombrem` varchar(50) NOT NULL,
  `clugar_trabajo` varchar(50) NOT NULL,
  `cprofesion` varchar(50) NOT NULL,
  `cduim` varchar(10) NOT NULL,
  `ctel_casam` varchar(8) NOT NULL,
  `ctel_trabajom` varchar(8) NOT NULL,
  `ccelularm` varchar(8) NOT NULL,
  `imiembros` int(11) NOT NULL,
  `ireligion` int(11) NOT NULL COMMENT '1=catolico 0=otra'
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
(1, 'Fernando97', 'ODFNakxnUjRiRThoc3Q0NE5vT2R6Zz09', 0, 1),
(2, 'carcamo2', 'MkNZYSt4TnlyeWt6bStjakxxSllIQT09', 1, 4),
(3, 'fercho', 'RzNnUUUxLzRWYWpsMWt5clV0RVFwZz09', 0, 10),
(4, 'benja', 'SE54M1dqeFZEWEUrT3JtSnVuYVJtdz09', 1, 7),
(5, 'Kevin777', 'U0FkUnd2STl4ZjlCZFVqRWZGY28wUT09', 0, 11),
(10, 'jesiquit', 'dnlWclNBZVI5TnpaYkZOc3FzTmM1Zz09', 0, 9),
(13, 'Florcita', 'dDJhSWVKMFJlcGhtMlFHc2RDdTBXUT09', 1, 12);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `talumno`
--
ALTER TABLE `talumno`
  ADD PRIMARY KEY (`eid_alumno`),
  ADD KEY `fk_opcion` (`cbachillerato`) USING BTREE;

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
  MODIFY `eid_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `talumno_responsable`
--
ALTER TABLE `talumno_responsable`
  MODIFY `id_ar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `talum_mat_not`
--
ALTER TABLE `talum_mat_not`
  MODIFY `id_amn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tanio`
--
ALTER TABLE `tanio`
  MODIFY `eid_anio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbachilleratos`
--
ALTER TABLE `tbachilleratos`
  MODIFY `eid_bachillerato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  MODIFY `eid_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT de la tabla `tcargos`
--
ALTER TABLE `tcargos`
  MODIFY `eid_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `eid_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `tnotas`
--
ALTER TABLE `tnotas`
  MODIFY `eid_notas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `topciones`
--
ALTER TABLE `topciones`
  MODIFY `eid_opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tperiodos`
--
ALTER TABLE `tperiodos`
  MODIFY `eid_periodo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tpersonal`
--
ALTER TABLE `tpersonal`
  MODIFY `eid_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tpersonal_materia`
--
ALTER TABLE `tpersonal_materia`
  MODIFY `eid_pm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
