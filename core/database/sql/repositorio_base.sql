-- phpMyAdmin SQL Dump - NutriFácil

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";

CREATE DATABASE IF NOT EXISTS `repositorio_base`;
USE `repositorio_base`;

-- --------------------------------------------------------
-- Tabela posts (ATUALIZADA)
-- --------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `category1` varchar(100) NOT NULL,
  `category2` varchar(100) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `image_source` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `posts`
(`id`, `title`, `summary`, `category1`, `category2`, `image`, `image_alt`, `image_source`, `content`, `author`, `date`)
VALUES

(1,
'Alimentação Saudável no Dia a Dia',
'Dicas práticas para manter uma alimentação equilibrada na rotina.',
'alimentacao',
'dicas',
'public/img/667c34756aa6b.jpeg',
'Prato equilibrado com alimentos naturais',
'Banco de imagens',
'Manter uma alimentação saudável no dia a dia é um dos pilares para garantir qualidade de vida e bem-estar. Uma dieta equilibrada deve incluir variedade de alimentos naturais como frutas, legumes, verduras, proteínas e grãos integrais. Evitar ultraprocessados e planejar refeições ajuda a manter energia e saúde.',
'José Pereira Santos',
'2024-06-04'),

(2,
'A Importância das Proteínas',
'Entenda o papel das proteínas no corpo humano.',
'alimentacao',
'educacao',
'public/img/667c352595c75.jpeg',
'Alimentos ricos em proteína',
'Banco de imagens',
'As proteínas são essenciais para a construção muscular e reparação dos tecidos. Fontes incluem carnes magras, ovos, leguminosas e laticínios. Variar o consumo garante melhor aproveitamento nutricional.',
'Débora Ribeiro Nunes',
'2024-06-07'),

(3,
'Vitaminas Essenciais para o Corpo',
'Como as vitaminas contribuem para a saúde.',
'educacao',
NULL,
'public/img/667c355b5e33c.jpeg',
'Alimentos ricos em vitaminas',
'Banco de imagens',
'Vitaminas são fundamentais para o sistema imunológico e produção de energia. Frutas e vegetais coloridos são as melhores fontes naturais desses micronutrientes.',
'Sara Mendes Garcia',
'2024-06-07'),

(4,
'A Importância da Hidratação',
'Por que beber água é essencial.',
'bem-estar',
NULL,
'public/img/667c359f31dc9.jpeg',
'Copo de água com frutas',
'Banco de imagens',
'A hidratação regula funções vitais do corpo, melhora concentração e desempenho físico. Beber água ao longo do dia é um hábito indispensável.',
'Débora Ribeiro Nunes',
'2024-06-08'),

(5,
'Fibras e Saúde Digestiva',
'Benefícios das fibras na alimentação.',
'alimentacao',
'educacao',
'public/img/667c35f47dd8c.jpeg',
'Alimentos ricos em fibras',
'Banco de imagens',
'As fibras ajudam o funcionamento intestinal e controlam colesterol e glicose. Alimentos integrais e vegetais são fontes importantes.',
'Cristiano Matos Cardoso',
'2024-06-14'),

(6,
'Carboidratos: Vilões ou Aliados?',
'Entenda o papel dos carboidratos.',
'alimentacao',
'educacao',
'public/img/667c3630cf30a.jpeg',
'Alimentos fonte de carboidratos',
'Banco de imagens',
'Carboidratos fornecem energia ao corpo. Priorizar versões integrais garante melhor controle glicêmico.',
'Jonas Espíndola',
'2024-06-16'),

(7,
'Gorduras Boas para a Saúde',
'Saiba quais gorduras são benéficas.',
'alimentacao',
'bem-estar',
'public/img/667c368675180.jpeg',
'Alimentos com gorduras saudáveis',
'Banco de imagens',
'Gorduras boas ajudam na saúde cardiovascular. Azeite, abacate e castanhas são ótimas fontes.',
'Cristiano Matos Cardoso',
'2024-06-21'),

(8,
'Planejamento Alimentar Sem Complicação',
'Como organizar refeições da semana.',
'dicas',
'bem-estar',
'public/img/667c36b77208e.jpeg',
'Pessoa organizando refeições',
'Banco de imagens',
'O planejamento alimentar facilita escolhas saudáveis, economiza tempo e reduz impulsividade alimentar.',
'Vanessa Soares',
'2024-06-21'),

(9,
'Como Ler Rótulos de Alimentos',
'Guia para interpretar rótulos nutricionais.',
'educacao',
'dicas',
'public/img/667c370b98f8d.jpeg',
'Pessoa lendo rótulo nutricional',
'Banco de imagens',
'Ler rótulos ajuda a escolher alimentos mais saudáveis observando ingredientes, sódio e açúcar.',
'Débora Ribeiro Nunes',
'2024-06-26'),

(10,
'A Relação Entre Alimentação e Energia',
'Como a dieta influencia sua disposição.',
'bem-estar',
'alimentacao',
'public/img/667c372aa1f3e.jpeg',
'Refeição saudável balanceada',
'Banco de imagens',
'Uma alimentação equilibrada mantém níveis estáveis de energia e melhora produtividade.',
'Carlos Miguel Oliveira',
'2024-06-26');

-- --------------------------------------------------------
-- Tabela users
-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users`
(`id`, `name`, `email`, `password`, `cpf`, `phone`, `isAdmin`)
VALUES
(1, 'Admin', 'admin@example.com', 'password', '123.123.123-12', '(21) 34413-1676', 1),
(2, 'José Pereira Santos', 'jose@example.com', 'password', '457.584.326-87', '(45) 43575-6853', 0),
(3, 'Débora Ribeiro Nunes', 'deb@example.com', 'password', '926.730.956-44', '(12) 53563-4673', 0),
(4, 'Vanessa Soares', 'soares_vanessa@example.com', 'password', '872.359.740-99', '(11) 63264-8126', 0),
(5, 'Carlos Miguel Oliveira', 'carlim@example.com', 'password', '214.125.345-53', '(31) 34536-4356', 0),
(6, 'Maria Souza Nascimento', 'nasc@example.com', 'password', '125.678.075-64', '(09) 12352-7415', 0),
(7, 'Jonas Espíndola', 'jonas@example.com', 'password', '346.508.934-59', '(56) 36785-7858', 0),
(8, 'Sara Mendes Garcia', 'sara_mendes@example.com', 'password', '453.265.604-30', '(53) 62256-7245', 0),
(9, 'Cristiano Matos Cardoso', 'cr7@example.com', 'password', '340.564.705-46', '(61) 45236-3265', 0),
(10, 'Camila Peixoto', 'camila@example.com', 'password', '372.794.280-93', '(34) 68634-6873', 0);

COMMIT;
