-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `dpanzoli`;

DROP TABLE IF EXISTS `Variables`;
CREATE TABLE `Variables` (
  `id_user` varchar(12) NOT NULL,
  `variable` varchar(30) NOT NULL,
  `valeur` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`variable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Variables` (`id_user`, `variable`, `valeur`) VALUES
('Cyr13ll32903',	'jauge_compétence',	100),
('D4v1d1001',	'indice_serviable',	10);

-- 2018-10-31 10:58:31
