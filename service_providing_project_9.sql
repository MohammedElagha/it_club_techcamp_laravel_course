/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 5.7.24 : Database - service_providing_project
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`service_providing_project` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `service_providing_project`;

/*Table structure for table `user_group_sections` */

DROP TABLE IF EXISTS `user_group_sections`;

CREATE TABLE `user_group_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_group_sections` */

insert  into `user_group_sections`(`id`,`user_group_id`,`section_id`,`created_at`,`updated_at`) values 
(1,1,1,'2019-09-02 09:07:04',NULL),
(3,1,3,'2019-09-02 09:07:07',NULL),
(5,1,4,'2019-09-02 09:08:57',NULL),
(6,1,2,'2019-09-02 11:04:40',NULL),
(7,1,5,'2019-09-03 08:21:01',NULL),
(8,2,1,'2019-09-03 08:48:51',NULL),
(9,2,2,'2019-09-03 08:48:51',NULL),
(10,2,4,'2019-09-03 08:48:51',NULL),
(11,1,6,'2019-09-03 09:08:24',NULL);

/*Table structure for table `user_groups` */

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_groups` */

insert  into `user_groups`(`id`,`name`,`created_at`,`updated_at`,`deleted_at`,`created_by`,`updated_by`,`deleted_by`) values 
(1,'Super Admin','2019-09-02 08:52:33',NULL,NULL,NULL,NULL,NULL),
(2,'Test','2019-09-03 05:48:51','2019-09-03 05:48:51',NULL,1,NULL,NULL);

/*Table structure for table `user_logins` */

DROP TABLE IF EXISTS `user_logins`;

CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_logins` */

insert  into `user_logins`(`id`,`user_id`,`username`,`password`,`created_at`,`updated_at`) values 
(1,1,'test_user','$2y$12$obLMREtGKEZ5BMjh0xUOr.i0tjW7fCQ5/ZJFZ4jQh2dYNm04l7IBG','2019-09-15 08:36:13',NULL);

/*Table structure for table `user_tokens` */

DROP TABLE IF EXISTS `user_tokens`;

CREATE TABLE `user_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_tokens` */

insert  into `user_tokens`(`id`,`user_id`,`token`,`created_at`,`updated_at`) values 
(1,1,'u4aAxDkiawjhCcu0V46ItKMPkqXdM343CED9prHbIELMvhQljqygSrfbhfaB','2019-09-15 05:54:16','2019-09-15 05:54:16');

/*Table structure for table `user_types` */

DROP TABLE IF EXISTS `user_types`;

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_types` */

insert  into `user_types`(`id`,`type`,`created_at`,`updated_at`) values 
(1,'CLIENT','2019-08-18 20:25:45',NULL),
(2,'PROVIDER','2019-08-18 20:25:53',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`phone`,`email`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'970561333','any@test.com','2019-09-15 08:35:41',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
