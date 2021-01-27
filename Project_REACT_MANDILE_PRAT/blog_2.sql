-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 jan. 2021 à 08:47
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

CREATE DATABASE blog;
USE blog;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `created_by`, `created_at`, `modified_at`) VALUES
(28, 'REVIVEZ MARSEILLE - LENS (0 - 1)', 'L\'OM voit encore le podium s\'Ã©loigner, alors que Lens revient Ã  un petit point des PhocÃ©ens au classement. Prochaine Ã©tape pour Marseille : un dÃ©placement Ã  Monaco, samedi soir. Promis, je vais essayer de ne pas me positionner sur le live pour ne pas effrayer les amis marseillais dans les commentaires. Allez, je file. Prenez soin de vous, bisous.', 9, '2021-01-21 09:34:16', '2021-01-21 09:34:16'),
(29, 'La crise du Covid aurait dÃ» permettre de mobiliser davantage la recherche scientifique', 'Des discours dâ€™Emmanuel Macron aux conversations de comptoirs, la pandÃ©mie a transformÃ© la science en sujet de dÃ©bat quotidien. Une opportunitÃ© pour expliquer que la science nâ€™est pas quâ€™une somme de connaissances et une source dâ€™autoritÃ©, mais une dÃ©marche. Elle a Ã©tÃ© manquÃ©e.', 9, '2021-01-21 09:34:54', '2021-01-21 09:34:54'),
(30, 'Etats-Unis : la force de frappe des sites dâ€™actualitÃ© pro-Trump', 'Plusieurs sites et commentateurs ultraconservateurs ont acquis une audience massive pendant le mandat du 45e prÃ©sident amÃ©ricain, principalement grÃ¢ce Ã  Facebook.', 11, '2021-01-21 09:36:50', '2021-01-21 09:36:50'),
(31, 'Etats-Unis : en revenant dans lâ€™accord de Paris, Joe Biden parie sur les bÃ©nÃ©fices dâ€™une diplomatie climatique offensive', 'Le nouveau prÃ©sident a annulÃ© ou engagÃ©, mercredi, lâ€™annulation de nombreuses mesures prises par Donald Trump concernant lâ€™environnement. Un changement de stratÃ©gie spectaculaire.', 11, '2021-01-21 09:37:27', '2021-01-21 09:37:27'),
(32, 'TOKYO 2020 : L\'ANNULATION DES JO TOUJOURS PAS D\'ACTUALITÃ‰ POUR LE COJO', 'Le ComitÃ© d\'organisation des JO de Tokyo, qui dÃ©buteront le 23 juillet prochain, a tenu Ã  rassurer les fans de sport du monde entier sur la bonne tenue des olympiades cet Ã©tÃ©. Ce mardi 19 janvier 2021, le prÃ©sident du ComitÃ© d\'organisation estime que \'la tenue des Jeux est un cap inflexible\' et affirme que les organisateurs ne discutent \'de rien d\'autre\'.', 10, '2021-01-21 09:38:31', '2021-01-21 09:38:31'),
(33, 'Des hÃ´pitaux visÃ©s par des cyberchantages', 'Depuis 2019, les attaques au ranÃ§ongiciel, frappant entreprises et administrations, ont Ã©tÃ© multipliÃ©es par quatre.', 10, '2021-01-21 09:38:56', '2021-01-21 09:38:56'),
(34, 'Le tiroir-caisse dâ€™O Tacos Valenciennes disparaÃ®t, un homme interpellÃ©', 'Un homme de 39 ans a Ã©tÃ© interpellÃ© ce mardi soir, Ã  Valenciennes. Il est soupÃ§onnÃ© dâ€™avoir dÃ©robÃ© le tiroir-caisse dâ€™un fast-food situÃ© sur la place dâ€™Armes, Oâ€™Tacos. Le suspect Ã©tait encore en garde Ã  vue ce mercredi.', 8, '2021-01-21 09:42:12', '2021-01-21 09:42:12'),
(35, 'Voici les adresses oÃ¹ manger les meilleurs tacos du monde (selon GQ Mexico)', 'Quand on a faim, les tacos ne dÃ©Ã§oivent jamais. On peut en trouver de trÃ¨s bonnes versions pour peu dâ€™argent, avec toutes sortes dâ€™ingrÃ©dients dans les villes du monde entier. Les meilleurs sont certainement au Mexique, mais il y a en aussi quelques-uns quâ€™il faut goÃ»ter en dehors du pays.', 8, '2021-01-21 09:42:44', '2021-01-21 09:42:44'),
(36, 'Covid-19 en Angleterre : 1 personne sur 8 infectÃ©e par le virus', 'Le nombre de personnes contaminÃ©es a fortement augmentÃ© en Angleterre entre novembre et dÃ©cembre, Ã  cause du nouveau variant qui sÃ©vit dans le pays.', 7, '2021-01-21 09:43:32', '2021-01-21 09:43:32'),
(37, 'Covid-19: la Banque d\'Angleterre veut jauger un scÃ©nario catastrophe pour les banques', 'La Banque d\'Angleterre (BoE) lance mercredi ses tests de rÃ©sistance des banques britanniques et se focalise sur la maniÃ¨re dont un scÃ©nario catastrophe liÃ© Ã  la pandÃ©mie de Covid-19, Ã©talÃ© sur plusieurs annÃ©es, les affecterait.', 7, '2021-01-21 09:44:01', '2021-01-21 09:44:01'),
(38, 'Angleterre: Pogba remet United en tÃªte, City Ã  ses trousses', 'Une frappe magnifique de Paul Pogba a offert Ã  Manchester United la victoire Ã  Fulham (2-1) et la premiÃ¨re place de la Premier League, mercredi, mais City, vainqueur d\'Aston Villa (2-0), est Ã  ses trousses.', 7, '2021-01-21 09:44:40', '2021-01-21 09:44:40');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `pseudo` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `token` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `pseudo`, `created_at`, `token`) VALUES
(1, 'admin', 'admin', 'admin', '2021-01-21 09:20:27', '@dm1nt0k3n'),
(7, 'John', 'Smith', 'smithjohn', '2021-01-21 09:31:25', 'd81eaa3f8381'),
(8, 'Dimitri', 'Payet', 'elcosto', '2021-01-21 09:31:54', 'aa24447fdea7'),
(9, 'Pipa', 'Benedetto', 'lapipe', '2021-01-21 09:32:19', 'bd0645b8cf01'),
(10, 'Florian', 'Mandile', 'elcreator2', '2021-01-21 09:32:40', '50b05e6a3b07'),
(11, 'Florian', 'Prat', 'elcreator1', '2021-01-21 09:32:48', '6699f3a560b3');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
