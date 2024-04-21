-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 21 2024 г., 10:43
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buildings`
--

CREATE TABLE `buildings` (
  `build_id` int(11) NOT NULL,
  `name_building` varchar(255) NOT NULL,
  `address_building` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `buildings`
--

INSERT INTO `buildings` (`build_id`, `name_building`, `address_building`, `image_path`) VALUES
(14, '21', '2123', 'forest.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `list_rooms`
--

CREATE TABLE `list_rooms` (
  `build_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `list_rooms`
--

INSERT INTO `list_rooms` (`build_id`, `room_id`) VALUES
(14, 9),
(14, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'Администратор'),
(2, 'Сотрудник деканата');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `build_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `number_of_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`room_id`, `build_id`, `name`, `number`, `type_id`, `area`, `number_of_seats`) VALUES
(9, 14, '333', 333, 1, 333, 333),
(10, 14, 'fentasy', 4, 1, 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`type_id`, `name`) VALUES
(1, 'Помещение'),
(2, 'Аудитория\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `surname` varchar(127) NOT NULL,
  `name` varchar(127) NOT NULL,
  `patronymic` varchar(127) DEFAULT NULL,
  `nickname` varchar(64) NOT NULL,
  `email` varchar(127) NOT NULL,
  `password` varchar(127) NOT NULL,
  `csrf_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `surname`, `name`, `patronymic`, `nickname`, `email`, `password`, `csrf_token`) VALUES
(1, 1, 'Иванов', 'Иван', 'Иванович', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'b206cfb3e7164e5eed7180e6e1c86962'),
(2, 2, 'Userov', 'User', 'Userovich', 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', ''),
(24, 2, '123', '123', '123', '123', '123@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(82, 2, '345', '345', '345', '345', '345@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', ''),
(84, 2, '444', '444', '444', '444', '444@gmail.com', '550a141f12de6341fba65b0ad0433500', ''),
(92, 2, 'sotrudnic', 'sotrudnic', 'sotrudnic', 'sotrudnic', 'sotrudnic@mail.ru', 'e4969a36faf237622814397323033626', '');

--
-- Триггеры `users`
--
DELIMITER $$
CREATE TRIGGER `hash_password` BEFORE INSERT ON `users` FOR EACH ROW SET NEW.password = MD5(NEW.password)
$$
DELIMITER ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`build_id`);

--
-- Индексы таблицы `list_rooms`
--
ALTER TABLE `list_rooms`
  ADD KEY `build_id` (`build_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `build_id` (`build_id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buildings`
--
ALTER TABLE `buildings`
  MODIFY `build_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `list_rooms`
--
ALTER TABLE `list_rooms`
  ADD CONSTRAINT `list_rooms_ibfk_1` FOREIGN KEY (`build_id`) REFERENCES `buildings` (`build_id`),
  ADD CONSTRAINT `list_rooms_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`);

--
-- Ограничения внешнего ключа таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`type_id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
