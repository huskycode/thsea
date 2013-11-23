/*
SQLyog Ultimate v9.02 
MySQL - 5.5.29-log : Database - thsea
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

/*Table structure for table `tbl_migration` */

DROP TABLE IF EXISTS `tbl_migration`;

CREATE TABLE `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=tis620;

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Video ID',
  `title` varchar(200) NOT NULL COMMENT 'Video title',
  `description` varchar(5000) DEFAULT NULL COMMENT 'Video description',
  `url` varchar(500) NOT NULL COMMENT 'Video url',
  `thumbnail_url` varchar(1000) DEFAULT NULL COMMENT 'Thumbnail url',
  `recording_date` date DEFAULT NULL COMMENT 'Recording date',
  `posted_date` datetime NOT NULL COMMENT 'Posted date',
  `posted_by` varchar(50) NOT NULL COMMENT 'Posted by',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4178 DEFAULT CHARSET=tis620 COMMENT='Video';

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
