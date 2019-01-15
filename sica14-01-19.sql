-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2019 a las 20:09:39
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
(1, '001', '1209348765', 'Jessica AbigailA', 'Rosales Rodriguez', 1, 'San Esteban Catarina , Barrio Concepciï¿½n , casa #2', 'San', '2010-02-03', 'Autobus', 1, 'noveno', 'ninguno', 'ninguno', '10', 1, 0, 1, 0, 1, 1, 1, 'Jose Rosales', 'Campo', '129876534', '23456789', '', '76542398', 'San Esteban Catarina Barrio Concepcion', 'Matrimonio', 'MamÃ¡', 'Flor Rodriguez', 'AVON', 'ama de casa', '12345678-0', '23456789', '', '76543526', 2, 1, 0),
(2, '002', '1626514256', 'Fernando Josue', 'Hernandez Arevalo', 0, 'San Vicente , barrio el santuario , casa #2', 'San Vicente', '2010-12-10', '1', 1, 'primero general', 'asma', 'penicilina', '5', 0, 0, 1, 1, 1, 1, 1, 'Jose Hernandez', 'DELSUR', '12345687-0', '23765245', '23987615', '76524315', 'San Vicente, frente barrio el santuario', '2', '3', 'Maria Arevalo', 'ninguno', 'ama de casa', '12618623-9', '23934567', '', '76543142', 3, 1, 0),
(3, '003', '7635543426', 'Kevin Alexander ', 'Jovel Arevalo', 0, 'San Vicente , barrio el calvario , casa#11', 'San Vicente', '2010-07-14', '2', 3, 'segundo contador', 'ninguno', 'ninguno', '10', 1, 0, 1, 0, 1, 1, 0, 'Josue Jovel', 'Campo', '13826267-9', '23987625', '', '76515423', 'San Vicente, barrio el calvario', '3', '2', 'Ana Jovel', 'Alcaldia', '', '12751653-2', '21215435', '23987176', '78901263', 2, 1, 0),
(4, '004', '3621541431', 'Walter Alexander ', 'Fernandez Carcamo', 0, 'San Vicente , San Cayetano ', 'San Vicente', '2009-06-16', '3', 5, 'primero general', 'bronquitis', 'ninguno', '20', 0, 0, 0, 1, 1, 0, 0, 'Walter Elias Fernandez', 'Alcaldia San Vicente', '09237732-9', '23746356', '23981263', '76142431', 'San Cayetano , San Vicente', '2', '1', 'Luz Marina Carcamo', 'Ues', '', '08127656-1', '23816257', '23816875', '74176571', 2, 1, 0),
(5, '005', '1907386327', 'Lissette Adriana', 'Ortega Lopez', 1, 'San Vicente , san esteban catarina , barrio el calvario', 'San Salvador', '2001-06-04', '2', 5, 'noveno grado', 'migraña', 'penicilina', '200', 0, 0, 1, 1, 1, 1, 1, 'Marvin Ortega', 'Alcaldia San Esteban', '12721678-3', '23632182', '23629102', '79862175', 'San Esteban Catarina , barrio el centro', '2', '2', 'Karen Lopez', 'Acodjar sede San esteban', '', '12913629-1', '23861761', '27536123', '76125152', 1, 1, 0),
(6, '006', '1261715', 'Milagro Stefani', 'Melara Andrare', 1, 'San Vicente , barrio el centro ', 'San', '2005-12-01', 'Autobus', 3, 'noveno grado', 'ninguno', 'ninguno', '10', 1, 1, 1, 1, 1, 1, 1, 'Juan Melara', 'Campo', '12371631-5', '23978654', '23098765', '71654321', 'San Vicente', 'Matrimonio', 'MamÃ¡', 'Maria Andrade', '', 'Ama de cas', '29731296-3', '29087654', '7654321', '76543415', 2, 1, 0),
(8, '008', '2835365', 'Griselda Elizabeth', 'Rosales Romero', 1, 'San Vicente , San Cayetano Istepeque ', 'San Vicente', '2005-12-02', 'Autobus', 2, 'noveno grado', 'ninguna', 'ninguna', '200', 1, 1, 1, 1, 1, 1, 1, 'Jose Julia Rosales', 'Claro', '27637163-5', '2896363', '20947983', '75142243', 'San Vicente , San Vicente', 'Matrimonio Religioso', 'MamÃ¡ y PapÃ¡', 'Maria Antonia Romero', '', 'ama de casa', '82687315-3', '29037489', '86713652', '16736623', 5, 1, 0),
(9, '009', '3977726', 'Jorge Alberto', 'Martinez Ayala', 0, 'San Vicente , barrio el santuario', 'CabaÃ±as', '2005-12-08', 'Trans.Propio', 4, '1 primero contador b', 'ninguna', 'penicilina', '25', 1, 1, 1, 1, 1, 1, 1, 'Jose Humberto Matinez', 'ANDA', '27318215-2', '32837168', '23947378', '24903749', 'San Vicente ', 'Matrimonio Religioso', 'MamÃ¡ y PapÃ¡', 'Ana Elizabeth Ayala', '', 'Ama de casa', '31276312-3', '23937467', '23478364', '71534243', 5, 1, 0),
(14, '0010', '1239929', 'Elmer Antonio', 'Martinez Rivas', 0, 'colonia monserrat #4 San Vicente', 'San Vicente', '2005-10-12', 'Autobus', 2, '2017', 'ninguna', 'acetaminofen', '300', 1, 0, 0, 0, 1, 1, 1, 'Fernando Antonio Martinez Alvarenga', 'ANDA', '87487387-8', '23337899', '', '78998938', 'colonia Monserrat #4 San vicente', 'Matrimonio Religioso', 'MamÃ¡ y PapÃ¡', 'Jessica Melina Arias Melara', 'AVON', 'cosmetologa', '32497923-7', '', '', '78399399', 4, 1, 0),
(15, '0015', '2173827', 'Milton Alfredo', 'Bonilla Martinez', 0, 'colonia el porvenir ', 'San Vicente', '2005-12-17', 'A pie', 1, '2018', 'ninguna', 'nada', '78', 1, 0, 0, 0, 1, 1, 0, 'Walter Alexander Fernandez Carcamo', 'AVIANCA', '27862781-6', '2344353', '2334453', '7837847', 'San cayetano', 'Civil', 'MamÃ¡ y PapÃ¡', 'Maria Josefina Perez', 'El ingenio', 'kjdskh', '27348723-7', '2337388', '678687', '78488783', 25, 1, 0),
(16, '0016', '7987979', 'Maria alejandra', 'Alvarez Melgar', 0, 'sdkfhs', 'San Salvador', '2005-12-19', 'Autobus', 1, '2019', 'nada', 'no', '50', 1, 1, 1, 1, 1, 0, 0, 'papa', 'asaber', '23828304-8', '27382783', '28382738', '21892739', 'direccion del papa', 'Matrimonio Religioso', 'PapÃ¡', 'mama', 'asaber', 'no tiene', '23478279-8', '12839827', '23823497', '38249787', 4, 1, 0),
(18, '0017', '7979879', 'jkhjhkjhkj', 'hjhhk', 0, 'kldsjfklj', 'San Salvador', '2005-12-12', 'Autobus', 3, '2018', 'nada', 'acetaminofen', '50', 1, 1, 1, 0, 1, 1, 0, 'asjdkljl', 'khkjhkhk', '97987979-0', '879798', '27987979', '79798797', 'jkkhjkhlkh', 'Matrimonio Religioso', 'MamÃ¡', 'hkhkgjgkg', 'sdjfkhsdkj', 'hkhgjkgj', '09809808-0', '98908080', '87987979', '98786868', 98, 1, 0),
(19, '0019', '7979797', 'yiuyuiyiy', 'yiyiyiu', 1, 'jdkhdsjkh', 'San Miguel', '2005-12-06', 'A pie', 4, '2019', 'ambehjk', 'sjlksdj', '50', 1, 1, 1, 1, 1, 0, 0, 'jljljlj', 'jkhjkhkhkj', '80808080-8', '09090909', '29878678', '09797979', 'jkkhk', 'AcompaÃ±ados', 'MamÃ¡', 'jklkhkhkjh', '576567hkjhkjh', 'yjkjgjgj', '78686876-8', '87787878', '78667868', '67676867', 78, 1, 0),
(20, '0020', '7986986', 'pppppp', 'yhjhk', 0, 'jlkjlkjlk', 'La Union', '2005-12-09', 'Trans.Propio', 2, '2019', 'no', 'nada', '59', 0, 1, 1, 0, 1, 0, 0, 'hkhkhkhkl', '80808', '78966686-9', '908', '27789798', '98098', 'hkhhk', 'Civil', 'PapÃ¡', 'hjhkhkh', '7777989', 'jhkjhnkjh', '98868666-8', '8789978', '87686868', '98798798', 78, 1, 0),
(21, '0020', '7986986', 'pppppp', 'yhjhk', 0, 'jlkjlkjlk', 'La Union', '2005-12-09', 'Trans.Propio', 2, '2019', 'no', 'nada', '59', 0, 1, 1, 0, 1, 0, 0, 'hkhkhkhkl', '80808', '78966686-9', '908', '27789798', '98098', 'hkhhk', 'Civil', 'PapÃ¡', 'hjhkhkh', '7777989', 'jhkjhnkjh', '98868666-8', '8789978', '87686868', '98798798', 78, 1, 0),
(22, '0020', '7986986', 'pppppp', 'yhjhk', 0, 'jlkjlkjlk', 'La Union', '2005-12-09', 'Trans.Propio', 2, '2019', 'no', 'nada', '59', 0, 1, 1, 0, 1, 0, 0, 'hkhkhkhkl', '80808', '78966686-9', '908', '27789798', '98098', 'hkhhk', 'Civil', 'PapÃ¡', 'hjhkhkh', '7777989', 'jhkjhnkjh', '98868666-8', '8789978', '87686868', '98798798', 78, 1, 0),
(23, '0020', '7986986', 'pppppp', 'yhjhk', 0, 'jlkjlkjlk', 'La Union', '2005-12-09', 'Trans.Propio', 2, '2019', 'no', 'nada', '59', 0, 1, 1, 0, 1, 0, 0, 'hkhkhkhkl', '80808', '78966686-9', '908', '27789798', '98098', 'hkhhk', 'Civil', 'PapÃ¡', 'hjhkhkh', '7777989', 'jhkjhnkjh', '98868666-8', '8789978', '87686868', '98798798', 78, 1, 0),
(24, '0024', '7897979', 'marcos', 'arevalo', 0, 'jkdsjfk', 'Chalatenango', '2005-12-09', 'Autobus', 2, '2018', 'nada', 'nada', '50', 0, 1, 0, 1, 1, 1, 1, 'nkhkhkj', '779879', '23273879-7', '8987', '27979', '98798', 'nmbmb', 'Matrimonio Religioso', 'MamÃ¡', 'gy', '67866u', 'yutu', '79879879-7', '6876', '678687', '7687678', 3, 1, 0),
(25, '0025', '7897978', 'marcos', 'arevalo', 0, 'jkdsjfk', 'Chalatenango', '2005-12-09', 'Autobus', 2, '2018', 'nada', 'nada', '50', 0, 1, 0, 1, 1, 1, 1, 'nkhkhkj', '779879', '23273879-7', '8987', '27979', '98798', 'nmbmb', 'Matrimonio Religioso', 'MamÃ¡', 'gy', '67866u', 'yutu', '79879879-7', '6876', '678687', '7687678', 3, 1, 0),
(26, '0026', '7897975', 'marcos', 'arevalo', 0, 'jkdsjfk', 'Chalatenango', '2005-12-09', 'Autobus', 2, '2018', 'nada', 'nada', '50', 0, 1, 0, 1, 1, 1, 1, 'nkhkhkj', '779879', '23273879-7', '8987', '27979', '98798', 'nmbmb', 'Matrimonio Religioso', 'MamÃ¡', 'gy', '67866u', 'yutu', '79879879-7', '6876', '678687', '7687678', 3, 1, 0),
(27, '0027', '2374984', 'Kevin Alexander', 'Jovel Arevalo', 0, 'Col santa fe San Sebastian', 'San Vicente', '2005-03-14', 'Trans.Propio', 1, '2018', 'ninguna', 'nada', '1500', 1, 1, 0, 0, 1, 1, 1, 'Simon Jovel Arias', 'AVIANCA', '40839080-9', '23332422', '23234234', '78273878', '---', 'Matrimonio Religioso', 'MamÃ¡ y PapÃ¡', 'Teresa de Jesus Arevalo', '----', 'ninguno', '49387497-9', '23263762', '23234323', '76363667', 4, 1, 1);

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
(1, 27, 1, 1, 1),
(2, 27, 8, 2, 1),
(3, 27, 11, 3, 1);

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
(1, 'CON236', 'Contador', 'Bachillerato orientado a la contabilidad financiera aplicadaaa', 2, 0),
(3, 'BG89', 'Bachillerato General', 'Bachillerato orientado a las generalidadesbasicas que todo bachillere debe poseer', 2, 0),
(7, 'BS273', 'Bachillerato en Salud', 'Bachillerato orientado a la salud', 1, 0),
(9, 'ELE238', 'Electrotecnia', 'Bachillerato enfocado a la elctronica', 1, 0);

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
(75, 13, '2019-01-14 11:18:48', 'Inscribio un nuevo alumno');

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
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(2, 1, 3, 1, 1, 1),
(3, 50, 7, 1, 1, 1),
(4, 50, 1, 2, 1, 1),
(5, 50, 1, 5, 1, 1),
(6, 50, 1, 1, 1, 1),
(7, 50, 9, 2, 1, 1),
(8, 45, 9, 1, 3, 1);

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
(6, 4, 12);

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
  MODIFY `eid_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `talumno_responsable`
--
ALTER TABLE `talumno_responsable`
  MODIFY `id_ar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `talum_mat_not`
--
ALTER TABLE `talum_mat_not`
  MODIFY `id_amn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tanio`
--
ALTER TABLE `tanio`
  MODIFY `eid_anio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbachilleratos`
--
ALTER TABLE `tbachilleratos`
  MODIFY `eid_bachillerato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbitacora`
--
ALTER TABLE `tbitacora`
  MODIFY `eid_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
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
  MODIFY `eid_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `tnotas`
--
ALTER TABLE `tnotas`
  MODIFY `eid_notas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `topciones`
--
ALTER TABLE `topciones`
  MODIFY `eid_opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
