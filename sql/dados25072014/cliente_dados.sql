-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 25/07/2014 às 23h54min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `data`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `fantasia` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `grupo` varchar(255) DEFAULT NULL,
  `rota` varchar(255) DEFAULT NULL,
  `tipocliente` varchar(255) DEFAULT NULL,
  `grupocliente` varchar(255) DEFAULT NULL,
  `proprietario` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `tipo_pessoa` varchar(255) DEFAULT NULL,
  `insc_estadual` varchar(255) DEFAULT NULL,
  `insc_municipal` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fone_com` varchar(255) DEFAULT NULL,
  `fone_res` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `endereco2` varchar(255) DEFAULT NULL,
  `endereco3` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `bairro2` varchar(255) DEFAULT NULL,
  `bairro3` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `vendedor` varchar(255) DEFAULT NULL,
  `porcentagem` varchar(255) DEFAULT NULL,
  `link_mapa` longtext,
  `obs` longtext,
  `site` varchar(255) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `dn` varchar(20) DEFAULT NULL,
  `banco` varchar(255) DEFAULT NULL,
  `banco2` varchar(255) DEFAULT NULL,
  `banco3` varchar(255) DEFAULT NULL,
  `conta` varchar(255) DEFAULT NULL,
  `conta2` varchar(255) DEFAULT NULL,
  `conta3` varchar(255) DEFAULT NULL,
  `estadocivil` varchar(255) DEFAULT NULL,
  `data_cadastro` varchar(20) DEFAULT NULL,
  `cep2` varchar(9) DEFAULT NULL,
  `cep3` varchar(9) DEFAULT NULL,
  `nome_razao` varchar(255) DEFAULT NULL,
  `nome_fisica` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4945 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
