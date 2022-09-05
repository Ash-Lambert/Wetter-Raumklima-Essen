-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 05. Sep 2022 um 13:55
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
-- Datenbank: `essen`
--
CREATE DATABASE IF NOT EXISTS `essen` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `essen`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einheiten`
--

CREATE TABLE `einheiten` (
  `einheiten_id` int(11) NOT NULL,
  `einheit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gericht`
--

CREATE TABLE `gericht` (
  `gericht_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rezepttext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorien`
--

CREATE TABLE `kategorien` (
  `kategorien_id` int(11) NOT NULL,
  `kategorie` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mengen`
--

CREATE TABLE `mengen` (
  `mengen_id` int(11) NOT NULL,
  `menge` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zusatztexte`
--

CREATE TABLE `zusatztexte` (
  `zusatztexte_id` int(11) NOT NULL,
  `zusatztext` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zutaten`
--

CREATE TABLE `zutaten` (
  `zutaten_id` int(11) NOT NULL,
  `zutat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zwischen`
--

CREATE TABLE `zwischen` (
  `fk_gericht_id` int(11) NOT NULL,
  `fk_zutaten_id` int(11) NOT NULL,
  `fk_einheiten_id` int(11) NOT NULL,
  `fk_mengen_id` int(11) NOT NULL,
  `fk_zusatztexte_id` int(11) NOT NULL,
  `fk_kategorien_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `einheiten`
--
ALTER TABLE `einheiten`
  ADD PRIMARY KEY (`einheiten_id`);

--
-- Indizes für die Tabelle `gericht`
--
ALTER TABLE `gericht`
  ADD PRIMARY KEY (`gericht_id`);

--
-- Indizes für die Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  ADD PRIMARY KEY (`kategorien_id`);

--
-- Indizes für die Tabelle `mengen`
--
ALTER TABLE `mengen`
  ADD PRIMARY KEY (`mengen_id`);

--
-- Indizes für die Tabelle `zusatztexte`
--
ALTER TABLE `zusatztexte`
  ADD PRIMARY KEY (`zusatztexte_id`);

--
-- Indizes für die Tabelle `zutaten`
--
ALTER TABLE `zutaten`
  ADD PRIMARY KEY (`zutaten_id`);

--
-- Indizes für die Tabelle `zwischen`
--
ALTER TABLE `zwischen`
  ADD KEY `fk_gericht_id` (`fk_gericht_id`),
  ADD KEY `fk_zutaten_id` (`fk_zutaten_id`),
  ADD KEY `fk_einheiten_id` (`fk_einheiten_id`),
  ADD KEY `fk_mengen_id` (`fk_mengen_id`),
  ADD KEY `fk_zusatztexte_id` (`fk_zusatztexte_id`),
  ADD KEY `fk_kategorien_id` (`fk_kategorien_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `einheiten`
--
ALTER TABLE `einheiten`
  MODIFY `einheiten_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `gericht`
--
ALTER TABLE `gericht`
  MODIFY `gericht_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  MODIFY `kategorien_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `mengen`
--
ALTER TABLE `mengen`
  MODIFY `mengen_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `zusatztexte`
--
ALTER TABLE `zusatztexte`
  MODIFY `zusatztexte_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `zutaten`
--
ALTER TABLE `zutaten`
  MODIFY `zutaten_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `zwischen`
--
ALTER TABLE `zwischen`
  ADD CONSTRAINT `fk_einheiten_id` FOREIGN KEY (`fk_einheiten_id`) REFERENCES `einheiten` (`einheiten_id`),
  ADD CONSTRAINT `fk_gericht_id` FOREIGN KEY (`fk_gericht_id`) REFERENCES `gericht` (`gericht_id`),
  ADD CONSTRAINT `fk_kategorien_id` FOREIGN KEY (`fk_kategorien_id`) REFERENCES `kategorien` (`kategorien_id`),
  ADD CONSTRAINT `fk_mengen_id` FOREIGN KEY (`fk_mengen_id`) REFERENCES `mengen` (`mengen_id`),
  ADD CONSTRAINT `fk_zusatztexte_id` FOREIGN KEY (`fk_zusatztexte_id`) REFERENCES `zusatztexte` (`zusatztexte_id`),
  ADD CONSTRAINT `fk_zutaten_id` FOREIGN KEY (`fk_zutaten_id`) REFERENCES `zutaten` (`zutaten_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
