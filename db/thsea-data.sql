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

/*Data for the table `video` */

insert  into `video`(`id`,`title`,`description`,`url`,`recording_date`,`posted_date`,`posted_by`) values (4143,'Agile Thailand 2013 : วิกฤติโปรแกรมเมอร์ไทย แก้ได้ด้วยอไจล','จาก \"แบไต๋ไฮเทค: Special Report - วิกฤตการณ์โปรแกรมเมอร์ไทย\" ได้เกิดการถกเถียงกันอย่างมากใน Facebook Group ของ Agile66 ถึงสาเหตุที่แท้จริงของปัญหา รวมไปถึงหนทางที่จะแก้ไข เราจึงพูดคุยกันว่าเราจะเอาเรื่องนี้มาคุย?กันใน กิจกรรมประจำปีของชาว Agile ที่มีชื่อว่า Agile Thailand 2013 ทำให้เกิดเป็น Panel Discussion Session ดราม่าแห่งปี ในชื่อ \"วิกฤติโปรแกรมเมอร์ไทย แก้ได้ด้วยอไจล์\"','http://youtu.be/gVaRj5GgOPg',NULL,'2013-07-20 00:00:00','admin'),(4144,'Agile Thailand 2013 : Agile in Startup',NULL,'http://youtu.be/qYxFmmV0eA0',NULL,'2013-07-20 00:00:00','admin'),(4145,'Agile Thailand 2013 : Agile vs Lean','Welcome to the lean entrepreneur','http://youtu.be/ZM7PYrJ0MCE',NULL,'2013-07-20 00:00:00','admin'),(4146,'Agile Thailand 2013 : Kamon\'s Rules','สร้างกฏไว้เยอะเกินจนงง ดู NCIS แล้วเค้ามี Gibbs\' Rules เลยคิดว่าต้องทำบ้างแล้ว http://korn4d.wordpress.com/kamon-rules','http://youtu.be/aD6eYjK36fA',NULL,'2013-07-20 00:00:00','admin');

/*Data for the table `video_tag` */

insert  into `video_tag`(`video_id`,`tag`) values (4143,'2013'),(4143,'Agile Thailand'),(4144,'2013'),(4144,'Agile Thailand'),(4145,'2013'),(4145,'Agile Thailand'),(4146,'2013'),(4146,'Agile Thailand');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
