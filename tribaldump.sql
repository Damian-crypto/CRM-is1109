-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: tribalexotic
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `deals`
--
DROP DATABASE IF EXISTS tribalexotic;
CREATE DATABASE tribalexotic;
USE tribalexotic;

DROP TABLE IF EXISTS `deals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deals` (
  `dealID` int(11) NOT NULL AUTO_INCREMENT,
  `dealName` varchar(40) NOT NULL,
  `amount` decimal(50,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `contactID` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `closingDate` date DEFAULT NULL,
  PRIMARY KEY (`dealID`),
  KEY `contactID` (`contactID`),
  CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`contactID`) REFERENCES `persons` (`personID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deals`
--

LOCK TABLES `deals` WRITE;
/*!40000 ALTER TABLE `deals` DISABLE KEYS */;
INSERT INTO `deals` VALUES (2,'Buying Hotel Accessories',4500000.00,NULL,3,'Negotiation','2022-02-21'),(4,'Buying Hotel Accessories',800000000.00,NULL,1,'Confirm','2022-03-21');
/*!40000 ALTER TABLE `deals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leads` (
  `leadID` int(11) NOT NULL AUTO_INCREMENT,
  `personID` int(11) DEFAULT NULL,
  `leadSource` varchar(100) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`leadID`),
  KEY `personID` (`personID`),
  CONSTRAINT `leads_ibfk_1` FOREIGN KEY (`personID`) REFERENCES `persons` (`personID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leads`
--

LOCK TABLES `leads` WRITE;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` VALUES (1,1,'youtube','1'),(3,6,'youtube','1'),(4,10,'youtube','2'),(5,7,'facebook','2'),(6,11,'WhatsApp','2'),(7,9,'facebook','1');
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `message` longtext DEFAULT NULL,
  `reply` longtext DEFAULT NULL,
  `personID` int(11) DEFAULT NULL,
  PRIMARY KEY (`messageID`),
  KEY `personID` (`personID`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`personID`) REFERENCES `persons` (`personID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (2,'This is a simple message to test Leave a message functionality.',NULL,3);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persons` (
  `personID` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(40) DEFAULT NULL,
  `lName` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNo` varchar(40) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`personID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (1,'Bill','Gates','billgate@outlook.com','2067093400','Business Magnate'),(3,'John','Doe','john@example.com','(555) 555-5555.','Business Man'),(4,'Channing','Estrada','nascetur.ridiculus@outlook.net','(127) 876-3884','A Corporation'),(5,'Nolan S','Newman','ivah1986@hotmail.com','817-675-2601','Reporter and Correspondent'),(6,'Michael B','Perkins','kaci_hirth1@yahoo.com','260-610-8843','Continuous Mining Machine Operator'),(7,'Gertrude C','Bidwell','sam.gleichn@hotmail.com','213-203-0958','Textile Cutting Machine Setter, Operator, and Tender'),(8,'Laura M','McCulloch','mohammad1995@yahoo.com','331-218-1690','Computer Systems Engineers/Architect'),(9,'Deanna N','Looney','kurtis2015@yahoo.com','770-778-8030','Oral and Maxillofacial Surgeon'),(10,'Elaine E','Clifton','earnestin0@hotmail.com',' 573-838-6268','Interior Designer'),(11,'Holly H','Wilton','karelle1977@hotmail.com','503-709-3743','Recreation Worker');
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `fName` varchar(40) DEFAULT NULL,
  `lName` varchar(40) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ucsc',NULL,NULL,'c0d0cb34565fe05ca2a14e8b13285bf6dbdf6dfc','ucsc@ucsc.cmb.ac.lk');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-22 21:37:30
