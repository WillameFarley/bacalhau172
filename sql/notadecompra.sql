-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bacalhau172`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `notadecompra`
--

CREATE TABLE IF NOT EXISTS `notadecompra` (
  `Cod_Equipamento` int(11) NOT NULL AUTO_INCREMENT,
  `Funcionario` varchar(50) DEFAULT NULL,
  `Data_Entrada` varchar(10) DEFAULT NULL,
  `Hora_Entrada` varchar(10) DEFAULT NULL,
  `Cliente` varchar(100) DEFAULT NULL,
  `Equipamento` varchar(255) DEFAULT NULL,
  `Valor1` varchar(10) DEFAULT NULL,
  `Valor2` varchar(10) DEFAULT NULL,
  `Valor3` varchar(10) DEFAULT NULL,
  `numerodanota` varchar(15) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `entrada` varchar(1) DEFAULT NULL,
  `saida` varchar(1) DEFAULT NULL,
  `Patrimonio` varchar(100) DEFAULT NULL,
  `Data_Entrega` varchar(10) DEFAULT NULL,
  `inscricao` varchar(15) DEFAULT NULL,
  `obs` varchar(512) DEFAULT NULL,
  `Prazo_Pgto` varchar(10) DEFAULT NULL,
  `Data_Cobanca` varchar(10) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `Hora_Entrega` varchar(5) DEFAULT NULL,
  `Marca` varchar(100) DEFAULT NULL,
  `insc_estadual` varchar(20) DEFAULT NULL,
  `Garantia` varchar(5) DEFAULT NULL,
  `Prod1` varchar(50) DEFAULT NULL,
  `Prod2` varchar(50) DEFAULT NULL,
  `Prod3` varchar(50) DEFAULT NULL,
  `Prod4` varchar(50) DEFAULT NULL,
  `Prod5` varchar(50) DEFAULT NULL,
  `Quant1` varchar(5) DEFAULT NULL,
  `Quant2` varchar(5) DEFAULT NULL,
  `Quant3` varchar(5) DEFAULT NULL,
  `Quant4` varchar(5) DEFAULT NULL,
  `Quant5` varchar(5) DEFAULT NULL,
  `Problemacliente` text,
  `Data_Agenda` varchar(10) DEFAULT NULL,
  `Hora_Agenda` varchar(50) DEFAULT NULL,
  `DiagnosticoTecnico` text,
  `Solucao` text,
  `Previsaoentrega` varchar(10) DEFAULT NULL,
  `Dataentrega` varchar(10) DEFAULT NULL,
  `Recebido` varchar(150) DEFAULT NULL,
  `Arquivo` varchar(1) DEFAULT 'n',
  `valor` varchar(50) DEFAULT NULL,
  `nota_entrada` varchar(1) DEFAULT NULL,
  `nota_saida` varchar(1) DEFAULT NULL,
  `natureza` varchar(255) DEFAULT NULL,
  `data_emissao` varchar(10) DEFAULT NULL,
  `data_saida` varchar(10) DEFAULT NULL,
  `cfop` varchar(20) DEFAULT NULL,
  `insc_substituto` varchar(20) DEFAULT NULL,
  `hora_saida` varchar(20) DEFAULT NULL,
  `base_icms` varchar(20) DEFAULT NULL,
  `valor_icms` varchar(20) DEFAULT NULL,
  `base_icms_substitiucao` varchar(20) DEFAULT NULL,
  `valor_icms_substitiucao` varchar(20) DEFAULT NULL,
  `totalNotaFiscal` varchar(20) DEFAULT NULL,
  `valor_seguro` varchar(20) DEFAULT NULL,
  `ordem` varchar(20) NOT NULL DEFAULT '1',
  `outras_despesas` varchar(20) DEFAULT NULL,
  `frete_conta` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_Equipamento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `notadecompra`
--

INSERT INTO `notadecompra` (`Cod_Equipamento`, `Funcionario`, `Data_Entrada`, `Hora_Entrada`, `Cliente`, `Equipamento`, `Valor1`, `Valor2`, `Valor3`, `numerodanota`, `cpf`, `entrada`, `saida`, `Patrimonio`, `Data_Entrega`, `inscricao`, `obs`, `Prazo_Pgto`, `Data_Cobanca`, `cep`, `Hora_Entrega`, `Marca`, `insc_estadual`, `Garantia`, `Prod1`, `Prod2`, `Prod3`, `Prod4`, `Prod5`, `Quant1`, `Quant2`, `Quant3`, `Quant4`, `Quant5`, `Problemacliente`, `Data_Agenda`, `Hora_Agenda`, `DiagnosticoTecnico`, `Solucao`, `Previsaoentrega`, `Dataentrega`, `Recebido`, `Arquivo`, `valor`, `nota_entrada`, `nota_saida`, `natureza`, `data_emissao`, `data_saida`, `cfop`, `insc_substituto`, `hora_saida`, `base_icms`, `valor_icms`, `base_icms_substitiucao`, `valor_icms_substitiucao`, `totalNotaFiscal`, `valor_seguro`, `ordem`, `outras_despesas`, `frete_conta`) VALUES
(1, NULL, NULL, NULL, 'WILLAME FARLEY SOUSA DA SILVA', NULL, '10.00', NULL, NULL, '123664321', NULL, NULL, NULL, NULL, NULL, NULL, 'NUMERO DA NOTA É 123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Produto 0001', NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', NULL, NULL, NULL, NULL, '28/07/2014', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30.00', NULL, '1', NULL, NULL),
(2, NULL, NULL, NULL, 'Willame Farley Sousa da Silva', NULL, '10.00', '3.20', '10.00', '7531', '11.615.323/0001-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345', NULL, 'Peixe', 'Peixe 02', 'peixe 03', NULL, NULL, '40', '10', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', NULL, NULL, NULL, NULL, '27/01/2013', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '532.00', NULL, '1', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
