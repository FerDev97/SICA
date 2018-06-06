-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema agencia
--

CREATE DATABASE IF NOT EXISTS agencia;
USE agencia;

--
-- Definition of table `agencia`
--

DROP TABLE IF EXISTS `agencia`;
CREATE TABLE `agencia` (
  `idagencia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  PRIMARY KEY (`idagencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agencia`
--

/*!40000 ALTER TABLE `agencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `agencia` ENABLE KEYS */;


--
-- Definition of table `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE `bus` (
  `idbus` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `placa` varchar(45) NOT NULL,
  `idempleado` int(10) unsigned NOT NULL,
  `foto` blob NOT NULL,
  `tipo` text NOT NULL,
  PRIMARY KEY (`idbus`),
  KEY `FK_bus_1` (`idempleado`),
  CONSTRAINT `FK_bus_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`idempleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

/*!40000 ALTER TABLE `bus` DISABLE KEYS */;
/*!40000 ALTER TABLE `bus` ENABLE KEYS */;


--
-- Definition of table `buscombo`
--

DROP TABLE IF EXISTS `buscombo`;
CREATE TABLE `buscombo` (
  `idbus` int(10) unsigned NOT NULL,
  `idcombo` int(10) unsigned NOT NULL,
  KEY `FK_buscombo_1` (`idbus`),
  KEY `FK_buscombo_2` (`idcombo`),
  CONSTRAINT `FK_buscombo_1` FOREIGN KEY (`idbus`) REFERENCES `bus` (`idbus`),
  CONSTRAINT `FK_buscombo_2` FOREIGN KEY (`idcombo`) REFERENCES `combo` (`idcombo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buscombo`
--

/*!40000 ALTER TABLE `buscombo` DISABLE KEYS */;
/*!40000 ALTER TABLE `buscombo` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `combo`
--

DROP TABLE IF EXISTS `combo`;
CREATE TABLE `combo` (
  `idcombo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `precio` double NOT NULL,
  `fechasalida` date NOT NULL,
  `horasalida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecharegreso` date NOT NULL,
  `horaregreso` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idagencia` int(10) unsigned NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idcombo`),
  KEY `FK_combo_1` (`idagencia`),
  CONSTRAINT `FK_combo_1` FOREIGN KEY (`idagencia`) REFERENCES `agencia` (`idagencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combo`
--

/*!40000 ALTER TABLE `combo` DISABLE KEYS */;
/*!40000 ALTER TABLE `combo` ENABLE KEYS */;


--
-- Definition of table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `idempleado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `nit` varchar(16) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `idagencia` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idempleado`),
  KEY `FK_empleado_1` (`idagencia`),
  CONSTRAINT `FK_empleado_1` FOREIGN KEY (`idagencia`) REFERENCES `agencia` (`idagencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleado`
--

/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;


--
-- Definition of table `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE `foto` (
  `idfoto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idlugar` int(10) unsigned NOT NULL,
  `foto` blob NOT NULL,
  `tipo` text NOT NULL,
  PRIMARY KEY (`idfoto`),
  KEY `FK_foto_1` (`idlugar`),
  CONSTRAINT `FK_foto_1` FOREIGN KEY (`idlugar`) REFERENCES `lugar` (`idlugar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;


--
-- Definition of table `lugar`
--

DROP TABLE IF EXISTS `lugar`;
CREATE TABLE `lugar` (
  `idlugar` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  PRIMARY KEY (`idlugar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lugar`
--

/*!40000 ALTER TABLE `lugar` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugar` ENABLE KEYS */;


--
-- Definition of table `lugarcombo`
--

DROP TABLE IF EXISTS `lugarcombo`;
CREATE TABLE `lugarcombo` (
  `idlugar` int(10) unsigned NOT NULL,
  `idcombo` int(10) unsigned NOT NULL,
  KEY `FK_lugarcombo_1` (`idlugar`),
  KEY `FK_lugarcombo_2` (`idcombo`),
  CONSTRAINT `FK_lugarcombo_1` FOREIGN KEY (`idlugar`) REFERENCES `lugar` (`idlugar`),
  CONSTRAINT `FK_lugarcombo_2` FOREIGN KEY (`idcombo`) REFERENCES `combo` (`idcombo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lugarcombo`
--

/*!40000 ALTER TABLE `lugarcombo` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugarcombo` ENABLE KEYS */;


--
-- Definition of table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE `venta` (
  `idventa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcliente` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `idcombo` int(10) unsigned NOT NULL,
  `boletos` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idventa`),
  KEY `FK_venta_1` (`idcliente`),
  KEY `FK_venta_2` (`idcombo`),
  CONSTRAINT `FK_venta_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `FK_venta_2` FOREIGN KEY (`idcombo`) REFERENCES `combo` (`idcombo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venta`
--

/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
