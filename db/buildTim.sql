CREATE DATABASE  IF NOT EXISTS `timedemodb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `timedemodb`;

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
DROP TABLE IF EXISTS Activity;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Activity (
  activityID int(11) NOT NULL,
  activityDescription varchar(55) NOT NULL,
  parentID int(11) DEFAULT NULL,
  PRIMARY KEY (activityID)
);
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES Activity WRITE;
/*!40000 ALTER TABLE Activity DISABLE KEYS */;
INSERT INTO Activity VALUES (23,'Other',NULL),(24,'Sales Planning',NULL),(25,'Contract Preparation',NULL),(26,'Customer Relationship',NULL),(27,'Compliance',NULL),(28,'Renewal',NULL),(29,'Sales Negotiation',NULL),(30,'Sales Proposal',NULL),(31,'Pre-Sales to Current Customers',NULL),(32,'Pre-Sales to New Customers',NULL);
/*!40000 ALTER TABLE Activity ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS Configuration;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Configuration (
  configurationID int(11) NOT NULL,
  keyword varchar(45) NOT NULL,
  PRIMARY KEY (configurationID),
  UNIQUE KEY configurationID_UNIQUE (configurationID)
);
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES Configuration WRITE;
/*!40000 ALTER TABLE Configuration DISABLE KEYS */;
/*!40000 ALTER TABLE Configuration ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS Roles;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Roles (
  roleID int(11) NOT NULL,
  roleName varchar(45) NOT NULL,
  PRIMARY KEY (roleID),
  UNIQUE KEY roleID_UNIQUE (roleID)
);
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES Roles WRITE;
/*!40000 ALTER TABLE Roles DISABLE KEYS */;
/*!40000 ALTER TABLE Roles ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS TimeRecords;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE TimeRecords (
  itemRecordID int(11) NOT NULL,
  userID int(11) NOT NULL,
  startTime datetime NOT NULL,
  endTime datetime NOT NULL,
  activityID int(11) NOT NULL,
  createDate datetime NOT NULL,
  createUID int(11) NOT NULL,
  modifiedDate datetime DEFAULT NULL,
  modifiedUID int(11) DEFAULT NULL,
  PRIMARY KEY (itemRecordID),
  UNIQUE KEY itemRecordID_UNIQUE (itemRecordID)
);
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES TimeRecords WRITE;
/*!40000 ALTER TABLE TimeRecords DISABLE KEYS */;
/*!40000 ALTER TABLE TimeRecords ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS Users;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE Users (
  userID int(10) unsigned NOT NULL,
  firstName varchar(45) NOT NULL,
  lastName varchar(45) NOT NULL,
  userName varchar(45) NOT NULL,
  roleID int(11) DEFAULT NULL,
  userPassword varchar(255) DEFAULT NULL,
  PRIMARY KEY (userID),
  UNIQUE KEY userName_UNIQUE (userName)
);
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES Users WRITE;
/*!40000 ALTER TABLE Users DISABLE KEYS */;
INSERT INTO Users VALUES (3,'Shaan','Foltz','shaanr',1,'test');
/*!40000 ALTER TABLE Users ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 DROP PROCEDURE IF EXISTS spCheckUsernameExists */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=root@localhost PROCEDURE spCheckUsernameExists(IN uname varchar(45))
BEGIN
	SELECT userName FROM Users WHERE userName = uname;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS spGetAllActivities */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=root@localhost PROCEDURE spGetAllActivities()
BEGIN
	SELECT activityID, activityDescription, parentID FROM Activity;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS spInsertTimeRecord */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=root@localhost PROCEDURE spInsertTimeRecord(IN `uid` INT, IN `startTime` INT, IN `endTime` INT, IN `activityID` INT)
INSERT INTO TimeRecords (userID, startTime, endTime, activityID, createDate, createUID)
        VALUES (uid, startTime, endTime, activityID, now(), uid) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

