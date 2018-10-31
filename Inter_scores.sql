-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `dpanzoli`;

DROP TABLE IF EXISTS `Inter_scores`;
CREATE TABLE `Inter_scores` (
  `id_user` varchar(12) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Inter_scores` (`id_user`, `score`) VALUES
('Cyr13ll32903',	100);

-- 2018-10-31 08:30:56
