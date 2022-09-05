-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 05. Sep 2022 um 13:53
-- Server-Version: 10.5.15-MariaDB-0+deb11u1
-- PHP-Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wetter`
--
CREATE DATABASE IF NOT EXISTS `wetter` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wetter`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bad`
--

CREATE TABLE `bad` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `zeit` time NOT NULL,
  `temp` float NOT NULL,
  `humi` float NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bereiche`
--

CREATE TABLE `bereiche` (
  `id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `draussen`
--

CREATE TABLE `draussen` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `zeit` time NOT NULL,
  `temp` float NOT NULL,
  `humi` float NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `extern`
--

CREATE TABLE `extern` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `zeit` time NOT NULL,
  `description` int(11) NOT NULL,
  `temp` float NOT NULL,
  `feels_like` float NOT NULL,
  `humi` float NOT NULL,
  `pressure` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `windspeed` float NOT NULL,
  `direction` int(11) NOT NULL,
  `wind_gust` float NOT NULL,
  `cloudiness` int(11) NOT NULL,
  `erfassungsdatum` int(11) NOT NULL,
  `edatum` date NOT NULL,
  `ezeit` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flur`
--

CREATE TABLE `flur` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `zeit` time NOT NULL,
  `temp` float NOT NULL,
  `humi` float NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kueche`
--

CREATE TABLE `kueche` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `zeit` time NOT NULL,
  `temp` float NOT NULL,
  `humi` float NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `minmax`
--

CREATE TABLE `minmax` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `zeit` time NOT NULL,
  `mintemp` float NOT NULL,
  `maxtemp` float NOT NULL,
  `avgtemp` float NOT NULL,
  `minhumi` float NOT NULL,
  `maxhumi` float NOT NULL,
  `avghumi` float NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `schlafzimmer`
--

CREATE TABLE `schlafzimmer` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `zeit` time NOT NULL,
  `temp` float NOT NULL,
  `humi` float NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sunrisesunset`
--

CREATE TABLE `sunrisesunset` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `sunrise` time NOT NULL,
  `sunset` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wohnzimmer`
--

CREATE TABLE `wohnzimmer` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `zeit` time NOT NULL,
  `temp` float NOT NULL,
  `humi` float NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bad`
--
ALTER TABLE `bad`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `bereiche`
--
ALTER TABLE `bereiche`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `draussen`
--
ALTER TABLE `draussen`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `extern`
--
ALTER TABLE `extern`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `flur`
--
ALTER TABLE `flur`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kueche`
--
ALTER TABLE `kueche`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `minmax`
--
ALTER TABLE `minmax`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `schlafzimmer`
--
ALTER TABLE `schlafzimmer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `sunrisesunset`
--
ALTER TABLE `sunrisesunset`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `wohnzimmer`
--
ALTER TABLE `wohnzimmer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bad`
--
ALTER TABLE `bad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `bereiche`
--
ALTER TABLE `bereiche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `draussen`
--
ALTER TABLE `draussen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `extern`
--
ALTER TABLE `extern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `flur`
--
ALTER TABLE `flur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kueche`
--
ALTER TABLE `kueche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `minmax`
--
ALTER TABLE `minmax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `schlafzimmer`
--
ALTER TABLE `schlafzimmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `sunrisesunset`
--
ALTER TABLE `sunrisesunset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `wohnzimmer`
--
ALTER TABLE `wohnzimmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
