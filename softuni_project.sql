-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 дек 2016 в 20:15
-- Версия на сървъра: 10.1.19-MariaDB
-- PHP Version: 7.0.13

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
  `won_xp` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `battle_log`
--

INSERT INTO `battle_log` (`user1_id`, `user2_id`, `winner`, `won_xp`, `date`) VALUES
(1, 2, '1', 360, '2001-09-11 12:30:00'),
(1, 2, '1', 8360, '1997-11-11 12:30:00'),
(3, 4, '3', 120, '2016-11-01 00:00:00'),
(2, 1, '2', 40, '2016-11-30 00:00:00'),
(2, 5, '5', 0, '2016-11-14 00:00:00'),
(1, 2, '2', 100, '2016-08-31 00:00:00'),
(1, 2, '1', 0, '2016-11-30 00:00:00'),
(1, 2, '2', 100, '2016-11-06 00:00:00'),
(2, 1, '2', 50, '2016-11-02 00:00:00'),
(2, 5, '5', 70, '2016-11-29 00:00:00'),
(2, 7, '7', 43, '2016-11-28 00:00:00'),
(2, 6, '0', 238479, '2016-12-16 15:20:20'),
(5, 2, '0', 238479, '2016-12-16 15:22:13'),
(2, 7, '0', 238479, '2016-12-16 15:36:07'),
(6, 2, '0', 238479, '2016-12-16 19:05:29'),
(6, 7, '0', 238479, '2016-12-16 19:05:35'),
(6, 8, '0', 238479, '2016-12-18 14:12:24'),
(6, 8, '8', 22, '2016-12-19 17:32:42'),
(11, 12, '12', 38, '2016-12-20 14:27:56');

-- --------------------------------------------------------

--
-- Stand-in structure for view `clan_ranking`
--
CREATE TABLE `clan_ranking` (
`name` varchar(20)
,`total` decimal(65,0)
);

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
-- Структура на таблица `language_progress`
--

CREATE TABLE `language_progress` (
  `user_id` int(11) NOT NULL,
  `CSharp` int(11) NOT NULL,
  `CPP` int(11) NOT NULL,
  `Java` int(11) NOT NULL,
  `JS` int(11) NOT NULL,
  `PHP` int(11) NOT NULL,
  `Ruby` int(11) NOT NULL,
  `Python` int(11) NOT NULL,
  `Swift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `language_progress`
--

INSERT INTO `language_progress` (`user_id`, `CSharp`, `CPP`, `Java`, `JS`, `PHP`, `Ruby`, `Python`, `Swift`) VALUES
(13, 1, 1, 3, 1, 1, 1, 1, 1),
(14, 1, 1, 1, 1, 1, 1, 1, 1),
(15, 1, 1, 1, 1, 1, 1, 1, 1),
(16, 1, 1, 1, 1, 1, 1, 1, 1),
(17, 1, 1, 1, 1, 1, 1, 1, 1),
(18, 1, 1, 1, 1, 1, 1, 1, 1),
(19, 1, 1, 1, 1, 1, 1, 1, 1),
(20, 1, 1, 1, 1, 1, 1, 1, 1),
(29, 1, 1, 1, 1, 1, 1, 1, 1),
(30, 1, 1, 1, 1, 1, 1, 1, 1),
(31, 1, 1, 1, 1, 1, 1, 1, 1),
(32, 1, 1, 1, 1, 1, 1, 1, 1),
(33, 1, 1, 1, 1, 1, 1, 1, 1),
(34, 1, 1, 1, 1, 1, 1, 1, 1),
(35, 1, 1, 1, 1, 1, 1, 1, 1),
(36, 1, 1, 1, 1, 1, 1, 1, 1),
(37, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `q`
--

CREATE TABLE `q` (
  `id` int(11) NOT NULL,
  `user_1` varchar(20) NOT NULL,
  `user_2` varchar(20) NOT NULL,
  `temp_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `q`
--

INSERT INTO `q` (`id`, `user_1`, `user_2`, `temp_points`) VALUES
(2, 'wtf', 'random_user', 123),
(7, 'wtf', 'Auto_Created_user_8', 123),
(8, 'wtf', 'SilentSlap', 123),
(10, 'nakov', 'random_user', 1),
(11, 'forsen', 'test', 1),
(12, 'forsen', 'test2', 1),
(14, 'forsen', 'random', 0);

-- --------------------------------------------------------

--
-- Структура на таблица `team-requests`
--

CREATE TABLE `team-requests` (
  `team-id` int(11) NOT NULL,
  `user-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `team-requests`
--

INSERT INTO `team-requests` (`team-id`, `user-id`) VALUES
(1, 2),
(2, 2),
(5, 2),
(69, 3),
(85, 2);

-- --------------------------------------------------------

--
-- Структура на таблица `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `xp` int(11) NOT NULL,
  `description` text NOT NULL,
  `leader` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `teams`
--

INSERT INTO `teams` (`id`, `name`, `xp`, `description`, `leader`) VALUES
(8, 'Softuni', 0, 'Software University', 'nakov'),
(9, 'Samurai world', 0, 'description', 'demonking'),
(10, 'SKTelecom T1', 0, 'The best team in the world.', 'faker');

-- --------------------------------------------------------

--
-- Структура на таблица `team_inbox`
--

CREATE TABLE `team_inbox` (
  `team_name` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `team_inbox`
--

INSERT INTO `team_inbox` (`team_name`, `user_id`) VALUES
('softuni_team_', 3);

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
  `xp` int(150) NOT NULL DEFAULT '0',
  `clan` varchar(20) NOT NULL,
  `description` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `nickname`, `first_name`, `last_name`, `email`, `password`, `xp`, `clan`, `description`) VALUES
(13, 'nakov', 'Svetlin', 'Nakov', 'nakov@gmail.com', '$2y$10$lhCfwbUd3bVyPw0jlMIAMeNIb4caRT8lbBWcet1rMNW5IeIdiceBW', 9151, 'Softuni', ''),
(14, 'royalbg', 'Ivan', 'Yonkov', 'royalbg@gmail.com', '$2y$10$46pBLEcRVhvyvIDgHxubgOJJJH2L6OFsLIEEPtk5aHm7jGrZUz5fu', 5000, 'Softuni', ''),
(15, 'angelg', 'Angel', 'Georgiev', 'angelgeorgiev@gmail.com', '$2y$10$w.YIgDun3h7.e70G3wCy3eRZ203EagqkbdcTQWONjW.E/EWZzROha', 3000, 'Softuni', ''),
(16, 'xXpreslitoXx69', 'Preslav', 'Nakov', 'preslav@gmail.com', '$2y$10$qKKiuEv6q/zyPp3qwVOI7OwZHkFOEoxzWny/fuLKMiZi8TpUNoimK', 6969, 'Softuni', ''),
(17, 'thelegend27', 'The', 'Legend', 'thelegend27@gmail.com', '$2y$10$0gYuxYi6j4DfAl28QwNr.eCNtpevb7qss2Ds.KgCDYTGoh43.hOaS', 100000000, '', ''),
(18, 'voroby0v', 'Genady', 'Vorobyov', 'vorobyov@gmail.com', '$2y$10$ougeejigKCKzT7TJGV/equr1tpjONKB6vWORIWzWDU1DhvrudDfom', 0, 'Softuni', ''),
(19, 'sybkata99', 'Petyr', 'Sybev', 'sybev@gmail.com', '$2y$10$mfVC58rZo64q/DHDXN3sROHHP2iQevXTaa2ufPG/bsuNYrWlbhxa2', 0, '', ''),
(20, 'demonking', 'Oda', 'Nobunaga', 'nobunaga@gmail.com', '$2y$10$21sy3DRLzBKFXBu8RUShXOkkzXb5aBYjxTywDOwGJJSyx57n5X5UC', 0, 'Samurai world', ''),
(29, 'faker', 'Lee Sang', 'hyeok', 'faker@abv.bg', '$2y$10$gDTL2ZqrFfVHvhSpXbzCwuQmbturSeT6InjmTbkTkLhyzGTuyjc2u', 99999999, 'SKTelecom T1', ''),
(30, 'wolf', 'Lee', 'Jae-wan', 'wolf@gmail.com', '$2y$10$gFqfWbMfb243BjIp1Ij0BePTVQ8KuKUje3TGzm6UHhO0H2IEViJqq', 0, 'SKTelecom T1', ''),
(31, 'bang', 'Bae', 'Jun-sik', 'bang@gmail.com', '$2y$10$0mcXRNATkxf8wVFObdtQg.hd/6zErglM.//nF133nmLlIihgYR52C', 0, 'SKTelecom T1', ''),
(32, 'huni', 'Seong', 'Hoon Heo', 'huni@gmail.com', '$2y$10$2cI12A9o464c.bvJfgs3OeQpAReJpUbySHnxs7JR3lSxPy0a51JTu', 0, 'SKTelecom T1', ''),
(33, 'blank', 'Kang', 'Sun-gu', 'blank@gmail.com', '$2y$10$oD.XoimX9GBgOUnfkeIT8OpWrSIZZU/SBrOZ/zxvbhC7x2TcpMGK6', 0, 'SKTelecom T1', ''),
(35, 'test5', 'test', 'test', 'test@gmail.com', '$2y$10$BIiftClURVXe35u4RTfmH.pA7A.I0jICPcMHVxuO9L.ZciTURDNu2', 0, '', ''),
(36, 'test6', 'asdasdasda', 'sdasdasd', 'asd@gmail.com', '$2y$10$FJWVZAWS4N8rDydI/lnpfeJ/LEc7Hk6V.Us2QwejShAXaKCxj5D7y', 0, '', ''),
(37, 'test10', 'test', 'test', 'test3@abv.bg', '$2y$10$kh5aZQBJc2KpIfDQFkaa7uf477uq7a0ugp3RQlTWUMz/cXxO4O.Ju', 0, '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_ranking`
--
CREATE TABLE `user_ranking` (
`id` int(11)
,`nickname` varchar(20)
,`first_name` varchar(20)
,`last_name` varchar(20)
,`email` varchar(100)
,`password` varchar(200)
,`xp` int(150)
,`clan` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `clan_ranking`
--
DROP TABLE IF EXISTS `clan_ranking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clan_ranking`  AS  select `teams`.`name` AS `name`,sum(`users`.`xp`) AS `total` from (`users` join `teams`) where (`users`.`clan` = `teams`.`name`) group by `teams`.`name` order by sum(`users`.`xp`) desc ;

-- --------------------------------------------------------

--
-- Structure for view `user_ranking`
--
DROP TABLE IF EXISTS `user_ranking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_ranking`  AS  select `users`.`id` AS `id`,`users`.`nickname` AS `nickname`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`email` AS `email`,`users`.`password` AS `password`,`users`.`xp` AS `xp`,`users`.`clan` AS `clan` from `users` order by `users`.`xp` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_progress`
--
ALTER TABLE `language_progress`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `q`
--
ALTER TABLE `q`
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
-- AUTO_INCREMENT for table `language_progress`
--
ALTER TABLE `language_progress`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `q`
--
ALTER TABLE `q`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
