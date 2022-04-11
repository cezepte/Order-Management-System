CREATE TABLE `clients` (
                    `client_id` int(11) NOT NULL,
                    `firstName` varchar(50) NOT NULL,
                    `lastName` varchar(100) NOT NULL,
                    `company` varchar(200) NOT NULL,
                    `tin` int(11) NOT NULL,
                    `tel_number` text NOT NULL,
                    `email` varchar(200) NOT NULL
                  );
                CREATE TABLE `comapny` (
                    `name` text NOT NULL,
                    `tin_number` text NOT NULL,
                    `street&number` text NOT NULL,
                    `postcode` text NOT NULL,
                    `city` text NOT NULL
                );
                CREATE TABLE `complaints` (
                    `id` int(11) NOT NULL,
                    `order_id` int(11) NOT NULL,
                    `client_id` int(11) NOT NULL,
                    `comment` text NOT NULL,
                    `status` text NOT NULL,
                    `date_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
                );
                CREATE TABLE `invoices_in` (
                    `id` int(9) NOT NULL,
                    `quantity` int(11) NOT NULL,
                    `items` text NOT NULL,
                    `netto_value` text NOT NULL,
                    `vat` text NOT NULL,
                    `brutto_value` int(11) NOT NULL,
                    `contractor_id` int(9) NOT NULL
                );
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
                );
                CREATE TABLE `order_status` (
                    `status_id` int(11) NOT NULL,
                    `name` varchar(30) NOT NULL
                );
                INSERT INTO `order_status` (`status_id`, `name`) VALUES
                    (1, 'przyjeta'),
                    (2, 'zdiagnozowana'),
                    (3, 'w trakcie naprawy'),
                    (4, 'naprawiona'),
                    (5, 'wyslana/odebrana');
                CREATE TABLE `services` (
                    `id` int(11) NOT NULL,
                    `name` varchar(200) NOT NULL,
                    `comment` varchar(1500) NOT NULL,
                    `vat` int(11) NOT NULL
                );
                CREATE TABLE `users` (
                    `id` int(11) NOT NULL,
                    `username` varchar(50) NOT NULL,
                    `password` varchar(100) NOT NULL,
                    `role` varchar(5) NOT NULL DEFAULT 'user',
                    `img_href` text NOT NULL,
                    `date_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
                );
                ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indeksy dla tabeli `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `invoices_in`
--
ALTER TABLE `invoices_in`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `invoices_in`
--
ALTER TABLE `invoices_in`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  ALTER TABLE `users` CHANGE `img_href` `img_href` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
COMMIT;
