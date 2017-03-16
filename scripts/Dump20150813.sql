CREATE DATABASE  IF NOT EXISTS `dataqodra` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dataqodra`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: dataqodra
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `tbl_comment`
--

DROP TABLE IF EXISTS `tbl_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_comment` (
  `id_video` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime DEFAULT NULL,
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comment`
--

LOCK TABLES `tbl_comment` WRITE;
/*!40000 ALTER TABLE `tbl_comment` DISABLE KEYS */;
INSERT INTO `tbl_comment` VALUES (98,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','2015-06-22 07:44:43',12),(98,7,'Coment&aacute;rio de teste.','2015-06-22 07:45:18',13);
/*!40000 ALTER TABLE `tbl_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_likes`
--

DROP TABLE IF EXISTS `tbl_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_likes` (
  `id_video` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_likes`
--

LOCK TABLES `tbl_likes` WRITE;
/*!40000 ALTER TABLE `tbl_likes` DISABLE KEYS */;
INSERT INTO `tbl_likes` VALUES (98,7),(52,1),(98,1);
/*!40000 ALTER TABLE `tbl_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuarios` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_photo` varchar(200) NOT NULL,
  `user_info` varchar(45) NOT NULL,
  `user_sur` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_usuarios` VALUES (1,'bruno','bruno.baptista@hotmail.com','fe54b05ab9887ecac35a14b9b1cfbe57','e8b8d2c6801cc98f537113d38824c34f.jpg','Bruno','Baptista'),(7,'teste','fulano@testemail.com','fe54b05ab9887ecac35a14b9b1cfbe57','default.png','UsuÃ¡rio','Teste');
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_videos`
--

DROP TABLE IF EXISTS `tbl_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_videos`
--

LOCK TABLES `tbl_videos` WRITE;
/*!40000 ALTER TABLE `tbl_videos` DISABLE KEYS */;
INSERT INTO `tbl_videos` VALUES (23,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula9/qui125_aula9.xml'),(24,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula4/qui125_aula4.xml'),(25,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula1/dcc119_aula1.xml'),(26,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/fisica/fisica2/cap18parte2/Gil.xml'),(27,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula14.1/video14.xml'),(28,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/fisica/fisica2/cap12parte2/grav2.xml'),(30,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula27/video27.xml'),(31,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula2/qui125_aula2.xml'),(32,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula04/Aula04.xml'),(33,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/administracao_publica/psicologia/aula1/pscaula1.xml'),(34,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_computacao/eaddcc009/aula3/eaddcc009_aula3.xml'),(35,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula25/Aula_25.xml'),(36,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/administracao_publica/matematica/aula1/pric1.xml'),(37,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/Exercicio_02/Ex02.xml'),(38,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula6/dcc122_aula6.xml'),(39,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula3/video3.xml'),(40,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/est029/aula2/aula2.xml'),(41,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc008/aula01/video1.xml'),(42,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc008/aula02/Video.xml'),(43,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula5/video5.xml'),(44,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/quimica/orbitais_moleculares/emanoel.xml'),(45,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc008_Calculo_Numerico/aula_02/Video.xml'),(46,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/treinamento/matadm2.xml'),(47,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/administracao_publica/psicologia/aula4/pscaula4.xml'),(48,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula9/dcc119_aula9.xml'),(49,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui025/aula2/eadqui025_aula2.xml'),(50,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula10/aula_10.xml'),(51,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui030/aula9/eadqui030_aula9.xml'),(52,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula8/dcc122_aula8.xml'),(53,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula26/video26.xml'),(54,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/administracao_publica/admeadinf/si1/si1.xml'),(55,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula3/dcc119_aula3.xml'),(56,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula12/video12.xml'),(57,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula22_1/Aula_22.xml'),(58,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/ceadteste/parte_1/parte1.xml'),(59,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui030/aula4e5/eadqui030_aula4e5.xml'),(60,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula17/Aula17.xml'),(61,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc008/aula03/aula.xml'),(62,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula2/video2.xml'),(63,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula28/video28.xml'),(64,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui056/Aula1/video_barbara.xml'),(65,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula29/Aula_29.xml'),(66,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula07/Aula07.xml'),(67,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui025/aula1-parte3/eadqui025-aula1-parte3.xml'),(68,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula13/Aula13.xml'),(69,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula09/Aula09.xml'),(70,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui025/aula0/eadqui025_aula0.xml'),(71,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula06/Aula06.xml'),(72,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula11/video11.xml'),(73,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/est029/aula1/aula1.xml'),(74,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula6/dcc119_aula6.xml'),(75,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula16/video16.xml'),(76,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula7/video7.xml'),(77,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/Exercicio_01/video.xml'),(78,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui030/aula1/eadqui030_aula1.xml'),(79,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula7/dcc119_aula7.xml'),(80,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_computacao/eaddcc009/aula2/eaddcc009_aula2.xml'),(81,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/fisica/fisica2/cap17/temperaturaecalor.xml'),(82,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula00/Aula_00.xml'),(83,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/administracao_publica/matematica/aula2/pric2.xml'),(84,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/fisica/fisica2/cap15parte1/ondassergio.xml'),(85,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui025/aula1/eadqui025_aula1.xml'),(86,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula19/video19.xml'),(87,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/administracao_publica/psicologia/aula2/pscaula2.xml'),(88,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula_teste/dcc119_aulateste.xml'),(89,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula10/qui125_aula10.xml'),(90,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula08/Aula08.xml'),(91,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula9/Aula9.xml'),(92,'http://gia.inf.ufrgs.br/ontologies/videoaula/documentacao'),(93,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjfciencia_da_computacao/DCC116/Aula10/Aula10.xml'),(94,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui131/aula3/quim131_aula3.xml'),(95,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_computacao/eaddcc009/aula5/eaddcc009_aula5.xml'),(96,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui056/Aula2/aula2.xml'),(97,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_computacao/eaddcc007/unidade2/unidade2.xml'),(98,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/fisica/fisica2/cap14/fluidos.xml'),(99,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui030/aula67e8/eadqui030-aula67e8.xml'),(100,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula2/dcc119_aula2.xml'),(101,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula01/Aula01.xml'),(102,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula6/qui125_aula6.xml'),(103,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula4/video4.xml'),(104,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula23/Aula_23.xml'),(105,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula03/Aula03.xml'),(106,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula15/video15.xml'),(107,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc008_Calculo_Numerico/aula_01/video1.xml'),(108,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula16/qui125_aula16.xml'),(109,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula7/qui125_aula7.xml'),(110,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula05/Aula05.xml'),(111,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui131/aula2/quim131_aula2.xml'),(112,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc008/aula04/Calc_4.xml'),(113,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/administracao_publica/psicologia/aula3/pscaula3.xml'),(114,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula3/qui125_aula3.xml'),(115,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_computacao/eaddcc009/aula1/aula1.xml'),(116,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_computacao/eaddcc007/videoaula5/videoaula5.xml'),(117,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula8/dcc119_aula8.xml'),(118,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula5/qui125_aula5.xml'),(119,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula24/Aula_24.xml'),(120,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_computacao/eaddcc007/unidade1/unidade1.xml'),(121,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula4/dcc119_aula4.xml'),(122,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula8/qui125_aula8.xml'),(123,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui131/aula1/quim131_aula1.xml'),(124,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/fisica/fisica2/cap12parte1/grav1.xml'),(125,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula10/Aula10.xml'),(126,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/qui125/aula1/qui125_aula1.xml'),(127,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencia_da_computacao/DCC116/Aula02/Aula02.xml'),(128,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/licenciatura_quimica/eadqui056/Aula3/aula2.xml'),(129,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula1/Video1.xml'),(130,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/dcc119/aula5/dcc119_aula5.xml'),(131,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/administracao_publica/admeadinf/aula5/ead_fonseca_05_sd.xml'),(132,'http://videoaula.rnp.br/rioflashclient.php?xmlfile=//dados/conversao_html5/instituicao/ufjf/ciencias_exatas/DCC122/Aula20/video20.xml');
/*!40000 ALTER TABLE `tbl_videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-13 10:32:53
