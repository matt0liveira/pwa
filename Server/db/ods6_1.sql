-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29-Jun-2021 às 14:55
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ods6.1`
--
CREATE DATABASE IF NOT EXISTS `ods6` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `ods6`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comunidade`
--

DROP TABLE IF EXISTS `comunidade`;
CREATE TABLE IF NOT EXISTS `comunidade` (
  `idcomunidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`idcomunidade`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `comunidade`
--

INSERT INTO `comunidade` (`idcomunidade`, `nome`) VALUES
(12, 'Paraisópolis'),
(13, 'São Vicente'),
(17, 'São Gonçalo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacao`
--

DROP TABLE IF EXISTS `doacao`;
CREATE TABLE IF NOT EXISTS `doacao` (
  `iddoacao` int(11) NOT NULL AUTO_INCREMENT,
  `fkdoador` int(11) NOT NULL,
  `nome_doador` varchar(80) COLLATE utf8_swedish_ci NOT NULL,
  `comunidade` varchar(80) COLLATE utf8_swedish_ci NOT NULL,
  `quantidade` varchar(80) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`iddoacao`),
  KEY `fkdoador` (`fkdoador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `doador`
--

DROP TABLE IF EXISTS `doador`;
CREATE TABLE IF NOT EXISTS `doador` (
  `iddoador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8_swedish_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`iddoador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `doacao`
--
ALTER TABLE `doacao`
  ADD CONSTRAINT `doacao_ibfk_1` FOREIGN KEY (`fkdoador`) REFERENCES `doador` (`iddoador`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
