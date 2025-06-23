-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jun-2025 às 15:16
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

CREATE DATABASE IF NOT EXISTS `locadora_carros` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `locadora_carros`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locadora_carros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `email`) VALUES
(1, 'João da Silva', '111.222.333-44', '(11) 98765-4321', 'joao.silva@email.com'),
(2, 'Maria Souza', '555.666.777-88', '(21) 91234-5678', 'maria.souza@email.com'),
(6, 'BATMAN', '411.668.288-83', '(21) 99150-7097', 'alfred@waynetech.net');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

CREATE TABLE `locacao` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `veiculo_id` int(11) NOT NULL,
  `data_locacao` date NOT NULL,
  `data_prev_devolucao` date DEFAULT NULL,
  `valor_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `valor_pago` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status_pagamento` varchar(20) NOT NULL DEFAULT 'Pendente',
  `nivel_tanque` varchar(20) NOT NULL DEFAULT 'Não Informado',
  `data_devolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `locacao`
--

INSERT INTO `locacao` (`id`, `cliente_id`, `veiculo_id`, `data_locacao`, `data_prev_devolucao`, `valor_total`, `valor_pago`, `status_pagamento`, `nivel_tanque`, `data_devolucao`) VALUES
(2, 1, 1, '2025-06-19', '2025-06-21', 241.00, 241.00, 'Pago', 'Meio Tanque', '2025-06-19'),
(3, 6, 7, '2025-06-22', '2025-06-24', 200000.00, 200000.00, 'Pago', 'Meio Tanque', '2025-06-19'),
(4, 2, 2, '2025-06-19', '2025-06-19', 110.00, 110.00, 'Pago', 'Meio Tanque', '2025-06-19'),
(5, 2, 1, '2025-06-18', '2025-06-19', 120.50, 120.50, 'Pago', 'Cheio', '2025-06-19'),
(7, 1, 1, '2025-06-20', '2025-06-24', 482.00, 482.00, 'Pago', 'Meio Tanque', '2025-06-20'),
(8, 2, 3, '2025-06-19', '2025-06-23', 520.00, 0.00, 'Pendente', 'Meio Tanque', NULL),
(9, 1, 5, '2025-06-17', '2025-06-19', 2000.00, 2000.00, 'Pago', 'Meio Tanque', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `senha`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'mariamedeiros', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `id` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `ano` int(4) NOT NULL,
  `placa` varchar(8) NOT NULL,
  `valor_diaria` float NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'D',
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `modelo`, `marca`, `ano`, `placa`, `valor_diaria`, `status`, `imagem`) VALUES
(1, 'Onix', 'Chevrolet', 2023, 'BRA2E19', 120.5, 'D', '68535a31e3ecb-onix.jpeg'),
(2, 'Mobi', 'Fiat', 2022, 'RPA0A00', 110, 'D', 'mobi.jpg'),
(3, 'HB20', 'Hyundai', 2023, 'XYZ-1234', 130, 'I', 'hb20.webp'),
(4, 'Mistério', 'Mistérios S/A', 2000, 'SCOOBY-S', 999, 'D', '685447a1bd3a6-mystery.jpg'),
(5, 'Herbie', 'Volkswagen', 1963, 'HERBIE-6', 1000, 'I', '6854485e46c03-HERBY.jpg'),
(6, 'DeLorean DMC-12', 'DMC', 1981, 'BTF-DMC', 1000000000, 'D', '6854497633fc4-R.jpeg'),
(7, 'Batmóvel', 'Tanque Móvel', 2010, '********', 100000, 'I', '68544a4d25ec6-batmovel-tumbler-dianteira.avif'),
(8, 'Ferrari F8', 'La Ferrari', 2015, 'MACQUEEN', 10000, 'D', '68544b8dcad8f-Ferrari-LaFerrari-2014-1280-11.webp'),
(9, 'Mac 6', 'Speed Motors', 2000, 'SPEED-RA', 200000, 'D', '68544c2c1552a-rjiig-123-1.jpg'),
(10, 'KANEDA', 'CANON (AKIRA)', 1978, 'AKIRA-TK', 9999, 'D', '68544c9003055-moto-akira-002.jpg'),
(11, 'Lamborghini Countach', 'Lamborghini', 2020, 'LAM-COU2', 10000, 'D', '68544db6aaf9c-0qcgBm.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locacao_cliente` (`cliente_id`),
  ADD KEY `locacao_veiculo` (`veiculo_id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `locacao`
--
ALTER TABLE `locacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `locacao`
--
ALTER TABLE `locacao`
  ADD CONSTRAINT `locacao_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `locacao_veiculo` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
