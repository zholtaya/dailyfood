-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 29 2023 г., 17:42
-- Версия сервера: 5.7.39-log
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dailyfood`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `count`) VALUES
(21, 4, 3, 1),
(22, 4, 3, 1),
(23, 4, 3, 1),
(24, 4, 3, 1),
(25, 5, 2, 1),
(26, 5, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `img`) VALUES
(9, 'Вода и напитки', 'static/1685031303_646f89870c43d.jpg'),
(10, 'Готовая еда', 'static/1685031339_646f89ab4ac59.jpg'),
(11, 'Овощи, зелень и грибы', 'static/1685031348_646f89b4ec87f.jpg'),
(12, 'Фрукты и ягоды', 'static/1685031363_646f89c3c43c2.jpg'),
(13, 'Хлеб и выпечка', 'static/1685031372_646f89cc33161.jpg'),
(14, 'Молочные  продукты', 'static/1685031381_646f89d526315.jpg'),
(15, 'Десерты', 'static/1685031388_646f89dcbbfc8.jpg'),
(16, 'Перекус', 'static/1685031397_646f89e50bdc7.jpg'),
(17, 'Мясо и рыба', 'static/1685031404_646f89ec39d4e.jpg'),
(18, 'Бакалея', 'static/1685031412_646f89f432a29.jpg'),
(19, 'Замороженные  продукты', 'static/1685031421_646f89fd20906.jpg'),
(20, 'Детское питание', 'static/1685031429_646f8a05e70bf.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `delivery_price`
--

CREATE TABLE `delivery_price` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `delivery_price`
--

INSERT INTO `delivery_price` (`id`, `price`) VALUES
(1, 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `structure` text NOT NULL,
  `maker` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `expDate` varchar(255) NOT NULL,
  `conditions` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `calories` int(11) NOT NULL,
  `proteins` int(11) NOT NULL,
  `fats` int(11) NOT NULL,
  `carb` int(11) NOT NULL,
  `subcategoryId` int(11) NOT NULL,
  `firstImage` varchar(255) NOT NULL,
  `secondImage` varchar(255) NOT NULL,
  `thirdImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `structure`, `maker`, `country`, `expDate`, `conditions`, `price`, `weight`, `calories`, `proteins`, `fats`, `carb`, `subcategoryId`, `firstImage`, `secondImage`, `thirdImage`) VALUES
(19, 'Вода «Сенежская» ', 'Вода минеральная природная столовая.', 'Бобимэкс', 'Россия', '570 д.', 'от 0 °C до +25 °C', 69, '3 л.', 1, 1, 1, 1, 17, 'static/1685363750_64749c261e862.jpg', 'static/1685363750_64749c261eb53.jpg', 'static/1685363750_64749c261edaf.jpg'),
(20, 'Вода «Раифский источник»', 'Вода питьевая артезианская первой категории.', 'ООО «Перспектива»', 'Россия', '180 д.', 'от 0 °C до +25 °C', 69, '5 л.', 1, 1, 1, 1, 17, 'static/1685364184_64749dd816a23.jpg', 'static/1685364184_64749dd816cbb.jpg', 'static/1685364184_64749dd816f29.jpg'),
(25, 'Вода минеральная Borjomi', 'Минерализация: 5, 0 – 7, 5 г/л. Основной состав, мг/л: кальций 20 – 150, калий 15 - 45, магний 20 – 150, натрий 1000 – 2000, сульфаты < 10, гидрокарбонаты 3500 – 5000, хлориды 250 – 500.', 'IDS Borjomi Georgia', 'Грузия', '450 д.', 'от 0C˚ до 25C˚', 159, '1 л.', 1, 1, 1, 1, 16, 'static/1685364627_64749f93a432b.jpg', 'static/1685364627_64749f93a4538.jpg', 'static/1685364627_64749f93a4791.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `title`, `categoryId`) VALUES
(1, 'Супы', 10),
(2, 'Закуски', 10),
(12, 'Вторые блюда', 10),
(13, 'Сэндвичи', 10),
(14, 'Салаты', 10),
(15, 'Суши и роллы', 10),
(16, 'Газированная вода', 9),
(17, 'Вода без газа', 9),
(18, 'Фруктовые соки', 9),
(19, 'Овощные соки', 9),
(20, 'Морсы, компоты, кисели', 9),
(21, 'Холодный чай', 9),
(22, 'Кофейные напитки', 9),
(23, 'Помидоры', 11),
(24, 'Огурцы', 11),
(25, 'Авокадо', 11),
(26, 'Картошка и батат', 11),
(28, 'Свёкла и морковь', 11),
(29, 'Лук и чеснок', 11),
(30, 'Капуста', 11),
(31, 'Кабачки, баклажаны, перец', 11),
(32, 'Грибы', 11),
(33, 'Зелень, салат, пряные травы', 11),
(34, 'Цитрусовые', 12),
(35, 'Бананы', 12),
(36, 'Ягоды', 12),
(37, 'Яблоки и груши', 12),
(38, 'Виноград', 12),
(39, 'Сливы, абрикосы, персики', 12),
(40, 'Сухофрукты', 12),
(41, 'Хлеб', 13),
(42, 'Лаваш и лепешки', 13),
(43, 'Бездрожжевой хлеб', 13),
(44, 'Сладкая выпечка', 13),
(45, 'Несладкая выпечка', 13),
(47, 'Хлебцы', 13),
(48, 'Печенье и пирожные', 13),
(49, 'Молоко и сливки', 14),
(50, 'Масло', 14),
(51, 'Яйца', 14),
(52, 'Твердый сыр', 14),
(53, 'Мягкий сыр', 14),
(54, 'Творожный сыр', 14),
(55, 'Кефир, сметана, творог', 14),
(56, 'Густые йогурты', 14),
(57, 'Питьевые йогурты', 14),
(58, 'Йогурты без добавок', 14),
(59, 'Торты', 15),
(60, 'Круассаны и маффины', 15),
(61, 'Зефир и пастила', 15),
(62, 'Молочный шоколад', 15),
(63, 'Темный и белый шоколад', 15),
(64, 'Конфеты и леденцы', 15),
(65, 'Варенье, мед, пасты', 15),
(66, 'Орехи и сухофрукты', 16),
(67, 'Злаковые и фруктовые батончики', 16),
(68, 'Сырки', 16),
(69, 'Леденцы и жвачка', 16),
(70, 'Хлебные и зерновые чипсы', 16),
(71, 'Сырные снеки', 16),
(72, 'Индейка и курица', 17),
(73, 'Говядина', 17),
(74, 'Фарш', 17),
(75, 'Стейки', 17),
(76, 'Солёная и копчёная рыба', 17),
(77, 'Селёдка и килька', 17),
(78, 'Икра', 17),
(79, 'Замороженная рыба', 17),
(80, 'Морепродукты', 17),
(81, 'Креветки', 17),
(82, 'Рыбные консервы', 17),
(83, 'Макароны', 18),
(84, 'Соусы для пасты', 18),
(85, 'Рис', 18),
(86, 'Гречка', 18),
(87, 'Другие крупы', 18),
(88, 'Для выпечки', 18),
(89, 'Соль, сахар, заменители', 18),
(90, 'Хлопья и мюсли', 18),
(91, 'Масло, соусы, специи', 18),
(92, 'Чай и кофе', 18),
(93, 'Консервы', 18),
(94, 'Мороженое', 19),
(95, 'Пельмени и вареники', 19),
(96, 'Овощи и ягоды', 19),
(97, 'Грибы', 19),
(98, 'Полуфабрикаты', 19),
(99, 'Молоко и коктейли', 20),
(100, 'Йогурты и творожки', 20),
(101, 'Молочные смеси', 20),
(102, 'Каши', 20),
(103, 'Пюре', 20),
(104, 'Печенье и батончики', 20),
(105, 'Вода и напитки', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 - user \r\n2 - moder\r\n3 - admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `role`) VALUES
(4, 'Равиль', 'ravil@mail.ru', '3fc0a7acf087f549ac2b266baf94b8b1', 'Не указан', 1),
(5, 'Лейсан', 'leysanf2003@yandex.ru', '72d7d8a2f001bcc16772e58cd0d299e8', 'Не указан', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
