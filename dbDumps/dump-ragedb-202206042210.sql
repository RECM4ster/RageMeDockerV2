-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: ragedb
-- ------------------------------------------------------
-- Server version	5.7.38

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
-- Table structure for table `adm`
--

DROP TABLE IF EXISTS `adm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_us_id` int(11) DEFAULT NULL,
  `adm_permission_lv` int(11) DEFAULT NULL,
  `adm_is_active` tinyint(1) DEFAULT NULL,
  `adm_time_create` int(11) DEFAULT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm`
--

LOCK TABLES `adm` WRITE;
/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_body` text,
  `com_user_id` int(11) DEFAULT NULL,
  `com_is_deleted` tinyint(1) DEFAULT NULL,
  `com_reactions` int(11) DEFAULT NULL,
  `com_post` int(11) DEFAULT NULL,
  `com_sub` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'sadsadda',4,NULL,NULL,8,NULL),(2,'xaxaxa',4,NULL,NULL,8,NULL);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_topic` varchar(255) DEFAULT NULL,
  `pos_body` text,
  `pos_user_id` int(11) DEFAULT NULL,
  `pos_reactions` int(11) DEFAULT NULL,
  `pos_is_deleted` tinyint(1) DEFAULT NULL,
  `pos_comment_is_enabled` tinyint(1) DEFAULT NULL,
  `pos_time_create` int(11) DEFAULT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'asad','asdasdxDxD',4,NULL,NULL,NULL,NULL),(2,'asad','asdasd',4,NULL,NULL,NULL,NULL),(3,'asad','asdasd',4,NULL,NULL,NULL,NULL),(4,'asad','asdasd',4,NULL,NULL,NULL,NULL),(5,'asad','asdasd',4,NULL,NULL,NULL,NULL),(6,'test','xaxaxa',4,NULL,NULL,NULL,1653519988),(7,'testPost','xaxaxaxa',4,NULL,NULL,NULL,1653780164),(8,'Testowy postr','Wyswietli sie\r\nÄ™?\r\ndcsac',4,NULL,0,NULL,1654114191);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reaction`
--

DROP TABLE IF EXISTS `reaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reaction` (
  `re_id` int(11) NOT NULL AUTO_INCREMENT,
  `re_post_id` int(11) DEFAULT NULL,
  `re_us_id` int(11) DEFAULT NULL,
  `re_active` int(11) DEFAULT NULL,
  PRIMARY KEY (`re_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reaction`
--

LOCK TABLES `reaction` WRITE;
/*!40000 ALTER TABLE `reaction` DISABLE KEYS */;
INSERT INTO `reaction` VALUES (8,4,4,0),(9,2,4,0),(10,1,4,1);
/*!40000 ALTER TABLE `reaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `ses_id` int(11) NOT NULL AUTO_INCREMENT,
  `ses_email` varchar(255) DEFAULT NULL,
  `ses_time_expire` int(11) NOT NULL,
  `token` text,
  PRIMARY KEY (`ses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES (5,'first@f.com',1652862772,'MTY1MjgxOTU3MmZpcnN0QGYuY29t'),(6,'first@f.com',1652862802,'MTY1MjgxOTYwMmZpcnN0QGYuY29t'),(7,'first@f.com',1652862817,'MTY1MjgxOTYxN2ZpcnN0QGYuY29t'),(8,'first@f.com',1652862903,'MTY1MjgxOTcwM2ZpcnN0QGYuY29t'),(9,'first@f.com',1652863027,'MTY1MjgxOTgyN2ZpcnN0QGYuY29t'),(10,'first@f.com',1652863128,'MTY1MjgxOTkyOGZpcnN0QGYuY29t'),(11,'first@f.com',1652863215,'MTY1MjgyMDAxNWZpcnN0QGYuY29t'),(12,'first@f.com',1652867721,'MTY1MjgyNDUyMWZpcnN0QGYuY29t'),(13,'first@f.com',1652867722,'MTY1MjgyNDUyMmZpcnN0QGYuY29t'),(14,'first@f.com',1652867723,'MTY1MjgyNDUyM2ZpcnN0QGYuY29t'),(15,'first@f.com',1652867723,'MTY1MjgyNDUyM2ZpcnN0QGYuY29t'),(16,'first@f.com',1652867764,'MTY1MjgyNDU2NGZpcnN0QGYuY29t'),(17,'first@f.com',1652867797,'MTY1MjgyNDU5N2ZpcnN0QGYuY29t'),(18,'',1652867799,'MTY1MjgyNDU5OQ=='),(19,'first@f.com',1652868454,'MTY1MjgyNTI1NGZpcnN0QGYuY29t'),(20,'first@f.com',1652871299,'MTY1MjgyODA5OWZpcnN0QGYuY29t'),(21,'first@f.com',1653377954,'MTY1MzMzNDc1NGZpcnN0QGYuY29t'),(22,'first@f.com',1653388842,'MTY1MzM0NTY0MmZpcnN0QGYuY29t'),(23,'first@f.com',1653461768,'MTY1MzQxODU2OGZpcnN0QGYuY29t'),(24,'grzegorz@xd.com',1653464158,'MTY1MzQyMDk1OGdyemVnb3J6QHhkLmNvbQ=='),(25,'grzegorz@xd.com',1653464470,'MTY1MzQyMTI3MGdyemVnb3J6QHhkLmNvbQ=='),(26,'grzegorz@xd.com',1653465162,'MTY1MzQyMTk2MmdyemVnb3J6QHhkLmNvbQ=='),(27,'grzegorz@xd.com',1653466174,'MTY1MzQyMjk3NGdyemVnb3J6QHhkLmNvbQ=='),(28,'grzegorz@xd.com',1653466305,'MTY1MzQyMzEwNWdyemVnb3J6QHhkLmNvbQ=='),(29,'grzegorz@xd.com',1653466643,'MTY1MzQyMzQ0M2dyemVnb3J6QHhkLmNvbQ=='),(30,'grzegorz@xd.com',1653468019,'MTY1MzQyNDgxOWdyemVnb3J6QHhkLmNvbQ=='),(31,'grzegorz@xd.com',1653469081,'MTY1MzQyNTg4MWdyemVnb3J6QHhkLmNvbQ=='),(32,'grzegorz@xd.com',1653556656,'MTY1MzUxMzQ1NmdyemVnb3J6QHhkLmNvbQ=='),(33,'grzegorz@xd.com',1653557425,'MTY1MzUxNDIyNWdyemVnb3J6QHhkLmNvbQ=='),(34,'grzegorz@xd.com',1653557466,'MTY1MzUxNDI2NmdyemVnb3J6QHhkLmNvbQ=='),(35,'grzegorz@xd.com',1653557565,'MTY1MzUxNDM2NWdyemVnb3J6QHhkLmNvbQ=='),(36,'',1653560033,'MTY1MzUxNjgzMw=='),(37,'',1653560374,'MTY1MzUxNzE3NA=='),(38,'grzegorz@xd.com',1653561002,'MTY1MzUxNzgwMmdyemVnb3J6QHhkLmNvbQ=='),(39,'grzegorz@xd.com',1653561081,'MTY1MzUxNzg4MWdyemVnb3J6QHhkLmNvbQ=='),(40,'grzegorz@xd.com',1653811559,'MTY1Mzc2ODM1OWdyemVnb3J6QHhkLmNvbQ=='),(41,'grzegorz@xd.com',1653812881,'MTY1Mzc2OTY4MWdyemVnb3J6QHhkLmNvbQ=='),(42,'grzegorz@xd.com',1653816292,'MTY1Mzc3MzA5MmdyemVnb3J6QHhkLmNvbQ=='),(43,'grzegorz@xd.com',1653823336,'MTY1Mzc4MDEzNmdyemVnb3J6QHhkLmNvbQ=='),(44,'grzegorz@xd.com',1653881933,'MTY1MzgzODczM2dyemVnb3J6QHhkLmNvbQ=='),(45,'grzegorz@xd.com',1653895981,'MTY1Mzg1Mjc4MWdyemVnb3J6QHhkLmNvbQ=='),(46,'grzegorz@xd.com',1653900591,'MTY1Mzg1NzM5MWdyemVnb3J6QHhkLmNvbQ=='),(47,'grzegorz@xd.com',1653901452,'MTY1Mzg1ODI1MmdyemVnb3J6QHhkLmNvbQ=='),(48,'grzegorz@xd.com',1653902308,'MTY1Mzg1OTEwOGdyemVnb3J6QHhkLmNvbQ=='),(49,'grzegorz@xd.com',1653902384,'MTY1Mzg1OTE4NGdyemVnb3J6QHhkLmNvbQ=='),(50,'grzegorz@xd.com',1653903349,'MTY1Mzg2MDE0OWdyemVnb3J6QHhkLmNvbQ=='),(51,'grzegorz@xd.com',1653904127,'MTY1Mzg2MDkyN2dyemVnb3J6QHhkLmNvbQ=='),(52,'xd@xd.com',1653907574,'MTY1Mzg2NDM3NHhkQHhkLmNvbQ=='),(53,'xdd@xdd.com',1653907655,'MTY1Mzg2NDQ1NXhkZEB4ZGQuY29t'),(54,'xd@xd.com',1653907782,'MTY1Mzg2NDU4MnhkQHhkLmNvbQ=='),(55,'grzegorz@xd.com',1653907806,'MTY1Mzg2NDYwNmdyemVnb3J6QHhkLmNvbQ=='),(56,'grzegorz@xd.com',1653910038,'MTY1Mzg2NjgzOGdyemVnb3J6QHhkLmNvbQ=='),(57,'grzegorz@xd.com',1654147191,'MTY1NDEwMzk5MWdyemVnb3J6QHhkLmNvbQ=='),(58,'grzegorz@xd.com',1654148870,'MTY1NDEwNTY3MGdyemVnb3J6QHhkLmNvbQ=='),(59,'grzegorz@xd.com',1654384160,'MTY1NDM0MDk2MGdyemVnb3J6QHhkLmNvbQ=='),(60,'grzegorz@xd.com',1654384173,'MTY1NDM0MDk3M2dyemVnb3J6QHhkLmNvbQ=='),(61,'grzegorz@xd.com',1654384440,'MTY1NDM0MTI0MGdyemVnb3J6QHhkLmNvbQ=='),(62,'grzegorz@xd.com',1654386882,'MTY1NDM0MzY4MmdyemVnb3J6QHhkLmNvbQ=='),(63,'grzegorz@xd.com',1654386938,'MTY1NDM0MzczOGdyemVnb3J6QHhkLmNvbQ=='),(64,'grzegorz@xd.com',1654386953,'MTY1NDM0Mzc1M2dyemVnb3J6QHhkLmNvbQ==');
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_name` varchar(32) DEFAULT NULL,
  `us_email` varchar(255) DEFAULT NULL,
  `us_password` varchar(255) DEFAULT NULL,
  `us_picture` varchar(255) DEFAULT NULL,
  `us_sex` int(11) DEFAULT NULL,
  `us_pronoun` int(11) DEFAULT NULL,
  `us_is_active` tinyint(1) DEFAULT NULL,
  `us_time_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'first','first@f.com','bbc426365dfd77ce69359292ce6621ec6993219c',NULL,NULL,NULL,1,'2022-05-17 20:06:52'),(3,'asdasd','sdasd@as.pl','dcd1add5e2dd52e21c1328d2ca4a464164217abf',NULL,NULL,NULL,NULL,'2022-05-24 19:30:15'),(4,'xaxaxa','grzegorz@xd.com','bbc426365dfd77ce69359292ce6621ec6993219c','grzegorz@xd.compobrane.png',NULL,NULL,1,'2022-05-24 19:35:35'),(5,'recovery','recovery@rgm.com','bbc426365dfd77ce69359292ce6621ec6993219c',NULL,NULL,NULL,1,'2022-06-01 17:18:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ragedb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-04 22:10:37
