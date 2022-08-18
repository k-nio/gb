-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10-Dez-2021 às 17:46
-- Versão do servidor: 8.0.27
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`) VALUES
(1, 'Cesar', 'cesar@celke.com.br'),
(2, 'Kelly', 'kelly@celke.com.br'),
(3, 'Gabrielly Teste', 'gabrielly@celke.com.br'),
(4, 'Marcos', 'marcos@celke.com.br'),
(5, 'Cesar1', 'cesar1@celke.com.br'),
(6, 'Jessica1', 'jessica1@celke.com.br'),
(7, 'Marcos1', 'marcos1@celke.com.br'),
(8, 'Cesar2', 'cesar2@celke.com.br'),
(9, 'Jessica2', 'jessica2@celke.com.br'),
(10, 'Marcos2', 'marcos2@celke.com.br'),
(11, 'Cesar3', 'cesar3@celke.com.br'),
(12, 'Jessica3', 'jessica3@celke.com.br'),
(13, 'Marcos3', 'marcos3@celke.com.br'),
(14, 'Cesar4', 'cesar4@celke.com.br'),
(15, 'Jessica4', 'jessica4@celke.com.br'),
(16, 'Marcos4', 'marcos4@celke.com.br'),
(17, 'Cesar5', 'cesar5@celke.com.br'),
(18, 'Jessica5', 'jessica5@celke.com.br'),
(19, 'Marcos5', 'marcos5@celke.com.br'),
(20, 'Cesar6', 'cesar6@celke.com.br'),
(21, 'Jessica6', 'jessica6@celke.com.br'),
(22, 'Marcos6', 'marcos6@celke.com.br'),
(23, 'Cesar7', 'cesar7@celke.com.br'),
(24, 'Jessica7', 'jessica7@celke.com.br'),
(25, 'Marcos7', 'marcos7@celke.com.br'),
(26, 'Cesar8', 'cesar8@celke.com.br'),
(27, 'Jessica8', 'jessica8@celke.com.br'),
(28, 'Marcos8', 'marcos8@celke.com.br'),
(29, 'Cesar9', 'cesar9@celke.com.br'),
(30, 'Jessica9', 'jessica9@celke.com.br'),
(31, 'Marcos9', 'marcos9@celke.com.br'),
(32, 'Cesar10', 'cesar10@celke.com.br'),
(33, 'Jessica10', 'jessica10@celke.com.br'),
(34, 'Marcos10', 'marcos10@celke.com.br');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
