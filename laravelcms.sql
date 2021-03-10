-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Mar-2021 às 22:51
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laravelcms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `body` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `body`) VALUES
(1, 'Mi Bands', 'mi-bands', '<h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://127.0.0.1:8000/media/images/1615124135.png\" alt=\"\" width=\"494\" height=\"278\" /></h1>\r\n<h3><span style=\"background-color: #f1c40f;\">Tabela&nbsp;</span></h3>\r\n<table style=\"border-collapse: collapse; width: 101.03%; height: 62px;\" border=\"1\">\r\n<tbody>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 24.5817%; height: 18px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>item 1</strong></td>\r\n<td style=\"width: 24.5817%; height: 18px; text-align: center;\"><strong>item 2</strong></td>\r\n<td style=\"width: 24.5817%; height: 18px; text-align: center;\"><strong>item 3</strong></td>\r\n<td style=\"width: 24.5817%; height: 18px; text-align: center;\"><strong>item 4</strong></td>\r\n</tr>\r\n<tr style=\"height: 18px;\">\r\n<td style=\"width: 24.5817%; height: 18px; text-align: center;\"><strong><span style=\"background-color: #f1c40f;\">Conte&uacute;do 1</span></strong></td>\r\n<td style=\"width: 24.5817%; height: 18px; text-align: center;\"><strong><span style=\"background-color: #f1c40f;\">Conte&uacute;do 2</span></strong></td>\r\n<td style=\"width: 24.5817%; height: 18px; text-align: center;\"><strong><span style=\"background-color: #f1c40f;\">Conte&uacute;do 3</span></strong></td>\r\n<td style=\"width: 24.5817%; height: 18px; text-align: center;\"><strong><span style=\"background-color: #f1c40f;\">Conte&uacute;do 4</span></strong></td>\r\n</tr>\r\n</tbody>\r\n</table>'),
(6, 'Mi Band', 'mi-band', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://127.0.0.1:8000/media/images/1615375276.jpg\" alt=\"\" width=\"442\" height=\"442\" /></p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`id`, `name`, `content`) VALUES
(1, 'title', 'Xiaomi'),
(2, 'subtitle', 'Pulseiras Inteligentes'),
(3, 'email', 'contatos@hotmail'),
(4, 'bgcolor', '#061160'),
(5, 'textcolor', '#a16868');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `admin`) VALUES
(1, 'Marlon Cruz', 'marlinhobt@hotmail.com', '$2y$10$0fpLyckZ0qYqezrxU2JwnOYYsl2Q9pMbf2DRZAlOA4ci2OBnzaJyu', 'ksPaHYt3pR2Kbongb46NMdmTQ0K7xQqhYl9dqOwrOde0REsJ6oIt1JQgHBMP', 1),
(4, 'teste 1', 'teste1@hotmail.com', '$2y$10$XN4S1s19t7scRq5SgnNz2eersG2fi1rz2hdQTCvjFU3L6i0jH3qsy', NULL, 0),
(5, 'teste2', 'teste2@hotmail.com', '$2y$10$fHhPsr89P.DCR/Ftd4kE2uCgQf29WF8/Jg0Gsx87deulDDcvZz1ky', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date_access` datetime DEFAULT NULL,
  `page` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `date_access`, `page`) VALUES
(1, '1', '2021-03-08 14:30:35', '/'),
(2, '2', '2021-03-08 14:30:35', '/Teste'),
(3, '2', '2021-03-08 14:31:29', '/Teste'),
(4, '3', '2021-03-08 14:30:35', '/Teste'),
(5, '10', '2021-01-10 08:17:53', '/'),
(6, '127.0.0.1', '2021-03-10 21:33:46', '/'),
(7, '127.0.0.1', '2021-03-10 21:34:36', '/'),
(9, '127.0.0.1', '2021-03-10 21:40:30', '/mi-bands'),
(10, '127.0.0.1', '2021-03-10 21:47:34', '/mi-band'),
(11, '127.0.0.1', '2021-03-10 21:47:56', '/mi-bands');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
