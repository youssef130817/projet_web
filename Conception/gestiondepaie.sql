-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 juin 2023 à 22:21
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestiondepaie`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id_abs` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `date_debut_abs` date NOT NULL,
  `date_fin_abs` date NOT NULL,
  `nbr_heures` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `bulletin_paie`
--

CREATE TABLE `bulletin_paie` (
  `id_bp` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `date_paie` date NOT NULL,
  `salaire_net` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id_emp` int(11) NOT NULL,
  `etat` char(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `motdepasse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id_emp`, `etat`, `username`, `motdepasse`) VALUES
(1, '1', 'moussaoui@gmail.com', 'MouLei123'),
(2, '1', 'benali@gmail.com', 'BenMoh7596');

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `id_cg` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `statut_cg` varchar(50) NOT NULL,
  `date_debut_cg` date NOT NULL,
  `date_fin_cg` date NOT NULL,
  `commentaire` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `designation`
--

CREATE TABLE `designation` (
  `id_des` int(11) NOT NULL,
  `id_bp` int(11) NOT NULL,
  `libelle_des` varchar(50) NOT NULL,
  `montant_des` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `diposer`
--

CREATE TABLE `diposer` (
  `id_ent` int(11) NOT NULL,
  `id_rub` int(11) NOT NULL,
  `regle_de_calcul` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id_emp` int(11) NOT NULL,
  `nom_emp` varchar(26) NOT NULL,
  `prenom_emp` varchar(26) NOT NULL,
  `adresse_emp` varchar(200) NOT NULL,
  `cni_emp` varchar(10) NOT NULL,
  `num_cnss_emp` varchar(15) NOT NULL,
  `num_cimr_emp` varchar(15) NOT NULL,
  `email_emp` varchar(50) NOT NULL,
  `situation_fam` char(1) NOT NULL,
  `nbr_enfants_emp` char(1) NOT NULL,
  `salaire_base_emp` int(11) NOT NULL,
  `date_naissance_emp` date NOT NULL,
  `date_embauche_emp` date NOT NULL,
  `mode_paiement_emp` varchar(50) NOT NULL,
  `poste_emp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employee`
--

INSERT INTO `employee` (`id_emp`, `nom_emp`, `prenom_emp`, `adresse_emp`, `cni_emp`, `num_cnss_emp`, `num_cimr_emp`, `email_emp`, `situation_fam`, `nbr_enfants_emp`, `salaire_base_emp`, `date_naissance_emp`, `date_embauche_emp`, `mode_paiement_emp`, `poste_emp`) VALUES
(1, 'Moussaoui', 'Leila', 'Casablanca', 'F458896', 'X144756', 'LK78565', 'moussaoui@gmail.com', 'C', '0', 10000, '1990-12-03', '2019-09-10', 'Virement bancaire', 'Responsable RH'),
(2, 'Benali', 'Mohammed', 'Mohammedia', 'DS1456', 'CFL78552', 'SD88963', 'benali@gmail.com', 'M', '2', 15000, '1982-06-03', '2003-09-10', 'Virement bancaire', 'Comptable');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_ent` int(11) NOT NULL,
  `id_gr` int(11) DEFAULT NULL,
  `nom_ent` varchar(50) NOT NULL,
  `adresse_ent` varchar(200) NOT NULL,
  `num_cnss_ent` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_ent`, `id_gr`, `nom_ent`, `adresse_ent`, `num_cnss_ent`) VALUES
(1, 1, 'Hawai', 'casablanca', 'HWA1458'),
(2, 1, 'Poms', 'Casablanca', 'PM44785'),
(3, NULL, 'Involys', 'Casablanca', 'I477852'),
(4, 1, 'Coca-Cola', 'Casablanca', 'CC1456'),
(5, NULL, 'Pospay', 'Technopark Tanger, 2ème étage, Bureau N° T214, 90000\r\nTanger - 90000 - Maroc', 'DF44569'),
(7, NULL, 'TechSolutions', 'Agadir', 'TST5699'),
(19, 1, 'sprite', 'casablanca', 'SPR1456');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `Libelle_gr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id_groupe`, `Libelle_gr`) VALUES
(1, 'Coca-Cola');

-- --------------------------------------------------------

--
-- Structure de la table `heures_supp`
--

CREATE TABLE `heures_supp` (
  `id_hs` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `type_jour` char(1) NOT NULL,
  `nbr_heures` int(11) NOT NULL,
  `statut` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_rec` int(11) NOT NULL,
  `id_emp` int(11) NOT NULL,
  `sujet` varchar(500) NOT NULL,
  `respo_destine` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `responsable_rh`
--

CREATE TABLE `responsable_rh` (
  `id_rh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `responsable_rp`
--

CREATE TABLE `responsable_rp` (
  `id_rp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

CREATE TABLE `rubrique` (
  `id_rub` int(11) NOT NULL,
  `libelle_rub` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `travailler`
--

CREATE TABLE `travailler` (
  `id_emp` int(11) NOT NULL,
  `id_ent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_abs`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Index pour la table `bulletin_paie`
--
ALTER TABLE `bulletin_paie`
  ADD PRIMARY KEY (`id_bp`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id_emp`);

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD PRIMARY KEY (`id_cg`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Index pour la table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id_des`),
  ADD KEY `id_bp` (`id_bp`);

--
-- Index pour la table `diposer`
--
ALTER TABLE `diposer`
  ADD PRIMARY KEY (`id_ent`,`id_rub`),
  ADD KEY `id_rub` (`id_rub`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_emp`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_ent`),
  ADD KEY `id_gr` (`id_gr`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `heures_supp`
--
ALTER TABLE `heures_supp`
  ADD PRIMARY KEY (`id_hs`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_rec`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Index pour la table `responsable_rh`
--
ALTER TABLE `responsable_rh`
  ADD PRIMARY KEY (`id_rh`);

--
-- Index pour la table `responsable_rp`
--
ALTER TABLE `responsable_rp`
  ADD PRIMARY KEY (`id_rp`);

--
-- Index pour la table `rubrique`
--
ALTER TABLE `rubrique`
  ADD PRIMARY KEY (`id_rub`);

--
-- Index pour la table `travailler`
--
ALTER TABLE `travailler`
  ADD PRIMARY KEY (`id_emp`,`id_ent`),
  ADD KEY `id_ent` (`id_ent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_abs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `bulletin_paie`
--
ALTER TABLE `bulletin_paie`
  MODIFY `id_bp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `conges`
--
ALTER TABLE `conges`
  MODIFY `id_cg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `designation`
--
ALTER TABLE `designation`
  MODIFY `id_des` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_ent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `heures_supp`
--
ALTER TABLE `heures_supp`
  MODIFY `id_hs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_rec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `responsable_rh`
--
ALTER TABLE `responsable_rh`
  MODIFY `id_rh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `responsable_rp`
--
ALTER TABLE `responsable_rp`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rubrique`
--
ALTER TABLE `rubrique`
  MODIFY `id_rub` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employee` (`id_emp`);

--
-- Contraintes pour la table `bulletin_paie`
--
ALTER TABLE `bulletin_paie`
  ADD CONSTRAINT `bulletin_paie_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employee` (`id_emp`);

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `comptes_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employee` (`id_emp`);

--
-- Contraintes pour la table `conges`
--
ALTER TABLE `conges`
  ADD CONSTRAINT `conges_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employee` (`id_emp`);

--
-- Contraintes pour la table `designation`
--
ALTER TABLE `designation`
  ADD CONSTRAINT `designation_ibfk_1` FOREIGN KEY (`id_bp`) REFERENCES `bulletin_paie` (`id_bp`);

--
-- Contraintes pour la table `diposer`
--
ALTER TABLE `diposer`
  ADD CONSTRAINT `diposer_ibfk_1` FOREIGN KEY (`id_ent`) REFERENCES `entreprise` (`id_ent`),
  ADD CONSTRAINT `diposer_ibfk_2` FOREIGN KEY (`id_rub`) REFERENCES `rubrique` (`id_rub`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `entreprise_ibfk_1` FOREIGN KEY (`id_gr`) REFERENCES `groupe` (`id_groupe`);

--
-- Contraintes pour la table `heures_supp`
--
ALTER TABLE `heures_supp`
  ADD CONSTRAINT `heures_supp_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employee` (`id_emp`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employee` (`id_emp`);

--
-- Contraintes pour la table `responsable_rh`
--
ALTER TABLE `responsable_rh`
  ADD CONSTRAINT `responsable_rh_ibfk_1` FOREIGN KEY (`id_rh`) REFERENCES `employee` (`id_emp`);

--
-- Contraintes pour la table `responsable_rp`
--
ALTER TABLE `responsable_rp`
  ADD CONSTRAINT `responsable_rp_ibfk_1` FOREIGN KEY (`id_rp`) REFERENCES `employee` (`id_emp`);

--
-- Contraintes pour la table `travailler`
--
ALTER TABLE `travailler`
  ADD CONSTRAINT `travailler_ibfk_1` FOREIGN KEY (`id_emp`) REFERENCES `employee` (`id_emp`),
  ADD CONSTRAINT `travailler_ibfk_2` FOREIGN KEY (`id_ent`) REFERENCES `entreprise` (`id_ent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
