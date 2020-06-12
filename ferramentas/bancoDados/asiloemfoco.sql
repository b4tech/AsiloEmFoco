-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 02:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

create database asiloemfoco;
use asiloemfoco;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asiloemfoco`
--

-- --------------------------------------------------------

--
-- Table structure for table `asilo`
--

CREATE TABLE `asilo` (
  `idAsilo` int(9) NOT NULL,
  `razaoSocial` varchar(50) NOT NULL,
  `contatoId` int(9) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `enderecoId` int(8) NOT NULL,
  `loginId` int(8) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asilo`
--

INSERT INTO `asilo` (`idAsilo`, `razaoSocial`, `contatoId`, `cnpj`, `enderecoId`, `loginId`, `email`) VALUES
(1, 'Asilo Dev', 1, '49585168000103', 1, 2, 'asiloDev@b4.com');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(9) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `nota` int(1) NOT NULL,
  `asiloId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contato`
--

CREATE TABLE `contato` (
  `idContato` int(9) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `telefone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contato`
--

INSERT INTO `contato` (`idContato`, `tipo`, `telefone`) VALUES
(1, '1', '2154875421'),
(2, '', ''),
(3, '2', '11965329865'),
(4, '1', '1122223333'),
(5, '1', '1122223333'),
(6, '2', '1122223333');

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(9) NOT NULL,
  `cidade` varchar(28) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` int(5) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `estadoId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `cidade`, `logradouro`, `numero`, `cep`, `bairro`, `complemento`, `estadoId`) VALUES
(1, 'São Paulo[', 'Rua A', 123, '02154785', 'Bairro do Asilo', 'casa Dev', 25),
(2, 'Salvador', 'Rua B', 321, '02145785', 'Bairro do responsavel', 'casa 1', 5),
(3, 'São Paulo', 'Rua C', 231, '03265986', 'Bairro do funcionario', 'Casa B', 25),
(4, 'Salvador', 'Rua Teste', 990, '03232934', 'Bairro Teste', '', 5),
(5, 'Curitiba', 'Rua Teste', 123, '1234567', 'Bairro Teste', '', 16),
(6, 'Belo Horizonte', 'Rua Teste', 12345, '03820240', 'Bairro AA', '', 13);

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(9) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `nome` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`idEstado`, `sigla`, `nome`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraína'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Nort'),
(21, 'RS', 'Rio Grande do Sul'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocatins');

-- --------------------------------------------------------

--
-- Table structure for table `formacaofuncionario`
--

CREATE TABLE `formacaofuncionario` (
  `idFormacaoFuncionario` int(9) NOT NULL,
  `tipoFormacao` int(1) NOT NULL,
  `coren` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formacaofuncionario`
--

INSERT INTO `formacaofuncionario` (`idFormacaoFuncionario`, `tipoFormacao`, `coren`) VALUES
(1, 2, 'CORENSP213654');

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(9) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dataNasc` date NOT NULL,
  `contatoId` int(8) NOT NULL,
  `asiloId` int(8) NOT NULL,
  `enderecoId` int(8) NOT NULL,
  `formacaoId` int(8) NOT NULL,
  `loginId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nome`, `cpf`, `email`, `dataNasc`, `contatoId`, `asiloId`, `enderecoId`, `formacaoId`, `loginId`) VALUES
(1, 'Funcionário Da Silva', '32165498710', 'funcionarioDev@b4.com', '1978-10-10', 3, 1, 3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `idoso`
--

CREATE TABLE `idoso` (
  `idIdoso` int(9) NOT NULL,
  `dataNasc` date DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `responsavelId` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idoso`
--

INSERT INTO `idoso` (`idIdoso`, `dataNasc`, `cpf`, `nome`, `responsavelId`) VALUES
(2, '1500-12-10', '21398765410', 'Idoso da silva', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idLogin` int(9) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `confirmPassword` varchar(30) NOT NULL,
  `perfil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idLogin`, `username`, `password`, `confirmPassword`, `perfil`) VALUES
(1, 'adm', 'adm', 'adm', 0),
(2, 'asilo', 'asilo', 'asilo', 1),
(4, 'func', 'func', 'func', 3),
(7, 'resp', 'resp', 'resp', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prontuario`
--

CREATE TABLE `prontuario` (
  `idProntuario` int(9) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `idosoId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prontuario`
--

INSERT INTO `prontuario` (`idProntuario`, `descricao`, `data`, `hora`, `idosoId`) VALUES
(1, 'tomar Dipirona', '2020-06-09', '12:50:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `responsavel`
--

CREATE TABLE `responsavel` (
  `idResponsavel` int(9) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dataNasc` date NOT NULL,
  `contatoId` int(8) NOT NULL,
  `enderecoId` int(8) NOT NULL,
  `asiloId` int(8) DEFAULT NULL,
  `loginId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responsavel`
--

INSERT INTO `responsavel` (`idResponsavel`, `nome`, `cpf`, `email`, `dataNasc`, `contatoId`, `enderecoId`, `asiloId`, `loginId`) VALUES
(1, 'Responsável Teste atualiado', '11122233344', 'resp@resp.com', '1980-01-01', 6, 6, NULL, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asilo`
--
ALTER TABLE `asilo`
  ADD PRIMARY KEY (`idAsilo`),
  ADD KEY `contatoId` (`contatoId`),
  ADD KEY `enderecoId` (`enderecoId`),
  ADD KEY `loginId` (`loginId`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `asiloId` (`asiloId`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idContato`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `estadoId` (`estadoId`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indexes for table `formacaofuncionario`
--
ALTER TABLE `formacaofuncionario`
  ADD PRIMARY KEY (`idFormacaoFuncionario`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD KEY `asiloId` (`asiloId`),
  ADD KEY `contatoId` (`contatoId`),
  ADD KEY `enderecoId` (`enderecoId`),
  ADD KEY `formacaoId` (`formacaoId`),
  ADD KEY `loginId` (`loginId`);

--
-- Indexes for table `idoso`
--
ALTER TABLE `idoso`
  ADD PRIMARY KEY (`idIdoso`),
  ADD KEY `responsavelId` (`responsavelId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Indexes for table `prontuario`
--
ALTER TABLE `prontuario`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `idosoId` (`idosoId`);

--
-- Indexes for table `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`idResponsavel`),
  ADD KEY `contatoId` (`contatoId`),
  ADD KEY `enderecoId` (`enderecoId`),
  ADD KEY `asiloId` (`asiloId`),
  ADD KEY `loginId` (`loginId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asilo`
--
ALTER TABLE `asilo`
  MODIFY `idAsilo` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idAvaliacao` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `idContato` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `formacaofuncionario`
--
ALTER TABLE `formacaofuncionario`
  MODIFY `idFormacaoFuncionario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `idoso`
--
ALTER TABLE `idoso`
  MODIFY `idIdoso` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prontuario`
--
ALTER TABLE `prontuario`
  MODIFY `idProntuario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `idResponsavel` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
