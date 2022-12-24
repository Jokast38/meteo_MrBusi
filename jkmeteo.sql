-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 24 déc. 2022 à 19:23
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jkmeteo`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `username`, `mdp`, `Email`, `name`) VALUES
(1, 'admin', 'coco', 'admin.jkmeteo@f2i.fr', 'Admin'),
(2, 'jojo', 'jojo', 'jojo.jkmeteo@f2i.fr', 'Jokast');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id_v` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(100) NOT NULL,
  `id_u` int(11) NOT NULL,
  PRIMARY KEY (`id_v`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id_v`, `ville`, `id_u`) VALUES
(1, 'Vincennes', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mdpreset`
--

DROP TABLE IF EXISTS `mdpreset`;
CREATE TABLE IF NOT EXISTS `mdpreset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `code` int(6) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`,`code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mdpreset`
--

INSERT INTO `mdpreset` (`id`, `mail`, `code`, `mdp`) VALUES
(1, 'admin.jkmeteo@f2i.fr', 0, 'admin'),
(2, 'jojo.jkmeteo@f2i.fr', 0, 'jojo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
