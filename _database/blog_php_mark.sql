-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 fév. 2026 à 13:01
-- Version du serveur : 8.2.0
-- Version de PHP : 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) NOT NULL,
  `article_img` varchar(255) NOT NULL,
  `article_content` mediumtext NOT NULL,
  `article_createdate` datetime NOT NULL,
  `article_creator` int NOT NULL,
  `article_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `article_creator` (`article_creator`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_img`, `article_content`, `article_createdate`, `article_creator`, `article_updated_at`) VALUES
(1, 'LE devenir du Javascript', 'js.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel accumsan tortor, finibus a tum fermentum, mauris odio consequat velit, eu hendrerit arcu magna nec tortor. Nulla facilisi.', '2017-05-11 00:00:00', 2, NULL),
(2, 'Qu\'est-ce que le HTML?', 'html.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel accumsan tortor, finibus a tum fermentum, mauris odio consequat velit, eu hendrerit arcu magna nec tortor. Nulla facilisi.', '2017-04-04 00:00:00', 1, NULL),
(3, 'Utiliser le CSS correctement', 'css.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel accumsan tortor, finibus a tum fermentum, mauris odio consequat velit, eu hendrerit arcu magna nec tortor. Nulla facilisi.', '2017-05-08 00:00:00', 1, NULL),
(4, 'Utiliser PhpMyAdmin', 'mysql.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel accumsan tortor, finibus a tum fermentum, mauris odio consequat velit, eu hendrerit arcu magna nec tortor. Nulla facilisi.', '2017-05-21 00:00:00', 1, NULL),
(5, 'Les bases du PHP', 'php.png', 'Vous en êtes où ?', '2017-04-26 00:00:00', 1, NULL),
(9, 'La coriandre : un gène, le savez-vous ?', '699465a390de6.webp', 'Le PHP c\'est cool, mais saviez-vous que la coriandre était un gène !?', '2026-02-17 13:57:07', 9, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_created_at` datetime NOT NULL,
  `user_deleted_at` datetime DEFAULT NULL,
  `user_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_mail` (`user_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_mail`, `user_pwd`, `user_created_at`, `user_deleted_at`, `user_updated_at`) VALUES
(1, 'Ehrhart', 'Christel', 'contact@ce-formation.com', 'Christel1234', '0000-00-00 00:00:00', NULL, NULL),
(2, 'Test', 'Utilisateur', 'tes@ce-formation.com', 'Test1234', '0000-00-00 00:00:00', NULL, NULL),
(9, 'Michou', 'Mark', 'test@test.fr', '$2y$10$G60P8sLLuxSFsGUWPB5Uqe1CAuOaPhI5iGUCGUuj01YnZXUAdIl2e', '2026-02-17 13:55:19', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`article_creator`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
