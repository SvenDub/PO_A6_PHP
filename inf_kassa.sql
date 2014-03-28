-- phpMyAdmin SQL Dump
-- version 4.0.9deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2014 at 08:43 AM
-- Server version: 5.5.35-0+wheezy1
-- PHP Version: 5.5.6-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inf_kassa`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `Actieve bestellingen`
--
CREATE TABLE IF NOT EXISTS `Actieve bestellingen` (
`nummer` int(11)
,`bestellingnummer` int(11)
,`id` int(11)
,`productcode` int(4)
,`aantal_besteld` int(11)
,`opmerking` text
,`datum` date
,`status` tinyint(4)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `Actieve tafels`
--
CREATE TABLE IF NOT EXISTS `Actieve tafels` (
`nummer` int(11)
,`id` int(4)
,`tafelnummer` int(3)
,`aantal_klanten` tinyint(4)
,`actief` tinyint(1)
,`datum` date
);
-- --------------------------------------------------------

--
-- Table structure for table `bestellingen`
--

CREATE TABLE IF NOT EXISTS `bestellingen` (
  `nummer` int(11) NOT NULL,
  `bestellingnummer` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `productcode` int(4) NOT NULL,
  `aantal_besteld` int(11) NOT NULL DEFAULT '1',
  `opmerking` text NOT NULL,
  `datum` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=bestelling naar keuken;1=bestelling staat klaar;2=bestelling is bezorgd;3=bestelling is betaald',
  PRIMARY KEY (`bestellingnummer`),
  KEY `id` (`id`),
  KEY `productcode` (`productcode`),
  KEY `nummer` (`nummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `categorienummer` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`categorienummer`),
  KEY `categorienummer` (`categorienummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inlogsysteem`
--

CREATE TABLE IF NOT EXISTS `inlogsysteem` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(100) NOT NULL,
  `wachtwoord` text NOT NULL,
  `beheer` tinyint(1) NOT NULL DEFAULT '0',
  `actief` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE IF NOT EXISTS `producten` (
  `productcode` int(4) NOT NULL AUTO_INCREMENT,
  `categorienummer` int(11) NOT NULL,
  `gerecht` varchar(50) NOT NULL,
  `prijs` double NOT NULL,
  `actief` tinyint(1) NOT NULL,
  PRIMARY KEY (`productcode`),
  KEY `categorienummer` (`categorienummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `regids`
--

CREATE TABLE IF NOT EXISTS `regids` (
  `nr` int(11) NOT NULL AUTO_INCREMENT,
  `regid` text NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`nr`),
  UNIQUE KEY `nr` (`nr`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tafelnummer`
--

CREATE TABLE IF NOT EXISTS `tafelnummer` (
  `tafelnummer` int(3) NOT NULL,
  PRIMARY KEY (`tafelnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tafelregistratie`
--

CREATE TABLE IF NOT EXISTS `tafelregistratie` (
  `nummer` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(4) NOT NULL,
  `tafelnummer` int(3) NOT NULL,
  `aantal_klanten` tinyint(4) NOT NULL,
  `actief` tinyint(1) NOT NULL,
  `datum` date DEFAULT NULL,
  PRIMARY KEY (`nummer`),
  KEY `id` (`id`),
  KEY `tafelnummer` (`tafelnummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure for view `Actieve bestellingen`
--
DROP TABLE IF EXISTS `Actieve bestellingen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`inf_po`@`localhost` SQL SECURITY DEFINER VIEW `Actieve bestellingen` AS select `bestellingen`.`nummer` AS `nummer`,`bestellingen`.`bestellingnummer` AS `bestellingnummer`,`bestellingen`.`id` AS `id`,`bestellingen`.`productcode` AS `productcode`,`bestellingen`.`aantal_besteld` AS `aantal_besteld`,`bestellingen`.`opmerking` AS `opmerking`,`bestellingen`.`datum` AS `datum`,`bestellingen`.`status` AS `status` from `bestellingen` where (`bestellingen`.`status` < 3);

-- --------------------------------------------------------

--
-- Structure for view `Actieve tafels`
--
DROP TABLE IF EXISTS `Actieve tafels`;

CREATE ALGORITHM=UNDEFINED DEFINER=`inf_po`@`localhost` SQL SECURITY DEFINER VIEW `Actieve tafels` AS select `tafelregistratie`.`nummer` AS `nummer`,`tafelregistratie`.`id` AS `id`,`tafelregistratie`.`tafelnummer` AS `tafelnummer`,`tafelregistratie`.`aantal_klanten` AS `aantal_klanten`,`tafelregistratie`.`actief` AS `actief`,`tafelregistratie`.`datum` AS `datum` from `tafelregistratie` where (`tafelregistratie`.`actief` = 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `bestellingen_ibfk_1` FOREIGN KEY (`id`) REFERENCES `inlogsysteem` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bestellingen_ibfk_2` FOREIGN KEY (`productcode`) REFERENCES `producten` (`productcode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bestellingen_ibfk_3` FOREIGN KEY (`nummer`) REFERENCES `tafelregistratie` (`nummer`) ON UPDATE CASCADE;

--
-- Constraints for table `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `producten_ibfk_2` FOREIGN KEY (`categorienummer`) REFERENCES `categorie` (`categorienummer`) ON UPDATE CASCADE;

--
-- Constraints for table `regids`
--
ALTER TABLE `regids`
  ADD CONSTRAINT `regids_ibfk_1` FOREIGN KEY (`id`) REFERENCES `inlogsysteem` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tafelregistratie`
--
ALTER TABLE `tafelregistratie`
  ADD CONSTRAINT `tafelregistratie_ibfk_1` FOREIGN KEY (`id`) REFERENCES `inlogsysteem` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tafelregistratie_ibfk_3` FOREIGN KEY (`tafelnummer`) REFERENCES `tafelnummer` (`tafelnummer`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
