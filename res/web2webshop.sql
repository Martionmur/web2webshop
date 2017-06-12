-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jun 2017 um 14:41
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `web2webshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellung`
--

CREATE TABLE `bestellung` (
  `bid` int(11) NOT NULL,
  `kid` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `zid` int(11) NOT NULL,
  `gid` int(11) DEFAULT NULL,
  `gutscheinentwertung` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `bestellung`
--

INSERT INTO `bestellung` (`bid`, `kid`, `datum`, `zid`, `gid`, `gutscheinentwertung`) VALUES
(2, 1, '2017-06-06 10:50:49', 1, 1, 100),
(3, 1, '2017-06-06 10:52:56', 1, NULL, NULL),
(21, 2, '2017-06-06 13:02:05', 1, 2, 16.5),
(26, 2, '2017-06-06 14:49:42', -1, 2, 16.5),
(28, 3, '2017-06-06 17:08:07', 2, 1, 10),
(33, 2, '2017-06-06 20:48:10', 1, 3, 16.5),
(34, 1, '2017-06-07 13:27:13', 1, 1, 100),
(35, 2, '2017-06-07 13:28:42', 1, 1, 10),
(38, 2, '2017-06-07 14:17:07', 1, 1, 10),
(39, 2, '2017-06-07 14:27:35', 1, 1, 10),
(40, 2, '2017-06-07 14:34:03', 1, 1, 10),
(41, 2, '2017-06-07 14:35:03', -1, 4, 34.5),
(42, 3, '2017-06-07 14:37:33', 2, 2, 20),
(45, 3, '2017-06-07 14:42:53', 2, NULL, NULL),
(46, 3, '2017-06-07 14:52:04', 2, NULL, NULL),
(47, 3, '2017-06-07 14:52:12', 2, NULL, NULL),
(48, 2, '2017-06-07 14:52:45', 1, NULL, NULL),
(49, 2, '2017-06-07 14:52:54', 1, NULL, NULL),
(50, 2, '2017-06-07 14:53:10', -1, 4, 34.5),
(52, 2, '2017-06-07 15:19:19', 1, NULL, NULL),
(53, 2, '2017-06-07 15:23:37', 1, NULL, NULL),
(54, 2, '2017-06-07 15:33:43', 1, NULL, NULL),
(55, 2, '2017-06-07 15:36:09', 1, NULL, NULL),
(56, 2, '2017-06-07 15:40:44', 1, 2, 20),
(57, 5, '2017-06-08 09:12:26', 4, NULL, NULL),
(58, 2, '2017-06-08 16:36:57', 1, 3, 30),
(59, 2, '2017-06-08 16:41:10', 1, 4, 5.5),
(60, 2, '2017-06-11 10:48:39', 1, 4, 13),
(61, 3, '2017-06-11 15:47:17', 2, NULL, NULL),
(62, 3, '2017-06-11 22:24:45', 2, NULL, NULL),
(64, 3, '2017-06-11 22:35:01', -1, 4, 19),
(65, 3, '2017-06-11 22:38:26', 2, NULL, NULL),
(66, 3, '2017-06-12 12:01:18', 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `b_has_p`
--

CREATE TABLE `b_has_p` (
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `menge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `b_has_p`
--

INSERT INTO `b_has_p` (`bid`, `pid`, `menge`) VALUES
(21, 2, 2),
(21, 3, 2),
(26, 1, 1),
(26, 2, 2),
(26, 3, 2),
(28, 1, 1),
(28, 2, 2),
(33, 1, 1),
(33, 2, 2),
(35, 1, 1),
(35, 2, 2),
(35, 3, 2),
(38, 1, 2),
(38, 2, 1),
(38, 3, 7),
(39, 1, 2),
(39, 2, 1),
(39, 3, 7),
(40, 1, 2),
(40, 2, 1),
(40, 3, 7),
(41, 1, 2),
(41, 2, 1),
(41, 3, 7),
(42, 1, 2),
(42, 2, 1),
(42, 3, 7),
(45, 1, 2),
(45, 2, 1),
(45, 3, 7),
(46, 1, 2),
(46, 2, 1),
(46, 3, 7),
(47, 1, 2),
(47, 2, 1),
(47, 3, 7),
(48, 1, 2),
(48, 2, 1),
(48, 3, 7),
(49, 1, 2),
(49, 2, 1),
(49, 3, 7),
(50, 1, 2),
(50, 2, 1),
(50, 3, 7),
(52, 1, 2),
(52, 2, 1),
(52, 3, 7),
(53, 1, 2),
(53, 2, 1),
(53, 3, 7),
(54, 1, 2),
(54, 2, 1),
(54, 3, 7),
(55, 1, 2),
(55, 2, 1),
(55, 3, 7),
(56, 1, 2),
(56, 2, 1),
(56, 3, 7),
(57, 1, 2),
(57, 2, 1),
(57, 3, 7),
(58, 1, 2),
(58, 3, 7),
(59, 1, 2),
(59, 2, 1),
(59, 3, 7),
(60, 13, 1),
(60, 15, 2),
(61, 13, 3),
(62, 8, 4),
(62, 13, 8),
(62, 16, 11),
(64, 8, 6),
(64, 10, 4),
(64, 17, 1),
(65, 4, 6),
(65, 5, 1),
(65, 6, 8),
(66, 13, 12);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gutschein`
--

CREATE TABLE `gutschein` (
  `gid` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_german2_ci NOT NULL,
  `ablaufdatum` date NOT NULL,
  `wert` double NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `gutschein`
--

INSERT INTO `gutschein` (`gid`, `code`, `ablaufdatum`, `wert`, `valid`) VALUES
(1, 'AAAAA', '2017-12-25', 10, 0),
(2, 'BBBBB', '2018-01-01', 20, 0),
(3, 'CCCCC', '2017-12-25', 30, 1),
(4, 'DDDDD', '2017-12-25', 8, 1),
(5, 'EEEEE', '0001-01-18', 50, 1),
(6, 'FFFFF', '0001-01-18', 60, 1),
(7, 'GGGGG', '0001-01-19', 70, 1),
(10, 'XMNGZ ', '2018-06-08', 20, 1),
(11, 'XII80 ', '2018-06-08', 20, 1),
(12, 'PG213 ', '2018-06-11', 20, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorie`
--

CREATE TABLE `kategorie` (
  `katid` int(11) NOT NULL,
  `katbezeichnung` varchar(40) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `kategorie`
--

INSERT INTO `kategorie` (`katid`, `katbezeichnung`) VALUES
(1, 'Obst'),
(2, 'GemÃ¼se'),
(3, 'Tofu'),
(4, 'Brot');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `kid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `anrede` varchar(10) COLLATE utf8_german2_ci NOT NULL COMMENT 'Geschlecht',
  `vorname` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `nachname` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `adresse` varchar(40) COLLATE utf8_german2_ci NOT NULL COMMENT 'Straße & Nummer',
  `plz` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `ort` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `land` varchar(40) COLLATE utf8_german2_ci DEFAULT 'Austria',
  `email` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `rabattgruppe` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`kid`, `uid`, `anrede`, `vorname`, `nachname`, `adresse`, `plz`, `ort`, `land`, `email`, `rabattgruppe`, `priority`) VALUES
(1, 1, 'Herr', 'Test', 'Test', 'Test 3', '1010', 'Wien', 'Ã–sterreich', 'test@test.at', NULL, NULL),
(2, 4, 'Herr', 'Max', 'Mustermann', 'Musterweg 5', '1000', 'Wien', 'Ã–sterreich', 'max@mustermann.at', NULL, NULL),
(3, 5, 'Frau', 'Kim', 'Possible', 'Fairyroad 60', '3010', 'Fairytown', 'Fairyland', 'kim@possible.at', NULL, NULL),
(4, 6, 'Herr', 'Daniel', 'Dauer', 'Draufweg 3', '8000', 'Graz', 'Ã–sterreich', 'dr@dr.at', NULL, NULL),
(5, 7, 'Frau', 'Sabi', 'Sabrina', 'Hagasse  222', '1114', 'Wien', 'Ã–sterreich', 'sbi@sbi.at', NULL, NULL),
(7, 9, 'Frau', 'Julia', 'Twert', 'Wee 3', '1100', 'Wien', 'Ã–sterreich', 'Julia@Ju.at', NULL, NULL),
(9, 11, 'Herr', 'mim', 'madame', 'ma 2', '1111', 'hawk', 'Ã–sterreich', 'm@m.at', NULL, NULL),
(10, 12, 'Herr', 'Merlin', ' der Zauberer', 'Forest 3', '6666', 'shire', 'Ã–sterreich', 'm@z.at', NULL, NULL),
(11, 13, 'Herr', 'Manfreg', 'Mo', 'Friedgasse 3', '2010', 'Gruft', 'Ã–sterreich', 'Man@fr.at', NULL, NULL),
(12, 14, 'Herr', 'Sabine', 'Schuster', 'Gobgasse 2', '1010', 'Wien', 'Ã–sterreich', 'sbi@schuster.at', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkte`
--

CREATE TABLE `produkte` (
  `pid` int(11) NOT NULL,
  `bezeichnung` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `beschreibung` text COLLATE utf8_german2_ci,
  `preis` double NOT NULL COMMENT '€',
  `bewertung` int(11) NOT NULL DEFAULT '5',
  `katid` int(11) NOT NULL,
  `bildref` varchar(40) COLLATE utf8_german2_ci NOT NULL,
  `lagerbestand` int(11) DEFAULT NULL,
  `lieferbar` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`pid`, `bezeichnung`, `beschreibung`, `preis`, `bewertung`, `katid`, `bildref`, `lagerbestand`, `lieferbar`) VALUES
(1, 'Sauerteigbrot 1kg', NULL, 3.5, 8, 4, '', NULL, NULL),
(2, 'Apfel 1kg', NULL, 3, 8, 1, '', NULL, NULL),
(3, 'Birnen 1kg', NULL, 3.5, 7, 1, '', NULL, NULL),
(4, 'Orangen 1kg', NULL, 2, 5, 1, '', NULL, NULL),
(5, 'Banane 1kg', NULL, 2.5, 4, 1, '', NULL, NULL),
(6, 'Mango 1kg', NULL, 5, 9, 1, '', NULL, NULL),
(7, 'Karotten 1kg', NULL, 2, 6, 2, '', NULL, NULL),
(8, 'Kartoffel 1kg', NULL, 1.5, 5, 2, '', NULL, NULL),
(9, 'Fenchel 1kg', NULL, 4.5, 4, 2, '', NULL, NULL),
(10, 'Kraut 1kg', NULL, 1, 5, 2, '', NULL, NULL),
(11, 'Melanzani 1kg', NULL, 2.5, 4, 2, '', NULL, NULL),
(12, 'Zuchini 1kg', NULL, 4, 9, 2, '', NULL, NULL),
(13, 'Tofu natur 200g', NULL, 3, 8, 3, '', NULL, NULL),
(15, 'Tofu RÃ¤uchersticks', NULL, 5, 10, 3, '', NULL, NULL),
(16, 'Tofu getrocknet', NULL, 3.5, 7, 3, '', NULL, NULL),
(17, 'Tofu Yuba 200g', NULL, 6, 8, 3, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnungsnummer`
--

CREATE TABLE `rechnungsnummer` (
  `RN` int(11) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `rechnungsnummer`
--

INSERT INTO `rechnungsnummer` (`RN`, `bid`) VALUES
(3, 28),
(6, 45),
(7, 46),
(1, 47),
(4, 61),
(5, 61),
(2, 62);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `passwort` varchar(35) COLLATE utf8_german2_ci NOT NULL,
  `rolle` varchar(10) COLLATE utf8_german2_ci NOT NULL DEFAULT 'kunde',
  `aktiv` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`uid`, `username`, `passwort`, `rolle`, `aktiv`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1),
(4, 'max', '2ffe4e77325d9a7152f7086ea7aa5114', 'kunde', 1),
(5, 'kim', 'fb1eaf2bd9f2a7013602be235c305e7a', 'kunde', 1),
(6, 'dan', '9180b4da3f0c7e80975fad685f7f134e', 'kunde', 1),
(7, 'sabi', 'ee937e067ebcc8c6ce63929fcd56279b', 'kunde', 1),
(9, 'Julia', '2344521e389d6897ae7af9abf16e7ccc', 'kunde', 1),
(11, 'mim', '8e7f86260c88346052cadd7d68514184', 'kunde', 1),
(12, 'merlin', '12b3638553c1f4a535a047e7003d9ac4', 'kunde', 1),
(13, 'man', '39c63ddb96a31b9610cd976b896ad4f0', 'kunde', 1),
(14, 'sch', 'c340f4803161a481703d1c8bf74156ee', 'kunde', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zahlungsinfo`
--

CREATE TABLE `zahlungsinfo` (
  `zid` int(11) NOT NULL,
  `kid` int(11) NOT NULL,
  `art` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `nummer` varchar(40) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `zahlungsinfo`
--

INSERT INTO `zahlungsinfo` (`zid`, `kid`, `art`, `nummer`) VALUES
(-1, 1, 'Gutschein', '0'),
(1, 2, 'Visa', '1243 1243 1243 1243 '),
(2, 3, 'Bankeinzug', 'SP123 67676 DINGS 666'),
(3, 4, 'Visa', '2332 2332 2333 2333'),
(4, 5, 'Postversand', 'Ich schicke Galonen'),
(6, 7, 'Postversand', 'Ich zahle in Erdbeeren'),
(8, 9, 'Mastercard', '123'),
(9, 10, 'Postversand', 'ZauberstÃ¤be'),
(11, 3, 'Bankeinzug', 'Slavebank 23234543'),
(12, 11, 'Postversand', 'GE22233'),
(13, 11, 'Postversand', 'max StÃ¼cke'),
(14, 12, 'Visa', '15115115151'),
(15, 3, 'Visa', '11111111111111111'),
(16, 3, 'Postversand', 'kimkklk');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `kid-constraint` (`kid`),
  ADD KEY `zid-constraint` (`zid`),
  ADD KEY `gid-constraint` (`gid`);

--
-- Indizes für die Tabelle `b_has_p`
--
ALTER TABLE `b_has_p`
  ADD PRIMARY KEY (`bid`,`pid`),
  ADD KEY `pid-contraint` (`pid`);

--
-- Indizes für die Tabelle `gutschein`
--
ALTER TABLE `gutschein`
  ADD PRIMARY KEY (`gid`);

--
-- Indizes für die Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`katid`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`kid`),
  ADD KEY `uid-const` (`uid`);

--
-- Indizes für die Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `katid-constraint` (`katid`);

--
-- Indizes für die Tabelle `rechnungsnummer`
--
ALTER TABLE `rechnungsnummer`
  ADD PRIMARY KEY (`RN`),
  ADD KEY `bid-constraintrechnung` (`bid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indizes für die Tabelle `zahlungsinfo`
--
ALTER TABLE `zahlungsinfo`
  ADD PRIMARY KEY (`zid`),
  ADD KEY `kid-contraint` (`kid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT für Tabelle `gutschein`
--
ALTER TABLE `gutschein`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `katid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `produkte`
--
ALTER TABLE `produkte`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT für Tabelle `rechnungsnummer`
--
ALTER TABLE `rechnungsnummer`
  MODIFY `RN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT für Tabelle `zahlungsinfo`
--
ALTER TABLE `zahlungsinfo`
  MODIFY `zid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `bestellung`
--
ALTER TABLE `bestellung`
  ADD CONSTRAINT `gid-constraint` FOREIGN KEY (`gid`) REFERENCES `gutschein` (`gid`),
  ADD CONSTRAINT `kid-constraint` FOREIGN KEY (`kid`) REFERENCES `kunde` (`kid`),
  ADD CONSTRAINT `zid-constraint` FOREIGN KEY (`zid`) REFERENCES `zahlungsinfo` (`zid`);

--
-- Constraints der Tabelle `b_has_p`
--
ALTER TABLE `b_has_p`
  ADD CONSTRAINT `bid-constraint` FOREIGN KEY (`bid`) REFERENCES `bestellung` (`bid`),
  ADD CONSTRAINT `pid-contraint` FOREIGN KEY (`pid`) REFERENCES `produkte` (`pid`);

--
-- Constraints der Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD CONSTRAINT `uid-const` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints der Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD CONSTRAINT `katid-constraint` FOREIGN KEY (`katid`) REFERENCES `kategorie` (`katid`);

--
-- Constraints der Tabelle `rechnungsnummer`
--
ALTER TABLE `rechnungsnummer`
  ADD CONSTRAINT `bid-constraintrechnung` FOREIGN KEY (`bid`) REFERENCES `bestellung` (`bid`);

--
-- Constraints der Tabelle `zahlungsinfo`
--
ALTER TABLE `zahlungsinfo`
  ADD CONSTRAINT `kid-contraint` FOREIGN KEY (`kid`) REFERENCES `kunde` (`kid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
