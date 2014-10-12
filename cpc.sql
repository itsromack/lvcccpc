-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cpc
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.14.04.1

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
-- Table structure for table `judges`
--

DROP TABLE IF EXISTS `judges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `judges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complete_name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `judges`
--

LOCK TABLES `judges` WRITE;
/*!40000 ALTER TABLE `judges` DISABLE KEYS */;
INSERT INTO `judges` VALUES (1,'Joseph Perdon','joseph','f2b14f68eb995facb3a1c35287b778d5bd785511'),(2,'Eldon Tenorio','eldon','f2b14f68eb995facb3a1c35287b778d5bd785511');
/*!40000 ALTER TABLE `judges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `question` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Measure a Quadrilateral',NULL),(2,'Volume and Area of a Cube',NULL),(3,'Super Mario Half-Pyramid',NULL),(4,'Addition of Matrices',NULL),(5,'Multiplication Table Generator',NULL),(6,'Speed and Distance',NULL),(7,'Even Fibonacci',NULL),(8,'Integer to Roman Numerals',NULL),(9,'Magic Square',NULL),(10,'Knight\'s Next Move',NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_id` int(11) DEFAULT NULL,
  `judge_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_answers`
--

DROP TABLE IF EXISTS `team_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `answer` text,
  `status` varchar(50) DEFAULT 'For Code Review',
  `code_reviewer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_answer_idx` (`question_id`,`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_answers`
--

LOCK TABLES `team_answers` WRITE;
/*!40000 ALTER TABLE `team_answers` DISABLE KEYS */;
INSERT INTO `team_answers` VALUES (1,4,1,'hello world!','Code Accepted',1),(2,2,2,'        <!--/span-->\r\n        <div class=\"span12\" id=\"content\">\r\n            <div class=\"row-fluid\">\r\n                <div class=\"span12\">','Code Rejected',1),(3,3,1,'testinlkjlfdkjgsdfg','For Code Review',NULL),(4,10,2,'adfsdf','For Code Review',NULL),(5,6,3,'asfdsdfsf','For Code Review',NULL),(6,3,4,'sgfdgsdfgsd','For Code Review',NULL);
/*!40000 ALTER TABLE `team_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `members` varchar(255) DEFAULT NULL,
  `language` varchar(30) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Vitamin C++','vitaminc++','a101fc22bab5e37cbabe70b718bbe38f743dd160','Joniel Quincena,Carl Angelo Pablea,Emmanuel Santiago','c++','BS-IS','College'),(2,'Javalanche Programmers','javalanche','e69913d877b24d4ed1d466f1d1c5198d4c7a3902','Christopher Monteron,Franz Dale Noa Cuneta,Mark Lois Razon','java','ComProg2','College'),(3,'Puzzle++','puzzle++','083b045c94a3d4fff48f9636318f65e65b6934c5',NULL,'C++','BS-IS','College'),(4,'Pseudo-coders','pseudocoders','8511cf206d561ce2cc7fd7cf7958f0c2a56103bf',NULL,'Java','ComProg','College'),(5,'Phoemonyx','phoemonyx','4f61640568d088713cd002bfd2ae9e02613f6fd6',NULL,'C++','BS-IS','College'),(6,'JMC++','jmc++','12e4247843f94b31c5f680e3c0d4dae57fe2a995',NULL,'C++','BS-IS','College'),(7,'Java Warrior','javawarrior','14d2b931e93835a5bbe743c22a009f370d72e3d4',NULL,'Java','ComProg','College'),(8,'J-Kyub','jkyub','0673c413dfe06b46357504f49eca925a9fbe21c0',NULL,'C++','BS-IS','College'),(9,'Logic Team','logic','f679a0c704124494c95f74acee8c8d4692270c73',NULL,'C++','BS-IS','College'),(10,'Y\'neng Team','yneng','61e30799ce10564878779ce1609e1a2a33f89c8f',NULL,'C++','BS-IS','College'),(11,'Curio','curio','4078568b218b6a0e586b474f418c403bbff63015',NULL,'C++','BS-IS','College'),(12,'Meow++','meow++','3542cd780914cb36ab3a1ddadd56f31e09fa31ac',NULL,'Java','ComProg','College'),(13,'A.C.E.','ace','0ad4c84927896a416d431d0e65e2ca3f45b34b61',NULL,'Java','ComProg','College'),(14,'CJ^2','cjsquared','85168d3323a787651ffde965988a68486fbeb599',NULL,'C++','BS-IS','College'),(15,'INT3GER','int3ger','e1ea02c04d16ac8d53e3715d4d7cacff564f9ff5',NULL,'C++','BS-IS','College'),(16,'Java Heroes','javaheroes','95fc38adf0597b4ff8a2e85ae45ba24a19cf65db',NULL,'C++','BS-IS','College'),(17,'The MVP\'s???','themvps','49136856e6a46bfc0f72fa7f8d673a9676689d99',NULL,'C++','BS-IS','College'),(18,'Code Geass','codegeass','f1ce06eabcdf6d835c105202f5290dbec41d2b69',NULL,'C++','BS-IS','College'),(19,'Code Bringers','codebringers','ce6c0ce87d64f92c7d8b0dc470bffe2a431c134b',NULL,'Java','ComProg','College'),(20,'MJT_AlgoriTeam','mjtalgoriteam','a19cc29037bfb07f63a1680a16398bc471cd5932',NULL,'Java','ComProg','College'),(21,'D\'coder','dcoder','7d5eccf6b134b42848a1e2bec4dc422a2e171d8f',NULL,'C++','ACT','College'),(22,'JCJ','jcj','b88f2e3e8564eaaf096ee8b3789da53a7aef6d99',NULL,'C++','BS-IS','College'),(23,'Javalicious','javalicious','1963f474d8cbe71cfb5a40fd60f19dcd1044f1b6',NULL,'Java','ComProg','College'),(24,'Apprentice','apprentice','1ed567febecc3d5a0b4f83b827e22883695b9396',NULL,'C++','ACT','College'),(25,'Pogirammers','pogirammers','0d9b3ffe76e56f4e1691264bc003cfe63f934974',NULL,'C++','ACT','College'),(26,'PowerC++','powerc++','714cee1c6a36fb2681b8b24a6ce29283d30aea42',NULL,'C++','ACT','College'),(27,'Tres Programiros','tresprogramiros','a5e689a2a453c4f54dd66a655ce68ee811fecbe7',NULL,'C++','ACT','College'),(28,'Team Name','teamname','b2e3c8339e55d5ec957912554be03406e97f1dba',NULL,'C++','ACT','College'),(29,'D\'Warriors','dwarriors','8f3b054c6681fd85574485ee2800be0328816d28',NULL,'C++','ACT','College'),(30,'JAE Programmer','jaeprogrammer','096ffe9c8f37694345bf2522b5bc6730048281e6',NULL,'C++','ACT','College'),(31,'Challengers','Challengers','62423153f380d198aba883d0e6ebecca873cf3ce',NULL,'C++','ACT','College'),(32,'The Innovator','innovator','3df396ba2038e69a686c551560c467988f39eb37',NULL,'QBasic','Grade 10','K-12'),(33,'10PaulRun','10paulrun','d33f33405446848b7e41b45ad11284856218f233',NULL,'QBasic','Grade 10','K-12'),(34,'(EP) Evolution Programmers','evolution','f9cb38a876f209dd1a2101edc97dad6a36a10efe',NULL,'QBasic','Grade 10','K-12'),(35,'ADA','ada','51404b19e4f34c2b7675e9c9898f9a67b5e00cc5',NULL,'QBasic','Grade 10','K-12'),(36,'Pyro','pyro','0febb1060effa0a3eb783c1ca7220ef766099490',NULL,'C++','Grade 9','K-12'),(37,'Equinox','equinox','dea7de38811bf93f93910cfbfe2e8e7a7f4625c5',NULL,'C++','Grade 9','K-12'),(38,'Blank','blank','6a84453b833ba682113bb1160e34342a57297cd2',NULL,'C++','Grade 9','K-12');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-11  6:15:01
