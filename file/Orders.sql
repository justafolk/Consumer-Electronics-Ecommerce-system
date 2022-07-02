-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: EcommerceOP
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Orders` (
  `order_id` varchar(50) NOT NULL,
  `Grand_total` int NOT NULL,
  `invoice_no` int NOT NULL,
  `Product_enc` int NOT NULL,
  `TrackingID` varchar(255) NOT NULL,
  `Delivery_Date` date NOT NULL,
  `Order_Date` date NOT NULL,
  `Order_status` varchar(255) NOT NULL,
  `Taxes` float NOT NULL,
  `Shipping_cost` float NOT NULL,
  `c_id` int NOT NULL,
  `Prod_id` int NOT NULL,
  `s_id` int NOT NULL,
  `s_mail` varchar(255) NOT NULL,
  `Method` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`invoice_no`),
  KEY `c_id` (`c_id`),
  KEY `Prod_id` (`Prod_id`),
  KEY `s_id` (`s_id`,`s_mail`),
  CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `UserDB` (`c_id`),
  CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`Prod_id`) REFERENCES `ProductDB` (`Prod_ID`),
  CONSTRAINT `Orders_ibfk_3` FOREIGN KEY (`s_id`, `s_mail`) REFERENCES `SellerDB` (`s_id`, `s_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` VALUES ('123',3152,634,63,'aisdja','1930-02-02','1930-02-02','verified',13.23,23.2,194034,194028,194033,'avdhut.kamble776@gmail.com','In-store'),('13241',214124,124241,12424,'aisdja','1930-02-02','1930-02-02','verified',13.23,23.2,194034,194028,194033,'avdhut.kamble776@gmail.com',NULL);
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-29  7:56:50
