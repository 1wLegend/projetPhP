-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 11 oct. 2024 à 15:38
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
-- Structure de la table `discord_login`
--

CREATE TABLE `discord_login` (
  `id` int(11) NOT NULL,
  `discord_id` varchar(255) NOT NULL,
  `discord_avatar` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `email_log`
--

CREATE TABLE `email_log` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `email_log`
--

INSERT INTO `email_log` (`id`, `email`, `username`, `password`, `picture`, `role`) VALUES
(1, 'test@laposte.net', 'test', '$2y$10$1HUXtR7vtb/FcOkf5BerhOgrWaeux75UlSBuPvrD8QMULygGjBZhq', '', 'user'),
(2, 'test2@laposte.net', 'test2', '$2y$10$tcRRU4/Jox2roPSZgx/Pe.x7nYBcLhO/X4GviR7u7se.SL6bLKrQ2', '', 'user'),
(3, 'test5@laposte.net', 'test5', '$2y$10$QVGTm97mOPVWA6.ev.9kC.OQlTKuCbU1ZsID4ytZ8Mf7oLPg7pStS', '', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `google_login`
--

CREATE TABLE `google_login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `first_name` varchar(50) NOT NULL DEFAULT '',
  `last_name` varchar(50) NOT NULL DEFAULT '',
  `gender` varchar(50) NOT NULL DEFAULT '',
  `full_name` varchar(100) NOT NULL DEFAULT '',
  `picture` varchar(255) NOT NULL DEFAULT '',
  `verifiedEmail` int(11) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL DEFAULT '',
  `role` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `logs_connexion`
--

CREATE TABLE `logs_connexion` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `connexion_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `logs_connexion`
--

INSERT INTO `logs_connexion` (`id`, `user_id`, `username`, `connexion_time`) VALUES
(1, 1, 'test', '2024-10-09 06:37:26'),
(2, 1, 'test', '2024-10-09 06:43:05'),
(3, 2, 'test2', '2024-10-09 07:39:01'),
(4, 2, 'test2', '2024-10-09 07:58:20'),
(5, 2, 'test2', '2024-10-09 07:59:30'),
(6, 2, 'test2', '2024-10-09 08:03:47'),
(7, 2, 'test2', '2024-10-09 08:04:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `discord_login`
--
ALTER TABLE `discord_login`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `email_log`
--
ALTER TABLE `email_log`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `google_login`
--
ALTER TABLE `google_login`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logs_connexion`
--
ALTER TABLE `logs_connexion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `discord_login`
--
ALTER TABLE `discord_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `email_log`
--
ALTER TABLE `email_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `google_login`
--
ALTER TABLE `google_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `logs_connexion`
--
ALTER TABLE `logs_connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `logs_connexion`
--
ALTER TABLE `logs_connexion`
  ADD CONSTRAINT `logs_connexion_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `email_log` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
