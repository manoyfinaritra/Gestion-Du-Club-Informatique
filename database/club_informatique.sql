-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 18 jan. 2026 à 16:03
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
-- Base de données : `club_informatique`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `age` text NOT NULL,
  `genre` text NOT NULL,
  `nom_facebook` text NOT NULL,
  `mot_de_passe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `age`, `genre`, `nom_facebook`, `mot_de_passe`) VALUES
(1, 'fddf', 'ffdgfdgd', '555', 'Homme', 'dfdf', 'fdfd'),
(2, 'fddf', 'ffdgfdgd', '555', 'Homme', 'dfdf', '$2y$10$X4DF9F5WxzjYnilzY5K0e.eryaLQmR0QbwC2lxv51Sib0dBxRNNha'),
(3, 'fdff', 'fddsf', '34', 'Homme', 'fddfd', '$2y$10$falx9j43c82KzBSzo4oiL.jUWYh.yeLM.8VUTBvRruF5vdoc59H/u'),
(4, 'fdfddffd', 'dfdfdfsf', '766', 'Homme', 'dffsf', '$2y$10$7iwHhS197XLRuBO1LtOD1O8xYb33awJlRCz.KwNO5RA9W51KVNM3S'),
(5, 'manoy', 'finaritra', '23', 'Homme', 'man oy', '$2y$10$kMxBIIarjEq6rkvUZTg/FetzldtLlgAxCd4zazF3jDAb7C3BSN5XC'),
(6, 'cvc', 'bb', '55', 'Homme', 'gf', '$2y$10$ScgcL0SB1evu7BfChQp6mOqlUtr8TuHdLJmSAqQf4NUE5ZqXCav8.'),
(7, 'dffd', 'dfd', '55', 'Homme', 'dfdf', '$2y$10$cFIwFtbknHRQ6rJLId9L6.H2bIwvNAb89JZxIYj42DD2z2OTlnE/W'),
(8, 'cxx', 'DFH', '66', 'Homme', 'DFJFJ', '$2y$10$TyvyY/oloyoOfEhBqPGAxO9GDYWdhIQjKMlnFvQ.tP/4SkbSYDx3.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
