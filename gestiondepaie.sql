-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 mai 2023 à 16:01
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
-- Structure de la table `diposer`
--

CREATE TABLE `diposer` (
  `id_ent` int(11) NOT NULL,
  `id_rub` int(11) NOT NULL,
  `regle_de_calcul` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `diposer`
--
ALTER TABLE `diposer`
  ADD PRIMARY KEY (`id_ent`,`id_rub`),
  ADD KEY `id_rub` (`id_rub`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `diposer`
--
ALTER TABLE `diposer`
  ADD CONSTRAINT `diposer_ibfk_1` FOREIGN KEY (`id_ent`) REFERENCES `entreprise` (`id_ent`),
  ADD CONSTRAINT `diposer_ibfk_2` FOREIGN KEY (`id_rub`) REFERENCES `rubrique` (`id_rub`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
