-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 28 nov. 2024 à 22:41
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
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2024-2025', '1', '2024-11-28 19:36:49', '2024-11-28 19:36:49');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category_frais`
--

CREATE TABLE `tbl_category_frais` (
  `category_frais_id` int(11) NOT NULL,
  `category_name` varchar(90) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category_note`
--

CREATE TABLE `tbl_category_note` (
  `category_note_id` int(11) NOT NULL,
  `category_note` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category_options`
--

CREATE TABLE `tbl_category_options` (
  `category_option_id` int(11) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_category_prime`
--

CREATE TABLE `tbl_category_prime` (
  `category_prime_id` int(11) NOT NULL,
  `category_prime` varchar(60) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `classes_id` int(11) NOT NULL,
  `classe_name` varchar(70) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_classe_enseignant`
--

CREATE TABLE `tbl_classe_enseignant` (
  `classe_enseignant_id` int(11) NOT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `enseignant_id` int(11) DEFAULT NULL,
  `annee_id` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_communiques`
--

CREATE TABLE `tbl_communiques` (
  `communique_id` int(11) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `date_communique` date DEFAULT NULL,
  `statut_communique` varchar(80) DEFAULT NULL,
  `concerned` enum('all','eleves','tuteur','enseignant') DEFAULT NULL,
  `annee_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_comportements`
--

CREATE TABLE `tbl_comportements` (
  `comportement_id` int(11) NOT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `annee_id` int(11) DEFAULT NULL,
  `type_user` varchar(70) DEFAULT NULL,
  `date_comportement` date DEFAULT NULL,
  `type_comportement` varchar(80) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `action_prise` varchar(90) DEFAULT NULL,
  `sanction` varchar(190) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_cours`
--

CREATE TABLE `tbl_cours` (
  `cours_id` int(11) NOT NULL,
  `cours_name` varchar(70) DEFAULT NULL,
  `manuel` varchar(60) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_cours_enseignant`
--

CREATE TABLE `tbl_cours_enseignant` (
  `cours_enseignant_id` int(11) NOT NULL,
  `cours_id` int(11) DEFAULT NULL,
  `enseignant_id` int(11) DEFAULT NULL,
  `annee_id` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_cours_options`
--

CREATE TABLE `tbl_cours_options` (
  `cours_option_id` int(11) NOT NULL,
  `cours_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `ponderation` float DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_depenses`
--

CREATE TABLE `tbl_depenses` (
  `depense_id` int(11) NOT NULL,
  `montant` float DEFAULT NULL,
  `beneficiaire` int(11) DEFAULT NULL,
  `motif` varchar(150) DEFAULT NULL,
  `date_depense` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_eleves`
--

CREATE TABLE `tbl_eleves` (
  `eleve_id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `postnom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `sexe` enum('M','F') DEFAULT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `nationalite` varchar(50) DEFAULT NULL,
  `groupe_sanguin` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `provenance` varchar(100) DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_eleve_tuteur`
--

CREATE TABLE `tbl_eleve_tuteur` (
  `eleve_tuteur_id` int(11) NOT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `tuteur_id` int(11) DEFAULT NULL,
  `relation` varchar(50) NOT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_enseignants`
--

CREATE TABLE `tbl_enseignants` (
  `enseignant_id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `postnom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `sexe` enum('M','F') DEFAULT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `nationalite` varchar(50) DEFAULT NULL,
  `groupe_sanguin` varchar(50) DEFAULT NULL,
  `photo` varchar(160) DEFAULT NULL,
  `category_option_id` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `grade_id` int(11) NOT NULL,
  `grade_name` varchar(60) DEFAULT NULL,
  `salaireBase` float DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_horaires`
--

CREATE TABLE `tbl_horaires` (
  `horaire_id` int(11) NOT NULL,
  `jours` varchar(20) DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `cours_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_inscription_annee_scolaire`
--

CREATE TABLE `tbl_inscription_annee_scolaire` (
  `inscription_annee_scolaire_id` int(11) NOT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `annee_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `note_id` int(11) NOT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `cours_id` int(11) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `annee_id` int(11) DEFAULT NULL,
  `category_note_id` int(11) DEFAULT NULL,
  `note` float DEFAULT NULL,
  `ponderation` float DEFAULT NULL,
  `sanction` tinyint(1) DEFAULT NULL,
  `motif` varchar(50) DEFAULT NULL,
  `date_note` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_options`
--

CREATE TABLE `tbl_options` (
  `option_id` int(11) NOT NULL,
  `option_name` varchar(30) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_paiements`
--

CREATE TABLE `tbl_paiements` (
  `paiement_id` int(11) NOT NULL,
  `salaire` float DEFAULT NULL,
  `bonus` float DEFAULT NULL,
  `retenue` float DEFAULT NULL,
  `salaire_net` float DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `moyen_paiement` enum('caisse','bank') DEFAULT NULL,
  `jeton_security` varchar(70) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_paiement_frais_scolaires`
--

CREATE TABLE `tbl_paiement_frais_scolaires` (
  `paiement_frais_id` int(11) NOT NULL,
  `category_paie_id` int(11) DEFAULT NULL,
  `eleve_id` int(11) DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `reduction` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `jeton` varchar(50) DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_periodes`
--

CREATE TABLE `tbl_periodes` (
  `periode_id` int(11) NOT NULL,
  `periode_name` varchar(70) DEFAULT NULL,
  `category_option_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_presences`
--

CREATE TABLE `tbl_presences` (
  `presence_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type_user` varchar(70) DEFAULT NULL,
  `date_presence` date DEFAULT NULL,
  `motif` varchar(200) DEFAULT NULL,
  `commentaire` varchar(200) DEFAULT NULL,
  `justify` tinyint(1) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_primes`
--

CREATE TABLE `tbl_primes` (
  `prime_id` int(11) NOT NULL,
  `montant` float DEFAULT NULL,
  `date_prime` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_prime_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(30) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(30) DEFAULT NULL,
  `category_option_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_tuteurs`
--

CREATE TABLE `tbl_tuteurs` (
  `tuteur_id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `postnom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `sexe` enum('M','F') DEFAULT NULL,
  `adresse` varchar(250) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `nationalite` varchar(50) DEFAULT NULL,
  `photo` varchar(160) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `matricule` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `tbl_annee`
--
ALTER TABLE `tbl_annee`
  ADD PRIMARY KEY (`annee_id`);

--
-- Index pour la table `tbl_category_frais`
--
ALTER TABLE `tbl_category_frais`
  ADD PRIMARY KEY (`category_frais_id`);

--
-- Index pour la table `tbl_category_note`
--
ALTER TABLE `tbl_category_note`
  ADD PRIMARY KEY (`category_note_id`);

--
-- Index pour la table `tbl_category_options`
--
ALTER TABLE `tbl_category_options`
  ADD PRIMARY KEY (`category_option_id`);

--
-- Index pour la table `tbl_category_prime`
--
ALTER TABLE `tbl_category_prime`
  ADD PRIMARY KEY (`category_prime_id`);

--
-- Index pour la table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`classes_id`);

--
-- Index pour la table `tbl_classe_enseignant`
--
ALTER TABLE `tbl_classe_enseignant`
  ADD PRIMARY KEY (`classe_enseignant_id`);

--
-- Index pour la table `tbl_communiques`
--
ALTER TABLE `tbl_communiques`
  ADD PRIMARY KEY (`communique_id`);

--
-- Index pour la table `tbl_comportements`
--
ALTER TABLE `tbl_comportements`
  ADD PRIMARY KEY (`comportement_id`);

--
-- Index pour la table `tbl_cours`
--
ALTER TABLE `tbl_cours`
  ADD PRIMARY KEY (`cours_id`);

--
-- Index pour la table `tbl_cours_enseignant`
--
ALTER TABLE `tbl_cours_enseignant`
  ADD PRIMARY KEY (`cours_enseignant_id`);

--
-- Index pour la table `tbl_cours_options`
--
ALTER TABLE `tbl_cours_options`
  ADD PRIMARY KEY (`cours_option_id`);

--
-- Index pour la table `tbl_depenses`
--
ALTER TABLE `tbl_depenses`
  ADD PRIMARY KEY (`depense_id`);

--
-- Index pour la table `tbl_eleves`
--
ALTER TABLE `tbl_eleves`
  ADD PRIMARY KEY (`eleve_id`);

--
-- Index pour la table `tbl_eleve_tuteur`
--
ALTER TABLE `tbl_eleve_tuteur`
  ADD PRIMARY KEY (`eleve_tuteur_id`);

--
-- Index pour la table `tbl_enseignants`
--
ALTER TABLE `tbl_enseignants`
  ADD PRIMARY KEY (`enseignant_id`);

--
-- Index pour la table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Index pour la table `tbl_horaires`
--
ALTER TABLE `tbl_horaires`
  ADD PRIMARY KEY (`horaire_id`);

--
-- Index pour la table `tbl_inscription_annee_scolaire`
--
ALTER TABLE `tbl_inscription_annee_scolaire`
  ADD PRIMARY KEY (`inscription_annee_scolaire_id`);

--
-- Index pour la table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Index pour la table `tbl_options`
--
ALTER TABLE `tbl_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Index pour la table `tbl_paiements`
--
ALTER TABLE `tbl_paiements`
  ADD PRIMARY KEY (`paiement_id`);

--
-- Index pour la table `tbl_paiement_frais_scolaires`
--
ALTER TABLE `tbl_paiement_frais_scolaires`
  ADD PRIMARY KEY (`paiement_frais_id`);

--
-- Index pour la table `tbl_periodes`
--
ALTER TABLE `tbl_periodes`
  ADD PRIMARY KEY (`periode_id`);

--
-- Index pour la table `tbl_presences`
--
ALTER TABLE `tbl_presences`
  ADD PRIMARY KEY (`presence_id`);

--
-- Index pour la table `tbl_primes`
--
ALTER TABLE `tbl_primes`
  ADD PRIMARY KEY (`prime_id`);

--
-- Index pour la table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Index pour la table `tbl_tuteurs`
--
ALTER TABLE `tbl_tuteurs`
  ADD PRIMARY KEY (`tuteur_id`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_annee`
--
ALTER TABLE `tbl_annee`
  MODIFY `annee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tbl_category_frais`
--
ALTER TABLE `tbl_category_frais`
  MODIFY `category_frais_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_category_note`
--
ALTER TABLE `tbl_category_note`
  MODIFY `category_note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_category_options`
--
ALTER TABLE `tbl_category_options`
  MODIFY `category_option_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_category_prime`
--
ALTER TABLE `tbl_category_prime`
  MODIFY `category_prime_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `classes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_classe_enseignant`
--
ALTER TABLE `tbl_classe_enseignant`
  MODIFY `classe_enseignant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_communiques`
--
ALTER TABLE `tbl_communiques`
  MODIFY `communique_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_comportements`
--
ALTER TABLE `tbl_comportements`
  MODIFY `comportement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_cours`
--
ALTER TABLE `tbl_cours`
  MODIFY `cours_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_cours_enseignant`
--
ALTER TABLE `tbl_cours_enseignant`
  MODIFY `cours_enseignant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_cours_options`
--
ALTER TABLE `tbl_cours_options`
  MODIFY `cours_option_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_depenses`
--
ALTER TABLE `tbl_depenses`
  MODIFY `depense_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_eleves`
--
ALTER TABLE `tbl_eleves`
  MODIFY `eleve_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_eleve_tuteur`
--
ALTER TABLE `tbl_eleve_tuteur`
  MODIFY `eleve_tuteur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_enseignants`
--
ALTER TABLE `tbl_enseignants`
  MODIFY `enseignant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_horaires`
--
ALTER TABLE `tbl_horaires`
  MODIFY `horaire_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_inscription_annee_scolaire`
--
ALTER TABLE `tbl_inscription_annee_scolaire`
  MODIFY `inscription_annee_scolaire_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_options`
--
ALTER TABLE `tbl_options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_paiements`
--
ALTER TABLE `tbl_paiements`
  MODIFY `paiement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_paiement_frais_scolaires`
--
ALTER TABLE `tbl_paiement_frais_scolaires`
  MODIFY `paiement_frais_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_periodes`
--
ALTER TABLE `tbl_periodes`
  MODIFY `periode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_presences`
--
ALTER TABLE `tbl_presences`
  MODIFY `presence_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_primes`
--
ALTER TABLE `tbl_primes`
  MODIFY `prime_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_tuteurs`
--
ALTER TABLE `tbl_tuteurs`
  MODIFY `tuteur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
