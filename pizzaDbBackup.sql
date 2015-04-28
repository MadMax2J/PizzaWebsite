-- MySQL dump 10.13  Distrib 5.6.21, for Win32 (x86)
--
-- Host: localhost    Database: pizza
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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) NOT NULL,
  `student` char(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `size` varchar(20) NOT NULL,
  `anchovies` char(1) NOT NULL,
  `pineapples` char(1) NOT NULL,
  `pepperoni` char(1) NOT NULL,
  `olives` char(1) NOT NULL,
  `onions` char(1) NOT NULL,
  `createddatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int(4) NOT NULL,
  `peppers` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (115,'55390eaa31a11','n','Bob','Maluga','bob@maluga.com','Notredame Paris, France','0033123456789',16.00,'large','n','y','y','y','n','2015-04-23 16:24:26',0,'y'),(116,'553e6b6bd3adf','y','patrick','mcinerney','test@test.com','123 test street\r\ntest town','1234567890',13.00,'medium','y','y','y','n','n','2015-04-27 18:01:32',0,'n'),(118,'553fcd55cffce','y','John','John','asdf@asdf.asd','sdafdfa','45678',12.00,'medium','n','n','y','n','n','2015-04-28 19:11:33',0,'y'),(119,'553fcdf0277d0','y','John','','sd@adsa.asd','56879uhkl','345678543567',12.00,'medium','n','n','y','n','n','2015-04-28 19:14:08',0,'y'),(120,'553fd0f6105c1','y','John','','usscork@gmail.com','Shanaglish, Hartlands Avenue, Glasheen, Cork','0879500440',14.00,'large','n','n','y','n','n','2015-04-28 19:27:02',0,'y');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-28 19:37:18
