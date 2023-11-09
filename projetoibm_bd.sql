-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Nov-2023 às 21:43
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`cod_carrinho`, `cod_produto`, `cod_perfil`, `cep_carrinho`, `qnt_pro`, `tamanho_pro`) VALUES
(1, 5, 2, '03881-130', 1, 'M');

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
('::1', 2);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_produto`
--

CREATE TABLE `imagem_produto` (
  `cod_produto` int(11) NOT NULL,
  `imagem_produto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
(5, './img/user-img/654d43b8cba0f');

-- --------------------------------------------------------

--
-- Estrutura da tabela `links_produto`
--

CREATE TABLE `links_produto` (
  `cod_produto` int(11) NOT NULL,
  `link_edicao` varchar(50) NOT NULL,
  `link_compra` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `links_produto`
--

INSERT INTO `links_produto` (`cod_produto`, `link_edicao`, `link_compra`) VALUES
(1, './user-pages/edicao653d15e78bda7.php', './user-pages/produto653d15e78ce37.php'),
(2, './user-pages/edicao653d1bb99fd38.php', './user-pages/produto653d1bb9a030c.php'),
(3, './user-pages/edicao653d2896df228.php', './user-pages/produto653d2896df5f9.php'),
(4, './user-pages/edicao653d2906809c6.php', './user-pages/produto653d290680cad.php'),
(5, './user-pages/edicao654d43b8cf4e8.php', './user-pages/produto654d43b8cf76c.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_realizados`
--

CREATE TABLE `pedidos_realizados` (
  `cod_carrinho` int(11) DEFAULT NULL,
  `preco_final` float DEFAULT NULL,
  `forma_pagamento` varchar(6) DEFAULT NULL,
  `data_compra` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`nome`, `sobrenome`, `email`, `senha`, `nome_loja`, `cnpj`, `imagem`, `cod_perfil`, `adm`) VALUES
('Secure', 'Buyer', 'securebuyer@marketplace.com', '$2y$10$Pzt7fH40d9vEp.dGMTqSP.V.y3z3oPPXr4Pyk1YpIyrbEnKFriFYe', NULL, NULL, NULL, 1, 1),
('Raimundo', 'Daniel Baptista', 'danielbr@gmail.com', '$2y$10$r8xq9v7i7vRqkJQ5ihdZh.GfHZgquXLXw9PXn/5j.dQkQRDHvPybK', 'Glamour', '14.067.875/0001-15', './img/user-img/653d143bce1c7', 2, 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod_produto`, `titulo_produto`, `descricao_produto`, `tipo_peca`, `preco_produto`, `sexo`, `cod_perfil`, `valida`) VALUES
(1, 'Camiseta em algodão com cristais', 'Decorada com cristais brilhantes, esta camiseta tem estilo moderno e design sóbrio. Feita em algodão, ela tem mangas longas e modelagem so', 'camisa', 115.00, 'female', 2, 0),
(2, 'Jaqueta em denim', 'Elemento icônico do desfile Primavera/Verão 2023, o decote redondo permeia a narrativa da coleção Prada onde a redução se traduz em simplicidade e cada detalhe irrelevante é removido em diferentes peças como casacos, jaquetas e blazers. Um acabamento usado dá à peça um toque retrô dos anos 50, enquanto a etiqueta com logotipo dos arquivos destaca-se na parte posterior.\r\n* Tratamento usado\r\n* Sem forro\r\n* Modelagem clássica\r\n* Gola redonda\r\n* Mangas longas\r\n* Punhos abotoados\r\n* Abotoamento na parte da frente\r\n* Pesponto contrastante\r\n* Bolsos aplicados com aba e botão\r\n* Comprimento do centro da parte posterior: 64 cm; tamanho: M\r\n* Barra ajustável com botões\r\n* Logotipo triangular em metal esmaltado\r\n* Etiqueta com logotipo na parte posterior\r\n* O(a) modelo mede 1,77m e usa tamanho 38 \r\n* Altura: 64cm', 'blusa', 250.00, 'male', 2, 0),
(3, 'Blusão em cashmere com capuz', 'Detalhes do produto\r\nUma atitude esportiva é combinada com o toque macio e aconchegante deste blusão com capuz feito em cashmere, um tecido luxuoso e refinado de alta qualidade. O fechamento com zíper e a barra elástica remetem aos uniformes esportivos. A Prada recria o tricô tradicional de forma inovadora, com referências ao mundo athleisure.\r\n\r\n* Código do produto: 003\r\n* Modelagem solta\r\n* Com capuz\r\n* Mangas retas\r\n* Fechamento com zíper\r\n* Bolsos embutidos\r\n* Punhos elásticos\r\n* Costura abaixo do ombro\r\n* Barra com elástico\r\n* Cordão elástico\r\n* Sem forro\r\n*Logotipo triangular em tecido na parte da frente\r\nO(a) modelo mede 1,77m e usa tamanho 38 \r\n* Altura: 76cm', 'blusa', 250.00, 'male', 2, 0),
(4, 'Jaqueta com abotoamento central em Re-Nylon', 'Detalhes do produto\r\nA silhueta clássica da moda masculina é reinventada de forma inovadora e sustentável nesta jaqueta feita em Re-Nylon, o tecido regenerado obtido a partir de materiais plásticos reciclados e purificados coletados do oceano. O conceito híbrido permeia a narrativa Prada e é traduzido em designs inovadores com uma mistura interessante e incomum de materiais, formas e funções.\r\n\r\n* Código do produto: 004\r\n* Modelagem reta\r\n* Forrada\r\n* Lapela clássica\r\n* Mangas longas\r\n* Fenda na parte posterior\r\n* Abotoamento\r\n* Logotipo triangular em metal esmaltado\r\n* Fenda com botão nas mangas\r\n* Bolsos com aba\r\n* Bolso interno com botão\r\n* Outro bolso interno no lado esquerdo da parte da frente\r\n* Mini nécessaire triangular com logotipo estampado na parte posterior\r\n* O(a) modelo mede 180 cm e usa tamanho 38\r\n* Altura: 75cm', 'blusa', 300.00, 'female', 2, 0),
(5, 'casima do bruno', 'rrrrr', 'camisa', 22.90, 'male', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `cod_produto` int(11) NOT NULL,
  `size` varchar(3) NOT NULL,
  `quant_tamanho` int(11) NOT NULL,
  `cod_tamanho` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
(5, 'M', 1, 20);

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
  MODIFY `cod_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cupom`
--
ALTER TABLE `cupom`
  MODIFY `cod_cupom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `cod_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `cod_tamanho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
