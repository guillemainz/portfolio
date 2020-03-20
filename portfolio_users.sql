-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 mars 2020 à 09:00
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio_users`
--

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(256) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `titre`, `contenu`, `user`) VALUES
(1, 'La légende du yidaki', 'Le concept de ce projet touche à un sujet qui me passionne depuis toujours: les contes et légendes du monde. La semaine a commencé par un cours et des exercices sur la facilitation graphique, ou l’art d’illustrer un texte par des dessins simples pour le rendre plus compréhensible. Puis on nous a dévoilé le but du projet: adapter des mythes de manière graphique et compréhensibles universellement. La tâche semble énorme, mais elle l’est un peu moins après avoir étudié l’évolution du langage écrit et de la pictographie dans différentes cultures.  <img src=\"img/yidaki.jpeg\"/>', 1),
(2, 'Campagne présidentielle à Floribia', 'Le projet scolaire qui vient de s’achever n’avait rien d’ordinaire. Cette semaine avait pour thème les fake news, mais portait en réalité sur des thèmes beaucoup plus vastes: la communication de masse, la gestion de crise… Et pour nous mettre dans un contexte professionnel, l’IUT a organisé un jeu de rôle grandeur nature. Cette semaine, nous avons donc participé à la campagne présidentielle de Floribia, un pays fictif d’Amérique du Sud.', 2),
(3, 'Match My Muesli', 'mymuesli est une entreprise allemande proposant un concept novateur: des mueslis complètement personnalisables. Leur objectif est de proposer un produit bio, bon et beau, qui soit adapté à tous les goûts. En effet, tous ses ingrédients sont 100% bio, produis localement dès que possible, et leurs emballages sont recyclés. L’entreprise est leader sur le marché du muesli en Allemagne, et souhaite s’implanter en France début 2020. Elle a donc fait appel aux étudiants de MMI pour lui proposer des campagnes de pub.', 3),
(6, 'Hors champ : travail sur un film des frères Cohen', 'Un mot, un extrait de film, un temps, et une consigne. C’est ce qu’on nous a donné pour ce projet. Le mot, ou plutôt le nom, était “Pete”; l’extrait était une scène de deux minutes du film “O Brother” des frères Cohen. Quant à la consigne, elle était simple: réaliser un film de trois minutes pouvant prendre place juste avant ou juste après l’extrait.', 2),
(7, 'OEknowledge: un jeu de rï¿½le sur l\'oenologie', 'Vingt-vingt: cï¿½est le thï¿½me et la seule consigne qui nous a ï¿½tï¿½ donnï¿½e pour ce projet ï¿½ ï¿½vingtï¿½ pouvant ï¿½tre remplacï¿½ par nï¿½importe quel homonyme. A partir de ce thï¿½me, nous avions une semaine et demi pour crï¿½er un jeu vidï¿½o, en dï¿½velopper les premiers niveaux, et le faire tester par des joueurs.  ', 1),
(8, 'UNESCO – Projet Lexi For Peace', 'Cette année, la rentrée en MMI a commencé fort: dans le cadre de notre semaine d’intégration, on nous a confié la tâche de réaliser un projet vidéo pour l’UNESCO. L’objectif de Lexi For Peace, qui s’inscrit dans le projet plus grand Writing Peace, consiste à illustrer des termes liés aux notions culturelles de paix, dans différents pays et cultures. Évidemment, tout n’est pas simple, car les mots que nous devions illustrer étaient des termes souvent intraduisibles, faisant référence à un concept original d’une culture particulière.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `description`) VALUES
(1, 'user1', 'user1', ' Ceci est la description du user 1; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed pellentesque libero, at ullamcorper leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent porta rhoncus nulla, et vestibulum diam tincidunt a. '),
(2, 'user2', 'user2', 'Ceci est la description du user 2; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed pellentesque libero, at ullamcorper leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent porta rhoncus nulla, et vestibulum diam tincidunt a.'),
(3, 'user3', 'user3', 'Ceci est la description du user 3; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed pellentesque libero, at ullamcorper leo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent porta rhoncus nulla, et vestibulum diam tincidunt a.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
