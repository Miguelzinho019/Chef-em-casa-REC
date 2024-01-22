-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jan-2024 às 20:26
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ban`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `user_id`, `title`, `image_banner`, `created_at`) VALUES
(1, 12, 'ola mundo', 'src/img/banner/659ed66d0a54b_unknown_2024.01.08-08.51.png', '2024-01-10 17:39:57'),
(2, 12, 'sdadsadsad', 'src/img/banner/659ed6c265d92_unknown_2024.01.08-08.51.png', '2024-01-10 17:41:22'),
(3, 12, 'asASas', 'src/img/banner/659ed6de7c629_unknown_2024.01.08-08.51.png', '2024-01-10 17:41:50'),
(4, 12, 'fhfghghfd', 'src/img/banner/659ed7032ff07_unknown_2024.01.08-08.51.png', '2024-01-10 17:42:27'),
(5, 12, 'jghjghjghjhg', 'src/img/banner/659ed8b825dc5_unknown_2024.01.08-08.51.png', '2024-01-10 17:49:44'),
(6, 12, 'p´~p[p´[', 'src/img/banner/659ed8f441682_unknown_2024.01.08-08.51.png', '2024-01-10 17:50:44'),
(7, 12, 'jghjghjghjhg', 'src/img/banner/659ed964d660e_unknown_2024.01.08-08.51.png', '2024-01-10 17:52:36'),
(8, 12, 'asdasdadad', 'src/img/banner/659eda21bc9ab_unknown_2024.01.08-08.51.png', '2024-01-10 17:55:45'),
(9, 12, 'sasasS', 'src/img/banner/659eda790c8cd_unknown_2024.01.08-08.51.png', '2024-01-10 17:57:13'),
(10, 12, 'DSADADA', 'src/img/banner/659edcd5b382a_unknown_2024.01.08-08.51.png', '2024-01-10 18:07:17'),
(11, 12, 'SDSADSADSAD', 'src/img/banner/659edd5b27d29_unknown_2024.01.08-08.51.png', '2024-01-10 18:09:31');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
