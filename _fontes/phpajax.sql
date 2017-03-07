-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 05-Mar-2015 às 19:01
-- Versão do servidor: 5.6.11
-- versão do PHP: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `phpajax`
--
CREATE DATABASE IF NOT EXISTS `phpajax` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phpajax`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(6) NOT NULL AUTO_INCREMENT,
  `clientenome` varchar(120) NOT NULL,
  `clienteidade` int(3) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `clientenome`, `clienteidade`) VALUES
(5, 'Teste 1', 15),
(12, 'mais um teste', 20),
(13, 'teste de novo 2', 60),
(14, 'Ção', 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
