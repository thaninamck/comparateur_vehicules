-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 jan. 2024 à 19:48
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `mail` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `mail`, `passwd`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `avis_marque`
--

CREATE TABLE `avis_marque` (
  `id_avs_mrq` int(11) NOT NULL,
  `cntxt` varchar(255) DEFAULT NULL,
  `approuv` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_mrq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis_marque`
--

INSERT INTO `avis_marque` (`id_avs_mrq`, `cntxt`, `approuv`, `date`, `note`, `id_user`, `id_mrq`) VALUES
(1, 'la meilleure marque au monde ! ', 1, '2023-12-12', 94, 53, 5),
(2, 'marque de confiance ', 1, '2023-12-13', 80, 54, 5),
(3, 'je pense que c beau', 1, '2023-12-30', 99, 53, 5),
(4, 'je pense que c beau', 0, '2023-12-30', 0, 53, 5),
(5, 'une marque qui a fait sa valeur au marché', 0, '2023-12-30', 80, 53, 5),
(6, '', 0, '2024-01-12', 80, 53, 5),
(7, 'une marque qui a fait sa valeur au marché', 0, '2024-01-16', 80, 56, 4),
(8, 'j\'aime cette marque', 0, '2024-01-16', 80, 56, 4),
(9, 'je suis fidele a cette marque', 0, '2024-01-16', 80, 56, 4),
(10, 'renalut avis ', 0, '2024-01-16', 80, 56, 3),
(11, 'la classe', 0, '2024-01-16', 80, 56, 3),
(12, 'allez allez allez renault', 0, '2024-01-16', 80, 56, 3),
(13, 'meilleure marque pour economic', 0, '2024-01-16', 80, 56, 2),
(14, 'jaime bien', 0, '2024-01-16', 80, 56, 2),
(15, 'je vais etre la nouvelle cliente', 0, '2024-01-16', 80, 56, 2),
(16, 'je suis impressionnée vraiment ', 0, '2024-01-16', 80, 56, 1),
(17, 'j\'aime cette marque', 0, '2024-01-16', 80, 56, 1),
(18, 'bien', 0, '2024-01-16', 80, 56, 1);

-- --------------------------------------------------------

--
-- Structure de la table `avis_vehicule`
--

CREATE TABLE `avis_vehicule` (
  `id_avs_vcl` int(11) NOT NULL,
  `cntxt` varchar(255) DEFAULT NULL,
  `approuv` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_vcl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis_vehicule`
--

INSERT INTO `avis_vehicule` (`id_avs_vcl`, `cntxt`, `approuv`, `date`, `note`, `id_user`, `id_vcl`) VALUES
(1, 'je trouve que c\'est un bon vehicule for real like', 1, '2023-12-27', 92, 53, 4),
(2, 'je trouve que c\'est un bon vehicule je veux lacheter', 1, '2023-12-27', 91, 53, 4),
(4, 'je trouve que c\'est un mauvais vehic', 0, '2023-12-28 12:09:00', 0, 53, 4),
(7, 'tets', 1, '21-8-2020', 88, 54, 4),
(8, 'tets', 1, '21-8-2020', 87, 54, 4),
(9, 'tets', 1, '21-8-2020', 87, 54, 4),
(10, 'tets', 1, '21-8-2020', 87, 54, 4),
(11, 'tets', 1, '21-8-2020', 87, 54, 4),
(12, 'tets', 1, '21-8-2020', 87, 54, 4),
(13, 'c un bon vehiculos', 1, '2024-01-09 00:05:50', 80, 53, 4),
(16, 'je trouve que c\'est un bon vehicule reaaly', 1, '2024-01-12', 80, 53, 4),
(17, 'je suis impressionnée vraiment ', 1, '2024-01-14 15:43:46', 80, 53, 13),
(18, 'bien', 1, '2024-01-14 16:05:53', 80, 56, 12),
(19, 'jaime bien', 1, '2024-01-16 07:56:41', 90, 53, 21),
(20, 'je suis impressionnée vraiment ', 1, '2024-01-16 07:56:50', 90, 53, 21),
(21, 'jaime bien', 1, '2024-01-16 07:56:55', 80, 53, 21),
(22, 'bien', 1, '2024-01-16 08:05:30', 80, 53, 29),
(23, 'bien', 1, '2024-01-16 08:05:36', 80, 53, 29),
(24, 'bien', 1, '2024-01-16 08:05:39', 80, 53, 29),
(25, 'bien', 1, '2024-01-16 08:06:03', 80, 53, 21),
(26, 'bien', 1, '2024-01-16 08:06:07', 80, 53, 21),
(27, 'bien', 1, '2024-01-16 08:06:10', 80, 53, 21),
(28, 'bien', 1, '2024-01-16 08:06:22', 80, 53, 23),
(29, 'bien', 1, '2024-01-16 08:06:25', 80, 53, 23),
(30, 'j\'aime ', 1, '2024-01-16 08:06:34', 80, 53, 23),
(31, 'je trouve que c\'est un bon vehicule', 0, '2024-01-16', 0, 53, 23);

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques`
--

CREATE TABLE `caracteristiques` (
  `id_caract` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `valeur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `caracteristiques`
--

INSERT INTO `caracteristiques` (`id_caract`, `nom`, `valeur`) VALUES
(1, 'nb place', '6'),
(2, 'reservoir ', '5l'),
(3, 'couleur', 'noir'),
(4, 'boite', 'automatique'),
(13, 'climatisation', 'oui'),
(14, 'chauffage', 'oui'),
(15, 'fumé', 'non'),
(16, 'moteur', '4 cylindres de 2,0 litres développant 169 chevaux'),
(17, 'moteur', '4 cylindres de 2,0 litres développant 169 chevaux'),
(18, 'Transmission', 'automatique à 8 vitesses'),
(19, 'Transmission', 'manuelle à 6 vitesses ou automatique à 6 vitesses'),
(20, 'Consommation de carburant en ville/autoroute', '28/38 mpg'),
(21, 'Consommation de carburant en ville/autoroute', '29/39 mpg'),
(22, 'Capacité de remorquage', '1 500 livres'),
(23, 'Espace de chargement', '27,9 pieds cubes'),
(24, 'Capacité de remorquage', '1 500 livres'),
(25, 'Espace de chargement', '35,8 pieds cubes'),
(26, 'climatisation', 'oui'),
(27, 'moteur', '4 cylindres de 2,0 litres développant 169 chevaux'),
(28, 'Transmission', 'Automatique à 8 vitesses'),
(29, 'Consommation de carburant en ville/autoroute', '28/38 mpg'),
(30, 'Capacité de remorquage', '1 500 livres'),
(31, 'Espace de chargement', 'N/A'),
(32, 'moteur', 'V6 de 3,5 litres développant 300 chevaux'),
(33, 'Transmission', 'Automatique à 10 vitesses'),
(34, 'Consommation de carburant en ville/autoroute', '22/30 mpg'),
(35, 'Espace de chargement', '50 pieds cubes'),
(36, 'Capacité de remorquage', '2 000 livres'),
(37, 'moteur', '6 cylindres turbo de 1,6 litre développant 150 chevaux'),
(38, 'Transmission', 'Boîte automatique à double embrayage à 7 vitesses'),
(39, 'Consommation de carburant en ville/autoroute', '30/40 mpg'),
(40, 'Capacité de remorquage', '1 200 livres'),
(41, 'Espace de chargement', '12 pieds cubes'),
(42, 'Prix', '2 500 000 DZD'),
(43, 'moteur', '4 cylindres turbo de 1,6 litre développant 150 chevaux'),
(44, 'Transmission', 'Boîte automatique à double embrayage à 7 vitesses'),
(45, 'Consommation de carburant en ville/autoroute', '30/40 mpg'),
(46, 'Capacité de remorquage', '1 200 livres'),
(47, 'Espace de chargement', '12 pieds cubes'),
(48, 'Prix', '2 550 000 DZD'),
(49, 'moteur', '4 cylindres turbo de 2,0 litres développant 180 chevaux'),
(50, 'Prix', '2 900 000 DZD'),
(51, 'Transmission', 'Boîte automatique à 6 vitesses'),
(52, 'Consommation de carburant en ville/autoroute', '30/40 mpg'),
(53, 'Capacité de remorquage', '1 400 livres'),
(54, 'Espace de chargement', '14 pieds cubes'),
(55, 'moteur', '4 cylindres turbo de 1.8 litres'),
(56, 'Puissance du Moteur', '180 chevaux'),
(57, 'Transmission', 'Boîte automatique à 7 vitesses'),
(58, 'Consommation de Carburant en Ville/Autoroute', '30/40 mpg'),
(59, 'Système de Divertissement', 'Écran tactile 8 pouces avec connectivité Apple CarPlay et Android Auto'),
(60, 'Sécurité', 'Système avancé d\'assistance à la conduite (ADAS), freinage d\'urgence automatique, avertissement de sortie de voie'),
(61, 'Prix', '2,500,000 DZD'),
(62, 'moteur', '4 cylindres turbo de 1.6 litres'),
(63, 'Puissance du Moteur', '160 chevaux'),
(64, 'Transmission', 'Boîte automatique à double embrayage à 7 vitesses'),
(65, 'Consommation de Carburant en Ville/Autoroute', '25/35 mpg'),
(66, 'Système de Divertissement', 'Écran tactile 10 pouces avec navigation intégrée Sécurité: Système avancé d\'assistance à la conduite (ADAS), détection d\'angle mort, alerte de collision frontale'),
(67, 'Prix', '3000000 DZD'),
(68, 'test', 'test'),
(69, 'climatisation', 'oui'),
(70, 'moteur', '3 cylindres turbo de 1.2 litres'),
(71, 'Puissance du Moteur', '120 chevaux'),
(72, 'Transmission', 'Boîte manuelle à 6 vitesses'),
(73, 'Consommation de Carburant en Ville/Autoroute', '30/40 mpg'),
(74, 'Technologie', 'Démarrage avec bouton-poussoir, rétroviseurs électriques'),
(75, 'test', 'test'),
(76, 'moteur', '4 cylindres turbo de 2.0 litres'),
(77, 'Puissance du Moteur', '180 chevaux'),
(78, 'Espace Intérieur', 'Sièges en cuir, climatisation automatique'),
(79, 'Prix', '3500000 DZD'),
(80, 'moteur', 'Propulsion électrique à batterie'),
(81, 'Autonomie Électrique', '300 miles (environ 480 km)'),
(82, 'Puissance du Moteur Électrique', '201 chevaux'),
(83, 'Charge Rapide', 'De 10% à 80% en 30 minutes'),
(84, 'Prix', '1000000000 DZD'),
(85, 'moteur', 'Essence, 4 cylindres'),
(86, 'Puissance du Moteur', '150 chevaux'),
(87, 'Transmission:', 'Manuelle à 6 vitesses'),
(88, 'Sécurité', 'Système avancé de freinage d\'urgence, assistance au maintien de voie'),
(89, 'Technologie', 'Caméra de recul, régulateur de vitesse adaptatif'),
(90, 'moteur', 'Turbo essence, 4 cylindres'),
(91, 'Puissance du Moteur', '300 chevaux'),
(92, 'Transmission', 'Transmission intégrale 4MOTION, boîte de vitesses automatique à 7 rapports'),
(93, 'Système de Freinage', 'freins sport'),
(94, 'moteur', '4 cylindres en ligne'),
(95, 'Puissance du moteur', '110 chevaux'),
(96, 'Consommation de carburant en ville/autoroute', '28/36 mpg'),
(97, 'Transmission', 'Boîte de vitesses automatique à 6 vitesses'),
(98, 'Système de divertissement', 'Écran tactile 7 pouces, Apple CarPlay et Android Auto'),
(99, 'Sièges', 'Sièges avant chauffants'),
(100, 'Système de sécurité', 'Système de freinage d\'urgence automatique, caméra de recul'),
(101, 'Prix', '2000000 DZD'),
(102, 'moteur', '3 cylindres en ligne'),
(103, 'Puissance du moteur', ' 85 chevaux'),
(104, 'Consommation de carburant en ville/autoroute', '30/40 mpg'),
(105, 'Système de divertissement', ' Radio AM/FM, prise USB'),
(106, 'Sièges ', 'Sièges en tissu'),
(107, 'Prix', '1990000 DZD'),
(108, 'moteur', '4 cylindres en ligne'),
(109, 'Puissance du moteur', '150 chevaux'),
(110, 'Transmission', 'Boîte de vitesses automatique à 6 vitesses'),
(111, 'Consommation de carburant en ville/autoroute', '25/35 mpg'),
(112, 'Système de divertissement', 'Radio AM/FM, lecteur CD, Bluetooth'),
(113, 'Sièges', ' Sièges en tissu, réglables manuellement'),
(114, 'Système de sécurité', ' ABS, airbags frontaux et latéraux'),
(115, 'Prix', '2010000 DZD'),
(116, 'moteur', '4 cylindres turbo'),
(117, 'Transmission', 'Boîte automatique à 9 vitesses'),
(118, 'Consommation de carburant en ville/autoroute', '22/30 mpg'),
(119, 'Prix', '2500000 DZD');

-- --------------------------------------------------------

--
-- Structure de la table `comparaison`
--

CREATE TABLE `comparaison` (
  `id_vcl_cmp` int(11) NOT NULL,
  `id_vcl_cmp_av` int(11) NOT NULL,
  `occurences` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comparaison`
--

INSERT INTO `comparaison` (`id_vcl_cmp`, `id_vcl_cmp_av`, `occurences`) VALUES
(3, 3, 6),
(3, 4, 23),
(4, 3, 21),
(4, 4, 3),
(12, 13, 11),
(12, 15, 1),
(13, 12, 3),
(14, 16, 3),
(17, 19, 1),
(17, 28, 1),
(19, 20, 1),
(24, 25, 1),
(29, 31, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `email`, `message`) VALUES
(1, 'AutoPairia', 'autoparia@gmail.com', 'AutoPairia est bien plus qu\'un simple site de comparaison de véhicules. C\'est une plateforme dédiée à simplifier votre processus de choix automobile. Avec une vaste gamme de véhicules, des voitures compactes aux SUV spacieux, des camions robustes aux véhicules électriques et bien plus encore, AutoPairia offre une vue d\'ensemble exhaustive pour vous aider à trouver le véhicule parfait. Notre objectif est de vous offrir des comparaisons détaillées, des analyses approfondies et des informations pertinentes pour que vous puissiez prendre des décisions éclairées. Qu\'il s\'agisse de performances, de fonctionnalités, d\'économie de carburant ou de sécurité, nous vous fournissons les données nécessaires pour choisir le véhicule qui correspond à vos besoins et à votre style de vie. Avec AutoPairia, trouvez votre véhicule idéal en toute simplicité.');

-- --------------------------------------------------------

--
-- Structure de la table `diapo_items`
--

CREATE TABLE `diapo_items` (
  `id_dip` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `id_news` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_user` int(11) NOT NULL,
  `id_vcl` int(11) DEFAULT NULL,
  `id_fav` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id_user`, `id_vcl`, `id_fav`) VALUES
(53, NULL, 4),
(53, 23, 13),
(53, 22, 14),
(53, 21, 15),
(53, 31, 16),
(53, 20, 17);

-- --------------------------------------------------------

--
-- Structure de la table `guide_achat`
--

CREATE TABLE `guide_achat` (
  `id_gd_ach` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `date_pub` date DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `guide_achat`
--

INSERT INTO `guide_achat` (`id_gd_ach`, `titre`, `contenu`, `date_pub`, `img`) VALUES
(1, 'Choisissez le véhicule qui vous convient', 'Choisir le véhicule qui vous convient le mieux est une étape cruciale. Avant de vous lancer dans l\'achat d\'une voiture, prenez le temps de définir vos besoins et vos priorités. Déterminez l\'usage que vous comptez en faire : trajets quotidiens en ville, longs voyages, transport de famille, ou bien des besoins spécifiques comme le transport de matériel professionnel.\n\nEn fonction de ces critères, plusieurs types de véhicules peuvent correspondre à votre profil : les citadines compactes pour une conduite aisée en ville, les SUV ou les berlines pour des trajets plus longs et confortables, ou encore les véhicules utilitaires pour des besoins de chargement conséquents.\n\nOutre l\'usage, considérez également votre budget. Calculez le coût total de possession, incluant le prix d\'achat, mais aussi les coûts d\'entretien, d\'assurance et de carburant.\n\nLors de votre recherche, ne négligez pas les critères de sécurité et d\'économie. Privilégiez des véhicules équipés des dernières technologies de sécurité active et passive. Consultez également les consommations en carburant pour choisir un modèle économique et respectueux de l\'environnement.\n\nEnfin, n\'hésitez pas à faire des essais routiers pour ressentir le confort de conduite, tester les équipements et vous assurer que le véhicule correspond réellement à vos attentes. Prenez le temps de comparer différentes options avant de prendre votre décision finale pour trouver le véhicule qui répondra parfaitement à vos besoins et à votre style de vie.', '2023-12-21', '../Assets/acceuil/mercedes.png');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_img` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id_img`, `path`) VALUES
(1, '../Assets/acceuil/opele.png'),
(2, '../Assets/acceuil/opele.png'),
(3, 'ggg'),
(4, 'ggg'),
(5, ''),
(6, '../Assets/acceuil/opele.png'),
(7, '../Assets/news/banquefinancemet.webp'),
(8, '../Assets/news/sokon.jpg'),
(9, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id_mrq` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `siege_soc` varchar(255) DEFAULT NULL,
  `annee` varchar(255) DEFAULT NULL,
  `web` varchar(255) DEFAULT NULL,
  `note` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id_mrq`, `logo`, `nom`, `pays`, `siege_soc`, `annee`, `web`, `note`) VALUES
(1, '../Assets/acceuil/peugotr.png', 'Peugeot', 'France', '31, rue de la Grande-Armée, 75008 Paris', '1810', ' https://www.peugeot.fr', NULL),
(2, '../Assets/acceuil/fiatr.png', 'Fiat', 'Italie', 'quartier industriel de Mirafiori,', '1899', 'https://www.fiat.dz', NULL),
(3, '../Assets/acceuil/renaultr.png', 'Renault', 'France', '122-122 B avenue du Général Leclerc, 92100 Boulogne-Billancourt', '1899', 'https://www.renaultgroup.com', NULL),
(4, '../Assets/acceuil/vwr.png', 'Volks wagen', 'Allemagne', 'Wolfsburg', '1937', ' https://www.volkswagen.com', NULL),
(5, '../Assets/acceuil/toyotalogor.png', 'toyota', 'Japon', '1 471 8571 AICHI KEBN 1 TOYOTA CHO * TOYOTA SHI JAPON', '1937', 'https://www.toyota.com/', 9);

-- --------------------------------------------------------

--
-- Structure de la table `marque_type`
--

CREATE TABLE `marque_type` (
  `id_mrq` int(11) NOT NULL,
  `id_type_v` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `marque_type`
--

INSERT INTO `marque_type` (`id_mrq`, `id_type_v`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `menu_items`
--

CREATE TABLE `menu_items` (
  `id_menu` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu_items`
--

INSERT INTO `menu_items` (`id_menu`, `nom`, `lien`) VALUES
(1, 'Marques', 'http://localhost/projet_web/Routers/Marques.php'),
(2, 'Comparateur', 'http://localhost/projet_web/Routers/Comparateur.php'),
(3, 'Avis', 'http://localhost/projet_web/Routers/Avis.php'),
(4, 'Contacte', 'http://localhost/projet_web/Routers/Contacte.php'),
(5, 'Guide achat', 'http://localhost/projet_web/Routers/GuideAchat.php'),
(6, 'News', 'http://localhost/projet_web/Routers/News.php');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE `modele` (
  `id_mdl` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `id_mrq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`id_mdl`, `nom`, `id_mrq`) VALUES
(2, 'yaris', 5),
(5, 'Corolla', 5),
(6, 'Camry', 5),
(9, 'Tundra', 5),
(10, 'Tacoma', 5),
(11, 'Clio 5', 3),
(12, 'Megane E-Tech Electric', 3),
(13, 'Captur II', 3),
(14, '308', 1),
(15, '208', 1),
(16, '5008', 1),
(17, 'Tiguan', 4),
(18, 'ID.4', 4),
(19, 'Golf', 4),
(20, '500', 2),
(21, '500X', 2),
(22, 'panda', 2);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description_crt` text DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id_news`, `titre`, `description_crt`, `contenu`, `date`, `id_img`) VALUES
(1, 'Toyota est le constructeur automobile le plus puissant au monde', 'description test', 'Depuis 1999, la société américaine de conseil en marques Interbrand étudie et analyse les marques les plus puissantes au monde. Les 100 premières sont présentées dans l\'étude annuelle Best Global Brands, qui examine tous les candidats selon trois critères : \"la performance financière des produits ou services de la marque\", \"le rôle de la marque dans le processus de décision d\'achat\" et \"la force de la marque\" en ce qui concerne \"la garantie des bénéfices futurs de l\'entreprise\". Comme chaque année maintenant, le haut du classement est occupé par les grands géants de la Tech : respectivement Apple, Microsoft, Amazon, Google et Samsung dans le Top 5. Coca-Cola est en huitième position et Nike occupe le rang 9.', '1998-12-13', 1),
(3, 'fabrication future d’Opel en Algérie', 'Le DG de Stellantis-Maghreb s’exprime sur la fabrication future d’Opel en Algérie', 'Dans le monde de l’automobile, les stratégies d’expansion sont constamment en mouvement. Stellantis-Maghreb, un acteur majeur du secteur, pourrait-il envisager la production de véhicules Opel en Algérie ? C’est une question qui suscite beaucoup d’intérêt et de spéculations.\n\nDans cet article, nous allons partager avec vous les réponses fournies par le Directeur Général de Stellantis-Maghreb sur cette éventualité. Restez avec nous pour découvrir ce que l’avenir pourrait réserver à l’industrie automobile algérienne.', '1999-12-13', 2),
(11, 'des financements islamiques jusqu’à 90% du prix du véhicule', 'Des banques dans le domaine de la finance islamique en Algérie proposent aux clients des prêts pour le financement de  voitures', 'Le chef du département finance islamique au Crédit populaire d’Algérie (CPA), Sofiane Mazari, a précisé, dans une déclaration à l’APS, que cette banque publique proposait un financement pour l’acquisition de voitures selon la formule «Mourabaha», où le financement peut atteindre jusqu’à 80% du prix de la voiture, relevant que le produit est disponible à travers les différentes agences du CPA.\nSoulignant que la marge de profit sur le financement est fixée à 7,5 % par an, M. Mazari a expliqué que la banque n’exigait pas que le client ait un compte au CPA, rappelant que seules les voitures fabriquées localement étaient concernées par ces crédits.\n\n \n\nDans ce contexte, le responsable a révélé que la banque s’orientait à acquérir un stock de voitures fabriquées localement pour les revendre aux clients.\n\n \n\nEn tant que président du comité de la finance islamique à l’Association des banques et institutions financières (ABEF), M. Mazari a souligné que «les banques actives dans la finance islamique en Algérie, au nombre de 12, sont prêtes à accompagner les clients pour l’achat de voitures», affirmant que «la demande sera élevée et le besoin de financement sera important, en raison de la hausse des prix des voitures».', '2024-01-16', 7),
(12, 'Sokon Algérie : lancement de la marque chinoise  de véhicules utilitaires', 'C’est depuis Batna que Sokon Algérie a entamé, hier, ses activités commerciales en annonçant l’ouverture des commandes, dès aujourd’hui, sur l’ensemble de sa gamme', 'L’évènement auquel ont été conviées les autorités locales, et à leur tête le wali de\nBatna, a permis aux responsables de Sokon Algérie de confirmer l’expédition vers l’Algérie de 7000 véhicules qui commencent à arriver aux différents ports du pays.\nL’occasion pour le premier responsable de la marque de dévoiler sa gamme de véhicules utilitaires qui bénéficieront d’une garantie de 100.000 km ou de 5 ans, soulignant que les délais de livraison n’excéderont pas les 45 jours.\n\nUne gamme qui appartient à la catégorie des mini-camionnettes multi-usages (minitrucks) et s’adresse directement aux professionnels, idoine pour le transport de personnes et de marchandises. L’ensemble de la gamme Sokon est équipée d’un moteur essence 4 cylindres de 1051 cm3 qui développe une puissance de 45 ch pour un couple de 89 Nm, couplé à une transmission manuelle à 5 vitesses entièrement synchronisée.\n\nLa gamme se compose ainsi d’un minitruck C01 simple cabine (2 sièges), avec une capacité de chargement allant jusqu’à 985 kg. Long de 4 m, le C01 est affiché partir de 162 millions de centimes. Le modèle C02 qui est doté d’une cabine double et de 5 sièges, avec une capacité de chargement allant jusqu’à 885 kg, est proposé à partir de 190 millions de centimes. Sokon propose également une version C01L avec deux sièges, une capacité de chargement allant jusqu’à 755 kg et une longueur totale de 4,7 m, proposé au prix de 170 millions de centimes. De même taille, le modèle dispose d’une version 7 places destinée au transport de personnes, baptisée C07. Le Van Sokon C05 est un fourgon fermé, fait pour le transport de marchandises polyvalentes avec 2 places à bord. Son prix de 187 millions de centimes.', '2024-01-30', 8);

-- --------------------------------------------------------

--
-- Structure de la table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `icone` varchar(255) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `social_media`
--

INSERT INTO `social_media` (`id`, `icone`, `nom`) VALUES
(1, '../Assets/acceuil/facebook.png', 'facebook'),
(2, '../Assets/acceuil/instagram.png', 'instagram'),
(3, '../Assets/acceuil/twitter.png', 'twitter');

-- --------------------------------------------------------

--
-- Structure de la table `type_vehicule`
--

CREATE TABLE `type_vehicule` (
  `id_type_v` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type_vehicule`
--

INSERT INTO `type_vehicule` (`id_type_v`, `nom`) VALUES
(1, 'Voiture'),
(2, 'camionnette'),
(3, 'fourgonette');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `sexe` varchar(255) DEFAULT NULL,
  `md_passe` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `sexe`, `md_passe`, `status`, `photo`, `email`, `birth_date`) VALUES
(53, 'mecherak', 'Thanina', 'Femme', '$2y$10$ZKCAchdL2nimCoQEvodYfOy1/Q88awrsOQvzPOrj9b20KxjYyQ4V2', 'valide', '../Assets/User/user.png', 'kt_mecherak@esi.dz', '2002-08-21'),
(54, 'nina', 'Thanina', 'Femme', '$2y$10$dDp1SXe4.BvN8bqbYyLQ8eyvbNo9EnBaseWMnKyqtctYkrx5bxErm', 'en attente', '../Assets/User/user.png', 'ninack8@gmail.com', '2023-12-27'),
(55, 'hh', 'hh', 'hh', 'hh', 'en attente', NULL, NULL, NULL),
(56, 'hamoudi', 'ouzna', 'Femme', '$2y$10$eCnYmF4bJlLOJam7BYjukOrsgsWX7ZudbBuTO.g5PKiBMk.9kKjLq', 'bloque', '../Assets/User/user.png', 'mecherak.nina@gmail.com', '2024-01-24');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vcl` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_mdl` int(11) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `annee` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vcl`, `image`, `id_mdl`, `note`, `annee`) VALUES
(3, '../Assets/acceuil/opele.png', 2, NULL, '2023'),
(4, '../Assets/acceuil/opele.png', 2, 8, '2002'),
(12, '../Assets/exemples/corollaL2024.jpg\r\n', 5, 80, '2024'),
(13, '../Assets/exemples/corollaSE2023.jpg', 5, 73, '2023'),
(14, '../Assets/exemples/tacomasr.jpg', 10, 87, '2024'),
(15, '../Assets/exemples/toyotaTundra.jpg', 9, 10, '2021'),
(16, '../Assets/exemples/tacomasr5.jpg', 10, 16, '2021'),
(17, '../Assets/exemples/clio5.jpg', 11, 32, '2023'),
(19, '../Assets/exemples/clio5eq.jpg', 11, 56, '2020'),
(20, '../Assets/exemples/megane.jpg', 12, 0, '2020'),
(21, '../Assets/exemples/pg308.jpg', 14, 50, '2012'),
(22, '../Assets/exemples/pg208.jpg', 15, 66, '2011'),
(23, '../Assets/exemples/pg5008.jpg', 16, 76, '2010'),
(24, '../Assets/exemples/golf.jpg', 19, 40, '2009'),
(25, '../Assets/exemples/tiguan.jpg', 17, 80, '2018'),
(26, '../Assets/exemples/id.4.jpg', 18, NULL, '2017'),
(27, '../Assets/exemples/golfr.jpg', 19, 90, '2011'),
(28, '../Assets/exemples/fiatpanda.jpg', 22, 65, '2009'),
(29, '../Assets/exemples/fiat500.jpg', 20, 70, '2021'),
(30, '../Assets/exemples/fiatpopstar.jpg', 20, 80, '2020'),
(31, '../Assets/exemples/fiat500x.jpg', 21, 56, '2008');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_caracteristiques`
--

CREATE TABLE `vehicule_caracteristiques` (
  `id_vcl` int(11) NOT NULL,
  `id_caract` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicule_caracteristiques`
--

INSERT INTO `vehicule_caracteristiques` (`id_vcl`, `id_caract`) VALUES
(4, 1),
(4, 2),
(4, 13),
(12, 17),
(12, 19),
(12, 21),
(12, 24),
(12, 25),
(13, 13),
(13, 16),
(13, 18),
(13, 20),
(13, 22),
(13, 23),
(14, 13),
(14, 27),
(14, 28),
(14, 29),
(14, 30),
(14, 31),
(16, 13),
(16, 32),
(16, 33),
(16, 34),
(16, 35),
(16, 36),
(17, 13),
(17, 37),
(17, 38),
(17, 39),
(17, 40),
(17, 41),
(17, 42),
(19, 13),
(19, 43),
(19, 44),
(19, 45),
(19, 46),
(19, 47),
(19, 48),
(20, 13),
(20, 49),
(20, 50),
(20, 51),
(20, 52),
(20, 53),
(20, 54),
(21, 13),
(21, 55),
(21, 56),
(21, 57),
(21, 58),
(21, 59),
(21, 60),
(21, 61),
(22, 13),
(22, 70),
(22, 71),
(22, 72),
(22, 73),
(22, 74),
(23, 13),
(23, 62),
(23, 63),
(23, 64),
(23, 65),
(23, 66),
(23, 67),
(24, 13),
(24, 85),
(24, 86),
(24, 87),
(24, 88),
(24, 89),
(25, 13),
(25, 76),
(25, 77),
(25, 78),
(25, 79),
(26, 13),
(26, 80),
(26, 81),
(26, 82),
(26, 83),
(26, 84),
(27, 13),
(27, 90),
(27, 91),
(27, 92),
(27, 93),
(28, 13),
(28, 108),
(28, 109),
(28, 110),
(28, 111),
(28, 112),
(28, 113),
(28, 114),
(28, 115),
(29, 13),
(29, 102),
(29, 103),
(29, 104),
(29, 105),
(29, 106),
(29, 107),
(30, 13),
(30, 94),
(30, 95),
(30, 96),
(30, 97),
(30, 98),
(30, 99),
(30, 100),
(30, 101),
(31, 13),
(31, 116),
(31, 117),
(31, 118),
(31, 119);

-- --------------------------------------------------------

--
-- Structure de la table `version`
--

CREATE TABLE `version` (
  `id_version` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `id_vcl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `version`
--

INSERT INTO `version` (`id_version`, `nom`, `id_vcl`) VALUES
(3, 'essence', 4),
(5, '5', 4),
(8, 'test', 4),
(9, 'L', 12),
(10, 'SE', 13),
(11, 'SR', 14),
(12, 'SR5', 16),
(13, 'Capstone', 15),
(16, 'Authentic', 17),
(17, 'equilibre', 19),
(18, 'intense', 20),
(19, 'Berline compacte', 21),
(20, 'Citadine compacte', 22),
(21, 'base', 23),
(22, 'base', 24),
(23, 'R', 27),
(24, 'electrique', 26),
(25, 'La toute', 25),
(26, 'La base', 28),
(27, 'pop', 29),
(28, 'pop star', 30),
(29, 'toutes options', 31);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `avis_marque`
--
ALTER TABLE `avis_marque`
  ADD PRIMARY KEY (`id_avs_mrq`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_mrq` (`id_mrq`);

--
-- Index pour la table `avis_vehicule`
--
ALTER TABLE `avis_vehicule`
  ADD PRIMARY KEY (`id_avs_vcl`),
  ADD KEY `id_vcl` (`id_vcl`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD PRIMARY KEY (`id_caract`);

--
-- Index pour la table `comparaison`
--
ALTER TABLE `comparaison`
  ADD PRIMARY KEY (`id_vcl_cmp`,`id_vcl_cmp_av`),
  ADD KEY `comparaison_ibfk_2` (`id_vcl_cmp_av`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Index pour la table `diapo_items`
--
ALTER TABLE `diapo_items`
  ADD PRIMARY KEY (`id_dip`),
  ADD KEY `id_img` (`id_img`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_fav`),
  ADD KEY `fk_user_favoris` (`id_user`),
  ADD KEY `favoris_ibfk_2` (`id_vcl`);

--
-- Index pour la table `guide_achat`
--
ALTER TABLE `guide_achat`
  ADD PRIMARY KEY (`id_gd_ach`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_mrq`);

--
-- Index pour la table `marque_type`
--
ALTER TABLE `marque_type`
  ADD PRIMARY KEY (`id_mrq`,`id_type_v`),
  ADD KEY `id_type_v` (`id_type_v`);

--
-- Index pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id_menu`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`id_mdl`),
  ADD KEY `fk_modele_marque` (`id_mrq`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_img` (`id_img`);

--
-- Index pour la table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_vehicule`
--
ALTER TABLE `type_vehicule`
  ADD PRIMARY KEY (`id_type_v`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vcl`),
  ADD KEY `fk_vehicule_modele` (`id_mdl`);

--
-- Index pour la table `vehicule_caracteristiques`
--
ALTER TABLE `vehicule_caracteristiques`
  ADD PRIMARY KEY (`id_vcl`,`id_caract`),
  ADD KEY `id_caract` (`id_caract`);

--
-- Index pour la table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`id_version`),
  ADD KEY `fk_version_vehicule` (`id_vcl`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avis_marque`
--
ALTER TABLE `avis_marque`
  MODIFY `id_avs_mrq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `avis_vehicule`
--
ALTER TABLE `avis_vehicule`
  MODIFY `id_avs_vcl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  MODIFY `id_caract` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `diapo_items`
--
ALTER TABLE `diapo_items`
  MODIFY `id_dip` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `guide_achat`
--
ALTER TABLE `guide_achat`
  MODIFY `id_gd_ach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_mrq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
  MODIFY `id_mdl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_vehicule`
--
ALTER TABLE `type_vehicule`
  MODIFY `id_type_v` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vcl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `version`
--
ALTER TABLE `version`
  MODIFY `id_version` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis_marque`
--
ALTER TABLE `avis_marque`
  ADD CONSTRAINT `avis_marque_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `avis_marque_ibfk_2` FOREIGN KEY (`id_mrq`) REFERENCES `marque` (`id_mrq`);

--
-- Contraintes pour la table `avis_vehicule`
--
ALTER TABLE `avis_vehicule`
  ADD CONSTRAINT `avis_vehicule_ibfk_1` FOREIGN KEY (`id_vcl`) REFERENCES `vehicule` (`id_vcl`),
  ADD CONSTRAINT `avis_vehicule_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `comparaison`
--
ALTER TABLE `comparaison`
  ADD CONSTRAINT `comparaison_ibfk_1` FOREIGN KEY (`id_vcl_cmp`) REFERENCES `vehicule` (`id_vcl`),
  ADD CONSTRAINT `comparaison_ibfk_2` FOREIGN KEY (`id_vcl_cmp_av`) REFERENCES `vehicule` (`id_vcl`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_comparaison_vehicule` FOREIGN KEY (`id_vcl_cmp_av`) REFERENCES `vehicule` (`id_vcl`) ON DELETE CASCADE,
  ADD CONSTRAINT `nom_de_la_nouvelle_contrainte` FOREIGN KEY (`id_vcl_cmp_av`) REFERENCES `vehicule` (`id_vcl`) ON DELETE CASCADE;

--
-- Contraintes pour la table `diapo_items`
--
ALTER TABLE `diapo_items`
  ADD CONSTRAINT `diapo_items_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `images` (`id_img`);

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`id_vcl`) REFERENCES `vehicule` (`id_vcl`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_favoris_vehicule` FOREIGN KEY (`id_vcl`) REFERENCES `vehicule` (`id_vcl`),
  ADD CONSTRAINT `fk_user_favoris` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `marque_type`
--
ALTER TABLE `marque_type`
  ADD CONSTRAINT `marque_type_ibfk_1` FOREIGN KEY (`id_mrq`) REFERENCES `marque` (`id_mrq`),
  ADD CONSTRAINT `marque_type_ibfk_2` FOREIGN KEY (`id_type_v`) REFERENCES `type_vehicule` (`id_type_v`);

--
-- Contraintes pour la table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `fk_modele_marque` FOREIGN KEY (`id_mrq`) REFERENCES `marque` (`id_mrq`) ON DELETE CASCADE,
  ADD CONSTRAINT `modele_ibfk_1` FOREIGN KEY (`id_mrq`) REFERENCES `marque` (`id_mrq`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_img`) REFERENCES `images` (`id_img`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `fk_vehicule_modele` FOREIGN KEY (`id_mdl`) REFERENCES `modele` (`id_mdl`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`id_mdl`) REFERENCES `modele` (`id_mdl`);

--
-- Contraintes pour la table `vehicule_caracteristiques`
--
ALTER TABLE `vehicule_caracteristiques`
  ADD CONSTRAINT `fk_vc_vehicule` FOREIGN KEY (`id_vcl`) REFERENCES `vehicule` (`id_vcl`) ON DELETE CASCADE,
  ADD CONSTRAINT `vehicule_caracteristiques_ibfk_1` FOREIGN KEY (`id_vcl`) REFERENCES `vehicule` (`id_vcl`),
  ADD CONSTRAINT `vehicule_caracteristiques_ibfk_2` FOREIGN KEY (`id_caract`) REFERENCES `caracteristiques` (`id_caract`);

--
-- Contraintes pour la table `version`
--
ALTER TABLE `version`
  ADD CONSTRAINT `fk_version_vehicule` FOREIGN KEY (`id_vcl`) REFERENCES `vehicule` (`id_vcl`) ON DELETE CASCADE,
  ADD CONSTRAINT `version_ibfk_1` FOREIGN KEY (`id_vcl`) REFERENCES `vehicule` (`id_vcl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
