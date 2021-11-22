-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql30-farm1.kinghost.net
-- Tempo de geração: 18/10/2021 às 09:01
-- Versão do servidor: 5.5.62-log
-- Versão do PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `pref_jurubeba_teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aidf_docs`
--

CREATE TABLE IF NOT EXISTS `aidf_docs` (
  `codigo` int(10) NOT NULL,
  `codsolicitacao` int(10) DEFAULT NULL,
  `codespecie` int(11) DEFAULT NULL,
  `nroinicial` int(10) DEFAULT NULL,
  `nrofinal` int(10) DEFAULT NULL,
  `quantidade` int(10) DEFAULT NULL,
  `validadenotas` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabela de documentos a serem impressos.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `aidf_especie`
--

CREATE TABLE IF NOT EXISTS `aidf_especie` (
  `codigo` int(11) NOT NULL,
  `especie` varchar(200) DEFAULT '',
  `serie` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aidf_especie_cadastro`
--

CREATE TABLE IF NOT EXISTS `aidf_especie_cadastro` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `codespecie` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aidf_solicitacoes`
--

CREATE TABLE IF NOT EXISTS `aidf_solicitacoes` (
  `codigo` int(10) NOT NULL,
  `codemissor` int(10) DEFAULT NULL COMMENT 'tabela cadastro',
  `codgrafica` int(10) DEFAULT NULL COMMENT 'tabela cadastro',
  `observacoes` text,
  `estado` char(1) DEFAULT 'A' COMMENT 'A p/ aguardando, L p/ liberado e I p/ impresso',
  `data` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `autos_infracao`
--

CREATE TABLE IF NOT EXISTS `autos_infracao` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `origem` varchar(255) DEFAULT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `data_hora` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `codigo` int(11) NOT NULL,
  `banco` varchar(60) DEFAULT NULL,
  `boleto` varchar(60) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `bancos`
--

INSERT INTO `bancos` (`codigo`, `banco`, `boleto`) VALUES
(1, 'Banco do Brasil', 'boleto_bb.php'),
(2, 'Bancoob', 'boleto_bancoob.php'),
(3, 'Banespa', 'boleto_banespa.php'),
(4, 'Banestes', 'boleto_banestes.php'),
(5, 'Besc', 'boleto_besc.php'),
(6, 'Bradesco', 'boleto_bradesco.php'),
(7, 'Caixa Econômica Federal', 'boleto_cef.php'),
(8, 'HSBC', 'boleto_hsbc.php'),
(9, 'Itaú', 'boleto_itau.php'),
(10, 'Nossa caixa', 'boleto_nossacaixa.php'),
(11, 'Real', 'boleto_real.php'),
(12, 'Santander', 'boleto_santander_banespa.php'),
(13, 'Sicredi', 'boleto_sicredi.php'),
(14, 'Sudameris', 'boleto_sudameris.php'),
(15, 'Unibanco', 'boleto_unibanco.php'),
(16, 'Caixa Econômica Federal (SINCO)', 'boleto_cef_sinco.php'),
(17, 'Caixa Econômica Federal(SIGCB)', 'boleto_cef_sigcb.php'),
(18, 'Santander Banespa', 'boleto_banespa.php'),
(19, 'Banrisul', 'boleto_banrisul.php');

-- --------------------------------------------------------

--
-- Estrutura para tabela `boleto`
--

CREATE TABLE IF NOT EXISTS `boleto` (
  `codigo` int(11) NOT NULL,
  `tipo` char(1) DEFAULT 'R' COMMENT 'P para  pagamento e R para recebimento',
  `codbanco` int(10) DEFAULT NULL,
  `agencia` varchar(60) DEFAULT NULL,
  `contacorrente` varchar(60) DEFAULT NULL,
  `convenio` varchar(60) DEFAULT NULL,
  `contrato` varchar(60) DEFAULT NULL,
  `carteira` varchar(60) DEFAULT NULL,
  `codfebraban` int(11) DEFAULT NULL,
  `instrucoes` text
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `boleto`
--

INSERT INTO `boleto` (`codigo`, `tipo`, `codbanco`, `agencia`, `contacorrente`, `convenio`, `contrato`, `carteira`, `codfebraban`, `instrucoes`) VALUES
(1, 'R', 0, '', '', '', '', '', 2344, 'PAGAMENTO VIA DEPOSITO OU TRANSFERENCIA (OBS: APOS O PAGAMENTO APRESENTAR NA PREFEITURA). \r\n\r\nBANCO BRADESCO - AG: 3705-2 C: 1869-4 / BANCO DO BRASIL -  AG: 0814-1 C: 2893-2.\r\n');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE IF NOT EXISTS `cadastro` (
  `codigo` bigint(11) NOT NULL,
  `sequencial_empresa` int(11) DEFAULT NULL,
  `sequencial_escritorio` int(11) DEFAULT NULL,
  `codtipo` int(11) DEFAULT NULL,
  `codtipodeclaracao` int(11) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `razaosocial` varchar(200) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `inscrmunicipal` varchar(20) DEFAULT NULL,
  `inscrestadual` varchar(20) DEFAULT NULL,
  `isentoiss` char(1) DEFAULT 'N' COMMENT 'S para sim e N para não',
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ultimanota` int(10) DEFAULT '0',
  `notalimite` int(10) DEFAULT '0',
  `ultima_solicitacao_notalimite` int(11) DEFAULT NULL,
  `estado` char(2) DEFAULT 'NL' COMMENT 'NL nao liberado, A ativo, I inativo',
  `codcontador` int(10) DEFAULT '0',
  `contadoreaidf` varchar(1) DEFAULT 'N',
  `contadornfe` varchar(1) DEFAULT 'N',
  `contadorlivro` varchar(1) DEFAULT 'N',
  `contadorguia` varchar(1) DEFAULT 'N',
  `contadorrps` varchar(1) DEFAULT 'N',
  `credito` float(10,2) DEFAULT NULL,
  `nfe` char(1) DEFAULT 'N' COMMENT 'Determina se emissor emite nfe',
  `fonecomercial` varchar(15) DEFAULT NULL,
  `fonecelular` varchar(15) DEFAULT NULL,
  `pispasep` varchar(20) DEFAULT NULL,
  `datainicio` date DEFAULT NULL,
  `datafim` date DEFAULT '0000-00-00',
  `credito_vencido` char(1) DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=505 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `cadastro`
--

INSERT INTO `cadastro` (`codigo`, `sequencial_empresa`, `sequencial_escritorio`, `codtipo`, `codtipodeclaracao`, `nome`, `razaosocial`, `cnpj`, `cpf`, `senha`, `inscrmunicipal`, `inscrestadual`, `isentoiss`, `logradouro`, `numero`, `complemento`, `bairro`, `cep`, `municipio`, `uf`, `logo`, `email`, `ultimanota`, `notalimite`, `ultima_solicitacao_notalimite`, `estado`, `codcontador`, `contadoreaidf`, `contadornfe`, `contadorlivro`, `contadorguia`, `contadorrps`, `credito`, `nfe`, `fonecomercial`, `fonecelular`, `pispasep`, `datainicio`, `datafim`, `credito_vencido`) VALUES
(502, NULL, NULL, 1, 1, 'ADVISOR ASSESSORIA EMPRESARIAL EIRELI', 'ADVISOR ASSESSORIA EMPRESARIAL EIRELI', '30.190.353/0001-62', NULL, 'eba4c4695d5b0aff0b3388435cc49703', '40707701', '', 'N', 'RUA PRAÇA DO CONGRESSO', '993', '', 'CENTRO', '69010-460', 'MANAUS', 'AM', NULL, 'contato@smnadvisor.com.br', 25096, 0, NULL, 'A', 0, 'N', 'N', 'N', 'N', 'N', NULL, 'S', '(92) 30289901', '', '', '2021-03-03', '0000-00-00', 'N'),
(503, NULL, NULL, 11, 3, 'PREFEITURA MUNICIPAL DE JURUBEBA', 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', NULL, '5a5a76e2f8b0aa27f2c2dec653ab35e7', '', '', 'N', 'RUA 22 DE OUTUBRO', '1888', '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', NULL, 'jurubeba@hotmail.com', 25091, 0, NULL, 'A', 0, 'N', 'N', 'N', 'N', 'N', NULL, 'N', '(92) 3028-9901', '', '', '1990-12-31', '0000-00-00', 'N'),
(504, NULL, NULL, 1, 3, 'LUSADA CONSTRUÇÕES LTDA', 'LUSADA CONSTRUÇÕES', '20.290.881/0001-30', NULL, '1628d4685e8af719c7ab694a8ad25297', '', '', 'N', 'R SANTOS', '81', '', 'CIDADE DE DEUS', '69099-31', 'MANAUS', 'AM', NULL, 'contador@econtabilis.com.br', 5, 0, NULL, 'A', 0, 'N', 'N', 'N', 'N', 'N', NULL, 'S', '(92) 3342-0156', '(92) 9159-4210', '', '2014-05-21', '0000-00-00', 'N');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_resp`
--

CREATE TABLE IF NOT EXISTS `cadastro_resp` (
  `codigo` int(10) NOT NULL,
  `codemissor` int(10) DEFAULT NULL COMMENT 'tabela cadastro',
  `codcargo` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `cadastro_resp`
--

INSERT INTO `cadastro_resp` (`codigo`, `codemissor`, `codcargo`, `nome`, `cpf`) VALUES
(209, 502, 15, 'EMPRESARIAL EIRELI', '111.111.111-11'),
(210, 503, 0, 'PREFEITO', '111.111.111-11'),
(211, 504, 0, 'ADILSON COSTA DOS SANTOS JUNIOR', '00.000.000/0020-29'),
(212, 504, 0, 'LUCIANA FELINTO DE LIMA', 'size=14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_servicos`
--

CREATE TABLE IF NOT EXISTS `cadastro_servicos` (
  `codigo` bigint(11) NOT NULL,
  `codservico` bigint(11) DEFAULT NULL,
  `codemissor` bigint(11) DEFAULT NULL COMMENT 'tabela cadastro'
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `cadastro_servicos`
--

INSERT INTO `cadastro_servicos` (`codigo`, `codservico`, `codemissor`) VALUES
(1, 329, 1),
(2, 329, 4),
(3, 359, 4),
(4, 328, 4),
(5, 52, 4),
(6, 292, 0),
(7, 292, 0),
(8, 251, 7),
(9, 332, 3),
(10, 333, 3),
(11, 238, 9),
(12, 329, 1),
(14, 329, 11),
(16, 168, 13),
(17, 292, 17),
(18, 358, 18),
(19, 150, 18),
(20, 204, 18),
(21, 231, 18),
(22, 238, 18),
(23, 52, 21),
(24, 154, 21),
(25, 52, 21),
(26, 154, 21),
(27, 251, 23),
(28, 120, 24),
(29, 71, 25),
(30, 131, 26),
(31, 343, 29),
(32, 119, 31),
(33, 110, 32),
(34, 123, 32),
(35, 343, 0),
(36, 245, 36),
(37, 9, 36),
(38, 152, 36),
(39, 119, 14),
(40, 262, 39),
(41, 1, 30),
(42, 354, 30),
(43, 250, 24),
(45, 343, 46),
(46, 311, 58),
(47, 150, 30),
(48, 55, 28),
(49, 239, 59),
(50, 357, 64),
(51, 251, 65),
(52, 276, 32),
(53, 338, 70),
(54, 119, 74),
(55, 150, 74),
(56, 71, 76),
(57, 73, 70),
(58, 74, 83),
(59, 349, 87),
(60, 9, 21),
(61, 151, 21),
(62, 71, 98),
(63, 251, 100),
(64, 179, 101),
(68, 126, 36),
(69, 189, 36),
(70, 108, 36),
(71, 168, 108),
(72, 329, 112),
(73, 329, 114),
(74, 168, 122),
(75, 339, 121),
(76, 372, 59),
(77, 151, 141),
(78, 290, 140),
(79, 290, 139),
(80, 72, 146),
(81, 321, 146),
(82, 362, 152),
(84, 84, 154),
(85, 192, 155),
(86, 36, 157),
(87, 36, 158),
(88, 36, 159),
(89, 36, 160),
(90, 36, 161),
(91, 36, 162),
(92, 36, 165),
(93, 36, 166),
(94, 36, 167),
(95, 36, 168),
(96, 36, 169),
(97, 36, 170),
(98, 36, 171),
(99, 36, 172),
(100, 36, 173),
(101, 36, 174),
(102, 36, 175),
(103, 36, 176),
(104, 36, 177),
(105, 36, 178),
(106, 36, 179),
(107, 36, 180),
(108, 36, 181),
(109, 36, 182),
(110, 36, 183),
(111, 36, 184),
(112, 36, 185),
(113, 36, 186),
(114, 36, 187),
(115, 36, 188),
(116, 36, 189),
(117, 36, 190),
(118, 36, 191),
(119, 36, 192),
(120, 36, 193),
(121, 16, 196),
(122, 36, 164),
(123, 36, 163),
(124, 36, 201),
(125, 309, 203),
(126, 290, 203),
(127, 189, 61),
(128, 73, 201),
(129, 7, 207),
(130, 350, 211),
(132, 290, 221),
(133, 192, 223),
(134, 74, 10),
(135, 369, 226),
(136, 250, 0),
(137, 232, 229),
(139, 119, 232),
(140, 244, 36),
(141, 6, 36),
(142, 182, 36),
(144, 343, 235),
(146, 329, 238),
(147, 250, 139),
(148, 295, 245),
(149, 290, 3),
(151, 290, 247),
(152, 243, 44),
(153, 36, 258),
(154, 311, 263),
(155, 7, 280),
(156, 298, 3),
(157, 72, 266),
(158, 151, 266),
(159, 173, 266),
(160, 243, 288),
(161, 151, 290),
(163, 84, 303),
(164, 357, 306),
(165, 330, 110),
(166, 168, 311),
(167, 250, 140),
(168, 121, 326),
(169, 236, 326),
(170, 305, 326),
(171, 150, 327),
(172, 329, 330),
(173, 84, 335),
(174, 25, 363),
(175, 328, 362),
(176, 290, 368),
(177, 290, 369),
(178, 232, 387),
(179, 290, 401),
(180, 290, 408),
(181, 290, 414),
(182, 238, 401),
(183, 357, 401),
(184, 357, 3),
(185, 150, 152),
(186, 204, 401),
(187, 299, 3),
(189, 73, 428),
(190, 232, 401),
(191, 343, 397),
(192, 216, 3),
(194, 232, 3),
(195, 232, 3),
(197, 273, 447),
(199, 176, 446),
(200, 320, 401),
(201, 369, 456),
(202, 13, 458),
(203, 55, 458),
(204, 243, 458),
(205, 364, 458),
(206, 290, 458),
(207, 57, 141),
(208, 110, 146),
(209, 266, 101),
(210, 72, 480),
(211, 358, 458),
(212, 250, 140),
(213, 354, 140),
(214, 273, 458),
(215, 151, 382),
(216, 274, 458),
(217, 266, 458),
(218, 243, 495),
(219, 343, 496),
(220, 343, 498),
(221, 343, 499),
(222, 357, 499),
(223, 232, 502),
(224, 329, 503),
(225, 359, 504),
(226, 204, 504),
(227, 204, 504);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `codigo` int(11) NOT NULL,
  `cargo` varchar(60) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `cargos`
--

INSERT INTO `cargos` (`codigo`, `cargo`) VALUES
(15, 'Diretor'),
(16, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartorios`
--

CREATE TABLE IF NOT EXISTS `cartorios` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `admpublica` char(1) DEFAULT NULL COMMENT 'D direta ou I indireta',
  `nivel` char(1) DEFAULT NULL COMMENT 'M municipal, E estadual, F federal'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartorios_des`
--

CREATE TABLE IF NOT EXISTS `cartorios_des` (
  `codigo` int(11) NOT NULL,
  `codcartorio` int(11) DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `data_gerado` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `codverificacao` varchar(9) DEFAULT NULL,
  `iss_emo` decimal(10,2) DEFAULT NULL COMMENT 'emo=emolumento',
  `estado` char(1) DEFAULT 'N' COMMENT 'N normal C cancelada B boleto E escriturada',
  `motivo_cancelamento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartorios_des_notas`
--

CREATE TABLE IF NOT EXISTS `cartorios_des_notas` (
  `codigo` int(11) NOT NULL,
  `coddec_des` int(11) DEFAULT NULL,
  `codservico` int(11) DEFAULT NULL,
  `valornota` decimal(10,2) DEFAULT NULL,
  `nota_nro` int(11) DEFAULT NULL,
  `emolumento` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartorios_servicos`
--

CREATE TABLE IF NOT EXISTS `cartorios_servicos` (
  `codigo` int(11) NOT NULL,
  `codtipo` int(11) DEFAULT NULL,
  `servicos` varchar(255) DEFAULT NULL,
  `aliquota` float(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'I'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cartorios_tipo`
--

CREATE TABLE IF NOT EXISTS `cartorios_tipo` (
  `codigo` int(11) NOT NULL,
  `tipocartorio` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `certidoes_negativas`
--

CREATE TABLE IF NOT EXISTS `certidoes_negativas` (
  `codigo` int(10) NOT NULL,
  `codemissor` int(10) DEFAULT NULL,
  `codverificacao` varchar(9) DEFAULT NULL,
  `dataemissao` date DEFAULT NULL,
  `datavalidade` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `certidoes_pagamento`
--

CREATE TABLE IF NOT EXISTS `certidoes_pagamento` (
  `codigo` int(10) NOT NULL,
  `codemissor` int(10) DEFAULT NULL,
  `codverificacao` varchar(9) DEFAULT NULL,
  `dataemissao` date DEFAULT NULL,
  `datavalidade` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `configuracoes`
--

CREATE TABLE IF NOT EXISTS `configuracoes` (
  `codigo` int(11) NOT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `codmunicipio` int(11) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cnpj` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `secretaria` varchar(100) DEFAULT NULL,
  `secretario` varchar(100) DEFAULT NULL COMMENT 'Nome do sr secretario',
  `chefetributos` varchar(100) DEFAULT NULL COMMENT 'Nome do sr chefe de tributos',
  `lei` varchar(100) DEFAULT NULL,
  `decreto` varchar(100) DEFAULT NULL,
  `topo` varchar(100) DEFAULT NULL,
  `topo_nfe` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `logo_nfe` varchar(100) DEFAULT NULL,
  `brasao` varchar(60) DEFAULT NULL,
  `brasao_nfe` varchar(60) DEFAULT NULL,
  `codlayout` int(10) DEFAULT NULL,
  `taxacorrecao` decimal(10,2) DEFAULT '0.00',
  `taxamulta` decimal(10,2) DEFAULT '0.00',
  `taxajuros` decimal(10,2) DEFAULT '0.00',
  `data_tributacao` int(2) DEFAULT '10' COMMENT 'dia do mes para cobranca de tributacao (0 = ultimo dia do mes)',
  `declaracoes_atrazadas` enum('s','n') DEFAULT 's' COMMENT '(s para sim, n para nao)se a prefeitura permite declaracoes pelo site atrazadas',
  `gerar_guia_site` enum('t','i') DEFAULT 'i' COMMENT 't para todos, i para individual',
  `ativar_creditos` char(1) DEFAULT 's' COMMENT 's para creditos ativatos, n para creditos desativados',
  `site` varchar(100) DEFAULT NULL,
  `aidf_validade` varchar(20) DEFAULT NULL,
  `validadenota` varchar(20) DEFAULT NULL,
  `codintegracao` int(11) DEFAULT NULL,
  `abatimento_iptu` float(10,2) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `configuracoes`
--

INSERT INTO `configuracoes` (`codigo`, `endereco`, `codmunicipio`, `cidade`, `estado`, `cnpj`, `email`, `secretaria`, `secretario`, `chefetributos`, `lei`, `decreto`, `topo`, `topo_nfe`, `logo`, `logo_nfe`, `brasao`, `brasao_nfe`, `codlayout`, `taxacorrecao`, `taxamulta`, `taxajuros`, `data_tributacao`, `declaracoes_atrazadas`, `gerar_guia_site`, `ativar_creditos`, `site`, `aidf_validade`, `validadenota`, `codintegracao`, `abatimento_iptu`) VALUES
(1, 'RUA 22 DE OUTUBRO, 1888 - CENTRO / JURUBEBA - AM', NULL, 'JURUBEBA', 'AM', '15.811.318/0001-20', 'jurubeba@hotmail.com', 'SECRETARIA DE FINANCAS', '', '', 'CODIGO TRIBUTARIO DO MUNICIPIO DE  JURUBEBA', 'S/N', NULL, NULL, NULL, NULL, NULL, 'jurubeba.jpg', 0, '0.00', '0.00', '0.00', 15, 'n', 't', 's', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ddp_contas`
--

CREATE TABLE IF NOT EXISTS `ddp_contas` (
  `codigo` int(11) NOT NULL,
  `conta` varchar(20) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `aliquota` float(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ddp_des`
--

CREATE TABLE IF NOT EXISTS `ddp_des` (
  `codigo` int(11) NOT NULL,
  `codddp` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `codverificacao` varchar(30) DEFAULT NULL,
  `estado` char(3) DEFAULT 'N',
  `motivo_cancelamento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ddp_des_contas`
--

CREATE TABLE IF NOT EXISTS `ddp_des_contas` (
  `codigo` int(11) NOT NULL,
  `codddp_des` int(11) DEFAULT NULL,
  `contaoficial` varchar(20) DEFAULT NULL,
  `contacontabil` varchar(50) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `item` int(5) DEFAULT NULL,
  `saldo_mesanterior` decimal(10,2) DEFAULT NULL,
  `debito` decimal(10,2) DEFAULT NULL,
  `credito` decimal(10,2) DEFAULT NULL,
  `saldo_mesatual` decimal(10,2) DEFAULT NULL,
  `receita` decimal(10,2) DEFAULT NULL,
  `aliquota` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ddp_des_notas`
--

CREATE TABLE IF NOT EXISTS `ddp_des_notas` (
  `codigo` int(11) NOT NULL,
  `codddp_des` int(11) DEFAULT NULL,
  `codemissor` int(11) DEFAULT NULL,
  `codservico` int(11) DEFAULT NULL,
  `valornota` decimal(10,2) DEFAULT NULL,
  `nota_nro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `decc_des`
--

CREATE TABLE IF NOT EXISTS `decc_des` (
  `codigo` int(11) NOT NULL,
  `codempreiteira` int(11) DEFAULT NULL COMMENT 'tabela cadastro',
  `codobra` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `codverificacao` varchar(9) DEFAULT NULL,
  `estado` char(1) DEFAULT 'N' COMMENT 'N para normal B para boleto C para cancelada e E para escriturada',
  `motivo_cancelamento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `decc_des_notas`
--

CREATE TABLE IF NOT EXISTS `decc_des_notas` (
  `codigo` int(11) NOT NULL,
  `coddecc_des` int(11) DEFAULT NULL,
  `codservico` int(11) DEFAULT NULL,
  `valornota` decimal(10,2) DEFAULT NULL,
  `nronota` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `declaracoes`
--

CREATE TABLE IF NOT EXISTS `declaracoes` (
  `codigo` int(11) NOT NULL,
  `declaracao` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='tipos de declaracoes';

--
-- Fazendo dump de dados para tabela `declaracoes`
--

INSERT INTO `declaracoes` (`codigo`, `declaracao`) VALUES
(1, 'DES Consolidada'),
(2, 'DES Simplificada'),
(3, 'Simples Nacional'),
(4, 'MEI');

-- --------------------------------------------------------

--
-- Estrutura para tabela `des`
--

CREATE TABLE IF NOT EXISTS `des` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(10) DEFAULT NULL,
  `codcontador` int(11) DEFAULT NULL COMMENT 'contador que fez a declaracao, se for NULL foi a propria empresa',
  `competencia` date DEFAULT NULL,
  `data_gerado` date DEFAULT NULL,
  `data` date DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `iss_retido` decimal(10,2) DEFAULT NULL COMMENT 'valor de iss retido na fonte',
  `iss` decimal(10,2) DEFAULT NULL,
  `tomador` char(1) DEFAULT 'n',
  `codverificacao` char(9) DEFAULT NULL COMMENT 'Codigo de verificacao para a des',
  `estado` char(1) DEFAULT 'N' COMMENT 'N normal C cancelada B boleto E escriturada',
  `motivo_cancelamento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `des_issretido`
--

CREATE TABLE IF NOT EXISTS `des_issretido` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL COMMENT 'tomador',
  `total` decimal(10,2) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `multa` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `data_gerado` date DEFAULT NULL,
  `codverificacao` char(9) DEFAULT NULL,
  `estado` char(1) DEFAULT 'N' COMMENT 'N normal C cancelada B boleto E escriturada',
  `motivo_cancelamento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `des_issretido_notas`
--

CREATE TABLE IF NOT EXISTS `des_issretido_notas` (
  `codigo` int(11) NOT NULL,
  `coddes_issretido` int(11) DEFAULT NULL,
  `valor_nota` decimal(20,2) DEFAULT NULL,
  `codemissor` int(11) DEFAULT NULL COMMENT 'codigo da tabela cadastro',
  `issretido` decimal(10,2) DEFAULT NULL,
  `nota_nro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `des_servicos`
--

CREATE TABLE IF NOT EXISTS `des_servicos` (
  `codigo` int(10) NOT NULL,
  `coddes` int(10) DEFAULT NULL,
  `codservico` bigint(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `basedecalculo` float(10,2) DEFAULT NULL,
  `iss_retido` decimal(10,2) DEFAULT NULL COMMENT 'valor iss retido na fonte da nota',
  `iss` decimal(10,2) DEFAULT NULL COMMENT 'valor do imposto de iss da nota',
  `deducao` decimal(10,2) DEFAULT NULL,
  `valortotal` decimal(10,2) DEFAULT NULL,
  `tomador_cnpjcpf` varchar(20) DEFAULT NULL,
  `nota_nro` int(11) DEFAULT NULL,
  `codespecie` int(11) DEFAULT NULL,
  `discriminacao` text,
  `discriminacao_nota` text COMMENT 'Discriminação de cada nota',
  `codmunicipio` int(11) DEFAULT NULL COMMENT 'Local onde foi emitida a nota',
  `cancelada` char(1) DEFAULT 'N' COMMENT 'N não e S para sim',
  `complementar` int(11) DEFAULT NULL,
  `observacao` text,
  `motivo_cancelamento` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `des_temp`
--

CREATE TABLE IF NOT EXISTS `des_temp` (
  `codigo` int(11) NOT NULL,
  `codemissores_temp` int(11) DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `data_gerado` date DEFAULT NULL,
  `base` decimal(10,2) DEFAULT NULL,
  `aliq` decimal(10,2) DEFAULT NULL,
  `codverificacao` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='tabela temporaria para cadastro de emissores nao cadastrados';

-- --------------------------------------------------------

--
-- Estrutura para tabela `des_tomadas`
--

CREATE TABLE IF NOT EXISTS `des_tomadas` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `data_gerado` date DEFAULT NULL,
  `data` date DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `issretido` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `codverificacao` char(9) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `motivo_cancelamento` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `des_tomadas_servicos`
--

CREATE TABLE IF NOT EXISTS `des_tomadas_servicos` (
  `codigo` int(11) NOT NULL,
  `coddes_tomadas` int(11) DEFAULT NULL,
  `codservico` bigint(11) DEFAULT NULL,
  `codespecie` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `basedecalculo` float(10,2) DEFAULT NULL,
  `iss_retido` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `deducao` decimal(10,2) DEFAULT NULL,
  `valortotal` decimal(10,2) DEFAULT NULL,
  `prestador_cnpj` varchar(20) DEFAULT NULL,
  `nota_nro` int(11) DEFAULT NULL,
  `discriminacao` text,
  `discriminacao_nota` text,
  `codmunicipio` int(11) DEFAULT NULL,
  `cancelada` char(1) DEFAULT 'N' COMMENT 'N não e S para sim',
  `complementar` int(11) DEFAULT NULL,
  `observacao` text,
  `motivo_cancelamento` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `des_tomadores_notas`
--

CREATE TABLE IF NOT EXISTS `des_tomadores_notas` (
  `codigo` int(10) NOT NULL,
  `cod_tomador` int(10) DEFAULT NULL,
  `nota` varchar(20) DEFAULT NULL,
  `dataemissao` date DEFAULT NULL,
  `cod_emissor` int(11) DEFAULT NULL COMMENT 'codigo do emissor',
  `valor` float(10,2) DEFAULT NULL,
  `credito` float(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='tabela para gerar creditos das declaracoes';

-- --------------------------------------------------------

--
-- Estrutura para tabela `dif_contas`
--

CREATE TABLE IF NOT EXISTS `dif_contas` (
  `codigo` int(11) NOT NULL,
  `conta` varchar(20) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `aliquota` float(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'I'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dif_des`
--

CREATE TABLE IF NOT EXISTS `dif_des` (
  `codigo` int(11) NOT NULL,
  `codinst_financeira` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `codverificacao` varchar(30) DEFAULT NULL,
  `estado` char(1) DEFAULT 'N' COMMENT 'N normal C cancelada B boleto E escriturada',
  `motivo_cancelamento` varchar(255) DEFAULT NULL,
  `codlivro_iss` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dif_des_contas`
--

CREATE TABLE IF NOT EXISTS `dif_des_contas` (
  `codigo` int(11) NOT NULL,
  `coddif_des` int(11) DEFAULT NULL,
  `contaoficial` varchar(20) DEFAULT NULL,
  `contacontabil` varchar(50) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `item` int(5) DEFAULT NULL,
  `saldo_mesanterior` decimal(10,2) DEFAULT NULL,
  `debito` decimal(10,2) DEFAULT NULL,
  `credito` decimal(10,2) DEFAULT NULL,
  `saldo_mesatual` decimal(10,2) DEFAULT NULL,
  `receita` decimal(10,2) DEFAULT NULL,
  `aliquota` decimal(4,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `declarado` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `doc_contas`
--

CREATE TABLE IF NOT EXISTS `doc_contas` (
  `codigo` int(11) NOT NULL,
  `conta` varchar(20) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `aliquota` float(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'I'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `doc_des`
--

CREATE TABLE IF NOT EXISTS `doc_des` (
  `codigo` int(11) NOT NULL,
  `codopr_credito` int(11) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `codverificacao` varchar(30) DEFAULT NULL,
  `estado` char(1) DEFAULT 'N' COMMENT 'N normal C cancelada B boleto E escriturada',
  `motivo_cancelamento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `doc_des_contas`
--

CREATE TABLE IF NOT EXISTS `doc_des_contas` (
  `codigo` int(11) NOT NULL,
  `coddoc_des` int(11) DEFAULT NULL,
  `contaoficial` varchar(20) DEFAULT NULL,
  `contacontabil` varchar(50) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `item` int(5) DEFAULT NULL,
  `saldo_mesanterior` decimal(10,2) DEFAULT NULL,
  `debito` decimal(10,2) DEFAULT NULL,
  `credito` decimal(10,2) DEFAULT NULL,
  `saldo_mesatual` decimal(10,2) DEFAULT NULL,
  `receita` decimal(10,2) DEFAULT NULL,
  `aliquota` decimal(4,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dop_des`
--

CREATE TABLE IF NOT EXISTS `dop_des` (
  `codigo` int(11) NOT NULL,
  `codorgaopublico` int(11) DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `data_gerado` date DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `codverificacao` varchar(9) DEFAULT NULL,
  `estado` char(1) DEFAULT 'N' COMMENT 'N normal C cancelada B boleto E escriturada',
  `motivo_cancelamento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dop_des_notas`
--

CREATE TABLE IF NOT EXISTS `dop_des_notas` (
  `codigo` int(11) NOT NULL,
  `coddop_des` int(11) DEFAULT NULL,
  `codemissor` int(11) DEFAULT NULL,
  `codservico` int(11) DEFAULT NULL,
  `valornota` decimal(10,2) DEFAULT NULL,
  `nota_nro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empreiteiras_servicos`
--

CREATE TABLE IF NOT EXISTS `empreiteiras_servicos` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `codservico` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empreiteiras_socios`
--

CREATE TABLE IF NOT EXISTS `empreiteiras_socios` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `faq_isencoes`
--

CREATE TABLE IF NOT EXISTS `faq_isencoes` (
  `codigo` int(10) NOT NULL,
  `tipo` varchar(200) DEFAULT NULL COMMENT 'Se isencao ou imunidade',
  `texto` text COMMENT 'Texto'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabela de faq para isencoes da prefeitura';

-- --------------------------------------------------------

--
-- Estrutura para tabela `fiscais`
--

CREATE TABLE IF NOT EXISTS `fiscais` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A' COMMENT 'A para ativado e D para desativado'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `guias_cadastro_pg`
--

CREATE TABLE IF NOT EXISTS `guias_cadastro_pg` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `codguia` int(11) DEFAULT NULL,
  `codverificacao` char(9) COLLATE latin1_general_ci DEFAULT NULL,
  `data_gerado` date DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `guias_declaracoes`
--

CREATE TABLE IF NOT EXISTS `guias_declaracoes` (
  `codigo` int(11) NOT NULL,
  `codguia` int(11) DEFAULT NULL,
  `codrelacionamento` int(11) DEFAULT NULL,
  `relacionamento` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `guia_pagamento`
--

CREATE TABLE IF NOT EXISTS `guia_pagamento` (
  `codigo` int(11) NOT NULL,
  `dataemissao` date DEFAULT NULL,
  `datavencimento` date DEFAULT NULL,
  `valor` float(11,2) DEFAULT NULL,
  `valormulta` decimal(10,2) DEFAULT NULL,
  `nossonumero` char(25) DEFAULT NULL,
  `chavecontroledoc` bigint(20) DEFAULT NULL,
  `pago` char(1) DEFAULT 'N',
  `estado` char(1) DEFAULT 'N' COMMENT 'N normal e C cancelada',
  `motivo_cancelamento` varchar(70) DEFAULT NULL,
  `codlivro` int(11) DEFAULT NULL,
  `codlivro_iss` int(11) DEFAULT NULL,
  `codnota` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Fazendo dump de dados para tabela `guia_pagamento`
--

INSERT INTO `guia_pagamento` (`codigo`, `dataemissao`, `datavencimento`, `valor`, `valormulta`, `nossonumero`, `chavecontroledoc`, `pago`, `estado`, `motivo_cancelamento`, `codlivro`, `codlivro_iss`, `codnota`) VALUES
(67, '2021-07-29', '2021-07-15', 35591.81, '355.92', '2021080300000067000000000', 9704840067, 'N', 'N', NULL, 484, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `inconsistencias`
--

CREATE TABLE IF NOT EXISTS `inconsistencias` (
  `codigo` int(11) NOT NULL,
  `codemissor` int(11) DEFAULT NULL,
  `nota_nro` int(11) DEFAULT NULL,
  `codtomador` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `datahorainconsistencia` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `inst_financeiras`
--

CREATE TABLE IF NOT EXISTS `inst_financeiras` (
  `codigo` int(10) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `codbanco` int(11) DEFAULT NULL,
  `agencia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura para tabela `integracao`
--

CREATE TABLE IF NOT EXISTS `integracao` (
  `codigo` int(11) NOT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `diretorio` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `juros`
--

CREATE TABLE IF NOT EXISTS `juros` (
  `codigo` int(11) NOT NULL,
  `dias` int(11) DEFAULT NULL,
  `juro` float(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A'
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `juros`
--

INSERT INTO `juros` (`codigo`, `dias`, `juro`, `estado`) VALUES
(3, 1, 1.00, 'A'),
(8, 31, 1.00, 'A'),
(9, 61, 1.00, 'A'),
(10, 91, 1.00, 'A'),
(11, 121, 1.00, 'A'),
(12, 151, 1.00, 'A'),
(13, 181, 1.00, 'A'),
(14, 211, 1.00, 'A'),
(15, 241, 1.00, 'A'),
(16, 271, 1.00, 'A'),
(17, 301, 1.00, 'A'),
(18, 331, 1.00, 'A'),
(19, 361, 1.00, 'A'),
(20, 391, 1.00, 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `legislacao`
--

CREATE TABLE IF NOT EXISTS `legislacao` (
  `codigo` int(10) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `texto` text,
  `data` date DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A' COMMENT 'A=ativo;I=inativo;',
  `tipo` char(1) DEFAULT 'I' COMMENT 'N=nfe,I=iss;T=todos'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `legislacao`
--

INSERT INTO `legislacao` (`codigo`, `titulo`, `texto`, `data`, `arquivo`, `estado`, `tipo`) VALUES
(1, 'LEI Nº 015-2017 DE ALÍQUOTA', 'LEI Nº 015-2017 DE ALÍQUOTA', '2017-12-28', '33822.pdf', 'A', 'N');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `codigo` int(10) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `periodo` varchar(255) DEFAULT '10',
  `vencimento` date DEFAULT NULL,
  `geracao` date DEFAULT NULL,
  `basecalculo` float(10,2) DEFAULT NULL,
  `reducaobc` float(10,2) DEFAULT NULL,
  `valoriss` float(10,2) DEFAULT NULL,
  `valorissretido` float(10,2) DEFAULT NULL,
  `valorisstotal` float(10,2) DEFAULT NULL,
  `obs` varchar(200) DEFAULT NULL COMMENT 'E notas emitidas T notas tomadas',
  `estado` char(1) DEFAULT 'N' COMMENT 'N para normal, b para bolet e c para cancelado'
) ENGINE=MyISAM AUTO_INCREMENT=485 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `livro`
--

INSERT INTO `livro` (`codigo`, `codcadastro`, `periodo`, `vencimento`, `geracao`, `basecalculo`, `reducaobc`, `valoriss`, `valorissretido`, `valorisstotal`, `obs`, `estado`) VALUES
(484, 502, '2021-06', '2021-07-15', '2021-07-29', 1779590.62, NULL, 35591.81, 0.00, 35591.81, 'JUNHO - 2021', 'B');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro_iss`
--

CREATE TABLE IF NOT EXISTS `livro_iss` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `competencia` varchar(255) DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `geracao` date DEFAULT NULL,
  `basecalculo` float(10,2) DEFAULT NULL,
  `reducaobc` float(10,2) DEFAULT NULL,
  `valoriss` float(10,2) DEFAULT NULL,
  `valorissretido` float(10,2) DEFAULT NULL,
  `valorisstotal` float(10,2) DEFAULT NULL,
  `obs` text,
  `estado` char(1) DEFAULT 'N' COMMENT 'N para normal e B para boleto e C para cancelado',
  `tipo` char(4) DEFAULT 'des'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro_iss_notas`
--

CREATE TABLE IF NOT EXISTS `livro_iss_notas` (
  `codigo` int(11) NOT NULL,
  `codlivro` int(11) DEFAULT NULL,
  `codnota` int(11) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro_notas`
--

CREATE TABLE IF NOT EXISTS `livro_notas` (
  `codigo` int(11) NOT NULL,
  `codlivro` int(11) DEFAULT NULL,
  `codnota` int(11) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL COMMENT '(E) para notas emitidas e (T) para notas tomadas',
  `nfe` char(1) DEFAULT NULL COMMENT 'S para nfe N para issdigital'
) ENGINE=MyISAM AUTO_INCREMENT=1775 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `livro_notas`
--

INSERT INTO `livro_notas` (`codigo`, `codlivro`, `codnota`, `tipo`, `nfe`) VALUES
(1774, 484, 3597, 'E', 'S');

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `codigo` int(11) NOT NULL,
  `codusuario` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `acao` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6135 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `logs`
--

INSERT INTO `logs` (`codigo`, `codusuario`, `ip`, `data`, `acao`) VALUES
(6081, 1, '45.163.8.1', '2021-03-02 17:47:56', 'Efetuou o Login'),
(6082, 1, '45.163.8.1', '2021-03-02 17:49:38', 'Atualizou uma Configuração'),
(6083, 1, '191.189.20.89', '2021-03-03 19:50:39', 'Efetuou o Login'),
(6084, 1, '191.189.20.89', '2021-03-03 19:55:06', 'Alterou empresa com CNPJ/CPF 30.190.353/0001-62 para Ativa.'),
(6085, 1, '191.189.20.89', '2021-03-03 19:55:06', 'Atualizou dados da empresa com CPF/CNPJ 30.190.353/0001-62'),
(6086, 1, '191.189.20.89', '2021-03-03 19:55:56', 'Atualizou Serviço'),
(6087, 1, '191.189.20.89', '2021-03-03 19:56:14', 'Atualizou Serviço'),
(6088, 1, '191.189.20.89', '2021-03-03 21:51:33', 'Efetuou o Login'),
(6089, 1, '191.189.20.89', '2021-03-03 21:52:55', 'Alterou empresa com CNPJ/CPF 30.190.353/0001-62 para Ativa.'),
(6090, 1, '191.189.20.89', '2021-03-03 21:52:55', 'Atualizou dados da empresa com CPF/CNPJ 30.190.353/0001-62'),
(6091, 1, '191.189.20.89', '2021-03-03 21:55:34', 'Alterou empresa com CNPJ/CPF 05.830.872/0001-09 para Ativa.'),
(6092, 1, '191.189.20.89', '2021-03-03 21:55:34', 'Atualizou dados da empresa com CPF/CNPJ 05.830.872/0001-09'),
(6093, 1, '191.189.20.89', '2021-03-03 21:56:48', 'Alterou empresa com CNPJ/CPF 05.830.872/0001-09 para Ativa.'),
(6094, 1, '191.189.20.89', '2021-03-03 21:56:49', 'Atualizou dados da empresa com CPF/CNPJ 05.830.872/0001-09'),
(6095, 1, '191.189.20.89', '2021-03-03 21:58:12', 'Alterou empresa com CNPJ/CPF 05.830.872/0001-09 para Ativa.'),
(6096, 1, '191.189.20.89', '2021-03-03 21:58:12', 'Atualizou dados da empresa com CPF/CNPJ 05.830.872/0001-09'),
(6097, 1, '191.189.20.89', '2021-03-03 22:03:38', 'Atualizou uma Configuração'),
(6098, 1, '191.189.20.89', '2021-03-03 22:18:26', 'Atualizou uma Configuração'),
(6099, 1, '191.189.20.89', '2021-03-03 22:19:17', 'Atualizou uma Configuração'),
(6100, 1, '191.189.20.89', '2021-03-03 22:24:00', 'Atualizou uma Configuração'),
(6101, 1, '191.189.20.89', '2021-03-03 22:31:17', 'Atualizou uma Configuração'),
(6102, 1, '45.163.8.1', '2021-06-08 17:45:57', 'Efetuou o Login'),
(6103, 1, '45.163.8.1', '2021-06-08 18:21:32', 'Alterou empresa com CNPJ/CPF 20.290.881/0001-30 para Ativa.'),
(6104, 1, '45.163.8.1', '2021-06-08 18:21:32', 'Atualizou dados da empresa com CPF/CNPJ 20.290.881/0001-30'),
(6105, 1, '45.163.8.1', '2021-06-08 18:21:32', 'Inseriu servico na empresa'),
(6106, 1, '45.163.8.1', '2021-06-08 18:21:33', 'Inseriu socio na empresa'),
(6107, 1, '45.163.8.1', '2021-06-08 18:22:57', 'Alterou empresa com CNPJ/CPF 20.290.881/0001-30 para Ativa.'),
(6108, 1, '45.163.8.1', '2021-06-08 18:22:57', 'Atualizou dados da empresa com CPF/CNPJ 20.290.881/0001-30'),
(6109, 1, '45.163.8.1', '2021-06-14 13:34:36', 'Efetuou o Login'),
(6110, 1, '45.163.8.1', '2021-06-21 14:59:46', 'Efetuou o Login'),
(6111, 1, '45.163.8.1', '2021-06-21 15:49:56', 'Efetuou o Login'),
(6112, 1, '45.163.8.1', '2021-07-29 11:14:16', 'Efetuou o Login'),
(6113, 1, '45.163.8.1', '2021-07-29 11:16:03', 'Alterou empresa com CNPJ/CPF 30.190.353/0001-62 para Ativa.'),
(6114, 1, '45.163.8.1', '2021-07-29 11:16:03', 'Atualizou dados da empresa com CPF/CNPJ 30.190.353/0001-62'),
(6115, 1, '2804:14d:1484:8872:38cd:9a94:8883:643', '2021-07-29 11:17:53', 'Efetuou o Login'),
(6116, 1, '45.163.8.1', '2021-07-29 11:36:15', 'Atualizou um Boleto Bancário'),
(6117, 1, '45.163.8.1', '2021-07-29 11:52:00', 'Atualizou um Boleto Bancário'),
(6118, 1, '2804:14d:1484:8872:38cd:9a94:8883:643', '2021-07-29 12:39:54', 'Efetuou o Login'),
(6119, 1, '45.163.8.1', '2021-07-29 12:46:47', 'Efetuou o Login'),
(6120, 1, '45.163.8.1', '2021-07-29 12:49:10', 'Efetuou o Login'),
(6121, 1, '45.163.8.1', '2021-07-29 13:03:45', 'Efetuou o Login'),
(6122, 1, '45.163.8.1', '2021-08-12 15:48:34', 'Efetuou o Login'),
(6123, 1, '45.163.8.1', '2021-08-12 16:26:29', 'Atualizou Serviço'),
(6124, 1, '2804:d4b:7111:b000:432c:eaf4:b10e:13f6', '2021-10-07 22:07:38', 'Efetuou o Login'),
(6125, 1, '2804:d4b:7111:b000:432c:eaf4:b10e:13f6', '2021-10-07 22:10:18', 'Alterou empresa com CNPJ/CPF 20.290.881/0001-30 para Ativa.'),
(6126, 1, '2804:d4b:7111:b000:432c:eaf4:b10e:13f6', '2021-10-07 22:10:18', 'Atualizou dados da empresa com CPF/CNPJ 20.290.881/0001-30'),
(6127, 1, '2804:d4b:7111:b000:432c:eaf4:b10e:13f6', '2021-10-07 22:11:06', 'Alterou empresa com CNPJ/CPF 20.290.881/0001-30 para Ativa.'),
(6128, 1, '2804:d4b:7111:b000:432c:eaf4:b10e:13f6', '2021-10-07 22:11:06', 'Atualizou dados da empresa com CPF/CNPJ 20.290.881/0001-30'),
(6129, 1, '2804:d4b:7111:b000:432c:eaf4:b10e:13f6', '2021-10-07 22:16:58', 'Alterou empresa com CNPJ/CPF 20.290.881/0001-30 para Ativa.'),
(6130, 1, '2804:d4b:7111:b000:432c:eaf4:b10e:13f6', '2021-10-07 22:16:58', 'Atualizou dados da empresa com CPF/CNPJ 20.290.881/0001-30'),
(6131, 1, '2804:d4b:7111:b000:432c:eaf4:b10e:13f6', '2021-10-07 22:17:01', 'Alterou empresa com CNPJ/CPF 20.290.881/0001-30 para Ativa.'),
(6132, 1, '2804:d4b:7111:b000:432c:eaf4:b10e:13f6', '2021-10-07 22:17:01', 'Atualizou dados da empresa com CPF/CNPJ 20.290.881/0001-30'),
(6133, 1, '45.163.8.1', '2021-10-14 11:08:49', 'Efetuou o Login'),
(6134, 1, '2804:d4b:7111:b000:988e:b852:a814:203d', '2021-10-17 00:36:01', 'Efetuou o Login');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mei_des`
--

CREATE TABLE IF NOT EXISTS `mei_des` (
  `codigo` int(11) NOT NULL,
  `codemissor` int(11) DEFAULT NULL,
  `competencia` char(4) DEFAULT NULL,
  `data_gerado` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `tomador` char(1) DEFAULT 'N',
  `codverificacao` char(9) DEFAULT NULL,
  `estado` char(1) DEFAULT 'N' COMMENT 'N normal C cancelada B boleto E escriturada',
  `motivo_cancelamento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mei_des_servicos`
--

CREATE TABLE IF NOT EXISTS `mei_des_servicos` (
  `codigo` int(10) NOT NULL,
  `codmei_des` int(10) DEFAULT NULL,
  `codservico` bigint(11) DEFAULT NULL,
  `basedecalculo` float(10,2) DEFAULT NULL,
  `tomador_cnpjcpf` varchar(20) DEFAULT NULL,
  `nota_nro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem_tipos`
--

CREATE TABLE IF NOT EXISTS `mensagem_tipos` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `codigo` int(11) NOT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `mensagem` text,
  `codtipo_mensagem` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL COMMENT 'E = Em análise, L = Liberado e R = Recusado'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `menus_cadastro`
--

CREATE TABLE IF NOT EXISTS `menus_cadastro` (
  `codigo` int(11) NOT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `visivel` char(1) DEFAULT 'S'
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `menus_cadastro`
--

INSERT INTO `menus_cadastro` (`codigo`, `menu`, `tipo`, `ordem`, `link`, `visivel`) VALUES
(1, 'DES Consolidada', 'des', 2, 'comtomador', 'S'),
(2, 'DES Simplificada', 'des', 3, 'semtomador', 'S'),
(3, 'Declaração', 'dif', 2, 'declaracao/principal', 'S'),
(5, 'Guia Pagamento', 'des', 7, 'guia_pagamento', 'S'),
(7, 'Declaração DOP', 'dop', 1, 'declaracao', 'S'),
(8, 'Atualizar Cadastro', 'dop', 2, 'atualizarcadastro', 'S'),
(10, 'Retificação DOP', 'dop', 6, 'retificar', 'S'),
(11, 'Guia de Pagamento', 'dop', 3, 'guia_pagamento', 'N'),
(12, 'Segunda via', 'dop', 5, 'segundavia', 'S'),
(13, 'Atualizar Cadastro', 'dec', 2, 'atualizarcadastro', 'S'),
(14, 'Atualizar Cadastro', 'decc', 1, 'atualizar/atualizarcadastro', 'S'),
(15, 'Atualizar Cadastro', 'dif', 1, 'atualizacao/atualizarcadastro', 'S'),
(16, 'Guia de pagamento', 'dif', 3, 'guia_pagamento/index', 'N'),
(17, 'Declaração DECC', 'decc', 3, 'declaracoes/declarar', 'S'),
(18, 'Obras', 'decc', 2, 'obras/obras', 'S'),
(19, 'Retificação DIF', 'dif', 6, 'cancelamento/cancelar', 'N'),
(20, 'Relatórios', 'dif', 8, 'historico/historico', 'S'),
(21, 'Segunda Via', 'des', 9, 'segundavia_prestador', 'S'),
(22, 'Declaração', 'dec', 1, 'declarar', 'S'),
(23, 'Relatórios', 'dec', 7, 'historico', 'S'),
(24, 'Declaração', 'doc', 1, 'declarar', 'S'),
(25, 'Atualizar Cadastro', 'doc', 2, 'atualizarcadastro', 'S'),
(26, 'Guia de recolhimento', 'doc', 3, 'recolhimento', 'S'),
(27, 'Retificação DOC', 'doc', 5, 'retificacao', 'S'),
(28, 'Segunda Via', 'doc', 4, 'segundavia', 'S'),
(29, 'Relatórios', 'doc', 8, 'historico', 'S'),
(30, 'Retificação', 'dec', 3, 'retificar', 'S'),
(31, 'Retificação DES', 'des', 4, 'prestadores_cancelardes', 'S'),
(32, 'Relatórios', 'des', 10, 'historicodes', 'S'),
(33, 'Declaração', 'simples', 1, 'desn', 'S'),
(34, 'Atualizar Cadastro', 'simples', 2, 'alterar_form', 'S'),
(35, 'Retificação', 'simples', 3, 'desn_retificacao', 'S'),
(36, 'Relatórios', 'simples', 2, 'desn_historico', 'S'),
(37, 'Portal SN', 'simples', 6, 'portal_simples', 'S'),
(38, 'Guia Pagamento', 'decc', 4, 'guias/geraguia', 'S'),
(39, 'Segunda Via', 'decc', 6, 'guias/segundavia', 'S'),
(40, 'Guia de Pagamento', 'dec', 4, 'gerarguia', 'S'),
(41, 'Remessa DES', 'des', 5, 'importar', 'S'),
(42, 'Guia de Pagamento', 'dif', 5, 'guia_pagamento/segundavia_prestador', 'S'),
(43, 'Segunda Via', 'dec', 6, 'segundavia', 'S'),
(45, 'Atualizar Cadastro', 'des', 1, 'atualizarcadastro', 'S'),
(46, 'Retificação Guia', 'des', 8, 'prestadores_cancelarguia', 'N'),
(47, 'Clientes (Contador)', 'des', 0, 'clientes', 'S'),
(48, 'Definir Contador', 'des', 11, 'definircontador', 'S'),
(50, 'Relatórios', 'mei', 5, 'mei_historico', 'S'),
(51, 'Retificação', 'mei', 3, 'mei_retificacao', 'S'),
(52, 'Declaração', 'mei', 1, 'declaracao', 'S'),
(53, 'Retificação Guia', 'dif', 7, 'retificacaoguia/dif_cancelarguia', 'N'),
(54, 'Retificação Guia', 'doc', 7, 'doc_cancelarguia', 'S'),
(55, 'Retificação DECC', 'decc', 7, 'retificacao/cancelar', 'S'),
(56, 'Retificação Guia', 'decc', 8, 'retificacao_guia/decc_cancelarguia', 'S'),
(58, 'Retificação Guia', 'dop', 7, 'dop_cancelarguia', 'N'),
(59, 'Definir Contador', 'mei', 10, 'definircontador', 'S'),
(60, 'Definir Contador', 'simples', 10, 'definircontador', 'S'),
(61, 'Definir Contador', 'dif', 9, 'definircontador', 'N'),
(62, 'Declaração Simples', 'des', 0, 'contsimples', 'N'),
(63, 'DES Tomadas', 'des', 3, 'des_tomadas', 'S'),
(64, 'Declaração', 'ddp', 1, 'declarar', 'S'),
(65, 'Atualizar Cadastro', 'ddp', 2, 'atualizar', 'S'),
(66, 'Guia de Pagamento', 'ddp', 3, 'guia_pagamento', 'S'),
(67, 'Retificação de Guia', 'ddp', 5, 'retificacao', 'S'),
(68, 'Relatórios', 'ddp', 6, 'relatorios', 'S'),
(69, 'Segunda Via', 'ddp', 7, 'segunda_via', 'S'),
(70, 'Livro Digital', 'ddp', 4, 'livro_digital', 'N'),
(71, 'Livro Digital', 'dec', 5, 'livro_digital', 'N'),
(72, 'Livro Digital', 'decc', 5, 'livro_digital', 'N'),
(73, 'Livro Digital', 'dif', 4, 'livro_digital', 'S'),
(74, 'Livro Digital', 'des', 6, 'livro_digital', 'S'),
(75, 'Livro Digital', 'dop', 4, 'livro_digital', 'N'),
(76, 'Livro Digital', 'doc', 6, 'livro_digital', 'N'),
(77, 'Livro Digital', 'simples', 4, 'livro_digital', 'N'),
(78, 'Livro Digital', 'mei', 4, 'livro_digital', 'N');

-- --------------------------------------------------------

--
-- Estrutura para tabela `menus_prefeitura`
--

CREATE TABLE IF NOT EXISTS `menus_prefeitura` (
  `codigo` int(11) NOT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `menus_prefeitura`
--

INSERT INTO `menus_prefeitura` (`codigo`, `menu`, `ordem`, `link`) VALUES
(2, 'Serviços', 2, 'servicos'),
(3, 'Cadastro', 1, 'cadastro'),
(6, 'NFe', 3, 'nfe'),
(15, 'Ajuda', 20, 'ajuda'),
(18, 'Fiscalização', 4, 'fiscalizacao'),
(20, 'Declarações', 3, 'declaracoes'),
(22, 'Utilitários', 9, 'utilitarios'),
(29, 'Relatórios', 8, 'relatorios'),
(30, 'Livro Digital', 6, 'livro'),
(31, 'Imposto', 4, 'imposto'),
(33, 'Guia de Pagamento', 7, 'guia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `menus_prefeitura_submenus`
--

CREATE TABLE IF NOT EXISTS `menus_prefeitura_submenus` (
  `codigo` int(11) NOT NULL,
  `codmenu` int(11) DEFAULT NULL,
  `codsubmenu` int(11) DEFAULT NULL,
  `visivel` char(1) DEFAULT NULL COMMENT 'S = sim N = nao',
  `ordem` int(11) DEFAULT NULL,
  `nivel` char(1) DEFAULT 'M' COMMENT 'A para alto ,M para medio e B para baixo',
  `iss` char(1) DEFAULT 'N' COMMENT 'S=sim N=nao',
  `nfe` char(1) DEFAULT 'N' COMMENT 'S=sim N=nao',
  `iptu` char(1) DEFAULT 'N' COMMENT 'S=sim N=nao'
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Fazendo dump de dados para tabela `menus_prefeitura_submenus`
--

INSERT INTO `menus_prefeitura_submenus` (`codigo`, `codmenu`, `codsubmenu`, `visivel`, `ordem`, `nivel`, `iss`, `nfe`, `iptu`) VALUES
(3, 2, 1, 'S', 1, 'B', 'N', 'S', 'N'),
(4, 2, 5, 'S', 2, 'B', 'N', 'S', 'N'),
(6, 3, 16, 'S', 2, 'M', 'N', 'N', 'N'),
(7, 3, 6, 'S', 3, 'M', 'N', 'N', 'N'),
(13, 7, 3, 'S', NULL, 'M', 'S', 'N', 'N'),
(14, 8, 26, 'S', NULL, 'M', 'S', 'N', 'N'),
(15, 8, 2, 'S', NULL, 'M', 'S', 'N', 'N'),
(16, 6, 11, 'S', 4, 'B', 'N', 'S', 'N'),
(17, 7, 2, 'S', NULL, 'M', 'S', 'N', 'N'),
(24, 15, 10, 'S', NULL, 'B', 'S', 'S', 'N'),
(25, 17, 1, 'S', NULL, 'M', 'S', 'N', 'N'),
(26, 17, 2, 'S', NULL, 'M', 'S', 'N', 'N'),
(27, 18, 3, 'S', 1, 'M', 'N', 'N', 'N'),
(28, 18, 4, 'S', 2, 'A', 'N', 'N', 'N'),
(39, 17, 19, 'S', NULL, 'M', 'S', 'N', 'N'),
(42, 22, 19, 'S', NULL, 'M', 'S', 'N', 'N'),
(43, 22, 20, 'S', 1, 'A', 'S', 'S', 'N'),
(44, 22, 21, 'S', 5, 'A', 'S', 'S', 'N'),
(45, 22, 22, 'S', 4, 'M', 'S', 'S', 'N'),
(46, 22, 23, 'S', 2, 'A', 'S', 'S', 'N'),
(47, 22, 24, 'S', 3, 'B', 'S', 'S', 'N'),
(51, 22, 0, 'S', 10, 'B', 'S', 'S', 'N'),
(52, 22, 0, 'S', 11, 'B', 'S', 'S', 'N'),
(53, 23, 1, 'S', NULL, 'M', 'S', 'N', 'N'),
(54, 23, 6, 'S', NULL, 'M', 'S', 'N', 'N'),
(55, 23, 2, 'S', NULL, 'M', 'S', 'N', 'N'),
(56, 23, 31, 'S', NULL, 'M', 'S', 'N', 'N'),
(57, 23, 32, 'S', NULL, 'M', 'S', 'N', 'N'),
(58, 24, 1, 'S', NULL, 'M', 'S', 'N', 'N'),
(59, 24, 6, 'S', NULL, 'M', 'S', 'N', 'N'),
(60, 24, 2, 'S', NULL, 'M', 'S', 'N', 'N'),
(61, 24, 31, 'S', NULL, 'M', 'S', 'N', 'N'),
(62, 24, 32, 'S', NULL, 'M', 'S', 'N', 'N'),
(65, 25, 1, 'S', NULL, 'M', 'S', 'N', 'N'),
(66, 25, 6, 'S', NULL, 'M', 'S', 'N', 'N'),
(67, 25, 31, 'S', NULL, 'M', 'S', 'N', 'N'),
(68, 27, 1, 'S', NULL, 'M', 'S', 'N', 'N'),
(70, 25, 32, 'S', NULL, 'M', 'S', 'N', 'N'),
(71, 25, 2, 'S', NULL, 'M', 'S', 'N', 'N'),
(72, 27, 2, 'S', NULL, 'M', 'S', 'N', 'N'),
(73, 27, 31, 'S', NULL, 'M', 'S', 'N', 'N'),
(74, 27, 32, 'S', NULL, 'M', 'S', 'N', 'N'),
(75, 27, 6, 'S', NULL, 'M', 'S', 'N', 'N'),
(76, 27, 35, 'S', NULL, 'M', 'S', 'N', 'N'),
(77, 28, 31, 'S', NULL, 'M', 'S', 'N', 'N'),
(78, 28, 2, 'S', NULL, 'M', 'S', 'N', 'N'),
(79, 28, 32, 'S', NULL, 'M', 'S', 'N', 'N'),
(80, 28, 6, 'S', NULL, 'M', 'S', 'N', 'N'),
(82, 28, 1, 'S', NULL, 'M', 'S', 'N', 'N'),
(83, 20, 8, 'S', 8, 'B', 'N', 'N', 'N'),
(84, 20, 13, 'S', 5, 'M', 'N', 'N', 'N'),
(85, 20, 14, 'S', 1, 'M', 'S', 'N', 'N'),
(86, 20, 28, 'S', 7, 'M', 'N', 'N', 'N'),
(87, 20, 27, 'S', 1, 'M', 'N', 'N', 'N'),
(88, 20, 38, 'S', 2, 'M', 'N', 'N', 'N'),
(89, 20, 15, 'S', 6, 'M', 'N', 'N', 'N'),
(90, 20, 39, 'S', 3, 'A', 'N', 'N', 'N'),
(91, 3, 12, 'S', 5, 'M', 'S', 'S', 'N'),
(92, 3, 36, 'S', 6, 'B', 'N', 'S', 'N'),
(93, 6, 17, 'S', 2, 'M', 'N', 'S', 'N'),
(95, 6, 6, 'S', 1, 'M', 'N', 'S', 'N'),
(96, 18, 31, 'S', 3, 'B', 'N', 'N', 'N'),
(97, 18, 37, 'S', 4, 'M', 'N', 'N', 'N'),
(99, 15, 42, 'S', NULL, 'B', 'S', 'S', 'N'),
(102, 22, 26, 'S', 9, 'B', 'S', 'S', 'N'),
(103, 22, 44, 'S', 6, 'A', 'S', 'S', 'N'),
(104, 20, 45, 'S', 9, 'B', 'N', 'N', 'N'),
(105, 3, 46, 'S', 4, 'M', 'N', 'S', 'N'),
(106, 2, 47, 'S', 3, 'M', 'N', 'N', 'N'),
(107, 2, 48, 'S', 4, 'M', 'N', 'N', 'N'),
(108, 2, 49, 'S', 5, 'M', 'S', 'N', 'N'),
(109, 2, 50, 'S', 6, 'A', 'N', 'N', 'N'),
(110, 3, 51, 'S', 3, 'M', 'N', 'N', 'N'),
(111, 29, 52, 'S', 1, 'M', 'N', 'S', 'N'),
(112, 29, 53, 'S', 3, 'M', 'N', 'S', 'N'),
(113, 20, 54, 'S', 3, 'M', 'N', 'N', 'N'),
(114, 22, 55, 'S', 7, 'M', 'S', 'S', 'N'),
(115, 6, 56, 'S', 5, 'M', 'N', 'S', 'N'),
(116, 29, 57, 'S', 4, 'M', 'N', 'S', 'N'),
(117, 6, 58, 'S', 6, 'M', 'N', 'S', 'N'),
(118, 30, 59, 'S', 2, 'M', 'S', 'S', 'N'),
(119, 30, 60, 'S', 1, 'M', 'N', 'S', 'N'),
(120, 30, 61, 'S', 3, 'M', 'N', 'N', 'N'),
(121, 20, 62, 'S', 10, 'M', 'N', 'N', 'N'),
(122, 29, 63, 'N', 4, 'B', 'N', 'S', 'N'),
(123, 29, 64, 'N', 7, 'B', 'N', 'S', 'N'),
(124, 6, 65, 'S', 3, 'M', 'N', 'S', 'N'),
(126, 32, 66, 'S', 1, 'M', 'N', 'S', 'N'),
(127, 6, 67, 'S', 6, 'M', 'N', 'N', 'N'),
(128, 32, 68, 'S', 2, 'M', 'N', 'N', 'N'),
(129, 29, 69, 'N', 5, 'M', 'N', 'S', 'N'),
(130, 29, 70, 'S', 6, 'M', 'N', 'S', 'N'),
(131, 22, 71, 'S', 8, 'M', 'S', 'S', 'N'),
(132, 6, 72, 'S', 7, 'M', 'N', 'S', 'N'),
(133, 33, 33, 'S', 1, 'M', 'S', 'S', 'N'),
(135, 20, 73, 'S', 2, 'M', 'S', 'N', 'N'),
(136, 29, 74, 'S', 8, 'M', 'N', 'S', 'N'),
(137, 29, 75, 'N', 9, 'M', 'N', 'S', 'N'),
(138, 29, 76, 'N', 10, 'M', 'N', 'S', 'N'),
(139, 29, 77, 'S', 10, 'M', 'N', 'S', 'N'),
(140, 29, 78, 'N', 12, 'M', 'N', 'S', 'N'),
(141, 29, 79, 'S', 13, 'M', 'N', 'S', 'N'),
(142, 29, 80, 'S', 14, 'M', 'N', 'S', 'N'),
(143, 29, 81, 'S', 15, 'M', 'N', 'S', 'N'),
(144, 29, 82, 'S', 16, 'M', 'N', 'S', 'N'),
(145, 29, 83, 'S', 17, 'M', 'N', 'S', 'N'),
(146, 29, 84, 'S', 11, 'M', 'N', 'S', 'N'),
(147, 29, 85, 'S', 19, 'M', 'N', 'S', 'N'),
(148, 29, 86, 'S', 20, 'M', 'N', 'S', 'N');

-- --------------------------------------------------------

--
-- Estrutura para tabela `menus_site`
--

CREATE TABLE IF NOT EXISTS `menus_site` (
  `codigo` int(11) NOT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `codservico` int(10) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `menus_site`
--

INSERT INTO `menus_site` (`codigo`, `menu`, `link`, `codservico`, `ordem`) VALUES
(1, 'Declaração Eletrônica de Serviços', 'des.php', 5, 1),
(2, 'NFeletrônica', 'nfe.php', 3, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `multas`
--

CREATE TABLE IF NOT EXISTS `multas` (
  `codigo` int(11) NOT NULL,
  `dias` int(5) DEFAULT NULL COMMENT 'contagem de dias do pagamento',
  `multa` decimal(5,2) DEFAULT NULL COMMENT 'valor da multa em reais',
  `estado` char(1) DEFAULT 'A'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Fazendo dump de dados para tabela `multas`
--

INSERT INTO `multas` (`codigo`, `dias`, `multa`, `estado`) VALUES
(1, 30, '10.00', 'A'),
(10, 60, '20.00', 'A'),
(7, 90, '30.00', 'A'),
(8, 9999, '40.00', 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `municipios`
--

CREATE TABLE IF NOT EXISTS `municipios` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(80) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5817 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `municipios`
--

INSERT INTO `municipios` (`codigo`, `nome`, `uf`) VALUES
(4262, 'SANTANA DO ACARAÚ', 'CE'),
(4261, 'SANTANA DE PIRAPAMA', 'MG'),
(4260, 'SANTANA DE CATÁGUASES', 'MG'),
(4259, 'SANTANA DA VARGEM', 'MG'),
(4258, 'SANTANA DA PONTE PENSA', 'SP'),
(4257, 'SANTANA DA BOA VISTA', 'RS'),
(4256, 'SANTANA', 'AP'),
(4255, 'SANTA VITÓRIA DO PALMAR', 'RS'),
(4254, 'SANTA VITÓRIA', 'MG'),
(4253, 'SANTA TEREZINHA DO TOCANTINS', 'TO'),
(4252, 'SANTA TEREZINHA DO PROGRESSO', 'SC'),
(4251, 'SANTA TEREZINHA DE ITAIPU', 'PR'),
(4250, 'SANTA TEREZINHA DE GOIÁS', 'GO'),
(4249, 'SANTA TEREZINHA', 'PB'),
(4248, 'SANTA TEREZINHA', 'BA'),
(4247, 'SANTA TEREZA DO TOCANTINS', 'TO'),
(4246, 'SANTA TEREZA DO OESTE', 'PR'),
(4245, 'SANTA TEREZA DE GOIÁS', 'GO'),
(4244, 'SANTA TEREZA', 'RS'),
(4243, 'SANTA TERESA', 'ES'),
(4242, 'SANTA SALETE', 'SP'),
(4241, 'SANTA ROSA DO TOCANTINS', 'TO'),
(4240, 'SANTA ROSA DO SUL', 'SC'),
(4239, 'SANTA ROSA DO PIAUÍ', 'PI'),
(4238, 'SANTA ROSA DO VITERBO', 'SP'),
(4237, 'SANTA ROSA DE LIMA', 'SE'),
(4236, 'SANTA ROSA DE LIMA', 'SC'),
(4235, 'SANTA ROSA DE GOIÁS', 'GO'),
(4234, 'SANTA ROSA DA SERRA', 'MG'),
(4233, 'SANTA ROSA', 'RS'),
(4232, 'SANTA ROSA', 'AC'),
(4231, 'SANTA RITA DO OESTE', 'SP'),
(4230, 'SANTA RITA DO TOCANTINS', 'TO'),
(4229, 'SANTA RITA DO SAPUCAI', 'MG'),
(4228, 'SANTA RITA DO PRADO', 'MS'),
(4227, 'SANTA RITA DO PASSA QUATRO', 'SP'),
(4226, 'SANTA RITA DO NOVO DESTINO', 'GO'),
(4225, 'SANTA RITA DO ITUETO', 'MG'),
(4224, 'SANTA RITA DO IBITIPOCA', 'MG'),
(4223, 'SANTA RITA DO ARÁGUAIA', 'GO'),
(4222, 'SANTA RITA DE MINAS', 'MG'),
(4221, 'SANTA RITA DE JACUTINGA', 'MG'),
(4220, 'SANTA RITA DE CASSIA', 'BA'),
(4219, 'SANTA RITA DE CALDAS', 'MG'),
(4218, 'SANTA RITA', 'MA'),
(4217, 'SANTA QUITERIA DO MARANHÃO', 'MA'),
(4216, 'SANTA QUITERIA', 'CE'),
(4215, 'SANTA MÔNICA', 'PR'),
(4214, 'SANTA MERCEDES', 'SP'),
(4213, 'SANTA MARIANA', 'PR'),
(4212, 'SANTA MARIA MADALENA', 'RJ'),
(4211, 'SANTA MARIA DO TOCANTINS', 'TO'),
(4210, 'SANTA MARIA DO SUAÇUÍ', 'MG'),
(4209, 'SANTA MARIA DO SALTO', 'MG'),
(4208, 'SANTA MARIA DO PARÁ', 'PA'),
(4207, 'SANTA MARIA DO OESTE', 'PR'),
(4206, 'SANTA MARIA DO HERVAL', 'RS'),
(4205, 'SANTA MARIA DO CAMBUCA', 'PE'),
(4204, 'SANTA MARIA DE JETIBÁ', 'ES'),
(4203, 'SANTA MARIA DE ITABIRA', 'MG'),
(4202, 'SANTA MARIA DAS BARREIRAS', 'PA'),
(4201, 'SANTA MARIA DA VITÓRIA', 'BA'),
(4200, 'SANTA MARIA DA SERRA', 'SP'),
(4199, 'SANTA MARIA DA BOA VISTA', 'PE'),
(4198, 'SANTA MARIA', 'RN'),
(4197, 'SANTA MARGARIDA', 'MG'),
(4196, 'SANTA LUZIA DO OESTE', 'RO'),
(4195, 'SANTA LUZIA DO PARÁ', 'PA'),
(4194, 'SANTA LUZIA DO NORTE', 'AL'),
(4193, 'SANTA LUZIA DO ITANHY', 'SE'),
(4192, 'SANTA LUZIA', 'MA'),
(4191, 'SANTA LUZIA', 'BA'),
(4190, 'SANTA LUZ', 'BA'),
(4189, 'SANTA LUCIA', 'SP'),
(4188, 'SANTA LUCIA', 'PR'),
(4187, 'SANTA LEOPOLDINA', 'ES'),
(4186, 'SANTA JULIANA', 'MG'),
(4185, 'SANTA ISABEL DO PARÁ', 'PA'),
(4184, 'SANTA IZABEL DO OESTE', 'PR'),
(4183, 'SANTA ISABEL DO IVAÍ', 'PR'),
(4182, 'SANTA ISABEL DO RIO NEGRO', 'AM'),
(4181, 'SANTA ISABEL', 'GO'),
(4180, 'SANTA INES', 'BA'),
(4179, 'SANTA HELENA DE GOIÁS', 'GO'),
(4178, 'SANTA HELENA', 'PR'),
(4177, 'SANTA HELENA', 'PB'),
(4176, 'SANTA HELENA', 'MA'),
(4175, 'SANTA GERTRUDES', 'SP'),
(4174, 'SANTA FILOMENA DO MARANHÃO', 'MA'),
(4173, 'SANTA FILOMENA', 'PE'),
(4172, 'SANTA FÉ DO SUL', 'SP'),
(4171, 'SANTA FÉ DO ARÁGUAIA', 'TO'),
(4170, 'SANTA FÉ DE MINAS', 'MG'),
(4169, 'SANTA FÉ DE GOIÁS', 'GO'),
(4168, 'SANTA FÉ', 'PR'),
(4167, 'SANTA ERNESTINA', 'SP'),
(4166, 'SANTA EFIGENIA DE MINAS', 'MG'),
(4165, 'SANTA CRUZ DO RIO PARDO', 'SP'),
(4164, 'SANTA CRUZ DAS PALMEIRAS', 'SP'),
(4163, 'SANTA CRUZ DOS MILAGRES', 'PI'),
(4162, 'SANTA CRUZ DO SUL', 'BA'),
(4161, 'SANTA CRUZ DO PIAUÍ', 'PI'),
(4160, 'SANTA CRUZ DO MONTE CASTELO', 'PR'),
(4159, 'SANTA CRUZ DO CAPIBARIBE', 'PE'),
(4158, 'SANTA CRUZ DO ARARI', 'PA'),
(4157, 'SANTA CRUZ DE GOIÁS', 'GO'),
(4156, 'SANTA CRUZ DA VITÓRIA', 'BA'),
(4155, 'SANTA CRUZ DA ESPERANÇA', 'SP'),
(4154, 'SANTA CRUZ DA CONCEIÇÃO', 'SP'),
(4153, 'SANTA CRUZ DA CABRALIA', 'BA'),
(4152, 'SANTA CRUZ DA BAIXA VERDE', 'PE'),
(4151, 'SANTA CRUZ DO ESCALVADO', 'MG'),
(4150, 'SANTA CRUZ', 'PB'),
(4149, 'SANTA CRISTO', 'RS'),
(4148, 'SANTA CLARA DO OESTE', 'SP'),
(4147, 'SANTA CLARA DO SUL', 'RS'),
(4146, 'SANTA CECILIA DO PAVAO', 'PR'),
(4145, 'SANTA CECILIA DE UMBUZEIRO', 'PB'),
(4144, 'SANTA CECILIA', 'SC'),
(4143, 'SANTA CARMEM', 'MT'),
(4142, 'SANTA BRIGIDA', 'BA'),
(4141, 'SANTA BRANCA', 'SP'),
(4140, 'SANTA BÁRBARA DO OESTE', 'SP'),
(4139, 'SANTA BÁRBARA DO TUGURIO', 'MG'),
(4138, 'SANTA BÁRBARA DO SUL', 'RS'),
(4137, 'SANTA BÁRBARA DO PARÁ', 'PA'),
(4136, 'SANTA BÁRBARA DO M. VERDE', 'MG'),
(4135, 'SANTA BÁRBARA DO LESTE', 'MG'),
(4134, 'SANTA BÁRBARA DE GOIÁS', 'GO'),
(4133, 'SANTA BÁRBARA', 'MG'),
(4132, 'SANTA BÁRBARA', 'BA'),
(4131, 'SANTA AMELIA', 'PR'),
(4130, 'SANTA ALBERTINA', 'SP'),
(4129, 'SANTA ADELIA', 'SP'),
(4128, 'SANTA CRUZ DE SALINAS', 'MG'),
(4127, 'SANHARO', 'PE'),
(4126, 'SANGAO', 'SC'),
(4125, 'SANDOVALINA', 'SP'),
(4124, 'SANDOLÂNDIA', 'TO'),
(4123, 'SANCLERLÂNDIA', 'GO'),
(4122, 'SANANDUVA', 'RS'),
(4121, 'SAMPAIO', 'TO'),
(4120, 'SAMBAIBA', 'MA'),
(4119, 'SALVATERRA', 'PA'),
(4118, 'SALVADOR DO SUL', 'RS'),
(4117, 'SALVADOR DAS MISSÕES', 'RS'),
(4116, 'SALVADOR', 'BA'),
(4115, 'SALTO GRANDE', 'SP'),
(4114, 'SALTO DO VELOSO', 'SC'),
(4113, 'SALTO DO LONTRA', 'PR'),
(4112, 'SALTO DO JACUÍ', 'RS'),
(4111, 'SALTO DO ITARARE', 'PR'),
(4110, 'SALTO DO CÉU', 'MT'),
(4109, 'SALTO DE PIRAPORA', 'SP'),
(4108, 'SALTO DA DIVISA', 'MG'),
(4107, 'SALTO', 'SP'),
(4106, 'SALTINHO', 'SC'),
(4105, 'SALOÁ', 'PE'),
(4104, 'SALMOURÃO', 'SP'),
(4103, 'SALITRE', 'CE'),
(4102, 'SALINÓPOLIS', 'PA'),
(4101, 'SALINAS DA MARGARIDA', 'BA'),
(4100, 'SALINAS', 'MG'),
(4099, 'SALGUEIRO', 'PE'),
(4098, 'SALGADO FILHO', 'PR'),
(4097, 'SALGADO DE SÃO FELIX', 'PB'),
(4096, 'SALGADO', 'SE'),
(4095, 'SALGADINHO', 'PB'),
(4094, 'SALETE', 'SC'),
(4093, 'SALESÓPOLIS', 'SP'),
(4092, 'SALES OLIVEIRA', 'SP'),
(4091, 'SALES', 'SP'),
(4090, 'SALDANHA MARINHO', 'RS'),
(4089, 'SAIRE', 'PE'),
(4088, 'SAGRES', 'SP'),
(4087, 'SAGRADA FAMILIA', 'RS'),
(4086, 'SACRAMENTO', 'MG'),
(4085, 'SABOEIRO', 'CE'),
(4084, 'SABINÓPOLIS', 'MG'),
(4083, 'SABINO', 'SP'),
(4082, 'SABAUDIA', 'PR'),
(4081, 'SABARA', 'MG'),
(4080, 'SÃO SEBASTIÃO DO TOCANTINS', 'TO'),
(4079, 'SÃO DOMINGOS DE POMBAL', 'PB'),
(4078, 'RUY BARBOSA', 'BA'),
(4077, 'RUSSAS', 'CE'),
(4076, 'RURÓPOLIS', 'PA'),
(4075, 'RUBINÉIA', 'SP'),
(4074, 'RUBIM', 'MG'),
(4073, 'RUBIATABA', 'GO'),
(4072, 'RUBIACEA', 'SP'),
(4071, 'RUBELITA', 'MG'),
(4070, 'ROTEIRO', 'AL'),
(4069, 'ROSEIRA', 'SP'),
(4068, 'ROSARIO OESTE', 'MT'),
(4067, 'ROSARIO DO SUL', 'RS'),
(4066, 'ROSÁRIO DO IVAÍ', 'PR'),
(4065, 'ROSÁRIO DO CATETE', 'SE'),
(4064, 'ROSARIO DA LIMEIRA', 'MG'),
(4063, 'ROSÁRIO', 'MA'),
(4062, 'ROSANA', 'SP'),
(4061, 'RORAINÓPOLIS', 'RR'),
(4060, 'ROQUE GONZALES', 'RS'),
(4059, 'RONDONÓPOLIS', 'MT'),
(4058, 'RONDON DO PARA', 'PA'),
(4057, 'RONDON', 'PR'),
(4056, 'RONDOLÂNDIA', 'MT'),
(4055, 'RONDINHA', 'RS'),
(4054, 'RONDA ALTA', 'RS'),
(4053, 'RONCADOR', 'PR'),
(4052, 'ROMELÂNDIA', 'SC'),
(4051, 'ROMARIA', 'MG'),
(4050, 'ROLIM DE MOURA', 'RO'),
(4049, 'ROLANTE', 'RS'),
(4048, 'ROLÂNDIA', 'PR'),
(4047, 'RODRIGUES ALVES', 'AC'),
(4046, 'RODOLFO FERNANDES', 'RN'),
(4045, 'RODELAS', 'BA'),
(4044, 'RODEIRO', 'MG'),
(4043, 'RODEIO BONITO', 'RS'),
(4042, 'RODEIO', 'SC'),
(4041, 'ROCHEDO DE MINAS', 'MG'),
(4040, 'ROCHEDO', 'MS'),
(4039, 'ROCA SALES', 'RS'),
(4038, 'RIVERSUL', 'SP'),
(4037, 'RITAPOLIS', 'MG'),
(4036, 'RIQUEZA', 'SC'),
(4035, 'RIOZINHO', 'RS'),
(4034, 'RIOLÂNDIA', 'SP'),
(4033, 'RIO VERMELHO', 'MG'),
(4032, 'RIO VERDE DE MATO GROSSO', 'MS'),
(4031, 'RIO VERDE', 'GO'),
(4030, 'RIO TINTO', 'PB'),
(4029, 'RIO SONO', 'TO'),
(4028, 'RIO RUFINO', 'SC'),
(4027, 'RIO REAL', 'BA'),
(4026, 'RIO QUENTE', 'GO'),
(4025, 'RIO PRETO DA EVA', 'AM'),
(4024, 'RIO PRETO', 'MG'),
(4023, 'RIO POMBA', 'MG'),
(4022, 'RIO PIRACICABA', 'MG'),
(4021, 'RIO PARDO DE MINAS', 'MG'),
(4020, 'RIO PARDO', 'RS'),
(4019, 'RIO PARANAÍBA', 'MG'),
(4018, 'RIO NOVO DO SUL', 'ES'),
(4017, 'RIO NOVO', 'MG'),
(4016, 'RIO NEGRO', 'PR'),
(4015, 'RIO NEGRO', 'MS'),
(4014, 'RIO NEGRINHO', 'SC'),
(4013, 'RIO MARIA', 'PA'),
(4012, 'RIO MANSO', 'MG'),
(4011, 'RIO LARGO', 'AL'),
(4010, 'RIO GRANDE DO PIAUÍ', 'PI'),
(4009, 'RIO GRANDE DA SERRA', 'SP'),
(4008, 'RIO GRANDE', 'RS'),
(4007, 'RIO FORTUNA', 'SC'),
(4006, 'RIO FORMOSO', 'PE'),
(4005, 'RIO ESPERA', 'MG'),
(4004, 'RIO DOS ÍNDIOS', 'RS'),
(4003, 'RIO DOS CEDROS', 'SC'),
(4002, 'RIO DOS BOIS', 'TO'),
(4001, 'RIO DOCE', 'MG'),
(4000, 'RIO DO SUL', 'SC'),
(3999, 'RIO DO PRADO', 'MG'),
(3998, 'RIO DO PIRES', 'BA'),
(3997, 'RIO DO OESTE', 'SC'),
(3996, 'RIO DO FOGO', 'RN'),
(3995, 'RIO DO CAMPO', 'SC'),
(3994, 'RIO DO ANTÔNIO', 'BA'),
(3993, 'RIO DE JANEIRO', 'RJ'),
(3992, 'RIO DE CONTAS', 'BA'),
(3991, 'RIO DAS PEDRAS', 'SP'),
(3990, 'RIO DAS OSTRAS', 'RJ'),
(3989, 'RIO DAS FLORES', 'RJ'),
(3988, 'RIO DAS ANTAS', 'SC'),
(3987, 'RIO DA CONCEIÇÃO', 'TO'),
(3986, 'RIO CRESPO', 'RO'),
(3985, 'RIO CLARO', 'RJ'),
(3984, 'RIO CASCA', 'MG'),
(3983, 'RIO BRILHANTE', 'MS'),
(3982, 'RIO BRANCO DO SUL', 'PR'),
(3981, 'RIO BRANCO DO IVAÍ', 'PR'),
(3980, 'RIO BRANCO', 'AC'),
(3979, 'RIO BONITO DO IGUAÇU', 'PR'),
(3978, 'RIO BONITO', 'RJ'),
(3977, 'RIO BOM', 'PR'),
(3976, 'RIO BANANAL', 'ES'),
(3975, 'RIO AZUL', 'PR'),
(3974, 'RIO ACIMA', 'MG'),
(3973, 'RINÓPOLIS', 'SP'),
(3972, 'RINCÃO', 'SP'),
(3971, 'RIFAINA', 'SP'),
(3970, 'RIBEIRÓPOLIS', 'SE'),
(3969, 'RIBEIRO GONÇALVES', 'PI'),
(3968, 'RIBEIRÃOZINHO', 'MT'),
(3967, 'RIBEIRÃO VERMELHO', 'MG'),
(3966, 'RIBEIRÃO PRETO', 'SP'),
(3965, 'RIBEIRÃO PIRES', 'SP'),
(3964, 'RIBEIRÃO GRANDE', 'SP'),
(3963, 'RIBEIRÃO DOS ÍNDIOS', 'SP'),
(3962, 'RIBEIRÃO DO SUL', 'SP'),
(3961, 'RIBEIRÃO DO PINHAL', 'PR'),
(3960, 'RIBEIRÃO DO LARGO', 'BA'),
(3959, 'RIBEIRÃO DAS NEVES', 'MG'),
(3958, 'RIBEIRÃO CORRENTE', 'SP'),
(3957, 'RIBEIRÃO CLARO', 'PR'),
(3956, 'RIBEIRÃO CASCALHEIRA', 'MT'),
(3955, 'RIBEIRÃO BRANCO', 'SP'),
(3954, 'RIBEIRÃO BONITO', 'SP'),
(3953, 'RIBEIRÃO', 'PE'),
(3952, 'RIBEIRA DO POMBAL', 'BA'),
(3951, 'RIBEIRA DO PIAUÍ', 'PI'),
(3950, 'RIBEIRA DO AMPARO', 'BA'),
(3949, 'RIBEIRA', 'SP'),
(3948, 'RIBAS DO RIO PARDO', 'MS'),
(3947, 'RIBAMAR FIQUENE', 'MA'),
(3946, 'RIANÁPOLIS', 'GO'),
(3945, 'RIALMA', 'GO'),
(3944, 'RIACHUELO', 'SE'),
(3943, 'RIACHUELO', 'RN'),
(3942, 'RIACHO FRIO', 'PI'),
(3941, 'RIACHO DOS MACHADOS', 'MG'),
(3940, 'RIACHO DOS CAVALOS', 'PB'),
(3939, 'RIACHO DE SANTO ANTÔNIO', 'PB'),
(3938, 'RIACHO DE SANTANA', 'BA'),
(3937, 'RIACHO DAS ALMAS', 'PE'),
(3936, 'RIACHO DA CRUZ', 'RN'),
(3935, 'RIACHINHO', 'TO'),
(3934, 'RIACHINHO', 'MG'),
(3933, 'RIACHAO DO POÇO', 'PB'),
(3932, 'RIACHAO DO JAÇUIPE', 'BA'),
(3931, 'RIACHÃO DO DANTAS', 'SE'),
(3930, 'RIACHAO DAS NEVES', 'BA'),
(3929, 'RIACHAO', 'MA'),
(3928, 'REZENDE COSTA', 'MG'),
(3927, 'RETIROLÂNDIA', 'BA'),
(3926, 'RESTINGA SECA', 'RS'),
(3925, 'RESTINGA', 'SP'),
(3924, 'RESSAQUINHA', 'MG'),
(3923, 'RESPLENDOR', 'MG'),
(3922, 'RESERVA DO CABACAL', 'MT'),
(3921, 'RESERVA', 'PR'),
(3920, 'RESENDE', 'RJ'),
(3919, 'RERIUTABA', 'CE'),
(3918, 'RENASCENÇA', 'PR'),
(3917, 'REMÍGIO', 'PB'),
(3916, 'REMANSO', 'BA'),
(3915, 'RELVADO', 'RS'),
(3914, 'REGISTRO', 'SP'),
(3913, 'REGINÓPOLIS', 'SP'),
(3912, 'REGENTE FEIJO', 'SP'),
(3911, 'REGENERACÃO', 'PI'),
(3910, 'REDENTORA', 'RS'),
(3909, 'REDENCÃO DO GURGUELIA', 'PI'),
(3908, 'REDENCÃO DA SERRA', 'SP'),
(3907, 'REDENÇÃO', 'PA'),
(3906, 'REDENCÃO', 'CE'),
(3905, 'RECURSOLÂNDIA', 'TO'),
(3904, 'RECREIO', 'MG'),
(3903, 'RECIFE', 'PE'),
(3902, 'REBOUCAS', 'PR'),
(3901, 'REALEZA', 'PR'),
(3900, 'RAUL SOARES', 'MG'),
(3899, 'RAPOSOS', 'MG'),
(3898, 'RAPOSA', 'MA'),
(3897, 'RANCHO QUEIMADO', 'SC'),
(3896, 'RANCHO ALEGRE DO OESTE', 'PR'),
(3895, 'RANCHO ALEGRE', 'PR'),
(3894, 'RANCHARIA', 'SP'),
(3893, 'RAMILÂNDIA', 'PR'),
(3892, 'RAFARD', 'SP'),
(3891, 'RAFAEL JAMBEIRO', 'BA'),
(3890, 'RAFAEL GODEIRO', 'RN'),
(3889, 'RAFAEL FERNANDES', 'RN'),
(620, 'BOCA DO ACRE', 'AM'),
(3888, 'QUIXERÉ', 'CE'),
(3887, 'QUIXERAMOBIM', 'CE'),
(3886, 'QUIXELO', 'CE'),
(3885, 'QUIXADA', 'CE'),
(3884, 'QUIXABEIRA', 'BA'),
(3883, 'QUIXABÁ', 'PE'),
(3882, 'QUIXABA', 'PB'),
(3881, 'QUITERIANÓPOLIS', 'CE'),
(3880, 'QUITANDINHA', 'PR'),
(3879, 'QUISSAMA', 'RJ'),
(3878, 'QUIRINÓPOLIS', 'GO'),
(3877, 'QUIPAPA', 'PE'),
(3876, 'QUINZE DE NOVEMBRO', 'RS'),
(3875, 'QUINTANA', 'SP'),
(3874, 'QUINTA DO SOL', 'PR'),
(3873, 'QUILOMBO', 'SC'),
(3872, 'QUIJINGUE', 'BA'),
(3871, 'QUEVEDOS', 'RS'),
(3870, 'QUERÊNCIA DO NORTE', 'PR'),
(3869, 'QUERÊNCIA', 'MT'),
(3868, 'QUELUZITO', 'MG'),
(3867, 'QUELUZ', 'SP'),
(3866, 'QUEIROZ', 'SP'),
(3865, 'QUEIMADOS', 'RJ'),
(3864, 'QUEIMADAS', 'BA'),
(3863, 'QUEIMADA NOVA', 'PI'),
(3862, 'QUEDAS DO IGUAÇU', 'PR'),
(3861, 'QUEBRANGULO', 'AL'),
(3860, 'QUATRO PONTES', 'PR'),
(3859, 'QUATRO BARRAS', 'PR'),
(3858, 'QUATIS', 'RJ'),
(3857, 'QUATIPURU', 'PA'),
(3856, 'QUATIGUA', 'PR'),
(3855, 'QUATA', 'SP'),
(3854, 'QUARTO CENTENARIO', 'PR'),
(3853, 'QUARTEL GERAL', 'MG'),
(3852, 'QUARAI', 'RS'),
(3851, 'QUADRA', 'SP'),
(3850, 'PUXINANA', 'PB'),
(3849, 'PUTINGA', 'RS'),
(3848, 'PUREZA', 'RN'),
(3847, 'PUGMIL', 'TO'),
(3846, 'PRUDENTÓPOLIS', 'PR'),
(3845, 'PRUDENTE DE MORAIS', 'MG'),
(3844, 'PROTÁSIO ALVES', 'RS'),
(3843, 'PROPRIA', 'SE'),
(3842, 'PROMISSÃO', 'SP'),
(3841, 'PROGRESSO', 'RS'),
(3840, 'PROFESSOR JAMIL', 'GO'),
(3839, 'PRINCESA ISABEL', 'PB'),
(3838, 'PRINCESA', 'SC'),
(3837, 'PRIMEIRO DE MAIO', 'PR'),
(3836, 'PRIMEIRA CRUZ', 'MA'),
(3835, 'PRIMAVERA DO LESTE', 'MT'),
(3834, 'PRIMAVERA DE RONDONIA', 'RO'),
(3833, 'PRIMAVERA', 'PE'),
(3832, 'PRIMAVERA', 'PA'),
(3831, 'PRESIDENTE VENCESLAU', 'SP'),
(3830, 'PRESIDENTE VARGAS', 'MA'),
(3829, 'PRESIDENTE TANCREDO NEVES', 'BA'),
(3828, 'PRESIDENTE SARNEY', 'MA'),
(3827, 'PRESIDENTE PRUDENTE', 'SP'),
(3826, 'PRESIDENTE OLEGARIO', 'MG'),
(3825, 'PRESIDENTE NEREU', 'SC'),
(3824, 'PRESIDENTE MEDICI', 'MA'),
(3823, 'PRESIDENTE LUCENA', 'RS'),
(3822, 'PRESIDENTE KUBITSCHEK', 'MG'),
(3821, 'PRESIDENTE KENNEDY', 'TO'),
(3820, 'PRESIDENTE KENNEDY', 'ES'),
(3819, 'PRESIDENTE JUSCELINO', 'MA'),
(3818, 'PRESIDENTE JANIO QUADROS', 'BA'),
(3817, 'PRESIDENTE GETULIO', 'SC'),
(3816, 'PRESIDENTE FIGUEIREDO', 'AM'),
(3815, 'PRESIDENTE EPITACIO', 'SP'),
(3814, 'PRESIDENTE DUTRA', 'BA'),
(3813, 'PRESIDENTE CASTELO BRANCO', 'PR'),
(3812, 'PRESIDENTE BERNARDES', 'SP'),
(3811, 'PRESIDENTE BERNARDES', 'MG'),
(3810, 'PRESIDENTE ALVES', 'SP'),
(3809, 'PREFEITO DE PINHÃO', 'SE'),
(3808, 'PRATINHA', 'MG'),
(3807, 'PRATAPOLIS', 'MG'),
(3806, 'PRATÂNIA', 'SP'),
(3805, 'PRATA DO PIAUÍ', 'PI'),
(3804, 'PRATA', 'MG'),
(3803, 'PRANCHITA', 'PR'),
(3802, 'PRAINHA', 'PA'),
(3801, 'PRAIA NORTE', 'TO'),
(3800, 'PRAIA GRANDE', 'SC'),
(3799, 'PRADOS', 'MG'),
(3798, 'PRADÓPOLIS', 'SP'),
(3797, 'PRADO FERREIRA', 'PR'),
(3796, 'PRADO', 'BA'),
(3795, 'PRACUÚBA', 'AP'),
(3794, 'PRACINHA', 'SP'),
(3793, 'POXOREO', 'MT'),
(3792, 'POUSO REDONDO', 'SC'),
(3791, 'POUSO NOVO', 'RS'),
(3790, 'POUSO ALTO', 'MG'),
(3789, 'POUSO ALEGRE', 'MG'),
(3788, 'POTIRETAMA', 'CE'),
(3787, 'POTIRENDABA', 'SP'),
(3786, 'POTIRÁGUA', 'BA'),
(3785, 'POTIM', 'SP'),
(3784, 'POTENGI', 'CE'),
(3783, 'POTÉ', 'MG'),
(3782, 'POSSE', 'GO'),
(3781, 'PORTO XAVIER', 'RS'),
(3780, 'PORTO WALTER', 'AC'),
(3779, 'PORTO VITÓRIA', 'PR'),
(3778, 'PORTO VERA CRUZ', 'RS'),
(3777, 'PORTO VELHO', 'RO'),
(3776, 'PORTO UNIÃO', 'SC'),
(3775, 'PORTO SEGURO', 'BA'),
(3774, 'PORTO RICO DO MARANHÃO', 'MA'),
(3773, 'PORTO RICO', 'PR'),
(3772, 'PORTO REAL DO COLÉGIO', 'AL'),
(3771, 'PORTO REAL', 'RJ'),
(3770, 'PORTO NACIONAL', 'TO'),
(3769, 'PORTO MURTINHO', 'MS'),
(3768, 'PORTO MAUA', 'RS'),
(3767, 'PORTO LUCENA', 'RS'),
(3766, 'PORTO GRANDE', 'AP'),
(3765, 'PORTO FRANCO', 'MA'),
(3764, 'PORTO FIRME', 'MG'),
(3763, 'PORTO FERREIRA', 'SP'),
(3762, 'PORTO FELIZ', 'SP'),
(3761, 'PORTO ESTRELA', 'MT'),
(3760, 'PORTO ESPERIDIÃO', 'MT'),
(3759, 'PORTO DOS GAÚCHOS', 'MT'),
(3758, 'PORTO DO MANGUE', 'RN'),
(3757, 'PORTO DE PEDRAS', 'AL'),
(3756, 'PORTO DE MOZ', 'PA'),
(3755, 'PORTO DA FOLHA', 'SE'),
(3754, 'PORTO CALVO', 'AL'),
(3753, 'PORTO BELO', 'SC'),
(3752, 'PORTO BARREIRO', 'PR'),
(3751, 'PORTO AMAZONAS', 'PR'),
(3750, 'PORTO ALEGRE DO TOCANTINS', 'TO'),
(3749, 'PORTO ALEGRE DO PIAUÍ', 'PI'),
(3748, 'PORTO ALEGRE DO NORTE', 'MT'),
(3747, 'PORTO ALEGRE', 'RS'),
(3746, 'PORTO ACRE', 'AC'),
(3745, 'PORTO', 'PI'),
(3744, 'PORTELÂNDIA', 'GO'),
(3743, 'PORTEL', 'PA'),
(3742, 'PORTEIRINHA', 'MG'),
(3741, 'PORTEIRAS', 'CE'),
(3740, 'PORTEIRÃO', 'GO'),
(3739, 'PORTÃO', 'RS'),
(3738, 'PORTALEGRE', 'RN'),
(3737, 'PORECATU', 'PR'),
(3736, 'PORCIÚNCULA', 'RJ'),
(3735, 'PORANGATU', 'GO'),
(3734, 'PORANGABA', 'SP'),
(3733, 'PORANGABA', 'CE'),
(3732, 'PORANGA', 'CE'),
(3731, 'POPULINA', 'SP'),
(3730, 'PONTO NOVO', 'BA'),
(3729, 'PONTO DOS VOLANTES', 'MG'),
(3728, 'PONTO CHIQUE', 'MG'),
(3727, 'PONTO BELO', 'ES'),
(3726, 'PONTES GESTAL', 'SP'),
(3725, 'PONTES E LACERDA', 'MT'),
(3724, 'PONTE SERRADA', 'SC'),
(3723, 'PONTE PRETA', 'RS'),
(3722, 'PONTE NOVA', 'MG'),
(3721, 'PONTE BRANCA', 'MT'),
(3720, 'PONTE ALTA DO TOCANTINS', 'TO'),
(3719, 'PONTE ALTA DO NORTE', 'SC'),
(3718, 'PONTE ALTA DO BOM JESUS', 'TO'),
(3717, 'PONTE ALTA', 'SC'),
(3716, 'PONTE', 'MG'),
(3715, 'PONTÃO', 'RS'),
(3714, 'PONTALINA', 'GO'),
(3713, 'PONTAL DO PARANÁ', 'PR'),
(3712, 'PONTAL DO ARAGUAIA', 'MT'),
(3711, 'PONTAL', 'SP'),
(3710, 'PONTA PORÃ', 'MS'),
(3709, 'PONTALINDA', 'SP'),
(3708, 'PONTA GROSSA', 'PR'),
(3707, 'PONTA DE PEDRAS', 'PA'),
(3706, 'PONGAÍ', 'SP'),
(3705, 'POMPÉU', 'MG'),
(3704, 'POMPÉIA', 'SP'),
(3703, 'POMERODE', 'SC'),
(3702, 'POMBOS', 'PE'),
(3701, 'POMBAL', 'PB'),
(3700, 'POLONI', 'SP'),
(3699, 'POJUCA', 'BA'),
(3698, 'POCRANE', 'MG'),
(3697, 'POÇOS DE CALDAS', 'MG'),
(3696, 'POCONÉ', 'MT'),
(3695, 'POÇÕES', 'BA'),
(3694, 'POÇO VERDE', 'SE'),
(3693, 'POÇO REDONDO', 'SE'),
(3692, 'POÇO FUNDO', 'MG'),
(3691, 'POÇO DE JOSÉ DE MOURA', 'PB'),
(3690, 'POÇO DAS TRINCHEIRAS', 'AL'),
(3689, 'POÇO DAS ANTAS', 'RS'),
(3688, 'POÇO DANTAS', 'PB'),
(3687, 'POÇO BRANCO', 'RN'),
(3686, 'POCINHOS', 'PB'),
(3685, 'POÇÃO DE PEDRAS', 'MA'),
(3684, 'POÇÃO', 'PE'),
(3683, 'POA', 'SP'),
(3682, 'PLATINA', 'SP'),
(3681, 'PLANURA', 'MG'),
(3680, 'PLANALTO DA SERRA', 'MT'),
(3679, 'PLANALTO ALEGRE', 'SC'),
(3678, 'PLANALTO', 'BA'),
(3677, 'PLANALTINO', 'BA'),
(3676, 'PLANALTINA DO PARANÁ', 'PR'),
(3675, 'PLANALTINA', 'GO'),
(3674, 'PLÁCIDO DE CASTRO', 'AC'),
(3673, 'PLACAS', 'PA'),
(3672, 'PIUM-I', 'MG'),
(3671, 'PIUMA', 'ES'),
(3670, 'PIUM', 'TO'),
(3669, 'PITIMBU', 'PB'),
(3668, 'PITANGUI', 'MG'),
(3667, 'PITANGUEIRAS', 'PR'),
(3666, 'PITANGA', 'PR'),
(3665, 'PIRPIRITUBA', 'PB'),
(3664, 'PIRIPIRI', 'PI'),
(3663, 'PIRIPA', 'BA'),
(3662, 'PIRES FERREIRA', 'CE'),
(3661, 'PIRES DO RIO', 'GO'),
(3660, 'PIRENÓPOLIS', 'GO'),
(3659, 'PIRAÚBA', 'MG'),
(3658, 'PIRATUBA', 'SC'),
(3657, 'PIRATININGA', 'SP'),
(3656, 'PIRATINI', 'RS'),
(3655, 'PIRASSUNUNGA', 'SP'),
(3654, 'PIRAQUE', 'TO'),
(3653, 'PIRAQUARA', 'PR'),
(3652, 'PIRAPOZINHO', 'SP'),
(3651, 'PIRAPORA DO BOM JESUS', 'SP'),
(3650, 'PIRAPORA', 'MG'),
(3649, 'PIRAPO', 'RS'),
(3648, 'PIRAPETINGA', 'MG'),
(3647, 'PIRAPEMAS', 'MA'),
(3646, 'PIRANHAS', 'AL'),
(3645, 'PIRANGUINHO', 'MG'),
(3644, 'PIRANGUCU', 'MG'),
(3643, 'PIRANGI', 'SP'),
(3642, 'PIRANGA', 'MG'),
(3641, 'PIRAMBU', 'SE'),
(3640, 'PIRAJUI', 'SP'),
(3639, 'PIRAJUBA', 'MG'),
(3638, 'PIRAJU', 'SP'),
(3637, 'PIRAÍ DO SUL', 'PR'),
(3636, 'PIRAÍ DO NORTE', 'BA'),
(3635, 'PIRAÍ', 'RJ'),
(3634, 'PIRAÇURUCA', 'PI'),
(3633, 'PIRACICABA', 'SP'),
(3632, 'PIRACEMA', 'MG'),
(3631, 'PIRACANJUBA', 'GO'),
(3630, 'PIRACAIA', 'SP'),
(3629, 'PIQUETE', 'SP'),
(3628, 'PIQUET CARNEIRO', 'CE'),
(3627, 'PIQUEROBI', 'SP'),
(3626, 'PIO XII', 'MA'),
(3625, 'PIO IX', 'PI'),
(3624, 'PINTADAS', 'BA'),
(3623, 'PINHEIRO PRETO', 'SC'),
(3622, 'PINHEIRO MACHADO', 'RS'),
(3621, 'PINHEIRO', 'MA'),
(3620, 'PINHEIRINHO DO VALE', 'RS'),
(3619, 'PINHEIRAL', 'RJ'),
(3618, 'PINHÃO', 'SE'),
(3617, 'PINHÃO', 'PR'),
(3616, 'PINHALZINHO', 'SP'),
(3615, 'PINHALÃO', 'PR'),
(3614, 'PINHAL GRANDE', 'RS'),
(3613, 'PINHAL DE SÃO BENTO', 'PR'),
(3612, 'PINHAL DA SERRA', 'RS'),
(3611, 'PINHAL', 'RS'),
(3610, 'PINHAIS', 'PR'),
(3609, 'PINDORETAMA', 'CE'),
(3608, 'PINDORAMA DO TOCANTINS', 'TO'),
(3607, 'PINDORAMA', 'SP'),
(3606, 'PINDOBAÇU', 'BA'),
(3605, 'PINDARÉ MIRIM', 'MA'),
(3604, 'PINDAMONHANGABA', 'SP'),
(3603, 'PINDAI (OURO BRANCO)', 'BA'),
(3602, 'PIMENTEIRAS DO OESTE', 'RO'),
(3601, 'PIMENTEIRAS', 'PI'),
(3600, 'PIMENTA BUENO', 'RO'),
(3599, 'PIMENTA', 'MG'),
(3598, 'PILÕEZINHOS', 'PB'),
(3597, 'PILÕES', 'RN'),
(3596, 'PILOES', 'PB'),
(3595, 'PILAR DO SUL', 'SP'),
(3594, 'PILAR DE GOIÁS', 'GO'),
(3593, 'PILAR', 'PB'),
(3592, 'PILAR', 'AL'),
(3591, 'PILÃO ARCADO', 'BA'),
(3590, 'PIEN', 'PR'),
(3589, 'PIEDADE DOS GERAIS', 'MG'),
(3588, 'PIEDADE DO RIO GRANDE', 'MG'),
(3587, 'PIEDADE DE PONTE NOVA', 'MG'),
(3586, 'PIEDADE DE CARATINGA', 'MG'),
(3585, 'PIEDADE', 'SP'),
(3584, 'PICUI', 'PB'),
(3583, 'PICOS', 'PI'),
(3582, 'PIÇARRAS', 'SC'),
(3581, 'PICARRA', 'PA'),
(3580, 'PICADA CAFE', 'RS'),
(3579, 'PIAU', 'MG'),
(3578, 'PIATÃ', 'BA'),
(3577, 'PIANCÓ', 'PB'),
(3576, 'PIACATU', 'SP'),
(3575, 'PIACABUCU', 'AL'),
(3574, 'PETRÓPOLIS', 'RJ'),
(3573, 'PETROLINA DE GOIÁS', 'GO'),
(3572, 'PETROLINA', 'PE'),
(3571, 'PETROLÂNDIA', 'PE'),
(3570, 'PESQUEIRA', 'PE'),
(3569, 'PESCADOR', 'MG'),
(3568, 'PERUIBE', 'SP'),
(3567, 'PEROLÂNDIA', 'GO'),
(3566, 'PEROLA  D`OESTE', 'PR'),
(3565, 'PEROLA', 'PR'),
(3564, 'PEROBAL', 'PR'),
(3563, 'PERITORO', 'MA'),
(3562, 'PERITIBA', 'SC'),
(3561, 'PERIQUITO', 'MG'),
(3560, 'PERI-MIRIM', 'MA'),
(3559, 'PEREIRO', 'CE'),
(3558, 'PEREIRAS', 'SP'),
(3557, 'PEREIRA BARRETO', 'SP'),
(3556, 'PERDÕES', 'MG'),
(3555, 'PERDIZES', 'MG'),
(3554, 'PERDIGAO', 'MG'),
(3553, 'PEQUIZEIRO', 'TO'),
(3552, 'PEQUI', 'MG'),
(3551, 'PEQUERI', 'MG'),
(3550, 'PENTECOSTE', 'CE'),
(3549, 'PENHA', 'SC'),
(3548, 'PENEDO', 'AL'),
(3547, 'PENÁPOLIS', 'SP'),
(3546, 'PENALVA', 'MA'),
(3545, 'PENAFORTE', 'CE'),
(3544, 'PELOTAS', 'RS'),
(3543, 'PEJUCARA', 'RS'),
(3542, 'PEIXOTO DE AZEVEDO', 'MT'),
(3541, 'PEIXE-BOI', 'PA'),
(3540, 'PEIXE', 'TO'),
(3539, 'PEDRO VELHO', 'RN'),
(3538, 'PEDRO TEIXEIRA', 'MG'),
(3537, 'PEDRO REGIS', 'PB'),
(3536, 'PEDRO OSÓRIO', 'RS'),
(3535, 'PEDRO LEOPOLDO', 'MG'),
(3534, 'PEDRO LAURENTINO', 'PI'),
(3533, 'PEDRO II', 'PI'),
(3532, 'PEDRO GOMES', 'MS'),
(3531, 'PEDRO DO ROSÁRIO', 'MA'),
(3530, 'PEDRO DE TOLEDO', 'SP'),
(3529, 'PEDRO CANÁRIO', 'ES'),
(3528, 'PEDRO AVELINO', 'RN'),
(3527, 'PEDRO ALEXANDRÉ', 'BA'),
(3526, 'PEDRO AFONSO', 'TO'),
(3525, 'PEDRINÓPOLIS', 'MG'),
(3524, 'PEDRINHAS PAULISTA', 'SP'),
(3523, 'PEDRINHAS', 'SE'),
(3522, 'PEDREIRAS', 'MA'),
(3521, 'PEDREIRA', 'SP'),
(3520, 'PEDREGULHO', 'SP'),
(3519, 'PEDRAS GRANDES', 'SC'),
(3518, 'PEDRAS DE MARIA DA CRUZ', 'MG'),
(3517, 'PEDRAS DE FOGO', 'PB'),
(3516, 'PEDRÃO', 'BA'),
(3515, 'PEDRANÓPOLIS', 'SP'),
(3514, 'PEDRALVA', 'MG'),
(3513, 'PEDRA PRETA', 'MT'),
(3512, 'PEDRA MOLE', 'SE'),
(3511, 'PEDRA LAVRADA', 'PB'),
(3510, 'PEDRA GRANDE', 'RN'),
(3509, 'PEDRA DOURADA', 'MG'),
(3508, 'PEDRA DO INDAIA', 'MG'),
(3507, 'PEDRA DO ANTA', 'MG'),
(3506, 'PEDRA BRANCA DO AMAPARI', 'AP'),
(3505, 'PEDRA BRANCA', 'CE'),
(3504, 'PEDRA BELA', 'SP'),
(3503, 'PEDRA AZUL', 'MG'),
(3502, 'PEDRA', 'PE'),
(3501, 'PEDERNEIRAS', 'SP'),
(3500, 'PEÇANHA', 'MG'),
(3499, 'PEABIRU', 'PR'),
(3498, 'PÉ DE SERRA', 'BA'),
(3497, 'PAVUSSU', 'PI'),
(3496, 'PAVERAMA', 'RS'),
(3495, 'PAVÃO', 'MG'),
(3494, 'PAULO RAMOS', 'MA'),
(3493, 'PAULO LOPES', 'SC'),
(3492, 'PAULO JACINTO', 'AL'),
(3491, 'PAULO FRONTIN', 'PR'),
(3490, 'PAULO DE FARIA', 'SP'),
(3489, 'PAULO AFONSO', 'BA'),
(3488, 'PAULISTAS', 'MG'),
(3487, 'PAULISTANIA', 'SP'),
(3486, 'PAULISTANA', 'PI'),
(3485, 'PAULISTA', 'PB'),
(3484, 'PAULINO NEVES', 'MA'),
(3483, 'PAULINIA', 'SP'),
(3482, 'PAULICÉIA', 'SP'),
(3481, 'PAULA FREITAS', 'PR'),
(3480, 'PAULA CÂNDIDO', 'MG'),
(3479, 'PAUINI', 'AM'),
(3478, 'PAUDALHO', 'PE'),
(3477, 'PAU DOS FERROS', 'RN'),
(3476, 'PAU D''ARCO', 'PA'),
(3475, 'PAU BRASIL', 'BA'),
(3474, 'PATY DO ALFERES', 'RJ'),
(3473, 'PATU', 'RN'),
(3472, 'PATROCINIO PAULISTA', 'SP'),
(3471, 'PATROCÍNIO DE MURIAÉ', 'MG'),
(3470, 'PATROCINIO', 'MG'),
(3469, 'PATOS DO PIAUÍ', 'PI'),
(3468, 'PATOS DE MINAS', 'MG'),
(3467, 'PATOS', 'PB'),
(3466, 'PATO BRANCO', 'PR'),
(3465, 'PATO BRAGADO', 'PR'),
(3464, 'PASTOS BONS', 'MA'),
(3463, 'PASSOS MAIA', 'SC'),
(3462, 'PASSOS', 'MG'),
(3461, 'PASSO FUNDO', 'RS'),
(3460, 'PASSO DO SOBRADO', 'RS'),
(3459, 'PASSO DE TORRES', 'SC'),
(3458, 'PASSO DE CAMARAGIBE', 'AL'),
(3457, 'PASSIRA', 'PE'),
(3456, 'PASSAGEM FRANCA DO PIAUÍ', 'PI'),
(3455, 'PASSAGEM FRANCA', 'MA'),
(3454, 'PASSAGEM', 'RN'),
(3453, 'PASSAGEM', 'PB'),
(3452, 'PASSABÉM', 'MG'),
(3451, 'PASSA VINTE', 'MG'),
(3450, 'PASSA TEMPO', 'MG'),
(3449, 'PASSA SETE', 'RS'),
(3448, 'PASSA QUATRO', 'MG'),
(3447, 'PASSA E FICA', 'RN'),
(3446, 'PAROBÉ', 'RS'),
(3445, 'PARNARAMA', 'MA'),
(3444, 'PARNAMIRIM', 'PE'),
(3443, 'PARNAIBA', 'PI'),
(3442, 'PARNÁGUA', 'PI'),
(3441, 'PARISI', 'SP'),
(3440, 'PARIQUERA-AÇU', 'SP'),
(3439, 'PARIPUEIRA', 'AL'),
(3438, 'PARIPIRANGA', 'BA'),
(3437, 'PARINTINS', 'AM'),
(3436, 'PARICONHA', 'AL'),
(3435, 'PARELHAS', 'RN'),
(3434, 'PARECIS', 'RO'),
(3433, 'PARECI NOVO', 'RS'),
(3432, 'PARDINHO', 'SP'),
(3431, 'PARAZINHO', 'RN'),
(3430, 'PARAUNA', 'GO'),
(3429, 'PARAUAPEBAS', 'PA'),
(3428, 'PARAU', 'RN'),
(3427, 'PARATY', 'RJ'),
(3426, 'PARATINGA', 'BA'),
(3425, 'PARARI', 'PB'),
(3424, 'PARAPUA', 'SP'),
(3423, 'PARAOPEBA', 'MG'),
(3422, 'PARANHOS', 'MS'),
(3421, 'PARANAVAÍ', 'PR'),
(3420, 'PARANÁTINGA', 'MT'),
(3419, 'PARANÁTAMA', 'PE'),
(3418, 'PARANAPUA', 'SP'),
(3417, 'PARANAPOEMA', 'PR'),
(3416, 'PARANÁPANEMA', 'SP'),
(3415, 'PARANAÍTA', 'MT'),
(3414, 'PARANÁIGUARA', 'GO'),
(3413, 'PARANÁIBA', 'MS'),
(3412, 'PARANAGUÁ', 'PR'),
(3411, 'PARANÁCITY', 'PR'),
(3410, 'PARANÁ', 'RN'),
(3409, 'PARAMOTI', 'CE'),
(3408, 'PARAMIRIM', 'BA'),
(3407, 'PARAMBU', 'CE'),
(3406, 'PARAISÓPOLIS', 'MG'),
(3405, 'PARAISO DO TOCANTINS', 'TO'),
(3404, 'PARAISO DO SUL', 'RS'),
(3403, 'PARAISO DO NORTE', 'PR'),
(3402, 'PARAÍSO', 'SP'),
(3401, 'PARAISO', 'SC'),
(3400, 'PARAIPABA', 'CE'),
(3399, 'PARAIBUNA', 'SP'),
(3398, 'PARAÍBANO', 'MA'),
(3397, 'PARAÍBA DO SUL', 'RJ'),
(3396, 'PARAÍ', 'RS'),
(3395, 'PARÁGUAÇU PAULISTA', 'SP'),
(3394, 'PARÁGUAÇU', 'MG'),
(3393, 'PARAGOMINAS', 'PA'),
(3392, 'PARAÇURU', 'CE'),
(3391, 'PARACATU', 'MG'),
(3390, 'PARACAMBI', 'RJ'),
(3389, 'PARÁ DE MINAS', 'MG'),
(3388, 'PAQUETA', 'PI'),
(3387, 'PAPANDUVA', 'SC'),
(3386, 'PAPAGAIOS', 'MG'),
(3385, 'PÃO DE AÇUCAR', 'AL'),
(3384, 'PÂNTANO GRANDE', 'RS'),
(3383, 'PANTANA GRANDE', 'RS'),
(3382, 'PANORAMA', 'SP'),
(3381, 'PANELAS', 'PE'),
(3380, 'PANCAS', 'ES'),
(3379, 'PANAMBI', 'RS'),
(3378, 'PANAMÁ', 'GO'),
(3377, 'PALOTINA', 'PR'),
(3376, 'PALMÓPOLIS', 'MG'),
(3375, 'PALMITOS', 'SC'),
(3374, 'PALMITINHO', 'RS'),
(3373, 'PALMITAL', 'PR'),
(3372, 'PALMINÓPOLIS', 'GO'),
(3371, 'PALMELO', 'GO'),
(3370, 'PALMEIRÓPOLIS', 'TO'),
(3369, 'PALMERINA', 'PE'),
(3368, 'PALMEIRAS DO TOCANTINS', 'TO'),
(3367, 'PALMEIRAS DE GOIÁS', 'GO'),
(3366, 'PALMEIRAS', 'BA'),
(3365, 'PALMEIRANTE', 'TO'),
(3364, 'PALMEIRÂNDIA', 'MA'),
(3363, 'PALMEIRAÍS', 'PI'),
(3362, 'PALMEIRA DOS ÍNDIOS', 'AL'),
(3361, 'PALMEIRA DO PIAUÍ', 'PI'),
(3360, 'PALMEIRA DO OESTE', 'SP'),
(3359, 'PALMEIRA DAS MISSÕES', 'RS'),
(3358, 'PALMEIRA', 'PR'),
(3357, 'PALMAS DE MONTE ALTO', 'BA'),
(3356, 'PALMAS', 'TO'),
(3355, 'PALMAS', 'PR'),
(3354, 'PALMARES PAULISTA', 'SP'),
(3353, 'PALMARES DO SUL', 'RS'),
(3352, 'PALMARES', 'PE'),
(3351, 'PALMACIA', 'CE'),
(3350, 'PALMA SOLA', 'SC'),
(3349, 'PALMA DO TOCANTINS', 'TO'),
(3348, 'PALMA', 'MG'),
(3347, 'PALHOÇA', 'SC'),
(3346, 'PALHANO', 'CE'),
(3345, 'PALESTINA DO PARÁ', 'PA'),
(3344, 'PALESTINA DE GOIÁS', 'GO'),
(3343, 'PALESTINA', 'SP'),
(3342, 'PALESTINA', 'AL'),
(3341, 'PAJEU DO PIAUÍ', 'PI'),
(3340, 'PAIVA', 'MG'),
(3339, 'PAINS', 'MG'),
(3338, 'PAINEL', 'SC'),
(3337, 'PAINEIRAS', 'MG'),
(3336, 'PAIM FILHO', 'RS'),
(3335, 'PAIÇANDU', 'PR'),
(3334, 'PAIAL', 'SC'),
(3333, 'PAI PEDRO', 'MG'),
(3332, 'PAES LANDIM', 'PI'),
(3331, 'PADRE PARAISO', 'MG'),
(3330, 'PADRE MARCOS', 'PI'),
(3329, 'PADRE CARVALHO', 'MG'),
(3328, 'PADRE BERNARDO', 'GO'),
(3327, 'PAÇUJA', 'CE'),
(3326, 'PACOTI', 'CE'),
(3325, 'PACO DO LUMIAR', 'MA'),
(3324, 'PACATUBA', 'CE'),
(3323, 'PACARAIMA', 'RR'),
(3322, 'PACAJUS', 'CE'),
(3321, 'PACAJA', 'PA'),
(3320, 'PACAEMBU', 'SP'),
(3319, 'OUVIDOR', 'GO'),
(3318, 'OUROLÂNDIA', 'BA'),
(3317, 'OUROESTE', 'SP'),
(3316, 'OURO VERDE DO OESTE', 'PR'),
(3315, 'OURO VERDE DE MINAS', 'MG'),
(3314, 'OURO VERDE DE GOIÁS', 'GO'),
(3313, 'OURO VERDE', 'SP'),
(3312, 'OURO VELHO', 'PB'),
(3311, 'OURO PRETO DO OESTE', 'RO'),
(3310, 'OURO PRETO', 'MG'),
(3309, 'OURO FINO', 'MG'),
(3308, 'OURO BRANCO', 'RN'),
(3307, 'OURO BRANCO', 'AL'),
(3306, 'OURO', 'SC'),
(3305, 'OURIZONA', 'PR'),
(3304, 'OURINHOS', 'SP'),
(3303, 'OURILÂNDIA DO NORTE', 'PA'),
(3302, 'OURICURI', 'PE'),
(3301, 'OURICANGAS', 'BA'),
(3300, 'OUREM', 'PA'),
(3299, 'OTACÍLIO COSTA', 'SC'),
(3298, 'OSVALDO CRUZ', 'SP'),
(3297, 'OSÓRIO', 'RS'),
(3296, 'OSCAR BRESSANE', 'SP'),
(3295, 'OSASCO', 'SP'),
(3294, 'ORTIGUEIRA', 'PR'),
(3293, 'OROS', 'CE'),
(3292, 'OROCÓ', 'PE'),
(3291, 'OROBÓ', 'PE'),
(3290, 'ORLEANS', 'SC'),
(3289, 'ORLÂNDIA', 'SP'),
(3288, 'ORIZONA', 'GO'),
(3287, 'ORIXIMINA DO NORTE', 'PA'),
(3286, 'ORINDIUVA', 'SP'),
(3285, 'ORIENTE', 'SP'),
(3284, 'ORATÓRIOS', 'MG'),
(3283, 'ONDA VERDE', 'SP'),
(3282, 'ONÇA DO PITANGUI', 'MG'),
(3281, 'OLIVENÇA', 'AL'),
(3280, 'OLIVEIRA FORTES', 'MG'),
(3279, 'OLIVEIRA DOS BREJINHOS', 'BA'),
(3278, 'OLIVEIRA DE FÁTIMA', 'TO'),
(3277, 'OLIVEIRA', 'MG'),
(3276, 'OLIVEDOS', 'PB'),
(3275, 'OLINDINA', 'BA'),
(3274, 'OLINDA NOVA DO MARANHÃO', 'MA'),
(3273, 'OLINDA', 'PE'),
(3272, 'OLIMPIO NORONHA', 'MG'),
(3271, 'OLIMPIA', 'SP'),
(3270, 'OLHO D''ÁGUA DOS BORGES', 'RN'),
(3269, 'OLHO D''ÁGUA DO PIAUÍ', 'PI'),
(3268, 'OLHO D''ÁGUA DO CASADO', 'AL'),
(3267, 'OLHO D''ÁGUA DAS FLORES', 'AL'),
(3266, 'OLHO D''ÁGUA DAS CUNHAS', 'MA'),
(3265, 'OLHO D''ÁGUA', 'PB'),
(3264, 'ÓLEO', 'SP'),
(3263, 'OLARIA', 'MG'),
(3262, 'OIAPOQUE', 'AP'),
(3261, 'OEIRAS DO PARA', 'PA'),
(3260, 'OEIRAS', 'PI'),
(3259, 'OCAUÇU', 'SP'),
(3258, 'OCARA', 'CE'),
(3257, 'ÓBIDOS', 'PA'),
(3256, 'NUPORANGA', 'SP'),
(3255, 'NOVORIZANTE', 'MG'),
(3254, 'NOVO XINGU', 'RS'),
(3253, 'NOVO TRIUNFO', 'BA'),
(3252, 'NOVO TIRADENTES', 'RS'),
(3251, 'NOVO SÃO JOAQUIM', 'MT'),
(3250, 'NOVO SANTO ANTÔNIO', 'PI'),
(3249, 'NOVO REPARTIMENTO', 'PA'),
(3248, 'NOVO PROGRESSO', 'PA'),
(3247, 'NOVO PLANALTO', 'GO'),
(3246, 'NOVO ORIENTE DO PIAUÍ', 'PI'),
(3245, 'NOVO ORIENTE DE MINAS', 'MG'),
(3244, 'NOVO ORIENTE', 'CE'),
(3243, 'NOVO MUNDO', 'MT'),
(3242, 'NOVO MACHADO', 'RS'),
(3241, 'NOVO LINO', 'AL'),
(3240, 'NOVO JARDIM', 'TO'),
(3239, 'NOVO ITACOLOMI', 'PR'),
(3238, 'NOVO HORIZONTE DO SUL', 'MS'),
(3237, 'NOVO HORIZONTE DO OESTE', 'RO'),
(3236, 'NOVO HORIZONTE DO NORTE', 'MT'),
(3235, 'NOVO HORIZONTE', 'SP'),
(3234, 'NOVO HORIZONTE', 'BA'),
(3233, 'NOVO HAMBURGO', 'RS'),
(3232, 'NOVO GAMA', 'GO'),
(3231, 'NOVO CRUZEIRO', 'MG'),
(3230, 'NOVO CABRAIS', 'RS'),
(3229, 'NOVO BRASIL', 'GO'),
(3228, 'NOVO BARREIRO', 'RS'),
(3227, 'NOVO ARIPUANÃ', 'AM'),
(3226, 'NOVO ALEGRE', 'TO'),
(3225, 'NOVO AIRÃO', 'AM'),
(3224, 'NOVO ACORDO', 'TO'),
(3223, 'NOVAIS', 'SP'),
(3222, 'NOVA XAVANTINA', 'MT'),
(3221, 'NOVA VIÇOSA', 'BA'),
(3220, 'NOVA VENEZA', 'GO'),
(3219, 'NOVA VENÉCIA', 'ES'),
(3218, 'NOVA UNIÃO', 'MG'),
(3217, 'NOVA UBIRATAN', 'MT'),
(3216, 'NOVA TRENTO', 'SC'),
(3215, 'NOVA TIMBOTEUA', 'PA'),
(3214, 'NOVA TEBAS', 'PR'),
(3213, 'NOVA SOURE', 'BA'),
(3212, 'NOVA SERRANA', 'MG'),
(3211, 'NOVA SANTA ROSA', 'PR'),
(3210, 'NOVA SANTA RITA', 'PI'),
(3209, 'NOVA SANTA BÁRBARA', 'PR'),
(3208, 'NOVA RUSSAS', 'CE'),
(3207, 'NOVA ROSALÂNDIA', 'TO'),
(3206, 'NOVA ROMA DO SUL', 'RS'),
(3205, 'NOVA ROMA', 'GO'),
(3204, 'NOVA RESENDE', 'MG'),
(3203, 'NOVA REDENCÃO', 'BA'),
(3202, 'NOVA RAMADA', 'RS'),
(3201, 'NOVA PRATA DO IGUAÇU', 'PR'),
(3200, 'NOVA PRATA', 'RS'),
(3199, 'NOVA PORTEIRINHA', 'MG'),
(3198, 'NOVA PONTE', 'MG'),
(3197, 'NOVA PETRÓPOLIS', 'RS'),
(3196, 'NOVA PALMEIRA', 'PB'),
(3195, 'NOVA PALMA', 'RS'),
(3194, 'NOVA PÁDUA', 'RS'),
(3193, 'NOVA OLINDA DO NORTE', 'AM'),
(3192, 'NOVA OLINDA DO MARANHÃO', 'MA'),
(3191, 'NOVA OLINDA', 'CE'),
(3190, 'NOVA OLÍMPIA', 'PR'),
(3189, 'NOVA OLÍMPIA', 'MT'),
(3188, 'NOVA ODESSA', 'SP'),
(3187, 'NOVA MUTUM', 'MT'),
(3186, 'NOVA MONTE VERDE', 'MT'),
(3185, 'NOVA MODICA', 'MG'),
(3184, 'NOVA MARINGÁ', 'MT'),
(3183, 'NOVA MARILÂNDIA', 'MT'),
(3182, 'NOVA MAMORÉ', 'RO'),
(3181, 'NOVA LUZITANIA', 'SP'),
(3180, 'NOVA LONDRINA', 'PR'),
(3179, 'NOVA LIMA', 'MG'),
(3178, 'NOVA LARANJEIRAS', 'PR'),
(3177, 'NOVA LACERDA', 'MT'),
(3176, 'NOVA ITARANA', 'BA'),
(3175, 'NOVA ITABERABA', 'SC'),
(3174, 'NOVA IPIXUNA', 'PA'),
(3173, 'NOVA IORQUE', 'MA'),
(3172, 'NOVA INDEPENDÊNCIA', 'SP'),
(3171, 'NOVA IGUAÇU DE GOIÁS', 'GO'),
(3170, 'NOVA IGUAÇU', 'GO'),
(3169, 'NOVA IBIA', 'BA'),
(3168, 'NOVA HARTZ', 'RS'),
(3167, 'NOVA GUATAPORANGA', 'SP'),
(3166, 'NOVA GUARITA', 'MT'),
(3165, 'NOVA GRANADA', 'SP'),
(3164, 'NOVA GLÓRIA', 'GO'),
(3163, 'NOVA FRIBURGO', 'RJ'),
(3162, 'NOVA FLORESTA', 'PB'),
(3161, 'NOVA FÁTIMA', 'BA'),
(3160, 'NOVA EUROPA', 'SP'),
(3159, 'NOVA ESPERANÇA DO SUDOESTE', 'PR'),
(3158, 'NOVA ESPERANÇA DO SUL', 'RS'),
(3157, 'NOVA ESPERANÇA DO PIRIÁ', 'PA'),
(3156, 'NOVA ESPERANÇA', 'PR'),
(3155, 'NOVA ERECHIM', 'SC'),
(3154, 'NOVA ERA', 'MG'),
(3153, 'NOVA CRUZ', 'RN'),
(3152, 'NOVA CRIXAS', 'GO'),
(3151, 'NOVA COLINAS', 'MA'),
(3150, 'NOVA CASTILHO', 'SP'),
(3149, 'NOVA CANTU', 'PR'),
(3148, 'NOVA CANDELÁRIA', 'RS'),
(3147, 'NOVA CANAÃ PAULISTA', 'SP'),
(3146, 'NOVA CANAÃ DO NORTE', 'MT'),
(3145, 'NOVA CANAÃ', 'BA'),
(3144, 'NOVA CAMPINA', 'SP'),
(3143, 'NOVA BRÉSCIA', 'RS'),
(3142, 'NOVA BRAZILÂNDIA DO OESTE', 'RO'),
(3141, 'NOVA BRASILÂNDIA', 'MT'),
(3140, 'NOVA BOA VISTA', 'RS'),
(3139, 'NOVA BOA BISTA', 'RS'),
(3138, 'NOVA BELÉM', 'MG'),
(3137, 'NOVA BASSANO', 'RS'),
(3136, 'NOVA BANDEIRANTE', 'MT'),
(3135, 'NOVA AURORA', 'GO'),
(3134, 'NOVA ARAÇA', 'RS'),
(3133, 'NOVA ANDRADINA', 'MS'),
(3132, 'NOVA AMÉRICA DA COLINA', 'PR'),
(3131, 'NOVA AMÉRICA', 'GO'),
(3130, 'NOVA ALVORADA DO SUL', 'MS'),
(3129, 'NOVA ALVORADA', 'RS'),
(3128, 'NOVA ALIANÇA DO IVAÍ', 'PR'),
(3127, 'NOVA ALIANÇA', 'SP'),
(3126, 'NOSSA SENHORA DE LOURDES', 'SE'),
(3125, 'NOSSA SENHORA DOS REMÉDIOS', 'PI'),
(3124, 'NOSSA SENHORA DO SOCORRO', 'SE'),
(3123, 'NOSSA SENHORA DO LIVRAMENTO', 'MT'),
(3122, 'NOSSA SENHORA DE NAZARÉ', 'PI'),
(3121, 'NOSSA SENHORA DAS GRAÇAS', 'PR'),
(3120, 'NOSSA SENHORA DAS DORES', 'SE'),
(3119, 'NOSSA SENHORA DA GLÓRIA', 'SE'),
(3118, 'NOSSA SENHORA APARECIDA', 'SE'),
(3117, 'NORTELÂNDIA', 'MT'),
(3116, 'NORMANDIA', 'RR'),
(3115, 'NORDESTINA', 'BA'),
(3114, 'NONOAI', 'RS'),
(3113, 'NOBRES', 'MT'),
(3112, 'NITERÓI', 'RJ'),
(3111, 'NISIA FLORESTA', 'RN'),
(3110, 'NIQUELÂNDIA', 'GO'),
(3109, 'NIPOÃ', 'SP'),
(3108, 'NIOAQUE', 'MS'),
(3107, 'NINHEIRA', 'MG'),
(3106, 'NINA RODRIGUES', 'MA'),
(3105, 'NILÓPOLIS', 'RJ'),
(3104, 'NILO PEÇANHA', 'BA'),
(3103, 'NICOLAU VERGUEIRO', 'RS'),
(3102, 'NHANDEARA', 'SP'),
(3101, 'NHAMUNDA', 'AM'),
(3100, 'NEVES PAULISTA', 'SP'),
(3099, 'NERÓPOLIS', 'GO'),
(3098, 'NEPOMUCENO', 'MG'),
(3097, 'NEÓPOLIS', 'SE'),
(3096, 'NAZARIO', 'GO'),
(3095, 'NAZARÉZINHO', 'PB'),
(3094, 'NAZARENO', 'MG'),
(3093, 'NAZARÉ PAULISTA', 'SP'),
(3092, 'NAZARÉ DO PIAUÍ', 'PI'),
(3091, 'NAZARÉ DA MATA', 'PE'),
(3090, 'NAZARÉ', 'BA'),
(3089, 'NAVIRAÍ', 'MS'),
(3088, 'NAVEGANTES', 'SC'),
(3087, 'NATUBA', 'PB'),
(3086, 'NATIVIDADE DA SERRA', 'SP'),
(3085, 'NATIVIDADE', 'RJ'),
(3084, 'NATÉRCIA', 'MG'),
(3083, 'NATALÂNDIA', 'MG'),
(3082, 'NATAL', 'RN'),
(3081, 'NARANDIBA', 'SP'),
(3080, 'NAQUE', 'MG'),
(3079, 'NÃO ME TOQUE', 'RS'),
(3078, 'NANUQUE', 'MG'),
(3077, 'NANTES', 'SP'),
(3076, 'NACIF RAYDAN', 'MG'),
(3075, 'MUZAMBINHO', 'MG'),
(3074, 'MUTUNÓPOLIS', 'GO'),
(3073, 'MUTUM', 'MG'),
(3072, 'MUTUIPE', 'BA'),
(3071, 'MURUTINGA DO SUL', 'SP'),
(3070, 'MURITIBA', 'BA'),
(3069, 'MURICILÂNDIA', 'TO'),
(3068, 'MURICI DOS PORTELA', 'PI'),
(3067, 'MURICI', 'AL'),
(3066, 'MURIBECA', 'SE'),
(3065, 'MURIAÉ', 'MG'),
(3064, 'MUQUI', 'ES'),
(3063, 'MUQUEM DO SÃO FRANCISCO', 'BA'),
(3062, 'MUNIZ FREIRE', 'ES'),
(3061, 'MUNIZ FERREIRA', 'BA'),
(3060, 'MUNHOZ DE MELO', 'PR'),
(3059, 'MUNHOZ', 'MG'),
(3058, 'MUNDO NOVO', 'BA'),
(3057, 'MULUNGU DO MORRO', 'BA'),
(3056, 'MULUNGU', 'CE'),
(3055, 'MULITERNO', 'RS'),
(3054, 'MUITOS CAPOES', 'RS'),
(3053, 'MUCURICI', 'ES'),
(3052, 'MUCURI', 'BA'),
(3051, 'MUÇUM', 'RS'),
(3050, 'MUCUGE', 'BA'),
(3049, 'MUCAMBO', 'CE'),
(3048, 'MUCAJAÍ', 'RR'),
(3047, 'MUANA', 'PA'),
(3046, 'MOZARLÂNDIA', 'GO'),
(3045, 'MOTUCA', 'SP'),
(3044, 'MOSTARDAS', 'RS'),
(3043, 'MOSSORÓ', 'RN'),
(3042, 'MOSSAMEDES', 'GO'),
(3041, 'MORUNGABA', 'SP'),
(3040, 'MORTUGABA', 'BA'),
(3039, 'MORROS', 'MA'),
(3038, 'MORRO REUTER', 'RS'),
(3037, 'MORRO REDONDO', 'RS'),
(3036, 'MORRO GRANDE', 'SC'),
(3035, 'MORRO DO PILAR', 'MG'),
(3034, 'MORRO DO CHAPÉU DO PIAUÍ', 'PI'),
(3033, 'MORRO DO CHAPÉU', 'BA'),
(3032, 'MORRO DA GARÇA', 'MG'),
(3031, 'MORRO DA FUMAÇA', 'SC'),
(3030, 'MORRO CABEÇA NO TEMPO', 'PI'),
(3029, 'MORRO AGUDO DE GOIÁS', 'GO'),
(3028, 'MORRO AGUDO', 'SP'),
(3027, 'MORRINHOS DO SUL', 'RS'),
(3026, 'MORRINHOS', 'CE'),
(3025, 'MORRINHAS DO SUL', 'RS'),
(3024, 'MORRETES', 'PR'),
(3023, 'MORPARÁ', 'BA'),
(3022, 'MORMAÇO', 'RS'),
(3021, 'MORENO', 'PE'),
(3020, 'MOREIRA SALES', 'PR'),
(3019, 'MORAUJO', 'CE'),
(3018, 'MORADA NOVA DE MINAS', 'MG'),
(3017, 'MORADA NOVA', 'CE'),
(3016, 'MONTIVIDIU DO NORTE', 'GO'),
(3015, 'MONTIVIDIU', 'GO'),
(3014, 'MONTEZUMA', 'MG'),
(3013, 'MONTES CLAROS DE GOIÁS', 'GO'),
(3012, 'MONTES CLAROS', 'MG'),
(3011, 'MONTES ALTOS', 'MA'),
(3010, 'MONTENEGRO', 'RS'),
(3009, 'MONTEIRO LOBATO', 'SP'),
(3008, 'MONTEIRO', 'PB'),
(3007, 'MONTE SIÃO', 'MG'),
(3006, 'MONTE SANTO DE MINAS', 'MG'),
(3005, 'MONTE SANTO', 'BA'),
(3004, 'MONTE MOR', 'SP'),
(3003, 'MONTE HOREBE', 'PB'),
(3002, 'MONTE FORMOSO', 'MG'),
(3001, 'MONTE DO CARMO', 'TO'),
(3000, 'MONTE DAS GAMELEIRAS', 'RN'),
(2999, 'MONTE CASTELO', 'SC'),
(2998, 'MONTE CARMELO', 'MG'),
(2997, 'MONTE CARLO', 'SC'),
(2996, 'MONTE BELO DO SUL', 'RS'),
(2995, 'MONTE BELO', 'MG'),
(2994, 'MONTE AZUL PAULISTA', 'SP'),
(2993, 'MONTE AZUL', 'MG'),
(2992, 'MONTE APRAZIVEL', 'SP'),
(2991, 'MONTE ALTO', 'SP'),
(2990, 'MONTE ALEGRE DOS CAMPOS', 'RS'),
(2989, 'MONTE ALEGRE DO SUL', 'SP'),
(2988, 'MONTE ALEGRE DO PIAUÍ', 'PI'),
(2987, 'MONTE ALEGRE DE MINAS', 'MG'),
(2986, 'MONTE ALEGRE DE GOIÁS', 'GO'),
(2985, 'MONTE ALEGRE', 'SE'),
(2984, 'MONTE ALEGRE', 'PA'),
(2983, 'MONTAURI', 'RS'),
(2982, 'MONTANHAS', 'RN'),
(2981, 'MONTANHA', 'ES'),
(2980, 'MONTALVÂNIA', 'MG'),
(2979, 'MONTADAS', 'PB'),
(2978, 'MONSENHOR TABOSA', 'CE'),
(2977, 'MONSENHOR PAULO', 'MG'),
(2976, 'MONSENHOR HIPÓLITO', 'PI'),
(2975, 'MONSENHOR GIL', 'PI'),
(2974, 'MONJOLOS', 'MG'),
(2973, 'MONGAGUÁ', 'SP'),
(2972, 'MONDAI', 'SC'),
(2971, 'MONÇÕES', 'SP'),
(2970, 'MONCÃO', 'MA'),
(2969, 'MOMBUCA', 'SP'),
(2968, 'MOMBAÇA', 'CE'),
(2967, 'MOJU', 'PA'),
(2966, 'MOITA BONITA', 'SE'),
(2965, 'MOIPORA', 'GO'),
(2964, 'MOGI MIRIM', 'SP'),
(2963, 'MOGI GUAÇU', 'SP'),
(2962, 'MOGI DAS CRUZES', 'SP'),
(2961, 'MOGEIRO', 'PB'),
(2960, 'MOEMA', 'MG'),
(2959, 'MOEDA', 'MG'),
(2958, 'MODELO', 'SC'),
(2957, 'MOCOCA', 'SP'),
(2956, 'MOCAJUBA', 'PA'),
(2955, 'MISSÃO VELHA', 'CE'),
(2954, 'MISSAL', 'PR'),
(2953, 'MIRINZAL', 'MA'),
(2952, 'MIRIM DOCE', 'SC'),
(2951, 'MIRAVÂNIA', 'MG'),
(2950, 'MIRASSOLÂNDIA', 'SP'),
(2949, 'MIRASSOL D''OESTE', 'MT'),
(2948, 'MIRASSOL', 'SP'),
(2947, 'MIRASELVA', 'PR'),
(2946, 'MIRANTE DO PARANÁPANEMA', 'SP'),
(2945, 'MIRANTE DA SERRA', 'RO'),
(2944, 'MIRANTE', 'BA'),
(2943, 'MIRANORTE', 'TO'),
(2942, 'MIRANGABA', 'BA'),
(2941, 'MIRANDÓPOLIS', 'SP'),
(2940, 'MIRANDIBA', 'PE'),
(2939, 'MIRANDA DO NORTE', 'MA'),
(2938, 'MIRANDA', 'MS'),
(2937, 'MIRAÍMA', 'CE'),
(2936, 'MIRAÍ', 'MG'),
(2935, 'MIRÁGUAI', 'RS'),
(2934, 'MIRADOURO', 'MG'),
(2933, 'MIRADOR', 'PR'),
(2932, 'MIRADOR', 'MA'),
(2931, 'MIRACEMA DO TOCANTINS', 'TO'),
(2930, 'MIRACEMA', 'RJ'),
(2929, 'MIRACATU', 'SP'),
(2928, 'MIRABELA', 'MG'),
(2927, 'MIRA ESTRELA', 'SP'),
(2926, 'MINISTRO ANDRÉAZZA', 'RO'),
(2925, 'MINISTRO ANDRÉAZA', 'RO'),
(2924, 'MINEIROS DO TIETE', 'SP'),
(2923, 'MINEIROS', 'GO'),
(2922, 'MINDURI', 'MG'),
(2921, 'MINAS NOVAS', 'MG'),
(2920, 'MINAS DO LEÃO', 'RS'),
(2919, 'MINADOR DO NEGRÃO', 'AL'),
(2918, 'MINAÇU', 'GO'),
(2917, 'MIMOSO DO SUL', 'ES'),
(2916, 'MIMOSO DE GOIÁS', 'GO'),
(2915, 'MILTON BRANDÃO', 'PI'),
(2914, 'MILHA', 'CE'),
(2913, 'MILAGRES DO MARANHÃO', 'MA'),
(2912, 'MILAGRES', 'BA'),
(2911, 'MIGUELÓPOLIS', 'SP'),
(2910, 'MIGUEL PEREIRA', 'RJ'),
(2909, 'MIGUEL LEÃO', 'PI'),
(2908, 'MIGUEL CALMON', 'BA'),
(2907, 'MIGUEL ALVES', 'PI'),
(2906, 'MESSIAS TARGINO', 'RN'),
(2905, 'MESSIAS', 'AL'),
(2904, 'MESQUITA', 'MG'),
(2903, 'MESÓPOLIS', 'SP'),
(2902, 'MERUOCA', 'CE'),
(2901, 'MERIDIANO', 'SP'),
(2900, 'MERCES', 'MG'),
(2899, 'MERCEDES', 'PR'),
(2898, 'MENDONCA', 'SP'),
(2897, 'MENDES PIMENTEL', 'MG'),
(2896, 'MENDES', 'RJ'),
(2895, 'MELGACO', 'PA'),
(2894, 'MELEIRO', 'SC'),
(2893, 'MEDINA', 'MG'),
(2892, 'MEDICILÂNDIA', 'PA'),
(2891, 'MEDIANEIRA', 'PR'),
(2890, 'MEDEIROS NETO', 'BA'),
(2889, 'MEDEIROS', 'MG'),
(2888, 'MAZAGÃO', 'AP'),
(2887, 'MAXIMILIANO DE ALMEIDA', 'RS'),
(2886, 'MAXARANGUAPE', 'RN'),
(2885, 'MAURITI', 'CE'),
(2884, 'MAURILÂNDIA DO TOCANTINS', 'TO'),
(2883, 'MAURILÂNDIA', 'GO'),
(2882, 'MAUES', 'AM'),
(2881, 'MAUA DA SERRA', 'PR'),
(2880, 'MAUA', 'SP'),
(2879, 'MATUTINA', 'MG'),
(2878, 'MATUREIA', 'PB'),
(2877, 'MATUPA', 'MT'),
(2876, 'MATRIZ DE CAMARAGIBE', 'AL'),
(2875, 'MATRINCHA', 'GO'),
(2874, 'MATOZINHOS', 'MG'),
(2873, 'MATOS COSTA', 'SC'),
(2872, 'MATOES DO NORTE', 'MA'),
(2871, 'MATÕES', 'MA'),
(2870, 'MATO VERDE', 'MG'),
(2869, 'MATO RICO', 'PR'),
(2868, 'MATO LEITÃO', 'RS'),
(2867, 'MATO GROSSO', 'PB'),
(2866, 'MATO CASTELHANO', 'RS'),
(2865, 'MATIPO', 'MG'),
(2864, 'MATINHOS', 'PR'),
(2863, 'MATINHAS', 'PB'),
(2862, 'MATINHA', 'MA'),
(2861, 'MATINA', 'BA'),
(2860, 'MATIAS OLIMPIO', 'PI'),
(2859, 'MATIAS CARDOSO', 'MG'),
(2858, 'MATIAS BARBOSA', 'MG'),
(2857, 'MATHIAS LOBATO', 'MG'),
(2856, 'MATEUS LEME', 'MG'),
(2855, 'MATERLÂNDIA', 'MG'),
(2854, 'MATELÂNDIA', 'PR'),
(2853, 'MATEIROS', 'TO'),
(2852, 'MATARAÇA', 'PB'),
(2851, 'MATÃO', 'SP'),
(2850, 'MATA VERDE', 'MG'),
(2849, 'MATA ROMA', 'MA'),
(2848, 'MATA GRANDE', 'AL'),
(2847, 'MATA DE SÃO JOÃO', 'BA'),
(2846, 'MATA', 'RS'),
(2845, 'MASSARANDUBA', 'SC'),
(2844, 'MASSARANDUBA', 'PB'),
(2843, 'MASSAPE DO PIAUÍ', 'PI'),
(2842, 'MASSAPE', 'CE'),
(2841, 'MASCOTE', 'BA'),
(2840, 'MARZAGAO', 'GO'),
(2839, 'MARUMBI', 'PR'),
(2838, 'MARUIM', 'SE'),
(2837, 'MARTINS SOARES', 'MG'),
(2836, 'MARTINS', 'RN'),
(2835, 'MARTINÓPOLIS', 'SP'),
(2834, 'MARTINOPOLE', 'CE'),
(2833, 'MARTINHO CAMPOS', 'MG'),
(2832, 'MARQUINHO', 'PR'),
(2831, 'MARQUES DE SOUZA', 'RS'),
(2830, 'MARMELÓPOLIS', 'MG'),
(2829, 'MARMELEIRO', 'PR'),
(2828, 'MARLIERIA', 'MG'),
(2827, 'MARIZÓPOLIS', 'PB'),
(2826, 'MARITUBA', 'PA'),
(2825, 'MARIPA DE MINAS', 'MG'),
(2824, 'MARIPA', 'PR'),
(2823, 'MARIÓPOLIS', 'PR'),
(2822, 'MARIO CAMPOS', 'MG'),
(2821, 'MARINÓPOLIS', 'SP'),
(2820, 'MARINGÁ', 'PR'),
(2819, 'MARILUZ', 'PR'),
(2818, 'MARILIA', 'SP'),
(2817, 'MARILENA', 'PR'),
(2816, 'MARILÂNDIA DO SUL', 'PR'),
(2815, 'MARILÂNDIA', 'ES'),
(2814, 'MARILAC', 'MG'),
(2813, 'MARICÁ', 'RJ'),
(2812, 'MARIBONDO', 'AL'),
(2811, 'MARIAPOLIS', 'SP'),
(2810, 'MARIANÓPOLIS DO TOCANTINS', 'TO'),
(2809, 'MARIANO MORO', 'RS'),
(2808, 'MARIANA PIMENTEL', 'RS'),
(2807, 'MARIANA', 'MG'),
(2806, 'MARIALVA', 'PR'),
(2805, 'MARIA HELENA', 'PR'),
(2804, 'MARIA DA FE', 'MG'),
(2803, 'MARI', 'PB'),
(2802, 'MAREMA', 'SC'),
(2801, 'MARECHAL TRAUMATURGO', 'AC'),
(2800, 'MARECHAL FLORIANO', 'ES'),
(2799, 'MARECHAL DEODORO', 'AL'),
(2798, 'MARECHAL CÂNDIDO RONDON', 'PR'),
(2797, 'MARCOS PARENTE', 'PI'),
(2796, 'MARCOLÂNDIA', 'PI'),
(2795, 'MARCO', 'CE'),
(2794, 'MARCIONILIO SOUZA', 'BA'),
(2793, 'MARCELINO VIEIRA', 'RN'),
(2792, 'MARCELINO RAMOS', 'RS'),
(2791, 'MARCELÂNDIA', 'MT'),
(2790, 'MARCAÇÃO', 'PB'),
(2789, 'MARAVILHAS', 'MG'),
(2788, 'MARAVILHA', 'AL'),
(2787, 'MARAÚ', 'BA'),
(2786, 'MARATAIZES', 'ES'),
(2785, 'MARATÁ', 'RS'),
(2784, 'MARAPOAMA', 'SP'),
(2783, 'MARAPANIM', 'PA'),
(2782, 'MARANHÃOZINHO', 'MA'),
(2781, 'MARANGUAPE', 'CE'),
(2780, 'MARANDIBA', 'PE'),
(2779, 'MARAJA DO SENA', 'MA'),
(2778, 'MARAIAL', 'PE'),
(2777, 'MARAGOJIPE', 'BA'),
(2776, 'MARAGOGI', 'AL'),
(2775, 'MARAÇAS', 'BA'),
(2774, 'MARAÇANAU', 'CE'),
(2773, 'MARACANÃ', 'PA'),
(2772, 'MARACAJU', 'MS'),
(2771, 'MARAÇAJA', 'SC'),
(2770, 'MARAÇAI', 'SP'),
(2769, 'MARAÇAÇUME', 'MA'),
(2768, 'MARABA PAULISTA', 'SP'),
(2767, 'MARABA', 'PA'),
(2766, 'MARAA', 'AM'),
(2765, 'MARA ROSA', 'GO'),
(2764, 'MAR DE ESPANHA', 'MG'),
(2763, 'MAQUINÉ', 'RS'),
(2762, 'MANTENÓPOLIS', 'ES'),
(2761, 'MANTENA', 'MG'),
(2760, 'MANSIDÃO', 'BA'),
(2759, 'MANOEL VITORINO', 'BA'),
(2758, 'MANOEL VIANA', 'RS'),
(2757, 'MANOEL URBANO', 'AC'),
(2756, 'MANOEL RIBAS', 'PR'),
(2755, 'MANOEL EMÍDIO', 'PI'),
(2754, 'MANICORE', 'AM'),
(2753, 'MANHUMIRIM', 'MG'),
(2752, 'MANHUAÇU', 'MG'),
(2751, 'MANGUEIRINHA', 'PR'),
(2750, 'MANGARATIBA', 'RJ'),
(2749, 'MANGA', 'MG'),
(2748, 'MANFRINÓPOLIS', 'PR'),
(2747, 'MANDURI', 'SP'),
(2746, 'MANDIRITUBA', 'PR'),
(2745, 'MANDAGUARI', 'PR'),
(2744, 'MANDÁGUAÇU', 'PR'),
(2743, 'MÂNCIO LIMA', 'AC'),
(2742, 'MANAUS', 'AM'),
(2741, 'MANARI', 'PE'),
(2740, 'MANAQUIRI', 'AM'),
(2739, 'MANAÍRA', 'PB'),
(2738, 'MANACAPURU', 'AM'),
(2737, 'MAMPITUBA', 'RS'),
(2736, 'MAMONAS', 'MG'),
(2735, 'MAMBORÊ', 'PR'),
(2734, 'MAMBAÍ', 'GO'),
(2733, 'MAMANGUAPE', 'PB'),
(2732, 'MALTA', 'PB'),
(2731, 'MALLET', 'PR'),
(2730, 'MALHADOR', 'SE'),
(2729, 'MALHADA DOS BOIS', 'SE'),
(2728, 'MALHADA DE PEDRAS', 'BA'),
(2727, 'MALHADA', 'BA'),
(2726, 'MALACACHETA', 'MG'),
(2725, 'MAJOR VIEIRA', 'SC'),
(2724, 'MAJOR SALES', 'RN'),
(2723, 'MAJOR ISIDORO', 'AL'),
(2722, 'MAJOR GERCINO', 'SC'),
(2721, 'MAIRIPOTABA', 'GO'),
(2720, 'MAIRIPORA', 'SP'),
(2719, 'MAIRINQUE', 'SP'),
(2718, 'MAIRI', 'BA'),
(2717, 'MAIQUINIQUE', 'BA'),
(2716, 'MAGÉ', 'RJ'),
(2715, 'MAGDA', 'SP'),
(2714, 'MAGALHAES DE ALMEIDA', 'MA'),
(2713, 'MAGALHÃES BARATA', 'PA'),
(2712, 'MAFRA', 'SC'),
(2711, 'MAETINGA', 'BA'),
(2710, 'MAE DO RIO', 'PA'),
(2709, 'MAE DA ÁGUA', 'PB'),
(2708, 'MADRE DE DEUS DE MINAS', 'MG'),
(2707, 'MADRE DE DEUS', 'BA'),
(2706, 'MADEIRO', 'PI'),
(2705, 'MADALENA', 'CE'),
(2704, 'MAÇURURE', 'BA'),
(2703, 'MACUCO', 'RJ'),
(2702, 'MACIEIRA', 'SC'),
(2701, 'MACHALIS', 'MG'),
(2700, 'MACHADOS', 'PE'),
(2699, 'MACHADO', 'MG'),
(2698, 'MACHADINHO DO OESTE', 'RO'),
(2697, 'MACHADINHO', 'RS'),
(2696, 'MACHACALIS', 'MG'),
(2695, 'MACEIÓ', 'AL'),
(2694, 'MACEDÔNIA', 'SP'),
(2693, 'MACÊDO', 'PI'),
(2692, 'MACAUBAS', 'BA'),
(2691, 'MACAUBAL', 'SP'),
(2690, 'MACAU', 'RN'),
(2689, 'MACATUBA', 'SP'),
(2688, 'MACARANI', 'BA'),
(2687, 'MACAPARANÁ', 'PE'),
(2686, 'MACAPÁ', 'AP'),
(2685, 'MACAMBIRA', 'SE'),
(2684, 'MACAMBARA', 'RS'),
(2683, 'MACAJUBA', 'BA'),
(2682, 'MACAIBA', 'RN'),
(2681, 'MACAÉ', 'RJ'),
(2680, 'LUZINÓPOLIS', 'TO'),
(2679, 'LUZILÂNDIA', 'PI'),
(2678, 'LUZIANIA', 'GO'),
(2677, 'LUZERNA', 'SC'),
(2676, 'LUZ', 'MG'),
(2675, 'LUTÉCIA', 'SP'),
(2674, 'LUPIONÓPOLIS', 'PR'),
(2673, 'LUPERCIO', 'SP'),
(2672, 'LUNARDELLI', 'PR'),
(2671, 'LUMINÁRIAS', 'MG'),
(2670, 'LUIZ CORREIA', 'PI'),
(2669, 'LUIZ ANTÔNIO', 'SP'),
(2668, 'LUISIANIA', 'SP'),
(2667, 'LUIZIANA', 'PR'),
(2666, 'LUIS GOMES', 'RN'),
(2665, 'LUIS DOMINGUES', 'MA'),
(2664, 'LUIS ALVES', 'SC'),
(2663, 'LUGAR CEDRO', 'MA'),
(2662, 'LUCRECIA', 'RN'),
(2661, 'LUCIARA', 'MT'),
(2660, 'LUCIANÓPOLIS', 'SP'),
(2659, 'LUCENA', 'PB'),
(2658, 'LUCELIA', 'SP'),
(2657, 'LUCAS DO RIO VERDE', 'MT'),
(2656, 'LOUVEIRA', 'SP'),
(2655, 'LOURDES', 'SP'),
(2654, 'LORETO', 'MA'),
(2653, 'LORENA', 'SP'),
(2652, 'LONTRAS', 'SC'),
(2651, 'LONTRA', 'MG'),
(2650, 'LONDRINA', 'PR'),
(2649, 'LOGRADOURO', 'PB'),
(2648, 'LOBATO', 'PR'),
(2647, 'LOANDA', 'PR'),
(2646, 'LIZARDA', 'TO'),
(2645, 'LIVRAMENTO', 'PB'),
(2644, 'LIV DE NOSSA SENHORA', 'BA'),
(2643, 'LINS', 'SP'),
(2642, 'LINHARES', 'ES'),
(2641, 'LINHA NOVA', 'RS'),
(2640, 'LINDOLFO COLLOR', 'RS'),
(2639, 'LINDOIA DO SUL', 'SC'),
(2638, 'LINDÓIA', 'SP'),
(2637, 'LINDOESTE', 'PR'),
(2636, 'LIMOEIRO DO NORTE', 'CE'),
(2635, 'LIMOEIRO DO AJURU', 'PA'),
(2634, 'LIMOEIRO DE ANADIA', 'AL'),
(2633, 'LIMOEIRO', 'PE'),
(2632, 'LIMEIRA DO OESTE', 'MG'),
(2631, 'LIMEIRA', 'SP'),
(2630, 'LIMA DUARTE', 'MG'),
(2629, 'LIMA CAMPOS', 'MA'),
(2628, 'LIDIANÓPOLIS', 'PR'),
(2627, 'LICINIO DE ALMEIDA', 'BA'),
(2626, 'LIBERDADE', 'MG'),
(2625, 'LIBERATO SALZANO', 'RS'),
(2624, 'LEÓPOLIS', 'PR'),
(2623, 'LEOPOLDO DE BULHOES', 'GO'),
(2622, 'LEOPOLDINA', 'MG'),
(2621, 'LEOBERTO LEAL', 'SC'),
(2620, 'LENÇÓIS PAULISTA', 'SP'),
(2619, 'LENÇÓIS', 'BA'),
(2618, 'LEME DO PRADO', 'MG'),
(2617, 'LEME', 'SP'),
(2616, 'LEBON REGIS', 'SC'),
(2615, 'LEANDRO FERREIRA', 'MG'),
(2614, 'LAVRINHAS', 'SP'),
(2613, 'LAVRAS DO SUL', 'RS'),
(2612, 'LAVRAS DA MANGABEIRA', 'CE'),
(2611, 'LAVRAS', 'MG'),
(2610, 'LAVINIA', 'SP'),
(2609, 'LAVANDEIRA', 'TO'),
(2608, 'LAURO MULLER', 'SC'),
(2607, 'LAURO DE FREITAS', 'BA'),
(2606, 'LAURENTINO', 'SC'),
(2605, 'LASTRO', 'PB'),
(2604, 'LASSANCE', 'MG'),
(2603, 'LARANJEIRAS', 'SE'),
(2602, 'LARANJAL PAULISTA', 'SP'),
(2601, 'LARANJAL DO JARI', 'AP'),
(2600, 'LARANJAL', 'MG'),
(2599, 'LARANJA DA TERRA', 'ES'),
(2598, 'LAPÃO', 'BA'),
(2597, 'LAPA', 'PR'),
(2596, 'LANDRI SALES', 'PI'),
(2595, 'LAMIM', 'MG'),
(2594, 'LAMBARI DO OESTE', 'MT'),
(2593, 'LAMBARI', 'MG'),
(2592, 'LAMARÃO', 'BA'),
(2591, 'LAJINHA', 'MG'),
(2590, 'LAJES PINTADAS', 'RN'),
(2589, 'LAJEDO DO TABOCAL', 'BA'),
(2588, 'LAJEDO', 'PE'),
(2587, 'LAJEDINHO', 'BA'),
(2586, 'LAJEDÃO', 'BA'),
(2585, 'LAJEADO NOVO', 'MA'),
(2584, 'LAJEADO GRANDE', 'SC'),
(2583, 'LAJEADO DO BUGRE', 'RS'),
(2582, 'LAJEADO', 'RS'),
(2581, 'LAJE DO MURIAÉ', 'RJ'),
(2580, 'LAGUNA CARAPÃ', 'MS'),
(2579, 'LAGUNA', 'SC'),
(2578, 'LAGOINHA DO PIAUÍ', 'PI'),
(2577, 'LAGOINHA', 'SP'),
(2576, 'LAGOAO', 'RS'),
(2575, 'LAGOA VERMELHA', 'RS'),
(2574, 'LAGOA SECA', 'PB'),
(2573, 'LAGOA SANTA', 'MG'),
(2572, 'LAGOA SALGADA', 'RN'),
(2571, 'LAGOA REAL', 'BA'),
(2570, 'LAGOA NOVA', 'RN'),
(2569, 'LAGOA GRANDE DO MARANHÃO', 'MA'),
(2568, 'LAGOA GRANDE', 'MG'),
(2567, 'LAGOA FORMOSA', 'MG'),
(2566, 'LAGOA DOURADA', 'MG'),
(2565, 'LAGOA DOS TRÊS CANTOS', 'RS'),
(2564, 'IRACEMA', 'RR'),
(2563, 'LAGOA DOS PATOS', 'MG'),
(2562, 'LAGOA DOS GATOS', 'PE'),
(2561, 'LAGOA DO TOCANTINS', 'TO'),
(2560, 'LAGOA DO SITIO', 'PI'),
(2559, 'LAGOA DO OURO', 'PE'),
(2558, 'LAGOA DO CARRO', 'PE'),
(2557, 'LAGOA DO BARRO DO PIAUÍ', 'PI'),
(2556, 'LAGOA DO  PIAUÍ', 'PI'),
(2555, 'LAGOA DE VELHOS', 'RN'),
(2554, 'LAGOA DE SÃO FRANCISCO', 'PI'),
(2553, 'LAGOA DE PEDRAS', 'RN'),
(2552, 'LAGOA DE ITAENGA', 'PE'),
(2551, 'LAGOA DE DENTRO', 'PB'),
(2550, 'LAGOA D''ANTA', 'RN'),
(2549, 'LAGOA DA PRATA', 'MG'),
(2548, 'LAGOA DA CONFUSÃO', 'TO'),
(2547, 'LAGOA DA CANOA', 'AL'),
(2546, 'LAGOA ALEGRE', 'PI'),
(2545, 'LAGOA', 'PB'),
(2544, 'LAGO VERDE', 'MA'),
(2543, 'LAGO DOS RODRIGUES', 'MA'),
(2542, 'LAGO DO MATO', 'MA'),
(2541, 'LAGO DO JUNCO', 'MA'),
(2540, 'LAGO DA PEDRA', 'MA'),
(2539, 'LAGES', 'RN'),
(2538, 'LAGEADO', 'TO'),
(2537, 'LAGE', 'BA'),
(2536, 'LAGARTO', 'SE'),
(2535, 'LAGAMAR', 'MG'),
(2534, 'LAFAIETE COUTINHO', 'BA'),
(2533, 'LADÁRIO', 'MS'),
(2532, 'LADAINHA', 'MG'),
(2531, 'LACERDÓPOLIS', 'SC'),
(2530, 'JURUBEBA', 'AM'),
(2529, 'KALORÉ', 'PR'),
(2528, 'JUTI', 'MS'),
(2527, 'JUTAÍ', 'AM'),
(2526, 'JUSSIAPE', 'BA'),
(2525, 'JUSSARI', 'BA'),
(2524, 'JUSSARA', 'PR'),
(2523, 'JUSSARA', 'GO'),
(2522, 'JUSCIMEIRA', 'MT'),
(2521, 'JURUTI', 'PA'),
(2520, 'JURUENA', 'MT'),
(2519, 'JURUAIA', 'MG'),
(2518, 'JURUA', 'AM'),
(2517, 'JURU', 'PB'),
(2516, 'JURIPIRANGA', 'PB'),
(2515, 'JUREMA', 'PE'),
(2514, 'JURANDA', 'PR'),
(2513, 'JURAMENTO', 'MG'),
(2512, 'JUQUITIBA', 'SP'),
(2511, 'JUQUIÁ', 'SP'),
(2510, 'JUPIÁ', 'SC'),
(2509, 'JUPI', 'PE'),
(2508, 'JUNQUEIRÓPOLIS', 'SP'),
(2507, 'JUNQUEIRO', 'AL'),
(2506, 'JUNDIAI DO SUL', 'PR'),
(2505, 'JUNDIAI', 'SP'),
(2504, 'JUNDIA', 'AL'),
(2503, 'JUNCO DO SERIDO', 'PB'),
(2502, 'JUNCO DO MARANHÃO', 'MA'),
(2501, 'JUMIRIM', 'SP'),
(2500, 'JÚLIO MESQUITA', 'SP'),
(2499, 'JÚLIO DE CASTILHOS', 'RS'),
(2498, 'JULIO BORGES', 'PI'),
(2497, 'JUIZ DE FORA', 'MG'),
(2496, 'JUÍNA', 'MT'),
(2495, 'JUCURUTU', 'RN'),
(2494, 'JUCURUÇU', 'BA'),
(2493, 'JUCATI', 'PE'),
(2492, 'JUCAS', 'CE'),
(2491, 'JUAZEIRO DO PIAUÍ', 'PI'),
(2490, 'JUAZEIRO DO NORTE', 'CE'),
(2489, 'JUAZEIRO', 'BA'),
(2488, 'JUAZEIRINHO', 'PB'),
(2487, 'JUATUBA', 'MG'),
(2486, 'JUARINA', 'TO'),
(2485, 'JUAREZ TAVORA', 'PB'),
(2484, 'JUARA', 'MT'),
(2483, 'JOVIÂNIA', 'GO'),
(2482, 'JOSENÓPOLIS', 'MG'),
(2481, 'JOSÉLÂNDIA', 'MA'),
(2480, 'JOSÉ RAYDAN', 'MG'),
(2479, 'JOSÉ GONÇALVES DE MINAS', 'MG'),
(2478, 'JOSÉ DE FREITAS', 'PI'),
(2477, 'JOSÉ DA PENHA', 'RN'),
(2476, 'JOSÉ BONIFACIO', 'SP'),
(2475, 'JOSÉ BOITEUX', 'SC'),
(2474, 'JORDÃO', 'AC'),
(2473, 'JORDANIA', 'MG'),
(2472, 'JOINVILLE', 'SC'),
(2471, 'JOIA', 'RS'),
(2470, 'JOCA MARQUES', 'PI'),
(2469, 'JOAQUIM TAVORA', 'PR'),
(2468, 'JOAQUIM PIRES', 'PI'),
(2467, 'JOAQUIM NABUCO', 'PE'),
(2466, 'JOAQUIM GOMES', 'AL'),
(2465, 'JOAQUIM FELICIO', 'MG'),
(2464, 'JOÃO RAMALHO', 'SP'),
(2463, 'JOÃO PINHEIRO', 'MG'),
(2462, 'JOÃO PESSOA', 'PB');
INSERT INTO `municipios` (`codigo`, `nome`, `uf`) VALUES
(2461, 'JOÃO NEIVA', 'ES'),
(2460, 'JOÃO MONLEVADE', 'MG'),
(2459, 'JOÃO LISBOA', 'MA'),
(2458, 'JOÃO DOURADO', 'BA'),
(2457, 'JOÃO DIAS', 'RN'),
(2456, 'JOÃO COSTA', 'PI'),
(2455, 'JOÃO CÂMARA', 'RN'),
(2454, 'JOÃO ALFREDO', 'PE'),
(2453, 'JOANÓPOLIS', 'SP'),
(2452, 'JOANÉSIA', 'MG'),
(2451, 'JOAIMA', 'MG'),
(2450, 'JOAÇABA', 'SC'),
(2449, 'JITAUMA', 'BA'),
(2448, 'JIQUIRICA', 'BA'),
(2447, 'JI-PARANÁ', 'RO'),
(2446, 'JIJOCA', 'CE'),
(2445, 'JESUPOLIS', 'GO'),
(2444, 'JESUITAS', 'PR'),
(2443, 'JESUANIA', 'MG'),
(2442, 'JERUMENHA', 'PI'),
(2441, 'JERONIMO MONTEIRO', 'ES'),
(2440, 'JERIQUARA', 'SP'),
(2439, 'JERICÓ', 'PB'),
(2438, 'JEREMOABO', 'BA'),
(2437, 'JEQUITINHONHA', 'MG'),
(2436, 'JEQUITIBÁ', 'MG'),
(2435, 'JEQUITAÍ', 'MG'),
(2434, 'JEQUIE', 'BA'),
(2433, 'JEQUERI', 'MG'),
(2432, 'JENIPAPO DOS VIEIRAS', 'MA'),
(2431, 'JENIPAPO DE MINAS', 'MG'),
(2430, 'JECEABA', 'MG'),
(2429, 'JAURU', 'MT'),
(2428, 'JAUPACI', 'GO'),
(2427, 'JAU DO TOCANTINS', 'TO'),
(2426, 'JAÚ DO TOCANTINS', 'TO'),
(2425, 'JATOBA DO PIAUÍ', 'PI'),
(2424, 'JATOBÁ', 'MA'),
(2423, 'JATI', 'CE'),
(2422, 'JATEI', 'MS'),
(2421, 'JATAUBA', 'PE'),
(2420, 'JATAIZINHO', 'PR'),
(2419, 'JATAI', 'GO'),
(2418, 'JARU', 'RO'),
(2417, 'JARINU', 'SP'),
(2416, 'JARI', 'RS'),
(2415, 'JARDINÓPOLIS', 'SC'),
(2414, 'JARDIM SERIDO', 'RN'),
(2413, 'JARDIM OLINDA', 'PR'),
(2412, 'JARDIM DE PIRANHAS', 'RN'),
(2411, 'JARDIM DE MULATO', 'PI'),
(2410, 'JARDIM DE ANGICOS', 'RN'),
(2409, 'JARDIM ALEGRE', 'PR'),
(2408, 'JARDIM', 'CE'),
(2407, 'JARAMATAIA', 'AL'),
(2406, 'JARAGUARI', 'MS'),
(2405, 'JARÁGUA DO SUL', 'SC'),
(2404, 'JARÁGUA', 'GO'),
(2403, 'JAQUIRANA', 'RS'),
(2402, 'JAQUEIRA', 'PE'),
(2401, 'JAQUARIPE', 'BA'),
(2400, 'JAPURA', 'AM'),
(2399, 'JAPORÃ', 'MS'),
(2398, 'JAPOATÃ', 'SE'),
(2397, 'JAPIRA', 'PR'),
(2396, 'JAPI', 'RN'),
(2395, 'JAPERI', 'RJ'),
(2394, 'JAPARATUBA', 'SE'),
(2393, 'JAPARATINGA', 'AL'),
(2392, 'JAPARAÍBA', 'MG'),
(2391, 'JANUARIA', 'MG'),
(2390, 'JANIÓPOLIS', 'PR'),
(2389, 'JANGADA', 'MT'),
(2388, 'JANDUIS', 'RN'),
(2387, 'JANDIRA', 'SP'),
(2386, 'JANDAÍRA', 'BA'),
(2385, 'JANDAIA DO SUL', 'PR'),
(2384, 'JANDAIA', 'GO'),
(2383, 'JANAÚBA', 'MG'),
(2382, 'JAMPRUCA', 'MG'),
(2381, 'JAMBEIRO', 'SP'),
(2380, 'JAMARI', 'RO'),
(2379, 'JALES', 'SP'),
(2378, 'JAICOS', 'PI'),
(2377, 'JAÍBA', 'MG'),
(2376, 'JÁGUARUNA', 'SC'),
(2375, 'JÁGUARUANA', 'CE'),
(2374, 'JÁGUARIUNA', 'SP'),
(2373, 'JÁGUARIBE', 'CE'),
(2372, 'JÁGUARIBARA', 'CE'),
(2371, 'JAGUARIAÍVA', 'PR'),
(2370, 'JÁGUARI', 'RS'),
(2369, 'JÁGUARETAMA', 'CE'),
(2368, 'JÁGUARE', 'ES'),
(2367, 'JAGUARARI', 'BA'),
(2366, 'JAGUARÃO', 'RS'),
(2365, 'JÁGUARAÇU', 'MG'),
(2364, 'JÁGUAQUARA', 'BA'),
(2363, 'JÁGUAPITA', 'PR'),
(2362, 'JAÇUTINGA', 'MG'),
(2361, 'JACUTINGA', 'RS'),
(2360, 'JACUPIRANGA', 'SP'),
(2359, 'JAÇUNDA', 'PA'),
(2358, 'JAÇUI', 'MG'),
(2357, 'JACOBINA DO PIAUÍ', 'PI'),
(2356, 'JACOBINA', 'BA'),
(2355, 'JACINTO MACHADO', 'SC'),
(2354, 'JACINTO', 'MG'),
(2353, 'JACIARA', 'MT'),
(2352, 'JACI', 'SP'),
(2351, 'JACARÉZINHO', 'PR'),
(2350, 'JACARÉÍ', 'SP'),
(2349, 'JACARÉACANGA', 'PA'),
(2348, 'JACARÉ DOS HOMENS', 'AL'),
(2347, 'JACARAU', 'PB'),
(2346, 'JACARACI', 'BA'),
(2345, 'JACANA', 'RN'),
(2344, 'JABOTICATUBAS', 'MG'),
(2343, 'JABOTICABAL', 'SP'),
(2342, 'JABOTICABA', 'RS'),
(2341, 'JABOTI', 'PR'),
(2340, 'JABORANDI', 'BA'),
(2339, 'JABORA', 'SC'),
(2338, 'JABOATÃO DOS GUARARAPES', 'PE'),
(2337, 'IVOTI', 'RS'),
(2336, 'IVORA', 'RS'),
(2335, 'IVOLÂNDIA', 'GO'),
(2334, 'IVINHEMA', 'MS'),
(2333, 'IVATUBA', 'PR'),
(2332, 'IVATE', 'PR'),
(2331, 'IVAIPORÃ', 'PR'),
(2330, 'IVAÍ', 'PR'),
(2329, 'IUNA', 'ES'),
(2328, 'IUIU', 'BA'),
(2327, 'ITUVERAVA', 'SP'),
(2326, 'ITUTINGA', 'MG'),
(2325, 'ITURAMA', 'MG'),
(2324, 'ITUPORANGA', 'SC'),
(2323, 'ITUPIRANGA', 'PA'),
(2322, 'ITUPEVA', 'SP'),
(2321, 'ITUMIRIM', 'MG'),
(2320, 'ITUMBIARA', 'GO'),
(2319, 'ITUIUTABA', 'MG'),
(2318, 'ITUETA', 'MG'),
(2317, 'ITUBERA', 'BA'),
(2316, 'ITUAÇU', 'BA'),
(2315, 'ITU', 'SP'),
(2314, 'ITORORO', 'BA'),
(2313, 'ITOBI', 'SP'),
(2312, 'ITIÚBA', 'BA'),
(2311, 'ITIRUÇU', 'BA'),
(2310, 'ITIRAPUA', 'SP'),
(2309, 'ITIRAPINA', 'SP'),
(2308, 'ITIQUIRA', 'MT'),
(2307, 'ITINGA DO MARANHÃO', 'MA'),
(2306, 'ITINGA', 'MG'),
(2305, 'ITAVERAVA', 'MG'),
(2304, 'ITAÚNA DO SUL', 'PR'),
(2303, 'ITAUNA', 'MG'),
(2302, 'ITAUEIRA', 'PI'),
(2301, 'ITAUCU', 'GO'),
(2300, 'ITAUBAL', 'AP'),
(2299, 'ITAÚBA', 'MT'),
(2298, 'ITAU DE MINAS', 'MG'),
(2297, 'ITAU', 'RN'),
(2296, 'ITATUBA', 'PB'),
(2295, 'ITATIRA', 'CE'),
(2294, 'ITATINGA', 'SP'),
(2293, 'ITATIM', 'BA'),
(2292, 'ITATIBA DO SUL', 'RS'),
(2291, 'ITATIBA', 'SP'),
(2290, 'ITATIAIUCU', 'MG'),
(2289, 'ITATIAIA', 'RJ'),
(2288, 'ITATI', 'PR'),
(2287, 'ITARUMA', 'GO'),
(2286, 'ITARIRI', 'SP'),
(2285, 'ITAREMA', 'CE'),
(2284, 'ITARARE', 'SP'),
(2283, 'ITARANTIM', 'BA'),
(2282, 'ITARANA', 'ES'),
(2281, 'ITAQUITINGA', 'PE'),
(2280, 'ITAQUIRAÍ', 'MS'),
(2279, 'ITAQUI', 'RS'),
(2278, 'ITAQUARA', 'BA'),
(2277, 'ITAQUAQUECETUBA', 'SP'),
(2276, 'ITAPURANGA', 'GO'),
(2275, 'ITAPURA', 'SP'),
(2274, 'ITAPUI', 'SP'),
(2273, 'ITAPUCA', 'RS'),
(2272, 'ITAPOROROCA', 'PB'),
(2271, 'ITAPORANGA D''AJUDA', 'SE'),
(2270, 'ITAPORANGA', 'SP'),
(2269, 'ITAPORANGA', 'PB'),
(2268, 'ITAPORA DO TOCANTINS', 'TO'),
(2267, 'ITAPORÃ', 'MS'),
(2266, 'ITÁPOLIS', 'SP'),
(2265, 'ITAPOA DO OESTE', 'RO'),
(2264, 'ITAPOÃ', 'SC'),
(2263, 'ITAPIUNA', 'CE'),
(2262, 'ITAPITANGA', 'BA'),
(2261, 'ITAPISSUMA', 'PE'),
(2260, 'ITAPIRATINS', 'TO'),
(2259, 'ITAPIRAPUÃ PAULISTA', 'SP'),
(2258, 'ITAPIRAPUA', 'GO'),
(2257, 'ITAPIRANGA', 'AM'),
(2256, 'ITAPIRA', 'SP'),
(2255, 'ITAPIPOCA', 'CE'),
(2254, 'ITAPICURU', 'BA'),
(2253, 'ITAPEVI', 'SP'),
(2252, 'ITAPEVA', 'SP'),
(2251, 'ITAPEVA', 'MG'),
(2250, 'ITAPETININGA', 'SP'),
(2249, 'ITAPETINGA', 'BA'),
(2248, 'ITAPETIM', 'PE'),
(2247, 'ITAPERUNA', 'RJ'),
(2246, 'ITAPERUCU', 'PR'),
(2245, 'ITAPEMIRIM', 'ES'),
(2244, 'ITAPEMA', 'SC'),
(2243, 'ITAPEJARA DO OESTE', 'PR'),
(2242, 'ITAPECURU-MIRIM', 'MA'),
(2241, 'ITAPECERICA DA SERRA', 'SP'),
(2240, 'ITAPECERICA', 'MG'),
(2239, 'ITAPEBI', 'BA'),
(2238, 'ITAPÉ', 'BA'),
(2237, 'ITAPARICA', 'BA'),
(2236, 'ITAPAJE', 'CE'),
(2235, 'ITAPAGIPE', 'MG'),
(2234, 'ITAPACI', 'GO'),
(2233, 'ITAÓCA', 'SP'),
(2232, 'ITAOBIM', 'MG'),
(2231, 'ITANHOMI', 'MG'),
(2230, 'ITANHÉM', 'BA'),
(2229, 'ITANHANDU', 'MG'),
(2228, 'ITANHAEM', 'SP'),
(2227, 'ITANAGRA', 'BA'),
(2226, 'ITAMONTE', 'MG'),
(2225, 'ITAMOGI', 'MG'),
(2224, 'ITAMBE DO MATO DENTRO', 'MG'),
(2223, 'ITAMBÉ', 'BA'),
(2222, 'ITAMBARAÇA', 'PR'),
(2221, 'ITAMBAÇURI', 'MG'),
(2220, 'ITAMARI', 'BA'),
(2219, 'ITAMARATI DE MINAS', 'MG'),
(2218, 'ITAMARATI', 'AM'),
(2217, 'ITAMARANDIBA', 'MG'),
(2216, 'ITAMARAJU', 'BA'),
(2215, 'ITAMARAÇA', 'PE'),
(2214, 'ITAMAGNA', 'BA'),
(2213, 'ITALVA', 'RJ'),
(2212, 'ITAJUIPE', 'BA'),
(2211, 'ITAJUBA', 'MG'),
(2210, 'ITAJU DO COLONIA', 'BA'),
(2209, 'ITAJU', 'SP'),
(2208, 'ITAJOBI', 'SP'),
(2207, 'ITAJAI', 'SC'),
(2206, 'ITAJA', 'GO'),
(2205, 'ITAITUBA', 'PA'),
(2204, 'ITAITINGA', 'CE'),
(2203, 'ITAIPULÂNDIA', 'PR'),
(2202, 'ITAIPÉ', 'MG'),
(2201, 'ITAIPAVA DO GRAJAU', 'MA'),
(2200, 'ITAIÓPOLIS', 'SC'),
(2199, 'ITAINÓPOLIS', 'PI'),
(2198, 'ITAICABA', 'CE'),
(2197, 'ITAÍBA', 'PE'),
(2196, 'ITAI', 'SP'),
(2195, 'ITÁGUATINS', 'TO'),
(2194, 'ITÁGUARU', 'GO'),
(2193, 'ITAGUARI', 'GO'),
(2192, 'ITÁGUARA', 'MG'),
(2191, 'ITAGUAJÉ', 'PR'),
(2190, 'ITAGUAÍ', 'RJ'),
(2189, 'ITÁGUAÇU DA BAHIA', 'BA'),
(2188, 'ITAGUAÇU', 'ES'),
(2187, 'ITAGIMIRIM', 'BA'),
(2186, 'ITAGIBA', 'BA'),
(2185, 'ITAGI', 'BA'),
(2184, 'ITAETE', 'BA'),
(2183, 'ITAÇURUBI', 'RS'),
(2182, 'ITACURUBA', 'PE'),
(2181, 'ITACOATIARA', 'AM'),
(2180, 'ITACARÉ', 'BA'),
(2179, 'ITACARAMBI', 'MG'),
(2178, 'ITACAMBIRA', 'MG'),
(2177, 'ITACAJA', 'TO'),
(2176, 'ITABUNA', 'BA'),
(2175, 'ITABORAÍ', 'RJ'),
(2174, 'ITABIRITO', 'MG'),
(2173, 'ITABIRINHA DE MANTENA', 'MG'),
(2172, 'ITABIRA', 'MG'),
(2171, 'ITABI', 'SE'),
(2170, 'ITABERAI', 'GO'),
(2169, 'ITABERABA', 'BA'),
(2168, 'ITABERA', 'SP'),
(2167, 'ITABELA', 'BA'),
(2166, 'ITABAIANINHA', 'SE'),
(2165, 'ITABAIANA', 'SE'),
(2164, 'ITABAIANA', 'PB'),
(2163, 'ITAARA', 'RS'),
(2162, 'ITA', 'SC'),
(2161, 'ISRAELÂNDIA', 'GO'),
(2160, 'ISAIAS COELHO', 'PI'),
(2159, 'IRUPI', 'ES'),
(2158, 'IRITUIA', 'PA'),
(2157, 'IRINEÓPOLIS', 'SC'),
(2156, 'IRETAMA', 'PR'),
(2155, 'IRECE', 'BA'),
(2154, 'IRAUCUBA', 'CE'),
(2153, 'IRATI', 'PR'),
(2152, 'IRARA', 'BA'),
(2151, 'IRAPURU', 'SP'),
(2150, 'IRAPUA', 'SP'),
(2149, 'IRANI', 'SC'),
(2148, 'IRANDUBA', 'AM'),
(2147, 'IRAMUTA', 'RR'),
(2146, 'IRAMAIA', 'BA'),
(2145, 'IRAJUBA', 'BA'),
(2144, 'IRAÍ DE MINAS', 'MG'),
(2143, 'IRAÍ', 'RS'),
(2142, 'IRACEMINHA', 'SC'),
(2141, 'IRACEMAPOLIS', 'SP'),
(2140, 'IRACEMA DO OESTE', 'PR'),
(2139, 'IRACEMA', 'CE'),
(2138, 'IPUPIARA', 'BA'),
(2137, 'IPUMIRIM', 'SC'),
(2136, 'IPUIUNA', 'MG'),
(2135, 'IPUEIRAS', 'CE'),
(2134, 'IPUEIRA', 'RN'),
(2133, 'IPUBI', 'PE'),
(2132, 'IPUAÇU', 'SC'),
(2131, 'IPUA', 'SP'),
(2130, 'IPU', 'CE'),
(2129, 'IPORANGA', 'SP'),
(2128, 'IPORA DO OESTE', 'SC'),
(2127, 'IPORA', 'GO'),
(2126, 'IPOJUCA', 'PE'),
(2125, 'IPIXUNA DO PARÁ', 'PA'),
(2124, 'IPIXUNA', 'AM'),
(2123, 'IPIRANGA DO SUL', 'RS'),
(2122, 'IPIRANGA DO PIAUÍ', 'PI'),
(2121, 'IPIRANGA', 'PR'),
(2120, 'IPIRÁ', 'BA'),
(2119, 'IPIGUA', 'SP'),
(2118, 'IPIAU', 'BA'),
(2117, 'IPIAÇU', 'MG'),
(2116, 'IPEUNA', 'SP'),
(2115, 'IPERÓ', 'SP'),
(2114, 'IPECAETA', 'BA'),
(2113, 'IPÊ', 'RS'),
(2112, 'IPAUSSU', 'SP'),
(2111, 'IPAUMIRIM', 'CE'),
(2110, 'IPATINGA', 'MG'),
(2109, 'IPAPORANGA', 'CE'),
(2108, 'IPANGUAÇU', 'RN'),
(2107, 'IPANEMA', 'MG'),
(2106, 'IPAMERI', 'GO'),
(2105, 'IPABA', 'MG'),
(2104, 'IOMERE', 'SC'),
(2103, 'INUBIA PAULISTA', 'SP'),
(2102, 'INOCÊNCIA', 'MS'),
(2101, 'INIMUTABA', 'MG'),
(2100, 'INHUMAS', 'GO'),
(2099, 'INHUMA', 'PI'),
(2098, 'INHAUMA', 'MG'),
(2097, 'INHAPIM', 'MG'),
(2096, 'INHAPI', 'AL'),
(2095, 'INHANGAPI', 'PA'),
(2094, 'INHAMBUPE', 'BA'),
(2093, 'INHACORA', 'RS'),
(2092, 'INGAZEIRA', 'PE'),
(2091, 'INGAI', 'MG'),
(2090, 'INGA', 'PB'),
(2089, 'INDIAVAI', 'MT'),
(2088, 'INDIAROBA', 'SE'),
(2087, 'INDIARA', 'GO'),
(2086, 'INDIAPORA', 'SP'),
(2085, 'INDIANÓPOLIS', 'PR'),
(2084, 'INDIANA', 'SP'),
(2083, 'INDEPENDÊNCIA', 'CE'),
(2082, 'INDAJAVIRA', 'MG'),
(2081, 'INDAIATUBA', 'SP'),
(2080, 'INDAIAL', 'SC'),
(2079, 'INCONFIDENTES', 'MG'),
(2078, 'INAJÁ', 'PE'),
(2077, 'INAJÁ', 'PR'),
(2076, 'INACIOLÂNDIA', 'GO'),
(2075, 'INACIO MARTINS', 'PR'),
(2074, 'IMPERATRIZ', 'MA'),
(2073, 'IMIGRANTE', 'RS'),
(2072, 'IMBUIA', 'SC'),
(2071, 'IMBITUVA', 'PR'),
(2070, 'IMBITUBA', 'SC'),
(2069, 'IMBÉ', 'RS'),
(2068, 'IMBAU', 'PR'),
(2067, 'IMARUI', 'SC'),
(2066, 'IMACULADA', 'PB'),
(2065, 'ILÓPOLIS', 'RS'),
(2064, 'ILICINEA', 'MG'),
(2063, 'ILHOTA', 'SC'),
(2062, 'ILHEUS', 'BA'),
(2061, 'ILHA DAS FLORES', 'SE'),
(2060, 'ILHABELA', 'SP'),
(2059, 'ILHA SOLTEIRA', 'SP'),
(2058, 'ILHA GRANDE', 'PI'),
(2057, 'ILHA DE ITAMARACÁ', 'PE'),
(2056, 'ILHA COMPRIDA', 'SP'),
(2055, 'IJUI', 'RS'),
(2054, 'IJACI', 'MG'),
(2053, 'IGUATU', 'CE'),
(2052, 'IGUATEMI', 'MS'),
(2051, 'IGUATAMA', 'MG'),
(2050, 'IGUARAÇU', 'PR'),
(2049, 'IGUARACI', 'PE'),
(2048, 'IGUAPE', 'SP'),
(2047, 'IGUAI', 'BA'),
(2046, 'IGUACI', 'AL'),
(2045, 'IGUABA GRANDE', 'RJ'),
(2044, 'IGREJINHA', 'RS'),
(2043, 'IGREJA NOVA', 'AL'),
(2042, 'IGARATINGA', 'MG'),
(2041, 'IGARATÁ', 'SP'),
(2040, 'IGARASSU', 'PE'),
(2039, 'IGARAPE-MIRIM', 'PA'),
(2038, 'IGARAPÉ-AÇU', 'PA'),
(2037, 'IGARAPE GRANDE', 'MA'),
(2036, 'IGARAPÉ DO MEIO', 'MA'),
(2035, 'IGARAPAVA', 'SP'),
(2034, 'IGARACY', 'PB'),
(2033, 'IGARAÇU DO TIETE', 'SP'),
(2032, 'IGAPORA', 'BA'),
(2031, 'IEPE', 'SP'),
(2030, 'IELMO MARINHO', 'RN'),
(2029, 'ICONHA', 'ES'),
(2028, 'ICO', 'CE'),
(2027, 'ICHU', 'BA'),
(2026, 'ICÉM', 'SP'),
(2025, 'ICATU', 'MA'),
(2024, 'ICARAIMA', 'PR'),
(2023, 'ICARAI DE MINAS', 'MG'),
(2022, 'ICARA', 'PA'),
(2021, 'ICAPUI', 'CE'),
(2020, 'IBIUNA', 'SP'),
(2019, 'IBITURUNA', 'MG'),
(2018, 'IBITIÚRA DE MINAS', 'MG'),
(2017, 'IBITIURA', 'MG'),
(2016, 'IBITIRAMA', 'ES'),
(2015, 'IBITINGA', 'SP'),
(2014, 'IBITIBA', 'BA'),
(2013, 'IBITIARA', 'BA'),
(2012, 'IBIRUBA', 'RS'),
(2011, 'IBIRITE', 'MG'),
(2010, 'IBIRATAIA', 'BA'),
(2009, 'IBIRAREMA', 'SP'),
(2008, 'IBIRAPUITA', 'RS'),
(2007, 'IBIRAPUÃ', 'BA'),
(2006, 'IBIRAPITANGA', 'BA'),
(2005, 'IBIRAMA', 'SC'),
(2004, 'IBIRAJUBA', 'PE'),
(2003, 'IBIRAIARAS', 'RS'),
(2002, 'IBIRAÇU', 'ES'),
(2001, 'IBIRACI', 'MG'),
(2000, 'IBIRACATU', 'MG'),
(1999, 'IBIRA', 'SP'),
(1998, 'IBIQUERA', 'BA'),
(1997, 'IBIPORÃ', 'PR'),
(1996, 'IBIPITANGA', 'BA'),
(1995, 'IBIPEBA', 'BA'),
(1994, 'IBIMIRIM', 'PE'),
(1993, 'IBICUTINGA', 'CE'),
(1992, 'IBICUI', 'BA'),
(1991, 'IBICOARA', 'BA'),
(1990, 'IBICARE', 'SC'),
(1989, 'IBICARAI', 'BA'),
(1988, 'IBIASSUCE', 'BA'),
(1987, 'IBIARA', 'PB'),
(1986, 'IBIAPINA', 'CE'),
(1985, 'IBIAM', 'SC'),
(1984, 'IBIAI', 'MG'),
(1983, 'IBIACA', 'RS'),
(1982, 'IBIA', 'MG'),
(1981, 'IBERTIOGA', 'MG'),
(1980, 'IBEMA', 'PR'),
(1979, 'IBATIBA', 'ES'),
(1978, 'IBATEGUARA', 'AL'),
(1977, 'IBATE', 'SP'),
(1976, 'IBARETAMA', 'CE'),
(1975, 'IBARAMA', 'RS'),
(1974, 'IBAITI', 'PR'),
(1973, 'IATI', 'PE'),
(1972, 'IARAS', 'SP'),
(1971, 'IAPU', 'MG'),
(1970, 'IAÇU', 'BA'),
(1969, 'IACRI', 'SP'),
(1968, 'IACIARA', 'GO'),
(1967, 'IACANGA', 'SP'),
(1966, 'HUMBERTO DE CAMPOS', 'MA'),
(1965, 'HUMAITA', 'AM'),
(1964, 'HULHA NEGRA', 'RS'),
(1963, 'HUGO NAPOLEÃO', 'PI'),
(1962, 'HORTOLÂNDIA', 'SP'),
(1961, 'HORIZONTINA', 'RS'),
(1960, 'HORIZONTE', 'CE'),
(1959, 'HONORIO SERPA', 'PR'),
(1958, 'HOLAMBRA', 'SP'),
(1957, 'HIDROLINA', 'GO'),
(1956, 'HIDROLÂNDIA', 'CE'),
(1955, 'HERVEIRAS', 'RS'),
(1954, 'HERVAL D''OESTE', 'SC'),
(1953, 'HERVAL', 'RS'),
(1952, 'HERCULÂNDIA', 'SP'),
(1951, 'HELIÓPOLIS', 'BA'),
(1950, 'HELIODORA', 'MG'),
(1949, 'HEITORAI', 'GO'),
(1948, 'HARMONIA', 'RS'),
(1947, 'GUZOLÂNDIA', 'SP'),
(1946, 'GURUPI', 'TO'),
(1945, 'GURUPA', 'PA'),
(1944, 'GURJÃO', 'PB'),
(1943, 'GURINHÉM', 'PB'),
(1942, 'GURINHATA', 'MG'),
(1941, 'GUIRICEMA', 'MG'),
(1940, 'GUIRATINGA', 'MT'),
(1939, 'GUIMARANIA', 'MG'),
(1938, 'GUIMARAES', 'MA'),
(1937, 'GUIDOVAL', 'MG'),
(1936, 'GUIA LOPES DA LAGUNA', 'MS'),
(1935, 'GUAXUPE', 'MG'),
(1934, 'GUATAPARÁ', 'SP'),
(1933, 'GUATAMBU', 'SC'),
(1932, 'GUARULHOS', 'SP'),
(1931, 'GUARUJA DO SUL', 'SC'),
(1930, 'GUARUJA', 'SP'),
(1929, 'GUARINOS', 'GO'),
(1928, 'GUARIBAS', 'PI'),
(1927, 'GUARIBA', 'SP'),
(1926, 'GUAREI', 'SP'),
(1925, 'GUARDA-MOR', 'MG'),
(1924, 'GUARATUBA', 'PR'),
(1923, 'GUARATINGUETA', 'SP'),
(1922, 'GUARATINGA', 'BA'),
(1921, 'GUARAREMA', 'SP'),
(1920, 'GUARARAPES', 'SP'),
(1919, 'GUARARA', 'MG'),
(1918, 'GUARAQUECABA', 'PR'),
(1917, 'GUARAPUAVA', 'PR'),
(1916, 'GUARAPARI', 'ES'),
(1915, 'GUARANTA DO NORTE', 'MT'),
(1914, 'GUARANTÃ', 'SP'),
(1913, 'GUARANIAÇU', 'PR'),
(1912, 'GUARANI DO OESTE', 'SP'),
(1911, 'GUARANI DE GOIÁS', 'GO'),
(1910, 'GUARANI DAS MISSÕES', 'RS'),
(1909, 'GUARANI', 'MG'),
(1908, 'GUARANESIA', 'MG'),
(1907, 'GUARAMIRIM', 'SC'),
(1906, 'GUARAMIRANGA', 'CE'),
(1905, 'GUARAÍTA', 'GO'),
(1904, 'GUARAI', 'TO'),
(1903, 'GUARACIAMA', 'MG'),
(1902, 'GUARACIABA DO NORTE', 'CE'),
(1901, 'GUARACIABA', 'MG'),
(1900, 'GUARACI', 'PR'),
(1899, 'GUARAÇAÍ', 'SP'),
(1898, 'GUARABIRA', 'PB'),
(1897, 'GUARA', 'SP'),
(1896, 'GUAPOREMA', 'PR'),
(1895, 'GUAPORE', 'RS'),
(1894, 'GUAPÓ', 'GO'),
(1893, 'GUAPIRAMA', 'PR'),
(1892, 'GUAPIMIRIM', 'RJ'),
(1891, 'GUAPIARA', 'SP'),
(1890, 'GUAPIAÇU', 'SP'),
(1889, 'GUAPE', 'MG'),
(1888, 'GUANHÃES', 'MG'),
(1887, 'GUANANBI', 'BA'),
(1886, 'GUAMIRANGA', 'PR'),
(1885, 'GUAMARE', 'RN'),
(1884, 'GUAJERU', 'BA'),
(1883, 'GUAJARA-MIRIM', 'RO'),
(1882, 'GUAJARA', 'AC'),
(1881, 'GUAIUBA', 'CE'),
(1880, 'GUAIRAÇÁ', 'PR'),
(1879, 'GUAIRA', 'PR'),
(1878, 'GUAIMBÉ', 'SP'),
(1877, 'GUAIÇARA', 'SP'),
(1876, 'GUAIBA', 'RS'),
(1875, 'GUADALUPE', 'PI'),
(1874, 'GUAÇUÍ', 'ES'),
(1873, 'GUABIRUBA', 'SC'),
(1872, 'GUABIJU', 'RS'),
(1871, 'GRUPIARA', 'MG'),
(1870, 'GROSSOS', 'RN'),
(1869, 'GROAIRAS', 'CE'),
(1868, 'GRAVATAL', 'SC'),
(1867, 'GRAVATAÍ', 'RS'),
(1866, 'GRAVATA', 'PE'),
(1865, 'GRÃO-PARA', 'SC'),
(1864, 'GRÃO MOGOL', 'MG'),
(1863, 'GRANJEIRO', 'CE'),
(1862, 'GRANJA', 'CE'),
(1861, 'GRANITO', 'PE'),
(1860, 'GRANDES RIOS', 'PR'),
(1859, 'GRAMADO XAVIER', 'RS'),
(1858, 'GRAMADO DOS LOUREIROS', 'RS'),
(1857, 'GRAMADO', 'RS'),
(1856, 'GRAJAU', 'MA'),
(1855, 'GRACCHO CARDOSO', 'SE'),
(1854, 'GRAÇA ARANHA', 'MA'),
(1853, 'GRAÇA', 'CE'),
(1852, 'GOVERNADOR VALADARES', 'MG'),
(1851, 'GOVERNADOR NUNES FREIRE', 'MA'),
(1850, 'GOVERNADOR NEWTON BELO', 'MA'),
(1849, 'GOVERNADOR MANGABEIRA', 'BA'),
(1848, 'GOVERNADOR LUIS ROCHA', 'MA'),
(1847, 'GOVERNADOR LOMANTO JUNIOR', 'BA'),
(1846, 'GOVERNADOR EUGENIO BARROS', 'MA'),
(1845, 'GOVERNADOR EDSON LOBAO', 'MA'),
(1844, 'GOVERNADOR CELSO RAMOS', 'SC'),
(1843, 'GOVERNADOR ARCHER', 'MA'),
(1842, 'GOVERNADOR DIX-SEPT ROSADO', 'RN'),
(1841, 'GOUVELÂNDIA', 'GO'),
(1840, 'GOUVEIA', 'MG'),
(1839, 'GONZAGA', 'MG'),
(1838, 'GONGOGI', 'BA'),
(1837, 'GONÇALVES DIAS', 'MA'),
(1836, 'GONÇALVES', 'MG'),
(1835, 'GOIOXIM', 'PR'),
(1834, 'GOIOERE', 'PR'),
(1833, 'GOIATUBA', 'GO'),
(1832, 'GOIATINS', 'TO'),
(1831, 'GOIÁS', 'GO'),
(1830, 'GOIANORTE', 'TO'),
(1829, 'GOIANIRA', 'GO'),
(1828, 'GOIANINHA', 'RN'),
(1827, 'GOIANIA', 'GO'),
(1826, 'GOIANÉSIA DO PARÁ', 'PA'),
(1825, 'GOIANESIA', 'GO'),
(1824, 'GOIANDIRA', 'GO'),
(1823, 'GOIANÁPOLIS', 'GO'),
(1822, 'GOIANÁ', 'MG'),
(1821, 'GODOY MOREIRA', 'PR'),
(1820, 'GODOFREDO VIANA', 'MA'),
(1819, 'GLORINHA', 'RS'),
(1818, 'GLÓRIA D''OESTE', 'MT'),
(1817, 'GLÓRIA DO GOITA', 'PE'),
(1816, 'GLÓRIA DE DOURADOS', 'MS'),
(1815, 'GLÓRIA', 'BA'),
(1814, 'GLICERIO', 'SP'),
(1813, 'GLAUCILÂNDIA', 'MG'),
(1812, 'GIRUA', 'RS'),
(1811, 'GIRAU DO PONCIANO', 'AL'),
(1810, 'GILBUES', 'PI'),
(1809, 'GETULIO VARGAS', 'RS'),
(1808, 'GETULINA', 'SP'),
(1807, 'GENTIO DO OURO', 'BA'),
(1806, 'GENTIL', 'RS'),
(1805, 'GENERAL SAMPAIO', 'CE'),
(1804, 'GENERAL SALGADO', 'SP'),
(1803, 'GENERAL MAYNARD', 'SE'),
(1802, 'GENERAL CARNEIRO', 'MT'),
(1801, 'GENERAL CAMARA', 'RS'),
(1800, 'GEMINIANO', 'PI'),
(1799, 'GAVIÃO PEIXOTO', 'SP'),
(1798, 'GAVIÃO', 'BA'),
(1797, 'GAURAMA', 'RS'),
(1796, 'GAÚCHA DO NORTE', 'MT'),
(1795, 'GASTÃO VIDIGAL', 'SP'),
(1794, 'GASPAR', 'SC'),
(1793, 'GARUVA', 'SC'),
(1792, 'GARRUCHOS', 'RS'),
(1791, 'GARRAFÃO DO NORTE', 'PA'),
(1790, 'GAROPABA', 'SC'),
(1789, 'GARIBALDI', 'RS'),
(1788, 'GARÇA', 'SP'),
(1787, 'GARARU', 'SE'),
(1786, 'GARANHUNS', 'PE'),
(1785, 'GANBU', 'BA'),
(1784, 'GAMELEIRAS', 'MG'),
(1783, 'GAMELEIRA', 'PE'),
(1782, 'GALVÃO', 'SC'),
(1781, 'GALINHOS', 'RN'),
(1780, 'GALILEIA', 'MG'),
(1779, 'GALIA', 'SP'),
(1778, 'GADO BRAVO', 'PB'),
(1777, 'GABRIEL MONTEIRO', 'SP'),
(1776, 'FUNILÂNDIA', 'MG'),
(1775, 'FUNDÃO', 'ES'),
(1774, 'FRUTUOSO GOMES', 'RN'),
(1773, 'FRUTAL', 'MG'),
(1772, 'FRONTEIRAS', 'PI'),
(1771, 'FRONTEIRA DOS VALES', 'MG'),
(1770, 'FRONTEIRA', 'MG'),
(1769, 'FREI PAULO', 'SE'),
(1768, 'FREI MIGUELINHO', 'PE'),
(1767, 'FREI MARTINHO', 'PB'),
(1766, 'FREI LAGO NEGRO', 'MG'),
(1765, 'FREI INOCENCIO', 'MG'),
(1764, 'FREI GASPAR', 'MG'),
(1763, 'FREDERICO WESTPHALEN', 'RS'),
(1762, 'FRECHEIRINHA', 'CE'),
(1761, 'FRANCO DA ROCHA', 'SP'),
(1760, 'FRANCISCÓPOLIS', 'MG'),
(1759, 'FRANCISCO SANTOS', 'PI'),
(1758, 'FRANCISCO SÁ', 'MG'),
(1757, 'FRANCISCO MORATO', 'SP'),
(1756, 'FRANCISCO MACEDO', 'PI'),
(1755, 'FRANCISCO DUMONT', 'MG'),
(1754, 'FRANCISCO DANTAS', 'RN'),
(1753, 'FRANCISCO BELTRÃO', 'PR'),
(1752, 'FRANCISCO BADARÓ', 'MG'),
(1751, 'FRANCISCO AYRES', 'PI'),
(1750, 'FRANCISCO ALVES', 'PR'),
(1749, 'FRANCINÓPOLIS', 'PI'),
(1748, 'FRANCA', 'SP'),
(1747, 'FRAIBURGO', 'SC'),
(1746, 'FOZ DO JORDÃO', 'PR'),
(1745, 'FOZ DO IGUAÇU', 'PR'),
(1744, 'FORTUNA DE MINAS', 'MG'),
(1743, 'FORTUNA', 'MA'),
(1742, 'FORTIM', 'CE'),
(1741, 'FORTALEZA DOS VALOS', 'RS'),
(1740, 'FORTALEZA DOS NOGUEIRAS', 'MA'),
(1739, 'FORTALEZA DO TABOCÃO', 'TO'),
(1738, 'FORTALEZA DE MINAS', 'MG'),
(1737, 'FORTALEZA', 'CE'),
(1736, 'FORQUILHINHA', 'SC'),
(1735, 'FORQUILHA', 'CE'),
(1734, 'FORMOSO DO ARAGUAIA', 'TO'),
(1733, 'FORMOSO', 'GO'),
(1732, 'FORMOSA DO SUL', 'SC'),
(1731, 'FORMOSA DO RIO PRETO', 'BA'),
(1730, 'FORMOSA DO OESTE', 'PR'),
(1729, 'FORMOSA DA SERRA NEGRA', 'MA'),
(1728, 'FORMOSA', 'GO'),
(1727, 'FORMIGUEIRO', 'RS'),
(1726, 'FORMIGA', 'MG'),
(1725, 'FONTOURA XAVIER', 'RS'),
(1724, 'FONTE BOA', 'AM'),
(1723, 'FLORÍNEA', 'SP'),
(1722, 'FLORIDA PAULISTA', 'SP'),
(1721, 'FLORIDA', 'PR'),
(1720, 'FLORIANÓPOLIS', 'SC'),
(1719, 'FLORIANO PEIXOTO', 'RS'),
(1718, 'FLORIANO', 'PI'),
(1717, 'FLORESTÓPOLIS', 'PR'),
(1716, 'FLORESTAL', 'MG'),
(1715, 'FLORESTA DO PIAUÍ', 'PI'),
(1714, 'FLORESTA DO ARAGUAIA', 'PA'),
(1713, 'FLORESTA AZUL', 'BA'),
(1712, 'FLORESTA', 'PR'),
(1711, 'FLORESTA', 'PE'),
(1710, 'FLORES DO PIAUÍ', 'PI'),
(1709, 'FLORES DE GOIÁS', 'GO'),
(1708, 'FLORES DA CUNHA', 'RS'),
(1707, 'FLORES', 'PE'),
(1706, 'FLOREAL', 'SP'),
(1705, 'FLORANIA', 'RN'),
(1704, 'FLORAÍ', 'PR'),
(1703, 'FLORA RICA', 'SP'),
(1702, 'FLOR DO SERTÃO', 'SC'),
(1701, 'FLOR DA SERRA DO SUL', 'PR'),
(1700, 'FLEXEIRAS', 'AL'),
(1699, 'FIRMINÓPOLIS', 'GO'),
(1698, 'FIRMINO ALVES', 'BA'),
(1697, 'FILADELFIA', 'BA'),
(1696, 'FIGUEIRÓPOLIS DO OESTE', 'MT'),
(1695, 'FIGUEIRÓPOLIS', 'TO'),
(1694, 'FIGUEIRA', 'PR'),
(1693, 'FERVEDOURO', 'MG'),
(1692, 'FERROS', 'MG'),
(1691, 'FERREIROS', 'PE'),
(1690, 'FERREIRA GOMES', 'AP'),
(1689, 'FERRAZ DE VASCONCELOS', 'SP'),
(1688, 'FERNÃO', 'SP'),
(1687, 'FERNANDÓPOLIS', 'SP'),
(1686, 'FERNANDO PRESTES', 'SP'),
(1685, 'FERNANDO PEDROZA', 'RN'),
(1684, 'FERNANDO FALCÃO', 'MA'),
(1683, 'FERNANDES TOURINHO', 'MG'),
(1682, 'FÊNIX', 'PR'),
(1681, 'FELIZ NATAL', 'MT'),
(1680, 'FELIZ DESERTO', 'AL'),
(1679, 'FELIZ', 'RS'),
(1678, 'FELIXLÂNDIA', 'MG'),
(1677, 'FELIZBURGO', 'MG'),
(1676, 'FELIPE GUERRA', 'RN'),
(1675, 'FELICIO DOS SANTOS', 'MG'),
(1674, 'FEIRA NOVA DO MARANHÃO', 'MA'),
(1673, 'FEIRA NOVA', 'SE'),
(1672, 'FEIRA GRANDE', 'AL'),
(1671, 'FEIRA DE SANTANA', 'BA'),
(1670, 'FEIRA DA MATA', 'BA'),
(1669, 'FEIJÓ', 'AC'),
(1668, 'FAZENDA VILA NOVA', 'RS'),
(1667, 'FAZENDA RIO GRANDE', 'PR'),
(1666, 'FAZENDA NOVA', 'GO'),
(1665, 'FAXINALZINHO', 'RS'),
(1664, 'FAXINAL DOS GUEDES', 'SC'),
(1663, 'FAXINAL DO SOTURNO', 'RS'),
(1662, 'FAXINAL', 'PR'),
(1661, 'FÁTIMA DO SUL', 'MS'),
(1660, 'FÁTIMA', 'BA'),
(1659, 'FARTURA DO PIAUÍ', 'PI'),
(1658, 'FARTURA', 'SP'),
(1657, 'FARROUPILHA', 'RS'),
(1656, 'FAROL', 'PR'),
(1655, 'FARO', 'PA'),
(1654, 'FARIAS BRITO', 'CE'),
(1653, 'FARIA LEMOS', 'MG'),
(1652, 'FAMA', 'MG'),
(1651, 'FAINA', 'GO'),
(1650, 'FAGUNDES VARELA', 'RS'),
(1649, 'FAGUNDES', 'PB'),
(1648, 'EXU', 'PE'),
(1647, 'EXTREMOZ', 'RN'),
(1646, 'EXTREMA', 'MG'),
(1645, 'EWBANK DA CAMARA', 'MG'),
(1644, 'EUSEBIO', 'CE'),
(1643, 'EUNÁPOLIS', 'BA'),
(1642, 'EUGENÓPOLIS', 'MG'),
(1641, 'EUGENIO DE CASTRO', 'RS'),
(1640, 'EUCLIDES DA CUNHA', 'BA'),
(1639, 'EUCLIDES DA CUNHA PAULISTA', 'SP'),
(1638, 'ESTRELA VELHA', 'RS'),
(1637, 'ESTRELA DO OESTE', 'SP'),
(1636, 'ESTRELA DO SUL', 'MG'),
(1635, 'ESTRELA DO NORTE', 'GO'),
(1634, 'ESTRELA DO INDAIÁ', 'MG'),
(1633, 'ESTRELA DE ALAGOAS', 'AL'),
(1632, 'ESTRELA DALVA', 'MG'),
(1631, 'ESTRELA', 'RS'),
(1630, 'ESTREITO', 'MA'),
(1629, 'ESTIVA GERBI', 'SP'),
(1628, 'ESTIVA', 'MG'),
(1627, 'ESTEIO', 'RS'),
(1626, 'ESTÂNCIA VELHA', 'RS'),
(1625, 'ESTÂNCIA CLIMÁTICA DE MORUNGABA', 'SP'),
(1624, 'ESTÂNCIA', 'SE'),
(1623, 'ESTACÃO', 'RS'),
(1622, 'ESPUMOSO', 'RS'),
(1621, 'ESPLANADA', 'BA'),
(1620, 'ESPIRITO SANTO DO TURVO', 'SP'),
(1619, 'ESPIRITO SANTO DO PINHAL', 'SP'),
(1618, 'ESPIRITO SANTO DO OESTE', 'RN'),
(1617, 'ESPIRITO SANTO DO DOURADO', 'MG'),
(1616, 'ESPIRITO SANTO', 'RN'),
(1615, 'ESPINOSA', 'MG'),
(1614, 'ESPIGÃO DO OESTE', 'RO'),
(1613, 'ESPIGAO ALTO DO IGUAÇU', 'PR'),
(1612, 'ESPERANTINÓPOLIS', 'MA'),
(1611, 'ESPERANTINA', 'PI'),
(1610, 'ESPERANÇA NOVA', 'PR'),
(1609, 'ESPERANÇA DO SUL', 'RS'),
(1608, 'ESPERANÇA', 'PB'),
(1607, 'ESPERA FELIZ', 'MG'),
(1606, 'ESMERALDAS', 'MG'),
(1605, 'ESMERALDA', 'RS'),
(1604, 'ESCADA', 'PE'),
(1603, 'ERVALIA', 'MG'),
(1602, 'ERVAL VELHO', 'SC'),
(1601, 'ERVAL SECO', 'RS'),
(1600, 'ERVAL GRANDE', 'RS'),
(1599, 'ERNESTINA', 'RS'),
(1598, 'ERMO', 'SC'),
(1597, 'ERICO CARDOSO', 'BA'),
(1596, 'ERERE', 'CE'),
(1595, 'ERECHIM', 'RS'),
(1594, 'EREBANGO', 'RS'),
(1593, 'EQUADOR', 'RN'),
(1592, 'EPITACIOLÂNDIA', 'AC'),
(1591, 'ENVIRA', 'AM'),
(1590, 'ENTRE RIOS SUL', 'RS'),
(1589, 'ENTRE RIOS DO SUL', 'RS'),
(1588, 'ENTRE RIOS DO OESTE', 'PR'),
(1587, 'ENTRE RIOS DE MINAS', 'MG'),
(1586, 'ENTRE IJUIS', 'RS'),
(1585, 'ENTRE FOLHAS', 'MG'),
(1584, 'ENGENHO VELHO', 'RS'),
(1583, 'ENGENHEIRO NAVARRO', 'MG'),
(1582, 'ENGENHEIRO COELHO', 'SP'),
(1581, 'ENGENHEIRO CALDAS', 'MG'),
(1580, 'ENGENHEIRO BELTRÃO', 'PR'),
(1579, 'ENGENHEIRO PAULO FRONTIN', 'RJ'),
(1578, 'ENÉAS MARQUES', 'PR'),
(1577, 'ENCRUZILHADA DO SUL', 'RS'),
(1576, 'ENCRUZILHADA', 'BA'),
(1575, 'ENCANTO', 'RN'),
(1574, 'ENCANTADO', 'RS'),
(1573, 'EMILIANÓPOLIS', 'SP'),
(1572, 'EMBU-GUAÇU', 'SP'),
(1571, 'EMBU', 'SP'),
(1570, 'EMBAUBA', 'SP'),
(1569, 'EMAS', 'PB'),
(1568, 'ELOI MENDES', 'MG'),
(1567, 'ELISEU MARTINS', 'PI'),
(1566, 'ELISIO MEBRADO', 'BA'),
(1565, 'ELISIARIO', 'SP'),
(1564, 'ELIAS FAUSTO', 'SP'),
(1563, 'ELESBAO VELOSO', 'PI'),
(1562, 'ELDORADO DOS CARAJÁS', 'PA'),
(1561, 'ELDORADO DO SUL', 'RS'),
(1560, 'ELDORADO', 'MS'),
(1559, 'EIRUNEPE', 'AM'),
(1558, 'EDEIA', 'GO'),
(1557, 'EDEALINA', 'GO'),
(1556, 'ECOPORANGA', 'ES'),
(1555, 'ECHAPORÃ', 'SP'),
(1554, 'DURANDE', 'MG'),
(1553, 'DUQUE DE CAXIAS', 'RJ'),
(1552, 'DUQUE BACELAR', 'MA'),
(1551, 'DUMONT', 'SP'),
(1550, 'DUERE', 'TO'),
(1549, 'DUAS ESTRADAS', 'PB'),
(1548, 'DUAS BARRAS', 'RJ'),
(1547, 'DUARTINA', 'SP'),
(1546, 'DRACENA', 'SP'),
(1545, 'DOVERLÂNDIA', 'GO'),
(1544, 'DOUTOR ULYSSES', 'PR'),
(1543, 'DOUTOR SEVERIANO', 'RN'),
(1542, 'DOUTOR RICARDO', 'RS'),
(1541, 'DOUTOR PEDRINHO', 'SC'),
(1540, 'DOUTOR MAURICIO CARDOSO', 'RS'),
(1539, 'DOURADOS', 'MS'),
(1538, 'DOURADOQUARA', 'MG'),
(1537, 'DOURADO', 'SP'),
(1536, 'DOURADINA', 'PR'),
(1535, 'DORMENTES', 'PE'),
(1534, 'DORESÓPOLIS', 'MG'),
(1533, 'DORES DO TURVO', 'MG'),
(1532, 'DORES DO RIO PRETO', 'ES'),
(1531, 'DORES DO INDAIÁ', 'MG'),
(1530, 'DORES DE GUANHÃES', 'MG'),
(1529, 'DORES DE CAMPOS', 'MG'),
(1528, 'DONA INES', 'PB'),
(1527, 'DONA FRANCISCA', 'RS'),
(1526, 'DONA EUZÉBIA', 'MG'),
(1525, 'DONA EMMA', 'SC'),
(1524, 'DOMINGOS MOURÃO', 'PI'),
(1523, 'DOMINGOS MARTINS', 'ES'),
(1522, 'DOM VICOSO', 'MG'),
(1521, 'DOM SILVERIO', 'MG'),
(1520, 'DOM PEDRO DE ALCANTARA', 'RS'),
(1519, 'DOM PEDRO', 'MA'),
(1518, 'DOM PEDRITO', 'RS'),
(1517, 'DOM MACEDO COSTA', 'BA'),
(1516, 'DOM JOAQUIM', 'MG'),
(1515, 'DOM INOCÊNCIO', 'PI'),
(1514, 'DOM FELICIANO', 'RS'),
(1513, 'DOM EXPEDITO LOPES', 'PI'),
(1512, 'DOM ELISEU', 'PA'),
(1511, 'DOM CAVATI', 'MG'),
(1510, 'DOM BOSCO', 'MG'),
(1509, 'DOM BASILIO', 'BA'),
(1508, 'DOM AQUINO', 'MT'),
(1507, 'DOLCINÓPOLIS', 'SP'),
(1506, 'DOIS VIZINHOS', 'PR'),
(1505, 'DOIS RIACHOS', 'AL'),
(1504, 'DOIS LAJEADOS', 'RS'),
(1503, 'DOIS IRMAOS DO TOCANTINS', 'TO'),
(1502, 'DOIS IRMÃOS DO BURITI', 'MS'),
(1501, 'DOIS IRMÃOS DAS MISSÕES', 'RS'),
(1500, 'DOIS IRMAOS', 'RS'),
(1499, 'DOIS CORREGOS', 'SP'),
(1498, 'DOBRADA', 'SP'),
(1497, 'DIVISÓPOLIS', 'MG'),
(1496, 'DIVISA NOVA', 'MG'),
(1495, 'DIVISA ALEGRE', 'MG'),
(1494, 'DIVINÓPOLIS DO TOCANTINS', 'TO'),
(1493, 'DIVINÓPOLIS', 'MG'),
(1492, 'DIVINOLÂNDIA DE MINAS', 'MG'),
(1491, 'DIVINOLÂNDIA', 'SP'),
(1490, 'DIVINO SÃO LOURENCO', 'ES'),
(1489, 'DIVINO DAS LARANJEIRAS', 'MG'),
(1488, 'DIVINO', 'MG'),
(1487, 'DIVINÉSIA', 'MG'),
(1486, 'DIVINA PASTORA', 'SE'),
(1485, 'DIVIANÓPOLIS DE GOIÁS', 'GO'),
(1484, 'DIRCEU ARCOVERDE', 'PI'),
(1483, 'DIRCE REIS', 'SP'),
(1482, 'DIORAMA', 'GO'),
(1481, 'DIONISIO CERQUEIRA', 'SC'),
(1480, 'DIONISIO', 'MG'),
(1479, 'DIOGO DE VASCONCELOS', 'MG'),
(1478, 'DILERMANDO DE AGUIAR', 'RS'),
(1477, 'DIAS D''AVILA', 'BA'),
(1476, 'DIANÓPOLIS', 'TO'),
(1475, 'DIAMANTINO', 'MT'),
(1474, 'DIAMANTINA', 'MG'),
(1473, 'DIAMANTE D''OESTE', 'PR'),
(1472, 'DIAMANTE DO SUL', 'PR'),
(1471, 'DIAMANTE DO NORTE', 'PR'),
(1470, 'DIAMANTE', 'PB'),
(1469, 'DIADEMA', 'SP'),
(1468, 'DEZESSEIS DE NOVEMBRO', 'RS'),
(1467, 'DESTERRO DO MELO', 'MG'),
(1466, 'DESTERRO DE ENTRE RIOS', 'MG'),
(1465, 'DESTERRO', 'PB'),
(1464, 'DESCOBERTO', 'MG'),
(1463, 'DESCANSO', 'SC'),
(1462, 'DESCALVADO', 'SP'),
(1461, 'DERRUBADAS', 'RS'),
(1460, 'DERESÓPOLIS', 'MG'),
(1459, 'DEPUTADO IRAPUAN PINHEIRO', 'CE'),
(1458, 'DEODÁPOLIS', 'MS'),
(1457, 'DENISE', 'MT'),
(1456, 'DEMERVAL LOBAO', 'PI'),
(1455, 'DELTA', 'MG'),
(1454, 'DELMIRO GOLVEIA', 'AL'),
(1453, 'DELFINÓPOLIS', 'MG'),
(1452, 'DELFIM MOREIRA', 'MG'),
(1451, 'DAVINÓPOLIS', 'MA'),
(1450, 'DAVID CANABARRO', 'RS'),
(1449, 'DATAS', 'MG'),
(1448, 'DARIO MEIRA', 'BA'),
(1447, 'DARCINÓPOLIS', 'TO'),
(1446, 'DAMOLÂNDIA', 'GO'),
(1445, 'DAMIÃO', 'PB'),
(1444, 'DAMIANÓPOLIS', 'GO'),
(1443, 'CUTIAS DO ARAGUARI', 'AP'),
(1442, 'CUSTÓDIA', 'PE'),
(1441, 'CURVELO', 'MG'),
(1440, 'CURURUPU', 'MA'),
(1439, 'CURUÇÁ', 'PA'),
(1438, 'CURUÁ', 'PA'),
(1437, 'CURRALINHOS', 'PI'),
(1436, 'CURRALINHO', 'PA'),
(1435, 'CURRAL VELHO', 'PB'),
(1434, 'CURRAL NOVO DO PIAUÍ', 'PI'),
(1433, 'CURRAL DE DENTRO', 'MG'),
(1432, 'CURRAL DE CIMA', 'PB'),
(1431, 'CURRAIS NOVOS', 'RN'),
(1430, 'CURRAIS', 'PI'),
(1429, 'CURIUVA', 'PR'),
(1428, 'CURITIBANOS', 'SC'),
(1427, 'CURITIBA', 'PR'),
(1426, 'CURIONÓPOLIS', 'PA'),
(1425, 'CURIMATA', 'PI'),
(1424, 'CURAÇÁ', 'BA'),
(1423, 'CUPIRA', 'PE'),
(1422, 'CUPARAQUE', 'MG'),
(1421, 'CUNHATAI', 'SC'),
(1420, 'CUNHAPORA', 'SC'),
(1419, 'CUNHA', 'SP'),
(1418, 'CUMBE', 'SE'),
(1417, 'CUMARU DO NORTE', 'PA'),
(1416, 'CUMARU', 'PE'),
(1415, 'CUMARI', 'GO'),
(1414, 'CUITEGI', 'PB'),
(1413, 'CUITE DE MAMANGUAPE', 'PB'),
(1412, 'CUITE', 'PB'),
(1411, 'CUIABÁ', 'MT'),
(1410, 'CUBATI', 'PB'),
(1409, 'CUBATÃO', 'SP'),
(1408, 'CRUZMALTINA', 'PR'),
(1407, 'CRUZILIA', 'MG'),
(1406, 'CRUZETA', 'RN'),
(1405, 'CRUZEIRO DO SUL', 'AC'),
(1404, 'CRUZEIRO DO OESTE', 'PR'),
(1403, 'CRUZEIRO DO IGUAÇU', 'PR'),
(1402, 'CRUZEIRO DA FORTALEZA', 'MG'),
(1401, 'CRUZEIRO', 'SP'),
(1400, 'CRUZALIA', 'SP'),
(1399, 'CRUZ MACHADO', 'PR'),
(1398, 'CRUZ DO ESPÍRITO SANTO', 'PB'),
(1397, 'CRUZ DAS ALMAS', 'BA'),
(1396, 'CRUZ ALTA', 'RS'),
(1395, 'CRUZ', 'CE'),
(1394, 'CRUCILÂNDIA', 'MG'),
(1393, 'CROMINIA', 'GO'),
(1392, 'CROATÁ', 'CE'),
(1391, 'CRIXAS DO TOCANTINS', 'TO'),
(1390, 'CRIXAS', 'GO'),
(1389, 'CRISTÓPOLIS', 'BA'),
(1388, 'CRISTINO CASTRO', 'PI'),
(1387, 'CRISTINÁPOLIS', 'SE'),
(1386, 'CRISTINA', 'MG'),
(1385, 'CRISTIANÓPOLIS', 'GO'),
(1384, 'CRISTIANO OTONI', 'MG'),
(1383, 'CRISTALINA', 'GO'),
(1382, 'CRISTÁLIA', 'MG'),
(1381, 'CRISTALÂNDIA DO PIAUÍ', 'PI'),
(1380, 'CRISTAL DO SUL', 'RS'),
(1379, 'CRISTAL', 'RS'),
(1378, 'CRISTAIS PAULISTA', 'SP'),
(1377, 'CRISTAIS', 'MG'),
(1376, 'CRISSIUMAL', 'RS'),
(1375, 'CRISÓPOLIS', 'BA'),
(1374, 'CRISÓLITA', 'MG'),
(1373, 'CRICIUMA', 'SC'),
(1372, 'CRAVOLÂNDIA', 'BA'),
(1371, 'CRAVINHOS', 'SP'),
(1370, 'CRATO', 'CE'),
(1369, 'CRATEUS', 'CE'),
(1368, 'CRAIBAS', 'AL'),
(1367, 'COXIXOLA', 'PB'),
(1366, 'COXIM', 'MS'),
(1365, 'COXILHA', 'RS'),
(1364, 'COUTO MAGALHAES', 'TO'),
(1363, 'COUTO DE MAGALHAES MINAS', 'MG'),
(1362, 'COTRIGUAÇU', 'MT'),
(1361, 'COTIPORA', 'RS'),
(1360, 'COTIA', 'SP'),
(1359, 'COTEGIPE', 'BA'),
(1358, 'COSTA RICA', 'MS'),
(1357, 'COSTA MARQUES', 'RO'),
(1356, 'COSMORAMA', 'SP'),
(1355, 'COSMÓPOLIS', 'SP'),
(1354, 'CORURIPE', 'AL'),
(1353, 'CORUPA', 'SC'),
(1352, 'CORUMBIARA', 'RO'),
(1351, 'CORUMBATAI DO SUL', 'PR'),
(1350, 'CORUMBATAI', 'SP'),
(1349, 'CORUMBAIBA', 'GO'),
(1348, 'CORUMBA DE GOIÁS', 'GO'),
(1347, 'CORUMBA', 'MS'),
(1346, 'CORTES', 'PE'),
(1345, 'CORRENTINA', 'BA'),
(1344, 'CORRENTES', 'PE'),
(1343, 'CORRENTE', 'PI'),
(1342, 'CORREIA PINTO', 'SC'),
(1341, 'CÓRREGO NOVO', 'MG'),
(1340, 'CORREGO DO OURO', 'GO'),
(1339, 'CORREGO DO BOM JESUS', 'MG'),
(1338, 'CORREGO DANTA', 'MG'),
(1337, 'CORONEL XAVIER CHAVES', 'MG'),
(1336, 'CORONEL VIVIDA', 'PR'),
(1335, 'CORONEL SAPUCAIA', 'MS'),
(1334, 'CORONEL PILAR', 'RS'),
(1333, 'CORONEL PACHECO', 'MG'),
(1332, 'CORONEL MURTA', 'MG'),
(1331, 'CORONEL MARTINS', 'SC'),
(1330, 'CORONEL MACEDO', 'SP'),
(1329, 'CORONEL JOSÉ DIAS', 'PI'),
(1328, 'CORONEL JOÃO SÁ', 'BA'),
(1327, 'CORONEL JOÃO PESSOA', 'RN'),
(1326, 'CORONEL FREITAS', 'SC'),
(1325, 'CORONEL FABRICIANO', 'MG'),
(1324, 'CORONEL EZEQUIEL', 'RN'),
(1323, 'CORONEL DOMINGOS SOARES', 'PR'),
(1322, 'CORONEL BICACO', 'RS'),
(1321, 'CORONEL BARROS', 'RS'),
(1320, 'COROMANDEL', 'MG'),
(1319, 'COROATA', 'MA'),
(1318, 'COROADOS', 'SP'),
(1317, 'COROACI', 'MG'),
(1316, 'CORNÉLIO PROCÓPIO', 'PR'),
(1315, 'CORINTO', 'MG'),
(1314, 'CORIBE', 'BA'),
(1313, 'CORGUINHO', 'MS'),
(1312, 'COREMAS', 'PB'),
(1311, 'COREAU', 'CE'),
(1310, 'CORDISLÂNDIA', 'MG'),
(1309, 'CORDISBURGO', 'MG'),
(1308, 'CORDILHEIRA ALTA', 'SC'),
(1307, 'CORDEIROS', 'BA'),
(1306, 'CORDEIRÓPOLIS', 'SP'),
(1305, 'CORDEIRO', 'RJ'),
(1304, 'CORBÉLIA', 'PR'),
(1303, 'CORAÇÃO DE MARIA', 'BA'),
(1302, 'CORAÇÃO DE JESUS', 'MG'),
(1301, 'COQUEIROS DO SUL', 'RS'),
(1300, 'COQUEIRO SECO', 'AL'),
(1299, 'COQUEIRO BAIXO', 'RS'),
(1298, 'COQUEIRAL', 'MG'),
(1297, 'CONTENDAS DO SINCORA', 'BA'),
(1296, 'CONTENDA', 'PR'),
(1295, 'CONTAGEM', 'MG'),
(1294, 'CONSTANTINA', 'RS'),
(1293, 'CONSOLACÃO', 'MG'),
(1292, 'CONSELHEIRO PENA', 'MG'),
(1291, 'CONSELHEIRO MAIRINCK', 'PR'),
(1290, 'CONSELHEIRO LAFAIETE', 'MG'),
(1289, 'CONQUISTA', 'MG'),
(1288, 'CONGONHINHAS', 'PR'),
(1287, 'CONGONHAS DO NORTE', 'MG'),
(1286, 'CONGONHAS DO CAMPO', 'MG'),
(1285, 'CONGONHAL', 'MG'),
(1284, 'CONGO', 'PB'),
(1283, 'CONFRESA', 'MT'),
(1282, 'CONFINS', 'MG'),
(1281, 'CONDOR', 'RS'),
(1280, 'CONDEUBA', 'BA'),
(1279, 'CONDE', 'BA'),
(1278, 'CONDADO', 'PB'),
(1277, 'CONCÓRDIA DO PARÁ', 'PA'),
(1276, 'CONCORDIA', 'SC'),
(1275, 'CONCHAS', 'SP'),
(1274, 'CONCHAL', 'SP'),
(1273, 'CONCEIÇÃO DOS OUROS', 'MG'),
(1272, 'CONCEIÇÃO DO TOCANTINS', 'TO'),
(1271, 'CONCEIÇÃO DO RIO VERDE', 'MG'),
(1270, 'CONCEIÇÃO DO PARA', 'MG'),
(1269, 'CONCEIÇÃO DO MATO DENTRO', 'MG'),
(1268, 'CONCEIÇÃO DO LAGO AÇU', 'MA'),
(1267, 'CONCEIÇÃO DO JAÇUIPE', 'BA'),
(1266, 'CONCEIÇÃO DO COITÉ', 'BA'),
(1265, 'CONCEIÇÃO DO CASTELO', 'ES'),
(1264, 'CONCEIÇÃO DO CANINDE', 'PI'),
(1263, 'CONCEIÇÃO DO ALMEIDA', 'BA'),
(1262, 'CONCEIÇÃO DE MACABU', 'RJ'),
(1261, 'CONCEIÇÃO DE IPANEMA', 'MG'),
(1260, 'CONCEIÇÃO DAS PEDRAS', 'MG'),
(1259, 'CONCEIÇÃO DAS ALAGOAS', 'MG'),
(1258, 'CONCEIÇÃO DA FEIRA', 'BA'),
(1257, 'CONCEIÇÃO DA BARRA', 'ES'),
(1256, 'CONCEIÇÃO BARRA DE MINAS', 'MG'),
(1255, 'CONCEIÇÃO ARÁGUAIA', 'PA'),
(1254, 'CONCEIÇÃO', 'PB'),
(1253, 'COMODORO', 'MT'),
(1252, 'COMERCINHO', 'MG'),
(1251, 'COMENDADOR LEVY GASPARIAN', 'RJ'),
(1250, 'COMENDADOR GOMES', 'MG'),
(1249, 'COMBINADO', 'TO'),
(1248, 'COLUNA', 'MG'),
(1247, 'COLORADO D''OESTE', 'RO'),
(1246, 'COLORADO', 'PR'),
(1245, 'COLONIA DO PIAUÍ', 'PI'),
(1244, 'COLÔNIA DO GURGUÉIA', 'PI'),
(1243, 'COLONIA DE LEOPOLDINA', 'AL'),
(1242, 'COLOMBO', 'PR'),
(1241, 'COLOMBIA', 'SP'),
(1240, 'COLMEIA', 'TO'),
(1239, 'COLINAS DO TOCANTINS', 'TO'),
(1238, 'COLINAS DO SUL', 'GO'),
(1237, 'COLINAS', 'MA'),
(1236, 'COLINA', 'SP'),
(1235, 'COLIDER', 'MT'),
(1234, 'COLATINA', 'ES'),
(1233, 'COLARES', 'PA'),
(1232, 'COIVARAS', 'PI'),
(1231, 'COITE DO NOIA', 'AL'),
(1230, 'COIMBRA', 'MG'),
(1229, 'COELHO NETO', 'MA'),
(1228, 'CODO', 'MA'),
(1227, 'CODAJAS', 'AM'),
(1226, 'COCOS', 'BA'),
(1225, 'COCEICÃO DA APARECIDA', 'MG'),
(1224, 'COCALZINHO DE GOIÁS', 'GO'),
(1223, 'COCALINHO', 'MT'),
(1222, 'COCAL DO SUL', 'SC'),
(1221, 'COCAL DOS ALVES', 'PI'),
(1220, 'COCAL DE TELHA', 'PI'),
(1219, 'COCAL', 'PI'),
(1218, 'COARI', 'AM'),
(1217, 'COARACI', 'BA'),
(1216, 'CLEVELÂNDIA', 'PR'),
(1215, 'CLEMENTINA', 'SP'),
(1214, 'CLAUDIO', 'MG'),
(1213, 'CLÁUDIA', 'MT'),
(1212, 'CLARO DOS POÇÕES', 'MG'),
(1211, 'CLARAVAL', 'MG'),
(1210, 'CIRIACO', 'RS'),
(1209, 'CIPOTÂNEA', 'MG'),
(1208, 'CIPO', 'BA'),
(1207, 'CIDREIRA', 'RS'),
(1206, 'CIDELÂNDIA', 'MA'),
(1205, 'CIDADE OCIDENTAL', 'GO'),
(1204, 'CIDADE GAÚCHA', 'PR'),
(1203, 'CIDADE DO RECIFE', 'PE'),
(1202, 'CICERO DANTAS', 'BA'),
(1201, 'CIANORTE', 'PR'),
(1200, 'CHUVISCA', 'RS'),
(1199, 'CHUPINGUAIA', 'RO'),
(1198, 'CHUI', 'RS'),
(1197, 'CHORROCHO', 'BA'),
(1196, 'CHOROZINHO', 'CE'),
(1195, 'CHORO', 'CE'),
(1194, 'CHOPINZINHO', 'PR'),
(1193, 'CHIAPETTA', 'RS'),
(1192, 'CHIADOR', 'MG'),
(1191, 'CHAVES', 'PA'),
(1190, 'CHAVANTES', 'SP'),
(1189, 'CHAVAL', 'CE'),
(1188, 'CHARRUA', 'RS'),
(1187, 'CHARQUEADAS', 'RS'),
(1186, 'CHARQUEADA', 'SP'),
(1185, 'CHAPECÓ', 'SC'),
(1184, 'CHAPADINHA', 'MA'),
(1183, 'CHAPADÃO DO SUL', 'MS'),
(1182, 'CHAPADÃO DO LAGEADO', 'SC'),
(1181, 'CHAPADÃO DO CEU', 'GO'),
(1180, 'CHAPADA GAÚCHA', 'MG'),
(1179, 'CHAPADA DOS GUIMARÃES', 'MT'),
(1178, 'CHAPADA DO NORTE', 'MG'),
(1177, 'CHAPADA DA NATIVIDADE', 'TO'),
(1176, 'CHAPADA DA AREIA', 'TO'),
(1175, 'CHAPADA', 'RS'),
(1174, 'CHALE', 'MG'),
(1173, 'CHACARA', 'MG'),
(1172, 'CHÃ PRETA', 'AL'),
(1171, 'CHA GRANDE', 'PE'),
(1170, 'CHÃ DE ALEGRIA', 'PE'),
(1169, 'CEZARINA', 'GO'),
(1168, 'CEU AZUL', 'PR'),
(1167, 'CESÁRIO LANGE', 'SP'),
(1166, 'CERRO NEGRO', 'SC'),
(1165, 'CERRO LARGO', 'RS'),
(1164, 'CERRO GRANDE DO SUL', 'RS'),
(1163, 'CERRO GRANDE', 'RS'),
(1162, 'CERRO CORA', 'RN'),
(1161, 'CERRO BRANCO', 'RS'),
(1160, 'CERRITO', 'RS'),
(1159, 'CERQUILHO', 'SP'),
(1158, 'CERQUEIRA CESAR', 'SP'),
(1157, 'CERES', 'GO'),
(1156, 'CEREJEIRAS', 'RO'),
(1155, 'CENTRO NOVO DO MARANHÃO', 'MA'),
(1154, 'CENTRO DO GUILHERME', 'MA'),
(1153, 'CENTRALINA', 'MG'),
(1152, 'CENTRAL DO MARANHÃO', 'MA'),
(1151, 'CENTRAL DE MINAS', 'MG'),
(1150, 'CENTRAL', 'BA'),
(1149, 'CENTENARIO DO SUL', 'PR'),
(1148, 'CENTENARIO', 'RS'),
(1147, 'CELSO RAMOS', 'SC'),
(1146, 'CEDRO SÃO JOÃO', 'SE'),
(1145, 'CEDRO DO ABAETÉ', 'MG'),
(1144, 'CEDRO', 'CE'),
(1143, 'CEDRAL', 'MA'),
(1142, 'CEARÁ MIRIM', 'RN'),
(1141, 'CAXINGO', 'PI'),
(1140, 'CAXIAS DO SUL', 'RS'),
(1139, 'CAXIAS', 'MA'),
(1138, 'CAXAMBU DO SUL', 'SC'),
(1137, 'CAXAMBU', 'MG'),
(1136, 'CAVALCANTE', 'GO'),
(1135, 'CAUCAIA', 'CE'),
(1134, 'CATUTI', 'MG'),
(1133, 'CATURITE', 'PB'),
(1132, 'CATURAMA', 'BA'),
(1131, 'CATURAÍ', 'GO'),
(1130, 'CATUNDA', 'CE'),
(1129, 'CATUJI', 'MG'),
(1128, 'CATUIPE', 'RS'),
(1127, 'CATU', 'BA'),
(1126, 'CATOLÉ DO ROCHA', 'PB'),
(1125, 'CATOLÂNDIA', 'BA'),
(1124, 'CATINGUEIRA', 'PB'),
(1123, 'CATIGUA', 'SP'),
(1122, 'CATENDE', 'PE'),
(1121, 'CATAS ALTAS ', 'MG'),
(1120, 'CATARINA', 'CE'),
(1119, 'CATANDUVAS', 'PR'),
(1118, 'CATANDUVA', 'SP'),
(1117, 'CATANDUVA', 'SC'),
(1116, 'CATALÃO', 'GO'),
(1115, 'CATÁGUASES', 'MG'),
(1114, 'CASTRO ALVES', 'BA'),
(1113, 'CASTRO', 'PR'),
(1112, 'CASTILHO', 'SP'),
(1111, 'CASTELO DO PIAUÍ', 'PI'),
(1110, 'CASTELÂNDIA', 'GO'),
(1109, 'CASTANHEIRAS', 'RO'),
(1108, 'CASTANHEIRA', 'MT'),
(1107, 'CASTANHAL', 'PA'),
(1106, 'CASSILÂNDIA', 'MS'),
(1105, 'CÁSSIA DOS COQUEIROS', 'SP'),
(1104, 'CASSIA', 'MG'),
(1103, 'CASSERENGUE', 'PB'),
(1102, 'CASINHAS', 'PE'),
(1101, 'CASIMIRO DE ABREU', 'RJ'),
(1100, 'CASEIROS', 'RS'),
(1099, 'CASEARA', 'TO'),
(1098, 'CASCAVEL', 'PR'),
(1097, 'CASCAVEL', 'CE'),
(1096, 'CASCALHO RICO', 'MG'),
(1095, 'CASCA', 'RS'),
(1094, 'CASA NOVA', 'BA'),
(1093, 'CASA GRANDE', 'MG'),
(1092, 'CASA BRANCA', 'SP'),
(1091, 'CARVALHOS', 'MG'),
(1090, 'CARVALHÓPOLIS', 'MG'),
(1089, 'CARUTAPERA', 'MA'),
(1088, 'CARUARU', 'PE'),
(1087, 'CARRASCO BONITO', 'TO'),
(1086, 'CARRAPATEIRA', 'PB'),
(1085, 'CARRANCAS', 'MG'),
(1084, 'CARPINA', 'PE'),
(1083, 'CAROLINA', 'MA'),
(1082, 'CAROEBE', 'RR'),
(1081, 'CARNEIROS', 'AL'),
(1080, 'CARNEIRINHO', 'MG'),
(1079, 'CARNAUBEIRA DA PENHA', 'PE'),
(1078, 'CARNAUBAL', 'CE'),
(1077, 'CARNAUBAIS', 'RN'),
(1076, 'CARNAÚBA DOS DANTAS', 'RN'),
(1075, 'CARNAIBA', 'PE'),
(1074, 'CARMÓPOLIS DE MINAS', 'MG'),
(1073, 'CARMÓPOLIS', 'SE'),
(1072, 'CARMOLÂNDIA', 'TO'),
(1071, 'CARMO DO RIO VERDE', 'GO'),
(1070, 'CARMO DO RIO CLARO', 'MG'),
(1069, 'CARMO DO PARANAÍBA', 'MG'),
(1068, 'CARMO DO CAJURU', 'MG'),
(1067, 'CARMO DE MINAS', 'MG'),
(1066, 'CARMO DA MATA', 'MG'),
(1065, 'CARMO DA CACHOEIRA', 'MG'),
(1064, 'CARMO', 'RJ'),
(1063, 'CARMESIA', 'MG'),
(1062, 'CARLOS GOMES', 'RS'),
(1061, 'CARLOS CHAGAS', 'MG'),
(1060, 'CARLOS BARBOSA', 'RS'),
(1059, 'CARLÓPOLIS', 'PR'),
(1058, 'CARLINDA', 'MT'),
(1057, 'CARIUS', 'CE'),
(1056, 'CARIRIAÇU', 'CE'),
(1055, 'CARIRI DO TOCANTINS', 'TO'),
(1054, 'CARIRE', 'CE'),
(1053, 'CARIRA', 'SE'),
(1052, 'CARINHANHA', 'BA'),
(1051, 'CARIDADE DO PIAUÍ', 'PI'),
(1050, 'CARIDADE', 'CE'),
(1049, 'CARIAÇICA', 'ES'),
(1048, 'CAREIRO DA VARZEA', 'AM'),
(1047, 'CAREIRO CASTANHO', 'AM'),
(1046, 'CAREAÇU', 'MG'),
(1045, 'CARDOSO MOREIRA', 'RJ'),
(1044, 'CARDOSO', 'SP'),
(1043, 'CARDEAL DA SILVA', 'BA'),
(1042, 'CARBONITA', 'MG'),
(1041, 'CARAZINHO', 'RS'),
(1040, 'CARAVELAS', 'BA'),
(1039, 'CARAÚBAS DO PIAUÍ', 'PI'),
(1038, 'CARAUBAS', 'PB'),
(1037, 'CARAUARI', 'AM'),
(1036, 'CARATINGA', 'MG'),
(1035, 'CARAPICUIBA', 'SP'),
(1034, 'CARAPEBUS', 'RJ'),
(1033, 'CARANGOLA', 'MG'),
(1032, 'CARANDAÍ', 'MG'),
(1031, 'CARANAIBA', 'MG'),
(1030, 'CARAMBEI', 'PR'),
(1029, 'CARAIBAS', 'BA'),
(1028, 'CARAÍ', 'MG'),
(1027, 'CARAGUATATUBA', 'SP'),
(1026, 'CARACOL', 'MS'),
(1025, 'CARACARAI', 'RR'),
(1024, 'CARAA', 'RS'),
(1023, 'CAPUTIRA', 'MG'),
(1022, 'CAPRISTANO', 'CE'),
(1021, 'CAPOEIRAS', 'PE'),
(1020, 'CAPIXABA', 'AC'),
(1019, 'CAPIVARI DO SUL', 'RS'),
(1018, 'CAPIVARI DE BAIXO', 'SC'),
(1017, 'CAPIVARI', 'SP'),
(1016, 'CAPITÓLIO', 'MG'),
(1015, 'CAPITÃO POÇO', 'PA'),
(1014, 'CAPITÃO LEÔNIDAS MARQUES', 'PR'),
(1013, 'CAPITÃO GERVÁSIO DE OLIVEIRA', 'PI'),
(1012, 'CAPITÃO ENÉAS', 'MG'),
(1011, 'CAPITÃO DE CAMPOS', 'PI'),
(1010, 'CAPITÃO ANDRADE', 'MG'),
(1009, 'CAPITÃO', 'RS'),
(1008, 'CAPINZAL', 'SC'),
(1007, 'CAPINÓPOLIS', 'MG'),
(1006, 'CAPIM GROSSO', 'BA'),
(1005, 'CAPIM BRANCO', 'MG'),
(1004, 'CAPIM', 'PB'),
(1003, 'CAPETINGA', 'MG'),
(1002, 'CAPELINHA', 'MG'),
(1001, 'CAPELA NOVA', 'MG'),
(1000, 'CAPELA DO ALTO ALEGRE', 'BA'),
(999, 'CAPELA DO ALTO', 'SP'),
(998, 'CAPELA DE SANTANA', 'RS'),
(997, 'CAPELA', 'AL'),
(996, 'CAPARÃO', 'MG'),
(995, 'CAPÃO DO LEÃO', 'RS'),
(994, 'CAPÃO DA CANOA', 'RS'),
(993, 'CAPÃO BONITO', 'SP'),
(992, 'CAPÃO ALTO', 'SC'),
(991, 'CAPANEMA', 'PA'),
(990, 'CANUTAMA', 'AM'),
(989, 'CANUDOS DO VALE', 'RS'),
(988, 'CANUDOS', 'BA'),
(987, 'CANTO DO BURITI', 'PI'),
(986, 'CANTANHEDE', 'MA'),
(985, 'CANTAGALO', 'RJ'),
(984, 'CANTAGALO', 'PR'),
(983, 'CANTÁ', 'RR'),
(982, 'CANSANCÃO', 'BA'),
(981, 'CANOINHAS', 'SC'),
(980, 'CANOAS', 'RS'),
(979, 'CANITAR', 'SP'),
(978, 'CANINÓPOLIS', 'MG'),
(977, 'CANINDÉ DO SÃO FRANCISCO', 'SE'),
(976, 'CANINDE', 'CE'),
(975, 'CANHOTINHO', 'PE'),
(974, 'CANHOBA', 'SE'),
(973, 'CANGUÇU', 'RS'),
(972, 'CANGUARETAMA', 'RN'),
(971, 'CANELINHA', 'SC'),
(970, 'CANELA', 'RS'),
(969, 'CANDOI', 'PR'),
(968, 'CANDIOTA', 'RS'),
(967, 'CANDIIBA', 'BA'),
(966, 'CÂNDIDO SALES', 'BA'),
(965, 'CÂNDIDO RODRIGUES', 'SP'),
(964, 'CÂNDIDO MOTA', 'SP'),
(963, 'CÂNDIDO MENDES', 'MA'),
(962, 'CÂNDIDO GODOI', 'RS'),
(961, 'CÂNDIDO DE ABREU', 'PR'),
(960, 'CANDELÁRIA', 'RS'),
(959, 'CANDEIAS DO JAMARI', 'RO'),
(958, 'CANDEIAS', 'BA'),
(957, 'CANAVIEIRAS', 'BA'),
(956, 'CANAVIEIRA', 'PI'),
(955, 'CANAS', 'SP'),
(954, 'CANARANA', 'BA'),
(953, 'CANÁPOLIS', 'BA'),
(952, 'CANAPI', 'AL'),
(951, 'CANANÉIA', 'SP'),
(950, 'CANAÃ DOS CARAJAS', 'PA'),
(949, 'CANAÃ', 'MG'),
(948, 'CANA VERDE', 'MG'),
(947, 'CANA BRAVA DO NORTE', 'MT'),
(946, 'CAMUTANGA', 'PE'),
(945, 'CAMPOS VERDES', 'GO'),
(944, 'CAMPOS SALES', 'CE'),
(943, 'CAMPOS NOVOS PAULISTA', 'SP'),
(942, 'CAMPOS NOVOS', 'SC'),
(941, 'CAMPOS LINDOS', 'TO'),
(940, 'CAMPOS GERAIS', 'MG'),
(939, 'CAMPOS DOS GOYTACAZES', 'RJ'),
(938, 'CAMPOS DO JORDÃO', 'SP'),
(937, 'CAMPOS DE JÚLIO', 'MT'),
(936, 'CAMPOS BORGES', 'RS'),
(935, 'CAMPOS BELOS DE GOIÁS', 'GO'),
(934, 'CAMPOS ALTOS', 'MG'),
(933, 'CAMPO ERÊ', 'SC'),
(932, 'CAMPO VERDE', 'MT'),
(931, 'CAMPO REDONDO', 'RN'),
(930, 'CAMPO NOVO DO PARECIS', 'MT'),
(929, 'CAMPO NOVO DE RONDONIA', 'RO'),
(928, 'CAMPO NOVO', 'RS'),
(927, 'CAMPO MOURÃO', 'PR'),
(926, 'CAMPO MAIOR', 'PI'),
(925, 'CAMPO MAGRO', 'PR'),
(924, 'CAMPO LIMPO PAULISTA', 'SP'),
(923, 'CAMPO LIMPO DE GOIÁS', 'GO'),
(922, 'CAMPO LARGO DO PIAUÍ', 'PI'),
(921, 'CAMPO LARGO', 'PR'),
(920, 'CAMPO GRANDE DO PIAUÍ', 'PI'),
(919, 'CAMPO GRANDE', 'MS'),
(918, 'CAMPO GRANDE', 'AL'),
(917, 'CAMPO FORMOSO', 'BA'),
(916, 'CAMPO FLORIDO', 'MG'),
(915, 'CAMPO DO TENENTE', 'PR'),
(914, 'CAMPO DO MEIO', 'MG'),
(913, 'CAMPO DO BRITO', 'SE'),
(912, 'CAMPO BONITO', 'PR'),
(911, 'CAMPO BOM', 'RS'),
(910, 'CAMPO BELO DO SUL', 'SC'),
(909, 'CAMPO BELO', 'MG'),
(908, 'CAMPO ALEGRE DO FIDALGO', 'PI'),
(907, 'CAMPO ALEGRE DE LOURDES', 'BA'),
(906, 'CAMPO ALEGRE DE GOIÁS', 'GO'),
(905, 'CAMPO ALEGRE', 'AL'),
(904, 'CAMPINORTE', 'GO'),
(903, 'CAMPINAS DO SUL', 'RS'),
(902, 'CAMPINAS DO PIAUÍ', 'PI'),
(901, 'CAMPINAS', 'SP'),
(900, 'CAMPINÁPOLIS', 'MT'),
(899, 'CAMPINAÇU', 'GO'),
(898, 'CAMPINA VERDE', 'MG'),
(897, 'CAMPINA DO MONTE ALEGRE', 'SP'),
(896, 'CAMPINA GRANDE DO SUL', 'PR'),
(895, 'CAMPINA GRANDE', 'PB'),
(894, 'CAMPINA DO SIMÃO', 'PR'),
(893, 'CAMPINA DAS MISSÕES', 'RS'),
(892, 'CAMPINA DA LAGOA', 'PR'),
(891, 'CAMPESTRE DO MARANHÃO', 'MA'),
(890, 'CAMPESTRE DE GOIÁS', 'GO'),
(889, 'CAMPESTRE DA SERRA', 'RS'),
(888, 'CAMPESTRE', 'AL'),
(887, 'CAMPANHA', 'MG'),
(886, 'CAMPANÁRIO', 'MG'),
(885, 'CAMOCIM DE SÃO FELIX', 'PE'),
(884, 'CAMOCIM', 'CE'),
(883, 'CAMETA', 'PA'),
(882, 'CAMBUQUIRA', 'MG'),
(881, 'CAMBUI', 'MG'),
(880, 'CAMBUCI', 'RJ'),
(879, 'CAMBORIU', 'SC'),
(878, 'CAMBIRA', 'PR'),
(877, 'CAMBÉ', 'PR'),
(876, 'CAMBARÁ DO SUL', 'RS'),
(875, 'CAMBARÁ', 'PR'),
(874, 'CAMARGO', 'RS'),
(873, 'CAMARAGIPE', 'PE'),
(872, 'CAMARAGIBE', 'PE'),
(871, 'CAMAQUÃ', 'RS'),
(870, 'CAMAPUÃ', 'MS'),
(869, 'CAMANDUCAIA', 'MG'),
(868, 'CAMAMU', 'BA'),
(867, 'CAMALAU', 'PB'),
(866, 'CAMACHO', 'MG'),
(865, 'CAMACARI', 'BA'),
(864, 'CAMACAN', 'BA'),
(863, 'CAMACA', 'BA'),
(862, 'CALUMBI', 'PE'),
(861, 'CALMON', 'SC'),
(860, 'CALIFORNIA', 'PR'),
(859, 'CALDEIRÃO GRANDE DO PIAUÍ', 'PI'),
(858, 'CALDEIRÃO GRANDE', 'BA'),
(857, 'CALDAZINHA', 'GO'),
(856, 'CALDAS NOVAS', 'GO'),
(855, 'CALDAS BRANDÃO', 'PB'),
(854, 'CALDAS', 'MG'),
(853, 'CALÇOENE', 'AP'),
(852, 'CALÇADO', 'PE'),
(851, 'CALCADO', 'PE'),
(850, 'CAJURU', 'SP'),
(849, 'CAJURI', 'MG'),
(848, 'CAJUEIRO DA PRAIA', 'PI'),
(847, 'CAJUEIRO', 'AL'),
(846, 'CAJOBI', 'SP'),
(845, 'CAJAZEIRINHAS', 'PB'),
(844, 'CAJAZEIRAS DO PIAUÍ', 'PI'),
(843, 'CAJAZEIRAS', 'PB'),
(842, 'CAJATI', 'SP'),
(841, 'CAJARI', 'MA'),
(840, 'CAJAPIO', 'MA'),
(839, 'CAJAMAR', 'SP'),
(838, 'CAIUÁ', 'SP'),
(837, 'CAIRU', 'BA'),
(836, 'CAIEIRAS', 'SP'),
(835, 'CAICO', 'RN'),
(834, 'CAIÇARA DO RIO DO VENTO', 'RN'),
(833, 'CAIÇARA DO NORTE', 'RN'),
(832, 'CAIÇARA', 'RS'),
(831, 'CAIÇARA', 'PB'),
(830, 'CAIBI', 'SC'),
(829, 'CAIBATE', 'RS'),
(828, 'CAIAPÔNIA', 'GO'),
(827, 'CAIANA', 'MG'),
(826, 'CAIABU', 'SP'),
(825, 'CAFEZAL DO SUL', 'PR'),
(824, 'CAFELÂNDIA', 'PR'),
(823, 'CAFEARA', 'PR'),
(822, 'CAFARNAUM', 'BA'),
(821, 'CAETITÉ', 'BA'),
(820, 'CAETÉS', 'PE'),
(819, 'CAETÉ', 'MG'),
(818, 'CAETANOS', 'BA'),
(817, 'CAETANÓPOLIS', 'MG'),
(816, 'CAEM', 'BA'),
(815, 'CACULÉ', 'BA'),
(814, 'CAÇU', 'GO'),
(813, 'CACONDE', 'SP'),
(812, 'CACOAL', 'RO'),
(811, 'CACIQUE DOBLE', 'RS'),
(810, 'CACIMBINHAS', 'AL'),
(809, 'CACIMBAS', 'PB'),
(808, 'CACIMBA DE DENTRO', 'PB'),
(807, 'CACIMBA DE AREIA', 'PB'),
(806, 'CACHOEIRO DO ITAPEMIRIM', 'ES'),
(805, 'CACHOEIRINHA DO TOCANTINS', 'TO'),
(804, 'CACHOEIRINHA', 'RS'),
(803, 'CACHOEIRINHA', 'PE'),
(802, 'CACHOEIRAS DE MACAÇU', 'RJ'),
(801, 'CACHOEIRA PAULISTA', 'SP'),
(800, 'CACHOEIRA GRANDE', 'MA'),
(799, 'CACHOEIRA DOURADA', 'GO'),
(798, 'CACHOEIRA DOS ÍNDIOS', 'PB'),
(797, 'CACHOEIRA DO SUL', 'RS'),
(796, 'CACHOEIRA DO PIRIA', 'PA'),
(795, 'CACHOEIRA DO PAJEU', 'MG'),
(794, 'CACHOEIRA DO ARARI', 'PA'),
(793, 'CACHOEIRA DE MINAS', 'MG'),
(792, 'CACHOEIRA DE GOIÁS', 'GO'),
(791, 'CACHOEIRA DA PRATA', 'MG'),
(790, 'CACHOEIRA ALTA', 'GO'),
(789, 'CACHOEIRA', 'BA'),
(788, 'CÁCERES', 'MT'),
(787, 'CACEQUI', 'RS'),
(786, 'CACAULÂNDIA', 'RO'),
(785, 'CAÇAPAVA DO SUL', 'RS'),
(784, 'CAÇAPAVA', 'SP'),
(783, 'CACADOR', 'SC'),
(782, 'CABROBO', 'PE'),
(781, 'CABREUVA', 'SP'),
(780, 'CABRÁLIA PAULISTA', 'SP'),
(779, 'CABO VERDE', 'MG'),
(778, 'CABO FRIO', 'RJ'),
(777, 'CABO DE SANTO AGOSTINHO', 'PE'),
(776, 'CABEDELO', 'PB'),
(775, 'CABECEIRAS DO PIAUÍ', 'PI'),
(774, 'CABECEIRAS', 'GO'),
(773, 'CABECEIRA GRANDE', 'MG'),
(772, 'CABACEIRAS DO PARAGUAÇU', 'BA'),
(771, 'CABACEIRAS', 'PB'),
(770, 'CAATIBA', 'BA'),
(769, 'CAARAPO', 'MS'),
(768, 'CAAPORA', 'PB'),
(767, 'CAAPIRANGA', 'AM'),
(766, 'BUTIA', 'RS'),
(765, 'BURITIZEIRO', 'MG'),
(764, 'BURITIZAL', 'SP'),
(763, 'BURITIS', 'RO'),
(762, 'BURITIS', 'MG'),
(761, 'BURITIRANA', 'MA'),
(760, 'BURITIRAMA', 'BA'),
(759, 'BURITINÓPOLIS', 'GO'),
(758, 'BURITICUPU', 'MA'),
(757, 'BURITI DOS MONTES', 'PI'),
(756, 'BURITI DOS LOPES', 'PI'),
(755, 'BURITI DO TOCANTINS', 'TO'),
(754, 'BURITI DE GOIÁS', 'GO'),
(753, 'BURITI BRAVO', 'MA'),
(752, 'BURITI ALEGRE', 'GO'),
(751, 'BURITI', 'MA'),
(750, 'BURITAMA', 'SP'),
(749, 'BURI', 'SP'),
(748, 'BUJARU', 'PA'),
(747, 'BUJARI', 'AC'),
(746, 'BUÍQUE', 'PE'),
(745, 'BUGRE', 'MG'),
(744, 'BUERAREMA', 'BA'),
(743, 'BUENOS AIRES', 'PE'),
(742, 'BUENÓPOLIS', 'MG'),
(741, 'BUENO BRANDÃO', 'MG'),
(740, 'BRUSQUE', 'SC'),
(739, 'BRUNÓPOLIS', 'SC'),
(738, 'BRUMADO', 'BA'),
(737, 'BRUMADINHO', 'MG'),
(736, 'BROTAS DE MACAÚBAS', 'BA'),
(735, 'BROTAS', 'SP'),
(734, 'BRODOWSKI', 'SP'),
(733, 'BROCHIER', 'RS'),
(732, 'BRITANIA', 'GO'),
(731, 'BREVES', 'PA'),
(730, 'BREU BRANCO', 'PA'),
(729, 'BREJOLÂNDIA', 'BA'),
(728, 'BREJOES', 'BA'),
(727, 'BREJO SANTO', 'CE'),
(726, 'BREJO GRANDE DO ARÁGUAIA', 'PA'),
(725, 'BREJO GRANDE', 'SE'),
(724, 'BREJO DOS SANTOS', 'PB'),
(723, 'BREJO DO PIAUÍ', 'PI'),
(722, 'BREJO DO CRUZ', 'PB'),
(721, 'BREJO DE AREIA', 'MA'),
(720, 'BREJO DA MADRE DE DEUS', 'PE'),
(719, 'BREJO ALEGRE', 'SP'),
(718, 'BREJO', 'MA'),
(717, 'BREJINHO DE NAZARÉ', 'TO'),
(716, 'BREJINHO', 'PE'),
(715, 'BREJETUBA', 'ES'),
(714, 'BREJÃO', 'PE'),
(713, 'BRAZILÂNDIA DO OESTE', 'RO'),
(712, 'BRAZABRANTES', 'GO'),
(711, 'BRAUNAS', 'MG'),
(710, 'BRAÚNA', 'SP'),
(709, 'BRASÓPOLIS', 'MG'),
(708, 'BRASNORTE', 'MT'),
(707, 'BRASÍLIA DE MINAS', 'MG'),
(706, 'BRASILIA', 'DF'),
(705, 'BRASILEIRA', 'PI'),
(704, 'BRASILÉIA', 'AC'),
(703, 'BRASILÂNDIA DO TOCANTINS', 'TO'),
(702, 'BRASILÂNDIA DO SUL', 'PR'),
(701, 'BRASILÂNDIA DE MINAS', 'MG'),
(700, 'BRASILÂNDIA', 'MS'),
(699, 'BRASIL NOVO', 'PA'),
(698, 'BRAS PIRES', 'MG'),
(697, 'BRANQUINHA', 'AL'),
(696, 'BRAGANEY', 'PR'),
(695, 'BRAGANÇA PAULISTA', 'SP'),
(694, 'BRAGANÇA', 'PA'),
(693, 'BRAGA', 'RS'),
(692, 'BRACO DO TROMBUDO', 'SC'),
(691, 'BRACO DO NORTE', 'SC'),
(690, 'BOTUVERA', 'SC'),
(689, 'BOTUPORA', 'BA'),
(688, 'BOTUMIRIM', 'MG'),
(687, 'BOTUCATU', 'SP'),
(686, 'BOTELHOS', 'MG'),
(685, 'BOSSOROCA', 'RS'),
(684, 'BORRAZÓPOLIS', 'PR'),
(683, 'BOREBI', 'SP'),
(682, 'BORDA DA MATA', 'MG'),
(681, 'BORBOREMA', 'PB'),
(680, 'BORBA', 'AM'),
(679, 'BORACEIA', 'SP'),
(678, 'BORA', 'SP'),
(677, 'BOQUIRA', 'BA'),
(676, 'BOQUIM', 'SE'),
(675, 'BOQUEIRÃO DO PIAUÍ', 'PI'),
(674, 'BOQUEIRÃO DO LEÃO', 'RS'),
(673, 'BOQUEIRÃO', 'PB'),
(672, 'BONÓPOLIS', 'GO'),
(671, 'BONITO DE SANTA FÉ', 'PB'),
(670, 'BONITO', 'BA'),
(669, 'BONINAL', 'BA'),
(668, 'BONFINÓPOLIS DE MINAS', 'MG'),
(667, 'BONFINÓPOLIS', 'GO'),
(666, 'BONFIM DO PIAUÍ', 'PI'),
(665, 'BONFIM', 'RR'),
(664, 'BONFIM', 'MG'),
(663, 'BOMBINHAS', 'SC'),
(662, 'BOM SUCESSO', 'PR'),
(661, 'BOM SUCESSO DE ITARARÉ', 'SP'),
(660, 'BOM SUCESSO', 'PB'),
(659, 'BOM SUCESSO', 'MG'),
(658, 'BOM RETIRO DO SUL', 'RS'),
(657, 'BOM RETIRO', 'SC'),
(656, 'BOM REPOUSO', 'MG'),
(655, 'BOM PROGRESSO', 'RS'),
(654, 'BOM PRINCIPIO DO PIAUÍ', 'PI'),
(653, 'BOM PRINCIPIO', 'RS'),
(652, 'BOM LUGAR', 'MA'),
(651, 'BOM JESUS DOS PERDÕES', 'SP'),
(650, 'BOM JESUS DO TOCANTINS', 'PA'),
(649, 'BOM JESUS DO OESTE', 'SC'),
(648, 'BOM JESUS DO NORTE', 'ES'),
(647, 'BOM JESUS DO GALHO', 'MG'),
(646, 'BOM JESUS DO AMPARO', 'MG'),
(645, 'BOM JESUS DE GOIÁS', 'GO'),
(644, 'BOM JESUS DAS SELVAS', 'MA'),
(643, 'BOM JESUS DA SERRA', 'BA'),
(642, 'BOM JESUS DA PENHA', 'MG'),
(641, 'BOM JESUS DA LAPA', 'BA'),
(640, 'BOM JESUS DE ITABAPOANA', 'RJ'),
(639, 'BOM JESUS', 'SC'),
(638, 'BOM JESUS', 'PB'),
(637, 'BOM JARDIM DE MINAS', 'MG'),
(636, 'BOM JARDIM DE GOIÁS', 'GO'),
(635, 'BOM JARDIM DA SERRA', 'SC'),
(634, 'BOM JARDIM', 'MA'),
(633, 'BOM DESPACHO', 'MG'),
(632, 'BOM CONSELHO', 'PE'),
(631, 'BOM CAVATI', 'MG'),
(630, 'BOITUVA', 'SP'),
(629, 'BOFETE', 'SP'),
(628, 'BODOQUENA', 'MS'),
(627, 'BODOCO', 'PE'),
(626, 'BODO', 'RN'),
(625, 'BOCAIUVA DO SUL', 'PR'),
(624, 'BOCAIUVA', 'MG'),
(623, 'BOCAINA DO SUL', 'SC'),
(622, 'BOCAINA DE MINAS', 'MG'),
(621, 'BOCAINA', 'PI'),
(619, 'BOCA DA MATA', 'AL'),
(618, 'BOA VISTA DO TUPIM', 'BA'),
(617, 'BOA VISTA DO SUL', 'RS'),
(616, 'BOA VISTA DO RAMOS', 'AM'),
(615, 'BOA VISTA DO GURUPI', 'MA'),
(614, 'BOA VISTA DO BURICA', 'RS'),
(613, 'BOA VISTA DAS MISSÕES', 'RS'),
(612, 'BOA VISTA DA APARECIDA', 'PR'),
(611, 'BOA VISTA', 'RR'),
(610, 'BOA VISTA', 'PB'),
(609, 'BOA VIAGEM', 'CE'),
(608, 'BOA VENTURA DE SÃO ROQUE', 'PR'),
(607, 'BOA VENTURA', 'PB'),
(606, 'BOA SAÚDE', 'RN'),
(605, 'BOA NOVA', 'BA'),
(604, 'BOA HORA', 'PI'),
(603, 'BOA ESPERANÇA DO IGUAÇU', 'PR'),
(602, 'BOA ESPERANÇA DO SUL', 'SP'),
(601, 'BOA ESPERANÇA', 'PR'),
(600, 'BOA ESPERANÇA', 'ES'),
(599, 'BLUMENAU', 'SC'),
(598, 'BITURUNA', 'PR'),
(597, 'BIRITINGA', 'BA'),
(596, 'BIRITIBA-MIRIM', 'SP'),
(595, 'BIRIGUI', 'SP'),
(594, 'BIQUINHAS', 'MG'),
(593, 'BILAC', 'SP'),
(592, 'BIGUAÇU', 'SC'),
(591, 'BICAS', 'MG'),
(590, 'BIAS FORTES', 'MG'),
(589, 'BEZERROS', 'PE'),
(588, 'BETIM', 'MG'),
(587, 'BETANIA DO PIAUÍ', 'PI'),
(586, 'BETANIA', 'PE'),
(585, 'BERURI', 'AM'),
(584, 'BERTÓPOLIS', 'MG'),
(583, 'BERTOLÍNIA', 'PI');
INSERT INTO `municipios` (`codigo`, `nome`, `uf`) VALUES
(582, 'BERTIOGA', 'SP'),
(581, 'BERNARDO SAYÃO', 'TO'),
(580, 'BERNARDINO DE CAMPOS', 'SP'),
(579, 'BERNARDINO BATISTA', 'PB'),
(578, 'BERIZAL', 'MG'),
(577, 'BERILO', 'MG'),
(576, 'BEQUIMÃO', 'MA'),
(575, 'BENTO GONÇALVES', 'RS'),
(574, 'BENTO FERNANDES', 'RN'),
(573, 'BENTO DE ABREU', 'SP'),
(572, 'BENJAMIN CONSTANT', 'AM'),
(571, 'BENJAMIN CONSTANT DO SUL', 'RS'),
(570, 'BENEVIDES', 'PA'),
(569, 'BENEDITO NOVO', 'SC'),
(568, 'BENEDITO LEITE', 'MA'),
(567, 'BENEDITINOS', 'PI'),
(566, 'BELTERRA', 'PA'),
(565, 'BELO VALE', 'MG'),
(564, 'BELO ORIENTE', 'MG'),
(563, 'BELO MONTE', 'AL'),
(562, 'BELO JARDIM', 'PE'),
(561, 'BELO HORIZONTE', 'MG'),
(560, 'BELO CAMPO', 'BA'),
(559, 'BELMONTE', 'BA'),
(558, 'BELMIRO BRAGA', 'MG'),
(557, 'BELFORD ROXO', 'RJ'),
(556, 'BELÉM DO PIAUÍ', 'PI'),
(555, 'BELÉM DO BREJO DO CRUZ', 'PB'),
(554, 'BELÉM DE SÃO FRANCISCO', 'PE'),
(553, 'BELÉM DE MARIA', 'PE'),
(552, 'BELÉM', 'AL'),
(551, 'BELÉM', 'PB'),
(550, 'BELEM', 'PA'),
(549, 'BELÁGUA', 'MA'),
(548, 'BELA VISTA DO PARAÍSO', 'PR'),
(547, 'BELA VISTA DO TOLDO', 'SC'),
(546, 'BELA VISTA DO PIAUÍ', 'PI'),
(545, 'BELA VISTA DE MINAS', 'MG'),
(544, 'BELA VISTA DE GOIÁS', 'GO'),
(543, 'BELA VISTA DA CAROBA', 'PR'),
(542, 'BELA VISTA', 'MS'),
(541, 'BELA VISTA', 'MG'),
(540, 'BELA CRUZ', 'CE'),
(539, 'BEBERIBE', 'CE'),
(538, 'BEBEDOURO', 'SP'),
(537, 'BAYEUX', 'PB'),
(536, 'BAURU', 'SP'),
(535, 'BATURITE', 'CE'),
(534, 'BATATAIS', 'SP'),
(533, 'BATALHA', 'AL'),
(532, 'BATAIPORA', 'MS'),
(531, 'BATÁGUASSU', 'MS'),
(530, 'BASTOS', 'SP'),
(529, 'BARUERI', 'SP'),
(528, 'BARROSO', 'MG'),
(527, 'BARROS CASSAL', 'RS'),
(526, 'BARROQUINHA', 'CE'),
(525, 'BARROLÂNDIA', 'TO'),
(524, 'BARRO PRETO', 'BA'),
(523, 'BARRO DURO', 'PI'),
(522, 'BARRO ALTO', 'BA'),
(521, 'BARRO', 'CE'),
(520, 'BARRINHA', 'SP'),
(519, 'BARRETOS', 'SP'),
(518, 'BARRERAS', 'PE'),
(517, 'BARREIROS', 'PE'),
(516, 'BARREIRINHAS', 'MA'),
(515, 'BARREIRINHA', 'AM'),
(514, 'BARREIRAS DO PIAUÍ', 'PI'),
(513, 'BARREIRAS', 'BA'),
(512, 'BARREIRA', 'CE'),
(511, 'BARRAS', 'PI'),
(510, 'BARRAÇÃO', 'RS'),
(509, 'BARRACÃO', 'PR'),
(508, 'BARRA VELHA', 'SC'),
(507, 'BARRA MANSA', 'RJ'),
(506, 'BARRA LONGA', 'MG'),
(505, 'BARRA FUNDA', 'RS'),
(504, 'BARRA DOS COQUEIROS', 'SE'),
(503, 'BARRA DO TURVO', 'SP'),
(502, 'BARRA DO ROCHA', 'BA'),
(501, 'BARRA DO RIO AZUL', 'RS'),
(500, 'BARRA DO RIBEIRO', 'RS'),
(499, 'BARRA DO QUARAI', 'RS'),
(498, 'BARRA DO PIRAÍ', 'RJ'),
(497, 'BARRA DO OURO', 'TO'),
(496, 'BARRA DO MENDES', 'BA'),
(495, 'BARRA DO JACARÉ', 'PR'),
(494, 'BARRA DO GUARITA', 'RS'),
(493, 'BARRA DO GARÇAS', 'MT'),
(492, 'BARRA DO CORDA', 'MA'),
(491, 'BARRA DO CHOCA', 'BA'),
(490, 'BARRA DO CHAPÉU', 'SP'),
(489, 'BARRA DO BUGRES', 'MT'),
(488, 'BARRA DE SÃO MIGUEL', 'AL'),
(487, 'BARRA DE SÃO FRANCISCO', 'ES'),
(486, 'BARRA DE SANTO ANTÔNIO', 'AL'),
(485, 'BARRA DE SANTANA', 'PB'),
(484, 'BARRA DE SANTA ROSA', 'PB'),
(483, 'BARRA DE GUABIRABA', 'PE'),
(482, 'BARRA DA ESTIVA', 'BA'),
(481, 'BARRA BONITA', 'SC'),
(480, 'BARRA', 'BA'),
(479, 'BARIRI', 'SP'),
(478, 'BARCELOS', 'AM'),
(477, 'BARCELONA', 'RN'),
(476, 'BARBOSA FERRAZ', 'PR'),
(475, 'BARBOSA', 'SP'),
(474, 'BARBALHA', 'CE'),
(473, 'BARBACENA', 'MG'),
(472, 'BARAÚNA', 'PB'),
(471, 'BARÃO DO TRIUNFO', 'RS'),
(470, 'BARÃO DO GRAJAÚ', 'MA'),
(469, 'BARÃO DE MONTE ALTO', 'MG'),
(468, 'BARÃO DE MELGAÇO', 'MT'),
(467, 'BARÃO DE COTEGIPE', 'RS'),
(466, 'BARÃO DE COCAIS', 'MG'),
(465, 'BARÃO DE ANTONINA', 'SP'),
(464, 'BARÃO', 'RS'),
(463, 'BANZAE', 'BA'),
(462, 'BANNACH', 'PA'),
(461, 'BANDEIRANTES', 'MS'),
(460, 'BANDEIRANTE', 'TO'),
(459, 'BANDEIRA DO SUL', 'MG'),
(458, 'BANDEIRA', 'MG'),
(457, 'BANANEIRAS', 'PB'),
(456, 'BANANAL', 'SP'),
(455, 'BANABUIU', 'CE'),
(454, 'BAMBUI', 'MG'),
(453, 'BALSAS', 'MA'),
(452, 'BALSAMO', 'SP'),
(451, 'BALSA NOVA', 'PR'),
(450, 'BALNEÁRIO PINHAL', 'RS'),
(449, 'BALNEÁRIO GAIVOTA', 'SC'),
(448, 'BALNEÁRIO CAMBORIÚ', 'SC'),
(447, 'BALNEÁRIO BARRA DO SUL', 'SC'),
(446, 'BALIZA', 'GO'),
(445, 'BALDIM', 'MG'),
(444, 'BALBINOS', 'SP'),
(443, 'BAIXO GUANDU', 'ES'),
(442, 'BAIXIO', 'CE'),
(441, 'BAIXA GRANDE DO RIBEIRO', 'PI'),
(440, 'BAIXA GRANDE', 'BA'),
(439, 'BAIRRA DALCANTARA', 'PI'),
(438, 'BAIÃO', 'PA'),
(437, 'BAIANÓPOLIS', 'BA'),
(436, 'BAIA FORMOSA', 'RN'),
(435, 'BAIA DA TRAICÃO', 'PB'),
(434, 'BAGRE', 'PA'),
(433, 'BAGÉ', 'RS'),
(432, 'BAEPENDI', 'MG'),
(431, 'BADY BASSITT', 'SP'),
(430, 'BAÇURITUBA', 'MA'),
(429, 'BACURI', 'MA'),
(428, 'BACABAL', 'MA'),
(427, 'BABAÇULÂNDIA', 'TO'),
(426, 'AXIXÁ DO TOCANTINS', 'TO'),
(425, 'AXIXA', 'MA'),
(424, 'AVELINÓPOLIS', 'GO'),
(423, 'AVELINO LOPES', 'PI'),
(422, 'AVEIRO', 'PA'),
(421, 'AVARE', 'SP'),
(420, 'AVANHANDAVA', 'SP'),
(419, 'AVAI', 'SP'),
(418, 'AUTAZES', 'AM'),
(417, 'AURORA DO TOCANTINS', 'TO'),
(416, 'AURORA DO PARÁ', 'PA'),
(415, 'AURORA', 'SC'),
(414, 'AURORA', 'CE'),
(413, 'AURILÂNDIA', 'GO'),
(412, 'AURIFLAMA', 'SP'),
(411, 'AURELINO LEAL', 'BA'),
(410, 'AUREA', 'RS'),
(409, 'AUGUSTO PESTANA', 'RS'),
(408, 'AUGUSTO DE LIMA', 'MG'),
(407, 'AUGUSTO CORRÊA', 'PA'),
(406, 'AUGUSTINÓPOLIS', 'TO'),
(405, 'ATILIO VIVACQUA', 'ES'),
(404, 'ATIBAIA', 'SP'),
(403, 'ATALEIA', 'MG'),
(402, 'ATALANTA', 'SC'),
(401, 'ATALAIA DO NORTE', 'AM'),
(400, 'ATALAIA', 'PR'),
(399, 'ATALAIA', 'AL'),
(398, 'ASTORGA', 'PR'),
(397, 'ASTOLFO DUTRA', 'MG'),
(396, 'ASSUNÇÃO DO PIAUÍ', 'PI'),
(395, 'ASSUNCÃO', 'PB'),
(394, 'ASSIS CHATEAUBRIAND', 'PR'),
(393, 'ASSIS BRASIL', 'AC'),
(392, 'ASSIS', 'SP'),
(391, 'ASSARE', 'CE'),
(390, 'ASSAÍ', 'PR'),
(389, 'ASPÁSIA', 'SP'),
(388, 'ASCURRA', 'SC'),
(387, 'ARVOREZINHA', 'RS'),
(386, 'ARVOREDO', 'SC'),
(385, 'ARUNA', 'GO'),
(384, 'ARUJA', 'SP'),
(383, 'ARUANA', 'GO'),
(382, 'ARTUR NOGUEIRA', 'SP'),
(381, 'ARROIO TRINTA', 'SC'),
(380, 'ARROIO GRANDE', 'RS'),
(379, 'ARROIO DOS RATOS', 'RS'),
(378, 'ARROIO DO TIGRE', 'RS'),
(377, 'ARROIO DO SAL', 'RS'),
(376, 'ARROIO DO PADRE', 'RS'),
(375, 'ARROIO DO MEIO', 'RS'),
(374, 'ARRAIAS', 'TO'),
(373, 'ARRAIAL DO CABO', 'RJ'),
(372, 'ARRAIAL', 'PI'),
(371, 'AROEIRAS', 'PB'),
(370, 'AROAZES', 'PI'),
(369, 'ARNEIROZ', 'CE'),
(368, 'ARMAZEM', 'SC'),
(367, 'ARMAÇÃO DE BÚZIOS', 'RJ'),
(366, 'ARIRANHA DO IVAI', 'PR'),
(365, 'ARIRANHA', 'SP'),
(364, 'ARIQUEMES', 'RO'),
(363, 'ARIPUANÃ', 'MT'),
(362, 'ARINOS', 'MG'),
(361, 'ARICANDUVA', 'MG'),
(360, 'ARGIRITA', 'MG'),
(359, 'ARES', 'RN'),
(358, 'ARENÓPOLIS', 'GO'),
(357, 'ARENÁPOLIS', 'MT'),
(356, 'AREIÓPOLIS', 'SP'),
(355, 'AREIAS', 'SP'),
(354, 'AREIAL', 'PB'),
(353, 'AREIA DE BARAÚNAS', 'PB'),
(352, 'AREIA BRANCA', 'SE'),
(351, 'AREIA BRANCA', 'RN'),
(350, 'AREIA', 'PB'),
(349, 'AREALVA', 'SP'),
(348, 'AREAL', 'RJ'),
(347, 'AREADO', 'MG'),
(346, 'ARCOVERDE', 'PE'),
(345, 'ARCOS', 'MG'),
(344, 'ARCO IRIS', 'SP'),
(343, 'ARCEBURGO', 'MG'),
(342, 'ARAXA', 'MG'),
(341, 'ARAUJOS', 'MG'),
(340, 'ARAUCARIA', 'PR'),
(339, 'ARAUÁ', 'SE'),
(338, 'ARATUIPE', 'BA'),
(337, 'ARATUBA', 'CE'),
(336, 'ARATIBA', 'RS'),
(335, 'ARATACA', 'BA'),
(334, 'ARARUNA', 'PR'),
(333, 'ARARUAMA', 'RJ'),
(332, 'ARARIPINA', 'PE'),
(331, 'ARARIPE', 'CE'),
(330, 'ARARICÁ', 'RS'),
(329, 'ARARENDÁ', 'CE'),
(328, 'ARARAS', 'SP'),
(327, 'ARARAQUARA', 'SP'),
(326, 'ARARANGUA', 'SC'),
(325, 'ARARA', 'PB'),
(324, 'ARAQUARI', 'SC'),
(323, 'ARAPUTANGA', 'MT'),
(322, 'ARAPUA', 'MG'),
(321, 'ARAPOTI', 'PR'),
(320, 'ARAPORA', 'MG'),
(319, 'ARAPONGAS', 'PR'),
(318, 'ARAPONGA', 'MG'),
(317, 'ARAPOEMA', 'TO'),
(316, 'ARAPIRINA', 'PE'),
(315, 'ARAPIRACA', 'AL'),
(314, 'ARAPEI', 'SP'),
(313, 'ARANTINA', 'MG'),
(312, 'ARANDU', 'SP'),
(311, 'ARAMINA', 'SP'),
(310, 'ARAME', 'MA'),
(309, 'ARAMBARÉ', 'RS'),
(308, 'ARAMARI', 'BA'),
(307, 'ARAL MOREIRA', 'MS'),
(306, 'ARAIOSES', 'MA'),
(305, 'ARÁGUATINS', 'TO'),
(304, 'ARÁGUARI', 'MG'),
(303, 'ARÁGUAPAZ', 'GO'),
(302, 'ARAGUANÃ', 'MA'),
(301, 'ARÁGUAINA', 'TO'),
(300, 'ARÁGUAIANA', 'MT'),
(299, 'ARAGUAÇU', 'TO'),
(298, 'ARÁGUACEMA', 'TO'),
(297, 'ARAGOMINAS', 'TO'),
(296, 'ARAGOIANIA', 'GO'),
(295, 'ARAGARÇAS', 'GO'),
(294, 'ARAÇUAI', 'MG'),
(293, 'ARAÇU', 'GO'),
(292, 'ARACRUZ', 'ES'),
(291, 'ARAÇOIABA DA SERRA', 'SP'),
(290, 'ARAÇOIABA', 'PE'),
(289, 'ARACOIABA', 'CE'),
(288, 'ARACITABA', 'MG'),
(287, 'ARACI', 'BA'),
(286, 'ARAÇATUBA', 'SP'),
(285, 'ARAÇATU', 'BA'),
(284, 'ARAÇATI', 'CE'),
(283, 'ARAÇAS', 'BA'),
(282, 'ARAÇARIGUAMA', 'SP'),
(281, 'ARACAJU', 'SE'),
(280, 'ARAÇAI', 'MG'),
(279, 'ARAÇAGI', 'PB'),
(278, 'ARABUTÃ', 'SC'),
(277, 'AQUIRAZ', 'CE'),
(276, 'AQUIDAUANA', 'MS'),
(275, 'AQUIDABÃ', 'SE'),
(274, 'APUIARÉS', 'CE'),
(273, 'APUI', 'AM'),
(272, 'APUCARANA', 'PR'),
(271, 'APUAREMA', 'BA'),
(270, 'APORE', 'GO'),
(269, 'APORA', 'BA'),
(268, 'APODI', 'RN'),
(267, 'APIUNA', 'SC'),
(266, 'APICUM AÇU', 'MA'),
(265, 'APIAÍ', 'SP'),
(264, 'APIACÁS', 'MT'),
(263, 'APIACA', 'ES'),
(262, 'APERIBÉ', 'RJ'),
(261, 'APARECIDA DO OESTE', 'SP'),
(260, 'APARECIDA DO TABOADO', 'MS'),
(259, 'APARECIDA DO RIO NEGRO', 'TO'),
(258, 'APARECIDA DO RIO DOCE', 'GO'),
(257, 'APARECIDA DE GOIANIA', 'GO'),
(256, 'APARECIDA', 'SP'),
(255, 'APARECIDA', 'PB'),
(254, 'ANTÔNIO PRADO DE MINAS', 'MG'),
(253, 'ANTÔNIO PRADO', 'RS'),
(252, 'ANTÔNIO OLINTO', 'PR'),
(251, 'ANTÔNIO MARTINS', 'RN'),
(250, 'ANTÔNIO JOÃO', 'MS'),
(249, 'ANTÔNIO GONÇALVES', 'BA'),
(248, 'ANTÔNIO DIAS', 'MG'),
(247, 'ANTÔNIO CARLOS', 'MG'),
(246, 'ANTÔNIO CARDOSO', 'BA'),
(245, 'ANTÔNIO ALMEIDA', 'PI'),
(244, 'ANTONINA DO NORTE', 'CE'),
(243, 'ANTONINA', 'PR'),
(242, 'ANTAS', 'BA'),
(241, 'ANTA GORDA', 'RS'),
(240, 'ANORI', 'AM'),
(239, 'ANITAPOLIS', 'SC'),
(238, 'ANITA GARIBALDI', 'SC'),
(237, 'ANISIO DE ABREU', 'PI'),
(236, 'ANICUNS', 'GO'),
(235, 'ANHUMAS', 'SP'),
(234, 'ANHEMBI', 'SP'),
(233, 'ANHANGUERA', 'GO'),
(232, 'ANGULO', 'PR'),
(231, 'ANGUERA', 'BA'),
(230, 'ANGRA DOS REIS', 'RJ'),
(229, 'ANGICOS', 'RN'),
(228, 'ANGICO', 'TO'),
(227, 'ANGICAL DO PIAUÍ', 'PI'),
(226, 'ANGICAL', 'BA'),
(225, 'ANGELINA', 'SC'),
(224, 'ANGELIM', 'PE'),
(223, 'ANGÉLICA', 'MS'),
(222, 'ANGELÂNDIA', 'MG'),
(221, 'ANGATUBA', 'SP'),
(220, 'ANDRELÂNDIA', 'MG'),
(219, 'ANDRÉ DA ROCHA', 'RS'),
(218, 'ANDRADINA', 'SP'),
(217, 'ANDRADAS', 'MG'),
(216, 'ANDORINHA', 'BA'),
(215, 'ANDIRA', 'PR'),
(214, 'ANDARAI', 'BA'),
(213, 'ANCHIETA', 'ES'),
(212, 'ANAURILÂNDIA', 'MS'),
(211, 'ANASTÁCIO', 'MS'),
(210, 'ANAPURUS', 'MA'),
(209, 'ANAPU', 'PA'),
(208, 'ANÁPOLIS', 'GO'),
(207, 'ANANINDEUA', 'PA'),
(206, 'ANANÁS', 'TO'),
(205, 'ANAMA', 'AM'),
(204, 'ANALÂNDIA', 'SP'),
(203, 'ANAJATUBA', 'MA'),
(202, 'ANAJÁS', 'PA'),
(201, 'ANAHY', 'PR'),
(200, 'ANAGÉ', 'BA'),
(199, 'ANADIA', 'AL'),
(198, 'AMPÉRE', 'PR'),
(197, 'AMPARO DE SÃO FRANCISCO', 'SE'),
(196, 'AMPARO DA SERRA', 'MG'),
(195, 'AMPARO', 'SP'),
(194, 'AMPARO', 'PB'),
(193, 'AMORINÓPOLIS', 'GO'),
(192, 'AMONTADA', 'CE'),
(191, 'AMETISTA DO SUL', 'RS'),
(190, 'AMÉRICO DE CAMPOS', 'SP'),
(189, 'AMÉRICO BRASILIENSE', 'SP'),
(188, 'AMÉRICANO DO BRASIL', 'GO'),
(187, 'AMÉRICANA', 'SP'),
(186, 'AMÉRICA DOURADA', 'BA'),
(185, 'AMÉLIA RODRIGUES', 'BA'),
(184, 'AMAZONAS', 'PR'),
(183, 'AMATURÁ', 'AM'),
(182, 'AMARGOSA', 'BA'),
(181, 'AMARANTE DO MARANHÃO', 'MA'),
(180, 'AMARANTE', 'PI'),
(179, 'AMARALINA', 'GO'),
(178, 'AMARAL FERRADOR', 'RS'),
(177, 'AMARAJI', 'PE'),
(176, 'AMAPORÃ', 'PR'),
(175, 'AMAPÁ DO MARANHÃO', 'MA'),
(174, 'AMAPÁ', 'AP'),
(173, 'AMAMBAÍ', 'MS'),
(172, 'AMAJARI', 'RR'),
(171, 'ALVORADA DO OESTE', 'RO'),
(170, 'ALVORADA DO SUL', 'PR'),
(169, 'ALVORADA DO NORTE', 'GO'),
(168, 'ALVORADA DO GURGUEIRA', 'PI'),
(167, 'ALVORADA DE MINAS', 'MG'),
(166, 'ALVORADA', 'RS'),
(165, 'ALVINÓPOLIS', 'MG'),
(164, 'ALVINLÂNDIA', 'SP'),
(163, 'ÁLVARO DE CARVALHO', 'SP'),
(162, 'ÁLVARES MACHADO', 'SP'),
(161, 'ALVARES FLORENCE', 'SP'),
(160, 'ALVARENGA', 'MG'),
(159, 'ALVARÃES', 'AM'),
(158, 'ALUMINIO', 'SP'),
(157, 'ALTOS', 'PI'),
(156, 'ALTONIA', 'PR'),
(155, 'ALTO TAQUARI', 'MT'),
(154, 'ALTO SANTO', 'CE'),
(153, 'ALTO RIO NOVO', 'ES'),
(152, 'ALTO RIO DOCE', 'MG'),
(151, 'ALTO PIQUIRI', 'PR'),
(150, 'ALTO PARNAÍBA', 'MA'),
(149, 'ALTO PARANÁ', 'PR'),
(148, 'ALTO PARAÍSO DE GOIÁS', 'GO'),
(147, 'ALTO PARAISO', 'RO'),
(146, 'ALTO PARAGUAI', 'MT'),
(145, 'ALTO LONGA', 'PI'),
(144, 'ALTO JEQUITIBÁ', 'MG'),
(143, 'ALTO HORIZONTE', 'GO'),
(142, 'ALTO GARÇAS', 'MT'),
(141, 'ALTO FELIZ', 'RS'),
(140, 'ALTO DO RODRIGUES', 'RN'),
(139, 'ALTO CAPARAÓ', 'MG'),
(138, 'ALTO BOA VISTA', 'MT'),
(137, 'ALTO BELA VISTA', 'SC'),
(136, 'ALTO ARAGUAIA', 'MT'),
(135, 'ALTO ALEGRE DO MARANHÃO', 'MA'),
(134, 'ALTO ALEGRE', 'RS'),
(133, 'ALTINÓPOLIS', 'SP'),
(132, 'ALTINHO', 'PE'),
(131, 'ALTEROSA', 'MG'),
(130, 'ALTANEIRA', 'CE'),
(129, 'ALTAMIRA DO PARANÁ', 'PR'),
(128, 'ALTAMIRA DO MARANHÃO', 'MA'),
(127, 'ALTAMIRA', 'PA'),
(126, 'ALTAIR', 'SP'),
(125, 'ALTA FLORESTA DO OESTE', 'RO'),
(124, 'ALTA FLORESTA', 'MT'),
(123, 'ALPINÓPOLIS', 'MG'),
(122, 'ALPESTRE', 'RS'),
(121, 'ALPERCATA', 'MG'),
(120, 'ALOÂNDIA', 'GO'),
(119, 'ALMIRANTE TAMANDARE', 'PR'),
(118, 'ALMINO AFONSO', 'RN'),
(117, 'ALMENARA', 'MG'),
(116, 'ALMEIRIM', 'PA'),
(115, 'ALMAS', 'TO'),
(114, 'ALMAGE', 'BA'),
(113, 'ALMADINA', 'BA'),
(112, 'ALIANÇA DO TOCANTINS', 'TO'),
(111, 'ALIANÇA', 'PE'),
(110, 'ALHANDRA', 'PB'),
(109, 'ALGODÃO DE JANDAIRA', 'PB'),
(108, 'ALFREDO WAGNER', 'SC'),
(107, 'ALFREDO VASCONCELOS', 'MG'),
(106, 'ALFREDO MARCONDES', 'SP'),
(105, 'ALFREDO CHAVES', 'ES'),
(104, 'ALFENAS', 'MG'),
(103, 'ALEXANIA', 'GO'),
(102, 'ALEXANDRIA', 'RN'),
(101, 'ALENQUER', 'PA'),
(100, 'ALÉM PARAÍBA', 'MG'),
(99, 'ALEGRIA', 'RS'),
(98, 'ALEGRETE DO PIAUÍ', 'PI'),
(97, 'ALEGRETE', 'RS'),
(96, 'ALEGRE', 'ES'),
(95, 'ALECRIM', 'RS'),
(94, 'ALDEIAS ALTAS', 'MA'),
(93, 'ALCOBAÇA', 'BA'),
(92, 'ALCINÓPOLIS', 'MS'),
(91, 'ALCANTIL', 'PB'),
(90, 'ALCÂNTARAS', 'CE'),
(89, 'ALCANTARA', 'MA'),
(88, 'ALBERTINA', 'MG'),
(87, 'ALAMBARI', 'SP'),
(86, 'ALAGOINHAS', 'BA'),
(85, 'ALAGOINHA DO PIAUÍ', 'PI'),
(84, 'ALAGOINHA', 'PE'),
(83, 'ALAGOINHA', 'PB'),
(82, 'ALAGOA NOVA', 'PB'),
(81, 'ALAGOA GRANDE', 'PB'),
(80, 'AJURICABA', 'RS'),
(79, 'AIURUOCA', 'MG'),
(78, 'AIUABA', 'CE'),
(77, 'AIQUARA', 'BA'),
(76, 'AIMORES', 'MG'),
(75, 'AGUIARNÓPOLIS', 'TO'),
(74, 'AGUIAR', 'PB'),
(73, 'AGUIA BRANCA', 'ES'),
(72, 'AGUDOS  DO SUL', 'PR'),
(71, 'AGUDOS', 'SP'),
(70, 'AGUDO', 'RS'),
(69, 'ÁGUAS VERMELHAS', 'MG'),
(68, 'ÁGUAS MORNAS', 'SC'),
(67, 'ÁGUAS LINDAS', 'GO'),
(66, 'ÁGUAS FRIAS', 'SC'),
(65, 'ÁGUAS FORMOSAS', 'MG'),
(64, 'ÁGUAS DE SÃO PEDRO', 'SP'),
(63, 'ÁGUAS DE SANTA BÁRBARA', 'SP'),
(62, 'ÁGUAS DE LINDÓIA', 'SP'),
(61, 'ÁGUAS DE CHAPECÓ', 'SC'),
(60, 'ÁGUAS DA PRATA', 'SP'),
(59, 'ÁGUAS BELAS', 'PE'),
(58, 'AGUANIL', 'MG'),
(57, 'ÁGUAI', 'SP'),
(56, 'ÁGUA SANTA', 'RS'),
(55, 'ÁGUA PRETA', 'PE'),
(54, 'ÁGUA NOVA', 'RN'),
(53, 'ÁGUA LIMPA', 'GO'),
(52, 'ÁGUA FRIA DE GOIÁS', 'GO'),
(51, 'ÁGUA FRIA', 'BA'),
(50, 'ÁGUA DOCE DO NORTE', 'ES'),
(49, 'ÁGUA DOCE DO MARANHÃO', 'MA'),
(48, 'ÁGUA DOCE', 'SC'),
(47, 'ÁGUA COMPRIDA', 'MG'),
(46, 'ÁGUA CLARA', 'MS'),
(45, 'ÁGUA BRANCA', 'PB'),
(44, 'ÁGUA BOA', 'MT'),
(43, 'ÁGUA BOA', 'MG'),
(42, 'ÁGUA AZUL DO NORTE', 'PA'),
(41, 'AGRONÔMICA', 'SC'),
(40, 'AGROLÂNDIA', 'SC'),
(39, 'AGRICOLÂNDIA', 'PI'),
(38, 'AGRESTINA', 'PE'),
(37, 'AFUA', 'PA'),
(36, 'AFRANIO', 'PE'),
(35, 'AFONSO CUNHA', 'MA'),
(34, 'AFONSO CLAUDIO', 'ES'),
(33, 'AFONSO BEZERRA', 'RN'),
(32, 'AFOGADOS DA INGAZEIRA', 'PE'),
(31, 'ADUSTINA', 'BA'),
(30, 'ADRIANÓPOLIS', 'PR'),
(29, 'ADOLFO', 'SP'),
(28, 'ADELÂNDIA', 'GO'),
(27, 'ADAMANTINA', 'SP'),
(26, 'AÇUCENA', 'MG'),
(25, 'AÇU', 'RN'),
(24, 'ACREUNA', 'GO'),
(23, 'ACORIZAL', 'MT'),
(22, 'ACOPIARA', 'CE'),
(21, 'ACEGUÁ', 'RS'),
(20, 'ACAUA', 'PI'),
(19, 'ACARI', 'RN'),
(18, 'ACARAU', 'CE'),
(17, 'ACARAPE', 'CE'),
(16, 'ACARÁ', 'PA'),
(15, 'ACAJUTIBA', 'BA'),
(14, 'AÇAILÂNDIA', 'MA'),
(13, 'ACAIACA', 'MG'),
(12, 'ABREULÂNDIA', 'TO'),
(11, 'ABREU E LIMA', 'PE'),
(10, 'ABRE CAMPO', 'MG'),
(9, 'ABELARDO LUZ', 'SC'),
(8, 'ABEL FIGUEIREDO', 'PA'),
(7, 'ABDON BATISTA', 'SC'),
(6, 'ABATIA', 'PR'),
(5, 'ABARE', 'BA'),
(4, 'ABAIRA', 'BA'),
(3, 'ABAIARA', 'CE'),
(2, 'ABAETÉTUBA', 'PA'),
(1, 'ABAETÉ', 'MG'),
(4263, 'SANTANA DO ARAGUAIA', 'PA'),
(4264, 'SANTANA DO CARIRI', 'CE'),
(4265, 'SANTANA DO DESERTO', 'MG'),
(4266, 'SANTANA DO GARAMBEU', 'MG'),
(4267, 'SANTANA DO IPANEMA', 'AL'),
(4268, 'SANTANA DO ITARARÉ', 'PR'),
(4269, 'SANTANA DO JACARÉ', 'MG'),
(4270, 'SANTANA DO LIVRAMENTO', 'RS'),
(4271, 'SANTANA DO MANHUAÇU', 'MG'),
(4272, 'SANTANA DO MARANHÃO', 'MA'),
(4273, 'SANTANA DO MATOS', 'RN'),
(4274, 'SANTANA DO MUNDAU', 'AL'),
(4275, 'SANTANA DO PARAÍSO', 'MG'),
(4276, 'SANTANA DE PARNAÍBA', 'SP'),
(4277, 'SANTANA DO PIAUÍ', 'PI'),
(4278, 'SANTANA DO PIRAPAMA', 'MG'),
(4279, 'SANTANA DO RIACHO', 'MG'),
(4280, 'SANTANA DO SERIDO', 'RN'),
(4281, 'SANTANA DOS GARROTES', 'PB'),
(4282, 'SANTANA DOS MONTES', 'MG'),
(4283, 'SANTANA DO SÃO FRANCISCO', 'SE'),
(4284, 'SANTANÁPOLIS', 'BA'),
(4285, 'SANTAREM', 'PA'),
(4286, 'SANTARÉM NOVO', 'PA'),
(4287, 'SANTIAGO', 'RS'),
(4288, 'SANTO ANTÔNIO DO AVENTUREIRO', 'MG'),
(4289, 'SANTO ANTÔNIO DO RETIRO', 'MG'),
(4290, 'SANTO AFONSO', 'MT'),
(4291, 'SANTO AMARO', 'BA'),
(4292, 'SANTO AMARO DA IMPERATRIZ', 'SC'),
(4293, 'SANTO AMARO DAS BROTAS', 'SE'),
(4294, 'SANTO AMARO DO MARANHÃO', 'MA'),
(4295, 'SANTO ANASTÁCIO', 'SP'),
(4296, 'SANTO ANDRÉ', 'SP'),
(4297, 'SANTO ANGELO', 'RS'),
(4298, 'SANTO ANTÔNIO', 'RN'),
(4299, 'SANTO ANTÔNIO DO MONTE', 'MG'),
(4300, 'SANTO ANTÔNIO DA ALEGRIA', 'SP'),
(4301, 'SANTO ANTÔNIO DA BARRA', 'GO'),
(4302, 'SANTO ANTÔNIO DAS MISSÕES', 'RS'),
(4303, 'SANTO ANTÔNIO DE GOIÁS', 'GO'),
(4304, 'SANTO ANTÔNIO DE JESUS', 'BA'),
(4305, 'SANTO ANTÔNIO DE PÁDUA', 'RJ'),
(4306, 'SANTO ANTÔNIO DE POSSE', 'SP'),
(4307, 'SANTO ANTÔNIO DESCOBERTO', 'GO'),
(4308, 'SANTO ANTÔNIO DO CAIUA', 'PR'),
(4309, 'SANTO ANTÔNIO DO AMPARO', 'MG'),
(4310, 'SANTO ANTÔNIO DO ARAÇANGUA', 'SP'),
(4311, 'SANTO ANTÔNIO DO GRAMA', 'MG'),
(4312, 'SANTO ANTÔNIO DO ICA', 'AM'),
(4313, 'SANTO ANTÔNIO DO ITAMBÉ', 'MG'),
(4314, 'SANTO ANTÔNIO DO JARDIM', 'SP'),
(4315, 'SANTO ANTÔNIO DO LEVERGER', 'MT'),
(4316, 'SANTO ANTÔNIO DO PALMA', 'RS'),
(4317, 'SANTO ANTÔNIO DO PARAISO', 'PR'),
(4318, 'SANTO ANTÔNIO DO PINHAL', 'SP'),
(4319, 'SANTO ANTÔNIO DO PLANALTO', 'RS'),
(4320, 'SANTO ANTÔNIO DO SUDOESTE', 'PR'),
(4321, 'SANTO ANTÔNIO DO TAUÁ', 'PA'),
(4322, 'SANTO ANTÔNIO DOS LOPES', 'MA'),
(4323, 'SANTO ANTÔNIO DOS MILAGRES', 'PI'),
(4324, 'SANTO ANTÔNIO DO JACINTO', 'MG'),
(4325, 'SANTO ANTÔNIO DE LISBOA', 'PI'),
(4326, 'SANTO ANTÔNIO DA PLATINA', 'PR'),
(4327, 'SANTO ANTÔNIO DO RIO ABAIXO', 'MG'),
(4328, 'SANTO AUGUSTO', 'RS'),
(4329, 'SANTO CRISTO', 'RS'),
(4330, 'SANTO ESTEVAO', 'BA'),
(4331, 'SANTO EXPEDITO', 'SP'),
(4332, 'SANTO EXPEDITO DO SUL', 'RS'),
(4333, 'SANTO HIPOLITO', 'MG'),
(4334, 'SANTO INÁCIO', 'PR'),
(4335, 'SANTO INACIO DO PIAUÍ', 'PI'),
(4336, 'SANTÓPOLIS DO ÁGUAPEI', 'SP'),
(4337, 'SANTOS', 'SP'),
(4338, 'SANTOS DUMONT', 'MG'),
(4339, 'SÃO BENEDITO', 'CE'),
(4340, 'SÃO BENEDITO DO RIO PRETO', 'MA'),
(4341, 'SÃO BENEDITO DO SUL', 'PE'),
(4342, 'SÃO BENTO', 'MA'),
(4343, 'SÃO BENTO', 'PB'),
(4344, 'SÃO BENTO DO ABADE', 'MG'),
(4345, 'SÃO BENTO DO NORTE', 'RN'),
(4346, 'SÃO BENTO DO SAPUCAI', 'SP'),
(4347, 'SÃO BENTO DO SUL', 'SC'),
(4348, 'SÃO BENTO DO TRAIRI', 'RN'),
(4349, 'SÃO BENTO DO UNA', 'PE'),
(4350, 'SÃO BENTO DO TOCANTINS', 'TO'),
(4351, 'SÃO BERNARDINO', 'SC'),
(4352, 'SÃO BERNARDO', 'MA'),
(4353, 'SÃO BERNARDO DO CAMPO', 'SP'),
(4354, 'SÃO BONIFÁCIO', 'SC'),
(4355, 'SÃO BORJA', 'RS'),
(4356, 'SÃO BRAS', 'AL'),
(4357, 'SÃO BRAS DO PIAUÍ', 'PI'),
(4358, 'SÃO BRAS DO SUAÇUI', 'MG'),
(4359, 'SÃO CAETANO', 'PE'),
(4360, 'SÃO CAETANO DE ODIVELAS', 'PA'),
(4361, 'SÃO CAETANO DO SUL', 'SP'),
(4362, 'SÃO CARLOS', 'SC'),
(4363, 'SÃO CARLOS DO IVAI', 'PR'),
(4364, 'SÃO CRISTOVAO', 'SE'),
(4365, 'SÃO CRISTOVAO DO SUL', 'SC'),
(4366, 'SÃO DESIDERIO', 'BA'),
(4367, 'SÃO DOMINGOS', 'SC'),
(4368, 'SÃO DOMINGOS', 'SE'),
(4369, 'SÃO DOMINGOS DAS DORES', 'MG'),
(4370, 'SÃO DOMINGOS DO ARAGUAIA', 'PA'),
(4371, 'SÃO DOMINGOS DO AZEITÃO', 'MA'),
(4372, 'SÃO DOMINGOS DO CAPIM', 'PA'),
(4373, 'SÃO DOMINGOS DO CARIRI', 'PB'),
(4374, 'SÃO DOMINGOS DO MARANHÃO', 'MA'),
(4375, 'SÃO DOMINGOS DO NORTE', 'ES'),
(4376, 'SÃO DOMINGOS DO PRATA', 'MG'),
(4377, 'SÃO DOMINGOS DO SUL', 'RS'),
(4378, 'SÃO FELIPE', 'BA'),
(4379, 'SÃO FELIPE DO OESTE', 'RO'),
(4380, 'SÃO FELIX', 'BA'),
(4381, 'SÃO FELIX DE BALSAS', 'MA'),
(4382, 'SÃO FELIX DE MINAS', 'MG'),
(4383, 'SÃO FÉLIX DO ARAGUAIA', 'MT'),
(4384, 'SÃO FELIX DO CORIBE', 'BA'),
(4385, 'SÃO FELIX DO PIAUÍ', 'PI'),
(4386, 'SÃO FÉLIX DO TOCANTINS', 'TO'),
(4387, 'SÃO FELIX DO XINGU', 'PA'),
(4388, 'SÃO FERNANDO', 'RN'),
(4389, 'SÃO FIDÉLIS', 'RJ'),
(4390, 'SÃO FRANCISCO', 'MG'),
(4391, 'SÃO FRANCISCO DE ASSIS', 'RS'),
(4392, 'SÃO FRANCISCO DE ASSIS PIAUÍ', 'PI'),
(4393, 'SÃO FRANCISCO DE GOIÁS', 'GO'),
(4394, 'SÃO FRANCISCO DE PAULA', 'MG'),
(4395, 'SÃO FRANCISCO DE SALES', 'MG'),
(4396, 'SÃO FRANCISCO DO BREJÃO', 'MA'),
(4397, 'SÃO FRANCISCO DO CONDE', 'BA'),
(4398, 'SÃO FRANCISCO DO GLÓRIA', 'MG'),
(4399, 'SÃO FRANCISCO DO MARANHÃO', 'MA'),
(4400, 'SÃO FRANCISCO DO OESTE', 'RN'),
(4401, 'SÃO FRANCISCO DO PARÁ', 'PA'),
(4402, 'SÃO FRANCISCO DO PIAUÍ', 'PI'),
(4403, 'SÃO FRANCISCO DO SUL', 'SC'),
(4404, 'SÃO FRANCISCO ITABAPOANA', 'RJ'),
(4405, 'SÃO GABRIEL', 'BA'),
(4406, 'SÃO GABRIEL CACHOEIRA', 'AM'),
(4407, 'SÃO GABRIEL DA PALHA', 'ES'),
(4408, 'SÃO GABRIEL D''OESTE', 'MS'),
(4409, 'SÃO GERALDO', 'MG'),
(4410, 'SÃO GERALDO DA PIEDADE', 'MG'),
(4411, 'SÃO GERALDO DO ARAGUAIA', 'PA'),
(4412, 'SÃO GERALDO DO BAIXO', 'MG'),
(4413, 'SÃO GONCALO', 'RJ'),
(4414, 'SÃO GONCALO AMARANTE', 'RN'),
(4415, 'SÃO GONCALO DO ABAETÉ', 'MG'),
(4416, 'SÃO GONCALO DO AMARANTE', 'CE'),
(4417, 'SÃO GONCALO DO GURGUEIA', 'PI'),
(4418, 'SÃO GONCALO DO PARA', 'MG'),
(4419, 'SÃO GONCALO DO PIAUÍ', 'PI'),
(4420, 'SÃO GONCALO DO RIO PRETO', 'MG'),
(4421, 'SÃO GONCALO DO SAPUCAI', 'MG'),
(4422, 'SÃO GONCALO DOS CAMPOS', 'BA'),
(4423, 'SÃO GONÇALO RIO ABAIXO', 'MG'),
(4424, 'SÃO GOTARDO', 'MG'),
(4425, 'SÃO JERONIMO', 'RS'),
(4426, 'SÃO JERÔNIMO DA SERRA', 'PR'),
(4427, 'SÃO JOÃO', 'PR'),
(4428, 'SÃO JOÃO BATISTA', 'MA'),
(4429, 'SÃO JOÃO BATISTA GLÓRIA', 'MG'),
(4430, 'SÃO JOÃO DA BALIZA', 'RR'),
(4431, 'SÃO JOÃO DA BARRA', 'RJ'),
(4432, 'SÃO JOÃO DA BOA VISTA', 'SP'),
(4433, 'SÃO JOÃO DA CANABRAVA', 'PI'),
(4434, 'SÃO JOÃO DA FRONTEIRA', 'PI'),
(4435, 'SÃO JOÃO DA LAGOA', 'MG'),
(4436, 'SÃO JOÃO DA MATA', 'MG'),
(4437, 'SÃO JOÃO DA PARAUNA', 'GO'),
(4438, 'SÃO JOÃO DA PONTA', 'PA'),
(4439, 'SÃO JOÃO DA PONTE', 'MG'),
(4440, 'SÃO JOÃO DA SERRA', 'PI'),
(4441, 'SÃO JOÃO DA URTIGA', 'RS'),
(4442, 'SÃO JOÃO DA VARJOTA', 'PI'),
(4443, 'SÃO JOÃO D''ALIANÇA', 'GO'),
(4444, 'SÃO JOÃO DAS DUAS PONTES', 'SP'),
(4445, 'SÃO JOÃO DAS MISSÕES', 'MG'),
(4446, 'SÃO JOÃO DE IRACEMA', 'SP'),
(4447, 'SÃO JOÃO DE MERITI', 'RJ'),
(4448, 'SÃO JOÃO DE PIRABAS', 'PA'),
(4449, 'SÃO JOÃO DEL REI', 'MG'),
(4450, 'SÃO JOÃO DO ARÁGUAIA', 'PA'),
(4451, 'SÃO JOÃO DO ARRAIAL', 'PI'),
(4452, 'SÃO JOÃO DO CAIUA', 'PR'),
(4453, 'SÃO JOÃO DO CARIRI', 'PB'),
(4454, 'SÃO JOÃO DO CARU', 'MA'),
(4455, 'SÃO JOÃO DO ITAPERUI', 'SC'),
(4456, 'SÃO JOÃO DO IVAI', 'PR'),
(4457, 'SÃO JOÃO DO JÁGUARIBE', 'CE'),
(4458, 'SÃO JOÃO DO MANHUAÇU', 'MG'),
(4459, 'SÃO JOÃO DO MANTENINHA', 'MG'),
(4460, 'SÃO JOÃO DO OESTE', 'SC'),
(4461, 'SÃO JOÃO DO ORIENTE', 'MG'),
(4462, 'SÃO JOÃO DO PACUÍ', 'MG'),
(4463, 'SÃO JOÃO DO PARAISO', 'MA'),
(4464, 'SÃO JOÃO DO PAU DE ALHO', 'SP'),
(4465, 'SÃO JOÃO DO PIAUÍ', 'PI'),
(4466, 'SÃO JOÃO DO POLESINE', 'RS'),
(4467, 'SÃO JOÃO DO RIO DO PEIXE', 'PB'),
(4468, 'SÃO JOÃO DO SABUGI', 'PB'),
(4469, 'SÃO JOÃO DO SOTER', 'MA'),
(4470, 'SÃO JOÃO DO SUL', 'SC'),
(4471, 'SÃO JOÃO DO TIGRE', 'PB'),
(4472, 'SÃO JOÃO DO TRIUNFO', 'PR'),
(4473, 'SÃO JOÃO DOS PATOS', 'MA'),
(4474, 'SÃO JOÃO EVANGELISTA', 'MG'),
(4475, 'SÃO JOÃO NEPOMUCENO', 'MG'),
(4476, 'SÃO JOAQUIM', 'SC'),
(4477, 'SÃO JOAQUIM DA BARRA', 'SP'),
(4478, 'SÃO JOAQUIM DO MONTE', 'PE'),
(4479, 'SÃO JORGE', 'RS'),
(4480, 'SÃO JORGE DO IVAI', 'PR'),
(4481, 'SÃO JORGE DO OESTE', 'PR'),
(4482, 'SÃO JORGE DO PATROCÍNIO', 'PR'),
(4483, 'SÃO JOSÉ', 'SC'),
(4484, 'SÃO JOSÉ CAMPESTRE', 'RN'),
(4485, 'SÃO JOSÉ DA BARRA', 'MG'),
(4486, 'SÃO JOSÉ DA BELA VISTA', 'SP'),
(4487, 'SÃO JOSÉ DA BOA VISTA', 'PR'),
(4488, 'SÃO JOSÉ DA COROA GRANDE', 'PE'),
(4489, 'SÃO JOSÉ DA LAJE', 'AL'),
(4490, 'SÃO JOSÉ DA LAGOA TAPADA', 'PB'),
(4491, 'SÃO JOSÉ DA SAFIRA', 'MG'),
(4492, 'SÃO JOSÉ DA TAPERA', 'AL'),
(4493, 'SÃO JOSÉ DA VARGINHA', 'MG'),
(4494, 'SÃO JOSÉ DA VITÓRIA', 'BA'),
(4495, 'SÃO JOSÉ DAS MISSÕES', 'RS'),
(4496, 'SÃO JOSÉ DAS PALMEIRAS', 'PR'),
(4497, 'SÃO JOSÉ DE CAIANA', 'PB'),
(4498, 'SÃO JOSÉ DE ESPINHARAS', 'PB'),
(4499, 'SÃO JOSÉ DE MIPIBU', 'RN'),
(4500, 'SÃO JOSÉ DE PIRANHAS', 'PB'),
(4501, 'SÃO JOSÉ DE PRINCESA', 'PB'),
(4502, 'SÃO JOSÉ DE RIBAMAR', 'MA'),
(4503, 'SÃO JOSÉ DE UBA', 'RJ'),
(4504, 'SÃO JOSÉ DO ALEGRE', 'MG'),
(4505, 'SÃO JOSÉ DO BARREIRO', 'SP'),
(4506, 'SÃO JOSÉ DO BELMONTE', 'PE'),
(4507, 'SÃO JOSÉ DO BONFIM', 'PB'),
(4508, 'SÃO JOSÉ DO BREJO DO CRUZ', 'PB'),
(4509, 'SÃO JOSÉ DO CALCADO', 'ES'),
(4510, 'SÃO JOSÉ DO CEDRO', 'SC'),
(4511, 'SÃO JOSÉ DO CERRITO', 'SC'),
(4512, 'SÃO JOSÉ DO EGITO', 'PE'),
(4513, 'SÃO JOSÉ DO GOIABAL', 'MG'),
(4514, 'SÃO JOSÉ DO HERVAL', 'RS'),
(4515, 'SÃO JOSÉ DO HORTENCIO', 'RS'),
(4516, 'SÃO JOSÉ DO INHACORA', 'RS'),
(4517, 'SÃO JOSÉ DO JACURI', 'MG'),
(4518, 'SÃO JOSÉ DO LAPA', 'MG'),
(4519, 'SÃO JOSÉ DO MANTIMENTO', 'MG'),
(4520, 'SÃO JOSÉ DO NORTE', 'RS'),
(4521, 'SÃO JOSÉ DO OURO', 'RS'),
(4522, 'SÃO JOSÉ DO PEIXE', 'PI'),
(4523, 'SÃO JOSÉ DO PIAUÍ', 'PI'),
(4524, 'SÃO JOSÉ DO POVO', 'MT'),
(4525, 'SÃO JOSÉ DO RIO CLARO', 'MT'),
(4526, 'SÃO JOSÉ DO RIO PARDO', 'SP'),
(4527, 'SÃO JOSÉ DO RIO PRETO', 'SP'),
(4528, 'SÃO JOSÉ DO SABUGI', 'PB'),
(4529, 'SÃO JOSÉ DO XINGU', 'MT'),
(4530, 'SÃO JOSÉ DOS AUSENTES', 'RS'),
(4531, 'SÃO JOSÉ DOS BASILIOS', 'MA'),
(4532, 'SÃO JOSÉ DOS CAMPOS', 'SP'),
(4533, 'SÃO JOSÉ DOS CORDEIROS', 'PB'),
(4534, 'SÃO JOSÉ DOS PINHAIS', 'PR'),
(4535, 'SÃO JOSÉ DOS QUATRO MARCOS', 'MT'),
(4536, 'SÃO JOSÉ DOS RAMOS', 'PB'),
(4537, 'SÃO JOSÉ VALE RIO PRETO', 'RJ'),
(4538, 'SÃO JULIÃO', 'PI'),
(4539, 'SÃO LEOPOLDO', 'RS'),
(4540, 'SÃO LOURENCO', 'MG'),
(4541, 'SÃO LOURENCO DA MATA', 'PE'),
(4542, 'SÃO LOURENCO DA SERRA', 'SP'),
(4543, 'SÃO LOURENCO DO PIAUÍ', 'PI'),
(4544, 'SÃO LOURENCO DO SUL', 'RS'),
(4545, 'SÃO LOURENCO D''OESTE', 'SC'),
(4546, 'SÃO LUDGERO', 'SC'),
(4547, 'SÃO LUIS', 'MA'),
(4548, 'SÃO LUIS DE MONTES BELOS', 'GO'),
(4549, 'SÃO LUIS DO CURU', 'CE'),
(4550, 'SÃO LUÍS DO PIAUÍ', 'PI'),
(4551, 'SÃO LUIS DO QUITUNDE', 'AL'),
(4552, 'SÃO LUÍS GONZAGA DO MARANHÃO', 'MA'),
(4553, 'SÃO LUIZ', 'RR'),
(4554, 'SÃO LUIZ DO AMAUA', 'RR'),
(4555, 'SÃO LUIZ DO NORTE', 'GO'),
(4556, 'SÃO LUIZ DO PARAITINGA', 'SP'),
(4557, 'SÃO LUIZ GONZAGA', 'RS'),
(4558, 'SÃO MAMEDE', 'PB'),
(4559, 'SÃO MANOEL DO PARANÁ', 'PR'),
(4560, 'SÃO MANUEL', 'SP'),
(4561, 'SÃO MARCOS', 'RS'),
(4562, 'SÃO MARTINHO', 'RS'),
(4563, 'SÃO MARTINHO DA SERRA', 'RS'),
(4564, 'SÃO MATEUS', 'ES'),
(4565, 'SÃO MATEUS DO MARANHÃO', 'MA'),
(4566, 'SÃO MATEUS DO SUL', 'PR'),
(4567, 'SÃO MIGUEL', 'RN'),
(4568, 'SÃO MIGUEL DO ANTA', 'MG'),
(4569, 'SÃO MIGUEL ARCANJO', 'SP'),
(4570, 'SÃO MIGUEL DA BAIXA GRANDE', 'PI'),
(4571, 'SÃO MIGUEL DA BOA VISTA', 'SC'),
(4572, 'SÃO MIGUEL DAS MATAS', 'BA'),
(4573, 'SÃO MIGUEL DAS MISSÕES', 'RS'),
(4574, 'SÃO MIGUEL DE TAIPU', 'PB'),
(4575, 'SÃO MIGUEL DE TOUROS', 'RN'),
(4576, 'SÃO MIGUEL DO ALEIXO', 'SE'),
(4577, 'SÃO MIGUEL DO ARÁGUAIA', 'GO'),
(4578, 'SÃO MIGUEL DO FIDALGO', 'PI'),
(4579, 'SÃO MIGUEL DO GUAMA', 'PA'),
(4580, 'SÃO MIGUEL DO GUAPORÉ', 'RO'),
(4581, 'SÃO MIGUEL DO IGUAÇU', 'PR'),
(4582, 'SÃO MIGUEL DO OESTE', 'SC'),
(4583, 'SÃO MIGUEL DO TAPUIO', 'PI'),
(4584, 'SÃO MIGUEL DO TOCANTINS', 'TO'),
(4585, 'SÃO MIGUEL DOS CAMPOS', 'AL'),
(4586, 'SÃO MIGUEL DOS MILAGRES', 'AL'),
(4587, 'SÃO MIGUEL PASSA QUATRO', 'GO'),
(4588, 'SÃO NICILAU', 'RS'),
(4589, 'SÃO NICOLAU', 'RS'),
(4590, 'SÃO PATRÍCIO', 'GO'),
(4591, 'SÃO PAULO', 'SP'),
(4592, 'SÃO PAULO DAS MISSÕES', 'RS'),
(4593, 'SÃO PAULO DE OLIVENCA', 'AM'),
(4594, 'SÃO PAULO DO POTENGI', 'RN'),
(4595, 'SÃO PEDRO', 'RN'),
(4596, 'SÃO PEDRO DA ÁGUA BRANCA', 'MA'),
(4597, 'SÃO PEDRO DA ALDEIA', 'RJ'),
(4598, 'SÃO PEDRO DA CIPA', 'MT'),
(4599, 'SÃO PEDRO DA SERRA', 'RS'),
(4600, 'SÃO PEDRO DA UNIÃO', 'MG'),
(4601, 'SÃO PEDRO DE ALCANTARA', 'SC'),
(4602, 'SÃO PEDRO DO BUTIA', 'RS'),
(4603, 'SÃO PEDRO DO IGUAÇU', 'PR'),
(4604, 'SÃO PEDRO DO IVAÍ', 'PR'),
(4605, 'SÃO PEDRO DO PARANÁ', 'PR'),
(4606, 'SÃO PEDRO DO PIAUÍ', 'PI'),
(4607, 'SÃO PEDRO DO SUAÇUI', 'MG'),
(4608, 'SÃO PEDRO DO SUL', 'RS'),
(4609, 'SÃO PEDRO DO TURVO', 'SP'),
(4610, 'SÃO PEDRO DOS CRENTES', 'MA'),
(4611, 'SÃO PEDRO DOS FERROS', 'MG'),
(4612, 'SÃO RAFAEL', 'RN'),
(4613, 'SÃO RAIMUNDO DAS MANGABEIRA', 'MA'),
(4614, 'SÃO RAIMUNDO DOCA BEZERRA', 'MS'),
(4615, 'SÃO RAIMUNDO NONATO', 'PI'),
(4616, 'SÃO ROBERTO', 'MA'),
(4617, 'SÃO ROMAO', 'MG'),
(4618, 'SÃO ROQUE', 'SP'),
(4619, 'SÃO ROQUE DE MINAS', 'MG'),
(4620, 'SÃO ROQUE DO CANAÃ', 'ES'),
(4621, 'SÃO SALVADOR DO TOCANTINS', 'TO'),
(4622, 'SÃO SEBASTIÃO', 'AL'),
(4623, 'SÃO SEBASTIÃO DO RIO VERDE', 'MG'),
(4624, 'SÃO SEBASTIÃO DA AMOREIRA', 'PR'),
(4625, 'SÃO SEBASTIÃO BELA VISTA', 'MG'),
(4626, 'SÃO SEBASTIÃO DA BOA VISTA', 'PA'),
(4627, 'SÃO SEBASTIÃO DA GRAMA', 'SP'),
(4628, 'SÃO SEBASTIÃO DE LAGOA DE ROCA', 'PB'),
(4629, 'SÃO SEBASTIÃO DO ALTO', 'RJ'),
(4630, 'SÃO SEBASTIÃO DO CAÍ', 'RS'),
(4631, 'SÃO SEBASTIÃO DO MARANHÃO', 'MG'),
(4632, 'SÃO SEBASTIÃO DO OESTE', 'MG'),
(4633, 'SÃO SEBASTIÃO DO PARAÍSO', 'MG'),
(4634, 'SÃO SEBASTIÃO DO PASSÉ', 'BA'),
(4635, 'SÃO SEBASTIÃO DO UATUMA', 'AM'),
(4636, 'SÃO SEBASTIÃO DO UMBUZEIRO', 'PB'),
(4637, 'SÃO SEBASTIÃO DO RIO PRETO', 'MG'),
(4638, 'SÃO SEPE', 'RS'),
(4639, 'SÃO SIMÃO', 'GO'),
(4640, 'SÃO SIMÃO', 'SP'),
(4641, 'SÃO TOME DAS LETRAS', 'MG'),
(4642, 'SÃO TIAGO', 'MG'),
(4643, 'SÃO TOMAS DE AQUINO', 'MG'),
(4644, 'SÃO TOMÉ', 'PR'),
(4645, 'SÃO VALENTIM', 'RS'),
(4646, 'SÃO VALENTIM DO SUL', 'RS'),
(4647, 'SÃO VALERIO DA NATIVIDADE', 'TO'),
(4648, 'SÃO VALERIO DO SUL', 'RS'),
(4649, 'SÃO VENDELINO', 'RS'),
(4650, 'SÃO VICENTE', 'RN'),
(4651, 'SÃO VICENTE DE FERRER', 'MA'),
(4652, 'SÃO VICENTE DE MINAS', 'MG'),
(4653, 'SÃO VICENTE DO SERIDO', 'PB'),
(4654, 'SÃO VICENTE DO SUL', 'RS'),
(4655, 'SÃO VICENTE FERRER', 'PE'),
(4656, 'SAPÉ', 'PB'),
(4657, 'SAPEAÇU', 'BA'),
(4658, 'SAPEZAL', 'MT'),
(4659, 'SAPIRANGA', 'RS'),
(4660, 'SAPOPEMA', 'PR'),
(4661, 'SAPUCAIA', 'PA'),
(4662, 'SAPUCAIA', 'RJ'),
(4663, 'SAPUCAIA DO SUL', 'RS'),
(4664, 'SAPUCAI-MIRIM', 'MG'),
(4665, 'SAQUAREMA', 'RJ'),
(4666, 'SARANDI', 'PR'),
(4667, 'SARANDI', 'RS'),
(4668, 'SARAPUI', 'SP'),
(4669, 'SARDOA', 'MG'),
(4670, 'SARUTAIA', 'SP'),
(4671, 'SARZEDO', 'MG'),
(4672, 'SÁTIRO DIAS', 'BA'),
(4673, 'SATUBINHA', 'MA'),
(4674, 'SAUBARA', 'BA'),
(4675, 'SAUDADE DO IGUAÇU', 'PR'),
(4676, 'SAUDADES', 'SC'),
(4677, 'SAÚDE', 'BA'),
(4678, 'SCHROEDER', 'SC'),
(4679, 'SEABRA', 'BA'),
(4680, 'SEARA', 'SC'),
(4681, 'SEBASTIANÓPOLIS DO SUL', 'SP'),
(4682, 'SEBASTIÃO BARROS', 'PI'),
(4683, 'SEBASTIÃO LARANJEIRAS', 'BA'),
(4684, 'SEBASTIÃO LEAL', 'PI'),
(4685, 'SEBERI', 'RS'),
(4686, 'SEDE NOVA', 'RS'),
(4687, 'SEGREDO', 'RS'),
(4688, 'SELBACH', 'RS'),
(4689, 'SELVIRIA', 'MS'),
(4690, 'SENA MADUREIRA', 'AC'),
(4691, 'SENADOR ALEXANDRE COSTA', 'MA'),
(4692, 'SENADOR AMARAL', 'MG'),
(4693, 'SENADOR CANEDO', 'GO'),
(4694, 'SENADOR CORTES', 'MG'),
(4695, 'SENADOR ELOI DE SOUZA', 'RN'),
(4696, 'SENADOR FIRMINO', 'MG'),
(4697, 'SENADOR GEORGINO AVELINO', 'RN'),
(4698, 'SENADOR GUIOMARD', 'AC'),
(4699, 'SENADOR JOSÉ BENTO', 'MG'),
(4700, 'SENADOR JOSÉ PORFIRIO', 'PA'),
(4701, 'SENADOR LA  ROCQUE', 'MA'),
(4702, 'SENADOR MODESTINO GONÇALVES', 'MG'),
(4703, 'SENADOR POMPEU', 'CE'),
(4704, 'SENADOR RUI PALMEIRA', 'AL'),
(4705, 'SENADOR SA', 'CE'),
(4706, 'SENADOR SALGADO FILHO', 'RS'),
(4707, 'SENGES', 'PR'),
(4708, 'SENHOR DO BONFIM', 'BA'),
(4709, 'SENHORA DE OLIVEIRA', 'MG'),
(4710, 'SENHORA DO PORTO', 'MG'),
(4711, 'SENHORA DOS REMÉDIOS', 'MG'),
(4712, 'SENTINELA DO SUL', 'RS'),
(4713, 'SENTO SE', 'BA'),
(4714, 'SERAFINA CORRÊA', 'RS'),
(4715, 'SERICITA', 'MG'),
(4716, 'SERIDO', 'PB'),
(4717, 'SERINGUEIRAS', 'RO'),
(4718, 'SERIO', 'RS'),
(4719, 'SERITINGA', 'MG'),
(4720, 'SEROPEDICA', 'RJ'),
(4721, 'SERRA', 'ES'),
(4722, 'SERRA ALTA', 'SC'),
(4723, 'SERRA AZUL', 'SP'),
(4724, 'SERRA AZUL DE MINAS', 'MG'),
(4725, 'SERRA BRANCA', 'PB'),
(4726, 'SERRA CAIADA', 'RN'),
(4727, 'SERRA DA RAIZ', 'PB'),
(4728, 'SERRA DA SAUDADE', 'MG'),
(4729, 'SERRA DE SÃO BENTO', 'RN'),
(4730, 'SERRA DO MEL', 'RN'),
(4731, 'SERRA DO NAVIO', 'AP'),
(4732, 'SERRA DO RAMALHO', 'BA'),
(4733, 'SERRA DO SALITRE', 'MG'),
(4734, 'SERRA DOS AIMORES', 'MG'),
(4735, 'SERRA DOURADA', 'BA'),
(4736, 'SERRA GRANDE', 'PB'),
(4737, 'SERRA NEGRA', 'SP'),
(4738, 'SERRA NEGRA DO NORTE', 'RN'),
(4739, 'SERRA PRETA', 'BA'),
(4740, 'SERRA REDONDA', 'PB'),
(4741, 'SERRA TALHADA', 'PE'),
(4742, 'SERRANA', 'SP'),
(4743, 'SERRANIA', 'MG'),
(4744, 'SERRANO DO MARANHÃO', 'MA'),
(4745, 'SERRANÓPOLIS', 'GO'),
(4746, 'SERRANÓPOLIS DO IGUAÇU', 'PR'),
(4747, 'SERRANOS', 'MG'),
(4748, 'SERRARIA', 'PB'),
(4749, 'SERRINHA', 'BA'),
(4750, 'SERRINHA DOS PINTOS', 'RN'),
(4751, 'SERRITA', 'PE'),
(4752, 'SERRO', 'MG'),
(4753, 'SERROLÂNDIA', 'BA'),
(4754, 'SERTANEJA', 'PR'),
(4755, 'SERTANIA', 'PE'),
(4756, 'SERTANÓPOLIS', 'PR'),
(4757, 'SERTÃO', 'RS'),
(4758, 'SERTÃO SANTANA', 'RS'),
(4759, 'SERTÃOZINHO', 'PB'),
(4760, 'SETE BARRAS', 'SP'),
(4761, 'SETE DE SETEMBRO', 'RS'),
(4762, 'SETE LAGOAS', 'MG'),
(4763, 'SETE QUEDAS', 'MS'),
(4764, 'SETUBINHA', 'MG'),
(4765, 'SEVERIANO DE ALMEIDA', 'RS'),
(4766, 'SEVERIANO MELO', 'RN'),
(4767, 'SEVERINIA', 'SP'),
(4768, 'SIDERÓPOLIS', 'SC'),
(4769, 'SIDROLÂNDIA', 'MS'),
(4770, 'SIGEFREDO PACHECO', 'PI'),
(4771, 'SILVA JARDIM', 'RJ'),
(4772, 'SILVANIA', 'GO'),
(4773, 'SILVANÓPOLIS', 'TO'),
(4774, 'SILVEIRA MARTINS', 'RS'),
(4775, 'SILVEIRAS', 'SP'),
(4776, 'SILVEIRÂNIA', 'MG'),
(4777, 'SILVES', 'AM'),
(4778, 'SILVIANÓPOLIS', 'MG'),
(4779, 'SIMÃO DIAS', 'SE'),
(4780, 'SIMÃO PEREIRA', 'MG'),
(4781, 'SIMÕES', 'PI'),
(4782, 'SIMÕES FILHO', 'BA'),
(4783, 'SIMOLÂNDIA', 'GO'),
(4784, 'SIMONÉSIA', 'MG'),
(4785, 'SIMPLÍCIO MENDES', 'PI'),
(4786, 'SINOP', 'MT'),
(4787, 'SIQUEIRA CAMPOS', 'PR'),
(4788, 'SIRINHAÉM', 'PE'),
(4789, 'SIRIRI', 'SE'),
(4790, 'SITIO D''ABADIA', 'GO'),
(4791, 'SITIO DO MATO', 'BA'),
(4792, 'SITIO DO QUINTO', 'BA'),
(4793, 'SITIO NOVO', 'MA'),
(4794, 'SITIO NOVO DO TOCANTINS', 'TO'),
(4795, 'SOBRADINHO', 'BA'),
(4796, 'SOBRADINHO', 'RS'),
(4797, 'SOBRADO', 'PB'),
(4798, 'SOBRAL', 'CE'),
(4799, 'SOBRALIA', 'MG'),
(4800, 'SOCORRO', 'SP'),
(4801, 'SOCORRO DO PIAUÍ', 'PI'),
(4802, 'SOLANEA', 'PB'),
(4803, 'SOLEDADE', 'PB'),
(4804, 'SOLEDADE DE MINAS', 'MG'),
(4805, 'SOLIDÃO', 'PE'),
(4806, 'SOLONOPOLE', 'CE'),
(4807, 'SOMBRIO', 'SC'),
(4808, 'SONORA', 'MS'),
(4809, 'SOORETAMA', 'ES'),
(4810, 'SOROCABA', 'SP'),
(4811, 'SORRISO', 'MT'),
(4812, 'SOSSEGO', 'PB'),
(4813, 'SOURE', 'PA'),
(4814, 'SOUSA', 'PB'),
(4815, 'SOUTO SOARES', 'BA'),
(4816, 'SUCUPIRA', 'TO'),
(4817, 'SUCUPIRA DO NORTE', 'MA'),
(4818, 'SUCUPIRA DO RIACHÃO', 'MA'),
(4819, 'SUD MENNUCCI', 'SP'),
(4820, 'SUL BRASIL', 'SC'),
(4821, 'SULINA', 'PR'),
(4822, 'SUMARE', 'SP'),
(4823, 'SUMÉ', 'PB'),
(4824, 'SUMIDOURO', 'RJ'),
(4825, 'SURUBIM', 'PE'),
(4826, 'SUSSUAPARA', 'PI'),
(4827, 'SUZANÁPOLIS', 'SP'),
(4828, 'SUZANO', 'SP'),
(4829, 'TABAI', 'RS'),
(4830, 'TABAPORÃ', 'MT'),
(4831, 'TABAPUA', 'SP'),
(4832, 'TABATINGA', 'AM'),
(4833, 'TABIRA', 'PE'),
(4834, 'TABOAO DA SERRA', 'SP'),
(4835, 'TABOCAS DO BREJO VELHO', 'BA'),
(4836, 'TABOLEIRO GRANDE', 'RN'),
(4837, 'TABULEIRO', 'MG'),
(4838, 'TABULEIRO DO NORTE', 'CE'),
(4839, 'TACAIMBO', 'PE'),
(4840, 'TACARATU', 'PE'),
(4841, 'TACIBA', 'SP'),
(4842, 'TACIMA', 'PB'),
(4843, 'TACURU', 'MS'),
(4844, 'TÁGUAI', 'SP'),
(4845, 'TÁGUATINGA', 'TO'),
(4846, 'TAIAÇU', 'SP'),
(4847, 'TAILÂNDIA', 'PA'),
(4848, 'TAIO', 'SC'),
(4849, 'TAIOBEIRAS', 'MG'),
(4850, 'TAIPAS', 'TO'),
(4851, 'TAIPU', 'RN'),
(4852, 'TAIUVA', 'SP'),
(4853, 'TALISMA', 'TO'),
(4854, 'TAMANDARÉ', 'PE'),
(4855, 'TAMARANA', 'PR'),
(4856, 'TAMBAU', 'SP'),
(4857, 'TAMBOARA', 'PR'),
(4858, 'TAMBORIL', 'CE'),
(4859, 'TAMBORIL DO PIAUÍ', 'PI'),
(4860, 'TAMMAÇU', 'BA'),
(4861, 'TANABI', 'SP'),
(4862, 'TANGARA', 'RN'),
(4863, 'TANGARA DA SERRA', 'MT'),
(4864, 'TANGUÁ', 'RJ'),
(4865, 'TANQUE D''ARCA', 'AL'),
(4866, 'TANQUE DO PIAUÍ', 'PI'),
(4867, 'TANQUE NOVO', 'BA'),
(4868, 'TANQUINHO', 'BA'),
(4869, 'TAPARUBA', 'MG'),
(4870, 'TAPAUA', 'AM'),
(4871, 'TAPEJARA', 'PR'),
(4872, 'TAPERA', 'RS'),
(4873, 'TAPEROA', 'BA'),
(4874, 'TAPES', 'RS'),
(4875, 'TAPIRA', 'MG'),
(4876, 'TAPIRAÍ', 'MG'),
(4877, 'TAPIRAMUTA', 'BA'),
(4878, 'TAPIRATIBA', 'SP'),
(4879, 'TAPURAII', 'MT'),
(4880, 'TAQUARA', 'RS'),
(4881, 'TAQUARAÇU DE MINAS', 'MG'),
(4882, 'TAQUARAL', 'SP'),
(4883, 'TAQUARAL DE GOIÁS', 'GO'),
(4884, 'TAQUARI', 'RS'),
(4885, 'TAQUARITINGA', 'SP'),
(4886, 'TAQUARITINGA DO NORTE', 'PE'),
(4887, 'TAQUARITUBA', 'SP'),
(4888, 'TAQUARIVAÍ', 'SP'),
(4889, 'TAQUARUÇU DO SUL', 'RS'),
(4890, 'TAQUARUSSU', 'MS'),
(4891, 'TARABAI', 'SP'),
(4892, 'TARAUAÇA', 'AC'),
(4893, 'TARRAFAS', 'CE'),
(4894, 'TARTARUGALZINHO', 'AP'),
(4895, 'TARUMA', 'SP'),
(4896, 'TARUMIRIM', 'MG'),
(4897, 'TASSO FRAGOSO', 'MA'),
(4898, 'TATUI', 'SP'),
(4899, 'TAUA', 'CE'),
(4900, 'TAUBATE', 'SP'),
(4901, 'TAVARES', 'PB'),
(4902, 'TAVARES', 'RS'),
(4903, 'TEFÉ', 'AM'),
(4904, 'TEIXEIRA', 'PB'),
(4905, 'TEIXEIRA DE FREITAS', 'BA'),
(4906, 'TEIXEIRA SOARES', 'PR'),
(4907, 'TEIXEIRAS', 'MG'),
(4908, 'TEJUCUOCA', 'CE'),
(4909, 'TEJUPA', 'SP'),
(4910, 'TELEMACO BORBA', 'PR'),
(4911, 'TELHA', 'SE'),
(4912, 'TENENTE ANANIAS', 'RN'),
(4913, 'TENENTE LAURENTINO CRUZ', 'RN'),
(4914, 'TENENTE PORTELA', 'RS'),
(4915, 'TENÓRIO', 'PB'),
(4916, 'TEODORO SAMPAIO', 'BA'),
(4917, 'TEOFILÂNDIA', 'BA'),
(4918, 'TEOFILO OTONI', 'MG'),
(4919, 'TEOLÂNDIA', 'BA'),
(4920, 'TEOTÔNIO VILELA', 'AL'),
(4921, 'TERENOS', 'MS'),
(4922, 'TERESINA', 'PI'),
(4923, 'TERESINA DE GOIÁS', 'GO'),
(4924, 'TERESÓPOLIS', 'RJ'),
(4925, 'TEREZINHA', 'PE'),
(4926, 'TEREZÓPOLIS DE GOIÁS', 'GO'),
(4927, 'TERRA ALTA', 'PA'),
(4928, 'TERRA BOA', 'PR'),
(4929, 'TERRA DE AREIA', 'RS'),
(4930, 'TERRA NOVA', 'BA'),
(4931, 'TERRA NOVA DO NORTE', 'MT'),
(4932, 'TERRA RICA', 'PR'),
(4933, 'TERRA ROXA', 'PR'),
(4934, 'TERRA SANTA', 'PA'),
(4935, 'TESOURO', 'MT'),
(4936, 'TEUTÔNIA', 'RS'),
(4937, 'THEOBROMA', 'RO'),
(4938, 'TIANGUA', 'CE'),
(4939, 'TIBAGI', 'PR'),
(4940, 'TIBAU', 'RN'),
(4941, 'TIBAU DO SUL', 'RN'),
(4942, 'TIETÊ', 'SP'),
(4943, 'TIGRINHOS', 'SC'),
(4944, 'TIJUCAS', 'SC'),
(4945, 'TIJUCAS DO SUL', 'PR'),
(4946, 'TIMBAUBA', 'PE'),
(4947, 'TIMBAUBA BATISTAS', 'RN'),
(4948, 'TIMBÉ DO SUL', 'SC'),
(4949, 'TIMBIRAS', 'MA'),
(4950, 'TIMBO', 'SC'),
(4951, 'TIMBO GRANDE', 'SC'),
(4952, 'TIMBURI', 'SP'),
(4953, 'TIMON', 'MA'),
(4954, 'TIMOTEO', 'MG'),
(4955, 'TIRADENTES', 'MG'),
(4956, 'TIRADENTES DO SUL', 'RS'),
(4957, 'TIROS', 'MG'),
(4958, 'TOBIAS BARRETO', 'SE'),
(4959, 'TOCANTINIA', 'TO'),
(4960, 'TOCANTINÓPOLIS', 'TO'),
(4961, 'TOCANTINS', 'MG'),
(4962, 'TOLEDO', 'MG'),
(4963, 'TOMAR DO GERU', 'SE'),
(4964, 'TOMAZINA', 'PR'),
(4965, 'TOMBOS', 'MG'),
(4966, 'TOMÉ-AÇU', 'PA'),
(4967, 'TONANTINS', 'AM'),
(4968, 'TORITAMA', 'PE'),
(4969, 'TORIXORÉU', 'MT'),
(4970, 'TOROPI', 'RS'),
(4971, 'TORRE DE PEDRA', 'SP'),
(4972, 'TORRES', 'RS'),
(4973, 'TORRINHA', 'SP'),
(4974, 'TOUROS', 'RN'),
(4975, 'TRABIJU', 'SP'),
(4976, 'TRACUATEUA', 'PA'),
(4977, 'TRAÇUNHAEM', 'PE'),
(4978, 'TRAIPU', 'AL'),
(4979, 'TRAIRÃO', 'PA'),
(4980, 'TRAIRI', 'CE'),
(4981, 'TRAJANO DE MORAES', 'RJ'),
(4982, 'TRAMANDAI', 'RS'),
(4983, 'TRAVESSEIRO', 'RS'),
(4984, 'TREMEDAL', 'BA'),
(4985, 'TREMEMBÉ', 'SP'),
(4986, 'TRÊS ARROIOS', 'RS'),
(4987, 'TRÊS BARRAS', 'SC'),
(4988, 'TRÊS BARRAS DO PARANÁ', 'PR'),
(4989, 'TRÊS CACHOEIRAS', 'RS'),
(4990, 'TRÊS CORAÇÕES', 'MG'),
(4991, 'TRÊS COROAS', 'RS'),
(4992, 'TRÊS DE MAIO', 'RS'),
(4993, 'TRÊS FORQUILHAS', 'RS'),
(4994, 'TRÊS FRONTEIRAS', 'SP'),
(4995, 'TRÊS LAGOAS', 'MS'),
(4996, 'TRÊS MARIAS', 'MG'),
(4997, 'TRÊS PALMEIRAS', 'RS'),
(4998, 'TRÊS PASSOS', 'RS'),
(4999, 'TRÊS PONTAS', 'MG'),
(5000, 'TRÊS RANCHOS', 'GO'),
(5001, 'TRÊS RIOS', 'RJ'),
(5002, 'TREVISO', 'SC'),
(5003, 'TREZE DE MAIO', 'SC'),
(5004, 'TREZE TILIAS', 'SC'),
(5005, 'TRINDADE', 'GO'),
(5006, 'TRINDADE DO SUL', 'RS'),
(5007, 'TRIUNFO', 'PB'),
(5008, 'TRIUNFO POTIGUAR', 'RN'),
(5009, 'TRIZIDELA DO VALE', 'MA'),
(5010, 'TROMBAS', 'GO'),
(5011, 'TROMBUDO CENTRAL', 'SC'),
(5012, 'TUBARÃO', 'SC'),
(5013, 'TUCANO', 'BA'),
(5014, 'TUCUMA', 'PA'),
(5015, 'TUCUNDUVA', 'RS'),
(5016, 'TUCURUÍ', 'PA'),
(5017, 'TUFILÂNDIA', 'MA'),
(5018, 'TUIUTI', 'SP'),
(5019, 'TUMIRITINGA', 'MG'),
(5020, 'TUNÁPOLIS', 'SC'),
(5021, 'TUNAS', 'RS'),
(5022, 'TUNAS DO PARANÁ', 'PR'),
(5023, 'TUNEIRAS DO OESTE', 'PR'),
(5024, 'TUNTUM', 'MA'),
(5025, 'TUPA', 'SP'),
(5026, 'TUPACIGUARA', 'MG'),
(5027, 'TUPANATINGA', 'PE'),
(5028, 'TUPANCI DO SUL', 'RS'),
(5029, 'TUPANCIRETÃ', 'RS'),
(5030, 'TUPANDI', 'RS'),
(5031, 'TUPARENDI', 'RS'),
(5032, 'TUPARETAMA', 'PE'),
(5033, 'TUPASSI', 'PR'),
(5034, 'TUPI PAULISTA', 'SP'),
(5035, 'TUPIRAMA', 'TO'),
(5036, 'TUPIRATINS', 'TO'),
(5037, 'TURIAÇU', 'MA'),
(5038, 'TURILÂNDIA', 'MA'),
(5039, 'TURIÚBA', 'SP'),
(5040, 'TURMALINA', 'MG'),
(5041, 'TURMALINA', 'SP'),
(5042, 'TURUÇU', 'RS'),
(5043, 'TURURU', 'CE'),
(5044, 'TURVANIA', 'GO'),
(5045, 'TURVELÂNDIA', 'GO'),
(5046, 'TURVO', 'PR'),
(5047, 'TURVO', 'SC'),
(5048, 'TURVOLÂNDIA', 'MG'),
(5049, 'TUTOIA', 'MA'),
(5050, 'UARINI', 'AM'),
(5051, 'UAUÁ', 'BA'),
(5052, 'UBA', 'MG'),
(5053, 'UBAÍ', 'MG'),
(5054, 'UBAIRA', 'BA'),
(5055, 'UBAITABA', 'BA'),
(5056, 'UBAJARA', 'CE'),
(5057, 'UBAPORANGA', 'MG'),
(5058, 'UBARANA', 'SP'),
(5059, 'UBATÃ', 'BA'),
(5060, 'UBATUBA', 'SP'),
(5061, 'UBERABA', 'MG'),
(5062, 'UBERLÂNDIA', 'MG'),
(5063, 'UBIRAJARA', 'SP'),
(5064, 'UBIRATA', 'PR'),
(5065, 'UCHOA', 'SP'),
(5066, 'UIBAI', 'BA'),
(5067, 'UIRAPURU', 'GO'),
(5068, 'UIRAUNA', 'PB'),
(5069, 'ULIANÓPOLIS', 'PA'),
(5070, 'UMARI', 'CE'),
(5071, 'UMARIZAL', 'RN'),
(5072, 'UMBAUBA', 'SE'),
(5073, 'UMBURANAS', 'BA'),
(5074, 'UMBURATIBA', 'MG'),
(5075, 'UMBUZEIRO', 'PB'),
(5076, 'UMIRIM', 'CE'),
(5077, 'UMUARAMA', 'PR'),
(5078, 'UNA', 'BA'),
(5079, 'UNAI', 'MG'),
(5080, 'UNIÃO', 'PI'),
(5081, 'UNIÃO DA SERRA', 'RS'),
(5082, 'UNIÃO DA VITÓRIA', 'PR'),
(5083, 'UNIÃO DE MINAS', 'MG'),
(5084, 'UNIÃO DO OESTE', 'SC'),
(5085, 'UNIÃO DO SUL', 'MT'),
(5086, 'UNIÃO DOS PALMARES', 'AL'),
(5087, 'UNIÃO PAULISTA', 'SP'),
(5088, 'UNIFLOR', 'PR'),
(5089, 'UPANEMA', 'RN'),
(5090, 'URAI', 'PR'),
(5091, 'URANDI', 'BA'),
(5092, 'URANIA', 'SP'),
(5093, 'URBANO SANTOS', 'MA'),
(5094, 'URU', 'SP'),
(5095, 'URUAÇU', 'GO'),
(5096, 'URUANA', 'GO'),
(5097, 'URUANA DE MINAS', 'MG'),
(5098, 'URUARA', 'PA'),
(5099, 'URUBICI', 'SC'),
(5100, 'URUBURETAMA', 'CE'),
(5101, 'URUCÂNIA', 'MG'),
(5102, 'URUCARA', 'AM'),
(5103, 'URUÇUCA', 'BA'),
(5104, 'URUÇUÍ', 'PI'),
(5105, 'URUCUIA', 'MG'),
(5106, 'URUCURITUBA', 'AM'),
(5107, 'URUGUAIANA', 'RS'),
(5108, 'URUOCA', 'CE'),
(5109, 'URUPA', 'RO'),
(5110, 'URUPEMA', 'SC'),
(5111, 'URUPÊS', 'SP'),
(5112, 'URUSSANGA', 'SC'),
(5113, 'URUTAI', 'GO'),
(5114, 'UTINGA', 'BA'),
(5115, 'VACARIA', 'RS'),
(5116, 'VALE DO PARAISO', 'RO'),
(5117, 'VALE DO SOL', 'RS'),
(5118, 'VALE REAL', 'RS'),
(5119, 'VALE VERDE', 'RS'),
(5120, 'VALENCA', 'BA'),
(5121, 'VALENÇA', 'RJ'),
(5122, 'VALENCA DO PIAUÍ', 'PI'),
(5123, 'VALENTE', 'BA'),
(5124, 'VALENTIM GENTIL', 'SP'),
(5125, 'VALINHOS', 'SP'),
(5126, 'VALPARAISO', 'GO'),
(5127, 'VANINI', 'RS'),
(5128, 'VARGEÃO', 'SC'),
(5129, 'VARGEM', 'SC'),
(5130, 'VARGEM', 'SP'),
(5131, 'VARGEM ALTA', 'ES'),
(5132, 'VARGEM BONITA', 'MG'),
(5133, 'VARGEM BONITA', 'SC'),
(5134, 'VARGEM GRANDE', 'MA'),
(5135, 'VARGEM GRANDE DO SUL', 'SP'),
(5136, 'VARGEM GRANDE PAULISTA', 'SP'),
(5137, 'VARGINHA', 'MG'),
(5138, 'VARJÃO', 'GO'),
(5139, 'VARJÃO DE MINAS', 'MG'),
(5140, 'VARJOTA', 'CE'),
(5141, 'VARRE-SAI', 'RJ'),
(5142, 'VÁRZEA', 'PB'),
(5143, 'VARZEA ALEGRE', 'CE'),
(5144, 'VARZEA BRANCA', 'PI'),
(5145, 'VÁRZEA DA PALMA', 'MG'),
(5146, 'VÁRZEA DA ROÇA', 'BA'),
(5147, 'VARZEA DO POÇO', 'BA'),
(5148, 'VARZEA GRANDE', 'MT'),
(5149, 'VARZEA NOVA', 'BA'),
(5150, 'VARZEA PAULISTA', 'SP'),
(5151, 'VARZEDO', 'BA'),
(5152, 'VARZELÂNDIA', 'MG'),
(5153, 'VASSOURAS', 'RJ'),
(5154, 'VAZANTE', 'MG'),
(5155, 'VENÂNCIO AIRES', 'RS'),
(5156, 'VENDA NOVA DO IMIGRANTE', 'ES'),
(5157, 'VENHA VER', 'RN'),
(5158, 'VENTANIA', 'PR'),
(5159, 'VENTUROSA', 'PE'),
(5160, 'VERA', 'MT'),
(5161, 'VERA CRUZ', 'BA'),
(5162, 'VERA CRUZ DO OESTE', 'PR'),
(5163, 'VERA MENDES', 'PI'),
(5164, 'VERANÓPOLIS', 'RS'),
(5165, 'VERDEJANTE', 'PE'),
(5166, 'VERDELÂNDIA', 'MG'),
(5167, 'VERE', 'PR'),
(5168, 'VEREDA', 'BA'),
(5169, 'VEREDINHA', 'MG'),
(5170, 'VERÍSSIMO', 'MG'),
(5171, 'VERTENTE DO LÉRIO', 'PE'),
(5172, 'VERTENTES', 'PE'),
(5173, 'VESPASIANO', 'MG'),
(5174, 'VESPASIANO CORREA', 'RS'),
(5175, 'VIADUTOS', 'RS'),
(5176, 'VIAMÃO', 'RS'),
(5177, 'VIANA', 'ES'),
(5178, 'VIANÓPOLIS', 'GO'),
(5179, 'VICENCIA', 'PE'),
(5180, 'VICENTE DUTRA', 'RS'),
(5181, 'VICENTINA', 'MS'),
(5182, 'VICENTINÓPOLIS', 'GO'),
(5183, 'VICOSA', 'AL'),
(5184, 'VIÇOSA', 'MG'),
(5185, 'VICOSA DO CEARÁ', 'CE'),
(5186, 'VICTOR GRAEFF', 'RS'),
(5187, 'VIDAL RAMOS', 'SC'),
(5188, 'VIDEIRA', 'SC'),
(5189, 'VIEIRAS', 'MG'),
(5190, 'VIEIRÓPOLIS', 'PB'),
(5191, 'VIGIA', 'PA'),
(5192, 'ALTO PARAÍSO', 'PR'),
(5193, 'VILA BELA SS. TRINDADE', 'MT'),
(5194, 'VILA BOA', 'GO'),
(5195, 'VILA FLOR', 'RN'),
(5196, 'VILA FLORES', 'RS'),
(5197, 'VILA LANGARO', 'RS'),
(5198, 'VILA MARIA', 'RS'),
(5199, 'VILA NEWTON BELLO', 'MA'),
(5200, 'VILA NOVA DO PIAUÍ', 'PI'),
(5201, 'VILA NOVA DO SUL', 'RS'),
(5202, 'VILA NOVA DOS MARTIRIOS', 'MA'),
(5203, 'VILA PAULINO NEVES', 'MA'),
(5204, 'VILA PAVAO', 'ES'),
(5205, 'VILA PROPICIO', 'GO'),
(5206, 'VILA RICA', 'MT'),
(5207, 'VILA VALERIO', 'ES'),
(5208, 'VILA VELHA', 'ES'),
(5209, 'VILHENA', 'RO'),
(5210, 'VINHEDO', 'SP'),
(5211, 'VIRADOURO', 'SP'),
(5212, 'VIRGEM DA LAPA', 'MG'),
(5213, 'VIRGINIA', 'MG'),
(5214, 'VIRGINÓPOLIS', 'MG'),
(5215, 'VIRGOLÂNDIA', 'MG'),
(5216, 'VIRMOND', 'PR'),
(5217, 'VISCONDE DO RIO BRANCO', 'MG'),
(5218, 'VISEU', 'PA'),
(5219, 'VISTA ALEGRE', 'RS'),
(5220, 'VISTA ALEGRE DO ALTO', 'SP'),
(5221, 'VISTA ALEGRE DO PRATA', 'RS'),
(5222, 'VISTA ALEGRE DO PRETA', 'RS'),
(5223, 'VISTA GAÚCHA', 'RS'),
(5224, 'VISTA SERRANA', 'PB'),
(5225, 'VITOR MEIRELES', 'SC'),
(5226, 'VITÓRIA', 'ES'),
(5227, 'VITÓRIA BRASIL', 'SP'),
(5228, 'VITÓRIA DA CONQUISTA', 'BA'),
(5229, 'VITÓRIA DAS MISSÕES', 'RS'),
(5230, 'VITÓRIA DE SANTO ANTÃO', 'PE'),
(5231, 'VITÓRIA DO JARI', 'AP'),
(5232, 'VITÓRIA DO MEARIM', 'MA'),
(5233, 'VITÓRIA DO XINGU', 'PA'),
(5234, 'VITORINO', 'PR'),
(5235, 'VITORINO FREIRE', 'MA'),
(5236, 'VOLTA GRANDE', 'MG'),
(5237, 'VOLTA REDONDA', 'RJ'),
(5238, 'VOTORANTIM', 'SP'),
(5239, 'VOTUPORANGA', 'SP'),
(5240, 'WAGNER', 'BA'),
(5241, 'WALL FERRAZ', 'PI'),
(5242, 'WANDERLÂNDIA', 'TO'),
(5243, 'WANDERLEY', 'BA'),
(5244, 'WENCESLAU BRAS', 'PR'),
(5245, 'WENCESLAU BRAZ', 'MG'),
(5246, 'WENCESLAU GUIMARAES', 'BA'),
(5247, 'WITMARSUN', 'SC'),
(5248, 'XAMBIOA', 'TO'),
(5249, 'XAMBRÊ', 'PR'),
(5250, 'XANGRI-LA', 'RS'),
(5251, 'XANXERÊ', 'SC'),
(5252, 'XAPURI', 'AC'),
(5253, 'XAVANTINA', 'SC'),
(5254, 'XAXIM', 'SC'),
(5255, 'XEXEU', 'PE'),
(5256, 'XINGUARA', 'PA'),
(5257, 'XIQUE XIQUE', 'BA'),
(5258, 'ZABELE', 'PB'),
(5259, 'ZACARIAS', 'SP'),
(5260, 'ZE DOCA', 'MA'),
(5261, 'ZORTÉA', 'SC'),
(5262, 'SÍTIO NOVO', 'RN'),
(5263, 'ALTO ALEGRE DO PINDARÉ', 'MA'),
(5264, 'VARGEM ALEGRE', 'MG'),
(5265, 'SANTANA', 'BA'),
(5266, 'TRINDADE', 'PE'),
(5267, 'BONITO DE MINAS', 'MG'),
(5268, 'JUVENÍLIA', 'MG'),
(5269, 'NOVA NAZARÉ', 'MT'),
(5270, 'ITAOCARA', 'RJ'),
(5271, 'CUJUBIM', 'RO'),
(5272, 'ARARUNA', 'PB'),
(5273, 'SÃO FRANCISCO', 'PB'),
(5274, 'MACURURÉ', 'BA'),
(5275, 'SÃO BENTINHO', 'PB'),
(5276, 'BARCARENA', 'PA'),
(5277, 'ITAJÁ', 'RN'),
(5278, 'MONTEVIDIO DO NORTE', 'GO'),
(5279, 'ENTRE RIOS', 'SC'),
(5280, 'SERRINHA', 'RN'),
(5281, 'IRATI ', 'SC'),
(5282, 'PALMEIRINA', 'PE'),
(5283, 'VALE DE SÃO DOMINGOS', 'MT'),
(5284, 'NOVO HORIZONTE', 'SC'),
(5285, 'ARAGUAINHA', 'MT'),
(5286, 'ACRELÂNDIA', 'AC'),
(5287, 'BOM JARDIM', 'PE'),
(5288, 'SÃO SEBASTIÃO DA VARGEM ALEGRE', 'MG'),
(5289, 'SANTA LUZIA DO PARUÁ', 'MA'),
(5290, 'SERRA NOVA DOURADA', 'MT'),
(5291, 'SANTA RITA DO TRIVELATO', 'MT'),
(5292, 'TAPEROÁ', 'PB'),
(5293, 'JACUÍPE', 'AL'),
(5294, 'BONITO', 'PE'),
(5295, 'SALGADINHO', 'PE'),
(5296, 'TAPURAH', 'MT'),
(5297, 'PARAGUAÇU', 'SP'),
(5298, 'SANTA TEREZINHA', 'PE'),
(5299, 'ALTO ALEGRE DO PARECIS', 'RO'),
(5300, 'PIÇARRA', 'PA'),
(5301, 'INDAIABIRA', 'MG'),
(5302, 'ABADIA DE GOIÁS', 'GO'),
(5303, 'IGRAPIÚNA', 'BA'),
(5304, 'IGRAPIÚNA', 'BA'),
(5305, 'VALE DO ANARI', 'RO'),
(5306, 'BOM JESUS DO ARAGUAIA', 'MT'),
(5307, 'VIÇOSA', 'AL'),
(5308, 'SATUBA', 'AL'),
(5309, 'FÁTIMA', 'TO'),
(5310, 'ÁGUA BRANCA', 'PI'),
(5311, 'ALTO ALEGRE', 'RR'),
(5312, 'RIACHÃO', 'PB'),
(5313, 'PENDÊNCIAS', 'RN'),
(5314, 'BARRA DE ALCÂNTARA', 'PI'),
(5315, 'SÃO DOMINGOS', 'GO'),
(5316, 'ESTÂNCIA TURÍSTICA DE JOANÓPOLIS', 'SP'),
(5317, 'RESERVA DO IGUAÇU', 'PR'),
(5318, 'IBOTIRAMA', 'BA'),
(5319, 'CAFELÂNDIA', 'SP'),
(5320, 'SANTA CRUZ DO XINGU', 'MT'),
(5321, 'BANDEIRANTE', 'SC'),
(5322, 'CANTAGALO', 'MG'),
(5323, 'ARAGUAIANA', 'MT'),
(5324, 'CAPINZAL DO NORTE', 'MA'),
(5325, 'MOREILÂNDIA', 'PE'),
(5326, 'LAGOA DO ITAENGA', 'PE'),
(5327, 'TEIXEIRÓPOLIS', 'RO'),
(5328, 'CARAÚBAS', 'RN'),
(5329, 'PAÇO DO LUMIAR', 'MA'),
(5330, 'BOM JESUS', 'PI'),
(5331, 'CARACOL ', 'PI'),
(5332, 'JAGUAPITÃ', 'PR'),
(5333, 'BELA VISTA DO MARANHÃO', 'MA'),
(5334, 'SANTANA DE MANGUEIRA', 'PB'),
(5335, 'BOA ESPERANÇA', 'MG'),
(5336, 'CANÁPOLIS', 'MG'),
(5337, 'ALAGOA', 'MG'),
(5338, 'CONCEIÇÃO DA APARECIDA', 'MG'),
(5339, 'CONGONHAS', 'MG'),
(5340, 'OURO BRANCO', 'MG'),
(5341, 'PINTÓPOLIS', 'MG'),
(5342, 'RESENDE COSTA', 'MG'),
(5343, 'SÃO JOSÉ DA LAPA', 'MG'),
(5344, 'SÃO JOSÉ DO DIVINO', 'MG'),
(5345, 'SAO CARLOS', 'SP'),
(5346, 'ANCHIETA', 'SC'),
(5347, 'IRAQUARA', 'BA'),
(5348, 'CRUZEIRO DO SUL', 'PR'),
(5349, 'ITAMBÉ', 'PR'),
(5350, 'SANTA INÊS', 'PR'),
(5351, 'MUNICÍPIO', 'RS'),
(5354, 'NOVA SANTA RITA', 'RS'),
(5355, 'LAGES', 'SC'),
(5356, 'SANTA MARIA', 'RS'),
(5357, 'MARECHAL THAUMATURGO', 'AC'),
(5358, 'SANTA ROSA DO PURUS', 'AC'),
(5359, 'ÁGUA BRANCA', 'AL'),
(5360, 'COLÔNIA LEOPOLDINA', 'AL'),
(5361, 'DELMIRO GOUVEIA', 'AL'),
(5362, 'IGACI', 'AL'),
(5363, 'JEQUIÁ DA PRAIA', 'AL'),
(5364, 'MAR VERMELHO', 'AL'),
(5365, 'MONTEIRÓPOLIS', 'AL'),
(5366, 'OLHO D''ÁGUA GRANDE', 'AL'),
(5367, 'PINDOBA', 'AL'),
(5368, 'TAQUARANA', 'AL'),
(5369, 'CAREIRO', 'AM'),
(5370, 'GUAJARÁ', 'AM'),
(5371, 'SÃO GABRIEL DA CACHOEIRA', 'AM'),
(5372, 'AP', 'AP'),
(5373, 'CUTIAS', 'AP'),
(5374, 'BARROCAS', 'BA'),
(5375, 'CANDEAL', 'BA'),
(5376, 'CANDIBA', 'BA'),
(5377, 'ELÍSIO MEDRADO', 'BA'),
(5378, 'ENTRE RIOS', 'BA'),
(5379, 'GANDU', 'BA'),
(5380, 'GUANAMBI', 'BA'),
(5381, 'IBITITÁ', 'BA'),
(5382, 'JAGUARIPE', 'BA'),
(5383, 'JITAÚNA', 'BA'),
(5384, 'JUSSARA', 'BA'),
(5385, 'LAJE', 'BA'),
(5386, 'LIVRAMENTO DE NOSSA SENHORA', 'BA'),
(5387, 'LUÍS EDUARDO MAGALHÃES', 'BA'),
(5388, 'MARAGOGIPE', 'BA'),
(5389, 'MUQUÉM DE SÃO FRANCISCO', 'BA'),
(5390, 'PINDAÍ', 'BA'),
(5391, 'PIRITIBA', 'BA'),
(5392, 'SANTA CRUZ CABRÁLIA', 'BA'),
(5393, 'SANTALUZ', 'BA'),
(5394, 'SANTANÓPOLIS', 'BA'),
(5395, 'SANTA TERESINHA', 'BA'),
(5396, 'SÃO DOMINGOS', 'BA'),
(5397, 'SÃO JOSÉ DO JACUÍPE', 'BA'),
(5398, 'TANHAÇU', 'BA'),
(5399, 'XIQUE-XIQUE', 'BA'),
(5400, 'CAPISTRANO', 'CE'),
(5401, 'IBICUITINGA', 'CE'),
(5402, 'ITAPAGÉ', 'CE'),
(5403, 'JIJOCA DE JERICOACOARA', 'CE'),
(5404, 'MILAGRES', 'CE'),
(5405, 'CACHOEIRO DE ITAPEMIRIM', 'ES'),
(5406, 'CASTELO', 'ES'),
(5407, 'DIVINO DE SÃO LOURENÇO', 'ES'),
(5408, 'GOVERNADOR LINDENBERG', 'ES'),
(5409, 'PINHEIROS', 'ES'),
(5410, 'ABADIA DE GOI', 'GO'),
(5411, 'ABADIÂNIA', 'GO'),
(5412, 'ÁGUAS LINDAS DE GOIÁS', 'GO'),
(5413, 'BARRO ALTO', 'GO'),
(5414, 'CAMPOS BELOS', 'GO'),
(5415, 'DAVINÓPOLIS', 'GO'),
(5416, 'GAMELEIRA DE GOIÁS', 'GO'),
(5417, 'DIVINÓPOLIS DE GOIÁS', 'GO'),
(5418, 'HIDROLÂNDIA', 'GO'),
(5419, 'IPIRANGA DE GOIÁS', 'GO'),
(5420, 'LAGOA SANTA', 'GO'),
(5421, 'MORRINHOS', 'GO'),
(5422, 'MUNDO NOVO', 'GO'),
(5423, 'PIRANHAS', 'GO'),
(5424, 'SANTO ANTÔNIO DO DESCOBERTO', 'GO'),
(5425, 'SÃO MIGUEL DO PASSA QUATRO', 'GO'),
(5426, 'VALPARAÍSO DE GOIÁS', 'GO'),
(5427, 'AP DO MARANHÃO', 'MA'),
(5428, 'APICUM-AÇU', 'MA'),
(5429, 'ARARI', 'MA'),
(5430, 'BACABEIRA', 'MA'),
(5431, 'BARÃO DE GRAJAÚ', 'MA'),
(5432, 'BERNARDO DO MEARIM', 'MA'),
(5433, 'CONCEIÇÃO DO LAGO-AÇU', 'MA'),
(5434, 'GOVERNADOR EDISON LOBÃO', 'MA'),
(5435, 'GOVERNADOR LUIZ ROCHA', 'MA'),
(5436, 'GOVERNADOR NEWTON BELLO', 'MA'),
(5437, 'ITAPECURU MIRIM', 'MA'),
(5438, 'LAGOA DO MATO', 'MA'),
(5439, 'PERI MIRIM', 'MA'),
(5440, 'PINDARÉ-MIRIM', 'MA'),
(5441, 'PRESIDENTE DUTRA', 'MA'),
(5442, 'SANTA INÊS', 'MA'),
(5443, 'SÃO RAIMUNDO DAS MANGABEIRAS', 'MA'),
(5444, 'SÃO RAIMUNDO DO DOCA BEZERRA', 'MA'),
(5445, 'SÃO VICENTE FERRER', 'MA'),
(5446, 'SENADOR LA ROCQUE', 'MA'),
(5447, 'VIANA', 'MA'),
(5448, 'ABADIA DOS DOURADOS', 'MG'),
(5449, 'AMPARO DO SERRA', 'MG'),
(5450, 'CACHOEIRA DE PAJEÚ', 'MG'),
(5451, 'CACHOEIRA DOURADA', 'MG'),
(5452, 'CAMPESTRE', 'MG'),
(5453, 'CAMPO AZUL', 'MG'),
(5454, 'CANDEIAS', 'MG'),
(5455, 'CONCEIÇÃO DA BARRA DE MINAS', 'MG'),
(5456, 'CATAS ALTAS DA NORUEGA', 'MG');
INSERT INTO `municipios` (`codigo`, `nome`, `uf`) VALUES
(5457, 'CÔNEGO MARINHO', 'MG'),
(5458, 'CÓRREGO FUNDO', 'MG'),
(5459, 'COUTO DE MAGALHÃES DE MINAS', 'MG'),
(5460, 'DONA EUSÉBIA', 'MG'),
(5461, 'FELISBURGO', 'MG'),
(5462, 'FORMOSO', 'MG'),
(5463, 'FREI LAGONEGRO', 'MG'),
(5464, 'FRUTA DE LEITE', 'MG'),
(5465, 'GOIABEIRA', 'MG'),
(5466, 'IGARAPÉ', 'MG'),
(5467, 'IMBÉ DE MINAS', 'MG'),
(5468, 'INDIANÓPOLIS', 'MG'),
(5469, 'ITABIRINHA', 'MG'),
(5470, 'JAPONVAR', 'MG'),
(5471, 'LUISBURGO', 'MG'),
(5472, 'LUISLÂNDIA', 'MG'),
(5473, 'NACIP RAYDAN', 'MG'),
(5474, 'NOVORIZONTE', 'MG'),
(5475, 'OLHOS-D''ÁGUA', 'MG'),
(5476, 'ONÇA DE PITANGUI', 'MG'),
(5477, 'ORIZÂNIA', 'MG'),
(5478, 'PASSA-VINTE', 'MG'),
(5479, 'PATIS', 'MG'),
(5480, 'PATROCÍNIO DO MURIAÉ', 'MG'),
(5481, 'PEDRA BONITA', 'MG'),
(5482, 'PINGO-D''ÁGUA', 'MG'),
(5483, 'PIUMHI', 'MG'),
(5484, 'PRESIDENTE JUSCELINO', 'MG'),
(5485, 'REDUTO', 'MG'),
(5486, 'SANTA BÁRBARA DO MONTE VERDE', 'MG'),
(5487, 'SANTA CRUZ DE MINAS', 'MG'),
(5488, 'SANTA HELENA DE MINAS', 'MG'),
(5489, 'SANTA LUZIA', 'MG'),
(5490, 'SANTA RITA DE IBITIPOCA', 'MG'),
(5491, 'SÃO BENTO ABADE', 'MG'),
(5492, 'SÃO GERALDO DO BAIXIO', 'MG'),
(5493, 'SÃO GONÇALO DO RIO ABAIXO', 'MG'),
(5494, 'SÃO JOÃO BATISTA DO GLÓRIA', 'MG'),
(5495, 'SÃO JOÃO DO PARAÍSO', 'MG'),
(5496, 'SÃO JOAQUIM DE BICAS', 'MG'),
(5497, 'SÃO SEBASTIÃO DA BELA VISTA', 'MG'),
(5498, 'SÃO SEBASTIÃO DO ANTA', 'MG'),
(5499, 'SÃO THOMÉ DAS LETRAS', 'MG'),
(5500, 'SEM-PEIXE', 'MG'),
(5501, 'SERRANÓPOLIS DE MINAS', 'MG'),
(5502, 'TOCOS DO MOJI', 'MG'),
(5503, 'VARGEM GRANDE DO RIO PARDO', 'MG'),
(5504, 'VERMELHO NOVO', 'MG'),
(5505, 'BATAYPORÃ', 'MS'),
(5506, 'BONITO', 'MS'),
(5507, 'DOURADINA', 'MS'),
(5508, 'FIGUEIRÃO', 'MS'),
(5509, 'JARDIM', 'MS'),
(5510, 'MUNDO NOVO', 'MS'),
(5511, 'SANTA RITA DO PARDO', 'MS'),
(5512, 'SÃO GABRIEL DO OESTE', 'MS'),
(5513, 'CANABRAVA DO NORTE', 'MT'),
(5514, 'CANARANA', 'MT'),
(5515, 'COLNIZA', 'MT'),
(5516, 'CONQUISTA D''OESTE', 'MT'),
(5517, 'CURVELÂNDIA', 'MT'),
(5518, 'FIGUEIRÓPOLIS D''OESTE', 'MT'),
(5519, 'IPIRANGA DO NORTE', 'MT'),
(5520, 'ITANHANGÁ', 'MT'),
(5521, 'LAMBARI D''OESTE', 'MT'),
(5522, 'VILA BELA DA SANTÍSSIMA TRINDADE', 'MT'),
(5523, 'NOVA BANDEIRANTES', 'MT'),
(5524, 'NOVA SANTA HELENA', 'MT'),
(5525, 'NOVA UBIRATÃ', 'MT'),
(5526, 'NOVO SANTO ANTÔNIO', 'MT'),
(5527, 'RIO BRANCO', 'MT'),
(5528, 'SANTA TEREZINHA', 'MT'),
(5529, 'SANTO ANTÔNIO DO LESTE', 'MT'),
(5530, 'BONITO', 'PA'),
(5531, 'CONCEIÇÃO DO ARAGUAIA', 'PA'),
(5532, 'IGARAPÉ-MIRI', 'PA'),
(5533, 'ORIXIMINÁ', 'PA'),
(5534, 'BARRA DE SÃO MIGUEL', 'PB'),
(5535, 'CONDE', 'PB'),
(5536, 'MÃE D''ÁGUA', 'PB'),
(5537, 'MULUNGU', 'PB'),
(5538, 'NOVA OLINDA', 'PB'),
(5539, 'PEDRA BRANCA', 'PB'),
(5540, 'PRATA', 'PB'),
(5541, 'QUEIMADAS', 'PB'),
(5542, 'RIACHÃO DO BACAMARTE', 'PB'),
(5543, 'SANTA CECÍLIA', 'PB'),
(5544, 'SANTA INÊS', 'PB'),
(5545, 'SANTA LUZIA', 'PB'),
(5546, 'SANTARÉM', 'PB'),
(5547, 'SANTA RITA', 'PB'),
(5548, 'SANTA TERESINHA', 'PB'),
(5549, 'SANTO ANDRÉ', 'PB'),
(5550, 'SÃO DOMINGOS', 'PB'),
(5551, 'CAMPO DE SANTANA', 'PB'),
(5552, 'BELÉM DO SÃO FRANCISCO', 'PE'),
(5553, 'CEDRO', 'PE'),
(5554, 'CONDADO', 'PE'),
(5555, 'FEIRA NOVA', 'PE'),
(5556, 'FERNANDO DE NORONHA', 'PE'),
(5557, 'GOIANA', 'PE'),
(5558, 'ITAMBÉ', 'PE'),
(5559, 'JATOBÁ', 'PE'),
(5560, 'LAGOA GRANDE', 'PE'),
(5561, 'PAULISTA', 'PE'),
(5562, 'SANTA CRUZ', 'PE'),
(5563, 'SÃO JOÃO', 'PE'),
(5564, 'TERRA NOVA', 'PE'),
(5565, 'TRIUNFO', 'PE'),
(5566, 'ALVORADA DO GURGUÉIA', 'PI'),
(5567, 'AROEIRAS DO ITAIM', 'PI'),
(5568, 'BARRA D''ALCÂNTARA', 'PI'),
(5569, 'BATALHA', 'PI'),
(5570, 'CAPITÃO GERVÁSIO OLIVEIRA', 'PI'),
(5571, 'JARDIM DO MULATO', 'PI'),
(5572, 'JUREMA', 'PI'),
(5573, 'LAGOA DO PIAUÍ', 'PI'),
(5574, 'LUÍS CORREIA', 'PI'),
(5575, 'MURICI DOS PORTELAS', 'PI'),
(5576, 'NAZÁRIA', 'PI'),
(5577, 'PAU D''ARCO DO PIAUÍ', 'PI'),
(5578, 'REDENÇÃO DO GURGUÉIA', 'PI'),
(5579, 'SANTA FILOMENA', 'PI'),
(5580, 'SANTA LUZ', 'PI'),
(5581, 'SÃO BRAZ DO PIAUÍ', 'PI'),
(5582, 'SÃO FRANCISCO DE ASSIS DO PIAUÍ', 'PI'),
(5583, 'SÃO JOSÉ DO DIVINO', 'PI'),
(5584, 'VÁRZEA GRANDE', 'PI'),
(5585, 'AGUDOS DO SUL', 'PR'),
(5586, 'ARAPUÃ', 'PR'),
(5587, 'BANDEIRANTES', 'PR'),
(5588, 'BOM JESUS DO SUL', 'PR'),
(5589, 'BOM SUCESSO DO SUL', 'PR'),
(5590, 'CAPANEMA', 'PR'),
(5591, 'CERRO AZUL', 'PR'),
(5592, 'DOUTOR CAMARGO', 'PR'),
(5593, 'FERNANDES PINHEIRO', 'PR'),
(5594, 'GENERAL CARNEIRO', 'PR'),
(5595, 'IGUATU', 'PR'),
(5596, 'IPORÃ', 'PR'),
(5597, 'ITAPEJARA D''OESTE', 'PR'),
(5598, 'JAPURÁ', 'PR'),
(5599, 'LARANJAL', 'PR'),
(5600, 'LARANJEIRAS DO SUL', 'PR'),
(5601, 'NOVA AURORA', 'PR'),
(5602, 'NOVA FÁTIMA', 'PR'),
(5603, 'PÉROLA D''OESTE', 'PR'),
(5604, 'PLANALTO', 'PR'),
(5605, 'RANCHO ALEGRE D''OESTE', 'PR'),
(5606, 'SANTA CRUZ DE MONTE CASTELO', 'PR'),
(5607, 'SÃO JORGE D''OESTE', 'PR'),
(5608, 'TAPIRA', 'PR'),
(5609, 'TOLEDO', 'PR'),
(5610, 'WENCESLAU BRAZ', 'PR'),
(5611, 'ARMAÇÃO DOS BÚZIOS', 'RJ'),
(5612, 'BOM JARDIM', 'RJ'),
(5613, 'BOM JESUS DO ITABAPOANA', 'RJ'),
(5614, 'ENGENHEIRO PAULO DE FRONTIN', 'RJ'),
(5615, 'MESQUITA', 'RJ'),
(5616, 'NOVA IGUAÇU', 'RJ'),
(5617, 'PB DO SUL', 'RJ'),
(5618, 'SÃO FRANCISCO DE ITABAPOANA', 'RJ'),
(5619, 'SÃO JOSÉ DO VALE DO RIO PRETO', 'RJ'),
(5620, 'AUGUSTO SEVERO', 'RN'),
(5621, 'BARAÚNA', 'RN'),
(5622, 'BOM JESUS', 'RN'),
(5623, 'BREJINHO', 'RN'),
(5624, 'CEARÁ-MIRIM', 'RN'),
(5625, 'PARNAMIRIM', 'RN'),
(5626, 'JANDAÍRA', 'RN'),
(5627, 'JANUÁRIO CICCO', 'RN'),
(5628, 'JARDIM DO SERIDÓ', 'RN'),
(5629, 'JUNDIÁ', 'RN'),
(5630, 'LAJES', 'RN'),
(5631, 'MONTE ALEGRE', 'RN'),
(5632, 'OLHO-D''ÁGUA DO BORGES', 'RN'),
(5633, 'PEDRA PRETA', 'RN'),
(5634, 'PRESIDENTE JUSCELINO', 'RN'),
(5635, 'RIACHO DE SANTANA', 'RN'),
(5636, 'RUY BARBOSA', 'RN'),
(5637, 'SANTA CRUZ', 'RN'),
(5638, 'SÃO GONÇALO DO AMARANTE', 'RN'),
(5639, 'SÃO JOÃO DO SABUGI', 'RN'),
(5640, 'SÃO JOSÉ DO CAMPESTRE', 'RN'),
(5641, 'SÃO JOSÉ DO SERIDÓ', 'RN'),
(5642, 'SÃO MIGUEL DO GOSTOSO', 'RN'),
(5643, 'SÃO TOMÉ', 'RN'),
(5644, 'TIMBAÚBA DOS BATISTAS', 'RN'),
(5645, 'VÁRZEA', 'RN'),
(5646, 'VENHA-VER', 'RN'),
(5647, 'VERA CRUZ', 'RN'),
(5648, 'VIÇOSA', 'RN'),
(5649, 'ALTA FLORESTA D''OESTE', 'RO'),
(5650, 'CABIXI', 'RO'),
(5651, 'COLORADO DO OESTE', 'RO'),
(5652, 'ESPIGÃO D''OESTE', 'RO'),
(5653, 'MACHADINHO D''OESTE', 'RO'),
(5654, 'NOVA BRASILÂNDIA D''OESTE', 'RO'),
(5655, 'PRESIDENTE MÉDICI', 'RO'),
(5656, 'SANTA LUZIA D''OESTE', 'RO'),
(5657, 'ALVORADA D''OESTE', 'RO'),
(5658, 'ALTO ALEGRE DOS PARECIS', 'RO'),
(5659, 'GOVERNADOR JORGE TEIXEIRA', 'RO'),
(5660, 'ITAPUÃ DO OESTE', 'RO'),
(5661, 'MONTE NEGRO', 'RO'),
(5662, 'NOVA UNIÃO', 'RO'),
(5663, 'SÃO FELIPE D''OESTE', 'RO'),
(5664, 'SÃO FRANCISCO DO GUAPORÉ', 'RO'),
(5665, 'UIRAMUTÃ', 'RR'),
(5666, 'ALMIRANTE TAMANDARÉ DO SUL', 'RS'),
(5667, 'BOA VISTA DO CADEADO', 'RS'),
(5668, 'BOA VISTA DO INCRA', 'RS'),
(5669, 'BOM JESUS', 'RS'),
(5670, 'BOZANO', 'RS'),
(5671, 'CAPÃO BONITO DO SUL', 'RS'),
(5672, 'CAPÃO DO CIPÓ', 'RS'),
(5673, 'COLINAS', 'RS'),
(5674, 'COLORADO', 'RS'),
(5675, 'CRUZALTENSE', 'RS'),
(5676, 'CRUZEIRO DO SUL', 'RS'),
(5677, 'ENTRE-IJUÍS', 'RS'),
(5678, 'FAZENDA VILANOVA', 'RS'),
(5679, 'FORQUETINHA', 'RS'),
(5680, 'HUMAITÁ', 'RS'),
(5681, 'INDEPENDÊNCIA', 'RS'),
(5682, 'ITATI', 'RS'),
(5683, 'JACUIZINHO', 'RS'),
(5684, 'LAGOA BONITA DO SUL', 'RS'),
(5685, 'MARAU', 'RS'),
(5686, 'MATO QUEIMADO', 'RS'),
(5687, 'NÃO-ME-TOQUE', 'RS'),
(5688, 'PAULO BENTO', 'RS'),
(5689, 'PEDRAS ALTAS', 'RS'),
(5690, 'PLANALTO', 'RS'),
(5691, 'QUATRO IRMÃOS', 'RS'),
(5692, 'ROLADOR', 'RS'),
(5693, 'SANTA CECÍLIA DO SUL', 'RS'),
(5694, 'SANTA CRUZ DO SUL', 'RS'),
(5695, 'SANTA MARGARIDA DO SUL', 'RS'),
(5696, 'SANT''ANA DO LIVRAMENTO', 'RS'),
(5697, 'SANTO ANTÔNIO DA PATRULHA', 'RS'),
(5698, 'SÃO FRANCISCO DE PAULA', 'RS'),
(5699, 'SÃO GABRIEL', 'RS'),
(5700, 'SÃO JOSÉ DO SUL', 'RS'),
(5701, 'SP DAS MISSÕES', 'RS'),
(5702, 'SÃO PEDRO DAS MISSÕES', 'RS'),
(5703, 'SINIMBU', 'RS'),
(5704, 'SOLEDADE', 'RS'),
(5705, 'TAPEJARA', 'RS'),
(5706, 'TIO HUGO', 'RS'),
(5707, 'TRIUNFO', 'RS'),
(5708, 'UBIRETAMA', 'RS'),
(5709, 'UNISTALDA', 'RS'),
(5710, 'VERA CRUZ', 'RS'),
(5711, 'WESTFALIA', 'RS'),
(5712, 'ANTÔNIO CARLOS', 'SC'),
(5713, 'BALNEÁRIO ARROIO DO SILVA', 'SC'),
(5714, 'BELMONTE', 'SC'),
(5715, 'CAMPO ALEGRE', 'SC'),
(5716, 'CATANDUVAS', 'SC'),
(5717, 'CUNHA PORÃ', 'SC'),
(5718, 'FREI ROGÉRIO', 'SC'),
(5719, 'GRÃO PARÁ', 'SC'),
(5720, 'GUARACIABA', 'SC'),
(5721, 'IÇARA', 'SC'),
(5722, 'IPIRA', 'SC'),
(5723, 'ITAPIRANGA', 'SC'),
(5724, 'LUIZ ALVES', 'SC'),
(5725, 'MARAVILHA', 'SC'),
(5726, 'NOVA VENEZA', 'SC'),
(5727, 'OURO VERDE', 'SC'),
(5728, 'PALMEIRA', 'SC'),
(5729, 'PETROLÂNDIA', 'SC'),
(5730, 'BALNEÁRIO PIÇARRAS', 'SC'),
(5731, 'PINHALZINHO', 'SC'),
(5732, 'PRESIDENTE CASTELLO BRANCO', 'SC'),
(5733, 'SALTO VELOSO', 'SC'),
(5734, 'SANTA HELENA', 'SC'),
(5735, 'SANTA TEREZINHA', 'SC'),
(5736, 'SANTIAGO DO SUL', 'SC'),
(5737, 'SÃO JOÃO BATISTA', 'SC'),
(5738, 'SÃO JOÃO DO ITAPERIÚ', 'SC'),
(5739, 'SÃO LOURENÇO DO OESTE', 'SC'),
(5740, 'SÃO MARTINHO', 'SC'),
(5741, 'TANGARÁ', 'SC'),
(5742, 'WITMARSUM', 'SC'),
(5743, 'CANINDÉ DE SÃO FRANCISCO', 'SE'),
(5744, 'CAPELA', 'SE'),
(5745, 'CEDRO DE SÃO JOÃO', 'SE'),
(5746, 'GRACHO CARDOSO', 'SE'),
(5747, 'MONTE ALEGRE DE SERGIPE', 'SE'),
(5748, 'PACATUBA', 'SE'),
(5749, 'SÃO FRANCISCO', 'SE'),
(5750, 'ALTO ALEGRE', 'SP'),
(5751, 'APARECIDA D''OESTE', 'SP'),
(5752, 'ARCO-ÍRIS', 'SP'),
(5753, 'BARRA BONITA', 'SP'),
(5754, 'BOCAINA', 'SP'),
(5755, 'BORBOREMA', 'SP'),
(5756, 'CEDRAL', 'SP'),
(5757, 'ELDORADO', 'SP'),
(5758, 'ESTRELA D''OESTE', 'SP'),
(5759, 'ESTRELA DO NORTE', 'SP'),
(5760, 'FLORÍNIA', 'SP'),
(5761, 'GUAÍRA', 'SP'),
(5762, 'GUARACI', 'SP'),
(5763, 'GUARANI D''OESTE', 'SP'),
(5764, 'JABORANDI', 'SP'),
(5765, 'JARDINÓPOLIS', 'SP'),
(5766, 'JAÚ', 'SP'),
(5767, 'LUÍS ANTÔNIO', 'SP'),
(5768, 'LUIZIÂNIA', 'SP'),
(5769, 'MOJI MIRIM', 'SP'),
(5770, 'MONTE CASTELO', 'SP'),
(5771, 'PALMEIRA D''OESTE', 'SP'),
(5772, 'PALMITAL', 'SP'),
(5773, 'PITANGUEIRAS', 'SP'),
(5774, 'PLANALTO', 'SP'),
(5775, 'PRAIA GRANDE', 'SP'),
(5776, 'RIO CLARO', 'SP'),
(5777, 'SALTINHO', 'SP'),
(5778, 'SANTA BÁRBARA D''OESTE', 'SP'),
(5779, 'SANTA CLARA D''OESTE', 'SP'),
(5780, 'SANTA ISABEL', 'SP'),
(5781, 'SANTA RITA D''OESTE', 'SP'),
(5782, 'SANTA ROSA DE VITERBO', 'SP'),
(5783, 'SÃO FRANCISCO', 'SP'),
(5784, 'SÃO JOÃO DO PAU D''ALHO', 'SP'),
(5785, 'SÃO LUÍS DO PARAITINGA', 'SP'),
(5786, 'SÃO PEDRO', 'SP'),
(5787, 'SÃO SEBASTIÃO', 'SP'),
(5788, 'SÃO VICENTE', 'SP'),
(5789, 'SERTÃOZINHO', 'SP'),
(5790, 'TABATINGA', 'SP'),
(5791, 'TAPIRAÍ', 'SP'),
(5792, 'TEODORO SAMPAIO', 'SP'),
(5793, 'TERRA ROXA', 'SP'),
(5794, 'VALPARAÍSO', 'SP'),
(5795, 'VERA CRUZ', 'SP'),
(5796, 'ALVORADA', 'TO'),
(5797, 'ARAGUANÃ', 'TO'),
(5798, 'BANDEIRANTES DO TOCANTINS', 'TO'),
(5799, 'BOM JESUS DO TOCANTINS', 'TO'),
(5800, 'CACHOEIRINHA', 'TO'),
(5801, 'CENTENÁRIO', 'TO'),
(5802, 'CHAPADA DE AREIA', 'TO'),
(5803, 'CRISTALÂNDIA', 'TO'),
(5804, 'ESPERANTINA', 'TO'),
(5805, 'FILADÉLFIA', 'TO'),
(5806, 'IPUEIRAS', 'TO'),
(5807, 'LAJEADO', 'TO'),
(5808, 'MONTE SANTO DO TOCANTINS', 'TO'),
(5809, 'NATIVIDADE', 'TO'),
(5810, 'NAZARÉ', 'TO'),
(5811, 'NOVA OLINDA', 'TO'),
(5812, 'PARANÃ', 'TO'),
(5813, 'PAU D''ARCO', 'TO'),
(5814, 'SÃO VALÉRIO', 'TO'),
(5815, 'TAIPAS DO TOCANTINS', 'TO'),
(5816, 'EXTERIOR', 'EX');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nfe_creditos`
--

CREATE TABLE IF NOT EXISTS `nfe_creditos` (
  `codigo` int(11) NOT NULL,
  `credito` float(5,2) DEFAULT '0.00',
  `tipopessoa` varchar(4) DEFAULT 'PFPJ',
  `issretido` varchar(3) DEFAULT 'N',
  `valor` float(10,2) DEFAULT '0.00',
  `estado` char(1) DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `codigo` bigint(20) NOT NULL,
  `numero` int(10) DEFAULT NULL,
  `codverificacao` varchar(9) DEFAULT NULL,
  `datahoraemissao` datetime DEFAULT NULL,
  `codemissor` int(10) DEFAULT NULL,
  `codtomador` int(11) DEFAULT NULL,
  `rps_numero` varchar(20) DEFAULT NULL,
  `rps_data` date DEFAULT NULL,
  `tomador_nome` varchar(100) NOT NULL DEFAULT '',
  `tomador_cnpjcpf` varchar(18) NOT NULL DEFAULT '',
  `tomador_inscrmunicipal` varchar(20) DEFAULT NULL,
  `tomador_inscrestadual` varchar(255) DEFAULT NULL,
  `tomador_endereco` varchar(100) DEFAULT NULL,
  `tomador_logradouro` varchar(80) DEFAULT NULL,
  `tomador_numero` int(11) DEFAULT NULL,
  `tomador_complemento` varchar(80) DEFAULT NULL,
  `tomador_bairro` varchar(80) DEFAULT NULL,
  `tomador_cep` varchar(9) DEFAULT NULL,
  `tomador_municipio` varchar(100) DEFAULT NULL,
  `tomador_uf` char(2) DEFAULT NULL,
  `tomador_email` varchar(100) DEFAULT NULL,
  `discriminacao` varchar(400) DEFAULT NULL,
  `observacao` text,
  `valortotal` double(10,2) DEFAULT NULL,
  `valordeducoes` float(10,2) DEFAULT NULL,
  `valoracrescimos` float(10,2) DEFAULT NULL,
  `basecalculo` double(10,2) DEFAULT NULL,
  `valoriss` float(10,2) DEFAULT NULL,
  `issretido` float(10,2) DEFAULT NULL COMMENT 'Valor do iss retido',
  `valorinss` float(10,2) DEFAULT NULL,
  `cofins` decimal(10,2) DEFAULT NULL,
  `contribuicaosocial` decimal(10,2) DEFAULT NULL,
  `aliqinss` float(10,2) DEFAULT NULL,
  `valorirrf` float(10,2) DEFAULT NULL,
  `aliqirrf` float(10,2) DEFAULT NULL,
  `deducao_irrf` float(11,2) DEFAULT NULL,
  `total_retencao` float(11,2) DEFAULT NULL,
  `credito` float(10,2) DEFAULT NULL,
  `pispasep` float(10,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL COMMENT 'Estado da nfe, valores N  para normal, B boleto gerado, E nota escriturada',
  `tipoemissao` varchar(10) DEFAULT 'online' COMMENT 'Tipo da nfe emitida, "online" ou "importada"',
  `motivo_cancelamento` text CHARACTER SET utf8,
  `aliq_percentual` float(10,2) DEFAULT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3606 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `notas`
--

INSERT INTO `notas` (`codigo`, `numero`, `codverificacao`, `datahoraemissao`, `codemissor`, `codtomador`, `rps_numero`, `rps_data`, `tomador_nome`, `tomador_cnpjcpf`, `tomador_inscrmunicipal`, `tomador_inscrestadual`, `tomador_endereco`, `tomador_logradouro`, `tomador_numero`, `tomador_complemento`, `tomador_bairro`, `tomador_cep`, `tomador_municipio`, `tomador_uf`, `tomador_email`, `discriminacao`, `observacao`, `valortotal`, `valordeducoes`, `valoracrescimos`, `basecalculo`, `valoriss`, `issretido`, `valorinss`, `cofins`, `contribuicaosocial`, `aliqinss`, `valorirrf`, `aliqirrf`, `deducao_irrf`, `total_retencao`, `credito`, `pispasep`, `estado`, `tipoemissao`, `motivo_cancelamento`, `aliq_percentual`, `id_municipio`) VALUES
(3596, 25092, 'IFTZ-CXDX', '2021-03-03 19:56:00', 502, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', '', '', 808444.46, 0.00, 0.00, 824943.33, 0.00, 16498.87, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 16498.87, 0.00, 0.00, 'N', 'online', NULL, 2.00, 2530),
(3597, 25093, 'QAXH-HHTK', '2021-06-08 17:53:00', 502, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', 'Pagamento da 4ª Medição referente ao Recapeamento Asfáltico no Município de Lábrea/AM, Contrato de Repasse OGU MDR 889045/2019 – Operação 1066663-06, ART de Execução AM20200220346.', '', 1779590.57, 0.00, 0.00, 1779590.57, 35591.81, 0.00, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 'online', NULL, 2.00, 2530),
(3598, 1, 'UUPV-WOLW', '2021-06-08 18:23:00', 504, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', 'Contrato de Repasse OGU MDR 894423/2019 – Operação 1068902-09, ART de Execução AM20200223074.', '', 271265.49, 0.00, 0.00, 271265.49, 5425.31, 0.00, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'N', 'online', NULL, 2.00, 2181),
(3599, 25094, 'TFVD-GYHB', '2021-07-29 11:31:00', 502, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', '', '', 1645788.91, 0.00, 0.00, 1679376.44, 0.00, 33587.53, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 33587.53, 0.00, 0.00, 'C', 'online', 'nota pendente de iss retido na fonte', 2.00, 2530),
(3600, 25095, 'TXJR-KRFF', '2021-07-29 13:11:00', 502, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', '', '', 1645788.91, 0.00, 0.00, 1679376.44, 0.00, 33587.53, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 33587.53, 0.00, 0.00, 'N', 'online', NULL, 2.00, 2530),
(3601, 2, 'QYET-NYKH', '2021-08-12 16:04:00', 504, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', 'Referente a 2º medição da PAVIMENTAÇÃO ASFÁLTICA DO SISTEMA VIÁRIO NO MUNICÍPIO DE LÁBREA/AM', '', 112316.13, 0.00, 0.00, 114608.30, 0.00, 2292.17, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 2292.17, 0.00, 0.00, 'C', 'online', 'Erro no serviço e Aliquota', 2.00, 2530),
(3602, 3, 'MXFO-XHXG', '2021-08-12 16:14:00', 504, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', '', '', 112316.13, 0.00, 0.00, 114608.30, 0.00, 2292.17, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 2292.17, 0.00, 0.00, 'C', 'online', 'Erro no serviço e Aliquota', 2.00, 2530),
(3603, 4, 'DNET-CKJJ', '2021-08-12 16:28:00', 504, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', '', '', 112316.13, 0.00, 0.00, 114608.30, 0.00, 2292.17, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 2292.17, 0.00, 0.00, 'N', 'online', NULL, 2.00, 2530),
(3604, 5, 'XZIT-INRX', '2021-10-07 22:21:00', 504, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE LABREÁ', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', 'PAGAMENTO DA 2ª MEDIÇÃO REFERENTE À PAVIMENTAÇÃO ASFÁLTICA DO SISTEMA VIÁRIO NO MUNICÍPIO DE LÁBREA/AM, CONTRATO DE REPASSE OGU MDR 894423/2019 - OPERAÇÃO 1068902-09, ART DE EXECUÇÃO AM 20200223074.', '', 132109.54, 0.00, 0.00, 134805.65, 0.00, 2696.11, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 2696.11, 0.00, 0.00, 'N', 'online', NULL, 2.00, 2530),
(3605, 25096, 'RIUZ-TOBA', '2021-10-07 22:47:00', 502, 503, NULL, NULL, 'PREFEITURA MUNICIPAL DE JURUBEBA', '05.830.872/0001-09', '', '', NULL, 'RUA 22 DE OUTUBRO', 1888, '', 'CENTRO', '69830-000', 'JURUBEBA', 'AM', 'gabinetedoprefeitodelabrea@hotmail.com', 'PAGAMENTO DA 6ª MEDIÇÃO REFERENTE À RECAPEAMENTO ASFÁLTICA NO MUNICÍPIO DE LÁBREA/AM, CONTRATO DE REPASSE OGU MDR 889045/2019 - OPERAÇÃO 1066663-06, ART DE EXECUÇÃO AM 20200220346.', '', 2838260.36, 0.00, 0.00, 2896184.05, 0.00, 57923.69, 0.00, '0.00', '0.00', 0.00, 0.00, 0.00, 0.00, 57923.69, 0.00, 0.00, 'N', 'online', NULL, 2.00, 2530);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas_servicos`
--

CREATE TABLE IF NOT EXISTS `notas_servicos` (
  `codigo` int(11) NOT NULL,
  `codnota` int(11) DEFAULT NULL,
  `codservico` bigint(11) DEFAULT NULL,
  `basecalculo` double(10,2) DEFAULT NULL,
  `issretido` float(10,2) DEFAULT NULL,
  `iss` float(10,2) DEFAULT NULL,
  `discriminacao` text
) ENGINE=InnoDB AUTO_INCREMENT=3933 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `notas_servicos`
--

INSERT INTO `notas_servicos` (`codigo`, `codnota`, `codservico`, `basecalculo`, `issretido`, `iss`, `discriminacao`) VALUES
(3923, 3596, 232, 824943.33, 16498.87, 0.00, 'REFERENTE A 3&ordf; MEDI&Ccedil;&Atilde;O DOS SERVI&Ccedil;OS EXECUTADOS DE RECAPEAMENTO ASFAL TICOS NO MUNICIPIO DE L&Aacute;BREA-AM, CONFORME CONTRATO DE REPASSE OGU N&ordm; 889045/2019 - OPERA&Ccedil;&Atilde;O 106663-06 NO &Acirc;MBITO DO PROGRAMA PLANEJAMENTO URBANO JUNTO DO MINIST&Eacute;RIO DO DESENVOLVIMENTO REGIONAL.'),
(3924, 3597, 232, 1779590.57, 0.00, 35591.81, 'Pagamento da 4&ordf; Medi&ccedil;&atilde;o referente ao Recapeamento Asf&aacute;ltico no Munic&iacute;pio de L&aacute;brea/AM'),
(3925, 3598, 359, 271265.49, 0.00, 5425.31, 'Pagamento da 1&ordf; Medi&ccedil;&atilde;o referente &agrave; Pavimenta&ccedil;&atilde;o Asf&aacute;ltica do Sistema Vi&aacute;rio no Munic&iacute;pio de L&aacute;brea/AM'),
(3926, 3599, 232, 1679376.44, 0.00, 33587.53, 'Discrimina&ccedil;&atilde;o do Servi&ccedil;o no Pagamento da 5&ordf; Medi&ccedil;&atilde;o referente ao Recapeamento Asf&aacute;ltico no Munic&iacute;pio de L&aacute;brea/AM, Contrato de Repasse OGU MDR 889045/2019 – Opera&ccedil;&atilde;o 1066663-06, ART de Execu&ccedil;&atilde;o AM20200220346.'),
(3927, 3600, 232, 1679376.44, 33587.53, 0.00, 'Discrimina&ccedil;&atilde;o do Servi&ccedil;o de Pagamento da 5&ordf; Medi&ccedil;&atilde;o referente ao Recapeamento Asf&aacute;ltico no Munic&iacute;pio de L&aacute;brea/AM, Contrato de Repasse OGU MDR 889045/2019 – Opera&ccedil;&atilde;o 1066663-06, ART de Execu&ccedil;&atilde;o AM20200220346.'),
(3928, 3601, 359, 114608.30, 2292.17, 0.00, 'Objeto: referente a 2&ordm; medi&ccedil;&atilde;o da PAVIMENTA&Ccedil;&Atilde;O ASF&Aacute;LTICA DO SISTEMA VI&Aacute;RIO NO MUNIC&Iacute;PIO DE L&Aacute;BREA/AM'),
(3929, 3602, 359, 114608.30, 2292.17, 0.00, 'Referente a 2&ordm; medi&ccedil;&atilde;o da PAVIMENTA&Ccedil;&Atilde;O ASF&Aacute;LTICA DO SISTEMA VI&Aacute;RIO NO MUNIC&Iacute;PIO DE L&Aacute;BREA/AM'),
(3930, 3603, 204, 114608.30, 2292.17, 0.00, 'Referente a 2&ordm; medi&ccedil;&atilde;o da PAVIMENTA&Ccedil;&Atilde;O ASF&Aacute;LTICA DO SISTEMA VI&Aacute;RIO NO MUNIC&Iacute;PIO DE L&Aacute;BREA/AM'),
(3931, 3604, 204, 134805.65, 2696.11, 0.00, 'PAGAMENTO DA 2&ordf; MEDI&Ccedil;&Atilde;O REFERENTE &Agrave; PAVIMENTA&Ccedil;&Atilde;O ASF&Aacute;LTICA DO SISTEMA VI&Aacute;RIO NO MUNIC&Iacute;PIO DE L&Aacute;BREA/AM, CONTRATO DE REPASSE OGU MDR 894423/2019 - OPERA&Ccedil;&Atilde;O 1068902-09, ART DE EXECU&Ccedil;&Atilde;O AM 20200223074.'),
(3932, 3605, 232, 2896184.05, 57923.69, 0.00, 'PAGAMENTO DA 6&ordf; MEDI&Ccedil;&Atilde;O REFERENTE &Agrave; RECAPEAMENTO ASF&Aacute;LTICA NO MUNIC&Iacute;PIO DE L&Aacute;BREA/AM, CONTRATO DE REPASSE OGU MDR 889045/2019 - OPERA&Ccedil;&Atilde;O 1066663-06, ART DE EXECU&Ccedil;&Atilde;O AM 20200220346.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas_tomadas`
--

CREATE TABLE IF NOT EXISTS `notas_tomadas` (
  `codigo` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `codtomador` int(11) DEFAULT NULL,
  `codprestador` int(11) DEFAULT NULL,
  `codverificacao` varchar(10) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `issretido` decimal(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'N' COMMENT 'N = para normal e C = para cancelado',
  `motivo_cancelamento` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas_tomadas_servicos`
--

CREATE TABLE IF NOT EXISTS `notas_tomadas_servicos` (
  `codigo` int(11) NOT NULL,
  `codnota_tomada` int(11) DEFAULT NULL,
  `codservico` bigint(20) DEFAULT NULL,
  `basecalculo` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `issretido` decimal(10,2) DEFAULT NULL,
  `discriminacao` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT '',
  `texto` varchar(500) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `sistema` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `obras`
--

CREATE TABLE IF NOT EXISTS `obras` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `obra` varchar(100) DEFAULT NULL,
  `alvara` varchar(20) DEFAULT NULL,
  `iptu` varchar(20) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `proprietario` varchar(100) DEFAULT NULL,
  `proprietario_cnpjcpf` char(18) DEFAULT NULL,
  `dataini` date DEFAULT NULL,
  `datafim` date DEFAULT NULL,
  `listamateriais` text,
  `valormateriais` decimal(10,2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A' COMMENT 'A para aberto e C para concluido'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `operadoras_creditos`
--

CREATE TABLE IF NOT EXISTS `operadoras_creditos` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `codbanco` int(11) DEFAULT NULL,
  `agencia` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `orgaospublicos`
--

CREATE TABLE IF NOT EXISTS `orgaospublicos` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL COMMENT 'codigo do orgao publico',
  `admpublica` char(1) DEFAULT NULL COMMENT 'D direta ou I indireta',
  `nivel` char(1) DEFAULT NULL COMMENT 'M municipal, E estadual, F federal'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais`
--

CREATE TABLE IF NOT EXISTS `processosfiscais` (
  `codigo` int(11) NOT NULL,
  `codemissor` int(11) DEFAULT NULL,
  `nroprocesso` int(11) DEFAULT NULL,
  `anoprocesso` char(4) DEFAULT NULL,
  `abertura` char(1) DEFAULT NULL COMMENT 'I para individual e G para geral',
  `data_abertura` date DEFAULT NULL,
  `data_inicial` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `observacoes` text,
  `intimacao` char(1) DEFAULT 'S' COMMENT 'N para não e S para Sim',
  `situacao` char(1) DEFAULT 'A' COMMENT 'A para aberto e C para concluido',
  `cancelado` char(1) DEFAULT 'N' COMMENT 'S para sim N para não'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_apreensoes`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_apreensoes` (
  `codigo` int(11) NOT NULL,
  `nroprocesso` int(11) DEFAULT NULL,
  `anoprocesso` char(4) DEFAULT NULL,
  `nroapreensao` int(11) DEFAULT NULL,
  `anoapreensao` char(4) DEFAULT NULL,
  `dataemissao` date DEFAULT NULL,
  `observacoes` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_apreensoes_docs`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_apreensoes_docs` (
  `codigo` int(11) NOT NULL,
  `codapreensao` varchar(11) DEFAULT NULL,
  `coddoc` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_autuacoes`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_autuacoes` (
  `codigo` int(11) NOT NULL,
  `nroautuacao` int(11) DEFAULT NULL,
  `anoautuacao` varchar(4) DEFAULT NULL,
  `nroprocesso` varchar(10) DEFAULT NULL,
  `anoprocesso` varchar(4) DEFAULT NULL,
  `codinfracao` int(11) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `tiposervico` char(1) DEFAULT 'P' COMMENT 'P para prestado e T para tomado',
  `historico` text,
  `obrigacao` char(1) DEFAULT 'P' COMMENT 'P para principal e A para acessória',
  `reincidencia` char(1) DEFAULT NULL COMMENT 'S ="sim, tem reicidencia" N ="nao tem reincidencia"',
  `quantidade` int(8) DEFAULT NULL COMMENT 'quantidade de reincidencia',
  `multa` decimal(10,2) DEFAULT NULL COMMENT 'porcentagem de multa',
  `valor` decimal(10,2) DEFAULT '0.00',
  `nroparcelas` int(11) NOT NULL DEFAULT '1' COMMENT 'Quantidade de parcelas',
  `situacao` char(1) DEFAULT 'E' COMMENT 'E para emitido e N para não emitido',
  `cancelado` char(1) DEFAULT 'A' COMMENT 'A para aberto C para cancelado'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Quantidade de parcelas';

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_autuacoes_docs`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_autuacoes_docs` (
  `codigo` int(11) NOT NULL,
  `codautuacao` varchar(10) DEFAULT NULL,
  `coddoc` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_ciente_vencimento`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_ciente_vencimento` (
  `codigo` int(11) NOT NULL,
  `codautuacao` int(11) DEFAULT NULL,
  `dataciente` date DEFAULT NULL,
  `datavencimento` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_competencias`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_competencias` (
  `codigo` int(11) NOT NULL,
  `codautuacao` int(11) DEFAULT NULL,
  `competencia` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='competencias sao as contas vencidas e nao pagas';

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_dividaativa`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_dividaativa` (
  `codigo` int(11) NOT NULL,
  `codautuacao` varchar(11) DEFAULT NULL,
  `nrodivida` int(11) DEFAULT NULL,
  `anodivida` char(4) DEFAULT NULL,
  `datainscricao` date DEFAULT NULL,
  `datalimite` date DEFAULT NULL,
  `observacoes` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_docs`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_docs` (
  `codigo` int(10) NOT NULL,
  `nrodoc` varchar(50) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_fiscais`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_fiscais` (
  `codigo` int(11) NOT NULL,
  `codprocesso` int(11) DEFAULT NULL,
  `codfiscal` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_fundamentacaolegal`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_fundamentacaolegal` (
  `codigo` int(11) NOT NULL,
  `incidencia` text,
  `dispositivoinfringido` text,
  `atualizacaomonetaria` text,
  `juros` text,
  `multa` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_guias`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_guias` (
  `codigo` int(11) NOT NULL,
  `codautuacao` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `datacientificacao` date DEFAULT NULL,
  `valorpago` decimal(10,2) DEFAULT NULL,
  `situacao` char(1) DEFAULT NULL COMMENT 'A para aberta e P para paga'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_homologacao`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_homologacao` (
  `codigo` int(11) NOT NULL,
  `codservico` varchar(11) DEFAULT NULL,
  `nrodoc` varchar(11) DEFAULT NULL,
  `nroprocesso` int(11) DEFAULT NULL,
  `anoprocesso` char(4) DEFAULT NULL,
  `situacao_tributo` char(1) DEFAULT NULL COMMENT 'P para pago e N para nao pago',
  `valortotal` decimal(10,2) DEFAULT NULL,
  `iss` decimal(10,2) DEFAULT NULL,
  `issretido` decimal(10,2) DEFAULT NULL,
  `deducao` decimal(10,2) DEFAULT NULL,
  `lps` varchar(100) DEFAULT NULL COMMENT 'Local da Prestacao de Servico',
  `competencia` date DEFAULT NULL,
  `cpfcnpjtomador` varchar(25) DEFAULT NULL,
  `cpfcnpjprestador` varchar(25) DEFAULT NULL COMMENT 'informacao necessaria para os servicos tomados',
  `tipo` char(1) DEFAULT NULL COMMENT 'P para servicos prestados e T para servicos tomados',
  `homologado` char(1) DEFAULT 'N' COMMENT 'S para sim e N para nao'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_infracoes`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_infracoes` (
  `codigo` int(11) NOT NULL,
  `nroinfracao` varchar(8) DEFAULT NULL,
  `anoinfracao` int(4) DEFAULT NULL,
  `tituloinfracao` text,
  `descricao` text,
  `fundamentacaolegal` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_infracoes_fundamentacaolegal`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_infracoes_fundamentacaolegal` (
  `codigo` int(11) NOT NULL,
  `codinfracoes` int(11) DEFAULT NULL,
  `codfundamentacaolegal` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_intimacoes`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_intimacoes` (
  `codigo` int(11) NOT NULL,
  `nroprocesso` int(11) DEFAULT NULL,
  `anoprocesso` varchar(4) DEFAULT NULL,
  `nrointimacao` int(11) DEFAULT NULL,
  `anointimacao` varchar(4) DEFAULT NULL,
  `dataemissao` date DEFAULT NULL,
  `prazo` int(3) DEFAULT NULL,
  `situacao` char(1) DEFAULT 'A' COMMENT 'A para aberto e C para concluido',
  `observacoes` text,
  `codlegislacao` int(11) DEFAULT NULL,
  `cancelado` char(1) DEFAULT 'N' COMMENT 'S para cancelado N para nao cancelado'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_intimacoes_docs`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_intimacoes_docs` (
  `codigo` int(11) NOT NULL,
  `codintimacao` int(11) DEFAULT NULL,
  `coddoc` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_prorrogacao`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_prorrogacao` (
  `codigo` int(11) NOT NULL,
  `nroprocesso` int(11) DEFAULT NULL,
  `anoprocesso` char(4) DEFAULT NULL,
  `nroprorrogacao` int(11) DEFAULT NULL,
  `anoprorrogacao` char(4) DEFAULT NULL,
  `dataemissao` date DEFAULT NULL,
  `diasprorrogacao` char(3) DEFAULT NULL,
  `dataprorrogada` date DEFAULT NULL,
  `observacoes` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_ted`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_ted` (
  `codigo` int(11) NOT NULL,
  `nroted` int(11) DEFAULT NULL,
  `anoted` char(4) DEFAULT NULL,
  `nroprocesso` int(11) DEFAULT NULL,
  `anoprocesso` int(11) DEFAULT NULL,
  `dataemissao` date DEFAULT NULL,
  `observacoes` text,
  `situacao` char(1) DEFAULT 'A' COMMENT 'A para aberto e C para concluido'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabela de registros do Termo de Entrega de Documentos';

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_ted_docs`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_ted_docs` (
  `codigo` int(11) NOT NULL,
  `codted` varchar(11) DEFAULT NULL,
  `coddoc` varchar(11) DEFAULT NULL,
  `estado` char(1) DEFAULT 'P' COMMENT 'E para enviado e P para pendente e T para temporario'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_tif`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_tif` (
  `codigo` int(10) NOT NULL,
  `codlegislacao` int(11) DEFAULT NULL,
  `nrotif` int(11) DEFAULT NULL,
  `anotif` varchar(4) DEFAULT NULL,
  `nroprocesso` int(11) DEFAULT NULL,
  `anoprocesso` varchar(4) DEFAULT NULL,
  `codemissor` int(10) DEFAULT NULL,
  `datainicial` date DEFAULT NULL,
  `datafinal` date DEFAULT NULL,
  `dias` int(5) DEFAULT NULL,
  `observacoes` text,
  `intimacao` char(1) DEFAULT 'S'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Tabela de registros do Termo de Inicio de Fiscalizacao';

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosfiscais_tif_docs`
--

CREATE TABLE IF NOT EXISTS `processosfiscais_tif_docs` (
  `codigo` int(10) NOT NULL,
  `codtif` int(10) DEFAULT NULL,
  `coddoc` int(10) DEFAULT NULL,
  `estado` char(1) DEFAULT 'E' COMMENT 'E para enviado e P para pendente'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reclamacoes`
--

CREATE TABLE IF NOT EXISTS `reclamacoes` (
  `codigo` int(10) NOT NULL,
  `assunto` varchar(100) DEFAULT NULL,
  `descricao` text,
  `especificacao` varchar(200) DEFAULT '',
  `tomador_cnpj` varchar(20) DEFAULT NULL,
  `tomador_email` varchar(200) DEFAULT NULL,
  `rps_numero` varchar(100) DEFAULT NULL,
  `rps_data` date DEFAULT NULL,
  `rps_valor` float(10,2) DEFAULT NULL,
  `emissor_cnpjcpf` varchar(200) DEFAULT NULL,
  `datareclamacao` date DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `responsavel` varchar(100) DEFAULT NULL,
  `dataatendimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rps_controle`
--

CREATE TABLE IF NOT EXISTS `rps_controle` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `ultimorps` int(11) DEFAULT '0',
  `limite` int(11) DEFAULT '0',
  `ultimo_limite` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rps_solicitacoes`
--

CREATE TABLE IF NOT EXISTS `rps_solicitacoes` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `estado` char(1) DEFAULT NULL COMMENT 'A = aguardando, L = liberado, e R = recusado',
  `comunicado` char(1) DEFAULT 'N' COMMENT 'N = para não e S = para sim'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `rps_solicitacoes`
--

INSERT INTO `rps_solicitacoes` (`codigo`, `codcadastro`, `data`, `estado`, `comunicado`) VALUES
(1, 1, '2018-03-12', 'R', 'N'),
(2, 3, '2018-07-02', 'A', 'N'),
(3, 21, '2018-08-07', 'A', 'N'),
(4, 24, '2018-08-23', 'A', 'N'),
(5, 25, '2018-10-03', 'A', 'N'),
(6, 28, '2018-11-06', 'A', 'N'),
(7, 311, '2020-08-03', 'A', 'N'),
(8, 447, '2020-10-01', 'A', 'N'),
(9, 458, '2020-10-15', 'A', 'N');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE IF NOT EXISTS `servicos` (
  `codigo` bigint(11) NOT NULL COMMENT 'Codigo do banco de dados para servicos',
  `codcategoria` int(11) DEFAULT NULL,
  `codservico` varchar(200) DEFAULT NULL COMMENT 'Codigo do servico pela prefeitura municipal',
  `descricao` text COMMENT 'Descricao do servico',
  `tipopessoa` varchar(10) DEFAULT NULL COMMENT 'Tipo de pessoa PJ Pessoa Juridica PF Pessoa Fisica',
  `aliquota` float(10,2) DEFAULT '0.00' COMMENT 'Porcentagem de aliquota para servicos',
  `aliquotair` float(10,2) DEFAULT '0.00' COMMENT 'Porcentagem de aliquota para servicos com iss retido',
  `aliquotainss` float(10,2) DEFAULT '0.00' COMMENT 'Porcentagem de aliquota de INSS',
  `aliquotairrf` float(10,2) DEFAULT '0.00' COMMENT 'Porcentagem de aliq. Imposto de Renda Retido na Fonte',
  `basecalculo` float(10,2) DEFAULT '0.00' COMMENT 'Base de calculo para ISS 0 igual ao preco servico',
  `incidencia` varchar(50) DEFAULT 'mensal' COMMENT 'incidencia do periodo do iss padrao eh mensal',
  `valor_rpa` float(10,2) DEFAULT '0.00',
  `datavenc` int(2) DEFAULT NULL COMMENT 'Data de vencimento do iss por dia',
  `docfiscal` varchar(50) DEFAULT NULL COMMENT 'Documento fiscal exigido',
  `estado` char(3) DEFAULT NULL COMMENT 'Estado do servico, valores A ou I'
) ENGINE=InnoDB AUTO_INCREMENT=375 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `servicos`
--

INSERT INTO `servicos` (`codigo`, `codcategoria`, `codservico`, `descricao`, `tipopessoa`, `aliquota`, `aliquotair`, `aliquotainss`, `aliquotairrf`, `basecalculo`, `incidencia`, `valor_rpa`, `datavenc`, `docfiscal`, `estado`) VALUES
(1, 1, '1.01', 'Análise e desenvolvimento de sistema.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(2, 1, '1.02', 'Programação.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(3, 1, '1.03', 'Processamento, armazenamento ou hospedagem de dados., textos, imagens, vídeos, página eletrônicas, aplicativos e sistema de informação, entre outros formatos, e congêneres.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(4, 1, '1.04', 'Elaboração de programas de computadores, inclusive de jogos eletrônicos.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(5, 1, '1.05', 'Licenciamento ou cessão de direito de uso de programas de computação.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(6, 1, '1.06', 'Assessoria e consultoria em informática.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(7, 1, '1.07', 'Suporte técnico em informática, inclusive instalação, configuração e manutenção de programas de computação e bancos de dados.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(8, 1, '1.08', 'Planejamento, confecção, manutenção e atualização de páginas eletrônicas.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(9, 2, '2.01', 'Serviços de pesquisas e desenvolvimento de qualquer natureza.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(10, 3, '3.01', 'Cessão de direito de uso de marcas e de sinais de propaganda.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(11, 3, '3.02', 'Exploração de salões de festas, centro de convenções, escritórios virtuais, stands, quadras esportivas, estádios, ginásios, auditórios, casas de espetáculos, parques de diversões, canchas e congêneres, para realização de eventos ou negócios de qualquer natureza.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(12, 3, '3.03', 'Locação, sublocação, arrendamento, direito de passagem ou permissão de uso, compartilhado ou não, de ferrovia, rodovia, postes, cabos, dutos e condutos de qualquer natureza.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(13, 3, '3.04', 'Cessão de andaimes, palcos, coberturas e outras estruturas de uso temporário.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(14, 4, '4.01', 'Medicina e biomedicina.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(15, 4, '4.02', 'Análises clínicas, patologia, eletricidade médica, radioterapia, quimioterapia, ultra-sonografia, ressonância magnética, radiologia, tomografia e congêneres.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(16, 4, '4.03', 'Hospitais, clínicas, laboratórios, sanatórios, manicômios, casas de saúde, prontos-socorros, ambulatórios e congêneres.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(17, 4, '4.04', 'Instrumentação cirúrgica.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(18, 4, '4.05', 'Acupuntura.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(19, 4, '4.06', 'Enfermagem, inclusive serviços auxiliares.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(20, 4, '4.07', 'Serviços farmacêuticos.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(21, 4, '4.08', 'Terapia ocupacional, fisioterapia e fonoaudiologia.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(22, 4, '4.09', 'Terapias de qualquer espécie destinadas ao tratamento físico, orgânico e mental.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(23, 4, '4.10', 'Nutrição.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(24, 4, '4.11', 'Obstetrícia.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(25, 4, '4.12', 'Odontologia.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(26, 4, '4.13', 'Ortóptica.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(27, 4, '4.14', 'Próteses sob encomenda.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(28, 4, '4.15', 'Psicanálise', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(29, 4, '4.16', 'Psicologia.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(30, 4, '4.17', 'Casas de repouso e de recuperação, creches, asilos e congêneres.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(31, 4, '4.18', 'Inseminação artificial, fertilização in vitro e congêneres (outros).', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(32, 4, '4.19', 'Bancos de sangue, leite, pele, olhos, óvulos, sêmen e congêneres.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(33, 4, '4.20', 'Coleta de sangue, leite, tecidos, sêmen, órgãos e materiais biológicos de qualquer espécie', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(34, 4, '4.21', 'Unidade de atendimento assistência ou tratamento móvel e congêneres.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(35, 4, '4.22', 'Planos de medicina de grupo ou individual e convênios para prestação de assistência médica, hospitalar, odontológica e congêneres.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(36, 4, '4.23', 'Outros planos de saúde que se cumpram através de serviços de terceiros contratados, credenciados, cooperados ou apenas pagos pelo operador do plano mediante indicação do beneficiário.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(37, 5, '5.01', 'Medicina veterinária e zootecnia.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(38, 5, '5.02', 'Hospitais, clínicas, ambulatórios, prontos-socorros e congêneres, na área veterinária.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(39, 5, '5.03', 'Laboratórios de análise na área veterinária.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(40, 5, '5.04', 'Inseminação artificial, fertilização in vitro e congêneres', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(41, 5, '5.05', 'Bancos de sangue e de órgãos e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(42, 5, '5.06', 'Coleta de sangue, leite, tecidos, sêmen, órgãos e materiais biológicos de qualquer espécie (outros)', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(43, 5, '5.07', 'Unidade de atendimento, assistência ou tratamento móvel e congêneres...', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(44, 5, '5.08', 'Guarda, tratamento, amestramento, embelezamento, alojamento e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(45, 5, '5.09', 'Planos de atendimento e assistência médico-veterinária.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(46, 6, '6.01', 'Barbearia, cabeleireiros, manicuros, pedicuros e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(47, 6, '6.02', 'Esteticistas, tratamento de pele, depilação e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(48, 6, '6.03', 'Banhos, duchas, sauna, massagens e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(49, 6, '6.04', 'Ginástica, dança, esportes, natação, artes marciais e demais atividades físicas.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(50, 6, '6.05', 'Centros de emagrecimento, spa e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(51, 7, '7.01', 'Engenharia, agronomia, agrimensura, arquitetura, geologia, urbanismo, paisagismo e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(52, 7, '7.02', 'Execução, por administração, empreitada ou subempreitada, de obras de construção civil, hidráulica ou elétrica e de outras obras semelhantes, inclusive sondagem, perfuração de poços, escavação, drenagem e irrigação, terraplanagem, pavimentação, concretagem e a instalação e montagem de produtos, peças e equipamentos (exceto o fornecimento de mercadorias produzidas pelo prestador de serviços fora do local da prestação dos serviços, que fica sujeito ao ICMS).', 'PJPF', 2.50, 2.50, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(53, 7, '7.03', 'Elaboração de planos diretores, estudos de viabilidade, estudos organizacionais e outros, relacionados com obras e serviços de engenharia; elaboração de anteprojetos, projetos básicos e projetos executivos para trabalhos de engenharia.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(54, 7, '7.04', 'Demolição.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(55, 7, '7.05', 'Reparação, conservação e reforma de edifícios, estradas, pontes, portos e congêneres (exceto o fornecimento de mercadorias produzidas pelo prestador dos serviços, fora do local da prestação dos serviços, que fica sujeito ao ICMS).', 'PJPF', 2.50, 2.50, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(56, 7, '7.06', 'Colocação e instalação de tapetes, carpetes, assoalhos, cortinas, revestimentos de parede, vidros, divisórias, placas de gesso e congêneres, com material fornecido pelo tomador do serviço.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(57, 7, '7.07', 'Recuperação, raspagem, polimento e lustração de pisos e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(58, 7, '7.08', 'Calafetação.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(59, 7, '7.09', 'Varrição, coleta, remoção, incineração, tratamento, reciclagem, separação e destinação final de lixo, rejeitos e outros resíduos quaisquer.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(60, 7, '7.10', 'Limpeza, manutenção e conservação de vias e logradouros públicos, imóveis, chaminés, piscinas, parques, jardins e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(61, 7, '7.11', 'Decoração e jardinagem, inclusive corte e poda de árvores.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(62, 7, '7.12', 'Controle e tratamento de efluentes de qualquer natureza e de agentes físicos, químicos e biológicos.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(63, 7, '7.13', 'Dedetização, desinfecção, desinsetização, imunização, higienização, desratização, pulverização e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(64, 7, '7.14', 'Florestamento, reflorestamento, semeadura, adubação e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(65, 7, '7.15', 'Escoramento, contenção de encostas e serviços congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(66, 7, '7.16', 'Limpeza e dragagem de rios, portos, canais, baías, lagos, lagoas, represas, açudes e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(67, 7, '7.17', 'Acompanhamento e fiscalização da execução de obras de engenharia, arquitetura e urbanismo.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(68, 7, '7.18', 'Aerofotogrametria (inclusive interpretação), cartografia, mapeamento, levantamentos topográficos, batimétricos, geográficos, geodésicos, geológicos, geofísicos e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(69, 7, '7.19', 'Pesquisa, perfuração, cimentação, mergulho, perfilagem, concretação, testemunhagem, pescaria, estimulação e outros serviços relacionados com a exploração e explotação de petróleo, gás natural e de outros recursos minerais.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(70, 7, '7.20', 'Nucleação e bombardeamento de nuvens e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(71, 8, '8.01', 'Ensino regular pré-escolar, fundamental, médio e superior.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(72, 8, '8.02', 'Instrução, treinamento, orientação pedagógica e educacional, avaliação de conhecimentos de qualquer natureza.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(73, 9, '9.01', 'Hospedagem de qualquer natureza em hotéis, apart-service condominiais, flat, apart-hotéis, hotéis residência, residence-service, suite service, hotelaria marítima, motéis, pensões e congêneres; ocupação por temporada com fornecimento de serviço (o valor da alimentação e gorjeta, quando incluído no preço da diária, fica sujeito ao Imposto Sobre Serviços).', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(74, 9, '9.02', 'Agenciamento, organização, promoção, intermediação e execução de programas de turismo, passeios, viagens, excursões, hospedagens e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(75, 9, '9.03', 'Guias de turismo.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(76, 10, '10.01', 'Agenciamento, corretagem ou intermediação de câmbio, de seguros, de cartões de crédito, de planos de saúde e de planos de previdência privada.', 'PJPF', 3.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(77, 10, '10.02', 'Agenciamento, corretagem ou intermediação de títulos em geral, valores mobiliários e contratos quaisquer.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(78, 10, '10.03', 'Agenciamento, corretagem ou intermediação de direitos de propriedade industrial, artística ou literária.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(79, 10, '10.04', 'Agenciamento, corretagem ou intermediação de contratos de arrendamento mercantil (leasing), de franquia (franchising) e de faturização (factoring).', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(80, 10, '10.05', 'Agenciamento, corretagem ou intermediação de bens móveis ou imóveis, não abrangidos em outros itens ou subitens, inclusive aqueles realizados no âmbito de Bolsas de Mercadorias e Futuros, por quaisquer meios.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(81, 10, '10.06', 'Agenciamento marítimo.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(82, 10, '10.07', 'Agenciamento de notícias.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(83, 10, '10.08', 'Agenciamento de publicidade e propaganda, inclusive o agenciamento de veiculação por quaisquer meios.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(84, 10, '10.09', 'Representação de qualquer natureza, inclusive comercial.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(85, 10, '10.10', 'Distribuição de bens de terceiros.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(86, 11, '11.01', 'Guarda e estacionamento de veículos terrestres automotores, de aeronaves e de embarcações.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(87, 11, '11.02', 'Vigilância, segurança ou monitoramento de bens e pessoas.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(88, 11, '11.03', 'Escolta, inclusive de veículos e cargas.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(89, 11, '11.04', 'Armazenamento, depósito, carga, descarga, arrumação e guarda de bens de qualquer espécie.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(90, 12, '12.01', 'Espetáculos teatrais.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(91, 12, '12.02', 'Exibições cinematográficas.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(92, 12, '12.03', 'Espetáculos circenses.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(93, 12, '12.04', 'Programas de auditório.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(94, 12, '12.05', 'Parques de diversões, centros de lazer e congêneres.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(95, 12, '12.06', 'Boates, taxi-dancing e congêneres.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(96, 12, '12.07', 'Shows, ballet, danças, desfiles, bailes, óperas, concertos, recitais, festivais e congêneres.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(97, 12, '12.08', 'Feiras, exposições, congressos e congêneres.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(98, 12, '12.09', 'Bilhares, boliches e diversões eletrônicas ou não.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(99, 12, '12.10', 'Corridas e competições de animais.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(100, 12, '12.11', 'Competições esportivas ou de destreza física ou intelectual, com ou sem a participação do espectador.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(101, 12, '12.12', 'Execução de música.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(102, 12, '12.13', 'Produção, mediante ou sem encomenda prévia, de eventos, espetáculos, entrevistas, shows, ballet, danças, desfiles, bailes, teatros, óperas, concertos, recitais, festivais e congêneres.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(103, 12, '12.14', 'Fornecimento de música para ambientes fechados ou não, mediante transmissão por qualquer processo.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(104, 12, '12.15', 'Desfiles de blocos carnavalescos ou folclóricos, trios elétricos e congêneres.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(105, 12, '12.16', 'Exibição de filmes, entrevistas, musicais, espetáculos, shows, concertos, desfiles, óperas, competições esportivas, de destreza intelectual ou congêneres.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(106, 12, '12.17', 'Recreação e animação, inclusive em festas e eventos de qualquer natureza.', 'PJPF', 4.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(107, 13, '13.01', 'Fonografia ou gravação de sons, inclusive trucagem, dublagem, mixagem e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(108, 13, '13.02', 'Fotografia e cinematografia, inclusive revelação, ampliação, cópia, reprodução, trucagem e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(109, 13, '13.03', 'Reprografia, microfilmagem e digitalização.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(110, 13, '13.04', 'Composição gráfica, fotocomposição, clicheria, zincografia, litografia, fotolitografia.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(119, 14, '14.01', 'Lubrificação, limpeza, lustração, revisão, carga e recarga, conserto, restauração, blindagem, manutenção e conservação de máquinas, veículos, aparelhos, equipamentos, motores, elevadores ou de qualquer objeto (exceto peças e partes empregadas, que ficam sujeitas ao ICMS).', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(120, 14, '14.02', 'Assistência técnica.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(121, 14, '14.03', 'Recondicionamento de motores (exceto peças e partes empregadas, que ficam sujeitas ao ICMS).', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(122, 14, '14.04', 'Recauchutagem ou regeneração de pneus.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(123, 14, '14.05', 'Restauração, recondicionamento, acondicionamento, pintura, beneficiamento, lavagem, secagem, tingimento, galvanoplastia, anodização, corte, recorte, polimento, plastificação e congêneres, de objetos quaisquer.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(124, 14, '14.06', 'Instalação e montagem de aparelhos, máquinas e equipamentos, inclusive montagem industrial, prestados ao usuário final, exclusivamente com material por ele fornecido.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(125, 14, '14.07', 'Colocação de molduras e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(126, 14, '14.08', 'Encadernação, gravação e douração de livros, revistas e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(127, 14, '14.09', 'Alfaiataria e costura, quando o material for fornecido pelo usuário final, exceto aviamento.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(128, 14, '14.10', 'Tinturaria e lavanderia.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(129, 14, '14.11', 'Tapeçaria e reforma de estofamentos em geral.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(130, 14, '14.12', 'Funilaria e lanternagem.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(131, 14, '14.13', 'Carpintaria e serralheria.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(132, 15, '15.01', 'Administração de fundos quaisquer, de consórcio, de cartão de crédito ou débito e congêneres, de carteira de clientes, de cheques pré-datados e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(133, 15, '15.02', 'Abertura de contas em geral, inclusive conta-corrente, conta de investimentos e aplicação e caderneta de poupança, no País e no exterior, bem como a manutenção das referidas contas ativas e inativas.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(134, 15, '15.03', 'Locação e manutenção de cofres particulares, de terminais eletrônicos, de terminais de atendimento e de bens e equipamentos em geral.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(135, 15, '15.04', 'Fornecimento ou emissão de atestados em geral, inclusive atestado de idoneidade, atestado de capacidade financeira e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(136, 15, '15.05', 'Cadastro, elaboração de ficha cadastral, renovação cadastral e congêneres, inclusão ou exclusão no Cadastro de Emitentes de Cheques sem Fundos – CCF ou em quaisquer outros bancos cadastrais.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(137, 15, '15.06', 'Emissão, reemissão e fornecimento de avisos, comprovantes e documentos em geral; abono de firmas; coleta e entrega de documentos, bens e valores; comunicação com outra agência ou com a administração central; licenciamento eletrônico de veículos; transferência de veículos; agenciamento fiduciário ou depositário; devolução de bens em custódia.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(138, 15, '15.07', 'Acesso, movimentação, atendimento e consulta a contas em geral, por qualquer meio ou processo, inclusive por telefone, fac-símile, internet e telex, acesso a terminais de atendimento, inclusive vinte e quatro horas; acesso a outro banco e a rede compartilhada; fornecimento de saldo, extrato e demais informações relativas a contas em geral, por qualquer meio ou processo.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(139, 15, '15.08', 'Emissão, reemissão, alteração, cessão, substituição, cancelamento e registro de contrato de crédito; estudo, análise e avaliação de operações de crédito; emissão, concessão, alteração ou contratação de aval, fiança, anuência e congêneres; serviços relativos a abertura de crédito, para quaisquer fins.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(140, 15, '15.09', 'Arrendamento mercantil (leasing) de quaisquer bens, inclusive cessão de direitos e obrigações, substituição de garantia, alteração, cancelamento e registro de contrato, e demais serviços relacionados ao arrendamento mercantil (leasing).', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(141, 15, '15.10', 'Serviços relacionados a cobranças, recebimentos ou pagamentos em geral, de títulos quaisquer, de contas ou carnês, de câmbio, de tributos e por conta de terceiros, inclusive os efetuados por meio eletrônico, automático ou por máquinas de atendimento; fornecimento de posição de cobrança, recebimento ou pagamento; emissão de carnês, fichas de compensação, impressos e documentos em geral.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(142, 15, '15.11', 'Devolução de títulos, protesto de títulos, sustação de protesto, manutenção de títulos, reapresentação de títulos, e demais serviços a eles relacionados.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(143, 15, '15.12', 'Custódia em geral, inclusive de títulos e valores mobiliários.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(144, 15, '15.13', 'Serviços relacionados a operações de câmbio em geral, edição, alteração, prorrogação, cancelamento e baixa de contrato de câmbio; emissão de registro de exportação ou de crédito; cobrança ou depósito no exterior; emissão, fornecimento e cancelamento de cheques de viagem; fornecimento, transferência, cancelamento e demais serviços relativos a carta de crédito de importação, exportação e garantias recebidas; envio e recebimento de mensagens em geral relacionadas a operações de câmbio.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(145, 15, '15.14', 'Fornecimento, emissão, reemissão, renovação e manutenção de cartão magnético, cartão de crédito, cartão de débito, cartão salário e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(146, 15, '15.15', 'Compensação de cheques e títulos quaisquer; serviços relacionados a depósito, inclusive depósito identificado, a saque de contas quaisquer, por qualquer meio ou processo, inclusive em terminais eletrônicos e de atendimento.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(147, 15, '15.16', 'Emissão, reemissão, liquidação, alteração, cancelamento e baixa de ordens de pagamento, ordens de crédito e similares, por qualquer meio ou processo; serviços relacionados à transferência de valores, dados, fundos, pagamentos e similares, inclusive entre contas em geral.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(148, 15, '15.17', 'Emissão, fornecimento, devolução, sustação, cancelamento e oposição de cheques quaisquer, avulso ou por talão.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(149, 15, '15.18', 'Serviços relacionados a crédito imobiliário, avaliação e vistoria de imóvel ou obra, análise técnica e jurídica, emissão, reemissão, alteração, transferência e renegociação de contrato, emissão e reemissão do termo de quitação e demais serviços relacionados a crédito imobiliário.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(150, 16, '16.01', 'Serviços de transporte de coletivo municipal rodoviário, metroviário, ferroviário e aquaviário de passageiros.', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(151, 17, '17.01', 'Assessoria ou consultoria de qualquer natureza, não contida em outros itens desta lista; análise, exame, pesquisa, coleta, compilação e fornecimento de dados e informações de qualquer natureza, inclusive cadastro e similares.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(152, 17, '17.02', 'Datilografia, digitação, estenografia, expediente, secretaria em geral, resposta audível, redação, edição, interpretação, revisão, tradução, apoio e infra-estrutura administrativa e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(153, 17, '17.03', 'Planejamento, coordenação, programação ou organização técnica, financeira ou administrativa.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(154, 17, '17.04', 'Recrutamento, agenciamento, seleção e colocação de mão-de-obra.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(155, 17, '17.05', 'Fornecimento de mão-de-obra, mesmo em caráter temporário, inclusive de empregados ou trabalhadores, avulsos ou temporários contratados pelo prestador de serviço.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(156, 17, '17.06', 'Propaganda e publicidade, inclusive promoção de vendas, planejamento de campanhas ou sistemas de publicidade, elaboração de desenhos, textos e demais materiais publicitários.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(157, 17, '17.07', 'Franquia (franchising).', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(158, 17, '17.08', 'Perícias, laudos, exames técnicos e análises técnicas.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(159, 17, '17.09', 'Planejamento, organização e administração de feiras, exposições, congressos e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(160, 17, '17.10', 'Organização de festas e recepções; bufê (exceto o fornecimento de alimentação e bebidas, que fica sujeito ao ICMS).', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(161, 17, '17.11', 'Administração em geral, inclusive de bens e negócios de terceiros.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(162, 17, '17.12', 'Leilão e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(163, 17, '17.13', 'Advocacia.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(164, 17, '17.14', 'Arbitragem de qualquer espécie, inclusive jurídica.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(165, 17, '17.15', 'Auditoria.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(166, 17, '17.16', 'Análise de Organização e Métodos.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(167, 17, '17.17', 'Atuária e cálculos técnicos de qualquer natureza.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(168, 17, '17.18', 'Contabilidade, inclusive serviços técnicos e auxiliares.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(169, 17, '17.19', 'Consultoria e assessoria econômica ou financeira.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(170, 17, '17.20', 'Estatística.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(171, 17, '17.21', 'Cobrança em geral.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(172, 17, '17.22', 'Assessoria, análise, avaliação, atendimento, consulta, cadastro, seleção, gerenciamento de informações, administração de contas a receber ou a pagar e em geral, relacionados a operações de faturização (factoring).', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(173, 17, '17.23', 'Apresentação de palestras, conferências, seminários e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(174, 18, '18.01', 'Serviços de regulação de sinistros vinculados a contratos de seguros; inspeção e avaliação de riscos para cobertura de contratos de seguros; prevenção e gerência de riscos seguráveis e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(175, 19, '19.01', 'Serviços de distribuição e venda de bilhetes e demais produtos de loteria, bingos, cartões, pules ou cupons de apostas, sorteios, prêmios, inclusive os decorrentes de títulos de capitalização e congêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(176, 20, '20.01', 'Serviços portuários, ferroportuários, utilizaçao de porto, movimentaçao de passageiros, reboque de embarcaçoes, rebocador escoteiro, atracaçao, desatracaçao, serviços de praticagem, capatazia, armazenagem de qualquer natureza, serviços acessórios, movimentaçao de mercadorias, serviços de apoio marítimo, de movimentaçao ao largo, serviços de armadores, estiva, conferencia, logística e congeneres.', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(177, 20, '20.02', 'Serviços aeroportuários, utilizaçao de aeroporto, movimentaçao de passageiros, armazenagem de qualquer natureza, capatazia, movimentaçao de aeronaves, serviços de apoio aeroportuários, serviços acessórios, movimentaçao de mercadorias, logística e congeneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(178, 20, '20.03', 'Serviços de terminais rodoviários, ferroviários, metroviários, movimentaçao de passageiros, mercadorias, inclusive suas operaçoes, logística e congeneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(179, 21, '21.01', 'Serviços de registros públicos, cartorários e notariais.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(180, 22, '22.01', 'Serviços de exploraçao de rodovia mediante cobrança de preço ou pedágio dos usuários, envolvendo execuçao de serviços de conservaçao, manutençao, melhoramentos para adequaçao de capacidade e segurança de trânsito, operaçao, monitoraçao, assistencia aos usuários e outros serviços definidos em contratos, atos de concessao ou de permissao ou em normas oficiais.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(181, 23, '23.01', 'Serviços de programaçao e comunicaçao visual, desenho industrial e congeneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(182, 24, '24.01', 'Serviços de chaveiros, confecçao de carimbos, placas, sinalizaçao visual, banners, adesivos e congeneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(183, 25, '25.01', 'Funerais, inclusive fornecimento de caixao, urna ou esquifes, aluguel de capela, transporte do corpo cadavérico, fornecimento de flores, coroas e outros paramentos, desembaraço de certidao de óbito, fornecimento de véu, essa e outros adornos, embalsamento, embelezamento, conservaçao ou restauraçao de cadáveres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(184, 25, '25.02', 'Cremaçao de corpos e partes de corpos cadavéricos.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(185, 25, '25.03', 'Planos ou convenio funerários.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(186, 25, '25.04', 'Manutençao e conservaçao de jazigos e cemitérios.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(187, 26, '26.01', 'Serviços de coleta, remessa ou entrega de correspondencias, documentos, objetos, bens ou valores, inclusive pelos correios e suas agencias franqueadas, courrier e congeneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(188, 27, '27.01', 'Serviços de assistência social.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(189, 28, '28.01', 'Serviços de avaliaçao de bens e serviços de qualquer natureza.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(190, 29, '29.01', 'Serviços de biblioteconomia.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(191, 30, '30.01', 'Serviços de biologia, biotecnologia e química.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(192, 31, '31.01', 'Serviços técnicos em edificaçoes, eletrônica, eletrotécnica, mecânica, telecomunicaçoes e congeneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(193, 32, '32.01', 'Serviços de desenhos técnicos.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(194, 33, '33.01', 'Serviços de desembaraço aduaneiro, comissários, despachantes e congeneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(195, 34, '34.01', 'Serviços de investigaçoes particulares, detetives e congeneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(196, 35, '35.01', 'Serviços de reportagem, assessoria de imprensa, jornalismo e relaçoes públicas.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(197, 36, '36.01', 'Serviços de meteorologia.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(198, 37, '37.01', 'Serviços de artistas, atletas, modelos e manequins.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(199, 38, '38.01', 'Serviços de museologia.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(200, 39, '39.01', 'Serviços de ourivesaria e lapidaçao (quando o material for fornecido pelo tomador do serviço).', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(201, 40, '40.01', 'Obras de arte sob encomenda.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(202, 41, '41.01', 'Outras atividades auxiliares dos Transportes Aquaviarios', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(203, 42, '42.01', 'Construção de embarcações para esporte e lazer', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(204, 43, '43.01', 'Obras de urbanização - ruas, praças e calçadas', 'PJ', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(205, 44, '44.01', 'montagem de estruturas metálicas permanentes.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(206, 44, '44.02', 'serviços de soldagem de estruturas metálicas', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(207, 45, '45.01', 'SERVIÇOS DE USINAGEM, TORNEARIA E SOLDA', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(208, 46, '46.01', 'OBRAS DE ATIRANTAMENTOS E CORTINAS DE PROTEÇÃO DE ENCOSTAS.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(209, 46, '46.02', 'OBRAS DE CONTENÇÃO DE ENCOSTAS', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(210, 46, '46.03', 'EXECUÇÃO DE ESCORAMENTO', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(211, 46, '46.04', 'OBRAS DE AÇUDES', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(212, 46, '46.05', 'EXECUÇÃO DE OBRAS DE ESTABILIDADE: ENROCAMENTO, MURO DE CONCRETO CICLÓPICO, RIP-RAP, GABIÃO, BERNA, ESCALONAMENTO', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(213, 46, '46.06', 'CONSTRUÇÃO DE OBRAS DE INFRA-ESTRUTURA PARA EXECUÇÃO DE PLANTAS INDUSTRIAIS', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(214, 46, '46.07', 'OBRAS DE OUTROS TIPOS (CONSTRUÇÃO)', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(215, 46, '46.08', 'INSTALAÇÃO DE TANQUES PARA COMBUSTÍVEIS', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(216, 47, '47.01', 'OBRAS DE MONTAGEM INDUSTRIAL', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(217, 48, '48.01', 'OPERAÇÕES DE TERMINAIS', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(218, 49, '49.01', 'NAVEGAÇÃO DE APOIO PORTUÁRIO', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(219, 50, '50.01', 'GERAÇÃO DE ENERGIA ELÉTRICA', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(220, 51, '51.01', 'TRANSPORTE POR NAVEGAÇÃO INTERIOR DE CARGA, INTERMUNICIPAL, INTERESTADUAL E INTERNACIONAL, EXCETO TRAVESSIA.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(221, 52, '52.01', 'TRANSPORTE POR NAVEGAÇÃO INTERIOR DE CARGA, MUNICIPAL , EXCETO TRAVESSIA.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(222, 52, '52.02', 'TRANSPORTE AQUAVIÁRIO PARA PASSEIOS TURÍSTICOS.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(223, 52, '52.03', 'TRANSPORTE POR NAVEGAÇÃO INTERIOR DE PASSAGEIROS EM LINHAS REGULARES, MUNICIPAL, EXCETO TRAVESSIA', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(224, 52, '52.04', 'OUTROS TRANSPORTES AQUAVIÁRIOS NÃO ESPECIFICADOS ANTERIORMENTE.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(225, 53, '53.01', 'FABRICAÇÃO DE ALIMENTOS PARA ANIMAIS', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(226, 54, '54.01', 'ATIVIDADES DE RADIO', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(227, 55, '55.01', 'ATIVIDADES DE FISIOTERAPIA', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(228, 56, '56.01', 'ATIVIDADES DE PROFISSIONAIS DA AREA DE SAUDE NAO ESPECIFICADAS ANTERIORMENTE.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(229, 57, '57.01', 'LABORATORIOS CLINICOS', 'PJ', 5.00, 3.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(230, 58, '58.01', 'SERVIÇOS DE ARMAZENAMENTO DE CARGAS POR CONTA DE TERCEIROS.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(231, 59, '59.01', 'FABRICAÇÃO DE ESTRUTURAS METÁLICAS.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(232, 60, '60.01', 'CONSTRUÇÃO DE EDIFICIOS.', 'PJ', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(233, 60, '60.02', 'CONSTRUÇÃO DE RODOVIAS E FERROVIAS.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(234, 61, '61.01', 'SERVIÇO DE TRANSPORTE DE PASSAGEIROS - LOCAÇÃO DE AUTOMOVEL COM MOTORISTA. ', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(235, 61, '61.02', 'TRANSPORTE ESCOLAR', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(236, 62, '62.01', 'TRANSPORTE POR NAVEGAÇÃO INTERIOR DE PASSAGEIROS EM LINHAS REGULARES, MUNICIPAL, EXCETO TRAVESSIA.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(237, 62, '62.02', 'OUTROS TRANPORTES AQUAVIARIOS NÃO ESPECIFICADOS ANTERIORMENTE.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(238, 63, '63.01', 'ALUGUEL DE MÁQUINAS E EQUIPAMENTOS PARA CONSTRUÇÃO SEM OPERADOR, EXCETO ANDAIMES.', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(239, 64, '64.01', 'COLETA DE RESÍDOS NÃO-PERIGOSOS', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(240, 64, '64.02', 'COLETA DE RESÍDUOS PERIGOSOS', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(241, 65, '65.01', 'EDICAO INTEGRADA A IMPRESSAO DE CADASTROS, LISTAS E DE OUTROS PRODUTOS GRAFICOS.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(242, 66, '66.01', 'REPARAÇÃO E MANUTENÇÃO DE EQUIPAMENTOS DE COMUNICAÇÃO', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(243, 16, '16.02', 'Outros serviços de transporte de natureza municipal.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(244, 1, '1.09', 'Disponibilização, sem cessão definitiva, de conteúdos de áudios, vídeo, imagem e texto por meio da internet, respeitada a imunidade de livros, jornais e periódicos (exceto a distribuição de conteúdos pelas prestadoras de serviço de acesso condicionado, de que trata a Lei n° 12.485, de 12 de setembro de 2011, sujeita ao ICMS).', 'PJPF', 2.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(245, 1, '1.10', 'Reparação e manutenção de equipamentos eletroeletrônicos de uso pessoal e doméstico.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(246, 30, '30.02', 'Imunização e controle de pragas urbanas.', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(247, 67, '67.01', 'Serviço de manejo de animais', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(248, 68, '68.01', 'Atividades relacionadas a esgoto, exceto a gestão de redes.', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(249, 57, '57.02', 'Atividade médica ambulatorial restrita a consultas.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(250, 69, '69.01', 'Serviços de manutenção e reparação mecânica de veículos automotores.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(251, 69, '69.02', 'Serviços de lavagem. lubrificação e polimento de veículo automotores.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(252, 57, '57.03', 'Atividade médica ambulatorial com recursos para realização de procedimentos cirurgicos.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(253, 57, '57.04', 'Atividade médica ambulatorial com recursos para realização de exames complementares.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(261, 72, '72.01', ' 	RESTAURANTES E SIMILARES', 'PJPF', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(262, 73, '73.01', 'SERVIÇOS DE ALIMENTAÇÃO PARA EVENTOS E RECEPÇÕES - BUFÊ.', 'PJPF', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(263, 74, '74.01', 'ATIVIDADES DE INTERMEDIAÇÃO E AGENCIAMENTO DE SERVIÇOS E NEGÓCIOS EM GERAL, EXCETO IMOBILIÁRIOS ', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(264, 75, '75.01', 'Atividades de agenciamento marítimo ', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(265, 76, '76.01', 'RECUPERACAO DE SUCATAS DE ALUMINIO', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(266, 77, '77.01', 'LIMPEZA EM PRÉDIOS E EM DOMICÍLIOS', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(268, 79, '79.01', 'Locação de bens móveis com fornecimento de mão-de-obra', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(269, 80, '80.01', ' SERVIÇO DE ELETRIFICAÇÃO RURAL', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(270, 80, '80.02', ' CONSTRUÇÃO DE  ESTAÇÕES E REDES DE DISTRIBUIÇÃO DE ENERGIA ELÉTRICA', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(271, 80, '80.03', 'CONSTRUÇÃO DE  REDES DE TRANSMISSÃO DE ENERGIA ELÉTRICA', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(272, 71, '71.01', 'Serviços de manutenção de máquina e motores elétricos em geral ', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(273, 81, '81.01', 'IMPERMEABILIZAÇÃO EM OBRAS DE ENGENHARIA CIVIL<br />\r\n', 'PJPF', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(274, 81, '81.02', 'INSTALAÇÃO E MANUTENÇÃO ELÉTRICA<br />\r\n ', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(275, 82, '82.01', 'FABRICAÇÃO DE OUTROS ARTIGOS DE CARPINTARIA PARA CONSTRUÇÃO', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(276, 83, '83.01', 'Confecção de peças de vestuário, exceto roupas intimas e as confeccionadas sob medida', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(277, 83, '83.02', 'Confecção de roupas intimas', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(278, 83, '83.03', 'Confecção, sob medida, de peças do vestuário, exceto roupas intimas', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(279, 84, '84.01', 'SERVIÇO DE ABATE, DERRUBADA DE áRVORES E TRANSPORTE DE TORAS.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(280, 84, '84.02', 'SERVIÇOS DE AVALIAÇÃO DE MADEIRA.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(281, 84, '84.03', 'SERVIÇOS DE AVALIAÇÃO DE MASSA MADEIREIRA EM Pé.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(282, 84, '84.04', 'SERVIÇO DECORTE, DERRUBADA DE ARVORES E TRANSPORTE DE TORAS.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(283, 84, '84.05', 'SERVIÇOS DE CUIDADOS FLORESTAIS.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(284, 84, '84.06', 'SERVIÇOS DE DENDROMETRIA (MEDIÇÃO DAS DIMENSÕES DAS ARVORES; AVALIAÇÃO DA QUANTIDADE DE MADEIRA QUE AS ARVORES PODEM FORNECER).', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(285, 84, '84.07', 'SERVIÇOS DE DESCARREGAMENTO DE MADEIRAS.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(286, 84, '84.08', 'ATIVIDADE DE SERVIÇOS LIGADOS COM A SILVICULTURA E EXPLORAÇÃO VEGETAL.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(287, 86, '85.01', 'ATIVIDADE DE EQUIPAMENTO DE SOM COM OPERADOR.', 'PJPF', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(288, 86, '85.02', 'SERVIÇOS DE  	FORNECIMENTO DE SOM PARA CASAS DE ESPETÁCULOS.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(289, 86, '85.03', 'SERVIÇOS DE  	ILUMINAÇÃO CÊNICA.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(290, 87, '87.01', 'Transporte rodoviário de carga, exceto produtos perigosos e mudanças, municipal ', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(291, 88, '88.01', 'MANUTENÇÃO E REPARAÇÃO DE MÁQUINAS E EQUIPAMENTOS DA INDÚSTRIA MECÂNICA', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(292, 88, '88.02', 'Manutenção e reparação de máquinas e aparelhos de refrigeração e ventilação para uso industrial e comercial ', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(293, 89, '89.01', 'CURSO DE PILOTAGEM', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(294, 48, '48.02', 'Carga e Descarga', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(295, 90, '90.1', 'Instalações hidráulicas, sanitárias e de gás ', 'PJPF', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(296, 48, '91', 'serviços realizados na capital (Manaus). ', 'PJ', 5.00, 4.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(297, 48, '48.03', 'CARGA E DESCARGA - MANAUS', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'I'),
(298, 91, '91.1', 'a fabricação de vassouras, esfregões, rodos, espanadores e semelhantes', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 5, 'NF', 'A'),
(299, 87, '92', 'Transporte rodoviário de produtos perigosos.', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A');
INSERT INTO `servicos` (`codigo`, `codcategoria`, `codservico`, `descricao`, `tipopessoa`, `aliquota`, `aliquotair`, `aliquotainss`, `aliquotairrf`, `basecalculo`, `incidencia`, `valor_rpa`, `datavenc`, `docfiscal`, `estado`) VALUES
(300, 92, '92.01', 'Transporte rodoviário de produtos perigosos', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(301, 7, '7.21', 'testes e análises técnicas', 'PJPF', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(302, 70, '70.1', 'ServiÇos de organizaÇÕes de feiras, congressos, exposiÇÕes e festas', 'PJPF', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(303, 79, '79.02', 'Aluguel de outras máquinas e equipamentos comerciais e industriais não especificados anteriormente, sem operador', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(304, 93, '93.1', 'Construcao de embarcacoes para uso comercial e para usos especiais, exceto de grande porte', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(305, 93, '93.2', 'Manutencao e reparacao de embarcacoes e estruturas flutuantes', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(306, 57, '57.05', 'LABORATORIOS CLINICOS', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(308, 14, '14.14', 'GUINCHO INTRAMUNICIPAL, GUINDASTE E IÇAMENTO.', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(310, 41, '41.02', 'OUTRAS ATIVIDADES AUXILIARES DOS TRANSPORTES AQUAVIÁRIOS.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(311, 96, '96.01', 'MARKETING DIRETO', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(312, 97, '97.01', ' FORNECIMENTO DE ALIMENTOS PREPARADOS PREPONDERANTEMENTE PARA CONSUMO DOMICILIAR', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(313, 7, '7.22', 'CONSTRUÇÃO de edificios', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(314, 7, '7.23', 'instalação e manutenção elétrica', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(315, 7, '7.24', 'serviços de pintura de EDIFÍCIOS em geral', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(316, 7, '7.25', 'instalação HIDRÁULICAS, sanitárias e de gás', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(317, 7, '7.26', 'TESTE E ANÁLISE TÉCNICAS', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(318, 24, '24.02', 'Serviços de chaveiros, confeção de carimbos, placas, sinalização visual, banners, adesivos e congeneres.', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(319, 23, '23.02', 'SERVIÇOS DE PROGRAMAÇÃO E COMUNICAÇÃO VISUAL', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(320, 1, '1.11', 'SUPORTE TÉCNICO EM INFORMÁTICA, INCLUSIVE INSTALAÇÃO.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(321, 13, '13.06', 'SERVIÇOS RELATIVOS A FOTOGRAFIA E CINEMATOGRAFIA, INCLUSIVE REVELAÇÃO.', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(322, 13, '13.05', 'Reprografia, microfilmagem e digitalização', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(323, 65, '65.02', 'Serviços de edição á integrada,impressão de calendários, IMPRESSÃO&#65533;o de cartões de felicitações, impressão de cartões postais, impressão de catálogos, impressão de gravuras, impressão de listas de produtos FARMACÊUTICOS, IMPRESSÃO de listas para malas diretas, impressão de listas telefônicas, impressão de material publicitário, impressão de panfletos e folhetos, reprodução de trabalhos de arte e congêneres.', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(324, 83, '83.04', 'confecção sob medida, de peças do vestuários, exceto roupas íntimas.', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(325, 99, '32.99-0-99', 'Fabricação de produtos diversos não especificados anteriormente', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(326, 99, '16.29-3-01', 'Fabricação de artefatos diversos de madeira, exceto moveis', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(327, 99, '23.30-3-99', 'Fabricação de outros artefatos e produtos de concreto, cimento, fibrocimento, gesso e materiais semelhantes', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(328, 100, '82.99-7-99', 'OUTRAS ATIVIDADES DE SERVIÇOS PRESTADOS PRINCIPALMENTE ÀS EMPRESAS NÃO ESPECIFICADAS ANTERIORMENTE', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(329, 100, '100.02', 'OUTRAS ATIVIDADES DE SERVIÇOS PRESTADOS PRINCIPALMENTE AS EMPRESAS NAO ESPECIFICADAS ANTERIORMENTE.', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(330, 101, '101', '46.17-6-00 - REPRESENTANTES COMERCIAIS E AGENTES DO COMÉRCIO DE PRODUTOS ALIMENTICIOS, BEBIDAS E FUMO.', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(331, 14, '14.15', 'Estamparia e texturização em fios, tecidos, artefatos têxteis e peças do vestuário ', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(332, 72, '72.02', 'MEI - Fornecimento de alimentos preparados preponderadamente para consumo domiciliar.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(333, 102, '102.001', '56.20-1-04 - Fornecimento de alimentos preparados preponderantemente para consumo domiciliar ', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(334, 17, '71.19-7-04', 'Serviços de perícia técnica relacionados à segurança do trabalho ', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(335, 103, '94.30-8-00', 'Atividades de associações de defesa de direitos sociais ', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(337, 102, '102.002', '81.30-3-00 - Atividades paisagísticas', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(338, 104, '104.01', 'Restaurantes e similares ', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(339, 104, '104.02', 'Fornecimento de alimentos preparados preponderantemente para empresas ', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(340, 102, '102.003', 'OUTRAS ATIVIDADES DE PUBLICIDADE NAO ESPECICADAS ANTERIORMENTE.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(341, 102, '102.004', 'INSTALAÇAO E MANUTENÇAO DE SISTEMAS CENTRAIS DE AR CONDICIONADDO, VENTILAÇAO E REFRIGERAÇAO.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(342, 41, '41.03', 'OUTRAS ATIVIDADE DOS TRANSPORTES AQUAVIARIOS', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(343, 101, '102', 'REPRESENTANTES COMERCIAIS', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(344, 102, '101.005', 'LAVANDERIAS', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(345, 102, '102.005', 'Lanchonetes, casa de chá, de sucos e similares.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(346, 102, '102.006', 'INST. E MANUTENÇAO DE SISTEMAS CENTRAIS DE AR CONDICIONADO, DE VENTILAÇAO E REFRIGERAÇAO.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(347, 102, '100.006', 'FABRICAÇÃO DE PRODUTOS DE PADARIA E CONFEITARIA COM PREDOMINÂNCIA DE PRODUÇÃO PRÓPRIA.', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(348, 102, '102.007', 'TRANSPORTE RODOVIARIO DE CARGA, EXCETO PRODUTOS PERIGOSOS E MUDANÇAS.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(349, 102, '102.106', 'Promoção de vendas ', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(350, 69, '69.03', 'serviço de manutençao e reparaçao mecanica de veiculos automotores.', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(351, 102, '85.82-99/99', 'ensino de arte e cultura não especificado anteriormente', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(352, 7, '7.27', 'OUTRAS OBRAS DE ACABAMENTO DA CONSTRUÇAO.', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(353, 102, '102.107', 'Serviços de pintura de edifícios em geral.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(354, 102, '102.008', 'MANUTENÇAO E REPARAÇAO DE MOTOCICLETAS E MOTONETAS.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(355, 102, '100.004', 'INSTALAÇAO E MANUTENÇAO ELETRICA.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(356, 102, '13.40-05/01', 'eSTAMPARIA E TEXTURIZAÇÃO EM FIOS, TECIDOS, ARTEFATOS TÊXTEIS E PEÇAS DE VESTUÁRIO.', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(357, 101, '', 'representantes comercias 5.00', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(358, 7, '7.30', 'OBRAS DE TERRAPLANAGEM', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(359, 7, '43.99-1-03', 'OBRAS DE ALVENARIA', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(360, 42, '42.02', 'Manutenção e reparação de embarcações  para esporte e lazer.', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(361, 44, '44.03', 'MANUTENÇÃO  e REPARAÇÃO  de tanques, RESERVATÓRIOS metálicos e caldeiras,exceto para veículos.', 'PJPF', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(364, 44, '42.92-8-01', 'montagem de estruturas metálicas', 'PJ', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(366, 79, '77.29-2-02', 'Aluguel de móveis, utensílios e aparelhos de uso doméstico e pessoal; instrumentos musicais <br />\r\n ', 'PJ', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(367, 66, '63.01.', 'ALUGUEL DE MÁQUINAS E EQUIPAMENTOS PARA CONSTRUÇÃO SEM OPERADOR, EXCETO ANDAIMES', 'PJ', 5.00, 2.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(369, 14, '14.16', 'MANUTENÇÃO E REPARAÇÃO DE MÁQUINAS E EQUIPAMENTOS PARA AGRICULTURA E PECUÁRIA.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(370, 79, '7721-7-00', 'ALUGUEL DE EQUIPAMENTOS RECREATIVOS E ESPORTIVOS', 'PJPF', 5.00, 0.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 15, 'NF', 'A'),
(371, 25, '25.05', 'Cessão de uso de espaços em cemitérios para sepultamento.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(372, 7, '81.30-3-00', 'Atividades Paisagísticas', 'PF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 10, 'NF', 'A'),
(373, 6, '6.06', 'Aplicação de tatuagens, piercings e cogêneres.', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A'),
(374, 17, '17.24', 'Inserção de textos, desenhos e outros materiais de propaganda e publicidade, em qualquer meio (exceto em livros, jornais, periódicos e nas modalidades de serviço de radiodifusão sonora e de sons e imagens de recepção livre e gratuita).', 'PJPF', 5.00, 5.00, 0.00, 0.00, 0.00, 'mensal', 0.00, 0, 'NF', 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos_categorias`
--

CREATE TABLE IF NOT EXISTS `servicos_categorias` (
  `codigo` int(11) NOT NULL,
  `nome` text,
  `tipo` varchar(10) DEFAULT NULL COMMENT 'tipos: CNAE e LC116'
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `servicos_categorias`
--

INSERT INTO `servicos_categorias` (`codigo`, `nome`, `tipo`) VALUES
(1, 'Serviços de informática e congêneres.', 'LC116'),
(2, 'Serviços de pesquisas e desenvolvimento de qualquer natureza.', 'LC116'),
(3, 'Serviços prestados mediante locação, cessão de direito de uso e congêneres.', 'LC116'),
(5, 'Serviços de medicina e assistência veterinária e congêneres.', 'LC116'),
(6, 'Serviços de cuidados pessoais, estética, atividades físicas e congêneres.', 'LC116'),
(7, 'Serviços relativos a engenharia, arquitetura, geologia, urbanismo, construção civil, obras hidráulicas, terraplanagem, asfaltamento, manutenção, limpeza, meio ambiente, saneamento e congêneres.', 'LC116'),
(8, 'Serviços de educação, ensino, orientação pedagógica e educacional, instrução, treinamento e avaliação pessoal de qualquer grau ou natureza.', 'LC116'),
(9, 'Serviços relativos a hospedagem, turismo, viagens e congêneres.', 'LC116'),
(10, 'Serviços de intermediação e congêneres.', 'LC116'),
(11, 'Serviços de guarda, estacionamento, armazenamento, vigilância e congêneres.', 'LC116'),
(12, 'Serviços de diversões, lazer, entretenimento e congêneres.', 'LC116'),
(13, 'Serviços relativos a fonografia, fotografia, cinematografia e reprografia.', 'LC116'),
(14, 'Servi&#65533;os relativos a bens de terceiros.', 'LC116'),
(15, 'Serviços relacionados ao setor bancário ou financeiro, inclusive aqueles prestados por instituições financeiras autorizadas a funcionar pela União ou por quem de direito.', 'LC116'),
(16, 'Servi&#65533;os de transporte de natureza municipal.', 'LC116'),
(17, 'Serviços de apoio técnico, administrativo, jurídico, contábil, comercial e congêneres.', 'LC116'),
(18, 'Serviços de regulação de sinistros vinculados a contratos de seguros; inspeção e avaliação de riscos para cobertura de contratos de seguros; prevenção e gerência de riscos seguráveis e congêneres.', 'LC116'),
(19, 'Serviços de distribuição e venda de bilhete e demais produtos de loteria, bingos, cartões, pules ou cupons de apostas, sorteios, prêmios, inclusive os decorrentes de títulos de capitalização e congêneres.', 'LC116'),
(20, 'Serviços portuários, aeroportuários, ferroportuários, de terminais rodoviários, ferroviários e metroviários.', 'LC116'),
(21, 'Serviços de registros públicos, cartorários e notariais.', 'LC116'),
(22, 'Serviços de exploraçao de rodovia.', 'LC116'),
(23, 'Serviços de programaçao e comunicaçao visual, desenho industrial e congeneres.', 'LC116'),
(24, 'Serviços de chaveiros, confecção de carimbos, placas, sinalização visual, banners, adesivos e congeneres.', 'LC116'),
(25, 'Serviços funerários.', 'LC116'),
(26, 'Serviços de coleta, remessa ou entrega de correspondencias, documentos, objetos, bens ou valores, inclusive pelos correios e suas agencias franqueadas, courrier e congeneres.', 'LC116'),
(27, 'Serviços de assistência social.', 'LC116'),
(28, 'Serviços de avaliaçao de bens e serviços de qualquer natureza.', 'LC116'),
(29, 'Serviços de biblioteconomia.', 'LC116'),
(30, 'Serviços de biologia, biotecnologia e química.', 'LC116'),
(31, 'Serviços técnicos em edificaçoes, eletrônica, eletrotécnica, mecânica, telecomunicaçoes e congeneres.', 'LC116'),
(32, 'Serviços de desenhos técnicos.', 'LC116'),
(33, 'Serviços de desembaraço aduaneiro, comissários, despachantes e congeneres.', 'LC116'),
(34, 'Serviços de investigaçoes particulares, detetives e congeneres.', 'LC116'),
(35, 'Serviços de reportagem, assessoria de imprensa, jornalismo e relaçoes públicas.', 'LC116'),
(36, 'Serviços de meteorologia.', 'LC116'),
(37, 'Serviços de artistas, atletas, modelos e manequins.', 'LC116'),
(38, 'Serviços de museologia.', 'LC116'),
(39, 'Serviços de ourivesaria e lapidaçao.', 'LC116'),
(40, 'Serviços relativos a obras de arte sob encomenda.', 'LC116'),
(4, 'Serviços de saúde, assistência médica e congêneres.', 'LC116'),
(41, 'Outras atividades auxiliares dos Transportes Aquaviarios', 'LC116'),
(42, 'Serviços de construção de embarcações para esporte e lazer (veleiros, lanchas, canoas, caiaques, botes rígidos e infláveis, pedalinho, etc.)', ''),
(43, 'Serviços de Asfaltamento de vias publicas (ruas, avenidas, praças, etc.); Serviços de construção, manutenção e/ou reforma de calçadas; Serviço de calçamento de ruas; Conservação e/ou recuperação de vias públicas (tapa-buraco, tapa-panela, lama asfaltica e congêneres); Serviços de frisagem de vias publicas; aplicação em vias publicas de lama asfáltica; Construção, pavimentação e/ou recuperação de logradouro (praças, ruas, avenidas); Construção e/ou recuperação de meio-fios em via publicas; Obras de Pavimentação de ruas; Construção, manutenção e/ou reforma de Praças; Construção de sarjetas, descidas d’agua, bigode e similares em vias publicas; Sinalização com pinturas em ruas e estacionamentos (construção); Execução de Tapa-buraco em vias publicas', ''),
(44, 'Serviços de montagem e/ou soldagem de estrutura metalica permanentes.', ''),
(45, 'Serviços industriais de usinagem (torno, fresa, etc.), soldas e semelhantes, realizados sob contrato', ''),
(46, 'Serviços de Obras como as de atirantamentos, de cortinas de proteção de encostas, de contenção de encostas, de açudes, de estabilidade, de execução de escoramento, Construção de obras de infra-estrutura para execução de plantas industriais; Instalação de tanques para combustível; Obras de outros tipos', ''),
(47, 'Serviços de obras de montagem de instalações industriais (tubulações, redes de facilidades), tais como: refinarias e/ou plantas de indústrias químicas', ''),
(48, 'Serviços de carga e descarga de embarcações, gestão de terminais de passageiros, gestão e operação de terminais aquaviários de carga, gestão e operação de terminais aquaviários de pesca, gestão e operação de terminais aquaviários de turismo, operação portuária, operações de terminais, operadora portuária, operadores portuários, portos, terminais marítimos, atracadouros.', ''),
(49, 'Serviços de desencalhe de embarcações, navegação de apoio portuário, reboque aquaviário, hidroviário, reboque marítimo, reboque realizado por empresas de apoio portuário, reflutação de embarcações, salvamento de embarcações e cargas, salvamento realizado por empresas de apoio portuário, socorro realizado por empresas de apoio portuário.', ''),
(50, 'Medição de consumo de energia elétrica por empresa produtora (geradora) de energia elétrica, tratamento de elementos combustíveis (cartuchos), usados (irradiados) para reatores nucleares, produção de eletricidade através da biomassa, geração, produção de eletricidade através das marés, produção de eletricidade geotérmica, energia elétrica (autoprodutor), estação de geração, produção de energia elétrica (hidráulica, térmica, nuclear, eólica, solar, etc.), produção integrada de energia elétrica (hidráulica, térmica, nuclear, eólica, solar, etc.), geração, produção de energia elétrica através da incineração de resíduos, geração, produção de energia elétrica de origem eólica (vento), geração, produção de energia elétrica de origem hidráulica, geração, produção de energia elétrica de origem nuclear, geração, produção de energia elétrica de origem solar, geração, produção de energia elétrica de origem térmica (carvão e produtos derivados), geração de energia elétrica de origem térmica (combustíveis renováveis), produção de energia elétrica de origem térmica (diesel), geração, produção de energia elétrica de origem térmica (gás), geração, produção de energia elétrica por meio de moto-geradores de combustão interna, produção de energia elétrica por meio de turbinas hidráulicas, geração, produção de energia hidrelétrica, manutenção de redes de eletricidade por empresa produtora (geradora) de energia elétrica.', ''),
(51, 'Fretamento de embarcações com tripulação para transporte aquaviário de carga por navegação interior, intermunicipal (exceto travessia), interestadual e internacional, locação, aluguel de embarcações com tripulação para transporte aquaviário de carga por navegação interior, intermunicipal (exceto travessia), interestadual e internacional, locação, aluguel de embarcações com tripulação para transporte hidroviário de carga por navegação interior, intermunicipal (exceto travessia), interestadual e internacional, transporte aquaviário de carga, interestadual e internacional, por navegação interior, transporte aquaviário de carga, intermunicipal, exceto de travessia, por rios, lagoas, canais e outras vias de navegação interior, transporte aquaviário de carga, intermunicipal, por navegação interior, exceto travessia, transporte hidroviário de carga, interestadual e internacional, por navegação interior, transporte hidroviário de carga, intermunicipal, por navegação interior, exceto travessia, transporte hidroviário de carga, municipal, exceto de travessia, por rios, lagoas, canais e outras vias de navegação interior, transporte por navegação interior de carga interestadual e internacional, transporte por navegação interior de carga intermunicipal, exceto travessia.', ''),
(52, 'Serviços de Fretamento de embarcações com tripulação para transporte aquaviário de carga, municipal, por navegação interior, exceto travessia, locação, aluguel de embarcações com tripulação para transporte aquaviário de carga, municipal, por navegação interior, exceto travessia embarcações com tripulação para transporte hidroviário de carga, municipal, por navegação interior exceto de travessia, locação ou aluguel de embarcações com tripulação para transporte hidroviário de carga, municipal, por navegação interior exceto de travessia, transporte aquaviário de carga, municipal, exceto de travessia, por rios, lagoas, canais e outras vias de navegação interior, transporte aquaviário de carga, municipal, por navegação interior, exceto travessia, transporte hidroviário de carga, municipal, exceto de travessia, por rios, lagoas, canais e outras vias de navegação interior, transporte hidroviário de carga, municipal, por navegação interior, exceto de travessia, transporte por navegação interior de carga, municipal, exceto travessia', ''),
(53, 'Serviços de Fabricação de alimentos preparados para animais (bovinos, suínos (porcos), coelhos, aves, etc), Fabricação de alimentos preparados para gatos, cachorros e outros animais, Fabricação de farinhas e pellets de raízes e outros produtos forrageiros, produção de preparações utilizadas na alimentação de animais, Fabricação de ração para qualquer tipo de animal (bovinos, suínos(porcos), aves, coelhos, etc), Fabricação de rações e forragens balanceadas para animais (bovinos, suínos (porcos), aves, coelhos, etc), obtenção de sal mineralizado, Fabricação de suplemento mineral para rações.', ''),
(54, 'Serviços de canais de música, Cadeias radiofônicas, Difusão de programas de rádio, Difusão de sinais de rádio, Emissora de rádio na internet, Atividade de venda de espaço publicitário em rádio, Estação de rádio, Estúdio de rádio, Marketing em rádio; Venda de espaço de propaganda em rádio, Produção e difusão de programas de rádio, Programas de rádio via internet, Transmissão de programas de rádio, Rádio afiliada, Rádio repetidora, atividades de rádio, Emissora de rádio, Estação de radiodifusão, Serviços de transmissão e retransmissão (transporte) de sinais de radiodifusão sonora.', ''),
(55, 'Serviços de hidroterapeuta , hidroterapia, reabilitação postural global – RPG, Clínica de Fisioterapia, Centro de Fisioterapia, Clínica, Consultório.', ''),
(56, 'Serviços de instrumentação cirúrgica, Optometria, Ortóptica, Quiropraxia.', ''),
(57, 'Serviços de Analises Clinicas e Patologia Clinica, Laboratorio de Analises Clinicas, de Biologia Molecular, de Patologia Clinica, de Analise Clinicas em Unidades Moveis, Postos de Coleta Laboratorial, Coleta de Sangue e Urina para Laboratorios. Serviços de atividades de consultas e tratamento médico prestadas a pacientes externos exercidas em consultórios, ambulatórios, postos de assistência médica, clínicas médicas, clínicas oftalmológicas e policlínicas, consultórios privados em hospitais, clínicas de empresas, centros geriátricos, bem como realizadas no domicílio do paciente.', ''),
(58, 'Serviço de armazenamento e depósito, inclusive em câmaras frigoríficas e silos, de todo tipo de produto (sólidos, líquidos e gasosos), por conta de terceiros, exceto com emissão de warrants.', ''),
(59, 'Fabricação de andaimes tubulares, elementos modulares (módulos) de metal para exposições, estrutura metálica para antenas de emissoras de radio e televisão, estrutura metálica para edifícios comerciais e residenciais, estrutura metálica para galpões, coberturas e silos, estrutura metálica para passarelas, estrutura metálica para pontes e viadutos, estrutura metálica para subestações, estrutura metalica para telecomunicações, pontes e elementos de pontes de ferro e aço, porta paletes e estruturas metálicas semelhantes para armazenagem, quiosques metálicos para caixas eletrônicos, torres de telegrafia, torres e pórticos (pilares) de ferro e aço, torres para extração de petróleo, torres metálicas para linhas de transmissão elétrica, teletransmissão, etc., Construções pré-fabricadas de metal.', ''),
(60, 'Serviços de construção de apartamentos, casas, conjuntos habitacionais, prédios, edifícios, edificações, condomínios, residências, etc. Serviços de Obras de asfalto, pavimentação de rodovias, Construção de auto-estradas, bacias de amortecimento, bacias de captação de águas pluviais, caixas coletoras de águas pluviais, bueiros (de talvegue / grota e de greide), estradas e rodovias, descidas d''água, bigodes, sarjetas e outras obras de escoamento, estruturas inferior e superior de estradas e rodovias, estradas de ferro.', ''),
(61, 'Serviços de locação de veículos rodoviários de passageiros com motorista, municipal. Serviços de transporte rodoviário de alunos, estudantes, Ônibus escolar intermunicipal, Ônibus escolar municipal, Transporte escolar municipal e intermunicipal. ', ''),
(62, 'Serviços de fretamento de embarcações com tripulação para transporte aquaviário de passageiros, municipal, em linhas regulares, por navegação interior, exceto travessia, Locação, aluguel de embarcações com tripulação para transporte aquaviário de passageiros, municipal, em linhas regulares, por navegação interior, exceto travessia, Transporte por Navegação Interior (Rios, Canais, Lagos, Lagoas) de Passageiros, Municipal, exceto travessia. Serviços de outros transportes aquaviários de pessoas e mercadorias em embarcações de pequeno e médio porte, sem itinerário fixo não especificados anteriormente.', ''),
(63, 'Serviços de aluguel e/ou locação de betoneiras, escavadoras para construção sem operador, formas para concreto, guindastes, empilhadeiras para construção civil, sem operador, máquinas de terraplenagem sem operador, máquinas e equipamentos para construção sem operador, exceto andaimes, motoniveladores para construção sem operador, tratores para construção sem operador.', ''),
(64, 'Serviços de coleta e transporte de lixo urbano, resíduos não-perigosos de origem doméstica através de lixeiras, veículos ou caçambas, resíduos não-perigosos de origem industrial através de lixeiras, veículos ou caçambas, resíduos não-perigosos de origem urbana através de lixeiras, veículos ou caçambas, materiais recuperáveis. serviços de remoção de lixo urbano. Serviços de coleta de resíduos perigosos qualquer estado físico (sólido, líqüido, pastoso, granulado), resíduos que contenham substâncias ou formulações prejudiciais à saúde humana ao meio ambiente, resíduos que contenham substâncias ou formulações tóxicas.', ''),
(65, 'Serviços de edição integrada à impressão de calendários, impressão de cartões de felicitações, impressão de cartões postais, impressão de catálogos, impressão de gravuras, impressão de listas de produtos farmacêuticos, impressão de listas para malas diretas, impressão de listas telefônicas, impressão de material publicitário, impressão de panfletos e folhetos, reprodução de trabalhos de arte e congêneres.', ''),
(66, 'Reparação e/ou Manutenção de equipamentos de comunicação', ''),
(67, 'Serviço de manejo de animais: condução, pastoreio e outros', ''),
(68, 'Limpezas de caixas de esgoto, galerias de águas pluviais, tubulações, canais urbanos, galerias pluviais fossas sépticas, tanques de infiltração e  em sanitários químicos, serviços de desentupimento de galerias pluviais, esvaziamento de fossas sépticas, retirada de lama, esvaziamento e limpeza de tanques de infiltração e fossas sépticas, sumidouros e poços de esgoto.', ''),
(69, 'Serviços de manutenção e reparação mecânica, lavagem, lubrificação e polimento de veículos automotores', ''),
(70, 'Serviços de organizações de feiras, congressos, exposições e festas', ''),
(71, 'Serviços de manutenção de máquina e motores elétricos em geral', ''),
(72, ' 	RESTAURANTES E OUTROS ESTABELECIMENTOS DE SERVIÇOS DE ALIMENTAÇÃO E BEBIDAS', ''),
(73, ' 	SERVIÇOS DE CATERING, BUFÊ E OUTROS SERVIÇOS DE COMIDA PREPARADA.', ''),
(74, 'ATIVIDADES DE INTERMEDIAÇÃO E AGENCIAMENTO DE SERVIÇOS E NEGÓCIOS EM GERAL, EXCETO IMOBILIÁRIOS', ''),
(75, 'Atividades de agenciamento marítimo ', ''),
(76, 'Serviços de seleção de alumínio descartado, trituração mecânica de sucatas de alumínio com a  subseqüente classificação e separação, redução mecânica de peças de alumínio, corte, a prensagem ou outros métodos de tratamento mecânico para redução de volume de sucatas de alumínio', ''),
(77, ' 	Atividades de limpeza', ''),
(80, ' Contrução de estações e redes de distriubuição de energia elétrica', ''),
(79, 'Locação de bens', ''),
(81, 'Serviços especializados para construção', ''),
(82, 'Fabricação de estruturas de madeira e de artigos de carpitaria para construção', ''),
(83, 'Confecção, sob medida, de artigos do vestuário masculino, feminino e infantil (blusas, camisas, vestidos, saias, calças, ternos, casacos, etc.), feitos com qualquer tipo de material (tecidos planos, tecidos de malha, couros, etc.) ', ''),
(84, 'Atividades de apoio à produção florestal', ''),
(86, 'Atividades de sonorização e de iluminação', ''),
(87, 'Transporte rodoviário de carga, exceto produtos perigosos e mudanças, municipal ', ''),
(88, 'Manutenção e reparação de máquinas,  aparelhos e equipamentos para instalações térmicas', ''),
(89, 'CURSOS DE PILOTAGEM', ''),
(90, 'Instalações hidráulicas, sanitárias e de gás ', ''),
(91, 'Fabricacao de artigos diversos', ''),
(92, 'Transporte rodoviário de produtos perigosos', ''),
(93, 'Construcao e Manutencao de Embarcacao', ''),
(96, 'MARKETING DIRETO', ''),
(97, 'FORNECIMENTO DE ALIMENTOS PREPARADOS PREPONDERANTEMENTE PARA CONSUMO DOMICILIAR', ''),
(99, '32.99-0-99 Fabricação de produtos diversos não especificados anteriormente', ''),
(100, 'OUTRAS ATIVIDADES DE SERVIÇOS PRESTADOS PRINCIPALMENTE ÀS EMPRESAS NÃO ESPECIFICADAS ANTERIORMENTE', ''),
(101, 'REPRESENTAÇÃO COMERCIAL', ''),
(102, 'Servicos para MEI.', ''),
(103, 'Atividades de associações de defesa de direitos sociais ', ''),
(104, 'Restaurantes e similares ', ''),
(105, 'serraria', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos_discriminacoes`
--

CREATE TABLE IF NOT EXISTS `servicos_discriminacoes` (
  `codigo` int(11) NOT NULL,
  `codcadastro` int(11) DEFAULT NULL,
  `codservico` bigint(20) DEFAULT NULL,
  `discriminacao` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `simples_des`
--

CREATE TABLE IF NOT EXISTS `simples_des` (
  `codigo` int(11) NOT NULL,
  `codemissor` int(11) DEFAULT NULL,
  `competencia` date DEFAULT NULL,
  `data_gerado` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `tomador` char(1) DEFAULT 'N',
  `codverificacao` char(9) DEFAULT NULL,
  `estado` char(1) DEFAULT 'N' COMMENT 'N normal C cancelada B boleto E escriturada',
  `motivo_cancelamento` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `simples_des_servicos`
--

CREATE TABLE IF NOT EXISTS `simples_des_servicos` (
  `codigo` int(10) NOT NULL,
  `codsimples_des` int(10) DEFAULT NULL,
  `codservico` bigint(11) DEFAULT NULL,
  `basedecalculo` float(10,2) DEFAULT NULL,
  `tomador_cnpjcpf` varchar(20) DEFAULT NULL,
  `nota_nro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `submenus_prefeitura`
--

CREATE TABLE IF NOT EXISTS `submenus_prefeitura` (
  `codigo` int(11) NOT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `nivel_1` char(1) DEFAULT 'M' COMMENT 'A para alto ,M para medio e B para baixo'
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `submenus_prefeitura`
--

INSERT INTO `submenus_prefeitura` (`codigo`, `menu`, `link`, `nivel_1`) VALUES
(1, 'Cadastro', 'cadastro.php', 'B'),
(3, 'Processos', 'processos.php', 'M'),
(4, 'Fiscais', 'fiscais.php', 'M'),
(5, 'Categoria', 'categoria.php', 'B'),
(6, 'Liberações', 'liberar.php', 'M'),
(8, 'Prest/Serv', 'des.php', 'M'),
(10, 'Manuais', 'manuais.php', 'B'),
(11, 'Consulta nfe', 'consulta.php', 'M'),
(12, 'Prestadores', 'prestadores/cadastro.php', 'M'),
(13, 'ISS Retido', 'issretido.php', 'M'),
(14, 'Inst Financeira', 'dif.php', 'M'),
(15, 'Op de Credito', 'doc.php', 'M'),
(16, 'AIDF', 'aidf.php', 'B'),
(17, 'AIDFe', 'aidfe.php', 'M'),
(20, 'Configurações', 'configuracoes.php', 'M'),
(21, 'Logs', 'logs.php', 'M'),
(22, 'Legislação', 'legislacao.php', 'M'),
(23, 'Usuários', 'usuarios.php', 'M'),
(24, 'Notícias', 'noticias.php', 'M'),
(26, 'Ouvidoria', 'ouvidoria.php', 'M'),
(27, 'Cartorios', 'dec.php', 'M'),
(28, 'Orgaos Publicos', 'dop.php', 'M'),
(29, 'Chat', 'chat.php', 'M'),
(30, 'Fórum', 'forum.php', 'M'),
(31, 'Auditoria', 'auditoria.php', 'M'),
(33, 'Consulta Guia', 'guia.php', 'M'),
(36, 'Tomadores', 'tomadores/cadastro.php', 'B'),
(37, 'Auto de Infração', 'infracao.php', 'M'),
(38, 'Empreiteiras', 'decc.php', 'M'),
(39, 'Escriturações', 'escrituracoes.php', 'M'),
(40, 'Serviço', 'servico.php', 'M'),
(41, 'Nfe', 'nfe.php', 'M'),
(42, 'Sobre', 'sobre.php', 'B'),
(43, 'Serviços', 'servicos.php', 'M'),
(44, 'Regras de Crédito', 'regras_credito.php', 'M'),
(45, 'Simples', 'simples.php', 'M'),
(46, 'Prestador x Contador', 'prestadores/cadastro_contador.php', 'M'),
(47, 'Cartório - Serviços', 'cartorio_cadastro.php', 'M'),
(48, 'Cartório - Categorias', 'cartorio_categoria.php', 'M'),
(49, 'Inst. Financeira', 'if_cadastro.php', 'M'),
(50, 'Op. de Créditos', 'oc_cadastro.php', 'A'),
(51, 'Obras', 'obras.php', 'M'),
(52, 'Prestadores', 'prestadores.php', 'M'),
(53, 'Serviços', 'servicos.php', 'M'),
(54, 'MEI', 'mei.php', 'M'),
(55, 'Regras de Multa', 'regras/regra_multa.php', 'M'),
(56, 'Escrituração', 'escrituracoes_nfe.php', 'M'),
(57, 'Notas Escrituradas', 'notas_escrituradas.php', 'M'),
(59, 'Consultar', 'sep_consultar.php', 'M'),
(60, 'Gerar', 'sep_gerar.php', 'M'),
(61, 'Atualizar', 'sep_atualizar.php', 'M'),
(62, 'Div. Publicas', 'ddp.php', 'M'),
(63, 'Movimentação de Serviços', 'movimentacao.php', 'B'),
(64, 'Valores', 'movimentacao_valor_arrecadado.php', 'B'),
(65, 'RPS', 'rps.php', 'M'),
(66, 'Dados Divergentes', 'inconsistencias.php', 'M'),
(67, 'Guias', 'guias.php', 'M'),
(68, 'Inconsistências', 'dados_divirgentes.php', 'M'),
(69, 'Movimentação de Prestadores', 'movimentacao_prestadores.php', 'M'),
(70, 'Movimentação de Tomadores', 'movimentacao_tomadores.php', 'M'),
(71, 'Regras de Juros', 'regras/regra_juros.php', 'M'),
(72, 'Nota Avulsa', 'nota_avulsa.php', 'M'),
(73, 'Validação', 'validacao.php', 'M'),
(74, 'ISSQN Retido', 'issqn_retido.php', 'M'),
(75, 'DAF 607 x ISS devido', 'daf607_iss_devido.php', 'M'),
(76, 'Alíquotas Simples', 'aliquotas_simples.php', 'M'),
(77, 'Inadimplências', 'inadimplencia.php', 'M'),
(78, 'Movimentação Geral', 'movimentacao_geral.php', 'M'),
(79, 'Estimativa ISSQN', 'estimativa_issqn.php', 'M'),
(80, 'Ranking Empresas', 'ranking_empresas.php', 'M'),
(81, 'Ranking Atividades', 'ranking_atividades.php', 'M'),
(82, 'Acompanhamento ISSQN', 'acompanhamento_issqn.php', 'M'),
(83, 'Créditos', 'creditos.php', 'M'),
(84, 'Simples Nacional', 'simples_nacional.php', 'M'),
(85, 'Notas Emitidas', 'relnotasdetalhadas.php', 'A'),
(86, 'Prestadores - Detalhado', 'relprestadoresdetalhado.php', 'A');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Fazendo dump de dados para tabela `tipo`
--

INSERT INTO `tipo` (`codigo`, `tipo`, `nome`) VALUES
(1, 'prestador', 'Prestador'),
(3, 'simples', 'Simples Nacional'),
(4, 'empreiteira', 'Empreiteira'),
(5, 'orgao_publico', 'Orgão Público'),
(6, 'instituicao_financeira', 'Instituição Financeira'),
(7, 'cartorio', 'Cartório'),
(8, 'operadora_credito', 'Operadora de Crédito'),
(9, 'grafica', 'Gráfica'),
(10, 'contador', 'Contador'),
(11, 'tomador', 'Tomador'),
(12, 'diversao', 'Diversão Pública');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tomadores_pagamento`
--

CREATE TABLE IF NOT EXISTS `tomadores_pagamento` (
  `codigo` int(11) NOT NULL,
  `codnota` varchar(11) DEFAULT NULL,
  `cpfcnpj` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `nropagamento` bigint(20) DEFAULT NULL,
  `data` varchar(255) DEFAULT NULL,
  `dadosconfirmacao` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `ultlogin` datetime DEFAULT NULL,
  `nivel` char(1) DEFAULT 'A'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nome`, `login`, `senha`, `tipo`, `ultlogin`, `nivel`) VALUES
(1, 'Administrador', 'Administrador', '827ccb0eea8a706c4c34a16891f84e7b', 'prefeitura', '2021-10-17 00:36:01', 'A');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `aidf_docs`
--
ALTER TABLE `aidf_docs`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `aidf_especie`
--
ALTER TABLE `aidf_especie`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `aidf_especie_cadastro`
--
ALTER TABLE `aidf_especie_cadastro`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `aidf_solicitacoes`
--
ALTER TABLE `aidf_solicitacoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `autos_infracao`
--
ALTER TABLE `autos_infracao`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`codigo`), ADD KEY `idx_1` (`cnpj`,`cpf`), ADD KEY `idx_2` (`estado`);

--
-- Índices de tabela `cadastro_resp`
--
ALTER TABLE `cadastro_resp`
  ADD PRIMARY KEY (`codigo`), ADD KEY `idx_1` (`codcargo`,`codemissor`);

--
-- Índices de tabela `cadastro_servicos`
--
ALTER TABLE `cadastro_servicos`
  ADD PRIMARY KEY (`codigo`), ADD KEY `idx_1` (`codemissor`);

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `cartorios`
--
ALTER TABLE `cartorios`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `cartorios_des`
--
ALTER TABLE `cartorios_des`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `cartorios_des_notas`
--
ALTER TABLE `cartorios_des_notas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `cartorios_servicos`
--
ALTER TABLE `cartorios_servicos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `cartorios_tipo`
--
ALTER TABLE `cartorios_tipo`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `certidoes_negativas`
--
ALTER TABLE `certidoes_negativas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `certidoes_pagamento`
--
ALTER TABLE `certidoes_pagamento`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `ddp_contas`
--
ALTER TABLE `ddp_contas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `ddp_des`
--
ALTER TABLE `ddp_des`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `ddp_des_contas`
--
ALTER TABLE `ddp_des_contas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `ddp_des_notas`
--
ALTER TABLE `ddp_des_notas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `decc_des`
--
ALTER TABLE `decc_des`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `decc_des_notas`
--
ALTER TABLE `decc_des_notas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `declaracoes`
--
ALTER TABLE `declaracoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `des`
--
ALTER TABLE `des`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `des_issretido`
--
ALTER TABLE `des_issretido`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `des_issretido_notas`
--
ALTER TABLE `des_issretido_notas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `des_servicos`
--
ALTER TABLE `des_servicos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `des_temp`
--
ALTER TABLE `des_temp`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `des_tomadas`
--
ALTER TABLE `des_tomadas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `des_tomadas_servicos`
--
ALTER TABLE `des_tomadas_servicos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `des_tomadores_notas`
--
ALTER TABLE `des_tomadores_notas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `dif_contas`
--
ALTER TABLE `dif_contas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `dif_des`
--
ALTER TABLE `dif_des`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `dif_des_contas`
--
ALTER TABLE `dif_des_contas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `doc_contas`
--
ALTER TABLE `doc_contas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `doc_des`
--
ALTER TABLE `doc_des`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `doc_des_contas`
--
ALTER TABLE `doc_des_contas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `dop_des`
--
ALTER TABLE `dop_des`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `dop_des_notas`
--
ALTER TABLE `dop_des_notas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `empreiteiras_servicos`
--
ALTER TABLE `empreiteiras_servicos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `empreiteiras_socios`
--
ALTER TABLE `empreiteiras_socios`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `faq_isencoes`
--
ALTER TABLE `faq_isencoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `fiscais`
--
ALTER TABLE `fiscais`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `guias_cadastro_pg`
--
ALTER TABLE `guias_cadastro_pg`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `guias_declaracoes`
--
ALTER TABLE `guias_declaracoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `guia_pagamento`
--
ALTER TABLE `guia_pagamento`
  ADD PRIMARY KEY (`codigo`), ADD KEY `idx_1` (`nossonumero`,`pago`), ADD KEY `idx_2` (`codigo`,`codlivro`);

--
-- Índices de tabela `inconsistencias`
--
ALTER TABLE `inconsistencias`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `inst_financeiras`
--
ALTER TABLE `inst_financeiras`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `integracao`
--
ALTER TABLE `integracao`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `juros`
--
ALTER TABLE `juros`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `legislacao`
--
ALTER TABLE `legislacao`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `livro_iss`
--
ALTER TABLE `livro_iss`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `livro_iss_notas`
--
ALTER TABLE `livro_iss_notas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `livro_notas`
--
ALTER TABLE `livro_notas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `mei_des`
--
ALTER TABLE `mei_des`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `mei_des_servicos`
--
ALTER TABLE `mei_des_servicos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `mensagem_tipos`
--
ALTER TABLE `mensagem_tipos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `menus_cadastro`
--
ALTER TABLE `menus_cadastro`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `menus_prefeitura`
--
ALTER TABLE `menus_prefeitura`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `menus_prefeitura_submenus`
--
ALTER TABLE `menus_prefeitura_submenus`
  ADD PRIMARY KEY (`codigo`), ADD KEY `idx_1` (`codmenu`,`codsubmenu`,`nfe`,`visivel`);

--
-- Índices de tabela `menus_site`
--
ALTER TABLE `menus_site`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`codigo`), ADD KEY `idx_1` (`uf`);

--
-- Índices de tabela `nfe_creditos`
--
ALTER TABLE `nfe_creditos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`codigo`), ADD KEY `emissor` (`codemissor`);

--
-- Índices de tabela `notas_servicos`
--
ALTER TABLE `notas_servicos`
  ADD PRIMARY KEY (`codigo`), ADD KEY `idx_1` (`codigo`,`codnota`,`codservico`);

--
-- Índices de tabela `notas_tomadas`
--
ALTER TABLE `notas_tomadas`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `notas_tomadas_servicos`
--
ALTER TABLE `notas_tomadas_servicos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `operadoras_creditos`
--
ALTER TABLE `operadoras_creditos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `orgaospublicos`
--
ALTER TABLE `orgaospublicos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais`
--
ALTER TABLE `processosfiscais`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_apreensoes`
--
ALTER TABLE `processosfiscais_apreensoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_apreensoes_docs`
--
ALTER TABLE `processosfiscais_apreensoes_docs`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_autuacoes`
--
ALTER TABLE `processosfiscais_autuacoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_autuacoes_docs`
--
ALTER TABLE `processosfiscais_autuacoes_docs`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_ciente_vencimento`
--
ALTER TABLE `processosfiscais_ciente_vencimento`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_competencias`
--
ALTER TABLE `processosfiscais_competencias`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_dividaativa`
--
ALTER TABLE `processosfiscais_dividaativa`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_docs`
--
ALTER TABLE `processosfiscais_docs`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_fiscais`
--
ALTER TABLE `processosfiscais_fiscais`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_fundamentacaolegal`
--
ALTER TABLE `processosfiscais_fundamentacaolegal`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_guias`
--
ALTER TABLE `processosfiscais_guias`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_homologacao`
--
ALTER TABLE `processosfiscais_homologacao`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_infracoes`
--
ALTER TABLE `processosfiscais_infracoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_infracoes_fundamentacaolegal`
--
ALTER TABLE `processosfiscais_infracoes_fundamentacaolegal`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_intimacoes`
--
ALTER TABLE `processosfiscais_intimacoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_intimacoes_docs`
--
ALTER TABLE `processosfiscais_intimacoes_docs`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_prorrogacao`
--
ALTER TABLE `processosfiscais_prorrogacao`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_ted`
--
ALTER TABLE `processosfiscais_ted`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_ted_docs`
--
ALTER TABLE `processosfiscais_ted_docs`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_tif`
--
ALTER TABLE `processosfiscais_tif`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `processosfiscais_tif_docs`
--
ALTER TABLE `processosfiscais_tif_docs`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `reclamacoes`
--
ALTER TABLE `reclamacoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `rps_controle`
--
ALTER TABLE `rps_controle`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `rps_solicitacoes`
--
ALTER TABLE `rps_solicitacoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`codigo`), ADD KEY `fkcategoria` (`codcategoria`), ADD KEY `idx_1` (`codigo`,`codservico`);

--
-- Índices de tabela `servicos_categorias`
--
ALTER TABLE `servicos_categorias`
  ADD PRIMARY KEY (`codigo`), ADD KEY `idx_1` (`nome`(100));

--
-- Índices de tabela `servicos_discriminacoes`
--
ALTER TABLE `servicos_discriminacoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `simples_des`
--
ALTER TABLE `simples_des`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `simples_des_servicos`
--
ALTER TABLE `simples_des_servicos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `submenus_prefeitura`
--
ALTER TABLE `submenus_prefeitura`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `tomadores_pagamento`
--
ALTER TABLE `tomadores_pagamento`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `aidf_docs`
--
ALTER TABLE `aidf_docs`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `aidf_especie`
--
ALTER TABLE `aidf_especie`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `aidf_especie_cadastro`
--
ALTER TABLE `aidf_especie_cadastro`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `aidf_solicitacoes`
--
ALTER TABLE `aidf_solicitacoes`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `autos_infracao`
--
ALTER TABLE `autos_infracao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `bancos`
--
ALTER TABLE `bancos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de tabela `boleto`
--
ALTER TABLE `boleto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `codigo` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=505;
--
-- AUTO_INCREMENT de tabela `cadastro_resp`
--
ALTER TABLE `cadastro_resp`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=213;
--
-- AUTO_INCREMENT de tabela `cadastro_servicos`
--
ALTER TABLE `cadastro_servicos`
  MODIFY `codigo` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `cartorios`
--
ALTER TABLE `cartorios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `cartorios_des`
--
ALTER TABLE `cartorios_des`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `cartorios_des_notas`
--
ALTER TABLE `cartorios_des_notas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `cartorios_servicos`
--
ALTER TABLE `cartorios_servicos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `cartorios_tipo`
--
ALTER TABLE `cartorios_tipo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `certidoes_negativas`
--
ALTER TABLE `certidoes_negativas`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `certidoes_pagamento`
--
ALTER TABLE `certidoes_pagamento`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `ddp_contas`
--
ALTER TABLE `ddp_contas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `ddp_des`
--
ALTER TABLE `ddp_des`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `ddp_des_contas`
--
ALTER TABLE `ddp_des_contas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `ddp_des_notas`
--
ALTER TABLE `ddp_des_notas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `decc_des`
--
ALTER TABLE `decc_des`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `decc_des_notas`
--
ALTER TABLE `decc_des_notas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `declaracoes`
--
ALTER TABLE `declaracoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `des`
--
ALTER TABLE `des`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `des_issretido`
--
ALTER TABLE `des_issretido`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `des_issretido_notas`
--
ALTER TABLE `des_issretido_notas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `des_servicos`
--
ALTER TABLE `des_servicos`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `des_temp`
--
ALTER TABLE `des_temp`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `des_tomadas`
--
ALTER TABLE `des_tomadas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `des_tomadas_servicos`
--
ALTER TABLE `des_tomadas_servicos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `des_tomadores_notas`
--
ALTER TABLE `des_tomadores_notas`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `dif_contas`
--
ALTER TABLE `dif_contas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `dif_des`
--
ALTER TABLE `dif_des`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `dif_des_contas`
--
ALTER TABLE `dif_des_contas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `doc_contas`
--
ALTER TABLE `doc_contas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `doc_des`
--
ALTER TABLE `doc_des`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `doc_des_contas`
--
ALTER TABLE `doc_des_contas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `dop_des`
--
ALTER TABLE `dop_des`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `dop_des_notas`
--
ALTER TABLE `dop_des_notas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `empreiteiras_servicos`
--
ALTER TABLE `empreiteiras_servicos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `empreiteiras_socios`
--
ALTER TABLE `empreiteiras_socios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `faq_isencoes`
--
ALTER TABLE `faq_isencoes`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `fiscais`
--
ALTER TABLE `fiscais`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `guias_cadastro_pg`
--
ALTER TABLE `guias_cadastro_pg`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `guias_declaracoes`
--
ALTER TABLE `guias_declaracoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `guia_pagamento`
--
ALTER TABLE `guia_pagamento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de tabela `inconsistencias`
--
ALTER TABLE `inconsistencias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `inst_financeiras`
--
ALTER TABLE `inst_financeiras`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `integracao`
--
ALTER TABLE `integracao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `juros`
--
ALTER TABLE `juros`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de tabela `legislacao`
--
ALTER TABLE `legislacao`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=485;
--
-- AUTO_INCREMENT de tabela `livro_iss`
--
ALTER TABLE `livro_iss`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `livro_iss_notas`
--
ALTER TABLE `livro_iss_notas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `livro_notas`
--
ALTER TABLE `livro_notas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1775;
--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6135;
--
-- AUTO_INCREMENT de tabela `mei_des`
--
ALTER TABLE `mei_des`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `mei_des_servicos`
--
ALTER TABLE `mei_des_servicos`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `mensagem_tipos`
--
ALTER TABLE `mensagem_tipos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `menus_cadastro`
--
ALTER TABLE `menus_cadastro`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de tabela `menus_prefeitura`
--
ALTER TABLE `menus_prefeitura`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de tabela `menus_prefeitura_submenus`
--
ALTER TABLE `menus_prefeitura_submenus`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT de tabela `menus_site`
--
ALTER TABLE `menus_site`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `multas`
--
ALTER TABLE `multas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `municipios`
--
ALTER TABLE `municipios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5817;
--
-- AUTO_INCREMENT de tabela `nfe_creditos`
--
ALTER TABLE `nfe_creditos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `notas`
--
ALTER TABLE `notas`
  MODIFY `codigo` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3606;
--
-- AUTO_INCREMENT de tabela `notas_servicos`
--
ALTER TABLE `notas_servicos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3933;
--
-- AUTO_INCREMENT de tabela `notas_tomadas`
--
ALTER TABLE `notas_tomadas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `notas_tomadas_servicos`
--
ALTER TABLE `notas_tomadas_servicos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `obras`
--
ALTER TABLE `obras`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `operadoras_creditos`
--
ALTER TABLE `operadoras_creditos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `orgaospublicos`
--
ALTER TABLE `orgaospublicos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais`
--
ALTER TABLE `processosfiscais`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_apreensoes`
--
ALTER TABLE `processosfiscais_apreensoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_apreensoes_docs`
--
ALTER TABLE `processosfiscais_apreensoes_docs`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_autuacoes`
--
ALTER TABLE `processosfiscais_autuacoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_autuacoes_docs`
--
ALTER TABLE `processosfiscais_autuacoes_docs`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_ciente_vencimento`
--
ALTER TABLE `processosfiscais_ciente_vencimento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_competencias`
--
ALTER TABLE `processosfiscais_competencias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_dividaativa`
--
ALTER TABLE `processosfiscais_dividaativa`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_docs`
--
ALTER TABLE `processosfiscais_docs`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_fiscais`
--
ALTER TABLE `processosfiscais_fiscais`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_fundamentacaolegal`
--
ALTER TABLE `processosfiscais_fundamentacaolegal`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_guias`
--
ALTER TABLE `processosfiscais_guias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_homologacao`
--
ALTER TABLE `processosfiscais_homologacao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_infracoes`
--
ALTER TABLE `processosfiscais_infracoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_infracoes_fundamentacaolegal`
--
ALTER TABLE `processosfiscais_infracoes_fundamentacaolegal`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_intimacoes`
--
ALTER TABLE `processosfiscais_intimacoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_intimacoes_docs`
--
ALTER TABLE `processosfiscais_intimacoes_docs`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_prorrogacao`
--
ALTER TABLE `processosfiscais_prorrogacao`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_ted`
--
ALTER TABLE `processosfiscais_ted`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_ted_docs`
--
ALTER TABLE `processosfiscais_ted_docs`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_tif`
--
ALTER TABLE `processosfiscais_tif`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `processosfiscais_tif_docs`
--
ALTER TABLE `processosfiscais_tif_docs`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `reclamacoes`
--
ALTER TABLE `reclamacoes`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `rps_controle`
--
ALTER TABLE `rps_controle`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `rps_solicitacoes`
--
ALTER TABLE `rps_solicitacoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `codigo` bigint(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo do banco de dados para servicos',AUTO_INCREMENT=375;
--
-- AUTO_INCREMENT de tabela `servicos_categorias`
--
ALTER TABLE `servicos_categorias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT de tabela `servicos_discriminacoes`
--
ALTER TABLE `servicos_discriminacoes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `simples_des`
--
ALTER TABLE `simples_des`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `simples_des_servicos`
--
ALTER TABLE `simples_des_servicos`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `submenus_prefeitura`
--
ALTER TABLE `submenus_prefeitura`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `tomadores_pagamento`
--
ALTER TABLE `tomadores_pagamento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
