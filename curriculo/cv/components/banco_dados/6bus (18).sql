-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11-Dez-2023 às 20:39
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Drop the table if it exists
DROP TABLE IF EXISTS `agente`;

-- Create the table with the new structure
CREATE TABLE IF NOT EXISTS `agente` (
  `id_agente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `tipo_vaga` varchar(255) NOT NULL,
  `sobre_mim` text NOT NULL,
  `formacao_academica` text NOT NULL,
  PRIMARY KEY (`id_agente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Insert example data into `agente`
INSERT INTO `agente` (`nome_completo`, `email`, `telefone`, `tipo_vaga`, `sobre_mim`, `formacao_academica`) VALUES
('Lucas Almeida', 'lucas.almeida@example.com', '11987654321', 'Junior', 'Proativo, engajado e sempre buscando inovação.', 'Cursando Tecnico em informática'),
('Mariana Ribeiro', 'mariana.ribeiro@example.com', '21965432198', 'Estagiário', 'Empenhada e focada em crescimento pessoal e profissional.', 'Cursando Direito'),
('João Pedro Martins', 'joao.pedro@example.com', '31987612345', 'Pleno', 'Dedicado e com grande capacidade de liderança.', 'Cursando Ensino Médio'),
('Clara Gonçalves', 'clara.goncalves@example.com', '41998765432', 'Sênior', 'Expertise em gerenciamento de projetos com foco em TI.', 'Cursando ensino medio'),
('Rafael Costa', 'rafael.costa@example.com', '51987654321', 'Junior', 'Jovem entusiasta das novas tecnologias.', 'Cursando Letras'),
('Fernanda Lima', 'fernanda.lima@example.com', '21987654321', 'Pleno', 'Experiência em vendas e atendimento ao cliente.', 'Curando Vendas'),
('Lucas Almeida', 'lucas.almeida@example.com', '11987654321', 'Junior', 'Proativo, engajado e sempre buscando inovação.', 'Cursando Tecnico em informática'),
('Clara Gonçalves', 'clara.goncalves@example.com', '41998765432', 'Sênior', 'Expertise em gerenciamento de projetos com foco em TI.', 'Cursando ensino medio'),
('João Pedro Martins', 'joao.pedro@example.com', '31987612345', 'Pleno', 'Dedicado e com grande capacidade de liderança.', 'Cursando Ensino Médio'),
('Carlos Eduardo Souza', 'carlos.eduardo@example.com', '31987654321', 'Estagiário', 'Interessado por inovação e tecnologia.', 'Cursando Ciência da Computação'),
('Fernanda Rocha',	'fernanda.rocha@example.com',	'11987654327',	'Assistente de RH',	'Empática, organizada e com boas habilidades interpessoais.',	'Curso Técnico em Recursos Humanos'),
('Tiago Fernandes',	'tiago.fernandes@example.com',	'11987654328',	'Trainee',	'Flexível, atento aos detalhes e bom em trabalho em equipe.',	'Ensino Médio Técnico em Contabilidade'),
('Camila Santos',	'camila.santos@example.com',	'11987654329',	'Estagiário',	'Motivada, determinada e com grande interesse em tecnologia.',	'Técnico em Redes de Computadores'),
('Gustavo Mendes',	'gustavo.mendes@example.com',	'11987654330',	'Aprendiz',	'Atencioso, proativo e com boas habilidades de negociação.',	'Ensino Médio Completo'),
('Ana Silva', 'ana.silva@example.com',	'11987654321',	'Estagiário',	'Dinâmica, comunicativa e sempre disposta a aprender.',	'Ensino Médio Completo');


DROP TABLE IF EXISTS `responsavel`;

-- Create the table with the new structure
CREATE TABLE IF NOT EXISTS `responsavel` (
  `id_responsavel` int(11) NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `tipo_vaga` varchar(255) NOT NULL,
  `sobre_mim` text NOT NULL,
  `formacao_academica` text NOT NULL,
  `experiencia_profissional` text NOT NULL,
  `caminho_foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_responsavel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `responsavel` (`nome_completo`, `email`, `telefone`, `tipo_vaga`, `sobre_mim`, `formacao_academica`, `experiencia_profissional`) VALUES
('Ana Silva', 'ana.silva@gmail.com', '11987654321', 'Junior', 'Detalhada e proativa.', 'Ensino medio imcompleto', 'vendedora de loja'),
('Lucas Martins', 'lucas.martins@example.com', '11987654321', 'Junior', 'Proativo e sempre buscando aprender mais.', 'Ensino medio completo', '3 anos caixa de super mercado'),
('Maria Clara', 'maria.clara@example.com', '12987654322', 'Senior', 'Experiencia em limpesa.', 'Ensino fundamental incompleto', ' faxineira '),
('Roberto Dias', 'roberto.dias@example.com', '19987654329', 'Junior', ' Proativo ', 'Ensino fundamental completo', '3 anos de experiencia em projetos mecanicos'),
('Joao Martins', 'joao.martins@example.com', '21987654321', 'Auxiliar de Servicos Gerais', 'Dedicado e pontual, com interesse em crescimento profissional.', 'Ensino Fundamental Completo', 'Experiencia como ajudante geral em eventos'),
('Mariana Costa', 'mariana.costa@example.com', '22987654322', 'Recepcionista', 'Comunicativa e proativa, buscando primeira oportunidade de emprego.', 'Ensino Medio Cursando', 'Sem experiencia'),
('Carlos Nunes', 'carlos.nunes@example.com', '23987654323', 'Auxiliar de Cozinha', 'Apaixonado por culinaria e disposto a aprender.', 'Ensino Fundamental Incompleto', 'Experiencia informal ajudando em cozinha de restaurante familiar'),
('Leticia Barros', 'leticia.barros@example.com', '24987654324', 'Vendedora', 'Entusiasmada com atendimento ao publico e vendas.', 'Ensino Medio Completo', 'Sem experiencia formal, mas realizo vendas como autonoma'),
('Patricia Lemos', 'patricia.lemos@example.com', '20987654330', 'Estagiario', 'Interessada por design e artes visuais.', 'Cursando Artes Visuais', 'sem experiencia'),
('Felipe Dias', 'felipe.dias@example.com', '27987654327', 'Operador de Caixa', 'Pratico e rapido, com bom relacionamento interpessoal.', 'Ensino Medio Cursando', 'Sem experiencia formal, mas com pratica em atendimento em feiras'),
('Bianca Lima', 'bianca.lima@example.com', '28987654328', 'Atendente de Telemarketing', 'Comunicativa e paciente, pronta para enfrentar desafios em novos ambientes.', 'Ensino Medio Incompleto', 'Sem experiencia profissional previa'),
('Ricardo Gomes', 'ricardo.gomes@example.com', '29987654329', 'Montador', 'Detalhista e com boa capacidade de seguir instrucoes.', 'Ensino Fundamental Completo', 'Experiencia em montagem de moveis por conta propria'),
('Luiza Fernandes', 'luiza.fernandes@example.com', '30987654330', 'Baba', 'Cuidadosa e carinhosa, adoro crianças e tenho experiencia com cuidado infantil.', 'Ensino Medio Completo', 'Experiencia informal cuidando de criancas na vizinhanca');


