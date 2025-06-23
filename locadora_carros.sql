CREATE DATABASE IF NOT EXISTS `locadora_carros` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `locadora_carros`;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `email`) VALUES
(1, 'João da Silva', '111.222.333-44', '(11) 98765-4321', 'joao.silva@email.com'),
(2, 'Maria Souza', '555.666.777-88', '(21) 91234-5678', 'maria.souza@email.com');


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

INSERT INTO `veiculo` (`id`, `modelo`, `marca`, `ano`, `placa`, `valor_diaria`, `status`, `imagem`) VALUES
(1, 'Onix', 'Chevrolet', 2023, 'BRA2E19', 120.50, 'D', 'onix.jpg'),
(2, 'Mobi', 'Fiat', 2022, 'RPA0A00', 110.00, 'D', 'mobi.jpg'),
(3, 'HB20', 'Hyundai', 2023, 'XYZ-1234', 130.00, 'I', 'hb20.jpg');

CREATE TABLE `locacao` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `veiculo_id` int(11) NOT NULL,
  `data_locacao` date NOT NULL,
  `data_devolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `locacao` (`id`, `cliente_id`, `veiculo_id`, `data_locacao`, `data_devolucao`) VALUES
(1, 1, 3, '2025-06-15', NULL);

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuario` (`id`, `usuario`, `senha`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

ALTER TABLE `cliente` ADD PRIMARY KEY (`id`);
ALTER TABLE `veiculo` ADD PRIMARY KEY (`id`);
ALTER TABLE `locacao` ADD PRIMARY KEY (`id`), ADD KEY `locacao_cliente` (`cliente_id`), ADD KEY `locacao_veiculo` (`veiculo_id`);
ALTER TABLE `usuario` ADD PRIMARY KEY (`id`);

ALTER TABLE `cliente` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `veiculo` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `locacao` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `usuario` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `locacao`
  ADD CONSTRAINT `locacao_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `locacao_veiculo` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;