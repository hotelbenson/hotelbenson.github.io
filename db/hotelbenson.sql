-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Jan 2023 um 09:53
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
  `text` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `newsposts`
--

INSERT INTO `newsposts` (`id`, `picturename`, `picturepath`, `header`, `text`, `date`) VALUES
(2, 'Test', '../uploads/Corona.jpeg', 'Ausfallsbonus III (Corona):', 'Der Ausfallsbonus III kann bei mindestens 30 % Umsatzausfall im November und Dezember 2021 und 40 % Umsatzausfall im 1. Quartal 2022 beantragt werden und beträgt max. 80.000 Euro/Monat. Für Hotellerie und Gastronomie werden 40 % des Ausfalles ersetzt, eine Antragstellung ist jeweils ab dem 10. des Folgemonats möglich.', '2023-01-01'),
(3, 'Test2', '../uploads/Souci.jpg', 'Kunsthotel Sans Souci', 'Im Sans Souci im 7. Wiener Gemeindebezirk erleben Sie Kunst hautnah. Das Kunsthotel öffnet seine Pforten und heißt Sie herzlich Willkommen, wenn von September bis November 2022 Wien ganz im Zeichen der Kunst steht. Dabei können Kunstliebhaber einiges in der österreichischen Hauptstadt entdecken:         Von antiken Schätzen, über angesagte Neuzugänge bis hin zu ungeahnten Entdeckungen ist alles dabei.', '2022-12-20'),
(4, 'guy.jpeg', '../fileupload/Seewirt.jpg', 'Das neue Restaurant im Seewirt Mattsee:', 'Seit Ostern präsentiert sich das „Lustreich Restaurant“ im Kuschelhotel Seewirt Mattsee im neuen Kleid! Es wurde bunter, kuscheliger, moderner – einfach perfekt passend zum Thema des Hauses und fast so bunt wie die Liebe selbst. Als adults-only Hotel am iyllischen Südufer des Mattsees integriert sich das Restaurant bestens in die Philosophie des Hauses und bietet für kulinarische Erlebnisse nun einen würdigen Rahmen während eines romantischen Urlaubs mit Ihrem Schatz.', '2022-11-02'),
(5, 'Test', '../uploads/Almwelt.jpg', 'Die neuen Chalets in den Bergen der Almwelt Austria:', 'Die neuen Chalets in den Bergen der Almwelt Austria. Der Märchentraum inmitten der malerischen Bergwelt der Schladminger Tauern wird bald wahr: Im Sommer 2022 eröffnet das Hüttendorf Almwelt Austria moderngestaltete Almhütten für zwei bis zehn Personen. Die neuerrichteten Premium-Chalets verfügen über einen eigenen Almwellnessbereich mit großzügiger Sauna, Erlebnisdusche und Waschbereich. Die stilvollen und gemütlichen Hüttenzimmer bieten Boxspringbetten, ein Badezimmer sowie einen Balkon. Spüren Sie den Duft des Holzes, die natürlichen Materialen und das Zusammenspiel aus alpiner Lebensart und höchstem Komfort!', '2022-07-29'),
(6, 'Test', '../uploads/hotel5.jpg', 'Aktivurlaub in Österreich:', 'Auch wenn es im Trend liegt – ein Aktivurlaub in Österreich muss sich nicht immer um Berge, Bikes, Skipisten und Golfplätze drehen. Abseits dieser beliebten Modesportarten gibt es viele andere Optionen, um einen wunderbaren Aktiv- und Sporturlaub zu erleben: Yoga, Tennis, Tanzen, Klettern oder Reiten zum Beispiel. Der Fantasie sind hier keine Grenzen gesetzt! Wer dennoch mal auf die „Klassiker“ zurückgreifen möchte, findet in den meisten Aktivhotels ausreichend Gelegenheit dazu.', '2022-05-17');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `start_dt` date NOT NULL,
  `end_dt` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = neu, 2 = bestätigt, 3 = storniert',
  `userid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `reservations`
--

INSERT INTO `reservations` (`id`, `roomid`, `start_dt`, `end_dt`, `status`, `userid`, `price`, `room_name`) VALUES
(1, 2, '0000-00-00', '0000-00-00', 3, 15, 1000, 'Präsidentensuite'),
(2, 2, '2023-01-01', '2023-01-02', 3, 15, 1000, 'Präsidentensuite'),
(3, 2, '2023-01-01', '2023-01-02', 3, 15, 1000, 'Präsidentensuite'),
(4, 1, '2023-01-24', '2023-01-27', 3, 15, 50, 'Array'),
(5, 1, '2023-01-02', '2023-01-05', 2, 15, 50, 'Alpenluftzimmer'),
(6, 3, '2023-01-10', '2023-01-14', 2, 15, 10, 'Schluckerzimmer');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL COMMENT 'Preis pT in €'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`) VALUES
(1, 'Alpenluftzimmer', 50),
(2, 'Präsidentensuite', 1000),
(3, 'Schluckerzimmer', 10),
(4, 'Commoner Suite', 100);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '1 = user, 2 = admin',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = aktiv, 0 = deaktiviert',
  `phone` varchar(20) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`, `status`, `phone`, `adress`, `city`, `zip`) VALUES
(8, 'Tomer', '$2y$10$1lQ9qzDSYsJWchH/.UJS7eJaDpftXB6y.kjNlK2QKkltaRovcxZs.', 'tom@gmail.com', 2, 1, '068012345832', 'Haupstraße', 'Wien', 1120),
(10, 'Test', '$2y$10$XMMvPeCHBAv/HuLZpCzQluoaEZcsTTN2vYRgQNwVFVQd2QAUskMvW', 'test1@gmail.com', 1, 1, '123456789', 'Strasse 1', 'Stadt', 2000),
(11, 'Testhawara', '$2y$10$411PDW5m4/4gVoUD0QUlWu05cmWI2zso.nCzIbiEH4nMTVeJfb8qW', 'test@gmail.com', 2, 1, '765444565', 'ttttt', 'cityyyyy', 1234),
(12, 'Hawara2', '$2y$10$EVPs/8MxBXvKO65n4ZUMxu6vwtVL02L5zltcxOvs9rML21tY6AC62', 'harawa2@gmail.com', 1, 1, '', '', '', 0),
(13, 'Max', '$2y$10$MsGHdxqnyKOpRaVtwh/9MeuBSyoD4o/l98CqnEbjBkfR/eHcRVnS.', 'max@gmail.com', 1, 1, '123', '123', '123', 123),
(14, 'Hu', '$2y$10$593ye4ujYuF7n0WH1Nq9..Qq.jf9xHjNNj29L0U8oDc.oSr.ARq22', 'hu@gmail.com', 1, 0, '1234567', 'wasdfg', 'asdfg', 124),
(15, 'gigi', '$2y$10$SWh7MCkxM1Rlu.Vimn1mpezQK32Ig9jmiCUFGdOM/QCYMoFYLeppm', '1234@gmail.com', 2, 1, '1234567', 'sadfg', '12345', 1234);

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
-- Indizes für die Tabelle `rooms`
--
ALTER TABLE `rooms`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
