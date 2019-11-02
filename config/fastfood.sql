-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Nov-2019 às 22:13
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastfood`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_categorias`
--

CREATE TABLE `tab_categorias` (
  `codCat` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_categorias`
--

INSERT INTO `tab_categorias` (`codCat`, `nome`) VALUES
(1, 'Hamburguers'),
(2, 'Saladas'),
(3, 'Bebidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_conta`
--

CREATE TABLE `tab_conta` (
  `codConta` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `forGarcom` int(10) NOT NULL,
  `pedido` varchar(250) NOT NULL,
  `forMesa` int(5) NOT NULL,
  `dtAbertura` datetime NOT NULL,
  `valorTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_conta`
--

INSERT INTO `tab_conta` (`codConta`, `status`, `forGarcom`, `pedido`, `forMesa`, `dtAbertura`, `valorTotal`) VALUES
(37, 1, 2, 'coca,cavia,sorvete,flango,baiÃµa,macarÃ£o', 1, '2017-06-14 15:13:49', '317.00'),
(38, 0, 2, 'coca ,cafe', 2, '2017-06-14 15:15:56', '4.00'),
(39, 0, 1, 'coca,sorvete,mesa', 3, '2017-06-14 16:00:39', '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_mesas`
--

CREATE TABLE `tab_mesas` (
  `codMesa` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_produtos`
--

CREATE TABLE `tab_produtos` (
  `codProd` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `img` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `forCategoria` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_produtos`
--

INSERT INTO `tab_produtos` (`codProd`, `nome`, `img`, `valor`, `forCategoria`, `data`) VALUES
(17, 'Big Mac', '1494798814.jpg', '27.00', 1, '2017-05-14'),
(18, 'Carne e Queijo', '1494798878.jpg', '33.00', 1, '2017-05-14'),
(19, 'Frango Ranch', '1494799011.jpg', '22.00', 2, '2017-05-14'),
(20, 'Coca Cola', '1494799080.jpg', '3.00', 3, '2017-05-14'),
(21, 'Pepsi', '1494799135.jpg', '3.20', 3, '2017-05-14'),
(25, 'Salada de Frango', '1495160853.jpg', '19.00', 2, '2017-05-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `codUsu` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `dt_nasc` varchar(12) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `cpf` varchar(25) NOT NULL,
  `rg` varchar(25) NOT NULL,
  `escolaridade` varchar(100) NOT NULL,
  `login` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `perfil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_usuario`
--

INSERT INTO `tab_usuario` (`codUsu`, `nome`, `dt_nasc`, `fone`, `endereco`, `cpf`, `rg`, `escolaridade`, `login`, `senha`, `perfil`) VALUES
(1, 'carlos jonas', '1999-03-27', '(85) 9886-5100', 'Rua walter pompeu n25', '000.000.000-00', '000.000.000-0', 'Ensino Superior', 'CARLOS_JONAS', '123', 1),
(2, 'Douglas Araujo', '1999-03-27', '(85) 8888-8888', 'Rua Teste n123', '000.000.000-00', '000.000.000-0', 'Ensino Fundamental', 'DOUGLAS_ARAUJO', '123', 0),
(4, 'Milton paiva', '2112-03-12', '(34) 4444-4444', 'calito pomplona', '333.333.333-33', '222.222.222-2', 'Ensino Superior', 'MILTON_PAIVA', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_categorias`
--
ALTER TABLE `tab_categorias`
  ADD PRIMARY KEY (`codCat`);

--
-- Indexes for table `tab_conta`
--
ALTER TABLE `tab_conta`
  ADD PRIMARY KEY (`codConta`);

--
-- Indexes for table `tab_mesas`
--
ALTER TABLE `tab_mesas`
  ADD PRIMARY KEY (`codMesa`);

--
-- Indexes for table `tab_produtos`
--
ALTER TABLE `tab_produtos`
  ADD PRIMARY KEY (`codProd`);

--
-- Indexes for table `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`codUsu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_categorias`
--
ALTER TABLE `tab_categorias`
  MODIFY `codCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tab_conta`
--
ALTER TABLE `tab_conta`
  MODIFY `codConta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tab_mesas`
--
ALTER TABLE `tab_mesas`
  MODIFY `codMesa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_produtos`
--
ALTER TABLE `tab_produtos`
  MODIFY `codProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `codUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
