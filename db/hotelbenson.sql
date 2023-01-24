-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 04:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelbenson`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsposts`
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
-- Dumping data for table `newsposts`
--

INSERT INTO `newsposts` (`id`, `picturename`, `picturepath`, `header`, `text`, `date`) VALUES
(2, 'Test', '../uploads/Corona.jpeg', 'Ausfallsbonus III (Corona):', 'Der Ausfallsbonus III kann bei mindestens 30 % Umsatzausfall im November und Dezember 2021 und 40 % Umsatzausfall im 1. Quartal 2022 beantragt werden und beträgt max. 80.000 Euro/Monat. Für Hotellerie und Gastronomie werden 40 % des Ausfalles ersetzt, eine Antragstellung ist jeweils ab dem 10. des Folgemonats möglich.', '2023-01-01'),
(3, 'Test2', '../uploads/Souci.jpg', 'Kunsthotel Sans Souci', 'Im Sans Souci im 7. Wiener Gemeindebezirk erleben Sie Kunst hautnah. Das Kunsthotel öffnet seine Pforten und heißt Sie herzlich Willkommen, wenn von September bis November 2022 Wien ganz im Zeichen der Kunst steht. Dabei können Kunstliebhaber einiges in der österreichischen Hauptstadt entdecken:         Von antiken Schätzen, über angesagte Neuzugänge bis hin zu ungeahnten Entdeckungen ist alles dabei.', '2022-12-20'),
(4, 'guy.jpeg', '../fileupload/Seewirt.jpg', 'Das neue Restaurant im Seewirt Mattsee:', 'Seit Ostern präsentiert sich das „Lustreich Restaurant“ im Kuschelhotel Seewirt Mattsee im neuen Kleid! Es wurde bunter, kuscheliger, moderner – einfach perfekt passend zum Thema des Hauses und fast so bunt wie die Liebe selbst. Als adults-only Hotel am iyllischen Südufer des Mattsees integriert sich das Restaurant bestens in die Philosophie des Hauses und bietet für kulinarische Erlebnisse nun einen würdigen Rahmen während eines romantischen Urlaubs mit Ihrem Schatz.', '2022-11-02'),
(5, 'Test', '../uploads/Almwelt.jpg', 'Die neuen Chalets in den Bergen der Almwelt Austria:', 'Die neuen Chalets in den Bergen der Almwelt Austria. Der Märchentraum inmitten der malerischen Bergwelt der Schladminger Tauern wird bald wahr: Im Sommer 2022 eröffnet das Hüttendorf Almwelt Austria moderngestaltete Almhütten für zwei bis zehn Personen. Die neuerrichteten Premium-Chalets verfügen über einen eigenen Almwellnessbereich mit großzügiger Sauna, Erlebnisdusche und Waschbereich. Die stilvollen und gemütlichen Hüttenzimmer bieten Boxspringbetten, ein Badezimmer sowie einen Balkon. Spüren Sie den Duft des Holzes, die natürlichen Materialen und das Zusammenspiel aus alpiner Lebensart und höchstem Komfort!', '2023-02-02'),
(6, 'Test', '../uploads/hotel5.jpg', 'Aktivurlaub in Österreich:', 'Auch wenn es im Trend liegt – ein Aktivurlaub in Österreich muss sich nicht immer um Berge, Bikes, Skipisten und Golfplätze drehen. Abseits dieser beliebten Modesportarten gibt es viele andere Optionen, um einen wunderbaren Aktiv- und Sporturlaub zu erleben: Yoga, Tennis, Tanzen, Klettern oder Reiten zum Beispiel. Der Fantasie sind hier keine Grenzen gesetzt! Wer dennoch mal auf die „Klassiker“ zurückgreifen möchte, findet in den meisten Aktivhotels ausreichend Gelegenheit dazu.', '2022-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `start_dt` date NOT NULL,
  `end_dt` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = neu, 2 = bestätigt, 3 = storniert',
  `userid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `extras` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `roomid`, `start_dt`, `end_dt`, `status`, `userid`, `price`, `room_name`, `date`, `extras`) VALUES
(8, 4, '2023-01-18', '2023-01-19', 3, 16, 200, 'Commoner Suite', '2023-01-15', ''),
(9, 2, '2023-03-14', '2023-03-15', 2, 16, 2000, 'Präsidentensuite', '2023-01-23', ''),
(10, 2, '2023-03-20', '2023-03-23', 2, 16, 4000, 'Präsidentensuite', '2023-01-20', ''),
(11, 1, '2023-02-01', '2023-02-02', 1, 16, 170, 'Alpenluftzimmer', '2023-01-23', 'Parkplatz, Haustiere'),
(12, 1, '2023-01-24', '2023-01-26', 1, 18, 200, 'Alpenluftzimmer', '2023-01-24', 'Haustiere'),
(13, 4, '2023-01-28', '2023-01-31', 1, 19, 450, 'Commoner Suite', '2023-01-24', 'Haustiere'),
(14, 1, '2023-01-01', '2023-01-02', 1, 18, 120, 'Alpenluftzimmer', '2023-01-01', 'Frühstück');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL COMMENT 'Preis pT in €'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`) VALUES
(1, 'Alpenluftzimmer', 50),
(2, 'Präsidentensuite', 1000),
(3, 'Schluckerzimmer', 10),
(4, 'Commoner Suite', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `role`, `status`, `phone`, `adress`, `city`, `zip`) VALUES
(8, 'Tomer', '$2y$10$1lQ9qzDSYsJWchH/.UJS7eJaDpftXB6y.kjNlK2QKkltaRovcxZs.', 'tom@gmail.com', 2, 1, '068012345832', 'Haupstraße', 'Wien', 1120),
(10, 'Test', '', 'test1@gmail.com', 1, 0, '123456789', 'Strasse 1', 'Stadt', 2000),
(13, 'Max', '$2y$10$pvPgzSlMOmJ7EaXH53Ps4uGRx62lFOIJ7RlqUwnnAqrsaX9Axx5hG', 'max@gmail.com', 1, 1, '123', '123', '123', 123),
(15, 'Admin1234', '$2y$10$SWh7MCkxM1Rlu.Vimn1mpezQK32Ig9jmiCUFGdOM/QCYMoFYLeppm', '1234@gmail.com', 2, 1, '1234567', 'sadfg', '12345', 1234),
(16, 'Tom Meier', '$2y$10$FsV/GIMmbk9zG.VTsjMBZuPyGPlseFek2.SSxDyA0tJY9pnZOvjnq', 't@gmail.com', 1, 1, '12345678', 'sadada', 'sadad', 1223),
(17, 'Tom', '', 't2@gmail.com', 1, 0, '123432', 'asdadads', 'asdadsa', 12132),
(18, 'David Haas', '$2y$10$/6ky.3EUD6hgUIa3nxmJP.GNa1Mu2X3clHVsliH84.S0ILz69lNz.', 'wi22b038@technikum-wien.at', 2, 1, '0664/1234567', 'Mustergasse 12.5', '2120', 0),
(19, 'Kunde McKundenface', '$2y$10$5yXBEEO3Mypa86oEL3n7h.2Qv2nCxUUBXRHuQWAouYR6vnGwSm3LK', 'kunde@kunde.at', 1, 1, '01234/132412', 'Mustergasse 13', 'Wien', 1220),
(20, 'Präsident', '$2y$10$2jiGKkGQnzReO4pNu0aSUehIPduYsv0qdNEgGFWYbhYNOOpJO01bq', 'pres@us.gov', 1, 1, '012323', 'White House', 'Washington', 12345);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsposts`
--
ALTER TABLE `newsposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsposts`
--
ALTER TABLE `newsposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
