-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Mar-2017 às 18:33
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_eletivas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eletiva`
--

CREATE TABLE `tb_eletiva` (
  `id_eletiva` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `professor` varchar(255) NOT NULL,
  `quantidade_vagas` int(11) NOT NULL,
  `ativa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_inscricao`
--

CREATE TABLE `tb_inscricao` (
  `id_inscricao` int(11) NOT NULL,
  `fk_eletiva` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `turma` varchar(10) NOT NULL,
  `data` datetime NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_eletiva`
--
ALTER TABLE `tb_eletiva`
  ADD PRIMARY KEY (`id_eletiva`);

--
-- Indexes for table `tb_inscricao`
--
ALTER TABLE `tb_inscricao`
  ADD PRIMARY KEY (`id_inscricao`),
  ADD KEY `fk_eletiva` (`fk_eletiva`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_eletiva`
--
ALTER TABLE `tb_eletiva`
  MODIFY `id_eletiva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_inscricao`
--
ALTER TABLE `tb_inscricao`
  MODIFY `id_inscricao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_inscricao`
--
ALTER TABLE `tb_inscricao`
  ADD CONSTRAINT `fk_eletiva` FOREIGN KEY (`fk_eletiva`) REFERENCES `tb_eletiva` (`id_eletiva`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
