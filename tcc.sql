-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Set-2023 às 23:09
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--
CREATE DATABASE IF NOT EXISTS `tcc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tcc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consumo`
--

CREATE TABLE `consumo` (
  `id` int(11) NOT NULL,
  `quantidadeProduto` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `id_reserva` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `consumo`
--

INSERT INTO `consumo` (`id`, `quantidadeProduto`, `data`, `hora`, `id_reserva`, `id_produto`) VALUES
(0, 10, '2023-09-07', '19:48:44', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numeroEndereco` int(11) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `dataAdmissao` date NOT NULL,
  `salario` double NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `horarioEntrada` time NOT NULL,
  `horarioSaida` time NOT NULL,
  `dataDemissao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `dataNascimento`, `genero`, `estado`, `cidade`, `endereco`, `numeroEndereco`, `cep`, `email`, `telefone`, `senha`, `dataAdmissao`, `salario`, `cargo`, `horarioEntrada`, `horarioSaida`, `dataDemissao`) VALUES
(1, 'Emanuely dos Santos Trindade', '124312312323', '0000-00-00', 'F', '0', 'Cafezal do Sul', 'Rua Argentina ', 561, '875650000', 'manuifpr@gmail.com', '12345678903', '123456789', '2009-04-23', 3000, 'Gerente ', '09:30:00', '17:00:00', NULL),
(3, 'Josefina Maria ', '123456789', '2003-01-20', 'F', 'PR', 'Alto Piquiri', 'Rua França', 453, '34556987', 'jose@gmail.com', '234567890', 'manu', '2007-07-07', 2345, 'Zeladora', '08:10:00', '17:00:00', NULL),
(4, 'Maria do Carmo', '123.455.666-65', '2005-06-01', 'F', '22', '2211001', 'Rua Colômbia', 432, '75432-211', 'carmo@gmail.com', '(44) 98436-4532', '1234', '2001-03-02', 4.5, 'Gerente', '08:00:00', '17:00:00', NULL),
(5, 'Maria Rita', '345.678.900-00', '2003-02-22', 'F', '11', '1100130', 'Rua D. Pedro', 234, '23456-789', 'rita@gmail.com', '(34) 56778-5444', '1234', '2032-02-23', 3.333, 'Faxina', '22:00:00', '07:30:00', NULL),
(16, 'Maria de Fátima', '680.170.357-99', '2023-09-08', 'F', 'Selecione Estado', 'Selecione Cidade', 'Rua Uruguai', 123, '12345-678', 'fatima@gmail.com', '(44) 97654-3234', '1234', '2023-09-08', 2.3, 'Faxina', '07:20:00', '13:00:00', NULL),
(17, 'Teste', '245.677.654-34', '2023-09-04', 'F', 'AC', 'Acrelândia', 'tredfg', 543, '76543-676', 'manuifpr@gmail.com', '(44) 98447-6118', '1234', '2023-09-17', 5.654, 'hgfdg', '21:32:00', '04:03:00', NULL),
(18, 'Sou Eufffufu', '456.543.234-56', '0004-03-01', 'F', 'SE', 'Amparo do São Francisco', 'giphg', 43456, '56754-567', 'maria@gmail.com', '(44) 98447-6118', '1234', '2023-09-17', 5.654, 'hgfdg', '02:03:00', '02:03:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospede`
--

CREATE TABLE `hospede` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `dataNascimento` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numeroEndereco` int(11) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `contatoEmergencia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `hospede`
--

INSERT INTO `hospede` (`id`, `nome`, `cpf`, `dataNascimento`, `genero`, `estado`, `cidade`, `endereco`, `numeroEndereco`, `cep`, `email`, `telefone`, `contatoEmergencia`) VALUES
(13, 'Pamela Vitória', '345.678.923-45', '2023-08-07', 'F', 'Selecione Estado', 'Selecione Cidade', 'waesyuiioçs', 3456, '23456-789', 'pamela@gmail.com', '(23) 45678-9023', '(23) 45678-9579'),
(14, 'Josefa', '2.345.678-90', '0005-04-23', 'F', 'Selecione Estado', 'Selecione Cidade', 'Rua Princesa Isabel', 2345, '23456-78', 'manu@gmail.com', '(23) 45678-9099', '(34) 56789-0777'),
(15, 'Elis Regina', '345.678.908-76', '2005-06-01', 'M', '11', '1100015', 'Rua D. Pedro', 3445, '23456-789', 'elis@gmail.com', '(45) 67865-4322', '3456444444'),
(16, 'Elis Regina', '345.678.908-76', '2005-06-01', 'M', '11', '1100015', 'Rua D. Pedro', 3445, '23456-789', 'elis@gmail.com', '(45) 67865-4322', '3456444444'),
(17, 'Elis Regina', '345.678.908-76', '2005-02-14', 'F', '11', '1100015', 'Rua D. Pedro', 765, '23456-789', 'elis@gmail.com', '(34) 56778-5444', '3456444444'),
(18, 'Catarina ', '129.345.678-90', '2023-09-08', 'F', 'Selecione Estado', 'Selecione Cidade', 'Rua Uruguai', 234, '23456-543', 'teste@gmail.com', '(44) 97654-3234', '(44) 95676-5432'),
(19, 'Catarina ', '334.555.543-45', '2023-09-06', 'F', 'Selecione Estado', 'Selecione Cidade', 'Rua Uruguai', 2345, '34565-432', 'teste@gmail.com', '(44) 97654-3234', '(44) 95676-5432'),
(20, 'Catarina ', '334.555.543-45', '2023-09-06', 'F', 'Selecione Estado', 'Selecione Cidade', 'Rua Uruguai', 2345, '34565-432', 'teste@gmail.com', '(44) 97654-3234', '(44) 95676-5432'),
(21, 'Catarina ', '334.555.543-45', '2023-09-06', 'F', 'Selecione Estado', 'Selecione Cidade', 'Rua Uruguai', 2345, '34565-432', 'teste@gmail.com', '(44) 97654-3234', '(44) 95676-5432'),
(22, '3', '129.345.678-90', '2023-09-08', 'M', 'PB', 'Areial', 'wertgfd', 345, '23456-543', 'teste@gmail.com', '(44) 97654-3234', '(44) 95676-5432'),
(23, 'Catarina ', '334.555.543-45', '2023-09-06', 'F', 'Selecione Estado', 'Selecione Cidade', 'Rua Uruguai', 2345, '34565-432', 'teste@gmail.com', '(44) 97654-3234', '(44) 95676-5432'),
(24, 'Emanuely Dos Santos Trindade', '081.674.089-57', '2005-06-01', 'F', 'SE', 'Divina Pastora', 'Rua Argentina', 561, '87565-000', 'manuifpr@gmail.com', '(44) 98447-6118', '(44) 98425-7053');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id`, `nome`) VALUES
(1, 'rtyui'),
(2, 'Prompt Keeps');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorUnitario` double NOT NULL,
  `id_consumo` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `quantidade`, `valorUnitario`, `id_consumo`, `id_tipo`, `id_marca`) VALUES
(2, 'Refrigerante', 100, 10, NULL, NULL, NULL),
(3, 'Chocolate', 200, 10, NULL, NULL, NULL),
(4, 'nome', 100, 2, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quarto`
--

CREATE TABLE `quarto` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `capacidade` int(45) NOT NULL,
  `valorDiaria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `quarto`
--

INSERT INTO `quarto` (`id`, `numero`, `tipo`, `capacidade`, `valorDiaria`) VALUES
(1, 44, 'Simples', 3, 120),
(2, 1, 'Simples', 2, 120),
(10, 2, 'Master', 3, 300);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `dataEntrada` date NOT NULL,
  `dataSaida` date NOT NULL,
  `valorTotalReserva` double NOT NULL,
  `observacao` varchar(200) NOT NULL,
  `id_quarto` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_hospede` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `dataEntrada`, `dataSaida`, `valorTotalReserva`, `observacao`, `id_quarto`, `id_funcionario`, `id_hospede`) VALUES
(10, '2023-09-05', '2023-09-17', 1, 'Rochelle Aparecida Trindade', 10, NULL, 24),
(11, '2005-06-01', '2005-06-20', 234, 'Teste', 10, NULL, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Sabonete'),
(2, 'Chocolate'),
(3, 'Bebida');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consumo`
--
ALTER TABLE `consumo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumo_reserva` (`id_reserva`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `hospede`
--
ALTER TABLE `hospede`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_consumo` (`id_consumo`),
  ADD KEY `produto_tipo` (`id_tipo`),
  ADD KEY `produto_marca` (`id_marca`);

--
-- Índices para tabela `quarto`
--
ALTER TABLE `quarto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reserva_funcionario` (`id_funcionario`),
  ADD KEY `reserva_hospede` (`id_hospede`),
  ADD KEY `reserva_quarto` (`id_quarto`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `hospede`
--
ALTER TABLE `hospede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `quarto`
--
ALTER TABLE `quarto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consumo`
--
ALTER TABLE `consumo`
  ADD CONSTRAINT `consumo_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  ADD CONSTRAINT `consumo_reserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `produto_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `reserva_hospede` FOREIGN KEY (`id_hospede`) REFERENCES `hospede` (`id`),
  ADD CONSTRAINT `reserva_quarto` FOREIGN KEY (`id_quarto`) REFERENCES `quarto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
