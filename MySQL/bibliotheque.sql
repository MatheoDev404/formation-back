CREATE DATABASE  IF NOT EXISTS `bibliotheque` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `bibliotheque`;

-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)

--

-- Host: 127.0.0.1    Database: bibliotheque

-- ------------------------------------------------------

-- Server version	5.5.5-10.1.30-MariaDB



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

-- Table structure for table `abonne`

--



DROP TABLE IF EXISTS `abonne`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `abonne` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `prenom` varchar(100) NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*!40101 SET character_set_client = @saved_cs_client */;



--

-- Dumping data for table `abonne`

--



LOCK TABLES `abonne` WRITE;

/*!40000 ALTER TABLE `abonne` DISABLE KEYS */;

INSERT INTO `abonne` VALUES (1,'Guillaume'),(2,'Benoit'),(3,'Chloe'),(4,'Laura');

/*!40000 ALTER TABLE `abonne` ENABLE KEYS */;

UNLOCK TABLES;



--

-- Table structure for table `emprunt`

--



DROP TABLE IF EXISTS `emprunt`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `emprunt` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `id_livre` int(11) DEFAULT NULL,

  `id_abonne` int(11) DEFAULT NULL,

  `date_sortie` date NOT NULL,

  `date_rendu` date DEFAULT NULL,

  PRIMARY KEY (`id`),

  KEY `fk_emprunt_livre` (`id_livre`),

  KEY `fk_emprunt_abonne` (`id_abonne`),

  CONSTRAINT `fk_emprunt_abonne` FOREIGN KEY (`id_abonne`) REFERENCES `abonne` (`id`),

  CONSTRAINT `fk_emprunt_livre` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*!40101 SET character_set_client = @saved_cs_client */;



--

-- Dumping data for table `emprunt`

--



LOCK TABLES `emprunt` WRITE;

/*!40000 ALTER TABLE `emprunt` DISABLE KEYS */;

INSERT INTO `emprunt` VALUES (1,1,1,'2014-12-17','2014-12-18'),(2,2,2,'2014-12-18','2014-12-20'),(3,1,3,'2014-12-19','2014-12-22'),(4,2,4,'2014-12-19','2014-12-22'),(5,5,1,'2014-12-19','2014-12-28'),(6,6,2,'2015-03-20','2015-03-26'),(7,6,3,'2015-06-13',NULL),(8,1,2,'2015-06-15',NULL);

/*!40000 ALTER TABLE `emprunt` ENABLE KEYS */;

UNLOCK TABLES;



--

-- Table structure for table `livre`

--



DROP TABLE IF EXISTS `livre`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `livre` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `auteur` varchar(100) NOT NULL,

  `titre` varchar(100) NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*!40101 SET character_set_client = @saved_cs_client */;



--

-- Dumping data for table `livre`

--



LOCK TABLES `livre` WRITE;

/*!40000 ALTER TABLE `livre` DISABLE KEYS */;

INSERT INTO `livre` VALUES (1,'GUY DE MAUPASSANT','Une vie'),(2,'GUY DE MAUPASSANT','Bel-Ami '),(3,'HONORE DE BALZAC','Le père Goriot'),(4,'ALPHONSE DAUDET','Le Petit chose'),(5,'ALEXANDRE DUMAS','La Reine Margot'),(6,'ALEXANDRE DUMAS','Les Trois Mousquetaires');

/*!40000 ALTER TABLE `livre` ENABLE KEYS */;

UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;



-- Dump completed on 2018-06-29 12:19:14