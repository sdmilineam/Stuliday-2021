-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 mai 2021 à 13:37
-- Version du serveur :  8.0.23
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `le_chouette_coin`
--
CREATE DATABASE IF NOT EXISTS `le_chouette_coin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `le_chouette_coin`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(1, 'Informatique'),
(2, 'Véhicules'),
(3, 'Mobilier'),
(4, 'Vêtements');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int NOT NULL AUTO_INCREMENT,
  `products_name` varchar(255) NOT NULL,
  `products_description` text NOT NULL,
  `products_price` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` int NOT NULL,
  `category` int NOT NULL,
  PRIMARY KEY (`products_id`),
  KEY `fk_author_users` (`author`),
  KEY `fk_category_categories` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_description`, `products_price`, `created_at`, `author`, `category`) VALUES
(6, 'hiol', 'mkek', 2562, '2021-05-04 13:58:04', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` mediumtext NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'ROLE_USER',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(7, 'khmer', 'sdm@mfr.fr', '$2y$10$jwpl4t56o2.aG2SDRy6kgu6Mm/6zLh6JRsm8j2UawdEVvQELHL6wO', 'ROLE_ADMIN');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_author_users` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_category_categories` FOREIGN KEY (`category`) REFERENCES `categories` (`categories_id`) ON UPDATE CASCADE;
--
-- Base de données : `stuliday_2021`
--
CREATE DATABASE IF NOT EXISTS `stuliday_2021` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `stuliday_2021`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(1, 'Informatique'),
(4, 'Vêtements');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int NOT NULL AUTO_INCREMENT,
  `products_name` varchar(255) NOT NULL,
  `products_description` text NOT NULL,
  `products_price` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` int NOT NULL,
  `category` int NOT NULL,
  PRIMARY KEY (`products_id`),
  KEY `fk_author_users` (`author`),
  KEY `fk_category_categories` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_description`, `products_price`, `created_at`, `author`, `category`) VALUES
(5, 'Home', 'Je vendre mon cafe', 205, '2021-05-03 15:58:03', 8, 1),
(6, 'OPLevelJPX', 'have heal magic\r\n', 2000, '2021-05-04 08:57:05', 8, 1),
(7, 'OPLevelJPX', 'have heal magic\r\n', 2000, '2021-05-04 09:07:09', 8, 1),
(8, 'OPLevelJPX', 'have heal magic\r\n', 2000, '2021-05-04 09:07:31', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` mediumtext NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'ROLE_USER',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(8, 'sd', 'sd@gmial.fr', '$2y$10$GQuDHtaelGcgj5fQXAnQK.pXTt9BM40ZprQxdThR55aDIsD8ueRmu', 'ROLE_ADMIN'),
(9, 'fr', 'kh@gml.fr', '$2y$10$t9ww4NZhRU2rWKlW5KIpdOtnh4sZ2GOr2/BePNioozo4agWYe1FBa', 'ROLE_USER'),
(10, 'sdk', 'sdk@gl.fr', '$2y$10$q1Nhk.Zg9HDLHihElhbGseNpYzt3d3eIsSPVR2rwKZKvjtTdAYp9K', 'ROLE_ADMIN');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_author_users` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_category_categories` FOREIGN KEY (`category`) REFERENCES `categories` (`categories_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
