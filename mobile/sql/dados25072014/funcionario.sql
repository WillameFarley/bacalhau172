-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 25/07/2014 às 23h52min
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
-- Estrutura da tabela `funcionario`
--

CREATE TABLE IF NOT EXISTS `funcionario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `apelido` varchar(15) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `setor` varchar(50) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` varchar(25) DEFAULT NULL,
  `ctps` varchar(30) DEFAULT NULL,
  `data_nasc` varchar(10) DEFAULT NULL,
  `estado_civil` varchar(12) DEFAULT NULL,
  `numero_filhos` varchar(5) DEFAULT NULL,
  `tipo_sanguineo` varchar(15) DEFAULT NULL,
  `email` varchar(75) DEFAULT NULL,
  `fone_com` varchar(13) DEFAULT NULL,
  `fone_res` varchar(13) DEFAULT NULL,
  `celular` varchar(13) DEFAULT NULL,
  `escolaridade` varchar(15) DEFAULT NULL,
  `situacao` varchar(10) DEFAULT NULL,
  `ano` varchar(5) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `nivel` varchar(1) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`codigo`, `nome`, `apelido`, `cargo`, `setor`, `cpf`, `rg`, `ctps`, `data_nasc`, `estado_civil`, `numero_filhos`, `tipo_sanguineo`, `email`, `fone_com`, `fone_res`, `celular`, `escolaridade`, `situacao`, `ano`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `login`, `senha`, `nivel`) VALUES
(1, 'WILLAME FARLEY SOUSA DA SILVA', 'WILLAME', 'PROPRIETARIO', 'TI', '73900931372', NULL, NULL, '05/06/1978', 'SOLTEIRO(a)', '03', NULL, 'suporte@wg2net.com.br', NULL, NULL, NULL, '3Âº Grau', 'Incompleto', NULL, NULL, NULL, NULL, 'CE', NULL, 'admin', 'wg2net2010', '1'),
(3, 'JEAN MOURA', 'JEAN MOURA', 'TECNICO EM INFORMATICA', 'TI', '02365523412', '2182077 SSP-PB', NULL, '18/12/1975', 'CASADO(a)', '2', NULL, 'suporte@jeanmoura.com', '22673951', NULL, '81546866', '2Âº Grau', 'Completo', '1978', 'RUA: BULHÃ•ES DE CARVALHO N:285', 'COPACABANA', 'RIO DE JANEIRO', 'RJ', '22081-000', 'jean', 'moura', '1'),
(4, 'LAURA POLO', 'LAURA', 'PROPRIETÃRIA', NULL, NULL, NULL, NULL, NULL, 'SOLTEIRO(a)', NULL, NULL, 'bacalhau172@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RIO DE JANEIRO', 'RJ', NULL, 'laura', '0191', '1'),
(5, 'MARCELLO GIANNETTO', 'MARCELLO', 'PROPRIETÃRIO', NULL, NULL, NULL, NULL, NULL, 'SOLTEIRO(a)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RIO DE JANEIRO', 'RJ', NULL, 'marcello', 'giannetto', '1'),
(6, 'MONICA RODRIGUES', 'MONICA', 'VENDEDORA', 'FABRICA', '11265314721', NULL, NULL, '21/10/1983', 'SOLTEIRO(a)', NULL, NULL, 'monica.rodrigues22@yahoo.com.br', NULL, NULL, '91347402', '1Âº Grau', 'Completo', NULL, 'RUA : BARÃƒO DE PETROPÃ“LIS', 'RIO COMPRIDO', 'RIO DE JANEIRO', 'RJ', NULL, 'monica', '1469', '2'),
(7, 'TATIANA FELIX', 'TATIANA', 'VENDEDORA', NULL, '11608688755', NULL, NULL, '27/12/1987', 'SOLTEIRO(a)', NULL, NULL, 'tatiana.felix.2010@hotmail.com', NULL, NULL, '76707172', '2Âº Grau', 'Completo', NULL, 'BARÃƒO DE PETROPOLIS 721 RUA 11/27 AP:401', 'RIO COMPRIDO', 'RIO DE JANEIRO', 'RJ', NULL, 'tatiana', '123456', '2'),
(8, 'MARCIA PEREZ', 'MARCIA', 'VENDEDORA', 'FABRICA', '03876057701', NULL, NULL, '05/06/1972', 'SOLTEIRO(a)', NULL, NULL, 'marciaprata71_@hotmail.com', NULL, NULL, '99920171', '1Âº Grau', 'Completo', NULL, 'RUA 43 LOTE 1779', 'NOVA CIDADE ', 'ITABORAI', 'RJ', '24800-000', 'marcia', 'elloah', '2'),
(9, 'ANDREZA NOGUEIRA', 'ANDREZA', 'VENDEDORA', 'FABRICA', '11501013777', NULL, NULL, '11/06/1987', 'SOLTEIRO(a)', NULL, NULL, 'andrezanogueira172@yahool.com.br', NULL, NULL, '94550078', '3Âº Grau', 'Completo', NULL, 'CONDE CARAVELAS 00 LOT 78', 'SÃƒO GONÃ‡ALO', 'RIO DE JANEIRO', 'RJ', NULL, 'andreza', 'kiara', '2'),
(10, 'LUIZ NASCIMENTO', 'LUIZ', 'VENDEDOR', NULL, NULL, NULL, NULL, NULL, 'Solteiro(a)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RIO DE JANEIRO', 'RJ', NULL, 'luiz', '123456', '2'),
(11, 'RENATA', 'RENATA', 'VENDEDORA', NULL, NULL, NULL, NULL, NULL, 'Solteiro(a)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'RIO DE JANEIRO', 'RJ', NULL, 'renata', '123456', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
