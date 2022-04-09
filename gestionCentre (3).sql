-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 16 fév. 2022 à 16:16
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionCentre`
--

-- --------------------------------------------------------

--
-- Structure de la table `cour`
--

CREATE TABLE IF NOT EXISTS `cour` (
  `idCour` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `lienImag` varchar(200) NOT NULL,
  `contenuCour` text NOT NULL,
  `idFormation` int(11) NOT NULL,
  PRIMARY KEY (`idCour`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cour`
--

INSERT INTO `cour` (`idCour`, `titre`, `lienImag`, `contenuCour`, `idFormation`) VALUES
(1, 'ALGO', 'img', 'txt', 1),
(2, 'HTML', 'img', 'txt', 1),
(3, 'word', 'img', 'txt', 2);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `idFormation` int(11) NOT NULL AUTO_INCREMENT,
  `nomFomration` varchar(50) NOT NULL,
  `idResponsable` int(11) NOT NULL,
  PRIMARY KEY (`idFormation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`idFormation`, `nomFomration`, `idResponsable`) VALUES
(1, 'Formation web', 0),
(2, 'Formation Bureautique', 0);

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE IF NOT EXISTS `historique` (
  `idHistorique` int(11) NOT NULL AUTO_INCREMENT,
  `idCours` int(11) NOT NULL,
  `idVisiteur` int(11) NOT NULL,
  PRIMARY KEY (`idHistorique`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`idHistorique`, `idCours`, `idVisiteur`) VALUES
(1, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `idInscription` int(11) NOT NULL AUTO_INCREMENT,
  `idFormation` int(11) NOT NULL,
  `idVisiteur` int(11) NOT NULL,
  PRIMARY KEY (`idInscription`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`idInscription`, `idFormation`, `idVisiteur`) VALUES
(1, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `motDePass` varchar(100) NOT NULL,
  `genre` varchar(15) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `dateDeNaissance` date DEFAULT NULL,
  `CIN` varchar(12) DEFAULT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'visiteur',
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `telephone` (`telephone`),
  UNIQUE KEY `CIN` (`CIN`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `email`, `motDePass`, `genre`, `telephone`, `dateDeNaissance`, `CIN`, `role`) VALUES
(5, 'KABBAJ', 'Mohammed', 'test', '$2y$11$TdASnPEKLxf29bC9xnZAeuIoSgxgFzGh22LiMilzoYHGTxTmFsoeG', NULL, NULL, NULL, NULL, 'visiteur'),
(6, 'sd', 'zfefz', 'test@tes.test', '$2y$11$6U6jA2.CJSnzroN7mRD6uO5ZqSXRUyNCy.PmOdazM3jN4zRxrAsly', NULL, NULL, NULL, NULL, 'visiteur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
