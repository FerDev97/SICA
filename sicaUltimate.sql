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
-- Table structure for table `estadoinscrip`
--

DROP TABLE IF EXISTS `estadoinscrip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadoinscrip` (
  `id_estadoinscrip` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id_estadoinscrip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadoinscrip`
--

LOCK TABLES `estadoinscrip` WRITE;
/*!40000 ALTER TABLE `estadoinscrip` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadoinscrip` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talum_mat_not`
--

LOCK TABLES `talum_mat_not` WRITE;
/*!40000 ALTER TABLE `talum_mat_not` DISABLE KEYS */;
INSERT INTO `talum_mat_not` VALUES (1,1,1,1,1),(2,1,8,2,1),(3,1,11,3,1),(4,3,1,4,1),(5,3,8,5,1),(6,3,11,6,1),(7,6,13,7,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talumno`
--

LOCK TABLES `talumno` WRITE;
/*!40000 ALTER TABLE `talumno` DISABLE KEYS */;
INSERT INTO `talumno` VALUES (1,'0001','8398979','Jorge','Moran',0,'la paz','La Paz','2018-05-03','Trans.Propio',1,'2017','nada','penicilina','500',0,1,1,1,0,0,0,'papa del registro','--','90809809-8','75575765','','','sdsdhkh','Matrimonio Religioso','MamÃ¡ y PapÃ¡','','','','','','','',6,1,1),(2,'0002','7423479','Marcos antonio','Molina Pimentel',0,'calle el barrio','Sonsonate','1999-07-04','A pie',3,'2017','nada','nada','600',1,1,1,1,1,0,0,'papa','--','79879797-9','88779797','','','jsdklfkslhdk','Matrimonio Religioso','PapÃ¡','','','','','','','',7,1,1),(3,'0003','7987979','Matias','Rivera',0,'sdskhfkj','Chalatenango','2001-09-02','A pie',1,'2017','sdjkds','nada','500',1,0,1,1,0,0,0,'jkjkhkj','','89808080-8','79798797','','','kjhkjhk','Matrimonio Religioso','MamÃ¡','','','','','','','',7,1,1),(4,'0004','3447398','Jessica Mariela','Alfaro Palacios',1,'casa #24 San Bartolo','San Miguel','2000-05-04','Trans.Propio',5,'2017','nada','nada','600',1,1,1,1,0,0,0,'hkjhkhk','','32398789-7','87987987','','78789787','hjkhkj','Matrimonio Religioso','PapÃ¡','','','','','','','',8,1,1),(5,'','7979797','Maria Auxiliadora','Alfaro Martinez',1,'Colonia Soyla','San','2003-04-02','A',5,'2017','nada','nada','600',0,0,1,0,1,0,0,'hkhkh','','77979797-9','79879879','','','hkjhkjh','AcompaÃ±ados','MamÃ¡','','','','','','','',7,1,1),(6,'0006','3248784','Jessica Marianela','Alvarex Abarca',0,'sadjkasjd','Santa Ana','2005-04-02','A pie',5,'2017','sjdkls','nada','600',1,1,1,0,0,0,0,'khkjhkjhkj','','79879879-8','79798798','','','hkjhjkhkj','Civil','MamÃ¡ y PapÃ¡','','','','','','','',7,1,1);
/*!40000 ALTER TABLE `talumno` ENABLE KEYS */;
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
INSERT INTO `tanio` VALUES (1,2018,1,0),(3,2017,0,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbachilleratos`
--

LOCK TABLES `tbachilleratos` WRITE;
/*!40000 ALTER TABLE `tbachilleratos` DISABLE KEYS */;
INSERT INTO `tbachilleratos` VALUES (1,'CON236','Administrativo Contable','Bachillerato orientado a la contabilidad financiera aplicadaaa',1,1),(3,'BG89','Bachillerato General','Bachillerato orientado a las generalidadesbasicas que todo bachillere debe poseer',2,1),(7,'BS273','Bachillerato en Salud','Bachillerato orientado a la salud',1,0),(9,'ELE238','Electrotecnia','Bachillerato enfocado a la elctronica',1,0),(10,'DES162','Desarrollo de Software','Bachillerato orientado al manejo de las Herramientas de TIC para brindar el conocimiento a cada alumno en esa rama.',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbitacora`
--

LOCK TABLES `tbitacora` WRITE;
/*!40000 ALTER TABLE `tbitacora` DISABLE KEYS */;
INSERT INTO `tbitacora` VALUES (1,13,'2018-11-26 14:10:17','IniciÃ³ sesion Administrador'),(2,13,'2018-11-26 19:18:41','IniciÃ³ sesion Administrador'),(3,13,'2018-11-27 09:40:47','IniciÃ³ sesion Administrador'),(4,13,'2018-11-27 14:16:44','IniciÃ³ sesion Administrador'),(5,13,'2018-11-27 17:27:07','IniciÃ³ sesion Administrador'),(6,5,'2018-11-27 22:33:50','IniciÃ³ sesion Docente '),(7,13,'2018-11-27 22:34:04','IniciÃ³ sesion Administrador'),(8,13,'2018-11-28 08:33:14','IniciÃ³ sesion Administrador'),(9,13,'2018-11-28 13:16:13','Inscribio un nuevo alumno'),(10,13,'2018-11-28 16:30:32','Inscribio un nuevo alumno'),(11,13,'2018-11-28 16:43:01','RegistrÃ³ una nueva Opcion de Bachillerato'),(12,13,'2018-11-28 16:43:27','RegistrÃ³ una nueva Opcion de Bachillerato'),(13,13,'2018-11-28 16:43:35','RegistrÃ³ una nueva Opcion de Bachillerato'),(14,13,'2018-11-28 16:43:43','RegistrÃ³ una nueva Opcion de Bachillerato'),(15,13,'2018-11-28 18:47:21','Inscribio un nuevo alumno'),(16,13,'2018-11-28 19:05:59','Inscribio un nuevo alumno'),(17,13,'2018-11-28 22:21:50','IniciÃ³ sesion Administrador'),(18,13,'2018-11-28 22:31:02','Inscribio un nuevo alumno'),(19,13,'2018-11-28 22:38:52','Inscribio un nuevo alumno'),(20,13,'2018-11-28 22:54:23','Inscribio un nuevo alumno'),(21,13,'2018-11-28 23:02:15','Inscribio un nuevo alumno'),(22,13,'2018-11-28 23:06:04','Inscribio un nuevo alumno'),(23,13,'2018-11-28 23:55:33','IniciÃ³ sesion Administrador'),(24,13,'2018-11-29 07:29:15','IniciÃ³ sesion Administrador'),(25,13,'2018-11-29 07:29:56','IniciÃ³ sesion Administrador'),(26,13,'2018-11-29 07:30:53','IniciÃ³ sesion Administrador'),(27,13,'2018-11-29 07:36:45','IniciÃ³ sesion Docente'),(28,13,'2018-11-29 07:36:53','IniciÃ³ sesion Administrador'),(29,13,'2018-11-29 07:37:37','Cerro la sesion'),(30,13,'2018-11-29 07:37:59','IniciÃ³ sesion Administrador'),(31,13,'2018-11-29 07:41:27','Se editÃ³ la inscripcion del alumno: 006'),(32,13,'2018-11-29 07:42:55','CerrÃ³ la sesion'),(33,5,'2018-11-29 07:43:06','IniciÃ³ sesion Docente '),(34,5,'2018-11-29 07:43:17','CerrÃ³ la sesion'),(35,13,'2018-11-29 07:43:24','IniciÃ³ sesion Administrador'),(36,13,'2018-11-29 07:49:25','Inscribio un nuevo alumno'),(37,13,'2018-11-29 07:53:21','Inscribio un nuevo alumno'),(38,13,'2018-11-29 07:54:34','Inscribio un nuevo alumno'),(39,13,'2018-11-29 07:56:10','CerrÃ³ la sesion'),(40,13,'2018-11-29 07:56:20','IniciÃ³ sesion Administrador'),(41,13,'2018-11-29 08:11:41','Inscribio un nuevo alumno'),(42,13,'2018-11-29 08:40:11','Se editÃ³ la inscripcion del alumno: '),(43,13,'2018-11-29 08:41:03','Se editÃ³ la inscripcion del alumno: '),(44,13,'2018-11-29 08:41:47','CerrÃ³ la sesion'),(45,5,'2018-12-16 11:42:51','IniciÃ³ sesion Docente '),(46,5,'2018-12-16 11:44:10','CerrÃ³ la sesion'),(47,13,'2018-12-16 11:44:22','IniciÃ³ sesion Administrador'),(48,13,'2018-12-16 11:54:13','RegistrÃ³ un nuevo tipo de bachillerato'),(49,13,'2018-12-16 11:59:22','RegistrÃ³ un nuevo bachillerato'),(50,13,'2018-12-16 12:02:05','RegistrÃ³ una nueva Opcion de Bachillerato'),(51,13,'2018-12-16 12:02:32','RegistrÃ³ una nueva Opcion de Bachillerato'),(52,13,'2018-12-16 13:43:07','IniciÃ³ sesion Administrador'),(53,13,'2018-12-16 14:30:17','ModificÃ³ un permiso temporal'),(54,13,'2018-12-16 14:30:20','CerrÃ³ la sesion'),(55,5,'2018-12-16 14:30:27','IniciÃ³ sesion Docente '),(56,5,'2018-12-16 14:30:34','CerrÃ³ la sesion'),(57,13,'2018-12-16 14:30:42','IniciÃ³ sesion Administrador'),(58,5,'2018-12-30 09:56:37','IniciÃ³ sesion Docente '),(59,5,'2018-12-30 09:56:56','CerrÃ³ la sesion'),(60,13,'2018-12-30 09:57:08','IniciÃ³ sesion Administrador'),(61,13,'2018-12-30 10:42:29','RegistrÃ³ un nuevo tipo de bachillerato'),(62,13,'2018-12-30 10:42:57','RegistrÃ³ un nuevo tipo de bachillerato'),(63,13,'2018-12-30 10:44:44','RegistrÃ³ un nuevo tipo de bachillerato'),(64,13,'2019-01-03 10:35:10','IniciÃ³ sesion Administrador'),(65,13,'2019-01-10 11:03:40','IniciÃ³ sesion Administrador'),(66,5,'2019-01-13 10:11:54','IniciÃ³ sesion Docente '),(67,5,'2019-01-13 10:12:52','CerrÃ³ la sesion'),(68,13,'2019-01-13 10:13:22','IniciÃ³ sesion Administrador'),(69,13,'2019-01-13 10:38:35','IniciÃ³ sesion Administrador'),(70,13,'2019-01-13 11:00:52','Inscribio un nuevo alumno'),(71,13,'2019-01-13 14:25:00','IniciÃ³ sesion Administrador'),(72,13,'2019-01-14 10:15:41','IniciÃ³ sesion Administrador'),(73,13,'2019-01-14 11:18:47','Inscribio un nuevo alumno'),(74,13,'2019-01-14 11:18:48','Inscribio un nuevo alumno'),(75,13,'2019-01-14 11:18:48','Inscribio un nuevo alumno'),(76,13,'2019-01-14 14:32:28','IniciÃ³ sesion Administrador'),(77,13,'2019-01-14 14:33:55','CerrÃ³ la sesion'),(78,5,'2019-01-14 14:34:59','IniciÃ³ sesion Docente '),(79,5,'2019-01-14 14:35:32','CerrÃ³ la sesion'),(80,13,'2019-01-14 14:35:42','IniciÃ³ sesion Administrador'),(81,13,'2019-01-14 15:36:21','RegistrÃ³ un nuevo bachillerato'),(82,13,'2019-01-14 16:25:20','Inscribio un nuevo alumno'),(83,13,'2019-01-14 16:25:21','Inscribio un nuevo alumno'),(84,13,'2019-01-14 16:25:21','Inscribio un nuevo alumno'),(85,13,'2019-01-14 16:29:05','Inscribio un nuevo alumno'),(86,13,'2019-01-14 16:29:05','Inscribio un nuevo alumno'),(87,13,'2019-01-14 16:29:06','Inscribio un nuevo alumno'),(88,13,'2019-01-14 16:54:26','Inscribio un nuevo alumno'),(89,13,'2019-01-14 16:54:27','Inscribio un nuevo alumno'),(90,13,'2019-01-14 16:54:27','Inscribio un nuevo alumno'),(91,13,'2019-01-15 21:04:24','IniciÃ³ sesion Administrador'),(92,13,'2019-01-15 22:13:12','Inscribio un nuevo alumno'),(93,13,'2019-01-15 22:13:12','Inscribio un nuevo alumno'),(94,13,'2019-01-15 22:13:13','Inscribio un nuevo alumno'),(95,13,'2019-01-16 11:02:16','IniciÃ³ sesion Administrador'),(96,13,'2019-01-16 13:22:54','Inscribio un nuevo alumno'),(97,13,'2019-01-16 13:22:54','Inscribio un nuevo alumno'),(98,13,'2019-01-16 13:22:54','Inscribio un nuevo alumno'),(99,13,'2019-01-16 13:27:59','CerrÃ³ la sesion'),(100,5,'2019-01-16 13:28:16','IniciÃ³ sesion Docente '),(101,5,'2019-01-16 13:28:57','CerrÃ³ la sesion'),(102,13,'2019-01-16 13:30:06','IniciÃ³ sesion Administrador'),(103,13,'2019-01-16 13:39:41','Inscribio un nuevo alumno'),(104,13,'2019-01-16 13:39:42','Inscribio un nuevo alumno'),(105,13,'2019-01-16 13:39:42','Inscribio un nuevo alumno'),(106,13,'2019-01-16 13:50:03','IniciÃ³ sesion Administrador'),(107,13,'2019-01-16 13:51:39','Inscribio un nuevo alumno'),(108,13,'2019-01-16 13:51:39','Inscribio un nuevo alumno'),(109,13,'2019-01-16 13:51:39','Inscribio un nuevo alumno'),(110,13,'2019-01-16 13:57:23','RegistrÃ³ una nueva materia'),(111,13,'2019-01-16 13:58:58','Inscribio un nuevo alumno'),(112,13,'2019-01-16 14:01:58','Se editÃ³ la inscripcion del alumno: '),(113,13,'2019-01-16 14:32:29','RegistrÃ³ una nueva materia'),(114,13,'2019-01-16 14:47:08','RegistrÃ³ una nueva Opcion de Bachillerato'),(115,13,'2019-01-16 23:41:52','IniciÃ³ sesion Administrador'),(116,13,'2019-01-16 23:43:48','CerrÃ³ la sesion'),(117,13,'2019-01-17 13:49:43','IniciÃ³ sesion Administrador');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thorarios`
--

LOCK TABLES `thorarios` WRITE;
/*!40000 ALTER TABLE `thorarios` DISABLE KEYS */;
INSERT INTO `thorarios` VALUES (1,'Lunes y Martes','7:00 AM - 10:00 AM',0),(2,'Martes y Miercoles','10:00 AM - 12:00 PM',1),(3,'Miercoles y Viernes','03:00 PM - 05:00 PM',1),(4,'Jueves y Jueves','03:00 PM - 05:00 PM',0),(5,'Martes y Miercoles','01:00 PM - 03:00 PM',1),(6,'Jueves y Viernes','03:00 PM - 05:00 PM',1);
/*!40000 ALTER TABLE `thorarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tinscribir`
--

DROP TABLE IF EXISTS `tinscribir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tinscribir` (
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tinscribir`
--

LOCK TABLES `tinscribir` WRITE;
/*!40000 ALTER TABLE `tinscribir` DISABLE KEYS */;
/*!40000 ALTER TABLE `tinscribir` ENABLE KEYS */;
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
  `anio` int(11) NOT NULL,
  PRIMARY KEY (`eid_materia`),
  KEY `fkopcion` (`efk_idopcion`),
  KEY `fkhorario_idx` (`efk_idhorario`),
  CONSTRAINT `fkhorario` FOREIGN KEY (`efk_idhorario`) REFERENCES `thorarios` (`eid_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkopcion` FOREIGN KEY (`efk_idopcion`) REFERENCES `topciones` (`eid_opcion`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmaterias`
--

LOCK TABLES `tmaterias` WRITE;
/*!40000 ALTER TABLE `tmaterias` DISABLE KEYS */;
INSERT INTO `tmaterias` VALUES (1,'001','Matematicas','Esta es una materia llena de numeros.',1,6,1,1),(8,'002','Lenguaje y Literatura','Esta es una materia sobre lectura.',1,2,1,1),(9,'009','Sociales','Historia de el salvador',2,1,1,1),(10,'010','Manejo Softwar','Aqui se usa word.',2,2,1,1),(11,'011','Turismo','fotografia',1,5,1,1),(12,'011','Ingles','segundo idioma',2,5,1,1),(13,'013','Herramientas de Productividad','nada',5,5,1,1),(14,'014','Moral y Civica','descripcion moral y civica',3,3,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tnotas`
--

LOCK TABLES `tnotas` WRITE;
/*!40000 ALTER TABLE `tnotas` DISABLE KEYS */;
INSERT INTO `tnotas` VALUES (1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(2,5.66,10,9.5,0,8.39,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(4,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(5,3.45,10,5.7,0,6.38,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(6,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(7,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
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
  `inscritos` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  PRIMARY KEY (`eid_opcion`),
  KEY `fkbto` (`efk_bto`),
  KEY `fkgrado` (`efk_grado`),
  KEY `fkseccion` (`efk_seccion`),
  CONSTRAINT `fkbto` FOREIGN KEY (`efk_bto`) REFERENCES `tbachilleratos` (`eid_bachillerato`),
  CONSTRAINT `fkgrado` FOREIGN KEY (`efk_grado`) REFERENCES `tgrado` (`eid_grado`),
  CONSTRAINT `fkseccion` FOREIGN KEY (`efk_seccion`) REFERENCES `tsecciones` (`eid_seccion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topciones`
--

LOCK TABLES `topciones` WRITE;
/*!40000 ALTER TABLE `topciones` DISABLE KEYS */;
INSERT INTO `topciones` VALUES (1,56,1,1,1,1,4,1),(2,59,3,1,1,0,1,1),(3,60,7,1,1,1,0,1),(4,60,1,2,1,1,0,1),(5,59,1,5,1,1,1,1),(7,60,9,2,1,1,0,1),(8,60,9,1,3,1,0,1),(9,50,10,1,1,1,0,1);
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
INSERT INTO `tpermisos` VALUES (0,1,1,5),(1,0,1,4),(2,0,0,3);
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
INSERT INTO `tpersonal` VALUES (1,'05547552-8','Fernando','Hernandez','12345678','fernan@hotmil.com','San Vicente, Barrio El Santuario , casa 2','2000-08-04',1,2,1),(4,'05547552-9','Alexander','Carcamo','12345678','walter_alx@hotmail.com','San Cayetano , San Vicente , El Salvador','2000-07-06',1,2,3),(7,'12344555-5','Josue Benjamin','Hernandez Alfaro','12345678','monterrosadelgado@gmail.com','San Rafael','2018-09-14',1,2,2),(8,'05547552-7','Jessica Alexandra','Rosales RodrÃ­guez','12614143','jess@hotmail.com','San Vicente,San eEsteban Catarina, BÂ° Concepcion, casa#2 ','2000-09-04',0,1,1),(9,'12345678-9','Jessica Abigail','Rodriguez','12345678','jessirosales2@gmail.com','San Vicente , Barrio El Calvario , casa 2','2000-09-05',1,1,3),(10,'23432434-2','Fernando JosuÃ©','Arevalo','71558042','fer.aravalo1997@gmail.com','Barrio El santuario, 3ra. calle ote. Pasaje Zelaya, Casa #2','2000-10-01',1,2,3),(11,'23434345-3','Kevin Alexander ','Jovel Arevalo','73232343','kevinjovel9@gmail.com','Col Santa Fe San Sebastian','2000-01-13',1,2,3),(12,'13612547-1','Flor de Maria','Rodriguez Martinez','72131654','florcitademariarodriguez72@gmail.com','San Vicente','2000-10-02',1,1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tpersonal_materia`
--

LOCK TABLES `tpersonal_materia` WRITE;
/*!40000 ALTER TABLE `tpersonal_materia` DISABLE KEYS */;
INSERT INTO `tpersonal_materia` VALUES (1,4,1),(2,4,8),(3,4,9),(4,8,10),(5,4,11),(6,4,12),(7,11,13),(8,10,14);
/*!40000 ALTER TABLE `tpersonal_materia` ENABLE KEYS */;
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
INSERT INTO `tusuarios` VALUES (1,'Fernando97','ODFNakxnUjRiRThoc3Q0NE5vT2R6Zz09',0,1),(2,'carcamo2','MkNZYSt4TnlyeWt6bStjakxxSllIQT09',1,4),(3,'fercho','RzNnUUUxLzRWYWpsMWt5clV0RVFwZz09',0,10),(4,'benja','SE54M1dqeFZEWEUrT3JtSnVuYVJtdz09',1,7),(5,'Kevin777','U0FkUnd2STl4ZjlCZFVqRWZGY28wUT09',0,11),(10,'jesiquit','dnlWclNBZVI5TnpaYkZOc3FzTmM1Zz09',0,9),(13,'Florcita','dDJhSWVKMFJlcGhtMlFHc2RDdTBXUT09',1,12);
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

-- Dump completed on 2019-01-17 15:18:22
