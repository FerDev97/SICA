-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: sica
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.34-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `talum_mat_not`
--

DROP TABLE IF EXISTS `talum_mat_not`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `talum_mat_not` (
  `id_amn` int(11) NOT NULL AUTO_INCREMENT,
  `efk_idalumno` int(11) NOT NULL,
  `efk_idmateria` int(11) NOT NULL,
  `efk_idnota` int(11) NOT NULL,
  PRIMARY KEY (`id_amn`),
  KEY `fkalumno` (`efk_idalumno`),
  KEY `fkmaetria` (`efk_idmateria`),
  KEY `fknota` (`efk_idnota`),
  CONSTRAINT `fkalumno` FOREIGN KEY (`efk_idalumno`) REFERENCES `talumno` (`eid_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fkmaetria` FOREIGN KEY (`efk_idmateria`) REFERENCES `tmaterias` (`eid_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fknota` FOREIGN KEY (`efk_idnota`) REFERENCES `tnotas` (`eid_notas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talum_mat_not`
--

LOCK TABLES `talum_mat_not` WRITE;
/*!40000 ALTER TABLE `talum_mat_not` DISABLE KEYS */;
INSERT INTO `talum_mat_not` VALUES (1,1,8,1);
/*!40000 ALTER TABLE `talum_mat_not` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talumno`
--

DROP TABLE IF EXISTS `talumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `talumno` (
  `eid_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `ccodigo` varchar(6) NOT NULL,
  `cnie` varchar(15) NOT NULL,
  `cnombre` varchar(100) NOT NULL,
  `capellido` varchar(50) NOT NULL,
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
  KEY `fkanio` (`anio`),
  CONSTRAINT `fkanio` FOREIGN KEY (`anio`) REFERENCES `tanio` (`eid_anio`),
  CONSTRAINT `fkop` FOREIGN KEY (`cbachillerato`) REFERENCES `topciones` (`eid_opcion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talumno`
--

LOCK TABLES `talumno` WRITE;
/*!40000 ALTER TABLE `talumno` DISABLE KEYS */;
INSERT INTO `talumno` VALUES (1,'001','1209348765','Jessica Abigail','Rosales Rodriguez','San Esteban Catarina , Barrio Concepción , casa #2','San Vicente','2010-02-03','1',1,'noveno','ninguno','ninguno','10',1,0,1,0,1,1,1,'Jose Rosales','Campo','129876534','23456789','','76542398','San Esteban Catarina Barrio Concepcion','1','3','Flor Rodriguez','ninguno','ama de casa','12345678-0','23456789','','76543526',2,1,1),(2,'002','1626514256','Fernando Josue','Hernandez Arevalo','San Vicente , barrio el santuario , casa #2','San Vicente','2010-12-10','1',1,'primero general','asma','penicilina','5',0,0,1,1,1,1,1,'Jose Hernandez','DELSUR','12345687-0','23765245','23987615','76524315','San Vicente, frente barrio el santuario','2','3','Maria Arevalo','ninguno','ama de casa','12618623-9','23934567','','76543142',3,1,1),(4,'004','3621541431','Walter Alexander ','Fernandez Carcamo','San Vicente , San Cayetano ','San Vicente','2009-06-16','3',5,'primero general','bronquitis','ninguno','20',0,0,0,1,1,0,0,'Walter Elias Fernandez','Alcaldia San Vicente','09237732-9','23746356','23981263','76142431','San Cayetano , San Vicente','2','1','Luz Marina Carcamo','Ues','','08127656-1','23816257','23816875','74176571',2,1,1);
/*!40000 ALTER TABLE `talumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talumno_responsable`
--

DROP TABLE IF EXISTS `talumno_responsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `talumno_responsable` (
  `id_ar` int(11) NOT NULL AUTO_INCREMENT,
  `efk_alumno` int(11) NOT NULL,
  `efk_responsable` int(11) NOT NULL,
  PRIMARY KEY (`id_ar`),
  KEY `fkalumnos` (`efk_alumno`),
  KEY `fkresponsable` (`efk_responsable`),
  CONSTRAINT `fkalumnos` FOREIGN KEY (`efk_alumno`) REFERENCES `talumno` (`eid_alumno`),
  CONSTRAINT `fkresponsable` FOREIGN KEY (`efk_responsable`) REFERENCES `tresponsable` (`eid_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talumno_responsable`
--

LOCK TABLES `talumno_responsable` WRITE;
/*!40000 ALTER TABLE `talumno_responsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `talumno_responsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tanio`
--

DROP TABLE IF EXISTS `tanio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tanio` (
  `eid_anio` int(11) NOT NULL AUTO_INCREMENT,
  `canio` int(11) NOT NULL,
  `iestado` int(11) NOT NULL,
  `eclausura` int(11) NOT NULL,
  PRIMARY KEY (`eid_anio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanio`
--

LOCK TABLES `tanio` WRITE;
/*!40000 ALTER TABLE `tanio` DISABLE KEYS */;
INSERT INTO `tanio` VALUES (1,2018,0,0),(3,2017,1,0);
/*!40000 ALTER TABLE `tanio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbachilleratos`
--

DROP TABLE IF EXISTS `tbachilleratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbachilleratos`
--

LOCK TABLES `tbachilleratos` WRITE;
/*!40000 ALTER TABLE `tbachilleratos` DISABLE KEYS */;
INSERT INTO `tbachilleratos` VALUES (1,'001','Contador','Bachillerato orientado a la contabilidad financier aplicada',1,1),(3,'BG89','Bachillerato General','Bachillerato orientado a las generalidadesbasicas que todo bachillere debe poseer',2,0),(7,'BS273','Bachillerato en Salud','Bachillerato orientado a la salud',1,1),(8,'BE-988','Bachillerato en Electricidad','Bachillerato con enfasisi en electrinica digital',1,0);
/*!40000 ALTER TABLE `tbachilleratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbitacora`
--

DROP TABLE IF EXISTS `tbitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbitacora` (
  `eid_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `efk_idusuario` int(11) NOT NULL,
  `dtfecha` datetime NOT NULL,
  `cdescripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`eid_bitacora`),
  KEY `efkusuario` (`efk_idusuario`),
  CONSTRAINT `efkusuario` FOREIGN KEY (`efk_idusuario`) REFERENCES `tusuarios` (`eid_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbitacora`
--

LOCK TABLES `tbitacora` WRITE;
/*!40000 ALTER TABLE `tbitacora` DISABLE KEYS */;
INSERT INTO `tbitacora` VALUES (1,13,'2018-11-26 14:10:17','IniciÃ³ sesion Administrador'),(2,13,'2018-11-26 19:18:41','IniciÃ³ sesion Administrador'),(3,13,'2018-11-27 09:40:47','IniciÃ³ sesion Administrador'),(4,13,'2018-11-27 14:16:44','IniciÃ³ sesion Administrador'),(5,13,'2018-11-27 17:27:07','IniciÃ³ sesion Administrador'),(6,5,'2018-11-27 22:33:50','IniciÃ³ sesion Docente '),(7,13,'2018-11-27 22:34:04','IniciÃ³ sesion Administrador'),(8,13,'2018-11-28 08:33:14','IniciÃ³ sesion Administrador'),(9,13,'2018-11-28 13:16:13','Inscribio un nuevo alumno'),(10,13,'2018-11-28 16:30:32','Inscribio un nuevo alumno'),(11,13,'2018-11-28 16:43:01','RegistrÃ³ una nueva Opcion de Bachillerato'),(12,13,'2018-11-28 16:43:27','RegistrÃ³ una nueva Opcion de Bachillerato'),(13,13,'2018-11-28 16:43:35','RegistrÃ³ una nueva Opcion de Bachillerato'),(14,13,'2018-11-28 16:43:43','RegistrÃ³ una nueva Opcion de Bachillerato'),(15,13,'2018-11-28 18:47:21','Inscribio un nuevo alumno'),(16,13,'2018-11-28 19:05:59','Inscribio un nuevo alumno'),(17,13,'2018-11-28 22:21:50','IniciÃ³ sesion Administrador'),(18,13,'2018-11-28 22:31:02','Inscribio un nuevo alumno'),(19,13,'2018-11-28 22:38:52','Inscribio un nuevo alumno'),(20,13,'2018-11-28 22:54:23','Inscribio un nuevo alumno'),(21,13,'2018-11-28 23:02:15','Inscribio un nuevo alumno'),(22,13,'2018-11-28 23:06:04','Inscribio un nuevo alumno'),(23,13,'2018-11-28 23:55:33','IniciÃ³ sesion Administrador'),(24,13,'2018-11-29 00:49:32','Se editÃ³ la inscripcion del alumno: 006'),(25,13,'2018-11-29 00:52:33','Se editÃ³ la inscripcion del alumno: 006'),(26,13,'2018-11-29 00:52:33','Se editÃ³ la inscripcion del alumno: 006'),(27,13,'2018-11-29 00:53:25','Se editÃ³ la inscripcion del alumno: 006'),(28,13,'2018-11-29 00:56:30','Se editÃ³ la inscripcion del alumno: 006'),(29,13,'2018-11-29 00:57:15','Se editÃ³ la inscripcion del alumno: 006'),(30,13,'2018-11-29 01:03:58','Se editÃ³ la inscripcion del alumno: 006'),(31,13,'2018-11-29 01:04:29','Se editÃ³ la inscripcion del alumno: 006'),(32,13,'2018-11-29 01:06:04','Se editÃ³ la inscripcion del alumno: 006'),(33,13,'2018-11-29 01:07:09','Se editÃ³ la inscripcion del alumno: 006'),(34,13,'2018-11-29 01:08:01','Se editÃ³ la inscripcion del alumno: 006'),(35,13,'2018-11-29 01:17:03','Se editÃ³ la inscripcion del alumno: 006'),(36,13,'2018-11-29 01:17:34','Se editÃ³ la inscripcion del alumno: 006'),(37,13,'2018-11-29 01:18:02','Se editÃ³ la inscripcion del alumno: 006'),(38,13,'2018-11-29 01:18:39','Se editÃ³ la inscripcion del alumno: 006'),(39,13,'2018-11-29 01:19:06','Se editÃ³ la inscripcion del alumno: 006'),(40,13,'2018-11-29 02:51:01','Se editÃ³ la inscripcion del alumno: 006'),(41,13,'2018-11-29 02:54:19','Se editÃ³ la inscripcion del alumno: 006'),(42,13,'2018-12-30 10:12:45','IniciÃ³ sesion Administrador'),(43,13,'2018-12-30 14:27:04','Inserto un nuevo horario'),(44,13,'2018-12-30 14:27:43','Inserto un nuevo horario'),(45,13,'2018-12-30 14:28:12','Inserto un nuevo horario'),(46,13,'2019-01-03 10:00:53','IniciÃ³ sesion Administrador'),(47,13,'2019-01-03 10:42:10','Inserto un nuevo horario'),(48,13,'2019-01-03 11:36:40','CerrÃ³ la sesion'),(49,13,'2019-01-03 11:36:58','IniciÃ³ sesion Administrador'),(50,13,'2019-01-03 15:04:49','Inserto un nuevo horario'),(51,13,'2019-01-03 17:43:56','IniciÃ³ sesion Administrador'),(52,13,'2019-01-06 16:51:04','IniciÃ³ sesion Administrador'),(53,13,'2019-01-06 20:36:21','IniciÃ³ sesion Administrador'),(54,13,'2019-01-07 00:03:47','Activo un usuario con el personal asociado'),(55,13,'2019-01-07 11:21:39','IniciÃ³ sesion Administrador'),(56,13,'2019-01-07 11:49:50','Activo un usuario con el personal asociado'),(57,13,'2019-01-08 10:46:02','IniciÃ³ sesion Administrador'),(58,13,'2019-01-08 14:12:52','Se editÃ³ la inscripcion del alumno: '),(59,13,'2019-01-10 10:58:59','IniciÃ³ sesion Administrador'),(60,13,'2019-01-11 00:22:16','IniciÃ³ sesion Administrador'),(61,13,'2019-01-11 00:52:56','CerrÃ³ la sesion'),(62,2,'2019-01-11 00:53:13','IniciÃ³ sesion Docente '),(63,2,'2019-01-11 10:36:51','IniciÃ³ sesion Docente '),(64,2,'2019-01-11 22:59:46','CerrÃ³ la sesion'),(65,13,'2019-01-11 23:00:01','IniciÃ³ sesion Administrador'),(66,13,'2019-01-11 23:39:44','CerrÃ³ la sesion'),(67,2,'2019-01-11 23:40:03','IniciÃ³ sesion Docente '),(68,2,'2019-01-12 10:21:39','IniciÃ³ sesion Docente '),(69,2,'2019-01-13 09:53:16','IniciÃ³ sesion Docente ');
/*!40000 ALTER TABLE `tbitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tcargos`
--

DROP TABLE IF EXISTS `tcargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tcargos` (
  `eid_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `ccargo` varchar(50) NOT NULL,
  PRIMARY KEY (`eid_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tcargos`
--

LOCK TABLES `tcargos` WRITE;
/*!40000 ALTER TABLE `tcargos` DISABLE KEYS */;
INSERT INTO `tcargos` VALUES (1,'Secretaria'),(2,'Director'),(3,'Docente'),(4,'Subdirectora'),(5,'Ordenanza');
/*!40000 ALTER TABLE `tcargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tdatos_adicionales`
--

DROP TABLE IF EXISTS `tdatos_adicionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tdatos_adicionales` (
  `eid_datosadicionales` int(11) NOT NULL AUTO_INCREMENT,
  `bfoto_alumno` mediumblob NOT NULL,
  `bfoto_partida` mediumblob NOT NULL,
  `bfoto_bautismo` mediumblob NOT NULL,
  `bfoto_comunion` mediumblob NOT NULL,
  `efk_ficha` int(11) NOT NULL,
  PRIMARY KEY (`eid_datosadicionales`),
  KEY `fkfichadatos` (`efk_ficha`),
  CONSTRAINT `fkfichadatos` FOREIGN KEY (`efk_ficha`) REFERENCES `tficha` (`eid_ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tdatos_adicionales`
--

LOCK TABLES `tdatos_adicionales` WRITE;
/*!40000 ALTER TABLE `tdatos_adicionales` DISABLE KEYS */;
/*!40000 ALTER TABLE `tdatos_adicionales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tficha`
--

DROP TABLE IF EXISTS `tficha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tficha` (
  `eid_ficha` int(11) NOT NULL AUTO_INCREMENT,
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
  `efk_opcion` int(11) NOT NULL,
  PRIMARY KEY (`eid_ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tficha`
--

LOCK TABLES `tficha` WRITE;
/*!40000 ALTER TABLE `tficha` DISABLE KEYS */;
/*!40000 ALTER TABLE `tficha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tgrado`
--

DROP TABLE IF EXISTS `tgrado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tgrado` (
  `eid_grado` int(11) NOT NULL AUTO_INCREMENT,
  `cgrado` int(11) NOT NULL,
  PRIMARY KEY (`eid_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tgrado`
--

LOCK TABLES `tgrado` WRITE;
/*!40000 ALTER TABLE `tgrado` DISABLE KEYS */;
INSERT INTO `tgrado` VALUES (1,1),(2,2),(5,3);
/*!40000 ALTER TABLE `tgrado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thorarios`
--

DROP TABLE IF EXISTS `thorarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thorarios` (
  `eid_horario` int(11) NOT NULL AUTO_INCREMENT,
  `cdia` varchar(20) NOT NULL,
  `chora` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`eid_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thorarios`
--

LOCK TABLES `thorarios` WRITE;
/*!40000 ALTER TABLE `thorarios` DISABLE KEYS */;
INSERT INTO `thorarios` VALUES (1,'Lunes y Martes','7:00 AM - 10:00 AM',1),(2,'Martes y Miercoles','10:00 AM - 12:00 PM',1),(5,'Martes y Miercoles','01:00 PM - 03:00 PM',1),(6,'Jueves y Viernes','03:00 PM - 05:00 PM',1),(10,'Lunes y Martes','10:00 AM - 12:00 PM',0),(11,'Lunes y Martes','01:00 PM - 03:00 PM',0);
/*!40000 ALTER TABLE `thorarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmaterias`
--

DROP TABLE IF EXISTS `tmaterias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmaterias` (
  `eid_materia` int(11) NOT NULL AUTO_INCREMENT,
  `ccodigo` varchar(10) NOT NULL,
  `cnombre` varchar(30) NOT NULL,
  `cdescripcion` varchar(200) NOT NULL,
  `efk_idopcion` int(11) NOT NULL,
  `efk_idhorario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`eid_materia`),
  KEY `fkopcion` (`efk_idopcion`),
  KEY `fkhorario_idx` (`efk_idhorario`),
  CONSTRAINT `fkhorario` FOREIGN KEY (`efk_idhorario`) REFERENCES `thorarios` (`eid_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkopcion` FOREIGN KEY (`efk_idopcion`) REFERENCES `topciones` (`eid_opcion`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmaterias`
--

LOCK TABLES `tmaterias` WRITE;
/*!40000 ALTER TABLE `tmaterias` DISABLE KEYS */;
INSERT INTO `tmaterias` VALUES (1,'001','Matematicas','Esta es una materia llena de numeros.',1,6,1),(8,'002','Lenguaje y Literatura','Esta es una materia sobre lectura.',1,2,1),(9,'009','Sociales','Historia de el salvador',2,1,1),(10,'010','Manejo Softwar','Aqui se usa word.',2,2,1),(11,'011','Turismo','fotografia',1,5,1),(12,'011','Ingles','segundo idioma',2,5,1);
/*!40000 ALTER TABLE `tmaterias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tnotas`
--

DROP TABLE IF EXISTS `tnotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tnotas` (
  `eid_notas` int(11) NOT NULL AUTO_INCREMENT,
  `dnota1` double NOT NULL,
  `dnota2` double NOT NULL,
  `dnota3` double NOT NULL,
  `drecuperacion` double NOT NULL,
  `dpromedio` double NOT NULL,
  `efk_idperiodo` int(11) NOT NULL,
  PRIMARY KEY (`eid_notas`),
  KEY `fkperiodo` (`efk_idperiodo`),
  CONSTRAINT `fkperiodo` FOREIGN KEY (`efk_idperiodo`) REFERENCES `tperiodos` (`eid_periodo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tnotas`
--

LOCK TABLES `tnotas` WRITE;
/*!40000 ALTER TABLE `tnotas` DISABLE KEYS */;
INSERT INTO `tnotas` VALUES (1,0,0,0,0,0,1),(6,0,0,0,0,0,1);
/*!40000 ALTER TABLE `tnotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topciones`
--

DROP TABLE IF EXISTS `topciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topciones` (
  `eid_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `ecupo_maximo` int(11) NOT NULL,
  `efk_bto` int(11) NOT NULL,
  `efk_grado` int(11) NOT NULL,
  `efk_seccion` int(11) NOT NULL,
  `eestado` int(11) NOT NULL,
  PRIMARY KEY (`eid_opcion`),
  KEY `fkbto` (`efk_bto`),
  KEY `fkgrado` (`efk_grado`),
  KEY `fkseccion` (`efk_seccion`),
  CONSTRAINT `fkbto` FOREIGN KEY (`efk_bto`) REFERENCES `tbachilleratos` (`eid_bachillerato`),
  CONSTRAINT `fkgrado` FOREIGN KEY (`efk_grado`) REFERENCES `tgrado` (`eid_grado`),
  CONSTRAINT `fkseccion` FOREIGN KEY (`efk_seccion`) REFERENCES `tsecciones` (`eid_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topciones`
--

LOCK TABLES `topciones` WRITE;
/*!40000 ALTER TABLE `topciones` DISABLE KEYS */;
INSERT INTO `topciones` VALUES (1,100,1,1,1,1),(2,1,3,1,1,1),(3,50,7,1,1,1),(4,50,1,2,1,1),(5,50,1,5,1,1),(6,50,1,1,2,1);
/*!40000 ALTER TABLE `topciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tperiodos`
--

DROP TABLE IF EXISTS `tperiodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tperiodos` (
  `eid_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `enum` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`eid_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tperiodos`
--

LOCK TABLES `tperiodos` WRITE;
/*!40000 ALTER TABLE `tperiodos` DISABLE KEYS */;
INSERT INTO `tperiodos` VALUES (1,1,1),(2,2,0),(3,3,0),(4,4,0);
/*!40000 ALTER TABLE `tperiodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tpermisos`
--

DROP TABLE IF EXISTS `tpermisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tpermisos` (
  `eid_permisos` int(11) NOT NULL,
  `ep_inscripciones` int(11) NOT NULL,
  `ep_estadisticas` int(11) NOT NULL,
  `efk_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`eid_permisos`),
  KEY `fkusuario` (`efk_idusuario`),
  CONSTRAINT `fkusuario` FOREIGN KEY (`efk_idusuario`) REFERENCES `tusuarios` (`eid_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tpermisos`
--

LOCK TABLES `tpermisos` WRITE;
/*!40000 ALTER TABLE `tpermisos` DISABLE KEYS */;
INSERT INTO `tpermisos` VALUES (0,1,0,5),(1,0,1,4),(2,0,0,3);
/*!40000 ALTER TABLE `tpermisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tpersonal`
--

DROP TABLE IF EXISTS `tpersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tpersonal`
--

LOCK TABLES `tpersonal` WRITE;
/*!40000 ALTER TABLE `tpersonal` DISABLE KEYS */;
INSERT INTO `tpersonal` VALUES (1,'05547552-8','Fernando','Hernandez','12345678','fernan@hotmil.com','San Vicente, Barrio El Santuario , casa 2','2000-08-04',1,2,1),(4,'05547552-9','Alexander','Carcamo','12345678','walter_alx@hotmail.com','San Cayetano , San Vicente , El Salvador','2000-07-06',1,2,3),(7,'12344555-5','Josue Benjamin','Hernandez Alfaro','12345678','monterrosadelgado@gmail.com','San Rafael','2018-09-14',1,2,2),(8,'05547552-7','Jessica Alexandra','Rosales RodrÃ­guez','12614143','jess@hotmail.com','San Vicente,San eEsteban Catarina, BÂ° Concepcion, casa#2 ','2000-09-04',2,1,1),(9,'12345678-9','Jessica Abigail','Rodriguez','12345678','jessirosales2@gmail.com','San Vicente , Barrio El Calvario , casa 2','2000-09-05',1,1,3),(10,'23432434-2','Fernando JosuÃ©','Arevalo','71558042','fer.aravalo1997@gmail.com','Barrio El santuario, 3ra. calle ote. Pasaje Zelaya, Casa #2','2000-10-01',1,2,3),(11,'23434345-3','Kevin Alexander ','Jovel Arevalo','73232343','kevinjovel9@gmail.com','Col Santa Fe San Sebastian','2000-01-13',1,2,3),(12,'13612547-1','Flor de Maria','Rodriguez Ma','72131654','florcitademariarodriguez72@gmail.com','San Vicente','2000-10-02',1,1,1);
/*!40000 ALTER TABLE `tpersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tpersonal_materia`
--

DROP TABLE IF EXISTS `tpersonal_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tpersonal_materia` (
  `eid_pm` int(11) NOT NULL AUTO_INCREMENT,
  `efk_idpersonal` int(11) NOT NULL,
  `efk_idmateria` int(11) NOT NULL,
  PRIMARY KEY (`eid_pm`),
  KEY `fk_personal` (`efk_idpersonal`),
  KEY `fk_materia` (`efk_idmateria`),
  CONSTRAINT `fk_materia` FOREIGN KEY (`efk_idmateria`) REFERENCES `tmaterias` (`eid_materia`),
  CONSTRAINT `fk_personal` FOREIGN KEY (`efk_idpersonal`) REFERENCES `tpersonal` (`eid_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tpersonal_materia`
--

LOCK TABLES `tpersonal_materia` WRITE;
/*!40000 ALTER TABLE `tpersonal_materia` DISABLE KEYS */;
INSERT INTO `tpersonal_materia` VALUES (1,4,1),(2,4,8),(3,4,9),(4,8,10),(5,4,11),(6,4,12);
/*!40000 ALTER TABLE `tpersonal_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tresponsable`
--

DROP TABLE IF EXISTS `tresponsable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tresponsable` (
  `eid_responsable` int(11) NOT NULL AUTO_INCREMENT,
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
  `ireligion` int(11) NOT NULL COMMENT '1=catolico 0=otra',
  PRIMARY KEY (`eid_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tresponsable`
--

LOCK TABLES `tresponsable` WRITE;
/*!40000 ALTER TABLE `tresponsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `tresponsable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tsecciones`
--

DROP TABLE IF EXISTS `tsecciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tsecciones` (
  `eid_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `cseccion` varchar(10) NOT NULL,
  PRIMARY KEY (`eid_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tsecciones`
--

LOCK TABLES `tsecciones` WRITE;
/*!40000 ALTER TABLE `tsecciones` DISABLE KEYS */;
INSERT INTO `tsecciones` VALUES (1,'A'),(2,'B'),(3,'C');
/*!40000 ALTER TABLE `tsecciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ttipobachillerato`
--

DROP TABLE IF EXISTS `ttipobachillerato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ttipobachillerato` (
  `eid_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `ctipo` varchar(50) NOT NULL,
  PRIMARY KEY (`eid_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ttipobachillerato`
--

LOCK TABLES `ttipobachillerato` WRITE;
/*!40000 ALTER TABLE `ttipobachillerato` DISABLE KEYS */;
INSERT INTO `ttipobachillerato` VALUES (1,'Tecnico'),(2,'General'),(3,'DIstancia');
/*!40000 ALTER TABLE `ttipobachillerato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tusuarios`
--

DROP TABLE IF EXISTS `tusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tusuarios` (
  `eid_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cusuario` varchar(10) NOT NULL,
  `cpass` varchar(50) NOT NULL,
  `etipo` int(11) NOT NULL,
  `efk_personal` int(11) NOT NULL,
  PRIMARY KEY (`eid_usuario`),
  KEY `fkpersonal` (`efk_personal`),
  CONSTRAINT `fkpersonal` FOREIGN KEY (`efk_personal`) REFERENCES `tpersonal` (`eid_personal`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tusuarios`
--

LOCK TABLES `tusuarios` WRITE;
/*!40000 ALTER TABLE `tusuarios` DISABLE KEYS */;
INSERT INTO `tusuarios` VALUES (1,'Fernando97','ODFNakxnUjRiRThoc3Q0NE5vT2R6Zz09',1,1),(2,'carcamo2','NHhnc29sK3c5d2RTTmFvOTBualZRQT09',0,4),(3,'fercho','RzNnUUUxLzRWYWpsMWt5clV0RVFwZz09',0,10),(4,'benja','SE54M1dqeFZEWEUrT3JtSnVuYVJtdz09',1,7),(5,'Kevin777','U0FkUnd2STl4ZjlCZFVqRWZGY28wUT09',0,11),(10,'jesiquit','dnlWclNBZVI5TnpaYkZOc3FzTmM1Zz09',0,9),(13,'Florcita','dDJhSWVKMFJlcGhtMlFHc2RDdTBXUT09',1,12);
/*!40000 ALTER TABLE `tusuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-13 10:23:44
