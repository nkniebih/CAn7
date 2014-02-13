-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 13 Février 2014 à 19:13
-- Version du serveur :  5.6.15
-- Version de PHP :  5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `site_categorie`
--

CREATE TABLE IF NOT EXISTS `site_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `remarque` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `site_categorie`
--

INSERT INTO `site_categorie` (`id`, `auteur`, `nom`, `remarque`) VALUES
(6, 'okl', ' ', NULL),
(7, 'nom1', 'son', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `site_client`
--

CREATE TABLE IF NOT EXISTS `site_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `organisation` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `codepostale` int(11) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `site_client`
--

INSERT INTO `site_client` (`id`, `auteur`, `nom`, `organisation`, `email`, `telephone`, `adresse`, `codepostale`, `ville`) VALUES
(1, 'auteur', 'Nom', NULL, 'toto@can7.fr', NULL, NULL, NULL, NULL),
(2, 'lkjklj', 'klmk', NULL, 'EEE@eee.fr', NULL, NULL, NULL, NULL),
(3, 'root', 'Nicolas', 'CAn7', 'nicolas.kniebihli@gmail.com', '0123456789', '48 rue Bonnat', 50000, 'Toulouse'),
(4, 'toto', 'ttoo', NULL, 'ttt@tot.com', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `site_materiel`
--

CREATE TABLE IF NOT EXISTS `site_materiel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` float DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `dateAjout` datetime NOT NULL,
  `remarque` varchar(255) DEFAULT NULL,
  `puissance` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `poids` float DEFAULT NULL,
  `reparation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Contenu de la table `site_materiel`
--

INSERT INTO `site_materiel` (`id`, `auteur`, `nom`, `prix`, `quantite`, `dateAjout`, `remarque`, `puissance`, `id_categorie`, `image`, `poids`, `reparation`) VALUES
(65, 'auteur', 'nom', NULL, NULL, '2014-02-11 16:02:37', '', NULL, 6, 'upload/materiel/nom.jpg', NULL, NULL),
(66, 'hoi', 'jhk', 98.5, NULL, '2014-02-11 16:34:09', '', NULL, 6, NULL, NULL, NULL),
(67, 'toto', 'nom', 44.6, 10, '2014-02-11 17:03:59', '', 30, 6, NULL, 56.4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `site_news`
--

CREATE TABLE IF NOT EXISTS `site_news` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `auteur` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `titre` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `contenu` text COLLATE latin1_general_ci NOT NULL,
  `dateAjout` datetime NOT NULL,
  `dateModif` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

--
-- Contenu de la table `site_news`
--

INSERT INTO `site_news` (`id`, `auteur`, `titre`, `contenu`, `dateAjout`, `dateModif`) VALUES
(2, 'auteur2', 'titre2', 'contenu2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'kkkkkllklk', 'klklm', 'klmkm', '2014-01-15 16:39:00', '2014-01-15 16:50:37'),
(4, '3', '3', '3', '2014-01-26 14:36:08', '2014-01-26 14:36:08'),
(5, '4', '4', '\r\n4', '2014-01-26 14:36:22', '2014-01-26 14:36:22'),
(6, '5', '5', '5', '2014-01-26 14:36:28', '2014-01-26 14:36:28'),
(7, '6', '6', '6', '2014-01-26 14:36:36', '2014-01-26 14:36:36'),
(8, '7', '7', '7', '2014-01-26 14:37:09', '2014-01-26 14:37:09'),
(9, '8', '8', '8', '2014-01-26 14:37:15', '2014-01-26 14:37:15'),
(10, '9', '9', '9', '2014-01-26 14:37:21', '2014-01-26 14:37:21'),
(11, '5', '5', '3', '2014-01-26 15:38:02', '2014-01-26 15:38:02'),
(12, '5', '5', '3', '2014-01-26 16:08:38', '2014-01-26 16:08:38'),
(13, 'ff', 'hjkh', 'lkj', '2014-01-26 16:08:54', '2014-01-26 16:08:54'),
(14, 'test', 'test', 'fffd', '2014-01-26 16:10:24', '2014-01-26 16:10:24'),
(15, 'joijlkjlkj', 'test', 'djkhjhklm', '2014-01-26 16:11:28', '2014-01-26 18:07:32'),
(16, 'dddddddd', 'jmlkj', 'kjlkjljkm', '2014-01-26 16:11:57', '2014-01-26 17:55:03'),
(17, 'auteur 20', 'Titre 20', 'contenu20', '2014-01-27 12:37:29', '2014-01-27 12:37:29'),
(18, 'auteur 30', 'titre 30', 'contenukjlkl', '2014-01-27 12:39:07', '2014-01-27 13:07:30'),
(19, 'ijij', 'giuh', 'khjkj', '2014-01-27 13:08:06', '2014-01-28 19:22:08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
