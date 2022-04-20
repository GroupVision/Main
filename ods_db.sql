-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Abr-2022 às 00:24
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ods_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto_usuario`
--

DROP TABLE IF EXISTS `projeto_usuario`;
CREATE TABLE IF NOT EXISTS `projeto_usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario_pessoa` int(11) DEFAULT NULL,
  `cod_usuario_empresa` int(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `problema` varchar(1000) NOT NULL,
  `solucao` varchar(1000) NOT NULL,
  `objetivo` varchar(1000) DEFAULT NULL,
  `expectativa` varchar(1000) DEFAULT NULL,
  `publico_alvo` varchar(100) DEFAULT NULL,
  `recursos` varchar(1000) DEFAULT NULL,
  `tipo_parceria` enum('','','') DEFAULT NULL,
  `descricao_parceria` varchar(1000) DEFAULT NULL,
  `status` enum('','','','') DEFAULT NULL,
  `arquivos` blob,
  `descricao_projeto` varchar(1000) DEFAULT NULL,
  `links` varchar(2048) DEFAULT NULL,
  `imagens` blob,
  `cod_ods` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projeto_usuario`
--

INSERT INTO `projeto_usuario` (`codigo`, `cod_usuario_pessoa`, `cod_usuario_empresa`, `nome`, `problema`, `solucao`, `objetivo`, `expectativa`, `publico_alvo`, `recursos`, `tipo_parceria`, `descricao_parceria`, `status`, `arquivos`, `descricao_projeto`, `links`, `imagens`, `cod_ods`) VALUES
(1, NULL, NULL, 'Bigorna', 'bigorna quebrada', 'consertar bigorna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, 'Banheiros pÃºblicos', 'Sem banheiros pÃºblicos', 'Colocar banheiros pÃºblicos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, 'Ruas esburadas', 'ruas com buraco', 'tampar os buraco', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, 'aa', 'aa', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_pessoa`
--

DROP TABLE IF EXISTS `usuario_pessoa`;
CREATE TABLE IF NOT EXISTS `usuario_pessoa` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `cod_endereços` int(11) NOT NULL,
  `cod_documentos` int(11) NOT NULL,
  `cod_profissões` int(11) NOT NULL,
  `cod_projetos` int(11) NOT NULL,
  `cod_parcerias` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_pessoa`
--

INSERT INTO `usuario_pessoa` (`codigo`, `nome`, `email`, `senha`, `cpf`, `tel`, `cod_endereços`, `cod_documentos`, `cod_profissões`, `cod_projetos`, `cod_parcerias`) VALUES
(1, 'Gustavo Binder', 'gustavo@gmail.com', '123456', '1111111', '1111111', 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
