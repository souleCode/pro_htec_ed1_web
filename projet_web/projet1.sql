-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3345
-- Généré le : sam. 10 août 2024 à 00:12
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
-- Base de données : `projet1`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `date_post` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `categorie`, `date_post`) VALUES
(1, 'Une montre luxeuse', 'dhhsjsjsjhbdwcbsdkhdghs,bcsb;,c xc', 'Produit ', '2024-08-09 22:02:52'),
(2, 'Developpement web', 'hshshsdhsbhksgbkxbwbhxwbhjxwx', 'Formation', '2024-08-09 22:03:26'),
(3, 'JAVA', 'shsgkqdgvbdsbnhvsdbhksdbnvcxwvxw', 'Formation', '2024-08-09 22:03:26'),
(4, 'Developpement web', 'hshshsdhsbhksgbkxbwbhxwbhjxwx', 'Formation', '2024-08-09 22:03:26'),
(5, 'JAVA', 'shsgkqdgvbdsbnhvsdbhksdbnvcxwvxw', 'Formation', '2024-08-09 22:03:26');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `categorie_url` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie`, `categorie_url`) VALUES
(1, 'Formation', 'formation'),
(2, 'Produit', 'produit'),
(3, 'Logement', 'logement'),
(4, 'Services ', 'services'),
(10, 'Maison Luxeuse', 'maison-luxeuse');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
