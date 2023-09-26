-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Set-2023 às 19:00
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `conexao`
--

CREATE TABLE `conexao` (
  `endereco_ip` varchar(15) NOT NULL,
  `cod_perfil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `conexao`
--

INSERT INTO `conexao` (`endereco_ip`, `cod_perfil`) VALUES
('::1', 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_produto`
--

CREATE TABLE `imagem_produto` (
  `cod_produto` int(11) NOT NULL,
  `imagem_produto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `nome_loja` varchar(50) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL COMMENT 'xx.xxx.xxx/yyyy-zz',
  `imagem` varchar(500) DEFAULT NULL,
  `cod_perfil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`nome`, `sobrenome`, `email`, `senha`, `nome_loja`, `cnpj`, `imagem`, `cod_perfil`) VALUES
('Ednaldo', 'Pereira', 'ednaldo@gmail.com', 'banido123', NULL, NULL, NULL, 22),
('Junjinaldo', 'Perito', 'junjinaldo@gmail.com', '1', 'Lolja Junjinaldo', '09.876.598/7654-98', './img/user-img/download.jpg', 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `cod_produto` int(11) NOT NULL,
  `titulo_produto` varchar(100) NOT NULL,
  `descricao_produto` varchar(500) NOT NULL,
  `tipo_peca` varchar(10) NOT NULL,
  `preco_produto` float NOT NULL,
  `sexo` varchar(8) NOT NULL,
  `cod_perfil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `cod_produto` int(11) NOT NULL,
  `size` varchar(3) NOT NULL,
  `quant_tamanho` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`cod_perfil`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `cod_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
