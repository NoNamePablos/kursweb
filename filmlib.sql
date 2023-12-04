-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2021 г., 00:03
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `filmlib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id_film` int NOT NULL,
  `film_year` int NOT NULL,
  `film_country` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `film_genres` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `film_time` int NOT NULL,
  `film_director` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `film_acters` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `film_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `film_preview` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `film_video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `film_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `film_world_money` int NOT NULL,
  `film_rus_money` int DEFAULT NULL,
  `status` tinyint NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int NOT NULL,
  `film_top` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id_film`, `film_year`, `film_country`, `film_genres`, `film_time`, `film_director`, `film_acters`, `film_description`, `film_preview`, `film_video`, `film_name`, `film_world_money`, `film_rus_money`, `status`, `created_date`, `id_user`, `film_top`) VALUES
(17, 2021, 'Россия', 'БДСМ,МОА,СЕССИЯ', 120, 'БГТУ', 'МОА', 'Тестовый фильм1Тестовый фильм1Тестовый фильм1Тестовый фильм1Тестовый фильм1Тестовый фильм1Тестовый фильм1Тестовый фильм1Тестовый фильм1Тестовый фильм1Тестовый фильм1', '1640032245_brighton-4th-2021.jpg', '1640032245_Rammstein - Deutschland (Official Video).mp4', 'Тестовый фильм1', 1000000, 10000, 1, '2021-12-20 23:30:45', 7, 1),
(18, 2021, 'Россия', 'Товылоаырлоавуырло', 120, 'Raid3R', 'fdsfdsdfsdsfdsffsfds', 'Тестовый фидьбм2Тестовый фидьбм2Тестовый фидьбм2Тестовый фидьбм2Тестовый фидьбм2Тестовый фидьбм2Тестовый фидьбм2Тестовый фидьбм2', '1640032327_logo1.jpg', '1640032327_Rammstein - Deutschland (Official Video).mp4', 'Тестовый фидьбм2', 323232, 32323, 1, '2021-12-20 23:32:07', 7, 1),
(19, 2019, 'gdfgdgdg', 'gdfgdgdgd', 120, 'dgdfgdgdg', 'dgdgdgdg', 'gdfgdgdgd', '1640034053_1.jpg', '1640034053_Rammstein - Deutschland (Official Video).mp4', 'fgdgdgfdgd', 64564, 45654, 1, '2021-12-21 00:00:53', 7, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin` tinyint NOT NULL,
  `change_key` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `age`, `created`, `password`, `admin`, `change_key`) VALUES
(2, 'test1', 'test123@mail.ru', NULL, '2021-12-07 15:37:08', '$2y$10$zEYjeaWu3iGMZqn5CJdMz.InbxUhVj7q5jMcKdq5GUCjXAWCXNsty', 0, NULL),
(7, 'root', 'root@mail.ru', NULL, '2021-12-15 18:42:16', '$2y$10$oAwAm/3gT4yii5dHl06tFe21Y5GsniYWWye2sxzReVM07LZ1MAxZ6', 1, NULL),
(8, '234234', '42342@mail.ru', NULL, '2021-12-18 10:41:44', '$2y$10$.KIlrpNAyDN4uWGgPYDU/uXKWIxL5fu/fUd8IQqtUnKFNo4/brI/.', 0, NULL),
(9, '321243132', 'root1111@mail.ru', NULL, '2021-12-18 10:42:15', '$2y$10$Riuqkkh/umCugpeUxZTsH.stVveLI7KHUg1Qgh9R1MrGrXBF5LCD6', 1, NULL),
(10, '4345345', 'root11111@mail.ru', NULL, '2021-12-18 10:43:37', '$2y$10$ZrCqPBQ2wWiZ..R3kxa9FuDkuV7QyosNIm6xfiZhMJ8MlQLX1VPTW', 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_film`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
