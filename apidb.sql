-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le :  lun. 20 avr. 2020 à 08:32
-- Version du serveur :  10.2.14-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `apidb`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions_id` int(11) NOT NULL,
  `channel` enum('faq','bot') COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_50D0C606BCB134CE` (`questions_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id`, `questions_id`, `channel`, `body`) VALUES
(1, 1, 'bot', '<p>Ajout Q&A par l\'API</p>'),
(2, 5, 'faq', '<p>Ajout Q&A par l\'API 7</p>'),
(3, 6, 'faq', '<p>Ajout Q&A par l\'API 8</p>'),
(4, 7, 'faq', '<p>Ajout Q&A par l\'API 8</p>'),
(5, 8, 'faq', '<p>Ajout Q&A par l\'API 8</p>'),
(6, 9, 'faq', '<p>Ajout Q&A par l\'API 18</p>'),
(7, 10, 'faq', '<p>Ajout Q&A par l\'API 18</p>'),
(8, 11, 'bot', '<p>grgrrogkrkgg</p>'),
(9, 12, 'bot', '<p>grgrrogkrkgg</p>'),
(10, 13, 'bot', '<p>grgrrogkrkgg</p>'),
(11, 14, 'bot', '<p>grgrrogkrkgg</p>'),
(12, 15, 'bot', '<p>hhr rhtjjythr cssg</p>'),
(13, 16, 'bot', '<p>grgrrogkrkgg</p>'),
(14, 17, 'faq', '<p>grg hgrugurgij krkgg</p>');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200417003252', '2020-04-17 00:50:48'),
('20200418144038', '2020-04-18 14:43:57');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promoted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `title`, `promoted`, `created`, `status`) VALUES
(1, 'Ajout Q&A par l\'API', 0, '2020-04-17 03:15:08', 'draft'),
(2, 'Ajout Q&A par l\'API 2', 1, '2020-04-17 03:19:39', 'draft'),
(3, 'Ajout Q&A par l\'API', 0, '2020-04-17 03:24:35', 'draft'),
(4, 'Ajout Q&A par l\'API', 0, '2020-04-17 03:25:48', 'draft'),
(5, 'Ajout Q&A par l\'API 7', 0, '2020-04-17 03:27:41', 'draft'),
(6, 'Ajout Q&A par l\'API 8', 1, '2020-04-17 03:38:10', 'draft'),
(7, 'Ajout Q&A par l\'API 8', 1, '2020-04-17 03:46:08', 'draft'),
(8, 'Ajout Q&A par l\'API 8', 1, '2020-04-17 03:46:15', 'draft'),
(9, 'Ajout Q&A par l\'API 0000', 0, '2020-04-17 05:55:38', 'draft'),
(10, 'Ajout Q&A par l\'API 578892', 1, '2020-04-17 06:39:07', 'draft'),
(11, 'Ajout Q&A par l\'API 47800', 0, '2020-04-17 06:09:43', 'published'),
(12, 'Ajout feQA par l\'API 47800', 0, '2020-04-17 06:48:33', 'published'),
(13, 'Ajout feQA par l\'API 47800', 0, '2020-04-17 06:48:49', 'published'),
(14, 'AjouUt QA par l\'API 7450', 1, '2020-04-18 14:48:33', 'draft'),
(15, 'Ajout Q&A par l\'API 010010110', 1, '2020-04-18 06:05:40', 'published'),
(16, 'Ajout feQA par l\'API 47800', 0, '2020-04-18 10:41:16', 'published'),
(17, 'Ajout feQA par l\'API 47800', 0, '2020-04-18 10:49:05', 'published');

-- --------------------------------------------------------

--
-- Structure de la table `question_historic`
--

DROP TABLE IF EXISTS `question_historic`;
CREATE TABLE IF NOT EXISTS `question_historic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `question_historic`
--

INSERT INTO `question_historic` (`id`, `title`, `status`, `updated`) VALUES
(1, 'Ajout QA par l\'API 7450', NULL, '2020-04-18 15:28:03'),
(2, 'Ajout QA par l\'API 7450', 'published', '2020-04-18 15:40:37'),
(3, 'Ajout QA par l\'API 7450', 'published', '2020-04-18 15:41:37'),
(4, 'Ajout QA par l\'API 7450', 'published', '2020-04-18 15:43:11'),
(5, 'Ajout QA par l\'API 7450', 'published', '2020-04-18 15:45:27'),
(6, 'Ajout QA par l\'API 7450', 'published', '2020-04-18 15:45:50'),
(7, 'Ajout QA par l\'API 7450', 'published', '2020-04-18 15:48:10'),
(8, 'Ajout QA par l\'API 7450', 'published', '2020-04-18 15:53:26'),
(9, 'Ajout QA par l\'API 7450', 'published', '2020-04-18 15:55:45'),
(10, 'Ajout QA par l\'API 7450', 'draft', '2020-04-18 15:57:56');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `FK_50D0C606BCB134CE` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
