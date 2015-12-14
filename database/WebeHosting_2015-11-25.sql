# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 10.0.21-MariaDB)
# Database: WebeHosting
# Generation Time: 2015-11-30 10:34:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table database
# ------------------------------------------------------------

DROP TABLE IF EXISTS `database`;

CREATE TABLE `database` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `databaseName` varchar(60) NOT NULL DEFAULT '',
  `collation` varchar(30) DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table databaseuser
# ------------------------------------------------------------

DROP TABLE IF EXISTS `databaseuser`;

CREATE TABLE `databaseuser` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `createAccount` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table databaseUserLink
# ------------------------------------------------------------

DROP TABLE IF EXISTS `databaseUserLink`;

CREATE TABLE `databaseUserLink` (
  `databaseId` int(11) unsigned NOT NULL,
  `databaseUserId` int(11) unsigned NOT NULL,
  KEY `databaseLink` (`databaseId`),
  KEY `databaseUserLink` (`databaseUserId`),
  CONSTRAINT `databaseLink` FOREIGN KEY (`databaseId`) REFERENCES `database` (`id`),
  CONSTRAINT `databaseUserLink` FOREIGN KEY (`databaseUserId`) REFERENCES `databaseUser` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table domain
# ------------------------------------------------------------

DROP TABLE IF EXISTS `domain`;

CREATE TABLE `domain` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `aliases` int(10) unsigned NOT NULL DEFAULT '0',
  `mailBoxes` int(10) unsigned NOT NULL DEFAULT '0',
  `maxQuota` bigint(20) unsigned NOT NULL DEFAULT '0',
  `quota` bigint(20) unsigned NOT NULL DEFAULT '0',
  `transport` varchar(255) NOT NULL,
  `backupMx` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Postfix Admin - Virtual Domains';



# Dump of table mailbox
# ------------------------------------------------------------

DROP TABLE IF EXISTS `mailbox`;

CREATE TABLE `mailbox` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mailAddress` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mailDir` varchar(255) NOT NULL DEFAULT '',
  `quota` bigint(20) unsigned NOT NULL DEFAULT '0',
  `localPart` varchar(255) NOT NULL DEFAULT '',
  `domainId` int(11) unsigned NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `domain` (`domainId`),
  CONSTRAINT `DomainIdLink` FOREIGN KEY (`domainId`) REFERENCES `domain` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Postfix Admin - Virtual Mailboxes';



# Dump of table subDomain
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subDomain`;

CREATE TABLE `subDomain` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `domainId` int(11) unsigned DEFAULT NULL,
  `subDomain` varchar(127) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `subDomainDomainKey` (`domainId`),
  CONSTRAINT `subDomainDomainKey` FOREIGN KEY (`domainId`) REFERENCES `domain` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table unavailable
# ------------------------------------------------------------

DROP TABLE IF EXISTS `unavailable`;

CREATE TABLE `unavailable` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `character` varchar(20) DEFAULT '',
  `interval` smallint(4) unsigned NOT NULL DEFAULT '24',
  `mailboxId` int(11) unsigned NOT NULL,
  `from` varchar(50) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL,
  `body` varchar(500) NOT NULL DEFAULT '',
  `startDateTime` date NOT NULL,
  `endDateTime` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `MailboxIdLink` (`mailboxId`),
  CONSTRAINT `MailboxIdLink` FOREIGN KEY (`mailboxId`) REFERENCES `mailbox` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Postfix Admin - Virtual Vacation';



# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Postfix Admin - Virtual Admins';




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
