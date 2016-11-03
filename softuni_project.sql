-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softuni_project`
--

-- --------------------------------------------------------

--
-- Структура на таблица `battle_log`
--

CREATE TABLE `battle_log` (
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `winner` varchar(20) NOT NULL,
  `wonned_xp` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `battle_log`
--

INSERT INTO `battle_log` (`user1_id`, `user2_id`, `winner`, `wonned_xp`, `date`) VALUES
(1, 2, '1', 360, '2001-09-11 12:30:00'),
(1, 2, '1', 8360, '1997-11-11 12:30:00');

-- --------------------------------------------------------

--
-- Структура на таблица `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'C#'),
(2, 'PHP');

-- --------------------------------------------------------

--
-- Структура на таблица `languages-to-user`
--

CREATE TABLE `languages-to-user` (
  `user-id` int(11) NOT NULL,
  `language-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `languages-to-user`
--

INSERT INTO `languages-to-user` (`user-id`, `language-id`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `team-chat`
--

CREATE TABLE `team-chat` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(1000) CHARACTER SET utf16 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `team-chat`
--

INSERT INTO `team-chat` (`team_id`, `user_id`, `message`, `date`) VALUES
(1, 1, 'shibaniq chat bachka ', '2016-11-02 08:28:07'),
(1, 2, '(. Y .)', '2016-11-16 00:00:00');

-- --------------------------------------------------------

--
-- Структура на таблица `team-to-user`
--

CREATE TABLE `team-to-user` (
  `user-id` int(11) NOT NULL,
  `team-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `team-to-user`
--

INSERT INTO `team-to-user` (`user-id`, `team-id`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `teams`
--

INSERT INTO `teams` (`id`, `name`) VALUES
(1, 'SKTelecom T1'),
(2, 'softuni_team_');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `xp` int(150) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `nickname`, `first_name`, `last_name`, `email`, `password`, `xp`) VALUES
(1, 'random_user', 'gosho', 'goshofamiliq', 'email@test.com', '123hardpass321', 420),
(2, 'wtf', 'nakov', 'nakov1', 'billgates@apple.com', 'qwerty', 69);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
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
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
