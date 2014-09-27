-- http://www.phpmyadmin.net
--
-- Host: localhost

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- create database

CREATE DATABASE IF NOT EXISTS `task_list` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `task_list`;

-- create table structure

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` varchar(255) NOT NULL,
  `dueDate` date NOT NULL,
  `urgency` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;
