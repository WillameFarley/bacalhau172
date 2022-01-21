-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 25/07/2014 às 23h55min
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
-- Estrutura da tabela `ordemservico`
--

CREATE TABLE IF NOT EXISTS `ordemservico` (
  `Cod_Equipamento` int(11) NOT NULL AUTO_INCREMENT,
  `Funcionario` varchar(50) DEFAULT NULL,
  `Data_Entrada` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Hora_Entrada` varchar(10) DEFAULT NULL,
  `Cliente` varchar(255) DEFAULT NULL,
  `Equipamento` varchar(255) DEFAULT NULL,
  `Valor1` varchar(10) DEFAULT NULL,
  `Valor2` varchar(10) DEFAULT NULL,
  `Valor3` varchar(10) DEFAULT NULL,
  `Valor4` varchar(10) DEFAULT NULL,
  `Valor5` varchar(10) DEFAULT NULL,
  `Modelo` varchar(255) DEFAULT NULL,
  `Marca` varchar(255) DEFAULT NULL,
  `Patrimonio` varchar(100) DEFAULT NULL,
  `Data_Entrega` varchar(10) DEFAULT NULL,
  `inscricao` varchar(15) DEFAULT NULL,
  `obs` varchar(512) DEFAULT NULL,
  `Prazo_Pgto` varchar(255) DEFAULT NULL,
  `Data_Cobanca` varchar(10) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `Hora_Entrega` varchar(255) DEFAULT NULL,
  `Serie` varchar(100) DEFAULT NULL,
  `Setor` varchar(200) DEFAULT NULL,
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
  `valor_frete` varchar(20) DEFAULT NULL,
  `valor_seguro` varchar(20) DEFAULT NULL,
  `valor_ipi` varchar(20) DEFAULT NULL,
  `outras_despesas` varchar(20) DEFAULT NULL,
  `frete_conta` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`Cod_Equipamento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201403680 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
