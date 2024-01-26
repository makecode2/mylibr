-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 03 2024 г., 14:47
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL,
  `author_let` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `author`, `alias`, `author_let`) VALUES
(1, 'Фрэнсис Бэкон', 'bekon', 'Б'),
(2, 'Чингиз Айтматов', 'aitmatov', 'А');

-- --------------------------------------------------------

--
-- Структура таблицы `author_ganre`
--

CREATE TABLE `author_ganre` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `ganre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `author_ganre`
--

INSERT INTO `author_ganre` (`id`, `author_id`, `ganre_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `author_alias` varchar(256) NOT NULL,
  `file` varchar(256) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `author_alias`, `file`, `title`) VALUES
(1, 'aitmatov', 'aitmatov\\oblako.html', 'Белое облако Чингисхана'),
(2, 'aitmatov', 'books/aitmatov/parohod.html', 'Белый пароход'),
(3, 'aitmatov', 'books/aitmatov/pes.html', 'Пегий пес, бегущий краем моря'),
(4, 'aitmatov', 'books/aitmatov/plaha.html', 'Плаха'),
(5, 'aitmatov', 'books/aitmatov/pole.html', 'Материнское поле'),
(6, 'bekon', 'books/bekon/nauka.html', 'Великое восстановление наук. Разделение наук'),
(7, 'bekon', 'books/bekon/organon.html', 'Великое восстановление наук. Новый Органон');

-- --------------------------------------------------------

--
-- Структура таблицы `ganres`
--

CREATE TABLE `ganres` (
  `id` int(11) NOT NULL,
  `ganre` varchar(256) NOT NULL,
  `alias` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `ganres`
--

INSERT INTO `ganres` (`id`, `ganre`, `alias`) VALUES
(1, 'Проза', 'proza'),
(2, 'Философия', 'phylosofy');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `author_ganre`
--
ALTER TABLE `author_ganre`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ganres`
--
ALTER TABLE `ganres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `author_ganre`
--
ALTER TABLE `author_ganre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `ganres`
--
ALTER TABLE `ganres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
authorsauthor_ganrebooks