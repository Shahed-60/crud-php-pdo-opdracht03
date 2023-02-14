-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 14 feb 2023 om 11:10
-- Serverversie: 5.7.36
-- PHP-versie: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atractiepark`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `achtbaan`
--

DROP TABLE IF EXISTS `achtbaan`;
CREATE TABLE IF NOT EXISTS `achtbaan` (
  `Id` int(30) NOT NULL AUTO_INCREMENT,
  `NaamAchtbaan` varchar(200) NOT NULL,
  `NaamPretpark` varchar(200) NOT NULL,
  `Land` varchar(200) NOT NULL,
  `Topsnelheid` int(200) NOT NULL,
  `Hoogte` int(200) NOT NULL,
  `Datum` date NOT NULL,
  `Cijfer` varchar(5) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `achtbaan`
--

INSERT INTO `achtbaan` (`Id`, `NaamAchtbaan`, `NaamPretpark`, `Land`, `Topsnelheid`, `Hoogte`, `Datum`, `Cijfer`) VALUES
(1, 'Red Force', 'Ferrari Land', 'Spanje', 192, 112, '1968-03-02', '9.2'),
(2, 'Ring Racer', 'Circuit Nurnberg', 'Duitsland', 160, 110, '1974-08-01', '8.7'),
(3, 'Hyperion', 'EnergyLandia', 'Polen', 141, 77, '2009-09-09', '6.3'),
(4, 'Furios Baco', 'PortAventura', 'Spanje', 138, 23, '2018-06-06', '5.5'),
(5, 'Shambala', 'PortAventura', 'Spanje', 134, 102, '2017-04-03', '9.7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
