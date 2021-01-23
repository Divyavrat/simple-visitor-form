SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `studentform`;
CREATE DATABASE `studentform` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `studentform`;

DROP TABLE IF EXISTS `formentries`;
CREATE TABLE `formentries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rollno` int(10) NOT NULL,
  `fullname` text NOT NULL,
  `phone` text NOT NULL,
  `address` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2021-01-23 15:48:04