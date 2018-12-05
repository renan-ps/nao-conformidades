-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Dez-2018 às 21:54
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `encaminhamentos`
--

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

CREATE TABLE `nao_conformidade` (
  `idNao_conformidade` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `status` varchar(45) NOT NULL,
  `dataAbertura` datetime NOT NULL,
  `dataFechamento` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

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
(5, 'Manutenção');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

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
(3, 'rodriguinho', 'Rodrigo Webster', 'rodrigoswebster@gmail.com', 'Gerente de Documentação', 'a7d579ba76398070eae654c30ff153a4c273272a', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `encaminhamentos`
--
ALTER TABLE `encaminhamentos`
  ADD PRIMARY KEY (`idEncaminamentos`);

--
-- Indexes for table `nao_conformidade`
--
ALTER TABLE `nao_conformidade`
  ADD PRIMARY KEY (`idNao_conformidade`);

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`idSetor`);

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
  MODIFY `idNao_conformidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setores`
--
ALTER TABLE `setores`
  MODIFY `idSetor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_setor` FOREIGN KEY (`idSetor`) REFERENCES `setores` (`idSetor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
