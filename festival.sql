-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 17 déc. 2021 à 11:01
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `festival`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidature`
--

CREATE TABLE `candidature` (
  `NOM_GROUPE` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DEPARTEMENT` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TYPE_SCENE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOM_REP` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRENOM_REP` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ADRESSE_REP` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `POSTAL_REP` int(11) NOT NULL,
  `MAIL_REP` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TEL_REP` int(11) NOT NULL,
  `STYLE` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ANNEE_CREATION` int(11) NOT NULL,
  `PRESENTATION_TXT` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EXP_SCENIQUE` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SITE_FACEBOOK` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SOUNDCLOUD` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `YOUTUBE` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NB_MEMBRES` int(11) NOT NULL,
  `NOM_MEMBRE_1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRENOM_MEMBRE_1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `INSTRUMENT_MEMBRE_1` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NOM_MEMBRE_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PRENOM_MEMBRE_2` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `INSTRUMENT_MEMBRE_2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NOM_MEMBRE_3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PRENOM_MEMBRE_3` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `INSTRUMENT_MEMBRE_3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NOM_MEMBRE_4` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PRENOM_MEMBRE_4` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `INSTRUMENT_MEMBRE_4` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NOM_MEMBRE_5` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PRENOM_MEMBRE_5` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `INSTRUMENT_MEMBRE_5` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NOM_MEMBRE_6` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PRENOM_MEMBRE_6` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `INSTRUMENT_MEMBRE_6` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NOM_MEMBRE_7` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PRENOM_MEMBRE_7` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `INSTRUMENT_MEMBRE_7` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NOM_MEMBRE_8` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PRENOM_MEMBRE_8` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `INSTRUMENT_MEMBRE_8` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AUDIO_1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AUDIO_2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AUDIO_3` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOSSIER_PRESSE` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PHOTO_1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PHOTO_2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FICHE_TECHNIQUE` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SACEM_PDF` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `STATUT_ASSOCIATIF` tinyint(1) NOT NULL,
  `INSCRIT_SACEM` tinyint(1) NOT NULL,
  `PRODUCTEUR` tinyint(1) NOT NULL,
  `ID_CANDIDATURE` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidature`
--

INSERT INTO `candidature` (`NOM_GROUPE`, `DEPARTEMENT`, `TYPE_SCENE`, `NOM_REP`, `PRENOM_REP`, `ADRESSE_REP`, `POSTAL_REP`, `MAIL_REP`, `TEL_REP`, `STYLE`, `ANNEE_CREATION`, `PRESENTATION_TXT`, `EXP_SCENIQUE`, `SITE_FACEBOOK`, `SOUNDCLOUD`, `YOUTUBE`, `NB_MEMBRES`, `NOM_MEMBRE_1`, `PRENOM_MEMBRE_1`, `INSTRUMENT_MEMBRE_1`, `NOM_MEMBRE_2`, `PRENOM_MEMBRE_2`, `INSTRUMENT_MEMBRE_2`, `NOM_MEMBRE_3`, `PRENOM_MEMBRE_3`, `INSTRUMENT_MEMBRE_3`, `NOM_MEMBRE_4`, `PRENOM_MEMBRE_4`, `INSTRUMENT_MEMBRE_4`, `NOM_MEMBRE_5`, `PRENOM_MEMBRE_5`, `INSTRUMENT_MEMBRE_5`, `NOM_MEMBRE_6`, `PRENOM_MEMBRE_6`, `INSTRUMENT_MEMBRE_6`, `NOM_MEMBRE_7`, `PRENOM_MEMBRE_7`, `INSTRUMENT_MEMBRE_7`, `NOM_MEMBRE_8`, `PRENOM_MEMBRE_8`, `INSTRUMENT_MEMBRE_8`, `AUDIO_1`, `AUDIO_2`, `AUDIO_3`, `DOSSIER_PRESSE`, `PHOTO_1`, `PHOTO_2`, `FICHE_TECHNIQUE`, `SACEM_PDF`, `STATUT_ASSOCIATIF`, `INSCRIT_SACEM`, `PRODUCTEUR`, `ID_CANDIDATURE`) VALUES
('Loic le rappeur solo tmtc', 'Yvelines', 'Amplifiï¿½/Rock', 'Loic', 'Loic', '47 loic du loic', 70133, 'loic@loic.com', 613071307, 'Loic', 7013, 'Wesh c\'est loic on vient on va etre le meilleur on rappe comme du fromage ouÃ©', 'J\'suis un grand rappeur tkt', 'htpp://loic.fr', 'https://truc.fr', '', 1, 'Loic', 'loic', 'le loic', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'files/phpA432.tmp_7th born son.mp3', 'files/phpA442.tmp_All star.mp3', 'files/phpA463.tmp_Never gonna give you up.mp3', '', 'files/phpA484.tmp_waw.png', 'files/phpA485.tmp_waw.png', 'files/phpA486.tmp_Fiche_Renseignements vierge.pdf', 'files/phpA487.tmp_Fiche_Renseignements vierge.pdf', 1, 0, 0, 'loic');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `departement_id` int(11) NOT NULL,
  `departement_code` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_uppercase` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_soundex` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`departement_id`, `departement_code`, `departement_nom`, `departement_nom_uppercase`, `departement_slug`, `departement_nom_soundex`) VALUES
(1, '01', 'Ain', 'AIN', 'ain', 'A500'),
(2, '02', 'Aisne', 'AISNE', 'aisne', 'A250'),
(3, '03', 'Allier', 'ALLIER', 'allier', 'A460'),
(5, '05', 'Hautes-Alpes', 'HAUTES-ALPES', 'hautes-alpes', 'H32412'),
(4, '04', 'Alpes-de-Haute-Provence', 'ALPES-DE-HAUTE-PROVENCE', 'alpes-de-haute-provence', 'A412316152'),
(6, '06', 'Alpes-Maritimes', 'ALPES-MARITIMES', 'alpes-maritimes', 'A41256352'),
(7, '07', 'Ardeche', 'ARDÈCHE', 'ardeche', 'A632'),
(8, '08', 'Ardennes', 'ARDENNES', 'ardennes', 'A6352'),
(9, '09', 'Ariege', 'ARIÈGE', 'ariege', 'A620'),
(10, '10', 'Aube', 'AUBE', 'aube', 'A100'),
(11, '11', 'Aude', 'AUDE', 'aude', 'A300'),
(12, '12', 'Aveyron', 'AVEYRON', 'aveyron', 'A165'),
(13, '13', 'Bouches-du-Rhone', 'BOUCHES-DU-RHÔNE', 'bouches-du-rhone', 'B2365'),
(14, '14', 'Calvados', 'CALVADOS', 'calvados', 'C4132'),
(15, '15', 'Cantal', 'CANTAL', 'cantal', 'C534'),
(16, '16', 'Charente', 'CHARENTE', 'charente', 'C653'),
(17, '17', 'Charente-Maritime', 'CHARENTE-MARITIME', 'charente-maritime', 'C6535635'),
(18, '18', 'Cher', 'CHER', 'cher', 'C600'),
(19, '19', 'Correze', 'CORRÈZE', 'correze', 'C620'),
(20, '2a', 'Corse-du-sud', 'CORSE-DU-SUD', 'corse-du-sud', 'C62323'),
(21, '2b', 'Haute-corse', 'HAUTE-CORSE', 'haute-corse', 'H3262'),
(22, '21', 'Cote-d\'or', 'CÔTE-D\'OR', 'cote-dor', 'C360'),
(23, '22', 'Cotes-d\'armor', 'CÔTES-D\'ARMOR', 'cotes-darmor', 'C323656'),
(24, '23', 'Creuse', 'CREUSE', 'creuse', 'C620'),
(25, '24', 'Dordogne', 'DORDOGNE', 'dordogne', 'D6325'),
(26, '25', 'Doubs', 'DOUBS', 'doubs', 'D120'),
(27, '26', 'Drome', 'DRÔME', 'drome', 'D650'),
(28, '27', 'Eure', 'EURE', 'eure', 'E600'),
(29, '28', 'Eure-et-Loir', 'EURE-ET-LOIR', 'eure-et-loir', 'E6346'),
(30, '29', 'Finistere', 'FINISTÈRE', 'finistere', 'F5236'),
(31, '30', 'Gard', 'GARD', 'gard', 'G630'),
(32, '31', 'Haute-Garonne', 'HAUTE-GARONNE', 'haute-garonne', 'H3265'),
(33, '32', 'Gers', 'GERS', 'gers', 'G620'),
(34, '33', 'Gironde', 'GIRONDE', 'gironde', 'G653'),
(35, '34', 'Herault', 'HÉRAULT', 'herault', 'H643'),
(36, '35', 'Ile-et-Vilaine', 'ILE-ET-VILAINE', 'ile-et-vilaine', 'I43145'),
(37, '36', 'Indre', 'INDRE', 'indre', 'I536'),
(38, '37', 'Indre-et-Loire', 'INDRE-ET-LOIRE', 'indre-et-loire', 'I536346'),
(39, '38', 'Isere', 'ISÈRE', 'isere', 'I260'),
(40, '39', 'Jura', 'JURA', 'jura', 'J600'),
(41, '40', 'Landes', 'LANDES', 'landes', 'L532'),
(42, '41', 'Loir-et-Cher', 'LOIR-ET-CHER', 'loir-et-cher', 'L6326'),
(43, '42', 'Loire', 'LOIRE', 'loire', 'L600'),
(44, '43', 'Haute-Loire', 'HAUTE-LOIRE', 'haute-loire', 'H346'),
(45, '44', 'Loire-Atlantique', 'LOIRE-ATLANTIQUE', 'loire-atlantique', 'L634532'),
(46, '45', 'Loiret', 'LOIRET', 'loiret', 'L630'),
(47, '46', 'Lot', 'LOT', 'lot', 'L300'),
(48, '47', 'Lot-et-Garonne', 'LOT-ET-GARONNE', 'lot-et-garonne', 'L3265'),
(49, '48', 'Lozere', 'LOZÈRE', 'lozere', 'L260'),
(50, '49', 'Maine-et-Loire', 'MAINE-ET-LOIRE', 'maine-et-loire', 'M346'),
(51, '50', 'Manche', 'MANCHE', 'manche', 'M200'),
(52, '51', 'Marne', 'MARNE', 'marne', 'M650'),
(53, '52', 'Haute-Marne', 'HAUTE-MARNE', 'haute-marne', 'H3565'),
(54, '53', 'Mayenne', 'MAYENNE', 'mayenne', 'M000'),
(55, '54', 'Meurthe-et-Moselle', 'MEURTHE-ET-MOSELLE', 'meurthe-et-moselle', 'M63524'),
(56, '55', 'Meuse', 'MEUSE', 'meuse', 'M200'),
(57, '56', 'Morbihan', 'MORBIHAN', 'morbihan', 'M615'),
(58, '57', 'Moselle', 'MOSELLE', 'moselle', 'M240'),
(59, '58', 'Nievre', 'NIÈVRE', 'nievre', 'N160'),
(60, '59', 'Nord', 'NORD', 'nord', 'N630'),
(61, '60', 'Oise', 'OISE', 'oise', 'O200'),
(62, '61', 'Orne', 'ORNE', 'orne', 'O650'),
(63, '62', 'Pas-de-Calais', 'PAS-DE-CALAIS', 'pas-de-calais', 'P23242'),
(64, '63', 'Puy-de-Dome', 'PUY-DE-DÔME', 'puy-de-dome', 'P350'),
(65, '64', 'Pyrenees-Atlantiques', 'PYRÉNÉES-ATLANTIQUES', 'pyrenees-atlantiques', 'P65234532'),
(66, '65', 'Hautes-Pyrenees', 'HAUTES-PYRÉNÉES', 'hautes-pyrenees', 'H321652'),
(67, '66', 'Pyrenees-Orientales', 'PYRÉNÉES-ORIENTALES', 'pyrenees-orientales', 'P65265342'),
(68, '67', 'Bas-Rhin', 'BAS-RHIN', 'bas-rhin', 'B265'),
(69, '68', 'Haut-Rhin', 'HAUT-RHIN', 'haut-rhin', 'H365'),
(70, '69', 'Rhone', 'RHÔNE', 'rhone', 'R500'),
(71, '70', 'Haute-Saone', 'HAUTE-SAÔNE', 'haute-saone', 'H325'),
(72, '71', 'Saone-et-Loire', 'SAÔNE-ET-LOIRE', 'saone-et-loire', 'S5346'),
(73, '72', 'Sarthe', 'SARTHE', 'sarthe', 'S630'),
(74, '73', 'Savoie', 'SAVOIE', 'savoie', 'S100'),
(75, '74', 'Haute-Savoie', 'HAUTE-SAVOIE', 'haute-savoie', 'H321'),
(76, '75', 'Paris', 'PARIS', 'paris', 'P620'),
(77, '76', 'Seine-Maritime', 'SEINE-MARITIME', 'seine-maritime', 'S5635'),
(78, '77', 'Seine-et-Marne', 'SEINE-ET-MARNE', 'seine-et-marne', 'S53565'),
(79, '78', 'Yvelines', 'YVELINES', 'yvelines', 'Y1452'),
(80, '79', 'Deux-Sevres', 'DEUX-SÈVRES', 'deux-sevres', 'D2162'),
(81, '80', 'Somme', 'SOMME', 'somme', 'S500'),
(82, '81', 'Tarn', 'TARN', 'tarn', 'T650'),
(83, '82', 'Tarn-et-Garonne', 'TARN-ET-GARONNE', 'tarn-et-garonne', 'T653265'),
(84, '83', 'Var', 'VAR', 'var', 'V600'),
(85, '84', 'Vaucluse', 'VAUCLUSE', 'vaucluse', 'V242'),
(86, '85', 'Vendee', 'VENDÉE', 'vendee', 'V530'),
(87, '86', 'Vienne', 'VIENNE', 'vienne', 'V500'),
(88, '87', 'Haute-Vienne', 'HAUTE-VIENNE', 'haute-vienne', 'H315'),
(89, '88', 'Vosges', 'VOSGES', 'vosges', 'V200'),
(90, '89', 'Yonne', 'YONNE', 'yonne', 'Y500'),
(91, '90', 'Territoire de Belfort', 'TERRITOIRE DE BELFORT', 'territoire-de-belfort', 'T636314163'),
(92, '91', 'Essonne', 'ESSONNE', 'essonne', 'E250'),
(93, '92', 'Hauts-de-Seine', 'HAUTS-DE-SEINE', 'hauts-de-seine', 'H32325'),
(94, '93', 'Seine-Saint-Denis', 'SEINE-SAINT-DENIS', 'seine-saint-denis', 'S525352'),
(95, '94', 'Val-de-Marne', 'VAL-DE-MARNE', 'val-de-marne', 'V43565'),
(96, '95', 'Val-d\'oise', 'VAL-D\'OISE', 'val-doise', 'V432'),
(97, '976', 'Mayotte', 'MAYOTTE', 'mayotte', 'M300'),
(98, '971', 'Guadeloupe', 'GUADELOUPE', 'guadeloupe', 'G341'),
(99, '973', 'Guyane', 'GUYANE', 'guyane', 'G500'),
(100, '972', 'Martinique', 'MARTINIQUE', 'martinique', 'M6352'),
(101, '974', 'Reunion', 'RÉUNION', 'reunion', 'R500');

-- --------------------------------------------------------

--
-- Structure de la table `scene`
--

CREATE TABLE `scene` (
  `NOM_SCENE` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `scene`
--

INSERT INTO `scene` (`NOM_SCENE`) VALUES
('Tribute'),
('Acoustique/Folk'),
('Amplifie/Rock');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`name`, `mail`, `pass`) VALUES
('loic', 'loic.recoupe@gmail.com', '$2y$10$m3WItI5x/dPBBp5qtPHNi.O9OLCo3KS6k0T0SL..1G67vEjKw8yt6'),
('root', 'root@gmail.com', '$2y$10$QSc/4cRHS0sAv9CHXtEemet.xk8B1EESAmxbU1XZrkJb1nyIE16Ie'),
('test', 'test@test.com', 'testtest');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`departement_id`),
  ADD KEY `departement_slug` (`departement_slug`),
  ADD KEY `departement_code` (`departement_code`),
  ADD KEY `departement_nom_soundex` (`departement_nom_soundex`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `departement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
