-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 07 fév. 2022 à 16:15
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

CREATE TABLE `cour` (
  `idCour` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `lienImag` varchar(200) NOT NULL,
  `contenuCour` text NOT NULL,
  `idFormation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idFormation` int(11) NOT NULL,
  `nomFomration` varchar(50) NOT NULL,
  `idResponsable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `idHistorique` int(11) NOT NULL,
  `idCours` int(11) NOT NULL,
  `idVisiteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `idInscription` int(11) NOT NULL,
  `idFormation` int(11) NOT NULL,
  `idVisiteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `motDePass` varchar(100) NOT NULL,
  `genre` varchar(15) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `dateDeNaissance` date DEFAULT NULL,
  `CIN` varchar(12) DEFAULT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'visiteur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `email`, `motDePass`, `genre`, `telephone`, `dateDeNaissance`, `CIN`, `role`) VALUES
(1, 'sd', 'zfefz', 'wtfilms', '$2y$11$NunlzqMdDEHChdDlY4J9/eOGvQkbT6a.4tDetgHfnSUg/9xiz4kzu', NULL, NULL, NULL, NULL, 'visiteur'),
(4, 'KABBAJ', 'Mohammed', 'test@tes.test', '$2y$11$YRpOniOOV2ha7r5wAOGcyOUyILpaRpVxf/uCByfJAZ8XOL2An0aBW', NULL, NULL, NULL, NULL, 'visiteur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cour`
--
ALTER TABLE `cour`
  ADD PRIMARY KEY (`idCour`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`idHistorique`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`idInscription`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telephone` (`telephone`),
  ADD UNIQUE KEY `CIN` (`CIN`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cour`
--
ALTER TABLE `cour`
  MODIFY `idCour` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `idHistorique` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `idInscription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
