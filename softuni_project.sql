-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2016 at 01:33 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
-- Table structure for table `battle_log`
--

CREATE TABLE `battle_log` (
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `winner` varchar(20) NOT NULL,
  `won_xp` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `battle_log`
--

INSERT INTO `battle_log` (`user1_id`, `user2_id`, `winner`, `won_xp`, `date`) VALUES
(1, 2, '1', 360, '2001-09-11 12:30:00'),
(1, 2, '1', 8360, '1997-11-11 12:30:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `clan_ranking`
--
CREATE TABLE `clan_ranking` (
`id` int(11)
,`name` varchar(50)
,`description` varchar(500)
,`xp` int(11)
,`leader` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'CSharp'),
(2, 'CPP'),
(3, 'Java'),
(4, 'JS'),
(5, 'PHP'),
(6, 'Ruby'),
(7, 'Python'),
(8, 'Swift');

-- --------------------------------------------------------

--
-- Table structure for table `language_progress`
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
-- Dumping data for table `language_progress`
--

INSERT INTO `language_progress` (`user_id`, `CSharp`, `CPP`, `Java`, `JS`, `PHP`, `Ruby`, `Python`, `Swift`) VALUES
(1, 2, 1, 8, 1, 5, 1, 3, 1),
(2, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 1, 1, 1, 1, 1, 1, 1, 1),
(7, 1, 1, 1, 1, 1, 1, 1, 1),
(8, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team-chat`
--

CREATE TABLE `team-chat` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(1000) CHARACTER SET utf16 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team-chat`
--

INSERT INTO `team-chat` (`team_id`, `user_id`, `message`, `date`) VALUES
(1, 2, '(. Y .)', '2016-11-16 00:00:00'),
(1, 1, 'This should be now on the bottom', '2016-12-06 00:00:00'),
(1, 1, 'It actually works. . .', '2016-12-07 00:00:00'),
(1, 1, 'It actually works. . .1', '2016-12-08 00:00:00'),
(1, 1, 'It actually works. . .2', '2016-12-09 00:00:00'),
(1, 1, 'It actually works. . .3', '2016-12-10 00:00:00'),
(1, 1, 'It actually works. . .4', '2016-12-11 00:00:00'),
(1, 1, 'It actually works. . .', '2016-12-07 00:00:00'),
(1, 1, 'It actually works. . .5', '2016-12-12 00:00:00'),
(1, 1, 'It actually works. . .6', '2016-12-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `team-to-user`
--

CREATE TABLE `team-to-user` (
  `user-id` int(11) NOT NULL,
  `team-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team-to-user`
--

INSERT INTO `team-to-user` (`user-id`, `team-id`) VALUES
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `xp` int(11) NOT NULL,
  `leader` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `description`, `xp`, `leader`) VALUES
(1, 'SKTelecom T1', 'This is a story about a blue man that lived on a blue planet in his blue little house and everything was blue. I''m blue dabadi dabadai.', 0, ''),
(2, 'softuni_team_', '', 0, ''),
(3, 'Ninjas', '*Silence*lasbdladlkasjdncljasdclkjansdlicbasidhblkasdjbiasdbvlasjdbvliahsdbvlasbdvliahbdvlab\nsbdladlkasjdncljasdclkjansdlicbasidhblkasdjbiasdbvlasjdbvliahsdbvlasbdv\n\nsbdladlkasjdncljasdclkjansdlicbasidhblkasdjbiasdbvlasjdbvliahsdbvlasbdv\n\nsbdladlkasjdncljasdclkjansdlicbasidhblkasdjbiasdbvlasjdbvliahsdbvlasbdvdlvabsdviabsdibasdibiasdbiasbdibihbihbhb165a1sd6c5a41d3v51as9d8v51asd5v49asd51vas9d84v51asdv984a123sv98456a1s2dv98as465d1va98sd4561v2asd9v841', 1554, 'wub');

-- --------------------------------------------------------

--
-- Table structure for table `team_inbox`
--

CREATE TABLE `team_inbox` (
  `team_name` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `xp` int(150) NOT NULL DEFAULT '0',
  `clan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `first_name`, `last_name`, `email`, `password`, `description`, `xp`, `clan`) VALUES
(1, 'wub', 'Wubbly', 'wub', 'boobs@gmail.com', '111111', 'stuff\r\n', 555, 'Ninjas'),
(2, 'Sam', '', '', 'jujuba@gmail.com', '111111', '', 555, ''),
(3, 'blood', 'Nameless', 'Joe', 'bloodlisterergmailcom', '151515', 'plebs', 0, 'Ninjas'),
(4, 'limagicli', '', '', 'asdfasdasdagmailco', '123456', '', 0, 'softuni_team_'),
(9, 'Auto_Created_user_6', '', '', 'email_6', 'pass_6', '', 0, ''),
(10, 'Auto_Created_user_7', '', '', 'email_7', 'pass_7', '', 0, ''),
(11, 'Auto_Created_user_8', '', '', 'email_8', 'pass_8', '', 332, ''),
(12, 'Auto_Created_user_9', '', '', 'email_9', 'pass_9', '', 0, ''),
(13, 'Auto_Created_user_0', '', '', 'email_0', 'pass_0', '', 0, ''),
(14, 'Auto_Created_user_1', '', '', 'email_1', 'pass_1', '', 44, ''),
(15, 'Auto_Created_user_2', '', '', 'email_2', 'pass_2', '', 0, ''),
(16, 'Auto_Created_user_3', '', '', 'email_3', 'pass_3', '', 0, ''),
(17, 'Auto_Created_user_4', '', '', 'email_4', 'pass_4', '', 111, ''),
(18, 'Auto_Created_user_5', '', '', 'email_5', 'pass_5', '', 0, ''),
(19, 'Auto_Created_user_6', '', '', 'email_6', 'pass_6', '', 0, ''),
(20, 'Auto_Created_user_7', '', '', 'email_7', 'pass_7', '', 0, ''),
(21, 'Auto_Created_user_8', '', '', 'email_8', 'pass_8', '', 361, ''),
(22, 'Auto_Created_user_9', '', '', 'email_9', 'pass_9', '', 0, ''),
(50, 'Auto_Created_user_0', '', '', 'email_0', 'pass_0', '', 0, ''),
(51, 'Auto_Created_user_1', '', '', 'email_1', 'pass_1', '', 0, ''),
(52, 'Auto_Created_user_2', '', '', 'email_2', 'pass_2', '', 0, ''),
(53, 'Auto_Created_user_3', '', '', 'email_3', 'pass_3', '', 999, ''),
(54, 'Auto_Created_user_4', '', '', 'email_4', 'pass_4', '', 0, ''),
(55, 'Ninja', 'Asen', 'Mihaylov', 'aaaaaaaa', '111111', '', 0, '');

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
,`description` varchar(500)
,`xp` int(150)
,`clan` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `clan_ranking`
--
DROP TABLE IF EXISTS `clan_ranking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clan_ranking`  AS  select `teams`.`id` AS `id`,`teams`.`name` AS `name`,`teams`.`description` AS `description`,`teams`.`xp` AS `xp`,`teams`.`leader` AS `leader` from `teams` order by `teams`.`xp` desc ;

-- --------------------------------------------------------

--
-- Structure for view `user_ranking`
--
DROP TABLE IF EXISTS `user_ranking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_ranking`  AS  select `users`.`id` AS `id`,`users`.`nickname` AS `nickname`,`users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`email` AS `email`,`users`.`password` AS `password`,`users`.`description` AS `description`,`users`.`xp` AS `xp`,`users`.`clan` AS `clan` from `users` order by `users`.`xp` desc ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `language_progress`
--
ALTER TABLE `language_progress`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
