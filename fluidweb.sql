-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 18 2021 г., 17:03
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fluidweb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `image` varchar(80) NOT NULL,
  `userid` int(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `image`, `userid`) VALUES
(13, '2ftwfqc5apI.jpg', 'uploads/2ftwfqc5apI.jpg', 25),
(14, 'czgB-aZc-Eo.jpg', 'uploads/czgB-aZc-Eo.jpg', 25),
(16, 'y4N6LopDFHc.jpg', 'uploads/y4N6LopDFHc.jpg', 25),
(22, 'VCxxwmjo9R8.jpg', 'uploads/VCxxwmjo9R8.jpg', 19),
(24, 'IMG_20180420_170630_252.JPG', 'uploads/IMG_20180420_170630_252.JPG', 19),
(25, 'Screenshot_2018-03-10-23-28-17.png', 'uploads/Screenshot_2018-03-10-23-28-17.png', 19),
(26, 'Screenshot_2018-04-04-22-13-08.png', 'uploads/Screenshot_2018-04-04-22-13-08.png', 19),
(30, 'Meme.png', 'uploads/Meme.png', 19),
(31, '4gM2TbDVfSY.jpg', 'uploads/4gM2TbDVfSY.jpg', 29);

-- --------------------------------------------------------

--
-- Структура таблицы `like_unlike`
--

CREATE TABLE `like_unlike` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `like_unlike`
--

INSERT INTO `like_unlike` (`id`, `userid`, `postid`, `type`, `timestamp`) VALUES
(1, 19, 13, 1, '2021-08-17 15:47:27'),
(2, 19, 14, 1, '2021-08-17 15:47:27'),
(3, 19, 15, 0, '2021-08-17 16:17:44'),
(4, 19, 22, 1, '2021-08-17 16:10:42'),
(5, 19, 16, 1, '2021-08-17 16:14:24'),
(6, 19, 30, 1, '2021-08-18 13:34:45'),
(7, 19, 29, 1, '2021-08-17 16:17:06'),
(8, 19, 26, 1, '2021-08-17 16:17:42'),
(9, 27, 14, 1, '2021-08-17 16:24:44'),
(10, 27, 13, 1, '2021-08-17 16:30:22'),
(11, 27, 29, 1, '2021-08-17 16:30:09'),
(12, 27, 16, 1, '2021-08-17 16:30:06'),
(13, 27, 22, 1, '2021-08-17 16:30:17'),
(14, 28, 25, 0, '2021-08-17 16:32:29'),
(15, 28, 13, 1, '2021-08-17 16:31:53'),
(16, 19, 24, 0, '2021-08-18 13:35:34'),
(17, 29, 24, 0, '2021-08-18 13:48:41');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(24) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(18, 'vadosik@gmail.com', 'vadosik', '$2y$10$d2Cdq/MVQJFZEoBdoFwQ6OTRKZPgOfb4Db48eyHad9O5uSELr3Vay'),
(19, 'dariy.artiem@gmail.com', 'Master', '$2y$10$khHebQFLmY0puIruV7y6Petj7TLcOsys6Qm/vzuAojgAuvpZdosd.'),
(24, 'dynastasea@gmail.com', 'dynastasea', '$2y$10$R4LZ6foj4ofvqC0D0ipb4ek2TdG8L.zecfvGHgguNLeqonC3b7Ygq'),
(25, 'test@gmail.com', '2222', '$2y$10$K3QctH5D2xf0WVuxIxuLt.pDG11J4d826f3u5yFzK/S3ZcQCY.zyK'),
(26, 'kizilov.vitjamba@gmail.com', 'Vit9mba', '$2y$10$B1dz4f.kvlhV5Wg9rOyhnOOM1fOoNCSevJxiL7pDiLuzKO86A9/QG'),
(27, 'test1@gmail.com', '21914404', '$2y$10$3qewq9/49Xil129CjjwOyeZjXZrJ9fdO8XfxtZzxz5Jt8UeZp46dG'),
(28, 'test2@gmail.com', '123', '$2y$10$t94.EAMEDgdG46M9/c5zvuarfujafuhIoZl9r3y.0jacx9E1IQyh2'),
(29, 'test3@gmail.com', 'kizilov.v', '$2y$10$AXKDKdokS9FGZW3yUIh6u.OLwY5KtiHZ3GDYGV2vgCyu0xRdnXgd.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Индексы таблицы `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
