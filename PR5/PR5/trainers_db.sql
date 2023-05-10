-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2023 г., 18:10
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `trainers_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `team_members`
--

CREATE TABLE `team_members` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `photo`, `role`) VALUES
(1, 'Екатерина Сидорова', 'https://media.discordapp.net/attachments/802575530473685043/1105807531131023370/Ekaterina_Sidorova.jpg?width=311&height=467', 'Тренер по йоге'),
(2, 'Алексей Иванов', 'https://media.discordapp.net/attachments/802575530473685043/1105807530887749663/Alex.png?width=311&height=467', 'Персональный тренер'),
(3, 'Иван Петров', 'https://media.discordapp.net/attachments/802575530473685043/1105807531365892136/Ivan.jpg?width=311&height=467', 'Тренер по кроссфиту');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
