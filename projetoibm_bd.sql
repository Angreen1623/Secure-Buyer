-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/10/2023 às 03:21
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
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `cod_produto` int(11) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  `texto_ava` text NOT NULL,
  `estrela_ava` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `cod_carrinho` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  `cep_carrinho` varchar(9) NOT NULL,
  `qnt_pro` int(11) NOT NULL,
  `tamanho_pro` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`cod_carrinho`, `cod_produto`, `cod_perfil`, `cep_carrinho`, `qnt_pro`, `tamanho_pro`) VALUES
(1, 7, 29, '77060-038', 1, '12');

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
('::1', 29);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cupom`
--

CREATE TABLE `cupom` (
  `cod_cupom` int(11) NOT NULL,
  `nome_cupom` varchar(20) NOT NULL,
  `valorp_cupom` float NOT NULL,
  `datac_cupom` date DEFAULT NULL,
  `dataex_cupom` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fale_conosco`
--

CREATE TABLE `fale_conosco` (
  `cod_fale` int(11) NOT NULL,
  `email_cli` varchar(70) NOT NULL,
  `titulo` text NOT NULL,
  `reclamacao` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(6, './img/user-img/download.jpg'),
(7, './img/user-img/vitrine653c4599274f8'),
(7, './img/user-img/principal653c4599295c7'),
(7, './img/user-img/653c45992a16a'),
(7, './img/user-img/653c45992acff'),
(7, './img/user-img/653c45992b6ed');

-- --------------------------------------------------------

--
-- Estrutura para tabela `links_produto`
--

CREATE TABLE `links_produto` (
  `cod_produto` int(11) NOT NULL,
  `link_edicao` varchar(50) NOT NULL,
  `link_compra` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `links_produto`
--

INSERT INTO `links_produto` (`cod_produto`, `link_edicao`, `link_compra`) VALUES
(7, './user-pages/edicao653c45992d77a.php', './user-pages/produto653c45992db2e.php');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos_realizados`
--

CREATE TABLE `pedidos_realizados` (
  `cod_carrinho` int(11) DEFAULT NULL,
  `preco_final` float DEFAULT NULL,
  `forma_pagamento` varchar(6) DEFAULT NULL,
  `data_compra` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `cod_perfil` int(11) NOT NULL,
  `adm` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`nome`, `sobrenome`, `email`, `senha`, `nome_loja`, `cnpj`, `imagem`, `cod_perfil`, `adm`) VALUES
('Ednaldo', 'Pereira', 'ednaldo@pereira.com', 'banido123', 'Loja do Ednaldo', '00.000.000/0000-01', './img/user-img/download1.jpg', 25, 0),
('Junjinaldo', 'Perito', 'junjinaldo@gmail.com', '1', 'Loja do Junjinaldo', '00.000.000/0000-02', './img/user-img/download.jpg', 26, 0),
('André', 'Green', 'angreen@gmail.com', '$2y$10$Es6ak8TTTFUV5NpcqJlLx.Ke03.e4UaapWt9jV.UVduEAvr5Nk5cS', NULL, NULL, NULL, 28, 1),
('dfdd', 'dsfsdfsdfsdf', 'dfsdfsdfsd@.com', '$2y$10$VJhOvzkq86KXu8.MqOzSy.48wGVG1/TPBtT/yXFqY2aymF4WQgHhy', 'Glamour', '14.067.875/0001-15', './img/user-img/653c437993f06', 29, 0);

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
  `cod_perfil` int(11) NOT NULL,
  `valida` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`cod_produto`, `titulo_produto`, `descricao_produto`, `tipo_peca`, `preco_produto`, `sexo`, `cod_perfil`, `valida`) VALUES
(1, 'Roupa', 'aa', 'calçado', 333, 'female', 23, 0),
(2, 'Edsom', 'aa', 'calça', 444, 'female', 23, 0),
(3, 'Tevenaldo', 'aa', 'camisa', 1, 'male', 22, 0),
(4, 'Camisa', 'aa', 'calça', 100, 'male', 25, 0),
(5, 'Camisa', 'aa', 'calçado', 250, 'male', 25, 0),
(6, 'aa', 'aaaa', 'calça', 100, 'male', 26, 0),
(7, 'Camiseta em algodão com cristais', 'Decorada com cristais brilhantes, esta camiseta tem estilo moderno e design sóbrio. Feita em algodão, ela tem mangas longas e modelagem solta.', 'camisa', 117, 'female', 29, 0);

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
(6, 'GG', 1),
(7, '12', 1),
(7, '16', 1),
(7, 'P', 1),
(7, 'M', 1),
(7, 'GG', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`cod_carrinho`);

--
-- Índices de tabela `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`cod_cupom`);

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
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `cod_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cupom`
--
ALTER TABLE `cupom`
  MODIFY `cod_cupom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `cod_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
