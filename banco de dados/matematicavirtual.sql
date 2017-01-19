-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Jan-2017 às 17:12
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matematicavirtual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativas`
--

CREATE TABLE `alternativas` (
  `id` int(10) UNSIGNED NOT NULL,
  `questaoId` int(11) NOT NULL,
  `alternativa` varchar(1000) NOT NULL,
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alternativas`
--

INSERT INTO `alternativas` (`id`, `questaoId`, `alternativa`, `tipo`) VALUES
(1, 1, 'x = 0 e y = 5', 0),
(2, 1, 'x + y = 7', 1),
(3, 1, 'x = 0 e y = 1', 0),
(4, 1, 'x + 2 y = 7', 0),
(5, 2, '0', 0),
(6, 2, '10', 1),
(7, 2, '20', 0),
(8, 2, '30', 0),
(9, 3, '40', 0),
(10, 3, '10', 0),
(11, 3, 'nenhum', 0),
(12, 3, '5', 1),
(13, 4, 'o produto de dois n&uacutemeros irracionais &eacute sempre um n&uacutemero irracional.', 0),
(14, 4, 'a soma de dois n&uacutemeros irracionais &eacute sempre um n&uacutemero irracional.', 0),
(15, 4, 'entre os n&uacutemeros reais 3 e 4 existe apenas um n&uacutemero irracional.', 0),
(16, 4, 'entre dois n&uacutemeros racionais distintos existe pelo menos um n&uacutemero racional.', 1),
(41, 14, 'verdadeira', 1),
(42, 14, 'falsa1', 0),
(43, 14, 'falsa2', 0),
(44, 14, 'falsa3', 0),
(45, 15, 'x=y', 1),
(46, 15, 'x>y', 0),
(47, 15, 'xâˆ’y Ã© um nÃºmero irracional.', 0),
(48, 15, 'x+y Ã© um nÃºmero racional nÃ£o inteiro.', 0),
(49, 16, 'verdadeira', 1),
(50, 16, 'falsa1', 0),
(51, 16, 'falsa2', 0),
(52, 16, 'falsa3', 0),
(53, 17, 'verdadeira', 1),
(54, 17, 'falsa1', 0),
(55, 17, 'falsa2', 0),
(56, 17, 'falsa3', 0),
(57, 18, '', 1),
(58, 18, '', 0),
(59, 18, '', 0),
(60, 18, '', 0),
(61, 19, '', 1),
(62, 19, '', 0),
(63, 19, '', 0),
(64, 19, '', 0),
(65, 20, '', 1),
(66, 20, '', 0),
(67, 20, '', 0),
(68, 20, '', 0),
(69, 18, '', 1),
(70, 18, '', 0),
(71, 18, '', 0),
(72, 18, '', 0),
(73, 18, '', 1),
(74, 18, '', 0),
(75, 18, '', 0),
(76, 18, '', 0),
(77, 18, 'verdadeira', 1),
(78, 18, 'falsa', 0),
(79, 18, 'falsa', 0),
(80, 18, 'falsa', 0),
(81, 19, 'verdadeira ', 1),
(82, 19, 'falsa', 0),
(83, 19, 'falsa', 0),
(84, 19, 'falsa', 0),
(85, 20, 'verdadeira', 1),
(86, 20, 'falsa', 0),
(87, 20, 'falsa', 0),
(88, 20, 'falsa', 0),
(89, 21, 'verdadeira', 1),
(90, 21, 'falsa', 0),
(91, 21, 'falsa', 0),
(92, 21, 'falsa', 0),
(93, 22, '', 1),
(94, 22, '', 0),
(95, 22, '', 0),
(96, 22, '', 0),
(97, 23, 'verdadeira', 1),
(98, 23, 'falsa', 0),
(99, 23, 'falsa', 0),
(100, 23, 'falsa', 0),
(101, 24, 'verdadeira', 1),
(102, 24, 'falsa', 0),
(103, 24, 'falsa', 0),
(104, 24, 'falsa', 0),
(105, 25, 'verdadeira ', 1),
(106, 25, 'falsa', 0),
(107, 25, 'falsa', 0),
(108, 25, 'falsa', 0),
(109, 26, 'verdadeira', 1),
(110, 26, 'falsa', 0),
(111, 26, 'falsa', 0),
(112, 26, 'falsa', 0),
(113, 27, 'verdadeira', 1),
(114, 27, 'falsa', 0),
(115, 27, 'falsa', 0),
(116, 27, 'falsa', 0),
(117, 28, 'verdadeira', 1),
(118, 28, 'falsa', 0),
(119, 28, 'falsa', 0),
(120, 28, 'falsa', 0),
(121, 29, 'verdadeira', 1),
(122, 29, 'falsa', 0),
(123, 29, 'falsa', 0),
(124, 29, 'falsa', 0),
(125, 30, 'sim', 1),
(126, 30, 'nÃ£o', 0),
(127, 30, 'nunca', 0),
(128, 30, 'nem pensar', 0),
(129, 31, 'macaco', 1),
(130, 31, 'cabra', 0),
(131, 31, 'cenoura', 0),
(132, 31, 'carrinho', 0),
(133, 32, 'DICKS OUT!!', 1),
(134, 32, 'KILL HIM!!', 0),
(135, 32, 'WHO THE FUCK IS HARAMBE?', 0),
(136, 32, 'FUCKIN MONKEY', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `desempenho`
--

CREATE TABLE `desempenho` (
  `usuarioId` int(11) NOT NULL,
  `materiaNome` varchar(40) CHARACTER SET utf8 NOT NULL,
  `acertos` int(11) DEFAULT NULL,
  `erros` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `desempenho`
--

INSERT INTO `desempenho` (`usuarioId`, `materiaNome`, `acertos`, `erros`) VALUES
(7, 'conjuntosNumericos', 0, 4),
(1, 'conjuntosNumericos', 3, 1),
(7, 'conjuntosNumericos', 3, 1),
(7, 'conjuntosNumericos', 2, 2),
(7, 'conjuntosNumericos', 3, 1),
(7, 'conjuntosNumericos', 3, 1),
(7, '', 4, 0),
(7, 'Geometria', 0, 4),
(0, 'Conjuntos', 0, 4),
(1, 'Geometria', 4, 0),
(1, 'Conjuntos', 4, 1),
(1, 'Macaco', 3, 1),
(8, 'Macaco', 4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materias`
--

INSERT INTO `materias` (`id`, `nome`, `descricao`) VALUES
(3, 'Conjuntos', 'Lorem ipsum dolor sit amet consectetur adipiscing elit Neque'),
(8, 'Geometria', 'O estudo das formas geomÃ©tricas'),
(9, 'Macaco', 'banana quero banana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `enunciado` varchar(1000) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `linkVideo` varchar(1000) DEFAULT NULL,
  `assunto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `enunciado`, `linkVideo`, `assunto`) VALUES
(1, 'Sejam x e y n&uacutemeros tais que os conjuntos {0, 7, 1} e {x, y, 1} s&atildeo iguais. Ent&atildeo, podemos afirmar que:', NULL, 'Conjuntos'),
(2, 'Num col&eacutegio de 100 alunos, 80 gostam de sorvete de chocolate, 70 gostam de sorvete de creme e 60 gostam dos dois sabores. Quantos n&atildeo gostam de nenhum dos dois sabores?', NULL, 'Conjuntos'),
(3, 'Uma prova com duas quest&otildees foi dada a uma classe de quarenta alunos. Dez alunos acertaram as duas quest&otildees, 25 acertaram a primeira e 20 acertaram a segunda quest&atildeo. Quantos alunos erraram as duas quest&otildees?', NULL, 'Conjuntos'),
(4, 'Segundo o matem&aacutetico Leopold Kronecker (1823-1891), &quotDeus fez os n&uacutemeros inteiros, o resto &eacute trabalho do homem.&quot Os conjuntos num&eacutericos s&atildeo, como afirma o matem&aacutetico, uma das grandes inven&ccedil&oacutees humanas. Assim, em rela&ccedil&atildeo aos elementos desses conjuntos, &eacute correto afirmar que:', NULL, 'Conjuntos'),
(14, 'teste', NULL, 'Conjuntos'),
(15, 'Se x e y sÃ£o nÃºmeros reais tais que x=(0,25)0,25 e y=16âˆ’0,125, Ã© verdade ', NULL, 'Conjuntos'),
(17, 'testeVideo', 'https://www.youtube.com/embed/Rh-jKrMrmOA', 'Conjuntos'),
(19, 'Lorem ipsum dolor sit amet', '', 'Geometria'),
(20, 'questÃ£o teste', '', 'Geometria'),
(21, 'questÃ£o teste 2', '', 'Geometria'),
(23, 'questÃ£o teste 3', '', 'Geometria'),
(24, 'questÃ£o teste 4', '', 'Geometria'),
(25, 'banana com banana', '', 'Macaco'),
(26, 'teste', '', 'Conjuntos'),
(27, 'teste 1', '', 'Conjuntos'),
(28, 'teste 2 ', '', 'Conjuntos'),
(29, 'Bananaids', '', 'Macaco'),
(30, 'macaco quer banana?', '', 'Macaco'),
(31, 'U U U A A A', '', 'Macaco'),
(32, 'HARAMBE??', NULL, 'Macaco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `turmaNome` varchar(90) NOT NULL,
  `alunoId` int(11) DEFAULT NULL,
  `alunoNome` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`turmaNome`, `alunoId`, `alunoNome`) VALUES
('turma teste 01', 0, 'professor'),
('turma teste 01', 7, 'Nestor caetano'),
('turma teste 02', 0, 'professor'),
('turma teste 02', 8, 'jorgenrique');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tipo` int(11) NOT NULL DEFAULT '0',
  `ativo` varchar(45) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `Usuario`, `senha`, `email`, `tipo`, `ativo`) VALUES
(1, 'adm', 'adm', 'adm', 'adm@adm.com', 1, '1'),
(4, 'teste', 'teste', 'teste', 'teste@email.com', 0, '1'),
(5, 'joÃ£o', 'joÃ£o', 'joao', 'joÃ£o@gmail.com', 0, '1'),
(6, 'Nestor caetano', 'nestor', '123', '14nestorcaetano@gmail.com', 0, '1'),
(7, 'Nestor caetano', 'nestor', 'nestor', 'nestorcaetano@bol.com.br', 0, '1'),
(8, 'jorgenrique', 'jorgenrique', 'jorgenrique', 'jorge@jorge.com', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternativas`
--
ALTER TABLE `alternativas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternativas`
--
ALTER TABLE `alternativas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
