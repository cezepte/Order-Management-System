-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Czas generowania: 17 Kwi 2022, 11:10
-- Wersja serwera: 5.7.34
-- Wersja PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `serwis_test`
--

-- --------------------------------------------------------

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `company` varchar(200) NOT NULL,
  `tin` int(11) NOT NULL,
  `tel_number` text NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `company` (
  `name` text NOT NULL,
  `tin_number` text NOT NULL,
  `street&number` text NOT NULL,
  `postcode` text NOT NULL,
  `city` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` text NOT NULL,
  `date_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `invoices_in` (
  `id` int(9) NOT NULL,
  `contractor_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `invoices_in_items` (
  `invoice_in_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item` text NOT NULL,
  `item_price_netto` int(11) NOT NULL,
  `item_vat` int(11) NOT NULL,
  `item_price_brutto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `service_id` int(15) NOT NULL,
  `comment` text NOT NULL,
  `clients_id` int(9) NOT NULL,
  `netto_price` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `payed` tinyint(1) DEFAULT '0',
  `date_c` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_u` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `order_status` (
  `status_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `order_status`
--

INSERT INTO `order_status` (`status_id`, `name`) VALUES
(1, 'przyjeta'),
(2, 'zdiagnozowana'),
(3, 'w trakcie naprawy'),
(4, 'naprawiona'),
(5, 'wyslana/odebrana');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `comment` varchar(1500) NOT NULL,
  `vat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'user',
  `img_href` text NOT NULL,
  `date_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `invoices_in`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `invoices_in`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
