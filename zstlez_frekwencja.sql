-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 11 Maj 2017, 17:01
-- Wersja serwera: 5.6.29-76.2
-- Wersja PHP: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `zstlez_frekwencja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratorzy`
--

CREATE TABLE IF NOT EXISTS `administratorzy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(277) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `administratorzy`
--

INSERT INTO `administratorzy` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$edcAvRDfxmBVM7Ihv/rEcuiOzyxl2LEeJzzqrKmxwJ8ceMO2yLXoG');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `frekwencja`
--

CREATE TABLE IF NOT EXISTS `frekwencja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uczen_id` int(11) NOT NULL,
  `kalendarz_id` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `n` int(11) NOT NULL,
  `s` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uczen_id` (`uczen_id`),
  KEY `kalendarz_id` (`kalendarz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=18 ;

--
-- Zrzut danych tabeli `frekwencja`
--

INSERT INTO `frekwencja` (`id`, `uczen_id`, `kalendarz_id`, `u`, `n`, `s`) VALUES
(10, 18, 36, 1, 2, 2),
(11, 18, 37, 1, 1, 1),
(12, 18, 38, 1, 1, 1),
(13, 18, 39, 1, 1, 1),
(14, 19, 36, 3, 1, 2),
(15, 19, 37, 3, 1, 2),
(16, 19, 38, 3, 1, 2),
(17, 19, 39, 3, 2, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `grupa`
--

CREATE TABLE IF NOT EXISTS `grupa` (
  `id` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `klasa_id` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `jezyk_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `klasa_id` (`klasa_id`),
  KEY `jezyk_id` (`jezyk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `grupa`
--

INSERT INTO `grupa` (`id`, `klasa_id`, `jezyk_id`) VALUES
('TI_2015_grupa_1', 'TI_2015', 1),
('TI_2015_grupa_2', 'TI_2015', 1),
('TI_2015_grupa_3', 'TI_2015', 3),
('TI_2015_grupa_4', 'TI_2015', 4),
('TI_2016_grupa_1', 'TI_2016', 1),
('TI_2016_grupa_2', 'TI_2016', 1),
('TI_2016_grupa_3', 'TI_2016', 3),
('TI_2016_grupa_4', 'TI_2016', 4),
('TM_2014_grupa_1', 'TM_2014', 1),
('TM_2014_grupa_2', 'TM_2014', 1),
('TM_2014_grupa_3', 'TM_2014', 3),
('TM_2014_grupa_4', 'TM_2014', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jezyk`
--

CREATE TABLE IF NOT EXISTS `jezyk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `jezyk`
--

INSERT INTO `jezyk` (`id`, `nazwa`) VALUES
(1, 'niemiecki'),
(2, 'niemiecki'),
(3, 'rosyjski'),
(4, 'francuski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kalendarz`
--

CREATE TABLE IF NOT EXISTS `kalendarz` (
  `id` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `pn` int(11) NOT NULL,
  `wt` int(11) NOT NULL,
  `sr` int(11) NOT NULL,
  `cz` int(11) NOT NULL,
  `pt` int(11) NOT NULL,
  `so` int(11) NOT NULL,
  `niedz` int(11) NOT NULL,
  `rok` int(4) NOT NULL,
  `miesiac` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kalendarz`
--

INSERT INTO `kalendarz` (`id`, `pn`, `wt`, `sr`, `cz`, `pt`, `so`, `niedz`, `rok`, `miesiac`) VALUES
('01_2016', 0, 0, 0, 0, 0, 0, 0, 2016, 1),
('01_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 1),
('02_2016', 0, 0, 0, 0, 0, 0, 0, 2016, 1),
('02_2017', 1, 1, 1, 1, 0, 1, 1, 2017, 1),
('03_2016', 0, 0, 0, 0, 0, 0, 0, 2016, 1),
('03_2017', 1, 1, 1, 1, 0, 1, 1, 2017, 1),
('04_2016', 0, 0, 0, 0, 0, 0, 0, 2016, 1),
('04_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 1),
('05_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 2),
('05_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 1),
('06_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 2),
('06_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 2),
('07_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 2),
('07_2017', 1, 1, 1, 0, 1, 1, 1, 2017, 2),
('08_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 2),
('08_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 2),
('09_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 2),
('09_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 2),
('10_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 3),
('10_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 3),
('11_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 3),
('11_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 3),
('12_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 3),
('12_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 3),
('13_2016', 1, 1, 0, 1, 1, 0, 1, 2016, 3),
('13_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 3),
('14_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 4),
('14_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 4),
('15_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 4),
('15_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 4),
('16_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 4),
('16_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 4),
('17_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 4),
('17_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 4),
('18_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 5),
('18_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 5),
('19_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 5),
('19_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 5),
('20_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 5),
('20_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 5),
('21_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 5),
('21_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 5),
('22_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 5),
('22_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 5),
('23_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 6),
('23_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 6),
('24_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 6),
('24_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 6),
('25_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 6),
('25_2017', 1, 1, 1, 1, 1, 0, 1, 2017, 6),
('26_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 6),
('26_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 6),
('27_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 7),
('27_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 7),
('28_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 7),
('28_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 7),
('29_2016', 1, 1, 1, 1, 1, 0, 0, 2016, 7),
('29_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 7),
('30_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 7),
('30_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 7),
('31_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 8),
('31_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 7),
('32_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 8),
('32_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 8),
('33_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 8),
('33_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 8),
('34_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 8),
('34_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 8),
('35_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 8),
('35_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 8),
('36_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 9),
('36_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 9),
('37_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 9),
('37_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 9),
('38_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 9),
('38_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 9),
('39_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 9),
('39_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 9),
('40_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 10),
('40_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 10),
('41_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 10),
('41_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 10),
('42_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 10),
('42_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 10),
('43_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 10),
('43_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 10),
('44_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 10),
('44_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 10),
('45_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 11),
('45_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 11),
('46_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 11),
('46_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 11),
('47_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 11),
('47_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 11),
('48_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 11),
('48_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 11),
('49_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 12),
('49_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 12),
('50_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 12),
('50_2017', 1, 1, 1, 1, 1, 1, 1, 2017, 12),
('51_2016', 1, 1, 1, 1, 1, 1, 1, 2016, 12),
('51_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 12),
('52_2016', 1, 1, 1, 1, 1, 1, 0, 2016, 12),
('52_2017', 1, 1, 1, 1, 1, 1, 0, 2017, 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasa`
--

CREATE TABLE IF NOT EXISTS `klasa` (
  `id` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `wychowawca_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `rocznik` varchar(9) COLLATE utf8_polish_ci NOT NULL,
  `skrot` varchar(4) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wychowawca_id` (`wychowawca_id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klasa`
--

INSERT INTO `klasa` (`id`, `wychowawca_id`, `profile_id`, `rocznik`, `skrot`) VALUES
('TI_2015', 3, 1, '2015', 'TI'),
('TI_2016', 1, 1, '2016', 'TI'),
('TM_2014', 2, 3, '2014', 'TM');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podzial`
--

CREATE TABLE IF NOT EXISTS `podzial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupa_id` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data_od` datetime NOT NULL,
  `pon` int(11) NOT NULL,
  `wt` int(11) NOT NULL,
  `sr` int(11) NOT NULL,
  `cz` int(11) NOT NULL,
  `pt` int(11) NOT NULL,
  `so` int(11) NOT NULL,
  `niedz` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grupa_id` (`grupa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='ile godzin w danej grupie w danym dniu' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `profile`
--

INSERT INTO `profile` (`id`, `nazwa`) VALUES
(1, 'Technik Informatyk'),
(2, 'Technik Mechatronik'),
(3, 'Technik Mechanik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rok`
--

CREATE TABLE IF NOT EXISTS `rok` (
  `rok_cz_1` int(11) NOT NULL,
  `rok_cz_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rok`
--

INSERT INTO `rok` (`rok_cz_1`, `rok_cz_2`) VALUES
(2016, 2017);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczen`
--

CREATE TABLE IF NOT EXISTS `uczen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `pesel` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `grupa_id` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data_dodania` datetime NOT NULL,
  `klasa_id` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grupa_id` (`grupa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=20 ;

--
-- Zrzut danych tabeli `uczen`
--

INSERT INTO `uczen` (`id`, `nazwisko`, `imie`, `pesel`, `grupa_id`, `data_dodania`, `klasa_id`) VALUES
(18, 'Jakub', 'MÅ‚ynarski', '34444444444', 'TI_2016_grupa_1', '2017-04-13 13:37:36', 'TI_2016'),
(19, 'Dominik', 'Matueszek', '11111111111', 'TI_2016_grupa_2', '2017-04-30 19:04:37', 'TI_2016');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wychowawca`
--

CREATE TABLE IF NOT EXISTS `wychowawca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `wychowawca`
--

INSERT INTO `wychowawca` (`id`, `nazwisko`, `imie`, `login`, `password`) VALUES
(1, 'Kasper', 'Tomasz', 'tomkasper', '$2y$10$edcAvRDfxmBVM7Ihv/rEcuiOzyxl2LEeJzzqrKmxwJ8ceMO2yLXoG'),
(2, 'KumiÄ™ga', 'Bogdan', 'bkumiega', '$2y$10$RnXeTqLqlACn3nadV/fGTeK.sGaEcLIm191w1wLvAJUfJcAK.ttPa'),
(3, 'Malita', 'Dariusz', 'dmalita', '$2y$10$E0ET128dE8sSKE1XIsCy0.Rc5W8Y85jjxChLrobrYXePnLANvQ2Vu');

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `frekwencja`
--
ALTER TABLE `frekwencja`
  ADD CONSTRAINT `frekwencja_ibfk_1` FOREIGN KEY (`uczen_id`) REFERENCES `uczen` (`id`);

--
-- Ograniczenia dla tabeli `grupa`
--
ALTER TABLE `grupa`
  ADD CONSTRAINT `grupa_ibfk_2` FOREIGN KEY (`jezyk_id`) REFERENCES `jezyk` (`id`),
  ADD CONSTRAINT `grupa_ibfk_3` FOREIGN KEY (`klasa_id`) REFERENCES `klasa` (`id`);

--
-- Ograniczenia dla tabeli `klasa`
--
ALTER TABLE `klasa`
  ADD CONSTRAINT `klasa_ibfk_1` FOREIGN KEY (`wychowawca_id`) REFERENCES `wychowawca` (`id`),
  ADD CONSTRAINT `klasa_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`);

--
-- Ograniczenia dla tabeli `podzial`
--
ALTER TABLE `podzial`
  ADD CONSTRAINT `podzial_ibfk_1` FOREIGN KEY (`grupa_id`) REFERENCES `grupa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
