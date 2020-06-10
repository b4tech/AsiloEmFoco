-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2020 às 03:41
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `asiloemfoco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `asilo`
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
-- Extraindo dados da tabela `asilo`
--

INSERT INTO `asilo` (`idAsilo`, `razaoSocial`, `contatoId`, `cnpj`, `enderecoId`, `loginId`, `email`) VALUES
(1, 'Asilo Dev', 1, '49585168000103', 1, 2, 'asiloDev@b4.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(9) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `nota` int(1) NOT NULL,
  `asiloId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `idContato` int(9) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `telefone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`idContato`, `tipo`, `telefone`) VALUES
(1, '1', '2154875421'),
(2, '2', '11965326532'),
(3, '2', '11965329865');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
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
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `cidade`, `logradouro`, `numero`, `cep`, `bairro`, `complemento`, `estadoId`) VALUES
(1, 'São Paulo[', 'Rua A', 123, '02154785', 'Bairro do Asilo', 'casa Dev', 25),
(2, 'Salvador', 'Rua B', 321, '02145785', 'Bairro do responsavel', 'casa 1', 5),
(3, 'São Paulo', 'Rua C', 231, '03265986', 'Bairro do funcionario', 'Casa B', 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(9) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  `nome` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estado`
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
-- Estrutura da tabela `formacaofuncionario`
--

CREATE TABLE `formacaofuncionario` (
  `idFormacaoFuncionario` int(9) NOT NULL,
  `tipoFormacao` int(1) NOT NULL,
  `coren` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `formacaofuncionario`
--

INSERT INTO `formacaofuncionario` (`idFormacaoFuncionario`, `tipoFormacao`, `coren`) VALUES
(1, 2, 'CORENSP213654');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
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
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nome`, `cpf`, `email`, `dataNasc`, `contatoId`, `asiloId`, `enderecoId`, `formacaoId`, `loginId`) VALUES
(1, 'Funcionário Da Silva', '32165498710', 'funcionarioDev@b4.com', '1978-10-10', 3, 1, 3, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `idoso`
--

CREATE TABLE `idoso` (
  `idIdoso` int(9) NOT NULL,
  `dataNasc` date DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `responsavelId` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `idoso`
--

INSERT INTO `idoso` (`idIdoso`, `dataNasc`, `cpf`, `nome`, `responsavelId`) VALUES
(2, '1500-12-10', '21398765410', 'Idoso da silva', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idLogin` int(9) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `confirmPassword` varchar(30) NOT NULL,
  `perfil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idLogin`, `username`, `password`, `confirmPassword`, `perfil`) VALUES
(1, 'adm', 'adm', 'adm', 0),
(2, 'asilo', 'asilo', 'asilo', 1),
(3, 'resp', 'resp', 'resp', 2),
(4, 'func', 'func', 'func', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE `prontuario` (
  `idProntuario` int(9) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `idosoId` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `prontuario`
--

INSERT INTO `prontuario` (`idProntuario`, `descricao`, `data`, `hora`, `idosoId`) VALUES
(1, 'tomar Dipirona', '2020-06-09', '12:50:00', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel`
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
-- Extraindo dados da tabela `responsavel`
--

INSERT INTO `responsavel` (`idResponsavel`, `nome`, `cpf`, `email`, `dataNasc`, `contatoId`, `enderecoId`, `asiloId`, `loginId`) VALUES
(1, 'Responsável Da Silva', '32165498700', 'responsavelDev@b4.com', '1986-02-21', 2, 2, NULL, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `asilo`
--
ALTER TABLE `asilo`
  ADD PRIMARY KEY (`idAsilo`),
  ADD KEY `contatoId` (`contatoId`),
  ADD KEY `enderecoId` (`enderecoId`),
  ADD KEY `loginId` (`loginId`);

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `asiloId` (`asiloId`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`idContato`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `estadoId` (`estadoId`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Índices para tabela `formacaofuncionario`
--
ALTER TABLE `formacaofuncionario`
  ADD PRIMARY KEY (`idFormacaoFuncionario`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD KEY `asiloId` (`asiloId`),
  ADD KEY `contatoId` (`contatoId`),
  ADD KEY `enderecoId` (`enderecoId`),
  ADD KEY `formacaoId` (`formacaoId`),
  ADD KEY `loginId` (`loginId`);

--
-- Índices para tabela `idoso`
--
ALTER TABLE `idoso`
  ADD PRIMARY KEY (`idIdoso`),
  ADD KEY `responsavelId` (`responsavelId`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`);

--
-- Índices para tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD PRIMARY KEY (`idProntuario`),
  ADD KEY `idosoId` (`idosoId`);

--
-- Índices para tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD PRIMARY KEY (`idResponsavel`),
  ADD KEY `contatoId` (`contatoId`),
  ADD KEY `enderecoId` (`enderecoId`),
  ADD KEY `asiloId` (`asiloId`),
  ADD KEY `loginId` (`loginId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `asilo`
--
ALTER TABLE `asilo`
  MODIFY `idAsilo` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idAvaliacao` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `idContato` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `formacaofuncionario`
--
ALTER TABLE `formacaofuncionario`
  MODIFY `idFormacaoFuncionario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `idoso`
--
ALTER TABLE `idoso`
  MODIFY `idIdoso` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `prontuario`
--
ALTER TABLE `prontuario`
  MODIFY `idProntuario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `responsavel`
--
ALTER TABLE `responsavel`
  MODIFY `idResponsavel` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `asilo`
--
ALTER TABLE `asilo`
  ADD CONSTRAINT `asilo_ibfk_1` FOREIGN KEY (`contatoId`) REFERENCES `contato` (`idContato`) ON DELETE CASCADE,
  ADD CONSTRAINT `asilo_ibfk_2` FOREIGN KEY (`enderecoId`) REFERENCES `endereco` (`idEndereco`) ON DELETE CASCADE,
  ADD CONSTRAINT `asilo_ibfk_3` FOREIGN KEY (`loginId`) REFERENCES `login` (`idLogin`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`asiloId`) REFERENCES `asilo` (`idAsilo`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`estadoId`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`asiloId`) REFERENCES `asilo` (`idAsilo`) ON DELETE CASCADE,
  ADD CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`contatoId`) REFERENCES `contato` (`idContato`) ON DELETE CASCADE,
  ADD CONSTRAINT `funcionario_ibfk_3` FOREIGN KEY (`enderecoId`) REFERENCES `endereco` (`idEndereco`) ON DELETE CASCADE,
  ADD CONSTRAINT `funcionario_ibfk_4` FOREIGN KEY (`formacaoId`) REFERENCES `formacaofuncionario` (`idFormacaoFuncionario`) ON DELETE CASCADE,
  ADD CONSTRAINT `funcionario_ibfk_5` FOREIGN KEY (`loginId`) REFERENCES `login` (`idLogin`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `idoso`
--
ALTER TABLE `idoso`
  ADD CONSTRAINT `idoso_ibfk_1` FOREIGN KEY (`responsavelId`) REFERENCES `responsavel` (`idResponsavel`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD CONSTRAINT `prontuario_ibfk_1` FOREIGN KEY (`idosoId`) REFERENCES `idoso` (`idIdoso`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `responsavel`
--
ALTER TABLE `responsavel`
  ADD CONSTRAINT `responsavel_ibfk_1` FOREIGN KEY (`contatoId`) REFERENCES `contato` (`idContato`) ON DELETE CASCADE,
  ADD CONSTRAINT `responsavel_ibfk_2` FOREIGN KEY (`enderecoId`) REFERENCES `endereco` (`idEndereco`) ON DELETE CASCADE,
  ADD CONSTRAINT `responsavel_ibfk_3` FOREIGN KEY (`asiloId`) REFERENCES `asilo` (`idAsilo`) ON DELETE CASCADE,
  ADD CONSTRAINT `responsavel_ibfk_4` FOREIGN KEY (`loginId`) REFERENCES `login` (`idLogin`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
