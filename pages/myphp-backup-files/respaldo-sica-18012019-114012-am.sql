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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

INSERT INTO `talum_mat_not` VALUES (1,1,1,1,1),
(2,1,3,2,1),
(3,1,5,3,1),
(4,1,7,4,1),
(5,1,9,5,1),
(6,2,1,6,1),
(7,2,3,7,1),
(8,2,5,8,1),
(9,2,7,9,1),
(10,2,9,10,1),
(11,3,1,11,1),
(12,3,3,12,1),
(13,3,5,13,1),
(14,3,7,14,1),
(15,3,9,15,1),
(16,4,1,16,1),
(17,4,3,17,1),
(18,4,5,18,1),
(19,4,7,19,1),
(20,4,9,20,1),
(21,5,1,21,1),
(22,5,3,22,1),
(23,5,5,23,1),
(24,5,7,24,1),
(25,5,9,25,1),
(26,6,1,26,1),
(27,6,3,27,1),
(28,6,5,28,1),
(29,6,7,29,1),
(30,6,9,30,1),
(31,7,1,31,1),
(32,7,3,32,1),
(33,7,5,33,1),
(34,7,7,34,1),
(35,7,9,35,1),
(36,8,1,36,1),
(37,8,3,37,1),
(38,8,5,38,1),
(39,8,7,39,1),
(40,8,9,40,1),
(41,9,2,41,1),
(42,9,4,42,1),
(43,9,6,43,1),
(44,9,8,44,1),
(45,9,10,45,1),
(46,10,2,46,1),
(47,10,4,47,1),
(48,10,6,48,1),
(49,10,8,49,1),
(50,10,10,50,1),
(51,11,2,51,1),
(52,11,4,52,1),
(53,11,6,53,1),
(54,11,8,54,1),
(55,11,10,55,1),
(56,12,2,56,1),
(57,12,4,57,1),
(58,12,6,58,1),
(59,12,8,59,1),
(60,12,10,60,1),
(61,13,2,61,1),
(62,13,4,62,1),
(63,13,6,63,1),
(64,13,8,64,1),
(65,13,10,65,1),
(66,14,2,66,1),
(67,14,4,67,1),
(68,14,6,68,1),
(69,14,8,69,1),
(70,14,10,70,1),
(71,15,2,71,1),
(72,15,4,72,1),
(73,15,6,73,1),
(74,15,8,74,1),
(75,15,10,75,1),
(76,16,1,76,1),
(77,16,3,77,1),
(78,16,5,78,1),
(79,16,7,79,1),
(80,16,9,80,1),
(81,17,1,81,1),
(82,17,3,82,1),
(83,17,5,83,1),
(84,17,7,84,1),
(85,17,9,85,1),
(86,18,1,86,1),
(87,18,3,87,1),
(88,18,5,88,1),
(89,18,7,89,1),
(90,18,9,90,1),
(91,19,2,91,1),
(92,19,4,92,1),
(93,19,6,93,1),
(94,19,8,94,1),
(95,19,10,95,1),
(96,20,2,96,1),
(97,20,4,97,1),
(98,20,6,98,1),
(99,20,8,99,1),
(100,20,10,100,1),
(101,21,11,101,1),
(102,21,12,102,1);


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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO `talumno` VALUES (1,0001,7283478,"Marcos Aurelio","Martinez Olivar",0,"Colonia la esperanza #23 San Vicente","San","1999-04-03","A",1,2017,"ninguna","penicilina",500,1,0,0,0,1,0,0,"Marcos alonso Martinez Melgar","AVON","32847473-9",23334343,23232423,78378487,"colo Santa maria #32 San Vicente","Matrimonio","MamÃ¡","Maria de los Angeles Olivar Villalta","","","32477827-4",23334322,"","",7,1,1),
(2,0002,2388829,"Antonio Evaristo","Carmona Menjivar",0,"Colonia brisas del Bosque, #23 San Vicente","San Vicente","1996-05-02","Autobus",1,2016,"ninguna","Acetaminofer",700,1,1,0,0,1,1,0,"","","","","","","","Matrimonio Religioso","MamÃ¡","Maria de la paza Mejivar Gonzales","Mercado Central","cosmetologa","21389724-9",23333432,23488387,"",4,1,1),
(3,0003,3247729,"Fernando Alberto","Perez Melgar",0,"Colonia Ivu #23, San Vicente","San Vicente","2000-06-02","A pie",1,2017,"","",70,1,1,0,0,1,1,0,"Marcos Vitelio Perez Olguera","Obrero","32840283-4",23334353,23234345,74673676,"COlonia Ivu #45 San Vicente","AcompaÃ±ados","MamÃ¡ y PapÃ¡","","","","","","","",0,1,1),
(4,0004,3247928,"Luisa Maria","Pereira Montano",1,"Barrio el Santuario, #43 San Vicente","San Vicente","1999-06-05","Autobus",1,2017,"","nada",600,1,0,0,0,1,0,1,"","","","","","","","Civil","Otro","Marcela Alejandra Moz","AVON","cosmetologa","78797978-9",22342342,"",73673676,7,1,1),
(5,0005,8329483,"Mabel Abigail","Rodriguez Alvarez",1,"Barrio el calvario #45 San Vicente","San Vicente","1999-06-05","Autobus",1,2017,"","Ibuprofeno, Bic",700,0,0,0,0,1,0,0,"Olga Maria Alvarez de Rodriguez","ILC","23924739-2",23243242,23234234,"","Barrio el Calvario #45 San Vicente","Matrimonio Religioso","MamÃ¡ y PapÃ¡","","","","","","","",0,0,1),
(6,0006,8787878,"stefany Marianela ","Flores Mejia",1,"Colonia melgar #21, Casa #54, Sinquera","CabaÃ±as","2004-06-05","Autobus",1,2017,"","",1700,1,0,1,0,1,1,1,"Alexander Olvidio Flores Guzman","","23849473-9",28398273,"","","colnia el amatillo #54, Sinquera, CabaÃ±as","Matrimonio Religioso","MamÃ¡ y PapÃ¡","Maria Antonieta Mejia Alvarado","","","23479473-9","","",78362767,8,1,1),
(7,0007,2347984,"Suyapa Del Carmen","Torrres Maradiaga",1,"Colonia el porvenir #75, Cojutepeque","Cuscatlan","2003-04-05","Autobus",1,2017,"ipertometrirtis","nada",5000,1,0,1,1,1,1,0,"","","","","","","","Separados","MamÃ¡","Sonia de la paz Maradiaga","pupuseria","pupusera","28340283-4",23234234,"","",5,1,1),
(8,0008,2663553,"Gerson Bladimir","Palacios Alvarado",0,"Colonia Monserrat, #266 Cojutepeque","CabaÃ±as","1998-08-07","Trans.Propio",1,2017,"ninguna","",300,1,1,0,1,1,1,0,"Mariana Alverto Palacios","BANCOVI","28349028-3","",21323423,"","Colonia Monserrat, #266 Cojutepeque","Matrimonio Religioso","MamÃ¡ y PapÃ¡","Sonia de la paz Alvarado","","","23494739-3",23324234,"","",5,1,1),
(9,0009,3793874,"Nayib Armando","Buckele",0,"Casa presidencial, San Salvador","San Salvador","2005-06-03","Trans.Propio",2,2017,"alzaimner","penicilina",1300,1,0,0,0,0,0,0,"Armando Bukele","Yamaha Motors","32874983-7",23324234,23234534,7378478,"colonia flor balanca, San Salvador","Matrimonio Religioso","MamÃ¡ y PapÃ¡","","","","","","","",4,0,1),
(10,0010,7897970,"Vanesa Abigail","Moran Velazques",1,"Barrio Concepcion, #66 San Vicente","San Vicente","2009-06-05","A pie",2,2017,"ninguna","ibprofeno",600,1,1,0,1,1,1,0,"Marlon Bladimir Moran valderrama","Impresa Repuestos","32747824-3",23423532,"","","Barrio Concepcion#66, San Vicente","Separados","PapÃ¡","","","","","","","",2,1,1),
(11,0011,8837728,"Oscar Bladimir","Melara Moz",0,"barrio la merced, #234 San Vicente,San Vicente","San Vicente","1995-05-04","Trans.Propio",2,2017,"asma","diclofenax",500,0,0,1,1,1,1,0,"Marlon Antonio Alfaro","Taller los cheros","23840283-4",23423423,23423423,"","","AcompaÃ±ados","MamÃ¡ y PapÃ¡","Gloria Asucena Moz","Sanchos","Mesera","38497247-8",22342342,23432523,"",4,1,1),
(12,0012,6635545,"Juan de Dios","Castillo Ramos",0,"Calle el pedregal, #89 Perulapia","CabaÃ±as","2000-06-05","Autobus",2,2017,"nada","nada",5000,1,1,1,0,1,1,1,"Marlon Adonay Castillo Orantes","--","32423479-2",23324342,"","","Calle al pedregar #45, Perulapia","Matrimonio Religioso","MamÃ¡ y PapÃ¡","","","","","","","",5,1,1),
(13,0013,3478247,"Julieta Emperatriz","Moran Beltran",1,"barrio el sabtuario, casa #4 San Vicente","San Vicente","2001-07-06","A pie",2,2017,"nada","",70,1,0,0,0,1,1,0,"","","","","","","","Matrimonio Religioso","MamÃ¡ y PapÃ¡","olga aureli Moran de Beltran","la finca","obrera","32477824-3",23423432,23324234,"",6,1,1),
(14,0014,3388828,"Jose Oscar","Martinez PeÃ±ate",0,"Barrio San Jose, #78 San Vicente","San Vicente","2000-08-05","Trans.Propio",2,2017,"","",600,1,0,0,0,1,1,0,"Jorge Alberto Martinez Cruz","tato system","32849284-3",23234234,23435353,74676377,"","Viudo/a","PapÃ¡","","","","","","","",2,1,1),
(15,0015,6644388,"Kevin Eduardo","Olivar Vasquez",0,"calle al tempisque #89, San Vicente","San Vicente","2001-06-05","Trans.Propio",2,2017,"ninguna","nada",600,0,1,0,0,1,1,1,"Oscar Adonay Olivar Melgar","","32493247-4","","",73874673,"","Matrimonio Religioso","MamÃ¡ y PapÃ¡","Marianela Elizableth Vasquez","","","23474739-3",22456524,"",73553553,4,1,1),
(16,0016,2636663,"Virna Osdalis","Alfaro Melgar",1,"calle la mascota, #89 San Miguel","San Miguel","2000-06-10","Trans.Propio",1,2017,"","",5000,1,1,0,0,1,1,1,"Marcos Anotnio Alfaro Melgar","Tadeo System","32478274-3",23324783,23334324,73636767,"","AcompaÃ±ados","MamÃ¡ y PapÃ¡","","","","","","","",0,1,1),
(17,0017,8776655,"Marco Antonio","Alfaro Rivas",0,"Calle miralballe, #45 pasaje 5 Santa Ana","Santa Ana","1999-08-05","Trans.Propio",1,2017,"nada","acetaminofen",7000,1,1,0,1,1,1,0,"Marcos Balmore Alfaro Monge","","89028490-8",23234234,28398924,72873987,"--","Civil","PapÃ¡","SIlvia de los angeles Rivas de ALfaro","","","23847924-9","","",73663762,7,1,1),
(18,0018,2636366,"Josselin Altagracia","Fernandez Barreto",1,"Barrio Candelaria #89, San Vicente","San Vicente","2001-06-05","Autobus",1,2017,"asma","Bic",700,0,1,0,1,1,1,0,"Oscar Alfredo Fernandez ortega","FINSEPROINSEPRO","72349799-8",23673275,23343423,78378439,"--","Civil","MamÃ¡ y PapÃ¡","Maria Concepcion Barreto de Ortega","","","23797349-2","","","",2,1,1),
(19,0019,7387827,"Oscar Virgilio","Salazar Hernandez",0,"Colonia los almendros, #65 Cojutepeque","Cuscatlan","2001-08-06","Autobus",2,2017,"artritis","aspirinas",3500,1,1,0,0,1,1,1,"Oscar adonay Salazar Urrutia","ILC","32840832-4","",23838838,"","","Matrimonio Religioso","MamÃ¡ y PapÃ¡","Josefina de la paz Hernandez de Zalalazr","","","72933483-4",22423423,"",78377476,6,1,1),
(20,0020,1128838,"Maira Berenice","Orantes Rosales",1,"colonia la flor #45, San vicente","San Vicente","2001-08-05","Autobus",2,2016,"ninguna","",4055,1,1,1,1,1,1,0,"Marlon Bladimir Orantes Rosales","--","34734792-7","","","","","Matrimonio Religioso","MamÃ¡ y PapÃ¡","Maria Concepcion","","","32840982-3",23243242,"",73664767,8,1,1),
(21,0021,"","Maria Antonieta","Lopz Lopez",1,"San Vicente, Barrio San Juan de Dios","San Vicente","2005-12-22","A pie",3,2017,"Ninguna","Ninguna",26,1,0,1,0,1,1,1,"Walter Lopez","Centro Judicial","05450010-1",27634632,23932210,76339087,"San vicente","AcompaÃ±ados","MamÃ¡","","","","","","","",3,1,1);


DROP TABLE IF EXISTS `tanio`;

CREATE TABLE `tanio` (
  `eid_anio` int(11) NOT NULL AUTO_INCREMENT,
  `canio` int(11) NOT NULL,
  `iestado` int(11) NOT NULL,
  `eclausura` int(11) NOT NULL,
  PRIMARY KEY (`eid_anio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tanio` VALUES (1,2018,0,1),
(2,2019,1,0);


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tbachilleratos` VALUES (1,"BAC177","Bachillerato General","Bachillerato orientado a la enseÃ±anza basica de educacion media",2,1),
(2,"ADM178","Administrativo contable","Carrera orientada a la contabilidad",1,1);


DROP TABLE IF EXISTS `tbitacora`;

CREATE TABLE `tbitacora` (
  `eid_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `efk_idusuario` int(11) NOT NULL,
  `dtfecha` datetime NOT NULL,
  `cdescripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`eid_bitacora`),
  KEY `efkusuario` (`efk_idusuario`),
  CONSTRAINT `efkusuario` FOREIGN KEY (`efk_idusuario`) REFERENCES `tusuarios` (`eid_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

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
(19,13,"2019-01-18 07:50:45","AperturÃ³ periodo de inscripcion"),
(20,13,"2019-01-18 07:59:30","Inscribio un nuevo alumno"),
(21,13,"2019-01-18 07:59:31","Inscribio un nuevo alumno"),
(22,13,"2019-01-18 07:59:31","Inscribio un nuevo alumno"),
(23,13,"2019-01-18 07:59:31","Inscribio un nuevo alumno"),
(24,13,"2019-01-18 07:59:32","Inscribio un nuevo alumno"),
(25,13,"2019-01-18 08:03:08","Se editÃ³ la inscripcion del alumno: "),
(26,13,"2019-01-18 08:05:55","Inscribio un nuevo alumno"),
(27,13,"2019-01-18 08:05:55","Inscribio un nuevo alumno"),
(28,13,"2019-01-18 08:05:55","Inscribio un nuevo alumno"),
(29,13,"2019-01-18 08:05:56","Inscribio un nuevo alumno"),
(30,13,"2019-01-18 08:05:56","Inscribio un nuevo alumno"),
(31,13,"2019-01-18 08:09:01","Inscribio un nuevo alumno"),
(32,13,"2019-01-18 08:09:01","Inscribio un nuevo alumno"),
(33,13,"2019-01-18 08:09:02","Inscribio un nuevo alumno"),
(34,13,"2019-01-18 08:09:02","Inscribio un nuevo alumno"),
(35,13,"2019-01-18 08:09:02","Inscribio un nuevo alumno"),
(36,13,"2019-01-18 08:12:57","CerrÃ³ la sesion"),
(37,14,"2019-01-18 08:13:04","IniciÃ³ sesion Docente "),
(38,14,"2019-01-18 08:15:56","Inscribio un nuevo alumno"),
(39,14,"2019-01-18 08:15:56","Inscribio un nuevo alumno"),
(40,14,"2019-01-18 08:15:57","Inscribio un nuevo alumno"),
(41,14,"2019-01-18 08:15:57","Inscribio un nuevo alumno"),
(42,14,"2019-01-18 08:15:57","Inscribio un nuevo alumno"),
(43,14,"2019-01-18 08:16:08","CerrÃ³ la sesion"),
(44,13,"2019-01-18 08:17:03","IniciÃ³ sesion Administrador"),
(45,13,"2019-01-18 08:23:57","CerrÃ³ la sesion"),
(46,13,"2019-01-18 08:25:18","IniciÃ³ sesion Administrador"),
(47,13,"2019-01-18 08:25:56","CerrÃ³ la sesion"),
(48,16,"2019-01-18 08:26:03","IniciÃ³ sesion Docente "),
(49,16,"2019-01-18 08:26:09","CerrÃ³ la sesion"),
(50,13,"2019-01-18 08:26:20","IniciÃ³ sesion Administrador"),
(51,13,"2019-01-18 08:26:37","BrindÃ³ permiso temporal a un usuario"),
(52,13,"2019-01-18 08:26:42","CerrÃ³ la sesion"),
(53,16,"2019-01-18 08:26:51","IniciÃ³ sesion Docente "),
(54,16,"2019-01-18 08:27:04","CerrÃ³ la sesion"),
(55,13,"2019-01-18 08:28:20","IniciÃ³ sesion Administrador"),
(56,13,"2019-01-18 08:33:39","Inscribio un nuevo alumno"),
(57,13,"2019-01-18 08:33:39","Inscribio un nuevo alumno"),
(58,13,"2019-01-18 08:33:39","Inscribio un nuevo alumno"),
(59,13,"2019-01-18 08:33:40","Inscribio un nuevo alumno"),
(60,13,"2019-01-18 08:33:40","Inscribio un nuevo alumno"),
(61,13,"2019-01-18 08:40:54","Inscribio un nuevo alumno"),
(62,13,"2019-01-18 08:40:54","Inscribio un nuevo alumno"),
(63,13,"2019-01-18 08:40:55","Inscribio un nuevo alumno"),
(64,13,"2019-01-18 08:40:55","Inscribio un nuevo alumno"),
(65,13,"2019-01-18 08:40:55","Inscribio un nuevo alumno"),
(66,13,"2019-01-18 08:45:00","Inscribio un nuevo alumno"),
(67,13,"2019-01-18 08:45:00","Inscribio un nuevo alumno"),
(68,13,"2019-01-18 08:45:01","Inscribio un nuevo alumno"),
(69,13,"2019-01-18 08:45:01","Inscribio un nuevo alumno"),
(70,13,"2019-01-18 08:45:01","Inscribio un nuevo alumno"),
(71,13,"2019-01-18 08:55:22","Inscribio un nuevo alumno"),
(72,13,"2019-01-18 08:55:22","Inscribio un nuevo alumno"),
(73,13,"2019-01-18 08:55:22","Inscribio un nuevo alumno"),
(74,13,"2019-01-18 08:55:22","Inscribio un nuevo alumno"),
(75,13,"2019-01-18 08:55:23","Inscribio un nuevo alumno"),
(76,13,"2019-01-18 08:59:03","Inscribio un nuevo alumno"),
(77,13,"2019-01-18 08:59:03","Inscribio un nuevo alumno"),
(78,13,"2019-01-18 08:59:03","Inscribio un nuevo alumno"),
(79,13,"2019-01-18 08:59:03","Inscribio un nuevo alumno"),
(80,13,"2019-01-18 08:59:04","Inscribio un nuevo alumno"),
(81,13,"2019-01-18 09:04:06","IniciÃ³ sesion Administrador"),
(82,13,"2019-01-18 09:07:46","Inscribio un nuevo alumno"),
(83,13,"2019-01-18 09:07:46","Inscribio un nuevo alumno"),
(84,13,"2019-01-18 09:07:46","Inscribio un nuevo alumno"),
(85,13,"2019-01-18 09:07:47","Inscribio un nuevo alumno"),
(86,13,"2019-01-18 09:07:47","Inscribio un nuevo alumno"),
(87,13,"2019-01-18 09:10:31","Inscribio un nuevo alumno"),
(88,13,"2019-01-18 09:10:31","Inscribio un nuevo alumno"),
(89,13,"2019-01-18 09:10:32","Inscribio un nuevo alumno"),
(90,13,"2019-01-18 09:10:32","Inscribio un nuevo alumno"),
(91,13,"2019-01-18 09:10:32","Inscribio un nuevo alumno"),
(92,13,"2019-01-18 09:16:49","Inscribio un nuevo alumno"),
(93,13,"2019-01-18 09:16:49","Inscribio un nuevo alumno"),
(94,13,"2019-01-18 09:16:50","Inscribio un nuevo alumno"),
(95,13,"2019-01-18 09:16:50","Inscribio un nuevo alumno"),
(96,13,"2019-01-18 09:16:51","Inscribio un nuevo alumno"),
(97,13,"2019-01-18 09:22:55","Inscribio un nuevo alumno"),
(98,13,"2019-01-18 09:22:55","Inscribio un nuevo alumno"),
(99,13,"2019-01-18 09:22:55","Inscribio un nuevo alumno"),
(100,13,"2019-01-18 09:22:56","Inscribio un nuevo alumno"),
(101,13,"2019-01-18 09:22:56","Inscribio un nuevo alumno"),
(102,13,"2019-01-18 09:29:39","Inscribio un nuevo alumno"),
(103,13,"2019-01-18 09:29:39","Inscribio un nuevo alumno"),
(104,13,"2019-01-18 09:29:39","Inscribio un nuevo alumno"),
(105,13,"2019-01-18 09:29:39","Inscribio un nuevo alumno"),
(106,13,"2019-01-18 09:29:40","Inscribio un nuevo alumno"),
(107,13,"2019-01-18 09:33:35","Inscribio un nuevo alumno"),
(108,13,"2019-01-18 09:33:35","Inscribio un nuevo alumno"),
(109,13,"2019-01-18 09:33:35","Inscribio un nuevo alumno"),
(110,13,"2019-01-18 09:33:36","Inscribio un nuevo alumno"),
(111,13,"2019-01-18 09:33:36","Inscribio un nuevo alumno"),
(112,13,"2019-01-18 09:48:30","Inscribio un nuevo alumno"),
(113,13,"2019-01-18 09:48:30","Inscribio un nuevo alumno"),
(114,13,"2019-01-18 09:48:30","Inscribio un nuevo alumno"),
(115,13,"2019-01-18 09:48:30","Inscribio un nuevo alumno"),
(116,13,"2019-01-18 09:48:30","Inscribio un nuevo alumno"),
(117,13,"2019-01-18 09:51:54","Inscribio un nuevo alumno"),
(118,13,"2019-01-18 09:51:54","Inscribio un nuevo alumno"),
(119,13,"2019-01-18 09:51:54","Inscribio un nuevo alumno"),
(120,13,"2019-01-18 09:51:54","Inscribio un nuevo alumno"),
(121,13,"2019-01-18 09:51:55","Inscribio un nuevo alumno"),
(122,13,"2019-01-18 09:55:34","Inscribio un nuevo alumno"),
(123,13,"2019-01-18 09:55:34","Inscribio un nuevo alumno"),
(124,13,"2019-01-18 09:55:34","Inscribio un nuevo alumno"),
(125,13,"2019-01-18 09:55:34","Inscribio un nuevo alumno"),
(126,13,"2019-01-18 09:55:35","Inscribio un nuevo alumno"),
(127,13,"2019-01-18 10:01:57","Inscribio un nuevo alumno"),
(128,13,"2019-01-18 10:01:57","Inscribio un nuevo alumno"),
(129,13,"2019-01-18 10:01:57","Inscribio un nuevo alumno"),
(130,13,"2019-01-18 10:01:57","Inscribio un nuevo alumno"),
(131,13,"2019-01-18 10:01:58","Inscribio un nuevo alumno"),
(132,13,"2019-01-18 10:05:15","Inscribio un nuevo alumno"),
(133,13,"2019-01-18 10:05:15","Inscribio un nuevo alumno"),
(134,13,"2019-01-18 10:05:15","Inscribio un nuevo alumno"),
(135,13,"2019-01-18 10:05:15","Inscribio un nuevo alumno"),
(136,13,"2019-01-18 10:05:15","Inscribio un nuevo alumno"),
(137,13,"2019-01-18 10:07:50","CerrÃ³ periodo de inscripcion"),
(138,13,"2019-01-18 10:08:16","CerrÃ³ la sesion"),
(139,14,"2019-01-18 10:08:32","IniciÃ³ sesion Docente "),
(140,14,"2019-01-18 10:09:15","CerrÃ³ la sesion"),
(141,13,"2019-01-18 10:48:08","IniciÃ³ sesion Administrador"),
(142,14,"2019-01-18 10:48:38","IniciÃ³ sesion Docente "),
(143,13,"2019-01-18 10:50:40","RegistrÃ³ un nuevo bachillerato"),
(144,13,"2019-01-18 10:52:04","RegistrÃ³ una nueva Opcion de Bachillerato"),
(145,13,"2019-01-18 10:54:52","Inserto un nuevo horario"),
(146,14,"2019-01-18 11:03:54","CerrÃ³ la sesion"),
(147,17,"2019-01-18 11:04:05","IniciÃ³ sesion Docente "),
(148,13,"2019-01-18 11:07:00","RegistrÃ³ una nueva materia"),
(149,13,"2019-01-18 11:07:54","RegistrÃ³ una nueva materia"),
(150,13,"2019-01-18 11:11:06","BrindÃ³ permiso temporal a un usuario"),
(151,17,"2019-01-18 11:11:44","CerrÃ³ la sesion"),
(152,13,"2019-01-18 11:11:50","ModificÃ³ un permiso temporal"),
(153,14,"2019-01-18 11:12:22","IniciÃ³ sesion Docente "),
(154,13,"2019-01-18 11:12:38","ModificÃ³ un permiso temporal"),
(155,14,"2019-01-18 11:12:58","CerrÃ³ la sesion"),
(156,14,"2019-01-18 11:13:09","IniciÃ³ sesion Docente "),
(157,14,"2019-01-18 11:14:25","CerrÃ³ la sesion"),
(158,17,"2019-01-18 11:14:35","IniciÃ³ sesion Docente "),
(159,13,"2019-01-18 11:15:18","AperturÃ³ periodo de inscripcion"),
(160,13,"2019-01-18 11:21:03","Inscribio un nuevo alumno"),
(161,13,"2019-01-18 11:21:03","Inscribio un nuevo alumno"),
(162,13,"2019-01-18 11:33:00","AperturÃ³ periodo"),
(163,13,"2019-01-18 11:37:51","AperturÃ³ periodo");


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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `thorarios` VALUES (1,"Lunes y Martes","7:00 AM - 10:00 AM",1),
(2,"Martes y Miercoles","10:00 AM - 12:00 PM",1),
(3,"Miercoles y Viernes","03:00 PM - 05:00 PM",1),
(4,"Jueves y Jueves","01:00 PM - 03:00 PM",0),
(5,"Martes y Miercoles","01:00 PM - 03:00 PM",1),
(6,"Jueves y Viernes","03:00 PM - 05:00 PM",1),
(7,"Martes y Jueves","7:00 AM - 10:00 AM",1),
(8,"Martes y Jueves","10:00 AM - 12:00 PM",1),
(9,"Martes y Jueves","01:00 PM - 03:00 PM",1),
(10,"Martes y Jueves","03:00 PM - 05:00 PM",1),
(11,"Lunes y Martes","03:00 PM - 05:00 PM",1);


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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `tmaterias` VALUES (1,001,"Matematicas","Materia de enseÃ±anza de las matematicas basicas",1,2,1,1),
(2,002,"Matematica","Matematica orientada ala enseÃ±anza de integrales y funciones",2,5,1,1),
(3,002,"Sociales","Materia que muestra la sociedad humana en El Salvador",1,3,1,1),
(4,003,"Sociales","Materia orientada a la enseÃ±anza de la sociedad en la actualidad",2,6,1,1),
(5,005,"Introduccion a la Economia","materia orientda a la comprencion de la economia como ciencia",1,6,1,1),
(6,005,"Economia aplicada I","Materia orientada a la elaboracion de hipotesis sobre economia y negocios",2,2,1,1),
(7,007,"Lenguaje I","Materia orientada a la enseÃ±annza de la lengua natal",1,7,1,1),
(8,007,"Ingles I","Materia orientda a la enseÃ±anza de la lengua predominante en el mundo",2,9,1,1),
(9,007,"Ciencias Naturales","Materia orientada a la enseÃ±anza de las ciencias naturales en el mundo, flora y fauna",1,10,1,1),
(10,009,"Solidos I","Materia orientada mediante leguaje aplicado para solucion de problemas mediante graficas en 3D",2,8,1,1),
(11,011,"DiseÃ±o de Sistemas II","Esta materia es bonita ",3,6,1,1),
(12,011,"Matematicas II","Aca se da algebra",3,2,1,1);


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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

INSERT INTO `tnotas` VALUES (1,"7.25",8,"9.45",0,"8.23",7,2,8,7,6,0,0,0,0,0,0,0,0,0,0),
(2,10,10,10,0,10,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(3,1,2,3,10,4,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(4,"9.9",10,8,0,"9.3",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(5,"4.4","6.6","8.9",0,"6.63",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(6,"6.7","8.56","9.9",0,"8.39",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(7,"1.5","0.33",5,4,"2.71",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(8,"4.4",10,5,0,"6.47",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(9,6,"6.78",4,9,"6.45",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(10,"1.1","2.5",8,10,"5.4",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(11,9,10,8,0,9,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(12,"7.9",8,5,0,"6.97",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(13,"4.4",10,10,0,"8.13",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(14,10,2,9,0,7,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(15,10,9,"4.4",0,"7.8",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(16,"3.45","3.9",7,10,"6.09",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(17,"9.95",4,"8.44",0,"7.46",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(18,"1.1","4.5",9,10,"6.15",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(19,"9.9",10,7,0,"8.97",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(20,"1.1","2.2","4.4",10,"4.43",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(21,7,"2.3","6.95",8,"6.06",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(22,9,9,9,0,9,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(23,10,10,9,0,"9.67",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(24,"4.4",8,9,0,"7.13",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(25,"1.1","9.97","1.1",10,"5.54",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(26,"5.45",8,"9.9",0,"7.78",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(27,"4.5","5.6",9,0,"6.37",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(28,"9.9",8,8,0,"8.63",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(29,"9.9",4,4,10,"6.97",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(30,"9.9",10,1,0,"6.97",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(31,"4.6","1.1",9,10,"6.17",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(32,"2.44","6.9",10,0,"6.45",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(33,"2.3","6.6",1,4,"3.47",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(34,"1.44","5.55","7.9",7,"5.47",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(35,"1.1","2.2","4.5",10,"4.45",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(36,"4.1","2.45","3.1",10,"4.91",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(37,"9.9","4.5","7.4",0,"7.27",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(38,"2.2",1,0,6,"2.3",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(39,"8.8","9.9",1,0,"6.57",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(40,"8.1","9.9",10,0,"9.33",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(41,10,10,10,0,10,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(42,10,10,10,0,10,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(43,"7.7","4.4","6.6",0,"6.23",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(44,10,10,"9.9",0,"9.97",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(45,"9.9",8,10,0,"9.3",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(46,"0.55","4.5","9.9",10,"6.24",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(47,9,"1.55",6,9,"6.39",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(48,"7.7","3.3","1.1",10,"5.53",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(49,"5.5","5.6",9,0,"6.7",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(50,"2.2","4.4","3.3",10,"4.97",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(51,"1.1","2.2","9.9",10,"5.8",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(52,"9.9",6,"9.9",0,"8.6",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(53,"8.8","8.8",9,0,"8.87",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(54,10,9,3,0,"7.33",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(55,"1.1","4.4","6.6",10,"5.53",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(56,10,10,"2.44",0,"7.48",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(57,"1.1","5.5","9.9",10,"6.63",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(58,"7.7","8.8",1,0,"5.83",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(59,"7.7","7.7",6,0,"7.13",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(60,"1.1","4.4",5,9,"4.88",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(61,"9.2","1.1","9.4",0,"6.57",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(62,"1.1",2,4,10,"4.28",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(63,"1.1","8.5","6.5",10,"6.53",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(64,"6.6",10,"3.3",0,"6.63",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(65,"9.9","1.1",5,8,6,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(66,"9.9","1.1","2.2",10,"5.8",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(67,"9.9","2.2","5.5",8,"6.4",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(68,"1.1","2.2","4.4",1,"2.18",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(69,"5.5","6.6","7.7",0,"6.6",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(70,10,4,1,"8.94","5.98",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(71,"2.2",10,9,0,"7.07",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(72,"9.9","7.7","9.9",0,"9.17",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(73,"6.6","1.1","8.8",8,"6.13",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(74,"1.1","5.5",10,10,"6.65",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(75,"4.4",10,1,9,"6.1",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(76,"6.6","6.6","9.9",0,"7.7",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(77,"6.6",9,6,0,"7.2",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(78,"3.43",6,9,0,"6.14",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(79,1,"1.3","1.5",10,"3.45",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(80,"9.9","1.1","9.9",0,"6.97",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(81,"2.5",9,9,0,"6.83",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(82,"1.1","3.3",5,10,"4.85",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(83,"1.2","5.5","6.6",10,"5.83",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(84,9,9,"9.99",0,"9.33",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(85,8,8,9,0,"8.33",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(86,"3.3","5.5","1.1",10,"4.97",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(87,"1.1","3.2","7.8",9,"5.28",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(88,"1.1","2.2","4.4",10,"4.43",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(89,"3.2",9,10,0,"7.4",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(90,4,6,9,0,"6.33",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(91,"4.4",9,9,0,"7.47",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(92,"4.4","5.5","6.6",10,"6.63",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(93,"2.2",9,1,10,"5.55",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(94,"8.8",4,9,0,"7.27",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(95,"5.5","6.6",2,10,"6.03",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(96,"5.5","9.9",9,0,"8.13",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(97,2,3,5,9,"4.75",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(98,10,2,10,0,"7.33",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(99,"9.9","3.3","5.5",0,"6.23",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(100,"5.5",1,2,0,"2.83",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(101,7,6,2,9,6,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
(102,8,7,"9.5",0,"8.17",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);


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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `topciones` VALUES (1,39,1,1,1,1,11,1),
(2,41,1,2,1,1,9,1),
(3,19,2,1,1,1,1,1);


DROP TABLE IF EXISTS `tperiodos`;

CREATE TABLE `tperiodos` (
  `eid_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `enum` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`eid_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `tperiodos` VALUES (1,1,0),
(2,2,0),
(3,3,0),
(4,4,1);


DROP TABLE IF EXISTS `tpermisos`;

CREATE TABLE `tpermisos` (
  `eid_permisos` int(11) NOT NULL AUTO_INCREMENT,
  `ep_inscripciones` int(11) NOT NULL,
  `ep_estadisticas` int(11) NOT NULL,
  `efk_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`eid_permisos`),
  KEY `fkusuario` (`efk_idusuario`),
  CONSTRAINT `fkusuario` FOREIGN KEY (`efk_idusuario`) REFERENCES `tusuarios` (`eid_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `tpermisos` VALUES (1,1,1,14),
(2,0,1,1),
(3,1,0,16),
(4,1,1,17);


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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `tpersonal` VALUES (1,"05547552-8","Maria Jose","Hernandez Alvarenga",12345678,"fernan@hotmil.com","San Vicente, Barrio El Santuario , casa 2","2000-08-04",1,2,1),
(4,"05547552-9","Walter Alexander","Carcamo Rivas",12345678,"walter_alx@hotmail.com","San Cayetano , San Vicente , El Salvador","2000-07-06",1,2,3),
(7,"12344555-5","Josue Benjamin","Hernandez Alfaro",12345678,"monterrosadelgado@gmail.com","San Rafael","2018-09-14",1,2,2),
(8,"05547552-7","Jessica Alexandra","Rosales RodrÃ­guez",12614143,"jess@hotmail.com","San Vicente,San eEsteban Catarina, BÂ° Concepcion, casa#2 ","2000-09-04",0,1,1),
(9,"12345678-9","Jessica Abigail","Rodriguez Rosales",12345678,"jessirosales2@gmail.com","San Vicente , Barrio El Calvario , casa 2","2000-09-05",1,1,3),
(10,"23432434-2","Fernando JosuÃ©","Hernandez Arevalo",71558042,"fer.aravalo1997@gmail.com","Barrio El santuario, 3ra. calle ote. Pasaje Zelaya, Casa #2","2000-10-01",1,2,3),
(11,"23434345-3","Kevin Alexander ","Jovel Arevalo",73232343,"kevinjovel9@gmail.com","Col Santa Fe San Sebastian","2000-01-13",1,2,3),
(12,"13612547-1","Flor de Maria","Rodriguez Martinez",72131654,"florcitademariarodriguez72@gmail.com","San Vicente","2000-10-02",1,1,1),
(13,"05540789-5","Luis Antonio","Rosales PeÃ±ate",23937308,"luisitopenate@gmail.com","San Vicente, Barrio Santuario casa #2","2001-01-10",1,2,3);


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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO `tpersonal_materia` VALUES (1,11,1),
(2,11,2),
(3,9,3),
(4,9,4),
(5,11,5),
(6,10,6),
(7,11,7),
(8,9,8),
(9,10,9),
(10,11,10),
(11,13,11),
(12,13,12);


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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `tusuarios` VALUES (1,"Fernando97","ODFNakxnUjRiRThoc3Q0NE5vT2R6Zz09",0,1),
(2,"carcamo2","bnR6VzNoTkxhbnlsbzVHMEl1cCtRUT09",1,4),
(3,"fercho","RzNnUUUxLzRWYWpsMWt5clV0RVFwZz09",0,10),
(4,"benja","SE54M1dqeFZEWEUrT3JtSnVuYVJtdz09",1,7),
(13,"Florcita","dDJhSWVKMFJlcGhtMlFHc2RDdTBXUT09",1,12),
(14,"Kevin777","U0FkUnd2STl4ZjlCZFVqRWZGY28wUT09",0,11),
(16,"jess55","YVBpbDdxb3dYSHp5RWRDS01KNTk2QT09",0,9),
(17,"luisito5","amhEcW1TdnY2TEpCZitIZVZtUlFlZz09",0,13);


SET foreign_key_checks = 1;
