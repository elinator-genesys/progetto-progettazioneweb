-- Progettazione Web 
DROP DATABASE if exists tonci_635715; 
CREATE DATABASE tonci_635715; 
USE tonci_635715; 
-- MySQL dump 10.13  Distrib 5.7.28, for Win64 (x86_64)
--
-- Host: localhost    Database: tonci_635715
-- ------------------------------------------------------
-- Server version	5.7.28

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
-- Table structure for table `campi`
--

DROP TABLE IF EXISTS `campi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campi` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descrizione` varchar(255) DEFAULT NULL,
  `disponibile` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campi`
--

LOCK TABLES `campi` WRITE;
/*!40000 ALTER TABLE `campi` DISABLE KEYS */;
INSERT INTO `campi` VALUES (1,'Campo1-Tennis','Campo da tennis esterno',1),(2,'Campo2-Tennis','Campo da tennis esterno',1),(3,'Campo3-Tennis','Campo da tennis esterno',1),(4,'Campo4-Tennis','Campo da tennis coperto',1),(5,'Campo5-Tennis','Campo da tennis coperto',1),(6,'Campo6-Tennis','Campo da tennis coperto',1),(7,'Campo1-Padel','Campo da padel esterno',1),(8,'Campo2-Padel','Campo da padel esterno',1),(9,'Campo3-Padel','Campo da padel coperto',1);
/*!40000 ALTER TABLE `campi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prenotazionicampi`
--

DROP TABLE IF EXISTS `prenotazionicampi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prenotazionicampi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtente` int(11) NOT NULL,
  `numeroCampo` int(11) NOT NULL,
  `giorno` date DEFAULT NULL,
  `orario` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazionicampi`
--

LOCK TABLES `prenotazionicampi` WRITE;
/*!40000 ALTER TABLE `prenotazionicampi` DISABLE KEYS */;
/*!40000 ALTER TABLE `prenotazionicampi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prenotazionilezionigruppo`
--

DROP TABLE IF EXISTS `prenotazionilezionigruppo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prenotazionilezionigruppo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtente` int(11) NOT NULL,
  `giorno` date DEFAULT NULL,
  `orario` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazionilezionigruppo`
--

LOCK TABLES `prenotazionilezionigruppo` WRITE;
/*!40000 ALTER TABLE `prenotazionilezionigruppo` DISABLE KEYS */;
/*!40000 ALTER TABLE `prenotazionilezionigruppo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prenotazionilezionisingole`
--

DROP TABLE IF EXISTS `prenotazionilezionisingole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prenotazionilezionisingole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtente` int(11) NOT NULL,
  `giorno` date DEFAULT NULL,
  `orario` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazionilezionisingole`
--

LOCK TABLES `prenotazionilezionisingole` WRITE;
/*!40000 ALTER TABLE `prenotazionilezionisingole` DISABLE KEYS */;
/*!40000 ALTER TABLE `prenotazionilezionisingole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sfide`
--

DROP TABLE IF EXISTS `sfide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sfide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSfidante` int(11) NOT NULL,
  `idDestinatario` int(11) NOT NULL,
  `stato` varchar(10) DEFAULT 'IN ATTESA',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sfide`
--

LOCK TABLES `sfide` WRITE;
/*!40000 ALTER TABLE `sfide` DISABLE KEYS */;
/*!40000 ALTER TABLE `sfide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utenti`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `nomeUtente` varchar(50) NOT NULL,
  `telefono` varchar(10) DEFAULT '',
  `email` varchar(255) NOT NULL,
  `livello` varchar(50) DEFAULT 'Principiante',
  `pass` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomeUtente` (`nomeUtente`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utenti`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` VALUES (1,'admin','admin','admin','','','','$2y$10$7Lh2BPdX./jcJGyu62Yy6eU8DH3wzRZRzoSXtayO.1K8m23KkN7Zi','admin'),(2,'Elia','Tonci','EliaT','','elia@gmail.com','Esperto','$2y$10$BC9aFYQxCWjXW2hOTSZWl.hHrFUkX5ZAq.ozMBrYiwI08zmIwJkDm','user'),(3,'Mario','Rossi','MarioR','','mario@gmail.com','Intermedio','$2y$10$BC9aFYQxCWjXW2hOTSZWl.hHrFUkX5ZAq.ozMBrYiwI08zmIwJkDm','user'),(4,'Luigi','Bianchi','LuigiB','','luigi@gmail.com','Principiante','$2y$10$BC9aFYQxCWjXW2hOTSZWl.hHrFUkX5ZAq.ozMBrYiwI08zmIwJkDm','user');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-21  8:50:57
