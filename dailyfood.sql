-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2023 at 11:23 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dailyfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `userId` int NOT NULL,
  `productId` int NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `count`) VALUES
(21, 4, 3, 1),
(22, 4, 3, 1),
(23, 4, 3, 1),
(24, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
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
-- Table structure for table `delivery_price`
--

CREATE TABLE `delivery_price` (
  `id` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_price`
--

INSERT INTO `delivery_price` (`id`, `price`) VALUES
(1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `structure` text COLLATE utf8mb4_general_ci NOT NULL,
  `maker` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `expDate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `conditions` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `calories` int NOT NULL,
  `proteins` int NOT NULL,
  `fats` int NOT NULL,
  `carb` int NOT NULL,
  `subcategoryId` int NOT NULL,
  `firstImage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `secondImage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `thirdImage` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `structure`, `maker`, `country`, `expDate`, `conditions`, `price`, `weight`, `calories`, `proteins`, `fats`, `carb`, `subcategoryId`, `firstImage`, `secondImage`, `thirdImage`) VALUES
(1, 'Кекс ванильный', 'кукуццукцукцку', 'кцуцкукуц', 'куцкукцук', 'кцуцкуц', 'куццкукцкцу', 320, '400 грамм', 11, 11, 11, 11, 3, 'static/1685194799_6472082fb3992.jpg', 'static/1685194799_6472082fb3f13.jpg', 'static/1685194799_6472082fb4463.jpg'),
(2, 'Поке с лососем', 'Рис для суши (вода питьевая, рис шлифованный, соус мицукан (уксус рисовый из пищевого сырья, сахарный песок, соль, апельсины), соус острый чилли (база для соусов айоли (масло растительное подсолнечное, мелла...', 'ООО «Фитбокс»', 'Россия', '4 дня', 'от +2 °C до +4 °C', 321, '400 грамм', 155, 6, 7, 17, 1, 'static/1685195237_647209e5a0cf5.png', 'static/1685195237_647209e5a12b3.png', 'static/1685195237_647209e5a183f.png'),
(3, 'Поке с лососем', 'Рис для суши (вода питьевая, рис шлифованный, соус мицукан (уксус рисовый из пищевого сырья, сахарный песок, соль, апельсины), соус острый чилли (база для соусов айоли (масло растительное подсолнечное, мелла...', 'ООО «Фитбокс»', 'Россия', '4 дня', 'от +2 °C до +4 °C', 490, '400 грамм', 155, 6, 7, 17, 1, 'static/1685195244_647209ec0ba21.png', 'static/1685195244_647209ec0bfa2.png', 'static/1685195244_647209ec0c4ed.png'),
(4, 'Поке с лососем', 'Рис для суши (вода питьевая, рис шлифованный, соус мицукан (уксус рисовый из пищевого сырья, сахарный песок, соль, апельсины), соус острый чилли (база для соусов айоли (масло растительное подсолнечное, мелла...', 'ООО «Фитбокс»', 'Россия', '4 дня', 'от +2 °C до +4 °C', 880, '400 грамм', 155, 6, 7, 17, 1, 'static/1685195249_647209f15d0c2.png', 'static/1685195249_647209f15d700.png', 'static/1685195249_647209f15dc4e.png'),
(17, 'Попка', 'какой то состав ебачий', 'уйкуе', 'укукеуце', 'кеуцкецук', 'еуцкеуце', 2223, '222', 11, 3, 2, 4, 1, 'static/1685199233_647219815a78c.jpg', 'static/1685199233_647219815ae3e.jpg', 'static/1685199233_647219815bb37.jpg'),
(18, 'Попка', 'какой то состав ебачий', 'уйкуе', 'укукеуце', 'кеуцкецук', 'еуцкеуце', 2223, '222', 11, 3, 2, 4, 1, 'static/1685199236_64721984e8823.jpg', 'static/1685199236_64721984e8f0d.jpg', 'static/1685199236_64721984e96d0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `categoryId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `title`, `categoryId`) VALUES
(1, 'Супы', 10),
(2, 'Закуски', 10),
(3, 'Булочкиии', 13),
(4, 'Какашки', 20),
(5, 'Мясо всякое', 17),
(6, 'БАНАН', 12),
(7, 'ПОПА', 12),
(8, 'грибочкииии!!', 11),
(9, 'творог', 14),
(10, 'молоко', 14),
(11, 'динозавр', 18),
(12, 'Вторые блюда', 10),
(13, 'Сэндвичи', 10),
(14, 'Салаты', 10),
(15, 'Суши и роллы', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL COMMENT '1 - user \r\n2 - moder\r\n3 - admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `role`) VALUES
(4, 'Равиль', 'ravil@mail.ru', '3fc0a7acf087f549ac2b266baf94b8b1', 'Не указан', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
