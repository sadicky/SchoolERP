-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 28 nov. 2024 à 20:29
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_schoolerp`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_annee`
--

CREATE TABLE `tbl_annee` (
  `annee_id` int(11) NOT NULL,
  `annee` varchar(10) DEFAULT NULL,
  `statut` enum('1','0') DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tbl_annee`
--

INSERT INTO `tbl_annee` (`annee_id`, `annee`, `statut`, `created_at`, `updated_at`) VALUES
(6, '2020-2021', '1', '2024-11-28 19:27:47', '2024-11-28 19:27:47');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbl_annee`
--
ALTER TABLE `tbl_annee`
  ADD PRIMARY KEY (`annee_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbl_annee`
--
ALTER TABLE `tbl_annee`
  MODIFY `annee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
