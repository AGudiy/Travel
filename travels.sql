-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 31 2017 г., 13:55
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `travels`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(64) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `ucity` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `city`, `countryid`, `ucity`) VALUES
(1, 'Kiev', 1, NULL),
(2, 'Philadelphia', 3, NULL),
(3, 'Paris', 4, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(1024) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `hotelid`, `userid`) VALUES
(1, 'Gud Hotel', 1, 2),
(2, 'Very gud hotel', 1, 3),
(3, 'Very gud hotel', 2, 3),
(4, 'Very gud hotel', 3, 3),
(5, 'Gud hotel', 2, 2),
(6, 'Gud hotel', 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(4, 'France'),
(1, 'Ukraine'),
(3, 'USA');

-- --------------------------------------------------------

--
-- Структура таблицы `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `hotel` varchar(64) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `countryid` int(11) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `info` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hotels`
--

INSERT INTO `hotels` (`id`, `hotel`, `cityid`, `countryid`, `stars`, `cost`, `info`) VALUES
(1, 'Ukraine', 1, 1, 4, 1500, 'Room with an area of 15-19 square meters with one double or two single beds and comfortable furniture. The bathroom is equipped with a shower or bath. The room is different from the standard only with a bathroom.'),
(2, 'Courtyard Philadelphia Downtown', 2, 3, 5, 5000, 'Исторический отель Courtyard Philadelphia Downtown расположен в 400 м от конгресс-центра Пенсильвании и менее чем в 1 км от Зала Независимости. К услугам гостей фитнес-центр. Отель класса люкс Philadelphia Courtyard внесен в Национальный реестр исторических мест США.'),
(3, 'Paris France Hotel', 3, 4, 5, 8000, 'This hotel, built in 1910 during the period of the Beautiful Age, is ideally located in the center of Paris, with easy access to the tourist attractions of the city. The hotel offers elegantly decorated rooms.');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `imagepath` varchar(255) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `imagepath`, `hotelid`) VALUES
(1, 'images/U1.jpg', 1),
(2, 'images/U2.jpg', 1),
(3, 'images/U3.jpg', 1),
(4, 'images/c1.jpg', 2),
(5, 'images/C2.jpg', 2),
(6, 'images/C3.jpg', 2),
(7, 'images/C4.jpg', 2),
(8, 'images/C5.jpg', 2),
(9, 'images/P1.jpg', 3),
(10, 'images/P2.jpg', 3),
(11, 'images/P3.jpg', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) DEFAULT NULL,
  `pass` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  `avatar` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `discount`, `roleid`, `avatar`) VALUES
(2, 'travaler', '32bc5248e1b351c03824cfc80396fd0d', 'travaler@gmail.com', NULL, 1, NULL),
(3, 'andr', 'dd7c8a297a8d34ba5dc7cd4b45a1e593', 'andr@gmail.com', NULL, 2, NULL),
(4, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1@gmail.com', NULL, 2, NULL),
(5, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user2@gmail.com', NULL, 2, NULL),
(6, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user3@gmail.com', NULL, 2, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ucity` (`city`,`countryid`),
  ADD KEY `countryid` (`countryid`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelid` (`hotelid`),
  ADD KEY `userid` (`userid`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country` (`country`);

--
-- Индексы таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cityid` (`cityid`),
  ADD KEY `countryid` (`countryid`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotelid` (`hotelid`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`hotelid`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`cityid`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotels_ibfk_2` FOREIGN KEY (`countryid`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`hotelid`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleid`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
