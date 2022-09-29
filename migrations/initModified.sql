-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 sep. 2022 à 23:32
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
                                                                           (10, 'Acheter du pain', 0, '2022-09-29 20:58:35', 1),
                                                                           (11, 'Acheter des préservatifs', 0, '2022-09-29 20:58:56', 1),
                                                                           (12, 'Aller à la salle 2 fois cette semaine', 0, '2022-09-29 21:13:37', 9),
                                                                           (13, 'Aller au bar 3 fois cette semaine', 0, '2022-09-29 21:13:53', 9),
                                                                           (14, 'Rencontrer au minimum 5 filles différentes cette semaine', 0, '2022-09-29 21:14:12', 9),
                                                                           (15, 'Faire le défi de rouler à 200km/h sur le chemin du retour ! A fond la caisse', 0, '2022-09-29 21:16:14', 10),
                                                                           (16, 'Défi : Se raser le bouc ', 0, '2022-09-29 21:16:40', 10),
                                                                           (17, 'Commander sa nourriture sur leclerc drive', 0, '2022-09-29 21:16:59', 10),
                                                                           (18, 'S\'entrainer 5 fois cette semaine à CS:GO pour enfin passer \"Maitre Gardien\" !!! ', 0, '2022-09-29 21:18:07', 11),
(19, 'Venir au lycée en courant cette semaine', 0, '2022-09-29 21:18:30', 11);

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
                                                             (9, 'maclevine', '$2y$10$Euu9LiolBLjDscQKnt7zDOnENjMZJYrl3r27RqEUdYFyq.ERAW.6i', 'maclevine@gmail.com'),
                                                             (10, 'Timeo', '$2y$10$Ztjj1VeKnCEctkMVHm4QVOTTVPoLZiS0eaP2UMejKxmmJOgnKUTEO', 'timeo@gmail.com'),
                                                             (11, 'Antoine', '$2y$10$h4kXM/dZwycX2/QO.DAu5uOTkC5F5WmhHbHU70DRHiKKqnzZYmGpW', 'antoine@gmail.com');

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
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
    MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
