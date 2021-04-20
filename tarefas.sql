-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Abr-2021 às 03:42
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tarefas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `dini` date DEFAULT NULL,
  `dfim` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `descricao`, `usuario`, `dini`, `dfim`) VALUES
(1, 'programar teste', 1, '0000-00-00', '0000-00-00'),
(2, 'teste', 2, '2021-04-07', '2021-04-24'),
(3, 'teste 3 atualizado                       ', 1, '2021-04-09', '2021-04-30'),
(4, 'teste4', 4, '2021-04-17', '2021-04-30'),
(5, 'test5 atualizado', 5, '2021-04-10', '2021-04-29'),
(6, 'teste atualizado 1', 1, '2021-04-01', '2021-04-01'),
(7, 'test9', 5, '2021-04-10', '2021-04-23'),
(8, 'test10 atualizado                       ', 1, '2021-04-10', '2021-04-10'),
(14, 'test14 atualizado', 4, '2021-04-14', '2021-04-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(128) DEFAULT NULL,
  `telefone` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `email`) VALUES
(1, 'teste', '38383838', 'tes@tes.com'),
(2, 'alan', '3838383838', 'alan@hotmail.com'),
(3, 'eric', '32154897', 'eric@tes.com'),
(4, 'erica', '32154897', 'eric@tes.com'),
(5, 'Carla', '1111111111', 'carl@hotmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
