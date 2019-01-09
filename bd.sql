-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 24 fév. 2018 à 23:16
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `table`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `IDordre` int(9) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `message` varchar(1023) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chat`
--

INSERT INTO `chat` (`IDordre`, `pseudo`, `message`) VALUES
(20, 'eluis', 'Bonjour evrybody,');

-- --------------------------------------------------------

--
-- Structure de la table `Ecole`
--

CREATE TABLE `Ecole` (
  `Lieu` char(25) NOT NULL,
  `Domaine` char(25) NOT NULL,
  `NomEcole` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Ecole`
--

INSERT INTO `Ecole` (`Lieu`, `Domaine`, `NomEcole`) VALUES
('Bretagne', 'Informatique', 'Telecom Bretagne'),
('Lille', 'Telecom', 'Telecom Lille'),
('Nancy', 'Informatique', 'Telecom Nancy'),
('Saint-Etienne', 'informatique', 'Telecom Saint-Etienne'),
('Paris', 'Management', 'TEM'),
('Paris', 'Reseau', 'TSP');

-- --------------------------------------------------------

--
-- Structure de la table `Etudiants`
--

CREATE TABLE `Etudiants` (
  `idEtudiant` int(11) NOT NULL,
  `nom` char(25) NOT NULL,
  `prenom` char(25) NOT NULL,
  `age` int(11) NOT NULL,
  `Niveau` char(25) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `pwd` varchar(50) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `NomEcole` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Etudiants`
--

INSERT INTO `Etudiants` (`idEtudiant`, `nom`, `prenom`, `age`, `Niveau`, `email`, `pwd`, `pseudo`, `NomEcole`) VALUES
(29, 'LUIS', 'Evaristo', 20, '1er annee', 'ito.pinto18@gmail.com', '28b167c0f1de190ec0e7ca30c56b93f5', 'eluis', 'TSP');

-- --------------------------------------------------------

--
-- Structure de la table `Matieres`
--

CREATE TABLE `Matieres` (
  `nomMatiere` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Matieres`
--

INSERT INTO `Matieres` (`nomMatiere`) VALUES
('anglais'),
('FranÃ§ais'),
('Informatique'),
('Maths'),
('Reseau'),
('Telecom');

-- --------------------------------------------------------

--
-- Structure de la table `Proposer`
--

CREATE TABLE `Proposer` (
  `Niveau` char(25) DEFAULT NULL,
  `Creneau` varchar(25) DEFAULT NULL,
  `idEtudiant` int(11) NOT NULL,
  `nomMatiere` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `Proposer`
--

INSERT INTO `Proposer` (`Niveau`, `Creneau`, `idEtudiant`, `nomMatiere`) VALUES
('avance', '2h', 29, 'Informatique'),
('debutant', '3x dia', 29, 'Reseau');

-- --------------------------------------------------------

--
-- Structure de la table `Suivre`
--

CREATE TABLE `Suivre` (
  `idEtudiant` int(11) NOT NULL,
  `nomMatiere` char(25) NOT NULL,
  `etuprof` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`IDordre`),
  ADD KEY `titre` (`pseudo`);

--
-- Index pour la table `Ecole`
--
ALTER TABLE `Ecole`
  ADD PRIMARY KEY (`NomEcole`);

--
-- Index pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  ADD PRIMARY KEY (`idEtudiant`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_Etudiants_NomEcole` (`NomEcole`);

--
-- Index pour la table `Matieres`
--
ALTER TABLE `Matieres`
  ADD PRIMARY KEY (`nomMatiere`);

--
-- Index pour la table `Proposer`
--
ALTER TABLE `Proposer`
  ADD PRIMARY KEY (`idEtudiant`,`nomMatiere`),
  ADD KEY `FK_Proposer_nomMatiere` (`nomMatiere`);

--
-- Index pour la table `Suivre`
--
ALTER TABLE `Suivre`
  ADD PRIMARY KEY (`idEtudiant`,`nomMatiere`),
  ADD KEY `FK_Suivre_nomMatiere` (`nomMatiere`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `IDordre` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  MODIFY `idEtudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  ADD CONSTRAINT `FK_Etudiants_NomEcole` FOREIGN KEY (`NomEcole`) REFERENCES `Ecole` (`NomEcole`);

--
-- Contraintes pour la table `Proposer`
--
ALTER TABLE `Proposer`
  ADD CONSTRAINT `FK_Proposer_idEtudiant` FOREIGN KEY (`idEtudiant`) REFERENCES `Etudiants` (`idEtudiant`),
  ADD CONSTRAINT `FK_Proposer_nomMatiere` FOREIGN KEY (`nomMatiere`) REFERENCES `Matieres` (`nomMatiere`);

--
-- Contraintes pour la table `Suivre`
--
ALTER TABLE `Suivre`
  ADD CONSTRAINT `FK_Suivre_idEtudiant` FOREIGN KEY (`idEtudiant`) REFERENCES `Etudiants` (`idEtudiant`),
  ADD CONSTRAINT `FK_Suivre_nomMatiere` FOREIGN KEY (`nomMatiere`) REFERENCES `Matieres` (`nomMatiere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
