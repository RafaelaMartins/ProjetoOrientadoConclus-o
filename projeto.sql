-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2014 at 03:03 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Table structure for table `cadastro`
--

CREATE TABLE IF NOT EXISTS `cadastro` (
`Codigo` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL,
  `Email` text,
  `Idade` int(11) DEFAULT NULL,
  `Peso` decimal(4,0) DEFAULT NULL,
  `Altura` decimal(4,0) DEFAULT NULL,
  `Senha` varchar(45) DEFAULT NULL,
  `Login` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cadastro`
--

INSERT INTO `cadastro` (`Codigo`, `Nome`, `Email`, `Idade`, `Peso`, `Altura`, `Senha`, `Login`) VALUES
(12, '1', '1', 18, '123', '161', 'c4ca4238a0b923820dcc509a6f75849b', '1');

-- --------------------------------------------------------

--
-- Table structure for table `calorias`
--

CREATE TABLE IF NOT EXISTS `calorias` (
  `calKcal` int(11) DEFAULT NULL,
  `calJoule` int(11) DEFAULT NULL,
`calCodigo` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `calorias`
--

INSERT INTO `calorias` (`calKcal`, `calJoule`, `calCodigo`) VALUES
(1, 1, 86),
(1, 1, 87),
(100, 10, 88);

-- --------------------------------------------------------

--
-- Table structure for table `dieta`
--

CREATE TABLE IF NOT EXISTS `dieta` (
`dieCodigo` int(11) NOT NULL,
  `dieNome` varchar(45) DEFAULT NULL,
  `dieFinalidade` varchar(45) DEFAULT NULL,
  `dieCaloriaTotal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `informacoesnutricionais`
--

CREATE TABLE IF NOT EXISTS `informacoesnutricionais` (
`infCodigo` int(11) NOT NULL,
  `infNome` varchar(45) NOT NULL DEFAULT '',
  `infCarboidratos` int(11) DEFAULT NULL,
  `infProteinas` int(11) DEFAULT NULL,
  `infGordurasTotais` int(11) DEFAULT NULL,
  `infFibras` int(11) DEFAULT NULL,
  `calCodigo` int(11) NOT NULL,
  `porCodigo` int(11) NOT NULL,
  `tipCodigo` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `informacoesnutricionais`
--

INSERT INTO `informacoesnutricionais` (`infCodigo`, `infNome`, `infCarboidratos`, `infProteinas`, `infGordurasTotais`, `infFibras`, `calCodigo`, `porCodigo`, `tipCodigo`) VALUES
(20, 'arroz', 1, 1, 1, 1, 86, 113, 38),
(21, 'arroz', 1, 1, 1, 1, 87, 114, 39),
(22, 'Feijão', 100, 100, 100, 100, 88, 115, 40);

-- --------------------------------------------------------

--
-- Table structure for table `informacoes_dieta`
--

CREATE TABLE IF NOT EXISTS `informacoes_dieta` (
`ind_infCodigo` int(11) NOT NULL,
  `ind_infNome` varchar(45) NOT NULL,
  `ind_CalCodigo` int(11) NOT NULL,
  `ind_PorCodigo` int(11) NOT NULL,
  `ind_TipCodigo` int(11) NOT NULL,
  `ind_dieCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `porcao`
--

CREATE TABLE IF NOT EXISTS `porcao` (
  `porTipo` varchar(15) DEFAULT NULL,
  `porQuantidade` varchar(20) DEFAULT NULL,
`porCodigo` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `porcao`
--

INSERT INTO `porcao` (`porTipo`, `porQuantidade`, `porCodigo`) VALUES
('Colher de Sopa', '1', 113),
('Colher de Sopa', '1', 114),
('Colher de Sopa ', '1', 115);

-- --------------------------------------------------------

--
-- Table structure for table `tipos_alimentos`
--

CREATE TABLE IF NOT EXISTS `tipos_alimentos` (
  `tipNome` varchar(25) DEFAULT NULL,
`tipCodigo` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tipos_alimentos`
--

INSERT INTO `tipos_alimentos` (`tipNome`, `tipCodigo`) VALUES
('Frutas', 38),
('Frutas', 39),
('Grãos', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro`
--
ALTER TABLE `cadastro`
 ADD PRIMARY KEY (`Codigo`);

--
-- Indexes for table `calorias`
--
ALTER TABLE `calorias`
 ADD PRIMARY KEY (`calCodigo`);

--
-- Indexes for table `dieta`
--
ALTER TABLE `dieta`
 ADD PRIMARY KEY (`dieCodigo`);

--
-- Indexes for table `informacoesnutricionais`
--
ALTER TABLE `informacoesnutricionais`
 ADD PRIMARY KEY (`infCodigo`,`infNome`,`calCodigo`,`porCodigo`,`tipCodigo`), ADD KEY `fk_Informacoes_Calorias_idx` (`calCodigo`), ADD KEY `fk_Informacoes_Porcao1_idx` (`porCodigo`), ADD KEY `fk_Informacoes_Tipos de Alimentos1_idx` (`tipCodigo`);

--
-- Indexes for table `informacoes_dieta`
--
ALTER TABLE `informacoes_dieta`
 ADD PRIMARY KEY (`ind_infCodigo`,`ind_infNome`,`ind_CalCodigo`,`ind_PorCodigo`,`ind_TipCodigo`,`ind_dieCodigo`), ADD KEY `fk_Informacoes_has_Dieta_Dieta1_idx` (`ind_dieCodigo`), ADD KEY `fk_Informacoes_has_Dieta_Informacoes1_idx` (`ind_infCodigo`,`ind_infNome`,`ind_CalCodigo`,`ind_PorCodigo`,`ind_TipCodigo`);

--
-- Indexes for table `porcao`
--
ALTER TABLE `porcao`
 ADD PRIMARY KEY (`porCodigo`);

--
-- Indexes for table `tipos_alimentos`
--
ALTER TABLE `tipos_alimentos`
 ADD PRIMARY KEY (`tipCodigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastro`
--
ALTER TABLE `cadastro`
MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `calorias`
--
ALTER TABLE `calorias`
MODIFY `calCodigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `dieta`
--
ALTER TABLE `dieta`
MODIFY `dieCodigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `informacoesnutricionais`
--
ALTER TABLE `informacoesnutricionais`
MODIFY `infCodigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `informacoes_dieta`
--
ALTER TABLE `informacoes_dieta`
MODIFY `ind_infCodigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `porcao`
--
ALTER TABLE `porcao`
MODIFY `porCodigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `tipos_alimentos`
--
ALTER TABLE `tipos_alimentos`
MODIFY `tipCodigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `informacoesnutricionais`
--
ALTER TABLE `informacoesnutricionais`
ADD CONSTRAINT `fk_Informacoes_Calorias` FOREIGN KEY (`calCodigo`) REFERENCES `calorias` (`calCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Informacoes_Porcao1` FOREIGN KEY (`porCodigo`) REFERENCES `porcao` (`porCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Informacoes_Tipos de Alimentos1` FOREIGN KEY (`tipCodigo`) REFERENCES `tipos_alimentos` (`tipCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `informacoes_dieta`
--
ALTER TABLE `informacoes_dieta`
ADD CONSTRAINT `fk_Informacoes_has_Dieta_Dieta1` FOREIGN KEY (`ind_dieCodigo`) REFERENCES `dieta` (`dieCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Informacoes_has_Dieta_Informacoes1` FOREIGN KEY (`ind_infCodigo`, `ind_infNome`, `ind_CalCodigo`, `ind_PorCodigo`, `ind_TipCodigo`) REFERENCES `informacoesnutricionais` (`infCodigo`, `infNome`, `calCodigo`, `porCodigo`, `tipCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
