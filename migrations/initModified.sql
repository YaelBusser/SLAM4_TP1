-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 sep. 2022 à 17:09
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
-- Base de données : `yb_slam4_tp1`
--

-- --------------------------------------------------------

--
-- Structure de la table `todos`
--

CREATE TABLE `todos` (
                         `id` int(11) NOT NULL,
                         `texte` varchar(200) NOT NULL,
                         `termine` tinyint(1) NOT NULL DEFAULT 0,
                         `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
                         `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `todos`
--

INSERT INTO `todos` (`id`, `texte`, `termine`, `timestamp`, `id_user`) VALUES
                                                                           (7, 'Prendre du pain', 0, '2022-09-29 13:48:55', 1),
                                                                           (8, 'ee', 0, '2022-09-29 14:40:46', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
                         `id_user` int(11) NOT NULL,
                         `login` varchar(255) NOT NULL,
                         `pwd` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `login`, `pwd`, `email`) VALUES
                                                             (1, 'yael', '$2y$10$VgAGaWwL5xNescPDfZA6ZOf0CxA/dCraDeIK0q8XzFFSqHLEyH.De', 'yb@gmail.com'),
                                                             (3, 'yaele', '$2y$10$ItXxbD/aopwvY2nO2mgUHO1hW7YVfALmamPvuPPa5fMxVrswWYneS', 'dsds@dsds.com'),
                                                             (5, 'ok', '$2y$10$WZDcxXRlHm70muGpT3uSNOHPyyD1XkHtXJ6GYLbJM371jWXnPXLly', 'ok@ok.com'),
                                                             (6, 'aa', '$2y$10$0jHuP8lVCauBoq/2jHFKY.7F5Bocl3ngJLOYymQT9SqRxeUPym/Su', 'aa@aa.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `todos`
--
ALTER TABLE `todos`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `todos`
--
ALTER TABLE `todos`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
    MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `todos`
--
ALTER TABLE `todos`
    ADD CONSTRAINT `todos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
