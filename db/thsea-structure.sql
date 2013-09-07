/*
SQLyog Ultimate v9.02 
MySQL - 5.5.29 : Database - thsea
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`thsea` /*!40100 DEFAULT CHARACTER SET tis620 */;

USE `thsea`;

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Video ID',
  `title` varchar(200) NOT NULL COMMENT 'Video title',
  `description` varchar(2000) DEFAULT NULL COMMENT 'Video description',
  `url` varchar(500) NOT NULL COMMENT 'Video url',
  `recording_date` date DEFAULT NULL COMMENT 'Recording date',
  `posted_date` datetime NOT NULL COMMENT 'Posted date',
  `posted_by` varchar(50) NOT NULL COMMENT 'Posted by',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4147 DEFAULT CHARSET=tis620 COMMENT='Video';

/*Table structure for table `video_tag` */

DROP TABLE IF EXISTS `video_tag`;

CREATE TABLE `video_tag` (
  `video_id` int(11) NOT NULL COMMENT 'Video ID',
  `tag` varchar(50) NOT NULL COMMENT 'tag',
  PRIMARY KEY (`video_id`,`tag`),
  CONSTRAINT `FK_video_tag` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=tis620 COMMENT='Video tag';

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
