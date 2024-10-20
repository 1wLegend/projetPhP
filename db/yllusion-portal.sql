-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 19 oct. 2024 à 18:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `yllusion-portal`
--

-- --------------------------------------------------------

--
-- Structure de la table `email_log`
--

CREATE TABLE `email_log` (
  `emailLog_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `email_log`
--

INSERT INTO `email_log` (`emailLog_id`, `email`, `username`, `password`, `picture`, `role`) VALUES
(25, 'JsuiGayOuQuoi?@gmail.com', 'test', 'aze', '', 'user'),
(26, 'JsuiGayOuQuoi?@gmail.com', 'aze', 'test', '', 'user'),
(27, 'JsuiGayOuQuoi?@gmail.com', 'vvirtuose', 'test', 'vvirtuose671394413c1bd6.19393207.jpg', 'user'),
(28, 'JsuiGayOuQuoi?@gmail.com', 'Legend', 'test', '', 'user'),
(29, 'JsuiGayOuQuoi?@gmail.com', 'testtes', 'test', '', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `logs_connexion`
--

CREATE TABLE `logs_connexion` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `connexion_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `logs_connexion`
--

INSERT INTO `logs_connexion` (`log_id`, `user_id`, `username`, `connexion_time`) VALUES
(42, 25, 'test', '2024-10-19 11:09:14'),
(43, 27, 'vvirtuose', '2024-10-19 11:13:08'),
(44, 27, 'vvirtuose', '2024-10-19 11:14:38'),
(45, 27, 'vvirtuose', '2024-10-19 11:25:57'),
(46, 27, 'vvirtuose', '2024-10-19 11:26:15'),
(47, 27, 'vvirtuose', '2024-10-19 11:26:35'),
(48, 27, 'vvirtuose', '2024-10-19 11:52:36'),
(49, 28, 'Legend', '2024-10-19 11:58:13'),
(50, 27, 'vvirtuose', '2024-10-19 11:59:11'),
(51, 25, 'test', '2024-10-19 11:59:23'),
(52, 28, 'Legend', '2024-10-19 11:59:28'),
(53, 27, 'vvirtuose', '2024-10-19 11:59:39'),
(54, 28, 'Legend', '2024-10-19 11:59:44'),
(55, 27, 'vvirtuose', '2024-10-19 12:44:56'),
(58, 27, 'vvirtuose', '2024-10-19 14:49:44'),
(59, 29, 'testtes', '2024-10-19 14:50:00'),
(60, 27, 'vvirtuose', '2024-10-19 15:19:20'),
(61, 27, 'vvirtuose', '2024-10-19 15:19:38');

-- --------------------------------------------------------

--
-- Structure de la table `resumes`
--

CREATE TABLE `resumes` (
  `cv_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `style` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `email_log`
--
ALTER TABLE `email_log`
  ADD PRIMARY KEY (`emailLog_id`);

--
-- Index pour la table `logs_connexion`
--
ALTER TABLE `logs_connexion`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `fk_user_cv` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `email_log`
--
ALTER TABLE `email_log`
  MODIFY `emailLog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `logs_connexion`
--
ALTER TABLE `logs_connexion`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `logs_connexion`
--
ALTER TABLE `logs_connexion`
  ADD CONSTRAINT `logs_connexion_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `email_log` (`emailLog_id`);

--
-- Contraintes pour la table `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `fk_user_cv` FOREIGN KEY (`user_id`) REFERENCES `email_log` (`emailLog_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
