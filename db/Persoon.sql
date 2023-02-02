-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 02 feb 2023 om 13:24
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-pdo-crud-2209c`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Persoon`
--

DROP TABLE IF EXISTS `Persoon`;
CREATE TABLE IF NOT EXISTS `Persoon` (
  `Id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Voornaam` varchar(100) NOT NULL,
  `Tussenvoegsel` varchar(10) NOT NULL,
  `Achternaam` varchar(100) NOT NULL,
  `Haarkleur` varchar(30) NOT NULL,
  `Telefoonnummer` varchar(15) NOT NULL,
  `Staartnaam` varchar(30) NOT NULL,
  `Huisnummer` varchar(5) NOT NULL,
  `Woonplaats` varchar(20) NOT NULL,
  `Postcode` varchar(12) NOT NULL,
  `Landnaam` varchar(25) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `Persoon`
--

INSERT INTO `Persoon` (`Id`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Haarkleur`, `Telefoonnummer`, `Staartnaam`, `Huisnummer`, `Woonplaats`, `Postcode`, `Landnaam`) VALUES
(2, 'text', 'de', 'tester', '', '0', '', '', '', '', ''),
(3, 'voornaam', 'de', 'tester', '', '0', '', '', '', '', ''),
(5, 'Omaar', 'fa', 'OMAR', '', '0', '', '', '', '', ''),
(7, 'q', 'q', 'w', 'q', '0', '', '', '', '', ''),
(8, 'huqjdOS', 'YGIUIJO', 'YVGIOU', 'VYIG', '0', '', '', '', '', ''),
(9, 'huqjdOS', 'YGIUIJO', 'YVGIOU', 'VYIG', '0', '', '', '', '', ''),
(10, 'dd', 'dd', 'dd', 'dd', '0', '', '', '', '', ''),
(11, 'aksm', 'ads ,', 'sknd', 'sdlmv;', '0', '', '', '', '', ''),
(12, 'text', 'de', 'tester', 'zwart', '0', '', '', '', '', ''),
(13, 'text', 'de', 'tester', 'sdas', '0', '', '', '', '', ''),
(15, 'w', 'w', 'w', 'a', 'w', '', '', '', '', ''),
(16, 'koij', 'jio', 'nioj', 'io', 'io', 'iok', '', '', '', ''),
(18, 'bh', 'vhjb', 'vj', 'jhv', 'jhv', 'jhv', 'jhv', 'jhv', 'jhv', 'jhvaf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
