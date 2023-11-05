-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 05 nov. 2023 à 23:45
-- Version du serveur : 8.0.30
-- Version de PHP : 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `geoquiz`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `option_one` varchar(255) NOT NULL,
  `option_two` varchar(255) NOT NULL,
  `option_three` varchar(255) NOT NULL,
  `option_four` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `option_one`, `option_two`, `option_three`, `option_four`) VALUES
(1, 'Quelle est la capitale de la France ?', 'Paris', 'Londres', 'Berlin', 'Madrid', 'Paris'),
(2, 'Quel pays est situé en Amérique du Sud ?', 'Brésil', 'Espagne', 'Inde', 'Australie', 'Brésil'),
(3, 'Où se trouve la Grande Muraille de Chine ?', 'Chine', 'Japon', 'Corée du Sud', 'Inde', 'Chine'),
(4, 'Quel est le plus grand lac d\'Amérique du Nord ?', 'lac Supérieur', 'lac Michigan', 'lac Huron', 'lac Érié', 'lac Supérieur'),
(5, 'Combien de continents y a-t-il sur Terre ?', '7', '5', '6', '8', '7'),
(6, 'Quelle est la plus grande île au monde ?', 'Groenland', 'Australie', 'Borneo', 'Madagascar', 'Groenland'),
(7, 'Quel fleuve traverse l\'Égypte ?', 'Nil', 'Danube', 'Amazone', 'Mississippi', 'Nil'),
(8, 'Dans quel pays se trouve la ville de Dubaï ?', 'Émirats arabes unis', 'Arabie Saoudite', 'Qatar', 'Koweït', 'Émirats arabes unis'),
(9, 'Quel est le point le plus élevé de la Terre ?', 'Mont Everest', 'K2', 'Annapurna', 'Makalu', 'Mont Everest'),
(10, 'Quelle est la plus grande forêt tropicale du monde ?', 'Amazonie', 'Congo', 'Bornéo', 'Sumatra', 'Amazonie'),
(11, 'Quelle est la monnaie de l\'Inde ?', 'Roupie indienne', 'Yen japonais', 'Baht thaïlandais', 'Dollar australien', 'Roupie indienne'),
(12, 'Quel océan est situé à l\'est de l\'Afrique ?', 'Océan Indien', 'Océan Atlantique', 'Océan Pacifique', 'Océan Arctique', 'Océan Indien'),
(13, 'Quelle est la plus grande île de la Méditerranée ?', 'Sicile', 'Crète', 'Chypre', 'Sardaigne', 'Sicile'),
(14, 'Quelle est la plus grande ville d\'Australie ?', 'Sydney', 'Melbourne', 'Brisbane', 'Perth', 'Sydney'),
(15, 'Quel pays est situé à la pointe sud de l\'Afrique ?', 'Afrique du Sud', 'Namibie', 'Botswana', 'Zimbabwe', 'Afrique du Sud'),
(16, 'Quelle est la plus grande île de l\'archipel japonais ?', 'Honshu', 'Hokkaido', 'Kyushu', 'Shikoku', 'Honshu'),
(17, 'Quelle est la plus haute montagne d\'Amérique du Nord ?', 'Mont Denali', 'Mont Saint Helens', 'Mont Rainier', 'Mont Hood', 'Mont Denali'),
(18, 'Dans quel pays se trouve la ville de Marrakech ?', 'Maroc', 'Tunisie', 'Algérie', 'Égypte', 'Maroc'),
(19, 'Quel est le plus grand désert du monde ?', 'désert du Sahara', 'désert du GéoQuiz', 'désert de Gobi', 'désert de Kalahari', 'désert du Sahara'),
(20, 'Quel est le plus long fleuve d\'Europe ?', 'Volga', 'Danube', 'Rhin', 'Sénégal', 'Volga'),
(21, 'Quelle est la plus grande île de la mer Méditerranée ?', 'Sicile', 'Sardaigne', 'Crète', 'Malte', 'Sicile'),
(22, 'Quelle est la capitale de l\'Argentine ?', 'Buenos Aires', 'Santiago', 'Lima', 'Bogota', 'Buenos Aires'),
(23, 'Dans quel pays se trouve la ville de Bangkok ?', 'Thaïlande', 'Vietnam', 'Cambodge', 'Laos', 'Thaïlande'),
(24, 'Quelle est la plus grande île du monde ?', 'Groenland', 'Australie', 'Madagascar', 'Bornéo', 'Groenland'),
(25, 'Quelle est la capitale de l\'Australie ?', 'Canberra', 'Sydney', 'Melbourne', 'Brisbane', 'Canberra'),
(26, 'Quel est le plus grand pays d\'Amérique du Sud ?', 'Brésil', 'Argentine', 'Pérou', 'Colombie', 'Brésil'),
(27, 'Dans quel pays se trouve la ville de Casablanca ?', 'Maroc', 'Algérie', 'Tunisie', 'Égypte', 'Maroc'),
(28, 'Quel est le plus grand pays d\'Afrique ?', 'Algérie', 'Soudan', 'République Démocratique du Congo', 'Libye', 'Algérie'),
(29, 'Quelle est la plus grande île de l\'océan Indien ?', 'Madagascar', 'Sri Lanka', 'Sumatra', 'Java', 'Madagascar'),
(30, 'Quel pays est situé en Scandinavie ?', 'Suède', 'Norvège', 'Danemark', 'Finlande', 'Suède'),
(31, 'Quel est le plus grand désert de sable du monde ?', 'désert du Sahara', 'désert de l\'Arabie', 'désert de Gobi', 'désert de Kalahari', 'désert du Sahara');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `best_score` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `best_score`) VALUES
(5, 'evgenii', 10),
(7, 'michel', 35),
(8, 'robert', 15);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
