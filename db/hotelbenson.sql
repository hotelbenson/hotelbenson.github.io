-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Dez 2022 um 14:50
-- Server-Version: 10.4.24-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hotelbenson`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `newsposts`
--

CREATE TABLE `newsposts` (
  `id` int(11) NOT NULL,
  `picturename` varchar(50) NOT NULL,
  `picturepath` varchar(200) NOT NULL,
  `header` varchar(100) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `newsposts`
--

INSERT INTO `newsposts` (`id`, `picturename`, `picturepath`, `header`, `text`) VALUES
(2, 'Test', '../uploads/eric.jpeg', 'Ausfallsbonus III (Corona):', 'Der Ausfallsbonus III kann bei mindestens 30 % Umsatzausfall im November und Dezember 2021 und 40 % Umsatzausfall im 1. Quartal 2022 beantragt werden und beträgt max. 80.000 Euro/Monat. Für Hotellerie und Gastronomie werden 40 % des Ausfalles ersetzt, eine Antragstellung ist jeweils ab dem 10. des Folgemonats möglich.'),
(3, 'Test2', '../uploads/eric.jpeg', 'Kunsthotel Sans Souci', 'Im Sans Souci im 7. Wiener Gemeindebezirk erleben Sie Kunst hautnah. Das Kunsthotel öffnet seine Pforten und heißt Sie herzlich Willkommen, wenn von September bis November 2022 Wien ganz im Zeichen der Kunst steht. Dabei können Kunstliebhaber einiges in der österreichischen Hauptstadt entdecken:         Von antiken Schätzen, über angesagte Neuzugänge bis hin zu ungeahnten Entdeckungen ist alles dabei.'),
(4, 'guy.jpeg', '../fileupload/guy.jpeg', 'Testblog', 'Testblog testext');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `start_dt` date NOT NULL,
  `end_dt` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = neu, 2 = bestätigt, 3 = storniert'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '1 = user, 2 = admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`) VALUES
(1, 'Alice', '1234', 'alice@gmail.com', 1),
(2, 'test', 'test', 'test', 1),
(4, 'Tom', '$2y$10$YUtdkSEnc0B2YCWiARfhYO2FcDuqqQMDDodW2PEyeYPkRNd30Vlk6', 'tom@gmail.com', 1),
(5, 'Tom', '$2y$10$qhJYy7rDRUhfOZoD1Q3G5OWgpTbMybkNPRGpWWjZTDNkkd9kKO916', 'tom@gmail.com', 1),
(6, 'Tom', '$2y$10$fgtV0yE92zxrSGG5SFYgmuwIUMSyBVqfq0QV2Hf.JwZI4CqARqZR6', 'tom@gmail.com', 1),
(7, 'Tom', '$2y$10$YUtdkSEnc0B2YCWiARfhYO2FcDuqqQMDDodW2PEyeYPkRNd30Vlk6', 'tom@gmail.com', 1),
(8, 'Maria', '$2y$10$CGIphjXA.vNdfoqCVJdfNuy4XZbmYuPHMEx3t2gDzf46.76YXTeay', 'maria@gmail.com', 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `newsposts`
--
ALTER TABLE `newsposts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `newsposts`
--
ALTER TABLE `newsposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
