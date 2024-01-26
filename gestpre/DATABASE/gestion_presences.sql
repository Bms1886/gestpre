-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 08 déc. 2023 à 15:03
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_presences`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse_e_mail` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `nom`, `prenom`, `adresse_e_mail`, `mot_de_passe`) VALUES
(1, 'admin@admin.com', 'admin', 'admin@admin.com', '$2y$10$phTt8dzB.vPYfTAuQdciFu8ZqglTaATmW3h.Sw9GIGgJnpDGGeLFS');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse_e_mail` varchar(255) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `filiere` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `prenom`, `adresse_e_mail`, `matricule`, `filiere`, `niveau`) VALUES
(1, 'Guinley', 'Bamos', 'bmsb@gmail.com', '0013', 'SIL', 'Licence '),
(4, 'Sounouvou', 'Richaard', 'sn@gmail.com', 'A0012', 'SIL', 'Licence 2'),
(6, 'SEWANOU', 'Perez', 'pp@gmail.com', 'GG005', 'SIL', 'Licence 2'),
(7, 'ATINDEHOU', 'Joanita', 'joanitaatindehou@gmail.com', '808040', 'RIT2', 'Licence2');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code_matiere` varchar(255) NOT NULL,
  `enseignant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `nom`, `code_matiere`, `enseignant`) VALUES
(1, 'Dev web', 'DEV100', 'Charly');

-- --------------------------------------------------------

--
-- Structure de la table `presences`
--

CREATE TABLE `presences` (
  `id` int(11) NOT NULL,
  `nom_matiere` varchar(250) DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `id_etudiant` varchar(200) NOT NULL,
  `nom_etudiant` varchar(250) DEFAULT NULL,
  `prenom_etudiant` varchar(250) DEFAULT NULL,
  `datepre` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `presences`
--

INSERT INTO `presences` (`id`, `nom_matiere`, `heure_debut`, `heure_fin`, `id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `datepre`) VALUES
(223, 'Dev web', '01:01:00', '01:01:00', '1', 'Guinley', 'Bamos', '2023-12-03'),
(224, 'Dev web', '01:01:00', '01:01:00', '2', 'Guinley', 'Bienvenu', '2023-12-03'),
(225, 'Dev web', '01:01:00', '01:01:00', '1', 'Guinley', 'Bamos', '2023-12-03'),
(226, 'Dev web', '01:01:00', '01:01:00', '2', 'Guinley', 'Bienvenu', '2023-12-03'),
(227, 'Dev web', '12:40:00', '12:40:00', '1', 'Guinley', 'Bamos', '2023-12-04'),
(228, 'Dev web', '12:40:00', '12:40:00', '2', 'Guinley', 'Bienvenu', '2023-12-04'),
(229, 'Dev web', '12:40:00', '12:40:00', '4', 'Sounouvou', 'Richaard', '2023-12-04'),
(230, 'Dev web', '13:29:00', '13:29:00', '4', 'Sounouvou', 'Richaard', '2023-12-04'),
(231, 'Dev web', '13:29:00', '13:29:00', '6', 'SEWANOU', 'Perez', '2023-12-04'),
(232, 'Dev web', '16:14:00', '16:14:00', '1', 'Guinley', 'Bamos', '2023-12-05'),
(233, 'Dev web', '16:14:00', '16:14:00', '4', 'Sounouvou', 'Richaard', '2023-12-05'),
(234, 'Dev web', '16:14:00', '16:14:00', '6', 'SEWANOU', 'Perez', '2023-12-05'),
(235, 'Dev web', '16:14:00', '16:14:00', '7', 'ATINDEHOU', 'Joanita', '2023-12-05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `presences`
--
ALTER TABLE `presences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
