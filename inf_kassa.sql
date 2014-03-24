-- phpMyAdmin SQL Dump
-- version 4.0.9deb1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 24 mrt 2014 om 12:49
-- Serverversie: 5.5.35-0+wheezy1
-- PHP-versie: 5.5.6-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `inf_kassa`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `categorienummer` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`categorienummer`),
  KEY `categorienummer` (`categorienummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inlogsysteem`
--

CREATE TABLE IF NOT EXISTS `inlogsysteem` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(100) NOT NULL,
  `wachtwoord` text NOT NULL,
  `beheer` tinyint(1) NOT NULL DEFAULT '0',
  `actief` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE IF NOT EXISTS `producten` (
  `productcode` int(4) NOT NULL AUTO_INCREMENT,
  `categorienummer` int(11) NOT NULL,
  `gerecht` varchar(50) NOT NULL,
  `prijs` double NOT NULL,
  `actief` tinyint(1) NOT NULL,
  PRIMARY KEY (`productcode`),
  KEY `categorienummer` (`categorienummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tafelnummer`
--

CREATE TABLE IF NOT EXISTS `tafelnummer` (
  `tafelnummer` int(3) NOT NULL,
  PRIMARY KEY (`tafelnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tafelregistratie`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Beperkingen voor gedumpte tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `bestellingen_ibfk_1` FOREIGN KEY (`id`) REFERENCES `inlogsysteem` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bestellingen_ibfk_2` FOREIGN KEY (`productcode`) REFERENCES `producten` (`productcode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bestellingen_ibfk_3` FOREIGN KEY (`nummer`) REFERENCES `tafelregistratie` (`nummer`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD CONSTRAINT `producten_ibfk_2` FOREIGN KEY (`categorienummer`) REFERENCES `categorie` (`categorienummer`) ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `tafelregistratie`
--
ALTER TABLE `tafelregistratie`
  ADD CONSTRAINT `tafelregistratie_ibfk_1` FOREIGN KEY (`id`) REFERENCES `inlogsysteem` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tafelregistratie_ibfk_3` FOREIGN KEY (`tafelnummer`) REFERENCES `tafelnummer` (`tafelnummer`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
