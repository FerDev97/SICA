CREATE DATABASE IF NOT EXISTS `sica`;

USE `sica`;

SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `estadoinscrip`;

CREATE TABLE `estadoinscrip` (
  `id_estadoinscrip` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_estadoinscrip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `estadoinscrip` VALUES (1,1);


DROP TABLE IF EXISTS `talum_mat_not`;

CREATE TABLE `talum_mat_not` (
  `id_amn` int(11) NOT NULL AUTO_INCREMENT,
  `efk_idalumno` int(11) NOT NULL,
  `efk_idmateria` int(11) NOT NULL,
  `efk_idnota` int(11) NOT NULL,
  `efk_anio` int(11) NOT NULL,
  PRIMARY KEY (`id_amn`),
  KEY `fkalumno` (`efk_idalumno`),
  KEY `fkmaetria` (`efk_idmateria`),
  KEY `fknota` (`efk_idnota`),
  KEY `fkanio` (`efk_anio`),
  CONSTRAINT `fkalumno` FOREIGN KEY (`efk_idalumno`) REFERENCES `talumno` (`eid_alumno`),
  CONSTRAINT `fkanio` FOREIGN KEY (`efk_anio`) REFERENCES `tanio` (`eid_anio`),
  CONSTRAINT `fkmaetria` FOREIGN KEY (`efk_idmateria`) REFERENCES `tmaterias` (`eid_materia`),
  CONSTRAINT `fknota` FOREIGN KEY (`efk_idnota`) REFERENCES `tnotas` (`eid_notas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `talumno`;

CREATE TABLE `talumno` (
  `eid_alumno` int(11) NOT NULL AUTO_INCREMENT,
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
  `anio` int(11) NOT NULL,
  PRIMARY KEY (`eid_alumno`),
  KEY `fk_opcion` (`cbachillerato`) USING BTREE,
  CONSTRAINT `fkop` FOREIGN KEY (`cbachillerato`) REFERENCES `topciones` (`eid_opcion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `tanio`;

CREATE TABLE `tanio` (
  `eid_anio` int(11) NOT NULL AUTO_INCREMENT,
  `canio` int(11) NOT NULL,
  `iestado` int(11) NOT NULL,
  `eclausura` int(11) NOT NULL,
  PRIMARY KEY (`eid_anio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `tanio` VALUES (1,2018,1,0);


DROP TABLE IF EXISTS `tbachilleratos`;

CREATE TABLE `tbachilleratos` (
  `eid_bachillerato` int(11) NOT NULL AUTO_INCREMENT,
  `ccodigo` varchar(20) NOT NULL,
  `cnombe` varchar(30) NOT NULL,
  `cdescripcion` varchar(200) NOT NULL,
  `efk_tipo` int(11) NOT NULL,
  `eestado` int(11) NOT NULL,
  PRIMARY KEY (`eid_bachillerato`),
  KEY `fktipo` (`efk_tipo`),
  CONSTRAINT `fktipo` FOREIGN KEY (`efk_tipo`) REFERENCES `ttipobachillerato` (`eid_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `tbachilleratos` VALUES (1,"BAC177","Bachillerato General","Bachillerato orientado a la enseÃ±anza basica de educacion media",2,1);


DROP TABLE IF EXISTS `tbitacora`;

CREATE TABLE `tbitacora` (
  `eid_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `efk_idusuario` int(11) NOT NULL,
  `dtfecha` datetime NOT NULL,
  `cdescripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`eid_bitacora`),
  KEY `efkusuario` (`efk_idusuario`),
  CONSTRAINT `efkusuario` FOREIGN KEY (`efk_idusuario`) REFERENCES `tusuarios` (`eid_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO `tbitacora` VALUES (1,13,"2019-01-18 07:23:14","CerrÃ³ la sesion"),
(2,14,"2019-01-18 07:23:19","IniciÃ³ sesion Docente "),
(3,14,"2019-01-18 07:23:25","CerrÃ³ la sesion"),
(4,13,"2019-01-18 07:23:30","IniciÃ³ sesion Administrador"),
(5,13,"2019-01-18 07:26:10","ModificÃ³ un permiso temporal"),
(6,13,"2019-01-18 07:26:49","ModificÃ³ un permiso temporal"),
(7,13,"2019-01-18 07:32:53","BrindÃ³ permiso temporal a un usuario"),
(8,13,"2019-01-18 07:34:47","BrindÃ³ permiso temporal a un usuario"),
(9,13,"2019-01-18 07:34:53","BrindÃ³ permiso temporal a un usuario"),
(10,13,"2019-01-18 07:35:03","CerrÃ³ la sesion"),
(11,14,"2019-01-18 07:35:16","IniciÃ³ sesion Docente "),
(12,14,"2019-01-18 07:35:31","CerrÃ³ la sesion"),
(13,13,"2019-01-18 07:35:39","IniciÃ³ sesion Administrador"),
(14,13,"2019-01-18 07:35:50","AperturÃ³ periodo de inscripcion"),
(15,13,"2019-01-18 07:36:42","CerrÃ³ periodo de inscripcion"),
(16,13,"2019-01-18 07:46:26","RegistrÃ³ un nuevo bachillerato"),
(17,13,"2019-01-18 07:46:39","RegistrÃ³ una nueva Opcion de Bachillerato"),
(18,13,"2019-01-18 07:46:47","RegistrÃ³ una nueva Opcion de Bachillerato"),
(19,13,"2019-01-18 07:50:45","AperturÃ³ periodo de inscripcion");


DROP TABLE IF EXISTS `tcargos`;

CREATE TABLE `tcargos` (
  `eid_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `ccargo` varchar(50) NOT NULL,
  PRIMARY KEY (`eid_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `tcargos` VALUES (1,"Secretaria"),
(2,"Director"),
(3,"Docente"),
(4,"Subdirectora"),
(5,"Ordenanza");


DROP TABLE IF EXISTS `tgrado`;

CREATE TABLE `tgrado` (
  `eid_grado` int(11) NOT NULL AUTO_INCREMENT,
  `cgrado` int(11) NOT NULL,
  PRIMARY KEY (`eid_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `tgrado` VALUES (1,1),
(2,2),
(3,3);


DROP TABLE IF EXISTS `thorarios`;

CREATE TABLE `thorarios` (
  `eid_horario` int(11) NOT NULL AUTO_INCREMENT,
  `cdia` varchar(20) NOT NULL,
  `chora` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`eid_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `thorarios` VALUES (1,"Lunes y Martes","7:00 AM - 10:00 AM",0),
(2,"Martes y Miercoles","10:00 AM - 12:00 PM",1),
(3,"Miercoles y Viernes","03:00 PM - 05:00 PM",1),
(4,"Jueves y Jueves","03:00 PM - 05:00 PM",0),
(5,"Martes y Miercoles","01:00 PM - 03:00 PM",1),
(6,"Jueves y Viernes","03:00 PM - 05:00 PM",1),
(7,"Martes y Jueves","7:00 AM - 10:00 AM",1),
(8,"Martes y Jueves","10:00 AM - 12:00 PM",1),
(9,"Martes y Jueves","01:00 PM - 03:00 PM",1),
(10,"Martes y Jueves","03:00 PM - 05:00 PM",1);


DROP TABLE IF EXISTS `tmaterias`;

CREATE TABLE `tmaterias` (
  `eid_materia` int(11) NOT NULL AUTO_INCREMENT,
  `ccodigo` varchar(10) NOT NULL,
  `cnombre` varchar(30) NOT NULL,
  `cdescripcion` varchar(200) NOT NULL,
  `efk_idopcion` int(11) NOT NULL,
  `efk_idhorario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  PRIMARY KEY (`eid_materia`),
  KEY `fkopcion` (`efk_idopcion`),
  KEY `fkhorario_idx` (`efk_idhorario`),
  CONSTRAINT `fkhorario` FOREIGN KEY (`efk_idhorario`) REFERENCES `thorarios` (`eid_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkopcion` FOREIGN KEY (`efk_idopcion`) REFERENCES `topciones` (`eid_opcion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `tmaterias` VALUES (1,001,"Matematicas","Materia de enseÃ±anza de las matematicas basicas",1,2,1,1),
(2,002,"Matematica","Matematica orientada ala enseÃ±anza de integrales y funciones",2,5,1,1),
(3,002,"Sociales","Materia que muestra la sociedad humana en El Salvador",1,3,1,1),
(4,003,"Sociales","Materia orientada a la enseÃ±anza de la sociedad en la actualidad",2,6,1,1),
(5,005,"Introduccion a la Economia","materia orientda a la comprencion de la economia como ciencia",1,6,1,1),
(6,005,"Economia aplicada I","Materia orientada a la elaboracion de hipotesis sobre economia y negocios",2,2,1,1),
(7,007,"Lenguaje I","Materia orientada a la enseÃ±annza de la lengua natal",1,7,1,1),
(8,007,"Ingles I","Materia orientda a la enseÃ±anza de la lengua predominante en el mundo",2,9,1,1),
(9,007,"Ciencias Naturales","Materia orientada a la enseÃ±anza de las ciencias naturales en el mundo, flora y fauna",1,10,1,1),
(10,009,"Solidos I","Materia orientada mediante leguaje aplicado para solucion de problemas mediante graficas en 3D",2,8,1,1);


DROP TABLE IF EXISTS `tnotas`;

CREATE TABLE `tnotas` (
  `eid_notas` int(11) NOT NULL AUTO_INCREMENT,
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
  `dpromediop4` double NOT NULL,
  PRIMARY KEY (`eid_notas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `topciones`;

CREATE TABLE `topciones` (
  `eid_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `ecupo_maximo` int(11) NOT NULL,
  `efk_bto` int(11) NOT NULL,
  `efk_grado` int(11) NOT NULL,
  `efk_seccion` int(11) NOT NULL,
  `eestado` int(11) NOT NULL,
  `inscritos` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  PRIMARY KEY (`eid_opcion`),
  KEY `fkbto` (`efk_bto`),
  KEY `fkgrado` (`efk_grado`),
  KEY `fkseccion` (`efk_seccion`),
  CONSTRAINT `fkbto` FOREIGN KEY (`efk_bto`) REFERENCES `tbachilleratos` (`eid_bachillerato`),
  CONSTRAINT `fkgrado` FOREIGN KEY (`efk_grado`) REFERENCES `tgrado` (`eid_grado`),
  CONSTRAINT `fkseccion` FOREIGN KEY (`efk_seccion`) REFERENCES `tsecciones` (`eid_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `topciones` VALUES (1,50,1,1,1,1,0,1),
(2,50,1,2,1,1,0,1);


DROP TABLE IF EXISTS `tperiodos`;

CREATE TABLE `tperiodos` (
  `eid_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `enum` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`eid_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `tperiodos` VALUES (1,1,1),
(2,2,0),
(3,3,0),
(4,4,0);


DROP TABLE IF EXISTS `tpermisos`;

CREATE TABLE `tpermisos` (
  `eid_permisos` int(11) NOT NULL AUTO_INCREMENT,
  `ep_inscripciones` int(11) NOT NULL,
  `ep_estadisticas` int(11) NOT NULL,
  `efk_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`eid_permisos`),
  KEY `fkusuario` (`efk_idusuario`),
  CONSTRAINT `fkusuario` FOREIGN KEY (`efk_idusuario`) REFERENCES `tusuarios` (`eid_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tpermisos` VALUES (1,1,0,14),
(2,0,1,1);


DROP TABLE IF EXISTS `tpersonal`;

CREATE TABLE `tpersonal` (
  `eid_personal` int(11) NOT NULL AUTO_INCREMENT,
  `cdui` varchar(10) NOT NULL,
  `cnombre` varchar(50) NOT NULL,
  `capellido` varchar(50) NOT NULL,
  `ctelefono` varchar(10) NOT NULL,
  `ccorreo` varchar(200) NOT NULL,
  `cdireccion` varchar(200) NOT NULL,
  `ffechanacimiento` date NOT NULL,
  `iestado` int(11) NOT NULL,
  `isexo` int(11) NOT NULL,
  `efk_idcargo` int(11) NOT NULL,
  PRIMARY KEY (`eid_personal`),
  KEY `fkcargo` (`efk_idcargo`),
  CONSTRAINT `fkcargo` FOREIGN KEY (`efk_idcargo`) REFERENCES `tcargos` (`eid_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `tpersonal` VALUES (1,"05547552-8","Maria Jose","Hernandez Alvarenga",12345678,"fernan@hotmil.com","San Vicente, Barrio El Santuario , casa 2","2000-08-04",1,2,1),
(4,"05547552-9","Walter Alexander","Carcamo Rivas",12345678,"walter_alx@hotmail.com","San Cayetano , San Vicente , El Salvador","2000-07-06",1,2,3),
(7,"12344555-5","Josue Benjamin","Hernandez Alfaro",12345678,"monterrosadelgado@gmail.com","San Rafael","2018-09-14",1,2,2),
(8,"05547552-7","Jessica Alexandra","Rosales RodrÃ­guez",12614143,"jess@hotmail.com","San Vicente,San eEsteban Catarina, BÂ° Concepcion, casa#2 ","2000-09-04",0,1,1),
(9,"12345678-9","Jessica Abigail","Rodriguez Rosales",12345678,"jessirosales2@gmail.com","San Vicente , Barrio El Calvario , casa 2","2000-09-05",1,1,3),
(10,"23432434-2","Fernando JosuÃ©","Hernandez Arevalo",71558042,"fer.aravalo1997@gmail.com","Barrio El santuario, 3ra. calle ote. Pasaje Zelaya, Casa #2","2000-10-01",1,2,3),
(11,"23434345-3","Kevin Alexander ","Jovel Arevalo",73232343,"kevinjovel9@gmail.com","Col Santa Fe San Sebastian","2000-01-13",1,2,3),
(12,"13612547-1","Flor de Maria","Rodriguez Martinez",72131654,"florcitademariarodriguez72@gmail.com","San Vicente","2000-10-02",1,1,1);


DROP TABLE IF EXISTS `tpersonal_materia`;

CREATE TABLE `tpersonal_materia` (
  `eid_pm` int(11) NOT NULL AUTO_INCREMENT,
  `efk_idpersonal` int(11) NOT NULL,
  `efk_idmateria` int(11) NOT NULL,
  PRIMARY KEY (`eid_pm`),
  KEY `fk_personal` (`efk_idpersonal`),
  KEY `fk_materia` (`efk_idmateria`),
  CONSTRAINT `fk_materia` FOREIGN KEY (`efk_idmateria`) REFERENCES `tmaterias` (`eid_materia`),
  CONSTRAINT `fk_personal` FOREIGN KEY (`efk_idpersonal`) REFERENCES `tpersonal` (`eid_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `tpersonal_materia` VALUES (1,11,1),
(2,11,2),
(3,9,3),
(4,9,4),
(5,11,5),
(6,10,6),
(7,11,7),
(8,9,8),
(9,10,9),
(10,11,10);


DROP TABLE IF EXISTS `tsecciones`;

CREATE TABLE `tsecciones` (
  `eid_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `cseccion` varchar(10) NOT NULL,
  PRIMARY KEY (`eid_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `tsecciones` VALUES (1,"A"),
(2,"B"),
(3,"C");


DROP TABLE IF EXISTS `ttipobachillerato`;

CREATE TABLE `ttipobachillerato` (
  `eid_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `ctipo` varchar(50) NOT NULL,
  PRIMARY KEY (`eid_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `ttipobachillerato` VALUES (1,"Tecnico"),
(2,"General");


DROP TABLE IF EXISTS `tusuarios`;

CREATE TABLE `tusuarios` (
  `eid_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cusuario` varchar(10) NOT NULL,
  `cpass` varchar(50) NOT NULL,
  `etipo` int(11) NOT NULL,
  `efk_personal` int(11) NOT NULL,
  PRIMARY KEY (`eid_usuario`),
  KEY `fkpersonal` (`efk_personal`),
  CONSTRAINT `fkpersonal` FOREIGN KEY (`efk_personal`) REFERENCES `tpersonal` (`eid_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO `tusuarios` VALUES (1,"Fernando97","ODFNakxnUjRiRThoc3Q0NE5vT2R6Zz09",0,1),
(2,"carcamo2","bnR6VzNoTkxhbnlsbzVHMEl1cCtRUT09",1,4),
(3,"fercho","RzNnUUUxLzRWYWpsMWt5clV0RVFwZz09",0,10),
(4,"benja","SE54M1dqeFZEWEUrT3JtSnVuYVJtdz09",1,7),
(13,"Florcita","dDJhSWVKMFJlcGhtMlFHc2RDdTBXUT09",1,12),
(14,"Kevin777","U0FkUnd2STl4ZjlCZFVqRWZGY28wUT09",0,11);


SET foreign_key_checks = 1;
