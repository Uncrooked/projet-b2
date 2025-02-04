-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 04 fév. 2025 à 11:30
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet-b2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Meuble'),
(2, 'Échantillon'),
(3, 'Vase'),
(4, 'Déco');

-- --------------------------------------------------------

--
-- Structure de la table `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `img`
--

INSERT INTO `img` (`id`, `img_url`) VALUES
(1, './public/assets/img/products/deco-livre-meuble.png'),
(2, './public/assets/img/products/echantillon-de-bois.png'),
(4, './public/assets/img/products/meuble-avec-tiroirs.png'),
(5, './public/assets/img/products/meuble-blanc.png'),
(6, './public/assets/img/products/meuble-tv.png'),
(7, './public/assets/img/products/petit-meuble-different.png'),
(8, './public/assets/img/products/meuble-vert.png'),
(11, './public/assets/img/products/bluberry-animation.png');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `img_id`, `product_name`, `description`, `price`, `category_id`) VALUES
(1, 1, 'déco livre meuble', 'Cette bibliothèque en bois naturel, fabriquée en France, combine praticité et esthétique. Parfaite pour ranger vos livres tout en apportant une touche chaleureuse à votre intérieur, elle se distingue par son design épuré et son savoir-faire artisanal. Un choix idéal pour allier rangement et décoration.', 24.99, 4),
(2, 2, 'échantillon de bois', 'Découvrez la texture et la couleur de notre bois naturel grâce à cet échantillon, fabriqué en France. Parfait pour vous aider à choisir la finition idéale pour vos meubles ou décorations, il reflète la qualité et le savoir-faire artisanal qui caractérisent chaque pièce d\'Ornament.', 34.99, 2),
(4, 4, 'meuble avec tiroirs', 'Ce meuble à tiroirs, fabriqué en France, allie praticité et élégance. Parfait pour organiser votre espace tout en ajoutant une touche de style à votre intérieur, il est conçu avec un savoir-faire artisanal qui garantit durabilité et esthétique.', 79.99, 1),
(5, 5, 'meuble blanc', 'Ce meuble blanc, fabriqué en France, apporte une touche de légèreté et de modernité à votre intérieur. Son design épuré et sa fabrication artisanale en font une pièce à la fois fonctionnelle et élégante, idéale pour compléter votre décoration avec simplicité.', 109.99, 1),
(6, 6, 'meuble tv', 'Ce meuble TV, fabriqué en France, combine praticité et design moderne. Avec ses lignes épurées et son espace de rangement optimisé, il est parfait pour accueillir votre télévision tout en apportant une touche contemporaine à votre salon.', 120.5, 1),
(7, 7, 'meuble vert & marron', 'Ce meuble au design unique, alliant teintes vertes et marrons, fabriqué en France, apporte chaleur et originalité à votre intérieur. Son mélange de couleurs naturelles et son savoir-faire artisanal en font une pièce maîtresse, idéale pour ajouter du caractère à votre décoration.', 90.9, 1),
(8, 8, 'meuble vert', 'Ce meuble vert, fabriqué en France, ajoute une touche de fraîcheur et de caractère à votre intérieur. Avec son design moderne et sa finition soignée, il se distingue par son originalité tout en restant élégant et fonctionnel.', 84.99, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
