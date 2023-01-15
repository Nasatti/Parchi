-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 16, 2023 alle 00:03
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parchi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `animale`
--

CREATE TABLE `animale` (
  `id` int(11) NOT NULL,
  `stato_salute` varchar(255) NOT NULL,
  `data_nascita` date NOT NULL,
  `sesso` tinyint(1) NOT NULL,
  `specie` varchar(255) NOT NULL,
  `parco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `animale`
--

INSERT INTO `animale` (`id`, `stato_salute`, `data_nascita`, `sesso`, `specie`, `parco`) VALUES
(1, 'ottimo', '2023-01-12', 1, 'Scoiattolo', 'Parco Nazionale dello Stelvio');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordine`
--

CREATE TABLE `ordine` (
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `ordine`
--

INSERT INTO `ordine` (`nome`) VALUES
('Mammiferi');

-- --------------------------------------------------------

--
-- Struttura della tabella `parco`
--

CREATE TABLE `parco` (
  `nome` varchar(255) NOT NULL,
  `Regione` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `parco`
--

INSERT INTO `parco` (`nome`, `Regione`) VALUES
('Gargano', 'Puglia'),
('Parco Nazionale dello Stelvio', 'Lombardia');

-- --------------------------------------------------------

--
-- Struttura della tabella `specie`
--

CREATE TABLE `specie` (
  `nome` varchar(255) NOT NULL,
  `ordine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `specie`
--

INSERT INTO `specie` (`nome`, `ordine`) VALUES
('Scoiattolo', 'Mammiferi');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `animale`
--
ALTER TABLE `animale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_specie` (`specie`),
  ADD KEY `idx_parco` (`parco`);

--
-- Indici per le tabelle `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `parco`
--
ALTER TABLE `parco`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `specie`
--
ALTER TABLE `specie`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `idx_ordine` (`ordine`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `animale`
--
ALTER TABLE `animale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `animale`
--
ALTER TABLE `animale`
  ADD CONSTRAINT `parco` FOREIGN KEY (`parco`) REFERENCES `parco` (`nome`),
  ADD CONSTRAINT `specie` FOREIGN KEY (`specie`) REFERENCES `specie` (`nome`);

--
-- Limiti per la tabella `specie`
--
ALTER TABLE `specie`
  ADD CONSTRAINT `ordine` FOREIGN KEY (`ordine`) REFERENCES `ordine` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
