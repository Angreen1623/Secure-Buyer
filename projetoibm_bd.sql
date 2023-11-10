-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2023 às 03:49
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `cod_produto` int(11) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  `texto_ava` text NOT NULL,
  `estrela_ava` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`cod_produto`, `cod_perfil`, `texto_ava`, `estrela_ava`) VALUES
(15, 4, 'Este produto é muito bom, gostei muito.', 5),
(13, 5, 'Pelas fotos e descrição achei que fosse melhor.', 2),
(13, 6, 'Excelente para presentes, a loja é confiavel e o produto é de qualidade!', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
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
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`cod_carrinho`, `cod_produto`, `cod_perfil`, `cep_carrinho`, `qnt_pro`, `tamanho_pro`) VALUES
(10, 13, 6, '03677-040', 1, 'M'),
(9, 13, 5, '03677-040', 1, 'M'),
(8, 15, 4, '03677-040', 1, 'G');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conexao`
--

CREATE TABLE `conexao` (
  `endereco_ip` varchar(15) NOT NULL,
  `cod_perfil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `conexao`
--

INSERT INTO `conexao` (`endereco_ip`, `cod_perfil`) VALUES
('::1', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE `cupom` (
  `cod_cupom` int(11) NOT NULL,
  `nome_cupom` varchar(20) NOT NULL,
  `valorp_cupom` float NOT NULL,
  `datac_cupom` date NOT NULL,
  `dataex_cupom` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cupom`
--

INSERT INTO `cupom` (`cod_cupom`, `nome_cupom`, `valorp_cupom`, `datac_cupom`, `dataex_cupom`) VALUES
(1, 'duascamisa', 0.05, '2023-11-09', '2023-11-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fale_conosco`
--

CREATE TABLE `fale_conosco` (
  `cod_fale` int(11) NOT NULL,
  `email_cli` varchar(70) NOT NULL,
  `titulo` text NOT NULL,
  `reclamacao` text NOT NULL,
  `respondido` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_produto`
--

CREATE TABLE `imagem_produto` (
  `cod_produto` int(11) NOT NULL,
  `imagem_produto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `imagem_produto`
--

INSERT INTO `imagem_produto` (`cod_produto`, `imagem_produto`) VALUES
(1, './img/user-img/vitrine653d15e78056f'),
(1, './img/user-img/principal653d15e78214c'),
(1, './img/user-img/653d15e783368'),
(1, './img/user-img/653d15e783f33'),
(1, './img/user-img/653d15e787ea9'),
(2, './img/user-img/vitrine653d1bb999f1f'),
(2, './img/user-img/principal653d1bb99abec'),
(2, './img/user-img/653d1bb99b7f5'),
(2, './img/user-img/653d1bb99c3ce'),
(2, './img/user-img/653d1bb99e528'),
(3, './img/user-img/vitrine653d28967a6e8'),
(3, './img/user-img/principal653d28967b819'),
(3, './img/user-img/653d289684c22'),
(3, './img/user-img/653d28968587b'),
(3, './img/user-img/653d289686515'),
(4, './img/user-img/vitrine653d2906781d4'),
(4, './img/user-img/principal653d290679368'),
(4, './img/user-img/653d29067ab6b'),
(4, './img/user-img/653d29067c4e3'),
(4, './img/user-img/653d29067f611'),
(5, './img/user-img/vitrine654d43b8bf98d'),
(5, './img/user-img/principal654d43b8c3549'),
(5, './img/user-img/654d43b8c749e'),
(5, './img/user-img/654d43b8cb37c'),
(5, './img/user-img/654d43b8cba0f'),
(6, './img/user-img/vitrine654d866582f13'),
(6, './img/user-img/principal654d8665835aa'),
(6, './img/user-img/654d866583e48'),
(6, './img/user-img/654d8665844da'),
(6, './img/user-img/654d866584c3c'),
(7, './img/user-img/vitrine654d86c580e12'),
(7, './img/user-img/principal654d86c5814eb'),
(7, './img/user-img/654d86c581e46'),
(7, './img/user-img/654d86c5827cc'),
(7, './img/user-img/654d86c5830b5'),
(8, './img/user-img/vitrine654d87244941a'),
(8, './img/user-img/principal654d872449c1e'),
(8, './img/user-img/654d87244d2a7'),
(8, './img/user-img/654d87244d9da'),
(8, './img/user-img/654d87244e119'),
(9, './img/user-img/vitrine654d87684f04d'),
(9, './img/user-img/principal654d87684f718'),
(9, './img/user-img/654d876855b08'),
(9, './img/user-img/654d8768561db'),
(9, './img/user-img/654d87685684a'),
(10, './img/user-img/vitrine654d880d2192c'),
(10, './img/user-img/principal654d880d2204c'),
(10, './img/user-img/654d880d2279b'),
(10, './img/user-img/654d880d22e1a'),
(10, './img/user-img/654d880d25fef'),
(11, './img/user-img/vitrine654d88e818cc9'),
(11, './img/user-img/principal654d88e8193ca'),
(11, './img/user-img/654d88e81f710'),
(11, './img/user-img/654d88e8236f7'),
(11, './img/user-img/654d88e8273dd'),
(12, './img/user-img/vitrine654d8c98ef310'),
(12, './img/user-img/principal654d8c98ef99a'),
(12, './img/user-img/654d8c98f0079'),
(12, './img/user-img/654d8c98f0798'),
(12, './img/user-img/654d8c98f0ec5'),
(13, './img/user-img/vitrine654d8d346702f'),
(13, './img/user-img/principal654d8d346794a'),
(13, './img/user-img/654d8d34680a6'),
(13, './img/user-img/654d8d3468980'),
(13, './img/user-img/654d8d3469060'),
(14, './img/user-img/vitrine654d8f450f065'),
(14, './img/user-img/principal654d8f450f6ee'),
(14, './img/user-img/654d8f450fe2f'),
(14, './img/user-img/654d8f4510853'),
(14, './img/user-img/654d8f45168c0'),
(15, './img/user-img/vitrine654d908e6524b'),
(15, './img/user-img/principal654d908e68a47'),
(15, './img/user-img/654d908e6ca37'),
(15, './img/user-img/654d908e6d687'),
(15, './img/user-img/654d908e6df9e'),
(16, './img/user-img/vitrine654d913ca5398'),
(16, './img/user-img/principal654d913ca5aa4'),
(16, './img/user-img/654d913ca61a8'),
(16, './img/user-img/654d913ca68d1'),
(16, './img/user-img/654d913ca716c'),
(17, './img/user-img/vitrine654d91940109c'),
(17, './img/user-img/principal654d919401a71'),
(17, './img/user-img/654d9194024fe'),
(17, './img/user-img/654d91940355c'),
(17, './img/user-img/654d919404220'),
(18, './img/user-img/vitrine654d920cbf3ea'),
(18, './img/user-img/principal654d920cc11aa'),
(18, './img/user-img/654d920cc6a3e'),
(18, './img/user-img/654d920cc7652'),
(18, './img/user-img/654d920cc7f73'),
(19, './img/user-img/vitrine654d92bca088d'),
(19, './img/user-img/principal654d92bca0fdd'),
(19, './img/user-img/654d92bca4c09'),
(19, './img/user-img/654d92bca531c'),
(19, './img/user-img/654d92bca5a53'),
(20, './img/user-img/vitrine654d932575d0b'),
(20, './img/user-img/principal654d932578a03'),
(20, './img/user-img/654d9325794a6'),
(20, './img/user-img/654d932579ce7'),
(20, './img/user-img/654d93257a3f1'),
(21, './img/user-img/vitrine654d986cc9c44'),
(21, './img/user-img/principal654d986cca3a5'),
(21, './img/user-img/654d986ccab9b'),
(21, './img/user-img/654d986ccb388'),
(21, './img/user-img/654d986ccfdb5'),
(22, './img/user-img/vitrine654d993581316'),
(22, './img/user-img/principal654d993581a52'),
(22, './img/user-img/654d9935821f4'),
(22, './img/user-img/654d993582958'),
(22, './img/user-img/654d993586db2'),
(23, './img/user-img/vitrine654d99d123a81'),
(23, './img/user-img/principal654d99d12433a'),
(23, './img/user-img/654d99d124d0f'),
(23, './img/user-img/654d99d125478'),
(23, './img/user-img/654d99d125bfa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `links_produto`
--

CREATE TABLE `links_produto` (
  `cod_produto` int(11) NOT NULL,
  `link_edicao` varchar(50) NOT NULL,
  `link_compra` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `links_produto`
--

INSERT INTO `links_produto` (`cod_produto`, `link_edicao`, `link_compra`) VALUES
(1, './user-pages/edicao653d15e78bda7.php', './user-pages/produto653d15e78ce37.php'),
(2, './user-pages/edicao653d1bb99fd38.php', './user-pages/produto653d1bb9a030c.php'),
(3, './user-pages/edicao653d2896df228.php', './user-pages/produto653d2896df5f9.php'),
(4, './user-pages/edicao653d2906809c6.php', './user-pages/produto653d290680cad.php'),
(5, './user-pages/edicao654d43b8cf4e8.php', './user-pages/produto654d43b8cf76c.php'),
(6, './user-pages/edicao654d8665b49bc.php', './user-pages/produto654d8665b4c09.php'),
(7, './user-pages/edicao654d86c583c6f.php', './user-pages/produto654d86c583e55.php'),
(8, './user-pages/edicao654d87244eb25.php', './user-pages/produto654d87244ecf5.php'),
(9, './user-pages/edicao654d876857283.php', './user-pages/produto654d87685752b.php'),
(10, './user-pages/edicao654d880d2c89f.php', './user-pages/produto654d880d2ca98.php'),
(11, './user-pages/edicao654d88e851ae0.php', './user-pages/produto654d88e851d18.php'),
(12, './user-pages/edicao654d8c98f1c49.php', './user-pages/produto654d8c98f1e91.php'),
(13, './user-pages/edicao654d8d3469b87.php', './user-pages/produto654d8d3469d5e.php'),
(14, './user-pages/edicao654d8f454e075.php', './user-pages/produto654d8f454e35e.php'),
(15, './user-pages/edicao654d908e6eb71.php', './user-pages/produto654d908e6ee37.php'),
(16, './user-pages/edicao654d913ca7ef0.php', './user-pages/produto654d913ca8225.php'),
(17, './user-pages/edicao654d919404e86.php', './user-pages/produto654d9194050cc.php'),
(18, './user-pages/edicao654d920cce6b0.php', './user-pages/produto654d920cce8ad.php'),
(19, './user-pages/edicao654d92bca6a99.php', './user-pages/produto654d92bca6db4.php'),
(20, './user-pages/edicao654d93257c1b0.php', './user-pages/produto654d93257c3ae.php'),
(21, './user-pages/edicao654d986cd22d3.php', './user-pages/produto654d986cd252a.php'),
(22, './user-pages/edicao654d993587a36.php', './user-pages/produto654d993587cd8.php'),
(23, './user-pages/edicao654d99d126932.php', './user-pages/produto654d99d126d75.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_realizados`
--

CREATE TABLE `pedidos_realizados` (
  `cod_carrinho` int(11) DEFAULT NULL,
  `preco_final` float DEFAULT NULL,
  `forma_pagamento` varchar(6) DEFAULT NULL,
  `data_compra` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedidos_realizados`
--

INSERT INTO `pedidos_realizados` (`cod_carrinho`, `preco_final`, `forma_pagamento`, `data_compra`) VALUES
(10, 100, 'visa', '2023-11-10'),
(9, 100, 'visa', '2023-11-10'),
(8, 125, 'visa', '2023-11-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
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
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`nome`, `sobrenome`, `email`, `senha`, `nome_loja`, `cnpj`, `imagem`, `cod_perfil`, `adm`) VALUES
('Secure', 'Buyer', 'securebuyer@marketplace.com', '$2y$10$Pzt7fH40d9vEp.dGMTqSP.V.y3z3oPPXr4Pyk1YpIyrbEnKFriFYe', NULL, NULL, NULL, 1, 1),
('Daniel Batista', 'Silva', 'daniel@gmail.com', '$2y$10$1zEpwoh6/QALJQ/emXRXXeKY2lR/RczS0VAVJagBMNuBDlfljBv8O', 'Loja Glamour', '45.242.914/0001-05', './img/user-img/654d8b46bd6ca', 3, 0),
('Roberio Jeff', 'Nunes', 'rob@gmail.com', '$2y$10$rFRJzT.ofEy/JAaQQhkIh.oJ6W9UO3mqbVbrT5kEw/J3Cd/5h4SBO', NULL, NULL, NULL, 4, 0),
('Ana Maria', 'aa', 'aaa@gmail.com', '$2y$10$tj1IJoKLYZxSLBxlkiLc7erF0pHrAZrU/rr4JmRg3OUwQMijRg84K', NULL, NULL, NULL, 5, 0),
('Edsom', 'aa', 'ed@gmail.com', '$2y$10$.Lbk71caZgF0P47taOno4OzzWincqjdEvSXVjEALipL11FfoSGJm.', NULL, NULL, NULL, 6, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `cod_produto` int(11) NOT NULL,
  `titulo_produto` varchar(100) NOT NULL,
  `descricao_produto` text NOT NULL,
  `tipo_peca` varchar(10) NOT NULL,
  `preco_produto` float(7,2) NOT NULL,
  `sexo` varchar(8) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  `valida` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod_produto`, `titulo_produto`, `descricao_produto`, `tipo_peca`, `preco_produto`, `sexo`, `cod_perfil`, `valida`) VALUES
(13, 'Sweater em lã com gola redonda', 'Estilo vibrante, detalhes icônicos e um design sofisticado definem o conceito deste novo sweater em lã com gola redonda. A estampa com listras horizontais é combinada com o acabamento contrastante da gola redonda e das mangas, enquanto o logotipo em jacquard adiciona um toque extra de cor e um detalhe característico.', 'blusa', 100.00, 'female', 3, 0),
(14, 'Minissaia em algodão', 'O estilo alegre da Miu Miu reinterpreta listras e inspirações esportivas com um toque glamoroso nesta nova minissaia em algodão. As linhas mini acompanham o design contemporâneo, enquanto o cós em cor contrastante completa a estética com um toque refinado.', 'calça', 100.00, 'female', 3, 0),
(15, 'Sweater em cashmere e lã com gola redonda', 'Linhas elegantes e versáteis são combinadas com acabamentos finos neste sweater com gola redonda e charme minimalista. Com modelagem boxy contemporânea, a peça é decorada com o logotipo em malha purl.', 'camisa', 125.00, 'male', 3, 0),
(16, 'Sweater em lã superfina com gola redonda ', 'Este sweater com gola redonda interpreta o tricô tradicional de forma inovadora, com referências ao mundo do athleisure.  A lã superfina, destaca-se por sua extrema leveza e sofisticação e pelo excepcional comprimento de suas fibras, que permitem manter sua forma original ao longo do tempo.', 'blusa', 75.00, 'male', 3, 0),
(17, ' Camisa acolchoada em denim ', 'Esta camisa em denim é reinterpretada com linhas elegantes e estilo contemporâneo, enfatizadas pelo tratamento em denim lavado que confere à peça um look vintage. A silhueta com gola de camisa, caracterizada pelo acolchoado leve, é finalizada com pespontos contrastantes. O logotipo triangular no bolso na parte da frente completa o look com um toque icônico.', 'camisa', 150.00, 'male', 3, 0),
(18, 'Bermuda em Re-Nylon', 'Decorada com um logotipo triangular em tecido, esta bermuda masculina faz parte do projeto Re-Nylon: uma linha sustentável de produtos em ECONYL® regenerado, um nylon obtido a partir do processo de reciclagem e purificação de resíduos plásticos coletados de oceanos, redes de pesca e fibras têxteis.', 'calça', 100.00, 'male', 3, 0),
(19, 'Jaqueta jeans unissex oversized', 'Jaqueta unissex confeccionada em jeans com modelagem mais solta e comprida', 'camisa', 125.99, 'unissex', 3, 0),
(20, 'Vestido longo ', 'Sofisticado e com uma silhueta elegante, este vestido em lamê exibe uma estampa em malha canelada que mistura elementos \r\ncasuais e formais', 'camisa', 250.99, 'female', 3, 0),
(21, 'Calça de moletom unissex básica reta ', 'Calça de moletom básica com modelagem reta, bolsos grandes e elástico na cintura com cadarço para ajuste. perfeita pro look confortável, com forro peludinho.\r\n', 'calça', 80.00, 'unissex', 3, 0),
(22, 'Camisa Street Logo ', 'Camiseta manga curta com estampa, gola careca.', 'camisa', 70.00, 'unissex', 3, 0),
(23, 'Camisa Regular Baw Athletic', 'Camiseta manga curta confeccionada em tecido de algodão com gola em ribana. Possui estampa na parte frontal.', 'camisa', 75.00, 'unissex', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `cod_produto` int(11) NOT NULL,
  `size` varchar(3) NOT NULL,
  `quant_tamanho` int(11) NOT NULL,
  `cod_tamanho` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`cod_produto`, `size`, `quant_tamanho`, `cod_tamanho`) VALUES
(1, '12', 20, 1),
(1, '16', 20, 2),
(1, 'P', 20, 3),
(1, 'M', 20, 4),
(2, '12', 9, 5),
(2, 'PP', 10, 6),
(2, 'G', 20, 7),
(2, 'GG', 3, 8),
(3, 'P', 20, 9),
(3, 'M', 4, 10),
(3, 'G', 29, 11),
(3, 'GG', 90, 12),
(4, '12', 4, 13),
(4, '14', 9, 14),
(4, 'P', 8, 15),
(4, 'G', 4, 16),
(4, 'GG', 3, 17),
(5, '12', 1, 18),
(5, 'P', 1, 19),
(5, 'M', 1, 20),
(6, '12', 1, 21),
(7, '16', 1, 22),
(8, '14', 1, 23),
(9, '12', 1, 24),
(10, '12', 1, 25),
(11, '16', 1, 26),
(11, 'G', 1, 27),
(12, '16', 1, 28),
(12, 'PP', 1, 29),
(12, 'M', 1, 30),
(12, 'G', 1, 31),
(12, 'GG', 1, 32),
(13, '12', 1, 33),
(13, 'P', 1, 34),
(13, 'M', 1, 35),
(13, 'G', 1, 36),
(13, 'GG', 1, 37),
(14, '16', 1, 38),
(14, 'PP', 1, 39),
(14, 'G', 1, 40),
(14, 'GG', 1, 41),
(15, '16', 1, 42),
(15, 'PP', 1, 43),
(15, 'G', 1, 44),
(15, 'GG', 1, 45),
(16, '14', 1, 46),
(16, 'P', 1, 47),
(16, 'M', 1, 48),
(16, 'G', 1, 49),
(16, 'GG', 1, 50),
(17, '12', 1, 51),
(17, '14', 1, 52),
(17, 'PP', 1, 53),
(17, 'M', 1, 54),
(17, 'GG', 1, 55),
(18, 'M', 1, 56),
(18, 'G', 1, 57),
(18, 'GG', 1, 58),
(19, '12', 1, 59),
(19, '14', 1, 60),
(19, '16', 1, 61),
(19, 'PP', 1, 62),
(19, 'P', 1, 63),
(19, 'M', 1, 64),
(19, 'G', 1, 65),
(19, 'GG', 1, 66),
(20, '14', 1, 67),
(20, '16', 1, 68),
(20, 'PP', 1, 69),
(20, 'M', 1, 70),
(20, 'G', 1, 71),
(20, 'GG', 1, 72),
(21, '16', 1, 73),
(21, 'P', 1, 74),
(21, 'M', 1, 75),
(21, 'G', 1, 76),
(22, '14', 1, 77),
(22, '16', 1, 78),
(22, 'PP', 1, 79),
(22, 'M', 1, 80),
(22, 'G', 1, 81),
(23, '16', 1, 82),
(23, 'PP', 1, 83),
(23, 'M', 1, 84),
(23, 'G', 1, 85),
(23, 'GG', 1, 86);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`cod_carrinho`);

--
-- Índices para tabela `cupom`
--
ALTER TABLE `cupom`
  ADD PRIMARY KEY (`cod_cupom`);

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
-- Índices para tabela `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`cod_tamanho`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `cod_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cupom`
--
ALTER TABLE `cupom`
  MODIFY `cod_cupom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `cod_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `cod_tamanho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
