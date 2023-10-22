-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/10/2023 às 23:57
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoibm_bd`
--
CREATE DATABASE `projetoibm_bd`;
USE `projetoibm_bd`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `conexao`
--

CREATE TABLE `conexao` (
  `endereco_ip` varchar(15) NOT NULL,
  `cod_perfil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `conexao`
--

INSERT INTO `conexao` (`endereco_ip`, `cod_perfil`) VALUES
('::1', 25);

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem_produto`
--

CREATE TABLE `imagem_produto` (
  `cod_produto` int(11) NOT NULL,
  `imagem_produto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagem_produto`
--

INSERT INTO `imagem_produto` (`cod_produto`, `imagem_produto`) VALUES
(1, './img/user-img/864223e4-cea0-4c63-9e3e-527120927df2.jpg'),
(1, './img/user-img/104776d5-1755-4e09-92d5-37df874b6b56.jpg'),
(2, './img/user-img/104776d5-1755-4e09-92d5-37df874b6b56.jpg'),
(2, './img/user-img/864223e4-cea0-4c63-9e3e-527120927df2.jpg'),
(3, './img/user-img/photo_5051328496323898037_y.jpg'),
(3, './img/user-img/104776d5-1755-4e09-92d5-37df874b6b56.jpg'),
(4, './img/user-img/download1.jpg'),
(4, './img/user-img/download.jpg'),
(5, './img/user-img/download1.jpg'),
(5, './img/user-img/download1.jpg'),
(6, './img/user-img/download.jpg'),
(6, './img/user-img/download.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome_loja` varchar(50) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL COMMENT 'xx.xxx.xxx/yyyy-zz',
  `imagem` varchar(500) DEFAULT NULL,
  `cod_perfil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`nome`, `sobrenome`, `email`, `senha`, `nome_loja`, `cnpj`, `imagem`, `cod_perfil`) VALUES
('Ednaldo', 'Pereira', 'ednaldo@pereira.com', 'banido123', 'Loja do Ednaldo', '00.000.000/0000-01', './img/user-img/download1.jpg', 25),
('Junjinaldo', 'Perito', 'junjinaldo@gmail.com', '1', 'Loja do Junjinaldo', '00.000.000/0000-02', './img/user-img/download.jpg', 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `cod_produto` int(11) NOT NULL,
  `titulo_produto` varchar(100) NOT NULL,
  `descricao_produto` varchar(500) NOT NULL,
  `tipo_peca` varchar(10) NOT NULL,
  `preco_produto` float NOT NULL,
  `sexo` varchar(8) NOT NULL,
  `link_venda` varchar(50) DEFAULT NULL,
  `link_edicao` varchar(50) DEFAULT NULL,
  `cod_perfil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`cod_produto`, `titulo_produto`, `descricao_produto`, `tipo_peca`, `preco_produto`, `sexo`, `link_venda`, `link_edicao`, `cod_perfil`) VALUES
(1, 'Roupa', 'aa', 'calçado', 333, 'female', NULL, NULL, 23),
(2, 'Edsom', 'aa', 'calça', 444, 'female', NULL, NULL, 23),
(3, 'Tevenaldo', 'aa', 'camisa', 1, 'male', NULL, NULL, 22),
(4, 'Camisa', 'aa', 'calça', 100, 'male', NULL, NULL, 25),
(5, 'Camisa', 'aa', 'calçado', 250, 'male', NULL, NULL, 25),
(6, 'aa', 'aaaa', 'calça', 100, 'male', NULL, NULL, 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `cod_produto` int(11) NOT NULL,
  `size` varchar(3) NOT NULL,
  `quant_tamanho` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tamanho`
--

INSERT INTO `tamanho` (`cod_produto`, `size`, `quant_tamanho`) VALUES
(1, 'PP', 1),
(1, 'P', 1),
(2, '12', 1),
(2, 'GG', 1),
(3, '14', 1),
(3, 'GG', 1),
(4, '12', 1),
(4, 'GG', 1),
(5, '14', 1),
(5, 'P', 1),
(6, '12', 1),
(6, 'GG', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`cod_perfil`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `cod_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
