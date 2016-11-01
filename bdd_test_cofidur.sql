-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: cofidur
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formation_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64C19C15200282E` (`formation_id`),
  CONSTRAINT `FK_64C19C15200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,3,'Freinage de la visserie',1),(2,3,'Produits de freinage et recommandations',2),(3,3,'Marquage de la visserie',3);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formation`
--

DROP TABLE IF EXISTS `formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `criticality` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teachingAids` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `placesMaterialRessources` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formation`
--

LOCK TABLES `formation` WRITE;
/*!40000 ALTER TABLE `formation` DISABLE KEYS */;
INSERT INTO `formation` VALUES (3,6,'Visserie','Savoir effectuer les diverses op├⌐rations de freinage et marquage visserie sur les produits THALES DAE en respectant leurs contraintes et exigences d├⌐finies dans les proc├⌐dures','CEPX/METH/CL/09/017 - FREINAGE ET MARQUAGE VISSERIE','Support de formation pour le freinage et le marquage de la visserie CEPX/METH/CL/09/06 (document issu des proc├⌐dures Thal├¿s DAE 16262754 / Freinage d├⌐montage de la visserie et 16262760-024 / Marquage de la visserie )','Formation en salle');
/*!40000 ALTER TABLE `formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `superior_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`),
  KEY `IDX_957A647963D7ADF1` (`superior_id`),
  CONSTRAINT `FK_957A647963D7ADF1` FOREIGN KEY (`superior_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fos_user`
--

LOCK TABLES `fos_user` WRITE;
/*!40000 ALTER TABLE `fos_user` DISABLE KEYS */;
INSERT INTO `fos_user` VALUES (1,'flodavid','flodavid','fl.david.53@gmail.com','fl.david.53@gmail.com',1,'hrgn8jj64xcs8swwskgg48kw48gw88g','$2y$13$hrgn8jj64xcs8swwskgg4uaJvsb.0W3JGqK1tW5IVLliT8fry7WZm','2016-11-01 15:02:37',0,0,NULL,NULL,NULL,'a:1:{i:0;s:10:\"ROLE_ADMIN\";}',0,NULL,'Florian','David',NULL,NULL),(6,'user','user','user@user.fr','user@user.fr',1,'lmvz33jn9bkscw4c0cs4k44ws888s48','$2y$13$lmvz33jn9bkscw4c0cs4kuxBE18.gv4U0xKzUwMmWv4/U9L7/yxSu',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'User','User',NULL,NULL),(8,'root','root','root@root.fr','root@root.fr',1,'3mn60uyacqgwg40g4sksoggs48s4kcs','$2y$13$3mn60uyacqgwg40g4sksoerqHYbDnxGMyKRMtGXjQaJN2OLR85vHO',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'Root','Root',NULL,NULL),(9,'vdeleeuw','vdeleeuw','valerian.deleuuw@etud.univ-angers.fr','valerian.deleuuw@etud.univ-angers.fr',1,'lssxsdpnny80gk8w0so0owc484wcw00','$2y$13$lssxsdpnny80gk8w0so0ouRYyAUsrdOK58J2iqIzDPhNBhMwhKXqi',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'Val├⌐rian','Deleeuw',NULL,NULL),(10,'ascris','ascris','antoine.garnier@etud.univ-angers.fr','antoine.garnier@etud.univ-angers.fr',1,'of7gew710qo08scgc8gsocgc0ockgw8','$2y$13$of7gew710qo08scgc8gsoOukkMz.XYFw5z6.VnNLOc7ecQZHGnWLi',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'Antoine','Garnier',NULL,NULL);
/*!40000 ALTER TABLE `fos_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operator`
--

DROP TABLE IF EXISTS `operator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D7A6A78192FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_D7A6A781A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_D7A6A781C05FB297` (`confirmation_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operator`
--

LOCK TABLES `operator` WRITE;
/*!40000 ALTER TABLE `operator` DISABLE KEYS */;
/*!40000 ALTER TABLE `operator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operator_category`
--

DROP TABLE IF EXISTS `operator_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operator_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operator_formation_id` int(11) DEFAULT NULL,
  `dateSignature` date DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nbHours` time DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D26A6CFBDDCC0FB9` (`operator_formation_id`),
  KEY `IDX_D26A6CFB12469DE2` (`category_id`),
  KEY `IDX_D26A6CFBFB08EDF6` (`trainer_id`),
  CONSTRAINT `FK_D26A6CFB12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `FK_D26A6CFBDDCC0FB9` FOREIGN KEY (`operator_formation_id`) REFERENCES `operator_formation` (`id`),
  CONSTRAINT `FK_D26A6CFBFB08EDF6` FOREIGN KEY (`trainer_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operator_category`
--

LOCK TABLES `operator_category` WRITE;
/*!40000 ALTER TABLE `operator_category` DISABLE KEYS */;
INSERT INTO `operator_category` VALUES (1,3,NULL,NULL,NULL,1,NULL),(2,3,NULL,NULL,NULL,2,NULL),(3,3,NULL,NULL,NULL,3,NULL),(4,4,NULL,NULL,NULL,1,NULL),(5,4,NULL,NULL,NULL,2,NULL),(6,4,NULL,NULL,NULL,3,NULL),(7,5,NULL,NULL,NULL,1,NULL),(8,5,NULL,NULL,NULL,2,NULL),(9,5,NULL,NULL,NULL,3,NULL);
/*!40000 ALTER TABLE `operator_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operator_formation`
--

DROP TABLE IF EXISTS `operator_formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operator_formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateBegin` date NOT NULL,
  `dateEnd` date NOT NULL,
  `validation` int(11) NOT NULL,
  `commentary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operator_id` int(11) DEFAULT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `former_id` int(11) DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8698DE78584598A3` (`operator_id`),
  KEY `IDX_8698DE785200282E` (`formation_id`),
  KEY `IDX_8698DE786C20F19` (`former_id`),
  CONSTRAINT `FK_8698DE785200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  CONSTRAINT `FK_8698DE78584598A3` FOREIGN KEY (`operator_id`) REFERENCES `fos_user` (`id`),
  CONSTRAINT `FK_8698DE786C20F19` FOREIGN KEY (`former_id`) REFERENCES `fos_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operator_formation`
--

LOCK TABLES `operator_formation` WRITE;
/*!40000 ALTER TABLE `operator_formation` DISABLE KEYS */;
INSERT INTO `operator_formation` VALUES (1,'2016-01-01','2015-01-01',2,'RAS',1,3,9,NULL),(2,'2011-01-01','2011-01-01',1,'RAS',1,3,8,NULL),(3,'2016-04-01','2015-01-01',4,'RAS',10,3,1,NULL),(4,'2015-01-01','2016-01-01',1,'RAS',1,3,10,NULL),(5,'2016-01-01','2017-01-01',1,'RAS',1,3,6,NULL);
/*!40000 ALTER TABLE `operator_formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operator_task`
--

DROP TABLE IF EXISTS `operator_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operator_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operator_category_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_40ED61AA8DB60186` (`task_id`),
  KEY `IDX_40ED61AABBFFF53E` (`operator_category_id`),
  CONSTRAINT `FK_40ED61AA8DB60186` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`),
  CONSTRAINT `FK_40ED61AABBFFF53E` FOREIGN KEY (`operator_category_id`) REFERENCES `operator_category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operator_task`
--

LOCK TABLES `operator_task` WRITE;
/*!40000 ALTER TABLE `operator_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `operator_task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_527EDB2512469DE2` (`category_id`),
  CONSTRAINT `FK_527EDB2512469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (1,1,'Pr├⌐paration des surfaces',1),(2,1,'<b>Application du produit de freinage</b>',2),(3,1,'Pose du produit de freinage',3),(4,1,'Dimensionnement du d├⌐p├┤t',4),(5,1,'<b>Proc├⌐dure de montage des points de fixation viss├⌐s d\'un assemblage</b>',5),(6,1,'Polym├⌐risation',6),(7,1,'V├⌐rification de conformit├⌐',7),(8,2,'Les produits de freinage ana├⌐robies (frein filet)',1),(9,2,'Restriction d\'emploi',2),(10,2,'Synth├¿se sur le freinage visserie',3),(11,3,'Proc├⌐d├⌐ du cautionnement du serrage au couple',1),(12,3,'Pr├⌐paration des surfaces',2),(13,3,'<b>Application du marquage (cas des vis ├á t├¬te non frais├⌐e et cas des vis ├á t├¬te frais├⌐e)</b>',3),(14,3,'Dimensionnement du marquage',4),(15,3,'Proc├⌐dure de marquage des points de fixation viss├⌐s d\'un assemblage',5),(16,3,'V├⌐rification de conformit├⌐',6),(17,3,'Les produits de cautionnement utilisables',7);
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-01 16:07:13
