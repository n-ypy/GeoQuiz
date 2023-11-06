-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 06, 2023 at 01:33 PM
-- Server version: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004-log
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geoquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(255) NOT NULL,
  `option_one` varchar(255) NOT NULL,
  `option_two` varchar(255) NOT NULL,
  `option_three` varchar(255) NOT NULL,
  `option_four` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `option_one`, `option_two`, `option_three`, `option_four`) VALUES
(1, 'Quelle est la capitale de la France ?', 'Paris', 'Berlin', 'Paris', 'Londres', 'Madrid'),
(2, 'Quel pays est situé en Amérique du Sud ?', 'Brésil', 'Brésil', 'Australie', 'Espagne', 'Inde'),
(3, 'Où se trouve la Grande Muraille de Chine ?', 'Chine', 'Corée du Sud', 'Inde', 'Japon', 'Chine'),
(4, 'Quel est le plus grand lac d\'Amérique du Nord ?', 'Lac Supérieur', 'Lac Érié', 'Lac Huron', 'Lac Michigan', 'Lac Supérieur'),
(5, 'Combien de continents y a-t-il sur Terre ?', '7', '7', '6', '5', '8'),
(6, 'Quelle est la plus grande île au monde ?', 'Groenland', 'Australie', 'Madagascar', 'Groenland', 'Borneo'),
(7, 'Quel fleuve traverse l\'Égypte ?', 'Nil', 'Amazone', 'Mississippi', 'Danube', 'Nil'),
(8, 'Dans quel pays se trouve la ville de Dubaï ?', 'Émirats arabes unis', 'Émirats arabes unis', 'Arabie Saoudite', 'Qatar', 'Koweït'),
(9, 'Quel est le point le plus élevé de la Terre ?', 'Mont Everest', 'Annapurna', 'K2', 'Makalu', 'Mont Everest'),
(10, 'Quelle est la plus grande forêt tropicale du monde ?', 'Amazonie', 'Amazonie', 'Sumatra', 'Congo', 'Bornéo'),
(11, 'Quelle est la monnaie de l\'Inde ?', 'Roupie indienne', 'Baht thaïlandais', 'Roupie indienne', 'Dollar australien', 'Yen japonais'),
(12, 'Quel océan est situé à l\'est de l\'Afrique ?', 'Océan Indien', 'Océan Pacifique', 'Océan Indien', 'Océan Atlantique', 'Océan Arctique'),
(13, 'Quelle est la plus grande île de la Méditerranée ?', 'Sicile', 'Chypre', 'Crète', 'Sardaigne', 'Sicile'),
(14, 'Quelle est la plus grande ville d\'Australie ?', 'Sydney', 'Sydney', 'Melbourne', 'Perth', 'Brisbane'),
(15, 'Quel pays est situé à la pointe sud de l\'Afrique ?', 'Afrique du Sud', 'Zimbabwe', 'Namibie', 'Botswana', 'Afrique du Sud'),
(16, 'Quelle est la plus grande île de l\'archipel japonais ?', 'Honshu', 'Shikoku', 'Kyushu', 'Honshu', 'Hokkaido'),
(17, 'Quelle est la plus haute montagne d\'Amérique du Nord ?', 'Mont Denali', 'Mont Rainier', 'Mont Saint Helens', 'Mont Hood', 'Mont Denali'),
(18, 'Dans quel pays se trouve la ville de Marrakech ?', 'Maroc', 'Algérie', 'Maroc', 'Égypte', 'Tunisie'),
(20, 'Quel est le plus long fleuve d\'Europe ?', 'Volga', 'Rhin', 'Sénégal', 'Volga', 'Danube'),
(21, 'Quelle est la plus grande île de la mer Méditerranée ?', 'Sicile', 'Crète', 'Malte', 'Sardaigne', 'Sicile'),
(22, 'Quelle est la capitale de l\'Argentine ?', 'Buenos Aires', 'Buenos Aires', 'Santiago', 'Lima', 'Bogota'),
(23, 'Dans quel pays se trouve la ville de Bangkok ?', 'Thaïlande', 'Cambodge', 'Laos', 'Thaïlande', 'Vietnam'),
(25, 'Quelle est la capitale de l\'Australie ?', 'Canberra', 'Brisbane', 'Canberra', 'Sydney', 'Melbourne'),
(26, 'Quel est le plus grand pays d\'Amérique du Sud ?', 'Brésil', 'Brésil', 'Pérou', 'Argentine', 'Colombie'),
(27, 'Dans quel pays se trouve la ville de Casablanca ?', 'Maroc', 'Égypte', 'Tunisie', 'Maroc', 'Algérie'),
(28, 'Quel est le plus grand pays d\'Afrique ?', 'Algérie', 'République Démocratique du Congo', 'Libye', 'Soudan', 'Algérie'),
(29, 'Quelle est la plus grande île de l\'océan Indien ?', 'Madagascar', 'Sumatra', 'Java', 'Sri Lanka', 'Madagascar'),
(30, 'Quel pays est situé en Scandinavie ?', 'Suède', 'Nicaragua', 'Suède', 'Yémen', 'Russie'),
(31, 'Quel est le plus grand désert de sable du monde ?', 'Désert du Sahara', 'Désert de l\'Arabie', 'Désert du Sahara', 'Désert de Kalahari', 'Désert de Gobi'),
(32, 'Quel est l\'océan le plus vaste ?', 'Océan Pacifique', 'Océan Atlantique', 'Océan Indien', 'Océan Arctique', 'Océan Pacifique'),
(33, 'Quel pays est situé en Asie ?', 'Japon', 'Japon', 'Égypte', 'Canada', 'Argentine'),
(34, 'Quel continent est souvent appelé le \"Vieux Continent\" ?', 'Europe', 'Afrique', 'Europe', 'Asie', 'Amérique du Nord'),
(35, 'Quelle montagne se trouve en Nouvelle-Zélande ?', 'Mont Cook', 'Mont Saint-Michel', 'Mont Rushmore', 'Mont Cook', 'Mont Ventoux'),
(36, 'Quel océan entoure l\'Antarctique ?', 'Océan Austral', 'Océan Atlantique', 'Océan Austral', 'Océan Arctique', 'Océan Indien'),
(37, 'Quelle est la capitale de la Russie ?', 'Moscou', 'St. Pétersbourg', 'Kiev', 'Minsk', 'Moscou'),
(38, 'Quel pays est connu comme le \"pays du soleil levant\" ?', 'Japon', 'Chine', 'Japon', 'Corée du Sud', 'Inde'),
(39, 'Quel continent est le plus chaud ?', 'Afrique', 'Amérique du Nord', 'Asie', 'Amérique du Sud', 'Afrique'),
(40, 'Quelle montagne se trouve en Amérique du Sud ?', 'Mont Aconcagua', 'Mont Aconcagua', 'Mont McKinley', 'Mont Fuji', 'Mont Everest'),
(41, 'Quel océan est situé entre l\'Amérique du Nord et l\'Europe ?', 'Océan Atlantique', 'Océan Pacifique', 'Océan Atlantique', 'Océan Arctique', 'Océan Indien'),
(42, 'Quelle est la capitale de l\'Italie ?', 'Rome', 'Rome', 'Milan', 'Naples', 'Venise'),
(43, 'Quel pays est situé en Afrique du Nord ?', 'Maroc', 'Nigeria', 'Afrique du Sud', 'Kenya', 'Maroc'),
(44, 'Quel continent est le plus petit en termes de superficie ?', 'Australie', 'Australie', 'Afrique', 'Amérique du Sud', 'Asie'),
(45, 'Quelle montagne se trouve à la frontière entre la Suisse et l\'Italie ?', 'Mont Cervin', 'Mont Saint-Michel', 'Mont Cervin', 'Mont Kilimandjaro', 'Mont Fuji'),
(46, 'Quel océan est situé à l\'est de l\'Australie ?', 'Océan Pacifique', 'Océan Atlantique', 'Océan Indien', 'Océan Arctique', 'Océan Pacifique'),
(47, 'Quelle est la capitale de l\'Allemagne ?', 'Berlin', 'Berlin', 'Londres', 'Madrid', 'Paris'),
(48, 'Quel continent est souvent appelé le \"berceau de la civilisation\" ?', 'Afrique', 'Asie', 'Amérique du Nord', 'Afrique', 'Europe'),
(49, 'Quel continent est le plus chaud ?', 'Afrique', 'Amérique du Nord', 'Afrique', 'Amérique du Sud', 'Asie'),
(50, 'Quelle est la capitale du Canada ?', 'Ottawa', 'Toronto', 'Montréal', 'Québec', 'Ottawa'),
(51, 'Quel est le plus long fleuve du monde ?', 'Le Nil', 'Le Mississippi', 'Le Nil', 'L\'Amazone', 'Le Yangtsé'),
(52, 'Dans quel pays se trouve le mont Kilimandjaro ?', 'Tanzanie', 'Tanzanie', 'Ouganda', 'Rwanda', 'Kenya'),
(53, 'Quel pays est situé en Amérique centrale ?', 'Costa Rica', 'Panama', 'Honduras', 'Nicaragua', 'Costa Rica'),
(54, 'Quelle chaîne de montagnes traverse l\'Europe et l\'Asie ?', 'Les montagnes de l\'Oural', 'Les montagnes de l\'Oural', 'Les montagnes des Pyrénées', 'Les montagnes des Alpes', 'Les montagnes des Carpates'),
(55, 'Quelle est la capitale de l\'Égypte ?', 'Le Caire', 'Le Caire', 'Louxor', 'Gizeh', 'Alexandrie'),
(56, 'Dans quel pays se trouve le mont Fuji ?', 'Japon', 'Chine', 'Corée du Sud', 'Taïwan', 'Japon'),
(57, 'Quel pays est situé sur la péninsule coréenne ?', 'Corée du Sud', 'Vietnam', 'Chine', 'Japon', 'Corée du Sud'),
(58, 'Quel est le plus grand lac d\'Afrique ?', 'Lac Victoria', 'Lac Tanganyika', 'Lac Victoria', 'Lac Turkana', 'Lac Malawi'),
(59, 'Quel pays est situé au sud de l\'Inde ?', 'Sri Lanka', 'Maldives', 'Bangladesh', 'Népal', 'Sri Lanka'),
(60, 'Quel désert s\'étend à travers le sud-ouest des États-Unis ?', 'Le désert de Sonora', 'Le désert de Mojave', 'Le désert de Gobi', 'Le désert d\'Atacama', 'Le désert de Sonora'),
(61, 'Quelle est la capitale du Brésil ?', 'Brasília', 'Brasília', 'São Paulo', 'Belo Horizonte', 'Rio de Janeiro'),
(62, 'Dans quel pays se trouve le mont Elbrouz, la plus haute montagne d\'Europe ?', 'Russie', 'France', 'Russie', 'Italie', 'Suisse');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `best_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `best_score`) VALUES
(1, 'david', 30),
(5, 'evgenii', 25),
(7, 'michel', 22),
(8, 'robert', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
