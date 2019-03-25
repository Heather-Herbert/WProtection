
CREATE DATABASE `WPCheck` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `API_Calls` (
  `idAPI_Calls` int(11) NOT NULL AUTO_INCREMENT,
  `User` varchar(45) DEFAULT NULL,
  `TimeStamp` datetime DEFAULT NULL,
  PRIMARY KEY (`idAPI_Calls`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `API_Levels` (
  `idAPI_Levels` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idAPI_Levels`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `API_Users` (
  `idAPI_Users` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `GUID` varchar(45) NOT NULL,
  `Level` int(10) unsigned zerofill NOT NULL,
  `Secreat` varchar(65) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idAPI_Users`),
  UNIQUE KEY `GUID_UNIQUE` (`GUID`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `Secreat_UNIQUE` (`Secreat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `CoreHashs` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `Version` varchar(45) NOT NULL,
  `FilePath` varchar(255) NOT NULL,
  `sha512Hash` varchar(64) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DELIMITER $$
CREATE DEFINER=`Heather`@`localhost` PROCEDURE `CHECK_Hash`(IN version varchar(45), IN filePath varchar(255), IN hashToCheck varchar(64))
BEGIN

 Select count(*) FROM CoreHashs AS ch WHERE
	ch.Version = version AND
    ch.FilePath = filePath AND
    ch.sha512Hash = hashToCheck;

END$$
DELIMITER ;



