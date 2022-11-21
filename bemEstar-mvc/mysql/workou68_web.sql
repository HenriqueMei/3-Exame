
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `curso` (`id_curso`, `nome`) VALUES
(1, 'medicina');

CREATE TABLE `exame` (
  `id_exame` int(11) NOT NULL,
  `_id_paciente` int(11) NOT NULL,
  `_id_usuario` int(11) NOT NULL,
  `data` date NOT NULL,
  `colesterol` int(11) NOT NULL,
  `pressao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `glicemia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `endereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `complemento` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nascimento` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `peso` int(11) NOT NULL,
  `altura` int(11) NOT NULL,
  `fuma` tinyint(1) NOT NULL,
  `bebe` tinyint(1) NOT NULL,
  `hipertensao` tinyint(1) NOT NULL,
  `diabete` tinyint(1) NOT NULL,
  `doenca_cardiaca` tinyint(1) NOT NULL,
  `outras_doencas` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medicacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `_id_curso` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nascimento` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `usuario` (`id_usuario`, `_id_curso`, `nome`, `nascimento`, `senha`, `perfil`, `status`) VALUES
(3, 1, 'Henrique Mei', '15/04/2001', 'e7d80ffeefa212b7c5c55700e4f7193e', 1, 1);

ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

ALTER TABLE `exame`
  ADD PRIMARY KEY (`id_exame`),
  ADD KEY `_id_paciente` (`_id_paciente`),
  ADD KEY `_id_usuario` (`_id_usuario`);

ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `_id_curso` (`_id_curso`);

ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `exame`
  MODIFY `id_exame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `exame`
  ADD CONSTRAINT `exame_ibfk_1` FOREIGN KEY (`_id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `exame_ibfk_2` FOREIGN KEY (`_id_usuario`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`_id_curso`) REFERENCES `curso` (`id_curso`);
COMMIT;
