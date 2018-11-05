-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 04. Nov 2018 um 14:01
-- Server-Version: 10.1.32-MariaDB
-- PHP-Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kombi`
--
CREATE DATABASE IF NOT EXISTS `kombi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kombi`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dynamischefragen`
--

DROP TABLE IF EXISTS `dynamischefragen`;
CREATE TABLE IF NOT EXISTS `dynamischefragen` (
  `dfID` int(11) NOT NULL AUTO_INCREMENT,
  `fragetext` text NOT NULL,
  `loesungsschema` text NOT NULL,
  `kategorie` int(2) NOT NULL,
  PRIMARY KEY (`dfID`),
  KEY `FK_kategorie` (`kategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `dynamischefragen`
--

INSERT INTO `dynamischefragen` (`dfID`, `fragetext`, `loesungsschema`, `kategorie`) VALUES
(1, 'In einem Behälter befinden sich [opr]param03=param01+param02;[\\opr] Kugeln, davon sind [opr]param01[\\opr] blau und [opr]param02[\\opr] rot. Aus dem Behälter werden nun ohne Zurücklegen [opr]param04=[ran][min]param01,param02[\\min],[max]param01,param02[\\max][\\ran];[\\opr]  Kugeln zufällig entnommen. Wie groß ist die Wahrscheinlichkeit, in dieser Stichprobe genau [opr]param05=[ran]1,[min]param01,param04[\\min][\\ran];[\\opr] blaue Kugeln vorzufinden?', '[opr][binc]param01,param05[\\binc]*[binc]param02,(param04-param05)[\\binc]/[binc]param03,param04[\\binc][\\opr]', 3),
(2, 'In einer Stadt sprechen [opr]param01=[rnd][ran]500000,10000000[\\ran],-2[\\rnd];[\\opr] Menschen Deutsch oder Portugiesisch. Wenn [opr]param02=[ran]50,90[\\ran];[\\opr]% davon (zumindest) Deutsch sprechen, und [opr]param03=[ran](101-param02),99[\\ran];[\\opr]% (zumindest) Portugiesisch, wie viele sprechen dann beide Sprachen?', '[opr]param01*(param02/100)+param01*(param03/100)-param01[\\opr]', 1),
(3, 'In einer Stadt sprechen [opr]param01=[rnd][ran]500000,10000000[\\ran],-2[\\rnd];[\\opr] Menschen Englisch oder Polnisch. Wenn [opr]param02=[ran]50,90[\\ran];[\\opr]% davon (zumindest) Englisch sprechen, und [opr]param03=[ran](101-param02),99[\\ran];[\\opr]% (zumindest) Polnisch, wie viele sprechen dann beide Sprachen?', '[opr]param01*(param02/100)+param01*(param03/100)-param01[\\opr]', 1),
(4, 'In einem Behälter befinden sich [opr]param03=param01+param02;[\\opr] Kugeln, davon sind [opr]param01[\\opr] gelb und [opr]param02[\\opr] grün. Aus dem Behälter werden nun ohne Zurücklegen [opr]param04=[ran][min]param01,param02[\\min],[max]param01,param02[\\max][\\ran];[\\opr]  Kugeln zufällig entnommen. Wie groß ist die Wahrscheinlichkeit, in dieser Stichprobe genau [opr]param05=[ran]1,[min]param01,param04[\\min][\\ran];[\\opr] gelbe Kugeln vorzufinden?', '[opr][binc]param01,param05[\\binc]*[binc]param02,(param04-param05)[\\binc]/[binc]param03,param04[\\binc][\\opr]', 3),
(5, 'Ein Schütze trifft sein Ziel mit einer Wahrscheinlichkeit von [opr]param01=[rnd][ran]10,90[\\ran],-1[\\rnd];[\\opr]%. Mit welcher Wahrscheinlichkeit erzielt er bei [opr]param02=[ran]3,15[\\ran];[\\opr] Schüssen mehr als [opr]param03=[ran]2,(param02-2)[\\ran];[\\opr] Treffer?', '[opr][sbin]param02,param03,param01[\\sbin][\\opr]', 2),
(6, 'Bei einem Spiele-Automaten gewinnt man in [opr]param01=[rnd][ran]10,90[\\ran],-1[\\rnd];[\\opr]% aller Spiele. Wie groß ist die Wahrscheinlichkeit, dass man bei [opr]param02=[ran]5,20[\\ran];[\\opr] Spielen genau [opr]param03=[ran]3,(param02-2)[\\ran];[\\opr] mal gewinnt?', '[opr][bin]param02,param03,param01[\\bin][\\opr]', 2),
(7, 'Die Wahrscheinlichkeit dafür, dass ein Bienenvolk einen harten Winter überlebt, liegt bei [opr]param01=[rnd][ran]10,90[\\ran],-1[\\rnd];[\\opr]%. Ein Imker besitzt [opr]param02=[ran]3,9[\\ran];[\\opr] Völker. Wie groß ist die Wahrscheinlichkeit, dass mindestens [opr]param03=[ran]1,(param02-2)[\\ran];[\\opr] einen harten Winter überleben? ', '[opr][sbin]param02,param03,param01[\\sbin][\\opr]', 2),
(8, 'In einem „Nachrichtenkanal“ wird ein Zeichen mit der Wahrscheinlichkeit von [opr]param01=[rnd][ran]60,90[\\ran],-1[\\rnd];[\\opr]%  richtig übertragen. Eine Nachricht besteht aus [opr]param02=[ran]10,20[\\ran];[\\opr] Zeichen. Mit welcher Wahrscheinlichkeit werden höchstens [opr]param03=[ran]2,(param02-8)[\\ran];[\\opr] Zeichen falsch übertragen?', '[opr][sbin]param02,(param02-param03),param01[\\sbin][\\opr]', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackID` int(11) NOT NULL AUTO_INCREMENT,
  `frageID` int(11) NOT NULL,
  `text` text NOT NULL,
  `typ` int(2) NOT NULL,
  PRIMARY KEY (`feedbackID`),
  KEY `fragen_feedback` (`frageID`),
  KEY `feedbacktyp_feedback` (`typ`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `feedbacktyp`
--

DROP TABLE IF EXISTS `feedbacktyp`;
CREATE TABLE IF NOT EXISTS `feedbacktyp` (
  `fbTypID` int(2) NOT NULL AUTO_INCREMENT,
  `Bezeichnung` text NOT NULL,
  PRIMARY KEY (`fbTypID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `feedbacktyp`
--

INSERT INTO `feedbacktyp` (`fbTypID`, `Bezeichnung`) VALUES
(1, 'Fehler'),
(2, 'Anmerkung'),
(3, 'Verbesserung');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragenpool`
--

DROP TABLE IF EXISTS `fragenpool`;
CREATE TABLE IF NOT EXISTS `fragenpool` (
  `F_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RA_ID` int(11) DEFAULT NULL,
  `Frage` text NOT NULL,
  `Kategorie` varchar(20) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `Art` varchar(20) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `img` text,
  `TT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`F_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fragenpool`
--

INSERT INTO `fragenpool` (`F_ID`, `RA_ID`, `Frage`, `Kategorie`, `Art`, `img`, `TT_ID`) VALUES
(1, 1, 'Ein Fahrradschloss besteht aus vier Ringen mit den Einstellmoeglichkeiten	von 0 bis 9. Wie viele Moeglichkeiten gibt es, einen Code einzustellen?', 'Variation', 'ZmZ', 'bilder/urne_fahrradschloss.png', 23),
(2, 2, 'Wie viele Melodien mit 10 Noten könnte man mit den Noten a, c und e formen wenn man jeden Ton mehrmals spielen kann?', 'Variation', 'ZmZ', '', 24),
(3, 3, 'Bei einem Interview mit 8 Fragen kann man nur mit ja oder nein antworten. Wie viele Möglichkeiten gibt es insgesamt zu antworten?', 'Variation', 'ZmZ', 'bilder/urne_interview.png', 25),
(4, 4, 'Wie viele Hexadezimalzahlen (Basis 16) gibt es bestehend aus 4 Ziffern ? (z.B.65CF)', 'Variation', 'ZmZ', 'bilder/urne_hexa.png', 26),
(5, 5, 'Wie viele Passwörter der Länge 6 mit Ziffern und Großbuchstaben gibt es? ', 'Variation', 'ZmZ', '', 27),
(6, 6, 'In einem Kinosaal gibt es noch 15 freie Plätze. Wie viele verschiedene Möglichkeiten gibt es, für 3 Personen eine Platzwahl zu treffen?  ', 'Variation', 'ZoZ', 'bilder/vzmz_3.jpg', 19),
(7, 7, 'Wie hoch ist die Wahrscheinlichkeit für einen Olympia-Teilnehmer, im Schwimmen \r\neine der drei Medaillen zu gewinnen, wenn 8 Schwimmer gegeneinander \r\nantreten und jede Ergebnisreihenfolge gleichwahrscheinlich ist?  ', 'Laplace', 'Laplace', '', 2),
(8, 8, 'Eine Theater-AG mit 20 Teilnehmern möchte ein Stück aufführen. Wie viele \r\nMöglichkeiten gibt es, die 3 Hauptrollen an die Teilnehmer zu vergeben? ', 'Variation', 'ZoZ', '', 20),
(9, 9, 'Aus einem Chor, der aus 30 Mitgliedern besteht, sollen 4 Mitglieder in einer \r\nbestimmten Reihenfolge vorsingen.  Wie viele Möglichkeiten gibt es?  ', 'Variation', 'ZoZ', '', 21),
(10, 10, 'Bei einem Contest werden drei Gewinner gekürt. Es nehmen 10 Teilnehmer teil. Wie viele Möglichkeiten gibt es, die \r\nTop 3 zusammenzustellen?', 'Variation', 'ZoZ', 'bilder/urne_zoz_contest.png', 22),
(11, 11, 'Ein Obsthändler packt als Sonderangebot 10 Früchte vier verschiedener Sorten \r\nin Tüten. Wie viele verschiede Fruchttüten kann es geben? ', 'Kombination', 'ZmZ', 'bilder/urne_zmz_fruechte.png', 3),
(12, 12, 'Eine Klasse von 30 Schülern muss einen Klassensprecher wählen. 4 Schüler \r\nkandidieren für dieses Amt. Jeder Schüler hat nur eine Stimme. Wie viele \r\nverschiedene Wahlausgänge gibt es?  ', 'Kombination', 'ZmZ', '', 18),
(13, 13, 'In einem Garten leben 4 Maulwürfe, die sich 6 Maulwurfhügel gebaut haben. Wie viele verschiedene Konstellationen können gebildet werden, wenn sich diese auf ihre Hügel verteilen?', 'Laplace', 'Laplace', 'bilder/kzmz_3.jpg', 15),
(14, 14, 'In der Konditorei kann man aus 10 verschiedenen Sorten Mini-Törtchen zu \r\neinem Angebotspreis 5 beliebige auswählen. Wie viele verschiedene \r\nZusammenstellungen kann es geben?  ', 'Kombination', 'ZmZ', '', 17),
(15, 15, 'Susi möchte sich ein Armband basteln. In einem Bastelgeschäft steht sie vor der \r\nWahl sich 15 Elemente aus großen Perlen, kleine Perlen, und Muscheln für ihr \r\nArmband auszuwählen. Wie viele verschiedene Armbänder können damit erstellt werden unabhängig der Anordnung der Elemente?', 'Kombination', 'ZmZ', 'bilder/kzmz_5.jpg', 16),
(16, 16, 'In der Mensa werden täglich 4 verschiedene Hauptgerichte und 6 verschiedene \nBeilagen angeboten. Der Student entscheidet sich für höchstens ein Hauptgericht und höchstens drei unterschiedliche Beilagen. Wie viele verschiedene Zusammenstellungen gibt es zu dieser Bedingung?', 'Kombination', 'ZoZ', '', 5),
(17, 17, 'Ein Süßigkeiten-Automat besteht aus 30 Fächern, die mit verschiedenen Süßigkeiten zu belegen sind. Wie viele Möglichkeiten hat der Händler, aus einem Sortiment von 40 verschiedenen Sorten eine Auswahl für die Belegung der Reihen zu treffen?', 'Kombination', 'ZoZ', 'bilder/kzoz_2.jpg', 4),
(18, 18, 'Ein Cocktail wird aus drei alkoholischen und drei nicht alkoholischen Zutaten \r\ngemischt. Wie viele verschiedene Cocktails sind bei einem Bestand von 8 \r\nalkoholischen  und 20 nicht alkoholischen Zutaten möglich?   ', 'Kombination', 'ZoZ', '', 6),
(19, 19, 'Für ein Orchester werden 3 Geiger, 2 Flötisten, 4 Saxophonisten und 3 Trompeter \r\nbenötigt.  Unter den Interessenten sind 6 Geiger, 5 Flötisten, 6 Saxophonisten und \r\n8 Trompeter. Wie viele Möglichkeiten gibt es das Orchester zusammenzustellen? ', 'Kombination', 'ZoZ', '', 6),
(20, 20, 'Ein Florist erstellt einen Blumenstrauß aus 4 Rosen und 2 Tulpen. Er besitzt 30 Rosen und 30 Tulpen. Auf wie viele Arten kann er einen Blumenstrauß zusammenstellen, wenn er jede einzelne Blume von allen anderen unterscheiden kann?', 'Kombination', 'ZoZ', '', 6),
(21, 21, 'Eine Playlist enthält 10 Lieder. Wie viele verschiedene Reihenfolgen gibt es, die Lieder abzuspielen?  ', 'Permutation', 'Permutation', '', 7),
(22, 22, 'Bei einer Schnitzeljagd müssen 11 Stationen erreicht werden. Wie viele \r\nMöglichkeiten gibt es diese anzulaufen?', 'Permutation', 'Permutation', '', 7),
(23, 23, 'Bernd spielt gerne mit Zinnsoldaten. In seiner Sammelkiste sind zwei Soldaten \nmit blauer Uniform, 4 mit roter und 3 mit grüner Uniform. Wie viele Möglichkeiten gibt es die Soldaten in einer Reihe anzuordnen, wenn alle Soldaten unterscheidbar sind? ', 'Permutation', 'Permutation', 'bilder/perm_3.jpg', 7),
(24, 24, 'Ein Künstler möchte seine Sammlung  mit 6 Bildern in einem Museum ausstellen. \r\nWie viele Möglichkeiten hat er diese an einer Wand nebeneinander anzuordnen? ', 'Permutation', 'Permutation', '', 7),
(25, 25, 'In einem Bücherregal sollen 4 Romane, 5 Thriller, 2 Backbücher und 3 \r\nSachbücher eingeordnet werden. Wie viele Möglichkeiten gibt es, diese \r\nanzuordnen, wenn Bücher einzelner Rubriken jeweils nebeneinander stehen sollen? ', 'Permutation', 'Permutation', '', 13),
(26, 26, 'Bei einer Blind Booking Reise, kann man in 10 verschiedenen Städten landen. \r\nWie hoch ist die Wahrscheinlichkeit dabei in einer seiner 3 Lieblingsstädte zu \r\nlanden?  ', 'Laplace', 'Laplace', '', 8),
(27, 27, 'Wie hoch ist die Wahrscheinlichkeit, bei einem Kartenspiel mit 52 Karten 2 Asse \nhintereinander zu ziehen, wenn das erste gezogene As nicht zurückgelegt wird? ', 'Laplace', 'Laplace', 'bilder/lapl_2.jpg', 9),
(28, 28, 'Kevin wettet, dass er mit 2 Würfeln eine 7 oder 11 würfelt. Wie hoch ist seine \r\nGewinnchance? ', 'Laplace', 'Laplace', '', 10),
(29, 29, 'In Emmas Schrank befinden sich 8 weiße und 2 schwarze Sockenpaare. Wie hoch \r\nist die Wahrscheinlichkeit, dass sie, ohne etwas zu sehen, ein schwarzes Paar aus dem Schrank nimmt? ', 'Laplace', 'Laplace', '', 8),
(30, 30, 'In einem Restaurant kann man zwischen 3 Vorspeisen, 5 Hauptgerichten und 4 \r\nNachspeisen auswählen. Wie viele Möglichkeiten gibt es, ein Menü \r\nzusammenzustellen? ', 'Produktregel', 'Produktregel', '', 11),
(31, 31, 'Es gibt 3 Routen von Gummersbach nach Köln und 3 von Köln nach Düsseldorf. Wie viele Routen gibt es von Gummersbach nach Düsseldorf?', 'Produktregel', 'Produktregel', '', 11),
(32, 32, 'In einer Bar gibt es 10 verschiedene Bier Sorten, 8 Wein Sorten und 12 Whisky Sorten. Jonas möchte nur ein Getränk trinken. Zwischen wie vielen Möglichkeiten kann ausgewählt werden? ', 'Summenregel ', 'Summenregel ', 'bilder/sum_1.jpg', 12),
(33, 33, 'Hans möchte sich ein neues Smartphone kaufen. Im Elektronikmarkt gibt es 3 \r\nverschiedene iPhones, 5 Samsung, 6 Nokia und 4 HTC Modelle. Wie viele \r\nMöglichkeiten gibt es, ein Smartphone auszuwählen? ', 'Summenregel ', 'Summenregel ', '', 12),
(34, 34, 'Bernd spielt gerne mit Zinnsoldaten. In seiner Sammelkiste sind zwei Soldaten mit blauer Uniform, 4 mit roter und 3 mit grüner. Die Soldaten sind nur an ihrer Farbe unterscheidbar. Also die Soldaten mit gleicher Farbe sind NICHT unterscheidbar. Wie viele Möglichkeiten gibt es, die Soldaten in einer Reihe anzuordnen?', 'Permutation', 'Permutation', '', 7),
(35, 35, 'Auf einem statistischen Erhebungsbogen werden die Merkmale Geschlecht (männlich, weiblich), Alter (fünf Altersstufen), Familienstand (ledig, verheiratet, verlobt, verwitwet), Konfession (4), Schulbildung (5), Wohnortsgröße (6 Möglichkeiten), Wohnungsgröße (8 Möglichkeiten) und Bundesland (16 Auswahlmöglichkeiten) erfragt.\r\nWie viele verschieden ausgefüllte Erhebungsbögen kann es höchstens geben?', 'Produktregel', 'Produktregel', '', 11),
(36, 36, 'In einem Kinosaal gibt es noch 15 freie Plätze, davon 7 in Reihe 10, 8 in Reihe 1. Wie viele verschiede Möglichkeiten gibt es für 3 Personen A,B,C, eine Platzwahl zu treffen, wenn Person A nicht in Reihe 1 sitzen mag?', 'Variation', 'ZoZ', '', 14),
(37, 37, 'Wie groß ist die Wahrscheinlichkeit, mit 4 Würfeln mindestens 2 Dreier zu erzielen?', 'Komplexe', 'Komplexe', '', 28),
(38, 38, 'Wie groß ist die Wahrscheinlichkeit, dass in einer Gruppe von 4 Personen mindestens 2 am gleichen Wochentag Geburtstag haben?', 'Komplexe', 'Komplexe', '', 29),
(39, 39, 'Wie groß ist die Wahrscheinlichkeit, dass in einer Gruppe von 4 Personen GENAU 2 am gleichen Wochentag Geburtstag haben?', 'Komplexe', 'Komplexe', '', 30);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragenpool_en`
--

DROP TABLE IF EXISTS `fragenpool_en`;
CREATE TABLE IF NOT EXISTS `fragenpool_en` (
  `F_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RA_ID` int(11) DEFAULT NULL,
  `Frage` text NOT NULL,
  `Kategorie` varchar(20) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `Art` varchar(20) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `img` text,
  `TT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`F_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fragenpool_en`
--

INSERT INTO `fragenpool_en` (`F_ID`, `RA_ID`, `Frage`, `Kategorie`, `Art`, `img`, `TT_ID`) VALUES
(1, 1, 'How many possible different codes can we assign to a 4-digit resettable bike lock? Every digit can be selected from 0 to 9.', 'Variation', 'ZmZ', 'bilder/urne_fahrradschloss.png', 23),
(2, 2, 'How many melodies can you compose with 10 notes selected from a, c and e, if every tone can be selected several times? ', 'Variation', 'ZmZ', '', 24),
(3, 3, 'Imagine you are in an interview where 8 questions will be asked. You can only answer \"yes\" or \"no\". In how many possible ways can you answer the questions in total?', 'Variation', 'ZmZ', 'bilder/urne_interview.png', 25),
(4, 4, 'How many hexadecimal numbers (base 16) with 4 digits exist? (e.g. 65CF)\r\n', 'Variation', 'ZmZ', 'bilder/urne_hexa.png', 26),
(5, 5, 'How many possible passwords of size 6 can you make when using digits and capital letters?\n ', 'Variation', 'ZmZ', '', 27),
(6, 6, 'In a cinema salon there are still 15 free seats. How many different possibilities exist for 3 people to choose their seats?  ', 'Variation', 'ZoZ', 'bilder/vzmz_3.jpg', 19),
(7, 7, 'How probable is it for an Olympic participant to win one of the three medals in swimming, if all 8 participants have the same probability to win?\n', 'Laplace', 'Laplace', '', 2),
(8, 8, 'A school theatre group with 20 members is planning to perform a play. How many possibilities exist to select members for the 3 main roles?\n', 'Variation', 'ZoZ', '', 20),
(9, 9, 'From a choir group with 30 members, 4 memebers should audition in a specicif sequence. How many possibilities exist?\n', 'Variation', 'ZoZ', '', 21),
(10, 10, 'In a competetion among 10 people, 3 winners are awarded. How many possibilities exist to select the top 3 participants?\n', 'Variation', 'ZoZ', 'bilder/urne_zoz_contest.png', 22),
(11, 11, 'A fruit seller packs bags of 10 fruits from 4 different types of fruits as a special offer. How many differing bags of fruit are possible?\n', 'Kombination', 'ZmZ', 'bilder/urne_zmz_fruechte.png', 3),
(12, 12, 'In a class with 30 students one student should be elected as the school representative. 4 Students run for this position. Every student has only one vote. How many different election results are possible?\n', 'Kombination', 'ZmZ', '', 18),
(13, 13, '4 moles live in a garden. They have made 6 molehills. How many different constellations are possible if each mole chooses a different molehill to stand upon?\n', 'Laplace', 'Laplace', 'bilder/kzmz_3.jpg', 15),
(14, 14, 'There is an offer in a pastry shop that you can choose 5 of your favorite mini-tartlets which come in 10 different flavors. How many different combinations are possible?\n ', 'Kombination', 'ZmZ', '', 17),
(15, 15, 'Susi would like to make an bracelet for herself. In a handicraft shop she found small pearls, large pearls and shells. She needs 15 elements for each bracelet. How many different bracelet can she make without considering the order of the elements?\n', 'Kombination', 'ZmZ', 'bilder/kzmz_5.jpg', 16),
(16, 16, 'The cafeteria of an university serves 4 different main dishes and 6 different side dishes every day. A student chooses at most one main dish and at most 3 side dishes. How many different combinations are possible?', 'Kombination', 'ZoZ', '', 5),
(17, 17, 'A sweet vending-machine contains 30 \nshelves which are filled with different types of sweets and candies. How many possibilities exist for the distributor to fill up the sheleves from an assortment of 40 different products?\n', 'Kombination', 'ZoZ', 'bilder/kzoz_2.jpg', 4),
(18, 18, 'A coctail is made out of three alcoholic and three non-alcoholic ingredients. How many different coctails can we mix when we have 8 alcoolic and 20 non-alcoholic ingredients?', 'Kombination', 'ZoZ', '', 6),
(19, 19, 'For an orchestra 3 violonists, 2 flutists, 4 saxophonists and 3 trumpeters are needed. \nThere are  6 violonists, 5 flutists, 6 saxophonists and 8 trumpeter who are interested in joining the orchestra. In how many different ways can we arrange the orchestra?\n', 'Kombination', 'ZoZ', '', 6),
(20, 20, 'A florist makes a bouquet of flowers with 4 roses and 2 tulips. He has 30 roses and 30 tulips. In how many different ways can he make a flower bouqet if he can distinguish every single flower from all the others?\n', 'Kombination', 'ZoZ', '', 6),
(21, 21, 'A playlist has 10 tracks. In how many different sequences can we arrange these tracks?\n', 'Permutation', 'Permutation', '', 7),
(22, 22, 'In a treasure hunt game there are 11 check points. How many possibilities do you have to visit all the check points?\n\n(Treasure hunt is a game that one or more players try to find some hidden objects in different places. )\n', 'Permutation', 'Permutation', '', 7),
(23, 23, 'Bernd enjos playing with his toy tin soldiers. In his collection are two soldiers with blue uniform, 4 with red and 3 with red uniform. How many possibilities exist to arrange the soldiers in a row, if all soldiers are distinguishable from each other? \n', 'Permutation', 'Permutation', 'bilder/perm_3.jpg', 7),
(24, 24, 'An artist would like to present his collection of 6 pictures in a museum. How many possibilities does he have to hang the pictures on a wall?\n', 'Permutation', 'Permutation', '', 7),
(25, 25, 'In a library booksholf, 4 novels, 5 thriller, 2 textbook and 3 non-fiction books have to be placed. In how many different ways can we order the books, if books of the same category have to stand beneath each other?', 'Permutation', 'Permutation', '', 13),
(26, 26, 'With a blind-booking trip, you can land in 10 differnet cities. What is the probability to land in one of your 3 favorite cities?\n', 'Laplace', 'Laplace', '', 8),
(27, 27, 'When playing a card game with 52 cards, \nhow large is the probability to draw two aces one ofter the other, if the first card is not put back?\n', 'Laplace', 'Laplace', 'bilder/lapl_2.jpg', 9),
(28, 28, 'Kevin bets to get a 7 or 11 by tossing two dices. How high is the probability that he wins his bet?', 'Laplace', 'Laplace', '', 10),
(29, 29, 'In Emma\'s wardrobe are 8 white and 2 black pairs of socks. How high is the probability that she takes a black pair if she grabs without looking into the wardrobe?', 'Laplace', 'Laplace', '', 8),
(30, 30, 'In a restaurant, guests can choose among 3 starters, 5 main dishes and 4 desserts. How many possibilities exists to order a menu?', 'Produktregel', 'Produktregel', '', 11),
(31, 31, 'There are 3 routes from Gummersbach to Cologne and 3 routes from Cologne to Düsseldorf. How many routes exists from Gummersbach to Düsseldorf?\n', 'Produktregel', 'Produktregel', '', 11),
(32, 32, 'In a bar there are 10 different beer types, 8 wines and 12 whisky types. Jonas would like to take one drink only. How many choices does he have?\n', 'Summenregel ', 'Summenregel ', 'bilder/sum_1.jpg', 12),
(33, 33, 'Hans wants to buy a new smart phone. In an electronic shop there are 3 different iPhones, 5 Samsung, 6 Nokia and 4 HTC models. How many choices does he have?', 'Summenregel ', 'Summenregel ', '', 12),
(34, 34, 'Bernd enjoys playing with his toy tin soldiers. In his collection are 2 soldiers with blue, 4 with red and 3 with green uniform. The soldiers are only distinguishable from their color (soldiers with the same color are indistinguishable). In how many different ways can Bernd place the soldiers in a row?\n', 'Permutation', 'Permutation', '', 7),
(35, 35, 'A statistical questionnaire includes questions about the gender (male or female), age (5 different age ranges), marital status (single, married, engaged widowed), religous (4 choices), education level (5 choices), town size (6 choices), size of your apartment (8 choices) and state (16 choices).\nHow many different filled forms are possible?\n', 'Produktregel', 'Produktregel', '', 11),
(36, 36, 'In a cinema salon there are 15 free seats left. 7 seats in the 10th row and 8 in the first row. In how many different ways can 3 people A, B, C take place in this salon, if person A does not like to sit in the first row?', 'Variation', 'ZoZ', '', 14),
(37, 37, 'When tossing 4 dices, how high is the probability that at least two dices will show a \'3\'?', 'Komplexe', 'Komplexe', '', 28),
(38, 38, 'How high is the probability that in a group of 4 people at least 2 of them have their birthday on the same weekday?', 'Komplexe', 'Komplexe', '', 29),
(39, 39, 'How high is the probability that in a group of 4 people EXACTLY 2 of them have their birthday on the same weekday?\n', 'Komplexe', 'Komplexe', '', 30);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorien`
--

DROP TABLE IF EXISTS `kategorien`;
CREATE TABLE IF NOT EXISTS `kategorien` (
  `kID` int(2) NOT NULL AUTO_INCREMENT,
  `bezeichnung` text NOT NULL,
  PRIMARY KEY (`kID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorien`
--

INSERT INTO `kategorien` (`kID`, `bezeichnung`) VALUES
(1, 'Inklusion Exklusion Prinzip'),
(2, 'Binomialverteilung'),
(3, 'Hypergeometrische Verteilung');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `right_answers`
--

DROP TABLE IF EXISTS `right_answers`;
CREATE TABLE IF NOT EXISTS `right_answers` (
  `RA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer` varchar(22) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Answer2` varchar(40) CHARACTER SET utf8 NOT NULL,
  `erklaerung` varchar(300) COLLATE ascii_bin DEFAULT NULL,
  PRIMARY KEY (`RA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Daten für Tabelle `right_answers`
--

INSERT INTO `right_answers` (`RA_ID`, `Answer`, `Answer2`, `erklaerung`) VALUES
(1, '10000', '10^4', '42'),
(2, '59049', '3^10', NULL),
(3, '256', '2^8', NULL),
(4, '65536', '16^4', NULL),
(5, '2176782336', '36^6', NULL),
(6, '2730', '15!/(15-3)!', NULL),
(7, '0.375', '(3*7!)/8!', NULL),
(8, '6840', '20!/(20-3)!', NULL),
(9, '657720', '30!/(30-4)!', NULL),
(10, '720', '10!/(10-3)!', NULL),
(11, '286', '(13über10)', NULL),
(12, '5456', '(33über30)', NULL),
(13, '360', '6*5*4*3', NULL),
(14, '2002', '(14über5)', NULL),
(15, '136', '(17über2)', NULL),
(16, '210', '(1+4)*(1+6+15+20)', NULL),
(17, '847660528	', '(40über30)', NULL),
(18, '63840', '(8über3)*(20über3)', NULL),
(19, '168000', '(6über3)*(5über2)*(6über4)*(8über3)', NULL),
(20, '11921175', '(30über4)*(30über2)', NULL),
(21, '3628800', '10!', NULL),
(22, '39916800', '11!', NULL),
(23, '362880', '9!', NULL),
(24, '720', '6!', NULL),
(25, '829440', '4!*4!*5!*2!*3!', NULL),
(26, '0.3', '3/10', NULL),
(27, '0.00452488687', '4/52*3/51', NULL),
(28, '0.22222222222222', '6/36+2/36', NULL),
(29, '0.2', '2/10', NULL),
(30, '60', '3*5*4', NULL),
(31, '9', '3*3', NULL),
(32, '30', '10+8+12', NULL),
(33, '18', '3+5+6+4', NULL),
(34, '1260', '(9über4)*(5über2)=(9über2)*(7über4)', NULL),
(35, '614400', '2*5*4*4*5*6*8*16', NULL),
(36, '1274', '7*(14!/(14-2)!)', NULL),
(37, '13.194%', '(6*25+4*5+1)/(6^4)', '37'),
(38, '65.015%', '1-(7*6*5*4)/(7^4)', '38'),
(39, '52.478%', '((4über2)*7*(6*5))/(7^4)', '39');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `right_answers_en`
--

DROP TABLE IF EXISTS `right_answers_en`;
CREATE TABLE IF NOT EXISTS `right_answers_en` (
  `RA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer` varchar(22) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Answer2` varchar(40) CHARACTER SET utf8 NOT NULL,
  `erklaerung` varchar(300) COLLATE ascii_bin DEFAULT NULL,
  PRIMARY KEY (`RA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Daten für Tabelle `right_answers_en`
--

INSERT INTO `right_answers_en` (`RA_ID`, `Answer`, `Answer2`, `erklaerung`) VALUES
(1, '10000', '10^4', '42'),
(2, '59049', '3^10', NULL),
(3, '256', '2^8', NULL),
(4, '65536', '16^4', NULL),
(5, '2176782336', '36^6', NULL),
(6, '2730', '15!/(15-3)!', NULL),
(7, '0.375', '(3*7!)/8!', NULL),
(8, '6840', '20!/(20-3)!', NULL),
(9, '657720', '30!/(30-4)!', NULL),
(10, '720', '10!/(10-3)!', NULL),
(11, '286', '(13über10)', NULL),
(12, '5456', '(33über30)', NULL),
(13, '360', '6*5*4*3', NULL),
(14, '2002', '(14über5)', NULL),
(15, '136', '(17über2)', NULL),
(16, '210', '(1+4)*(1+6+15+20)', NULL),
(17, '847660528	', '(40über30)', NULL),
(18, '63840', '(8über3)*(20über3)', NULL),
(19, '16800', '(6über3)*(5über2)*(6über4)*(8über3)', NULL),
(20, '11921175', '(30über4)*(30über2)', NULL),
(21, '3628800', '10!', NULL),
(22, '39916800', '11!', NULL),
(23, '362880', '9!', NULL),
(24, '720', '6!', NULL),
(25, '829440', '4!*4!*5!*2!*3!', NULL),
(26, '0.3', '3/10', NULL),
(27, '0.00452488687', '4/52*3/51', NULL),
(28, '0.22222222222222', '6/36+2/36', NULL),
(29, '0.2', '2/10', NULL),
(30, '60', '3*5*4', NULL),
(31, '9', '3*3', NULL),
(32, '30', '10+8+12', NULL),
(33, '18', '3+5+6+4', NULL),
(34, '1260', '(9über4)*(5über2)=(9über2)*(7über4)', NULL),
(35, '614400', '2*5*4*4*5*6*8*16', NULL),
(36, '1274', '7*(14!/(14-2)!)', NULL),
(37, '13.194%', '(6*25+4*5+1)/(6^4)', '37'),
(38, '65.015%', '1-(7*6*5*4)/(7^4)', '38'),
(39, '52.478%', '((4über2)*7*(6*5))/(7^4)', '39');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tooltipps`
--

DROP TABLE IF EXISTS `tooltipps`;
CREATE TABLE IF NOT EXISTS `tooltipps` (
  `TT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipp1` text COLLATE utf8_bin NOT NULL,
  `Tipp2` text COLLATE utf8_bin,
  `Tipp3` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `Tipp4` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `Tipp5` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`TT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `tooltipps`
--

INSERT INTO `tooltipps` (`TT_ID`, `Tipp1`, `Tipp2`, `Tipp3`, `Tipp4`, `Tipp5`) VALUES
(1, 'n^k', NULL, NULL, NULL, NULL),
(2, 'n*(n-1)*...*(n-k+1)', NULL, NULL, NULL, NULL),
(3, '(n+k-1ÜBERk)', NULL, NULL, NULL, NULL),
(4, '(nÜBERk)', NULL, NULL, NULL, NULL),
(5, '(nÜBERk)', 'Anwenden der Summen- Produktregel', NULL, NULL, NULL),
(6, '(nÜBERk)', 'Anwenden der Produktregel', NULL, NULL, NULL),
(7, 'n*(n-1)*...*1', NULL, NULL, NULL, NULL),
(8, 'günstige Fälle/ mögliche Fälle', NULL, NULL, NULL, NULL),
(9, 'günstige Fälle/ mögliche Fälle', 'Anwenden der Produktregel', NULL, NULL, NULL),
(10, 'günstige Fälle/ mögliche Fälle', 'Anwenden der Summenregel', NULL, NULL, NULL),
(11, 'n1*n2*...*nk', NULL, NULL, NULL, NULL),
(12, 'n1+n2+...+nk', NULL, NULL, NULL, NULL),
(13, 'n*(n-1)*...*1', 'Anwenden der Produktregel', NULL, NULL, NULL),
(14, 'Achtung, hier werden zwei Regeln angewendet. Eine davon ist die Produktregel.', 'Die zweite ist n*(n-1)*...*(n-k+1)', NULL, NULL, NULL),
(15, 'Laplace', 'mit Produkt', NULL, NULL, NULL),
(16, 'n=3', 'k=15', NULL, NULL, NULL),
(17, 'k=5', 'n=10', NULL, NULL, NULL),
(18, 'n=4', 'k=30', NULL, NULL, NULL),
(19, 'n=15', 'n*(n-1)*...*(n-k+1)', NULL, NULL, NULL),
(20, 'n=20', 'n!/(n-k)!', NULL, NULL, NULL),
(21, 'n=30', 'n*(n-1)*...*(n-k+1)', NULL, NULL, NULL),
(22, 'n=10', 'n*(n-1)*...*(n-k+1)', NULL, NULL, NULL),
(23, 'k=4', 'n^k', NULL, NULL, NULL),
(24, 'k=10', 'n^k', NULL, NULL, NULL),
(25, 'k=8', 'n^k', NULL, NULL, NULL),
(26, 'n=16', 'n^k', NULL, NULL, NULL),
(27, 'n = Anzahl Alphabet + Anzahl Ziffern(0-9)', 'n^k', NULL, NULL, NULL),
(28, 'Variationen: 2 Dreier+3 Dreier+4 Dreier', 'Relevant: Variation ZmZ, Kombination ZoZ', 'Rest mit Nicht-3en auffüllen', NULL, NULL),
(29, '1 - P', NULL, NULL, NULL, NULL),
(30, 'Zahl der Paare in Positionsmenge {1,2,3,4} ', 'Rest mit anderen Wochentagen auffüllen', 'Auffüllen: Variation, ZoZ', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tooltipps_en`
--

DROP TABLE IF EXISTS `tooltipps_en`;
CREATE TABLE IF NOT EXISTS `tooltipps_en` (
  `TT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipp1` text COLLATE utf8_bin NOT NULL,
  `Tipp2` text COLLATE utf8_bin,
  `Tipp3` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `Tipp4` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `Tipp5` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`TT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `tooltipps_en`
--

INSERT INTO `tooltipps_en` (`TT_ID`, `Tipp1`, `Tipp2`, `Tipp3`, `Tipp4`, `Tipp5`) VALUES
(1, 'n^k', NULL, NULL, NULL, NULL),
(2, 'n*(n-1)*...*(n-k+1)', NULL, NULL, NULL, NULL),
(3, '((n+k-1)CHOOSEk)', NULL, NULL, NULL, NULL),
(4, '(nCHOOSEk)', NULL, NULL, NULL, NULL),
(5, '(nCHOOSEk)', 'apply sum rule and product rule', NULL, NULL, NULL),
(6, '(nCHOOSEk)', 'apply product rule', NULL, NULL, NULL),
(7, 'n*(n-1)*...*1', NULL, NULL, NULL, NULL),
(8, 'favorable cases/possible cases', NULL, NULL, NULL, NULL),
(9, 'favorable cases/possible cases', 'apply product rule', NULL, NULL, NULL),
(10, 'favorable cases/possible cases', 'apply sum rule', NULL, NULL, NULL),
(11, 'n1*n2*...*nk', NULL, NULL, NULL, NULL),
(12, 'n1+n2+...+nk', NULL, NULL, NULL, NULL),
(13, 'n*(n-1)*...*1', 'apply product rule', NULL, NULL, NULL),
(14, 'Use two rules. One is the product rule.', 'The other is n*(n-1)*...*(n-k+1)', NULL, NULL, NULL),
(15, 'product', NULL, NULL, NULL, NULL),
(16, 'n=3', 'k=15', NULL, NULL, NULL),
(17, 'k=5', 'n=10', NULL, NULL, NULL),
(18, 'n=4', 'k=30', NULL, NULL, NULL),
(19, 'n=15', 'n*(n-1)*...*(n-k+1)', NULL, NULL, NULL),
(20, 'n=20', 'n*(n-1)*...*(n-k+1)', NULL, NULL, NULL),
(21, 'n=30', 'n*(n-1)*...*(n-k+1)', NULL, NULL, NULL),
(22, 'n=10', 'n*(n-1)*...*(n-k+1)', NULL, NULL, NULL),
(23, 'k=4', 'n^k', NULL, NULL, NULL),
(24, 'k=10', 'n^k', NULL, NULL, NULL),
(25, 'k=8', 'n^k', NULL, NULL, NULL),
(26, 'n=16', 'n^k', NULL, NULL, NULL),
(27, 'n = length alphabet + number of digits (0-9)', 'n^k', NULL, NULL, NULL),
(28, 'variations: 2, 3, and 4 Threes', 'use variation w/o rep, combination with rep', 'fill remainder with non-Threes', NULL, NULL),
(29, '1 - P', NULL, NULL, NULL, NULL),
(30, 'number of pairs in position set {1,2,3,4}', 'fill remainder with other weekdays', 'how to fill: variation, w/o repetition', NULL, NULL);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `dynamischefragen`
--
ALTER TABLE `dynamischefragen`
  ADD CONSTRAINT `FK_kategorie` FOREIGN KEY (`kategorie`) REFERENCES `kategorien` (`kID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedbacktyp_feedback` FOREIGN KEY (`typ`) REFERENCES `feedbacktyp` (`fbTypID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fragen_feedback` FOREIGN KEY (`frageID`) REFERENCES `fragenpool` (`F_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
