-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Abr-2019 às 16:55
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elvis_store`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_list`
--

CREATE TABLE `email_list` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `email_list`
--

INSERT INTO `email_list` (`id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Julian', 'Oates', 'julian@breakneckpizza.com'),
(2, 'Denny', 'Bubbleton', 'denny@mightygumball.net'),
(3, 'Irma', 'Werlitz', 'iwer@aliensabductedme.com'),
(4, 'Elbert', 'Kreslee', 'elbert@kresleesprockets.biz'),
(5, 'Don', 'Draper', 'draper@sterling-cooper.com'),
(6, 'Kevin', 'Jones', 'jones@simuduck.com'),
(7, 'Amanda', 'Sanchez', 'sunshine@breakneckpizza.com'),
(8, 'Boo', 'Wallace', 'bo@bottomsup.com'),
(9, 'Armber', 'McCarthy', 'amber@breakneckpizza.com'),
(10, 'Cormac', 'Hurst', 'churst@boars-r-s.com'),
(11, 'Joyce', 'Harper', 'joyceharper@breakneckpizza.com'),
(12, 'Stephen', 'Mayer', 'meyers@meapinglimus.com'),
(13, 'Martin', 'Wilson', 'martybaby@objetiveville.com'),
(14, 'Walt', 'Perala', 'walt@mightybumball.net'),
(15, 'Loius', 'Shafer', 'is@obgetiveville.net'),
(16, 'Bubba', 'Shakespeare', 'bsshakespeare@mightybumball.net'),
(17, 'John', 'Doe', 'johndoe@tikibeanlounge.com'),
(18, 'Alf', 'Quayle', 'alf_hader@last.com'),
(19, 'Don', 'Draper', 'draper@sterling-cooper.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_list`
--
ALTER TABLE `email_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
