-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 05 fév. 2023 à 18:44
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `devops`
--

-- --------------------------------------------------------

--
-- Structure de la table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `matricule` varchar(20) NOT NULL,
  `idligne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bus`
--

INSERT INTO `bus` (`id`, `matricule`, `idligne`) VALUES
(1, '2334322', 38),
(2, '7464443', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ligne`
--

CREATE TABLE `ligne` (
  `idLigne` int(11) NOT NULL,
  `depart` varchar(255) NOT NULL,
  `terminus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligne`
--

INSERT INTO `ligne` (`idLigne`, `depart`, `terminus`) VALUES
(2, 'POINT E', 'XARR YALLA'),
(33, 'COLOBANE', 'GOLF'),
(38, 'Guediawaye', 'UCAD');

-- --------------------------------------------------------

--
-- Structure de la table `receveur`
--

CREATE TABLE `receveur` (
  `idReceveur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `receveur`
--

INSERT INTO `receveur` (`idReceveur`, `nom`, `prenom`, `tel`, `login`, `password`) VALUES
(1, 'Ndongo', 'Cheikh Tidiane', '78 432 11 11', 'ndongo', 'passer');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `idReceveur` int(11) NOT NULL,
  `matriculeBus` int(11) NOT NULL,
  `montant` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id`, `idReceveur`, `matriculeBus`, `montant`, `date`) VALUES
(2, 1, 2, 100, '2023-02-04 22:02:58'),
(3, 1, 1, 100, '2023-02-04 22:53:26'),
(4, 1, 1, 100, '2023-02-04 22:53:39'),
(5, 1, 1, 200, '2023-02-04 22:53:50'),
(6, 1, 1, 200, '2023-02-04 23:15:43'),
(7, 1, 2, 250, '2023-02-05 17:24:49'),
(8, 1, 2, 100, '2023-02-05 17:25:04');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ligne`
--
ALTER TABLE `ligne`
  ADD PRIMARY KEY (`idLigne`);

--
-- Index pour la table `receveur`
--
ALTER TABLE `receveur`
  ADD PRIMARY KEY (`idReceveur`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ligne`
--
ALTER TABLE `ligne`
  MODIFY `idLigne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `receveur`
--
ALTER TABLE `receveur`
  MODIFY `idReceveur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
