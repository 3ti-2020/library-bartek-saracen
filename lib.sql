-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Maj 2020, 18:33
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autorzy`
--

CREATE TABLE `autorzy` (
  `id_autor` int(10) NOT NULL,
  `Imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `autorzy`
--

INSERT INTO `autorzy` (`id_autor`, `Imie`, `Nazwisko`) VALUES
(1, 'Bolesław', 'Prus'),
(2, 'Joseph', 'Conrad'),
(3, 'Stanisław', 'Wyspiański'),
(4, 'Fiodor', 'Dostojewski'),
(5, 'Stefan', 'Żeromski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `spis`
--

CREATE TABLE `spis` (
  `id_spis` int(10) NOT NULL,
  `id_autor` int(10) NOT NULL,
  `id_tytul` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `spis`
--

INSERT INTO `spis` (`id_spis`, `id_autor`, `id_tytul`) VALUES
(1, 1, 2),
(2, 2, 5),
(3, 3, 1),
(4, 4, 3),
(5, 5, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tytuły`
--

CREATE TABLE `tytuły` (
  `id_tytul` int(10) NOT NULL,
  `tytul` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `ISBN` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `tytuły`
--

INSERT INTO `tytuły` (`id_tytul`, `tytul`, `ISBN`) VALUES
(1, 'Wesele', 9788304010468),
(2, 'Lalka', 9788373271869),
(3, 'Zbrodnia i kara', 9788371530293),
(4, 'Ludzie bezdomni', 9788373272361),
(5, 'Jądro ciemności', 9788324018079);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indeksy dla tabeli `spis`
--
ALTER TABLE `spis`
  ADD PRIMARY KEY (`id_spis`),
  ADD KEY `autor` (`id_autor`),
  ADD KEY `tytuł` (`id_tytul`) USING BTREE;

--
-- Indeksy dla tabeli `tytuły`
--
ALTER TABLE `tytuły`
  ADD PRIMARY KEY (`id_tytul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `autorzy`
--
ALTER TABLE `autorzy`
  MODIFY `id_autor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `spis`
--
ALTER TABLE `spis`
  MODIFY `id_spis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `tytuły`
--
ALTER TABLE `tytuły`
  MODIFY `id_tytul` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `spis`
--
ALTER TABLE `spis`
  ADD CONSTRAINT `autor` FOREIGN KEY (`id_autor`) REFERENCES `autorzy` (`id_autor`),
  ADD CONSTRAINT `tytuł` FOREIGN KEY (`id_tytul`) REFERENCES `tytuły` (`id_tytul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
