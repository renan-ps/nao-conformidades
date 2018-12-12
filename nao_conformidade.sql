-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Dez-2018 às 19:35
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nao_conformidade`
--
CREATE DATABASE IF NOT EXISTS `nao_conformidade` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nao_conformidade`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `encaminhamentos`
--

DROP TABLE IF EXISTS `encaminhamentos`;
CREATE TABLE `encaminhamentos` (
  `idEncaminamentos` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `data` datetime NOT NULL,
  `nao_conformidade_id` int(11) NOT NULL,
  `usuariosEncaminhado` int(11) NOT NULL,
  `setorEncaminhado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nao_conformidade`
--

DROP TABLE IF EXISTS `nao_conformidade`;
CREATE TABLE `nao_conformidade` (
  `idNao_conformidade` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `status` int(45) NOT NULL,
  `dataAbertura` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dataFechamento` datetime DEFAULT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nao_conformidade`
--

INSERT INTO `nao_conformidade` (`idNao_conformidade`, `descricao`, `tipo`, `status`, `dataAbertura`, `dataFechamento`, `idUsuario`) VALUES
(12, 'testando hora', 1, 2, '2018-12-07 20:29:01', NULL, 4),
(13, 'testando status', 1, 1, '2018-12-07 20:29:31', NULL, 4),
(14, 'sdfjksdfjsdk', 2, 3, '2018-12-07 21:51:00', NULL, 4),
(18, 'Teste', 1, 4, '2018-12-10 13:33:43', NULL, 1),
(19, 'Alguém vomitou na sala 302.', 1, 1, '2018-12-10 15:06:19', NULL, 1),
(20, 'Ar condicionado da sala 501 não está funcionando corretamente.', 1, 1, '2018-12-10 17:36:23', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

DROP TABLE IF EXISTS `setores`;
CREATE TABLE `setores` (
  `idSetor` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`idSetor`, `nome`) VALUES
(1, 'T.I.'),
(2, 'Recursos Humanos'),
(3, 'Administração'),
(4, 'Serviços Gerais'),
(5, 'Manutenção'),
(6, 'Qualidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_nao_conformidade`
--

DROP TABLE IF EXISTS `status_nao_conformidade`;
CREATE TABLE `status_nao_conformidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_nao_conformidade`
--

INSERT INTO `status_nao_conformidade` (`id`, `nome`) VALUES
(1, 'Aguardando validação'),
(2, 'Aberta'),
(3, 'Encerrada'),
(4, 'Recusada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_nao_conformidade`
--

DROP TABLE IF EXISTS `tipos_nao_conformidade`;
CREATE TABLE `tipos_nao_conformidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipos_nao_conformidade`
--

INSERT INTO `tipos_nao_conformidade` (`id`, `nome`) VALUES
(1, 'Ação corretiva'),
(2, 'Ação preventiva');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(80) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `idSetor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `nome`, `email`, `cargo`, `senha`, `idSetor`) VALUES
(1, 'renanps', 'Renan Pereira', 'renansoaresinfo@gmail.com', 'Técnico em Informática', '7c222fb2927d828af22f592134e8932480637c0d', 1),
(3, 'rodriguinho', 'Rodrigo Webster', 'rodrigoswebster@gmail.com', 'Gerente de Documentação', 'a7d579ba76398070eae654c30ff153a4c273272a', 3),
(4, 'puruca', 'Roberto', 'puruca@gmail.com', 'Chefe de qualidade', 'a7d579ba76398070eae654c30ff153a4c273272a', 6),
(5, 'rodrigo', 'Rodrigo', 'sdjf@jds.cd', 'asjdh', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 4),
(6, 'gustavo', 'Gustavo de Melo', 'gustavodemelo18@gmail.com', 'Auxiliar administrativo', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `encaminhamentos`
--
ALTER TABLE `encaminhamentos`
  ADD PRIMARY KEY (`idEncaminamentos`),
  ADD KEY `fk_naoConformidade` (`nao_conformidade_id`),
  ADD KEY `fk_setorEncaminhado` (`setorEncaminhado`),
  ADD KEY `fk_usuarioEncaminhado` (`usuariosEncaminhado`);

--
-- Indexes for table `nao_conformidade`
--
ALTER TABLE `nao_conformidade`
  ADD PRIMARY KEY (`idNao_conformidade`),
  ADD KEY `fk_tipo` (`tipo`),
  ADD KEY `fk_idUsuario` (`idUsuario`),
  ADD KEY `fk_status` (`status`);

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`idSetor`);

--
-- Indexes for table `status_nao_conformidade`
--
ALTER TABLE `status_nao_conformidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos_nao_conformidade`
--
ALTER TABLE `tipos_nao_conformidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_setor` (`idSetor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `encaminhamentos`
--
ALTER TABLE `encaminhamentos`
  MODIFY `idEncaminamentos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nao_conformidade`
--
ALTER TABLE `nao_conformidade`
  MODIFY `idNao_conformidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `setores`
--
ALTER TABLE `setores`
  MODIFY `idSetor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status_nao_conformidade`
--
ALTER TABLE `status_nao_conformidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `encaminhamentos`
--
ALTER TABLE `encaminhamentos`
  ADD CONSTRAINT `fk_naoConformidade` FOREIGN KEY (`nao_conformidade_id`) REFERENCES `nao_conformidade` (`idNao_conformidade`),
  ADD CONSTRAINT `fk_setorEncaminhado` FOREIGN KEY (`setorEncaminhado`) REFERENCES `setores` (`idSetor`),
  ADD CONSTRAINT `fk_usuarioEncaminhado` FOREIGN KEY (`usuariosEncaminhado`) REFERENCES `usuarios` (`idUsuario`);

--
-- Limitadores para a tabela `nao_conformidade`
--
ALTER TABLE `nao_conformidade`
  ADD CONSTRAINT `fk_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status`) REFERENCES `status_nao_conformidade` (`id`),
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`tipo`) REFERENCES `tipos_nao_conformidade` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_setor` FOREIGN KEY (`idSetor`) REFERENCES `setores` (`idSetor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
