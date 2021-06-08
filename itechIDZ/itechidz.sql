-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 27 2021 г., 15:57
-- Версия сервера: 10.1.37-MariaDB
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `itechidz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(257) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(0, 'admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

-- --------------------------------------------------------

--
-- Структура таблицы `user_info`
--

CREATE TABLE `user_info` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` text,
  `email` varchar(255) DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `login`, `password`, `email`, `Comment`) VALUES
(1, 0, 'maRL+7Dr7gtkdj1ZvFr86w==', 'nYJRVlZObiObJ2QOJB3xYida', 'Dw84DWnFpzNrUfEodhgQnGNGHs20hVwR9vRo', '/D+Y6Fha4KzIwAFr'),
(2, 0, 'yVEUlf7a4T5fxgMM+zeQwA==', 'K2tSLqUunCjKezmAGVEp8Q==', 'E2Mn9HJ/jWD9SsSx37FudgSgOI6yfVu0HkB1LymJ8g==', 'QPlRqiWPdaVdVAwMrcys+7o0W8rxzkS1+Q=='),
(3, 0, '4rChTSWC/Yff8oGVMr0=', 'R0h+7aaKb/FhJhhBnw==', 'AsxBTR6gZzqerlu7pwQROaqXuA==', '0QCpK0uEpCHr/U5CK2xr'),
(4, 0, 'I1WW7Mvvy+vaG6NgoA==', '9QSe0tOIv1K4KWLXZ5Za/w==', 'bjJbhyG/Cqf9oY/j10qry7g4OQ==', 'TZ2OyHVTaqrAvlCF6m0b'),
(7, 0, 'xMFI86+tnwd3meydjjqBIg==', 'YJcmhmyId9ZgUoQRWvlLmEqFNc7u', 'inNjLtcJzFvkuNahYNEQ2ScErQfMiL3Jk/PHLJRs88RO', 'AhW9rLDvYFd46nAUZVs=');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
