-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: WholeSnnak
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('aaron','will','be','$2y$10$kJB3Tgk5bvwYp0w7snz7TugwlsFvelZaZ7Pu5BAOZANp8Mba6e0QG'),('dipesh','patel','dipesh','$2y$10$3Y3eq5ANLMSjQagL/NjFZuvCCqqBpC6Ca6VMx7umQMtDMMP30no52'),('dog','dog','dog','$2y$10$GM6sh1rCpH/95zrAdNVQ/uWXC/sNtALlXjHRLe4J6esi5/RZM.Ray'),('Rushil','is','doing','$2y$10$Z9sXcHTFTimX7SFpNA1VE.wOYTsIFH8E7g2rU7kOkhCVVqFbT/pDW'),('oh','my','gah','$2y$10$e7OVmrgWzTWxPpJbh20hIuH/ebY8i4ptgxEBpHcqwBh2R2THdtAN2'),('running','out','of','$2y$10$qYAoiOYqBWRnGCliBBNeau4tCJTyIVPcvjeVY5GPpQpGX2309XRli'),('post','post','post','$2y$10$/H1C6xHDRpD8OXNXzz8Oj.jIkf4UJeLVMKo3CEp9qKnn4uDLVPFlK'),('smit','is','the','$2y$10$SKaCEAGc5ru5hzaMF4jaruBy3RbLrQOwsW1YGHUxN8DRIOY2HaW/a'),('pri','yank','was','$2y$10$is0Kng.RmKzaoMqSpRbI1OkkD7cQG6Ij0yJRsYGDKOhOM8jZqR18y'),('some','ting','wong','$2y$10$WgpqdAEVv5kVWObkOWL3e.HZI/XR14/jrrymG.E7GPETYc7C5nRkK');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view`
--

DROP TABLE IF EXISTS `view`;
/*!50001 DROP VIEW IF EXISTS `view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view` AS SELECT 
 1 AS `firstname`,
 1 AS `lastname`,
 1 AS `username`,
 1 AS `password`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view`
--

/*!50001 DROP VIEW IF EXISTS `view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view` AS select `user`.`firstname` AS `firstname`,`user`.`lastname` AS `lastname`,`user`.`username` AS `username`,`user`.`password` AS `password` from `user` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-22 20:07:42
